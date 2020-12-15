<?php

require_once("conexion.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	$elementos = array($_POST['mail'], $_POST['nombre']);
	if ($_POST['confirmar'] == 'añadir') {

		$elementos[] = md5($_POST['contraseña']);

		$consulta = $conexionBD->prepare("INSERT INTO administradores (Mail, Nombre_Administrador, Contraseña) VALUES (?, ?, ?)");

	} else if($_POST['confirmar'] == 'eliminar') {

		$elementos = array($_POST['adminID']);

		$consulta = $conexionBD->prepare("DELETE FROM administradores WHERE id = ?");
		
	}

	$consulta->execute($elementos);
	if ($consulta) {
		header('Location: admin.php?result=success');
	} else {
		header('Location: admin.php?result=fail');
	}

}