<x-site-layout title="Home">

    <h1>Welcome to the dogregister</h1>
    <form action="{{ route('dogs.search') }}" method="GET">
        <input type="text" name="q" placeholder="Chip number">
        <button type="submit">Check</button>
    </form>
</x-site-layout>