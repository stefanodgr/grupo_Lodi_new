<?php
$buscar = $_POST['c'];
$contarr_MedidaNeu= "";

if (!empty($buscar)) {
	$contarr_MedidaNeu == "1";
	
	buscar($buscar);
}else{
	if ($contarr_MedidaNeu == "0" || $contarr_MedidaNeu == ""){
		// echo "vacio";
		echo '  
			<label><small>MEDIDA :</small></label>
			<input type="text" class="form-control text-uppercase"  name="" id=""  readonly value="PRODUCTO NO EN STOCK" >';
	}
}



function buscar($c)
{

	include "../../../Funciones/BD.php";
	$sql = "SELECT pr.produ_deta_id AS id, exi.produ_exi_id, em.emp_id, 
	CONCAT(produ_neu_ancho_inter,'/',produ_neu_serie,'R',produ_neu_aro,'R','-',mr.mar_nombre,'-',em.emp_nombre,'-DISPONIBLE-',exi.produ_exi_cant) AS medida 
	FROM sys_produ_detalle pr , sys_producto sd ,sys_marca mr , sys_empresas em, sys_produ_existente exi 
	WHERE pr.produ_deta_id		= sd.produ_id 
	AND sd.mar_id 						= mr.mar_id 
	AND exi.emp_id 						= em.emp_id 
	AND exi.produ_deta_id			= pr.produ_deta_id 
	AND sd.produ_clasi_id 		= 1
	AND CONCAT(produ_neu_ancho_inter,'/',produ_neu_serie,'R',produ_neu_aro,'R','-',mr.mar_nombre,'-',em.emp_nombre) LIKE '%" . $c . "%' LIMIT 20";

	$result       = mysqli_query($con, $sql);
	$rsql2        = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$idNeu 				=  $rsql2['id'];
	$medida 			=  $rsql2['medida'];
	 echo "---->".$idNeu;
	$contarMedidaNeu = mysqli_num_rows($result);
// // echo  $contar ;
	if ($contarMedidaNeu == 0 || $contarMedidaNeu == null || $contarMedidaNeu == ""  ) {
		echo '  
								<label><small>MEDIDA :</small></label>
								<input type="text" class="form-control text-uppercase"  name="" id=""  readonly value="PRODUCTO NO EN STOCK" >
						';
	} else {
?>
		<label><small>MEDIDA :</small></label>
		<select class="form-control"  id="resul_med_neu"  name="resul_med_neu"> 
			<?php
				echo "<option value='0' selected>--</option>";
				echo '<option  id="'.$idNeu.'"  value="' . $idNeu . '" >' . $medida . '</option>';
				?>
		</select>
<?php
	}
}
?>

<script src="js_sg/venta.js?<?= substr(time(), -5) ?>" language="Javascript"></script>




