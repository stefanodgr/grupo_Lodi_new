
let suma = (num1, num2) => (parseFloat(num1) + parseFloat(num2)).toFixed('2')
let resta = (num1, num2) => (parseFloat(num1) - parseFloat(num2)).toFixed('2')
let multiplicar = (num1, num2) => (parseFloat(num1) * parseFloat(num2)).toFixed('2')
//Archivo.js para importaciones
$(document).ready(function(){
	$(":input").each(function(){
        $(this).attr('required',true);
		});
		
	// setTimeout(function () {
	// 	$('#horizontal-stepper').nextStep();
	// }, 2000);

	$("select").on('change',function(){
		$(this).each(function(){
			if(hasAttr(this,'data-ajax')){
				var valor = $(this).val();
				var id = $(this).attr('id'); 
				switch (id){
					case "tipo_pr":
					case "product_type":
						var url = "../Almacen/ajax/importacion.php?accion=ajax&buscar=marca&valor="+valor;
						execAjax(url, "GET", null, llenarSelect, (id =="tipo_pr")? "#marca" :"#brand");
						break;
					case "brand":
						var params = {
							valor:valor,
							pais_id: document.querySelector("#pais").value,
							produ_clasi_id: document.querySelector("#product_type").value,
						}
						var url = "../Almacen/ajax/importacion.php?accion=ajax&buscar=modelo&valor="+JSON.stringify(params);
						//execAjax(url,"GET",null,llenarSelect,"#model");
						break;
					case "pais":
						var url = "../Almacen/ajax/importacion.php?accion=ajax&buscar=puerto&valor="+valor;
						execAjax(url,"GET",null,llenarSelect,"#puerto");
						break;
					case "linea":
						var url = "../Almacen/ajax/importacion.php?accion=ajax&buscar=nave&valor="+valor;
						execAjax(url,"GET",null,llenarSelect,"#nave");
						break;
				}
			}else{
				switch ($(this).attr('id')) {
					case "seg_tasa":
						calcularPrimas();
						break;
				
					default:
						break;
				}
				if($(this).val() == -1){
					//abrir modal
					var elemento = "#" + $(this).attr('id');
					openModal(elemento,true);
				}
			}
			return false;
		});
	});

	$("#modal #btn_save").on('click',function(){
		if ($(".modal-body").find('form').length){
			validateForm($(".modal-body").find('form').attr('id'),event);
		}
		
	});

	$("#btn_addProvider").on('click',function(){
		openModal("#btn_addProvider",true);
	});

	$("#btn_addProducto").on('click',function(){
		openModal("#btn_addProducto",true);
	});

	$("#proveedor").on('dblclick',function(){
		openModal("#proveedor",false);
	});

	$("#produVenta").on('dblclick', function () {
		openModal("#produVenta", false);
	});

	$("#product").on('dblclick', function () {
		$(this).attr('readonly',true);
		openModal("#produVenta", false);
	});

	$("#btn_saveOrder").unbind("click");
	$("#btn_saveOrder").on('click',function(e){
		validateForm("frm_orden",e);
	});

	
	
});

var divOcul = function(opc){
		switch(opc){
			case '1':
        document.getElementById("div_consul").style.display     = "none";
        document.getElementById("div_form").style.display       = "block";
        document.getElementById("div_linea").style.display      = "block";
        
        document.getElementById("div_btn_impor").style.display  = "none";
        document.getElementById("titulo2").style.display        = "block";
        document.getElementById("titulo").style.display         = "none";
				break;
		}
}


function hasAttr(element,attr){
	return typeof $(element).attr(attr) !== 'undefined';
}

/**
* Funcion ajax para consultar cosas asincronas en BD
* @ruta = string // Url a llamar
*
*/


var execAjax = function(ruta,method = "GET",params=null,cFunction,elemento){
	$.ajax({
		url:ruta,
		type:method,
		data: (params !=null) ? params : "",
		datatype:"json",
		success(response){
			cFunction(elemento,response);
		}
	});
}

