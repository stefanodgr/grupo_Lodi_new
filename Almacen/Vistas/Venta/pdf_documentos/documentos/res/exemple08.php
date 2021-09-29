<?php
//error_reporting(E_ERROR | E_PARSE);
$cedula=$_GET["codigo"];
        include "../../funciones/conexion.php";
		
	$sql2="SELECT st.solt_codigo,st.solt_institucion,st.solt_fecha,st.solt_soporte,st.solt_descrip,mu.mun_nombre,pa.par_nombre FROM solicitud_tramitacion st,solictudes_estatus se, municipios mu,parroquias pa WHERE se.sole_codigo=st.solt_codigo AND mu.mun_codigo=st.solt_municipio AND pa.par_codigo=st.solt_parroquia AND st.solt_codigo=$cedula ";
$result2=mysqli_query($con,$sql2);
  $rsql1=mysqli_fetch_array($result2,MYSQLI_ASSOC); 
	  $institucion=$rsql1['solt_institucion'];
	  $descrip=$rsql1['solt_descrip'];

?>


<page orientation="portrait" style="font-size: 12px">

  <table width="744" height="69" border="1" align="center">
  <tr>
    <td width="164" height="63"><img src="./res/images/logo.png" alt="" width="156" height="93" />    </td>
    <td width="564" rowspan="2"><table width="561" border="0">
      <tr>
        <td width="555"><H3 align="center">TRAMITACI&Oacute;N DE DOCUMENTOS</H3></td>
      </tr>
      <tr>
        <td>Remitido por:________________________ &nbsp;&nbsp;&nbsp;Firma: ___________________________ </td>
      </tr>
      <tr>
        <td>Organismo: Direcci&oacute;n del despacho del Gobernador </td>
      </tr>
      <tr>
        <td>Fecha de Envio: <strong><?php  echo $fecha = date("d/m/Y"); ?></strong></td>
      </tr>
      <tr>
        <td>Fecha de Entrega: </td>
      </tr>
     
	 
    </table></td>
  </tr>
</table>
  <table width="743" height="41" border="1" align="center">
    <tr>
      <td width="463"><table width="465" border="0">
        <tr>
          <td width="455">Por inter&eacute;s propio: [ &nbsp; ] </td>
        </tr>
        <tr>
          <td>Consulta de desici&oacute;n: [  &nbsp;] </td>
        </tr>
        <tr>
          <td>Informar al Gobernador: [ &nbsp; ] </td>
        </tr>
        <tr>
          <td>Para ser firmado: [ &nbsp; ] </td>
        </tr>
      </table></td>
      <td width="266" rowspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td>Coordinado con: <strong><?php echo  $institucion; ?></strong></td>
    </tr>
  </table> 
  <table width="743" border="1" align="center">
    <tr>
      <td colspan="3"><p>&nbsp;Documentos Adjuntos: </p>
      <p><strong>&nbsp;Descripci&oacute;n:</strong></p>
      <ul>
        <li><?php echo $descrip; ?></li>
      </ul></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;<p>&nbsp;Recibido: ______________________ &nbsp;Fecha: ___________________ &nbsp;Hora: _____________ &nbsp;Firma:____________________________ </p>&nbsp;</td>
    </tr>
    <tr>
      <td width="357"><table width="356" border="0">
        <tr>
          <td><strong>Archivar: [ &nbsp; ] </strong></td>
        </tr>
        <tr>
          <td><strong>Destruir: [ &nbsp; ] </strong></td>
        </tr>
        <tr>
          <td><strong>Digitalizar: [ &nbsp; ] </strong></td>
        </tr>
        <tr>
          <td><strong>Traladar: [ &nbsp; ] </strong></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Reflejar en plan de trabajo: </td>
        </tr>
        <tr>
          <td>Fecha:</td>
        </tr>
        <tr>
          <td>Hora:</td>
        </tr>
      </table></td>
      <td width="370"><table width="356" height="189" border="0">
        <tr>
          <td height="28">INDICACIONES:</td>
        </tr>
        <tr>
          <td height="89">&nbsp;</td>
        </tr>
        <tr>
          <td height="62">&nbsp;</td>
        </tr>
      </table></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</page>
