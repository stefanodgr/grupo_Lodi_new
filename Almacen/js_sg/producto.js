
$(document).ready(function(){

    $('#xclasi').click(function() {

        $('input[type="text"]').val('');
        $('input[type="hidden"]').val('');
    });

//     $("#btn_guardar1").click(function () {
//         var xclasi = $('#xclasi').val();           // CLASIFICATORIA


//         var xnomen = $('#xnomen').val();           // NOMENCLATURA
//         var xmar1 = $('#xmar1').val();            // MARCA
//         var xmod = $('#xmod').val();             // MODELO
//         var xpais1 = $('#xpais1').val();           // PAIS
//         var neu_xanc = $('#neu_xanc').val();         // ANCHO/SECCION
//         var neu_xserie = $('#neu_xserie').val();       // SERIE
//         var neu_xaro = $('#neu_xserie').val();       // ARO
//         var neu_xpli = $('#neu_xpli').val();         // PLIEGUES
//         var xtp = $('#xtp').val();              // TIPO
//         var neu_set = $('#neu_set').val();          // SET
//         var neu_xanc_adua = $('#neu_xanc_adua').val();    // ANCHO/ADUANAS
//         var neu_xserie_adua = $('#neu_xserie_adua').val();  // SERIE/ADUANAS
//         var neu_xexte = $('#neu_xexte').val();        // DIAMETRO/EXTERNO
//         var neu_xcons = $('#neu_xcons').val();        // TIPO DE CONSTRUCCION
//         var neu_xuso = $('#neu_xuso').val();         // USO COMERCIAL
//         var neu_xmate = $('#neu_xmate').val();        // MATERIAL/CARCASA
//         var neu_xcarga = $('#neu_xcarga').val();       // INDICE DE CARGA
//         var neu_xvel = $('#neu_xvel').val();         // CODIGO/VELOCIDAD
//         var neu_xcum = $('#neu_xcum').val();         // CONSTANCIA CUMPLIMIENTO
//         var neu_xitem = $('#neu_xitem').val();        // ITEM DE LA CONSTANCIA
//         var neu_xvigen = $('#neu_xvigen').val();       // VIGENCIA
//         var neu_xconfor = $('#neu_xconfor').val();      // DECLARACION/CONFORMIDAD
//         var neu_xparti = $('#neu_xparti').val();       // PARTIDA ARANCELARIA
//         var xsunat_neu = $('#xsunat_neu').val();       // CODIGO SUNAT (NEUMATICO)
//         /* FORMULARIO CAMARA */
//         var sunat1 = $('#sunat1').val();           // CODIGO SUNAT (CAMARA)
//         var xmar2 = $('#xmar2').val();            // MARCA (CAMARA)
//         var xtp1 = $('#xtp1').val();             // TIPO CAMARA
//         var xpais2 = $('#xpais2').val();           // PAISES
//         var cam_xmed = $('#cam_xmed').val();         // MEDIDA CAMARA
//         var cam_xaro = $('#cam_xaro').val();         // ARO CAMARA
//         var cam_xval = $('#cam_xval').val();         // ARO VALVULA CAMARA
//         /* ---------------- */
//         /* FORMULARIO AROS */
//         var xsunat_aro = $('#xsunat_aro').val();         // CODIGO SUNAT (AROS)
//         var xmar3 = $('#xmar3').val();          // MARCA (AROS)
//         var nombrmar3 = $('#nombrmar3').val();          // MARCA (AROS)
//         var aro_xmod = $('#aro_xmod').val();       // TIPO AROS
//         var xpais3 = $('#xpais2').val();         // PAISES
//         var aro_xmed = $('#aro_xmed').val();       // MEDIDA AROS
//         var aro_xespe = $('#aro_xespe').val();       // ARO AROS
//         var aro_xhueco = $('#aro_xhueco').val();     // ARO VALVULA
//         var aro_xhole = $('#aro_xhole').val();      // ARO VALVULA
//         var aro_xcbd = $('#aro_xcbd').val();       // ARO C.B.D
//         var aro_xpcd = $('#aro_xpcd').val();       // ARO P.C.D
//         var aro_xoff = $('#aro_xoff').val();       // ARO OFFSET
//         /* ---------------- */
//         /* FORMULARIO PROTECTORES */
//         // var sunat1 = $('#sunat1').val();     // CODIGO SUNAT (AROS)
//         var xmar4 = $('#xmar4').val();            // MARCA (PROTECTORES)
//         var aro_xmod = $('#aro_xmod').val();         // TIPO AROS
//         var xpais4 = $('#xpais4').val();           // PAISES
//         var xdesc1 = $('#xdesc1').val();           // DESCRIPCION PROTECTORES
//         /* ---------------- */
//         /* FORMULARIO ACEESORIO */
//         var xmar5 = $('#xmar5').val();            // MARCA (ACCESORIO)
//         var xpais5 = $('#xpais5').val();           // PAISES ACCESORIO
//         var xdesc2 = $('#xdesc2').val();           // DESCRIPCION ACCESORIO
//         var xpn = $('#xpn').val();              // PN ACCESORIOS


//         /* ---------------- */
//         if (xclasi == '1') {                                             //  FORMULARIO NEUMATICO


//             if ((!xsunat_neu) || (xsunat_neu == '0')) {                 //-- VALIDACION CODIGO SUNAT
//                 alert('ERROR: Debe ingresar la CODIGO SUNAT.');
//                 return false;
//             }
//             if ((!xnomen) || (xnomen == '0')) {                         //-- VALIDACION NOMENCLATURA
//                 alert('ERROR: Debe ingresar la Nomenclatura.');
//                 return false;
//             }
//             if ((!xmar1) || (xmar1 == '0')) {                           //-- VALIDACION MARCA
//                 alert('ERROR: Debe ingresar la Marca.');
//                 return false;
//             }
//             if ((!xmod) || (xmod == '0')) {                             //-- VALIDACION MODELO
//                 alert('ERROR: Debe ingresar el Modelo.');
//                 return false;
//             }
//             if ((!xpais1) || (xpais1 == '0')) {                         //-- VALIDACION PAIS
//                 alert('ERROR: Debe ingresar el País.');
//                 return false;
//             }
//             if ((!neu_xanc) || (neu_xanc == '')) {                      //-- VALIDACION ANCHO/SECCION
//                 alert('ERROR: Debe ingresar el Ancho/Seccion(MM).');
//                 return false;
//             }
//             if ((!neu_xserie) || (neu_xserie == '')) {                  //-- VALIDACION SERIE
//                 alert('ERROR: Debe ingresar la Serie.');
//                 return false;
//             }
//             if ((!neu_xaro) || (neu_xaro == '')) {                      //-- VALIDACION ARO
//                 alert('ERROR: Debe ingresar el Aro .');
//                 return false;
//             }
//             if ((!neu_xpli) || (neu_xpli == '')) {                      //-- VALIDACION ARO
//                 alert('ERROR: Debe ingresar el Aro .');
//                 return false;
//             }
//             if ((!xtp) || (xtp == '')) {                                //-- VALIDACION TIPO
//                 alert('ERROR: Debe ingresar el Tipo .');
//                 return false;
//             }
//             if ((!neu_set) || (neu_set == '0')) {                       //-- VALIDACION SET
//                 alert('ERROR: Debe ingresar el Set .');
//                 return false;
//             }
//             if ((!neu_xanc_adua) || (neu_xanc_adua == '')) {            //-- VALIDACION ANCHO/ADUANAS
//                 alert('ERROR: Debe ingresar el ANCHO/ADUANAS .');
//                 return false;
//             }
//             if ((!neu_xserie_adua) || (neu_xserie_adua == '')) {        //-- VALIDACION SERIE/ADUANAS
//                 alert('ERROR: Debe ingresar la Serie/Aduanas .');
//                 return false;
//             }
//             if ((!neu_xexte) || (neu_xexte == '')) {                    //-- VALIDACION DIAMETRO/EXTERNO
//                 alert('ERROR: Debe ingresar la Diametro/Externo .');
//                 return false;
//             }
//             if ((!neu_xcons) || (neu_xcons == '')) {                    //-- VALIDACION TIPO DE CONSTRUCCION
//                 alert('ERROR: Debe ingresar el Tipo de Construcción No.04 .');
//                 return false;
//             }
//             if ((!neu_xuso) || (neu_xuso == '0')) {                     //-- VALIDACION USO COMERCIAL
//                 alert('ERROR: Debe ingresar el Uso Comercial No.01  .');
//                 return false;
//             }
//             if ((!neu_xmate) || (neu_xmate == '0')) {                   //-- VALIDACION MATERIAL CARCASA
//                 alert('ERROR: Debe ingresar el Material/Carcasa No.02 .');
//                 return false;
//             }
//             if ((!neu_xcarga) || (neu_xcarga == '')) {                  //-- VALIDACION INDICE DE CARGAR
//                 alert('ERROR: Debe ingresar el Indice de Carga (KG) No.05 .');
//                 return false;
//             }
//             if ((!neu_xpisada) || (neu_xpisada == '')) {                //-- VALIDACION PROFUNDIDAD DE PISADA
//                 alert('ERROR: Debe ingresar la Profundida de Pisada .');
//                 return false;
//             }
//             if ((!neu_xvel) || (neu_xvel == '0')) {                      //-- VALIDACION CODIGO/VELOCIDAD
//                 alert('ERROR: Debe ingresar el Codigo/Velocidad No.06 .');
//                 return false;
//             }
//             if ((!neu_xcum) || (neu_xcum == '')) {                      //-- VALIDACION CONSTANCIA/CUMPLIMIENTO
//                 alert('ERROR: Debe ingresar la Constancia/Cumplimiento .');
//                 return false;
//             }
//             if ((!neu_xitem) || (neu_xitem == '')) {                      //-- VALIDACION ITEM DE LA CONSTANCIA
//                 alert('ERROR: Debe ingresar el Item de la Constancia .');
//                 return false;
//             }
//             if ((!neu_xvigen) || (neu_xvigen == '')) {                      //-- VALIDACION VIGENCIA
//                 alert('ERROR: Debe ingresar  la Vigencia .');
//                 return false;
//             }
//             if ((!neu_xconfor) || (neu_xconfor == '')) {                      //-- VALIDACION DECLARACION/CONFORMIDAD
//                 alert('ERROR: Debe ingresar la Declaracion/Conformidad .');
//                 return false;
//             }
//             if ((!neu_xparti) || (neu_xparti == '')) {                      //-- VALIDACION PARTIDA ARANCELARIA
//                 alert('ERROR: Debe ingresar la Partida Arancelaria .');
//                 return false;
//             }
//         } else if (xclasi == '2') {                                      //  FORMULARIO CAMARA
//             if ((!sunat1) || (sunat1 == '')) {                           //-- VALIDACION CODIGO SUNAT
//                 alert('ERROR: Debe ingresar la CODIGO SUNAT.');
//                 return false;
//             }
//             if ((!xmar2) || (xmar2 == '0')) {                           //-- VALIDACION MARCA
//                 alert('ERROR: Debe ingresar el Marca.');
//                 return false;
//             }
//             if ((!xtp1) || (xtp1 == '')) {                              //-- VALIDACION TIPO CAMARA
//                 alert('ERROR: Debe ingresar el Tipo.');
//                 return false;
//             }
//             if ((!xpais2) || (xpais2 == '')) {                          //-- VALIDACION  PAISES CAMARA
//                 alert('ERROR: Debe ingresar el País.');
//                 return false;
//             }
//             if ((!cam_xmed) || (cam_xmed == '')) {                      //-- VALIDACION MEDIDA CAMARA
//                 alert('ERROR: Debe ingresar la Medida.');
//                 return false;
//             }
//             if ((!cam_xaro) || (cam_xaro == '')) {                      //-- VALIDACION ARO CAMARA
//                 alert('ERROR: Debe ingresar el Aro .');
//                 return false;
//             }
//             if ((!cam_xval) || (cam_xval == '')) {                      //-- VALIDACION VALVULA
//                 alert('ERROR: Debe ingresar la Valvula .');
//                 return false;
//             }

//         } else if (xclasi == '3') {                                      //  FORMULARIO AROS
//             if ((!xsunat_aro) || (xsunat_aro == '0')) {                           //-- VALIDACION CODIGO SUNAT
//                 alert('ERROR: Debe ingresar el CODIGO SUNAT.');
//                 return false;
//             }
//             if ((!xmar3) || (xmar3 == '0')) {                           //-- VALIDACION MARCA
//                 alert('ERROR: Debe ingresar la Marca.');
//                 return false;
//             }

//             if ((!aro_xmod) || (aro_xmod == '0')) {                     //-- VALIDACION TIPO AROS
//                 alert('ERROR: Debe ingresar el Tipo.');
//                 return false;
//             }
//             if ((!xpais3) || (xpais3 == '')) {                          //-- VALIDACION  PAISES AROS
//                 alert('ERROR: Debe ingresar el País.');
//                 return false;
//             }
//             if ((!aro_xmed) || (aro_xmed == '')) {                      //-- VALIDACION MEDIDA AROS
//                 alert('ERROR: Debe ingresar la Medida.');
//                 return false;
//             }
//             if ((!aro_xespe) || (aro_xespe == '')) {                    //-- VALIDACION ESPESOR AROS
//                 alert('ERROR: Debe ingresar el Espesor (MM) .');
//                 return false;
//             }
//             if ((!aro_xhueco) || (aro_xhueco == '')) {                      //-- VALIDACION N° Huecos
//                 alert('ERROR: Debe ingresar el N° Huecos .');
//                 return false;
//             }
//             if ((!aro_xhole) || (aro_xhole == '')) {                      //-- VALIDACION ESPESOR/HUECO
//                 alert('ERROR: Debe ingresar el Espesor/Hueco .');
//                 return false;
//             }
//             if ((!aro_xcbd) || (aro_xcbd == '')) {                      //-- VALIDACION C.B.D
//                 alert('ERROR: Debe ingresar el C.B.D .');
//                 return false;
//             }
//             if ((!aro_xpcd) || (aro_xpcd == '')) {                      //-- VALIDACION P.C.D
//                 alert('ERROR: Debe ingresar el C.B.D .');
//                 return false;
//             }
//             if ((!aro_xoff) || (aro_xoff == '')) {                      //-- VALIDACIONOFFSET
//                 alert('ERROR: Debe ingresar el OFFSET .');
//                 return false;
//             }

//         } else if (xclasi == '4') {                                      //  FORMULARIO PROTECTORES
//             if ((!sunat1) || (sunat1 == '0')) {                           //-- VALIDACION CODIGO SUNAT
//                 alert('ERROR: Debe ingresar el CODIGO SUNAT.');
//                 return false;
//             }
//             if ((!xmar4) || (xmar4 == '0')) {                           //-- VALIDACION MARCA PROTECTORES
//                 alert('ERROR: Debe ingresar la Marca.');
//                 return false;
//             }
//             if ((!xpais4) || (xpais4 == '0')) {                         //-- VALIDACION TIPO PROTECTORES
//                 alert('ERROR: Debe ingresar el País.');
//                 return false;
//             }
//             if ((!xdesc1) || (xdesc1 == '')) {                          //-- VALIDACION  DESCRIPCION PROTECTORES
//                 alert('ERROR: Debe ingresar la Descripcion.');
//                 return false;
//             }
//         } else if (xclasi == '5') {                                      //  FORMULARIO ACCESORIOS
//             if ((!sunat1) || (sunat1 == '0')) {                           //-- VALIDACION CODIGO SUNAT
//                 alert('ERROR: Debe ingresar el CODIGO SUNAT.');
//                 return false;
//             }
//             if ((!xmar5) || (xmar5 == '0')) {                           //-- VALIDACION MARCA ACCESORIO
//                 alert('ERROR: Debe ingresar la Marca.');
//                 return false;
//             }
//             if ((!xpais5) || (xpais5 == '0')) {                         //-- VALIDACION TIPO ACCESORIO
//                 alert('ERROR: Debe ingresar el País.');
//                 return false;
//             }
//             if ((!xdesc2) || (xdesc2 == '')) {                          //-- VALIDACION  DESCRIPCION ACCESORIO
//                 alert('ERROR: Debe ingresar la Descripcion.');
//                 return false;
//             }
//             if ((!xpn) || (xpn == '')) {                                //-- VALIDACION  DESCRIPCION ACCESORIO
//                 alert('ERROR: Debe ingresar el PN.');
//                 return false;
//             }
//         } else {
//             return false;
//         }
//     });

    /* NEUMATICO */
/* MARCA NEUMATICO */
    $("#div_marca").keypress(function (e) {
        var xmar            = document.getElementById("xmar1").value;
        // if(xmar=''){
            if (e.which == 13) {
                // console.log("1");
                if (xmar == ''){
                    // console.log("2");
                    DivNewNeuDisplay(1);
                }else{
                    DivNewNeuDisplay();
                    // console.log("3");
                }
            }
    });
    /* MARCA NEUMATICO */
    $("#div_marca").keypress(function (e) {
        // alert("-----llego------1");
        var xmar = document.getElementById("xmar1").value;
        // if(xmar=''){
        if (e.which == 13) {
            if (xmar != '') {
                PasarValor();
            }
        }
    });
 /* NEUMATICO */
    /* MODELO NEUMATICO */
    $("#div_modelo").keypress(function (e) {
        var xmod            = document.getElementById("xmod").value;
        if (e.which == 13) {
            if (xmod == '0'){
                DivNewNeuDisplay(2);
            }else{
                DivNewNeuDisplay();
            }
        }
    });
    $("#div_modelo").keypress(function (e) {
        var xmod = document.getElementById("xmod").value;
        if (e.which == 13) {
            if (xmod != '0') {
                PasarValor();
            }
        }
    });
/* PAIS NEUMATICO */
    $("#div_pais_neu").keypress(function (e) {
        var xpais1 = document.getElementById("xpais1").value;
        if (e.which == 13) {
            if (xpais1 != '0') {
                PasarValor();
            }
        }
    });
    /* TIPO RADIAL/CONVENCIONAL */
    $("#div_tipo_neu").keypress(function (e) {
        var xtp = document.getElementById("xtp").value;
        if (e.which == 13) {
            if (xtp != '') {
                PasarValor();
            }
        }
    });
/* NEUMATICO */
     /* MARCA CAMARA */
     $("#div_marca_cam").keypress(function (e) {
        var xmar2            = document.getElementById("xmar2").value;
        if (e.which == 13) {
            if (xmar2 == '0'){
                DivNewCamDisplay(1);
            }else{
                DivNewCamDisplay();
            }
        }
    });
    /* MARCA AROS */
    $("#div_marca_aro").keypress(function (e) {
        var xmar3            = document.getElementById("xmar3").value;
        if (e.which == 13) {
            if (xmar3 == '0'){
                DivNewAroDisplay(1);
            }else{
                DivNewAroDisplay();
            }
        }
    });
    /* MARCA PROTECTORES */
    $("#div_marca_pro").keypress(function (e) {
    var xmar4            = document.getElementById("xmar4").value;
    if (e.which == 13) {
        if (xmar4 == '0'){
            DivNewProDisplay(1);
        }else{
            DivNewProDisplay();
        }
    }
    });
    /* MARCA PROTECTORES */
    $("#div_marca_ace").keypress(function (e) {
        var xmar5            = document.getElementById("xmar5").value;
        if (e.which == 13) {
            if (xmar5 == '0'){
                DivNewAceDisplay(1);
            }else{
                DivNewAceDisplay();
            }
        }
    });
    /* TIPO PRODUCTOS */
    $("#div_nomen").keypress(function (e) {
        var xnomen = document.getElementById("xnomen").value;
        if (e.which == 13) {
            if (xnomen != 'NT') {
                PasarValor();
            }
        }
    });
    /* TIPO PRODUCTOS */
    $("#div_nomen").keypress(function (e) {
        var xnomen = document.getElementById("xnomen").value;
        if (e.which == 13) {
            if (xnomen != 'NT') {
                PasarValor();
            }
        }
    });
});


