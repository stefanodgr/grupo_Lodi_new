<?php
  include "../Funciones/BD.php";
  $edit=$_POST['edit'];
  $sql="SELECT alm_id,alm_nombre,alm_direc
FROM sys_almacen WHERE alm_id='$edit'";
  $result=mysqli_query($con,$sql);
  $rsql1=mysqli_fetch_array($result,MYSQLI_ASSOC);
  $xnom=$rsql1['alm_nombre'];
  $xdirec=$rsql1['alm_direc'];
  $id=$rsql1['alm_id'];

 ?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Almacen Registrados
            </div>
            <div class="panel-body">
                <div class="row">
                  <div class="col-md-12 col-xs-12 col-lg-12">
                    <form  id="RegistroE" role="form" action="index.php?menu=19" method="post">
                        <input type="hidden" name="edit" value="<?php echo $id; ?>">
                       <div class="form-group col-md-8 col-xs-12 col-lg-3">
                         <label>NOMBRE:</label>
                         <input class="form-control text-uppercase" name="xnom" title="Ingrese Nombre del Almacén" value="<?php echo $xnom; ?>" required>
                       </div>
                       <div class="form-group col-md-8 col-xs-12 col-lg-9">
                         <label>DIRECCION:</label>
                         <input class="form-control text-uppercase" name="xdirec"  title="Ingrese Dirección del Almacén "  value="<?php echo $xdirec; ?>" required>
                       </div>
                       <div class="col-lg-4 col-md-4 hidden-xs top">
                         <button type="submit" class="btn btn-primary" name="Editar" value="Actualizar">Actualizar </button>
                         <a href="index.php?menu=18" class="btn btn-warning" role="button"><i class="glyphicon glyphicon-chevron-left"></i></a>
                      </div>
                      <div class="col-xs-12 visible-xs top">
                        <button type="submit" class="btn btn-primary" name="Editar" value="Actualizar">Actualizar </button>
                        <a href="index.php?menu=18" class="btn btn-warning" role="button"><i class="glyphicon glyphicon-chevron-left"></i></a>
                     </div>
                    </form>
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
