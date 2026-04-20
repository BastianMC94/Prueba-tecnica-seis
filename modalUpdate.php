<?php
include_once('Conexion.php');
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$query_encargados = $conexion->prepare("SELECT
                              enc_id,
                              enc_nom,
                              enc_apellido1, 
                              enc_apellido2
                        FROM public.encargados;");
$query_encargados->execute();
$resultado_encargados = $query_encargados;
$datos = $resultado_encargados->fetchAll();

?>

<!-- Modal -->
<div class="modal fade" id="actualizarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar bodega</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form id="frminsertu" onsubmit="return actualizarDatos()" method="post">
            <input type="hidden" id="id" name="id" value="">
              <label>Codigo Bodega</label>
              <input type="text" id="bod_cod" name="bod_cod" class="form-control form-control-sm" required="">
              <label>Dirección</label>
              <input type="text" id="bod_dire" name="bod_dire" class="form-control form-control-sm" required="">
              <label>Cantidad personal</label>
              <input type="number" inputmode="numeric" id="bod_personal" name="bod_personal" class="form-control form-control-sm">
              <label>Estado de bodega</label>
                <select id="bod_estado" name="bod_estado" class="form-control form-control-sm">
                  <option value="1"> Disponible </option>
                  <option value="0"> No Disponible </option> 
                </select>
              <label>Encargado</label>
              <select id="bod_enc" name="bod_enc" class="form-control form-control-sm">
                <?php
                   foreach ($datos as $dato){         
                      echo "<option value='". $dato['enc_id'] ."'>". $dato['enc_nom'] . " " . $dato['enc_apellido1'] . " " . $dato['enc_apellido2'] . "</option>";
                    }
                ?>
              </select>
              <br>
              <input type="submit" value="Actualizar" class="btn btn-warning">
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>
