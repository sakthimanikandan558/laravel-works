<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Application')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
<body class="bg-gray-100">
    <nav class="bg-blue-500 shadow-lg fixed top-0 w-full">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex-shrink-0">
                        <a class="navbar-brand text-2xl font-bold text-white" href="#">My Application</a>
                    </div>
                    <div class="hidden sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <a href="{{ url('/products') }}" class="text-white hover:bg-blue-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Home</a>
                            <a href="{{ url('/products') }}" class="text-white hover:bg-blue-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Products</a>
                        </div>
                    </div>
                </div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Logout</button>
                </div>
            </div>
        </div>
    </nav>
    
    <div class="container mx-auto mt-8">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    @yield('scripts')
</body>
</html>
