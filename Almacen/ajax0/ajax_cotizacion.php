<?php

if (
  isset($_SERVER['HTTP_X_REQUESTED_WITH'])
  && !empty($_SERVER['HTTP_X_REQUESTED_WITH'])
  && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
)
{

  require_once("../../Funciones/BD.php");
  header('Content-type:application/json');
  //echo json_encode(array($_GET));
  $buscar = (isset($_GET["buscar"])) ? $_GET["buscar"] : null;
  switch ($buscar) {
    case "nrcotizacion":
      $sqlCodigo  = "SELECT CONCAT('0',(CASE WHEN COUNT(coti_id) IS NULL THEN '1' ELSE COUNT(coti_id)+1 END)) AS CODIGO FROM sys_cotizacion";
      $rsqCOD     = mysqli_query($con, $sqlCodigo);
      $rsqCO      = mysqli_fetch_array($rsqCOD, MYSQLI_ASSOC);
      $idCodigo   = $rsqCO['CODIGO'];
      echo json_encode($idCodigo);
      break;
    default:
      ;
      break;
  }
  //var_dump($con);
  // $sqlCodigo  = "SELECT CONCAT('0',(CASE WHEN COUNT(produ_clasi_id) IS NULL THEN '1' ELSE COUNT(produ_clasi_id)+1 END)) AS CODIGO FROM sys_producto where produ_clasi_id='1'";
  // $rsqCOD     = mysqli_query($con, $sqlCodigo);
  // $rsqCO      = mysqli_fetch_array($rsqCOD, MYSQLI_ASSOC);
  // $idCodigo   = $rsqCO['CODIGO'];
}

?>