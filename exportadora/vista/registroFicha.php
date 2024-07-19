<?php

include_once "../../assest/config/validarUsuarioExpo.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../../assest/controlador/EEXPORTACION_ADO.php';
include_once '../../assest/controlador/ECOMERCIAL_ADO.php';
include_once '../../assest/controlador/ESPECIES_ADO.php';
include_once '../../assest/controlador/MERCADO_ADO.php';
include_once '../../assest/controlador/TETIQUETA_ADO.php';
include_once '../../assest/controlador/TEMBALAJE_ADO.php';

include_once '../../assest/controlador/PRODUCTO_ADO.php';
include_once '../../assest/controlador/FAMILIA_ADO.php';
include_once '../../assest/controlador/SUBFAMILIA_ADO.php';
include_once '../../assest/controlador/TUMEDIDA_ADO.php';



include_once '../../assest/controlador/FICHA_ADO.php';
include_once '../../assest/controlador/DFICHA_ADO.php';

include_once '../../assest/modelo/FICHA.php';
include_once '../../assest/modelo/DFICHA.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$EEXPORTACION_ADO =  new EEXPORTACION_ADO();
$ECOMERCIAL_ADO =  new ECOMERCIAL_ADO();
$ESPECIES_ADO =  new ESPECIES_ADO();
$MERCADO_ADO =  new MERCADO_ADO();
$TETIQUETA_ADO =  new TETIQUETA_ADO();
$TEMBALAJE_ADO =  new TEMBALAJE_ADO();


$PRODUCTO_ADO =  new PRODUCTO_ADO();
$FAMILIA_ADO =  new FAMILIA_ADO();
$SUBFAMILIA_ADO =  new SUBFAMILIA_ADO();
$TUMEDIDA_ADO =  new TUMEDIDA_ADO();


$FICHA_ADO =  new FICHA_ADO();
$DFICHA_ADO =  new DFICHA_ADO();


//INIICIALIZAR MODELO¿
$FICHA =  new FICHA();
$DFICHA =  new DFICHA();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$NUMERO = "";
$NUMEROVER = "";
$FECHAINGRESO = "";
$FECHAMODIFCIACION = "";
$ESTANDAR = "";
$ENVASEESTANDAR = "";
$PESOENVASEESTANDAR = "";
$TETIQUETA = "";
$TEMBALAJE = "";
$MERCADO = "";
$ESPECIES = "";
$ESTANDARCOMERCIAL = "";
$OBSERVACION = "";

$FAMILIA = "";
$SUBFAMILIA = "";
$TUMEDIDA = "";

$NOMBRETETIQUETA = "";
$NOMBRETEMBALAJE = "";
$NOMBREESTANDARCOMERCIAL = "";
$NOMBREMERCADO = "";
$NOMBREESPECIES = "";

$OBSERVACION = "";
$ESTADO = "";
$CONTADOR = 0;


$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";

$TOTALCANTIDAD = "";
$TOTALCANTIDADV = "";
$TOTALVALOR  = "";
$TOTALVALORV = "";
$VALORPRODUCTO="";

$NUMERO = "";
$NUMEROVER = "";

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


$MENSAJE = "";
$MENSAJE2 = "";
$MENSAJE3 = "";
$MENSAJEVALIDATO = "";


//INICIALIZAR ARREGLOS
$ARRAYFICHA = "";
$ARRAYDFICHA = "";
$ARRAYDFICHA2 = "";

$ARRAYESTANDAR = "";
$ARRAYTETIQUETA = "";
$ARRAYTEMBALAJE = "";
$ARRAYMERCADO = "";
$ARRAYESTANDARCOMERCIAL = "";


$ARRAYPRODUCTO = "";
$ARRAYFAMILIA = "";
$ARRAYSUBFAMILIA = "";


