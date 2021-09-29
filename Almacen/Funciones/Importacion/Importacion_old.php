<?php
include "../Funciones/BD.php";
#Importaciones - Folder
		// $xemp			=trim(strtoupper($_POST['xemp']));			//	EMPRESA
		$xemp			=trim(strtoupper($_POST['xemp']));			//	EMPRESA
		$xclasi			=trim(strtoupper($_POST['xclasi']));		//	TIPO PRODUCTO
		$xfolder		=trim(strtoupper($_POST['xfolder']));		//	FOLDER
		$xnrfolder		=trim(strtoupper($_POST['xnrfolder']));		//	N° FOLDER
		$xincot			=trim(strtoupper($_POST['xincot']));		//	INCOTERM
		$xtipo_ctn		=trim(strtoupper($_POST['xtipo_ctn']));		//	TIPO DE CTN
		$xqty			=trim(strtoupper($_POST['xqty']));			//	QTY	CTN
		$xmar1			=trim(strtoupper($_POST['xmar']));			//	MARCA
		$xmar_Nom		=trim(strtoupper($_POST['nombrmar']));		//	NOMBRE MARCA
		$xpais1			=trim(strtoupper($_POST['xpais1']));		//	PAIS
		$xpuerto		=trim(strtoupper($_POST['xpuerto']));		//	PUERTO
		$xpuerNom		=trim(strtoupper($_POST['xpuerNom']));		//	NOMBRE PUERTO

// ECHO "--EMPRESA-->".$xemp."--TIPO-PRODUCTO-->".$xclasi."--FOLDER-->".$xfolder."--N°-FOLDER-->".$xnrfolder;
// ECHO "--INCOTERM-->".$xincot."--TIPO-DE-CTN-->".$xqty."--MARCA-->".$xmar1."--PAIS-->".$xpais1."--PUERTO-->".$xpuerto;
/* -------------------------------------------------------------------------------- */
#Proveedor - Internacional 
		$xproveeNom			=trim(strtoupper($_POST['provee_nombre']));		//	PROVEEDOR
		$xproveeTelf		=trim(strtoupper($_POST['provee_telf']));		//	TELEFONO 1 
		$xproveeTelf2		=trim(strtoupper($_POST['provee_telf2']));		//	TELEFONO 2
		$xproveeEmail		=trim(strtoupper($_POST['provee_email']));		//	EMAIL
		$xproveeConta		=trim(strtoupper($_POST['provee_contacto']));	//	CONTACTO
		$xproveeDirec		=trim(strtoupper($_POST['provee_direc']));		//	DIRECCION
/* -------------------------------------------------------------------------------- */
/* -------------------------------------------------------------------------------- */
#Importaciones - Proveedor
		$xprovee		=trim(strtoupper($_POST['xprovee']));		//	PROVEEDOR
		$xdirec			=trim(strtoupper($_POST['xdirec']));		//	DIRECCION
