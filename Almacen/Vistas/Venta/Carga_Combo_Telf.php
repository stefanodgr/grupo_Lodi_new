<?php
  include "../../../Funciones/BD.php";
 $html ="";
$id_category = $_POST ['id_category'];
// echo "--->".$id_category;


if (isset($_POST['id_category'])){
    // $sql25="SELECT cli_id,cli_ndoc FROM 'sys_clientes_proveedores' WHERE cli_id =3057";
    // echo "---->".$id_category;
    $sql28="select * from sys_clientes_proveedores_datos where dat_id='$id_category'";
         $result=mysqli_query($con,$sql28);
  if ($result->num_rows > 0) {
    
    // echo "<option value='0' selected>--</option>";
    if( $row28=mysqli_fetch_array($result,MYSQLI_ASSOC)     ){
      do{
        echo '<option value="'.$row28['dat_id'].'">'.$row28['dat_telefono'].'</option>';
        } while($row28=mysqli_fetch_array($result,MYSQLI_ASSOC));
      }
    }else{
      echo "<option     selected  >N/A</option>";
      echo '<option  id="crear"  value="crear"  >Añadir</option>';
    }
}

