<?php

include_once "../../assest/config/validarUsuarioFruta.php";

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



//INICIALIZAR ARREGLOS
$ARRAYNAVIERA = "";
$ARRAYNAVIERAID = "";




//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES

//OPERACIONES
//OPERACION DE REGISTRO DE FILA
if (isset($_REQUEST['GUARDAR'])) {


    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   

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

    $AUSUARIO_ADO->agregarAusuario2("NULL",1,1,"".$_SESSION["NOMBRE_USUARIO"].",Pop, Registro de Naviera.","transporte_naviera","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );  

    //REDIRECCIONAR A PAGINA registroNaviera.php
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