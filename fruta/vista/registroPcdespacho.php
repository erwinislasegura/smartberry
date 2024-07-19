<?php

include_once "../../assest/config/validarUsuarioFruta.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/VESPECIES_ADO.php';
include_once '../../assest/controlador/PROCESO_ADO.php';
include_once '../../assest/controlador/EEXPORTACION_ADO.php';
include_once '../../assest/controlador/FOLIO_ADO.php';
include_once '../../assest/controlador/TMANEJO_ADO.php';
include_once '../../assest/controlador/TCALIBRE_ADO.php';
include_once '../../assest/controlador/TEMBALAJE_ADO.php';

include_once '../../assest/controlador/EXIEXPORTACION_ADO.php';
include_once '../../assest/controlador/PCDESPACHO_ADO.php';

include_once '../../assest/modelo/PCDESPACHO.php';
include_once '../../assest/modelo/EXIEXPORTACION.php';

//INICIALIZAR CONTROLADOR


$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$EXIEXPORTACION_ADO =  new EXIEXPORTACION_ADO();
$FOLIO_ADO =  new FOLIO_ADO();
$TMANEJO_ADO =  new TMANEJO_ADO();
$TCALIBRE_ADO =  new TCALIBRE_ADO();
$TEMBALAJE_ADO =  new TEMBALAJE_ADO();


$EEXPORTACION_ADO =  new EEXPORTACION_ADO();
$PCDESPACHO_ADO =  new PCDESPACHO_ADO();

//INIICIALIZAR MODELO
$PCDESPACHO =  new PCDESPACHO();
$EXIEXPORTACION =  new EXIEXPORTACION();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$NUMERO = "";
$NUMEROVER = "";

$IDQUITAR = "";
$FECHAINGRESOPCDESPACHO = "";
$FECHAMODIFCIACIONPCDESPACHO = "";

$IDPCDESPACHO = "";
$MOTIVOPCDESPACHO = "";
$TINPUSDA="";
$FECHAPCDESPACHO = "";
$ESTADO = "";

$TOTALENVASE = 0;
$TOTALNETO = 0;

$TOTALENVASEV = 0;
$TOTALNETOV = 0;

$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";

$DISABLED0 = "disabled";
$DISABLED = "";
$DISABLED2 = "";
$DISABLED3 = "";
$DISABLEDSTYLE0 = "style='background-color: #eeeeee;'";
$DISABLEDSTYLE = "";
$DISABLEDSTYLE2 = "";

$MENSAJE0 = "";
$MENSAJE = "";
$MENSAJE2 = "";
$MENSAJEVALIDATO = "";

$TOTALENVASE = "";
$TOTALNETO = "";

$IDOP = "";
$OP = "";
$SINO = "";

//INICIALIZAR ARREGLOS



$ARRAYTOMADO = "";
$ARRAYTOMADOPCDESPACHO = "";
$ARRAYTOMADOTOTALES = "";
$ARRAYTOMADOTOTALES2 = "";

$ARRAYEMPRESA = "";
$ARRAYPLANTA = "";
$ARRAYTEMPORADA = "";
$ARRAYEXIEXPORTACION = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS 
$ARRAYEMPRESA = $EMPRESA_ADO->listarEmpresaCBX();
$ARRAYPLANTA = $PLANTA_ADO->listarPlantaCBX();
$ARRAYTEMPORADA = $TEMPORADA_ADO->listarTemporadaCBX();
$ARRAYFECHAACTUAL = $PCDESPACHO_ADO->obtenerFecha();
$FECHAPCDESPACHO = $ARRAYFECHAACTUAL[0]['FECHA'];
include_once "../../assest/config/validarDatosUrl.php";
include_once "../../assest/config/datosUrlD.php";




