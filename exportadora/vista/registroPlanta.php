<?php

include_once "../../assest/config/validarUsuarioExpo.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/COMUNA_ADO.php';
include_once '../../assest/controlador/PROVINCIA_ADO.php';
include_once '../../assest/controlador/REGION_ADO.php';


include_once '../../assest/modelo/PLANTA.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$COMUNA_ADO =  new COMUNA_ADO();
$PROVINCIA_ADO =  new PROVINCIA_ADO();
$REGION_ADO =  new REGION_ADO();


//INIICIALIZAR MODELO
$PLANTA =  new PLANTA();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$OP = "";
$DISABLED = "";

$NOMBREPLANTA = "";
$RAZONSOCIAL = "";
$DIRECCION = "";
$CODIGOSAG = "";
$FDA = "";
$TPLANTA = "";
$COMUNA = "";
$PROVINCIA = "";
$REGION = "";
$EMPRESA = "";
$CONTADOR=0;

$NOMBRE = "";
$MENSAJE = "";
$FOCUS = "";
$MENSAJE2 = "";
$FOCUS2 = "";
$BORDER = "";

//INICIALIZAR ARREGLOS
$ARRAYPLANTA = "";
$ARRAYPLANTAID = "";
$ARRAYCOMUNA = "";
$ARRAYCIUDAD = "";
$ARRAYBODEGA = "";
$ARRAYEMPRESA = "";



//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYPLANTA = $PLANTA_ADO->listarPlantaCBX();

$ARRAYCOMUNA = $COMUNA_ADO->listarComuna3CBX();
$ARRAYPROVINCIA  = $PROVINCIA_ADO->listarProvincia3CBX();
$ARRAYREGION = $REGION_ADO->listarRegion3CBX();
include_once "../../assest/config/validarDatosUrl.php";
include_once "../../assest/config/datosUrl.php";


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
//PARA OPERACIONES DE EDICION Y VISUALIZACION
//PREGUNTA SI LA URL VIENE  CON DATOS "parametro" y "parametro1"
if (isset($id_dato) && isset($accion_dato)) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $id_dato;
    $OP = $accion_dato;

    //IDENTIFICACIONES DE OPERACIONES
    //OPERACION DE CAMBIO DE ESTADO
    //0 = DESACTIVAR
    if ($OP == "0") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION
        $DISABLED = "disabled";
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO S
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYPLANTAID = $PLANTA_ADO->verPlanta($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYPLANTAID as $r) :
            $NOMBREPLANTA = "" . $r['NOMBRE_PLANTA'];
            $RAZONSOCIAL = "" . $r['RAZON_SOCIAL_PLANTA'];
            $DIRECCION = "" . $r['DIRECCION_PLANTA'];
            $CODIGOSAG = "" . $r['CODIGO_SAG_PLANTA'];
            $FDA = "" . $r['FDA_PLANTA'];
            $COMUNA = "" . $r['ID_COMUNA'];
            $PROVINCIA = "" . $r['ID_PROVINCIA'];
            $REGION = "" . $r['ID_REGION'];
            $TPLANTA = "" . $r['TPLANTA'];
        endforeach;

    }
    //1 = ACTIVAR
    if ($OP == "1") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION
        $DISABLED = "disabled";
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO S
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYPLANTAID = $PLANTA_ADO->verPlanta($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYPLANTAID as $r) :
            $NOMBREPLANTA = "" . $r['NOMBRE_PLANTA'];
            $RAZONSOCIAL = "" . $r['RAZON_SOCIAL_PLANTA'];
            $DIRECCION = "" . $r['DIRECCION_PLANTA'];
            $CODIGOSAG = "" . $r['CODIGO_SAG_PLANTA'];
            $FDA = "" . $r['FDA_PLANTA'];
            $COMUNA = "" . $r['ID_COMUNA'];
            $PROVINCIA = "" . $r['ID_PROVINCIA'];
            $REGION = "" . $r['ID_REGION'];
            $TPLANTA = "" . $r['TPLANTA'];
        endforeach;

    }

    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYPLANTAID = $PLANTA_ADO->verPlanta($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYPLANTAID as $r) :
            $NOMBREPLANTA = "" . $r['NOMBRE_PLANTA'];
            $RAZONSOCIAL = "" . $r['RAZON_SOCIAL_PLANTA'];
            $DIRECCION = "" . $r['DIRECCION_PLANTA'];
            $CODIGOSAG = "" . $r['CODIGO_SAG_PLANTA'];
            $FDA = "" . $r['FDA_PLANTA'];
            $COMUNA = "" . $r['ID_COMUNA'];
            $PROVINCIA = "" . $r['ID_PROVINCIA'];
            $REGION = "" . $r['ID_REGION'];
            $TPLANTA = "" . $r['TPLANTA'];
        endforeach;
    }
    //ver =  OBTENCION DE DATOS PARA LA VISUALIZAAR INFORMAICON DE REGISTRO

    if ($OP == "ver") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION
        $DISABLED = "disabled";
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO S
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYPLANTAID = $PLANTA_ADO->verPlanta($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYPLANTAID as $r) :
            $NOMBREPLANTA = "" . $r['NOMBRE_PLANTA'];
            $RAZONSOCIAL = "" . $r['RAZON_SOCIAL_PLANTA'];
            $DIRECCION = "" . $r['DIRECCION_PLANTA'];
            $CODIGOSAG = "" . $r['CODIGO_SAG_PLANTA'];
            $FDA = "" . $r['FDA_PLANTA'];
            $COMUNA = "" . $r['ID_COMUNA'];
            $PROVINCIA = "" . $r['ID_PROVINCIA'];
            $REGION = "" . $r['ID_REGION'];
            $TPLANTA = "" . $r['TPLANTA'];
        endforeach;
    }
}

