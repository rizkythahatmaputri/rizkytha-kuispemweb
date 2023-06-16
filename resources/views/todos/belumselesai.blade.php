<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ritha's Activity</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">

    <h1>Tugas Belum Selesai</h1>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <a href="{{ route('todos.index') }}" class="btn btn-primary mb-3">Kembali</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($belumSelesaiTodos as $todo)
            <tr>
                <td>{{ $todo->id }}</td>
                <td>{{ $todo->judul }}</td>
                <td>{{ $todo->deskripsi }}</td>
                <td>{{ $todo->status }}</td>
                <td>
                    <a href="{{ route('todos.show', $todo->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau menghapus To Do List?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
