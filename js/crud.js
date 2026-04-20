function mostrar(){
	$.ajax({
		type:"POST",
		url:"procesos/mostrarDatos.php",
		success:function(r){
			$('#data').html(r);
			
		}
	});
}


function obtenerDatos(id){
		$.ajax({
			type:"POST",
			url:"procesos/obtenerDatos.php",
			data:"id=" + id,
			success:function(r){
				r=jQuery.parseJSON(r);
				console.log(r);
				$('#id').val(r['bod_id']);
				$('#bod_cod').val(r['bod_cod']);

				
			}
		});

}


function actualizarDatos(){
		$.ajax({
		type:"POST",
		url:"procesos/actualizarDatos.php",
		data:$('#frminsertu').serialize(),
		success:function(r){
			console.log(r);
			if(r==1){
				mostrar();
				swal("Actualizados exitosamente",":)","success");
			}else{
				swal("Error al actualizar",":(", "error");
			}
		}
	});	

	return false;	
}

function insertarDatos(){
	$.ajax({
		type:"POST",
		url:"procesos/insertarDatos.php",
		data:$('#frminsert').serialize(),
		success:function(r){

			console.log(r);
			if(r==1){
				//Limpiar formulario
				$('#frminsert')[0].reset();
				mostrar();
				swal("Agregado exitosamente",":)","success");
			}else{
				swal("Error al ingresar",":(", "error");
			}
		}
	});	

	return false;
}

function eliminarDatos(id){
	swal({
		title: "¿Estas seguro de eliminar este registro?",
		text: "!Una vez eliminado no podra recuperarse¡",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	})
	.then((willDelete) => {
		if (willDelete) {
			$.ajax({
				type:"POST",
				url:"procesos/eliminarDatos.php",
				data:"id="+id,
				success:function(r){
					if(r==1){
						mostrar();
						swal("Eliminado exitosamente",":)","info");
					}else{
						swal("Error al eliminar",":(", "error");
					}
				}
			});	
			
		} 
	});
}