if($_POST){
    if (isset($_REQUEST['NOMBREPLANTA'])) {
        $NOMBREPLANTA = $_REQUEST['NOMBREPLANTA'];
    }
    if (isset($_REQUEST['RAZONSOCIAL'])) {
        $RAZONSOCIAL = $_REQUEST['RAZONSOCIAL'];
    }
    if (isset($_REQUEST['DIRECCION'])) {
        $DIRECCION = $_REQUEST['DIRECCION'];
    }
    if (isset($_REQUEST['CODIGOSAG'])) {
        $CODIGOSAG = $_REQUEST['CODIGOSAG'];
    }
    if (isset($_REQUEST['FDA'])) {
        $FDA = $_REQUEST['FDA'];
    }  
    if (isset($_REQUEST['COMUNA'])) {
        $COMUNA = $_REQUEST['COMUNA'];
    }
    if (isset($_REQUEST['PROVINCIA'])) {
        $PROVINCIA = $_REQUEST['PROVINCIA'];
    }
    if (isset($_REQUEST['REGION'])) {
        $REGION = $_REQUEST['REGION'];
    }
    if (isset($_REQUEST['TPLANTA'])) {
        $TPLANTA = $_REQUEST['TPLANTA'];
    }
}

?>



<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registrar Planta</title>
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

                    NOMBREPLANTA = document.getElementById("NOMBREPLANTA").value;
                    RAZONSOCIAL = document.getElementById("RAZONSOCIAL").value;
                    DIRECCION = document.getElementById("DIRECCION").value;
                    CODIGOSAG = document.getElementById("CODIGOSAG").value;
                    TPLANTA = document.getElementById("TPLANTA").selectedIndex;
                    COMUNA = document.getElementById("COMUNA").selectedIndex;
                    PROVINCIA = document.getElementById("PROVINCIA").selectedIndex;
                    REGION = document.getElementById("REGION").selectedIndex;

                    FDA = document.getElementById("FDA").value;

                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_razonsocial').innerHTML = "";
                    document.getElementById('val_direccion').innerHTML = "";
                    document.getElementById('val_codigosag').innerHTML = "";
                    document.getElementById('val_tplanta').innerHTML = "";
                    document.getElementById('val_comuna').innerHTML = "";
                    document.getElementById('val_provincia').innerHTML = "";
                    document.getElementById('val_region').innerHTML = "";
                    document.getElementById('val_fda').innerHTML = "";

                    if (NOMBREPLANTA == null || NOMBREPLANTA.length == 0 || /^\s+$/.test(NOMBREPLANTA)) {
                        document.form_reg_dato.NOMBREPLANTA.focus();
                        document.form_reg_dato.NOMBREPLANTA.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBREPLANTA.style.borderColor = "#4AF575";
                    if (RAZONSOCIAL == null || RAZONSOCIAL.length == 0 || /^\s+$/.test(RAZONSOCIAL)) {
                        document.form_reg_dato.RAZONSOCIAL.focus();
                        document.form_reg_dato.RAZONSOCIAL.style.borderColor = "#FF0000";
                        document.getElementById('val_razonsocial').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.RAZONSOCIAL.style.borderColor = "#4AF575";
                    if (DIRECCION == null || DIRECCION.length == 0 || /^\s+$/.test(DIRECCION)) {
                        document.form_reg_dato.DIRECCION.focus();
                        document.form_reg_dato.DIRECCION.style.borderColor = "#FF0000";
                        document.getElementById('val_direccion').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DIRECCION.style.borderColor = "#4AF575";
                    if (CODIGOSAG == null || CODIGOSAG.length == 0 || /^\s+$/.test(CODIGOSAG)) {
                        document.form_reg_dato.CODIGOSAG.focus();
                        document.form_reg_dato.CODIGOSAG.style.borderColor = "#FF0000";
                        document.getElementById('val_codigosag').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.CODIGOSAG.style.borderColor = "#4AF575";

                    if (TPLANTA == null || TPLANTA == 0) {
                        document.form_reg_dato.TPLANTA.focus();
                        document.form_reg_dato.TPLANTA.style.borderColor = "#FF0000";
                        document.getElementById('val_tplanta').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.TPLANTA.style.borderColor = "#4AF575";

                    if (COMUNA == null || COMUNA == 0) {
                        document.form_reg_dato.COMUNA.focus();
                        document.form_reg_dato.COMUNA.style.borderColor = "#FF0000";
                        document.getElementById('val_comuna').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.COMUNA.style.borderColor = "#4AF575";

                    if (PROVINCIA == null || PROVINCIA == 0) {
                        document.form_reg_dato.PROVINCIA.focus();
                        document.form_reg_dato.PROVINCIA.style.borderColor = "#FF0000";
                        document.getElementById('val_provincia').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.PROVINCIA.style.borderColor = "#4AF575";

                    if (REGION == null || REGION == 0) {
                        document.form_reg_dato.REGION.focus();
                        document.form_reg_dato.REGION.style.borderColor = "#FF0000";
                        document.getElementById('val_region').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.REGION.style.borderColor = "#4AF575";


                    if (FDA == null || FDA.length == 0 || /^\s+$/.test(FDA)) {
                        document.form_reg_dato.FDA.focus();
                        document.form_reg_dato.FDA.style.borderColor = "#FF0000";
                        document.getElementById('val_fda').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.FDA.style.borderColor = "#4AF575";
                }
                //FUNCION PARA REALIZAR UNA ACTUALIZACION DEL FORMULARIO DE REGISTRO DE RECEPCIONMP
                function refrescar() {
                    document.getElementById("form_reg_dato").submit();
                }

                //FUNCION PARA ABRIR VENTANA QUE SE ENCUENTRA LA OPERACIONES DE DETALLE DE RECEPCIONMP
                function abrirVentana(url) {
                    var opciones =
                        "'directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=1600, height=1000'";
                    window.open(url, 'window', opciones);
                }

                //REDIRECCIONAR A LA PAGINA SELECIONADA
                function irPagina(url) {
                    location.href = "" + url;
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
            <?php include_once "../../assest/config/menuExpo.php"; ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="container-full">

                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Principal</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a> </li>
                                            <li class="breadcrumb-item" aria-current="page">Mantenedores</li>
                                            <li class="breadcrumb-item" aria-current="page">Principal</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Registro Planta </a> </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <?php include_once "../../assest/config/verIndicadorEconomico.php"; ?>
                        </div>
                    </div>
                    <!-- Main content -->
                    <section class="content">
                        <div class="row">
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                <div class="box">
                                    <div class="box-header with-border bg-primary">                                        
                                        <h4 class="box-title">Registro Planta</h4>                                    
                                    </div>
                                    <!-- /.box-header -->
                                    <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato">
                                        <div class="box-body">
                                            <hr class="my-15">
                                            <div class="row">
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">    
                                                    <div class="form-group">
                                                        <label>Nombre </label>
                                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                        <input type="text" class="form-control" placeholder="Nombre Planta" id="NOMBREPLANTA" name="NOMBREPLANTA" value="<?php echo $NOMBREPLANTA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nombre" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">    
                                                    <div class="form-group">
                                                        <label>Razon Social</label>
                                                        <input type="text" class="form-control" placeholder="Razon Social" id="RAZONSOCIAL" name="RAZONSOCIAL" value="<?php echo $RAZONSOCIAL; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_razonsocial" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">    
                                                    <div class="form-group">
                                                        <label>Direccion</label>
                                                        <input type="text" class="form-control" placeholder="Direccion" id="DIRECCION" name="DIRECCION" value="<?php echo $DIRECCION; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_direccion" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">    
                                                    <div class="form-group">
                                                        <label>Codigo SAG</label>
                                                        <input type="number" class="form-control" placeholder="Codigo SAG" id="CODIGOSAG" name="CODIGOSAG" value="<?php echo $CODIGOSAG; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_codigosag" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">    
                                                    <div class="form-group">
                                                        <label>Tipo Planta</label>
                                                        <select class="form-control select2" id="TPLANTA" name="TPLANTA" style="width: 100%;" value="<?php echo $TPLANTA; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <option value="1" <?php if ($TPLANTA == "1") { echo "selected"; } ?>> Propia </option>
                                                            <option value="2" <?php if ($TPLANTA == "2") { echo "selected"; } ?>> Externa </option>
                                                        </select>
                                                        <label id="val_tplanta" class="validacion"> </label>
                                                    </div>
                                                </div>   
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">    
                                                    <div class="form-group">
                                                        <label>FDA</label>
                                                        <input type="number" class="form-control" placeholder="FDA" id="FDA" name="FDA" value="<?php echo $FDA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_fda" class="validacion"> </label>
                                                    </div>
                                                </div>                                             
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-9 col-9 col-xs-9">
                                                    <div class="form-group">
                                                        <label> Comuna</label>
                                                        <select class="form-control select2" id="COMUNA" name="COMUNA" style="width: 100%;" value="<?php echo $COMUNA; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYCOMUNA as $r) : ?>
                                                                <?php if ($ARRAYCOMUNA) {    ?>
                                                                    <option value="<?php echo $r['ID_COMUNA']; ?>" 
                                                                    <?php if ($COMUNA == $r['ID_COMUNA']) { echo "selected";  } ?>>
                                                                        <?php echo $r['COMUNA'] ?>, <?php echo $r['PROVINCIA'] ?>, <?php echo $r['REGION'] ?>, <?php echo $r['PAIS'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No Hay Datos Registrados </option>
                                                                <?php } ?>

                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_comuna" class="validacion"> </label>
                                                    </div>
                                                </div>    
                                                <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-3 col-3 col-xs-3">
                                                    <div class="form-group">  
                                                    <label>Agregar</label>                  
                                                        <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" <?php echo $DISABLED; ?>  title="Agregar Comuna" id="defecto" name="pop" 
                                                        Onclick="abrirVentana('registroPopComuna.php' ); ">
                                                        <i class="icon-copy fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>        
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-9 col-9 col-xs-9">
                                                    <div class="form-group">
                                                        <label> Provincia</label>
                                                        <select class="form-control select2" id="PROVINCIA" name="PROVINCIA" style="width: 100%;" value="<?php echo $PROVINCIA; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYPROVINCIA as $r) : ?>
                                                                <?php if ($ARRAYPROVINCIA) {    ?>
                                                                    <option value="<?php echo $r['ID_PROVINCIA']; ?>" 
                                                                        <?php if ($PROVINCIA == $r['ID_PROVINCIA']) {  echo "selected";  } ?>>
                                                                         <?php echo $r['PROVINCIA'] ?>, <?php echo $r['REGION'] ?>, <?php echo $r['PAIS'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No Hay Datos Registrados </option>
                                                                <?php } ?>

                                                            <?php endforeach; ?>

                                                        </select>
                                                        <label id="val_provincia" class="validacion"> </label>
                                                    </div>
                                                </div>  
                                                <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-3 col-3 col-xs-3">
                                                    <div class="form-group">  
                                                    <label>Agregar</label>                  
                                                        <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" <?php echo $DISABLED; ?>  title="Agregar Provincia" id="defecto" name="pop" 
                                                        Onclick="abrirVentana('registroPopProvincia.php' ); ">
                                                        <i class="icon-copy fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-9 col-9 col-xs-9">
                                                    <div class="form-group">
                                                        <label> Region</label>
                                                        <select class="form-control select2" id="REGION" name="REGION" style="width: 100%;" value="<?php echo $REGION; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYREGION as $r) : ?>
                                                                <?php if ($ARRAYREGION) {    ?>
                                                                    <option value="<?php echo $r['ID_REGION']; ?>" 
                                                                        <?php if ($REGION == $r['ID_REGION']) { echo "selected";  } ?>>
                                                                        <?php echo $r['REGION'] ?>, <?php echo $r['PAIS'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No Hay Datos Registrados </option>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_region" class="validacion"> </label>
                                                    </div>
                                                </div>   
                                                <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-3 col-3 col-xs-3">
                                                    <div class="form-group">  
                                                    <label>Agregar</label>                  
                                                        <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" <?php echo $DISABLED; ?>  title="Agregar Region" id="defecto" name="pop" 
                                                        Onclick="abrirVentana('registroPopRegion.php' ); ">
                                                        <i class="icon-copy fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
                                        <!-- /.box-body -->                             
                                        <div class="box-footer">
                                            <div class="btn-group   col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12 " role="group" aria-label="Acciones generales">                                    
                                                <button type="button" class="btn  btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroPlanta.php');">
                                                    <i class="ti-trash"></i>Cancelar
                                                </button>
                                                <?php if ($OP == "editar") { ?>
                                                    <button type="submit" class="btn btn-primary" name="EDITAR" value="EDITAR"   data-toggle="tooltip" title="Guardar" Onclick="return validacion()">
                                                        <i class="ti-save-alt"></i> Guardar
                                                    </button>
                                                <?php } else if($OP == "0") { ?>
                                                    <button type="submit" class="btn btn-danger" name="ELIMINAR" value="ELIMINAR"  data-toggle="tooltip" title="Deshabilitar"  >
                                                        <i class="ti-save-alt"></i> Deshabilitar
                                                    </button>
                                                <?php } else if($OP == "1"){ ?>                                                    
                                                    <button type="submit" class="btn btn-success" name="HABILITAR" value="HABILITAR"  data-toggle="tooltip" title="Habilitar"   >
                                                        <i class="ti-save-alt"></i> Habilitar
                                                    </button>
                                                <?php } else { ?>
                                                    <button type="submit" class="btn btn-primary" name="GUARDAR" value="GUARDAR"  data-toggle="tooltip" title="Guardar"  <?php echo $DISABLED; ?> Onclick="return validacion()">
                                                        <i class="ti-save-alt"></i> Guardar
                                                    </button>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.box -->
                            </div>
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                <div class="box">
                                    <div class="box-header with-border bg-info">
                                        <h4 class="box-title"> Agrupado Planta</h4>
                                    </div>
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <table id="listar" class="table-hover " style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        
                                                        <th>Numero</th>
                                                        <th class="text-center">Operaciónes</th>
                                                        <th>Codigo SAG </th>
                                                        <th>Nombre </th>
                                                        <th>Direccion </th>
                                                        <th>Razon Social </th>
                                                        <th>Tipo Planta </th>
                                                        <th>FDA </th>
                                                        <th>Comuna </th>
                                                        <th>Provincia </th>
                                                        <th>Region </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYPLANTA as $r) : ?>
                                                        <?php 
                                                            $CONTADOR+=1;  

                                                            $ARRAYVERCOMUNA=$COMUNA_ADO->verComuna($r["ID_COMUNA"]);
                                                            if($ARRAYVERCOMUNA){
                                                                $NOMBRECOMUNA = $ARRAYVERCOMUNA[0]["NOMBRE_COMUNA"];
                                                            }else{
                                                                $NOMBRECOMUNA="Sin Datos";
                                                            }                                                            
                                                            $ARRAYVERPROVINCIA=$PROVINCIA_ADO->verProvincia($r["ID_PROVINCIA"]);
                                                            if($ARRAYVERPROVINCIA){
                                                                $NOMBREPROVINCIA = $ARRAYVERPROVINCIA[0]["NOMBRE_PROVINCIA"];
                                                            }else{
                                                                $NOMBREPROVINCIA="Sin Datos";
                                                            }                                                        
                                                            $ARRAYVERREGION=$REGION_ADO->verRegion($r["ID_REGION"]);
                                                            if($ARRAYVERREGION){
                                                                $NOMBREREGION = $ARRAYVERREGION[0]["NOMBRE_REGION"];
                                                            }else{
                                                                $NOMBREREGION="Sin Datos";
                                                            }                                                 
                                                            if($r["TPLANTA"]==1){
                                                                $NOMBRETPLANTA="Propia";
                                                            }else if($r["TPLANTA"]==2){
                                                                $NOMBRETPLANTA="Externa";
                                                            }else{                                                                
                                                                $NOMBRETPLANTA="Sin Datos";
                                                            }
                                                            ?>
                                                        <tr class="center">
                                                            
                                                            <td><?php echo $CONTADOR; ?> </td>                                                                      
                                                            <td class="text-center">
                                                                <form method="post" id="form1">
                                                                    <div class="list-icons d-inline-flex">
                                                                        <div class="list-icons-item dropdown">
                                                                            <button class="btn btn-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                <span class="icon-copy ti-settings"></span>
                                                                            </button>
                                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                                <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_PLANTA']; ?>" />
                                                                                <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroPlanta" />
                                                                                <span href="#" class="dropdown-item" data-toggle="tooltip" title="Ver">
                                                                                    <button type="submit" class="btn btn-info btn-block  btn-sm" id="VERURL" name="VERURL">
                                                                                        <i class="ti-eye"></i> Ver
                                                                                    </button>
                                                                                </span> 
                                                                                <span href="#" class="dropdown-item" data-toggle="tooltip" title="Editar">
                                                                                    <button type="submit" class="btn  btn-warning btn-block   btn-sm" id="EDITARURL" name="EDITARURL">
                                                                                        <i class="ti-pencil-alt"></i> Editar
                                                                                    </button>
                                                                                </span>
                                                                                <?php if ($r['ESTADO_REGISTRO'] == 1) { ?>
                                                                                    <span href="#" class="dropdown-item" data-toggle="tooltip" title="Deshabilitar">
                                                                                        <button type="submit" class="btn btn-block btn-danger btn-sm" id="ELIMINARURL" name="ELIMINARURL">
                                                                                            <i class="ti-na "></i> Deshabilitar
                                                                                        </button>
                                                                                    </span>
                                                                                <?php } ?>
                                                                                <?php if ($r['ESTADO_REGISTRO'] == 0) { ?>
                                                                                    <span href="#" class="dropdown-item" data-toggle="tooltip" title="Habilitar">
                                                                                        <button type="submit" class="btn btn-block btn-success btn-sm" id="HABILITARURL" name="HABILITARURL">
                                                                                            <i class="ti-check "></i> Habilitar
                                                                                        </button>
                                                                                    </span>
                                                                                <?php } ?>                                                               
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </td>
                                                            <td><?php echo $r['CODIGO_SAG_PLANTA']; ?></td>   
                                                            <td><?php echo $r['NOMBRE_PLANTA']; ?></td>   
                                                            <td><?php echo $r['DIRECCION_PLANTA']; ?></td>   
                                                            <td><?php echo $r['RAZON_SOCIAL_PLANTA']; ?></td>  
                                                            <td><?php echo $NOMBRETPLANTA; ?></td> 
                                                            <td><?php echo $r['FDA_PLANTA']; ?></td>  
                                                            <td><?php echo $NOMBRECOMUNA; ?></td>  
                                                            <td><?php echo $NOMBREPROVINCIA; ?></td>  
                                                            <td><?php echo $NOMBREREGION; ?></td>                                                                
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box -->
                            </div>
                        </div>
                        <!--.row -->
                    </section>
                    <!-- /.content -->
                </div>
            </div>
            <!-- /.content-wrapper -->
            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php include_once "../../assest/config/footer.php"; ?>
                <?php include_once "../../assest/config/menuExtraExpo.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../../assest/config/urlBase.php"; ?>
        <?php 
            //OPERACIONES
            //OPERACION DE REGISTRO DE FILA
            if (isset($_REQUEST['GUARDAR'])) {

                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
                $PLANTA->__SET('NOMBRE_PLANTA', $_REQUEST['NOMBREPLANTA']);
                $PLANTA->__SET('RAZON_SOCIAL_PLANTA', $_REQUEST['RAZONSOCIAL']);
                $PLANTA->__SET('DIRECCION_PLANTA', $_REQUEST['DIRECCION']);
                $PLANTA->__SET('CODIGO_SAG_PLANTA', $_REQUEST['CODIGOSAG']);
                $PLANTA->__SET('FDA_PLANTA', $_REQUEST['FDA']);
                $PLANTA->__SET('TPLANTA', $_REQUEST['TPLANTA']);
                $PLANTA->__SET('ID_COMUNA', $_REQUEST['COMUNA']);  
                $PLANTA->__SET('ID_PROVINCIA', $_REQUEST['PROVINCIA']);  
                $PLANTA->__SET('ID_REGION', $_REQUEST['REGION']);   
                $PLANTA->__SET('ID_USUARIOI', $IDUSUARIOS);
                $PLANTA->__SET('ID_USUARIOM', $IDUSUARIOS);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $PLANTA_ADO->agregarPlanta($PLANTA);

                $AUSUARIO_ADO->agregarAusuario2("NULL",2,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Planta.","principal_planta","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );  

                //REDIRECCIONAR A PAGINA registroPlanta.php
                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Creado",
                        text:"El registro del mantenedor se ha creado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroPlanta.php";                            
                    })
                </script>';
            }

            //OPERACION DE EDICION DE FILA
            if (isset($_REQUEST['EDITAR'])) {
                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   

                $PLANTA->__SET('NOMBRE_PLANTA', $_REQUEST['NOMBREPLANTA']);
                $PLANTA->__SET('RAZON_SOCIAL_PLANTA', $_REQUEST['RAZONSOCIAL']);
                $PLANTA->__SET('DIRECCION_PLANTA', $_REQUEST['DIRECCION']);
                $PLANTA->__SET('CODIGO_SAG_PLANTA', $_REQUEST['CODIGOSAG']);
                $PLANTA->__SET('FDA_PLANTA', $_REQUEST['FDA']);
                $PLANTA->__SET('TPLANTA', $_REQUEST['TPLANTA']);
                $PLANTA->__SET('ID_COMUNA', $_REQUEST['COMUNA']);  
                $PLANTA->__SET('ID_PROVINCIA', $_REQUEST['PROVINCIA']);  
                $PLANTA->__SET('ID_REGION', $_REQUEST['REGION']);   
                $PLANTA->__SET('ID_USUARIOM', $IDUSUARIOS);
                $PLANTA->__SET('ID_PLANTA', $_REQUEST['ID']);
                //LLAMADA AL METODO DE EDICION DEL CONTROLADOR
                $PLANTA_ADO->actualizarPlanta($PLANTA);

                $AUSUARIO_ADO->agregarAusuario2("NULL",2,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de Planta.","principal_planta", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );     

                //REDIRECCIONAR A PAGINA registroPlanta.php
                
                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Modificado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroPlanta.php";                            
                    })
                </script>';
            }

            if (isset($_REQUEST['ELIMINAR'])) {         

                $PLANTA->__SET('ID_PLANTA', $_REQUEST['ID']);
                $PLANTA_ADO->deshabilitar($PLANTA);
             

                $AUSUARIO_ADO->agregarAusuario2("NULL",2,4,"".$_SESSION["NOMBRE_USUARIO"].", Deshabilitar  Planta.","principal_planta", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );                
                
                echo '<script>
                    Swal.fire({
                        icon:"error",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Deshabilitado correctamente", 
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroPlanta.php";                            
                    })
                </script>';
            }
            
            if (isset($_REQUEST['HABILITAR'])) {   

                $PLANTA->__SET('ID_PLANTA', $_REQUEST['ID']);
                $PLANTA_ADO->habilitar($PLANTA);

                $AUSUARIO_ADO->agregarAusuario2("NULL",2,5,"".$_SESSION["NOMBRE_USUARIO"].", Habilitar  Planta.","principal_planta", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );                               

                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Habilitado correctamente", 
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroPlanta.php";                            
                    })
                </script>';
            }
        
        ?>
</body>

</html>