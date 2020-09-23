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
	<script src="js/header.js" defer></script>
	<script src="https://kit.fontawesome.com/79cc46baec.js" crossorigin="anonymous" defer></script>
</head>

<body>
	<?php require_once('templates/header.html') ?>
    <div class="container">
        <img src="imgs/prueba-img.jpg" alt="" style="width: 100%; height: 250px;">
    </div>
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
	<?php require_once('templates/footer.html') ?>
</body>

</html>