@<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Page title -->
    <title>@yield('title', 'Barangay Bulletin - Purok Genilla')</title>

    <!-- Load Tailwind CSS and JavaScript through Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-100 text-gray-800">

    <!-- Main navigation -->
    <header class="bg-blue-800 text-white shadow">
        <nav class="mx-auto max-w-6xl px-4 py-5">
            <a href="{{ url('/posts') }}" class="text-xl font-bold">
                Barangay Bulletin - Purok Genilla
            </a>
        </nav>
    </header>

    <!-- Content from individual Blade pages -->
    <main class="mx-auto max-w-6xl px-4 py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="mt-10 bg-gray-200 py-5 text-center text-sm">
        <p>&copy; {{ date('Y') }} Purok Genilla Bulletin</p>
    </footer>

</body>
</html>