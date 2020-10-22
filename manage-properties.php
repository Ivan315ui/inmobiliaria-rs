<?php

require_once("conexion.php");



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if ($_POST['confirmarP'] == 'add') {

		if ($_POST['depto'] == "") {
			$_POST['depto'] = null;
			$_POST['piso'] = null;
		} else if ($_POST['piso'] == "") {
			$_POST['piso'] = null;
		}

		$elementos = array($_POST['título'], $_POST['dirección'], $_POST['tipo'], $_POST['piso'], $_POST['depto'], $_POST['descripción'], $_POST['localidad'], $_POST['categoría']);

		$consulta = $conexionBD->prepare("INSERT INTO propiedades (Título, Dirección, ID_Tipo, Piso, Departamento, Descripción, Localidad, Categoría) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

		$src = "files";
	} else if ($_POST['confirmarP'] == 'rem') {

		$elementos = array($_POST['ridprop']);

		$consulta = $conexionBD->prepare("DELETE FROM propiedades WHERE ID_Propiedad=?");
	} else if ($_POST['confirmarP'] == 'mod') {

		if ($_POST['mdepto'] == "") {
			$_POST['mdepto'] = null;
			$_POST['mpiso'] = null;
		} else if ($_POST['mpiso'] == "") {
			$_POST['mpiso'] = null;
		}

		$elementos = array($_POST['mtítulo'], $_POST['mdirección'], $_POST['mtipo'], $_POST['mpiso'], $_POST['mdepto'], $_POST['mdescripción'], $_POST['mlocalidad'], $_POST['mcategoría'], $_POST['midprop']);

		$consulta = $conexionBD->prepare("UPDATE propiedades SET Título=?, Dirección=?, ID_Tipo=?, Piso=?, Departamento=?, Descripción=?, Localidad=?, Categoría=? WHERE ID_Propiedad=?");

		$src = "mfiles";
	} else {
		header('Location: admin.php?result=fail');
	}


	//verificar que haya archivos para subir
	if ($_FILES[$src]['name']['0'] == "") {
		$subir = false;
	} else {
		$subir = true;
	}

	//si hay archivos
	if ($subir == true) {
		//destino de los archivos
		$destino = "imgs/propiedades/" . ($src == "files" ? $_POST['título'] : $_POST['mtítulo']) . "/";
		
		//crear la carpeta destino
		mkdir("./$destino");
		chmod("./$destino", 0766);

		$nombres = array();
		$tipos = array();
		//por cada nombre de los archivos, cambiar el nombre para que coincida con el de la propiedad
		for ($i = 0; $i < count($_FILES["$src"]['name']); $i++) {
			$título = $src == "files" ? $_POST['título'] : $_POST['mtítulo'];
			$nombres[] = "{$título}-" . ($i + 1);
		}

		//si el tipo de archivo subido no es una imagen, volver a admin y tirar un error
		foreach ($_FILES["$src"] as $campo => $valores) {
			if ($campo == "type") {
				foreach ($valores as $tipo => $valor) {
					if (substr($valor, 0, 5) != "image") {
						header("Location: admin.php?result=fail&badImageType=true");
					} else {
						$tipos[] = "." . substr($valor, 6);
					}
				}
			}
		}

		//cambiar los nombres acordes a su extensión y carpeta destino (inicio)
		for ($i = 0; $i < count($nombres); $i++) {
			$nombres[$i] = $destino . $nombres[$i] . $tipos[$i];
			echo "$nombres[$i] <br>";

			//intentar subir los archivos
			// si no se pudieron subir, redireccionar con otro error
			if (!move_uploaded_file($_FILES["$src"]["tmp_name"][$i], $nombres[$i])) {
				header('Location: admin.php?result=fail&files=fail');
			}
		}

	}

	//seguir con la ejecución de la consulta
	$consulta->execute($elementos);
	//redireccionar acorde al resultado de la consulta
	if ($consulta) {
		header('Location: admin.php?result=success');
	} else {
		header('Location: admin.php?result=fail');
	}
} else {
	//si se accede por GET, redireccionar a la página de admin
	header('Location: admin.php');
}
