<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CambiarContrasenaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->Rol === 'Jefe') {
            return view('Auth.cambiarpassJefe');
        } elseif (auth()->user()->Rol === 'Auxiliar') {
            return view('Auth.cambiarpassAux');
        } elseif (auth()->user()->Rol === 'Cliente') {
            return view('Auth.cambiarpass');
        }
    }
   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'contraActual' => 'required',
            'nuevaContra' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if(!Hash::check($request->contraActual, $user->contrasena)) {
            return back()->withErrors(['contraActual' => 'La contraseña actual es incorrecta']);
        }

        $user->contrasena = Hash::make($request->nuevaContra);
        $user->save();

        return redirect()->back()->with('success', 'Ha cambiado su contraseña correctamente');
    }    
}
