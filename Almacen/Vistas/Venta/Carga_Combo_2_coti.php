<?php
  include "../../../Funciones/BD.php";

$id_category = $_POST ['id_category'];
// echo "--->".$id_category;
if (isset($_POST['id_category'])){
    $sql15="SELECT pr.produ_id,
     md.mod_id,
      md.mod_nombre,
     deta.produ_deta_id, 
     deta.produ_deta_codigo,
      deta.produ_deta_nombre, 
      deta.produ_neu_ancho_inter, 
      deta.produ_neu_aro,
       deta.produ_neu_uso, 
      deta.sunat 
      FROM sys_producto pr , sys_produ_detalle deta , sys_modelo md 
    where pr.produ_id = deta.produ_deta_id AND pr.mod_id = md.mod_id AND md.mod_id = '$id_category'";
         $result=mysqli_query($con, $sql15);

if ($result->num_rows > 0) {
  echo "<option value='0' selected>--</option>";
  if( $row15=mysqli_fetch_array($result,MYSQLI_ASSOC)     ){
    do{
        echo '<option value="' . $row15['produ_deta_id'] . '" title="' . $row15['produ_deta_nombre'] . '" >' . $row15['produ_deta_codigo'] . '</option>';
      } while($row15=mysqli_fetch_array($result,MYSQLI_ASSOC));
    }
  }
  echo $html;
}





