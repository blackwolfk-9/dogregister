<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Lists all clients
        $clients = Client::get();

        return view('admin.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //gives the form for creating a client
        return view('admin.clients.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name'  => ['required', 'string', 'max:255'],
            'email'      => ['required', 'string', 'max:255'],
            'phone'      => ['required', 'string', 'max:255'],
            'address'    => ['required', 'string', 'max:255'],
            'birthdate'  => ['required', 'string', 'max:255'],
        ]);

        Client::create([
            'first_name' => $request['first_name'],
            'last_name'  => $request['last_name'],
            'email'      => $request['email'],
            'phone'      => $request['phone'],
            'address'    => $request['address'],
            'birthdate'  => $request['birthdate'],
            'user_id'    => auth()->id(),
        ]);

        return redirect()->route('admin.clients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //shows a specific client with by id
        return view('admin.clients.show', compact('client'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //loads the form with a spesific client filled.
        return view('admin.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //saves the form without the userid and goves the show back
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name'  => ['required', 'string', 'max:255'],
            'email'      => ['required', 'string', 'max:255'],
            'phone'      => ['required', 'string', 'max:255'],
            'address'    => ['required', 'string', 'max:255'],
            'birthdate'  => ['required', 'string', 'max:255'],
        ]);

        $client->update([
            'first_name' => $request['first_name'],
            'last_name'  => $request['last_name'],
            'email'      => $request['email'],
            'phone'      => $request['phone'],
            'address'    => $request['address'],
            'birthdate'  => $request['birthdate'],
        ]);

        return redirect()->route('admin.clients.show', $client);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //deletes a client but only if there are no dogs with the client
        if ($client->dogs->count() > 0) {
            abort(403);
        }

        $client->delete();

        return redirect()->route('admin.clients.index');
    }
}
