<?php
  include "../../../Funciones/BD.php";

$id_category = $_POST ['id_category'];
// echo "--->".$id_category;
if (isset($_POST['id_category'])){
    $sql16="SELECT pr.produ_id,
     mr.mar_id,
      mr.mar_nombre,
      deta.produ_deta_id, 
     deta.produ_deta_codigo,
      deta.produ_deta_nombre, 
      deta.produ_neu_ancho_inter, 
      deta.produ_neu_aro,
       deta.produ_neu_uso, 
      deta.sunat 
      FROM sys_producto pr , sys_produ_detalle deta , sys_marca mr
    where pr.produ_id = deta.produ_deta_id 
    AND pr.mar_id = mr.mar_id 
    AND mr.mar_id = '$id_category'";
         $result=mysqli_query($con, $sql16);

if ($result->num_rows > 0) {
  echo "<option value='0' selected>--</option>";
  if($row16=mysqli_fetch_array($result,MYSQLI_ASSOC)     ){
    do{
      echo '<option value="'. $row16['produ_deta_id'].'" title="' . $row16['produ_deta_nombre']. '" >'. $row16['produ_deta_codigo'].'</option>';
      } while($row16=mysqli_fetch_array($result,MYSQLI_ASSOC));
    }
  }
  echo $html;
}





