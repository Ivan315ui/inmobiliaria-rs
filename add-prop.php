<?php

    require_once 'conexion.php';

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

    $consulta = $conexionBD->prepare('SELECT * FROM propiedades WHERE Título = ?');
    $consulta->execute(array($_POST['título']));
    $consulta = $consulta->fetchAll(PDO::FETCH_ASSOC);

    if ($consulta) {
        header('Location: admin.php?result=fail&prop=exists');
        die();
    }


    $elementos = array($_POST['título'], $_POST['dirección'], $_POST['tipo'], $_POST['piso'], $_POST['depto'], $_POST['descripción'], $_POST['localidad'], $_POST['categoría']);

    $consulta = $conexionBD->prepare("INSERT INTO propiedades (Título, Dirección, ID_Tipo, Piso, Departamento, Descripción, Localidad, Categoría) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    $src = "files";

    //verificar que haya archivos para subir
    if ($_FILES[$src]['name']['0'] == "") {
        $subir = false;
    } else {
        $subir = true;
    }

	//sin importar que haya archivos o no, crear su carpeta para evitar problemas si es que se olvida de subir los archivos
	//destino de los archivos
	$destino = "imgs/propiedades/{$_POST['título']}/";
	
	//crear la carpeta destino
	mkdir("./$destino");

    if ($subir) {

		$nombres = array();
		$tipos = array();
		//por cada nombre de los archivos, cambiar el nombre para que coincida con el de la propiedad
		for ($i = 0; $i < count($_FILES["$src"]['name']); $i++) {
			$título = $src == "files" ? $_POST['título'] : $_POST['mtítulo'];
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