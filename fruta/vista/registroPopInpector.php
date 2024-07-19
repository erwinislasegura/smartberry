<?php

include_once "../../assest/config/validarUsuarioFruta.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/COMUNA_ADO.php';

include_once '../../assest/controlador/INPECTOR_ADO.php';
include_once '../../assest/modelo/INPECTOR.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$COMUNA_ADO =  new COMUNA_ADO();

$INPECTOR_ADO =  new INPECTOR_ADO();
//INIICIALIZAR MODELO
$INPECTOR =  new INPECTOR();



//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$OP = "";
$DISABLED = "";

$NOMBREINPECTOR = "";
$DIRECCIONINPECTOR = "";
$TELEFONOINPECTOR = "";
$EMAILINPECTOR = "";
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
$ARRAYINPECTOR = "";
$ARRAYINPECTORID = "";
$ARRAYCOMUNA = "";
$ARRAYTINPECTOR = "";
$ARRAYVERINPECTOR = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYCOMUNA = $COMUNA_ADO->listarComuna3CBX();



//OPERACIONES
//OPERACION DE REGISTRO DE FILA

if (isset($_REQUEST['GUARDAR'])) {


    $ARRAYNUMERO = $INPECTOR_ADO->obtenerNumero($EMPRESAS);
    $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;


    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
    $INPECTOR->__SET('NUMERO_INPECTOR', $NUMERO);
    $INPECTOR->__SET('NOMBRE_INPECTOR', $_REQUEST['NOMBREINPECTOR']);
    $INPECTOR->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
    $INPECTOR->__SET('ID_USUARIOI', $IDUSUARIOS);
    $INPECTOR->__SET('ID_USUARIOM', $IDUSUARIOS);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $INPECTOR_ADO->agregarInpector($INPECTOR);
    //REDIRECCIONAR A PAGINA registroInpector.php
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
    <title>Registro Inpector</title>
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
                    NOMBREINPECTOR = document.getElementById("NOMBREINPECTOR").value;
                    document.getElementById('val_nombre').innerHTML = "";


                    if (NOMBREINPECTOR == null || NOMBREINPECTOR.length == 0 || /^\s+$/.test(NOMBREINPECTOR)) {
                        document.form_reg_dato.NOMBREINPECTOR.focus();
                        document.form_reg_dato.NOMBREINPECTOR.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBREINPECTOR.style.borderColor = "#4AF575";

                    if (NOMBREINPECTOR.length > 82) {
                        document.form_reg_dato.NOMBREINPECTOR.focus();
                        document.form_reg_dato.NOMBREINPECTOR.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO PUEDE SER MAYOR A 82 CARACTERES";
                        return false;
                    }
                    document.form_reg_dato.NOMBREINPECTOR.style.borderColor = "#4AF575";            



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
                                        <h4 class="box-title">Registro Inspector</h4>
                                    </div>
                                    <!-- /.box-header -->
                                    <form class="form" role="form" method="post" name="form_reg_dato"  id="form_reg_dato" >
                                        <div class="box-body">
                                            <hr class="my-15">
                                            <div class="row">
                                                 <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Nombre </label>
                                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                        <input type="hidden" class="form-control" placeholder="EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                        <input type="text" class="form-control" placeholder="Nombre Inpector" id="NOMBREINPECTOR" name="NOMBREINPECTOR" value="<?php echo $NOMBREINPECTOR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nombre" class="validacion"> </label>
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