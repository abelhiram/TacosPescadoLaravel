<?php use App\Http\Controllers\ordenesController;
use App\Events\formSubmit;
?>
@extends('layouts.admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://js.pusher.com/5.1/pusher.min.js"></script>

  <style type="text/css">
    @import url('https://fonts.googleapis.com/css?family=Abel');

.card {
  width: 450px;
  height: 150px;
  background-color: #fff;
  background: linear-gradient(#f8f8f8, #fff);
  box-shadow: 0 8px 16px -8px rgba(0,0,0,0.4);
  border-radius: 6px;
  overflow: hidden;
  position: relative;
  margin: 1.5rem;
}

.card h1 {
  text-align: center;
}

.card .additional {
  position: absolute;
  width: 150px;
  height: 100%;
  background: linear-gradient(#dE685E, #EE786E);
  transition: width 0.4s;
  overflow: hidden;
  z-index: 2;
}

.card.green .additional {
  background: linear-gradient(#92bCa6, #A2CCB6);
}


.card:hover .additional {
  width: 100%;
  border-radius: 0 5px 5px 0;
}

.card .additional .user-card {
  width: 150px;
  height: 100%;
  position: relative;
  float: left;
}

.card .additional .user-card::after {
  content: "";
  display: block;
  position: absolute;
  top: 10%;
  right: -2px;
  height: 80%;
  border-left: 2px solid rgba(0,0,0,0.025);*/
}

.card .additional .user-card .level,
.card .additional .user-card .points {
  top: 15%;
  color: #fff;
  text-transform: uppercase;
  font-size: 0.75em;
  font-weight: bold;
  background: rgba(0,0,0,0.15);
  padding: 0.125rem 0.75rem;
  border-radius: 100px;
  white-space: nowrap;
}

.card .additional .user-card .points {
  top: 85%;
}

.card .additional .user-card svg {
  top: 50%;
}

.card .additional .more-info {
  width: 300px;
  float: left;
  position: absolute;
  left: 150px;
  height: 100%;
}

.card .additional .more-info h1 {
  color: #fff;
  margin-bottom: 0;
}

.card.green .additional .more-info h1 {
  color: #224C36;
}

.card .additional .coords {
  margin: 0 1rem;
  color: #fff;
  font-size: 1rem;
}

.card.green .additional .coords {
  color: #325C46;
}

.card .additional .coords span + span {
  float: right;
}

.card .additional .stats {
  font-size: 2rem;
  display: flex;
  position: absolute;
  bottom: 1rem;
  left: 1rem;
  right: 1rem;
  top: auto;
  color: #fff;
}

.card.green .additional .stats {
  color: #325C46;
}

.card .additional .stats > div {
  flex: 1;
  text-align: center;
}

.card .additional .stats i {
  display: block;
}

.card .additional .stats div.title {
  font-size: 0.75rem;
  font-weight: bold;
  text-transform: uppercase;
}

.card .additional .stats div.value {
  font-size: 1.5rem;
  font-weight: bold;
  line-height: 1.5rem;
}

.card .additional .stats div.value.infinity {
  font-size: 2.5rem;
}

.card .general {
  width: 300px;
  height: 100%;
  position: absolute;
  top: 0;
  right: 0;
  z-index: 1;
  box-sizing: border-box;
  padding: 1rem;
  padding-top: 0;
}

.card .general .more {
  position: absolute;
  bottom: 1rem;
  right: 1rem;
  font-size: 0.9em;
}

dl > div {
  background: #FFF;
  padding: 24px 0 0 0;
}

dt {
  background: #B8C1C8;
  border-bottom: 1px solid #989EA4;
  border-top: 1px solid #717D85;
  color: #FFF;
  font: bold 18px/21px Helvetica, Arial, sans-serif;
  margin: 0;
  padding: 2px 0 0 12px;
  position: -webkit-sticky;
  position: sticky;
  top: -1px;
}

dd {
  font: bold 20px/45px Helvetica, Arial, sans-serif;
  margin: 0;
  padding: 0 0 0 12px;
  white-space: nowrap;
}

dd + dd {
  border-top: 1px solid #CCC;
}
div#ex3 {
  
  width: 100%;
  height: 70%;
  overflow: auto;
}
  </style>
  <script>
function comp(){
  var a = document.getElementById("tituloc").value;
  var b = document.getElementById("detailsc").value;
  var c = document.getElementById("idc").value;
  var d = document.getElementById("cantc").value;
  var e = document.getElementById("subtc").value;

  var xmlHttp = new XMLHttpRequest();
  xmlHttp.open( "GET", 'http://holltec.mx/TacosPescadoLaravel/public/enviarr/comida/'+a+'/cantidad/'+b+'/sugerencias/'+c+'/subtotal/'+d+'/img/'+e, false ); // false for synchronous request
  xmlHttp.send( null );


    document.getElementById("tituloc").innerHTML = "";
    document.getElementById("detailsc").innerHTML = "";
    document.getElementById("idc").innerHTML = "";
    document.getElementById("cantc").innerHTML = "";
    document.getElementById("subtc").innerHTML = "";

    document.getElementById("tituloc").value = "";
    document.getElementById("detailsc").value = "";
    document.getElementById("idc").value = "";
    document.getElementById("cantc").value = "";
    document.getElementById("subtc").value = "";
    return xmlHttp.responseText; 
}
function pasar(variable) {
  document.getElementById("tituloc").innerHTML = document.getElementById("tit-"+variable).textContent;

  document.getElementById('imgc').src="https://assets.biggreenegg.eu/app/uploads/2019/03/28145521/topimage-classic-hamburger-2019m04-800x534-600x401.jpg";
  document.getElementById("detailsc").innerHTML = document.getElementById("sug-"+variable).textContent;
  document.getElementById("idc").innerHTML = document.getElementById("id-"+variable).textContent;
  document.getElementById("cantc").innerHTML = document.getElementById("cant-"+variable).textContent;
  document.getElementById("subtc").innerHTML = document.getElementById("sub-"+variable).textContent;

  document.getElementById("tituloc").value = document.getElementById("tit-"+variable).textContent;
  document.getElementById("detailsc").value = document.getElementById("sug-"+variable).textContent;
  document.getElementById("idc").value = document.getElementById("id-"+variable).textContent;
  document.getElementById("cantc").value = document.getElementById("cant-"+variable).textContent;
  document.getElementById("subtc").value = document.getElementById("sub-"+variable).textContent;

}
window.onload = function inicio(){
  document.getElementById('myImage').innerHTML = '@foreach(ordenesController::todos() as $tod)<div onclick="pasar({{$tod->id}})" class="card green"><div class="additional"><div class="user-card"><div class="level center"></div><div class="points center">5,312 Points</div></div><div class="more-info"><h1>Jane Doe</h1><div class="coords"><span>Group Name</span><span>Joined January 2019</span></div><div class="coords"><span>Position/Role</span><span>City, Country</span></div></div></div><div class="general"><h1 id="tit-{{$tod->id}}">{{$tod->comida}}</h1><div id=""><p id="id-{{$tod->id}}">{{$tod->id}}</p><p id="cant-{{$tod->id}}">{{$tod->cantidad}}</p><p id="sug-{{$tod->id}}">{{$tod->sugerencias}}</p><p id="sub-{{$tod->id}}">{{$tod->subtotal}}</p></div></div></div>@endforeach';
}

// Enable pusher logging - don't include this in production
Pusher.logToConsole = true;

var pusher = new Pusher('c18dd0f8b7887fc0f757', {
      cluster: 'us2',
      forceTLS: true
    });

var channel = pusher.subscribe('my-channel');
channel.bind('my-event', function(data) {
  var txt = JSON.stringify(data);
  var obj = JSON.parse(txt);
  if(obj.id==15030220029){
    var d2 = document.getElementById('321');
    d2.insertAdjacentHTML('afterbegin', '<h3 id="tituloc2">'+obj.comida+'</h3><p id="detailsc2">'+obj.cantidad+'</p><br><p id="idc2">'+obj.sugerencias+'</p><br><p id="cantc2">'+obj.subtotal+'</p><br><p id="subtc2">'+obj.img+'</p>');

  }else{
    var titulo = obj.comida;
    var id = obj.id;
    var cantidad = obj.cantidad;
    var subtotal = obj.subtotal;
    var sugerencias = obj.sugerencias;
    var d1 = document.getElementById('myImage2');
    d1.insertAdjacentHTML('afterbegin', '<div onclick="pasar()" class="card green"><div class="additional"><div class="user-card"><div class="level center"></div><div class="points center">5,312 Points</div></div><div class="more-info"><h1>Jane Doe</h1><div class="coords"><span>Group Name</span><span>Joined January 2019</span></div><div class="coords"><span>Position/Role</span><span>City, Country</span></div></div></div><div class="general"><h1>{{$tod->comida}}</h1><div id="{{$tod->id}}">{{formSubmit::ul()}}<p>{{$tod->cantidad}}</p><p>{{$tod->sugerencias}}</p><p>{{$tod->subtotal}}</p></div></div></div>');
  }
  
  
});
</script>
@section('pagina')


@stop
@section('contenido')	
<!-- Nav tabs -->
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab active-tab" aria-controls="home" aria-selected="true">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">Messages</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Settings</a>
  </li>
</ul>

    <!-- Tab panes -->
    <div  class="tab-content" >
      <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
      <div class="row">
        <div class="col-6 col-md-6">
          <div id="ex3">
          <div id=myImage2></div>
          <div id=myImage></div>
          </div>
        </div>
      <div class="col-6 col-md-6">
        <div class="row">
          <div class="col-sm-12">
            <div class="thumbnail">
              <img id="imgc" src="" alt="...">
              <div class="caption">

                <h3 id="tituloc"></h3>
                <p id="detailsc"></p><br>
                <p id="idc"></p><br>
                <p id="cantc"></p><br>
                <p id="subtc"></p>
                <p><a  onclick="comp()" class="btn btn-primary" role="button">Aceptar</a> <a href="#" class="btn btn-default" role="button">Button</a></p>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <div id="321"></div></div>
  <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">...</div>
  <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">...</div>
</div>



@stop