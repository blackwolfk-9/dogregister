<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dogs</h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('admin.dogs.create') }}">New dog</a>
        <ul class="mt-4">
            @forelse ($dogs as $dog)
                <li>
                    <a href="{{ route('admin.dogs.show', $dog) }}">{{ $dog->name }}</a>
                    ({{ $dog->breed }}), owner: {{ $dog->client->first_name }} {{ $dog->client->last_name }}
                    @if (! $dog->is_valid) <span class="text-red-600">revoked</span> @endif
                </li>
            @empty
                <li>No dogs yet.</li>
            @endforelse
        </ul>
    </div>
</x-app-layout>