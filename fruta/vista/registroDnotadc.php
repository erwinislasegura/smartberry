<?php

include_once "../../assest/config/validarUsuarioFruta.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../../assest/controlador/EEXPORTACION_ADO.php';
include_once '../../assest/controlador/ESPECIES_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/TCALIBRE_ADO.php';
include_once '../../assest/controlador/TMONEDA_ADO.php';
include_once '../../assest/controlador/DICARGA_ADO.php';

include_once '../../assest/controlador/NOTADC_ADO.php';
include_once '../../assest/controlador/DNOTADC_ADO.php';


include_once '../../assest/modelo/DNOTADC.php';



//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$EEXPORTACION_ADO =  new EEXPORTACION_ADO();
$ESPECIES_ADO =  new ESPECIES_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$TCALIBRE_ADO =  new TCALIBRE_ADO();
$TMONEDA_ADO =  new TMONEDA_ADO();
$DICARGA_ADO =  new DICARGA_ADO();


$NOTADC_ADO =  new NOTADC_ADO();
$DNOTADC_ADO =  new DNOTADC_ADO();

//INIICIALIZAR MODELO
$DNOTADC =  new DNOTADC();

//INICIALIZACION VARIABLES

$TNOTA="";
$NOTA = "";
$EEXPORTACION = "";
$ESPECIES = "";
$CALIBRE = "";
$EEXPORTACION = "";
$KILOSBRUTO = 0;
$PRECIOUS = 0;
$KILOSNETO = 0;
$KILOSNETO = 0;
$KILOSBRUTO = 0;
$CANTIDADENVASE = 0;
$TOTALPRECIOUS = 0;
$TOTALPRECIOUSNCND = 0;
$PRECIOUSNCND = 0; 
$CANTIDADNOTA=0;
$IDDICARGA = "";
$IDICARGA = "";
$NOTA="";

$PESOENVASEESTANDAR = 0;
$PESOPALLETEESTANDAR = 0;
$PESOBRUTOEESTANDAR = 0;
$PESONETOEESTANDAR = 0;




$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";

$TMANEJO = "";
$FOLIOALIAS = "";
$DISABLED = "";
$DISABLED2 = "";
$DISABLEDSTYLE = "";
$DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
$MENSAJEELIMINAR = "";


$IDOP = "";
$IDOP2 = "";
$OP = "";
$SINO = "";
$MENSAJE = "";

$NODATOURL = "";

//INICIALIZAR ARREGLOS
$ARRAYESTANDAR = "";
$ARRAYCALIBRE = "";
$ARRAYESTANDARDETALLE = "";




//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES

$ARRAYESTANDAR = $EEXPORTACION_ADO->listarEstandarPorEmpresaCBX($EMPRESAS);
$ARRAYCALIBRE = $TCALIBRE_ADO->listarCalibrePorEmpresaCBX($EMPRESAS);
$ARRAYTMONEDA = $TMONEDA_ADO->listarTmonedaPorEmpresaCBX($EMPRESAS);
include_once "../../assest/config/validarDatosUrlD.php";

if (isset($_GET["id"])) {
    $id_dato = $_GET["id"];
}else{
    $id_dato = "";
}

if (isset($_GET["a"])) {
    $accion_dato = $_GET["a"];
}else{
    $accion_dato = "";
}

if (isset($_GET["urlo"])) {
    $urlo_dato = $_GET["urlo"];
}else{
    $urlo_dato = "";
}

if (isset($_GET["idd"])) {
    $idd_dato = $_GET["idd"];
}else{
    $idd_dato = "";
}

if (isset($_GET["ad"])) {
    $acciond_dato = $_GET["ad"];
}else{
    $acciond_dato = "";
}


