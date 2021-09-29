
$(document).ready(function(){

    $(":input").each(function(){
        $(this).attr('required',true);
    });
      
    $("#add").click(function(){                                 //PRODUCTOS

        var nuevaFila="<tr> \
            <td><input  class='form-control text-uppercase' type='text' name='nombre[]'></td> \
            <td><input  class='form-control text-uppercase' type='text' name='cantidad[]'></td> \
            <td><input  class='form-control text-uppercase' type='text' name='unidad[]'></td> \
            <td><input  class='form-control text-uppercase' type='text' name='precio[]'></td> \
            <td><input  class='form-control text-uppercase' type='text' name='descuento[]'></td> \
            <td><input  class='form-control text-uppercase' type='text' name='precioTotal[]'></td> \
            <td><input  class='btn btn-danger del' type='button'  value='Eliminar'></td> \
            </tr>";
        $("#tabla tbody").append(nuevaFila);
    });

    // evento para eliminar la fila
    $("#tabla").on("click", ".del", function(){
        $(this).parents("tr").remove();
    });


    // $("#btn_reporte").click(function(){
    // //  alert("---->LLEGO");
    //  window.open('Funciones/Producto/Produ_Pro/crearPdf.php'); 
    //         // var rutaReporte = 'Funciones/Producto/Produ_Pro/crearPdf.php';
    //         // formReporte(rutaReporte);
    // });


    $("#btn_guardar").click(function(){

        var xclasi      = $('#xclasi').val(); 
        var xmar1       = $('#xmar1').val();            // TIPO DOCUMENTO
        var xmar2       = $('#xmar2').val();
        var xmar3       = $('#xmar3').val();
        var xmar4       = $('#xmar4').val();

        // alert("---->"+xclasi);
        if (xclasi =="1"){
        alert("llego ------>1");
           if(xmar1 != '0'){
            $('#xmar1').prop('disabled',false);
           }else{
            $('#xmar1').prop('disabled',true);
           }
            
        }else if(xclasi =="2"){
        alert("llegooo------->2");
            if(xmar2 !='0'){
                alert("entrada---2");
                $('#xmar2').prop('disabled',false);
            }else{
                $('#xmar2').prop('disabled',true);
            }
        }else if(xclasi =="3"){
            alert("no llego nada");
            if(xmar3 != '0'){
                $('#xmar3').prop('disabled',false);
            }else{
                $('#xmar3').prop('disabled',true);
            }
        }else if(xclasi =="4"){
            alert("no llego nada");
            if(xmar4 != '0'){
                $('#xmar4').prop('disabled',false);
            }else{
                $('#xmar4').prop('disabled',true);
            }
        }else if(xclasi =="5"){
            alert("no llego nada");
            if(xmar5 != '0'){
                $('#xmar5').prop('disabled',false);
            }else{
                $('#xmar5').prop('disabled',true);
            }
        }else{
           alert("no llega opciones"); 
        }                    
        });
        $("#xordMontoTotal").keyup(function () {
            var value = $(this).val();
            $("#xsegFob").val(value);
        });

});

 // Obtiene los valores de los textbox al dar click en el boton "Enviar"
 var divValue, values = '';

 function GetTextValue() {

     $(divValue).empty(); 
     $(divValue).remove(); values = '';

     $('.input').each(function() {
         divValue = $(document.createElement('div')).css({
             padding:'5px', width:'200px'
         });
         values += this.value + '<br />'
     });

     $(divValue).append('<p><b>Tus valores añadidos</b></p>' + values);
     $('body').append(divValue);

 }


 function someFunction21() {
    setTimeout(function () {
    $('#horizontal-stepper').nextStep();
    }, 2000);
    }
    
function DivOcultarImpor(opc){ // CONTROLA DISPLAY NONE EN LA PANTALLA 

    if(opc=='1'){
    document.getElementById("div_btn_impor").style.display	            = "none";
    document.getElementById("div_consul_importa").style.display	        = "none";
    document.getElementById("div_forms").style.display	                = "block";

    // }else{
    // document.getElementById("div_btn_importacion").style.display	    = "block";
    // document.getElementById("div_consul_importa").style.display	        = "block";
    // document.getElementById("div_forms").style.display	                = "none";   
    // }
    }
}

function limpiarMarca(opc){ // CONTROLA DISPLAY NONE EN LA PANTALLA 
    var opc = document.getElementById("xclasi").value; /*Obtener el SELECT */

    if(opc == "1"){                 //NEUMATICOS
        document.getElementById("div_marca_text").style.display	= "none";
        document.getElementById("div_marca").style.display	    = "block";
    }else if(opc == "2"){
        document.getElementById("div_marca_text").style.display	= "none";
        document.getElementById("div_marca").style.display	    = "block";
    }else if(opc == "3"){
        document.getElementById("div_marca_text").style.display	= "none";
        document.getElementById("div_marca").style.display	    = "block";
    }else if(opc == "4"){
        document.getElementById("div_marca_text").style.display	= "none";
        document.getElementById("div_marca").style.display	    = "block";
    }else if(opc == "5"){
        document.getElementById("div_marca_text").style.display	= "none";
        document.getElementById("div_marca").style.display	    = "block";
    }else{
        alert("Ingrese un Tipo Producto.");
    }
}