function DivNewNeuDisplay (opc){                                // CREAR NUEVA MARCA Y MODELO
        // alert("---DivMarcaDisplay----");
    if(opc=='1'){
        // alert("----->llego---1");
        document.getElementById("div_marca_neu").style.display	    = "block";
        document.getElementById("div_modelo_neu").style.display	    = "block";

        /* DESACTIVAR */
        document.getElementById("div_marca").style.display	    = "none";
        document.getElementById("div_modelo").style.display	    = "none";
        /* COLOCAR CAMPOS DISABLED  */
        $('#nombrmar1').prop('disabled',false);
        $('#nombrmod1').prop('disabled',false);
        document.getElementById("div_atras").style.display	    = "block";

        // alert("---->DivMarcaDisplay(1)");
    }else if(opc=='2'){                             //CREAR NUEVO MODELO

            document.getElementById("div_marca_neu").style.display	    = "none";
            document.getElementById("div_modelo_neu").style.display	    = "block";


            /* DESACTIVAR */
            document.getElementById("div_marca").style.display	    = "block";
            document.getElementById("div_modelo").style.display	    = "none";
            document.getElementById("div_atras").style.display	    = "block";
            $('#nombrmar1').prop('disabled',false);
            $('#nombrmod1').prop('disabled',false);

    }else{
        document.getElementById("div_marca_neu").style.display	    = "none";
        document.getElementById("div_modelo_neu").style.display	    = "none";

        /* DESACTIVAR */
        document.getElementById("div_marca").style.display	    = "block";
        document.getElementById("div_modelo").style.display	    = "block";
        $('#nombrmar1').prop('disabled',true);
        $('#nombrmod1').prop('disabled',true);
        document.getElementById("div_atras").style.display	    = "none";

        /* COLOCAR CAMPOS DISABLED  */
    }
}

