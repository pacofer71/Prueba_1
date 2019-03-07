@extends('plantillas.plantilla')
@section('contenido')
<h2 class="text-center fuenteG mt-3">Concesionario del Sur</h2>
<div class="container text-center mt-3 mb-3 fuenteN" style='border: 1px solid #FCFCFC; padding:5px'>
    @if ($errors->any())
    <div class="alert alert-danger mb-3">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{route('marcas.update', $marca)}}" method='POST' enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group row">
            <label for="nom" class="col-sm-2 col-form-label">Nombre Marca</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nom" value='{{$marca->nombre}}' name='nombre' />
            </div>
        </div>
        <div class="form-group row">
            <label for="file" class="col-sm-2 col-form-label">Logo Marca</label>
            <div class="col-sm-10">
                <img src="{{asset($marca->imagen)}}" width='50px' height='50px' />
                <input type='file' name='imagen'>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Modificar</button>&nbsp;
                <a href="{{route('marcas.index')}}" class="btn btn-primary">Volver</a>



            </div>
        </div>
    </form>

</div>
@endsection
