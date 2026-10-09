<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dogs</h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('admin.dogs.create') }}" class="inline-block px-4 py-2 bg-gray-800 text-white rounded">New dog</a>
        <ul class="mt-6 space-y-2">
            @forelse ($dogs as $dog)
                <li>
                    <a href="{{ route('admin.dogs.show', $dog) }}" class="text-blue-600 underline">{{ $dog->name }}</a>
                    ({{ $dog->breed }}), owner: {{ $dog->client->first_name }} {{ $dog->client->last_name }}
                    @if (! $dog->is_valid) <span class="text-red-700 font-semibold">revoked</span> @endif
                </li>
            @empty
                <li>No dogs yet.</li>
            @endforelse
        </ul>
    </div>
</x-app-layout>