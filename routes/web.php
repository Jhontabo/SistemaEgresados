<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

Auth::routes();

// Ruta de bienvenida para usuarios no autenticados
Route::get('/', function () {
    return view('welcome');  // Vista welcome para la página inicial
})->name('welcome');

// Ruta para home, que solo es accesible para usuarios autenticados y verificados
Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

// Opcional: Rutas del perfil de usuario si es necesario
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
