<?php
    //verificación de que se haya iniciado sesión
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Panel de administrador</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
			integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<link
			href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap"
			rel="stylesheet">
		<link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
		<link rel="stylesheet" href="css/master.css">
		<link rel="stylesheet" href="css/admin.css">
		<script src="https://kit.fontawesome.com/79cc46baec.js" crossorigin="anonymous" defer></script>
		<script src="js/header.js" defer></script>
		<script src="js/admin.js" defer></script>
	</head>
	<body>
		<header>
			<div class="container">
				<img src="imgs/logo.png" alt="rs-logo">
				<nav class="md-menu">
					<ul>
						<li><a href="">Inicio</a></li>
						<li><a href="">Nosotros</a></li>
						<li><a href="">Servicios</a></li>
						<li><a href="">Contacto</a></li>
					</ul>
				</nav>
				<div id="burger-icon">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</div>
				<nav class="mobile-menu">
					<ul>
						<li><a href="">Inicio</a></li>
						<li><a href="">Nosotros</a></li>
						<li><a href="">Servicios</a></li>
						<li><a href="">Propiedades</a></li>
						<li><a href="">Contacto</a></li>
					</ul>
				</nav>
			</div>
		</header>
		<div class="main container">
			<div class="row">
				<aside class="col-md-4">
					<h6>Navegación</h6>
					<nav>
						<ul>
							<li><a href="#lorem">Introducción</a></li>
							<li><a href="">¿Cómo funciona el panel de administración?</a></li>
							<li><a href="">Funciones</a></li>
							<li><a href="">Agregar administradores</a></li>
							<li><a href="">Subir archivos</a></li>
							<li><a href="">Posibles errores</a></li>
						</ul>
					</nav>
				</aside>
				<div class="content col-md-8" id="lorem">
					Lorem ipsum dolor sit, amet consectetur adipisicing elit. Esse, ab nihil! Consectetur ea maiores quo quos, ipsam minima qui, atque inventore cum vel ex sequi autem soluta excepturi molestiae quas.
				</div>
			</div>
		</div>
		<footer>
			<div class="footer-row">
				<h4>Manual de administrador</h4>
				<div class="container footer-links">
					<div>
						<ul>
							<li><a href="#">Documentación</a></li>
							<li><a href="#">Acciones del panel</a></li>
						</ul>
					</div>
					<!--TODO admin links-->
					<div>
						<ul>
							<li><a href="#">Nosotros</a></li>
							<li><a href="#">Contacto</a></li>
						</ul>
					</div>
					<div>
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