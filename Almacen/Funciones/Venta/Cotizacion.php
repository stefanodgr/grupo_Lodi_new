<?php
include "../Funciones/BD.php";
#Importaciones - Folder
// $xemp			=trim(strtoupper($_POST['xemp']));						//	EMPRESA
$xcotinr			=trim(strtoupper($_GET['xcotinr']));			//	NUMERO DE COTIZACION
$xemp					=trim(strtoupper($_GET['xemp']));					//	EMPRESA
$xcotiruc			= trim(strtoupper($_GET['xcotiruc']));		//	RUC SUNAT
$xcotisocial	=trim(strtoupper($_GET['xcotisocial']));	//	RAZON SOCIAL
$xcotipago		=trim(strtoupper($_GET['xcotipago']));		//	FORMA DE PAGO
$xclasi				=trim(strtoupper($_GET['xclasi']));				//	TIPO PRODUCTO



$xcotiCant		='';
$xcotipunit		='';
$xcotiDesc		='';
$xcotiTotal		='';
$marca				='';
$mod					='';
$producto     ='';



		// $xcotiruc			= '';
			// $bruc					= trim(strtoupper($_GET['bruc']));		//	RUC SUNAT
			// $bruc2			= trim(strtoupper($_GET['bruc_2']));		//	RUC SUNAT


			// if($bruc <> ''){
			// 	$xcotiruc= trim(strtoupper($_GET['bruc']));		//	RUC SUNAT
			// }
			// if($bruc2 <> ''){
			// 	$xcotiruc			= trim(strtoupper($_GET['bruc_2']));		//	RUC SUNAT
			// }
			// // echo "---->".$sku;
			// $xcotisocial ="";
			// $resultado						= trim(strtoupper($_GET['resultado']));		//	RUC SUNAT
			// $resultado2						= trim(strtoupper($_GET['resultado2']));		//	RUC SUNAT
			// if($resultado == '0'){
			// 	$xcotisocial= trim(strtoupper($_GET['resultado']));		//	RUC SUNAT
			// }
			// if($resultado2 =='0'){
			// 	$xcotisocial			= trim(strtoupper($_GET['resultado2']));		//	RUC SUNAT
			// }


			// $xcotipago		=trim(strtoupper($_GET['xcotipago']));		//	FORMA DE PAGO
			// $xclasi				=trim(strtoupper($_GET['xclasi']));				//	TIPO PRODUCTO

	if($xclasi == '1'){
	$marca						= trim(strtoupper($_GET['xmar_coti_neu']));			//	MARCA NEUMATICO
	$mod							= trim(strtoupper($_GET['xmod_coti_neu']));			//	MODELO NEUMATICO
	$producto					= trim(strtoupper($_GET['xpro_coti_neu']));			//	PRODUCTO NEUMATICO
	$xcotiCant				= trim(strtoupper($_GET['xcotiCant_neu']));			//	CANTIDAD NEUMATICO
	$xcotipunit				= trim(strtoupper($_GET['xcotipunit_neu']));			//	PRECIO UNIT NEUMATICO
	$xcotiDesc				= trim(strtoupper($_GET['xcotiDesc_neu']));			//	DESCUENTO NEUMATICO
	$xcotiTotal				= trim(strtoupper($_GET['xcotiTotal_neu']));			//	TOTAL NEUMATICO
	}else if($xclasi == '2'){
	$marca						= trim(strtoupper($_GET['xmar_coti_cam']));			//	MARCA CAMARA
	$producto					= trim(strtoupper($_GET['xpro_coti_cam']));			//	PRODUCTO CAMARA
	$xcotiCant				= trim(strtoupper($_GET['xcotiCant_cam']));			//	CANTIDAD CANTIDAD
	$xcotipunit				= trim(strtoupper($_GET['xcotipunit_cam']));			//	PRECIO UNIT CANTIDAD
	$xcotiDesc				= trim(strtoupper($_GET['xcotiDesc_cam']));			//	DESCUENTO CANTIDAD
	$xcotiTotal				= trim(strtoupper($_GET['xcotiTotal_cam']));			//	TOTAL CATIDAD

	} else if($xclasi == '3'){
	$marca						= trim(strtoupper($_GET['xmar_coti_aro']));							//	MARCA AROS
	$producto					= trim(strtoupper($_GET['xpro_coti_aro']));			//	PRODUCTO AROS
	$xcotiCant				= trim(strtoupper($_GET['xcotiCant_aro']));			//	CANTIDAD AROS
	$xcotipunit				= trim(strtoupper($_GET['xcotipunit_aro']));			//	PRECIO UNIT AROS
	$xcotiDesc				= trim(strtoupper($_GET['xcotiDesc_aro']));			//	DESCUENTO AROS
	$xcotiTotal				= trim(strtoupper($_GET['xcotiTotal_aro']));			//	TOTAL ARO

	}else if($xclasi == '4'){
	$marca						= trim(strtoupper($_GET['xmar_coti_aro']));			//	MARCA PROTECTORE
	$producto					= trim(strtoupper($_GET['xpro_coti_pro']));			//	PRODUCTO PROTECTORES
	$xcotiCant				= trim(strtoupper($_GET['xcotiCant_pro']));			//	CANTIDAD AROS
	$xcotipunit				= trim(strtoupper($_GET['xcotipunit_pro']));			//	PRECIO UNIT AROS
	$xcotiDesc				= trim(strtoupper($_GET['xcotiDesc_pro']));			//	DESCUENTO AROS
	$xcotiTotal				= trim(strtoupper($_GET['xcotiTotal_pro']));			//	TOTAL ARO

	}else if($xclasi == '5'){
	$marca						= trim(strtoupper($_GET['xmar_coti_ace']));			//	MARCA ACCESORIOS
	$producto					= trim(strtoupper($_GET['xpro_coti_ace']));			//	PRODUCTO NEUMATICO
	$xcotiCant				= trim(strtoupper($_GET['xcotiCant_ace']));			//	CANTIDAD AROS
	$xcotipunit				= trim(strtoupper($_GET['xcotipunit_ace']));			//	PRECIO UNIT AROS
	$xcotiDesc				= trim(strtoupper($_GET['xcotiDesc_ace']));			//	DESCUENTO AROS
	$xcotiTotal				= trim(strtoupper($_GET['xcotiTotal_ace']));			//	TOTAL ARO
	}

