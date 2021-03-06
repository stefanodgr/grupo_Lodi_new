<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />
<style>
	#tbl_importaciones_detalle tbody tr {
		font-size: 0.85rem !important;
	}
</style>
<script src="js_sg/importacion.js?<?= substr(time(), -5) ?>" language="Javascript"></script>
<div class="row">
	<div class="col-md-12">
		<div class="pull-right">
			<a href="../Almacen/Index.php?menu=10" class="btn btn-primary">Regresar</a>
		</div>
	</div>
</div>
<div id="div_opc_tipo" class="col-md-12 col-xs-12 col-lg-6">
	<label class="radio-inline"><input type="radio" name="optradio" checked="checked" onclick="OptionStep(1);">
		<h5 class="azul">FOLIO </h5>
	</label>
	<label class="radio-inline"><input type="radio" name="optradio" onclick="OptionStep(2);">
		<h5 class="azul">PROVEEDORES </h5>
	</label>

	<label class="radio-inline"><input type="radio" name="optradio" onclick="OptionStep(3);">
		<h5 class="azul">PRODUCTO </h5>
	</label>
	<label class="radio-inline"><input type="radio" name="optradio" onclick="OptionStep(4);">
		<h5 class="azul">ORDEN </h5>
	</label>
	<label class="radio-inline"><input type="radio" name="optradio" onclick="OptionStep(5);">
		<h5 class="azul">SEGURO </h5>
	</label>
	<label class="radio-inline"><input type="radio" name="optradio" onclick="OptionStep(6);">
		<h5 class="azul">PAGO </h5>
	</label>
	<label class="radio-inline"><input type="radio" name="optradio" onclick="OptionStep(7);">
		<h5 class="azul">ADUANAS </h5>
	</label>
