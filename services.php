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
    <link rel="shortcut icon" href="imgs/logo.png">
</head>
<body>
    <?php require_once('templates/header.html') ?>
    <div class="intro">
        <div class="container">
            <h6>ROSCH INMOBILIARIA</h6>
            <h1>SERVICIOS</h1>
        </div>
    </div>
    <section class="inicio">
        <div class="container">
            <p>En Rosch Inmobiliaria ofrecemos diversos servicios adaptados para cada uno de nuestros clientes.</p>
        </div>
    </section>
    <section class="servicios row">
        <div class="col-md-4 container">
            <h3>Ventas</h3>

        </div>
        <div class="col-md-4 container">
            <h3>Alquileres</h3>

        </div>
        <div class="col-md-4 container">
            <h3>Tasaciones</h3>

        </div>
    </section>
    <section id="form">
        <div class="row container">
            <div class="col-lg-4">
                <h2>¡Solicitá tu servicio!</h2>
                <p>
                    Si algo no te quedó claro, o querés saber más, consultá 
                    por el servicio que necesites y en poco tiempo 
                    nuestro equipo se tomará el trabajo de realizar un seguimiento 
                    a tu consulta y asesorarte debidamente.
                </p>
            </div>
            <form action="mail.php" method="POST" autocomplete="off" class="col-lg-8">
                <input type="text" name="nombre" placeholder="Nombre" required>
                <input type="text" name="asunto" placeholder="Asunto" required>
                <input type="text" name="telefono" placeholder="Teléfono" required>
                <input type="email" name="email" placeholder="Email" required>
                <textarea name="mensaje" placeholder="Mensaje" required></textarea>
                <button class="button">Enviar</button>
            </form>
        </div>
    </section>
    <section>
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