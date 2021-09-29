<?php
include "../Funciones/BD.php";
include "Funciones/Venta/Cotizacion_copy.php";
include_once 'consultas_basicas.php';
$opci = $_GET['opci'];
if ($opci == 'new') {
  $sqlCoti = "SELECT (case when MAX(coti_id) is null THEN 1 else max(coti_id)+1 end) as id FROM sys_cotizacion";
  $result       = mysqli_query($con, $sqlCoti);
  $rsql7        = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $id           = $rsql7['id'];



  // $sqlNr = "SELECT CONCAT('0',(CASE WHEN COUNT(coti_id) IS NULL THEN '1' ELSE COUNT(coti_id)+1 END)) AS nrcoti FROM sys_cotizacion";
  // $resultNr      = mysqli_query($con, $sqlNr);
  // $rsql10        = mysqli_fetch_array($resultNr, MYSQLI_ASSOC);
  // $nrcotinew      = $rsql10['nrcoti'];
} else {
  $id = $_GET['id'];
}
if ($opci == "stock") {
  $sqlCoti_Deta  = "SELECT 
  coti.coti_id, coti.coti_ruc, deta.coti_deta_cant,deta.coti_deta_id,deta.coti_deta_punit, deta.coti_deta_desc, deta.produ_deta_id, pr.produ_deta_nombre, 
  produ.produ_id, produ.pais_id, produ.mar_id, mr.mar_nombre, pais.pais_nombre,coti.coti_tp_moneda
  
  FROM sys_cotizacion coti , sys_coti_detalle deta , sys_produ_detalle pr, sys_marca mr , sys_producto produ , sys_pais pais 
  
  where coti.coti_id = deta.coti_id AND produ.pais_id = pais.pais_id AND produ.mar_id = mr.mar_id AND deta.produ_deta_id = pr.produ_deta_id 
  AND deta.produ_deta_id = produ.produ_id AND deta.coti_id = '$id' ";
  $resultCoti      = mysqli_query($con, $sqlCoti_Deta);



  $sqlCoti_Detalle  = "SELECT
      coti_id,
      coti_tp_docu,
      coti_ruc,
      coti_razon,
      coti_telf,
      coti_pago,
      coti_estatus,
      coti_ate,
      coti_tp_cambio,
      coti_tp_moneda,
      coti_obs

      FROM sys_cotizacion
      where  coti_id = '$id' ";
  $resultCoti_Deta      = mysqli_query($con, $sqlCoti_Detalle);
  $rsql1                = mysqli_fetch_array($resultCoti_Deta, MYSQLI_ASSOC);

  $cotitp       = $rsql1['coti_tp_docu'];
  $ruc          = $rsql1['coti_ruc'];
  $nombre       = $rsql1['coti_razon'];
  $ate          = $rsql1['coti_ate'];
  $telf         = $rsql1['coti_telf'];
  $tp_pago      = $rsql1['coti_pago'];
  $tp_cambio    = $rsql1['coti_tp_cambio'];
  $tp_moneda    = $rsql1['coti_tp_moneda'];
  $observacion  = $rsql1['coti_obs'];
  $estatus      = $rsql1['coti_estatus'];

  $sqlCoti_Detalle  = "SELECT
      coti.coti_id,
      coti.coti_tp_docu,
      coti.coti_ruc,
      coti.coti_number,
      coti.coti_razon,
      coti.coti_telf,
      coti.coti_pago,
      coti.emp_id,
      em.emp_nombre,
      coti.coti_estatus,
      coti.coti_ate,
      coti.coti_tp_credito
      FROM sys_cotizacion coti,sys_empresas em
      where coti.emp_id = em.emp_id
      AND coti_id = '$id' ";
  $resultCoti_Deta      = mysqli_query($con, $sqlCoti_Detalle);
  $rsql1                = mysqli_fetch_array($resultCoti_Deta, MYSQLI_ASSOC);
}
// $ruc = $_GET['coti_ruc'];
?>

<style>
.mystyle {
  width: 100%;
  padding: 25px;
  background-color: coral;
  color: white;
  font-size: 25px;
}