</div>
<br>
<br>
<hr>
<div id="div_general">
	<div id="div_folio" style="display:block;" class="panel panel-info">
		<div class="panel-heading">
			Folios
		</div>
		<div class="panel-body">
			<form action="" method="post">
				<div class="form-group">
					<div class="row">
						<div class="col-md-4">
							<label for="empresa"><small>Empresa:</small></label>
							<select name="empresa" id="empresa" class="form-control selectpicker show-tick" data-live-search='true'>
								<option value="" disabled selected>Seleccione..</option>
								<?php foreach ($dataEmpresa as $empresa) { ?>
								<option value="<?= $empresa->id ?>"><?= $empresa->nombre ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col-md-2">
							<label><small>Folio:</small></label>
							<div id="div_folios" class="input-group">
								<input id="xfolder" name="xfolder" type="text" class="form-control" placeholder="Ej: 2019" aria-describedby="basic-addon1" value="<?= date("Y") ?>">
								<span class="input-group-addon" id="basic-addon1">N??</span>
								<input id="xnrfolder" name="xnrfolder" type="text" class="form-control" placeholder="Folio" aria-describedby="basic-addon1">
							</div>
						</div>
						<div class="col-md-2">
							<label for="Incoterm"><small>Incoterm:</small></label>
							<select name="folio_incoterm" id="folio_incoterm" class="form-control " onclick="calcularIncoTerm();" required="required" data-live-search='true'>
								<option value="" disabled selected>Seleccione..</option>
								<option value="FOB">FOB</option>
								<option value="CFR">CFR</option>
							</select>
						</div>
						<div class="col-md-2">
							<label for="Incoterm"><small> Tipo de CTN:</small></label>
							<select name="folio_incoterm" id="folio_incoterm" class="form-control " required="required" data-live-search='true'>
								<option value="" disabled selected>Seleccione..</option>
								<option value="40HC">40HC</option>
							</select>
						</div>
						<div class="col-md-2">
							<label for="" class="control-label" style="padding-right:5px !important"><small>QTY CTN</small></label>
							<input type="text" id="folio_qty" name="folio_qty" class="form-control" onchange="calcularIncoTerm(this.value)">
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
						</div>
						<div class="col-md-3">
							<label for="marca"><small>Marca:</small></label>
							<select name="marca" id="marca" class="form-control selectpicker show-tick" data-live-search='true'>
								<option value="" disabled selected>--</option>
							</select>
						</div>
						<div class="col-md-3">
							<label for="empresa"><small>Pa??s:</small></label>
							<select name="pais" id="pais" class="form-control selectpicker show-tick" data-live-search='true'>
								<option value="" disabled selected>Seleccione..</option>
								<?php foreach ($dataPais as $pais) { ?>
								<option value="<?= $pais->id ?>"><?= $pais->nombre ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col-md-3">
							<label for="puerto"><small>Puerto:</small></label>
							<select name="puerto" id="puerto" class="form-control selectpicker show-tick" data-live-search='true'>
								<option value="" disabled selected>--</option>
							</select>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div id="div_proveedor" style="" class="panel panel-info">
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
							<label for="" class="control-label"><small>Direccion</small></label>
							<input type="text" class="form-control" readonly name="direccion_proveedor" id="direccion_proveedor">
						</div>
						<div class="col-md-4">
							<label for="" class="control-label" style="padding-right:5px !important"><small>Tel??fono</small></label>
							<input type="text" readonly id="telefono_proveedor" name="telefono_proveedor" class="form-control">
						</div>
						<div class="col-md-4">
							<label for="" class="control-label"><small>Correo</small></label>
							<input type="email" readonly id="email_proveedor" name="email_proveedor" class="form-control">
						</div>
						<div class="col-md-4">
							<label for="" class="control-label"><small>Contacto</small></label>
							<input type="text" readonly id="proveedor_contacto" name="proveedor_contacto" class="form-control">
						</div>
					</div>
			</form>
		</div>
	</div>
	<div id="div_producto" style="" class="panel panel-info">
		<div class="panel-heading">
			Productos
		</div>
		<div class="panel-body">
			<form id="frm_product" name="frm_product" method="post">
				<div class="form-group">
					<div class="row">
						<div id="div_product_type" class="col-md-4">
							<label for="" class="control-label"><small>Tipo Producto</small></label>
							<select name="product_type" id="product_type" class="form-control selectpicker show-tick" data-live-search="true">
								<option value="" disabled selected>Seleccione</option>
								<?php foreach ($dataTipoProducto as $tipoProd) : ?>
								<option value="<?= $tipoProd->id ?>"><?= $tipoProd->nombre ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div id="div_product_brand" class="col-md-4">
							<label for="" class="control-label"><small>Marca</small></label>
							<select name="brand" id="brand" class="form-control selectpicker show-tick" data-live-search="true">
								<option value="" selected disabled> -- </option>
							</select>
						</div>
						<div id="div_product_model" class="col-md-3" style="display:none">
							<label for="" class="control-label"><small>Modelo</small></label>
							<select name="model" id="model" class="form-control selectpicker show-tick" data-live-search="true">
								<option value="" selected disabled> -- </option>
							</select>
						</div>
						<div id="div_product" class="col-md-4">
							<label for="" class="control-label"><small>Producto</small></label>
							<select name="product" id="product" class="form-control selectpicker show-tick">
								<option value="" selected disabled> -- </option>
							</select>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-2">
							<label for="" class="control-label"><small>Precio Unitario</small></label>
							<input type="text" class="form-control" id="unit_price" name="unit_price">
						</div>
						<div class="col-md-2">
							<!-- SI  es SOLO PARA CUANTO TIPO DE PRODUCTO ES NEUMATICO -->
							<label for="" class="control-label"><small>Unidad de Medida</small></label>
							<input type="text" class="form-control" id="medida" name="medida">
						</div>
						<div class="col-md-3">
							<label for="" class="control-label"><small>Descuento</small></label>
							<input type="text" class="form-control" id="discount" name="discount">
						</div>
						<div class="col-md-2">
							<label for="" class="control-label"><small>Cantidad</small></label>
							<input type="text" class="form-control" id="product_qty" name="product_qty">
						</div>
					</div>
				</div>
				<hr>
				<br>
				<div class="form-group text-right">
					<button id="btn_addproduct" type="button" class="btn btn-primary">
						<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
					</button>
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
									<th>Sku</th>
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
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="div_orden" style="" class="panel panel-info">
		<div class="panel-heading">Orden</div>
		<div class="panel-body">
			<form name="frm_orden" id="frm_orden">

				<div class="row">
					<div class="col-md-2">
						<label class="control-label" for=""><small>#Orden</small></label>
						<input id="nro_orden" name="nro_orden" class="form-control" type="text">
					</div>
					<div class="col-md-2">
						<label class="control-label" for=""><small>Fecha/Compra</small></label>
						<input id="fecha_compra" name="fecha_compra" class="form-control" type="date">
					</div>
					<div class="col-md-2">
						<label class="control-label" for=""><small>#Proforma</small></label>
						<input id="nro_proforma" name="nro_proforma" class="form-control" type="text">
					</div>
					<div class="col-md-2">
						<label class="control-label" for=""><small>Fecha/Proforma</small></label>
						<input id="fecha_proforma" name="fecha_proforma" class="form-control" type="date">
					</div>
					<div class="col-md-2">
						<label class="control-label" for=""><small>#Factura</small></label>
						<input id="nro_factura" name="nro_factura" class="form-control" type="text">
					</div>
					<div class="col-md-2">
						<label class="control-label" for=""><small>Fecha/Factura</small></label>
						<input id="fecha_factura" name="fecha_factura" class="form-control" type="text">
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-2">
						<label class="control-label" for=""><small>FOB TOTAL</small></label>
						<input id="xordMontoTotal" name="xordMontoTotal" class="form-control" type="text" onchange="calcularCIF();PasarValorFob();">
					</div>
					<div class="col-md-2">
						<label class="control-label" for=""><small>FLETE/CONTENEDOR</small></label>
						<input id="xordFleteCNT" name="xordFleteCNT" class="form-control" type="text" onchange="calcularIncoTerm(this.value)">
					</div>
					<div class="col-md-2" style="">
						<label class="control-label"><small>CIF</small></label>
						<input type="text" readOnly class="form-control text-uppercase" name="xordCIF" id="xordCIF">
					</div>
					<div id="div_thc" class="col-md-2" style="">
						<label class="control-label"><small>THC</small></label>
						<input type="text" class="form-control text-uppercase" name="xordTHC" id="xordTHC" onchange="calcularIncoTerm(this.value)">
					</div>
					<div id="div_adv" class="col-md-2" style="">
						<label class="col-md-4"><small>ADV</small></label>
						<input type="text" class="form-control text-uppercase" name="xordADV" id="xordADV">
					</div>
					<div class="col-md-2">
						<label class="control-label" for=""><small>#BL</small></label>
						<input id="xordBl" name="xordBl" class="form-control" type="text">
					</div>


				</div>
				<br>
				<div class="row">
					<div class="col-md-2">
						<label class="control-label" for=""><small>#BL</small></label>
						<input id="xordBl" name="xordBl" class="form-control" type="text">
					</div>
					<div class="col-md-2">
						<label class="col-md-3" for=""><small>FORWARDER</small></label>
						<select name="fowarder" id="fowarder" class="form-control selectpicker show-tick" data-live-search='true'>
							<option value="" selected disabled>Seleccione</option>
							<?php foreach ($dataFowarder as $unFowarder) : ?>
							<option value="<?= $unFowarder->id ?>"><?= $unFowarder->nombre ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="col-md-3">
						<label class="col-md-3" for=""><small>TIPO/DESPACHO</small></label>
						<select name="tipo_despacho" id="tipo_despacho" class="form-control selectpicker show-tick" data-live-search='true'>
							<option value="" selected disabled>Seleccione</option>
							<option value="EXCEPCIONAL">EXCEPCIONAL</option>
						</select>
					</div>
					<div class="col-md-3">
						<label for="" class="col-md-2"><small>L??nea</small></label>
						<select name="linea" id="linea" class="form-control selectpicker show-tick" data-live-search='true'>
							<option value="" disabled selected>Seleccione</option>
							<?php foreach ($dataLinea as $linea) : ?>
							<option value="<?= $linea->id ?>"><?= $linea->nombre ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="col-md-2">
						<label for="" class="col-md-2"><small>Nave</small></label>
						<select name="nave" id="nave" class="form-control selectpicker show-tick" data-live-search='true'>
							<option value="" disabled selected>Seleccione</option>
						</select>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-2">
						<label for="" class="col-md-2"><small>ETD</small></label>
						<input id="etd" name="etd" type="date" class="form-control">
					</div>
					<div class="col-md-2">
						<label for="" class="col-md-3"><small>ETA</small></label>
						<input name="eta" id="eta" type="date" class="form-control">
					</div>
					<div class="col-md-2">
						<label for="" class="control-label"><small>Libre/Sobreestadia</small></label>
						<input type="date" id="libre_estadia" name="libre_estadia" class="form-control">
					</div>
					<div class="col-md-2">
						<label for="" class="control-label"><small>Libre/Almacenaje</small></label>
						<input type="date" name="libre_almacen" id="libre_almacen" class="form-control">
					</div>
					<div class="col-md-4">
						<label for="" class="col-md-4"><small>Almacen</small></label>
						<select name="almacen" id="almacen" class="form-control selectpicker showtick">
							<option value="" selected disabled>Seleccione</option>
							<?php foreach ($dataAlmacen as $almacen) ?>
							<option value="<?= $almacen->id ?>"><?= $almacen->nombre ?></option>
							<?php ?>
						</select>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div id="div_seguro" style="" class="panel panel-info">
		<div class="panel-heading">
			Seguro
		</div>
		<div class="panel-body">
			<form id="frm_seguro" name="frm_seguro">
				<legend>Datos de la p??liza</legend>
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
						<input type="text" class="form-control" id="referencia" name="referencia">
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
						<label for="nro_poliza" class="control-label"><small>#Poliza</small></label>
						<input type="text" class="form-control" name="nro_poliza" id="nro_poliza">
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-3">
						<label for="" class="control-label"><small>#Aplicaci??n</small></label>
						<input type="text" class="form-control" id="aplicacion" name="aplicacion">
					</div>
					<div class="col-md-3">
						<label for="" class="control-label"><small>#Tasa</small></label>
						<select name="seg_tasa" id="seg_tasa" class="form-control selectpicker show tick" onchange="calcularTasa();">
							<optgroup label="Nueva">
								<option value="">A??adir</option>
								</option-group>
							<optgroup label="Actuales">
								<option value="" selected disabled>Seleccione</option>
								<!-- Completar datos si vienen de BD -->
								<option value="0.12">0.12</option>
								</option-group>
						</select>
					</div>
					<div class="col-md-3">
						<label for="prima_neta" class="control-label"><small>#Prima Neta</small></label>
						<input type="text" class="form-control" id="seg_prima_neta" name="seg_prima_neta" onchange="calcularCIF();" ondblclick="calcularPrimaTotal();">
					</div>
					<div class=" col-md-3">
						<label for="prima_total" class="control-label"><small>#Prima Total</small></label>
						<input type="text" class="form-control" readonly id="seg_prima_total" name="seg_prima_total">
					</div>
				</div>

			</form>
		</div>
	</div>
	<div id="div_pago" style="" class="panel panel-info">
		<div class="panel-heading">
			Pagos Proveedores
		</div>
		<div class="panel-body">
			<form id="frm_seguro" name="frm_seguro">
				<legend>Datos del Pago</legend>
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

			</form>
		</div>
	</div>
	<div id="div_aduanas" style="" class="panel panel-info">
		<div class="panel-heading">
			Aduanas
		</div>
		<div class="panel-body">
			<form id="frm_seguro" name="frm_seguro">
				<legend>Datos de la Aduana</legend>
				<div class="row">
					<div class="col-md-4">
						<label for="prima_total" class="control-label"><small>AGENCIA DE ADUANAS</small></label>
						<!-- <input type="text" class="form-control" id="seg_fob_total" name="seg_fob_total" readonly onchange='calcularSumaAsegu();calcularTasa();'> -->
						<select name="folio_incoterm" id="folio_incoterm" class="form-control selectpicker show-tick " data-live-search='true'>
							<option value="" disabled selected>Seleccione..</option>
							<option value="FOB">SALINAS & CASARETTO</option>
							<!-- <option value="CFR">CFR</option> -->
						</select>
					</div>
					<div class="col-md-4">
						<label for="prima_total" class="control-label"><small>#DUA</small></label>
						<input type="text" class="form-control" id="seg_flete_total" name="seg_flete_total">
					</div>
					<div class="col-md-4">
						<label for="prima_total" class="control-label"><small>FECHA DE NUMERACION</small></label>
						<input type="date" class="form-control" id="seg_suma_aseg" name="seg_suma_aseg">
					</div>
					<div class="col-md-4">
						<label for="prima_total" class="control-label"><small>CANAL</small></label>
						<select name="folio_incoterm" id="folio_incoterm" class="form-control selectpicker " data-live-search='true'>
							<option value="" disabled selected>Seleccione..</option>
							<option value="FOB">VERDE</option>
							<option value="CFR">ROJO</option>
							<option value="FOB">NARANJA</option>
						</select>
					</div>
					<div class="col-md-4">
						<label for="prima_total" class="control-label"><small>FECHA DE INGRESO ALMACEN</small></label>
						<input type="date" class="form-control" id="seg_suma_aseg" name="seg_suma_aseg">
					</div>
					<div class="col-md-4">
						<label for="" class="control-label"><small>#CONTENEDOR</small></label>
						<input type="text" class="form-control" id="referencia" name="referencia">
					</div>
				</div>
			</form>
		</div>
	</div>

</div>
<!-- Aqui incluyo el html basico del modal -->
<?php include_once("modal.php"); ?>
<!-- /Aqui incluyo el html basico del modal -->


<script>
		$(document).ready(function() {

		jQuery.validator.addMethod("alpha_space", function(value, element) {
			return this.optional(element) || /^[a-z????????????A-Z???????????? ]+$/i.test(value);
		}, "Solo se permiten letras y espacios");

		jQuery.validator.addMethod("monto", function(value, element) {
			return this.optional(element) || /^(\d+|\d+.\d{1,2})$/.test(value);
		}, "Formato incorrecto, Ej: 1234.56");

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


		// $("#div_general").steps({
		// 	headerTag: "h5",
		// 	bodyTag: "section",
		// 	transitionEffect: "slideLeft",
		// 	onStepChanging: function(event, currentIndex, newIndex) {
		// 		switch (currentIndex) {
		// 			case 0:
		// 				var form = $("#frm_folios");
		// 				form.validate({
		// 					rules: {
		// 						empresa: "required",
		// 						xfolder: {
		// 							required: true,
		// 							minlength: 4,
		// 							maxlength: 4,
		// 							number: true,
		// 						},
		// 						xnrfolder: {
		// 							required: true,
		// 						},
		// 						incoterm: "required",
		// 						type_ctn: "required",
		// 						qty_ctn: {
		// 							required: true,
		// 							number: true
		// 						},
		// 						tipo_pr: "required",
		// 						marca: "required",
		// 						pais: "required",
		// 						// puerto: "required"
		// 					},
		// 					messages: {
		// 						empresa: "Seleccione una opci??n",
		// 						xfolder: {
		// 							required: "El a??o de Folio es requerido",
		// 							minlength: jQuery.validator.format("El campo debe tener {0} Digitos"),
		// 							maxlength: jQuery.validator.format("El campo no debe exceder de {0} Digitos"),
		// 							number: "El formato debe ser num??rico",

		// 						},
		// 						xnrfolder: {
		// 							required: "El N?? de Folio	 es requerido",
		// 						},
		// 						incoterm: "Seleccione una opci??n",
		// 						type_ctn: "Seleccione una opci??n",
		// 						qty_ctn: {
		// 							required: "El valor es requerido",
		// 							number: "El formato es solo numerico"
		// 						},
		// 						tipo_pr: "Seleccione una opci??n",
		// 						marca: "Seleccione una opci??n",
		// 						pais: "Seleccione una opci??n",
		// 						// puerto: "Seleccione una opci??n",
		// 					}
		// 				}).settings.ignore = ":disabled,:hidden";
		// 				return true;
		// 				//return form.valid();
		// 				break;
		// 			case 1:
		// 				var form = $("#frm_proveedor");
		// 				form.validate({
		// 					rules: {
		// 						proveedor: {
		// 							required: true,
		// 							alpha_space: true
		// 						},
		// 						direccion: {
		// 							required: true,
		// 							alpha_space: true
		// 						},
		// 					},
		// 					messages: {
		// 						proveedor: {
		// 							required: "Seleccione o cree el proveedor",
		// 						},
		// 						direccion: {
		// 							required: "Indique la Direccion del Proveedor"
		// 						},

		// 					}
		// 				});
		// 				//return form.valid();
		// 				return true;
		// 				break;
		// 			case 2:
		// 				jQuery.validator.addMethod("monto", function(value, element) {
		// 					return this.optional(element) || /^(\d+|\d+.\d{1,2})$/.test(value);
		// 				}, "Formato incorrecto, Ej: 1234.56");
		// 				form = $("#frm_orden");
		// 				form.validate({
		// 					rules: {
		// 						xordTHC: {
		// 							required: {
		// 								depends: function() {
		// 									return ($("#incoterm").val() == "CFR") ? true : false;
		// 								}
		// 							}
		// 						},
		// 						xordADV: {
		// 							required: {
		// 								depends: function() {
		// 									return ($("#incoterm").val() == "FOB") ? true : false;
		// 								}
		// 							}
		// 						},
		// 						nro_orden: {
		// 							required: true,
		// 							number: true
		// 						},
		// 						fecha_compra: {
		// 							required: true,
		// 							date: true
		// 						},
		// 						nro_proforma: {
		// 							required: true,
		// 							alphanumeric: true
		// 						},
		// 						fecha_proforma: {
		// 							required: true,
		// 							date: true
		// 						},
		// 						nro_factura: {
		// 							required: true,
		// 							alphanumeric: true,
		// 						},
		// 						fecha_factura: {
		// 							required: true,
		// 							date: true
		// 						},
		// 						xordMontoTotal: {
		// 							required: {
		// 								depends: function() {
		// 									return $("#tbl_importaciones_detalle tbody tr").length == 0 ? true : false;
		// 								}
		// 							},
		// 							monto: true
		// 						},
		// 						flete_contenedor: {
		// 							required: true,
		// 							monto: true
		// 						},
		// 						xordBl: {
		// 							required: true,
		// 							alphanumeric: true
		// 						},
		// 						fowarder: {
		// 							required: true
		// 						},
		// 						tipo_despacho: {
		// 							required: true
		// 						},
		// 						linea: {
		// 							required: true
		// 						},
		// 						nave: {
		// 							required: true
		// 						},
		// 						etd: {
		// 							required: true,
		// 							date: true
		// 						},
		// 						eta: {
		// 							required: true,
		// 							date: true
		// 						},
		// 						libre_estadia: {
		// 							required: true,
		// 							date: true
		// 						},
		// 						libre_almacen: {
		// 							required: true,
		// 							date: true
		// 						},
		// 						almacen: {
		// 							required: true
		// 						}
		// 					},
		// 					messages: {
		// 						xordTHC: {
		// 							required: "Valor Requerido"
		// 						},
		// 						xordADV: {
		// 							required: "Valor Requerido"
		// 						},
		// 						nro_orden: {
		// 							required: "Valor Requerido"
		// 						},
		// 						fecha_compra: {
		// 							required: "Valor Requerido",
		// 							date: "Indique una fecha v??lida"
		// 						},
		// 						nro_proforma: {
		// 							required: "Valor Requerido",
		// 							alphanumeric: "Solo se permiten letras y numeros",
		// 						},
		// 						fecha_proforma: {
		// 							required: "Valor Requerido",
		// 							date: "Indique una fecha v??lida"
		// 						},
		// 						nro_factura: {
		// 							required: "Valor Requerido",
		// 							alphanumeric: "Solo se permiten letras y numeros",
		// 						},
		// 						fecha_factura: {
		// 							required: "Valor Requerido",
		// 							date: "Indique una fecha v??lida"
		// 						},
		// 						xordMontoTotal: {
		// 							required: "Ingrese los productos a importar",
		// 						},
		// 						flete_contenedor: {
		// 							required: "valor requerido",
		// 						},
		// 						xordBl: {
		// 							required: "Valor Requerido",
		// 							alphanumeric: "Solo se permiten letras y numeros"
		// 						},
		// 						fowarder: {
		// 							required: "Seleccione una opci??n"
		// 						},
		// 						tipo_despacho: {
		// 							required: "Seleccione una opci??n"
		// 						},
		// 						linea: {
		// 							required: "Valor Requerido"
		// 						},
		// 						nave: {
		// 							required: "Valor Requerido"
		// 						},
		// 						etd: {
		// 							required: "Valor Requerido",
		// 							date: "formato de fecha invalido"
		// 						},
		// 						eta: {
		// 							required: "Valor Requerido",
		// 							date: "formato de fecha invalido"
		// 						},
		// 						libre_estadia: {
		// 							required: "Valor Requerido",
		// 							date: "Formato de fecha invalido"
		// 						},
		// 						libre_almacen: {
		// 							required: "Valor Requerido",
		// 							date: "Formato de fecha invalido"
		// 						},
		// 						almacen: {
		// 							required: "Valor Requerido"
		// 						}
		// 					}
		// 				}).settings.ignore = ":disabled";
		// 				if (!form.valid()) {
		// 					if (confirm("Desea Continuar?")) {
		// 						return true;
		// 					}
		// 				}
		// 				break;
		// 			case 3:
		// 				//return validarProductFormImport();
		// 				return true;
		// 				break;
		// 			case 4:
		// 				return true;
		// 				break;
		// 			case 5:
		// 				return true;
		// 				break;
		// 			case 6:
		// 				return true
		// 				break;
		// 		}
		// 	},
		// }).validate({
		// 	errorPlacement: function errorPlacement(error, element) {
		// 		element.before(error);
		// 	},
		// 	rules: {
		// 		empresa: "required"
		// 	},
		// 	messages: {
		// 		empresa: "Por Favor seleccione una opcion"
		// 	}
		// });

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
					required: "Seleccione una opci??n"
				},
				brand: {
					required: "Seleccione una opci??n"
				},
				model: {
					required: "Seleccione una opci??n"
				},
				product: {
					required: "Seleccione una opci??n"
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




	function sumar(valor) {
		var total = 0;
		valor = parseFloat(valor); // Convertir el valor a un entero (n??mero).

		total = document.getElementById('spTotal').innerHTML;

		// Aqu?? valido si hay un valor previo, si no hay datos, le pongo un cero "0".
		// total = (total == null || total == undefined || total == "") ? 0 : total;

		/* Esta es la suma. */
		total = (parseInt(total) + parseInt(valor));

		// Colocar el resultado de la suma en el control "span".
		document.getElementById('spTotal').innerHTML = total;
	}

	</script>