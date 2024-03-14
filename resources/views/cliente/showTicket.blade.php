@extends('layouts.app')

@section('content')
<table class="table text-center table-dark table-striped" border="1">
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
            <td>
                @switch($ticket->estatus)
                    @case('En Proceso')
                        <span class="estado en-proceso">{{ $ticket->estatus }}</span>
                        @break
                    @case('Asignado')
                        <span class="estado asignado">{{ $ticket->estatus }}</span>
                        @break
                    @case('Completado')
                        <span class="estado completado">{{ $ticket->estatus }}</span>
                        @break
                    @case('No Solucionado')
                        <span class="estado nosolucionado">{{ $ticket->estatus }}</span>
                        @break
                    @case('Cancelado')
                        <span class="estado cancelado">{{ $ticket->estatus }}</span>
                        @break
                    @default
                        <span class="estado">{{ $ticket->estatus }}</span>
                @endswitch
            </td>
            <td>
                <a href="{{ url('/ticketCliente/' . $ticket->ID_tickets . '/edit') }}" 
                class="{{ $ticket->estatus != 'En Proceso' ? 'disabled-link' : '' }}">
                    <img src="/images/editar.png" alt="Editar" 
                        style="{{ $ticket->estatus != 'En Proceso' ? 'filter: grayscale(100%); pointer-events: none;' : '' }}">
                </a>
            </td>
            <td>
                <form action="{{ url('/ticketCliente/' . $ticket->ID_tickets) }}" method="POST" 
                    onsubmit="return confirm('¿Estás seguro de que deseas cancelar este ticket?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                        {{ $ticket->estatus != 'En proceso' ? 'disabled' : '' }}
                            style="background: none; border: none; padding: 0; margin: 0;">
                        <img src="/images/eliminar.png" alt="Cancelar" 
                            style="{{ $ticket->estatus != 'En Proceso' ? 'filter: grayscale(100%);' : '' }}">
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
