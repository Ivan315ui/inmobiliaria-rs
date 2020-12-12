<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <link rel="stylesheet" type="text/css" href="css/map.css" />
    <script src="js/map.js" defer></script>
  </head>
  <body>

    <input type="hidden" id="direccion" value="<?php echo $propiedad['Dirección']?>">
    <input type="hidden" id="localidad" value="<?php echo $propiedad['Localidad']?>">
    <div id="mapa">
    </div>
  </body>
</html>
