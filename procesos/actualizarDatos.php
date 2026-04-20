<?php

require_once "../Crud.php";

$datos = array(
			'bod_cod' => $_POST['bod_cod'],
			'bod_dire' => $_POST['bod_dire'],
			'bod_personal' => $_POST['bod_personal'],
			'bod_estado' => $_POST['bod_estado'],
			'bod_enc' => $_POST['bod_enc'],
			'id' => $_POST['id']
			);

	echo Crud::actualizarDatos($datos);



?>