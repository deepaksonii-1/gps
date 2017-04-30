<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link href="css/bootstrap.css" rel="stylesheet">
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&callback=initialize"></script>
<script type="text/javascript"  src="http://maps.google.com/maps/api/js?key=AIzaSyDnO85yu6e4KJIs0QYaEDhy95VIQIO1jVU"></script>
  <style>
body, html{
  height: 100%;
  width: 100%;
  margin: 0px;
  padding: 0px
}
  .map{
  height: 500px;
  width: 100%;
  margin: auto;
  padding: 50px;
  border: 8px solid #e9e9e9;
  border-radius: 15px;

}

  </style>
</head>
<body>
<div class="container-fluid">
<div class="well text-center">
  <input class="btn btn-info " type="button" class id="routebtn" value="CLICK TO NAVIGATE" />
  </div>
  <div class="container">
  <div id="map-canvas" class="map"></div>


  <?php
  $lati = $_GET['lati'];
  $longi = $_GET['longi'];

   ?>
   </div>
</div>



  <script type="text/javascript">
  function mapLocation() {
    var directionsDisplay;
    var directionsService = new google.maps.DirectionsService();
    var map;

    function initialize() {
      directionsDisplay = new google.maps.DirectionsRenderer();
      var center = new google.maps.LatLng(23.231381, 77.432682);
      var mapOptions = {
        zoom: 16,
        center: center
      };

      map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
      directionsDisplay.setMap(map);
      google.maps.event.addDomListener(document.getElementById('routebtn'), 'click', calcRoute);
      var marker = new google.maps.Marker({
      position: center,
      map: map,
      optimized: false,
      title: 'your location'
      });
    }

    function calcRoute() {
      var start = new google.maps.LatLng(23.231381, 77.432682);
      //var end = new google.maps.LatLng(38.334818, -181.884886);
      var end = new google.maps.LatLng(<?php echo $lati,",", $longi; ?>);
      var request = {
        origin: start,
        destination: end,
        travelMode: google.maps.TravelMode.DRIVING
      };
      directionsService.route(request, function(response, status) {
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
