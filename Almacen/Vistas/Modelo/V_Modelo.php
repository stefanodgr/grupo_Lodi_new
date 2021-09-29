<?php
  include "../Funciones/BD.php";
  $sql="SELECT md.mod_id,md.mod_nombre,md.mod_estatus,mar.mar_id,
  mar.mar_nombre
  FROM
  sys_modelo md, sys_marca mar  
  WHERE md.mar_id= mar.mar_id
   ORDER BY md.mod_id ASC ";
  $result=mysqli_query($con,$sql);
 ?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Registrar un Modelo - Marca
            </div>
            <div class="panel-body">
                <div class="row">
                  <div class="col-md-12 col-xs-12 col-lg-12">
                    <form  id="RegistroE" role="form" action="index.php?menu=28" method="post">
                       <div class="form-group col-md-8 col-xs-12 col-lg-3">
                         <label>Nombre:</label>
                         <input class="form-control text-uppercase" name="xnom" title=" Ingrese Nombre del Modelo"    required>
                       </div>
                       <div class="form-group col-xs-12 col-md-12 col-lg-3">
                              <label>Marca:</label>
                             <select class="form-control"  name="xmarca" required>
                               <?php
                                      $sql2="SELECT mar_id,mar_nombre from sys_marca WHERE mar_estatus= 1 order by mar_id";
                                      $rsql2=mysqli_query($con,$sql2);
                                      echo "<option value='0'>--</option>";
                                      if( $row2=mysqli_fetch_array($rsql2,MYSQLI_ASSOC)){
                                      do{
                                          echo '<option value="'.$row2['mar_id'].'">'.$row2['mar_nombre'].'</option>';
                                          } while($row2=mysqli_fetch_array($rsql2,MYSQLI_ASSOC));
                                      }
                                ?>
                            </select>
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
                  Modelos Registrados
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                      <tr>
                        <th class="text-center">NOMBRE</th>
                        <th class="text-center">MARCA</th>
                        <th class="text-center">HABILITAR</th>
                        <th class="text-center">DESHABILITAR</th>
                        <th class="text-center">EDITAR</th>
                      </tr>
                    </thead>
                    <tbody class="text-center">
                    <?php while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){ ?>
                      <tr>
                          <td><?php echo $row['mod_nombre']; ?></td>
                          <td><?php echo $row['mar_nombre']; ?></td>
                          <?php if ($row['mod_estatus']=='1'){   ?>
                          <td class="centeralign"><button class="btn btn-success btn-sm glyphicon glyphicon-ok" disabled></button></td>
                          <!--DESHABILITAR-->
                        <td class="centeralign">
                          <form  id="DeshabilitarE" role="form" action="index.php?menu=28" method="post">
                            <button class="btn btn-danger btn-sm glyphicon glyphicon-remove" name="desac" value='<?php echo $row['mod_id']; ?>'></button>
                          </form>
                        </td>
                        <?php } else { ?>
                          <!--HABILITAR-->
                          <td class="centeralign">
                          <form  id="HabilitarE" role="form" action="index.php?menu=28" method="post">
                              <button class="btn btn-success btn-sm glyphicon glyphicon-ok" name='act' value="<?php echo $row['mod_id']; ?>"></button>
                          </form>
                          </td>
                          <td class="centeralign"><button class="btn btn-danger btn-sm glyphicon glyphicon-remove" disabled></button></a></td>
                        <?php  } ?>

                        <!--EDITAR-->
                          <td class="centeralign">
                              <form  id="EditarE" role="form" action="index.php?menu=29" method="post">
                                <button class="btn btn-warning btn-sm glyphicon glyphicon-edit" name="edit" value='<?php echo $row['mod_id']; ?>'></button>
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
