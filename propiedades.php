<?php

require_once("conexion.php");

//Defino el tamaño de propiedades a ver
$tamaño = 9;
if($_GET){
$pagina = $_GET["página"];
}else{
	$pagina = 1;
}
if (!$pagina) {
    $inicio = 0;
    $pagina = 1;
}
else {
    $inicio = ($pagina - 1) * $tamaño;
}

//Hago la consulta
$rows = $conexionBD->prepare("SELECT COUNT(*) FROM propiedades");
$rows->execute(array());
$num_total_registros = $rows->fetchALL();
//Calculo el total de páginas
$total_rows = $num_total_registros[0][0];
$total_paginas = ceil($total_rows / $tamaño);

/*
echo "Número de registros encontrados: " . $total_rows . "<br>";
echo "Se muestran páginas de " . $tamaño . " registros cada una<br>";
echo "Mostrando la página " . $pagina . " de " . $total_paginas . "<p>";
*/
$maximo = $tamaño*$pagina;
if($pagina == 1){
$minimo = ($tamaño*$pagina)/$tamaño; 
}else{
$minimo = ($tamaño*$pagina)/$pagina; 
}
if (empty($_GET)) {
	
	//consulta que solicita los datos de las propiedades y cambia su id de tipo por el nombre del tipo de propiedad que es (INNER JOIN)
	$consulta = $conexionBD->prepare("SELECT propiedades.ID_Propiedad, propiedades.Título, propiedades.Dirección, tipos_propiedades.Nombre_Tipo AS Tipo, propiedades.Piso, propiedades.Departamento, propiedades.Descripción, propiedades.Localidad, propiedades.Categoría FROM propiedades INNER JOIN tipos_propiedades ON propiedades.ID_Tipo = tipos_propiedades.ID_Tipo WHERE Categoría!='No disponible' LIMIT {$minimo},{$maximo}");
	$consulta->execute();

	$resultados = $consulta->fetchAll();

} else if(isset($_GET['Nombre'])) {

	//consulta solicitada cuando se busca por nombre
	$consulta = $conexionBD->prepare("SELECT propiedades.ID_Propiedad, propiedades.Título, propiedades.Dirección, tipos_propiedades.Nombre_Tipo AS Tipo, propiedades.Piso, propiedades.Departamento, propiedades.Descripción, propiedades.Localidad, propiedades.Categoría FROM propiedades INNER JOIN tipos_propiedades ON propiedades.ID_Tipo = tipos_propiedades.ID_Tipo WHERE Título LIKE ? LIMIT {$minimo},{$maximo}");
	$consulta->execute(array("%" . $_GET['Nombre'] . "%"));

	$resultados = $consulta->fetchAll();

} else {

	if ($_GET['Tipo'] == "" && $_GET['Localidad'] == "" && $_GET['Categoría'] == 'Ambas') {
		
		$consulta = $conexionBD->prepare("SELECT propiedades.ID_Propiedad, propiedades.Título, propiedades.Dirección, tipos_propiedades.Nombre_Tipo AS Tipo, propiedades.Piso, propiedades.Departamento, propiedades.Descripción, propiedades.Localidad, propiedades.Categoría FROM propiedades INNER JOIN tipos_propiedades ON propiedades.ID_Tipo = tipos_propiedades.ID_Tipo WHERE Categoría!='No disponible' LIMIT {$minimo},{$maximo}");

	} else {
		
		$sentencia = "SELECT propiedades.ID_Propiedad, propiedades.Título, propiedades.Dirección, tipos_propiedades.Nombre_Tipo AS Tipo, propiedades.Piso, propiedades.Departamento, propiedades.Descripción, propiedades.Localidad, propiedades.Categoría FROM propiedades INNER JOIN tipos_propiedades ON propiedades.ID_Tipo = tipos_propiedades.ID_Tipo WHERE ";
		//paraterminar
		if ($_GET['Tipo'] == "") {
			$sentencia .= 'tipos_propiedades.ID_Tipo != ' . "''";
		} else {
			$sentencia .= 'tipos_propiedades.ID_Tipo = ' . $_GET['Tipo'];
		}
		if ($_GET['Localidad'] == "") {
			$sentencia .= ' AND propiedades.Localidad != ' . "''";
		} else {
			$sentencia .= ' AND propiedades.Localidad = ' . "'" . $_GET['Localidad'] . "'";
		}
		if ($_GET['Categoría'] == 'Ambas') {
			$sentencia .= ' AND propiedades.Categoría != ' . "''";
		} else {
			$sentencia .= ' AND propiedades.Categoría = ' . "'" . $_GET['Categoría'] . "'";
		}

		$consulta = $conexionBD->prepare($sentencia);

	}

	
	$consulta->execute();
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
	<script src="js/propiedades.js" defer></script>
	<script src="https://kit.fontawesome.com/79cc46baec.js" crossorigin="anonymous" defer></script>
	<link rel="shortcut icon" href="imgs/logo.png">
</head>
<body>
	<?php require_once('templates/header.html') ?>
	<div class="intro">
		<div class="container">
			<h1>Listado de propiedades</h1>
			<form action="">
				<input type="text" name="Nombre" placeholder="Ingrese un nombre o fragmento">
				<button class="button"><i class="fas fa-search"></i><span>Buscar</span></button>
			</form>
		</div>
	</div>
	<section class="propiedades">
		<div class="filtros">
			<div class="container">
				<?php 
					if (isset($_GET['Tipo']) && isset($_GET['Localidad']) && isset($_GET['Categoría'])) {
						foreach ($_GET as $key => $value) {
							echo "<div class=\"gets\">{$_GET[$key]}</div>";
						}
					}
				?>
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
							<?php
								$consulta = $conexionBD->prepare("SELECT localidad FROM localidades ORDER BY localidad");
								$consulta->execute();
								$consulta = $consulta->fetchAll(PDO::FETCH_ASSOC);
								
								foreach ($consulta as $localidades) {
									foreach ($localidades as $localidades => $value) {
										echo '<option value="' . $value . '">' . $value . '</option>';
									}
								}

							?>
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
		<?php
		 foreach ($resultados as $resultado => $propiedad):?>
			<div class="propiedad">
				<a class="cat" href="<?php echo 'propiedades.php?Tipo=&Localidad=&Categoría=' . $propiedad['Categoría']; ?>">
					<?php echo $propiedad['Categoría']; ?>
				</a>
				<?php foreach ($tipos as $resultado => $nombre): ?>
					<?php if ($nombre['Nombre_Tipo'] == $propiedad['Tipo']): ?>
						<a class="type" href="propiedades.php?Tipo=<?php echo $nombre['ID_Tipo'] ?>&Localidad=&Categoría=Ambas"> <?php echo $propiedad['Tipo']; ?> </a>
					<?php endif; ?>
				<?php endforeach; ?>
				<a href="detalles.php?Propiedad=<?php echo $propiedad['ID_Propiedad'] ?>" class="detail-link">
					<div class="back" style="background-image: url('imgs/propiedades/<?php echo $propiedad['Título']; ?>/<?php echo scandir("imgs/propiedades/{$propiedad['Título']}")[2]; ?>'); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
					<div class="desc">
						<h5 title="<?php echo $propiedad['Título']; ?>"><?php echo $propiedad['Título']; ?></h6>
						<h6 title="<?php echo $propiedad['Dirección']; ?>"><i class="fas fa-map-marker-alt"></i> <?php echo $propiedad['Dirección']; ?></h6>
						<h6 title="<?php echo $propiedad['Localidad']; ?>"><i class="fas fa-map-marked-alt"></i> <?php echo $propiedad['Localidad']; ?></h6>
					</div>
				</a>
			</div>
		<?php 
		endforeach; 
		?>
		</div>
	</section>
	<?php
	if ($total_paginas > 1):
		?>
		<ul align="center">
				<?php
			for ($i=1;$i<=$total_paginas;$i++):
				?>
				<li>
					<?php
						if ($pagina == $i){
							//si muestro el índice de la página actual, no coloco enlace
							echo $pagina . " ";
						}else{
							//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página
							echo "<a href='propiedades.php?Tipo=".$_GET['Tipo']."&Localidad=".$_GET['Localidad']."&Categoría=".$_GET['Categoría']."&página=" . $i ."'>".$i."</a>";
						}
					?>
				</li>
			<?php endfor; ?>
		</ul>
	<?php
	endif;
	?>
	<?php require("templates/footer.html") ?>
</body>
</html>

<?php /*cerrar la conexión bd */ $conexionBD = null; ?>