function DivNewMarcaDisplay (opc){                                // CREAR NUEVA MARCA Y MODELO
    // alert("---DivMarcaDisplay----");
if(opc=='1'){
    document.getElementById("div_marca_text").style.display	= "block";
    /* DESACTIVAR */
    document.getElementById("div_marca").style.display	    = "none";
    /* COLOCAR CAMPOS DISABLED  */
    // alert("---->DivMarcaDisplay(1)");
}else if(opc=='2'){                             //CREAR NUEVO MODELO

        document.getElementById("div_marca_neu").style.display	    = "none";
        document.getElementById("div_modelo_neu").style.display	    = "block";
        document.getElementById("div_guardar2").style.display	        = "block";

        
        /* DESACTIVAR */
        document.getElementById("div_marca").style.display	    = "block";
        document.getElementById("div_modelo").style.display	    = "none";

}else{
    alert("---->llego opcion3");
    document.getElementById("div_marca_neu").style.display	    = "none";
    document.getElementById("div_modelo_neu").style.display	    = "none";
    document.getElementById("div_guardar2").style.display	    = "none";
    
    /* DESACTIVAR */
    document.getElementById("div_marca").style.display	    = "block";
    document.getElementById("div_modelo").style.display	    = "block";
    /* COLOCAR CAMPOS DISABLED  */
}   
}

function DivNewPuertoDisplay (opc){                                // CREAR NUEVA MARCA Y MODELO
        if(opc=='1'){
            document.getElementById("div_puerto_text").style.display	= "block";
            /* DESACTIVAR */
            document.getElementById("div_puerto").style.display	         = "none";
            /* COLOCAR CAMPOS DISABLED  */
            // alert("---->DivMarcaDisplay(1)");
        }else if(opc=='2'){                             //CREAR NUEVO MODELO

                document.getElementById("div_marca_neu").style.display	    = "none";
                document.getElementById("div_modelo_neu").style.display	    = "block";
                document.getElementById("div_guardar2").style.display	        = "block";

                
                /* DESACTIVAR */
                document.getElementById("div_marca").style.display	    = "block";
                document.getElementById("div_modelo").style.display	    = "none";

        }else{
            document.getElementById("div_marca_neu").style.display	    = "none";
            document.getElementById("div_modelo_neu").style.display	    = "none";
            document.getElementById("div_guardar2").style.display	    = "none";
            
            /* DESACTIVAR */
            document.getElementById("div_marca").style.display	    = "block";
            document.getElementById("div_modelo").style.display	    = "block";
            /* COLOCAR CAMPOS DISABLED  */
        }   
}

function DivIncotermDisplay (opc){                                // FOB Y CFR
        if(opc=='1'){
            document.getElementById("div_adv").style.display	    = "none";
            document.getElementById("div_thc").style.display	    = "block";
        }else{
            document.getElementById("div_adv").style.display	    = "block";
            document.getElementById("div_thc").style.display	    = "none";
        }   
}

function DivForwarderDisplay (){                                // FOB Y CFR

        document.getElementById("div_forwa").style.display	        = "none";
        document.getElementById("div_forwa_text").style.display	    = "block"; 

}

function DivLineaDisplay (){                                // FOB Y CFR

    document.getElementById("div_linea").style.display	        = "none";
    document.getElementById("div_linea_text").style.display	    = "block"; 
    document.getElementById("div_nave").style.display	        = "none";
    document.getElementById("div_nave_text").style.display	    = "block"; 

}

function limpiarNave(opc){ // CONTROLA DISPLAY NONE EN LA PANTALLA 
    // var opc = document.getElementById("xordLinea").value; /*Obtener el SELECT */

    if(opc == '1'){                 //NEUMATICOS
        document.getElementById("div_marca_text").style.display	    = "none";
        document.getElementById("div_marca").style.display	    = "block";
        document.getElementById("div_nave").style.display	        = "none";
        document.getElementById("div_nave_text").style.display	    = "block"; 
    }else{
        alert("Ingrese un Tipo Producto.");
    }
}

function DivNewNaveDisplay (){                                // FOB Y CFR

    document.getElementById("div_nave").style.display	        = "none";
    document.getElementById("div_nave_text").style.display	    = "block"; 
}

function DivAlmacenDisplay (){                                // FOB Y CFR

    document.getElementById("div_almacen").style.display	    = "none";
    document.getElementById("div_alma_text").style.display	    = "block"; 
}

function CmpsOcultarProvee(opc){ // CONTROLA DISPLAY NONE EN LA PANTALLA 
    if(opc=='1'){
        document.getElementById("div_btn_newProvee").style.display	 = "none";
        document.getElementById("div_provee_int").style.display	     = "block";
        document.getElementById("div_provee_impor").style.display	 = "none";
    }else{
    }
}


function CmpsOcultoProducto(opc){ // CONTROLA DISPLAY NONE EN LA PANTALLA 
    var opc = document.getElementById("xTpClasi").value; /*Obtener el SELECT */

    if(opc == "1"){                 //NEUMATICOS
        // alert('1');
        /* ACTIVAR */
        document.getElementById("div_marca_1").style.display	= "block";
        document.getElementById("div_modelo_1").style.display	= "block";
        document.getElementById("div_producto").style.display	= "block";
        /* DESACTIVAR */
        document.getElementById("div_marca_2").style.display	= "none";
        document.getElementById("div_producto_1").style.display	= "none";

        document.getElementById('xmarPro_1').options[0].selected        = 'selected';  /* FILTRO NOMENCLATURA */ 
        document.getElementById('xprodu_marca').options[0].selected     = 'selected';  /* FILTRO NOMENCLATURA */

    }else if(opc == "2"){         //CAMARA
        //  alert('2');
        /* ACTIVAR */
        document.getElementById("div_marca_1").style.display	= "none";
        document.getElementById("div_modelo_1").style.display	= "none";
        document.getElementById("div_producto").style.display	= "none";
        /* DESACTIVAR */
        document.getElementById("div_marca_2").style.display	= "block";
        document.getElementById("div_producto_1").style.display	= "block";

        document.getElementById('xmarPro').options[0].selected       = 'selected';  /* FILTRO NOMENCLATURA */ 
        document.getElementById('xTpModelo').options[0].selected     = 'selected';  /* FILTRO NOMENCLATURA */
        document.getElementById('xproducto').options[0].selected     = 'selected';  /* FILTRO NOMENCLATURA */
    }else if(opc == "3"){       //AROS
        // alert('3');
        /* ACTIVAR */
        document.getElementById("div_marca_1").style.display	= "none";
        document.getElementById("div_modelo_1").style.display	= "none";
        document.getElementById("div_producto").style.display	= "none";
        /* DESACTIVAR */
        document.getElementById("div_marca_2").style.display	= "block";
        document.getElementById("div_producto_1").style.display	= "block";

        document.getElementById('xmarPro').options[0].selected       = 'selected';  /* FILTRO NOMENCLATURA */ 
        document.getElementById('xTpModelo').options[0].selected     = 'selected';  /* FILTRO NOMENCLATURA */
        document.getElementById('xproducto').options[0].selected     = 'selected';  /* FILTRO NOMENCLATURA */
    }else if(opc == "4"){       //PROTECTORES
        // alert('4');
        /* ACTIVAR */
        document.getElementById("div_marca_1").style.display	= "none";
        document.getElementById("div_modelo_1").style.display	= "none";
        document.getElementById("div_producto").style.display	= "none";
        /* DESACTIVAR */
        document.getElementById("div_marca_2").style.display	= "block";
        document.getElementById("div_producto_1").style.display	= "block";

        document.getElementById('xmarPro').options[0].selected       = 'selected';  /* FILTRO NOMENCLATURA */ 
        document.getElementById('xTpModelo').options[0].selected     = 'selected';  /* FILTRO NOMENCLATURA */
        document.getElementById('xproducto').options[0].selected     = 'selected';  /* FILTRO NOMENCLATURA */
    }else if(opc == "5"){       //ACCESORIO
        // alert('5');
        /* ACTIVAR */
        document.getElementById("div_marca_1").style.display	= "none";
        document.getElementById("div_modelo_1").style.display	= "none";
        document.getElementById("div_producto").style.display	= "none";
        /* DESACTIVAR */
        document.getElementById("div_marca_2").style.display	= "block";
        document.getElementById("div_producto_1").style.display	= "block";

        document.getElementById('xmarPro').options[0].selected       = 'selected';  /* FILTRO NOMENCLATURA */ 
        document.getElementById('xTpModelo').options[0].selected     = 'selected';  /* FILTRO NOMENCLATURA */
        document.getElementById('xproducto').options[0].selected     = 'selected';  /* FILTRO NOMENCLATURA */
    }else{
        // alert("Ingrese un Tipo Producto.");
    }
}

// function FormOcultarProdu(opc){ // CONTROLA DISPLAY NONE EN LA PANTALLA 
//     var opc = document.getElementById("xclasi").value; /*Obtener el SELECT */

//     if(opc == "1"){
//         document.getElementById("div_form_neu").style.display	     = "block";       //       NEUMATICOS
//         document.getElementById("div_form_cam").style.display	     = "none";        //       CAMARAS
//         document.getElementById("div_form_aro").style.display	     = "none";        //       AROS
//         document.getElementById("div_form_pro").style.display	     = "none";        //       PROTECTORES
//         document.getElementById("div_form_ace").style.display	     = "none";        //       ACCESORIO
//         document.getElementById("div_guardar").style.display	     = "block";        //       ACCESORIO
//     }else if(opc == "2"){
//         document.getElementById("div_form_neu").style.display	     = "none";        //       NEUMATICOS
//         document.getElementById("div_form_cam").style.display	     = "block";       //       CAMARAS
//         document.getElementById("div_form_aro").style.display	     = "none";        //       AROS
//         document.getElementById("div_form_pro").style.display	     = "none";        //       PROTECTORES
//         document.getElementById("div_form_ace").style.display	     = "none";        //       ACCESORIOs
//         document.getElementById("div_guardar").style.display	     = "block";        //       ACCESORIO
//     }else if(opc == "3"){
//         document.getElementById("div_form_neu").style.display	     = "none";        //       NEUMATICOS
//         document.getElementById("div_form_cam").style.display	     = "none";        //       CAMARAS
//         document.getElementById("div_form_aro").style.display	     = "block";       //       AROS
//         document.getElementById("div_form_pro").style.display	     = "none";        //       PROTECTORES
//         document.getElementById("div_form_ace").style.display	     = "none";        //       ACCESORIOs
//         document.getElementById("div_guardarv").style.display	     = "block";        //       ACCESORIO
//     }else if(opc == "4"){
//         document.getElementById("div_form_neu").style.display	     = "none";        //       NEUMATICOS
//         document.getElementById("div_form_cam").style.display	     = "none";        //       CAMARAS
//         document.getElementById("div_form_aro").style.display	     = "none";        //       AROS
//         document.getElementById("div_form_pro").style.display	     = "block";       //       PROTECTORES
//         document.getElementById("div_form_ace").style.display	     = "none";        //       ACCESORIOs
//         document.getElementById("div_guardar").style.display	     = "block";        //       ACCESORIO
//     }else if(opc == "5"){
//         document.getElementById("div_form_neu").style.display	     = "none";        //       NEUMATICOS
//         document.getElementById("div_form_cam").style.display	     = "none";        //       CAMARAS
//         document.getElementById("div_form_aro").style.display	     = "none";        //       AROS
//         document.getElementById("div_form_pro").style.display	     = "none";        //       PROTECTORES
//         document.getElementById("div_form_ace").style.display	     = "block";       //       ACCESORIOs
//         document.getElementById("div_guardar").style.display	     = "block";        //       ACCESORIO
//     }else{
//         alert("Ingrese una Opcion.");
//     }
// }	

function DivOcultarImporMenu(opc){ // CONTROLA DISPLAY NONE EN LA PANTALLA 

    if(opc=='1'){
    document.getElementById("div_btn_importacion").style.display	    = "none";
    document.getElementById("div_consul_importa").style.display	        = "none";
    document.getElementById("div_nuevo_importa").style.display	        = "block";
    document.getElementById("div_consul_provee").style.display	        = "block";
    document.getElementById("div_info_general").style.display	        = "none";
    document.getElementById("div_info_producto").style.display	        = "none";
    document.getElementById("div_info_seguro").style.display	        = "none";
    document.getElementById("div_info_pagos_proveedor").style.display   = "none";
    document.getElementById("div_info_aduanas").style.display           = "none";
    }else if(opc=='2'){
    document.getElementById("div_btn_importacion").style.display	    = "none";
    document.getElementById("div_consul_importa").style.display	        = "none";
    document.getElementById("div_nuevo_importa").style.display	        = "block";
    document.getElementById("div_consul_provee").style.display	        = "none";
    document.getElementById("div_info_general").style.display	        = "block";
    document.getElementById("div_info_producto").style.display	        = "none";
    document.getElementById("div_info_seguro").style.display	        = "none";
    document.getElementById("div_info_pagos_proveedor").style.display   = "none";
    document.getElementById("div_info_aduanas").style.display           = "none";  
    }else if(opc=='3'){
    document.getElementById("div_btn_importacion").style.display	    = "none";
    document.getElementById("div_consul_importa").style.display	        = "none";
    document.getElementById("div_nuevo_importa").style.display	        = "block";
    document.getElementById("div_consul_provee").style.display	        = "none";
    document.getElementById("div_info_general").style.display	        = "none";
    document.getElementById("div_info_producto").style.display	        = "block";
    document.getElementById("div_info_seguro").style.display	        = "none";
    document.getElementById("div_info_pagos_proveedor").style.display   = "none";
    document.getElementById("div_info_aduanas").style.display           = "none";
    }else if(opc=='4'){
        document.getElementById("div_btn_importacion").style.display	    = "none";
        document.getElementById("div_consul_importa").style.display	        = "none";
        document.getElementById("div_nuevo_importa").style.display	        = "block";
        document.getElementById("div_consul_provee").style.display	        = "none";
        document.getElementById("div_info_general").style.display	        = "none";
        document.getElementById("div_info_producto").style.display	        = "none";
        document.getElementById("div_info_seguro").style.display	        = "block";
        document.getElementById("div_info_pagos_proveedor").style.display   = "none";
        document.getElementById("div_info_aduanas").style.display           = "none";
    }else if(opc=='5'){
        document.getElementById("div_btn_importacion").style.display	    = "none";
        document.getElementById("div_consul_importa").style.display	        = "none";
        document.getElementById("div_nuevo_importa").style.display	        = "block";
        document.getElementById("div_consul_provee").style.display	        = "none";
        document.getElementById("div_info_general").style.display	        = "none";
        document.getElementById("div_info_producto").style.display	        = "none";
        document.getElementById("div_info_seguro").style.display	        = "none";
        document.getElementById("div_info_pagos_proveedor").style.display   = "block";
        document.getElementById("div_info_aduanas").style.display           = "none";

    }else if(opc=='6'){
        alert("---->LLEGO 6");
        document.getElementById("div_btn_importacion").style.display	    = "none";
        document.getElementById("div_consul_importa").style.display	        = "none";
        document.getElementById("div_nuevo_importa").style.display	        = "block";
        document.getElementById("div_consul_provee").style.display	        = "none";
        document.getElementById("div_info_general").style.display	        = "none";
        document.getElementById("div_info_producto").style.display	        = "none";
        document.getElementById("div_info_seguro").style.display	        = "none";
        document.getElementById("div_info_pagos_proveedor").style.display   = "none";
        document.getElementById("div_info_aduanas").style.display           = "block";
    }else{
        //
    }
}











function limpiar(opc){ // CONTROLA DISPLAY NONE EN LA PANTALLA 
    var opc = document.getElementById("xclasi").value; /*Obtener el SELECT */

    if(opc == "1"){
        // document.getElementById("div_form_neu").reset();
        // var old_html = $("#div_form_cam").html();
        // $("#div_form_cam").html(old_html);
        // document.getElementById("div_form_cam").innerHTML="";
    }else if(opc == "2"){
        // var old_html = $("#div_form_neu").html();
        // $("#div_form_neu").html(old_html);
        // document.getElementById("formProducto").reset();
        // document.getElementById("div_form_neu").innerHTML="";
    }else if(opc == "3"){
        // document.getElementById("formProducto").reset();
    }else if(opc == "4"){
        // document.getElementById("formProducto").reset();
    }else if(opc == "5"){
        // document.getElementById("formProducto").reset();
    }else{
    }
}

// function sumar (valor) {
//     var total = 0;	
//     valor = parseInt(valor); // Convertir el valor a un entero (número).
	
//     total = document.getElementById('xsegFlete').innerHTML;
	
//     // Aquí valido si hay un valor previo, si no hay datos, le pongo un cero "0".
//     total = (total == null || total == undefined || total == "") ? 0 : total;
	
//     /* Esta es la suma. */
//     total = (parseInt(total) * parseInt(valor));
	
//     // Colocar el resultado de la suma en el control "span".
//     document.getElementById('xsegFlete').innerHTML = total;
// }


function calculaFleteTotal(){
    alert("-->llego");

    var n1 	= document.getElementById('xqty').value;      		// COSTO DIRECTO
    alert("-->N1-->"+n1);
    var n2 	= document.getElementById('xordFlete').value;		// RESULTADO COSTOS DIRECTO
    alert("-->N1-->"+n2);
    // var n3 	= document.getElementById('ficha_presu_utili').value;		// RESULTADO UTILIDADES

    // if(total== ' '){
    //     total = (total == null || total == undefined || total == "") ? 0 : total;

    //     alert("Falta Cargar Datos");
    // }else{
    //     var total =parseInt(n1) + parseInt(n2) ;
    //     alert("---->TOTAL-->"+total);
    //     document.getElementsByName("xsegFlete")[0].value = total;
    // }
}









/* ---------------------------input---PAGO---------------------------- */

function deleteRow(row)
{
    var i=row.parentNode.parentNode.rowIndex;
    document.getElementById('POITable').deleteRow(i);
}


function insRow()
{
    console.log( 'hi');
    var x=document.getElementById('POITable');
    var new_row = x.rows[1].cloneNode(true);
    var len = x.rows.length;
    new_row.cells[0].innerHTML = len;
    
    var inp1 = new_row.cells[1].getElementsByTagName('input')[0];
    inp1.id += len;
    inp1.value = '';
    var inp2 = new_row.cells[2].getElementsByTagName('input')[0];
    inp2.id += len;
    inp2.value = '';
    x.appendChild( new_row );
}
/* ---------------------------input---PAGO---------------------------- */

// function ShowClasi(){

// /* /* /* Para obtener el valor */
//  var cod = document.getElementById("xclasi").value;
//  //alert(cod);
 
//  /* Para obtener el texto */
//  var combo = document.getElementById("xclasi");
//  var selected = combo.options[combo.selectedIndex].text;
//  document.getElementsByName("xID")[0].value = selected;
//  //alert(selected); 
// }

// function ShowStockPro()
// {

// /* /* /* Para obtener el valor */
//  var cod = document.getElementById("xprotecto").value;
//  //alert(cod);
 
//  /* Para obtener el texto */
//  var combo = document.getElementById("xprotecto");
//  var selected = combo.options[combo.selectedIndex].text;
//  document.getElementsByName("xproNom")[0].value = selected;
//  //alert(selected); 
// }

// function ShowStockCam()
// {

// /* /* /* Para obtener el valor */
//  var cod = document.getElementById("xcamara").value;
//  //alert(cod);
 
//  /* Para obtener el texto */
//  var combo = document.getElementById("xcamara");
//  var selected = combo.options[combo.selectedIndex].text;
//  document.getElementsByName("xcamNom")[0].value = selected;
// // alert(selected); 
// }


// function ShowStockAro()
// {

// /* /* /* Para obtener el valor */
//  var cod = document.getElementById("xaro").value;
//  //alert(cod);
 
//  /* Para obtener el texto */
//  var combo = document.getElementById("xaro");
//  var selected = combo.options[combo.selectedIndex].text;
//  document.getElementsByName("xaroNom")[0].value = selected;
//  //alert(selected); 
// }

// function ShowStockNeu()
// {
// // alert("llego");
// /* /* /* Para obtener el valor */
//  var cod = document.getElementById("xneu").value;
// //  alert(cod);
 
//  /* Para obtener el texto */
//  var combo = document.getElementById("xneu");
//  var selected = combo.options[combo.selectedIndex].text;
// //  var id = combo.options[combo.selectedIndex].text;
//  document.getElementsByName("xneuNom")[0].value = selected;
// //  document.getElementById("xneuID").value = cod;

//  //alert(selected); 
// }

/* EXTRAER NOMBRES MARCAS  */
function ShowMarca1(){
 var combo = document.getElementById("xmar1");
 var selected = combo.options[combo.selectedIndex].text;
 document.getElementsByName("xmarNom1")[0].value = selected;
alert(selected); 
}

function ShowMarca2(){
    var combo = document.getElementById("xmar2");
    var selected = combo.options[combo.selectedIndex].text;
    document.getElementsByName("xmarNom2")[0].value = selected;
   alert(selected); 
}
function ShowMarca3(){
    var combo = document.getElementById("xmar3");
    var selected = combo.options[combo.selectedIndex].text;
    document.getElementsByName("xmarNom3")[0].value = selected;
   alert(selected); 
}
function ShowMarca4(){
    var combo = document.getElementById("xmar4");
    var selected = combo.options[combo.selectedIndex].text;
    document.getElementsByName("xmarNom4")[0].value = selected;
   alert(selected); 
}
function ShowMarca5(){
    var combo = document.getElementById("xmar5");
    var selected = combo.options[combo.selectedIndex].text;
    document.getElementsByName("xmarNom5")[0].value = selected;
   alert(selected); 
}
/* --------------------------------------------------------- */

/*------EXTRAER------NOMBRE-----PAIS */
function ShowPais1(){
 var combo      = document.getElementById("xpais1");
 var selected   = combo.options[combo.selectedIndex].text;
 document.getElementsByName("xpaisNom1")[0].value = selected;
}
function ShowPais2(){
var combo      = document.getElementById("xpais2");
var selected   = combo.options[combo.selectedIndex].text;
document.getElementsByName("xpaisNom2")[0].value = selected;
}
function ShowPais3(){
var combo      = document.getElementById("xpais3");
var selected   = combo.options[combo.selectedIndex].text;
document.getElementsByName("xpaisNom3")[0].value = selected;
}
function ShowPais4(){
var combo      = document.getElementById("xpais4");
var selected   = combo.options[combo.selectedIndex].text;
document.getElementsByName("xpaisNom4")[0].value = selected;
}
function ShowPais5(){
var combo      = document.getElementById("xpais5");
var selected   = combo.options[combo.selectedIndex].text;
document.getElementsByName("xpaisNom5")[0].value = selected;
}

function OptionStepFolio(opc) {

    // opFolio = document.getElementById("opc_folio").value;
    // opProve = document.getElementById("opc_provee").value;
    // $opCam = document.getElementById("opc_cam").value;
    // $opAro = document.getElementById("opc_aro").value;
    // $opPro = document.getElementById("opc_pro").value;
    // $opAce = document.getElementById("opc_ace").value;


    if (opc == '1') {                       //
        // alert('1');
        document.getElementById("div_folio").style.display = "block";
        document.getElementById("div_pro").style.display = "none";
        document.getElementById("div_produ").style.display = "none";
        document.getElementById("div_ord").style.display = "none";
        document.getElementById("div_seg").style.display = "none";
        document.getElementById("div_pag").style.display = "none";
        document.getElementById("div_adu").style.display = "none";


    } 
    if (opc == '2') {                       //
        //  alert('2');
        document.getElementById("div_folio").style.display = "none";
        document.getElementById("div_pro").style.display    = "block";
        document.getElementById("div_produ").style.display = "none";
        document.getElementById("div_ord").style.display = "none";
        document.getElementById("div_seg").style.display = "none";
        document.getElementById("div_pag").style.display = "none";
        document.getElementById("div_adu").style.display = "none";


    } 
    if (opc == '3') {                       //
        // alert('3');
        document.getElementById("div_folio").style.display = "none";
        document.getElementById("div_pro").style.display = "none";
        document.getElementById("div_produ").style.display = "block";
        document.getElementById("div_ord").style.display = "none";
        document.getElementById("div_seg").style.display = "none";
        document.getElementById("div_pag").style.display = "none";
        document.getElementById("div_adu").style.display = "none";


    } 
    if (opc == '4') {                       //
        // alert('4');
        document.getElementById("div_folio").style.display  = "none";
        document.getElementById("div_pro").style.display    = "none";
        document.getElementById("div_produ").style.display  = "none";
        document.getElementById("div_ord").style.display    = "block";
        document.getElementById("div_seg").style.display = "none";
        document.getElementById("div_pag").style.display = "none";
        document.getElementById("div_adu").style.display = "none";

    } 

    if (opc == '5') {                       //
        // alert('5');
        document.getElementById("div_folio").style.display = "none";
        document.getElementById("div_pro").style.display = "none";
        document.getElementById("div_produ").style.display = "none";
        document.getElementById("div_ord").style.display = "none";
        document.getElementById("div_seg").style.display = "block";
        document.getElementById("div_pag").style.display = "none";
        document.getElementById("div_adu").style.display = "none";

    } 

    if (opc == '6') {                       //
        // alert('6');
        document.getElementById("div_folio").style.display = "none";
        document.getElementById("div_pro").style.display = "none";
        document.getElementById("div_produ").style.display = "none";
        document.getElementById("div_ord").style.display = "none";
        document.getElementById("div_seg").style.display = "none";
        document.getElementById("div_pag").style.display = "block";
        document.getElementById("div_adu").style.display = "none";

    } 
    if (opc == '7') {                       //
        // alert('7');
        document.getElementById("div_folio").style.display  = "none";
        document.getElementById("div_pro").style.display    = "none";
        document.getElementById("div_produ").style.display  = "none";
        document.getElementById("div_ord").style.display    = "none";
        document.getElementById("div_seg").style.display    = "none";
        document.getElementById("div_pag").style.display    = "none";
        document.getElementById("div_adu").style.display    = "block";

    } 
}




function divOcul(opc) {
    alert("llego");



    if (opc == '1'){
        document.getElementById("div_consul").style.display     = "none";
        document.getElementById("div_form").style.display       = "block";
        document.getElementById("div_linea").style.display      = "block";
        
        document.getElementById("div_btn_impor").style.display  = "none";
        document.getElementById("titulo2").style.display        = "block";
        document.getElementById("titulo").style.display         = "none";

    }else{

    }
}




/* ------------------------------------------- */

// function ShowMarcaID()
// {
// alert("---->LLEGO");
// // /* /* /* Para obtener el valor */
//  var cod = document.getElementById("xmar").value;
//  alert(cod);
 
// //  /* Para obtener el texto */
// //  var combo = document.getElementById("xmar");
// //  var selected = combo.options[combo.selectedIndex].text;
//  document.getElementsByName("id_mar")[0].value = cod;
// //  alert(selected); 


// }

// function ShowMarCam()
// {

// // /* /* /* Para obtener el valor */
//  var cod = document.getElementById("xmar").value;
//  alert(cod);
 
//  /* Para obtener el texto */
//  var combo = document.getElementById("xmar");
//  var selected = combo.options[combo.selectedIndex].text;
//  document.getElementsByName("xmarNom")[0].value = selected;
//  alert(selected); 
// }

function ShowModelo()
{

/* /* /* Para obtener el valor */
 var cod = document.getElementById("xmod").value;
 //alert(cod);
 
 /* Para obtener el texto */
 var combo = document.getElementById("xmod");
 var selected = combo.options[combo.selectedIndex].text;
 document.getElementsByName("xmodNom")[0].value = selected;
// alert(selected); 
}

function ShowModeloNeu(){

/* /* /* Para obtener el valor */
 var cod = document.getElementById("xmodneupro").value;
// alert(cod);
 
 /* Para obtener el texto */
 var combo = document.getElementById("xmodneupro");
 var selected = combo.options[combo.selectedIndex].text;
 document.getElementsByName("xmodNom")[0].value = selected;
// alert(selected); 
}

function ShowMarcaNeu(){

/* /* /* Para obtener el valor */
 var cod = document.getElementById("xmarneupro").value;
// alert(cod);
 
 /* Para obtener el texto */
 var combo = document.getElementById("xmarneupro");
 var selected = combo.options[combo.selectedIndex].text;
 document.getElementsByName("xmarNom")[0].value = selected;
 //alert(selected); 
}

/* -----------------------------PANTALLA IMPORTACIONES-FECHAS------------------ */


/**
 * 
 * @param {*} metodo get, post, etc
 * @param {*} url //action
 * @param {*} id_elemento id de un div, un tbody, etc
 * @param {*} cache //guardar info temporal
 */
function ajax(metodo, url, id_elemento, cache = false) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var tipo_elemento = document.getElementById(id_elemento).nodeName;
            var htmlResponse = "";
            //console.log(tipo_elemento);
            data = JSON.parse(this.responseText);
            switch(tipo_elemento.toLocaleLowerCase()){
                case "select":
                    // console.log(JSON.parse(this.responseText));
                    
                    // console.log(data.data_response);
                    //htmlResponse = "<option disabled value=''>Seleccione..</option>";
                    for(var i = 0; i< data.data_response.length; i++){
                        //console.log(data.data_response[i].nombre);
                        htmlResponse += "<option value='"+data.data_response[i].id+"'>"+data.data_response[i].nombre+"</option>";
                    }
                    document.getElementById(id_elemento).innerHTML = htmlResponse;
                    break;
                case "tbody":
                        for(var i = 0; i< data.data_response.length; i++){
                            //console.log(data.data_response[i].nombre);
                            htmlResponse += "<tr>"; 
                            htmlResponse += "<td>"+data.data_response[i].id+"</td>";
                            htmlResponse += "<td>"+data.data_response[i].nombre+"</td>";
                            htmlResponse += "<td><a class='btn btn-danger'><i class='fa fa-check'></a></td>";
                            htmlResponse += "</tr>";
                        }
                        document.getElementById(id_elemento).innerHTML = htmlResponse;
                    break;
            }
            $("#myModal").modal('show');
            //document.getElementById(id_elemento).innerHTML = this.responseText;
        }
    };
    xhttp.open(metodo, url, cache);
    xhttp.send();
}



function getProviders() {
    var metodo = "GET";
    var url = "Almacen/ajax/autocomplete/proveedor.php";
    var elemento = "prueba";
    var cache = true;
    ajax(metodo,url,elemento,cache);   

}


/*document.getElementById('btn_ajax').addEventListener("click", function(e){
    e.preventDefault();
    getProviders();
});//*/
function calcularCIF() {                               // CALCULA CIF
    // alert("----->");
    var n1 = document.getElementById('xordMontoTotal').value; // FOB TOTAL 	-- ORDEN DE COMPRA
    var n2 = document.getElementById('seg_flete_total').value; // FLETE TOTAL	-- SEGURO
    var n3 = document.getElementById('seg_prima_neta').value; // PRIMA NETA	-- SEGURO

    if (total == '') {
    	total = (total == null || total == undefined || total == "") ? 0 : total;

    	alert("Falta Cargar Datos");
    } else {
        var total = parseFloat(n1) + parseFloat(n2) + parseFloat(n3);
    	document.getElementsByName("xordCIF")[0].value = total.toFixed(2);
    }
}

function PasarValorFob() {                            // LLENA AUTOMATICAMENTE EL VALOR TOTAL FOB EN LA PANTALLA
    var Fob_Total = document.getElementById("xordMontoTotal").value;
    document.getElementById("seg_fob_total").value = Fob_Total;
}

function calcularIncoTerm() {                           // FLETE TOTAL SEGURO 
    var incoterm        = document.getElementById("folio_incoterm").value;          
    var folio_qty       = document.getElementById("folio_qty").value;
    var xordFleteCNT    = document.getElementById("xordFleteCNT").value;
    var xordTHC         = document.getElementById("xordTHC").value;

    // alert("---->" + incoterm);


    if (incoterm == 'FOB'){
        //FORMULA xordFleteCNT * folio_qty
        // alert("---FOB----");

        if (total == '') {
            total = (total == null || total == undefined || total == "") ? 0 : total;

            alert("Falta Cargar Datos");
        }else{
            var total = parseFloat(folio_qty) * parseFloat(xordFleteCNT);
            document.getElementsByName("seg_flete_total")[0].value = total.toFixed(2);
        }

    } else if (incoterm == 'CFR'){
        //FORMULA  (xordFleteCNT + xordTHC) * folio_qty
        // alert("---CFR----");
        if (total == '') {
            total = (total == null || total == undefined || total == "") ? 0 : total;

            alert("Falta Cargar Datos");
        } else {
            var resul = parseFloat(xordFleteCNT) + parseFloat(xordTHC);



            var total = parseFloat(resul)  * parseFloat(folio_qty);
            document.getElementsByName("seg_flete_total")[0].value = total.toFixed(2);
        }
    }else {
        alert("Elija una Opcion");
    }
    
}

function calcularSumaAsegu() {                               // CALCULA SUMA ASEGURADA -- SEGURO
    // alert("----->");
    var n1 = document.getElementById('seg_fob_total').value;        // FOB TOTAL 	-- SEGURO
    var n2 = document.getElementById('seg_flete_total').value;      // FLETE TOTAL	-- SEGURO

    if (total == '') {
        total = (total == null || total == undefined || total == "") ? 0 : total;

        alert("Falta Cargar Datos");
    } else {
        var total = parseFloat(n1) + parseFloat(n2);
        document.getElementsByName("seg_suma_aseg")[0].value = total.toFixed(2);
    }
}

function calcularTasa() {                               //CALCULA TASA SEGURO
    var n1 = document.getElementById('seg_fob_total').value;        // FOB TOTAL 	-- SEGURO
    var n2 = document.getElementById('seg_flete_total').value;      // FLETE TOTAL	-- SEGURO
    var n3 = document.getElementById('seg_tasa').value;       // PRIMA NETA	-- SEGURO
    // alert("----->"+resulSubTotal);
    
    // var presuID        	= $('#filt_presu_id').val();          // ID PRESUPUESTO

    if (total == '') {
        total = (total == null || total == undefined || total == "") ? 0 : total;

        alert("Falta Cargar Datos");
    } else {
        var resul = parseFloat(n1) + parseFloat(n2);



        var total = Math.floor(resul * n3) / 100;
        document.getElementsByName("seg_prima_neta")[0].value = total.toFixed(2);
    }

}
function calcularPrimaTotal() {                               //CALCULA TASA SEGURO
    var neta = document.getElementById('seg_prima_neta').value;        // FOB TOTAL 	-- SEGURO
    // alert("----->"+neta);

    // var presuID        	= $('#filt_presu_id').val();          // ID PRESUPUESTO



        var A = Math.floor(neta * 3) / 100;
        // var A = Math.floor(neta * 3) / 100;
        // var B = parseFloat(A) + parseFloat(neta);
        // var C = parseFloat(A) + parseFloat(neta);
        // var D = parseFloat(B) + parseFloat(C);
        var B =  parseFloat(A) + parseFloat(neta);
        var C = Math.floor(neta * 18) / 100;
    var D = parseFloat(B) + parseFloat(C);

    // alert("--B->" + B);
    alert("--D ->" + D);

        var total = Math.floor(D * 18) / 100;
        // alert("--->" + total);
        document.getElementsByName("seg_prima_total")[0].value = total.toFixed(2);

    // var presuGene = document.getElementById("ficha_presu_generales").value = Math.floor(neta * gg) / 100;
    // document.getElementsByName("generale")[0].value = presuGene.toFixed(2);
    

}



