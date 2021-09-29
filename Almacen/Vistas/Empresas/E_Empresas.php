<?php
  include "../Funciones/BD.php";
  $edit=$_POST['edit'];
  $sql="select * from sys_empresas WHERE (emp_id>0 and length(emp_id)>0) AND emp_id='$edit'";

  $result=mysqli_query($con,$sql);
  $rsql1=mysqli_fetch_array($result,MYSQLI_ASSOC);
  $xnom=$rsql1['emp_nombre'];
  $xiden=$rsql1['emp_ruc'];
  $id=$rsql1['emp_id'];



 ?>
 <div class="row">
     <div class="col-lg-12 col-md-12 col-xs-12">
         <div class="panel panel-default">
             <div class="panel-heading">
                 Registro de Empresas
             </div>
             <div class="panel-body">

                 <div class="row">
                   <div class="col-md-12 col-xs-12 col-lg-12">

                    <div align="center">
                      <img src="../Logos/ASIAPERU.PNG" class="img-rounded img-responsive" />
                      <hr class="borde">

                    </div>
                       <form role="form" action="index.php?menu=16"  enctype="multipart/form-data"  method="post" >
          							<input name="action" type="hidden" value="upload" />
                       <div class="form-group col-md-8 col-xs-12 col-lg-2">
                         <label>RUC / DNI:</label>
                         <input class="form-control text-uppercase" name="xiden" pattern="[0-9+].{6,}" title="Ingrese numeros" value="<?php echo $xiden; ?>" required>
                       </div>
                        <div class="form-group col-md-8 col-xs-12 col-lg-4">
                          <label>NOMBRE / RAZON SOCIAL:</label>
                          <input class="form-control text-uppercase" name="xnom" pattern="[A-z ]+.{5}" title="Ingrese solo letras" value="<?php echo $xnom; ?>" required>
                        </div>
                        <div class="form-group col-md-8 col-xs-12 col-lg-3">
                          <label>LOGO:</label>
                            <div class="top-xs">
                            <input type="file" title="SELECCIONAR LOGO" class="btn btn-success" name="archivo" id="archivo">
                          </div>
                        </div>

                        <div class="col-lg-3 col-md-4 hidden-xs top text-right">
                          <button type="submit" class="btn btn-primary" name="Editar" value="Actualizar">Actualizar </button>
                          <a href="index.php?menu=15" class="btn btn-warning" role="button"><i class="glyphicon glyphicon-chevron-left"></i></a>
                       </div>
                       <div class="col-xs-12 visible-xs top">
                         <button type="submit" class="btn btn-primary" name="Editar" value="Actualizar">Actualizar </button>
                         <a href="index.php?menu=15" class="btn btn-warning" role="button"><i class="glyphicon glyphicon-chevron-left"></i></a>
                      </div>
                     </form>
                 </div>
               </div>



             </div>
                 <!-- /.row (nested) -->

         </div>
             <!-- /.panel-body -->

     </div>
         <!-- /.panel -->
 </div>
     <!-- /.col-lg-12 -->

     <script>
   	$(document).ready(function() {
   				$('input[type=file]').bootstrapFileInput();



   			} );

   	</script>
