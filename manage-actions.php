<?php

require_once("conexion.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$elementos = array($_POST['mail'], $_POST['nombre']);
	if ($_POST['confirmar'] == 'añadir') {
		$elementos[] = $_POST['contraseña'];

		$consulta = $conexionBD->prepare("INSERT INTO Administradores (Mail, Nombre_Administrador, Contraseña) VALUES (?, ?, ?)");

	} else if($_POST['confirmar'] == 'eliminar') {
		$consulta = $conexionBD->prepare("DELETE FROM Administradores WHERE Mail=? AND Nombre_Administrador=?");
	}

    $consulta->execute($elementos);
    if ($consulta) {
        header('Location: admin.php?result=success');
    } else {
        header('Location: admin.php?result=fail');
    }
} else {
	header('Location: admin.php');
}