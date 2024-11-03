<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Noticia;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Obtener todos los usuarios y contar total de usuarios
        $totalUsers = User::count();

        // Lógica para totalJobs y activeEvents (modificar con tus propios modelos o lógica)
        $totalJobs = 0; // Ejemplo: Reemplaza con tu lógica o modelo correcto
        $activeEvents = 0; // Ejemplo: Reemplaza con tu lógica o modelo correcto

        // Contar el total de noticias en la base de datos
        $totalNews = Noticia::count();

        // Obtener las noticias más recientes (modifica la cantidad si deseas mostrar más)
        $news = Noticia::latest()->take(5)->get();

        // Pasar todos los datos a la vista
        return view('home', compact('totalUsers', 'totalJobs', 'activeEvents', 'totalNews', 'news'));
    }
}
