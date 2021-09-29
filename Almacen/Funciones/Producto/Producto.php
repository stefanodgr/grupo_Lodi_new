<?php
include "../Funciones/BD.php";
#Datos


$xclasi			=$_POST['xclasi'];
$xclasiNom		='';
$xcodigo			='';
$sku 					='';
if($xclasi == '1'){

	$xmar				=$_POST['xmar1'];
	$xpais				=$_POST['xpais1'];
	$xmarNom			=$_POST['xmarNom1'];
	$xpaisNom			=$_POST['xpaisNom1'];
	$xmodNom			=$_POST['xmodNom'];
	$xmod				=$_POST['xmod'];
}else if($xclasi == '2'){
	// echo "----->CLASIFICACION----2";
	$xmar				=$_POST['xmar2'];
	$xpais				=$_POST['xpais2'];
	$xmarNom			=$_POST['xmarNom2'];
	$xpaisNom			=$_POST['xpaisNom2'];
	// echo "--ID-MARCA-->".$xmar."--ID-PAIS-->".$xpais."--MARCA-NOMBRE-->".$xmarNom."--PAIS-NOMBRE-->".$xpaisNom;
}else if ($xclasi == '3'){
	$xmar				=$_POST['xmar3'];
	$xpais				=$_POST['xpais3'];
	$xmarNom			=$_POST['xmarNom3'];
	$xpaisNom			=$_POST['xpaisNom3'];
}else if ($xclasi == '4'){
	$xmar				=$_POST['xmar4'];
	$xpais				=$_POST['xpais4'];
	$xmarNom			=$_POST['xmarNom4'];
	$xpaisNom			=$_POST['xpaisNom4'];
	$xdesc				=$_POST['xdesc1'];
}else if($xclasi == '5'){
	$xmar				=$_POST['xmar5'];
	$xpais				=$_POST['xpais5'];
	$xmarNom			=$_POST['xmarNom5'];
	$xpaisNom			=$_POST['xpaisNom5'];
	$xdesc				=$_POST['xdesc2'];
}else{

}
// echo "-----NOMBRE ---->".$xmarNom;

// ECHO "-----MARCA---->".$xmar;
$sqlMarca="SELECT MAX(mar_id)+1 as id FROM sys_marca";
$result       =mysqli_query($con,$sqlMarca);
$rsql7        =mysqli_fetch_array($result,MYSQLI_ASSOC);
$id       =$rsql7['id'];

$sqlMod="SELECT MAX(mod_id)+1 as id FROM sys_modelo";
$result       =mysqli_query($con,$sqlMod);
$rsql8        =mysqli_fetch_array($result,MYSQLI_ASSOC);
$idMod       =$rsql8['id'];
// ECHO "-----MARCA---->".$id;

$xtp				=$_POST['xtp'];
$xnomen				=$_POST['xnomen'];

$xpn				=$_POST['xpn'];
$xuni				='U';
/* NEUMATICOS */
$neu_xanc					=$_POST['neu_xanc'];
$neu_xserie				=$_POST['neu_xserie'];
$neu_xaro					=$_POST['neu_xaro'];
$neu_xpli					=$_POST['neu_xpli'];
$neu_set					=$_POST['neu_set'];
$neu_xuso					=$_POST['neu_xuso'];
$neu_xmate				=$_POST['neu_xmate'];
$neu_xanc_adua		=$_POST['neu_xanc_adua'];
$neu_xserie_adua	=$_POST['neu_xserie_adua'];
$neu_xcons				=$_POST['neu_xcons'];
$neu_xcarga				=$_POST['neu_xcarga'];	
$neu_xexte				=$_POST['neu_xexte'];
$neu_xpisada			=$_POST['neu_xpisada'];
$neu_xvel					=$_POST['neu_xvel'];
$neu_xcum					=$_POST['neu_xcum'];
$neu_xitem				=$_POST['neu_xitem'];
$neu_xvigen				=$_POST['neu_xvigen'];
$neu_xconfor			=$_POST['neu_xconfor'];

$neu_xparti				=$_POST['neu_xparti'];



$neuTexto			= $neu_xanc.$neu_xserie.$neu_xaro.$neu_xpli.$neu_xanc_adua.$neu_xpisada.$neu_xcarga.$neu_xexte.$neu_xpisada.$neu_xcum.$neu_xitem.$neu_xconfor.$neu_xparti;
$neuMenu			= $xnomen.$neu_set.$neu_xuso.$neu_xmate.$neu_xvel.$neu_xcons.$xtp.$xmod;

/* NEUMATICOS */

/* CAMARAS */
$cam_xmed			=$_POST['cam_xmed'];
$cam_xaro			=$_POST['cam_xaro'];
$cam_xval			=$_POST['cam_xval'];
/* CAMARAS */
/* AROS */
$aro_xmod			=$_POST['aro_xmod'];
$aro_xmed			=$_POST['aro_xmed'];
$aro_xespe		=$_POST['aro_xespe'];
$aro_xhueco		=$_POST['aro_xhueco'];
$aro_xhole		=$_POST['aro_xhole'];
$aro_xcbd			=$_POST['aro_xcbd'];
$aro_xpcd			=$_POST['aro_xpcd'];
$aro_xoff			=$_POST['aro_xoff'];
/* AROS */
/* PROTECTORES */ 
/* PROTECTORES */

// echo "---MEDIDA--->".$cam_xmed."----ARO---->".$cam_xaro."----VALVULA-->".$cam_xval;
// echo "---CLASIFICACION-->".$xclasi;
// echo "---PAIS--->".$xpaisNom;



// if($xclasi == '1' || $xmarNom == '' || $xmodNom =='' || $xmodNom == '0'  ){
// 	// $xmar 			=$id;
// 	// $xmarNom		=$_POST['nombrmar1'];
// 	// $xmarNom		=$_POST['nombrmar1'];
// 	// $xmodNom		=$_POST['nombrmod1'];
// 	echo"Nueva Marca Registrada ";
// }else if($xclasi == '2'){
// 	// $sku				=$skuCam;
// }else if ($xclasi == '3'){
// 	// $sku				=$skuAro;
// }else if ($xclasi == '4'){
// 	// $sku				=$skuPro;	
// }else if($xclasi == '5'){
// 	// $sku				=$skuAce;
// }else{

