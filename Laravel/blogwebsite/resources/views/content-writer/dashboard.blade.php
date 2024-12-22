<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content Writer Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function openEditModal(postId, title, description) {
            document.getElementById('editPostId').value = postId;
            document.getElementById('editTitle').value = title;
            document.getElementById('editDescription').value = description;
            document.getElementById('editPostModal').classList.remove('hidden');
        }

        function closeEditModal() {
            document.getElementById('editPostModal').classList.add('hidden');
        }
    </script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center">
    <div class="w-full max-w-4xl mt-8">
        <div class="flex justify-between items-center space-x-4 mb-4">
            <h1 class="text-2xl font-bold">My Posts</h1>
            <div>
            <button class="bg-blue-500 text-white px-4 py-2 rounded" onclick="document.getElementById('addPostModal').classList.remove('hidden')">Add Post</button>
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Logout</button>
            </form>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-500 text-white p-2 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 gap-4">
            @foreach($posts as $post)
                <div class="bg-white p-4 rounded shadow">
                    <div class="flex justify-between">
                        <div>
                                <span class="text-sm font-semibold {{ $post->is_approved ? 'text-green-500' : ($post->status == 'rejected' ? 'text-red-500' : 'text-yellow-500') }}">
                                {{ $post->is_approved ? 'Approved' : ($post->status == 'rejected' ? 'Rejected' : 'Pending') }}
                                </span>
                                <h2 class="text-xl font-bold">{{ $post->title }}</h2>
                        </div>
                        <div>
                            <button class="text-blue-500 font-semibold" onclick="openEditModal('{{ $post->id }}', '{{ e($post->title) }}', '{{ e($post->description) }}')">Edit</button>
                        </div>
                    </div>
                    <p class="text-gray-700">{{ $post->description }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Add Post Modal -->
    <div id="addPostModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-8 rounded shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-bold mb-4">Add New Post</h2>
            <form method="POST" action="{{ route('content.writer.posts.store') }}">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-gray-700">Title</label>
                    <input id="title" type="text" name="title" value="{{ old('title') }}" required 
                           class="w-full p-2 border border-gray-300 rounded">
                    @error('title')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700">Content</label>
                    <textarea id="description" name="description" required 
                              class="w-full p-2 border border-gray-300 rounded">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex justify-end">
                    <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded mr-2" onclick="document.getElementById('addPostModal').classList.add('hidden')">Cancel</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Post Modal -->
    <div id="editPostModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-8 rounded shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-bold mb-4">Edit Post</h2>
            <form method="POST" action="{{ route('content.writer.posts.update') }}">
                @csrf
                @method('PATCH')
                <input type="hidden" name="post_id" id="editPostId">
                <div class="mb-4">
                    <label for="editTitle" class="block text-gray-700">Title</label>
                    <input id="editTitle" type="text" name="title" required class="w-full p-2 border border-gray-300 rounded">
                    @error('title')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="editDescription" class="block text-gray-700">Content</label>
                    <textarea id="editDescription" name="description" required class="w-full p-2 border border-gray-300 rounded"></textarea>
                    @error('description')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex justify-end">
                    <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded mr-2" onclick="closeEditModal()">Cancel</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
