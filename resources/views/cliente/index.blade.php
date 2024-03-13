@extends('layouts.app')

@section('content')
<table border="1">
    <thead>
        <tr>
            <th>Ticket</th>
            <th>Autor</th>
            <th>Departamento</th>
            <th>Detalles</th>
            <th>Clasificacion</th>
            <th>Auxiliar de Soporte</th>
            <th>Fecha</th>
            <th>Estatus</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tickets as $ticket)
        <tr>
            <td>{{ $ticket->ID_tickets }}</td>
            <td>{{ $ticket->Autor }}</td>
            <td>{{ $ticket->departamento }}</td>
            <td>{{ $ticket->Detalles }}</td>
            <td>{{ $ticket->Clasificacion }}</td>
            <td>{{ $ticket->auxiliarSoporte }}</td>
            <td>{{ $ticket->fecha }}</td>
            <td>{{ $ticket->estatus }}</td>
            <td>
                <!-- Botón Editar -->
                <a href="{{ url('/cliente/' . $ticket->ID_tickets . '/edit') }}">Editar</a>
            </td>
            <td>
                <!-- Formulario para cancelar -->
                <form action="{{ url('/cliente/' . $ticket->ID_tickets) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas cancelar este ticket?');">
                    @csrf
                    @method('DELETE') <!-- Mantén el método DELETE si estás utilizando la misma ruta y controlador -->
                    <button type="submit">Cancelar Ticket</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection