<x-site-layout title="Home">

    <section class="max-w-2xl mx-auto text-center mt-8">
        <h1 class="text-4xl font-bold text-blue-700">Assistance Dog Register</h1>
        <p class="mt-4 text-lg text-gray-700">
            This is the official register of certified assistance dogs. Every dog that passed
            its training is listed here with its microchip number.
        </p>
        <p class="mt-2 text-gray-600">
            Shops, landlords, airlines and authorities can check in seconds whether a dog holds a
            valid certificate. The register is maintained by the staff of the certification body.
        </p>
    </section>

    <section class="max-w-md mx-auto mt-10 bg-white border border-gray-200 rounded-lg shadow p-6">
        <h2 class="text-xl font-semibold text-gray-800">Check a certificate</h2>
        <p class="mt-1 text-sm text-gray-500">Enter the microchip number of the dog.</p>

        <form action="{{ route('dogs.search') }}" method="GET" class="mt-4 flex gap-2">
            <input type="text" name="q" placeholder="Chip number"
                   class="flex-1 border border-gray-300 rounded px-3 py-2">
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded">
                Check
            </button>
        </form>

        <p class="mt-3 text-xs text-gray-500">
            Try an example: <code>276098100123456</code> (valid) or <code>276098100654321</code> (revoked)
        </p>
    </section>

</x-site-layout>