</style>
<script src="js_sg/venta.js?<?= substr(time(), -5) ?>" language="Javascript"></script>
<script>
  $(document).ready(function() {
    var consulta;
    var medidaNeu;
    var medidaCam;
    var medidaAro;
    var medidaPro;
    var medidaAce;


    
    //hacemos focus al campo de búsqueda
    $("#busqueda").focus();

    // comprobamos si se pulsa una tecla
    $("#busqueda").ready(function(e) {
      // $("#busqueda").keyup(function(e) {
      
        
        //       ACCESORIOs
        //obtenemos el texto introducido en el campo de búsqueda
        consulta = $("#busqueda").val();
        // alert("llego BUSCAR-2");
        //hace la búsqueda
        $.ajax({
          type: "POST",
          url: "Vistas/Venta/buscar.php",
          data: "b=" + consulta,
          dataType: "html",
          beforeSend: function() {
            //imagen de carga
            // $("#resultado").html("<p align='center'><img src=' /></p>");
 
          },
          error: function() {
            alert("error petición ajax");
          },
          success: function(data) {
            $("#resultado").empty();
            $("#resultado").append(data);

          }
        });
    });

    $("#busqueda_med_neu").ready(function(e) {
      //       ACCESORIOs
      //obtenemos el texto introducido en el campo de búsqueda
      medidaNeu = $("#busqueda_med_neu").val();
      // alert("llego BUSCAR-2");
      //hace la búsqueda
      $.ajax({
        type: "POST",
        url: "Vistas/Venta/buscar_medida_neu.php",
        data: "c=" + medidaNeu,
        dataType: "html",
        beforeSend: function() {
          //imagen de carga
          // $("#resul_med_neu").html("<p align='center'><img src=' /></p>");

        },
        error: function() {
          alert("error petición ajax");
        },
        success: function(data) {
          $("#resul_med_neu").empty();
          $("#resul_med_neu").append(data);

        }
      });
    });

    $("#busqueda_med_cam").ready(function(e) {
      //       ACCESORIOs
      medidaCam = $("#busqueda_med_cam").val();
      // alert("llego BUSCAR-medidaCam--1");
      //hace la búsqueda
      $.ajax({
        type: "POST",
        url: "Vistas/Venta/buscar_medida_cam.php",
        data: "c="+ medidaCam,
        dataType: "html",
        beforeSend: function() {
          //imagen de carga
          // $("#resul_med_neu").html("<p align='center'><img src=' /></p>");

        },
        error: function() {
          alert("error petición ajax");
        },
        success: function(data) {
          $("#resul_med_cam").empty();
          $("#resul_med_cam").append(data);
        }
      });
    });

    $("#busqueda_med_aro").ready(function(e) {
      //       ACCESORIOs

      //obtenemos el texto introducido en el campo de búsqueda
      medidaAro = $("#busqueda_med_aro").val();
      // alert("llego BUSCAR-medidaCam--1");
      //hace la búsqueda
      $.ajax({
        type: "POST",
        url: "Vistas/Venta/buscar_medida_aro.php",
        data: "c="+ medidaAro,
        dataType: "html",
        beforeSend: function() {
          //imagen de carga
          // $("#resul_med_neu").html("<p align='center'><img src=' /></p>");

        },
        error: function() {
          alert("error petición ajax");
        },
        success: function(data) {
          $("#resul_med_aro").empty();
          $("#resul_med_aro").append(data);
        }
      });
    });
    $("#busqueda_med_pro").ready(function(e) {
      //obtenemos el texto introducido en el campo de búsqueda
      medidaPro = $("#busqueda_med_pro").val();
      //hace la búsqueda
      $.ajax({
        type: "POST",
        url: "Vistas/Venta/buscar_medida_pro.php",
        data: "c="+ medidaPro,
        dataType: "html",
        beforeSend: function() {
          //imagen de carga
          // $("#resul_med_neu").html("<p align='center'><img src=' /></p>");

        },
        error: function() {
          alert("error petición ajax");
        },
        success: function(data) {
          $("#resul_med_pro").empty();
          $("#resul_med_pro").append(data);
        }
      });
    });


    $("#busqueda_med_ace").ready(function(e) {
      //obtenemos el texto introducido en el campo de búsqueda
      medidaAce = $("#busqueda_med_ace").val();
      //hace la búsqueda
      $.ajax({
        type: "POST",
        url: "Vistas/Venta/buscar_medida_ace.php",
        data: "c="+ medidaAce,
        dataType: "html",
        beforeSend: function() {
          //imagen de carga
          // $("#resul_med_neu").html("<p align='center'><img src=' /></p>");
 
        },
        error: function() {
          alert("error petición ajax");
        },
        success: function(data) {
          $("#resul_med_ace").empty();
          $("#resul_med_ace").append(data);
        }
      });
    });
  });


  
  
  </script>




