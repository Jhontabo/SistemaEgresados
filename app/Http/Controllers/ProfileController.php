<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Muestra la vista de edición del perfil del usuario autenticado.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        // Obtén el usuario autenticado
        $user = Auth::user();

        // Retorna la vista del perfil con los datos del usuario
        return view('perfil.edit', compact('user'));
    }

    /**
     * Actualiza los datos del perfil del usuario autenticado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'residence' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
        ]);

        // Obtén el usuario autenticado
        $user = Auth::user();

        // Actualiza los campos del perfil
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->residence = $request->input('residence');
        $user->company = $request->input('company');
        $user->position = $request->input('position');

        // Redirige con un mensaje de éxito
        return redirect()->route('perfil.edit')->with('success', 'Perfil actualizado con éxito.');
    }
}
