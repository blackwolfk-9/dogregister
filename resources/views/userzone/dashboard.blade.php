<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="p-6 text-gray-900">
        <p>Hello {{ auth()->user()->name }}, the register currently holds:</p>
        <ul class="mt-4 list-disc ml-6">
            <li><a href="{{ route('admin.clients.index') }}" class="underline">{{ $clients_count }} clients</a></li>
            <li><a href="{{ route('admin.dogs.index') }}" class="underline">{{ $dogs_count }} dogs</a></li>
        </ul>

        <h3 class="mt-6 font-semibold">Revoked certificates</h3>
        <ul class="mt-2">
            @forelse ($revoked_dogs as $dog)
                <li>
                    <a href="{{ route('admin.dogs.show', $dog) }}" class="underline">{{ $dog->name }}</a>
                    ({{ $dog->chip_number }})
                </li>
            @empty
                <li>None.</li>
            @endforelse
        </ul>
    </div>
</x-app-layout>
