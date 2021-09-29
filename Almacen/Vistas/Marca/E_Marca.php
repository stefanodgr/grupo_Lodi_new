<?php
include "../Funciones/BD.php";
$edit = $_POST['edit'];
$xno  = $_POST['xno'];
  if ($edit=='') {
    $edit =$xno;
  }


$sql = "SELECT mr.mar_id,mr.mar_nombre,mr.mar_estatus,mr.mar_logo,pclasi.produ_clasi_id,pclasi.produ_clasi_desc
  FROM sys_marca mr, sys_produ_clasi pclasi  WHERE mr.produ_clasi_id= pclasi.produ_clasi_id and mr.mar_id='$edit'";
$result       = mysqli_query($con, $sql);
$rsql1        = mysqli_fetch_array($result, MYSQLI_ASSOC);
$xclasiNom  = $rsql1['produ_clasi_desc'];
$xclasi     = $rsql1['produ_clasi_id'];
$xNomMar    = $rsql1['mar_nombre'];
$id         = $rsql1['mar_id'];
$logo       = $rsql1['mar_logo'];

//  echo "---->".$xno;
$sql3 = "SELECT 
mr.mar_id,
mr.mar_nombre,
md.mod_id,
md.mod_nombre, 
pr.produ_id,
deta.produ_deta_id, 
deta.produ_deta_codigo,
deta.produ_neu_uso,
deta.produ_neu_ancho_inter,
deta.produ_neu_aro,
md.mod_estatus 
FROM sys_modelo md, sys_marca mr , sys_producto pr , sys_produ_detalle deta 
WHERE mr.mar_id = md.mar_id and pr.produ_id = deta.produ_deta_id and pr.mod_id = md.mod_id and mr.mar_id = '$xno'";
$result3       = mysqli_query($con, $sql3);
?>

<script src="js_sg/marca.js" language="Javascript"></script>
<div class="row">
  <div class="col-lg-12 col-md-12 col-xs-12">
    <div class="panel panel-default">
      <div class="panel-body">
        <?php if ($xno <> '') {  ?>
        <!-- FORMULARIO CONSULTA MARCA -->
          <div class="col-lg-12">
            <div class="row" id="div_nombre_produ">
                  <div class="col-lg-6">
                  <h2 class="azul"><i class="fa fa-cogs fa-fw"></i><strong><?php echo ' MARCA '.' - '.$xNomMar; ?></strong></h2>
                </div>
                  <div class="col-lg-6 text-right" >
                    <a href="index.php?menu=4" class="btn btn-warning" role="button"><i class="glyphicon glyphicon-chevron-left"></i> </a>
                  </div>
            </div>
          </div>
           <div class="table-responsive col-lg-12"><hr class="black" />
             <table class="table table-striped table-bordered table-hover" id="dataTables-example">
              <thead>
                <tr>
                  <th class="text-center">ID</th>
                  <th class="text-center">SKU</th>
                  <th class="text-center">MODELO</th>
                  <th class="text-center">USO COMERCIAL</th>
                  <th class="text-center">ANCHO/SECCION</th>
                  <th class="text-center">ARO</th>
                  <th class="text-center">EDITAR</th>
                </tr>
              </thead>
              <tbody class="text-center">
                <?php
                $cuent ='0';
                while ($row = mysqli_fetch_array($result3, MYSQLI_ASSOC)) { ?>
                <tr>
                
                  <td><?php echo $cuent++; ?></td>
                  <td><?php echo $row['produ_deta_codigo']; ?></td>
                  <td><?php echo $row['mod_nombre']; ?></td>
                  <td><?php echo $row['produ_neu_uso']; ?></td>
                  <td><?php echo $row['produ_neu_ancho_inter']; ?></td>
                  <td><?php echo $row['produ_neu_aro']; ?></td>
                  <!--EDITAR-->
                  <td class="centeralign">
                    <form id="EditarE" role="form" action="index.php?menu=7" method="post">
                      <button class="btn btn-warning btn-sm glyphicon glyphicon-edit" id="editar" name="edit" value='<?php echo $row['mod_id']; ?>'></button>
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
  <?php   } else { ?>
  <div class="col-md-12 col-xs-12 col-lg-12">

    <!-- <div class="panel panel-default"> -->
    <div id="div_nombre_produ" class="col-lg-6">
    <h2 class="azul"><i class="fa fa-cogs"></i><strong> Editar Marcas</strong></h2>
      
    </div>
    <div id="" class="col-lg-12">
    <hr class="black" />
    </div>
  </div>
  <hr>
  <br>
  <br>
  <div align="center" class="border border-primary">
    <img src="Logos/<?php echo $logo; ?>" style="border-style: groove;border-width: 7px;border-color: coral;width:50%;height:300px;" class="img-responsive" />
  </div>

  <div id="" class="col-lg-12">
    <hr class="black" />
    </div>
  <form id="RegistroE" role="form" action="index.php?menu=5" enctype="multipart/form-data" method="post">
    <input type="hidden" name="edit" value="<?php echo $id; ?>">
    <input type="hidden" name="logo"  value="<?php echo $logo;  ?>">
    <input name="action" type="hidden" value="upload" />
    <input type="hidden" name="xclasi" id="xclasi" value="<?php echo $xclasi; ?>">
    <input type="hidden" name="xclasiNom" id="xclasiNom" value="<?php echo $xclasiNom; ?>">
    <input type="hidden" name="xNomMar" value="<?php echo $xNomMar; ?>">
    <div class="form-group col-xs-8 col-md-8 col-lg-3">
      <label>CLASIFICACION:</label>
      <select class="form-control" name="xclasi">
        <?php
          $sql2 = "SELECT produ_clasi_id,produ_clasi_desc from sys_produ_clasi WHERE produ_clasi_estatus=1 order by produ_clasi_id";
          $rsql2 = mysqli_query($con, $sql2);
          echo "<option value='$xclasi'>$xclasiNom</option>";
          if ($row2 = mysqli_fetch_array($rsql2, MYSQLI_ASSOC)) {
            do {
              echo '<option value="' . $row2['produ_clasi_id'] . '">' . $row2['produ_clasi_desc'] . '</option>';
            } while ($row2 = mysqli_fetch_array($rsql2, MYSQLI_ASSOC));
          }
          ?>
      </select>
    </div>
    <div class="form-group col-md-8 col-xs-12 col-lg-3">
      <label>NOMBRE:</label>
      <input class="form-control text-uppercase" name="xNomMar" title="Ingrese Nombre del Marca" value="<?php echo $xNomMar; ?>" required>
    </div>
    <div id="div_nombre_modelo" class="form-group col-md-8 col-xs-12 col-lg-3" style="display:none;">
      <label>Nombre Modelo:</label>
      <input class="form-control text-uppercase" name="xmodelo" id="xmodelo" title=" Ingrese Nombre del Marca ">
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
    </div>
    <div class="col-xs-12 visible-xs top">
      <button type="submit" class="btn btn-primary" name="Editar" value="Actualizar">Actualizar </button>
      <a href="index.php?menu=4" class="btn btn-warning" role="button"><i class="glyphicon glyphicon-chevron-left"></i></a>
    </div>
  </form>
  <?php } ?>


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

<script>








</script>