function llenarSelect(elemento,data){	
	var htmlOPtions = "<optgroup label='Nuevo'><option value='-1'> Crear Nuevo </option></optgroup>";
	htmlOPtions += "<optgroup label='Existentes'><option value='' selected> ---- </option>";
	//validacion para la consulta de modelos disponibles
	if (typeof data.data !== "undefined"){
		if (document.querySelector("#div_product_type") != null){
			document.querySelector("#div_product_type").classList.remove('col-md-4');
			document.querySelector("#div_product_type").classList.add('col-md-3');
			document.querySelector("#div_product_brand").classList.remove('col-md-4');
			document.querySelector("#div_product_brand").classList.add('col-md-3');
				document.querySelector("#div_product").classList.remove('col-md-4');
				document.querySelector("#div_product").classList.add('col-md-3');
				// document.querySelector("#div_product_model").style.display="block";
		}
		
		
	}else{
		if (document.querySelector("#div_product_type") != null) {
		document.querySelector("#div_product_type").classList.remove('col-md-3');
		document.querySelector("#div_product_type").classList.add('col-md-4');
		document.querySelector("#div_product_brand").classList.remove('col-md-3');
		document.querySelector("#div_product_brand").classList.add('col-md-4');
			document.querySelector("#div_product").classList.remove('col-md-3');
			document.querySelector("#div_product").classList.add('col-md-4');
			// document.querySelector("#div_product_model").style.display="none";
		}

	}
	data = (typeof data.data !=="undefined") ? data.data : data;
	$.each(data,function(index,value){
		htmlOPtions += "<option value='"+value.id+"'>"+value.nombre+"</option>";
	});
	htmlOPtions+="</optgroup>";
	$(elemento).html(htmlOPtions);	
}

function llenarModal(elemento,data){
	$(elemento).empty().html(data);
}

/*async function buildDataTable(){
	const modal = execAjax(ruta, "GET", null, llenarModal, "#modal .modal-body");
}//*/

async function openModalDataTable(ruta){
	return $("#tbl_proveedores").length == 1;
}

/**
 * 
 * @param {*} elemento id del elemento
 * @param {*} form booleano
 */
function openModal(elemento,form = false){
	$("#modal .modal-body").empty('').css({
		"min-heigth": "350px",
		"heigth": "auto",
	});

	$("#modal .modal-header").html('');
	$(".modal-footer #btn_save").show();


	var ruta = "../Almacen/";

	switch (elemento) {
		case "#marca":
			if(form){
				ruta +="Vistas/Importacion/forms/form_marca.php";
			}
			execAjax(ruta,"GET",null,llenarModal,"#modal .modal-body");
			break;
		case "#model":
			if (form) {
				var pais = document.querySelector("#pais").value;
				var product_type = document.querySelector("#product_type").value;
				var brand = document.querySelector("#brand").value;
				ruta += `Vistas/Importacion/forms/form_modelo.php?p=${pais}&tp=${product_type}&b=${brand}`;
			}
			execAjax(ruta, "GET", null, llenarModal, "#modal .modal-body");
			break;
		case "#puerto":
			if(form){
				ruta +="Vistas/Importacion/forms/form_puerto.php";
			}
			execAjax(ruta,"GET",null,llenarModal,"#modal .modal-body");
			break;
		case "#btn_addProvider":
			if(form){
				ruta +="Vistas/Importacion/forms/form_proveedores.php";
			}
			execAjax(ruta,"GET",null,llenarModal,"#modal .modal-body");
			break;
		case "#proveedor":
			if(!form){
				ruta +="Vistas/Importacion/list_proveedores.php";
				$(".modal-footer #btn_save").hide();
				//openModalDataTable().then($("#tbl_proveedores").DataTable());
				execAjax(ruta,"GET",null,llenarModal,"#modal .modal-body");
				setTimeout(() => {
					var table = $("#tbl_proveedores").DataTable({
						"ajax": {
							url: "../Almacen/ajax/importacion.php?accion=ajax&buscar=listDataProveedores",
							type: "GET",
						},
						columns: [{
							'data': 'razonsocial'
						},
						{
							'data': 'telf'
						},
									{
										'data': 'contacto'
									},
						{
							'data': 'acciones'
						},
						],
						"processing": true,
						"serverSide": true,
					});
				}, 800);
			
			}
			break;
		case "#btn_addProducto":
			if (form) {
				ruta += "Vistas/Importacion/forms/form_proveedores.php";
			}
			execAjax(ruta, "GET", null, llenarModal, "#modal .modal-body");
			break;
		case "#produVenta":
			if (!form) {
				var product_type = $("#product_type").val();
				ruta += "Vistas/Importacion/list_product.php";
				$(".modal-footer #btn_save").hide();
				//openModalDataTable().then($("#tbl_proveedores").DataTable());
				execAjax(ruta, "GET", null, llenarModal, "#modal .modal-body");
				setTimeout(() => {
					var table = $("#tbl_proveedores").DataTable({
						"ajax": {
							url: "../Almacen/ajax/importacion.php?accion=ajax&buscar=listProducts&valor=" + product_type,
							type: "GET",
						},
						columns: [{
							'data': 'sku'
						},
						{
							'data': 'nombre'
						},
						{
							'data': 'marca'
						},
						{
							'data': 'modelo'
						},
						{
							'data': 'acciones'
						},
						],
						"lengthMenu": [2, 4, 10, 20 , 50 ,80, 100],
						"processing": true,
						"serverSide": true,
						initComplete: function () {
							this.api().columns().every(function () {
								var column = this;
								var select = $('<select class="form-control"><option value=""></option></select>')
									.appendTo($(column.footer()).empty())
									.on('change', function () {
										var val = $.fn.dataTable.util.escapeRegex(
											$(this).val()
										);

										column
											.search(val ? '^' + val + '$' : '', true, false)
											.draw();
									});

								column.data().unique().sort().each(function (d, j) {
									select.append('<option value="' + d + '">' + d + '</option>')
								});
							});
						}
					});
				}, 800);
			}
			//alert("*---->NO ABRE MODAL Xd");
			break;
	
		default:
			break;
	}
	$("#modal").modal("show");
}

