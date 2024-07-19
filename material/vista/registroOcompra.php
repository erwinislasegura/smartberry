<?php

include_once "../../assest/config/validarUsuarioMaterial.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../../assest/controlador/RESPONSABLE_ADO.php';
include_once '../../assest/controlador/PROVEEDOR_ADO.php';
include_once '../../assest/controlador/FPAGOM_ADO.php';
include_once '../../assest/controlador/TMONEDAM_ADO.php';

include_once '../../assest/controlador/PRODUCTO_ADO.php';
include_once '../../assest/controlador/TUMEDIDA_ADO.php';

include_once '../../assest/controlador/OCOMPRA_ADO.php';
include_once '../../assest/controlador/DOCOMPRA_ADO.php';

include_once '../../assest/modelo/OCOMPRA.php';
include_once '../../assest/modelo/DOCOMPRA.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$RESPONSABLE_ADO =  new RESPONSABLE_ADO();
$PROVEEDOR_ADO =  new PROVEEDOR_ADO();
$FPAGO_ADO =  new FPAGOM_ADO();
$TMONEDA_ADO =  new TMONEDAM_ADO();

$PRODUCTO_ADO =  new PRODUCTO_ADO();
$TUMEDIDA_ADO =  new TUMEDIDA_ADO();

$OCOMPRA_ADO =  new OCOMPRA_ADO();
$DOCOMPRA_ADO =  new DOCOMPRA_ADO();


//INIICIALIZAR MODELO
$OCOMPRA =  new OCOMPRA();
$DOCOMPRA =  new DOCOMPRA();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$IDOCOMPRA = "";
$FECHAINGRESO = "";
$FECHAMODIFCIACION = "";
$FECHAOCOMPRA = "";
$NUMEROIOCOMPRA = "";
$TCAMBIO = "";
$OBSERVACION = "";

$ESTADO = "";

$RESPONSABLE = "";
$FPAGO = "";
$PROVEEDOR = "";
$TMONEDA = "";
$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";

$TOTALCANTIDAD = "";
$TOTALCANTIDADV = "";
$TOTALVALOR  = "";
$TOTALVALORV = "";

$NUMERO = "";
$NUMEROVER = "";
$FOLIONUMERO = "";

$SINO = "";
$IDOP = "";
$OP = "";
$URL = "";
$URLO = "";
$DISABLED0 = "";
$DISABLED = "";
$DISABLED2 = "";
$DISABLED3 = "";
$DISABLEDSTYLE = "";


$DISABLEDFOLIO = "";
$MENSAJEFOLIO = "";

$MENSAJE = "";
$MENSAJE2 = "";
$MENSAJE3 = "";
$MENSAJEVALIDATO = "";


//INICIALIZAR ARREGLOS
$ARRAYDOCOMPRA = "";
$ARRAYDOCOMPRA2 = "";
$ARRAYDOCOMPRATOTALES = "";
$ARRAYDOCOMPRATOTALES2 = "";

$ARRAYFPAGO = "";
$ARRAYRESPONSABLE = "";
$ARRAYRESPONSABLEUSUARIO = "";
$ARRAYTMONEDA = "";
$ARRAYPROVEEDOR = "";
$ARRAYORDENCOMPRA = "";
$ARRAYPRODUCTO = "";
$ARRAYTUMEDIDA = "";


$ARRAYFECHAACTUAL = "";
$ARRYAOBTENERID = "";
$ARRAYNUMERO = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYEMPRESA = $EMPRESA_ADO->listarEmpresaCBX();
$ARRAYPLANTA = $PLANTA_ADO->listarPlantaCBX();
$ARRAYTEMPORADA = $TEMPORADA_ADO->listarTemporadaCBX();

$ARRAYRESPONSABLE = $RESPONSABLE_ADO->listarResponsablePorEmpresaCBX($EMPRESAS);
$ARRAYPROVEEDOR = $PROVEEDOR_ADO->listarProveedorPorEmpresaCBX($EMPRESAS);
$ARRAYTMONEDA = $TMONEDA_ADO->listarTmonedaPorEmpresaCBX($EMPRESAS);
$ARRAYFPAGO = $FPAGO_ADO->listarFpagoPorEmpresaCBX($EMPRESAS);
$ARRAYFECHAACTUAL = $OCOMPRA_ADO->obtenerFecha();
$FECHAOCOMPRA = $ARRAYFECHAACTUAL[0]['FECHA'];
$FECHAGUIA = $ARRAYFECHAACTUAL[0]['FECHA'];
$HORAOCOMPRA = $ARRAYFECHAACTUAL[0]['HORA'];
include_once "../../assest/config/validarDatosUrl.php";
include_once "../../assest/config/datosUrlD.php";


