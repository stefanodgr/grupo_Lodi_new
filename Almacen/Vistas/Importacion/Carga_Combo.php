<?php
  include "../../../Funciones/BD.php";

$id_category = $_POST ['id_category'];
if (isset($_POST['id_category'])){
    $sql14="select * from sys_puerto where pais_id='$id_category'";
         $result=mysqli_query($con,$sql14);

if ($result->num_rows > 0) {
  echo "<option value='' selected>--</option>";
  if( $row14=mysqli_fetch_array($result,MYSQLI_ASSOC)     ){
    do{
      echo '<option value="'.$row14['puerto_id'].'">'.$row14['puerto_nombre'].'</option>';
      } while($row14=mysqli_fetch_array($result,MYSQLI_ASSOC));
    }
  }
  echo "<option value='' onclick='DivNewPuertoDisplay(1);'>NUEVO PUERTO</option>";
  echo $html;
}
?>