function convertFormJsonData(form) {
	var formSerialized = form.serializeArray();
	var formDataObject = new Object();
	formSerialized.forEach(function (element) {
		formDataObject[element.name] = element.value.trim();
	});
	//alert(JSON.stringify(formNewProvider));
	return formDataObject;
}

function validateForm(form,e){
	$("#" + form).on('submit', function () {
		$("#" + form + " :input").each(function () {
			if (hasAttr(this, "required") && $(this).val() == "") {
				$(this).parent().addClass('has-error');
			} else if (hasAttr(this, "required") && $(this).val() != "") {
				$(this).parent().removeClass('has-error');
			}
		});
		return false;
	});//;.submit();
	var formData = convertFormJsonData($("#" + form));
	var parametros = {
		ruta:$("#"+form).attr('action'),
		form: formData,
		element: "#" + form
	}
	//console.log(parametros);
	//return false;
	processDataForm(parametros);
	//e.preventDefault();
}

function processDataForm(parametros){
	$.ajax({
		url: parametros.ruta,
		data:parametros.form,
		type:"POST",
		beforeSend(){
			$("#btn_save").prop("disabled",true);
			if (parametros.element == "#frm_orden" || parametros.element =="#frm_payment_history"){
				$(".modal-body").empty().html("<h5>Estamos procesano su información</h5>");
				$(".modal-footer .loading").css("display","inline-block");
				$("#modal").modal("show");
			}
		},
		success(response){
			if(response.code == 200){
				$(".modal-footer .loading").css("display","none");
				$(".modal-footer").find("span.text-danger").remove();
				$(".modal-body").empty().html("<h5>"+response.message+"</h5>");
				
				if (parametros.element == "#frm_marca") {
					var url = "../Almacen/ajax/importacion.php?accion=ajax&buscar=marca&valor=" + response.data.produ_clasi_id;
					execAjax(url, "GET", null, llenarSelect, "#marca");
					$("#marca").val(response.data.mar_id);
				}
				if (parametros.element == "#frm_modelo") {
					var url = "../Almacen/ajax/importacion.php?accion=ajax&buscar=modelo&valor=" + response.data.mar_id;
					execAjax(url, "GET", null, llenarSelect, "#modelo");
					$("#modelo").val(response.data.mod_id);
				}
				if (parametros.element == "#frm_puerto") {
					var url = "../Almacen/ajax/importacion.php?accion=ajax&buscar=puerto&valor=" + response.data.pais_id;
					execAjax(url, "GET", null, llenarSelect, "#puerto");
					$("#puerto").val(response.data.puerto_id);
				}
				if (parametros.element == "#frm_provider") {
					//var url = "../Almacen/ajax/importacion.php?accion=ajax&buscar=puerto&valor=" + response.data.pais_id;
					$("#proveedor").val(response.data.provee_int_desc);
					$("#provee_int_id").val(response.data.provee_int_id);
				}
			}
		},
		complete(){
			$("#btn_save").prop("disabled", false);
			$(".modal-footer .loading").css("display", "none");
			setTimeout(() => {
				$("#modal .modal-body").empty();
				$("#modal").modal("hide");
				if (parametros.element == "#frm_orden") {
					window.location.reload(true);
				}
				if (parametros.element == "#frm_payment_history") {
					//window.location.href ="../Almacen/index.php?menu=13";
				}
			}, 2500);
		}
	});
}

