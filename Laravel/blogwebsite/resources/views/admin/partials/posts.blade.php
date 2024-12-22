<table class="min-w-full bg-white rounded-lg shadow overflow-hidden">
    <thead class="bg-gray-800 text-white">
        <tr>
            <th class="p-4">Title</th>
            <th class="p-4">Content</th>
            <th class="p-4">Author</th>
            <th class="p-4">Created At</th>
            <th class="p-4">Status</th>
            <th class="p-4">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
            <tr class="border-b border-gray-200">
                <td class="p-4">{{ $post->title }}</td>
                <td class="p-4">{{ $post->description }}</td>
                <td class="p-4">{{ $post->user->name }}</td>
                <td class="p-4">{{ $post->created_at->format('Y-m-d H:i:s') }}</td>
                <td class="p-4">
                    @if($post->is_approved)
                        <span class="text-green-500 font-medium p-2">Approved</span>
                    @elseif($post->status === 'rejected')
                        <span class="text-red-500 p-2 font-medium">Rejected</span>
                    @else
                        <span class="text-yellow-500 p-2">Pending</span>
                    @endif
                </td>
                <td class="p-4 pt-8 flex space-x-2 justify-center items-center">
                    <form action="{{ route('admin.posts.approve', $post) }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="bg-blue-500 text-white p-2 rounded {{ $post->is_approved ? 'opacity-50 cursor-not-allowed' : '' }}" {{ $post->is_approved ? 'disabled' : '' }}>Approve</button>
                    </form>
                    <form action="{{ route('admin.posts.reject', $post) }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white p-2 rounded {{ $post->status === 'rejected' ? 'opacity-50 cursor-not-allowed' : '' }}" {{ $post->status === 'rejected' ? 'disabled' : '' }}>Reject</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="mt-4 pagination">
    {{ $posts->links() }}
</div>
