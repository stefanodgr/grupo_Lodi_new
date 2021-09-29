<?php
		include "../Funciones/BD.php";
		#Datos
		$xsunc=$_POST['xsunc'];
		$xsunv=$_POST['xsunv'];
    $xbanc=$_POST['xbanc'];
    $xbanv=$_POST['xbanv'];
    $xfec=$_POST['xfec'];
		$xfec= str_replace('/','-',$xfec);
    $fec=date("Y-m-d", strtotime($xfec));
		#Opciones
		$Guardar=$_POST['Guardar'];
		$desac=$_POST['desac'];
		$act=$_POST['act'];
		$edit=$_POST['edit'];


	if ($xsunc<>'' and $Guardar=='Insertar') {
			$sql2="insert into sys_tasa_cambio values ('0','$xsunv','$xsunc','$xbanv','$xbanc',REPLACE(DATE_FORMAT('$fec', '%Y-%m-%d'),'/','-'))";
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
				echo '<META HTTP-EQUIV="refresh" CONTENT="3; URL= index.php?menu=12">';
		} elseif ($edit<>''){
				$sql1="update sys_tasa_cambio set tas_banco_compra='$xbanc', tas_banco_venta='$xbanv', tas_sunat_venta='$xsunv', tas_sunat_compra='$xsunc', tas_fecha='$fec' where tas_id='$edit'";
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
				echo '<META HTTP-EQUIV="refresh" CONTENT="2; URL= index.php?menu=12">';
			}
			 else 	{
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
			echo '<META HTTP-EQUIV="refresh" CONTENT="2; URL= index.php?menu=12">';
	 }

?>
