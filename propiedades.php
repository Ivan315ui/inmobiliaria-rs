<?php

require_once("conexion.php");

if (empty($_GET)) {
	
	//consulta que solicita los datos de las propiedades y cambia su id de tipo por el nombre del tipo de propiedad que es (INNER JOIN)
	$consulta = $conexionBD->prepare("SELECT propiedades.ID_Propiedad, propiedades.Título, propiedades.Dirección, tipos_propiedades.Nombre_Tipo AS Tipo, propiedades.Piso, propiedades.Departamento, propiedades.Descripción, propiedades.Localidad, propiedades.Categoría FROM propiedades INNER JOIN tipos_propiedades ON propiedades.ID_Tipo = tipos_propiedades.ID_Tipo WHERE Categoría!='No disponible'");
	$consulta->execute();

	$resultados = $consulta->fetchAll();

} else if(isset($_GET['Nombre'])) {

	//consulta solicitada cuando se busca por nombre
	$consulta = $conexionBD->prepare("SELECT propiedades.ID_Propiedad, propiedades.Título, propiedades.Dirección, tipos_propiedades.Nombre_Tipo AS Tipo, propiedades.Piso, propiedades.Departamento, propiedades.Descripción, propiedades.Localidad, propiedades.Categoría FROM propiedades INNER JOIN tipos_propiedades ON propiedades.ID_Tipo = tipos_propiedades.ID_Tipo WHERE Título LIKE ?");
	$consulta->execute(array("%" . $_GET['Nombre'] . "%"));

	$resultados = $consulta->fetchAll();

} else {

	//consulta solicitada por filtros
	$sentencia = "SELECT propiedades.ID_Propiedad, propiedades.Título, propiedades.Dirección, tipos_propiedades.Nombre_Tipo AS Tipo, propiedades.Piso, propiedades.Departamento, propiedades.Descripción, propiedades.Localidad, propiedades.Categoría FROM propiedades INNER JOIN tipos_propiedades ON propiedades.ID_Tipo = tipos_propiedades.ID_Tipo WHERE ";
	$elementos = array();
	
	if ($_GET['Tipo'] == "" && $_GET['Localidad'] == "" && $_GET['Categoría'] == 'Ambas') {
		
		$consulta = $conexionBD->prepare("SELECT propiedades.ID_Propiedad, propiedades.Título, propiedades.Dirección, tipos_propiedades.Nombre_Tipo AS Tipo, propiedades.Piso, propiedades.Departamento, propiedades.Descripción, propiedades.Localidad, propiedades.Categoría FROM propiedades INNER JOIN tipos_propiedades ON propiedades.ID_Tipo = tipos_propiedades.ID_Tipo WHERE Categoría!='No disponible'");

		$consulta->execute();

	} else {
		
		//paraterminar
		$sentencia .= "tipos_propiedades.ID_Tipo ? AND propiedades.Localidad ? AND propiedades.Categoría ?";

		if ($_GET['Tipo'] != "") {
			$elementos[] = "= " . intval($_GET['Tipo']);
		} else {
			$elementos[] = "!= {$_GET['Tipo']}";
		}
		if ($_GET['Localidad'] != "") {
			$elementos[] = "= " . $_GET['Localidad'];
		} else {
			$elementos[] = "!= {$_GET['Localidad']}";
		}

		if ($_GET['Categoría'] != "Ambas") {
			$elementos[] = "= " . $_GET['Categoría'];
		} else {
			$elementos[] = "!=" . "";
		}

		// echo $sentencia;
		// echo "<br>";
		// var_dump($elementos);
		// die();
		$consulta = $conexionBD->prepare($sentencia);
		$consulta->execute($elementos);
	}

	$resultados = $consulta->fetchAll();

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>RS Propiedades: listado</title>
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
				<form class="grid-wrapper" method="GET">
					<label>
						<span>Tipo:</span>
						<select name="Tipo">
							<option value="">Cualquier tipo</option>
							<?php 
								$tipos = $conexionBD->prepare("SELECT * FROM tipos_propiedades;");
								$tipos->execute();
								$tipos = $tipos->fetchAll();
							
								foreach ($tipos as $resultado => $nombre) {
									echo '<option value="'. $nombre['ID_Tipo'] . '">' . $nombre['Nombre_Tipo'] .  '</option>';
								}
							?>
						</select>
					</label>
					<label>
						<span>Localidad:</span>
						<select name="Localidad">
							<option value="">Todas</option>
							<option value="Bahía Blanca">Bahía Blanca</option>
							<option value="Monte Hermoso">Monte Hermoso</option>
						</select>
					</label>
					<label>
						<span>Categoría:</span>
						<select name="Categoría">
							<option value="Ambas">Todas</option>
							<option value="Venta">Venta</option>
							<option value="Alquiler">Alquiler</option>
						</select>
					</label>
					<button class="button">Filtrar</button>
				</form>
			</div>
		</div>
		<div class="container">
		<?php foreach ($resultados as $resultado => $propiedad): ?>
			<div class="propiedad">
				<a class="cat" href="<?php echo 'propiedades.php?cat=' . $propiedad['Categoría']; ?>">
					<?php echo $propiedad['Categoría']; ?>
				</a>
				<a class="type" href="<?php echo 'propiedades.php?type=' . $propiedad['Tipo']; ?>"><?php echo $propiedad['Tipo']; ?></a>
				<a href="detalles.php?<?php echo $propiedad['ID_Propiedad'] ?>" class="detail-link">
					<div class="back" style="background-image: url('imgs/propiedades/<?php echo $propiedad['Título']; ?>/<?php echo scandir("imgs/propiedades/{$propiedad['Título']}")[2]; ?>'); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
					<div class="desc">
						<h5 title="<?php echo $propiedad['Título']; ?>"><?php echo $propiedad['Título']; ?></h6>
						<h6><i class="fas fa-map-marker-alt"></i> <?php echo $propiedad['Dirección']; ?></h6>
						<h6><i class="fas fa-map-marked-alt"></i> <?php echo $propiedad['Localidad']; ?></h6>
					</div>
				</a>
			</div>
		<?php endforeach; ?>
		</div>
	</section>
	<?php require("templates/footer.html") ?>
</body>
</html>

<?php /*cerrar la conexión bd */ $conexionBD = null; ?>