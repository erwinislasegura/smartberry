<?php

include_once "../../assest/config/validarUsuarioExpo.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES


include_once '../../assest/controlador/BROKER_ADO.php';
include_once '../../assest/modelo/BROKER.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR


$BROKER_ADO =  new BROKER_ADO();
//INIICIALIZAR MODELO
$BROKER =  new BROKER();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$OP = "";
$DISABLED = "";

$NOMBREBROKER = "";
$EORIBROKER = "";
$DIRECCIONBROKER = "";
$CONTACTOBROKER1 = "";
$CARGOBROKER1 = "";
$EMAILBROKER1 = "";
$CONTACTOBROKER2 = "";
$CARGOBROKER2 = "";
$EMAILBROKER2 = "";
$CONTACTOBROKER3 = "";
$CARGOBROKER3 = "";
$EMAILBROKER3 = "";
$NUMERO = "";
$CONTADOR=0;



$SINO = "";


//INICIALIZAR ARREGLOS
$ARRAYBROKER = "";
$ARRAYBROKERID = "";
$ARRAYNUMERO = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYBROKER = $BROKER_ADO->listarBrokerPorEmpresaCBX($EMPRESAS);
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
        $ARRAYBROKERID = $BROKER_ADO->verBroker($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYBROKERID as $r) :
            $NOMBREBROKER = "" . $r['NOMBRE_BROKER'];
            $EORIBROKER = "" . $r['EORI_BROKER'];
            $DIRECCIONBROKER = "" . $r['DIRECCION_BROKER'];
            $CONTACTOBROKER1 = "" . $r['CONTACTO1_BROKER'];
            $CARGOBROKER1 = "" . $r['CARGO1_BROKER'];
            $EMAILBROKER1 = "" . $r['EMAIL1_BROKER'];
            $CONTACTOBROKER2 = "" . $r['CONTACTO2_BROKER'];
            $CARGOBROKER2 = "" . $r['CARGO2_BROKER'];
            $EMAILBROKER2 = "" . $r['EMAIL2_BROKER'];
            $CONTACTOBROKER3 = "" . $r['CONTACTO3_BROKER'];
            $CARGOBROKER3 = "" . $r['CARGO3_BROKER'];
            $EMAILBROKER3 = "" . $r['EMAIL3_BROKER'];
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
        $ARRAYBROKERID = $BROKER_ADO->verBroker($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYBROKERID as $r) :
            $NOMBREBROKER = "" . $r['NOMBRE_BROKER'];
            $EORIBROKER = "" . $r['EORI_BROKER'];
            $DIRECCIONBROKER = "" . $r['DIRECCION_BROKER'];
            $CONTACTOBROKER1 = "" . $r['CONTACTO1_BROKER'];
            $CARGOBROKER1 = "" . $r['CARGO1_BROKER'];
            $EMAILBROKER1 = "" . $r['EMAIL1_BROKER'];
            $CONTACTOBROKER2 = "" . $r['CONTACTO2_BROKER'];
            $CARGOBROKER2 = "" . $r['CARGO2_BROKER'];
            $EMAILBROKER2 = "" . $r['EMAIL2_BROKER'];
            $CONTACTOBROKER3 = "" . $r['CONTACTO3_BROKER'];
            $CARGOBROKER3 = "" . $r['CARGO3_BROKER'];
            $EMAILBROKER3 = "" . $r['EMAIL3_BROKER'];
        endforeach;

    }

    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {

        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYBROKERID = $BROKER_ADO->verBroker($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYBROKERID as $r) :

            $NOMBREBROKER = "" . $r['NOMBRE_BROKER'];
            $EORIBROKER = "" . $r['EORI_BROKER'];
            $DIRECCIONBROKER = "" . $r['DIRECCION_BROKER'];
            $CONTACTOBROKER1 = "" . $r['CONTACTO1_BROKER'];
            $CARGOBROKER1 = "" . $r['CARGO1_BROKER'];
            $EMAILBROKER1 = "" . $r['EMAIL1_BROKER'];
            $CONTACTOBROKER2 = "" . $r['CONTACTO2_BROKER'];
            $CARGOBROKER2 = "" . $r['CARGO2_BROKER'];
            $EMAILBROKER2 = "" . $r['EMAIL2_BROKER'];
            $CONTACTOBROKER3 = "" . $r['CONTACTO3_BROKER'];
            $CARGOBROKER3 = "" . $r['CARGO3_BROKER'];
            $EMAILBROKER3 = "" . $r['EMAIL3_BROKER'];

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
        $ARRAYBROKERID = $BROKER_ADO->verBroker($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYBROKERID as $r) :
            $NOMBREBROKER = "" . $r['NOMBRE_BROKER'];
            $EORIBROKER = "" . $r['EORI_BROKER'];
            $DIRECCIONBROKER = "" . $r['DIRECCION_BROKER'];
            $CONTACTOBROKER1 = "" . $r['CONTACTO1_BROKER'];
            $CARGOBROKER1 = "" . $r['CARGO1_BROKER'];
            $EMAILBROKER1 = "" . $r['EMAIL1_BROKER'];
            $CONTACTOBROKER2 = "" . $r['CONTACTO2_BROKER'];
            $CARGOBROKER2 = "" . $r['CARGO2_BROKER'];
            $EMAILBROKER2 = "" . $r['EMAIL2_BROKER'];
            $CONTACTOBROKER3 = "" . $r['CONTACTO3_BROKER'];
            $CARGOBROKER3 = "" . $r['CARGO3_BROKER'];
            $EMAILBROKER3 = "" . $r['EMAIL3_BROKER'];
        endforeach;
    }
}



