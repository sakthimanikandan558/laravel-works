<div>
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @endif

    <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg p-6">
        <form wire:submit.prevent="submit">
            <div class="mb-4">
                <label for="name" class="block text-green-600 font-bold mb-2">Name</label>
                <input type="text" id="name" wire:model="name" class="w-full px-4 py-2 border border-green-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600">
                @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-green-600 font-bold mb-2">Email</label>
                <input type="email" id="email" wire:model="email" class="w-full px-4 py-2 border border-green-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600">
                @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-green-600 font-bold mb-2">Password</label>
                <input type="password" id="password" wire:model="password" class="w-full px-4 py-2 border border-green-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600">
                @error('password') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="image" class="block text-green-600 font-bold mb-2">Upload Image</label>
                <input type="file" id="image" wire:model="image" class="w-full px-4 py-2 border border-green-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600">
                @error('image') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Image Preview -->
            @if ($image)
                <div class="mt-4">
                    <img src="{{ $image->temporaryUrl() }}" alt="Preview" class="w-24 h-24 object-cover rounded-lg shadow-lg">
                </div>
            @endif

            <button type="submit" class="w-full bg-green-600 text-white font-bold py-2 px-4 rounded-lg mt-4 hover:bg-green-700 transition duration-300">
                Submit
            </button>
        </form>
    </div>
</div>
