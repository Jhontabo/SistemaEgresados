<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Models\User;

class ProfileController extends Controller
{
    // Mostrar la página de edición de perfil
    public function edit()
    {
        $user = Auth::user();
        return view('perfil.edit', compact('user'));
    }

    // Actualizar los datos del perfil
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'titulo' => 'nullable|string|max:255',
            'institucion' => 'nullable|string|max:255',
            'empresa' => 'nullable|string|max:255',
            'cargo' => 'nullable|string|max:255',
            'fecha_inicio' => 'nullable|date',
            'estado_laboral' => 'nullable|string',
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->fill($request->only([
            'name',
            'telefono',
            'titulo',
            'institucion',
            'empresa',
            'cargo',
            'fecha_inicio',
            'estado_laboral'
        ]));
        $user->save();

        return redirect()->route('perfil.edit')->with('status', 'Perfil actualizado con éxito.');
    }
}
