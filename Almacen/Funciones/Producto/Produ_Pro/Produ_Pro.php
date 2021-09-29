<?php
include "../Funciones/BD.php";
#Clientes - Proveedores
		$xdesc	=$_POST['xdesc'];
		$xmar	=$_POST['xmar'];
		$xpais	=$_POST['xpais'];
		$xuni	=$_POST['xuni'];


		$clasi   	= 'PROTECTOR';
		$xmarNom	=$_POST['xmarNom'];
		$xpaisNom	=$_POST['xpaisNom'];

		$codigo = $clasi." ".$xdesc." ".$xmarNom." ".$xpaisNom;

#Opciones
		$Guardar=$_POST['Guardar'];
		$Reporte=$_POST['Reporte'];
	//	$agg=$_POST['agg'];
		$edit=$_POST['edit'];
	//	$agg_datos=$_POST['agg_datos'];
	//	$actualiza_d=$_POST['agg_actualiza'];

// 		$carac_espe = array("!", "·", "$", "%", "&", "/", "=", "?", "¿","<",">",'"');
// 		$xnom = str_replace($carac_espe, "",$xnom);

// #ACENTOS
// 		$search  = array('Á', 'É', 'Í', 'Ó', 'Ú','Ñ');
// 		$replace = array('A', 'E', 'I', 'O', 'U','N');
// 		$xnom = str_replace($search, $replace, $xnom);

// echo 	$agg_datos;

// echo "ID--->".$edit;
if (isset($_POST['Guardar'])) {

// 	#Buscar Numero de ALMACEN
// 	$sql3="SELECT  (CASE WHEN MAX(produ_pro_id) = 0 THEN 1 ELSE MAX(produ_pro_id)+1 END) as codigo
// 	FROM sys_produ_pro ";
// 	$result3=mysqli_query($con,$sql3);
// 	$rsql3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
// 	$N  = 'PRO';
// 	$codigo=$rsql3['codigo'];
// 	$resul = $N.$codigo;
// 	$xdesc=$_POST['xdesc'];


// if ($_POST['xdesc'] != '') {
			#Guardar Almacen
			$sql2="insert into sys_produ_pro values ('0', 
			'$xmar',
			UPPER('$xdesc'),
			'$xpais',
			UPPER('$xuni'),
			UPPER('$codigo'))";
			if (!mysqli_query ($con,$sql2)) {
			echo("Error description: " . mysqli_error($con)); }
// }

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
	// echo '<META HTTP-EQUIV="refresh" CONTENT="2; URL= index.php?menu=81">';

	}elseif ($edit<>''){
		$sql1="update sys_produ_pro set 
		mar_id					=  '$xmar',
		produ_pro_desc			=   UPPER ('$xdesc'),
		pais_id					= '$xpais',
		produ_pro_uni			= UPPER ('$xuni'),
		produ_pro_codigo		= UPPER ('$codigo')
		where produ_pro_id='$edit'";


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
		// echo '<META HTTP-EQUIV="refresh" CONTENT="2; URL= index.php?menu=81">';
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
	// echo '<META HTTP-EQUIV="refresh" CONTENT="2; URL= index.php?menu=81">';
}