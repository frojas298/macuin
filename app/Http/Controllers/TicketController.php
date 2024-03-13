<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\vistaTickets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {     
        // Pasar los tickets a la vista correspondiente
        if (auth()->user()->Rol === 'Jefe') {
            $ticketsEP = DB::table('vistatickets')
                     ->where ('estatus', 'En Proceso')
                     ->get();
            
            $ticketsA = DB::table('vistatickets')
                     ->where ('estatus', 'Asignado')
                     ->get();

            $ticketsC = DB::table('vistatickets')
                     ->where ('estatus', 'Completado')
                     ->get();

            $ticketsNS = DB::table('vistatickets')
                     ->where ('estatus', 'No Solucionado')
                     ->get();
            
            $ticketsCC = DB::table('vistatickets')
                     ->where ('estatus', 'Cancelado')
                     ->get();

            $auxiliar = DB::table('vistausuarios')
                     ->where ('departamento', 'Soporte')
                     ->where ('Rol', 'Auxiliar')
                     ->get();

            return view('jefe.showTickets', compact('ticketsEP', 'ticketsA', 'ticketsC', 'ticketsNS', 'ticketsCC', 'auxiliar'));
        } elseif (auth()->user()->Rol === 'Auxiliar'){
            // Recuperar solo los tickets del usuario autenticado
            $tickets = vistaTickets::where('ID_Usuario', Auth::id())
            ->get(['ID_tickets','Autor', 'Detalles','Clasificacion', 'auxiliarSoporte', 'departamento','fecha', 'estatus']);
            return view('auxiliar.index', compact('tickets'));
        } elseif (auth()->user()->Rol === 'Cliente') {
            // Recuperar solo los tickets del usuario autenticado
            $tickets = vistaTickets::where('ID_Usuario', Auth::id())
            ->get(['ID_tickets','Autor', 'Detalles','Clasificacion', 'auxiliarSoporte', 'departamento','fecha', 'estatus']);
            return view('cliente.index' , compact('tickets'));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if (auth()->user()->Rol === 'Jefe') {
            return view('jefe.createTicket');
        } elseif (auth()->user()->Rol === 'Auxiliar'){
            return view('auxiliar.createTicket');
        } elseif (auth()->user()->Rol === 'Cliente') {
            return view('cliente.createTicket');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Incluir todo excepto el token
        $datos=$request->except('_token');
        

        $datosTicket = array_merge($datos, [
            'ID_Usuario' => auth()->id(), // ID del usuario autenticado
            'auxiliar_Soporte' => null, // Valor de null hasta que el jefe lo asigne
            'fecha' => now(), // Fecha actual
            'estatus' => 'En Proceso', // Establecer estatus inicial para el ticket
        ]);

        Ticket::insert($datosTicket);

        if (auth()->user()->Rol === 'Jefe') {
            return redirect('/jefe')->with('success', 'Ticket creado correctamente.');
        } elseif (auth()->user()->Rol === 'Auxiliar'){
            return redirect('/auxiliar')->with('success', 'Ticket creado correctamente.');
        } elseif (auth()->user()->Rol === 'Cliente') {
            return redirect('/cliente')->with('success', 'Ticket creado correctamente.');
        }
        //return response()->json($datosTicket);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($ID_Tickets)
    {
        $ticket = Ticket::findOrFail($ID_Tickets);

        
        if (auth()->user()->Rol === 'Jefe') {
            //PENDIENTE
            return view('jefe.index', compact('ticket'));
        } elseif (auth()->user()->Rol === 'Cliente') {
            if ($ticket->auxiliar_Soporte !== null) {
                return redirect('/cliente')->with('error', 'Este ticket ya está siendo atendido y no se puede editar.');
                }
                return view('cliente.editTicket', compact('ticket'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $ID_tickets)
    {
        $ticket = Ticket::findOrFail($ID_tickets);

        if ($ticket->auxiliar_Soporte !== null) {
            return redirect('/cliente')->with('error', 'Ups, No se puede editar este Ticket.');
        }

        // Actualizar los campos permitidoas
        $ticket->update([
            'Clasificacion' => $request->Clasificacion,
            'Detalles' => $request->Detalles,
            'fecha' => now(),
        ]);

        return redirect('/cliente')->with('success', 'Ticket actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($ID_tickets)
    {
        $ticket = Ticket::findOrFail($ID_tickets);

        // Verificar si el usuario autenticado puede eliminar este ticket
        if ($ticket->ID_Usuario != auth()->id()) {
            return redirect('/cliente')->with('error', 'No tienes permiso para eliminar este ticket');
        }
        if ($ticket->auxiliar_Soporte !== null) {
            return redirect('/cliente')->with('error','No se puede eliminar este ticket');
        }
        
        $ticket->estatus = 'Cancelado'; // Asume que 'Cancelado' es un valor válido para tu columna de estatus
        $ticket->save();

        return redirect()->back()->with('status', 'Ticket cancelado con éxito.');
    }

    public function asignarAuxiliar(Request $request, $ID_tickets)
    {
        $ticket = Ticket::findOrFail($ID_tickets);
        $ticket->auxiliar_Soporte = $request->auxiliar_id;
        $ticket->estatus = 'Asignado';
        $ticket->save();

        return back()->with('success', 'Auxiliar asignado correctamente.');
    }
}
