<?php


include_once "../../assest/config/validarUsuarioMaterial.php";


//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../../assest/controlador/PRODUCTO_ADO.php';
include_once '../../assest/controlador/FAMILIA_ADO.php';
include_once '../../assest/controlador/SUBFAMILIA_ADO.php';
include_once '../../assest/controlador/TUMEDIDA_ADO.php';
include_once '../../assest/controlador/ESPECIES_ADO.php';


include_once '../../assest/modelo/PRODUCTO.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$FAMILIA_ADO =  new FAMILIA_ADO();
$SUBFAMILIA_ADO =  new SUBFAMILIA_ADO();
$TUMEDIDA_ADO =  new TUMEDIDA_ADO();
$ESPECIES_ADO =  new ESPECIES_ADO();

$PRODUCTO_ADO =  new PRODUCTO_ADO();

//INIICIALIZAR MODELO
$PRODUCTOS =  new PRODUCTO();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$CODIGOPRODUCTO = "";
$NOMBREPRODUCTO = "";
$DESCRIPCIONPRODUCTO = "";
$MODELO = "";
$OPTIMO = "";
$BAJO = "";
$CRITICO = "";
$NUMERO = "";
$NUMEROVER = "";

$FAMILIA = "";
$SUBFAMILIA = "";
$TUMEDIDA = "";
$EMPRESA = "";
$ESPECIES = "";
$AUXILIARCODIGOPRODUCTO1 = "";
$AUXILIARCODIGOPRODUCTO2 = 0;


$FOCUS = "";
$BORDER = "";
$DISABLED = "";
$OP = "";

