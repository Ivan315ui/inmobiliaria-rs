<?php

require('conexion.php');
//verificación de que se haya iniciado sesión
session_start();

if (!isset($_SESSION['admin'])) {
	header('Location: sesion.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Panel de administrador</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
	<link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="css/master.css">
	<link rel="stylesheet" href="css/admin.css">
	<script src="js/header.js" defer></script>
	<script src="js/admin.js" defer></script>
	<script src="js/getData.js" defer></script>
	<link rel="shortcut icon" href="imgs/logo.png">
</head>

<body>
	<?php require_once('templates/header.html') ?>
	<?php if(isset($_GET['result']) && $_GET['result'] == 'success'):?>
		<div class="alert alert-success container" role="alert">
			<strong>Operación realizada exitosamente</strong>. Por favor, cierre esta alerta.
			<button type="button" class="close">
				<span>&times;</span>
			</button>
		</div>
	<?php elseif(isset($_GET['result']) && $_GET['result'] == 'fail'):?>
		<?php if(isset($_GET['badImageType']) && $_GET['badImageType'] == 'true'):?>
			<div class="alert alert-danger container" role="alert">
				<strong>Solo se admiten archivos de imagen para subir</strong>. Al finalizar de leer, cierre esta alerta.
				<button type="button" class="close">
					<span>&times;</span>
				</button>
			</div>
		<?php elseif(isset($_GET['files']) && $_GET['files'] == 'fail'): ?>
			<div class="alert alert-danger container" role="alert">
				<strong>Hubo un problema al subir los archivos</strong>. Por favor, verifique los datos e inténtelo de nuevo en unos instantes.
				<button type="button" class="close">
					<span>&times;</span>
				</button>
			</div>
		<?php elseif(isset($_GET['tipo']) && $_GET['tipo'] == 'fail'): ?>
			<div class="alert alert-danger container" role="alert">
				<strong>Tipo de propiedad ya existente en la base de datos</strong>.
				<button type="button" class="close">
					<span>&times;</span>
				</button>
			</div>
		<?php elseif(isset($_GET['loc']) && $_GET['loc'] == 'fail'): ?>
			<div class="alert alert-danger container" role="alert">
				<strong>Localidad ya existente en la base de datos</strong>.
				<button type="button" class="close">
					<span>&times;</span>
				</button>
			</div>
		<?php elseif(isset($_GET['prop']) && $_GET['prop'] == 'exists'): ?>
			<div class="alert alert-danger container" role="alert">
				<strong>Propiedad con el mismo título existente en la base de datos</strong>.
				<button type="button" class="close">
					<span>&times;</span>
				</button>
			</div>
		<?php else: ?>
			<div class="alert alert-danger container" role="alert">	
				<strong>Se produjo un error al realizar la operación</strong>. Por favor, verifique los datos e inténtelo de nuevo en unos instantes.
				<button type="button" class="close">
					<span>&times;</span>
				</button>
			</div>
		<?php endif ?>
	<?php endif ?>
	<div class="main container">
		<div class="row">
			<aside class="col-md-4">
				<h6>Navegación</h6>
				<nav>
					<ul>
						<li><a href="#intro">Introducción</a></li>
						<li><a href="#howto">¿Cómo funciona el panel de administración?</a></li>
						<li><a href="#funcs">Funciones</a></li>
						<li><a href="#bugs">Posibles errores</a></li>
						<li><a href="#admins">Gestionar administradores</a></li>
						<li><a href="#manage">Gestionar archivos y propiedades</a></li>
						<li><a href="#docs">Manuales</a></li>
					</ul>
				</nav>
			</aside>
			<div class="content col-md-8">
				<section id="intro">
					<h4>Introducción</h4>
					<p>
						¡Bienvenido al panel de administración! En esta página, se encuentran 
						explicaciones, tutoriales y secciones en las que se podrán ejecutar diversas 
						acciones sobre la página, entre las que están subir archivos, añadir propiedades o
						cambiar su información, etc. <br>
						En resumen, desde esta página, se gestionan la información del sitio web.
					</p>
				</section>
				<section id="howto">
					<h4>¿Cómo funciona el panel?</h4>
					<p>
						El panel de administrador implementa una serie de scripts (o códigos) para
						permitir la modificación de archivos, elementos de la base de datos y otras
						funciones de interés para el usuario administrador. <br>
						Para hacer uso de esta página, es necesario que inicie sesión con sus credenciales. 
						Por cuestines prácticas, la sesión de administrador permanecerá abierta incluso después 
						de dejar la página, pero es recomendable cerrar sesión al terminar, por seguridad.<br>
					</p>
					<h5>Recomendaciones generales</h5>
					<p>
						Estas son algunas recomendaciones a tener en cuenta al hacer uso del panel. Se
						recomienda acatarlas para una mayor seguridad y mejor experiencia de uso.
					</p>
					<ul>
						<li>
							No compartir la contraseña de administrador a nadie que no sea de confianza,
							debido a que esta página es visible en internet y cualquier persona con las
							credenciales de acceso puede realizar cambios.
						</li>
						<li>
							Esta página de administración, no es accesible desde ninguna sección del sitio web, 
							lo que hace improbable que una persona desconocida entre en la misma. A pesar de ello, 
							sigue siendo visible desde internet, como se mencionó en el punto anterior.
						</li>
						<li>
							Al momento de subir las imágenes, hacerlo de forma ordenada, es decir, seleccionarlas 
							según el orden en el que se desea que se muestren.<br>
							La primer imagen seleccionada será tomada como la principal y será utilizada como portada 
							de la propiedad en todas las secciones que aparezca. Por eso mismo, <span>se recomienda discreción </span>
							al momento de seleccionar las imágenes.
						</li>
						<li>
							Cada una de las posibles acciones a realizar en el panel, tiene ciertas
							recomendaciones, ya sea en el formato de los campos, de los archivos a subir,
							etc. Se profundizará en los apartados de cada acción.
						</li>
					</ul>
				</section>
				<section id="funcs">
					<h4>Funciones</h4>
					<p>
						El panel de administrador tiene diversas funciones, a continuación, se las nombrarán
						una a una:
					</p>
					<ul>
						<li>Añadir y eliminar administradores de la página.</li>
						<li>Añadir propiedades y sus respectivas imágenes.</li>
						<li>Cambiar información de una propiedad ya existente.</li>
						<li>Añadir imágenes a propiedades ya existentes.</li>
						<li>Eliminar propiedades y sus archivos.</li>
						<li>Añadir localidades y tipos de propiedades.</li>
					</ul>
				</section>
				<section id="bugs">
					<h4>Posibles errores</h4>
					<p>
						No hay ningún sistema perfecto, eso es seguro. Al contrario de la creencia popular,
						no necesariamente es por errores humanos o malos diseños. Un sistema puede no comportarse
						como se espera, debido a condiciones en el servidor, estado del hardware del cliente,
						pérdida de información en el sistema de comunicación, etc. <br>
						En la siguiente lista, se mencionarán en orden de mayor probabilidad a menor probabilidad,
						los posibles errores que pueden suceder y sus causas:
					</p>
					<ol>
						<li>
							<span>No se encuentran las propiedades:</span> es probable que suceda por un error de
							tipado al subir una propiedad, por ejemplo, escribir "Lavale 123" en vez de "Lavalle 123".
						</li>
						<li>
							<span>Una persona con acceso no puede acceder:</span> puede ser producto de una mala escritura 
							de las credenciales de la persona autorizada.
						</li>
						<li>
							<span>Simbolismo prohibido:</span> Se recomienda estrictamente no utilizar los siguientes símbolos al 
							ingresar credenciales, a menos que sean estrictamente necesarios: <span>
							(-, +, &, *, ¿?, ¡!, #, %, comillas dobles y comillas simples)"</span>. <br>
							El uso de los mismos puede derivar en malfuncionamiento del sistema.
						</li>
					</ol>
				</section>
			</div>
			<div class="content col-md-8">
				<section id="admins">
					<h4>Gestionar administradores</h4>
					<p>
						Esta es la pestaña de gestión de administradores, aquí podrá ver, añadir y eliminar administradores. <br>
						Esta pestaña cuenta de dos secciones principales, la primera en la que se pueden ver las personas con permisos
						de administrador y la segunda, que se compone de un formulario el cual cambia dinámicamente, según la acción
						a realizar. <br>
						<span>Las acciones disponibles a realizar son agregar y eliminar usuarios.</span>
					</p>
					<div class="query">
						<h5>Administradores actuales</h5>
						<div class="grid" id="adminslist">
							<?php 
								$propiedades = $conexionBD->prepare("SELECT id, Nombre_Administrador, Mail FROM administradores ORDER BY id");
								$propiedades->execute();
								$resultados = $propiedades->fetchAll(PDO::FETCH_ASSOC);

								foreach ($resultados as $administradores => $administrador) {
									if ($administradores == 0) {
										foreach ($administrador as $key => $value) {
											echo '<div class="header">'. $key .'</div>';
										}
									}
									$summary = '';
									foreach ($administrador as $key => $value) {
										if ($key == 'id') {
											echo '<div class="data id-admin">' . $value . "</div>";
										} else {
											echo '<div class="data">' . ($value == NULL ? "-" : $value) . "</div>";
										}
										$summary .= $value . ";";
									}
									$summary = substr($summary, 0, -1);
									echo '<div class="summary">' . $summary . '</div>';
								}

							?>
						</div>
					</div>
					<form action="manage-actions.php" method="post" autocomplete="off" id="adminsForm">
						<h5>Acciones</h5>
						<div>
							<a>Añadir</a><a>Eliminar</a>
							<div class="underline"></div>
						</div>
						<label style="display: none;">
							ID:
							<input type="text" name="adminID" class="inputs">
						</label>
						<label>
							Nombre de administrador:
							<input type="text" name="nombre" class="inputs" required>
						</label>
						<label>
							Email:
							<input type="email" name="mail" class="inputs" required>
						</label>
						<div id="verificar-mail"></div>
						<label class="contraseña">
							Contraseña:
							<input type="password" name="contraseña">
						</label>
						<label class="confirm">
							<input type="checkbox" name="confirmar" id="confirmar" value="añadir"> Confirmar acción.
						</label>
						<button id="boton">Finalizar</button>
					</form>
				</section>
			</div>
			<div class="content col-md-8">
				<section id="manage">
					<h4>Gestionar archivos y propiedades</h4>
					<p>
						Esta pestaña es la de gestión de propiedades. Las acciones posibles de realizar en este apartado son: añadir,
						eliminar o cambiar la información de las propiedades y sus respectivas imágenes. <br>
						De igual manera, también se puede cambiar la información disponible sobre las localidades y tipos de propiedades disponibles.
					</p>
					<div class="query">
						<h5>Listado de propiedades actuales</h5>
						<div class="grid" id="props">
							<?php 
								$propiedades = $conexionBD->prepare("SELECT propiedades.ID_Propiedad, propiedades.Título, propiedades.Dirección, CONCAT(tipos_propiedades.Nombre_Tipo, ' (', tipos_propiedades.ID_Tipo, ')') AS Tipo, propiedades.Piso, propiedades.Departamento, propiedades.Descripción, propiedades.Localidad, propiedades.Categoría FROM propiedades INNER JOIN tipos_propiedades ON propiedades.ID_Tipo = tipos_propiedades.ID_Tipo ORDER BY propiedades.ID_Propiedad");
								$propiedades->execute();
								$resultados = $propiedades->fetchAll(PDO::FETCH_ASSOC);

								foreach ($resultados as $propiedades => $propiedad) {
									if ($propiedades == 0) {
										foreach ($propiedad as $key => $value) {
											echo '<div class="header">'. $key .'</div>';
										}
									}
									$summary = '';
									foreach ($propiedad as $key => $value) {
										if ($key == 'ID_Propiedad') {
											echo '<div class="data id">' . $value . "</div>";
										} else {
											echo '<div class="data">' . ($value == NULL ? "-" : $value) . "</div>";
										}
										$summary .= $value . ";";
									}
									$summary = substr($summary, 0, -1);
									echo '<div class="summary">' . $summary . '</div>';
								}

							?>
						</div>
					</div>
					<form action="add-prop.php" method="post" autocomplete="off"  enctype="multipart/form-data" id="propsForm">
						<h5>Gestionar propiedades</h5>
						<div>
							<a id="add">Añadir</a><a id="rem">Eliminar</a><a id="mod">Modificar</a>
							<div class="underline"></div>
						</div>
						<div>	
							<label>
								ID:
								<input type="text" name="idprop" class="inputs">
							</label>
							<label>
								Título:
								<input type="text" name="título" class="inputs" required>
							</label>
							<label>
								Dirección:
								<input type="text" name="dirección" class="inputs" required>
							</label>
						</div>
						<div class="normal toggled">
							<label>
								Tipo:
								<select name="tipo" class="inputs" required>
									<?php
										$resultados = $conexionBD->prepare("SELECT * FROM tipos_propiedades ORDER BY ID_Tipo");
										$resultados->execute();
										$resultados = $resultados->fetchAll(PDO::FETCH_ASSOC);
										
										foreach ($resultados as $tipos => $campos) {
											echo '<option value="'. $campos['ID_Tipo'] .'">'. $campos['Nombre_Tipo'] .'</option>';
										}

									?>
								</select>
							</label>
							<label>
								Piso:
								<input type="text" name="piso" class="inputs">
							</label>
							<label>
								Departamento:
								<input type="text" name="depto" class="inputs">
							</label>
							<label class="descrip">
								<span>Descripción:</span>
								<textarea name="descripción" cols="30" rows="10" class="inputs" required></textarea>
							</label>
							<label>
								Localidad:
								<select name="localidad" class="inputs" required>
									<?php 
										$resultados = $conexionBD->prepare("SELECT localidad FROM localidades ORDER BY localidad");
										$resultados->execute();
										$resultados = $resultados->fetchAll(PDO::FETCH_ASSOC);
										
										
										foreach ($resultados as $localidades) {
											foreach ($localidades as $localidades => $value) {
												echo '<option value="' . $value . '">' . $value . '</option>';
											}
										}		

									?>
								</select>
							</label>
							<label>
								Categoría:
								<select name="categoría" class="inputs" required>
									<option value="Venta">Venta</option>
									<option value="Alquiler">Alquiler</option>
									<option value="Venta/Alquiler">Venta/Alquiler</option>
									<option value="No disponible">No disponible</option>
								</select>
							</label>
							<label>
								Archivos:
								<input type="file" name="files[]" multiple="">
							</label>
						</div>
						<button>Finalizar</button>
					</form>
					<div class="query">
						<h5>Tipos de propiedades disponibles</h5>
						<div class="grid">
							<?php
								$tipos = $conexionBD->prepare("SELECT * FROM tipos_propiedades ORDER BY ID_Tipo");
								$tipos->execute();
								$resultados = $tipos->fetchAll(PDO::FETCH_ASSOC);

								foreach ($resultados as $tipos => $tipo) {
									if ($tipos == 0) {
										foreach ($tipo as $key => $value) {
											echo '<div class="header">'. $key .'</div>';
										}
									}
									foreach ($tipo as $key => $value) {
										if ($key == 'ID_Tipo') {
											echo '<div class="data id">' . $value . "</div>";
										} else {
											echo '<div class="data">' . $value . "</div>";
										}
									}
								}

							?>
						</div>
					</div>
					<form action="manage-types.php" method="POST">
						<h5>Gestionar tipos de propiedades</h5>
							<label>
								Tipo:
								<input type="text" name="nombre" required>
							</label>
							<button>Añadir</button>
					</form>
					<div class="query">
						<h5>Localidades disponibles</h5>
						<div class="grid">
							<?php
								$localidades = $conexionBD->prepare("SELECT * FROM localidades ORDER BY id");
								$localidades->execute();
								$resultados = $localidades->fetchAll(PDO::FETCH_ASSOC);

								foreach ($resultados as $localidades => $localidad) {
									if ($localidades == 0) {
										foreach ($localidad as $key => $value) {
											echo '<div class="header" style="text-transform: capitalize;">'. $key .'</div>';
										}
									}
									foreach ($localidad as $key => $value) {
										if ($key == 'id') {
											echo '<div class="data id">' . $value . "</div>";
										} else {
											echo '<div class="data">' . $value . "</div>";
										}
									}
								}

							?>
						</div>
					</div>					
					<form action="manage-locs.php" method="POST">
						<h5>Gestionar localidades</h5>
							<label>
								Localidad:
								<input type="text" name="nombre" required>
							</label>
							<button>Finalizar</button>
					</form>
				</section>
			</div>
			<div class="content col-md-8">
				<section id="docs">
					<h4>Manual de administrador</h4>
				</section>
			</div>
		</div>
	</div>
	<footer>
		<div class="footer-row">
			<div class="container sesion">
				<small>@ 2020 RS Propiedades</small>
				<a href="sesion.php?endsession=true">Cerrar sesión</a>
			</div>
		</div>
	</footer>
</body>

</html>