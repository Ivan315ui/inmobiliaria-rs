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
		<?php elseif(strlen($_POST['nombre']) == 0 || strlen($_POST['mail']) == 0 || strlen($_POST['contraseña']) == 0): ?>
			<div class="alert alert-danger container" role="alert">
				<strong>Los campos Nombre, Email y Contraseña no deben estar vacíos, verifique los datos y vuelva a intentarlo</strong>. Al finalizar de leer, cierre esta alerta.
				<button type="button" class="close">
					<span>&times;</span>
				</button>
			</div>
		<?php elseif(strlen($_POST['nombre']) == 0 || strlen($_POST['mail']) == 0): ?>
			<div class="alert alert-danger container" role="alert">
				<strong>Los campos Nombre y Email no deben estar vacio, verifique los datos y vuelva a intentarlo</strong>. Al finalizar de leer, cierre esta alerta.
				<button type="button" class="close">
					<span>&times;</span>
				</button>
			</div>
		<?php elseif(strlen($_POST['nombre']) == 0 || strlen($_POST['contraseña']) == 0): ?>
			<div class="alert alert-danger container" role="alert">
				<strong>Los campos Nombre y Contraseña no deben estar vacio, verifique los datos y vuelva a intentarlo</strong>. Al finalizar de leer, cierre esta alerta.
				<button type="button" class="close">
					<span>&times;</span>
				</button>
			</div>
		<?php elseif(strlen($_POST['mail']) == 0 || strlen($_POST['contraseña']) == 0): ?>
			<div class="alert alert-danger container" role="alert">
				<strong>Los campos Email y Contraseña no deben estar vacio, verifique los datos y vuelva a intentarlo</strong>. Al finalizar de leer, cierre esta alerta.
				<button type="button" class="close">
					<span>&times;</span>
				</button>
			</div>
		<?php elseif(strlen($_POST['contraseña']) == 0): ?>
			<div class="alert alert-danger container" role="alert">
				<strong>El campo contraseña no debe estar vacio, verifique los datos y vuelva a intentarlo</strong>. Al finalizar de leer, cierre esta alerta.
				<button type="button" class="close">
					<span>&times;</span>
				</button>
			</div>
		<?php elseif(strlen($_POST['contraseña']) < 6): ?>
			<div class="alert alert-danger container" role="alert">
				<strong>La contraseña es menor a 6 caracteres, verifique los datos y vuelva a intentarlo</strong>. Al finalizar de leer, cierre esta alerta.
				<button type="button" class="close">
					<span>&times;</span>
				</button>
			</div>
		<?php elseif(strlen($_POST['contraseña']) > 16): ?>
			<div class="alert alert-danger container" role="alert">
				<strong>La contraseña es mayor a 16 caracteres, verifique los datos y vuelva a intentarlo</strong>. Al finalizar de leer, cierre esta alerta.
				<button type="button" class="close">
					<span>&times;</span>
				</button>
			</div>
		<?php elseif(strlen($_POST['mail']) == 0): ?>
			<div class="alert alert-danger container" role="alert">
				<strong>El campo Email no debe estar vacio, verifique los datos y vuelva a intentarlo</strong>. Al finalizar de leer, cierre esta alerta.
				<button type="button" class="close">
					<span>&times;</span>
				</button>
			</div>
		<?php elseif(strlen($_POST['nombre']) == 0): ?>
			<div class="alert alert-danger container" role="alert">
				<strong>El campo Nombre no debe estar vacio, verifique los datos y vuelva a intentarlo</strong>. Al finalizar de leer, cierre esta alerta.
				<button type="button" class="close">
					<span>&times;</span>
				</button>
			</div>
		<?php else: ?>
			<div class="alert alert-danger container" role="alert">
				<strong>Hubo un problema al realizar la operación, verifique los datos</strong>. Al finalizar de leer, cierre esta alerta.
				<button type="button" class="close">
					<span >&times;</span>
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
						¡Bienvenido al panel de administración! En esta sección, podrá encontrar
						tutoriales y secciones en las que se podrán ejecutar diversas acciones
						sobre la página, entre las que están subir archivos, añadir propiedades o
						cambiar su información, etc. <br>
						En resumen, desde esta página, se gestionan las funciones generales del
						sitio web.
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
							Al momento de subir las imágenes, hacerlo de forma ordenada, es decir, seleccionarlas 
							según el orden en el que se desea que se muestren. <span>En caso de seleccionarlas al mismo 
							tiempo, no hay garantía de la forma en la que aparecerán.</span>
						</li>
						<li>
							Cada una de las posibles acciones a realizar en el panel, tiene ciertas
							recomendaciones, ya sea en el formato de los campos, de los archivos a subir,
							etc. Se profundizará más en el tema en los apartados de cada acción.
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
						<li>Gestionar administradores de la página.</li>
						<li>Añadir propiedades y sus respectivas imágenes.</li>
						<li>Añadir imágenes a propiedades ya existentes.</li>
						<li>Eliminar propiedades.</li>
						<li>Cambiar información de una propiedad ya existente.</li>
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
							<span>Simbolismo prohibido en gestionar propiedades:</span> Existen distintos simbolos que estan prohibidos
							a la hora de subir nuestras propiedades, por ejemplo "(-, +, &, *, ¿?, ¡!, #, %, comillas dobles y comillas simples)".
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
						<!--generar un párrafo por cada resultado de la consulta-->
					</div>
					<form action="manage-actions.php" method="post" autocomplete="off">
						<h5>Acciones</h5>
						<div>
							<a>Añadir</a><a>Eliminar</a>
							<div class="underline"></div>
						</div>
						<label>
							Nombre de administrador:
							<input type="text" name="nombre" id="nombre">
						</label>
						<div id="verificar-name"></div>
						<label>
							Email:
							<input type="email" name="mail" id="mail">
						</label>
						<div id="verificar-mail"></div>
						<label class="contraseña">
							Contraseña:
							<input type="password" name="contraseña" id="contraseña">
						</label>
						<div id="verificar-pass"></div>
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
						eliminar o cambiar la información de las propiedades y sus respectivas imágenes.
					</p>
					<div class="query">
						<h5>Listado de propiedades actuales</h5>
						<div class="grid">
							<?php 
								$propiedades = $conexionBD->prepare("SELECT propiedades.ID_Propiedad, propiedades.Título, propiedades.Dirección, tipos_propiedades.Nombre_Tipo AS Tipo, propiedades.Piso, propiedades.Departamento, propiedades.Descripción, propiedades.Localidad, propiedades.Categoría FROM propiedades INNER JOIN tipos_propiedades ON propiedades.ID_Tipo = tipos_propiedades.ID_Tipo ORDER BY propiedades.ID_Propiedad");
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
									echo '<div class="summary">' . $summary . '</div>';
								}

							?>
						</div>
					</div>
					<form action="manage-properties.php" method="post" autocomplete="off"  enctype="multipart/form-data">
						<h5>Gestionar propiedades</h5>
						<div>
							<a id="add">Añadir</a><a id="rem">Eliminar</a><a id="mod">Modificar</a>
							<div class="underline"></div>
						</div>
						<div class="add toggled">
							<label>
								Título:
								<input type="text" name="título" id="título">
							</label>
							<label>
								Dirección:
								<input type="text" name="dirección" id="dirección">
							</label>
							<label>
								Tipo:
								<select name="tipo" id="tipo">
									<option value="1">Casa</option>
									<option value="2">Departamento</option>
									<option value="3">Galpon</option>
									<option value="4">Terreno</option>
									<option value="5">Lote</option>
								</select>
							</label>
							<label>
								Piso:
								<input type="text" name="piso" id="piso">
							</label>
							<label>
								Departamento:
								<input type="text" name="depto" id="depto">
							</label>
							<label>
								Categoría:
								<select name="categoría" id="categoría">
									<option value="Venta">Venta</option>
									<option value="Alquiler">Alquiler</option>
									<option value="Ambas">Venta/Alquiler</option>
									<option value="No disponible">No disponible</option>
								</select>
							</label>
							<label class="descrip">
								<span>Descripción:</span>
								<textarea name="descripción" id="descripción" cols="30" rows="10"></textarea>
							</label>
							<label>
								Localidad:
								<select name="localidad" id="localidad">
									<?php ?>
									<option value="Bahía Blanca">Bahía Blanca</option>
									<option value="Monte Hermoso">Monte Hermoso</option>
								</select>
							</label>
							<label>
								Archivos:
								<input type="file" name="files[]" multiple="">
							</label>
						</div>
						<div class="rem">
							<label>
								ID:
								<input type="text" name="ridprop" id="ridprop">
							</label>
							<label>
								Dirección:
								<input type="text" name="rdirección" id="rdirección">
							</label>
							<label>
								Título:
								<input type="text" name="rtítulo" id="rtítulo">
							</label>
						</div>
						<div class="mod">
							<label style="display: none;">
								ID:
								<input type="text" name="midprop">
							</label>
							<label>
								Dirección:
								<input type="text" name="mdirección">
							</label>
							<label>
								Piso:
								<input type="text" name="mpiso">
							</label>
							<label>
								Departamento:
								<input type="text" name="mdepto">
							</label>
							<label>
								Título:
								<input type="text" name="mtítulo">
							</label>
							<label>
								Tipo:
								<select name="mtipo">
									<option value="1">Casa</option>
									<option value="2">Departamento</option>
									<option value="3">Galpon</option>
									<option value="4">Terreno</option>
									<option value="5">Lote</option>
								</select>
							</label>
							<label>
								Categoría:
								<select name="mcategoría">
									<option value="Venta">Venta</option>
									<option value="Alquiler">Alquiler</option>
									<option value="Ambas">Venta/Alquiler</option>
									<option value="No disponible">No disponible</option>
								</select>
							</label>
							<label class="descrip">
								<span>Descripción:</span>
								<textarea name="mdescripción" cols="30" rows="10"></textarea>
							</label>
							<label>
								Localidad:
								<select name="mlocalidad">
									<option value="Bahía Blanca">Bahía Blanca</option>
									<option value="Monte Hermoso">Monte Hermoso</option>
								</select>
							</label>
							<label for="">
								Archivos:
								<input type="file" name="mfiles[]" multiple="">
							</label>
						</div>
						<label class="confirm">
							<input type="checkbox" name="confirmarP" id="confirmarP" value="add"> Confirmar acción.
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