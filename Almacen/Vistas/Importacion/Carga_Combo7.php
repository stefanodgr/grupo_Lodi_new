<?php
  include "../../../Funciones/BD.php";

$id_category = $_POST ['id_category'];
if (isset($_POST['id_category'])){
    $sql21="SELECT pr.produ_id,deta.produ_deta_id,deta.produ_deta_codigo,mar.mar_id
    FROM
    globi.sys_marca mar, globi.sys_produ_detalle deta , globi.sys_producto pr   
    where pr.produ_id = deta.produ_deta_id and pr.mar_id = mar.mar_id ='$id_category'";
         $result=mysqli_query($con,$sql21);

if ($result->num_rows > 0) {
  echo "<option value='' selected>--</option>";
  if( $row21=mysqli_fetch_array($result,MYSQLI_ASSOC)     ){
    do{
      echo '<option value="'.$row21['produ_deta_id'].'">'.$row21['produ_deta_codigo'].'</option>';
      } while($row21=mysqli_fetch_array($result,MYSQLI_ASSOC));
    }
  }
  // echo "<option value='' onclick='DivNewMarcaDisplay(1);'>NUEVO MARCA</option>";
  echo $html;
}
?>