<?php

require_once("conexion.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
    $consulta = $conexionBD->prepare("INSERT INTO tipos_propiedades (Nombre_Tipo) VALUES (?)");
    $consulta->execute(array($_POST['nombre']));

    $consulta = $conexionBD->prepare("SELECT Nombre_Tipo FROM tipos_propiedades WHERE Nombre_Tipo = ?");
    $consulta->execute(array($_POST['nombre']));

    if ($consulta->fetch()) {
		header('Location: admin.php?result=success');
	} else {
		header('Location: admin.php?result=fail&tipo=fail');
	}

} else {
	header('Location: index.php');
}