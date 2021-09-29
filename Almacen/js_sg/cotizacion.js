

// /* ------------------------------------JQUERY------------------------------------- */
// $(document).ready(function(){

//     $("#bttn_cliente_natural").click(function(){
//         var cliRuc          = $('#ficha_ruc').val();            // RUC
//         var cliTpDocu       = $('#slct_docu').val();            // TIPO DOCUMENTO
//         var cliDocu         = $('#ficha_docu').val();           // DOCUMENTO
//         var cliRazon        = $('#ficha_razon').val();          // RAZON SOCIAL
//         var cliFiscal       = $('#ficha_direc_fiscal').val();   // DIRECCION FISCAL 
//         var cliLlega        = $('#ficha_direc_llega').val();    // DIRECCION LLEGADA
//         var cliTelf         = $('#ficha_telf').val();           // TELEFONO
//         var cliApelliPa     = $('#ficha_ape_pa').val();           // TELEFONO
//         var cliApelliMa     = $('#ficha_ape_mate').val();           // TELEFONO
//         var cliEstado       = $('#slct_civil').val();           // TELEFONO
//         var cliFechaNaci    = $('#filt_fecha_nace').val();           // TELEFONO
//         var cliEmailPr      = $('#ficha_email_pr').val();            // TIPO DOCUMENTO
//         var cliEmailSg      = $('#ficha_email_seg').val();            // TIPO DOCUMENTO
//         var cliClasi        = $('#slct_clasi').val();            // TIPO DOCUMENTO
//         var cliPago         = $('#slct_pago').val();            // TIPO DOCUMENTO
//         var cliPersVen      = $('#slct_vende').val();            // TIPO DOCUMENTO
//         var cliDepa         = $('#slct_depa').val();            // TIPO DOCUMENTO
//         var cliProvi        = $('#slct_provi').val();            // TIPO DOCUMENTO
//         var cliDistri       = $('#slct_distri').val();            // TIPO DOCUMENTO

//         if((!cliRuc) || (cliRuc == ' ')) {                        //-- VALIDACION RUC
//             alert('ERROR: Debe ingresar la Ruc.');
//             $('#ficha_ruc').addClass('fondoError');
//             return false;
//         }else{
//             $('#ficha_ruc').removeClass('fondoError');
//         }

//         if((!cliTpDocu) || (cliTpDocu == 0)){                     //-- VALIDACION TIPO DOCUMENTO
//             alert('ERROR: Debe ingresar el Tipo Documento.');
//             $('#slct_docu').addClass('fondoError');
//             return false;
//         }else{
//             $('#slct_docu').removeClass('fondoError');
//         }

//         if((!cliDocu) || (cliDocu == ' ')) {                        //-- VALIDACION N° DOCUMENTO
//             alert('ERROR: Debe ingresar la N° Documento.');
//             $('#ficha_docu').addClass('fondoError');
//             return false;
//         }else{
//             $('#ficha_docu').removeClass('fondoError');
//         }

//         if((!cliRazon) || (cliRazon == ' ')) {                        //-- VALIDACION RAZON SOCIAL
//             alert('ERROR: Debe ingresar la Razón Social .');
//             $('#ficha_razon').addClass('fondoError');
//             return false;
//         }else{
//             $('#ficha_razon').removeClass('fondoError');
//         }

//         if((!cliFiscal) || (cliFiscal == ' ')) {                        //-- VALIDACION DIRECCION FISCAL
//             alert('ERROR: Debe ingresar la Direccion Fiscal .');
//             $('#ficha_direc_fiscal').addClass('fondoError');
//             return false;
//         }else{
//             $('#ficha_direc_fiscal').removeClass('fondoError');
//         }

//         if((!cliLlega) || (cliLlega == ' ')) {                        //-- VALIDACION DIRECCION LlEGADA
//             alert('ERROR: Debe ingresar la Direccion Llegada .');
//             $('#ficha_direc_llega').addClass('fondoError');
//             return false;
//         }else{
//             $('#ficha_direc_llega').removeClass('fondoError');
//         }

//         if((!cliTelf) || (cliTelf == ' ')) {                        //-- VALIDACION TELEFONO
//             alert('ERROR: Debe ingresar la Telefono .');
//             $('#ficha_telf').addClass('fondoError');
//             return false;
//         }else{
//             $('#ficha_telf').removeClass('fondoError');
//         }

//         if((!cliApelliPa) || (cliApelliPa == ' ')) {                        //-- VALIDACION TELEFONO
//             alert('ERROR: Debe ingresar la Apellido Paterno .');
//             $('#ficha_ape_pa').addClass('fondoError');
//             return false;
//         }else{
//             $('#ficha_ape_pa').removeClass('fondoError');
//         }

//         if((!cliApelliMa) || (cliApelliMa =='  ')) {                        //-- VALIDACION TELEFONO
//             alert('ERROR: Debe ingresar la Apellido Materno .');
//             $('#ficha_ape_mate').addClass('fondoError');
//             return false;
//         }else{
//             $('#ficha_ape_mate').removeClass('fondoError');
//         }

        
//         if((!cliEstado) || (cliEstado == 0)){                     //-- VALIDACION ESTADO CIVIL
//             alert('ERROR: Debe ingresar el Estado Civil.');
//             $('#slct_civil').addClass('fondoError');
//             return false;
//         }else{
//             $('#slct_civil').removeClass('fondoError');
//         }

//         if((!cliFechaNaci) || (cliFechaNaci == 0)){                     //-- VALIDACION ESTADO CIVIL
//             alert('ERROR: Debe ingresar la Fecha de Nacimiento.');
//             $('#filt_fecha_nace').addClass('fondoError');
//             return false;
//         }else{
//             $('#filt_fecha_nace').removeClass('fondoError');
//         }

//         if((!cliEmailPr) || (cliEmailPr == ' ')) {                        //-- VALIDACION TELEFONO
//             alert('ERROR: Debe ingresar la Email (1).');
//             $('#ficha_contacto').addClass('fondoError');
//             return false;
//         }else{
//             $('#ficha_contacto').removeClass('fondoError');
//         }

