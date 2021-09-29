<?php
error_reporting(E_ERROR | E_PARSE);
// echo "<h1>" . var_dump(strrpos($_SERVER['REQUEST_URI'], "Almacen")) . "</h1>";
$accion = (isset($_GET["accion"])) ? $_GET["accion"] : "listar";
$buscar = (isset($_GET["buscar"])) ? $_GET["buscar"] : null;
$valor = (isset($_GET["valor"])) ? $_GET["valor"] : null;
$search = (isset($_GET["search"])) ? $_GET["search"] : null;
//print_r("<pre>".var_export($_SERVER,true)."</pre>");

/**
 * Seccion para consultas asincronas Ajax
 */

if (
    isset($_SERVER['HTTP_X_REQUESTED_WITH'])
    && !empty($_SERVER['HTTP_X_REQUESTED_WITH'])
    && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
) {
    include_once("../../../Funciones/BD.php");
    //var_dump($con);
    if ($accion == "listData") {
        try {
            header("Content-type:application/json", 200);
            echo json_encode([
                array("data" => array()),
            ]);
        } catch (\Exception $ex) {
            header("Content-type:application/json", 500);
            echo json_encode($ex->getMessage());
        }
    }
    if ($accion == "ajax") {
        //print_r("<pre>" . var_export($_GET, true) . "</pre>");
        if (!empty($buscar)) {
            switch ($buscar) {
                case "marca":
                    //consulta de tipos de producto
                    $sqlMarca = "select mar_id id ,mar_nombre nombre from sys_marca where mar_estatus = 1 and mar_nombre <> '' and produ_clasi_id = '$valor'";
                    $resultadoMarca = mysqli_query($con, $sqlMarca);
                    $dataMarca = array();
                    if ($resultadoMarca) {
                        while ($unaMarca = mysqli_fetch_object($resultadoMarca)) {
                            $dataMarca[] = $unaMarca;
                        }
                        header("Content-type:application/json", 200);
                        echo json_encode($dataMarca);
                    } else {
                        header("Content-type:application/json", 422);
                        //echo json_encode(false);
                    }
                    break;
                case "puerto":
                    //consulta de tipos de producto
                    $sqlMarca = "select puerto_id id ,puerto_nombre nombre from sys_puerto where pais_id = '$valor'";
                    $resultadoMarca = mysqli_query($con, $sqlMarca);
                    $dataMarca = array();
                    if ($resultadoMarca) {
                        while ($unaMarca = mysqli_fetch_object($resultadoMarca)) {
                            $dataMarca[] = $unaMarca;
                        }
                        header("Content-type:application/json", 200);
                        echo json_encode($dataMarca);
                    } else {
                        header("Content-type:application/json", 422);
                        //echo json_encode(false);
                    }
                    break;
                case "proveedor":
                    //echo "aqui";
                    $sqlProveedor = "select provee_int_desc as nombre from sys_provee_int where upper(provee_int_desc) like upper('%$search%')";
                    $resultaProveedor = mysqli_query($con, $sqlProveedor);
                    if ($resultaProveedor) {
                        while ($unProveedor = mysqli_fetch_object($resultaProveedor)) {
                            $dataProveedor[] = $unProveedor->nombre;
                        }
                        header("Content-type:application/json", 200);
                        echo json_encode($dataProveedor);
                    } else {
                        header("Content-type:application/json", 422);
                        //echo json_encode(false);
                    }
                    break;
                case "listDataProveedores":
                    $sqlProviders = "SELECT provee_int_id id, provee_int_desc razonsocial,provee_int_telf telf,provee_int_contacto contacto FROM sys_provee_int";
                    $resultaProveedor = mysqli_query($con, $sqlProviders);
                    $listProviders = array(
                        "recordsTotal" => mysqli_num_rows($resultaProveedor),
                        "recordsFiltered" => mysqli_num_rows($resultaProveedor),
                        "data" => array()
                    );
                    //echo json_encode($listProviders);
                    if ($resultaProveedor) {
                        while ($unProveedor = mysqli_fetch_assoc($resultaProveedor)) {
                            $unProveedor["acciones"] = "<a class='btn btn-warning btn-sm' href='javascript:loadProvider(\"" . $unProveedor["id"] . "\")'><i class='glyphicon glyphicon-check'></i></a>";
                            $listProviders["data"][] = $unProveedor;
                        }


                        header("Content-type:application/json", 200);
                        echo json_encode($listProviders);
                    } else {
                        header("Content-type:application/json", 422);
                        echo json_encode(false);
                    }
                    break;
                case "getProvider":
                    $sqlProveedor = "select * from sys_provee_int where provee_int_id='$valor'";
                    $resultaProveedor = mysqli_query($con, $sqlProveedor);
                    if ($resultaProveedor) {
                        while ($unProveedor = mysqli_fetch_object($resultaProveedor)) {
                            $dataProveedor[] = $unProveedor;
                        }
                        header("Content-type:application/json", 200);
                        echo json_encode($dataProveedor[0]);
                    } else {
                        header("Content-type:application/json", 422);
                        //echo json_encode(false);
                    }
                    break;
                case "modelo":
                    $sqlmodelo = "SELECT mod_id id, mod_nombre nombre from sys_modelo where mod_estatus = 1 and mar_id = '" . $valor . "'";
                    //echo $sqlmodelo;
                    $resultadoModelo = mysqli_query($con, $sqlmodelo);
                    $dataModelo = array();
                    if ($resultadoModelo) {
                        while ($unModelo = mysqli_fetch_object($resultadoModelo)) {
                            $dataModelo[] = $unModelo;
                        }
                        header("Content-type:application/json", 200);
                        echo json_encode($dataModelo);
                    } else {
                        header("Content-type:text/html", 400);
                        echo json_encode(false);
                    }
                    break;
                case "producto":
                    $sqlProducto = "SELECT pr.produ_id id ,deta.produ_deta_id,deta.produ_deta_codigo nombre,mode.mod_id
                        FROM
                        globi.sys_modelo mode, globi.sys_produ_detalle deta , globi.sys_producto pr   
                        where pr.produ_id = deta.produ_deta_id and pr.mod_id = mode.mod_id ='$valor'";
                    $resultadoPrducto = mysqli_query($con, $sqlProducto);
                    $dataProduct = array();
                    if ($resultadoPrducto) {
                        while ($unProduct = mysqli_fetch_object($resultadoPrducto)) {
                            $dataProduct[] = $unProduct;
                        }
                        header("Content-type:application/json", 200);
                        echo json_encode($dataProduct);
                    } else {
                        header("Content-type:text/html", 400);
                        echo mysqli_error($con);
                        echo json_encode(false);
                    }
                    break;
                case "nave":
                    $sqlNave = "SELECT nave_id id ,nave_nombre nombre
                        FROM sys_nave
                        where linea_id ='$valor'";
                    $resultadoNave = mysqli_query($con, $sqlNave);
                    $dataNave = array();
                    if ($resultadoNave) {
                        while ($unNave = mysqli_fetch_object($resultadoNave)) {
                            $dataNave[] = $unNave;
                        }
                        header("Content-type:application/json", 200);
                        echo json_encode($dataNave);
                    } else {
                        header("Content-type:text/html", 400);
                        echo mysqli_error($con);
                        echo json_encode(false);
                    }
                    break;
            }
        } else {
            //acceder al controlador via ajax usando el metodo post
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                header('Content-Type: text/plain; charset=utf-8');
                $formulario = $_POST;
                //validar si en la variable $formulario existe el proveedor
                if (array_key_exists("proveedor", $formulario)) {
                    //ejecutar DML(Inser o update segun el caso)
                    switch ($_GET["exec"]) {
                        case 'insert':
                            //preparar el insert para el nuevo proveedor
                            $sqlInsert = "INSERT INTO sys_provee_int (provee_int_desc,provee_int_telf,provee_int_telf2,provee_int_contacto,provee_int_direc,provee_int_email)";
                            $formulario["proveedor"]["direccion"] = preg_replace('/u([\da-fA-F]{4})/', '&#x\1;', $formulario["proveedor"]["direccion"]);
                            $sqlInsert .= "VALUES ('" . $formulario["proveedor"]["descripcion"] . "','" . $formulario["proveedor"]["telf"] . "','" . $formulario["proveedor"]["telf_contacto"] . "','" . $formulario["proveedor"]["contacto"] . "','" . $formulario["proveedor"]["direccion"] . "','" . $formulario["proveedor"]["email"] . "')";
                            $resultInsert = mysqli_query($con, $sqlInsert);
                            //si guarda el registro
                            if (mysqli_affected_rows($con) == 1) {
                                //obtener el ultimo registro completo
                                $sqlLastRecord = "select *from sys_provee_int where provee_int_id=(SELECT LAST_INSERT_ID())";
                                $resultNewProvider = mysqli_query($con, $sqlLastRecord);
                                //si se obtiene el ultimo registro
                                if ($resultNewProvider) {
                                    $dataResponse = array();
                                    //convertir los datos del registro en un dataJsonResponse
                                    while ($unProvider = mysqli_fetch_object($resultNewProvider)) {
                                        $dataResponse[] = $unProvider;
                                    }
                                    header("content-type:application/json", 200);
                                    echo json_encode($dataResponse[0]);
                                } else {
                                    //sino se obtuvo el ultimo registro devolver error
                                    header("content-type:text/plain", null, 500);
                                    echo json_encode("Ha ocurrido al obtener los datos del nuevo proveedor");
                                }
                            } else {
                                //sino guarda el proveedor, devolver el error
                                header("content-type:text/plain", null, 500);
                                echo json_encode("Ha ocurrido un error al guardar el nuevo proveedor");
                            }

                            break;

                        default:
                            # code...
                            break;
                    }
                }
            }
        }
    }
    exit;
} else {
    include "../Funciones/BD.php";
    /**
     * Seccion de consultas precargadas para la vista
     */
    if ($accion == "crear") {
        //Consulta de empresas
        $sqlEmpresa = "select emp_id id ,emp_nombre nombre from sys_empresas where emp_estatus = 1";
        $resultadoEmpresa = mysqli_query($con, $sqlEmpresa);
        $dataEmpresa = array();
        while ($unaEmpresa = mysqli_fetch_object($resultadoEmpresa)) {
            $dataEmpresa[] = $unaEmpresa;
        }
        //consulta de tipos de producto
        $sqlTipoProducto = "select produ_clasi_id id, produ_clasi_desc nombre from sys_produ_clasi where produ_clasi_estatus = 1";
        $resultadoTipoProducto = mysqli_query($con, $sqlTipoProducto);
        $dataTipoProducto = array();
        while ($unTipoProducto = mysqli_fetch_object($resultadoTipoProducto)) {
            $dataTipoProducto[] = $unTipoProducto;
        }

        //consulta de paises
        $sqlPais = "select pais_id id, pais_nombre nombre from sys_pais where pais_estatus = 1";
        $resultadoPais = mysqli_query($con, $sqlPais);
        $dataPais = array();
        while ($unPais = mysqli_fetch_object($resultadoPais)) {
            $dataPais[] = $unPais;
        }
        //print_r("<pre>".var_export($dataEmpresa,true)."</pre>");

        //consulta de Agentes de Rastreos o Fowarders
        $sqlFowarder = "SELECT forwa_id id,forwa_nombre nombre from sys_forwarder order by forwa_nombre";
        $resultadoFowarder = mysqli_query($con, $sqlFowarder);
        $dataFowarder = array();
        if ($resultadoFowarder) {
            while ($unFowarder = mysqli_fetch_object($resultadoFowarder)) {
                $dataFowarder[] = $unFowarder;
            }
        }

        //consulta de Lineas
        $sqlLinea = "SELECT linea_id id,linea_nombre nombre from sys_linea order by linea_nombre";
        $resultadoLinea = mysqli_query($con, $sqlLinea);
        $dataLinea = array();
        if ($resultadoLinea) {
            while ($unLinea = mysqli_fetch_object($resultadoLinea)) {
                $dataLinea[] = $unLinea;
            }
        }

        //consulta de Almacenes
        $sqlAlmacen = "SELECT almacen_id id,almacen_nombre nombre from sys_almacen_impor order by almacen_nombre";
        $resultadoAlmacen = mysqli_query($con, $sqlAlmacen);
        $dataAlmacen = array();
        if ($resultadoAlmacen) {
            while ($unAlmacen = mysqli_fetch_object($resultadoAlmacen)) {
                $dataAlmacen[] = $unAlmacen;
            }
        }
    }
}
?>

