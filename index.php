<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>RS Propiedades</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
		integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link
		href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap"
		rel="stylesheet">
	<link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="css/master.css">
	<script src="js/index-grid.js" defer></script>
	<script src="js/header.js" defer></script>
	<script src="js/slider.js" defer></script>
	<script src="js/featured.js" defer></script>
	<script src="https://kit.fontawesome.com/79cc46baec.js" crossorigin="anonymous" defer></script>
</head>

<body>
	<?php require('templates/header.html') ?>
	<div class="slider">
		<div class="slide"></div>
		<div class="slide"></div>
		<div class="slide"></div>
		<div class="container">
			<h1>RS Propiedades</h2>
				<h3><i>Servicios inmobiliarios en Bahía Blanca y la zona.</i></h3>
				<div>
					<a href="" class="button">Sobre nosotros</a>
					<a href="" class="button">Servicios</a>
				</div>
		</div>
	</div>
	<section id="servicios">
		<div class="banner">
			<h4>RS Propiedades</h4>
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
	<footer>
		<div class="footer-row">
			<div class="container social">
				<a class="icon-Facebook" href="#">
					<i class="fab fa-facebook-f"></i>
				</a>
				<a class="icon-Twitter" href="#">
					<i class="fab fa-twitter"></i>
				</a>
				<a class="icon-Instagram" href="#">
					<i class="fab fa-instagram"></i>
				</a>
				<a class="icon-Google" href="#">
					<i class="far fa-envelope"></i>
				</a>
			</div>
		</div>
		<div class="footer-row">
			<div class="container footer-links">
				<div>
					<h4>Preguntas frecuentes</h4>
					<ul>
						<li><a href="#">¿Cómo publicar una propiedad?</a></li>
						<li><a href="#">Horarios de atención</a></li>
					</ul>
				</div>
				<div>
					<h4>Soporte</h4>
					<ul>
						<li><a href="#">Nosotros</a></li>
						<li><a href="#">Contacto</a></li>
					</ul>
				</div>
				<div>
					<h4>Información</h4>
					<ul>
						<li><a href="#">Preguntas frecuentes</a></li>
						<li><a href="#">Servicios</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="footer-row">
			<small>@ 2020 RS Propiedades</small>
		</div>
	</footer>
</body>

</html>