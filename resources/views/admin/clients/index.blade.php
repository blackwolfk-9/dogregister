<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Clients</h2>
    </x-slot>
    
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('admin.clients.create') }}" class="inline-block px-4 py-2 bg-gray-800 text-white rounded">New client</a>
        <p class="mt-4">Hello {{ auth()->user()->name }}</p>

        <ul class="mt-6 space-y-2">
            @forelse ($clients as $client)
                <li>
                    <a class="text-blue-600 underline" href="{{ route('admin.clients.show', $client) }}">{{ $client->first_name }} {{ $client->last_name }}</a>
                    ({{ $client->email }})
                </li>
            @empty
                <li>No clients yet.</li>
            @endforelse
        </ul>
    </div>
</x-app-layout>