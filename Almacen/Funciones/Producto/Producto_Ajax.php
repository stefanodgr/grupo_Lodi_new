<?php 
header("Content-type:application/json");
error_reporting(E_ERROR | E_PARSE);
include_once dirname(dirname(dirname(dirname(__FILE__))))."/Funciones/BD.php";

 /*
  Seccion Consultas dinamicas (ajax)
  */
  $resultado = array();
	  switch($_GET["buscar"]){
	  	case "p": //buscar provincias
	  		$sql = "select produ_cate_id codigo,produ_cate_desc nombre from sys_produ_cate where produ_clasi_id='".$_GET["id"]."'";
	  		$result_cate=mysqli_query($con,$sql);
	  		$cont = 0;
  			while ($unaCate = mysqli_fetch_assoc($result_cate)) {
  					$resultado[] = $unaCate;
  			    $cont++;
  			}
	  		break;
	  	// case "d": //buscar distritos
	  	// // echo "aqui";
	  	// 	$sql = "select ubigeo codigo,distrito nombre from sys_ubigeo where upper(departamento)='".strtoupper($_GET["depa"])."' and upper(provincia) = '".strtoupper($_GET["prov"])."'";
	  	// 	 //echo $sql;
	  	// 	 $result_ubigeo=mysqli_query($con,$sql);
	  	// 	 $cont = 0;
  		// 	while ($unaUbigeo = mysqli_fetch_assoc($result_ubigeo)) {
  		// 			$resultado[] = $unaUbigeo;
  		// 	    $cont++;
  		// 	}
	  	// 	break;	
	  }
	  echo json_encode($resultado);
?>