<div>
    <div>
        <table class="min-w-full bg-white dark:bg-gray-800">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b border-gray-200 text-gray-800 dark:text-white">Name</th>
                    <th class="py-2 px-4 border-b border-gray-200 text-gray-800 dark:text-white">Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $user->name }}</td>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $user->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>
</div>