//INICIALIZAR ARREGLOS
$ARRAYPRODUCTOID = "";
$ARRAYPRODUCTO = "";
$ARRAYEMPRESA = "";
$ARRAYTEMPORADA = "";
$ARRAYFAMILIA = "";
$ARRAYSUBFAMILIA = "";
$ARRAYTUMEDIDA = "";
$ARRAYESPECIES = "";
$ARRAYNUMERO = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYPRODUCTO = $PRODUCTO_ADO->listarProductoPorEmpresaPorTemporadaCBX($EMPRESAS, $TEMPORADAS);
$ARRAYFAMILIA = $FAMILIA_ADO->listarFamiliaPorEmpresaCBX($EMPRESAS);
$ARRAYTUMEDIDA = $TUMEDIDA_ADO->listarTumedidaPorEmpresaCBX($EMPRESAS);
$ARRAYEMPRESA = $EMPRESA_ADO->listarEmpresaCBX();
$ARRAYTEMPORADA = $TEMPORADA_ADO->listarTemporadaCBX();
$ARRAYESPECIES = $ESPECIES_ADO->listarEspeciesCBX();
include_once "../../assest/config/validarDatosUrl.php";
include_once "../../assest/config/datosUrl.php";
include_once "../../assest/config/reporteUrl.php";


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
        $ARRAYPRODUCTOID = $PRODUCTO_ADO->verProducto($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYPRODUCTOID as $r) :
            $CODIGOPRODUCTO = "" . $r['CODIGO_PRODUCTO'];
            $NUMEROVER = "" . $r['NUMERO_PRODUCTO'];
            $NOMBREPRODUCTO = "" . $r['NOMBRE_PRODUCTO'];
            $OPTIMO = "" . $r['OPTIMO'];
            $BAJO = "" . $r['BAJO'];
            $CRITICO = "" . $r['CRITICO'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $FAMILIA = "" . $r['ID_FAMILIA'];
            $ARRAYSUBFAMILIA = $SUBFAMILIA_ADO->listarSubfamiliaPorEmpresaFamiliaCBX($EMPRESAS, $FAMILIA);
            $SUBFAMILIA = "" . $r['ID_SUBFAMILIA'];
            $TUMEDIDA = "" . $r['ID_TUMEDIDA'];
            $ESPECIES = "" . $r['ID_ESPECIES'];
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
        $ARRAYPRODUCTOID = $PRODUCTO_ADO->verProducto($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYPRODUCTOID as $r) :
            $CODIGOPRODUCTO = "" . $r['CODIGO_PRODUCTO'];
            $NUMEROVER = "" . $r['NUMERO_PRODUCTO'];
            $NOMBREPRODUCTO = "" . $r['NOMBRE_PRODUCTO'];
            $OPTIMO = "" . $r['OPTIMO'];
            $BAJO = "" . $r['BAJO'];
            $CRITICO = "" . $r['CRITICO'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $FAMILIA = "" . $r['ID_FAMILIA'];
            $ARRAYSUBFAMILIA = $SUBFAMILIA_ADO->listarSubfamiliaPorEmpresaFamiliaCBX($EMPRESAS, $FAMILIA);
            $SUBFAMILIA = "" . $r['ID_SUBFAMILIA'];
            $TUMEDIDA = "" . $r['ID_TUMEDIDA'];
            $ESPECIES = "" . $r['ID_ESPECIES'];
        endforeach;

    }

    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYPRODUCTOID = $PRODUCTO_ADO->verProducto($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA        
        foreach ($ARRAYPRODUCTOID as $r) :
            $CODIGOPRODUCTO = "" . $r['CODIGO_PRODUCTO'];
            $NUMEROVER = "" . $r['NUMERO_PRODUCTO'];
            $NOMBREPRODUCTO = "" . $r['NOMBRE_PRODUCTO'];
            $OPTIMO = "" . $r['OPTIMO'];
            $BAJO = "" . $r['BAJO'];
            $CRITICO = "" . $r['CRITICO'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $FAMILIA = "" . $r['ID_FAMILIA'];
            $ARRAYSUBFAMILIA = $SUBFAMILIA_ADO->listarSubfamiliaPorEmpresaFamiliaCBX($EMPRESAS, $FAMILIA);
            $SUBFAMILIA = "" . $r['ID_SUBFAMILIA'];
            $TUMEDIDA = "" . $r['ID_TUMEDIDA'];
            $ESPECIES = "" . $r['ID_ESPECIES'];
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
        $ARRAYPRODUCTOID = $PRODUCTO_ADO->verProducto($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYPRODUCTOID as $r) :
            $CODIGOPRODUCTO = "" . $r['CODIGO_PRODUCTO'];
            $NUMEROVER = "" . $r['NUMERO_PRODUCTO'];
            $NOMBREPRODUCTO = "" . $r['NOMBRE_PRODUCTO'];
            $OPTIMO = "" . $r['OPTIMO'];
            $BAJO = "" . $r['BAJO'];
            $CRITICO = "" . $r['CRITICO'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $FAMILIA = "" . $r['ID_FAMILIA'];
            $ARRAYSUBFAMILIA = $SUBFAMILIA_ADO->listarSubfamiliaPorEmpresaFamiliaCBX($EMPRESAS, $FAMILIA);
            $SUBFAMILIA = "" . $r['ID_SUBFAMILIA'];
            $TUMEDIDA = "" . $r['ID_TUMEDIDA'];
            $ESPECIES = "" . $r['ID_ESPECIES'];
        endforeach;
    }
}

if (isset($_POST)) {
    if (isset($_REQUEST['CODIGOPRODUCTO'])) {
        $CODIGOPRODUCTO = $_REQUEST['CODIGOPRODUCTO'];
    }
    if (isset($_REQUEST['NOMBREPRODUCTO'])) {
        $NOMBREPRODUCTO = $_REQUEST['NOMBREPRODUCTO'];
    }
    if (isset($_REQUEST['OPTIMO'])) {
        $OPTIMO = $_REQUEST['OPTIMO'];
    }
    if (isset($_REQUEST['BAJO'])) {
        $BAJO = $_REQUEST['BAJO'];
    }
    if (isset($_REQUEST['CRITICO'])) {
        $CRITICO = $_REQUEST['CRITICO'];
    }
    if (isset($_REQUEST['EMPRESA'])) {
        $EMPRESA = $_REQUEST['EMPRESA'];
    }
    if (isset($_REQUEST['FAMILIA'])) {
        $FAMILIA = $_REQUEST['FAMILIA'];
        $ARRAYSUBFAMILIA = $SUBFAMILIA_ADO->listarSubfamiliaPorEmpresaFamiliaCBX($EMPRESAS, $FAMILIA);
    }
    if (isset($_REQUEST['SUBFAMILIA'])) {
        $SUBFAMILIA = $_REQUEST['SUBFAMILIA'];
    }
    if (isset($_REQUEST['TUMEDIDA'])) {
        $TUMEDIDA = $_REQUEST['TUMEDIDA'];
    }
    if (isset($_REQUEST['ESPECIES'])) {
        $ESPECIES = $_REQUEST['ESPECIES'];
    }
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Tipo Producto</title>
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

                    NOMBREPRODUCTO = document.getElementById("NOMBREPRODUCTO").value;
                    ESPECIES = document.getElementById("ESPECIES").selectedIndex;
                    TUMEDIDA = document.getElementById("TUMEDIDA").selectedIndex;
                    FAMILIA = document.getElementById("FAMILIA").selectedIndex;
                    SUBFAMILIA = document.getElementById("SUBFAMILIA").selectedIndex;
                    OPTIMO = document.getElementById("OPTIMO").value;
                    BAJO = document.getElementById("BAJO").value;
                    CRITICO = document.getElementById("CRITICO").value;

                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_especies').innerHTML = "";
                    document.getElementById('val_tumedida').innerHTML = "";
                    document.getElementById('val_familia').innerHTML = "";
                    document.getElementById('val_subfamilia').innerHTML = "";
                    document.getElementById('val_optimo').innerHTML = "";
                    document.getElementById('val_bajo').innerHTML = "";
                    document.getElementById('val_critico').innerHTML = "";

                    if (NOMBREPRODUCTO == null || NOMBREPRODUCTO.length == 0 || /^\s+$/.test(NOMBREPRODUCTO)) {
                        document.form_reg_dato.NOMBREPRODUCTO.focus();
                        document.form_reg_dato.NOMBREPRODUCTO.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBREPRODUCTO.style.borderColor = "#4AF575";

                    if (ESPECIES == null || ESPECIES == 0) {
                        document.form_reg_dato.ESPECIES.focus();
                        document.form_reg_dato.ESPECIES.style.borderColor = "#FF0000";
                        document.getElementById('val_especies').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.ESPECIES.style.borderColor = "#4AF575";



                    if (TUMEDIDA == null || TUMEDIDA == 0) {
                        document.form_reg_dato.TUMEDIDA.focus();
                        document.form_reg_dato.TUMEDIDA.style.borderColor = "#FF0000";
                        document.getElementById('val_tumedida').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.TUMEDIDA.style.borderColor = "#4AF575";

                    if (FAMILIA == null || FAMILIA == 0) {
                        document.form_reg_dato.FAMILIA.focus();
                        document.form_reg_dato.FAMILIA.style.borderColor = "#FF0000";
                        document.getElementById('val_familia').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.FAMILIA.style.borderColor = "#4AF575";

                    if (SUBFAMILIA == null || SUBFAMILIA == 0) {
                        document.form_reg_dato.SUBFAMILIA.focus();
                        document.form_reg_dato.SUBFAMILIA.style.borderColor = "#FF0000";
                        document.getElementById('val_subfamilia').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.SUBFAMILIA.style.borderColor = "#4AF575";

                    if (OPTIMO == null || OPTIMO.length == 0 || /^\s+$/.test(OPTIMO)) {
                        document.form_reg_dato.OPTIMO.focus();
                        document.form_reg_dato.OPTIMO.style.borderColor = "#FF0000";
                        document.getElementById('val_optimo').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.OPTIMO.style.borderColor = "#4AF575";

                    if (BAJO == null || BAJO.length == 0 || /^\s+$/.test(BAJO)) {
                        document.form_reg_dato.BAJO.focus();
                        document.form_reg_dato.BAJO.style.borderColor = "#FF0000";
                        document.getElementById('val_bajo').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.BAJO.style.borderColor = "#4AF575";

                    if (CRITICO == null || CRITICO.length == 0 || /^\s+$/.test(CRITICO)) {
                        document.form_reg_dato.CRITICO.focus();
                        document.form_reg_dato.CRITICO.style.borderColor = "#FF0000";
                        document.getElementById('val_critico').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.CRITICO.style.borderColor = "#4AF575";

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
            <?php include_once "../../assest/config/menuMaterial.php";   ?>
            <div class="content-wrapper">
                <div class="container-full">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Producto</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Mantenedores</li>
                                            <li class="breadcrumb-item" aria-current="page">Producto </li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Registro Producto </a>
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
                                        <h4 class="box-title">Registro Producto</h4>                                
                                    </div>
                                    <!-- /.box-header -->
                                    <form class="form" role="form" method="post" id="form_reg_dato" name="form_reg_dato" >
                                        <div class="box-body">
                                            <hr class="my-15">
                                            <div class="row">
                                                 <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Codigo </label>
                                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                        <input type="hidden" class="form-control" placeholder="NUMERO" id="NUMERO" name="NUMERO" value="<?php echo $NUMEROVER; ?>" />
                                                        <input type="hidden" class="form-control" placeholder="EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                        <input type="hidden" class="form-control" placeholder="TEMPORADA" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADAS; ?>" />
                                                        <input type="text" class="form-control" placeholder=" Codigo  Producto" id="CODIGOPRODUCTO" name="CODIGOPRODUCTO" value="<?php echo $CODIGOPRODUCTO; ?>" disabled />
                                                        <label id="val_codigo" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Nombre </label>
                                                        <input type="text" class="form-control" placeholder=" Nombre  Producto" id="NOMBREPRODUCTO" name="NOMBREPRODUCTO" value="<?php echo $NOMBREPRODUCTO; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nombre" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Especies</label>
                                                        <select class="form-control select2" id="ESPECIES" name="ESPECIES" style="width: 100%;" value="<?php echo $ESPECIES; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYESPECIES  as $r) : ?>
                                                                <?php if ($ARRAYESPECIES) {    ?>
                                                                    <option value="<?php echo $r['ID_ESPECIES']; ?>" 
                                                                    <?php if ($ESPECIES == $r['ID_ESPECIES']) {  echo "selected";  } ?>>
                                                                        <?php echo $r['NOMBRE_ESPECIES'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No Hay Datos Registados </option>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_especies" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label> Unidad Medida</label>
                                                        <select class="form-control select2" id="TUMEDIDA" name="TUMEDIDA" style="width: 100%;" value="<?php echo $TUMEDIDA; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYTUMEDIDA as $r) : ?>
                                                                <?php if ($ARRAYTUMEDIDA) {    ?>
                                                                    <option value="<?php echo $r['ID_TUMEDIDA']; ?>"
                                                                     <?php if ($TUMEDIDA == $r['ID_TUMEDIDA']) { echo "selected";  } ?>>
                                                                        <?php echo $r['NOMBRE_TUMEDIDA'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No Hay Datos Registados </option>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_tumedida" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Familia</label>
                                                        <select class="form-control select2" id="FAMILIA" name="FAMILIA" style="width: 100%;" onchange="this.form.submit()" value="<?php echo $FAMILIA; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYFAMILIA as $r) : ?>
                                                                <?php if ($ARRAYFAMILIA) {    ?>
                                                                    <option value="<?php echo $r['ID_FAMILIA']; ?>" 
                                                                    <?php if ($FAMILIA == $r['ID_FAMILIA']) { echo "selected"; } ?>>
                                                                        <?php echo $r['NOMBRE_FAMILIA'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No Hay Datos Registados </option>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_familia" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Sub Familia</label>
                                                        <select class="form-control select2" id="SUBFAMILIA" name="SUBFAMILIA" style="width: 100%;" value="<?php echo $SUBFAMILIA; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYSUBFAMILIA  as $r) : ?>
                                                                <?php if ($ARRAYSUBFAMILIA) {    ?>
                                                                    <option value="<?php echo $r['ID_SUBFAMILIA']; ?>" 
                                                                    <?php if ($SUBFAMILIA == $r['ID_SUBFAMILIA']) { echo "selected"; } ?>>
                                                                        <?php echo $r['NOMBRE_SUBFAMILIA'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No Hay Datos Registados </option>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_subfamilia" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                 <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Optimo </label>
                                                        <input type="number" class="form-control" placeholder=" Optimo  Producto" id="OPTIMO" name="OPTIMO" value="<?php echo $OPTIMO; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_optimo" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Bajo </label>
                                                        <input type="number" class="form-control" placeholder=" Bajo  Producto" id="BAJO" name="BAJO" value="<?php echo $BAJO; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_bajo" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Crítico </label>
                                                        <input type="number" class="form-control" placeholder=" Crítico  Producto" id="CRITICO" name="CRITICO" value="<?php echo $CRITICO; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_critico" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <div class="btn-group   col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12 " role="group" aria-label="Acciones generales">                                    
                                                <button type="button" class="btn  btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroProducto.php');">
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
                                                    <button type="submit" class="btn btn-success" name="HABILITAR" value="HABILITAR"  data-toggle="tooltip" title="Habilitar"  >
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
                                        <h4 class="box-title"> Agrupado Producto </h4>                                   
                                    </div>
                                    <div class="box-body">
                                        <div class="table-responsive">
                                                    <table id="listar" class="table-hover " style="width: 100%;">
                                                        <thead>
                                                            <tr class="center">
                                                                <th>Número</th>
                                                                <th class="text-center">Operaciónes</th>
                                                                <th>Código Producto</th>
                                                                <th>Nombre Producto</th>
                                                                <th>Unidad Medida</th>
                                                                <th>Familia</th>
                                                                <th>SubFamilia</th>
                                                                <th>Especies</th>
                                                                <th>Optimo</th>
                                                                <th>Bajo</th>
                                                                <th>Crítico</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($ARRAYPRODUCTO as $r) : ?>
                                                                <?php 
                                                                    $ARRAYVERESPECIES=$ESPECIES_ADO->verEspecies($r["ID_ESPECIES"]);
                                                                    if($ARRAYVERESPECIES){
                                                                       $NOMBREESPECIES= $ARRAYVERESPECIES[0]["NOMBRE_ESPECIES"];
                                                                    }else{
                                                                        $NOMBREESPECIES="Sin Datos";
                                                                    }
                                                                    $ARRAYVERTUMEDIDA=$TUMEDIDA_ADO->verTumedida($r["ID_TUMEDIDA"]);
                                                                    if($ARRAYVERTUMEDIDA){
                                                                        $NOMBRETUMEDIDA= $ARRAYVERTUMEDIDA[0]["NOMBRE_TUMEDIDA"];
                                                                    }else{
                                                                        $NOMBRETUMEDIDA="Sin Datos";
                                                                    }
                                                                    $ARRAYVERFAMILIA=$FAMILIA_ADO->verFamilia($r["ID_FAMILIA"]);
                                                                    if($ARRAYVERFAMILIA){
                                                                        $NOMBREFAMILIA= $ARRAYVERFAMILIA[0]["NOMBRE_FAMILIA"];
                                                                    }else{
                                                                        $NOMBREFAMILIA="Sin Datos";
                                                                    }
                                                                    $ARRAYVERSUBFAMILIA=$SUBFAMILIA_ADO->verSubfamilia($r["ID_SUBFAMILIA"]);
                                                                    if($ARRAYVERSUBFAMILIA){
                                                                        $NOMBRESUBFAMILIA= $ARRAYVERSUBFAMILIA[0]["NOMBRE_SUBFAMILIA"];
                                                                    }else{                                                                        
                                                                        $NOMBRESUBFAMILIA="Sin Datos";
                                                                    }

                                                                ?>
                                                                <tr class="center">
                                                                    <td>
                                                                        <a href="#" class="text-warning hover-warning">
                                                                            <?php echo $r['NUMERO_PRODUCTO']; ?>
                                                                        </a>
                                                                    </td>                                                                                                                            
                                                                    <td class="text-center">
                                                                        <form method="post" id="form1">
                                                                            <div class="list-icons d-inline-flex">
                                                                                <div class="list-icons-item dropdown">
                                                                                    <button class="btn btn-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                        <span class="icon-copy ti-settings"></span>
                                                                                    </button>
                                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_PRODUCTO']; ?>" />
                                                                                        <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroProducto" />
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
                                                                    <td> <?php echo $r['CODIGO_PRODUCTO']; ?></td>
                                                                    <td> <?php echo $r['NOMBRE_PRODUCTO']; ?></td>    
                                                                    <td> <?php echo $NOMBREESPECIES; ?></td>   
                                                                    <td> <?php echo $NOMBRETUMEDIDA; ?></td>   
                                                                    <td> <?php echo $NOMBREFAMILIA; ?></td>   
                                                                    <td> <?php echo $NOMBRESUBFAMILIA; ?></td>    
                                                                    <td> <?php echo $r['OPTIMO']; ?></td>    
                                                                    <td> <?php echo $r['BAJO']; ?></td>    
                                                                    <td> <?php echo $r['CRITICO']; ?></td>    
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

            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php include_once "../../assest/config/footer.php"; ?>
                <?php include_once "../../assest/config/menuExtraMaterial.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../../assest/config/urlBase.php"; ?>
        <?php         
            //OPERACIONES
            //OPERACION DE REGISTRO DE FILA
            if (isset($_REQUEST['GUARDAR'])) {
                $ARRAYNUMERO = $PRODUCTO_ADO->obtenerNumero();
                $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;

                $AUXILIARCODIGOPRODUCTO1 = "F" . $_REQUEST['FAMILIA'] . "S" . $_REQUEST['SUBFAMILIA'] . "C";
                $AUXILIARCODIGOPRODUCTO12 = (1000) + $NUMERO;
                $CODIGOPRODUCTO = $AUXILIARCODIGOPRODUCTO1 . $AUXILIARCODIGOPRODUCTO12;


                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
                $PRODUCTOS->__SET('CODIGO_PRODUCTO', $CODIGOPRODUCTO);
                $PRODUCTOS->__SET('NUMERO_PRODUCTO', $NUMERO);
                $PRODUCTOS->__SET('NOMBRE_PRODUCTO', $_REQUEST['NOMBREPRODUCTO']);
                $PRODUCTOS->__SET('OPTIMO', $_REQUEST['OPTIMO']);
                $PRODUCTOS->__SET('BAJO', $_REQUEST['BAJO']);
                $PRODUCTOS->__SET('CRITICO', $_REQUEST['CRITICO']);
                $PRODUCTOS->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                $PRODUCTOS->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
                $PRODUCTOS->__SET('ID_TUMEDIDA', $_REQUEST['TUMEDIDA']);
                $PRODUCTOS->__SET('ID_FAMILIA', $_REQUEST['FAMILIA']);
                $PRODUCTOS->__SET('ID_SUBFAMILIA', $_REQUEST['SUBFAMILIA']);
                $PRODUCTOS->__SET('ID_ESPECIES', $_REQUEST['ESPECIES']);
                $PRODUCTOS->__SET('ID_USUARIOI', $IDUSUARIOS);
                $PRODUCTOS->__SET('ID_USUARIOM', $IDUSUARIOS);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $PRODUCTO_ADO->agregarProducto($PRODUCTOS);

                $AUSUARIO_ADO->agregarAusuario2("NULL",2,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Producto.","material_producto","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

                //REDIRECCIONAR A PAGINA registroEcomercial.php
                    echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Creado",
                        text:"El registro del mantenedor se ha creado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroProducto.php";                            
                    })
                </script>';
            }
            //OPERACION DE EDICION DE FILA
            if (isset($_REQUEST['EDITAR'])) {
                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO 

                $AUXILIARCODIGOPRODUCTO1 = "F" . $_REQUEST['FAMILIA'] . "S" . $_REQUEST['SUBFAMILIA'] . "C";
                $AUXILIARCODIGOPRODUCTO12 = (1000) + $_REQUEST['NUMERO'];
                $CODIGOPRODUCTO = $AUXILIARCODIGOPRODUCTO1 . $AUXILIARCODIGOPRODUCTO12;


                $PRODUCTOS->__SET('CODIGO_PRODUCTO', $CODIGOPRODUCTO);
                $PRODUCTOS->__SET('NOMBRE_PRODUCTO', $_REQUEST['NOMBREPRODUCTO']);
                $PRODUCTOS->__SET('OPTIMO', $_REQUEST['OPTIMO']);
                $PRODUCTOS->__SET('BAJO', $_REQUEST['BAJO']);
                $PRODUCTOS->__SET('CRITICO', $_REQUEST['CRITICO']);
                $PRODUCTOS->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                $PRODUCTOS->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
                $PRODUCTOS->__SET('ID_TUMEDIDA', $_REQUEST['TUMEDIDA']);
                $PRODUCTOS->__SET('ID_FAMILIA', $_REQUEST['FAMILIA']);
                $PRODUCTOS->__SET('ID_SUBFAMILIA', $_REQUEST['SUBFAMILIA']);
                $PRODUCTOS->__SET('ID_ESPECIES', $_REQUEST['ESPECIES']);
                $PRODUCTOS->__SET('ID_USUARIOM', $IDUSUARIOS);
                $PRODUCTOS->__SET('ID_PRODUCTO', $_REQUEST['ID']);
                //LLAMADA AL METODO DE EDICION DEL CONTROLADOR   
                $PRODUCTO_ADO->actualizarProducto($PRODUCTOS);

                $AUSUARIO_ADO->agregarAusuario2("NULL",2,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de Producto.","material_producto", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );     

                //REDIRECCIONAR A PAGINA registroEcomercial.php
                    echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Modificado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroProducto.php";                            
                    })
                </script>';
            }
            
            if (isset($_REQUEST['ELIMINAR'])) {


                $PRODUCTOS->__SET('ID_PRODUCTO', $_REQUEST['ID']);
                $PRODUCTO_ADO->deshabilitar($PRODUCTOS);
                
       
                $AUSUARIO_ADO->agregarAusuario2("NULL",2,4,"".$_SESSION["NOMBRE_USUARIO"].", Deshabilitar Producto.","material_producto", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );                
                
                echo '<script>
                    Swal.fire({
                        icon:"error",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Deshabilitado correctamente", 
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroProducto.php";                            
                    })
                </script>';
            }
            
            if (isset($_REQUEST['HABILITAR'])) {  

                $PRODUCTOS->__SET('ID_PRODUCTO', $_REQUEST['ID']);
                $PRODUCTO_ADO->habilitar($PRODUCTOS);
        
          

                $AUSUARIO_ADO->agregarAusuario2("NULL",2,5,"".$_SESSION["NOMBRE_USUARIO"].", Habilitar Producto.","material_producto", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );                               

                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Habilitado correctamente", 
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroProducto.php";                            
                    })
                </script>';
            }

        ?>
</body>
</html>