<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RS Propiedades: Nosotros</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
		integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link
		href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap"
		rel="stylesheet">
	<link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/info.css">
    <link rel="stylesheet" href="css/master.css">
	<script src="https://kit.fontawesome.com/79cc46baec.js" crossorigin="anonymous" defer></script>
	<script src="js/tab.js" defer></script>
</head>
<body>
	<?php require_once('templates/header.html') ?>
	<section>
		<div class="container-links">
			<div id="myLinks">
				<div class="tabs">
					<div class="tab" data-tab-target="#tab1">
						<p>¿Quiénes somos?</p>
					</div>
					<div class="tab" data-tab-target="#tab2">
						<p>¿Por qué elegirnos?</p>
					</div>
					<div class="tab" data-tab-target="#tab3">
						<p>Nuestros valores</p>
					</div>
				</div>
			</div>
		</div>
	</section>
    <div class="contenido">
        <div class="container">
            <div id="tab1" data-tab-content class="items active">
                <h3>¿Quienes somos?</h3>
                <p>
                    Somos una empresa dedicada a la comercialización y administración de 
                    alquileres de inmuebles familiares, comerciales e industriales
                </p>
			</div>
			<div id="tab2" data-tab-content class="items">
                <h3>¿Por qué elegirnos?</h3>
                <p>
					Nuestro conocimiento de la actividad inmobiliaria de 
					Bahía Blanca y la región nos avala para asesorarlo en sus necesidades
                </p>
			</div>
			<div id="tab3" data-tab-content class="items">
                <h3>Nuestros valores</h3>
                <p>
                    Centramos nuestro accionar en el valor, respeto y confidencialidad de las operaciones
                </p>
            </div>
        </div>
	</div>
	<div class="container-equipo">
		<div class="titulo-equipo">
			<h1>
				NUESTRO EQUIPO
			</h1>
		</div>
		<div class="imagen-ceo">
			<img src="imgs/example.jpg" alt="">
			<p class="texto-ceo">
				Imagen de .............. 
				<br>
				CEO de RS Propiedades
			</p>
		</div>
		<div class="images-team">
			<div class="team-1">
				<img src="imgs/example.jpg" alt="">
				<p class="texto-ceo">
					Imagen de .............. 
					<br>
					Equipo de RS Propiedades
				</p>
			</div>
			<div class="team-2">
				<img src="imgs/example.jpg" alt="">
				<p class="texto-ceo">
					Imagen de .............. 
					<br>
					Equipo de RS Propiedades
				</p>
			</div>
		</div>
	</div>
    <?php require_once('templates/footer.html') ?>
</body>
</html>