?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Cliente</title>
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

                    NOMBREBROKER = document.getElementById("NOMBREBROKER").value;
                    EORIBROKER = document.getElementById("EORIBROKER").value;
                    DIRECCIONBROKER = document.getElementById("DIRECCIONBROKER").value;
                    CONTACTOBROKER1 = document.getElementById("CONTACTOBROKER1").value;
                    CARGOBROKER1 = document.getElementById("CARGOBROKER1").value;
                    EMAILBROKER1 = document.getElementById("EMAILBROKER1").value;
                    CONTACTOBROKER2 = document.getElementById("CONTACTOBROKER2").value;
                    CARGOBROKER2 = document.getElementById("CARGOBROKER2").value;
                    EMAILBROKER2 = document.getElementById("EMAILBROKER2").value;
                    CONTACTOBROKER3 = document.getElementById("CONTACTOBROKER3").value;
                    CARGOBROKER3 = document.getElementById("CARGOBROKER3").value;
                    EMAILBROKER3 = document.getElementById("EMAILBROKER3").value;


                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_eori').innerHTML = "";
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



                    if (NOMBREBROKER == null || NOMBREBROKER.length == 0 || /^\s+$/.test(NOMBREBROKER)) {
                        document.form_reg_dato.NOMBREBROKER.focus();
                        document.form_reg_dato.NOMBREBROKER.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBREBROKER.style.borderColor = "#4AF575";


                    if (EORIBROKER == null || EORIBROKER.length == 0 || /^\s+$/.test(EORIBROKER)) {
                        document.form_reg_dato.EORIBROKER.focus();
                        document.form_reg_dato.EORIBROKER.style.borderColor = "#FF0000";
                        document.getElementById('val_eori').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.EORIBROKER.style.borderColor = "#4AF575";


                    if (DIRECCIONBROKER == null || DIRECCIONBROKER.length == 0 || /^\s+$/.test(DIRECCIONBROKER)) {
                        document.form_reg_dato.DIRECCIONBROKER.focus();
                        document.form_reg_dato.DIRECCIONBROKER.style.borderColor = "#FF0000";
                        document.getElementById('val_direccion').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DIRECCIONBROKER.style.borderColor = "#4AF575";

                    /*
                       



                        if (CONTACTOBROKER1 == null || CONTACTOBROKER1.length == 0 || /^\s+$/.test(CONTACTOBROKER1)) {
                            document.form_reg_dato.CONTACTOBROKER1.focus();
                            document.form_reg_dato.CONTACTOBROKER1.style.borderColor = "#FF0000";
                            document.getElementById('val_contacto1').innerHTML = "NO A INGRESADO DATO";
                            return false;
                        }
                        document.form_reg_dato.CONTACTOBROKER1.style.borderColor = "#4AF575";



                        if (CARGOBROKER1 == null || CARGOBROKER1.length == 0 || /^\s+$/.test(CARGOBROKER1)) {
                            document.form_reg_dato.CARGOBROKER1.focus();
                            document.form_reg_dato.CARGOBROKER1.style.borderColor = "#FF0000";
                            document.getElementById('val_cargo1').innerHTML = "NO A INGRESADO DATO";
                            return false;
                        }
                        document.form_reg_dato.CARGOBROKER1.style.borderColor = "#4AF575";



                        if (EMAILBROKER1 == null || EMAILBROKER1.length == 0 || /^\s+$/.test(EMAILBROKER1)) {
                            document.form_reg_dato.EMAILBROKER1.focus();
                            document.form_reg_dato.EMAILBROKER1.style.borderColor = "#FF0000";
                            document.getElementById('val_email1').innerHTML = "NO A INGRESADO DATO";
                            return false;
                        }
                        document.form_reg_dato.EMAILBROKER1.style.borderColor = "#4AF575";


                        if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
                                .test(EMAILBROKER1))) {
                            document.form_reg_dato.EMAILBROKER1.focus();
                            document.form_reg_dato.EMAILBROKER1.style.borderColor = "#ff0000";
                            document.getElementById('val_email1').innerHTML = "FORMATO DE CORREO INCORRECTO";
                            return false;
                        }
                        document.form_reg_dato.EMAILBROKER1.style.borderColor = "#4AF575";



                        if (CONTACTOBROKER2 == null || CONTACTOBROKER2.length == 0 || /^\s+$/.test(CONTACTOBROKER2)) {
                            document.form_reg_dato.CONTACTOBROKER2.focus();
                            document.form_reg_dato.CONTACTOBROKER2.style.borderColor = "#FF0000";
                            document.getElementById('val_contacto2').innerHTML = "NO A INGRESADO DATO";
                            return false;
                        }
                        document.form_reg_dato.CONTACTOBROKER2.style.borderColor = "#4AF575";



                        if (CARGOBROKER2 == null || CARGOBROKER2.length == 0 || /^\s+$/.test(CARGOBROKER2)) {
                            document.form_reg_dato.CARGOBROKER2.focus();
                            document.form_reg_dato.CARGOBROKER2.style.borderColor = "#FF0000";
                            document.getElementById('val_cargo2').innerHTML = "NO A INGRESADO DATO";
                            return false;
                        }
                        document.form_reg_dato.CARGOBROKER2.style.borderColor = "#4AF575";



                        if (EMAILBROKER2 == null || EMAILBROKER2.length == 0 || /^\s+$/.test(EMAILBROKER2)) {
                            document.form_reg_dato.EMAILBROKER2.focus();
                            document.form_reg_dato.EMAILBROKER2.style.borderColor = "#FF0000";
                            document.getElementById('val_email2').innerHTML = "NO A INGRESADO DATO";
                            return false;
                        }
                        document.form_reg_dato.EMAILBROKER2.style.borderColor = "#4AF575";


                        if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
                                .test(EMAILBROKER2))) {
                            document.form_reg_dato.EMAILBROKER2.focus();
                            document.form_reg_dato.EMAILBROKER2.style.borderColor = "#ff0000";
                            document.getElementById('val_email2').innerHTML = "FORMATO DE CORREO INCORRECTO";
                            return false;
                        }
                        document.form_reg_dato.EMAILBROKER2.style.borderColor = "#4AF575";

                        if (CONTACTOBROKER3 == null || CONTACTOBROKER3.length == 0 || /^\s+$/.test(CONTACTOBROKER3)) {
                            document.form_reg_dato.CONTACTOBROKER3.focus();
                            document.form_reg_dato.CONTACTOBROKER3.style.borderColor = "#FF0000";
                            document.getElementById('val_contacto3').innerHTML = "NO A INGRESADO DATO";
                            return false;
                        }
                        document.form_reg_dato.CONTACTOBROKER3.style.borderColor = "#4AF575";



                        if (CARGOBROKER3 == null || CARGOBROKER3.length == 0 || /^\s+$/.test(CARGOBROKER3)) {
                            document.form_reg_dato.CARGOBROKER3.focus();
                            document.form_reg_dato.CARGOBROKER3.style.borderColor = "#FF0000";
                            document.getElementById('val_cargo3').innerHTML = "NO A INGRESADO DATO";
                            return false;
                        }
                        document.form_reg_dato.CARGOBROKER3.style.borderColor = "#4AF575";



                        if (EMAILBROKER3 == null || EMAILBROKER3.length == 0 || /^\s+$/.test(EMAILBROKER3)) {
                            document.form_reg_dato.EMAILBROKER3.focus();
                            document.form_reg_dato.EMAILBROKER3.style.borderColor = "#FF0000";
                            document.getElementById('val_email3').innerHTML = "NO A INGRESADO DATO";
                            return false;
                        }
                        document.form_reg_dato.EMAILBROKER3.style.borderColor = "#4AF575";


                        if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
                                .test(EMAILBROKER3))) {
                            document.form_reg_dato.EMAILBROKER3.focus();
                            document.form_reg_dato.EMAILBROKER3.style.borderColor = "#ff0000";
                            document.getElementById('val_email3').innerHTML = "FORMATO DE CORREO INCORRECTO";
                            return false;
                        }
                        document.form_reg_dato.EMAILBROKER3.style.borderColor = "#4AF575";

                    */


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
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Registro Cliente</a>  </li>
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
                                        <h4 class="box-title">Registro Cliente</h4>                                
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
                                                        <input type="text" class="form-control" placeholder="Nombre Cliente" id="NOMBREBROKER" name="NOMBREBROKER" value="<?php echo $NOMBREBROKER; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nombre" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>EORI </label>
                                                        <input type="text" class="form-control" placeholder="EORI Cliente" id="EORIBROKER" name="EORIBROKER" value="<?php echo $EORIBROKER; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_eori" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Direccion </label>
                                                        <input type="text" class="form-control" placeholder="Direccion Cliente" id="DIRECCIONBROKER" name="DIRECCIONBROKER" value="<?php echo $DIRECCIONBROKER; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_direccion" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <label>Contacto </label>
                                            <hr class="my-15">
                                            <div class="row">
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Contacto 1</label>
                                                        <input type="text" class="form-control" placeholder="Nombre Contacto 1 Cliente" id="CONTACTOBROKER1" name="CONTACTOBROKER1" value="<?php echo $CONTACTOBROKER1; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_contacto1" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Cargo 1</label>
                                                        <input type="text" class="form-control" placeholder="Cargo Contacto 1 Cliente" id="CARGOBROKER1" name="CARGOBROKER1" value="<?php echo $CARGOBROKER1; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_cargo1" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Email 1</label>
                                                        <input type="text" class="form-control" placeholder="Email Contacto 1 Cliente" id="EMAILBROKER1" name="EMAILBROKER1" value="<?php echo $EMAILBROKER1; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_email1" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Contacto 2</label>
                                                        <input type="text" class="form-control" placeholder="Nombre Contacto 2 Cliente" id="CONTACTOBROKER2" name="CONTACTOBROKER2" value="<?php echo $CONTACTOBROKER2; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_contacto2" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Cargo 2</label>
                                                        <input type="text" class="form-control" placeholder="Cargo Contacto 2 Cliente" id="CARGOBROKER2" name="CARGOBROKER2" value="<?php echo $CARGOBROKER2; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_cargo2" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Email 2</label>
                                                        <input type="text" class="form-control" placeholder="Email Contacto 2 Cliente" id="EMAILBROKER2" name="EMAILBROKER2" value="<?php echo $EMAILBROKER2; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_email2" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Contacto 3</label>
                                                        <input type="text" class="form-control" placeholder="Nombre Contacto 3 Cliente" id="CONTACTOBROKER3" name="CONTACTOBROKER3" value="<?php echo $CONTACTOBROKER3; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_contacto3" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Cargo 3</label>
                                                        <input type="text" class="form-control" placeholder="Cargo Contacto 3 Cliente" id="CARGOBROKER3" name="CARGOBROKER3" value="<?php echo $CARGOBROKER3; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_cargo3" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Email 3</label>
                                                        <input type="text" class="form-control" placeholder="Email Contacto 3 Cliente" id="EMAILBROKER3" name="EMAILBROKER3" value="<?php echo $EMAILBROKER3; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_email3" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->    
                                        <div class="box-footer">
                                            <div class="btn-group   col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12 " role="group" aria-label="Acciones generales">                                    
                                                <button type="button" class="btn  btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroBroker.php');">
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
                                        <h4 class="box-title"> Agrupado Cliente</h4>
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
                                                    <?php foreach ($ARRAYBROKER as $r) : ?>     
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
                                                                                <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_BROKER']; ?>" />
                                                                                <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroBroker" />
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
                                                            <td><?php echo $r['NOMBRE_BROKER']; ?></td>     
                                                            <td><?php echo $r['DIRECCION_BROKER']; ?></td>      
                                                            <td><?php echo $r['EORI_BROKER']; ?></td>       
                                                            <td><?php echo $r['CONTACTO1_BROKER']; ?></td>     
                                                            <td><?php echo $r['CARGO1_BROKER']; ?></td>      
                                                            <td><?php echo $r['EMAIL1_BROKER']; ?></td>  
                                                            <td><?php echo $r['CONTACTO2_BROKER']; ?></td>     
                                                            <td><?php echo $r['CARGO2_BROKER']; ?></td>      
                                                            <td><?php echo $r['EMAIL2_BROKER']; ?></td>  
                                                            <td><?php echo $r['CONTACTO3_BROKER']; ?></td>     
                                                            <td><?php echo $r['CARGO3_BROKER']; ?></td>      
                                                            <td><?php echo $r['EMAIL3_BROKER']; ?></td>       
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

                $ARRAYNUMERO = $BROKER_ADO->obtenerNumero($EMPRESAS);
                $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;


                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
                $BROKER->__SET('NUMERO_BROKER', $NUMERO);
                $BROKER->__SET('NOMBRE_BROKER', $_REQUEST['NOMBREBROKER']);
                $BROKER->__SET('EORI_BROKER', $_REQUEST['EORIBROKER']);
                $BROKER->__SET('DIRECCION_BROKER', $_REQUEST['DIRECCIONBROKER']);
                $BROKER->__SET('CONTACTO1_BROKER', $_REQUEST['CONTACTOBROKER1']);
                $BROKER->__SET('CARGO1_BROKER', $_REQUEST['CARGOBROKER1']);
                $BROKER->__SET('EMAIL1_BROKER', $_REQUEST['EMAILBROKER1']);
                $BROKER->__SET('CONTACTO2_BROKER', $_REQUEST['CONTACTOBROKER2']);
                $BROKER->__SET('CARGO2_BROKER', $_REQUEST['CARGOBROKER2']);
                $BROKER->__SET('EMAIL2_BROKER', $_REQUEST['EMAILBROKER2']);
                $BROKER->__SET('CONTACTO3_BROKER', $_REQUEST['CONTACTOBROKER3']);
                $BROKER->__SET('CARGO3_BROKER', $_REQUEST['CARGOBROKER3']);
                $BROKER->__SET('EMAIL3_BROKER', $_REQUEST['EMAILBROKER3']);
                $BROKER->__SET('ID_CIUDAD', $_REQUEST['CIUDAD']);
                $BROKER->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                $BROKER->__SET('ID_USUARIOI', $IDUSUARIOS);
                $BROKER->__SET('ID_USUARIOM', $IDUSUARIOS);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $BROKER_ADO->agregarBroker($BROKER);

                $AUSUARIO_ADO->agregarAusuario2("NULL",3,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Cliente.","fruta_broker","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );  

                //REDIRECCIONAR A PAGINA registroBroker.php
                        echo '<script>
                            Swal.fire({
                                icon:"success",
                                title:"Registro Creado",
                                text:"El registro del mantenedor se ha creado correctamente",
                                showConfirmButton: true,
                                confirmButtonText:"Cerrar",
                                closeOnConfirm:false
                            }).then((result)=>{
                                location.href = "registroBroker.php";                            
                            })
                        </script>';
            }
            //OPERACION EDICION DE FILA
            if (isset($_REQUEST['EDITAR'])) {
                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO  
                $BROKER->__SET('NOMBRE_BROKER', $_REQUEST['NOMBREBROKER']);
                $BROKER->__SET('EORI_BROKER', $_REQUEST['EORIBROKER']);
                $BROKER->__SET('DIRECCION_BROKER', $_REQUEST['DIRECCIONBROKER']);
                $BROKER->__SET('CONTACTO1_BROKER', $_REQUEST['CONTACTOBROKER1']);
                $BROKER->__SET('CARGO1_BROKER', $_REQUEST['CARGOBROKER1']);
                $BROKER->__SET('EMAIL1_BROKER', $_REQUEST['EMAILBROKER1']);
                $BROKER->__SET('CONTACTO2_BROKER', $_REQUEST['CONTACTOBROKER2']);
                $BROKER->__SET('CARGO2_BROKER', $_REQUEST['CARGOBROKER2']);
                $BROKER->__SET('EMAIL2_BROKER', $_REQUEST['EMAILBROKER2']);
                $BROKER->__SET('CONTACTO3_BROKER', $_REQUEST['CONTACTOBROKER3']);
                $BROKER->__SET('CARGO3_BROKER', $_REQUEST['CARGOBROKER3']);
                $BROKER->__SET('EMAIL3_BROKER', $_REQUEST['EMAILBROKER3']);
                $BROKER->__SET('ID_CIUDAD', $_REQUEST['CIUDAD']);
                $BROKER->__SET('ID_USUARIOM', $IDUSUARIOS);
                $BROKER->__SET('ID_BROKER', $_REQUEST['ID']);
                //LLAMADA AL METODO DE EDICION DEL CONTROLADOR
                $BROKER_ADO->actualizarBroker($BROKER);

                $AUSUARIO_ADO->agregarAusuario2("NULL",3,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de Cliente.","fruta_broker", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );     

                //REDIRECCIONAR A PAGINA registroBroker.php
                    echo '<script>
                        Swal.fire({
                            icon:"success",
                            title:"Registro Modificado",
                            text:"El registro del mantenedor se ha Modificado correctamente",
                            showConfirmButton: true,
                            confirmButtonText:"Cerrar",
                            closeOnConfirm:false
                        }).then((result)=>{
                            location.href = "registroBroker.php";                            
                        })
                    </script>';
            }
            if (isset($_REQUEST['ELIMINAR'])) {     
                
                
                $BROKER->__SET('ID_BROKER', $_REQUEST['ID']);
                $BROKER_ADO->deshabilitar($BROKER);

                $AUSUARIO_ADO->agregarAusuario2("NULL",3,4,"".$_SESSION["NOMBRE_USUARIO"].", Deshabilitar Cliente.","fruta_broker", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );                
                
                echo '<script>
                    Swal.fire({
                        icon:"error",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Deshabilitado correctamente", 
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroBroker.php";                            
                    })
                </script>';
            }
            
            if (isset($_REQUEST['HABILITAR'])) {   

                $BROKER->__SET('ID_BROKER', $_REQUEST['ID']);
                $BROKER_ADO->habilitar($BROKER);

                $AUSUARIO_ADO->agregarAusuario2("NULL",3,5,"".$_SESSION["NOMBRE_USUARIO"].", Habilitar Cliente.","fruta_broker", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );                               

                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Habilitado correctamente", 
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroBroker.php";                            
                    })
                </script>';
            }

        ?>
</body>

</html>