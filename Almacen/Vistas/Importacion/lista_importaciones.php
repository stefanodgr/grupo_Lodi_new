<?php
include "../Funciones/BD.php";
// $sql = "SELECT mr.mar_id,mr.mar_nombre,mr.mar_estatus,pclasi.produ_clasi_id,
//   pclasi.produ_clasi_desc
//   FROM
//   sys_marca mr, sys_produ_clasi pclasi  
//   WHERE mr.produ_clasi_id= pclasi.produ_clasi_id";
// $result = mysqli_query($con, $sql);
?>

<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-12 col-xs-12 col-lg-12">
                    <!-- <div class="panel panel-default"> -->
                    <div id="div_nombre_produ" class="col-lg-6">
                        <h2 class="azul"><i class="glyphicon glyphicon-th-list"></i>&nbsp;<strong>Importaciones</strong></h2>
                    </div>
                </div>
                <hr>
                <!-- <div id="div_btn">
			<button type="button" class="btn btn-primary" onclick="DivOcultarMarca(1);">NUEVA MARCA</button>
			</div>  -->
                <div class="panel-body">
                    <div class="row">
                        &nbsp;
                        <div class="form" id="div_consul_marca" style="display:block;">
                            <!--FORMULARIO CONSULTA MARCA-->
                            <div class="col-md-12 col-xs-12 col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">AÑO</th>
                                                        <th class="text-center">NR</th>
                                                        <th class="text-center">PROVEEDOR</th>
                                                        <th class="text-center">TIPO/PRODUCTO</th>
                                                        <th class="text-center">MARCA</th>
                                                        <th class="text-center">PAIS</th>
                                                        <th class="text-center">CANTIDAD</th>
                                                        <th class="text-center">INCOTERM</th>
                                                        <th class="text-center">ETD</th>
                                                        <th class="text-center">ETA</th>
                                                        <th class="text-center">DETALLE</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">

                                                    <tr>
                                                        <td>2019</td>
                                                        <td>54</td>
                                                        <td>GRUPO LODI</td>
                                                        <td>NEUMATICO</td>
                                                        <td>LADY TYRE</td>
                                                        <td>KOREA</td>
                                                        <td>100</td>
                                                        <td>FOB</td>
                                                        <td>20-07-2019</td>
                                                        <td>20-07-2020</td>
                                                        <!--EDITAR-->
                                                        <td class="centeralign">
                                                            <form id="EditarE" role="form" action="index.php?menu=12" method="post">
                                                                <a class="btn btn-primary btn-sm glyphicon glyphicon-eye-open" href="../Almacen/Index.php?menu=10&accion=editar" class="btn btn-primary">
                                                            </form>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- /.panel-body -->

                </div>
                <!-- /.panel -->

            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row-->

        <script src="js_sg/importacion.js?<?= substr(time(), -5) ?>" language="Javascript"></script>