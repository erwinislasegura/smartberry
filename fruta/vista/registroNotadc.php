<?php

include_once "../../assest/config/validarUsuarioFruta.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES BASE OPERACION
include_once '../../assest/controlador/CONSIGNATARIO_ADO.php';
include_once '../../assest/controlador/RFINAL_ADO.php';

include_once '../../assest/controlador/TRANSPORTE_ADO.php';
include_once '../../assest/controlador/LCARGA_ADO.php';
include_once '../../assest/controlador/LDESTINO_ADO.php';

include_once '../../assest/controlador/LAEREA_ADO.php';
include_once '../../assest/controlador/ACARGA_ADO.php';
include_once '../../assest/controlador/ADESTINO_ADO.php';

include_once '../../assest/controlador/NAVIERA_ADO.php';
include_once '../../assest/controlador/PCARGA_ADO.php';
include_once '../../assest/controlador/PDESTINO_ADO.php';


include_once '../../assest/controlador/FPAGO_ADO.php';
include_once '../../assest/controlador/MVENTA_ADO.php';


include_once '../../assest/controlador/EEXPORTACION_ADO.php';
include_once '../../assest/controlador/ESPECIES_ADO.php';
include_once '../../assest/controlador/VESPECIES_ADO.php';
include_once '../../assest/controlador/TCALIBRE_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/TMONEDA_ADO.php';


include_once '../../assest/controlador/ICARGA_ADO.php';
include_once '../../assest/controlador/DICARGA_ADO.php';



include_once '../../assest/controlador/NOTADC_ADO.php';
include_once '../../assest/controlador/DNOTADC_ADO.php';


include_once '../../assest/modelo/NOTADC.php';
include_once '../../assest/modelo/DNOTADC.php';



//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$CONSIGNATARIO_ADO =  new CONSIGNATARIO_ADO();
$RFINAL_ADO =  new RFINAL_ADO();

$TRANSPORTE_ADO =  new TRANSPORTE_ADO();
$LCARGA_ADO =  new LCARGA_ADO();
$LDESTINO_ADO =  new LDESTINO_ADO();

$LAEREA_ADO =  new LAEREA_ADO();
$ACARGA_ADO =  new ACARGA_ADO();
$ADESTINO_ADO =  new ADESTINO_ADO();

$NAVIERA_ADO =  new NAVIERA_ADO();
$PCARGA_ADO =  new PCARGA_ADO();
$PDESTINO_ADO =  new PDESTINO_ADO();

$FPAGO_ADO =  new FPAGO_ADO();
$MVENTA_ADO =  new MVENTA_ADO();

$EEXPORTACION_ADO = new EEXPORTACION_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$ESPECIES_ADO =  new ESPECIES_ADO();
$TCALIBRE_ADO =  new TCALIBRE_ADO();
$PRODUCTOR_ADO = new PRODUCTOR_ADO();
$TCALIBRE_ADO = new TCALIBRE_ADO();
$TMONEDA_ADO = new TMONEDA_ADO();

$ICARGA_ADO =  new ICARGA_ADO();
$DICARGA_ADO =  new DICARGA_ADO();

$NOTADC_ADO =  new NOTADC_ADO();
$DNOTADC_ADO =  new DNOTADC_ADO();

//INIICIALIZAR MODELO
$NOTADC =  new NOTADC();
$DNOTADC =  new DNOTADC();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$NUMERO = "";
$NUMEROVER = "";
$FECHAINGRESO = "";
$FECHAMODIFCIACION = "";
$IDINOTA = "";
$FECHAINOTA = "";
$TNOTA = "";
$OBSERVACIONINOTA = "";
$ICARGAD="";

$BOOKINGINSTRUCTIVO = "";
$BOLAWBCRTINSTRUCTIVO="";
$CONSIGNATARIO = "";
$FECHAETD = "";
$FECHAETA = "";
$TEMBARQUE = "";
$TRANSPORTE = "";
$LCARGA = "";
$LDESTINO = "";
$LAEREA = "";
$ACARGA = "";
$ADESTINO = "";
$NAVIERA = "";
$PCARGA = "";
$PDESTINO = "";
$FPAGO = "";
$CVENTA = "";
$ESTADO = "";
$RFINAL="";


$ESTANDAR = "";
$ESPECIES = "";
$VESPECIES = "";
$ENVASE = "";
$PRECIOUS = "";
$CALIBRE = "";

$FDA="";

$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";

$IDOP = "";
$OP = "";
$SINO = "";
$MENSAJE = "";


$DISABLED = "";
$DISABLEDSTYLE = "";
$DISABLED2 = "";
$DISABLEDSTYLE2 = "";
$DISABLED3 = "";
$DISABLEDSTYLE3 = "";

//INICIALIZAR ARREGLOS

$ARRAYEMPRESA = "";
$ARRAYPLANTA = "";
$ARRAYTEMPORADA = "";
$ARRAYFECHAACTUAL = "";
$ARRAYVERICARGA = "";
$ARRAYDICARGA = "";
$ARRAYCONSIGNATARIO = "";
$ARRAYTRANSPORTE = "";
$ARRAYLCARGA = "";
$ARRAYLDESTINO = "";
$ARRAYLAEREA = "";
$ARRAYACARGA = "";
$ARRAYADESTINO = "";
$ARRAYNAVIERA = "";
$ARRAYPCARGA = "";
$ARRAYPDESTINO = "";
$ARRAYFPAGO = "";
$ARRAYMVENTA = "";
$ARRAYICARGA2 = "";
$ARRAYPAIS = "";
$ARRAYVERPLANTA = "";
$ARRAYVERDCARGA = "";
$ARRAYSEGURO = "";
$ARRAYPRODUCTOR = "";
$ARRAYDCARGA = "";
$ARRAYCALIBRE = "";
$ARRAYNUMERO = "";
$ARRAYDNOTACONTEO="";
$ARRAYDICARGACONTEO="";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES

$ARRAYICARGA = $ICARGA_ADO->listarIcargaDespachadoCBX($EMPRESAS, $TEMPORADAS);
$ARRAYCONSIGNATARIO = $CONSIGNATARIO_ADO->listarConsignatorioPorEmpresaCBX($EMPRESAS);
$ARRAYRFINAL = $RFINAL_ADO->listarRfinalPorEmpresaCBX($EMPRESAS);
$ARRAYTRANSPORTE = $TRANSPORTE_ADO->listarTransportePorEmpresaCBX($EMPRESAS);
$ARRAYLCARGA = $LCARGA_ADO->listarLcargaPorEmpresaCBX($EMPRESAS);
$ARRAYLDESTINO = $LDESTINO_ADO->listarLdestinoPorEmpresaCBX($EMPRESAS);
$ARRAYLAEREA = $LAEREA_ADO->listarLaereaPorEmpresaCBX($EMPRESAS);
$ARRAYACARGA = $ACARGA_ADO->listarAcargaPorEmpresaCBX($EMPRESAS);
$ARRAYADESTINO = $ADESTINO_ADO->listarAdestinoPorEmpresaCBX($EMPRESAS);
$ARRAYNAVIERA = $NAVIERA_ADO->listarNavierPorEmpresaCBX($EMPRESAS);
$ARRAYPCARGA = $PCARGA_ADO->listarPcargaPorEmpresaCBX($EMPRESAS);
$ARRAYPDESTINO = $PDESTINO_ADO->listarPdestinoPorEmpresaCBX($EMPRESAS);
$ARRAYFPAGO = $FPAGO_ADO->listarFpagoPorEmpresaCBX($EMPRESAS);
$ARRAYMVENTA = $MVENTA_ADO->listarMventaPorEmpresaCBX($EMPRESAS);


