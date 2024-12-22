<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            padding: 20px;
            max-width: 800px;
            margin: auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Employee List</h1>

        @if($employeeCount==0)
            <h1>No employees found.</h1>
        @else
        <h1>Total Number of Employees : {{$employeeCount}}</h1>
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
                    @foreach($employees as $employee)
                        <tr>
                            <td>{{ $employee['name'] }}</td>
                            <td>{{ $employee['email'] }}</td>
                            <td>{{ $employee['salary'] }}</td>
                            <td>
                                @isset($employee['position'])
                                    {{ $employee['position'] }}
                                @else
                                    Position not set
                                @endisset
                            </td>
                            <td>
                                @unless($employee['department'] == 'Unknown')
                                    {{ $employee['department'] }}
                                @else
                                    Department not set
                                @endunless
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>
