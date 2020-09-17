<?php
$dsn = 'mysql:host=localhost;dbname=inmobiliaria_rs';
$usuario = 'root';
$contraseña = '';
    try {
        $conexionBD = new PDO($dsn, $usuario, $contraseña);
    } catch (PDOException $e) {
        echo 'Falló la conexión' . $e->getMessage();
    }

?>