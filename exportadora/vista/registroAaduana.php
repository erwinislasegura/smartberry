<?php

include_once "../../assest/config/validarUsuarioExpo.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/COMUNA_ADO.php';

include_once '../../assest/controlador/AADUANA_ADO.php';
include_once '../../assest/modelo/AADUANA.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$COMUNA_ADO =  new COMUNA_ADO();

$AADUANA_ADO =  new AADUANA_ADO();
//INIICIALIZAR MODELO
$AADUANA =  new AADUANA();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$OP = "";
$DISABLED = "";

$RUTAADUANA = "";
$DVAADUANA = "";
$NOMBREAADUANA = "";
$DIRECCIONAADUANA = "";
$RAZONSOCIALAADUANA = "";
$GIROAADUANA = "";
$CONTACTOAADUANA = "";
$TELEFONOAADUANA = "";
$EMAILAADUANA = "";
$COMUNA = "";
$CONTADOR=0;



$SINO = "";


//INICIALIZAR ARREGLOS
$ARRAYAADUANA = "";
$ARRAYAADUANAID = "";
$ARRAYCOMUNA = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYAADUANA = $AADUANA_ADO->listarAaduanaPorEmpresaCBX($EMPRESAS);
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
        $ARRAYAADUANAID = $AADUANA_ADO->verAaduana($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYAADUANAID as $r) :
            $RUTAADUANA = "" . $r['RUT_AADUANA'];
            $DVAADUANA = "" . $r['DV_AADUANA'];
            $NOMBREAADUANA = "" . $r['NOMBRE_AADUANA'];
            $RAZONSOCIALAADUANA = "" . $r['RAZON_SOCIAL_AADUANA'];
            $GIROAADUANA = "" . $r['GIRO_AADUANA'];
            $DIRECCIONAADUANA = "" . $r['DIRECCION_AADUANA'];
            $CONTACTOAADUANA = "" . $r['CONTACTO_AADUANA'];
            $TELEFONOAADUANA = "" . $r['TELEFONO_AADUANA'];
            $EMAILAADUANA = "" . $r['EMAIL_AADUANA'];
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
        $ARRAYAADUANAID = $AADUANA_ADO->verAaduana($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYAADUANAID as $r) :
            $RUTAADUANA = "" . $r['RUT_AADUANA'];
            $DVAADUANA = "" . $r['DV_AADUANA'];
            $NOMBREAADUANA = "" . $r['NOMBRE_AADUANA'];
            $RAZONSOCIALAADUANA = "" . $r['RAZON_SOCIAL_AADUANA'];
            $GIROAADUANA = "" . $r['GIRO_AADUANA'];
            $DIRECCIONAADUANA = "" . $r['DIRECCION_AADUANA'];
            $CONTACTOAADUANA = "" . $r['CONTACTO_AADUANA'];
            $TELEFONOAADUANA = "" . $r['TELEFONO_AADUANA'];
            $EMAILAADUANA = "" . $r['EMAIL_AADUANA'];
            $COMUNA = "" . $r['ID_COMUNA'];
        endforeach;

    }

    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {

        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYAADUANAID = $AADUANA_ADO->verAaduana($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYAADUANAID as $r) :


            $RUTAADUANA = "" . $r['RUT_AADUANA'];
            $DVAADUANA = "" . $r['DV_AADUANA'];
            $NOMBREAADUANA = "" . $r['NOMBRE_AADUANA'];
            $RAZONSOCIALAADUANA = "" . $r['RAZON_SOCIAL_AADUANA'];
            $GIROAADUANA = "" . $r['GIRO_AADUANA'];
            $DIRECCIONAADUANA = "" . $r['DIRECCION_AADUANA'];
            $CONTACTOAADUANA = "" . $r['CONTACTO_AADUANA'];
            $TELEFONOAADUANA = "" . $r['TELEFONO_AADUANA'];
            $EMAILAADUANA = "" . $r['EMAIL_AADUANA'];
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
        $ARRAYAADUANAID = $AADUANA_ADO->verAaduana($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYAADUANAID as $r) :
            $RUTAADUANA = "" . $r['RUT_AADUANA'];
            $DVAADUANA = "" . $r['DV_AADUANA'];
            $NOMBREAADUANA = "" . $r['NOMBRE_AADUANA'];
            $RAZONSOCIALAADUANA = "" . $r['RAZON_SOCIAL_AADUANA'];
            $GIROAADUANA = "" . $r['GIRO_AADUANA'];
            $DIRECCIONAADUANA = "" . $r['DIRECCION_AADUANA'];
            $CONTACTOAADUANA = "" . $r['CONTACTO_AADUANA'];
            $TELEFONOAADUANA = "" . $r['TELEFONO_AADUANA'];
            $EMAILAADUANA = "" . $r['EMAIL_AADUANA'];
            $COMUNA = "" . $r['ID_COMUNA'];
        endforeach;
    }
}



