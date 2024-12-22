<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'My Laravel App')</title>

    {{-- Include any additional CSS files here --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- Additional styles section --}}
    @stack('styles')
</head>
<body class="bg-gray-100 text-gray-900">

    {{-- Navbar --}}
    <nav class="bg-blue-600 p-4 text-white">
        <div class="container mx-auto">
            <a href="{{ url('/') }}" class="font-semibold text-lg">Laravel Google Calendar</a>
        </div>
    </nav>

    {{-- Main content --}}
    <div class="container mx-auto my-6">
        @yield('content')
    </div>

    {{-- Footer --}}
    <footer class="bg-gray-800 text-white py-4 mt-auto">
        <div class="container mx-auto text-center">
            &copy; {{ date('Y') }} - My Laravel App
        </div>
    </footer>

    {{-- Include any JavaScript files here --}}
    <script src="{{ asset('js/app.js') }}"></script>

    {{-- Additional scripts section --}}
    @stack('scripts')
</body>
</html>
