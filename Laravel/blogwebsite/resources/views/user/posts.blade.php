<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User - Approved Posts</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.like-button').click(function(e) {
                e.preventDefault();
                var postId = $(this).data('post-id');
                var button = $(this);
                $.ajax({
                    url: '/post/' + postId + '/like',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.isLiked) {
                            button.find('svg').addClass('text-red-500').removeClass('text-gray-500');
                            button.find('svg').attr('fill', 'currentColor');
                        } else {
                            button.find('svg').removeClass('text-red-500').addClass('text-gray-500');
                            button.find('svg').attr('fill', 'none');
                        }
                        button.siblings('.like-count').text(response.likeCount + ' Likes');
                    }
                });
            });
        });
    </script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center">
    <div class="w-full max-w-4xl mt-8">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Approved Posts</h1>
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

        <div class="grid grid-cols-1 gap-4">
            @foreach($posts as $post)
                <div class="bg-white p-4 rounded shadow">
                    <a href="{{ route('post.show', $post) }}">
                        <h2 class="text-xl font-bold">{{ $post->title }}</h2>
                        <p class="text-gray-700">{{ $post->description }}</p>
                        <div class="flex justify-between">
                            <div>
                                <p class="text-gray-500">Author: {{ $post->user->name }}</p>
                                <p class="text-gray-500">Created At: {{ $post->created_at->format('j F Y') }}</p>
                            </div>
                            <div class="flex items-center mt-2">
                                <button class="like-button focus:outline-none" data-post-id="{{ $post->id }}">
                                    <svg class="w-6 h-6 {{ $post->likes->contains('user_id', Auth::id()) ? 'text-red-500' : 'text-gray-500' }}" fill="{{ $post->likes->contains('user_id', Auth::id()) ? 'currentColor' : 'none' }}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                    </svg>
                                </button>
                                <p class="like-count ml-2">{{ $post->likes()->count() }} Likes</p>
                            </div>
                        </div>
                    </a>

                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
