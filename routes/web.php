<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::patch('/tasks/{task}/toggle', [TaskController::class, 'togglecomplete'])->name('tasks.toggle');
Route::delete('/tasks/{task}', [TaskController::class, 'hapus'])->name('tasks.hapus');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