?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Agente Aduana</title>
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




                    RUTAADUANA = document.getElementById("RUTAADUANA").value;
                    DVAADUANA = document.getElementById("DVAADUANA").value;
                    NOMBREAADUANA = document.getElementById("NOMBREAADUANA").value;


                    RAZONSOCIALAADUANA = document.getElementById("RAZONSOCIALAADUANA").value;
                    GIROAADUANA = document.getElementById("GIROAADUANA").value;

                    DIRECCIONAADUANA = document.getElementById("DIRECCIONAADUANA").value;
                    COMUNA = document.getElementById("COMUNA").selectedIndex;
                    CONTACTOAADUANA = document.getElementById("CONTACTOAADUANA").value;
                    TELEFONOAADUANA = document.getElementById("TELEFONOAADUANA").value;
                    EMAILAADUANA = document.getElementById("EMAILAADUANA").value;


                    document.getElementById('val_rut').innerHTML = "";
                    document.getElementById('val_dv').innerHTML = "";
                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_rsocial').innerHTML = "";
                    document.getElementById('val_giro').innerHTML = "";
                    document.getElementById('val_direccion').innerHTML = "";
                    document.getElementById('val_comuna').innerHTML = "";
                    document.getElementById('val_contacto').innerHTML = "";
                    document.getElementById('val_telefono').innerHTML = "";
                    document.getElementById('val_email').innerHTML = "";

                    if (RUTAADUANA == null || RUTAADUANA.length == 0 || /^\s+$/.test(RUTAADUANA)) {
                        document.form_reg_dato.RUTAADUANA.focus();
                        document.form_reg_dato.RUTAADUANA.style.borderColor = "#FF0000";
                        document.getElementById('val_rut').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.RUTAADUANA.style.borderColor = "#4AF575";

                    if (DVAADUANA == null || DVAADUANA.length == 0 || /^\s+$/.test(DVAADUANA)) {
                        document.form_reg_dato.DVAADUANA.focus();
                        document.form_reg_dato.DVAADUANA.style.borderColor = "#FF0000";
                        document.getElementById('val_dv').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DVAADUANA.style.borderColor = "#4AF575";

                    if (NOMBREAADUANA == null || NOMBREAADUANA.length == 0 || /^\s+$/.test(NOMBREAADUANA)) {
                        document.form_reg_dato.NOMBREAADUANA.focus();
                        document.form_reg_dato.NOMBREAADUANA.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBREAADUANA.style.borderColor = "#4AF575";
                    /*

                    if (RAZONSOCIALAADUANA == null || RAZONSOCIALAADUANA.length == 0 || /^\s+$/.test(RAZONSOCIALAADUANA)) {
                        document.form_reg_dato.RAZONSOCIALAADUANA.focus();
                        document.form_reg_dato.RAZONSOCIALAADUANA.style.borderColor = "#FF0000";
                        document.getElementById('val_rsocial').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.RAZONSOCIALAADUANA.style.borderColor = "#4AF575";


                    if (GIROAADUANA == null || GIROAADUANA.length == 0 || /^\s+$/.test(GIROAADUANA)) {
                        document.form_reg_dato.GIROAADUANA.focus();
                        document.form_reg_dato.GIROAADUANA.style.borderColor = "#FF0000";
                        document.getElementById('val_giro').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.GIROAADUANA.style.borderColor = "#4AF575";
                    */
                    if (DIRECCIONAADUANA == null || DIRECCIONAADUANA.length == 0 || /^\s+$/.test(DIRECCIONAADUANA)) {
                        document.form_reg_dato.DIRECCIONAADUANA.focus();
                        document.form_reg_dato.DIRECCIONAADUANA.style.borderColor = "#FF0000";
                        document.getElementById('val_direccion').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DIRECCIONAADUANA.style.borderColor = "#4AF575";
                
                        if (COMUNA == null || COMUNA == 0) {
                            document.form_reg_dato.COMUNA.focus();
                            document.form_reg_dato.COMUNA.style.borderColor = "#FF0000";
                            document.getElementById('val_comuna').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                            return false;
                        }
                        document.form_reg_dato.COMUNA.style.borderColor = "#4AF575";
    /*


                        if (CONTACTOAADUANA == null || CONTACTOAADUANA.length == 0 || /^\s+$/.test(CONTACTOAADUANA)) {
                            document.form_reg_dato.CONTACTOAADUANA.focus();
                            document.form_reg_dato.CONTACTOAADUANA.style.borderColor = "#FF0000";
                            document.getElementById('val_contacto').innerHTML = "NO A INGRESADO DATO";
                            return false;
                        }
                        document.form_reg_dato.CONTACTOAADUANA.style.borderColor = "#4AF575";


                        if (TELEFONOAADUANA == null || TELEFONOAADUANA == 0) {
                            document.form_reg_dato.TELEFONOAADUANA.focus();
                            document.form_reg_dato.TELEFONOAADUANA.style.borderColor = "#FF0000";
                            document.getElementById('val_telefono').innerHTML = "NO A INGRESADO DATO";
                            return false;
                        }
                        document.form_reg_dato.TELEFONOAADUANA.style.borderColor = "#4AF575";


                        if (EMAILAADUANA == null || EMAILAADUANA.length == 0 || /^\s+$/.test(EMAILAADUANA)) {
                            document.form_reg_dato.EMAILAADUANA.focus();
                            document.form_reg_dato.EMAILAADUANA.style.borderColor = "#FF0000";
                            document.getElementById('val_email').innerHTML = "NO A INGRESADO DATO";
                            return false;
                        }
                        document.form_reg_dato.EMAILAADUANA.style.borderColor = "#4AF575";


                        if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
                                .test(EMAILAADUANA))) {
                            document.form_reg_dato.EMAILAADUANA.focus();
                            document.form_reg_dato.EMAILAADUANA.style.borderColor = "#ff0000";
                            document.getElementById('val_email').innerHTML = "FORMATO DE CORREO INCORRECTO";
                            return false;
                        }
                        document.form_reg_dato.EMAILAADUANA.style.borderColor = "#4AF575";
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
                                <h3 class="page-title">Instructivo</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Mantenedores</li>
                                            <li class="breadcrumb-item" aria-current="page">Instructivo</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="$"> Registro Agente Aduana</a> </li>
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
                                        <h4 class="box-title">Registro Agente Aduana</h4>                                
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
                                                        <input type="text" class="form-control" placeholder="Rut Agente Aduana" id="RUTAADUANA" name="RUTAADUANA" value="<?php echo $RUTAADUANA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_rut" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 col-xs-2">
                                                    <div class="form-group">
                                                        <label>DV </label>
                                                        <input type="text" class="form-control" placeholder="DV Agente Aduana" id="DVAADUANA" name="DVAADUANA" value="<?php echo $DVAADUANA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_dv" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Nombre </label>
                                                        <input type="text" class="form-control" placeholder="Nombre Agente Aduana" id="NOMBREAADUANA" name="NOMBREAADUANA" value="<?php echo $NOMBREAADUANA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nombre" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Razon social </label>
                                                        <input type="text" class="form-control" placeholder="Razon social Agente Aduana" id="RAZONSOCIALAADUANA" name="RAZONSOCIALAADUANA" value="<?php echo $RAZONSOCIALAADUANA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_rsocial" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Giro </label>
                                                        <input type="text" class="form-control" placeholder="Giro Agente Aduana" id="GIROAADUANA" name="GIROAADUANA" value="<?php echo $GIROAADUANA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_giro" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Direccion </label>
                                                        <input type="text" class="form-control" placeholder="Direccion Agente Aduana" id="DIRECCIONAADUANA" name="DIRECCIONAADUANA" value="<?php echo $DIRECCIONAADUANA; ?>" <?php echo $DISABLED; ?> />
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
                                                        <input type="text" class="form-control" placeholder="Nombre Contacto Agente Aduana" id="CONTACTOAADUANA" name="CONTACTOAADUANA" value="<?php echo $CONTACTOAADUANA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_contacto" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Telefono </label>
                                                        <input type="number" class="form-control" placeholder="Telefono Contacto Agente Aduana" id="TELEFONOAADUANA" name="TELEFONOAADUANA" value="<?php echo $TELEFONOAADUANA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_telefono" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Email </label>
                                                        <input type="text" class="form-control" placeholder="Email Contacto Agente Aduana" id="EMAILAADUANA" name="EMAILAADUANA" value="<?php echo $EMAILAADUANA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_email" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <div class="btn-group   col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12 " role="group" aria-label="Acciones generales">                                    
                                                <button type="button" class="btn  btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroAaduana.php');">
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
                                        <h4 class="box-title"> Agrupado Agente Aduana</h4>
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
                                                        <th>Direccion </th>
                                                        <th>Comuna </th>
                                                        <th>Contacto </th>
                                                        <th>Email </th>
                                                        <th>Telefono </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYAADUANA as $r) : ?>                              
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
                                                                                <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_AADUANA']; ?>" />
                                                                                <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroAaduana" />
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
                                                            <td><?php echo $r['RUT_AADUANA']; ?></td>  
                                                            <td><?php echo $r['DV_AADUANA']; ?></td>  
                                                            <td><?php echo $r['NOMBRE_AADUANA']; ?></td>    
                                                            <td><?php echo $r['RAZON_SOCIAL_AADUANA']; ?></td>   
                                                            <td><?php echo $r['GIRO_AADUANA']; ?></td>   
                                                            <td><?php echo $r['DIRECCION_AADUANA']; ?></td>        
                                                            <td><?php echo $NOMBRECOMUNA; ?></td>                                                                 
                                                            <td><?php echo $r['CONTACTO_AADUANA']; ?></td>   
                                                            <td><?php echo $r['EMAIL_AADUANA']; ?></td>      
                                                            <td><?php echo $r['TELEFONO_AADUANA']; ?></td>     
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

                $ARRAYNUMERO = $AADUANA_ADO->obtenerNumero($EMPRESAS);
                $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;

                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
                $AADUANA->__SET('NUMERO_AADUANA', $NUMERO);
                $AADUANA->__SET('RUT_AADUANA', $_REQUEST['RUTAADUANA']);
                $AADUANA->__SET('DV_AADUANA', $_REQUEST['DVAADUANA']);
                $AADUANA->__SET('NOMBRE_AADUANA', $_REQUEST['NOMBREAADUANA']);
                $AADUANA->__SET('RAZON_SOCIAL_AADUANA', $_REQUEST['RAZONSOCIALAADUANA']);
                $AADUANA->__SET('GIRO_AADUANA', $_REQUEST['GIROAADUANA']);
                $AADUANA->__SET('DIRECCION_AADUANA', $_REQUEST['DIRECCIONAADUANA']);
                $AADUANA->__SET('CONTACTO_AADUANA', $_REQUEST['CONTACTOAADUANA']);
                $AADUANA->__SET('TELEFONO_AADUANA', $_REQUEST['TELEFONOAADUANA']);
                $AADUANA->__SET('EMAIL_AADUANA', $_REQUEST['EMAILAADUANA']);
                $AADUANA->__SET('ID_COMUNA', $_REQUEST['COMUNA']);
                $AADUANA->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                $AADUANA->__SET('ID_USUARIOI', $IDUSUARIOS);
                $AADUANA->__SET('ID_USUARIOM', $IDUSUARIOS);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $AADUANA_ADO->agregarAaduana($AADUANA);

                $AUSUARIO_ADO->agregarAusuario2("NULL",3,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Agente Aduana.","fruta_aaduana","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );  

                //REDIRECCIONAR A PAGINA registroAaduana.php
                        echo '<script>
                            Swal.fire({
                                icon:"success",
                                title:"Registro Creado",
                                text:"El registro del mantenedor se ha creado correctamente",
                                showConfirmButton: true,
                                confirmButtonText:"Cerrar",
                                closeOnConfirm:false
                            }).then((result)=>{
                                location.href = "registroAaduana.php";                            
                            })
                        </script>';
            }
            //OPERACION EDICION DE FILA
            if (isset($_REQUEST['EDITAR'])) {
                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO  
                $AADUANA->__SET('RUT_AADUANA', $_REQUEST['RUTAADUANA']);
                $AADUANA->__SET('DV_AADUANA', $_REQUEST['DVAADUANA']);
                $AADUANA->__SET('NOMBRE_AADUANA', $_REQUEST['NOMBREAADUANA']);
                $AADUANA->__SET('RAZON_SOCIAL_AADUANA', $_REQUEST['RAZONSOCIALAADUANA']);
                $AADUANA->__SET('GIRO_AADUANA', $_REQUEST['GIROAADUANA']);
                $AADUANA->__SET('DIRECCION_AADUANA', $_REQUEST['DIRECCIONAADUANA']);
                $AADUANA->__SET('CONTACTO_AADUANA', $_REQUEST['CONTACTOAADUANA']);
                $AADUANA->__SET('TELEFONO_AADUANA', $_REQUEST['TELEFONOAADUANA']);
                $AADUANA->__SET('EMAIL_AADUANA', $_REQUEST['EMAILAADUANA']);
                $AADUANA->__SET('ID_COMUNA', $_REQUEST['COMUNA']);
                $AADUANA->__SET('ID_USUARIOM', $IDUSUARIOS);
                $AADUANA->__SET('ID_AADUANA', $_REQUEST['ID']);
                //LLAMADA AL METODO DE EDICION DEL CONTROLADOR
                $AADUANA_ADO->actualizarAaduana($AADUANA);

                $AUSUARIO_ADO->agregarAusuario2("NULL",3,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de Agente Aduana.","fruta_aaduana", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );     

                //REDIRECCIONAR A PAGINA registroAaduana.php
                    echo '<script>
                        Swal.fire({
                            icon:"success",
                            title:"Registro Modificado",
                            text:"El registro del mantenedor se ha Modificado correctamente",
                            showConfirmButton: true,
                            confirmButtonText:"Cerrar",
                            closeOnConfirm:false
                        }).then((result)=>{
                            location.href = "registroAaduana.php";                            
                        })
                    </script>';
            }
            if (isset($_REQUEST['ELIMINAR'])) {     
                
                $AADUANA->__SET('ID_AADUANA',$_REQUEST['ID']);
                $AADUANA_ADO->deshabilitar($AADUANA);

                $AUSUARIO_ADO->agregarAusuario2("NULL",3,4,"".$_SESSION["NOMBRE_USUARIO"].", Deshabilitar Agente Aduana.","fruta_aaduana", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );                
                
                echo '<script>
                    Swal.fire({
                        icon:"error",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Deshabilitado correctamente", 
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroAaduana.php";                            
                    })
                </script>';
            }
            
            if (isset($_REQUEST['HABILITAR'])) {       


                $AADUANA->__SET('ID_AADUANA', $_REQUEST['ID']);
                $AADUANA_ADO->habilitar($AADUANA);

                $AUSUARIO_ADO->agregarAusuario2("NULL",3,5,"".$_SESSION["NOMBRE_USUARIO"].", Habilitar Agente Aduana.","fruta_aaduana", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );                               

                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Habilitado correctamente", 
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroAaduana.php";                            
                    })
                </script>';
            }
        ?>
</body>

</html>