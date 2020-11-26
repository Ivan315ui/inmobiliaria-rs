<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RS Propiedades: Servicios </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
	<link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="css/master.css">
	<link rel="stylesheet" href="css/services.css">
	<script src="js/header.js" defer></script>
	<script src="https://kit.fontawesome.com/79cc46baec.js" crossorigin="anonymous" defer></script>
</head>
<body>
    <?php require_once('templates/header.html') ?>
    <div class="intro">
        <div class="container">
            <h6>ROSCH INMOBILIARIA</h6>
            <h1>SERVICIOS</h1>
        </div>
    </div>
    <section>
        <div class="introduccion">
            <p> En Rosch Inmobiliaria ofrecemos diversos servicios </p>
            <p> adaptados para cada uno de nuestros clientes</p>
        </div>
        <div class="tasaciones" id="tasaciones">
            <h1>
                TASACIONES
            </h1>
            <p>
                Nuestro equipo de profesionales esta dispuesto a valorizar tu 
            </p>
            <p>
                propiedad y brindarte un excelente servicio
            </p>
        </div>
        <div class="solicitar">
            <h2>
                SOLICITÁ TU TASACIÓN
            </h2>
            <p>
                Por favor complete este formulario con los datos requeridos
            </p>
            <p>
                y nos pondremos en contacto con usted
            </p>
            <form action="" class="container" autocomplete="off" method="POST">
					<div>
                        <input type="text" name="nombre" placeholder="Nombre" required="">
                        <input type="text" name="apellido" placeholder="Apellido" required="">
                        <input type="text" name="telefono" placeholder="Telefono" required="">
                        <input type="email" name="email" placeholder="Email" required="">
						<textarea name="comentarios" placeholder="Comentarios" required=""></textarea>
					</div>
                    <button class="button" type="submit" name="enviar">Enviar</button>
                    <?php //include_once("mailService.php") ?>
				</form>
        </div>
        <div class="serviciosprop">
            <div class="introprop">
            <h1>
                NUESTROS SERVICIOS
            </h1>
            </div>
            <div class="prop1">
                <h2>
                    Tenemos lo que buscas
                </h2>
                <p>
                    Tenemos multiples propiedades para que encuentres exactamente la 
                </p>
                <p>
                    propiedad que has estado buscando
                </p>
            </div>
            <div class="prop2">
                <h2>
                    El mejor servicio
                </h2>
                <p>
                    Nuestros profesionales y equipo especializado en su  
                </p>
                <p>
                    comodidad y en su experiencia como cliente
                </p>
            </div>
            <div class="prop3">
                <h2>
                    Bahía y la zona
                </h2>
                <p>
                    Le brindaremos servicios en Bahía Blanca, Monte Hermoso, 
                </p>
                <p>
                    Punta alta, Cabíldo, Pehúen Co, Buenos Aires, etc. 
                </p>
            </div>
        </div>
    </section>
    <?php require_once('templates/footer.html') ?>
</body>
</html>