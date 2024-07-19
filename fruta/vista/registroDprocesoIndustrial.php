<?php


include_once "../../assest/config/validarUsuarioFruta.php";
//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES


include_once '../../assest/controlador/EINDUSTRIAL_ADO.php';
include_once '../../assest/controlador/VESPECIES_ADO.php';
include_once '../../assest/controlador/FOLIO_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/TMANEJO_ADO.php';
include_once '../../assest/controlador/PROCESO_ADO.php';
include_once '../../assest/controlador/TCALIBREIND_ADO.php';

include_once '../../assest/controlador/DPEXPORTACION_ADO.php';
include_once '../../assest/controlador/DPINDUSTRIAL_ADO.php';
include_once '../../assest/controlador/EXIINDUSTRIAL_ADO.php';
include_once '../../assest/controlador/EXIMATERIAPRIMA_ADO.php';

include_once '../../assest/modelo/EXIINDUSTRIAL.php';
include_once '../../assest/modelo/DPINDUSTRIAL.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$EINDUSTRIAL_ADO =  new EINDUSTRIAL_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$FOLIO_ADO =  new FOLIO_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$TMANEJO_ADO =  new TMANEJO_ADO();
$PROCESO_ADO =  new PROCESO_ADO();
$TCALIBREIND_ADO =  new TCALIBREIND_ADO();

$DPEXPORTACION_ADO =  new DPEXPORTACION_ADO();
$DPINDUSTRIAL_ADO =  new DPINDUSTRIAL_ADO();
$EXIINDUSTRIAL_ADO =  new EXIINDUSTRIAL_ADO();
$EXIMATERIAPRIMA_ADO =  new EXIMATERIAPRIMA_ADO();

//INIICIALIZAR MODELO
$EXIINDUSTRIAL =  new EXIINDUSTRIAL();
$DPINDUSTRIAL =  new DPINDUSTRIAL();

//INICIALIZAR VARIABLES

$PROCESO = "";
$FOLIOINDUSTRIAL = "";
$NUMEROFOLIODINDUSTRIAL = "";
$FECHAEMBALADODINDUSTRIAL = "";
$CANTIDADENVASEDINDUSTRIAL = "";

$IDPROCESO = "";
$IDDPROCESOINDUSTRIAL = "";

$ESTANDAR = "";
$PVESPECIES = "";
$FOLIO = "";
$FOLIOALIAS = "";
$TCALIBREIND = "";

$TIPOPROCESO = "";


$FOLIOBAS2 = "";
$FOLIOAUX = "";
$ULTIMOFOLIO = "";

$PRODUCTORDATOS = "";
$NOMBREVESPECIES = "";

$TOTALDESHIDRATACIONEXV = 0;
$TOTALNETOINDV = 0;
$TOTALDESHIDRATACIONEX = 0;
$TOTALNETOIND = 0;
$DIFERENCIAKILOSNETOEXPO = 0;
$TCOBRO=0;
$PRODUCTOR = "";
$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";
$TMANEJO = "";

$DISABLED = "";
$DISABLEDSTYLE = "";

$DISABLED2 = "disabled";
$DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
$MENSAJEELIMINAR = "";

$IDOP = "";
$IDOP2 = "";
$OP = "";

$NODATOURL = "";
//INICIALIZAR ARREGLOS

$ARRAYVERFOLIO = "";
$ARRAYULTIMOFOLIO = "";
$ARRAYOBTENERNUMEROLINEA = "";

$ARRAYESTANDAR = "";
$ARRAYPVESPECIES;
$ARRAYVESPECIES;
$ARRAYPRODUCTOR = "";
$ARRAYTCALIBREIND = "";

$ARRAYDPROCESOINDUSTRIAL = "";
$ARRAYDPROCESOINDUSTRIAL2 = "";

$ARRAYVERFOLIOPOIND = "";

$ARRAYTCALIBREIND = $TCALIBREIND_ADO->listarCalibreIndPorEmpresaCBX($EMPRESAS);

$ARRAYTMANEJO = $TMANEJO_ADO->listarTmanejoCBX();
$ARRAYFECHAACTUAL = $DPINDUSTRIAL_ADO->obtenerFecha();
$FECHAEMBALADODINDUSTRIAL = $ARRAYFECHAACTUAL[0]['FECHA'];
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

