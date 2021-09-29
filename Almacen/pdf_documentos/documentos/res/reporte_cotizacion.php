<?php
error_reporting(E_ERROR | E_PARSE);

include "../../../funciones/BD.php";
$id_report = $_GET['id'];


$coti_id = $_GET['coti_id'];

$sqlTotal = "SELECT coti_id, SUM(coti_deta_total)as total 
  FROM sys_coti_detalle 
  WHERE coti_id = '$id_report' ";
$resultTotal          = mysqli_query($con, $sqlTotal);
$rsql2                = mysqli_fetch_array($resultTotal, MYSQLI_ASSOC);

$total =  $rsql2['total'];

$sqlCoti_Gene  = "SELECT 
      coti.coti_id,
      coti.coti_tp_docu,
      coti.coti_ruc,
      coti.coti_number,
      coti.coti_razon,
      coti.coti_telf,
      coti.coti_pago,
      coti.emp_id,
      em.emp_nombre,
      coti.coti_estatus,
      coti.coti_ate,
      coti.coti_tp_credito
      FROM sys_cotizacion coti,sys_empresas em 
      where coti.emp_id = em.emp_id 
      AND coti_id = '$id_report' ";
$resultCoti      = mysqli_query($con, $sqlCoti_Gene);
$rsql3                = mysqli_fetch_array($resultCoti, MYSQLI_ASSOC);

$emp 		=  $rsql3['emp_nombre'];																		// 
$razon 	=  $rsql3['coti_razon'];
$number =  $rsql3['coti_number'];
$ate 		=  $rsql3['coti_ate'];
$telf 	=  $rsql3['coti_telf'];
$pago 	=  $rsql3['coti_pago'];



$sqlCoti  = "SELECT 
coti.coti_id,
coti.coti_ruc,
deta.mar_id,
mr.mar_nombre,
deta.coti_deta_cant,
deta.coti_deta_punit,
deta.coti_deta_desc,
deta.coti_deta_total,
deta.produ_deta_id,
pr.produ_deta_nombre,
produ.produ_id,
produ.pais_id,
pais.pais_nombre 
FROM sys_cotizacion coti , sys_coti_detalle deta , sys_marca mr , sys_produ_detalle pr , 
sys_producto produ , sys_pais pais 
where coti.coti_id = deta.coti_id 
AND deta.mar_id = mr.mar_id 
AND produ.pais_id = pais.pais_id 
AND deta.produ_deta_id = pr.produ_deta_id 
AND deta.produ_deta_id = produ.produ_id AND deta.coti_id = '$id_report' ";
$resultC      = mysqli_query($con, $sqlCoti);

?>

<style type="text/css">
	.Estilo1 {
		font-size: 8.5px;
		font-weight: bold;
	}

	.Estilo2 {
		font-size: 12px;
		font-weight: bold;
	}

	.Estilo3 {
		font-size: 10px
	}