function loadProvider(id) {
	$("#modal").modal("hide");
	$.ajax({
		url: "../Almacen/ajax/importacion.php?accion=ajax&buscar=getProvider&valor=" + id,
		// url: "../Almacen/vistas/Importacion/V_Importacion.php?accion=ajax&buscar=getProvider&valor=" + id,

		type: "GET",
		cache: false,
		beforeSend: function () {
			$.blockUI({
				message: null
			});
		},
		success: function (response) {
			document.getElementById('proveedor').value = response.data.provee_int_desc;
			document.querySelector("#provee_int_id").value=response.data.provee_int_id;
		},
		complete: function () {
			$.unblockUI();
		},
		error: function (xhr) {
			$.unblockUI();
		}
	});
}

function loadProduct(id) {
	$("#modal").modal("hide");
	$.ajax({
		url: "../Almacen/ajax/importacion.php?accion=ajax&buscar=getProduct&valor=" + id,
		// url: "../Almacen/vistas/Importacion/V_Importacion.php?accion=ajax&buscar=getProvider&valor=" + id,

		type: "GET",
		cache: false,
		beforeSend: function () {
			$.blockUI({
				message: null
			});
		},
		success: function (response) {
			document.getElementById('product').value = response.data.nombre;
			document.querySelector("#produ_id").value=response.data.id;
			console.log(response.data);
		},
		complete: function () {
			$.unblockUI();
		},
		error: function (xhr) {
			$.unblockUI();
		}
	});
}



function OptionStepFolio(opc) {
	if (opc == '1') {                       //
		// alert('1');
		document.getElementById("div_folio").style.display = "block";
		document.getElementById("div_pro").style.display = "none";
		document.getElementById("div_produ").style.display = "none";
		document.getElementById("div_ord").style.display = "none";
		document.getElementById("div_seg").style.display = "none";
		document.getElementById("div_pag").style.display = "none";
		document.getElementById("div_adu").style.display = "none";
	}
	if (opc == '2') {                       //
		//  alert('2');
		document.getElementById("div_folio").style.display = "none";
		document.getElementById("div_pro").style.display = "block";
		document.getElementById("div_produ").style.display = "none";
		document.getElementById("div_ord").style.display = "none";
		document.getElementById("div_seg").style.display = "none";
		document.getElementById("div_pag").style.display = "none";
		document.getElementById("div_adu").style.display = "none";
	}
	if (opc == '3') {                       //
		// alert('3');
		document.getElementById("div_folio").style.display = "none";
		document.getElementById("div_pro").style.display = "none";
		document.getElementById("div_produ").style.display = "block";
		document.getElementById("div_ord").style.display = "none";
		document.getElementById("div_seg").style.display = "none";
		document.getElementById("div_pag").style.display = "none";
		document.getElementById("div_adu").style.display = "none";
	}
	if (opc == '4') {                       //
		// alert('4');
		document.getElementById("div_folio").style.display = "none";
		document.getElementById("div_pro").style.display = "none";
		document.getElementById("div_produ").style.display = "none";
		document.getElementById("div_ord").style.display = "block";
		document.getElementById("div_seg").style.display = "none";
		document.getElementById("div_pag").style.display = "none";
		document.getElementById("div_adu").style.display = "none";
	}

	if (opc == '5') {
		//alert('5');
		document.getElementById("div_folio").style.display = "none";
		document.getElementById("div_pro").style.display = "none";
		document.getElementById("div_produ").style.display = "none";
		document.getElementById("div_ord").style.display = "none";
		document.getElementById("div_seg").style.display = "block";
		document.getElementById("div_pag").style.display = "none";
		document.getElementById("div_adu").style.display = "none";
	}

	if (opc == '6') {                       //
		// alert('6');
		document.getElementById("div_folio").style.display = "none";
		document.getElementById("div_pro").style.display = "none";
		document.getElementById("div_produ").style.display = "none";
		document.getElementById("div_ord").style.display = "none";
		document.getElementById("div_seg").style.display = "none";
		document.getElementById("div_pag").style.display = "block";
		document.getElementById("div_adu").style.display = "none";
	}
	if (opc == '7') {                       //
		// alert('7');
		document.getElementById("div_folio").style.display = "none";
		document.getElementById("div_pro").style.display = "none";
		document.getElementById("div_produ").style.display = "none";
		document.getElementById("div_ord").style.display = "none";
		document.getElementById("div_seg").style.display = "none";
		document.getElementById("div_pag").style.display = "none";
		document.getElementById("div_adu").style.display = "block";
	}
}


