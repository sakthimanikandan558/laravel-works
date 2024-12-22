<!DOCTYPE html>
<html>
<head>
    <title>Employee Details</title>
    <style>
        table {
            width: 50%;
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
    </style>
</head>
<body>
    <h1>Employee Details</h1>

    <table>
        <tr>
            <th>Name</th>
            <td>{{ $employee->name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $employee->email }}</td>
        </tr>
        <tr>
            <th>Salary</th>
            <td>{{ $employee->salary }}</td>
        </tr>
        <tr>
            <th>Position</th>
            <td>{{ $employee->position }}</td>
        </tr>
        <tr>
            <th>Department</th>
            <td>{{ $employee->department }}</td>
        </tr>
    </table>

    <a href="{{ route('create') }}">Create another employee</a>
    <br>
    <a href="{{ route('index') }}" class="link">List All Employees</a>
</body>
</html>
