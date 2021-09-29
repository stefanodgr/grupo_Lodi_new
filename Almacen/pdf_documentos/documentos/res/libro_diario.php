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
#DATOS GENERALES DEL ASIENTO CONTABLE
$sqlgral="SELECT * FROM sys_conta_asientos_general WHERE emp_id='$emp'   ORDER BY asig_cod";
$rgral=mysqli_query($con,$sqlgral);

?>
<style type="text/css">

.Estilo1 {
	font-size: 10px;
	font-weight: bold;

}

</style>
<page orientation="portrait" style="font-size: 10px" backtop="20mm" backbottom="10mm" backleft="1mm" backright="5mm">
<?php if ($opc =="basico") { ?>
  <page_header>
  <table  border="0">
    <tr>
      <td width="630"><?php echo $nombre; ?></td>
      <td width="100"><em>P&aacute;gina: </em><strong>[[page_cu]]</strong></td>
    </tr>
    <tr>
      <td colspan="2">R.U.C : <?= $ruc; ?></td>
    </tr>
  </table>
  <table  border="0" width="760">
      <tr>
        <td colspan="8"><div align="center"><strong><?php echo $mes.' '.$anual; ?> <br />Expresado en Moneda Nacional</strong><br /> <hr /></div></td>
      </tr>
    <tr>
      <td width="75"><div align="center">CUENTA</div></td>
      <td width="67"><div align="center">DETALLE</div></td>
      <td width="100"><div align="center">AUXILIAR</div></td>
      <td width="112"><div align="center">Nro. Documento</div></td>
      <td width="70"><div align="center">C. Cost.</div></td>
      <td width="95"><div align="center">IMPORTE US$</div></td>
      <td width="85"><div align="center">DEBE</div></td>
      <td width="85"><div align="center">HABER</div></td>
    </tr>
    <tr>
      <td colspan="8"><hr /></td>
    </tr>
  </table>
</page_header>
<br /><br /><br /><br />
  <table width="760" border="0">
<?php  while($row=mysqli_fetch_array($rgral,MYSQLI_ASSOC)){  ?>
 <tr>
   <td >ASIENTO: <strong><?php echo $row['asig_id']; ?></strong> </td>
   <td ><?php
        $iddet= $row['asig_cod'];

        $sqldetalle ="select * from sys_conta_asientos_detalle where asid_cod='$iddet' and  asid_estatus='C'";
        $rdetalle=mysqli_query($con,$sqldetalle);
   ?></td>
   <td >FECHA REG: </td>
   <td ><strong><?php echo $row['asig_fecha']; ?></strong></td>
   <td  colspan="4">&nbsp;</td>
 </tr>
    <?php  while($row2=mysqli_fetch_array($rdetalle,MYSQLI_ASSOC)){  ?>
 <tr>

  <td width="70"><div align="center"><?php echo $row2['asid_cuentad']; ?></div></td>
  <td width="50">&nbsp;</td>
  <td width="84">&nbsp;</td>
  <td width="112"><div align="center"><?php echo $row['asig_ndocumento']; ?></div></td>
  <td width="65">&nbsp;</td>
  <td width="95"><div align="right">
    <?php
        $tasac = $row['asig_tasa'];
        $debeusd=  $row2['asid_debe'];
        $haberusd=  $row2['asid_haber'];
        if ($debeusd>'0') {
          $debeusd = ($debeusd / $tasac);
          $importe  = $debeusd;
        } else {
        if ($haberusd>'0') {
          $haberusd = ($haberusd / $tasac);
          $importe  = $haberusd;
        }}
      #IMPORTE USD - DEBE / HABER
      if ($importe >'0') {
        echo number_format($importe, 2, '.', '');
      }
    ?>
  </div>
  </td>
  <td width="80"><div align="right"><?php echo $row2['asid_debe']; ?></div></td>
  <td width="85"><div align="right"><?php echo $row2['asid_haber']; ?></div></td>

</tr>
<?php } ?>
<tr>
<td colspan="8">_______________________________________________________________________________________________________________________________________</td>
</tr>
<tr align="right">
  <td> &nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td><strong>Moneda: US$</strong></td>
  <td></td>
  <td><strong>T. Cambio:<?php  echo $row['asig_tasa']; ?></strong></td>
  <td><?php
        $iddet= $row['asig_cod'];
        $sqltdebe = "SELECT sum(asid_debe) as tdbe FROM sys_conta_asientos_detalle WHERE asid_cod= '$iddet' AND asid_estatus ='C' ";
        $rdebe=mysqli_query($con,$sqltdebe);
        $debsql=mysqli_fetch_array($rdebe,MYSQLI_ASSOC);
        $tdbe=$debsql['tdbe'];
        if ($tdbe>'0') {
          echo '<strong>'.$tdbe.'</strong>';
        }

   ?></td>
  <td><?php
        $iddet= $row['asig_cod'];
        $sqlthaber = "SELECT sum(asid_haber) as tdha FROM sys_conta_asientos_detalle WHERE asid_cod= '$iddet' AND asid_estatus ='C' ";
        $rhaber=mysqli_query($con,$sqlthaber);
        $habesql=mysqli_fetch_array($rhaber,MYSQLI_ASSOC);
        $tdha=$habesql['tdha'];
        if ($tdha>'0') {
          echo '<strong>'.$tdha.'</strong>';
        }

   ?></td>
</tr>
<tr>
  <td colspan="8">_______________________________________________________________________________________________________________________________________</td>
</tr>
 <?php } ?>
 </table>
<?php }  if ($opc == "sunat") {?>
  <page_header>
    <table width="834" border="0">
      <tr>
        <td width="309"><strong><?php echo $nombre; ?></strong></td>
        <td width="350">&nbsp;</td>
        <td width="60"><em>P&aacute;gina: </em><strong>[[page_cu]]</strong></td>
      </tr>
      <tr>
        <td><strong>R.U.C. : <?= $ruc; ?></strong></td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;<strong>LIBRO DIARIO </strong></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><strong>FORMATO 5.1 </strong></td>
        <td><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $mes.' '.$anual; ?></strong></td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </page_header>
  <table width="832" border="1">
  <tr align="center">
    <td width="40" rowspan="2"><span class="Estilo1">N&ordm; Correl. Operaci </span></td>
    <td width="57" rowspan="2"><span class="Estilo1">Fecha Operaci. </span></td>
    <td width="90" rowspan="2"><span class="Estilo1">Glosa o Descripci&oacute;n de la Operaci&oacute;n </span></td>
    <td colspan="3"><span class="Estilo1">Referencia de la Operaci&oacute;n </span></td>
    <td colspan="2"><span class="Estilo1">Cuenta Contable Asociada a la Operaci&oacute;n </span></td>
    <td colspan="2"><span class="Estilo1">MOVIMIENTOS</span></td>
  </tr>
  <tr align="center">
    <td width="35"><span class="Estilo1">Cod. Libro o Regi. </span></td>
    <td width="47"><span class="Estilo1">N&ordm; Correl. </span></td>
    <td width="74"><span class="Estilo1">N&ordm; Documento Sustentario </span></td>
    <td width="67"><span class="Estilo1">CUENTA</span></td>
    <td width="100"><span class="Estilo1">DENOMINANCION</span></td>
    <td width="60"><span class="Estilo1">DEBE</span></td>
    <td width="60"><span class="Estilo1">HABER</span></td>
  </tr>
</table>
<?php } ?>
</page>
