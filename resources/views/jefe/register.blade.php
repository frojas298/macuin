@extends('layouts.appJefe')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar Nuevo Usuario') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.store') }}" onsubmit="showSpinners()">
                        @csrf
                        
                        <!-- Nombre -->
                        <div class="row mb-3">
                            <label for="Nombre" class="col-md-4 col-form-label text-md-end">{{ __('Nombre Completo') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="Nombre" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Departamento -->
                        <div class="row mb-3">
                            <label for="departamento" class="col-md-4 col-form-label text-md-end">Departamento</label>
                            <div class="col-md-6">
                                <select name="departamento" id="departamento" class="form-control" required>
                                    <option selected>Seleccione el Departamento del Usuario</option>
                                    <option value=1>Compras</option>
                                    <option value=2>Contabilidad</option>
                                    <option value=3>Logística</option>
                                    <option value=4>Producción</option>
                                    <option value=5>Ventas</option>
                                    <option value=6>Soporte</option>
                                </select>
                            </div>
                        </div>

                        <!-- Rol -->
                        <div class="row mb-3">
                            <label for="Rol" class="col-md-4 col-form-label text-md-end">Rol</label>
                            <div class="col-md-6">
                                <select name="Rol" id="Rol" class="form-control" required>
                                    <option selected>Seleccione el Rol del Usuario</option>
                                    <option value="Jefe">Jefe de Soporte</option>
                                    <option value="Auxiliar">Auxiliar de Soporte</option>
                                    <option value="Cliente">Cliente</option>
                                </select>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo Electrónico') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="contrasena" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmar Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="contrasena_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
