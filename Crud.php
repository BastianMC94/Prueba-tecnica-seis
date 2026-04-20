<?php


require_once "Conexion.php";

	Class Crud extends Conexion{

		public function mostrarDatos(){
			$sql = "SELECT
						bod_id, 
						bod_cod,
						bod_direccion,
						bod_personal,
						CASE WHEN bod_estado = 1 THEN 'Disponible'
						ELSE 'No disponible' 
						END as bod_estado,
						to_char(bod_fecha_registro, 'YYYY-MM-DD HH24:MI:SS') as bod_fecha_registro,
						enc.enc_nom||' '|| enc.enc_apellido1 as enc_nombre,
						bod.enc_id
					FROM bodegas bod
					JOIN encargados enc on enc.enc_id = bod.enc_id;";
				$objeto = new Conexion();
				$conexion = $objeto->Conectar();
				$query=$conexion->prepare($sql);
				$query->execute();
				return $query->fetchAll();
				$query->close();
		}

		public static function insertarDatos($datos){
			$sql="INSERT INTO public.bodegas(bod_id,bod_cod,bod_direccion,bod_personal,bod_estado,bod_fecha_registro,enc_id)
				VALUES (DEFAULT,:bod_cod,:bod_direccion,:bod_personal,:bod_estado,NOW(),:enc_id)";
			$objeto = new Conexion();
			$conexion = $objeto->Conectar();
			$query=$conexion->prepare($sql);
			//$query=Conexion::conectar()->prepare($sql);
			$query->bindParam(":bod_cod",$datos['cod_bod'], PDO::PARAM_STR);
			$query->bindParam(":bod_direccion",$datos['bod_dire'], PDO::PARAM_STR);
			$query->bindParam(":bod_personal",$datos['bod_personal'], PDO::PARAM_INT);
			$query->bindParam(":bod_estado",$datos['bod_estado'], PDO::PARAM_INT);
			$query->bindParam(":enc_id",$datos['bod_enc'], PDO::PARAM_INT);

			return $query->execute();
			$query->close();
		}

		public static function obtenerDatos($id){
			$sql="SELECT 
						bod_id,
						bod_cod,
						bod_direccion,
						bod_personal,
						CASE WHEN bod_estado = 1 THEN 'Disponible'
						ELSE 'No disponible' 
						END as bod_estado,
						enc.enc_nom||' '|| enc.enc_apellido1 as enc_nombre
				   FROM bodegas bod
				   JOIN encargados enc on enc.enc_id = bod.enc_id
				   WHERE bod_id = :id;";

			$objeto = new Conexion();
			$conexion = $objeto->Conectar();
			$query=$conexion->prepare($sql);
			$query->bindParam(":id",$id, PDO::PARAM_INT);
			$query ->execute();
			return $query->fetch();
			$query->close();

		}

		//TENGO UN ERROR CON ESTA FUNCIÓN QUE NO LOGRÉ IDENTIFICAR.

		public static function actualizarDatos($datos){

			$sql="UPDATE bodegas SET bod_cod = :bod_cod,
									   bod_direccion = :bod_direccion,
									   bod_personal = :bod_personal,
									   bod_estado = :bod_estado,
									   enc_id = :enc_id
								   WHERE bod_id = :id";

			$objeto = new Conexion();
			$conexion = $objeto->Conectar();
			$query=$conexion->prepare($sql);
			$query->bindParam(":bod_cod",$datos['bod_cod'], PDO::PARAM_STR);
			$query->bindParam(":bod_direccion",$datos['bod_dire'], PDO::PARAM_STR);
			$query->bindParam(":bod_personal",$datos['bod_personal'], PDO::PARAM_INT);
			$query->bindParam(":bod_estado",$datos['bod_estado'], PDO::PARAM_INT);
			$query->bindParam(":enc_id",$datos['bod_enc'], PDO::PARAM_INT);
			$query->bindParam(":id",$datos['id'], PDO::PARAM_INT);

			return $query->execute();
			$query->close();

		}

		public static function eliminarDatos($id){
			$sql="DELETE FROM bodegas WHERE bod_id = :id";
			$objeto = new Conexion();
			$conexion = $objeto->Conectar();
			$query=$conexion->prepare($sql);
			$query->bindParam(":id",$id, PDO::PARAM_INT);
			return $query->execute();
			$query->close();


		}

	}

?>