<!-- Lista de datos -->

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

        <div class="panel panel-primary">
            <!-- <div class="panel-heading">
                <h3 class="panel-title">Importaciones</h3>
            </div> -->
            <div class="panel-body">
                <?php if ($accion == "listar") { ?>
                <div class="pull-right">
                    <a href="../Almacen/Index.php?menu=10&accion=crear" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nueva Importacion
                    </a>
                </div>
                <a href="../Almacen/Index.php?menu=10&accion=editar" class="btn btn-primary">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nueva Importacion
                </a>
                <br><br>

                <?php include_once("lista_importaciones.php");
                    // } else if (($accion == "crear") or ($accion == "editar")) {
                } else if ($accion == "crear") { ?>


                <!-- /Lista de datos -->
                <!-- Formularios -->
                <?php
                    // include_once("form_importaciones.php");
                    include_once("form_importaciones_principipal.php");
                } else {
                include_once("form_importaciones.php");

                 } ?>
                <!-- /Formularios -->
            </div>
        </div>

    </div>
</div>

<!-- Seccion de Estilos y scripts -->
<link href="css_sg/general.css?<?= substr(time(), -5) ?>" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css_sg/normalize.css?<?= substr(time(), -5) ?>" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css_sg/main.css?<?= substr(time(), -5) ?>" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="libreria/jquery/css/jquery.steps.css?<?= substr(time(), -5) ?>" rel="stylesheet" type="text/css" />
<style>
    /* #page-wrapper {
        padding: 0 10px;
        min-height: calc(100% - 100%) !important;
        background: #E8E8E8;
    }

    #page-inner {
        width: 100%;
        margin: 10px 20px -5px 0;
        background-color: transparent;
        padding: 20px 30px 0 30px;
        min-height: 90%;
        height: 100% !important;
    } */
