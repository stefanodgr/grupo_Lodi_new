<?php
include "../../../Funciones/BD.php";
$html ="";
$id_category = '1';
echo "-PHP-->".$id_category;
if (isset($_POST['id_category'])){
    $sql29="select * from sys_produ_existente where produ_deta_id='$id_category'";
    $result=mysqli_query($con,$sql29);
    if ($result->num_rows > 0) {
      if( $row29=mysqli_fetch_array($result,MYSQLI_ASSOC)     ){
        do{
          echo '<option value="'.$row29['produ_deta_id'].'">'.$row29['produ_exi_costo'].'</option>';
          } while($row29=mysqli_fetch_array($result,MYSQLI_ASSOC));
        }
    }
}