function DivNewCamDisplay (opc){                                // CREAR NUEVA MARCA
    if(opc=='1'){
        document.getElementById("div_marca_cam").style.display	= "none";
        document.getElementById("div_nombrmar2").style.display	= "block";
        document.getElementById("div_atras_cam").style.display	= "block";
        $('#nombrmar2').prop('disabled',false);
        $('#xmarNom2').prop('disabled',true);
    }else{
        document.getElementById("div_marca_cam").style.display	= "block";
        document.getElementById("div_nombrmar2").style.display	= "none";
        document.getElementById("div_atras_cam").style.display	= "none";
        $('#nombrmar2').prop('disabled',true);
        $('#xmarNom2').prop('disabled',false);
    }
}

function DivNewAroDisplay (opc){                                // CREAR NUEVA MARCA
    // alert("---DivMarcaDisplay----");

    if(opc=='1'){
        document.getElementById("div_marca_aro").style.display	= "none";
        document.getElementById("div_nombrmar3").style.display	= "block";
        document.getElementById("div_atras_aro").style.display	= "block";
        $('#nombrmar3').prop('disabled',false);
        $('#xmarNom3').prop('disabled',true);

    }else{
        document.getElementById("div_marca_aro").style.display	= "block";
        document.getElementById("div_nombrmar3").style.display	= "none";
        document.getElementById("div_atras_aro").style.display	= "none";
        $('#nombrmar3').prop('disabled',false);
        $('#xmarNom3').prop('disabled',false);
    }
}

function DivNewProDisplay (opc){                                // CREAR NUEVA MARCA
    // alert("---DivMarcaDisplay----");

    if(opc=='1'){
        document.getElementById("div_marca_pro").style.display	= "none";
        document.getElementById("div_nombrmar4").style.display	= "block";
        document.getElementById("div_atras_pro").style.display	= "block";
        $('#nombrmar4').prop('disabled',false);
        $('#xmarNom4').prop('disabled',true);

    }else{
        document.getElementById("div_nombrmar4").style.display	= "none";
        document.getElementById("div_marca_pro").style.display	= "block";
        document.getElementById("div_atras_pro").style.display	= "none";

        $('#nombrmar4').prop('disabled',true);
        $('#xmarNom4').prop('disabled',false);
    }
}

function DivNewAceDisplay (opc){                                // CREAR NUEVA MARCA
    // alert("---DivMarcaDisplay----");

    if(opc=='1'){
        document.getElementById("div_marca_ace").style.display	= "none";
        document.getElementById("div_nombrmar5").style.display	= "block";
        document.getElementById("div_atras_ace").style.display	= "block";
        $('#nombrmar4').prop('disabled',false);
        $('#xmarNom4').prop('disabled',true);


        /* DESACTIVAR */





    }else{
        document.getElementById("div_marca_ace").style.display	= "block";
        document.getElementById("div_nombrmar5").style.display	= "none";
        document.getElementById("div_atras_ace").style.display	= "none";

        $('#nombrmar4').prop('disabled',true);
        $('#xmarNom4').prop('disabled',false);

    }
}