$sqlVerif			= "SELECT 
coti.coti_id
FROM globi.sys_cotizacion coti , globi.sys_coti_detalle deta  
where coti.coti_id = deta.coti_id and deta.coti_id = '1'";
$result      = mysqli_query($con, $sqlVerif);
$rsqlConsul   = mysqli_fetch_array($result, MYSQLI_ASSOC);
$verif       = $rsqlConsul['verif'];
// $verifNom    = $rsqlConsul['verifNom'];


if ($verif <> '' || $verif <> null ){

	$id			= $_GET['verif'];
}else{

	$sqlCoti = "SELECT MAX(coti_id)+1 as id FROM sys_cotizacion";
	$result       = mysqli_query($con, $sqlCoti);
	$rsql7        = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$id       		= $rsql7['id'];
	if ($id <> null) {
		
		$id       		= $rsql7['id'];
	} else {
		$id = '1';
	}
}



#Opciones
$GuardarPr	= $_GET['GuardarPr'];
$GuardarSg	= $_GET['GuardarSg'];

		// $agg			=$_POST['Actualizar'];
		// $agg			=$_POST['agg'];
		// $edit			=$_POST['edit'];


	//	$actualiza_d=$_POST['agg_actualiza'];

		// $carac_espe = array("!", "·", "$", "%", "&", "/", "=", "?", "¿","<",">",'"');
		// $xnom = str_replace($carac_espe, "",$xnom);

#ACENTOS
		// $search  = array('Á', 'É', 'Í', 'Ó', 'Ú','Ñ');
		// $replace = array('A', 'E', 'I', 'O', 'U','N');
		// $xnom = str_replace($search, $replace, $xnom);

// echo 	$agg_datos;
#  CONSULTAS


	if($GuardarPr == 'Insertar' ){
		

	if ( $verif == $id){
		$sql24 = "insert into sys_coti_detalle

					values ('0',
					UPPER('$xcotiCant'),
					UPPER('$xcotipunit'),
					UPPER('$xcotiDesc'),
					UPPER('$xcotiTotal'),
					UPPER('$id'),
					UPPER('$xclasi'),
					UPPER('$marca'),
					UPPER('$mod'),
					UPPER('$producto'),
					'1')";

	// if (!mysqli_query($con, $sql24)) {
	// 	echo ("Error description: " . mysqli_error($con));
	// }

	echo '<META HTTP-EQUIV="refresh" CONTENT="2; URL= index.php?menu=17&id='. $id.'">';
	}else{
			$sql18 = "insert into sys_cotizacion values 
					('0',
					UPPER('$xcotinr'),
					UPPER('$xcotiruc'),
					UPPER('$xcotisocial'),
					UPPER('$xcotipago'),
					UPPER('$xemp'),
					'1')";

		// echo "--sql16-->".$sql16;
		// if (!mysqli_query($con, $sql18)) {
		// 	echo ("Error description: " . mysqli_error($con));
		// }
	}



	$sql20 = "insert into sys_coti_detalle

					values ('0',
					UPPER('$xcotiCant'),
					UPPER('$xcotipunit'),
					UPPER('$xcotiDesc'),
					UPPER('$xcotiTotal'),
					UPPER('$id'),
					UPPER('$xclasi'),
					UPPER('$marca'),
					UPPER('$mod'),
					UPPER('$producto'),
					'1')";

	// if (!mysqli_query($con, $sql20)) {
	// 	echo ("Error description: " . mysqli_error($con));
	// }
	// echo "<p>&nbsp;</p>";
	// echo "<p>&nbsp;</p>";
	// echo '<div align="center">
	// 					<div class="col-md-offset-1 col-md-10 col-xs-12">
	// 					<div class="panel panel-primary">
	// 						<div class="panel-heading"><h3>GUARDANDO DATOS </h3></div>
	// 						<div class="panel-body"><div class="progress">
	// 							<div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar"  aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
	// 					100%
	// 												</div>
	// 										</div>
	// 						</div>
	// 						</div>
	// 					</div>
	// 					</div>';


	// echo '<META HTTP-EQUIV="refresh" CONTENT="2; URL= index.php?menu=17&id='.$id.'">';


}else{

}
