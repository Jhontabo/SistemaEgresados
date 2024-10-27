<?php

namespace App\Http\Controllers;

use App\Models\User; // Cambiar a User
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Obtener todos los usuarios
        $users = User::all();

        // Realizar los conteos basados en el modelo User
        $totalUsers = User::count();
        $totalJobs = 0; // Añade la lógica correcta
        $activeEvents = 0; // Añade la lógica correcta
        $totalNews = 0; // Añade la lógica correcta

        // Pasar los datos a la vista
        return view('home', compact('users', 'totalUsers', 'totalJobs', 'activeEvents', 'totalNews'));
    }
}