function DivOcultarProdu(){ // CONTROLA DISPLAY NONE EN LA PANTALLA

    var div_nombre        = document.getElementById("div_nombre").value;

    document.getElementById("div_btn").style.display	            = "none";
    document.getElementById("div_nuevo_produ").style.display	    = "block";
    document.getElementById("div_tipo_produ").style.display	        = "block";
    document.getElementById("div_consul_produ_neu").style.display   = "none";
    document.getElementById("div_consul_produ_cam").style.display   = "none";
    document.getElementById("div_consul_produ_aro").style.display   = "none";
    document.getElementById("div_consul_produ_pro").style.display   = "none";
    document.getElementById("div_consul_produ_ace").style.display   = "none";
    document.getElementById("div_opc_consul").style.display         = "none";
    document.getElementById("div_btn_regre").style.display          = "block";
    
    document.getElementById("linea_black").style.display            = "none";
    // document.getElementById("div_nombre").style.display             = "none";
 if (div_nombre != ("")){
    document.getElementById("div_nombre").style.display             = "none";
 }else{
     alert("llego vacio");
 }

    // document.getElementById("div_opc_consul").style.display = "block"
        
}


function FormOcultarProdu(opc){ // CONTROLA DISPLAY NONE EN LA PANTALLA
    var opc = document.getElementById("xclasi").value; /*Obtener el SELECT */

    // if(opc!=""){
    //     alert("--->" + opc);
    //     $.ajax({
    //         url: "../Almacen/ajax/ajax_producto.php?buscar=tipo_product&valor="+opc,
           
    //         type: "GET",
    //         dataType: "json",
    //         beforeSend(){
    //             document.querySelector("#helper").innerHTML="Verificando";
    //         },
    //         success: function (response) {
    //             document.querySelector("#helper").innerHTML = "";
    //             $("input[name='codigo_sku']").val(response);
    //         }
    //     });
    // }

    if(opc == "1"){
        // $.ajax({
        //     url: "../Almacen/ajax/ajax_producto.php?buscar=neumatico&valor=" + opc,

        //     type: "GET",
        //     dataType: "json",
        //     beforeSend() {
        //         document.querySelector("#helper").innerHTML = "Verificando";
        //     },
        //     success: function (response) {
        //         document.querySelector("#helper").innerHTML = "";
        //         $("input[name='codigo_sku']").val(response);
        //     }
        // });
        document.getElementById("div_form_neu").style.display	     = "block";       //       NEUMATICOS
        document.getElementById("div_form_cam").style.display	     = "none";        //       CAMARAS
        document.getElementById("div_form_aro").style.display	     = "none";        //       AROS
        document.getElementById("div_form_pro").style.display	     = "none";        //       PROTECTORES
        document.getElementById("div_form_ace").style.display	     = "none";        //       ACCESORIO
        document.getElementById("div_guardar").style.display	     = "block";       //      ACCESORIO
    }else if(opc == "2"){
        // $.ajax({
        //     url: "../Almacen/ajax/ajax_producto.php?buscar=camara&valor=" + opc,
        //     type: "GET",
        //     dataType: "json",
        //     beforeSend() {
        //         document.querySelector("#helper").innerHTML = "Verificando";
        //     },
        //     success: function (response) {
        //         document.querySelector("#helper").innerHTML = "";
        //         $("input[name='codigo_sku']").val(response);
        //     }
        // });
        document.getElementById("div_form_neu").style.display	     = "none";        //       NEUMATICOS
        // document.getElementById("nombrmar1").style.display	         = "none";        //       CAMARAS
        document.getElementById("div_form_cam").style.display	     = "block";       //       CAMARAS
        document.getElementById("div_form_aro").style.display	     = "none";        //       AROS
        document.getElementById("div_form_pro").style.display	     = "none";        //       PROTECTORES
        document.getElementById("div_form_ace").style.display	     = "none";        //       ACCESORIOs
        document.getElementById("div_guardar").style.display	     = "block";        //       ACCESORIO
    }else if(opc == "3"){
        // $.ajax({
        //     url: "../Almacen/ajax/ajax_producto.php?buscar=aro&valor=" + opc,

        //     type: "GET",
        //     dataType: "json",
        //     beforeSend() {
        //         document.querySelector("#helper").innerHTML = "Verificando";
        //     },
        //     success: function (response) {
        //         document.querySelector("#helper").innerHTML = "";
        //         $("input[name='codigo_sku']").val(response);
        //     }
        // });
        document.getElementById("div_form_neu").style.display	     = "none";        //       NEUMATICOS
        document.getElementById("div_form_cam").style.display	     = "none";        //       CAMARAS
        document.getElementById("div_form_aro").style.display	     = "block";       //       AROS
        document.getElementById("div_form_pro").style.display	     = "none";        //       PROTECTORES
        document.getElementById("div_form_ace").style.display	     = "none";        //       ACCESORIOs
        document.getElementById("div_guardar").style.display	     = "block";        //       ACCESORIO
    }else if(opc == "4"){
        // $.ajax({
        //     url: "../Almacen/ajax/ajax_producto.php?buscar=protector&valor=" + opc,

        //     type: "GET",
        //     dataType: "json",
        //     beforeSend() {
        //         document.querySelector("#helper").innerHTML = "Verificando";
        //     },
        //     success: function (response) {
        //         document.querySelector("#helper").innerHTML = "";
        //         $("input[name='codigo_sku']").val(response);
        //     }
        // });
        document.getElementById("div_form_neu").style.display	     = "none";        //       NEUMATICOS
        document.getElementById("div_form_cam").style.display	     = "none";        //       CAMARAS
        document.getElementById("div_form_aro").style.display	     = "none";        //       AROS
        document.getElementById("div_form_pro").style.display	     = "block";       //       PROTECTORES
        document.getElementById("div_form_ace").style.display	     = "none";        //       ACCESORIOs
        document.getElementById("div_guardar").style.display	     = "block";        //       ACCESORIO
    }else if(opc == "5"){
        // $.ajax({
        //     url: "../Almacen/ajax/ajax_producto.php?buscar=accesorio&valor=" + opc,

        //     type: "GET",
        //     dataType: "json",
        //     beforeSend() {
        //         document.querySelector("#helper").innerHTML = "Verificando";
        //     },
        //     success: function (response) {
        //         document.querySelector("#helper").innerHTML = "";
        //         $("input[name='codigo_sku']").val(response);
        //     }
        // });
        document.getElementById("div_form_neu").style.display	     = "none";        //       NEUMATICOS
        document.getElementById("div_form_cam").style.display	     = "none";        //       CAMARAS
        document.getElementById("div_form_aro").style.display	     = "none";        //       AROS
        document.getElementById("div_form_pro").style.display	     = "none";        //       PROTECTORES
        document.getElementById("div_form_ace").style.display	     = "block";       //       ACCESORIOs
        document.getElementById("div_guardar").style.display	     = "block";        //       ACCESORIO
    }else{
        alert("Ingrese una Opcion.");
    }
}

