<?php
error_reporting(E_ERROR | E_PARSE);
include "../../../funciones/BD.php";
$opc = $_GET['opc'];
$id = $_GET['id'];
$fec = $_GET['fecpago'];
$fecrepor = date ("Ymd",strtotime($fec));
$cbanco = $_GET['xcuent'];
$ccliente =$_GET['xcodban'];
$rbanco =$_GET['banid'];



#TITULO
$sqltitulo = "SELECT date_format(ht.hist_desde,'%Y%m%d') as fec,se.emp_id,se.emp_logo,se.emp_nombre,se.emp_ruc,EXTRACT(MONTH FROM ht.hist_desde) AS hmes,EXTRACT(YEAR FROM ht.hist_desde) AS anual FROM sys_rh_historico ht,sys_empresas se
WHERE hist_id =$id and se.emp_id = ht.emp_id";
$rtitulo=mysqli_query($con,$sqltitulo);
$rsqltt=mysqli_fetch_array($rtitulo,MYSQLI_ASSOC);
$mes=$rsqltt['hmes'];
$anual=$rsqltt['anual'];
#Datos de la empresa
$nomepm=$rsqltt['emp_nombre'];
$rucepm=$rsqltt['emp_ruc'];
$hempid=$rsqltt['emp_id'];
$heloho=$rsqltt['emp_logo'];
# Reporte Bancos
  if ($opc == "bancos") {
      $sqlempresa = "select emp_codban from sys_empresas WHERE emp_id='$hempid' AND emp_codban = '$ccliente' ";
      $rempresa=mysqli_query($con,$sqlempresa);
      $row_emp = mysqli_num_rows($rempresa);
    if ($row_emp==0) {
      $upemp="UPDATE  sys_empresas set emp_codban = '$ccliente', emp_cuenta='$cbanco', ban_id='$rbanco' WHERE emp_id = '$hempid'";
      $rupdate=mysqli_query($con,$upemp);
    }
  }


if ($mes=='1') { $mes = 'ENERO'; } if ($mes=='2') { $mes = 'FEBRERO'; } if ($mes=='3') {  $mes = 'MARZO'; } if ($mes=='4') { $mes = 'ABRIL'; }
if ($mes=='5') { $mes = 'MAYO'; }  if ($mes=='6') { $mes = 'JUNIO'; } if ($mes=='7') { $mes = 'JULIO'; } if ($mes=='8') { $mes = 'AGOSTO'; }
if ($mes=='9') { $mes = 'SEPTIEMBRE'; }  if ($mes=='10') { $mes = 'OCTUBRE'; }  if ($mes=='11') { $mes = 'NOVIEMBRE'; } if ($mes=='12') { $mes = 'DICIEMBRE'; }
#PRINCIPAL
$sqlprin="select histdet_id,histdet_ndoc,histdet_nomape,truncate(histdet_sueldo,2) histdet_sueldo from sys_rh_historico_detalle WHERE hist_id='$id'";
$rprin=mysqli_query($con,$sqlprin);
#SECUNDARIO
$sqlsecun="select histdet_id,histdet_ndoc,histdet_nomape,histdet_cargo,histdet_cuspp,histdet_fondo,histdet_area,truncate(histdet_sueldo,2) histdet_sueldo, date_format(histdet_fecing,'%d-%m-%Y') histdet_fecing from sys_rh_historico_detalle WHERE hist_id='$id'";
$rsecun=mysqli_query($con,$sqlsecun);

$sqlcant="SELECT COUNT(histdet_ndoc) as ncant FROM sys_rh_historico_detalle WHERE hist_id='$id'";
$rcant=mysqli_query($con,$sqlcant);
$rcantt=mysqli_fetch_array($rcant,MYSQLI_ASSOC);
$cantid=$rcantt['ncant'];

#bancos
$sqlbancos="select histdet_id,histdet_ndoc,histdet_nomape,truncate(histdet_sueldo,2) histdet_sueldo from sys_rh_historico_detalle WHERE hist_id='$id'";
$rbanc=mysqli_query($con,$sqlbancos);

?>
<style type="text/css">
.Estilo0 {font-size: 10px;}
.Estilo03 {font-size: 9px; }
.Estilo1 {font-size: 9px; font-weight: bold; }
.Estilo11 {font-size: 7px; font-weight: bold; }
.Estilo13 {font-size: 8px; font-weight: bold; }
.Estilo3 {font-size: 7px; font-weight: bold; }
.Estilo33 {font-size: 6.5px; font-weight: bold; }
.Estilo34 {font-size: 6.5px;  }
.ttotal {
border: 1.1px solid black;
background-color: #eaa392;
}
hr.v{
width: 1px;
height: 500px;
}
.trem {
border: 1.5px solid black;
background-color:#85bdde;
}
.Estilo2 {font-size: 11px; font-weight: bold; }
.subban {font-size: 9.5px; font-weight: bold; }
.subbande {font-size: 9px;  }
.tban {
border: 1.1px solid black;
background-color:#e9f764;
}
.tborde {
  border: 1.1px solid black;
}
.Estilo4 {font-size: 9px; font-weight: bold; color:red; }

