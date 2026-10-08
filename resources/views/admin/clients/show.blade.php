<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $client->first_name }} {{ $client->last_name }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <p>Email: {{ $client->email }}</p>
        <p>Phone: {{ $client->phone }}</p>
        <p>Address: {{ $client->address }}</p>
        <p>Responsible: {{ $client->user->name }}</p>

        <h3 class="mt-6 font-semibold">Dogs</h3>
        <ul>
            @forelse ($client->dogs as $dog)
                <li>{{ $dog->name }} ({{ $dog->breed }}), chip {{ $dog->chip_number }}</li>
            @empty
                <li>No dogs yet.</li>
            @endforelse
        </ul>
        <a href="{{ route('admin.clients.edit', $client) }}">Edit</a>
        <a href="{{ route('admin.clients.index') }}">Back to list</a>
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