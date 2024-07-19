<?php

include_once "../../assest/config/validarUsuarioExpo.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES


include_once '../../assest/controlador/CONSIGNATARIO_ADO.php';
include_once '../../assest/modelo/CONSIGNATARIO.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR


$CONSIGNATARIO_ADO =  new CONSIGNATARIO_ADO();
//INIICIALIZAR MODELO
$CONSIGNATARIO =  new CONSIGNATARIO();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$OP = "";
$DISABLED = "";

$NOMBRECONSIGNATARIO = "";
$DIRECCIONCONSIGNATARIO = "";
$TELEFONOCONSIGNATARIO="";
$EORICONSIGNATARIO="";
$CONTACTOCONSIGNATARIO1 = "";
$CARGOCONSIGNATARIO1 = "";
$EMAILCONSIGNATARIO1 = "";
$CONTACTOCONSIGNATARIO2 = "";
$CARGOCONSIGNATARIO2 = "";
$EMAILCONSIGNATARIO2 = "";
$CONTACTOCONSIGNATARIO3 = "";
$CARGOCONSIGNATARIO3 = "";
$EMAILCONSIGNATARIO3 = "";
$NUMERO="";
$CONTADOR=0;



$SINO = "";


//INICIALIZAR ARREGLOS
$ARRAYCONSIGNATARIO = "";
$ARRAYCONSIGNATARIOID = "";
$ARRAYNUMERO="";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYCONSIGNATARIO = $CONSIGNATARIO_ADO->listarConsignatorioPorEmpresaCBX($EMPRESAS);
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
        $ARRAYCONSIGNATARIOID = $CONSIGNATARIO_ADO->verConsignatorio($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYCONSIGNATARIOID as $r) :
            $NOMBRECONSIGNATARIO = "" . $r['NOMBRE_CONSIGNATARIO'];
            $DIRECCIONCONSIGNATARIO = "" . $r['DIRECCION_CONSIGNATARIO'];
            $EORICONSIGNATARIO = "" . $r['EORI_CONSIGNATARIO'];
            $TELEFONOCONSIGNATARIO = "" . $r['TELEFONO_CONSIGNATARIO'];
            $CONTACTOCONSIGNATARIO1 = "" . $r['CONTACTO1_CONSIGNATARIO'];
            $CARGOCONSIGNATARIO1 = "" . $r['CARGO1_CONSIGNATARIO'];
            $EMAILCONSIGNATARIO1 = "" . $r['EMAIL1_CONSIGNATARIO'];
            $CONTACTOCONSIGNATARIO2 = "" . $r['CONTACTO2_CONSIGNATARIO'];
            $CARGOCONSIGNATARIO2 = "" . $r['CARGO2_CONSIGNATARIO'];
            $EMAILCONSIGNATARIO2 = "" . $r['EMAIL2_CONSIGNATARIO'];
            $CONTACTOCONSIGNATARIO3 = "" . $r['CONTACTO3_CONSIGNATARIO'];
            $CARGOCONSIGNATARIO3 = "" . $r['CARGO3_CONSIGNATARIO'];
            $EMAILCONSIGNATARIO3 = "" . $r['EMAIL3_CONSIGNATARIO'];
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
        $ARRAYCONSIGNATARIOID = $CONSIGNATARIO_ADO->verConsignatorio($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYCONSIGNATARIOID as $r) :
            $NOMBRECONSIGNATARIO = "" . $r['NOMBRE_CONSIGNATARIO'];
            $DIRECCIONCONSIGNATARIO = "" . $r['DIRECCION_CONSIGNATARIO'];
            $EORICONSIGNATARIO = "" . $r['EORI_CONSIGNATARIO'];
            $TELEFONOCONSIGNATARIO = "" . $r['TELEFONO_CONSIGNATARIO'];
            $CONTACTOCONSIGNATARIO1 = "" . $r['CONTACTO1_CONSIGNATARIO'];
            $CARGOCONSIGNATARIO1 = "" . $r['CARGO1_CONSIGNATARIO'];
            $EMAILCONSIGNATARIO1 = "" . $r['EMAIL1_CONSIGNATARIO'];
            $CONTACTOCONSIGNATARIO2 = "" . $r['CONTACTO2_CONSIGNATARIO'];
            $CARGOCONSIGNATARIO2 = "" . $r['CARGO2_CONSIGNATARIO'];
            $EMAILCONSIGNATARIO2 = "" . $r['EMAIL2_CONSIGNATARIO'];
            $CONTACTOCONSIGNATARIO3 = "" . $r['CONTACTO3_CONSIGNATARIO'];
            $CARGOCONSIGNATARIO3 = "" . $r['CARGO3_CONSIGNATARIO'];
            $EMAILCONSIGNATARIO3 = "" . $r['EMAIL3_CONSIGNATARIO'];
        endforeach;

    }

    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {

        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYCONSIGNATARIOID = $CONSIGNATARIO_ADO->verConsignatorio($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYCONSIGNATARIOID as $r) :

            $NOMBRECONSIGNATARIO = "" . $r['NOMBRE_CONSIGNATARIO'];
            $DIRECCIONCONSIGNATARIO = "" . $r['DIRECCION_CONSIGNATARIO'];
            $EORICONSIGNATARIO = "" . $r['EORI_CONSIGNATARIO'];
            $TELEFONOCONSIGNATARIO = "" . $r['TELEFONO_CONSIGNATARIO'];
            $CONTACTOCONSIGNATARIO1 = "" . $r['CONTACTO1_CONSIGNATARIO'];
            $CARGOCONSIGNATARIO1 = "" . $r['CARGO1_CONSIGNATARIO'];
            $EMAILCONSIGNATARIO1 = "" . $r['EMAIL1_CONSIGNATARIO'];
            $CONTACTOCONSIGNATARIO2 = "" . $r['CONTACTO2_CONSIGNATARIO'];
            $CARGOCONSIGNATARIO2 = "" . $r['CARGO2_CONSIGNATARIO'];
            $EMAILCONSIGNATARIO2 = "" . $r['EMAIL2_CONSIGNATARIO'];
            $CONTACTOCONSIGNATARIO3 = "" . $r['CONTACTO3_CONSIGNATARIO'];
            $CARGOCONSIGNATARIO3 = "" . $r['CARGO3_CONSIGNATARIO'];
            $EMAILCONSIGNATARIO3 = "" . $r['EMAIL3_CONSIGNATARIO'];

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
        $ARRAYCONSIGNATARIOID = $CONSIGNATARIO_ADO->verConsignatorio($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYCONSIGNATARIOID as $r) :
            $NOMBRECONSIGNATARIO = "" . $r['NOMBRE_CONSIGNATARIO'];
            $DIRECCIONCONSIGNATARIO = "" . $r['DIRECCION_CONSIGNATARIO'];
            $EORICONSIGNATARIO = "" . $r['EORI_CONSIGNATARIO'];
            $TELEFONOCONSIGNATARIO = "" . $r['TELEFONO_CONSIGNATARIO'];
            $CONTACTOCONSIGNATARIO1 = "" . $r['CONTACTO1_CONSIGNATARIO'];
            $CARGOCONSIGNATARIO1 = "" . $r['CARGO1_CONSIGNATARIO'];
            $EMAILCONSIGNATARIO1 = "" . $r['EMAIL1_CONSIGNATARIO'];
            $CONTACTOCONSIGNATARIO2 = "" . $r['CONTACTO2_CONSIGNATARIO'];
            $CARGOCONSIGNATARIO2 = "" . $r['CARGO2_CONSIGNATARIO'];
            $EMAILCONSIGNATARIO2 = "" . $r['EMAIL2_CONSIGNATARIO'];
            $CONTACTOCONSIGNATARIO3 = "" . $r['CONTACTO3_CONSIGNATARIO'];
            $CARGOCONSIGNATARIO3 = "" . $r['CARGO3_CONSIGNATARIO'];
            $EMAILCONSIGNATARIO3 = "" . $r['EMAIL3_CONSIGNATARIO'];
        endforeach;
    }
}