//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION , VISUALIZACION Y CREACION
if (isset($id_dato) && isset($accion_dato) && isset($urlo_dato) && isset($idd_dato) && isset($acciond_dato)) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $idd_dato;
    $OP = $acciond_dato;
    $IDP = $id_dato;
    $OPP = $accion_dato;
    $URLO = $urlo_dato;
    $ARRAYNOTA=$NOTADC_ADO->verNota($IDP);
    if($ARRAYNOTA){
        $TNOTA=$ARRAYNOTA[0]["TNOTA"];
        if($TNOTA==1){
            $NOMBRETNOTA="Nora de Debito";
        }
        if($TNOTA==2){
            $NOMBRETNOTA="Nota de Credito";
        }
    }


    //IDENTIFICACIONES DE OPERACIONES

    //crear =  OBTENCION DE DATOS PARA LA CREACION DE REGISTRO
    if ($OP == "crear") {

        $DISABLED = "";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDICARGA = $DICARGA_ADO->verDicarga($IDOP);
        foreach ($ARRAYDICARGA as $r) :
            $CANTIDADENVASE = "" . $r['CANTIDAD_ENVASE_DICARGA'];
            $CALIBRE = "" . $r['ID_TCALIBRE'];
            $ARRAYVERCALIBRE=$TCALIBRE_ADO->verCalibre($CALIBRE);
            if($ARRAYVERCALIBRE){
               $NOMBRECALIBRE= $ARRAYVERCALIBRE[0]['NOMBRE_TCALIBRE'];
            }else{
                $NOMBRECALIBRE="Sin Datos";
            }
            $TMONEDA = "" . $r['ID_TMONEDA'];
            $ARRAYVERTMONEDA=$TMONEDA_ADO->verTmoneda($TMONEDA);
            if($ARRAYVERTMONEDA){
                $NOMBRETMONEDA= $ARRAYVERTMONEDA[0]['NOMBRE_TMONEDA'];
            }else{
                $NOMBRETMONEDA="Sin Datos";
            }
            $EEXPORTACION=$r['ID_ESTANDAR'];
            $ARRAYVERESTANDAR = $EEXPORTACION_ADO->verEstandar($EEXPORTACION);
            if($ARRAYVERESTANDAR){
                $NOMBRESTANDAR=$ARRAYVERESTANDAR[0]['CODIGO_ESTANDAR'] ."-". $ARRAYVERESTANDAR[0]['NOMBRE_ESTANDAR'];
                $ESPECIES = $ARRAYVERESTANDAR[0]['ID_ESPECIES'];
                $ARRAYVERESPECIES = $ESPECIES_ADO->verEspecies($ARRAYVERESTANDAR[0]['ID_ESPECIES']);
                if($ARRAYVERESPECIES){
                    $NOMBREESPECIES =  $ARRAYVERESPECIES[0]['NOMBRE_ESPECIES'];
                }else{
                    $NOMBREESPECIES="Sin Datos";
                }
            }else{
                $NOMBRESTANDAR="Sin Datos";
                $NOMBREESPECIES="Sin Datos";
            }            
            $IDICARGA = "" . $r['ID_ICARGA'];
            $ARRAYDNOTA=$DNOTADC_ADO->buscarPorNotaDicarga($IDP,$IDOP);            
            if($ARRAYDNOTA){
                $NOTA=$ARRAYDNOTA[0]["NOTA"];
                $TOTALPRECIOUSNCND =$ARRAYDNOTA[0]["TOTAL"];
                $CANTIDADNOTA = $CANTIDADENVASE  / $ARRAYDNOTA[0]["TOTAL"];                  
            }else{
                $TOTALPRECIOUSNCND = 0;
                $CANTIDADNOTA = 0;                
            }
        endforeach;
    }
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {

        $DISABLED = "";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDICARGA = $DICARGA_ADO->verDicarga($IDOP);
        foreach ($ARRAYDICARGA as $r) :
            $CANTIDADENVASE = "" . $r['CANTIDAD_ENVASE_DICARGA'];
            $CALIBRE = "" . $r['ID_TCALIBRE'];
            $ARRAYVERCALIBRE=$TCALIBRE_ADO->verCalibre($CALIBRE);
            if($ARRAYVERCALIBRE){
               $NOMBRECALIBRE= $ARRAYVERCALIBRE[0]['NOMBRE_TCALIBRE'];
            }else{
                $NOMBRECALIBRE="Sin Datos";
            }
            $TMONEDA = "" . $r['ID_TMONEDA'];
            $ARRAYVERTMONEDA=$TMONEDA_ADO->verTmoneda($TMONEDA);
            if($ARRAYVERTMONEDA){
                $NOMBRETMONEDA= $ARRAYVERTMONEDA[0]['NOMBRE_TMONEDA'];
            }else{
                $NOMBRETMONEDA="Sin Datos";
            }
            $EEXPORTACION=$r['ID_ESTANDAR'];
            $ARRAYVERESTANDAR = $EEXPORTACION_ADO->verEstandar($EEXPORTACION);
            if($ARRAYVERESTANDAR){
                $NOMBRESTANDAR=$ARRAYVERESTANDAR[0]['CODIGO_ESTANDAR'] ."-". $ARRAYVERESTANDAR[0]['NOMBRE_ESTANDAR'];
                $ESPECIES = $ARRAYVERESTANDAR[0]['ID_ESPECIES'];
                $ARRAYVERESPECIES = $ESPECIES_ADO->verEspecies($ARRAYVERESTANDAR[0]['ID_ESPECIES']);
                if($ARRAYVERESPECIES){
                    $NOMBREESPECIES =  $ARRAYVERESPECIES[0]['NOMBRE_ESPECIES'];
                }else{
                    $NOMBREESPECIES="Sin Datos";
                }
            }else{
                $NOMBRESTANDAR="Sin Datos";
                $NOMBREESPECIES="Sin Datos";
            }            
            $IDICARGA = "" . $r['ID_ICARGA'];
            $ARRAYDNOTA=$DNOTADC_ADO->buscarPorNotaDicarga($IDP,$IDOP);            
            if($ARRAYDNOTA){
                $NOTA=$ARRAYDNOTA[0]["NOTA"];
                $TOTALPRECIOUSNCND =$ARRAYDNOTA[0]["TOTAL"];
                $CANTIDADNOTA = $CANTIDADENVASE  / $ARRAYDNOTA[0]["TOTAL"];                  
            }else{
                $TOTALPRECIOUSNCND = 0;
                $CANTIDADNOTA = 0;                
            }
        endforeach;
    }
    //ver =  OBTENCION DE DATOS PARA LA VISUALIZACION DEL REGISTRO
    if ($OP == "ver") {
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDICARGA = $DICARGA_ADO->verDicarga($IDOP);
        foreach ($ARRAYDICARGA as $r) :
            $CANTIDADENVASE = "" . $r['CANTIDAD_ENVASE_DICARGA'];
            $CALIBRE = "" . $r['ID_TCALIBRE'];
            $ARRAYVERCALIBRE=$TCALIBRE_ADO->verCalibre($CALIBRE);
            if($ARRAYVERCALIBRE){
               $NOMBRECALIBRE= $ARRAYVERCALIBRE[0]['NOMBRE_TCALIBRE'];
            }else{
                $NOMBRECALIBRE="Sin Datos";
            }
            $TMONEDA = "" . $r['ID_TMONEDA'];
            $ARRAYVERTMONEDA=$TMONEDA_ADO->verTmoneda($TMONEDA);
            if($ARRAYVERTMONEDA){
                $NOMBRETMONEDA= $ARRAYVERTMONEDA[0]['NOMBRE_TMONEDA'];
            }else{
                $NOMBRETMONEDA="Sin Datos";
            }
            $EEXPORTACION=$r['ID_ESTANDAR'];
            $ARRAYVERESTANDAR = $EEXPORTACION_ADO->verEstandar($EEXPORTACION);
            if($ARRAYVERESTANDAR){
                $NOMBRESTANDAR=$ARRAYVERESTANDAR[0]['CODIGO_ESTANDAR'] ."-". $ARRAYVERESTANDAR[0]['NOMBRE_ESTANDAR'];
                $ESPECIES = $ARRAYVERESTANDAR[0]['ID_ESPECIES'];
                $ARRAYVERESPECIES = $ESPECIES_ADO->verEspecies($ARRAYVERESTANDAR[0]['ID_ESPECIES']);
                if($ARRAYVERESPECIES){
                    $NOMBREESPECIES =  $ARRAYVERESPECIES[0]['NOMBRE_ESPECIES'];
                }else{
                    $NOMBREESPECIES="Sin Datos";
                }
            }else{
                $NOMBRESTANDAR="Sin Datos";
                $NOMBREESPECIES="Sin Datos";
            }            
            $IDICARGA = "" . $r['ID_ICARGA'];
            $ARRAYDNOTA=$DNOTADC_ADO->buscarPorNotaDicarga($IDP,$IDOP);            
            if($ARRAYDNOTA){
                $NOTA=$ARRAYDNOTA[0]["NOTA"];
                $TOTALPRECIOUSNCND =$ARRAYDNOTA[0]["TOTAL"];
                $CANTIDADNOTA = $CANTIDADENVASE  / $ARRAYDNOTA[0]["TOTAL"];                  
            }else{
                $TOTALPRECIOUSNCND = 0;
                $CANTIDADNOTA = 0;                
            }
        endforeach;
    }


    //ver =  OBTENCION DE DATOS PARA LA VISUALIZACION DEL REGISTRO
    if ($OP == "eliminar") {
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $MENSAJEELIMINAR = "ESTA SEGURO DE ELIMINAR EL REGISTRO, PARA CONFIRMAR PRESIONE ELIMINAR";
        $ARRAYDICARGA = $DICARGA_ADO->verDicarga($IDOP);
        foreach ($ARRAYDICARGA as $r) :
            $CANTIDADENVASE = "" . $r['CANTIDAD_ENVASE_DICARGA'];
            $CALIBRE = "" . $r['ID_TCALIBRE'];
            $ARRAYVERCALIBRE=$TCALIBRE_ADO->verCalibre($CALIBRE);
            if($ARRAYVERCALIBRE){
               $NOMBRECALIBRE= $ARRAYVERCALIBRE[0]['NOMBRE_TCALIBRE'];
            }else{
                $NOMBRECALIBRE="Sin Datos";
            }
            $TMONEDA = "" . $r['ID_TMONEDA'];
            $ARRAYVERTMONEDA=$TMONEDA_ADO->verTmoneda($TMONEDA);
            if($ARRAYVERTMONEDA){
                $NOMBRETMONEDA= $ARRAYVERTMONEDA[0]['NOMBRE_TMONEDA'];
            }else{
                $NOMBRETMONEDA="Sin Datos";
            }
            $EEXPORTACION=$r['ID_ESTANDAR'];
            $ARRAYVERESTANDAR = $EEXPORTACION_ADO->verEstandar($EEXPORTACION);
            if($ARRAYVERESTANDAR){
                $NOMBRESTANDAR=$ARRAYVERESTANDAR[0]['CODIGO_ESTANDAR'] ."-". $ARRAYVERESTANDAR[0]['NOMBRE_ESTANDAR'];
                $ESPECIES = $ARRAYVERESTANDAR[0]['ID_ESPECIES'];
                $ARRAYVERESPECIES = $ESPECIES_ADO->verEspecies($ARRAYVERESTANDAR[0]['ID_ESPECIES']);
                if($ARRAYVERESPECIES){
                    $NOMBREESPECIES =  $ARRAYVERESPECIES[0]['NOMBRE_ESPECIES'];
                }else{
                    $NOMBREESPECIES="Sin Datos";
                }
            }else{
                $NOMBRESTANDAR="Sin Datos";
                $NOMBREESPECIES="Sin Datos";
            }            
            $IDICARGA = "" . $r['ID_ICARGA'];
            $ARRAYDNOTA=$DNOTADC_ADO->buscarPorNotaDicarga($IDP,$IDOP);            
            if($ARRAYDNOTA){
                $NOTA=$ARRAYDNOTA[0]["NOTA"];
                $TOTALPRECIOUSNCND =$ARRAYDNOTA[0]["TOTAL"];
                $CANTIDADNOTA = $CANTIDADENVASE  / $ARRAYDNOTA[0]["TOTAL"];                  
            }else{
                $TOTALPRECIOUSNCND = 0;
                $CANTIDADNOTA = 0;                
            }
        endforeach;
    }
}
if ($_POST) {
    if (isset($_REQUEST['TOTALPRECIOUSNCND'])) {
        $TOTALPRECIOUSNCND = $_REQUEST['TOTALPRECIOUSNCND'];
    }
    if (isset($_REQUEST['NOTA'])) {
        $NOTA = $_REQUEST['NOTA'];
    }
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title> Registro Detalle</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../../assest/config/urlHead.php"; ?>
        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
                function validacion() {
                    TOTALPRECIOUSNCND = document.getElementById("TOTALPRECIOUSNCND").value;
                    TNOTA = document.getElementById("TNOTA").value;
                    NOTA = document.getElementById("NOTA").value;
                    document.getElementById('val_totalusncnd').innerHTML = "";
                    document.getElementById('val_nota').innerHTML = "";
                

                    if (TOTALPRECIOUSNCND == null || TOTALPRECIOUSNCND.length == 0 || /^\s+$/.test(TOTALPRECIOUSNCND)) {
                        document.form_reg_dato.TOTALPRECIOUSNCND.focus();
                        document.form_reg_dato.TOTALPRECIOUSNCND.style.borderColor = "#FF0000";
                        document.getElementById('val_totalusncnd').innerHTML = "NO HA INGRESADO DATOS";
                        return false;
                    }
                    document.form_reg_dato.CANTIDADENVASE.style.borderColor = "#4AF575";

                    if (TOTALPRECIOUSNCND == 0) {
                        document.form_reg_dato.TOTALPRECIOUSNCND.focus();
                        document.form_reg_dato.TOTALPRECIOUSNCND.style.borderColor = "#FF0000";
                        document.getElementById('val_totalusncnd').innerHTML = "DEBE SER DISTINTO DE CERO";
                        return false;
                    }
                    document.form_reg_dato.TOTALPRECIOUSNCND.style.borderColor = "#4AF575";
                    if(TNOTA==1){
                        if (TOTALPRECIOUSNCND < 0) {
                            document.form_reg_dato.TOTALPRECIOUSNCND.focus();
                            document.form_reg_dato.TOTALPRECIOUSNCND.style.borderColor = "#FF0000";
                            document.getElementById('val_totalusncnd').innerHTML = "NO PUEDE SER MENOR A ZERO";
                            return false;
                        }
                    }
                    if(TNOTA==2){
                        if (TOTALPRECIOUSNCND > 0) {
                            document.form_reg_dato.TOTALPRECIOUSNCND.focus();
                            document.form_reg_dato.TOTALPRECIOUSNCND.style.borderColor = "#FF0000";
                            document.getElementById('val_totalusncnd').innerHTML = "NO PUEDE SER MATOR A ZERO";
                            return false;
                        }
                    }
                    
                    if (NOTA == null || NOTA.length == 0 || /^\s+$/.test(NOTA)) {
                        document.form_reg_dato.NOTA.focus();
                        document.form_reg_dato.NOTA.style.borderColor = "#FF0000";
                        document.getElementById('val_nota').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOTA.style.borderColor = "#4AF575";
                    
                    
                    
                }
                function precio(){
                    var valorndnc;
                    var repuesta;

                    TOTALPRECIOUSNCND = document.getElementById("TOTALPRECIOUSNCND").value;
                    CANTIDADENVASEE = parseInt(document.getElementById("CANTIDADENVASEE").value);

                    document.getElementById('val_totalusncnd').innerHTML = "";                

                    if (TOTALPRECIOUSNCND == null || TOTALPRECIOUSNCND.length == 0 || /^\s+$/.test(TOTALPRECIOUSNCND)) {
                        document.form_reg_dato.TOTALPRECIOUSNCND.focus();
                        document.form_reg_dato.TOTALPRECIOUSNCND.style.borderColor = "#FF0000";
                        document.getElementById('val_totalusncnd').innerHTML = "NO HA INGRESADO DATOS";
                        repuesta = 1;
                    } else {
                        repuesta = 0;
                        document.form_reg_dato.CANTIDADENVASE.style.borderColor = "#4AF575";
                    }
                    if (TOTALPRECIOUSNCND == 0) {
                        document.form_reg_dato.TOTALPRECIOUSNCND.focus();
                        document.form_reg_dato.TOTALPRECIOUSNCND.style.borderColor = "#FF0000";
                        document.getElementById('val_totalusncnd').innerHTML = "DEBE SER DISTINTO DE CERO";
                        repuesta = 1;
                    } else {
                        repuesta = 0;
                        document.form_reg_dato.TOTALPRECIOUSNCND.style.borderColor = "#4AF575";
                    }                          
                    if (repuesta == 0) {
                        valorndnc =     ( CANTIDADENVASEE  / TOTALPRECIOUSNCND );                       
                        console.log(valorndnc);     
                        document.getElementById('CANTIDADNOTA').value = valorndnc;
                        document.getElementById('CANTIDADNOTAE').value = valorndnc;

                    }
                }

                //FUNCION PARA CERRAR VENTANA Y ACTUALIZAR PRINCIPAL
                function cerrar() {
                    window.opener.refrescar()
                    window.close();
                }
                //REDIRECCIONAR A LA PAGINA SELECIONADA
                function irPagina(url) {
                    location.href = "" + url;
                }
            </script>

</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary">
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <?php include_once "../../assest/config/menuFruta.php";
            ?>

            <div class="content-wrapper">
                <div class="container-full">

                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Exportacion</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"> <a href="index.php"> <i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Exportación</li>
                                            <li class="breadcrumb-item" aria-current="page">Nota D/C</li>
                                            <li class="breadcrumb-item" aria-current="page">Registro Nota D/C</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="registroICarga.php">Registro Detalle </a>
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <?php include_once "../../assest/config/verIndicadorEconomico.php"; ?>
                        </div>
                    </div>
                    <section class="content">
                        <div class="box">
                            <div class="box-header with-border bg-info">                                   
                                <h4 class="box-title">Registro Detalle</h4>                                        
                            </div>
                            <form class="form" role="form" method="post" name="form_reg_dato">
                                <div class="box-body ">
                                    <div class="row">
                                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" placeholder="ID DNOTA" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID NOTA" id="IDP" name="IDP" value="<?php echo $IDP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="OP NOTA" id="OPP" name="OPP" value="<?php echo $OPP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="URL NOTA" id="URLO" name="URLO" value="<?php echo $URLO; ?>" />
                                                <input type="hidden" class="form-control" placeholder="TNOTA" id="TNOTA" name="TNOTA" value="<?php echo $TNOTA; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTA" name="PLANTA" value="<?php echo $PLANTAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADAS; ?>" />
                                                <label>Estandar</label>
                                                <input type="hidden" class="form-control" placeholder="EEXPORTACIONE" id="EEXPORTACIONE" name="EEXPORTACIONE" value="<?php echo $EEXPORTACION; ?>" />
                                                <input type="text" class="form-control" placeholder="EEXPORTACION" id="EEXPORTACION" name="EEXPORTACION" value="<?php echo $NOMBRESTANDAR; ?>" disabled style="background-color: #eeeeee;" />                                            
                                                <label id="val_estandar" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <!--
                                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Especies </label>
                                                <input type="hidden" class="form-control" placeholder="ESPECIESE" id="ESPECIESE" name="ESPECIESE" value="<?php echo $ESPECIES; ?>" />
                                                <input type="text" class="form-control" placeholder="ESPECIES" id="ESPECIES" name="ESPECIES" value="<?php echo $NOMBREESPECIES; ?>" disabled style="background-color: #eeeeee;" />
                                                <label id="val_especies" class="validacion"> </label>
                                            </div>
                                        </div>
                                        -->
                                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Calibre</label>
                                                <input type="hidden" class="form-control" placeholder="CALIBREE" id="CALIBREE" name="CALIBREE" value="<?php echo $CALIBRE; ?>" />
                                                <input type="text" class="form-control" placeholder="CALIBRE" id="CALIBRE" name="CALIBRE" value="<?php echo $NOMBRECALIBRE; ?>" disabled style="background-color: #eeeeee;"  />                                           
                                                <label id="val_calibre" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Tipo Moneda</label>
                                                <input type="hidden" class="form-control" placeholder="TMONEDAE" id="TMONEDAE" name="TMONEDAE" value="<?php echo $TMONEDA; ?>" />
                                                <input type="text" class="form-control" placeholder="TMONEDA" id="TMONEDA" name="TMONEDA" value="<?php echo $NOMBRETMONEDA; ?>" disabled style="background-color: #eeeeee;"/>   
                                                <label id="val_tmoneda" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Cantidad Envase</label>
                                                <input type="hidden" id="CANTIDADENVASEE" name="CANTIDADENVASEE" value="<?php echo $CANTIDADENVASE; ?>" />
                                                <input type="number" class="form-control" placeholder="Cantidad Envase"  id="CANTIDADENVASE" name="CANTIDADENVASE" value="<?php echo $CANTIDADENVASE; ?>" disabled />
                                                <label id="val_cantidad" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Valor NC/ND </label>
                                                <input type="hidden" id="CANTIDADNOTAE" name="CANTIDADNOTAE" value="<?php echo $CANTIDADNOTA; ?>" />
                                                <input type="number" step="0.000001" class="form-control"  placeholder="Valor NC/ND " id="CANTIDADNOTA" name="CANTIDADNOTA"   value="<?php echo $CANTIDADNOTA; ?>"   disabled />
                                                <label id="val_cantidadnota" class="validacion"> </label>
                                            </div>
                                        </div>                                       
                                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Total </label>                                                
                                                <input type="number" step="0.01" class="form-control"  placeholder="Total  Con NC/ND" id="TOTALPRECIOUSNCND" name="TOTALPRECIOUSNCND" onchange="precio()" value="<?php echo $TOTALPRECIOUSNCND; ?>"  <?php echo $DISABLED; ?> />                                                
                                                <label id="val_totalusncnd" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" placeholder="NOTA" id="NOTAE" name="NOTAE" value="<?php echo $NOTA; ?>" />
                                                <label>Detalle Nota </label>
                                                <textarea class="form-control" rows="1"  placeholder="Ingrese Nota, Motivo e Observacion  " id="NOTA" name="NOTA" <?php echo $DISABLED; ?>><?php echo $NOTA; ?></textarea>
                                                <label id="val_nota" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                    <!-- /.box-body -->
                                    <label id=" val_mensaje" class="validacion"><?php echo $MENSAJEELIMINAR; ?> </label>
                                    <div class="box-footer">
                                        <div class="btn-group btn-block   col-xxl-4 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12" role="group" aria-label="Acciones generales">
                                            <button type="button" class="btn btn-success  " data-toggle="tooltip" title="Volver" name="CANCELAR" value="CANCELAR" Onclick="irPagina('<?php echo $URLO; ?>.php?op&id=<?php echo $id_dato; ?>&a=<?php echo $accion_dato; ?>&urlo=<?php echo $urlo_dato; ?>');">
                                                <i class="ti-back-left "></i> Volver
                                            </button>
                                            <?php if ($OP == "") { ?>
                                                <button type="submit" class="btn btn-primary " data-toggle="tooltip" title="Crear" name="CREAR" value="CREAR" <?php echo $DISABLED; ?> onclick="return validacion()">
                                                    <i class="ti-save-alt"></i> Guardar
                                                </button>
                                            <?php } ?>
                                            <?php if ($OP != "") { ?>
                                                <?php if ($OP == "crear") { ?>
                                                    <button type="submit" class="btn btn-primary " data-toggle="tooltip" title="Crear" name="CREAR" value="CREAR" <?php echo $DISABLED; ?> onclick="return validacion()">
                                                        <i class="ti-save-alt"></i> Guardar
                                                    </button>
                                                <?php } ?>
                                                <?php if ($OP == "editar") { ?>
                                                    <button type="submit" class="btn btn-warning   " data-toggle="tooltip" title="Guardar" name="EDITAR" value="EDITAR" <?php echo $DISABLED; ?> onclick="return validacion()">
                                                        <i class="ti-save-alt"></i> Guardar
                                                    </button>
                                                <?php } ?>
                                                <?php if ($OP == "eliminar") { ?>
                                                    <button type="submit" class="btn btn-danger " data-toggle="tooltip" title="Eliminar" name="ELIMINAR" value="ELIMINAR">
                                                        <i class="ti-trash"></i> Eliminar
                                                    </button>
                                                <?php } ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                            </form>
                        </div>
                        <!--.row -->
                    </section>
                </div>
            </div>

            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php include_once "../../assest/config/footer.php";   ?>
                <?php include_once "../../assest/config/menuExtraFruta.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../../assest/config/urlBase.php"; ?>
        
        <?php
            echo
            '<script>
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    showConfirmButton:true
                })

                Toast.fire({
                  icon: "info",
                  title: "Información Importante",
                  html:"<label><b>Tipo de Nota:</b> </label> <br>  <b>'.$NOMBRETNOTA.'</b>"
                })
            </script>';
        ?>
        <?php 
            //OPERACIONES
            //OPERACION DE REGISTRO DE FILA
            if (isset($_REQUEST['CREAR'])) { 
                $DNOTADC->__SET('TNOTA', $_REQUEST['TNOTA']);
                $DNOTADC->__SET('CANTIDAD', $_REQUEST['CANTIDADNOTAE']);
                $DNOTADC->__SET('TOTAL', $_REQUEST['TOTALPRECIOUSNCND']);
                $DNOTADC->__SET('NOTA', $_REQUEST['NOTA']);
                $DNOTADC->__SET('ID_NOTA', $_REQUEST['IDP']);
                $DNOTADC->__SET('ID_DICARGA', $_REQUEST['ID']);
                $DNOTADC_ADO->agregarDnota($DNOTADC);               

                $AUSUARIO_ADO->agregarAusuario2("NULL",1, 1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Detalle de Nota D/C","fruta_dnotadc","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],$_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );

                //REDIRECCIONAR A PAGINA registroICarga.php   
                
                $id_dato =  $_REQUEST['IDP'];
                $accion_dato =  $_REQUEST['OPP'];
                echo '<script>
                        Swal.fire({
                            icon:"success",
                            title:"Registro creado",
                            text:"El registro de detalle de nota se ha creado correctamente",
                            showConfirmButton:true,
                            confirmButtonText:"Volver a Nota D/C"
                        }).then((result)=>{
                            location.href ="' . $_REQUEST['URLO'] . '.php?op&id='.$id_dato.'&a='.$accion_dato.'&urlo='.$urlo_dato.'&idd='.$idd_dato.'&ad='.$acciond_dato.'";                            
                        })
                    </script>';
            }
            if (isset($_REQUEST['EDITAR'])) {
                

                $ARRAYDNOTA=$DNOTADC_ADO->buscarPorNotaDicarga($_REQUEST['IDP'],$_REQUEST['ID']);
                if($ARRAYDNOTA){                    
                    
                    $DNOTADC->__SET('TNOTA', $_REQUEST['TNOTA']);
                    $DNOTADC->__SET('CANTIDAD', $_REQUEST['CANTIDADNOTAE']);
                    $DNOTADC->__SET('TOTAL', $_REQUEST['TOTALPRECIOUSNCND']);
                    $DNOTADC->__SET('NOTA', $_REQUEST['NOTA']);
                    $DNOTADC->__SET('ID_NOTA', $_REQUEST['IDP']);
                    $DNOTADC->__SET('ID_DICARGA', $_REQUEST['ID']);
                    $DNOTADC->__SET('ID_DNOTA', $ARRAYDNOTA[0]["ID_DNOTA"]);               
                    $DNOTADC_ADO->actualizarDnota($DNOTADC);
                    $AUSUARIO_ADO->agregarAusuario2("NULL",1, 2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de Detalle de Nota D/C","fruta_dnotadc",$ARRAYDNOTA[0]["ID_DNOTA"],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],$_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );

                    $id_dato =  $_REQUEST['IDP'];
                    $accion_dato =  $_REQUEST['OPP'];                
                    echo '<script>
                            Swal.fire({
                                icon:"success",
                                title:"Registro Modificada",
                                text:"El registro del detalle de nota se ha modificada correctamente",
                                showConfirmButton:true,
                                confirmButtonText:"Volver a Nota D/C"
                            }).then((result)=>{
                                if(result.value){
                                    location.href ="' . $_REQUEST['URLO'] . '.php?op&id='.$id_dato.'&a='.$accion_dato.'&urlo='.$urlo_dato.'&idd='.$idd_dato.'&ad='.$acciond_dato.'";
                                }
                            })
                        </script>';
                    
                }            }

            if (isset($_REQUEST['ELIMINAR'])) {
                $ARRAYDNOTA=$DNOTADC_ADO->buscarPorNotaDicarga($_REQUEST['IDP'],$_REQUEST['ID']);
                if($ARRAYDNOTA){      
                    $DNOTADC->__SET('ID_DNOTA', $ARRAYDNOTA[0]["ID_DNOTA"]);   
                    //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                    $DNOTADC_ADO->deshabilitar($DNOTADC);
                    $AUSUARIO_ADO->agregarAusuario2("NULL",1, 2,"".$_SESSION["NOMBRE_USUARIO"].", Deshabilitar de Detalle de Nota D/C","fruta_dnotadc",$ARRAYDNOTA[0]["ID_DNOTA"],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],$_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );
                    
                    $id_dato =  $_REQUEST['IDP'];
                    $accion_dato =  $_REQUEST['OPP'];
                    echo '<script>
                            Swal.fire({
                                icon:"error",
                                title:"Registro Eliminado",
                                text:"El registro del detalle nota se ha eliminado correctamente ",
                                showConfirmButton:true,
                                confirmButtonText:"Volver a Nota D/C"
                            }).then((result)=>{
                                location.href ="' . $_REQUEST['URLO'] . '.php?op&id='.$id_dato.'&a='.$accion_dato.'";                        
                            })
                        </script>';
                }
            }
                    
        
        ?>
</body>

</html>