<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Document</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<style>
  .btn.btn-success{
    font-size: 30px;
  }
</style>
  </head>
  <body>
    <center>
      <div class="well">
        <h2>Please click button bellow to trace your location...</h2>
      </div>
      <button class="btn btn-success" onclick="getLocation()"><span class="glyphicon glyphicon-map-marker" ></span></button>
      <p id="demo"></p>
    </center>

      <script
       src="https://code.jquery.com/jquery-3.2.1.js"integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="crossorigin="anonymous"></script>
      <script>
        var x = document.getElementById("demo");
        function getLocation() {
          if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(redirectToPosition);
          }
          else {
            x.innerHTML = "Geolocation is not supported by this browser.";
          }
        }
        function redirectToPosition(position) {
          window.location='search_mechanic.php?lat='+position.coords.latitude+'&long='+position.coords.longitude;
        }
      </script>

  </body>
</html>
