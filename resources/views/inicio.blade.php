@extends('plantillas.plantilla')
@section('contenido')
<h2 class="text-center fuenteG mt-3">Concesionario del Sur</h2>
<div class="container text-center mt-3">
<img src="{{ asset('img/conce/conce.jpeg') }}" alt="concesionario" width='410px' height='240px'/>
</div>
<div class="container mt-5 text-center">
    <a href="{{route('marcas.index')}}" class="btn btn-info fuenteN">Ver Marcas</a>&nbsp;&nbsp;
    <a href="{{route('coches.index')}}" class="btn btn-info fuenteN">Ver Coches</a>
</div>
@endsection
