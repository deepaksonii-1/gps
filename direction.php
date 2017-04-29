<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&callback=initialize"></script>
<script type="text/javascript"  src="http://maps.google.com/maps/api/js?key=AIzaSyDBQq29VPtG5NHueVv0BjlDQBKXhlxcLOg"></script>
  <style>
  html, body, #map-canvas {
  height: 100%;
  width: 100%;
  margin: 0px;
  padding: 0px
}
  </style>
</head>
<body>

  <input type="button" id="routebtn" value="route" />
  <div id="map-canvas"></div>
  <?php
  $lati = $_GET['lati'];
  $longi = $_GET['longi'];

   ?>

  <script type="text/javascript">
  function mapLocation() {
      var directionsDisplay;
      var directionsService = new google.maps.DirectionsService();
      var map;

      function initialize() {
          directionsDisplay = new google.maps.DirectionsRenderer();
          var chicago = new google.maps.LatLng(23.231323, 77.432592);
          var mapOptions = {
              zoom: 18,
              center: chicago
          };
          map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
          directionsDisplay.setMap(map);
          google.maps.event.addDomListener(document.getElementById('routebtn'), 'click', calcRoute);
          var marker = new google.maps.Marker({
          position: new google.maps.LatLng(23.231323,77.432592),
          map: map,
          optimized: false,
          title: 'Your Location'
          });
      }

      function calcRoute() {
          var start = new google.maps.LatLng(23.231323, 77.432592);
          //var end = new google.maps.LatLng(38.334818, -181.884886);
          var end = new google.maps.LatLng(<?php echo $lati; ?>, <?php echo $longi; ?>);
          /*
  var startMarker = new google.maps.Marker({
              position: start,
              map: map,
              draggable: true
          });
          var endMarker = new google.maps.Marker({
              position: end,
              map: map,
              draggable: true
          });
  */
          var bounds = new google.maps.LatLngBounds();
          bounds.extend(start);
          bounds.extend(end);
          map.fitBounds(bounds);
          var request = {
              origin: start,
              destination: end,
              travelMode: google.maps.TravelMode.DRIVING
          };
          directionsService.route(request, function (response, status) {
              if (status == google.maps.DirectionsStatus.OK) {
                  directionsDisplay.setDirections(response);
                  directionsDisplay.setMap(map);
              } else {
                  alert("Directions Request from " + start.toUrlValue(6) + " to " + end.toUrlValue(6) + " failed: " + status);
              }
          });
      }

      google.maps.event.addDomListener(window, 'load', initialize);
  }
  mapLocation();

  </script>

</body>
</html>
