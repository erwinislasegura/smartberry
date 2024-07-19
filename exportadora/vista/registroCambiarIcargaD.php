<?php
include_once "../../assest/config/validarUsuarioExpo.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/CICARGA_ADO.php';
include_once '../../assest/controlador/EXIEXPORTACION_ADO.php';
include_once '../../assest/controlador/ICARGA_ADO.php';

include_once '../../assest/modelo/CICARGA.php';
include_once '../../assest/modelo/EXIEXPORTACION.php';



//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$CICARGA_ADO =  new CICARGA_ADO();
$EXIEXPORTACION_ADO =  new EXIEXPORTACION_ADO();
$ICARGA_ADO =  new ICARGA_ADO();

//INIICIALIZAR MODELO
$CICARGA =  new CICARGA();
$EXIEXPORTACION =  new EXIEXPORTACION();

//INICIALIZACION VARIABLES


$ICARGA = "";
$NUMEROREFERENCIA="";
$ICARGAN = "";
$MOTIVO = "";
$SINO = "";

$MENSAJE = "";
$DISABLED = "";
$DISABLED2 = "disabled";
$DISABLEDSTYLE = "";
$DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";




//INICIALIZAR ARREGLOS
$ARRAYFOLIOPOEXPO = "";
$ARRAYICARGA="";





//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYICARGA=$ICARGA_ADO->listarIcargaCBX();



//OPERACION PARA OBTENER EL ID RECEPCION Y FOLIO BASE, SOLO SE OCUPA PARA CREAR UN REGISTRO NUEVO
if (isset($_SESSION['parametro']) && isset($_SESSION['parametro1']) && isset($_SESSION['urlO'])) {
    $ID = $_SESSION['parametro'];
    $OP = $_SESSION['parametro1'];
    $URLO = $_SESSION['urlO'];

    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $ARRAYVEREXISTENCIA =  $EXIEXPORTACION_ADO->verExiexportacion($ID);
    $ICARGA = $ARRAYVEREXISTENCIA[0]["ID_ICARGA"];                                                                                                                 
    if ($ICARGA) {
        $ARRAYVERICARGA=$ICARGA_ADO->verIcarga($ICARGA);
        if($ARRAYVERICARGA){
            $NUMEROREFERENCIA=$ARRAYVERICARGA[0]["NREFERENCIA_ICARGA"];
        }else{
            $NUMEROREFERENCIA =  "Sin Datos";
        }
    }else{
        $NUMEROREFERENCIA =  "Sin Datos";
    }
}

if ($_POST) {
    if (isset($_REQUEST['ICARGAN'])) {
        $ICARGAN = $_REQUEST['ICARGAN'];
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

                    ICARGAN = document.getElementById("ICARGAN").selectedIndex;
                    MOTIVO = document.getElementById("MOTIVO").value;

                    document.getElementById('val_icargan').innerHTML = "";
                    document.getElementById('val_motivo').innerHTML = "";


                    if (ICARGAN == null || ICARGAN == 0) {
                        document.form_reg_dato.ICARGAN.focus();
                        document.form_reg_dato.ICARGAN.style.borderColor = "#FF0000";
                        document.getElementById('val_icargan').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.ICARGAN.style.borderColor = "#4AF575";


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
            <?php include_once "../../assest/config/menuExpo.php";  ?>
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
                                                <label>Instr. Carga Original</label>
                                                <input type="hidden" class="form-control" placeholder="ID EXISTENCIA" id="ID" name="ID" value="<?php echo $ID; ?>" />
                                                <input type="hidden" class="form-control" placeholder="OP EXISTENCIA" id="OP" name="OP" value="<?php echo $OP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="URL EXISTENCIA" id="URLO" name="URLO" value="<?php echo $URLO; ?>" />
                                                <input type="hidden" id="ICARGAE" name="ICARGAE" value="<?php echo $ICARGA; ?>" />
                                                <input type="number" class="form-control" placeholder="Instr. Carga Original" id="ICARGA" name="ICARGA" value="<?php echo $NUMEROREFERENCIA; ?>" disabled style='background-color: #eeeeee;' />
                                                <label id="val_icargao" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Instr. Carga Nuevo</label>
                                                <input type="hidden" id="ICARGANE" name="ICARGANE" value="<?php echo $ICARGAN; ?>" />
                                                    <select class="form-control select2" id="ICARGAN" name="ICARGAN" style="width: 100%;"  <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYICARGA as $r) : ?>
                                                            <?php if ($ARRAYICARGA) {    ?>
                                                                <option value="<?php echo $r['ID_ICARGA']; ?>" <?php if ($ICARGA == $r['ID_ICARGA']) {  echo "selected";  } ?>>
                                                                    <?php echo $r['NUMERO_ICARGA'] ?> : <?php echo $r['NREFERENCIA_ICARGA'] ?> 
                                                                </option>
                                                            <?php } else { ?>
                                                                <option value="0">No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                <label id="val_icargan" class="validacion"> <?php echo $MENSAJE; ?></label>
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
                                            <button type="button" class="btn  btn-success  " data-toggle="tooltip" title="Volver" name="CANCELAR" value="CANCELAR" Onclick="irPagina('<?php echo $URLO; ?>.php?op');">
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
                <?php include_once "../../assest/config/menuExtraExpo.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../../assest/config/urlBase.php"; ?>
        <?php         
                //OPERACIONES
                //OPERACION DE REGISTRO DE FILA
                if (isset($_REQUEST['CAMBIAR'])) {                
                    

                            
                            $CICARGA->__SET('ID_ICARGAO', $_REQUEST['ICARGAE']);
                            $CICARGA->__SET('ID_ICARGAN', $_REQUEST['ICARGAN']);
                            $CICARGA->__SET('MOTIVO', $_REQUEST['MOTIVO']);
                            $CICARGA->__SET('ID_EXIEXPORTACION', $_REQUEST['ID']);
                            $CICARGA->__SET('ID_USUARIO',$IDUSUARIOS);
                            $CICARGA_ADO->agregarCicarga($CICARGA);

                            $AUSUARIO_ADO->agregarAusuario2("NULL",3, 2,"".$_SESSION["NOMBRE_USUARIO"].", Registro de motivo de cambio de Instructivo de producto terminado","fruta_cfolio","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],"NULL",$_SESSION['ID_TEMPORADA'] );


                            $EXIEXPORTACION->__SET('ID_ICARGA', $_REQUEST['ICARGAN']);
                            $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $_REQUEST['ID']);
                            $EXIEXPORTACION_ADO->cambioIcarga($EXIEXPORTACION);
                            
                            $AUSUARIO_ADO->agregarAusuario2("NULL",3, 2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de existencia producto terminado, cambio de Instructivo","fruta_exiexportacion",$_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],"NULL",$_SESSION['ID_TEMPORADA'] );

                            
                            echo '<script>
                                    Swal.fire({
                                        icon:"info",
                                        title:"Registro Modificado",
                                        text:"El folio se ha modificada correctamente",
                                        showConfirmButton:true,
                                        confirmButtonText:"Cerrar"
                                    }).then((result)=>{
                                        if(result.value){
                                            location.href ="' . $_REQUEST['URLO'] . '.php?op";
                                        }
                                    })
                                </script>';
                                
                        
                    }    
        ?>
</body>

</html>