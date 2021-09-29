<?php
include "../Funciones/BD.php";
$sql = "SELECT mr.mar_id,mr.mar_nombre,mr.mar_estatus,pclasi.produ_clasi_id,
  pclasi.produ_clasi_desc
  FROM
  sys_marca mr, sys_produ_clasi pclasi
  WHERE mr.produ_clasi_id= pclasi.produ_clasi_id";
$result = mysqli_query($con, $sql);
?>

<div class="row">
  <div class="col-lg-12 col-md-12 col-xs-12">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="col-lg-12">
           <div class="row" id="titulo">
              <div id="div_nombre_produ" class="col-lg-6">
                 <h2 class="azul"><i class="fa fa-cogs"></i><strong> Marcas</strong></h2>
               </div>
              <div class="col-lg-6 text-right" id="div_btn">
                    <button type="button " class="btn btn-primary" id="show" onclick="DivOcultarMarca(1);"><i class="fa fa-plus "></i> Nueva Marca</button>
              </div>
           </div>
         </div>
        <div class="table-responsive col-lg-12"><hr class="black" />
            <div class="form" id="div_nueva_marca" style="display:none;">
                <form id="RegistroE" name="form1" role="form" action="index.php?menu=5" enctype="multipart/form-data" method="post">
                  <input name="action" type="hidden" value="upload" />
                  <div class="form-group col-xs-8 col-md-8 col-lg-3">
                    <label>CLASIFICACION:</label>
                    <select class="form-control" name="xclasi" id="xclasi" onchange="CampOcultarMod();">
                      <?php
                      $sql2 = "SELECT produ_clasi_id,produ_clasi_desc from sys_produ_clasi WHERE produ_clasi_estatus=1 order by produ_clasi_id";
                      $rsql2 = mysqli_query($con, $sql2);
                      echo "<option value='0'>--</option>";
                      if ($row2 = mysqli_fetch_array($rsql2, MYSQLI_ASSOC)) {
                        do {
                          echo '<option value="' . $row2['produ_clasi_id'] . '">' . $row2['produ_clasi_desc'] . '</option>';
                        } while ($row2 = mysqli_fetch_array($rsql2, MYSQLI_ASSOC));
                      }
                      ?>
                    </select>
                  </div>
                  <div id="div_marca" class="form-group col-xs-8 col-md-8 col-lg-3" style="display:none;">
                    <label>Marca:</label>
                    <select class="form-control" name="xmarca" id="xmarca" onchange="ShowMarca();">
                      <?php
                      $sql2 = "SELECT mar_id,mar_nombre from sys_marca WHERE mar_estatus=1 order by mar_id";
                      $rsql2 = mysqli_query($con, $sql2);
                      echo "<option value='0'>--</option>";
                      if ($row2 = mysqli_fetch_array($rsql2, MYSQLI_ASSOC)) {
                        do {
                          echo '<option onclick="quitar();DivNewMarcaDisplay();" value="' . $row2['mar_id'] . '">' . $row2['mar_nombre'] . '</option>';
                        } while ($row2 = mysqli_fetch_array($rsql2, MYSQLI_ASSOC));
                      }
                      echo "<option  value='0'  onclick='borrar();DivNewMarcaDisplay();' >NUEVA MARCA</option>";
                      ?>
                    </select>
                    <input type="hidden" class="form-control text-uppercase" name="xNomMar" id="xNomMar" title=" Ingrese Nombre del Marca " value="">
                  </div>
                  <div id="div_nombre_marca" class="form-group col-md-8 col-xs-12 col-lg-3" style="display:none;">
                    <label>Nombre Marca:</label>
                    <input class="form-control text-uppercase" name="xmarcaNom" id="xmarcaNom" title=" Ingrese Nombre del Marca ">
                  </div>
                  <!-- <div id="div_nombre_btn" class="form-group col-md-2 col-xs-2 col-lg-2" style="display:none;top:20px"> -->
                    <!-- <label>Nombre Marca:</label> -->
                    <!-- <button type="button" id="btn_marca_nombre" class=" glyphicon glyphicon-plus btn btn-primary" onclick="DivOcultarNomMarca(1);"></button> -->
                  <!-- </div> -->
                  <div id="div_nombre_btn_atras" class="form-group col-md-2 col-xs-2 col-lg-2" style="display:none;top:20px">
                    <!-- <label>Nombre Marca:</label> -->
                    <button type="button" id="btn_marca_nombre" class=" glyphicon glyphicon-minus btn btn-warning" onclick="DivOcultarNomMarca(2);"> </button>
                  </div>
                  <div id="div_nombre_modelo" class="form-group col-md-8 col-xs-12 col-lg-3" style="display:none;" >
                    <label>Nombre Modelo:</label>
                    <input class="form-control text-uppercase" name="xmodelo" id="xmodelo" title=" Ingrese Nombre del Modelo " >
                  </div>
                  <div id="div_logo" class="form-group col-md-8 col-xs-12 col-lg-2" style="">
                    <label>Imagen:</label>
                    <div class="top-xs">
                      <input type="file" title="SELECCIONAR IMAGEN" class="btn btn-success" name="archivo" id="archivo">
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 hidden-xs top">
                    <button type="submit" class="btn btn-primary" name="Guardar" value="Insertar">Guardar </button>
                    <button type="reset" class="btn btn-default">Limpiar</button>
                    <a href="index.php?menu=4" class="btn btn-warning" role="button"><i class="glyphicon glyphicon-chevron-left"></i></a>
                  </div>
                  <div class="col-xs-12 visible-xs top">
                    <button type="submit" class="btn btn-primary" name="Guardar" value="Insertar">Guardar </button>
                    <button type="reset" class="btn btn-default">Limpiar</button>
                    <a href="index.php?menu=4" class="btn btn-warning" role="button"><i class="glyphicon glyphicon-chevron-left"></i></a>
                  </div>
                </form>
            </div>
          <div class="form" id="div_consul_marca" style="display:block;">
            <!--FORMULARIO CONSULTA MARCA-->

                    <table class="table table-striped table-bordered table-hover" id="dataTables-example2">
                      <thead>
                        <tr>
                          <th class="text-center">NOMBRE</th>
                          <th class="text-center">CLASIFICACION</th>
                          <th class="text-center">HABILITAR</th>
                          <th class="text-center">DESHABILITAR</th>
                          <th class="text-center">EDITAR</th>
                          <th class="text-center">DETALLE</th>
                        </tr>
                      </thead>
                      <tbody class="text-center">
                        <?php while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
                        <tr>
                          <td><?php echo $row['mar_nombre']; ?></td>
                          <td><?php echo $row['produ_clasi_desc']; ?></td>
                          <?php if ($row['mar_estatus'] == '1') {   ?>
                          <td class="centeralign"><button class="btn btn-success btn-sm glyphicon glyphicon-ok" disabled></button></td>
                          <!--DESHABILITAR-->
                          <td class="centeralign">
                            <form id="DeshabilitarE" role="form" action="index.php?menu=5" method="post">
                              <button class="btn btn-danger btn-sm glyphicon glyphicon-remove" name="desac" value='<?php echo $row['mar_id']; ?>'></button>
                            </form>
                          </td>
                          <?php } else { ?>
                          <!--HABILITAR-->
                          <td class="centeralign">
                            <form id="HabilitarE" role="form" action="index.php?menu=5" method="post">
                              <button class="btn btn-success btn-sm glyphicon glyphicon-ok" name='act' value="<?php echo $row['mar_id']; ?>"></button>
                            </form>
                          </td>
                          <td class="centeralign"><button class="btn btn-danger btn-sm glyphicon glyphicon-remove" disabled></button></a></td>
                          <?php  } ?>
                          <!--EDITAR-->
                          <td class="centeralign">
                            <form id="EditarE" role="form" action="index.php?menu=6" method="post">
                              <button class="btn btn-warning btn-sm glyphicon glyphicon-edit" id="editar" name="edit" value='<?php echo $row['mar_id']; ?>'></button>
                            </form>
                          </td>
                          <!--DETALLE-->
                          <?php if ($row['produ_clasi_id'] <> '1') {   ?>
                            <td class="centeralign"><button class="btn btn-primary btn-sm glyphicon glyphicon-eye-open" disabled></button></td>
                          <?php } else { ?>
                            <td class="centeralign">
                              <form role="form" action="index.php?menu=6" method="post">
                                <button class="btn btn-primary btn-sm glyphicon glyphicon-eye-open" name="xno" value='<?php echo $row['mar_id']; ?>'></button>
                              </form>
                            </td>
                          <?php } ?>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>



          </div>


        <!-- /.panel-body -->

      </div>
      <!-- /.panel -->

    </div>
    <!-- /.col-lg-12 -->
  </div>
  <!-- /.row-->

  <script src="js_sg/marca.js?<?= substr(time(), -5) ?>" language="Javascript"></script>