//         if((!cliEmailSg) || (cliEmailSg == ' ')) {                        //-- VALIDACION TELEFONO
//             alert('ERROR: Debe ingresar la Email (2).');
//             $('#ficha_contacto').addClass('fondoError');
//             return false;
//         }else{
//             $('#ficha_contacto').removeClass('fondoError');
//         }

//         if((!cliClasi) || (cliClasi == 0)){                     //-- VALIDACION TIPO DOCUMENTO
//             alert('ERROR: Debe ingresar la Clasificacion.');
//             $('#slct_clasi').addClass('fondoError');
//             return false;
//         }else{
//             $('#slct_clasi').removeClass('fondoError');
//         }

//         if((!cliPago) || (cliPago == 0)){                     //-- VALIDACION TIPO DOCUMENTO
//             alert('ERROR: Debe ingresar la Forma de Pago.');
//             $('#slct_pago').addClass('fondoError');
//             return false;
//         }else{
//             $('#slct_pago').removeClass('fondoError');
//         }

//         if((!cliPago) || (cliPago == 0)){                     //-- VALIDACION TIPO DOCUMENTO
//             alert('ERROR: Debe ingresar la Forma de Pago.');
//             $('#slct_pago').addClass('fondoError');
//             return false;
//         }else{
//             $('#slct_pago').removeClass('fondoError');
//         }

//         if((!cliPersVen) || (cliPersVen == 0)){                     //-- VALIDACION TIPO DOCUMENTO
//             alert('ERROR: Debe ingresar la Forma de Pago.');
//             $('#slct_pago').addClass('fondoError');
//             return false;
//         }else{
//             $('#slct_pago').removeClass('fondoError');
//         }

//         if((!cliDepa) || (cliDepa == 0)){                     //-- VALIDACION TIPO DOCUMENTO
//             alert('ERROR: Debe ingresar el Departamento.');
//             $('#slct_depa').addClass('fondoError');
//             return false;
//         }else{
//             $('#slct_depa').removeClass('fondoError');
//         }

//         if((!cliProvi) || (cliProvi == 0)){                     //-- VALIDACION TIPO DOCUMENTO
//             alert('ERROR: Debe ingresar la Provincia.');
//             $('#slct_provi').addClass('fondoError');
//             return false;
//         }else{
//             $('#slct_provi').removeClass('fondoError');
//         }

//         if((!cliDistri) || (cliDistri == 0)){                     //-- VALIDACION TIPO DOCUMENTO
//             alert('ERROR: Debe ingresar el Distrito.');
//             $('#slct_distri').addClass('fondoError');
//             return false;
//         }else{
//             $('#slct_distri').removeClass('fondoError');
//         }






//     });

//     $("#bttn_cliente_juridico").click(function(){
        
//         var cliRuc      = $('#ficha_ruc').val();            // RUC
//         var cliTpDocu   = $('#slct_docu').val();            // TIPO DOCUMENTO
//         var cliDocu     = $('#ficha_docu').val();           // DOCUMENTO
//         var cliRazon    = $('#ficha_razon').val();          // RAZON SOCIAL
//         var cliFiscal   = $('#ficha_direc_fiscal').val();   // DIRECCION FISCAL 
//         var cliLlega    = $('#ficha_direc_llega').val();    // DIRECCION LLEGADA
//         var cliTelf     = $('#ficha_telf').val();           // TELEFONO
//         var cliConta    = $('#ficha_contacto').val();       // CONTACTO
//         var cliCargo     = $('#ficha_cargo').val();            // TIPO DOCUMENTO
//         var cliTpDocu    = $('#slct_docu').val();            // TIPO DOCUMENTO
//         var cliEmailPr   = $('#ficha_email_pr').val();            // TIPO DOCUMENTO
//         var cliEmailSg   = $('#ficha_email_seg').val();            // TIPO DOCUMENTO
//         var cliClasi     = $('#slct_clasi').val();            // TIPO DOCUMENTO
//         var cliPago      = $('#slct_pago').val();            // TIPO DOCUMENTO
//         var cliPersVen   = $('#slct_vende').val();            // TIPO DOCUMENTO
//         var cliDepa     = $('#slct_depa').val();            // TIPO DOCUMENTO
//         var cliProvi    = $('#slct_provi').val();            // TIPO DOCUMENTO
//         var cliDistri   = $('#slct_distri').val();            // TIPO DOCUMENTO


//         if((!cliRuc) || (cliRuc == ' ')) {                        //-- VALIDACION RUC
//             alert('ERROR: Debe ingresar la Ruc.');
//             $('#ficha_ruc').addClass('fondoError');
//             return false;
//         }else{
//             $('#ficha_ruc').removeClass('fondoError');
//         }

//         if((!cliTpDocu) || (cliTpDocu == 0)){                     //-- VALIDACION TIPO DOCUMENTO
//             alert('ERROR: Debe ingresar el Tipo Documento.');
//             $('#slct_docu').addClass('fondoError');
//             return false;
//         }else{
//             $('#slct_docu').removeClass('fondoError');
//         }

//         if((!cliDocu) || (cliDocu == ' ')) {                        //-- VALIDACION N° DOCUMENTO
//             alert('ERROR: Debe ingresar la N° Documento.');
//             $('#ficha_docu').addClass('fondoError');
//             return false;
//         }else{
//             $('#ficha_docu').removeClass('fondoError');
//         }

//         if((!cliRazon) || (cliRazon == ' ')) {                        //-- VALIDACION RAZON SOCIAL
//             alert('ERROR: Debe ingresar la Razón Social .');
//             $('#ficha_razon').addClass('fondoError');
//             return false;
//         }else{
//             $('#ficha_razon').removeClass('fondoError');
//         }

//         if((!cliFiscal) || (cliFiscal == ' ')) {                        //-- VALIDACION DIRECCION FISCAL
//             alert('ERROR: Debe ingresar la Direccion Fiscal .');
//             $('#ficha_direc_fiscal').addClass('fondoError');
//             return false;
//         }else{
//             $('#ficha_direc_fiscal').removeClass('fondoError');
//         }

