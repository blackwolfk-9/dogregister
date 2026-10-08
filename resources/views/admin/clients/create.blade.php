<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">New client</h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form method="POST" action="{{ route('admin.clients.store') }}">
            @csrf
            <x-form-text-input name="first_name" label="First name*" />
            <x-form-text-input name="last_name" label="Last name*" />
            <x-form-text-input name="email" label="Email*" type="email" />
            <x-form-text-input name="phone" label="Phone*" />
            <x-form-text-input name="address" label="Address*" />
            <x-form-text-input name="birthdate" label="Birthdate*" type="date" />
            <button type="submit" class="mt-4 px-4 py-2 bg-gray-800 text-white rounded">Save</button>
        </form>
    </div>
</x-app-layout>