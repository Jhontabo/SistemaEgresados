<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;
use Illuminate\Support\Facades\DB;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $totalNews = Noticia::count();
        $news = Noticia::orderBy('fecha_publicacion', 'desc')->get();

        return view('noticias.index', compact('totalNews', 'news'));
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $noticia = Noticia::findOrFail($id);
        return view('noticias.show', compact('noticia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
