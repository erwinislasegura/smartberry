<?php
include_once "../../assest/config/validarUsuarioFruta.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/ESPECIES_ADO.php';
include_once '../../assest/controlador/VESPECIES_ADO.php';
include_once '../../assest/controlador/TMANEJO_ADO.php';
include_once '../../assest/controlador/FOLIO_ADO.php';

include_once '../../assest/controlador/EEXPORTACION_ADO.php';


include_once '../../assest/controlador/LEVANTAMIENTOPT_ADO.php';
include_once '../../assest/controlador/REAPT_ADO.php';
include_once '../../assest/controlador/EXIEXPORTACION_ADO.php';
include_once '../../assest/controlador/EXIINDUSTRIAL_ADO.php';


include_once '../../assest/modelo/LEVANTAMIENTOPT.php';
include_once '../../assest/modelo/REAPT.php';
include_once '../../assest/modelo/EXIEXPORTACION.php';
include_once '../../assest/modelo/EXIINDUSTRIAL.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$ESPECIES_ADO =  new ESPECIES_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$TMANEJO_ADO =  new TMANEJO_ADO();
$FOLIO_ADO =  new FOLIO_ADO();

$EEXPORTACION_ADO =  new EEXPORTACION_ADO();

$EXIEXPORTACION_ADO =  new EXIEXPORTACION_ADO();
$EXIINDUSTRIAL_ADO =  new EXIINDUSTRIAL_ADO();
$LEVANTAMIENTOPT_ADO =  new LEVANTAMIENTOPT_ADO();
$REAPT_ADO =  new REAPT_ADO();
//INIICIALIZAR MODELO

$LEVANTAMIENTOPT =  new LEVANTAMIENTOPT();
$REAPT =  new REAPT();
$EXIEXPORTACION =  new EXIEXPORTACION();
$EXIINDUSTRIAL =  new EXIINDUSTRIAL();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD


$IDQUITAR = "";
$FOLIOEXIMATERIAPRIMAQUITAR = "";

$NUMERO = "";
$NUMEROVER = "";
$IDLEVANTAMIENTO = "";
$FECHALEVANTAMIENTO = "";
$FECHAINGRESO = "";
$FECHAMODIFCIACION = "";

$TLEVANTAMIENTO = "";
$RESPONSBALE = "";
$MOTIVO = "";
$PRODUCTOR = "";
$VESPECIES = "";
$ESTADO = "";
$TLEVANTAMIENTOCOLOR="";


$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";

$TOTALBRUTO="0";
$TOTALNETO="0";
$TOTALENVASE="0";
$TOTALBRUTOV="0";
$TOTALNETOV="0";
$TOTALENVASEV="0";



$DISABLED = "";
$DISABLED2 = "";
$DISABLED3 = "";
$DISABLEDSTYLE = "";
$DISABLEDFOLIO = "";
$MENSAJEFOLIO = "";

$MENSAJE = "";
$MENSAJEEXISTENCIA = "";

$IDOP = "";
$OP = "";
$SINO = "";

//INICIALIZAR ARREGLOS



$ARRAYVESPECIES = "";
$ARRAYPRODUCTOR = "";
$ARRAYVESPECIES = "";


$ARRAYLEVANTAMIENTOMP = "";
$ARRAYEXIEXPORTACIONTOMADO = "";
$ARRAYEXIEXPORTACION = "";
$ARRAYFECHAACTUAL = "";
$ARRAYNUMERO = "";



//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
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
//FOLIO EXPORTACION

$ARRAYPRODUCTOR = $PRODUCTOR_ADO->listarProductorPorEmpresaCBX($EMPRESAS);
$ARRAYVESPECIES = $VESPECIES_ADO->listarVespeciesPorEmpresaCBX($EMPRESAS);
$ARRAYFECHAACTUAL = $LEVANTAMIENTOPT_ADO->obtenerFecha();
$FECHALEVANTAMIENTO = $ARRAYFECHAACTUAL[0]['FECHA'];

$ARRAYFOLIO = $FOLIO_ADO->verFolioPorEmpresaPlantaTemporadaTexportacion($EMPRESAS, $PLANTAS, $TEMPORADAS);
$ARRAYFOLIO2 = $FOLIO_ADO->verFolioPorEmpresaPlantaTemporadaTindustrial($EMPRESAS, $PLANTAS, $TEMPORADAS);

include_once "../../assest/config/validarDatosUrl.php";
include_once "../../assest/config/datosUrlD.php";


if (empty($ARRAYFOLIO)) {
    $DISABLEDFOLIO = "disabled";
    $MENSAJEFOLIO = " NECESITA <b> CREAR LOS FOLIOS PT </b> , PARA OCUPAR LA <b>  FUNCIONALIDAD </b>.  FAVOR DE <b> CONTACTARSE CON EL ADMINISTRADOR </b>";
}
if (empty($ARRAYFOLIO2)) {
    $DISABLEDFOLIO = "disabled";
    $MENSAJEFOLIO = $MENSAJEFOLIO . "<br> NECESITA <b> CREAR LOS FOLIOS INDUSTRIAL </b> , PARA OCUPAR LA <b>  FUNCIONALIDAD </b>.  FAVOR DE <b> CONTACTARSE CON EL ADMINISTRADOR </b>";
}
//OPERACIONES

