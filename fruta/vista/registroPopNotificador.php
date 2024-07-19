<?php

include_once "../../assest/config/validarUsuarioFruta.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/NOTIFICADOR_ADO.php';
include_once '../../assest/modelo/NOTIFICADOR.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR



$NOTIFICADOR_ADO =  new NOTIFICADOR_ADO();
//INIICIALIZAR MODELO
$NOTIFICADOR =  new NOTIFICADOR();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$OP = "";
$DISABLED = "";

$NOMBRENOTIFICADOR = "";
$EORINOTIFICADOR = "";
$DIRECCIONNOTIFICADOR = "";
$TELEFONONOTIFICADOR = "";
$CONTACTONOTIFICADOR1 = "";
$CARGONOTIFICADOR1 = "";
$EMAILNOTIFICADOR1 = "";
$CONTACTONOTIFICADOR2 = "";
$CARGONOTIFICADOR2 = "";
$EMAILNOTIFICADOR2 = "";
$CONTACTONOTIFICADOR3 = "";
$CARGONOTIFICADOR3 = "";
$EMAILNOTIFICADOR3 = "";



$SINO = "";


//INICIALIZAR ARREGLOS
$ARRAYNOTIFICADOR = "";
$ARRAYNOTIFICADORID = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES



//OPERACIONES
//OPERACION DE REGISTRO DE FILA

