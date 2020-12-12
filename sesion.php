<?php

include_once('conexion.php');
session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$desencriptada = md5($_POST['contraseña']);
	$credenciales = array($_POST['mail'], $desencriptada);
	$consulta = $conexionBD->prepare("SELECT * FROM administradores WHERE Mail=? AND Contraseña=?");
	$consulta->execute($credenciales);

	$resultados = $consulta->fetch();
	if ($resultados) {
		$_SESSION['admin'] = $resultados['Nombre_Administrador'];
	}
} else {
	if (isset($_GET['endsession']) && $_GET['endsession'] == 'true') {
		session_destroy();
	}
}

if (isset($_SESSION['admin'])) {
	header('Location: admin.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Inicio de sesión administradores</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/admin.css">
	<link rel="stylesheet" href="css/master.css">
	<link rel="stylesheet" href="css/sesion.css">
	<script src="js/header.js" defer></script>
	<script src="https://kit.fontawesome.com/79cc46baec.js" crossorigin="anonymous" defer></script>
	<link rel="shortcut icon" href="imgs/logo.png">
</head>

<body>
	<?php require_once('templates/header.html') ?>
	<?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && !$resultados) : ?>
		<div class="alert alert-danger container" role="alert">
			No hay ningún usuario con esas credenciales en la base de datos, por favor, inténtelo de nuevo.
		</div>
	<?php endif ?>
	<div class="container main">
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
						<input type="password" name="contraseña" id="contraseña">
					</label>
					<button>Iniciar sesión</button>
				</form>
			</div>
		</div>
	</div>
	<?php require_once('templates/footer.html') ?>
</body>

</html>