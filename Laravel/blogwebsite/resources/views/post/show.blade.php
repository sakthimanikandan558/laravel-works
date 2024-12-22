<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function openModal(commentId, commentText) {
            document.getElementById('editCommentId').value = commentId;
            document.getElementById('editCommentText').value = commentText;
            document.getElementById('editCommentModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('editCommentModal').classList.add('hidden');
        }

        $(document).ready(function() {
            $('#likeButton').click(function(e) {
                e.preventDefault();
                var postId = $(this).data('post-id');
                $.ajax({
                    url: '/post/' + postId + '/like',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.isLiked) {
                            $('#likeButton svg').addClass('text-red-500').removeClass('text-gray-500');
                            $('#likeButton svg').attr('fill', 'currentColor');
                        } else {
                            $('#likeButton svg').removeClass('text-red-500').addClass('text-gray-500');
                            $('#likeButton svg').attr('fill', 'none');
                        }
                        $('#likeCount').text(response.likeCount + ' Likes');
                    }
                });
            });
        });
    </script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center">
    <div class="w-full max-w-4xl mt-8">
        <div class="flex justify-between items-center mb-4">
            <a href="{{ route('user.posts') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Back</a>
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Logout</button>
            </form>
        </div>

        @if(session('success'))
            <div class="bg-green-500 text-white p-2 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white p-4 rounded shadow mb-8">
            <h1 class="text-3xl font-bold mb-2">{{ $post->title }}</h1>
            <p class="text-gray-700 mb-4">{{ $post->description }}</p>
            <p class="text-gray-500">Author: {{ $post->user->name }}</p>
            <p class="text-gray-500">Created At: {{ $post->created_at->format('Y-m-d H:i:s') }}</p>
            
            <button id="likeButton" data-post-id="{{ $post->id }}" class="focus:outline-none">
                <svg class="w-8 h-8 {{ $isLiked ? 'text-red-500' : 'text-gray-500' }}" fill="{{ $isLiked ? 'currentColor' : 'none' }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                </svg>
            </button>
            <p id="likeCount" class="mt-2">{{ $post->likes()->count() }} Likes</p>
        </div>

        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-xl font-bold mb-4">Comments</h2>
            <form method="POST" action="{{ route('post.comment', $post) }}" class="mb-4">
                @csrf
                <textarea name="comment" rows="3" class="w-full p-2 border border-gray-300 rounded" placeholder="Add a comment..." required></textarea>
                @error('comment')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded mt-2">Submit Comment</button>
            </form>
            
            @foreach($comments as $comment)
                <div class="border-t border-gray-200 pt-4 mt-4 flex justify-between">
                    <div>
                        <p class="font-semibold">{{ $comment->user->name }}</p>
                        <p>{{ $comment->comment }}</p>
                        <p class="text-gray-500 text-sm">{{ $comment->created_at->format('Y-m-d H:i:s') }}</p>
                    </div>
                    <div class="flex space-x-4 items-center">
                        @if(auth()->user()->id == $comment->user_id)
                            <button onclick="openModal({{ $comment->id }}, '{{ $comment->comment }}')" class=" text-blue-500">Edit</button>
                            <form method="POST" action="{{ route('comment.delete', $comment->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class=" text-red-500 ">Delete</button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Edit Comment Modal -->
    <div id="editCommentModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center">
        <div class="bg-white p-6 rounded shadow-lg w-96">
            <h2 class="text-2xl font-bold mb-4">Edit Comment</h2>
            <form method="POST" action="{{ route('comment.update') }}">
                @csrf
                @method('PATCH')
                <input type="hidden" name="comment_id" id="editCommentId">
                <textarea name="comment" id="editCommentText" rows="3" class="w-full p-2 border border-gray-300 rounded mb-4" required></textarea>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Update Comment</button>
                <button type="button" onclick="closeModal()" class="bg-red-500 text-white px-4 py-2 rounded ml-2">Cancel</button>
            </form>
        </div>
    </div>
</body>
</html>
