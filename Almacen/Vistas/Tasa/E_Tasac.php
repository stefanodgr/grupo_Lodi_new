<?php
  include "../Funciones/BD.php";
  $edit=$_POST['edit'];
  $sql="SELECT tas_id,tas_sunat_compra,tas_sunat_venta,tas_banco_compra,tas_banco_venta,DATE_FORMAT(tas_fecha,'%d-%m-%Y') as fecha
FROM sys_tasa_cambio WHERE tas_id='$edit'";
  $result=mysqli_query($con,$sql);
  $rsql1=mysqli_fetch_array($result,MYSQLI_ASSOC);
  $xsunc=$rsql1['tas_sunat_compra'];
  $xsunv=$rsql1['tas_sunat_venta'];
  $xbanc=$rsql1['tas_banco_compra'];
  $xbanv=$rsql1['tas_banco_venta'];
  $xfec=$rsql1['fecha'];
  $id=$rsql1['tas_id'];

 ?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Registrar Tasa de Cambio / SUNAT - BANCO
            </div>
            <div class="panel-body">
                <div class="row">
                  <div class="col-md-12 col-xs-12 col-lg-12">
                    <form  id="RegistroE" role="form" action="index.php?menu=13" method="post">
                        <input type="hidden" name="edit" value="<?php echo $id; ?>">
                        <div class="form-group col-md-8 col-xs-12 col-lg-3">




                       <div class="form-group col-md-8 col-xs-12 col-lg-3">
                         <label>NOMBRE:</label>
                         <input class="form-control text-uppercase" name="xnom" pattern="\d+(\.\d{3})?" title="Ingrese solo numeros con 3 decimales" value="<?php echo $xnom; ?>" required>
                       </div>
                       <div class="form-group col-md-8 col-xs-12 col-lg-3">
                         <label>DIRECCION:</label>
                         <input class="form-control text-uppercase" name="xdirec" pattern="\d+(\.\d{3})?" title="Ingrese solo numeros con 3 decimales"  value="<?php echo $xdirec; ?>" required>
                       </div>
                       <div class="col-lg-4 col-md-4 hidden-xs top">
                         <button type="submit" class="btn btn-primary" name="Editar" value="Actualizar">Actualizar </button>
                         <a href="index.php?menu=12" class="btn btn-warning" role="button"><i class="glyphicon glyphicon-chevron-left"></i></a>
                      </div>
                      <div class="col-xs-12 visible-xs top">
                        <button type="submit" class="btn btn-primary" name="Editar" value="Actualizar">Actualizar </button>
                        <a href="index.php?menu=12" class="btn btn-warning" role="button"><i class="glyphicon glyphicon-chevron-left"></i></a>
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
