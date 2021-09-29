<?php
  include "../Funciones/BD.php";
  #Clientes - Proveedores
  $sql3="SELECT 	
  pc.produ_pro_id,
  pc.produ_pro_desc,
  pc.produ_pro_uni,
  pc.produ_pro_codigo,
	mr.mar_id,
  mr.mar_nombre,
	pa.pais_id,
  pa.pais_nombre
 



FROM  sys_produ_pro pc , sys_marca mr, sys_pais pa 

WHERE pc.mar_id= mr.mar_id AND pa.pais_id = pc.pais_id 
ORDER BY produ_pro_id";
  $result3=mysqli_query($con,$sql3);


 ?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
          <div class="panel-group" id="accordion">
                  </div>
                  <div class="panel panel-default">
                      <div class="panel-heading">
                          <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Productos Protectores Registrados</a>
                          </h4>
                      </div>
                      <div id="collapseTwo" class="panel-collapse collapse" style="height: 0px;">
                          <div class="panel-body">
                            <div class="table-responsive">
                              <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                  <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">MARCA</th>
                                    <th class="text-center">DESCRIPCION</th>
                                    <th class="text-center">PAIS</th>
                                    <th class="text-center">EDITAR</th>
                                  </tr>
                                </thead>
                                <tbody class="text-center">
                                  <?php while($row3=mysqli_fetch_array($result3,MYSQLI_ASSOC)){ ?>
                                    <tr>
                                      <td><?php echo $row3['produ_pro_id']; ?></td>
                                      <td><?php echo $row3['mar_nombre']; ?></td>
                                      <td><?php echo $row3['produ_pro_desc']; ?></td>
                                      <td><?php echo $row3['pais_nombre']; ?></td>

                                        <!--EDITAR-->
                                        <td class="centeralign">
                                          <form  id="EditarE" role="form" action="index.php?menu=83" method="post">
                                            <button class="btn btn-warning btn-sm glyphicon glyphicon-edit" name="edit" value='<?php echo $row3['produ_pro_id']; ?>'></button>
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
              <!-- /.Accordion -->


    </div>
        <!-- /.col-lg-12 -->
</div>
    <!-- /.row-->
