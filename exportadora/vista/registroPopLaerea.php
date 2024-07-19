<?php

include_once "../../assest/config/validarUsuarioExpo.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../../assest/controlador/LAEREA_ADO.php';
include_once '../../assest/modelo/LAEREA.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$LAEREA_ADO =  new LAEREA_ADO();
//INIICIALIZAR MODELO
$LAEREA =  new LAEREA();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$OP = "";
$DISABLED = "";

$RUTLAEREA = "";
$DVLAEREA = "";
$NOMBRELAEREA = "";
$GIROLAEREA = "";
$RAZONSOCIALLAEREA = "";
$DIRRECIONLAEREA = "";
$NOTALAEREA = "";
$CONTACTOLAEREA = "";
$TELEFONOLAEREA = "";
$EMAILLAEREA = "";


//INICIALIZAR ARREGLOS
$ARRAYLAEREA = "";
$ARRAYLAEREAID = "";




//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES

//OPERACIONES
//OPERACION DE REGISTRO DE FILA
if (isset($_REQUEST['GUARDAR'])) {


    $ARRAYNUMERO = $LAEREA_ADO->obtenerNumero($EMPRESAS);
    $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;


    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   

    $LAEREA->__SET('NUMERO_LAEREA', $NUMERO);
    $LAEREA->__SET('RUT_LAEREA', $_REQUEST['RUTLAEREA']);
    $LAEREA->__SET('DV_LAEREA', $_REQUEST['DVLAEREA']);
    $LAEREA->__SET('NOMBRE_LAEREA', $_REQUEST['NOMBRELAEREA']);
    $LAEREA->__SET('GIRO_LAEREA', $_REQUEST['GIROLAEREA']);
    $LAEREA->__SET('RAZON_SOCIAL_LAEREA', $_REQUEST['RAZONSOCIALLAEREA']);
    $LAEREA->__SET('DIRECCION_LAEREA', $_REQUEST['DIRRECIONLAEREA']);
    $LAEREA->__SET('CONTACTO_LAEREA', $_REQUEST['CONTACTOLAEREA']);
    $LAEREA->__SET('TELEFONO_LAEREA', $_REQUEST['TELEFONOLAEREA']);
    $LAEREA->__SET('EMAIL_LAEREA', $_REQUEST['EMAILLAEREA']);
    $LAEREA->__SET('NOTA_LAEREA', $_REQUEST['NOTALAEREA']);
    $LAEREA->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
    $LAEREA->__SET('ID_USUARIOI', $IDUSUARIOS);
    $LAEREA->__SET('ID_USUARIOM', $IDUSUARIOS);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR

    $AUSUARIO_ADO->agregarAusuario2("NULL",3,1,"".$_SESSION["NOMBRE_USUARIO"].",Pop, Registro de Linea Aerea.","transporte_laerea","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );  

    $LAEREA_ADO->agregarLaerea($LAEREA);
    //REDIRECCIONAR A PAGINA registroLaerea.php
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
    <title>Registro Laerea</title>
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

                    RUTLAEREA = document.getElementById("RUTLAEREA").value;
                    DVLAEREA = document.getElementById("DVLAEREA").value;
                    NOMBRELAEREA = document.getElementById("NOMBRELAEREA").value;
                    GIROLAEREA = document.getElementById("GIROLAEREA").value;
                    RAZONSOCIALLAEREA = document.getElementById("RAZONSOCIALLAEREA").value;
                    DIRRECIONLAEREA = document.getElementById("DIRRECIONLAEREA").value;
                    CONTACTOLAEREA = document.getElementById("CONTACTOLAEREA").value;
                    TELEFONOLAEREA = document.getElementById("TELEFONOLAEREA").value;
                    EMAILLAEREA = document.getElementById("EMAILLAEREA").value;

                    document.getElementById('val_rut').innerHTML = "";
                    document.getElementById('val_dv').innerHTML = "";
                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_giro').innerHTML = "";
                    document.getElementById('val_rsocial').innerHTML = "";
                    document.getElementById('val_dirrecion').innerHTML = "";
                    document.getElementById('val_contacto').innerHTML = "";
                    document.getElementById('val_telefono').innerHTML = "";
                    document.getElementById('val_email').innerHTML = "";

                    if (RUTLAEREA == null || RUTLAEREA.length == 0 || /^\s+$/.test(RUTLAEREA)) {
                        document.form_reg_dato.RUTLAEREA.focus();
                        document.form_reg_dato.RUTLAEREA.style.borderColor = "#FF0000";
                        document.getElementById('val_rut').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.RUTLAEREA.style.borderColor = "#4AF575";

                    if (DVLAEREA == null || DVLAEREA.length == 0 || /^\s+$/.test(RUTLAEREA)) {
                        document.form_reg_dato.DVLAEREA.focus();
                        document.form_reg_dato.RUTLAEREA.style.borderColor = "#FF0000";
                        document.getElementById('val_dv').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DVLAEREA.style.borderColor = "#4AF575";


                    if (NOMBRELAEREA == null || NOMBRELAEREA.length == 0 || /^\s+$/.test(NOMBRELAEREA)) {
                        document.form_reg_dato.NOMBRELAEREA.focus();
                        document.form_reg_dato.NOMBRELAEREA.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBRELAEREA.style.borderColor = "#4AF575";
                 /*
                    if (GIROLAEREA == null || GIROLAEREA.length == 0 || /^\s+$/.test(GIROLAEREA)) {
                        document.form_reg_dato.GIROLAEREA.focus();
                        document.form_reg_dato.GIROLAEREA.style.borderColor = "#FF0000";
                        document.getElementById('val_giro').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.GIROLAEREA.style.borderColor = "#4AF575";

                    if (RAZONSOCIALLAEREA == null || RAZONSOCIALLAEREA.length == 0 || /^\s+$/.test(RAZONSOCIALLAEREA)) {
                        document.form_reg_dato.RAZONSOCIALLAEREA.focus();
                        document.form_reg_dato.RAZONSOCIALLAEREA.style.borderColor = "#FF0000";
                        document.getElementById('val_rsocial').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.RAZONSOCIALLAEREA.style.borderColor = "#4AF575";
                    ¨*/

                    if (DIRRECIONLAEREA == null || DIRRECIONLAEREA.length == 0 || /^\s+$/.test(DIRRECIONLAEREA)) {
                        document.form_reg_dato.DIRRECIONLAEREA.focus();
                        document.form_reg_dato.DIRRECIONLAEREA.style.borderColor = "#FF0000";
                        document.getElementById('val_dirrecion').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DIRRECIONLAEREA.style.borderColor = "#4AF575";
                    /*
                                    

                                        if (CONTACTOLAEREA == null || CONTACTOLAEREA.length == 0 || /^\s+$/.test(CONTACTOLAEREA)) {
                                            document.form_reg_dato.CONTACTOLAEREA.focus();
                                            document.form_reg_dato.CONTACTOLAEREA.style.borderColor = "#FF0000";
                                            document.getElementById('val_contacto').innerHTML = "NO A INGRESADO DATO";
                                            return false;
                                        }
                                        document.form_reg_dato.CONTACTOLAEREA.style.borderColor = "#4AF575";


                                        if (TELEFONOLAEREA == null || TELEFONOLAEREA == 0) {
                                            document.form_reg_dato.TELEFONOLAEREA.focus();
                                            document.form_reg_dato.TELEFONOLAEREA.style.borderColor = "#FF0000";
                                            document.getElementById('val_telefono').innerHTML = "NO A INGRESADO DATO";
                                            return false;
                                        }
                                        document.form_reg_dato.TELEFONOLAEREA.style.borderColor = "#4AF575";

                                        if (EMAILLAEREA == null || EMAILLAEREA.length == 0 || /^\s+$/.test(EMAILLAEREA)) {
                                            document.form_reg_dato.EMAILLAEREA.focus();
                                            document.form_reg_dato.EMAILLAEREA.style.borderColor = "#FF0000";
                                            document.getElementById('val_email').innerHTML = "NO A INGRESADO DATO";
                                            return false;
                                        }
                                        document.form_reg_dato.EMAILLAEREA.style.borderColor = "#4AF575";

                                        if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(EMAILLAEREA))) {
                                            document.form_reg_dato.EMAILLAEREA.focus();
                                            document.form_reg_dato.EMAILLAEREA.style.borderColor = "#ff0000";
                                            document.getElementById('val_email').innerHTML = "FORMATO DE CORREO INCORRECTO";
                                            return false;
                                        }
                                        document.form_reg_dato.EMAILLAEREA.style.borderColor = "#4AF575";


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
                                        <h4 class="box-title">Registro Linea Aerea</h4>                                
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
                                                        <input type="text" class="form-control" placeholder="Rut Laerea" id="RUTLAEREA" name="RUTLAEREA" value="<?php echo $RUTLAEREA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_rut" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 col-xs-2">
                                                    <div class="form-group">
                                                        <label>DV </label>
                                                        <input type="text" class="form-control" placeholder="DV Laerea" id="DVLAEREA" name="DVLAEREA" value="<?php echo $DVLAEREA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_dv" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Nombre </label>
                                                        <input type="text" class="form-control" placeholder="Nombre Laerea" id="NOMBRELAEREA" name="NOMBRELAEREA" value="<?php echo $NOMBRELAEREA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nombre" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Giro </label>
                                                        <input type="text" class="form-control" placeholder="Giro Laerea" id="GIROLAEREA" name="GIROLAEREA" value="<?php echo $GIROLAEREA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_giro" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Razon Social </label>
                                                        <input type="text" class="form-control" placeholder="Razon Social Laerea" id="RAZONSOCIALLAEREA" name="RAZONSOCIALLAEREA" value="<?php echo $RAZONSOCIALLAEREA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_rsocial" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Dirrecion </label>
                                                        <input type="text" class="form-control" placeholder="Dirrecion Laerea" id="DIRRECIONLAEREA" name="DIRRECIONLAEREA" value="<?php echo $DIRRECIONLAEREA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_dirrecion" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Nota </label>
                                                        <textarea class="form-control" rows="1" placeholder="Nota Laerea " id="NOTALAEREA" name="NOTALAEREA" <?php echo $DISABLED; ?>><?php echo $NOTALAEREA; ?></textarea>
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
                                                        <input type="text" class="form-control" placeholder="Nombre Contacto Laerea" id="CONTACTOLAEREA" name="CONTACTOLAEREA" value="<?php echo $CONTACTOLAEREA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_contacto" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Telefono </label>
                                                        <input type="number" class="form-control" placeholder="Telefono Contacto Laerea" id="TELEFONOLAEREA" name="TELEFONOLAEREA" value="<?php echo $TELEFONOLAEREA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_telefono" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Email </label>
                                                        <input type="text" class="form-control" placeholder="Email Contacto Laerea" id="EMAILLAEREA" name="EMAILLAEREA" value="<?php echo $EMAILLAEREA; ?>" <?php echo $DISABLED; ?> />
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