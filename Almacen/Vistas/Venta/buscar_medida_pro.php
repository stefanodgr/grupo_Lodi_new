<?php
$buscar = $_POST['c'];
$contarr_MedidaPro= "";

if (!empty($buscar)) {
	$contarr_MedidaPro == "1";
	
	buscar($buscar);
}else{
	if ($contarr_MedidaPro == "0" || $contarr_MedidaPro == ""){
		// echo "vacio";
		echo '  
			<label><small>MEDIDA :</small></label>
			<input type="text" class="form-control text-uppercase"  name="" id=""  readonly value="PRODUCTO NO EN STOCK" >';
	}
}
function buscar($c){
	include "../../../Funciones/BD.php";
	$sqlPro = "SELECT pr.produ_deta_id as id, CONCAT(produ_desc,'-',mr.mar_nombre) AS medida 
	FROM sys_produ_detalle pr , sys_producto sd ,sys_marca mr 
	WHERE pr.produ_deta_id= sd.produ_id and sd.mar_id = mr.mar_id and sd.produ_clasi_id = 4 and CONCAT(produ_desc,'-',mr.mar_nombre) LIKE '%".$c."%' LIMIT 20";

	$resultPro       	= mysqli_query($con, $sqlPro);
	$rsqlPro        	= mysqli_fetch_array($resultPro, MYSQLI_ASSOC);
	$id 							=  $rsqlPro['id'];
	$medidaPro 				=  $rsqlPro	['medida'];
	// $rsql7        = mysqli_fetch_array($result, MYSQLI_ASSOC);

	$contarMedidaPro = mysqli_num_rows($resultPro);
// echo  $contar ;
	if ($contarMedidaPro == 0 || $contarMedidaPro == null || $contarMedidaPro == ""  ) {
		echo '  
								<label><small>MEDIDA :</small></label>
								<input type="text" class="form-control text-uppercase"  name="" id=""  readonly value="PRODUCTO NO EN STOCK" >
						';
	} else {

?>
		<label><small>MEDIDA :</small></label>
		<select class="form-control"  id="resul_med_pro"  name="resul_med_pro"  > 
			<?php
				echo "<option value='0' selected>--</option>";
				echo '<option  id="'.$id.'"  value="'.$id.'" >'.$medidaPro .'</option>';
				?>
		</select>
<?php
	}
}
?>

<script src="js_sg/venta.js?<?= substr(time(), -5) ?>" language="Javascript"></script>




