<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">
    <nav class="bg-blue-700 text-white">
        <div class="max-w-4xl mx-auto px-4 py-3 flex items-center">
            <a href="{{ route('home') }}" class="font-bold text-lg mr-8">Dogregister</a>
            @foreach ($menu as $item)
                <a href="{{ $item['url'] }}" class="mr-4 hover:underline">{{ $item['label'] }}</a>
            @endforeach
            <span class="ml-auto">
                @auth
                    <a href="{{ route('admin.dogs.index') }}" class="hover:underline">Admin</a>
                @else
                    <a href="{{ route('login') }}" class="hover:underline">Login</a>
                @endauth
            </span>
        </div>
    </nav>

    <main class="flex-1 max-w-4xl w-full mx-auto px-4 py-6">
        {{ $slot }}
    </main>

    <footer class="bg-gray-200 text-gray-600 text-sm">
        <div class="max-w-4xl mx-auto px-4 py-4 flex">
            <span>&copy; {{ date('Y') }} Dogregister - Assistance dog certification body</span>
            <a href="{{ route('home') }}" class="ml-auto hover:underline">Certificate check</a>
        </div>
    </footer>
</body>
</html>