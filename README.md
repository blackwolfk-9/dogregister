# dogregister

Register of a certification body for assistance dogs.

Staff members of the certification body log in and manage **clients** (the dog owners) and their
**dogs**. Every dog is stored with its microchip number and whether its certificate is currently
valid. Revoked certificates are not deleted but marked with `is_valid = false`, so the register
keeps its history.

The public part of the site has no login: anyone (a shop, a landlord, an airline, an authority) can
enter a microchip number and immediately see whether the dog holds a valid certificate. There is
deliberately **no public list of all dogs**, only the lookup by chip number (data protection).

Built with Laravel 13, Laravel Breeze (authentication), Tailwind CSS (via CDN on the public pages)
and SQLite.

## Installation

```bash
git clone <repository-url> dogregister
cd dogregister
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate:fresh --seed
```

Then open the site (e.g. `http://dogregister.test` with Laravel Herd, or `php artisan serve`).

**Login:** `admin@admin.com` / `password`

The seeder creates 4 users (incl. the admin), 10 clients and 22 dogs. Two dogs have fixed chip
numbers so the public search can be tried right away:

| Chip number | Dog | Certificate |
|---|---|---|
| `276098100123456` | Bello | valid |
| `276098100654321` | Rex | revoked |

## Routes

| URL | Who | What |
|---|---|---|
| `/` | public | Welcome page with explanation and certificate search |
| `/dogs/search?q=<chip>` | public | Search result: valid / revoked / no dog found |
| `/login`, `/register`, `/forgot-password` | public | Breeze authentication |
| `/dashboard` | logged in | Counts of clients and dogs, list of revoked certificates |
| `/admin/clients` (+ create, show, edit) | logged in | Full CRUD for clients |
| `/admin/dogs` (+ create, show, edit) | logged in | Full CRUD for dogs |
| `/profile` | logged in | Breeze profile management |

All routes are defined in `routes/web.php` (public + admin) and `routes/auth.php` (Breeze).

## Data model

```
User  1 ─── n  Client  1 ─── n  Dog
```

- `User` = staff member of the certification body. A user is responsible for several clients.
- `Client` = dog owner (`user_id` → the responsible staff member).
- `Dog` = registered assistance dog (`client_id` → its owner, `is_valid` = certificate status).

Clients that still have dogs cannot be deleted (checked in `ClientController@destroy`).
Dogs can be deleted (for wrong entries); a withdrawn certificate is set to revoked instead.

## Where to find what

| Requirement | File(s) |
|---|---|
| 3 models incl. User | `app/Models/User.php`, `app/Models/Client.php`, `app/Models/Dog.php` |
| Two one-to-many relations | `User::clients()` / `Client::user()`, `Client::dogs()` / `Dog::client()` |
| Migration per model | `database/migrations/2026_09_11_103500_create_clients_table.php`, `..._103501_create_dogs_table.php` |
| Factory per model, used in the seeder | `database/factories/ClientFactory.php`, `DogFactory.php`, `database/seeders/DatabaseSeeder.php` |
| Admin user after seeding | `DatabaseSeeder.php` (`admin@admin.com`) |
| Every route points to a controller method | `routes/web.php` (`Route::resource`, `auth` middleware group, `admin` prefix) |
| Full 7-method CRUD (two of them) | `app/Http/Controllers/Admin/ClientController.php`, `app/Http/Controllers/Admin/DogController.php` |
| Validation of every input | `store()` and `update()` in both admin controllers (`$request->validate([...])`) |
| Form feedback (errors, old input) | `resources/views/components/form-text-input.blade.php`, `form-textarea.blade.php`, `form-select.blade.php` |
| Login / register | Laravel Breeze (`routes/auth.php`, `app/Http/Controllers/Auth/`) |
| Logged-in user info in a view | `resources/views/admin/clients/index.blade.php`, `userzone/dashboard.blade.php` (`auth()->user()->name`) |
| Logged-in user info in a controller | `ClientController@store` (`'user_id' => auth()->id()`) |
| Two layouts | `app/View/Components/SiteLayout.php` + `resources/views/components/site-layout.blade.php` (public), `resources/views/layouts/app.blade.php` (Breeze, admin) |
| Blade components | `resources/views/components/form-*.blade.php`, used in all create/edit views |
| Control structures in Blade | `@forelse` / `@empty` in every index view, `@if` for the valid/revoked badge, `@auth` in the site layout |
| CSRF protection | `@csrf` in every POST/PUT/DELETE form, `@method('PUT')` / `@method('DELETE')` |
| Public search | `app/Http/Controllers/DogController.php` (`search()`), `resources/views/home.blade.php`, `resources/views/dogs/search.blade.php` |
| Dashboard with data | `app/Http/Controllers/Userzone/DashboardController.php`, `resources/views/userzone/dashboard.blade.php` |

## Sources

- Course material: Laravel MVC Reference Cards (https://edu.deblauwe.be/) and the hotspot demo
  repository (https://github.com/ndeblauw/hotspot).
- Laravel documentation (https://laravel.com/docs/13.x).
- Claude (Anthropic) was used as a tutor: it explained the concepts, pointed to the matching
  reference cards and reviewed errors. The code was typed by me; the Tailwind styling of the
  dogs admin pages and this README were drafted by Claude on my instruction and revised by me.