/* -------------------------------------------------------------------------------- */
/* -------------------------------------------------------------------------------- */
#Importaciones - ORDEN COMPRA
		$xorden					=trim(strtoupper($_POST['xorden']));			//	ORDEN
		$xordfechaCom		=trim(strtoupper($_POST['xordfechaCom']));		//	FECHA COMPRA
		$xordPro				=trim(strtoupper($_POST['xordPro']));			//	PROFORMA
		$xordfechaPro		=trim(strtoupper($_POST['xordfechaPro']));		//	FECHA PROFORMA
		$xordFactura		=trim(strtoupper($_POST['xordFactura']));		//	
		$xordfechaFa		=trim(strtoupper($_POST['xordfechaFa']));		//	TIPO DE CTN
		$xordMontoTotal	=trim(strtoupper($_POST['xordMontoTotal']));	//	QTY	CTN
		$xordFlete			=trim(strtoupper($_POST['xordFlete']));			//	MARCA
		$xordTHC				=trim(strtoupper($_POST['xordTHC']));			//	NOMBRE MARCA
		$xordADV				=trim(strtoupper($_POST['xordADV']));			//	PAIS
		$xordBL					=trim(strtoupper($_POST['xordBL']));			//	PUERTO
		$xordFor				=trim(strtoupper($_POST['xordFor']));			//	NOMBRE PUERTO
		$xordForNom			=trim(strtoupper($_POST['nombrFor']));			//	NOMBRE PUERTO
		$xordTipDes			=trim(strtoupper($_POST['xordTipDes']));		//	PAIS
		$xordLinea			=trim(strtoupper($_POST['xordLinea']));			//	PUERTO
		$xordLineNom		=trim(strtoupper($_POST['nombrLinea']));		//	PUERTO
		$xordNave				=trim(strtoupper($_POST['xordNave']));			//	NOMBRE PUERTO
		$xordNaveNom		=trim(strtoupper($_POST['xnaveNom']));			//	NOMBRE PUERTO
		$xordETD				=trim(strtoupper($_POST['xordETD']));			//	PAIS
		$xordETA				=trim(strtoupper($_POST['xordETA']));			//	PUERTO
		$xordLibre			=trim(strtoupper($_POST['xordLibre']));			//	NOMBRE PUERTO
		$xordLibreAl		=trim(strtoupper($_POST['xordLibreAl']));		//	PUERTO
		$xordAlma				=trim(strtoupper($_POST['xordAlma']));			//	NOMBRE PUERTO
		$xordAlmaNom		=trim(strtoupper($_POST['nombrAlma']));			//	NOMBRE PUERTO


		if($xordADV == ''){
			$xordADV = '0';
		}else if ($xordTHC == ""){
			$xordTHC = '0';
		}
/* -------------------------------------------------------------------------------- */
/* PRODUCTO-------------------PRODUCTO---------------------------------------------- */



	// if($xTpClasi <> '1' ){
	// 	$xmarca				= trim(strtoupper($_GET['xmarPro_1'])); 
	// 	$xproductoG			= trim(strtoupper($_GET['xprodu_marca']));
	// 	$xTpModelo					= '0';
	// }else{
	// 	$xmarca				= trim(strtoupper($_GET['xmarPro'])); 
	// 	$xTpModelo			= trim(strtoupper($_GET['xTpModelo']));
	// 	$xproductoG			= trim(strtoupper($_GET['xproducto']));
	// }
/* --------------------------------------------------------------------------------- */



#Opciones
		$GuardarFolder	=$_POST['GuardarFolder'];
		$GuardarProvee	=$_POST['GuardarProvee'];
		$GuardarOrden	=$_POST['GuardarOrden'];

		$agg			=$_POST['Actualizar'];
		$agg			=$_POST['agg'];
		$edit			=$_POST['edit'];
	//	$actualiza_d=$_POST['agg_actualiza'];

		// $carac_espe = array("!", "·", "$", "%", "&", "/", "=", "?", "¿","<",">",'"');
		// $xnom = str_replace($carac_espe, "",$xnom);

#ACENTOS
		// $search  = array('Á', 'É', 'Í', 'Ó', 'Ú','Ñ');
		// $replace = array('A', 'E', 'I', 'O', 'U','N');
		// $xnom = str_replace($search, $replace, $xnom);

// echo 	$agg_datos;
#  CONSULTAS

