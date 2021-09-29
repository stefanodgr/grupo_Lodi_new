<?php
include "../Funciones/BD.php";

include_once 'consultas_basicas.php';

?>

<style>
    select optgroup {
        border-bottom: 1px solid #ccc !important;
    }
</style>
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-lg-12">
                    <div class="row" id="titulo" style="display:block;">
                        <div class="col-lg-6">
                            <h2 class="azul"><i class="fa fa-folder-open-o fa-fw"></i><strong>Importaciones</strong></h2>
                        </div>
                        <div id="div_btn_impor" class="col-lg-6 text-right" style="display:block;">
                            <button class="btn btn-primary" onclick="divOcul('1');"><i class="fa fa-plus "></i> Nuevo Folder</button>
                            <!-- <button onclick="alert('llego');"></button> -->
                        </div>
                    </div>
                </div>
                <div id="titulo2" class="col-lg-12" style="display: none;">
                    <div class="row">
                        <div class="col-lg-6">
                            <h2 class="azul"><i class="fa fa-folder-open-o fa-fw"></i><strong>Nuevo Folder</strong></h2>
                        </div>
                    </div>
                </div>
                <div id="div_linea" class="col-lg-12 col-md-12 col-xs-12" style="display:none;">
                    <hr>
                </div>
                <div id="div_consul" style="display:block;" class="table-responsive col-lg-12">
                    <hr class="black" />
                    <!-- <?= json_encode($dataFolder[0]) ?> -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th class="text-center">AÑO</th>
                                <th class="text-center">NR</th>
                                <th class="text-center">PROVEEDOR</th>
                                <th class="text-center">TIPO/PRODUCTO</th>
                                <th class="text-center">MARCA</th>
                                <th class="text-center">PAIS</th>
                                <th class="text-center">CANTIDAD</th>
                                <th class="text-center">INCOTERM</th>
                                <th class="text-center">ETD</th>
                                <!-- <th class="text-center">ETA</th> -->
                                <th class="text-center">DETALLE</th>
                                <th class="text-center">CARATULA</th>
                                <th class="text-center">DERECHO</th>
                                <th class="text-center">SEGURO</th>

                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php foreach ($dataFolder as $folder) : ?>
                                <tr>
                                    <td><?= @$folder->impor_folder ?></td>
                                    <td><?= @$folder->impor_nrfolder; ?></td>
                                    <td><?= @$folder->provee_int_desc ?></td>
                                    <td><?= @$folder->produ_clasi_desc ?></td>
                                    <td><?= @$folder->mar_nombre ?></td>
                                    <td><?= @$folder->pais_nombre ?></td>
                                    <td><?= @$folder->impor_qty ?></td>
                                    <td><?= @$folder->impor_inco ?></td>
                                    <td><?= @$folder->impor_tipo ?></td>
                                    <!-- <td></td> -->
                                    <td class="centeralign">
                                        <!-- <a class="btn btn-default btn-sm glyphicon glyphicon-eye-open" href="index.php?menu=14&fld_id=<?= @$folder->fld_id ?>" class="btn btn-primary"> -->
                                            <a class="btn btn-primary btn-sm glyphicon glyphicon-list-alt" href="index.php?menu=14&fld_id=<?= @$folder->fld_id ?>" class="btn btn-primary">
                                    </td>
                                    <td>
                                        <form role="form" action="pdf_documentos/documentos/exemple05.php" method="get">
                                        <input type="hidden" name="menu" value="17">
                                        <input type="hidden" name="opci" value="stock">
                                        <input type="hidden" name="id" value="<?php echo $row['coti_id']; ?>">
                                        <button type="submit" class="btn btn-primary btn-sm glyphicon glyphicon-eye-open" value='<?php echo $row['coti_id']; ?>'></button>
                                        </form>
                                        </td>
                                        <td>
                                        <form role="form" action="pdf_documentos/documentos/exemple06.php" method="get">
                                        <input type="hidden" name="menu" value="17">
                                        <input type="hidden" name="opci" value="stock">
                                        <input type="hidden" name="id" value="<?php echo $row['coti_id']; ?>">
                                        <button type="submit" class="btn btn-primary btn-sm glyphicon glyphicon-eye-open" value='<?php echo $row['coti_id']; ?>'></button>
                                        </form>
                                        </td>
                                        <td>
                                        <form role="form" action="pdf_documentos/documentos/exemple07.php" method="get">
                                        <input type="hidden" name="menu" value="17">
                                        <input type="hidden" name="opci" value="stock">
                                        <input type="hidden" name="id" value="<?php echo $row['coti_id']; ?>">
                                        <button type="submit" class="btn btn-primary btn-sm glyphicon glyphicon-eye-open" value='<?php echo $row['coti_id']; ?>'></button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <!-- <tr>
                                <td>2019</td>
                                <td>54</td>
                                <td>GRUPO LODI</td>
                                <td>NEUMATICO</td>
                                <td>LADY TYRE</td>
                                <td>KOREA</td>
                                <td>100</td>
                                <td>FOB</td>
                                <td>20-07-2019</td>
                                <td>20-07-2020</td>

                                <td class="centeralign">
                                    <a class="btn btn-default btn-sm glyphicon glyphicon-eye-open" href="index.php?menu=14" class="btn btn-primary">
                                    <a class="btn btn-primary btn-sm glyphicon glyphicon-list-alt" href="index.php?menu=14" class="btn btn-primary">
                                </td>
                            </tr> -->

                        </tbody>
                    </table>

                </div>
                <!--Div Oculto-->
                <div id="div_form" style="display: none;">

                    <form name="frm_orden" id="frm_orden" action="../Almacen/ajax/importacion.php?accion=ajax&procesar=frm_orden&opcion=i" onsubmit="return false;" method="post">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="empresa"><small>Empresa:</small></label>
                                    <select name="empresa" id="empresa" class="form-control selectpicker show-tick" data-live-search='true'>
                                        <option value="" disabled selected>Seleccione..</option>
                                        <?php foreach ($dataEmpresa as $empresa) { ?>
                                            <option value="<?= $empresa->id ?>"><?= $empresa->nombre ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label><small>Folio:</small></label>
                                    <div id="div_folios" class="input-group">
                                        <input id="xfolder" name="xfolder" type="text" class="form-control" placeholder="Ej: 2019" aria-describedby="basic-addon1" value="<?= date("Y") ?>">
                                        <span class="input-group-addon" id="basic-addon1">N°</span>
                                        <input id="xnrfolder" name="xnrfolder" type="text" class="form-control" placeholder="Folio" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label for="Incoterm"><small>Incoterm:</small></label>
                                    <select name="folio_incoterm" id="folio_incoterm" class="form-control " required="required" data-live-search='true'>
                                        <option value="" disabled selected>Seleccione..</option>
                                        <option value="FOB">FOB</option>
                                        <option value="CFR">CFR</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="Incoterm"><small> Tipo de CTN:</small></label>
                                    <select name="folio_tipo_ctn" id="folio_tipo_ctn" class="form-control " required="required" data-live-search='true'>
                                        <option value="" disabled selected>Seleccione..</option>
                                        <option value="40HC">40HC</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="" class="control-label" style="padding-right:5px !important"><small>QTY CTN</small></label>
                                    <input type="text" id="folio_qty" name="folio_qty" class="form-control">
                                </div>
                            </div>
                            <br>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="empresa"><small>Tipo de Producto:</small></label>
                                    <select name="tipo_pr" id="tipo_pr" class="form-control selectpicker show-tick" required="required" data-ajax="marca">
                                        <option value="" disabled selected>Seleccione..</option>
                                        <?php foreach ($dataTipoProducto as $tipoProoducto) { ?>
                                            <option value="<?= $tipoProoducto->id ?>"><?= $tipoProoducto->nombre ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="marca"><small>Marca:</small></label>
                                    <select name="marca" id="marca" class="form-control selectpicker show-tick" data-live-search='true'>
                                        <option value="" disabled selected>--</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="pais"><small>País:</small></label>
                                    <select name="pais" id="pais" class="form-control selectpicker show-tick" data-live-search='true' data-ajax="puerto">
                                        <option value="" disabled selected>Seleccione..</option>
                                        <?php foreach ($dataPais as $pais) { ?>
                                            <option value="<?= $pais->id ?>"><?= $pais->nombre ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="puerto"><small>Puerto:</small></label>
                                    <select name="puerto" id="puerto" class="form-control selectpicker show-tick" data-live-search='true'>
                                        <option value="" disabled selected>--</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4  col-md-4">
                                    <label for="" class="control-label"><small>Proveedor</small></label>
                                    <div class="row">
                                        <div class="col-xs-10 col-md-10" style="padding-right:0 !important">
                                            <input type="text" class="form-control" readonly name="proveedor" id="proveedor">
                                            <input type="hidden" name="provee_int_id" id="provee_int_id" class="form-control" value="">
                                            <small id="helpId" class="text-muted text-justify">Haga doble clic en la casilla para buscar un proveedor</small>
                                        </div>
                                        <div class="col-xs-2 col-md-1">
                                            <button type="button" id="btn_addProvider" class="btn btn-primary">
                                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-3">
                                    <label class="control-label" for=""><small>#Orden</small></label>
                                    <input id="nro_orden" name="nro_orden" class="form-control" type="text">
                                </div>
                                <div class="col-lg-2 col-md-3">
                                    <label class="control-label" for=""><small>Fecha/Compra</small></label>
                                    <input id="fecha_compra" name="fecha_compra" class="form-control" type="date">
                                </div>
                                <div class="col-lg-2 col-md-3">
                                    <label class="control-label" for=""><small>#Factura</small></label>
                                    <input id="nro_factura" name="nro_factura" class="form-control" type="text">
                                </div>
                                <div class="col-lg-2 col-md-3">
                                    <label class="control-label" for=""><small>Fecha/Factura</small></label>
                                    <input id="fecha_factura" name="fecha_factura" class="form-control" type="date">
                                </div>
                            </div>
                            <div class="col-md-12 top">
                                <button type="button" id="btn_saveOrder" class="btn btn-primary" name="btn_saveOrder" value="Insertar">Guardar </button>
                                <button type="reset" class="btn btn-default">Limpiar</button>
                                <a href="index.php?menu=13" class="btn btn-warning" id="hide"><i class="glyphicon glyphicon-chevron-left"></i></a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- Aqui incluyo el html basico del modal -->
<?php include_once("modal.php"); ?>
<!-- /Aqui incluyo el html basico del modal -->
<script src="js_sg/importaciones.js?<?= substr(time(), -5) ?>" language="Javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js?<?= substr(time(), -5) ?>"></script>
