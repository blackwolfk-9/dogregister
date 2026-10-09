<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit {{ $client->first_name }} {{ $client->last_name }}</h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form method="POST" action="{{ route('admin.clients.update', $client) }}">
            @csrf
            @method('PUT')
            <x-form-text-input name="first_name" label="First name*" value="{{ $client->first_name }}" />
            <x-form-text-input name="last_name" label="Last name*" value="{{ $client->last_name }}" />
            <x-form-text-input name="email" label="Email*" type="email" value="{{ $client->email }}" />
            <x-form-text-input name="phone" label="Phone*" value="{{ $client->phone }}" />
            <x-form-text-input name="address" label="Address*" value="{{ $client->address }}" />
            <x-form-text-input name="birthdate" label="Birthdate*" type="date" value="{{ $client->birthdate }}" />
            <button type="submit" class="mt-4 px-4 py-2 bg-gray-800 text-white rounded">Save</button>
        </form>
    </div>
</x-app-layout>