<?php

include_once "../../assest/config/validarUsuarioMaterial.php";
//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/PRODUCTO_ADO.php';
include_once '../../assest/controlador/TCONTENEDORM_ADO.php';
include_once '../../assest/controlador/TUMEDIDA_ADO.php';
include_once '../../assest/controlador/FOLIOM_ADO.php';


include_once '../../assest/controlador/INVENTARIOM_ADO.php';
include_once '../../assest/controlador/RECEPCIONM_ADO.php';
include_once '../../assest/controlador/DRECEPCIONM_ADO.php';
include_once '../../assest/controlador/TARJAM_ADO.php';

include_once '../../assest/modelo/INVENTARIOM.php';
include_once '../../assest/modelo/TARJAM.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$PRODUCTO_ADO =  new PRODUCTO_ADO();
$TCONTENEDOR_ADO =  new TCONTENEDORM_ADO();
$TUMEDIDA_ADO =  new TUMEDIDA_ADO();
$FOLIO_ADO =  new FOLIOM_ADO();

$INVENTARIOM_ADO =  new INVENTARIOM_ADO();
$RECEPCIONM_ADO =  new RECEPCIONM_ADO();
$DRECEPCIONM_ADO =  new DRECEPCIONM_ADO();
$TARJAM_ADO =  new TARJAM_ADO();

//INIICIALIZAR MODELO
$INVENTARIOM =  new INVENTARIOM();
$TARJAM =  new TARJAM();

//INICIALIZACION VARIABLES
$NUMEROFOLIO = "";
$FOLIOINVENTARIO = "";
$DESCRIPCION = "";
$CANTIDAD = 0;
$FOLIOANTERIOR = "";
$VALORUNITARIO = 0;

$ALIASDINAMICO = "";
$ALIASESTACTICO = "";
$VALORTOTAL = 0;
$CANTIDAD = 0;
$CANTIDADC = 0;
$CANTIDADT = 0;
$CANTIDADPT = 0;
$VALORUNITARIO = 0;
$NUMERO = 1;
$INDEX = 0;

$PRODUCTO = "";
$PRODUCTOV = "";
$TCONTENEDOR = "";
$TCONTENEDORV = "";
$TUMEDIDA = "";
$TUMEDIDAV = "";

$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";
$PLANTA = "";
$FOLIO = "";

$PRODUCTOR = "";
$ESTADO = "";

$DISABLED = "";
$DISABLED2 = "";

$IDOP = "";
$OP = "";
$IDPOP = "";
$OPP = "";
$URLP = "";

$IDPOD = "";
$OPD = "";
$URLD = "";

$SINO = "";
$MENSAJE = "";


//INICIALIZAR ARREGLOS
$ARRAYPRODUCTO = "";
$ARRAYTCONTENEDOR = "";
$ARRAYTUMEDIDA = "";
$ARRAYVERPRODUCTO = "";
$ARRAYVERTCONTENEDOR = "";
$ARRAYVERTUMEDIDA = "";
$ARRAYDTARJA = "";
$ARRAYTARJA = "";
$ARRAYRECEPCION = "";
$ARRAYDRECEPCION = "";
$ARRAYVERFOLIO = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES


$ARRAYPRODUCTO = $PRODUCTO_ADO->listarProductoPorEmpresaCBX($EMPRESAS, $TEMPORADAS);
$ARRAYTCONTENEDOR = $TCONTENEDOR_ADO->listarTcontenedorPorEmpresaCBX($EMPRESAS);
$ARRAYTUMEDIDA = $TUMEDIDA_ADO->listarTumedidaPorEmpresaCBX($EMPRESAS);
include_once "../../assest/config/validarDatosUrlD.php";
include_once "../../assest/config/datosUrlDT.php";


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

if (isset($_GET["urlod"])) {
    $urlod_dato = $_GET["urlod"];
}else{
    $urlod_dato = "";
}

if (isset($_GET["iddt"])) {
    $iddt_dato = $_GET["iddt"];
}else{
    $iddt_dato = "";
}


if (isset($_GET["adt"])) {
    $acciondt_dato = $_GET["adt"];
}else{
    $acciondt_dato = "";
}


