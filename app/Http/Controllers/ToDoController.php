<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    public function index()
{
    $todos = ToDo::all();
    return view('todos.index', compact('todos'));
}

    public function thistodos(){
        $todo = ToDo::get();
    
        $todos = ToDo::all();
    return view('todos.index', compact('todos'));
    }

    public function create(){
    return view('todos.create');
}

public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'status' => 'required',
        ]);

        ToDo::create($request->all());

        return redirect()->route('todos.index')->with('success', 'Entri berhasil ditambahkan');
    }

    public function show($id)
    {
        $todo = ToDo::findOrFail($id);
        return view('todos.show', compact('todo'));
    }

    public function edit($id)
    {
        $todo = ToDo::findOrFail($id);
        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'status' => 'required',
        ]);

        $todo = ToDo::findOrFail($id);
        $todo->update($request->all());

        return redirect()->route('todos.index')->with('success', 'Entri berhasil diperbarui');
    }

    public function destroy($id)
    {
        $todo = ToDo::findOrFail($id);
        $todo->delete();

        return redirect()->route('todos.index')->with('success', 'Entri berhasil dihapus');
    }
    
    public function SelesaiTodos()
{
    $selesaiTodos = ToDo::where('status', 'selesai')->get();
    return view('todos.selesai', compact('selesaiTodos'));
}

    public function belumSelesaiTodos()
{
    $belumSelesaiTodos = ToDo::where('status', 'Belum Selesai')->get();
    return view('todos.belumselesai', compact('belumSelesaiTodos'));
}
}
