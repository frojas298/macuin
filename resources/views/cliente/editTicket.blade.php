@extends('layouts.app')

@section('content')
<form action="{{ url('/cliente/' . $ticket->ID_tickets) }}" method="post">
    @csrf
    @method('PUT') <!-- Importante: Este método es para indicar que es una actualización -->

    <!-- Mostrar la información NO EDITABLE -->
    <div>ID Ticket: {{ $ticket->ID_tickets }}</div>
    <div>Auxiliar de Soporte: {{ $ticket->auxiliar_Soporte ?? 'No asignado' }}</div>
    <div>Fecha: {{ $ticket->fecha }}</div>
    <div>Estatus: {{ $ticket->estatus }}</div>

    <!-- Mostrar la información EDITABLE -->
    <div>
        <select name="Clasificacion" id="Clasificacion" required>
            <option value="Falla de Office" {{ $ticket->Clasificacion == "Falla de Office" ? 'selected' : '' }}>Fallas de Office</option>
            <option value="Fallas en la Red" {{ $ticket->Clasificacion == "Fallas en la Red" ? 'selected' : '' }}>Fallas en la Red</option>
            <option value="Errores de software" {{ $ticket->Clasificacion == "Errores de software" ? 'selected' : '' }}>Errores de Software</option>
            <option value="Errores de Hardware" {{ $ticket->Clasificacion == "Errores de Hardware" ? 'selected' : '' }}>Errores de Hardware</option>
            <option value="Mantenimientos Preventivos" {{ $ticket->Clasificacion == "Mantenimientos Preventivos" ? 'selected' : '' }}>Mantenimientos Preventivos</option>
            <option value="Otro" {{ $ticket->Clasificacion == "Otro" ? 'selected' : '' }}>Otros</option>
        </select>
    </div>

    <div>
        <label for="Detalles">Detalles</label>
        <textarea name="Detalles" id="Detalles" required>{{ $ticket->Detalles }}</textarea>
    </div>
    
    <input type="submit" value="Actualizar">
</form>
@endsection