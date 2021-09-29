
<!-- Bootstrap Js -->
<script src="../assets/js/bootstrap.min.js"></script>

<!-- Metis Menu Js -->
<script src="../assets/js/jquery.metisMenu.js"></script>


<script src="../assets/js/easypiechart.js"></script>
<script src="../assets/js/easypiechart-data.js"></script>
<script src="../assets/js/Lightweight-Chart/jquery.chart.js"></script>
<!-- DATA TABLE SCRIPTS -->
<script src="../assets/js/dataTables/jquery.dataTables.js"></script>
<script src="../assets/js/dataTables/dataTables.bootstrap.js"></script>
<script>
    $(document).ready(function() {
        $('input[type="file"]').bootstrapFileInput();
        $('#dataTables-example').dataTable();
        $('#dataTables-example2').dataTable();
        $('#dataTables-example3').dataTable();
        $('#dataTables-example4').dataTable();
        $('#dataTables-example5').dataTable();
        $('#dataTables-example6').dataTable();
        $('#dataTables-example7').dataTable();

        $("#xmar1").on('change', function() {
            // alert("-----");
            $("#xmar1 option:selected").each(function() {
                var id_category = $(this).val();
                // alert("---->" + id_category);
                $.post("Vistas/Producto/Carga_Combo.php", {
                    id_category: id_category
                }, function(data) {
                    $("#xmod").html(data);
                });
            });
        });


        /* COTIZACIONES ------ VENTAS */

        $("#xmar_coti_neu").on('change', function() {
            // alert("-----");
            $("#xmar_coti_neu option:selected").each(function() {
                var id_category = $(this).val();
                // alert("---->" + id_category);
                $.post("Vistas/Venta/Carga_Combo_1_coti.php", {
                    id_category: id_category
                }, function(data) {
                    $("#xmod_coti_neu").html(data);
                });
            });
        });

        $("#xmod_coti_neu").on('change', function() {
            // alert("-----");
            $("#xmod_coti_neu option:selected").each(function() {
                var id_category = $(this).val();
                // alert("---->" + id_category);
                $.post("Vistas/Venta/Carga_Combo_2_coti.php", {
                    id_category: id_category
                }, function(data) {
                    $("#xpro_coti_neu").html(data);
                });
            });
        });

        $("#xmar_coti_cam").on('change', function() {
            // alert("-----");
            $("#xmar_coti_cam option:selected").each(function() {
                var id_category = $(this).val();
                // alert("---->" + id_category);
                $.post("Vistas/Venta/Carga_Combo_3_coti.php", {
                    id_category: id_category
                }, function(data) {
                    $("#xpro_coti_cam").html(data);
                });
            });
        });

        $("#xmar_coti_aro").on('change', function() {
            // alert("-----");
            $("#xmar_coti_aro option:selected").each(function() {
                var id_category = $(this).val();
                // alert("---->" + id_category);
                $.post("Vistas/Venta/Carga_Combo_3_coti.php", {
                    id_category: id_category
                }, function(data) {
                    $("#xpro_coti_aro").html(data);
                });
            });
        });

        $("#xmar_coti_pro").on('change', function() {
            // alert("-----");
            $("#xmar_coti_pro option:selected").each(function() {
                var id_category = $(this).val();
                // alert("---->" + id_category);
                $.post("Vistas/Venta/Carga_Combo_3_coti.php", {
                    id_category: id_category
                }, function(data) {
                    $("#xpro_coti_pro").html(data);
                });
            });
        });

        $("#xmar_coti_ace").on('change', function() {
            // alert("-----");
            $("#xmar_coti_ace option:selected").each(function() {
                var id_category = $(this).val();
                // alert("---->" + id_category);
                $.post("Vistas/Venta/Carga_Combo_3_coti.php", {
                    id_category: id_category
                }, function(data) {
                    $("#xpro_coti_ace").html(data);
                });
            });
        });


        /* COTIZACIONES ------ VENTAS */

        $("#xmar1").on('change', function() {
            // alert("-----");
            $("#xmar1 option:selected").each(function() {
                var id_category = $(this).val();
                // alert("---->" + id_category);
                $.post("Vistas/Producto/Carga_Combo_edit_mod.php", {
                    id_category: id_category
                }, function(data) {
                    $("#xmod").html(data);
                });
            });
        });


        $("#xpais1").on('change', function() { // STOCK AROS
            // alert("-----");
            $("#xpais1 option:selected").each(function() {
                var id_category = $(this).val();
                //  alert("---->"+id_category);
                $.post("Vistas/Importacion/Carga_Combo.php", {
                    id_category: id_category
                }, function(data) {
                    $("#xpuerto").html(data);
                });
            });
        });

        $("#xclasi").on('change', function() { // STOCK AROS
            // alert("-----");
            $("#xclasi option:selected").each(function() {
                var id_category = $(this).val();
                //  alert("---->"+id_category);
                $.post("Vistas/Importacion/Carga_Combo2.php", {
                    id_category: id_category
                }, function(data) {
                    $("#xmar").html(data);
                });
            });
        });


        $("#xordLinea").on('change', function() {
            // alert("-----");
            $("#xordLinea option:selected").each(function() {
                var id_category = $(this).val();
                //  alert("---->"+id_category);
                $.post("Vistas/Importacion/Carga_Combo3.php", {
                    id_category: id_category
                }, function(data) {
                    $("#xordNave").html(data);
                });
            });
        });


        $("#xTpClasi").on('change', function() {
            // alert("-----");
            $("#xTpClasi option:selected").each(function() {
                var id_category = $(this).val();
                //  alert("---->"+id_category);
                $.post("Vistas/Importacion/Carga_Combo4.php", {
                    id_category: id_category
                }, function(data) {
                    $("#xmarPro").html(data);
                });
            });
        });

        $("#xmarPro").on('change', function() {
            // alert("-----");
            $("#xmarPro option:selected").each(function() {
                var id_category = $(this).val();
                //  alert("---->"+id_category);
                $.post("Vistas/Importacion/Carga_Combo5.php", {
                    id_category: id_category
                }, function(data) {
                    $("#xTpModelo").html(data);
                });
            });
        });

        $("#xTpModelo").on('change', function() {
            // alert("-----");
            $("#xTpModelo option:selected").each(function() {
                var id_category = $(this).val();
                //  alert("---->"+id_category);
                $.post("Vistas/Importacion/Carga_Combo6.php", {
                    id_category: id_category
                }, function(data) {
                    $("#xproducto").html(data);
                });
            });
        });



        $("#xTpClasi").on('change', function() {
            // alert("-----");
            $("#xTpClasi option:selected").each(function() {
                var id_category = $(this).val();
                //  alert("---->"+id_category);
                $.post("Vistas/Importacion/Carga_Combo8.php", {
                    id_category: id_category
                }, function(data) {
                    $("#xmarPro_1").html(data);
                });
            });
        });
        
        $("#resultado").on('change', function() {
            // alert("-----");
            $("#resultado option:selected").each(function() {
                var id_category = $(this).val();
                //  alert("---->"+id_category);
                $.post("Vistas/Venta/Carga_Combo_Ruc.php", {
                    id_category: id_category
                }, function(data) {
                    $("#xcotiruc").html(data);
                    // alert("---->"+id_category);
                });
            });
        });
        
        $("#xcotiruc"). keyup(function() {
      // $("#bruc").focus();
            // alert("-----");
            $("#xcotiruc").each(function() {
                var id_category = $(this).val();
                //  alert("---->"+id_category);
                $.post("Vistas/Venta/Carga_Combo_Ruc_2.php", {
                    id_category: id_category
                }, function(data) {
                    $("#atencion").html(data);
                    // alert("---->"+id_category);
                });
            });
        });

        $("#atencion"). keyup(function() {
        // $("#atencion").on('change', function() {
            $("#atencion").each(function() {
            // $("#").each(function() {
                var id_category = $(this).val();
                //  alert("---->"+id_category);
                $.post("Vistas/Venta/Carga_Combo_Telf.php", {
                    id_category: id_category
                }, function(data) {
                    $("#telf").html(data);
                    // alert("---->"+id_category);
                });
            });
        });

        $("#resul_med_neu"). keyup(function() {
        // $("#atencion").on('change', function() {
            $("#resul_med_neu").each(function() {
            // $("#").each(function() {
                var id_category = $(this).val();
                 alert("-- FOOTER-->"+id_category);
                $.post("Vistas/Venta/Carga_Combo_Punit.php", {
                    id_category: id_category
                }, function(data) {
                    $("#xcotipunit").html(data);
                    alert("--FIN FOTTER-->"+id_category);
                });
            });
        });

     


    });
</script>


<!-- Custom Js -->

<script src="../assets/js/bootstrap.file-input.js"></script>


</body>

</html>