if (isset($_REQUEST['GUARDAR'])) {

    $ARRAYNUMERO = $NOTIFICADOR_ADO->obtenerNumero($EMPRESAS);
    $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;


    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
    $NOTIFICADOR->__SET('NUMERO_NOTIFICADOR', $NUMERO);
    $NOTIFICADOR->__SET('NOMBRE_NOTIFICADOR', $_REQUEST['NOMBRENOTIFICADOR']);
    $NOTIFICADOR->__SET('EORI_NOTIFICADOR', $_REQUEST['EORINOTIFICADOR']);
    $NOTIFICADOR->__SET('DIRECCION_NOTIFICADOR', $_REQUEST['DIRECCIONNOTIFICADOR']);
    $NOTIFICADOR->__SET('TELEFONO_NOTIFICADOR', $_REQUEST['TELEFONONOTIFICADOR']);
    $NOTIFICADOR->__SET('CONTACTO1_NOTIFICADOR', $_REQUEST['CONTACTONOTIFICADOR1']);
    $NOTIFICADOR->__SET('CARGO1_NOTIFICADOR', $_REQUEST['CARGONOTIFICADOR1']);
    $NOTIFICADOR->__SET('EMAIL1_NOTIFICADOR', $_REQUEST['EMAILNOTIFICADOR1']);
    $NOTIFICADOR->__SET('CONTACTO2_NOTIFICADOR', $_REQUEST['CONTACTONOTIFICADOR2']);
    $NOTIFICADOR->__SET('CARGO2_NOTIFICADOR', $_REQUEST['CARGONOTIFICADOR2']);
    $NOTIFICADOR->__SET('EMAIL2_NOTIFICADOR', $_REQUEST['EMAILNOTIFICADOR2']);
    $NOTIFICADOR->__SET('CONTACTO3_NOTIFICADOR', $_REQUEST['CONTACTONOTIFICADOR3']);
    $NOTIFICADOR->__SET('CARGO3_NOTIFICADOR', $_REQUEST['CARGONOTIFICADOR3']);
    $NOTIFICADOR->__SET('EMAIL3_NOTIFICADOR', $_REQUEST['EMAILNOTIFICADOR3']);
    $NOTIFICADOR->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
    $NOTIFICADOR->__SET('ID_USUARIOI', $IDUSUARIOS);
    $NOTIFICADOR->__SET('ID_USUARIOM', $IDUSUARIOS);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR

    $AUSUARIO_ADO->agregarAusuario2("NULL",1,1,"".$_SESSION["NOMBRE_USUARIO"].",Pop, Registro de Notificador.","fruta_notificador","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );  

    $NOTIFICADOR_ADO->agregarNotificador($NOTIFICADOR);
    //REDIRECCIONAR A PAGINA registroNotificador.php
    echo "
    <script type='text/javascript'>
        window.opener.refrescar()
        window.close();
        </script> 
    ";
}



?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Notificador</title>
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

                    NOMBRENOTIFICADOR = document.getElementById("NOMBRENOTIFICADOR").value;
                    EORINOTIFICADOR = document.getElementById("EORINOTIFICADOR").value;
                    DIRECCIONNOTIFICADOR = document.getElementById("DIRECCIONNOTIFICADOR").value;
                    CONTACTONOTIFICADOR1 = document.getElementById("CONTACTONOTIFICADOR1").value;
                    CARGONOTIFICADOR1 = document.getElementById("CARGONOTIFICADOR1").value;
                    EMAILNOTIFICADOR1 = document.getElementById("EMAILNOTIFICADOR1").value;
                    CONTACTONOTIFICADOR2 = document.getElementById("CONTACTONOTIFICADOR2").value;
                    CARGONOTIFICADOR2 = document.getElementById("CARGONOTIFICADOR2").value;
                    EMAILNOTIFICADOR2 = document.getElementById("EMAILNOTIFICADOR2").value;
                    CONTACTONOTIFICADOR3 = document.getElementById("CONTACTONOTIFICADOR3").value;
                    CARGONOTIFICADOR3 = document.getElementById("CARGONOTIFICADOR3").value;
                    EMAILNOTIFICADOR3 = document.getElementById("EMAILNOTIFICADOR3").value;


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



                    if (NOMBRENOTIFICADOR == null || NOMBRENOTIFICADOR.length == 0 || /^\s+$/.test(NOMBRENOTIFICADOR)) {
                        document.form_reg_dato.NOMBRENOTIFICADOR.focus();
                        document.form_reg_dato.NOMBRENOTIFICADOR.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBRENOTIFICADOR.style.borderColor = "#4AF575";


                    if (EORINOTIFICADOR == null || EORINOTIFICADOR.length == 0 || /^\s+$/.test(EORINOTIFICADOR)) {
                        document.form_reg_dato.EORINOTIFICADOR.focus();
                        document.form_reg_dato.EORINOTIFICADOR.style.borderColor = "#FF0000";
                        document.getElementById('val_eori').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.EORINOTIFICADOR.style.borderColor = "#4AF575";


                    if (DIRECCIONNOTIFICADOR == null || DIRECCIONNOTIFICADOR.length == 0 || /^\s+$/.test(DIRECCIONNOTIFICADOR)) {
                        document.form_reg_dato.DIRECCIONNOTIFICADOR.focus();
                        document.form_reg_dato.DIRECCIONNOTIFICADOR.style.borderColor = "#FF0000";
                        document.getElementById('val_direccion').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DIRECCIONNOTIFICADOR.style.borderColor = "#4AF575";

                    /*
                                       


                                        if (CONTACTONOTIFICADOR1 == null || CONTACTONOTIFICADOR1.length == 0 || /^\s+$/.test(CONTACTONOTIFICADOR1)) {
                                            document.form_reg_dato.CONTACTONOTIFICADOR1.focus();
                                            document.form_reg_dato.CONTACTONOTIFICADOR1.style.borderColor = "#FF0000";
                                            document.getElementById('val_contacto1').innerHTML = "NO A INGRESADO DATO";
                                            return false;
                                        }
                                        document.form_reg_dato.CONTACTONOTIFICADOR1.style.borderColor = "#4AF575";



                                        if (CARGONOTIFICADOR1 == null || CARGONOTIFICADOR1.length == 0 || /^\s+$/.test(CARGONOTIFICADOR1)) {
                                            document.form_reg_dato.CARGONOTIFICADOR1.focus();
                                            document.form_reg_dato.CARGONOTIFICADOR1.style.borderColor = "#FF0000";
                                            document.getElementById('val_cargo1').innerHTML = "NO A INGRESADO DATO";
                                            return false;
                                        }
                                        document.form_reg_dato.CARGONOTIFICADOR1.style.borderColor = "#4AF575";



                                        if (EMAILNOTIFICADOR1 == null || EMAILNOTIFICADOR1.length == 0 || /^\s+$/.test(EMAILNOTIFICADOR1)) {
                                            document.form_reg_dato.EMAILNOTIFICADOR1.focus();
                                            document.form_reg_dato.EMAILNOTIFICADOR1.style.borderColor = "#FF0000";
                                            document.getElementById('val_email1').innerHTML = "NO A INGRESADO DATO";
                                            return false;
                                        }
                                        document.form_reg_dato.EMAILNOTIFICADOR1.style.borderColor = "#4AF575";


                                        if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
                                                .test(EMAILNOTIFICADOR1))) {
                                            document.form_reg_dato.EMAILNOTIFICADOR1.focus();
                                            document.form_reg_dato.EMAILNOTIFICADOR1.style.borderColor = "#ff0000";
                                            document.getElementById('val_email1').innerHTML = "FORMATO DE CORREO INCORRECTO";
                                            return false;
                                        }
                                        document.form_reg_dato.EMAILNOTIFICADOR1.style.borderColor = "#4AF575";



                                        if (CONTACTONOTIFICADOR2 == null || CONTACTONOTIFICADOR2.length == 0 || /^\s+$/.test(CONTACTONOTIFICADOR2)) {
                                            document.form_reg_dato.CONTACTONOTIFICADOR2.focus();
                                            document.form_reg_dato.CONTACTONOTIFICADOR2.style.borderColor = "#FF0000";
                                            document.getElementById('val_contacto2').innerHTML = "NO A INGRESADO DATO";
                                            return false;
                                        }
                                        document.form_reg_dato.CONTACTONOTIFICADOR2.style.borderColor = "#4AF575";



                                        if (CARGONOTIFICADOR2 == null || CARGONOTIFICADOR2.length == 0 || /^\s+$/.test(CARGONOTIFICADOR2)) {
                                            document.form_reg_dato.CARGONOTIFICADOR2.focus();
                                            document.form_reg_dato.CARGONOTIFICADOR2.style.borderColor = "#FF0000";
                                            document.getElementById('val_cargo2').innerHTML = "NO A INGRESADO DATO";
                                            return false;
                                        }
                                        document.form_reg_dato.CARGONOTIFICADOR2.style.borderColor = "#4AF575";



                                        if (EMAILNOTIFICADOR2 == null || EMAILNOTIFICADOR2.length == 0 || /^\s+$/.test(EMAILNOTIFICADOR2)) {
                                            document.form_reg_dato.EMAILNOTIFICADOR2.focus();
                                            document.form_reg_dato.EMAILNOTIFICADOR2.style.borderColor = "#FF0000";
                                            document.getElementById('val_email2').innerHTML = "NO A INGRESADO DATO";
                                            return false;
                                        }
                                        document.form_reg_dato.EMAILNOTIFICADOR2.style.borderColor = "#4AF575";


                                        if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
                                                .test(EMAILNOTIFICADOR2))) {
                                            document.form_reg_dato.EMAILNOTIFICADOR2.focus();
                                            document.form_reg_dato.EMAILNOTIFICADOR2.style.borderColor = "#ff0000";
                                            document.getElementById('val_email2').innerHTML = "FORMATO DE CORREO INCORRECTO";
                                            return false;
                                        }
                                        document.form_reg_dato.EMAILNOTIFICADOR2.style.borderColor = "#4AF575";

                                        if (CONTACTONOTIFICADOR3 == null || CONTACTONOTIFICADOR3.length == 0 || /^\s+$/.test(CONTACTONOTIFICADOR3)) {
                                            document.form_reg_dato.CONTACTONOTIFICADOR3.focus();
                                            document.form_reg_dato.CONTACTONOTIFICADOR3.style.borderColor = "#FF0000";
                                            document.getElementById('val_contacto3').innerHTML = "NO A INGRESADO DATO";
                                            return false;
                                        }
                                        document.form_reg_dato.CONTACTONOTIFICADOR3.style.borderColor = "#4AF575";



                                        if (CARGONOTIFICADOR3 == null || CARGONOTIFICADOR3.length == 0 || /^\s+$/.test(CARGONOTIFICADOR3)) {
                                            document.form_reg_dato.CARGONOTIFICADOR3.focus();
                                            document.form_reg_dato.CARGONOTIFICADOR3.style.borderColor = "#FF0000";
                                            document.getElementById('val_cargo3').innerHTML = "NO A INGRESADO DATO";
                                            return false;
                                        }
                                        document.form_reg_dato.CARGONOTIFICADOR3.style.borderColor = "#4AF575";



                                        if (EMAILNOTIFICADOR3 == null || EMAILNOTIFICADOR3.length == 0 || /^\s+$/.test(EMAILNOTIFICADOR3)) {
                                            document.form_reg_dato.EMAILNOTIFICADOR3.focus();
                                            document.form_reg_dato.EMAILNOTIFICADOR3.style.borderColor = "#FF0000";
                                            document.getElementById('val_email3').innerHTML = "NO A INGRESADO DATO";
                                            return false;
                                        }
                                        document.form_reg_dato.EMAILNOTIFICADOR3.style.borderColor = "#4AF575";


                                        if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
                                                .test(EMAILNOTIFICADOR3))) {
                                            document.form_reg_dato.EMAILNOTIFICADOR3.focus();
                                            document.form_reg_dato.EMAILNOTIFICADOR3.style.borderColor = "#ff0000";
                                            document.getElementById('val_email3').innerHTML = "FORMATO DE CORREO INCORRECTO";
                                            return false;
                                        }
                                        document.form_reg_dato.EMAILNOTIFICADOR3.style.borderColor = "#4AF575";
                    */



                }

                //FUNCION PARA CERRAR VENTANA Y ACTUALIZAR PRINCIPAL
                function cerrar() {
                    window.opener.refrescar()
                    window.close();
                }
            </script>

</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary">
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>

            <!-- Main content -->
                    <section class="content">
                        <div class="row">
                                <div class="box">
                                    <div class="box-header with-border bg-primary">                                
                                        <h4 class="box-title">Registro Notificador</h4>                                
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
                                                        <input type="text" class="form-control" placeholder="Nombre Notificador" id="NOMBRENOTIFICADOR" name="NOMBRENOTIFICADOR" value="<?php echo $NOMBRENOTIFICADOR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nombre" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>ID Tributario(EORI) </label>
                                                        <input type="text" class="form-control" placeholder="ID Tributario Notificador" id="EORINOTIFICADOR" name="EORINOTIFICADOR" value="<?php echo $EORINOTIFICADOR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_eori" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Direccion </label>
                                                        <input type="text" class="form-control" placeholder="Direccion Notificador" id="DIRECCIONNOTIFICADOR" name="DIRECCIONNOTIFICADOR" value="<?php echo $DIRECCIONNOTIFICADOR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_direccion" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Telefono / Fax </label>
                                                        <input type="text" class="form-control" placeholder="Telefono / Fax Notificador" id="TELEFONONOTIFICADOR" name="TELEFONONOTIFICADOR" value="<?php echo $TELEFONONOTIFICADOR; ?>" <?php echo $DISABLED; ?> />
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
                                                        <input type="text" class="form-control" placeholder="Nombre Contacto 1 Notificador" id="CONTACTONOTIFICADOR1" name="CONTACTONOTIFICADOR1" value="<?php echo $CONTACTONOTIFICADOR1; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_contacto1" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Cargo 1</label>
                                                        <input type="text" class="form-control" placeholder="Cargo Contacto 1 Notificador" id="CARGONOTIFICADOR1" name="CARGONOTIFICADOR1" value="<?php echo $CARGONOTIFICADOR1; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_cargo1" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Email 1</label>
                                                        <input type="text" class="form-control" placeholder="Email Contacto 1 Notificador" id="EMAILNOTIFICADOR1" name="EMAILNOTIFICADOR1" value="<?php echo $EMAILNOTIFICADOR1; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_email1" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Contacto 2</label>
                                                        <input type="text" class="form-control" placeholder="Nombre Contacto 2 Notificador" id="CONTACTONOTIFICADOR2" name="CONTACTONOTIFICADOR2" value="<?php echo $CONTACTONOTIFICADOR2; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_contacto2" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Cargo 2</label>
                                                        <input type="text" class="form-control" placeholder="Cargo Contacto 2 Notificador" id="CARGONOTIFICADOR2" name="CARGONOTIFICADOR2" value="<?php echo $CARGONOTIFICADOR2; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_cargo2" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Email 2</label>
                                                        <input type="text" class="form-control" placeholder="Email Contacto 2 Notificador" id="EMAILNOTIFICADOR2" name="EMAILNOTIFICADOR2" value="<?php echo $EMAILNOTIFICADOR2; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_email2" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Contacto 3</label>
                                                        <input type="text" class="form-control" placeholder="Nombre Contacto 3 Notificador" id="CONTACTONOTIFICADOR3" name="CONTACTONOTIFICADOR3" value="<?php echo $CONTACTONOTIFICADOR3; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_contacto3" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Cargo 3</label>
                                                        <input type="text" class="form-control" placeholder="Cargo Contacto 3 Notificador" id="CARGONOTIFICADOR3" name="CARGONOTIFICADOR3" value="<?php echo $CARGONOTIFICADOR3; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_cargo3" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Email 3</label>
                                                        <input type="text" class="form-control" placeholder="Email Contacto 3 Notificador" id="EMAILNOTIFICADOR3" name="EMAILNOTIFICADOR3" value="<?php echo $EMAILNOTIFICADOR3; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_email3" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->            
                                        <div class="box-footer">
                                            <div class="btn-group   col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12 " role="group" aria-label="Acciones generales">                                    
                                                <button type="button" class="btn  btn-warning " data-toggle="tooltip" title="Cerrar" name="CANCELAR" value="CANCELAR" Onclick="cerrar();">
                                                    <i class="ti-close"></i> Cerrar
                                                </button>
                                                <button type="submit" class="btn btn-primary" name="GUARDAR" value="GUARDAR"  data-toggle="tooltip" title="Guardar"  <?php echo $DISABLED; ?> Onclick="return validacion()">
                                                    <i class="ti-save-alt"></i> Guardar
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.box -->
                        </div>
                        <!--.row -->
                    </section>
            <!-- /.content -->

            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php //include_once "../../assest/config/menuExtra.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../../assest/config/urlBase.php"; ?>
</body>

</html>