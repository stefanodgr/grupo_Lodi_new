<?php
  include "../../../Funciones/BD.php";

$id_category = $_POST ['id_category'];
if (isset($_POST['id_category'])){
    $sql15="select * from sys_nave where linea_id='$id_category'";
         $result=mysqli_query($con,$sql15);

if ($result->num_rows > 0) {
  echo "<option value='0' selected>--</option>";
  if( $row15=mysqli_fetch_array($result,MYSQLI_ASSOC)     ){
    do{
      echo '<option value="'.$row15['nave_id'].'">'.$row15['nave_nombre'].'</option>';
      } while($row15=mysqli_fetch_array($result,MYSQLI_ASSOC));
    }
  }
  echo "<option value='0' onclick='DivNewNaveDisplay();'>NUEVA NAVE</option>";
  echo $html;
}
?>