<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />
<style>
	#tbl_importaciones_detalle tbody tr {
		font-size: 0.85rem !important;
	}
</style>
<div class="col-md-12">
	<div class="pull-right">
		<a href="../Almacen/Index.php?menu=10" class="btn btn-primary">Regresar</a>
	</div>
</div>
<style lang="">
	.wizard>.content {
		overflow: hidden !important;
		overflow-y: auto !important;
		padding-right: 50px;
	}


	@media screen and (max-width:768px) {
		.wizard>.content {
			overflow-y: auto !important;
			padding-right: 50px;
		}
	}
</style>
<div id="div_general">
	<!-- Fomulario para folder -->
	<h5><small>Folios</small></h5>
	<section>
		<form name="frm_folios" id="frm_folios" method="POST" class="form-horizontal" role="form">
			<div class="form-group">
				<hr>
				<div class="row">
					<div class="col-md-3">
						<label for="empresa"><small>Empresa:</small></label>
						<select name="empresa" id="empresa" class="form-control selectpicker show-tick" data-live-search='true'>
							<option value="" disabled selected>Seleccione..</option>
							<?php foreach ($dataEmpresa as $empresa) { ?>
								<option value="<?= $empresa->id ?>"><?= $empresa->nombre ?></option>
							<?php } ?>
						</select>
						<!-- <small id="helpId" class="text-muted">Help text</small> -->
					</div>
					<div class="col-md-3">
						<label><small>Folio:</small></label>
						<div id="div_folios" class="input-group">
							<input id="xfolder" name="xfolder" type="text" class="form-control" placeholder="Ej: 2019" aria-describedby="basic-addon1" value="<?= date("Y") ?>">
							<span class="input-group-addon" id="basic-addon1">N°</span>
							<input id="xnrfolder" name="xnrfolder" type="text" class="form-control" placeholder="Folio" aria-describedby="basic-addon1">
						</div>
					</div>
					<div class="col-md-2">
						<label for="empresa"><small>Incoterm:</small></label>
						<select name="incoterm" id="incoterm" class="form-control selectpicker" required="required">
							<option value="" disabled selected>Seleccione..</option>
							<option value="FOB">FOB</option>
							<option value="CFR">CFR</option>
						</select>
					</div>
					<div class="col-md-2">
						<label for="type_ctn"><small>Tipo CTN:</small></label>
						<select name="type_ctn" id="type_ctn" class="form-control selectpicker" required="required">
							<option value="" disabled selected>Seleccione..</option>
							<option value="FOB">40HC</option>
						</select>
					</div>
					<div class="col-md-2">
						<label for="empresa"><small>Qty CTN:</small></label>
						<input id="qty_ctn" name="qty_ctn" data-required="true" type="text" class="form-control">
					</div>
				</div>
				<br>
				<hr>
				<div class="row">
					<div class="col-md-3">
						<label for="empresa"><small>Tipo de Producto:</small></label>
						<select name="tipo_pr" id="tipo_pr" class="form-control selectpicker show-tick" required="required">
							<option value="" disabled selected>Seleccione..</option>
							<?php foreach ($dataTipoProducto as $tipoProoducto) { ?>
								<option value="<?= $tipoProoducto->id ?>"><?= $tipoProoducto->nombre ?></option>
							<?php } ?>
						</select>
						<!-- <small id="helpId" class="text-muted">Help text</small> -->

					</div>
					<div class="col-md-3">
						<label for="marca"><small>Marca:</small></label>
						<select name="marca" id="marca" class="form-control selectpicker show-tick" data-live-search='true'>
							<option value="" disabled selected>--</option>
						</select>
						<!-- <small id="helpId" class="text-muted">Help text</small> -->
					</div>
					<div class="col-md-3">
						<label for="empresa"><small>País:</small></label>
						<select name="pais" id="pais" class="form-control selectpicker show-tick" data-live-search='true'>
							<option value="" disabled selected>Seleccione..</option>
							<?php foreach ($dataPais as $pais) { ?>
								<option value="<?= $pais->id ?>"><?= $pais->nombre ?></option>
							<?php } ?>
						</select>
						<!-- <small id="helpId" class="text-muted">Help text</small> -->
					</div>
					<div class="col-md-3">
						<label for="puerto"><small>Puerto:</small></label>
						<select name="puerto" id="puerto" class="form-control selectpicker show-tick" data-live-search='true'>
							<option value="" disabled selected>--</option>
						</select>
						<!-- <small id="helpId" class="text-muted">Help text</small> -->
					</div>
				</div>
				<br>
				<hr>
			</div>
		</form>
	</section>
	<!-- /Fomulario para folder -->
	<!-- Formulario de Proveedor -->
	<h5><small>Proveedores</small></h5>
	<section class="container-fluid">
		<form id="frm_proveedor" name="frm_proveedor" class="form-horizontal">
			<div class="form-group">
				<div class="row">
					<div class="col-md-4">
						<div class="row">
							<label for="" class="col-xs-6 col-md-3"><small>Proveedor</small></label>
							<div class="col-xs-10 col-md-8">
								<input type="text" class="form-control" readonly name="proveedor" id="proveedor">
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
						<div class="row">
							<label for="" class="col-md-3 text-right" style="padding-right:5px !important"><small>Teléfono</small></label>
							<div class="col-md-9"><input type="text" readonly id="telefono_proveedor" name="telefono_proveedor" class="form-control"></div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="row">
							<label for="" class="col-md-3"><small>Correo</small></label>
							<div class="col-md-9"><input type="email" readonly id="email_proveedor" name="email_proveedor" class="form-control"></div>
						</div>
					</div>
				</div>
			</div>
			<hr>
			<div class="form-group">
				<div class="row">
					<div class="col-md-4">
						<label for="" class="col-md-3"><small>Direccion</small></label>
						<div class="col-md-9">
							<input type="text" class="form-control" readonly name="direccion_proveedor" id="direccion_proveedor">
						</div>
					</div>
					<div class="col-md-4">
						<div class="row">
							<label for="" class="col-md-3 text-right" style="padding-right:5px !important"><small>Contacto</small></label>
							<div class="col-md-9"><input type="text" readonly id="proveedor_contacto" name="proveedor_contacto" class="form-control"></div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="row">
							<label for="" class="col-md-3"><small>Contacto</small></label>
							<div class="col-md-9"><input type="text" readonly id="proveedor_contacto_telf" name="proveedor_contacto_telf" class="form-control"></div>
						</div>
					</div>
				</div>
			</div>
			<br>
			<hr>
		</form>
	</section>
	<!-- /Formulario de Proveedor -->
	<!-- Formulario de orden -->
	<h5><small>Orden</small></h5>
	<section class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<form name="frm_orden" id="frm_orden">
					<div class="form-group">
						<legend><small>Datos de la Factura</small></legend>
						<div class="row">
							<div class="col-md-2" style="padding:0 !important">
								<div class="row">
									<label class="col-md-4" for=""><small>#Orden</small></label>
									<div class="col-md-11"><input id="nro_orden" name="nro_orden" class="form-control" type="text"></div>
								</div>
							</div>
							<div class="col-md-2" style="padding:0 !important">
								<div class="row">
									<label class="col-md-4" for=""><small>Fecha/Compra</small></label>
									<div class="col-md-11"><input id="fecha_compra" name="fecha_compra" class="form-control" type="date"></div>
								</div>
							</div>
							<div class="col-md-2" style="padding:0 !important">
								<div class="row">
									<label class="col-md-4" for=""><small>#Proforma</small></label>
									<div class="col-md-11"><input id="nro_proforma" name="nro_proforma" class="form-control" type="text"></div>
								</div>
							</div>
							<div class="col-md-2" style="padding:0 !important">
								<div class="row">
									<label class="col-md-4" for=""><small>Fecha/Proforma</small></label>
									<div class="col-md-11"><input id="fecha_proforma" name="fecha_proforma" class="form-control" type="date"></div>
								</div>
							</div>
							<div class="col-md-2" style="padding:0 !important">
								<div class="row">
									<label class="col-md-4" for=""><small>#Factura</small></label>
									<div class="col-md-11"><input id="nro_factura" name="nro_factura" class="form-control" type="text"></div>
								</div>
							</div>
							<div class="col-md-2" style="padding:0 !important">
								<div class="row">
									<label class="col-md-4" for=""><small>Fecha/Factura</small></label>
									<div class="col-md-11"><input id="fecha_factura" name="fecha_factura" class="form-control" type="text"></div>
								</div>
							</div>
						</div>
					</div>
					<hr>
					<div class="form-group">
						<legend><small>Datos del Contenedor</small></legend>
						<div class="row">
							<div class="col-md-2" style="padding:0 !important">
								<div class="row">
									<label class="col-md-8" for=""><small>FOB TOTAL</small></label>
									<div class="col-md-11"><input id="xordMontoTotal" name="xordMontoTotal" readonly class="form-control" type="text"></div>
								</div>
							</div>
							<div class="col-md-2" style="padding:0 !important">
								<div class="row">
									<label class="col-md-4" for=""><small>FLETE/CONTENEDOR</small></label>
									<div class="col-md-11"><input id="flete_contenedor" name="flete_contenedor" class="form-control" type="text"></div>
								</div>
							</div>
							<div id="div_thc" class="col-md-2" style="display:none;">
								<div class="row"><label class="col-md-4"><small>THC</small></label>
									<div class="col-md-12">
										<input type="text" class="form-control text-uppercase" name="xordTHC" id="xordTHC">
									</div>
								</div>
							</div>
							<div id="div_adv" class="col-md-2" style="display:none;">
								<div class="row"><label class="col-md-4"><small>ADV</small></label>
									<div class="col-md-12">
										<input type="text" class="form-control text-uppercase" name="xordADV" id="xordADV">
									</div>
								</div>
							</div>
							<div class="col-md-2" style="padding:0 !important">
								<div class="row">
									<label class="col-md-4" for=""><small>#BL</small></label>
									<div class="col-md-11"><input id="xordBl" name="xordBl" class="form-control" type="text"></div>
								</div>
							</div>
							<div id="div_fowarder" class="col-md-4" style="padding:0 !important">
								<div class="row">
									<label class="col-md-4" for=""><small>Fowarder</small></label>
									<div class="col-md-11">
										<select name="fowarder" id="fowarder" class="form-control selectpicker show-tick" data-live-search='true'>
											<option value="" selected disabled>Seleccione</option>
											<?php foreach ($dataFowarder as $unFowarder) : ?>
												<option value="<?= $unFowarder->id ?>"><?= $unFowarder->nombre ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-2" style="padding:0 !important">
								<div class="row">
									<label class="col-md-4" for=""><small>TIPO/DESPACHO</small></label>
									<div class="col-md-11">
										<select name="tipo_despacho" id="tipo_despacho" class="form-control selectpicker show-tick" data-live-search='true'>
											<option value="" selected disabled>Seleccione</option>
											<option value="EXCEPCIONAL">EXCEPCIONAL</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-3" style="padding:0 !important">
								<div class="row">
									<label for="" class="col-md-4"><small>Línea</small></label>
									<div class="col-md-11">
										<select name="linea" id="linea" class="form-control selectpicker show-tick">
											<option value="" disabled selected>Seleccione</option>
											<?php foreach ($dataLinea as $linea) : ?>
												<option value="<?= $linea->id ?>"><?= $linea->nombre ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-3" style="padding:0 !important">
								<div class="row">
									<label for="" class="col-md-4"><small>Nave</small></label>
									<div class="col-md-11">
										<select name="nave" id="nave" class="form-control selectpicker show-tick">
											<option value="" disabled selected>Seleccione</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-3" style="padding:0 !important">
								<div class="row">
									<label for="" class="col-md-4"><small>ETD</small></label>
									<div class="col-md-11"><input id="etd" name="etd" type="date" class="form-control"></div>
								</div>
							</div>
							<div class="col-md-3" style="padding:0 !important">
								<div class="row">
									<label for="" class="col-md-4"><small>ETA</small></label>
									<div class="col-md-11"><input name="eta" id="eta" type="date" class="form-control"></div>
								</div>
							</div>
							<!-- <div class="col-md-2" style="padding:0 !important">
								<div class="row">
									<label for="" class="col-md-4"><small>Libre/Sobreestadia</small></label>
									<div class="col-md-11"><input id="estadia" name="estadia" type="text" class="form-control"></div>
								</div>
							</div> -->
						</div>
					</div>
					<hr>
					<div class="form-group">
						<legend><small>Datos Almacenaje</small></legend>
						<div class="row">
							<div class="col-md-4" style="padding:0 !important">
								<div class="row">
									<label for="" class="col-md-4"><small>Libre/Sobreestadia</small></label>
									<div class="col-md-11"><input type="date" id="libre_estadia" name="libre_estadia" class="form-control"></div>
								</div>
							</div>
							<div class="col-md-4" style="padding:0 !important">
								<div class="row">
									<label for="" class="col-md-4"><small>Libre/Almacenaje</small></label>
									<div class="col-md-11"><input type="date" name="libre_almacen" id="libre_almacen" class="form-control"></div>
								</div>
							</div>
							<div class="col-md-4" style="padding:0 !important">
								<div class="row">
									<label for="" class="col-md-4"><small>Almacen</small></label>
									<div class="col-md-11">
										<select name="almacen" id="almacen" class="form-control selectpicker showtick">
											<option value="" selected disabled>Seleccione</option>
											<?php foreach ($dataAlmacen as $almacen) ?>
											<option value="<?= $almacen->id ?>"><?= $almacen->nombre ?></option>
											<?php ?>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
	<!-- /Formulario de orden -->
	<!-- Formulario de producto -->
	<h5><small>Producto</small></h5>
	<section class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<form id="frm_product" name="frm_product">
					<div class="form-group">
						<!-- Selectores -->
						<div class="row">
							<div id="div_product_type" class="col-md-4">
								<label for="" class="control-label col-md-6"><small>Tipo Producto</small></label>
								<div class="col-md-12">
									<select name="product_type" id="product_type" class="form-control selectpicker show-tick" data-live-search="true">
										<option value="" disabled selected>Seleccione</option>
										<?php foreach ($dataTipoProducto as $tipoProd) : ?>
											<option value="<?= $tipoProd->id ?>"><?= $tipoProd->nombre ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<div id="div_product_brand" class="col-md-4">
								<div class="row">
									<label for="" class="control-label col-md-6"><small>Marca</small></label>
									<div class="col-md-12">
										<select name="brand" id="brand" class="form-control selectpicker show-tick" data-live-search="true">
											<option value="" selected disabled> -- </option>
										</select>
									</div>
								</div>
							</div>
							<!-- Modelo: depende del tipo de marca, se muestra y actualiza el combo -->
							<div id="div_product_model" class="col-md-3" style="display:none">
								<div class="row">
									<label for="" class="control-label col-md-6"><small>Modelo</small></label>
									<div class="col-md-12">
										<select name="model" id="model" class="form-control selectpicker show-tick" data-live-search="true">
											<option value="" selected disabled> -- </option>
										</select>
									</div>
								</div>
							</div>
							<!-- /Modelo: depende del tipo de marca, se muestra y actualiza el combo -->
							<div id="div_product" class="col-md-4">
								<div class="row">
									<label for="" class="control-label col-md-6"><small>Producto</small></label>
									<div class="col-md-12">
										<select name="product" id="product" class="form-control selectpicker show-tick">
											<option value="" selected disabled> -- </option>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Selectores -->
					<hr>
					<!-- campos editables -->
					<div class="form-group">
						<div class="row">
							<div class="col-md-2">
								<div class="row">
									<label for="" class="col-md-10"><small>Precio Unitario</small></label>
									<div class="col-md-12">
										<input type="text" class="form-control" id="unit_price" name="unit_price">
									</div>
								</div>
							</div>
							<div class="col-md-2">
								<div class="row">
									<label for="" class="col-md-8"><small>Cantidad</small></label>
									<div class="col-md-12">
										<input type="text" class="form-control" id="product_qty" name="product_qty">
									</div>
								</div>
							</div>
							<div class="col-md-2">
								<div class="row">
									<label for="" class="col-md-12"><small>Unidad de Medida</small></label>
									<div class="col-md-12">
										<input type="text" class="form-control" id="medida" name="medida">
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="row">
									<label for="" class="col-md-8"><small>Descuento</small></label>
									<div class="col-md-12">
										<input type="text" class="form-control" id="discount" name="discount">
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="row">
									<label for="" class="col-md-8"><small>Precio Total</small></label>
									<div class="col-md-12">
										<input type="text" class="form-control" id="amount_total" name="amount_total" readonly>
									</div>
								</div>
							</div>
						</div>
						<!-- campos editables -->
						<hr>
						<br>
						<div class="form-group text-right">
							<button id="btn_addproduct" type="button" class="btn btn-primary">
								<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
							</button>
						</div>
					</div>
				</form>
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table id="tbl_importaciones_detalle" class="table table-striped table-condensed">
									<caption>Lista de productos</caption>
									<thead>
										<th>#</th>
										<th>Tipo Producto</th>
										<th>Marca</th>
										<th>Modelo</th>
										<th>Producto</th>
										<th>Precio Unitario</th>
										<th>Cantidad</th>
										<th>Unidad Medida</th>
										<th>Descuento</th>
										<th>Precio total Unitario</th>
										<th>Eliminar</th>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /Formulario tipo Producto -->
	<!-- Formulario de Seguro -->
	<h5><small>Seguro</small></h5>
	<section class="container-fliuid">
		<div class="row">
			<div class="col-md-12">
				<form id="frm_seguro" name="frm_seguro">
					<legend>Datos de la póliza</legend>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label for="nro_poliza" class="control-label"><small>#Poliza</small></label>
								<input type="text" class="form-control" name="nro_poliza" id="nro_poliza">
							</div>
							<div class="col-md-3">
								<label for="" class="control-label"><small>#Vigencia Desde</small></label>
								<input type="date" class="form-control" name="fecha_poliza_ini" id="fecha_poliza_ini">
							</div>
							<div class="col-md-3">
								<label for="" class="control-label"><small>#Vigencia Hasta</small></label>
								<input type="date" class="form-control" name="fecha_poliza_fin" id="fecha_poliza_fin">
							</div>
							<div class="col-md-3">
								<label for="" class="control-label"><small>#Referencia</small></label>
								<input type="text" class="form-control" id="referencia" name="referencia">
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-3">
								<label for="" class="control-label"><small>#Aplicación</small></label>
								<input type="text" class="form-control" id="aplicacion" name="aplicacion">
							</div>
							<div class="col-md-3">
								<label for="" class="control-label"><small>#Tasa</small></label>
								<select name="tasa" id="tasa" class="form-control selectpicker show tick">
									<optgroup label="Nueva">
										<option value="">Añadir</option>
										</option-group>
									<optgroup label="Actuales">
										<option value="" selected disabled>Seleccione</option>
										<option value="">Añadir</option>
										</option-group>
								</select>
							</div>
							<div class="col-md-3">
								<label for="prima_neta" class="control-label"><small>#Prima Neta</small></label>
								<input type="text" class="form-control" id="prima_neta" name="prima_neta">
							</div>
							<div class="col-md-3">
								<label for="prima_total" class="control-label"><small>#Prima Total</small></label>
								<input type="text" class="form-control" id="prima_total" name="prima_total">
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-4">
								<label for="prima_total" class="control-label"><small>#Total FOB</small></label>
								<input type="text" class="form-control" id="prima_total" name="prima_total">
							</div>
							<div class="col-md-4">
								<label for="prima_total" class="control-label"><small>#Total Flete</small></label>
								<input type="text" class="form-control" id="prima_total" name="prima_total">
							</div>
							<div class="col-md-4">
								<label for="prima_total" class="control-label"><small>#Suma Asegurada</small></label>
								<input type="text" class="form-control" id="prima_total" name="prima_total">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
	<!-- /Formulario de Seguro -->
	<h5><small>Pagos</small></h5>
	<section class="container-fluid">
		<div class="row">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<label for="" class="control-label"><Small>Incoterm</Small></label>
						<input id="tipo_incoterm" type="text" class="form-control" readonly="readonly">
					</div>
					<div class="col-md-3">
						<label for="" class="control-label"><Small>Monto Total</Small></label>
						<input id="deuda_total" type="text" class="form-control" readonly="readonly">
					</div>
					<div class="col-md-3">
						<label for="" class="control-label"><Small>Pendiente por pagar</Small></label>
						<input id="saldo_pendiente" type="text" class="form-control" readonly="readonly">
					</div>
					<div class="col-md-3">
						<div class="row">
							<div class="col-md-12 text-center">Tipo de pago</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<table width="100%" cellspadding="0">
									<tr>
										<td width="50%" align="center"><label class=" control-label" for="parcial"><input style="display:inline-block" type="radio" id="parcial" name="tipo_pago" value="0"> Parcial</label></td>
										<td width="50%" align="center"><label class=" control-label" for="total"><input style="display:inline-block" type="radio" id="total" name="tipo_pago" value="0"> Total</label></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="text-right">
							<button class="btn btn-primary btn-sm add-payment">
								<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
							</button>
						</div>
						<div class="table-responsive">
							<form name="frm_payment_history">
								<table class="table table-striped table-condensed">
									<caption class="text-center">Historico de Pagos</caption>
									<thead>
										<th width="10%">Nro Pago</th>
										<th>Monto</th>
										<th>Fecha</th>
										<th width="10%">Eliminar</th>
									</thead>
									<tbody id="import_pagos">
									</tbody>
								</table>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- <h5>paso 7</h5>
	<section>7section 7</section> -->
