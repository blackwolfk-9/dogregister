<x-site-layout title="Certificate check">

    <h1>Certificate check for chip {{ $q }}</h1>

    @forelse ($dogs as $dog)
        <p>
            {{ $dog->name }} ({{ $dog->breed }}), chip {{ $dog->chip_number }}:
            @if ($dog->is_valid)
                <span class="text-green-600">valid</span>
            @else
                <span class="text-red-600">revoked</span>
            @endif
        </p>
    @empty
        <p>No dog found.</p>
    @endforelse

    <a href="{{ route('home') }}">Back</a>

</x-site-layout>