//         if((!cliLlega) || (cliLlega == ' ')) {                        //-- VALIDACION DIRECCION LlEGADA
//             alert('ERROR: Debe ingresar la Direccion Llegada .');
//             $('#ficha_direc_llega').addClass('fondoError');
//             return false;
//         }else{
//             $('#ficha_direc_llega').removeClass('fondoError');
//         }

//         if((!cliTelf) || (cliTelf == ' ')) {                        //-- VALIDACION TELEFONO
//             alert('ERROR: Debe ingresar la Telefono .');
//             $('#ficha_telf').addClass('fondoError');
//             return false;
//         }else{
//             $('#ficha_telf').removeClass('fondoError');
//         }
        
//         if((!cliConta) || (cliConta == ' ')) {                        //-- VALIDACION TELEFONO
//             alert('ERROR: Debe ingresar la Contacto .');
//             $('#ficha_contacto').addClass('fondoError');
//             return false;
//         }else{
//             $('#ficha_contacto').removeClass('fondoError');
//         }

//         if((!cliCargo) || (cliCargo == ' ')) {                        //-- VALIDACION TELEFONO
//             alert('ERROR: Debe ingresar la Cargo .');
//             $('#ficha_contacto').addClass('fondoError');
//             return false;
//         }else{
//             $('#ficha_contacto').removeClass('fondoError');
//         }
//         if((!cliEmailPr) || (cliEmailPr == ' ')) {                        //-- VALIDACION TELEFONO
//             alert('ERROR: Debe ingresar la Email (1).');
//             $('#ficha_contacto').addClass('fondoError');
//             return false;
//         }else{
//             $('#ficha_contacto').removeClass('fondoError');
//         }

//         if((!cliEmailSg) || (cliEmailSg == ' ')) {                        //-- VALIDACION TELEFONO
//             alert('ERROR: Debe ingresar la Email (2).');
//             $('#ficha_contacto').addClass('fondoError');
//             return false;
//         }else{
//             $('#ficha_contacto').removeClass('fondoError');
//         }

//         if((!cliClasi) || (cliClasi == 0)){                     //-- VALIDACION TIPO DOCUMENTO
//             alert('ERROR: Debe ingresar la Clasificacion.');
//             $('#slct_clasi').addClass('fondoError');
//             return false;
//         }else{
//             $('#slct_clasi').removeClass('fondoError');
//         }

//         if((!cliPago) || (cliPago == 0)){                     //-- VALIDACION TIPO DOCUMENTO
//             alert('ERROR: Debe ingresar la Forma de Pago.');
//             $('#slct_pago').addClass('fondoError');
//             return false;
//         }else{
//             $('#slct_pago').removeClass('fondoError');
//         }

//         if((!cliPago) || (cliPago == 0)){                     //-- VALIDACION TIPO DOCUMENTO
//             alert('ERROR: Debe ingresar la Forma de Pago.');
//             $('#slct_pago').addClass('fondoError');
//             return false;
//         }else{
//             $('#slct_pago').removeClass('fondoError');
//         }

//         if((!cliPersVen) || (cliPersVen == 0)){                     //-- VALIDACION TIPO DOCUMENTO
//             alert('ERROR: Debe ingresar la Forma de Pago.');
//             $('#slct_pago').addClass('fondoError');
//             return false;
//         }else{
//             $('#slct_pago').removeClass('fondoError');
//         }

//         if((!cliDepa) || (cliDepa == 0)){                     //-- VALIDACION TIPO DOCUMENTO
//             alert('ERROR: Debe ingresar el Departamento.');
//             $('#slct_depa').addClass('fondoError');
//             return false;
//         }else{
//             $('#slct_depa').removeClass('fondoError');
//         }

//         if((!cliProvi) || (cliProvi == 0)){                     //-- VALIDACION TIPO DOCUMENTO
//             alert('ERROR: Debe ingresar la Provincia.');
//             $('#slct_provi').addClass('fondoError');
//             return false;
//         }else{
//             $('#slct_provi').removeClass('fondoError');
//         }

//         if((!cliDistri) || (cliDistri == 0)){                     //-- VALIDACION TIPO DOCUMENTO
//             alert('ERROR: Debe ingresar el Distrito.');
//             $('#slct_distri').addClass('fondoError');
//             return false;
//         }else{
//             $('#slct_distri').removeClass('fondoError');
//         }
       
//     });

//     $("#bttn_nuevo").click(function(){
//         var slctTpPers = $('#slct_tp_pers').val();           // DOCUMENTO

//         if(slctTpPers == 'JURIDICO'){
//             var cliRuc      = $('#ficha_ruc').val();            // RUC
//             var cliTpDocu   = $('#slct_docu').val();            // TIPO DOCUMENTO
//             var cliDocu     = $('#ficha_docu').val();           // DOCUMENTO
//             var cliRazon    = $('#ficha_razon').val();          // RAZON SOCIAL
//             var cliFiscal   = $('#ficha_direc_fiscal').val();   // DIRECCION FISCAL 
//             var cliLlega    = $('#ficha_direc_llega').val();    // DIRECCION LLEGADA
//             var cliTelf     = $('#ficha_telf').val();           // TELEFONO
//             var cliConta    = $('#ficha_contacto').val();       // CONTACTO
//             var cliCargo     = $('#ficha_cargo').val();            // TIPO DOCUMENTO
//             var cliTpDocu    = $('#slct_docu').val();            // TIPO DOCUMENTO
//             var cliEmailPr   = $('#ficha_email_pr').val();            // TIPO DOCUMENTO
//             var cliEmailSg   = $('#ficha_email_seg').val();            // TIPO DOCUMENTO
//             var cliClasi     = $('#slct_clasi').val();            // TIPO DOCUMENTO
//             var cliPago      = $('#slct_pago').val();            // TIPO DOCUMENTO
//             var cliPersVen   = $('#slct_vende').val();            // TIPO DOCUMENTO
//             var cliDepa     = $('#slct_depa').val();            // TIPO DOCUMENTO
//             var cliProvi    = $('#slct_provi').val();            // TIPO DOCUMENTO
//             var cliDistri   = $('#slct_distri').val();            // TIPO DOCUMENTO
    
    
//             if((!cliRuc) || (cliRuc == ' ')) {                        //-- VALIDACION RUC
//                 alert('ERROR: Debe ingresar la Ruc.');
//                 $('#ficha_ruc').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#ficha_ruc').removeClass('fondoError');
//             }
    
