<?php
error_reporting(E_ERROR | E_PARSE);
// echo "<h1>" . var_dump(strrpos($_SERVER['REQUEST_URI'], "Almacen")) . "</h1>";
$accion = (isset($_GET["accion"])) ? $_GET["accion"] : "listar";
$buscar = (isset($_GET["buscar"])) ? $_GET["buscar"] : null;
// $valor = (isset($_GET["valor"])) ? (is_array(json_decode($_GET["valor"]))) ?  json_decode($_GET["valor"]: $_GET["valor"] : null;
$valor = null;
if(isset($_GET["valor"])){
    // print_r("<pre>" . var_export(json_decode($_GET["valor"]), true) . "</pre>");
    if(!is_null(json_decode($_GET["valor"])) && is_object(json_decode($_GET["valor"]))){
        $valor = json_decode($_GET["valor"]);
    }else{
        $valor = $_GET["valor"];
    }
}
$search = (isset($_GET["search"])) ? $_GET["search"] : null;
$procesar = (isset($_GET["procesar"])) ? $_GET["procesar"] : null;
$opcion = (isset($_GET["opcion"])) ? $_GET["opcion"] : null;

//print_r("<pre>".var_export($_SERVER,true)."</pre>");

if (
    isset($_SERVER['HTTP_X_REQUESTED_WITH'])
    && !empty($_SERVER['HTTP_X_REQUESTED_WITH'])
    && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
) {
    //incluir BD
    include_once '../../Funciones/BD.php';
    header("Content-type:application/json", 200);
    if ($accion == "ajax") {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
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
                            $dataResponse = array();
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
                        $sqlProviders = "SELECT provee_int_id id, provee_int_desc razonsocial,provee_int_telf telf,provee_int_contacto contacto FROM sys_provee_int WHERE 1 = 1 ";
                        if(isset($search["value"]) and !empty($search["value"])){
                            $sqlProviders.= " and (UPPER(provee_int_desc) like UPPER('%".$search["value"]."%')";
                            $sqlProviders.= " OR UPPER(provee_int_contacto) like UPPER('%".$search["value"]."%')";
                            $sqlProviders.= " OR UPPER(provee_int_telf) like UPPER('%".$search["value"]."%'))";
                        }//*/ buscador de proveedores

                        //echo $sqlProviders;
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
                            header("Content-type:text/html", 400);
                            echo "<hr>" . mysqli_error($con);
                            echo json_encode(false);
                        }
                        break;
                    case "getProvider":
                        $sqlProveedor = "select * from sys_provee_int where provee_int_id='$valor'";
                        $resultaProveedor = mysqli_query($con, $sqlProveedor);
                        if ($resultaProveedor) {
                            $dataResponse = array();
                            $dataResponse["codigo"] = 200;
                            while ($unProveedor = mysqli_fetch_object($resultaProveedor)) {
                                $dataProveedor["data"] = $unProveedor;
                            }
                            header("Content-type:application/json", 200);
                            echo json_encode($dataProveedor);
                        } else {
                            header("Content-type:application/json", 422);
                            //echo json_encode(false);
                        }
                        break;
                    case "modelo":
                        //consulta de tipos de producto
                        //echo $valor["pais_id"];
                        // $sqlProducto = "select produ_id from sys_producto where pais_id = '".$valor->pais_id."' and produ_clasi_id = '".$valor->produ_clasi_id."' and mar_id = '".$valor->valor."' and mod_id <> 0";
                        $sqlProducto = "select count(if(mod_id <> 0 and mar_id = ". $valor->valor.",1,null)) as con_modelo, count(if(mod_id = 0 and mar_id = ". $valor->valor.",1,null)) as sin_modelo from sys_producto where pais_id = '".$valor->pais_id."' and produ_clasi_id = '".$valor->produ_clasi_id."'";
                        $resultadoProducto = mysqli_query($con, $sqlProducto);
                        $dataResponse = array();
                        if($resultadoProducto){
                            $dataResponse["code"]=200;
                            while ($unModelo = mysqli_fetch_object($resultadoProducto)) {
                                // la consulta para saber si un tipo de producto de una marca tiene mas de un registro con modelo ó 
                                //una marca no tiene producto registrado hay que mostrar el select de modelo
                                $dataResponse["model"] = (($unModelo->con_modelo > 0 || $unModelo->con_modelo == 0 ) && ($unModelo->sin_modelo == 0)) ? true : false;
                            }
                        }
                        if($dataResponse["model"]){
                            $sqlmodelo = "SELECT mod_id id, mod_nombre nombre from sys_modelo where mod_estatus = 1 and mar_id = '" . $valor->valor . "'";
                            // echo $sqlmodelo;
                            $resultadoModelo = mysqli_query($con, $sqlmodelo);
                            $dataModelo = array();
                            if ($resultadoModelo) {
                                while ($unModelo = mysqli_fetch_object($resultadoModelo)) {
                                    $dataModelo[] = $unModelo;
                                }
                            }
                            $dataResponse["data"] = $dataModelo; 
                        }
                        
                        header("Content-type:application/json", 200);
                        echo json_encode($dataResponse);
                        break;
                    case "listProducts":
                        // exit(var_export($_GET,true));
                        $start = $_GET["start"];
                        $length = $_GET["length"];
                        $columns = $_GET["columns"];
                        $sqlProducto = "SELECT prdet.produ_deta_codigo sku,prdet.produ_deta_nombre nombre , brand.mar_nombre marca , IF(prd.mod_id <> 0, model.mod_nombre,'N/A') modelo, prdet.produ_deta_id id
                            from sys_producto prd
                                inner join sys_produ_detalle prdet on prd.produ_id = prdet.produ_deta_id 
                                inner join sys_marca brand on prd.mar_id = brand.mar_id
                                left join sys_modelo model on prd.mod_id = model.mod_id
                            where prd.produ_clasi_id = '".$valor."'";
                        if (isset($search["value"]) and !empty($search["value"])) {
                            $sqlProducto .= " and (UPPER(prdet.produ_deta_codigo) like '%" . strtoupper($search["value"]) . "%'";
                            $sqlProducto .= " or UPPER(prdet.produ_deta_nombre) like '%" . strtoupper($search["value"]) . "%')";
                        }

                        foreach ($columns as $column) {
                            foreach ($column as $key => $val) {
                                if($key== "search" and is_array($column[$key]) and !empty($column[$key]["value"])){
                                    $valor = str_replace("\\","",str_replace("^","",str_replace("$","", $column[$key]["value"])));
                                    $sqlProducto .= " and (UPPER(prdet.produ_deta_codigo) like '%" . strtoupper($valor) . "%'";
                                    $sqlProducto .= " or UPPER(prdet.produ_deta_nombre) like '%" . strtoupper($valor) . "%'";
                                    $sqlProducto .= " or UPPER(brand.mar_nombre) like '%" . strtoupper($valor) . "%'";
                                    $sqlProducto .= " or UPPER(model.mod_nombre) like '%" . strtoupper($valor) . "%')";
                                }
                            }
                        }
                        
                        //buscador de productos

                        //echo $sqlProducto;
                        //file_put_contents("sqlAjaxProductos ".date("dmy His").".sql",$sqlProducto);
                        
                        $resultadoPrducto = mysqli_query($con, $sqlProducto);
                        $dataProduct = array();

                        if ($resultadoPrducto) {
                            $dataProduct = array(
                                "recordsTotal" => mysqli_num_rows($resultadoPrducto),
                                "recordsFiltered" => mysqli_num_rows($resultadoPrducto),
                                "data" => array()
                            );
                            while ($unProducto = mysqli_fetch_assoc($resultadoPrducto)) {
                                $unProducto["acciones"] = "<a class='btn btn-warning btn-sm' href='javascript:loadProduct(". $unProducto["id"].")'><i class='glyphicon glyphicon-check'></i></a>";
                                $dataProduct["data"][] = $unProducto;
                            }
                            $data_page = array_splice($dataProduct["data"],$start,$length);
                            $dataProduct["data"] = $data_page;
                            header("Content-type:application/json", 200);
                            echo json_encode($dataProduct);
                        } else {
                            header("Content-type:text/html", 400);
                            echo "<hr>".mysqli_error($con);
                            echo json_encode(false);
                        }
                        break;
                    case "getProduct":
                        $sqlProducto = "SELECT prdet.produ_deta_codigo sku,prdet.produ_deta_nombre nombre , brand.mar_nombre marca , IF(prd.mod_id <> 0, model.mod_nombre,'N/A') modelo, prdet.produ_deta_id id
                            from sys_producto prd
                                inner join sys_produ_detalle prdet on prd.produ_id = prdet.produ_deta_id 
                                inner join sys_marca brand on prd.mar_id = brand.mar_id
                                left join sys_modelo model on prd.mod_id = model.mod_id
                            where prd.produ_id = '" . $valor . "'";

                        $resultaProducto = mysqli_query($con, $sqlProducto);
                        if ($resultaProducto) {
                            $dataResponse = array();
                            $dataResponse["codigo"] = 200;
                            while ($unProducto = mysqli_fetch_object($resultaProducto)) {
                                $dataProducto["data"] = $unProducto;
                            }
                            header("Content-type:application/json", 200);
                            echo json_encode($dataProducto);
                        } else {
                            header("Content-type:application/json", 422);
                            //echo json_encode(false);
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
            }
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
            switch ($procesar) {
                case "frm_marca":
                    switch ($opcion) {
                        case "i":
                            $nombre = strtoupper(trim($_POST["nombre"]));
                            $tipo_pro = $_POST["tipo_prod"];
                            $activo = $_POST["status"];
                            $strInsert = "INSERT INTO sys_marca (mar_nombre, mar_estatus, produ_clasi_id) VALUES ('$nombre', $activo, $tipo_pro)";
                            $resultado = mysqli_query($con, $strInsert);
                            //si guarda el registro
                            if (mysqli_affected_rows($con) == 1) {
                                //obtener el ultimo registro completo
                                $sqlLastRecord = "select * from sys_marca where mar_id=(SELECT LAST_INSERT_ID())";
                                $resultNewProvider = mysqli_query($con, $sqlLastRecord);
                                //si se obtiene el ultimo registro
                                if ($resultNewProvider) {
                                    $dataResponse = array();
                                    $dataResponse["code"] = 200;
                                    //convertir los datos del registro en un dataJsonResponse
                                    while ($unProvider = mysqli_fetch_object($resultNewProvider)) {
                                        $dataResponse["data"] = $unProvider;
                                    }
                                    $dataResponse["message"] = "Registro Exitoso";
                                    header("content-type:application/json", 200);
                                    echo json_encode($dataResponse);
                                } else {
                                    //sino se obtuvo el ultimo registro devolver error
                                    header("content-type:text/plain", null, 500);
                                    echo json_encode("Ha ocurrido al obtener los datos del nuevo proveedor");
                                }
                            }
                            break;
                    }
                    break;
                case "frm_modelo":
                    switch ($opcion) {
                        case "i":
                            $nombre = strtoupper(trim($_POST["nombre"]));
                            $marca = $_POST["brand"];
                            $tipo_pro = $_POST["tipo_prod"];
                            $activo = $_POST["status"];
                            $strInsert = "INSERT INTO sys_modelo (mod_nombre, mod_estatus, mar_id) VALUES ('$nombre', $activo, $marca)";
                            $resultado = mysqli_query($con, $strInsert);
                            //si guarda el registro
                            if (mysqli_affected_rows($con) == 1) {
                                //obtener el ultimo registro completo
                                $sqlLastRecord = "select * from sys_marca where mar_id=(SELECT LAST_INSERT_ID())";
                                $resultNewProvider = mysqli_query($con, $sqlLastRecord);
                                //si se obtiene el ultimo registro
                                if ($resultNewProvider) {
                                    $dataResponse = array();
                                    $dataResponse["code"] = 200;
                                    //convertir los datos del registro en un dataJsonResponse
                                    while ($unProvider = mysqli_fetch_object($resultNewProvider)) {
                                        $dataResponse["data"] = $unProvider;
                                    }
                                    $dataResponse["message"] = "Registro Exitoso";
                                    header("content-type:application/json", 200);
                                    echo json_encode($dataResponse);
                                } else {
                                    //sino se obtuvo el ultimo registro devolver error
                                    header("content-type:text/plain", null, 500);
                                    echo json_encode("Ha ocurrido al obtener los datos del nuevo proveedor");
                                }
                            }
                            break;
                    }
                    break;
                case "frm_puerto":
                    switch ($opcion) {
                        case "i":
                            $nombre = strtoupper(trim($_POST["nombre"]));
                            $pais = $_POST["pais"];
                            $strInsert = "INSERT INTO sys_puerto (puerto_nombre,pais_id) VALUES ('$nombre', $pais)";
                            $resultado = mysqli_query($con, $strInsert);
                            //si guarda el registro
                            if (mysqli_affected_rows($con) == 1) {
                                //obtener el ultimo registro completo
                                $sqlLastRecord = "select * from sys_puerto where puerto_id=(SELECT LAST_INSERT_ID())";
                                $resultNewProvider = mysqli_query($con, $sqlLastRecord);
                                //si se obtiene el ultimo registro
                                if ($resultNewProvider) {
                                    $dataResponse = array();
                                    $dataResponse["code"] = 200;
                                    //convertir los datos del registro en un dataJsonResponse
                                    while ($unProvider = mysqli_fetch_object($resultNewProvider)) {
                                        $dataResponse["data"] = $unProvider;
                                    }
                                    $dataResponse["message"] = "Registro Exitoso";
                                    header("content-type:application/json", 200);
                                    echo json_encode($dataResponse);
                                } else {
                                    //sino se obtuvo el ultimo registro devolver error
                                    header("content-type:text/plain", null, 500);
                                    echo json_encode("Ha ocurrido al obtener los datos del nuevo proveedor");
                                }
                            }else{
                                header("content-type:text/html", 500);
                                echo json_encode(mysqli_error($con)."<br>".$strInsert);
                            }
                            break;
                    }
                    break;
                case "frm_provider":
                    switch ($opcion) {
                        case "i":
                            $formulario = $_POST;
                            $sqlInsert = "INSERT INTO sys_provee_int (provee_int_desc,provee_int_telf,provee_int_telf2,provee_int_contacto,provee_int_direc,provee_int_email)";
                            $formulario["direccion"] = preg_replace('/u([\da-fA-F]{4})/', '&#x\1;', $formulario["direccion"]);
                            $sqlInsert .= "VALUES ('" . $formulario["descripcion"] . "','" . $formulario["telf"] . "','" . $formulario["telf_contacto"] . "','" . $formulario["contacto"] . "','" . $formulario["direccion"] . "','" . $formulario["email"] . "')";
                            $resultInsert = mysqli_query($con, $sqlInsert);
                            //si guarda el registro
                            if (mysqli_affected_rows($con) == 1) {
                                //obtener el ultimo registro completo
                                $sqlLastRecord = "select *from sys_provee_int where provee_int_id=(SELECT LAST_INSERT_ID())";
                                $resultNewProvider = mysqli_query($con, $sqlLastRecord);
                                //si se obtiene el ultimo registro
                                if ($resultNewProvider) {
                                    $dataResponse = array();
                                    $dataResponse["code"] = 200;
                                    //convertir los datos del registro en un dataJsonResponse
                                    while ($unProvider = mysqli_fetch_object($resultNewProvider)) {
                                        $dataResponse["data"] = $unProvider;
                                    }
                                    $dataResponse["message"] = "Registro Exitoso";
                                    header("content-type:application/json", 200);
                                    echo json_encode($dataResponse);
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
                    }
                    break;
                case "frm_orden":
                    switch ($opcion) {
                        case "i":
                            $formulario = $_POST;
                            $sqlInsert = "INSERT INTO sys_impor_folder (emp_id,produ_clasi_id,impor_folder,impor_nrfolder,impor_inco,impor_tipo,impor_qty,mar_id,pais_id,impor_puerto,provee_int_id)";
                            $sqlInsert .= "VALUES ({$formulario['empresa']},{$formulario['tipo_pr']},'{$formulario['xfolder']}','{$formulario['xnrfolder']}','{$formulario['folio_incoterm']}','{$formulario['folio_tipo_ctn']}','{$formulario['folio_qty']}',{$formulario['marca']},{$formulario['pais']},{$formulario['puerto']},{$formulario['provee_int_id']});";
                            $resultInsert = mysqli_query($con, $sqlInsert);
                            //si guarda el registro
                            if (mysqli_affected_rows($con) == 1) {
                                $dataResponse = array();
                                $dataResponse["code"] = 200;
                                $dataResponse["message"] = "Registro Exitoso";
                                header("content-type:application/json", 200);
                                echo json_encode($dataResponse);
                            } else {
                                //sino guarda el proveedor, devolver el error
                                header("content-type:text/html", null, 500);
                                echo json_encode("Ha ocurrido un error al guardar la orden de importación<br>".mysqli_error($con)."<br>$sqlInsert");
                            }
                            break;
                    }
                    break;
                case "frm_importacion":
                    switch ($opcion) {
                        case "i":
                            $formulario = $_POST;
                            //print_r("<pre>" . var_export($formulario, true) . "</pre>");
                            //Insertar en sys_impor_produ

                            $deleteProducts  = "DELETE FROM SYS_IMPOR_PRODU WHERE IMPOR_ID = {$formulario["formDataOrden"]["impor_id"]}";
                            $resultadoDeleteProd = mysqli_query($con, $deleteProducts);

                            $maxProducts = 1;
                            for ($i = 1; $i <= 45; $i++) {
                                 if(!isset($formulario["formDataProducts"]["brands_".$i])){
                                     $maxProducts = $i - 1;
                                     break;
                                 }                              
                            }
                            $dataResponse = array();
                            $continuar = true;
                            $errorBd = "";
                            for($j = 1;$j<= $maxProducts;$j++){
                                $sqlInsertProductos = "INSERT INTO sys_impor_produ (impor_produ_nombre, impor_produ_cantidad, impor_produ_precio_uni, impor_produ_descuento, impor_produ_precio_total,impor_id,produ_deta_id)";
                                $sqlInsertProductos.= " VALUES('". $formulario["formDataProducts"]["products_" . $j]."', '".$formulario["formDataProducts"]["qty_products_" . $j]."', '". $formulario["formDataProducts"]["unit_price_" . $j]."', '". $formulario["formDataProducts"]["discounts_" . $j]."', '". $formulario["formDataProducts"]["total_amount_line_" . $j]."',". $formulario["formDataOrden"]["impor_id"] .",'". $formulario["formDataProducts"]["produ_id_" . $j]."');";
                                $resultInsertProducts = mysqli_query($con, $sqlInsertProductos);
                                if (mysqli_affected_rows($con) != 1) { 
                                    //print($sqlInsertProductos);
                                    $errorBd  =mysqli_error($con);
                                    $continuar = false;
                                    break;
                                }
                            }

                            if($continuar){
                                $formDataOrden = (object) $formulario["formDataOrden"];
                                // print_r("<pre>".var_export($formDataOrden,true)."</pre>");
                                $arrData = [
                                    "impor_orden_number"=>"'".$formDataOrden->nro_orden."'",
                                    "impor_orden_fech_com" => "'".date("Y-m-d",strtotime($formDataOrden->fecha_compra))."'",
                                    "impor_orden_pro" => "'".$formDataOrden->nro_proforma."'",
                                    "impor_orden_fech_pro" => "'".date("Y-m-d", strtotime($formDataOrden->fecha_proforma))."'",
                                    "impor_orden_factura" =>"'".$formDataOrden->nro_factura."'",
                                    "impor_orden_fech_factura" => "'".date("Y-m-d",strtotime($formDataOrden->fecha_factura))."'",
                                    "impor_orden_monto" =>"'".$formDataOrden->xordMontoTotal."'",
                                    "impor_orden_flete" => "'".$formDataOrden->xordFleteCNT."'",
                                    "impor_orden_thc" => "'".$formDataOrden->xordTHC."'",
                                    "impor_orden_adv" => "'".$formDataOrden->xordADV."'",
                                    "impor_orden_bl" => "'".$formDataOrden->xordBl."'",
                                    "impor_orden_forwa" => "'".$formDataOrden->fowarder."'",
                                    "impor_orden_tipo" => "'".$formDataOrden->tipo_despacho."'",
                                    "impor_orden_linea" => "'".$formDataOrden->linea."'",
                                    "impor_orden_nave" => "'".$formDataOrden->nave."'",
                                    "impor_orden_etd" => "'".date("Y-m-d",strtotime($formDataOrden->etd))."'",
                                    "impor_orden_eta" => "'".date("Y-m-d",strtotime($formDataOrden->eta))."'",
                                    "impor_orden_fech_sobre" => "'".date("Y-m-d",strtotime($formDataOrden->libre_estadia))."'",
                                    "impor_orden_fech_alma" => "'".date("Y-m-d",strtotime($formDataOrden->libre_almacen))."'",
                                    "impor_orden_alma" => "'".$formDataOrden->almacen."'",
                                    "impor_id" => "'{$formDataOrden->impor_id}'"
                                ];
                                $deleteOrden  = "DELETE FROM sys_impor_orden WHERE IMPOR_ID = {$formulario["formDataOrden"]["impor_id"]}";
                                $resultadoDeleteOrden = mysqli_query($con, $deleteOrden);
                                $sqlInsertOrden = "INSERT INTO globi.sys_impor_orden (".implode(",",array_keys($arrData)).") VALUES (".implode(",",array_values($arrData)).");";
                                // print_r("<pre>" . var_export($sqlInsertOrden, true) . "</pre>");
                                // echo $sqlInsertOrden;
                                // exit();
                                $resultImporOrden = mysqli_query($con, $sqlInsertOrden);
                                // print_r(mysqli_affected_rows($con)."<hr>");
                                if(mysqli_affected_rows($con) == 1){
                                    $formDataPoliza = (object)$formulario["formDataSeguro"];
                                    $arrDataPoliza = [
                                        "impor_poliza_fob"=>"'{$formDataPoliza->seg_fob_total}'",
                                        "impor_poliza_flete"=>"'{$formDataPoliza->seg_flete_total}'",
                                        "impor_poliza_suma_aseg"=>"'{$formDataPoliza->seg_suma_aseg}'",
                                        "impor_poliza_referencia"=>"'{$formDataPoliza->referencia}'",
                                        "impor_poliza_nro_poliza"=>"'{$formDataPoliza->nro_poliza}'",
                                        "impor_poliza_tasa"=>"'{$formDataPoliza->seg_tasa}'",
                                        "impor_poliza_vig_desde"=>"'{$formDataPoliza->fecha_poliza_ini}'",
                                        "impor_poliza_vig_hasta"=>"'{$formDataPoliza->fecha_poliza_fin}'",
                                        "impor_poliza_nro_poliza"=>"'{$formDataPoliza->nro_poliza}'",
                                        "impor_poliza_aplicacion"=>"'{$formDataPoliza->aplicacion}'",
                                        "impor_poliza_prima_neta"=>"'{$formDataPoliza->seg_prima_neta}'",
                                        "impor_poliza_prima_total"=>"'{$formDataPoliza->seg_prima_total}'",
                                        "impor_id"=>"'{$formDataOrden->impor_id}'",
                                    ];
                                    $deletePoliza  = "DELETE FROM sys_impor_poliza WHERE IMPOR_ID = {$formulario["formDataOrden"]["impor_id"]}";
                                    $resultadoDeletePoliza = mysqli_query($con, $deletePoliza);

                                    $sqlInsertPoliza = "INSERT INTO sys_impor_poliza (".implode(',',array_keys($arrDataPoliza)).") VALUES (". implode(',', array_values($arrDataPoliza)).")";
                                    $resultadoImporPoliza = mysqli_query($con,$sqlInsertPoliza);
                                    if(mysqli_affected_rows($con) == 1){
                                        $formDataAduana = (object)$formulario["formDataAduana"];
                                        $arrDataAduana = [
                                            "impor_aduana_agencia" => "'{$formDataAduana->impor_aduana_agencia}'",
                                            "impor_aduana_dua" => "'{$formDataAduana->impor_aduana_dua}'",
                                            "impor_aduana_fecha_num" => "'{$formDataAduana->impor_aduana_fecha_num}'",
                                            "impor_aduana_canal" => "'{$formDataAduana->impor_aduana_canal}'",
                                            "impor_aduana_fecha_almacen" => "'{$formDataAduana->impor_aduana_fecha_almacen}'",
                                            "impor_aduana_nro_ctn" => "'{$formDataAduana->impor_aduana_nro_ctn}'",
                                            "impor_id" => "'{$formDataOrden->impor_id}'",
                                        ];
                                        $deleteAduana  = "DELETE FROM sys_impor_aduana WHERE IMPOR_ID = {$formulario["formDataOrden"]["impor_id"]}";
                                        $resultadoDeleteAduana = mysqli_query($con, $deleteAduana);

                                        $sqlInsertPoliza = "INSERT INTO sys_impor_aduana (" . implode(',', array_keys($arrDataAduana)) . ") VALUES (" . implode(',', array_values($arrDataAduana)) . ")";
                                        $resultadoImporPoliza = mysqli_query($con, $sqlInsertPoliza);
                                        if (mysqli_affected_rows($con) == 1) {
                                            //Aqui guardas los historicos de pago
                                            $deletePagos  = "DELETE FROM sys_impor_pago WHERE IMPOR_ID = {$formulario["formDataOrden"]["impor_id"]}";
                                            $resultadoDeletePagos = mysqli_query($con, $deletePagos);

                                            $strpagos = "payment_amount_";
                                            $formDataPayments =$formulario["formDataPayment"];
                                            $continuar = true;
                                            for($k = 1; $k<= 100; $k ++){
                                                if(isset($formDataPayments["payment_amount_" . $k])){
                                                    $sqlInsertPagos = "INSERT INTO globi.sys_impor_pago (impor_pago_monto,impor_pago_fecha,impor_id)";
                                                    $sqlInsertPagos .= " VALUES (".$formDataPayments["payment_amount_".$k].",'". $formDataPayments["payment_date_" . $k]."',{$formDataOrden->impor_id})";
                                                    //print("$sqlInsertPagos <hr>");
                                                    $resultadoImporPago = mysqli_query($con, $sqlInsertPagos);
                                                    if (mysqli_affected_rows($con) != 1) {
                                                        $continuar = false;
                                                        break;
                                                    } 
                                                }

                                            }

                                            if($continuar){
                                                $dataResponse["code"] = 200;
                                                $dataResponse["message"] = "registro Exitoso";
                                                header("content-type:application/json", 200);
                                                echo json_encode($dataResponse);
                                            }else{
                                                $dataResponse["code"] = 500;
                                                $dataResponse["message"] = "Ha ocurrido un error en el proceso de guardar la aduana: ";
                                                $dataResponse["sql"] = $sqlInsertPoliza;
                                                $dataResponse["sqlError"] = mysqli_error($con);
                                                header("content-type:application/json", 500);
                                                echo json_encode($dataResponse);
                                            }

                                        }else{
                                            $dataResponse["code"] = 500;
                                            $dataResponse["message"] = "Ha ocurrido un error en el proceso de guardar la aduana: ";
                                            $dataResponse["sql"] = $sqlInsertPoliza;
                                            $dataResponse["sqlError"] = mysqli_error($con);
                                            header("content-type:application/json", 500);
                                            echo json_encode($dataResponse);
                                        }
                                    }else{
                                        $dataResponse["code"] = 500;
                                        $dataResponse["message"] = "Ha ocurrido un error en el proceso de guardar poliza: ";
                                        $dataResponse["sql"] = $sqlInsertPoliza;
                                        $dataResponse["sqlError"] = mysqli_error($con);
                                        header("content-type:application/json", 500);
                                        echo json_encode($dataResponse);
                                    }
                                }else{
                                    // print_r($sqlInsertOrden);
                                    $dataResponse["code"] = 500;
                                    $dataResponse["message"] = "Ha ocurrido un error en el proceso: ";
                                    $dataResponse["sql"] = $sqlInsertOrden;
                                    $dataResponse["sqlError"] = mysqli_error($con);

                                    header("content-type:application/json", 500);
                                    echo json_encode($dataResponse);
                                }
                            }else{
                                $dataResponse["code"]=500;
                                $dataResponse["message"]="ha ocurrido un error al guardar los productos:";
                                $dataResponse["sql"] = $sqlInsertProductos;
                                $dataResponse["sqlError"] = mysqli_error($con);
                                header("content-type:application/json", 200);
                                echo json_encode($dataResponse);
                            }


                            

                            // $sqlInsertProductos = "INSERT INTO globi.sys_impor_produ
                            // (impor_produ_nombre, impor_produ_cantidad, impor_produ_precio_uni, impor_produ_descuento, impor_produ_precio_total)
                            // VALUES('', '', '', '', '');";
                            // $sqlInsert = "INSERT INTO sys_impor_folder (emp_id,produ_clasi_id,impor_folder,impor_nrfolder,impor_inco,impor_tipo,impor_qty,mar_id,pais_id,impor_puerto,provee_int_id)";
                            // $sqlInsert .= "VALUES ({$formulario['empresa']},{$formulario['tipo_pr']},'{$formulario['xfolder']}','{$formulario['xnrfolder']}','{$formulario['folio_incoterm']}','{$formulario['folio_tipo_ctn']}','{$formulario['folio_qty']}',{$formulario['marca']},{$formulario['pais']},{$formulario['puerto']},{$formulario['provee_int_id']});";
                            // $resultInsert = mysqli_query($con, $sqlInsert);
                            // //si guarda el registro
                            // if (mysqli_affected_rows($con) == 1) {
                            //     $dataResponse = array();
                            //     $dataResponse["code"] = 200;
                            //     $dataResponse["message"] = "Registro Exitoso";
                            //     header("content-type:application/json", 200);
                            //     echo json_encode($dataResponse);
                            // } else {
                            //     //sino guarda el proveedor, devolver el error
                            //     header("content-type:text/html", null, 500);
                            //     echo json_encode("Ha ocurrido un error al guardar la orden de importación<br>" . mysqli_error($con) . "<br>$sqlInsert");
                            // }
                            break;
                    }
                    break;

                break;
            }
        }
    }
}
