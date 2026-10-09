<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <p>Hello {{ auth()->user()->name }}, the register currently holds:</p>
        <ul class="mt-4 list-disc ml-6">
            <li><a href="{{ route('admin.clients.index') }}" class="text-blue-600 underline">{{ $clients_count }} clients</a></li>
            <li><a href="{{ route('admin.dogs.index') }}" class="text-blue-600 underline">{{ $dogs_count }} dogs</a></li>
        </ul>

        <h3 class="mt-6 font-semibold">Revoked certificates</h3>
        <ul class="mt-2">
            @forelse ($revoked_dogs as $dog)
                <li>
                    <a href="{{ route('admin.dogs.show', $dog) }}" class="text-blue-600 underline">{{ $dog->name }}</a>
                    ({{ $dog->chip_number }})
                </li>
            @empty
                <li>None.</li>
            @endforelse
        </ul>
    </div>
</x-app-layout>
