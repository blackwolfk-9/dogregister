<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $dog->name }}</h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <p>Breed: {{ $dog->breed }}</p>
        <p>Chip number: {{ $dog->chip_number }}</p>
        <p>Birthdate: {{ $dog->birthdate }}</p>
        <p>Training: {{ $dog->training }}</p>
        <p>Certificate: {{ $dog->is_valid ? 'valid' : 'revoked' }}</p>
        <p>Owner: <a href="{{ route('admin.clients.show', $dog->client) }}">{{ $dog->client->first_name }} {{ $dog->client->last_name }}</a></p>

        <a href="{{ route('admin.dogs.index') }}">Back to list</a>
        <a href="{{ route('admin.dogs.edit', $dog) }}">Edit</a>
    </div>
</x-app-layout>