<?php

include_once "../../assest/config/validarUsuarioExpo.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../../assest/controlador/NAVIERA_ADO.php';
include_once '../../assest/modelo/NAVIERA.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$NAVIERA_ADO =  new NAVIERA_ADO();
//INIICIALIZAR MODELO
$NAVIERA =  new NAVIERA();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$OP = "";
$DISABLED = "";

$RUTNAVIERA = "";
$DVNAVIERA = "";
$NOMBRENAVIERA = "";
$GIRONAVIERA = "";
$RAZONSOCIALNAVIERA = "";
$DIRRECIONNAVIERA = "";
$NOTANAVIERA = "";
$CONTACTONAVIERA = "";
$TELEFONONAVIERA = "";
$EMAILNAVIERA = "";
$COMUNA = "";
$NUMERO="";
$CONTADOR=0;


//INICIALIZAR ARREGLOS
$ARRAYNAVIERA = "";
$ARRAYNAVIERAID = "";
$ARRAYCOMUNA = "";
$ARRAYNAVIERA="";




//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYNAVIERA = $NAVIERA_ADO->listarNavierPorEmpresaCBX($EMPRESAS);
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


    //IDENTIFICACIONES DE OPERACIONES    //OPERACION DE CAMBIO DE ESTADO
    //0 = DESACTIVAR
    if ($OP == "0") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION
        $DISABLED = "disabled";
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYNAVIERAID = $NAVIERA_ADO->verNaviera($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA        
        foreach ($ARRAYNAVIERAID as $r) :
            $RUTNAVIERA = "" . $r['RUT_NAVIERA'];
            $DVNAVIERA = "" . $r['DV_NAVIERA'];
            $NOMBRENAVIERA = "" . $r['NOMBRE_NAVIERA'];
            $GIRONAVIERA = "" . $r['GIRO_NAVIERA'];
            $RAZONSOCIALNAVIERA = "" . $r['RAZON_SOCIAL_NAVIERA'];
            $DIRRECIONNAVIERA = "" . $r['DIRECCION_NAVIERA'];
            $NOTANAVIERA = "" . $r['NOTA_NAVIERA'];
            $CONTACTONAVIERA = "" . $r['CONTACTO_NAVIERA'];
            $TELEFONONAVIERA = "" . $r['TELEFONO_NAVIERA'];
            $EMAILNAVIERA = "" . $r['EMAIL_NAVIERA'];
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
        $ARRAYNAVIERAID = $NAVIERA_ADO->verNaviera($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA        
        foreach ($ARRAYNAVIERAID as $r) :
            $RUTNAVIERA = "" . $r['RUT_NAVIERA'];
            $DVNAVIERA = "" . $r['DV_NAVIERA'];
            $NOMBRENAVIERA = "" . $r['NOMBRE_NAVIERA'];
            $GIRONAVIERA = "" . $r['GIRO_NAVIERA'];
            $RAZONSOCIALNAVIERA = "" . $r['RAZON_SOCIAL_NAVIERA'];
            $DIRRECIONNAVIERA = "" . $r['DIRECCION_NAVIERA'];
            $NOTANAVIERA = "" . $r['NOTA_NAVIERA'];
            $CONTACTONAVIERA = "" . $r['CONTACTO_NAVIERA'];
            $TELEFONONAVIERA = "" . $r['TELEFONO_NAVIERA'];
            $EMAILNAVIERA = "" . $r['EMAIL_NAVIERA'];
        endforeach;
    }
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYNAVIERAID = $NAVIERA_ADO->verNaviera($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYNAVIERAID as $r) :
            $RUTNAVIERA = "" . $r['RUT_NAVIERA'];
            $DVNAVIERA = "" . $r['DV_NAVIERA'];
            $NOMBRENAVIERA = "" . $r['NOMBRE_NAVIERA'];
            $GIRONAVIERA = "" . $r['GIRO_NAVIERA'];
            $RAZONSOCIALNAVIERA = "" . $r['RAZON_SOCIAL_NAVIERA'];
            $DIRRECIONNAVIERA = "" . $r['DIRECCION_NAVIERA'];
            $NOTANAVIERA = "" . $r['NOTA_NAVIERA'];
            $CONTACTONAVIERA = "" . $r['CONTACTO_NAVIERA'];
            $TELEFONONAVIERA = "" . $r['TELEFONO_NAVIERA'];
            $EMAILNAVIERA = "" . $r['EMAIL_NAVIERA'];
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
        $ARRAYNAVIERAID = $NAVIERA_ADO->verNaviera($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA        
        foreach ($ARRAYNAVIERAID as $r) :
            $RUTNAVIERA = "" . $r['RUT_NAVIERA'];
            $DVNAVIERA = "" . $r['DV_NAVIERA'];
            $NOMBRENAVIERA = "" . $r['NOMBRE_NAVIERA'];
            $GIRONAVIERA = "" . $r['GIRO_NAVIERA'];
            $RAZONSOCIALNAVIERA = "" . $r['RAZON_SOCIAL_NAVIERA'];
            $DIRRECIONNAVIERA = "" . $r['DIRECCION_NAVIERA'];
            $NOTANAVIERA = "" . $r['NOTA_NAVIERA'];
            $CONTACTONAVIERA = "" . $r['CONTACTO_NAVIERA'];
            $TELEFONONAVIERA = "" . $r['TELEFONO_NAVIERA'];
            $EMAILNAVIERA = "" . $r['EMAIL_NAVIERA'];
        endforeach;
    }
}


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Naviera</title>
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

                    RUTNAVIERA = document.getElementById("RUTNAVIERA").value;
                    DVNAVIERA = document.getElementById("DVNAVIERA").value;
                    NOMBRENAVIERA = document.getElementById("NOMBRENAVIERA").value;
                    GIRONAVIERA = document.getElementById("GIRONAVIERA").value;
                    RAZONSOCIALNAVIERA = document.getElementById("RAZONSOCIALNAVIERA").value;
                    DIRRECIONNAVIERA = document.getElementById("DIRRECIONNAVIERA").value;
                    CONTACTONAVIERA = document.getElementById("CONTACTONAVIERA").value;
                    TELEFONONAVIERA = document.getElementById("TELEFONONAVIERA").value;
                    EMAILNAVIERA = document.getElementById("EMAILNAVIERA").value;

                    document.getElementById('val_rut').innerHTML = "";
                    document.getElementById('val_dv').innerHTML = "";
                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_giro').innerHTML = "";
                    document.getElementById('val_rsocial').innerHTML = "";
                    document.getElementById('val_dirrecion').innerHTML = "";
                    document.getElementById('val_contacto').innerHTML = "";
                    document.getElementById('val_telefono').innerHTML = "";
                    document.getElementById('val_email').innerHTML = "";

                    if (RUTNAVIERA == null || RUTNAVIERA.length == 0 || /^\s+$/.test(RUTNAVIERA)) {
                        document.form_reg_dato.RUTNAVIERA.focus();
                        document.form_reg_dato.RUTNAVIERA.style.borderColor = "#FF0000";
                        document.getElementById('val_rut').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.RUTNAVIERA.style.borderColor = "#4AF575";

                    if (DVNAVIERA == null || DVNAVIERA.length == 0 || /^\s+$/.test(DVNAVIERA)) {
                        document.form_reg_dato.DVNAVIERA.focus();
                        document.form_reg_dato.DVNAVIERA.style.borderColor = "#FF0000";
                        document.getElementById('val_dv').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DVNAVIERA.style.borderColor = "#4AF575";

                    if (NOMBRENAVIERA == null || NOMBRENAVIERA.length == 0 || /^\s+$/.test(NOMBRENAVIERA)) {
                        document.form_reg_dato.NOMBRENAVIERA.focus();
                        document.form_reg_dato.NOMBRENAVIERA.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBRENAVIERA.style.borderColor = "#4AF575";
                    /*
                    if (GIRONAVIERA == null || GIRONAVIERA.length == 0 || /^\s+$/.test(GIRONAVIERA)) {
                        document.form_reg_dato.GIRONAVIERA.focus();
                        document.form_reg_dato.GIRONAVIERA.style.borderColor = "#FF0000";
                        document.getElementById('val_giro').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.GIRONAVIERA.style.borderColor = "#4AF575";

                    if (RAZONSOCIALNAVIERA == null || RAZONSOCIALNAVIERA.length == 0 || /^\s+$/.test(RAZONSOCIALNAVIERA)) {
                        document.form_reg_dato.RAZONSOCIALNAVIERA.focus();
                        document.form_reg_dato.RAZONSOCIALNAVIERA.style.borderColor = "#FF0000";
                        document.getElementById('val_rsocial').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.RAZONSOCIALNAVIERA.style.borderColor = "#4AF575";
                    */

                    if (DIRRECIONNAVIERA == null || DIRRECIONNAVIERA.length == 0 || /^\s+$/.test(DIRRECIONNAVIERA)) {
                        document.form_reg_dato.DIRRECIONNAVIERA.focus();
                        document.form_reg_dato.DIRRECIONNAVIERA.style.borderColor = "#FF0000";
                        document.getElementById('val_dirrecion').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DIRRECIONNAVIERA.style.borderColor = "#4AF575";

                    /*
               

                    if (CONTACTONAVIERA == null || CONTACTONAVIERA.length == 0 || /^\s+$/.test(CONTACTONAVIERA)) {
                        document.form_reg_dato.CONTACTONAVIERA.focus();
                        document.form_reg_dato.CONTACTONAVIERA.style.borderColor = "#FF0000";
                        document.getElementById('val_contacto').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.CONTACTONAVIERA.style.borderColor = "#4AF575";


                    if (TELEFONONAVIERA == null || TELEFONONAVIERA == 0) {
                        document.form_reg_dato.TELEFONONAVIERA.focus();
                        document.form_reg_dato.TELEFONONAVIERA.style.borderColor = "#FF0000";
                        document.getElementById('val_telefono').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.TELEFONONAVIERA.style.borderColor = "#4AF575";

                    if (EMAILNAVIERA == null || EMAILNAVIERA.length == 0 || /^\s+$/.test(EMAILNAVIERA)) {
                        document.form_reg_dato.EMAILNAVIERA.focus();
                        document.form_reg_dato.EMAILNAVIERA.style.borderColor = "#FF0000";
                        document.getElementById('val_email').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.EMAILNAVIERA.style.borderColor = "#4AF575";

                    if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(EMAILNAVIERA))) {
                        document.form_reg_dato.EMAILNAVIERA.focus();
                        document.form_reg_dato.EMAILNAVIERA.style.borderColor = "#ff0000";
                        document.getElementById('val_email').innerHTML = "FORMATO DE CORREO INCORRECTO";
                        return false;
                    }
                    document.form_reg_dato.EMAILNAVIERA.style.borderColor = "#4AF575";

                    */


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
                                <h3 class="page-title">Transporte</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Mantenedores</li>
                                            <li class="breadcrumb-item" aria-current="page">Transporte</li>
                                            <li class="breadcrumb-item" aria-current="page">Maritimo</li>
                                            <li class="breadcrumb-item" aria-current="page">Naviera</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Registro Naviera </a> </li>
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
                                        <h4 class="box-title">Registro Naviera</h4>                                
                                    </div>
                                    <!-- /.box-header -->
                                    <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato">
                                        <div class="box-body">
                                            <hr class="my-15">
                                            <div class="row">
                                                 <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Rut </label>
                                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                        <input type="hidden" class="form-control" placeholder="EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                        <input type="text" class="form-control" placeholder="Rut Naviera" id="RUTNAVIERA" name="RUTNAVIERA" value="<?php echo $RUTNAVIERA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_rut" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 col-xs-2">
                                                    <div class="form-group">
                                                        <label>DV </label>
                                                        <input type="text" class="form-control" placeholder="DV Naviera" id="DVNAVIERA" name="DVNAVIERA" value="<?php echo $DVNAVIERA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_dv" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Nombre </label>
                                                        <input type="text" class="form-control" placeholder="Nombre Naviera" id="NOMBRENAVIERA" name="NOMBRENAVIERA" value="<?php echo $NOMBRENAVIERA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nombre" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Giro </label>
                                                        <input type="text" class="form-control" placeholder="Giro Naviera" id="GIRONAVIERA" name="GIRONAVIERA" value="<?php echo $GIRONAVIERA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_giro" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Razon Social </label>
                                                        <input type="text" class="form-control" placeholder="Razon Social Naviera" id="RAZONSOCIALNAVIERA" name="RAZONSOCIALNAVIERA" value="<?php echo $RAZONSOCIALNAVIERA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_rsocial" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Dirrecion </label>
                                                        <input type="text" class="form-control" placeholder="Dirrecion Naviera" id="DIRRECIONNAVIERA" name="DIRRECIONNAVIERA" value="<?php echo $DIRRECIONNAVIERA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_dirrecion" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Nota </label>
                                                        <textarea class="form-control" rows="1" placeholder="Nota Naviera " id="NOTANAVIERA" name="NOTANAVIERA" <?php echo $DISABLED; ?>><?php echo $NOTANAVIERA; ?></textarea>
                                                        <label id="val_nota" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <labe>Contacto</labe>
                                            <hr class="my-15">
                                            <div class="row">
                                                 <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Nombre </label>
                                                        <input type="text" class="form-control" placeholder="Nombre Contacto Naviera" id="CONTACTONAVIERA" name="CONTACTONAVIERA" value="<?php echo $CONTACTONAVIERA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_contacto" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Telefono </label>
                                                        <input type="number" class="form-control" placeholder="Telefono Contacto Naviera" id="TELEFONONAVIERA" name="TELEFONONAVIERA" value="<?php echo $TELEFONONAVIERA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_telefono" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Email </label>
                                                        <input type="text" class="form-control" placeholder="Email Contacto Naviera" id="EMAILNAVIERA" name="EMAILNAVIERA" value="<?php echo $EMAILNAVIERA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_email" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->                                                    
                                        <div class="box-footer">
                                            <div class="btn-group   col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12 " role="group" aria-label="Acciones generales">                                    
                                                <button type="button" class="btn  btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroNaviera.php');">
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
                                        <h4 class="box-title">Agrupado Naviera</h4>
                                    </div>
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <table id="listar" class="table-hover " style="width: 100%;">
                                                <thead>
                                                    <tr class="center">
                                                        <th>Numero </th>
                                                        <th>Operaciones</th>
                                                        <th>Rut </th>
                                                        <th>DV </th>
                                                        <th>Nombre </th>
                                                        <th>Giro </th>
                                                        <th>Razon Social </th>
                                                        <th>Dirrecion </th>
                                                        <th>Contacto </th>
                                                        <th>Telefono </th>
                                                        <th>Email </th>
                                                        <th>Nota </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYNAVIERA as $r) : ?>
                                                        <?php       
                                                            $CONTADOR+=1; 
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
                                                                                <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_NAVIERA']; ?>" />
                                                                                <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroNaviera" />
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
                                                            <td><?php echo $r['RUT_NAVIERA']; ?></td>  
                                                            <td><?php echo $r['DV_NAVIERA']; ?></td>  
                                                            <td><?php echo $r['NOMBRE_NAVIERA']; ?></td>  
                                                            <td><?php echo $r['GIRO_NAVIERA']; ?></td>  
                                                            <td><?php echo $r['RAZON_SOCIAL_NAVIERA']; ?></td>  
                                                            <td><?php echo $r['DIRECCION_NAVIERA']; ?></td>  
                                                            <td><?php echo $r['CONTACTO_NAVIERA']; ?></td>  
                                                            <td><?php echo $r['TELEFONO_NAVIERA']; ?></td>  
                                                            <td><?php echo $r['EMAIL_NAVIERA']; ?></td>  
                                                            <td><?php echo $r['NOTA_NAVIERA']; ?></td>  
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



                $ARRAYNUMERO = $NAVIERA_ADO->obtenerNumero($EMPRESAS);
                $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;


                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
                $NAVIERA->__SET('NUMERO_NAVIERA', $NUMERO);
                $NAVIERA->__SET('RUT_NAVIERA', $_REQUEST['RUTNAVIERA']);
                $NAVIERA->__SET('DV_NAVIERA', $_REQUEST['DVNAVIERA']);
                $NAVIERA->__SET('NOMBRE_NAVIERA', $_REQUEST['NOMBRENAVIERA']);
                $NAVIERA->__SET('GIRO_NAVIERA', $_REQUEST['GIRONAVIERA']);
                $NAVIERA->__SET('RAZON_SOCIAL_NAVIERA', $_REQUEST['RAZONSOCIALNAVIERA']);
                $NAVIERA->__SET('DIRECCION_NAVIERA', $_REQUEST['DIRRECIONNAVIERA']);
                $NAVIERA->__SET('CONTACTO_NAVIERA', $_REQUEST['CONTACTONAVIERA']);
                $NAVIERA->__SET('TELEFONO_NAVIERA', $_REQUEST['TELEFONONAVIERA']);
                $NAVIERA->__SET('EMAIL_NAVIERA', $_REQUEST['EMAILNAVIERA']);
                $NAVIERA->__SET('NOTA_NAVIERA', $_REQUEST['NOTANAVIERA']);
                $NAVIERA->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                $NAVIERA->__SET('ID_USUARIOI', $IDUSUARIOS);
                $NAVIERA->__SET('ID_USUARIOM', $IDUSUARIOS);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $NAVIERA_ADO->agregarNaviera($NAVIERA);

                $AUSUARIO_ADO->agregarAusuario2("NULL",3,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Naviera.","transporte_naviera","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );  

                //REDIRECCIONAR A PAGINA registroNaviera.php
                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Creado",
                        text:"El registro del mantenedor se ha creado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroNaviera.php";                            
                    })
                </script>';
            }
            //OPERACION DE EDICION DE FILA
            if (isset($_REQUEST['EDITAR'])) {
                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   



                $NAVIERA->__SET('RUT_NAVIERA', $_REQUEST['RUTNAVIERA']);
                $NAVIERA->__SET('DV_NAVIERA', $_REQUEST['DVNAVIERA']);
                $NAVIERA->__SET('NOMBRE_NAVIERA', $_REQUEST['NOMBRENAVIERA']);
                $NAVIERA->__SET('GIRO_NAVIERA', $_REQUEST['GIRONAVIERA']);
                $NAVIERA->__SET('RAZON_SOCIAL_NAVIERA', $_REQUEST['RAZONSOCIALNAVIERA']);
                $NAVIERA->__SET('DIRECCION_NAVIERA', $_REQUEST['DIRRECIONNAVIERA']);
                $NAVIERA->__SET('CONTACTO_NAVIERA', $_REQUEST['CONTACTONAVIERA']);
                $NAVIERA->__SET('TELEFONO_NAVIERA', $_REQUEST['TELEFONONAVIERA']);
                $NAVIERA->__SET('EMAIL_NAVIERA', $_REQUEST['EMAILNAVIERA']);
                $NAVIERA->__SET('NOTA_NAVIERA', $_REQUEST['NOTANAVIERA']);
                $NAVIERA->__SET('ID_USUARIOM', $IDUSUARIOS);
                $NAVIERA->__SET('ID_NAVIERA', $_REQUEST['ID']);
                //LLAMADA AL METODO DE EDICION DEL CONTROLADOR
                $NAVIERA_ADO->actualizarNaviera($NAVIERA);

                $AUSUARIO_ADO->agregarAusuario2("NULL",3,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de Naviera.","transporte_naviera", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );     

                //REDIRECCIONAR A PAGINA registroNaviera.php
                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Modificado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroNaviera.php";                            
                    })
                </script>';
            }
            
            if (isset($_REQUEST['ELIMINAR'])) {         
    
                $NAVIERA->__SET('ID_NAVIERA', $_REQUEST['ID']);
                $NAVIERA_ADO->deshabilitar($NAVIERA);
        
        
        

                $AUSUARIO_ADO->agregarAusuario2("NULL",3,4,"".$_SESSION["NOMBRE_USUARIO"].", Deshabilitar Naviera.","transporte_naviera", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );                
                
                echo '<script>
                    Swal.fire({
                        icon:"error",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Deshabilitado correctamente", 
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroNaviera.php";                            
                    })
                </script>';
            }
            
            if (isset($_REQUEST['HABILITAR'])) {   


                $NAVIERA->__SET('ID_NAVIERA', $_REQUEST['ID']);
                $NAVIERA_ADO->habilitar($NAVIERA);
                
                $AUSUARIO_ADO->agregarAusuario2("NULL",3,5,"".$_SESSION["NOMBRE_USUARIO"].", Habilitar Naviera.","transporte_naviera", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );                               

                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Habilitado correctamente", 
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroNaviera.php";                            
                    })
                </script>';
            }


        ?>
</body>

</html>