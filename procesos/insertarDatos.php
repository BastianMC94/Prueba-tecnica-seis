<?php
	require_once "../Crud.php";

	$datos = array(
			'cod_bod' => $_POST['cod_bod'],
			'bod_dire' => $_POST['bod_dire'],
			'bod_personal' => $_POST['bod_personal'],
			'bod_estado' => $_POST['bod_estado'],
			'bod_enc' => $_POST['bod_enc']
			);

	echo Crud::insertarDatos($datos);


?>