<!-- resources/views/todos/edit.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit To Do List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">

<h1>Edit To Do List</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('todos.update', $todo->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="judul">Judul</label>
        <input type="text" class="form-control" id="judul" name="judul" value="{{ $todo->judul }}">
    </div>
    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <textarea class="form-control" id="deskripsi" name="deskripsi">{{ $todo->deskripsi }}</textarea>
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <select class="form-control" id="status" name="status">
            <option value="0" {{ $todo->status == 0 ? 'selected' : '' }}>Belum Selesai</option>
            <option value="1" {{ $todo->status == 1 ? 'selected' : '' }}>Selesai</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>

</div>

</body>

</html>
