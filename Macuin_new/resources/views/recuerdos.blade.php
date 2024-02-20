@extends('layouts.plantilla')

@section('titulo','Recuerdos')

@section('contenido')



    <h1 class="display-1 text-center text-danger mt-5"> RECUERDOS </h1>

    <div class="container">

        @foreach ($consulRecuerdos as $item)
        <div class="card w-75 mb-3">
        <div class="card-body">
            <h5 class="card-title fw-semibold">{{ $item->titulo }}</h5> <!-- Es para traer el dato especifico -->
            <p class="card-text">{{ $item->fecha }}</p>
            <p class="card-text">{{ $item->recuerdo }}</p>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editar{{$item->id}}"> <!-- Data-bs-target="#editar" que coincida con el id del modal.blade.php -->
            Editar
            </button>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{$item->id}} "> 
                Eliminar
            </button>
            
        </div>
        </div>

    @include('partials.modal')
        @endforeach
        
    </div>

    @include('partials.pagination')

@endsection
    