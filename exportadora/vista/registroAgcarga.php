<?php

include_once "../../assest/config/validarUsuarioExpo.php";


//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/COMUNA_ADO.php';

include_once '../../assest/controlador/AGCARGA_ADO.php';
include_once '../../assest/modelo/AGCARGA.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$COMUNA_ADO =  new COMUNA_ADO();

$AGCARGA_ADO =  new AGCARGA_ADO();
//INIICIALIZAR MODELO
$AGCARGA =  new AGCARGA();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$OP = "";
$DISABLED = "";

$RUTAGCARGA = "";
$DVAGCARGA = "";
$NOMBREAGCARGA = "";
$DIRECCIONAGCARGA = "";
$RAZONSOCIALAGCARGA = "";
$GIROAGCARGA = "";
$SAGAGCARGA = "";
$CONTACTOAGCARGA = "";
$TELEFONOAGCARGA = "";
$EMAILAGCARGA = "";
$COMUNA = "";
$CONTADOR=0;



$SINO = "";


//INICIALIZAR ARREGLOS
$ARRAYAGCARGA = "";
$ARRAYAGCARGAID = "";
$ARRAYCOMUNA = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYAGCARGA = $AGCARGA_ADO->listarAgcargaPorEmpresaCBX($EMPRESAS);
$ARRAYCOMUNA = $COMUNA_ADO->listarComuna3CBX();
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
        $ARRAYAGCARGAID = $AGCARGA_ADO->verAgcarga($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYAGCARGAID as $r) :
            $RUTAGCARGA = "" . $r['RUT_AGCARGA'];
            $DVAGCARGA = "" . $r['DV_AGCARGA'];
            $NOMBREAGCARGA = "" . $r['NOMBRE_AGCARGA'];
            $RAZONSOCIALAGCARGA = "" . $r['RAZON_SOCIAL_AGCARGA'];
            $GIROAGCARGA = "" . $r['GIRO_AGCARGA'];
            $SAGAGCARGA = "" . $r['CODIGO_SAG_AGCARGA'];
            $DIRECCIONAGCARGA = "" . $r['DIRECCION_AGCARGA'];
            $CONTACTOAGCARGA = "" . $r['CONTACTO_AGCARGA'];
            $TELEFONOAGCARGA = "" . $r['TELEFONO_AGCARGA'];
            $EMAILAGCARGA = "" . $r['EMAIL_AGCARGA'];
            $COMUNA = "" . $r['ID_COMUNA'];
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
        $ARRAYAGCARGAID = $AGCARGA_ADO->verAgcarga($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYAGCARGAID as $r) :
            $RUTAGCARGA = "" . $r['RUT_AGCARGA'];
            $DVAGCARGA = "" . $r['DV_AGCARGA'];
            $NOMBREAGCARGA = "" . $r['NOMBRE_AGCARGA'];
            $RAZONSOCIALAGCARGA = "" . $r['RAZON_SOCIAL_AGCARGA'];
            $GIROAGCARGA = "" . $r['GIRO_AGCARGA'];
            $SAGAGCARGA = "" . $r['CODIGO_SAG_AGCARGA'];
            $DIRECCIONAGCARGA = "" . $r['DIRECCION_AGCARGA'];
            $CONTACTOAGCARGA = "" . $r['CONTACTO_AGCARGA'];
            $TELEFONOAGCARGA = "" . $r['TELEFONO_AGCARGA'];
            $EMAILAGCARGA = "" . $r['EMAIL_AGCARGA'];
            $COMUNA = "" . $r['ID_COMUNA'];
        endforeach;

    }

    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {

        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYAGCARGAID = $AGCARGA_ADO->verAgcarga($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYAGCARGAID as $r) :


            $RUTAGCARGA = "" . $r['RUT_AGCARGA'];
            $DVAGCARGA = "" . $r['DV_AGCARGA'];
            $NOMBREAGCARGA = "" . $r['NOMBRE_AGCARGA'];
            $RAZONSOCIALAGCARGA = "" . $r['RAZON_SOCIAL_AGCARGA'];
            $GIROAGCARGA = "" . $r['GIRO_AGCARGA'];
            $SAGAGCARGA = "" . $r['CODIGO_SAG_AGCARGA'];
            $DIRECCIONAGCARGA = "" . $r['DIRECCION_AGCARGA'];
            $CONTACTOAGCARGA = "" . $r['CONTACTO_AGCARGA'];
            $TELEFONOAGCARGA = "" . $r['TELEFONO_AGCARGA'];
            $EMAILAGCARGA = "" . $r['EMAIL_AGCARGA'];
            $COMUNA = "" . $r['ID_COMUNA'];

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
        $ARRAYAGCARGAID = $AGCARGA_ADO->verAgcarga($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYAGCARGAID as $r) :
            $RUTAGCARGA = "" . $r['RUT_AGCARGA'];
            $DVAGCARGA = "" . $r['DV_AGCARGA'];
            $NOMBREAGCARGA = "" . $r['NOMBRE_AGCARGA'];
            $RAZONSOCIALAGCARGA = "" . $r['RAZON_SOCIAL_AGCARGA'];
            $GIROAGCARGA = "" . $r['GIRO_AGCARGA'];
            $SAGAGCARGA = "" . $r['CODIGO_SAG_AGCARGA'];
            $DIRECCIONAGCARGA = "" . $r['DIRECCION_AGCARGA'];
            $CONTACTOAGCARGA = "" . $r['CONTACTO_AGCARGA'];
            $TELEFONOAGCARGA = "" . $r['TELEFONO_AGCARGA'];
            $EMAILAGCARGA = "" . $r['EMAIL_AGCARGA'];
            $COMUNA = "" . $r['ID_COMUNA'];
        endforeach;
    }
}



