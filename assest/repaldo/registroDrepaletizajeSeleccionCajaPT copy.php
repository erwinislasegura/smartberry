<?php

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/PVESPECIES_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/PROCESO_ADO.php';
include_once '../controlador/EEXPORTACION_ADO.php';
include_once '../controlador/FOLIO_ADO.php';
include_once '../controlador/TMANEJO_ADO.php';
include_once '../controlador/CALIBRE_ADO.php';
include_once '../controlador/EMBALAJE_ADO.php';


include_once '../controlador/EXIEXPORTACION_ADO.php';
include_once '../controlador/REPALETIZAJEEX_ADO.php';
include_once '../controlador/REPALETIZAJEHFO_ADO.php';
include_once '../controlador/DREPALETIZAJEEX_ADO.php';

include_once '../modelo/REPALETIZAJEEX.php';
include_once '../modelo/REPALETIZAJEHFO.php';
include_once '../modelo/EXIEXPORTACION.php';
include_once '../modelo/DREPALETIZAJEEX.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR



$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$PVESPECIES_ADO =  new PVESPECIES_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$EXIEXPORTACION_ADO =  new EXIEXPORTACION_ADO();
$FOLIO_ADO =  new FOLIO_ADO();
$TMANEJO_ADO =  new TMANEJO_ADO();
$CALIBRE_ADO =  new CALIBRE_ADO();
$EMBALAJE_ADO =  new EMBALAJE_ADO();

$DREPALETIZAJEEX_ADO =  new DREPALETIZAJEEX_ADO();
$REPALETIZAJEEX_ADO =  new REPALETIZAJEEX_ADO();
$REPALETIZAJEHFO_ADO =  new REPALETIZAJEHFO_ADO();
$EEXPORTACION_ADO =  new EEXPORTACION_ADO();

//INIICIALIZAR MODELO
$EXIEXPORTACION =  new EXIEXPORTACION();
$REPALETIZAJEEX =  new REPALETIZAJEEX();
$REPALETIZAJEHFO =  new REPALETIZAJEHFO();
$DREPALETIZAJEEX =  new DREPALETIZAJEEX();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD


$IDCAJAS = "";
$CAJAS = "";
$FOLIOCAJAS = "";

$FOLIOEXPORTACION = "";
$NUMEROFOLIODEXPORTACION = "";
$ULTIMOFOLIO = "";
$KILOSNETOSREPALETIZAJE = "";
$FOLIO = "";
$FOLIOMANUAL = "";
$FOLIOMANUALR = "";
$NUMEROFOLIODEXPORTACION = "";
$IDCALIBRE = "";
$IDEMBALAJE = "";
$STOCK = "";
$ENVASERESTANTE = 0;

$IDFOLIO = "";
$FECHAEMBALADO = "";
$IDTMANEJO = "";
$IDESTANDAR = "";
$IDVARIEDAD = "";
$IDPRODUCTOR = "";
$NETOTOTAL = "";
$CAJATOTAL = "";
$FOLIOALIAS = "";

$KILONETOEXITENCIA = "";
$PDESHISDRATACIONEXISTENCIA = "";
$KILOSDESHIDRATACIONEXITENCIA = "";
$KILOSBRUTOEXISTENCIA = "";
$EMBOLSADOEXISTENCIA = "";

$CONTADOR = 0;

$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";
$TMANEJO = "";

$IDOP = "";
$OP = "";
$NODATOURL = "";

$DISABLED3 = "";
$DISABLEDSTYLE3 = "";

$SINO0 = "";
$SINO = "";
$SINO2 = "";
$MENSAJE0 = "";
$MENSAJE = "";
$MENSAJE1 = "";
$MENSAJE2 = "";
$MENSAJE3 = "";


//INICIALIZAR ARREGLOS

$ARRAYESTANDAR = "";
$ARRAYVERPRODUCTORID = "";
$ARRAYVERVESPECIESID = "";
$ARRAYEVERERECEPCIONID;

$ARRAYEXISTENCIA = "";
$ARRAYDREPALETIZAJETOTALESPOREXISTENCIA = "";
$ARRAYEXISTENCIATOTALESPORREPALETIZAJE = "";
$ARRAYVERDRECEPCION = "";

$ARRAYVERFOLIO = "";
$ARRAYULTIMOFOLIO = "";

