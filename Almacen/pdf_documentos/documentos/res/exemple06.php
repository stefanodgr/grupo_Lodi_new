<?php
//error_reporting(E_ERROR | E_PARSE);
$cedula=$_GET["estatus"];
        include "../../funciones/conexion.php";
		
	$sql2="SELECT sd.sold_codigo,sd.sol_cedula_rif,sp.sol_nombre,sp.sol_telefono,sc.cat_nombre,sd.sold_descripcion,sd.sold_fecha,se.sole_control,sm.solm_monto FROM solicitud_datos sd,solicitud_personal sp,solictudes_estatus se,solicitud_categoria sc,solicitud_monto sm WHERE sp.sol_cedula_rif=sd.sol_cedula_rif and se.sole_codigo=sd.sold_codigo and sc.cat_codigo=sd.cat_codigo and se.sole_control='$cedula' and sm.solm_codigo=sd.sold_codigo ORDER by sd.sold_codigo ";
$result2=mysqli_query($con,$sql2);

$sql1="SELECT SUM(sm.solm_monto) AS totalg FROM solicitud_monto sm, solictudes_estatus se WHERE se.sole_codigo=sm.solm_codigo AND se.sole_control='$cedula' ";
	$result1=mysqli_query($con,$sql1);
	$rsql1=mysqli_fetch_array($result1,MYSQLI_ASSOC); 
	$total=$rsql1['totalg'];

?>


<page orientation="portrait" style="font-size: 12px">

  <table width="749" height="69" border="0" align="center">
  <tr>
    <td width="68" height="63"><img src="./res/images/escudo_barinas.JPG" alt="" width="64" height="57" />    </td>
    <td width="665" rowspan="2"><table width="612" border="0">
     <tr>
        <td width="599"><span class="Estilo3">GOBERNACION DEL ESTADO BARINAS</span></td>
      </tr>
        <tr>
        <td><span class="Estilo3">SECRETARIA EJECUTIVA DE DESARROLLO SOCIAL</span></td>
      </tr>
	   <tr>
        <td><span class="Estilo3">SISTEMA WEB V.1</span></td>
      </tr>
     <tr>
        <td><span class="Estilo3">FECHA: <?php  echo $fecha = date("d/m/Y"); ?></span></td>
      </tr>
    </table></td>
  </tr>
</table>
<hr />
 <table width="741" border="0" align="center">

	<tr>
	
      <td><h2>REPORTE DE SOLICITUDES APROBADAS</h2></td>
    </tr>
  </table>  
  <table width="592" border="0" align="center">
    <tr bgcolor="#CCCCCC" >
      <td width="77" bor><div align="center">FECHA</div></td>
      <td width="110"><div align="center">CEDULA</div></td>
      <td width="160"><div align="center">NOMBRE Y APELLIDO </div></td>
	  <td width="110"><div align="center">TELEFONO</div></td>
	  <td width="120"><div align="center">CATEGORIA</div></td>
	   <td width="138"><div align="center">MONTO</div></td>
    </tr>
	<?php  while($row=mysqli_fetch_array($result2,MYSQLI_ASSOC)){  ?>
    <tr>
      <td><p align="center"><?php echo date("d-m-Y",strtotime($row['sold_fecha'])); ?></p></td>
      <td><p align="center"><?php echo $row['sol_cedula_rif']; ?></p></td>
      <td><p align="center"><?php echo $row['sol_nombre']; ?></p></td>
	  <td><p align="center"><?php echo $row['sol_telefono']; ?></p></td>
	  <td><p align="center"><?php echo $row['cat_nombre']; ?></p></td>
	  <td><p align="center"><?php echo $row['solm_monto']; ?></p></td>
    </tr>
	     <?php } ?>
  </table>
<hr />
    <table width="592" border="0" align="center">
      <tr>
        <td width="187"><p align="right">&nbsp;</p></td>
        <td width="410" bgcolor="#CCCCCC"><p align="right"><strong>TOTAL EN BFs:</strong></p></td>
        <td width="138" bgcolor="#CCCCCC" ><p align="center"><strong><?php echo $total; ?></strong></p></td>
      </tr>
  </table>

  <p>&nbsp;</p>
</page>


     


 