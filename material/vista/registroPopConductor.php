<?php

include_once "../../assest/config/validarUsuarioMaterial.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/CONDUCTOR_ADO.php';
include_once '../../assest/modelo/CONDUCTOR.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$CONDUCTOR_ADO =  new CONDUCTOR_ADO();
//INIICIALIZAR MODELO
$CONDUCTOR =  new CONDUCTOR();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$OP = "";
$DISABLED = "";


$NOMBRECONDUCTOR = "";
$RUTCONDUCTOR = "";
$DVCONDUCTOR = "";
$NOTACONDUCTOR = "";
$TELEFONOCONDUCTOR = "";
$EMAILCONDUCTOR = "";

$FNOMBRE = "";


$SINO = "";
$NOMBRE = "";
$MENSAJE = "";
$FOCUS = "";
$MENSAJE2 = "";
$FOCUS2 = "";
$BORDER = "";

//INICIALIZAR ARREGLOS
$ARRAYCONDUCTOR = "";
$ARRAYCONDUCTORID = "";



//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES



//OPERACIONES
//OPERACION DE REGISTRO DE FILA
if (isset($_REQUEST['GUARDAR'])) {

    $ARRAYNUMERO = $CONDUCTOR_ADO->obtenerNumero($EMPRESAS);
    $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;



    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO  

    $CONDUCTOR->__SET('NUMERO_CONDUCTOR', $NUMERO);
    $CONDUCTOR->__SET('RUT_CONDUCTOR', $_REQUEST['RUTCONDUCTOR']);
    $CONDUCTOR->__SET('DV_CONDUCTOR', $_REQUEST['DVCONDUCTOR']);
    $CONDUCTOR->__SET('NOMBRE_CONDUCTOR', $_REQUEST['NOMBRECONDUCTOR']);
    $CONDUCTOR->__SET('TELEFONO_CONDUCTOR', $_REQUEST['TELEFONOCONDUCTOR']);
    $CONDUCTOR->__SET('EMAIL_CONDUCTOR', $_REQUEST['EMAILCONDUCTOR']);
    $CONDUCTOR->__SET('NOTA_CONDUCTOR', $_REQUEST['NOTACONDUCTOR']);
    $CONDUCTOR->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
    $CONDUCTOR->__SET('ID_USUARIOI', $IDUSUARIOS);
    $CONDUCTOR->__SET('ID_USUARIOM', $IDUSUARIOS);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $CONDUCTOR_ADO->agregarConductor($CONDUCTOR);

    $AUSUARIO_ADO->agregarAusuario2("NULL",2,1,"".$_SESSION["NOMBRE_USUARIO"].",Pop, Registro de Conductor.","transporte_conductor","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

    //REDIRECCIONAR A PAGINA registroPlanta.php
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
    <title>Registro Conductor</title>
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


                    RUTCONDUCTOR = document.getElementById("RUTCONDUCTOR").value;
                    DVCONDUCTOR = document.getElementById("DVCONDUCTOR").value;
                    NOMBRECONDUCTOR = document.getElementById("NOMBRECONDUCTOR").value;
                    TELEFONOCONDUCTOR = document.getElementById("TELEFONOCONDUCTOR").value;
                    NOTACONDUCTOR = document.getElementById("NOTACONDUCTOR").value;



                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_rut').innerHTML = "";
                    document.getElementById('val_dv').innerHTML = "";
                    document.getElementById('val_telefono').innerHTML = "";
                    document.getElementById('val_nota').innerHTML = "";


                    if (RUTCONDUCTOR == null || RUTCONDUCTOR.length == 0 || /^\s+$/.test(RUTCONDUCTOR)) {
                        document.form_reg_dato.RUTCONDUCTOR.focus();
                        document.form_reg_dato.RUTCONDUCTOR.style.borderColor = "#FF0000";
                        document.getElementById('val_rut').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.RUTCONDUCTOR.style.borderColor = "#4AF575";

                    if (DVCONDUCTOR == null || DVCONDUCTOR.length == 0 || /^\s+$/.test(DVCONDUCTOR)) {
                        document.form_reg_dato.DVCONDUCTOR.focus();
                        document.form_reg_dato.DVCONDUCTOR.style.borderColor = "#FF0000";
                        document.getElementById('val_dv').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DVCONDUCTOR.style.borderColor = "#4AF575";



                    if (NOMBRECONDUCTOR == null || NOMBRECONDUCTOR.length == 0 || /^\s+$/.test(NOMBRECONDUCTOR)) {
                        document.form_reg_dato.NOMBRECONDUCTOR.focus();
                        document.form_reg_dato.NOMBRECONDUCTOR.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBRECONDUCTOR.style.borderColor = "#4AF575";


                    /*

                                        if (TELEFONOCONDUCTOR == null || TELEFONOCONDUCTOR == "") {
                                            document.form_reg_dato.TELEFONOCONDUCTOR.focus();
                                            document.form_reg_dato.TELEFONOCONDUCTOR.style.borderColor = "#FF0000";
                                            document.getElementById('val_telefono').innerHTML = "NO A INGRESADO DATO";
                                            return false;
                                        }
                                        document.form_reg_dato.TELEFONOCONDUCTOR.style.borderColor = "#4AF575";

                                        if (EMAILCONDUCTOR == null || EMAILCONDUCTOR.length == 0 || /^\s+$/.test(EMAILCONDUCTOR)) {
                                            document.form_reg_dato.EMAILCONDUCTOR.focus();
                                            document.form_reg_dato.EMAILCONDUCTOR.style.borderColor = "#FF0000";
                                            document.getElementById('val_email').innerHTML = "NO A INGRESADO DATO";
                                            return false;
                                        }
                                        document.form_reg_dato.EMAILCONDUCTOR.style.borderColor = "#4AF575";



                    */

                    /*
                        if (NOTACONDUCTOR == null || NOTACONDUCTOR.length == 0 || /^\s+$/.test(NOTACONDUCTOR)) {
                            document.form_reg_dato.NOTACONDUCTOR.focus();
                            document.form_reg_dato.NOTACONDUCTOR.style.borderColor = "#FF0000";
                            document.getElementById('val_nota').innerHTML = "NO A INGRESADO DATO";
                            return false;
                        }
                        document.form_reg_dato.NOTACONDUCTOR.style.borderColor = "#4AF575";
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

            <!-- Content Wrapper. Contains page content -->


                            <!-- Main content -->
                            <section class="content">
                                <div class="box">
                                    <div class="box-header with-border bg-primary">                                        
                                        <h4 class="box-title">Registro Conductor</h4>                                
                                    </div>
                                    <!-- /.box-header -->
                                    <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato"  >
                                        <div class="box-body">
                                            <hr class="my-15">
                                            <div class="row">
                                                 <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Rut </label>
                                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                        <input type="hidden" class="form-control" placeholder="EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                        <input type="text" class="form-control" placeholder="Rut Conductor" id="RUTCONDUCTOR" name="RUTCONDUCTOR" value="<?php echo $RUTCONDUCTOR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_rut" class="validacion"> <?php echo $MENSAJE; ?></label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 col-xs-2">
                                                    <div class="form-group">
                                                        <label>DV </label>
                                                        <input type="text" class="form-control" placeholder="DV Conductor" id="DVCONDUCTOR" name="DVCONDUCTOR" value="<?php echo $DVCONDUCTOR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_dv" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Nombre </label>
                                                        <input type="text" class="form-control" placeholder="Nombre Conductor" id="NOMBRECONDUCTOR" name="NOMBRECONDUCTOR" value="<?php echo $NOMBRECONDUCTOR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nombre" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Email </label>
                                                        <input type="text" class="form-control" placeholder="Email Conductor" id="EMAILCONDUCTOR" name="EMAILCONDUCTOR" value="<?php echo $EMAILCONDUCTOR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_email" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Telefono </label>
                                                        <input type="number" class="form-control" placeholder="Telefono Conductor" id="TELEFONOCONDUCTOR" name="TELEFONOCONDUCTOR" value="<?php echo $TELEFONOCONDUCTOR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_telefono" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                 <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Nota </label>
                                                        <textarea class="form-control" rows="1" placeholder="Nota Conductor" id="NOTACONDUCTOR" name="NOTACONDUCTOR" <?php echo $DISABLED; ?>><?php echo $NOTACONDUCTOR; ?></textarea>
                                                        <label id="val_nota" class="validacion"> </label>
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
                            </section>
                            <!-- /.content -->


            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php //include_once "../../assest/config/menuExtra.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../../assest/config/urlBase.php"; ?>
</body>

</html>