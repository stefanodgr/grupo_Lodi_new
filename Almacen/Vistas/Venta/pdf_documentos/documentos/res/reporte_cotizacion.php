<?php
//error_reporting(E_ERROR | E_PARSE);
$cedula=$_GET["xced"];
        include "../../funciones/conexion.php";
		$sql="SELECT * from solicitud_personal where sol_cedula_rif='$cedula' ";
	  $result=mysqli_query($con,$sql);
	  $rsql1=mysqli_fetch_array($result,MYSQLI_ASSOC);
	  $nombre=$rsql1['sol_nombre'];
	  $tele=$rsql1['sol_telefono'];
	  $dir=$rsql1['sol_direccion'];

	$sql2="SELECT sd.sold_codigo,sd.sol_cedula_rif,sp.sol_nombre,sp.sol_telefono,sc.cat_nombre,sd.sold_descripcion,sd.sold_fecha,se.sole_control FROM solicitud_datos sd,solicitud_personal sp,solictudes_estatus se,solicitud_categoria sc WHERE sp.sol_cedula_rif=sd.sol_cedula_rif and se.sole_codigo=sd.sold_codigo and sc.cat_codigo=sd.cat_codigo and sp.sol_cedula_rif='$cedula'  ORDER by sd.sold_codigo ";
$result2=mysqli_query($con,$sql2);

?>


<page orientation="portrait" style="font-size: 12px">

  <table width="1271" border="1">
  <tr>
    <th scope="row"><div align="center">
      <h1 align="center">CONCORD PLUS S.R.L</h1>
      <p align="center">JR EDGAR ZU&Ntilde;IGA 165 SAN LUIS LIMA</p>
      <p align="center">Telf: (51-1) 980100780 / 2031300 ANEXO 120</p>
      <p align="center">Email: juana@grupolodi.com </p>
    </div>
    <div align="center"></div></th>
  </tr>
 </table>
<table width="1271" border="1">
  <tr>
    <th width="141" scope="row">Fecha</th>
    <td width="902"><div align="justify">Lima, 10 de Mayo de 2019 </div></td>
    <td width="206"><div align="center">COTIZACION N&deg; </div></td>
  </tr>
  <tr>
    <th scope="row">Empresa</th>
    <td><div align="justify">METRO DE CARACAS </div></td>
    <td><div align="center">20190828-05</div></td>
  </tr>
  <tr>
    <th scope="row">Atencion</th>
    <td><div align="justify">STEFANO</div></td>
    <td rowspan="2">&nbsp;</td>
  </tr>
  <tr>
    <th scope="row">Telefono</th>
    <td><div align="justify">917-420-455</div></td>
  </tr>
</table>
<p>Reciba nuestro mas cordial saludo, y a la vez le envidiamos a continuacion nuestra cotizacion.</p>
<table width="1271" border="1">
  <tr>
    <td width="19"><div align="center">#</div></td>
    <td width="55"><div align="center">Cantidad</div></td>
    <td width="451"><div align="center">Descripcion</div></td>
    <td width="175"><div align="center">Procedencia</div></td>
    <td width="175"><div align="center">Marca</div></td>
    <td width="199"><div align="center">Precio Unitario </div></td>
    <td width="151"><div align="center">Total</div></td>
  </tr>
  <tr>
    <td><div align="center">1</div></td>
    <td><div align="center">20</div></td>
    <td><div align="center">NEUMATICO 100-20 10 JK TYRE TORNADO KOREA</div></td>
    <td><div align="center">KOREA</div></td>
    <td><div align="center">JK TYPE </div></td>
    <td><div align="center">100</div></td>
    <td><div align="center">2,000</div></td>
  </tr>
  <tr>
    <td><div align="center">2</div></td>
    <td><div align="center">10</div></td>
    <td><div align="center">ACCESORIOS VALVULA 10 VP KOREA</div></td>
    <td><div align="center">KOREA</div></td>
    <td><div align="center">VP</div></td>
    <td><div align="center">100</div></td>
    <td><div align="center">1,000</div></td>
  </tr>
  <tr>
    <td height="32"><div align="center">3</div></td>
    <td><div align="center">10</div></td>
    <td><div align="center">PROTECTORES JSTA CONCORD KOREA</div></td>
    <td><div align="center">KOREA</div></td>
    <td><div align="center">CONCORD</div></td>
    <td><div align="center">100</div></td>
    <td><div align="center">1,000</div></td>
  </tr>
  <tr>
    <td height="32" colspan="6"><div align="center">Monto Total </div></td>
    <td><div align="center">4,000</div></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="1268" height="125" border="1">
   <tr>
     <th width="574" scope="col"><div align="left">Tipo de Cambio: 3.32 </div>       <div align="left">
        <p>- PRECIOS INCLUYEN I.G.V </p>
        <p>- ENTREGA INMEDIATA DE STOCK</p>
        <p>- FORMA DE PAGO: CONTADO</p>
        <p>- VALIDEZ DE LA OFERTA: 30 DIAS</p>
        <p>- LOS PRECIOS ESTAN SUJETOS A VARIACION DEACUERDO AL MERCADO</p>
     </div>       <div align="left"></div></th>
     <th width="678" scope="col"><p>Cuentas Bancarias </p>
     <p align="left">BPC - 1915875452563 SOLES</p>
     <p align="left">BPC - 1925365854522 DOLARES </p>     <div align="center">
       <p>Horarios de Atencion del Almacen</p>
        <p align="left">Lunes a Viernes de 8:30am a 1pm y 2pm a 5pm</p>
        <p align="left">Sabado de 8:30pm a 1pm  </p>
     </div></th>
   </tr>
</table>
 <p>Agradeciendo su atencion por la presente y esperando vernos favorecidos con su orden, nos despedimos de ustedes Atentamente,</p>
 <table width="1279" border="1">
   <tr>
     <th width="576" scope="col"><div align="left">
       <p>JUANA QUISPE ANDRADE</p>
       <p>REPRESENTANTE DE VENTAS</p>
       <p>Telefono : 2032300 Anexos : 120</p>
       <p>Nextel : 813*6023 Celular : 980-100780 </p>
       <p>&nbsp; </p>
     </div></th>
     <th width="687" scope="col"><hr>
     &nbsp;Aceptacion</th>
   </tr>
   <tr>
     <th height="23" colspan="2" scope="row">&nbsp;</th>
   </tr>
 </table>
 <p>&nbsp; </p>
 <p>&nbsp;  </p>

</page>
