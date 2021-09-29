<?php
$buscar = $_POST['c'];
$contarr_MedidaCam= "";

if (!empty($buscar)) {
	$contarr_MedidaCam == "1";
	
	buscar($buscar);
}else{
	if ($contarr_MedidaCam == "0" || $contarr_MedidaCam == ""){
		// echo "vacio";
		echo '  
			<label><small>MEDIDA :</small></label>
			<input type="text" class="form-control text-uppercase"  name="" id=""  readonly value="PRODUCTO NO EN STOCK" >';
	}
}



function buscar($c)
{

	include "../../../Funciones/BD.php";
	$sqlCamara = "SELECT pr.produ_deta_id as idcam, CONCAT(produ_cam_med,'-',produ_cam_aro,'-',mr.mar_nombre) AS medidacam
	FROM sys_produ_detalle pr , sys_producto sd ,sys_marca mr 
	WHERE pr.produ_deta_id= sd.produ_id 
	and sd.mar_id = mr.mar_id 
	and sd.produ_clasi_id = 2 
	and CONCAT(produ_cam_med,'-',produ_cam_aro,'-',mr.mar_nombre) LIKE '%".$c."%' LIMIT 20";

	$resultCam       = mysqli_query($con, $sqlCamara);
	$rsqlCam        = mysqli_fetch_array($resultCam, MYSQLI_ASSOC);
	$idCam 				=  $rsqlCam['idcam'];
	$medidaCa 			=  $rsqlCam['medidacam'];
	// $rsql7        = mysqli_fetch_array($result, MYSQLI_ASSOC);

	$contarMedidaCam = mysqli_num_rows($resultCam);
// echo  $contar ;
	if ($contarMedidaCam == 0 || $contarMedidaCam == null || $contarMedidaCam == ""  ) {
		echo '  
								<label><small>MEDIDA :</small></label>
								<input type="text" class="form-control text-uppercase"  name="" id=""  readonly value="PRODUCTO NO EN STOCK" >
						';
	} else {

?>
		<label><small>MEDIDA :</small></label>
		<select class="form-control"  id="resul_med_cam"  name="resul_med_cam"  > 
			<?php
				echo "<option value='0' selected>--</option>";
				echo '<option  id="'.$idCam.'"  value="'.$idCam.'" >'.$medidaCa .'</option>';
				?>
		</select>
<?php
	}
}
?>

<script src="js_sg/venta.js?<?= substr(time(), -5) ?>" language="Javascript"></script>




