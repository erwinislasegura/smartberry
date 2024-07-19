<?php

include_once "../../assest/config/validarUsuarioExpo.php";


//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/ESPECIES_ADO.php';
include_once '../../assest/controlador/VESPECIES_ADO.php';
include_once '../../assest/controlador/CUARTEL_ADO.php';
include_once '../../assest/modelo/CUARTEL.php';

//INCIALIZAR LAS VARIBLES

$CUARTEL_ADO =  new CUARTEL_ADO();
$ESPECIES_ADO =  new ESPECIES_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
//INIICIALIZAR MODELO
$CUARTEL =  new CUARTEL();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$OP = "";
$DISABLED = "";


$NOMBRECUARTEL = "";
$TIEMPOPRODUCCIONANOCUARTEL = "";
$ANOPLANTACIONCUARTEL = "";
$HECTAREASCUARTEL = "";
$PLANTASENHECATAREAS = "";
$DISTANCIAPLANTACUARTEL = "";
$ESPECIES = "";
$VESPECIES = "";

$NUMERO = "";
$CONTADOR=0;



$NOMBRE = "";
$MENSAJE = "";
$FOCUS = "";
$MENSAJE2 = "";
$FOCUS2 = "";
$BORDER = "";

//INICIALIZAR ARREGLOS
$ARRAYCUARTEL = "";
$ARRAYCUARTELID = "";
$ARRAYVESPECIES = "";

$ARRAYESPECIES = "";
$ARRAYVERVESPECIESID = "";
$ARRAYNUMERO = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYCUARTEL = $CUARTEL_ADO->listarCuartelPorEmpresaCBX($EMPRESAS);
//$ARRAYVESPECIES = $VESPECIES_ADO->listarVespeciesPorEmpresaCBX($EMPRESAS);
$ARRAYESPECIES = $ESPECIES_ADO->listarEspeciesCBX();
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
        $ARRAYCUARTELID = $CUARTEL_ADO->verCuartel($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYCUARTELID as $r) :
            $NOMBRECUARTEL = "" . $r['NOMBRE_CUARTEL'];
            $TIEMPOPRODUCCIONANOCUARTEL = "" . $r['TIEMPO_PRODUCCION_ANO_CUARTEL'];
            $ANOPLANTACIONCUARTEL = "" . $r['ANO_PLANTACION_CUARTEL'];
            $HECTAREASCUARTEL = "" . $r['HECTAREAS_CUARTEL'];
            $PLANTASENHECATAREAS = "" . $r['PLANTAS_EN_HECTAREAS'];
            $DISTANCIAPLANTACUARTEL = "" . $r['DISTANCIA_PLANTA_CUARTEL'];
            $VESPECIES = "" . $r['ID_VESPECIES'];
            $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
            $ESPECIES = $ARRAYVERVESPECIESID[0]['ID_ESPECIES'];
            $ARRAYVESPECIES = $VESPECIES_ADO->buscarVespeciesPorEspecies($ESPECIES);

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
        $ARRAYCUARTELID = $CUARTEL_ADO->verCuartel($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYCUARTELID as $r) :
            $NOMBRECUARTEL = "" . $r['NOMBRE_CUARTEL'];
            $TIEMPOPRODUCCIONANOCUARTEL = "" . $r['TIEMPO_PRODUCCION_ANO_CUARTEL'];
            $ANOPLANTACIONCUARTEL = "" . $r['ANO_PLANTACION_CUARTEL'];
            $HECTAREASCUARTEL = "" . $r['HECTAREAS_CUARTEL'];
            $PLANTASENHECATAREAS = "" . $r['PLANTAS_EN_HECTAREAS'];
            $DISTANCIAPLANTACUARTEL = "" . $r['DISTANCIA_PLANTA_CUARTEL'];
            $VESPECIES = "" . $r['ID_VESPECIES'];
            $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
            $ESPECIES = $ARRAYVERVESPECIESID[0]['ID_ESPECIES'];
            $ARRAYVESPECIES = $VESPECIES_ADO->buscarVespeciesPorEspecies($ESPECIES);

        endforeach;

    }
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {

        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL

        $ARRAYCUARTELID = $CUARTEL_ADO->verCuartel($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYCUARTELID as $r) :
            $NOMBRECUARTEL = "" . $r['NOMBRE_CUARTEL'];
            $TIEMPOPRODUCCIONANOCUARTEL = "" . $r['TIEMPO_PRODUCCION_ANO_CUARTEL'];
            $ANOPLANTACIONCUARTEL = "" . $r['ANO_PLANTACION_CUARTEL'];
            $HECTAREASCUARTEL = "" . $r['HECTAREAS_CUARTEL'];
            $PLANTASENHECATAREAS = "" . $r['PLANTAS_EN_HECTAREAS'];
            $DISTANCIAPLANTACUARTEL = "" . $r['DISTANCIA_PLANTA_CUARTEL'];
            $VESPECIES = "" . $r['ID_VESPECIES'];
            $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
            $ESPECIES = $ARRAYVERVESPECIESID[0]['ID_ESPECIES'];
            $ARRAYVESPECIES = $VESPECIES_ADO->buscarVespeciesPorEspecies($ESPECIES);

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
        $ARRAYCUARTELID = $CUARTEL_ADO->verCuartel($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYCUARTELID as $r) :
            $NOMBRECUARTEL = "" . $r['NOMBRE_CUARTEL'];
            $TIEMPOPRODUCCIONANOCUARTEL = "" . $r['TIEMPO_PRODUCCION_ANO_CUARTEL'];
            $ANOPLANTACIONCUARTEL = "" . $r['ANO_PLANTACION_CUARTEL'];
            $HECTAREASCUARTEL = "" . $r['HECTAREAS_CUARTEL'];
            $PLANTASENHECATAREAS = "" . $r['PLANTAS_EN_HECTAREAS'];
            $DISTANCIAPLANTACUARTEL = "" . $r['DISTANCIA_PLANTA_CUARTEL'];
            $VESPECIES = "" . $r['ID_VESPECIES'];
            $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
            $ESPECIES = $ARRAYVERVESPECIESID[0]['ID_ESPECIES'];
            $ARRAYVESPECIES = $VESPECIES_ADO->buscarVespeciesPorEspecies($ESPECIES);

        endforeach;
    }
}