$ARRAYVERPLANTA = $PLANTA_ADO->verPlanta($PLANTAS);
if ($ARRAYVERPLANTA) {
    $FDA = $ARRAYVERPLANTA[0]['FDA_PLANTA'];
}
$ARRAYFECHAACTUAL = $ICARGA_ADO->obtenerFecha();
$FECHANOTA = $ARRAYFECHAACTUAL[0]['FECHA'];

include_once "../../assest/config/validarDatosUrl.php";
include_once "../../assest/config/datosUrlD.php";


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

//OPERACION EDICION DE FILA
//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION , VISUALIZACION Y CREACION

if (isset($id_dato) && isset($accion_dato)) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $id_dato;
    $OP = $accion_dato;

    $ARRAYICARGA = $ICARGA_ADO->listarIcargaEmpresaTemporadaCBX($EMPRESAS, $TEMPORADAS);

    //IDENTIFICACIONES DE OPERACIONES
    //crear =  OBTENCION DE DATOS INICIALES PARA PODER CREAR LA RECEPCION
    if ($OP == "crear") {
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL

        $DISABLED = "";
        $DISABLEDSTYLE = "";
        $DISABLED2 = "";
        $DISABLEDSTYLE2 = "";
        $DISABLED3 = "disabled";
        $DISABLEDMENU = "disabled";
        $DISABLEDSTYLE3 = "style='background-color: #eeeeee;'";
        $ARRAYVERICARGA = $NOTADC_ADO->verNota($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYVERICARGA as $r) :

            $NUMEROVER = $r['NUMERO_NOTA'];          
            $FECHAINOTA  = $r['FECHA_NOTA'];
            $TNOTA = $r['TNOTA'];
            $OBSERVACIONINOTA  = $r['OBSERVACIONES'];
            $ICARGAD= $r['ID_ICARGA'];
            $ARRAYVERICARGA = $ICARGA_ADO->verIcarga($ICARGAD);
            if ($ARRAYVERICARGA) {
                $ARRAYDCARGA = $DICARGA_ADO->buscarPorIcarga($ICARGAD);
                $CONSIGNATARIO = $ARRAYVERICARGA[0]['ID_CONSIGNATARIO'];
                $RFINAL = $ARRAYVERICARGA[0]['ID_RFINAL'];
                $BOOKINGINSTRUCTIVO = $ARRAYVERICARGA[0]['BOOKING_ICARGA'];
                $TEMBARQUE = $ARRAYVERICARGA[0]['TEMBARQUE_ICARGA'];
                $FECHAETD = $ARRAYVERICARGA[0]['FECHAETD_ICARGA'];
                $FECHAETA = $ARRAYVERICARGA[0]['FECHAETA_ICARGA'];                
                if ($TEMBARQUE) {
                    if ($TEMBARQUE == "1") {
                        $TRANSPORTE = $ARRAYVERICARGA[0]['ID_TRANSPORTE'];
                        $LCARGA = $ARRAYVERICARGA[0]['ID_LCARGA'];
                        $LDESTINO = $ARRAYVERICARGA[0]['ID_LDESTINO'];
                    }
                    if ($TEMBARQUE == "2") {
                        $LAEREA = $ARRAYVERICARGA[0]['ID_LAREA'];
                        $ACARGA = $ARRAYVERICARGA[0]['ID_ACARGA'];
                        $ADESTINO = $ARRAYVERICARGA[0]['ID_ADESTINO'];
                    }
                    if ($TEMBARQUE == "3") {
                        $NAVIERA = $ARRAYVERICARGA[0]['ID_NAVIERA'];
                        $PCARGA = $ARRAYVERICARGA[0]['ID_PCARGA'];
                        $PDESTINO = $ARRAYVERICARGA[0]['ID_PDESTINO'];
                    }
                }                
                $BOLAWBCRTINSTRUCTIVO = $ARRAYVERICARGA[0]['BOLAWBCRT_ICARGA'];
                $FPAGO = $ARRAYVERICARGA[0]['ID_FPAGO'];
                $MVENTA = $ARRAYVERICARGA[0]['ID_MVENTA'];
            }
            $EMPRESA = $r['ID_EMPRESA'];
            $TEMPORADA = $r['ID_TEMPORADA'];
            $ESTADO = $r['ESTADO'];
        endforeach;
    }
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {

        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL

        $DISABLED = "";
        $DISABLEDSTYLE = "";
        $DISABLED2 = "";
        $DISABLEDSTYLE2 = "";
        $DISABLED3 = "disabled";
        $DISABLEDMENU = "disabled";
        $DISABLEDSTYLE3 = "style='background-color: #eeeeee;'";
        $ARRAYVERICARGA = $NOTADC_ADO->verNota($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYVERICARGA as $r) :

            $NUMEROVER = $r['NUMERO_NOTA'];          
            $FECHAINOTA  = $r['FECHA_NOTA'];
            $TNOTA = $r['TNOTA'];
            $OBSERVACIONINOTA  = $r['OBSERVACIONES'];
            $ICARGAD= $r['ID_ICARGA'];
            $ARRAYVERICARGA = $ICARGA_ADO->verIcarga($ICARGAD);
            if ($ARRAYVERICARGA) {
                $ARRAYDCARGA = $DICARGA_ADO->buscarPorIcarga($ICARGAD);
                $CONSIGNATARIO = $ARRAYVERICARGA[0]['ID_CONSIGNATARIO'];
                $RFINAL = $ARRAYVERICARGA[0]['ID_RFINAL'];
                $BOOKINGINSTRUCTIVO = $ARRAYVERICARGA[0]['BOOKING_ICARGA'];
                $TEMBARQUE = $ARRAYVERICARGA[0]['TEMBARQUE_ICARGA'];
                $FECHAETD = $ARRAYVERICARGA[0]['FECHAETD_ICARGA'];
                $FECHAETA = $ARRAYVERICARGA[0]['FECHAETA_ICARGA'];                
                if ($TEMBARQUE) {
                    if ($TEMBARQUE == "1") {
                        $TRANSPORTE = $ARRAYVERICARGA[0]['ID_TRANSPORTE'];
                        $LCARGA = $ARRAYVERICARGA[0]['ID_LCARGA'];
                        $LDESTINO = $ARRAYVERICARGA[0]['ID_LDESTINO'];
                    }
                    if ($TEMBARQUE == "2") {
                        $LAEREA = $ARRAYVERICARGA[0]['ID_LAREA'];
                        $ACARGA = $ARRAYVERICARGA[0]['ID_ACARGA'];
                        $ADESTINO = $ARRAYVERICARGA[0]['ID_ADESTINO'];
                    }
                    if ($TEMBARQUE == "3") {
                        $NAVIERA = $ARRAYVERICARGA[0]['ID_NAVIERA'];
                        $PCARGA = $ARRAYVERICARGA[0]['ID_PCARGA'];
                        $PDESTINO = $ARRAYVERICARGA[0]['ID_PDESTINO'];
                    }
                }                
                $BOLAWBCRTINSTRUCTIVO = $ARRAYVERICARGA[0]['BOLAWBCRT_ICARGA'];
                $FPAGO = $ARRAYVERICARGA[0]['ID_FPAGO'];
                $MVENTA = $ARRAYVERICARGA[0]['ID_MVENTA'];
            }
            $EMPRESA = $r['ID_EMPRESA'];
            $TEMPORADA = $r['ID_TEMPORADA'];
            $ESTADO = $r['ESTADO'];
        endforeach;
    }
    //ver =  OBTENCION DE DATOS PARA LA VISUALIZACION DEL REGISTRO
    if ($OP == "ver") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION


        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR  
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL   
        $DISABLED = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $DISABLED3 = "disabled";
        $DISABLEDMENU = "disabled";
        $DISABLEDSTYLE3 = "style='background-color: #eeeeee;'";
        $ARRAYVERICARGA = $NOTADC_ADO->verNota($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYVERICARGA as $r) :

            $NUMEROVER = $r['NUMERO_NOTA'];          
            $FECHAINOTA  = $r['FECHA_NOTA'];
            $TNOTA = $r['TNOTA'];
            $OBSERVACIONINOTA  = $r['OBSERVACIONES'];
            $ICARGAD= $r['ID_ICARGA'];
            $ARRAYVERICARGA = $ICARGA_ADO->verIcarga($ICARGAD);
            if ($ARRAYVERICARGA) {
                $ARRAYDCARGA = $DICARGA_ADO->buscarPorIcarga($ICARGAD);
                $CONSIGNATARIO = $ARRAYVERICARGA[0]['ID_CONSIGNATARIO'];
                $RFINAL = $ARRAYVERICARGA[0]['ID_RFINAL'];
                $BOOKINGINSTRUCTIVO = $ARRAYVERICARGA[0]['BOOKING_ICARGA'];
                $TEMBARQUE = $ARRAYVERICARGA[0]['TEMBARQUE_ICARGA'];
                $FECHAETD = $ARRAYVERICARGA[0]['FECHAETD_ICARGA'];
                $FECHAETA = $ARRAYVERICARGA[0]['FECHAETA_ICARGA'];                
                if ($TEMBARQUE) {
                    if ($TEMBARQUE == "1") {
                        $TRANSPORTE = $ARRAYVERICARGA[0]['ID_TRANSPORTE'];
                        $LCARGA = $ARRAYVERICARGA[0]['ID_LCARGA'];
                        $LDESTINO = $ARRAYVERICARGA[0]['ID_LDESTINO'];
                    }
                    if ($TEMBARQUE == "2") {
                        $LAEREA = $ARRAYVERICARGA[0]['ID_LAREA'];
                        $ACARGA = $ARRAYVERICARGA[0]['ID_ACARGA'];
                        $ADESTINO = $ARRAYVERICARGA[0]['ID_ADESTINO'];
                    }
                    if ($TEMBARQUE == "3") {
                        $NAVIERA = $ARRAYVERICARGA[0]['ID_NAVIERA'];
                        $PCARGA = $ARRAYVERICARGA[0]['ID_PCARGA'];
                        $PDESTINO = $ARRAYVERICARGA[0]['ID_PDESTINO'];
                    }
                }                
                $BOLAWBCRTINSTRUCTIVO = $ARRAYVERICARGA[0]['BOLAWBCRT_ICARGA'];
                $FPAGO = $ARRAYVERICARGA[0]['ID_FPAGO'];
                $MVENTA = $ARRAYVERICARGA[0]['ID_MVENTA'];
            }
            $EMPRESA = $r['ID_EMPRESA'];
            $TEMPORADA = $r['ID_TEMPORADA'];
            $ESTADO = $r['ESTADO'];
        endforeach;
    }
}

