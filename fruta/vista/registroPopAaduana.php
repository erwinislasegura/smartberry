<?php

include_once "../../assest/config/validarUsuarioFruta.php";


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



$SINO = "";


//INICIALIZAR ARREGLOS
$ARRAYAADUANA = "";
$ARRAYAADUANAID = "";
$ARRAYCOMUNA = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYCOMUNA = $COMUNA_ADO->listarComuna3CBX();



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

    $AUSUARIO_ADO->agregarAusuario2("NULL",1,1,"".$_SESSION["NOMBRE_USUARIO"].",Pop, Registro de Agente Aduana.","fruta_aaduana","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );  
    //REDIRECCIONAR A PAGINA registroAaduana.php
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
                            document.getElementById('val_ciudad').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
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