// }

// VALIDAR CLASIFICACION
if($xclasi == '1'){						// NEUMATICO			
	if(	$neuTexto == '' || $neuMenu == '0' || $neu_xvigen == ''){
		$neuTexto = 'NT';
		$neuMenu  = '0';
		$neu_xvigen= '0000-00-00';
	}else{
		$xclasiNom 	= 'NEUMATICO';
		if($xmar  == '0' || $xmarNom == '' || $xmod == '0' || $xmodNom == ''){
			$xmar			=$id;
			$xmarNom		=$_POST['nombrmar1'];
			$xmod			=$idMod;
			$xmodNom		=$_POST['nombrmod1'];
		}else{
			$xmar		=$_POST['xmar1'];
			$xmarNom	=$_POST['xmarNom1'];
			$xmod		=$_POST['xmod'];
			$xmodNom	=$_POST['xmodNom'];
		}
		
		$xpais		=$_POST['xpais1'];
		$xtp		=$_POST['xtp'];
		// $xmarNom	=$_POST['xmarNom1'];
		$xpaisNom	=$_POST['xpaisNom1'];
		$xcodigo	=$_POST['codigo_sku'];
		// $skuNeu = $_POST['nombre3'];

		if($xnomen == 'MILIMETRICA' ){
			$nombreProdu = $xclasiNom." ".$neu_xanc."/".$neu_xserie."-".$neu_xaro." ".$neu_xpli." ".$xmarNom." ".$xmodNom." ".$xpaisNom;
		}else{
			$nombreProdu = $xclasiNom." ".$neu_xanc."-".$neu_xaro." ".$neu_xpli." ".$xmarNom." ".$xmodNom." ".$xpaisNom;
		}
		

	// $sqlNeu="SELECT 	
	// 	CONCAT(
	// 		SUBSTR('$xclasiNom',1,2),
	// 		SUBSTR('$xmarNom',1,3),
	// 		'$neu_xaro',
	// 		'$neu_xpli',
	// 		'$xcodigo'
	// 		) AS skuNeu";
	// 	$result       =mysqli_query($con,$sqlNeu);
	// 	$rsql1        =mysqli_fetch_array($result,MYSQLI_ASSOC);
	// 	$skuNeu       	=$rsql1['skuNeu'];
	// $skuNeu =$_POST['nombre3'];
	// echo "---->". $skuNeu;
			// echo "---->id".$id;

	// echo "-----CLASIFICACION --->".$xclasi."--NOMCLATURA-->".$xnomen."---ANCHO/SECCION-INTERNO-->".$neu_xanc."---SERIE/NEUMATICO-->".$neu_xserie."--ARO/NEUMATICO ---->".$neu_xaro;
	// echo "-----TIPO --->".$xpn."--PLIEGUES-->".$neu_xpli."---MARCA->".$xmar."---PAIS-->".$xpais;
	// echo "-----SET --->".$neu_set."--USO-COMERCIAL-->".$neu_xuso."---MATERIAL->".$neu_xmate;
	// echo "----ANCHO/SECCION/ADUANA-->".$neu_xanc_adua."-----SERIE/ADUANAS--->".$neu_xserie_adua."----TIPO--CONSTRUCCION--->".$neu_xcons."----INDICE/CARGA-->".$neu_xcarga;

	// echo "----DIAMETRO/EXTERNO-->".$neu_xexte."---SERIE/ADUANA->".$neu_xserie_adua."----TIPO--CONSTRUCCION--->".$neu_xcons."----INDICE/CARGA-->".$neu_xcarga;
	// echo "----PROFUNDIDA/PISADA-->".$neu_xpisada."---CODIGO/VELOCIDAD--->".$neu_xvel."----CONSTANCIA--->".$neu_xcum."----ITEMS-->".$neu_xitem."---VIGENCIA--->".$neu_xvigen;

	// echo "----DECLARACION-->".$neu_xconfor."---PARTIDA->".$neu_xparti;

	}

}else if($xclasi == '2'){     

		// echo "---->CAMARA";



		// ECHO "-----MEDIDA--->".$cam_xmed;
	if($cam_xmed <> '' ||  $cam_xaro <> '' || $cam_xval <> '' || $xtp <> '0'  ){

		// ECHO "---ENTRO CASO---- ";
		if($xmar  == '0' || $xmarNom == ''){
			$xmar		=$id;
			$xmarNom	=trim(strtoupper($_POST['nombrmar2']));
		}else{
			$xmar		=$_POST['xmar2'];
			$xmarNom	=trim(strtoupper($_POST['xmarNom2']));
		}

		$xclasiNom 		= 'CAMARAS';
		$xpais			=$_POST['xpais2'];
		$xpaisNom		=$_POST['xpaisNom2'];
		
		// $xmod		=$_POST['0'];
		$xtp			=trim(strtoupper($_POST['xtp1']));
		$cam_xmed		=trim(strtoupper($_POST['cam_xmed']));
		$cam_xaro		=trim(strtoupper($_POST['cam_xaro']));
		$cam_xval		=trim(strtoupper($_POST['cam_xval']));



		// ECHO "-----MEDIDA--->".$cam_xmed;

		if($xtp == 'RADIAL'){
			$nombreProdu = $xclasiNom." ".$cam_xmed."R".$cam_xaro." ".$cam_xval." ".$xmarNom." ".$xpaisNom;
		}else{
			$nombreProdu = $xclasiNom." ".$cam_xmed.$cam_xaro." ".$cam_xval." ".$xmarNom." ".$xpaisNom;
		}

		$sqlCam="SELECT 	
		CONCAT(
			SUBSTR('$xclasiNom',1,2),
			'-',
			SUBSTR('$xtp',1,2),
			'-',
			SUBSTR('$xmarNom',1,3),
			'-',
			SUBSTR('$xpaisNom',1,2),
			'-',
			'$cam_xmed',
			'-',
			'$cam_xval') AS skuCam";
		$result       =mysqli_query($con,$sqlCam);
		$rsql2        =mysqli_fetch_array($result,MYSQLI_ASSOC);
		$skuCam       	=$rsql2['skuCam'];
			

	}else{
		$cam_xmed			='';
		$cam_xaro			='';
		$cam_xval			='';
		$xtp				='0';
	}

}else if($xclasi == '3'){

	if($aro_xmed <> '' ||  $aro_xespe <> '' || $aro_xhueco <> '' || $aro_xhole <> '' || $aro_xcbd <> '' || $aro_xpcd <> '' || $aro_xoff <> '' || $aro_xmod <> '' ){
		$xclasiNom = 'ARO';
		if($xmar  == '0' || $xmarNom == ''){
			$xmar			=$id;
			$xmarNom		=$_POST['nombrmar3'];
		}else{
			$xmar		=$_POST['xmar3'];
			$xpais		=$_POST['xpais3'];
			$xuni		='U';
			$xmod		='0';
			$xmarNom	=$_POST['xmarNom3'];

		}
		$xmarNom	=$_POST['xmarNom3'];
		
		$nombreProdu   = $xclasiNom." ".$aro_xmed." ".$aro_xespe." ( ".$aro_xhueco.",".$aro_xhole.",".$aro_xcbd.",".$aro_xpcd.",".$aro_xoff.")"." ".$xmarNom." ".$xpaisNom;

			$sqlAro="SELECT 	
			CONCAT(
				SUBSTR('$xclasiNom', 1,2),
				'-',
				SUBSTR('$xmarNom', 1,3),
				'-',
				SUBSTR('$xpaisNom', 1,2),
				'-',
				'$aro_xmod',
				'-',
				'$aro_xmed',
				'-',
				'$aro_xhueco'
				) AS skuAro";
		$result       =mysqli_query($con,$sqlAro);
		$rsql3        =mysqli_fetch_array($result,MYSQLI_ASSOC);
		$skuAro       	=$rsql3['skuAro'];
	}else{
		// echo "----MEDIDA/ARO-->".$aro_xmed."----ESPESOR-->".$aro_xespe."--NUMERO/HUECO-->".$aro_xhueco."----HOLE/TYPE-->".$aro_xhole."---CBD--->".$aro_xcbd."---PCD--->".$aro_xpcd."--OFFSET-->".$aro_xoff."----NOMBBRE---->".$xclasiNom;
		$aro_xmed			='';
		$aro_xespe			='';
		$aro_xhueco			='';
		$aro_xhole			='';
		$aro_xcbd			='';
		$aro_xpcd			='';
		$aro_xoff			='';
		$aro_xmod			='';
	}
}else if($xclasi == '4'){
	$xclasiNom = 'PROTECTORES';
	if($xdesc<>''){
		


		if($xmar  == '0' || $xmarNom == ''){
			$xmar			=$id;
			$xmarNom		=$_POST['nombrmar4'];
		}else{
			$xclasiNom = 'PROTECTORES';
			$xmar		=$_POST['xmar4'];
			$xpais		=$_POST['xpais4'];
			$xuni		='U';
			$xmod		='0';
			$xmarNom	=$_POST['xmarNom4'];
		}
				
		
			$nombreProdu = $xclasiNom." ".$xdesc." ".$xmarNom." ".$xpaisNom;

			$sqlPro="SELECT 	
			CONCAT(
				SUBSTR('$xclasiNom', 1,2),
				'-',
				SUBSTR('$xmarNom', 1,3),
				'-',
				SUBSTR('$xpaisNom', 1,2),
				'-',
				'$xdesc'
				) AS skuPro";
		$result       =mysqli_query($con,$sqlPro);
		$rsql4        =mysqli_fetch_array($result,MYSQLI_ASSOC);
		$skuPro       	=$rsql4['skuPro'];

	}else{
		$xdesc	='';
	}

}else{
	if ($xclasi == '5'){
		$xclasiNom = 'ACCESORIOS';
		if($xdesc <> '' || $xpn <> '' ){


			
		if($xmar  == '0' || $xmarNom == ''){
			$xmar			=$id;
			$xmarNom		=$_POST['nombrmar5'];
		}else{
			$xclasiNom = 'ACCESORIOS';
			$xmar		=$_POST['xmar5'];
			$xpais		=$_POST['xpais5'];
			$xuni		='U';
			$xmod		='0';
			$xmarNom	=$_POST['xmarNom5'];
		}

			

			$nombreProdu = $xclasiNom." ".$xdesc." ".$xpn." ".$xmarNom." ".$xpaisNom;
			
			$sqlAce="SELECT 	
			CONCAT(
				SUBSTR('$xclasiNom', 1,2),
				'-',
				SUBSTR('$xmarNom', 1,3),
				'-',
				SUBSTR('$xpaisNom', 1,2),
				'-',
				'$xdesc',
				'-',
				'$xpn'
				) AS skuAce";
		$result       =mysqli_query($con,$sqlAce);
		$rsql5        =mysqli_fetch_array($result,MYSQLI_ASSOC);
		$skuAce       	=$rsql5['skuAce'];
		
		// echo "---DESCRIPCION/ACCESORIO-->".$xdesc."---P/N--->".$xpn."---NOMBRE-->".$xclasiNom;

		}
	}
}

