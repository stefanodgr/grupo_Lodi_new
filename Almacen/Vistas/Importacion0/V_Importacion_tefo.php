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
  $xTpClasi					=trim(strtoupper($_GET['xTpClasi']));	
  $xmarca						= '';
  $xTpModelo					= '';
  $xproductoG					= '';

  if($xTpClasi <> '1' ){
    $xmarca				= trim(strtoupper($_GET['xmarPro_1'])); 
    $xproductoG			= trim(strtoupper($_GET['xprodu_marca']));
    $xTpModelo					= '0';
}else{
    $xmarca				= trim(strtoupper($_GET['xmarPro'])); 
    $xTpModelo			= trim(strtoupper($_GET['xTpModelo']));
    $xproductoG			= trim(strtoupper($_GET['xproducto']));
}

echo "--MARCAR-->".$xmarca;
echo "--MODELO-->".$xTpModelo;
echo "--PRODUCTO-->".$xproductoG;
$GuardarProdu	=$_GET['GuardarProdu'];
 ?>
 <!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

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
              <div class="col-lg-6 text-right" id="div_btn_impor" >
                <button class="btn btn-primary" id="show" onclick="DivOcultarImpor(1);" ><i class="fa fa-plus "></i> Nueva Importacion</button>
              </div>
            

          <div id="div_forms" class="content" style="display:none;" method="get">
              <script>
                  $(function ()
                  {
                      $("#div_general").steps({
                          headerTag: "h4",
                          bodyTag: "section",
                          transitionEffect: "slideLeft"
                      });
                  });
              </script>

              <div id="div_general">
                  <h4>Folder</h4>
                  <section id="1">
                      <form  id="form_folder" role="form" action="index.php?menu=11" method="post">
                          <!-- ------------------------EMPRESA--------------------------------------------------- -->
                          <div class="form-group  col-md-8 col-xs-12 col-lg-3">
                          <label><small>EMPRESA :</small></label>
                            <select class="form-control"  name="xemp" id="xemp" >			<!--EMPRESA-->
                                <?php
                                  $sql2="SELECT emp_id,emp_nombre from sys_empresas WHERE emp_estatus=1 order by emp_id";
                                  $rsql2=mysqli_query($con,$sql2);
                                  echo "<option value='0' >--</option>";
                                  if( $row2=mysqli_fetch_array($rsql2,MYSQLI_ASSOC)){
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
                              <select class="form-control"  id="xclasi" name="xclasi" onclick="limpiarMarca();"  > 	<!--TIPO DE PRODUCTO-->
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
                                  <option value="FOB" onclick="DivIncotermDisplay(1);">FOB</option>
                                  <option value="CFR" onclick="DivIncotermDisplay();">CFR</option>
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
                              <input  type="text" class="form-control text-uppercase" name="xqty" id="xqty"  title=""   >
                          </div>
                          <!-- ------------------------MARCA--------------------------------------------------- -->
                          <div id="div_marca" class="form-group  col-md-6 col-xs-12 col-lg-3">
                                <label><small>MARCA :</small></label>
                                <select class="form-control"  name="xmar" id="xmar">
                                </select>
                          </div>
                          <div id="div_marca_text" class="form-group col-md-6 col-xs-12 col-lg-3" style="display:none;">                                     <!-- PLIEGUES -->
                                <label><small> NOMBRE MARCA:</small></label>
                                <input type="text" class="form-control text-uppercase"  name="nombrmar"  title="Ingrese solo el PR"  >
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
                          <!-- ------------------------PUERTOS--------------------------------------------------- -->
                          <div id="div_puerto" class="form-group  col-md-6 col-xs-12 col-lg-3">
                                <label><small>PUERTO :</small></label>
                                <select class="form-control"  name="xpuerto" id="xpuerto">
                                </select>
                          </div>
                          <div id="div_puerto_text" class="form-group col-md-6 col-xs-12 col-lg-3" style="display:none;">                                     <!-- PLIEGUES -->
                            <label><small> NOMBRE PUERTO:</small></label>
                            <input type="text" class="form-control text-uppercase"  name="xpuerNom"  title="Ingrese solo el PR"  >
                          </div>
                          <!-- -------------------------------PUERTOS----------------------------------- -->
                          <div class="col-lg-4 col-md-4 hidden-xs top">
                            <button type="submit" class="btn btn-primary" name="GuardarFolder" value="Insertar">Guardar </button>
                            <button type="reset" class="btn btn-default">Limpiar</button>
                          </div>
                          <div class="col-xs-12 visible-xs top">
                            <button type="submit" class="btn btn-primary" name="GuardarFolder" value="Insertar">Guardar </button>
                            <button type="reset" class="btn btn-default">Limpiar</button>
                          </div>
                      </form>
                  </section>
                  <h4>Proveedor:</h4>
                  <section>
                      <form  id="form_provee_int" role="form" action="index.php?menu=11" method="post">
                        <div id="div_provee_int" style="display:none;" >
                            <div class="form-group col-md-6 col-xs-12 col-lg-4">                                     <!-- ARO DE NEUMATICO -->
                            <label><small> NOMBRE :</small></label>
                            <input class="form-control text-uppercase" name="provee_nombre"  title="Ingrese solo el Aro"  >
                            </div>
                            <div class="form-group col-md-6 col-xs-12 col-lg-4">                                     <!-- ARO DE NEUMATICO -->
                            <label><small> TELEFONO :</small></label>
                            <input class="form-control text-uppercase" name="provee_telf"  title="Ingrese solo el Aro"  >
                            </div>
                            <div class="form-group col-md-6 col-xs-12 col-lg-4">                                     <!-- ARO DE NEUMATICO -->
                            <label><small> TELEFONO :</small></label>
                            <input class="form-control text-uppercase" name="provee_telf2"  title="Ingrese solo el Aro"  >
                            </div>
                            <div class="form-group col-md-6 col-xs-12 col-lg-4">                                     <!-- ARO DE NEUMATICO -->
                            <label><small> EMAIL :</small></label>
                            <input class="form-control text-uppercase" name="provee_email"  title="Ingrese solo el Aro"  >
                            </div>
                            <div class="form-group col-md-6 col-xs-12 col-lg-4">                                     <!-- ARO DE NEUMATICO -->
                            <label><small> CONTACTO :</small></label>
                            <input class="form-control text-uppercase" name="provee_contacto"  title="Ingrese solo el Aro"  >
                            </div>
                            <div class="form-group col-md-6 col-xs-12 col-lg-4">                                     <!-- ARO DE NEUMATICO -->
                            <label><small> DIRECCION :</small></label>
                            <input class="form-control text-uppercase" name="provee_direc"  title="Ingrese solo el Aro"  >
                            </div>
                            <div class="col-lg-4 col-md-4 hidden-xs top">
                                <button type="submit" class="btn btn-primary" name="GuardarProvee" value="Insertar">Guardar </button>
                                <button type="reset" class="btn btn-default">Limpiar</button>
                            </div>
                            <div class="col-xs-12 visible-xs top">
                                <button type="submit" class="btn btn-primary" name="GuardarProvee" value="Insertar">Guardar </button>
                                <button type="reset" class="btn btn-default">Limpiar</button>
                            </div>
                        </div>
                        
                      </form>
                      <form>
                      <div id="div_provee_impor" >
                          <div class="form-group col-xs-12 col-md-6 col-lg-4">                                    <!-- SERIE DE NEUMATICO-->
                          <label><small>PROVEEDOR :</small></label>
                          <input  type="text" name="xprovee" class="form-control text-uppercase" autocomplete="on"  id="provee_int_id" onkeyup="autocompletar();">
                          <ul id="lista_id"></ul>
                          </div>
                          <div class="form-group col-md-6 col-xs-12 col-lg-4">                                     <!-- ARO DE NEUMATICO -->
                          <label><small> DIRECCION :</small></label>
                          <input class="form-control text-uppercase" name="neu_xaro"  title="Ingrese solo el Aro"  >
                          </div>
                      </div>
                      </form>
                          <div class="col-lg-6 text-right" id="div_btn_newProvee" >
                            <button class="btn btn-primary" id="btn_provee_int" onclick="CmpsOcultarProvee(1);"  ><i class="fa fa-plus "></i> Proveedor</button>
                          </div>

<!--               
                          <div class="form-group col-md-6 col-xs-12 col-lg-4">
                          <button id="btn_ajax" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Proveedores</button>
                          </div>

                          <div id="myModal" class="modal fade" tabindex="-1" role="dialog"> 
                          <div class="modal-dialog" role="document">
                          <div class="modal-content">
                          <div class="modal-header" style="background:#0480be !important;">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" style="color:#fff;text-align:center;">Proveedores</h4>
                          </div>
                          <div class="modal-body">
                          <div class="table-responsive">
                          <table class="table table-striped">
                          <thead>
                          <th>#</th>
                          <th>Nombre</th>
                          <th>Accion</th>
                          </thead>
                          <tbody id="prueba">

                          </tbody>
                          </table>
                          </div>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary">Save changes</button>
                          </div> 
                          </div>/.modal-content-->
                          <!-- </div> .modal-dialog -->
                          <!-- </div> .modal -->                   
                  </section>
                  <h4>ORDEN:</h4>
                  <section id="2">
                      <form  id="form_folder" role="form" action="index.php?menu=11" method="post">
                          <div class="form-group col-xs-12 col-md-6 col-lg-2">                                    <!-- SERIE DE NEUMATICO-->
                              <label><small>#ORDEN/COMPRA:</small></label>
                              <input class="form-control text-uppercase"  name="xorden" id="xorden" >
                          </div>
                          <div class="form-group col-md-6 col-xs-12 col-lg-2">                                     <!-- ARO DE NEUMATICO -->
                              <label><small> FECHA/COMPRA :</small></label>
                              <input type="date" class="form-control text-uppercase" name="xordfechaCom" id="xordfechaCom"  title="Ingrese solo el Aro"  >
                          </div>
                          <div class="form-group col-md-6 col-xs-12 col-lg-2">                                     <!-- ARO DE NEUMATICO -->
                              <label><small>#PROFORMA :</small></label>
                              <input type="text" class="form-control text-uppercase" name="xordPro"  id="xordPro" title="Ingrese solo el Aro"  >
                          </div>
                          <div class="form-group col-md-6 col-xs-12 col-lg-2">                                     <!-- ARO DE NEUMATICO -->
                              <label><small>FECHA/PROFORMA :</small></label>
                              <input type="date" class="form-control text-uppercase" name="xordfechaPro"  id="xordfechaPro" title="Ingrese solo el Aro"  >
                          </div>
                          <div class="form-group col-md-6 col-xs-12 col-lg-2">                                     <!-- ARO DE NEUMATICO -->
                              <label><small>#FACTURA :</small></label>
                              <input type="text" class="form-control text-uppercase" name="xordFactura" id="xordFactura"  title="Ingrese solo el Aro"  >
                          </div>
                          <div class="form-group col-md-6 col-xs-12 col-lg-2">                                     <!-- ARO DE NEUMATICO -->
                              <label><small>#FECHA/FACTURA :</small></label>
                              <input type="date" class="form-control text-uppercase" name="xordfechaFa" id="xordfechaFa"  title="Ingrese solo el Aro"  >
                          </div>
                          <div class="form-group col-md-6 col-xs-12 col-lg-2">                                     <!-- ARO DE NEUMATICO -->
                              <label><small>FOB TOTAL :</small></label>
                              <input type="text" class="form-control text-uppercase"  name="xordMontoTotal" id="xordMontoTotal"   title="Ingrese solo el Aro"  >
                          </div>
                          <div class="form-group col-md-6 col-xs-12 col-lg-2">                                     <!-- ARO DE NEUMATICO -->
                              <label><small>FLETE/CONTENEDOR :</small></label>
                              <input type="text" class="form-control text-uppercase"  name="xordFlete" id="xordFlete"  title="Ingrese solo el Aro"  >
                          </div>
                          <div id="div_thc" class="form-group col-md-6 col-xs-12 col-lg-2" style="display:none;">                                     <!-- ARO DE NEUMATICO -->
                              <label><small>THC :</small></label>
                              <input type="text" class="form-control text-uppercase" name="xordTHC" id="xordTHC"  title="Ingrese solo el Aro"  >
                          </div>
                          <div id="div_adv" class="form-group col-md-6 col-xs-12 col-lg-2" style="display:none;">                                     <!-- ARO DE NEUMATICO -->
                            <label><small>ADV :</small></label>
                            <input type="text" class="form-control text-uppercase" name="xordADV" id="xordADV"  title="Ingrese solo el Aro"  >
                          </div>
                          <div class="form-group col-md-6 col-xs-12 col-lg-2">                                     <!-- ARO DE NEUMATICO -->
                          <label><small>#BL :</small></label>
                          <input type="text" class="form-control text-uppercase" name="xordBL" id="xordBL"  title="Ingrese solo el Aro"  >
                          </div>
                          <div id='div_forwa' class="form-group  col-md-8 col-xs-12 col-lg-4">
                              <label><small> FORWARDER :</small></label>
                                  <select class="form-control"  id="xordFor" name="xordFor"    >
                                      <!-- Leer los Clasificacion -->
                                      <?php
                                          $sql4="SELECT forwa_id,forwa_nombre from sys_forwarder order by forwa_id";
                                          $rsql4=mysqli_query($con,$sql4);
                                          echo "<option value='0' selected>--</option>";
                                          if( $row4=mysqli_fetch_array($rsql4,MYSQLI_ASSOC)     ){
                                          do{
                                          echo '<option value="'.$row4['forwa_id'].'">'.$row4['forwa_nombre'].'</option>';
                                          } while($row4=mysqli_fetch_array($rsql4,MYSQLI_ASSOC));
                                          }
                                          echo "<option value='0' onclick='DivForwarderDisplay();'>NUEVO FORWARDER</option>";
                                      ?>
                                  </select>
                          </div>
                          <div id="div_forwa_text" class="form-group col-md-6 col-xs-12 col-lg-3" style="display:none;">                                     <!-- PLIEGUES -->
                                <label><small> NOMBRE FORWARDER:</small></label>
                                <input type="text" class="form-control text-uppercase"  name="nombrFor"  title="Ingrese solo el PR"  >
                          </div>
                          <div class="form-group  col-md-6 col-xs-12 col-lg-2">                                   <!-- INCOTERM -->
                          <label><small>TIPOS/DESPACHO :</small></label>
                          <select class="form-control" id="xordTipDes" name="xordTipDes"  >
                          <option value="0" selected>--</option>
                          <option value="EXCEPCIONAL">EXCEPCIONAL</option>
                          </select>
                          </div>
                          <!-- --------------------------------LINEA------------------------------------------------------------------>
                          <div id="div_linea" class="form-group  col-md-8 col-xs-12 col-lg-3">
                              <label><small>LINEA :</small></label>
                              <select class="form-control"  id="xordLinea" name="xordLinea"    >
                                  <!-- Leer los Clasificacion -->
                                  <?php
                                      $sql4="SELECT linea_id,linea_nombre from sys_linea  order by linea_id";
                                      $rsql4=mysqli_query($con,$sql4);
                                      echo "<option value='' selected>--</option>";
                                      if( $row4=mysqli_fetch_array($rsql4,MYSQLI_ASSOC)     ){
                                      do{
                                      echo '<option value="'.$row4['linea_id'].'">'.$row4['linea_nombre'].'</option>';
                                      } while($row4=mysqli_fetch_array($rsql4,MYSQLI_ASSOC));
                                      }
                                      echo "<option value='' onclick='DivLineaDisplay();'>NUEVA LINEA</option>";
                                  ?>
                              </select>
                          </div>
                          <div id="div_linea_text" class="form-group col-md-6 col-xs-12 col-lg-3" style="display:none;">                                     <!-- PLIEGUES -->
                                <label><small> NOMBRE LINEA:</small></label>
                                <input type="text" class="form-control text-uppercase"  name="nombrLinea"  title="Ingrese Linea"  >
                          </div>
                          <!-- --------------------------------LINEA------------------------------------------------------------------>
                          <!-- ----------------------------------------------------------------------------------- -->
                          <div id="div_nave" class="form-group  col-md-6 col-xs-12 col-lg-3">
                                <label><small>NAVE :</small></label>
                                <select class="form-control"  name="xordNave" id="xordNave">
                                </select>
                          </div>
                          <div id="div_nave_text" class="form-group col-md-6 col-xs-12 col-lg-3" style="display:none;">                                     <!-- PLIEGUES -->
                            <label><small> NOMBRE NAVE:</small></label>
                            <input type="text" class="form-control text-uppercase"  name="xnaveNom"  title="Ingrese la Nave"  >
                          </div>
                          <!-- -------------------------------PUERTOS----------------------------------- -->
                          <div class="form-group col-md-6 col-xs-12 col-lg-2">                                     <!-- ARO DE NEUMATICO -->
                          <label><small>ETD :</small></label>
                          <input type="date" class="form-control text-uppercase" name="xordETD" id="xordETD"  title="Ingrese solo el Aro"  >
                          </div>
                          <div class="form-group col-md-6 col-xs-12 col-lg-2">                                     <!-- ARO DE NEUMATICO -->
                          <label><small>ETA :</small></label>
                          <input type="date" class="form-control text-uppercase" name="xordETA" id="xordETA"  title="Ingrese solo el Aro"  >
                          </div>
                          <div class="form-group col-md-6 col-xs-12 col-lg-2">                                     <!-- ARO DE NEUMATICO -->
                          <label><small>LIBRE/SOBREESTADIA :</small></label>
                          <input type="date" class="form-control text-uppercase" name="xordLibre" id="xordLibre"  title="Ingrese solo el Aro"  >
                          </div>
                          <div class="form-group col-md-6 col-xs-12 col-lg-2">                                     <!-- ARO DE NEUMATICO -->
                          <label><small>LIBRE/ALMACENAJE:</small></label>
                          <input type="date" class="form-control text-uppercase" name="xordLibreAl" id="xordLibreAl"  title="Ingrese solo el Aro"  >
                          </div>
                          <div id='div_almacen' class="form-group  col-md-8 col-xs-12 col-lg-3">
                              <label><small> ALMACEN :</small></label>
                                  <select class="form-control"  id="xordAlma" name="xordAlma"    >
                                      <!-- Leer los Clasificacion -->
                                      <?php
                                          $sql4="SELECT almacen_id,almacen_nombre from sys_almacen_impor order by almacen_id";
                                          $rsql4=mysqli_query($con,$sql4);
                                          echo "<option value='' selected>--</option>";
                                          if( $row4=mysqli_fetch_array($rsql4,MYSQLI_ASSOC)     ){
                                          do{
                                          echo '<option value="'.$row4['almacen_id'].'">'.$row4['almacen_nombre'].'</option>';
                                          } while($row4=mysqli_fetch_array($rsql4,MYSQLI_ASSOC));
                                          }
                                          echo "<option value='' onclick='DivAlmacenDisplay();'>NUEVO ALMACEN</option>";
                                      ?>
                                  </select>
                          </div>
                          <div id="div_alma_text" class="form-group col-md-6 col-xs-12 col-lg-3" style="display:none;">                                     <!-- PLIEGUES -->
                                <label><small> NOMBRE AlMACEN:</small></label>
                                <input type="text" class="form-control text-uppercase"   name="nombrAlma"  title="Ingrese el Nombre Almacen"  >
                          </div>
                            <div class="col-lg-4 col-md-4 hidden-xs top">
                                <button type="submit" class="btn btn-primary" name="GuardarOrden" value="Insertar">Guardar </button>
                                <button type="reset" class="btn btn-default">Limpiar</button>
                            </div>
                            <div class="col-xs-12 visible-xs top">
                                <button type="submit" class="btn btn-primary" name="GuardarOrden" value="Insertar">Guardar </button>
                                <button type="reset" class="btn btn-default">Limpiar</button>
                            </div>
                      </form>

                  </section>
                  <h4>Producto:</h4>
                  <section name ='section3'>
                    <form  id="form_producto" role="form" action="index.php?" method="get">
                        <input type="hidden" name="menu" value="10"> 
                        <input type="hidden" name="section3" value="section3">
                      <!-- -------------------------------TIPO PRODUCTO----------------------------------- -->
                      <div class="form-group  col-md-8 col-xs-12 col-lg-2">
                              <label><small> TIPO DE PRODUCTO :</small></label>
                              <select class="form-control"  id="xTpClasi" name="xTpClasi" title="Ingrese Tipo Producto" onclick="CmpsOcultoProducto();" > 	<!--TIPO DE PRODUCTO-->
                                  <!-- Leer los Clasificacion -->
                                  <?php
                                  $sql2="SELECT produ_clasi_id,produ_clasi_desc from sys_produ_clasi WHERE produ_clasi_estatus=1 order by produ_clasi_id";
                                  $rsql2=mysqli_query($con,$sql2);
                                  echo "<option value='' >--</option>";
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
                          <!-- -------------------------------MARCA---------------------------------------------->
                          <div id="div_marca_1" class="form-group  col-md-6 col-xs-12 col-lg-3" style="display:none;">
                                <label><small>MARCA :</small></label>
                                <select class="form-control"  name="xmarPro" id="xmarPro">
                                </select>
                          </div> 
                          <!-- -------------------------------MARCA------------------------------------------- -->
                        <!-- -------------------------------MARCA---------------------------------------------->
                            <div id="div_marca_2" class="form-group  col-md-6 col-xs-12 col-lg-3" style="display:none;">
                                <label><small>MARCA :</small></label>
                                <select class="form-control"  name="xmarPro_1" id="xmarPro_1">
                                </select>
                            </div> 
                          <!-- -------------------------------MARCA------------------------------------------- -->
                          <!-- -------------------------------MODELO---------------------------------------------->
                          <div id="div_modelo_1" class="form-group  col-md-6 col-xs-12 col-lg-3" style="display:none;">
                                <label><small>MODELO :</small></label>
                                <select class="form-control"  name="xTpModelo" id="xTpModelo">
                                </select>
                          </div>
                          <!-- -------------------------------MODELO------------------------------------------- -->
                           <!-- -------------------------------PRODUCTO---------------------------------------------->
                           <div id="div_producto" class="form-group  col-md-6 col-xs-12 col-lg-3" style="display:none;">
                                <label><small>Productos :</small></label>
                                <select class="form-control"  name="xproducto" id="xproducto">
                                </select>
                          </div>
                          <!-- -------------------------------PRODUCTO------------------------------------------- -->
                           <!-- -------------------------------PRODUCTO---------------------------------------------->
                           <div id="div_producto_1" class="form-group  col-md-6 col-xs-12 col-lg-3" style="display:none;">
                                <label><small>Productos :</small></label>
                                <select class="form-control"  name="xprodu_marca" id="xprodu_marca">
                                </select>
                          </div>
                          <!-- -------------------------------PRODUCTO------------------------------------------- -->

                          <div class="form-group col-md-6 col-xs-12 col-lg-2">                                     <!-- ARO DE NEUMATICO -->
                              <label><small>CANTIDAD :</small></label>
                              <input type="text" class="form-control text-uppercase" name="xcantidad"  id="xcantidad" title="Ingrese Cantidad"  >
                          </div>
                          <div class="form-group col-md-6 col-xs-12 col-lg-2">                                     <!-- ARO DE NEUMATICO -->
                              <label><small>UNIDAD :</small></label>
                              <input type="text" class="form-control text-uppercase" name="xunidad" id="xunidad"  title="Ingrese Unidad"  >
                          </div>
                          <div class="form-group col-md-6 col-xs-12 col-lg-2">                                     <!-- ARO DE NEUMATICO -->
                              <label><small>PRECIO UNIT :</small></label>
                              <input type="text" class="form-control text-uppercase" name="xprecioUni" id="xprecioUni"  title="Ingrese Precio Unitario"  >
                          </div>
                          <div class="form-group col-md-6 col-xs-12 col-lg-2">                                     <!-- ARO DE NEUMATICO -->
                              <label><small>% DESCUENTO :</small></label>
                              <input type="text" class="form-control text-uppercase"  name="xdescuento" id="xdescuento"   title="Ingrese Descuento"  >
                          </div>
                          <div class="form-group col-md-6 col-xs-12 col-lg-2">                                     <!-- ARO DE NEUMATICO -->
                              <label><small>PRECIO TOTAL :</small></label>
                              <input type="text" class="form-control text-uppercase"  name="xprecioTotal" id="xprecioTotal"   title="Ingrese Precio Total "  >
                          </div>
                          <div class="col-lg-4 col-md-4 hidden-xs top">
                                <button type="submit" class="btn btn-primary" name="GuardarProdu" value="Insertar">Guardar </button>
                                <button type="reset" class="btn btn-default">Limpiar</button>
                            </div>
                            <div class="col-xs-12 visible-xs top">
                                <button type="submit" class="btn btn-primary" name="GuardarProdu" value="Insertar">Guardar </button>
                                <button type="reset" class="btn btn-default">Limpiar</button>
                            </div>
                    </form>
                  </section>
                  <h4>Seguro:</h4>
                  <section id="4">
                      <form  id="form_folder" role="form" action="index.php?menu=2" method="post">
                      <div class="form-group col-md-6 col-xs-12 col-lg-4">                                     <!-- ARO DE NEUMATICO -->
                      <label><small> FOB TOTAL :</small></label>
                      <input class="form-control text-uppercase" name="xsegFob" id="xsegFob"  title="Ingrese solo el Aro"  >
                      </div>
                      <span>El resultado es: </span> <span id="spTotal"></span>
                      <div class="form-group col-md-6 col-xs-12 col-lg-4">                                     <!-- ARO DE NEUMATICO -->
                      <label><small> FLETE TOTAL :</small></label>
                      <input type="text" class="form-control text-uppercase" name="xsegFlete"  id="xsegFlete" title="Ingrese solo el Aro"  onchange="calculaFleteTotal();" >
                      </div>
                      <div class="form-group col-md-6 col-xs-12 col-lg-4">                                     <!-- ARO DE NEUMATICO -->
                      <label><small> SUMA TOTAL :</small></label>
                      <input class="form-control text-uppercase" name="neu_xaro"  title="Ingrese solo el Aro"  >
                      </div>
                      <div class="form-group col-md-6 col-xs-12 col-lg-4">                                     <!-- ARO DE NEUMATICO -->
                      <label><small> #REFERENCIA :</small></label>
                      <input class="form-control text-uppercase" name="neu_xaro"  title="Ingrese solo el Aro"  >
                      </div>
                      <div class="form-group col-md-6 col-xs-12 col-lg-4">                                     <!-- ARO DE NEUMATICO -->
                      <label><small>VIGENCIA DESDE :</small></label>
                      <input class="form-control text-uppercase" name="neu_xaro"  title="Ingrese solo el Aro"  >
                      </div>
                      <div class="form-group col-md-6 col-xs-12 col-lg-4">                                     <!-- ARO DE NEUMATICO -->
                      <label><small> VIGENCIA HASTA :</small></label>
                      <input class="form-control text-uppercase" name="neu_xaro"  title="Ingrese solo el Aro"  >
                      </div>
                      <div class="form-group col-md-6 col-xs-12 col-lg-4">                                     <!-- ARO DE NEUMATICO -->
                      <label><small> #POLIZA :</small></label>
                      <input class="form-control text-uppercase" name="neu_xaro"  title="Ingrese solo el Aro"  >
                      </div>
                      <div class="form-group col-md-6 col-xs-12 col-lg-4">                                     <!-- ARO DE NEUMATICO -->
                      <label><small> #APLICACION :</small></label>
                      <input class="form-control text-uppercase" name="neu_xaro"  title="Ingrese solo el Aro"  >
                      </div>
                      <div class="form-group col-md-6 col-xs-12 col-lg-4">                                     <!-- ARO DE NEUMATICO -->
                      <label><small>TASA :</small></label>
                      <input class="form-control text-uppercase" name="neu_xaro"  title="Ingrese solo el Aro"  >
                      </div>
                      <div class="form-group col-md-6 col-xs-12 col-lg-4">                                     <!-- ARO DE NEUMATICO -->
                      <label><small>PRIMERA NETA :</small></label>
                      <input class="form-control text-uppercase" name="neu_xaro"  title="Ingrese solo el Aro"  >
                      </div>
                      <div class="form-group col-md-6 col-xs-12 col-lg-4">                                     <!-- ARO DE NEUMATICO -->
                      <label><small>PRIMA TOTAL :</small></label>
                      <input class="form-control text-uppercase" name="neu_xaro"  title="Ingrese solo el Aro"  >
                      </div>
                      </form>
                  </section>
                  <h4>Pago:</h4>
                  <section name="section5" id="5">
                      <form  id="form_folder" role="form" action="index.php?menu=2" method="post">
                      <div class="form-group col-md-6 col-xs-12 col-lg-4">                                     <!-- ARO DE NEUMATICO -->
                      <label><small>INCOTEM :</small></label>
                      <input class="form-control text-uppercase" name="neu_xaro"  title="Ingrese solo el Aro"  >
                      </div>
                      <div class="form-group col-md-6 col-xs-12 col-lg-4">                                     <!-- ARO DE NEUMATICO -->
                      <label><small>MONTO :</small></label>
                      <input class="form-control text-uppercase" name="neu_xaro"  title="Ingrese solo el Aro"  >
                      </div>
                      <div class="form-group col-md-6 col-xs-12 col-lg-4">                                     <!-- ARO DE NEUMATICO -->
                      <label><small>SALDO :</small></label>
                      <input class="form-control text-uppercase" name="neu_xaro"  title="Ingrese solo el Aro"  >
                      </div>
                      <div  class="form" id="POItablediv">
                      <input type="button" id="addPOIbutton" value="Add POIs"/><br/><br/>
                      <table id="POITable" class="table table-striped table-bordered table-hover"  id="dataTables-example">
                      <tr>
                      <td>N° PAGO</td>
                      <td>MONTO</td>
                      <td>FECHA</td>
                      <td>ELIMINAR PAGO</td>
                      <td>AGREGAR PAGO</td>
                      </tr>
                      <tr>
                      <td style="size=5;">1</td>
                      <td><input size=25 type="text" id="latbox"/> </td>
                      <td><input size=25 type="date" id="lngbox"/></td>
                      <td><input type="button" class="form-control btn btn-danger glyphicon glyphicon-remove"  id="delPOIbutton"       value="-"    onclick="deleteRow(this)"/></td>
                      <td><input type="button" class="form-control btn btn-primary glyphicon glyphicon-remove" id="addmorePOIbutton"   value="+"    onclick="insRow()"/></td>
                      </tr>
                      </table>
                      </div>
                      </form>
                  </section>
                  <h4>Aduanas:</h4>
                  <section id>
                      <form  id="form_folder" role="form" action="index.php?menu=2" method="post">
                      <div class="form-group col-md-6 col-xs-12 col-lg-4">                                     <!-- ARO DE NEUMATICO -->
                      <label><small>AGENCIA DE ADUANAS :</small></label>
                      <input class="form-control text-uppercase" name="neu_xaro"  title="Ingrese solo el Aro"  >
                      </div>
                      <div class="form-group col-md-6 col-xs-12 col-lg-4">                                     <!-- ARO DE NEUMATICO -->
                      <label><small> #DUA :</small></label>
                      <input class="form-control text-uppercase" name="neu_xaro"  title="Ingrese solo el Aro"  >
                      </div>
                      <div class="form-group col-md-6 col-xs-12 col-lg-4">                                     <!-- ARO DE NEUMATICO -->
                      <label><small> FECHA DE NUMERACION :</small></label>
                      <input class="form-control text-uppercase" name="neu_xaro"  title="Ingrese solo el Aro"  >
                      </div>
                      <div class="form-group col-md-6 col-xs-12 col-lg-4">                                     <!-- ARO DE NEUMATICO -->
                      <label><small> CANAL :</small></label>
                      <input class="form-control text-uppercase" name="neu_xaro"  title="Ingrese solo el Aro"  >
                      </div>
                      <div class="form-group col-md-6 col-xs-12 col-lg-4">                                     <!-- ARO DE NEUMATICO -->
                      <label><small>FECHA DE INGRESO AL ALMACEN :</small></label>
                      <input class="form-control text-uppercase" name="neu_xaro"  title="Ingrese solo el Aro"  >
                      </div>
                      <div class="form-group col-md-6 col-xs-12 col-lg-4">                                     <!-- ARO DE NEUMATICO -->
                      <label><small>#CONTENEDOR :</small></label>
                      <input class="form-control text-uppercase" name="neu_xaro"  title="Ingrese solo el Aro"  >
                      </div>
                      </form>
                  </section>
              </div>
          </div>
      </div>
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
    <!--      </div> -->
                <!-- /.panel-body -->

    <!--     </div> -->
            <!-- /.panel -->

  <!--   </div> -->
        <!-- /.col-lg-12 -->
</div>
    <!-- /.row-->

<script src="http://code.jquery.com/jquery-latest.js"></script>
<link 	href="css_sg/general.css?<?=substr(time(),-5)?>"	rel="stylesheet"	type="text/css"/>
<script src="js_sg/importacion.js?<?=substr(time(),-5)?>" language="Javascript"></script>
<script src="js_sg/sistema.js?<?=substr(time(),-5)?>" language="Javascript"></script>
<link rel="stylesheet" href="css_sg/normalize.css?<?=substr(time(),-5)?>" rel="stylesheet"	type="text/css"/>
<link rel="stylesheet" href="css_sg/main.css?<?=substr(time(),-5)?>" rel="stylesheet"	type="text/css"/>
<link rel="stylesheet" href="libreria/jquery/css/jquery.steps.css?<?=substr(time(),-5)?> " rel="stylesheet"	type="text/css"/>
<script src="libreria/jquery/js/modernizr-2.6.2.min.js?<?=substr(time(),-5)?>"language="Javascript"></script>
<script src="libreria/jquery/js/jquery-1.9.1.min.js?<?=substr(time(),-5)?>" language="Javascript"></script>
<script src="libreria/jquery/js/jquery.cookie-1.3.1.js?<?=substr(time(),-5)?>"></script>
<script src="libreria/jquery/js/jquery.steps.js?<?=substr(time(),-5)?>"language="Javascript"></script>