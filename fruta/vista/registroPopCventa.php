<?php

include_once "../../assest/config/validarUsuarioFruta.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../../assest/controlador/CVENTA_ADO.php';
include_once '../../assest/modelo/CVENTA.php';

//INCIALIZAR LAS VARIBLES

//INICIALIZAR CONTROLADOR

$CVENTA_ADO =  new CVENTA_ADO();
//INIICIALIZAR MODELO
$CVENTA =  new CVENTA();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$NOMBRECVENTA = "";
$NOTACVENTA = "";

$IDOP = "";
$OP = "";
$DISABLED = "";


//INICIALIZAR ARREGLOS
$ARRAYCVENTA = "";
$ARRAYCVENTAID = "";



//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES



//OPERACIONES
//OPERACION DE REGISTRO DE FILA
if (isset($_REQUEST['GUARDAR'])) {

    $ARRAYNUMERO = $CVENTA_ADO->obtenerNumero($EMPRESAS);
    $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;
    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
    $CVENTA->__SET('NUMERO_CVENTA', $NUMERO);
    $CVENTA->__SET('NOMBRE_CVENTA', $_REQUEST['NOMBRECVENTA']);
    $CVENTA->__SET('NOTA_CVENTA', $_REQUEST['NOTACVENTA']);
    $CVENTA->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
    $CVENTA->__SET('ID_USUARIOI', $IDUSUARIOS);
    $CVENTA->__SET('ID_USUARIOM', $IDUSUARIOS);
    //LLAMADA AL METODO DE EDICION DEL CONTROLADOR

    $AUSUARIO_ADO->agregarAusuario2("NULL",1,1,"".$_SESSION["NOMBRE_USUARIO"].",Pop, Registro de Clausula Venta.","fruta_cventa","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );  

    $CVENTA_ADO->agregarCventa($CVENTA);
    //REDIRECCIONAR A PAGINA registroTfruta.php
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
    <title>Registro Clausula Venta</title>
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



                    NOMBRECVENTA = document.getElementById("NOMBRECVENTA").value;
                    document.getElementById('val_nombre').innerHTML = "";

                    if (NOMBRECVENTA == null || NOMBRECVENTA.length == 0 || /^\s+$/.test(NOMBRECVENTA)) {
                        document.form_reg_dato.NOMBRECVENTA.focus();
                        document.form_reg_dato.NOMBRECVENTA.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBRECVENTA.style.borderColor = "#4AF575";




                }



                //FUNCION PARA CERRAR VENTANA Y ACTUALIZAR PRINCIPAL
                function cerrar() {
                    window.opener.refrescar()
                    window.close();
                }
            </script>

</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary" >
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
                    <section class="content">
                        <div class="row">
                                <div class="box">
                                    <div class="box-header with-border bg-primary">                               
                                        <h4 class="box-title">Registro Clausula Venta </h4>                                     
                                    </div>
                                    <!-- /.box-header -->
                                    <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato" >
                                        <div class="box-body">
                                            <hr class="my-15">
                                            <div class="row">
                                                 <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Nombre </label>
                                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                        <input type="hidden" class="form-control" placeholder="EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                        <input type="text" class="form-control" placeholder="Nombre Clausula  Venta" id="NOMBRECVENTA" name="NOMBRECVENTA" value="<?php echo $NOMBRECVENTA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nombre" class="validacion"> </label>
                                                    </div>
                                                 </div>
                                                 <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Nota </label>
                                                        <textarea class="form-control" rows="1" placeholder="Nota Clausula  Venta" id="NOTACVENTA" name="NOTACVENTA" <?php echo $DISABLED; ?>><?php echo $NOTACVENTA; ?></textarea>
                                                        <label id="val_notat" class="validacion"> </label>
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