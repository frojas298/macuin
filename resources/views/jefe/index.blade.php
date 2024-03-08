@extends('layouts.appJefe')

@section('content')
<div class="card mb-3 position-absolute top-50 start-0 translate-middle-y" style="max-width: 800px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{ asset('images/perfilDefault.png') }}" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><b>Bienvenido(a) {{ Auth::user()->Nombre }}</b></h5>
        <p class="card-text"> {{ Auth::user()->email }} </p>
        <p class="card-text text-body-secondary"> {{ Auth::user()->Rol }} </p>
      </div>
    </div>
  </div>
</div>
@endsection