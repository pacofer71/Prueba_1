@extends('plantillas.plantilla')
@section('contenido')
<h2 class="text-center fuenteG mt-3">Concesionario del Sur</h2>
<div class="container text-center mt-4 fuenteN">
        <table class="table table-striped">
                <thead>
                  <tr>
                  <th scope="col" colspan=2 class="text-center"><b>Detalles de Marca: <font style="color: chartreuse">{{$marca->nombre}}</font></b></th>

                  </tr>
                </thead>
                <tbody>
                  <tr>
                  <th scope="row" class="text-left"><b>Nombre:</b> {{$marca->nombre}}</th>
                  <td class="text-left"><b>Código:</b> {{$marca->id}}</td>
                  </tr>
                  <tr>
                  <th scope="row" class="text-left"><b>Registro Creado:</b> {{$marca->created_at}}</th>
                  <td class="text-left"><b>Registro Modificado: </b> {{$marca->updated_at}}</td>

                  </tr>
                  <tr>
                  <th scope="row" class="text-left"><b>Archivo de imágen:</b>&nbsp;{{$marca->imagen}}</th>
                  <td class="text-left"><img src={{asset($marca->imagen)}} width='80px' height='80px'/></td>

                  </tr>
                </tbody>
              </table>
</div>
<div class="container mt-4">
<a href="{{route('marcas.index')}}" class="btn btn-primaryx fuenteN">Home</a>
</div>
@endsection