<div class="row">
<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
  <div class="col-lg-12 col-md-12 col-xs-12">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="col-lg-12">
          <div class="row" id="titulo">
              <!-- <div class="panel panel-default"> -->
              <?php
              if($opci =='stock' ){ ?>
              <div id="div_nombre_produ" class="col-lg-6">
                <h2 class="azul"><i class="glyphicon glyphicon-th-list"></i>&nbsp;<strong>Ver Cotizacion</strong></h2>
              </div>
              <?php }else{ ?>

                <div id="div_nombre_produ" class="col-lg-6">
                <h2 class="azul"><i class="glyphicon glyphicon-th-list"></i>&nbsp;<strong>Crear Cotizacion</strong></h2>
              </div>
              <?php
              }
              ?>
              <div class="col-lg-6 text-right" id="div_btn">
                <a class="btn btn-warning" href="index.php?menu=19"><i class="glyphicon glyphicon-chevron-left"></i> </a>
              </div>
            </div>
        </div>
        <div class="col-lg-12"><hr class="black">
        <form id="formProducto" role="form" action="#" method="get">
          <input type="hidden" name="menu" value="17">
          <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
          <div class="form" id="div_form_cam">
              <?php if ($opci == 'stock') { ?>
                <input type="hidden" name="xcoti_tp" id="xcoti_tp" value="<?php echo $cotitp; ?>">
            
                <!-- ID EMPRESA -->
                <input type="hidden" name="xcotiruc"    id="xcotiruc"        value="<?php echo $ruc; ?>">
                <!-- ATENCION -->
                <input type="hidden" name="xcotisocial" id="xcotisocial"    value="<?php echo $nombre; ?>">
                <!-- TELEFONO -->
                <input type="hidden" name="xcotiAten"   id="xcotiAten"      value="<?php echo $ate; ?>">
                <!-- FORMA DE PAGO -->
                <input type="hidden" name="xcotiTelf"   id="xcotiTelf"      value="<?php echo $telf; ?>">
                <!-- FORMA DE PAGO -->
                <input type="hidden" name="xcotipago"   id="xcotipago"      value="<?php echo $tp_pago; ?>">
                <!-- TIPO DE CREDITO -->
                <input type="hidden" name="xcotiCa"     id="xcotiCa"        value="<?php echo $tp_cambio; ?>">
                <input type="hidden" name="xcotiMoneda" id="xcotiMoneda"    value="<?php echo $tp_moneda; ?>">
                <input type="hidden"   name="xcotiObs"      id="xcotiObs"   value="<?php echo $observacion; ?>">
                <!-- TOTAL -->
                <!-- ---------------------------------------------MARCA -------------------------------------------------------------------------------->
                <div class="form-group  col-md-4 col-xs-12 col-lg-2">
                  <label><small>TIPO DOCUMENTO :</small></label>
                    <input type="text" class="form-control text-uppercase" readonly name="xcoti_tp" id="xcoti_tp" value="<?php echo $cotitp; ?>">
                </div>
                <div class="form-group  col-md-4 col-xs-12 col-lg-2">
                  <label><small>RUC :</small></label>
                  <input type="text" class="form-control text-uppercase" readonly name="xcotiruc" id="xcotiruc" value="<?php echo $ruc; ?>">
                </div>
                <div class="form-group  col-md-4 col-xs-12 col-lg-3">
                  <label><small>NOMBRE :</small></label>
                  <input type="text" class="form-control text-uppercase" readonly name="xcotisocial" id="xcotisocial" value="<?php echo $nombre; ?>">
                </div>
                <div class="form-group  col-md-4 col-xs-12 col-lg-2">
                  <label><small>ATENCION :</small></label>
                  <input type="text" class="form-control text-uppercase" name="xcotiAten" id="xcotiAten" value="<?php echo $ate; ?>" readonly >
                </div>
                <div class="form-group  col-md-4 col-xs-12 col-lg-2">
                  <label><small>TELEFONO :</small></label>
                  <input type="text" class="form-control text-uppercase" name="xcotiTelf" id="xcotiTelf" value="<?php echo $telf; ?>" readonly>
                </div>
                <div class="form-group  col-md-4 col-xs-12 col-lg-2">
                  <label><small>FORMA DE PAGO :</small></label>
                  <select class="form-control" id="xcotipago" name="xcotipago" title="Ingrese la Forma de Pago" onchange="CargarFormaPago();">
                    <option value="<?php echo $tp_pago; ?>" selected><?php echo $tp_pago; ?></option>
                    <option value="CREDITO" >CREDITO</option>
                    <option value="CONTADO" >CONTADO</option>
                  </select>
                </div>
                <div id="div_forma_credito" style="display:none;" class="form-group  col-md-4 col-xs-12 col-lg-2">
                  <label><small>PAGO :</small></label>
                  <select class="form-control" id="xcoticredito" name="xcoticredito" title="Ingrese la Forma de Credito" onchange="CargarDiasPago();">
                    <option value="<?php echo $tpcredito; ?>" selected><?php echo $tpcredito; ?></option>
                    <option value="FACTURA">FACTURA</option>
                    <option value="LETRA">LETRA</option>
                    <option value="CHEQUE">CHEQUE</option>
                  </select>
                </div>
                <div class="form-group  col-md-4 col-xs-12 col-lg-2">
                  <label><small>TIPO CAMBIO :</small></label>
                  <input type="text" class="form-control text-uppercase" name="xcotiCa" id="xcotiCa" value="<?php echo $tp_cambio; ?>" >
                </div>
                <div id="div_moneda"  class="form-group  col-md-4 col-xs-12 col-lg-2">
                  <label><small>MONEDA :</small></label>
                  <select class="form-control" id="xcotiMoneda" name="xcotiMoneda" value="<?php echo $tp_moneda; ?>" title="Ingrese la Moneda">
              <option   value="SOLES"     >---Actual---</option>
                    <option value="<?php echo $tp_moneda; ?>" selected><?php echo $tp_moneda; ?></option>
                    <option value="SOLES"   >---Añadir---</option>
                    <option value="SOLES"   >SOLES</option>
                    <option value="DOLARES" >DOLARES</option>
                  </select>
                  
                </div>
                <div class="form-group col-md-4 col-xs-12 col-lg-5">
                <label><small>OBSERVACIONES :</small></label>
                <input type="text" class="form-control text-uppercase" name="xcotiObs" id="xcotiObs" value="<?php echo $observacion; ?>" readonly>
                </div>
                <div id="clasi" class="form-group  col-md-8 col-xs-12 col-lg-2"   >
                  <label><small> TIPO DE PRODUCTO :</small></label>
                  <select class="form-control" id="xclasi" name="xclasi" onchange="FormOcultarCoti();" title="Ingrese Tipo Producto" onclick="ShowClasi();">
                    <!--TIPO DE PRODUCTO-->
                    <!-- Leer los PRODUCTO -->
                    <?php
                    $sql2 = "SELECT produ_clasi_id,produ_clasi_desc from sys_produ_clasi WHERE produ_clasi_estatus=1 order by produ_clasi_id";
                    $rsql2 = mysqli_query($con, $sql2);
                    echo "<option value='0' selected >--</option>";
                    if ($row2 = mysqli_fetch_array($rsql2, MYSQLI_ASSOC)) {
                      do {
                        echo '<option value="' . $row2['produ_clasi_id'] . '">' . $row2['produ_clasi_desc'] . '</option>';
                      } while ($row2 = mysqli_fetch_array($rsql2, MYSQLI_ASSOC));
                    }
                    ?>
                  </select>
                </div>
              <?php }
            if ($opci == 'new') {
              ?>
              <!-- TOTAL -->
              <!-- FILTROS BUSQUEDA RAZON SOCIAL -->
              <div id="busq_nombre"class="form-group  col-md-4 col-xs-12 col-lg-2" >
                <label><small>BUSQUEDA</small></label>
                <input type="text" class="form-control text-uppercase" id="busqueda" />
              </div>
              <?php
              if ($contar <> "0"){
                echo '<div id="resultado" class="form-group col-md-4 col-xs-12 col-lg-4">';
              }
              ?>
                </div>
                <!--  -->
              <div id="busq_nombre_ruc" class="form-group  col-md-6 col-xs-12 col-lg-2"  >
                <label><small>NUMERO:</small></label>
                <select class="form-control" name="xcotiruc" id="xcotiruc" onkeyup="ShowRuc()"   >
                 </select>
              </div>
              <input type="hidden" class="form-control text-uppercase" id="xruc_nombre1" name="xruc_nombre1" />
              <!--  -->
              <div id="busq_ruc_ate" class="form-group  col-md-6 col-xs-12 col-lg-2" style="display:block;"  >
                <label><small>ATENCION :</small></label>
                <select class="form-control" name="atencion" id="atencion" onchange="DisplayAtencion();" onkeyup="ShowAte()"  >
                </select>
              </div>
              <input type="hidden" class="form-control text-uppercase" id="xate_nombre1" name="xate_nombre1" />
              <div id="div_input_ate" class="form-group  col-md-6 col-xs-12 col-lg-2" style="display:none;" >
                <label><small>ATENCION :</small></label>
                <input type="text" class="form-control text-uppercase" id="xate_nombre" name="xate_nombre" />
              </div>
              <!--  -->
              <div id="busq_telf_resul" class="form-group  col-md-6 col-xs-12 col-lg-2" style="display:block;" >
                <label><small>TELEFONO :</small></label>
                <select class="form-control" name="telf" id="telf" onkeyup="ShowTelf()"  >
                </select>
              </div>
              <input type="hidden" class="form-control text-uppercase" id="xtelf_nombre1" name="xtelf_nombre1" />
              <div id="div_input_telf" class="form-group  col-md-6 col-xs-12 col-lg-2" style="display:none;" >
                <label><small>TELEFONO :</small></label>
                <input type="text" class="form-control text-uppercase" id="xtelf_nombre" name="xtelf_nombre" />
              </div>
              <!--  -->
              <div id="div_forma_pago" class="form-group  col-md-4 col-xs-12 col-lg-2" >
                <label><small>FORMA DE PAGO :</small></label>
                <select class="form-control" id="xcotipago" name="xcotipago" title="Ingrese la Forma de Pago" onchange="CargarFormaPago();">
                  <option id="0" value="0" selected>--</option>
                  <option value="CREDITO" >CREDITO</option>
                  <option value="CONTADO" >CONTADO</option>
                </select>
              </div>
              <div id="div_forma_credito" style="display:none;" class="form-group  col-md-4 col-xs-12 col-lg-2">
                <label><small>PAGO :</small></label>
                <select class="form-control" id="xcoticredito" name="xcoticredito" title="Ingrese la Forma de Credito" onchange="CargarDiasPago();">
                  <option value="0"  selected>--</option>
                  <option value="FACTURA"         >FACTURA</option>
                  <option value="CHEQUE "         >CHEQUE</option>
                  <option value="LETRA BANCO"     >LETRA BANCO</option>
                  <option value="LETRA CARTERA"   >LETRA CARTERA</option>
                  <option value="LETRA GARANTIA"  >LETRA GARANTIA</option>
                </select>
              </div>
              <div id="div_forma_credito_dias" style="display:none;" class="form-group  col-md-4 col-xs-12 col-lg-1">
                <label><small>DIAS :</small></label>
                <select class="form-control" id="xcotidias" name="xcotidias" title="Ingrese los Dias de Credito">
                  <option value="0" selected>--</option>
                  <option value="30">30</option>
                  <option value="45">45</option>
                  <option value="60">60</option>
                  <option value="75">75</option>
                  <option value="90">90</option>
                </select>
              </div>
              <div class="form-group  col-md-4 col-xs-12 col-lg-2">
                <label><small> TIPO CAMBIO:</small></label>
                <input type="text" class="form-control text-uppercase" name="xcotiTC" id="xcotiTC"  title="Ingrese el Tipo de Cambio">
              </div>
              <div id="div_moneda"  class="form-group  col-md-4 col-xs-12 col-lg-2">
                <label><small>MONEDA :</small></label>
                <select class="form-control" id="xcotiMoneda" name="xcotiMoneda" title="Ingrese la Moneda">
                  <option value="0"       selected>--</option>
                  <option value="SOLES"   >SOLES</option>
                  <option value="DOLARES" >DOLARES</option>
                </select>
              </div>
              <div class="col-lg-1 col-md-2 hidden-xs top">
                <button type="submit" class=" btn btn-sm btn-success" id="Tasa" name="Tasa" title="Actualizar Tasa" ><span class="glyphicon glyphicon-refresh"></span></button>
              </div>
              <div class="col-xs-12 visible-xs top">
                <button type="submit" class="btn  btn-sm btn-success" id="Tasa" name="Tasa" title="Actualizar Tasa" ><span class="glyphicon glyphicon-refresh"></span></button>
              </div>
              <div class="form-group col-md-4 col-xs-12 col-lg-5">
              <label><small>OBSERVACIONES :</small></label>
              <input type="text" class="form-control text-uppercase" name="xcotiObs" id="xcotiObs" >
              </div>
            <div id="clasi" class="form-group  col-md-8 col-xs-12 col-lg-2"   >
                <label><small> TIPO DE PRODUCTO :</small></label>
                <select class="form-control" id="xclasi" name="xclasi" onchange="FormOcultarCoti(); " title="Ingrese Tipo Producto">
                  <!--TIPO DE PRODUCTO-->
                  <!-- Leer los Clasificacion -->
                  <?php
                  $sql2 = "SELECT produ_clasi_id,produ_clasi_desc from sys_produ_clasi WHERE produ_clasi_estatus=1 order by produ_clasi_id";
                  $rsql2 = mysqli_query($con, $sql2);
                  echo "<option value='0' selected >--</option>";
                  if ($row2 = mysqli_fetch_array($rsql2, MYSQLI_ASSOC)) {
                    do {
                      echo '<option value="' . $row2['produ_clasi_id'] . '">' . $row2['produ_clasi_desc'] . '</option>';
                    } while ($row2 = mysqli_fetch_array($rsql2, MYSQLI_ASSOC));
                  }
                  ?>
                </select>
              </div>
        <?php } ?>
        <div  id="div_coti" style="display:none;"  class="col-lg-12">
          
        
            <div id="div_coti_neu" style="display:none;">
              <hr class="black" />
              <h2 class="azul" style="text-align:center;"><span class="glyphicon glyphicon-asterisk"></span><strong> Añadir Producto - NEUMATICOS</strong></h2>
              <!-- <hr class="black" /> -->
            <br>
            <br>
                <!-- FILTROS BUSQUEDA RAZON SOCIAL -->
                <div id="busq_medida_neu"class="form-group  col-md-4 col-xs-12 col-lg-2" >
                    <label><small>BUSQUEDA - MEDIDA</small></label>
                    <input type="text" class="form-control text-uppercase" id="busqueda_med_neu"  />
                    <!-- <div id="resultado"></div> -->
                </div>
                <?php
                if ($contarMedidaNeu <> "0" ){
                  echo '<div id="resul_med_neu" class="form-group  col-md-4 col-xs-12 col-lg-5">';
                }   
                echo '</div>';
                ?> 
          </div>
          <!---------------------------------MARCA----------------------------------- -->
        
        <div   id="div_coti_cam" style="display:none;" >
              <!-- ------------------------MARCA--------------------------------------------------- -->
              <hr class="black" />
            <h2 class="azul" style="text-align:center;"><span class="glyphicon glyphicon-asterisk"></span><strong> Añadir Producto - CAMARAS </strong></h2>
            <!-- <hr class="black" /> -->
          <br>
          <br>
           <!-- FILTROS BUSQUEDA RAZON SOCIAL -->
           <div id="busq_medida_cam"class="form-group  col-md-4 col-xs-12 col-lg-2" >
                  <label><small>BUSQUEDA - MEDIDA</small></label>
                  <input type="text" class="form-control text-uppercase" id="busqueda_med_cam"  />
                  <!-- <div id="resultado"></div> -->
              </div>
               <?php
              if ($contarMedidaCam <> "0" ){
                echo '<div id="resul_med_cam" class="form-group  col-md-4 col-xs-12 col-lg-3">';
              }
              echo "</div>";
              ?> 
        </div>
          <!---------------------------------MARCA----------------------------------- -->
        <div   id="div_coti_aro" style="display:none;" >
          <!-- ------------------------MARCA--------------------------------------------------- -->
            <hr class="black" />
                        <h2 class="azul" style="text-align:center;"><span class="glyphicon glyphicon-asterisk"></span><strong> Añadir Producto - AROS </strong></h2>
                        <!-- <hr class="black" /> -->
                      <br>
                      <br>
                      <!-- FILTROS BUSQUEDA RAZON SOCIAL -->
                      <div id="busq_medida_aro" class="form-group  col-md-4 col-xs-12 col-lg-2" >
                              <label><small>BUSQUEDA - MEDIDA</small></label>
                              <input type="text" class="form-control text-uppercase" id="busqueda_med_aro"  />
                              <!-- <div id="resultado"></div> -->
                          </div>
                          <?php
                          if ($contarMedidaAro <> "0" ){
                            echo '<div id="resul_med_aro" class="form-group  col-md-4 col-xs-12 col-lg-3">';
                          }
                          echo "</div>";
                        ?> 
        </div>
        <div   id="div_coti_pro" style="display:none;" >
             <hr class="black" />
                        <h2 class="azul" style="text-align:center;"><span class="glyphicon glyphicon-asterisk"></span><strong> Añadir Producto - PROTECTORES </strong></h2>
                      <br>
                      <br>
                      <!-- FILTROS BUSQUEDA RAZON SOCIAL -->
                <div id="busq_medida_pro" class="form-group  col-md-4 col-xs-12 col-lg-2" >
                        <label><small>BUSQUEDA - MEDIDA</small></label>
                        <input type="text" class="form-control text-uppercase" id="busqueda_med_pro"  />
                    </div>
                    <?php
                    if ($contarMedidaPro <> "0" ){
                      echo '<div id="resul_med_pro" class="form-group  col-md-4 col-xs-12 col-lg-3">';
                    }
                     echo '</div>';
                  ?> 
        </div>
        <div  id="div_coti_ace" style="display:none;"  >
             <!-- ------------------------MARCA--------------------------------------------------- -->
             <hr class="black" />
                        <h2 class="azul" style="text-align:center;"><span class="glyphicon glyphicon-asterisk"></span><strong> Añadir Producto - ACCESORIOS </strong></h2>
                        <!-- <hr class="black" /> -->
                      <br>
                      <br>
                      <!-- FILTROS BUSQUEDA RAZON SOCIAL -->
                <div id="busq_medida_ace" class="form-group  col-md-4 col-xs-12 col-lg-2" >
                        <label><small>BUSQUEDA - MEDIDA</small></label>
                        <input type="text" class="form-control text-uppercase" id="busqueda_med_ace"  />
                        <!-- <div id="resultado"></div> -->
                    </div>
                    <?php
                    if ($contarMedidaAce <> "0" ){
                      echo '<div id="resul_med_ace" class="form-group  col-md-4 col-xs-12 col-lg-3">';
                    }
                    echo '</div>';
                  ?> 
        </div>
          <!---------------------------------MARCA----------------------------------- -->
          <div id="div_coti_cal" style="display:none;" >
          <div  class="form-group  col-md-6 col-xs-12 col-lg-2"  >
                <label><small>P.UNIT::</small></label>
                <select class="form-control" name="xcotipunit" id="xcotipunit"   >
                 </select>
          </div>
            <!-- <label><small> P.UNIT:</small></label> -->
            <!-- <input type="text" class="form-control text-uppercase" name="xcotipunit" id="xcotipunit" title="Ingrese el Precio Unitario" onchange="calcularTotal();" readonly onclick="calcularTotal();" required > -->
          </div>
          <div class="form-group  col-md-4 col-xs-12 col-lg-1">
            <label><small> CANT:</small></label>
            <input type="text" class="form-control text-uppercase" name="xcotiCant" id="xcotiCant"  title="Ingrese el Nombre Cantidad" onchange="calcularTotal();" onclick="calcularTotal();" required>
          </div>
          <div class="form-group  col-md-4 col-xs-12 col-lg-1">
            <label><small> DTO:</small></label>
            <input type="text" class="form-control text-uppercase"  name="xcotiDesc" id="xcotiDesc" title="Ingrese el Descuento " onchange="calcularDescuento();">
          </div>
          <div class="form-group  col-md-4 col-xs-12 col-lg-2">
            <label><small> TOTAL :</small></label>
            <input type="text" class="form-control text-uppercase"  readonly name="total" id="total"  title="" onchange="VerrifTotal();" onkeyup="VerrifTotal();">
          </div>
          <div class="col-lg-2 col-md-4 hidden-xs top">
            <button type="submit" class=" btn btn-sm btn-success" id="GuardarPr" name="GuardarPr" value="Insertar"><span class="glyphicon glyphicon-plus" disabled></span></button>
            <button type="reset" class="  btn btn-sm btn-danger" ><span class="glyphicon glyphicon-minus"></span></button>
            <!-- <a href="index.php?menu=1" class="btn btn-danger" role="button"><i class="glyphicon glyphicon-chevron-left"></i></a> -->
          </div>
          <div class="col-xs-12 visible-xs top">
            <button type="submit" class="btn  btn-sm btn-success" id="GuardarPr" name="GuardarPr" value="Insertar"><span class="glyphicon glyphicon-plus" disabled></span></button>
            <button type="reset" class=" btn  btn-sm btn-danger" onclick="location.reload()"><span class="glyphicon glyphicon-minus"></span></button>
            <!-- <a href="index.php?menu=1" class="btn btn-danger" role="button"><i class="glyphicon glyphicon-chevron-left"></i></a> -->
          </div>
        </div>
  </div>
    </form>
        <?php
        if ($opci == 'new') {
          ?>
          <div id="div_consul_coti" class="col-lg-12 col-md-12 col-xs-12" style="display:none;">
            
              <!--Div Oculto-->
              <div class="panel-body">
                <div class="panel panel-default">
                    <!-- Productos -->
                  <div class="table-responsive col-lg-12" >
                  <table class="table table-hover col-lg-12"  >
                      <thead>
                        <tr>
                          <th class="text-center">CANT.</th>
                          <th class="text-center">DESCRIPCION</th>
                          <th class="text-center">PAIS</th>
                          <th class="text-center">MARCA</th>
                          <th class="text-center">P.UNITARIO</th>
                          <th class="text-center">TOTAL</th>
                        </tr>
                      </thead>
                      <tbody class="text-center">
                        <?php $cuenta = 0;
                          while ($row1 = mysqli_fetch_array($resultCoti, MYSQLI_ASSOC)) { ?>
                          <tr>
                            <td><?php echo $row1['coti_deta_cant']; ?></td>
                            <td><?php echo $row1['produ_deta_nombre']; ?></td>
                            <td><?php echo $row1['pais_nombre']; ?></td>
                            <td><?php echo $row1['mar_nombre']; ?></td>
                            <td><?php echo $row1['coti_deta_punit']; ?></td>
                            <td><?php echo $row1['coti_deta_total']; ?></td>
                          </tr>
                        <?php } ?>
                        <tr>
                          <td colspan="6">
                            <div align="right"><strong>TOTAL:</strong></div>
                          </td>
                          <td class="info"><?php echo $total; ?></td>

                        </tr>
                      </tbody>
                    </table>
                  </div>

                </div>
              </div>
          </div>
        <?php
        }
        ?>
        <?php
        if ($opci == 'stock') {
          ?>
          <div id="div_consul_coti" class="col-lg-12 col-md-12 col-xs-12">
          <form id="formProducto" role="form" action="#" method="get">
          <input type="hidden" name="menu" value="17">
          <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
              <!--Div Oculto-->
              <hr class="black" />
                        <h2 class="azul" style="text-align:center;"><span class="glyphicon glyphicon-asterisk"></span><strong> Productos Registrados </strong></h2>
                        <!-- <hr class="black" /> -->
              <!-- <h2 class="azul"><i class="glyphicon glyphicon-chevron-right"></i>&nbsp;<strong>Aros</strong></h2> -->
              <div class="panel-body">
                <div class="panel panel-default">
                  <div class="table-responsive col-lg-12" >
                  <table class="table table-hover col-lg-12"  >
                      <thead>
                        <tr>
                          <th class="text-center">CANT.</th>
                          <th class="text-center">DESCRIPCION</th>
                          <th class="text-center">PAIS</th>
                          <th class="text-center">MARCA</th>
                          <th class="text-center">P.UNITARIO</th>
                          <th class="text-center">DESCUENTO</th>
                          <th class="text-center">MONEDA</th>
                          <th class="text-center">TOTAL</th>
                          <th class="text-center">CARGAR</th>
                          <th class="text-center">ELIMINAR</th>
                        </tr>
                      </thead>
                      <tbody class="text-center">
                        <?php $cuenta = 0;
                          while ($row1 = mysqli_fetch_array($resultCoti, MYSQLI_ASSOC)) { ?>
                          <tr>
                            <td><input type="number" style="text-align:center;"  name="cantidad2" value="<?php echo $row1['coti_deta_cant']; ?>"   ></td>
                            <td><?php echo $row1['produ_deta_nombre']; ?></td>
                            <td><?php echo $row1['pais_nombre']; ?></td>
                            <td><?php echo $row1['mar_nombre']; ?></td>
                            <td><?php echo $row1['coti_deta_punit']; ?></td>
                            <td><input type="number"  style="text-align:center;" name="descuento2" value="<?php echo $row1['coti_deta_desc']; ?>"  ></td>
                            <td><?php echo $row1['coti_tp_moneda']; ?></td>
                          <?php
                            $cant   =$row1['coti_deta_cant'];
                            $unit   =$row1['coti_deta_punit'];
                            $dto    =$row1['coti_deta_desc'];
                            $dto2   = $cant * $unit ;
                            $dto3   = $dto2 * $dto;
                            $dto4   = $dto3 / 100;
                            $dto5   = $dto2 - $dto4;
                            $dtoTotal  = number_format($dto5,2,",",".");
                          ?>
                            <td> <?php  echo $dtoTotal; ?></td>
                            <td>
                                <button type="submit" class="btn btn-primary btn-sm glyphicon glyphicon-ok" name="cargar" value='<?php echo $row1['coti_deta_id']; ?>'></button>
                            </td>
                          </form>
                            <td>
                                <button type="submit" class="btn btn-danger btn-sm glyphicon glyphicon-trash" name="eliminar" value='<?php echo $row1['coti_deta_id']; ?>'></button>
                            </td>
                          </tr>
                        <?php } ?>
                        <tr>
                          <?php          
                            $sqlTotal2      = "SELECT SUM((coti_deta_cant * coti_deta_punit)-((coti_deta_cant * coti_deta_punit)*(coti_deta_desc/100))) as t1 FROM sys_coti_detalle WHERE coti_id = '$id' ";
                            $resultTotal2   = mysqli_query($con,$sqlTotal2);
                            $rsql4          = mysqli_fetch_array($resultTotal2, MYSQLI_ASSOC);
                            $Total2         =$rsql4['t1'];
                            $totalNeto  = number_format($Total2,2,",",".");
                            ?>
                            <td colspan="4">
                            <div align="right"><strong>Monto Gravado:</strong></div>
                          </td>
                          <td class="info"><?php echo $totalNeto; ?></td>
                          <td colspan="2">
                            <div align="right"><strong>Monto Neto:</strong></div>
                          </td>
                          <td class="info"><?php echo $totalNeto; ?></td>
                        </tr>
                        <tr>
                            <?php          
                            $Total3   = 18 * $totalNeto;
                            $Total4   = $Total3 / 100;
                            $Total    = number_format($Total4,2,",",".");
                            //  $total5 =money_format('%.2n', $Total4) . "\n";
                            ?>
                            <!-- <br> -->
                            <td colspan="7">
                              <div align="right"><strong>IVG (18%):</strong></div>
                            </td>
                            
                            <td class="danger"><?php echo $Total; ?></td>
                        </tr>
                        <tr>
                        <?php          
                          // $sqlTotal2      = "SELECT SUM((coti_deta_cant * coti_deta_punit)-((coti_deta_cant * coti_deta_punit)*(coti_deta_desc/100))) as t1 FROM sys_coti_detalle WHERE coti_id = '$id' ";
                          // $resultTotal2   = mysqli_query($con,$sqlTotal2);
                          // $rsql4          = mysqli_fetch_array($resultTotal2, MYSQLI_ASSOC);
                          // $Total2         = $rsql4['t1'];
                          $Result   = $Total4 + $Total2;
                          $TotalResult    = number_format($Result,2,",",".");
                          ?>
                          <td colspan="7">
                            <div align="right"><strong>Total/Pagar:</strong></div>
                          </td>
                          <td class="success"><?php echo $TotalResult; ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            
          </div>
        <?php
        }
        ?>
      </div>
    </div>
  </div>
  <!-- /.col-lg-12 -->
