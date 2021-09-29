<?php
$buscar = $_POST['b'];

if (!empty($buscar)) {
	buscar($buscar);
}

function buscar($b)
{

	include "../../../Funciones/BD.php";

	$sql = "SELECT * FROM sys_clientes_proveedores WHERE  cli_ndoc LIKE '%" . $b . "%' LIMIT 20";
	$result       = mysqli_query($con, $sql);
	// $rsql7        = mysqli_fetch_array($result, MYSQLI_ASSOC);

	$contar = mysqli_num_rows($result);

	if ($contar == 0) {
		echo "No se han encontrado resultados para '<b>" . $b . "</b>'.";
	} else {

?>
		<label><small>NOMBRE:</small></label>
		<select class="form-control"  id="resultado2"  name="resultado2">
			<?php
				// $sql5 = "SELECT * FROM sys_empresas";
				// $rsql5 = mysqli_query($con, $sql5);

				if ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

					do {

						// $mensaje2 = $row['cli_ndoc'];
						echo '<option onclick="Ruc2();"   id="'. $row['cli_id'].'"  value="' . $row['cli_razon_social'] . '" title ="' . $row['cli_ndoc'] . '"  >' . $row['cli_razon_social'] . '</option>';
						
					} while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC));
				}
				?>
		</select>
		</div>
		<!-- <div id="div_razon_ruc_buscar" class="form-group  col-md-4 col-xs-12 col-lg-12">
		<label><small> DOCUMENTO:</small></label>
		<input type="text" class="form-control text-uppercase" readonly  id="documento_ruc" value="<?php echo $mensaje2; ?>">
	</div> -->
<?php
	}
}


?>




