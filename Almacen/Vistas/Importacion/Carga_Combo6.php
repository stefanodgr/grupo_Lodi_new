<?php
  include "../../../Funciones/BD.php";

$id_category = $_POST ['id_category'];
if (isset($_POST['id_category'])){
    $sql20="SELECT pr.produ_id,deta.produ_deta_id,deta.produ_deta_codigo,mode.mod_id
    FROM
    globi.sys_modelo mode, globi.sys_produ_detalle deta , globi.sys_producto pr   
    where pr.produ_id = deta.produ_deta_id and pr.mod_id = mode.mod_id ='$id_category'";
         $result=mysqli_query($con,$sql20);

if ($result->num_rows > 0) {
  echo "<option value='' selected>--</option>";
  if( $row20=mysqli_fetch_array($result,MYSQLI_ASSOC)     ){
    do{
      echo '<option value="'.$row20['produ_deta_id'].'">'.$row20['produ_deta_codigo'].'</option>';
      } while($row20=mysqli_fetch_array($result,MYSQLI_ASSOC));
    }
  }
  // echo "<option value='' onclick='DivNewMarcaDisplay(1);'>NUEVO MARCA</option>";
  echo $html;
}
?>