if($xclasi <> ''){
	$sku = $_POST['nombreSku'];
}
if($xclasi == '1'){
	$sunat				=$_POST['xsunat_neu'];
}else if($xclasi == '3'){
	$sunat				=$_POST['xsunat_aro'];
}else{
	$sunat				=$_POST['sunat1'];
}
echo "---->".$sku;

// echo "---ID-MARCA-->".$xmar."---NOMBRE- MARCA-->".$xmarNom."----ID TIPO PRODUCTO".$xclasi;
#Opciones
$Guardar	=	$_POST['Guardar'];
$desac		=	$_POST['desac'];
$act			=	$_POST['act'];
$edit			=	$_POST['edit'];
$GuardarE = $_POST['GuardarE'];
$xtpducto = $_POST['xtpducto'];
if ($xtpducto == '1'){
	$xnomen					= trim(strtoupper($_POST['xnomen']));

	$xneu_xanc			= trim(strtoupper($_POST['xneu_xanc']));
	$xneu_xser			= trim(strtoupper($_POST['xneu_xserie']));
	$xneu_aro				= trim(strtoupper($_POST['xneu_xaro']));
	$xneu_pli				= trim(strtoupper($_POST['xneu_xpli']));
	$xneu_uso				= trim(strtoupper($_POST['neu_xuso']));
	$xpais					=$_POST['xpais1'];
	$xmar						=$_POST['xmar1'];
	$xmod						=$_POST['xmod'];
	$sunat					=$_POST['sunat'];

	$xopc						= trim(strtoupper($_POST['xopc']));
	$xneu_set 			= trim(strtoupper($_POST['neu_set']));
	$xneu_xanc_adu	= trim(strtoupper($_POST['xneu_xanc_adu']));
	$xneu_xser_adu 	= trim(strtoupper($_POST['xneu_xser_adu']));
	$xneu_xexte 		= trim(strtoupper($_POST['xneu_xexte']));
	$neu_xcons 			= trim(strtoupper($_POST['neu_xcons']));
	$neu_xmate 			= trim(strtoupper($_POST['neu_xmate']));
	$neu_xcarga 		= trim(strtoupper($_POST['neu_xcarga']));
	$neu_xpisada 		= trim(strtoupper($_POST['neu_xpisada']));
	$neu_xvel 			= trim(strtoupper($_POST['neu_xvel']));
	$neu_xcum 			= trim(strtoupper($_POST['neu_xcum']));
	$neu_xitem 			= trim(strtoupper($_POST['neu_xitem']));
	$neu_xvigen 		= trim(strtoupper($_POST['neu_xvigen']));
	$neu_xconfor 		= trim(strtoupper($_POST['neu_xconfor']));
	$neu_xparti 		= trim(strtoupper($_POST['neu_xparti']));

}else if ($xtpducto == '2'){
	$xpaisID				= trim(strtoupper($_POST['xpais2']));
	$cam_xaro 			= trim(strtoupper($_POST['cam_xaro']));
	$cam_xval				= trim(strtoupper($_POST['cam_xval']));
	$xmar						= trim(strtoupper($_POST['xmar2']));
	$cam_xmed				=	trim(strtoupper($_POST['cam_xmed']));
	$xtp						=	trim(strtoupper($_POST['xtp1']));

}else if ($xtpducto == '3') {
	$xpaisID				= trim(strtoupper($_POST['xpais3']));
	$aro_xespe 			= trim(strtoupper($_POST['aro_xespe']));
	$aro_xhueco			= trim(strtoupper($_POST['aro_xhueco']));
	$aro_xhole			= trim(strtoupper($_POST['aro_xhole']));
	$aro_xcbd				= trim(strtoupper($_POST['aro_xcbd']));
	$aro_xpcd				= trim(strtoupper($_POST['aro_xpcd']));
	$aro_xoff				= trim(strtoupper($_POST['aro_xoff']));

	$sunat					= trim(strtoupper($_POST['sunat']));
	$xpaisID				= trim(strtoupper($_POST['xpais3']));
	$xmar						= trim(strtoupper($_POST['xmar3']));
	$aro_xmod						= trim(strtoupper($_POST['aro_xmod']));
	$aro_xmed						= trim(strtoupper($_POST['aro_xmed']));



}else if($xtpducto == '4'){
	$sunat					= trim(strtoupper($_POST['sunat']));
	$xpaisID				= trim(strtoupper($_POST['xpais4']));
	$xmar						= trim(strtoupper($_POST['xmar4']));
	$desc1					= trim(strtoupper($_POST['xdesc1']));
}else if(($xtpducto == '5')){
	$xpaisID		= trim(strtoupper($_POST['xpais5']));
	$xmar			= trim(strtoupper($_POST['xmar5']));
	$desc2			= trim(strtoupper($_POST['xdesc2']));


	$xpn				= trim(strtoupper($_POST['xpn']));

}else{

}

