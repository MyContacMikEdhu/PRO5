<!DOCTYPE html>
<html>
  <head>
    <title>Geocoding service</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
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
        var address = "Provenza 12, Hospitalet";
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
              var contentString = '<div id="content">'+
                '<div id="siteNotice">'+
                '</div>'+
                '<h1 id="firstHeading" class="firstHeading">Uluru</h1>'+
                '<img src="img/icono.jpg"/>'+
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
  </body>
</html>