function limpiar(opc){ // CONTROLA DISPLAY NONE EN LA PANTALLA
    var opc = document.getElementById("xclasi").value; /*Obtener el SELECT */

    if(opc == "1"){                 //NEUMATICOS
        /* ------------------------DESACTIVAR----------------------------- */
        document.getElementById('neu_xuso').options[0].selected = true;  /* FILTRO MODELO  */
        /* --------------------------CAMARAS------------------------------- */
        document.getElementById('xmar2').options[0].selected    = true;  /* FILTRO NOMENCLATURA */
        document.getElementById('xtp1').options[0].selected     = true;  /* FILTRO MARCA  */
        document.getElementById('xpais2').options[0].selected   = true;  /* FILTRO PAIS  */
        /* --------------------------------------------------------------- */
        /* ---------------------------AROS-------------------------------- */
        document.getElementById('aro_xmod').options[0].selected = true;  /* FILTRO NOMENCLATURA */
        document.getElementById('xmar3').options[0].selected    = true;  /* FILTRO MARCA  */
        document.getElementById('xpais3').options[0].selected   = true;  /* FILTRO PAIS  */
        /* --------------------------------------------------------------- */
        /* --------------------------PROTECTORES--------------------------- */
        document.getElementById('xmar4').options[0].selected    = true;  /* FILTRO NOMENCLATURA */
        document.getElementById('xpais4').options[0].selected   = true;  /* FILTRO MARCA  */
        /*---------------------------------------------------------------  */
        /* --------------------------ACCESORIOS--------------------------- */
        document.getElementById('xmar5').options[0].selected    = true;  /* FILTRO NOMENCLATURA */
        document.getElementById('xpais5').options[0].selected   = true;  /* FILTRO MARCA  */
        /*---------------------------------------------------------------  */
    }else if(opc == "2"){           //CAMARAS
        /* ------------------------DESACTIVAR----------------------------- */
        /* ------------------------NEUMATICOS------------------------------- */
        document.getElementById('xnomen').options[0].selected      = true;  /* FILTRO NOMENCLATURA */
        document.getElementById('xmar1').options[0].selected       = true;  /* FILTRO MARCA  */
        document.getElementById('xpais1').options[0].selected      = true;  /* FILTRO PAIS  */
        if (document.getElementById('xmod') != null && 
        document.getElementById('xmod').options.length > 0){
            document.getElementById('xmod').options[0].selected    = true;  /* FILTRO MODELO  */
        }
        document.getElementById('xtp').options[0].selected         = true;  /* FILTRO MODELO  */
        document.getElementById('neu_set').options[0].selected     = true;  /* FILTRO MODELO  */
        document.getElementById('neu_xcons').options[0].selected   = true;  /* FILTRO MODELO  */
        document.getElementById('neu_xuso').options[0].selected    = true;  /* FILTRO MODELO  */
        document.getElementById('neu_xmate').options[0].selected   = true;  /* FILTRO MODELO  */
        document.getElementById('neu_xvel').options[0].selected    = true;  /* FILTRO MODELO  */
        /* --------------------------------------------------------------- */
        /* ---------------------------AROS-------------------------------- */
        document.getElementById('aro_xmod').options[0].selected = true;  /* FILTRO NOMENCLATURA */
        document.getElementById('xmar3').options[0].selected    = true;  /* FILTRO MARCA  */
        document.getElementById('xpais3').options[0].selected   = true;  /* FILTRO PAIS  */
        /* --------------------------------------------------------------- */
        /* --------------------------PROTECTORES-------------------------- */
        document.getElementById('xmar4').options[0].selected    = true;          /* FILTRO NOMENCLATURA */
        document.getElementById('xpais4').options[0].selected   = true;  /* FILTRO MARCA  */
        /* --------------------------------------------------------------- */
        /* --------------------------ACCESORIOS--------------------------- */
        document.getElementById('xmar5').options[0].selected    = true;  /* FILTRO NOMENCLATURA */
        document.getElementById('xpais5').options[0].selected   = true;  /* FILTRO MARCA  */
        /*---------------------------------------------------------------  */
    }else if(opc == "3"){           //AROS
        /* ------------------------DESACTIVAR----------------------------- */
       /* ------------------------NEUMATICOS------------------------------- */
       document.getElementById('xnomen').options[0].selected      = true;  /* FILTRO NOMENCLATURA */
       document.getElementById('xmar1').options[0].selected       = true;  /* FILTRO MARCA  */
       document.getElementById('xpais1').options[0].selected      = true;  /* FILTRO PAIS  */
        if (document.getElementById('xmod') != null &&
            document.getElementById('xmod').options.length > 0) {
            document.getElementById('xmod').options[0].selected = true;  /* FILTRO MODELO  */
        }
       document.getElementById('xtp').options[0].selected         = true;  /* FILTRO MODELO  */
       document.getElementById('neu_set').options[0].selected     = true;  /* FILTRO MODELO  */
       document.getElementById('neu_xcons').options[0].selected   = true;  /* FILTRO MODELO  */
       document.getElementById('neu_xuso').options[0].selected    = true;  /* FILTRO MODELO  */
       document.getElementById('neu_xmate').options[0].selected   = true;  /* FILTRO MODELO  */
       document.getElementById('neu_xvel').options[0].selected    = true;  /* FILTRO MODELO  */
       /* --------------------------------------------------------------- */
        /* --------------------------CAMARAS------------------------------- */
        document.getElementById('xmar2').options[0].selected    = true;  /* FILTRO NOMENCLATURA */
        document.getElementById('xtp1').options[0].selected     = true;  /* FILTRO MARCA  */
        document.getElementById('xpais2').options[0].selected   = true;  /* FILTRO PAIS  */
        /* --------------------------------------------------------------- */
        /* --------------------------PROTECTORES-------------------------- */
        document.getElementById('xmar4').options[0].selected    = true;          /* FILTRO NOMENCLATURA */
        document.getElementById('xpais4').options[0].selected   = true;  /* FILTRO MARCA  */
        /* --------------------------------------------------------------- */
        /* --------------------------ACCESORIOS--------------------------- */
        document.getElementById('xmar5').options[0].selected    = true;  /* FILTRO NOMENCLATURA */
        document.getElementById('xpais5').options[0].selected   = true;  /* FILTRO MARCA  */
        /*---------------------------------------------------------------  */
    }else if(opc == "4"){           //PROTECTORES
        /* ------------------------DESACTIVAR----------------------------- */
       /* ------------------------NEUMATICOS------------------------------- */
       document.getElementById('xnomen').options[0].selected      = true;  /* FILTRO NOMENCLATURA */
       document.getElementById('xmar1').options[0].selected       = true;  /* FILTRO MARCA  */
       document.getElementById('xpais1').options[0].selected      = true;  /* FILTRO PAIS  */
        if (document.getElementById('xmod') != null &&
            document.getElementById('xmod').options.length > 0) {
            document.getElementById('xmod').options[0].selected = true;  /* FILTRO MODELO  */
        }
       document.getElementById('xtp').options[0].selected         = true;  /* FILTRO MODELO  */
       document.getElementById('neu_set').options[0].selected     = true;  /* FILTRO MODELO  */
       document.getElementById('neu_xcons').options[0].selected   = true;  /* FILTRO MODELO  */
       document.getElementById('neu_xuso').options[0].selected    = true;  /* FILTRO MODELO  */
       document.getElementById('neu_xmate').options[0].selected   = true;  /* FILTRO MODELO  */
       document.getElementById('neu_xvel').options[0].selected    = true;  /* FILTRO MODELO  */
       /* --------------------------------------------------------------- */
        /* --------------------------CAMARAS------------------------------- */
        document.getElementById('xmar2').options[0].selected    = true;  /* FILTRO NOMENCLATURA */
        document.getElementById('xtp1').options[0].selected     = true;  /* FILTRO MARCA  */
        document.getElementById('xpais2').options[0].selected   = true;  /* FILTRO PAIS  */
        /* --------------------------------------------------------------- */
        /* ---------------------------AROS-------------------------------- */
        document.getElementById('aro_xmod').options[0].selected = true;  /* FILTRO NOMENCLATURA */
        document.getElementById('xmar3').options[0].selected    = true;  /* FILTRO MARCA  */
        document.getElementById('xpais3').options[0].selected   = true;  /* FILTRO PAIS  */
        /* --------------------------------------------------------------- */
        /* --------------------------ACCESORIOS--------------------------- */
        document.getElementById('xmar5').options[0].selected    = true;  /* FILTRO NOMENCLATURA */
        document.getElementById('xpais5').options[0].selected   = true;  /* FILTRO MARCA  */
        /*---------------------------------------------------------------  */
        // document.getElementById("formProducto").reset();
    }else if(opc == "5"){           //ACCESORIOS
        /* ------------------------DESACTIVAR----------------------------- */
       /* ------------------------NEUMATICOS------------------------------- */
       document.getElementById('xnomen').options[0].selected      = true;  /* FILTRO NOMENCLATURA */
       document.getElementById('xmar1').options[0].selected       = true;  /* FILTRO MARCA  */
       document.getElementById('xpais1').options[0].selected      = true;  /* FILTRO PAIS  */
        if (document.getElementById('xmod') != null &&
            document.getElementById('xmod').options.length > 0) {
            document.getElementById('xmod').options[0].selected = true;  /* FILTRO MODELO  */
        }
       document.getElementById('xtp').options[0].selected         = true;  /* FILTRO MODELO  */
       document.getElementById('neu_set').options[0].selected     = true;  /* FILTRO MODELO  */
       document.getElementById('neu_xcons').options[0].selected   = true;  /* FILTRO MODELO  */
       document.getElementById('neu_xuso').options[0].selected    = true;  /* FILTRO MODELO  */
       document.getElementById('neu_xmate').options[0].selected   = true;  /* FILTRO MODELO  */
       document.getElementById('neu_xvel').options[0].selected    = true;  /* FILTRO MODELO  */
       /* --------------------------------------------------------------- */
        /* --------------------------CAMARAS------------------------------- */
        document.getElementById('xmar2').options[0].selected    = true;  /* FILTRO NOMENCLATURA */
        document.getElementById('xtp1').options[0].selected     = true;  /* FILTRO MARCA  */
        document.getElementById('xpais2').options[0].selected   = true;  /* FILTRO PAIS  */
        /* --------------------------------------------------------------- */
        /* --------------------------PROTECTORES-------------------------- */
        document.getElementById('xmar4').options[0].selected    = true;          /* FILTRO NOMENCLATURA */
        document.getElementById('xpais4').options[0].selected   = true;  /* FILTRO MARCA  */
        /* --------------------------------------------------------------- */
        // /* --------------------------ACCESORIOS--------------------------- */
        // document.getElementById('xmar5').options[0].selected    = 'selected';  /* FILTRO NOMENCLATURA */
        // document.getElementById('xpais5').options[0].selected   = 'selected';  /* FILTRO MARCA  */
        // /*---------------------------------------------------------------  */
        }else{
        // alert("NO LLEGO JS ");
    }
}


