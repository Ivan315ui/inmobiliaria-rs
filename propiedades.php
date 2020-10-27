<?php

require_once("conexion.php");

if (empty($_GET)) {
	
	//consulta que solicita los datos de las propiedades y cambia su id de tipo por el nombre del tipo de propiedad que es (INNER JOIN)
	$consulta = $conexionBD->prepare("SELECT propiedades.Título, propiedades.Dirección, tipos_propiedades.Nombre_Tipo AS Tipo, propiedades.Piso, propiedades.Departamento, propiedades.Descripción, propiedades.Localidad, propiedades.Categoría FROM propiedades INNER JOIN tipos_propiedades ON propiedades.ID_Tipo = tipos_propiedades.ID_Tipo WHERE Categoría!='No disponible'");
	$consulta->execute();

	$resultados = $consulta->fetchAll();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>RS Propiedades</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
	<link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="css/master.css">
	<link rel="stylesheet" href="css/propiedades.css">
	<script src="js/header.js" defer></script>
	<script src="https://kit.fontawesome.com/79cc46baec.js" crossorigin="anonymous" defer></script>
</head>
<body>
	<?php require_once('templates/header.html') ?>
	<div class="intro">
		<div class="container">
			<h1>Listado de propiedades</h1>
		</div>
	</div>
	<section class="propiedades">
		<div class="filtros">
			<div class="container">	
				<h3>Filtrar por:</h3>
				<div class="grid-wrapper"></div>
			</div>
		</div>
		<div class="container">
		<!--Carga de las propiedades (fichate esa jere), podés adaptarlo a lo del inicio-->
		<?php foreach ($resultados as $resultado => $propiedad): ?>
			<div class="propiedad">
				<div class="cat" style="background: url('imgs/propiedades/<?php echo $propiedad['Título']; ?>/<?php echo $propiedad['Título']; ?>-1.jpeg'); height: 500px; width: 600px; background-size: contain; background-repeat: no-repeat;">
					<a href="<?php echo 'propiedades.php?cat=' . $propiedad['Categoría']; ?>">
						<?php echo $propiedad['Categoría']; ?>
					</a>
				</div>
				<div class="desc">
					<h5><?php echo $propiedad['Título']; ?></h5>
					<h5><?php echo $propiedad['Dirección']; ?></h5>
					<h5><?php echo $propiedad['Localidad']; ?></h5>
					<h5><?php echo $propiedad['Tipo']; ?></h5>
				</div>
			</div>
		<?php endforeach; ?>
		</div>
	</section>
</body>
</html>

<?php /*cerrar la conexión bd */ $conexionBD = null; ?>