@extends('layouts.appJefe')

@section('content')
<table border="4">
    <thead>
        <tr>
            <th>ID</th>
            <th>Empleado</th>
            <th>Tipo de Usuario</th>
            <th>Correo Eléctronico</th>
            <th>Departamento</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->ID_Usuario }}</td>
            <td>{{ $user->Nombre }}</td>
            <td>{{ $user->Rol }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->departamento }}</td>
            <td>
                <!-- Botón Editar -->
                <a href="{{ url('/jefe/' . $user->ID_Usuario . '/edit') }}">Editar</a>
                <!-- Botón Editar MODAL -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Editar
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/jefe') }}" method="post" enctype="multipart/form-data" onsubmit="showSpinners()">
                            {{ csrf_field() }}

                            <label for="Clasificacion">{{'Clasificación'}}</label>
                            <input class="form-control" type="text" name="Clasificacion" id="Clasificacion" value="" required>

                            <label for="Detalles">Detalles</label>
                            <textarea class="form-control" name="Detalles" id="Detalles" required></textarea>

                            <input type="submit" value="Agregar">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                    </div>
                </div>
                </div>

            </td>
            <td>
                <!-- Formulario para eliminar -->
                <form action="{{ url('/jefe/' . $user->ID_Usuario) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este ticket?');">
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