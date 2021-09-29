<?php
include "../Funciones/BD.php";
$sql="SELECT

 produ_deta_codigo,
 produ_deta_nombre
  FROM
  sys_produ_detalle
";
	$result=mysqli_query($con,$sql);

	// $result=mysqli_query($con,$sql);

  // /*Traer los Clasificacion*/
	// $sql_clasi = "select produ_clasi_id,produ_clasi_desc from sys_produ_clasi";
  // $result_clasi=mysqli_query($con,$sql_clasi);
 ?>

<style>
.oculto{
	display: none;
}
.fondoError{
  border-style: solid;
  border-color: red;
}
td, input {padding:5px;}
</style>



<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
			<div class="panel panel-default">
            <div class="panel-body">
            <!-- Nav tabs -->
            <!-- Tab panes -->
          <div class="tab-content">
            <div class="col-md-12 col-xs-12 col-lg-12">
            <!-- <div class="panel panel-default"> -->
            <div class="row" id="titulo">
              <div class="col-lg-6">
                <h2 class="azul"><i class="fa fa-phone-square fa-fw"></i>&nbsp;<strong>Importaciones</strong></h2>
              </div>
              <div class="col-lg-6 text-right" id="div_btn_importacion" >
                <button class="btn btn-primary" id="show" onclick="DivOcultarImpor(1);" ><i class="fa fa-plus "></i> Nueva Importacion</button>
              </div>
		          </div>
          </div>
          </div>
			
			<hr>
      <form  id="form_Importacion" role="form" action="index.php?menu=2" method="post">
        <div class="form"  id="div_nuevo_importa" style="display:none;">
            <div class="panel-heading">
              <h4 class="azul"><i class="fa fa-phone-square fa-fw"></i>&nbsp;<strong>MODULO DE IMPORTACION</strong></h4>
            </div>

            <ul class="stepper horizontal" id="horizontal-stepper">
  <li class="step active">
    <div class="step-title waves-effect waves-dark">Step 1</div>
    <div class="step-new-content">
      <div class="row">
        <div class="md-form col-12 ml-auto">
          <input id="email-horizontal" type="email" class="validate form-control" required>
          <label for="email-horizontal">Email</label>
        </div>
      </div>
      <div class="step-actions">
        <button class="waves-effect waves-dark btn btn-sm btn-primary next-step" data-feedback="someFunction21">CONTINUE</button>
      </div>
    </div>
  </li>
  <li class="step">
    <div class="step-title waves-effect waves-dark">Step 2</div>
    <div class="step-new-content">
      <div class="row">
        <div class="md-form col-12 ml-auto">
          <input id="password-horizontal" type="password" class="validate form-control" required>
          <label for="password-horizontal">Your password</label>
        </div>
      </div>
      <div class="step-actions">
        <button class="waves-effect waves-dark btn btn-sm btn-primary next-step" data-feedback="someFunction21">CONTINUE</button>
        <button class="waves-effect waves-dark btn btn-sm btn-secondary previous-step">BACK</button>
      </div>
    </div>
  </li>
  <li class="step">
    <div class="step-title waves-effect waves-dark">Step 3</div>
    <div class="step-new-content">
      Finish!
      <div class="step-actions">
        <button class="waves-effect waves-dark btn-sm btn btn-primary m-0 mt-4" type="button">SUBMIT</button>
      </div>
    </div>
  </li>
