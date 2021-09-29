
<ol class="breadcrumb">
  <?php
 if ($url<>''){
   if ($url=='1' ) {  $var='Configuraci&oacute;n'; $tipo='Productos'; $det='Datos';}
   if ($url=='4' or $url=='6') {  $var='Configuraci&oacute;n'; $tipo='Marcas'; $det='Datos';}
   if ($url=='5') {  $var='Configuraci&oacute;n'; $tipo='Marcas'; $det='Operaciones';}
    if ($url=='19' or $url=='17') {  $var='Ventas'; $tipo='Cotizaci&oacute;n'; $det='Datos';}
    if ($url=='13' or $url=='14') {  $var='Compras'; $tipo='Importaciones'; $det='Datos';}
}

?>
<li><a href="index.php" class="btn btn-sm btn-default"><i class="fa fa-home"></i> </a></li>
<li ><a href="#" class="black">&nbsp;<strong><?php echo $var; ?></strong></a></li>
<li><a href="#"  class="black">&nbsp;<strong><?php echo $tipo; ?></strong></a></li>
<li><a href="#" class="black">&nbsp;<strong><?php echo $det; ?></strong></a></li>

</ol>
