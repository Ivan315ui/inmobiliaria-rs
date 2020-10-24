<?php

require_once("conexion.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (strlen($_POST['contraseña']) == 0 || strlen($_POST['contraseña']) < 6 || strlen($_POST['contraseña']) > 16 || strlen($_POST['mail']) == 0 || strlen($_POST['nombre']) == 0) {
		die();
	}else{
		$elementos = array($_POST['mail'], $_POST['nombre']);
		if ($_POST['confirmar'] == 'añadir') {
			$elementos[] = $_POST['contraseña'];

			$consulta = $conexionBD->prepare("INSERT INTO administradores (Mail, Nombre_Administrador, Contraseña) VALUES (?, ?, ?)");

		} else if($_POST['confirmar'] == 'eliminar') {
			$consulta = $conexionBD->prepare("DELETE FROM administradores WHERE Mail=? AND Nombre_Administrador=?");
		}

		$consulta->execute($elementos);
		if ($consulta) {
			header('Location: admin.php?result=success');
		} else {
			header('Location: admin.php?result=fail');
		}
	}
}