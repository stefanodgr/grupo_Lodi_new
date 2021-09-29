<?php
$buscar = $_POST['c'];
$contarr_MedidaAce= "";

if (!empty($buscar)) {
	$contarr_MedidaAce == "1";
	
	buscar($buscar);
}else{
	if ($contarr_MedidaAce == "0" || $contarr_MedidaAce == ""){
		// echo "vacio";
		echo '  
			<label><small>MEDIDA :</small></label>
			<input type="text" class="form-control text-uppercase"  name="" id=""  readonly value="PRODUCTO NO EN STOCK" >';
	}
}
function buscar($c){
	include "../../../Funciones/BD.php";
	$sqlAce = "SELECT pr.produ_deta_id as id, CONCAT(produ_desc,'-',produ_pn,'-',mr.mar_nombre) AS medida 
	FROM sys_produ_detalle pr , sys_producto sd ,sys_marca mr 
	WHERE pr.produ_deta_id= sd.produ_id and sd.mar_id = mr.mar_id and sd.produ_clasi_id = 5 and CONCAT(produ_desc,'-',produ_pn,'-',mr.mar_nombre) LIKE '%".$c."%' LIMIT 20";

	$resultAce       	= mysqli_query($con, $sqlAce);
	$rsqlAce       	= mysqli_fetch_array($resultAce, MYSQLI_ASSOC);
	$id 							=  $rsqlAce['id'];
	$medidaAce 				=  $rsqlAce	['medida'];
	// $rsql7        = mysqli_fetch_array($result, MYSQLI_ASSOC);

	$contarMedidaAce = mysqli_num_rows($resultAce);
// echo  $contar ;
	if ($contarMedidaAce == 0 || $contarMedidaAce == null || $contarMedidaAce == ""  ) {
		echo '  
								<label><small>MEDIDA :</small></label>
								<input type="text" class="form-control text-uppercase"  name="" id=""  readonly value="PRODUCTO NO EN STOCK" >
						';
	} else {

?>
		<label><small>MEDIDA :</small></label>
		<select class="form-control"  id="resul_med_ace"  name="resul_med_ace"  > 
			<?php
				echo "<option value='0' selected>--</option>";
				echo '<option  id="'.$id.'"  value="'.$id.'" >'.$medidaAce .'</option>';
				?>
		</select>
<?php
	}
}
?>

<script src="js_sg/venta.js?<?= substr(time(), -5) ?>" language="Javascript"></script>




