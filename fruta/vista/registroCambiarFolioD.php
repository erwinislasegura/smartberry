<?php
include_once "../../assest/config/validarUsuarioFruta.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/CFOLIO_ADO.php';
include_once '../../assest/controlador/EXIEXPORTACION_ADO.php';

include_once '../../assest/modelo/CFOLIO.php';
include_once '../../assest/modelo/EXIEXPORTACION.php';



//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$CFOLIO_ADO =  new CFOLIO_ADO();
$EXIEXPORTACION_ADO =  new EXIEXPORTACION_ADO();

//INIICIALIZAR MODELO
$CFOLIO =  new CFOLIO();
$EXIEXPORTACION =  new EXIEXPORTACION();

//INICIALIZACION VARIABLES


$FOLIO = "";
$FOLION = "";
$MOTIVO = "";
$SINO = "";

$MENSAJE = "";
$DISABLED = "";
$DISABLED2 = "disabled";
$DISABLEDSTYLE = "";
$DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";




//INICIALIZAR ARREGLOS
$ARRAYFOLIOPOEXPO = "";



//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$id_dato;
$accion_dato;
$urlo_dato;
if (isset($_GET["ID"])) {
    $id_dato = $_GET["ID"];
}else{
    $id_dato = "";
}

if (isset($_GET["a"])) {
    $accion_dato = $_GET["a"];
}else{
    $accion_dato = "";
}

if (isset($_GET["urlo"])) {
    $urlo_dato = $_GET["urlo"];
}else{
    $urlo_dato = "";
}


//OPERACION PARA OBTENER EL ID RECEPCION Y FOLIO BASE, SOLO SE OCUPA PARA CREAR UN REGISTRO NUEVO
if (isset($id_dato) && isset($accion_dato) && isset($urlo_dato)) {
    $ID = $id_dato;
    $OP = $accion_dato;
    $URLO = $urlo_dato;

    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $ARRAYVEREXISTENCIA =  $EXIEXPORTACION_ADO->verExiexportacion($ID);
    $FOLIO = $ARRAYVEREXISTENCIA[0]["FOLIO_EXIEXPORTACION"];
}

