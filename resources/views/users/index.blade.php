@extends('layouts.admin')
@section('contenido')
<div class="row container mb-4">
  <div class="col-xl-12 mb-1">
    <h2>USUARIOS</h2>
  </div>
</div>

<form action="{{url('/users/index')}}" method="get" enctype="mulipart/form-daar">
    <div class="row">
      <div class="col-lg-4 mb-2">
       <input type="text" class="form-control" name="BUSCAR" placeholder="BUSCAR USUARIO">
      </div>
      <div class="col-md-6 col-lg-2 mb-2">
        <button type="submit" class="btn btn-primary notika-btn-primary waves-effect">BUSCAR</button>
      </div>
      <div class="col-md-6 col-lg-2 col-lg-offset-4">
        <a class="btn btn-success notika-btn-success waves-effect" href="{{ url("/users/create") }}"><span
            class="fa fa-plus"></span> AGREGAR</a>
      </div>
    </div>
</form>

<!-- Fin de buscar por nombre de usuario-->

<!-- Tabla que muestra los Usuarios -->
<div class="container bg-ligth mt-5">
    <table class="table table-sc-ex mt-5">
        <thead class="thead">
            <tr>
                <th class="text-left">Nombre</th>
                <th class="text-center">Email</th>
                <th class="text-center">Tipo</th>
                <th class="text-center">EDITAR</th>
                <th class="text-center">ELIMINAR</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Resultado as $Usuarios)
            <tr>
                <td class="text-left">{{$Usuarios->name}}</td>
                <td class="text-center">{{$Usuarios->email}}</td>
                <td class="text-center">{{$Usuarios->password}}</td>
                <td class="text-center">
                    <!-- inicio boton editar -->
                    <form method="post" action="{{url('/users/'.$Usuarios->id.'/edit')}}">
                        {{csrf_field()}}
                        {{method_field('GET')}}
                        <button type="submit" onclick="return" class="btn btn-success notika-btn-success waves-effect">
                           EDITAR
                        </button>
                    </form>
                    <!-- Fin boton editar -->
                </td>

                <td class="text-center">

                    <form method="get" action="{{url('/users/delete/'.$Usuarios->id.'/')}}">
                        {{csrf_field()}}
                        <button type="submit" onclick="return" class="btn btn-danger notika-btn-danger waves-effect">
                           ELIMINAR
                        </button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@stop