function sumar(valor) {
	var total = 0;
	valor = parseFloat(valor); // Convertir el valor a un entero (número).
	total = document.getElementById('spTotal').innerHTML;
	// Aquí valido si hay un valor previo, si no hay datos, le pongo un cero "0".
	// total = (total == null || total == undefined || total == "") ? 0 : total;
	/* Esta es la suma. */
	total = (parseInt(total) + parseInt(valor));
	// Colocar el resultado de la suma en el control "span".
	document.getElementById('spTotal').innerHTML = total;
}

function returnDataAsycn(data){
	return data;
}

if (document.querySelector("#frm_product") !=null){
	var frm_product = document.querySelector("#frm_product");
	frm_product.addEventListener('submit',function(ev){
		ev.preventDefault();
		llenarTabla("#tbl_importaciones_detalle");
	});
}

if (document.querySelector("#product_qty") !=null){
	document.querySelector("#product_qty").addEventListener('input',function() {
		var unit_price = document.querySelector("#unit_price").value;
		var product_qty = this.value;
		var discount = document.querySelector("#discount").value / 100;
		var bi = multiplicar(unit_price, product_qty);
		var total_line = resta(bi,multiplicar(bi,discount));
		document.querySelector("#total_amount").value = total_line;
	});
}

if (document.querySelector("#unit_price") != null) {
	document.querySelector("#unit_price").addEventListener('input', function () {
		var unit_price = this.value; document.querySelector("#unit_price").value;
		var product_qty = document.querySelector("#product_qty").value;
		var discount = document.querySelector("#discount").value / 100;
		var bi = multiplicar(unit_price, product_qty);
		var total_line = resta(bi, multiplicar(bi, discount));
		document.querySelector("#total_amount").value = total_line;
	});
}

if (document.querySelector("#discount") != null) {
	document.querySelector("#discount").addEventListener('input', function () {
		var unit_price = document.querySelector("#unit_price").value;
		var product_qty = document.querySelector("#product_qty").value;
		var discount = this.value / 100;//document.querySelector("#discount").value / 100;
		var bi = multiplicar(unit_price, product_qty);
		var total_line = resta(bi, multiplicar(bi, discount));
		document.querySelector("#total_amount").value = total_line;
	});
}

if (document.querySelector("#xordMontoTotal") !=null){
	document.querySelector("#xordMontoTotal").addEventListener('change',function(){
		fleteTotal();
		
		//xordCIF.value = multiplicar(total_flete, qty_ctn);
	});
}

if (document.querySelector("#xordFleteCNT") !=null){
	document.querySelector("#xordFleteCNT").addEventListener('input',function(){
		fleteTotal();
	});
}

if (document.querySelector("#fleteTotal") !=null){
	document.querySelector("#fleteTotal").addEventListener('input',function(){
		fleteTotal();		
	});
}



let calcularCIF = ()=>{
	let xordCIF = document.querySelector("#xordCIF").value;
	let xordMontoTotal = document.querySelector("#xordMontoTotal").value;
	let fleteTotal = document.querySelector("#xordTotalFlete").value;
	let tasa = 0;
	document.querySelector("#xordCIF").value = suma(suma(xordMontoTotal, fleteTotal), tasa);
	let seg_fob_total = document.querySelector("#seg_fob_total");
	let seg_flete_total = document.querySelector("#seg_flete_total");
	seg_fob_total.value = xordMontoTotal; 
	seg_flete_total.value = fleteTotal;
	totalPoliza();
	document.querySelector("#deuda_total").value = seg_fob_total.value;
	document.querySelector("#saldo_pendiente").value = seg_fob_total.value;
}
let PasarValorFob = ()=>{}
let calcularTasa = ()=> {}
let calcularIncoTerm = () => {}
let calcularPrimas = ()=> {
	let seg_tasa = document.querySelector("#seg_tasa").value;
	let seg_suma_aseg = document.querySelector("#seg_suma_aseg").value;
	let seg_prima_total = document.querySelector("#seg_prima_total").value;
	let primaNeta = multiplicar(seg_suma_aseg, seg_tasa);
	const tasaFin = 0.03;
	document.querySelector("#seg_prima_neta").value = primaNeta;
	let valorPrimaTotal = multiplicar(suma(suma(multiplicar(primaNeta, tasaFin), primaNeta), suma(multiplicar(primaNeta, tasaFin), primaNeta)),0.18);
	document.querySelector("#seg_prima_total").value = valorPrimaTotal;
}

