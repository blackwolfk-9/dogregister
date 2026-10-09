<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit {{ $dog->name }}</h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form method="POST" action="{{ route('admin.dogs.update', $dog) }}">
            @csrf
            @method('PUT')
            <x-form-text-input name="name" label="Name*" value="{{ $dog->name }}" />
            <x-form-text-input name="breed" label="Breed*" value="{{ $dog->breed }}" />
            <x-form-text-input name="chip_number" label="Chip number*" value="{{ $dog->chip_number }}" />
            <x-form-text-input name="birthdate" label="Birthdate*" type="date" value="{{ $dog->birthdate }}" />
            <x-form-textarea name="training" label="Training*" value="{{ $dog->training }}" />
            <x-form-select name="is_valid" label="Certificate*" :options="$validity_options" value="{{ $dog->is_valid }}" />
            <x-form-select name="client_id" label="Owner*" :options="$client_options" value="{{ $dog->client_id }}" />
            <button type="submit" class="mt-4 px-4 py-2 bg-gray-800 text-white rounded">Save</button>
        </form>
    </div>
</x-app-layout>