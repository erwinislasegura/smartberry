<?php

include_once "../../assest/config/validarUsuarioExpo.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../../assest/controlador/COMUNA_ADO.php';
include_once '../../assest/controlador/PROVINCIA_ADO.php';
include_once '../../assest/controlador/REGION_ADO.php';


include_once '../../assest/modelo/EMPRESA.php';
include_once '../../assest/config/SUBIR.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$COMUNA_ADO =  new COMUNA_ADO();
$PROVINCIA_ADO =  new PROVINCIA_ADO();
$REGION_ADO =  new REGION_ADO();

//INIICIALIZAR MODELO
$EMPRESA =  new EMPRESA();
$SUBIR = new SUBIR();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$OP = "";
$DISABLED = "";
$ID = "";

$DIRECTORIODESTINO = "../../assest/img/empresa/";

$FOLIOMANUAL = "";
$USOCALIBRE = "";

$NOMBREMPRESA = "";
$COC = "";
$RAZONSOCIAL = "";
$DIRECCION    = "";
$DVEMPRESA = "";
$RUTEMPRESA = "";
$COMUNA = "";
$GIRO = "";
$COMUNA = "";
$PROVINCIA = "";
$REGION = "";
$TELEFONO = "";
$ENCARGADODECOMPRA = "";
$LOGOEMPRESA = "";
$CONTADOR=0;


$URL_IMG = "";
$URL = "";

$NOMBRE = "";
$MENSAJE = "";
$FOCUS = "";
$MENSAJE2 = "";
$FOCUS2 = "";
$BORDER = "";

//INICIALIZAR ARREGLOS
$ARRAYEMPRESA = "";
$ARRAYEMPRESASID = "";
$ARRAYCOMUNA = "";
$ARRAYCIUDAD = "";