let fleteTotal = () => {
	let monto_FOB = document.querySelector("#xordMontoTotal").value;
	let flete = document.querySelector("#xordFleteCNT").value;
	let qty_ctn = document.querySelector("#folio_qty").value;
	let xordCIF = document.querySelector("#xordCIF").value;
	let xordTHC = document.querySelector("#xordTHC").value;
	let folio_incoterm = document.querySelector("#folio_incoterm").value;
	let xordTotalFlete = document.querySelector("#xordTotalFlete").value;
	// alert(folio_incoterm);
	if (folio_incoterm == "FOB") {
		xordTotalFlete = multiplicar(qty_ctn, flete);
	} else if (folio_incoterm == "CFR") {
		xordTotalFlete = multiplicar(suma(qty_ctn, xordTHC), flete);
	}
	document.querySelector("#xordTotalFlete").value = xordTotalFlete;
	calcularCIF();
}

let totalPoliza = () => {
	let seg_fob_total = document.querySelector("#seg_fob_total").value;
	let seg_flete_total = document.querySelector("#seg_flete_total").value;
	document.querySelector("#seg_suma_aseg").value = suma(seg_fob_total, seg_flete_total);
}


if (document.querySelector("#xordMontoTotal").value != "" || document.querySelector("#xordMontoTotal").value.length > 0 ){
	calcularCIF();
}

