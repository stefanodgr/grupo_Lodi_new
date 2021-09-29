<?php
  include "../../../Funciones/BD.php";

$id_category = $_POST ['id_category'];
echo "--->".$id_category;
if (isset($_POST['id_category'])){
    $sql14="select * from sys_modelo where mar_id='$id_category'";
         $result=mysqli_query($con,$sql14);

if ($result->num_rows > 0) {
  echo "<option value='0' selected>--</option>";
  if( $row14=mysqli_fetch_array($result,MYSQLI_ASSOC)     ){
    do{
      echo '<option value="'.$row14['mod_id'].'">'.$row14['mod_nombre'].'</option>';
      } while($row14=mysqli_fetch_array($result,MYSQLI_ASSOC));
    }
  }
  echo "<option value='0' onclick='DivNewNeuDisplay(2);'>NUEVO MODELO</option>";
  echo $html;
}
?>