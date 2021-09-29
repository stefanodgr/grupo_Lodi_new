<?php
include "../Funciones/BD.php";
include "Funciones/Venta/Cotizacion.php";





// $sqlCoti_Deta  = "SELECT
// coti.coti_id
// FROM globi.sys_cotizacion coti , globi.sys_coti_detalle deta
// where coti.coti_id = deta.coti_id and deta.coti_id = '3'";
// $resultCoti      = mysqli_query($con, $sqlCoti_Deta);
$sqlCotizacion  = "SELECT
coti_id,
coti_number,
coti_tp_docu,
coti_ruc,
coti_razon,
coti_pago,
coti_estatus
 FROM sys_cotizacion ";
$result      = mysqli_query($con, $sqlCotizacion);
// $rsqlCoc   = mysqli_fetch_array($result, MYSQLI_ASSOC);
// $sqlCoti_Deta =
// $resultCoti_detalle = mysqli_query($con, $sqlCoti_Deta);
// $coti     = $_POST['coti_id'];
// $ruc      = $_POST['coti_ruc'];
?>
<div class="row">
  <div class="col-lg-12 col-md-12 col-xs-12">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="col-md-12 col-xs-12 col-lg-12">
          <!-- <div class="panel panel-default"> -->
          <div id="div_nombre_produ" class="col-lg-6">
            <h2 class="azul"><i class="glyphicon glyphicon-th-list"></i>&nbsp;<strong>Cotizaciones</strong></h2>
          </div>
          <div class="col-lg-6 text-right" id="div_btn">
            <!-- <button href="index.php?menu=17&opci=new" type="button" class="btn btn-primary" id=""><a href="index.php?menu=17&opci=new"><i class="fa fa-plus "></i> Nueva Cotizacion</a></button> -->
            <a class="btn btn-primary" href="index.php?menu=17&opci=new"><i class="fa fa-plus fa-fw"></i> Nueva Cotizacion</a>
            <!-- <button class="btn btn-primary" id="show" onclick="DivOcultarProdu(1);" ><i class="fa fa-plus "></i> Nuevo Producto</button> -->
          </div>

        </div>
<div class="table-responsive col-lg-12"><hr class="black" />
          <div class="form" id="div_consul_marca" style="display:block;">
            <!--FORMULARIO CONSULTA MARCA-->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                      <thead>
                        <tr>
                          <th class="text-censter">TIPO/DOCUMENTO</th>
                          <th class="text-center">DOCUMENTO</th>
                          <th class="text-center">RAZON SOCIAL</th>
                          <th class="text-center">FORMA-PAGO</th>
                          <th class="text-center">MONEDA</th>
                          <th class="text-center">T.C</th>
                          <th class="text-center">STATUS</th>
                          <th class="text-center">DETALLE</th>
                          <th class="text-center">REPORTE</th>
                        </tr>
                      </thead>
                      <tbody class="text-center">
                          <tr>
                            <td><?php echo $row['coti_number']; ?></td>
                            <td><?php echo $row['coti_tp_docu']; ?></td>
                            <td><?php echo $row['coti_ruc']; ?></td>
                            <td><?php echo $row['coti_razon']; ?></td>
                            <td><?php echo $row['coti_pago']; ?></td>
                            <td><?php $cid = $row['coti_id'];
                                  $sqlCotiDeta  = "SELECT SUM(coti_deta_cant) AS cant FROM `sys_coti_detalle` WHERE coti_id=$cid";
                                  $resultt   = mysqli_query($con, $sqlCotiDeta);
                                  $rsqlDeta   = mysqli_fetch_array($resultt, MYSQLI_ASSOC);
                                  $cant    = $rsqlDeta['cant'];
                                  echo  $cant;
                                  ?>
                            </td>
                            <td><?php
                                  $sqltotal = "SELECT SUM(coti_deta_total) AS ttotal FROM `sys_coti_detalle` WHERE coti_id=$cid";
                                  $tresult  = mysqli_query($con, $sqltotal);
                                  $rsqltol  = mysqli_fetch_array($tresult, MYSQLI_ASSOC);
                                  $total    = $rsqltol['ttotal'];
                                  echo  $total;
                                  ?></td>


                            <!--EDITAR-->
                            <td>
                              <form id="formProducto" role="form" action="#" method="get">
                                <input type="hidden" name="menu" value="17">
                                <input type="hidden" name="opci" value="stock">
                                <input type="hidden" name="id" value="<?php echo $row['coti_id']; ?>">
                                <button class="btn btn-info btn-sm glyphicon glyphicon-list-alt" value='<?php echo $row['coti_id']; ?>'></button>
                              </form>
                            </td>
                            <td>
                            <form role="form" action="pdf_documentos/documentos/exemple04.php" method="get">
                              <input type="hidden" name="menu" value="17">
                              <input type="hidden" name="opci" value="stock">
                              <input type="hidden" name="id" value="<?php echo $row['coti_id']; ?>">
                              <button type="submit" class="btn btn-primary btn-sm glyphicon glyphicon-eye-open" value='<?php echo $row['coti_id']; ?>'></button>
                            </form>
                            </td>
                          </tr>
                   


                      </tbody>
                    </table>




        </div></div>
        <!-- /.panel-body -->

      </div>
      <!-- /.panel -->

    </div>
    <!-- /.col-lg-12 -->
  </div>  </div>
  <!-- /.row-->


  <script src="js_sg/venta.js?<?= substr(time(), -5) ?>" language="Javascript"></script>
