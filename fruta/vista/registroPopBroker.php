<?php


include_once "../../assest/config/validarUsuarioFruta.php";

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


$SINO = "";


//INICIALIZAR ARREGLOS
$ARRAYBROKER = "";
$ARRAYBROKERID = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES


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
    $BROKER->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
    $BROKER->__SET('ID_USUARIOI', $IDUSUARIOS);
    $BROKER->__SET('ID_USUARIOM', $IDUSUARIOS);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $BROKER_ADO->agregarBroker($BROKER);

    $AUSUARIO_ADO->agregarAusuario2("NULL",1,1,"".$_SESSION["NOMBRE_USUARIO"].",Pop Registro de Cliente.","fruta_broker","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );  

    //REDIRECCIONAR A PAGINA registroBroker.php   
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
                    /*
                    CONTACTOBROKER1 = document.getElementById("CONTACTOBROKER1").value;
                    CARGOBROKER1 = document.getElementById("CARGOBROKER1").value;
                    EMAILBROKER1 = document.getElementById("EMAILBROKER1").value;
                    CONTACTOBROKER2 = document.getElementById("CONTACTOBROKER2").value;
                    CARGOBROKER2 = document.getElementById("CARGOBROKER2").value;
                    EMAILBROKER2 = document.getElementById("EMAILBROKER2").value;
                    CONTACTOBROKER3 = document.getElementById("CONTACTOBROKER3").value;
                    CARGOBROKER3 = document.getElementById("CARGOBROKER3").value;
                    EMAILBROKER3 = document.getElementById("EMAILBROKER3").value;*/


                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_eori').innerHTML = "";
                    document.getElementById('val_direccion').innerHTML = "";

                    /*
                    document.getElementById('val_contacto1').innerHTML = "";
                    document.getElementById('val_cargo1').innerHTML = "";
                    document.getElementById('val_email1').innerHTML = "";
                    document.getElementById('val_contacto2').innerHTML = "";
                    document.getElementById('val_cargo2').innerHTML = "";
                    document.getElementById('val_email2').innerHTML = "";
                    document.getElementById('val_contacto3').innerHTML = "";
                    document.getElementById('val_cargo3').innerHTML = "";
                    document.getElementById('val_email3').innerHTML = "";
                    document.getElementById('val_ciudad').innerHTML = "";
                    */



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
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
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
                                                <button type="button" class="btn  btn-warning " data-toggle="tooltip" title="Cerrar" name="CANCELAR" value="CANCELAR" Onclick="cerrar;">
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
    
    <!-- /.content-wrapper -->


    <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>¿
        <?php //include_once "../../assest/config/menuExtra.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
    <?php include_once "../../assest/config/urlBase.php"; ?>
</body>
</html>