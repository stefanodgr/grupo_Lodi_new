<?php
$buscar = $_POST['b'];
$contarr= "";

if (!empty($buscar)) {
	$contarr == "1";
	
	buscar($buscar);
}else{
	if ($contarr == "0" || $contarr == ""){
		// echo "vacio";
		echo '  
							<label><small>NOMBRE :</small></label>
							<input type="text" class="form-control text-uppercase" readonly >
						';
	}
}



function buscar($b)
{

	include "../../../Funciones/BD.php";

	$sql = "SELECT * FROM sys_clientes_proveedores WHERE  cli_razon_social LIKE '%" . $b . "%' LIMIT 20";
	$result       = mysqli_query($con, $sql);
	// $rsql7        = mysqli_fetch_array($result, MYSQLI_ASSOC);

	$contar = mysqli_num_rows($result);
// echo  $contar ;
	if ($contar == 0 || $contar == null || $contar == ""  ) {
		echo '  
								<label><small>NOMBRE :</small></label>
								<input type="text" class="form-control text-uppercase"  name="" id=""  readonly value="CLIENTE NO REGISTRADO" >
						';
	} else {

?>
		<label><small>CLIENTE:</small></label>
		<select class="form-control"  id="resultado"  name="resultado" >
		<!-- <select class="form-control"  id="resultado"  name="resultado" onkeyup="Ruc1();" onclick="Ruc1();" onchange="Ruc1();"> -->
			<?php
				// $sql5 = "SELECT * FROM sys_empresas";
				// $rsql5 = mysqli_query($con, $sql5);
				echo "<option value='0' selected>--</option>";
				if ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
					do {
						// $mensaje2 = $row['cli_ndoc'];
						echo '<option id="'. $row['cli_id'].'"  value="' . $row['cli_razon_social'] . '" title ="' . $row['cli_ndoc'] . '"  >' . $row['cli_razon_social'] . '</option>';
						
					} while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC));
				}
				?>
		</select>
			</div>
		
<?php
	}
}


?>

<script src="js_sg/venta.js?<?= substr(time(), -5) ?>" language="Javascript"></script>




