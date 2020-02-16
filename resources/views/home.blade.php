<!--
@extends('layouts.app')
@section('content')
@endsection
-->
<!DOCTYPE html>
<head>
  <title>Pusher Test</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://js.pusher.com/5.1/pusher.min.js"></script>
  <script>

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
  if(obj.message==1){
    document.getElementById('myImage').src="https://cnnespanol2.files.wordpress.com/2019/12/s_64a163f16ecbb099e52f2f8271f73cbbfcfc9034be4d646f7375e4db1ca6f3d7_1573501883482_ap_19001106049831-1.jpg?quality=100&strip=info&w=320&h=240&crop=1"
  }
  if(obj.message==2){
    document.getElementById('myImage').src="https://i.pinimg.com/564x/15/29/0b/15290bbc53d23acf89de16f6e8274473.jpg"
  }
  /*
  var xmlHttp = new XMLHttpRequest();
  xmlHttp.open( "GET", 'http://127.0.0.1:8000/reciclar/id/{{Auth::user()->id}}', false ); // false for synchronous request
  xmlHttp.send( null );
  return xmlHttp.responseText; 
  */
  
});
</script>

</head>
<body>
  <img id="myImage" src="" style="width: 100px">
</body>

<!--div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    You are logged in!
</div-->