//             if((!cliTpDocu) || (cliTpDocu == 0)){                     //-- VALIDACION TIPO DOCUMENTO
//                 alert('ERROR: Debe ingresar el Tipo Documento.');
//                 $('#slct_docu').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#slct_docu').removeClass('fondoError');
//             }
    
//             if((!cliDocu) || (cliDocu == ' ')) {                        //-- VALIDACION N° DOCUMENTO
//                 alert('ERROR: Debe ingresar la N° Documento.');
//                 $('#ficha_docu').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#ficha_docu').removeClass('fondoError');
//             }
    
//             if((!cliRazon) || (cliRazon == ' ')) {                        //-- VALIDACION RAZON SOCIAL
//                 alert('ERROR: Debe ingresar la Razón Social .');
//                 $('#ficha_razon').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#ficha_razon').removeClass('fondoError');
//             }
    
//             if((!cliFiscal) || (cliFiscal == ' ')) {                        //-- VALIDACION DIRECCION FISCAL
//                 alert('ERROR: Debe ingresar la Direccion Fiscal .');
//                 $('#ficha_direc_fiscal').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#ficha_direc_fiscal').removeClass('fondoError');
//             }
    
//             if((!cliLlega) || (cliLlega == ' ')) {                        //-- VALIDACION DIRECCION LlEGADA
//                 alert('ERROR: Debe ingresar la Direccion Llegada .');
//                 $('#ficha_direc_llega').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#ficha_direc_llega').removeClass('fondoError');
//             }
    
//             if((!cliTelf) || (cliTelf == ' ')) {                        //-- VALIDACION TELEFONO
//                 alert('ERROR: Debe ingresar la Telefono .');
//                 $('#ficha_telf').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#ficha_telf').removeClass('fondoError');
//             }
            
//             if((!cliConta) || (cliConta == ' ')) {                        //-- VALIDACION TELEFONO
//                 alert('ERROR: Debe ingresar la Contacto .');
//                 $('#ficha_contacto').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#ficha_contacto').removeClass('fondoError');
//             }
    
//             if((!cliCargo) || (cliCargo == ' ')) {                        //-- VALIDACION TELEFONO
//                 alert('ERROR: Debe ingresar la Cargo .');
//                 $('#ficha_contacto').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#ficha_contacto').removeClass('fondoError');
//             }
//             if((!cliEmailPr) || (cliEmailPr == ' ')) {                        //-- VALIDACION TELEFONO
//                 alert('ERROR: Debe ingresar la Email (1).');
//                 $('#ficha_contacto').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#ficha_contacto').removeClass('fondoError');
//             }
    
//             if((!cliEmailSg) || (cliEmailSg == ' ')) {                        //-- VALIDACION TELEFONO
//                 alert('ERROR: Debe ingresar la Email (2).');
//                 $('#ficha_contacto').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#ficha_contacto').removeClass('fondoError');
//             }
    
//             if((!cliClasi) || (cliClasi == 0)){                     //-- VALIDACION TIPO DOCUMENTO
//                 alert('ERROR: Debe ingresar la Clasificacion.');
//                 $('#slct_clasi').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#slct_clasi').removeClass('fondoError');
//             }
    
//             if((!cliPago) || (cliPago == 0)){                     //-- VALIDACION TIPO DOCUMENTO
//                 alert('ERROR: Debe ingresar la Forma de Pago.');
//                 $('#slct_pago').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#slct_pago').removeClass('fondoError');
//             }
    
//             if((!cliPago) || (cliPago == 0)){                     //-- VALIDACION TIPO DOCUMENTO
//                 alert('ERROR: Debe ingresar la Forma de Pago.');
//                 $('#slct_pago').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#slct_pago').removeClass('fondoError');
//             }
    
//             if((!cliPersVen) || (cliPersVen == 0)){                     //-- VALIDACION TIPO DOCUMENTO
//                 alert('ERROR: Debe ingresar la Forma de Pago.');
//                 $('#slct_pago').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#slct_pago').removeClass('fondoError');
//             }
    
//             if((!cliDepa) || (cliDepa == 0)){                     //-- VALIDACION TIPO DOCUMENTO
//                 alert('ERROR: Debe ingresar el Departamento.');
//                 $('#slct_depa').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#slct_depa').removeClass('fondoError');
//             }
    
//             if((!cliProvi) || (cliProvi == 0)){                     //-- VALIDACION TIPO DOCUMENTO
//                 alert('ERROR: Debe ingresar la Provincia.');
//                 $('#slct_provi').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#slct_provi').removeClass('fondoError');
//             }
    