$sqlVerif			="SELECT mar_id as verif,mar_nombre verifNom FROM sys_marca WHERE mar_nombre='$xmarNom' and mar_id='$xmar' ";
$result      =mysqli_query($con,$sqlVerif);
$rsqlMarca   =mysqli_fetch_array($result,MYSQLI_ASSOC);
$verif       =$rsqlMarca['verif'];
$verifNom    =$rsqlMarca['verifNom'];

$sqlVerifMd="SELECT mod_nombre  as verifNomMod FROM sys_modelo WHERE mod_nombre='$xmodNom'";
$result       		=mysqli_query($con,$sqlVerifMd);
$rsqlModelo        =mysqli_fetch_array($result,MYSQLI_ASSOC);
$verifNomMod    	=$rsqlModelo['verifNomMod'];

// echo "----GuardarE-->". $GuardarE;
// echo "----Edit--->". $edit;
// echo "----Tp--->" . $xtpducto;
// ECHO "------->".$aro_xmed;
// echo "---UNIDAD-->".$xuni."---DESC--->".$xdesc."---PN-->".$xpn."---TP---->".$xtp."---Nomen-->".$xnomen."--CLASI-->".$xclasi."--MARCA-->".$xmar."---MOD-->".$xmod."---PAIS-->".$xpais;

	if ($xclasi<> '0' and $Guardar=='Insertar') {
		if ($xclasi == '1'){
			if ($verifNom == null ){
					$sql25="insert into sys_marca values 					
					(UPPER('$xmar'),
					UPPER('$xmarNom'),
					'1',
					'$xclasi')";
					// echo "---sql10-->".$sql10;

					if (!mysqli_query ($con,$sql25)) {
					echo("Error description: " . mysqli_error($con)); }

					$sql18="insert into sys_producto values 
					('0',
					UPPER('$xuni'),
					UPPER('$xdesc'),
					UPPER('$xpn'),
					UPPER('$xtp'),
					UPPER('$xnomen'),
					'$xclasi',
					'$xmar',
					'$xmod',
					'$xpais')";
		
					// echo "--sql16-->".$sql16;
		
					if (!mysqli_query ($con,$sql18)) {
					echo("Error description: " . mysqli_error($con)); }
				
					
					$sql20="insert into sys_produ_detalle 
					values ('0',
					UPPER('$cam_xmed'),
					UPPER('$cam_xaro'),
					UPPER('$cam_xval'),
					UPPER('$aro_xmod'),
					UPPER('$aro_xmed'),
					UPPER('$aro_xespe'),
					UPPER('$aro_xhueco'),
					UPPER('$aro_xhole'),
					UPPER('$aro_xcbd'),
					UPPER('$aro_xpcd'),
					UPPER('$aro_xoff'),
					UPPER('$neu_xanc'),
					UPPER('$neu_xserie'),
					UPPER('$neu_xaro'),
					UPPER('$neu_xpli'),
					UPPER('$neu_set'),
					UPPER('$neu_xuso'),
					UPPER('$neu_xmate'),
					UPPER('$neu_xanc_adua'),
					UPPER('$neu_xserie_adua'),
					UPPER('$neu_xcons'),
					UPPER('$neu_xcarga'),
					UPPER('$neu_xexte'),
					UPPER('$neu_xpisada'),
					UPPER('$neu_xvel'),
					UPPER('$neu_xcum'),
					UPPER('$neu_xitem'),
					UPPER('$neu_xvigen'),
					UPPER('$neu_xconfor'),
					UPPER('$neu_xparti'),
					UPPER('$sku'),
					UPPER('$nombreProdu',
					UPPER('$sunat'))";

							if (!mysqli_query ($con,$sql20)) {
							echo("Error description: " . mysqli_error($con)); }
					echo "<p>&nbsp;</p>";
					echo "<p>&nbsp;</p>";
					echo '<div align="center">
						<div class="col-md-offset-1 col-md-10 col-xs-12">
						<div class="panel panel-primary">
							<div class="panel-heading"><h3>GUARDANDO DATOS </h3></div>
							<div class="panel-body"><div class="progress">
								<div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar"  aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
						100%
													</div>
											</div>
							</div>
							</div>
						</div>
						</div>';
							echo '<META HTTP-EQUIV="refresh" CONTENT="2; URL= index.php?menu=1">';
						}
				if ($verifNomMod == null   ){
					$sql13="insert into sys_modelo values 
					('0',
						UPPER('$xmodNom'),
						'1',
					'$xmar')";
					
					//  echo "--sql13-->".$sql13;

					if (!mysqli_query ($con,$sql13)) {
					echo("Error description: " . mysqli_error($con)); }

					$sql21="insert into sys_producto values 
					('0',
					UPPER('$xuni'),
					UPPER('$xdesc'),
					UPPER('$xpn'),
					UPPER('$xtp'),
					UPPER('$xnomen'),
					'$xclasi',
					'$xmar',
					'$xmod',
					'$xpais')";

				
						if (!mysqli_query ($con,$sql21)) {
					echo("Error description: " . mysqli_error($con)); }
				
				
					$sql22="insert into sys_produ_detalle 
						values ('0',
						UPPER('$cam_xmed'),
						UPPER('$cam_xaro'),
						UPPER('$cam_xval'),
						UPPER('$aro_xmod'),
						UPPER('$aro_xmed'),
						UPPER('$aro_xespe'),
						UPPER('$aro_xhueco'),
						UPPER('$aro_xhole'),
						UPPER('$aro_xcbd'),
						UPPER('$aro_xpcd'),
						UPPER('$aro_xoff'),
						UPPER('$neu_xanc'),
						UPPER('$neu_xserie'),
						UPPER('$neu_xaro'),
						UPPER('$neu_xpli'),
						UPPER('$neu_set'),
						UPPER('$neu_xuso'),
						UPPER('$neu_xmate'),
						UPPER('$neu_xanc_adua'),
						UPPER('$neu_xserie_adua'),
						UPPER('$neu_xcons'),
						UPPER('$neu_xcarga'),
						UPPER('$neu_xexte'),
						UPPER('$neu_xpisada'),
						UPPER('$neu_xvel'),
						UPPER('$neu_xcum'),
						UPPER('$neu_xitem'),
						UPPER('$neu_xvigen'),
						UPPER('$neu_xconfor'),
						UPPER('$neu_xparti'),
						UPPER('$sku'),
						UPPER('$nombreProdu'))";

						if (!mysqli_query ($con,$sql22)) {
						echo("Error description: " . mysqli_error($con)); }
					echo "<p>&nbsp;</p>";
					echo "<p>&nbsp;</p>";
					echo '<div align="center">
						<div class="col-md-offset-1 col-md-10 col-xs-12">
						<div class="panel panel-primary">
							<div class="panel-heading"><h3>GUARDANDO DATOS </h3></div>
							<div class="panel-body"><div class="progress">
								<div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar"  aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
							100%
													</div>
											</div>
							</div>
							</div>
						</div>
						</div>';
			
						echo '<META HTTP-EQUIV="refresh" CONTENT="2; URL= index.php?menu=1">';
						}
						if ($verifNomMod <> null   ){
				
							$sql27="insert into sys_producto values 
							('0',
							UPPER('$xuni'),
							UPPER('$xdesc'),
							UPPER('$xpn'),
							UPPER('$xtp'),
							UPPER('$xnomen'),
							'$xclasi',
							'$xmar',
							'$xmod',
							'$xpais')";
				
						
								if (!mysqli_query ($con,$sql27)) {
							echo("Error description: " . mysqli_error($con)); }
						
						
							$sql28="insert into sys_produ_detalle 
								values ('0',
								UPPER('$cam_xmed'),
								UPPER('$cam_xaro'),
								UPPER('$cam_xval'),
								UPPER('$aro_xmod'),
								UPPER('$aro_xmed'),
								UPPER('$aro_xespe'),
								UPPER('$aro_xhueco'),
								UPPER('$aro_xhole'),
								UPPER('$aro_xcbd'),
								UPPER('$aro_xpcd'),
								UPPER('$aro_xoff'),
								UPPER('$neu_xanc'),
								UPPER('$neu_xserie'),
								UPPER('$neu_xaro'),
								UPPER('$neu_xpli'),
								UPPER('$neu_set'),
								UPPER('$neu_xuso'),
								UPPER('$neu_xmate'),
								UPPER('$neu_xanc_adua'),
								UPPER('$neu_xserie_adua'),
								UPPER('$neu_xcons'),
								UPPER('$neu_xcarga'),
								UPPER('$neu_xexte'),
								UPPER('$neu_xpisada'),
								UPPER('$neu_xvel'),
								UPPER('$neu_xcum'),
								UPPER('$neu_xitem'),
								UPPER('$neu_xvigen'),
								UPPER('$neu_xconfor'),
								UPPER('$neu_xparti'),
								UPPER('$sku'),
								UPPER('$nombreProdu'),
								UPPER('$sunat'))";
				
								if (!mysqli_query ($con,$sql28)) {
								echo("Error description: " . mysqli_error($con)); }
						echo "<p>&nbsp;</p>";
						echo "<p>&nbsp;</p>";
						echo '<div align="center">
							<div class="col-md-offset-1 col-md-10 col-xs-12">
							<div class="panel panel-primary">
								<div class="panel-heading"><h3>GUARDANDO DATOS </h3></div>
								<div class="panel-body"><div class="progress">
									<div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar"  aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
							100%
														</div>
												</div>
								</div>
								</div>
							</div>
							</div>';
						
									echo '<META HTTP-EQUIV="refresh" CONTENT="2; URL= index.php?menu=1">';
									}		
						
				}else{
						$xmodNom == '';
						if ($verifNom == null ){
								$sql26="insert into sys_marca values 					
									(UPPER('$xmar'),
									UPPER('$xmarNom'),
									'1',
									'$xclasi')";
									// echo "---sql10-->".$sql10;

								if (!mysqli_query ($con,$sql26)) {
								echo("Error description: " . mysqli_error($con)); }

								$sql16="insert into sys_producto values 
									('0',
									UPPER('$xuni'),
									UPPER('$xdesc'),
									UPPER('$xpn'),
									UPPER('$xtp'),
									UPPER('$xnomen'),
									'$xclasi',
									'$xmar',
									'$xmod',
									'$xpais')";
						
									// echo "--sql16-->".$sql16;
						
									if (!mysqli_query ($con,$sql16)) {
									echo("Error description: " . mysqli_error($con)); }
								// echo "sSKU----->".$sku;
								
								$sql17="insert into sys_produ_detalle 
									values ('0',
									UPPER('$cam_xmed'),
									UPPER('$cam_xaro'),
									UPPER('$cam_xval'),
									UPPER('$aro_xmod'),
									UPPER('$aro_xmed'),
									UPPER('$aro_xespe'),
									UPPER('$aro_xhueco'),
									UPPER('$aro_xhole'),
									UPPER('$aro_xcbd'),
									UPPER('$aro_xpcd'),
									UPPER('$aro_xoff'),
									UPPER('$neu_xanc'),
									UPPER('$neu_xserie'),
									UPPER('$neu_xaro'),
									UPPER('$neu_xpli'),
									UPPER('$neu_set'),
									UPPER('$neu_xuso'),
									UPPER('$neu_xmate'),
									UPPER('$neu_xanc_adua'),
									UPPER('$neu_xserie_adua'),
									UPPER('$neu_xcons'),
									UPPER('$neu_xcarga'),
									UPPER('$neu_xexte'),
									UPPER('$neu_xpisada'),
									UPPER('$neu_xvel'),
									UPPER('$neu_xcum'),
									UPPER('$neu_xitem'),
									UPPER('$neu_xvigen'),
									UPPER('$neu_xconfor'),
									UPPER('$neu_xparti'),
									UPPER('$sku'),
									UPPER('$nombreProdu'),
									UPPER('$sunat'))";

									// ECHO"---->".$sql17;

									if (!mysqli_query ($con,$sql17)) {
									echo("Error description: " . mysqli_error($con)); }
							echo "<p>&nbsp;</p>";
							echo "<p>&nbsp;</p>";
							echo '<div align="center">
								<div class="col-md-offset-1 col-md-10 col-xs-12">
								<div class="panel panel-primary">
									<div class="panel-heading"><h3>GUARDANDO DATOS </h3></div>
									<div class="panel-body"><div class="progress">
										<div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar"  aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
								100%
															</div>
													</div>
									</div>
									</div>
								</div>
								</div>';
									echo '<META HTTP-EQUIV="refresh" CONTENT="2; URL= index.php?menu=1">';
							}
							if ( $verifNom <> null  ){
								$sql23="insert into sys_producto values 
									('0',
									UPPER('$xuni'),
									UPPER('$xdesc'),
									UPPER('$xpn'),
									UPPER('$xtp'),
									UPPER('$xnomen'),
									'$xclasi',
									'$xmar',
									'$xmod',
									'$xpais')";
						
									if (!mysqli_query ($con,$sql23)) {
										echo("Error description: " . mysqli_error($con)); }
							
							
								$sql24="insert into sys_produ_detalle 
									values ('0',
									UPPER('$cam_xmed'),
									UPPER('$cam_xaro'),
									UPPER('$cam_xval'),
									UPPER('$aro_xmod'),
									UPPER('$aro_xmed'),
									UPPER('$aro_xespe'),
									UPPER('$aro_xhueco'),
									UPPER('$aro_xhole'),
									UPPER('$aro_xcbd'),
									UPPER('$aro_xpcd'),
									UPPER('$aro_xoff'),
									UPPER('$neu_xanc'),
									UPPER('$neu_xserie'),
									UPPER('$neu_xaro'),
									UPPER('$neu_xpli'),
									UPPER('$neu_set'),
									UPPER('$neu_xuso'),
									UPPER('$neu_xmate'),
									UPPER('$neu_xanc_adua'),
									UPPER('$neu_xserie_adua'),
									UPPER('$neu_xcons'),
									UPPER('$neu_xcarga'),
									UPPER('$neu_xexte'),
									UPPER('$neu_xpisada'),
									UPPER('$neu_xvel'),
									UPPER('$neu_xcum'),
									UPPER('$neu_xitem'),
									UPPER('$neu_xvigen'),
									UPPER('$neu_xconfor'),
									UPPER('$neu_xparti'),
									UPPER('$sku'),
									UPPER('$nombreProdu'),
									UPPER('$sunat')
									)";

									// ECHO"---->".$sql24;

								if (!mysqli_query ($con,$sql24)) {
								echo("Error description: " . mysqli_error($con)); }
							echo "<p>&nbsp;</p>";
							echo "<p>&nbsp;</p>";
							echo '<div align="center">
								<div class="col-md-offset-1 col-md-10 col-xs-12">
								<div class="panel panel-primary">
									<div class="panel-heading"><h3>GUARDANDO DATOS </h3></div>
									<div class="panel-body"><div class="progress">
										<div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar"  aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
							100%
															</div>
													</div>
									</div>
									</div>
								</div>
								</div>';

								echo '<META HTTP-EQUIV="refresh" CONTENT="2; URL= index.php?menu=1">';
						}
					}
							
			
		}else if( $edit <> '' and $xtpducto <> '' and $GuardarE == 'GuardarE'  ){


				if ($xtpducto == '1'){
						$sqlTp1 =		"update sys_producto set 
											
												produ_opc				= UPPER ('$xopc'),
												produ_nomen			= UPPER ('$xnomen'),
												mar_id					= UPPER ('$xmar'),
												mod_id					= UPPER ('$xmod'),
												pais_id					= UPPER ('$xpais')		
												where produ_id='$edit'";

								// echo "---->". $sqlTp1;
						// $resultTp1 = mysqli_query($con, $sqlTp1);

							if (!mysqli_query($con, $sqlTp1)) {
								echo ("Error description: " . mysqli_error($con));
						}

							$sqlTp2 =		"update sys_produ_detalle set 
		
														produ_neu_ancho_inter 		= UPPER ('$xneu_xanc'),
														produ_neu_serie 					= UPPER ('$xneu_xser'),
														produ_neu_aro 						= UPPER ('$xneu_aro'),
														produ_neu_pli 						= UPPER ('$xneu_pli'),
														produ_neu_uso 						= UPPER ('$xneu_uso'),
														
														produ_neu_set 						= UPPER ('$xneu_set'),
														produ_neu_ancho_adua			= UPPER ('$xneu_xanc_adu'),
														produ_neu_serie_adua			= UPPER ('$xneu_xser_adu'),
														produ_neu_exte						= UPPER ('$xneu_xexte'),
														produ_neu_tp_const 				= UPPER ('$neu_xcons'),
														produ_neu_mate						= UPPER ('$neu_xmate'),
														produ_neu_carga						= UPPER ('$neu_xcarga'),
														produ_neu_pisa						= UPPER ('$neu_xpisada'),
														produ_neu_vel							= UPPER ('$neu_xvel'),
														produ_neu_consta					= UPPER ('$neu_xcum'),
														produ_neu_item						= UPPER ('$neu_xitem'),
														produ_neu_vigencia				= UPPER ('$neu_xvigen'),
														produ_neu_confor					= UPPER ('$neu_xconfor'),
														produ_neu_partida					= UPPER ('$neu_xparti'),
														produ_neu_partida					= UPPER ('$neu_xparti'),
														sunat 										= UPPER ('$sunat')
														where produ_deta_id				='$edit'";
							// $resultTp2 = mysqli_query($con, $sqlTp2);

							echo "----->". $sqlTp2;
							if (!mysqli_query($con, $sqlTp2)) {
								echo ("Error description: " . mysqli_error($con));
							}
							echo "<p>&nbsp;</p>";
							echo "<p>&nbsp;</p>";
							echo '<div align="center">
											<div class="col-md-offset-1 col-md-10 col-xs-12">
											<div class="panel panel-primary">
												<div class="panel-heading"><h3>GUARDANDO DATOS </h3></div>
												<div class="panel-body"><div class="progress">
													<div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar"  aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
											100%
																		</div>
																</div>
												</div>
												</div>
											</div>
											</div>';
							echo '<META HTTP-EQUIV="refresh" CONTENT="2; URL= index.php?menu=1">';

				}else if ($xtpducto == '2'){

						$sqlTpCa =		"update sys_producto set 
																mar_id				= UPPER ('$xmar'),
																produ_opc			= UPPER ('$xtp'),
																pais_id				= UPPER ('$xpaisID')
																where produ_id='$edit'";

						echo "---->". $sqlTpCa;
						// $resultTp1 = mysqli_query($con, $sqlTp1);

						if (!mysqli_query($con, $sqlTpCa)) {
							echo ("Error description: " . mysqli_error($con));
						}

						$sqlTpCa1 =		"update sys_produ_detalle set 
												produ_cam_med 						= UPPER ('$cam_xmed'),
												produ_cam_aro 						= UPPER ('$cam_xaro'),
												produ_cam_val							= UPPER ('$cam_xval')
												where produ_deta_id				='$edit'";
						// $resultTp2 = mysqli_query($con, $sqlTp2);

						echo "----->" . $sqlTpCa1;
						if (!mysqli_query($con, $sqlTpCa1)) {
							echo ("Error description: " . mysqli_error($con));
						}
						echo "<p>&nbsp;</p>";
						echo "<p>&nbsp;</p>";
						echo '<div align="center">
														<div class="col-md-offset-1 col-md-10 col-xs-12">
														<div class="panel panel-primary">
															<div class="panel-heading"><h3>GUARDANDO DATOS </h3></div>
															<div class="panel-body"><div class="progress">
																<div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar"  aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
														100%
																					</div>
																			</div>
															</div>
															</div>
														</div>
														</div>';
										echo '<META HTTP-EQUIV="refresh" CONTENT="0; URL= index.php?menu=1">';

					}else if($xtpducto == '3'){
							
								$sqlTpAro =		"update sys_producto set 							






																					mar_id				= UPPER ('$xmar'),
																					pais_id				= UPPER ('$xpaisID')
																					where produ_id='$edit'";
											// echo "---->". $sqlTpAro;
											// $resultTp1 = mysqli_query($con, $sqlTp1);

											if (!mysqli_query($con, $sqlTpAro)) {
												echo ("Error description: " . mysqli_error($con));
											}

											$sqlTpAro1 =		"update sys_produ_detalle set 
										
																	produ_aro_espe 						= UPPER ('$aro_xespe'),
																	produ_aro_hueco						= UPPER ('$aro_xhueco'),
																	produ_aro_hole 						= UPPER ('$aro_xhole'),
																	produ_aro_cbd							= UPPER ('$aro_xcbd'),
																	produ_aro_pcd							= UPPER ('$aro_xpcd'),
																	produ_aro_mod							= UPPER ('$aro_xmod'),
																	produ_aro_med							= UPPER ('$aro_xmed'),
																	sunat											= UPPER ('$sunat'),
																	produ_aro_offset					= UPPER ('$aro_xoff')
																	where produ_deta_id				='$edit'";
											// $resultTp2 = mysqli_query($con, $sqlTp2);

											// echo "----->" . $sqlTpAro1;
											if (!mysqli_query($con, $sqlTpAro1)) {
												echo ("Error description: " . mysqli_error($con));
											}
											echo "<p>&nbsp;</p>";
											echo "<p>&nbsp;</p>";
											echo '<div align="center">
												<div class="col-md-offset-1 col-md-10 col-xs-12">
												<div class="panel panel-primary">
													<div class="panel-heading"><h3>GUARDANDO DATOS </h3></div>
													<div class="panel-body"><div class="progress">
														<div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar"  aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
												100%
																			</div>
																	</div>
													</div>
													</div>
												</div>
												</div>';
													echo '<META HTTP-EQUIV="refresh" CONTENT="0; URL= index.php?menu=1">';
					}else if ($xtpducto == '4')	{
										$sqlTpPro =		"update sys_producto set 				
										
									
											produ_desc		= UPPER ('$desc1'),
											mar_id				= UPPER ('$xmar'),
											pais_id				= UPPER ('$xpaisID')
											where produ_id='$edit'";
										// echo "---->". $sqlTpAro;
										// $resultTp1 = mysqli_query($con, $sqlTp1);

										if (!mysqli_query($con, $sqlTpPro)) {
											echo ("Error description: " . mysqli_error($con));
										}
										
										echo "<p>&nbsp;</p>";
										echo "<p>&nbsp;</p>";
										echo '<div align="center">
																				<div class="col-md-offset-1 col-md-10 col-xs-12">
																				<div class="panel panel-primary">
																					<div class="panel-heading"><h3>GUARDANDO DATOS </h3></div>
																					<div class="panel-body"><div class="progress">
																						<div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar"  aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
																				100%
																											</div>
																									</div>
																					</div>
																					</div>
																				</div>
																				</div>';
																					echo '<META HTTP-EQUIV="refresh" CONTENT="2; URL= index.php?menu=1">';
					}else if(($xtpducto == '5')){

						$sqlTpAce =		"update sys_producto set 				
										
produ_pn		= UPPER ('$xpn'),						
produ_desc		= UPPER ('$desc2'),
mar_id				= UPPER ('$xmar'),
pais_id				= UPPER ('$xpaisID')
where produ_id='$edit'";
// echo "---->". $sqlTpAro;
// $resultTp1 = mysqli_query($con, $sqlTp1);

if (!mysqli_query($con, $sqlTpAce)) {
echo ("Error description: " . mysqli_error($con));
}

echo "<p>&nbsp;</p>";
echo "<p>&nbsp;</p>";
echo '<div align="center">
			<div class="col-md-offset-1 col-md-10 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading"><h3>GUARDANDO DATOS </h3></div>
				<div class="panel-body"><div class="progress">
					<div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar"  aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
			100%
										</div>
								</div>
				</div>
				</div>
			</div>
			</div>';
				echo '<META HTTP-EQUIV="refresh" CONTENT="2; URL= index.php?menu=1">';
					}else{

					}
	 	}else{
			echo"<p>&nbsp;</p>";
  		echo"<p>&nbsp;</p>";
			echo '
				<div class="row">
			    <div class="col-lg-2 col-md-2 col-xs-2">
 	  			</div>
				<div align="center">
				<div class="col-lg-8 col-md-8 col-xs-4">
	  			<div class="panel panel-danger">
      				<div class="panel-heading"><h2>ERROR EN DATOS</h2></div>
							<div class="panel-body"><div class="progress">
												<div class="progress-bar progress-bar-striped progress-bar-danger active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
					100%
											 </div>
									</div>
					</div>
      				</div>
	  			</div>
				</div>
				</div>';
			// echo '<META HTTP-EQUIV="refresh" CONTENT="2; URL= index.php?menu=1">';
	 }

?>