//PROCESO PARA OBTENER LOS DATOS DEL FORMULARIO  Y MANTENERLO AL ACTUALIZACION QUE REALIZA EL SELECT DE PRODUCTOR
if (isset($_POST)) {
    //DATOS GENERALES     
    if (isset($_REQUEST['FECHANOTA'])) {
        $FECHANOTA = $_REQUEST['FECHANOTA'];
    }
    if (isset($_REQUEST['TNOTA'])) {
        $TNOTA = $_REQUEST['TNOTA'];
    }   
    if (isset($_REQUEST['ICARGAD'])) {
        $ICARGAD = $_REQUEST['ICARGAD'];        
        if (isset($_REQUEST['ICARGAD'])) {
            $ICARGAD = "" . $_REQUEST['ICARGAD'];
            $ARRAYVERICARGA = $ICARGA_ADO->verIcarga($ICARGAD);
            if ($ARRAYVERICARGA) {
                $CONSIGNATARIO = $ARRAYVERICARGA[0]['ID_CONSIGNATARIO'];
                $RFINAL = $ARRAYVERICARGA[0]['ID_RFINAL'];
                $BOOKINGINSTRUCTIVO = $ARRAYVERICARGA[0]['BOOKING_ICARGA'];
                $TEMBARQUE = $ARRAYVERICARGA[0]['TEMBARQUE_ICARGA'];
                $FECHAETD = $ARRAYVERICARGA[0]['FECHAETD_ICARGA'];
                $FECHAETA = $ARRAYVERICARGA[0]['FECHAETA_ICARGA'];                
                if ($TEMBARQUE) {
                    if ($TEMBARQUE == "1") {
                        $TRANSPORTE = $ARRAYVERICARGA[0]['ID_TRANSPORTE'];
                        $LCARGA = $ARRAYVERICARGA[0]['ID_LCARGA'];
                        $LDESTINO = $ARRAYVERICARGA[0]['ID_LDESTINO'];
                    }
                    if ($TEMBARQUE == "2") {
                        $LAEREA = $ARRAYVERICARGA[0]['ID_LAREA'];
                        $ACARGA = $ARRAYVERICARGA[0]['ID_ACARGA'];
                        $ADESTINO = $ARRAYVERICARGA[0]['ID_ADESTINO'];
                    }
                    if ($TEMBARQUE == "3") {
                        $NAVIERA = $ARRAYVERICARGA[0]['ID_NAVIERA'];
                        $PCARGA = $ARRAYVERICARGA[0]['ID_PCARGA'];
                        $PDESTINO = $ARRAYVERICARGA[0]['ID_PDESTINO'];
                    }
                }                
                $BOLAWBCRTINSTRUCTIVO = $ARRAYVERICARGA[0]['BOLAWBCRT_ICARGA'];
                $FPAGO = $ARRAYVERICARGA[0]['ID_FPAGO'];
                $MVENTA = $ARRAYVERICARGA[0]['ID_MVENTA'];
            }
        }
    }    

    if (isset($_REQUEST['OBSERVACIONINOTA'])) {
        $OBSERVACIONINOTA = $_REQUEST['OBSERVACIONINOTA'];
    }
    if (isset($_REQUEST['EMPRESA'])) {
        $EMPRESA = "" . $_REQUEST['EMPRESA'];
    }
    if (isset($_REQUEST['TEMPORADA'])) {
        $TEMPORADA = "" . $_REQUEST['TEMPORADA'];
    }
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title> Registro Nota</title>
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

                    FECHANOTA = document.getElementById("FECHANOTA").value;
                    TNOTA = document.getElementById("TNOTA").selectedIndex;
                    ICARGAD = document.getElementById("ICARGAD").selectedIndex;                    
                    OBSERVACIONINOTA = document.getElementById("OBSERVACIONINOTA").value;



                    document.getElementById('val_fecha').innerHTML = "";
                    document.getElementById('val_tnota').innerHTML = "";
                    document.getElementById('val_icarga').innerHTML = "";
                    document.getElementById('val_observacion').innerHTML = "";


                    if (FECHANOTA == null || FECHANOTA.length == 0 || /^\s+$/.test(FECHANOTA)) {
                        document.form_reg_dato.FECHANOTA.focus();
                        document.form_reg_dato.FECHANOTA.style.borderColor = "#FF0000";
                        document.getElementById('val_fecha').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.FECHANOTA.style.borderColor = "#4AF575";

                    if (TNOTA == null || TNOTA == 0) {
                        document.form_reg_dato.TNOTA.focus();
                        document.form_reg_dato.TNOTA.style.borderColor = "#FF0000";
                        document.getElementById('val_tnota').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.TNOTA.style.borderColor = "#4AF575";

                    if (ICARGAD == null || ICARGAD == 0) {
                        document.form_reg_dato.ICARGAD.focus();
                        document.form_reg_dato.ICARGAD.style.borderColor = "#FF0000";
                        document.getElementById('val_icarga').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.ICARGAD.style.borderColor = "#4AF575";

                    
                    if (OBSERVACIONINOTA == null || OBSERVACIONINOTA.length == 0 || /^\s+$/.test(OBSERVACIONINOTA)) {
                        document.form_reg_dato.OBSERVACIONINOTA.focus();
                        document.form_reg_dato.OBSERVACIONINOTA.style.borderColor = "#FF0000";
                        document.getElementById('val_observacion').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.OBSERVACIONINOTA.style.borderColor = "#4AF575";      
                    



                }





                //REDIRECCIONAR A LA PAGINA SELECIONADA
                function irPagina(url) {
                    location.href = "" + url;
                }

                //FUNCION PARA REALIZAR UNA ACTUALIZACION DEL FORMULARIO DE REGISTRO DE RECEPCION
                function refrescar() {
                    document.getElementById("form_reg_dato").submit();
                }

                //FUNCION PARA ABRIR VENTANA QUE SE ENCUENTRA LA OPERACIONES DE DETALLE DE RECEPCION
                function abrirVentana(url) {
                    var opciones =
                        "'directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=1600, height=1000'";
                    window.open(url, 'window', opciones);
                }

                function abrirPestana(url) {
                    var win = window.open(url, '_blank');
                    win.focus();
                }
            </script>

</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary" >
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
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#">Registro Nota </a>
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <?php include_once "../../assest/config/verIndicadorEconomico.php"; ?>
                        </div>
                    </div>
                    <!-- Main content -->
                    <section class="content">
                        <div class="box">
                            <div class="box-header with-border bg-primary">                                   
                                <h4 class="box-title">Registro de Nota D/C</h4>                                        
                            </div>
                            <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato">
                                <div class="box-body ">
                                    <div class="row">
                                        <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group ">
                                                <label>Número Nota</label>
                                                <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTA" name="PLANTA" value="<?php echo $PLANTAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESAE" name="EMPRESAE" value="<?php echo $EMPRESA; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTAE" name="PLANTAE" value="<?php echo $PLANTA; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADAE" name="TEMPORADAE" value="<?php echo $TEMPORADA; ?>" />



                                                <input type="hidden" class="form-control" placeholder="ID RECEPCION" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="OP RECEPCION" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="URL RECEPCION" id="URLP" name="URLP" value="registroNotadc" />
                                                <input type="hidden" class="form-control" placeholder="URL DRECEPCION" id="URLD" name="URLD" value="registroDnotadc" />
                                                <input type="text" class="form-control " style="background-color: #eeeeee;" placeholder="Número Instructivo" id="IDINSTRUCTIVO" name="IDINSTRUCTIVO" value="<?php echo $NUMEROVER; ?>" disabled />
                                                <label id="val_id" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-6 col-xl-1 col-lg-1 col-md-6 col-sm-6 col-6 col-xs-6">
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha Ingreso</label>
                                                <input type="hidden" class="form-control" placeholder="Fecha Ingreso " id="FECHAINGRESOE" name="FECHAINGRESOE" value="<?php echo $FECHAINGRESO; ?>" />
                                                <input type="date" class="form-control" style="background-color: #eeeeee;" placeholder="Fecha Ingreso" id="FECHAINGRESO" name="FECHAINGRESO" value="<?php echo $FECHAINGRESO; ?>" disabled />
                                                <label id="val_fechai" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha Modificación</label>
                                                <input type="hidden" class="form-control" placeholder="Fecha Modificacion " id="FECHAMODIFCIACIONE" name="FECHAMODIFCIACIONE" value="<?php echo $FECHAMODIFCIACION; ?>" />
                                                <input type="date" class="form-control " style="background-color: #eeeeee;" placeholder="FECHA MODIFICACION" id="FECHAMODIFCIACION" name="FECHAMODIFCIACION" value="<?php echo $FECHAMODIFCIACION; ?>" disabled />
                                                <label id="val_fecham" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                <label>Fecha Nota</label>
                                                <input type="hidden" class="form-control" placeholder="Instructivo Carga" id="FECHANOTAE" name="FECHANOTAE" value="<?php echo $FECHANOTA; ?>" />
                                                <input type="date" class="form-control"  placeholder="Fecha Nota" id="FECHANOTA" name="FECHANOTA" value="<?php echo $FECHANOTA; ?>" <?php echo $DISABLED; ?> />
                                                <label id="val_fecha" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Tipo Nota</label>
                                                <input type="hidden" class="form-control" placeholder="TNOTA" id="TNOTAE" name="TNOTAE" value="<?php echo $TNOTA; ?>" />
                                                <select class="form-control select2" id="TNOTA" name="TNOTA" style="width: 100%;" <?php echo $DISABLED; ?>   <?php echo $DISABLED3; ?>>
                                                    <option></option>
                                                    <option value="1" <?php if ($TNOTA == "1") {  echo "selected";  } ?>> Debito</option>
                                                    <option value="2" <?php if ($TNOTA == "2") { echo "selected";  } ?>> Credito</option>
                                                </select>
                                                <label id="val_tnota" class="validacion"> </label>
                                            </div>
                                        </div>                                                    
                                        <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Instructivo Carga</label>
                                                    <input type="hidden" class="form-control" placeholder="ICARGADE" id="ICARGADE" name="ICARGADE" value="<?php echo $ICARGAD; ?>" />
                                                    <select class="form-control select2" id="ICARGAD" name="ICARGAD" style="width: 100%;" onchange="this.form.submit()" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYICARGA as $r) : ?>
                                                            <?php if ($ARRAYICARGA) {    ?>
                                                                <option value="<?php echo $r['ID_ICARGA']; ?>" <?php if ($ICARGAD == $r['ID_ICARGA']) {  echo "selected";  } ?>>
                                                                    <?php echo $r['NUMERO_ICARGA'] ?> : <?php echo $r['NREFERENCIA_ICARGA'] ?> 
                                                                </option>
                                                            <?php } else { ?>
                                                                <option value="0">No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                <label id="val_icarga" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Recibidor Final</label>
                                                    <input type="hidden" class="form-control" placeholder="RFINALE" id="RFINALE" name="RFINALE" value="<?php echo $RFINAL; ?>" />
                                                    <select class="form-control select2" id="RFINAL" name="RFINAL" style="width: 100%;" <?php echo $DISABLED; ?> disabled>
                                                        <option></option>
                                                        <?php foreach ($ARRAYRFINAL as $r) : ?>
                                                            <?php if ($ARRAYRFINAL) {    ?>
                                                                <option value="<?php echo $r['ID_RFINAL']; ?>" <?php if ($RFINAL == $r['ID_RFINAL']) { echo "selected"; } ?>>
                                                                    <?php echo $r['NOMBRE_RFINAL'] ?>
                                                                </option>
                                                            <?php } else { ?>
                                                                <option value="0">No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_rfinal" class="validacion"> </label>
                                                </div>
                                            </div>
                                        <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Consignatario</label>
                                                <input type="hidden" class="form-control" placeholder="CONSIGNATARIO" id="CONSIGNATARIOE" name="CONSIGNATARIOE" value="<?php echo $CONSIGNATARIO; ?>" />
                                                    <select class="form-control select2" id="CONSIGNATARIO" name="CONSIGNATARIO" style="width: 100%;" disabled>
                                                    <option></option>
                                                    <?php foreach ($ARRAYCONSIGNATARIO as $r) : ?>
                                                    <?php if ($ARRAYCONSIGNATARIO) {    ?>
                                                        <option value="<?php echo $r['ID_CONSIGNATARIO']; ?>" <?php if ($CONSIGNATARIO == $r['ID_CONSIGNATARIO']) { echo "selected"; } ?>>
                                                            <?php echo $r['NOMBRE_CONSIGNATARIO'] ?>
                                                        </option>
                                                    <?php } else { ?>
                                                        <option value="0">No Hay Datos Registrados </option>
                                                    <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_consignatario" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>BKN/AWF/CRT</label>
                                                <input type="hidden" class="form-control" placeholder="BOOKINGINSTRUCTIVOE" id="BOOKINGINSTRUCTIVOE" name="BOOKINGINSTRUCTIVOE" value="<?php echo $BOOKINGINSTRUCTIVO; ?>" />
                                                <input type="text" class="form-control"  placeholder="BKN/AWF/CRT" id="BOOKINGINSTRUCTIVO" name="BOOKINGINSTRUCTIVO" value="<?php echo $BOOKINGINSTRUCTIVO; ?>" disabled/>
                                                <label id="val_booking" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha ETD</label>
                                                <input type="hidden" class="form-control" placeholder="FECHA ETD" id="FECHAETDE" name="FECHAETDE" value="<?php echo $FECHAETD; ?>" />
                                                <input type="date" class="form-control"  placeholder="Fecha  ETD" id="FECHAETD" name="FECHAETD" value="<?php echo $FECHAETD; ?>" disabled/>
                                                <label id="val_fechaetd" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha ETA</label>
                                                <input type="hidden" class="form-control" placeholder="FECHA PROCESO" id="FECHAETAE" name="FECHAETAE" value="<?php echo $FECHAETA; ?>" />
                                                <input type="date" class="form-control"  placeholder="Fecha ETA" id="FECHAETA" name="FECHAETA" value="<?php echo $FECHAETA; ?>" disabled/>
                                                <label id="val_fechaeta" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>BOL/AWB/CRT </label>
                                                <input type="hidden" class="form-control" placeholder="BOLAWBCRTINSTRUCTIVOE" id="BOLAWBCRTINSTRUCTIVOE" name="BOLAWBCRTINSTRUCTIVOE" value="<?php echo $BOLAWBCRTINSTRUCTIVO; ?>" />
                                                <input type="text" class="form-control" placeholder="BOL/AWB/CRT Instructivo" id="BOLAWBCRTINSTRUCTIVO" name="BOLAWBCRTINSTRUCTIVO" value="<?php echo $BOLAWBCRTINSTRUCTIVO; ?>" disabled/>
                                                <label id="val_bolawbcrt" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <?php if ($TEMBARQUE == "1") { ?>
                                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Transporte</label>
                                                    <input type="hidden" class="form-control" placeholder="TRANSPORTEE" id="TRANSPORTEE" name="TRANSPORTEE" value="<?php echo $TRANSPORTE; ?>" />
                                                    <select class="form-control select2" id="TRANSPORTE" name="TRANSPORTE" style="width: 100%;" disabled>
                                                    <option></option>
                                                    <?php foreach ($ARRAYTRANSPORTE as $r) : ?>
                                                    <?php if ($ARRAYTRANSPORTE) {    ?>
                                                        <option value="<?php echo $r['ID_TRANSPORTE']; ?>" <?php if ($TRANSPORTE == $r['ID_TRANSPORTE']) {  echo "selected";  } ?>>
                                                            <?php echo $r['NOMBRE_TRANSPORTE'] ?>
                                                        </option>
                                                    <?php } else { ?>
                                                        <option value="0">No Hay Datos Registrados </option>
                                                    <?php } ?>
                                                    <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_transporte" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Lugar Carga</label>
                                                    <input type="hidden" class="form-control" placeholder="LCARGAE" id="LCARGAE" name="LCARGAE" value="<?php echo $LCARGA; ?>" />
                                                    <select class="form-control select2" id="LCARGA" name="LCARGA" style="width: 100%;" disabled>
                                                    <option></option>
                                                    <?php foreach ($ARRAYLCARGA as $r) : ?>
                                                    <?php if ($ARRAYLCARGA) {    ?>
                                                        <option value="<?php echo $r['ID_LCARGA']; ?>" <?php if ($LCARGA == $r['ID_LCARGA']) {  echo "selected";  } ?>>
                                                            <?php echo $r['NOMBRE_LCARGA'] ?>
                                                        </option>
                                                    <?php } else { ?>
                                                        <option value="0">No Hay Datos Registrados </option>
                                                    <?php } ?>
                                                    <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_lcarga" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Lugar Destino</label>
                                                    <input type="hidden" class="form-control" placeholder="LDESTINOE" id="LDESTINOE" name="LDESTINOE" value="<?php echo $LDESTINO; ?>" />
                                                    <select class="form-control select2" id="LDESTINO" name="LDESTINO" style="width: 100%;" disabled>
                                                    <option></option>
                                                    <?php foreach ($ARRAYLDESTINO  as $r) : ?>
                                                    <?php if ($ARRAYLDESTINO) {    ?>
                                                                            <option value="<?php echo $r['ID_LDESTINO']; ?>" <?php if ($LDESTINO == $r['ID_LDESTINO']) {  echo "selected"; } ?>>
                                                    <?php echo $r['NOMBRE_LDESTINO'] ?>
                                                        </option>
                                                    <?php } else { ?>
                                                        <option value="0">No Hay Datos Registrados </option>
                                                    <?php } ?>
                                                    <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_ldestino" class="validacion"> </label>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if ($TEMBARQUE == "2") { ?>
                                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Linea Aerea</label>
                                                    <input type="hidden" class="form-control" placeholder="LAEREAE" id="LAEREAE" name="LAEREAE" value="<?php echo $LAEREA; ?>" />
                                                    <select class="form-control select2" id="LAEREA" name="LAEREA" style="width: 100%;" disabled>
                                                        <option></option>
                                                        <?php foreach ($ARRAYLAEREA as $r) : ?>
                                                        <?php if ($ARRAYLAEREA) {    ?>
                                                            <option value="<?php echo $r['ID_LAEREA']; ?>" <?php if ($LAEREA == $r['ID_LAEREA']) { echo "selected"; } ?>>
                                                                <?php echo $r['NOMBRE_LAEREA'] ?>
                                                            </option>
                                                        <?php } else { ?>
                                                            <option value="0">No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_larea" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Aeropuerto Carga</label>
                                                    <input type="hidden" class="form-control" placeholder="ACARGAE" id="ACARGAE" name="ACARGAE" value="<?php echo $ACARGA; ?>" />
                                                    <select class="form-control select2" id="ACARGA" name="ACARGA" style="width: 100%;" disabled>
                                                        <option></option>
                                                        <?php foreach ($ARRAYACARGA as $r) : ?>
                                                        <?php if ($ARRAYACARGA) {    ?>
                                                            <option value="<?php echo $r['ID_ACARGA']; ?>" <?php if ($ACARGA == $r['ID_ACARGA']) {   echo "selected"; } ?>>
                                                                <?php echo $r['NOMBRE_ACARGA'] ?>
                                                            </option>
                                                        <?php } else { ?>
                                                            <option value="0">No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_acarga" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Aeropuerto Destino</label>
                                                    <input type="hidden" class="form-control" placeholder="ADESTINOE" id="ADESTINOE" name="ADESTINOE" value="<?php echo $ADESTINO; ?>" />
                                                    <select class="form-control select2" id="ADESTINO" name="ADESTINO" style="width: 100%;" disabled>
                                                        <option></option>
                                                        <?php foreach ($ARRAYADESTINO as $r) : ?>
                                                        <?php if ($ARRAYADESTINO) {    ?>
                                                            <option value="<?php echo $r['ID_ADESTINO']; ?>" <?php if ($ADESTINO == $r['ID_ADESTINO']) {  echo "selected";  } ?>>
                                                                <?php echo $r['NOMBRE_ADESTINO'] ?>
                                                            </option>
                                                        <?php } else { ?>
                                                            <option value="0">No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_adestino" class="validacion"> </label>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if ($TEMBARQUE == "3") { ?>
                                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Naviera </label>
                                                    <input type="hidden" class="form-control" placeholder="NAVIERAE" id="NAVIERAE" name="NAVIERAE" value="<?php echo $NAVIERA; ?>" />
                                                    <select class="form-control select2" id="NAVIERA" name="NAVIERA" style="width: 100%;" disabled>
                                                        <option></option>
                                                        <?php foreach ($ARRAYNAVIERA as $r) : ?>
                                                        <?php if ($ARRAYNAVIERA) {    ?>
                                                            <option value="<?php echo $r['ID_NAVIERA']; ?>" <?php if ($NAVIERA == $r['ID_NAVIERA']) { echo "selected";   } ?>>
                                                                <?php echo $r['NOMBRE_NAVIERA'] ?>
                                                            </option>
                                                        <?php } else { ?>
                                                            <option value="0">No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_naviera" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Puerto Carga</label>
                                                    <input type="hidden" class="form-control" placeholder="PCARGAE" id="PCARGAE" name="PCARGAE" value="<?php echo $PCARGA; ?>" />
                                                    <select class="form-control select2" id="PCARGA" name="PCARGA" style="width: 100%;" disabled>
                                                        <option></option>
                                                        <?php foreach ($ARRAYPCARGA as $r) : ?>
                                                        <?php if ($ARRAYPCARGA) {    ?>
                                                            <option value="<?php echo $r['ID_PCARGA']; ?>" <?php if ($PCARGA == $r['ID_PCARGA']) {
                                                                                                                                echo "selected";
                                                                                                                            } ?>>
                                                        <?php echo $r['NOMBRE_PCARGA'] ?>
                                                            </option>
                                                        <?php } else { ?>
                                                            <option value="0">No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_pcarga" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Puerto Destino</label>
                                                    <input type="hidden" class="form-control" placeholder="PDESTINOE" id="PDESTINOE" name="PDESTINOE" value="<?php echo $PDESTINO; ?>" />
                                                    <select class="form-control select2" id="PDESTINO" name="PDESTINO" style="width: 100%;" disabled>
                                                        <option></option>
                                                        <?php foreach ($ARRAYPDESTINO as $r) : ?>
                                                        <?php if ($ARRAYPDESTINO) {    ?>
                                                            <option value="<?php echo $r['ID_PDESTINO']; ?>" <?php if ($PDESTINO == $r['ID_PDESTINO']) {  echo "selected"; } ?>>
                                                        <?php echo $r['NOMBRE_PDESTINO'] ?>
                                                            </option>
                                                        <?php } else { ?>
                                                            <option value="0">No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_pdestino" class="validacion"> </label>
                                                </div>
                                            </div>
                                        <?php } ?>
                                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Forma Pago</label>
                                                <input type="hidden" class="form-control" placeholder="FPAGOE" id="FPAGOE" name="FPAGOE" value="<?php echo $FPAGO; ?>" />
                                                <select class="form-control select2" id="FPAGO" name="FPAGO" style="width: 100%;" disabled >
                                                    <option></option>
                                                    <?php foreach ($ARRAYFPAGO as $r) : ?>
                                                    <?php if ($ARRAYFPAGO) {    ?>
                                                                        <option value="<?php echo $r['ID_FPAGO']; ?>" <?php if ($FPAGO == $r['ID_FPAGO']) {
                                                                                                                            echo "selected";
                                                                                                                        } ?>>
                                                            <?php echo $r['NOMBRE_FPAGO'] ?>
                                                        </option>
                                                    <?php } else { ?>
                                                        <option value="0">No Hay Datos Registrados </option>
                                                    <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_fpago" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>FDA </label>
                                                <input type="hidden" class="form-control" placeholder="FDA" id="FDA" name="FDA" value="<?php echo $FDA; ?>" />
                                                <input type="text" class="form-control" placeholder="FDA" id="FDAE" name="FDAE" value="<?php echo $FDA; ?>" disabled style='background-color: #eeeeee;' />
                                                <label id=" val_fda" class="validacion"> </label>
                                            </div>
                                        </div>                                                    
                                    </div>
                                    <div class="row">
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" placeholder="OBSERVACION PROCESO" id="OBSERVACIONINOTAE" name="OBSERVACIONINOTAE" value="<?php echo $OBSERVACIONINOTA; ?>" />
                                                <label>Motivo Nota </label>
                                                <textarea class="form-control" rows="1"  placeholder="Ingrese Motivo e Observacion  " id="OBSERVACIONINOTA" name="OBSERVACIONINOTA" <?php echo $DISABLED; ?>><?php echo $OBSERVACIONINOTA; ?></textarea>
                                                <label id="val_observacion" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                
                                <div class="box-footer">
                                    <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="toolbar">
                                        <div class="btn-group  col-xxl-4 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12" role="group" aria-label="Acciones generales">
                                            <?php if ($OP == "") { ?>
                                                <button type="button" class="btn btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroNotadc.php');">
                                                    <i class="ti-trash"></i> Cancelar
                                                </button>
                                                <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Crear" name="CREAR" value="CREAR"   onclick="return validacion()">
                                                    <i class="ti-save-alt"></i> Crear
                                                </button>
                                            <?php } ?>
                                            <?php if ($OP != "") { ?>
                                                <button type="button" class="btn  btn-success " data-toggle="tooltip" title="Volver" name="VOLVER" value="VOLVER" Onclick="irPagina('listarNotadc.php'); ">
                                                    <i class="ti-back-left "></i> Volver
                                                </button>
                                                <button type="submit" class="btn btn-warning " data-toggle="tooltip" title="Guardar" name="EDITAR" value="EDITAR"    <?php echo $DISABLED2; ?> onclick="return validacion()">
                                                    <i class="ti-pencil-alt"></i> Guardar
                                                </button>
                                                <button type="submit" class="btn btn-danger " data-toggle="tooltip" title="Cerrar" name="CERRAR" value="CERRAR"  <?php echo $DISABLED2; ?> onclick="return validacion()">
                                                    <i class="ti-save-alt"></i> Cerrar
                                                </button>
                                            <?php } ?>
                                        </div>
                                        <div class="btn-group  col-xxl-4 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12  float-right">
                                            <?php if ($OP != ""): ?>
                                                <button type="button" class="btn btn-info  " data-toggle="tooltip" title="Informe" id="defecto" name="tarjas" Onclick="abrirPestana('../../assest/documento/informeNotadc.php?parametro=<?php echo $IDOP; ?>&&usuario=<?php echo $IDUSUARIOS; ?>');">
                                                    <i class="fa fa-file-pdf-o"></i> Informe
                                                </button>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>                   
                        <!--.row -->
                        
                        <?php if (isset($_GET['op'])): ?>
                            <div class="card">                            
                                <div class="card-header bg-info">
                                    <h4 class="card-title">Detalle de Nota</h4>
                                </div>
                                <div class="card-header">
                                    <div class="form-row align-items-center">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="table-responsive">
                                                <table id="detalle" class=" table-hover " style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">Operaciónes</th>
                                                            <th>Estandar </th>
                                                            <th>Cantidad Envase </th>
                                                            <th>Kilo Neto </th>
                                                            <th>Kilo Bruto </th>
                                                            <th>Calibre </th>     
                                                            <th>Detalle Nota  </th>
                                                            <th>Tipo Moneda </th>         
                                                            <th>Total  </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if ($ARRAYDCARGA) { ?>
                                                            <?php foreach ($ARRAYDCARGA as $s) : ?>
                                                                <?php
                                                                $ARRAYEEXPORTACION = $EEXPORTACION_ADO->verEstandar($s['ID_ESTANDAR']);
                                                                if ($ARRAYEEXPORTACION) {
                                                                    $NOMBREESTANTAR = $ARRAYEEXPORTACION[0]['NOMBRE_ESTANDAR'];
                                                                } else {
                                                                    $NOMBREESTANTAR = "Sin Datos";
                                                                }
                                                                $ARRAYCALIBRE = $TCALIBRE_ADO->verCalibre($s['ID_TCALIBRE']);
                                                                if ($ARRAYCALIBRE) {
                                                                    $NOMBRECALIBRE = $ARRAYCALIBRE[0]['NOMBRE_TCALIBRE'];
                                                                } else {
                                                                    $NOMBRECALIBRE = "Sin Datos";
                                                                }
                                                                $ARRAYTMONEDA = $TMONEDA_ADO->verTmoneda($s['ID_TMONEDA']);
                                                                if ($ARRAYTMONEDA) {
                                                                    $NOMBRETMONEDA = $ARRAYTMONEDA[0]['NOMBRE_TMONEDA'];
                                                                } else {
                                                                    $NOMBRETMONEDA = "Sin Datos";
                                                                }
                                                                $ARRAYDNOTA=$DNOTADC_ADO->buscarPorNotaDicarga($IDOP,$s['ID_DICARGA']);
                                                                if($ARRAYDNOTA){
                                                                    $CANTIDADDNOTA=$ARRAYDNOTA[0]["CANTIDAD"];
                                                                    $TOTALNUEVO=$ARRAYDNOTA[0]['TOTAL'];                                                               
                                                                    $NOTA=$ARRAYDNOTA[0]['NOTA'];
                                                                }else{
                                                                    $CANTIDADDNOTA="Sin Datos";
                                                                    $NOTA="Sin Datos";
                                                                    $TOTALNUEVO="Sin Datos";
                                                                }
                                                                ?>
                                                                <tr class="center">
                                                                    <td>
                                                                        <form method="post" id="form1">
                                                                            <input type="hidden" class="form-control" placeholder="ID DRECEPCIONE" id="IDD" name="IDD" value="<?php echo $s['ID_DICARGA']; ?>" />
                                                                            <input type="hidden" class="form-control" placeholder="ID RECEPCIONE" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                                                            <input type="hidden" class="form-control" placeholder="OP RECEPCIONE" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                                                            <input type="hidden" class="form-control" placeholder="URL RECEPCIONE" id="URLP" name="URLP" value="registroNotadc" />
                                                                            <input type="hidden" class="form-control" placeholder="URL DRECEPCIONE" id="URLD" name="URLD" value="registroDnotadc" />
                                                                            <div class="btn-group btn-rounded  btn-block" role="group" aria-label="Operaciones Detalle">
                                                                                <?php if ($ESTADO == "0") { ?>
                                                                                    <button type="submit" class="btn btn-info btn-sm  " id="VERDURL" name="VERDURL" data-toggle="tooltip" title="Ver Valor NC/ND  ">
                                                                                        <i class="ti-eye"></i> <br>Ver 
                                                                                    </button>
                                                                                <?php } ?>
                                                                                <?php if ($ESTADO == "1") { ?>                                                                                    
                                                                                     <?php if ( empty($ARRAYDNOTA)) { ?>
                                                                                        <button type="submit" class="btn   btn-success  btn-sm" id="DUPLICARDURL" name="DUPLICARDURL" data-toggle="tooltip" title="Agregar Valor NC/ND " >
                                                                                            <i class="ti-plus"></i> <br> Agregar 
                                                                                        </button>
                                                                                    <?php }else{ ?>
                                                                                        <button type="submit" class="btn btn-warning btn-sm " id="EDITARDURL" name="EDITARDURL" data-toggle="tooltip" title="Editar Valor NC/ND " >
                                                                                            <i class="ti-pencil-alt"></i><br> Editar 
                                                                                        </button>
                                                                                        <button type="submit" class="btn btn-danger btn-sm" id="ELIMINARDURL" name="ELIMINARDURL" data-toggle="tooltip" title="Eliminar Valor NC/ND  ">
                                                                                            <i class="ti-close"></i> <br>Eliminar 
                                                                                        </button>
                                                                                    <?php } ?>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </form>
                                                                    </td>
                                                                    <td><?php echo $NOMBREESTANTAR; ?></td>
                                                                    <td><?php echo $s['CANTIDAD_ENVASE_DICARGA']; ?></td>
                                                                    <td><?php echo $s['KILOS_NETO_DICARGA']; ?></td>
                                                                    <td><?php echo $s['KILOS_BRUTO_DICARGA']; ?></td>
                                                                    <td><?php echo $NOMBRECALIBRE; ?></td>
                                                                    <td><?php echo $NOTA; ?></td>
                                                                    <td><?php echo $NOMBRETMONEDA; ?></td>
                                                                    <td><?php echo $TOTALNUEVO; ?></td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
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

                $ARRAYNUMERO = $NOTADC_ADO->obtenerNumero($_REQUEST['EMPRESA'],  $_REQUEST['TEMPORADA']);
                $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;

                $NOTADC->__SET('NUMERO_NOTA', $NUMERO);
                $NOTADC->__SET('FECHA_NOTA', $_REQUEST['FECHANOTA']);
                $NOTADC->__SET('TNOTA', $_REQUEST['TNOTA']);
                $NOTADC->__SET('OBSERVACIONES', $_REQUEST['OBSERVACIONINOTA']);
                $NOTADC->__SET('ID_ICARGA', $_REQUEST['ICARGAD']);
                $NOTADC->__SET('ID_EMPRESA',  $_REQUEST['EMPRESA']);
                $NOTADC->__SET('ID_TEMPORADA',  $_REQUEST['TEMPORADA']);
                $NOTADC->__SET('ID_USUARIOI', $IDUSUARIOS);
                $NOTADC->__SET('ID_USUARIOM', $IDUSUARIOS);
                //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                $NOTADC_ADO->agregarNota($NOTADC);

                $ARRYAOBTENERID = $NOTADC_ADO->obtenerId(
                    $_REQUEST['FECHANOTA'],
                    $_REQUEST['EMPRESA'],
                    $_REQUEST['TEMPORADA'],

                );
                $AUSUARIO_ADO->agregarAusuario2($NUMERO,1,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Nota D/C","fruta_notadc",$ARRYAOBTENERID[0]['ID_NOTA'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],$_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );
                //REDIRECCIONAR A PAGINA registroNotadc.php
                
                $id_dato = $ARRYAOBTENERID[0]['ID_NOTA'];
                $accion_dato = "crear";
                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Creado",
                        text:"El registro de nota se ha creado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroNotadc.php?op&id='.$id_dato.'&a='.$accion_dato.'";                        
                    })
                </script>';
            }             
            if (isset($_REQUEST['EDITAR'])) {                
                $NOTADC->__SET('FECHA_NOTA', $_REQUEST['FECHANOTA']);
                $NOTADC->__SET('TNOTA', $_REQUEST['TNOTAE']);
                $NOTADC->__SET('OBSERVACIONES', $_REQUEST['OBSERVACIONINOTA']);
                $NOTADC->__SET('ID_ICARGA', $_REQUEST['ICARGADE']);
                $NOTADC->__SET('ID_USUARIOM', $IDUSUARIOS);
                $NOTADC->__SET('ID_NOTA', $_REQUEST['IDP']);
                //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                $NOTADC_ADO->actualizarNota($NOTADC);                   
                $AUSUARIO_ADO->agregarAusuario2($NUMEROVER,1,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de Nota D/C","fruta_notadc",$_REQUEST['IDP'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],$_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );
                
                 if ($accion_dato == "crear") {
                    $id_dato = $_REQUEST['IDP'];
                    $accion_dato = "crear";
                    echo '<script>
                        Swal.fire({
                            icon:"info",
                            title:"Registro Modificado",
                            text:"El registro de nota se ha modificada correctamente",
                            showConfirmButton: true,
                            confirmButtonText:"Cerrar",
                            closeOnConfirm:false
                        }).then((result)=>{
                            location.href = "registroNotadc.php?op&id='.$id_dato.'&a='.$accion_dato.'";                        
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
                            text:"El registro de nota se ha modificada correctamente",
                            showConfirmButton: true,
                            confirmButtonText:"Cerrar",
                            closeOnConfirm:false
                        }).then((result)=>{
                            location.href = "registroNotadc.php?op&id='.$id_dato.'&a='.$accion_dato.'";                        
                        })
                    </script>';
                }

                
            }    
            if (isset($_REQUEST['CERRAR'])) {

                $ARRAYDNOTA=$DNOTADC_ADO->buscarPorNota($_REQUEST['IDP']);
                if ($ARRAYDNOTA) {
                    $SINO = "0";

                    $ARRAYDNOTACONTEO=$DNOTADC_ADO->contarPorValor($_REQUEST['IDP']);
                    $ARRAYDICARGACONTEO=$DICARGA_ADO->conteoPorIcarga($_REQUEST['ICARGADE']);
                    if($ARRAYDNOTACONTEO[0]["CONTEO"]>0 && $ARRAYDICARGACONTEO[0]["CONTEO"]>0){
                        if($ARRAYDNOTACONTEO[0]["CONTEO"]!=$ARRAYDICARGACONTEO[0]["CONTEO"]){
                            $SINO = "1";            
                             echo '<script>
                                    Swal.fire({
                                        icon:"warning",
                                        title:"Accion restringida",
                                        text:"Todos los item del detalle debe contener un valor.",
                                        showConfirmButton: true,
                                        confirmButtonText:"Cerrar",
                                        closeOnConfirm:false
                                    })
                                </script>';   

                        }else{                            
                            $SINO = "0";
                        }
                    }
                } else {
                    $SINO = "1";       
                    echo '<script>
                            Swal.fire({
                                icon:"warning",
                                title:"Accion restringida",
                                text:"En el detalle tiene haber al menos uno con cantidad",
                                showConfirmButton: true,
                                confirmButtonText:"Cerrar",
                                closeOnConfirm:false
                            })
                        </script>';         
                }
                if ($SINO == "0") {
                    $NOTADC->__SET('FECHA_NOTA', $_REQUEST['FECHANOTA']);
                    $NOTADC->__SET('TNOTA', $_REQUEST['TNOTAE']);
                    $NOTADC->__SET('OBSERVACIONES', $_REQUEST['OBSERVACIONINOTA']);
                    $NOTADC->__SET('ID_ICARGA', $_REQUEST['ICARGADE']);
                    $NOTADC->__SET('ID_USUARIOM', $IDUSUARIOS);
                    $NOTADC->__SET('ID_NOTA', $_REQUEST['IDP']);
                    //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                    $NOTADC_ADO->actualizarNota($NOTADC);           

                    $NOTADC->__SET('ID_NOTA', $_REQUEST['IDP']);
                    //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                    $NOTADC_ADO->cerrado($NOTADC);

                   $AUSUARIO_ADO->agregarAusuario2($NUMEROVER,1,3,"".$_SESSION["NOMBRE_USUARIO"].", Cerrar  Nota D/C","fruta_notadc",$_REQUEST['IDP'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],$_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );
                
                    //REDIRECCIONAR A PAGINA registroNotadc.php 
                    //SEGUNE EL TIPO DE OPERACIONS QUE SE INDENTIFIQUE EN LA URL
                    
                    if ($accion_dato == "crear") {
                        $id_dato = $_REQUEST['IDP'];
                        $accion_dato = "ver";
                        echo '<script>
                            Swal.fire({
                                icon:"info",
                                title:"Registro Cerrado",
                                text:"Este nota se encuentra cerrada y no puede ser modificada.",
                                showConfirmButton: true,
                                confirmButtonText:"Cerrar",
                                closeOnConfirm:false
                            }).then((result)=>{
                                location.href = "registroNotadc.php?op&id='.$id_dato.'&a='.$accion_dato.'";                            
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
                                text:"Este nota se encuentra cerrada y no puede ser modificada.",
                                showConfirmButton: true,
                                confirmButtonText:"Cerrar",
                                closeOnConfirm:false
                            }).then((result)=>{
                                location.href = "registroNotadc.php?op&id='.$id_dato.'&a='.$accion_dato.'";                            
                            })
                        </script>';
                    } 
                }
            }
        ?>
</body>

</html>