let amount_line = 0;
let total_discount = 0;
let total_amount_payable = 0;
function llenarTabla(tabla){
	var htmlRows = "<tr>";
	var htmlCells = "";
		switch (tabla) {
			case "#tbl_importaciones_detalle":
				var form = document.querySelector("#frm_product");
				var nro_rows = parseInt($(tabla +" tbody tr").length + 1); 
				htmlCells = `<td><input type='hidden' name='produ_id_${nro_rows}' value='${form.produ_id.value}'> ${nro_rows}</td>`;
				htmlCells += `<td><input type='hidden' name='product_types_${nro_rows}' value='${form.product_type.value}'>${form.product_type.options[form.product_type.options.selectedIndex].innerText}</td>`;
				htmlCells += `<td><input type='hidden' name='brands_${nro_rows}' value='${form.brand.value}'>${form.brand.options[form.brand.options.selectedIndex].innerText}</td>`;
				htmlCells += `<td><input type='hidden' name='products_${nro_rows}' value='${form.product.value}'>${form.product.value}</td>`;
				htmlCells += `<td><input type='hidden' name='unit_price_${nro_rows}' value='${parseFloat(form.unit_price.value.trim()).toFixed(2)}'>${form.unit_price.value}</td>`;
				htmlCells += `<td><input type='hidden' name='qty_products_${nro_rows}' value='${form.product_qty.value}'>${form.product_qty.value}</td>`;
				htmlCells += `<td><input type='hidden' name='measure_${nro_rows}' value='${form.medida.value}'>${form.medida.value}</td>`;
				htmlCells += `<td><input type='hidden' name='discounts_${nro_rows}' value='${form.discount.value}'>${form.discount.value}%</td>`;
				htmlCells += `<td><input type='hidden' name='total_amount_line_${nro_rows}' value='${form.total_amount.value}'>${form.total_amount.value}</td>`;
				htmlCells += `<td><a class='btn btn-danger delete-item'><i class='glyphicon glyphicon-trash'></i></a></td>`;
				
				htmlRows += htmlCells + "</tr>";
				$(tabla).append(htmlRows);
				var cant_rows = $(tabla + " tbody").find('tr').length;
				var last_amount_line = $(tabla + " tbody").find('tr').eq(cant_rows - 1).find("input[name='total_amount_line_"+nro_rows+"']").val();
				amount_line = suma(last_amount_line,amount_line);
				var last_amount_discount = $(tabla + " tbody").find('tr').eq(cant_rows - 1).find("input[name='discounts_"+nro_rows+"']").val();
				total_discount = suma(last_amount_discount, total_discount);
				total_amount_payable = amount_line;

				form.unit_price.value = 0;
				form.product_qty.value=0;
				form.medida.value="";
				form.discount.value=0;
				form.total_amount.value="";

				$("#amount_total_lines").text(amount_line);
				$("#discount_total").text(total_discount);
				$("#amount_total").text(total_amount_payable);

				document.querySelector("#xordMontoTotal").value = total_amount_payable;
				let changeEvent = new Event('change');
				document.querySelector("#xordMontoTotal").dispatchEvent(changeEvent);
				
				$(".delete-item").each(function(){
					var bnt_delete = $(this);
					bnt_delete.on('click',function(){
						var index = $(this).parents('tr').index();
						var last_amount_line = $(tabla + " tbody").find('tr').eq(index).find("input[name='total_amount_line[]']").val();
						var last_amount_discount = $(tabla + " tbody").find('tr').eq(index).find("input[name='discounts[]']").val();
						amount_line = resta(amount_line, last_amount_line);
						console.log(isNaN(amount_line));
						
						total_discount = resta(total_discount,last_amount_discount);
						total_amount_payable = amount_line;
						$("#amount_total_lines").text(amount_line);
						$("#discount_total").text(total_discount);
						$("#amount_total").text(total_amount_payable);
						$(this).parents('tr').remove();
						//var cant_rows = $(tabla + " tbody").find('tr').length;
						/*if (cant_rows > 0){
							var last_amount_line = $(tabla + " tbody").find('tr').eq(cant_rows - 1).find("input[name='total_amount_line[]']").val();
							amount_line = resta(amount_line, amount_line);
							var last_amount_discount = $(tabla + " tbody").find('tr').eq(cant_rows - 1).find("input[name='discounts[]']").val();
							total_discount = suma(last_amount_discount, total_discount);
							total_amount_payable = amount_line;
						}else{
							//var last_amount_line = $(tabla + " tbody").find('tr').eq(cant_rows - 1).find("input[name='total_amount_line[]']").val();
							amount_line = "0.00"
							//var last_amount_discount = $(tabla + " tbody").find('tr').eq(cant_rows - 1).find("input[name='discounts[]']").val();
							total_discount = "0.00"
							total_amount_payable = "0.00";
						}//*/
					});
					
				});
				break;
			case "#tbl_payments":
				var nro_rows = parseInt($(tabla + " tbody tr").length + 1); 
				var htmlRows = `<tr>`;
				var htmlCells = `<td>${nro_rows}</td>`;
				htmlCells += `<td><input type='number' class="form-control" oninput='document.querySelector("#saldo_pendiente").value = resta(document.querySelector("#saldo_pendiente").value,this.value)' name='payment_amount_${nro_rows}' id="payment_amout" value='0' min='0'></td>`;
				htmlCells += `<td><input type='date' class="form-control" name='payment_date_${nro_rows}' id="payment_date"></td>`;
				htmlCells += `<td><a class='btn btn-danger btn-sm delete-payment'><span class='glyphicon glyphicon-trash'></span></a></td>`;
				htmlRows += `${htmlCells}</tr>`;
				$(tabla).append(htmlRows);
				$(".delete-payment").each(function(){
					$(this).on('click',function(){
						$(this).parents('tr').remove();
					});
				});
				break;
			default:
				break;
		}

		
}

if (document.querySelector("#frm_payment_history")!=null){
	$("#frm_payment_history").on('submit',function(evt){
		// alert('funciona');
		var formDataPayment = convertFormJsonData($("#frm_payment_history"));
		var formDataSeguro = convertFormJsonData($("#frm_seguro"));
		var formDataOrden = convertFormJsonData($("#frm_orden"));
		var formDataProducts = convertFormJsonData($("#frm_products"));
		var formDataAduana = convertFormJsonData($("#frm_aduana"));
		var formData = {
			"formDataPayment": formDataPayment,
			"formDataSeguro": formDataSeguro,
			"formDataOrden": formDataOrden,
			"formDataProducts": formDataProducts,
			"formDataAduana": formDataAduana,
		}

		var parametros = {
			ruta: $("#frm_payment_history").attr('action'),
			form: formData,
			element: "#frm_payment_history"
		}
		console.log(formData);
		processDataForm(parametros);
		evt.preventDefault();
	});
}