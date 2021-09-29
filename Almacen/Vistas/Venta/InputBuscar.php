<?php
include "../Funciones/BD.php";

?>

<form accept-charset="utf-8" method="POST">
  <input type="text" name="busqueda" id="busqueda" value="" placeholder="" maxlength="30" autocomplete="off" onKeyUp="buscar();" />
</form>
<div id="resultadoBusqueda"></div>
<script>
  $(document).ready(function() {
    $("#resultadoBusqueda").html('<p>JQUERY VACIO</p>');
  });

  function buscar() {
    var textoBusqueda = $("input#busqueda").val();

    if (textoBusqueda != "") {
      $.post("Vistas/Venta/buscar.php", {
        valorBusqueda: textoBusqueda
      }, function(mensaje) {
        $("#resultadoBusqueda").html(mensaje);
      });

  } else {
    $("#resultadoBusqueda").html('<p>JQUERY VACIO</p>');
  };
  };
</script>