if ($_POST) {
    if (isset($_REQUEST['FOLION'])) {
        $FOLION = $_REQUEST['FOLION'];
    }
    if (isset($_REQUEST['MOTIVO'])) {
        $MOTIVO = $_REQUEST['MOTIVO'];
    }
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Detalle Producto Terminado</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../../assest/config/urlHead.php"; ?>
        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
                function validacion() {

                    FOLION = document.getElementById("FOLION").value;
                    MOTIVO = document.getElementById("MOTIVO").value;

                    document.getElementById('val_fn').innerHTML = "";
                    document.getElementById('val_motivo').innerHTML = "";


                    if (FOLION == null || FOLION.length == 0 || /^\s+$/.test(FOLION)) {
                        document.form_reg_dato.FOLION.focus();
                        document.form_reg_dato.FOLION.style.borderColor = "#FF0000";
                        document.getElementById('val_fn').innerHTML = "NO HA INGRESADO DATOS";
                        return false;
                    }
                    document.form_reg_dato.FOLION.style.borderColor = "#4AF575";


                    if (FOLION.length > 10) {
                        document.form_reg_dato.FOLION.focus();
                        document.form_reg_dato.FOLION.style.borderColor = "#FF0000";
                        document.getElementById('val_fn').innerHTML = "NO SE PUEDEN INGRESAR UN FOLIO CON MAS DE DIES DIJITOS";
                        return false;
                    }
                    document.form_reg_dato.FOLION.style.borderColor = "#4AF575";


                    if (MOTIVO == null || MOTIVO.length == 0 || /^\s+$/.test(MOTIVO)) {
                        document.form_reg_dato.MOTIVO.focus();
                        document.form_reg_dato.MOTIVO.style.borderColor = "#FF0000";
                        document.getElementById('val_motivo').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.MOTIVO.style.borderColor = "#4AF575";


                }

                //FUNCION PARA CERRAR VENTANA Y ACTUALIZAR PRINCIPAL
                function cerrar() {
                    window.opener.refrescar()
                    window.close();
                }

                //REDIRECCIONAR A LA PAGINA SELECIONADA
                function irPagina(url) {
                    location.href = "" + url;
                }
            </script>

</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary">
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <?php include_once "../../assest/config/menuFruta.php";  ?>
            <div class="content-wrapper">
                <div class="container-full">

                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Frigorifico </h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Frigorifico</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Cambiar Folio PT </a>  </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <?php include_once "../../assest/config/verIndicadorEconomico.php"; ?>
                        </div>
                    </div>
                    <section class="content">
                        <div class="box">
                            <div class="box-header with-border bg-warning">                                
                                <h4 class="box-title">Cambio de Folio</h4>
                            </div>
                            <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato">
                                <div class="box-body form-element">
                                    <div class="row">
                                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Folio Original</label>
                                                <input type="hidden" class="form-control" placeholder="ID EXISTENCIA" id="ID" name="ID" value="<?php echo $ID; ?>" />
                                                <input type="hidden" class="form-control" placeholder="OP EXISTENCIA" id="OP" name="OP" value="<?php echo $OP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="URL EXISTENCIA" id="URLO" name="URLO" value="<?php echo $URLO; ?>" />
                                                <input type="hidden" id="FOLIOE" name="FOLIOE" value="<?php echo $FOLIO; ?>" />
                                                <input type="number" class="form-control" placeholder="Folio Original" id="FOLIO" name="FOLIO" value="<?php echo $FOLIO; ?>" disabled style='background-color: #eeeeee;' />
                                                <label id="val_fo" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Folio Nuevo</label>
                                                <input type="hidden" id="FOLIONE" name="FOLIONE" value="<?php echo $FOLION; ?>" />
                                                <input type="number" class="form-control" placeholder="Folio Nuevo" id="FOLION" name="FOLION" value="<?php echo $FOLION; ?>" />
                                                <label id="val_fn" class="validacion"> <?php echo $MENSAJE; ?></label>
                                            </div>
                                        </div>                                        
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">                                            
                                            <label>Motivo</label>
                                            <textarea class="form-control" rows="1" placeholder="Motivo" id="MOTIVO" name="MOTIVO" > <?php echo $MOTIVO; ?></textarea>
                                            <label id="val_motivo" class="validacion"> </label>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                    <!-- /.box-body -->
                                    <div class="box-footer">
                                        <div class="btn-group btn-rounded btn-block col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12" role="group" aria-label="Acciones generales">
                                            <button type="button" class="btn  btn-success  " data-toggle="tooltip" title="Volver" name="CANCELAR" value="CANCELAR" Onclick="irPagina('<?php echo $URLO; ?>.php?op&id=<?php echo $id_dato; ?>&a=<?php echo $accion_dato; ?>&urlo=<?php echo $urlo_dato; ?>');">
                                                <i class="ti-back-left "></i> Volver
                                            </button>
                                            <button type="submit" class="btn btn-warning   " data-toggle="tooltip" title="Cambiar" name="CAMBIAR" value="EDCAMBIARITAR" <?php echo $DISABLED; ?> onclick="return validacion()">
                                                <i class="ti-save-alt"></i> Cambiar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--.row -->
                    </section>
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
                if (isset($_REQUEST['CAMBIAR'])) {                  
                    

                            
                            $CFOLIO->__SET('FOLIOORIGINAL', $_REQUEST['FOLIOE']);
                            $CFOLIO->__SET('FOLIONUEVO', $_REQUEST['FOLION']);
                            $CFOLIO->__SET('MOTIVO', $_REQUEST['MOTIVO']);
                            $CFOLIO->__SET('ID_EXIEXPORTACION', $_REQUEST['ID']);
                            $CFOLIO->__SET('ID_USUARIO',$IDUSUARIOS);
                            $CFOLIO_ADO->agregarCfolio($CFOLIO);

                            $AUSUARIO_ADO->agregarAusuario2("NULL",1, 2,"".$_SESSION["NOMBRE_USUARIO"].", Registro de motivo de cambio de folio de producto terminado","fruta_cfolio","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],$_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );


                            $EXIEXPORTACION->__SET('FOLIO_AUXILIAR_EXIEXPORTACION', $_REQUEST['FOLION']);
                            $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $_REQUEST['ID']);
                            $EXIEXPORTACION_ADO->cambioFolio($EXIEXPORTACION);
                            
                            $AUSUARIO_ADO->agregarAusuario2("NULL",1, 2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de existencia producto terminado, cambio de folio","fruta_exiexportacion",$_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],$_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );

                            
                            echo '<script>
                                    Swal.fire({
                                        icon:"info",
                                        title:"Registro Modificado",
                                        text:"El folio se ha modificada correctamente",
                                        showConfirmButton:true,
                                        confirmButtonText:"Cerrar"
                                    }).then((result)=>{
                                        if(result.value){
                                            location.href ="' . $_REQUEST['URLO'] . '.php?op&id='.$id_dato.'&a='.$accion_dato.'&urlo='.$urlo_dato.'";
                                        }
                                    })
                                </script>';
                        
                    }    
        ?>
</body>

</html>