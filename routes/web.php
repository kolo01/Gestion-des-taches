<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubtasksController;
use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

///Mes routes pour les taches et sous taches (non protegee)

Route::resource('tasks', TasksController::class);
Route::resource('subtasks', SubtasksController::class);

////ajout des routes proteger

Route::middleware(['auth'])->group(function () {
    Route::resource('Tasks', TasksController::class);
    Route::resource('Subtasks', SubtasksController::class);
});


require __DIR__.'/auth.php';
