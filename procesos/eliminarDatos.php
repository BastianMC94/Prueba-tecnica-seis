<?php

	require_once "../Crud.php";

	$id = $_POST['id'];

	echo Crud::eliminarDatos($id);

?>