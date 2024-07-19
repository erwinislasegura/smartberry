<?php

include_once "../../assest/config/validarUsuarioFruta.php";


//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../../assest/controlador/FOLIO_ADO.php';


include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/ESPECIES_ADO.php';
include_once '../../assest/controlador/VESPECIES_ADO.php';
include_once '../../assest/controlador/RMERCADO_ADO.php';
include_once '../../assest/controlador/MERCADO_ADO.php';


include_once '../../assest/controlador/TREEMBALAJE_ADO.php';
include_once '../../assest/controlador/REEMBALAJE_ADO.php';


include_once '../../assest/controlador/ERECEPCION_ADO.php';
include_once '../../assest/controlador/EEXPORTACION_ADO.php';
include_once '../../assest/controlador/EINDUSTRIAL_ADO.php';

include_once '../../assest/controlador/DREXPORTACION_ADO.php';
include_once '../../assest/controlador/DRINDUSTRIAL_ADO.php';
include_once '../../assest/controlador/REEMBALAJE_ADO.php';
include_once '../../assest/controlador/TMANEJO_ADO.php';
include_once '../../assest/controlador/TCALIBRE_ADO.php';
include_once '../../assest/controlador/TEMBALAJE_ADO.php';
include_once '../../assest/controlador/TCATEGORIA_ADO.php';




include_once '../../assest/controlador/EXIINDUSTRIAL_ADO.php';
include_once '../../assest/controlador/EXIEXPORTACION_ADO.php';

include_once '../../assest/modelo/EXIEXPORTACION.php';
include_once '../../assest/modelo/EXIINDUSTRIAL.php';

include_once '../../assest/modelo/DREXPORTACION.php';
include_once '../../assest/modelo/DRINDUSTRIAL.php';
include_once '../../assest/modelo/REEMBALAJE.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$FOLIO_ADO =  new FOLIO_ADO();


$EXIEXPORTACION_ADO =  new EXIEXPORTACION_ADO();
$EXIINDUSTRIAL_ADO =  new EXIINDUSTRIAL_ADO();

$DRINDUSTRIAL_ADO =  new DRINDUSTRIAL_ADO();
$DREXPORTACION_ADO =  new DREXPORTACION_ADO();

$ERECEPCION_ADO =  new ERECEPCION_ADO();
$EEXPORTACION_ADO =  new EEXPORTACION_ADO();
$EINDUSTRIAL_ADO =  new EINDUSTRIAL_ADO();

$TREEMBALAJE_ADO =  new TREEMBALAJE_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$ESPECIES_ADO =  new ESPECIES_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$TMANEJO_ADO =  new TMANEJO_ADO();
$TMANEJO_ADO =  new TMANEJO_ADO();
$TCALIBRE_ADO =  new TCALIBRE_ADO();
$TEMBALAJE_ADO =  new TEMBALAJE_ADO();
$TCATEGORIA_ADO =  new TCATEGORIA_ADO();

$REEMBALAJE_ADO =  new REEMBALAJE_ADO();
//INIICIALIZAR MODELO

$REEMBALAJE =  new REEMBALAJE();
$EXIINDUSTRIAL =  new EXIINDUSTRIAL();
$EXIEXPORTACION =  new EXIEXPORTACION();
$DRINDUSTRIAL =  new DRINDUSTRIAL();
$DREXPORTACION =  new DREXPORTACION();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$NUMERO = "";
$NUMEROVER = "";

$IDREEMBALAJE = "";
$IDQUITAR = "";
$FOLIOEXIEXPORTACIONQUITAR = "";
$FECHAREEMBALAJE = "";
$FECHAINGRESOREEMBALAJE = "";
$FECHAMODIFCIACIONREEMBALAJE = "";
$TURNO = "";
$TREEMBALAJE = "";
$OBSERVACIONREEMBALAJE = "";
$PRODUCTOR = "";
$VESPECIES = "";
$ESTADO = "";

$FOLIOELIMINAR = "";
$FOLIOELIMINARCAJA = "";

$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";


$IDEMPRESA = "";
$IDPLANTA = "";
$IDTEMPORADA = "";

$TOTALENVASEE = 0;
$TOTALNETOE = 0;

$TOTALENVASEEX = 0;
$TOTALNETOEX = 0;
$TOTALBRUTOEX = 0;
$TOTALDESHIDRATACIONEX = 0;


$TOTALENVASEIND = 0;
$TOTALNETOIND = 0;
$TOTALNETOINDSC = 0;
$TOTALNETOINDNC = 0;
$TOTALBRUTOIND = 0;

$TOTALNETOEXPO = 0;
$TOTALENVASEEXPO = 0;
$DIFERENCIAKILOSNETOEXPO = 0;

$TOTALBRUTOEXPO = 0;
$PEXPORTACIONEXPOEX = 0;
$PEXPORTACIONEXPOINDU = 0;
$PEXPORTACIONEXPOINDUSC = 0;
$PEXPORTACIONEXPOINDUNC = 0;
$PEXPORTACIONEXPO = 0;
$PEXPORTACIONEXPOEXDESHI=0;

$DISABLED = "";
$DISABLED2 = "";
$DISABLED3 = "";
$DISABLEDSTYLE = "";
$DISABLEDFOLIO = "";
$MENSAJEFOLIO = "";


$FOCUS = "";
$BORDER = "";
$MENSAJE = "";
$MENSAJEVALIDATO = "";
$MENSAJEEXISTENCIA = "";
$MENSAJEEXPORTACION = "";
$MENSAJEINDUSTRIAL = "";
$MENSAJEDIFERENCIA = "";
$MENSAJEPORCENTAJE = "";

$IDOP = "";
$OP = "";

$SINO = "";

//INICIALIZAR ARREGLOS

$ARRAYREEMBALAJE = "";
$ARRAYREEMBALAJE2 = "";
$ARRAYREEMBALAJE3 = "";

$ARRAYEMPRESA = "";
$ARRAYPLANTA = "";
$ARRAYTEMPORADA = "";

$ARRAYPVESPECIES = "";
$ARRAYTREEMBALAJE = "";
$ARRAYPRODUCTOR = "";
$ARRAYVESPECIES = "";

$ARRAYEVERERECEPCIONID = "";
$ARRAYVEREEXPORTACION = "";
$ARRAYVEREINDUTRIAL = "";


$ARRAYTOMADA = "";
$ARRAYEXISTENCIATOTALESREEMBALAJE = "";


$ARRAYVEREXIPRODUCTOTERMINADO = "";

$ARRAYEXIMATERIAPRIMA = "";
$ARRAYEXIEXPORTACION = "";
$ARRAYEXIINDUSTRIAL = "";
$ARRAYDEXPORTACION = "";
$ARRATDINDUSTRIAL = "";
$ARRAYTMANEJO = "";

$ARRAYDEXPORTACIONTOTALREEMBALAJE = "";
$ARRATDINDUSTRIALTOTALREEMBALAJE = "";

$ARRAYDEXPORTACIONPORREEMBALAJE = "";
$ARRATDINDUSTRIALPORREEMBALAJE = "";
$ARRAYFECHAACTUAL = "";
$ARRAYNUMERO = "";
$ARRAYFOLIO = "";
$ARRAYFOLIO2 = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES

$ARRAYPRODUCTOR = $PRODUCTOR_ADO->listarProductorPorEmpresaCBX($EMPRESAS);
$ARRAYVESPECIES = $VESPECIES_ADO->listarVespeciesPorEmpresaCBX($EMPRESAS);
$ARRAYTREEMBALAJE = $TREEMBALAJE_ADO->listarTreembalaje();
$ARRAYFECHAACTUAL = $REEMBALAJE_ADO->obtenerFecha();
$FECHAREEMBALAJE = $ARRAYFECHAACTUAL[0]['FECHA'];
include_once "../../assest/config/validarDatosUrl.php";
include_once "../../assest/config/datosUrlD.php";

$ARRAYFOLIO = $FOLIO_ADO->verFolioPorEmpresaPlantaTemporadaTexportacion($EMPRESAS, $PLANTAS, $TEMPORADAS);
$ARRAYFOLIO2 = $FOLIO_ADO->verFolioPorEmpresaPlantaTemporadaTindustrial($EMPRESAS, $PLANTAS, $TEMPORADAS);
if (empty($ARRAYFOLIO)) {
    $DISABLEDFOLIO = "disabled";
    $MENSAJEFOLIO = " NECESITA <b> CREAR LOS FOLIOS PT </b> , PARA OCUPAR LA <b> FUNCIONALIDAD </b>. FAVOR DE <b> CONTACTARSE CON EL ADMINISTRADOR </b>";
}

if (empty($ARRAYFOLIO2)) {
    $DISABLEDFOLIO = "disabled";
    $MENSAJEFOLIO = $MENSAJEFOLIO . "<br> NECESITA <b> CREAR LOS FOLIOS INDUSTRIAL </b> , PARA OCUPAR LA <b> FUNCIONALIDAD </b>. FAVOR DE <b> CONTACTARSE CON EL ADMINISTRADOR </b>";
}

//OPERACIONES

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

