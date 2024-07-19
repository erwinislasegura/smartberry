<?php

include_once "../../assest/config/validarUsuarioFruta.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/COMUNA_ADO.php';

include_once '../../assest/controlador/COMPRADOR_ADO.php';
include_once '../../assest/modelo/COMPRADOR.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$COMUNA_ADO =  new COMUNA_ADO();

$COMPRADOR_ADO =  new COMPRADOR_ADO();
//INIICIALIZAR MODELO
$COMPRADOR =  new COMPRADOR();



//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$OP = "";
$DISABLED = "";

$RUTCOMPRADOR = "";
$DVCOMPRADOR = "";
$NOMBRECOMPRADOR = "";
$DIRECCIONCOMPRADOR = "";
$TELEFONOCOMPRADOR = "";
$EMAILCOMPRADOR = "";
$COMUNA = "";


$FNOMBRE = "";

$SINO = "";

$NOMBRE = "";
$MENSAJE = "";
$FOCUS = "";
$MENSAJE2 = "";
$FOCUS2 = "";
$BORDER = "";
$BORDER2 = "";

//INICIALIZAR ARREGLOS
$ARRAYCOMPRADOR = "";
$ARRAYCOMPRADORID = "";
$ARRAYCOMUNA = "";





//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYCOMUNA = $COMUNA_ADO->listarComuna3CBX();



//OPERACIONES
//OPERACION DE REGISTRO DE FILA

