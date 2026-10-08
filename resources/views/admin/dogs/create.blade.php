<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">New dog</h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form method="POST" action="{{ route('admin.dogs.store') }}">
            @csrf
            <x-form-text-input name="name" label="Name*" />
            <x-form-text-input name="breed" label="Breed*" />
            <x-form-text-input name="chip_number" label="Chip number*" />
            <x-form-text-input name="birthdate" label="Birthdate*" type="date" />
            <x-form-textarea name="training" label="Training*" />
            <x-form-select name="is_valid" label="Certificate*" :options="$validity_options" />
            <x-form-select name="client_id" label="Owner*" :options="$client_options" />
            <button type="submit" class="mt-4 px-4 py-2 bg-gray-800 text-white rounded">Save</button>
        </form>
    </div>
</x-app-layout>