//echo 'entro aqui'.$id_dato.' data 2'.$urlo_dato;
//OBTENCION DE DATOS ENVIADOR A LA URL
if (
    isset($id_dato) && isset($accion_dato) && isset($urlo_dato) &&
    isset($idd_dato) && isset($acciond_dato) && isset($urlod_dato)
) {
    $IDP = $id_dato;
    $OPP = $accion_dato;
    $URLP = $urlo_dato;
    $IDD = $idd_dato;
    $OPD = $acciond_dato;
    $URLD = $urlod_dato;
   

    $ARRAYDRECEPCION = $DRECEPCIONM_ADO->verDrecepcion($IDD);
    $ARRAYDTRECEPCIONTOTALES = $TARJAM_ADO->obtenerTotalesTarjaPorDrecepcionCBX($IDD);
    if ($ARRAYDTRECEPCIONTOTALES) {
        $CANTIDADT = $ARRAYDTRECEPCIONTOTALES[0]['CANTIDAD'];
    }
    foreach ($ARRAYDRECEPCION as $r) :
        $CANTIDADC = "" . $r['CANTIDAD_DRECEPCION'];
        $VALORUNITARIO =  "" . $r['VALOR_UNITARIO_DRECEPCION'];
        $PRODUCTO = "" . $r['ID_PRODUCTO'];
        $ARRAYVERPRODUCTO = $PRODUCTO_ADO->verProducto($PRODUCTO);
        if ($ARRAYVERPRODUCTO) {
            $PRODUCTOV = $ARRAYVERPRODUCTO[0]['CODIGO_PRODUCTO'] . " " . $ARRAYVERPRODUCTO[0]['NOMBRE_PRODUCTO'];
        }
        $TUMEDIDA = "" . $r['ID_TUMEDIDA'];
        $ARRAYVERTUMEDIDA = $TUMEDIDA_ADO->verTumedida($TUMEDIDA);
        if ($ARRAYVERTUMEDIDA) {
            $TUMEDIDAV = $ARRAYVERTUMEDIDA[0]['NOMBRE_TUMEDIDA'];
        }
        $ESTADO = "" . $r['ESTADO'];
        $CANTIDADPT = $CANTIDADC - $CANTIDADT;
    endforeach;
}
//PARA OPERACIONES DE EDICION , VISUALIZACION Y CREACION
//OPERACION PARA OBTENER EL ID RECEPCION Y FOLIO BASE, SOLO SE OCUPA PARA CREAR UN REGISTRO NUEVO
if (
    isset($id_dato) && isset($accion_dato) && isset($urlo_dato) &&
    isset($idd_dato) && isset($acciond_dato) && isset($urlod_dato)  &&
    isset($iddt_dato) && isset($acciondt_dato)
) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $iddt_dato;
    $OP = $acciondt_dato;//??

    $IDP = $id_dato;
    $OPP = $accion_dato;
    $URLP = $urlo_dato;
    $IDD = $idd_dato;
    $OPD = $acciond_dato;
    $URLD = $urlod_dato;


    //crear =  OBTENCION DE DATOS PARA LA CREACION DE REGISTRO
    if ($OP == "crear") {
        $DISABLED = "";
        $DISABLED2 = "";
        $DISABLEDSTYLE = "";
        $DISABLEDSTYLE2 = "";
        $ARRAYTARJA = $TARJAM_ADO->verTarja($IDOP);
        foreach ($ARRAYTARJA as $r) :
            $NUMEROFOLIO = "" . $r['FOLIO_TARJA'];
            $FOLIOANTERIOR = "" . $r['FOLIOANTERIOR'];
            $CANTIDADC = "" . $r['CANITDAD_CONTENEDOR'];
            $CANTIDAD = "" . $r['CANTIDAD_TARJA'];
            $FOLIOANTERIOR = "" . $r['FOLIOANTERIOR'];
            $PRODUCTO = "" . $r['ID_PRODUCTO'];
            $ARRAYVERPRODUCTO = $PRODUCTO_ADO->verProducto($PRODUCTO);
            if ($ARRAYVERPRODUCTO) {
                $PRODUCTOV = $ARRAYVERPRODUCTO[0]['CODIGO_PRODUCTO'] . " " . $ARRAYVERPRODUCTO[0]['NOMBRE_PRODUCTO'];
            }
            $TCONTENEDOR = "" . $r['ID_TCONTENEDOR'];

            $TUMEDIDA = "" . $r['ID_TUMEDIDA'];
            $ARRAYVERTUMEDIDA = $TUMEDIDA_ADO->verTumedida($TUMEDIDA);
            if ($ARRAYVERTUMEDIDA) {
                $TUMEDIDAV = $ARRAYVERTUMEDIDA[0]['NOMBRE_TUMEDIDA'];
            }
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {

        $DISABLED = "";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYTARJA = $TARJAM_ADO->verTarja($IDOP);
        foreach ($ARRAYTARJA as $r) :
            $NUMEROFOLIO = "" . $r['FOLIO_TARJA'];
            $FOLIOANTERIOR = "" . $r['FOLIOANTERIOR'];
            $CANTIDADC = "" . $r['CANITDAD_CONTENEDOR'];
            $CANTIDAD = "" . $r['CANTIDAD_TARJA'];
            $PRODUCTO = "" . $r['ID_PRODUCTO'];
            $FOLIOANTERIOR = "" . $r['FOLIOANTERIOR'];
            $ARRAYVERPRODUCTO = $PRODUCTO_ADO->verProducto($PRODUCTO);
            if ($ARRAYVERPRODUCTO) {
                $PRODUCTOV = $ARRAYVERPRODUCTO[0]['CODIGO_PRODUCTO'] . " " . $ARRAYVERPRODUCTO[0]['NOMBRE_PRODUCTO'];
            }
            $TCONTENEDOR = "" . $r['ID_TCONTENEDOR'];

            $TUMEDIDA = "" . $r['ID_TUMEDIDA'];
            $ARRAYVERTUMEDIDA = $TUMEDIDA_ADO->verTumedida($TUMEDIDA);
            if ($ARRAYVERTUMEDIDA) {
                $TUMEDIDAV = $ARRAYVERTUMEDIDA[0]['NOMBRE_TUMEDIDA'];
            }
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }    //ver =  OBTENCION DE DATOS PARA LA VISUALIZACION DEL REGISTRO
    if ($OP == "ver") {
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYTARJA = $TARJAM_ADO->verTarja($IDOP);
        foreach ($ARRAYTARJA as $r) :
            $NUMEROFOLIO = "" . $r['FOLIO_TARJA'];
            $FOLIOANTERIOR = "" . $r['FOLIOANTERIOR'];
            $CANTIDADC = "" . $r['CANITDAD_CONTENEDOR'];
            $CANTIDAD = "" . $r['CANTIDAD_TARJA'];
            $PRODUCTO = "" . $r['ID_PRODUCTO'];
            $FOLIOANTERIOR = "" . $r['FOLIOANTERIOR'];
            $ARRAYVERPRODUCTO = $PRODUCTO_ADO->verProducto($PRODUCTO);
            if ($ARRAYVERPRODUCTO) {
                $PRODUCTOV = $ARRAYVERPRODUCTO[0]['CODIGO_PRODUCTO'] . " " . $ARRAYVERPRODUCTO[0]['NOMBRE_PRODUCTO'];
            }
            $TCONTENEDOR = "" . $r['ID_TCONTENEDOR'];

            $TUMEDIDA = "" . $r['ID_TUMEDIDA'];
            $ARRAYVERTUMEDIDA = $TUMEDIDA_ADO->verTumedida($TUMEDIDA);
            if ($ARRAYVERTUMEDIDA) {
                $TUMEDIDAV = $ARRAYVERTUMEDIDA[0]['NOMBRE_TUMEDIDA'];
            }
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }
    if ($OP == "eliminar") {
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $MENSAJE = "ESTA SEGURO DE ELIMINAR EL REGISTRO, PARA CONFIRMAR PRESIONE ELIMINAR";
        $ARRAYTARJA = $TARJAM_ADO->verTarja($IDOP);
        foreach ($ARRAYTARJA as $r) :
            $NUMEROFOLIO = "" . $r['FOLIO_TARJA'];
            $FOLIOANTERIOR = "" . $r['FOLIOANTERIOR'];
            $CANTIDADC = "" . $r['CANITDAD_CONTENEDOR'];
            $CANTIDAD = "" . $r['CANTIDAD_TARJA'];
            $PRODUCTO = "" . $r['ID_PRODUCTO'];
            $FOLIOANTERIOR = "" . $r['FOLIOANTERIOR'];
            $ARRAYVERPRODUCTO = $PRODUCTO_ADO->verProducto($PRODUCTO);
            if ($ARRAYVERPRODUCTO) {
                $PRODUCTOV = $ARRAYVERPRODUCTO[0]['CODIGO_PRODUCTO'] . " " . $ARRAYVERPRODUCTO[0]['NOMBRE_PRODUCTO'];
            }
            $TCONTENEDOR = "" . $r['ID_TCONTENEDOR'];

            $TUMEDIDA = "" . $r['ID_TUMEDIDA'];
            $ARRAYVERTUMEDIDA = $TUMEDIDA_ADO->verTumedida($TUMEDIDA);
            if ($ARRAYVERTUMEDIDA) {
                $TUMEDIDAV = $ARRAYVERTUMEDIDA[0]['NOMBRE_TUMEDIDA'];
            }
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }
}
if (isset($_POST)) {
    if (isset($_REQUEST['CANTIDAD'])) {
        $CANTIDAD = "" . $_REQUEST['CANTIDAD'];

    }
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Tarja Recepción </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../../assest/config/urlHead.php"; ?>
        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
                function validacion() {

                    TCONTENEDOR = document.getElementById("TCONTENEDOR").selectedIndex;
                    CANTIDAD = document.getElementById("CANTIDAD").value;
                    NUMERO = document.getElementById("NUMERO").value;
                    document.getElementById('val_tcontenedor').innerHTML = "";
                    document.getElementById('val_cantidad').innerHTML = "";
                    document.getElementById('val_tcontenedor').innerHTML = "";
                    document.getElementById('val_numero').innerHTML = "";


                    if (TCONTENEDOR == null || TCONTENEDOR == 0) {
                        document.form_reg_dato.TCONTENEDOR.focus();
                        document.form_reg_dato.TCONTENEDOR.style.borderColor = "#FF0000";
                        document.getElementById('val_tcontenedor').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.TCONTENEDOR.style.borderColor = "#4AF575";

                    if (NUMERO) {
                        if (NUMERO == 0) {
                            document.form_reg_dato.NUMERO.focus();
                            document.form_reg_dato.NUMERO.style.borderColor = "#FF0000";
                            document.getElementById('val_numero').innerHTML = "TIENE QUE SER MAYOR A CERO";
                            return false;
                        }
                        document.form_reg_dato.NUMERO.style.borderColor = "#4AF575";
                    }

                    if (CANTIDAD == null || CANTIDAD.length == 0 || /^\s+$/.test(CANTIDAD)) {
                        document.form_reg_dato.CANTIDAD.focus();
                        document.form_reg_dato.CANTIDAD.style.borderColor = "#FF0000";
                        document.getElementById('val_cantidad').innerHTML = "NO HA INGRESADO DATOS";
                        return false;
                    }
                    document.form_reg_dato.CANTIDAD.style.borderColor = "#4AF575";

                    if (CANTIDAD == 0) {
                        document.form_reg_dato.CANTIDAD.focus();
                        document.form_reg_dato.CANTIDAD.style.borderColor = "#FF0000";
                        document.getElementById('val_cantidad').innerHTML = "TIENE QUE SER MAYOR A CERO";
                        return false;
                    }
                    document.form_reg_dato.CANTIDAD.style.borderColor = "#4AF575";



                }
                //REDIRECCIONAR A LA PAGINA SELECIONADA
                function irPagina(url) {
                    location.href = "" + url;
                }

                //FUNCION PARA CERRAR VENTANA Y ACTUALIZAR PRINCIPAL
                function cerrar() {
                    window.opener.refrescar()
                    window.close();
                }
            </script>


</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary" >
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <?php include_once "../../assest/config/menuMaterial.php";  ?>
            <div class="content-wrapper">
                <div class="container-full">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Materiales </h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Materiales</li>
                                            <li class="breadcrumb-item" aria-current="page">Recepción</li>
                                            <li class="breadcrumb-item" aria-current="page">Registro Recepción </li>
                                            <li class="breadcrumb-item" aria-current="page">Registro Detalle </li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#">Registro Tarja </a>
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
                        <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato">
                            <div class="box">
                                <div class="card-header bg-info">
                                    <h4 class="card-title">Tarja del Detalle</h4>
                                </div>  
                                <div class="box-body ">
                                    <div class="row">
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <label>Número Folio</label>
                                            <input type="hidden" class="form-control" placeholder="ID TARJAM" id="IDT" name="IDT" value="<?php echo $IDOP; ?>" />
                                            <input type="hidden" class="form-control" placeholder="ID RECEPCIONE" id="IDP" name="IDP" value="<?php echo $IDP; ?>" />
                                            <input type="hidden" class="form-control" placeholder="OP RECEPCIONE" id="OPP" name="OPP" value="<?php echo $OPP; ?>" />
                                            <input type="hidden" class="form-control" placeholder="URL RECEPCIONE" id="URLP" name="URLP" value="registroRecepcionm" />

                                            <input type="hidden" class="form-control" placeholder="ID DRECEPCIONM" id="IDD" name="IDD" value="<?php echo $IDD; ?>" />
                                            <input type="hidden" class="form-control" placeholder="OP DRECEPCIONM" id="OPD" name="OPD" value="<?php echo $OPD; ?>" />
                                            <input type="hidden" class="form-control" placeholder="URL DRECEPCIONE" id="URLD" name="URLD" value="<?php echo $URLD; ?>" />
                                            <input type="hidden" class="form-control" placeholder="URL DTRECEPCIONE" id="URLT" name="URLT" value="registroDtrecepcionm" />

                                            <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                            <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTA" name="PLANTA" value="<?php echo $PLANTAS; ?>" />
                                            <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADAS; ?>" />
                                            <input type="hidden" class="form-control" style="background-color: #eeeeee;" placeholder="Número Folio" id="NUMEROFOLIO" name="NUMEROFOLIO" value="<?php echo $NUMEROFOLIO; ?>" />
                                            <input type="text" class="form-control" style="background-color: #eeeeee;" placeholder="Número Folio" id="NUMEROFOLIOV" name="NUMEROFOLIOV" value="<?php echo $NUMEROFOLIO; ?>" disabled />
                                            <label id="val_folio" class="validacion"> </label>
                                        </div>
                                        <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <label>Producto</label>
                                            <input type="hidden" class="form-control" placeholder="PRODUCTO" id="PRODUCTO" name="PRODUCTO" value="<?php echo $PRODUCTO; ?>" />
                                            <input type="text" class="form-control" placeholder="Producto" id="PRODUCTOV" name="PRODUCTOV" value="<?php echo $PRODUCTOV; ?>" disabled />
                                            <label id="val_producto" class="validacion"> </label>
                                        </div>
                                        <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <label>Tipo Contenedor</label>
                                            <input type="hidden" class="form-control" placeholder="TCONTENEDORE" id="TCONTENEDORE" name="TCONTENEDORE" value="<?php echo $TCONTENEDOR; ?>" />
                                            <select class="form-control select2" id="TCONTENEDOR" name="TCONTENEDOR" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED2; ?>>
                                                <option></option>
                                                <?php foreach ($ARRAYTCONTENEDOR as $r) : ?>
                                                    <?php if ($ARRAYTCONTENEDOR) {    ?>
                                                        <option value="<?php echo $r['ID_TCONTENEDOR']; ?>" 
                                                        <?php if ($TCONTENEDOR == $r['ID_TCONTENEDOR']) {  echo "selected"; } ?>> 
                                                        <?php echo $r['NOMBRE_TCONTENEDOR'] ?> </option>
                                                    <?php } else { ?>
                                                        <option>No Hay Datos Registrados </option>
                                                    <?php } ?>
                                                <?php endforeach; ?>
                                            </select>
                                            <label id="val_tcontenedor" class="validacion"> </label>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <label>Unidad Medida</label>
                                            <input type="hidden" class="form-control" placeholder="TUMEDIDA" id="TUMEDIDA" name="TUMEDIDA" value="<?php echo $TUMEDIDA; ?>" />
                                            <input type="text" class="form-control" placeholder="Unidad Medida" id="TUMEDIDAV" name="TUMEDIDAV" value="<?php echo $TUMEDIDAV; ?>" disabled />
                                            <label id="val_tumedida" class="validacion"> </label>
                                        </div>
                                        <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Valor Unitario </label>
                                                <input type="hidden" class="form-control" placeholder="VALORUNITARIO" id="VALORUNITARIO" name="VALORUNITARIO" value="<?php echo $VALORUNITARIO; ?>" />
                                                <input type="text" class="form-control" placeholder="Valor Unitario" id="VALORUNITARIOV" name="VALORUNITARIOV" value="<?php echo $VALORUNITARIO; ?>" disabled />
                                                <label id="val_vu" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Cantidad Recepcionada</label>
                                                <input type="hidden" class="form-control" placeholder="CANTIDADC" id="CANTIDADC" name="CANTIDADC" value="<?php echo $CANTIDADC; ?>" />
                                                <input type="text" class="form-control" placeholder="Cantidad Recepcionadar" id="CANTIDADCV" name="CANTIDADCV" value="<?php echo $CANTIDADC; ?>" disabled />
                                                <label id="val_cantidadc" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Cantidad Tarjada</label>
                                                <input type="hidden" class="form-control" placeholder="CANTIDADT" id="CANTIDADT" name="CANTIDADT" value="<?php echo $CANTIDADT; ?>" />
                                                <input type="text" class="form-control" placeholder="Cantidad Tarjada" id="CANTIDADTV" name="CANTIDADTV" value="<?php echo $CANTIDADT; ?>" disabled />
                                                <label id="val_cantidadt" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Cantidad Por Tarjar</label>
                                                <input type="hidden" class="form-control" placeholder="CANTIDADPT" id="CANTIDADPT" name="CANTIDADPT" value="<?php echo $CANTIDADPT; ?>" />
                                                <input type="text" class="form-control" placeholder="Cantidad Por Tarjar" id="CANTIDADPTV" name="CANTIDADPTV" value="<?php echo $CANTIDADPT; ?>" disabled />
                                                <label id="val_cantidadc" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Cantidad Contenedores</label>
                                                <input type="hidden" class="form-control" placeholder="NUMEROE" id="NUMEROE" name="NUMEROE" value="<?php echo $NUMERO; ?>" />
                                                <input type="number" class="form-control" placeholder="Cantidad Contenedores" id="NUMERO" name="NUMERO" value="<?php echo $NUMERO; ?>" <?php echo $DISABLED2; ?> />
                                                <label id="val_numero" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Cantidad Por Contenedor</label>
                                                <input type="hidden" class="form-control" placeholder="CANTIDADE" id="CANTIDADE" name="CANTIDADE" value="<?php echo $CANTIDAD; ?>" />
                                                <input type="number" class="form-control" placeholder="Cantidad Por Contenedor" id="CANTIDAD" name="CANTIDAD" value="<?php echo $CANTIDAD; ?>" <?php echo $DISABLED; ?> />
                                                <label id="val_cantidad" class="validacion"> </label>
                                            </div>
                                        </div>

                                        <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Folio Anterior</label>
                                                <input type="hidden" class="form-control" placeholder="FOLIOANTERIORE" id="FOLIOANTERIORE" name="FOLIOANTERIORE" value="<?php echo $FOLIOANTERIOR; ?>" />
                                                <input type="number" class="form-control" placeholder="Folio Anterior" id="FOLIOANTERIOR" name="FOLIOANTERIOR" value="<?php echo $FOLIOANTERIOR; ?>" <?php echo $DISABLED; ?> />
                                                <label id="val_cantidad" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <label id="val_drecepcion" class="validacion center"><?php echo $MENSAJE; ?> </label>
                                </div>
                                <!-- /.row -->
                                <!-- /.box-body -->
                                <div class="box-footer">
                                        <div class="btn-group btn-block  col-xxl-4 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12 " role="group" aria-label="Acciones generales">
                                            <button type="button" class="btn  btn-success  " data-toggle="tooltip" title="Volver" name="CANCELAR" value="CANCELAR" Onclick="irPagina('<?php echo $URLD; ?>.php?op&id=<?php echo $id_dato;?>&a=<?php echo $accion_dato; ?>&idd=<?php echo $idd_dato; ?>&ad=<?php echo $acciond_dato; ?>&urlo=<?php echo $urlo_dato; ?>');">
                                                <i class="ti-back-left "></i> Volver
                                            </button>
                                            <?php if ($OP == "") { ?>
                                                <button type="submit" class="btn btn-primary " data-toggle="tooltip" title="Guardar" name="CREAR" value="CREAR" <?php echo $DISABLED; ?>  onclick="return validacion()">
                                                    <i class="ti-save-alt"></i> Guardar
                                                </button>
                                            <?php } ?>
                                            <?php if ($OP != "") { ?>
                                                <?php if ($OP == "crear") { ?>
                                                    <button type="submit" class="btn btn-primary " data-toggle="tooltip" title="Guardar" name="CREAR" value="CREAR" <?php echo $DISABLED; ?>  onclick="return validacion()">
                                                        <i class="ti-save-alt"></i> Guardar
                                                    </button>
                                                <?php } ?>
                                                <?php if ($OP == "editar") { ?>
                                                    <button type="submit" class="btn btn-warning   " data-toggle="tooltip" title="Guardar" name="EDITAR" value="EDITAR" <?php echo $DISABLED; ?>  onclick="return validacion()">
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
                    </section>
                    <!-- /.content -->
                </div>
            </div>
            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php include_once "../../assest/config/footer.php";   ?>
                <?php include_once "../../assest/config/menuExtraMaterial.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../../assest/config/urlBase.php"; ?>
        <?php 
            //OPERACIONES
            //OPERACION DE REGISTRO DE FILA
            if (isset($_REQUEST['CREAR'])) {

                $ARRAYVERFOLIO = $FOLIO_ADO->verFolioPorEmpresaPlantaTemporadaTMateriales($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
                $FOLIO = $ARRAYVERFOLIO[0]['ID_FOLIO'];


                $NUMERO = $_REQUEST["NUMERO"];
                for ($INDEX = 1; $INDEX <= $NUMERO; $INDEX++) {
                    $ARRAYULTIMOFOLIO = $INVENTARIOM_ADO->obtenerFolio($FOLIO);
                    if ($ARRAYULTIMOFOLIO) {
                        if ($ARRAYULTIMOFOLIO[0]['ULTIMOFOLIO2'] == 0) {
                            $FOLIOINVENTARIO = $ARRAYVERFOLIO[0]['NUMERO_FOLIO'];
                        } else {
                            $FOLIOINVENTARIO =   $ARRAYULTIMOFOLIO[0]['ULTIMOFOLIO2'];
                        }
                    } else {
                        $FOLIOINVENTARIO = $ARRAYVERFOLIO[0]['NUMERO_FOLIO'];
                    }
                    $NUMEROFOLIO = $FOLIOINVENTARIO + 1;


                    $ALIASDINAMICO =  $ARRAYVERFOLIO[0]['ALIAS_DINAMICO_FOLIO'] . $NUMEROFOLIO;
                    $ALIASESTACTICO = $NUMEROFOLIO;

                    $VALORTOTAL = $_REQUEST['CANTIDAD'] *  $_REQUEST['VALORUNITARIO'];

                    $TARJAM->__SET('FOLIO_TARJA', $NUMEROFOLIO);
                    $TARJAM->__SET('ALIAS_DINAMICO_TARJA', $ALIASDINAMICO);
                    $TARJAM->__SET('ALIAS_ESTATICO_TARJA', $ALIASESTACTICO);
                    $TARJAM->__SET('CANITDAD_CONTENEDOR', $_REQUEST['CANTIDADC']);
                    $TARJAM->__SET('VALOR_UNITARIO', $_REQUEST['VALORUNITARIO']);
                    $TARJAM->__SET('CANTIDAD_TARJA', $_REQUEST['CANTIDAD']);
                    $TARJAM->__SET('ID_PRODUCTO', $_REQUEST['PRODUCTO']);
                    $TARJAM->__SET('ID_TCONTENEDOR', $_REQUEST['TCONTENEDOR']);
                    $TARJAM->__SET('ID_TUMEDIDA', $_REQUEST['TUMEDIDA']);
                    $TARJAM->__SET('ID_FOLIO', $FOLIO);
                    $TARJAM->__SET('ID_RECEPCION', $_REQUEST['IDP']);
                    $TARJAM->__SET('ID_DRECEPCION', $_REQUEST['IDD']);
                    $TARJAM->__SET('FOLIOANTERIOR', $_REQUEST['FOLIOANTERIOR']);
                    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                    $TARJAM_ADO->agregarTarjaDrecepcion($TARJAM);


                    $AUSUARIO_ADO->agregarAusuario2("NULL",2,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de tarja del detalle de Recepción Materiales.","material_tarjam", "NULL" ,$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

                    $ARRAYRECEPCION = $RECEPCIONM_ADO->verRecepcion($_REQUEST['IDP']);
                    $ARRAYDRECEPCION = $DRECEPCIONM_ADO->verDrecepcion($_REQUEST['IDD']);
                    $ARRAYVERFOLIOVALIDAR = $INVENTARIOM_ADO->buscarPorRecepcionFolio($_REQUEST['IDP'],  $NUMEROFOLIO);


                    if (empty($ARRAYVERFOLIOVALIDAR)) {
                        $INVENTARIOM->__SET('FOLIO_INVENTARIO', $NUMEROFOLIO);
                        $INVENTARIOM->__SET('FOLIO_AUXILIAR_INVENTARIO', $NUMEROFOLIO);
                        $INVENTARIOM->__SET('ALIAS_DINAMICO_FOLIO', $ALIASDINAMICO);
                        $INVENTARIOM->__SET('ALIAS_ESTATICO_FOLIO', $ALIASESTACTICO);
                        $INVENTARIOM->__SET('TRECEPCION', $ARRAYRECEPCION[0]['TRECEPCION']);
                        $INVENTARIOM->__SET('CANTIDAD_INVENTARIO', $_REQUEST['CANTIDAD']);
                        $INVENTARIOM->__SET('VALOR_UNITARIO', $_REQUEST['VALORUNITARIO']);
                        $INVENTARIOM->__SET('VALOR_TOTAL', $VALORTOTAL);
                        $INVENTARIOM->__SET('ID_BODEGA', $ARRAYRECEPCION[0]['ID_BODEGA']);
                        $INVENTARIOM->__SET('ID_FOLIO', $FOLIO);
                        $INVENTARIOM->__SET('ID_PRODUCTO', $_REQUEST['PRODUCTO']);
                        $INVENTARIOM->__SET('ID_TCONTENEDOR', $_REQUEST['TCONTENEDOR']);
                        $INVENTARIOM->__SET('ID_TUMEDIDA', $_REQUEST['TUMEDIDA']);
                        $INVENTARIOM->__SET('ID_RECEPCION', $_REQUEST['IDP']);
                        $INVENTARIOM->__SET('ID_PLANTA2', $ARRAYRECEPCION[0]['ID_PLANTA2']);
                        $INVENTARIOM->__SET('ID_PROVEEDOR', $ARRAYRECEPCION[0]['ID_PROVEEDOR']);
                        $INVENTARIOM->__SET('ID_PRODUCTOR', $ARRAYRECEPCION[0]['ID_PRODUCTOR']);
                        $INVENTARIOM->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                        $INVENTARIOM->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
                        $INVENTARIOM->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
                        $INVENTARIOM_ADO->agregarInventarioRecepcion($INVENTARIOM);

                        $AUSUARIO_ADO->agregarAusuario2("NULL",2,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Inventario Materiales.","material_inventariom", "NULL" ,$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

                    } else {
                        $INVENTARIOM->__SET('TRECEPCION', $ARRAYRECEPCION[0]['TRECEPCION']);
                        $INVENTARIOM->__SET('CANTIDAD_INVENTARIO', $_REQUEST['CANTIDAD']);
                        $INVENTARIOM->__SET('VALOR_UNITARIO', $_REQUEST['VALORUNITARIO']);
                        $INVENTARIOM->__SET('VALOR_TOTAL', $VALORTOTAL);
                        $INVENTARIOM->__SET('ID_BODEGA', $ARRAYRECEPCION[0]['ID_BODEGA']);
                        $INVENTARIOM->__SET('ID_FOLIO', $FOLIO);
                        $INVENTARIOM->__SET('ID_PRODUCTO', $_REQUEST['PRODUCTO']);
                        $INVENTARIOM->__SET('ID_TCONTENEDOR', $_REQUEST['TCONTENEDOR']);
                        $INVENTARIOM->__SET('ID_TUMEDIDA', $_REQUEST['TUMEDIDA']);
                        $INVENTARIOM->__SET('ID_RECEPCION', $_REQUEST['IDP']);
                        $INVENTARIOM->__SET('ID_PLANTA2', $ARRAYRECEPCION[0]['ID_PLANTA2']);
                        $INVENTARIOM->__SET('ID_PROVEEDOR', $ARRAYRECEPCION[0]['ID_PROVEEDOR']);
                        $INVENTARIOM->__SET('ID_PRODUCTOR', $ARRAYRECEPCION[0]['ID_PRODUCTOR']);
                        $INVENTARIOM->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                        $INVENTARIOM->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
                        $INVENTARIOM->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
                        $INVENTARIOM->__SET('ID_INVENTARIO', $ARRAYVERFOLIOVALIDAR[0]['ID_INVENTARIO']);
                        $INVENTARIOM_ADO->actualizarInventarioRecepcion($INVENTARIOM);

                        $AUSUARIO_ADO->agregarAusuario2("NULL",2,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de Inventario Materiales.","material_inventariom", "NULL" ,$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

                    }
                }

                //REDIRECCIONAR A PAGINA registroRecepcion.php 
                $idd_dato =  $_REQUEST['IDD'];
                $acciond_dato =  $_REQUEST['OPD'];                
                echo '<script>
                        Swal.fire({
                            icon:"success",
                            title:"Registro creado",
                            text:"El registro de la tarja se ha creado correctamente",
                            showConfirmButton:true,
                            confirmButtonText:"Volver al Detalle"
                        }).then((result)=>{
                            location.href ="'. $_REQUEST['URLD'] .'.php?op&id='.$id_dato.'&a='.$accion_dato.'&idd='.$idd_dato.'&ad='.$acciond_dato.'&urlo='.$urlo_dato.'&iddt='.$iddt_dato.'&adt='.$acciondt_dato.'&urlod='.$urlod_dato.'";                            
                        })
                    </script>';
                //echo "<script type='text/javascript'> location.href ='" ".php?op';</script>";
            }
            if (isset($_REQUEST['EDITAR'])) {


                $ARRAYVERFOLIO = $FOLIO_ADO->verFolioPorEmpresaPlantaTemporadaTMateriales($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
                $FOLIO = $ARRAYVERFOLIO[0]['ID_FOLIO'];

                $NUMEROFOLIO = $_REQUEST['NUMEROFOLIO'];
                $ALIASDINAMICO =  $ARRAYVERFOLIO[0]['ALIAS_DINAMICO_FOLIO'] . $NUMEROFOLIO;
                $ALIASESTACTICO = $NUMEROFOLIO;

                $VALORTOTAL = $_REQUEST['CANTIDAD'] *  $_REQUEST['VALORUNITARIO'];


                $TARJAM->__SET('CANITDAD_CONTENEDOR', $_REQUEST['CANTIDADC']);
                $TARJAM->__SET('VALOR_UNITARIO', $_REQUEST['VALORUNITARIO']);
                $TARJAM->__SET('CANTIDAD_TARJA', $_REQUEST['CANTIDAD']);
                $TARJAM->__SET('VALOR_TOTAL', $VALORTOTAL);
                $TARJAM->__SET('ID_PRODUCTO', $_REQUEST['PRODUCTO']);
                $TARJAM->__SET('ID_TCONTENEDOR', $_REQUEST['TCONTENEDORE']);
                $TARJAM->__SET('ID_TUMEDIDA', $_REQUEST['TUMEDIDA']);
                $TARJAM->__SET('ID_FOLIO', $FOLIO);
                $TARJAM->__SET('ID_RECEPCION', $_REQUEST['IDP']);
                $TARJAM->__SET('ID_DRECEPCION', $_REQUEST['IDD']);
                $TARJAM->__SET('ID_TARJA', $_REQUEST['IDT']);
                $TARJAM->__SET('FOLIOANTERIOR', $_REQUEST['FOLIOANTERIOR']);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $TARJAM_ADO->actualizarTarjaDrecepcion($TARJAM);

                $AUSUARIO_ADO->agregarAusuario2("NULL",2,1,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de tarja del detalle de Recepción Materiales.","material_tarjam", "NULL" ,$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

                $ARRAYRECEPCION = $RECEPCIONM_ADO->verRecepcion($_REQUEST['IDP']);
                $ARRAYDRECEPCION = $DRECEPCIONM_ADO->verDrecepcion($_REQUEST['IDD']);
                $ARRAYVERFOLIOVALIDAR = $INVENTARIOM_ADO->buscarPorRecepcionFolio($_REQUEST['IDP'],  $NUMEROFOLIO);

                if (empty($ARRAYVERFOLIOVALIDAR)) {
                    $INVENTARIOM->__SET('FOLIO_INVENTARIO', $NUMEROFOLIO);
                    $INVENTARIOM->__SET('FOLIO_AUXILIAR_INVENTARIO', $NUMEROFOLIO);
                    $INVENTARIOM->__SET('ALIAS_DINAMICO_FOLIO', $ALIASDINAMICO);
                    $INVENTARIOM->__SET('ALIAS_ESTATICO_FOLIO', $ALIASESTACTICO);
                    $INVENTARIOM->__SET('TRECEPCION', $ARRAYRECEPCION[0]['TRECEPCION']);
                    $INVENTARIOM->__SET('CANTIDAD_INVENTARIO', $_REQUEST['CANTIDAD']);
                    $INVENTARIOM->__SET('VALOR_UNITARIO', $_REQUEST['VALORUNITARIO']);
                    $INVENTARIOM->__SET('VALOR_TOTAL', $VALORTOTAL);
                    $INVENTARIOM->__SET('ID_BODEGA', $ARRAYRECEPCION[0]['ID_BODEGA']);
                    $INVENTARIOM->__SET('ID_FOLIO', $FOLIO);
                    $INVENTARIOM->__SET('ID_PRODUCTO', $_REQUEST['PRODUCTO']);
                    $INVENTARIOM->__SET('ID_TCONTENEDOR', $_REQUEST['TCONTENEDORE']);
                    $INVENTARIOM->__SET('ID_TUMEDIDA', $_REQUEST['TUMEDIDA']);
                    $INVENTARIOM->__SET('ID_RECEPCION', $_REQUEST['IDP']);
                    $INVENTARIOM->__SET('ID_PLANTA2', $ARRAYRECEPCION[0]['ID_PLANTA2']);
                    $INVENTARIOM->__SET('ID_PROVEEDOR', $ARRAYRECEPCION[0]['ID_PROVEEDOR']);
                    $INVENTARIOM->__SET('ID_PRODUCTOR', $ARRAYRECEPCION[0]['ID_PRODUCTOR']);
                    $INVENTARIOM->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                    $INVENTARIOM->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
                    $INVENTARIOM->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
                    $INVENTARIOM_ADO->agregarInventarioRecepcion($INVENTARIOM);

                    $AUSUARIO_ADO->agregarAusuario2("NULL",2,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Inventario Materiales.","material_inventariom", "NULL" ,$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

                } else {
                    $INVENTARIOM->__SET('TRECEPCION', $ARRAYRECEPCION[0]['TRECEPCION']);
                    $INVENTARIOM->__SET('CANTIDAD_INVENTARIO', $_REQUEST['CANTIDAD']);
                    $INVENTARIOM->__SET('VALOR_UNITARIO', $_REQUEST['VALORUNITARIO']);
                    $INVENTARIOM->__SET('VALOR_TOTAL', $VALORTOTAL);
                    $INVENTARIOM->__SET('ID_BODEGA', $ARRAYRECEPCION[0]['ID_BODEGA']);
                    $INVENTARIOM->__SET('ID_FOLIO', $FOLIO);
                    $INVENTARIOM->__SET('ID_PRODUCTO', $_REQUEST['PRODUCTO']);
                    $INVENTARIOM->__SET('ID_TCONTENEDOR', $_REQUEST['TCONTENEDORE']);
                    $INVENTARIOM->__SET('ID_TUMEDIDA', $_REQUEST['TUMEDIDA']);
                    $INVENTARIOM->__SET('ID_RECEPCION', $_REQUEST['IDP']);
                    $INVENTARIOM->__SET('ID_PLANTA2', $ARRAYRECEPCION[0]['ID_PLANTA2']);
                    $INVENTARIOM->__SET('ID_PROVEEDOR', $ARRAYRECEPCION[0]['ID_PROVEEDOR']);
                    $INVENTARIOM->__SET('ID_PRODUCTOR', $ARRAYRECEPCION[0]['ID_PRODUCTOR']);
                    $INVENTARIOM->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                    $INVENTARIOM->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
                    $INVENTARIOM->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
                    $INVENTARIOM->__SET('ID_INVENTARIO', $ARRAYVERFOLIOVALIDAR[0]['ID_INVENTARIO']);
                    $INVENTARIOM_ADO->actualizarInventarioRecepcion($INVENTARIOM);

                    $AUSUARIO_ADO->agregarAusuario2("NULL",2,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de Inventario Materiales.","material_inventariom", "NULL" ,$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  
                }
                //REDIRECCIONAR A PAGINA registroRecepcion.php 
                $idd_dato =  $_REQUEST['IDD'];
                $acciond_dato =  $_REQUEST['OPD'];
                echo '<script>
                    Swal.fire({
                        icon:"info",
                        title:"Registro Modificado",
                        text:"El registro de la tarja se ha modificada correctamente",
                        showConfirmButton:true,
                        confirmButtonText:"Volver al Detalle"
                    }).then((result)=>{
                        location.href ="'. $_REQUEST['URLD'] .'.php?op&id='.$id_dato.'&a='.$accion_dato.'&idd='.$idd_dato.'&ad='.$acciond_dato.'&urlo='.$urlo_dato.'&iddt='.$iddt_dato.'&adt='.$acciondt_dato.'&urlod='.$urlod_dato.'";                        
                    })
                </script>';
            }
            if (isset($_REQUEST['ELIMINAR'])) {

                $TARJAM->__SET('ID_TARJA', $_REQUEST['IDT']);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $TARJAM_ADO->deshabilitar($TARJAM);

                $AUSUARIO_ADO->agregarAusuario2("NULL",2,4,"".$_SESSION["NOMBRE_USUARIO"].", Deshabilitar tarja del detalle de Recepción Materiales.","material_tarjam", "NULL" ,$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

                $INVENTARIOM->__SET('FOLIO_INVENTARIO', $_REQUEST['NUMEROFOLIO']);
                $INVENTARIOM_ADO->eliminado2($INVENTARIOM);
                
                $INVENTARIOM->__SET('FOLIO_INVENTARIO', $_REQUEST['NUMEROFOLIO']);
                $INVENTARIOM_ADO->deshabilitar2($INVENTARIOM);

                $AUSUARIO_ADO->agregarAusuario2("NULL",2,4,"".$_SESSION["NOMBRE_USUARIO"].", Deshabilitar Inventario  Materiales.","material_inventariom", "NULL" ,$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  


                //REDIRECCIONAR A PAGINA registroRecepcion.php 
                $idd_dato =  $_REQUEST['IDD'];
                $acciond_dato =  $_REQUEST['OPD'];
                echo '<script>
                    Swal.fire({
                        icon:"error",
                        title:"Registro Eliminado",
                        text:"El registro de la tarja se ha eliminado correctamente",
                        showConfirmButton:true,
                        confirmButtonText:"Volver al Detalle"
                    }).then((result)=>{
                        location.href ="'. $_REQUEST['URLD'] .'.php?op&id='.$id_dato.'&a='.$accion_dato.'&idd='.$idd_dato.'&ad='.$acciond_dato.'&urlo='.$urlo_dato.'&iddt='.$iddt_dato.'&adt='.$acciondt_dato.'&urlod='.$urlod_dato.'";                             
                    })
                </script>';

            }

        ?>
</body>

</html>