?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Agente Carga</title>
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

                    RUTAGCARGA = document.getElementById("RUTAGCARGA").value;
                    DVAGCARGA = document.getElementById("DVAGCARGA").value;
                    NOMBREAGCARGA = document.getElementById("NOMBREAGCARGA").value;
                    RAZONSOCIALAGCARGA = document.getElementById("RAZONSOCIALAGCARGA").value;
                    GIROAGCARGA = document.getElementById("GIROAGCARGA").value;
                    SAGAGCARGA = document.getElementById("SAGAGCARGA").value;
                    DIRECCIONAGCARGA = document.getElementById("DIRECCIONAGCARGA").value;
                    COMUNA = document.getElementById("COMUNA").selectedIndex;
                    CONTACTOAGCARGA = document.getElementById("CONTACTOAGCARGA").value;
                    TELEFONOAGCARGA = document.getElementById("TELEFONOAGCARGA").value;
                    EMAILAGCARGA = document.getElementById("EMAILAGCARGA").value;


                    document.getElementById('val_rut').innerHTML = "";
                    document.getElementById('val_dv').innerHTML = "";
                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_rsocial').innerHTML = "";
                    document.getElementById('val_giro').innerHTML = "";
                    document.getElementById('val_sag').innerHTML = "";
                    document.getElementById('val_direccion').innerHTML = "";
                    document.getElementById('val_comuna').innerHTML = "";
                    document.getElementById('val_contacto').innerHTML = "";
                    document.getElementById('val_telefono').innerHTML = "";
                    document.getElementById('val_email').innerHTML = "";

                    if (RUTAGCARGA == null || RUTAGCARGA.length == 0 || /^\s+$/.test(RUTAGCARGA)) {
                        document.form_reg_dato.RUTAGCARGA.focus();
                        document.form_reg_dato.RUTAGCARGA.style.borderColor = "#FF0000";
                        document.getElementById('val_rut').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.RUTAGCARGA.style.borderColor = "#4AF575";

                    if (DVAGCARGA == null || DVAGCARGA.length == 0 || /^\s+$/.test(DVAGCARGA)) {
                        document.form_reg_dato.DVAGCARGA.focus();
                        document.form_reg_dato.DVAGCARGA.style.borderColor = "#FF0000";
                        document.getElementById('val_dv').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DVAGCARGA.style.borderColor = "#4AF575";


                    if (NOMBREAGCARGA == null || NOMBREAGCARGA.length == 0 || /^\s+$/.test(NOMBREAGCARGA)) {
                        document.form_reg_dato.NOMBREAGCARGA.focus();
                        document.form_reg_dato.NOMBREAGCARGA.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBREAGCARGA.style.borderColor = "#4AF575";

                    /*
                    if (RAZONSOCIALAGCARGA == null || RAZONSOCIALAGCARGA.length == 0 || /^\s+$/.test(RAZONSOCIALAGCARGA)) {
                        document.form_reg_dato.RAZONSOCIALAGCARGA.focus();
                        document.form_reg_dato.RAZONSOCIALAGCARGA.style.borderColor = "#FF0000";
                        document.getElementById('val_rsocial').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.RAZONSOCIALAGCARGA.style.borderColor = "#4AF575";


                    if (GIROAGCARGA == null || GIROAGCARGA.length == 0 || /^\s+$/.test(GIROAGCARGA)) {
                        document.form_reg_dato.GIROAGCARGA.focus();
                        document.form_reg_dato.GIROAGCARGA.style.borderColor = "#FF0000";
                        document.getElementById('val_giro').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.GIROAGCARGA.style.borderColor = "#4AF575";
                    */


                    if (SAGAGCARGA == null || SAGAGCARGA == 0) {
                        document.form_reg_dato.SAGAGCARGA.focus();
                        document.form_reg_dato.SAGAGCARGA.style.borderColor = "#FF0000";
                        document.getElementById('val_sag').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.SAGAGCARGA.style.borderColor = "#4AF575";


                    if (DIRECCIONAGCARGA == null || DIRECCIONAGCARGA.length == 0 || /^\s+$/.test(DIRECCIONAGCARGA)) {
                        document.form_reg_dato.DIRECCIONAGCARGA.focus();
                        document.form_reg_dato.DIRECCIONAGCARGA.style.borderColor = "#FF0000";
                        document.getElementById('val_direccion').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DIRECCIONAGCARGA.style.borderColor = "#4AF575";

                
                        if (COMUNA == null || COMUNA == 0) {
                            document.form_reg_dato.COMUNA.focus();
                            document.form_reg_dato.COMUNA.style.borderColor = "#FF0000";
                            document.getElementById('val_comuna').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                            return false;
                        }
                        document.form_reg_dato.COMUNA.style.borderColor = "#4AF575";

    /*

                        if (CONTACTOAGCARGA == null || CONTACTOAGCARGA.length == 0 || /^\s+$/.test(CONTACTOAGCARGA)) {
                            document.form_reg_dato.CONTACTOAGCARGA.focus();
                            document.form_reg_dato.CONTACTOAGCARGA.style.borderColor = "#FF0000";
                            document.getElementById('val_contacto').innerHTML = "NO A INGRESADO DATO";
                            return false;
                        }
                        document.form_reg_dato.CONTACTOAGCARGA.style.borderColor = "#4AF575";


                        if (TELEFONOAGCARGA == null || TELEFONOAGCARGA == 0) {
                            document.form_reg_dato.TELEFONOAGCARGA.focus();
                            document.form_reg_dato.TELEFONOAGCARGA.style.borderColor = "#FF0000";
                            document.getElementById('val_telefono').innerHTML = "NO A INGRESADO DATO";
                            return false;
                        }
                        document.form_reg_dato.TELEFONOAGCARGA.style.borderColor = "#4AF575";


                        if (EMAILAGCARGA == null || EMAILAGCARGA.length == 0 || /^\s+$/.test(EMAILAGCARGA)) {
                            document.form_reg_dato.EMAILAGCARGA.focus();
                            document.form_reg_dato.EMAILAGCARGA.style.borderColor = "#FF0000";
                            document.getElementById('val_email').innerHTML = "NO A INGRESADO DATO";
                            return false;
                        }
                        document.form_reg_dato.EMAILAGCARGA.style.borderColor = "#4AF575";


                        if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
                                .test(EMAILAGCARGA))) {
                            document.form_reg_dato.EMAILAGCARGA.focus();
                            document.form_reg_dato.EMAILAGCARGA.style.borderColor = "#ff0000";
                            document.getElementById('val_email').innerHTML = "FORMATO DE CORREO INCORRECTO";
                            return false;
                        }
                        document.form_reg_dato.EMAILAGCARGA.style.borderColor = "#4AF575";
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
                                <h3 class="page-title">Instructivo </h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Mantenedores</li>
                                            <li class="breadcrumb-item" aria-current="page">Instructivo</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Registro Agente Carga</a> </li>
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
                                        <h4 class="box-title">Registro Agente Carga</h4>                                
                                    </div>
                                    <!-- /.box-header -->
                                    <form class="form" role="form" method="post" name="form_reg_dato" name="form_reg_dato" enctype="multipart/form-data">
                                        <div class="box-body">
                                            <hr class="my-15">
                                            <div class="row">
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Rut </label>
                                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                        <input type="hidden" class="form-control" placeholder="EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                        <input type="text" class="form-control" placeholder="Rut Agente Carga" id="RUTAGCARGA" name="RUTAGCARGA" value="<?php echo $RUTAGCARGA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_rut" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 col-xs-2">
                                                    <div class="form-group">
                                                        <label>DV </label>
                                                        <input type="text" class="form-control" placeholder="DV Agente Carga" id="DVAGCARGA" name="DVAGCARGA" value="<?php echo $DVAGCARGA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_dv" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Nombre </label>
                                                        <input type="text" class="form-control" placeholder="Nombre Agente Carga" id="NOMBREAGCARGA" name="NOMBREAGCARGA" value="<?php echo $NOMBREAGCARGA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nombre" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Razon social </label>
                                                        <input type="text" class="form-control" placeholder="Razon social Agente Carga" id="RAZONSOCIALAGCARGA" name="RAZONSOCIALAGCARGA" value="<?php echo $RAZONSOCIALAGCARGA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_rsocial" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Giro </label>
                                                        <input type="text" class="form-control" placeholder="Giro Agente Carga" id="GIROAGCARGA" name="GIROAGCARGA" value="<?php echo $GIROAGCARGA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_giro" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Codigo Sag </label>
                                                        <input type="number" class="form-control" placeholder="Codigo Sag Agente Carga" id="SAGAGCARGA" name="SAGAGCARGA" value="<?php echo $SAGAGCARGA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_sag" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Direccion </label>
                                                        <input type="text" class="form-control" placeholder="Direccion Agente Carga" id="DIRECCIONAGCARGA" name="DIRECCIONAGCARGA" value="<?php echo $DIRECCIONAGCARGA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_direccion" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
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
                                            </div>
                                            <label>Contacto </label>
                                            <hr class="my-15">
                                            <div class="row">
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Contacto </label>
                                                        <input type="text" class="form-control" placeholder="Nombre Contacto Agente Carga" id="CONTACTOAGCARGA" name="CONTACTOAGCARGA" value="<?php echo $CONTACTOAGCARGA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_contacto" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Telefono </label>
                                                        <input type="number" class="form-control" placeholder="Telefono Contacto Agente Carga" id="TELEFONOAGCARGA" name="TELEFONOAGCARGA" value="<?php echo $TELEFONOAGCARGA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_telefono" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Email </label>
                                                        <input type="text" class="form-control" placeholder="Email Contacto Agente Carga" id="EMAILAGCARGA" name="EMAILAGCARGA" value="<?php echo $EMAILAGCARGA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_email" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <div class="btn-group   col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12 " role="group" aria-label="Acciones generales">                                    
                                                <button type="button" class="btn  btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroAgcarga.php');">
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
                                        <h4 class="box-title"> Agrupado Agente Carga</h4>
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
                                                        <th>Razon Social </th>
                                                        <th>Giro </th>
                                                        <th>Codigo SAG </th>
                                                        <th>Direccion </th>
                                                        <th>Comuna </th>
                                                        <th>Contacto </th>
                                                        <th>Email </th>
                                                        <th>Telefono </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYAGCARGA as $r) : ?>                                          
                                                        <?php   $CONTADOR+=1;
                                                            $ARRAYVERCOMUNA=$COMUNA_ADO->verComuna($r["ID_COMUNA"]);
                                                            if($ARRAYVERCOMUNA){
                                                                $NOMBRECOMUNA = $ARRAYVERCOMUNA[0]["NOMBRE_COMUNA"];
                                                            }else{
                                                                $NOMBRECOMUNA="Sin Datos";
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
                                                                                <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_AGCARGA']; ?>" />
                                                                                <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroAgcarga" />
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
                                                            <td><?php echo $r['RUT_AGCARGA']; ?></td>  
                                                            <td><?php echo $r['DV_AGCARGA']; ?></td>  
                                                            <td><?php echo $r['NOMBRE_AGCARGA']; ?></td>    
                                                            <td><?php echo $r['RAZON_SOCIAL_AGCARGA']; ?></td>   
                                                            <td><?php echo $r['GIRO_AGCARGA']; ?></td>   
                                                            <td><?php echo $r['CODIGO_SAG_AGCARGA']; ?></td>   
                                                            <td><?php echo $r['DIRECCION_AGCARGA']; ?></td>        
                                                            <td><?php echo $NOMBRECOMUNA; ?></td>                                                                 
                                                            <td><?php echo $r['CONTACTO_AGCARGA']; ?></td>   
                                                            <td><?php echo $r['EMAIL_AGCARGA']; ?></td>      
                                                            <td><?php echo $r['TELEFONO_AGCARGA']; ?></td>     
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

                $ARRAYNUMERO = $AGCARGA_ADO->obtenerNumero($EMPRESAS);
                $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;


                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
                $AGCARGA->__SET('NUMERO_AGCARGA', $NUMERO);
                $AGCARGA->__SET('RUT_AGCARGA', $_REQUEST['RUTAGCARGA']);
                $AGCARGA->__SET('DV_AGCARGA', $_REQUEST['DVAGCARGA']);
                $AGCARGA->__SET('NOMBRE_AGCARGA', $_REQUEST['NOMBREAGCARGA']);
                $AGCARGA->__SET('RAZON_SOCIAL_AGCARGA', $_REQUEST['RAZONSOCIALAGCARGA']);
                $AGCARGA->__SET('GIRO_AGCARGA', $_REQUEST['GIROAGCARGA']);
                $AGCARGA->__SET('CODIGO_SAG_AGCARGA', $_REQUEST['SAGAGCARGA']);
                $AGCARGA->__SET('DIRECCION_AGCARGA', $_REQUEST['DIRECCIONAGCARGA']);
                $AGCARGA->__SET('CONTACTO_AGCARGA', $_REQUEST['CONTACTOAGCARGA']);
                $AGCARGA->__SET('TELEFONO_AGCARGA', $_REQUEST['TELEFONOAGCARGA']);
                $AGCARGA->__SET('EMAIL_AGCARGA', $_REQUEST['EMAILAGCARGA']);
                $AGCARGA->__SET('ID_COMUNA', $_REQUEST['COMUNA']);
                $AGCARGA->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                $AGCARGA->__SET('ID_USUARIOI', $IDUSUARIOS);
                $AGCARGA->__SET('ID_USUARIOM', $IDUSUARIOS);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $AGCARGA_ADO->agregarAgcarga($AGCARGA);

                $AUSUARIO_ADO->agregarAusuario2("NULL",3,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Agente Carga.","fruta_agcarga","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );  
                
                //REDIRECCIONAR A PAGINA registroAgcarga.php
                                    echo '<script>
                                    Swal.fire({
                                        icon:"success",
                                        title:"Registro Creado",
                                        text:"El registro del mantenedor se ha creado correctamente",
                                        showConfirmButton: true,
                                        confirmButtonText:"Cerrar",
                                        closeOnConfirm:false
                                    }).then((result)=>{
                                        location.href = "registroAgcarga.php";                            
                                    })
                                </script>';
            }
            //OPERACION EDICION DE FILA
            if (isset($_REQUEST['EDITAR'])) {
                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO  
                $AGCARGA->__SET('RUT_AGCARGA', $_REQUEST['RUTAGCARGA']);
                $AGCARGA->__SET('DV_AGCARGA', $_REQUEST['DVAGCARGA']);
                $AGCARGA->__SET('NOMBRE_AGCARGA', $_REQUEST['NOMBREAGCARGA']);
                $AGCARGA->__SET('RAZON_SOCIAL_AGCARGA', $_REQUEST['RAZONSOCIALAGCARGA']);
                $AGCARGA->__SET('GIRO_AGCARGA', $_REQUEST['GIROAGCARGA']);
                $AGCARGA->__SET('CODIGO_SAG_AGCARGA', $_REQUEST['SAGAGCARGA']);
                $AGCARGA->__SET('DIRECCION_AGCARGA', $_REQUEST['DIRECCIONAGCARGA']);
                $AGCARGA->__SET('CONTACTO_AGCARGA', $_REQUEST['CONTACTOAGCARGA']);
                $AGCARGA->__SET('TELEFONO_AGCARGA', $_REQUEST['TELEFONOAGCARGA']);
                $AGCARGA->__SET('EMAIL_AGCARGA', $_REQUEST['EMAILAGCARGA']);
                $AGCARGA->__SET('ID_COMUNA', $_REQUEST['COMUNA']);
                $AGCARGA->__SET('ID_USUARIOM', $IDUSUARIOS);
                $AGCARGA->__SET('ID_AGCARGA', $_REQUEST['ID']);
                //LLAMADA AL METODO DE EDICION DEL CONTROLADOR
                $AGCARGA_ADO->actualizarAgcarga($AGCARGA);

                $AUSUARIO_ADO->agregarAusuario2("NULL",3,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de Agente Carga.","fruta_agcarga", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );     

                //REDIRECCIONAR A PAGINA registroAgcarga.php
                                echo '<script>
                                Swal.fire({
                                    icon:"success",
                                    title:"Registro Modificado",
                                    text:"El registro del mantenedor se ha Modificado correctamente",
                                    showConfirmButton: true,
                                    confirmButtonText:"Cerrar",
                                    closeOnConfirm:false
                                }).then((result)=>{
                                    location.href = "registroAgcarga.php";                            
                                })
                            </script>';
            }
            if (isset($_REQUEST['ELIMINAR'])) {
                
                $AGCARGA->__SET('ID_AGCARGA', $_REQUEST['ID']);
                $AGCARGA_ADO->deshabilitar($AGCARGA);                

                $AUSUARIO_ADO->agregarAusuario2("NULL",3,4,"".$_SESSION["NOMBRE_USUARIO"].", Deshabilitar Agente Carga.","fruta_agcarga", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );                
                
                echo '<script>
                    Swal.fire({
                        icon:"error",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Deshabilitado correctamente", 
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroAgcarga.php";                            
                    })
                </script>';
            }
            
            if (isset($_REQUEST['HABILITAR'])) {       


                $AGCARGA->__SET('ID_AGCARGA', $_REQUEST['ID']);
                $AGCARGA_ADO->habilitar($AGCARGA);    

                $AUSUARIO_ADO->agregarAusuario2("NULL",3,5,"".$_SESSION["NOMBRE_USUARIO"].", Habilitar Agente Carga.","fruta_agcarga", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );                               

                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Habilitado correctamente", 
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroAgcarga.php";                            
                    })
                </script>';
            }
        ?>
</body>

</html>