//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYEMPRESA = $EMPRESA_ADO->listarEmpresaCBX();

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
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYEMPRESASID = $EMPRESA_ADO->verEmpresa($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYEMPRESASID as $r) :
            $FOLIOMANUAL = "" . $r['FOLIO_MANUAL'];
            $USOCALIBRE = "" . $r['USO_CALIBRE'];
            $RUTEMPRESA = "" . $r['RUT_EMPRESA'];
            $DVEMPRESA = "" . $r['DV_EMPRESA'];
            $NOMBREMPRESA = "" . $r['NOMBRE_EMPRESA'];
            $COC = "" . $r['COC'];
            $RAZONSOCIAL = "" . $r['RAZON_SOCIAL_EMPRESA'];
            $DIRECCION = "" . $r['DIRECCION_EMPRESA'];
            $GIRO = "" . $r['GIRO_EMPRESA'];
            $TELEFONO = "" . $r['TELEFONO_EMPRESA'];
            $URL_IMG = "" . $r['LOGO_EMPRESA'];
            $ENCARGADODECOMPRA = "" . $r['ENCARGADO_COMPRA_EMPRESA'];
            $COMUNA = "" . $r['ID_COMUNA'];
            $PROVINCIA = "" . $r['ID_PROVINCIA'];
            $REGION = "" . $r['ID_REGION'];
        endforeach;

    }
    //1 = ACTIVAR
    if ($OP == "1") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION
        $DISABLED = "disabled";
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYEMPRESASID = $EMPRESA_ADO->verEmpresa($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYEMPRESASID as $r) :
            $FOLIOMANUAL = "" . $r['FOLIO_MANUAL'];
            $USOCALIBRE = "" . $r['USO_CALIBRE'];
            $RUTEMPRESA = "" . $r['RUT_EMPRESA'];
            $DVEMPRESA = "" . $r['DV_EMPRESA'];
            $NOMBREMPRESA = "" . $r['NOMBRE_EMPRESA'];
            $COC = "" . $r['COC'];
            $RAZONSOCIAL = "" . $r['RAZON_SOCIAL_EMPRESA'];
            $DIRECCION = "" . $r['DIRECCION_EMPRESA'];
            $GIRO = "" . $r['GIRO_EMPRESA'];
            $TELEFONO = "" . $r['TELEFONO_EMPRESA'];
            $URL_IMG = "" . $r['LOGO_EMPRESA'];
            $ENCARGADODECOMPRA = "" . $r['ENCARGADO_COMPRA_EMPRESA'];
            $COMUNA = "" . $r['ID_COMUNA'];
            $PROVINCIA = "" . $r['ID_PROVINCIA'];
            $REGION = "" . $r['ID_REGION'];
        endforeach;

    }
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {

        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYEMPRESASID = $EMPRESA_ADO->verEmpresa($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYEMPRESASID as $r) :

            $FOLIOMANUAL = "" . $r['FOLIO_MANUAL'];
            $USOCALIBRE = "" . $r['USO_CALIBRE'];

            $RUTEMPRESA = "" . $r['RUT_EMPRESA'];
            $DVEMPRESA = "" . $r['DV_EMPRESA'];
            $NOMBREMPRESA = "" . $r['NOMBRE_EMPRESA'];
            $COC = "" . $r['COC'];
            $RAZONSOCIAL = "" . $r['RAZON_SOCIAL_EMPRESA'];
            $DIRECCION = "" . $r['DIRECCION_EMPRESA'];
            $GIRO = "" . $r['GIRO_EMPRESA'];
            $TELEFONO = "" . $r['TELEFONO_EMPRESA'];
            $URL_IMG = "" . $r['LOGO_EMPRESA'];
            $ENCARGADODECOMPRA = "" . $r['ENCARGADO_COMPRA_EMPRESA'];

            $COMUNA = "" . $r['ID_COMUNA'];
            $PROVINCIA = "" . $r['ID_PROVINCIA'];
            $REGION = "" . $r['ID_REGION'];
        endforeach;
    }

    //ver =  OBTENCION DE DATOS PARA LA VISUALIZAAR INFORMAICON DE REGISTRO
    if ($OP == "ver") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION
        $DISABLED = "disabled";
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYEMPRESASID = $EMPRESA_ADO->verEmpresa($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYEMPRESASID as $r) :

            $FOLIOMANUAL = "" . $r['FOLIO_MANUAL'];
            $USOCALIBRE = "" . $r['USO_CALIBRE'];

            $RUTEMPRESA = "" . $r['RUT_EMPRESA'];
            $DVEMPRESA = "" . $r['DV_EMPRESA'];
            $NOMBREMPRESA = "" . $r['NOMBRE_EMPRESA'];
            $COC = "" . $r['COC'];
            $RAZONSOCIAL = "" . $r['RAZON_SOCIAL_EMPRESA'];
            $DIRECCION = "" . $r['DIRECCION_EMPRESA'];
            $GIRO = "" . $r['GIRO_EMPRESA'];
            $TELEFONO = "" . $r['TELEFONO_EMPRESA'];
            $URL_IMG = "" . $r['LOGO_EMPRESA'];
            $ENCARGADODECOMPRA = "" . $r['ENCARGADO_COMPRA_EMPRESA'];
            $COMUNA = "" . $r['ID_COMUNA'];
            $PROVINCIA = "" . $r['ID_PROVINCIA'];
            $REGION = "" . $r['ID_REGION'];
        endforeach;
    }
}

