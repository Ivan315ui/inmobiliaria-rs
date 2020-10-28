<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>RS Propiedades</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
	<link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="css/master.css">
	<link rel="stylesheet" href="css/index.css">
	<script src="js/index-grid.js" defer></script>
	<script src="js/header.js" defer></script>
	<script src="js/slider.js" defer></script>
	<script src="js/featured.js" defer></script>
	<script src="https://kit.fontawesome.com/79cc46baec.js" crossorigin="anonymous" defer></script>
</head>

<body>
	<?php require('templates/header.html') ?>
	<?php

	require_once("conexion.php");

	if (empty($_GET)) {
		
		//consulta que solicita los datos de las propiedades y cambia su id de tipo por el nombre del tipo de propiedad que es (INNER JOIN)
		$consulta = $conexionBD->prepare("SELECT propiedades.ID_Propiedad, propiedades.Título, propiedades.Dirección, tipos_propiedades.Nombre_Tipo AS Tipo, propiedades.Piso, propiedades.Departamento, propiedades.Descripción, propiedades.Localidad, propiedades.Categoría FROM propiedades INNER JOIN tipos_propiedades ON propiedades.ID_Tipo = tipos_propiedades.ID_Tipo WHERE Categoría!='No disponible'");
		$consulta->execute();

		$resultados = $consulta->fetchAll();
	}

	?>
	<div class="slider">
		<div class="slide"></div>
		<div class="slide"></div>
		<div class="slide"></div>
		<div class="container">
			<h1>ROSCH Propiedades</h1>
			<h3><i>Servicios inmobiliarios en Bahía Blanca y la zona.</i></h3>
			<div>
				<a href="" class="button">Sobre nosotros</a>
				<a href="" class="button">Servicios</a>
			</div>
		</div>
	</div>
	<section id="servicios">
		<div class="banner">
			<h4>ROSCH Propiedades</h4>
			<h2>Servicios</h2>
		</div>
		<div class="container">
			<div class="grid-container">
				<div class="grid-item">
					<a href="">
						<i class="fas fa-home"></i>
						<h3>Ventas</h3>
					</a>
				</div>
				<div class="grid-item">
					<a href="">
						<i class="fas fa-key"></i>
						<h3>Alquileres</h3>
					</a>
				</div>
				<div class="grid-item">
					<a href="">
						<i class="fas fa-dollar-sign"></i>
						<h3>Tasaciones</h3>
					</a>
				</div>
				<div class="grid-item">
					<a href="">
						<i class="fas fa-map-marked-alt"></i>
						<h3>Monte hermoso</h3>
					</a>
				</div>
			</div>
		</div>
	</section>
	<section id="destacados">
		<h2>Destacados</h2>
		<?php 
				$lenght = count($resultados);

				$array = [];
				
				for($i = 0; $i < 5; $i++){
					$random = rand(1, $lenght);
					if (!in_array($random, $array)) {
						$random = $random;
					}else{
						$random = rand(1, $lenght);
					}
					foreach($resultados as $resultado => $propiedad){
						$propiedad['ID_Propiedad'] = $random;
					}
					$array[$i] = $propiedad['ID_Propiedad'];
					
				}
				echo $array[0];
				echo "<br>";
				echo $array[1];
				echo "<br>";
				echo $array[2];
				echo "<br>";
				echo $array[3];
				echo "<br>";
				echo $array[4];
				?>
		<div class="container">
			<div class="grid-wrapper">
				<div class="grid-item">
				
					<a href="">
						<img src="imgs/Casa-pago-chico.jpg">
						<div class="desc">
							<h5>Casa con pileta en Pago Chico</h5>
							<span class="direccion"></span>
							<span class="categoria">Venta</span>
							<span class="precio">USD 600.000</span>
						</div>
						<h4>Ver más <i class='bx bx-chevron-right'></i></h4>
					</a>
				</div>
				<div class="grid-item">
					<a href="">
						<img src="imgs/Casa-pileta.jpg">
						<div class="desc">
							<h5>Casa con pileta en Palihue Sur</h5>
							<span class="direccion">Reconquista 319</span>
							<span class="categoria">Venta</span>
							<span class="precio">USD 500.000</span>
						</div>
						<h4>Ver más <i class='bx bx-chevron-right'></i></h4>
					</a>
				</div>
				<div class="grid-item">
					<a href="">
						<img src="imgs/Departamento-abajo.jpg">
						<div class="desc">
							<h5>Departamento en zona centro</h5>
							<span class="direccion">Alsina 370</span>
							<span class="categoria">Alquiler</span>
							<span class="precio">$ 11.500</span>
						</div>
						<h4>Ver más <i class='bx bx-chevron-right'></i></h4>
					</a>
				</div>
				<div class="grid-item">
					<a href="">
						<img src="imgs/Departamento-costado.jpg">
						<div class="desc">
							<h5>Departamento en zona centro</h5>
							<span class="direccion">Zelarrayán 580</span>
							<span class="categoria">Venta</span>
							<span class="precio">USD 300.000</span>
						</div>
						<h4>Ver más <i class='bx bx-chevron-right'></i></h4>
					</a>
				</div>
				<div class="grid-item">
					<a href="">
						<img src="imgs/Casa-zona-centro.jpg">
						<div class="desc">
							<h5>Casa zona centro</h5>
							<span class="direccion">Gorriti 780</span>
							<span class="categoria">Venta</span>
							<span class="precio">USD 250.000</span>
						</div>
						<h4>Ver más <i class='bx bx-chevron-right'></i></h4>
					</a>
				</div>
				
				<button class="slide-buttons left">
					<i class="fas fa-caret-left"></i>
				</button>
				<button class="slide-buttons right">
					<i class="fas fa-caret-right"></i>
				</button>
			</div>
			<a href="propiedades.php" class="button">Ver el catálogo completo</a>
		</div>
			
	</section>
	<section id="contacto">
		<div class="banner">
			<h2>Contáctenos</h2>
		</div>
		<div class="grid container">
			<div>
				<h4>Envíenos su mensaje</h4>
				<p>
					Consulte información sobre lo que requiera, propiedades, administración, cotizaciones, etc. <br>
					Todas las consultas son bienvenidas y serán respondidas en el menor tiempo posible.
				</p>
				<h4>Información</h4>
				<div><i class="fas fa-phone-alt"></i> 0291-5667988</div>
				<div><i class="fas fa-envelope"></i> rspropiedades@gmail.com</div>
			</div>
			<form action="">
				<label>
					Nombre:
					<input type="text" name="nombre">
				</label>
				<label>
					Email:
					<input type="text" name="email">
				</label>
				<label>
					Mensaje: <br>
					<textarea name="mensaje" id="" cols="30" rows="10"></textarea>
				</label>
				<button type="submit" class="button">Enviar</button>
			</form>
		</div>
	</section>
	<?php require('templates/footer.html') ?>
</body>

</html>