//OBTENCION DE DATOS ENVIADOR A LA URL

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
//PARA OPERACIONES DE EDICION , VISUALIZACION Y CREACION
if (isset($id_dato) && isset($accion_dato)) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $id_dato;
    $OP = $accion_dato;

    $ARRAYTOMADO = $EXIEXPORTACION_ADO->buscarPorPcdespacho2($IDOP);
    $ARRAYTOMADOTOTALES = $EXIEXPORTACION_ADO->obtenerTotalesPorPcdespacho($IDOP);
    $ARRAYTOMADOTOTALES2 = $EXIEXPORTACION_ADO->obtenerTotalesPorPcdespacho2($IDOP);

    $TOTALENVASE = $ARRAYTOMADOTOTALES[0]['ENVASE'];
    $TOTALNETO = $ARRAYTOMADOTOTALES[0]['NETO'];

    $TOTALENVASEV = $ARRAYTOMADOTOTALES2[0]['ENVASE'];
    $TOTALNETOV = $ARRAYTOMADOTOTALES2[0]['NETO'];




    //IDENTIFICACIONES DE OPERACIONES
    //crear =  OBTENCION DE DATOS INICIALES PARA PODER CREAR LA RECEPCION
    if ($OP == "crear") {
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $DISABLED2 = "";
        $DISABLED3 = "disabled";
        $DISABLEDMENU = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        $ARRAYPCDESPACHO = $PCDESPACHO_ADO->verPcdespacho($IDOP);
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYPCDESPACHO as $r) :
            $IDPCDESPACHO = $IDOP;
            $NUMEROVER = "" . $r['NUMERO_PCDESPACHO'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $MOTIVOPCDESPACHO = "" . $r['MOTIVO_PCDESPACHO'];
            $FECHAPCDESPACHO = "" . $r['FECHA_PCDESPACHO'];
            $FECHAINGRESOPCDESPACHO = "" . $r['INGRESO'];
            $FECHAMODIFCIACIONPCDESPACHO = "" . $r['MODIFICACION'];
            $TINPUSDA= "" . $r['TINPUSDA']; 
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }

    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {

        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $DISABLED2 = "";
        $DISABLED3 = "disabled";
        $DISABLEDMENU = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        $ARRAYPCDESPACHO = $PCDESPACHO_ADO->verPcdespacho($IDOP);
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYPCDESPACHO as $r) :
            $IDPCDESPACHO = $IDOP;
            $NUMEROVER = "" . $r['NUMERO_PCDESPACHO'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $MOTIVOPCDESPACHO = "" . $r['MOTIVO_PCDESPACHO'];
            $FECHAPCDESPACHO = "" . $r['FECHA_PCDESPACHO'];
            $FECHAINGRESOPCDESPACHO = "" . $r['INGRESO'];
            $FECHAMODIFCIACIONPCDESPACHO = "" . $r['MODIFICACION'];
            $TINPUSDA= "" . $r['TINPUSDA']; 
            $ESTADO = "" . $r['ESTADO'];
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
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        $ARRAYPCDESPACHO = $PCDESPACHO_ADO->verPcdespacho($IDOP);
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYPCDESPACHO as $r) :
            $IDPCDESPACHO = $IDOP;
            $NUMEROVER = "" . $r['NUMERO_PCDESPACHO'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $MOTIVOPCDESPACHO = "" . $r['MOTIVO_PCDESPACHO'];
            $FECHAPCDESPACHO = "" . $r['FECHA_PCDESPACHO'];
            $FECHAINGRESOPCDESPACHO = "" . $r['INGRESO'];
            $FECHAMODIFCIACIONPCDESPACHO = "" . $r['MODIFICACION'];
            $TINPUSDA= "" . $r['TINPUSDA']; 
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }
}
if ($_POST) {

    if (isset($_REQUEST['EMPRESA'])) {
        $EMPRESA = "" . $_REQUEST['EMPRESA'];
    }

    if (isset($_REQUEST['PLANTA'])) {
        $PLANTA = "" . $_REQUEST['PLANTA'];
    }

    if (isset($_REQUEST['TEMPORADA'])) {
        $TEMPORADA = "" . $_REQUEST['TEMPORADA'];
    }

    if (isset($_REQUEST['MOTIVOPCDESPACHO'])) {
        $MOTIVOPCDESPACHO = "" . $_REQUEST['MOTIVOPCDESPACHO'];
    }
    if (isset($_REQUEST['TINPUSDA'])) {
        $TINPUSDA = "" . $_REQUEST['TINPUSDA'];
    }
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Planificador Carga </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../../assest/config/urlHead.php"; ?>
        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
                function validacion() {


                    FECHAPCDESPACHO = document.getElementById("FECHAPCDESPACHO").value;
                    TINPUSDA = document.getElementById("TINPUSDA").selectedIndex;
                    MOTIVOPCDESPACHO = document.getElementById("MOTIVOPCDESPACHO").value;

                    document.getElementById('val_fecha').innerHTML = "";
                    document.getElementById('val_tinpusda').innerHTML = "";
                    document.getElementById('val_motivo').innerHTML = "";


                    if (FECHAPCDESPACHO == null || FECHAPCDESPACHO.length == 0 || /^\s+$/.test(FECHAPCDESPACHO)) {
                        document.form_reg_dato.FECHAPCDESPACHO.focus();
                        document.form_reg_dato.FECHAPCDESPACHO.style.borderColor = "#FF0000";
                        document.getElementById('val_fecha').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.FECHAPCDESPACHO.style.borderColor = "#4AF575";

                    if (TINPUSDA == null || TINPUSDA == 0) {
                            document.form_reg_dato.TINPUSDA.focus();
                            document.form_reg_dato.TINPUSDA.style.borderColor = "#FF0000";
                            document.getElementById('val_tinpusda').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                            return false
                        }
                        document.form_reg_dato.TINPUSDA.style.borderColor = "#4AF575";
                    

                    if (MOTIVOPCDESPACHO == null || MOTIVOPCDESPACHO.length == 0 || /^\s+$/.test(MOTIVOPCDESPACHO)) {
                        document.form_reg_dato.MOTIVOPCDESPACHO.focus();
                        document.form_reg_dato.MOTIVOPCDESPACHO.style.borderColor = "#FF0000";
                        document.getElementById('val_motivo').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.MOTIVOPCDESPACHO.style.borderColor = "#4AF575";


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
            <?php include_once "../../assest/config/menuFruta.php";  ?>
            <div class="content-wrapper">
                <div class="container-full">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Frigorifico</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"> <a href="index.php"> <i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Frigorifico</li>
                                            <li class="breadcrumb-item" aria-current="page">Planificador Carga</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#">Registro PC</a>  </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <?php include_once "../../assest/config/verIndicadorEconomico.php"; ?>
                        </div>
                    </div>
                    <!-- Main content -->
                    <section class="content">
                        <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato">
                            <div class="box">
                                 <div class="box-header with-border bg-primary">                                   
                                    <h4 class="box-title">Registro de Planificador de Carga</h4>                                        
                                </div>
                                <div class="box-body ">
                                    <div class="row">
                                        <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 col-xs-6">

                                            <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                            <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTA" name="PLANTA" value="<?php echo $PLANTAS; ?>" />
                                            <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADAS; ?>" />

                                            <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESAE" name="EMPRESAE" value="<?php echo $EMPRESA; ?>" />
                                            <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTAE" name="PLANTAE" value="<?php echo $PLANTA; ?>" />
                                            <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADAE" name="TEMPORADAE" value="<?php echo $TEMPORADA; ?>" />

                                            <input type="hidden" class="form-control" id="TOTALENVASE" name="TOTALENVASE" value="<?php echo $TOTALENVASE; ?>" />
                                            <input type="hidden" class="form-control" id="TOTALNETO" name="TOTALNETO" value="<?php echo $TOTALNETO; ?>" />
                                            <input type="hidden" class="form-control" placeholder="ID PDDESPACHO" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                            <input type="hidden" class="form-control" placeholder="OP PDDESPACHO" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                            <input type="hidden" class="form-control" placeholder="URL PDDESPACHO" id="URLP" name="URLP" value="registroPcdespacho" />

                                            <label>Número Planifica. Carga </label>
                                            <input type="text" class="form-control" placeholder="Número Planificador Carga" id="NUMEROVER" name="NUMEROVER" value="<?php echo $NUMEROVER; ?>" <?php echo $DISABLED0; ?> <?php echo $DISABLEDSTYLE0; ?> />
                                            <label id="val_id" class="validacion"> </label>
                                        </div>
                                        <div class="col-xxl-6 col-xl-1 col-lg-1 col-md-6 col-sm-6 col-6 col-xs-6">
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha Ingreso</label>
                                                <input type="hidden" class="form-control" placeholder="Fecha Ingreso " id="FECHAINGRESOPCDESPACHOE" name="FECHAINGRESOPCDESPACHOE" value="<?php echo $FECHAINGRESOPCDESPACHO; ?>" />
                                                <input type="date" class="form-control" style="background-color: #eeeeee;" placeholder="FECHA RECEPCION" id="FECHAINGRESOPCDESPACHO" name="FECHAINGRESOPCDESPACHO" value="<?php echo $FECHAINGRESOPCDESPACHO; ?>" disabled />
                                                <label id="val_fechai" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha Modificación</label>
                                                <input type="hidden" class="form-control" placeholder="Fecha Modificacion " id="FECHAMODIFCIACIONPCDESPACHOE" name="FECHAMODIFCIACIONPCDESPACHOE" value="<?php echo $FECHAMODIFCIACIONPCDESPACHO; ?>" />
                                                <input type="date" class="form-control " style="background-color: #eeeeee;" placeholder="FECHA MODIFICACION" id="FECHAMODIFCIACIONPCDESPACHO" name="FECHAMODIFCIACIONPCDESPACHO" value="<?php echo $FECHAMODIFCIACIONPCDESPACHO; ?>" disabled />
                                                <label id="val_fecham" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <label>Fecha PC</label>
                                            <input type="hidden" class="form-control" placeholder="Fecha PC Despacho" id="FECHAPCDESPACHOE" name="FECHAPCDESPACHOE" value="<?php echo $FECHAPCDESPACHO; ?>" />
                                            <input type="date" class="form-control" placeholder="Fecha PC Despacho" id="FECHAPCDESPACHO" name="FECHAPCDESPACHO" value="<?php echo $FECHAPCDESPACHO; ?>" <?php echo $DISABLED2; ?>   />
                                            <label id="val_fecha" class="validacion"> </label>
                                        </div>                                        
                                        <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Sin Inspección</label>
                                                <input type="hidden" class="form-control" placeholder="TINPUSDA" id="TINPUSDAE" name="TINPUSDAE" value="<?php echo $TINPUSDA; ?>" />
                                                <select class="form-control select2" id="TINPUSDA" name="TINPUSDA" style="width: 100%;" <?php echo $DISABLED3; ?> >
                                                    <option></option>
                                                    <option value="1" <?php if ($TINPUSDA == "1") { echo "selected"; } ?>> Si </option>
                                                    <option value="0" <?php if ($TINPUSDA == "0") { echo "selected"; } ?>> No</option>
                                                </select>
                                                <label id="val_tinpusda" class="validacion"> </label> 
                                            </div> 
                                        </div>
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <label>Motivo</label>
                                            <input type="hidden" class="form-control" placeholder="Fecha PC Despacho" id="MOTIVOPCDESPACHOE" name="MOTIVOPCDESPACHOE" value="<?php echo $MOTIVOPCDESPACHO; ?>" />
                                            <textarea class="form-control" rows="1" placeholder="Ingrese Nota, Observaciónes u Otro" id="MOTIVOPCDESPACHO" name="MOTIVOPCDESPACHO" <?php echo $DISABLED2; ?>   ><?php echo $MOTIVOPCDESPACHO; ?></textarea>
                                            <label id="val_motivo" class="validacion"> </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->                          
                                <div class="box-footer">
                                    <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="toolbar">
                                        <div class="btn-group  col-xxl-4 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12" role="group" aria-label="Acciones generales">
                                            <?php if ($OP == "") { ?>
                                                <button type="button" class="btn btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroPcdespacho.php');">
                                                    <i class="ti-trash"></i> Cancelar
                                                </button>
                                                <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Guardar" name="CREAR" value="CREAR"   onclick="return validacion()">
                                                    <i class="ti-save-alt"></i> Guardar
                                                </button>
                                            <?php } ?>
                                            <?php if ($OP != "") { ?>
                                                <button type="button" class="btn  btn-success " data-toggle="tooltip" title="Volver" name="VOLVER" value="VOLVER" Onclick="irPagina('listarPcdespacho.php'); ">
                                                    <i class="ti-back-left "></i> Volver
                                                </button>
                                                <button type="submit" class="btn btn-warning " data-toggle="tooltip" title="Guardar" name="GUARDAR" value="GUARDAR"  <?php echo $DISABLED2; ?> onclick="return validacion()">
                                                    <i class="ti-pencil-alt"></i> Guardar
                                                </button>
                                                <button type="submit" class="btn btn-danger " data-toggle="tooltip" title="Cerrar" name="CERRAR" value="CERRAR"  <?php echo $DISABLED2; ?> onclick="return validacion()">
                                                    <i class="ti-save-alt"></i> Cerrar
                                                </button>
                                            <?php } ?>
                                        </div>
                                        <div class="btn-group  col-xxl-4 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12  float-right">
                                            <?php if ($OP != ""): ?>
                                                <button type="button" class="btn btn-info  " data-toggle="tooltip" title="Informe" id="defecto" name="tarjas" Onclick="abrirPestana('../../assest/documento/informePcdespacho.php?parametro=<?php echo $IDOP; ?>&&usuario=<?php echo $IDUSUARIOS; ?>');">
                                                    <i class="fa fa-file-pdf-o"></i> Informe
                                                </button>
                                                <button type="button" class="btn btn-info  " data-toggle="tooltip" title="Packing List" id="defecto" name="tarjas" Onclick="abrirPestana('../../assest/documento/informePCdespachoPtPackingList.php?parametro=<?php echo $IDOP; ?>&&usuario=<?php echo $IDUSUARIOS; ?>');">
                                                    <i class="fa fa-file-pdf-o"></i> Packing List
                                                </button>
                                                <button type="button" class="btn btn-info  " data-toggle="tooltip" title="Comercial" id="defecto" name="tarjas" Onclick="abrirPestana('../../assest/documento/informePCdespachoPtComercial.php?parametro=<?php echo $IDOP; ?>&&usuario=<?php echo $IDUSUARIOS; ?>');">
                                                    <i class="fa fa-file-pdf-o"></i> Comercial
                                                </button>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--.row -->
                        </form>

                        <?php if (isset($_GET['op'])): ?>
                            <div class="card">
                                <div class="card-header bg-info">
                                    <h4 class="card-title">Detalle Planificador Carga</h4>
                                </div>
                                <div class="card-header">
                                        <div class="form-row align-items-center">
                                            <form method="post" id="form1">
                                                <input type="hidden" class="form-control" placeholder="ID DESPACHO" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="OP DESPACHO" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="URL DESPACHO" id="URLP" name="URLP" value="registroPcdespacho" />
                                                <input type="hidden" class="form-control" placeholder="URL SELECCIONAR" id="URLD" name="URLD" value="registroSelecionExistenciaPTPcdespacho" />
                                                <div class="col-auto">
                                                    <button type="submit" class="btn btn-success btn-block mb-2" data-toggle="tooltip" title="Seleccion Existencia" id="SELECIONOCDURL" name="SELECIONOCDURL"
                                                        <?php echo $DISABLED2; ?>  <?php   if ($ESTADO == 0) {   echo "disabled style='background-color: #eeeeee;'"; } ?>  > 
                                                        Seleccion Existencias
                                                    </button>
                                                </div>
                                            </form>
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
                                        </div>
                                    </div>
                                <label id="val_validacion" class="validacion"><?php echo $MENSAJE; ?> </label>                            
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table id="detalle" class="table-hover " style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <a href="#" class="text-warning hover-warning">
                                                                    N° Folio
                                                                </a>
                                                            </th>
                                                            <th>Condición </th>
                                                            <th class="text-center">Operaciónes</th>
                                                            <th>Fecha Embalado </th>
                                                            <th>Código Estandar</th>
                                                            <th>Envase/Estandar</th>
                                                            <th>Variedad</th>
                                                            <th>Cantidad Envase</th>
                                                            <th>Kilos Neto</th>
                                                            <th>% Deshidratacion</th>
                                                            <th>Kilos Deshidratacion</th>
                                                            <th>Kilos Bruto</th>
                                                            <th>CSG</th>
                                                            <th>Productor</th>
                                                            <th>Embolsado</th>
                                                            <th>Tipo Manejo</th>
                                                            <th>Calibre </th>
                                                            <th>Embalaje </th>
                                                            <th>Stock </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if ($ARRAYTOMADO) { ?>
                                                            <?php foreach ($ARRAYTOMADO as $r) : ?>
                                                                <?php
                                                                if ($r['TESTADOSAG'] == null || $r['TESTADOSAG'] == "0") {
                                                                    $ESTADOSAG = "Sin Condición";
                                                                }
                                                                if ($r['TESTADOSAG'] == "1") {
                                                                    $ESTADOSAG =  "En Inspección";
                                                                }
                                                                if ($r['TESTADOSAG'] == "2") {
                                                                    $ESTADOSAG =  "Aprobado Origen";
                                                                }
                                                                if ($r['TESTADOSAG'] == "3") {
                                                                    $ESTADOSAG =  "Aprobado USLA";
                                                                }
                                                                if ($r['TESTADOSAG'] == "4") {
                                                                    $ESTADOSAG =  "Fumigado";
                                                                }
                                                                if ($r['TESTADOSAG'] == "5") {
                                                                    $ESTADOSAG =  "Rechazado";
                                                                }
                                                                $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);
                                                                if ($ARRAYVERPRODUCTORID) {
                                                                    $CSGPRODUCTOR = $ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'];
                                                                    $NOMBREPRODUCTOR = $ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'];
                                                                } else {
                                                                    $CSGPRODUCTOR = "Sin Datos";
                                                                    $NOMBREPRODUCTOR = "Sin Datos";
                                                                }
                                                                $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
                                                                if ($ARRAYVERVESPECIESID) {
                                                                    $NOMBREVARIEDAD = $ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'];
                                                                } else {
                                                                    $NOMBREVARIEDAD = "Sin Datos";
                                                                }
                                                                $ARRAYEVERERECEPCIONID = $EEXPORTACION_ADO->verEstandar($r['ID_ESTANDAR']);
                                                                if ($ARRAYEVERERECEPCIONID) {
                                                                    $CODIGOESTANDAR = $ARRAYEVERERECEPCIONID[0]['CODIGO_ESTANDAR'];
                                                                    $NOMBREESTANDAR = $ARRAYEVERERECEPCIONID[0]['NOMBRE_ESTANDAR'];
                                                                } else {
                                                                    $NOMBREESTANDAR = "Sin Datos";
                                                                    $CODIGOESTANDAR = "Sin Datos";
                                                                }
                                                                if ($r['EMBOLSADO'] == "1") {
                                                                    $EMBOLSADO =  "SI";
                                                                }
                                                                if ($r['EMBOLSADO'] == "0") {
                                                                    $EMBOLSADO =  "NO";
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
                                                                ?>
                                                                <tr class="center">
                                                                    <td><?php echo $r['FOLIO_AUXILIAR_EXIEXPORTACION']; ?> </td>
                                                                    <td><?php echo $ESTADOSAG; ?></td>
                                                                    <td>
                                                                        <form method="post" id="form1">
                                                                            <input type="hidden" class="form-control" id="IDQUITAR" name="IDQUITAR" value="<?php echo $r['ID_EXIEXPORTACION']; ?>" />
                                                                            <div class="btn-group btn-rounded btn-block col-10" role="group" aria-label="Operaciones Detalle">
                                                                                <button type="submit" class="btn btn-sm btn-danger   " id="QUITAR" name="QUITAR" data-toggle="tooltip" title="Quitar Existencia"
                                                                                    <?php echo $DISABLED2; ?>   <?php if ($ESTADO == 0) {  echo "disabled"; } ?>> 
                                                                                    <i class="ti-close"></i><br> Quitar
                                                                                </button>
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
                                                                    <td><?php echo $r['DESHIRATACION']; ?></td>
                                                                    <td><?php echo $r['BRUTO']; ?></td>
                                                                    <td><?php echo $CSGPRODUCTOR; ?></td>
                                                                    <td><?php echo $NOMBREPRODUCTOR; ?></td>
                                                                    <td><?php echo $EMBOLSADO; ?></td>
                                                                    <td><?php echo $NOMBRETMANEJO; ?></td>
                                                                    <td><?php echo $NOMBRETCALIBRE; ?></td>
                                                                    <td><?php echo $NOMBRETEMBALAJE; ?></td>
                                                                    <td><?php echo $r['STOCKR']; ?></td>
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
            //OPERACIONES
            //OPERACION DE REGISTRO DE FILA
            if (isset($_REQUEST['CREAR'])) {
                $ARRAYNUMERO = $PCDESPACHO_ADO->obtenerNumero($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
                $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;
                $PCDESPACHO->__SET('NUMERO_PCDESPACHO', $NUMERO);
                $PCDESPACHO->__SET('FECHA_PCDESPACHO', $_REQUEST['FECHAPCDESPACHO']);
                $PCDESPACHO->__SET('MOTIVO_PCDESPACHO', $_REQUEST['MOTIVOPCDESPACHO']);
                $PCDESPACHO->__SET('TINPUSDA', $_REQUEST['TINPUSDA']);
                $PCDESPACHO->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                $PCDESPACHO->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
                $PCDESPACHO->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
                $PCDESPACHO->__SET('ID_USUARIOI', $IDUSUARIOS);
                $PCDESPACHO->__SET('ID_USUARIOM', $IDUSUARIOS);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $PCDESPACHO_ADO->agregarPcdespacho($PCDESPACHO);

                $ARRYAOBTENERID = $PCDESPACHO_ADO->obtenerId(
                    $_REQUEST['FECHAPCDESPACHO'],
                    $_REQUEST['MOTIVOPCDESPACHO'],
                    $_REQUEST['EMPRESA'],
                    $_REQUEST['PLANTA'],
                    $_REQUEST['TEMPORADA']
                );

                $AUSUARIO_ADO->agregarAusuario2($NUMERO,1,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de PC","fruta_pcdespacho",$ARRYAOBTENERID[0]['ID_PCDESPACHO'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],$_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );

                //REDIRECCIONAR A PAGINA registroPcdespacho.php
                $id_dato = $ARRYAOBTENERID[0]['ID_PCDESPACHO'];
                $accion_dato = "crear";
                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Creado",
                        text:"El registro de PC se ha creado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                            location.href = "registroPcdespacho.php?op&id='.$id_dato.'&a='.$accion_dato.'";
                        
                    })
                </script>';
                // echo "<script type='text/javascript'> location.href ='registroPcdespacho.php?op';</script>";
            }
            //OPERACION EDICION DE FILA
            if (isset($_REQUEST['GUARDAR'])) {
                $PCDESPACHO->__SET('CANTIDAD_ENVASE_PCDESPACHO', $_REQUEST['TOTALENVASE']);
                $PCDESPACHO->__SET('KILOS_NETO_PCDESPACHO', $_REQUEST['TOTALNETO']);
                $PCDESPACHO->__SET('FECHA_PCDESPACHO', $_REQUEST['FECHAPCDESPACHO']);
                $PCDESPACHO->__SET('MOTIVO_PCDESPACHO', $_REQUEST['MOTIVOPCDESPACHO']);
                $PCDESPACHO->__SET('TINPUSDA', $_REQUEST['TINPUSDAE']);
                $PCDESPACHO->__SET('ID_USUARIOM', $IDUSUARIOS);
                $PCDESPACHO->__SET('ID_PCDESPACHO', $_REQUEST['IDP']);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $PCDESPACHO_ADO->actualizarPcdespacho($PCDESPACHO);

                $AUSUARIO_ADO->agregarAusuario2($NUMEROVER,1,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de PC","fruta_pcdespacho",$_REQUEST['IDP'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],$_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );

                
                if ($accion_dato == "crear") {
                    $id_dato = $_REQUEST['IDP'];
                    $accion_dato = "crear";
                    echo '<script>
                        Swal.fire({
                            icon:"info",
                            title:"Registro Modificado",
                            text:"El registro de PC se ha modificada correctamente",
                            showConfirmButton: true,
                            confirmButtonText:"Cerrar",
                            closeOnConfirm:false
                        }).then((result)=>{
                            location.href = "registroPcdespacho.php?op&id='.$id_dato.'&a='.$accion_dato.'";                        
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
                            text:"El registro de PC se ha modificada correctamente",
                            showConfirmButton: true,
                            confirmButtonText:"Cerrar",
                            closeOnConfirm:false
                        }).then((result)=>{
                            location.href = "registroPcdespacho.php?op&id='.$id_dato.'&a='.$accion_dato.'";                        
                        })
                    </script>';
                }
            }
            //OPERACION EDICION DE FILA
            if (isset($_REQUEST['CERRAR'])) {
                $ARRAYTOMADO = $EXIEXPORTACION_ADO->buscarPorPcdespacho($_REQUEST['IDP']);

                if ($ARRAYTOMADO) {
                    $SINO = "0";
                    $MENSAJE = "";
                } else {
                    $SINO = "1";
                    echo '<script>
                            Swal.fire({
                                icon:"warning",
                                title:"Accion restringida",
                                text:"Tiene que haber al menos un registro de existencia selecionado",
                                showConfirmButton: true,
                                confirmButtonText:"Cerrar",
                                closeOnConfirm:false
                            })
                        </script>';
                }

                if ($SINO == "0") {
                    $PCDESPACHO->__SET('CANTIDAD_ENVASE_PCDESPACHO', $_REQUEST['TOTALENVASE']);
                    $PCDESPACHO->__SET('KILOS_NETO_PCDESPACHO', $_REQUEST['TOTALNETO']);
                    $PCDESPACHO->__SET('FECHA_PCDESPACHO', $_REQUEST['FECHAPCDESPACHO']);
                    $PCDESPACHO->__SET('MOTIVO_PCDESPACHO', $_REQUEST['MOTIVOPCDESPACHO']);
                    $PCDESPACHO->__SET('TINPUSDA', $_REQUEST['TINPUSDAE']);
                    $PCDESPACHO->__SET('ID_USUARIOM', $IDUSUARIOS);
                    $PCDESPACHO->__SET('ID_PCDESPACHO', $_REQUEST['IDP']);
                    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                    $PCDESPACHO_ADO->actualizarPcdespacho($PCDESPACHO);

                    $PCDESPACHO->__SET('ID_PCDESPACHO', $_REQUEST['IDP']);
                    // LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                    $PCDESPACHO_ADO->confirmado($PCDESPACHO);

                    $PCDESPACHO->__SET('ID_PCDESPACHO', $_REQUEST['IDP']);
                    // LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                    $PCDESPACHO_ADO->cerrado($PCDESPACHO);

                    $AUSUARIO_ADO->agregarAusuario2($NUMEROVER,1,3,"".$_SESSION["NOMBRE_USUARIO"].", Cerrar PC ","fruta_pcdespacho",$_REQUEST['IDP'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],$_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );

                    //REDIRECCIONAR A PAGINA registroPcdespacho.php 
                    //SEGUNE EL TIPO DE OPERACIONS QUE SE INDENTIFIQUE EN LA URL

                    if ($accion_dato == "crear") {
                        $id_dato = $_REQUEST['IDP'];
                        $accion_dato = "ver";
                        echo '<script>
                            Swal.fire({
                                icon:"info",
                                title:"Registro Cerrado",
                                text:"Este PC se encuentra cerrada y no puede ser modificada.",
                                showConfirmButton: true,
                                confirmButtonText:"Cerrar",
                                closeOnConfirm:false
                            }).then((result)=>{
                                location.href = "registroPcdespacho.php?op&id='.$id_dato.'&a='.$accion_dato.'";                            
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
                                text:"Este PC se encuentra cerrada y no puede ser modificada.",
                                showConfirmButton: true,
                                confirmButtonText:"Cerrar",
                                closeOnConfirm:false
                            }).then((result)=>{
                                location.href = "registroPcdespacho.php?op&id='.$id_dato.'&a='.$accion_dato.'";                            
                            })
                        </script>';
                    }     
                }
            }
            if (isset($_REQUEST['QUITAR'])) {
                $IDQUITAR = $_REQUEST['IDQUITAR'];
                $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $IDQUITAR);
                // LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $EXIEXPORTACION_ADO->actualizarDeselecionarPCCambiarEstado($EXIEXPORTACION);
                
                $AUSUARIO_ADO->agregarAusuario2("NULL",1,2,"".$_SESSION["NOMBRE_USUARIO"].", Se Quito la Existencia de PC.","fruta_exiexportacion", "NULL" ,$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  
                
                echo '<script>
                    Swal.fire({
                        icon:"error",
                        title:"Accion realizada",
                        text:"Se ha quitado la existencia del PC.",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroPcdespacho.php?op&id='.$id_dato.'&a='.$accion_dato.'";                            
                    })
                </script>';
            }
        ?>
</body>

</html>