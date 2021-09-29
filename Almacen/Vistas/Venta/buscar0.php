<?php
// Utilizaremos conexion PDO PHP
include "../../../Funciones/BD.php";




//Variable de búsqueda
$consultaBusqueda = $_POST['valorBusqueda'];

//Filtro anti-XSS
$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
$caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;");
$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);

//Variable vacía (para evitar los E_NOTICE)
$mensaje = "";


//Comprueba si $consultaBusqueda está seteado
if (isset($consultaBusqueda)) {

	//Selecciona todo de la tabla mmv001 
	//donde el nombre sea igual a $consultaBusqueda, 
	//o el apellido sea igual a $consultaBusqueda, 
	//o $consultaBusqueda sea igual a nombre + (espacio) + apellido
	$consulta = mysqli_query($con, "SELECT cli_ndoc,cli_razon_social FROM sys_clientes_proveedores WHERE cli_razon_social LIKE '%$consultaBusqueda%'");

	?>

	<div id="div_razon_coti" class="form-group  col-md-4 col-xs-12 col-lg-4">
		<label><small>CLIENTE/PROVEEDOR:</small></label>
		<select class="form-control" id="<?php $mensaje; ?>" name="cliente_proveedor" title="Ingrese la Empresa" onclick="PasarRUCee();">
			<?php
				// $sql5 = "SELECT * FROM sys_empresas";
				// $rsql5 = mysqli_query($con, $sql5);

				if ($row5 = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {

					do {
						echo '<option onclick="PasarRUC();PasarRUCee;" onchange="buscar();" value="' . $row5['cli_razon_social'] . '">' . $row5['cli_razon_social'] . '</option>';
						$mensaje2 = $row5['cli_ndoc'];
					} while ($row5 = mysqli_fetch_array($consulta, MYSQLI_ASSOC));
				}
				?>
		</select>
	</div>
	<?php

		// if ($resul = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {

		// 	do {

		// 		echo '<input type="text" class="form-control text-uppercase" readonly value="' . $resul['cli_ndoc'] . '">';
		// 		$mensaje2 = $resul['cli_ndoc'];
		// 	} while ($resul = mysqli_fetch_array($consulta, MYSQLI_ASSOC));
		// }


		?>

	<div id="div_razon_ruc_buscar" class="form-group  col-md-4 col-xs-12 col-lg-3">
		<label><small> DOCUMENTO:</small></label>
		<input type="text" class="form-control text-uppercase" readonly name="docu" id="mensaje2" value="<?php echo $mensaje2; ?>">
	</div>

<?php
}; //Fin isset $consultaBusqueda

echo $mensaje;
echo $mensaje2;


?>
<script src="js_sg/venta.js?<?= substr(time(), -5) ?>" language="Javascript"></script>
<script>
	function PasarRUCee() { // alert("---LLEGO");
		// var busqueda2 = document.getElementById("docu").value;

		var busqueda2 = document.getElementsByName("cliente_proveedor")[0].value;
		document.getElementById("busqueda").value = busqueda2;
	}

	function OcultarRuc(opc) { //CARGAR TIPO DE CREDITO

		if (opc == '1') {
			document.getElementById("div_ruc_buscar").style.display = "block";
			// $('#xcoticredito').prop('disabled', false);
		} else {
			// document.getElementById("div_forma_credito").style.display = "none";
			// document.getElementById("div_forma_credito_dias").style.display = "none";
			// $('#xcoticredito').prop('disabled', true);
			// $('#xcotidias').prop('disabled', true);

		}
	}
</script>