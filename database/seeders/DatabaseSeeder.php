<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Client;
use App\Models\Dog;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => 'password',
        ]);

        User::factory(3)->create();
        Client::factory(10)->create();  // 10 Clients erzeugen
        Dog::factory(20)->create();

        Dog::factory()->create([
            'name' => 'Bello',
            'breed' => 'Labrador Retriever',
            'chip_number' => '276098100123456',
            'is_valid' => true,
        ]);
        Dog::factory()->create([
            'name' => 'Rex',
            'breed' => 'German Shepherd',
            'chip_number' => '276098100654321',
            'is_valid' => false,
        ]);
    }
}
