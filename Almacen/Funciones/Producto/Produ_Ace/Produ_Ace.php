<?php
include "../Funciones/BD.php";
#Clientes - Proveedores
		$xmar	=$_POST['xmar'];
		$xdesc	=$_POST['xdesc'];
		$xpn	=$_POST['xpn'];
		$xpais	=$_POST['xpais'];
		$xuni	=$_POST['xuni'];


		$clasi   	= 'ACCESORIOS';
		$xmarNom	=$_POST['xmarNom'];
		$xpaisNom	=$_POST['xpaisNom'];


		$codigo = $clasi." ".$xdesc." ".$xpn." ".$xmarNom." ".$xpaisNom;

#Opciones
		$Guardar=$_POST['Guardar'];
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
if (isset($_POST['Guardar'])) {

// 	#Buscar Numero de ALMACEN
// 	$sql3="SELECT  (CASE WHEN MAX(produ_ace_id) = 0 THEN 1 ELSE MAX(produ_ace_id)+1 END) as codigo
// 	FROM sys_produ_ace ";
// 	$result3=mysqli_query($con,$sql3);
// 	$rsql3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
// 	$N  = 'ACE';
// 	$codigo=$rsql3['codigo'];
// 	$resul = $N.$codigo;
// 	$xmed=$_POST['xmed'];


// if ($_POST['xdesc'] != '') {
			#Guardar Almacen
			$sql2="insert into sys_produ_ace values ('0', 
			'$xmar',
			UPPER('$xdesc'),
			UPPER('$xpn'),
			'$xpais',
			UPPER('$xuni'),
			UPPER('$codigo'))";
			if (!mysqli_query ($con,$sql2)) {
			echo("Error description: " . mysqli_error($con)); }

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
	echo '<META HTTP-EQUIV="refresh" CONTENT="2; URL= index.php?menu=78">';

	}elseif ($edit<>''){
		$sql1="update sys_produ_ace set 
		mar_id					= '$xmar',
		produ_ace_desc			= UPPER ('$xdesc'),
		produ_ace_pn			= UPPER ('$xpn'),
		pais_id					='$xpais',
		produ_ace_uni			= UPPER ('$xuni'),
		produ_ace_codigo		= UPPER ('$codigo')
		where produ_ace_id='$edit'";


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
		echo '<META HTTP-EQUIV="refresh" CONTENT="2; URL= index.php?menu=78">';
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
	echo '<META HTTP-EQUIV="refresh" CONTENT="2; URL= index.php?menu=78">';
}