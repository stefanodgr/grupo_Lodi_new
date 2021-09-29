

$(document).ready(function(){

// 	$('#xcoti_tp').click(function() {

// 			$('input[type="text"]').val('');
// 			// $('input[type="hidden"]').val('');
// 			$('select[id="bruc"]').val('');
// 			$('select[id="bruc_2"]').val('');
// 			$('select[id="resultado"]').val('');
// 			$('select[id="resultado2"]').val('');
// 	});

// input.addEventListener('input', function(event){
// 	if ( 'block' === elem.style.display ) {
// 			input.className = '';
// 			elem.style.display = 'none';
// 	}
// });



});




function FormOcultarCoti(opc) { // CONTROLA DISPLAY NONE EN LA PANTALLA
	var opc = document.getElementById("xclasi").value; /*Obtener el SELECT */
	// alert("---llego");


	if (opc == "1") {
		
		document.getElementById("div_coti").style.display = "block";       //       NEUMATICOS
		document.getElementById("div_coti_neu").style.display = "block";       //       NEUMATICOS
		document.getElementById("div_coti_cam").style.display = "none";        //       CAMARAS
		document.getElementById("div_coti_aro").style.display = "none";        //       AROS
		document.getElementById("div_coti_pro").style.display = "none";        //       PROTECTORES
		document.getElementById("div_coti_ace").style.display = "none";        //       ACCESORIO
		document.getElementById("div_coti_cal").style.display = "block";        //       ACCESORIO
		document.getElementById("div_consul_coti").style.display = "block";    	//       CONSULTA DE COTIZACION
	} else if (opc == "2") {
		document.getElementById("div_coti").style.display = "block";       //       NEUMATICOS
		document.getElementById("div_coti_neu").style.display = "none";        //       NEUMATICOS
		document.getElementById("div_coti_cam").style.display = "block";        //       CAMARAS
		document.getElementById("div_coti_aro").style.display = "none";       //       CAMARAS
		document.getElementById("div_coti_pro").style.display = "none";        //       AROS
		document.getElementById("div_coti_ace").style.display = "none";        //       PROTECTORES
		document.getElementById("div_consul_coti").style.display = "block";    	//       CONSULTA DE COTIZACION
		document.getElementById("div_coti_cal").style.display = "block";        //       ACCESORIO
	} else if (opc == "3") {
		document.getElementById("div_coti").style.display = "block";       //       NEUMATICOS
		document.getElementById("div_coti_neu").style.display = "none";        //       NEUMATICOS
		document.getElementById("div_coti_cam").style.display = "none";        //       CAMARAS
		document.getElementById("div_coti_aro").style.display = "block";       //       AROS
		document.getElementById("div_coti_pro").style.display = "none";        //       PROTECTORES
		document.getElementById("div_coti_ace").style.display = "none";        //       ACCESORIOs
		document.getElementById("div_consul_coti").style.display = "block";    	//       CONSULTA DE COTIZACION
		document.getElementById("div_coti_cal").style.display = "block";        //       ACCESORIO
	} else if (opc == "4") {
		document.getElementById("div_coti").style.display = "block";       //       NEUMATICOS
		document.getElementById("div_coti_neu").style.display = "none";        //       NEUMATICOS
		document.getElementById("div_coti_cam").style.display = "none";        //       CAMARAS
		document.getElementById("div_coti_aro").style.display = "none";        //       AROS
		document.getElementById("div_coti_pro").style.display = "block";       //       PROTECTORES
		document.getElementById("div_coti_ace").style.display = "none";        //       ACCESORIOs
		document.getElementById("div_consul_coti").style.display = "block";    	//       CONSULTA DE COTIZACION
		document.getElementById("div_coti_cal").style.display = "block";        //       ACCESORIO
	} else if (opc == "5") {
		document.getElementById("div_coti").style.display = "block";       //       NEUMATICOS
		document.getElementById("div_coti_neu").style.display = "none";        //       NEUMATICOS
		document.getElementById("div_coti_cam").style.display = "none";        //       CAMARAS
		document.getElementById("div_coti_aro").style.display = "none";        //       AROS
		document.getElementById("div_coti_pro").style.display = "none";        //       PROTECTORES
		document.getElementById("div_coti_ace").style.display = "block";       //       ACCESORIO
		document.getElementById("div_consul_coti").style.display = "block";    	//       CONSULTA DE COTIZACION
		document.getElementById("div_coti_cal").style.display = "block";        //       ACCESORIO
	} else {

		// alert("Ingrese una Opcion.");
	}
}

