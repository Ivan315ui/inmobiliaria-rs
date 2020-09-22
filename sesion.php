<?php

include_once('conexion.php');
session_start();

if (isset($_SESSION['admin'])) {
	header('Location: admin.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$credenciales = array($_POST['mail'], $_POST['contraseña']);
	$consulta = $conexionBD->prepare("SELECT * FROM Administradores WHERE Mail=? AND Contraseña=?");
	$consulta->execute($credenciales);

	$resultados = $consulta->fetch();

	if ($resultados) {
		$_SESSION['admin'] = $resultados['Nombre_Administrador'];
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/admin.css">
	<link rel="stylesheet" href="css/master.css">
	<link rel="stylesheet" href="css/sesion.css">
	<script src="js/header.js" defer></script>
	<script src="https://kit.fontawesome.com/79cc46baec.js" crossorigin="anonymous" defer></script>
</head>

<body>
	<header>
		<div class="container">
			<img src="imgs/logo.png" alt="rs-logo">
			<nav class="md-menu">
				<ul>
					<li><a href="index.html">Inicio</a></li>
					<li><a href="info.html">Nosotros</a></li>
					<li><a href="">Servicios</a></li>
					<li><a href="consulta.html">Contacto</a></li>
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
					<li><a href="index.html">Inicio</a></li>
					<li><a href="info.html">Nosotros</a></li>
					<li><a href="">Servicios</a></li>
					<li><a href="">Propiedades</a></li>
					<li><a href="consulta.html">Contacto</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<div class="container main">
		<?php if(!$resultados): //probar esto ?>
			<div class="alert alert-danger" role="alert">
				No hay ningún usuario con esas credenciales en la base de datos, por favor, inténtelo de nuevo.
			</div>
		<?php endif ?>
		<div class="row">
			<aside class="col-md-5">
				<h6>Inicio de sesión</h6>
				<p>
					Bienvenido a la página de inicio de sesión. Si usted es un administrador, puede usar esta página para verificar sus 
					credenciales e ingresar a la sección de administrador y poder realizar diversas tareas de gestión sobre el sitio web. 
					<br>
					En caso de que no sea un administrador o por alguna razón no pueda iniciar sesión, comuníquese con un administrador 
					para solucionar su problema o añadirse a la lista.
					<br>
					<span>Nótese que si ya se ha iniciado sesión, esta parte será inaccesible a menos que cierre sesión como administrador.</span>
				</p>
			</aside>
			<div class="content col-md-7">
				<form action="" method="post" autocomplete="off">
					<h5>Iniciar sesión</h5>
					<label>
						Email:
						<input type="email" name="mail" id="mail">
					</label>
					<label class="contraseña">
						Contraseña:
						<input type="text" name="contraseña" id="contraseña">
					</label>
					<button>Iniciar sesión</button>
				</form>
			</div>
		</div>
	</div>
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