$ARRYAOBTENERID = "";
$ARRAYNUMERO = "";
$ARRAYVALORPRODUCTOMAXOC="";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYESTANDAR = $EEXPORTACION_ADO->listarEstandarPorEmpresaCBX($EMPRESAS);
include_once "../../assest/config/validarDatosUrl.php";
include_once "../../assest/config/datosUrlD.php";


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


    $ARRAYDFICHA = $DFICHA_ADO->listarDfichaPorFichCBX($IDOP);

    //FUNCION PARA LA OBTENCION DE LOS TOTALES DEL DETALLE ASOCIADO A OCOMPRA



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
        $ARRAYFICHA = $FICHA_ADO->verFicha($IDOP);
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYFICHA as $r) :
            $IDFICHA = $IDOP;
            $NUMEROVER = "" . $r['NUMERO_FICHA'];
            $OBSERVACION = "" . $r['OBSERVACIONES_FICHA'];
            $ESTANDAR = "" . $r['ID_ESTANDAR'];
            $ARRAYVERESTANDAR = $EEXPORTACION_ADO->verEstandar($ESTANDAR);
            if ($ARRAYVERESTANDAR) {
                $ENVASEESTANDAR = $ARRAYVERESTANDAR[0]["CANTIDAD_ENVASE_ESTANDAR"];
                $PESOENVASEESTANDAR = $ARRAYVERESTANDAR[0]["PESO_ENVASE_ESTANDAR"];
                $TETIQUETA = $ARRAYVERESTANDAR[0]["ID_TETIQUETA"];
                $TEMBALAJE = $ARRAYVERESTANDAR[0]["ID_TEMBALAJE"];
                $ESPECIES = $ARRAYVERESTANDAR[0]["ID_ESPECIES"];
                $ESTANDARCOMERCIAL = $ARRAYVERESTANDAR[0]["ID_ECOMERCIAL"];
                $ARRAYTETIQUETA = $TETIQUETA_ADO->verEtiqueta($TETIQUETA);
                $ARRAYTEMBALAJE = $TEMBALAJE_ADO->verEmbalaje($TEMBALAJE);
                $ARRAYMERCADO = $MERCADO_ADO->verMercado($MERCADO);
                $ARRAYESPECIES = $ESPECIES_ADO->verEspecies($ESPECIES);
                $ARRAYVERESTANDARCOMERCIAL = $ECOMERCIAL_ADO->verEcomercial($ESTANDARCOMERCIAL);

                if ($ARRAYTETIQUETA) {
                    $NOMBRETETIQUETA = $ARRAYTETIQUETA[0]["NOMBRE_TETIQUETA"];
                }
                if ($ARRAYTEMBALAJE) {
                    $NOMBRETEMBALAJE = $ARRAYTEMBALAJE[0]["NOMBRE_TEMBALAJE"];
                }
                if ($ARRAYESPECIES) {
                    $NOMBREESPECIES = $ARRAYESPECIES[0]["NOMBRE_ESPECIES"];
                }
                if ($ARRAYVERESTANDARCOMERCIAL) {
                    $NOMBREESTANDARCOMERCIAL = $ARRAYVERESTANDARCOMERCIAL[0]["NOMBRE_ECOMERCIAL"];
                }
            }
            $EMPRESA = "" . $r['ID_EMPRESA'];
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
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        $ARRAYFICHA = $FICHA_ADO->verFicha($IDOP);
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYFICHA as $r) :
            $IDFICHA = $IDOP;
            $NUMEROVER = "" . $r['NUMERO_FICHA'];
            $OBSERVACION = "" . $r['OBSERVACIONES_FICHA'];
            $ESTANDAR = "" . $r['ID_ESTANDAR'];
            $ARRAYVERESTANDAR = $EEXPORTACION_ADO->verEstandar($ESTANDAR);
            if ($ARRAYVERESTANDAR) {
                $ENVASEESTANDAR = $ARRAYVERESTANDAR[0]["CANTIDAD_ENVASE_ESTANDAR"];
                $PESOENVASEESTANDAR = $ARRAYVERESTANDAR[0]["PESO_ENVASE_ESTANDAR"];
                $TETIQUETA = $ARRAYVERESTANDAR[0]["ID_TETIQUETA"];
                $TEMBALAJE = $ARRAYVERESTANDAR[0]["ID_TEMBALAJE"];
                $ESPECIES = $ARRAYVERESTANDAR[0]["ID_ESPECIES"];
                $ESTANDARCOMERCIAL = $ARRAYVERESTANDAR[0]["ID_ECOMERCIAL"];
                $ARRAYTETIQUETA = $TETIQUETA_ADO->verEtiqueta($TETIQUETA);
                $ARRAYTEMBALAJE = $TEMBALAJE_ADO->verEmbalaje($TEMBALAJE);
                $ARRAYMERCADO = $MERCADO_ADO->verMercado($MERCADO);
                $ARRAYESPECIES = $ESPECIES_ADO->verEspecies($ESPECIES);
                $ARRAYVERESTANDARCOMERCIAL = $ECOMERCIAL_ADO->verEcomercial($ESTANDARCOMERCIAL);

                if ($ARRAYTETIQUETA) {
                    $NOMBRETETIQUETA = $ARRAYTETIQUETA[0]["NOMBRE_TETIQUETA"];
                }
                if ($ARRAYTEMBALAJE) {
                    $NOMBRETEMBALAJE = $ARRAYTEMBALAJE[0]["NOMBRE_TEMBALAJE"];
                }
                if ($ARRAYESPECIES) {
                    $NOMBREESPECIES = $ARRAYESPECIES[0]["NOMBRE_ESPECIES"];
                }
                if ($ARRAYESTANDARCOMERCIAL) {
                    $NOMBREESTANDARCOMERCIAL = $ARRAYVERESTANDARCOMERCIAL[0]["NOMBRE_ECOMERCIAL"];
                }
            }
            $EMPRESA = "" . $r['ID_EMPRESA'];
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
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        $ARRAYFICHA = $FICHA_ADO->verFicha($IDOP);
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYFICHA as $r) :
            $IDFICHA = $IDOP;
            $NUMEROVER = "" . $r['NUMERO_FICHA'];
            $OBSERVACION = "" . $r['OBSERVACIONES_FICHA'];
            $ESTANDAR = "" . $r['ID_ESTANDAR'];
            $ARRAYVERESTANDAR = $EEXPORTACION_ADO->verEstandar($ESTANDAR);
            if ($ARRAYVERESTANDAR) {
                $ENVASEESTANDAR = $ARRAYVERESTANDAR[0]["CANTIDAD_ENVASE_ESTANDAR"];
                $PESOENVASEESTANDAR = $ARRAYVERESTANDAR[0]["PESO_ENVASE_ESTANDAR"];
                $TETIQUETA = $ARRAYVERESTANDAR[0]["ID_TETIQUETA"];
                $TEMBALAJE = $ARRAYVERESTANDAR[0]["ID_TEMBALAJE"];
                $ESPECIES = $ARRAYVERESTANDAR[0]["ID_ESPECIES"];
                $ESTANDARCOMERCIAL = $ARRAYVERESTANDAR[0]["ID_ECOMERCIAL"];
                $ARRAYTETIQUETA = $TETIQUETA_ADO->verEtiqueta($TETIQUETA);
                $ARRAYTEMBALAJE = $TEMBALAJE_ADO->verEmbalaje($TEMBALAJE);
                $ARRAYMERCADO = $MERCADO_ADO->verMercado($MERCADO);
                $ARRAYESPECIES = $ESPECIES_ADO->verEspecies($ESPECIES);
                $ARRAYVERESTANDARCOMERCIAL = $ECOMERCIAL_ADO->verEcomercial($ESTANDARCOMERCIAL);

                if ($ARRAYTETIQUETA) {
                    $NOMBRETETIQUETA = $ARRAYTETIQUETA[0]["NOMBRE_TETIQUETA"];
                }
                if ($ARRAYTEMBALAJE) {
                    $NOMBRETEMBALAJE = $ARRAYTEMBALAJE[0]["NOMBRE_TEMBALAJE"];
                }
                if ($ARRAYESPECIES) {
                    $NOMBREESPECIES = $ARRAYESPECIES[0]["NOMBRE_ESPECIES"];
                }
                if ($ARRAYESTANDARCOMERCIAL) {
                    $NOMBREESTANDARCOMERCIAL = $ARRAYVERESTANDARCOMERCIAL[0]["NOMBRE_ECOMERCIAL"];
                }
            }
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $FECHAINGRESO = "" . $r['INGRESO'];
            $FECHAMODIFCIACION = "" . $r['MODIFICACION'];
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }
}
//PROCESO PARA OBTENER LOS DATOS DEL FORMULARIO  Y MANTENERLO AL ACTUALIZACION QUE REALIZA EL SELECT DE CONDUCTOR
if (isset($_POST)) {

    if (isset($_REQUEST['ESTANDAR'])) {
        $ESTANDAR = "" . $_REQUEST['ESTANDAR'];
        $ARRAYVERESTANDAR = $EEXPORTACION_ADO->verEstandar($ESTANDAR);
        if ($ARRAYVERESTANDAR) {
            $ENVASEESTANDAR = $ARRAYVERESTANDAR[0]["CANTIDAD_ENVASE_ESTANDAR"];
            $PESOENVASEESTANDAR = $ARRAYVERESTANDAR[0]["PESO_ENVASE_ESTANDAR"];
            $TETIQUETA = $ARRAYVERESTANDAR[0]["ID_TETIQUETA"];
            $TEMBALAJE = $ARRAYVERESTANDAR[0]["ID_TEMBALAJE"];
            $ESPECIES = $ARRAYVERESTANDAR[0]["ID_ESPECIES"];
            $ESTANDARCOMERCIAL = $ARRAYVERESTANDAR[0]["ID_ECOMERCIAL"];
            $ARRAYTETIQUETA = $TETIQUETA_ADO->verEtiqueta($TETIQUETA);
            $ARRAYTEMBALAJE = $TEMBALAJE_ADO->verEmbalaje($TEMBALAJE);
            $ARRAYESPECIES = $ESPECIES_ADO->verEspecies($ESPECIES);
            $ARRAYVERESTANDARCOMERCIAL = $ECOMERCIAL_ADO->verEcomercial($ESTANDARCOMERCIAL);

            if ($ARRAYTETIQUETA) {
                $NOMBRETETIQUETA = $ARRAYTETIQUETA[0]["NOMBRE_TETIQUETA"];
            }
            if ($ARRAYTEMBALAJE) {
                $NOMBRETEMBALAJE = $ARRAYTEMBALAJE[0]["NOMBRE_TEMBALAJE"];
            }
            if ($ARRAYESPECIES) {
                $NOMBREESPECIES = $ARRAYESPECIES[0]["NOMBRE_ESPECIES"];
            }
            if ($ARRAYVERESTANDARCOMERCIAL) {
                $NOMBREESTANDARCOMERCIAL = $ARRAYVERESTANDARCOMERCIAL[0]["NOMBRE_ECOMERCIAL"];
            }
        }
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
    <title>Registro Ficha </title>
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


                    ESTANDAR = document.getElementById("ESTANDAR").selectedIndex;
                    document.getElementById('val_estandar').innerHTML = "";


                    if (ESTANDAR == null || ESTANDAR == 0) {
                        document.form_reg_dato.ESTANDAR.focus();
                        document.form_reg_dato.ESTANDAR.style.borderColor = "#FF0000";
                        document.getElementById('val_estandar').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false
                    }
                    document.form_reg_dato.ESTANDAR.style.borderColor = "#4AF575";


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
            <?php include_once "../../assest/config/menuExpo.php";
            ?>
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
                                            <li class="breadcrumb-item" aria-current="page">Ficha</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Registro Ficha </a> </li>
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
                                    <h4 class="box-title">Encabezado de Ficha</h4>
                                </div>
                                <div class="box-body ">
                                    <div class="row">
                                        <div class="col-xxl-2 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Número Ficha</label>

                                                <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTA" name="PLANTA" value="<?php echo $PLANTAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADAS; ?>" />

                                                <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESAE" name="EMPRESAE" value="<?php echo $EMPRESA; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTAE" name="PLANTAE" value="<?php echo $PLANTA; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADAE" name="TEMPORADAE" value="<?php echo $TEMPORADA; ?>" />

                                                <input type="hidden" class="form-control" placeholder="ID FICHA" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="OP FICHA" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="URL FICHA" id="URLP" name="URLP" value="registroFicha" />
                                                <input type="hidden" class="form-control" placeholder="URL DFICHA" id="URLD" name="URLD" value="registroDficha" />
                                                <input type="text" class="form-control" placeholder="Número Ficha" id="NUMEROOCOMPRA" name="NUMEROOCOMPRA" value="<?php echo $NUMEROVER; ?>" disabled style="background-color: #eeeeee;" />
                                                <label id="val_id" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-6 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                            </div>
                                        </div>

                                        <div class="col-xxl-2 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha Ingreso</label>
                                                <input type="hidden" class="form-control" placeholder="Fecha Ingreso" id="FECHAINGRESOE" name="FECHAINGRESOE" value="<?php echo $FECHAINGRESO; ?>" />
                                                <input type="date" class="form-control" style="background-color: #eeeeee;" placeholder="Fecha Ingreso" id="FECHAINGRESO" name="FECHAINGRESO" value="<?php echo $FECHAINGRESO; ?>" disabled />
                                                <label id="val_fechai" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha Modificación</label>
                                                <input type="hidden" class="form-control" placeholder="Fecha Modificación" id="FECHAMODIFCIACIONE" name="FECHAMODIFCIACIONE" value="<?php echo $FECHAMODIFCIACION; ?>" />
                                                <input type="date" class="form-control" style="background-color: #eeeeee;" placeholder="Fecha Modificación" id="FECHAMODIFCIACION" name="FECHAMODIFCIACION" value="<?php echo $FECHAMODIFCIACION; ?>" disabled />
                                                <label id="val_fecham" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <label>Estandar Exportación</label>
                                            <input type="hidden" class="form-control" placeholder="ESTANDARE" id="ESTANDARE" name="ESTANDARE" value="<?php echo $ESTANDAR; ?>" />
                                            <select class="form-control select2" id="ESTANDAR" name="ESTANDAR" style="width: 100%;" onchange="this.form.submit()" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLEDFOLIO; ?>>
                                                <option></option>
                                                <?php foreach ($ARRAYESTANDAR as $r) : ?>
                                                    <?php if ($ARRAYESTANDAR) {    ?>
                                                        <option value="<?php echo $r['ID_ESTANDAR']; ?>" <?php if ($ESTANDAR == $r['ID_ESTANDAR']) {
                                                                                                                echo "selected";
                                                                                                            } ?>><?php echo $r['CODIGO_ESTANDAR'] ?>:<?php echo $r['NOMBRE_ESTANDAR'] ?> </option>
                                                    <?php } else { ?>
                                                        <option>No Hay Datos Registrados </option>
                                                    <?php } ?>
                                                <?php endforeach; ?>
                                            </select>
                                            <label id="val_estandar" class="validacion"> </label>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Cantidad Envase</label>
                                                <input type="hidden" class="form-control" placeholder="Cantidad Envase" id="ENVASEESTANDAR" name="ENVASEESTANDAR" value="<?php echo $ENVASEESTANDAR; ?>" />
                                                <input type="number" class="form-control" placeholder="Cantidad Envase" id="ENVASEESTANDARV" name="ENVASEESTANDARV" value="<?php echo $ENVASEESTANDAR; ?>" disabled />
                                                <label id="val_envase" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Peso Envase</label>
                                                <input type="hidden" class="form-control" placeholder="Peso Envase" id="PESOENVASEESTANDAR" name="PESOENVASEESTANDAR" value="<?php echo $PESOENVASEESTANDAR; ?>" />
                                                <input type="number" step="0.01" class="form-control" placeholder="Peso Envase" id="PESOENVASEESTANDARV" name="PESOENVASEESTANDARV" value="<?php echo $PESOENVASEESTANDAR; ?>" disabled />
                                                <label id="val_pesoenvase" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <label>Especies </label>
                                            <input type="hidden" class="form-control" placeholder="ESPECIES" id="ESPECIES" name="ESPECIES" value="<?php echo $ESPECIES; ?>" />
                                            <input type="text" class="form-control" placeholder="Especies" id="ESPECIESV" name="ESPECIESV" value="<?php echo $NOMBREESPECIES; ?>" disabled />
                                            <label id="val_especies" class="validacion"> </label>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <label>Tipo Etiqueta</label>
                                            <input type="hidden" class="form-control" placeholder="TETIQUETA" id="TETIQUETA" name="TETIQUETA" value="<?php echo $TETIQUETA; ?>" />
                                            <input type="text" class="form-control" placeholder="Tipo Etiqueta" id="TETIQUETAV" name="TETIQUETAV" value="<?php echo $NOMBRETETIQUETA; ?>" disabled />
                                            <label id="val_tetiqueta" class="validacion"> </label>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <label>Tipo Embalaje</label>
                                            <input type="hidden" class="form-control" placeholder="TEMBALAJE" id="TEMBALAJE" name="TEMBALAJE" value="<?php echo $TEMBALAJE; ?>" />
                                            <input type="text" class="form-control" placeholder="Tipo Etiqueta" id="TEMBALAJEV" name="TEMBALAJEV" value="<?php echo $NOMBRETEMBALAJE; ?>" disabled />
                                            <label id="val_tembalaje" class="validacion"> </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Observaciónes </label>
                                                <input type="hidden" class="form-control" placeholder="Observaciónes" id="OBSERVACIONE" name="OBSERVACIONE" value="<?php echo $OBSERVACION; ?>" />
                                                <textarea class="form-control" rows="1" placeholder="Ingrese Nota, Observaciones u Otro" id="OBSERVACION" name="OBSERVACION" <?php echo $DISABLED2; ?> ><?php echo $OBSERVACION; ?></textarea>
                                                <label id="val_observacion" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="btn-group   col-xxl-4 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12 " role="group" aria-label="Acciones generales">
                                        <?php if ($OP == "") { ?>
                                            <button type="button" class="btn btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroFicha.php');">
                                                <i class="ti-trash"></i> Borrar
                                            </button>
                                            <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Crear" name="CREAR" value="CREAR" onclick="return validacion()">
                                                <i class="ti-save-alt"></i> Guardar
                                            </button>
                                        <?php } ?>
                                        <?php if ($OP != "") { ?>
                                            <button type="button" class="btn btn-success " data-toggle="tooltip" title="Volver" name="VOLVER" value="VOLVER" Onclick="irPagina('listarFicha.php'); ">
                                                <i class="ti-back-left "></i> Volver
                                            </button>
                                            <button type="submit" class="btn btn-warning " data-toggle="tooltip" title="Guardar" name="EDITAR" value="EDITAR" <?php echo $DISABLED2; ?> onclick="return validacion()">
                                                <i class="ti-pencil-alt"></i> Guardar
                                            </button>
                                            <button type="submit" class="btn btn-danger " data-toggle="tooltip" title="Cerrar" name="CERRAR" value="CERRAR" <?php echo $DISABLED2; ?>  onclick="return validacion()">
                                                <i class="ti-save-alt"></i> Cerrar
                                            </button>
                                        <?php } ?>
                                    </div>
                                    <div class="btn-group   col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 col-xs-12 float-right" role="group" aria-label="Informes">
                                        <?php if ($OP != "") { ?>
                                            <button type="button" class="btn  btn-primary  " data-toggle="tooltip" title="Informe" id="defecto" name="tarjas"  Onclick="abrirPestana('../../assest/documento/informeFicha.php?parametro=<?php echo $IDOP; ?>&usuario=<?php echo $IDUSUARIOS; ?>'); ">
                                                <i class="fa fa-file-pdf-o"></i> Informe
                                            </button>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                            <!--.row -->
                        </form>
                        
                        <?php if (isset($_GET['op'])): ?>
                            <div class="card">
                                <div class="card-header bg-success">
                                    <h4 class="card-title">Detalles de Ficha</h4>
                                </div>
                                <div class="card-header">
                                    <div class="form-row align-items-center">
                                        <form method="post" id="form2" name="form2">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" placeholder="ID FICHA" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="OP FICHA" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="URL FICHA" id="URLP" name="URLP" value="registroFicha" />
                                                <input type="hidden" class="form-control" placeholder="URL DFICHA" id="URLD" name="URLD" value="registroDficha" />
                                                <button type="submit" class=" btn btn-block btn-success " ata-toggle="tooltip" title="Agregar Detalle" id="CREARDURL" name="CREARDURL"
                                                <?php echo $DISABLED2; ?>>
                                                    Agregar Detalle
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                        <div class=" table-responsive">
                                            <table id="detalle" class="table-hover " style="width: 100%;">
                                                <thead>
                                                    <tr>

                                                        <th>Número</th>
                                                        <th class="text-center">Operaciónes</th>
                                                        <th>Producto </th>
                                                        <th>Familia </th>
                                                        <th>Sub Familia </th>
                                                        <th>Unidad Medida </th>
                                                        <th>Valor Producto</th>
                                                        <th>Factor Consumo </th>
                                                        <th>Total Valor</th>
                                                        <th>Consumo Pallet</th>
                                                        <th>Pallet Carga</th>
                                                        <th>Consumo Contenedor</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if ($ARRAYDFICHA) { ?>
                                                        <?php foreach ($ARRAYDFICHA as $s) : ?>
                                                            <?php $CONTADOR += 1;  ?>
                                                            <?php
                                                            
                                                            $ARRAYVALORPRODUCTOMAXOC=$DFICHA_ADO->listarDifchaValorProductoOcCBX($s['ID_PRODUCTO']);
                                                            if($ARRAYVALORPRODUCTOMAXOC){
                                                                $VALORPRODUCTO=$ARRAYVALORPRODUCTOMAXOC[0]["VALOR"];
                                                            }else{
                                                                $VALORPRODUCTO=0;
                                                            }
                                                            $ARRAYPRODUCTO = $PRODUCTO_ADO->verProducto($s['ID_PRODUCTO']);
                                                            if ($ARRAYPRODUCTO) {
                                                                $NOMBREPRODUCTO= $ARRAYPRODUCTO[0]['NOMBRE_PRODUCTO'];
                                                                $ARRAYFAMILIA = $FAMILIA_ADO->verFamilia($ARRAYPRODUCTO[0]['ID_FAMILIA']);
                                                                if ($ARRAYFAMILIA) {
                                                                    $FAMILIA = $ARRAYFAMILIA[0]["NOMBRE_FAMILIA"];
                                                                } else {
                                                                    $FAMILIA = "Sin Dato";
                                                                }
                                                                $ARRAYSUBFAMILIA = $SUBFAMILIA_ADO->verSubfamilia($ARRAYPRODUCTO[0]['ID_SUBFAMILIA']);
                                                                if ($ARRAYFAMILIA) {
                                                                    $SUBFAMILIA = $ARRAYFAMILIA[0]["NOMBRE_FAMILIA"];
                                                                } else {
                                                                    $SUBFAMILIA = "Sin Dato";
                                                                }

                                                                $ARRAYTUMEDIDA = $TUMEDIDA_ADO->verTumedida($ARRAYPRODUCTO[0]['ID_TUMEDIDA']);
                                                                if ($ARRAYTUMEDIDA) {
                                                                    $TUMEDIDA = $ARRAYTUMEDIDA[0]["NOMBRE_TUMEDIDA"];
                                                                } else {
                                                                    $TUMEDIDA = "Sin Dato";
                                                                }
                                                            } else {
                                                                $NOMBREPRODUCTO= "Sin Dato";
                                                            }
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <a href="#" class="text-warning hover-warning">
                                                                        <?php echo $CONTADOR;  ?>
                                                                    </a>
                                                                </td>

                                                                <td class="text-center">
                                                                    <form method="post" id="form1" name="form1">
                                                                        <input type="hidden" class="form-control" placeholder="ID DFICHA" id="IDD" name="IDD" value="<?php echo $s['ID_DFICHA']; ?>" />
                                                                        <input type="hidden" class="form-control" placeholder="ID FICHA" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                                                        <input type="hidden" class="form-control" placeholder="OP FICHA" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                                                        <input type="hidden" class="form-control" placeholder="URL FICHA" id="URLP" name="URLP" value="registroFicha" />
                                                                        <input type="hidden" class="form-control" placeholder="URL DFICHA" id="URLD" name="URLD" value="registroDficha" />
                                                                        <div class="btn-group btn-rounded btn-block" role="group" aria-label="Operaciones Detalle">
                                                                            <?php if ($ESTADO  == "0") { ?>
                                                                                <button type="submit" class="btn btn-info btn-sm " data-toggle="tooltip" id="VERDURL" name="VERDURL" title="Ver">
                                                                                    <i class="ti-eye"></i><br> Ver
                                                                                </button>
                                                                            <?php } ?>
                                                                            <?php if ($ESTADO  == "1") { ?>
                                                                                <button type="submit" class="btn btn-warning btn-sm " data-toggle="tooltip" id="EDITARDURL" name="EDITARDURL" title="Editar" <?php echo $DISABLED2; ?>>
                                                                                    <i class="ti-pencil-alt"></i><br > Editar
                                                                                </button>
                                                                                <button type="submit" class="btn btn-secondary btn-sm " data-toggle="tooltip" id="DUPLICARDURL" name="DUPLICARDURL" title="Duplicar" <?php echo $DISABLED2; ?>>
                                                                                    <i class="fa fa-fw fa-copy"></i><br> Duplicar
                                                                                </button>
                                                                                <button type="submit" class="btn btn-danger btn-sm " data-toggle="tooltip" id="ELIMINARDURL" name="ELIMINARDURL" title="Eliminar" <?php echo $DISABLED2; ?>>
                                                                                    <i class="ti-close"></i><br> Eliminar
                                                                                </button>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </form>
                                                                </td>
                                                                <td><?php echo $NOMBREPRODUCTO; ?></td>
                                                                <td><?php echo $FAMILIA; ?></td>
                                                                <td><?php echo $SUBFAMILIA; ?></td>
                                                                <td><?php echo $TUMEDIDA; ?></td>
                                                                <td><?php echo $VALORPRODUCTO; ?></td>
                                                                <td><?php echo $s['FACTOR']; ?></td>
                                                                <td><?php echo $VALORPRODUCTO * $s['FACTOR']; ?></td>
                                                                <td><?php echo $s['CONSUMOPALLET']; ?></td>
                                                                <td><?php echo $s['PALLET']; ?></td>
                                                                <td><?php echo $s['CONSUMOCONTENEDOR']; ?></td>
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
                <?php include_once "../../assest/config/menuExtraExpo.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../../assest/config/urlBase.php"; ?>
        <?php 
            //OPERACIONES
            //OPERACION DE REGISTRO DE FILA
            if (isset($_REQUEST['CREAR'])) {
                $ARRAYNUMERO = $FICHA_ADO->obtenerNumero($_REQUEST['EMPRESA'],  $_REQUEST['TEMPORADA']);
                $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;





                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
                $FICHA->__SET('NUMERO_FICHA', $NUMERO);
                $FICHA->__SET('OBSERVACIONES_FICHA', $_REQUEST['OBSERVACION']);
                $FICHA->__SET('ID_ESTANDAR', $_REQUEST['ESTANDAR']);
                $FICHA->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                $FICHA->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
                $FICHA->__SET('ID_USUARIOI', $IDUSUARIOS);
                $FICHA->__SET('ID_USUARIOM', $IDUSUARIOS);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $FICHA_ADO->agregarFicha($FICHA);


                //OBTENER EL ID DE LA OCOMPRA CREADA PARA LUEGO ENVIAR EL INGRESO DEL DETALLE

                $ARRYAOBTENERID = $FICHA_ADO->buscarID(
                    $_REQUEST['ESTANDAR'],
                    $_REQUEST['OBSERVACION'],
                    $_REQUEST['EMPRESA'],
                    $_REQUEST['TEMPORADA'],
                );


                //REDIRECCIONAR A PAGINA registroRecepcion.php 
                $AUSUARIO_ADO->agregarAusuario2($NUMERO,3,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de ficha","material_ficha",$ARRYAOBTENERID[0]['ID_FICHA'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );

                $id_dato = $ARRYAOBTENERID[0]['ID_FICHA'];
                $accion_dato = "crear";
                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Creado",
                        text:"El registro de Ficha se ha creado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                         location.href = "registroFicha.php?op&id='.$id_dato.'&a='.$accion_dato.'";                            
                    })
                </script>';

            }
            //OPERACION EDICION DE FILA
            if (isset($_REQUEST['EDITAR'])) {
                $FICHA->__SET('OBSERVACIONES_FICHA', $_REQUEST['OBSERVACION']);
                $FICHA->__SET('ID_ESTANDAR', $_REQUEST['ESTANDARE']);
                $FICHA->__SET('ID_USUARIOM', $IDUSUARIOS);
                $FICHA->__SET('ID_FICHA', $_REQUEST['IDP']);
                $FICHA_ADO->actualizarFicha($FICHA);

                $AUSUARIO_ADO->agregarAusuario2($NUMEROVER,3,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de ficha","material_ficha",$_REQUEST['IDP'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );
                if ($accion_dato == "crear") {
                    $id_dato = $_REQUEST['IDP'];
                    $accion_dato = "crear";
                    echo '<script>
                        Swal.fire({
                            icon:"info",
                            title:"Registro Modificado",
                            text:"El registro de Ficha se ha modificada correctamente",
                            showConfirmButton: true,
                            confirmButtonText:"Cerrar",
                            closeOnConfirm:false
                        }).then((result)=>{
                            location.href = "registroFicha.php?op&id='.$id_dato.'&a='.$accion_dato.'";                            
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
                            text:"El registro de Ficha se ha modificada correctamente",
                            showConfirmButton: true,
                            confirmButtonText:"Cerrar",
                            closeOnConfirm:false
                        }).then((result)=>{
                            location.href = "registroFicha.php?op&id='.$id_dato.'&a='.$accion_dato.'";                            
                        })
                    </script>';
                }

            }
            //OPERACION PARA CERRAR LA OCOMPRA
            if (isset($_REQUEST['CERRAR'])) {
                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
                $ARRAYDFICHA2 = $DFICHA_ADO->listarDfichaPorFichaCBX($_REQUEST['IDP']);
                if (empty($ARRAYDFICHA2)) {
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
                    $FICHA->__SET('OBSERVACIONES_FICHA', $_REQUEST['OBSERVACION']);
                    $FICHA->__SET('ID_ESTANDAR', $_REQUEST['ESTANDARE']);
                    $FICHA->__SET('ID_USUARIOM', $IDUSUARIOS);
                    $FICHA->__SET('ID_FICHA', $_REQUEST['IDP']);
                    $FICHA_ADO->actualizarFicha($FICHA);

                    $FICHA->__SET('ID_FICHA', $_REQUEST['IDP']);
                    $FICHA_ADO->cerrado($FICHA);

                    $AUSUARIO_ADO->agregarAusuario2($NUMEROVER,3,3,"".$_SESSION["NOMBRE_USUARIO"].", Cerrar ficha","material_ficha",$_REQUEST['IDP'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );
           

                    //REDIRECCIONAR A PAGINA registroRecepcion.php 
                    //SEGUNE EL TIPO DE OPERACIONS QUE SE INDENTIFIQUE EN LA URL        
                        if ($accion_dato == "crear") {
                            $id_dato = $_REQUEST['IDP'];
                            $accion_dato = "ver";
                            echo '<script>
                                Swal.fire({
                                    icon:"info",
                                    title:"Registro Cerrado",
                                    text:"Este ficha se encuentra cerrada y no puede ser modificada.",
                                    showConfirmButton: true,
                                    confirmButtonText:"Cerrar",
                                    closeOnConfirm:false
                                }).then((result)=>{
                                    location.href = "registroFicha.php?op&id='.$id_dato.'&a='.$accion_dato.'";                                    
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
                                    text:"Este ficha se encuentra cerrada y no puede ser modificada.",
                                    showConfirmButton: true,
                                    confirmButtonText:"Cerrar",
                                    closeOnConfirm:false
                                }).then((result)=>{
                                    location.href = "registroFicha.php?op&id='.$id_dato.'&a='.$accion_dato.'";                                    
                                })
                            </script>';
                        }  
                }
            }
        ?>
</body>

</html>