function CargarFormaPago() {					//CARGAR TIPO DE CREDITO
	var opc = document.getElementById("xcotipago").value; /*Obtener el SELECT */

	if (opc == 'CREDITO') {
		document.getElementById("div_forma_credito").style.display = "block";    
		$('#xcoticredito').prop('disabled', false);        													  
	} else {
		document.getElementById("div_forma_credito").style.display = "none"; 
		document.getElementById("div_forma_credito_dias").style.display = "none";   
		$('#xcoticredito').prop('disabled', true);
		$('#xcotidias').prop('disabled', true);
	}
}

function CargarDiasPago() {					//CARGAR TIPO DE CREDITO
		document.getElementById("div_forma_credito_dias").style.display = "block";
		$('#xcotidias').prop('disabled', false);
}

function calcularTotal() {                               // CALCULA TOTAL

			var n1 = document.getElementById('xcotiCant').value; // FOB TOTAL 	-- ORDEN DE COMPRA
			var n2 = document.getElementById('xcotipunit').value; // FLETE TOTAL	-- SEGURO
			if (total == '') {
				total = (total == null || total == undefined || total == "") ? 0 : total;
				alert("Falta Cargar Datos");
			} else {
				var total = parseFloat(n1) * parseFloat(n2);
				document.getElementsByName("total")[0].value = total.toFixed(2);
			}
		}
		


function calcularDescuento() {         



		var n1 = document.getElementById('xcotiCant').value; // FOB TOTAL 	-- ORDEN DE COMPRA
		var n2 = document.getElementById('xcotipunit').value; // FLETE TOTAL	-- SEGURO
		var n3 = document.getElementById('xcotiDesc').value; // FLETE TOTAL	-- SEGURO
		if (n1 && n2 ){
			if (t2 == '') {
				t2 = (t2 == null || t2 == undefined || t2 == "") ? 0 : t2;
				alert("Falta Cargar Datos");
			} else {
				if (n3 == '' || n3 == '0' || n3 == null  ){
					var t2 = parseFloat(n1) * parseFloat(n2);
					document.getElementsByName("total")[0].value = t2.toFixed(2);
				}else{
					var resul = parseFloat(n1) * parseFloat(n2);
					var t1 = Math.floor(resul * n3) / 100;
					var t2 = parseFloat(resul) - parseFloat(t1);
					document.getElementsByName("total")[0].value = t2.toFixed(2);
				}
			}
	}
}



function verYear() {
	var fecha = new Date();
	var ano = fecha.getFullYear();
	alert('El año actual es: ' + ano);
}

function verMonth() {
	var fecha = new Date();
	var mes = fecha.getMonth();
	alert('El año actual es: ' + mes );
}

function NrCotizacion() {
	// alert("---->llego");
	var xcotifecha 	= document.getElementById("xcotifecha").value;
	var nrcotinew 	= document.getElementById("nrcotinew").value;
	var NewMes = xcotifecha.substr(0, 2);
	var NewDia = xcotifecha.substr(3, 2);
	var NewAno = xcotifecha.substr(6, 4);
	document.getElementById("xcotinr").value = NewAno + NewMes + NewDia+"-"+ nrcotinew;
}

