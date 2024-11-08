<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\OfertaLaboralController;

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


Route::get('/ofertas', [OfertaLaboralController::class, 'index'])->name('ofertas.index');

Route::get('/ofertas/{id}', [OfertaLaboralController::class, 'show'])->name('ofertas.show');


Route::get('/dashboard', function () {
    return redirect()->route('dashboard');
})->name('dashboard');



// Perfil de usuario
Route::middleware('auth')->group(function () {
    Route::get('/perfil', [ProfileController::class, 'edit'])->name('perfil.edit'); // Cambiar el nombre aquí
    Route::match(['put', 'patch'], '/perfil', [ProfileController::class, 'update'])->name('perfil.update');
});
