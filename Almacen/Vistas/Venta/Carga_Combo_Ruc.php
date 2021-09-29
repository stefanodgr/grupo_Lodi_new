<?php
  include "../../../Funciones/BD.php";
 $html ="";
$id_category = $_POST ['id_category'];
// echo "--->".$id_category;
if (isset($_POST['id_category'])){
    // $sql25="SELECT cli_id,cli_ndoc FROM 'sys_clientes_proveedores' WHERE cli_id =3057";
    // echo "---->".$id_category;
    $sql25="select * from sys_clientes_proveedores where cli_razon_social='$id_category'";
         $result=mysqli_query($con,$sql25);

if ($result->num_rows > 0) {
  // echo "<option value='0' selected>--</option>";
  if( $row25=mysqli_fetch_array($result,MYSQLI_ASSOC)     ){
    do{
      echo '<option    value="'.$row25['cli_id'].'" selected>'.$row25['cli_ndoc'].'</option>';
      } while($row25=mysqli_fetch_array($result,MYSQLI_ASSOC));
    }
  }
  
}