//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION , VISUALIZACION Y CREACION
if (isset($id_dato) && isset($accion_dato)) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $id_dato;
    $OP = $accion_dato;

    //OBTENECION DE INFORMACION DE LA TABLAS DE LA VISTA    
    $ARRAYTOMADA = $EXIEXPORTACION_ADO->verExistenciaPorLevantamiento($IDOP);

    //OBTENCIONS DE TOTALES O EL RESUMEN DE LAS TABLAS
    $ARRAYEXISTENCIAMPTOTAL = $EXIEXPORTACION_ADO->obtenerTotalesLevantamiento($IDOP);
    $ARRAYEXISTENCIAMPTOTAL2 = $EXIEXPORTACION_ADO->obtenerTotalesLevantamiento2($IDOP);


    $TOTALENVASE = $ARRAYEXISTENCIAMPTOTAL[0]['ENVASE'];
    $TOTALENVASEV = $ARRAYEXISTENCIAMPTOTAL2[0]['ENVASE'];

    $TOTALNETO = $ARRAYEXISTENCIAMPTOTAL[0]['NETO'];
    $TOTALNETOV = $ARRAYEXISTENCIAMPTOTAL2[0]['NETO'];

    $TOTALBRUTO = $ARRAYEXISTENCIAMPTOTAL[0]['BRUTO'];
    $TOTALBRUTOV = $ARRAYEXISTENCIAMPTOTAL2[0]['BRUTO'];

    //die('3');
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
        $ARRAYLEVANTAMIENTOMP = $LEVANTAMIENTOPT_ADO->verLevantamiento($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYLEVANTAMIENTOMP as $r) :
            $IDLEVANTAMIENTO = $IDOP;
            $NUMEROVER = "" . $r['NUMERO_LEVANTAMIENTO'];
            $FECHALEVANTAMIENTO = "" . $r['FECHA_LEVANTAMIENTO'];
            $TLEVANTAMIENTO = "" . $r['TLEVANTAMIENTO'];
            if($TLEVANTAMIENTO==1){
                $TLEVANTAMIENTOCOLOR="badge badge-danger ";
            }else if($TLEVANTAMIENTO==2){
                $TLEVANTAMIENTOCOLOR="badge badge-warning ";
            }else if($TLEVANTAMIENTO==3){
                $TLEVANTAMIENTOCOLOR="badge badge-success ";
            }else{
                $TLEVANTAMIENTOCOLOR="";
            }
            $RESPONSBALE = "" . $r['RESPONSBALE_LEVANTAMIENTO'];
            $MOTIVO = "" . $r['MOTIVO_LEVANTAMIENTO'];            
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $VESPECIES = "" . $r['ID_VESPECIES'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $ESTADO = "" . $r['ESTADO'];
            $FECHAINGRESO = "" . $r['INGRESO'];
            $FECHAMODIFCIACION = "" . $r['MODIFICACION'];
        endforeach;
    }

    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {

        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL

        $DISABLED = "";
        $DISABLED2 = "";
        $DISABLED3 = "disabled";
        $DISABLEDMENU = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $ARRAYLEVANTAMIENTOMP = $LEVANTAMIENTOPT_ADO->verLevantamiento($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYLEVANTAMIENTOMP as $r) :
            $IDLEVANTAMIENTO = $IDOP;
            $NUMEROVER = "" . $r['NUMERO_LEVANTAMIENTO'];
            $FECHALEVANTAMIENTO = "" . $r['FECHA_LEVANTAMIENTO'];
            $TLEVANTAMIENTO = "" . $r['TLEVANTAMIENTO'];
            if($TLEVANTAMIENTO==1){
                $TLEVANTAMIENTOCOLOR="badge badge-danger ";
            }else if($TLEVANTAMIENTO==2){
                $TLEVANTAMIENTOCOLOR="badge badge-warning ";
            }else if($TLEVANTAMIENTO==3){
                $TLEVANTAMIENTOCOLOR="badge badge-success ";
            }else{
                $TLEVANTAMIENTOCOLOR="";
            }
            $RESPONSBALE = "" . $r['RESPONSBALE_LEVANTAMIENTO'];
            $MOTIVO = "" . $r['MOTIVO_LEVANTAMIENTO'];            
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $VESPECIES = "" . $r['ID_VESPECIES'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $ESTADO = "" . $r['ESTADO'];
            $FECHAINGRESO = "" . $r['INGRESO'];
            $FECHAMODIFCIACION = "" . $r['MODIFICACION'];

        endforeach;
    }

    //ver =  OBTENCION DE DATOS PARA LA VISUALIZACION DEL REGISTRO
    if ($OP == "ver") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION

        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        $DISABLED3 = "disabled";
        $DISABLEDMENU = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR  
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYLEVANTAMIENTOMP = $LEVANTAMIENTOPT_ADO->verLevantamiento($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYLEVANTAMIENTOMP as $r) :
            $IDLEVANTAMIENTO = $IDOP;
            $NUMEROVER = "" . $r['NUMERO_LEVANTAMIENTO'];
            $FECHALEVANTAMIENTO = "" . $r['FECHA_LEVANTAMIENTO'];
            $TLEVANTAMIENTO = "" . $r['TLEVANTAMIENTO'];
            if($TLEVANTAMIENTO==1){
                $TLEVANTAMIENTOCOLOR="badge badge-danger ";
            }else if($TLEVANTAMIENTO==2){
                $TLEVANTAMIENTOCOLOR="badge badge-warning ";
            }else if($TLEVANTAMIENTO==3){
                $TLEVANTAMIENTOCOLOR="badge badge-success ";
            }else{
                $TLEVANTAMIENTOCOLOR="";
            }
            $RESPONSBALE = "" . $r['RESPONSBALE_LEVANTAMIENTO'];
            $MOTIVO = "" . $r['MOTIVO_LEVANTAMIENTO'];            
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $VESPECIES = "" . $r['ID_VESPECIES'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $ESTADO = "" . $r['ESTADO'];
            $FECHAINGRESO = "" . $r['INGRESO'];
            $FECHAMODIFCIACION = "" . $r['MODIFICACION'];
        endforeach;
    }
}
//FECHARECHAZO PARA OBTENER LOS DATOS DEL FORMULARIO  Y MANTENERLO AL ACTUALIZACION QUE REALIZA EL SELECT DE PRODUCTOR
if (isset($_POST)) {
    if (isset($_REQUEST['FECHALEVANTAMIENTO'])) {
        $FECHALEVANTAMIENTO = $_REQUEST['FECHALEVANTAMIENTO'];
    }
    if (isset($_REQUEST['TLEVANTAMIENTO'])) {
        $TLEVANTAMIENTO = $_REQUEST['TLEVANTAMIENTO'];
    }
    if (isset($_REQUEST['PRODUCTOR'])) {
        $PRODUCTOR = $_REQUEST['PRODUCTOR'];
    }
    if (isset($_REQUEST['VESPECIES'])) {
        $VESPECIES = $_REQUEST['VESPECIES'];
    }
    if (isset($_REQUEST['RESPONSBALE'])) {
        $RESPONSBALE = $_REQUEST['RESPONSBALE'];
    }
    if (isset($_REQUEST['MOTIVO'])) {
        $MOTIVO = $_REQUEST['MOTIVO'];
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
    <title> Registrar Levantamiento PT</title>
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


                    FECHALEVANTAMIENTO = document.getElementById("FECHALEVANTAMIENTO").value;
                    TLEVANTAMIENTO = document.getElementById("TLEVANTAMIENTO").selectedIndex;
                    PRODUCTOR = document.getElementById("PRODUCTOR").selectedIndex;
                    VESPECIES = document.getElementById("VESPECIES").selectedIndex;
                    RESPONSBALE = document.getElementById("RESPONSBALE").value;
                    MOTIVO = document.getElementById("MOTIVO").value;

                    document.getElementById('val_fecha').innerHTML = "";
                    document.getElementById('val_tlevantamiento').innerHTML = "";
                    document.getElementById('val_productor').innerHTML = "";
                    document.getElementById('val_variedad').innerHTML = "";
                    document.getElementById('val_responsable').innerHTML = "";
                    document.getElementById('val_motivo').innerHTML = "";

                    if (FECHALEVANTAMIENTO == null || FECHALEVANTAMIENTO.length == 0 || /^\s+$/.test(FECHALEVANTAMIENTO)) {
                        document.form_reg_dato.FECHALEVANTAMIENTO.focus();
                        document.form_reg_dato.FECHALEVANTAMIENTO.style.borderColor = "#FF0000";
                        document.getElementById('val_fecha').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.FECHALEVANTAMIENTO.style.borderColor = "#4AF575";    
                    
                    if (TLEVANTAMIENTO == null || TLEVANTAMIENTO == 0) {
                        document.form_reg_dato.TLEVANTAMIENTO.focus();
                        document.form_reg_dato.TLEVANTAMIENTO.style.borderColor = "#FF0000";
                        document.getElementById('val_tlevantamiento').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.TLEVANTAMIENTO.style.borderColor = "#4AF575";
             
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

                    if (RESPONSBALE == null || RESPONSBALE.length == 0 || /^\s+$/.test(RESPONSBALE)) {
                        document.form_reg_dato.RESPONSBALE.focus();
                        document.form_reg_dato.RESPONSBALE.style.borderColor = "#FF0000";
                        document.getElementById('val_responsable').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.RESPONSBALE.style.borderColor = "#4AF575";    
                    
                    if (MOTIVO == null || MOTIVO.length == 0 || /^\s+$/.test(MOTIVO)) {
                        document.form_reg_dato.MOTIVO.focus();
                        document.form_reg_dato.MOTIVO.style.borderColor = "#FF0000";
                        document.getElementById('val_motivo').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.MOTIVO.style.borderColor = "#4AF575";    
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
                                <h3 class="page-title">Calidad de fruta </h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"> <a href="index.php"> <i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Modulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Calidad de Fruta</li>
                                            <li class="breadcrumb-item" aria-current="page">Levantamiento</li>
                                            <li class="breadcrumb-item" aria-current="page">Producto Terminado</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#p">Registro Levantamiento </a>    </li>
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
                                    <h4 class="box-title">Registro de Levantamiento</h4>                                        
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


                                                <input type="hidden" class="form-control" id="TOTALENVASE" name="TOTALENVASE" value="<?php echo $TOTALENVASE; ?>" />
                                                <input type="hidden" class="form-control" id="TOTALNETO" name="TOTALNETO" value="<?php echo $TOTALNETO; ?>" />
                                                <input type="hidden" class="form-control" id="TOTALBRUTO" name="TOTALBRUTO" value="<?php echo $TOTALBRUTO; ?>" />


                                                <input type="hidden" class="form-control" placeholder="ID LEVANTAMIENTO" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="OP LEVANTAMIENTO" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="URL LEVANTAMIENTO" id="URLP" name="URLP" value="registroLevantamientopt" />
                                                <label>Numero</label>
                                                <input type="number" class="form-control" style="background-color: #eeeeee;" placeholder="Numero Proceso" id="NUMEROVER" name="NUMEROVER" value="<?php echo $NUMEROVER; ?>" disabled />
                                                <label id="val_id" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-6 col-xl-1 col-lg-1 col-md-6 col-sm-6 col-6 col-xs-6">
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha Ingreso</label>
                                                <input type="hidden" class="form-control" placeholder="Fecha Ingreso " id="FECHAINGRESOE" name="FECHAINGRESOE" value="<?php echo $FECHAINGRESO; ?>" />
                                                <input type="date" class="form-control" style="background-color: #eeeeee;" placeholder="FECHA RECEPCION" id="FECHAINGRESO" name="FECHAINGRESO" value="<?php echo $FECHAINGRESO; ?>" disabled />
                                                <label id="val_fechai" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha Modificacion</label>
                                                <input type="hidden" class="form-control" placeholder="Fecha Modificacion " id="FECHAMODIFCIACIONE" name="FECHAMODIFCIACIONE" value="<?php echo $FECHAMODIFCIACION; ?>" />
                                                <input type="date" class="form-control " style="background-color: #eeeeee;" placeholder="FECHA MODIFICACION" id="FECHAMODIFCIACION" name="FECHAMODIFCIACION" value="<?php echo $FECHAMODIFCIACION; ?>" disabled />
                                                <label id="val_fecham" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha </label>
                                                <input type="hidden" class="form-control" placeholder="FECHA FECHALEVANTAMIENTOE" id="FECHALEVANTAMIENTOE" name="FECHALEVANTAMIENTOE" value="<?php echo $FECHALEVANTAMIENTO; ?>" />
                                                <input type="date" class="form-control"  placeholder="Fecha Proceso" id="FECHALEVANTAMIENTO" name="FECHALEVANTAMIENTO" value="<?php echo $FECHALEVANTAMIENTO; ?>" <?php echo $DISABLED; ?>  <?php echo $DISABLEDFOLIO; ?> />
                                                <label id="val_fecha" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-9 col-9 col-xs-9">
                                            <div class="form-group">
                                                <label>Tipo Levantamiento</label>
                                                <input type="hidden" class="form-control" placeholder="TIPO TLEVANTAMIENTO" id="TLEVANTAMIENTOE" name="TLEVANTAMIENTOE" value="<?php echo $TLEVANTAMIENTO; ?>" />
                                                <select class="form-control select2" id="TLEVANTAMIENTO" name="TLEVANTAMIENTO" style="width: 100%;" <?php echo $DISABLED; ?>  <?php echo $DISABLED3; ?>  <?php echo $DISABLEDFOLIO; ?>>
                                                    <option></option>
                                                    <option value="1" <?php if ($TLEVANTAMIENTO == 1 ) {  echo "selected";  } ?>> Orden Comercial </option>
                                                    <option value="2" <?php if ($TLEVANTAMIENTO == 2 ) {  echo "selected";  } ?>> Departamento de Calidad </option> 
                                                    <option value="3" <?php if ($TLEVANTAMIENTO == 3 ) {  echo "selected";  } ?>> Otros </option> 
                                                </select>
                                                <label id="val_tlevantamiento" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-9 col-9 col-xs-9">
                                            <div class="form-group">
                                                <label>Productor</label>
                                                <input type="hidden" class="form-control" placeholder="PRODUCTOR" id="PRODUCTORE" name="PRODUCTORE" value="<?php echo $PRODUCTOR; ?>" />
                                                <select class="form-control select2" id="PRODUCTOR" name="PRODUCTOR" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLEDFOLIO; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYPRODUCTOR as $r) : ?>
                                                        <?php if ($ARRAYPRODUCTOR) {    ?>
                                                            <option value="<?php echo $r['ID_PRODUCTOR']; ?>" <?php if ($PRODUCTOR == $r['ID_PRODUCTOR']) {  echo "selected";   } ?>>
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
                                        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-9 col-9 col-xs-9">
                                            <div class="form-group">
                                                <label>Variedad</label>
                                                <input type="hidden" class="form-control" placeholder="Variedad" id="VESPECIESE" name="VESPECIESE" value="<?php echo $VESPECIES; ?>" />
                                                <select class="form-control select2" id="VESPECIES" name="VESPECIES" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLEDFOLIO; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYVESPECIES as $r) : ?>
                                                        <?php if ($ARRAYVESPECIES) {    ?>
                                                            <option value="<?php echo $r['ID_VESPECIES']; ?>" <?php if ($VESPECIES == $r['ID_VESPECIES']) {     echo "selected";    } ?>>
                                                                <?php echo $r['NOMBRE_VESPECIES'];  ?>
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
                                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" placeholder="RESPONSBALE" id="RESPONSBALEE" name="RESPONSBALEE" value="<?php echo $RESPONSBALE; ?>" />
                                                <label>Responsable </label>
                                                <textarea class="form-control" rows="1" placeholder="Ingrese Responsable  " id="RESPONSBALE" name="RESPONSBALE" <?php echo $DISABLED; ?>  <?php echo $DISABLEDFOLIO; ?>><?php echo $RESPONSBALE; ?></textarea>
                                                <label id="val_responsable" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" placeholder="MOTIVO" id="MOTIVOE" name="MOTIVOE" value="<?php echo $MOTIVO; ?>" />
                                                <label>Motivo </label>
                                                <textarea class="form-control" rows="1" placeholder="Ingrese Motivo  " id="MOTIVO" name="MOTIVO" <?php echo $DISABLED; ?> <?php echo $DISABLEDFOLIO; ?>><?php echo $MOTIVO; ?></textarea>
                                                <label id="val_motivo" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <div class="box-footer">
                                    <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar">
                                        <div class="btn-group col-sm-4" role="group" aria-label="acciones">
                                            <?php if ($OP == "") { ?>
                                                <button type="button" class="btn btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroLevantamientopt.php');">
                                                    <i class="ti-trash"></i> Cancelar
                                                </button>
                                                <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Crear" name="CREAR" value="CREAR" <?php echo $DISABLEDFOLIO; ?> onclick="return validacion()">
                                                    <i class="ti-save-alt"></i> Crear
                                                </button>
                                            <?php } ?>
                                            <?php if ($OP != "") { ?>
                                                <button type="button" class="btn  btn-success " data-toggle="tooltip" title="Volver" name="VOLVER" value="VOLVER" Onclick="irPagina('listarLevantamientopt.php'); ">
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
                                        <div class="btn-group col-sm-4">
                                            <?php if ($OP != "") : ?>
                                                <button type="button" class="btn btn-primary  " data-toggle="tooltip" title="Informe" id="defecto" name="tarjas" <?php if ($ESTADO == "1") { echo "disabled"; } ?>  <?php echo $DISABLEDFOLIO; ?> Onclick="abrirPestana('../../assest/documento/informeLevantamientopt.php?parametro=<?php echo $IDOP; ?>&&usuario=<?php echo $IDUSUARIOS; ?>'); ">
                                                    <i class="fa fa-file-pdf-o"></i> Informe
                                                </button>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                        <?php if (isset($_GET['op'])): ?>
                            <div class="card">
                                <div class="card-header bg-success">
                                    <h4 class="card-title">Detalles de Existencia</h4>
                                </div>
                                <div class="card-header">
                                            <div class="form-row align-items-center">
                                                <form method="post" id="form1">
                                                    <input type="hidden" class="form-control" placeholder="ID LEVANTAMIENTO" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                                    <input type="hidden" class="form-control" placeholder="OP LEVANTAMIENTO" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                                    <input type="hidden" class="form-control" placeholder="URL LEVANTAMIENTO" id="URLP" name="URLP" value="registroLevantamientopt" />
                                                    <input type="hidden" class="form-control" placeholder="URL SELECCIONAR" id="URLD" name="URLD" value="registroSelecionExistenciaPTLevantamientoPt" />
                                                    <div class="col-auto">
                                                        <button type="submit" class="btn btn-success btn-block mb-2" data-toggle="tooltip" title="Seleccion Existencia" id="SELECIONOCDURL" name="SELECIONOCDURL"
                                                            <?php echo $DISABLED2; ?> <?php if ($ESTADO == 0) {  echo "disabled style='background-color: #eeeeee;'";  } ?> >
                                                            Selector Existencias
                                                        </button>
                                                    </form>
                                                </div>
                                                <div class="col-auto">
                                                    <label class="sr-only" for=""></label>
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">Total Envase</div>
                                                        </div>
                                                        <input type="hidden" class="form-control" id="TOTALENVASE" name="TOTALENVASE" value="<?php echo $TOTALENVASE; ?>" />
                                                        <input type="text" class="form-control" placeholder="Total Envase" id="TOTALENVASEV" name="TOTALENVASEV" value="<?php echo $TOTALENVASEV; ?>" disabled />
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <label class="sr-only" for=""></label>
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">Total Neto</div>
                                                        </div>
                                                        <input type="hidden" class="form-control" id="TOTALNETO" name="TOTALNETO" value="<?php echo $TOTALNETO; ?>" />
                                                        <input type="text" class="form-control" placeholder="Total Neto" id="TOTALENVASEV" name="TOTALENVASEV" value="<?php echo $TOTALNETOV; ?>" disabled />
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <label class="sr-only" for=""></label>
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">Total Bruto</div>
                                                        </div>
                                                        <input type="hidden" class="form-control" id="TOTALBRUTO" name="TOTALBRUTO" value="<?php echo $TOTALBRUTO; ?>" />
                                                        <input type="text" class="form-control" placeholder="Total Neto" id="TOTALENVASEV" name="TOTALENVASEV" value="<?php echo $TOTALBRUTOV; ?>" disabled />
                                                    </div>
                                                </div>
                                            </div>
                                    </div>                
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="detalle" class="table-hover " style="width: 100%;">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Folio </th>
                                                    <th class="text-center">Operaciones</th>
                                                    <th>Fecha Embalado </th>
                                                    <th>Código Estandar </th>
                                                    <th>Envase/Estandar </th>
                                                    <th>Especies </th>
                                                    <th>Variedad </th>
                                                    <th>Cantidad Envase</th>
                                                    <th>Kilo Neto</th>
                                                    <th>Kilo Bruto</th>
                                                    <th>Tipo Manejo</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if ($ARRAYTOMADA) { ?>
                                                    <?php foreach ($ARRAYTOMADA as $r) : ?>
                                                        <?php
                                                        $ARRAYVERESTANDARID = $EEXPORTACION_ADO->verEstandar($r['ID_ESTANDAR']);
                                                        if ($ARRAYVERESTANDARID) {
                                                            $CODIGOESTANDAR = $ARRAYVERESTANDARID[0]['CODIGO_ESTANDAR'];
                                                            $NOMBREESTANDAR = $ARRAYVERESTANDARID[0]['NOMBRE_ESTANDAR'];
                                                        } else {
                                                            $CODIGOESTANDAR = "Sin Datos";
                                                            $NOMBREESTANDAR = "Sin Datos";
                                                        }
                                                        $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
                                                        if ($ARRAYVERVESPECIESID) {
                                                            $NOMBREVESPECIES = $ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'];
                                                            $ARRAYVERESPECIESID = $ESPECIES_ADO->verEspecies($ARRAYVERVESPECIESID[0]['ID_ESPECIES']);
                                                            if ($ARRAYVERVESPECIESID) {
                                                                $NOMBRESPECIES = $ARRAYVERESPECIESID[0]['NOMBRE_ESPECIES'];
                                                            } else {
                                                                $NOMBRESPECIES = "Sin Datos";
                                                            }
                                                        } else {
                                                            $NOMBREVESPECIES = "Sin Datos";
                                                            $NOMBRESPECIES = "Sin Datos";
                                                        }
                                                        $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);
                                                        if ($ARRAYVERPRODUCTORID) {

                                                            $CSGPRODUCTOR = $ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'];
                                                            $NOMBREPRODUCTOR = $ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'];
                                                        } else {
                                                            $CSGPRODUCTOR = "Sin Datos";
                                                            $NOMBREPRODUCTOR = "Sin Datos";
                                                        }
                                                        $ARRAYTMANEJO = $TMANEJO_ADO->verTmanejo($r['ID_TMANEJO']);
                                                        if ($ARRAYTMANEJO) {
                                                            $NOMBRETMANEJO = $ARRAYTMANEJO[0]['NOMBRE_TMANEJO'];
                                                        } else {
                                                            $NOMBRETMANEJO = "Sin Datos";
                                                        }
                                                        ?>
                                                        <tr class="text-center">
                                                            <td>
                                                                <span class="<?php echo $TLEVANTAMIENTOCOLOR; ?>">
                                                                   <?php echo $r['FOLIO_AUXILIAR_EXIEXPORTACION']; ?>
                                                                </span>
                                                            </td>
                                                            <td class="text-center">
                                                                <form method="post" id="form1">
                                                                    <input type="hidden" class="form-control" id="IDQUITAR" name="IDQUITAR" value="<?php echo $r['ID_EXIEXPORTACION']; ?>" />
                                                                    <input type="hidden" class="form-control" placeholder="ID LEVANTAMIENTO" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                                                    <input type="hidden" class="form-control" placeholder="TLEVANTAMIENTO" id="TLEVANTAMIENTO" name="TLEVANTAMIENTO" value="<?php echo $TLEVANTAMIENTO; ?>" />
                                                                    <input type="hidden" class="form-control" id="FOLIO" name="FOLIO" value="<?php echo $r['FOLIO_EXIEXPORTACION']; ?>" />
                                                                    <input type="hidden" class="form-control" id="FOLIOAUXILIAR" name="FOLIOAUXILIAR" value="<?php echo $r['FOLIO_AUXILIAR_EXIEXPORTACION']; ?>" />
                                                                    <div class="btn-group btn-block" role="group" aria-label="Operaciones Detalle">
                                                                        <button type="submit" class="btn btn-sm btn-danger " id="QUITAR" name="QUITAR" data-toggle="tooltip" title="Quitar Existencia PT" <?php echo $DISABLED2; ?> <?php if ($ESTADO == 0) {  echo "disabled"; } ?>>
                                                                            <i class="ti-close"></i><br> Quitar
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </td>
                                                            <td><?php echo $r['EMBALADO']; ?></td>
                                                            <td><?php echo $CODIGOESTANDAR; ?></td>
                                                            <td><?php echo $NOMBREESTANDAR; ?></td>
                                                            <td><?php echo $NOMBRESPECIES; ?></td>
                                                            <td><?php echo $NOMBREVESPECIES; ?></td>
                                                            <td><?php echo $r['ENVASE']; ?></td>
                                                            <td><?php echo $r['NETO']; ?></td>
                                                            <td><?php echo $r['BRUTO']; ?></td>
                                                            <td><?php echo $NOMBRETMANEJO; ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
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

            $ARRAYNUMERO = $LEVANTAMIENTOPT_ADO->obtenerNumero($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
            $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;

            //UTILIZACION METODOS SET DEL MODELO
            //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO
            $LEVANTAMIENTOPT->__SET('NUMERO_LEVANTAMIENTO', $NUMERO);
            $LEVANTAMIENTOPT->__SET('FECHA_LEVANTAMIENTO', $_REQUEST['FECHALEVANTAMIENTO']);
            $LEVANTAMIENTOPT->__SET('TLEVANTAMIENTO', $_REQUEST['TLEVANTAMIENTO']);
            $LEVANTAMIENTOPT->__SET('RESPONSBALE_LEVANTAMIENTO', $_REQUEST['RESPONSBALE']);
            $LEVANTAMIENTOPT->__SET('MOTIVO_LEVANTAMIENTO', $_REQUEST['MOTIVO']);
            $LEVANTAMIENTOPT->__SET('ID_VESPECIES', $_REQUEST['VESPECIES']);
            $LEVANTAMIENTOPT->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
            $LEVANTAMIENTOPT->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
            $LEVANTAMIENTOPT->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
            $LEVANTAMIENTOPT->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
            $LEVANTAMIENTOPT->__SET('ID_USUARIOI', $IDUSUARIOS);
            $LEVANTAMIENTOPT->__SET('ID_USUARIOM', $IDUSUARIOS);
            //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR  HORAINGRESORECHAZOMP
            $LEVANTAMIENTOPT_ADO->agregarLevantamiento($LEVANTAMIENTOPT);
            //OBTENER EL ID DE LA RECEPCION CREADA PARA LUEGO ENVIAR EL INGRESO DEL DETALLE
            $ARRYAOBTENERID = $LEVANTAMIENTOPT_ADO->obtenerId(
                $_REQUEST['FECHALEVANTAMIENTO'],
                $_REQUEST['EMPRESA'],
                $_REQUEST['PLANTA'],
                $_REQUEST['TEMPORADA'],
            );
            //REDIRECCIONAR A PAGINA registroRecepcion.php

            $AUSUARIO_ADO->agregarAusuario2($NUMERO,1,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Levantamiento Producto Terminado.","fruta_levantamientopt", $ARRYAOBTENERID[0]['ID_LEVANTAMIENTO'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  
            
            $id_dato = $ARRYAOBTENERID[0]['ID_LEVANTAMIENTO'];
            $accion_dato = "crear";
            
            echo '<script>
                Swal.fire({
                    icon:"success",
                    title:"Registro Creado",
                    text:"El registro de levantamiento MP se ha creado correctamente",
                    showConfirmButton: true,
                    confirmButtonText:"Cerrar",
                    closeOnConfirm:false
                }).then((result)=>{
                    location.href = "registroLevantamientopt.php?op&id='.$id_dato.'&a='.$accion_dato.'";                            
                })
            </script>';
        }
        //OPERACION EDICION DE FILA
        if (isset($_REQUEST['GUARDAR'])) {            
            $LEVANTAMIENTOPT->__SET('FECHA_LEVANTAMIENTO', $_REQUEST['FECHALEVANTAMIENTO']);
            $LEVANTAMIENTOPT->__SET('TLEVANTAMIENTO', $_REQUEST['TLEVANTAMIENTOE']);
            $LEVANTAMIENTOPT->__SET('RESPONSBALE_LEVANTAMIENTO', $_REQUEST['RESPONSBALE']);
            $LEVANTAMIENTOPT->__SET('MOTIVO_LEVANTAMIENTO', $_REQUEST['MOTIVO']);
            $LEVANTAMIENTOPT->__SET('CANTIDAD_ENVASE_LEVANTAMIENTO', $_REQUEST['TOTALENVASE']);
            $LEVANTAMIENTOPT->__SET('KILOS_BRUTO_LEVANTAMIENTO', $_REQUEST['TOTALBRUTO']);
            $LEVANTAMIENTOPT->__SET('KILOS_NETO_LEVANTAMIENTO', $_REQUEST['TOTALNETO']);
            $LEVANTAMIENTOPT->__SET('ID_VESPECIES', $_REQUEST['VESPECIESE']);
            $LEVANTAMIENTOPT->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTORE']);
            $LEVANTAMIENTOPT->__SET('ID_USUARIOM', $IDUSUARIOS);
            $LEVANTAMIENTOPT->__SET('ID_LEVANTAMIENTO', $_REQUEST['IDP']);
            //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
            $LEVANTAMIENTOPT_ADO->actualizarLevantamiento($LEVANTAMIENTOPT);           
            
            $AUSUARIO_ADO->agregarAusuario2($NUMEROVER,1,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de levantamiento Producto Terminado.","fruta_levantamientopt", $_REQUEST['IDP'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

            
            if ($accion_dato == "crear") {
                $id_dato = $_REQUEST['IDP'];
                $accion_dato = "crear";
                echo '<script>
                    Swal.fire({
                        icon:"info",
                        title:"Registro Modificado",
                        text:"El registro de levantamiento se ha modificada correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroLevantamientopt.php?op&id='.$id_dato.'&a='.$accion_dato.'";                            
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
                        text:"El registro de levantamiento se ha modificada correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroLevantamientopt.php?op&id='.$id_dato.'&a='.$accion_dato.'";                            
                    })
                </script>';
            }
        }
        //OPERACION CERRAR DE FILA
        if (isset($_REQUEST['CERRAR'])) {
            //UTILIZACION METODOS SET DEL MODELO
            
            $ARRAYEXIEXPORTACIONTOMADO = $EXIEXPORTACION_ADO->buscarPorLevantamiento($_REQUEST['IDP']);
            if ( empty($ARRAYEXIEXPORTACIONTOMADO) ) {
                $SINO = "1";
                echo '<script>
                        Swal.fire({
                            icon:"warning",
                            title:"Accion restringida",
                            text:"Tiene que haber al menos un registro en el detalle",
                            showConfirmButton: true,
                            confirmButtonText:"Cerrar",
                            closeOnConfirm:false
                        })
                    </script>';
            } else {
                $SINO = "0";
                $MENSAJEEXISTENCIA = "";
            }
               

            //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO
            if ($SINO == "0") {
                $LEVANTAMIENTOPT->__SET('FECHA_LEVANTAMIENTO', $_REQUEST['FECHALEVANTAMIENTO']);
                $LEVANTAMIENTOPT->__SET('TLEVANTAMIENTO', $_REQUEST['TLEVANTAMIENTOE']);
                $LEVANTAMIENTOPT->__SET('RESPONSBALE_LEVANTAMIENTO', $_REQUEST['RESPONSBALE']);
                $LEVANTAMIENTOPT->__SET('MOTIVO_LEVANTAMIENTO', $_REQUEST['MOTIVO']);
                $LEVANTAMIENTOPT->__SET('CANTIDAD_ENVASE_LEVANTAMIENTO', $_REQUEST['TOTALENVASE']);
                $LEVANTAMIENTOPT->__SET('KILOS_BRUTO_LEVANTAMIENTO', $_REQUEST['TOTALBRUTO']);
                $LEVANTAMIENTOPT->__SET('KILOS_NETO_LEVANTAMIENTO', $_REQUEST['TOTALNETO']);
                $LEVANTAMIENTOPT->__SET('ID_VESPECIES', $_REQUEST['VESPECIESE']);
                $LEVANTAMIENTOPT->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTORE']);
                $LEVANTAMIENTOPT->__SET('ID_USUARIOM', $IDUSUARIOS);
                $LEVANTAMIENTOPT->__SET('ID_LEVANTAMIENTO', $_REQUEST['IDP']);
                $LEVANTAMIENTOPT->__SET('ID_EMPRESA', $_SESSION['ID_EMPRESA']);
                $LEVANTAMIENTOPT->__SET('ID_PLANTA', $_SESSION['ID_PLANTA']);
                $LEVANTAMIENTOPT->__SET('ID_TEMPORADA', $_SESSION['ID_TEMPORADA']);
                
                //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                $LEVANTAMIENTOPT_ADO->actualizarLevantamiento($LEVANTAMIENTOPT);
                //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR

                $LEVANTAMIENTOPT->__SET('ID_LEVANTAMIENTO', $_REQUEST['IDP']);
                //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                $LEVANTAMIENTOPT_ADO->cerrado($LEVANTAMIENTOPT);

                $AUSUARIO_ADO->agregarAusuario2($NUMEROVER,1,3,"".$_SESSION["NOMBRE_USUARIO"].", Cerrar  levantamiento Producto Terminado.","fruta_levantamientopt", $_REQUEST['IDP'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

                $ARRAYEXIEXPORTACION = $EXIEXPORTACION_ADO->buscarPorLevantamiento($_REQUEST['IDP']);   
                foreach ($ARRAYEXIEXPORTACION as $r) :
                    //if( $_REQUEST['TLEVANTAMIENTOE']==1){
                        $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $r['ID_EXIEXPORTACION']);
                        $EXIEXPORTACION->__SET('COLOR', 3);
                        //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                        $EXIEXPORTACION_ADO->levantarColor($EXIEXPORTACION);
                    //}
                    
                    /*if( $_REQUEST['TLEVANTAMIENTOE']==2){
                        $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $r['ID_EXIEXPORTACION']);
                        $EXIEXPORTACION->__SET('COLOR', $_REQUEST['TLEVANTAMIENTOE']);
                        //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                        $EXIEXPORTACION_ADO->objetadoColor($EXIEXPORTACION);
                    }*/
                endforeach;             
           
                if ($accion_dato == "crear") {
                    $id_dato = $_REQUEST['IDP'];
                    $accion_dato = "ver";
                    echo '<script>
                        Swal.fire({
                            icon:"info",
                            title:"Registro Cerrado",
                            text:"Este levantamiento se encuentra cerrada y no puede ser modificada.",
                            showConfirmButton: true,
                            confirmButtonText:"Cerrar",
                            closeOnConfirm:false
                        }).then((result)=>{
                            location.href = "registroLevantamientopt.php?op&id='.$id_dato.'&a='.$accion_dato.'";                                    
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
                            text:"Este levantamiento se encuentra cerrada y no puede ser modificada.",
                            showConfirmButton: true,
                            confirmButtonText:"Cerrar",
                            closeOnConfirm:false
                        }).then((result)=>{
                            location.href = "registroLevantamientopt.php?op&id='.$id_dato.'&a='.$accion_dato.'";                                    
                        })
                    </script>';
                }  
              
            }
        }        
        if (isset($_REQUEST['QUITAR'])) {
            $IDQUITAR = $_REQUEST['IDQUITAR'];
            $IDPQUITAR = $_REQUEST['IDP'];
            $TLEVANTAMIENTOQUITAR = $_REQUEST['TLEVANTAMIENTO'];
            $FOLIOQUITAR = $_REQUEST['FOLIO'];
            $FOLIOAUXILIARQUITAR = $_REQUEST['FOLIOAUXILIAR'];            
        
            $EXIEXPORTACION->__SET('ID_EXIEXPORTACION',  $_REQUEST['IDQUITAR']);
            //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
            $EXIEXPORTACION_ADO->actualizarDeselecionarLevantamientoCambiarEstado($EXIEXPORTACION);   

            $AUSUARIO_ADO->agregarAusuario2("NULL",1,2,"".$_SESSION["NOMBRE_USUARIO"].", Se Quito la Existencia al levantamiento producto terminado.","fruta_exiexportacion", "NULL" ,$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

            $REAPT_ADO->eliminarReapt($_REQUEST['IDP'],$_REQUEST['IDQUITAR']);         
            
            $AUSUARIO_ADO->agregarAusuario2("NULL",1,1,"".$_SESSION["NOMBRE_USUARIO"].", Desahabilitar de detalle levantamiento Producto Terminado.","fruta_reapt", "NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  
            
            
            echo '<script>
                Swal.fire({
                    icon:"error",
                    title:"Accion realizada",
                    text:"Se ha quitado la existencia del despacho.",
                    showConfirmButton: true,
                    confirmButtonText:"Cerrar",
                    closeOnConfirm:false
                }).then((result)=>{
                    location.href = "registroLevantamientopt.php?op&id='.$id_dato.'&a='.$accion_dato.'";                            
                })
            </script>';                  
        }

        ?>
</body>

</html>