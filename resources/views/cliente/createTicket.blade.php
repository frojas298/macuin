@extends('layouts.app')

@section('content')
<form action="{{ url('/cliente') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    <label for="Clasificacion">{{'Clasificación'}}</label>
    <input class="form-control" type="text" name="Clasificacion" id="Clasificacion" value="" required>

    <label for="Detalles">Detalles</label>
    <textarea class="form-control" name="Detalles" id="Detalles" required></textarea>

    <input type="submit" value="Agregar">
</form>
@endsection