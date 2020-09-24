<?php

require_once("conexion.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $elementosAdd = array($_POST['título'], $_POST['dirección'], $_POST['piso'], $_POST['tipo'], $_POST['depto'], $_POST['localidad'], $_POST['descripción'], $_POST['categoría']);

    $elementosDelete = array($_POST['ridprop'], $_POST['rtítulo'], $_POST['rdirección']);

    $elementosMod = array($_POST['mtítulo'], $_POST['mdirección'], $_POST['mdescripción'], $_POST['midprop']);

	if ($_POST['confirmarP'] == 'add') {

        $consulta = $conexionBD->prepare("INSERT INTO Propiedades (Título, Dirección, ID_Tipo, Piso, Departamento, Descripción, Localidad, Categoría) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        
        $consulta->execute($elementosAdd);

        if ($consulta) {
            header('Location: admin.php?result=success');
        } else {
            header('Location: admin.php?result=fail');
        }
        
    }else if($_POST['confirmarP'] == 'rem') {

        $consulta = $conexionBD->prepare("DELETE FROM Propiedades WHERE ID_Propiedad=? AND Título=? AND Dirección=?");
        
        $consulta->execute($elementosDelete);

        if ($consulta) {
            header('Location: admin.php?result=success');
        } else {
            header('Location: admin.php?result=fail');
        }
	}else if($_POST['confirmarP'] == 'mod'){
        $consulta = $conexionBD->prepare("UPDATE Propiedades SET Título=?, Dirección=?, Descripción=? WHERE ID_Propiedad=?"); 
        
        $consulta->execute($elementosMod);

        if ($consulta) {
            header('Location: admin.php?result=success');
        } else {
            header('Location: admin.php?result=fail');
        }
    }
} else {
	header('Location: admin.php');
}
?>