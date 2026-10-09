<?php

namespace App\Http\Controllers\Userzone;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Dog;
use App\Models\Client;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): View
    {
        $clients_count = Client::count();
        $dogs_count = Dog::count();
        $revoked_dogs = Dog::where('is_valid', false)->latest()->get();

        return view('userzone.dashboard', compact('clients_count', 'dogs_count', 'revoked_dogs'));
    }
}
