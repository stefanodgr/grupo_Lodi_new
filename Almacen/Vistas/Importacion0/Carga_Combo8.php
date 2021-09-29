<?php
  include "../../../Funciones/BD.php";

$id_category = $_POST ['id_category'];
if (isset($_POST['id_category'])){
    $sql22="select * from sys_marca where produ_clasi_id='$id_category'";
         $result=mysqli_query($con,$sql22);

if ($result->num_rows > 0) {
  echo "<option value='' selected>--</option>";
  if( $row22=mysqli_fetch_array($result,MYSQLI_ASSOC)     ){
    do{
      echo '<option value="'.$row22['mar_id'].'">'.$row22['mar_nombre'].'</option>';
      } while($row22=mysqli_fetch_array($result,MYSQLI_ASSOC));
    }
  }
  // echo "<option value='' onclick='DivNewMarcaDisplay(1);'>NUEVO MARCA</option>";
  echo $html;
}
?>