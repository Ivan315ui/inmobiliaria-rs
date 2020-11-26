<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Location: propiedades.php');
} else {
    if (!isset($_GET['Propiedad']) || $_GET['Propiedad'] == "") {
        header('Location: propiedades.php');
    } else {
        require_once 'conexion.php';

        $consulta = $conexionBD->prepare("SELECT propiedades.Título, propiedades.Dirección, tipos_propiedades.Nombre_Tipo AS Tipo, propiedades.Piso, propiedades.Departamento, propiedades.Descripción, propiedades.Localidad, propiedades.Categoría FROM propiedades INNER JOIN tipos_propiedades ON propiedades.ID_Tipo = tipos_propiedades.ID_Tipo WHERE propiedades.ID_Propiedad = ?");
        $consulta->execute(array($_GET['Propiedad']));

        $propiedad = $consulta->fetch(PDO::FETCH_ASSOC);
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>RS Propiedades: Detalles de la propiedad</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
	<link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/detalles.css">
	<script src="js/header.js" defer></script>
	<script src="https://kit.fontawesome.com/79cc46baec.js" crossorigin="anonymous" defer></script>
</head>
<body>
    <?php require_once 'templates/header.html'; ?>
    <div class="banner">
        <h3 class="container"><?php echo $propiedad['Título']; ?></h3>
    </div>
    <div class="detalles row container">
        <div class="col-md-8">
            <?php $imgs = glob('imgs/propiedades/' . $propiedad['Título'] . '/*') ?>
            <div class="slider">
                <?php
                    foreach ($imgs as $img) {
                        echo "<div class=\"slide-image\"><img src=\"$img\" alt=\"\"></div>";
                    }
                ?>
                <button><i class="fas fa-angle-left"></i></button>
                <button><i class="fas fa-angle-right"></i></button>
            </div>
            <div class="detalles">
                <h4>Descripción</h4>
                <?php
                    echo "<p>{$propiedad['Descripción']}</p>"
                ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="desc">
                <h4>Detalles</h4>
                <div class="grid">
                    <?php
                        foreach ($propiedad as $campo => $dato) {
                            if ($campo != 'Descripción' && $campo != 'Título') {
                                if ($dato != "") {
                                    echo "<div class=\"header\">$campo:</div>";
                                    echo "<div class=\"data\">$dato</div>";
                                }
                            }
                        }
                    ?>
                </div>
            </div>
            <div class="consultas">
                <form action="">
                    <h4>Consultar</h4>
                    <label>
                        <h6>Nombre</h6>
                        <input type="text" required>
                    </label>
                    <label>
                        <h6>Apellido</h6>
                        <input type="text" required>
                    </label>
                    <label>
                        <h6>Asunto</h6>
                        <input type="text" required>
                    </label>
                    <label>
                        <h6>Consulta</h6>
                        <input type="text" required>
                    </label>
                    <button class="button">Consultar</button>
                    <a href=""><i class="fab fa-whatsapp"></i>Consultar por WhatsApp</a>
                    <a href=""><i class="fas fa-phone-alt"></i>Llamar por teléfono</a>
                </form>
            </div>
        </div>
    </div>
    <?php require_once 'templates/footer.html'; ?>
</body>
</html>