function PasarValor() {

        var ClasiNom        = 'NE';
        // var sunat           ='';

        var xmarNom1        = document.getElementById("xmarNom1").value;
        var xneu_xaro       = document.getElementById("neu_xaro").value;
        var neu_xanc        = document.getElementById("neu_xanc").value;
        var neu_xuso        = document.getElementById("neu_xuso").value;
      /*   var codigo_sku      = document.getElementById("codigo_sku").value; */
        var codigo1         = document.getElementById("nombre3").value;


        // if (xmarNom1 ==''){                             // SI VIENE VACIO
        //     var  xmarNom1    = document.getElementById("nombrmar1").value;
        // }else{
        //     var  xmarNom1    = document.getElementById("xmarNom1").value;
        // }

        // if (xmodNom ==''){                              // SI VIENE VACIO
        //     var xmodNom    = document.getElementById("nombrmod1").value;
        // }else{
        //     var xmodNom         = document.getElementById("xmodNom").value;
        // }

        if (neu_xuso == "PPE-PASAJEROS, USO PERMANENTE"){
            var neu_xuso = "PPE";
        } else if (neu_xuso == "PTE-PASAJEROS, USO TEMPORAL"){
            var neu_xuso = "PTE";
        } else if (neu_xuso == "CLT-COMERCIALES, PARA CAMIONETA DE CARGA, MICROBUSES O CAMIONES LIGEROS" ){
            var neu_xuso = "CLT";
        } else if (neu_xuso == "CTR-COMERCIALES, PARA CAMION Y/O OMNIBUS"){
            var neu_xuso = "CTR";
        } else if (neu_xuso == "CML-COMERCIALES, PARA USO MINERO Y FORESTAL"){
            var neu_xuso = "CML";
        } else if (neu_xuso == "CMH-COMERCIALES, PARA CASAS RODANTES"){
            var neu_xuso = "CMH";
        } else if (neu_xuso == "CST-COMERCIALES, REMOLCADORES EN CARRETERA"){
            var neu_xuso = "CST";
        } else if (neu_xuso == "ALN-AGRICOLAS"){
            var neu_xuso = "ALN";
        } else if (neu_xuso == "OTG-MAQUINARIA, TRACTORES NIVELADORAS"){
            var neu_xuso = "OTG";
        } else if (neu_xuso == "OTR-OTROS PARA MAQUINARIAS"){
            var neu_xuso = "OTR";
        }else {
            // alert("Ingrese una opcion.");
        }


        /* SUBSTR ---------------------SUBSTR */
        var NewMarca    = xmarNom1.toUpperCase().substr(0,4).replace(" ","");
        /* ------------------------------------ */
            // var xnomen = 'NU';
    // document.getElementById("nombre3").value = ClasiNom + NewMarca + neu_xuso + xneu_xaro + neu_xanc + codigo_sku ;
    document.getElementById("nombre3").value = ClasiNom + NewMarca + neu_xuso + xneu_xaro + neu_xanc;

    document.getElementById("nombreSku").value = codigo1 ;
            // alert("-----LLEGO---0");
    }

function PasarValor2() {                    // FORMULARIO DE CAMARAS
    sunat = '25171905';
    var ClasiNom = 'CA';
    // var sunat           ='';
    var xmarNom2    = document.getElementById("xmarNom2").value;
    var xcam_xmed   = document.getElementById("cam_xmed").value;
    // var xpaisNom2   = document.getElementById("xpaisNom2").value;
    // var xcam_xval   = document.getElementById("cam_xval").value;
    var xtp1        = document.getElementById("xtp1").value;
    // var codigo_sku  = document.getElementById("codigo_sku").value;
    var codigo1     = document.getElementById("nombre3").value;

    if (xmarNom2 ==''){                             // SI VIENE VACIO
        xmarNom2    = document.getElementById("nombrmar2").value;
    }else{
        xmarNom2    = document.getElementById("xmarNom2").value;
    }



    /* SUBSTR ---------------------SUBSTR */
    var NewMarca    =  xmarNom2.toUpperCase().substr(0, 3).replace(" ", "");
    // var NewModelo = xmodNom.substr(0, 2);
    // var NewPais =   xpaisNom2.substr(0, 2);
    var NewTp1      =  xtp1.substr(0, 3);
    // var NewVal  =   xcam_xval.toUpperCase();
    var NewMed      =  xcam_xmed.toUpperCase();


    document.getElementById("nombre3").value    = ClasiNom  + NewMarca + NewTp1 + NewMed;
    document.getElementById("nombreSku").value  = codigo1;
    document.getElementById("sunat").value      = sunat;
    document.getElementById("sunat1").value     = sunat;
}

function PasarValor3() {
            // alert("->" + ClasiNom);
            // var ClasiNom = 'AR';
            var xmarNom3           = document.getElementById("xmarNom3").value;
            var xaro_xmed          = document.getElementById("aro_xmed").value;
            var xaro_xmod          = document.getElementById("aro_xmod").value;
            // var codigo_sku         = document.getElementById("codigo_sku").value;
            var codigo1            = document.getElementById("nombre3").value;
            // alert("-Marca->" + xmarNom2);

            if (xmarNom3 ==''){                             // SI VIENE VACIO
                xmarNom3    = document.getElementById("nombrmar3").value;
            }else{
                xmarNom3    = document.getElementById("xmarNom3").value;
            }


            /* SUBSTR ---------------------SUBSTR */

        var NewMarca3 = xmarNom3.toUpperCase().substr(0, 3).replace(" ", "");
            // var NewPais3    = xpaisNom3.substr(0, 2);
            var NewMod      = xaro_xmod.substr(0, 2);
            /* SUBSTR ---------------------SUBSTR */
            document.getElementById("nombre3").value = 'AR' + NewMarca3  + NewMod + xaro_xmed;
            // document.getElementById("nombreSku").value = codigo1;
}
function PasarValor4() {
 var sunat = '25172507';

// alert("---LLEGO");
// var codigo = '1';
// var clasi = document.getElementById("xclasi").value;
var ClasiNom = 'PR';
var xpaisNom4           = document.getElementById("xpaisNom4").value;
var xmarNom4            = document.getElementById("xmarNom4").value;
var xdesc1              = document.getElementById("xdesc1").value;
// var codigo_sku          = document.getElementById("codigo_sku").value;
var codigo1             = document.getElementById("nombre3").value;

if (xmarNom4 ==''){                             // SI VIENE VACIO
    xmarNom4    = document.getElementById("nombrmar4").value;
}else{
    xmarNom4    = document.getElementById("xmarNom4").value;
}

    if (xpaisNom4 == 'KOREA'){
        xpaisNom4 = 'KR';

    } else if (xpaisNom4 == 'PAKISTAN'){
        xpaisNom4 = 'PK';
    } else if (xpaisNom4 == 'CHINA'){
        xpaisNom4 = 'CN';

    } else if (xpaisNom4 == 'INDIA'){
        xpaisNom4 = 'IN';

    } else if (xpaisNom4 == 'TAIWAN' ){
        xpaisNom4 = 'TW';
    } else if (xpaisNom4 == 'MEXICO'){
        xpaisNom4 = 'MX';

}else{

}

/* SUBSTR ---------------------SUBSTR */
    var Newxdesc1   = xdesc1.toUpperCase();
    var NewMarca4 = xmarNom4.toUpperCase().substr(0, 3).replace(" ", "");
    document.getElementById("nombre3").value = ClasiNom + NewMarca4 + xpaisNom4  + Newxdesc1;
    document.getElementById("nombreSku").value      = codigo1;
    document.getElementById("sunat").value              = sunat;
    document.getElementById("sunat1").value             = sunat;
}