</style>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css?<?= substr(time(), -5) ?>"> -->
<script src="js_sg/sistema.js?<?= substr(time(), -5) ?>" language="Javascript"></script>
<script src="libreria/jquery/js/modernizr-2.6.2.min.js?<?= substr(time(), -5) ?>" language="Javascript"></script>
<script src="libreria/jquery/js/jquery-1.9.1.min.js?<?= substr(time(), -5) ?>" language="Javascript"></script>
<script src="libreria/jquery/js/jquery.cookie-1.3.1.js?<?= substr(time(), -5) ?>"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js?<?= substr(time(), -5) ?>"></script>
<script src="libreria/jquery/js/jquery.steps.js?<?= substr(time(), -5) ?>" language="Javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js?<?= substr(time(), -5) ?>"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js?<?= substr(time(), -5) ?>"></script>
<script src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/additional-methods.js"></script>
<!-- jQuery UI -->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css?<?= substr(time(), -5) ?>">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js?<?= substr(time(), -5) ?>"></script>
<script src="js_sg/importacion.js?<?= substr(time(), -5) ?>" language="Javascript"></script>
<script>
    var formProduct = new Array();
    var totalFOB = 0;
    $(function() {
        $("#modal").modal({
            show: false
        });

        if ($("#btn_addproduct").length == 1) {
            $("#btn_addproduct").unbind('click');
            $("#btn_addproduct").on('click', function() {
                if (validarProductFormImport()) {
                    var form = $("#frm_product");
                    dataProduct = convertFormJsonData(form);
                    //console.log(dataProduct);
                    $("#product").find('option').each(function() {
                        if ($(this).prop("selected")) {
                            //console.log($(this).parent().attr('id'), $(this).text());
                            dataProduct.product_name = $(this).text();
                        }
                    });
                    $("#brand").find('option').each(function() {
                        if ($(this).prop("selected")) {
                            //console.log($(this).parent().attr('id'), $(this).text());
                            dataProduct.product_brand_name = $(this).text();
                        }
                    });
                    $("#model").find('option').each(function() {
                        if ($("#product_type").val() == 1) {
                            if ($(this).prop("selected")) {
                                //console.log($(this).parent().attr('id'), $(this).text());
                                dataProduct.product_model_name = $(this).text();
                            } else {
                                //console.log($(this).parent().attr('id'), $(this).text());
                                dataProduct.product_model_name = "";
                            }
                        }
                    });
                    $("#product_type").find('option').each(function() {
                        if ($(this).prop("selected")) {
                            //console.log($(this).parent().attr('id'), $(this).text());
                            dataProduct.product_type_name = $(this).text();
                        }
                    });

                    var htmlRow = "<tr>";
                    var number_rows = parseInt($("#tbl_importaciones_detalle tbody tr").length + 1);
                    var htmlCells = "<td>" + number_rows + "</td>";
                    htmlCells += "<td>" + dataProduct.product_type_name + "<input type='hidden' name='hdn_product_type[]' value='" + dataProduct.product_type + "'></td>";
                    htmlCells += "<td>" + dataProduct.product_brand_name + "<input type='hidden' name='hdn_product_brand[]' value='" + dataProduct.brand + "'></td>";
                    htmlCells += "<td>" + dataProduct.product_model_name + "<input type='hidden' name='hdn_product_model[]' value='" + dataProduct.model + "'></td>";
                    htmlCells += "<td>" + dataProduct.product_name + "<input type='hidden' name='product[]' value='" + dataProduct.product + "'></td>";
                    htmlCells += "<td>" + dataProduct.unit_price + "<input type='hidden' name='unit_price[]' value='" + dataProduct.unit_price + "'></td>";
                    htmlCells += "<td>" + dataProduct.product_qty + "<input type='hidden' name='product_qty[]' value='" + dataProduct.product_qty + "'></td>";
                    htmlCells += "<td>" + dataProduct.discount + "<input type='hidden' name='discount[]' value='" + dataProduct.discount + "'></td>";
                    htmlCells += "<td>" + dataProduct.amount_total + "<input type='hidden' name='amount_total[]' value='" + dataProduct.product_type + "'></td>";
                    htmlCells += "<td>" + dataProduct.product_type_name + "<input type='hidden' name='product_type_name[]' value='" + dataProduct.product_type + "'></td>";
                    htmlCells += "<td><button id='row_" + number_rows + "' class='btn btn-sm btn-danger delete-item'><i class='glyphicon glyphicon-trash'></i></button></td>";
                    htmlRow += htmlCells;
                    htmlRow += "</tr>";

                    $("#tbl_importaciones_detalle tbody").append(htmlRow);
                    formProduct[formProduct.length] = dataProduct;
                    totalFOB = parseFloat(totalFOB) + parseFloat(dataProduct.amount_total);
                    $("#xordMontoTotal").val(totalFOB.toFixed(2));
                    document.getElementById("frm_product").reset();
                    $(".selectpicker").selectpicker('refresh');
                }
            });

        }

        $("#btn_addProvider").on('click', function() {
            $("#modal .modal-title").text('Registrar Proveedor');
            leerFormularios('proveedor');
            $("#modal").modal("show");
        });

        $("input#proveedor").on('dblclick', function() {
            $("#modal .modal-dialog").addClass('modal-lg');
            $("#modal .modal-title").text('Proveedores Actuales');
            leerFormularios('listProveedores');
            $("#modal").modal("show");
        });

        // $('#modal').on('shown.bs.modal', function () {
        //     $('#modal .modal-body').empty();
        // });

        $("#modal").on('hidden.bs.modal', function() {
            //alert('funciona');
            $("#modal .modal-body").html("");
        });

        var incoterm = $("#incoterm").val();
        if (incoterm == "") {
            $("#div_fowarder").removeClass('col-md-2').addClass('col-md-4');
            $("#div_thc").css('display', "none");
            $("#div_adv").css('display', "none");
        }

        $("#incoterm").on('change', function() {
            if ($(this).val() != "") {
                $("#tipo_incoterm").val($(this).val());
                $("#div_fowarder").removeClass('col-md-4').addClass('col-md-2');
                if ($(this).val() == "CFR") {
                    $("#div_thc").show();
                    $("#div_adv").hide();
                } else {
                    $("#div_thc").hide();
                    $("#div_adv").show();
                }
            }
        });
    });
</script>