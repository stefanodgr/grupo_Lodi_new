<?php
include "../Funciones/BD.php";
// $edit = $_POST['edit'];
// echo "---->".$edit;
$xtpducto = '';
$edit = $_POST['edit'];
// echo "---->".$edit;



// $sqlID = "SELECT deta.produ_deta_id, pr.produ_id 
// FROM sys_producto pr, sys_produ_detalle deta 
// WHERE pr.produ_id = deta.produ_deta_id 
// AND deta.produ_deta_id = '$edit'";

// $result2       = mysqli_query($con, $sqlID);

$sqlTp = "SELECT clasi.produ_clasi_id, pr.produ_id 
	
	FROM sys_producto pr, sys_produ_clasi clasi 
	WHERE pr.produ_clasi_id = clasi.produ_clasi_id 
	AND pr.produ_id = '$edit'";


$resultTp       = mysqli_query($con, $sqlTp);
$rsql2            = mysqli_fetch_array($resultTp, MYSQLI_ASSOC);


$xtpducto = $rsql2['produ_clasi_id'];
ECHO "---->TIPO--->".$xtpducto;


if ($xtpducto == '1') {


    $sqlNeu = "SELECT deta.produ_deta_id,                           /* ID PRODU-DETALLE */
        pr.produ_id,                                                    /* ID PRODUCTO */
        pr.produ_unidad,        
        pr.produ_opc,                           
        pr.produ_nomen,
        pr.produ_clasi_id, 
        pr.mar_id, 
        pr.mod_id,
        pr.pais_id, 
        deta.produ_neu_ancho_inter, 
        deta.produ_neu_serie,
        deta.produ_neu_aro, 
        deta.produ_neu_pli,
        deta.produ_neu_set, 
        deta.produ_neu_uso, 
        deta.produ_neu_mate,
        deta.produ_neu_ancho_adua, 
        deta.produ_neu_serie_adua,
        deta.produ_neu_tp_const,
        deta.produ_neu_carga,
        deta.produ_neu_pisa,
        deta.produ_neu_exte, 
        deta.produ_neu_vel, 
        deta.produ_neu_consta, 
        deta.produ_neu_item,
        deta.produ_neu_vigencia, 
        deta.produ_neu_confor, 
        deta.produ_neu_partida,
        deta.produ_deta_codigo, 
        deta.produ_deta_nombre, 
        deta.sunat 

        FROM sys_producto pr, sys_produ_detalle deta 
        WHERE pr.produ_id = deta.produ_deta_id 
        AND deta.produ_deta_id = '$edit'";

    $resulNeu           = mysqli_query($con, $sqlNeu);
    $rsqlNeu            = mysqli_fetch_array($resulNeu, MYSQLI_ASSOC);

    $xclasi             =   $rsqlNeu['produ_clasi_id'];                                                      //	    ID DEL TIPO PRODUCTO
    $xuni               =   $rsqlNeu['produ_unidad'];                                                        //	    UNIDAD


    $xnomen             =   $rsqlNeu['produ_nomen'];                                                         //	    NOMENCLATURA
    $xmarcaID           =   $rsqlNeu['mar_id'];                                                              //	    ID MARCA
    $xmodID             =   $rsqlNeu['mod_id'];                                                              // 	ID MODELO
    $paisID             =   $rsqlNeu['pais_id'];                                                             // 	ID PAIS
    $xneu_xanc          =   $rsqlNeu['produ_neu_ancho_inter'];                                               // 	ANCHO SECCION		
    $xneu_xserie        =   $rsqlNeu['produ_neu_serie'];                                                     // 	SERIE
    $xneu_xaro          =   $rsqlNeu['produ_neu_aro'];                                                       // 	ARO	
    $xneu_xpli          =   $rsqlNeu['produ_neu_pli'];                                                       // 	PLIEGUES
    $xopc               =   $rsqlNeu['produ_opc'];                                                           //	    TIPO OPCION RADIAL-CONVENCIONAL
    $xneu_set           =   $rsqlNeu['produ_neu_set'];                                                       // 	SET								
    $xneu_xanc_adu      =   $rsqlNeu['produ_neu_ancho_adua'];                                                //     ANCHO SECCION/ADUANAS
    $xneu_xser_adu      =   $rsqlNeu['produ_neu_serie_adua'];                                                //     SERIE/ADUANAS
    $xneu_xexte         =   $rsqlNeu['produ_neu_exte'];                                                      //     DIAMETRO - EXTERNO
    $neu_xcons          =   $rsqlNeu['produ_neu_tp_const'];                                                  //     TIPO DE CONSTRUCCION  
    $neu_xuso           =   $rsqlNeu['produ_neu_uso'];                                                       //     USO COMERCIAL  
    $neu_xmate          =   $rsqlNeu['produ_neu_mate'];                                                      //     MATERIAL/CARCASA  
    $neu_xcarga         =   $rsqlNeu['produ_neu_carga'];                                                     //     INDICE DE CARGA  
    $neu_xpisada        =   $rsqlNeu['produ_neu_pisa'];                                                      //     PROFUNDIDA DE PISADA  
    $neu_xvel           =   $rsqlNeu['produ_neu_vel'];                                                       //     CODIGO VELOCIDAD  
    $neu_xcum           =   $rsqlNeu['produ_neu_consta'];                                                    //     CONSTANCIA /CUMPLIMIENTO  
    $neu_xitem          =   $rsqlNeu['produ_neu_item'];                                                      //     ITEMS LA CONSTANCIA  
    $neu_xvigen         =   $rsqlNeu['produ_neu_vigencia'];                                                  //     VIGENCIA
    $neu_xconfor        =   $rsqlNeu['produ_neu_confor'];                                                    //     DECLARACION-CONFORMIDAD
    $neu_xparti         =   $rsqlNeu['produ_neu_partida'];                                                   //     PARTIDA ARANCELARIA
    $sunat              =   $rsqlNeu['sunat'];                                                               //     SUNAT
    $codigo             =   $rsqlNeu['produ_deta_codigo'];                                                   //     CODIGO SKU






    $sqlTpNom               = "SELECT produ_clasi_id, produ_clasi_desc 
                            FROM sys_produ_clasi 
                            WHERE produ_clasi_id= '$xclasi' ";

    $resulTpNom             = mysqli_query($con, $sqlTpNom);
    $rsqlTpNom              = mysqli_fetch_array($resulTpNom, MYSQLI_ASSOC);

    $xclasiNom              = $rsqlTpNom['produ_clasi_desc'];

    $sqlMarca = "SELECT mr.mar_id, mr.mar_nombre, pr.produ_id 
        FROM sys_producto pr , sys_marca mr WHERE mr.mar_id = pr.mar_id 
        AND pr.mar_id = '$xmarcaID'";

    $resulMarca             = mysqli_query($con, $sqlMarca);
    $rsqlMarca              = mysqli_fetch_array($resulMarca, MYSQLI_ASSOC);

    $xmarcaNom              = $rsqlMarca['mar_nombre'];


    $sqlModelo = "SELECT pr.produ_id, pr.mod_id, md.mod_id , md.mod_nombre
        FROM sys_producto pr , sys_modelo md 
                    where md.mod_id = pr.mod_id AND pr.produ_id= '$edit' ";

    $resulModelo          = mysqli_query($con, $sqlModelo);
    $rsqlModelo           = mysqli_fetch_array($resulModelo, MYSQLI_ASSOC);


    $xmodNeu             = $rsqlModelo['mod_nombre'];

    $sqlPais = "SELECT pa.pais_nombre, pa.pais_id, pr.produ_id 
                    FROM sys_producto pr , sys_pais pa 
                    WHERE pa.pais_id = pr.pais_id 
                    AND pr.produ_id = '$edit'";

    $resulPais             = mysqli_query($con, $sqlPais);
    $rsqlPais              = mysqli_fetch_array($resulPais, MYSQLI_ASSOC);

    $xpaisNom              = $rsqlPais['pais_nombre'];
} else if ($xtpducto == '2') {

    $sqlCam = "SELECT deta.produ_deta_id,                           /* ID PRODU-DETALLE */
        pr.produ_id,                                                /* ID PRODUCTO */
        pr.produ_unidad,                                            /* UNIDAD */
        pr.produ_opc,                                               /* OPC */
        pr.produ_clasi_id,                                          /* ID CLASI */
        pr.mar_id,                                                  /* ID MARCA */
        pr.pais_id,                                                 /* ID PAIS */ 
        deta.produ_cam_med,                                         /* MEDIDA */ 
        deta.produ_cam_aro,                                         /* ARO */ 
        deta.produ_cam_val,                                         /* VALVULA */
        deta.produ_deta_codigo,                                     /* CODIGO */
        deta.produ_deta_nombre,                                     /* NOMBRE */
        deta.sunat                                                  /* SUNAT */

        FROM sys_producto pr, sys_produ_detalle deta 
        WHERE pr.produ_id = deta.produ_deta_id 
        AND deta.produ_deta_id = '$edit'";

    $resulCam           = mysqli_query($con, $sqlCam);
    $rsqlCam            = mysqli_fetch_array($resulCam, MYSQLI_ASSOC);

    $xuni               =   $rsqlNeu['produ_unidad'];                        //	    UNIDAD
    $codigo             =   $rsqlCam['produ_deta_codigo'];                   //	    CODIGO
    $sunat              =   $rsqlCam['sunat'];                               //	    SUNAT
    $xclasi             =   $rsqlCam['produ_clasi_id'];                      //	    ID DEL TIPO PRODUCTO
    $xmarcaID           =   $rsqlCam['mar_id'];                              //	    ID MARCA
    $xopc               =   $rsqlCam['produ_opc'];                           //	    OPC
    $xpaisID            =   $rsqlCam['pais_id'];                             //	    ID PAIS
    $cam_xmed           =   $rsqlCam['produ_cam_med'];                       //	    MEDIDA
    $cam_xaro           =   $rsqlCam['produ_cam_aro'];                       //	    ARO
    $cam_xval           =   $rsqlCam['produ_cam_val'];                       //	    VALVULA

    $sqlTpNom               = "SELECT produ_clasi_id, produ_clasi_desc 
                            FROM sys_produ_clasi 
                            WHERE produ_clasi_id= '$xclasi' ";

    $resulTpNom             = mysqli_query($con, $sqlTpNom);
    $rsqlTpNom              = mysqli_fetch_array($resulTpNom, MYSQLI_ASSOC);

    $xclasiNom              = $rsqlTpNom['produ_clasi_desc'];

    $sqlMarca = "SELECT mr.mar_id, mr.mar_nombre, pr.produ_id 
        FROM sys_producto pr , sys_marca mr WHERE mr.mar_id = pr.mar_id 
        AND pr.mar_id = '$xmarcaID'";

    $resulMarca             = mysqli_query($con, $sqlMarca);
    $rsqlMarca              = mysqli_fetch_array($resulMarca, MYSQLI_ASSOC);

    $xmarcaNom              = $rsqlMarca['mar_nombre'];


    $sqlPais = "SELECT pa.pais_nombre, pa.pais_id, pr.produ_id 
                    FROM sys_producto pr , sys_pais pa 
                    WHERE pa.pais_id = pr.pais_id 
                    AND pr.produ_id = '$edit'";

    $resulPais             = mysqli_query($con, $sqlPais);
    $rsqlPais              = mysqli_fetch_array($resulPais, MYSQLI_ASSOC);

    $xpaisNom              = $rsqlPais['pais_nombre'];
} else if ($xtpducto == '3') {
    echo"llego---3";

    $sqlAro = "SELECT deta.produ_deta_id,                           /* ID PRODU-DETALLE */
            pr.produ_id,                                            /* ID PRODUCTO */
            pr.produ_opc,                                           /* OPC */
            pr.produ_unidad,                                        /* UNIDAD */
            pr.produ_clasi_id,                                      /* ID CLASI */
            pr.mar_id,                                              /* ID MARCA */
            pr.pais_id,                                             /* ID PAIS */ 
            deta.produ_aro_mod,                                     /* MOD */ 
            deta.produ_aro_med,                                     /* MEDIDA */ 
            deta.produ_aro_espe,                                    /* ESPESOR */
            deta.produ_aro_hueco,                                   /* HUECO */
            deta.produ_aro_hole,                                    /* HOLE */
            deta.produ_aro_cbd,                                     /* CBD */
            deta.produ_aro_pcd,                                     /* PCD */
            deta.produ_aro_offset,                                  /* OFFSET */
            deta.produ_deta_codigo,                                 /* CODIGO */
            deta.produ_deta_nombre,                                 /* NOMBRE */
            deta.sunat                                              /* SUNAT */

        FROM sys_producto pr, sys_produ_detalle deta 
        WHERE pr.produ_id = deta.produ_deta_id 
        AND deta.produ_deta_id = '$edit'";

    $resulAro           = mysqli_query($con, $sqlAro);
    $rsqlAro            = mysqli_fetch_array($resulAro, MYSQLI_ASSOC);

    $xuni               =   $rsqlAro['produ_unidad'];                        //	    UNIDAD
    $codigo             =   $rsqlAro['produ_deta_codigo'];                   //	    CODIGO
    $sunat              =   $rsqlAro['sunat'];                               //	    SUNAT
    $xclasi             =   $rsqlAro['produ_clasi_id'];                      //	    ID DEL TIPO PRODUCTO
    $xmarcaID           =   $rsqlAro['mar_id'];                              //	    ID MARCA
    $xopc               =   $rsqlAro['produ_opc'];                           //	    OPC
    $xpaisID            =   $rsqlAro['pais_id'];                             //	    ID PAIS


    $aro_xmod           =   $rsqlAro['produ_aro_mod'];                       //	    TIPO
    $aro_xmed           =   $rsqlAro['produ_aro_med'];                       //	    MEDIDA
    $aro_xespe          =   $rsqlAro['produ_aro_espe'];                      //	    ESPESOR
    $aro_xhueco         =   $rsqlAro['produ_aro_hueco'];                     //	    N° HUECOS
    $aro_xhole          =   $rsqlAro['produ_aro_hole'];                     //	    ESPESOR/HUECO
    $aro_xcbd           =   $rsqlAro['produ_aro_cbd'];                       //	    CBD
    $aro_xpcd           =   $rsqlAro['produ_aro_pcd'];                       //	    PCD
    $aro_xoff           =   $rsqlAro['produ_aro_offset'];                    //	    OFFSET
    $sunat              =   $rsqlAro['sunat'];                    //	    OFFSET

    $sqlTpNom               = "SELECT produ_clasi_id, produ_clasi_desc 
                            FROM sys_produ_clasi 
                            WHERE produ_clasi_id= '$xclasi' ";

    $resulTpNom             = mysqli_query($con, $sqlTpNom);
    $rsqlTpNom              = mysqli_fetch_array($resulTpNom, MYSQLI_ASSOC);

    $xclasiNom              = $rsqlTpNom['produ_clasi_desc'];


    $sqlMarca = "SELECT mr.mar_id, mr.mar_nombre, pr.produ_id 
        FROM sys_producto pr , sys_marca mr WHERE mr.mar_id = pr.mar_id 
        AND pr.mar_id = '$xmarcaID'";

    $resulMarca             = mysqli_query($con, $sqlMarca);
    $rsqlMarca              = mysqli_fetch_array($resulMarca, MYSQLI_ASSOC);

    $xmarcaNom              = $rsqlMarca['mar_nombre'];


    $sqlPais = "SELECT pa.pais_nombre, pa.pais_id, pr.produ_id 
                    FROM sys_producto pr , sys_pais pa 
                    WHERE pa.pais_id = pr.pais_id 
                    AND pr.produ_id = '$edit'";

    $resulPais             = mysqli_query($con, $sqlPais);
    $rsqlPais              = mysqli_fetch_array($resulPais, MYSQLI_ASSOC);

    $xpaisNom              = $rsqlPais['pais_nombre'];
} else if ($xtpducto == '4') {
    $sqlPro = "SELECT deta.produ_deta_id,                           /* ID PRODU-DETALLE */
            pr.produ_id,                                            /* ID PRODUCTO */
            pr.produ_unidad,                                        /* UNIDAD */
            pr.produ_desc,                                           /* OPC */
            pr.produ_clasi_id,                                      /* ID CLASI */
            pr.mar_id,                                              /* ID MARCA */
            pr.pais_id,                                             /* ID PAIS */ 
            deta.produ_deta_codigo,                                 /* CODIGO */
            deta.produ_deta_nombre,                                 /* NOMBRE */
            deta.sunat                                              /* SUNAT */

        FROM sys_producto pr, sys_produ_detalle deta 
        WHERE pr.produ_id = deta.produ_deta_id 
        AND deta.produ_deta_id = '$edit'";

    $resulPro           = mysqli_query($con, $sqlPro);
    $rsqlPro            = mysqli_fetch_array($resulPro, MYSQLI_ASSOC);

    $xuni               =   $rsqlPro['produ_unidad'];                        //	    UNIDAD
    $codigo             =   $rsqlPro['produ_deta_codigo'];                   //	    CODIGO
    $sunat              =   $rsqlPro['sunat'];                               //	    SUNAT
    $xclasi             =   $rsqlPro['produ_clasi_id'];                      //	    ID DEL TIPO PRODUCTO
    $xmarcaID           =   $rsqlPro['mar_id'];                              //	    ID MARCA
    $xpaisID            =   $rsqlPro['pais_id'];                             //	    ID PAIS

    $produ_desc         =   $rsqlPro['produ_desc'];                          //	    DESCRIPCION


    $sqlTpNom               = "SELECT produ_clasi_id, produ_clasi_desc 
                            FROM sys_produ_clasi 
                            WHERE produ_clasi_id= '$xclasi' ";

    $resulTpNom             = mysqli_query($con, $sqlTpNom);
    $rsqlTpNom              = mysqli_fetch_array($resulTpNom, MYSQLI_ASSOC);

    $xclasiNom              = $rsqlTpNom['produ_clasi_desc'];


    $sqlMarca = "SELECT mr.mar_id, mr.mar_nombre, pr.produ_id 
        FROM sys_producto pr , sys_marca mr WHERE mr.mar_id = pr.mar_id 
        AND pr.mar_id = '$xmarcaID'";

    $resulMarca             = mysqli_query($con, $sqlMarca);
    $rsqlMarca              = mysqli_fetch_array($resulMarca, MYSQLI_ASSOC);

    $xmarcaNom              = $rsqlMarca['mar_nombre'];


    $sqlPais = "SELECT pa.pais_nombre, pa.pais_id, pr.produ_id 
                    FROM sys_producto pr , sys_pais pa 
                    WHERE pa.pais_id = pr.pais_id 
                    AND pr.produ_id = '$edit'";

    $resulPais             = mysqli_query($con, $sqlPais);
    $rsqlPais              = mysqli_fetch_array($resulPais, MYSQLI_ASSOC);

    $xpaisNom              = $rsqlPais['pais_nombre'];
} else if ($xtpducto == '5') {
    $sqlAce = "SELECT deta.produ_deta_id,                          /* ID PRODU-DETALLE */
            pr.produ_unidad,                                        /* UNIDAD */
            pr.produ_id,                                            /* ID PRODUCTO */
            pr.produ_desc,                                          /* DESCRIPCION */
            pr.produ_pn,                                            /* P/N */
            pr.produ_clasi_id,                                      /* ID CLASI */
            pr.mar_id,                                              /* ID MARCA */
            pr.pais_id,                                             /* ID PAIS */ 
            deta.produ_deta_codigo,                                 /* CODIGO */
            deta.produ_deta_nombre,                                 /* NOMBRE */
            deta.sunat                                              /* SUNAT */

        FROM sys_producto pr, sys_produ_detalle deta 
        WHERE pr.produ_id = deta.produ_deta_id 
        AND deta.produ_deta_id = '$edit'";

    $resulAce           = mysqli_query($con, $sqlAce);
    $rsqlAce            = mysqli_fetch_array($resulAce, MYSQLI_ASSOC);

    $xuni               =   $rsqlAce['produ_unidad'];                        //	    UNIDAD
    $codigo             =   $rsqlAce['produ_deta_codigo'];                   //	    CODIGO
    $sunat              =   $rsqlAce['sunat'];                               //	    SUNAT
    $xclasi             =   $rsqlAce['produ_clasi_id'];                      //	    ID DEL TIPO PRODUCTO
    $xmarcaID           =   $rsqlAce['mar_id'];                              //	    ID MARCA
    $xpaisID            =   $rsqlAce['pais_id'];                             //	    ID PAIS

    $xdesc2             =   $rsqlAce['produ_desc'];                          //	    DESCRIPCION
    $xpn                =   $rsqlAce['produ_pn'];                           //	    PN


    $sqlTpNom               = "SELECT produ_clasi_id, produ_clasi_desc 
                            FROM sys_produ_clasi 
                            WHERE produ_clasi_id= '$xclasi' ";

    $resulTpNom             = mysqli_query($con, $sqlTpNom);
    $rsqlTpNom              = mysqli_fetch_array($resulTpNom, MYSQLI_ASSOC);

    $xclasiNom              = $rsqlTpNom['produ_clasi_desc'];


    $sqlMarca = "SELECT mr.mar_id, mr.mar_nombre, pr.produ_id 
        FROM sys_producto pr , sys_marca mr WHERE mr.mar_id = pr.mar_id 
        AND pr.mar_id = '$xmarcaID'";

    $resulMarca             = mysqli_query($con, $sqlMarca);
    $rsqlMarca              = mysqli_fetch_array($resulMarca, MYSQLI_ASSOC);

    $xmarcaNom              = $rsqlMarca['mar_nombre'];


    $sqlPais = "SELECT pa.pais_nombre, pa.pais_id, pr.produ_id 
                    FROM sys_producto pr , sys_pais pa 
                    WHERE pa.pais_id = pr.pais_id 
                    AND pr.produ_id = '$edit'";

    $resulPais             = mysqli_query($con, $sqlPais);
    $rsqlPais              = mysqli_fetch_array($resulPais, MYSQLI_ASSOC);

    $xpaisNom              = $rsqlPais['pais_nombre'];
} else {
echo "no llego nada ";
 }

