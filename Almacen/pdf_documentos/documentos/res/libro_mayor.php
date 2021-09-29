<?php
  error_reporting(E_ERROR | E_PARSE);
  include "../../../funciones/BD.php";
  $ruc = $_GET['ruc'];
  $nombre = $_GET['nom'];
  $anual = $_GET['anual'];
  $mes = $_GET['mes'];
  $emp = $_GET['emp'];
  $opc = $_GET['opcion'];
  if ($mes=='1') { $mes = 'ENERO'; } if ($mes=='2') { $mes = 'FEBRERO'; } if ($mes=='3') {  $mes = 'MARZO'; } if ($mes=='4') { $mes = 'ABRIL'; }
  if ($mes=='5') { $mes = 'MAYO'; }  if ($mes=='6') { $mes = 'JUNIO'; } if ($mes=='7') { $mes = 'JULIO'; } if ($mes=='8') { $mes = 'AGOSTO'; }
  if ($mes=='9') { $mes = 'SEPTIEMBRE'; }  if ($mes=='10') { $mes = 'OCTUBRE'; }  if ($mes=='11') { $mes = 'NOVIEMBRE'; } if ($mes=='12') { $mes = 'DICIEMBRE'; }
  $sqlcuenta = "SELECT distinct(asid_cuentad),sp.plade_nombre FROM sys_conta_asientos_general ag,sys_conta_asientos_detalle sd, sys_conta_plan_detalle sp
	WHERE ag.asig_cod = sd.asid_cod and sd.asid_cuentad = sp.plade_codrela  and ag.emp_id = '$emp'
	ORDER BY asid_cuentad";
  $rgral=mysqli_query($con,$sqlcuenta);

?>
<style type="text/css">
.Estilo1 {
	font-size: 9px;
}
.Estilo2 {
	font-size: 9px;
  font-weight: bold;
}

