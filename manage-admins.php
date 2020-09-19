<?php

require_once("conexion.php");

if (isset($_POST['añadir'])){
    if(strlen($_POST['nombre-añadir']) >= 1 && strlen($_POST['mail-añadir']) >= 1 && strlen($_POST['contraseña-añadir']) >= 1){
        $mail_añadir = $_POST['mail-añadir'];
        $nombre_añadir = $_POST['nombre-añadir'];
        $contraseña_añadir = $_POST['contraseña-añadir'];


        $consulta_añadir = "INSERT INTO administrador (Mail, Nombre_Administrador, Contraseña) VALUES (?, ?, ?)";

        $agregar = $conexionBD->prepare($consulta_añadir);
        $agregar->execute(array($mail_añadir, $nombre_añadir, $contraseña_añadir));
        if ($agregar) {
            echo "Completado";
        }else{
            echo "No completado ";
        }
    }
}
if (isset($_POST['eliminar'])){
    if(strlen($_POST['nombre-eliminar']) >= 1 && strlen($_POST['mail-eliminar']) >= 1 && strlen($_POST['contraseña-eliminar']) >= 1){
        $mail_eliminar = $_POST['mail-eliminar'];
        $nombre_eliminar = $_POST['nombre-eliminar'];
        $contraseña_eliminar = $_POST['contraseña-eliminar'];


        $consulta_eliminar = "DELETE FROM administrador WHERE Mail=? AND Nombre_Administrador=? AND Contraseña=?";

        $eliminar = $conexionBD->prepare($consulta_eliminar);
        $eliminar->execute(array($mail_eliminar, $nombre_eliminar, $contraseña_eliminar));
        if ($eliminar) {
            echo "Completado";
        }else{
            echo "No completado ";
        }
    }
}
?>

