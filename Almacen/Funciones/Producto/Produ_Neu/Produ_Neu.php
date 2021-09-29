<?php
include "../Funciones/BD.php";
#Clientes - Proveedores
		$xmarneupro		=$_POST['xmarneupro'];
		$xmodneupro		=$_POST['xmodneupro'];
		$xnomen			=$_POST['xnomen'];
		$xanc			=$_POST['xanc'];
		$xserie			=$_POST['xserie'];
		$xaro			=$_POST['xaro'];
		$xtipo			=$_POST['xtipo'];
		$xpli			=$_POST['xpli'];
		$xpais			=$_POST['xpais'];
		$xuni			=$_POST['xuni'];		
		$clasi 			= 'NEUMATICO';
		$plipr   		= $xpli.'PR';  
		$xmarNom		=$_POST['xmarNom'];
		$xmodNom		=$_POST['xmodNom'];
		$xpaisNom		=$_POST['xpaisNom'];


		if($xnomen == 'MILIMETRICA' ){
			$codigo = $clasi." ".$xanc."/".$xserie."-".$xaro." ".$plipr." ".$xmarNom." ".$xmodNom." ".$xpaisNom;
		}else{
			$codigo = $clasi." ".$xanc."-".$xaro." ".$plipr." ".$xmarNom." ".$xmodNom." ".$xpaisNom;
		}
#FICHA TECNICA

		$xvel			=$_POST['xvel'];
		$xpresi			=$_POST['xpresi'];
		$xcarga			=$_POST['xcarga'];
		$xexte			=$_POST['xexte'];
		$id				=$_POST['id'];
		$idficha		=$_POST['idficha'];
		$codprod		=$_POST['codprod'];
		

#CAMPOS VACIOS
		if($xvel == '' || $xpresi == '' || $xcarga == '' || $xexte == ''){
			$xvel = '0';
			$xpresi = 'NT';
			$xcarga = 'NT';
			$xexte = 'NT';
		
		  }
		  $inputVacios = $xvel.$xpresi.$xcarga.$xexte;

#Opciones
		$Guardar	=$_POST['Guardar'];
		$agg	=$_POST['Actualizar'];
		$agg=$_POST['agg'];
	//	$agg=$_POST['agg'];
		$edit=$_POST['edit'];
	//	$actualiza_d=$_POST['agg_actualiza'];

		// $carac_espe = array("!", "·", "$", "%", "&", "/", "=", "?", "¿","<",">",'"');
		// $xnom = str_replace($carac_espe, "",$xnom);

#ACENTOS
		// $search  = array('Á', 'É', 'Í', 'Ó', 'Ú','Ñ');
		// $replace = array('A', 'E', 'I', 'O', 'U','N');
		// $xnom = str_replace($search, $replace, $xnom);

// echo 	$agg_datos;

// echo "--NOMENCLATURA-->".$xnomen."--ACHO-->".$xanc."--SERIE-->".$xserie."---ARO-->".$xaro."--TIPO-->".$xtipo."--PLIEGUES-->".$xpli."--PAIS-->".$xpais."--MARCA->".$xmar."--MODELO-->".$xmod;
if (isset($_POST['Guardar'])) {

			#Guardar Almacen
			$sql2="insert into sys_produ_neu values ('0', 
			 '$xmarneupro',
			 '$xmodneupro',
			 UPPER('$xnomen'),
			 UPPER('$xanc'),
			 UPPER('$xserie'),
			 UPPER('$xaro'),
			 UPPER('$xtipo'),
			 UPPER('$plipr'),
			 '$xpais',
			 UPPER('$codigo'),
			 UPPER('$xuni'))";
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
	echo '<META HTTP-EQUIV="refresh" CONTENT="2; URL= index.php?menu=66">';
}elseif (isset($_POST['GuardarF'])){
		if ($idficha=='0') {
			$sql4="insert into sys_ficha_tecnica values ('$codprod', 
		UPPER('$xvel'),
		UPPER('$xpresi'),
		UPPER('$xcarga'),
		UPPER('$xexte'),
		'$codprod')";
		$result=mysqli_query($con,$sql4);
		} else {
			$sql5="update sys_ficha_tecnica set 
			ficha_tecnica_vel		=   UPPER ('$xvel'),
			ficha_tecnica_pre		=	UPPER ('$xpresi'),
			ficha_tecnica_carga		=	UPPER ('$xcarga'),
			ficha_tecnica_exte		=	UPPER ('$xexte')
			where ficha_tecnica_id='$idficha'";
			$result=mysqli_query($con,$sql5);
		}

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
	echo '<META HTTP-EQUIV="refresh" CONTENT="2; URL= index.php?menu=66">';
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
		echo '<META HTTP-EQUIV="refresh" CONTENT="2; URL= index.php?menu=66">';
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
	echo '<META HTTP-EQUIV="refresh" CONTENT="2; URL= index.php?menu=66">';
}