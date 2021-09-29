<?php
$buscar = $_POST['c'];
$contarr_MedidaAro= "";

if (!empty($buscar)) {
	$contarr_MedidaAro == "1";
	
	buscar($buscar);
}else{
	if ($contarr_MedidaAro == "0" || $contarr_MedidaAro == ""){
		// echo "vacio";
		echo '  
			<label><small>MEDIDA :</small></label>
			<input type="text" class="form-control text-uppercase"  name="" id=""  readonly value="PRODUCTO NO EN STOCK" >';
	}
}
function buscar($c){
	include "../../../Funciones/BD.php";
	$sqlAro = "SELECT pr.produ_deta_id as id, CONCAT(produ_aro_med,'-',mr.mar_nombre) AS medida 
	FROM sys_produ_detalle pr , sys_producto sd ,sys_marca mr 
	WHERE pr.produ_deta_id= sd.produ_id and sd.mar_id = mr.mar_id and sd.produ_clasi_id = 3 and CONCAT(produ_aro_med,'-',mr.mar_nombre) LIKE '%".$c."%' LIMIT 20";

	$resultAro       	= mysqli_query($con, $sqlAro);
	$rsqlAro        	= mysqli_fetch_array($resultAro, MYSQLI_ASSOC);
	$id 							=  $rsqlAro['id'];
	$medidaAro 				=  $rsqlAro	['medida'];
	// $rsql7        = mysqli_fetch_array($result, MYSQLI_ASSOC);

	$contarMedidaAro = mysqli_num_rows($resultAro);
// echo  $contar ;
	if ($contarMedidaAro == 0 || $contarMedidaAro == null || $contarMedidaAro == ""  ) {
		echo '  
								<label><small>MEDIDA :</small></label>
								<input type="text" class="form-control text-uppercase"  name="" id=""  readonly value="PRODUCTO NO EN STOCK" >
						';
	} else {

?>
		<label><small>MEDIDA :</small></label>
		<select class="form-control"  id="resul_med_aro"  name="resul_med_aro"  > 
			<?php
				echo "<option value='0' selected>--</option>";
				echo '<option  id="'.$id.'"  value="'.$id.'" >'.$medidaAro .'</option>';
				?>
		</select>
<?php
	}
}
?>

<script src="js_sg/venta.js?<?= substr(time(), -5) ?>" language="Javascript"></script>




