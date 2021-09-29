<?php
//error_reporting(E_ERROR | E_PARSE);
$cedula=$_GET["anual"];
        include "../../funciones/conexion.php";
		
	$sql2="SELECT sd.sold_codigo,sd.sol_cedula_rif,sp.sol_nombre,sp.sol_telefono,sc.cat_nombre,sd.sold_descripcion,sd.sold_fecha,se.sole_control FROM solicitud_datos sd,solicitud_personal sp,solictudes_estatus se,solicitud_categoria sc WHERE sp.sol_cedula_rif=sd.sol_cedula_rif and se.sole_codigo=sd.sold_codigo and sc.cat_codigo=sd.cat_codigo and EXTRACT(YEAR FROM sd.sold_fecha)=$cedula ORDER by sd.sold_codigo ";
$result2=mysqli_query($con,$sql2);

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
        <td><span class="Estilo3">DIRECCION DEL DESPACHO DEL GOBERNADOR</span></td>
      </tr>
     
	 
    </table></td>
  </tr>
</table>

  <table width="722" border="0" align="center">
   
    <tr>
      <td width="248"><div align="center"><strong>FECHA: 
        <?php  echo $fecha = date("d/m/Y"); ?>
      </strong></div></td>
      <td width="396">&nbsp;</td>
      <td width="64">&nbsp;</td>
    </tr>
  </table>
  <table width="741" border="0" align="center">
    <tr><td>&nbsp;</td></tr>
	<tr>
	
      <td><h2>REPORTE DE SOLICITUDES DEL A&Ntilde;O <?php echo $cedula; ?> </h2></td>
    </tr>
  </table>  
  <table width="592" border="1" align="center">
    <tr bgcolor="#CCCCCC">
      <td width="77"><div align="center">FECHA</div></td>
      <td width="158"><div align="center">CATEGORIA</div></td>
      <td width="239"><div align="center">NOMBRE Y APELLIDO </div></td>
      <td width="90"><div align="center">ESTATUS</div></td>
    </tr>
	<?php  while($row=mysqli_fetch_array($result2,MYSQLI_ASSOC)){  ?>
    <tr>
      <td><?php echo date("d-m-Y",strtotime($row['sold_fecha'])); ?></td>
      <td><?php echo $row['cat_nombre']; ?></td>
      <td><?php echo $row['sol_nombre']; ?></td>
      <td><?php echo $row['sole_control']; ?></td>
    </tr>
	     <?php } ?>
  </table>
  <p>&nbsp;</p>
  <table width="592" border="0" align="center">
	<tr>
        <td></td>
    </tr>
      <tr>
        <td width="592"><h2 align="center">GRAFICO DE SOLICITUDES DEL A&Ntilde;O <?php echo $cedula; ?> </h2>
		&nbsp;
		<img src="./res/generated/grafica.png" alt="" width="600" height="250" /></td>
    </tr>
    </table>

</page>


     


 