# CONSULTA FOLDER

	if( $xmar1  == ' '     ){
		// echo "---VACIO CAMPOS";
		}else if ($xmar1  <> '' || $xmar_Nom == ''   ){

			$xmar1			=trim(strtoupper($_POST['xmar']));			//	PUERTO
			// echo "--2--->".$xordLinea;

		}else if ($xmar_Nom <> ''){

			$xmar_Nom		=trim(strtoupper($_POST['nombrmar']));		//	PUERTO
			$sqlMarca="SELECT MAX(mar_id)+1 as id FROM sys_marca";
			$result       =mysqli_query($con,$sqlMarca);
			$rsqMar        =mysqli_fetch_array($result,MYSQLI_ASSOC);
			$marID       =$rsqMar['id'];

			$xmar1 = $marID;

			// echo "----3--->".$xordLinea;
			// echo "----4--->".$xordLineNom;
		}else {
			echo "--no llego";
	}
	
	if( $xpuerto  == ' '     ){
		// echo "---VACIO CAMPOS";
		}else if ($xpuerto  <> '' || $xpuerNom == ''   ){

			$xpuerto			=trim(strtoupper($_POST['xpuerto']));			//	PUERTO
			// echo "--2--->".$xpuerto;

		}else if ($xpuerNom <> ''){

			$xpuerNom		=trim(strtoupper($_POST['xpuerNom']));		//	PUERTO
			$sqlPuerto="SELECT MAX(puerto_id)+1 as id FROM sys_puerto";
			$result       =mysqli_query($con,$sqlPuerto);
			$rsqPuerto        =mysqli_fetch_array($result,MYSQLI_ASSOC);
			$PuID       =$rsqPuerto['id'];

			$xpuerto = $PuID;

			// echo "----3--->".$xpuerto;
			// echo "----4--->".$xpuerNom;
		}else {
			// echo "--no llego";
	}

	if( $xfolder <> '' || $xnrfolder  <> ''     ){

		$sqlFolder	="SELECT impor_folder as folder,impor_nrfolder as Nfolder  FROM sys_impor_folder WHERE impor_folder='$xfolder'and impor_nrfolder='$xnrfolder' ";
		$result     =mysqli_query($con,$sqlFolder);
		$rsqlFolder =mysqli_fetch_array($result,MYSQLI_ASSOC);
		$verifFolder	=$rsqlFolder['folder'];
		$verifNFolder	=$rsqlFolder['Nfolder'];

		// echo "---folder->".$verifFolder;
		// echo "--numero-folder->".$verifNFolder;



	}

	# CONSULTA FOLDER
	# CONSULTA ORDEN


/* FORWARDER */
// if ()

// $xordFor			=trim(strtoupper($_POST['xordFor']));			//	NOMBRE PUERTO
// $xordForNom			=trim(strtoupper($_POST['nombrFor']));			//	NOMBRE PUERTO

if( $xordFor  == ' '     ){
	echo "---VACIO CAMPOS";
	}else if ($xordFor  <> '' || $xordForNom == ' '   ){

		$xordFor			=trim(strtoupper($_POST['xordFor']));			//	PUERTO
		// echo "--2--->".$xpuerto;

	}else if ($xordForNom <> ''){

		$xordForNom		=trim(strtoupper($_POST['nombrFor']));		//	PUERTO
		$sqlForwar="SELECT MAX(forwa_id)+1 as id FROM sys_forwarder";
		$result       =mysqli_query($con,$sqlForwar);
		$rsqForwar        =mysqli_fetch_array($result,MYSQLI_ASSOC);
		$ForID       =$rsqForwar['id'];

		$xordFor = $ForID;

		// echo "----3--->".$xpuerto;
		// echo "----4--->".$xpuerNom;
	}else {
		// echo "--no llego";
}
// $sqlNewForwar="SELECT MAX(forwa_id)+1 as id FROM sys_forwarder";
// $result       =mysqli_query($con,$sqlNewForwar);
// $rsqFor        =mysqli_fetch_array($result,MYSQLI_ASSOC);
// $ForID       =$rsqFor['id'];

// $sqlForwar="SELECT forwa_id as verifForID ,forwa_nombre as veriForNom FROM sys_forwarder WHERE forwa_id='$xordFor' forwa_nombre='$xordForNom' ";
// $result       		=mysqli_query($con,$sqlForwar);
// $rsqlForwar       	 =mysqli_fetch_array($result,MYSQLI_ASSOC);
// $ForwarID     		=$rsqlForwar['verifForID'];
// $forwarNombre     	=$rsqlForwar['veriForNom'];
// /* ------------------------------------------------------ */
/* LINEA */

		if( $xordLinea  == ' '     ){
			// echo "---VACIO CAMPOS";
		}else if ($xordLinea  <> '' || $xordLineNom == ''   ){

			$xordLinea			=trim(strtoupper($_POST['xordLinea']));			//	PUERTO
			// echo "--2--->".$xordLinea;

		}else if ($xordLineNom <> ''){

			$xordLineNom		=trim(strtoupper($_POST['nombrLinea']));		//	PUERTO
			$sqlNewLinea="SELECT MAX(linea_id)+1 as id FROM sys_linea";
			$result       =mysqli_query($con,$sqlNewLinea);
			$rsqLi     =mysqli_fetch_array($result,MYSQLI_ASSOC);
			$LiID      =$rsqLi['id'];

			$xordLinea = $LiID;

			// echo "----3--->".$xordLinea;
			// echo "----4--->".$xordLineNom;
		}else {
			// echo "--no llego";
		}
		
