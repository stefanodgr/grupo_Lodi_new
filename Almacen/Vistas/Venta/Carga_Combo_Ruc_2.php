<?php
  include "../../../Funciones/BD.php";
 $html ="";
 $resultAte ="";
$id_category = $_POST ['id_category'];
// echo "--->".$id_category;


if (isset($_POST['id_category'])){
    // $sql25="SELECT cli_id,cli_ndoc FROM 'sys_clientes_proveedores' WHERE cli_id =3057";
    // echo "---->".$id_category;
    $sql26="select * from sys_clientes_proveedores_datos where cli_id='$id_category'";
         $resultAte=mysqli_query($con,$sql26);
  if ($resultAte->num_rows > 0) {
    // echo "<option value='0' selected>Añadir</option>";
    if( $row26=mysqli_fetch_array($resultAte,MYSQLI_ASSOC)     ){
      do{
        // echo ' <input  id="atencion" value="'.$row26['dat_id'].'"  >';
        echo '<option selected value="'.$row26['dat_id'].'">'.$row26['dat_atencion'].'</option>';
        } while($row26=mysqli_fetch_array($resultAte,MYSQLI_ASSOC));
      }
    }else{
      echo "<option     selected  >N/A</option>";
      echo '<option  id="crear"  value="crear"  >Añadir</option>';
    }
    
}


?>
