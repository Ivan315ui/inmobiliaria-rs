var mapa = document.getElementById('mapa');

let direccion = document.getElementById('direccion').value;

//console.log(direccion);

let localidad = document.getElementById('localidad').value;

//console.log(localidad);
//Necesario para que google lo tome como una URL oficial
direccion = direccion.replaceAll(' ', '%20');

//console.log(direccion);

localidad = localidad.replaceAll(' ', '%20');

//console.log(localidad);
//Mapa con Iframe
mapa.innerHTML = '<iframe width="500" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=500&amp;height=500&amp;hl=es&amp;q='+direccion+','+localidad+'&amp;t=&amp;z=18&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>';
