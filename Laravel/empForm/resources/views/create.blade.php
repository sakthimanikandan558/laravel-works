<!DOCTYPE html>
<html>
<head>
    <title>Create Employee</title>
</head>
<body>
    <h1>Create Employee</h1>

    <form action="{{ route('store') }}" method="POST">
        @csrf
        <div>
            <label>Name:</label>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </div>
        <div>
            <label>Email:</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
        </div>
        <div>
            <label>Salary:</label>
            <input type="number" name="salary" value="{{ old('salary') }}" required>
        </div>
        <div>
            <label>Position:</label>
            <input type="text" name="position" value="{{ old('position') }}" required>
        </div>
        <div>
            <label>Department:</label>
            <input type="text" name="department" value="{{ old('department') }}" required>
        </div>
        <button type="submit">Create</button>
    </form>
</body>
</html>
