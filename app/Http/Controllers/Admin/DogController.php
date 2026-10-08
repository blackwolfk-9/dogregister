<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dog;
use App\Models\Client;

class DogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //shows all the dogs
        $dogs = Dog::get();

        return view('admin.dogs.index', compact('dogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //loads the form to create a dog
         $client_options = Client::orderBy('last_name')->pluck('last_name', 'id')->toArray();
        $validity_options = [1 => 'valid', 0 => 'revoked'];

        return view('admin.dogs.create', compact('client_options', 'validity_options'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //stores the created dog
        $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'breed'       => ['required', 'string', 'max:255'],
            'chip_number' => ['required', 'string', 'max:255'],
            'birthdate'   => ['required', 'string', 'max:255'],
            'training'    => ['required', 'string'],
            'is_valid'    => ['required', 'integer'],
            'client_id'   => ['required', 'integer', 'exists:clients,id'],
        ]);

        Dog::create([
            'name'        => $request['name'],
            'breed'       => $request['breed'],
            'chip_number' => $request['chip_number'],
            'birthdate'   => $request['birthdate'],
            'training'    => $request['training'],
            'is_valid'    => $request['is_valid'],
            'client_id'   => $request['client_id'],
        ]);

        return redirect()->route('admin.dogs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dog $dog)
    {
        //shows one dog
        return view('admin.dogs.show', compact('dog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
