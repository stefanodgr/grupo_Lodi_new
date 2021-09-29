<?php
  include "../Funciones/BD.php";
  $sql="SELECT tas_id,tas_sunat_compra,tas_sunat_venta,tas_banco_compra,tas_banco_venta,DATE_FORMAT(tas_fecha,'%d-%m-%Y') as fecha FROM sys_tasa_cambio
	ORDER BY tas_fecha";
  $result=mysqli_query($con,$sql);
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
                       <div class="form-group col-md-8 col-xs-12 col-lg-3">
                         <label>SUNAT COMPRA:</label>
                         <input class="form-control text-uppercase" name="xsunc" pattern="\d+(\.\d{3})?" title="Ingrese solo numeros con 3 decimales" required>
                       </div>
                       <div class="form-group col-md-8 col-xs-12 col-lg-3">
                         <label>SUNAT VENTA:</label>
                         <input class="form-control text-uppercase" name="xsunv" pattern="\d+(\.\d{3})?" title="Ingrese solo numeros con 3 decimales" required>
                       </div>
                       <div class="form-group col-md-8 col-xs-12 col-lg-3">
                         <label>BANCO COMPRA:</label>
                         <input class="form-control text-uppercase" name="xbanc" pattern="\d+(\.\d{3})" title="Ingrese solo numeros con 3 decimales" required>
                       </div>
                       <div class="form-group col-md-8 col-xs-12 col-lg-3">
                         <label>BANCO VENTA:</label>
                         <input class="form-control text-uppercase" name="xbanv" pattern="\d+(\.\d{3})" title="Ingrese solo numeros con 3 decimales" required>
                       </div>
                       <div class="form-group col-md-8 col-xs-12 col-lg-3">
                         <label>FECHA:</label>
                         <input class="form-control text-uppercase" name="xfec" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}" title="Ingrese solo letras" required>
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
                  Tasas Registradas
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                      <tr>
                        <th class="text-center">FECHA</th>
                        <th class="text-center">SUNAT COMPRA</th>
                        <th class="text-center">SUNAT VENTA</th>
                        <th class="text-center">BANCO COMPRA</th>
                        <th class="text-center">BANCO VENTA</th>
                        <th class="text-center">EDITAR</th>
                      </tr>
                    </thead>
                    <tbody class="text-center">
                    <?php while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){ ?>
                      <tr>
                         <td><?php echo $row['fecha']; ?></td>
                          <td><?php echo $row['tas_sunat_compra']; ?></td>
                          <td><?php echo $row['tas_sunat_venta']; ?></td>
                          <td><?php echo $row['tas_banco_compra']; ?></td>
                          <td><?php echo $row['tas_banco_venta']; ?></td>


                        <!--EDITAR-->
                          <td class="centeralign">
                              <form  id="EditarE" role="form" action="index.php?menu=14" method="post">
                                <button class="btn btn-warning btn-sm glyphicon glyphicon-edit" name="edit" value='<?php echo $row['tas_id']; ?>'></button>
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
