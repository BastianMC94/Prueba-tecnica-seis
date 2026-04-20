<?php

Class Conexion{
	function Conectar(){
		$conexion = new PDO("pgsql:host=localhost;dbname=prueba_tecnica_seis","postgres","");
		return $conexion;
	}
}

?>