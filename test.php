<?php include_once 'functions.php';
session_start();
$place=$_GET['place'];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Google Maps JavaScript API v3 Example: Geocoding Simple</title>
    <link href="https://developers.google.com/maps/documentation/javascript/examples/default.css" rel="stylesheet">
    <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script>
      var geocoder;
      var map;
      var mapOptions = {
          zoom: 17,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
      var marker;
 
      function initialize() {
        geocoder = new google.maps.Geocoder();
        map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
        codeAddress();
      }
 
      function codeAddress() {
        var address = document.getElementById('address').value;
        geocoder.geocode( { 'address': address}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
            if(marker)
              marker.setMap(null);
            marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location,
                draggable: true
            });
            google.maps.event.addListener(marker, "dragend", function() {
              document.getElementById('lat').value = marker.getPosition().lat();
              document.getElementById('lng').value = marker.getPosition().lng();
            });
            document.getElementById('lat').value = marker.getPosition().lat();
            document.getElementById('lng').value = marker.getPosition().lng();
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }
    </script>
  </head>
  <body onload="initialize()">
    <div>
      <input id="address" type="textbox" hidden style="width:60%" value="<?php echo $place;?>">
      <!--<input type="button" value="Geocode" onclick="codeAddress()">--> 
    </div>
    <div id="map_canvas" style="height:100%;top:0px"></div>
  </body>
</html>