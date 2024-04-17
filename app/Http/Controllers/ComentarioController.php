<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\vistaComentarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ComentarioController extends Controller
{
    public function obtenerComentariosPorTicket($idTicket)
    {
        $comentarios = vistaComentarios::where('ID_tickets', $idTicket)
                                ->orderBy('fecha_hora', 'asc')
                                ->get();

        $usuarioAutenticado = auth()->id(); // Asegúrate que esté correctamente autenticado

        return response()->json([
            'comentarios' => $comentarios,
            'usuarioAutenticado' => $usuarioAutenticado
        ]);
    }

    public function crearComentario(Request $request)
    {
        $comentario = new Comentario();
        $comentario->ID_Usuario = auth()->id();
        $comentario->ID_tickets = $request->ID_tickets;
        $comentario->comentario = $request->comentario;
        $comentario->fecha_hora = now();
        $comentario->destinatario = 'jefe-aux';
        $comentario->save();

        return response()->json(['success' => 'Comentario guardado con éxito']);
    }
}
