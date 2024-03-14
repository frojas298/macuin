<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
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
                              ->where('estatus','Completado')
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

    public function imprimirTickets()
    {

        $tickets = DB::table('tickets')->get();

        foreach ($tickets as $ticket){
            $ticket->usuario = DB::table('usuarios')->where('ID_Usuario', $ticket->ID_Usuario)->first();
        }

        // Renderizar la vista del ticket en HTML
        $html = view('PDF.reporteTickets', compact('tickets'))->render();

        // Generar el PDF con Dompdf
        $pdf = PDF::loadHTML($html);

        // Opción para descargar el PDF
        return $pdf->download('ticket.pdf');

        // Opción para mostrar el PDF en el navegador
        return $pdf->stream('ticket.pdf');
    }

    public function imprimirTicketsAuxiliar()
    {

        $tickets = DB::table('tickets')->orderby('auxiliar_Soporte')->get();

        foreach ($tickets as $ticket){
            $ticket->usuario = DB::table('usuarios')->where('ID_Usuario', $ticket->ID_Usuario)->first();
        }

        // Renderizar la vista del ticket en HTML
        $html = view('PDF.reporteTickets', compact('tickets'))->render();

        // Generar el PDF con Dompdf
        $pdf = PDF::loadHTML($html);

        // Opción para descargar el PDF
        return $pdf->download('ticket.pdf');

        // Opción para mostrar el PDF en el navegador
        return $pdf->stream('ticket.pdf');
    }

    public function imprimirTicketsDepartamentos()
    {

        $tickets = DB::table('tickets')
        ->join('usuarios', 'tickets.ID_Usuario', '=', 'usuarios.ID_Usuario')
        ->join('departamentos', 'usuarios.departamento', '=', 'departamentos.iddepartamentos')
        ->orderBy('usuarios.departamento')
        ->get();


        // Renderizar la vista del ticket en HTML
        $html = view('PDF.reporteTicketsDepartamento', compact('tickets'))->render();

        // Generar el PDF con Dompdf
        $pdf = PDF::loadHTML($html);

        // Opción para descargar el PDF
        return $pdf->download('ticket.pdf');

        // Opción para mostrar el PDF en el navegador
        return $pdf->stream('ticket.pdf');
    }

    public function imprimirTicketsFecha(Request $request)
    {
        $fechaInicio = $request->input('fechaInicio');
        $fechaFin = $request->input('fechaFin');

        $tickets = DB::table('tickets')
        ->where('fecha', '>=', $fechaInicio)
        ->where('fecha', '<=', $fechaFin)
        ->orderby('fecha')
        ->get();

        foreach ($tickets as $ticket){
            $ticket->usuario = DB::table('usuarios')->where('ID_Usuario', $ticket->ID_Usuario)->first();
        }
        
        // Renderizar la vista del ticket en HTML
        $html = view('PDF.reporteTickets', compact('tickets'))->render();

        // Generar el PDF con Dompdf
        $pdf = PDF::loadHTML($html);

        // Opción para descargar el PDF
        return $pdf->download('ticket.pdf');

        // Opción para mostrar el PDF en el navegador
        return $pdf->stream('ticket.pdf');
    }
}
