<!doctype html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="{{ asset(mix('js/app.js')) }}"></script>
    <script src="/path/to/mousetrap.min.js"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])


    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
     integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
     crossorigin=""/>
     <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
     integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
     crossorigin=""></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>




<section id="mapa"  >
    <div class="cajamapa">
        
        <button onclick="getLocation()">Ubicarte on ets!</button>

<p id="demo" ></p>

        <div id="map">
 
</section>
<script>
const llistafitasid = [
  {id:1, lat: 41.25, long: 41.30},
  {id:2, lat: 41.25, long: 41.30},
  {id:3, lat: 41.25, long: 41.50},
  {id:4, lat: 41.10, long: 41.20},
  {id:5, lat: 41.25, long: 41.35}
];

const mir = { lat: 42.24, lng: 1.70 };
const map = L.map('map').setView([41.23112, 1.72866], 19);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
  maxZoom: 25,
  center: mir,
}).addTo(map);

llistafitasid.forEach(function(fita) {
  const marker = L.marker([fita.lat, fita.long]).addTo(map)
        .bindPopup(`${fita.id}`, {autoClose: false})
        .openPopup();

  
        const circleCenter = L.latLng(fita.lat, fita.long);
  const radius = 10; // in meters
  const circle = L.circle(circleCenter, {
    color: '#' + (Math.random() * 0xFFFFFF << 0).toString(16), // generate a random color for the circle
    fillColor: '#' + (Math.random() * 0xFFFFFF << 0).toString(16), // generate a random color for the circle fill
    fillOpacity: 0.5,
    radius: radius
  }).addTo(map);

  const bounds = L.latLngBounds([marker.getLatLng(), circle.getBounds()]);
  map.fitBounds(bounds);
});

map.on('click', function(e) {
  alert('Lat: ' + e.latlng.lat.toFixed(5) + ', Long: ' + e.latlng.lng.toFixed(5));
});

    
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.watchPosition(showPosition);
  }
}
function showPosition(position) {
  Lat = position.coords.latitude;
  Lon =position.coords.longitude;
  
  L.marker([ Lat, Lon ]).addTo(map).bindPopup('estas aqui!').openPopup();
}
function isInPosition(position) {
  var userLat = position.coords.latitude;
  var userLng = position.coords.longitude;
  var userLatLng = L.latLng(userLat, userLng);

  for (var i = 0; i < llistafitasid.length; i++) {
    var fitaMarker = llistafitasid[i];
    var circleCenter = llistafitasid.getLatLng();
    var circleRadius = 10; // in meters
    var distance = userLatLng.distanceTo(circleCenter);

    if (distance <= circleRadius) {
      L.marker([userLat, userLng]).addTo(map).bindPopup('You are inside the circle of ' + fita.id + '!').openPopup();
      return;
    }
  }
  
  L.marker([userLat, userLng]).addTo(map).bindPopup('You are outside all circles.').openPopup();
}

    </script>
</section>

<style>

.showcase {
    position: relative;
    height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: 0.20px;
    color: #fff;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}


.content {
    z-index: 0;
    margin-bottom: 150px;
}
.btncontacte {
    display: inline-block;
    padding: 10px 30px;
    background: #3a4052;
    color: #fff;
    border: 1px #fff solid;
    border-radius: 5px;
    margin-top: 25px;
    opacity: 0.7;
}
.btncontacte:hover {
    transform: scale(0.98);
}
#map { 
    height: 630px;
    width: 90%;
    margin-bottom: 50px;
    margin-left: 5%;
}
#mapa {
    background-color: white;
}
.cajamapa {
    width: 100%;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.cajamapa h1 {
    color: black;
    font-size: 3em;
}
.cajamapa h2 {
    color: black;
    font-size: 2.3em;
}
.ubicans {
    width: 40%;
    margin-top: 3%;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif
}
.footer {
    background-color: #403c54;
    height: 150px;
    color: white;
}
.contenidofooter {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.segueixnoscontacte {
    margin-top: 3%;
    width: 40%;
    text-align: center;
}
.iconoscontacte {
    width: 30%;
    margin: auto;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}
.iconoscontacte i {
    font-size: 1.5em;
}

</style>