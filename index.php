<?php

require_once("conexion.php");

//conseguir la cantidad de propiedades, solo por si el servidor limita la cantidad de resultados posibles
$consulta = $conexionBD->prepare("SELECT COUNT(ID_Propiedad) FROM propiedades");
$consulta->execute();

$rows = $consulta->fetch();

//consulta que solicita los datos de las propiedades y cambia su id de tipo por el nombre del tipo de propiedad que es (INNER JOIN)
$consulta = $conexionBD->prepare("SELECT propiedades.ID_Propiedad, propiedades.Título, propiedades.Dirección, tipos_propiedades.Nombre_Tipo AS Tipo, tipos_propiedades.ID_Tipo, propiedades.Piso, propiedades.Departamento, propiedades.Descripción, propiedades.Localidad, propiedades.Categoría FROM propiedades INNER JOIN tipos_propiedades ON propiedades.ID_Tipo = tipos_propiedades.ID_Tipo WHERE Categoría!='No disponible' LIMIT $rows[0]");
$consulta->execute();

$propiedades = $consulta->fetchAll(PDO::FETCH_ASSOC);

$indices = array_keys($propiedades);

shuffle($indices);

$destacados = array();
$count = 0;

foreach ($indices as $indice) {
	$destacados[] = $propiedades[$indice];
	$count++;
	if ($count == 7) {
		break;
	}
}

$propiedades = NULL;
$consulta = NULL;
$rows = NULL;
$indices = NULL;

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>RS Propiedades</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
	<link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="css/master.css">
	<link rel="stylesheet" href="css/index.css">
	<script src="js/header.js" defer></script>
	<script src="js/slider.js" defer></script>
	<script src="js/featured.js" defer></script>
	<script src="js/index-grid.js" defer></script>
	<script src="https://kit.fontawesome.com/79cc46baec.js" crossorigin="anonymous" defer></script>
	<link rel="shortcut icon" href="imgs/logo.png">
</head>

<body>
	<?php require('templates/header.html') ?>
	<div class="slider">
		<div class="slide"></div>
		<div class="slide"></div>
		<div class="slide"></div>
		<div class="container">
			<h1>ROSCH Propiedades</h1>
			<h3><i>Servicios inmobiliarios en Bahía Blanca y la zona.</i></h3>
			<div>
				<a href="contacto.php#sobre" class="button">Sobre nosotros</a>
				<a href="services.php" class="button">Servicios</a>
			</div>
		</div>
	</div>
	<section id="servicios">
		<div class="banner">
			<h4>ROSCH Propiedades</h4>
			<h2>Servicios</h2>
		</div>
		<div class="container">
			<div class="grid-container">
				<div class="grid-item">
					<a href="propiedades.php?Tipo=&Localidad=&Categoría=Venta">
						<i class="fas fa-home"></i>
						<h3>Ventas</h3>
					</a>
				</div>
				<div class="grid-item">
					<a href="propiedades.php?Tipo=&Localidad=&Categoría=Alquiler">
						<i class="fas fa-key"></i>
						<h3>Alquileres</h3>
					</a>
				</div>
				<div class="grid-item">
					<a href="services.php#tasaciones">
						<i class="fas fa-dollar-sign"></i>
						<h3>Tasaciones</h3>
					</a>
				</div>
				<div class="grid-item">
					<a href="propiedades.php?Tipo=&Localidad=Monte+Hermoso&Categoría=Ambas">
						<i class="fas fa-map-marked-alt"></i>
						<h3>Monte hermoso</h3>
					</a>
				</div>
			</div>
		</div>
	</section>
	<section id="destacados">
		<h2>Destacados</h2>
		<div class="container">
			<div class="grid-wrapper">
				<?php foreach ($destacados as $propiedad => $campos): ?>
				<div class="grid-item">
					<a class="cat" href="<?php echo 'propiedades.php?Tipo=&Localidad=&Categoría=' . $campos['Categoría']; ?>">
						<?php echo $campos['Categoría']; ?>
					</a>
					<a class="type" href="propiedades.php?Tipo=<?php echo $campos['ID_Tipo'] ?>&Localidad=&Categoría=Ambas"> <?php echo $campos['Tipo']; ?> </a>
					<a href="detalles.php?Propiedad=<?php echo $campos['ID_Propiedad'] ?>" class="detail-link">
						<div class="back" style="background-image: url('<?php echo glob('imgs/propiedades/' . $campos['Título'] . '/*')[0]; ?>'); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
						<div class="desc">
							<h5 title="<?php echo $campos['Título']; ?>"><?php echo $campos['Título']; ?></h6>
							<h6 title="<?php echo $campos['Dirección']; ?>"><i class="fas fa-map-marker-alt"></i> <?php echo $campos['Dirección']; ?></h6>
							<h6 title="<?php echo $campos['Localidad']; ?>"><i class="fas fa-map-marked-alt"></i> <?php echo $campos['Localidad']; ?></h6>
						</div>
					</a>
				</div>
				<?php endforeach ?>
				<button class="slide-buttons left">
					<i class="fas fa-caret-left"></i>
				</button>
				<button class="slide-buttons right">
					<i class="fas fa-caret-right"></i>
				</button>
			</div>
			<a href="propiedades.php" class="button">Ver el catálogo completo</a>
		</div>
			
	</section>
	<?php require('templates/footer.html') ?>
</body>

</html>