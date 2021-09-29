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
	$consulta = mysqli_query($con, "SELECT cli_ndoc,doc_id_sunat,cli_razon_social FROM sys_clientes_proveedores WHERE doc_id_sunat ='6'AND cli_ndoc LIKE '%$consultaBusqueda%'");

	?>

	<div id="div_marca_cam" class="form-group  col-md-4 col-xs-12 col-lg-4">
		<label><small>DOCUMENTO:</small></label>
		<select class="form-control" id="<?php $mensaje; ?>" name="cliente_proveedor_2" title="Ingrese la Empresa">
			<?php
				// $sql5 = "SELECT * FROM sys_empresas";
				// $rsql5 = mysqli_query($con, $sql5);

				if ($row5 = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {

					do {
						echo '<option onclick="PasarRUCee;buscar2();"  value="' . $row5['cli_ndoc'] . '" title ="' . $row5['cli_ndoc'] . '">' . $row5['cli_razon_social'] . '</option>';
						// $mensaje2 = $row5['cli_razon_social'];
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

<?php
}; //Fin isset $consultaBusqueda

echo $mensaje;



?>
<script src="js_sg/venta.js?<?= substr(time(), -5) ?>" language="Javascript"></script>
<script>
	function PasarRUCee() { // alert("---LLEGO");
		// var busqueda2 = document.getElementById("docu").value;

		var busqueda2 = document.getElementsByName("cliente_proveedor_2")[0].value;
		document.getElementById("busqueda_ruc").value = busqueda2;
		// document.getElementById("busqueda_ruc").value = busqueda2;
	}
</script>