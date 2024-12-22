<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Registration Form</title>
</head>
<body class="bg-sky-100 p-10">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-4">Registration Form</h2>
        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <img src="https://engineering.nyu.edu/sites/default/files/styles/content_header_default_1x/public/2018-10/visiting-student-registration-for-online-courses.jpg?h=102813d3&itok=maAmO8g_" alt="Registration" class="rounded-lg shadow-lg h-[600px]">
            </div>
            <div class="w-full md:w-1/2 px-3">
                <form action="{{ route('validate') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <div>
                        <label for="name" class="block text-gray-700">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" class="border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500 @error('name') border-red-500 @enderror">
                        @error('name')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="age" class="block text-gray-700">Age</label>
                        <input type="text" name="age" id="age" value="{{ old('age') }}" class="border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500 @error('age') border-red-500 @enderror">
                        @error('age')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="email" class="block text-gray-700">Email</label>
                        <input type="text" name="email" id="email" value="{{ old('email') }}" class="border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500 @error('email') border-red-500 @enderror">
                        @error('email')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="domain" class="block text-gray-700">Choose a domain:</label>
                        <select name="domain" id="domain" class="border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500 @error('domain') border-red-500 @enderror">
                            <option value="medical" {{ old('domain') == 'medical' ? 'selected' : '' }}>Medical</option>
                            <option value="engineer" {{ old('domain') == 'engineer' ? 'selected' : '' }}>Engineering</option>
                            <option value="arts" {{ old('domain') == 'arts' ? 'selected' : '' }}>Arts</option>
                        </select>
                        @error('domain')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="mobileno" class="block text-gray-700">Mobile</label>
                        <input type="text" name="mobileno" id="mobileno" value="{{ old('mobileno') }}" class="border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500 @error('mobileno') border-red-500 @enderror">
                        @error('mobileno')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="file" class="block text-gray-700">12th Mark sheet</label>
                        <input type="file" name="file" id="file" class="border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500 @error('file') border-red-500 @enderror">
                        @error('file')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