.vl {

  border-left: 1.5px dotted black;
  height: 630px;
  text-align: center;
}

</style>

<?php if ($opc=='boletas'){
  #Config Reporte
  $sqldreport="SELECT MIN(hist_id) as minimo, max(histdet_id) as maximo, count(histdet_ndoc) ntraba
FROM sys_rh_historico_detalle WHERE hist_id=$id";
  $rdreport=mysqli_query($con,$sqldreport);
  $rreport=mysqli_fetch_array($rreport,MYSQLI_ASSOC);
  $pos_mini=$rcantt['minimo'];
  $pos_maxi=$rcantt['maximo'];
  $ntrabajador=$rcantt['ntraba'];

  $i = 1;
  while ($i <= 5) {
    $sqldni ="SELECT histdet_ndoc,histdet_nomape,truncate(histdet_sueldo,2) histdet_sueldo,date_format(histdet_fecnac,'%d/%m/%Y') histdet_fecnac,
    histdet_fondo,date_format(histdet_fecing,'%d/%m/%Y') histdet_fecing,histdet_cuspp,histdet_cargo,histdet_area FROM sys_rh_historico_detalle WHERE histdet_id ='$i' AND hist_id='$id' ";
    $rdni=mysqli_query($con,$sqldni);
    $rrdni=mysqli_fetch_array($rdni,MYSQLI_ASSOC);
    $xdni=$rrdni['histdet_ndoc'];
    $xnomape=$rrdni['histdet_nomape'];
    $xsueldo=$rrdni['histdet_sueldo'];
    $xfecnac=$rrdni['histdet_fecnac'];
    $xfondo=$rrdni['histdet_fondo'];
    $xfecing=$rrdni['histdet_fecing'];
    $xcuspp=$rrdni['histdet_cuspp'];
    $xcargo=$rrdni['histdet_cargo'];
    $xarea=$rrdni['histdet_area'];

    #REMUNERACIONES
    $sqlremu="SELECT CONCAT(histmov_nombre,' ', truncate(histmov_monto,2)) remun FROM sys_rh_historico_moviento WHERE hist_id ='$id'
    and histmov_ndoc='$xdni' and histmov_tipo =1";
    $rremunera  = mysqli_query($con,$sqlremu);
    #DESCUENTOS
    $sqlrdescu="SELECT CONCAT(histmov_nombre,' ', truncate(histmov_monto,2)) descu FROM sys_rh_historico_moviento WHERE hist_id ='$id'
    and histmov_ndoc='$xdni' and histmov_tipo =0";
    $rdescu  = mysqli_query($con,$sqlrdescu);
    #APORTES

?>

  <page orientation="paysage" style="font-size: 9px">
    <page_header>
      <table style="width: 100%; border: solid 0px #000;">
        <tr >
          <td  style="width: 49.5%; border: solid 1px #000;">
            <table align="center" style=" margin-top: 1px; border: solid 1.1px #000;">
            <tr>
              <td align="center" height="60" width="200" rowspan="3"><img src="../../../Logos/CONCORD.png" height="50" width="180"/></td>
              <td align="center" width="310"><span class="Estilo0"><u>BOLETA DE PAGO DE REMUNERACIONES</u></span></td>
            </tr>
            <tr align="center">
              <td><span class="Estilo03">Decreto Supremo Nro 01-98 TR del 22.01.98</span> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
          </table>
          <table align="center" height="92" style=" border: solid 1.1px #000;">
          <tr>
            <td width="350" height="12">Raz&oacute;n Social:<strong> <?php echo $nomepm; ?></strong></td>
            <td width="160">R.U.C. <strong><?php echo $rucepm; ?></strong></td>
          </tr>
          <tr>
            <td height="12" colspan="2">Direcci&oacute;n: JR. EDGAR ZUÑIGA 165 - SAN LUIS</td>
          </tr>
          <tr>
            <td height="12" colspan="2">Mes y A&ntilde;o: <i><?php echo $mes.' '.$anual; ?></i></td>
            </tr>
        </table>
        <table align="center" style="margin-top: 2px; border: solid 1.1px #000;">
     <tr>
       <td height="12" colspan="3">DATOS DEL TRABAJADOR</td>
     </tr>
     <tr>
       <td width="516" height="12" colspan="3">Apellidos y Nombres: <strong><?php echo $xnomape; ?></strong></td>
     </tr>
     <tr>
       <td height="12" colspan="2">Total Remun. S/ <strong><?php echo $xsueldo; ?></strong></td>
       <td height="23">DNI <strong><?php echo $xdni; ?></strong></td>
     </tr>
     <tr>
       <td height="12" colspan="3">Estableci. JR. EDGAR ZUÑIGA 165 - SAN LUIS</td>
       </tr>
     <tr>
       <td height="12">Fec Nacim. <?php echo $xfecnac; ?></td>
       <td height="12">Tipo Traba. 21-Empleado </td>
       <td height="12">Afiliacion: <strong><?php echo $xfondo; ?></strong></td>
     </tr>
     <tr>
       <td height="12" colspan="2">Fec. Ingreso <?php echo $xfecing; ?></td>
       <td height="12">Autogenerado.</td>
     </tr>
     <tr>
       <td width="158" height="23">Fec. Cese CONTINUA</td>
       <td width="176">Dias Subsiadiados </td>
       <td height="12">CUSPP <strong><?php echo $xcuspp; ?></strong></td>
     </tr>
     <tr>
       <td height="12">Dias Trabaj. 31</td>
       <td height="12">Faltas Justificadas </td>
       <td height="12">Cargo <span class="Estilo1"><?php echo $xcargo; ?></span></td>
     </tr>
     <tr>
       <td height="23">Area <strong><?php echo $xarea; ?></strong></td>
       <td height="23">Hrs.Min.Trab. </td>
       <td height="23">Dia No Trab y No Sub:</td>
     </tr>
   </table>
   <table align="center" style="margin-top: 2px; border: solid 1.1px #000;">
       <tr>
         <td width="186">Tot. Sobretiempo: 0hrs. 0 min. </td>
         <td width="146">H.E. 25%: 0 hrs. 0 min. </td>
         <td width="172">H.E. 35%: 0 hrs. 0 min. </td>
       </tr>
       <tr>
         <td>&nbsp;</td>
         <td>H.E. 60%: 0 hrs. 0 min. </td>
         <td>H.E. 100%: 0 hrs. 0 min. </td>
       </tr>
     </table>
     <table align="center" style="margin-top: 2px;">
       <tr align="center">
         <td class="tborde" width="165">REMUNERACIONES</td>
         <td class="tborde" width="166">DESCUENTOS</td>
         <td class="tborde" width="165">APORTACIONES</td>
       </tr>
       <tr>
         <td><table border="1">
           <?php while($rerow=mysqli_fetch_array($rremunera,MYSQLI_ASSOC)){ ?>
              <tr>
                <td  width="164"><span class="Estilo1"><?php echo $rerow['remun'];  ?></span></td>
              </tr>
            <?php }  ?>
            </table></td>
         <td><table  border="1">
           <?php while($derow=mysqli_fetch_array($rdescu,MYSQLI_ASSOC)){ ?>
              <tr>
                <td  width="165"><span class="Estilo1"><?php echo $derow['descu'];  ?></span></td>
              </tr>
            <?php }  ?>
            </table></td>
         <td><table  border="0">
              <tr>
                <td  width="164">&nbsp;</td>
              </tr>
            </table></td>
       </tr>
     </table>
     <table align="center" style="margin-top: 2px;">
       <tr>
         <td class="tborde" width="200">Tot. Afecto a Desc. </td>
         <td class="tborde" width="200">(*) Conceptos Afectos</td>
         <td width="101"></td>
       </tr>
     </table>
     <table align="center">
       <tr>
         <td class="tborde" width="184">Tot. Remuneraci&oacute;n </td>
         <td class="tborde" width="156">Total Descuento </td>
         <td class="tborde" width="156">Tot. Aportac. </td>
       </tr>
       <tr>
         <td>Tot. EFECTIVO </td>
         <td>Tot. ALIMENTOS 0.00 </td>
         <td>Tot. CANASTA 0.00 </td>
       </tr>
     </table>
     <table align="center" style="margin-top: 2px; border: solid 0px #000;">
       <tr>
         <td width="170">Mayo, 31 del 2019 </td>
         <td align="right" width="164"><strong>Neto Recibido </strong></td>
         <td width="170">S/</td>
       </tr>
     </table>
     <table align="center" style="margin-top: 16px; border: solid 0px #000;">
       <tr align="center">
         <td width="180">&nbsp;</td>
         <td width="143">Recibi Conforme </td>
         <td width="180">&nbsp;</td>
       </tr>
       <tr align="center">
         <td>.............................................</td>
         <td>&nbsp;</td>
         <td>.............................................</td>
       </tr>
       <tr align="center">
         <td>Empleador</td>
         <td>&nbsp;</td>
         <td><span class="Estilo1">Firma del Trabajador</span> </td>
       </tr>
       <tr align="center">
         <td>&nbsp;</td>
         <td>&nbsp;</td>
         <td><span class="Estilo1"><?php echo $xnomape; ?></span></td>
       </tr>
       <tr align="center">
         <td>&nbsp;</td>
         <td>&nbsp;</td>
         <td><span class="Estilo1">D.N.I:<?php echo $xdni; ?></span></td>
       </tr>
     </table>&nbsp;  </td>
      </tr >
      </table>
    </page_header>
  </page>

<?php


 $i++;  }


} ?>
<?php if ($opc=='resumen'){ ?>
<page orientation="landscape" style="font-size: 9px" backtop="1mm" backbottom="5mm" backleft="0mm" backright="1mm">
  <page_header>
  <table width="898" border="0">
    <tr>
      <td colspan="2"><strong><?php echo $nomepm; ?></strong></td>
      <td width="95"><em>P&aacute;gina: </em><strong>[[page_cu]]</strong></td>
    </tr>
    <tr>
      <td width="345"><strong><?php echo 'RUC:'.' '.$rucepm; ?></strong></td>
      <td width="600">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3"><div align="center"><strong>PLANILLA DE REMUNERACIONES </strong></div></td>
    </tr>
    <tr>
      <td colspan="3"><div align="center"><strong><?php echo $mes.' '.$anual; ?></strong> </div></td>
    </tr>
  </table>
  <table  border="0">
        <tr align="center">
          <td  height="20">&nbsp;</td>
          <td>&nbsp;</td>
          <td height="25">&nbsp;</td>
          <td class="trem" colspan="5"><span class="Estilo1">REMUNERACION</span></td>
          <td class="trem" colspan="9"><span class="Estilo1">DESCUENTOS</span></td>
          <td>&nbsp;</td>
        </tr>

        <tr align="center">
            <!---->

            <td class="tban"  height="20" width="20"><strong>#</strong></td>
            <td class="tban" width="50"><span class="Estilo1">DNI</span></td>
            <td class="tban" width="160"><span class="Estilo1">NOMBRE</span></td>
            <td class="tban" width="55"><span class="Estilo33">REMUNERACION BASICA </span></td>
            <td class="tban" width="45"><span class="Estilo33">COMISIONES </span></td>
            <td class="tban" width="40"><span class="Estilo33">ASIGNACION FAMILIAR </span></td>
            <td class="tban" width="40"><span class="Estilo33">VACACIONES</span></td>
            <td class="tban" width="55"><span class="Estilo33">TOTAL REMUNERACION </span></td>
            <!--<td width="50"><span class="Estilo1">AFTP R. </span></td>-->
            <td class="tban" width="45"><span class="Estilo3">FONDO PENSIONES
              AFP </span></td>
            <td class="tban" width="45"><span class="Estilo3">COMISION PORCENTUAL
              -AFP </span></td>
            <td class="tban" width="35"><span class="Estilo3">PRIMA SEGURO
              -AFP </span></td>
            <td class="tban" width="40"><span class="Estilo33">5TA CATEGORIA </span></td>
            <td class="tban" width="45"><span class="Estilo33">ADELANTOS</span></td>
            <td class="tban" width="40"><span class="Estilo33">PRESTAMOS</span></td>
            <td class="tban" width="40"><span class="Estilo33">FALTAS / SUSPENCION L.</span></td>
            <td class="tban" width="50"><span class="Estilo33">TOTAL DESCUENTOS </span></td>
            <td class="tban" width="45"><span class="Estilo33">ESSALUD</span></td>
            <td class="tban" width="55"><span class="Estilo33">NETO A PAGAR </span></td>
          </tr>

<?php
$cuenta = 1;
while($row=mysqli_fetch_array($rprin,MYSQLI_ASSOC)){ ?>
          <tr>
            <td align="center" class="tborde"><span class="Estilo33"><?php echo $cuenta++; ?></span></td>
            <td class="tborde"><span class="Estilo33"><?php echo $row['histdet_ndoc']; ?></span></td>
            <td class="tborde"><span class="Estilo33"><?php echo $row['histdet_nomape']; ?></span></td>
            <td align="center" class="tborde"><span class="Estilo33"><?php echo $row['histdet_sueldo']; ?></span></td>
            <td align="center" class="tborde"><span class="Estilo33">
              <?php $doc = $row['histdet_ndoc'];
              $sqlcomi="SELECT (CASE WHEN histmov_monto IS NULL THEN 0.00 ELSE truncate(histmov_monto,2) END) AS comi FROM sys_rh_historico_moviento
              where histmov_codigo=23  AND histmov_ndoc=$doc and hist_id=$id";
              $rcomi=mysqli_query($con,$sqlcomi);
              $rsqlcomi=mysqli_fetch_array($rcomi,MYSQLI_ASSOC);
              $comi=$rsqlcomi['comi'];
              if ($comi=='') { $comi='0.00';  }
              echo $comi; ?>
            </span></td>
            <td align="center" class="tborde"><span class="Estilo33">
              <?php
              $sqldeb="SELECT (CASE WHEN histmov_monto IS NULL THEN 0.00 ELSE truncate(histmov_monto,2) END) AS asigf FROM sys_rh_historico_moviento
              where histmov_codigo=24  AND histmov_ndoc=$doc and hist_id=$id";
              $result4=mysqli_query($con,$sqldeb);
              $rsql=mysqli_fetch_array($result4,MYSQLI_ASSOC);
              $asigf=$rsql['asigf'];
              if ($asigf=='') { $asigf='0.00';  }
              echo $asigf;
              ?></span></td>
            <td align="center" class="tborde"><span class="Estilo33">0.00</span></td>
            <td align="center" class="tborde"><span class="Estilo33"><?php
              $sueldo=$row['histdet_sueldo'];
              $rtotal =  $sueldo + $comi + $asigf;
              echo number_format($rtotal, 2, '.', '')?>
            </span></td>
            <td align="center" class="tborde"><span class="Estilo33"><?php
            $sqlfonp="SELECT (CASE WHEN histmov_monto IS NULL THEN 0.00 ELSE truncate(histmov_monto,2) END) AS fonp FROM sys_rh_historico_moviento
            where histmov_nombre='FONDO PENSIONES'  AND histmov_ndoc=$doc and hist_id=$id";
            $rfonp=mysqli_query($con,$sqlfonp);
            $rfon=mysqli_fetch_array($rfonp,MYSQLI_ASSOC);
            $fonp=$rfon['fonp'];
            if ($fonp=='') { $fonp='0.00';  }
            echo $fonp;
            ?>
            </span>
            </td>
            <td align="center" class="tborde"><span class="Estilo33"><?php
            $sqlpor="SELECT (CASE WHEN histmov_monto IS NULL THEN 0.00 ELSE truncate(histmov_monto,2) END) AS porcen FROM sys_rh_historico_moviento
            where histmov_nombre='COMISION PORCENTUAL'  AND histmov_ndoc=$doc and hist_id=$id";
            $rporc=mysqli_query($con,$sqlpor);
            $rpor=mysqli_fetch_array($rporc,MYSQLI_ASSOC);
            $porcen=$rpor['porcen'];
            if ($porcen=='') { $porcen='0.00';  }
            echo $porcen;
            ?></span></td>
            <td align="center" class="tborde"><span class="Estilo33"><?php
              $sqlsegu="SELECT (CASE WHEN histmov_monto IS NULL THEN 0.00 ELSE truncate(histmov_monto,2) END) AS segu FROM sys_rh_historico_moviento
              where histmov_nombre='PRIMA SEGURO'  AND histmov_ndoc=$doc and hist_id=$id";
              $rsegu=mysqli_query($con,$sqlsegu);
              $rseg=mysqli_fetch_array($rsegu,MYSQLI_ASSOC);
              $seguro=$rseg['segu'];
              if ($seguro=='') { $seguro='0.00';  }
              echo $seguro;
              ?></span>
            </td>
            <td align="center" class="tborde"><span class="Estilo33">0.00</span></td>
            <td align="center" class="tborde"><span class="Estilo33"><?php
                $sqladela="SELECT (CASE WHEN histmov_monto IS NULL THEN 0.00 ELSE truncate(histmov_monto,2) END) AS adelan FROM sys_rh_historico_moviento
                where histmov_codigo=21  AND histmov_ndoc=$doc and hist_id=$id";
                $radela=mysqli_query($con,$sqladela);
                $rade=mysqli_fetch_array($radela,MYSQLI_ASSOC);
                $adelanto=$rade['adelan'];
                if ($adelanto=='') { $adelanto='0.00';  }
                echo $adelanto;
                ?></span>
            </td>
            <td align="center" class="tborde"><span class="Estilo33"><?php
                $sqlpres="SELECT (CASE WHEN histmov_monto IS NULL THEN 0.00 ELSE truncate(histmov_monto,2) END) AS pres FROM sys_rh_historico_moviento
                where histmov_codigo=22  AND histmov_ndoc=$doc and hist_id=$id";
                $rpres=mysqli_query($con,$sqlpres);
                $rpre=mysqli_fetch_array($rpres,MYSQLI_ASSOC);
                $prestado=$rpre['pres'];
                if ($prestado=='') { $prestado='0.00';  }
                echo $prestado;
                ?></span></td>
            <td align="center" class="tborde"><span class="Estilo33"><?php
                $sqlfalta="SELECT (CASE WHEN histmov_monto IS NULL THEN 0.00 ELSE TRUNCATE(SUM(histmov_monto),2) END) AS falta FROM sys_rh_historico_moviento
                where histmov_codigo=9  AND histmov_ndoc=$doc and hist_id=$id";
                $rfalta=mysqli_query($con,$sqlfalta);
                $rfal=mysqli_fetch_array($rfalta,MYSQLI_ASSOC);
                $falta=$rfal['falta'];
                if ($falta=='') { $falta='0.00';  }
                echo $falta;
                ?></span></td>
            <td align="center" class="tborde"><span class="Estilo33"><?php
              $rtotalde =  $fonp + $porcen + $seguro + $adelanto + $prestado + $falta;
              echo number_format($rtotalde, 2, '.', '');?></span></td>
            <td align="center" class="tborde"><span class="Estilo33">
              <?php
                  $sqlsalud="SELECT (CASE WHEN histmov_monto IS NULL THEN 0.00 ELSE truncate(histmov_monto,2) END) AS salud FROM sys_rh_historico_moviento
                  where histmov_codigo=6  AND histmov_ndoc=$doc and hist_id=$id";
                  $rsalud=mysqli_query($con,$sqlsalud);
                  $rsal=mysqli_fetch_array($rsalud,MYSQLI_ASSOC);
                  $salud=$rsal['salud'];
                  if ($salud=='') { $salud='0.00';  }
                  echo $salud;
                  ?>

            </span></td>
            <td align="center" class="tborde"><span class="Estilo33">
              <?php
              $ttotal = $rtotal - $rtotalde;
              echo number_format($ttotal, 2, '.', '');
               ?>
            </span></td>
          </tr>
  <?php } ?>
        </table>
      <table width="1095" border="0">
  <tr>
    <td width="255"><div align="right"><span class="Estilo1">TOTAL</span></div></td>
    <td align="center" class="ttotal" width="55"><span class="Estilo33">
      <?php
          $sqltremu="SELECT sum(histmov_monto) as tremu FROM sys_rh_historico_moviento where histmov_codigo=15 and hist_id=$id";
          $rtremu=mysqli_query($con,$sqltremu);
          $rremu=mysqli_fetch_array($rtremu,MYSQLI_ASSOC);
          $tremuneracion=$rremu['tremu'];
          if ($tremuneracion=='') { $tremuneracion='0.00';  }
            echo number_format($tremuneracion, 2, '.', '');
          ?>
    </span></td>
    <td align="center" class="ttotal" width="45"><span class="Estilo33">
        <?php
            $sqltcomi="SELECT sum(histmov_monto) as tcomi FROM sys_rh_historico_moviento where histmov_codigo=23 and hist_id=$id";
            $rtcomi=mysqli_query($con,$sqltcomi);
            $rcomi=mysqli_fetch_array($rtcomi,MYSQLI_ASSOC);
            $tcomi=$rcomi['tcomi'];
            if ($tcomi=='') { $tcomi='0.00';  }
            echo number_format($tcomi, 2, '.', '');
            ?>
      </span>
    </td>
    <td  align="center" class="ttotal" width="40"><span class="Estilo33">
        <?php
            $sqltasig="SELECT sum(histmov_monto) as tasig FROM sys_rh_historico_moviento where histmov_codigo=24 and hist_id=$id";
            $rtasig=mysqli_query($con,$sqltasig);
            $rasig=mysqli_fetch_array($rtasig,MYSQLI_ASSOC);
            $tasig=$rasig['tasig'];
            if ($tasig=='') { $tasig='0.00';  }
            echo number_format($tasig, 2, '.', '');
            ?>
      </span>
    </td>
    <td align="center" class="ttotal" width="40"><span class="Estilo33">0.00</span></td>
    <td align="center" class="ttotal" width="55"><span class="Estilo33">
      <?php
        $ttremu = $tremuneracion+$tcomi+$tasig;
        echo number_format($ttremu, 2, '.', '');
       ?>
    </span>
    </td>
    <td align="center" class="ttotal" width="45"><span class="Estilo33">
          <?php
              $sqltfondo="SELECT sum(histmov_monto) as tfondo FROM sys_rh_historico_moviento where histmov_nombre='FONDO PENSIONES' and hist_id=$id";
              $rtfond=mysqli_query($con,$sqltfondo);
              $rtfon=mysqli_fetch_array($rtfond,MYSQLI_ASSOC);
              $tfondoo=$rtfon['tfondo'];
              if ($tfondoo=='') { $tfondoo='0.00';  }
              echo number_format($tfondoo, 2, '.', '');
              ?>
        </span>
    </td>
    <td align="center" class="ttotal" width="45">
      <span class="Estilo33">
            <?php
                $sqltporcen="SELECT sum(histmov_monto) as tporce FROM sys_rh_historico_moviento where histmov_nombre='COMISION PORCENTUAL' and hist_id=$id";
                $rtporcent=mysqli_query($con,$sqltporcen);
                $rtporce=mysqli_fetch_array($rtporcent,MYSQLI_ASSOC);
                $tporce=$rtporce['tporce'];
                if ($tporce=='') { $tporce='0.00';  }
                echo number_format($tporce, 2, '.', '');
                ?>
          </span></td>
    <td align="center" class="ttotal" width="35">
      <span class="Estilo33">
            <?php
                $sqltseg="SELECT sum(histmov_monto) as tsegu FROM sys_rh_historico_moviento where histmov_nombre='PRIMA SEGURO' and hist_id=$id";
                $rtseg=mysqli_query($con,$sqltseg);
                $rtsegur=mysqli_fetch_array($rtseg,MYSQLI_ASSOC);
                $tsegu=$rtsegur['tsegu'];
                if ($tsegu=='') { $tsegu='0.00';  }
                echo number_format($tsegu, 2, '.', '');
                ?>
          </span></td>
    <td align="center" class="ttotal" width="40"><span class="Estilo33">0.00</span></td>
    <td align="center" class="ttotal" width="45"><span class="Estilo33">
          <?php
              $sqltadel="SELECT sum(histmov_monto) as tadel FROM sys_rh_historico_moviento where histmov_codigo=21 and hist_id=$id";
              $rtadel=mysqli_query($con,$sqltadel);
              $rtade=mysqli_fetch_array($rtadel,MYSQLI_ASSOC);
              $tadel=$rtade['tadel'];
              if ($tadel=='') { $tadel='0.00';  }
              echo number_format($tadel, 2, '.', '');
              ?>
        </span></td>
    <td align="center" class="ttotal" width="40">
      <span class="Estilo33">
            <?php
                $sqltpres="SELECT sum(histmov_monto) as tpresta FROM sys_rh_historico_moviento where histmov_codigo=22 and hist_id=$id";
                $rtpresta=mysqli_query($con,$sqltpres);
                $rtprest=mysqli_fetch_array($rtpresta,MYSQLI_ASSOC);
                $tpresta=$rtprest['tpresta'];
                if ($tpresta=='') { $tpresta='0.00';  }
                echo number_format($tpresta, 2, '.', '');
                ?>
          </span>
    </td>
    <td align="center" class="ttotal" width="40"><span class="Estilo33"><?php
        $sqltfalta="SELECT SUM(histmov_monto) AS tfalta FROM sys_rh_historico_moviento
        where histmov_codigo=9  and hist_id=$id";
        $rtfalta=mysqli_query($con,$sqltfalta);
        $rtfal=mysqli_fetch_array($rtfalta,MYSQLI_ASSOC);
        $tfalta=$rtfal['tfalta'];
        if ($tfalta=='') { $tfalta='0.00';  }
        echo number_format($tfalta, 2, '.', '');
        ?></span>
    </td>
    <td class="ttotal" align="center" width="50"><span class="Estilo33">
      <?php
          $sqltdeduc="SELECT sum(histmov_monto) AS tdeduc FROM sys_rh_historico_moviento
          where histmov_tipo=0  and hist_id=$id and histmov_codigo not in  (6)";
          $rtdeduc=mysqli_query($con,$sqltdeduc);
          $rtded=mysqli_fetch_array($rtdeduc,MYSQLI_ASSOC);
          $tdeduc=$rtded['tdeduc'];
          if ($tdeduc=='') { $tdeduc='0.00';  }
            echo number_format($tdeduc, 2, '.', '');
          ?>
    </span></td>
    <td class="ttotal" align="center" width="45"><span class="Estilo33">
      <?php
          $sqltsalud="SELECT  sum(histmov_monto) AS saludd FROM sys_rh_historico_moviento
          where histmov_codigo=6  and hist_id=$id";
          $rtsalud=mysqli_query($con,$sqltsalud);
          $rtsal=mysqli_fetch_array($rtsalud,MYSQLI_ASSOC);
          $tsalud=$rtsal['saludd'];
          if ($tsalud=='') { $tsalud='0.00';  }
            echo number_format($tsalud, 2, '.', '');
          ?>
    </span></td>
    <td width="40">&nbsp;</td>
  </tr>
</table>
&nbsp;
<table width="908" border="0">
  <tr align="center">
    <td class="tban" width="20"><strong>#</strong></td>
    <td class="tban" width="50"><span class="Estilo13">DNI</span></td>
    <td class="tban" width="160"><span class="Estilo13">NOMBRE</span></td>
    <td class="tban" width="110"><span class="Estilo13">CARGO</span></td>
    <td class="tban" width="65"><span class="Estilo13">FONDO</span></td>
    <td class="tban" width="75"><span class="Estilo13">CUSPP</span></td>
    <td class="tban" width="75"><span class="Estilo13">AREA</span></td>
    <td class="tban" width="50"><span class="Estilo13">INGRESO </span></td>
    <td class="tban" width="50"><span class="Estilo13">ING. VACA.</span></td>
    <td class="tban" width="50"><span class="Estilo13">TER. VACA.</span></td>
    <td class="tban" width="50"><span class="Estilo13">DIAS VACA.</span></td>
  </tr>
<?php $cuent =1;
while($row2=mysqli_fetch_array($rsecun,MYSQLI_ASSOC)){ ?>
  <tr>
    <td align="center" class="tborde"><span class="Estilo33"><?php echo $cuent ++; ?></span></td>
    <td align="center" class="tborde"><span class="Estilo33"><?php echo $row2['histdet_ndoc']; ?></span></td>
    <td class="tborde"><span class="Estilo33"><?php echo $row2['histdet_nomape']; ?></span></td>
    <td align="center" class="tborde"><span class="Estilo33"><?php echo $row2['histdet_cargo']; ?></span></td>
    <td align="center" class="tborde"><span class="Estilo33"><?php echo $row2['histdet_fondo']; ?></span></td>
    <td align="center" class="tborde"><span class="Estilo33"><?php echo $row2['histdet_cuspp']; ?></span></td>
    <td align="center" class="tborde"><span class="Estilo33"><?php echo $row2['histdet_area']; ?></span></td>
    <td align="center" class="tborde"><span class="Estilo33"><?php echo $row2['histdet_fecing']; ?></span></td>
    <td align="center" class="tborde"><span class="Estilo33"></span></td>
    <td align="center" class="tborde"><span class="Estilo33"></span></td>
    <td align="center" class="tborde"><span class="Estilo33"></span></td>
  </tr>
<?php } ?>
</table>
</page_header>
</page>
<?php }?>
<?php if ($opc=='bancos'){ ?>
<page orientation="landscape" style="font-size: 9px" backtop="1mm" backbottom="5mm" backleft="1mm" backright="1mm">
  <page_header>
  <table width="960" height="104" border="0">
    <tr align="center">
      <td class="tban" width="120" rowspan="2"><span class="Estilo2">DATOS GENERALES </span></td>
      <td width="127" rowspan="2"><br />
      <br /></td>
      <td width="290" rowspan="3">&nbsp;</td>
      <td width="470">&nbsp;</td>
    </tr>
    <tr align="left">
      <td height="23"><span class="Estilo4">Nota 1: Los formatos de celda deben ser de tipo texto </span></td>
    </tr>
    <tr>
      <td height="23" class="tban" align="center"><span class="Estilo2">C&oacute;digo de Cliente </span></td>
      <td width="127" class="tban" align="center"><span class="Estilo2">Tipo de Planilla </span></td>
      <td width="470"><span class="Estilo4">Nota 2: A modo de ejemplo, se ha ingresado datos ficticios en color rojo. </span></td>
    </tr>
    <tr align="center">
      <td class="tborde"><span class="Estilo2"><?php echo $ccliente; ?></span></td>
      <td class="tborde"><span class="Estilo2">HABER</span></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
  &nbsp;
  <table width="994" border="0">
    <tr align="center">
      <td class="tban" width="120"><span class="Estilo2">DATOS DEL CARGO</span></td>
      <td colspan="7">&nbsp;</td>
    </tr>
    <tr align="center">
      <td width="120" class="tban"><span class="subban">Tipo de Registro </span></td>
      <td class="tban" width="95"><span class="subban">Cantidad de abonos de la planilla </span></td>
      <td class="tban" width="105"><span class="subban">Fecha de proceso </span></td>
      <td class="tban" width="70"><span class="subban">Subtipo de Planilla de Haberes </span></td>
      <td class="tban" width="90"><span class="subban">Tipo de Cuenta de cargo </span></td>
      <td class="tban" width="170"><span class="subban">Cuenta de Cargo </span></td>
      <td class="tban" width="100"><span class="subban">Monto total de la planilla </span></td>
      <td class="tban" width="110"><span class="subban">Referencia de la planilla </span></td>
    </tr>
    <tr align="center">
      <td class="tborde"><span class="subban">C</span></td>
      <td class="tborde"><span class="subban"><?php echo '0000'.$cantid; ?></span></td>
      <td class="tborde"><span class="subban"><?php echo $fecrepor; ?></span></td>
      <td class="tborde"><span class="subban">X</span></td>
      <td class="tborde"><span class="subban">C</span></td>
      <td class="tborde"><span class="subban"><?php echo $cbanco; ?></span></td>
      <td class="tborde"><span class="subban">&nbsp;</span></td>
      <td class="tborde"><span class="subban">Referencia Haberes </span></td>
    </tr>
  </table>

  &nbsp;
  <table width="993" border="0">
    <tr align="center">
      <td  class="tban" width="120"><span class="Estilo2">DATOS DEL ABONO </span></td>
      <td colspan="8">&nbsp;</td>
    </tr>
    <tr align="center">
      <td class="tban" width="120"><span class="subban">Tipo de Registro </span></td>
      <td class="tban" width="95"><span class="subban">Tipo de Cuenta de Abono </span></td>
      <td class="tban" width="105"><span class="subban">Cuenta de Abono </span></td>
      <td class="tban" width="70"><span class="subban">Tipo de documento de Identidad </span></td>
      <td class="tban" width="92"><span class="subban">N&uacute;mero de documento de identidad </span></td>
      <td class="tban" width="172"><span class="subban">Nombre del trabajador </span></td>
      <td class="tban" width="100"><span class="subban">Tipo de Moneda de Abono </span></td>
      <td class="tban" width="110"><span class="subban">Monto de Abono </span></td>
      <td class="tban" width="80"><span class="subban">Validaci&oacute;n IDC del proveedor vs Cuenta </span></td>
    </tr>
<?php while($row3=mysqli_fetch_array($rbanc,MYSQLI_ASSOC)){ ?>
    <tr>
      <td align="center" class="tborde"> <span class="subban">A</span></td>
      <td align="center" class="tborde"><span class="subban">A</span></td>
      <td class="tborde">&nbsp;</td>
      <td align="center" class="tborde"><span class="Estilo33">1</span></td>
      <td align="center" class="tborde"><span class="Estilo33"><?php echo $row3['histdet_ndoc']; ?></span></td>
      <td align="center" class="tborde"><span class="Estilo33"><?php echo $row3['histdet_nomape']; ?></span></td>
      <td align="center" class="tborde"><span class="subban">S</span></td>
      <td class="tborde">&nbsp;</td>
      <td align="center" class="tborde"><span class="subban">S</span></td>
    </tr>
  <?php } ?>
  </table>
</page_header>
</page>
<?php }?>
