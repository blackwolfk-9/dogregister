<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Clients</h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <p>Hello {{ auth()->user()->name }}</p>

        <ul>
            @forelse ($clients as $client)
                <li>{{ $client->first_name }} {{ $client->last_name }} ({{ $client->email }})</li>
            @empty
                <li>No clients yet.</li>
            @endforelse
        </ul>
    </div>
</x-app-layout>