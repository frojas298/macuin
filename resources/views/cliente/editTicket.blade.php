@extends('layouts.app')

@section('content')
<form action="{{ url('/cliente/' . $ticket->ID_Tickets) }}" method="post">
    @csrf
    @method('PUT') <!-- Importante: Este método es para indicar que es una actualización -->

    <!-- Mostrar la información NO EDITABLE -->
    <div>ID Ticket: {{ $ticket->ID_Tickets }}</div>
    <div>Auxiliar de Soporte: {{ $ticket->auxiliar_Soporte ?? 'No asignado' }}</div>
    <div>Fecha: {{ $ticket->fecha }}</div>
    <div>Estatus: {{ $ticket->estatus }}</div>

    <!-- Mostrar la información EDITABLE -->
    <label for="Clasificacion">Clasificación</label>
    <input type="text" name="Clasificacion" id="Clasificacion" value="{{ $ticket->Clasificacion }}" required>

    <label for="Detalles">Detalles</label>
    <textarea name="Detalles" id="Detalles" required>{{ $ticket->Detalles }}</textarea>

    <input type="submit" value="Actualizar">
</form>
@endsection