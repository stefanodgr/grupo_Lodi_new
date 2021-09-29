<?php
include "../Funciones/BD.php";
#Datos
$xnom		=$_POST['xnom'];
$xmarca		=$_POST['xmarca'];
$xno       =$_POST['xno'];
#Opciones

$edit=$_POST['edit'];

	

		if ($edit<>''){


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
	
	                   $sql2="update sys_modelo set mod_nombre= UPPER ('$xnom'),mar_id= ('$xmarca'),mod_estatus='1',mod_img=('$archivo') where mod_id='$edit'";
						// $sql2="insert into sys_modelo values ('0',UPPER('$xnom'),'1',UPPER('$xmarca'),'$archivo')";
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
				// $sql1="update sys_modelo set mod_nombre= UPPER ('$xnom'),mar_id= ('$xmarca'),mod_estatus='1' where mod_id='$edit'";
				// $result=mysqli_query($con,$sql1);
				// echo"<p>&nbsp;</p>";
				// echo"<p>&nbsp;</p>";
				// echo '
				// <div align="center">
				// 			<div class="col-md-offset-1 col-md-10 col-xs-12">
				// 				<div class="panel panel-primary">
				// 						<div class="panel-heading"><h3>ACTUALIZANDO LOS DATOS </h3></div>
				// 						<div class="panel-body"><div class="progress">
				// 											<div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
				// 	100%
				// 										 </div>
				// 								</div>
				// 				</div>
				// 						</div>
				// 				</div>
				// 			</div>';
			
							// echo '<META HTTP-EQUIV="refresh" CONTENT="2; URL= index.php?menu=4">';
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
			echo '<META HTTP-EQUIV="refresh" CONTENT="2; URL= index.php?menu=4">';
	 }

?>
