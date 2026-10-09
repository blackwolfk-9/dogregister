<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <nav class="bg-blue-500 text-white p-4">
        @foreach ($menu as $item)
             <a href="{{ $item['url'] }}" class="mr-4">{{ $item['label'] }}</a>   
        @endforeach
        @auth
            <a href="{{ route('admin.dogs.index') }}" class="mr-4">Admin</a>
        @else
            <a href="{{ route('login') }}" class="mr-4">Login</a>
        @endauth
    </nav>

    <main class="p-4">
        {{ $slot }}
    </main>

    <footer class="bg-gray-200 p-4 mt-8">
        <p>&copy; Dogregister</p>
    </footer>
</body>
</html>