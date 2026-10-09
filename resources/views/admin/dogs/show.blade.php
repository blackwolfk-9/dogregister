<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $dog->name }}</h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <p class="mt-2">Breed: {{ $dog->breed }}</p>
        <p class="mt-2">Chip number: {{ $dog->chip_number }}</p>
        <p class="mt-2">Birthdate: {{ $dog->birthdate }}</p>
        <p class="mt-2">Training: {{ $dog->training }}</p>
        <p class="mt-2">Certificate:
            @if ($dog->is_valid)
                <span class="text-green-700 font-semibold">valid</span>
            @else
                <span class="text-red-700 font-semibold">revoked</span>
            @endif
        </p>
        <p class="mt-2">Owner: <a href="{{ route('admin.clients.show', $dog->client) }}" class="text-blue-600 underline">{{ $dog->client->first_name }} {{ $dog->client->last_name }}</a></p>

        <div class="mt-6 flex gap-4">
            <a href="{{ route('admin.dogs.index') }}" class="text-gray-600 underline">Back to list</a>
            <a href="{{ route('admin.dogs.edit', $dog) }}" class="inline-block px-4 py-2 bg-gray-800 text-white rounded">Edit</a>
        </div>
        <form method="POST" action="{{ route('admin.dogs.destroy', $dog) }}" class="mt-6">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded">Delete dog</button>
        </form>
    </div>
</x-app-layout>