</div>
<script src="js_sg/venta.js?<?= substr(time(), -5) ?>" language="Javascript"></script>
<script>
  $(document).ready(function() {
    // alert("llego BUSCAR-1");
    var consulta;
    var medidaNeu;
    var medidaCam;
    var medidaPro;
    var medidaAce;
    //hacemos focus al campo de búsqueda
    $("#busqueda").focus();
    // $("#busqueda2").focus();

    //comprobamos si se pulsa una tecla
    $("#busqueda").keyup(function(e) {
      //       ACCESORIOs
      //obtenemos el texto introducido en el campo de búsqueda
      consulta = $("#busqueda").val();
      // alert("llego BUSCAR-2");
      //hace la búsqueda
      $.ajax({
        type: "POST",
        url: "Vistas/Venta/buscar.php",
        data: "b=" + consulta,
        dataType: "html",
        beforeSend: function() {
          //imagen de carga
          $("#resultado").html("<p align='center'><img src=' /></p>");

        },
        error: function() {
          alert("error petición ajax");
        },
        success: function(data) {
          $("#resultado").empty();
          $("#resultado").append(data);

        }
      });
    });

    $("#busqueda_med_neu").keyup(function(e) {
      //       ACCESORIOs
      //obtenemos el texto introducido en el campo de búsqueda
      medidaNeu = $("#busqueda_med_neu").val();
      // alert("llego BUSCAR-2");
      //hace la búsqueda
      $.ajax({
        type: "POST",
        url: "Vistas/Venta/buscar_medida_neu.php",
        data: "c=" + medidaNeu,
        dataType: "html",
        beforeSend: function() {
          //imagen de carga
          // $("#resul_med_neu").html("<p align='center'><img src=' /></p>");

        },
        error: function() {
          alert("error petición ajax");
        },
        success: function(data) {
          $("#resul_med_neu").empty();
          $("#resul_med_neu").append(data);

        }
      });
    });



    $("#busqueda_med_cam").keyup(function(e) {
      //obtenemos el texto introducido en el campo de búsqueda
      medidaCam = $("#busqueda_med_cam").val();
      // alert("llego BUSCAR-medidaCam--1"+medidaCam);
      //hace la búsqueda
      $.ajax({
        type: "POST",
        url:"Vistas/Venta/buscar_medida_cam.php",
        // url: "Vistas/Venta/buscar_medida_neu.php",
        data:"c=" + medidaCam,
        dataType: "html",
        beforeSend: function() {
          //imagen de carga
          // $("#resul_med_neu").html("<p align='center'><img src=' /></p>");
        },
        error: function() {
          alert("error petición ajax");
        },
        success: function(data) {
          $("#resul_med_cam").empty();
          $("#resul_med_cam").append(data);
        }
      });
    });

    $("#busqueda_med_aro").keyup(function(e) {
      //obtenemos el texto introducido en el campo de búsqueda
      medidaAro = $("#busqueda_med_aro").val();
      // alert("llego BUSCAR-medidaCam--1");
      //hace la búsqueda
      $.ajax({
        type: "POST",
        url: "Vistas/Venta/buscar_medida_aro.php",
        data: "c="+ medidaAro,
        dataType: "html",
        beforeSend: function() {
          //imagen de carga
          // $("#resul_med_neu").html("<p align='center'><img src=' /></p>");

        },
        error: function() {
          alert("error petición ajax");
        },
        success: function(data) {
          $("#resul_med_aro").empty();
          $("#resul_med_aro").append(data);
        }
      });
    });

    $("#busqueda_med_pro").keyup(function(e) {
      //obtenemos el texto introducido en el campo de búsqueda
      medidaPro = $("#busqueda_med_pro").val();
      //hace la búsqueda
      $.ajax({
        type: "POST",
        url: "Vistas/Venta/buscar_medida_pro.php",
        data: "c="+ medidaPro,
        dataType: "html",
        beforeSend: function() {
          //imagen de carga
          // $("#resul_med_neu").html("<p align='center'><img src=' /></p>");

        },
        error: function() {
          alert("error petición ajax");
        },
        success: function(data) {
          $("#resul_med_pro").empty();
          $("#resul_med_pro").append(data);
        }
      });
    });

    $("#busqueda_med_ace").keyup(function(e) {
      //obtenemos el texto introducido en el campo de búsqueda
      medidaAce = $("#busqueda_med_ace").val();
      //hace la búsqueda
      $.ajax({
        type: "POST",
        url: "Vistas/Venta/buscar_medida_ace.php",
        data: "c="+ medidaAce,
        dataType: "html",
        beforeSend: function() {
          //imagen de carga
          // $("#resul_med_neu").html("<p align='center'><img src=' /></p>");

        },
        error: function() {
          alert("error petición ajax");
        },
        success: function(data) {
          $("#resul_med_ace").empty();
          $("#resul_med_ace").append(data);
        }
      });
    });


  });

  </script>


