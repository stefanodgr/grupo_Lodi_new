<?php
//error_reporting(E_ERROR | E_PARSE);
error_reporting(E_ERROR | E_PARSE);

include "../../../funciones/BD.php";
		
// 	$sql2="SELECT st.solt_codigo,st.solt_institucion,st.solt_fecha,st.solt_soporte,st.solt_descrip,mu.mun_nombre,pa.par_nombre FROM solicitud_tramitacion st,solictudes_estatus se, municipios mu,parroquias pa WHERE se.sole_codigo=st.solt_codigo AND mu.mun_codigo=st.solt_municipio AND pa.par_codigo=st.solt_parroquia AND st.solt_codigo=$cedula ";
// $result2=mysqli_query($con,$sql2);
//   $rsql1=mysqli_fetch_array($result2,MYSQLI_ASSOC); 
// 	  $institucion=$rsql1['solt_institucion'];
// 	  $descrip=$rsql1['solt_descrip'];
/* CONSULTA AROS */

$sqlAro = "SELECT
pr.produ_id,
mr.mar_id,
mr.mar_nombre,
ps.pais_id,
ps.pais_nombre,
deta.produ_deta_id,
deta.produ_deta_codigo,
deta.produ_deta_nombre,
deta.produ_aro_mod,
deta.produ_aro_espe,
deta.produ_aro_hueco,
deta.produ_aro_med,
deta.sunat,
pclasi.produ_clasi_id
FROM sys_producto pr , sys_produ_clasi pclasi , sys_produ_detalle deta , sys_marca mr ,sys_pais ps
where pr.produ_id = deta.produ_deta_id
AND pclasi.produ_clasi_id = pr.produ_clasi_id
AND pr.mar_id = mr.mar_id
AND pr.pais_id = ps.pais_id
AND pr.produ_clasi_id = '3'";
$resultAro = mysqli_query($con, $sqlAro);

?>
<page orientation="portrait" style="font-size: 10px">
<h1 align="center" >Listado Aros</h1>
<hr>
<table width="539" >
  <tr>
    <td align="center" style="background-color:#08cabb;" width="10"><strong>N&deg;</strong> </td>
    <td align="center" style="background-color:#08cabb;" width="155"><strong>SKU</strong></td>
    <td align="center" style="background-color:#08cabb;" width="75"><strong>MARCA</strong></td>
    <td align="center" style="background-color:#08cabb;" width="130"><strong>TIPO</strong></td>
    <td align="center" style="background-color:#08cabb;" width="90"><strong>MEDIDA</strong></td>
    <td align="center" style="background-color:#08cabb;" width="90"><strong>ESPESOR</strong> </td>
    <td align="center" style="background-color:#08cabb;" width="70"><strong>N° HUECOS</strong></td>
    <td align="center" style="background-color:#08cabb;" width="40"><strong>PAIS</strong></td>
    <td align="center" style="background-color:#08cabb;" width="40"><strong>SUNAT</strong></td>
  </tr>
  <?php $cuenta = 0;
		while ($row1 = mysqli_fetch_array($resultAro, MYSQLI_ASSOC)) { ?>
			<tr>
        <td><?php
              $cuenta++;
              echo $cuenta;
              ?>
        </td>
        <td align="center"><?php echo $row1['produ_deta_codigo'];?></td>
        <td align="center"><?php echo $row1['mar_nombre'];?>       </td>
        <td align="center"><?php echo $row1['produ_aro_mod'];?>    </td>
        <td align="center"><?php echo $row1['produ_aro_med'];?>    </td>
        <td align="center"><?php echo $row1['produ_aro_espe'];?>   </td>
        <td align="center"><?php echo $row1['produ_aro_hueco'];?>  </td>
        <td align="center"><?php echo $row1['pais_nombre']; ?>     </td>
        <td align="center"><?php echo $row1['sunat']; ?>           </td>
    </tr>
    <?php } ?>
</table>
<p>&nbsp;</p>
</page>
