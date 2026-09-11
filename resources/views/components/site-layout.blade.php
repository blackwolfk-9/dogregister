<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dogregister</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <nav class="bg-blue-500 text-white p-4">
        <a href="/">Home</a> | <a href="/dogs">Dogs</a>
    </nav>

    <main class="p-4">
        {{ $slot }}
    </main>

    <footer class="bg-gray-200 p-4 mt-8">
        <p>&copy; Dogregister</p>
    </footer>
</body>
</html>