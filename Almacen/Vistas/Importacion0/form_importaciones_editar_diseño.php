<?php
include "../Funciones/BD.php";

include_once 'consultas_basicas.php';

?>


<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />
<style>
	#tbl_importaciones_detalle tbody tr {
		font-size: 0.85rem !important;
	}
</style> -->


<div class="row">
	<div class="col-lg-12 col-md-12 col-xs-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div id="div_opc_consul" class="row" style="display:block;">
					<div class="col-lg-12">
						<p>
							<a onclick="OptionStepFolio(1);" class="btn btn-sq btn-primary">
								<i class="fa fa-mail-forward fa-5x"></i><br />
								FOLIO
							</a>
							<a onclick="OptionStepFolio(2);" class="btn btn-sq btn-primary">
								<i class="fa fa-mail-forward fa-5x"></i><br />
								PROVEEDOR
							</a>
							<a onclick="OptionStepFolio(3);" class="btn btn-sq btn-primary">
								<i class="fa fa-mail-forward fa-5x"></i><br />
								PRODUCTO
							</a>
							<a onclick="OptionStepFolio(4);" class="btn btn-sq btn-primary">
								<i class="fa fa-mail-forward fa-5x"></i><br />
								ORDEN
							</a>
							<a onclick="OptionStepFolio(5);" class="btn btn-sq btn-primary">
								<i class="fa fa-mail-forward fa-5x"></i><br />
								SEGURO
							</a>
							<a onclick="OptionStepFolio(7);" class="btn btn-sq btn-primary">
								<i class="fa fa-mail-forward fa-5x"></i><br />
								ADUANAS
							</a>
							<a onclick="OptionStepFolio(6);" class="btn btn-sq btn-primary">
								<i class="fa fa-mail-forward fa-5x"></i><br />
								PAGO
							</a>
						</p>
					</div>
				</div>
				<div id="div_folio" style="display:block;">
					<div class="panel-heading">
						Folios
					</div>
					<div class="panel-body">
						<form name="frm_folio" id="frm_folio" action="" method="post">
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label for="empresa"><small>Empresa:</small></label>
										<select name="empresa" disabled id="empresa" class="form-control selectpicker show-tick" data-live-search='true'>
											<option value="" disabled selected>Seleccione..</option>
											<?php foreach ($dataEmpresa as $empresa) { ?>
												<option value="<?= $empresa->id ?>" <?php if ($dataFolder->emp_id == $empresa->id) : ?> selected<?php endif; ?>><?= $empresa->nombre ?></option>
											<?php } ?>
										</select>

										<input type="hidden" name="impor_id" id="impor_id" class="form-control" value="">

									</div>
									<div class="col-md-2">
										<label><small>Folio:</small></label>
										<div id="div_folios" class="input-group">
											<input id="xfolder" name="xfolder" type="text" class="form-control" readonly placeholder="Ej: 2019" aria-describedby="basic-addon1" value="<?= $dataFolder->impor_folder ?>">
											<span class="input-group-addon" id="basic-addon1">N°</span>
											<input id="xnrfolder" name="xnrfolder" type="text" class="form-control" readonly placeholder="Folio" aria-describedby="basic-addon1" value="<?= $dataFolder->impor_nrfolder ?>">
										</div>
									</div>
									<div class="col-md-2">
										<label for="Incoterm"><small>Incoterm:</small></label>
										<select name="folio_incoterm" disabled id="folio_incoterm" class="form-control " onclick="calcularIncoTerm();" required="required" data-live-search='true'>
											<option value="" disabled selected>Seleccione..</option>
											<?php if ($dataFolder->impor_inco == "FOB") : ?>
												<option value="FOB" selected>FOB</option>
											<?php elseif ($dataFolder == "CFR") : ?>
												<option value="CFR" selected>CFR</option>
											<?php endif; ?>
										</select>
									</div>
									<div class="col-md-2">
										<label for="Incoterm"><small> Tipo de CTN:</small></label>
										<select name="folio_incoterm" disabled id="folio_incoterm" class="form-control " required="required" data-live-search='true'>
											<option value="" selected>Seleccione..</option>
											<option value="40HC" <?php if ($dataFolder->impor_tipo == "40HC") : ?>selected<?php endif; ?>>40HC</option>
										</select>
									</div>
									<div class="col-md-2">
										<label for="" class="control-label" style="padding-right:5px !important"><small>QTY CTN</small></label>
										<input type="text" id="folio_qty" name="folio_qty" class="form-control" disabled value="<?= $dataFolder->impor_qty ?>" onchange="calcularIncoTerm(this.value)">
									</div>
								</div>
								<br>
								<hr>
								<div class="row">
									<div class="col-md-3">
										<label for="empresa"><small>Tipo de Producto:</small></label>
										<select name="tipo_pr" id="tipo_pr" disabled class="form-control selectpicker show-tick" required="required">
											<option value="" disabled selected>Seleccione..</option>
											<?php foreach ($dataTipoProducto as $tipoProoducto) { ?>
												<option value="<?= $tipoProoducto->id ?>" <?php if ($dataFolder->produ_clasi_id == $tipoProoducto->id) : ?> selected <?php endif; ?>><?= $tipoProoducto->nombre ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="col-md-3">
										<label for="marca"><small>Marca:</small></label>
										<select name="marca" disabled id="marca" class="form-control selectpicker show-tick" data-live-search='true'>
											<option value="" selected>--</option>
											<?php foreach ($dataMarca as $marca) : ?>
												<option value="<?= $marca->id ?>" <?php if ($marca->id == $dataFolder->mar_id) : ?> selected<?php endif; ?>><?= $marca->nombre ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="col-md-3">
										<label for="empresa"><small>País:</small></label>
										<select name="pais" id="pais" disabled class="form-control selectpicker show-tick" data-live-search='true'>
											<option value="" disabled selected>Seleccione..</option>
											<?php foreach ($dataPais as $pais) { ?>
												<option value="<?= $pais->id ?>" <?php if ($pais->id == $dataFolder->pais_id) : ?> selected <?php endif; ?>><?= $pais->nombre ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="col-md-3">
										<label for="puerto"><small>Puerto:</small></label>
										<select name="puerto" disabled id="puerto" class="form-control selectpicker show-tick" data-live-search='true'>
											<option value="">--</option>
											<?php foreach ($dataPuerto as $puerto) : ?>
												<option value="<?= $puerto->id ?>" <?php if ($puerto->id == $dataFolder->impor_puerto) : ?> selected <?php endif; ?>><?= $puerto->nombre ?></option>
											<?php endforeach; ?>

										</select>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div id="div_pro" style="display:none;">
				<div class="panel-heading">
					Proveedores
				</div>
				<div class="panel-body">
					<form action="" method="post">
						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
									<label for="" class="control-label"><small>Proveedor</small></label>
									<div class="row">
										<div class="col-xs-10 col-md-10" style="padding-right:0 !important">
											<input type="text" class="form-control" readonly name="proveedor" id="proveedor" value='<?= $dataProveedor->provee_int_desc ?>'>
											<small id="helpId" class="text-muted text-justify">Haga doble clic en la casilla para buscar un proveedor</small>
										</div>
										<div class="col-xs-2 col-md-1">
											<button type="button" id="btn_addProvider" class="btn btn-primary">
												<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
											</button>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<label for="" class="control-label"><small>Direccion</small></label>
									<input type="text" class="form-control" value="<?= $dataProveedor->provee_int_direc ?>" readonly name="direccion_proveedor" id="direccion_proveedor">
								</div>
								<div class="col-md-4">
									<label for="" class="control-label" style="padding-right:5px !important"><small>Teléfono</small></label>
									<input type="text" readonly value="<?= $dataProveedor->provee_int_telf ?>" id="telefono_proveedor" name="telefono_proveedor" class="form-control">
								</div>
								<div class="col-md-4">
									<label for="" class="control-label"><small>Correo</small></label>
									<input type="email" readonly id="email_proveedor" value="<?= $dataProveedor->provee_int_email ?>" name="email_proveedor" class="form-control">
								</div>
								<div class="col-md-4">
									<label for="" class="control-label"><small>Contacto</small></label>
									<input type="text" readonly id="proveedor_contacto" value="<?= $dataProveedor->provee_int_contacto ?>" name="proveedor_contacto" class="form-control">
								</div>
							</div>
					</form>
				</div>
			</div>
		</div>
		<div id="div_produ" style="display:none;">
			<div class="panel-heading">
				Productos
			</div>
			<div class="panel-body">
				<form id="frm_product" name="frm_product" method="post" <div class="form-group">
					<div class="row">
						<div id="div_product_type" class="col-md-4">
							<label for="" class="control-label"><small>Tipo Producto</small></label>
							<select name="product_type" id="product_type" data-ajax="true" disabled required class="form-control selectpicker show-tick" data-live-search="true">
								<option value="" disabled selected>Seleccione</option>
								<?php foreach ($dataTipoProducto as $tipoProd) : ?>
									<option value="<?= $tipoProd->id ?>" <?php if ($tipoProd->id == $dataFolder->produ_clasi_id) : ?> selected <?php endif; ?>><?= $tipoProd->nombre ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div id="div_product_brand" class="col-md-4">
							<label for="" class="control-label"><small>Marca</small></label>
							<select name="brand" id="brand" disabled class="form-control selectpicker show-tick" data-ajax="true" required>
								<<option value="" selected>--</option>
									<?php foreach ($dataMarca as $marca) : ?>
										<option value="<?= $marca->id ?>" <?php if ($marca->id == $dataFolder->mar_id) : ?> selected<?php endif; ?>><?= $marca->nombre ?></option>
									<?php endforeach; ?>
							</select>
						</div>
						<!-- <div id="div_product_model" class="col-md-3" style="display:none">
								<label for="" class="control-label"><small>Modelo</small></label>
								<select name="model" id="model" class="form-control selectpicker show-tick" data-live-search="true" required>
									<option value="" selected disabled> -- </option>
								</select>
							</div> -->
						<div id="div_product" class="col-md-4">
							<label for="" class="control-label"><small>Producto</small></label>
							<input type="text" id="product" name="product" class="form-control" required>
							<small class='text-danger'>Haga doble click para mostrar los productos disponibles</small>
							<input type="hidden" id="product_id" class="form-control">
							<!-- <select name="product" id="product" class="form-control selectpicker show-tick">
									<option value="" selected disabled> -- </option>
								</select> -->
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-2">
							<label for="" class="control-label"><small>Precio Unitario</small></label>
							<input type="number" min="0" step="0.01" value="0" class="form-control" id="unit_price" name="unit_price" required>
						</div>
						<div class="col-md-2">
							<!-- SI  es SOLO PARA CUANTO TIPO DE PRODUCTO ES NEUMATICO -->
							<label for="" class="control-label"><small>Unidad de Medida</small></label>
							<input type="text" class="form-control" id="medida" name="medida" required>
						</div>
						<div class="col-md-3">
							<label for="" class="control-label"><small>Descuento en %</small></label>
							<input type="number" min="0" value="0" step="0.01" max="100" class="form-control" id="discount" name="discount" required>
						</div>
						<div class="col-md-2">
							<label for="" class="control-label"><small>Cantidad</small></label>
							<input type="number" min="0" value="0" step="1" class="form-control" id="product_qty" name="product_qty" required>
						</div>
						<div class="col-md-2">
							<label for="" class="control-label"><small>Total</small></label>
							<input type="number" class="form-control" step="0.01" id="total_amount" name="total_amount" required title="especifique precio unitario, cantidad y descuento">
						</div>
					</div>
			</div>
			<hr>
			<br>
			<div class="form-group text-right">
				<div class="col-md-12">
					<button id="btn_addproduct" class="btn btn-primary">
						<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
					</button>
				</div>
			</div>
			</form>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<form id="frm_products" name="frm_products">
							<div class="table-responsive">
								<table id="tbl_importaciones_detalle" class="table table-striped table-condensed">
									<caption>Lista de productos</caption>
									<thead>
										<th>#</th>
										<th>Tipo Producto</th>
										<th>Marca</th>
										<!-- <th>Sku</th> -->
										<th>Producto</th>
										<th>Precio Unitario</th>
										<th>Cantidad</th>
										<th>Unidad Medida</th>
										<th>Descuento</th>
										<th>Precio total</th>
										<th>Eliminar</th>
									</thead>
									<tbody>
									</tbody>
									<tfoot>
										<tr>
											<th colspan='9' class='text-right'>Valor Total</th>
											<td id="amount_total_lines">0,00</td>
										</tr>
										<tr>
											<th colspan='9' class='text-right'>Total Descuento</th>
											<td id="discount_total">0,00</td>
										</tr>
										<tr>
											<th colspan='9' class='text-right'>Monto Total</th>
											<td id="amount_total">0,00</td>
										</tr>
									</tfoot>
								</table>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div id="div_ord" style="display:none;">
			<div class="panel-heading">Orden</div>
			<div class="panel-body">
				<form name="frm_orden" id="frm_orden" action="" method="post">

					<input type="hidden" name="impor_id" id="impor_id" class="form-control" value="<?= $dataFolder->fld_id ?>">

					<div class="row">
						<div class="col-md-2">
							<label class="control-label" for=""><small>#Orden</small></label>
							<input id="nro_orden" name="nro_orden" class="form-control" value="<?= @$dataFolder->impor_orden_number ?>" required type="number">
						</div>
						<div class="col-md-2">
							<label class="control-label" for=""><small>Fecha/Compra</small></label>
							<input id="fecha_compra" name="fecha_compra" class="form-control" value="<?= @$dataFolder->impor_orden_fech_com ?>" type="date">
						</div>
						<div class="col-md-2">
							<label class="control-label" for=""><small>#Proforma</small></label>
							<input id="nro_proforma" name="nro_proforma" class="form-control" type="text" value="<?= @$dataFolder->impor_orden_pro ?>">
						</div>
						<div class="col-md-2">
							<label class="control-label" for=""><small>Fecha/Proforma</small></label>
							<input id="fecha_proforma" name="fecha_proforma" class="form-control" type="date" value="<?= @$dataFolder->impor_orden_fech_pro ?>">
						</div>
						<div class="col-md-2">
							<label class="control-label" for=""><small>#Factura</small></label>
							<input id="nro_factura" name="nro_factura" class="form-control" type="text" value="<?= @$dataFolder->impor_orden_factura ?>">
						</div>
						<div class="col-md-2">
							<label class="control-label" for=""><small>Fecha/Factura</small></label>
							<input id="fecha_factura" name="fecha_factura" class="form-control" type="date" value="<?= @$dataFolder->impor_orden_fech_factura ?>">
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-2">
							<label class="control-label" for=""><small>FOB TOTAL</small></label>
							<input id="xordMontoTotal" name="xordMontoTotal" readonly class="form-control" type="text" value="<?= @$dataFolder->impor_orden_monto ?>">
						</div>
						<div class="col-md-2">
							<label class="control-label" for=""><small>FLETE/CONTENEDOR</small></label>
							<input id="xordFleteCNT" name="xordFleteCNT" class="form-control" type="number" min="0" value="<?= @$dataFolder->impor_orden_flete ?>">
						</div>
						<div id="div_thc" class="col-md-2" style="">
							<label class="control-label"><small>THC / CTN</small></label>
							<input type="number" min="0" class="form-control text-uppercase" name="xordTHC" id="xordTHC" value="<?= @$dataFolder->impor_orden_thc ?>">
						</div>
						<div id="div_thc" class="col-md-2" style="">
							<label class="control-label"><small>Total Flete</small></label>
							<input type="number" min="0" class="form-control text-uppercase" name="xordTotalFlete" id="xordTotalFlete" value="<?= @$dataFolder->impor_qty * @$dataFolder->impor_orden_flete ?>">
						</div>
						<div class="col-md-2" style="">
							<label class="control-label"><small>CIF</small></label>
							<input type="text" readonly class="form-control text-uppercase" name="xordCIF" id="xordCIF">
						</div>
						<div id="div_adv" class="col-md-2" style="">
							<label class="col-md-4"><small>ADV</small></label>
							<input type="text" class="form-control text-uppercase" name="xordADV" id="xordADV" value="<?= @$dataFolder->$impor_orden_adv ?>">
						</div>
						<!-- <div class="col-md-2">
							<label class="control-label" for=""><small>#BL</small></label>
							<input id="xordBl" name="xordBl" class="form-control" type="text">
						</div> -->
					</div>
					<br>
					<div class="row">
						<div class="col-md-2">
							<label class="control-label" for=""><small>#BL</small></label>
							<input id="xordBl" name="xordBl" class="form-control" type="text" value="<?= @$dataFolder->impor_orden_bl ?>">
						</div>
						<div class="col-md-2">
							<label class="col-md-3" for=""><small>FORWARDER</small></label>
							<select name="fowarder" id="fowarder" class="form-control selectpicker show-tick" data-live-search='true'>
								<option value="" selected disabled>Seleccione</option>
								<?php foreach ($dataFowarder as $unFowarder) : ?>
									<option value="<?= $unFowarder->id ?>" <?php if (($dataFolder->impor_orden_forwa != null) && ($dataFolder->impor_orden_forwa == $unFowarder->id)) : ?>selected <?php endif; ?>><?= $unFowarder->nombre ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="col-md-3">
							<label class="col-md-3" for=""><small>TIPO/DESPACHO</small></label>
							<select name="tipo_despacho" id="tipo_despacho" class="form-control selectpicker show-tick" data-live-search='true'>
								<option value="" selected disabled>Seleccione</option>
								<option value="EXCEPCIONAL" <?php if (($dataFolder->impor_orden_tipo != null) && ($dataFolder->impor_orden_tipo == "EXCEPCIONAL")) : ?>selected <?php endif; ?>>EXCEPCIONAL</option>
							</select>
						</div>
						<div class="col-md-3">
							<label for="" class="col-md-2"><small>Línea</small></label>
							<select name="linea" id="linea" data-ajax="true" class="form-control selectpicker show-tick" data-live-search='true'>
								<option value="" disabled selected>Seleccione</option>
								<?php foreach ($dataLinea as $linea) : ?>
									<option value="<?= $linea->id ?>" <?php if (($dataFolder->impor_orden_linea != null) && ($dataFolder->impor_orden_linea == $linea->id)) : ?>selected <?php endif; ?>><?= $linea->nombre ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="col-md-2">
							<label for="" class="col-md-2"><small>Nave</small></label>
							<select name="nave" id="nave" class="form-control selectpicker show-tick" data-live-search='true'>
								<option value="" disabled <?php if ($dataFolder->impor_orden_linea == null) : ?>selected <?php endif; ?>>Seleccione</option>
								<?php if ($dataFolder->impor_orden_linea != null) : ?>
									<?php foreach ($dataNave as $nave) : ?>
										<option value="<?= $nave->id ?>" <?php if ($dataFolder->import_orden_nave == $nave->id) : ?>selected<?php endif; ?>><?= $nave->nombre ?></option>
									<?php endforeach; ?>
								<?php endif ?>
							</select>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-2">
							<label for="" class="col-md-2"><small>ETD</small></label>
							<input id="etd" name="etd" type="date" class="form-control" value="<?= @$dataFolder->impor_orden_etd ?>">
						</div>
						<div class="col-md-2">
							<label for="" class="col-md-3"><small>ETA</small></label>
							<input name="eta" id="eta" type="date" class="form-control" value="<?= @$dataFolder->impor_orden_eta ?>">
						</div>
						<div class="col-md-2">
							<label for="" class="control-label"><small>Libre/Sobreestadia</small></label>
							<input type="date" id="libre_estadia" name="libre_estadia" class="form-control" value="<?= @$dataFolder->impor_orden_fech_sobre ?>">
						</div>
						<div class="col-md-2">
							<label for="" class="control-label"><small>Libre/Almacenaje</small></label>
							<input type="date" name="libre_almacen" id="libre_almacen" class="form-control" value="<?= @$dataFolder->impor_orden_fech_alma ?>">
						</div>
						<div class="col-md-4">
							<label for="" class="col-md-4"><small>Almacen</small></label>
							<select name="almacen" id="almacen" class="form-control selectpicker showtick">
								<option value="" selected disabled>Seleccione</option>
								<?php foreach ($dataAlmacen as $almacen) ?>
								<option value="<?= $almacen->id ?>" <?php if ($almacen->id == $dataFolder->impor_orden_alma) : ?> selected <?php endif; ?>><?= $almacen->nombre ?></option>
								<?php ?>
							</select>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div id="div_seg" style="display:none;">
			<div class="panel-heading">
				Seguro
			</div>
			<div class="panel-body">
				<form id="frm_seguro" name="frm_seguro">
					<legend>Datos de la póliza</legend>
					<div class="row">
						<div class="col-md-4">
							<label for="prima_total" class="control-label"><small>#Total FOB</small></label>
							<input type="text" class="form-control" id="seg_fob_total" name="seg_fob_total" readonly onchange='calcularSumaAsegu();calcularTasa();'>
						</div>
						<div class="col-md-4">
							<label for="prima_total" class="control-label"><small>#Total Flete</small></label>
							<input type="text" class="form-control" id="seg_flete_total" name="seg_flete_total" readonly onchange="calcularCIF();calcularSumaAsegu();calcularTasa();">
						</div>
						<div class="col-md-4">
							<label for="prima_total" class="control-label"><small>#Suma Asegurada</small></label>
							<input type="text" class="form-control" id="seg_suma_aseg" name="seg_suma_aseg" readonly>
						</div>
						<div class="col-md-3">
							<label for="" class="control-label"><small>#Referencia</small></label>
							<input type="text" class="form-control" id="referencia" name="referencia" value="<?= @$dataFolder->impor_poliza_referencia ?>">
						</div>
						<div class="col-md-3">
							<label for="" class="control-label"><small>#Vigencia Desde</small></label>
							<input type="date" class="form-control" name="fecha_poliza_ini" id="fecha_poliza_ini" value="<?= @$dataFolder->impor_poliza_vig_desde ?>">
						</div>
						<div class="col-md-3">
							<label for="" class="control-label"><small>#Vigencia Hasta</small></label>
							<input type="date" class="form-control" name="fecha_poliza_fin" id="fecha_poliza_fin" value="<?= @$dataFolder->impor_poliza_vig_hasta ?>">
						</div>
						<div class="col-md-3">
							<label for="nro_poliza" class="control-label"><small>#Poliza</small></label>
							<input type="text" class="form-control" name="nro_poliza" id="nro_poliza" value="<?= @$dataFolder->impor_poliza_nro_poliza ?>">
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-3">
							<label for="" class="control-label"><small>#Aplicación</small></label>
							<input type="text" class="form-control" id="aplicacion" name="aplicacion" value="<?= @$dataFolder->impor_poliza_aplicacion ?>">
						</div>
						<div class="col-md-3">
							<label for="" class="control-label"><small>#Tasa</small></label>
							<select name="seg_tasa" id="seg_tasa" class="form-control selectpicker show tick" onchange="calcularTasa();">
								<optgroup label="Nueva">
									<option value="">Añadir</option>
									</option-group>
								<optgroup label="Actuales">
									<option value="" <?php if ($dataFolder->impor_poliza_tasa == null) : ?>selected<?php endif; ?> disabled>Seleccione</option>
									<!-- Completar datos si vienen de BD -->
									<option value="0.12" <?php if ($dataFolder->impor_poliza_tasa != null && $dataFolder->impor_poliza_tasa == "0.12") : ?>selected <?php endif; ?>>0.12</option>
									</option-group>
							</select>
						</div>
						<div class="col-md-3">
							<label for="prima_neta" class="control-label"><small>#Prima Neta</small></label>
							<input type="text" class="form-control" id="seg_prima_neta" name="seg_prima_neta" value="<?= @$dataFolder->impor_poliza_prima_neta ?>">
						</div>
						<div class=" col-md-3">
							<label for="prima_total" class="control-label"><small>#Prima Total</small></label>
							<input type="text" class="form-control" readonly id="seg_prima_total" name="seg_prima_total" value="<?= @$dataFolder->impor_poliza_prima_total ?>">
						</div>
					</div>

				</form>
			</div>
		</div>

		<div id="div_adu" style="display:none;">
			<div class="panel-heading">
				Aduanas
			</div>
			<div class="panel-body">
				<form id="frm_aduana" name="frm_aduana">
					<legend>Datos de la Aduana</legend>
					<div class="row">
						<div class="col-md-4">
							<label for="prima_total" class="control-label"><small>AGENCIA DE ADUANAS</small></label>
							<!-- <input type="text" class="form-control" id="seg_fob_total" name="seg_fob_total" readonly onchange='calcularSumaAsegu();calcularTasa();'> -->
							<select name="impor_aduana_agencia" id="impor_aduana_agencia" class="form-control selectpicker show-tick " data-live-search='true'>
								<option value="" disabled <?php if ($dataFolder->impor_aduana_agencia == null) : ?>selected<?php endif; ?>>Seleccione..</option>
								<option value="FOB" <?php if ($dataFolder->impor_aduana_agencia != null && $dataFolder->impor_aduana_agencia == "FOB") : ?>selected<?php endif; ?>>SALINAS & CASARETTO</option>
								<!-- <option value="CFR">CFR</option> -->
							</select>
						</div>
						<div class="col-md-4">
							<label for="prima_total" class="control-label"><small>#DUA</small></label>
							<input type="text" class="form-control" id="impor_aduana_dua" name="impor_aduana_dua" value="<?= @$dataFolder->impor_aduana_dua ?>">
						</div>
						<div class="col-md-4">
							<label for="prima_total" class="control-label"><small>FECHA DE NUMERACION</small></label>
							<input type="date" class="form-control" id="impor_aduana_fecha_num" name="impor_aduana_fecha_num" value="<?= @$dataFolder->impor_aduana_fecha_num ?>">
						</div>
						<div class="col-md-4">
							<label for="prima_total" class="control-label"><small>CANAL</small></label>
							<select name="impor_aduana_canal" id="impor_aduana_canal" class="form-control selectpicker " data-live-search='true'>
								<option value="" disabled selected>Seleccione..</option>
								<option value="VERDE" <?php if ($dataFolder->impor_aduana_canal != null && $dataFolder->impor_aduana_canal == "VERDE") : ?>selected<?php endif; ?>>VERDE</option>
								<option value="ROJO" <?php if ($dataFolder->impor_aduana_canal != null && $dataFolder->impor_aduana_canal == "ROJO") : ?>selected<?php endif; ?>>ROJO</option>
								<option value="NARANJA" <?php if ($dataFolder->impor_aduana_canal != null && $dataFolder->impor_aduana_canal == "NARANJA") : ?>selected<?php endif; ?>>NARANJA</option>
							</select>
						</div>
						<div class="col-md-4">
							<label for="prima_total" class="control-label"><small>FECHA DE INGRESO ALMACEN</small></label>
							<input type="date" class="form-control" id="impor_aduana_fecha_almacen" name="impor_aduana_fecha_almacen" value="<?= @$dataFolder->impor_aduana_fecha_almacen ?>">
						</div>
						<div class="col-md-4">
							<label for="" class="control-label"><small>#CONTENEDOR</small></label>
							<input type="text" class="form-control" id="impor_aduana_nro_ctn" name="impor_aduana_nro_ctn" value="<?= @$dataFolder->impor_aduana_nro_ctn ?>">
						</div>
					</div>
				</form>
			</div>
		</div>
		<div id="div_pag" style="display:none;">
			<div class="panel-heading">
				Pagos Proveedores
			</div>
			<div class="panel-body">
				<legend>Datos del Pago</legend>
				<div class="row">
					<div class="container">
						<form id="frm_pago" name="frm_pago">
							<div class="row">
								<div class="col-md-4">
									<label for="" class="control-label"><Small>Incoterm</Small></label>
									<input id="tipo_incoterm" type="text" class="form-control" value="<?= $dataFolder->impor_inco ?>" readonly="readonly">
								</div>
								<div class="col-md-4">
									<label for="" class="control-label"><Small>Monto Total</Small></label>
									<input id="deuda_total" type="text" class="form-control" readonly="readonly">
								</div>
								<div class="col-md-4">
									<label for="" class="control-label"><Small>Pendiente por pagar</Small></label>
									<input id="saldo_pendiente" type="text" class="form-control" readonly="readonly">
								</div>
							</div>
						</form>
						<hr>
						<div class="row">
							<div class="col-md-10 col-md-offset-1">
								<div class="text-right">
									<button type="button" class="btn btn-primary btn-sm add-payment" onclick="llenarTabla('#tbl_payments')">
										<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
									</button>
								</div>
								<div class="table-responsive">
									<form name="frm_payment_history" id="frm_payment_history" action="../Almacen/ajax/importacion.php?accion=ajax&procesar=frm_importacion&opcion=i" method="POST">
										<table id="tbl_payments" class="table table-striped table-condensed">
											<caption class="text-center">Historico de Pagos</caption>
											<thead>
												<th width="10%">Nro Pago</th>
												<th>Monto</th>
												<th>Fecha</th>
												<th width="10%">Eliminar</th>
											</thead>
											<tbody id="import_pagos">
												<?php if (isset($resultadoPago) && mysqli_num_rows($resultadoPago) > 0) : ?>
													<?php foreach ($dataPago as $idx => $unPago) : ?>
														<tr>
															<td><?= $idx + 1; ?></td>
															<td><input type='number' class="form-control" id="payment_amount_<?= $idx + 1 ?>" name="payment_amount_<?= $idx + 1 ?>" min="0" value="<?= @$unPago->impor_pago_monto ?>"></td>
															<td><input type='date' class="form-control" id="payment_date_<?= $idx + 1 ?>" name="payment_date_<?= $idx + 1 ?>" value="<?= @$unPago->impor_pago_fecha ?>"></td>
															<td><a class="btn btn-disabled btn-danger disabled btn-disabled"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
														</tr>
													<?php endforeach; ?>
												<?php endif; ?>
											</tbody>
										</table>
										<div class="form-group text-center">
											<button class="btn btn-primary">Guardar Datos de Importación <span class="glyphicon glyphicon-floppy-save"></span></button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- /.col-lg-12 -->
</div>
</div>
</div>
</div>
<!-- /.row-->
<!-- Aqui incluyo el html basico del modal -->
<?php include_once("modal.php"); ?>
<!-- /Aqui incluyo el html basico del modal -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js?<?= substr(time(), -5) ?>"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="js_sg/importaciones.js?<?= substr(time(), -5) ?>" language="Javascript"></script>