function filtOPC(opc) {					//CARGAR FILTRO OPCION 
	

		if(opc == '1' ){
		document.getElementById("busq_nombre").style.display 					= "block";
		document.getElementById("resultado").style.display 						= "block";
		document.getElementById("busq_nombre_ruc").style.display 			= "none";
		
		
		document.getElementById("busq_ruc").style.display 						= "none";
		document.getElementById("resultado2").style.display 					= "none";
		document.getElementById("busq_ruc_resul").style.display 			= "none";
		// document.getElementById("div_razon_ruc_buscar").style.display 	= "block";
		
		}else if (opc == '2' ){
			document.getElementById("busq_nombre").style.display 					= "none";
			document.getElementById("resultado").style.display 						= "none";
			document.getElementById("busq_nombre_ruc").style.display 			= "none";
			document.getElementById("busq_ruc").style.display 						= "block";
			document.getElementById("resultado2").style.display 					= "block";
			document.getElementById("busq_ruc_resul").style.display 			= "none";

		}else{
			// alert("llego----filtOPC");
			document.getElementById("busq_nombre").style.display 					= "none";
			document.getElementById("resultado").style.display 						= "none";
			document.getElementById("busq_nombre_ruc").style.display 			= "none";
			document.getElementById("busq_ruc").style.display 						= "none";
			document.getElementById("resultado2").style.display 					= "none";
			document.getElementById("busq_ruc_resul").style.display 			= "none";
		}
 }

function limpiarCamp(){


	document.getElementById("resultado").style.display 								= "none";
	document.getElementById("resultado2").style.display 							= "none";
	document.getElementById("div_ruc_1").style.display 								= "none";
	document.getElementById("div_ruc_2").style.display 								= "none";
	document.getElementById("div_limpiar").style.display 							= "none";
	var inputNombre 	= document.getElementById("busqueda");
	var inputNombre2 	= document.getElementById("busqueda2");
	document.getElementById("select_option").selectedIndex = 0; 
	inputNombre.value = "";
	inputNombre2.value = "";
}

function DisplayAtencion(){
	var opc 	= document.getElementById("atencion").value;

	if(opc == 'crear'){
		document.getElementById("div_input_ate").style.display 							= "block";
		document.getElementById("busq_ruc_ate").style.display 							= "none";
		document.getElementById("div_input_telf").style.display 						= "block";
		document.getElementById("busq_telf_resul").style.display 						= "none";
		document.getElementById("atencion").selectedIndex = 0; 
	}else{
		document.getElementById("div_input_ate").style.display 							= "none";
		document.getElementById("busq_ruc_ate").style.display 							= "block";
		document.getElementById("div_input_telf").style.display 						= "none";
		document.getElementById("busq_telf_resul").style.display 						= "block";
		
	}
	
}



/*------EXTRAER------VALUE-----RUC */
function ShowRuc(){
	// alert("llego");
	// var opc 	= document.getElementById("xcotiruc");
	// if(opc ){

	// }
	var combo      = document.getElementById("xcotiruc");
	var selected   = combo.options[combo.selectedIndex].text;
	document.getElementsByName("xruc_nombre1")[0].value = selected;
 }

 /*------EXTRAER------VALUE-----ATE */
function ShowAte(){

	var combo      = document.getElementById("atencion");
	var selected   = combo.options[combo.selectedIndex].text;
	document.getElementsByName("xate_nombre1")[0].value = selected;
 }

 function ShowTelf(){

	var combo      = document.getElementById("telf");
	var selected   = combo.options[combo.selectedIndex].text;
	document.getElementsByName("xtelf_nombre1")[0].value = selected;
 }






 function VerrifTotal(){
	var total = document.getElementById("total").value; 

	if(total == 0 || total == '' || total == 'NAN' ){
// alert("invalido");
document.getElementById('GuardarPr').disabled = true;
			// alert('ERROR: Total Invalido.');
			return false;
	

	}else{
// alert("valido");
document.getElementById('GuardarPr').disabled = false;
	}


 }

