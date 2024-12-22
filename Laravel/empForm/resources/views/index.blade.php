<!DOCTYPE html>
<html>
<head>
    <title>All Employees</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 50px 0;
            font-size: 18px;
            text-align: left;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        h1 {
            text-align: center;
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Employee List</h1>

        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Salary</th>
                    <th>Position</th>
                    <th>Department</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($employees as $employee)
                    <tr>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->salary }}</td>
                        <td>{{ $employee->position }}</td>
                        <td>{{ $employee->department }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No employees found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <a href="{{ route('create') }}">Create another employee</a>

    </div>
</body>
</html>
