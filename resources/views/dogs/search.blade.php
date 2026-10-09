<x-site-layout title="Certificate check">

    <section class="max-w-md mx-auto mt-8">
        <h1 class="text-2xl font-bold text-gray-800">Certificate check</h1>
        <p class="mt-1 text-sm text-gray-500">Chip number: <code>{{ $q }}</code></p>

        @forelse ($dogs as $dog)
            @if ($dog->is_valid)
                <div class="mt-4 bg-green-50 border border-green-300 rounded-lg p-6">
                    <p class="text-green-700 font-bold text-lg">Valid certificate</p>
            @else
                <div class="mt-4 bg-red-50 border border-red-300 rounded-lg p-6">
                    <p class="text-red-700 font-bold text-lg">Certificate revoked</p>
            @endif
                    <p class="mt-3"><strong>Name:</strong> {{ $dog->name }}</p>
                    <p><strong>Breed:</strong> {{ $dog->breed }}</p>
                    <p><strong>Chip:</strong> <code>{{ $dog->chip_number }}</code></p>
                </div>
        @empty
            <div class="mt-4 bg-gray-50 border border-gray-300 rounded-lg p-6">
                <p class="font-bold text-gray-700">No dog found</p>
                <p class="mt-1 text-sm text-gray-500">There is no dog with this chip number in the register.</p>
            </div>
        @endforelse

        <a href="{{ route('home') }}" class="inline-block mt-6 text-blue-600 underline">Back to search</a>
    </section>

</x-site-layout>