<?php

include_once "../../assest/config/validarUsuarioFruta.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../../assest/controlador/MAPERTURA_ADO.php';



include_once '../../assest/modelo/MAPERTURA.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$MAPERTURA_ADO =  new MAPERTURA_ADO();


//INIICIALIZAR MODELO
$MAPERTURA =  new MAPERTURA();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$MOTIVO = "";
$NUMERO = "";


$IDP = "";
$TABLA="";
$COLUMNA="";
$TITULO="";
$URLO = "";

$DISABLED = "";


//INICIALIZAR ARREGLOS
$ARRAYOBTENERNUMERO = "";
$ARRAYOCOMPRA = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES




//OPERACION PARA OBTENER EL ID RECEPCION Y FOLIO BASE, SOLO SE OCUPA PARA CREAR UN REGISTRO NUEVO
if (isset($_SESSION['parametro'])&& isset($_SESSION['NUMERO']) && isset($_SESSION['TABLA']) && isset($_SESSION['COLUMNA']) && isset($_SESSION['TITULO'])&& isset($_SESSION['urlO'])) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDP = $_SESSION['parametro'];
    $NUMERO = $_SESSION['NUMERO'];
    $TABLA = $_SESSION['TABLA'];
    $COLUMNA = $_SESSION['COLUMNA'];
    $TITULO = $_SESSION['TITULO'];
    $URLO = $_SESSION['urlO'];
   
}


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Motivo Apertura</title>
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

                    MOTIVO = document.getElementById("MOTIVO").value;
                    document.getElementById('val_motivo').innerHTML = "";

                    if (MOTIVO == null || MOTIVO.length == 0 || /^\s+$/.test(MOTIVO)) {
                        document.form_reg_dato.MOTIVO.focus();
                        document.form_reg_dato.MOTIVO.style.borderColor = "#FF0000";
                        document.getElementById('val_motivo').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.MOTIVO.style.borderColor = "#4AF575";

                }
                //REDIRECCIONAR A LA PAGINA SELECIONADA
                function irPagina(url) {
                    location.href = "" + url;
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
            <?php include_once "../../assest/config/menuFruta.php";?>


            <div class="content-wrapper">
                <div class="container-full">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Apertura Registro</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"> <a href="index.php"> <i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Modulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Apertura Registro</li>
                                            <li class="breadcrumb-item" aria-current="page"><?php echo $TITULO;?> </li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#">Registro Motivo Apertura </a> </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <?php include_once "../../assest/config/verIndicadorEconomico.php"; ?>
                        </div>
                    </div>
                    <!-- Main content -->
                    <section class="content">
                        <div class="box">
                                <div class="box-header with-border bg-warning">                                    
                                    <h4 class="box-title">Registro Motivo Apertura</h4>                                
                                </div>
                            <!-- /.box-header -->
                            <form class="form" role="form" method="post" name="form_reg_dato" >
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Número <?php echo $TITULO;?></label>
                                                <input type="hidden" class="form-control" placeholder="ID " id="IDP" name="IDP" value="<?php echo $IDP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="TABLA " id="TABLA" name="TABLA" value="<?php echo $TABLA; ?>" />
                                                <input type="hidden" class="form-control" placeholder="TITULO " id="TITULO" name="TITULO" value="<?php echo $TITULO; ?>" />
                                                <input type="hidden" class="form-control" placeholder="COLUMNA " id="COLUMNA" name="COLUMNA" value="<?php echo $COLUMNA; ?>" />
                                                <input type="hidden" class="form-control" placeholder="URL " id="URLP" name="URLP" value="<?php echo $URLO; ?>" />
                                                <input type="hidden" class="form-control" placeholder="Numero Registro" id="NUMERO" name="NUMERO" value="<?php echo $NUMERO; ?>" />
                                                <input type="text" class="form-control" placeholder="Número Registro" id="NUMEROV" name="NUMEROV" value="<?php echo $NUMERO; ?>" disabled />
                                                <label id="val_numerodespacho" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Motivo </label>
                                                <input type="hidden" class="form-control" placeholder="Numero Despacho" id="MOTIVOE" name="MOTIVOE" value="<?php echo $MOTIVO; ?>" />
                                                <textarea class="form-control" rows="1" placeholder="Motivo" id="MOTIVO" name="MOTIVO" <?php echo $DISABLED; ?>><?php echo $MOTIVO; ?></textarea>
                                                <label id="val_motivo" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->                                
                                <div class="box-footer">
                                    <div class="btn-group btn-block  col-xxl-4 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12 " role="group" aria-label="Acciones generales">
                                        <button type="button" class="btn  btn-success  " data-toggle="tooltip" title="Volver" name="CANCELAR" value="CANCELAR" Onclick="irPagina('<?php echo $URLO; ?>.php?op');">
                                            <i class="ti-back-left "></i> Volver
                                        </button>
                                        <button type="submit" class="btn  btn-warning" data-toggle="tooltip" title="Rechazar" name="GUARDAR" value="GUARDAR" <?php echo $DISABLED; ?> onclick="return validacion()">
                                            <i class="ti-save-alt"></i> Guardar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.box -->
                    </section>
                    <!-- /.content -->
                </div>
            </div>


            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php include_once "../../assest/config/footer.php"; ?>
                <?php include_once "../../assest/config/menuExtraFruta.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../../assest/config/urlBase.php"; ?>
        <?php 
            //OPERACIONES
            //OPERACION DE REGISTRO DE FILA
            if (isset($_REQUEST['GUARDAR'])) {

                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO  
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $MAPERTURA->__SET('MOTIVO_MAPERTURA', $_REQUEST['MOTIVO']);
                $MAPERTURA->__SET('TABLA', $_REQUEST['TABLA']);
                $MAPERTURA->__SET('ID_REGISTRO', $_REQUEST['IDP']);
                $MAPERTURA->__SET('ID_USUARIO', $IDUSUARIOS);                
                //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                $MAPERTURA_ADO->agregarMapertura($MAPERTURA);

                //funcion para abrir registro
                $MAPERTURA_ADO->aperturaRegistro($_REQUEST['TABLA'],$_REQUEST['COLUMNA'],$_REQUEST['IDP']);
             
                echo '<script>
                    Swal.fire({
                        icon:"warning",
                        title:"Motivo Apertura",
                        text:"El motivo de apertura se ha creado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Volver al agrupado.",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "'.$_REQUEST['URLP'].'.php";                            
                    })
                </script>';
            }
        ?>
</body>

</html>