if ($_POST) {

    if (isset($_REQUEST['ESPECIES'])) {
        $ESPECIES = $_REQUEST['ESPECIES'];
        $ARRAYVESPECIES = $VESPECIES_ADO->buscarVespeciesPorEspecies($_REQUEST['ESPECIES']);
    }
    if (isset($_REQUEST['VESPECIES'])) {
        $VESPECIES = $_REQUEST['VESPECIES'];    
    }
    if (isset($_REQUEST['NOMBRECUARTEL'])) {
        $NOMBRECUARTEL = $_REQUEST['NOMBRECUARTEL'];
    }
    if (isset($_REQUEST['TIEMPOPRODUCCIONANOCUARTEL'])) {
        $TIEMPOPRODUCCIONANOCUARTEL = $_REQUEST['TIEMPOPRODUCCIONANOCUARTEL'];
    }
    if (isset($_REQUEST['ANOPLANTACIONCUARTEL'])) {
        $ANOPLANTACIONCUARTEL = $_REQUEST['ANOPLANTACIONCUARTEL'];
    }
    if (isset($_REQUEST['HECTAREASCUARTEL'])) {
        $HECTAREASCUARTEL = $_REQUEST['HECTAREASCUARTEL'];
    }
    if (isset($_REQUEST['PLANTASENHECATAREAS'])) {
        $PLANTASENHECATAREAS = $_REQUEST['PLANTASENHECATAREAS'];
    }
    if (isset($_REQUEST['DISTANCIAPLANTACUARTEL'])) {
        $DISTANCIAPLANTACUARTEL = $_REQUEST['DISTANCIAPLANTACUARTEL'];
    }
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Cuartel</title>
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




                    NOMBRECUARTEL = document.getElementById("NOMBRECUARTEL").value;
                    TIEMPOPRODUCCIONANOCUARTEL = document.getElementById("TIEMPOPRODUCCIONANOCUARTEL").value;
                    ANOPLANTACIONCUARTEL = document.getElementById("ANOPLANTACIONCUARTEL").value;

                    HECTAREASCUARTEL = document.getElementById("HECTAREASCUARTEL").value;
                    PLANTASENHECATAREAS = document.getElementById("PLANTASENHECATAREAS").value;
                    DISTANCIAPLANTACUARTEL = document.getElementById("DISTANCIAPLANTACUARTEL").value;

                    ESPECIES = document.getElementById("ESPECIES").selectedIndex;
                    VESPECIES = document.getElementById("VESPECIES").selectedIndex;

                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_tiempopa').innerHTML = "";
                    document.getElementById('val_anoplanta').innerHTML = "";
                    document.getElementById('val_hecta').innerHTML = "";
                    document.getElementById('val_plantahecta').innerHTML = "";
                    document.getElementById('val_distanciaplanta').innerHTML = "";

                    document.getElementById('val_vespecies').innerHTML = "";




                    if (NOMBRECUARTEL == null || NOMBRECUARTEL.length == 0 || /^\s+$/.test(NOMBRECUARTEL)) {
                        document.form_reg_dato.NOMBRECUARTEL.focus();
                        document.form_reg_dato.NOMBRECUARTEL.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBRECUARTEL.style.borderColor = "#4AF575";

                    // /^[0-9]+$/

                    if (TIEMPOPRODUCCIONANOCUARTEL == null || TIEMPOPRODUCCIONANOCUARTEL == "") {
                        document.form_reg_dato.TIEMPOPRODUCCIONANOCUARTEL.focus();
                        document.form_reg_dato.TIEMPOPRODUCCIONANOCUARTEL.style.borderColor = "#FF0000";
                        document.getElementById('val_tiempopa').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.TIEMPOPRODUCCIONANOCUARTEL.style.borderColor = "#4AF575";

                    if (ANOPLANTACIONCUARTEL == null || ANOPLANTACIONCUARTEL == "") {
                        document.form_reg_dato.ANOPLANTACIONCUARTEL.focus();
                        document.form_reg_dato.ANOPLANTACIONCUARTEL.style.borderColor = "#FF0000";
                        document.getElementById('val_anoplanta').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.ANOPLANTACIONCUARTEL.style.borderColor = "#4AF575";


                    if (HECTAREASCUARTEL == null || HECTAREASCUARTEL == "") {
                        document.form_reg_dato.HECTAREASCUARTEL.focus();
                        document.form_reg_dato.HECTAREASCUARTEL.style.borderColor = "#FF0000";
                        document.getElementById('val_hecta').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.HECTAREASCUARTEL.style.borderColor = "#4AF575";

                    if (PLANTASENHECATAREAS == null || PLANTASENHECATAREAS == "") {
                        document.form_reg_dato.PLANTASENHECATAREAS.focus();
                        document.form_reg_dato.PLANTASENHECATAREAS.style.borderColor = "#FF0000";
                        document.getElementById('val_plantahecta').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.PLANTASENHECATAREAS.style.borderColor = "#4AF575";

                    if (DISTANCIAPLANTACUARTEL == null || DISTANCIAPLANTACUARTEL == "") {
                        document.form_reg_dato.DISTANCIAPLANTACUARTEL.focus();
                        document.form_reg_dato.DISTANCIAPLANTACUARTEL.style.borderColor = "#FF0000";
                        document.getElementById('val_distanciaplanta').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DISTANCIAPLANTACUARTEL.style.borderColor = "#4AF575";

                    if (ESPECIES == null || ESPECIES == 0) {
                        document.form_reg_dato.ESPECIES.focus();
                        document.form_reg_dato.ESPECIES.style.borderColor = "#FF0000";
                        document.getElementById('val_especies').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.VESPECIES.style.borderColor = "#4AF575";


                    if (VESPECIES == null || VESPECIES == 0) {
                        document.form_reg_dato.VESPECIES.focus();
                        document.form_reg_dato.VESPECIES.style.borderColor = "#FF0000";
                        document.getElementById('val_vespecies').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.VESPECIES.style.borderColor = "#4AF575";




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
            <?php include_once "../../assest/config/menuExpo.php"; ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="container-full">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Fruta</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Mantenedores</li>
                                            <li class="breadcrumb-item" aria-current="page">Fruta</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Registro Cuartel </a>
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
                                        <h4 class="box-title">Registro Cuartel</h4>                                        
                                    </div>
                                    <!-- /.box-header -->
                                    <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato">
                                        <div class="box-body">
                                            <hr class="my-15">
                                            <div class="row">
                                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Nombre </label>
                                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                        <input type="hidden" class="form-control" placeholder="EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                        <input type="text" class="form-control" placeholder="Nombre Cuartel" id="NOMBRECUARTEL" name="NOMBRECUARTEL" value="<?php echo $NOMBRECUARTEL; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nombre" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Tiempo Produccion año</label>
                                                        <input type="number" class="form-control" placeholder="Tiempo Produccion Año " id="TIEMPOPRODUCCIONANOCUARTEL" name="TIEMPOPRODUCCIONANOCUARTEL" value="<?php echo $TIEMPOPRODUCCIONANOCUARTEL; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_tiempopa" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Año Plantacion </label>
                                                        <input type="number" class="form-control" placeholder="Año Plantacion Cuartel" id="ANOPLANTACIONCUARTEL" name="ANOPLANTACIONCUARTEL" value="<?php echo $ANOPLANTACIONCUARTEL; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_anoplanta" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Hectareas </label>
                                                        <input type="number" class="form-control" placeholder="Hectareas Cuartel" id="HECTAREASCUARTEL" name="HECTAREASCUARTEL" value="<?php echo $HECTAREASCUARTEL; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_hecta" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Plantas en Hectareas</label>
                                                        <input type="number" class="form-control" placeholder="Plantas en Hectareas Cuartel" id="PLANTASENHECATAREAS" name="PLANTASENHECATAREAS" value="<?php echo $PLANTASENHECATAREAS; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_plantahecta" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Distancia Planta </label>
                                                        <input type="number" class="form-control" placeholder="Distancia Planta Cuartel" id="DISTANCIAPLANTACUARTEL" name="DISTANCIAPLANTACUARTEL" value="<?php echo $DISTANCIAPLANTACUARTEL; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_distanciaplanta" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label> Especies</label>
                                                        <select class="form-control select2" id="ESPECIES" name="ESPECIES" style="width: 100%;" onchange="this.form.submit()" value="<?php echo $ESPECIES; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYESPECIES as $r) : ?>
                                                                <?php if ($ARRAYESPECIES) {    ?>
                                                                    <option value="<?php echo $r['ID_ESPECIES']; ?>" 
                                                                        <?php if ($ESPECIES == $r['ID_ESPECIES']) { echo "selected";   } ?>>
                                                                        <?php echo $r['NOMBRE_ESPECIES'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No Hay Datos Registrados </option>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_especies" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label> Variedad  </label>
                                                        <select class="form-control select2" id="VESPECIES" name="VESPECIES" style="width: 100%;" value="<?php echo $VESPECIES; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYVESPECIES as $r) : ?>
                                                                <?php if ($ARRAYVESPECIES) {    ?>
                                                                    <option value="<?php echo $r['ID_VESPECIES']; ?>" 
                                                                        <?php if ($VESPECIES == $r['ID_VESPECIES']) { echo "selected"; } ?>>
                                                                        <?php echo $r['NOMBRE_VESPECIES'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No Hay Datos Registrados </option>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_vespecies" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->                                                                                                       
                                        <div class="box-footer">
                                            <div class="btn-group   col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12 " role="group" aria-label="Acciones generales">                                    
                                                <button type="button" class="btn  btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroCuartel.php');">
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
                                        <h4 class="box-title"> Agrupado Curtel</h4>
                                    </div>
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <table id="listar" class="table-hover " style="width: 100%;">
                                                <thead>
                                                    <tr class="center">
                                                        <th>Numero </th>
                                                        <th>Operaciones</th>
                                                        <th>Nombre </th>
                                                        <th>Tiempo Produccion año </th>
                                                        <th>Año Plantacion </th>
                                                        <th>Hectareas </th>
                                                        <th>Plantas en Hectareas </th>
                                                        <th>Distancia Planta </th>
                                                        <th>Especies </th>
                                                        <th>Variedad </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYCUARTEL as $r) : ?>
                                                        <?php 
                                                            $CONTADOR+=1;  
                                                            $ARRAYVERESPECIES=$ESPECIES_ADO->verEspecies($r["ID_ESPECIES"]);
                                                            if($ARRAYVERESPECIES){
                                                                $NOMBREESPECIES = $ARRAYVERESPECIES[0]["NOMBRE_ESPECIES"];
                                                            }else{
                                                                $NOMBREESPECIES="Sin Datos";
                                                            }
                                                            $ARRAYVERVESPECIES=$VESPECIES_ADO->verVespecies($r["ID_VESPECIES"]);
                                                            if($ARRAYVERVESPECIES){
                                                                $NOMBREVESPECIES = $ARRAYVERVESPECIES[0]["NOMBRE_VESPECIES"];
                                                            }else{
                                                                $NOMBREVESPECIES="Sin Datos";
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
                                                                                <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_CUARTEL']; ?>" />
                                                                                <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroCuartel" />
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
                                                            <td><?php echo $r['NOMBRE_CUARTEL']; ?></td>    
                                                            <td><?php echo $r['TIEMPO_PRODUCCION_ANO_CUARTEL']; ?></td>    
                                                            <td><?php echo $r['ANO_PLANTACION_CUARTEL']; ?></td>       
                                                            <td><?php echo $r['HECTAREAS_CUARTEL']; ?></td>       
                                                            <td><?php echo $r['PLANTAS_EN_HECTAREAS']; ?></td>    
                                                            <td><?php echo $r['DISTANCIA_PLANTA_CUARTEL']; ?></td>   
                                                            <td><?php echo $NOMBREESPECIES; ?></td>   
                                                            <td><?php echo $NOMBREVESPECIES; ?></td>                                                              
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



                $ARRAYNUMERO = $CUARTEL_ADO->obtenerNumero($_REQUEST['EMPRESA']);
                $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;

                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO 
                $CUARTEL->__SET('NUMERO_CUARTEL', $NUMERO);
                $CUARTEL->__SET('NOMBRE_CUARTEL', $_REQUEST['NOMBRECUARTEL']);
                $CUARTEL->__SET('TIEMPO_PRODUCCION_ANO_CUARTEL', $_REQUEST['TIEMPOPRODUCCIONANOCUARTEL']);
                $CUARTEL->__SET('ANO_PLANTACION_CUARTEL', $_REQUEST['ANOPLANTACIONCUARTEL']);
                $CUARTEL->__SET('HECTAREAS_CUARTEL', $_REQUEST['HECTAREASCUARTEL']);
                $CUARTEL->__SET('PLANTAS_EN_HECTAREAS', $_REQUEST['PLANTASENHECATAREAS']);
                $CUARTEL->__SET('DISTANCIA_PLANTA_CUARTEL', $_REQUEST['DISTANCIAPLANTACUARTEL']);
                $CUARTEL->__SET('ID_VESPECIES', $_REQUEST['VESPECIES']);
                $CUARTEL->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                $CUARTEL->__SET('ID_USUARIOI', $IDUSUARIOS);
                $CUARTEL->__SET('ID_USUARIOM', $IDUSUARIOS);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $CUARTEL_ADO->agregarCuartel($CUARTEL);

                $AUSUARIO_ADO->agregarAusuario2("NULL",3,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Cuartel.","fruta_cuartel","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );  

                //REDIRECCIONAR A PAGINA registroCuartel.php
                    echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Creado",
                        text:"El registro del mantenedor se ha creado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroCuartel.php";                            
                    })
                </script>';
            }
            //OPERACION EDICION DE FILA
            if (isset($_REQUEST['EDITAR'])) {

                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO  
                $CUARTEL->__SET('NOMBRE_CUARTEL', $_REQUEST['NOMBRECUARTEL']);
                $CUARTEL->__SET('TIEMPO_PRODUCCION_ANO_CUARTEL', $_REQUEST['TIEMPOPRODUCCIONANOCUARTEL']);
                $CUARTEL->__SET('ANO_PLANTACION_CUARTEL', $_REQUEST['ANOPLANTACIONCUARTEL']);
                $CUARTEL->__SET('HECTAREAS_CUARTEL', $_REQUEST['HECTAREASCUARTEL']);
                $CUARTEL->__SET('PLANTAS_EN_HECTAREAS', $_REQUEST['PLANTASENHECATAREAS']);
                $CUARTEL->__SET('DISTANCIA_PLANTA_CUARTEL', $_REQUEST['DISTANCIAPLANTACUARTEL']);
                $CUARTEL->__SET('ID_VESPECIES', $_REQUEST['VESPECIES']);
                $CUARTEL->__SET('ID_USUARIOM', $IDUSUARIOS);
                $CUARTEL->__SET('ID_CUARTEL', $_REQUEST['ID']);
                //LLAMADA AL METODO DE EDICION DEL CONTROLADOR
                $CUARTEL_ADO->actualizarCuartel($CUARTEL);

                $AUSUARIO_ADO->agregarAusuario2("NULL",3,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de Cuartel.","fruta_cuartel", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );     

                //REDIRECCIONAR A PAGINA registroCuartel.php
                    echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Modificado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroCuartel.php";                            
                    })
                </script>';
            }
            if (isset($_REQUEST['ELIMINAR'])) {         

                $CUARTEL->__SET('ID_CUARTEL',$_REQUEST['ID']);
                $CUARTEL_ADO->deshabilitar($CUARTEL);
        
                
        
                $AUSUARIO_ADO->agregarAusuario2("NULL",3,4,"".$_SESSION["NOMBRE_USUARIO"].", Deshabilitar  Cuartel.","fruta_cuartel", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );                
                
                echo '<script>
                    Swal.fire({
                        icon:"error",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Deshabilitado correctamente", 
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroCuartel.php";                            
                    })
                </script>';
            }
            
            if (isset($_REQUEST['HABILITAR'])) {   

                $CUARTEL->__SET('ID_CUARTEL', $_REQUEST['ID']);
                $CUARTEL_ADO->habilitar($CUARTEL);

                $AUSUARIO_ADO->agregarAusuario2("NULL",3,5,"".$_SESSION["NOMBRE_USUARIO"].", Habilitar  Cuartel.","fruta_cuartel", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );                               

                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Habilitado correctamente", 
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroCuartel.php";                            
                    })
                </script>';
            }
        ?>
</body>

</html>