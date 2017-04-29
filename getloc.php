<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
   <!DOCTYPE html>
<html>
<body>
<center>
<p >Please Click to Locate on You</p>

<button onclick="getLocation()">Try It</button>

<p id="demo"></p>

<script>
var x = document.getElementById("demo");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(redirectToPosition);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function redirectToPosition(position) {
    window.location='search_mechanic.php?lat='+position.coords.latitude+'&long='+position.coords.longitude;
}
</script>

</center>

</body>
</html>

</body>
</html>
