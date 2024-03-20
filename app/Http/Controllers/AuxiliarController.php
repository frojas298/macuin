<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;

class AuxiliarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {        
        // Obtener el conteo de tickets asignados
        $ticketsAsignados = DB::table('vistatickets')
                              ->where('ID_Auxiliar', Auth::id())
                              ->count();

        // Obtener el conteo de tickets finalizadoos
        $ticketsFinalizados = DB::table('vistatickets')
                              ->where('estatus','Completado')
                              ->where('ID_Auxiliar', Auth::id())
                              ->count();

        // Pasar todos los conteos a la vista
        return view('auxiliar.index', compact('ticketsAsignados', 'ticketsFinalizados'));
    }
}