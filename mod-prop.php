<?php

    require_once("conexion.php");

    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
     
        header('Location: admin.php');
        die();

    }


    if ($_POST['depto'] == "") {
        $_POST['depto'] = null;
        $_POST['piso'] = null;
    } else if ($_POST['piso'] == "") {
        $_POST['piso'] = null;
    }

    
    $elementos = array($_POST['título'], $_POST['dirección'], $_POST['tipo'], $_POST['piso'], $_POST['depto'], $_POST['descripción'], $_POST['localidad'], $_POST['categoría'], $_POST['idprop']);

    $consulta = $conexionBD->prepare("UPDATE propiedades SET Título=?, Dirección=?, ID_Tipo=?, Piso=?, Departamento=?, Descripción=?, Localidad=?, Categoría=? WHERE ID_Propiedad=?");


    $propRepetida = $conexionBD->prepare("SELECT * FROM propiedades WHERE ID_Propiedad != ? && Título = ?");
    $propRepetida->execute(array($_POST['idprop'], $_POST['título']));
    $propRepetida = $propRepetida->fetchAll(PDO::FETCH_ASSOC);

    if ($propRepetida) {
        header('Location: admin.php?result=fail&prop=exists');
        die();
    }

    
    $propAnterior = $conexionBD->prepare("SELECT * FROM propiedades WHERE ID_Propiedad = ?");
    $propAnterior->execute(array($_POST['idprop']));
    $propAnterior = $propAnterior->fetch(PDO::FETCH_ASSOC);

    if ($propAnterior['Título'] != $_POST['título']) {
        $destino = "imgs/propiedades/{$_POST['título']}";
        rename("imgs/propiedades/{$propAnterior['Título']}", $destino);
        //renombrar los archivos
        $archivos = glob("$destino/*"); //busca los archivos en la carpeta con el nombre ya cambiado
        foreach ($archivos as $archivo) {
            $nombreNuevo = str_replace($destino, "", $archivo);
            $nombreNuevo = str_replace($propAnterior['Título'], $_POST['título'], $archivo);
            rename($archivo, $nombreNuevo);
        }
    }

    $src = "files";
    //verificar que haya archivos para subir
    if ($_FILES[$src]['name']['0'] == "") {
        $subir = false;
    } else {
        $subir = true;
    }

    if ($subir) {

        $destino .= '/';

		$nombres = array();
		$tipos = array();
		//por cada nombre de los archivos, cambiar el nombre para que coincida con el de la propiedad
		for ($i = count($archivos); $i < (count($archivos) + count($_FILES["$src"]['name'])); $i++) {
			$título = $_POST['título'];
			$nombres[] = "{$título}-" . (($i + 1) < 10 ? "0" . ($i + 1) : ($i + 1));
		}

		//si el tipo de archivo subido no es una imagen, volver a admin y tirar un error
		foreach ($_FILES["$src"] as $campo => $valores) {
			if ($campo == "type") {
				foreach ($valores as $tipo => $valor) {
					if (substr($valor, 0, 5) != "image") {
                        header("Location: admin.php?result=fail&badImageType=true");
                        die();
					} else {
						$tipos[] = "." . substr($valor, 6);
					}
				}
			}
		}

		//cambiar los nombres acordes a su extensión y carpeta destino (inicio)
		for ($i = 0; $i < count($nombres); $i++) {
			$nombres[$i] = $destino . $nombres[$i] . $tipos[$i];

			//intentar subir los archivos
			// si no se pudieron subir, redireccionar con otro error
			if (!move_uploaded_file($_FILES["$src"]["tmp_name"][$i], $nombres[$i])) {
                header('Location: admin.php?result=fail&files=fail');
                die();
			}
		}

    }
    
    //seguir con la ejecución de la consulta
    $consulta = $consulta->execute($elementos);

	//redireccionar acorde al resultado de la consulta
	if ($consulta) {
		header('Location: admin.php?result=success');
	} else {
		header('Location: admin.php?result=fail');
	}
