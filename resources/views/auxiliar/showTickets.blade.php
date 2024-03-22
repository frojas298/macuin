@extends('layouts.appAux')

@section('content')
<div>
    <div class="btn-group">
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#filtrarTicketsModal">
        Filtrar Tickets
        </button>
        <button id="clearFiltersBtn" class="btn btn-danger" style="display: none;" onclick="clearFilters()">Quitar filtros</button>
    </div>

    <table class="table text-center table-dark table-striped" border="1">
        <thead>
            <tr>
                <th>#</th>
                <th>Autor</th>
                <th>Departamento</th>
                <th>Detalles</th>
                <th>Clasificacion</th>
                <th>Fecha</th>
                <th>Estatus</th>
                <th>Auxiliar</th>
                <th>Comentarios</th>
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
                <td>{{ $ticket->fecha }}</td>
                <td>
                    <span class="estado
                        @switch($ticket->estatus)
                            @case('Asignado')
                                asignado
                                @break
                            @case('Completado')
                                completado
                                @break
                            @case('No Solucionado')
                                nosolucionado
                                @break
                            @case('En Proceso')
                                en-proceso
                                @break
                            @case('Cancelado')
                                cancelado
                                @break
                        @endswitch
                    ">{{ $ticket->estatus }}</span>
                </td>
                <td>{{ $ticket->auxiliarSoporte }}</td>
                <td>Comentarios</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!--Modal de filtros-->
<div class="modal fade" id="filtrarTicketsModal" tabindex="-1" aria-labelledby="filtrarTicketsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header cardHeaderForm text-center">
                <h5 class="modal-title" id="filtrarTicketsModalLabel">Filtrar Tickets</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('ticketAux.index') }}" method="GET" onsubmit="showSpinners()">
                    <div class="form-group">
                        <label for="fecha_inicio">Fecha Inicio:</label>
                        <input type="date" id="fecha_inicio" name="fecha_inicio">
                    </div>
                    <div class="form-group">
                        <label for="fecha_fin">Fecha Fin:</label>
                        <input type="date" id="fecha_fin" name="fecha_fin">
                    </div>
                    <div class="form-group">
                        <label for="departamento">Departamento:</label>
                        <select id="departamento" name="departamento">
                            <option value="">Seleccione</option>
                            <option value="Compras">Compras</option>
                            <option value="Contabilidad">Contabilidad</option>
                            <option value="Logística">Logística</option>
                            <option value="Producción">Producción</option>
                            <option value="Ventas">Ventas</option>
                            <option value="Soporte">Soporte</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="estatus">Estatus:</label>
                        <select id="estatus" name="estatus">
                            <option value="">Seleccione</option>
                            <option value="En Proceso">En Proceso</option>
                            <option value="Asignado">Asignados</option>
                            <option value="Completado">Completados</option>
                            <option value="No Solucionado">No Solucionados</option>
                            <option value="Cancelado">Cancelados</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Aplicar Filtro</button>
                    </div>
                </form>
                <div id="spinnerContainer" style="display: none;" class="text-center">
                    <div class="spinner-grow text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="spinner-grow text-warning" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="spinner-grow text-success" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="spinner-grow text-danger" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>

                <script>
                    function showSpinners() {
                        document.getElementById('spinnerContainer').style.display = 'block';
                    }
                </script>
            </div>
        </div>
    </div>
</div>

@if(request()->query('fecha_inicio') || request()->query('fecha_fin') || request()->query('departamento') || request()->query('estatus'))
<script>
    function clearFilters() {
        window.location.href = window.location.pathname;
        setTimeout(function() {
            showSpinners();
        }, 100);
    }
  document.addEventListener('DOMContentLoaded', (event) => {
    document.getElementById('clearFiltersBtn').style.display = 'block';
  });
</script>
@endif
@endsection