$ARRAYEXIEXPORTACIONBOLSA = "";
$ARRAYEXIEXPORTACIONBOLSASELECCION = "";
$ARRAYEXIEXPORTACIONBOLSASELECCIONREGISTRO = "";
$ARRAYDREPALETIZAJEBOLSA = "";


$ARRAYSELECIONARCAJASID = "";
$ARRAYSELECIONARCAJAS = "";
$ARRAYSELECIONARCAJASTOTAL = "";
$ARRAYSELECIONARCAJAFOLIO = "";
$ARRAYSELECIONARCAJASFOLIOP = "";

$ARRAYSELECIONARCAJASFECHAEMBALADO = "";
$ARRAYSELECIONARCAJASESTANDAR = "";
$ARRAYSELECIONARCAJASPRODUCTOR = "";
$ARRAYSELECIONARCAJASVARIEDAD = "";
$ARRAYSELECIONARCAJASIDTMANEJO = "";
$ARRAYSELECIONARIDCALIBRE = "";
$ARRAYSELECIONARIDEMBALAJE = "";
$ARRAYSELECIONARSTOCK =


    $ARRAYTEMANEJO = "";


//OPERACIONES
//OPERACION DE REGISTRO DE FILA

if (isset($_REQUEST['AGREGAR'])) {

    $REPALETIZAJE = $_REQUEST['REPALETIZAJE'];
    $ARRAYSELECIONARCAJASID = $_REQUEST['IDCAJA'];
    $ARRAYSELECIONARCAJAS = $_REQUEST['CAJAS'];
    $ARRAYSELECIONARCAJASTOTAL = $_REQUEST['CAJASTOTAL'];

    $ARRAYSELECIONARCAJAFOLIO = $_REQUEST['IDFOLIO'];
    $ARRAYSELECIONARCAJASFECHAEMBALADO = $_REQUEST['FECHAEMBALADO'];
    $ARRAYSELECIONARCAJASESTANDAR = $_REQUEST['IDESTANDAR'];
    $ARRAYSELECIONARCAJASPRODUCTOR = $_REQUEST['IDPRODUCTOR'];
    $ARRAYSELECIONARCAJASVARIEDAD = $_REQUEST['IDVARIEDAD'];
    $ARRAYSELECIONARCAJASIDTMANEJO = $_REQUEST['IDTMANEJO'];
    $ARRAYSELECIONARIDCALIBRE  = $_REQUEST['IDCALIBRE'];
    $ARRAYSELECIONARIDEMBALAJE  = $_REQUEST['IDEMBALAJE'];
    $ARRAYSELECIONARSTOCK  = $_REQUEST['STOCK'];




    $ARRAYVERFOLIO = $FOLIO_ADO->verFolioPorEmpresaPlantaTemporadaTexportacion($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
    $FOLIO = $ARRAYVERFOLIO[0]['ID_FOLIO'];

    if (isset($_REQUEST['FOLIOMANUAL'])) {
        $FOLIOMANUAL = $_REQUEST['FOLIOMANUAL'];
    }
    if ($FOLIOMANUAL == "on") {
        $NUMEROFOLIODEXPORTACION = $_REQUEST['NUMEROFOLIODEXPORTACION'];
        $FOLIOMANUALR = "1";
        $ARRAYFOLIOPOEXPO = $EXIEXPORTACION_ADO->buscarPorFolio($NUMEROFOLIODEXPORTACION);
        if ($ARRAYFOLIOPOEXPO) {
            $SINO0 = "1";
            $MENSAJE0 = "EL FOLIO INGRESADO, YA EXISTE";
        } else {
            $SINO0 = "0";
            $MENSAJE0 = "";
        }
    }
    if ($FOLIOMANUAL != "on") {
        $FOLIOMANUALR = "0";
        $SINO0 = "0";
        //$ARRAYULTIMOFOLIO = $DRECEPCIONPT_ADO->obtenerFolio($FOLIO);    

        $ARRAYULTIMOFOLIO = $EXIEXPORTACION_ADO->obtenerFolio2($FOLIO);
        if ($ARRAYULTIMOFOLIO) {
            if ($ARRAYULTIMOFOLIO[0]['ULTIMOFOLIO2'] == 0) {
                $FOLIOEXPORTACION = $ARRAYVERFOLIO[0]['NUMERO_FOLIO'];
            } else {
                $FOLIOEXPORTACION =   $ARRAYULTIMOFOLIO[0]['ULTIMOFOLIO2'];
            }
        } else {
            $FOLIOEXPORTACION = $ARRAYVERFOLIO[0]['NUMERO_FOLIO'];
        }
        $NUMEROFOLIODEXPORTACION = $FOLIOEXPORTACION + 1;
        $ARRAYFOLIOPOEXPO = $EXIEXPORTACION_ADO->buscarPorFolioRepaletizaje($NUMEROFOLIODEXPORTACION);
        while (count($ARRAYFOLIOPOEXPO) == 1) {
            $ARRAYFOLIOPOEXPO = $EXIEXPORTACION_ADO->buscarPorFolioRepaletizaje($NUMEROFOLIODEXPORTACION);
            if (count($ARRAYFOLIOPOEXPO) == 1) {
                $NUMEROFOLIODEXPORTACION += 1;
            }
        };
    }
    if ($SINO0 == "0") {

        foreach ($ARRAYSELECIONARCAJASID as $F) :
            $IDCAJAS = $F - 1;
            $CAJATOTAL = $ARRAYSELECIONARCAJASTOTAL[$IDCAJAS];
            $CAJAS = $ARRAYSELECIONARCAJAS[$IDCAJAS];
            $IDFOLIO = $ARRAYSELECIONARCAJAFOLIO[$IDCAJAS];
            $FECHAEMBALADO = $ARRAYSELECIONARCAJASFECHAEMBALADO[$IDCAJAS];
            $IDESTANDAR = $ARRAYSELECIONARCAJASESTANDAR[$IDCAJAS];
            $IDPRODUCTOR = $ARRAYSELECIONARCAJASPRODUCTOR[$IDCAJAS];
            $IDVARIEDAD = $ARRAYSELECIONARCAJASVARIEDAD[$IDCAJAS];
            $IDTMANEJO = $ARRAYSELECIONARCAJASIDTMANEJO[$IDCAJAS];
            $IDCALIBRE = $ARRAYSELECIONARIDCALIBRE[$IDCAJAS];
            $IDEMBALAJE = $ARRAYSELECIONARIDEMBALAJE[$IDCAJAS];
            $STOCK = $ARRAYSELECIONARSTOCK[$IDCAJAS];

            if ($STOCK) {
                $ARRAYEXIEXPORTACIONBOLSASELECCION = $EXIEXPORTACION_ADO->buscarExistenciaBolsa($IDFOLIO, $FECHAEMBALADO, $IDESTANDAR, $IDPRODUCTOR, $IDVARIEDAD, $IDTMANEJO, $IDCALIBRE, $IDEMBALAJE, $STOCK, $REPALETIZAJE);
                $ARRAYDREPALETIZAJEBOLSA = $DREPALETIZAJEEX_ADO->buscarDrepaletizajeBolsa($IDFOLIO, $FECHAEMBALADO, $IDESTANDAR, $IDPRODUCTOR, $IDVARIEDAD, $IDTMANEJO, $IDCALIBRE, $IDEMBALAJE, $STOCK, $REPALETIZAJE);
            } else {
                $ARRAYEXIEXPORTACIONBOLSASELECCION = $EXIEXPORTACION_ADO->buscarExistenciaBolsaStockNull($IDFOLIO, $FECHAEMBALADO, $IDESTANDAR, $IDPRODUCTOR, $IDVARIEDAD, $IDTMANEJO, $IDCALIBRE, $IDEMBALAJE,  $REPALETIZAJE);
                $ARRAYDREPALETIZAJEBOLSA = $DREPALETIZAJEEX_ADO->buscarDrepaletizajeBolsaStockNull($IDFOLIO, $FECHAEMBALADO, $IDESTANDAR, $IDPRODUCTOR, $IDVARIEDAD, $IDTMANEJO, $IDCALIBRE, $IDEMBALAJE,  $REPALETIZAJE);
            }


            if ($ARRAYDREPALETIZAJEBOLSA) {
                $CAJATOTAL = $CAJATOTAL - $ARRAYDREPALETIZAJEBOLSA[0]['TOTAL_ENVASE'];
                if ($ARRAYDREPALETIZAJEBOLSA[0]['TOTAL_ENVASE'] >= $ARRAYEXIEXPORTACIONBOLSASELECCION[0]['TOTAL_ENVASE']) {
                    $SINO = "1";
                    if ($CAJAS) {
                        $MENSAJE = $MENSAJE . " <br> " . $F . ": NO SE PUEDE INGRESAR MAS CAJAS";
                    }
                } else {
                    $SINO = "0";
                    $MENSAJE = $MENSAJE;
                }
            }
            if ($CAJAS != "") {
                $SINO = "0";
                //$MENSAJE1 = $MENSAJE1;
                if ($CAJAS <= 0) {
                    $SINO = "1";
                    $SINO2 = "1";
                    $MENSAJE1 = $MENSAJE1 . " <br> " . $F . ": SOLO DEBEN INGRESAR UN VALOR MAYOR A ZERO";
                } else {
                    $SINO = "0";
                    $MENSAJE1 = $MENSAJE1;
                    if ($CAJAS <= $ARRAYEXIEXPORTACIONBOLSASELECCION[0]['TOTAL_ENVASE']) {
                        $SINO = "0";
                        $MENSAJE2 = $MENSAJE2;
                        if ($CAJAS > $CAJATOTAL) {
                            $SINO = "1";
                            $SINO2 = "1";
                            $MENSAJE2 = $MENSAJE2 . " <br> " . $F . ": EL VALOR A INGRESAR DEBE SER MENOR O IGUAL AL ORIGINAL";
                        } else {
                            $SINO = "0";
                            $MENSAJE2 = $MENSAJE2;
                        }
                    } else {
                        $SINO = "1";
                        $SINO2 = "1";
                        $MENSAJE2 = $MENSAJE2 . " <br> " . $F . ": EL VALOR A INGRESAR DEBE SER MENOR O IGUAL AL ORIGINAL";
                    }
                }
            } else {
                $SINO = "1";
            }


            if ($SINO == "0") {

                $ARRAYESTANDAR = $EEXPORTACION_ADO->verEstandar($IDESTANDAR);
                $KILONETOEXITENCIA = $CAJAS * $ARRAYESTANDAR[0]['PESO_NETO_ESTANDAR'];
                $PDESHISDRATACIONEXISTENCIA = $ARRAYESTANDAR[0]['PDESHIDRATACION_ESTANDAR'];
                $KILOSDESHIDRATACIONEXITENCIA = $KILONETOEXITENCIA * (1 + ($PDESHISDRATACIONEXISTENCIA / 100));
                $KILOSBRUTOEXISTENCIA = (($CAJAS * $ARRAYESTANDAR[0]['PESO_ENVASE_ESTANDAR']) + $KILOSDESHIDRATACIONEXITENCIA) + $ARRAYESTANDAR[0]['PESO_PALLET_ESTANDAR'];
                $EMBOLSADOEXISTENCIA = $ARRAYESTANDAR[0]['EMBOLSADO'];
                $FOLIOALIAS =  "EMPRESA:" . $_REQUEST['EMPRESA'] . "_PLANTA:" . $_REQUEST['PLANTA'] . "_TEMPORADA:" . $_REQUEST['TEMPORADA'] . "_TIPO_FOLIO:PRODUCTO TERMINADO_REPALETIZAJE:" . $_REQUEST['REPALETIZAJE'] . "_ENVASES:" . $CAJAS;

                $DREPALETIZAJEEX->__SET('FOLIO_NUEVO_DREPALETIZAJE', $NUMEROFOLIODEXPORTACION);
                $DREPALETIZAJEEX->__SET('FOLIO_MANUAL', $FOLIOMANUALR);
                $DREPALETIZAJEEX->__SET('FECHA_EMBALADO_DREPALETIZAJE', $FECHAEMBALADO);
                $DREPALETIZAJEEX->__SET('CANTIDAD_ENVASE_DREPALETIZAJE', $CAJAS);
                $DREPALETIZAJEEX->__SET('KILOS_NETO_DREPALETIZAJE', $KILONETOEXITENCIA);
                $DREPALETIZAJEEX->__SET('KILOS_BRUTO_DREPALETIZAJE', $KILOSBRUTOEXISTENCIA);
                $DREPALETIZAJEEX->__SET('ALIAS_FOLIO_DREPALETIZAJE', $FOLIOALIAS);
                $DREPALETIZAJEEX->__SET('EMBOLSADO', $EMBOLSADOEXISTENCIA);
                $DREPALETIZAJEEX->__SET('STOCK', $STOCK);
                $DREPALETIZAJEEX->__SET('ID_TMANEJO', $IDTMANEJO);
                $DREPALETIZAJEEX->__SET('ID_CALIBRE', $IDCALIBRE);
                $DREPALETIZAJEEX->__SET('ID_EMBALAJE', $IDEMBALAJE);
                $DREPALETIZAJEEX->__SET('ID_FOLIO', $IDFOLIO);
                $DREPALETIZAJEEX->__SET('ID_ESTANDAR', $IDESTANDAR);
                $DREPALETIZAJEEX->__SET('ID_PRODUCTOR', $IDPRODUCTOR);
                $DREPALETIZAJEEX->__SET('ID_PVESPECIES', $IDVARIEDAD);
                $DREPALETIZAJEEX->__SET('ID_REPALETIZAJE', $REPALETIZAJE);
                $DREPALETIZAJEEX_ADO->agregarDrepaletizaje($DREPALETIZAJEEX);


                $EXIEXPORTACION->__SET('FOLIO_EXIEXPORTACION', $NUMEROFOLIODEXPORTACION);
                $EXIEXPORTACION->__SET('FOLIO_AUXILIAR_EXIEXPORTACION', $NUMEROFOLIODEXPORTACION);
                $EXIEXPORTACION->__SET('NUMERO_LINEA', $IDCAJAS + 1);
                $EXIEXPORTACION->__SET('FOLIO_MANUAL', $FOLIOMANUALR);
                $EXIEXPORTACION->__SET('FECHA_EMBALADO_EXIEXPORTACION', $FECHAEMBALADO);
                $EXIEXPORTACION->__SET('CANTIDAD_ENVASE_EXIEXPORTACION', $CAJAS);
                $EXIEXPORTACION->__SET('KILOS_NETO_EXIEXPORTACION', $KILONETOEXITENCIA);
                $EXIEXPORTACION->__SET('KILOS_BRUTO_EXIEXPORTACION', $KILOSBRUTOEXISTENCIA);
                $EXIEXPORTACION->__SET('PDESHIDRATACION_EXIEXPORTACION', $PDESHISDRATACIONEXISTENCIA);
                $EXIEXPORTACION->__SET('KILOS_DESHIRATACION_EXIEXPORTACION', $KILOSDESHIDRATACIONEXITENCIA);
                $EXIEXPORTACION->__SET('ALIAS_FOLIO_EXIESPORTACION', $FOLIOALIAS);
                $EXIEXPORTACION->__SET('EMBOLSADO', $EMBOLSADOEXISTENCIA);
                $EXIEXPORTACION->__SET('STOCK', $STOCK);
                $EXIEXPORTACION->__SET('ID_ESTANDAR', $IDESTANDAR);
                $EXIEXPORTACION->__SET('ID_PRODUCTOR', $IDPRODUCTOR);
                $EXIEXPORTACION->__SET('ID_PVESPECIES', $IDVARIEDAD);
                $EXIEXPORTACION->__SET('ID_FOLIO', $IDFOLIO);
                $EXIEXPORTACION->__SET('ID_REPALETIZAJE', $REPALETIZAJE);
                $EXIEXPORTACION->__SET('ID_TMANEJO', $IDTMANEJO);
                $EXIEXPORTACION->__SET('ID_CALIBRE', $IDCALIBRE);
                $EXIEXPORTACION->__SET('ID_EMBALAJE', $IDEMBALAJE);
                $EXIEXPORTACION->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                $EXIEXPORTACION->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
                $EXIEXPORTACION->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
                $EXIEXPORTACION_ADO->agregarExiexportacionRepaletizaje($EXIEXPORTACION);

                $SINO2 = "0";
            }

        endforeach;
    }
    if ($SINO == "0") {
        
        echo "
                <script type='text/javascript'>
                    window.opener.refrescar()
                    window.close();
                    </script> 
                ";
    
    }
}
//OPERACION PARA OBTENER EL ID RECEPCION Y FOLIO BASE, SOLO SE OCUPA PARA CREAR UN REGISTRO NUEVO
if (isset($_REQUEST['EMPRESA']) && isset($_REQUEST['PLANTA']) && isset($_REQUEST['TEMPORADA'])  && isset($_REQUEST['REPALETIZAJE'])) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $EMPRESA = $_REQUEST['EMPRESA'];
    $PLANTA = $_REQUEST['PLANTA'];
    $TEMPORADA = $_REQUEST['TEMPORADA'];
    $REPALETIZAJE = $_REQUEST['REPALETIZAJE'];
    if (isset($_REQUEST['FOLIOMANUAL'])) {
        $FOLIOMANUAL = $_REQUEST['FOLIOMANUAL'];
        if (isset($_REQUEST['NUMEROFOLIODEXPORTACION'])) {
            $NUMEROFOLIODEXPORTACION = $_REQUEST['NUMEROFOLIODEXPORTACION'];
        }
    }
    $ARRAYEXIEXPORTACIONBOLSA = $EXIEXPORTACION_ADO->buscarBolsaPorRepaletizajeEnRepaletizaje($REPALETIZAJE);
    $NODATOURL = "1";
} else {
    $NODATOURL = "0";
}




