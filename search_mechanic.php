<?php
$con  = mysqli_connect('localhost','root','','gps_service');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GPS SERVICE CENTER</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

      <script type="text/javascript"  src="http://maps.google.com/maps/api/js?key=AIzaSyDBQq29VPtG5NHueVv0BjlDQBKXhlxcLOg"></script>

</head>

<body >

<div class="container-fluid">

    <div class="row" id="header">

        <div class="col-sm-2">

            <h2>YourLogo</h2>

        </div>

        <div class="col-sm-8">



        </div>

        <div class="col-sm-2">
            <br />
            <a href="index.php" class="btn btn-default fa fa-home fa-2x"> </a>

        </div>


    </div><!-- End of Header -->

    <div class="row" id="search_mechanic">

        <h2 align="center">Mechanics Details</h2>



        <div id="map-canvas"></div>


        <hr />

        <?php

               function distance($lat1, $lon1, $lat2, $lon2, $unit) {

                  $theta = $lon1 - $lon2;
                  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
                  $dist = acos($dist);
                  $dist = rad2deg($dist);
                  $miles = $dist * 60 * 1.1515;
                  $unit = strtoupper($unit);

                  if ($unit == "K") {
                    return ($miles * 1.609344);
                  } else if ($unit == "N") {
                      return ($miles * 0.8684);
                    } else {
                        return $miles;
                      }
                }

                $lat1=(isset($_GET['lat']))?$_GET['lat']:'';
                $long1=(isset($_GET['long']))?$_GET['long']:'';



                $qry ="select * from mechanics";

                $ex = mysqli_query($con,$qry);
                 $i=1;
                while($rs = mysqli_fetch_array($ex))
                {

                     $d = distance(23.231116,77.433592,$rs['latitude'],$rs['lognitude'],"M");

                     if($d<5)
                     {


              ?>



        <div class="col-sm-8 col-sm-offset-2">

               <div class="col-sm-2">
                   <img src="img/p1.jpeg" class="img-responsive img-circle img-thumbnail"/>
               </div>

                <div class="col-sm-8">
                   <h3><?php echo $rs['name']; ?></h3>
                   <p>Exp: <?php echo $rs['exp']; ?> Years</p>
                   <p><span class="fa fa-phone"></span> <?php echo $rs['contact']; ?></p>
                   <p>Mechanic Type : <?php echo $rs['experties']; ?></p>
                   <i class="fa fa-star"></i>
                   <i class="fa fa-star"></i>
                   <i class="fa fa-star"></i>
                   <i class="fa fa-star"></i>
                   <i class="fa fa-star-o"></i>

                </div>

                <div class="col-sm-2">
                <br />
                 <center>
                   <div id="map<?php echo $i; ?>" style="width: 400px; height: 300px"></div>
        <script type="text/javascript">
      var myOptions = {
         zoom: 20,
         center: new google.maps.LatLng(<?php echo $rs['latitude']; ?>, <?php echo $rs['lognitude']; ?>),
         mapTypeId: google.maps.MapTypeId.ROADMAP
      };

      var map = new google.maps.Map(document.getElementById("map<?php echo $i; ?>"), myOptions);
      var marker = new google.maps.Marker({
      position: new google.maps.LatLng(<?php echo $rs['latitude']; ?>, <?php echo $rs['lognitude']; ?>),
      map: map,
      optimized: false,
      title: '<?php echo $rs['address']; ?>'
      });

   </script>

                  <br />
                  <i class="fa fa-map-marker fa-2x" aria-hidden="true"></i>
                  <br />
                  <?php echo 'Distance: ',$d,'<br> Add: ',$rs['address'],'<br>' ?>
                    <a href="direction.php?lati=<?php echo $rs['latitude']; ?>&longi=<?php echo $rs['lognitude']; ?>">Show route</a>
                  </center>

               </div>

        </div>

        <?php
          }
                    $i++;

                }


        //do whatever you want

       ?>








    </div>






</div>

</div>




<!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script>
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });
    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });
    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#],[data-toggle],[data-target],[data-slide])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    //#to-top button appears after scrolling
    var fixed = false;
    $(document).scroll(function() {
        if ($(this).scrollTop() > 250) {
            if (!fixed) {
                fixed = true;
                // $('#to-top').css({position:'fixed', display:'block'});
                $('#to-top').show("slow", function() {
                    $('#to-top').css({
                        position: 'fixed',
                        display: 'block'
                    });
                });
            }
        } else {
            if (fixed) {
                fixed = false;
                $('#to-top').hide("slow", function() {
                    $('#to-top').css({
                        display: 'none'
                    });
                });
            }
        }
    });
    // Disable Google Maps scrolling
    // See http://stackoverflow.com/a/25904582/1607849
    // Disable scroll zooming and bind back the click event
    var onMapMouseleaveHandler = function(event) {
        var that = $(this);
        that.on('click', onMapClickHandler);
        that.off('mouseleave', onMapMouseleaveHandler);
        that.find('iframe').css("pointer-events", "none");
    }
    var onMapClickHandler = function(event) {
            var that = $(this);
            // Disable the click handler until the user leaves the map area
            that.off('click', onMapClickHandler);
            // Enable scrolling zoom
            that.find('iframe').css("pointer-events", "auto");
            // Handle the mouse leave event
            that.on('mouseleave', onMapMouseleaveHandler);
        }
        // Enable map zooming with mouse scroll when the user clicks the map
    $('.map').on('click', onMapClickHandler);
    </script>



</body>

</html>
