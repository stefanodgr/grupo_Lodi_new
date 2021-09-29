<?php
  include "../Funciones/BD.php";
  $edit=$_POST['edit'];
  $sql="SELECT produ_clasi_id,produ_clasi_desc
FROM sys_produ_clasi WHERE produ_clasi_id	='$edit'";
  $result       =mysqli_query($con,$sql);
  $rsql1        =mysqli_fetch_array($result,MYSQLI_ASSOC);
  $xnom   =$rsql1['produ_clasi_desc'];
  $id     =$rsql1['produ_clasi_id'];

 ?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
               Editar Clasificaciones Registradas
            </div>
            <div class="panel-body">
                <div class="row">
                  <div class="col-md-12 col-xs-12 col-lg-12">
                    <form  id="RegistroE" role="form" action="index.php?menu=43" method="post">
                        <input type="hidden" name="edit" value="<?php echo $id; ?>">
                       <div class="form-group col-md-8 col-xs-12 col-lg-3">
                         <label>NOMBRE:</label>
                         <input class="form-control text-uppercase" name="xnom"  title="Ingrese Nombre de la Clasificacion" value="<?php echo $xnom; ?>" required>
                       </div>
                       <div class="col-lg-4 col-md-4 hidden-xs top">
                         <button type="submit" class="btn btn-primary" name="Editar" value="Actualizar">Actualizar </button>
                         <a href="index.php?menu=42" class="btn btn-warning" role="button"><i class="glyphicon glyphicon-chevron-left"></i></a>
                      </div>
                      <div class="col-xs-12 visible-xs top">
                        <button type="submit" class="btn btn-primary" name="Editar" value="Actualizar">Actualizar </button>
                        <a href="index.php?menu=42" class="btn btn-warning" role="button"><i class="glyphicon glyphicon-chevron-left"></i></a>
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
