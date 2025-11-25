<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

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


Route::middleware(['auth'])->group(function () {

    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index'); // afficher la liste des tâches
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create'); // vue pour la création
    Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show'); // pour afficher une tache spécifique
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store'); // envoyer les modification dans la BD
    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit'); // afficher la vue de la modification
    Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update'); // modification de la tâche
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy'); //supprimer une tâche
});

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/users', [UserController::class, 'index'])->name('users.index'); 
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create'); 
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show'); 
    Route::post('/users', [UserController::class, 'store'])->name('users.store'); 
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit'); 
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update'); 
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy'); 
});

require __DIR__.'/auth.php';
