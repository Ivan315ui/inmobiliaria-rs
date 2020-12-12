<?php

require_once("conexion.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	$elementos = array($_POST['mail'], $_POST['nombre']);
	if ($_POST['confirmar'] == 'añadir') {
		$elementos[] = $_POST['contraseña'];

		$consulta = $conexionBD->prepare("INSERT INTO administradores (Mail, Nombre_Administrador, Contraseña) VALUES (?, ?, ?)");

	} else if($_POST['confirmar'] == 'eliminar') {

		$elementos = array($_POST['nombre'], $_POST['mail']);

		$consulta = $conexionBD->prepare("DELETE FROM administradores WHERE Nombre_Administrador = ? AND Mail = ?");
		
	}

	$consulta->execute($elementos);
	if ($consulta) {
		header('Location: admin.php?result=success');
	} else {
		header('Location: admin.php?result=fail');
	}

}