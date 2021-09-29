<?php
include "../Funciones/BD.php";

?>
<div class="row">
  <div class="col-lg-12 col-md-12 col-xs-12">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="col-lg-12">
          <div class="row" id="titulo">
            <div class="col-lg-6">
              <h2 class="azul"><i class="fa fa-folder-open-o fa-fw"></i><strong>IMPORTACIONES-PAGOS</strong></h2>
            </div>
          </div>
        </div>

        <div class="table-responsive col-lg-12">
          <hr class="black" />
          <div id="element2">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
              <thead>
                <tr>
                  <th class="text-center">N°</th>
                  <th class="text-center">#FOLDER</th>
                  <th class="text-center">IMPORTADOR</th>
                  <th class="text-center">PROVEEDOR</th>
                  <th class="text-center">ETA</th>
                  <th class="text-center">INCOTERM</th>
                  <th class="text-center">MONTO</th>
                  <th class="text-center">SALDO</th>
                  <th class="text-center">COMENTARIO</th>
                  <th class="text-center">PROCESAR</th>
                </tr>
              </thead>
              <tbody class="text-center">

                <tr>
                  <!-- CONTADOR -->
                  <td>1</td>

                  <!--FOLDER -->

                  <td>2020-54</td>
                  <!-- IMPORTADOR -->
                  <td>GRUPO LODI SRL</td>
                  <!-- PROVEEDOR -->
                  <td>BOE COMMERCE</td>
                  <!-- ETA -->
                  <td>15/06/2020</td>
                  <!-- INCOTERM -->
                  <td>FOB</td>
                  <!-- MONTO -->
                  <td>50,930.40</td>
                  <!-- SALDO -->
                  <td style="backgroud-color:red;">$  15,279.12</td>
                  <!-- COMENTARIO -->
                  <td>PAGAR AL PROVEEDOR ANTES DE LA LLEGADA</td>

                  <!--EDITAR-->
                  <td class="centeralign">
                    <form id="EditarE" role="form" action="index.php?menu=6" method="post">
                      <button class="btn btn-warning btn-sm glyphicon glyphicon-edit" id="editar" name="edit" value='<?php echo $row['mar_id']; ?>'></button>
                    </form>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.col-lg-12 -->
</div>