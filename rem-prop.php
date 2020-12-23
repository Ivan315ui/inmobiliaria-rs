<?php

    
    require_once("conexion.php");

    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    
        header('Location: admin.php');
        die();

    }

    $consulta = $conexionBD->prepare("DELETE FROM propiedades WHERE ID_Propiedad=?");
    $consulta = $consulta->execute(array($_POST['idprop']));


    //redireccionar acorde al resultado de la consulta
	if ($consulta) {
		header('Location: admin.php?result=success');
	} else {
		header('Location: admin.php?result=fail');
	}
