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
<HR />
 <table width="741" border="0" align="center">

	<tr>
	
      <td><h2>REPORTE DE SOLICITUDES DEL A&Ntilde;O <?php echo $cedula; ?> </h2></td>
	  
    </tr>
  </table>  
  <table width="492" border="0" align="center">
    <tr bgcolor="#CCCCCC">
      <td width="90"><div align="center">FECHA</div></td>
	   <td width="110"><div align="center">CEDULA</div></td>
	   <td width="150"><div align="center">NOMBRE Y APELLIDO </div></td>
	   <td width="110"><div align="center">TELEFONO </div></td>
      <td width="158"><div align="center">CATEGORIA</div></td>
      <td width="90"><div align="center">ESTATUS</div></td>
    </tr>
	<?php  while($row=mysqli_fetch_array($result2,MYSQLI_ASSOC)){  ?>
    <tr>
      <td align="center"><?php echo date("d-m-Y",strtotime($row['sold_fecha'])); ?></td>
	  <td align="center"><?php echo $row['sol_cedula_rif']; ?></td> 
  
	   <td align="center"><?php echo $row['sol_nombre']; ?></td>
	       <td align="center"><?php echo $row['sol_telefono']; ?></td>
	  <td align="center"><?php echo $row['cat_nombre']; ?></td>
     
      <td align="center"><?php echo $row['sole_control']; ?></td>
    </tr>
	     <?php } ?>
  </table>
  <p>&nbsp;</p>
 
</page>


     


 