//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION , VISUALIZACION Y CREACION
if (isset($id_dato) && isset($accion_dato)) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $id_dato;
    $OP = $accion_dato;
    //OBTENECION DE INFORMACION DE LA TABLAS DE LA VISTA
    $ARRAYTOMADA = $EXIEXPORTACION_ADO->buscarPorReembalaje2($IDOP);
    $ARRAYDEXPORTACIONPORREEMBALAJE = $DREXPORTACION_ADO->buscarPorReembalaje2($IDOP);
    $ARRATDINDUSTRIALPORREEMBALAJE = $DRINDUSTRIAL_ADO->buscarPorReembalaje2($IDOP);


    //OBTENCIONS DE TOTALES O EL RESUMEN DE LAS TABLAS
    $ARRAYEXISTENCIATOTALESREEMBALAJE = $EXIEXPORTACION_ADO->obtenerTotalesReembalaje($IDOP);
    $ARRAYEXISTENCIATOTALESREEMBALAJE2 = $EXIEXPORTACION_ADO->obtenerTotalesReembalaje2($IDOP);
    $TOTALNETOE = $ARRAYEXISTENCIATOTALESREEMBALAJE[0]['DESHIRATACION'];
    $TOTALENVASEE = $ARRAYEXISTENCIATOTALESREEMBALAJE[0]['ENVASE'];
    $TOTALENTRADANETOEX = $ARRAYEXISTENCIATOTALESREEMBALAJE[0]['NETO'];
    $TOTALNETOEV = $ARRAYEXISTENCIATOTALESREEMBALAJE2[0]['DESHIRATACION'];
    $TOTALENVASEEV = $ARRAYEXISTENCIATOTALESREEMBALAJE2[0]['ENVASE'];
    $TOTALENTRADANETOEXV = $ARRAYEXISTENCIATOTALESREEMBALAJE2[0]['NETO'];

    $ARRATDINDUSTRIALTOTALREEMBALAJE = $DRINDUSTRIAL_ADO->obtenerTotales($IDOP);
    $ARRATDINDUSTRIALTOTALREEMBALAJE2 = $DRINDUSTRIAL_ADO->obtenerTotales2($IDOP);    
    $ARRATDINDUSTRIALTOTALSC = $DRINDUSTRIAL_ADO->obtenerTotalesSC($IDOP);
    $ARRATDINDUSTRIALTOTALNC = $DRINDUSTRIAL_ADO->obtenerTotalesNC($IDOP);
    $TOTALNETOIND = $ARRATDINDUSTRIALTOTALREEMBALAJE[0]['NETO'];
    $TOTALNETOINDV = $ARRATDINDUSTRIALTOTALREEMBALAJE2[0]['NETO'];
    $TOTALNETOINDSC = $ARRATDINDUSTRIALTOTALSC[0]['NETO'];
    $TOTALNETOINDNC = $ARRATDINDUSTRIALTOTALNC[0]['NETO'];


    $ARRAYDEXPORTACIONTOTALREEMBALAJE = $DREXPORTACION_ADO->obtenerTotales($IDOP);
    $ARRAYDEXPORTACIONTOTALREEMBALAJE2 = $DREXPORTACION_ADO->obtenerTotales2($IDOP);
    $TOTALENVASEEX = $ARRAYDEXPORTACIONTOTALREEMBALAJE[0]['ENVASE'];
    $TOTALNETOEX = $ARRAYDEXPORTACIONTOTALREEMBALAJE[0]['NETO'];
    $TOTALBRUTOEX = $ARRAYDEXPORTACIONTOTALREEMBALAJE[0]['BRUTO'];
    $TOTALDESHIDRATACIONEX = $ARRAYDEXPORTACIONTOTALREEMBALAJE[0]['DESHIDRATACION'];
    $KGSALIDANETO = $ARRAYDEXPORTACIONTOTALREEMBALAJE[0]['NETO'];
    
    $TOTALENVASEEXV = $ARRAYDEXPORTACIONTOTALREEMBALAJE[0]['ENVASE'];
    $TOTALNETOEXV = $ARRAYDEXPORTACIONTOTALREEMBALAJE[0]['NETO'];
    $TOTALBRUTOEXV = $ARRAYDEXPORTACIONTOTALREEMBALAJE[0]['BRUTO'];
    $TOTALDESHIDRATACIONEXV = $ARRAYDEXPORTACIONTOTALREEMBALAJE[0]['DESHIDRATACION'];
    $KGSALIDANETOV = $ARRAYDEXPORTACIONTOTALREEMBALAJE[0]['NETO'];

    //echo $TOTALNETOEXV;

    $TOTALENVASEEXPO = $TOTALENVASEEX + $TOTALENVASEIND;
    $TOTALNETOEXPO = $TOTALNETOEX;
    $TOTALBRUTOEXPO = $TOTALBRUTOEX + $TOTALBRUTOIND;

    if ($TOTALNETOEX != 0 && $TOTALNETOE != 0) {
        $PEXPORTACIONEXPOEX = (($TOTALNETOEX) / $TOTALNETOE) * 100;
        $PEXPORTACIONEXPOEXDESHI = (($TOTALDESHIDRATACIONEX) / $TOTALNETOE) * 100;
    } else {
        $PEXPORTACIONEXPOEX = 0;
        $PEXPORTACIONEXPOEXDESHI = 0;
    }
    if ($TOTALNETOIND != 0 && $TOTALNETOE != 0) {
        $PEXPORTACIONEXPOINDU = (($TOTALNETOIND) / $TOTALNETOE) * 100;        
        $PEXPORTACIONEXPOINDUSC = (($TOTALNETOINDSC) / $TOTALNETOE) * 100;      
        $PEXPORTACIONEXPOINDUNC = (($TOTALNETOINDNC) / $TOTALNETOE) * 100;      
    } else {
        $PEXPORTACIONEXPOINDU = 0;
        $PEXPORTACIONEXPOINDUSC = 0;
        $PEXPORTACIONEXPOINDUNC = 0;
    }

    $PEXPORTACIONEXPO = ($PEXPORTACIONEXPOEXDESHI + $PEXPORTACIONEXPOINDU);
    $DIFERENCIAKILOSNETOEXPO = $TOTALENTRADANETOEX - ($TOTALNETOEXPO + $TOTALNETOIND);

    //IDENTIFICACIONES DE OPERACIONES
    //crear =  OBTENCION DE DATOS INICIALES PARA PODER CREAR LA RECEPCION
    if ($OP == "crear") {
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $DISABLED0 = "disabled";
        $DISABLED = "";
        $DISABLED2 = "";
        $DISABLED3 = "disabled";
        $DISABLEDMENU = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLEDSTYLE0 = "style='background-color: #eeeeee;'";
        $ARRAYREEMBALAJE = $REEMBALAJE_ADO->verReembalaje($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYREEMBALAJE as $r) :
            $IDREEMBALAJE = $IDOP;
            $NUMEROVER = "" . $r['NUMERO_REEMBALAJE'];
            $FECHAREEMBALAJE = "" . $r['FECHA_REEMBALAJE'];
            $FECHAINGRESOREEMBALAJE = "" . $r['INGRESO'];
            $FECHAMODIFCIACIONREEMBALAJE = "" . $r['MODIFICACION'];
            $TURNO = "" . $r['TURNO'];
            $TREEMBALAJE = "" . $r['ID_TREEMBALAJE'];
            $OBSERVACIONREEMBALAJE = "" . $r['OBSERVACIONE_REEMBALAJE'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $VESPECIES = "" . $r['ID_VESPECIES'];
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {

        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $DISABLED0 = "disabled";
        $DISABLED = "";
        $DISABLED2 = "";
        $DISABLED3 = "disabled";
        $DISABLEDMENU = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLEDSTYLE0 = "style='background-color: #eeeeee;'";
        $ARRAYREEMBALAJE = $REEMBALAJE_ADO->verReembalaje($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYREEMBALAJE as $r) :
            $IDREEMBALAJE = $IDOP;
            $NUMEROVER = "" . $r['NUMERO_REEMBALAJE'];
            $FECHAREEMBALAJE = "" . $r['FECHA_REEMBALAJE'];
            $FECHAINGRESOREEMBALAJE = "" . $r['INGRESO'];
            $FECHAMODIFCIACIONREEMBALAJE = "" . $r['MODIFICACION'];
            $TURNO = "" . $r['TURNO'];
            $TREEMBALAJE = "" . $r['ID_TREEMBALAJE'];
            $OBSERVACIONREEMBALAJE = "" . $r['OBSERVACIONE_REEMBALAJE'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $VESPECIES = "" . $r['ID_VESPECIES'];
            $ESTADO = "" . $r['ESTADO'];

        endforeach;
    }
    //ver =  OBTENCION DE DATOS PARA LA VISUALIZACION DEL REGISTRO
    if ($OP == "ver") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION

        $DISABLED0 = "disabled";
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        $DISABLED3 = "disabled";
        $DISABLEDMENU = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLEDSTYLE0 = "style='background-color: #eeeeee;'";
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR  
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYREEMBALAJE = $REEMBALAJE_ADO->verReembalaje($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYREEMBALAJE as $r) :
            $IDREEMBALAJE = $IDOP;
            $NUMEROVER = "" . $r['NUMERO_REEMBALAJE'];
            $FECHAREEMBALAJE = "" . $r['FECHA_REEMBALAJE'];
            $FECHAINGRESOREEMBALAJE = "" . $r['INGRESO'];
            $FECHAMODIFCIACIONREEMBALAJE = "" . $r['MODIFICACION'];
            $TURNO = "" . $r['TURNO'];
            $TREEMBALAJE = "" . $r['ID_TREEMBALAJE'];
            $OBSERVACIONREEMBALAJE = "" . $r['OBSERVACIONE_REEMBALAJE'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $VESPECIES = "" . $r['ID_VESPECIES'];
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }
}
//REEMBALAJE PARA OBTENER LOS DATOS DEL FORMULARIO  Y MANTENERLO AL ACTUALIZACION QUE REALIZA EL SELECT DE PRODUCTOR
if (isset($_POST)) {
    if (isset($_REQUEST['FECHAREEMBALAJE'])) {
        $FECHAREEMBALAJE = $_REQUEST['FECHAREEMBALAJE'];
    }
    if (isset($_REQUEST['TURNO'])) {
        $TURNO = $_REQUEST['TURNO'];
    }
    if (isset($_REQUEST['TREEMBALAJE'])) {
        $TREEMBALAJE = $_REQUEST['TREEMBALAJE'];
    }
    if (isset($_REQUEST['OBSERVACIONREEMBALAJE'])) {
        $OBSERVACIONREEMBALAJE = $_REQUEST['OBSERVACIONREEMBALAJE'];
    }
    if (isset($_REQUEST['PRODUCTOR'])) {
        $PRODUCTOR = $_REQUEST['PRODUCTOR'];
    }
    if (isset($_REQUEST['VESPECIES'])) {
        $VESPECIES = $_REQUEST['VESPECIES'];
    }
    if (isset($_REQUEST['EMPRESA'])) {
        $EMPRESA = "" . $_REQUEST['EMPRESA'];
    }
    if (isset($_REQUEST['PLANTA'])) {
        $PLANTA = "" . $_REQUEST['PLANTA'];
    }
    if (isset($_REQUEST['TEMPORADA'])) {
        $TEMPORADA = "" . $_REQUEST['TEMPORADA'];
    }
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title> Registrar Reembalaje</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../../assest/config/urlHead.php"; ?>
        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
                //VALIDACION DE FORMULARIO
                function validacion() {



                    FECHAREEMBALAJE = document.getElementById("FECHAREEMBALAJE").value;
                    TURNO = document.getElementById("TURNO").selectedIndex;
                    TREEMBALAJE = document.getElementById("TREEMBALAJE").selectedIndex;
                    PRODUCTOR = document.getElementById("PRODUCTOR").selectedIndex;
                    VESPECIES = document.getElementById("VESPECIES").selectedIndex;
                    OBSERVACIONREEMBALAJE = document.getElementById("OBSERVACIONREEMBALAJE").value;

                    document.getElementById('val_fechap').innerHTML = "";
                    document.getElementById('val_turno').innerHTML = "";

                    document.getElementById('val_tproceso').innerHTML = "";
                    document.getElementById('val_productor').innerHTML = "";
                    document.getElementById('val_variedad').innerHTML = "";
                    document.getElementById('val_observacion').innerHTML = "";

                    if (FECHAREEMBALAJE == null || FECHAREEMBALAJE.length == 0 || /^\s+$/.test(FECHAREEMBALAJE)) {
                        document.form_reg_dato.FECHAREEMBALAJE.focus();
                        document.form_reg_dato.FECHAREEMBALAJE.style.borderColor = "#FF0000";
                        document.getElementById('val_fechap').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.FECHAREEMBALAJE.style.borderColor = "#4AF575";


                    if (TURNO == null || TURNO == 0) {
                        document.form_reg_dato.TURNO.focus();
                        document.form_reg_dato.TURNO.style.borderColor = "#FF0000";
                        document.getElementById('val_turno').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.TURNO.style.borderColor = "#4AF575";

                    if (TREEMBALAJE == null || TREEMBALAJE == 0) {
                        document.form_reg_dato.TREEMBALAJE.focus();
                        document.form_reg_dato.TREEMBALAJE.style.borderColor = "#FF0000";
                        document.getElementById('val_tproceso').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.TREEMBALAJE.style.borderColor = "#4AF575";

                    if (PRODUCTOR == null || PRODUCTOR == 0) {
                        document.form_reg_dato.PRODUCTOR.focus();
                        document.form_reg_dato.PRODUCTOR.style.borderColor = "#FF0000";
                        document.getElementById('val_productor').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.PRODUCTOR.style.borderColor = "#4AF575";


                    if (VESPECIES == null || VESPECIES == 0) {
                        document.form_reg_dato.VESPECIES.focus();
                        document.form_reg_dato.VESPECIES.style.borderColor = "#FF0000";
                        document.getElementById('val_variedad').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.VESPECIES.style.borderColor = "#4AF575";

                    /*
                    if (OBSERVACIONREEMBALAJE == null || OBSERVACIONREEMBALAJE.length == 0 || /^\s+$/.test(OBSERVACIONREEMBALAJE)) {
                        document.form_reg_dato.OBSERVACIONREEMBALAJE.focus();
                        document.form_reg_dato.OBSERVACIONREEMBALAJE.style.borderColor = "#FF0000";
                        document.getElementById('val_observacion').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.OBSERVACIONREEMBALAJE.style.borderColor = "#4AF575";
                    */
                }
                //REDIRECCIONAR A LA PAGINA SELECIONADA
                function irPagina(url) {
                    location.href = "" + url;
                }
               

                //FUNCION PARA REALIZAR UNA ACTUALIZACION DEL FORMULARIO DE REGISTRO DE RECEPCION
                function refrescar() {
                    document.getElementById("form_reg_dato").submit();
                }

                function abrirPestana(url) {
                    var win = window.open(url, '_blank');
                    win.focus();
                }

                //FUNCION PARA ABRIR VENTANA QUE SE ENCUENTRA LA OPERACIONES DE DETALLE DE RECEPCION
                function abrirVentana(url) {
                    var opciones =
                        "'directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=1600, height=1000'";
                    window.open(url, 'window', opciones);
                }
            </script>

</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary" >
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <?php include_once "../../assest/config/menuFruta.php";  ?>
            <div class="content-wrapper">
                <div class="container-full">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Packing</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"> <a href="index.php"> <i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Modulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Packing</li>
                                            <li class="breadcrumb-item" aria-current="page">Reembalaje</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#">Registro Reembalaje </a>   </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <?php include_once "../../assest/config/verIndicadorEconomico.php"; ?>
                        </div>
                    </div>

                    <label id="val_mensaje" class="validacion"><?php echo $MENSAJEFOLIO; ?> </label>
                    <!-- Main content -->
                    <section class="content">

                        <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato">
                            <div class="box">                              
                                 <div class="box-header with-border bg-primary">                                   
                                    <h4 class="box-title">Encabezado de Reembalaje</h4>                                        
                                </div>
                                <div class="box-body ">
                                    <div class="row">
                                        <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">


                                                <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTA" name="PLANTA" value="<?php echo $PLANTAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESAE" name="EMPRESAE" value="<?php echo $EMPRESA; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTAE" name="PLANTAE" value="<?php echo $PLANTA; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADAE" name="TEMPORADAE" value="<?php echo $TEMPORADA; ?>" />


                                        
                                                <input type="hidden" class="form-control" placeholder="TOTAL NETO" id="TOTALNETO" name="TOTALNETO" value="<?php echo $TOTALNETOE; ?>" />
                                                <input type="hidden" class="form-control" id="TOTALNETOEX" name="TOTALNETOEX" value="<?php echo $TOTALNETOEX; ?>" />
                                                <input type="hidden" class="form-control" id="TOTALDESHIDRATACIONEX" name="TOTALDESHIDRATACIONEX" value="<?php echo $TOTALDESHIDRATACIONEX; ?>" />
                                                <input type="hidden" class="form-control" id="TOTALNETOIND" name="TOTALNETOIND" value="<?php echo $TOTALNETOIND; ?>" />
                                                <input type="hidden" class="form-control" id="TOTALNETOINDSC" name="TOTALNETOINDSC" value="<?php echo $TOTALNETOINDSC; ?>" />
                                                <input type="hidden" class="form-control" id="TOTALNETOINDNC" name="TOTALNETOINDNC" value="<?php echo $TOTALNETOINDNC; ?>" />   
                                                <input type="hidden" class="form-control" placeholder="TOTAL NETO" id="PEXPORTACIONEXPOEX" name="PEXPORTACIONEXPOEX" value="<?php echo $PEXPORTACIONEXPOEX; ?>" />
                                                <input type="hidden" class="form-control" placeholder="TOTAL NETO" id="PEXPORTACIONEXPOEXDESHI" name="PEXPORTACIONEXPOEXDESHI" value="<?php echo $PEXPORTACIONEXPOEXDESHI; ?>" />
                                                <input type="hidden" class="form-control" placeholder="TOTAL NETO" id="PEXPORTACIONEXPOINDU" name="PEXPORTACIONEXPOINDU" value="<?php echo $PEXPORTACIONEXPOINDU; ?>" />                                                
                                                <input type="hidden" class="form-control" id="PEXPORTACIONEXPOINDUSC" name="PEXPORTACIONEXPOINDUSC" value="<?php echo $PEXPORTACIONEXPOINDUSC; ?>" />
                                                <input type="hidden" class="form-control" id="PEXPORTACIONEXPOINDUNC" name="PEXPORTACIONEXPOINDUNC" value="<?php echo $PEXPORTACIONEXPOINDUNC; ?>" />
                                                <input type="hidden" class="form-control" id="PEXPORTACIONEXPO" name="PEXPORTACIONEXPO" value="<?php echo $PEXPORTACIONEXPO; ?>" />
                                                <input type="hidden" class="form-control" placeholder="DIFERENCIA KILOS NETO" id="DIFERENCIAKILOSNETOEX" name="DIFERENCIAKILOSNETOEX" value="<?php echo $DIFERENCIAKILOSNETOEXPO; ?>" />

                                                <input type="hidden" class="form-control" placeholder="ID REEMBALAJE" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="OP REEMBALAJE" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="URL REEMBALAJE" id="URLP" name="URLP" value="registroReembalajeEx" />

                                                <label>Numero </label>
                                                <input type="hidden" class="form-control" placeholder="ID REEMBALAJE" id="ID" name="ID" value="<?php echo $IDREEMBALAJE; ?>" />
                                                <input type="number" class="form-control" style="background-color: #eeeeee;" placeholder="Numero Reembalaje " id="NUMEROVER" name="NUMEROVER" value="<?php echo $NUMEROVER; ?>" disabled />
                                                <label id="val_id" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-6 col-xl-1 col-lg-1 col-md-6 col-sm-6 col-6 col-xs-6">
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha Ingreso</label>
                                                <input type="hidden" class="form-control" placeholder="Fecha Ingreso " id="FECHAINGRESOREEMBALAJEE" name="FECHAINGRESOREEMBALAJEE" value="<?php echo $FECHAINGRESOREEMBALAJE; ?>" />
                                                <input type="date" class="form-control" style="background-color: #eeeeee;" placeholder="FECHA RECEPCION" id="FECHAINGRESOREEMBALAJE" name="FECHAINGRESOREEMBALAJE" value="<?php echo $FECHAINGRESOREEMBALAJE; ?>" disabled />
                                                <label id="val_fechai" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha Modificacion</label>
                                                <input type="hidden" class="form-control" placeholder="Fecha Modificacion " id="FECHAMODIFCIACIONREEMBALAJEE" name="FECHAMODIFCIACIONREEMBALAJEE" value="<?php echo $FECHAMODIFCIACIONREEMBALAJE; ?>" />
                                                <input type="date" class="form-control " style="background-color: #eeeeee;" placeholder="FECHA MODIFICACION" id="FECHAMODIFCIACIONREEMBALAJE" name="FECHAMODIFCIACIONREEMBALAJE" value="<?php echo $FECHAMODIFCIACIONREEMBALAJE; ?>" disabled />
                                                <label id="val_fecham" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha </label>
                                                <input type="hidden" class="form-control" placeholder="FECHA REEMBALAJE" id="FECHAREEMBALAJEE" name="FECHAREEMBALAJEE" value="<?php echo $FECHAREEMBALAJE; ?>" />
                                                <input type="date" class="form-control" <?php echo $DISABLEDFOLIO; ?> placeholder="Fecha Proceso" id="FECHAREEMBALAJE" name="FECHAREEMBALAJE" value="<?php echo $FECHAREEMBALAJE; ?>" <?php echo $DISABLED; ?>  />
                                                <label id="val_fechap" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Turno</label>
                                                <input type="hidden" class="form-control" placeholder="TURNO" id="TURNOE" name="TURNOE" value="<?php echo $TURNO; ?>" />
                                                <select class="form-control select2" id="TURNO" name="TURNO" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLEDFOLIO; ?>>
                                                    <option></option>
                                                    <option value="1" <?php if ($TURNO == "1") {  echo "selected"; } ?>>Dia </option>
                                                    <option value="2" <?php if ($TURNO == "2") { echo "selected"; } ?>> Noche</option>
                                                </select>
                                                <label id="val_turno" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Tipo Reembalaje</label>
                                                <input type="hidden" class="form-control" placeholder="TIPO REEMBALAJE" id="TREEMBALAJEE" name="TREEMBALAJEE" value="<?php echo $TREEMBALAJE; ?>" />
                                                <select class="form-control select2" id="TREEMBALAJE" name="TREEMBALAJE" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLEDFOLIO; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYTREEMBALAJE as $r) : ?>
                                                        <?php if ($ARRAYTREEMBALAJE) {    ?>
                                                            <option value="<?php echo $r['ID_TREEMBALAJE']; ?>" <?php if ($TREEMBALAJE == $r['ID_TREEMBALAJE']) { echo "selected"; } ?>> 
                                                                <?php echo $r['NOMBRE_TREEMBALAJE'] ?> 
                                                            </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_tproceso" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Productor</label>
                                                <input type="hidden" class="form-control" placeholder="PRODUCTOR" id="PRODUCTORE" name="PRODUCTORE" value="<?php echo $PRODUCTOR; ?>" />
                                                <select class="form-control select2" id="PRODUCTOR" name="PRODUCTOR" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLEDFOLIO; ?> <?php echo $DISABLED3; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYPRODUCTOR as $r) : ?>
                                                        <?php if ($ARRAYPRODUCTOR) {    ?>
                                                            <option value="<?php echo $r['ID_PRODUCTOR']; ?>" <?php if ($PRODUCTOR == $r['ID_PRODUCTOR']) { echo "selected";  } ?>>
                                                                <?php echo $r['CSG_PRODUCTOR'] ?> : <?php echo $r['NOMBRE_PRODUCTOR'] ?>
                                                            </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>

                                                <label id="val_productor" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Variedad</label>
                                                <input type="hidden" class="form-control" placeholder="Variedad" id="VESPECIESE" name="VESPECIESE" value="<?php echo $VESPECIES; ?>" />
                                                <select class="form-control select2" id="VESPECIES" name="VESPECIES" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLEDFOLIO; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYVESPECIES as $r) : ?>
                                                        <?php if ($ARRAYVESPECIES) {    ?>
                                                            <option value="<?php echo $r['ID_VESPECIES']; ?>" <?php if ($VESPECIES == $r['ID_VESPECIES']) { echo "selected"; } ?>> 
                                                                <?php echo $r['NOMBRE_VESPECIES'] ?> 
                                                            </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>

                                                <label id="val_variedad" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group"> <label>Observaciones </label>
                                                <input type="hidden" class="form-control" placeholder="OBSERVACION REEMBALAJE" id="OBSERVACIONREEMBALAJEE" name="OBSERVACIONREEMBALAJEE" value="<?php echo $OBSERVACIONREEMBALAJE; ?>" />
                                                <textarea class="form-control" rows="1" placeholder="Ingrese Nota e Observacion  " id="OBSERVACIONREEMBALAJE" name="OBSERVACIONREEMBALAJE" <?php echo $DISABLEDFOLIO; ?> <?php echo $DISABLED; ?> ><?php echo $OBSERVACIONREEMBALAJE; ?></textarea>
                                                <label id="val_observacion" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>                                
                                <div class="box-footer">
                                    <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar">
                                        <div class="btn-group  col-xxl-4 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12" role="group" aria-label="Acciones generales">
                                            <?php if ($OP == "") { ?>
                                                <button type="button" class="btn btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroReembalajeEx.php');">
                                                    <i class="ti-trash"></i> Cancelar
                                                </button>
                                                <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Guardar" name="CREAR" value="CREAR" <?php echo $DISABLEDFOLIO; ?> onclick="return validacion()">
                                                    <i class="ti-save-alt"></i> Guardar
                                                </button>
                                            <?php } ?>
                                            <?php if ($OP != "") { ?>
                                                <button type="button" class="btn  btn-success " data-toggle="tooltip" title="Volver" name="VOLVER" value="VOLVER" Onclick="irPagina('listarReembalajeEx.php'); ">
                                                    <i class="ti-back-left "></i> Volver
                                                </button>
                                                <button type="submit" class="btn btn-warning " data-toggle="tooltip" title="Guardar" name="GUARDAR" value="GUARDAR" <?php echo $DISABLED2; ?> <?php echo $DISABLEDFOLIO; ?> onclick="return validacion()">
                                                    <i class="ti-pencil-alt"></i> Guardar
                                                </button>
                                                <button type="submit" class="btn btn-danger " data-toggle="tooltip" title="Cerrar" name="CERRAR" value="CERRAR" <?php echo $DISABLED2; ?> <?php echo $DISABLEDFOLIO; ?> onclick="return validacion()">
                                                    <i class="ti-save-alt"></i> Cerrar
                                                </button>
                                            <?php } ?>
                                        </div>
                                        <div class="btn-group  col-xxl-4 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12  float-right">
                                            <?php if ($OP != "") : ?>
                                                <button type="button" class="btn btn-primary  " data-toggle="tooltip" title="Informe" id="defecto" name="tarjas" <?php if ($ESTADO == "1") { echo "disabled"; } ?> <?php echo $DISABLEDFOLIO; ?> Onclick="abrirPestana('../../assest/documento/informeReembalajeEx.php?parametro=<?php echo $IDOP; ?>&&usuario=<?php echo $IDUSUARIOS; ?>'); ">
                                                    <i class="fa fa-file-pdf-o"></i> Informe
                                                </button>
                                                <button type="button" class="btn  btn-info  " data-toggle="tooltip" title="Tarja" id="defecto" name="tarjas" <?php echo $DISABLEDFOLIO; ?> Onclick="abrirPestana('../../assest/documento/informeTarjasReembalajeEx.php?parametro=<?php echo $IDOP; ?>'); ">
                                                    <i class="fa fa-file-pdf-o"></i> Tarjas
                                                </button>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php if (isset($_GET['op'])): ?>
                            <div class="card">
                                <div class="card-header bg-info">
                                    <h4 class="card-title">Ingreso / Existencia Producto Terminado</h4>
                                </div>
                                <div class="card-header">
                                    <form method="post" id="form2" name="form2">
                                        <div class="form-row align-items-center">
                                            <input type="hidden" class="form-control" placeholder="ID REEMBALAJE" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                            <input type="hidden" class="form-control" placeholder="OP REEMBALAJE" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                            <input type="hidden" class="form-control" placeholder="URL REEMBALAJE" id="URLP" name="URLP" value="registroReembalajeEx" />
                                            <input type="hidden" class="form-control" placeholder="URL SELECCION" id="URLD" name="URLD" value="registroSelecionExistenciaPTReembalaje" />
                                            <div class="col-auto">
                                                <button type="submit" class="btn btn-success btn-block" data-toggle="tooltip" title="Seleccion Existencia" id="SELECIONOCDURL" name="SELECIONOCDURL"
                                                    <?php echo $DISABLED2; ?> <?php echo $DISABLEDFOLIO; ?> <?php if ($ESTADO == 0) { echo "disabled style='background-color: #eeeeee;'";} ?>>
                                                    Selecciona Existencia
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="ingreso" class="table-hover " style="width: 100%;">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Estado</th>
                                                    <th>Folio </th>
                                                    <th class="text-center">Operaciónes</th>
                                                    <th>Fecha Embalado </th>
                                                    <th>Código Estandar </th>
                                                    <th>Envase/Estandar </th>
                                                    <th>Variedad </th>
                                                    <th>Cantidad Envase</th>
                                                    <th>Kilo Neto </th>
                                                    <th>% Deshidratación </th>
                                                    <th>Kilo Con Deshidratación </th>
                                                    <th>Kilo Bruto </th>
                                                    <th>Tipo Embalaje</th>
                                                    <th>Tipo Manejo </th>
                                                    <th>Tipo Calibre </th>
                                                    <th>Tipo Categoria </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if ($ARRAYTOMADA) { ?>
                                                    <?php foreach ($ARRAYTOMADA as $r) : ?>
                                                        <?php
                                                        $ARRAYEVERERECEPCIONID = $EEXPORTACION_ADO->verEstandar($r['ID_ESTANDAR']);
                                                        if ($ARRAYEVERERECEPCIONID) {
                                                            $CODIGOESTANDAR = $ARRAYEVERERECEPCIONID[0]['CODIGO_ESTANDAR'];
                                                            $NOMBREESTANDAR = $ARRAYEVERERECEPCIONID[0]['NOMBRE_ESTANDAR'];
                                                        } else {
                                                            $CODIGOESTANDAR = "Sin Datos";
                                                            $NOMBREESTANDAR = "Sin Datos";
                                                        }
                                                        $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
                                                        if ($ARRAYVERVESPECIESID) {
                                                            $NOMBREVESPECIES = $ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'];
                                                        } else {
                                                            $NOMBREVESPECIES = "Sin Datos";
                                                        }
                                                        $ARRAYTMANEJO = $TMANEJO_ADO->verTmanejo($r['ID_TMANEJO']);
                                                        if ($ARRAYTMANEJO) {
                                                            $NOMBRETMANEJO = $ARRAYTMANEJO[0]['NOMBRE_TMANEJO'];
                                                        } else {
                                                            $NOMBRETMANEJO = "Sin Datos";
                                                        }
                                                        $ARRAYTCALIBRE = $TCALIBRE_ADO->verCalibre($r['ID_TCALIBRE']);
                                                        if ($ARRAYTCALIBRE) {
                                                            $NOMBRETCALIBRE = $ARRAYTCALIBRE[0]['NOMBRE_TCALIBRE'];
                                                        } else {
                                                            $NOMBRETCALIBRE = "Sin Datos";
                                                        }
                                                        $ARRAYTEMBALAJE = $TEMBALAJE_ADO->verEmbalaje($r['ID_TEMBALAJE']);
                                                        if ($ARRAYTEMBALAJE) {
                                                            $NOMBRETEMBALAJE = $ARRAYTEMBALAJE[0]['NOMBRE_TEMBALAJE'];
                                                        } else {
                                                            $NOMBRETEMBALAJE = "Sin Datos";
                                                        }
                                                        $ARRAYTCATEGORIA=$TCATEGORIA_ADO->verTcategoria($r['ID_TCATEGORIA']);
                                                        if($ARRAYTCATEGORIA){
                                                           $NOMBRETCATEGORIA= $ARRAYTCATEGORIA[0]["NOMBRE_TCATEGORIA"];
                                                        }else{
                                                            $NOMBRETCATEGORIA = "Sin Datos";
                                                        } 
                                                        ?>
                                                        <tr class="text-center">
                                                        <?php 
                                                                switch($r['ESTADO_FOLIO']){
                                                                    case 1: echo '<td style="background: #18d26b; color: white;">P. Completado</td>';
                                                                        break;
                                                                    case 2: echo '<td style="background: #ffa800; color: white;">P. Incompleto</td>';
                                                                        break;
                                                                    case 3: echo '<td style="background: #3085f5; color: white;">P. Muestra</td>';
                                                                        break;
                                                                    default: echo '<td style="background: #93b4d4; color: white;">No identificado</td>';
                                                                }
                                                            ?>
                                                            <td><?php echo $r['FOLIO_AUXILIAR_EXIEXPORTACION']; ?> </td>
                                                            <td class="text-center">
                                                                <form method="post" id="form1">
                                                                    <input type="hidden" class="form-control" id="IDQUITAR" name="IDQUITAR" value="<?php echo $r['ID_EXIEXPORTACION']; ?>" />
                                                                    <div class="btn-group btn-rounded col-6 btn-block" role="group" aria-label="Operaciones Detalle">
                                                                        <button type="submit" class="btn btn-sm btn-danger   " id="QUITAR" name="QUITAR" data-toggle="tooltip" title="Quitar Existencia"  <?php echo $DISABLED2; ?>   <?php  if ($ESTADO == 0) {  echo "disabled"; }  ?>>
                                                                            <i class="ti-close"></i><br> Quitar
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </td>
                                                            <td><?php echo $r['EMBALADO']; ?></td>
                                                            <td><?php echo $CODIGOESTANDAR; ?></td>
                                                            <td><?php echo $NOMBREESTANDAR; ?></td>
                                                            <td><?php echo $NOMBREVESPECIES; ?></td>
                                                            <td><?php echo $r['ENVASE']; ?></td>
                                                            <td><?php echo $r['NETO']; ?></td>
                                                            <td><?php echo $r['PORCENTAJE']; ?></td>
                                                            <td><?php echo $r['DESHIRATACION']; ?></td>
                                                            <td><?php echo $r['BRUTO']; ?></td>
                                                            <td><?php echo $NOMBRETEMBALAJE; ?></td>
                                                            <td><?php echo $NOMBRETMANEJO; ?></td>
                                                            <td><?php echo $NOMBRETCALIBRE; ?></td>
                                                            <td><?php echo $NOMBRETCATEGORIA; ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="btn-toolbar mb-3" role="toolbar" aria-label="Datos generales">
                                        <div class="form-row align-items-center" role="group" aria-label="Datos">
                                            <div class="col-auto">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">Total Envase</div>
                                                    </div>
                                                    <!-- inicio input -->
                                                    <input type="hidden" class="form-control" placeholder="TOTAL ENVASE" id="TOTALENVASE" name="TOTALENVASE" value="<?php echo $TOTALENVASEE; ?>" />
                                                    <input type="text" class="form-control" placeholder="Total Envase" id="TOTALENVASEEV" name="TOTALENVASEEV" value="<?php echo $TOTALENVASEEV; ?>" disabled />
                                                    <!-- /termino input -->
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">% Exportacion</div>
                                                    </div>
                                                    <!-- inicio input -->
                                                    <input type="hidden" class="form-control" placeholder="TOTAL NETO" id="PEXPORTACIONEXPOEX" name="PEXPORTACIONEXPOEX" value="<?php echo $PEXPORTACIONEXPOEX; ?>" />
                                                    <input type="text" class="form-control text-center" placeholder="% Exportacion" id="PEXPORTACIONEXPOEXV" name="PEXPORTACIONEXPOEXV" value="<?php echo number_format($PEXPORTACIONEXPOEX, 2, ",", "."); ?>" disabled />
                                                    <!-- /termino input -->
                                                </div>
                                            </div>                                 
                                            <div class="col-auto">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">% Expo. Con Desh.</div>
                                                    </div>
                                                    <!-- inicio input -->
                                                    <input type="hidden" class="form-control" placeholder="TOTAL NETO" id="PEXPORTACIONEXPOEXDESHI" name="PEXPORTACIONEXPOEX" value="<?php echo $PEXPORTACIONEXPOEXDESHI; ?>" />
                                                    <input type="text" class="form-control text-center" placeholder="% Expo. Con Desh." id="PEXPORTACIONEXPOEXDESHI" name="PEXPORTACIONEXPOEXV" value="<?php echo number_format($PEXPORTACIONEXPOEXDESHI, 2, ",", "."); ?>" disabled />
                                                    <!-- /termino input -->
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">% Industrial</div>
                                                    </div>
                                                    <!-- inicio input -->
                                                    <input type="hidden" class="form-control" placeholder="TOTAL NETO" id="PEXPORTACIONEXPOINDU" name="PEXPORTACIONEXPOINDU" value="<?php echo $PEXPORTACIONEXPOINDU; ?>" />
                                                    <input type="text" class="form-control text-center" placeholder="% Industrial" id="PEXPORTACIONEXPOINDUV" name="PEXPORTACIONEXPOINDUV" value="<?php echo number_format($PEXPORTACIONEXPOINDU, 2, ",", "."); ?>" disabled />
                                                    <!-- /termino input -->
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <label id="val_dproceso" class="validacion"><?php echo $MENSAJEEXISTENCIA; ?> </label>
                                            </div>
                                            <div class="col-auto">
                                                <label id="val_dproceso" class="validacion"><?php echo $MENSAJEPORCENTAJE; ?> </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header bg-success">
                                    <h4 class="card-title">Salida / Detalle Reembalaje </h4>
                                </div>
                                <div class="card-header">
                                    <div class="form-row align-items-center">
                                        <div class="btn-group">
                                            <form method="post" id="form5" name="form5">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" placeholder="ID PROCESO" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                                    <input type="hidden" class="form-control" placeholder="OP PROCESO" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                                    <input type="hidden" class="form-control" placeholder="URL PROCESO" id="URLP" name="URLP" value="registroReembalajeEx" />
                                                    <input type="hidden" class="form-control" placeholder="URL SELECCION" id="URLD" name="URLD" value="registroDreembalajeExportacion" />
                                                    <button type="submit" class="btn btn-info" data-toggle="tooltip" title="Agregar Producto Terminado" id="CREARDURL" name="CREARDURL" 
                                                        <?php echo $DISABLED2; ?> <?php echo $DISABLEDFOLIO; ?> <?php if ($ESTADO == 0) { echo "disabled style='background-color: #eeeeee;'";} ?>>
                                                        Agregar producto terminado
                                                    </button>
                                                </div>
                                            </form>
                                            <form method="post" id="form6" name="form6">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" placeholder="ID PROCESO" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                                    <input type="hidden" class="form-control" placeholder="OP PROCESO" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                                    <input type="hidden" class="form-control" placeholder="URL PROCESO" id="URLP" name="URLP" value="registroReembalajeEx" />
                                                    <input type="hidden" class="form-control" placeholder="URL SELECCION" id="URLD" name="URLD" value="registroDreembalajIndustrial" />
                                                    <button type="submit" class="btn btn-success" data-toggle="tooltip" title="Agregar Producto Industrial" id="CREARDURL" name="CREARDURL" 
                                                        <?php echo $DISABLED2; ?> <?php echo $DISABLEDFOLIO; ?> <?php if ($ESTADO == 0) { echo "disabled style='background-color: #eeeeee;'";} ?>>
                                                        Agregar producto Industrual
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="salida" class="table-hover " style="width: 100%;">
                                            <thead>
                                                <tr class="text-center">
                                                <th>Estado</th>
                                                    <th>P. Terminado/Industrial</th>
                                                    <th>Folio</th>
                                                    <th class="text-center">Operaciones</th>
                                                    <th>Fecha Embalado </th>
                                                    <th>Código Estandar </th>
                                                    <th>Envase/Estandar</th>
                                                    <th>Variedad</th>
                                                    <th>Cantidad Envase</th>
                                                    <th>Kilo Neto </th>
                                                    <th>% Deshidratación </th>
                                                    <th>Kilo Con Deshidratación </th>
                                                    <th>Kilo Bruto </th>
                                                    <th>Embolsado </th>
                                                    <th>Tipo Manejo </th>
                                                    <th>Tipo Calibre </th>
                                                    <th>Tipo Categoria </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if ($ARRAYDEXPORTACIONPORREEMBALAJE) { ?>
                                                    <?php foreach ($ARRAYDEXPORTACIONPORREEMBALAJE as $r) : ?>

                                                        <?php
                                                        $ARRAYVESPECIES = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
                                                        if ($ARRAYVESPECIES) {
                                                            $NOMBREVARIEDAD = $ARRAYVESPECIES[0]['NOMBRE_VESPECIES'];
                                                        } else {
                                                            $NOMBREVARIEDAD = "Sin Datos";
                                                        }
                                                        $ARRAYTCALIBRE = $TCALIBRE_ADO->verCalibre($r['ID_TCALIBRE']);
                                                        if ($ARRAYTCALIBRE) {
                                                            $NOMBRETCALIBRE = $ARRAYTCALIBRE[0]['NOMBRE_TCALIBRE'];
                                                        } else {
                                                            $NOMBRETCALIBRE = "Sin Datos";
                                                        }
                                                        $ARRAYTMANEJO = $TMANEJO_ADO->verTmanejo($r['ID_TMANEJO']);
                                                        if ($ARRAYTMANEJO) {
                                                            $NOMBRETMANEJO = $ARRAYTMANEJO[0]['NOMBRE_TMANEJO'];
                                                        } else {
                                                            $NOMBRETMANEJO = "Sin Datos";
                                                        }
                                                        $ARRAYESTANDAR = $EEXPORTACION_ADO->verEstandar($r['ID_ESTANDAR']);
                                                        if ($ARRAYESTANDAR) {
                                                            $CODIGOESTANDAR = $ARRAYESTANDAR[0]['CODIGO_ESTANDAR'];
                                                            $NOMBREESTANDAR = $ARRAYESTANDAR[0]['NOMBRE_ESTANDAR'];
                                                        } else {
                                                            $CODIGOESTANDAR = "Sin Datos";
                                                            $NOMBREESTANDAR = "Sin Datos";
                                                        }
                                                        if ($r['EMBOLSADO'] == "0") {
                                                            $EMBOLSADO = "NO";
                                                        } else if ($r['EMBOLSADO'] == "1") {
                                                            $EMBOLSADO =  "SI";
                                                        } else {
                                                            $EMBOLSADO = "Sin Datos";
                                                        }
                                                        $ARRAYTCATEGORIA=$TCATEGORIA_ADO->verTcategoria($r['ID_TCATEGORIA']);
                                                        if($ARRAYTCATEGORIA){
                                                           $NOMBRETCATEGORIA= $ARRAYTCATEGORIA[0]["NOMBRE_TCATEGORIA"];
                                                        }else{
                                                            $NOMBRETCATEGORIA = "Sin Datos";
                                                        } 
                                                        ?>
                                                        <tr class="text-center">
                                                        <?php 
                                                                switch($r['ESTADO_FOLIO']){
                                                                    case 1: echo '<td style="background: #18d26b; color: white;">P. Completado</td>';
                                                                        break;
                                                                    case 2: echo '<td style="background: #ffa800; color: white;">P. Incompleto</td>';
                                                                        break;
                                                                    case 3: echo '<td style="background: #3085f5; color: white;">P. Muestra</td>';
                                                                        break;
                                                                    default: echo '<td style="background: #93b4d4; color: white;">No identificado</td>';
                                                                }
                                                            ?>
                                                            <td>P. Terminado</td>
                                                            <td><?php echo $r['FOLIO_DREXPORTACION']; ?></td>
                                                            <td class="text-center">
                                                                <form method="post" id="form3" id="form3">
                                                                    <input type="hidden" class="form-control" placeholder="ID DPEXPORTACION" id="IDD" name="IDD" value="<?php echo $r['ID_DREXPORTACION']; ?>" />
                                                                    <input type="hidden" class="form-control" placeholder="ID PROCESO" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                                                    <input type="hidden" class="form-control" placeholder="OP PROCESO" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                                                    <input type="hidden" class="form-control" placeholder="URL PROCESO" id="URLP" name="URLP" value="registroReembalajeEx" />
                                                                    <input type="hidden" class="form-control" placeholder="URL DPEXPORTACION" id="URLD" name="URLD" value="registroDreembalajeExportacion" />
                                                                    <div class="btn-group  btn-block" role="group" aria-label="Operaciones Detalle">
                                                                        <?php if ($ESTADO == "0") { ?>
                                                                            <button type="submit" class="btn btn-sm btn-info   " id="VERDURL" name="VERDURL" data-toggle="tooltip" title="Ver Detalle ">
                                                                                <i class="ti-eye"></i><br> Ver
                                                                            </button>
                                                                        <?php } ?>
                                                                        <?php if ($ESTADO == "1") { ?>
                                                                            <button type="submit" class="btn  btn-sm   btn-warning  " id="EDITARDURL" name="EDITARDURL" data-toggle="tooltip" title="Editar Detalle " <?php echo $DISABLED2; ?>>
                                                                                <i class="ti-pencil-alt"></i><br> Editar
                                                                            </button>
                                                                            <button type="submit" class="btn btn-sm  btn-secondary  " id="DUPLICARDURL" name="DUPLICARDURL" data-toggle="tooltip" title="Duplicar Detalle " <?php echo $DISABLED2; ?>>
                                                                                <i class="fa fa-fw fa-copy"></i><br> Duplicar
                                                                            </button>
                                                                            <button type="submit" class="btn btn-sm   btn-danger  " id="ELIMINARDURL" name="ELIMINARDURL" data-toggle="tooltip" title="Eliminar Detalle " <?php echo $DISABLED2; ?>>
                                                                                <i class="ti-close"></i><br> Eliminar
                                                                            </button>
                                                                        <?php } ?>
                                                                    </div>
                                                                </form>
                                                            </td>
                                                            <td><?php echo $r['EMBALADO']; ?></td>
                                                            <td><?php echo $CODIGOESTANDAR; ?></td>
                                                            <td><?php echo $NOMBREESTANDAR; ?></td>
                                                            <td><?php echo $NOMBREVARIEDAD; ?></td>
                                                            <td><?php echo $r['ENVASE']; ?></td>
                                                            <td><?php echo $r['NETO']; ?></td>
                                                            <td><?php echo $r['PORCENTAJE']; ?></td>
                                                            <td><?php echo $r['DESHIDRATACION']; ?></td>
                                                            <td><?php echo $r['BRUTO']; ?></td>
                                                            <td><?php echo $EMBOLSADO; ?></td>
                                                            <td><?php echo $NOMBRETMANEJO; ?></td>
                                                            <td><?php echo $NOMBRETCALIBRE; ?></td>
                                                            <td><?php echo $NOMBRETCATEGORIA; ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php } ?>
                                                <?php if ($ARRATDINDUSTRIALPORREEMBALAJE) { ?>
                                                    <?php foreach ($ARRATDINDUSTRIALPORREEMBALAJE as $r) : ?>

                                                        <?php
                                                        $ARRAYVEREINDUTRIAL = $EINDUSTRIAL_ADO->verEstandar($r['ID_ESTANDAR']);
                                                        if ($ARRAYVEREINDUTRIAL) {
                                                            $CODIGOESTANDARI = $ARRAYVEREINDUTRIAL[0]['CODIGO_ESTANDAR'];
                                                            $NOMBREESTANDARI = $ARRAYVEREINDUTRIAL[0]['NOMBRE_ESTANDAR'];
                                                        } else {
                                                            $CODIGOESTANDARI = "Sin Datos";
                                                            $NOMBREESTANDARI = "Sin Datos";
                                                        }
                                                        ?>
                                                        <tr class="text-center">
                                                            <td>-</td>
                                                            <td>P. Industrial</td>
                                                            <td><?php echo $r['FOLIO_DRINDUSTRIAL']; ?></td>
                                                            <td class="text-center">
                                                                <form method="post" id="form4" id="form4">
                                                                    <input type="hidden" class="form-control" placeholder="ID DPINDUSTRIAL" id="IDD" name="IDD" value="<?php echo $r['ID_DRINDUSTRIAL']; ?>" />
                                                                    <input type="hidden" class="form-control" placeholder="ID PROCESO" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                                                    <input type="hidden" class="form-control" placeholder="OP PROCESO" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                                                    <input type="hidden" class="form-control" placeholder="URL PROCESO" id="URLP" name="URLP" value="registroReembalajeEx" />
                                                                    <input type="hidden" class="form-control" placeholder="URL DPINDUSTRIAL" id="URLD" name="URLD" value="registroDreembalajIndustrial" />
                                                                    <div class="btn-group btn-block" role="group" aria-label="Operaciones Detalle">
                                                                        <?php if ($ESTADO == "0") { ?>
                                                                            <button type="submit" class="btn btn-sm btn-info   " id="VERDURL" name="VERDURL" data-toggle="tooltip" title="Ver Detalle ">
                                                                                <i class="ti-eye"></i><br> Ver
                                                                            </button>
                                                                        <?php } ?>
                                                                        <?php if ($ESTADO == "1") { ?>
                                                                            <button type="submit" class="btn  btn-sm   btn-warning  " id="EDITARDURL" name="EDITARDURL" data-toggle="tooltip" title="Editar Detalle " <?php echo $DISABLED2; ?>>
                                                                                <i class="ti-pencil-alt"></i><br> Editar
                                                                            </button>
                                                                            <button type="submit" class="btn btn-sm  btn-secondary  " id="DUPLICARDURL" name="DUPLICARDURL" data-toggle="tooltip" title="Duplicar Detalle " <?php echo $DISABLED2; ?>>
                                                                                <i class="fa fa-fw fa-copy"></i><br> Duplicar
                                                                            </button>
                                                                            <button type="submit" class="btn btn-sm   btn-danger  " id="ELIMINARDURL" name="ELIMINARDURL" data-toggle="tooltip" title="Eliminar Detalle " <?php echo $DISABLED2; ?>>
                                                                                <i class="ti-close"></i><br> Eliminar
                                                                            </button>
                                                                        <?php } ?>
                                                                    </div>
                                                                </form>
                                                            </td>
                                                            <td><?php echo $r['EMBALADO']; ?></td>
                                                            <td> <?php echo $CODIGOESTANDARI; ?> </td>
                                                            <td> <?php echo $NOMBREESTANDARI; ?> </td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td><?php echo $r['NETO']; ?></td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="btn-toolbar mb-3" role="toolbar" aria-label="Datos generales">
                                        <div class="form-row align-items-center" role="group" aria-label="Datos">
                                            <div class="col-auto">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">Kg. Entrada Con Desh.</div>
                                                    </div>
                                                    <!-- inicio input -->
                                                    <input type="hidden" class="form-control" placeholder="TOTAL NETO" id="TOTALNETO" name="TOTALNETO" value="<?php echo $TOTALNETOE; ?>" />
                                                    <input type="text" class="form-control" placeholder="Kg. Entrada Con Desh." id="TOTALNETOEV" name="TOTALNETOEV" value="<?php echo $TOTALNETOEV; ?>" disabled />
                                                    <!-- /termino input -->
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            Kg. Entrada Netos
                                                        </div>
                                                    </div>
                                                    <input type="hidden" class="form-control" id="TOTALDESHIDRATACIONEX" name="TOTALDESHIDRATACIONEX" value="<?php echo $TOTALENTRADANETOEX; ?>" />
                                                    <input type="text" class="form-control" placeholder="Kg. Entrada Netos" id="TOTALDESHIDRATACIONEXV" name="TOTALDESHIDRATACIONEXV" value="<?php echo $TOTALENTRADANETOEXV; ?>" disabled />
                                                </div>
                                            </div>                              
                                            <div class="col-auto">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            Kg. Salida Neto Exp.
                                                        </div>
                                                    </div>
                                                    <input type="hidden" class="form-control" id="TOTALDESHIDRATACIONEX" name="TOTALDESHIDRATACIONEX" value="<?php echo $TOTALNETOEXPO; ?>" />
                                                    <input type="text" class="form-control text-center" placeholder="Total Kilos Con Desh. Expo" id="TOTALDESHIDRATACIONEXV" name="TOTALDESHIDRATACIONEXV" value="<?php echo $TOTALNETOEXPO; ?>" disabled />
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            Kg. Salida Industrial
                                                        </div>
                                                    </div>
                                                    <input type="hidden" class="form-control" id="TOTALNETOIND" name="TOTALNETOIND" value="<?php echo $TOTALNETOIND; ?>" />
                                                    <input type="text" class="form-control" placeholder="TOTAL NETO" id="TOTALNETOINDV" name="TOTALNETOINDV" value="<?php echo $TOTALNETOINDV; ?>" disabled />
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            Diferencia Kilos
                                                        </div>
                                                    </div>
                                                    <input type="hidden" class="form-control" placeholder="DIFERENCIA KILOS NETO" id="DIFERENCIAKILOSNETOEX" name="DIFERENCIAKILOSNETOEX" value="<?php echo $DIFERENCIAKILOSNETOEXPO; ?>" />
                                                    <input type="text" class="form-control text-center" placeholder="DIFERENCIA KILOS NETO" id="DIFERENCIAKILOSNETOEXN" name="DIFERENCIAKILOSNETOEXN" value="<?php echo number_format($DIFERENCIAKILOSNETOEXPO, 2, ",", "."); ?>" disabled />
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <label id="val_dproceso" class="validacion "><?php echo $MENSAJEEXPORTACION; ?> </label>
                                            </div>
                                            <div class="col-auto">
                                                <label id="val_dproceso" class="validacion "><?php echo $MENSAJEINDUSTRIAL; ?> </label>
                                            </div>
                                            <div class="col-auto">
                                                <label id="val_dproceso" class="validacion center"><?php echo $MENSAJEDIFERENCIA; ?> </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                        
                        <?php endif ?>
                        <!--.row -->
                    </section>
                    <!-- /.content -->
                </div>
            </div>
            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php include_once "../../assest/config/footer.php"; ?>
                <?php include_once "../../assest/config/menuExtraFruta.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../../assest/config/urlBase.php"; ?>
        <?php
          
            //OPERACION DE REGISTRO DE FILA
            if (isset($_REQUEST['CREAR'])) {

                $ARRAYNUMERO = $REEMBALAJE_ADO->obtenerNumero($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
                $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;
                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
                $REEMBALAJE->__SET('NUMERO_REEMBALAJE', $NUMERO);
                $REEMBALAJE->__SET('FECHA_REEMBALAJE', $_REQUEST['FECHAREEMBALAJE']);
                $REEMBALAJE->__SET('TURNO', $_REQUEST['TURNO']);
                $REEMBALAJE->__SET('OBSERVACIONE_REEMBALAJE', $_REQUEST['OBSERVACIONREEMBALAJE']);
                $REEMBALAJE->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                $REEMBALAJE->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
                $REEMBALAJE->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
                $REEMBALAJE->__SET('ID_VESPECIES', $_REQUEST['VESPECIES']);
                $REEMBALAJE->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
                $REEMBALAJE->__SET('ID_TREEMBALAJE', $_REQUEST['TREEMBALAJE']);
                $REEMBALAJE->__SET('ID_USUARIOI', $IDUSUARIOS);
                $REEMBALAJE->__SET('ID_USUARIOM', $IDUSUARIOS);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR  HORAINGRESOREEMBALAJE
                $REEMBALAJE_ADO->agregarReembalaje($REEMBALAJE);


                //OBTENER EL ID DE LA RECEPCION CREADA PARA LUEGO ENVIAR EL INGRESO DEL DETALLE
                $ARRYAOBTENERID = $REEMBALAJE_ADO->obtenerId(
                    $_REQUEST['FECHAREEMBALAJE'],
                    $_REQUEST['EMPRESA'],
                    $_REQUEST['PLANTA'],
                    $_REQUEST['TEMPORADA']
                );
                $AUSUARIO_ADO->agregarAusuario2($NUMERO,1,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de reembalaje.","fruta_reembalaje", $ARRYAOBTENERID[0]['ID_REEMBALAJE'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

                $id_dato = $ARRYAOBTENERID[0]['ID_REEMBALAJE'];
                $accion_dato = "crear";
                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Creado",
                        text:"El registro de reembalaje se ha creado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroReembalajeEx.php?op&id='.$id_dato.'&a='.$accion_dato.'";                        
                    })
                </script>';
                //echo "<script type='text/javascript'> location.href ='registroReembalajeEx.php?op';</script>";
            }
            //OPERACION EDICION DE FILA
            if (isset($_REQUEST['GUARDAR'])) {
                $REEMBALAJE->__SET('FECHA_REEMBALAJE',  $_REQUEST['FECHAREEMBALAJE']);
                $REEMBALAJE->__SET('TURNO',  $_REQUEST['TURNOE']);
                $REEMBALAJE->__SET('OBSERVACIONE_REEMBALAJE', $_REQUEST['OBSERVACIONREEMBALAJE']);     

                $REEMBALAJE->__SET('KILOS_NETO_ENTRADA', $_REQUEST['TOTALNETO']);
                $REEMBALAJE->__SET('KILOS_NETO_REEMBALAJE', $_REQUEST['TOTALNETOEX']);
                $REEMBALAJE->__SET('KILOS_EXPORTACION_REEMBALAJE', $_REQUEST['TOTALDESHIDRATACIONEX']);   
                $REEMBALAJE->__SET('KILOS_INDUSTRIAL_REEMBALAJE', $_REQUEST['TOTALNETOIND']);
                $REEMBALAJE->__SET('KILOS_INDUSTRIALSC_REEMBALAJE', $_REQUEST['TOTALNETOINDSC']);
                $REEMBALAJE->__SET('KILOS_INDUSTRIALNC_REEMBALAJE', $_REQUEST['TOTALNETOINDNC']);

                $REEMBALAJE->__SET('PDEXPORTACION_REEMBALAJE', $_REQUEST['PEXPORTACIONEXPOEX']);
                $REEMBALAJE->__SET('PDEXPORTACIONCD_REEMBALAJE', $_REQUEST['PEXPORTACIONEXPOEXDESHI']);
                $REEMBALAJE->__SET('PDINDUSTRIAL_REEMBALAJE', $_REQUEST['PEXPORTACIONEXPOINDU']);
                $REEMBALAJE->__SET('PDINDUSTRIALSC_REEMBALAJE', $_REQUEST['PEXPORTACIONEXPOINDUSC']);
                $REEMBALAJE->__SET('PDINDUSTRIALNC_REEMBALAJE', $_REQUEST['PEXPORTACIONEXPOINDUNC']);
                $REEMBALAJE->__SET('PORCENTAJE_REEMBALAJE', $_REQUEST['PEXPORTACIONEXPO']);

                $REEMBALAJE->__SET('ID_VESPECIES', $_REQUEST['VESPECIESE']);
                $REEMBALAJE->__SET('ID_PRODUCTOR',  $_REQUEST['PRODUCTORE']);
                $REEMBALAJE->__SET('ID_TREEMBALAJE', $_REQUEST['TREEMBALAJEE']);
                $REEMBALAJE->__SET('ID_REEMBALAJE', $_REQUEST['IDP']);
                $REEMBALAJE->__SET('ID_USUARIOM', $IDUSUARIOS);
                //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                $REEMBALAJE_ADO->actualizarReembalaje($REEMBALAJE);

                $AUSUARIO_ADO->agregarAusuario2($NUMEROVER,1,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de reembalaje.","fruta_reembalaje", $_REQUEST['IDP'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  
                
                if ($accion_dato == "crear") {
                    $id_dato = $_REQUEST['IDP'];
                    $accion_dato = "crear";
                    echo '<script>
                        Swal.fire({
                            icon:"info",
                            title:"Registro Modificado",
                            text:"El registro de reembalaje se ha modificada correctamente",
                            showConfirmButton: true,
                            confirmButtonText:"Cerrar",
                            closeOnConfirm:false
                        }).then((result)=>{
                            location.href = "registroReembalajeEx.php?op&id='.$id_dato.'&a='.$accion_dato.'";                        
                        })
                    </script>';
                }
                if ($accion_dato == "editar") {
                    $id_dato = $_REQUEST['IDP'];
                    $accion_dato = "editar";
                    echo '<script>
                        Swal.fire({
                            icon:"info",
                            title:"Registro Modificado",
                            text:"El registro de reembalaje se ha modificada correctamente",
                            showConfirmButton: true,
                            confirmButtonText:"Cerrar",
                            closeOnConfirm:false
                        }).then((result)=>{
                            location.href = "registroReembalajeEx.php?op&id='.$id_dato.'&a='.$accion_dato.'";                        
                        })
                    </script>';
                }
            }
            //OPERACION CERRAR DE FILA
            if (isset($_REQUEST['CERRAR'])) {
                //UTILIZACION METODOS SET DEL MODELO

                $ARRAYEXIPRODUCTOTERMINADOTOMADO = $EXIEXPORTACION_ADO->buscarPorReembalaje($_REQUEST['IDP']);
                $ARRAYDEXPORTACIONPORREEMBALAJE = $DREXPORTACION_ADO->buscarPorReembalaje($_REQUEST['IDP']);
                $ARRATDINDUSTRIALPORREEMBALAJE = $DRINDUSTRIAL_ADO->buscarPorReembalaje($_REQUEST['IDP']);



                if (empty($ARRAYEXIPRODUCTOTERMINADOTOMADO)) {
                    $SINO = "1";
                    $MENSAJE = $MENSAJE. " Tiene que haber al menos un registro de existencia seleccionado.";                
                
                }  else {
                    $SINO = "0";
                    $MENSAJE = $MENSAJE;
                }
            
                if($SINO == 1){
                        echo '<script>
                            Swal.fire({
                                icon:"warning",
                                title:"Accion restringida",
                                text:"'.$MENSAJE.'",
                                showConfirmButton: true,
                                confirmButtonText:"Cerrar",
                                closeOnConfirm:false
                            }).then((result)=>{
                                location.href = "registroReembalajeEx.php?op&id='.$id_dato.'&a='.$accion_dato.'";                        
                            });
                        </script>';
                }            

                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO 
                if ($SINO == "0") {
                    $REEMBALAJE->__SET('FECHA_REEMBALAJE',  $_REQUEST['FECHAREEMBALAJE']);
                    $REEMBALAJE->__SET('TURNO',  $_REQUEST['TURNOE']);
                    $REEMBALAJE->__SET('OBSERVACIONE_REEMBALAJE', $_REQUEST['OBSERVACIONREEMBALAJE']);   
    
                    $REEMBALAJE->__SET('KILOS_NETO_ENTRADA', $_REQUEST['TOTALNETO']);
                    $REEMBALAJE->__SET('KILOS_NETO_REEMBALAJE', $_REQUEST['TOTALNETOEX']);
                    $REEMBALAJE->__SET('KILOS_EXPORTACION_REEMBALAJE', $_REQUEST['TOTALDESHIDRATACIONEX']);   
                    $REEMBALAJE->__SET('KILOS_INDUSTRIAL_REEMBALAJE', $_REQUEST['TOTALNETOIND']);
                    $REEMBALAJE->__SET('KILOS_INDUSTRIALSC_REEMBALAJE', $_REQUEST['TOTALNETOINDSC']);
                    $REEMBALAJE->__SET('KILOS_INDUSTRIALNC_REEMBALAJE', $_REQUEST['TOTALNETOINDNC']);
    
                    $REEMBALAJE->__SET('PDEXPORTACION_REEMBALAJE', $_REQUEST['PEXPORTACIONEXPOEX']);
                    $REEMBALAJE->__SET('PDEXPORTACIONCD_REEMBALAJE', $_REQUEST['PEXPORTACIONEXPOEXDESHI']);
                    $REEMBALAJE->__SET('PDINDUSTRIAL_REEMBALAJE', $_REQUEST['PEXPORTACIONEXPOINDU']);
                    $REEMBALAJE->__SET('PDINDUSTRIALSC_REEMBALAJE', $_REQUEST['PEXPORTACIONEXPOINDUSC']);
                    $REEMBALAJE->__SET('PDINDUSTRIALNC_REEMBALAJE', $_REQUEST['PEXPORTACIONEXPOINDUNC']);
                    $REEMBALAJE->__SET('PORCENTAJE_REEMBALAJE', $_REQUEST['PEXPORTACIONEXPO']);
    
                    $REEMBALAJE->__SET('ID_VESPECIES', $_REQUEST['VESPECIESE']);
                    $REEMBALAJE->__SET('ID_PRODUCTOR',  $_REQUEST['PRODUCTORE']);
                    $REEMBALAJE->__SET('ID_TREEMBALAJE', $_REQUEST['TREEMBALAJEE']);
                    $REEMBALAJE->__SET('ID_REEMBALAJE', $_REQUEST['IDP']);
                    $REEMBALAJE->__SET('ID_USUARIOM', $IDUSUARIOS);
                    //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                    $REEMBALAJE_ADO->actualizarReembalaje($REEMBALAJE);

                    $REEMBALAJE->__SET('ID_REEMBALAJE', $_REQUEST['IDP']);
                    //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                    $REEMBALAJE_ADO->cerrado($REEMBALAJE);

                    $AUSUARIO_ADO->agregarAusuario2($NUMEROVER,1,3,"".$_SESSION["NOMBRE_USUARIO"].", Cerrar  reembalaje.","fruta_reembalaje", $_REQUEST['IDP'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

                    $ARRAYEXIPRODUCTOTERMINADOTOMADO = $EXIEXPORTACION_ADO->buscarPorReembalaje($_REQUEST['IDP']);
                    $ARRAYEXIEXPORTACION = $EXIEXPORTACION_ADO->buscarPorReembalajeIngresando($_REQUEST['IDP']);
                    $ARRAYEXIINDUSTRIAL = $EXIINDUSTRIAL_ADO->buscarPorReembalajeIngresnado($_REQUEST['IDP']);


                    foreach ($ARRAYEXIPRODUCTOTERMINADOTOMADO as $s) :
                        $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $s['ID_EXIEXPORTACION']);
                    //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                        $EXIEXPORTACION_ADO->Reembalaje($EXIEXPORTACION);
                    endforeach;
                    foreach ($ARRAYEXIEXPORTACION as $s) :
                        $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $s['ID_EXIEXPORTACION']);
                        //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                        $EXIEXPORTACION_ADO->vigente($EXIEXPORTACION);
                    endforeach;
                    foreach ($ARRAYEXIINDUSTRIAL as $f) :
                        $EXIINDUSTRIAL->__SET('ID_EXIINDUSTRIAL', $f['ID_EXIINDUSTRIAL']);
                        //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                        $EXIINDUSTRIAL_ADO->vigente($EXIINDUSTRIAL);
                    endforeach;

                //SEGUNE EL TIPO DE OPERACIONS QUE SE INDENTIFIQUE EN LA URL
                    if ($accion_dato == "crear") {
                        $id_dato = $_REQUEST['IDP'];
                        $accion_dato = "ver";
                        echo '<script>
                            Swal.fire({
                                icon:"info",
                                title:"Registro Cerrado",
                                text:"Este reembalaje se encuentra cerrada y no puede ser modificada.",
                                showConfirmButton: true,
                                confirmButtonText:"Cerrar",
                                closeOnConfirm:false
                            }).then((result)=>{
                                location.href = "registroReembalajeEx.php?op&id='.$id_dato.'&a='.$accion_dato.'";                            
                            })
                        </script>';
                    }
                    if ($accion_dato == "editar") {
                        $id_dato = $_REQUEST['IDP'];
                        $accion_dato = "ver";
                        echo '<script>
                            Swal.fire({
                                icon:"info",
                                title:"Registro Cerrado",
                                text:"Este reembalaje se encuentra cerrada y no puede ser modificada.",
                                showConfirmButton: true,
                                confirmButtonText:"Cerrar",
                                closeOnConfirm:false
                            }).then((result)=>{
                                location.href = "registroReembalajeEx.php?op&id='.$id_dato.'&a='.$accion_dato.'";                            
                            })
                        </script>';
                    } 
                }
            }

            
            if (isset($_REQUEST['QUITAR'])) {
                $IDQUITAR = $_REQUEST['IDQUITAR'];
                $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $_REQUEST['IDQUITAR']);
                //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                $EXIEXPORTACION_ADO->actualizarDeselecionarReembalajeeCambiarEstado($EXIEXPORTACION);

                $AUSUARIO_ADO->agregarAusuario2("NULL",1,2,"".$_SESSION["NOMBRE_USUARIO"].", Se Quito la Existencia al reembalaje.","fruta_exiexportacion", "NULL" ,$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  
                
            echo '<script>
                Swal.fire({
                    icon:"error",
                    title:"Accion realizada",
                    text:"Se ha quitado la existencia del reembalaje.",
                    showConfirmButton: true,
                    confirmButtonText:"Cerrar",
                    closeOnConfirm:false
                }).then((result)=>{
                    location.href = "registroReembalajeEx.php?op&id='.$id_dato.'&a='.$accion_dato.'";                            
                })
            </script>';
            }
        ?>
</body>

</html>