if ($NODATOURL == "0") {
    header('Location: index.php');
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Detalle Repaletizaje</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../config/urlHead.php"; ?>
        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
                //FUNCION PARA CERRAR VENTANA Y ACTUALIZAR PRINCIPAL
                function validacion() {

                    FOLIOMANUAL = document.getElementById('FOLIOMANUAL').checked;
                    if (FOLIOMANUAL == true) {
                        NUMEROFOLIODEXPORTACION = document.getElementById("NUMEROFOLIODEXPORTACION").value;
                        document.getElementById('val_folio').innerHTML = "";

                        if (NUMEROFOLIODEXPORTACION == null || NUMEROFOLIODEXPORTACION.length == 0 || /^\s+$/.test(NUMEROFOLIODEXPORTACION)) {
                            document.form_reg_dato.NUMEROFOLIODEXPORTACION.focus();
                            document.form_reg_dato.NUMEROFOLIODEXPORTACION.style.borderColor = "#FF0000";
                            document.getElementById('val_folio').innerHTML = "NO HA INGRESADO EL FOLIO";
                            return false;
                        }
                        document.form_reg_dato.NUMEROFOLIODEXPORTACION.style.borderColor = "#4AF575";

                        if (/^0/.test(NUMEROFOLIODEXPORTACION)) {
                            document.form_reg_dato.NUMEROFOLIODEXPORTACION.focus();
                            document.form_reg_dato.NUMEROFOLIODEXPORTACION.style.borderColor = "#FF0000";
                            document.getElementById('val_folio').innerHTML = "EL FOLIO NO PUEDE EMPEZAR CON 0";
                            return false;
                        }
                        document.form_reg_dato.NUMEROFOLIODEXPORTACION.style.borderColor = "#4AF575";

                        if (NUMEROFOLIODEXPORTACION.length > 10) {
                            document.form_reg_dato.NUMEROFOLIODEXPORTACION.focus();
                            document.form_reg_dato.NUMEROFOLIODEXPORTACION.style.borderColor = "#FF0000";
                            document.getElementById('val_folio').innerHTML = "EL FOLIO NO PUEDE TENER MAS DE DIES DIGITOS";
                            return false;
                        }
                        document.form_reg_dato.NUMEROFOLIODEXPORTACION.style.borderColor = "#4AF575";
                    }
                }

                function cerrar() {
                    window.opener.refrescar()
                    window.close();
                }
            </script>

</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary" onload="mueveReloj()">
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <?php //include_once "../config/menu.php"; 
            ?>
            <section class="content">
                <div class="box">
                    <div class="box-header with-border">
                        <!--
                                        <h4 class="box-title">Different Width</h4>
                                        -->
                    </div>

                    <form class="form" role="form" method="post" name="form_reg_dato" onsubmit="return validacion()">
                        <div class="box-body ">


                            <div class="row">
                                <div class="form-group">
                                    <input type="checkbox" class="chk-col-danger" name="FOLIOMANUAL" id="FOLIOMANUAL" <?php echo $DISABLED3; ?> <?php echo $DISABLEDSTYLE3; ?> <?php if ($FOLIOMANUAL == "on") {
                                                                                                                                                                                    echo "checked";
                                                                                                                                                                                } ?> onchange="this.form.submit()">
                                    <label for="FOLIOMANUAL"> Folio Manual</label>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <input type="hidden" id="PLANTA" name="PLANTA" value="<?php echo $PLANTA; ?>" />
                                        <input type="hidden" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESA; ?>" />
                                        <input type="hidden" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADA; ?>" />
                                        <input type="hidden" id="REPALETIZAJE" name="REPALETIZAJE" value="<?php echo $REPALETIZAJE; ?>" />
                                        <label>Folio</label>
                                        <input type="number" class="form-control" placeholder="Numero Folio " id="NUMEROFOLIODEXPORTACION" name="NUMEROFOLIODEXPORTACION" <?php echo $DISABLED3; ?> <?php echo $DISABLEDSTYLE3; ?> <?php if ($FOLIOMANUAL != "on") {
                                                                                                                                                                                                                                        echo "disabled style='background-color: #eeeeee;'";
                                                                                                                                                                                                                                    } ?> value="<?php echo $NUMEROFOLIODEXPORTACION; ?>" />
                                        <label id="val_folio" class="validacion"> <?php echo $MENSAJE0; ?> </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table id="selecionExistencia" class="table table-hover " style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Selecion Cajas</th>
                                                    <th>Fecha Embalado </th>
                                                    <th>Código Estandar </th>
                                                    <th>Envase/Estandar </th>
                                                    <th>CSG</th>
                                                    <th>Productor</th>
                                                    <th>Variedad</th>
                                                    <th>Cantidad Envase </th>
                                                    <th>Kilo Neto </th>
                                                    <th>Tipo Manejo</th>
                                                    <th>Calibre</th>
                                                    <th>Embalaje</th>
                                                    <th>Stock</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if ($ARRAYEXIEXPORTACIONBOLSA) { ?>
                                                    <?php foreach ($ARRAYEXIEXPORTACIONBOLSA as $r) :  ?>
                                                        <?php

                                                        if ($r['STOCK']) {
                                                            $ARRAYDREPALETIZAJEBOLSA = $DREPALETIZAJEEX_ADO->buscarDrepaletizajeBolsa($r['ID_FOLIO'], $r['FECHA_EMBALADO'],  $r['ID_ESTANDAR'], $r['ID_PRODUCTOR'], $r['ID_PVESPECIES'], $r['ID_TMANEJO'],  $r['ID_CALIBRE'], $r['ID_EMBALAJE'], $r['STOCK'],   $REPALETIZAJE);
                                                        } else {
                                                            $ARRAYDREPALETIZAJEBOLSA = $DREPALETIZAJEEX_ADO->buscarDrepaletizajeBolsaStockNull($r['ID_FOLIO'], $r['FECHA_EMBALADO'],  $r['ID_ESTANDAR'], $r['ID_PRODUCTOR'], $r['ID_PVESPECIES'], $r['ID_TMANEJO'],  $r['ID_CALIBRE'], $r['ID_EMBALAJE'],    $REPALETIZAJE);
                                                        }

                                                        if ($ARRAYDREPALETIZAJEBOLSA) {
                                                            $ENVASERESTANTE = $r['TOTAL_ENVASE'] - $ARRAYDREPALETIZAJEBOLSA[0]['TOTAL_ENVASE'];
                                                        } else {
                                                            $ENVASERESTANTE =  $r['TOTAL_ENVASE'];
                                                        }
                                                        ?>
                                                        <?php if ($ENVASERESTANTE > 0) { ?>
                                                            <?php $CONTADOR = $CONTADOR + 1; ?>
                                                            <tr class="center">
                                                                <td> <?php echo $CONTADOR ?> </td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <input type="hidden" class="form-control" name="IDCAJA[]" value="<?php echo  $CONTADOR; ?>">
                                                                        <input type="hidden" class="form-control" name="CAJASTOTAL[]" value="<?php echo $r['TOTAL_ENVASE']; ?>">
                                                                        <input type="hidden" class="form-control" name="FECHAEMBALADO[]" value="<?php echo $r['FECHA_EMBALADO']; ?>">
                                                                        <input type="hidden" class="form-control" name="IDFOLIO[]" value="<?php echo $r['ID_FOLIO']; ?>">
                                                                        <input type="hidden" class="form-control" name="IDESTANDAR[]" value="<?php echo $r['ID_ESTANDAR']; ?>">
                                                                        <input type="hidden" class="form-control" name="IDPRODUCTOR[]" value="<?php echo $r['ID_PRODUCTOR']; ?>">
                                                                        <input type="hidden" class="form-control" name="IDVARIEDAD[]" value="<?php echo $r['ID_PVESPECIES']; ?>">
                                                                        <input type="hidden" class="form-control" name="IDTMANEJO[]" value="<?php echo $r['ID_TMANEJO']; ?>">
                                                                        <input type="hidden" class="form-control" name="IDCALIBRE[]" value="<?php echo $r['ID_CALIBRE']; ?>">
                                                                        <input type="hidden" class="form-control" name="IDEMBALAJE[]" value="<?php echo $r['ID_EMBALAJE']; ?>">
                                                                        <input type="hidden" class="form-control" name="STOCK[]" value="<?php echo $r['STOCK']; ?>">
                                                                        <input type="text" class="form-control" name="CAJAS[]">
                                                                    </div>
                                                                </td>
                                                                <td><?php echo $r['FECHA_EMBALADO']; ?></td>
                                                                <td>
                                                                    <?php
                                                                    $ARRAYEVERERECEPCIONID = $EEXPORTACION_ADO->verEstandar($r['ID_ESTANDAR']);
                                                                    echo $ARRAYEVERERECEPCIONID[0]['CODIGO_ESTANDAR'];
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    echo $ARRAYEVERERECEPCIONID[0]['NOMBRE_ESTANDAR'];
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);
                                                                    echo $ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'];
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    echo $ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'];
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    $ARRAYVERPVESPECIESID = $PVESPECIES_ADO->verPvespecies($r['ID_PVESPECIES']);
                                                                    $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($ARRAYVERPVESPECIESID[0]['ID_VESPECIES']);
                                                                    echo $ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'];
                                                                    ?>
                                                                </td>
                                                                <td><?php echo $ENVASERESTANTE;   ?> </td>
                                                                <td><?php
                                                                    if ($ARRAYDREPALETIZAJEBOLSA) {
                                                                        echo $r['TOTAL_NETO'] - $ARRAYDREPALETIZAJEBOLSA[0]['TOTAL_NETO'];;
                                                                    } else {
                                                                        echo $r['TOTAL_NETO'];
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    $ARRAYTMANEJO = $TMANEJO_ADO->verTmanejo($r['ID_TMANEJO']);
                                                                    if ($ARRAYTMANEJO) {
                                                                        echo $ARRAYTMANEJO[0]['NOMBRE_TMANEJO'];
                                                                    } else {
                                                                        echo "-";
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    $ARRAYCALIBRE = $CALIBRE_ADO->verCalibre($r['ID_CALIBRE']);
                                                                    if ($ARRAYCALIBRE) {
                                                                        echo $ARRAYCALIBRE[0]['NOMBRE_CALIBRE'];
                                                                    } else {
                                                                        echo "Sin Calibre";
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    $ARRAYEMBALAJE = $EMBALAJE_ADO->verEmbalaje($r['ID_EMBALAJE']);
                                                                    if ($ARRAYEMBALAJE) {
                                                                        echo $ARRAYEMBALAJE[0]['NOMBRE_EMBALAJE'];
                                                                    } else {
                                                                        echo "Sin Embalaje";
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    if ($r['STOCK']) {
                                                                        echo $r['STOCK'];
                                                                    } else {
                                                                        echo "Sin Stock";
                                                                    }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                <?php } ?>

                                            </tbody>
                                        </table>
                                        <label id="val_dproceso" class="validacion center"><?php echo $MENSAJE; ?> </label>
                                        <label id="val_dproceso" class="validacion center"><?php echo $MENSAJE1; ?> </label>
                                        <label id="val_dproceso" class="validacion center"><?php echo $MENSAJE2; ?> </label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1" name="CERRAR" value="CERRAR" Onclick="cerrar();">
                                    <i class="ti-trash"></i> CERRAR
                                </button>
                                <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="AGREGAR" value="AGREGAR">
                                    <i class="ti-save-alt"></i> AGREGAR
                                </button>


                            </div>
                        </div>
                    </form>
                </div>


                <!--.row -->
            </section>




            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php //include_once "../config/footer.php"; 
                ?>
                <?php //include_once "../config/menuExtra.php"; 
                ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../config/urlBase.php"; ?>
</body>

</html>