/* ------------------------------------------------------ */
/* NAVE */

	if ($xordNave == ' '){
		// echo "---VACIO CAMPOS";
	}else if ($xordNave  <> '' || $xordNaveNom == '' ){
		$xordNave			=trim(strtoupper($_POST['xordNave']));			//	NOMBRE PUERTO
		// echo "---2--->".$xordNave;
	}else if($xordNaveNom <> '' ){

		$xordNaveNom		=trim(strtoupper($_POST['xnaveNom']));			//	NOMBRE PUERTO

		$sqlNewNave="SELECT MAX(nave_id)+1 as id FROM sys_nave";
		$result     =mysqli_query($con,$sqlNewNave);
		$rsqNa    	=mysqli_fetch_array($result,MYSQLI_ASSOC);
		$NaID      	=$rsqNa['id'];

		$xordNave = $NaID;

		// echo "----3-->".$xordNave;
		// echo "----4-->".$xordNaveNom;
		
	}else{
	// ECHO "---LLLEGO";
	}




/* ------------------------------------------------------ */
/* ALMACENS */

if ($xordAlma == ' '){
		// echo "---VACIO CAMPOS";
	}else if ($xordAlma  <> '' || $xordAlmaNom == '' ){
		$xordAlma			=trim(strtoupper($_POST['xordAlma']));			//	NOMBRE PUERTO
		// echo "---2--->".$xordNave;
	}else if($xordNaveNom <> '' ){

		$xordAlmaNom		=trim(strtoupper($_POST['nombrAlma']));			//	NOMBRE PUERTO

		$sqlAlma="SELECT MAX(almacen_id)+1 as id FROM sys_almacen_impor";
		$result     	=mysqli_query($con,$sqlAlma);
		$rsqlAlma    	=mysqli_fetch_array($result,MYSQLI_ASSOC);
		$AlmaID      		=$rsqlAlma['id'];

		$xordAlma = $AlmaID;

		// echo "----3-->".$xordNave;
		// echo "----4-->".$xordNaveNom;
		
	}else{
	// ECHO "---LLLEGO";
}

/* ORDEN COMPLETA */
if( $xorden <> ''    ){

	$sqlOrden	="SELECT impor_orden_number as orden FROM sys_impor_orden WHERE impor_orden_number='$xorden' ";
	$result     =mysqli_query($con,$sqlOrden);
	$rsqlOrden =mysqli_fetch_array($result,MYSQLI_ASSOC);
	$verifOrden	=$rsqlFolder['orden'];

	// echo "---folder->".$verifFolder;
	// echo "--numero-folder->".$verifNFolder;

}

/* ------------------------------------------------------ */
# CONSULTA ORDEN