</style>
<page orientation="portrait" style="font-size: 10px" backtop="20mm" backbottom="10mm" backleft="1mm" backright="5mm">
  <?php if ($opc =='basico') { ?>
  <page_header>
<table width="735" border="0">
  <tr>
    <td colspan="2"><strong><?php echo $nombre; ?></strong></td>
    <td width="125"><em>P&aacute;gina: </em><strong>[[page_cu]]</strong></td>
  </tr>
  <tr>
    <td width="300"><strong>R.U.C: <?php echo $ruc; ?></strong></td>
    <td width="300"><strong>LIBRO MAYOR </strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>FORMATO 6.1 </strong></td>
    <td><strong>&nbsp;&nbsp;&nbsp;<?php echo $mes.' '.$anual; ?></strong></td>
    <td>&nbsp;</td>
  </tr>
</table>
<hr />
</page_header>
  <?php  while($row=mysqli_fetch_array($rgral,MYSQLI_ASSOC)){  ?>

<table width="735" border="0">

  <tr>
    <td width="270">CODIGO CUENTA CONTABLE: <strong><?php echo $row['asid_cuentad']; ?></strong></td>
    <td width="465">&nbsp;</td>
  </tr>
  <tr>
    <td>DENOMINACI&Oacute;N DE LA CUENTA CONTABLE: <strong><?php echo $row['plade_nombre']; ?></strong></td>
    <td>&nbsp;</td>
  </tr>

</table>
<table width="735" height="30" border="1">
  <tr align="center">
    <td width="54" rowspan="2"><strong>Fecha Operaci&oacute;n </strong></td>
    <td width="70" rowspan="2"><strong>N&ordm; Correlativo Operaci&oacute;n </strong></td>
    <td width="360" colspan="2"><strong>Descrici&oacute;n o Glosa de la Operaci&oacute;n </strong></td>
    <td width="230" colspan="2"><strong>SALDOS Y MOVIMIENTOS </strong></td>
  </tr>
  <tr align="center">
    <td width="80" height="15"><strong>Documento</strong></td>
    <td width="120"><strong>Glosa</strong></td>
    <td width="92"><strong>DEUDOR</strong></td>
    <td width="92"><strong>ACREEDOR</strong></td>
  </tr>

</table>
<table width="735" border="0">
  <tr align="right">
    <td width="54">&nbsp;</td>
    <td width="70">&nbsp;</td>
    <td width="140">&nbsp;</td>
    <td width="210"><strong>Saldo al Mes APERTURA: </strong></td>
    <td width="110"><strong>0.00</strong></td>
    <td width="110"><strong>0.00</strong></td>
  </tr>
<!-- MOVIMIENTO -->
  <?php
      $id = $row['asid_cuentad'];
      $sqldeta="	SELECT date_format(ag.asig_fecha,'%d/%m%Y') AS fecha,ag.asig_ndocumento,sd.asid_haber, sd.asid_debe FROM sys_conta_asientos_detalle sd, sys_conta_asientos_general ag
	       where sd.asid_cuentad = '$id' AND sd.asid_cod = ag.asig_cod";
      $rdeta=mysqli_query($con,$sqldeta);
      while($row2=mysqli_fetch_array($rdeta,MYSQLI_ASSOC)){  ?>
  <tr align="right">
    <td><?php echo $row2['fecha']; ?></td>
    <td>&nbsp;</td>
    <td><?php echo $row2['asig_ndocumento']; ?></td>
    <td>&nbsp;</td>
    <td><strong><?php $debe =$row2['asid_debe'];
      if ($debe>'0') {
        echo $debe;
      }
    ?></strong></td>
    <td><strong><?php $haber =$row2['asid_haber'];
      if ($haber>'0') {
        echo $haber;
      }
    ?></strong></td>
  </tr>
<?php } ?>
<!--- --->
<?php
$id = $row['asid_cuentad'];
$sqltdebe = "SELECT SUM(asid_debe) as tdebe,SUM(asid_haber) as thaber FROM sys_conta_asientos_detalle WHERE asid_cuentad = '$id'";
$rtdebe=mysqli_query($con,$sqltdebe);
$rdebe=mysqli_fetch_array($rtdebe,MYSQLI_ASSOC);
$tdebe=$rdebe['tdebe'];
$thaber=$rdebe['thaber'];
?>
  <tr align="right">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><strong>Total Movimiento: </strong></td>
    <td><strong><?php echo $tdebe; ?></strong></td>
    <td><strong><?php echo $thaber; ?></strong></td>
  </tr>
  <tr align="right">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><strong>Saldo del Periodo del Reporte: </strong></td>
    <td><strong><?php echo $tdebe; ?></strong></td>
    <td><strong><?php echo $thaber; ?></strong></td>
  </tr>
  <tr align="right">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><strong><?php echo 'TOTALES (Acumulado a '.$mes.'):'; ?></strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr align="right">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><strong><?php echo 'SALDO A '.$mes.':'; ?></strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr align="right">
    <td colspan="6">__________________________________________________________________________________________</td>

  </tr>

</table>
<br /><br />
<?php }} if ($opc=="sunat"){ ?>
<page_header>
      <table width="834" border="0">
        <tr>
          <td width="309"><strong><?php echo $nombre; ?></strong></td>
          <td width="350">&nbsp;</td>
          <td width="60"><em>P&aacute;gina: </em><strong>[[page_cu]]</strong></td>
        </tr>
        <tr>
          <td><strong>R.U.C. : <?= $ruc; ?></strong></td>
          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>LIBRO MAYOR </strong></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td></td>
          <td><strong><?php echo 'Del mes '.$mes.' AL Mes de '.$mes; ?></strong> <br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="Estilo1">De la Cta. 10 a la Cta. 9570904</span></td>
          <td>&nbsp;</td>
        </tr>
      </table>
</page_header>
<table width="1006" border="0">
  <tr>
    <td colspan="10">______________________________________________________________________________________________________________________________________</td>
  </tr>
  <tr align="center">
    <td width="54"><span class="Estilo2">Fecha Reg. </span></td>
    <td width="45"><span class="Estilo2">Asiento </span></td>
    <td width="80"><span class="Estilo2">Nro. Documto. </span></td>
    <td width="80"><span class="Estilo2">Doc. Referencia </span></td>
    <td width="80"><span class="Estilo2">Detalle </span></td>
    <td width="30"><span class="Estilo2">T.C. </span></td>
    <td width="70"><span class="Estilo2">DEBE US$ </span></td>
    <td width="70"><span class="Estilo2">HABER US$ </span></td>
    <td width="70"><span class="Estilo2"> DEBE S/ </span></td>
    <td width="70"><span class="Estilo2">HABER S/ </span></td>
  </tr>
  <tr>
    <td colspan="10">______________________________________________________________________________________________________________________________________</td>
  </tr>
</table>



<?php  } ?>
</page>
