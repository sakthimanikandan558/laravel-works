<!-- resources/views/partials/userlist.blade.php -->

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pages as $page)
        <tr>
            <td>{{ $page->name }}</td>
            <td>{{ $page->email }}</td>
            <td>{{ $page->mobileno }}</td>
            <td>{{ $page->created_at }}</td>
            <td>{{ $page->updated_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<!-- Pagination Links -->
{{ $pages->links() }}
