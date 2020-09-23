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
/*
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$nombre = "Jere";
	if ($_POST['confirmar'] == 'añadir') {
        if(strlen($_POST['nombre-añadir']) >= 1 && strlen($_POST['mail-añadir']) >= 1 && strlen($_POST['contraseña-añadir']) >= 1){
            $mail_añadir = $_POST['mail-añadir'];
            $nombre_añadir = $_POST['nombre-añadir'];
            $contraseña_añadir = $_POST['contraseña-añadir'];
            
            $consulta = $conexionBD->prepare("INSERT INTO Administradores (Mail, Nombre_Administrador, Contraseña) VALUES (?, ?, ?)");
        
            $consulta->execute(array($mail_añadir, $nombre_añadir, $contraseña_añadir));
            if ($consulta) {
                ?>
                <script>
                    alert("Se ha añadido con exito el administrador");
                </script>
                <?php
            }else{
                ?>
                <script>
                    alert("NO se ha añadido con exito el administrador. REINTENTAR");
                </script>
                <?php
            }
        }
	    } else if($_POST['confirmar'] == 'eliminar') {
            if(strlen($_POST['nombre-eliminar']) >= 1 && strlen($_POST['mail-eliminar']) >= 1){
                $mail_eliminar = $_POST['mail-eliminar'];
                $nombre_eliminar = $_POST['nombre-eliminar'];

                $consulta = $conexionBD->prepare("DELETE FROM Administradores WHERE Mail=? AND Nombre_Administrador=?");
        
                $consulta->execute(array($mail_eliminar, $nombre_eliminar));
                if ($consulta) {
                    ?>
                    <script>
                        alert("Se ha eliminado con exito el administrador");
                    </script>
                    <?php
            }else{
                ?>
                    <script>
                        alert("NO se ha eliminado con exito el administrador. REINTENTAR");
                    </script>
                    <?php
            }
        }
    }
    ?>
    <div style="color: white; justify-content: center; text-align: center; margin-top: 250px ">
        <a href="admin.php">
            <button style="background-color: #440206; color: white; width: 500px; height: 50px; border-radius: 10px;">
                Volver a la pagina de administradores
            </button>
        </a>
    </div>
    <?php
} else {
	//
} */