</ul>
            <!-- ------------------------EMPRESA--------------------------------------------------- -->
            <div class="form-group  col-md-8 col-xs-12 col-lg-3">
                <label><small>EMPRESA :</small></label>
                <select class="form-control"  name="xemp" id="xemp" >			<!--EMPRESA-->
              <?php
                $sql2="SELECT emp_id,emp_nombre from sys_empresas WHERE emp_estatus=1 order by emp_id";
                $rsql2=mysqli_query($con,$sql2);
                echo "<option value='0' >--</option>";
                if( $row2=mysqli_fetch_array($rsql2,MYSQLI_ASSOC)     ){
                  do{
                    echo '<option value="'.$row2['emp_id'].'">'.$row2['emp_nombre'].'</option>';
                  } while($row2=mysqli_fetch_array($rsql2,MYSQLI_ASSOC));
                }
              ?>
                </select>
            </div>
            <!-- <input  type ="hidden" class="form-control"  name="xmarNom1"   id="xmarNom1"> -->
            <!-- -------------------------------EMPRESA----------------------------------- -->
            <!-- -------------------------------TIPO PRODUCTO----------------------------------- -->
            <div class="form-group  col-md-8 col-xs-12 col-lg-2">
              <label><small> TIPO DE PRODUCTO :</small></label>
              <select class="form-control"  id="xclasi" name="xclasi"  > 	<!--TIPO DE PRODUCTO-->
              <!-- Leer los Clasificacion -->
                <?php
                  $sql2="SELECT produ_clasi_id,produ_clasi_desc from sys_produ_clasi WHERE produ_clasi_estatus=1 order by produ_clasi_id";
                  $rsql2=mysqli_query($con,$sql2);
                  echo "<option value='0' >--</option>";
                  if( $row2=mysqli_fetch_array($rsql2,MYSQLI_ASSOC)     ){
                    do{
                      echo '<option value="'.$row2['produ_clasi_id'].'">'.$row2['produ_clasi_desc'].'</option>';
                    } while($row2=mysqli_fetch_array($rsql2,MYSQLI_ASSOC));
                  }
                ?>
              </select>
            <!-- <input type="hidden"	id="xID"	 name="xID"	 value="">	 -->
            </div>
            <!-- -------------------------------TIPO PRODUCTO----------------------------------- -->
            <div class="form-group col-md-6 col-xs-12 col-lg-2">                                     <!-- FOLDER -->
              <label><small> FOLDER :</small></label>
              <!-- <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>
              <label for="">FOLDER</label> -->
              <div class="input-group">
                <input name="xfolder" id="xfolder" type="text" required class="form-control" value="">
                <span class="input-group-addon">N°</span>
                <input name="xnrfolder" id="xnrfolder" type="text" required class="form-control" value="">
              </div>
            </div>
            <div class="form-group  col-md-6 col-xs-12 col-lg-2">                                   <!-- INCOTERM -->
              <label><small>INCOTERM :</small></label>
              <select class="form-control" id="xincot" name="xincot"  >
                <option value="0" selected>--</option>
                <option value="FOB">FOB</option>
              </select>
            </div>
            <div class="form-group  col-md-6 col-xs-12 col-lg-2">                                   <!-- TIPO DE CTN  -->
              <label><small>TIPO DE CTN :</small></label>
              <select class="form-control" id="xtipo_ctn" name="xtipo_ctn"  >
                <option value="0" selected>--</option>
                <option value="40HC">40HC</option>
              </select>
            </div>
            <div class="form-group col-md-6 col-xs-12 col-lg-1">                                     <!-- QTY CTN -->
              <label><small> QTY CTN :</small></label>
              <input class="form-control text-uppercase" name="xqty" id="xqty"  title=""  >
            </div>
            <!-- ------------------------MARCA--------------------------------------------------- -->
            <div class="form-group  col-md-8 col-xs-12 col-lg-4">
              <label><small>MARCA :</small></label>
              <select class="form-control"  name="xmar1" id="xmar1"   >			<!--MARCA-->
                <?php
                  $sql3="SELECT mar_id,mar_nombre from sys_marca WHERE mar_estatus=1 order by mar_id";
                  $rsql3=mysqli_query($con,$sql3);
                  echo "<option value='0' >--</option>";
                  if( $row3=mysqli_fetch_array($rsql3,MYSQLI_ASSOC)     ){
                    do{
                      echo '<option value="'.$row3['mar_id'].'">'.$row3['mar_nombre'].'</option>';
                    } while($row3=mysqli_fetch_array($rsql3,MYSQLI_ASSOC));
                  }
                ?>
              </select>
            </div>
            <!-- <input  type ="hidden" class="form-control"  name="xmarNom1"   id="xmarNom1"> -->
            <!-- -------------------------------MARCA----------------------------------- -->
            <!-- --------------------------------PAIS------------------------------------------------------------------>
            <div class="form-group  col-md-8 col-xs-12 col-lg-4">
              <label><small> PAIS :</small></label>
              <select class="form-control"  id="xpais1" name="xpais1"    >
                <!-- Leer los Clasificacion -->
                <?php
                  $sql4="SELECT pais_id,pais_nombre from sys_pais WHERE pais_estatus=1 order by pais_id";
                  $rsql4=mysqli_query($con,$sql4);
                  echo "<option value='0' selected>--</option>";
                  if( $row4=mysqli_fetch_array($rsql4,MYSQLI_ASSOC)     ){
                    do{
                      echo '<option value="'.$row4['pais_id'].'">'.$row4['pais_nombre'].'</option>';
                    } while($row4=mysqli_fetch_array($rsql4,MYSQLI_ASSOC));
                  }
                ?>
              </select>
            </div>
            <!-- <input  type ="hidden" class="form-control"  name="xpaisNom1"  id="xpaisNom1"> -->
            <!-- -------------------------------PAIS------------------------------------------------------------------->
            <div class="form-group  col-md-6 col-xs-12 col-lg-4">                                   <!-- INCOTERM -->
              <label><small>PUERTO :</small></label>
              <select class="form-control" id="xpuerto" name="xpuerto"  >
                <option value="0" selected>--</option>
                <option value="FOB">QINGDAO</option>
              </select>
            </div>
      </form>
        <div id="div_consul_importa" style="display:block;">
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr>
                  <th class="text-center">CODIGO</th>
                  <th class="text-center">NOMBRE</th>
                  <th class="text-center">EDITAR</th>
                          </tr>
                            </thead>
                            <tbody class="text-center">
                            <?php while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){ ?>
                              <tr>
                                  <td>00000000000001</td>
                                  <td><?php echo $row['produ_deta_nombre']; 	?></td>
                        <!--EDITAR-->
                          <td class="centeralign">
                              <form  id="EditarE" role="form" action="index.php?menu=50" method="post">
                                <button class="btn btn-warning btn-sm glyphicon glyphicon-edit" name="edit"  value='<?php echo $row['produ_id']; ?>'></button>
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
              </div>
      </div>
    <!--      </div> -->
                <!-- /.panel-body -->

    <!--     </div> -->
            <!-- /.panel -->

  <!--   </div> -->
        <!-- /.col-lg-12 -->
</div>
    <!-- /.row-->

<script src="http://code.jquery.com/jquery-latest.js"></script>
<link 	href="css_sg/general.css?"	rel="stylesheet"	type="text/css"/>
<script src="js_sg/importacion.js?<?=substr(time(),-5)?>" language="Javascript"></script>
<script src="js_sg/sistema.js?<?=substr(time(),-5)?>" language="Javascript"></script>

