<?php
  include "../../../Funciones/BD.php";

$id_category = $_POST ['id_category'];
if (isset($_POST['id_category'])){
    $sql19="select * from sys_modelo where mar_id='$id_category'";
         $result=mysqli_query($con,$sql19);

if ($result->num_rows > 0) {
  echo "<option value='' selected>--</option>";
  if( $row19=mysqli_fetch_array($result,MYSQLI_ASSOC)     ){
    do{
      echo '<option value="'.$row19['mod_id'].'">'.$row19['mod_nombre'].'</option>';
      } while($row19=mysqli_fetch_array($result,MYSQLI_ASSOC));
    }
  }
  // echo "<option value='' onclick='DivNewMarcaDisplay(1);'>NUEVO MARCA</option>";
  echo $html;
}
?>