if($_POST){
    if (isset($_REQUEST['FOLIO_MANUAL'])) {
        $FOLIOMANUAL = $_REQUEST['FOLIO_MANUAL'];
    }
    if (isset($_REQUEST['USO_CALIBRE'])) {
        $USOCALIBRE = $_REQUEST['USO_CALIBRE'];
    }
    if (isset($_REQUEST['RUTEMPRESA'])) {
        $RUTEMPRESA = $_REQUEST['RUTEMPRESA'];
    }
    if (isset($_REQUEST['DVEMPRESA'])) {
        $DVEMPRESA = $_REQUEST['DVEMPRESA'];
    }
    if (isset($_REQUEST['NOMBREMPRESA'])) {
        $NOMBREMPRESA = $_REQUEST['NOMBREMPRESA'];
    }
    if (isset($_REQUEST['COC'])) {
        $COC = $_REQUEST['COC'];
    }
    if (isset($_REQUEST['RAZONSOCIAL'])) {
        $RAZONSOCIAL = $_REQUEST['RAZONSOCIAL'];
    }
    if (isset($_REQUEST['DIRECCION'])) {
        $DIRECCION = $_REQUEST['DIRECCION'];
    }
    if (isset($_REQUEST['GIRO'])) {
        $GIRO = $_REQUEST['GIRO'];
    }
    if (isset($_REQUEST['TELEFONO'])) {
        $TELEFONO = $_REQUEST['TELEFONO'];
    }
    if (isset($_REQUEST['URL_IMG'])) {
        $URL_IMG = $_REQUEST['URL_IMG'];
    }
    if (isset($_REQUEST['ENCARGADODECOMPRA'])) {
        $ENCARGADODECOMPRA = $_REQUEST['ENCARGADODECOMPRA'];
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
}


?>



<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registrar Empresa</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>

        <?php include_once "../../assest/config/urlHead.php"; ?>
        <script type="text/javascript">
            //VALIDACION DE FORMULARIO
            function validacion() {

                FOLIOMANUAL = document.getElementById("FOLIOMANUAL").selectedIndex;
                USOCALIBRE = document.getElementById("USOCALIBRE").selectedIndex;
                RUTEMPRESA = document.getElementById("RUTEMPRESA").value;
                DVEMPRESA = document.getElementById("DVEMPRESA").value;
                NOMBREMPRESA = document.getElementById("NOMBREMPRESA").value;
                COC = document.getElementById("COC").value;
                RAZONSOCIAL = document.getElementById("RAZONSOCIAL").value;
                GIRO = document.getElementById("GIRO").value;
                DIRECCION = document.getElementById("DIRECCION").value;
                COMUNA = document.getElementById("COMUNA").selectedIndex;
                PROVINCIA = document.getElementById("PROVINCIA").selectedIndex;
                REGION = document.getElementById("REGION").selectedIndex;
                TELEFONO = document.getElementById("TELEFONO").value;
                ENCARGADODECOMPRA = document.getElementById("ENCARGADODECOMPRA").value;

                document.getElementById('val_uso_calibre').innerHTML = "";
                document.getElementById('val_folio_manual').innerHTML = "";
                document.getElementById('val_rut_empresa').innerHTML = "";
                document.getElementById('val_dv_empresa').innerHTML = "";
                document.getElementById('val_nombree').innerHTML = "";
                document.getElementById('val_giro').innerHTML = "";
                document.getElementById('val_razonsocial').innerHTML = "";
                document.getElementById('val_direccion').innerHTML = "";
                document.getElementById('val_comuna').innerHTML = "";
                document.getElementById('val_provincia').innerHTML = "";
                document.getElementById('val_region').innerHTML = "";
                document.getElementById('val_telefono').innerHTML = "";
                document.getElementById('val_encargado_compra').innerHTML = "";

                document.getElementById('val_img_empresa').innerHTML = "";


                if (RUTEMPRESA == null || RUTEMPRESA.length == 0 || /^\s+$/.test(RUTEMPRESA)) {
                    document.form_reg_dato.RUTEMPRESA.focus();
                    document.form_reg_dato.RUTEMPRESA.style.borderColor = "#FF0000";
                    document.getElementById('val_rut_empresa').innerHTML = "NO A INGRESADO DATO";
                    return false;
                }
                document.form_reg_dato.RUTEMPRESA.style.borderColor = "#4AF575";


                if (DVEMPRESA == null || DVEMPRESA.length == 0 || /^\s+$/.test(DVEMPRESA)) {
                    document.form_reg_dato.DVEMPRESA.focus();
                    document.form_reg_dato.DVEMPRESA.style.borderColor = "#FF0000";
                    document.getElementById('val_dv_empresa').innerHTML = "NO A INGRESADO DATO";
                    return false;
                }
                document.form_reg_dato.DVEMPRESA.style.borderColor = "#4AF575";


                if (NOMBREMPRESA == null || NOMBREMPRESA.length == 0 || /^\s+$/.test(NOMBREMPRESA)) {
                    document.form_reg_dato.NOMBREMPRESA.focus();
                    document.form_reg_dato.NOMBREMPRESA.style.borderColor = "#FF0000";
                    document.getElementById('val_nombree').innerHTML = "NO A INGRESADO DATO";
                    return false;
                }
                document.form_reg_dato.NOMBREMPRESA.style.borderColor = "#4AF575";

                if (COC == null || COC.length == 0 || /^\s+$/.test(COC)) {
                    document.form_reg_dato.COC.focus();
                    document.form_reg_dato.COC.style.borderColor = "#FF0000";
                    document.getElementById('val_coc').innerHTML = "NO A INGRESADO DATO";
                    return false;
                }
                document.form_reg_dato.COC.style.borderColor = "#4AF575";



                if (GIRO == null || GIRO.length == 0 || /^\s+$/.test(GIRO)) {
                    document.form_reg_dato.GIRO.focus();
                    document.form_reg_dato.GIRO.style.borderColor = "#FF0000";
                    document.getElementById('val_giro').innerHTML = "NO A INGRESADO DATO";
                    return false;
                }
                document.form_reg_dato.GIRO.style.borderColor = "#4AF575";


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

                /*    

                if (TELEFONO == null || TELEFONO == 0) {
                    document.form_reg_dato.TELEFONO.focus();
                    document.form_reg_dato.TELEFONO.style.borderColor = "#FF0000";
                    document.getElementById('val_telefono').innerHTML = "NO A INGRESADO DATO";
                    return false;
                }
                document.form_reg_dato.TELEFONO.style.borderColor = "#4AF575";
                */
                if (ENCARGADODECOMPRA == null || ENCARGADODECOMPRA.length == 0 || /^\s+$/.test(ENCARGADODECOMPRA)) {
                    document.form_reg_dato.ENCARGADODECOMPRA.focus();
                    document.form_reg_dato.ENCARGADODECOMPRA.style.borderColor = "#FF0000";
                    document.getElementById('val_encargado_compra').innerHTML = "NO A INGRESADO DATO";
                    return false;
                }
                document.form_reg_dato.ENCARGADODECOMPRA.style.borderColor = "#4AF575";

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
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Mantenedores</li>
                                            <li class="breadcrumb-item" aria-current="page">Principal</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#">Registro Empresa </a>
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
                        <div class="row">
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                <div class="box">
                                    <div class="box-header with-border bg-primary">                                
                                        <h4 class="box-title">Registro Empresa</h4>                                
                                    </div>
                                    <!-- /.box-header -->
                                    <form class="form" role="form" method="post" id="form_reg_dato" name="form_reg_dato" enctype="multipart/form-data">
                                        <div class="box-body">
                                            <hr class="my-15">
                                            <div class="row">
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Folio Manual</label>
                                                        <select class="form-control select2" id="FOLIOMANUAL" name="FOLIOMANUAL" style="width: 100%;" value="<?php echo $FOLIOMANUAL; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <option value="1" <?php if ($FOLIOMANUAL == "1") { echo "selected"; } ?>> Si </option>
                                                            <option value="2" <?php if ($FOLIOMANUAL == "2") { echo "selected"; } ?>> No </option>
                                                        </select>
                                                        <label id="val_folio_manual" class="validacion"> </label>
                                                    </div>
                                                </div>

                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Uso Calibre</label>
                                                        <select class="form-control select2" id="USOCALIBRE" name="USOCALIBRE" style="width: 100%;" value="<?php echo $USOCALIBRE; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <option value="1" <?php if ($USOCALIBRE == "1") { echo "selected"; } ?>> Si </option>
                                                            <option value="2" <?php if ($USOCALIBRE == "2") { echo "selected"; } ?>> No </option>
                                                        </select>
                                                        <label id="val_uso_calibre" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label> COC </label>
                                                        <input type="text" class="form-control" placeholder="COC a Mostrar " id="COC" name="COC" value="<?php echo $COC; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_coc" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Rut </label>
                                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                        <input type="text" class="form-control" placeholder="Rut Empresa" id="RUTEMPRESA" name="RUTEMPRESA" value="<?php echo $RUTEMPRESA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_rut_empresa" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 col-xs-2">
                                                    <div class="form-group">
                                                        <label>DV </label>
                                                        <input type="text" class="form-control" placeholder="DV Empresa" id="DVEMPRESA" name="DVEMPRESA" value="<?php echo $DVEMPRESA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_dv_empresa" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label> Nombre </label>
                                                        <input type="text" class="form-control" placeholder="Nombre Empresa a Mostrar " id="NOMBREMPRESA" name="NOMBREMPRESA" value="<?php echo $NOMBREMPRESA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nombree" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Giro</label>
                                                        <input type="text" class="form-control" placeholder="Giro" id="GIRO" name="GIRO" value="<?php echo $GIRO; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_giro" class="validacion"> </label>
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
                                                        <label>Telefono</label>
                                                        <input type="number" class="form-control" placeholder="Telefono" id="TELEFONO" name="TELEFONO" value="<?php echo $TELEFONO; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_telefono" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Direccion</label>
                                                        <input type="text" class="form-control" placeholder="Direccion" id="DIRECCION" name="DIRECCION" value="<?php echo $DIRECCION; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_direccion" class="validacion"> </label>
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
                                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Encargado de Compra</label>
                                                        <input type="text" class="form-control" placeholder="Encargado de Compra" id="ENCARGADODECOMPRA" name="ENCARGADODECOMPRA" value="<?php echo $ENCARGADODECOMPRA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_encargado_compra" class="validacion"> </label>
                                                    </div>
                                                </div>  
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">     
                                                    <div class="form-group">
                                                        <label>Seleccion Imagen</label>
                                                        <label class="file">
                                                            <input type="file" placeholder="IMG" id="LOGOEMPRESA" name="LOGOEMPRESA" values="<?php echo $LOGOEMPRESA; ?>"  />
                                                        </label>
                                                        <label id="val_img_empresa" class="validacion"><?php echo $MENSAJE2; ?> </label>
                                                        <?php if ($URL_IMG) { ?>
                                                            <img src="<?php echo  $URL_IMG; ?>" alt="Logo Empresa" class="rounded mx-auto d-block" style="max-width:100px; max-height:100px;width: auto;height: auto;">
                                                        <?php } else { ?>
                                                            <img src="../../assest/img/empresa/no_disponible.png" alt="Logo Empresa" class="rounded mx-auto d-block" style="max-width:100px; max-height:100px;width: auto;height: auto;">
                                                        <?php } ?>
                                                        <input type="hidden" id="URLIMG" name="URLIMG" value="<?php echo $URL_IMG; ?>" />
                                                    </div>
                                                </div>                                                                                      
                                            </div>
                                        </div>
                                        <!-- /.box-body -->                                        
                                        <div class="box-footer">
                                            <div class="btn-group   col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12 " role="group" aria-label="Acciones generales">                                    
                                                <button type="button" class="btn  btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroEmpresa.php');">
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
                                        <h4 class="box-title"> Agrupado Empresa</h4>
                                    </div>
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <table id="listar" class="table-hover " style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>Folio Manual</th>
                                                        <th>Uso Calibre</th>
                                                        <th>Numero </th>
                                                        <th class="text-center">Operaciónes</th>
                                                        <th>COC </th>
                                                        <th>Rut </th>
                                                        <th>DV </th>
                                                        <th>Nombre</th>
                                                        <th>Giro </th>
                                                        <th>Razon Social </th>
                                                        <th>Telefono </th>
                                                        <th>Direccion </th>
                                                        <th>Comuna </th>
                                                        <th>Provincia </th>
                                                        <th>Region </th>
                                                        <th>Encargado Compra </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYEMPRESA as $r) : ?>
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

                                                            if($r["FOLIO_MANUAL"]==1){
                                                                $FMANUAL="Si";
                                                            }else if($r["FOLIO_MANUAL"]==2){
                                                                $FMANUAL="No";
                                                            }else{                                                                
                                                                $FMANUAL="Sin Datos";
                                                            }

                                                            if($r["USO_CALIBRE"]==1){
                                                                $UCALIBRE="Si";
                                                            }else if($r["USO_CALIBRE"]==2){
                                                                $UCALIBRE="No";
                                                            }else{                                                                
                                                                $UCALIBRE="Sin Datos";
                                                            }

                                                            ?>
                                                        <tr class="center">    
                                                            <td><?php echo $FMANUAL; ?></td>
                                                            <td><?php echo $UCALIBRE; ?></td>
                                                            <td><?php echo $CONTADOR; ?> </td>                                                                                      
                                                            <td class="text-center">
                                                                <form method="post" id="form1">
                                                                    <div class="list-icons d-inline-flex">
                                                                        <div class="list-icons-item dropdown">
                                                                            <button class="btn btn-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                <span class="icon-copy ti-settings"></span>
                                                                            </button>
                                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                                <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_EMPRESA']; ?>" />
                                                                                <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroEmpresa" />
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
                                                            <td><?php echo $r['COC']; ?></td> 
                                                            <td><?php echo $r['RUT_EMPRESA']; ?></td>    
                                                            <td><?php echo $r['DV_EMPRESA']; ?></td>    
                                                            <td><?php echo $r['NOMBRE_EMPRESA']; ?></td>    
                                                            <td><?php echo $r['RAZON_SOCIAL_EMPRESA']; ?></td>    
                                                            <td><?php echo $r['GIRO_EMPRESA']; ?></td>    
                                                            <td><?php echo $r['TELEFONO_EMPRESA']; ?></td>  
                                                            <td><?php echo $r['DIRECCION_EMPRESA']; ?></td> 
                                                            <td><?php echo $NOMBRECOMUNA; ?></td>  
                                                            <td><?php echo $NOMBREPROVINCIA; ?></td>  
                                                            <td><?php echo $NOMBREREGION; ?></td>       
                                                            <td><?php echo $r['ENCARGADO_COMPRA_EMPRESA']; ?></td>                                                            
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


                //OPERACION DE SUBIR IMAGEN AL SERVIDOR
                if ($_FILES['LOGOEMPRESA']) {
                    $SUBIRIMG = $SUBIR->subirImg($_FILES['LOGOEMPRESA'], $_REQUEST['RUTEMPRESA'], $DIRECTORIODESTINO);
                    $URL_IMG = $SUBIRIMG['UBICACION'] . $SUBIRIMG['NOMBREARCHIVO'] . $SUBIRIMG['FORMATO'];
                    $MENSAJE2 = $SUBIRIMG['MENSAJE'];
                }
                if ($URL_IMG == "") {
                    $URL_IMG = "";
                }



                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
                $EMPRESA->__SET('FOLIO_MANUAL', $_REQUEST['FOLIOMANUAL']);
                $EMPRESA->__SET('USO_CALIBRE', $_REQUEST['USOCALIBRE']);
                $EMPRESA->__SET('RUT_EMPRESA', $_REQUEST['RUTEMPRESA']);
                $EMPRESA->__SET('DV_EMPRESA', $_REQUEST['DVEMPRESA']);
                $EMPRESA->__SET('NOMBRE_EMPRESA', $_REQUEST['NOMBREMPRESA']);
                $EMPRESA->__SET('COC', $_REQUEST['COC']);
                $EMPRESA->__SET('RAZON_SOCIAL_EMPRESA', $_REQUEST['RAZONSOCIAL']);
                $EMPRESA->__SET('DIRECCION_EMPRESA', $_REQUEST['DIRECCION']);
                $EMPRESA->__SET('GIRO_EMPRESA', $_REQUEST['GIRO']);
                $EMPRESA->__SET('TELEFONO_EMPRESA', $_REQUEST['TELEFONO']);
                $EMPRESA->__SET('ENCARGADO_COMPRA_EMPRESA', $_REQUEST['ENCARGADODECOMPRA']);
                $EMPRESA->__SET('LOGO_EMPRESA', $URL_IMG);
                $EMPRESA->__SET('ID_COMUNA', $_REQUEST['COMUNA']);
                $EMPRESA->__SET('ID_PROVINCIA', $_REQUEST['PROVINCIA']);
                $EMPRESA->__SET('ID_REGION', $_REQUEST['REGION']);                
                $EMPRESA->__SET('ID_USUARIOI', $IDUSUARIOS);
                $EMPRESA->__SET('ID_USUARIOM', $IDUSUARIOS);
                //LLAMADA AL METODO DE EDICION DEL CONTROLADOR
                $EMPRESA_ADO->agregarEmpresa($EMPRESA);

                $AUSUARIO_ADO->agregarAusuario2("NULL",3,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Empresa.","principal_empresa","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );  

                //REDIRECCIONAR A PAGINA registroEmpresa.php
                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Creado",
                        text:"El registro del mantenedor se ha creado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                         location.href = "registroEmpresa.php";                            
                    })
                </script>';
            }
            //OPERACION DE EDICION DE FILA
            if (isset($_REQUEST['EDITAR'])) {

                //OPERACION DE SUBIR IMAGEN AL SERVIDOR
                if ($_FILES['LOGOEMPRESA']) {
                    $SUBIRIMG = $SUBIR->subirImg($_FILES['LOGOEMPRESA'], $_REQUEST['RUTEMPRESA'], $DIRECTORIODESTINO);
                    $URL_IMG = $SUBIRIMG['UBICACION'] . $SUBIRIMG['NOMBREARCHIVO'] . $SUBIRIMG['FORMATO'];
                    $MENSAJE2 = $SUBIRIMG['MENSAJE'];
                }

                if ($URL_IMG == "") {

                    $URL_IMG = $_REQUEST['URLIMG'];
                }

                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO  

                $EMPRESA->__SET('FOLIO_MANUAL', $_REQUEST['FOLIOMANUAL']);
                $EMPRESA->__SET('USO_CALIBRE', $_REQUEST['USOCALIBRE']);
                $EMPRESA->__SET('RUT_EMPRESA', $_REQUEST['RUTEMPRESA']);
                $EMPRESA->__SET('DV_EMPRESA', $_REQUEST['DVEMPRESA']);
                $EMPRESA->__SET('NOMBRE_EMPRESA', $_REQUEST['NOMBREMPRESA']);
                $EMPRESA->__SET('COC', $_REQUEST['COC']);
                $EMPRESA->__SET('RAZON_SOCIAL_EMPRESA', $_REQUEST['RAZONSOCIAL']);
                $EMPRESA->__SET('DIRECCION_EMPRESA', $_REQUEST['DIRECCION']);
                $EMPRESA->__SET('GIRO_EMPRESA', $_REQUEST['GIRO']);
                $EMPRESA->__SET('TELEFONO_EMPRESA', $_REQUEST['TELEFONO']);
                $EMPRESA->__SET('ENCARGADO_COMPRA_EMPRESA', $_REQUEST['ENCARGADODECOMPRA']);
                $EMPRESA->__SET('LOGO_EMPRESA', $URL_IMG);
                $EMPRESA->__SET('ID_COMUNA', $_REQUEST['COMUNA']);
                $EMPRESA->__SET('ID_PROVINCIA', $_REQUEST['PROVINCIA']);
                $EMPRESA->__SET('ID_REGION', $_REQUEST['REGION']);
                $EMPRESA->__SET('ID_USUARIOM', $IDUSUARIOS);
                $EMPRESA->__SET('ID_EMPRESA', $_REQUEST['ID']);
                //LLAMADA AL METODO DE EDICION DEL CONTROLADOR
                $EMPRESA_ADO->actualizarEmpresa($EMPRESA);

                $AUSUARIO_ADO->agregarAusuario2("NULL",3,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de Empresa.","principal_empresa", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );     

                //REDIRECCIONAR A PAGINA registroEmpresa.php
                
                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Modificado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroEmpresa.php";                            
                    })
                </script>';
            }

            if (isset($_REQUEST['ELIMINAR'])) { 

                $EMPRESA->__SET('ID_EMPRESA', $_REQUEST['ID']);
                $EMPRESA_ADO->deshabilitar($EMPRESA);
                     

                $AUSUARIO_ADO->agregarAusuario2("NULL",3,4,"".$_SESSION["NOMBRE_USUARIO"].", Deshabilitar  Empresa.","principal_empresa", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );                
                
                echo '<script>
                    Swal.fire({
                        icon:"error",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Deshabilitado correctamente", 
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroEmpresa.php";                            
                    })
                </script>';
            }
            
            if (isset($_REQUEST['HABILITAR'])) {   
                
                $EMPRESA->__SET('ID_EMPRESA',  $_REQUEST['ID']);
                $EMPRESA_ADO->habilitar($EMPRESA);


                $AUSUARIO_ADO->agregarAusuario2("NULL",3,5,"".$_SESSION["NOMBRE_USUARIO"].", Habilitar  Empresa.","principal_empresa", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );                               

                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Habilitado correctamente", 
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroEmpresa.php";                            
                    })
                </script>';
            }
        
        ?>
</body>
</html>