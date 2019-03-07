@extends('plantillas.plantilla')
@section('contenido')
<h2 class="text-center fuenteG mt-3">Concesionario del Sur</h2>
<div class="container text-center mt-3 fuenteN">
    <!-- Info mensage de session -->
    @if(Session::has('message'))
    <div class="container">
        <p class="alert alert-info">{{Session::get('message')}}</p>
    </div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Nombre</th>
                <th scope="col">Logo</th>
                <th scope="col">Acciones</th>

            </tr>
        </thead>
        <tbody>
            @foreach($marcas as $marca)
            <tr>
                <th scope="row">{{$marca->id}}</th>
                <td>{{$marca->nombre}}</td>
                <td><img src="{{asset($marca->imagen)}}" width='60px' height='60px'></td>
                <td>
                <form name="qw" action="{{route('marcas.destroy', $marca)}}" method='POST' style='white-space:nowrap;'>
                    @csrf
                    @method('DELETE')
                <a href="{{route('marcas.show', $marca)}}" class="btn btn-primary">Detalles</a>
                <a href="{{route('marcas.edit', $marca)}}" class="btn btn-warning">Modificar</a>
                    <input type='submit' class='btn btn-danger' value="Borrar">
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    {{ $marcas->links() }}
    <div class='container text-right'>
    <a href="{{route('marcas.create')}}" class='btn btn-primary'>Nueva Marca</a>&nbsp;
    <a href="{{route('inicio')}}" class='btn btn-info'>Home</a>
    </div>
</div>
@endsection
