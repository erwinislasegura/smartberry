<?php

include_once "../../assest/config/validarUsuarioFruta.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/RFINAL_ADO.php';

include_once '../../assest/modelo/RFINAL.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR



$RFINAL_ADO =  new RFINAL_ADO();
//INIICIALIZAR MODELO
$RFINAL =  new RFINAL();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$OP = "";
$DISABLED = "";

$NOMBRERFINAL = "";
$DIRECCIONRFINAL = "";
$CONTACTORFINAL1 = "";
$CARGORFINAL1 = "";
$EMAILRFINAL1 = "";
$CONTACTORFINAL2 = "";
$CARGORFINAL2 = "";
$EMAILRFINAL2 = "";
$CONTACTORFINAL3 = "";
$CARGORFINAL3 = "";
$EMAILRFINAL3 = "";


$SINO = "";


//INICIALIZAR ARREGLOS
$ARRAYRFINAL = "";
$ARRAYRFINALID = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES



//OPERACIONES
//OPERACION DE REGISTRO DE FILA

if (isset($_REQUEST['GUARDAR'])) {


    $ARRAYNUMERO = $RFINAL_ADO->obtenerNumero($EMPRESAS);
    $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;


    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
    $RFINAL->__SET('NUMERO_RFINAL', $NUMERO);
    $RFINAL->__SET('NOMBRE_RFINAL', $_REQUEST['NOMBRERFINAL']);
    $RFINAL->__SET('DIRECCION_RFINAL', $_REQUEST['DIRECCIONRFINAL']);
    $RFINAL->__SET('CONTACTO1_RFINAL', $_REQUEST['CONTACTORFINAL1']);
    $RFINAL->__SET('CARGO1_RFINAL', $_REQUEST['CARGORFINAL1']);
    $RFINAL->__SET('EMAIL1_RFINAL', $_REQUEST['EMAILRFINAL1']);
    $RFINAL->__SET('CONTACTO2_RFINAL', $_REQUEST['CONTACTORFINAL2']);
    $RFINAL->__SET('CARGO2_RFINAL', $_REQUEST['CARGORFINAL2']);
    $RFINAL->__SET('EMAIL2_RFINAL', $_REQUEST['EMAILRFINAL2']);
    $RFINAL->__SET('CONTACTO3_RFINAL', $_REQUEST['CONTACTORFINAL3']);
    $RFINAL->__SET('CARGO3_RFINAL', $_REQUEST['CARGORFINAL3']);
    $RFINAL->__SET('EMAIL3_RFINAL', $_REQUEST['EMAILRFINAL3']);
    $RFINAL->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
    $RFINAL->__SET('ID_USUARIOI', $IDUSUARIOS);
    $RFINAL->__SET('ID_USUARIOM', $IDUSUARIOS);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $RFINAL_ADO->agregarRfinal($RFINAL);

    $AUSUARIO_ADO->agregarAusuario2("NULL",1,1,"".$_SESSION["NOMBRE_USUARIO"].",Pop, Registro de Recibidor Final.","fruta_rfinal","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );  

    //REDIRECCIONAR A PAGINA registroRfinal.php
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
    <title>Registro Recibidor final</title>
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

                    NOMBRERFINAL = document.getElementById("NOMBRERFINAL").value;
                    DIRECCIONRFINAL = document.getElementById("DIRECCIONRFINAL").value;
                    CONTACTORFINAL1 = document.getElementById("CONTACTORFINAL1").value;
                    CARGORFINAL1 = document.getElementById("CARGORFINAL1").value;
                    EMAILRFINAL1 = document.getElementById("EMAILRFINAL1").value;
                    CONTACTORFINAL2 = document.getElementById("CONTACTORFINAL2").value;
                    CARGORFINAL2 = document.getElementById("CARGORFINAL2").value;
                    EMAILRFINAL2 = document.getElementById("EMAILRFINAL2").value;
                    CONTACTORFINAL3 = document.getElementById("CONTACTORFINAL3").value;
                    CARGORFINAL3 = document.getElementById("CARGORFINAL3").value;
                    EMAILRFINAL3 = document.getElementById("EMAILRFINAL3").value;


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



                    if (NOMBRERFINAL == null || NOMBRERFINAL.length == 0 || /^\s+$/.test(NOMBRERFINAL)) {
                        document.form_reg_dato.NOMBRERFINAL.focus();
                        document.form_reg_dato.NOMBRERFINAL.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBRERFINAL.style.borderColor = "#4AF575";



                    if (DIRECCIONRFINAL == null || DIRECCIONRFINAL.length == 0 || /^\s+$/.test(DIRECCIONRFINAL)) {
                        document.form_reg_dato.DIRECCIONRFINAL.focus();
                        document.form_reg_dato.DIRECCIONRFINAL.style.borderColor = "#FF0000";
                        document.getElementById('val_direccion').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DIRECCIONRFINAL.style.borderColor = "#4AF575";
                    /*
                    

                       if (CONTACTORFINAL1 == null || CONTACTORFINAL1.length == 0 || /^\s+$/.test(CONTACTORFINAL1)) {
                           document.form_reg_dato.CONTACTORFINAL1.focus();
                           document.form_reg_dato.CONTACTORFINAL1.style.borderColor = "#FF0000";
                           document.getElementById('val_contacto1').innerHTML = "NO A INGRESADO DATO";
                           return false;
                       }
                       document.form_reg_dato.CONTACTORFINAL1.style.borderColor = "#4AF575";



                       if (CARGORFINAL1 == null || CARGORFINAL1.length == 0 || /^\s+$/.test(CARGORFINAL1)) {
                           document.form_reg_dato.CARGORFINAL1.focus();
                           document.form_reg_dato.CARGORFINAL1.style.borderColor = "#FF0000";
                           document.getElementById('val_cargo1').innerHTML = "NO A INGRESADO DATO";
                           return false;
                       }
                       document.form_reg_dato.CARGORFINAL1.style.borderColor = "#4AF575";



                       if (EMAILRFINAL1 == null || EMAILRFINAL1.length == 0 || /^\s+$/.test(EMAILRFINAL1)) {
                           document.form_reg_dato.EMAILRFINAL1.focus();
                           document.form_reg_dato.EMAILRFINAL1.style.borderColor = "#FF0000";
                           document.getElementById('val_email1').innerHTML = "NO A INGRESADO DATO";
                           return false;
                       }
                       document.form_reg_dato.EMAILRFINAL1.style.borderColor = "#4AF575";


                       if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
                               .test(EMAILRFINAL1))) {
                           document.form_reg_dato.EMAILRFINAL1.focus();
                           document.form_reg_dato.EMAILRFINAL1.style.borderColor = "#ff0000";
                           document.getElementById('val_email1').innerHTML = "FORMATO DE CORREO INCORRECTO";
                           return false;
                       }
                       document.form_reg_dato.EMAILRFINAL1.style.borderColor = "#4AF575";



                       if (CONTACTORFINAL2 == null || CONTACTORFINAL2.length == 0 || /^\s+$/.test(CONTACTORFINAL2)) {
                           document.form_reg_dato.CONTACTORFINAL2.focus();
                           document.form_reg_dato.CONTACTORFINAL2.style.borderColor = "#FF0000";
                           document.getElementById('val_contacto2').innerHTML = "NO A INGRESADO DATO";
                           return false;
                       }
                       document.form_reg_dato.CONTACTORFINAL2.style.borderColor = "#4AF575";



                       if (CARGORFINAL2 == null || CARGORFINAL2.length == 0 || /^\s+$/.test(CARGORFINAL2)) {
                           document.form_reg_dato.CARGORFINAL2.focus();
                           document.form_reg_dato.CARGORFINAL2.style.borderColor = "#FF0000";
                           document.getElementById('val_cargo2').innerHTML = "NO A INGRESADO DATO";
                           return false;
                       }
                       document.form_reg_dato.CARGORFINAL2.style.borderColor = "#4AF575";



                       if (EMAILRFINAL2 == null || EMAILRFINAL2.length == 0 || /^\s+$/.test(EMAILRFINAL2)) {
                           document.form_reg_dato.EMAILRFINAL2.focus();
                           document.form_reg_dato.EMAILRFINAL2.style.borderColor = "#FF0000";
                           document.getElementById('val_email2').innerHTML = "NO A INGRESADO DATO";
                           return false;
                       }
                       document.form_reg_dato.EMAILRFINAL2.style.borderColor = "#4AF575";


                       if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
                               .test(EMAILRFINAL2))) {
                           document.form_reg_dato.EMAILRFINAL2.focus();
                           document.form_reg_dato.EMAILRFINAL2.style.borderColor = "#ff0000";
                           document.getElementById('val_email2').innerHTML = "FORMATO DE CORREO INCORRECTO";
                           return false;
                       }
                       document.form_reg_dato.EMAILRFINAL2.style.borderColor = "#4AF575";

                       if (CONTACTORFINAL3 == null || CONTACTORFINAL3.length == 0 || /^\s+$/.test(CONTACTORFINAL3)) {
                           document.form_reg_dato.CONTACTORFINAL3.focus();
                           document.form_reg_dato.CONTACTORFINAL3.style.borderColor = "#FF0000";
                           document.getElementById('val_contacto3').innerHTML = "NO A INGRESADO DATO";
                           return false;
                       }
                       document.form_reg_dato.CONTACTORFINAL3.style.borderColor = "#4AF575";



                       if (CARGORFINAL3 == null || CARGORFINAL3.length == 0 || /^\s+$/.test(CARGORFINAL3)) {
                           document.form_reg_dato.CARGORFINAL3.focus();
                           document.form_reg_dato.CARGORFINAL3.style.borderColor = "#FF0000";
                           document.getElementById('val_cargo3').innerHTML = "NO A INGRESADO DATO";
                           return false;
                       }
                       document.form_reg_dato.CARGORFINAL3.style.borderColor = "#4AF575";



                       if (EMAILRFINAL3 == null || EMAILRFINAL3.length == 0 || /^\s+$/.test(EMAILRFINAL3)) {
                           document.form_reg_dato.EMAILRFINAL3.focus();
                           document.form_reg_dato.EMAILRFINAL3.style.borderColor = "#FF0000";
                           document.getElementById('val_email3').innerHTML = "NO A INGRESADO DATO";
                           return false;
                       }
                       document.form_reg_dato.EMAILRFINAL3.style.borderColor = "#4AF575";


                       if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
                               .test(EMAILRFINAL3))) {
                           document.form_reg_dato.EMAILRFINAL3.focus();
                           document.form_reg_dato.EMAILRFINAL3.style.borderColor = "#ff0000";
                           document.getElementById('val_email3').innerHTML = "FORMATO DE CORREO INCORRECTO";
                           return false;
                       }
                       document.form_reg_dato.EMAILRFINAL3.style.borderColor = "#4AF575";

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
                                        <h4 class="box-title">Registro Recibidor Final</h4>                                
                                    </div>
                                    <!-- /.box-header -->
                                    <form class="form" role="form" method="post" name="form_reg_dato" name="form_reg_dato" enctype="multipart/form-data">
                                        <div class="box-body">
                                            <hr class="my-15">
                                            <div class="row">
                                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Nombre </label>
                                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                        <input type="hidden" class="form-control" placeholder="EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                        <input type="text" class="form-control" placeholder="Nombre Rfinal" id="NOMBRERFINAL" name="NOMBRERFINAL" value="<?php echo $NOMBRERFINAL; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nombre" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Direccion </label>
                                                        <input type="text" class="form-control" placeholder="Direccion Rfinal" id="DIRECCIONRFINAL" name="DIRECCIONRFINAL" value="<?php echo $DIRECCIONRFINAL; ?>" <?php echo $DISABLED; ?> />
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
                                                        <input type="text" class="form-control" placeholder="Nombre Contacto 1 Rfinal" id="CONTACTORFINAL1" name="CONTACTORFINAL1" value="<?php echo $CONTACTORFINAL1; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_contacto1" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Cargo 1</label>
                                                        <input type="text" class="form-control" placeholder="Cargo Contacto 1 Rfinal" id="CARGORFINAL1" name="CARGORFINAL1" value="<?php echo $CARGORFINAL1; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_cargo1" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Email 1</label>
                                                        <input type="text" class="form-control" placeholder="Email Contacto 1 Rfinal" id="EMAILRFINAL1" name="EMAILRFINAL1" value="<?php echo $EMAILRFINAL1; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_email1" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Contacto 2</label>
                                                        <input type="text" class="form-control" placeholder="Nombre Contacto 2 Rfinal" id="CONTACTORFINAL2" name="CONTACTORFINAL2" value="<?php echo $CONTACTORFINAL2; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_contacto2" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Cargo 2</label>
                                                        <input type="text" class="form-control" placeholder="Cargo Contacto 2 Rfinal" id="CARGORFINAL2" name="CARGORFINAL2" value="<?php echo $CARGORFINAL2; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_cargo2" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Email 2</label>
                                                        <input type="text" class="form-control" placeholder="Email Contacto 2 Rfinal" id="EMAILRFINAL2" name="EMAILRFINAL2" value="<?php echo $EMAILRFINAL2; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_email2" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Contacto 3</label>
                                                        <input type="text" class="form-control" placeholder="Nombre Contacto 3 Rfinal" id="CONTACTORFINAL3" name="CONTACTORFINAL3" value="<?php echo $CONTACTORFINAL3; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_contacto3" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Cargo 3</label>
                                                        <input type="text" class="form-control" placeholder="Cargo Contacto 3 Rfinal" id="CARGORFINAL3" name="CARGORFINAL3" value="<?php echo $CARGORFINAL3; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_cargo3" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Email 3</label>
                                                        <input type="text" class="form-control" placeholder="Email Contacto 3 Rfinal" id="EMAILRFINAL3" name="EMAILRFINAL3" value="<?php echo $EMAILRFINAL3; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_email3" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <div class="btn-group   col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12 " role="group" aria-label="Acciones generales">                                    
                                                <button type="button" class="btn  btn-warning " data-toggle="tooltip" title="Cerrar" name="CANCELAR" value="CANCELAR" Onclick="cerrar;">
                                                    <i class="ti-close"></i>Cancelar
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