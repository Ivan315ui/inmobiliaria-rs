<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>RS Propiedades: Contacto</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
	<link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="css/master.css">
	<link rel="stylesheet" href="css/contacto.css">
	<script src="js/header.js" defer></script>
	<script src="https://kit.fontawesome.com/79cc46baec.js" crossorigin="anonymous" defer></script>
	<link rel="shortcut icon" href="imgs/logo.png">
</head>

<body>
	<?php require_once('templates/header.html') ?>
	<div class="intro">
		<div class="container">
			<h1>¡Contáctanos!</h1>
			<p>¿Tenés alguna duda o sugerencia? <br> ¡No dudes en contactarnos!</p>
			<a href="#form" class="button">Envíanos un mensaje</a>
		</div>
	</div>
	<section class="info">
		<div class="container">
			<h2>Información de contacto</h2>
			<p>
				Tenemos diversos medios habilitados para que te comuniques con nosotros. <br>
				La comunicación es el principio de toda buena relación, sin importar <br>
				su índole, así que no dudes en contactarnos ante la más mínima consulta. <br>
				Los siguientes medios son los habilitados para que puedas comunicarte. <br>
			</p>
			<div class="grid">
				<a href="https://www.facebook.com/ROSCH.INMOBILIARIA" class="grid-item" target="_blank">
					<i class="fab fa-facebook-f"></i> Facebook
				</a>
				<a href="https://wa.me/+54(291)numerodewarap" class="grid-item" target="_blank">
					<i class="fab fa-whatsapp"></i> Whatsapp
				</a>
				<a href="https://www.instagram.com/rosch.inmobiliaria/" class="grid-item" target="_blank">
					<i class="fab fa-instagram"></i> Instagram
				</a>
				<a href="mailto:tucorreo" class="grid-item">
					<i class="far fa-envelope"></i> Correo electrónico
				</a>
				<a href="tel:telefonohere" class="grid-item" target="_self">
					<i class="fas fa-phone-alt"></i> Teléfono
				</a>
			</div>
		</div>
	</section>
	<section id="form">
		<div class="row">
			<div class="col-lg-8">
				<h2 class="container">¡Hablemos!</h2>
				<form action="" class="container" autocomplete="off">
					<div>
						<input type="text" name="nombre" placeholder="Nombre">
						<input type="text" name="asunto" placeholder="Asunto">
						<input type="email" name="email" placeholder="Email">
						<textarea name="mensaje" placeholder="Mensaje"></textarea>
					</div>
					<button class="button" type="submit" name="enviar">Enviar</button>
				</form>
			</div>
			<div class="col-lg-4">

			</div>
		</div>
	</section>
	<section class="time">
		<div class="container">
			<h2>Tu tiempo es importante</h2>
			<p>
				Valoramos tu tiempo, por eso no queremos que lo pierdas. <br>
				El equipo de ROSCH Inmobiliaria está constantemente pendiente de las consultas. <br>
				Por más mínimas que sean, sabemos que todas son igual de importantes <br> y las responderemos lo más pronto posible.
			</p>
		</div>
	</section>
	<section class="valores" id="nosotros">
		<div class="row">
			<div class="col-lg-4">

			</div>
			<div class="col-lg-8">
				<h2 class="container" id="sobre">Sobre ROSCH inmobiliaria</h2>
				<p class="container">
					Somos una empresa dedicada a la comercialización y administración de 
					alquileres de inmuebles familiares, comerciales e industriales. 
					Centramos nuestro accionar en el valor, respeto y confidencialidad de las operaciones. <br>
					Nuestro conocimiento de la actividad inmobiliaria de Bahía Blanca y la región nos avala para asesorarlo en sus necesidades.
				</p>
			</div>
		</div>
	</section>
	<?php require_once('templates/footer.html') ?>
</body>

</html>