# CONSULTA PROVEEDOR
// $sqlpRO		="SELECT impor_id as imporID,impor_folder as folder,impor_nrfolder as Nfolder  FROM sys_impor_folder WHERE impor_id='$imporID' and impor_folder='$xfolder' and impor_nrfolder='$xnrfolder'  ";
// $result     	=mysqli_query($con,$sqlFolder);
// $rsqlFolder 	=mysqli_fetch_array($result,MYSQLI_ASSOC);
// $imporID		=$rsqlFolder['imporID'];
// $verifFolder	=$rsqlFolder['folder'];
// $verifNFolder	=$rsqlFolder['Nfolder'];
# CONSULTA PROVEEDOR
// echo "--NOMENCLATURA-->".$xnomen."--ACHO-->".$xanc."--SERIE-->".$xserie."---ARO-->".$xaro."--TIPO-->".$xtipo."--PLIEGUES-->".$xpli."--PAIS-->".$xpais."--MARCA->".$xmar."--MODELO-->".$xmod;

	if($GuardarFolder <> ''){

		if($xmar_Nom <> ''){								// GUARDA MARCA
			$sql01="insert into sys_marca values 					
			(UPPER('$marID'),
			UPPER('$xmar_Nom'),
			'1',
			'$xclasi')";
			if (!mysqli_query ($con,$sql01)) {
			echo("Error description: " . mysqli_error($con)); }
		}

		if($xpuerNom <> '' ){			//	GUARDA PUERTO
			$sql02="insert into sys_puerto values 					
			(UPPER('$xpuerto'),
			UPPER('$xpuerNom'),
			'$xpais1')";
			// echo "---sql02-->".$sql02;
			if (!mysqli_query ($con,$sql02)) {
			echo("Error description: " . mysqli_error($con)); }
		}

		if($verifFolder == null  ){			// GUARDAR FOLDER
			#Guardar Folder
			$sql2="insert into sys_impor_folder values ('0', 
				'$xemp',
				'$xclasi',
				'$xfolder',
				'$xnrfolder',
				'$xincot',
				'$xtipo_ctn',
				'$xqty',
				'$xmar1',
				'$xpais1',
				'$xpuerto')";
			// echo"-->".$sql2;
			if (!mysqli_query ($con,$sql2)) {
			echo("Error description: " . mysqli_error($con)); }
		}	
			echo"<p>&nbsp;</p>";
			echo"<p>&nbsp;</p>";
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
			// echo '<META HTTP-EQUIV="refresh" CONTENT="2; URL= index.php?menu=66">';
}elseif ($GuardarProvee <> ''){
		#Guardar Proveedor Internacional
		$sql3="insert into sys_provee_int values ('0', 
			'$xproveeNom',
			'$xproveeTelf',
			'$xproveeEmail',
			'$xproveeTelf2',
			'$xproveeConta',
			'$xproveeDirec')";
		// echo"-->".$sql2;
		if (!mysqli_query ($con,$sql3)) {
		echo("Error description: " . mysqli_error($con)); }

			//  ECHO "---->".$idficha;
			
			//  ECHO "---->".$sql4;
				echo"<p>&nbsp;</p>";
				echo"<p>&nbsp;</p>";
				echo '
				<div align="center">
							<div class="col-md-offset-1 col-md-10 col-xs-12">
								<div class="panel panel-primary">
										<div class="panel-heading"><h3>ACTUALIZANDO LOS DATOS </h3></div>
										<div class="panel-body"><div class="progress">
															<div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
					100%
														</div>
												</div>
								</div>
										</div>
								</div>
							</div>';
				// echo '<META HTTP-EQUIV="refresh" CONTENT="2; URL= index.php?menu=66">';
}elseif ($GuardarOrden <> ''){

	if( $xordForNom <>''  ){			//	GUARDA FORWARDER
		$sql4="insert into sys_forwarder values (					
		'$xordFor',
		'$xordForNom'
		)";
		// echo "---->".$sql4;
			if (!mysqli_query ($con,$sql4)) {
			echo("Error description: " . mysqli_error($con)); }
	}
	
	if( $xordLineNom <> ''  ){			//	GUARDA FORWARDER
		$sql5="insert into sys_linea values (					
		'$xordLinea',
		'$xordLineNom'
		)";
		if (!mysqli_query ($con,$sql5)) {
		echo("Error description: " . mysqli_error($con)); }
	}

	if( $xordNaveNom <> ''  ){			//	GUARDA FORWARDER
		$sql6="insert into sys_nave values (					
		'$xordNave',
		'$xordNaveNom',
		'$xordLinea')";
		 echo "---->".$sql6;
		if (!mysqli_query ($con,$sql6)) {
		echo("Error description: " . mysqli_error($con)); }
	}

	if( $xordAlmaNom <> ''  ){			//	GUARDA FORWARDER
		$sql7="insert into sys_almacen_impor values (					
		'$xordAlma',
		'$xordAlmaNom'
		)";
		//  echo "---->".$sql7;
		if (!mysqli_query ($con,$sql7)) {
		echo("Error description: " . mysqli_error($con)); }
	}

	if($verifOrden == null  ){			// GUARDAR FOLDER
		#Guardar Folder
		$sql8="insert into sys_impor_orden values ('0', 
			'$xorden',
		 	'$xordfechaCom',
		 	'$xordPro',
		 	'$xordfechaPro',
		 	'$xordFactura',
		 	'$xordfechaFa',
		 	'$xordMontoTotal',
		 	'$xordFlete',
		 	'$xordTHC',
		 	'$xordADV',
			'$xordBL',
			'$xordFor',
		 	'$xordTipDes',
		 	'$xordLinea',
		 	'$xordNave',
		 	'$xordETD',
		 	'$xordETA',
		 	'$xordLibre',
		 	'$xordLibreAl',
			'$xordAlma'
			 )";
		echo"-->".$sql8;
		if (!mysqli_query ($con,$sql8)) {
		echo("Error description: " . mysqli_error($con)); }
	}	




















	
	// $sql4="insert into sys_impor_orden values ('0', 
	// 	'$xorden',
	// 	'$xordfechaCom',
	// 	'$xordPro',
	// 	'$xordfechaPro',
	// 	'$xordFactura',
	// 	'$xordfechaFa',
	// 	'$xordMontoTotal',
	// 	'$xordFlete',
	// 	'$xordTHC',
	// 	'$xordADV',
	// 	'$xordBL',
	// 	'$xordFor',
	// 	'$xordTipDes',
	// 	'$xordLinea',
	// 	'$xordNave',
	// 	'$xordETD',
	// 	'$xordETA',
	// 	'$xordLibre',
	// 	'$xordLibreAl',
	// 	'$xordAlma'
	// 	)";

	// echo"-->".$sql4;
	// if (!mysqli_query ($con,$sql4)) {
	// echo("Error description: " . mysqli_error($con)); }

