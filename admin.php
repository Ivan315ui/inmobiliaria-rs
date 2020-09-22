<?php
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
	<script src="https://kit.fontawesome.com/79cc46baec.js" crossorigin="anonymous" defer></script>
</head>

<body>
	<header>
		<div class="container">
			<img src="imgs/logo.png" alt="rs-logo">
			<nav class="md-menu">
				<ul>
					<li><a href="">Inicio</a></li>
					<li><a href="">Nosotros</a></li>
					<li><a href="">Servicios</a></li>
					<li><a href="">Contacto</a></li>
				</ul>
			</nav>
			<div id="burger-icon">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</div>
			<nav class="mobile-menu">
				<ul>
					<li><a href="">Inicio</a></li>
					<li><a href="">Nosotros</a></li>
					<li><a href="">Servicios</a></li>
					<li><a href="">Propiedades</a></li>
					<li><a href="">Contacto</a></li>
				</ul>
			</nav>
		</div>
	</header>
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
						Para poder utilizarlo, se deberá iniciar sesión cada vez que se deje la
						página, por lo que si se cierra la pestaña, se vuelve al inicio o a cualquier
						otra página del dominio, se cerrará la sesión de administrador y deberá ingresar
						nuevamente. <br>
						Por razones de seguridad, <span>es recomendable cerrar esta página</span> cada
						vez que se termina de utilizar, porque podría quedar expuesta en su PC y
						cualquier otra persona podría realizar cambios en el sistema.
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
							Al subir imágenes de una propiedad, llamarlas todas de forma similar según su
							dirección. Por ejemplo, si se tiene una propiedad en Lavalle 1349, llamar a
							las imágenes de la propiedad "Lavalle 1349-1", "Lavalle 1349-2", y así
							sucesivamente. <br>
							<span>Nótese que en caso contrario, se producirá un error, es probable que no
								de muestren todas las imágenes deseadas.</span>
						</li>
						<li>
							Al subiur imágenes d euna propiedad, es recomendable tambiém que se indique cuál
							es la principal, es decir, que la imagen principal de la propiedad se llame
							"Lavalle 1349-P", siguiendo con el ejemplo anterior y luego se las enumere desde
							la primera a la última, como se indicó en el ejemplo anterior. <span>En caso de
								no indicar cuál es la principal, la primer imagen subida ocupará su lugar.</span>.
						</li>
						<li>
							Cerrar la página después de terminar las acciones a realizar.
						</li>
						<li>
							Cada una de las posibles acciones a realizar en el panel, tiene ciertas
							recomendaciones, ya sea en el formato de los campos, de los archivos a subir,
							etc. Se profundizará más en el tema en cada acción posible.
						</li>
					</ul>
					<li>
						Cada una de las posibles acciones a realizar en el panel, tiene ciertas
						recomendaciones, ya sea en el formato de los campos, de los archivos a subir,
						etc. Se profundizará más en el tema en cada acción posible.
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
						<li>Verificar las propiedades subidas actualmente por su nombre.</li>
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
							<span>Las propiedades no se almacenan correctamente en el servidor:</span> puede suceder
							por pérdida momentánea de conexión o una conexión débil por parte del administrador.
							También es posible que se produzca porque el servidor no tiene disponible la base de datos
							momentáneamente.
						</li>
						<li>
							<span>No se encuentran las propiedades:</span> es probable que suceda por un error de
							tipado al subir una propiedad, por ejemplo, escribir "Lavale 123" en vez de "Lavalle 123".
						</li>
						<li>
							<span>Una persona con acceso no puede acceder:</span> puede ser producto de un mal tipado
							en el email de la persona autorizada o pérdida de conexión al actualizar la lista
							de administradores, similar a lo que sucede con las propiedades en el primer punto.
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
					<form action="manage-admins.php" method="post" autocomplete="off">
						<h5>Acciones</h5>
						<div>
							<a>Añadir</a><a>Eliminar</a>
							<div class="underline"></div>
						</div>
						<label>
							Nombre de administrador:
							<input type="text" name="nombre" id="nombre">
						</label>
						<label>
							Email:
							<input type="email" name="mail" id="mail">
						</label>
						<label class="contraseña">
							Contraseña:
							<input type="text" name="contraseña" id="contraseña">
						</label>
						<label class="confirm">
							<input type="checkbox" name="confirmar" id="confirmar" value="añadir"> Confirmar acción.
						</label>
						<button>Finalizar</button>
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
						<!--generar un párrafo por cada resultado de la consulta-->
					</div>
					<form action="" method="get" autocomplete="off">
						<h5>Gestionar propiedades</h5>
						<div>
							<a id="add">Añadir</a><a id="rem">Eliminar</a><a id="mod">Modificar</a>
							<div class="underline"></div>
						</div>
						<div class="add toggled">
							<label>
								Dirección: 
								<input type="text" name="dirección" id="dirección">
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
								Título:
								<input type="text" name="título" id="título">
							</label>
							<label>
								Categoría:
								<select name="categoría" id="categoría">
									<option value="venta">Venta</option>
									<option value="alquiler">Alquiler</option>
									<option value="ambas">Venta/Alquiler</option>
								</select>
							</label>
							<label class="descrip">
								<span>Descripción:</span>
								<textarea name="descripción" id="descripción" cols="30" rows="10"></textarea>
							</label>
							<label>
								Localidad:
								<select name="localidad" id="localidad">
									<option value="bahía">Bahía Blanca</option>
									<option value="monte">Monte Hermoso</option>
								</select>
							</label>
							<label>
								Imágenes:
								<input type="file" name="imágenes" id="imágenes" multiple>
							</label>
						</div>
						<div class="rem">
							<label>
								ID:
								<input type="text" name="ridprop">
							</label>
							<label>
								Dirección:
								<input type="text" name="rdirección">
							</label>
							<label>
								Título:
								<input type="text" name="rtítulo">
							</label>
						</div>
						<div class="mod">
							<label>
								ID:
								<input type="text" name="midprop">
							</label>
							<label>
								Dirección:
								<input type="text" name="mdirección">
							</label>
							<label>
								Título:
								<input type="text" name="mtítulo">
							</label>
							<label class="descrip">
								<span>Descripción:</span>
								<textarea name="mdescripción" cols="30" rows="10"></textarea>
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
			<small>@ 2020 RS Propiedades</small>
		</div>
	</footer>
</body>

</html>