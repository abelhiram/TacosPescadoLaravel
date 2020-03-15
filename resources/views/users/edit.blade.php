@extends('layouts.admin')

@section('contenido')
<form action="{{url('/users/'.$user->id)}}" method="post" enctype="mulipart/form-daar">
<div class="card">
    <div class="card-header background-color-green">
        <strong class="color-vimifos-white">EDITAR USUARIO</strong>
    </div>
    <div class="card-body">
        {{ csrf_field() }}
        <div class="row">
            <div class="form-example-wrap">

<div class="form-example-int">
    <div class="form-group">
        <label>NOMBRE</label>
        <div class="nk-int-st">
            <input type="text" class="form-control input-sm" name="name" required id="name" placeholder="NOMBRE" value="{{$user->name}}" >
        </div>
    </div>
</div>

<div class="form-example-int">
    <div class="form-group">
        <label>EMAIL</label>
        <div class="nk-int-st">
             <input type="text" class="form-control input-sm" id="email" name="email" placeholder="EMAIL" value="{{$user->email}}">
            <a id='resultado'></a>
        </div>
    </div>
</div>

<div class="form-example-int mg-t-15">
    <div class="form-group">
        <label>PASSWORD</label>
        <div class="nk-int-st">
             <input type="password" class="form-control input-sm" name="password" placeholder="PASSWORD" id="password">
        </div>
    </div>
</div>

<div class="form-example-int mg-t-15">
    <div class="form-group">
        <label>CONFIRMAR PASSWORD</label>
        <div class="nk-int-st">
            <input type="password" class="form-control input-sm" name="confirm-password" placeholder="CONFIRMAR PASSWORD" id="confirm-password"></div>
    </div>
</div>

    <div class="card-footer ml-4 mb-2">
            <div class="col-4">
                <button class="btn btn-success notika-btn-success waves-effect">GUARDAR</button>
                <a href="http://holltec.mx/TacosPescadoLaravel/public/users" id="cancel" name="cancel" class="btn btn-default  bg-secondary">Cancel</a>    
        </div>
    </div>

</div>
        </div>
    </div>
</div>
</form>
@stop
