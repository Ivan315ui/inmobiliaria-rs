<?php

require_once("conexion.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	$consulta = $conexionBD->prepare("INSERT INTO localidades (localidad) VALUES (?)");

	$verificacion = $conexionBD->prepare("SELECT localidad FROM localidades WHERE Nombre_Tipo = ?");

	if ($verificacion->execute(array($_POST['nombre'])) && $verificacion->fetch() && $consulta->execute(array($_POST['nombre']))) {
		header('Location: admin.php?result=success');
	} else {
		header('Location: admin.php?result=fail&loc=fail');
	}

} else {
	header('Location: index.php');
}