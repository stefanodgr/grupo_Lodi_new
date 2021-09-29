<?php
include "../../../../Funciones/BD.php";
$pais = $_GET["p"];
$product_type = $_GET["tp"];
$brand = $_GET["b"];
include "../consultas_basicas.php";
?>
<form method="post" name="frm_modelo" id="frm_modelo" role="form" action="../Almacen/ajax/importacion.php?accion=ajax&procesar=frm_modelo&opcion=i">
  <div class="form-group">
    <label for="">Nombre</label>
    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="" aria-describedby="helpId" required>
  </div>
  <div class="form-group">
    <label for="">Tipo Producto</label>
    <select class="form-control" name="brand" id="brand" required>
      <option value=""> -- </option>
      <?php foreach ($dataMarca as $marca) { ?>
        <option value="<?= $marca->id ?>" <?php if ($marca->id == $brand) : ?>selected<?php endif; ?>><?= $marca->nombre ?></option>
      <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <label for="">Tipo Producto</label>
    <select class="form-control" name="tipo_prod" id="tipo_prod" required>
      <option value=""> -- </option>
      <?php foreach ($dataTipoProducto as $tipoProoducto) { ?>
        <option value="<?= $tipoProoducto->id ?>" <?php if ($tipoProoducto->id == $product_type) : ?>selected<?php endif; ?>><?= $tipoProoducto->nombre ?></option>
      <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <label for="">País</label>

    <select class="form-control" name="pais" id="pais" required>
      <option value=""> -- </option>
      <?php foreach ($dataPais as $country) { ?>
        <option value="<?= $country->id ?>" <?php if ($country->id == $pais) : ?>selected<?php endif; ?>><?= $country->nombre ?></option>
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