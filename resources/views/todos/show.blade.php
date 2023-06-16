<!-- resources/views/todos/show.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">

<h1>To Do List Details</h1>

<table class="table">
    <tr>
        <th>ID</th>
        <td>{{ $todo->id }}</td>
    </tr>
    <tr>
        <th>Judul</th>
        <td>{{ $todo->judul }}</td>
    </tr>
    <tr>
        <th>Deskripsi</th>
        <td>{{ $todo->deskripsi }}</td>
    </tr>
    <tr>
        <th>Status</th>
        <td>{{ $todo->status ? 'Selesai' : 'Belum Selesai' }}</td>
    </tr>
</table>

<a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-primary">Edit</a>
<form action="{{ route('todos.destroy', $todo->id) }}" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin mau menghapus To Do List?')">Delete</button>
</form>

<a href="{{ route('todos.index') }}" class="btn btn-primary">Back</a>

    </div>

</body>

</html>