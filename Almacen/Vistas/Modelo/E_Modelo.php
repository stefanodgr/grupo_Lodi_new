<?php
  include "../Funciones/BD.php";
  $edit=$_POST['edit'];
  $sql="SELECT md.mod_id,
  md.mod_nombre,
  md.mod_estatus,
  mar.mar_id,
  md.mod_img,
  mar.mar_nombre
  FROM
  sys_modelo md, sys_marca mar 
  WHERE md.mar_id= mar.mar_id and md.mod_id='$edit'";
  $result       =mysqli_query($con,$sql);
  $rsql1        =mysqli_fetch_array($result,MYSQLI_ASSOC);
  $xmarca       =$rsql1['mar_id'];
  $xmaNom       =$rsql1['mar_nombre'];
  $xnom         =$rsql1['mod_nombre'];
  $id           =$rsql1['mod_id'];
  $logo           =$rsql1['mod_img'];
 ?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="panel panel-default">
            <div class="col-md-12 col-xs-12 col-lg-12">
              <!-- <div class="panel panel-default"> -->
                <div	id="div_nombre_produ" class="col-lg-6">
                    <h2 class="azul"><i class="glyphicon glyphicon-th-list"></i>&nbsp;<strong>Editar Modelos </strong></h2>
                </div>
            </div>
            <div id="" class="col-lg-12">
                <hr class="black" />
            </div>
  <hr>
  <br>
  <br>
  <div align="center" class="border border-primary">
    <img src="Logos/<?php echo $logo; ?>" style="border-style: groove;border-width: 7px;border-color: coral;width:50%;height:10%;" class="img-responsive" />
  </div>

  <div id="" class="col-lg-12">
    <hr class="black" />
    </div>
            <br>
            <br>
            <hr>
            <div class="panel-body">
                <div class="row">
                  <div class="col-md-12 col-xs-12 col-lg-12">
                    <form  id="RegistroE" role="form" action="index.php?menu=8" enctype="multipart/form-data"  method="post">
                        <input type="hidden"    name="edit"     value="<?php echo $id; ?>">
                        <input type="hidden"    name="logo"     value="<?php echo $logo;  ?>">
                        <input type="hidden"    name="action"   value="upload" />
                        <input type="hidden"    name="xnom"     value="<?php echo $xnom; ?>">
                        <input type="hidden"    name="xmarca"   value="<?php echo $xmarca; ?>">
                        <input type="hidden"    name="xmaNom"   value="<?php echo $xmaNom; ?>">

                        <div class="form-group col-md-8 col-xs-12 col-lg-3">
                         <label>NOMBRE:</label>
                         <input class="form-control text-uppercase" name="xnom"  title="Ingrese Nombre del Modelo" value="<?php echo $xnom; ?>" required>
                       </div>
                       <div class="form-group col-xs-12 col-md-12 col-lg-3">
                              <label>Marca:</label>
                             <select class="form-control"  name="xmarca" >
                               <?php
                                      $sql2="SELECT mar_id,mar_nombre from sys_marca WHERE mar_estatus=1 order by mar_id";
                                      $rsql2=mysqli_query($con,$sql2);
                                      echo "<option value='$xmarca'>$xmaNom</option>";
                                      if( $row2=mysqli_fetch_array($rsql2,MYSQLI_ASSOC)){
                                      do{
                                          echo '<option value="'.$row2['mar_id'].'">'.$row2['mar_nombre'].'</option>';
                                          } while($row2=mysqli_fetch_array($rsql2,MYSQLI_ASSOC));
                                      }
                                ?>
                            </select>
                        </div>
                      <div class="form-group col-md-8 col-xs-12 col-lg-2">
                      <label>LOGO:</label>
                      <div class="top-xs">
                            <input type="file" title="SELECCIONAR LOGO" class="btn btn-success" name="archivo" id="archivo">
                      </div>
                       </div>
                       <div class="col-lg-4 col-md-4 hidden-xs top">
                         <button type="submit" class="btn btn-primary" name="Editar" value="Actualizar">Actualizar </button>
                         <a href="index.php?menu=4" class="btn btn-warning" role="button"><i class="glyphicon glyphicon-chevron-left"></i></a>
                         <!-- <a href="index.php?menu=6" class="btn btn-warning" role="button"><i class="glyphicon glyphicon-chevron-left"></i></a> -->
                      </div>
                      <div class="col-xs-12 visible-xs top">
                        <button type="submit" class="btn btn-primary" name="Editar" value="Actualizar">Actualizar </button>
                        <a href="index.php?menu=4" class="btn btn-warning" role="button"><i class="glyphicon glyphicon-chevron-left"></i></a>
                        <!-- <a href="index.php?menu=6" class="btn btn-warning" role="button"><i class="glyphicon glyphicon-chevron-left"></i></a> -->
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
