<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Noticia;
use App\Models\OfertaLaboral; // Importar el modelo de ofertas laborales
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Obtener el total de usuarios registrados
        $totalUsers = User::count();

        // Obtener el total de noticias
        $totalNews = Noticia::count();

        // Obtener el total de ofertas laborales
        $totalJobs = OfertaLaboral::count();

        // Obtener las últimas noticias
        $news = Noticia::latest()->take(5)->get();

        // Obtener las últimas ofertas laborales
        $jobs = OfertaLaboral::latest()->take(5)->get();

        return view('home', compact('totalUsers', 'totalNews', 'totalJobs', 'news', 'jobs'));
    }
}
