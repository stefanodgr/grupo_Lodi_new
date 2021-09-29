<?php
include "../Funciones/BD.php";
// $sql = "SELECT
//     produ_deta_id,
//     produ_deta_codigo,
//     produ_deta_nombre
//     FROM
//     sys_produ_detalle
//     ";
// $result = mysqli_query($con, $sql);

/* CONSULTA NEUMATICOS */
$sqlNeu = "SELECT
pr.produ_id,
mr.mar_id,
mr.mar_nombre,
md.mod_id,
md.mod_nombre,
ps.pais_id,
ps.pais_nombre,
deta.produ_deta_id,
deta.produ_deta_codigo,
deta.produ_deta_nombre,
deta.produ_neu_ancho_inter,
deta.produ_neu_aro,
deta.produ_neu_uso,
deta.sunat,
pclasi.produ_clasi_id
FROM sys_producto pr , sys_produ_clasi pclasi , sys_produ_detalle deta  , sys_marca mr , sys_modelo md , sys_pais ps
where pr.produ_id = deta.produ_deta_id
AND pr.mar_id = mr.mar_id
AND pr.mod_id = md.mod_id
AND pr.pais_id = ps.pais_id
AND pclasi.produ_clasi_id = pr.produ_clasi_id
AND pr.produ_clasi_id = '1'";
$resultNeu = mysqli_query($con, $sqlNeu);

/* CONSULTA CAMARAS */
$sqlCam = "SELECT
pr.produ_id,
pr.produ_opc,
mr.mar_id,
mr.mar_nombre,
ps.pais_id,
ps.pais_nombre,
deta.produ_deta_id,
deta.produ_deta_codigo,
deta.produ_deta_nombre,
deta.produ_cam_med,
deta.produ_cam_aro,
deta.produ_cam_val,
deta.sunat,
pclasi.produ_clasi_id
FROM sys_producto pr , sys_produ_clasi pclasi , sys_produ_detalle deta , sys_marca mr , sys_pais ps
where pr.produ_id = deta.produ_deta_id
AND pclasi.produ_clasi_id = pr.produ_clasi_id
AND pr.mar_id = mr.mar_id
AND pr.pais_id = ps.pais_id
AND pr.produ_clasi_id = '2'";
$resultCam = mysqli_query($con, $sqlCam);

/* CONSULTA AROS */

$sqlAro = "SELECT
pr.produ_id,
mr.mar_id,
mr.mar_nombre,
ps.pais_id,
ps.pais_nombre,
deta.produ_deta_id,
deta.produ_deta_codigo,
deta.produ_deta_nombre,
deta.produ_aro_mod,
deta.produ_aro_espe,
deta.produ_aro_hueco,
deta.produ_aro_med,
deta.sunat,
pclasi.produ_clasi_id
FROM sys_producto pr , sys_produ_clasi pclasi , sys_produ_detalle deta , sys_marca mr ,sys_pais ps
where pr.produ_id = deta.produ_deta_id
AND pclasi.produ_clasi_id = pr.produ_clasi_id
AND pr.mar_id = mr.mar_id
AND pr.pais_id = ps.pais_id
AND pr.produ_clasi_id = '3'";
$resultAro = mysqli_query($con, $sqlAro);


/* PROTECTORES */
$sqlPro = "SELECT
        pr.produ_id,
        pr.produ_desc,
        mr.mar_id,
        mr.mar_nombre,
        ps.pais_id,
        ps.pais_nombre,
        deta.produ_deta_id,
        deta.produ_deta_codigo,
        deta.produ_deta_nombre,
        deta.sunat,
        pclasi.produ_clasi_id
FROM    sys_producto pr , sys_produ_clasi pclasi , sys_produ_detalle deta ,sys_marca mr , sys_pais ps
where   pr.produ_id = deta.produ_deta_id
AND     pr.mar_id   = mr.mar_id
AND     pr.pais_id  = ps.pais_id
AND     pclasi.produ_clasi_id = pr.produ_clasi_id
AND     pr.produ_clasi_id = '4'";
$resultPro = mysqli_query($con, $sqlPro);

/* ACCESORIOS */

$sqlAce = "SELECT
        pr.produ_id,
        pr.produ_desc,
        pr.produ_pn,
        mr.mar_id,
        mr.mar_nombre,
        ps.pais_id,
        ps.pais_nombre,
        deta.produ_deta_id,
        deta.produ_deta_codigo,
        deta.produ_deta_nombre,
        deta.sunat,
        pclasi.produ_clasi_id
FROM    sys_producto pr , sys_produ_clasi pclasi , sys_produ_detalle deta , sys_marca mr , sys_pais ps
where   pr.produ_id = deta.produ_deta_id
AND     pr.mar_id   = mr.mar_id
AND     pr.pais_id  = ps.pais_id
AND     pclasi.produ_clasi_id = pr.produ_clasi_id
AND     pr.produ_clasi_id = '5'";
$resultAce = mysqli_query($con, $sqlAce);

?>

<style>
    .oculto {
        display: none;
    }

    .fondoError {
        border-style: solid;
        border-color: red;
    }