</div>
<!-- Aqui incluyo el html basico del modal -->
<?php include_once("modal.php"); ?>
<!-- /Aqui incluyo el html basico del modal -->


<script>
	$(document).ready(function() {

		jQuery.validator.addMethod("alpha_space", function(value, element) {
			return this.optional(element) || /^[a-zñáéíóúA-ZÑÁÉÍÓÚ ]+$/i.test(value);
		}, "Solo se permiten letras y espacios");

		jQuery.validator.addMethod("alphanumeric", function(value, element) {
			return this.optional(element) || /^[a-zA-Z0-9]+$/i.test(value);
		}, "Solo se permiten letras y espacios");

		jQuery.validator.setDefaults({
			// where to display the error relative to the element
			errorPlacement: function(error, element) {
				//error.appendTo(element.parent().find('div.myErrors'));
				if ((element.attr('id') == "xfolder") || (element.attr('id') == "xnrfolder")) {
					error.appendTo(element.parent().parent());
				} else {
					error.insertAfter(element);
				}
			}
		});


		$.fn.steps.setStep = function(step) {
			var options = getOptions(this),
				state = getState(this);
			return _goToStep(this, options, state, index); //Index Instead step
		};


		$("#div_general").steps({
			headerTag: "h5",
			bodyTag: "section",
			transitionEffect: "slideLeft",
			onStepChanging: function(event, currentIndex, newIndex) {
				switch (currentIndex) {
					case 0:
						var form = $("#frm_folios");
						form.validate({
							rules: {
								empresa: "required",
								xfolder: {
									required: true,
									minlength: 4,
									maxlength: 4,
									number: true,
								},
								xnrfolder: {
									required: true,
								},
								incoterm: "required",
								type_ctn: "required",
								qty_ctn: {
									required: true,
									number: true
								},
								tipo_pr: "required",
								marca: "required",
								pais: "required",
								// puerto: "required"
							},
							messages: {
								empresa: "Seleccione una opción",
								xfolder: {
									required: "El año de Folio es requerido",
									minlength: jQuery.validator.format("El campo debe tener {0} Digitos"),
									maxlength: jQuery.validator.format("El campo no debe exceder de {0} Digitos"),
									number: "El formato debe ser numérico",

								},
								xnrfolder: {
									required: "El N° de Folio	 es requerido",
								},
								incoterm: "Seleccione una opción",
								type_ctn: "Seleccione una opción",
								qty_ctn: {
									required: "El valor es requerido",
									number: "El formato es solo numerico"
								},
								tipo_pr: "Seleccione una opción",
								marca: "Seleccione una opción",
								pais: "Seleccione una opción",
								// puerto: "Seleccione una opción",
							}
						}).settings.ignore = ":disabled,:hidden";
						return true;
						//return form.valid();
						break;
					case 1:
						var form = $("#frm_proveedor");
						form.validate({
							rules: {
								proveedor: {
									required: true,
									alpha_space: true
								},
								direccion: {
									required: true,
									alpha_space: true
								},
							},
							messages: {
								proveedor: {
									required: "Seleccione o cree el proveedor",
								},
								direccion: {
									required: "Indique la Direccion del Proveedor"
								},

							}
						});
						//return form.valid();
						return true;
						break;
					case 2:
						jQuery.validator.addMethod("monto", function(value, element) {
							return this.optional(element) || /^(\d+|\d+.\d{1,2})$/.test(value);
						}, "Formato incorrecto, Ej: 1234.56");
						form = $("#frm_orden");
						form.validate({
							rules: {
								xordTHC: {
									required: {
										depends: function() {
											return ($("#incoterm").val() == "CFR") ? true : false;
										}
									}
								},
								xordADV: {
									required: {
										depends: function() {
											return ($("#incoterm").val() == "FOB") ? true : false;
										}
									}
								},
								nro_orden: {
									required: true,
									number: true
								},
								fecha_compra: {
									required: true,
									date: true
								},
								nro_proforma: {
									required: true,
									alphanumeric: true
								},
								fecha_proforma: {
									required: true,
									date: true
								},
								nro_factura: {
									required: true,
									alphanumeric: true,
								},
								fecha_factura: {
									required: true,
									date: true
								},
								xordMontoTotal: {
									required: {
										depends: function() {
											return $("#tbl_importaciones_detalle tbody tr").length == 0 ? true : false;
										}
									},
									monto: true
								},
								flete_contenedor: {
									required: true,
									monto: true
								},
								xordBl: {
									required: true,
									alphanumeric: true
								},
								fowarder: {
									required: true
								},
								tipo_despacho: {
									required: true
								},
								linea: {
									required: true
								},
								nave: {
									required: true
								},
								etd: {
									required: true,
									date: true
								},
								eta: {
									required: true,
									date: true
								},
								libre_estadia: {
									required: true,
									date: true
								},
								libre_almacen: {
									required: true,
									date: true
								},
								almacen: {
									required: true
								}
							},
							messages: {
								xordTHC: {
									required: "Valor Requerido"
								},
								xordADV: {
									required: "Valor Requerido"
								},
								nro_orden: {
									required: "Valor Requerido"
								},
								fecha_compra: {
									required: "Valor Requerido",
									date: "Indique una fecha válida"
								},
								nro_proforma: {
									required: "Valor Requerido",
									alphanumeric: "Solo se permiten letras y numeros",
								},
								fecha_proforma: {
									required: "Valor Requerido",
									date: "Indique una fecha válida"
								},
								nro_factura: {
									required: "Valor Requerido",
									alphanumeric: "Solo se permiten letras y numeros",
								},
								fecha_factura: {
									required: "Valor Requerido",
									date: "Indique una fecha válida"
								},
								xordMontoTotal: {
									required: "Ingrese los productos a importar",
								},
								flete_contenedor: {
									required: "valor requerido",
								},
								xordBl: {
									required: "Valor Requerido",
									alphanumeric: "Solo se permiten letras y numeros"
								},
								fowarder: {
									required: "Seleccione una opción"
								},
								tipo_despacho: {
									required: "Seleccione una opción"
								},
								linea: {
									required: "Valor Requerido"
								},
								nave: {
									required: "Valor Requerido"
								},
								etd: {
									required: "Valor Requerido",
									date: "formato de fecha invalido"
								},
								eta: {
									required: "Valor Requerido",
									date: "formato de fecha invalido"
								},
								libre_estadia: {
									required: "Valor Requerido",
									date: "Formato de fecha invalido"
								},
								libre_almacen: {
									required: "Valor Requerido",
									date: "Formato de fecha invalido"
								},
								almacen: {
									required: "Valor Requerido"
								}
							}
						}).settings.ignore = ":disabled";
						if (!form.valid()) {
							if (confirm("Desea Continuar?")) {
								return true;
							}
						}
						break;
					case 3:
						//return validarProductFormImport();
						return true;
						break;
					case 4:
						return true;
						break;
					case 5:
						return true;
						break;
					case 6:
						return true
						break;
				}
			},
		}).validate({
			errorPlacement: function errorPlacement(error, element) {
				element.before(error);
			},
			rules: {
				empresa: "required"
			},
			messages: {
				empresa: "Por Favor seleccione una opcion"
			}
		});

		// Single Select
		$("#proveedor").autocomplete({
			source: function(request, response) {
				// Fetch data
				$.ajax({
					url: "../Almacen/Vistas/Importacion/V_Importacion.php?accion=ajax&buscar=proveedor",
					type: 'GET',
					dataType: "json",
					data: {
						search: request.term
					},
					success: function(data) {
						response(data);
					}
				});
			},
			select: function(event, ui) {
				// Set selection
				$('#autocomplete').val(ui.item.label); // display the selected text
				$('#selectuser_id').val(ui.item.value); // save selected id to input
				return false;
			}
		});


		$('.selectpicker').selectpicker();

		$(".selectpicker").each(function() {
			var select = $(this);
			select.on('change', function() {
				switch (select.attr('id')) {
					case "tipo_pr":
						parametros = {
							ruta: "../Almacen/Vistas/Importacion/V_Importacion.php?accion=ajax&buscar=marca&valor=" + select.val(),
							elemento: "#marca"
						};
						updateElementAsync(parametros);
						break;
					case "pais":
						parametros = {
							ruta: "../Almacen/Vistas/Importacion/V_Importacion.php?accion=ajax&buscar=puerto&valor=" + select.val(),
							elemento: "#puerto"
						};
						updateElementAsync(parametros);
						break;
					case "product_type":
						$("#brand").html('<option value="" selected disabled> -- </option>').selectpicker('refresh');
						$("#model").html('<option value="" selected disabled> -- </option>').selectpicker('refresh');
						$("#product").html('<option value="" selected disabled> -- </option>').selectpicker('refresh');
						if (select.val() == 1) {
							$("#div_product_type").removeClass('col-md-4').addClass('col-md-3');
							$("#div_product_brand").removeClass('col-md-4').addClass('col-md-3');
							$("#div_product").removeClass('col-md-4').addClass('col-md-3');;
							$("#div_product_model").css("display", "block");
						} else {
							$("#div_product_type").removeClass('col-md-3').addClass('col-md-4');
							$("#div_product_brand").removeClass('col-md-3').addClass('col-md-4');
							$("#div_product").removeClass('col-md-3').addClass('col-md-4');
							$("#div_product_model").css("display", "none");
						}
						parametros = {
							ruta: "../Almacen/Vistas/Importacion/V_Importacion.php?accion=ajax&buscar=marca&valor=" + select.val(),
							elemento: "#brand"
						};
						updateElementAsync(parametros);
						break;
					case "brand":
						$("#model").html('<option value="" selected disabled> -- </option>').selectpicker('refresh');
						$("#product").html('<option value="" selected disabled> -- </option>').selectpicker('refresh');
						if ($("#product_type").val() == 1) {
							parametros = {
								ruta: "../Almacen/Vistas/Importacion/V_Importacion.php?accion=ajax&buscar=modelo&valor=" + select.val(),
								elemento: "#model"
							};
						} else {
							parametros = {
								ruta: "../Almacen/Vistas/Importacion/V_Importacion.php?accion=ajax&buscar=producto&valor=" + select.val(),
								elemento: "#product"
							};
						}
						updateElementAsync(parametros);
						break;
					case "model":
						parametros = {
							ruta: "../Almacen/Vistas/Importacion/V_Importacion.php?accion=ajax&buscar=producto&valor=" + select.val(),
							elemento: "#product"
						};
						updateElementAsync(parametros);
						break;
					case "linea":
						parametros = {
							ruta: "../Almacen/Vistas/Importacion/V_Importacion.php?accion=ajax&buscar=nave&valor=" + select.val(),
							elemento: "#nave"
						};
						updateElementAsync(parametros);
						break;
				}
			});
		});

		$("#xordMontoTotal").keyup(function() {
			var value = $(this).val();
			$("#xsegFob").val(value);
		});

		$(".add-payment").on('click', function() {
			var nro_pago = parseInt($("#import_pagos").find("tr").length) + 1;
			var htmlRows = "<tr id='fila_" + nro_pago + "'>";
			var htmlCells = "<td align='center'>" + nro_pago + "</td>";
			htmlCells += "<td align='center'><input class='form-control' name='monto_pago[]' id='monto_" + nro_pago + "'/></td>";
			htmlCells += "<td align='center'><input class='form-control' name='fecha_pago[]' id='fecha_" + nro_pago + "'/></td>";
			htmlCells += "<td align='center'><button type='button' class='btn btn-danger btn-sm delete-payment' ><i class='glyphicon glyphicon-trash'></i></button></td>";
			htmlRows += htmlCells;
			htmlRows += "</tr>";
			$("#import_pagos").append(htmlRows);
		});

		$("#import_pagos").on('click', '.delete-payment', function() {
			var fila = $(this).parents('tr');
			var nro_filas = $("#import_pagos").find('tr').length;
			if (nro_filas == 1) {
				alert('Se debe registrar al menos un pago');
			} else {
				fila.remove();
				for (var i = 0; i < nro_filas; i++) {
					$("#import_pagos tr").eq(i).find('td').eq(0).text(i + 1);
				}
			}

		});

		$("input[name='tipo_pago']").on('click', function() {
			var continuar = true;
			if ($(this).attr('id') == 'parcial') {
				continuar = false;
			} else {
				var nro_filas = $("#import_pagos").find('tr').length;
				$("#import_pagos tr").eq(--nro_filas).find("td").eq(1).find('input.form-control').attr('readonly', true).val($("#saldo_pendiente").val());
			}
			$(this).prop('checked', false);
		});

		$("#product_qty").on('change', function() {
			var preciototal = parseFloat($("#unit_price").val()) * parseFloat($(this).val());
			$("#amount_total").val(preciototal.toFixed(2));
		});

		$("#discount").on('change', function() {
			var preciototal = parseFloat($("#amount_total").val()) - parseFloat($(this).val());
			$("#amount_total").val(preciototal.toFixed(2));
		});

	});


	function leerFormularios(formulario) {
		$("#modal .modal-body").html('');
		var parametros = new Object();

		switch (formulario) {
			case "proveedor":
				parametros.ruta = "../Almacen/Vistas/Importacion/form_proveedores.php";
				$("#modal #btn_save").on('click', function() {
					var form = $("#frm_newProvider");
					form.validate({
						lang: 'es',
						rules: {
							descripcion: {
								required: true,
								alpha_space: true
							},
							email: {
								required: true,
								email: true
							},
							telf: {
								required: true,
								maxlength: 12,
								minlength: 7,
								number: true,
							},
							direccion: {
								maxlength: 150,
								minlength: 10,
							}
						},
						messages: {
							descripcion: {
								required: "El valor es requerido",
								alpha_space: "Solo se permiten letras y espacios",
							},
							email: {
								required: "El valor es requerido",
								email: "El valor del campo no es de tipo email",
							},
							telf: {
								number: "Solo se permiten numeros",
								required: "El valor es requerido",
								maxlength: jQuery.validator.format("El valor no debe exceder de {0} caracteres."),
								minlength: jQuery.validator.format("El valor debe tener minimo {0} caracteres."),
							},
							direccion: {
								maxlength: jQuery.validator.format("El valor no debe exceder de {0} caracteres."),
								minlength: jQuery.validator.format("El valor debe tener minimo {0} caracteres."),
							},

						},
						highlight: function(element) {
							$(element).closest('.form-group').addClass('has-error');
						},
						unhighlight: function(element) {
							$(element).closest('.form-group').removeClass('has-error');
						},
						errorElement: 'span',
						errorClass: 'help-block',
					});

					if (form.valid()) {
						form = convertFormJsonData(form);
						$("#modal").modal('hide');
						$.ajax({
							type: "POST",
							url: "../Almacen/Vistas/Importacion/V_Importacion.php?accion=ajax&exec=insert",
							data: {
								proveedor: form
							},
							dataType: "json",
							beforeSend: function() {
								$.blockUI({
									message: null
								});
							},
							success: function(response) {
								document.getElementById('proveedor').value = response.provee_int_desc;
								document.getElementById('telefono_proveedor').value = response.provee_int_telf;
								document.getElementById('email_proveedor').value = response.provee_int_email;
								document.getElementById('direccion_proveedor').value = response.provee_int_direc;
								document.getElementById('proveedor_contacto').value = response.provee_int_contacto;
								document.getElementById('proveedor_contacto_telf').value = response.provee_int_telf2;
								//console.log(response);
							},
							complete: function() {
								$.unblockUI();
							},
							error: function(xhr) {
								$.unblockUI();
								//alert(xhr.responseText);
							}
						});
					}
				});
				break;
			case "listProveedores":
				parametros.ruta = "../Almacen/Vistas/Importacion/list_proveedores.php?accion=listProveedores";
				break;
		}

		if (typeof formulario !== "undefined") {
			$.ajax({
				url: parametros.ruta,
				type: "GET",
				cache: false,
				success: function(response) {
					$("#modal .modal-body").empty('').css({
						"min-heigth": "350px",
						"heigth": "auto",
					})
					$("#modal .modal-body").empty('').html(response);
				},
				complete: function() {
					if (formulario == "listProveedores") {

						var table = $(".table").DataTable({
							"ajax": {
								url: "../Almacen/vistas/Importacion/V_importacion.php?accion=ajax&buscar=listDataProveedores",
								type: "GET",
							},
							columns: [{
									'data': 'razonsocial'
								},
								{
									'data': 'contacto'
								},
								{
									'data': 'telf'
								},
								{
									'data': 'acciones'
								},
							],
							"processing": true,
							"serverSide": true,
						});

					}
				}
			});
		} else {
			$("#modal .modal-body").html('');
		}

	}

	function updateElementAsync(parametros) {
		$.ajax({
			url: parametros.ruta,
			type: "GET",
			cache: false,
			beforeSend: function() {
				$.blockUI({
					message: null
				});
			},
			success(response) {
				$.unblockUI();
				//console.log(eval(response));
				//Si la respuesta es vacia
				if (jQuery.isEmptyObject(response)) {
					var htmlOption = "<option value='' selected disabled>N/A</option>";
				} else {
					var htmlOption = "<option value='' selected disabled>Seleccione..</option>";
					//recorrer valores de respuesta y llenar el select
					$.each(response, function(index, data) {
						htmlOption += "<option value='" + data.id + "'>" + data.nombre + "</option>";
					});
				}
				if ($(parametros.elemento).hasClass('selectpicker')) {
					$(parametros.elemento).empty().html(htmlOption).selectpicker('refresh');
				}
			},
			error() {
				$.unblockUI();
			}
		});
	}

	function convertFormJsonData(form) {
		var formSerialized = form.serializeArray();
		var formDataObject = new Object();
		formSerialized.forEach(function(element) {
			formDataObject[element.name] = element.value;
		});
		//alert(JSON.stringify(formNewProvider));
		return formDataObject;
	}

	function loadProvider(id) {
		$("#modal").modal("hide");
		$.ajax({
			url: "../Almacen/Vistas/Importacion/V_Importacion.php?accion=ajax&buscar=getProvider&valor=" + id,
			// url: "../Almacen/vistas/Importacion/V_Importacion.php?accion=ajax&buscar=getProvider&valor=" + id,

			type: "GET",
			cache: false,
			beforeSend: function() {
				$.blockUI({
					message: null
				});
			},
			success: function(response) {
				document.getElementById('proveedor').value = response.provee_int_desc;
				document.getElementById('telefono_proveedor').value = response.provee_int_telf;
				document.getElementById('email_proveedor').value = response.provee_int_email;
				document.getElementById('direccion_proveedor').value = response.provee_int_direc;
				document.getElementById('proveedor_contacto').value = response.provee_int_contacto;
				document.getElementById('proveedor_contacto_telf').value = response.provee_int_telf2;
			},
			complete: function() {
				$.unblockUI();
			},
			error: function(xhr) {
				$.unblockUI();
			}
		});
	}


	var validarProductFormImport = function() {
		var form = $("#frm_product");
		form.validate({
			rules: {
				product_type: "required",
				brand: {
					required: {
						depends: function() {
							return ($("#product_type").val() != "") ? true : false;
						}
					}
				},
				model: {
					required: {
						depends: function() {
							return ($("#product_type").val() == 1 && $("#brand").val() != "");
						}
					}
				},
				product: {
					required: true
				},
				unit_price: {
					required: true,
					monto: true
				},
				product_qty: {
					required: true,
					number: true
				},
				discount: {
					monto: true
				},
				medida: {
					required: true
				},
				discount: {
					required: true,
					monto: true
				},
				amount_total: {
					required: true,
					monto: true
				}
			},
			messages: {
				product_type: {
					required: "Seleccione una opción"
				},
				brand: {
					required: "Seleccione una opción"
				},
				model: {
					required: "Seleccione una opción"
				},
				product: {
					required: "Seleccione una opción"
				},
				unit_price: {
					required: "Valor requerido"
				},
				product_qty: {
					required: "Valor Requerido",
					number: "Solo se permiten numeros"
				},
				discount: {
					required: "Valor requerido"
				},
				medida: {
					required: "Valor requerido"
				},
				amount_total: {
					required: "Valor obligatorio"
				}
			}
		});
		return form.valid();
	}
</script>
<!-- Seccion de Estilos y scripts -->