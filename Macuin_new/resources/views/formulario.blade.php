@extends('layouts.plantilla')

@section('titulo', 'Formulario')
    
@section('contenido')

    <h1 class="display-1 text-center text-dark ">Crear Ticket</h1>

    <div class="container mt-5" style="margin: 100">

        @if (session()->has('confirmacion'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
         <strong>{{session('confirmacion')}}</strong>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="card ">
            <form method="post" action="/recuerdo">
              @csrf 
                <div class="card-header text-secondary fs-5 fw-semibold text-center">
                    Ingresa los datos para crear Ticket.
                </div>
                
                <div class="card-body">

                    <form>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Titulo: </label>
                            <input type="text" name="txtTitulo" class="form-control" value="{{old('txtTitulo')}}"
                            <div id="emailHelp" class="form-text">No guardas fotos, guardas momentos para toda la vida.</div>
                            <p class="text-danger fst-italic">{{$errors-> first('txtTitulo')}}</p>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label"> Recuerdo: </label>
                            <input type="text" name="txtRecuerdo"class="form-control" id="exampleInputPassword1" value="{{old('txtRecuerdo')}}">
                            <p class="text-danger fst-italic"> {{$errors-> first('txtRecuerdo')}}</p>
                        </div>
                        
                </div>

                <div class="d-grid gap-2" >
                    <button type="submit" class="btn btn-primary" type="button">Guardar Recuerdos </button>

                    </form>
                </div>
            </form>

        </div><!--- div del card-->

    </div> <!--- div del container-->
    

@endsection