</style>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"> -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div id="div_general" class="col-md-12 col-xs-12 col-lg-12">    
                    <!-- <div class="panel panel-default"> -->
                    <div id="div_nombre" class="col-lg-6" style="display:block;" >
                    <!-- <h2 class="azul"><i class="fa fa-cogs"></i><strong> Productos</strong></h2> -->
                        <h2 id="div_nombre_neumatico" style="display:block;" class="azul"><i class="fa fa-cogs"></i><strong>Productos-Neumaticos</strong></h2>
                        <h2 id="div_nombre_camara" style="display:none;" class="azul"><i class="fa fa-cogs"></i><strong>Productos-Camaras</strong></h2>
                        <h2 id="div_nombre_aro" style="display:none;" class="azul"><i class="fa fa-cogs"></i><strong>Productos-Aros</strong></h2>
                        <h2 id="div_nombre_protectore" style="display:none;" class="azul"><i class="fa fa-cogs"></i><strong>Productos-Protectores</strong></h2>
                        <h2 id="div_nombre_accesorio" style="display:none;" class="azul"><i class="fa fa-cogs"></i><strong>Productos-Accesorios</strong></h2>
                    </div>

                    <div class="text-right" id="div_btn">
                        <button class="btn btn-primary" id="show" onclick="DivOcultarProdu();"><i class="fa fa-plus "></i> Nuevo Producto</button>
                    </div>
                    <div class="col-lg-12" id="div_btn_regre" style="display:none;">
                        <div class="col-lg-6">
                            <h2 class="azul"><i class="glyphicon glyphicon-cog"></i>&nbsp;<strong>Crear un Nuevo Producto</strong></h2>
                        </div>
                        <div class="col-lg-6 text-right">
                                <button type="reset" class="btn btn-warning " id="show" onclick="location.reload();limpiar();"><i class="glyphicon glyphicon-chevron-left"></i></button>
                        </div>
                        <div  id="linea_black" class="col-lg-12" style="display:block;"> <hr class="black" /> </div>
                    </div>
                       
                    
                    <!-- <hr class="black" /> -->


                    <div  id="linea_black" class="col-lg-12" style="display:block;">
                     <hr class="black" />
                    </div>
                    <!-- <div class="table-responsive col-lg-12"><hr class="black" /> -->
                
    
    <div id="div_opc_consul" class="col-lg-12 col-md-12 col-lg-12" >
         <div class="col-lg-2 col-md-2" style="margin-right:-1%;">
        	    <div class="panel panel-info" onclick="OptionProdu('1');">
                <a class="panel-info" >
                  <div class="panel-heading">
                    <div class="row">
                      <div class="col-xs-4">
                      <i class="fa fa-eye fa-5x"  ></i>
                      </div>
                      <div class="col-xs-8 text-right">
                        <p class="announcement-heading">&nbsp;</p>
                        <p class="fa-5x"></p>
                      </div>
                    </div>
                  </div>
                    <div class="panel-footer announcement-bottom">
                      <div class="row">
                        <div class="col-xs-6">
                            <span class="black" >Neumaticos </span>
                        </div>
                        <div class="col-xs-6 text-right">
                          <i class="fa fa-arrow-circle-right black"  ></i>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
        	</div>
        	<div class="col-lg-2 col-md-2" style="margin-right:-1%;">
        	    <div class="panel panel-default" onclick="OptionProdu('2');">
                <a class="panel-default"  >
                  <div class="panel-heading">
                    <div class="row">
                      <div class="col-xs-4">
                      <i class="fa fa-eye fa-5x" ></i>
                      </div>
                      <div class="col-xs-8 text-right">
                        <p class="announcement-heading">&nbsp;</p>
                        <p class="fa-2x"></p>
                      </div>
                    </div>
                  </div>
                   <div class="panel-footer announcement-bottom">
                      <div class="row">
                        <div class="col-xs-6">
                         <span class="black" >Camaras </span>
                        </div>
                        <div class="col-xs-6 text-right">
                        <i class="fa fa-arrow-circle-right black" ></i>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
        	</div>
        	<div class="col-lg-2 col-md-2" style="margin-right:1%;">
        	    <div class="panel panel-danger" onclick="OptionProdu('3');">
                  <a  class="panel-danger">
                  <div class="panel-heading">
                    <div class="row">
                      <div class="col-xs-4" >
                      <i class="fa fa-eye fa-5x" ></i>
                      </div>
                      <div class="col-xs-8 text-right" >
                        <p class="announcement-heading" >&nbsp;</p>
                        <p class="fa-2x" ></p>
                      </div>
                    </div>
                  </div>
                    <div class="panel-footer announcement-bottom">
                      <div class="row">
                        <div class="col-xs-6" >
                          <span class="black" >Aros</span>
                        </div>
                        <div class="col-xs-6 text-right" >
                          <i class="fa fa-arrow-circle-right black" ></i>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
        	</div>
        	<div class="col-lg-2 col-md-2" style="margin-left:-2%;">
        	    <div class="panel panel-success" onclick="OptionProdu('4');">
                  <a id="show" class="panel-success">
                  <div class="panel-heading">
                    <div class="row">
                      <div class="col-xs-4" >
                      <i class="fa fa-eye fa-5x" ></i>
                      </div>
                      <div class="col-xs-8 text-right" >
                        <p class="announcement-heading">&nbsp;</p>
                        <p class="fa-1x"></p>
                      </div>
                    </div>
                  </div>

                    <div class="panel-footer announcement-bottom">
                      <div class="row">
                        <div class="col-xs-6" >
                       <span class="black" >Protectores </span>
                        </div>
                        <div class="col-xs-6 text-right" >
                          <i class="fa fa-arrow-circle-right black" ></i>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-2" style="margin-left:-1%;">
        	    <div class="panel panel-success" onclick="OptionProdu('5');">
                  <a  id="show" class="panel-success">
                  <div class="panel-heading" >
                    <div class="row">
                      <div class="col-xs-4" >
                      <i class="fa fa-eye fa-5x" ></i>
                      </div>
                      <div class="col-xs-8 text-right" >
                        <p class="announcement-heading">&nbsp;</p>
                        <p class="fa-1x"></p>
                      </div>
                    </div>
                  </div>

                    <div class="panel-footer announcement-bottom" >
                      <div class="row">
                        <div class="col-xs-6">
                         <span class="black" >Acesorios </span>
                        </div>
                        <div class="col-xs-6 text-right">
                        <i class="fa fa-arrow-circle-right black" ></i>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
            </div>
            <div id="reporte_neumatico" class="col-lg-2 col-md-2" style="margin-left:-1%;" style="display:block;">
        	    <div class="panel panel-success" onclick="RNeu();">
                  <a  id="show" class="panel-success">
                  <div class="panel-heading" >
                    <div class="row">
                      <div class="col-xs-4" >
                      <i class="fa fa-eye fa-5x" ></i>
                      </div>
                      <div class="col-xs-8 text-right" >
                        <p class="announcement-heading">&nbsp;</p>
                        <p class="fa-1x"></p>
                      </div>
                    </div>
                  </div>

                    <div class="panel-footer announcement-bottom" >
                      <div class="row">
                        <div class="col-xs-6">
                         <span class="black" >Reporte</span>
                        </div>
                        <div class="col-xs-6 text-right">
                        <i class="fa fa-arrow-circle-right black" ></i>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
            </div>
            <!--  -->
            <div id="reporte_camara" class="col-lg-2 col-md-2" style="margin-left:-1%;display:none;">
        	    <div class="panel panel-success" onclick="RCam();">
                  <a  id="show" class="panel-success">
                  <div class="panel-heading" >
                    <div class="row">
                      <div class="col-xs-4" >
                      <i class="fa fa-eye fa-5x" ></i>
                      </div>
                      <div class="col-xs-8 text-right" >
                        <p class="announcement-heading">&nbsp;</p>
                        <p class="fa-1x"></p>
                      </div>
                    </div>
                  </div>

                    <div class="panel-footer announcement-bottom" >
                      <div class="row">
                        <div class="col-xs-6">
                         <span class="black" >Reporte</span>
                        </div>
                        <div class="col-xs-6 text-right">
                        <i class="fa fa-arrow-circle-right black" ></i>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
            </div>
            <!--  -->
            <div id="reporte_aro" class="col-lg-2 col-md-2" style="margin-left:-1%;display:none;" >
        	    <div class="panel panel-success" onclick="RAro();">
                  <a  id="show" class="panel-success">
                  <div class="panel-heading" >
                    <div class="row">
                      <div class="col-xs-4" >
                      <i class="fa fa-eye fa-5x" ></i>
                      </div>
                      <div class="col-xs-8 text-right" >
                        <p class="announcement-heading">&nbsp;</p>
                        <p class="fa-1x"></p>
                      </div>
                    </div>
                  </div>

                    <div class="panel-footer announcement-bottom" >
                      <div class="row">
                        <div class="col-xs-6">
                         <span class="black" >Reporte</span>
                        </div>
                        <div class="col-xs-6 text-right">
                        <i class="fa fa-arrow-circle-right black" ></i>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
            </div>
            <!--  -->
            <div id="reporte_protector" class="col-lg-2 col-md-2" style="margin-left:-1%;display:none;" >
        	    <div class="panel panel-success" onclick="RPro();">
                  <a  id="show" class="panel-success">
                  <div class="panel-heading" >
                    <div class="row">
                      <div class="col-xs-4" >
                      <i class="fa fa-eye fa-5x" ></i>
                      </div>
                      <div class="col-xs-8 text-right" >
                        <p class="announcement-heading">&nbsp;</p>
                        <p class="fa-1x"></p>
                      </div>
                    </div>
                  </div>

                    <div class="panel-footer announcement-bottom" >
                      <div class="row">
                        <div class="col-xs-6">
                         <span class="black" >Reporte</span>
                        </div>
                        <div class="col-xs-6 text-right">
                        <i class="fa fa-arrow-circle-right black" ></i>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
            </div>
            <!--  -->
            <div id="reporte_accesorio" class="col-lg-2 col-md-2" style="margin-left:-1%;display:none;" >
        	    <div class="panel panel-success" onclick="RAce();">
                  <a  id="show" class="panel-success">
                  <div class="panel-heading" >
                    <div class="row">
                      <div class="col-xs-4" >
                      <i class="fa fa-eye fa-5x" ></i>
                      </div>
                      <div class="col-xs-8 text-right" >
                        <p class="announcement-heading">&nbsp;</p>
                        <p class="fa-1x"></p>
                      </div>
                    </div>
                  </div>
                    <div class="panel-footer announcement-bottom" >
                      <div class="row">
                        <div class="col-xs-6">
                         <span class="black" >Reporte</span>
                        </div>
                        <div class="col-xs-6 text-right">
                        <i class="fa fa-arrow-circle-right black" ></i>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
            </div>
            <!--  -->
        </div>
        <!-- <hr class="black" /> -->
