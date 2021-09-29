<?php
include "../../../../Funciones/BD.php";
include "../consultas_basicas.php";
?>
<form method="post" name="frm_marca" id="frm_marca" role="form" action="../Almacen/ajax/importacion.php?accion=ajax&procesar=frm_marca&opcion=i">
  <div class="form-group">
    <label for="">Nombre</label>
    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="" aria-describedby="helpId" required>
  </div>
  <div class="form-group">
    <label for="">Tipo Producto</label>
    <select class="form-control" name="tipo_prod" id="tipo_prod" required>
      <option value=""> -- </option>
      <?php foreach ($dataTipoProducto as $tipoProoducto) { ?>
        <option value="<?= $tipoProoducto->id ?>"><?= $tipoProoducto->nombre ?></option>
      <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <label for="status" class="control-label">Estatus</label>
    <select name="status" id="status" class="form-control">
      <option value="1">Activo</option>
      <option value="0">Inactivo</option>
    </select>
  </div>
<form>