//             if((!cliDistri) || (cliDistri == 0)){                     //-- VALIDACION TIPO DOCUMENTO
//                 alert('ERROR: Debe ingresar el Distrito.');
//                 $('#slct_distri').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#slct_distri').removeClass('fondoError');
//             }
//         }else if(slctTpPers == 'NATURAL'){
//             var cliRuc          = $('#ficha_ruc').val();            // RUC
//             var cliTpDocu       = $('#slct_docu').val();            // TIPO DOCUMENTO
//             var cliDocu         = $('#ficha_docu').val();           // DOCUMENTO
//             var cliRazon        = $('#ficha_razon').val();          // RAZON SOCIAL
//             var cliFiscal       = $('#ficha_direc_fiscal').val();   // DIRECCION FISCAL 
//             var cliLlega        = $('#ficha_direc_llega').val();    // DIRECCION LLEGADA
//             var cliTelf         = $('#ficha_telf').val();           // TELEFONO
//             var cliApelliPa     = $('#ficha_ape_pa').val();           // TELEFONO
//             var cliApelliMa     = $('#ficha_ape_mate').val();           // TELEFONO
//             var cliEstado       = $('#slct_civil').val();           // TELEFONO
//             var cliFechaNaci    = $('#filt_fecha_nace').val();           // TELEFONO
//             var cliEmailPr      = $('#ficha_email_pr').val();            // TIPO DOCUMENTO
//             var cliEmailSg      = $('#ficha_email_seg').val();            // TIPO DOCUMENTO
//             var cliClasi        = $('#slct_clasi').val();            // TIPO DOCUMENTO
//             var cliPago         = $('#slct_pago').val();            // TIPO DOCUMENTO
//             var cliPersVen      = $('#slct_vende').val();            // TIPO DOCUMENTO
//             var cliDepa         = $('#slct_depa').val();            // TIPO DOCUMENTO
//             var cliProvi        = $('#slct_provi').val();            // TIPO DOCUMENTO
//             var cliDistri       = $('#slct_distri').val();            // TIPO DOCUMENTO
    
//             if((!cliRuc) || (cliRuc == ' ')) {                        //-- VALIDACION RUC
//                 alert('ERROR: Debe ingresar la Ruc.');
//                 $('#ficha_ruc').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#ficha_ruc').removeClass('fondoError');
//             }
    
//             if((!cliTpDocu) || (cliTpDocu == 0)){                     //-- VALIDACION TIPO DOCUMENTO
//                 alert('ERROR: Debe ingresar el Tipo Documento.');
//                 $('#slct_docu').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#slct_docu').removeClass('fondoError');
//             }
    
//             if((!cliDocu) || (cliDocu == ' ')) {                        //-- VALIDACION N° DOCUMENTO
//                 alert('ERROR: Debe ingresar la N° Documento.');
//                 $('#ficha_docu').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#ficha_docu').removeClass('fondoError');
//             }
    
//             if((!cliRazon) || (cliRazon == ' ')) {                        //-- VALIDACION RAZON SOCIAL
//                 alert('ERROR: Debe ingresar la Razón Social .');
//                 $('#ficha_razon').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#ficha_razon').removeClass('fondoError');
//             }
    
//             if((!cliFiscal) || (cliFiscal == ' ')) {                        //-- VALIDACION DIRECCION FISCAL
//                 alert('ERROR: Debe ingresar la Direccion Fiscal .');
//                 $('#ficha_direc_fiscal').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#ficha_direc_fiscal').removeClass('fondoError');
//             }
    
//             if((!cliLlega) || (cliLlega == ' ')) {                        //-- VALIDACION DIRECCION LlEGADA
//                 alert('ERROR: Debe ingresar la Direccion Llegada .');
//                 $('#ficha_direc_llega').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#ficha_direc_llega').removeClass('fondoError');
//             }
    
//             if((!cliTelf) || (cliTelf == ' ')) {                        //-- VALIDACION TELEFONO
//                 alert('ERROR: Debe ingresar la Telefono .');
//                 $('#ficha_telf').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#ficha_telf').removeClass('fondoError');
//             }
    
//             if((!cliApelliPa) || (cliApelliPa == ' ')) {                        //-- VALIDACION TELEFONO
//                 alert('ERROR: Debe ingresar la Apellido Paterno .');
//                 $('#ficha_ape_pa').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#ficha_ape_pa').removeClass('fondoError');
//             }
    
//             if((!cliApelliMa) || (cliApelliMa =='  ')) {                        //-- VALIDACION TELEFONO
//                 alert('ERROR: Debe ingresar la Apellido Materno .');
//                 $('#ficha_ape_mate').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#ficha_ape_mate').removeClass('fondoError');
//             }
    
            
//             if((!cliEstado) || (cliEstado == 0)){                     //-- VALIDACION ESTADO CIVIL
//                 alert('ERROR: Debe ingresar el Estado Civil.');
//                 $('#slct_civil').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#slct_civil').removeClass('fondoError');
//             }
    
//             if((!cliFechaNaci) || (cliFechaNaci == 0)){                     //-- VALIDACION ESTADO CIVIL
//                 alert('ERROR: Debe ingresar la Fecha de Nacimiento.');
//                 $('#filt_fecha_nace').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#filt_fecha_nace').removeClass('fondoError');
//             }
    
//             if((!cliEmailPr) || (cliEmailPr == ' ')) {                        //-- VALIDACION TELEFONO
//                 alert('ERROR: Debe ingresar la Email (1).');
//                 $('#ficha_contacto').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#ficha_contacto').removeClass('fondoError');
//             }
    
//             if((!cliEmailSg) || (cliEmailSg == ' ')) {                        //-- VALIDACION TELEFONO
//                 alert('ERROR: Debe ingresar la Email (2).');
//                 $('#ficha_contacto').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#ficha_contacto').removeClass('fondoError');
//             }
    
//             if((!cliClasi) || (cliClasi == 0)){                     //-- VALIDACION TIPO DOCUMENTO
//                 alert('ERROR: Debe ingresar la Clasificacion.');
//                 $('#slct_clasi').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#slct_clasi').removeClass('fondoError');
//             }
    
//             if((!cliPago) || (cliPago == 0)){                     //-- VALIDACION TIPO DOCUMENTO
//                 alert('ERROR: Debe ingresar la Forma de Pago.');
//                 $('#slct_pago').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#slct_pago').removeClass('fondoError');
//             }
    
//             if((!cliPersVen) || (cliPersVen == 0)){                     //-- VALIDACION TIPO DOCUMENTO
//                 alert('ERROR: Debe ingresar la Forma de Pago.');
//                 $('#slct_pago').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#slct_pago').removeClass('fondoError');
//             }
    
//             if((!cliDepa) || (cliDepa == 0)){                     //-- VALIDACION TIPO DOCUMENTO
//                 alert('ERROR: Debe ingresar el Departamento.');
//                 $('#slct_depa').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#slct_depa').removeClass('fondoError');
//             }
    
