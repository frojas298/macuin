@extends('layouts.appJefe')

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
                <a href="{{ url('/jefe/' . $ticket->ID_Tickets . '/edit') }}">Editar</a>
            </td>
            <td>
                <!-- Formulario para eliminar -->
                <form action="{{ url('/ticketJefe/' . $ticket->ID_tickets) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este ticket?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection