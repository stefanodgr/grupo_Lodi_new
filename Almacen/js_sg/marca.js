$(document).ready(function(){

    $('#xclasi').click(function() {

        $('input[type="text"]').val('');
        $('input[type="hidden"]').val('');
    });

    // $('#xmarca').click(function() {

    //     var xNomMar = $('#xNomMar').val();           // NOMENCLATURA
    //     var xmarca = $('#xmarca').val();           // NOMENCLATURA
    //     if (xmarca != '0'){
    //         alert("NO LIMPIO");
    //     }else{
    //             alert("SI LIMPIO");
    //             // $(xNomMar).val('');
    //     }
    // });

 
});



function ShowMarca(){

/* /* /* Para obtener el valor */
 var marca = document.getElementById("xmarca").value;
 //alert(cod);
 /* Para obtener el texto */
 var combo = document.getElementById("xmarca");
 var selected = combo.options[combo.selectedIndex].text;
 document.getElementsByName("xNomMar")[0].value = selected;
 //alert(selected); 
}

function DivOcultarMarca(opc){ // CONTROLA DISPLAY NONE EN LA PANTALLA 

    // alert("DivOcultarMarca");
    if(opc=='1'){
        document.getElementById("div_btn").style.display	            = "none";
        document.getElementById("div_consul_marca").style.display	    = "none";
        document.getElementById("div_nueva_marca").style.display	    = "block";
        document.getElementById("div_nombre_btn").style.display	        = "block";	
        document.getElementById("div_nombre_btn_atras").style.display	= "none";
        document.getElementById("div_consul_modelo").style.display	    = "none";
    }else{
        document.getElementById("div_btn").style.display	            = "none";
        document.getElementById("div_consul_marca").style.display	    = "block";
        document.getElementById("div_nueva_marca").style.display	    = "none";
        document.getElementById("div_nombre_btn_atras").style.display	= "block";
        document.getElementById("div_nombre_btn").style.display	        = "none";
        document.getElementById("div_consul_modelo").style.display	    = "none";	
    }
}


function DivOcultarNomMarca(opc){ // CONTROLA DISPLAY NONE EN LA PANTALLA 
    // alert("DivOcultarNomMarca");
    if(opc=='1'){
        document.getElementById("div_nombre_btn").style.display	        = "none";
        document.getElementById("div_nombre_marca").style.display	    = "block";
        document.getElementById("div_marca").style.display	            = "none";
        document.getElementById("div_nombre_btn_atras").style.display	= "block";
        $('#xmarcaNom').prop('disabled',false);
        $('#xmarca').prop('disabled',true);
        document.getElementById("div_consul_modelo").style.display	= "none";
    }else if(opc=='2'){
        document.getElementById("div_nombre_btn").style.display	        = "block";
        document.getElementById("div_nombre_marca").style.display	    = "none";
        document.getElementById("div_marca").style.display	            = "block";
        document.getElementById("div_nombre_btn_atras").style.display	= "none";
        $('#xmarca').prop('disabled',false);
        document.getElementById("div_consul_modelo").style.display	= "none";
    }    
}

function CampOcultarMod(opc){ // CONTROLA DISPLAY NONE EN LA PANTALLA 
    // var clasi = "CLASE";
    var opc = document.getElementById("xclasi").value; /*Obtener el SELECT */
    // alert("CampOcultarMod");
    if(opc == "1"){
        document.getElementById("div_marca").style.display	         = "block";       //       NEUMATICOS
        document.getElementById("div_nombre_modelo").style.display	 = "block";        //       CAMARAS   
        document.getElementById("div_nombre_marca").style.display	 = "none";        //       AROS
        document.getElementById("div_nombre_btn").style.display	     = "block";        //       AROS
        $('#modelo').prop('disabled',false);
        $('#xmarcaNom').prop('disabled',true);
        document.getElementById("div_consul_modelo").style.display	= "none";
    }else if(opc == "2"){
        document.getElementById("div_marca").style.display	         = "block";       //       NEUMATICOS
        document.getElementById("div_nombre_modelo").style.display	 = "none";        //       CAMARAS
        document.getElementBysId("div_nombre_marca").style.display	 = "none";        //      
        document.getElementById("div_nombre_btn").style.display	     = "block";
        document.getElementById("div_consul_modelo").style.display	= "none";
    }else if(opc == "3"){
        document.getElementById("div_marca").style.display	         = "block";       //       NEUMATICOS
        document.getElementById("div_nombre_modelo").style.display	 = "none";        //       CAMARAS
        document.getElementById("div_nombre_marca").style.display	 = "none";        //       AROS
        document.getElementById("div_nombre_btn").style.display	     = "block";
        document.getElementById("div_consul_modelo").style.display	= "none";
    }else if(opc == "4"){
        document.getElementById("div_marca").style.display	         = "block";       //       NEUMATICOS
        document.getElementById("div_nombre_modelo").style.display	 = "none";        //       CAMARAS
        document.getElementById("div_nombre_marca").style.display	 = "none";        //       AROS
        document.getElementById("div_nombre_btn").style.display	     = "block";
        document.getElementById("div_consul_modelo").style.display	= "none";
    }else if(opc == "5"){
        document.getElementById("div_marca").style.display	         = "block";       //       NEUMATICOS
        document.getElementById("div_nombre_modelo").style.display	 = "none";        //       CAMARAS
        document.getElementById("div_nombre_marca").style.display	 = "none";        //       AROS
        document.getElementById("div_nombre_btn").style.display	     = "block";
        document.getElementById("div_consul_modelo").style.display	= "none";
    }else{
        alert("Ingrese una Opcion.");
    }
}

function CampOcultarEditMarca(){ // CONTROLA DISPLAY NONE EN LA PANTALLA 

    // var children = $("tr td")[1].innerHTML;

    // alert("-->children-->"+children);
    // var valor0 = $(this).parents("tr").find("td").eq(0).text();
    // var valor1 = $(this).parents("tr").find("td").eq(1).text();
    // alert("-->0-->"+valor0);
    // alert("-->1-->"+valor1);
    // var opc = document.getElementById("xclasiNom").value; /*Obtener el SELECT */
    var opc = document.getElementById("xclasi").value; /*Obtener el SELECT */


    // alert("---->LLEGO");
    // alert("---->"+opc);


    if(opc == "1"){
        document.getElementById("div_nombre_modelo").style.display	 = "block";        //       CAMARAS   
        document.getElementById("div_nombre_marca").style.display	 = "block";        //       AROS
        $('#modelo').prop('disabled',false);
        $('#xmarcaNom').prop('disabled',true);
        // document.getElementById("div_consul_modelo").style.display	= "none";
    }else if(opc == "2"){
        document.getElementById("div_nombre_modelo").style.display	 = "none";        //       CAMARAS
        document.getElementBysId("div_nombre_marca").style.display	 = "block";        //    
        // document.getElementById("div_consul_modelo").style.display	= "none";  
    }else if(opc == "3"){
        document.getElementById("div_nombre_modelo").style.display	 = "none";        //       CAMARAS
        document.getElementById("div_nombre_marca").style.display	 = "block";        //       AROS
        // document.getElementById("div_consul_modelo").style.display	= "none";

    }else if(opc == "4"){
        document.getElementById("div_nombre_modelo").style.display	 = "none";        //       CAMARAS
        document.getElementById("div_nombre_marca").style.display	 = "block";        //       AROS
        // document.getElementById("div_consul_modelo").style.display	= "none";
    }else if(opc == "5"){
        document.getElementById("div_nombre_modelo").style.display	 = "none";        //       CAMARAS
        document.getElementById("div_nombre_marca").style.display	 = "block";        //       AROS
        // document.getElementById("div_consul_modelo").style.display	= "none";
    }else{
        alert("Ingrese una Opcion.");
    }
}




function DivNewMarcaDisplay (opc){                                // CREAR NUEVA MARCA Y MODELO
    // alert("---DivMarcaDisplay----");
    var opc = document.getElementById("xmarca").value; /*Obtener el SELECT */
    // var Nomar= document.getElementById("xNomMar").value; /*Obtener el SELECT */

    // alert("---LLEGO"+opc);
    if(opc !='0'){
        // alert("----->llego---1");
        document.getElementById("div_nombre_marca").style.display	    = "none";
        document.getElementById("div_modelo_neu").style.display	        = "block";

        // /* DESACTIVAR */
        document.getElementById("div_marca").style.display	    = "block";
        document.getElementById("div_modelo").style.display	    = "none";
        // /* COLOCAR CAMPOS DISABLED  */
    
        // document.getElementById("div_atras").style.display	    = "block";
    }else{
         // alert("----->llego---1");
         document.getElementById("div_nombre_marca").style.display	  = "block";
         document.getElementById("div_modelo_neu").style.display	  = "block";
         /* DESACTIVAR */
         document.getElementById("div_marca").style.display	          = "none";
    }
}



function borrar() {
    $('#xNomMar').prop('disabled',true);
}

function quitar() {
    $('#xNomMar').prop('disabled',false);
}