<!-- 
                    <div id="div_opc_consul" class="row" style="display:none;">
                        <div class="col-lg-12"><hr class="black" />
                            <p>
                                <a onclick="OptionProdu('1');" class="btn btn-sq btn-primary">
                                    <i class="glyphicon glyphicon-arrow-down fa-3x"></i><br />
                                    NEUMATICOS
                                </a>
                                <a onclick="OptionProdu('2');" class="btn btn-sq btn-success">
                                    <i class="glyphicon glyphicon-arrow-down fa-3x"></i><br />
                                    CAMARAS
                                </a>
                                <a onclick="OptionProdu('3');" class="btn btn-sq btn-info">
                                    <i class="glyphicon glyphicon-arrow-down fa-3x"></i><br />
                                    AROS
                                </a>
                                <a onclick="OptionProdu('4');" class="btn btn-sq btn-warning">
                                    <i class="glyphicon glyphicon-arrow-down fa-3x"></i><br />
                                    PROTECTORES
                                </a>
                                <a onclick="OptionProdu('5');" class="btn btn-sq btn-danger">
                                    <i class="glyphicon glyphicon-arrow-down fa-3x"></i><br />
                                    ACCESORIOS
                                </a>
                            </p>
                        </div>
                    </div> -->

                    <form id="formProducto" role="form" action="index.php?menu=2" method="post">
                    <!-- <hr class="black" /> -->
                        <div class="form" id="div_nuevo_produ" style="display:none;">
                            <div class="form" id="div_tipo_produ" style="display:none;">
                                <div id="div_sku" class="form-group  col-md-8 col-xs-12 col-lg-3" style="top: 100;">
                                    <label><small> CODIGO SKU :</small></label>
                                    <input type="text" id="nombre3" name="nombre3" placeholder="Recibe SKU" class="form-control" onchange='PasarValor();' disabled>
                                </div>

                                <input type="text" id="nombreSku" name="nombreSku" placeholder="Recibe SKU" class="form-control">

                                <!-- <div id="" class="form-group  col-md-8 col-xs-12 col-lg-3" style="top: 100;">
                                <label><small> CODIGO :</small></label>
                                <input type="text" id="nombr1" name="nombr1" placeholder="ID Producto" class="form-control" disabled>
                            </div> -->
                                <div id="div_sunat" class="form-group  col-md-8 col-xs-12 col-lg-3" style="display:block;">
                                    <label><small> CODIGO SUNAT :</small></label>
                                    <input type="hidden" id="nom" name="nombre2" placeholder="Recibe contenido" class="form-control" disabled>
                                    <input type="text" id="sunat" name="sunat" placeholder="Recibe Sunat" class="form-control" disabled>
                                    <input type="hidden" id="sunat1" name="sunat1" placeholder="Recibe Sunat" class="form-control">
                                </div>
                                <div id="div_sunat_2" class="form-group  col-md-8 col-xs-12 col-lg-3 text-right" style="display:none">
                                    <label><small> CODIGO SUNAT :</small></label>
                                    <select class="form-control" id="xsunat_aro" name="xsunat_aro" title="Ingrese la Sunat" onclick="PasarValor3();">
                                        <option value="0" selected>--</option>
                                        <option value="25171901" title="RINES O RUEDAS PARA AUTOMÓVILES">25171901</option>
                                        <option value="25171903" title="RINES O RUEDAS PARA CAMIONES">25171903</option>
                                        <option value="25172512" title="LLANTA DE MOTOCICLETA">25172512</option>
                                    </select>
                                </div>
                                <div id="div_sunat_3" class="form-group  col-md-8 col-xs-12 col-lg-3" style="display:none">
                                    <label><small> CODIGO SUNAT :</small></label>
                                    <select class="form-control" id="xsunat_neu" name="xsunat_neu" title="Ingrese la Sunat" onclick="PasarValor(1);">
                                        <option value="0" selected>--</option>
                                        <option value="25172502" title="NEUMÁTICO PARA LLANTAS DE AUTOMÓVILES">25172502</option>
                                        <option value="25172509" title="NEUMÁTICOS PARA LLANTAS DE CAMIONES PESADOS">25172509</option>
                                    </select>
                                </div>
                                <br>
                                <div class="form-group  col-md-8 col-xs-12 col-lg-12">
                                    <input type="hidden" id="nombre22" placeholder="Recibe contenido" class="form-control">
                                </div>
                                <br>
                                <!--FORMULARIO NEUMATICOS-->
                                <div id="clasi" class="form-group  col-md-8 col-xs-12 col-lg-2">
                                    <label><small> TIPO DE PRODUCTO :</small></label>
                                    <select class="form-control" id="xclasi" name="xclasi" onchange="FormOcultarProdu();limpiar(); " title="Ingrese Tipo Producto" onclick="ShowClasi();">
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
                            </div>
                            <div class="form" id="div_form_neu" style="display:none;">


                                <div id="div_nomen" class="form-group  col-md-6 col-xs-12 col-lg-2">
                                    <!-- NOMENCLATURA -->
                                    <label><small>NOMENCLATURA :</small></label>
                                    <select class="form-control" id="xnomen" name="xnomen" title="Ingrese la Nomenclatura" onclick="OcultarSunat(2);">
                                        <option value="0" selected>--</option>
                                        <option value="NUMERICA">NUMERICA</option>
                                        <option value="MILIMETRICA">MILIMETRICA</option>
                                    </select>
                                </div>
                                <!-- ------------------------MARCA--------------------------------------------------- -->
                                <div id="div_marca" class=" miClase form-group  col-md-8 col-xs-12 col-lg-3">
                                    <label><small>MARCA :</small></label>
                                    <select class="form-control" name="xmar1" id="xmar1" onchange="ShowMarca1();" title="Ingrese la Marca" onclick="PasarValor();">
                                        <!--MARCA-->
                                        <?php
                                        $sql3 = "SELECT mr.mar_id,mr.mar_nombre,mr.mar_estatus,pclasi.produ_clasi_id,
                                        pclasi.produ_clasi_desc
                                        FROM
                                        sys_marca mr, sys_produ_clasi pclasi
                                        WHERE mr.produ_clasi_id = pclasi.produ_clasi_id and mr.produ_clasi_id = '1'";
                                        $rsql3 = mysqli_query($con, $sql3);
                                        echo "<option value='0' selected>--</option>";
                                        if ($row3 = mysqli_fetch_array($rsql3, MYSQLI_ASSOC)) {
                                            do {
                                                echo '<option value="' . $row3['mar_id'] . '">' . $row3['mar_nombre'] . '</option>';
                                            } while ($row3 = mysqli_fetch_array($rsql3, MYSQLI_ASSOC));
                                        }
                                        echo "<option  value=''  onclick='DivNewNeuDisplay(1);'  >NUEVA MARCA</option>";
                                        ?>
                                    </select>
                                </div>
                                <input type="hidden" class="form-control" name="xmarNom1" id="xmarNom1" onchange="PasarValor();">
                                <?php

                                ?>
                                <!-- campo oculto para el consecutivo del sku -->


                                <div id="div_marca_neu" class="form-group col-md-6 col-xs-12 col-lg-2" style="display:none;">
                                    <!-- MARCA  -->
                                    <label><small> NOMBRE MARCA:</small></label>
                                    <input type="text" class="form-control text-uppercase" name="nombrmar1" id="nombrmar1" title="Ingrese Nombre Marca" onchange="PasarValor();">
                                    <!-- <input type="text" class="form-control text-uppercase"  name="nomr1" id="rmar1"  title="Ingrese Nombre Marca"  > -->
                                </div>
                                <div id="div_modelo_neu" class="form-group col-md-6 col-xs-12 col-lg-2" style="display:none;">
                                    <!-- MODELO -->
                                    <label><small> NOMBRE MODELO:</small></label>
                                    <input type="text" class="form-control text-uppercase" name="nombrmod1" id="nombrmod1" title="Ingrese Nombre Modelo">

                                </div>
                                <div id="div_atras" style="display:none" class="form-group col-md-6 col-xs-12 col-lg-1">
                                    <a class="btn btn-warning" role="button" onclick="DivNewNeuDisplay();"><i class="glyphicon glyphicon-chevron-left"></i></a>
                                </div>


                                <!---------------------------------MARCA----------------------------------- -->
                                <!------------------MODELO --------------------------------------------------->
                                <div id="div_modelo" class="form-group  col-md-6 col-xs-12 col-lg-3">
                                    <label><small>MODELO :</small></label>
                                    <select class="form-control" name="xmod" id="xmod" onchange="ShowModelo();" title="Ingrese el Modelo">
                                    </select>
                                </div>
                                <!-- <input  type ="hidden" class="form-control"  name="xmarNom"   id="xmarNom"> -->
                                <input type="hidden" class="form-control" name="xmodNom" id="xmodNom">
                                <!--------------------------------------------------------------------------------------------------------->
                                <!-- --------------------------------PAIS------------------------------------------------------------------>
                                <div id="div_pais_neu" class="form-group  col-md-8 col-xs-12 col-lg-2">
                                    <label><small> PAIS :</small></label>
                                    <select class="form-control" id="xpais1" name="xpais1" onchange="ShowPais1();" title="Ingrese el Pais">
                                        <!-- Leer los Clasificacion -->
                                        <?php
                                        $sql4 = "SELECT pais_id,pais_nombre from sys_pais WHERE pais_estatus=1 order by pais_id";
                                        $rsql4 = mysqli_query($con, $sql4);
                                        echo "<option value='0' selected>--</option>";
                                        if ($row4 = mysqli_fetch_array($rsql4, MYSQLI_ASSOC)) {
                                            do {
                                                echo '<option value="' . $row4['pais_id'] . '">' . $row4['pais_nombre'] . '</option>';
                                            } while ($row4 = mysqli_fetch_array($rsql4, MYSQLI_ASSOC));
                                        }
                                        ?>
                                    </select>
                                </div>
                                <input type="hidden" class="form-control" name="xpaisNom1" id="xpaisNom1" title="Ingrese el Pais">
                                <!-- -------------------------------PAIS------------------------------------------------------------------->
                                <div class="form-group col-xs-12 col-md-6 col-lg-2">
                                    <!-- ANCHO DE SECCION INTERNO -->
                                    <label><small>ANCHO/SECCION(MM) :</small></label>
                                    <input type="text" class="form-control text-uppercase" id="neu_xanc" name="neu_xanc" title="Ingrese el Ancho/Seccion" onchange="PasarValor(1);">
                                </div>
                                <div class="form-group col-xs-12 col-md-6 col-lg-2">
                                    <!-- SERIE DE NEUMATICO-->
                                    <label><small>SERIE :</small></label>
                                    <input type="text" class="form-control text-uppercase" id="neu_xserie" name="neu_xserie" title="Ingrese el Serie">
                                </div>
                                <div class="form-group col-md-6 col-xs-12 col-lg-2">
                                    <!-- ARO DE NEUMATICO -->
                                    <label><small> ARO :</small></label>
                                    <input type="text" class="form-control text-uppercase" id="neu_xaro" name="neu_xaro" title="Ingrese solo el Aro" onchange="PasarValor(1);">
                                </div>
                                <div class="form-group col-md-6 col-xs-12 col-lg-2">
                                    <!-- PLIEGUES -->
                                    <label><small> PLIEGUES :</small></label>
                                    <input type="text" class="form-control text-uppercase" id="neu_xpli" name="neu_xpli" title="Ingrese solo el Pliegue">
                                </div>
                                <div id="div_tipo_neu" class="form-group  col-md-6 col-xs-12 col-lg-2">
                                    <!-- TIPO  RADIAL/CONVENCIONAL -->
                                    <label><small>Tipo :</small></label>
                                    <select class="form-control" id="xtp" name="xtp" title="Ingrese Tipo">
                                        <option value="" selected>--</option>
                                        <option value="RADIAL">RADIAL</option>
                                        <option value="CONVENCIONAL">CONVENCIONAL</option>
                                    </select>
                                </div>
                                <div class="form-group  col-md-6 col-xs-12 col-lg-2">
                                    <!-- SET -->
                                    <label><small> SET :</small> </label>
                                    <select class="form-control" id="neu_set" name="neu_set" title="Ingrese el Set">
                                        <option value="0" selected>--</option>
                                        <option value="LL">LL</option>
                                        <option value="LL/C/P">LL/C/P</option>
                                        <option value="LL/C">LL/C</option>
                                        <option value="LL/P">LL/P</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12 col-xs-12 col-lg-3">
                                    <label> <small>ANCHO/SECCION ADUANAS :</small></label>
                                    <!--ANCHO DE SECCION ADUANAS -->
                                    <input type="text" class="form-control text-uppercase" id="neu_xanc_adua" name="neu_xanc_adua" title="Ingrese Ancho/Seccion Aduanas">
                                </div>
                                <div class="form-group col-md-12 col-xs-12 col-lg-3">
                                    <!--SERIE ADUANAS -->
                                    <label> <small>SERIE/ADUANAS :</small></label>
                                    <input type="text" class="form-control text-uppercase" id="neu_xserie_adua" name="neu_xserie_adua" title="Ingrese la Serie/Aduanas">
                                </div>
                                <div class="form-group col-md-12 col-xs-12 col-lg-3">
                                    <!--DIAMETRO EXTERNO -->
                                    <label> <small>DIAMETRO/EXTERNO :</small></label>
                                    <input type="text" class="form-control text-uppercase" id="neu_xexte" name="neu_xexte" title="neu_xexte" title="Ingrese la Diametro/Externo">
                                </div>
                                <div class="form-group  col-md-8 col-xs-12 col-lg-3">
                                    <label><small> TIPO DE CONSTRUCCIÓN No.04 :</small></label>
                                    <select class="form-control" id="neu_xcons" name="neu_xcons" title="Ingrese Tipo de Construccion">
                                        <option value="0" selected>--</option>
                                        <option value="CTT-CONVENCIONAL CON CAMARA">CTT-CONVENCIONAL CON CAMARA</option>
                                        <option value="CTL-CONVENCIONAL SIN CAMARA">CTL-CONVENCIONAL SIN CAMARA </option>
                                        <option value="RTT-RADIAL CON CAMARA">RTT-RADIAL CON CAMARA</option>
                                        <option value="RTL-RADIAL SIN CAMARA">RTL-RADIAL SIN CAMARA</option>
                                    </select>
                                </div>
                                <div class="form-group  col-md-8 col-xs-12 col-lg-6">
                                    <label> <small>USO COMERCIAL No. 01 :</small> </label>
                                    <select class="form-control" id="neu_xuso" name="neu_xuso" title="Ingrese Uso Comercial" onclick="PasarValor();">
                                        <option value="" selected>--</option>
                                        <option value="PPE-PASAJEROS, USO PERMANENTE">PPE-Pasajeros, uso permanente</option>
                                        <option value="PTE-PASAJEROS, USO TEMPORAL">PTE-Pasajeros, uso temporal</option>
                                        <option value="CLT-COMERCIALES, PARA CAMIONETA DE CARGA, MICROBUSES O CAMIONES LIGEROS">CLT-Comerciales, para camioneta de carga, microbuses o camiones ligeros</option>
                                        <option value="CTR-COMERCIALES, PARA CAMION Y/O OMNIBUS">CTR-Comerciales, para camión y/o ómnibus</option>
                                        <option value="CML-COMERCIALES, PARA USO MINERO Y FORESTAL">CML-Comerciales, para uso minero y forestal</option>
                                        <option value="CMH-COMERCIALES, PARA CASAS RODANTES">CMH-Comerciales, para casas rodantes</option>
                                        <option value="CST-COMERCIALES, REMOLCADORES EN CARRETERA">CST-Comerciales, remolcadores en carretera</option>
                                        <option value="ALN-AGRICOLAS">ALN-Agrícolas</option>
                                        <option value="OTG-MAQUINARIA, TRACTORES NIVELADORAS">OTG-Maquinaria, tractores niveladores</option>
                                        <option value="OTR-OTROS PARA MAQUINARIAS">OTR-Otros para maquinarias</option>
                                    </select>
                                </div>
                                <div class="form-group  col-md-8 col-xs-12 col-lg-3">
                                    <label> <small>MATERIAL/CARCASA No. 02 :</small></label>
                                    <select class="form-control" id="neu_xmate" name="neu_xmate" title="Ingrese Material/Carcasa">
                                        <option value="0" selected>--</option>
                                        <option value="NYLON">NYLON</option>
                                        <option value="ACERO">ACERO </option>
                                        <option value="POLIESTER">POLIESTER</option>
                                        <option value="RAYON">RAYON</option>
                                        <option value="POLIAMIDA">POLIAMIDA</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12 col-xs-12 col-lg-3">
                                    <label> <small>INDICE DE CARGA(KG) No.05 :</small></label>
                                    <input type="text" class="form-control text-uppercase" id="neu_xcarga" name="neu_xcarga" title="Ingrese Indice de Carga">
                                </div>
                                <div class="form-group col-md-12 col-xs-12 col-lg-3">
                                    <label> <small>PROFUNDIDAD DE PISADA :</small></label>
                                    <input type="text" class="form-control text-uppercase" id="neu_xpisada" name="neu_xpisada" title="Ingrese Profundidad de Pisada">
                                </div>
                                <div class="form-group  col-md-8 col-xs-12 col-lg-3">
                                    <label><small>CODIGO/VELOCIDAD/No.06 :</small></label>
                                    <select class="form-control" id="neu_xvel" name="neu_xvel" title="Ingrese Codigo/Velocidad">
                                        <option value="0" selected>--</option>
                                        <option value="E-70KM/H">E-70KM/H</option>
                                        <option value="F-80KM/H">F-80KM/H </option>
                                        <option value="G-90KM/H">G-90KM/H</option>
                                        <option value="J-100KM/H">J-100KM/H</option>
                                        <option value="K-110KM/H">K-110KM/H</option>
                                        <option value="L-120KM/H">L-120KM/H</option>
                                        <option value="M-130KM/H">M-130KM/H</option>
                                        <option value="N-140KM/H">N-140KM/H</option>
                                        <option value="P-150KM/H">P-150KM/H</option>
                                        <option value="Q-160KM/H">Q-160KM/H</option>
                                        <option value="R-170KM/H">R-170KM/H</option>
                                        <option value="S-180KM/H">S-180KM/H</option>
                                        <option value="T-190KM/H">T-190KM/H</option>
                                        <option value="U-200KM/H">U-200KM/H</option>
                                        <option value="H-210KM/H">H-210KM/H</option>
                                        <option value="V-240KM/H">V-240KM/H</option>
                                        <option value="W-270KM/H">W-270KM/H</option>
                                        <option value="Y-300KM/H">Y-300KM/H</option>
                                        <option value="Z-MAYOR A 300KM/H">Z-MAYOR A 300KM/H</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12 col-xs-12 col-lg-3">
                                    <label><small> CONSTANCIA/CUMPLIMIENTO :</small></label>
                                    <input type="text" class="form-control text-uppercase" name="neu_xcum" id="neu_xcum" title="Ingrese Constancia/Cumplimiento">
                                </div>
                                <div class="form-group col-md-12 col-xs-12 col-lg-3">
                                    <label><small>ITEM DE LA CONSTANCIA :</small></label>
                                    <input type="text" class="form-control text-uppercase" name="neu_xitem" id="neu_xitem" title="Ingrese Item de la Constancia">
                                </div>
                                <div class="form-group col-md-12 col-xs-12 col-lg-2">
                                    <label><small> VIGENCIA :</small></label>
                                    <input type="date" class="form-control text-uppercase" name="neu_xvigen" id="neu_xvigen" title="Ingrese Vigencia">
                                </div>
                                <div class="form-group col-md-12 col-xs-12 col-lg-5">
                                    <label><small>DECLARACION/CONFORMIDAD :</small></label>
                                    <input type="text" class="form-control text-uppercase" id="neu_xconfor" name="neu_xconfor" title="Ingrese Declaracion/Conformidad">
                                </div>
                                <div class="form-group col-md-12 col-xs-12 col-lg-5">
                                    <label><small>PARTIDA ARANCELARIA :</small></label>
                                    <input type="text" class="form-control text-uppercase" id="neu_xparti" name="neu_xparti" title="Ingrese Partida Arancelaria">
                                </div>
                            </div>
                            <div class="form" id="div_form_cam" style="display:none;">
                                <!-- ---------------------------------------------MARCA -------------------------------------------------------------------------------->
                                <div id="div_marca_cam" class="form-group  col-md-4 col-xs-12 col-lg-3">
                                    <label><small>MARCA :</small></label>
                                    <select class="form-control" id="xmar2" name="xmar2" onchange="ShowMarca2();" title="Ingrese Marca" onclick="PasarValor2();OcultarSunat();">
                                        <?php
                                        $sql5 = "SELECT mr.mar_id,mr.mar_nombre,mr.mar_estatus,pclasi.produ_clasi_id,
                                        pclasi.produ_clasi_desc
                                        FROM
                                        sys_marca mr, sys_produ_clasi pclasi
                                        WHERE mr.produ_clasi_id = pclasi.produ_clasi_id and mr.produ_clasi_id = '2'";
                                        $rsql5 = mysqli_query($con, $sql5);
                                        echo "<option value='0' selected >--</option>";
                                        if ($row5 = mysqli_fetch_array($rsql5, MYSQLI_ASSOC)) {
                                            do {
                                                echo '<option value="' . $row5['mar_id'] . '">' . $row5['mar_nombre'] . '</option>';
                                            } while ($row5 = mysqli_fetch_array($rsql5, MYSQLI_ASSOC));
                                        }
                                        echo "<option value='0' onclick='DivNewCamDisplay(1);'>NUEVA MARCA</option>";
                                        ?>
                                    </select>
                                </div>
                                <input type="hidden" class="form-control" name="xmarNom2" id="xmarNom2" onchange="PasarValor2();">

                                <div id="div_nombrmar2" class="form-group col-md-6 col-xs-12 col-lg-2" style="display:none;">
                                    <!-- PLIEGUES -->
                                    <label><small> NOMBRE MARCA:</small></label>
                                    <input type="text" class="form-control text-uppercase" name="nombrmar2" id="nombrmar2" title="Ingrese el Nombre Marca" onchange="PasarValor2();">
                                </div>
                                <div id="div_atras_cam" style="display:none;" class="form-group col-md-6 col-xs-12 col-lg-1">
                                    <a class="btn btn-warning" role="button" onclick="DivNewCamDisplay();"><i class="glyphicon glyphicon-chevron-left"></i></a>
                                </div>
                                <!-- ---------------------------------------------MARCA ------------------------------------------------------------------------------->
                                <div class="form-group  col-md-4 col-xs-12 col-lg-4">
                                    <label><small>TIPO :</small></label>
                                    <select class="form-control" id="xtp1" name="xtp1" title="Ingrese Tipo " onclick="PasarValor2();">
                                        <option value="" selected>--</option>
                                        <option value="RADIAL">RADIAL</option>
                                        <option value="CONVENCIONAL">CONVENCIONAL</option>
                                    </select>
                                </div>
                                <!-- ---------------------------------------------PAIS--------------------------------------------------------------------------------->
                                <div class="form-group  col-md-4 col-xs-12 col-lg-3">
                                    <label> <small>PAIS :</small></label>
                                    <select class="form-control" id="xpais2" name="xpais2" onchange="ShowPais2();" title="Ingrese Pais" onclick="PasarValor2();">
                                        <!-- Leer los Clasificacion -->
                                        <?php
                                        $sql6 = "SELECT pais_id,pais_nombre from sys_pais WHERE pais_estatus=1 order by pais_id";
                                        $rsql6 = mysqli_query($con, $sql6);
                                        echo "<option value='0' selected>--</option>";
                                        if ($row6 = mysqli_fetch_array($rsql6, MYSQLI_ASSOC)) {
                                            do {
                                                echo '<option value="' . $row6['pais_id'] . '">' . $row6['pais_nombre'] . '</option>';
                                            } while ($row6 = mysqli_fetch_array($rsql6, MYSQLI_ASSOC));
                                        }
                                        ?>
                                    </select>
                                </div>
                                <input type="hidden" class="form-control" name="xpaisNom2" id="xpaisNom2" title="Ingrese Pais" onchange="PasarValor2();">
                                <!-- -------------------------------------------------PAIS------------------------------------------------------------------------------>
                                <div class="form-group col-xs-12 col-md-3 col-lg-4">
                                    <label><small>MEDIDA :</small></label>
                                    <input type="text" class="form-control text-uppercase" name="cam_xmed" id="cam_xmed" title="Ingrese la Medida" onchange="PasarValor2();">
                                </div>
                                <div class="form-group col-md-2 col-xs-12 col-lg-4">
                                    <label><small>ARO :</small></label>
                                    <input type="text" class="form-control text-uppercase" name="cam_xaro" id="cam_xaro" title="Ingrese el Aro">
                                </div>
                                <div class="form-group col-md-2 col-xs-12 col-lg-4">
                                    <label><small>VALVULA :</small></label>
                                    <input type="text" class="form-control text-uppercase" name="cam_xval" id="cam_xval" title="Ingrese el Valvula" onchange="PasarValor2();">
                                </div>

                            </div>
                            <div class="form" id="div_form_aro" style="display:none;">
                                <!-- ------------------------MARCA--------------------------------------------------- -->
                                <div id="div_marca_aro" class="form-group  col-md-8 col-xs-12 col-lg-2">
                                    <label><small>MARCA :</small></label>
                                    <select class="form-control" name="xmar3" id="xmar3" onchange="ShowMarca3();" title="Ingrese el Marca" onclick="PasarValor3();OcultarSunat(1);">
                                        <?php
                                        $sql7 = "SELECT mr.mar_id,mr.mar_nombre,mr.mar_estatus,pclasi.produ_clasi_id,
                                        pclasi.produ_clasi_desc
                                        FROM
                                        sys_marca mr, sys_produ_clasi pclasi
                                        WHERE mr.produ_clasi_id = pclasi.produ_clasi_id and mr.produ_clasi_id = '3'";
                                        $rsql7 = mysqli_query($con, $sql7);
                                        echo "<option value='0' selected >--</option>";
                                        if ($row7 = mysqli_fetch_array($rsql7, MYSQLI_ASSOC)) {
                                            do {
                                                echo '<option value="' . $row7['mar_id'] . '">' . $row7['mar_nombre'] . '</option>';
                                            } while ($row7 = mysqli_fetch_array($rsql7, MYSQLI_ASSOC));
                                        }
                                        echo "<option  value='0'  onclick='DivNewAroDisplay(1);'>NUEVA MARCA</option>";
                                        ?>
                                    </select>
                                </div>
                                <input type="hidden" class="form-control" name="xmarNom3" id="xmarNom3" onchange="PasarValor3();">
                                <div id="div_nombrmar3" class="form-group col-md-6 col-xs-12 col-lg-2" style="display:none;">
                                    <!-- PLIEGUES -->
                                    <label><small> NOMBRE MARCA:</small></label>
                                    <input type="text" class="form-control text-uppercase" name="nombrmar3" id="nombrmar3" title="Ingrese Nombre Marca" onchange="PasarValor3();">
                                </div>
                                <div id="div_atras_aro" style="display:none;" class="form-group col-md-6 col-xs-12 col-lg-1">
                                    <a class="btn btn-warning" role="button" onclick="DivNewAroDisplay();"><i class="glyphicon glyphicon-chevron-left"></i></a>
                                </div>

                                <div class="form-group  col-md-4 col-xs-12 col-lg-3">
                                    <label><small>TIPO :</small></label>
                                    <select class="form-control" id="aro_xmod" name="aro_xmod" title="Ingrese Tipo" onclick="PasarValor3();">
                                        <option value="0" selected>--</option>
                                        <option value="AMERICANO">AMERICANO</option>
                                        <option value="ARTILLERO">ARTILLERO</option>
                                        <option value="EUROPEO">EUROPEO</option>
                                        <option value="PLATA">PLATA</option>
                                        <option value="PULIDO POR AMBOS LADOS">PULIDO POR AMBOS LADOS</option>
                                    </select>
                                </div>
                                <!-- -----------------------------------MARCA----------------------------------- -->
                                <div class="form-group  col-md-8 col-xs-12 col-lg-2">
                                    <label><small> PAIS :</small></label>
                                    <select class="form-control" id="xpais3" name="xpais3" onchange="ShowPais3();" title="Ingrese Pais" onclick="PasarValor3();">
                                        <!-- Leer los Clasificacion -->
                                        <?php
                                        $sql8 = "SELECT pais_id,pais_nombre from sys_pais WHERE pais_estatus=1 order by pais_id";
                                        $rsql8 = mysqli_query($con, $sql8);
                                        echo "<option value='0' selected>--</option>";
                                        if ($row8 = mysqli_fetch_array($rsql8, MYSQLI_ASSOC)) {
                                            do {
                                                echo '<option value="' . $row8['pais_id'] . '">' . $row8['pais_nombre'] . '</option>';
                                            } while ($row8 = mysqli_fetch_array($rsql8, MYSQLI_ASSOC));
                                        }
                                        ?>
                                    </select>
                                </div>
                                <input type="hidden" class="form-control" name="xpaisNom3" id="xpaisNom3" onchange="PasarValor3();">
                                <!-- -------------------------------PAIS-------------------------------------------- -->
                                <div class="form-group col-xs-12 col-md-12 col-lg-3">
                                    <label><small> MEDIDA :</small></label>
                                    <input type="text" class="form-control text-uppercase" name="aro_xmed" id="aro_xmed" title="Ingrese la Medida" onchange="PasarValor3();">
                                </div>
                                <div class="form-group col-md-12 col-xs-12 col-lg-2">
                                    <label><small> ESPESOR(MM) :</small></label>
                                    <input type="text" class="form-control text-uppercase" name="aro_xespe" id="aro_xespe" title="Ingrese el Espesor">
                                </div>
                                <div class="form-group col-md-12 col-xs-12 col-lg-2">
                                    <label><small> N° HUECOS : </small></label>
                                    <input type="text" class="form-control text-uppercase" name="aro_xhueco" id="aro_xhueco" title="Ingrese el N° Huecos" onchange="PasarValor3();">
                                </div>
                                <div class="form-group col-md-12 col-xs-12 col-lg-2">
                                    <label><small> ESPESOR/HUECO :</small></label>
                                    <input type="text" class="form-control text-uppercase" name="aro_xhole" id="aro_xhole" title="Ingrese el Espesor/Hueco">
                                </div>
                                <div class="form-group col-md-12 col-xs-12 col-lg-2">
                                    <label><small> C.B.D :</small></label>
                                    <input type="text" class="form-control text-uppercase" name="aro_xcbd" id="aro_xcbd" title="Ingrese C.B.D">
                                </div>
                                <div class="form-group col-md-12 col-xs-12 col-lg-2">
                                    <label><small> P.C.D :</small></label>
                                    <input type="text" class="form-control text-uppercase" name="aro_xpcd" id="aro_xpcd" title="Ingrese P.C.D">
                                </div>
                                <div class="form-group col-md-12 col-xs-12 col-lg-2">
                                    <label><small> OFFSET :</small></label>
                                    <input type="text" class="form-control text-uppercase" name="aro_xoff" id="aro_xoff" title="Ingrese el OffSet">
                                </div>
                            </div>
                            <div class="form" id="div_form_pro" style="display:none;">

                                <label><small>CODIGO:</small></label>

                                <!-- Leer los Clasificacion -->

                                <!-- <input class="form-control" id="xpais3" name="xpais3" value="" onchange="ShowPais3();" title="Ingrese Pais" onclick="PasarValor3();"> -->


                                <!-- ------------------------MARCA--------------------------------------------------- -->
                                <div id="div_marca_pro" class="form-group  col-md-8 col-xs-12 col-lg-2">
                                    <label><small>MARCA :</small></label>
                                    <select class="form-control" name="xmar4" id="xmar4" onchange="ShowMarca4();" title="Ingrese Marca" onclick="PasarValor4();OcultarSunat();">
                                        <?php
                                        $sql9 = "SELECT mr.mar_id,mr.mar_nombre,mr.mar_estatus,pclasi.produ_clasi_id,
                                                        pclasi.produ_clasi_desc
                                                        FROM
                                                        sys_marca mr, sys_produ_clasi pclasi
                                                        WHERE mr.produ_clasi_id = pclasi.produ_clasi_id and mr.produ_clasi_id = '4'";
                                        $rsql9 = mysqli_query($con, $sql9);
                                        echo "<option value='0' selected >--</option>";
                                        if ($row9 = mysqli_fetch_array($rsql9, MYSQLI_ASSOC)) {
                                            do {
                                                echo '<option value="' . $row9['mar_id'] . '">' . $row9['mar_nombre'] . '</option>';
                                            } while ($row9 = mysqli_fetch_array($rsql9, MYSQLI_ASSOC));
                                        }
                                        echo "<option  value='0'  onclick='DivNewProDisplay(1);'>NUEVA MARCA</option>";
                                        ?>
                                    </select>
                                </div>
                                <input type="hidden" class="form-control" id="xmarNom4" name="xmarNom4" onchange="PasarValor4();">
                                <div id="div_nombrmar4" class="form-group col-md-6 col-xs-12 col-lg-2" style="display:none;">
                                    <!-- PLIEGUES -->
                                    <label><small> NOMBRE MARCA:</small></label>
                                    <input type="text" class="form-control text-uppercase" name="nombrmar4" id="nombrmar4" title="Ingrese Marca" onchange="PasarValor4();">
                                </div>
                                <div id="div_atras_pro" style="display:none;" class="form-group col-md-6 col-xs-12 col-lg-1">
                                    <a class="btn btn-warning" role="button" onclick="DivNewProDisplay();"><i class="glyphicon glyphicon-chevron-left"></i></a>
                                </div>

                                <!-- -----------------------------------MARCA----------------------------------- -->
                                <!-- --------------------------------PAIS---------------------------------- -->
                                <div class="form-group  col-md-8 col-xs-12 col-lg-2">
                                    <label><small> PAIS :</small></label>
                                    <select class="form-control" id="xpais4" name="xpais4" onchange="ShowPais4();" title="Ingrese Pais" onclick="PasarValor4();">
                                        <!-- Leer los Clasificacion -->
                                        <?php
                                        $sql10 = "SELECT pais_id,pais_nombre from sys_pais WHERE pais_estatus=1 order by pais_id";
                                        $rsql10 = mysqli_query($con, $sql10);
                                        echo "<option value='0' selected>--</option>";
                                        if ($row10 = mysqli_fetch_array($rsql10, MYSQLI_ASSOC)) {
                                            do {
                                                echo '<option value="' . $row10['pais_id'] . '">' . $row10['pais_nombre'] . '</option>';
                                            } while ($row10 = mysqli_fetch_array($rsql10, MYSQLI_ASSOC));
                                        }
                                        ?>
                                    </select>
                                </div>
                                <input type="hidden" class="form-control" id="xpaisNom4" name="xpaisNom4" onchange="PasarValor4();">
                                <!-- -------------------------------PAIS-------------------------------------------- -->
                                <div class="form-group col-xs-12 col-md-12 col-lg-4">
                                    <label><small>DESCRIPCION :</small></label>
                                    <input type="text" class="form-control text-uppercase" id="xdesc1" name="xdesc1" title="Ingrese la Descripcion" onchange="PasarValor4();">
                                </div>
                            </div>
                            <div class="form" id="div_form_ace" style="display:none;">
                                <!-- ---------------------------------MARCA--------------------------------- -->
                                <div id="div_marca_ace" class="form-group  col-md-8 col-xs-12 col-lg-2">
                                    <label><small>MARCA :</small></label>
                                    <select class="form-control" name="xmar5" id="xmar5" onchange="ShowMarca5();" title="Ingrese Marca" onclick="PasarValor5();OcultarSunat();">
                                        <?php
                                        $sql11 = "SELECT mr.mar_id,mr.mar_nombre,mr.mar_estatus,pclasi.produ_clasi_id,
                                                        pclasi.produ_clasi_desc
                                                        FROM
                                                        sys_marca mr, sys_produ_clasi pclasi
                                                        WHERE mr.produ_clasi_id = pclasi.produ_clasi_id and mr.produ_clasi_id = '5'";
                                        $rsql11 = mysqli_query($con, $sql11);
                                        echo "<option value='0' selected >--</option>";
                                        if ($row11 = mysqli_fetch_array($rsql11, MYSQLI_ASSOC)) {
                                            do {
                                                echo '<option value="' . $row11['mar_id'] . '">' . $row11['mar_nombre'] . '</option>';
                                            } while ($row11 = mysqli_fetch_array($rsql11, MYSQLI_ASSOC));
                                        }
                                        echo "<option value='0'  onclick='DivNewAceDisplay(1);'>NUEVA MARCA</option>";
                                        ?>
                                    </select>
                                </div>
                                <input type="hidden" class="form-control" id="xmarNom5" name="xmarNom5" onchange="PasarValor5();">
                                <div id="div_nombrmar5" class="form-group col-md-6 col-xs-12 col-lg-2" style="display:none;">
                                    <!-- PLIEGUES -->
                                    <label><small> NOMBRE MARCA:</small></label>
                                    <input type="text" class="form-control text-uppercase" name="nombrmar5" id="nombrmar5" title="Ingrese Nombre Marca" onchange="PasarValor5();">
                                </div>
                                <div id="div_atras_ace" style="display:none;" class="form-group col-md-6 col-xs-12 col-lg-1">
                                    <a class="btn btn-warning" role="button" onclick="DivNewAceDisplay();"><i class="glyphicon glyphicon-chevron-left"></i></a>
                                </div>

                                <!-- ---------------------------------MARCA--------------------------------- -->
                                <div class="form-group  col-md-8 col-xs-12 col-lg-2">
                                    <label><small>PAIS :</small></label>
                                    <select class="form-control" id="xpais5" name="xpais5" onchange="ShowPais5();" title="Ingrese Nombre Pais" onclick="PasarValor5();">
                                        <!-- Leer los Clasificacion -->
                                        <?php
                                        $sql12 = "SELECT pais_id,pais_nombre from sys_pais WHERE pais_estatus=1 order by pais_id";
                                        $rsql12 = mysqli_query($con, $sql12);
                                        echo "<option value='0' selected>--</option>";
                                        if ($row12 = mysqli_fetch_array($rsql12, MYSQLI_ASSOC)) {
                                            do {
                                                echo '<option value="' . $row12['pais_id'] . '">' . $row12['pais_nombre'] . '</option>';
                                            } while ($row12 = mysqli_fetch_array($rsql12, MYSQLI_ASSOC));
                                        }
                                        ?>
                                    </select>
                                </div>
                                <input type="hidden" class="form-control" name="xpaisNom5" id="xpaisNom5" onchange="PasarValor5();">
                                <div class="form-group col-xs-12 col-md-12 col-lg-4" title="Ingrese Descripcion">
                                    <label><small>DESCRIPCION :</small></label>
                                    <input class="form-control text-uppercase" name="xdesc2" id="xdesc2" onchange="PasarValor5();">
                                </div>
                                <div class="form-group col-md-12 col-xs-12 col-lg-2">
                                    <label><small> P/N :</small></label>
                                    <input type="text" class="form-control text-uppercase" name="xpn" id="xpn" title="Ingrese solo el P/N " onchange="PasarValor5();">
                                </div>

                            </div>

                            <!-- <input name="codigo_sku" id="codigo_sku" type="hidden" value="<?= $idCodigo; ?>" onchange="PasarValor();"> -->
                            <!-- <small id="helper" class="text-danger"></small> -->
                            <!-- --------------------------------PAIS----------------------------------- -->
                            <!-- <input  type ="hidden" class="form-control"  name="xclasi" id="xclasi"> -->
                            <input type="hidden" class="form-control text-uppercase" name="xuni" value="U">
                            <div id="div_guardar" style="display:none;">
                                <div class="col-lg-3 col-md-4 hidden-xs top">
                                    <button type="submit" class="btn btn-primary" id="btn_guardar1" name="Guardar" value="Insertar">Guardar </button>
                                    <button type="reset" class="btn btn-default" onclick="location.reload()">Limpiar</button>
                                    <a href="index.php?menu=1" class="btn btn-warning" role="button"><i class="glyphicon glyphicon-chevron-left"></i></a>
                                </div>
                                <div class="col-xs-12 visible-xs top">
                                    <button type="submit" class="btn btn-primary" id="btn_guardar2" name="Guardar" value="Insertar">Guardar </button>
                                    <button type="reset" class="btn btn-default" onclick="location.reload()">Limpiar</button>
                                    <a href="index.php?menu=1" class="btn btn-warning" role="button"><i class="glyphicon glyphicon-chevron-left"></i></a>
                                </div>
                            </div>
                        </div>
                    </form>
                    
                    <div id="div_consul_produ_neu" class="col-lg-12" style="display:block;"><hr class="black" />
                        <br>
                        <!-- <hr class="black" /> -->
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <!-- contador -->
                                            <th class="text-center">N°</th>
                                            <!-- SKU -->
                                            <th class="text-center">SKU</th>
                                            <!-- MARCA -->
                                            <th class="text-center">MARCA</th>
                                            <!-- MODELO -->
                                            <th class="text-center">MODELO</th>
                                            <!-- ANCHO/SECCION -->
                                            <th class="text-center">ANCHO/SECCION</th>
                                            <!-- ARO -->
                                            <th class="text-center">ARO</th>
                                            <!-- USO COMERCIAL -->
                                            <th class="text-center">USO-CMR</th>
                                            <!-- PAIS -->
                                            <th class="text-center">PAIS</th>
                                            <!-- SUNAT -->
                                            <th class="text-center">SUNAT</th>
                                            <!-- EDITAR -->
                                            <th class="text-center">EDITAR</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php $cuenta = 0;
                                        while ($row = mysqli_fetch_array($resultNeu, MYSQLI_ASSOC)) {
                                            ?>
                                            <tr>
                                                <td><?php
                                                        $cuenta++;
                                                        echo $cuenta;
                                                        ?></td>
                                                <td><?php echo $row['produ_deta_codigo']; ?></td>
                                                <td><?php echo $row['mar_nombre']; ?></td>
                                                <td><?php echo $row['mod_nombre']; ?></td>
                                                <td><?php echo $row['produ_neu_ancho_inter']; ?></td>
                                                <td><?php echo $row['produ_neu_aro']; ?></td>
                                                <td><?php echo $row['produ_neu_uso']; ?></td>
                                                <td><?php echo $row['pais_nombre']; ?></td>
                                                <td><?php echo $row['sunat']; ?></td>
                                                <td class="centeralign">
                                                    <form id="EditarE" role="form" action="index.php?menu=3" method="post">
                                                        <button class="btn btn-warning btn-sm glyphicon glyphicon-edit" id="editar" name="edit" value='<?php echo $row['produ_deta_id']; ?>'></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                    </div>
                    
                    <div id="div_consul_produ_cam" class="col-lg-12" style="display:none;"><hr class="black" />
                     <!-- <hr class="black" /> -->
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example2">
                                    <thead>
                                        <tr>
                                            <!-- CONTADOR -->
                                            <th class="text-center">N°</th>
                                            <!-- SKU -->
                                            <th class="text-center">SKU</th>
                                            <!-- MARCA -->
                                            <th class="text-center">MARCA</th>
                                            <!-- TIPO -->
                                            <th class="text-center">TIPO</th>
                                            <!-- MEDIDA -->
                                            <th class="text-center">MEDIDA</th>
                                            <!-- ARO -->
                                            <th class="text-center">ARO</th>
                                            <!-- VALVULA -->
                                            <th class="text-center">VALVULA</th>
                                            <!-- PAIS -->
                                            <th class="text-center">PAIS</th>
                                            <!-- SUNAT -->
                                            <th class="text-center">SUNAT</th>
                                            <!-- EDITAR -->
                                            <th class="text-center">EDITAR</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php $cuenta = 0;
                                        while ($row = mysqli_fetch_array($resultCam, MYSQLI_ASSOC)) { ?>
                                            <tr>
                                                <td><?php
                                                        $cuenta++;
                                                        echo $cuenta;
                                                        ?></td>
                                                <td><?php echo $row['produ_deta_codigo']; ?></td>
                                                <td><?php echo $row['mar_nombre']; ?></td>
                                                <td><?php echo $row['produ_opc']; ?></td>
                                                <td><?php echo $row['produ_cam_med']; ?></td>
                                                <td><?php echo $row['produ_cam_aro']; ?></td>
                                                <td><?php echo $row['produ_cam_val']; ?></td>
                                                <td><?php echo $row['pais_nombre']; ?></td>
                                                <td><?php echo $row['sunat']; ?></td>
                                                <!-- EDITAR-->
                                                <!-- <td class="centeralign"> -->
                                                <td class="centeralign">
                                                    <form id="EditarE" role="form" action="index.php?menu=3" method="post">
                                                        <button class="btn btn-warning btn-sm glyphicon glyphicon-edit" id="editar" name="edit" value='<?php echo $row['produ_deta_id']; ?>'></button>
                                                    </form>
                                                </td> 
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                    </div>
                    <div id="div_consul_produ_aro" class="col-lg-12" style="display:none;"><hr class="black" />
                        <!-- <hr class="black" /> -->
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example3">
                                    <thead>
                                        <tr>
                                            <!-- SKU -->
                                            <th class="text-center">SKU</th>
                                            <!-- MARCA -->
                                            <th class="text-center">MARCA</th>
                                            <!-- TIPO -->
                                            <th class="text-center">TIPO</th>
                                            <!-- MEDIDA -->
                                            <th class="text-center">MEDIDA</th>
                                            <!-- ESPESOR -->
                                            <th class="text-center">ESPESOR</th>
                                            <!-- N° HUECOS -->
                                            <th class="text-center">N° HUECOS</th>
                                            <!-- PAIS -->
                                            <th class="text-center">PAIS</th>
                                            <!-- SUNAT  -->
                                            <th class="text-center">SUNAT</th>
                                            <!-- EDITAR  -->
                                            <th class="text-center">EDITAR</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php 
                                        while ($row1 = mysqli_fetch_array($resultAro, MYSQLI_ASSOC)) { ?>
                                            <tr>
      
                                                <td><?php echo $row1['produ_deta_codigo']; ?></td>
                                                <td><?php echo $row1['mar_nombre']; ?></td>
                                                <td><?php echo $row1['produ_aro_mod']; ?></td>
                                                <td><?php echo $row1['produ_aro_med']; ?></td>
                                                <td><?php echo $row1['produ_aro_espe']; ?></td>
                                                <td><?php echo $row1['produ_aro_hueco']; ?></td>
                                                <td><?php echo $row1['pais_nombre']; ?></td>
                                                <td><?php echo $row1['sunat']; ?></td>
                                                <td class="centeralign">
                                                    <form id="EditarE" role="form" action="index.php?menu=3" method="post">
                                                        <button class="btn btn-warning btn-sm glyphicon glyphicon-edit" id="edit" name="edit" value='<?php echo $row1['produ_deta_id']; ?>'></button>
                                                    </form>
                                                </td> 
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                    </div>
                    <div id="div_consul_produ_pro" class="col-lg-12" style="display:none;"><hr class="black" />
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example4">
                                    <thead>
                                        <tr>
                                            <!-- N° CONTADOR -->
                                            <th class="text-center">N°</th>
                                            <!-- SKU -->
                                            <th class="text-center">SKU</th>
                                            <!-- MARCA -->
                                            <th class="text-center">MARCA</th>
                                            <!-- DESCRIPCION -->
                                            <th class="text-center">DESCRIPCION</th>
                                            <!-- PAIS -->
                                            <th class="text-center">PAIS</th>
                                            <!-- SUNAT  -->
                                            <th class="text-center">SUNAT</th>
                                            <!-- EDITAR  -->
                                            <th class="text-center">EDITAR</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php $cuenta = 0;
                                        while ($row1 = mysqli_fetch_array($resultPro, MYSQLI_ASSOC)) { ?>
                                            <tr>
                                                <td><?php
                                                        $cuenta++;
                                                        echo $cuenta;
                                                        ?></td>
                                                <td><?php echo $row1['produ_deta_codigo']; ?></td>
                                                <td><?php echo $row1['mar_nombre']; ?></td>
                                                <td><?php echo $row1['produ_desc']; ?></td>
                                                <td><?php echo $row1['pais_nombre']; ?></td>
                                                <td><?php echo $row1['sunat']; ?></td>
                                                <td class="centeralign">
                                                    <form id="EditarE" role="form" action="index.php?menu=3" method="post">
                                                        <button class="btn btn-warning btn-sm glyphicon glyphicon-edit" id="editar" name="edit" value='<?php echo $row1['produ_deta_id']; ?>'></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                    </div>
                    <div id="div_consul_produ_ace" class="col-lg-12" style="display:none;"><hr class="black" />
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example5">
                                    <thead>
                                        <tr>
                                            <!-- N° CONTADOR -->
                                            <th class="text-center">N°</th>
                                            <!-- SKU -->
                                            <th class="text-center">SKU</th>
                                            <!-- MARCA -->
                                            <th class="text-center">MARCA</th>
                                            <!-- DESCRIPCION -->
                                            <th class="text-center">DESCRIPCION</th>
                                            <!-- P/N -->
                                            <th class="text-center">P/N</th>
                                            <!-- P/N -->
                                            <th class="text-center">PAIS</th>
                                            <!-- SUNAT  -->
                                            <th class="text-center">SUNAT</th>
                                            <!-- EDITAR  -->
                                            <th class="text-center">EDITAR</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php $cuenta = 0;
                                        while ($row1 = mysqli_fetch_array($resultAce, MYSQLI_ASSOC)) { ?>
                                            <tr>
                                                <td><?php
                                                        $cuenta++;
                                                        echo $cuenta;
                                                        ?></td>
                                                <td><?php echo $row1['produ_deta_codigo']; ?></td>
                                                <td><?php echo $row1['mar_nombre']; ?></td>
                                                <td><?php echo $row1['produ_desc']; ?></td>
                                                <td><?php echo $row1['produ_pn']; ?></td>
                                                <td><?php echo $row1['pais_nombre']; ?></td>
                                                <td><?php echo $row1['sunat']; ?></td>
                                                <td class="centeralign">
                                                    <form id="EditarE" role="form" action="index.php?menu=3" method="post">
                                                        <button class="btn btn-warning btn-sm glyphicon glyphicon-edit" id="editar" name="edit" value='<?php echo $row1['produ_deta_id']; ?>'></button>
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
        <!--panel panel-default-->
    </div>
    <!--col-lg-12 col-md-12 col-xs-12-->
    <!-- /.panel-body -->
</div><!-- /.row-->

<link href="css_sg/general.css?" rel="stylesheet" type="text/css" />
<!-- <script src="			language="Javascript"></script>	 -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"> -->
<script src="js_sg/producto.js?<?= substr(time(), -5) ?>" language="Javascript"></script>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
