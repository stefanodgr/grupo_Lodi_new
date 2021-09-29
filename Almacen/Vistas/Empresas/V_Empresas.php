<?php
  include "../Funciones/BD.php";
  $sql="select * from sys_empresas WHERE (emp_id>0 and length(emp_id)>0) ORDER BY emp_id";
  $result=mysqli_query($con,$sql);
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
                     <div class="alert alert-info">
                      <strong>Recuerde:</strong> Cargar imagenes o logos solo en formato JPG, JPEG, GIF, PNG.
                    </div>
                       <form role="form" action="index.php?menu=16"  enctype="multipart/form-data"  method="post" >
          							<input name="action" type="hidden" value="upload" />
                       <div class="form-group col-md-8 col-xs-12 col-lg-2">
                         <label>RUC / DNI:</label>
                         <input class="form-control text-uppercase" name="xiden" pattern="[0-9+].{6,}" title="Ingrese numeros" required>
                       </div>
                        <div class="form-group col-md-8 col-xs-12 col-lg-4">
                          <label>NOMBRE / RAZON SOCIAL:</label>
                          <input class="form-control text-uppercase" name="xnom" pattern="[A-z ]+.{5}" title="Ingrese solo letras" required>
                        </div>
                        <div class="form-group col-md-8 col-xs-12 col-lg-3">
                          <label>LOGO:</label>
                            <div class="top-xs">
                            <input type="file" title="SELECCIONAR IMAGEN" class="btn btn-success" name="archivo" id="archivo">
                          </div>
                        </div>

                        <div class="col-lg-3 col-md-4 hidden-xs top text-right">
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
                   Grupos Registrados
               </div>
               <div class="panel-body">
                 <div class="table-responsive">
                   <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                     <thead>
                       <tr>
                         <th class="text-center">ID</th>
                         <th class="text-center">RUC / DNI</th>
                         <th class="text-center">DESCRIPCION</th>
                         <th class="text-center">HABILITAR</th>
                         <th class="text-center">DESHABILITAR</th>
                         <th class="text-center">EDITAR</th>
                       </tr>
                     </thead>
                     <tbody class="text-center">
                     <?php while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){ ?>
                       <tr>
                           <td><?php echo $row['emp_id']; ?></td>
                           <td><?php echo $row['emp_ruc']; ?></td>
                           <td><?php echo $row['emp_nombre']; ?></td>
                           <?php if ($row['emp_estatus']=='1'){   ?>
                           <td class="centeralign"><button class="btn btn-success btn-sm glyphicon glyphicon-ok" disabled></button></td>
                           <!--DESHABILITAR-->
                         <td class="centeralign">
                           <form  id="DeshabilitarE" role="form" action="index.php?menu=16" method="post">
                             <button class="btn btn-danger btn-sm glyphicon glyphicon-remove" name="desac" value='<?php echo $row['emp_id']; ?>'></button>
                           </form>
                         </td>
                         <?php } else { ?>
                           <!--HABILITAR-->
                           <td class="centeralign">
                           <form  id="HabilitarE" role="form" action="index.php?menu=16" method="post">
                               <button class="btn btn-success btn-sm glyphicon glyphicon-ok" name='act' value="<?php echo $row['emp_id']; ?>"></button>
                           </form>
                           </td>
                           <td class="centeralign"><button class="btn btn-danger btn-sm glyphicon glyphicon-remove" disabled></button></a></td>
                         <?php  } ?>
                         <!--EDITAR-->
                           <td class="centeralign">
                               <form  id="EditarE" role="form" action="index.php?menu=17" method="post">
                                 <button class="btn btn-warning btn-sm glyphicon glyphicon-edit" name="edit" value='<?php echo $row['emp_id']; ?>'></button>
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
