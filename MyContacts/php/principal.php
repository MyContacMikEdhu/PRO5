<?php
include 'conexion.php';
extract($_REQUEST);
session_start();

if(!isset($_SESSION['usu_id'])){
	header('location:../index.php');
}

$usu_id = $_SESSION['usu_id'];
$sql_usuarios="SELECT * FROM tbl_usuario WHERE usu_id=$usu_id";

$usuarios = mysqli_query($conexion, $sql_usuarios);

while ($usuario=mysqli_fetch_array($usuarios)) {
	echo "Hola $usuario[usu_nombre] $usuario[usu_apellidos]";
	$direccion = $usuario['usu_dir_casa'];
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>My Contacts</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 60%;
        margin-left: 30%;
      }
    
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 17,
          center: {lat: -34.397, lng: 150.644}
        });
        var geocoder = new google.maps.Geocoder();

          geocodeAddress(geocoder, map);
      }

      function geocodeAddress(geocoder, resultsMap) {
        var address = '<?php echo$direccion;?>';
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
              var contentString = '<div id="content">'+
                '<div id="siteNotice">'+
                '</div>'+
                '<h1 id="firstHeading" class="firstHeading">Uluru</h1>'+
                '<img src="../img/header.png"/>'+
                '<div id="bodyContent">'+
                '<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large ' +
                'sandstone rock formation in the southern part of the '+
                'Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) '+
                'south west of the nearest large town, Alice Springs; 450&#160;km '+
                '(280&#160;mi) by road. Kata Tjuta and Uluru are the two major '+
                'features of the Uluru - Kata Tjuta National Park. Uluru is '+
                'sacred to the Pitjantjatjara and Yankunytjatjara, the '+
                'Aboriginal people of the area. It has many springs, waterholes, '+
                'rock caves and ancient paintings. Uluru is listed as a World '+
                'Heritage Site.</p>'+
                '<p>Attribution: Uluru, <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">'+
                'https://en.wikipedia.org/w/index.php?title=Uluru</a> '+
                '(last visited June 22, 2009).</p>'+
                '</div>'+
                '</div>';

            var infowindow = new google.maps.InfoWindow({
              content: contentString
            });

            var marker = new google.maps.Marker({
              map: resultsMap,
              draggable: true,
              animation: google.maps.Animation.BOUNCE,
              position: results[0].geometry.location,
              title: "Tu casa",
              }); 

              marker.addListener('click', function() {
              infowindow.open(map, marker);
            });
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });

      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYYKT7N9EkuWSPDh3btcuwF2iGeg3w7co&callback=initMap">
    </script>
	<a href="logout.proc.php">Pulsame</a>
</body>
</html>