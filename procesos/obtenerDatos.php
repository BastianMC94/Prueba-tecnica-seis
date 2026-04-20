<?php
	require_once "../Crud.php";

	$id = $_POST['id'];

	echo json_encode(Crud::obtenerDatos($id));

?>