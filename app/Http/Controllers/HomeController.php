<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonalInfo;

class HomeController extends Controller
{


    public function index()
    {
        // Obtener la información personal desde la base de datos
        $personalInfos = PersonalInfo::all();

        // Pasar la variable a la vista
        return view('home', ['personalInfos' => $personalInfos]);
    }
}
