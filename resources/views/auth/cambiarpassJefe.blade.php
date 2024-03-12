@extends('layouts.appJefe')

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cambiar Contraseña') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('cambiarContraJefe') }}" onsubmit="showSpinners()">
                        @csrf
                        
                        <!-- Contraseña actual -->
                        <div class="form-group row">
                            <label for="contraActual" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña Actual') }}</label>

                            <div class="col-md-6">
                                <input id="contraActual" type="password" class="form-control" name="contraActual" required>
                            </div>
                        </div>

                        <!-- Nueva contraseña -->
                        <div class="form-group row">
                            <label for="nuevaContra" class="col-md-4 col-form-label text-md-right">{{ __('Nueva Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="nuevaContra" type="password" class="form-control" name="nuevaContra" required>
                            </div>
                        </div>

                        <!-- Confirmar la nueva contraseña -->
                        <div class="form-group row">
                            <label for="nuevaContra_confirmation" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar nueva contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="nuevaContra_confirmation" type="password" class="form-control" name="nuevaContra_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Cambiar Contraseña') }}
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