<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



use App\Http\Controllers\ToDoController;

Route::get('/', function () {
    return view('todos.index');
});

Route::get('/', [ToDoController::class, 'thistodos'])->name('todos');

Route::get('/todos', [ToDoController::class, 'index'])->name('todos.index');
Route::get('/todos/create', [ToDoController::class, 'create'])->name('todos.create');
Route::post('/todos', [ToDoController::class, 'store'])->name('todos.store');
Route::get('/todos/{id}', [ToDoController::class, 'show'])->name('todos.show');
Route::get('/todos/{id}/edit', [ToDoController::class, 'edit'])->name('todos.edit');
Route::put('/todos/{id}', [ToDoController::class, 'update'])->name('todos.update');
Route::delete('/todos/{id}', [ToDoController::class, 'destroy'])->name('todos.destroy');

//Route::get('/todos/selesai', [ToDoController@getSelesaiTodos')->name('todos.selesai');
//Route::resource('todos', ToDoController::class);
Route::get('task/selesai', [ToDoController::class, 'SelesaiTodos'])->name('todos.selesai');
Route::get('task/belumselesai', [ToDoController::class, 'BelumSelesaiTodos'])->name('todos.belumselesai');

//Route::get('/todos/belumselesai', 'ToDoController@getBelumSelesaiTodos')->name('todos.belumselesai');


