

<?php
  include "Config/Head.php";
 ?>
 <div id="page-wrapper">
<div class="header">
        <h6 class="page-header" >

        </h6>


</div>
    <div id="page-inner">
      <div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
      <h2 class="black" >
        <strong ><?php
            $h_titulo='MODULO: ALMACEN  '.$nom_emp;
           echo '<i class="fa fa-desktop fa-fw"></i> '.$h_titulo;
          ?>
        </strong>
  </h2><hr class="new5" />
  <?php
   $url=$_GET['menu'];
   include "Config/Sitemap.php";
   ?>

  </div>
</div>
      <?php
          switch ($url){
                  case '':  include "Admin_home.php"; break;
                  #PRODUCTO
                  case '1': include "Vistas/Producto/V_Producto.php";break;
                  case '2':include "Funciones/Producto/Producto.php";break;
                  case '3':include "Vistas/Producto/E_Producto.php";break;
                  #MODULOS
                  case '4':  include "Vistas/Marca/V_Marca.php"; break;
                  case '5':  include "Funciones/Marca/Marca.php"; break;
                  case '6':  include "Vistas/Marca/E_Marca.php"; break;
                  #USARIOS
                  case '7':  include "Vistas/Modelo/E_Modelo.php"; break;
                  case '8':  include "Funciones/Modelo/Modelo.php"; break;
                  // case '9':  include "Vistas/Usuarios/E_Usuarios.php"; break;
                  #IMPORTACIONES
                  //case '10': include "Vistas/Importacion/V_Importacion.php"; break;
                  case '11': include "Funciones/Importacion/Importacion.php"; break;
                  case '12': include "Funciones/Importacion/form_importaciones.php"; break;
                  #TASA
                  case '13':  include "Vistas/Importacion/lista_importaciones_diseño.php"; break;
                  case '14':  include "Vistas/Importacion/form_importaciones_editar_diseño.php"; break;
                  case '15':  include "Vistas/Importacion/V_Importacion_fecha.php"; break;
                  case '16': include  "Vistas/Importacion/V_Importacion_pago.php"; break;
                  #EMPRESA

                  // case '16': include "Funciones/Empresas/Empresa.php"; break;
                  case '17': include "Vistas/Venta/V_Cotizacion.php"; break;
                 //
                  case '19':include "Vistas/Venta/V_Cotizacion_pantalla.php"; break;


 }
?>
      </div>
    </div>
<?php
  include "Config/Footer.php";

?>