//             if((!cliProvi) || (cliProvi == 0)){                     //-- VALIDACION TIPO DOCUMENTO
//                 alert('ERROR: Debe ingresar la Provincia.');
//                 $('#slct_provi').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#slct_provi').removeClass('fondoError');
//             }
    
//             if((!cliDistri) || (cliDistri == 0)){                     //-- VALIDACION TIPO DOCUMENTO
//                 alert('ERROR: Debe ingresar el Distrito.');
//                 $('#slct_distri').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#slct_distri').removeClass('fondoError');
//             }
    
    
//         }else if(slctTpPers == 'NATURAL-DNI'){

//             var cliTpDocu       = $('#slct_docu').val();            // TIPO DOCUMENTO
//             var cliDocu         = $('#ficha_docu').val();           // DOCUMENTO
//             var cliFiscal       = $('#ficha_direc_fiscal').val();   // DIRECCION FISCAL 
//             var cliLlega        = $('#ficha_direc_llega').val();    // DIRECCION LLEGADA
//             var cliTelf         = $('#ficha_telf').val();           // TELEFONO
//             var cliApelliPa     = $('#ficha_ape_pa').val();           // TELEFONO
//             var cliApelliMa     = $('#ficha_ape_mate').val();           // TELEFONO
//             var cliEstado       = $('#slct_civil').val();           // TELEFONO
//             var cliFechaNaci    = $('#filt_fecha_nace').val();           // TELEFONO
//             var cliEmailPr      = $('#ficha_email_pr').val();            // TIPO DOCUMENTO
//             var cliEmailSg      = $('#ficha_email_seg').val();            // TIPO DOCUMENTO
//             var cliClasi        = $('#slct_clasi').val();            // TIPO DOCUMENTO
//             var cliPago         = $('#slct_pago').val();            // TIPO DOCUMENTO
//             var cliPersVen      = $('#slct_vende').val();            // TIPO DOCUMENTO
//             var cliDepa         = $('#slct_depa').val();            // TIPO DOCUMENTO
//             var cliProvi        = $('#slct_provi').val();            // TIPO DOCUMENTO
//             var cliDistri       = $('#slct_distri').val();            // TIPO DOCUMENTO
    
//             if((!cliTpDocu) || (cliTpDocu == 0)){                     //-- VALIDACION TIPO DOCUMENTO
//                 alert('ERROR: Debe ingresar el Tipo Documento.');
//                 $('#slct_docu').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#slct_docu').removeClass('fondoError');
//             }
    
//             if((!cliDocu) || (cliDocu == ' ')) {                        //-- VALIDACION N° DOCUMENTO
//                 alert('ERROR: Debe ingresar la N° Documento.');
//                 $('#ficha_docu').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#ficha_docu').removeClass('fondoError');
//             }
    
//             if((!cliFiscal) || (cliFiscal == ' ')) {                        //-- VALIDACION DIRECCION FISCAL
//                 alert('ERROR: Debe ingresar la Direccion Fiscal .');
//                 $('#ficha_direc_fiscal').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#ficha_direc_fiscal').removeClass('fondoError');
//             }
    
//             if((!cliLlega) || (cliLlega == ' ')) {                        //-- VALIDACION DIRECCION LlEGADA
//                 alert('ERROR: Debe ingresar la Direccion Llegada .');
//                 $('#ficha_direc_llega').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#ficha_direc_llega').removeClass('fondoError');
//             }
    
//             if((!cliTelf) || (cliTelf == ' ')) {                        //-- VALIDACION TELEFONO
//                 alert('ERROR: Debe ingresar la Telefono .');
//                 $('#ficha_telf').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#ficha_telf').removeClass('fondoError');
//             }
    
//             if((!cliApelliPa) || (cliApelliPa == ' ')) {                        //-- VALIDACION TELEFONO
//                 alert('ERROR: Debe ingresar la Apellido Paterno .');
//                 $('#ficha_ape_pa').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#ficha_ape_pa').removeClass('fondoError');
//             }
    
//             if((!cliApelliMa) || (cliApelliMa =='  ')) {                        //-- VALIDACION TELEFONO
//                 alert('ERROR: Debe ingresar la Apellido Materno .');
//                 $('#ficha_ape_mate').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#ficha_ape_mate').removeClass('fondoError');
//             }
    
            
//             if((!cliEstado) || (cliEstado == 0)){                     //-- VALIDACION ESTADO CIVIL
//                 alert('ERROR: Debe ingresar el Estado Civil.');
//                 $('#slct_civil').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#slct_civil').removeClass('fondoError');
//             }
    
//             if((!cliFechaNaci) || (cliFechaNaci == 0)){                     //-- VALIDACION ESTADO CIVIL
//                 alert('ERROR: Debe ingresar la Fecha de Nacimiento.');
//                 $('#filt_fecha_nace').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#filt_fecha_nace').removeClass('fondoError');
//             }
    
//             if((!cliEmailPr) || (cliEmailPr == ' ')) {                        //-- VALIDACION TELEFONO
//                 alert('ERROR: Debe ingresar la Email (1).');
//                 $('#ficha_contacto').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#ficha_contacto').removeClass('fondoError');
//             }
    
//             if((!cliEmailSg) || (cliEmailSg == ' ')) {                        //-- VALIDACION TELEFONO
//                 alert('ERROR: Debe ingresar la Email (2).');
//                 $('#ficha_contacto').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#ficha_contacto').removeClass('fondoError');
//             }
    
//             if((!cliClasi) || (cliClasi == 0)){                     //-- VALIDACION TIPO DOCUMENTO
//                 alert('ERROR: Debe ingresar la Clasificacion.');
//                 $('#slct_clasi').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#slct_clasi').removeClass('fondoError');
//             }
    
//             if((!cliPago) || (cliPago == 0)){                     //-- VALIDACION TIPO DOCUMENTO
//                 alert('ERROR: Debe ingresar la Forma de Pago.');
//                 $('#slct_pago').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#slct_pago').removeClass('fondoError');
//             }
    