function PasarValor5() {

sunat = '25172511';
// alert("---LLEGO");
ClasiNom                = 'AC';
var xpaisNom5           = document.getElementById("xpaisNom5").value;
var xmarNom5            = document.getElementById("xmarNom5").value;
var xdesc2              = document.getElementById("xdesc2").value;
var xpn                 = document.getElementById("xpn").value;
// var codigo_sku          = document.getElementById("codigo_sku").value;
var codigo1             = document.getElementById("nombre3").value;

if (xmarNom5 ==''){                             // SI VIENE VACIO
    xmarNom5    = document.getElementById("nombrmar5").value;
}else{
    xmarNom5    = document.getElementById("xmarNom5").value;
}

    if (xpaisNom5 == 'KOREA') {
        xpaisNom5 = 'KR';

    } else if (xpaisNom5 == 'PAKISTAN') {
        xpaisNom5 = 'PK';
    } else if (xpaisNom5 == 'CHINA') {
        xpaisNom5 = 'CN';

    } else if (xpaisNom5 == 'INDIA') {
        xpaisNom5 = 'IN';

    } else if (xpaisNom5 == 'TAIWAN') {
        xpaisNom5 = 'TW';
    } else if (xpaisNom5 == 'MEXICO') {
        xpaisNom5 = 'MX';

} else {

}


/* SUBSTR ---------------------SUBSTR */
var NewMarca5       = xmarNom5.toUpperCase().substr(0, 3).replace(" ", "");
// var NewPais5        = xpaisNom5.substr(0, 2);
var Newxdesc2       = xdesc2.toUpperCase();
var Newxpn          = xpn.toUpperCase();

// var NewMod      = xaro_xmod.substr(0, 4);
/* SUBSTR ---------------------SUBSTR */
    document.getElementById("nombre3").value = ClasiNom + NewMarca5 + xpaisNom5 + Newxdesc2 + Newxpn;
document.getElementById("nombreSku").value      = codigo1;
document.getElementById("sunat").value          = sunat;
document.getElementById("sunat1").value         = sunat;
}


function OcultarSunat(opc){
    // opc =  document.getElementById("xclasi").value;
    if (opc == 1 ){
        document.getElementById("div_sunat_2").style.display    = "block";
        document.getElementById("div_sunat").style.display      = "none";
        document.getElementById("div_sunat_3").style.display    = "none";
        $('#sunat1').prop('disabled',true);
        $('#sunat1').prop('disabled',true);
        //       ACCESORIO
    }else if (opc == 2){
        document.getElementById("div_sunat_2").style.display    = "none";
        document.getElementById("div_sunat").style.display      = "none";
        document.getElementById("div_sunat_3").style.display    = "block";
        $('#sunat1').prop('disabled',true);
        $('#sunat1').prop('disabled',true);     //       ACCESORIO
    }else{
        document.getElementById("div_sunat").style.display      = "block";
        document.getElementById("div_sunat_2").style.display    = "none";
        document.getElementById("div_sunat_3").style.display    = "none";
        $('#sunat1').prop('disabled',false);
    }

}

function ShowClasi(){

    /* /* /* Para obtener el valor */
    // var cod = document.getElementById("xclasi").value;
    // alert(cod);
    var cod = '1';

    /* Para obtener el texto */
    // var combo = document.getElementById("xclasi");
    // var selected = combo.options[combo.selectedIndex].text;
    if (document.getElementById("codigonum") !== null ){
        document.getElementById("codigonum").value = cod ;
    }

    //alert(selected);
}

/* EXTRAER NOMBRES MARCAS  */
function ShowMarca1(){
    var combo = document.getElementById("xmar1");

    var selected = combo.options[combo.selectedIndex].text;
    if (selected == 'NUEVA MARCA'){
// alert("----llego----Nueva Marca");
$('#xmarNom1').prop('disabled',true);            //-- FECHA NACIMIENTO
$('#xmodNom').prop('disabled',true);

    // document.getElementsByName("xmarNom1")[0].value = '';
    }else{
    document.getElementsByName("xmarNom1")[0].value = selected;
    $('#xmarNom1').prop('disabled',false);
// alert("----llego----VACIO");
    }
    // alert(selected);
}

function ShowMarca2(){
    var combo = document.getElementById("xmar2");

   var selected = combo.options[combo.selectedIndex].text;
   if (selected == 'NUEVA MARCA'){
    // alert("----llego----Nueva Marca");
    $('#xmarNom2').prop('disabled',true);            //-- FECHA NACIMIENTO

    // document.getElementsByName("xmarNom1")[0].value = '';
    }else{
        document.getElementsByName("xmarNom2")[0].value = selected;
    $('#xmarNom2').prop('disabled',false);
    // alert("----llego----VACIO");
    }
    // alert(selected);
}
function ShowMarca3(){
    var combo = document.getElementById("xmar3");

   var selected = combo.options[combo.selectedIndex].text;
   if (selected == 'NUEVA MARCA'){
    // alert("----llego----Nueva Marca");
    $('#xmarNom3').prop('disabled',true);            //-- FECHA NACIMIENTO

    // document.getElementsByName("xmarNom1")[0].value = '';
    }else{
        document.getElementsByName("xmarNom3")[0].value = selected;
    $('#xmarNom3').prop('disabled',false);
    // alert("----llego----VACIO");
    }
}
function ShowMarca4(){
    var combo = document.getElementById("xmar4");
   var selected = combo.options[combo.selectedIndex].text;
   if (selected == 'NUEVA MARCA'){
        // alert("----llego----Nueva Marca");
        $('#xmarNom4').prop('disabled',true);            //-- FECHA NACIMIENTO
    }else{
        document.getElementsByName("xmarNom4")[0].value = selected;
        $('#xmarNom4').prop('disabled',false);
        // alert("----llego----VACIO");
    }
}

