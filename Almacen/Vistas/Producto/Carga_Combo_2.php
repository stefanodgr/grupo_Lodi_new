<?php
  include "../../../../Funciones/BD.php";

$id_category = $_POST['id_category'];
if (isset($_POST['id_category'])){
    $sql="select * from sys_produ_neu where mod_id='$id_category'";
         $result=mysqli_query($con,$sql);

if ($result->num_rows > 0) {
  echo "<option value='0'>--</option>";
  if( $row1=mysqli_fetch_array($result,MYSQLI_ASSOC)     ){
    do{
      echo '<option value="'.$row1['produ_neu_id'].'">'.$row1['produ_neu_codigo'].'</option>';
      } while($row1=mysqli_fetch_array($result,MYSQLI_ASSOC));
    }
  }
  echo $html;
}
?>