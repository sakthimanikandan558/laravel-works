<!DOCTYPE html>
<html>
<head>
    <title>New Task Assigned</title>
</head>
<body>
    <h1>Hello {{ $employee->username }},</h1>
    <p>A new task has been assigned to you:</p>
    <p><strong>Task Title:</strong> {{ $task->title }}</p>
    <p><strong>Description:</strong> {{ $task->description }}</p>
</body>
</html>
