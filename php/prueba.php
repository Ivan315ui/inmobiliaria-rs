<?php

require_once('conexion.php');

$prueba = $conexionBD->query("select * from propiedades");
foreach($prueba as $row){
    echo "Id_Propiedad: ".$row[0];
    echo "<br>";
    echo "Titulo: ".$row[1];
    echo "<br>";
    echo "Direccion: ".$row[2];
    echo "<br>";
    echo "Id_Tipo: ".$row[3];
    echo "<br>";
    echo "Piso: ".$row[4];
    echo "<br>";
    echo "Departamento: ".$row[5];
    echo "<br>";
    echo "Descripción: ".$row[6];
    echo "<br>";
    echo "Localidad: ".$row[7];
    echo "<br>";
    echo "Categoria: ".$row[8];
}
?>