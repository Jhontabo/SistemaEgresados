<?php

namespace App\Http\Controllers;

use App\Models\PersonalInfo; // Asegúrate de tener el modelo correcto
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $personalInfos = PersonalInfo::all();
        $totalUsers = PersonalInfo::count(); // Ejemplo de conteo
        $totalJobs = 0; // Añade la lógica correcta
        $activeEvents = 0; // Añade la lógica correcta
        $totalNews = 0; // Añade la lógica correcta

        // Pasar los datos a la vista
        return view('home', compact('personalInfos', 'totalUsers', 'totalJobs', 'activeEvents', 'totalNews'));
    }
}