?>
<style>
    .oculto {
        display: none;
    }
</style>

<link href="css_sg/general.css?" rel="stylesheet" type="text/css" />
<!-- <script src="js_sg/cliente.js" language="Javascript"></script> -->


<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"> -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-12 col-xs-12 col-lg-12">
                    <!-- <div class="panel panel-default"> -->
                    <div id="div_nombre_produ" class="col-lg-6">
                        <h2 class="azul"><i class="glyphicon glyphicon-th-list"></i>&nbsp;<strong>Modulo Producto - Editar Productos</strong></h2>
                    </div>
                </div>
                <br>
                <br>
                <hr>
                <form id="formProducto" role="form" action="index.php?menu=2" method="post">
                    <input type="text" name="xtpducto" id="xtpducto" value="<?php echo $xtpducto; ?>">
                    <?php

                    if ($xtpducto == '1') {
                        ?>
                        <div class="form" id="div_form_neu">

                        <input type="hidden" name="edit" id="edit" value="<?php echo $edit; ?>">
                        <input type="hidden" name="xclasi" id="xclasi" value="<?php echo $xclasi; ?>">
                        <input type="hidden" name="xclasiNom" id="xclasiNom" value="<?php echo $xclasiNom; ?>">
                        <input type="hidden" name="xnomen" id="xnomen" value="<?php echo $xnomen; ?>">
                        <input type="hidden" name="xmarcaID" id="xmarcaID" value="<?php echo $xmarcaID; ?>">
                        <input type="hidden" name="xmarcaNom" id="xmarcaNom" value="<?php echo $xmarcaNom; ?>">
                        <input type="hidden" name="xmodID" id="xmodID" value="<?php echo $xmodID; ?>">
                        <input type="hidden" name="paisID" id="paisID" value="<?php echo $paisID; ?>">
                        
                        <input type="hidden" name="xneu_xanc" id="xneu_xanc" value="<?php echo $xneu_xanc; ?>">
                        <input type="hidden" name="xneu_xpli" id="xneu_xpli" value="<?php echo $xneu_xpli; ?>">
                        <input type="hidden" name="xopc" id="xopc" value="<?php echo $xopc; ?>">
                        <input type="hidden" name="xneu_set" id="xneu_set" value="<?php echo $xneu_set; ?>">
                        <input type="hidden" name="xneu_xanc_adu" id="xneu_xanc_adu" value="<?php echo $xneu_xanc_adu; ?>">
                        <input type="hidden" name="xneu_xser_adu" id="xneu_xser_adu" value="<?php echo $xneu_xser_adu; ?>">
                        <input type="hidden" name="xneu_xexte" id="xneu_xexte" value="<?php echo $xneu_xexte; ?>">
                        <input type="hidden" name="neu_xcons" id="neu_xcons" value="<?php echo $neu_xcons; ?>">
                        <input type="hidden" name="neu_xuso" id="neu_xuso" value="<?php echo $neu_xuso; ?>">
                        <input type="hidden" name="neu_xmate" id="neu_xmate" value="<?php echo $neu_xmate; ?>">
                        <input type="hidden" name="neu_xcarga" id="neu_xcarga" value="<?php echo $neu_xcarga; ?>">
                        <input type="hidden" name="neu_xpisada" id="neu_xpisada" value="<?php echo $neu_xpisada; ?>">
                        <input type="hidden" name="neu_xvel" id="neu_xvel" value="<?php echo $neu_xvel; ?>">
                        <input type="hidden" name="neu_xcum" id="neu_xcum" value="<?php echo $neu_xcum; ?>">
                        <input type="hidden" name="neu_xitem" id="neu_xitem" value="<?php echo $neu_xitem; ?>">
                        <input type="hidden" name="neu_xvigen" id="neu_xvigen" value="<?php echo $neu_xvigen; ?>">
                        <input type="hidden" name="neu_xconfor" id="neu_xconfor" value="<?php echo $neu_xconfor; ?>">
                        <input type="hidden" name="neu_xparti" id="neu_xparti" value="<?php echo $neu_xparti; ?>">
                        <input type="hidden" name="sunat" id="sunat" value="<?php echo $sunat; ?>">
                        <input type="hidden" name="codigo" id="codigo" value="<?php echo $codigo; ?>">

                        <input type="hidden" class="form-control text-uppercase" name="xuni" value="<?php echo $xuni; ?>">
                        <input type="hidden" class="form-control text-uppercase" name="xtpducto" value="<?php echo $xtpducto; ?>">


                       
           
                        <div id="div_sku" class="form-group  col-md-8 col-xs-12 col-lg-3" style="top: 100;">
                                    <label><small> CODIGO SKU :</small></label>
                                    <input type="text" id="nombre4" name="nombre4" placeholder="Recibe SKU" class="form-control" onchange='PasarValorEdit();' >
                                </div>

                                <input type="text" id="nombreSkuU" name="nombreSkuU" placeholder="Recibe SKU" class="form-control">

                        <div id="" class="form-group  col-md-8 col-xs-12 col-lg-3" >
                                    <label><small> CODIGO SUNAT :</small></label>
                                    <select class="form-control" id="sunat" name="sunat" title="Ingrese la Sunat" >
                                        <option value="<?php echo $sunat; ?>" selected><?php echo $sunat; ?></option>
                                        <option value="25172502" title="NEUMÁTICO PARA LLANTAS DE AUTOMÓVILES">25172502</option>
                                        <option value="25172509" title="NEUMÁTICOS PARA LLANTAS DE CAMIONES PESADOS">25172509</option>
                                    </select>
                                </div>
                        <div class="form-group col-xs-12 col-md-6 col-lg-3">
                            <!-- ANCHO DE SECCION INTERNO -->
                            <label><small>TIPO PRODUCTO:</small></label>
                            <input type="text" class="form-control text-uppercase" id="xclasi" name="xclasi" value="<?php echo $xclasiNom; ?>" disabled >
                        </div>
                        <div id="div_nomen" class="form-group  col-md-6 col-xs-12 col-lg-2">
                            <!-- NOMENCLATURA -->
                            <label><small>NOMENCLATURA :</small></label>
                            <select class="form-control" id="xnomen" name="xnomen" title="Ingrese la Nomenclatura" onchange='PasarValorEdit();' >
                                <option value="<?php echo $xnomen; ?>" >--Actual--</option>
                                <option value="<?php echo $xnomen; ?>" selected disabled><?php echo $xnomen; ?></option>
                                <option value="" >--Existente--</option>
                                <option value="NUMERICA">NUMERICA</option>
                                <option value="MILIMETRICA">MILIMETRICA</option>
                            </select>
                        </div>
                        <!-- ------------------------MARCA--------------------------------------------------- -->
                        <div id="" class=" miClase form-group  col-md-8 col-xs-12 col-lg-3">
                            <label><small>MARCA :</small></label>
                            <select class="form-control" name="xmar1" id="xmar1" onchange="ShowMarca1();PasarValorEdit();"   title="Ingrese la Marca">
                                        <!--MARCA-->
                                        <?php
                                        $sql3 = "SELECT mr.mar_id,mr.mar_nombre,mr.mar_estatus,pclasi.produ_clasi_id,
                                        pclasi.produ_clasi_desc
                                        FROM                
                                        sys_marca mr, sys_produ_clasi pclasi
                                        WHERE mr.produ_clasi_id = pclasi.produ_clasi_id and mr.produ_clasi_id = '1'";
                                        $rsql3 = mysqli_query($con, $sql3);
                                        echo  "<option id='$xmarcaID' value='$xmarcaNom' >--Actual--</option>";
                                        echo "<option value='$xmarcaID' selected > $xmarcaNom</option>";
                                        echo  "<option>--Existente--</option>";
                                        if ($row3 = mysqli_fetch_array($rsql3, MYSQLI_ASSOC)) {
                                            do {
                                                
                                                echo '<option value="' . $row3['mar_id'] . '">' . $row3['mar_nombre'] . '</option>';
                                            } while ($row3 = mysqli_fetch_array($rsql3, MYSQLI_ASSOC));
                                        }
                                        echo "<option  value=''  onclick='DivNewNeuDisplay(1);'  >NUEVA MARCA</option>";
                                        ?>
                                    </select>
                            <input type="hidden" class="form-control" name="xmarNom1" id="xmarNom1" value="<?php echo $xmarcaNom; ?>" onchange="PasarValorEdit();">
                        </div>
                        <!-- <input type="hidden" class="form-control" name="xmarNom1" id="xmarNom1" onchange="PasarValor();"> -->

                        <!---------------------------------MARCA----------------------------------- -->
                        <!------------------MODELO --------------------------------------------------->
 

                        <div id="div_modelo" class="form-group  col-md-6 col-xs-12 col-lg-3">
                                    <label><small>MODELO :</small></label>
                                    <select class="form-control" name="xmod" id="xmod" onchange="ShowModelo();" title="Ingrese el Modelo">
                                    <option value="<?php echo $xmodID; ?>" selected ><?php echo $xmodNeu; ?></option>
                                    </select>
                                </div>
                                <input type="hidden" class="form-control" name="xmodNom" id="xmodNom" value="<?php echo $xmodNeu; ?>">
                                <!-- <input  type ="hidden" class="form-control"  name="xmarNom"   id="xmarNom"> -->
                        <!--------------------------------------------------------------------------------------------------------->
                        <!-- --------------------------------PAIS------------------------------------------------------------------>
                        <div id="" class="form-group  col-md-8 col-xs-12 col-lg-2">
                                    <label><small> PAIS :</small></label>
                                    <select class="form-control" id="xpais1" name="xpais1" onchange="ShowPais1();" title="Ingrese el Pais"   >
                                        <!-- Leer los Clasificacion -->
                                        <?php
                                        $sql4 = "SELECT pais_id,pais_nombre from sys_pais WHERE pais_estatus=1 order by pais_id";
                                        $rsql4 = mysqli_query($con, $sql4);
                                        echo  "<option id='$paisID' value='$xpaisNom' >--Actual--</option>";
                                        echo "<option value='$paisID' selected>$xpaisNom</option>";
                                        echo  "<option>--Existente--</option>";
                                        if ($row4 = mysqli_fetch_array($rsql4, MYSQLI_ASSOC)) {
                                            do {
                                                echo '<option value="' . $row4['pais_id'] . '">' . $row4['pais_nombre'] . '</option>';
                                            } while ($row4 = mysqli_fetch_array($rsql4, MYSQLI_ASSOC));
                                        }
                                        ?>
                                    </select>
                                </div>
                                <input type="hidden" class="form-control" name="xpaisNom1" id="xpaisNom1" title="Ingrese el Pais" value="<?php echo $xpaisNom; ?>">
                      <div class="form-group col-xs-12 col-md-6 col-lg-2">
                            <!-- ANCHO DE SECCION INTERNO -->
                            <label><small>ANCHO/SECCION(MM) :</small></label>
                            <input type="text" class="form-control text-uppercase" id="xneu_xanc" name="xneu_xanc" value="<?php echo $xneu_xanc; ?>" title="Ingrese el Ancho/Seccion" onchange="PasarValorEdit();">
                        </div>
                        <div class="form-group col-xs-12 col-md-6 col-lg-2">
                            <!-- SERIE DE NEUMATICO-->
                            <label><small>SERIE :</small></label>
                            <input type="text" class="form-control text-uppercase" id="xneu_xserie" name="xneu_xserie" value="<?php echo $xneu_xserie; ?>" title="Ingrese el Serie">
                        </div>
                        <div class="form-group col-md-6 col-xs-12 col-lg-2">
                            <!-- ARO DE NEUMATICO -->
                            <label><small> ARO :</small></label>
                            <input type="text" class="form-control text-uppercase" id="xneu_xaro" name="xneu_xaro" value="<?php echo $xneu_xaro; ?>" onchange="PasarValorEdit();">
                        </div>
                        <div class="form-group col-md-6 col-xs-12 col-lg-2">
                            <!-- PLIEGUES -->
                            <label><small> PLIEGUES :</small></label>
                            <input type="text" class="form-control text-uppercase" id="xneu_xpli" name="xneu_xpli" value="<?php echo $xneu_xpli; ?>" >
                        </div>
                        <div id="div_tipo_neu" class="form-group  col-md-6 col-xs-12 col-lg-2">
                            <!-- TIPO  RADIAL/CONVENCIONAL -->
                            <label><small>Tipo :</small></label>
                            <select class="form-control" id="xtp" name="xtp" title="Ingrese Tipo">
                                <option value="<?php echo $xopc; ?>" selected><?php echo $xopc; ?></option>
                                <option value=" RADIAL">RADIAL</option>
                                <option value="CONVENCIONAL">CONVENCIONAL</option>
                            </select>
                        </div>
                        <div class="form-group  col-md-6 col-xs-12 col-lg-2">
                            <!-- SET -->
                            <label><small> SET :</small> </label>
                            <select class="form-control" id="neu_set" name="neu_set" title="Ingrese el Set">
                                <option value="<?php echo $xneu_set; ?>" selected><?php echo $xneu_set; ?></option>
                                <option value="LL">LL</option>
                                <option value="LL/C/P">LL/C/P</option>
                                <option value="LL/C">LL/C</option>
                                <option value="LL/P">LL/P</option>
                            </select>
                        </div>


                        <div class="form-group col-md-12 col-xs-12 col-lg-3">
                            <label> <small>ANCHO/SECCION ADUANAS :</small></label>
                            <!--ANCHO DE SECCION ADUANAS -->
                            <input type="text" class="form-control text-uppercase" id="xneu_xanc_adu" name="xneu_xanc_adu" value="<?php echo $xneu_xanc_adu; ?>" title="Ingrese Ancho/Seccion Aduanas">
                        </div>
                        <div class="form-group col-md-12 col-xs-12 col-lg-3">
                            <!--SERIE ADUANAS -->


                            <label> <small>SERIE/ADUANAS :</small></label>
                            <input type="text" class="form-control text-uppercase" id="xneu_xser_adu" name="xneu_xser_adu" value="<?php echo $xneu_xser_adu; ?>" title="Ingrese la Serie/Aduanas">
                        </div>
                        <div class="form-group col-md-12 col-xs-12 col-lg-3">
                            <!--DIAMETRO EXTERNO -->
                            <label> <small>DIAMETRO/EXTERNO :</small></label>
                            <input type="text" class="form-control text-uppercase" id="xneu_xexte" name="xneu_xexte" value="<?php echo $xneu_xexte; ?>" title="xneu_xexte" title="Ingrese la Diametro/Externo">
                        </div>
                        <div class="form-group  col-md-8 col-xs-12 col-lg-3">
                            <label><small> TIPO DE CONSTRUCCIÓN No.04 :</small></label>
                            <select class="form-control" id="neu_xcons" name="neu_xcons" title="Ingrese Tipo de Construccion">
                                <option value="<?php echo $neu_xcons; ?>" selected><?php echo $neu_xcons; ?></option>
                                <option value="CTT-CONVENCIONAL CON CAMARA">CTT-CONVENCIONAL CON CAMARA</option>
                                <option value="CTL-CONVENCIONAL SIN CAMARA">CTL-CONVENCIONAL SIN CAMARA </option>
                                <option value="RTT-RADIAL CON CAMARA">RTT-RADIAL CON CAMARA</option>
                                <option value="RTL-RADIAL SIN CAMARA">RTL-RADIAL SIN CAMARA</option>
                            </select>
                        </div>
                        <div class="form-group  col-md-8 col-xs-12 col-lg-6">
                            <label> <small>USO COMERCIAL No. 01 :</small> </label>
                            <select class="form-control" id="neu_xuso" name="neu_xuso" title="Ingrese Uso Comercial" onchange='PasarValorEdit();'>
                                        <option value="" >------------------Actual------------------------</option>
                                        <option value="<?php echo $neu_xuso; ?>" selected><?php echo $neu_xuso; ?></option>
                                        <option value="" >-----------------Existente----------------------</option>
                                        <option  onclick="PasarValorEdit();"  value="PPE-PASAJEROS, USO PERMANENTE">PPE-Pasajeros, uso permanente</option>
                                        <option value="PTE-PASAJEROS, USO TEMPORAL">PTE-Pasajeros, uso temporal</option>
                                        <option value="CLT-COMERCIALES, PARA CAMIONETA DE CARGA, MICROBUSES O CAMIONES LIGEROS">CLT-Comerciales, para camioneta de carga, microbuses o camiones ligeros</option>
                                        <option value="CTR-COMERCIALES, PARA CAMION Y/O OMNIBUS">CTR-Comerciales, para camión y/o ómnibus</option>
                                        <option value="CML-COMERCIALES, PARA USO MINERO Y FORESTAL">CML-Comerciales, para uso minero y forestal</option>
                                        <option value="CMH-COMERCIALES, PARA CASAS RODANTES">CMH-Comerciales, para casas rodantes</option>
                                        <option value="CST-COMERCIALES, REMOLCADORES EN CARRETERA">CST-Comerciales, remolcadores en carretera</option>
                                        <option value="ALN-AGRICOLAS">ALN-Agrícolas</option>
                                        <option value="OTG-MAQUINARIA, TRACTORES NIVELADORAS">OTG-Maquinaria, tractores niveladores</option>
                                        <option value="OTR-OTROS PARA MAQUINARIAS">OTR-Otros para maquinarias</option>
                            </select>
                        </div>
                        <div class="form-group  col-md-8 col-xs-12 col-lg-3">
                            <label> <small>MATERIAL/CARCASA No. 02 :</small></label>
                            <select class="form-control" id="neu_xmate" name="neu_xmate" title="Ingrese Material/Carcasa">
                                <option value="<?php echo $neu_xmate; ?>" selected><?php echo $neu_xmate; ?></option>
                                <option value="NYLON">NYLON</option>
                                <option value="ACERO">ACERO </option>
                                <option value="POLIESTER">POLIESTER</option>
                                <option value="RAYON">RAYON</option>
                                <option value="POLIAMIDA">POLIAMIDA</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12 col-xs-12 col-lg-3">
                            <label> <small>INDICE DE CARGA(KG) No.05 :</small></label>
                            <input type="text" class="form-control text-uppercase" id="neu_xcarga" name="neu_xcarga" value="<?php echo $neu_xcarga; ?>" title="Ingrese Indice de Carga">
                        </div>
                        <div class="form-group col-md-12 col-xs-12 col-lg-3">
                            <label> <small>PROFUNDIDAD DE PISADA :</small></label>
                            <input type="text" class="form-control text-uppercase" id="neu_xpisada" name="neu_xpisada" value="<?php echo $neu_xpisada; ?>" title="Ingrese Profundidad de Pisada">
                        </div>
                        <div class="form-group  col-md-8 col-xs-12 col-lg-3">
                            <label><small>CODIGO/VELOCIDAD/No.06 :</small></label>

                            <select class="form-control" id="neu_xvel" name="neu_xvel" title="Ingrese Codigo/Velocidad">
                                <option value="<?php echo $neu_xvel; ?>" selected><?php echo $neu_xvel; ?></option>
                                <option value="E-70KM/H">E-70KM/H</option>
                                <option value="F-80KM/H">F-80KM/H </option>
                                <option value="G-90KM/H">G-90KM/H</option>
                                <option value="J-100KM/H">J-100KM/H</option>
                                <option value="K-110KM/H">K-110KM/H</option>
                                <option value="L-120KM/H">L-120KM/H</option>
                                <option value="M-130KM/H">M-130KM/H</option>
                                <option value="N-140KM/H">N-140KM/H</option>
                                <option value="P-150KM/H">P-150KM/H</option>
                                <option value="Q-160KM/H">Q-160KM/H</option>
                                <option value="R-170KM/H">R-170KM/H</option>
                                <option value="S-180KM/H">S-180KM/H</option>
                                <option value="T-190KM/H">T-190KM/H</option>
                                <option value="U-200KM/H">U-200KM/H</option>
                                <option value="H-210KM/H">H-210KM/H</option>
                                <option value="V-240KM/H">V-240KM/H</option>
                                <option value="W-270KM/H">W-270KM/H</option>
                                <option value="Y-300KM/H">Y-300KM/H</option>
                                <option value="Z-MAYOR A 300KM/H">Z-MAYOR A 300KM/H</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12 col-xs-12 col-lg-3">
                            <label><small> CONSTANCIA/CUMPLIMIENTO :</small></label>
                            <input type="text" class="form-control text-uppercase" name="neu_xcum" id="neu_xcum" value="<?php echo $neu_xcum; ?>" title="Ingrese Constancia/Cumplimiento">
                        </div>
                        <div class="form-group col-md-12 col-xs-12 col-lg-3">
                            <label><small>ITEM DE LA CONSTANCIA :</small></label>
                            <input type="text" class="form-control text-uppercase" name="neu_xitem" id="neu_xitem" value="<?php echo $neu_xitem; ?>" title="Ingrese Item de la Constancia">
                        </div>
                        <div class="form-group col-md-12 col-xs-12 col-lg-2">
                            <label><small> VIGENCIA :</small></label>
                            <input type="date" class="form-control text-uppercase" name="neu_xvigen" id="neu_xvigen" value="<?php echo $neu_xvigen; ?>" title="Ingrese Vigencia">
                        </div>
                        <div class="form-group col-md-12 col-xs-12 col-lg-5">
                            <label><small>DECLARACION/CONFORMIDAD :</small></label>
                            <input type="text" class="form-control text-uppercase" id="neu_xconfor" name="neu_xconfor" value="<?php echo $neu_xconfor; ?>" title="Ingrese Declaracion/Conformidad">
                        </div>
                        <div class="form-group col-md-12 col-xs-12 col-lg-5">
                            <label><small>PARTIDA ARANCELARIA :</small></label>
                            <input type="text" class="form-control text-uppercase" id="neu_xparti" name="neu_xparti" value="<?php echo $neu_xparti; ?>" title="Ingrese Partida Arancelaria">
                        </div>
                    </div>
                    <?php
                    } else if ($xtpducto == '2') {
                        // echo "es uno";
                        ?>
                        <div class="form" id="div_form_cam" style="">
                        <input type="hidden" name="edit" id="edit" value="<?php echo $edit; ?>">
                        <input type="hidden" name="codigo" id="codigo" value="<?php echo $codigo; ?>">
                        <input type="hidden" name="sunat" id="sunat" value="<?php echo $sunat; ?>">
                        <input type="hidden" name="xclasi" id="xclasi" value="<?php echo $xclasi; ?>">
                        <input type="hidden" name="xclasiNom" id="xclasiNom" value="<?php echo $xclasiNom; ?>">
                        <input type="hidden" name="xmarcaID" id="xmarcaID" value="<?php echo $xmarcaID; ?>">
                        <input type="hidden" name="xopc" id="xopc" value="<?php echo $xopc; ?>">
                        <input type="hidden" name="xpaisID" id="xpaisID" value="<?php echo $xpaisID; ?>">
                        <input type="hidden" name="cam_xmed" id="cam_xmed" value="<?php echo $cam_xmed; ?>">
                        <input type="hidden" name="cam_xaro" id="cam_xaro" value="<?php echo $cam_xaro; ?>">
                        <input type="hidden" name="cam_xval" id="cam_xval" value="<?php echo $cam_xval; ?>">

                        <input type="hidden" class="form-control text-uppercase" name="xuni" value="<?php echo $xuni; ?>">


                        <div id="div_sku" class="form-group  col-md-4 col-xs-12 col-lg-6" style=" top: 100;">
                            <label><small> CODIGO SKU :</small></label>
                            <input type="text" id="nombre3" name="nombre3" placeholder="Recibe SKU" value="<?php echo $codigo; ?>" class=" form-control" disabled>
                        </div>
                        <input type="hidden" id="nombreSku" name="nombreSku" placeholder="Recibe SKU" value="<?php echo $codigo; ?>" class="form-control">
                        <div id="div_sku" class="form-group  col-md-4 col-xs-12 col-lg-6" style=" top: 100;">
                            <label><small> CODIGO SUNAT :</small></label>
                            <input type="text" id="nombre3" name="nombre3" placeholder="Recibe SKU" value="<?php echo $sunat; ?>" class="form-control" disabled>
                        </div>
                        <input type="hidden" id="nombreSku" name="nombreSku" placeholder="Recibe SKU" value="<?php echo $sunat; ?>" class="form-control">
                        <div class="form-group col-md-4 col-xs-12 col-lg-2">
                            <!-- ANCHO DE SECCION INTERNO -->
                            <label><small>TIPO PRODUCTO:</small></label>
                            <input type=" text" class="form-control text-uppercase" id="" name="" value="<?php echo $xclasiNom; ?>" disabled>
                            <input type="hidden" class="form-control text-uppercase" id="xclasiNom" name="xclasiNom" value="<?php echo $xclasiNom; ?>">
                        </div>
                        <!-- ---------------------------------------------MARCA -------------------------------------------------------------------------------->

                        <div id="" class=" miClase form-group  col-md-8 col-xs-12 col-lg-3">
                            <label><small>MARCA :</small></label>
                            <select class="form-control" name="xmar2" id="xmar2" onchange="ShowMarca2();PasarValorEdit();"   title="Ingrese la Marca">
                                        <!--MARCA-->
                                        <?php
                                        $sql3 = "SELECT mr.mar_id,mr.mar_nombre,mr.mar_estatus,pclasi.produ_clasi_id,
                                        pclasi.produ_clasi_desc
                                        FROM                
                                        sys_marca mr, sys_produ_clasi pclasi
                                        WHERE mr.produ_clasi_id = pclasi.produ_clasi_id and mr.produ_clasi_id = '2'";
                                        $rsql3 = mysqli_query($con, $sql3);
                                        echo  "<option id='$xmarcaID' value='$xmarcaNom' >--Actual--</option>";
                                        echo "<option value='$xmarcaID' selected > $xmarcaNom</option>";
                                        echo  "<option>--Existente--</option>";
                                        if ($row3 = mysqli_fetch_array($rsql3, MYSQLI_ASSOC)) {
                                            do {
                                                
                                                echo '<option value="' . $row3['mar_id'] . '">' . $row3['mar_nombre'] . '</option>';
                                            } while ($row3 = mysqli_fetch_array($rsql3, MYSQLI_ASSOC));
                                        }
                                        echo "<option  value=''  onclick='DivNewNeuDisplay(1);'  >NUEVA MARCA</option>";
                                        ?>
                                    </select>
                            <input type="hidden" class="form-control" name="xmarNom2" id="xmarNom2" value="<?php echo $xmarcaNom; ?>" onchange="PasarValorEdit();">
                        </div>
                        <!-- ---------------------------------------------MARCA ------------------------------------------------------------------------------->
                        <div class="form-group  col-md-4 col-xs-12 col-lg-4">
                                    <label><small>TIPO :</small></label>
                                    <select class="form-control" id="xtp1" name="xtp1" title="Ingrese Tipo ">
                                        <option value="">--Actual--</option>
                                        <option value="<?php echo $xopc; ?>" selected><?php echo $xopc; ?></option>
                                        <option value="">--Existente--</option>
                                        <option value="RADIAL">RADIAL</option>
                                        <option value="CONVENCIONAL">CONVENCIONAL</option>
                                    </select>
                                </div>
                        <!-- ---------------------------------------------PAIS--------------------------------------------------------------------------------->
                        <div class="form-group  col-md-4 col-xs-12 col-lg-2">
                            <label> <small>PAIS :</small></label>
                            <select class="form-control" id="xpais2" name="xpais2" onchange="ShowPais2();" title="Ingrese Pais">
                                <!-- Leer los Clasificacion -->
                                <?php
                                    $sql6 = "SELECT pais_id,pais_nombre from sys_pais WHERE pais_estatus=1 order by pais_id";
                                    $rsql6 = mysqli_query($con, $sql6);
                                    echo "<option value='$xpaisID' selected>$xpaisNom</option>";
                                    if ($row6 = mysqli_fetch_array($rsql6, MYSQLI_ASSOC)) {
                                        do {
                                            echo '<option value="' . $row6['pais_id'] . '">' . $row6['pais_nombre'] . '</option>';
                                        } while ($row6 = mysqli_fetch_array($rsql6, MYSQLI_ASSOC));
                                    }
                                    ?>
                            </select>
                        </div>
                        <input type="hidden" class="form-control" name="xpaisNom2" id="xpaisNom2" title="Ingrese Pais" value="<?php echo $xpaisNom; ?>">
                        <!-- -------------------------------------------------PAIS------------------------------------------------------------------------------>
                        <div class=" form-group col-xs-12 col-md-3 col-lg-1">
                            <label><small>MEDIDA :</small></label>
                            <input type="text" class="form-control text-uppercase" name="cam_xmed" id="cam_xmed" title="Ingrese la Medida" value="<?php echo $cam_xmed; ?>" >
                        </div>
                        <div class="form-group col-md-2 col-xs-12 col-lg-1">
                            <label><small>ARO :</small></label>
                            <input type="text" class="form-control text-uppercase" name="cam_xaro" id="cam_xaro" title="Ingrese el Aro" value="<?php echo $cam_xaro; ?>">
                        </div>
                        <div class="form-group col-md-2 col-xs-12 col-lg-2">
                            <label><small>VALVULA :</small></label>
                            <input type="text" class="form-control text-uppercase" name="cam_xval" id="cam_xval" title="Ingrese el Valvula" value="<?php echo $cam_xval; ?>">
                        </div>

                    </div>
                    <?php
                    } else if ($xtpducto == '3') {
                        echo "es 3";
                        ?>
                        <div class="form" id="div_form_aro" style="">
                        <input type="hidden" name="edit"        id="edit"       value="<?php echo $edit;        ?>">
                        <input type="hidden" name="codigo"      id="codigo"     value="<?php echo $codigo;      ?>">
                        <input type="hidden" name="sunat"       id="sunat"      value="<?php echo $sunat;       ?>">
                        <input type="hidden" name="xclasi"      id="xclasi"     value="<?php echo $xclasi;      ?>">
                        <input type="hidden" name="xclasiNom"   id="xclasiNom"  value="<?php echo $xclasiNom;   ?>">
                        <input type="hidden" name="xmarcaID"    id="xmarcaID"   value="<?php echo $xmarcaID;    ?>">
                        <input type="hidden" name="aro_xmod"    id="aro_xmod"   value="<?php echo $aro_xmod;    ?>">
                        <input type="hidden" name="xopc"        id="xopc"       value="<?php echo $xopc;        ?>">
                        <input type="hidden" name="xpaisID"     id="xpaisID"    value="<?php echo $xpaisID;     ?>">
                        <input type="hidden" name="cam_xmed"    id="cam_xmed"   value="<?php echo $cam_xmed;    ?>">
                        <input type="hidden" name="cam_xaro"    id="cam_xaro"   value="<?php echo $cam_xaro;    ?>">
                        <input type="hidden" name="cam_xval"    id="cam_xval"   value="<?php echo $cam_xval;    ?>">

                        <input type="hidden" class="form-control text-uppercase" name="xuni" value="<?php echo $xuni; ?>">

                        <div id="div_sku" class="form-group  col-md-4 col-xs-12 col-lg-6" style=" top: 100;">
                            <label><small> CODIGO SKU :</small></label>
                            <input type="text" id="nombre3" name="nombre3" placeholder="Recibe SKU" value="<?php echo $codigo; ?>" class=" form-control" reanly>
                        </div>
                        <input type="text" id="nombreSku" name="nombreSku" placeholder="Recibe SKU" value="<?php echo $codigo; ?>" class="form-control">
                        <div id="div_sunat_2" class="form-group  col-md-8 col-xs-12 col-lg-3 text-right" >
                                    <label><small> CODIGO SUNAT :</small></label>
                                    <select class="form-control" id="sunat" name="sunat" title="Ingrese la Sunat" onchange="PasarValor3();">
                                        <option value="0" >-Actual-</option>
                                        <option value="<?php echo $sunat;?>" selected><?php echo $sunat;?></option>
                                        <option value="0" >-Existente-</option>
                                        <option onchange="PasarValor3();" value="25171901" title="RINES O RUEDAS PARA AUTOMÓVILES">25171901</option>
                                        <option value="25171903" title="RINES O RUEDAS PARA CAMIONES">25171903</option>
                                        <option value="25172512" title="LLANTA DE MOTOCICLETA">25172512</option>
                                    </select>
                                </div>
                        <div class="form-group col-md-4 col-xs-12 col-lg-2">
                            <!-- ANCHO DE SECCION INTERNO -->
                            <label><small>TIPO PRODUCTO:</small></label>
                            <input type=" text" class="form-control text-uppercase" id="xclasiNom" name="xclasiNom" value="<?php echo $xclasiNom; ?>" disabled>
                            <input type="hidden" class="form-control text-uppercase" id="xclasiNom" name="xclasiNom" value="<?php echo $xclasiNom; ?>">
                        </div>
                        <!-- ------------------------MARCA--------------------------------------------------- -->

                        <div id="" class=" miClase form-group  col-md-8 col-xs-12 col-lg-3">
                            <label><small>MARCA :</small></label>
                            <select class="form-control" name="xmar3" id="xmar3" onchange="ShowMarca3();PasarValor3();"   title="Ingrese la Marca">
                                        <!--MARCA-->
                                        <?php
                                        $sql3 = "SELECT mr.mar_id,mr.mar_nombre,mr.mar_estatus,pclasi.produ_clasi_id,
                                        pclasi.produ_clasi_desc
                                        FROM                
                                        sys_marca mr, sys_produ_clasi pclasi
                                        WHERE mr.produ_clasi_id = pclasi.produ_clasi_id and mr.produ_clasi_id = '3'";
                                        $rsql3 = mysqli_query($con, $sql3);
                                        echo  "<option id='$xmarcaID' value='$xmarcaNom' >--Actual--</option>";
                                        echo "<option value='$xmarcaID' selected > $xmarcaNom</option>";
                                        echo  "<option>--Existente--</option>";
                                        if ($row3 = mysqli_fetch_array($rsql3, MYSQLI_ASSOC)) {
                                            do {
                                                
                                                echo '<option value="' . $row3['mar_id'] . '">' . $row3['mar_nombre'] . '</option>';
                                            } while ($row3 = mysqli_fetch_array($rsql3, MYSQLI_ASSOC));
                                        }
                                        echo "<option  value=''  onclick='DivNewNeuDisplay(1);'  >NUEVA MARCA</option>";
                                        ?>
                                    </select>
                            <input type="hidden" class="form-control" name="xmarNom3" id="xmarNom3" value="<?php echo $xmarcaNom; ?>" onchange="PasarValor3();">
                        </div>
                        <div class="form-group  col-md-4 col-xs-12 col-lg-3">
                                    <label><small>TIPO :</small></label>
                                    <select class="form-control" id="aro_xmod" name="aro_xmod" title="Ingrese Tipo" onchange="PasarValor3();">
                                        <option value="0" >-Actual-</option>
                                        <option value="<?php echo $aro_xmod; ?>" selected><?php echo $aro_xmod; ?></option>
                                        <option value="0">-Existente-</option>
                                        <option value="AMERICANO">AMERICANO</option>
                                        <option value="ARTILLERO">ARTILLERO</option>
                                        <option value="EUROPEO">EUROPEO</option>
                                        <option value="PLATA">PLATA</option>
                                        <option value="PULIDO POR AMBOS LADOS">PULIDO POR AMBOS LADOS</option>
                                    </select>
                                </div>
                        <!-- -----------------------------------MARCA----------------------------------- -->
                        <div class="form-group  col-md-8 col-xs-12 col-lg-2">
                            <label><small> PAIS :</small></label>
                            <select class="form-control" id="xpais3" name="xpais3" onchange="ShowPais3();" title="Ingrese Pais" onchange="PasarValor3();">
                                <!-- Leer los Clasificacion -->
                                <?php
                                    $sql8 = "SELECT pais_id,pais_nombre from sys_pais WHERE pais_estatus=1 order by pais_id";
                                    $rsql8 = mysqli_query($con, $sql8);
                                    echo "<option value='$xpaisID' selected>$xpaisNom</option>";
                                    if ($row8 = mysqli_fetch_array($rsql8, MYSQLI_ASSOC)) {
                                        do {
                                            echo '<option value="' . $row8['pais_id'] . '">' . $row8['pais_nombre'] . '</option>';
                                        } while ($row8 = mysqli_fetch_array($rsql8, MYSQLI_ASSOC));
                                    }
                                    ?>
                            </select>
                        </div>
                        <input type="hidden" class="form-control" name="xpaisNom3" id="xpaisNom3" value="<?php echo $xpaisNom; ?>">
                        <!-- -------------------------------PAIS-------------------------------------------- -->
                        <div class="form-group col-xs-12 col-md-12 col-lg-3">
                                    <label><small> MEDIDA :</small></label>
                                    <input type="text" class="form-control text-uppercase" name="aro_xmed" id="aro_xmed"  value="<?php echo $aro_xmed; ?>" title="Ingrese la Medida" onchange="PasarValor3();">
                                </div>
                        <div class="form-group col-md-12 col-xs-12 col-lg-2">
                            <label><small> ESPESOR(MM) :</small></label>
                            <input type="text" class="form-control text-uppercase" name="aro_xespe" id="aro_xespe" title="Ingrese el Espesor" value="<?php echo $aro_xespe; ?>">
                        </div>
                        <div class="form-group col-md-12 col-xs-12 col-lg-2">
                            <label><small> N° HUECOS : </small></label>
                            <input type="text" class="form-control text-uppercase" name="aro_xhueco" id="aro_xhueco" title="Ingrese el N° Huecos" value="<?php echo $aro_xhueco; ?>">
                        </div>
                        <div class="form-group col-md-12 col-xs-12 col-lg-2">
                            <label><small> ESPESOR/HUECO :</small></label>
                            <input type="text" class="form-control text-uppercase" name="aro_xhole" id="aro_xhole" title="Ingrese el Espesor/Hueco" value="<?php echo $aro_xhole; ?>">
                        </div>
                        <div class="form-group col-md-12 col-xs-12 col-lg-2">
                            <label><small> C.B.D :</small></label>
                            <input type="text" class="form-control text-uppercase" name="aro_xcbd" id="aro_xcbd" title="Ingrese C.B.D" value="<?php echo $aro_xcbd; ?>">
                        </div>
                        <div class="form-group col-md-12 col-xs-12 col-lg-2">
                            <label><small> P.C.D :</small></label>
                            <input type="text" class="form-control text-uppercase" name="aro_xpcd" id="aro_xpcd" title="Ingrese P.C.D" value="<?php echo $aro_xpcd; ?>">
                        </div>
                        <div class="form-group col-md-12 col-xs-12 col-lg-2">
                            <label><small> OFFSET :</small></label>
                            <input type="text" class="form-control text-uppercase" name="aro_xoff" id="aro_xoff" title="Ingrese el OffSet" value="<?php echo $aro_xoff; ?>">
                        </div>
                    </div>
                    <?php
                    } else if ($xtpducto == '4') {
                        ?>
                    <div class="form" id="div_form_pro" style="">
                        <input type="hidden" name="edit"        id="edit" value="<?php echo $edit; ?>">
                        <input type="hidden" name="codigo"      id="codigo"     value="<?php echo $codigo;      ?>">
                        <input type="hidden" name="sunat"       id="sunat"      value="<?php echo $sunat;       ?>">
                        <input type="hidden" name="xclasi"      id="xclasi"     value="<?php echo $xclasi;      ?>">
                        <input type="hidden" name="xclasiNom"   id="xclasiNom"  value="<?php echo $xclasiNom;   ?>">
                        <input type="hidden" name="xmarcaID"    id="xmarcaID"   value="<?php echo $xmarcaID;    ?>">
                        <input type="hidden" name="xdesc1"    id="xdesc1"   value="<?php echo $produ_desc;    ?>">
                        <input type="hidden" name="xpaisID"     id="xpaisID"    value="<?php echo $xpaisID;     ?>">
                        <!-- <label><small>CODIGO:</small></label> -->

                        <!-- Leer los Clasificacion -->

                        <!-- <input class="form-control" id="xpais3" name="xpais3" value="" onchange="ShowPais3();" title="Ingrese Pais" onclick="PasarValor3();"> -->

                        <div id="div_sku" class="form-group  col-md-4 col-xs-12 col-lg-6" style=" top: 100;">
                            <label><small> CODIGO SKU :</small></label>
                            <input type="text" id="nombre3" name="nombre3" placeholder="Recibe SKU" value="<?php echo $codigo; ?>" class=" form-control" disabled>
                        </div>
                        <input type="hidden" id="nombreSku" name="nombreSku" placeholder="Recibe SKU" value="<?php echo $codigo; ?>" class="form-control">
                        <div id="div_sku" class="form-group  col-md-4 col-xs-12 col-lg-6" style=" top: 100;">
                            <label><small> CODIGO SUNAT :</small></label>
                            <input type="text" id="nombre3" name="nombre3" placeholder="Recibe SKU" value="<?php echo $sunat; ?>" class="form-control" disabled>
                        </div>
                        <input type="hidden" id="nombreSku" name="nombreSku" placeholder="Recibe SKU" value="<?php echo $sunat; ?>" class="form-control">
                        <div class="form-group col-md-4 col-xs-12 col-lg-2">
                            <!-- ANCHO DE SECCION INTERNO -->
                            <label><small>TIPO PRODUCTO:</small></label>
                            <input type=" text" class="form-control text-uppercase" id="xclasiNom" name="xclasiNom" value="<?php echo $xclasiNom; ?>" disabled>
                            <input type="hidden" class="form-control text-uppercase" id="xclasiNom" name="xclasiNom" value="<?php echo $xclasiNom; ?>">
                        </div>
                        <!-- ------------------------MARCA--------------------------------------------------- -->
                        <div id="div_marca_pro" class="form-group  col-md-8 col-xs-12 col-lg-2">
                            <label><small>MARCA :</small></label>
                            <select class="form-control" name="xmar4" id="xmar4" onchange="ShowMarca4();PasarValor4();" title="Ingrese Marca" onclick="PasarValor4();">
                                <?php
                                    $sql9 = "SELECT mr.mar_id,mr.mar_nombre,mr.mar_estatus,pclasi.produ_clasi_id,
                                                        pclasi.produ_clasi_desc
                                                        FROM
                                                        sys_marca mr, sys_produ_clasi pclasi
                                                        WHERE mr.produ_clasi_id = pclasi.produ_clasi_id and mr.produ_clasi_id = '4'";
                                    $rsql9 = mysqli_query($con, $sql9);
                                    echo "<option value='$xmarcaID' selected >$xmarcaNom</option>";
                                    if ($row9 = mysqli_fetch_array($rsql9, MYSQLI_ASSOC)) {
                                        do {
                                            echo '<option value="' . $row9['mar_id'] . '">' . $row9['mar_nombre'] . '</option>';
                                        } while ($row9 = mysqli_fetch_array($rsql9, MYSQLI_ASSOC));
                                    }
                                    echo "<option  value='0'  onclick='DivNewProDisplay(1);'>NUEVA MARCA</option>";
                                    ?>
                            </select>
                        </div>
                        <input type="hidden" class="form-control" id="xmarNom4" name="xmarNom4" onchange="PasarValor4();">
                        <!-- -----------------------------------MARCA----------------------------------- -->
                        <!-- --------------------------------PAIS---------------------------------- -->
                        <div class="form-group  col-md-8 col-xs-12 col-lg-2">
                            <label><small> PAIS :</small></label>
                            <select class="form-control" id="xpais4" name="xpais4" onchange="ShowPais4();PasarValor4();" title="Ingrese Pais" onclick="PasarValor4();">
                                <!-- Leer los Clasificacion -->
                                <?php
                                    $sql10 = "SELECT pais_id,pais_nombre from sys_pais WHERE pais_estatus=1 order by pais_id";
                                    $rsql10 = mysqli_query($con, $sql10);
                                    echo "<option value='$xpaisID' selected>$xpaisNom</option>";
                                    if ($row10 = mysqli_fetch_array($rsql10, MYSQLI_ASSOC)) {
                                        do {
                                            echo '<option value="' . $row10['pais_id'] . '">' . $row10['pais_nombre'] . '</option>';
                                        } while ($row10 = mysqli_fetch_array($rsql10, MYSQLI_ASSOC));
                                    }
                                    ?>
                            </select>
                        </div>
                        <input type="hidden" class="form-control" id="xpaisNom4" name="xpaisNom4" onchange="PasarValor4();">
                        <!-- -------------------------------PAIS-------------------------------------------- -->
                        <div class="form-group col-xs-12 col-md-12 col-lg-4">
                            <label><small>DESCRIPCION :</small></label>
                            <input type="text" class="form-control text-uppercase" id="xdesc1" name="xdesc1" title="Ingrese la Descripcion"  onchange="PasarValor4();" value="<?php echo $produ_desc; ?>">
                        </div>
                    </div>
                    <?php
                    } else if ($xtpducto == '5') {
                        ?>
                    <div class=" form" id="div_form_ace" style="">
                     <input type="hidden" name="edit"        id="edit" value="<?php echo $edit; ?>">
                        <!-- <label><small>CODIGO:</small></label> -->
                        <input type="hidden" class="form-control text-uppercase" name="xuni" value="<?php echo $xuni; ?>">

                        <!-- Leer los Clasificacion -->

                        <!-- <input class="form-control" id="xpais3" name="xpais3" value="" onchange="ShowPais3();" title="Ingrese Pais" onclick="PasarValor3();"> -->

                        <div id="div_sku" class="form-group  col-md-4 col-xs-12 col-lg-6" style=" top: 100;">
                            <label><small> CODIGO SKU :</small></label>
                            <input type="text" id="nombre3" name="nombre3" placeholder="Recibe SKU" value="<?php echo $codigo; ?>" class=" form-control" disabled>
                        </div>
                        <input type="hidden" id="nombreSku" name="nombreSku" placeholder="Recibe SKU" value="<?php echo $codigo; ?>" class="form-control">
                        <div id="div_sku" class="form-group  col-md-4 col-xs-12 col-lg-6" style=" top: 100;">
                            <label><small> CODIGO SUNAT :</small></label>
                            <input type="text" id="nombre3" name="nombre3" placeholder="Recibe SKU" value="<?php echo $sunat; ?>" class="form-control" disabled>
                        </div>
                        <input type="hidden" id="nombreSku" name="nombreSku" placeholder="Recibe SKU" value="<?php echo $sunat; ?>" class="form-control">
                        <div class="form-group col-md-4 col-xs-12 col-lg-2">
                            <!-- ANCHO DE SECCION INTERNO -->
                            <label><small>TIPO PRODUCTO:</small></label>
                            <input type=" text" class="form-control text-uppercase" id="xclasiNom" name="xclasiNom" value="<?php echo $xclasiNom; ?>" disabled>
                            <input type="hidden" class="form-control text-uppercase" id="xclasiNom" name="xclasiNom" value="<?php echo $xclasiNom; ?>">
                        </div>
                        <!-- ---------------------------------MARCA--------------------------------- -->
                        <div id="div_marca_ace" class="form-group  col-md-8 col-xs-12 col-lg-2">
                            <label><small>MARCA :</small></label>
                            <select class="form-control" name="xmar5" id="xmar5" onchange="ShowMarca5();" title="Ingrese Marca" onclick="PasarValor5();OcultarSunat();">
                                <?php
                                    $sql11 = "SELECT mr.mar_id,mr.mar_nombre,mr.mar_estatus,pclasi.produ_clasi_id,
                                                        pclasi.produ_clasi_desc
                                                        FROM
                                                        sys_marca mr, sys_produ_clasi pclasi
                                                        WHERE mr.produ_clasi_id = pclasi.produ_clasi_id and mr.produ_clasi_id = '5'";
                                    $rsql11 = mysqli_query($con, $sql11);
                                    echo "<option value='$xmarcaID' selected >$xmarcaNom</option>";
                                    if ($row11 = mysqli_fetch_array($rsql11, MYSQLI_ASSOC)) {
                                        do {
                                            echo '<option value="' . $row11['mar_id'] . '">' . $row11['mar_nombre'] . '</option>';
                                        } while ($row11 = mysqli_fetch_array($rsql11, MYSQLI_ASSOC));
                                    }

                                    ?>
                            </select>
                        </div>
                        <input type="hidden" class="form-control" id="xmarNom5" name="xmarNom5" onchange="PasarValor5();">
                        <!-- ---------------------------------MARCA--------------------------------- -->
                        <div class="form-group  col-md-8 col-xs-12 col-lg-2">
                            <label><small>PAIS :</small></label>
                            <select class="form-control" id="xpais5" name="xpais5" onchange="ShowPais5();" title="Ingrese Nombre Pais" onclick="PasarValor5();">
                                <!-- Leer los Clasificacion -->
                                <?php
                                    $sql12 = "SELECT pais_id,pais_nombre from sys_pais WHERE pais_estatus=1 order by pais_id";
                                    $rsql12 = mysqli_query($con, $sql12);
                                    echo "<option value='$xpaisID' selected>$xpaisNom</option>";
                                    if ($row12 = mysqli_fetch_array($rsql12, MYSQLI_ASSOC)) {
                                        do {
                                            echo '<option value="' . $row12['pais_id'] . '">' . $row12['pais_nombre'] . '</option>';
                                        } while ($row12 = mysqli_fetch_array($rsql12, MYSQLI_ASSOC));
                                    }
                                    ?>
                            </select>
                        </div>
                        <input type="hidden" class="form-control" name="xpaisNom5" id="xpaisNom5" onchange="PasarValor5();">
                        <div class="form-group col-xs-12 col-md-12 col-lg-4" title="Ingrese Descripcion">
                            <label><small>DESCRIPCION :</small></label>
                            <input class="form-control text-uppercase" name="xdesc2" id="xdesc2" value="<?php echo $xdesc2; ?>" onchange="PasarValor5();">
                        </div>
                        <div class="form-group col-md-12 col-xs-12 col-lg-2">
                            <label><small> P/N :</small></label>
                            <input type="text" class="form-control text-uppercase" name="xpn" id="xpn" title="Ingrese solo el P/N " value="<?php echo $xpn; ?>" onchange="PasarValor5();" onclick="PasarValor5();">
                        </div>
                        <input type="hidden" class="form-control text-uppercase" name="xuni" value="U">
                    </div>
                    <?php
                    } else { }
                    ?>

                    <div id="div_guardar" style="">
                        <div class="col-lg-3 col-md-4 hidden-xs top">
                            <button type="submit" class="btn btn-primary" id="btn_guardarEdit" name="GuardarE" value="GuardarE">Guardar </button>
                            <button type="reset" class="btn btn-default" onclick="location.reload()">Limpiar</button>
                            <a href="index.php?menu=1" class="btn btn-warning" role="button"><i class="glyphicon glyphicon-chevron-left"></i></a>
                        </div>
                        <div class="col-xs-12 visible-xs top">
                            <button type="submit" class="btn btn-primary" id="btn_guardarEdit" name="GuardarE" value="GuardarE">Guardar </button>
                            <button type="reset" class="btn btn-default" onclick="location.reload()">Limpiar</button>
                            <a href="index.php?menu=1" class="btn btn-warning" role="button"><i class="glyphicon glyphicon-chevron-left"></i></a>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
<!--panel panel-default-->
</div>
<!--col-lg-12 col-md-12 col-xs-12-->
<!-- /.panel-body -->
</div><!-- /.row-->

<link href="css_sg/general.css?" rel="stylesheet" type="text/css" />
<!-- <script src="			language="Javascript"></script>	 -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"> -->
<script src="js_sg/producto.js?<?= substr(time(), -5) ?>" language="Javascript"></script>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>