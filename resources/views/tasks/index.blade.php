<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
</head>
<body>
    <h1>Task Manager</h1>

    @if ($errors->any())
        <p style="color:red">{{ $errors->first() }}</p>
    @endif

    <form action="/tasks" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Enter a task" required>
        <button type="submit">Add Task</button>
    </form>

    <h2>My Tasks</h2>

    @forelse ($tasks as $task)
        <div>
            {{ $task->title }}

            <form action="/tasks/{{ $task->id }}" method="POST"
                  style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>
    @empty
        <p>No tasks yet. Add your first task!</p>
    @endforelse
</body>
</html>
