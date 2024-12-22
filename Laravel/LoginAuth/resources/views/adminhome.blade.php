<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"></head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="w-full max-w-md bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 text-center">
        <h2 class="text-2xl font-bold mb-4">Hello, Admin {{ auth()->user()->name }}</h2>
        <a href="logout" 
           class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Logout
        </a>
    </div>
</body>
</html>