//             if((!cliPersVen) || (cliPersVen == 0)){                     //-- VALIDACION TIPO DOCUMENTO
//                 alert('ERROR: Debe ingresar la Forma de Pago.');
//                 $('#slct_pago').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#slct_pago').removeClass('fondoError');
//             }
    
//             if((!cliDepa) || (cliDepa == 0)){                     //-- VALIDACION TIPO DOCUMENTO
//                 alert('ERROR: Debe ingresar el Departamento.');
//                 $('#slct_depa').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#slct_depa').removeClass('fondoError');
//             }
    
//             if((!cliProvi) || (cliProvi == 0)){                     //-- VALIDACION TIPO DOCUMENTO
//                 alert('ERROR: Debe ingresar la Provincia.');
//                 $('#slct_provi').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#slct_provi').removeClass('fondoError');
//             }
    
//             if((!cliDistri) || (cliDistri == 0)){                     //-- VALIDACION TIPO DOCUMENTO
//                 alert('ERROR: Debe ingresar el Distrito.');
//                 $('#slct_distri').addClass('fondoError');
//                 return false;
//             }else{
//                 $('#slct_distri').removeClass('fondoError');
//             }
    
            
//         }else{
//             alert("--->Error No llego nada");
//         }
    
//     });

// });

 


// /* ------------------------------------JQUERY------------------------------------- */


    // function FormOcultarCotiza(opc){ // CONTROLA DISPLAY NONE EN LA PANTALLA 

    //     if(opc=='1'){
    //     document.getElementById("div_btn").style.display	        = "none";
    //     document.getElementById("div_consul_coti").style.display	= "none";
    //     document.getElementById("div_nuevo_coti").style.display	    = "block";	
    //     }else{
    //     // document.getElementById("div_btn").style.display	            = "none";
    //     document.getElementById("div_consul_coti").style.display	= "block";
    //     document.getElementById("div_nuevo_coti").style.display	    = "none";

    //     }
    // }


//     function cargarProvincias(depa_cod){
//         var url = "../Almacen/Funciones/Cliente/Cliente_Ajax.php?buscar=p&id="+depa_cod;
//         cargaDinamica(url,"#slct_provi","p");
//     }

//     function cargarDistrito(){
//         var departamento =document.getElementById("slct_depa");
//         departamento = departamento.options[departamento.selectedIndex].innerHTML;
//         var provincia =document.getElementById("slct_provi");
//         provincia = provincia.options[provincia.selectedIndex].innerHTML; 
//         var url = "../Almacen/Funciones/Cliente/Cliente_Ajax.php?buscar=d&depa="+departamento+"&prov="+provincia;
//         cargaDinamica(url,"#slct_distri","d");
//     }


//     function cargaDinamica(ruta,elemento,buscar){
//         $.ajax({
//             url:ruta,
//             cache:false,
//             type:"GET",
//             beforeSend:function(){
//                 //alert(ruta);
//             },
//             success:function(response){
//                 //Limpiar elemento
//                 // console.log(response);
//                 $(elemento).html("");
//                 $(elemento).append("<option value=''>Seleccione...</option>");
//                 $.each(response,function(index,value){
//                     if(buscar=="p"){
//                         //combo
//                         $(elemento).append("<option value='"+value.codigo+"' onclick='cargarDistrito();'>"+value.nombre+"</option>");
//                     }else if(buscar=="d"){
//                         //combo
//                         $(elemento).append("<option value='"+value.codigo+"' onclick='mostrarUbigeo("+value.codigo+")'>"+value.nombre+"</option>");
                        
//                     }
//                 });
//             },
//             error:function(xhr){

//             }
//         })
//     }

//     // function mostrarUbigeo(codigo){
//     //     $("#ficha_ubigeo").val(codigo);
//     // }

//     // function CmpClienteProveedor(opc){               // CONTROLA LOS DISABLED DE LA PANTALLA 

//     //     opc = parseInt(opc);
//     //     switch (opc){
           
//     //         case 0: // CLIENTES
//     //         $('#slct_tp_pers').val('0'); 
//     //         $('#slct_tp_pers').prop('disabled',false);               
//     //         $('#natural_dni').prop('disabled',false);
//     //         break;
//     //         case 1: // PROVEEDOR
//     //         $('#slct_tp_pers').val('0');
//     //         $('#slct_tp_pers').prop('disabled',false);             
//     //         $('#natural_dni').prop('disabled',true);
//     //         break;
//     //     }

//     // }

//     function CmpCliente(opc){               // CONTROLA LOS DISABLED DE LA PANTALLA 

//         opc = parseInt(opc);
//         switch (opc){
//             case 0: // JURIDICO

//                 /* -----------------------------CAMPOS DISABLED ----------------------------- */
//                 $('#ficha_ape_pa').prop('disabled',true);               //-- APELLIDO PATERNO
//                 $('#ficha_ape_mate').prop('disabled',true);             //-- APELLIDO MATERNO
//                 $('#ficha_nombre_pr').prop('disabled',true);            //-- PRIMER NOMBRE
//                 $('#ficha_nombre_seg').prop('disabled',true);           //-- SEGUNDO NOMBRE  
//                 $('#slct_civil').prop('disabled',true);                 //-- ESTADO CIVIL
//                 $('#filt_fecha_nace').prop('disabled',true);            //-- FECHA NACIMIENTO
                