?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Consignatorio</title>
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

                    NOMBRECONSIGNATARIO = document.getElementById("NOMBRECONSIGNATARIO").value;
                    DIRECCIONCONSIGNATARIO = document.getElementById("DIRECCIONCONSIGNATARIO").value;
                    CONTACTOCONSIGNATARIO1 = document.getElementById("CONTACTOCONSIGNATARIO1").value;
                    CARGOCONSIGNATARIO1 = document.getElementById("CARGOCONSIGNATARIO1").value;
                    EMAILCONSIGNATARIO1 = document.getElementById("EMAILCONSIGNATARIO1").value;
                    CONTACTOCONSIGNATARIO2 = document.getElementById("CONTACTOCONSIGNATARIO2").value;
                    CARGOCONSIGNATARIO2 = document.getElementById("CARGOCONSIGNATARIO2").value;
                    EMAILCONSIGNATARIO2 = document.getElementById("EMAILCONSIGNATARIO2").value;
                    CONTACTOCONSIGNATARIO3 = document.getElementById("CONTACTOCONSIGNATARIO3").value;
                    CARGOCONSIGNATARIO3 = document.getElementById("CARGOCONSIGNATARIO3").value;
                    EMAILCONSIGNATARIO3 = document.getElementById("EMAILCONSIGNATARIO3").value;


                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_direccion').innerHTML = "";
                    document.getElementById('val_contacto1').innerHTML = "";
                    document.getElementById('val_cargo1').innerHTML = "";
                    document.getElementById('val_email1').innerHTML = "";
                    document.getElementById('val_contacto2').innerHTML = "";
                    document.getElementById('val_cargo2').innerHTML = "";
                    document.getElementById('val_email2').innerHTML = "";
                    document.getElementById('val_contacto3').innerHTML = "";
                    document.getElementById('val_cargo3').innerHTML = "";
                    document.getElementById('val_email3').innerHTML = "";



                    if (NOMBRECONSIGNATARIO == null || NOMBRECONSIGNATARIO.length == 0 || /^\s+$/.test(NOMBRECONSIGNATARIO)) {
                        document.form_reg_dato.NOMBRECONSIGNATARIO.focus();
                        document.form_reg_dato.NOMBRECONSIGNATARIO.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBRECONSIGNATARIO.style.borderColor = "#4AF575";



                    if (DIRECCIONCONSIGNATARIO == null || DIRECCIONCONSIGNATARIO.length == 0 || /^\s+$/.test(DIRECCIONCONSIGNATARIO)) {
                        document.form_reg_dato.DIRECCIONCONSIGNATARIO.focus();
                        document.form_reg_dato.DIRECCIONCONSIGNATARIO.style.borderColor = "#FF0000";
                        document.getElementById('val_direccion').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DIRECCIONCONSIGNATARIO.style.borderColor = "#4AF575";

                    /*
                
                    if (CONTACTOCONSIGNATARIO1 == null || CONTACTOCONSIGNATARIO1.length == 0 || /^\s+$/.test(CONTACTOCONSIGNATARIO1)) {
                        document.form_reg_dato.CONTACTOCONSIGNATARIO1.focus();
                        document.form_reg_dato.CONTACTOCONSIGNATARIO1.style.borderColor = "#FF0000";
                        document.getElementById('val_contacto1').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.CONTACTOCONSIGNATARIO1.style.borderColor = "#4AF575";



                    if (CARGOCONSIGNATARIO1 == null || CARGOCONSIGNATARIO1.length == 0 || /^\s+$/.test(CARGOCONSIGNATARIO1)) {
                        document.form_reg_dato.CARGOCONSIGNATARIO1.focus();
                        document.form_reg_dato.CARGOCONSIGNATARIO1.style.borderColor = "#FF0000";
                        document.getElementById('val_cargo1').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.CARGOCONSIGNATARIO1.style.borderColor = "#4AF575";



                    if (EMAILCONSIGNATARIO1 == null || EMAILCONSIGNATARIO1.length == 0 || /^\s+$/.test(EMAILCONSIGNATARIO1)) {
                        document.form_reg_dato.EMAILCONSIGNATARIO1.focus();
                        document.form_reg_dato.EMAILCONSIGNATARIO1.style.borderColor = "#FF0000";
                        document.getElementById('val_email1').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.EMAILCONSIGNATARIO1.style.borderColor = "#4AF575";


                    if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
                            .test(EMAILCONSIGNATARIO1))) {
                        document.form_reg_dato.EMAILCONSIGNATARIO1.focus();
                        document.form_reg_dato.EMAILCONSIGNATARIO1.style.borderColor = "#ff0000";
                        document.getElementById('val_email1').innerHTML = "FORMATO DE CORREO INCORRECTO";
                        return false;
                    }
                    document.form_reg_dato.EMAILCONSIGNATARIO1.style.borderColor = "#4AF575";



                    if (CONTACTOCONSIGNATARIO2 == null || CONTACTOCONSIGNATARIO2.length == 0 || /^\s+$/.test(CONTACTOCONSIGNATARIO2)) {
                        document.form_reg_dato.CONTACTOCONSIGNATARIO2.focus();
                        document.form_reg_dato.CONTACTOCONSIGNATARIO2.style.borderColor = "#FF0000";
                        document.getElementById('val_contacto2').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.CONTACTOCONSIGNATARIO2.style.borderColor = "#4AF575";



                    if (CARGOCONSIGNATARIO2 == null || CARGOCONSIGNATARIO2.length == 0 || /^\s+$/.test(CARGOCONSIGNATARIO2)) {
                        document.form_reg_dato.CARGOCONSIGNATARIO2.focus();
                        document.form_reg_dato.CARGOCONSIGNATARIO2.style.borderColor = "#FF0000";
                        document.getElementById('val_cargo2').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.CARGOCONSIGNATARIO2.style.borderColor = "#4AF575";



                    if (EMAILCONSIGNATARIO2 == null || EMAILCONSIGNATARIO2.length == 0 || /^\s+$/.test(EMAILCONSIGNATARIO2)) {
                        document.form_reg_dato.EMAILCONSIGNATARIO2.focus();
                        document.form_reg_dato.EMAILCONSIGNATARIO2.style.borderColor = "#FF0000";
                        document.getElementById('val_email2').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.EMAILCONSIGNATARIO2.style.borderColor = "#4AF575";


                    if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
                            .test(EMAILCONSIGNATARIO2))) {
                        document.form_reg_dato.EMAILCONSIGNATARIO2.focus();
                        document.form_reg_dato.EMAILCONSIGNATARIO2.style.borderColor = "#ff0000";
                        document.getElementById('val_email2').innerHTML = "FORMATO DE CORREO INCORRECTO";
                        return false;
                    }
                    document.form_reg_dato.EMAILCONSIGNATARIO2.style.borderColor = "#4AF575";

                    if (CONTACTOCONSIGNATARIO3 == null || CONTACTOCONSIGNATARIO3.length == 0 || /^\s+$/.test(CONTACTOCONSIGNATARIO3)) {
                        document.form_reg_dato.CONTACTOCONSIGNATARIO3.focus();
                        document.form_reg_dato.CONTACTOCONSIGNATARIO3.style.borderColor = "#FF0000";
                        document.getElementById('val_contacto3').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.CONTACTOCONSIGNATARIO3.style.borderColor = "#4AF575";



                    if (CARGOCONSIGNATARIO3 == null || CARGOCONSIGNATARIO3.length == 0 || /^\s+$/.test(CARGOCONSIGNATARIO3)) {
                        document.form_reg_dato.CARGOCONSIGNATARIO3.focus();
                        document.form_reg_dato.CARGOCONSIGNATARIO3.style.borderColor = "#FF0000";
                        document.getElementById('val_cargo3').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.CARGOCONSIGNATARIO3.style.borderColor = "#4AF575";



                    if (EMAILCONSIGNATARIO3 == null || EMAILCONSIGNATARIO3.length == 0 || /^\s+$/.test(EMAILCONSIGNATARIO3)) {
                        document.form_reg_dato.EMAILCONSIGNATARIO3.focus();
                        document.form_reg_dato.EMAILCONSIGNATARIO3.style.borderColor = "#FF0000";
                        document.getElementById('val_email3').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.EMAILCONSIGNATARIO3.style.borderColor = "#4AF575";


                    if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
                            .test(EMAILCONSIGNATARIO3))) {
                        document.form_reg_dato.EMAILCONSIGNATARIO3.focus();
                        document.form_reg_dato.EMAILCONSIGNATARIO3.style.borderColor = "#ff0000";
                        document.getElementById('val_email3').innerHTML = "FORMATO DE CORREO INCORRECTO";
                        return false;
                    }
                    document.form_reg_dato.EMAILCONSIGNATARIO3.style.borderColor = "#4AF575";
 
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
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Registro Consignatorio</a> </li>
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
                                        <h4 class="box-title">Registro Consignatorio</h4>                                
                                    </div>
                                    <!-- /.box-header -->
                                    <form class="form" role="form" method="post" name="form_reg_dato" name="form_reg_dato" enctype="multipart/form-data">
                                        <div class="box-body">
                                            <hr class="my-15">
                                            <div class="row">
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Nombre </label>
                                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                        <input type="hidden" class="form-control" placeholder="EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                        <input type="text" class="form-control" placeholder="Nombre Consignatorio" id="NOMBRECONSIGNATARIO" name="NOMBRECONSIGNATARIO" value="<?php echo $NOMBRECONSIGNATARIO; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nombre" class="validacion"> </label>
                                                    </div> 
                                                </div>                        
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>ID Tributario(EORI) </label>
                                                        <input type="text" class="form-control" placeholder="ID Tributario Consignatorio" id="EORICONSIGNATARIO" name="EORICONSIGNATARIO" value="<?php echo $EORICONSIGNATARIO; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_eori" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Direccion </label>
                                                        <input type="text" class="form-control" placeholder="Direccion Consignatorio" id="DIRECCIONCONSIGNATARIO" name="DIRECCIONCONSIGNATARIO" value="<?php echo $DIRECCIONCONSIGNATARIO; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_direccion" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Telefono / Fax </label>
                                                        <input type="text" class="form-control" placeholder="Telefono / Fax Consignatorio" id="TELEFONOCONSIGNATARIO" name="TELEFONOCONSIGNATARIO" value="<?php echo $TELEFONOCONSIGNATARIO; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_telefono" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <label>Contacto </label>
                                            <hr class="my-15">
                                            <div class="row">
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Contacto 1</label>
                                                        <input type="text" class="form-control" placeholder="Nombre Contacto 1 Consignatorio" id="CONTACTOCONSIGNATARIO1" name="CONTACTOCONSIGNATARIO1" value="<?php echo $CONTACTOCONSIGNATARIO1; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_contacto1" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Cargo 1</label>
                                                        <input type="text" class="form-control" placeholder="Cargo Contacto 1 Consignatorio" id="CARGOCONSIGNATARIO1" name="CARGOCONSIGNATARIO1" value="<?php echo $CARGOCONSIGNATARIO1; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_cargo1" class="validacion"> </label>
                                                    </div>
                                                </div>

                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Email 1</label>
                                                        <input type="text" class="form-control" placeholder="Email Contacto 1 Consignatorio" id="EMAILCONSIGNATARIO1" name="EMAILCONSIGNATARIO1" value="<?php echo $EMAILCONSIGNATARIO1; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_email1" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Contacto 2</label>
                                                        <input type="text" class="form-control" placeholder="Nombre Contacto 2 Consignatorio" id="CONTACTOCONSIGNATARIO2" name="CONTACTOCONSIGNATARIO2" value="<?php echo $CONTACTOCONSIGNATARIO2; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_contacto2" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Cargo 2</label>
                                                        <input type="text" class="form-control" placeholder="Cargo Contacto 2 Consignatorio" id="CARGOCONSIGNATARIO2" name="CARGOCONSIGNATARIO2" value="<?php echo $CARGOCONSIGNATARIO2; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_cargo2" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Email 2</label>
                                                        <input type="text" class="form-control" placeholder="Email Contacto 2 Consignatorio" id="EMAILCONSIGNATARIO2" name="EMAILCONSIGNATARIO2" value="<?php echo $EMAILCONSIGNATARIO2; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_email2" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Contacto 3</label>
                                                        <input type="text" class="form-control" placeholder="Nombre Contacto 3 Consignatorio" id="CONTACTOCONSIGNATARIO3" name="CONTACTOCONSIGNATARIO3" value="<?php echo $CONTACTOCONSIGNATARIO3; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_contacto3" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Cargo 3</label>
                                                        <input type="text" class="form-control" placeholder="Cargo Contacto 3 Consignatorio" id="CARGOCONSIGNATARIO3" name="CARGOCONSIGNATARIO3" value="<?php echo $CARGOCONSIGNATARIO3; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_cargo3" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Email 3</label>
                                                        <input type="text" class="form-control" placeholder="Email Contacto 3 Consignatorio" id="EMAILCONSIGNATARIO3" name="EMAILCONSIGNATARIO3" value="<?php echo $EMAILCONSIGNATARIO3; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_email3" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->                 
                                        <div class="box-footer">
                                            <div class="btn-group   col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12 " role="group" aria-label="Acciones generales">                                    
                                                <button type="button" class="btn  btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroConsignatorio.php');">
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
                                        <h4 class="box-title"> Agrupado Consignatorio</h4>
                                    </div>
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <table id="listar" class="table-hover " style="width: 100%;">
                                                <thead>
                                                    <tr class="center">
                                                        <th>Numero </th>
                                                        <th>Operaciones</th>
                                                        <th>Nombre </th>
                                                        <th>Eori </th>
                                                        <th>Direccion </th>
                                                        <th>Telefono / Fax </th>
                                                        <th>Contacto 1</th>
                                                        <th>Cargo 1</th>
                                                        <th>Email 1</th>
                                                        <th>Contacto 2</th>
                                                        <th>Cargo 2</th>
                                                        <th>Email 2</th>
                                                        <th>Contacto 3</th>
                                                        <th>Cargo 3</th>
                                                        <th>Email 3</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYCONSIGNATARIO as $r) : ?>
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
                                                                                <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_CONSIGNATARIO']; ?>" />
                                                                                <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroConsignatorio" />
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
                                                            <td><?php echo $r['NOMBRE_CONSIGNATARIO']; ?></td>   
                                                            <td><?php echo $r['EORI_CONSIGNATARIO']; ?></td>   
                                                            <td><?php echo $r['DIRECCION_CONSIGNATARIO']; ?></td>   
                                                            <td><?php echo $r['TELEFONO_CONSIGNATARIO']; ?></td>   
                                                            <td><?php echo $r['CONTACTO1_CONSIGNATARIO']; ?></td>   
                                                            <td><?php echo $r['CARGO1_CONSIGNATARIO']; ?></td>   
                                                            <td><?php echo $r['EMAIL1_CONSIGNATARIO']; ?></td>   
                                                            <td><?php echo $r['CONTACTO2_CONSIGNATARIO']; ?></td>   
                                                            <td><?php echo $r['CARGO2_CONSIGNATARIO']; ?></td>   
                                                            <td><?php echo $r['EMAIL2_CONSIGNATARIO']; ?></td>   
                                                            <td><?php echo $r['CONTACTO3_CONSIGNATARIO']; ?></td>   
                                                            <td><?php echo $r['CARGO3_CONSIGNATARIO']; ?></td>   
                                                            <td><?php echo $r['EMAIL3_CONSIGNATARIO']; ?></td>   
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

                    $ARRAYNUMERO = $CONSIGNATARIO_ADO->obtenerNumero($EMPRESAS);
                    $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;

                    //UTILIZACION METODOS SET DEL MODELO
                    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
                    $CONSIGNATARIO->__SET('NUMERO_CONSIGNATARIO', $NUMERO);
                    $CONSIGNATARIO->__SET('NOMBRE_CONSIGNATARIO', $_REQUEST['NOMBRECONSIGNATARIO']);
                    $CONSIGNATARIO->__SET('EORI_CONSIGNATARIO', $_REQUEST['EORICONSIGNATARIO']);
                    $CONSIGNATARIO->__SET('DIRECCION_CONSIGNATARIO', $_REQUEST['DIRECCIONCONSIGNATARIO']);
                    $CONSIGNATARIO->__SET('TELEFONO_CONSIGNATARIO', $_REQUEST['TELEFONOCONSIGNATARIO']);
                    $CONSIGNATARIO->__SET('CONTACTO1_CONSIGNATARIO', $_REQUEST['CONTACTOCONSIGNATARIO1']);
                    $CONSIGNATARIO->__SET('CARGO1_CONSIGNATARIO', $_REQUEST['CARGOCONSIGNATARIO1']);
                    $CONSIGNATARIO->__SET('EMAIL1_CONSIGNATARIO', $_REQUEST['EMAILCONSIGNATARIO1']);
                    $CONSIGNATARIO->__SET('CONTACTO2_CONSIGNATARIO', $_REQUEST['CONTACTOCONSIGNATARIO2']);
                    $CONSIGNATARIO->__SET('CARGO2_CONSIGNATARIO', $_REQUEST['CARGOCONSIGNATARIO2']);
                    $CONSIGNATARIO->__SET('EMAIL2_CONSIGNATARIO', $_REQUEST['EMAILCONSIGNATARIO2']);
                    $CONSIGNATARIO->__SET('CONTACTO3_CONSIGNATARIO', $_REQUEST['CONTACTOCONSIGNATARIO3']);
                    $CONSIGNATARIO->__SET('CARGO3_CONSIGNATARIO', $_REQUEST['CARGOCONSIGNATARIO3']);
                    $CONSIGNATARIO->__SET('EMAIL3_CONSIGNATARIO', $_REQUEST['EMAILCONSIGNATARIO3']);
                    $CONSIGNATARIO->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                    $CONSIGNATARIO->__SET('ID_USUARIOI', $IDUSUARIOS);
                    $CONSIGNATARIO->__SET('ID_USUARIOM', $IDUSUARIOS);
                    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                    $CONSIGNATARIO_ADO->agregarConsignatorio($CONSIGNATARIO);

                    $AUSUARIO_ADO->agregarAusuario2("NULL",3,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Consignatorio.","fruta_consignatario","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );  

                    //REDIRECCIONAR A PAGINA registroConsignatorio.php
                        echo '<script>
                            Swal.fire({
                                icon:"success",
                                title:"Registro Creado",
                                text:"El registro del mantenedor se ha creado correctamente",
                                showConfirmButton: true,
                                confirmButtonText:"Cerrar",
                                closeOnConfirm:false
                            }).then((result)=>{
                                location.href = "registroConsignatorio.php";                            
                            })
                        </script>';
                }
                //OPERACION EDICION DE FILA
                if (isset($_REQUEST['EDITAR'])) {
                    //UTILIZACION METODOS SET DEL MODELO
                    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO  
                    $CONSIGNATARIO->__SET('NOMBRE_CONSIGNATARIO', $_REQUEST['NOMBRECONSIGNATARIO']);
                    $CONSIGNATARIO->__SET('EORI_CONSIGNATARIO', $_REQUEST['EORICONSIGNATARIO']);
                    $CONSIGNATARIO->__SET('DIRECCION_CONSIGNATARIO', $_REQUEST['DIRECCIONCONSIGNATARIO']);
                    $CONSIGNATARIO->__SET('TELEFONO_CONSIGNATARIO', $_REQUEST['TELEFONOCONSIGNATARIO']);
                    $CONSIGNATARIO->__SET('CONTACTO1_CONSIGNATARIO', $_REQUEST['CONTACTOCONSIGNATARIO1']);
                    $CONSIGNATARIO->__SET('CARGO1_CONSIGNATARIO', $_REQUEST['CARGOCONSIGNATARIO1']);
                    $CONSIGNATARIO->__SET('EMAIL1_CONSIGNATARIO', $_REQUEST['EMAILCONSIGNATARIO1']);
                    $CONSIGNATARIO->__SET('CONTACTO2_CONSIGNATARIO', $_REQUEST['CONTACTOCONSIGNATARIO2']);
                    $CONSIGNATARIO->__SET('CARGO2_CONSIGNATARIO', $_REQUEST['CARGOCONSIGNATARIO2']);
                    $CONSIGNATARIO->__SET('EMAIL2_CONSIGNATARIO', $_REQUEST['EMAILCONSIGNATARIO2']);
                    $CONSIGNATARIO->__SET('CONTACTO3_CONSIGNATARIO', $_REQUEST['CONTACTOCONSIGNATARIO3']);
                    $CONSIGNATARIO->__SET('CARGO3_CONSIGNATARIO', $_REQUEST['CARGOCONSIGNATARIO3']);
                    $CONSIGNATARIO->__SET('EMAIL3_CONSIGNATARIO', $_REQUEST['EMAILCONSIGNATARIO3']);
                    $CONSIGNATARIO->__SET('ID_USUARIOM', $IDUSUARIOS);
                    $CONSIGNATARIO->__SET('ID_CONSIGNATARIO', $_REQUEST['ID']);
                    //LLAMADA AL METODO DE EDICION DEL CONTROLADOR
                    $CONSIGNATARIO_ADO->actualizarConsignatorio($CONSIGNATARIO);

                    $AUSUARIO_ADO->agregarAusuario2("NULL",3,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de Consignatorio.","fruta_consignatario", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );     

                    //REDIRECCIONAR A PAGINA registroConsignatorio.php
                    echo '<script>
                        Swal.fire({
                            icon:"success",
                            title:"Registro Modificado",
                            text:"El registro del mantenedor se ha Modificado correctamente",
                            showConfirmButton: true,
                            confirmButtonText:"Cerrar",
                            closeOnConfirm:false
                        }).then((result)=>{
                            location.href = "registroConsignatorio.php";                            
                        })
                    </script>';
                }
                
            if (isset($_REQUEST['ELIMINAR'])) {     
                
                
                $CONSIGNATARIO->__SET('ID_CONSIGNATARIO', $_REQUEST['ID']);
                $CONSIGNATARIO_ADO->deshabilitar($CONSIGNATARIO);


                $AUSUARIO_ADO->agregarAusuario2("NULL",3,4,"".$_SESSION["NOMBRE_USUARIO"].", Deshabilitar Consignatorio.","fruta_consignatario", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );                
                
                echo '<script>
                    Swal.fire({
                        icon:"error",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Deshabilitado correctamente", 
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroConsignatorio.php";                            
                    })
                </script>';
            }
            
            if (isset($_REQUEST['HABILITAR'])) {   

                $CONSIGNATARIO->__SET('ID_CONSIGNATARIO', $_REQUEST['ID']);
                $CONSIGNATARIO_ADO->habilitar($CONSIGNATARIO);

                $AUSUARIO_ADO->agregarAusuario2("NULL",3,5,"".$_SESSION["NOMBRE_USUARIO"].", Habilitar Consignatorio.","fruta_consignatario", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );                               

                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Habilitado correctamente", 
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroConsignatorio.php";                            
                    })
                </script>';
            }

        ?>
</body>

</html>