$ARRAYRESPONSABLEUSUARIO = $RESPONSABLE_ADO->listarResponsablePorEmpresaUsuarioCBX($EMPRESAS, $IDUSUARIOS);
if ($ARRAYRESPONSABLEUSUARIO) {
    $RESPONSABLE = $ARRAYRESPONSABLEUSUARIO[0]["ID_RESPONSABLE"];
}

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

    //FUNCION PARA LA OBTENCION DE LOS TOTALES DEL DETALLE ASOCIADO A OCOMPRA

    $ARRAYDOCOMPRA = $DOCOMPRA_ADO->listarDocompraPorOcompra2CBX($IDOP);  
    $ARRAYDOCOMPRATOTALES = $DOCOMPRA_ADO->obtenerTotalesDocompraPorOcompraCBX($IDOP);
    $ARRAYDOCOMPRATOTALES2 = $DOCOMPRA_ADO->obtenerTotalesDocompraPorOcompra2CBX($IDOP);


    $TOTALCANTIDAD = $ARRAYDOCOMPRATOTALES[0]['CANTIDAD'];
    $TOTALCANTIDADV = $ARRAYDOCOMPRATOTALES2[0]['CANTIDAD'];

    $TOTALVALOR = $ARRAYDOCOMPRATOTALES[0]['VALOR_TOTAL'];
    $TOTALVALORV = $ARRAYDOCOMPRATOTALES2[0]['VALOR_TOTAL'];



    //IDENTIFICACIONES DE OPERACIONES
    //crear =  OBTENCION DE DATOS INICIALES PARA PODER CREAR LA OCOMPRA
    if ($OP == "crear") {

        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $DISABLED = "disabled";
        $DISABLED2 = "";
        $DISABLED0 = "";
        $DISABLED3 = "disabled";
        $DISABLEDMENU = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        $ARRAYOCOMPRA = $OCOMPRA_ADO->verOcompra2($IDOP);
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYOCOMPRA as $r) :
            $IDOCOMPRA = $IDOP;
            $NUMEROVER =  "" . $r['NUMERO_OCOMPRA'];
            $NUMEROIOCOMPRA =  "" . $r['NUMEROI_OCOMPRA'];
            $FECHAOCOMPRA = "" . $r['FECHA_OCOMPRA'];
            $NUMEROIOCOMPRA = "" . $r['NUMEROI_OCOMPRA'];
            $TCAMBIO = "" . $r['TCAMBIO_OCOMPRA'];
            $OBSERVACION = "" . $r['OBSERVACIONES_OCOMPRA'];
            $RESPONSABLE = "" . $r['ID_RESPONSABLE'];
            $PROVEEDOR = "" . $r['ID_PROVEEDOR'];
            $FPAGO = "" . $r['ID_FPAGO'];
            $TMONEDA = "" . $r['ID_TMONEDA'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $FECHAINGRESO = "" . $r['INGRESO'];
            $FECHAMODIFCIACION = "" . $r['MODIFICACION'];
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }

    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {

        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $DISABLED = "disabled";
        $DISABLED2 = "";
        $DISABLED0 = "";
        $DISABLEDMENU = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $ARRAYOCOMPRA = $OCOMPRA_ADO->verOcompra2($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYOCOMPRA as $r) :
            $IDOCOMPRA = $IDOP;
            $NUMEROVER =  "" . $r['NUMERO_OCOMPRA'];
            $NUMEROIOCOMPRA =  "" . $r['NUMEROI_OCOMPRA'];
            $FECHAOCOMPRA = "" . $r['FECHA_OCOMPRA'];
            $NUMEROIOCOMPRA = "" . $r['NUMEROI_OCOMPRA'];
            $TCAMBIO = "" . $r['TCAMBIO_OCOMPRA'];
            $OBSERVACION = "" . $r['OBSERVACIONES_OCOMPRA'];
            $RESPONSABLE = "" . $r['ID_RESPONSABLE'];
            $PROVEEDOR = "" . $r['ID_PROVEEDOR'];
            $FPAGO = "" . $r['ID_FPAGO'];
            $TMONEDA = "" . $r['ID_TMONEDA'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $FECHAINGRESO = "" . $r['INGRESO'];
            $FECHAMODIFCIACION = "" . $r['MODIFICACION'];
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }

    //ver =  OBTENCION DE DATOS PARA LA VISUALIZACION DEL REGISTRO
    if ($OP == "ver") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        $DISABLED0 = "disabled";
        $DISABLEDMENU = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYOCOMPRA = $OCOMPRA_ADO->verOcompra2($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYOCOMPRA as $r) :
            $IDOCOMPRA = $IDOP;
            $NUMEROVER =  "" . $r['NUMERO_OCOMPRA'];
            $NUMEROIOCOMPRA =  "" . $r['NUMEROI_OCOMPRA'];
            $FECHAOCOMPRA = "" . $r['FECHA_OCOMPRA'];
            $NUMEROIOCOMPRA = "" . $r['NUMEROI_OCOMPRA'];
            $TCAMBIO = "" . $r['TCAMBIO_OCOMPRA'];
            $OBSERVACION = "" . $r['OBSERVACIONES_OCOMPRA'];
            $RESPONSABLE = "" . $r['ID_RESPONSABLE'];
            $PROVEEDOR = "" . $r['ID_PROVEEDOR'];
            $FPAGO = "" . $r['ID_FPAGO'];
            $TMONEDA = "" . $r['ID_TMONEDA'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $FECHAINGRESO = "" . $r['INGRESO'];
            $FECHAMODIFCIACION = "" . $r['MODIFICACION'];
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }
}
//PROCESO PARA OBTENER LOS DATOS DEL FORMULARIO  Y MANTENERLO AL ACTUALIZACION QUE REALIZA EL SELECT DE CONDUCTOR
if (isset($_POST)) {
    if (isset($_REQUEST['FECHAOCOMPRA'])) {
        $FECHAOCOMPRA = "" . $_REQUEST['FECHAOCOMPRA'];
    }
    if (isset($_REQUEST['NUMEROIOCOMPRA'])) {
        $NUMEROIOCOMPRA = "" . $_REQUEST['NUMEROIOCOMPRA'];
    }
    if (isset($_REQUEST['RESPONSABLE'])) {
        $RESPONSABLE = "" . $_REQUEST['RESPONSABLE'];
    }
    if (isset($_REQUEST['PROVEEDOR'])) {
        $PROVEEDOR = "" . $_REQUEST['PROVEEDOR'];
    }
    if (isset($_REQUEST['FPAGO'])) {
        $FPAGO = "" . $_REQUEST['FPAGO'];
    }
    if (isset($_REQUEST['TMONEDA'])) {
        $TMONEDA = "" . $_REQUEST['TMONEDA'];
    }
    if (isset($_REQUEST['TCAMBIO'])) {
        $TCAMBIO = "" . $_REQUEST['TCAMBIO'];
    }
    if (isset($_REQUEST['OBSERVACION'])) {
        $OBSERVACION = "" . $_REQUEST['OBSERVACION'];
    }
    if (isset($_REQUEST['FECHAINGRESO'])) {
        $FECHAINGRESO = "" . $_REQUEST['FECHAINGRESO'];
    }
    if (isset($_REQUEST['FECHAMODIFCIACION'])) {
        $FECHAMODIFCIACION = "" . $_REQUEST['FECHAMODIFCIACION'];
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
    <title>Registro Orden </title>
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

                    NUMEROIOCOMPRA = document.getElementById("NUMEROIOCOMPRA").value;
                    FECHAOCOMPRA = document.getElementById("FECHAOCOMPRA").value;
                    RESPONSABLE = document.getElementById("RESPONSABLE").selectedIndex;
                    PROVEEDOR = document.getElementById("PROVEEDOR").selectedIndex;
                    FPAGO = document.getElementById("FPAGO").selectedIndex;
                    TMONEDA = document.getElementById("TMONEDA").selectedIndex;
                    TCAMBIO = document.getElementById("TCAMBIO").value;
                    //OBSERVACION = document.getElementById("OBSERVACION").value;

                    document.getElementById('val_numeroi').innerHTML = "";
                    document.getElementById('val_fecha').innerHTML = "";
                    document.getElementById('val_resposable').innerHTML = "";
                    document.getElementById('val_proveedor').innerHTML = "";
                    document.getElementById('val_fpago').innerHTML = "";
                    document.getElementById('val_tmoneda').innerHTML = "";
                    document.getElementById('val_tcambio').innerHTML = "";
                    //  document.getElementById('val_observacion').innerHTML = "";

                    if (NUMEROIOCOMPRA == null || NUMEROIOCOMPRA.length == 0 || /^\s+$/.test(NUMEROIOCOMPRA)) {
                        document.form_reg_dato.NUMEROIOCOMPRA.focus();
                        document.form_reg_dato.NUMEROIOCOMPRA.style.borderColor = "#FF0000";
                        document.getElementById('val_numeroi').innerHTML = "NO A INGRESADO DATO";
                        return false
                    }
                    document.form_reg_dato.NUMEROIOCOMPRA.style.borderColor = "#4AF575";

                    if (FECHAOCOMPRA == null || FECHAOCOMPRA.length == 0 || /^\s+$/.test(FECHAOCOMPRA)) {
                        document.form_reg_dato.FECHAOCOMPRA.focus();
                        document.form_reg_dato.FECHAOCOMPRA.style.borderColor = "#FF0000";
                        document.getElementById('val_fecha').innerHTML = "NO A INGRESADO DATO";
                        return false
                    }
                    document.form_reg_dato.FECHAOCOMPRA.style.borderColor = "#4AF575";

                    if (RESPONSABLE == null || RESPONSABLE == 0) {
                        document.form_reg_dato.RESPONSABLE.focus();
                        document.form_reg_dato.RESPONSABLE.style.borderColor = "#FF0000";
                        document.getElementById('val_resposable').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false
                    }
                    document.form_reg_dato.RESPONSABLE.style.borderColor = "#4AF575";

                    if (PROVEEDOR == null || PROVEEDOR == 0) {
                        document.form_reg_dato.PROVEEDOR.focus();
                        document.form_reg_dato.PROVEEDOR.style.borderColor = "#FF0000";
                        document.getElementById('val_proveedor').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false
                    }
                    document.form_reg_dato.PROVEEDOR.style.borderColor = "#4AF575";

                    if (FPAGO == null || FPAGO == 0) {
                        document.form_reg_dato.FPAGO.focus();
                        document.form_reg_dato.FPAGO.style.borderColor = "#FF0000";
                        document.getElementById('val_fpago').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false
                    }
                    document.form_reg_dato.FPAGO.style.borderColor = "#4AF575";

                    if (TMONEDA == null || TMONEDA == 0) {
                        document.form_reg_dato.TMONEDA.focus();
                        document.form_reg_dato.TMONEDA.style.borderColor = "#FF0000";
                        document.getElementById('val_tmoneda').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false
                    }
                    document.form_reg_dato.TMONEDA.style.borderColor = "#4AF575";

                    if (TCAMBIO == null || TCAMBIO.length == 0 || /^\s+$/.test(TCAMBIO)) {
                        document.form_reg_dato.TCAMBIO.focus();
                        document.form_reg_dato.TCAMBIO.style.borderColor = "#FF0000";
                        document.getElementById('val_tcambio').innerHTML = "NO A INGRESADO DATO";
                        return false
                    }
                    document.form_reg_dato.TCAMBIO.style.borderColor = "#4AF575";


                    if (TCAMBIO == 0) {
                        document.form_reg_dato.TCAMBIO.focus();
                        document.form_reg_dato.TCAMBIO.style.borderColor = "#FF0000";
                        document.getElementById('val_tcambio').innerHTML = "EL VALOR TIENE QUE SER DISTINTO DE CERO";
                        return false
                    }
                    document.form_reg_dato.TCAMBIO.style.borderColor = "#4AF575";


                    /*
                    if (OBSERVACION == null || OBSERVACION.length == 0 || /^\s+$/.test(OBSERVACION)) {
                        document.form_reg_dato.OBSERVACION.focus();
                        document.form_reg_dato.OBSERVACION.style.borderColor = "#FF0000";
                        document.getElementById('val_observacion').innerHTML = "NO A INGRESADO DATO";
                        return false
                    }
                    document.form_reg_dato.OBSERVACION.style.borderColor = "#4AF575"; 
                     */
                }

                //FUNCION PARA REALIZAR UNA ACTUALIZACION DEL FORMULARIO DE REGISTRO DE OCOMPRA
                function refrescar() {
                    document.getElementById("form_reg_dato").submit();
                }

                //FUNCION PARA ABRIR VENTANA QUE SE ENCUENTRA LA OPERACIONES DE DETALLE DE OCOMPRA
                function abrirVentana(url) {
                    var opciones =
                        "'directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=1600, height=1000'";
                    window.open(url, 'window', opciones);
                }
                //FUNCION PARA ABRIR UNA NUEVA PESTAÑA 
                function abrirPestana(url) {
                    var win = window.open(url, '_blank');
                    win.focus();
                }

                
                //REDIRECCIONAR A LA PAGINA SELECIONADA
                function irPagina(url) {
                    location.href = "" + url;
                }

               
            </script>


</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary" >
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <?php include_once "../../assest/config/menuMaterial.php"; ?>
            <div class="content-wrapper">
                <div class="container-full">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Administración</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Administración</li>
                                            <li class="breadcrumb-item" aria-current="page">Orden Compra</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Registro Orden </a> </li>
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
                                    <h4 class="box-title">Registro de Orden Compra</h4>                                        
                                </div>
                                <div class="box-body ">
                                    <div class="row">
                                        <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Número OC</label>

                                                <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTA" name="PLANTA" value="<?php echo $PLANTAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADAS; ?>" />

                                                <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESAE" name="EMPRESAE" value="<?php echo $EMPRESA; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTAE" name="PLANTAE" value="<?php echo $PLANTA; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADAE" name="TEMPORADAE" value="<?php echo $TEMPORADA; ?>" />

                                                <input type="hidden" class="form-control" placeholder="Total Cantidad" id="TOTALCANTIDAD" name="TOTALCANTIDAD" value="<?php echo $TOTALCANTIDAD; ?>" />
                                                <input type="hidden" class="form-control" placeholder="Total Valor" id="TOTALVALOR" name="TOTALVALOR" value="<?php echo $TOTALVALOR; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID OCOMPRA" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="OP OCOMPRA" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="URL OCOMPRA" id="URLP" name="URLP" value="registroRecepcione" />
                                                <input type="hidden" class="form-control" placeholder="URL DOCOMPRA" id="URLD" name="URLD" value="registroDocompra" />
                                                <input type="text" class="form-control" style="background-color: #eeeeee;" placeholder="Número OC" id="NUMEROOCOMPRA" name="NUMEROOCOMPRA" value="<?php echo $NUMEROVER; ?>" disabled />
                                                <label id="val_id" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Número OC Interna</label>
                                                <input type="hidden" class="form-control" placeholder="NUMEROIOCOMPRAE" id="NUMEROIOCOMPRAE" name="NUMEROIOCOMPRAE" value="<?php echo $NUMEROIOCOMPRA; ?>" />
                                                <input type="text" class="form-control" placeholder="Número OC Interna " id="NUMEROIOCOMPRA" name="NUMEROIOCOMPRA" value="<?php echo $NUMEROIOCOMPRA; ?>" />
                                                <label id="val_numeroi" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-4 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">

                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha Ingreso</label>
                                                <input type="hidden" class="form-control" placeholder="Fecha Ingreso" id="FECHAINGRESOE" name="FECHAINGRESOE" value="<?php echo $FECHAINGRESO; ?>" />
                                                <input type="date" class="form-control" style="background-color: #eeeeee;" placeholder="Fecha Ingreso" id="FECHAINGRESO" name="FECHAINGRESO" value="<?php echo $FECHAINGRESO; ?>" disabled />
                                                <label id="val_fechai" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha Modificación</label>
                                                <input type="hidden" class="form-control" placeholder="Fecha Modificación" id="FECHAMODIFCIACIONE" name="FECHAMODIFCIACIONE" value="<?php echo $FECHAMODIFCIACION; ?>" />
                                                <input type="date" class="form-control" style="background-color: #eeeeee;" placeholder="Fecha Modificación" id="FECHAMODIFCIACION" name="FECHAMODIFCIACION" value="<?php echo $FECHAMODIFCIACION; ?>" disabled />
                                                <label id="val_fecham" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha Orden</label>
                                                <input type="hidden" class="form-control" placeholder="Fecha Recepción" id="FECHAOCOMPRAE" name="FECHAOCOMPRAE" value="<?php echo $FECHAOCOMPRA; ?>" />
                                                <input type="date" class="form-control" placeholder="Fecha Recepción" id="FECHAOCOMPRA" name="FECHAOCOMPRA" value="<?php echo $FECHAOCOMPRA; ?>"  <?php echo $DISABLED2; ?>  />
                                                <label id="val_fecha" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Responsable</label>
                                                <input type="hidden" class="form-control" placeholder="RESPONSABLEE" id="RESPONSABLEE" name="RESPONSABLEE" value="<?php echo $RESPONSABLE; ?>" />
                                                <select class="form-control select2" id="RESPONSABLE" name="RESPONSABLE" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> >
                                                    <option></option>
                                                    <?php foreach ($ARRAYRESPONSABLE as $r) : ?>
                                                        <?php if ($ARRAYRESPONSABLE) {    ?>
                                                            <option value="<?php echo $r['ID_RESPONSABLE']; ?>" <?php if ($RESPONSABLE == $r['ID_RESPONSABLE']) {
                                                                                                                    echo "selected";
                                                                                                                } ?>> <?php echo $r['NOMBRE_RESPONSABLE'] ?> </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_resposable" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Proveedor</label>
                                                <input type="hidden" class="form-control" placeholder="PROVEEDORE" id="PROVEEDORE" name="PROVEEDORE" value="<?php echo $PROVEEDOR; ?>" />
                                                <select class="form-control select2" id="PROVEEDOR" name="PROVEEDOR" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> >
                                                    <option></option>
                                                    <?php foreach ($ARRAYPROVEEDOR as $r) : ?>
                                                        <?php if ($ARRAYPROVEEDOR) {    ?>
                                                            <option value="<?php echo $r['ID_PROVEEDOR']; ?>" <?php if ($PROVEEDOR == $r['ID_PROVEEDOR']) {
                                                                                                                    echo "selected";
                                                                                                                } ?>> <?php echo $r['NOMBRE_PROVEEDOR'] ?> </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_proveedor" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Formato Pago</label>
                                                <input type="hidden" class="form-control" placeholder="FPAGOE" id="FPAGOE" name="FPAGOE" value="<?php echo $FPAGO; ?>" />
                                                <select class="form-control select2" id="FPAGO" name="FPAGO" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> >
                                                    <option></option>
                                                    <?php foreach ($ARRAYFPAGO as $r) : ?>
                                                        <?php if ($ARRAYFPAGO) {    ?>
                                                            <option value="<?php echo $r['ID_FPAGO']; ?>" <?php if ($FPAGO == $r['ID_FPAGO']) {
                                                                                                                echo "selected";
                                                                                                            } ?>> <?php echo $r['NOMBRE_FPAGO'] ?> </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_fpago" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Tipo Moneda</label>
                                                <input type="hidden" class="form-control" placeholder="TMONEDA" id="TMONEDAE" name="TMONEDAE" value="<?php echo $TMONEDA; ?>" />
                                                <select class="form-control select2" id="TMONEDA" name="TMONEDA" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> >
                                                    <option></option>
                                                    <?php foreach ($ARRAYTMONEDA as $r) : ?>
                                                        <?php if ($ARRAYTMONEDA) {    ?>
                                                            <option value="<?php echo $r['ID_TMONEDA']; ?>" <?php if ($TMONEDA == $r['ID_TMONEDA']) {
                                                                                                                echo "selected";
                                                                                                            } ?>> <?php echo $r['NOMBRE_TMONEDA'] ?> </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_tmoneda" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Tipo Cambio</label>
                                                <input type="hidden" class="form-control" placeholder="TCAMBIOE" id="TCAMBIOE" name="TCAMBIOE" value="<?php echo $TCAMBIO; ?>" />
                                                <input type="number" step="0.01" class="form-control" placeholder="Tipo Cambio Orden" id="TCAMBIO" name="TCAMBIO" value="<?php echo $TCAMBIO; ?>"  <?php echo $DISABLED0; ?> />
                                                <label id="val_tcambio" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Observaciónes </label>
                                                <input type="hidden" class="form-control" placeholder="Observaciónes" id="OBSERVACIONE" name="OBSERVACIONE" value="<?php echo $OBSERVACION; ?>" />
                                                <textarea class="form-control" rows="1" placeholder="Ingrese Nota, Observaciones u Otro" id="OBSERVACION" name="OBSERVACION"  <?php echo $DISABLED2; ?> ><?php echo $OBSERVACION; ?></textarea>
                                                <label id="val_observacion" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <label id="val_drecepcion" class="validacion center"><?php echo $MENSAJE; ?> </label>
                                </div>
                                <!-- /.row -->
                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar">
                                        <div class="btn-group  col-xxl-4 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12" role="group" aria-label="Acciones generales">
                                            <?php if ($OP == "") { ?>
                                                <button type="button" class="btn btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroOcompra.php');">
                                                    <i class="ti-trash"></i> Borrar
                                                </button>
                                                <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Guardar" name="CREAR" value="CREAR"     onclick="return validacion()">
                                                    <i class="ti-save-alt"></i> Guardar
                                                </button>
                                            <?php } ?>
                                            <?php if ($OP != "") { ?>
                                                <button type="button" class="btn btn-success " data-toggle="tooltip" title="Volver" name="VOLVER" value="VOLVER" Onclick="irPagina('listarOcompra.php'); ">
                                                    <i class="ti-back-left "></i> Volver
                                                </button>
                                                <button type="submit" class="btn btn-warning " data-toggle="tooltip" title="Guardar" name="GUARDAR" value="GUARDAR" <?php echo $DISABLED2; ?>   onclick="return validacion()">
                                                    <i class="ti-pencil-alt"></i> Guardar
                                                </button>
                                                <button type="submit" class="btn btn-danger " data-toggle="tooltip" title="Cerrar" name="CERRAR" value="CERRAR" <?php echo $DISABLED2; ?>    onclick="return  validacion()">
                                                    <i class="ti-save-alt"></i> Cerrar
                                                </button>
                                            <?php } ?>
                                        </div>
                                        <div class="btn-group  col-xxl-4 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12  float-right">
                                            <?php if ($OP != "") : ?>
                                                <button type="button" class="btn  btn-primary  " data-toggle="tooltip" title="Informe" id="defecto" name="tarjas"  Onclick="abrirPestana('../../assest/documento/informeOcompra.php?parametro=<?php echo $IDOP; ?>&usuario=<?php echo $IDUSUARIOS; ?>'); ">
                                                    <i class="fa fa-file-pdf-o"></i> Informe
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
                                <div class="card-header bg-success">
                                    <h4 class="card-title">Detalle de Orden Compra</h4>
                                </div>
                                <div class="card-header">
                                        <div class="form-row align-items-center">
                                            <form method="post" id="form2" name="form2">
                                                <input type="hidden" class="form-control" placeholder="ID OCOMPRA" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="OP OCOMPRA" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="URL OCOMPRA" id="URLP" name="URLP" value="registroOcompra" />
                                                <input type="hidden" class="form-control" placeholder="URL DOCOMPRA" id="URLD" name="URLD" value="registroDocompra" />
                                                <div class="col-auto">
                                                    <button type="submit" class="btn btn-success btn-block mb-2" data-toggle="tooltip" title="Agregar Detalle Recepción" id="CREARDURL" name="CREARDURL"
                                                    <?php if ($ESTADO == 0) {  echo "disabled style='background-color: #eeeeee;'";     } ?>>
                                                            Agregar Detalle
                                                    </button>
                                                </div>
                                            </form>
                                            <div class="col-auto">
                                                <label class="sr-only" for="inlineFormInputGroup">Username</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">Total Cantidad </div>
                                                    </div>
                                                    <input type="hidden" name="TOTALCANTIDAD" id="TOTALCANTIDAD" value="<?php echo $TOTALCANTIDAD; ?>" />
                                                    <input type="text" class="form-control" placeholder="Total Cantidad" id="TOTALCANTIDADV" name="TOTALCANTIDADV" value="<?php echo $TOTALCANTIDADV; ?>" disabled />
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <label class="sr-only" for="inlineFormInputGroup">Username</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">Total Valor</div>
                                                    </div>
                                                    <input type="hidden" name="TOTALVALOR" id="TOTALVALOR" value="<?php echo $TOTALVALOR; ?>" />
                                                    <input type="text" class="form-control" placeholder="Total Valor" id="TOTALVALORV" name="TOTALVALORV" value="<?php echo $TOTALVALORV; ?>" disabled />
                                                </div>
                                            </div>
                                        </div>
                                </div>    
                                <div class="card-body">
                                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                        <div class=" table-responsive">
                                            <table id="detalle" class="table-hover " style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">Operaciónes</th>
                                                        <th>Producto </th>
                                                        <th>Unidad Medida</th>
                                                        <th>Cantidad</th>
                                                        <th>Valor Unitario</th>
                                                        <th>Valor Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if ($ARRAYDOCOMPRA) { ?>
                                                        <?php foreach ($ARRAYDOCOMPRA as $s) : ?>

                                                            <?php
                                                            $ARRAYPRODUCTO = $PRODUCTO_ADO->verProducto($s['ID_PRODUCTO']);
                                                            if ($ARRAYPRODUCTO) {
                                                                $NOMBREPRODUCTO = $ARRAYPRODUCTO[0]['NOMBRE_PRODUCTO'];
                                                            } else {
                                                                $NOMBREPRODUCTO = "Sin Dato";
                                                            }
                                                            $ARRAYTUMEDIDA = $TUMEDIDA_ADO->verTumedida($s['ID_TUMEDIDA']);
                                                            if ($ARRAYTUMEDIDA) {
                                                                $NOMBRETUMEDIDA = $ARRAYTUMEDIDA[0]['NOMBRE_TUMEDIDA'];
                                                            } else {
                                                                $NOMBRETUMEDIDA = "Sin Dato";
                                                            }
                                                            ?>
                                                            <tr>
                                                                <td class="text-center">
                                                                    <form method="post" id="form1" name="form1">
                                                                        <input type="hidden" class="form-control" placeholder="ID DOCOMPRA" id="IDD" name="IDD" value="<?php echo $s['ID_DOCOMPRA']; ?>" />
                                                                        <input type="hidden" class="form-control" placeholder="ID OCOMPRA" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                                                        <input type="hidden" class="form-control" placeholder="OP OCOMPRA" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                                                        <input type="hidden" class="form-control" placeholder="URL OCOMPRA" id="URLP" name="URLP" value="registroOcompra" />
                                                                        <input type="hidden" class="form-control" placeholder="URL DOCOMPRA" id="URLD" name="URLD" value="registroDocompra" />
                                                                        <div class="btn-group btn-rounded btn-block" role="group" aria-label="Operaciones Detalle">
                                                                            <?php if ($ESTADO  == "0") { ?>
                                                                                <button type="submit" class="btn btn-info bt-sm" data-toggle="tooltip" id="VERDURL" name="VERDURL" title="Ver">
                                                                                    <i class="ti-eye"></i><br> Ver
                                                                                </button>
                                                                            <?php } ?>
                                                                            <?php if ($ESTADO  == "1") { ?>
                                                                                <button type="submit" class="btn btn-warning bt-sm  " data-toggle="tooltip" id="EDITARDURL" name="EDITARDURL" title="Editar" <?php echo $DISABLED2; ?>>
                                                                                    <i class="ti-pencil-alt"></i><br> Editar
                                                                                </button>
                                                                                <button type="submit" class="btn btn-secondary bt-sm " data-toggle="tooltip" id="DUPLICARDURL" name="DUPLICARDURL" title="Duplicar" <?php echo $DISABLED2; ?>>
                                                                                    <i class="fa fa-fw fa-copy"></i><br> Duplicar
                                                                                </button>
                                                                                <button type="submit" class="btn btn-danger bt-sm " data-toggle="tooltip" id="ELIMINARDURL" name="ELIMINARDURL" title="Eliminar" <?php echo $DISABLED2; ?>>
                                                                                    <i class="ti-close"></i><br> Eliminar
                                                                                </button>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </form>
                                                                </td>
                                                                <td><?php echo $NOMBREPRODUCTO; ?></td>
                                                                <td><?php echo $NOMBRETUMEDIDA; ?></td>
                                                                <td><?php echo $s['CANTIDAD']; ?></td>
                                                                <td><?php echo $s['VALOR']; ?></td>
                                                                <td><?php echo $s['TOTAL'] ?></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
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
                <?php include_once "../../assest/config/menuExtraMaterial.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../../assest/config/urlBase.php"; ?>
        <?php 
            
            //OPERACIONES
            //OPERACION DE REGISTRO DE FILA
            if (isset($_REQUEST['CREAR'])) {
                $ARRAYNUMERO = $OCOMPRA_ADO->obtenerNumero($_REQUEST['EMPRESA'],  $_REQUEST['TEMPORADA']);
                $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;
                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
                $OCOMPRA->__SET('NUMERO_OCOMPRA', $NUMERO);
                $OCOMPRA->__SET('NUMEROI_OCOMPRA', $_REQUEST['NUMEROIOCOMPRA']);
                $OCOMPRA->__SET('FECHA_OCOMPRA', $_REQUEST['FECHAOCOMPRA']);
                $OCOMPRA->__SET('TCAMBIO_OCOMPRA', $_REQUEST['TCAMBIO']);
                $OCOMPRA->__SET('OBSERVACIONES_OCOMPRA', $_REQUEST['OBSERVACION']);
                $OCOMPRA->__SET('ID_RESPONSABLE', $_REQUEST['RESPONSABLE']);
                $OCOMPRA->__SET('ID_PROVEEDOR', $_REQUEST['PROVEEDOR']);
                $OCOMPRA->__SET('ID_FPAGO', $_REQUEST['FPAGO']);
                $OCOMPRA->__SET('ID_TMONEDA', $_REQUEST['TMONEDA']);
                $OCOMPRA->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                $OCOMPRA->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
                $OCOMPRA->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
                $OCOMPRA->__SET('ID_USUARIOI', $IDUSUARIOS);
                $OCOMPRA->__SET('ID_USUARIOM', $IDUSUARIOS);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $OCOMPRA_ADO->agregarOcompra($OCOMPRA);


                //OBTENER EL ID DE LA OCOMPRA CREADA PARA LUEGO ENVIAR EL INGRESO DEL DETALLE
                $ARRYAOBTENERID = $OCOMPRA_ADO->buscarID(
                    $_REQUEST['FECHAOCOMPRA'],
                    $_REQUEST['OBSERVACION'],
                    $_REQUEST['EMPRESA'],
                    $_REQUEST['PLANTA'],
                    $_REQUEST['TEMPORADA'],
                );

                $AUSUARIO_ADO->agregarAusuario2($NUMERO,2,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Orden Compra.","material_ocompra", $ARRYAOBTENERID[0]['ID_OCOMPRA'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

                //REDIRECCIONAR A PAGINA registroRecepcion.php 
                $id_dato = $ARRYAOBTENERID[0]['ID_OCOMPRA'];
                $accion_dato = "crear";                
                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Creado",
                        text:"El registro de OC se ha creado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroOcompra.php?op&id='.$id_dato.'&a='.$accion_dato.'";                            
                    })
                </script>';
            }
            //OPERACION EDICION DE FILA
            if (isset($_REQUEST['GUARDAR'])) {
              
                    $OCOMPRA->__SET('NUMEROI_OCOMPRA', $_REQUEST['NUMEROIOCOMPRAE']);
                    $OCOMPRA->__SET('FECHA_OCOMPRA', $_REQUEST['FECHAOCOMPRA']);
                    $OCOMPRA->__SET('TCAMBIO_OCOMPRA', $_REQUEST['TCAMBIOE']);
                    $OCOMPRA->__SET('TOTAL_CANTIDAD_OCOMPRA', $_REQUEST['TOTALCANTIDAD']);
                    $OCOMPRA->__SET('TOTAL_VALOR_OCOMPRA', $_REQUEST['TOTALVALOR']);
                    $OCOMPRA->__SET('OBSERVACIONES_OCOMPRA', $_REQUEST['OBSERVACION']);
                    $OCOMPRA->__SET('ID_RESPONSABLE', $_REQUEST['RESPONSABLEE']);
                    $OCOMPRA->__SET('ID_PROVEEDOR', $_REQUEST['PROVEEDORE']);
                    $OCOMPRA->__SET('ID_TMONEDA', $_REQUEST['TMONEDAE']);
                    $OCOMPRA->__SET('ID_FPAGO', $_REQUEST['FPAGOE']);
                    $OCOMPRA->__SET('ID_USUARIOM', $IDUSUARIOS);
                    $OCOMPRA->__SET('ID_OCOMPRA', $_REQUEST['IDP']);
                    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                    $OCOMPRA_ADO->actualizarOcompra($OCOMPRA);

                    $AUSUARIO_ADO->agregarAusuario2($NUMEROVER,2,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de Orden Compra.","material_ocompra", $_REQUEST['IDP'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  
                    
                if ($accion_dato == "crear") {
                    $id_dato = $_REQUEST['IDP'];
                    $accion_dato = "crear";
                    echo '<script>
                        Swal.fire({
                            icon:"info",
                            title:"Registro Modificado",
                            text:"El registro de OC se ha modificada correctamente",
                            showConfirmButton: true,
                            confirmButtonText:"Cerrar",
                            closeOnConfirm:false
                        }).then((result)=>{
                            location.href = "registroOcompra.php?op&id='.$id_dato.'&a='.$accion_dato.'";                            
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
                            text:"El registro de OC se ha modificada correctamente",
                            showConfirmButton: true,
                            confirmButtonText:"Cerrar",
                            closeOnConfirm:false
                        }).then((result)=>{
                            location.href = "registroOcompra.php?op&id='.$id_dato.'&a='.$accion_dato.'";                            
                        })
                    </script>';
                }
                
                
            }
            //OPERACION PARA CERRAR LA OCOMPRA
            if (isset($_REQUEST['CERRAR'])) {
                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
                $ARRAYDOCOMPRA2 = $DOCOMPRA_ADO->listarDocompraPorOcompraCBX($_REQUEST['IDP']);
                if (empty($ARRAYDOCOMPRA2)) {
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
                    $SINO = "1";
                } else {
                    $MENSAJE = "";
                    $SINO = "0";
                }
                if ($SINO == "0") {
                    $OCOMPRA->__SET('NUMEROI_OCOMPRA', $_REQUEST['NUMEROIOCOMPRAE']);
                    $OCOMPRA->__SET('FECHA_OCOMPRA', $_REQUEST['FECHAOCOMPRA']);
                    $OCOMPRA->__SET('TCAMBIO_OCOMPRA', $_REQUEST['TCAMBIOE']);
                    $OCOMPRA->__SET('TOTAL_CANTIDAD_OCOMPRA', $_REQUEST['TOTALCANTIDAD']);
                    $OCOMPRA->__SET('TOTAL_VALOR_OCOMPRA', $_REQUEST['TOTALVALOR']);
                    $OCOMPRA->__SET('OBSERVACIONES_OCOMPRA', $_REQUEST['OBSERVACION']);
                    $OCOMPRA->__SET('ID_RESPONSABLE', $_REQUEST['RESPONSABLEE']);
                    $OCOMPRA->__SET('ID_PROVEEDOR', $_REQUEST['PROVEEDORE']);
                    $OCOMPRA->__SET('ID_TMONEDA', $_REQUEST['TMONEDAE']);
                    $OCOMPRA->__SET('ID_FPAGO', $_REQUEST['FPAGOE']);
                    $OCOMPRA->__SET('ID_USUARIOM', $IDUSUARIOS);
                    $OCOMPRA->__SET('ID_OCOMPRA', $_REQUEST['IDP']);
                    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                    $OCOMPRA_ADO->actualizarOcompra($OCOMPRA);


                    $OCOMPRA->__SET('ID_OCOMPRA', $_REQUEST['IDP']);
                    $OCOMPRA_ADO->cerrado($OCOMPRA);


                    $OCOMPRA->__SET('ID_OCOMPRA', $_REQUEST['IDP']);
                    $OCOMPRA->__SET('ID_USUARIOM', $IDUSUARIOS);
                    $OCOMPRA_ADO->confirmado($OCOMPRA);

                    $AUSUARIO_ADO->agregarAusuario2($NUMEROVER,2,3,"".$_SESSION["NOMBRE_USUARIO"].", Cerrar  Orden Compra.","material_ocompra", $_REQUEST['IDP'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

                    //REDIRECCIONAR A PAGINA registroRecepcion.php 
                    //SEGUNE EL TIPO DE OPERACIONS QUE SE INDENTIFIQUE EN LA URL     
                                
                    if ($accion_dato == "crear") {
                        $id_dato = $_REQUEST['IDP'];
                        $accion_dato = "ver";
                        echo '<script>
                            Swal.fire({
                                icon:"info",
                                title:"Registro Cerrado",
                                text:"Este OC se encuentra cerrada y no puede ser modificada.",
                                showConfirmButton: true,
                                confirmButtonText:"Cerrar",
                                closeOnConfirm:false
                            }).then((result)=>{
                                location.href = "registroOcompra.php?op&id='.$id_dato.'&a='.$accion_dato.'";                                    
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
                                text:"Este OC se encuentra cerrada y no puede ser modificada.",
                                showConfirmButton: true,
                                confirmButtonText:"Cerrar",
                                closeOnConfirm:false
                            }).then((result)=>{
                                location.href = "registroOcompra.php?op&id='.$id_dato.'&a='.$accion_dato.'";                                    
                            })
                        </script>';
                    }    
                }
            }
        
        ?>
</body>

</html>