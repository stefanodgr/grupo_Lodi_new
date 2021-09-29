<?php
if(isset($_POST['txtbusca'])):
	include "../../../Funciones/BD.php";
	 
    $u="SELECT * FROM sys_clientes_proveedores WHERE cli_razon_social LIKE '%".$_POST['txtbusca']."%')";
    $html="";
 foreach ($u as $v){
			$html.="<p>".$v['cli_razon_social']."</p>";
 }
 echo $html;
else:
    echo "Error";
endif;
 ?>
?>


