<?php

namespace App\Http\Controllers;

use App\Models\OfertaLaboral;
use Illuminate\Http\Request;

class OfertaLaboralController extends Controller
{
    /**
     * Mostrar el listado de ofertas laborales.
     */
    public function index()
    {
        $jobs = OfertaLaboral::latest()->get();
        return view('ofertas.index', compact('jobs'));
    }

    /**
     * Mostrar los detalles de una oferta laboral específica.
     */

    public function show($id)
    {
        // Obtener la oferta laboral por su ID
        $oferta = OfertaLaboral::findOrFail($id);

        // Pasar la oferta a la vista
        return view('ofertas.show', compact('oferta'));
    }
}