//OPERACION PARA OBTENER EL ID RECEPCION Y FOLIO BASE, SOLO SE OCUPA PARA CREAR UN REGISTRO NUEVO
if (isset($id_dato) && isset($accion_dato) && isset($urlo_dato)) {
    $IDP = $id_dato;
    $OPP = $accion_dato;
    $URLO = $urlo_dato;

    $ARRAYEXISTENCIAMPTOTAL = $EXIMATERIAPRIMA_ADO->obtenerTotalesProceso($IDP);
    $TOTALNETOE = $ARRAYEXISTENCIAMPTOTAL[0]['NETO'];
    $ARRATDINDUSTRIALTOTALPROCESO = $DPINDUSTRIAL_ADO->obtenerTotales($IDP);
    $ARRATDINDUSTRIALTOTALPROCESO2 = $DPINDUSTRIAL_ADO->obtenerTotales2($IDP);
    $TOTALNETOIND = $ARRATDINDUSTRIALTOTALPROCESO[0]['NETO'];
    $TOTALNETOINDV = $ARRATDINDUSTRIALTOTALPROCESO2[0]['NETO'];
    $ARRAYDEXPORTACIONTOTALPROCESO = $DPEXPORTACION_ADO->obtenerTotales($IDP);
    $ARRAYDEXPORTACIONTOTALPROCES2 = $DPEXPORTACION_ADO->obtenerTotales2($IDP);
    $TOTALDESHIDRATACIONEX = $ARRAYDEXPORTACIONTOTALPROCESO[0]['DESHIDRATACION'];
    $TOTALDESHIDRATACIONEXV = $ARRAYDEXPORTACIONTOTALPROCES2[0]['DESHIDRATACION'];
    $DIFERENCIAKILOSNETOEXPO = round($TOTALNETOE - ($TOTALDESHIDRATACIONEX + $TOTALNETOIND), 2);

    $ARRAYPROCESO = $PROCESO_ADO->verProceso($IDP);
    foreach ($ARRAYPROCESO as $r) :

        $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
        $FECHAPROCESO = "" . $r['FECHA_PROCESO'];
        $VESPECIES = "" . $r['ID_VESPECIES'];
        $TIPOPROCESO = "" . $r['ID_TPROCESO'];
        $ARRAYVESPECIES = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
        $ARRAYVERPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
        if ($ARRAYVERPRODUCTOR) {          
            $PRODUCTORDATOS = $ARRAYVERPRODUCTOR[0]["CSG_PRODUCTOR"] .  ":" . $ARRAYVERPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
        }
        if ($ARRAYVESPECIES) {
            $NOMBREVESPECIES = $ARRAYVESPECIES[0]["NOMBRE_VESPECIES"];
        }

    endforeach;
}
if($TIPOPROCESO==3){
    //BULK
    $ARRAYESTANDAR = $EINDUSTRIAL_ADO->listarEstandarProcesoPorEmpresaCBXBulk($EMPRESAS);
}else{
    //normal
    $ARRAYESTANDAR = $EINDUSTRIAL_ADO->listarEstandarProcesoPorEmpresaCBX($EMPRESAS);
}

