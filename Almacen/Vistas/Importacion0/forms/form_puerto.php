<?php
include "../../../../Funciones/BD.php";
include "../consultas_basicas.php";
?>
<form method="post" name="frm_puerto" id="frm_puerto" role="form" action="../Almacen/ajax/importacion.php?accion=ajax&procesar=frm_puerto&opcion=i">
  <div class="form-group">
    <label for="">Nombre</label>
    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="" aria-describedby="helpId" required>
  </div>
  <div class="form-group">
    <label for="">País</label>
    <select class="form-control" name="pais" id="pais" required>
      <option value=""> -- </option>
      <?php foreach ($dataPais as $pais) { ?>
      <option value="<?= $pais->id ?>"><?= $pais->nombre ?></option>
      <?php } ?>
    </select>
  </div>
  <!-- <div class="form-group text-center">
    <button class="btn btn-primary">Registrar</button>
  </div> -->
  <form>