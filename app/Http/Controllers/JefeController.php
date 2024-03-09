<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JefeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        // Obtener el conteo de tickets no asignados
        $ticketsNoAsignados = DB::table('vistatickets')
                                 ->whereNull('auxiliarSoporte')
                                 ->count();
        
        // Obtener el conteo de tickets asignados
        $ticketsAsignados = DB::table('vistatickets')
                              ->whereNotNull('auxiliarSoporte')
                              ->count();

        // Obtener el conteo de tickets finalizadoos
        $ticketsFinalizados = DB::table('vistatickets')
                              ->where('estatus','Finalizado')
                              ->count();

        // Obtener el conteo de usuarios
        $usuarios = DB::table('vistausuarios')
                    ->count();

        // Obtener el conteo de usuarios
        $departamentos = DB::table('departamentos')
                    ->count();


        // Pasar todos los conteos a la vista
        return view('jefe.index', compact('ticketsNoAsignados', 'ticketsAsignados', 'ticketsFinalizados', 'usuarios', 'departamentos'));

    }
}
