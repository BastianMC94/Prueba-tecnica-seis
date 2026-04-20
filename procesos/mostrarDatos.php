<?php

	require_once "../Crud.php";

	$obj = new Crud();
	$datos = $obj->mostrarDatos();

	$tabla = '<table class="table table-dark">
				<thead>
					<tr class="font-weight-bold">
						<td>Codigo Bodega</td>
						<td>Dirección</td>
						<td>Personal</td>
						<td>Estado de Bodega</td>
						<td>Fecha registro</td>
						<td>Encargado</td>
						<td>Editar</td>
						<td>Eliminar</td>
					</tr>
				</thead>
			<tbody>';

	$data = "";
	foreach ($datos as $key => $value) {
		$data=$data.'<tr>
						<td>'.$value['bod_cod'].'</td>
						<td>'.$value['bod_direccion'].'</td>
						<td>'.$value['bod_personal'].'</td>
						<td>'.$value['bod_estado'].'</td>
						<td>'.$value['bod_fecha_registro'].'</td>
						<td>'.$value['enc_nombre'].'</td>
						<td>
							<span class="btn btn-warning btn-sm" onclick="obtenerDatos('.$value['bod_id'].')" data-toggle="modal" data-target="#actualizarModal"> Editar
							</span>
						</td>
						<td>
							<span class="btn btn-danger btn-sm" onclick="eliminarDatos('.$value['bod_id'].')"> Eliminar
							</span>
						</td>
					</tr>';
	}

echo $tabla.$data.'</tbody></table>';

?>