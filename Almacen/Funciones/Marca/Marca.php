<?php
include "../Funciones/BD.php";
#Datos
$xclasi		=$_POST['xclasi'];
$xmarca		=$_POST['xNomMar'];
$idmarca	=$_POST['xmarca'];
$xmodelo	=$_POST['xmodelo'];
$logo 		=$_POST['logo'];


if ($xmarca==''){
	$xmarca	=$_POST['xmarcaNom'];
}elseif($xmarcaNom==''){
	$xmarca		=$_POST['xNomMar'];
}else{
	echo "ERROR ";
}
#Opciones
$Guardar		=$_POST['Guardar'];
$desac			=$_POST['desac'];
$act			=$_POST['act'];
$edit=$_POST['edit'];
$xno			=$_POST['xno'];

$sqlVerif="SELECT mar_id as verif,mar_nombre  as verifNom FROM sys_marca";
$result       =mysqli_query($con,$sqlVerif);
$rsql3        =mysqli_fetch_array($result,MYSQLI_ASSOC);
$verif       =$rsql3['verif'];
$verifNom    =$rsql3['verifNom'];

if($verifNom == $xmarca){
}else{
	$sqlMarca="SELECT MAX(mar_id)+1 as id FROM sys_marca";
	$result       =mysqli_query($con,$sqlMarca);
	$rsql1        =mysqli_fetch_array($result,MYSQLI_ASSOC);
	$id       =$rsql1['id'];
}
$sqlVerifMd="SELECT mod_nombre  as verifNomMod FROM sys_modelo";
$result       =mysqli_query($con,$sqlVerifMd);
$rsql4        =mysqli_fetch_array($result,MYSQLI_ASSOC);
$verifNomMod    =$rsql4['verifNomMod'];


	if ($xmarca<>'' and $Guardar=='Insertar') {
		if ($_POST["action"] == "upload") {
			// obtenemos los datos del archivo
			$tamano 	= $_FILES["archivo"]['size'];
			$tipo 		= $_FILES["archivo"]['type'];
			$archivo 	= $_FILES["archivo"]['name'];

			// si el archivo es vacio
			if ($archivo != "" and (!((strpos($tipo, "image/gif") || strpos($tipo, "image/jpeg") || strpos($tipo, "image/png")) && ($tamano  < 50000000)))) {
				// guardamos el archivo a la carpeta ficheros
				$destino =  "Logos/" . $archivo;
				$txtruta =  "Logos/" . $archivo;
				if (copy($_FILES['archivo']['tmp_name'], $destino)) {


					$sql2="insert into sys_marca values ('0',UPPER('$xmarca'),'1',UPPER('$xclasi'),'$archivo')";
					// echo "--->".$sql2;
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
				echo '<META HTTP-EQUIV="refresh" CONTENT="3; URL= index.php?menu=4">';
					}
				}
			}
				
		  if($verifNomMod == $xmodelo || $xmodelo == ''){
			return;
		  }elseif($idmarca == ''){

			$sql4="insert into sys_modelo values ('0',UPPER('$xmodelo'),'1','$id')";
			if (!mysqli_query ($con,$sql4)) {
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
			echo '<META HTTP-EQUIV="refresh" CONTENT="3; URL= index.php?menu=4">';
		  }elseif($idmarca<>''){
			$sql4="insert into sys_modelo values ('0',UPPER('$xmodelo'),'1','$idmarca')";
			if (!mysqli_query ($con,$sql4)) {
		  echo("Error description: " . mysqli_error($con)); }
			echo '<hr class="successline" />
			<div class="row">
			 <div class="col-lg-12 col-md-12 col-xs-12">
				 <div class="panel panel-default">
					 <div class="panel-body">
						 <div class="row" id="titulo">
							 <div class="col-lg-12">
								 <div class="col-lg-12 text-center">
										<h2 class="black">  <i class="glyphicon glyphicon-ok suces"></i>&nbsp;<strong>GUARDANDO LOS DATOS</strong></h2>
								 </div>
								</div>
							</div>
							<div class="table-responsive col-lg-12"><hr class="successline" />
								<div class="progress">
									<div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar"  aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
						100%
									</div>
								</div>
						 </div>
						</div>
					</div>
				</div>
			</div>';
			echo '<META HTTP-EQUIV="refresh" CONTENT="3; URL= index.php?menu=4">';
			}else{
				echo "ALETER";
			}	
			} 	elseif ($desac<>''){
				$sql1="update sys_marca set mar_estatus='0' where mar_id='$desac'";
				$result=mysqli_query($con,$sql1);
				echo '<hr class="dangerline" />
				<div class="row">
				 <div class="col-lg-12 col-md-12 col-xs-12">
					 <div class="panel panel-danger">
						 <div class="panel-body">
							 <div class="row" id="titulo">
								 <div class="col-lg-12">
									 <div class="col-lg-12 text-center">
											<h2 class="black"><i class="glyphicon glyphicon-remove dange"></i>&nbsp;<strong>DESHABILITADO LOS DATOS</strong></h2>
									 </div>
									</div>
								</div>
								<div class="table-responsive col-lg-12"><hr class="dangerline" />
									<div class="progress">
										<div class="progress-bar progress-bar-striped progress-bar-danger active" role="progressbar"  aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
							100%
										</div>
									</div>
							 </div>
							</div>
						</div>
					</div>
				</div>';
				echo '<META HTTP-EQUIV="refresh" CONTENT="2; URL= index.php?menu=4">';
			}elseif ($act<>''){
					$sql1="update sys_marca set mar_estatus='1' where mar_id='$act'";
					$result=mysqli_query($con,$sql1);
					echo '<hr class="successline" />
					<div class="row">
					 <div class="col-lg-12 col-md-12 col-xs-12">
						 <div class="panel panel-default">
							 <div class="panel-body">
								 <div class="row" id="titulo">
									 <div class="col-lg-12">
										 <div class="col-lg-12 text-center">
												<h2 class="black">  <i class="glyphicon glyphicon-ok suces"></i>&nbsp;<strong>HABILITANDO LOS DATOS</strong></h2>
										 </div>
										</div>
									</div>
									<div class="table-responsive col-lg-12"><hr class="successline" />
										<div class="progress">
											<div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar"  aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
								100%
											</div>
										</div>
								 </div>
								</div>
							</div>
						</div>
					</div>';
					echo '<META HTTP-EQUIV="refresh" CONTENT="2; URL= index.php?menu=4">';
		} elseif ($edit<>''){

			// echo "LLEGO";
				// obtenemos los datos del archivo
				$tamano 	= $_FILES["archivo"]['size'];
				$tipo 		= $_FILES["archivo"]['type'];
				$archivo 	= $_FILES["archivo"]['name'];
				// echo "---->ARCHIVO->".$archivo;
				// si el archivo es vacio
				if ($archivo != "" and (!((strpos($tipo, "image/gif") || strpos($tipo, "image/jpeg") || strpos($tipo, "image/png")) && ($tamano  < 50000000)))) {

					// guardamos el archivo a la carpeta ficheros
					$destino =  "Logos/" . $archivo;
					$txtruta =  "Logos/" . $archivo;
					if (copy($_FILES['archivo']['tmp_name'], $destino)) {
						// $sql1 = "update sys_empresas set emp_nombre=UPPER('$xnom'), emp_ruc='$xiden', emp_logo='$archivo' where emp_id='$edit'";
						$sql1 = "update sys_marca set mar_nombre= UPPER ('$xmarca'),mar_estatus='1',produ_clasi_id= UPPER ('$xclasi') , mar_logo='$archivo' where mar_id='$edit'";
						// echo "---->".$sql1;
						$result = mysqli_query($con, $sql1);
						unlink("Logos/" . $logo);
					} else {
			$sql2 = "update sys_marca set mar_nombre= UPPER ('$xmarca'),mar_estatus='1',produ_clasi_id= UPPER ('$xclasi') where mar_id='$edit'";
					$result = mysqli_query($con, $sql2);
					}
				} else {
		$sql3 = "update sys_marca set mar_nombre= UPPER ('$xmarca'),mar_estatus='1',produ_clasi_id= UPPER ('$xclasi') where mar_id='$edit'";
					$result = mysqli_query($con, $sql3);
				}
			// echo "llego".$xmarca;
				// $sql1="update sys_marca set mar_nombre= UPPER ('$xmarca'),mar_estatus='1',produ_clasi_id= UPPER ('$xclasi') where mar_id='$edit'";
				// $result=mysqli_query($con,$sql1);
				// DATOS GUARDADOS / HABILITANDO DATOS 
				echo '<hr class="successline" />
				<div class="row">
				 <div class="col-lg-12 col-md-12 col-xs-12">
					 <div class="panel panel-default">
						 <div class="panel-body">
							 <div class="row" id="titulo">
								 <div class="col-lg-12">
									 <div class="col-lg-12 text-center">
											<h2 class="black">  <i class="glyphicon glyphicon-ok suces"></i>&nbsp;<strong>GUARDANDO LOS DATOS</strong></h2>
									 </div>
									</div>
								</div>
								<div class="table-responsive col-lg-12"><hr class="successline" />
									<div class="progress">
										<div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar"  aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
							100%
										</div>
									</div>
							 </div>
							</div>
						</div>
					</div>
				</div>';
				echo '<META HTTP-EQUIV="refresh" CONTENT="2; URL= index.php?menu=4">';
			}else{
				// ERROR / DESHABILITANDO LOS DATOS 
				echo '<hr class="dangerline" />
			 <div class="row">
				<div class="col-lg-12 col-md-12 col-xs-12">
					<div class="panel panel-danger">
						<div class="panel-body">
							<div class="row" id="titulo">
								<div class="col-lg-12">
									<div class="col-lg-12 text-center">
										 <h2 class="black"><i class="glyphicon glyphicon-remove dange"></i>&nbsp;<strong>EROR EN LOS DATOS</strong></h2>
									</div>
								 </div>
							 </div>
							 <div class="table-responsive col-lg-12"><hr class="dangerline" />
								 <div class="progress">
									 <div class="progress-bar progress-bar-striped progress-bar-danger active" role="progressbar"  aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
						 100%
									 </div>
								 </div>
							</div>
						 </div>
					 </div>
				 </div>
			 </div>';
			echo '<META HTTP-EQUIV="refresh" CONTENT="2; URL= index.php?menu=4">';
	 }

?>