//                 /* -------------------------------------------------------------------------  */
//                 $('#ficha_ruc').prop('disabled',false);                 //-- RUC
//                 $('#slct_docu').prop('disabled',false);                 //-- TIPO-DOCUMENTO
//                 $('#ficha_docu').prop('disabled',false);                //-- DOCUMENTO
//                 $('#ficha_razon').prop('disabled',false);               //-- RAZON SOCIAL
//                 $('#ficha_direc_fiscal').prop('disabled',false);        //-- DIRECCION FICAL
//                 $('#ficha_direc_llega').prop('disabled',false);         //-- DIRECCION LLEGADA
//                 $('#ficha_telf').prop('disabled',false);                //-- TELEFONO
//                 $('#ficha_contacto').prop('disabled',false);            //-- CONTACTO
//                 $('#ficha_cargo').prop('disabled',false);               //-- CARGO
//                 $('#ficha_email_pr').prop('disabled',false);            //-- PRIMER EMAIL
//                 $('#ficha_email_seg').prop('disabled',false);           //-- SEGUNDO EMAIL
//                 $('#slct_clasi').prop('disabled',false);                //-- TIPO-CLASIFICACION
//                 $('#slct_pago').prop('disabled',false);                 //-- TIPO-PAGO
//                 $('#slct_vende').prop('disabled',false);                //-- PERSONAL DE VENTA
//                 $('#slct_depa').prop('disabled',false);                 //-- DEPARTAMENTO
//                 $('#slct_provi').prop('disabled',false);                //-- PROVINCIA
//                 $('#slct_distri').prop('disabled',false);               //-- DISTRITO
//                 $('#bttn_nuevo').prop('disabled',false);               //-- DISTRITO
                
 
//             break;
//             case 1: // NATURAL
//                 /* -----------------------------CAMPOS DISABLED ----------------------------- */
//                 $('#ficha_razon').prop('disabled',true);                //-- RAZON SOCIAL
//                 $('#ficha_contacto').prop('disabled',true);             //-- CONTACTO
//                 $('#ficha_cargo').prop('disabled',true);                //-- CARGO
//                  /* -------------------------------------------------------------------------  */
//                 $('#ficha_ruc').prop('disabled',false);                 //-- RUC
//                 $('#slct_docu').prop('disabled',false);                 //-- TIPO DOCUMENTO
//                 $('#ficha_docu').prop('disabled',false);                //-- DOCUMENTO
//                 $('#ficha_direc_fiscal').prop('disabled',false);        //-- DIRECCION FISCAL
//                 $('#ficha_direc_llega').prop('disabled',false);         //-- DIRECCION LLEGA
//                 $('#ficha_telf').prop('disabled',false);                //-- TELEFONO
//                 $('#ficha_ape_pa').prop('disabled',false);              //-- APELLIDO PATERNO
//                 $('#ficha_ape_mate').prop('disabled',false);            //-- APELLIDO MATERNO
//                 $('#ficha_nombre_pr').prop('disabled',false);           //-- PRIMER NOMBRE
//                 $('#ficha_nombre_seg').prop('disabled',false);          //-- SEGUNDO NOMBRE
//                 $('#slct_civil').prop('disabled',false);                //-- ESTADO CIVIL
//                 $('#filt_fecha_nace').prop('disabled',false);           //-- FECHA DE NACIMIENTO
//                 $('#ficha_email_pr').prop('disabled',false);            //-- PRIMER EMAIL
//                 $('#ficha_email_seg').prop('disabled',false);           //-- SEGUNDO EMAIL
//                 $('#slct_clasi').prop('disabled',false);                //-- TIPO - CLASIFICACION
//                 $('#slct_pago').prop('disabled',false);                 //-- FORMA DE PAGO
//                 $('#slct_vende').prop('disabled',false);                //-- PERSONAL DE VENTA
//                 $('#slct_depa').prop('disabled',false);                 //-- DEPARTAMENTO
//                 $('#slct_provi').prop('disabled',false);                //-- PROVINCIA
//                 $('#slct_distri').prop('disabled',false);               //-- DISTRITO
//                 $('#bttn_nuevo').prop('disabled',false);               //-- DISTRITO
//             break;
//             case 2: // NATURAL CON DNI
//             /* -----------------------------CAMPOS DISABLED ----------------------------- */
//             $('#ficha_razon').prop('disabled',true);                //-- RAZON SOCIAL
//             $('#ficha_contacto').prop('disabled',true);             //-- CONTACTO
//             $('#ficha_cargo').prop('disabled',true);                //-- CARGO
//              /* -------------------------------------------------------------------------  */
//             $('#ficha_ruc').prop('disabled',true);                 //-- RUC
//             $('#slct_docu').prop('disabled',false);                 //-- TIPO DOCUMENTO
//             $('#ficha_docu').prop('disabled',false);                //-- DOCUMENTO
//             $('#ficha_direc_fiscal').prop('disabled',false);        //-- DIRECCION FISCAL
//             $('#ficha_direc_llega').prop('disabled',false);         //-- DIRECCION LLEGA
//             $('#ficha_telf').prop('disabled',false);                //-- TELEFONO
//             $('#ficha_ape_pa').prop('disabled',false);              //-- APELLIDO PATERNO
//             $('#ficha_ape_mate').prop('disabled',false);            //-- APELLIDO MATERNO
//             $('#ficha_nombre_pr').prop('disabled',false);           //-- PRIMER NOMBRE
//             $('#ficha_nombre_seg').prop('disabled',false);          //-- SEGUNDO NOMBRE
//             $('#slct_civil').prop('disabled',false);                //-- ESTADO CIVIL
//             $('#filt_fecha_nace').prop('disabled',false);           //-- FECHA DE NACIMIENTO
//             $('#ficha_email_pr').prop('disabled',false);            //-- PRIMER EMAIL
//             $('#ficha_email_seg').prop('disabled',false);           //-- SEGUNDO EMAIL
//             $('#slct_clasi').prop('disabled',false);                //-- TIPO - CLASIFICACION
//             $('#slct_pago').prop('disabled',false);                 //-- FORMA DE PAGO
//             $('#slct_vende').prop('disabled',false);                //-- PERSONAL DE VENTA
//             $('#slct_depa').prop('disabled',false);                 //-- DEPARTAMENTO
//             $('#slct_provi').prop('disabled',false);                //-- PROVINCIA
//             $('#slct_distri').prop('disabled',false);               //-- DISTRITO
//             $('#bttn_nuevo').prop('disabled',false);               //-- DISTRITO
//         break;

//         }
//     }








