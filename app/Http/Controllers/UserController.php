<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\vistaUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Recuperar usuarios
        $usuariosCompras = DB::table('vistausuarios')
                     ->where ('departamento','Compras')
                     ->get();
        
        $usuariosContabilidad = DB::table('vistausuarios')
                     ->where ('departamento','Contabilidad')
                     ->get();
                    
        $usuariosLogistica = DB::table('vistausuarios')
                     ->where('departamento','Logística')
                     ->get();

        $usuariosProduccion = DB::table('vistausuarios')
                     ->where('departamento','Producción')
                     ->get();
        
        $usuariosVentas = DB::table('vistausuarios')
                     ->where('departamento','Ventas')
                     ->get();

        $usuariosSoporte = DB::table('vistausuarios')
                     ->where('departamento', 'Soporte')
                     ->get();
                        
        // Pasar los tickets a la vista correspondiente
        return view('jefe.showUsers', compact('usuariosCompras', 'usuariosContabilidad', 'usuariosLogistica', 'usuariosProduccion', 'usuariosVentas', 'usuariosSoporte'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('jefe.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validar los datos del fromulario
        $validarDatos = $request->validate([
            'Nombre' => 'required|string|max:200',
            'departamento' => 'required',
            'Rol' => 'required|string|max:10',
            'email' => 'required|string|email|max:80|unique:usuarios',
            'contrasena' => 'required|string|min:8|confirmed',
        ]);

        //Guardar el usuario
        $user = new User;
        $user->Nombre = $validarDatos['Nombre']; 
        $user->departamento = $validarDatos['departamento'];
        $user->Rol = $validarDatos['Rol'];
        $user->email = $validarDatos['email'];
        $user->contrasena = Hash::make($validarDatos['contrasena']);
        $user->save();

        return redirect('/jefe')->with('success', 'Usuario creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $ID_Usuario)
    {
        $user = User::findOrFail($ID_Usuario);

        // Actualizar usuario
        $user->update([
            'Nombre' => $request->Nombre,
            'Rol' => $request->Rol,
            'email' => $request->email,
            'departamento' => $request->departamento,
        ]);

        return redirect('/user')->with('success', 'Usuario actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($ID_Usuario)
    {
        //Eliminar al usuario
        $user = User::findOrFail($ID_Usuario);

        $user->delete();
        return redirect('/user')->with('success', 'Usuario eliminado correctamente');
    }
}
