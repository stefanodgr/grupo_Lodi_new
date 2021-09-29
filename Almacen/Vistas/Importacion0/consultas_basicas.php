<?php
error_reporting(E_ERROR|E_PARSE);
//Consultas precargadas
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
$sqlFolder="";
$strSelect = "SELECT fld.impor_id fld_id,fld.*,clasif.produ_clasi_desc, pais.pais_nombre,port.puerto_nombre, prov_int.provee_int_desc, brand.mar_nombre";
$strFrom = "FROM sys_impor_folder fld
        inner join sys_pais pais on fld.pais_id = pais.pais_id
        inner join sys_puerto port on fld.impor_puerto = port.puerto_id
        inner join sys_provee_int prov_int on fld.provee_int_id = prov_int.provee_int_id
        inner join sys_produ_clasi clasif on fld.produ_clasi_id = clasif.produ_clasi_id
        inner join sys_marca brand on fld.mar_id = brand.mar_id";
$strWhere = " where 1 = 1";


if (isset($_GET["fld_id"])) {
    $strSelect.= ",
    aduana.impor_aduana_agencia,aduana.impor_aduana_dua,aduana.impor_aduana_fecha_num,aduana.impor_aduana_canal,aduana.impor_aduana_fecha_almacen,aduana.impor_aduana_nro_ctn,
	poliza.impor_poliza_fob, poliza.impor_poliza_flete,poliza.impor_poliza_suma_aseg,poliza.impor_poliza_referencia,poliza.impor_poliza_vig_desde,poliza.impor_poliza_vig_hasta,poliza.impor_poliza_nro_poliza,poliza.impor_poliza_aplicacion,poliza.impor_poliza_tasa,poliza.impor_poliza_prima_neta,poliza.impor_poliza_prima_total,
	orden.*
    ";
    $strFrom .= " left join sys_impor_aduana aduana on fld.impor_id = aduana.impor_id
        left join sys_impor_poliza poliza on fld.impor_id = poliza.impor_id
        left join sys_impor_orden orden on fld.impor_id = orden.impor_id ";
    $strWhere .= " and fld.impor_id = '" . $_GET["fld_id"] . "'";
}

$sqlFolder = "$strSelect
$strFrom
$strWhere";
// echo $sqlFolder;

$resultadoFolder = mysqli_query($con, $sqlFolder);
$dataFolder = array();
if ($resultadoAlmacen) {
    while ($unfolder = mysqli_fetch_object($resultadoFolder)) {
        unset($unfolder->impor_id);
        $dataFolder[] = $unfolder;
    }
    if (isset($_GET["fld_id"])) {
        $dataFolder = $dataFolder[0];
        // print_r("<pre>".var_export($dataFolder,true)."</pre>");
        if($dataFolder->impor_orden_linea !=null){
            $sqlNave = "SELECT nave_id id ,nave_nombre nombre
                            FROM sys_nave
                            where linea_id ='$dataFolder->impor_orden_linea'";
            $resultadoNave = mysqli_query($con, $sqlNave);
            $dataNave = array();
            if ($resultadoNave) {
                while ($unNave = mysqli_fetch_object($resultadoNave)) {
                    $dataNave[] = $unNave;
                }
            }
        }

        $sqlImporpagos = "
        select *
        from sys_impor_pago
        where impor_id = '". $dataFolder->fld_id."'
        ";

        //echo $sqlImporpagos;
        $resultadoPago = mysqli_query($con, $sqlImporpagos);
        $dataPago = array();
        if ($resultadoPago) {
            while ($unpago = mysqli_fetch_object($resultadoPago)) {
                $dataPago[] = $unpago;
            }
        }
    }
}

if (isset($_GET["fld_id"])) {
    $sqlMarca = "select mar_id id ,mar_nombre nombre from sys_marca where mar_estatus = 1 and mar_nombre <> '' and produ_clasi_id = '{$dataFolder->produ_clasi_id}'";
    $resultadoMarca = mysqli_query($con, $sqlMarca);
    $dataMarca = array();
    if ($resultadoMarca) {
        while ($unaMarca = mysqli_fetch_object($resultadoMarca)) {
            $dataMarca[] = $unaMarca;
        }
    }

    //consulta de puertos
    $sqlPuerto = "select puerto_id id ,puerto_nombre nombre from sys_puerto where pais_id = '{$dataFolder->pais_id}'";
    // echo $sqlPuerto;
    $resultadoPuerto = mysqli_query($con, $sqlPuerto);
    $dataPuerto = array();
    if ($resultadoPuerto) {
        while ($unaPuerto = mysqli_fetch_object($resultadoPuerto)) {
            $dataPuerto[] = $unaPuerto;
        }
    }

    $sqlProveedor = "select * from sys_provee_int where provee_int_id='{$dataFolder->provee_int_id}'";
    $resultaProveedor = mysqli_query($con, $sqlProveedor);
    if ($resultaProveedor) {
        $dataResponse = array();
        while ($unProveedor = mysqli_fetch_object($resultaProveedor)) {
            $dataProveedor = $unProveedor;
        }
        //echo $dataProveedor->provee_int_desc;
    }
}

if(isset($product_type)){
    $sqlMarca = "select mar_id id ,mar_nombre nombre from sys_marca where mar_estatus = 1 and mar_nombre <> '' and produ_clasi_id = '$product_type'";
    $resultadoMarca = mysqli_query($con, $sqlMarca);
    $dataMarca = array();
    if ($resultadoMarca) {
        while ($unaMarca = mysqli_fetch_object($resultadoMarca)) {
            $dataMarca[] = $unaMarca;
        }        
    }
}