//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION , VISUALIZACION Y CREACION
//OPERACION PARA OBTENER EL ID RECEPCION Y FOLIO BASE, SOLO SE OCUPA PARA CREAR UN REGISTRO NUEVO
if (isset($id_dato) && isset($accion_dato) && isset($urlo_dato) && isset($idd_dato) && isset($acciond_dato)) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $idd_dato;
    $OP = $acciond_dato;
    $IDP = $id_dato;
    $OPP = $accion_dato;
    $URLO = $urlo_dato;



    //crear =  OBTENCION DE DATOS PARA LA CREACCION DE REGISTRO
    if ($OP == "crear") {
        $DISABLED = "";
        $DISABLEDSTYLE = "";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDPROCESOINDUSTRIAL = $DPINDUSTRIAL_ADO->verDpindustrial($IDOP);
        foreach ($ARRAYDPROCESOINDUSTRIAL as $r) :
            // $NUMEROFOLIODINDUSTRIAL = "" . $r['FOLIO_DPINDUSTRIAL'];
            $FECHAEMBALADODINDUSTRIAL = "" . $r['FECHA_EMBALADO_DPINDUSTRIAL'];
            $KILOSNETO = "" . $r['KILOS_NETO_DPINDUSTRIAL'];
            $TMANEJO = "" . $r['ID_TMANEJO'];
            $TCALIBREIND = "" . $r['ID_TCALIBREIND'];
            $ESTANDAR = "" . $r['ID_ESTANDAR'];
            $VESPECIES = "" . $r['ID_VESPECIES'];
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $ARRAYVESPECIES = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
            $ARRAYVERPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
            if ($ARRAYVERPRODUCTOR) {
                $PRODUCTORDATOS = $ARRAYVERPRODUCTOR[0]["CSG_PRODUCTOR"] . ": " . $ARRAYVERPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
            }
            if ($ARRAYVESPECIES) {
                $NOMBREVESPECIES = $ARRAYVESPECIES[0]["NOMBRE_VESPECIES"];
            }
        endforeach;
    }
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {
        $DISABLED = "";
        $DISABLEDSTYLE = "";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDPROCESOINDUSTRIAL = $DPINDUSTRIAL_ADO->verDpindustrial($IDOP);
        foreach ($ARRAYDPROCESOINDUSTRIAL as $r) :
            $NUMEROFOLIODINDUSTRIAL = "" . $r['FOLIO_DPINDUSTRIAL'];
            $FECHAEMBALADODINDUSTRIAL = "" . $r['FECHA_EMBALADO_DPINDUSTRIAL'];
            $KILOSNETO = "" . $r['KILOS_NETO_DPINDUSTRIAL'];
            $TMANEJO = "" . $r['ID_TMANEJO'];
            $ESTANDAR = "" . $r['ID_ESTANDAR'];
            $TCALIBREIND = "" . $r['ID_TCALIBREIND'];
            $VESPECIES = "" . $r['ID_VESPECIES'];
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $ARRAYVESPECIES = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
            $ARRAYVERPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
            if ($ARRAYVERPRODUCTOR) {
                $PRODUCTORDATOS = $ARRAYVERPRODUCTOR[0]["CSG_PRODUCTOR"] . ": " . $ARRAYVERPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
            }
            if ($ARRAYVESPECIES) {
                $NOMBREVESPECIES = $ARRAYVESPECIES[0]["NOMBRE_VESPECIES"];
            }


        endforeach;
    }

    //ver =  OBTENCION DE DATOS PARA LA VISUALIZACION DEL REGISTRO
    if ($OP == "ver") {

        $DISABLED = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDPROCESOINDUSTRIAL = $DPINDUSTRIAL_ADO->verDpindustrial($IDOP);
        foreach ($ARRAYDPROCESOINDUSTRIAL as $r) :
            $NUMEROFOLIODINDUSTRIAL = "" . $r['FOLIO_DPINDUSTRIAL'];
            $FECHAEMBALADODINDUSTRIAL = "" . $r['FECHA_EMBALADO_DPINDUSTRIAL'];
            $KILOSNETO = "" . $r['KILOS_NETO_DPINDUSTRIAL'];
            $TMANEJO = "" . $r['ID_TMANEJO'];
            $ESTANDAR = "" . $r['ID_ESTANDAR'];
            $TCALIBREIND = "" . $r['ID_TCALIBREIND'];
            $VESPECIES = "" . $r['ID_VESPECIES'];
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $ARRAYVESPECIES = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
            $ARRAYVERPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
            if ($ARRAYVERPRODUCTOR) {
                $PRODUCTORDATOS = $ARRAYVERPRODUCTOR[0]["CSG_PRODUCTOR"] . ": " . $ARRAYVERPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
            }
            if ($ARRAYVESPECIES) {
                $NOMBREVESPECIES = $ARRAYVESPECIES[0]["NOMBRE_VESPECIES"];
            }


        endforeach;
    }
    //ver =  OBTENCION DE DATOS PARA LA VISUALIZACION DEL REGISTRO
    if ($OP == "eliminar") {

        $DISABLED = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDPROCESOINDUSTRIAL = $DPINDUSTRIAL_ADO->verDpindustrial($IDOP);
        $MENSAJEELIMINAR = "ESTA SEGURO DE ELIMINAR EL REGISTRO, PARA CONFIRMAR PRESIONE ELIMINAR";
        foreach ($ARRAYDPROCESOINDUSTRIAL as $r) :
            $NUMEROFOLIODINDUSTRIAL = "" . $r['FOLIO_DPINDUSTRIAL'];
            $FECHAEMBALADODINDUSTRIAL = "" . $r['FECHA_EMBALADO_DPINDUSTRIAL'];
            $KILOSNETO = "" . $r['KILOS_NETO_DPINDUSTRIAL'];
            $TMANEJO = "" . $r['ID_TMANEJO'];
            $ESTANDAR = "" . $r['ID_ESTANDAR'];
            $TCALIBREIND = "" . $r['ID_TCALIBREIND'];
            $VESPECIES = "" . $r['ID_VESPECIES'];
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $ARRAYVESPECIES = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
            $ARRAYVERPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
            if ($ARRAYVERPRODUCTOR) {
                $PRODUCTORDATOS = $ARRAYVERPRODUCTOR[0]["CSG_PRODUCTOR"] . ": " . $ARRAYVERPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
            }
            if ($ARRAYVESPECIES) {
                $NOMBREVESPECIES = $ARRAYVESPECIES[0]["NOMBRE_VESPECIES"];
            }
        endforeach;
    }
}
if ($_POST) {

    if (isset($_REQUEST['FECHAEMBALADODINDUSTRIAL'])) {
        $FECHAEMBALADODINDUSTRIAL = $_REQUEST['FECHAEMBALADODINDUSTRIAL'];
    }
    if (isset($_REQUEST['ESTANDAR'])) {
        $ESTANDAR = $_REQUEST['ESTANDAR'];
    }
    if (isset($_REQUEST['KILOSNETO'])) {
        $KILOSNETO = $_REQUEST['KILOSNETO'];
    }
    if (isset($_REQUEST['TMANEJO'])) {
        $TMANEJO = $_REQUEST['TMANEJO'];
    }
    if (isset($_REQUEST['TCALIBREIND'])) {
        $TCALIBRE = $_REQUEST['TCALIBREIND'];
    }
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Producto Industrial </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../../assest/config/urlHead.php"; ?>
        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
                function validacion() {
                    FECHAEMBALADODINDUSTRIAL = document.getElementById("FECHAEMBALADODINDUSTRIAL").value;
                    ESTANDAR = document.getElementById("ESTANDAR").selectedIndex;
                    KILOSNETO = document.getElementById("KILOSNETO").value;
                    TMANEJO = document.getElementById("TMANEJO").selectedIndex;

                    <?php if($ESTADO_USO_CALIBRE == 1){ ?>
                        TCALIBREIND = document.getElementById("TCALIBREIND").selectedIndex;
                    <?php } ?>

                    document.getElementById('val_fechaembalado').innerHTML = "";
                    document.getElementById('val_estandar').innerHTML = "";
                    document.getElementById('val_neto').innerHTML = "";
                    document.getElementById('val_tmanejo').innerHTML = "";

                    <?php if($ESTADO_USO_CALIBRE == 1){ ?>
                        document.getElementById('val_tcalibreind').innerHTML = "";
                    <?php } ?>

                    if (FECHAEMBALADODINDUSTRIAL == null || FECHAEMBALADODINDUSTRIAL.length == 0 || /^\s+$/.test(FECHAEMBALADODINDUSTRIAL)) {
                        document.form_reg_dato.FECHAEMBALADODINDUSTRIAL.focus();
                        document.form_reg_dato.FECHAEMBALADODINDUSTRIAL.style.borderColor = "#FF0000";
                        document.getElementById('val_fechaembalado').innerHTML = "NO HA INGRESADO DATOS";
                        return false;
                    }
                    document.form_reg_dato.FECHAEMBALADODINDUSTRIAL.style.borderColor = "#4AF575";

                    if (ESTANDAR == null || ESTANDAR == 0) {
                        document.form_reg_dato.ESTANDAR.focus();
                        document.form_reg_dato.ESTANDAR.style.borderColor = "#FF0000";
                        document.getElementById('val_estandar').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.ESTANDAR.style.borderColor = "#4AF575";

                    if (KILOSNETO == null || KILOSNETO == 0) {
                        document.form_reg_dato.KILOSNETO.focus();
                        document.form_reg_dato.KILOSNETO.style.borderColor = "#FF0000";
                        document.getElementById('val_neto').innerHTML = "NO HA INGRESADO DATOS";
                        return false;
                    }
                    document.form_reg_dato.KILOSNETO.style.borderColor = "#4AF575";

                    if (TMANEJO == null || TMANEJO == 0) {
                        document.form_reg_dato.TMANEJO.focus();
                        document.form_reg_dato.TMANEJO.style.borderColor = "#FF0000";
                        document.getElementById('val_tmanejo').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.TMANEJO.style.borderColor = "#4AF575";

               


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
                                <h3 class="page-title">Packing</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Modulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Packing</li>
                                            <li class="breadcrumb-item" aria-current="page">Proceso</li>
                                            <li class="breadcrumb-item" aria-current="page">Registro Proceso</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Registro Producto Industrial </a>  </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <?php include_once "../../assest/config/verIndicadorEconomico.php"; ?>
                        </div>
                    </div>
                    <section class="content">
                        <form class="form" role="form" method="post" name="form_reg_dato">
                            <div class="box">
                                <div class="box-header with-border bg-success">                                   
                                    <h4 class="box-title">Registro Producto Industrial</h4>                                        
                                </div>
                                <div class="box-body ">
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" placeholder="ID DINDUSTRIAL" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PROCESO" id="IDP" name="IDP" value="<?php echo $IDP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PROCESO" id="OPP" name="OPP" value="<?php echo $OPP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PROCESO" id="URLO" name="URLO" value="<?php echo $URLO; ?>" />

                                                <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTA" name="PLANTA" value="<?php echo $PLANTAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADAS; ?>" />
                                                <label>Folio</label>
                                                <input type="hidden" class="form-control" placeholder="NUMEROFOLIODINDUSTRIALE" id="NUMEROFOLIODINDUSTRIALE" name="NUMEROFOLIODINDUSTRIALE" value="<?php echo $NUMEROFOLIODINDUSTRIAL; ?>" />
                                                <input type="text" class="form-control" id="NUMEROFOLIODINDUSTRIALV" name="NUMEROFOLIODINDUSTRIALV" value="<?php echo $NUMEROFOLIODINDUSTRIAL; ?>" disabled style="background-color: #eeeeee;" />
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label>Fecha Embalado </label>
                                                <input type="date" class="form-control" placeholder="Fecha Embalado" id="FECHAEMBALADODINDUSTRIAL" name="FECHAEMBALADODINDUSTRIAL" value="<?php echo $FECHAEMBALADODINDUSTRIAL; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLEDSTYLE; ?> />
                                                <label id="val_fechaembalado" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Productor </label>
                                                <input type="hidden" class="form-control" placeholder="ID PRODUCTOR" id="PRODUCTOR" name="PRODUCTOR" value="<?php echo $PRODUCTOR; ?>" />
                                                <input type="hidden" class="form-control" placeholder="FECHAPROCESO" id="FECHAPROCESO" name="FECHAPROCESO" value="<?php echo $FECHAPROCESO; ?>" />
                                                <input type="text" class="form-control" placeholder="Nombre Productor" id="NOMBREPRODUCTOR" name="NOMBREPRODUCTOR" value="<?php echo $PRODUCTORDATOS; ?>" disabled style="background-color: #eeeeee;" />
                                                <label id="val_productor" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Variedad</label>
                                                <input type="hidden" class="form-control" placeholder="ID VESPECIES" id="VESPECIES" name="VESPECIES" value="<?php echo $VESPECIES; ?>" />
                                                <input type="text" class="form-control" placeholder="Nombre Variedad" id="NOMBREVARIEDAD" name="NOMBREVARIEDAD" value="<?php echo $NOMBREVESPECIES; ?>" disabled style="background-color: #eeeeee;" />
                                                <label id="val_vespecies" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Estandar </label>
                                                <select class="form-control select2" id="ESTANDAR" name="ESTANDAR" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLEDSTYLE; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYESTANDAR as $r) : ?>
                                                        <?php if ($ARRAYESTANDAR) {    
                                                               
                                                            ?>

                                                            <option value="<?php echo $r['ID_ESTANDAR']; ?>" <?php if ($ESTANDAR == $r['ID_ESTANDAR']) {echo "selected";} ?>><?php echo $r['CODIGO_ESTANDAR'] ?> : <?php echo $r['NOMBRE_ESTANDAR'] ?> </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados</option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_estandar" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Kilos Neto </label>
                                                <input type="number" class="form-control" step="0.01" placeholder="Kilos Neto" id="KILOSNETO" name="KILOSNETO" value="<?php echo $KILOSNETO; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLEDSTYLE; ?> />
                                                <label id="val_neto" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <?php if($ESTADO_USO_CALIBRE == 1){ ?>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 " style="display: none;">
                                            <div class="form-group">
                                                <label>Calibre Industrial</label>
                                                <select class="form-control select2" id="TCALIBREIND" name="TCALIBREIND" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYTCALIBREIND as $r) : ?>
                                                        <?php if ($ARRAYTCALIBREIND) {    ?>
                                                            <option value="<?php echo $r['ID_TCALIBREIND']; ?>" <?php if ($TCALIBREIND == $r['ID_TCALIBREIND']) {
                                                                                                                    echo "selected";
                                                                                                                } ?>> <?php echo $r['NOMBRE_TCALIBREIND'] ?> </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados</option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_tcalibreind" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Tipo Manejo</label><br>
                                                <select class="form-control select2" id="TMANEJO" name="TMANEJO" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYTMANEJO as $r) : ?>
                                                        <?php if ($ARRAYTMANEJO) {    ?>
                                                            <option value="<?php echo $r['ID_TMANEJO']; ?>" <?php if ($TMANEJO == $r['ID_TMANEJO']) {
                                                                                                                echo "selected";
                                                                                                            } ?>> <?php echo $r['NOMBRE_TMANEJO'];  ?>
                                                            </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados</option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_tmanejo" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <label id=" val_mensaje" class="validacion"><?php echo $MENSAJEELIMINAR; ?> </label>
                                    <!-- /.row -->
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="btn-group btn-block col-xxl-4 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12">
                                        <button type="button" class="btn btn-success  " data-toggle="tooltip" title="Volver" name="CANCELAR" value="CANCELAR" Onclick="irPagina('<?php echo $URLO; ?>.php?op&id=<?php echo $id_dato; ?>&a=<?php echo $accion_dato; ?>&urlo=<?php echo $urlo_dato; ?>');">
                                            <i class="ti-back-left "></i> Volver
                                        </button>
                                        <?php if ($OP == "") { ?>
                                            <button type="submit" class="btn btn-primary " data-toggle="tooltip" title="Guardar" name="CREAR" value="CREAR" <?php echo $DISABLED; ?> onclick="return validacion()">
                                                <i class="ti-save-alt"></i> Guardar
                                            </button>
                                        <?php } ?>
                                        <?php if ($OP != "") { ?>
                                            <?php if ($OP == "crear") { ?>
                                                <button type="submit" class="btn btn-primary " data-toggle="tooltip" title="Guardar" name="CREAR" value="CREAR" <?php echo $DISABLED; ?> onclick="return validacion()">
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

                            </div>
                        </form>
                        <!--.row -->
                    </section>
                </div>
            </div>
            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php include_once "../../assest/config/footer.php"; ?>
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
                  title: "Cuadratura de proceso",
                  html:"Kg. Exportacion: '.$TOTALDESHIDRATACIONEXV.'<br> Kg. Industrial: '.$TOTALNETOINDV.'<br>Diferencia Kg: '.$DIFERENCIAKILOSNETOEXPO.'"
                })
            </script>';
        ?>
    <?php 
    
            //OPERACIONES
            //OPERACION DE REGISTRO DE FILA
            if (isset($_REQUEST['CREAR'])) {
                //OBTENER EL FOLIO DEL DETALLE DE EXPORTACION DEL PROCESO
                $ARRAYVERFOLIO = $FOLIO_ADO->verFolioPorEmpresaPlantaTemporadaTindustrial($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
                $FOLIO = $ARRAYVERFOLIO[0]['ID_FOLIO'];
                $ARRAYULTIMOFOLIO = $EXIINDUSTRIAL_ADO->obtenerFolio($FOLIO,$_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
                if ($ARRAYULTIMOFOLIO) {
                    if ($ARRAYULTIMOFOLIO[0]['ULTIMOFOLIO'] == 0) {
                        $FOLIOINDUSTRIAL = $ARRAYVERFOLIO[0]['NUMERO_FOLIO'];
                    } else {
                        $FOLIOINDUSTRIAL = $ARRAYULTIMOFOLIO[0]['ULTIMOFOLIO'];
                    }
                } else {
                    $FOLIOINDUSTRIAL = $ARRAYVERFOLIO[0]['NUMERO_FOLIO'];
                }
                $NUMEROFOLIODINDUSTRIAL = $FOLIOINDUSTRIAL + 1;


                $FOLIOALIASESTACTICO = $NUMEROFOLIODINDUSTRIAL;
                $FOLIOALIASDIANAMICO = "EMPRESA:" . $_REQUEST['EMPRESA'] . "_PLANTA:" . $_REQUEST['PLANTA'] . "_TEMPORADA:" . $_REQUEST['TEMPORADA'] .
                    "_TIPO_FOLIO:PRODUCTO INDUSTRIAL_PROCESO:" . $_REQUEST['IDP'] . "_FOLIO:" . $NUMEROFOLIODINDUSTRIAL;
                $ARRAYVERESTANDAR=$EINDUSTRIAL_ADO->verEstandar($_REQUEST['ESTANDAR']);
                if($ARRAYVERESTANDAR){
                    $TCOBRO=$ARRAYVERESTANDAR[0]["COBRO"];
                }

                $DPINDUSTRIAL->__SET('FOLIO_DPINDUSTRIAL', $NUMEROFOLIODINDUSTRIAL);
                $DPINDUSTRIAL->__SET('FECHA_EMBALADO_DPINDUSTRIAL', $_REQUEST['FECHAEMBALADODINDUSTRIAL']);
                $DPINDUSTRIAL->__SET('KILOS_NETO_DPINDUSTRIAL', $_REQUEST['KILOSNETO']);
                $DPINDUSTRIAL->__SET('ID_FOLIO', $FOLIO);
                $DPINDUSTRIAL->__SET('ID_VESPECIES',  $_REQUEST['VESPECIES']);
                $DPINDUSTRIAL->__SET('ID_ESTANDAR', $_REQUEST['ESTANDAR']);
                $DPINDUSTRIAL->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
                $DPINDUSTRIAL->__SET('ID_TMANEJO', $_REQUEST['TMANEJO']);
                $DPINDUSTRIAL->__SET('ID_TCALIBREIND', 0);
                $DPINDUSTRIAL->__SET('ID_PROCESO', $_REQUEST['IDP']);
                $DPINDUSTRIAL_ADO->agregarDpindustrial($DPINDUSTRIAL);

                $AUSUARIO_ADO->agregarAusuario2("NULL",1, 1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Detalle de industrial de proceso","fruta_dpindustrial","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],$_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );

                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
                $EXIINDUSTRIAL->__SET('FOLIO_EXIINDUSTRIAL', $NUMEROFOLIODINDUSTRIAL);
                $EXIINDUSTRIAL->__SET('FOLIO_AUXILIAR_EXIINDUSTRIAL', $NUMEROFOLIODINDUSTRIAL);
                $EXIINDUSTRIAL->__SET('FECHA_EMBALADO_EXIINDUSTRIAL',  $_REQUEST['FECHAEMBALADODINDUSTRIAL']);
                $EXIINDUSTRIAL->__SET('KILOS_NETO_EXIINDUSTRIAL', $_REQUEST['KILOSNETO']);
                $EXIINDUSTRIAL->__SET('ALIAS_DINAMICO_FOLIO_EXIINDUSTRIAL', $FOLIOALIASESTACTICO);
                $EXIINDUSTRIAL->__SET('ALIAS_ESTATICO_FOLIO_EXIINDUSTRIAL', $FOLIOALIASDIANAMICO);
                $EXIINDUSTRIAL->__SET('FECHA_PROCESO', $_REQUEST['FECHAPROCESO']);
                $EXIINDUSTRIAL->__SET('TCOBRO', $TCOBRO);
                $EXIINDUSTRIAL->__SET('ID_TMANEJO', $_REQUEST['TMANEJO']);
                $EXIINDUSTRIAL->__SET('ID_TCALIBRE', 0);
                $EXIINDUSTRIAL->__SET('ID_FOLIO', $FOLIO);
                $EXIINDUSTRIAL->__SET('ID_ESTANDAR', $_REQUEST['ESTANDAR']);
                $EXIINDUSTRIAL->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
                $EXIINDUSTRIAL->__SET('ID_VESPECIES', $_REQUEST['VESPECIES']);
                $EXIINDUSTRIAL->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                $EXIINDUSTRIAL->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
                $EXIINDUSTRIAL->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
                $EXIINDUSTRIAL->__SET('ID_PROCESO', $_REQUEST['IDP']);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $EXIINDUSTRIAL_ADO->agregarExiindustrialProceso($EXIINDUSTRIAL);

                $AUSUARIO_ADO->agregarAusuario2("NULL",1, 1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Existencia de Producto Industrial","fruta_exiindustrial","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],$_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );


                //REDIRECCIONAR A PAGINA registroProceso.php 
                $id_dato =  $_REQUEST['IDP'];
                $accion_dato =  $_REQUEST['OPP'];
                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro creado",
                        text:"El registro de producto industrial se ha creado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Volver al proceso",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href="' . $_REQUEST['URLO'] . '.php?op&id='.$id_dato.'&a='.$accion_dato.'&urlo='.$urlo_dato.'&idd='.$idd_dato.'&ad='.$acciond_dato.'";                        
                    })
                </script>';
            }
            if (isset($_REQUEST['EDITAR'])) {

                $ARRAYVERESTANDAR=$EINDUSTRIAL_ADO->verEstandar($_REQUEST['ESTANDAR']);
                if($ARRAYVERESTANDAR){
                   $TCOBRO=$ARRAYVERESTANDAR[0]["COBRO"];
                }

                $DPINDUSTRIAL->__SET('FECHA_EMBALADO_DPINDUSTRIAL', $_REQUEST['FECHAEMBALADODINDUSTRIAL']);
                $DPINDUSTRIAL->__SET('KILOS_NETO_DPINDUSTRIAL', $_REQUEST['KILOSNETO']);
                $DPINDUSTRIAL->__SET('ID_TMANEJO', $_REQUEST['TMANEJO']);
                $DPINDUSTRIAL->__SET('ID_VESPECIES',  $_REQUEST['VESPECIES']);
                $DPINDUSTRIAL->__SET('ID_ESTANDAR', $_REQUEST['ESTANDAR']);
                $DPINDUSTRIAL->__SET('ID_TCALIBREIND', 0);
                $DPINDUSTRIAL->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
                $DPINDUSTRIAL->__SET('ID_PROCESO', $_REQUEST['IDP']);
                $DPINDUSTRIAL->__SET('ID_DPINDUSTRIAL', $_REQUEST['ID']);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $DPINDUSTRIAL_ADO->actualizarDpindustrial($DPINDUSTRIAL);

                $AUSUARIO_ADO->agregarAusuario2("NULL",1, 1,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de Detalle de industrial de proceso","fruta_drindustrial",$_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],$_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );
                

                $ARRAYVERFOLIOEXISTENCIA = $EXIINDUSTRIAL_ADO->buscarPorProcesoNumeroFolio($_REQUEST['IDP'],  $_REQUEST["NUMEROFOLIODINDUSTRIALE"]);

                if ($ARRAYVERFOLIOEXISTENCIA) {
                    $EXIINDUSTRIAL->__SET('FECHA_EMBALADO_EXIINDUSTRIAL',  $_REQUEST['FECHAEMBALADODINDUSTRIAL']);
                    $EXIINDUSTRIAL->__SET('KILOS_NETO_EXIINDUSTRIAL', $_REQUEST['KILOSNETO']);
                    $EXIINDUSTRIAL->__SET('FECHA_PROCESO', $_REQUEST['FECHAPROCESO']);
                    $EXIINDUSTRIAL->__SET('TCOBRO', $TCOBRO);
                    $EXIINDUSTRIAL->__SET('ID_TMANEJO', $_REQUEST['TMANEJO']);
                    $EXIINDUSTRIAL->__SET('ID_TCALIBRE', 0);
                    $EXIINDUSTRIAL->__SET('ID_ESTANDAR', $_REQUEST['ESTANDAR']);
                    $EXIINDUSTRIAL->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
                    $EXIINDUSTRIAL->__SET('ID_VESPECIES', $_REQUEST['VESPECIES']);
                    $EXIINDUSTRIAL->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                    $EXIINDUSTRIAL->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
                    $EXIINDUSTRIAL->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
                    $EXIINDUSTRIAL->__SET('ID_PROCESO', $_REQUEST['IDP']);
                    $EXIINDUSTRIAL->__SET('ID_EXIINDUSTRIAL', $ARRAYVERFOLIOEXISTENCIA[0]['ID_EXIINDUSTRIAL']);
                    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                    $EXIINDUSTRIAL_ADO->actualizarExiindustrialProceso($EXIINDUSTRIAL);

                    $AUSUARIO_ADO->agregarAusuario2("NULL",1, 2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de Existencia de Producto Industrial","fruta_exiindustrial","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],$_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );

                } else {
                    $ARRAYVERFOLIO = $FOLIO_ADO->verFolioPorEmpresaPlantaTemporadaTindustrial($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
                    $FOLIO = $ARRAYVERFOLIO[0]['ID_FOLIO'];
                    $NUMEROFOLIODINDUSTRIAL = $_REQUEST["NUMEROFOLIODINDUSTRIALE"];
                    $FOLIOALIASESTACTICO = $NUMEROFOLIODINDUSTRIAL;
                    $FOLIOALIASDIANAMICO = "EMPRESA:" . $_REQUEST['EMPRESA'] . "_PLANTA:" . $_REQUEST['PLANTA'] . "_TEMPORADA:" . $_REQUEST['TEMPORADA'] .
                        "_TIPO_FOLIO:PRODUCTO INDUSTRIAL_PROCESO:" . $_REQUEST['IDP'] . "_FOLIO:" . $NUMEROFOLIODINDUSTRIAL;

                    $EXIINDUSTRIAL->__SET('FOLIO_EXIINDUSTRIAL', $NUMEROFOLIODINDUSTRIAL);
                    $EXIINDUSTRIAL->__SET('FOLIO_AUXILIAR_EXIINDUSTRIAL', $NUMEROFOLIODINDUSTRIAL);
                    $EXIINDUSTRIAL->__SET('FECHA_EMBALADO_EXIINDUSTRIAL',  $_REQUEST['FECHAEMBALADODINDUSTRIAL']);
                    $EXIINDUSTRIAL->__SET('KILOS_NETO_EXIINDUSTRIAL', $_REQUEST['KILOSNETO']);
                    $EXIINDUSTRIAL->__SET('ALIAS_DINAMICO_FOLIO_EXIINDUSTRIAL', $FOLIOALIASESTACTICO);
                    $EXIINDUSTRIAL->__SET('ALIAS_ESTATICO_FOLIO_EXIINDUSTRIAL', $FOLIOALIASDIANAMICO);
                    $EXIINDUSTRIAL->__SET('FECHA_PROCESO', $_REQUEST['FECHAPROCESO']);
                    $EXIINDUSTRIAL->__SET('TCOBRO', $TCOBRO);
                    $EXIINDUSTRIAL->__SET('ID_TMANEJO', $_REQUEST['TMANEJO']);
                    $EXIINDUSTRIAL->__SET('ID_TCALIBRE', 0);
                    $EXIINDUSTRIAL->__SET('ID_FOLIO', $FOLIO);
                    $EXIINDUSTRIAL->__SET('ID_ESTANDAR', $_REQUEST['ESTANDAR']);
                    $EXIINDUSTRIAL->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
                    $EXIINDUSTRIAL->__SET('ID_VESPECIES', $_REQUEST['VESPECIES']);
                    $EXIINDUSTRIAL->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                    $EXIINDUSTRIAL->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
                    $EXIINDUSTRIAL->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
                    $EXIINDUSTRIAL->__SET('ID_PROCESO', $_REQUEST['IDP']);
                    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                    $EXIINDUSTRIAL_ADO->agregarExiindustrialProceso($EXIINDUSTRIAL);
                    
                    $AUSUARIO_ADO->agregarAusuario2("NULL",1, 1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Existencia de Producto Industrial","fruta_exiindustrial","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],$_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );
                }
                
                //REDIRECCIONAR A PAGINA registroProceso.php 
                $id_dato =  $_REQUEST['IDP'];
                $accion_dato =  $_REQUEST['OPP'];    
                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Modificado",
                        text:"El registro de producto industrial se ha modificada correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Volver al proceso",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href="' . $_REQUEST['URLO'] . '.php?op&id='.$id_dato.'&a='.$accion_dato.'&urlo='.$urlo_dato.'&idd='.$idd_dato.'&ad='.$acciond_dato.'";                        
                    })
                </script>';

            }
            if (isset($_REQUEST['ELIMINAR'])) {

                $IDELIMINAR = $_REQUEST['ID'];
                $FOLIOELIMINAR = $_REQUEST['NUMEROFOLIODINDUSTRIALE'];
                $DPINDUSTRIAL->__SET('ID_DPINDUSTRIAL', $IDELIMINAR);
                $DPINDUSTRIAL_ADO->deshabilitar($DPINDUSTRIAL);

                $AUSUARIO_ADO->agregarAusuario2("NULL",1,4,"".$_SESSION["NOMBRE_USUARIO"].", Deshabilitar  detalle de industrial proceso.","fruta_dpindustrial", $_REQUEST['ID'] ,$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  


                $EXIINDUSTRIAL->__SET('ID_PROCESO', $_REQUEST['IDP']);
                $EXIINDUSTRIAL->__SET('FOLIO_EXIINDUSTRIAL', $FOLIOELIMINAR);
                $EXIINDUSTRIAL->__SET('FOLIO_AUXILIAR_EXIINDUSTRIAL', $FOLIOELIMINAR);
                $EXIINDUSTRIAL_ADO->deshabilitarProceso($EXIINDUSTRIAL);

                $EXIINDUSTRIAL->__SET('ID_PROCESO', $_REQUEST['IDP']);
                $EXIINDUSTRIAL->__SET('FOLIO_EXIINDUSTRIAL', $FOLIOELIMINAR);
                $EXIINDUSTRIAL->__SET('FOLIO_AUXILIAR_EXIINDUSTRIAL', $FOLIOELIMINAR);
                $EXIINDUSTRIAL_ADO->eliminadoProceso($EXIINDUSTRIAL);

                $AUSUARIO_ADO->agregarAusuario2("NULL",1,4,"".$_SESSION["NOMBRE_USUARIO"].", Deshabilitar  Existencia de Producto Industrial.","fruta_exiindustrial", "NULL" ,$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  


                //REDIRECCIONAR A PAGINA registroProceso.php 
                $id_dato =  $_REQUEST['IDP'];
                $accion_dato =  $_REQUEST['OPP'];
                echo '<script>
                        Swal.fire({
                            icon:"error",
                            title:"Registro Eliminado",
                            text:"El registro de producto industrial se ha eliminado correctamente ",
                            showConfirmButton:true,
                            confirmButtonText:"Volver al proceso"
                        }).then((result)=>{
                            location.href ="' . $_REQUEST['URLO'] . '.php?op&id='.$id_dato.'&a='.$accion_dato.'&urlo='.$urlo_dato.'&idd='.$idd_dato.'&ad='.$acciond_dato.'";                        
                        })
                    </script>';
            }   
    
    
    ?>



</body>


</html>