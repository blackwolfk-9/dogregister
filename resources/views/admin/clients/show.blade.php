<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $client->first_name }} {{ $client->last_name }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <p class="mt-2">Email: {{ $client->email }}</p>
        <p class="mt-2">Phone: {{ $client->phone }}</p>
        <p class="mt-2">Address: {{ $client->address }}</p>
        <p class="mt-2">Responsible: {{ $client->user->name }}</p>

        <h3 class="mt-6 font-semibold">Dogs</h3>
        <ul class="mt-2 space-y-2">
            @forelse ($client->dogs as $dog)
                <li><a href="{{ route('admin.dogs.show', $dog) }}" class="text-blue-600 underline">{{ $dog->name }}</a> ({{ $dog->breed }}), chip {{ $dog->chip_number }}</li>
            @empty
                <li>No dogs yet.</li>
            @endforelse
        </ul>
        <div class="mt-6 flex gap-4">
            <a href="{{ route('admin.clients.index') }}" class="text-gray-600 underline">Back to list</a>
            <a href="{{ route('admin.clients.edit', $client) }}" class="inline-block px-4 py-2 bg-gray-800 text-white rounded">Edit</a>
        </div>
        @if ($client->dogs->count() > 0)
            <p class="mt-6 text-gray-500">This client has dogs and cannot be deleted.</p>
        @else
            <form method="POST" action="{{ route('admin.clients.destroy', $client) }}" class="mt-6">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded">Delete client</button>
            </form>
        @endif
    </div>
</x-app-layout>