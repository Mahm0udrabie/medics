<!DOCTYPE html>
<html>
  <head>
    <title>Lat/Lng Object Literal</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    
    <script async defer     src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4vxTEkbSbD_dO1JFLXar53G5PuXccuIk&callback=initMap">

  type="text/javascript"></script>
    <style type="text/css">
     nav {
        display:none !important;
    }
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }

      /* Optional: Makes the sample page fill the window. */
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    <script>
      "use strict";

      // In this example, we center the map, and add a marker, using a LatLng object
      // literal instead of a google.maps.LatLng object. LatLng object literals are
      // a convenient way to add a LatLng coordinate and, in most cases, can be used
      // in place of a google.maps.LatLng object.
      let map;

      function initMap() {
        const mapOptions = {
          zoom: 8,
          center: {
            lat:  <?=$_GET['lat']?>,
            lng: <?=$_GET['lng']?>
          }
        };
        map = new google.maps.Map(document.getElementById("map"), mapOptions);
        const marker = new google.maps.Marker({
          // The below line is equivalent to writing:
          // position: new google.maps.LatLng(-34.397, 150.644)
          position: {
            lat:  <?=$_GET['lat']?>,
            lng: <?=$_GET['lng']?>
          },
          map: map
        }); // You can use a LatLng literal in place of a google.maps.LatLng object when
        // creating the Marker object. Once the Marker object is instantiated, its
        // position will be available as a google.maps.LatLng object. In this case,
        // we retrieve the marker's position using the
        // google.maps.LatLng.getPosition() method.

        const infowindow = new google.maps.InfoWindow({
          content: "<p>Marker Location:" + marker.getPosition() + "</p>"
        });
        google.maps.event.addListener(marker, "click", () => {
          infowindow.open(map, marker);
        });
      }
    </script>
  </head>
  <body>
    <div id="map"></div>
  </body>
</html>