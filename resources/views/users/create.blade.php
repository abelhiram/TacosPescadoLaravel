@extends('layouts.admin')
@section('contenido')
@if (Session::has('Creado'))
<div class="alert bg-warning alert-block text-black">
    <button type="button" class="close text-black" data-dismiss="alert">×</button>
    <strong>{{  Session::get('Creado')}}</strong>
</div>
@endif

<form action="{{url('/users/store')}}" method="post" enctype="multipart/form-data">
@csrf
<div class="form-example-wrap">

<div class="form-example-int">
    <div class="form-group">
        <label>NOMBRE</label>
        <div class="nk-int-st">
            <input type="text" class="form-control input-sm" name="name" required  id="name" value="">
        </div>
    </div>
</div>

<div class="form-example-int">
    <div class="form-group">
        <label>EMAIL</label>
        <div class="nk-int-st">
             <input type="text" class="form-control input-sm" id="email" name="email" onkeyup="validarEmail(this)">
            <a id='resultado'></a>
        </div>
    </div>
</div>

<div class="form-example-int mg-t-15">
    <div class="form-group">
        <label>PASSWORD</label>
        <div class="nk-int-st">
             <input type="password" class="form-control input-sm" name="password" required id="password">
        </div>
    </div>
</div>

<div class="form-example-int mg-t-15">
    <div class="form-group">
        <label>CONFIRMAR PASSWORD</label>
        <div class="nk-int-st">
            <input type="password" class="form-control input-sm" name="confirm-password" required id="confirm-password"></div>
    </div>
</div>

    <div class="card-footer ml-4 mb-2">
            <div class="col-4">
                <button class="btn btn-success notika-btn-success waves-effect">AGREGAR</button>
                <a href="http://holltec.mx/TacosPescadoLaravel/public/users" id="cancel" name="cancel" class="btn btn-default  bg-secondary">Cancel</a>    
        </div>
    </div>

</div>

</form>

<script>
    function validarEmail(elemento){

  var texto = document.getElementById(elemento.id).value;
  var regex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
  
  if (!regex.test(texto)) {
      document.getElementById("resultado").innerHTML = "Correo invalido";
  } else {
    document.getElementById("resultado").innerHTML = "";
  }

}
</script>
@stop