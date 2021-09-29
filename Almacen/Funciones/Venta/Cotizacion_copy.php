<?php
include "../Funciones/BD.php";
#Cotizacion - Cotizacion

$id = $_GET['id'];
		// $xemp			=trim(strtoupper($_POST['xemp']));							//	EMPRESA
		// $xcotinr			=trim(strtoupper($_GET['xcotinr']));				//	NUMERO DE COTIZACION
		// $xemp					=trim(strtoupper($_GET['xemp']));						//	EMPRESA
		$xcotiTpDocu			=	trim(strtoupper('RUC'));										//	RAZON SOCIAL
		$xcotiRuc					= trim(strtoupper($_GET['xruc_nombre1']));	//	RUC SUNAT
		$xcotiSocial			=	trim(strtoupper($_GET['resultado']));			//	RAZON SOCIAL
		$xcotiAte					=	trim(strtoupper($_GET['xate_nombre1']));		//	ATENCION
		$xcotiTelf				= trim(strtoupper($_GET['xtelf_nombre1']));	//	TELEFONO
		$xcotiPago				= trim(strtoupper($_GET['xcotipago']));			//	FORMA DE PAGO
		$xcotiCredito			= trim(strtoupper($_GET['xcotiCredito']));	//	TIPO DE CREDITO
		$xcotiDiasCredito	= trim(strtoupper($_GET['xcotidias']));			//	DIAS DE CREDITO
		$xcotiTpCa				= trim(strtoupper($_GET['xcotiTC']));				//	COTI TIPO DE CAMBIO
		$xcotiTpMoneda		= trim(strtoupper($_GET['xcotiMoneda']));		//	TIPO MONEDA
		$xcotiObs					= trim(strtoupper($_GET['xcotiObs']));			//	OBSERVACIONES
		
// echo 'RAZON SOCIAL :'. htmlspecialchars($_GET["resultado"]);
// echo '<br>';

		if($xcotiCredito <> ''){																	// VALIDACION DE CREDITO
		$xcotiCredito	= trim(strtoupper($_GET['xcotiCredito']));	
		}else{
		$xcotiCredito	= '';							
		}


		$xclasi				=trim(strtoupper($_GET['xclasi']));					//	TIPO PRODUCTO
		$xcotiCant		= trim(strtoupper($_GET['xcotiCant']));			//	CANTIDAD
		$xcotipunit		= trim(strtoupper($_GET['xcotipunit']));		//	PRECIO UNIT
		$xcotiDesc		= trim(strtoupper($_GET['xcotiDesc']));			//	DESCUENTO
		$producto     ='';

 	if($xclasi == '1'){
	$producto					= trim(strtoupper($_GET['resul_med_neu']));			//	PRODUCTO NEUMATICO
	}else if($xclasi == '2'){
	$producto					= trim(strtoupper($_GET['resul_med_cam']));			//	PRODUCTO CAMARA
	} else if($xclasi == '3'){
	$producto					= trim(strtoupper($_GET['resul_med_aro']));			//	PRODUCTO AROS
	}else if($xclasi == '4'){
	$producto					= trim(strtoupper($_GET['resul_med_pro']));			//	PRODUCTO PROTECTORES
	}else if($xclasi == '5'){
	$producto					= trim(strtoupper($_GET['resul_med_ace']));			//	PRODUCTO NEUMATICO
	}

$GuardarPr	= $_GET['GuardarPr'];
$EliPr			= $_GET['eliminar'];
$Cargar			= $_GET['cargar'];

$xcotiDto_mod			= $_GET['descuento2'];									//ACTUALIZAR DESCUENTO
$xcotiCant_mod		= $_GET['cantidad2'];										//ACTUALIZAR CANTIDAD 
		

$sqlVerif="SELECT coti_id as verif FROM sys_cotizacion WHERE coti_id = $id" ;
$resultCoti       =mysqli_query($con,$sqlVerif);
$rsqlCoti        =mysqli_fetch_array($resultCoti,MYSQLI_ASSOC);
$verif       =$rsqlCoti['verif'];


if($GuardarPr <> ''){

		if ($id == $verif ){
			echo  "son iguales";
		}else{
			$sql18 = "insert into sys_cotizacion values 
			('$id',
			UPPER('$xcotiTpDocu'),
			UPPER('$xcotiRuc'),
			UPPER('$xcotiSocial'),
			UPPER('$xcotiAte'),
			UPPER('$xcotiTelf'),
			UPPER('$xcotiPago'),
			UPPER('$xcotiCredito'),
			UPPER('$xcotiDiasCredito'),
			UPPER('$xcotiTpCa'),
			UPPER('$xcotiTpMoneda'),
			UPPER('$xcotiObs'),
			UPPER('1'))";
			if (!mysqli_query($con, $sql18)) {
				echo ("Error description: " . mysqli_error($con));
			}
		}
			$sql24 = "insert into sys_coti_detalle

					values ('0',
					UPPER('$xcotiCant'),
					UPPER('$xcotipunit'),
					UPPER('$xcotiDesc'),
					UPPER('$xclasi'),
					UPPER('$producto'),
					UPPER('$id'),
					'1')";
			if (!mysqli_query($con, $sql24)) {
				echo ("Error description: " . mysqli_error($con));
			}
	echo '<META HTTP-EQUIV="refresh" CONTENT="0; URL= index.php?menu=17&opci=stock&id='.$id.'">';	
} 
if ($EliPr <> ''){
	$sql25="DELETE FROM sys_coti_detalle
	WHERE coti_deta_id = '$EliPr' ";	
	if (!mysqli_query($con, $sql25)) {
				echo ("Error description: " . mysqli_error($con));
			}
			echo '<META HTTP-EQUIV="refresh" CONTENT="0; URL= index.php?menu=17&opci=stock&id='.$id.'">';	
}
 if($Cargar <> ''){
	$sql26 = "UPDATE sys_coti_detalle SET 
	coti_deta_desc= UPPER ('$xcotiDto_mod'),
	coti_deta_cant= UPPER ('$xcotiCant_mod')
	WHERE coti_deta_id = '$Cargar' ";
		if (!mysqli_query($con, $sql26)) {
			echo ("Error description: " . mysqli_error($con));
		}
		echo '<META HTTP-EQUIV="refresh" CONTENT="0; URL= index.php?menu=17&opci=stock&id='.$id.'">';	
 }
?>