if (isset($_REQUEST['GUARDAR'])) {

    //UTILIZACION METODOS SET DEL MODELO
    $ARRAYNUMERO = $COMPRADOR_ADO->obtenerNumero($_REQUEST['EMPRESA']);
    $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;


    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
    $COMPRADOR->__SET('NUMERO_COMPRADOR', $NUMERO);
    $COMPRADOR->__SET('RUT_COMPRADOR', $_REQUEST['RUTCOMPRADOR']);
    $COMPRADOR->__SET('DV_COMPRADOR', $_REQUEST['DVCOMPRADOR']);
    $COMPRADOR->__SET('NOMBRE_COMPRADOR', $_REQUEST['NOMBRECOMPRADOR']);
    $COMPRADOR->__SET('DIRECCION_COMPRADOR', $_REQUEST['DIRECCIONCOMPRADOR']);
    $COMPRADOR->__SET('TELEFONO_COMPRADOR', $_REQUEST['TELEFONOCOMPRADOR']);
    $COMPRADOR->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
    $COMPRADOR->__SET('ID_COMUNA', $_REQUEST['COMUNA']);
    $COMPRADOR->__SET('ID_USUARIOI', $IDUSUARIOS);
    $COMPRADOR->__SET('ID_USUARIOM', $IDUSUARIOS);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $COMPRADOR_ADO->agregarComprador($COMPRADOR);
    //REDIRECCIONAR A PAGINA registroComprador.php

    $AUSUARIO_ADO->agregarAusuario2("NULL",1,1,"".$_SESSION["NOMBRE_USUARIO"].",Pop, Registro de Comprador.","fruta_comprador","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

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
    <title>Registro Comprador</title>
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

                    RUTCOMPRADOR = document.getElementById("RUTCOMPRADOR").value;
                    DVCOMPRADOR = document.getElementById("DVCOMPRADOR").value;
                    NOMBRECOMPRADOR = document.getElementById("NOMBRECOMPRADOR").value;
                    DIRECCIONCOMPRADOR = document.getElementById("DIRECCIONCOMPRADOR").value;
                    TELEFONOCOMPRADOR = document.getElementById("TELEFONOCOMPRADOR").value;
                    EMAILCOMPRADOR = document.getElementById("EMAILCOMPRADOR").value;
                    COMUNA = document.getElementById("COMUNA").selectedIndex;




                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_dv').innerHTML = "";
                    document.getElementById('val_rut').innerHTML = "";
                    document.getElementById('val_direccion').innerHTML = "";
                    document.getElementById('val_telefono').innerHTML = "";
                    document.getElementById('val_email').innerHTML = "";
                    document.getElementById('val_comuna').innerHTML = "";


                    if (RUTCOMPRADOR == null || RUTCOMPRADOR.length == 0 || /^\s+$/.test(RUTCOMPRADOR)) {
                        document.form_reg_dato.RUTCOMPRADOR.focus();
                        document.form_reg_dato.RUTCOMPRADOR.style.borderColor = "#FF0000";
                        document.getElementById('val_rut').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.RUTCOMPRADOR.style.borderColor = "#4AF575";

                    if (DVCOMPRADOR == null || DVCOMPRADOR.length == 0 || /^\s+$/.test(DVCOMPRADOR)) {
                        document.form_reg_dato.DVCOMPRADOR.focus();
                        document.form_reg_dato.DVCOMPRADOR.style.borderColor = "#FF0000";
                        document.getElementById('val_dv').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DVCOMPRADOR.style.borderColor = "#4AF575";

                    if (NOMBRECOMPRADOR == null || NOMBRECOMPRADOR.length == 0 || /^\s+$/.test(NOMBRECOMPRADOR)) {
                        document.form_reg_dato.NOMBRECOMPRADOR.focus();
                        document.form_reg_dato.NOMBRECOMPRADOR.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBRECOMPRADOR.style.borderColor = "#4AF575";

                    if (NOMBRECOMPRADOR.length > 82) {
                        document.form_reg_dato.NOMBRECOMPRADOR.focus();
                        document.form_reg_dato.NOMBRECOMPRADOR.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO PUEDE SER MAYOR A 82 CARACTERES";
                        return false;
                    }
                    document.form_reg_dato.NOMBRECOMPRADOR.style.borderColor = "#4AF575";

                    /*
                    if (EMAILCOMPRADOR == null || EMAILCOMPRADOR.length == 0 || /^\s+$/.test(EMAILCOMPRADOR)) {
                        document.form_reg_dato.EMAILCOMPRADOR.focus();
                        document.form_reg_dato.EMAILCOMPRADOR.style.borderColor = "#FF0000";
                        document.getElementById('val_email').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.EMAILCOMPRADOR.style.borderColor = "#4AF575";

                    if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
                            .test(EMAILCOMPRADOR))) {
                        document.form_reg_dato.EMAILCOMPRADOR.focus();
                        document.form_reg_dato.EMAILCOMPRADOR.style.borderColor = "#ff0000";
                        document.getElementById('val_email').innerHTML = "FORMATO DE CORREO INCORRECTO";
                        return false;
                    }
                    document.form_reg_dato.EMAILCOMPRADOR.style.borderColor = "#4AF575";

                    if (TELEFONOCOMPRADOR == null || TELEFONOCOMPRADOR == 0) {
                        document.form_reg_dato.TELEFONOCOMPRADOR.focus();
                        document.form_reg_dato.TELEFONOCOMPRADOR.style.borderColor = "#FF0000";
                        document.getElementById('val_telefono').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.TELEFONOCOMPRADOR.style.borderColor = "#4AF575";

            */

                    if (DIRECCIONCOMPRADOR == null || DIRECCIONCOMPRADOR.length == 0 || /^\s+$/.test(DIRECCIONCOMPRADOR)) {
                        document.form_reg_dato.DIRECCIONCOMPRADOR.focus();
                        document.form_reg_dato.DIRECCIONCOMPRADOR.style.borderColor = "#FF0000";
                        document.getElementById('val_direccion').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DIRECCIONCOMPRADOR.style.borderColor = "#4AF575";


                    if (COMUNA == null || COMUNA == 0) {
                        document.form_reg_dato.COMUNA.focus();
                        document.form_reg_dato.COMUNA.style.borderColor = "#FF0000";
                        document.getElementById('val_comuna').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.COMUNA.style.borderColor = "#4AF575";

             



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
            <!-- Content Wrapper. Contains page content -->


            <!-- Main content -->
                    <section class="content">
                                <div class="box">
                                    <div class="box-header with-border bg-primary">                                        
                                        <h4 class="box-title">Registro Comprador</h4>                                
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
                                                        <input type="text" class="form-control" placeholder="Rut Comprador" id="RUTCOMPRADOR" name="RUTCOMPRADOR" value="<?php echo $RUTCOMPRADOR; ?>" <?php echo $FOCUS2; ?> <?php echo  $BORDER2; ?> <?php echo $DISABLED; ?> />
                                                        <label id="val_rut" class="validacion"> <?php echo $MENSAJE; ?> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 col-xs-2">
                                                    <div class="form-group">
                                                        <label>DV </label>
                                                        <input type="text" class="form-control" placeholder="DV Comprador" id="DVCOMPRADOR" name="DVCOMPRADOR" value="<?php echo $DVCOMPRADOR; ?>" <?php echo $FOCUS2; ?> <?php echo  $BORDER2; ?> <?php echo $DISABLED; ?> />
                                                        <label id="val_dv" class="validacion"> <?php echo $MENSAJE; ?> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Nombre </label>
                                                        <input type="text" class="form-control" placeholder="Nombre Comprador" id="NOMBRECOMPRADOR" name="NOMBRECOMPRADOR" value="<?php echo $NOMBRECOMPRADOR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nombre" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Email </label>
                                                        <input type="text" class="form-control" placeholder="Telefono Comprador" id="EMAILCOMPRADOR" name="EMAILCOMPRADOR" value="<?php echo $EMAILCOMPRADOR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_email" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Telefono </label>
                                                        <input type="text" class="form-control" placeholder="Telefono Comprador" id="TELEFONOCOMPRADOR" name="TELEFONOCOMPRADOR" value="<?php echo $TELEFONOCOMPRADOR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_telefono" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Direccion </label>
                                                        <input type="text" class="form-control" placeholder="Direccion Comprador" id="DIRECCIONCOMPRADOR" name="DIRECCIONCOMPRADOR" value="<?php echo $DIRECCIONCOMPRADOR; ?>" <?php echo $DISABLED; ?> />
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