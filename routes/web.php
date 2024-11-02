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

Route::get('/perfil', [ProfileController::class, 'edit'])->name('perfil.edit');
Route::put('/perfil', [ProfileController::class, 'update'])->name('perfil.update');


Route::middleware('auth')->group(function () {
    Route::get('/perfil', [ProfileController::class, 'edit'])->name('perfil.edit');
    Route::patch('/perfil', [ProfileController::class, 'update'])->name('perfil.update'); // Aquí defines la ruta para actualizar el perfil
});