//  ECHO "---->".$idficha;

//  ECHO "---->".$sql4;
echo"<p>&nbsp;</p>";
echo"<p>&nbsp;</p>";
echo '
<div align="center">
			<div class="col-md-offset-1 col-md-10 col-xs-12">
				<div class="panel panel-primary">
						<div class="panel-heading"><h3>ACTUALIZANDO LOS DATOS </h3></div>
						<div class="panel-body"><div class="progress">
											<div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
	100%
										 </div>
								</div>
				</div>
						</div>
				</div>
			</div>';
// echo '<META HTTP-EQUIV="refresh" CONTENT="2; URL= index.php?menu=66">';
}elseif ($edit<>''){
		$sql1="update sys_produ_neu set 
		mar_id				=  '$xmarneupro',
		produ_neu_nomen		=   UPPER ('$xnomen'),
		produ_neu_ancho		=	UPPER ('$xanc'),
		produ_neu_serie		=	UPPER ('$xserie'),
		produ_neu_aro		=	UPPER ('$xaro'),
		produ_neu_tp		=   UPPER ('$xtipo'),
		produ_neu_pli		=	UPPER ('$xpli'),
		pais_id				=  '$xpais',
		mod_id				=  '$xmodneupro',
		produ_neu_codigo	=	UPPER ('$codigo'),
		produ_neu_uni		=	UPPER ('$xuni')
		where produ_neu_id='$edit'";

		$result=mysqli_query($con,$sql1);
		echo"<p>&nbsp;</p>";
		echo"<p>&nbsp;</p>";
		echo '
		<div align="center">
					<div class="col-md-offset-1 col-md-10 col-xs-12">
						<div class="panel panel-primary">
								<div class="panel-heading"><h3>ACTUALIZANDO LOS DATOS </h3></div>
								<div class="panel-body"><div class="progress">
													<div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
			100%
												 </div>
										</div>
						</div>
								</div>
						</div>
					</div>';
		// echo '<META HTTP-EQUIV="refresh" CONTENT="2; URL= index.php?menu=66">';
	} else 	{
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
	// echo '<META HTTP-EQUIV="refresh" CONTENT="2; URL= index.php?menu=66">';
}