<?php
  include "../Funciones/BD.php";
  $sql="SELECT pais_id,pais_nombre,pais_estatus  FROM sys_pais";
  $result=mysqli_query($con,$sql);
 ?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Registrar un País
            </div>
            <div class="panel-body">
                <div class="row">
                  <div class="col-md-12 col-xs-12 col-lg-12">
                    <form  id="RegistroE" role="form" action="index.php?menu=37" method="post">
                       <div class="form-group col-md-8 col-xs-12 col-lg-3">
                         <label>Nombre:</label>
                         <input class="form-control text-uppercase" name="xnom" title=" Ingrese Nombre del País "    required>
                       </div>
                       <div class="col-lg-4 col-md-4 hidden-xs top">
                        <button type="submit" class="btn btn-primary" name="Guardar" value="Insertar">Guardar </button>
                        <button type="reset" class="btn btn-default">Limpiar</button>
                      </div>
                      <div class="col-xs-12 visible-xs top">
                        <button type="submit" class="btn btn-primary" name="Guardar" value="Insertar">Guardar </button>
                        <button type="reset" class="btn btn-default">Limpiar</button>
                     </div>
                    </form>
                </div>
              </div>
              &nbsp;
              <div class="col-md-12 col-xs-12 col-lg-12">
              <div class="panel panel-default">
              <div class="panel-heading">
              Países Registrados
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                      <tr>
                        <th class="text-center">NOMBRE</th>
                        <th class="text-center">HABILITAR</th>
                        <th class="text-center">DESHABILITAR</th>
                        <th class="text-center">EDITAR</th>
                      </tr>
                    </thead>
                    <tbody class="text-center">
                    <?php while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){ ?>
                      <tr>
                          <td><?php echo $row['pais_nombre']; ?></td>
                          <?php if ($row['pais_estatus']=='1'){   ?>
                          <td class="centeralign"><button class="btn btn-success btn-sm glyphicon glyphicon-ok" disabled></button></td>
                          <!--DESHABILITAR-->
                        <td class="centeralign">
                          <form  id="DeshabilitarE" role="form" action="index.php?menu=37" method="post">
                            <button class="btn btn-danger btn-sm glyphicon glyphicon-remove" name="desac" value='<?php echo $row['pais_id']; ?>'></button>
                          </form>
                        </td>
                        <?php } else { ?>
                          <!--HABILITAR-->
                          <td class="centeralign">
                          <form  id="HabilitarE" role="form" action="index.php?menu=37" method="post">
                              <button class="btn btn-success btn-sm glyphicon glyphicon-ok" name='act' value="<?php echo $row['pais_id']; ?>"></button>
                          </form>
                          </td>
                          <td class="centeralign"><button class="btn btn-danger btn-sm glyphicon glyphicon-remove" disabled></button></a></td>
                        <?php  } ?>

                        <!--EDITAR-->
                          <td class="centeralign">
                              <form  id="EditarE" role="form" action="index.php?menu=38" method="post">
                                <button class="btn btn-warning btn-sm glyphicon glyphicon-edit" name="edit" value='<?php echo $row['pais_id']; ?>'></button>
                              </form>
                          </td>

                      </tr>
                        <?php } ?>
                    </tbody>
                  </table>
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
