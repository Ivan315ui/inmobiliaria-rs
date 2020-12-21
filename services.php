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
            <h3>ROSCH INMOBILIARIA</h3>
            <h1>SERVICIOS</h1>
        </div>
    </div>
    <section class="servicios row">
        <div class="col-md-4 container">
            <h3><i class="fas fa-home"></i> Ventas</h3>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci harum omnis quia! Deleniti tempora eos, aspernatur quae dignissimos dicta. Reprehenderit soluta voluptatibus laborum sequi. Vel excepturi iste consequuntur officia tenetur!</p>
        </div>
        <div class="col-md-4 container">
            <h3><i class="fas fa-key"></i> Alquileres</h3>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci harum omnis quia! Deleniti tempora eos, aspernatur quae dignissimos dicta. Reprehenderit soluta voluptatibus laborum sequi. Vel excepturi iste consequuntur officia tenetur!</p>
        </div>
        <div class="col-md-4 container">
            <h3><i class="fas fa-dollar-sign"></i> Tasaciones</h3>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, nobis. Dolorum commodi accusamus quisquam, atque numquam illum necessitatibus suscipit earum, ullam aliquid possimus debitis aut eaque itaque nemo consequuntur aliquam.</p>
        </div>
    </section>
    <section class="banners">
        <div class="ban">
            <div class="container">
                <h2>Tenemos lo que buscas</h2>
                <p>
					Tenemos un amplio listado que se expande constantemente, del cual se pueden elegir las propiedades 
					que prefieras, solo basta consultar por ellas.<br>
					¿Querés ver tu propiedad en nuestro listado? ¡Trabajemos juntos! <br>
					En el <a href="#form">formulario</a> al final de la página podrás contactarte con nosotros.
                </p>
            </div>
        </div>
        <div class="ban">
            <div class="container">
                <h2>El mejor servicio</h2>
                <p>
                    Nuestros profesionales y equipo especializado en su 
                    comodidad y en su experiencia como cliente
                </p>
            </div>
        </div>
        <div class="ban">
            <div class="container">
                <h2>Localidades</h2>
                <p>
                    Nuestros servicios actualmente abarcan la zona de Bahía Blanca, Capital Federal y provincia de Buenos 
                    Aires, ¡pero nos expandimos constantemente!<br>
                    Nuestro personal se ocupará de brindarle una experiencia cómoda y un buen servicio, independientemente de 
                    su localización.
                </p>
            </div>
        </div>
    </section>
    <section id="form">
        <div class="row container">
            <div class="col-lg-4">
                <h2>¡Trabajemos juntos!</h2>
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
    <?php require_once('templates/footer.html') ?>
</body>
</html>