</style>
<page orientation="portrait" style="font-size: 12px" backtop="9mm" backbottom="10mm" backleft="1mm" backright="1mm">
	<table width="750" border="0"><?php
																// while ($row = mysqli_fetch_array($resultCoti, MYSQLI_ASSOC)) { 
																?>
		<tr>
			<th scope="row">

				<div>
					<h1 align=" center" style="margin:-4.0% 0;"><?php echo $emp; ?></h1>
					<p align=" center" style="margin-right: 150px;margin:-4.0% 0;">JR EDGAR ZU&Ntilde;IGA 165 SAN LUIS LIMA</p>
					<p align=" center" style="margin-right: 150px;margin:-4.0% 0;">Telf: (51-1) 980100780 / 2031300 ANEXO 120</p>
					<p align=" center" style="margin-right: 150px;margin:-4.0% 0;">Email: juana@grupolodi.com </p>
				</div>

			</th>
		</tr>

	</table>
	<br>
	<hr>
	<br>
	<table width="200" border="0">
		<tr>
			<th width="141" scope="row">Fecha :
				<hr>
			</th>
			<td width="379">
				<div align="justify">Lima,10 de Mayo de 2019 </div>
				<hr>
			</td>
			<td width="206">
				<div align="center">COTIZACION N&deg;
				</div>
			</td>
		</tr>
		<tr>
			<th scope="row">Empresa :
				<hr>
			</th>
			<td>
				<div align="justify"><?php echo $razon; ?>
					<hr>
				</div>
			</td>
			<td>
				<div align="center" border="2"><?php echo $number; ?></div>

			</td>
		</tr>
		<tr>
			<th scope="row">Atencion :
				<hr>
			</th>
			<td>
				<div align="justify"><?php echo $ate; ?> </div>
				<hr>
			</td>
			<td rowspan="2">&nbsp;
			</td>
		</tr>
		<tr>
			<th scope="row">Telefono :
				<hr>
			</th>
			<td>
				<div align="justify"><?php echo $telf; ?></div>
				<hr>
			</td>
		</tr>
		<?php ?>
	</table>
	<p>Reciba nuestro mas cordial saludo,y a la vez le envidiamos a continuacion nuestra cotizacion.</p>
	<table>
		<tr>
			<!-- N° CONTADOR -->
			<th class="text-center" border="1">N°</th>
			<!-- SKU -->
			<th class="text-center" border="1">CANT.</th>
			<th class="text-center" WIDTH="120" border="1">DESCRIPCION</th>
			<th class="text-center" WIDTH="50" border="1">PAIS</th>
			<th class="text-center" WIDTH="120" border="1">MARCA</th>
			<th class="text-center" WIDTH="90" border="1">P.UNITARIO</th>
			<th class="text-center" WIDTH="50" border="1">TOTAL</th>
		</tr>
		<?php $cuenta = 0;
		while ($row1 = mysqli_fetch_array($resultC, MYSQLI_ASSOC)) { ?>
			<tr>
				<td><?php
							$cuenta++;
							echo $cuenta;
							?>
					<hr>
				</td>
				<td><?php echo $row1['coti_deta_cant']; ?>
					<hr>
				</td>
				<td><?php echo $row1['produ_deta_nombre']; ?>
					<hr>
				</td>
				<td><?php echo $row1['pais_nombre']; ?>
					<hr>
				</td>
				<td><?php echo $row1['mar_nombre']; ?>
					<hr>
				</td>
				<td><?php echo $row1['coti_deta_punit']; ?>
					<hr>
				</td>
				<td><?php echo $row1['coti_deta_total']; ?>
					<hr>
				</td>

			</tr>
		<?php } ?>
		<tr border="1">
			<th align="right" colspan="5"><strong>MONTO TOTAL :</strong> </th>
			<th align="right" border="1" colspan="2"><?php echo $total; ?></th>
		</tr>
	</table>
	<br>
	<br>
	<table height="125" border="0">
		<tr>
			<th width="370" scope="col">
				<div align="left">Tipo de Cambio: 3.32 </div>
				<p><strong>NOTA:</strong>&nbsp; El tipo de Cambio puede ser Variable, a la fecha de Facturación .</p>
				<div align="left">
					<p style="margin:-4.0% 0;">- PRECIOS INCLUYEN I.G.V </p>
					<p style="margin:-4.0% 0;">- ENTREGA INMEDIATA DE STOCK</p>
					<p style="margin:-4.0% 0;">- FORMA DE PAGO: <?php echo $pago; ?></p>
					<p style="margin:-4.0% 0;">- VALIDEZ DE LA OFERTA: 30 DIAS</p>
					<p style="margin:-4.0% 0;">- LOS PRECIOS ESTAN SUJETOS A VARIACION DEACUERDO AL MERCADO</p>
				</div>
				<div align="left"></div>
			</th>
			<th width="370" scope="col">
				<p>Cuentas Bancarias </p>
				<p align="left" style="margin:-4.0% 0;">BPC - 1915875452563 SOLES</p>
				<p align="left" style="margin:-4.0% 0;">BPC - 1925365854522 DOLARES </p>
				<div align="center">
					<p>Horarios de Atencion del Almacen</p>
					<p align="left" style="margin:-4.0% 0;">Lunes a Viernes de 8:30am a 1pm y 2pm a 5pm</p>
					<p align="left" style="margin:-4.0% 0;">Sabado de 8:30pm a 1pm </p>
				</div>
			</th>
		</tr>
	</table>
	<p>Agradeciendo su atencion por la presente y esperando vernos favorecidos con su orden,
		nos despedimos de ustedes Atentamente.</p>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>

	<table border="">
		<tr>
			<th width="370" scope="col">
				<div align="left">
					<p style="margin:-4.0% 0;">JUANA QUISPE ANDRADE</p>
					<p style="margin:-4.0% 0;">REPRESENTANTE DE VENTAS</p>
					<p style="margin:-4.0% 0;">Telefono : 2032300 Anexos : 120</p>
					<p style="margin:-4.0% 0;">Nextel : 813*6023 Celular : 980-100780 </p>
				</div>
			</th>
			<br>
			<br>
			<br>
			<br>
			<th width="370" scope="col">
				<hr>
				<br>
				<p align="center"> Aceptacion </p>
			</th>
		</tr>
		<tr>
			<th height="23" colspan="2" scope="row">
			</th>
		</tr>
	</table>
</page>