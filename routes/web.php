<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NoticiaController;

Auth::routes();

// Ruta de bienvenida para usuarios no autenticados
Route::get('/', function () {
    return view('welcome');  // Vista welcome para la página inicial
})->name('welcome');

// Ruta para home, accesible solo para usuarios autenticados y verificados
Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

// Rutas para las noticias
Route::get('/noticias', [NoticiaController::class, 'index']);

Route::get('/noticias/{id}', [NoticiaController::class, 'show'])->name('noticias.show');

// Perfil de usuario
Route::middleware('auth')->group(function () {
    Route::get('/perfil', [ProfileController::class, 'edit'])->name('perfil.edit');
    Route::patch('/perfil', [ProfileController::class, 'update'])->name('perfil.update');
});