function ShowMarca5(){
    var combo = document.getElementById("xmar5");
   var selected = combo.options[combo.selectedIndex].text;
   if (selected == 'NUEVA MARCA'){
        // alert("----llego----Nueva Marca");
        $('#xmarNom5').prop('disabled',true);            //-- FECHA NACIMIENTO
    }else{
        document.getElementsByName("xmarNom5")[0].value = selected;
        $('#xmarNom5').prop('disabled',false);
        // alert("----llego----VACIO");
    }
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
/* ------------------------------------------- */
function ShowModelo(){

    /* /* /* Para obtener el valor */
    var cod = document.getElementById("xmod").value;
    //alert(cod);


    /* Para obtener el texto */
    var combo = document.getElementById("xmod");
    var selected = combo.options[combo.selectedIndex].text;
    if (selected == 'NUEVO MODELO'){
        alert("----llego----NUEVO MODELO");
        $('#xmodNom').prop('disabled',true);            //-- FECHA NACIMIENTO

            // document.getElementsByName("xmarNom1")[0].value = '';
            }else{
            document.getElementsByName("xmodNom")[0].value = selected;
            $('#xmodNom').prop('disabled',false);
    // alert(selected);
    }
}

function OptionProdu(opc) {

    if (opc == '1'){
        // alert('1');
        /* REPORTES */
        document.getElementById("reporte_neumatico").style.display      = "block";
        document.getElementById("reporte_camara").style.display         = "none";
        document.getElementById("reporte_aro").style.display            = "none";
        document.getElementById("reporte_protector").style.display      = "none";
        document.getElementById("reporte_accesorio").style.display      = "none";
        /* REPORTES */

        document.getElementById("div_opc_consul").style.display         = "block";
        document.getElementById("div_nombre_neumatico").style.display   = "block";
        document.getElementById("div_nombre_camara").style.display      = "none";
        document.getElementById("div_nombre_aro").style.display         = "none";
        document.getElementById("div_nombre_protectore").style.display  = "none";
        document.getElementById("div_nombre_accesorio").style.display   = "none";

        document.getElementById("div_consul_produ_neu").style.display = "block";
        document.getElementById("div_consul_produ_cam").style.display = "none";
        document.getElementById("div_consul_produ_aro").style.display = "none";
        document.getElementById("div_consul_produ_pro").style.display = "none";
        document.getElementById("div_consul_produ_ace").style.display = "none";
      
        
        
    } else if (opc == '2'){
        // alert('2');

        /* REPORTES */
        document.getElementById("reporte_neumatico").style.display      = "none";
        document.getElementById("reporte_camara").style.display         = "block";
        document.getElementById("reporte_aro").style.display            = "none";
        document.getElementById("reporte_protector").style.display      = "none";
        document.getElementById("reporte_accesorio").style.display      = "none";
        /* REPORTES */
        document.getElementById("div_nombre_camara").style.display      = "block";
        document.getElementById("div_nombre_neumatico").style.display   = "none";
        document.getElementById("div_nombre_aro").style.display         = "none";
        document.getElementById("div_nombre_protectore").style.display  = "none";
        document.getElementById("div_nombre_accesorio").style.display   = "none";

        document.getElementById("div_consul_produ_neu").style.display   = "none";
        document.getElementById("div_consul_produ_cam").style.display   = "block";
        document.getElementById("div_consul_produ_aro").style.display   = "none";
        document.getElementById("div_consul_produ_pro").style.display   = "none";
        document.getElementById("div_consul_produ_ace").style.display   = "none";
    } else if (opc == '3'){
        // alert('3');
        
        /* REPORTES */
        document.getElementById("reporte_neumatico").style.display      = "none";
        document.getElementById("reporte_camara").style.display         = "none";
        document.getElementById("reporte_aro").style.display            = "block";
        document.getElementById("reporte_protector").style.display      = "none";
        document.getElementById("reporte_accesorio").style.display      = "none";
        /* REPORTES */
        document.getElementById("div_nombre_aro").style.display         = "block";
        document.getElementById("div_nombre_protectore").style.display  = "none";
        document.getElementById("div_nombre_accesorio").style.display   = "none";
        document.getElementById("div_nombre_camara").style.display      = "none";
        document.getElementById("div_nombre_neumatico").style.display   = "none";

        document.getElementById("div_consul_produ_neu").style.display   = "none";
        document.getElementById("div_consul_produ_cam").style.display   = "none";
        document.getElementById("div_consul_produ_aro").style.display   = "block";
        document.getElementById("div_consul_produ_pro").style.display   = "none";
        document.getElementById("div_consul_produ_ace").style.display   = "none";
    } else if (opc == '4'){
        // alert('4');
           /* REPORTES */
           document.getElementById("reporte_neumatico").style.display      = "none";
           document.getElementById("reporte_camara").style.display         = "none";
           document.getElementById("reporte_aro").style.display            = "none";
           document.getElementById("reporte_protector").style.display      = "block";
           document.getElementById("reporte_accesorio").style.display      = "none";
           /* REPORTES */
        document.getElementById("div_nombre_protectore").style.display  = "block";

        document.getElementById("div_nombre_accesorio").style.display   = "none";
        document.getElementById("div_nombre_camara").style.display      = "none";
        document.getElementById("div_nombre_neumatico").style.display   = "none";
        document.getElementById("div_nombre_aro").style.display         = "none";


        document.getElementById("div_consul_produ_neu").style.display = "none";
        document.getElementById("div_consul_produ_cam").style.display = "none";
        document.getElementById("div_consul_produ_aro").style.display = "none";
        document.getElementById("div_consul_produ_pro").style.display = "block";
        document.getElementById("div_consul_produ_ace").style.display = "none";
    } else if (opc == '5'){
        // alert('5');
         /* REPORTES */
         document.getElementById("reporte_neumatico").style.display      = "none";
         document.getElementById("reporte_camara").style.display         = "none";
         document.getElementById("reporte_aro").style.display            = "none";
         document.getElementById("reporte_protector").style.display      = "none";
         document.getElementById("reporte_accesorio").style.display      = "block";
         /* REPORTES */
        document.getElementById("div_nombre_accesorio").style.display   = "block";
        document.getElementById("div_nombre_camara").style.display      = "none";
        document.getElementById("div_nombre_neumatico").style.display   = "none";
        document.getElementById("div_nombre_aro").style.display         = "none";
        document.getElementById("div_nombre_protectore").style.display  = "none";


        document.getElementById("div_consul_produ_neu").style.display = "none";
        document.getElementById("div_consul_produ_cam").style.display = "none";
        document.getElementById("div_consul_produ_aro").style.display = "none";
        document.getElementById("div_consul_produ_pro").style.display = "none";
        document.getElementById("div_consul_produ_ace").style.display = "block";
    }else{
        alert("no llego");
    }
}

function RNeu(){
    window.open('pdf_documentos/documentos/exemple08.php'); 
}
function RCam(){
    window.open('pdf_documentos/documentos/exemple09.php'); 
}
function RAro(){
    window.open('pdf_documentos/documentos/exemple10.php'); 
}

function RPro(){
    window.open('pdf_documentos/documentos/exemple11.php'); 
}

function RAce(){
    window.open('pdf_documentos/documentos/exemple12.php'); 
}







/*------------------------------ EDITAR PRODUCTOS  NEUMATICOS -------------------------------------------------- */

function PasarValorEdit() {
alert("--LLEGO-->");
    // var ClasiNom        = 'NE';
    // var sunat           ='';


    var xmarNom1        = document.getElementById("xmarNom1").value;
    var xneu_xaro       = document.getElementById("xneu_xaro").value;
    var neu_xanc        = document.getElementById("xneu_xanc").value;
    var neu_xuso        = document.getElementById("neu_xuso").value;
    var codigo1         = document.getElementById("nombre4").value;



    // alert("---Clasi-->"+ClasiNom);

    // if (xmarNom1 ==''){                             // SI VIENE VACIO
    //     var  xmarNom1    = document.getElementById("nombrmar1").value;
    // }else{
    //     var  xmarNom1    = document.getElementById("xmarNom1").value;
    // }

    // if (xmodNom ==''){                              // SI VIENE VACIO
    //     var xmodNom    = document.getElementById("nombrmod1").value;
    // }else{
    //     var xmodNom         = document.getElementById("xmodNom").value;
    // }

    if (neu_xuso == "PPE-PASAJEROS, USO PERMANENTE"){
        var neu_xuso = "PPE";
    } else if (neu_xuso == "PTE-PASAJEROS, USO TEMPORAL"){
        var neu_xuso = "PTE";
    } else if (neu_xuso == "CLT-COMERCIALES, PARA CAMIONETA DE CARGA, MICROBUSES O CAMIONES LIGEROS" ){
        var neu_xuso = "CLT";
    } else if (neu_xuso == "CTR-COMERCIALES, PARA CAMION Y/O OMNIBUS"){
        var neu_xuso = "CTR";
    } else if (neu_xuso == "CML-COMERCIALES, PARA USO MINERO Y FORESTAL"){
        var neu_xuso = "CML";
    } else if (neu_xuso == "CMH-COMERCIALES, PARA CASAS RODANTES"){
        var neu_xuso = "CMH";
    } else if (neu_xuso == "CST-COMERCIALES, REMOLCADORES EN CARRETERA"){
        var neu_xuso = "CST";
    } else if (neu_xuso == "ALN-AGRICOLAS"){
        var neu_xuso = "ALN";
    } else if (neu_xuso == "OTG-MAQUINARIA, TRACTORES NIVELADORAS"){
        var neu_xuso = "OTG";
    } else if (neu_xuso == "OTR-OTROS PARA MAQUINARIAS"){
        var neu_xuso = "OTR";
    }else {
        alert("Ingrese una opcion.");
    }

/* SUBSTR ---------------------SUBSTR */
var NewMarca    = xmarNom1.toUpperCase().substr(0,4).replace(" ","");
/* ------------------------------------ */
// alert("--Clasi->"+ClasiNom+"--Marca-->"+NewMarca+"--Ancho-->"+neu_xanc+"--Aro-->"+xneu_xaro+"--Uso-->"+neu_xuso);

// document.getElementById("nombreNeu").value = ClasiNom + NewMarca + neu_xanc + xneu_xaro + neu_xuso;

// document.getElementById("nombreC").value = ClasiNom + NewMarca + neu_xuso + xneu_xaro + neu_xanc;
document.getElementById("nombre4").value    = 'NE' + NewMarca + neu_xuso + xneu_xaro + neu_xanc  ;
document.getElementById("nombreSkuU").value = codigo2 ;
        // alert("-----LLEGO---0");

}




