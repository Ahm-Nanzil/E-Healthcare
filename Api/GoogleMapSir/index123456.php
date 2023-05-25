<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    
  </title>
  <style type="text/css">
    *
    #map {
      height: 500px;
      width: 100%;
    }

  </style>
</head>
<body>
<div id="map">
  
</div>
<script type="text/javascript">
  function initMap(){
    var location={
      lat: -25.363, lng: 131.044
    };
    var map= new google.maps.Map(document.getElementById("map"),{
      zoom:4,
      center:location
    });
  }
  
</script>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApUJSXkG88L0PI4SS8rbyubOBgixFOQGA&callback=initMap"></script>
</body>
</html>