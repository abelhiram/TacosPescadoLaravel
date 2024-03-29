<!--

-->
<!DOCTYPE html>
<head>
  <title>Pusher Test</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://js.pusher.com/5.1/pusher.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style type="text/css">
    @import url('https://fonts.googleapis.com/css?family=Abel');

html, body {
  background: #FCEEB5;
  font-family: Abel, Arial, Verdana, sans-serif;
}



.card {
  width: 450px;
  height: 250px;
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



  </style>
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
    var d1 = document.getElementById('bod');
    d1.insertAdjacentHTML('beforeend', '<div class="card green"><div class="additional"><div class="user-card"><div class="level center"></div><div class="points center">5,312 Points</div></div><div class="more-info"><h1>Jane Doe</h1><div class="coords"><span>Group Name</span><span>Joined January 2019</span></div><div class="coords"><span>Position/Role</span><span>City, Country</span></div><div class="stats"><div><div class="title">Awards</div><i class="fa fa-trophy"></i><div class="value">2</div></div><div><div class="title">Matches</div><i class="fa fa-gamepad"></i><div class="value">27</div></div><div><div class="title">Pals</div><i class="fa fa-group"></i><div class="value">123</div></div><div><div class="title">Coffee</div><i class="fa fa-coffee"></i><div class="value infinity">∞</div></div></div></div></div><div class="general"><h1>Jane Doe</h1><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce a volutpat mauris, at molestie lacus. Nam vestibulum sodales odio ut pulvinar.</p><span class="more">Mouse over the card for more info</span></div></div>');
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
<body id="bod">
  <img id="myImage" src="" style="width: 100px">

</body>



