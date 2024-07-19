<?php

include_once "../../assest/config/validarUsuarioFruta.php";
//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/EEXPORTACION_ADO.php';
include_once '../../assest/controlador/VESPECIES_ADO.php';
include_once '../../assest/controlador/FOLIO_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/TCALIBRE_ADO.php';
include_once '../../assest/controlador/TMANEJO_ADO.php';
include_once '../../assest/controlador/TCOLOR_ADO.php';
include_once '../../assest/controlador/TCATEGORIA_ADO.php';

include_once '../../assest/controlador/RECEPCIONPT_ADO.php';
include_once '../../assest/controlador/DRECEPCIONPT_ADO.php';
include_once '../../assest/controlador/EXIEXPORTACION_ADO.php';


include_once '../../assest/modelo/DRECEPCIONPT.php';
include_once '../../assest/modelo/EXIEXPORTACION.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$EEXPORTACION_ADO =  new EEXPORTACION_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$FOLIO_ADO =  new FOLIO_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$TCALIBRE_ADO =  new TCALIBRE_ADO();
$TMANEJO_ADO =  new TMANEJO_ADO();
$TCOLOR_ADO =  new TCOLOR_ADO();
$TCATEGORIA_ADO =  new TCATEGORIA_ADO();

$RECEPCIONPT_ADO =  new RECEPCIONPT_ADO();
$DRECEPCIONPT_ADO =  new DRECEPCIONPT_ADO();
$EXIEXPORTACION_ADO =  new EXIEXPORTACION_ADO();
//INIICIALIZAR MODELO
$EXIEXPORTACION =  new EXIEXPORTACION();
$DRECEPCIONPT =  new DRECEPCIONPT();

//INICIALIZACION VARIABLES


$IDDRECEPCION = "";
$IDRECEPCION = "";
$FOLIODRECEPCION = "";
$FOLIOMANUAL = "";
$FOLIOMANUALR = "";
$NUMEROFOLIODRECEPCION = "";
$GASIFICADORECEPCION = "";
$FECHAEMBALADORECEPCION = "";

$CANTIDADENVASEDRECEPCION = "";
$KILOSBRUTORECEPCIONDRECEPCION = "";
$KILOSNETODRECEPCION = 0;
$KILOSPROMEDIODRECEPCION = 0;

$NOTADRECEPCION = "";
$ESTANDAR = "";
$VESPECIES = "";
$PRODUCTOR = "";
$PRODUCTORDATOS = "";
$FOLIO = "";
$TMANEJO = "";
$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";
$FECHARECEPCION = "";
$TRECEPCION = "";
$COLORESTANDAR="";
$CATEGORIAESTANDAR="";
$TCOLOR="";
$TCATEGORIA="";

$CANTIDADENVASERECIBIDO = 0;
$CANTIDADENVASERECHAZADO = 0;
$CANTIDADENVASEAPROBADO = 0;
$PDESHIDRATACION = 0;
$EMBOLSADO = "";
$KILOSNETOREAL = 0;
$KILOSBRUTORECEPCION = 0;
$KILOSNETODRECEPCION = 0;
$KILOSDESHIDRATACION = 0;
$STOCKESTANDAR = "";
$STOCK = 0;
$NETOESTANDAR = "";
$NETOV = 0;

$FOLIOBAS2 = "";
$FOLIOAUX = "";
$ULTIMOFOLIO = "";

$FOLIOALIASESTACTICO = "";
$FOLIOALIASDIANAMICO = "";



$DISABLED = "";
$DISABLED2 = "";
$DISABLED3 = "";
$DISABLEDSTYLE = "";
$DISABLEDSTYLE2 = "";
$DISABLEDSTYLE3 = "";
$SINO2="";
$SINO="";
$IDOP = "";
$IDOP2 = "";
$OP = "";
$NODATOURL = "";
$MENSAJE = "";
$MENSAJEELIMINAR = "";

//INICIALIZAR ARREGLOS

$ARRAYVERFOLIO = "";
$ARRAYULTIMOFOLIO = "";
$ARRAYOBTENERNUMEROLINEA = "";

$ARRAYESTANDAR = "";
$ARRAYVESPECIES;
$ARRAYDRECEPCION = "";
$ARRAYTMANEJO = "";
$ARRAYPRODUCTOR = "";

$ARRAYULTIMOFOLIO = "";
$ARRAYVERESTANDAR = "";
$ARRAYVERFOLIO = "";
$ARRAYVERFOLIOEXISTENCIA = "";
$ARRAYFECHAACTUAL = "";
$ARRAYTCATEGORIA="";
$ARRAYTCOLOR="";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES

$ARRAYESTANDAR = $EEXPORTACION_ADO->listarEstandarPorEmpresaCBX($EMPRESAS);
$ARRAYTMANEJO = $TMANEJO_ADO->listarTmanejoCBX();
$ARRAYTCALIBRE = $TCALIBRE_ADO->listarCalibrePorEmpresaCBX($EMPRESAS);
$ARRAYPRODUCTOR = $PRODUCTOR_ADO->listarProductorPorEmpresaCBX($EMPRESAS);

$ARRAYTCATEGORIA=$TCATEGORIA_ADO->listarTcategoriaPorEmpresaCBX($EMPRESAS);
$ARRAYTCOLOR=$TCOLOR_ADO->listarTcolorPorEmpresaCBX($EMPRESAS);

$ARRAYFECHAACTUAL = $DRECEPCIONPT_ADO->obtenerFecha();
$FECHAEMBALADORECEPCION = $ARRAYFECHAACTUAL[0]['FECHA'];
include_once "../../assest/config/validarDatosUrlD.php";


//OPERACIONES

if (isset($_GET["id"])) {
    $id_dato = $_GET["id"];
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

if (isset($_GET["idd"])) {
    $idd_dato = $_GET["idd"];
}else{
    $idd_dato = "";
}

if (isset($_GET["ad"])) {
    $acciond_dato = $_GET["ad"];
}else{
    $acciond_dato = "";
}

//OBTENCION DE DATOS ENVIADOR A LA URL
if (isset($id_dato) && isset($accion_dato) && isset($urlo_dato)) {
    $IDP = $id_dato;
    $OPP = $accion_dato;
    $URLO = $urlo_dato;

//echo 'dato1'.$IDP;
    $ARRAYRECEPCION = $RECEPCIONPT_ADO->verRecepcion($IDP);
    foreach ($ARRAYRECEPCION as $r) :
    //echo 'dato'.$r['FECHA_RECEPCION'];
        $TRECEPCION = "" . $r['TRECEPCION'];
        if ($TRECEPCION == "1") {
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $FECHARECEPCION = "" . $r['FECHA_RECEPCION'];
            $ARRAYVERPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
            if ($ARRAYVERPRODUCTOR) {
                $PRODUCTORDATOS = $ARRAYVERPRODUCTOR[0]["CSG_PRODUCTOR"] . ": "  . $ARRAYVERPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
            }
        }
        if ($TRECEPCION == "2") {
            $PLANTA2 = "" . $r['ID_PLANTA2'];
            $FECHARECEPCION = "" . $r['FECHA_RECEPCION'];
        }
    endforeach;
}
//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION , VISUALIZACION Y CREACION
if (isset($id_dato) && isset($accion_dato) && isset($urlo_dato) && isset($idd_dato) && isset($acciond_dato)) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $idd_dato;
    $OP = $acciond_dato;
    $IDP = $id_dato;
    $OPP = $accion_dato;
    $URLO = $urlo_dato;


    //IDENTIFICACIONES DE OPERACIONES

    //crear =  OBTENCION DE DATOS PARA LA CREACION DE REGISTRO
    if ($OP == "crear") {

        $DISABLED = "";
        $DISABLED2 = "";
        $DISABLED3 = "";
        $DISABLEDSTYLE = "";
        $DISABLEDSTYLE2 = "";
        $DISABLEDSTYLE3 = "";
        $ARRAYDRECEPCION = $DRECEPCIONPT_ADO->verDrecepcion($IDOP);
        foreach ($ARRAYDRECEPCION as $r) :
            // $NUMEROFOLIODRECEPCION = "" . $r['FOLIO_DRECEPCION'];
            /*
            if ($r['FOLIO_MANUAL'] == "1") {
                $FOLIOMANUAL = "on";
            }
            if ($r['FOLIO_MANUAL'] == "0") {
                $FOLIOMANUAL = "off";
            }*/

            $FECHAEMBALADORECEPCION = "" . $r['FECHA_EMBALADO_DRECEPCION'];

            //$CANTIDADENVASERECIBIDO = "" . $r['CANTIDAD_ENVASE_RECIBIDO_DRECEPCION'];
            //$CANTIDADENVASERECHAZADO = "" . $r['CANTIDAD_ENVASE_RECHAZADO_DRECEPCION'];
            //$CANTIDADENVASEAPROBADO = "" . $r['CANTIDAD_ENVASE_APROBADO_DRECEPCION'];
            //$KILOSNETOREAL = "" . $r['KILOS_NETO_REAL_DRECEPCION'];
            //$KILOSNETODRECEPCION = "" . $r['KILOS_NETO_DRECEPCION'];
            //$KILOSBRUTORECEPCION = "" . $r['KILOS_BRUTO_DRECEPCION'];
            //$PDESHIDRATACIONEESTANDAR = "" . $r['PDESHIDRATACION_DRECEPCION'];
            //$KILOSDESHIDRATACION = "" . $r['KILOS_DESHIDRATACION_DRECEPCION'];
            $EMBOLSADO = "" . $r['EMBOLSADO_DRECEPCION'];
            $TEMPERATURA = "" . $r['TEMPERATURA_DRECEPCION'];
            $STOCK = "" . $r['STOCK_DRECEPCION'];
            $TCOLOR = "" . $r['ID_TCOLOR'];
            $TCATEGORIA = "" . $r['ID_TCATEGORIA'];
            $GASIFICADORECEPCION = "" . $r['GASIFICADO_DRECEPCION'];
            $PREFRIO = "" . $r['PREFRIO_DRECEPCION'];
            $NOTADRECEPCION = "" . $r['NOTA_DRECEPCION'];
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $ARRAYVERPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
            if ($ARRAYVERPRODUCTOR) {
                $PRODUCTORDATOS = $ARRAYVERPRODUCTOR[0]["CSG_PRODUCTOR"] . ": "  . $ARRAYVERPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
            }
            $ESTANDAR = "" . $r['ID_ESTANDAR'];
            $ARRAYVERESTANDAR = $EEXPORTACION_ADO->verEstandar($ESTANDAR);
            if ($ARRAYVERESTANDAR) {
                $COLORESTANDAR = $ARRAYVERESTANDAR[0]['TCOLOR'];
                $CATEGORIAESTANDAR = $ARRAYVERESTANDAR[0]['TCATEGORIA'];
                $STOCKESTANDAR = $ARRAYVERESTANDAR[0]['STOCK'];
                $PESONETOEESTANDAR = $ARRAYVERESTANDAR[0]['PESO_NETO_ESTANDAR'];
                $PESOBRUTOEESTANDAR = $ARRAYVERESTANDAR[0]['PESO_BRUTO_ESTANDAR'];
                $PESOENVASEESTANDAR = $ARRAYVERESTANDAR[0]['PESO_ENVASE_ESTANDAR'];
                $PESOPALLETEESTANDAR = $ARRAYVERESTANDAR[0]['PESO_PALLET_ESTANDAR'];
                $PDESHIDRATACIONEESTANDAR = $ARRAYVERESTANDAR[0]['PDESHIDRATACION_ESTANDAR'];
                $ARRAYVESPECIES = $VESPECIES_ADO->buscarVespeciesPorEspeciesPorEmpresaCBX($ARRAYVERESTANDAR[0]['ID_ESPECIES'],$EMPRESAS);
            }
            $VESPECIES = "" . $r['ID_VESPECIES'];
            $FOLIO = "" . $r['ID_FOLIO'];
            $TEMBALAJE = "" . $r['ID_TEMBALAJE'];
            $TMANEJO = "" . $r['ID_TMANEJO'];
            $TCALIBRE = "" . $r['ID_TCALIBRE'];
            $TMANEJO = "" . $r['ID_TMANEJO'];
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {

        $DISABLED = "";
        $DISABLED2 = "disabled";
        $DISABLED3 = "disabled";
        $DISABLEDSTYLE = "";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $DISABLEDSTYLE3 = "style='background-color: #eeeeee;'";
        $ARRAYDRECEPCION = $DRECEPCIONPT_ADO->verDrecepcion($IDOP);
        foreach ($ARRAYDRECEPCION as $r) :
            $NUMEROFOLIODRECEPCION = "" . $r['FOLIO_DRECEPCION'];

            if ($r['FOLIO_MANUAL'] == "1") {
                $FOLIOMANUAL = "on";
            }
            if ($r['FOLIO_MANUAL'] == "0") {
                $FOLIOMANUAL = "off";
            }

            $FECHAEMBALADORECEPCION = "" . $r['FECHA_EMBALADO_DRECEPCION'];
            $CANTIDADENVASERECIBIDO = "" . $r['CANTIDAD_ENVASE_RECIBIDO_DRECEPCION'];
            $CANTIDADENVASERECHAZADO = "" . $r['CANTIDAD_ENVASE_RECHAZADO_DRECEPCION'];
            $CANTIDADENVASEAPROBADO = "" . $r['CANTIDAD_ENVASE_APROBADO_DRECEPCION'];
            $KILOSNETOREAL = "" . $r['KILOS_NETO_REAL_DRECEPCION'];
            $KILOSNETODRECEPCION = "" . $r['KILOS_NETO_DRECEPCION'];
            $KILOSBRUTORECEPCION = "" . $r['KILOS_BRUTO_DRECEPCION'];
            $PDESHIDRATACIONEESTANDAR = "" . $r['PDESHIDRATACION_DRECEPCION'];
            $KILOSDESHIDRATACION = "" . $r['KILOS_DESHIDRATACION_DRECEPCION'];
            $EMBOLSADO = "" . $r['EMBOLSADO_DRECEPCION'];
            $TEMPERATURA = "" . $r['TEMPERATURA_DRECEPCION'];
            $STOCK = "" . $r['STOCK_DRECEPCION'];
            $TCOLOR = "" . $r['ID_TCOLOR'];
            $TCATEGORIA = "" . $r['ID_TCATEGORIA'];
            $GASIFICADORECEPCION = "" . $r['GASIFICADO_DRECEPCION'];
            $PREFRIO = "" . $r['PREFRIO_DRECEPCION'];
            $NOTADRECEPCION = "" . $r['NOTA_DRECEPCION'];
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $ARRAYVERPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
            if ($ARRAYVERPRODUCTOR) {
                $PRODUCTORDATOS = $ARRAYVERPRODUCTOR[0]["CSG_PRODUCTOR"] . ": "  . $ARRAYVERPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
            }
            $ESTANDAR = "" . $r['ID_ESTANDAR'];
            $ARRAYVERESTANDAR = $EEXPORTACION_ADO->verEstandar($ESTANDAR);
            if ($ARRAYVERESTANDAR) {
                $COLORESTANDAR = $ARRAYVERESTANDAR[0]['TCOLOR'];
                $CATEGORIAESTANDAR = $ARRAYVERESTANDAR[0]['TCATEGORIA'];
                $STOCKESTANDAR = $ARRAYVERESTANDAR[0]['STOCK'];
                $PESONETOEESTANDAR = $ARRAYVERESTANDAR[0]['PESO_NETO_ESTANDAR'];
                $PESOBRUTOEESTANDAR = $ARRAYVERESTANDAR[0]['PESO_BRUTO_ESTANDAR'];
                $PESOENVASEESTANDAR = $ARRAYVERESTANDAR[0]['PESO_ENVASE_ESTANDAR'];
                $PESOPALLETEESTANDAR = $ARRAYVERESTANDAR[0]['PESO_PALLET_ESTANDAR'];
                $PDESHIDRATACIONEESTANDAR = $ARRAYVERESTANDAR[0]['PDESHIDRATACION_ESTANDAR'];
                $ARRAYVESPECIES = $VESPECIES_ADO->buscarVespeciesPorEspeciesPorEmpresaCBX($ARRAYVERESTANDAR[0]['ID_ESPECIES'],$EMPRESAS);
            }
            $VESPECIES = "" . $r['ID_VESPECIES'];
            $FOLIO = "" . $r['ID_FOLIO'];
            $TEMBALAJE = "" . $r['ID_TEMBALAJE'];
            $TMANEJO = "" . $r['ID_TMANEJO'];
            $TCALIBRE = "" . $r['ID_TCALIBRE'];
            $TMANEJO = "" . $r['ID_TMANEJO'];
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }

    //ver =  OBTENCION DE DATOS PARA LA VISUALIZACION DEL REGISTRO
    if ($OP == "ver") {
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        $DISABLED3 = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $DISABLEDSTYLE3 = "style='background-color: #eeeeee;'";
        $ARRAYDRECEPCION = $DRECEPCIONPT_ADO->verDrecepcion($IDOP);
        foreach ($ARRAYDRECEPCION as $r) :
            $NUMEROFOLIODRECEPCION = "" . $r['FOLIO_DRECEPCION'];

            if ($r['FOLIO_MANUAL'] == "1") {
                $FOLIOMANUAL = "on";
            }
            if ($r['FOLIO_MANUAL'] == "0") {
                $FOLIOMANUAL = "off";
            }

            $FECHAEMBALADORECEPCION = "" . $r['FECHA_EMBALADO_DRECEPCION'];
            $CANTIDADENVASERECIBIDO = "" . $r['CANTIDAD_ENVASE_RECIBIDO_DRECEPCION'];
            $CANTIDADENVASERECHAZADO = "" . $r['CANTIDAD_ENVASE_RECHAZADO_DRECEPCION'];
            $CANTIDADENVASEAPROBADO = "" . $r['CANTIDAD_ENVASE_APROBADO_DRECEPCION'];
            $KILOSNETOREAL = "" . $r['KILOS_NETO_REAL_DRECEPCION'];
            $KILOSNETODRECEPCION = "" . $r['KILOS_NETO_DRECEPCION'];
            $KILOSBRUTORECEPCION = "" . $r['KILOS_BRUTO_DRECEPCION'];
            $PDESHIDRATACIONEESTANDAR = "" . $r['PDESHIDRATACION_DRECEPCION'];
            $KILOSDESHIDRATACION = "" . $r['KILOS_DESHIDRATACION_DRECEPCION'];
            $EMBOLSADO = "" . $r['EMBOLSADO_DRECEPCION'];
            $TEMPERATURA = "" . $r['TEMPERATURA_DRECEPCION'];
            $STOCK = "" . $r['STOCK_DRECEPCION'];
            $TCOLOR = "" . $r['ID_TCOLOR'];
            $TCATEGORIA = "" . $r['ID_TCATEGORIA'];
            $GASIFICADORECEPCION = "" . $r['GASIFICADO_DRECEPCION'];
            $PREFRIO = "" . $r['PREFRIO_DRECEPCION'];
            $NOTADRECEPCION = "" . $r['NOTA_DRECEPCION'];
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $ARRAYVERPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
            if ($ARRAYVERPRODUCTOR) {
                $PRODUCTORDATOS = $ARRAYVERPRODUCTOR[0]["CSG_PRODUCTOR"] . ": "  . $ARRAYVERPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
            }
            $ESTANDAR = "" . $r['ID_ESTANDAR'];
            $ARRAYVERESTANDAR = $EEXPORTACION_ADO->verEstandar($ESTANDAR);
            if ($ARRAYVERESTANDAR) {
                $COLORESTANDAR = $ARRAYVERESTANDAR[0]['TCOLOR'];
                $CATEGORIAESTANDAR = $ARRAYVERESTANDAR[0]['TCATEGORIA'];
                $STOCKESTANDAR = $ARRAYVERESTANDAR[0]['STOCK'];
                $PESONETOEESTANDAR = $ARRAYVERESTANDAR[0]['PESO_NETO_ESTANDAR'];
                $PESOBRUTOEESTANDAR = $ARRAYVERESTANDAR[0]['PESO_BRUTO_ESTANDAR'];
                $PESOENVASEESTANDAR = $ARRAYVERESTANDAR[0]['PESO_ENVASE_ESTANDAR'];
                $PESOPALLETEESTANDAR = $ARRAYVERESTANDAR[0]['PESO_PALLET_ESTANDAR'];
                $PDESHIDRATACIONEESTANDAR = $ARRAYVERESTANDAR[0]['PDESHIDRATACION_ESTANDAR'];
                $ARRAYVESPECIES = $VESPECIES_ADO->buscarVespeciesPorEspeciesPorEmpresaCBX($ARRAYVERESTANDAR[0]['ID_ESPECIES'],$EMPRESAS);
            }
            $VESPECIES = "" . $r['ID_VESPECIES'];
            $FOLIO = "" . $r['ID_FOLIO'];
            $TEMBALAJE = "" . $r['ID_TEMBALAJE'];
            $TMANEJO = "" . $r['ID_TMANEJO'];
            $TCALIBRE = "" . $r['ID_TCALIBRE'];
            $TMANEJO = "" . $r['ID_TMANEJO'];
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }
    if ($OP == "eliminar") {
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        $DISABLED3 = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $DISABLEDSTYLE3 = "style='background-color: #eeeeee;'";
        $MENSAJEELIMINAR = "ESTA SEGURO DE ELIMINAR EL REGISTRO, PARA CONFIRMAR PRESIONE ELIMINAR";
        $ARRAYDRECEPCION = $DRECEPCIONPT_ADO->verDrecepcion($IDOP);
        foreach ($ARRAYDRECEPCION as $r) :
            $NUMEROFOLIODRECEPCION = "" . $r['FOLIO_DRECEPCION'];

            if ($r['FOLIO_MANUAL'] == "1") {
                $FOLIOMANUAL = "on";
            }
            if ($r['FOLIO_MANUAL'] == "0") {
                $FOLIOMANUAL = "off";
            }

            $FECHAEMBALADORECEPCION = "" . $r['FECHA_EMBALADO_DRECEPCION'];
            $CANTIDADENVASERECIBIDO = "" . $r['CANTIDAD_ENVASE_RECIBIDO_DRECEPCION'];
            $CANTIDADENVASERECHAZADO = "" . $r['CANTIDAD_ENVASE_RECHAZADO_DRECEPCION'];
            $CANTIDADENVASEAPROBADO = "" . $r['CANTIDAD_ENVASE_APROBADO_DRECEPCION'];
            $KILOSNETOREAL = "" . $r['KILOS_NETO_REAL_DRECEPCION'];
            $KILOSNETODRECEPCION = "" . $r['KILOS_NETO_DRECEPCION'];
            $KILOSBRUTORECEPCION = "" . $r['KILOS_BRUTO_DRECEPCION'];
            $PDESHIDRATACIONEESTANDAR = "" . $r['PDESHIDRATACION_DRECEPCION'];
            $KILOSDESHIDRATACION = "" . $r['KILOS_DESHIDRATACION_DRECEPCION'];
            $EMBOLSADO = "" . $r['EMBOLSADO_DRECEPCION'];
            $TEMPERATURA = "" . $r['TEMPERATURA_DRECEPCION'];
            $STOCK = "" . $r['STOCK_DRECEPCION'];
            $TCOLOR = "" . $r['ID_TCOLOR'];
            $TCATEGORIA = "" . $r['ID_TCATEGORIA'];
            $GASIFICADORECEPCION = "" . $r['GASIFICADO_DRECEPCION'];
            $PREFRIO = "" . $r['PREFRIO_DRECEPCION'];
            $NOTADRECEPCION = "" . $r['NOTA_DRECEPCION'];
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $ARRAYVERPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
            if ($ARRAYVERPRODUCTOR) {
                $PRODUCTORDATOS = $ARRAYVERPRODUCTOR[0]["CSG_PRODUCTOR"] . ": " . $ARRAYVERPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
            }
            $ESTANDAR = "" . $r['ID_ESTANDAR'];
            $ARRAYVERESTANDAR = $EEXPORTACION_ADO->verEstandar($ESTANDAR);
            if ($ARRAYVERESTANDAR) {
                $COLORESTANDAR = $ARRAYVERESTANDAR[0]['TCOLOR'];
                $CATEGORIAESTANDAR = $ARRAYVERESTANDAR[0]['TCATEGORIA'];
                $STOCKESTANDAR = $ARRAYVERESTANDAR[0]['STOCK'];
                $PESONETOEESTANDAR = $ARRAYVERESTANDAR[0]['PESO_NETO_ESTANDAR'];
                $PESOBRUTOEESTANDAR = $ARRAYVERESTANDAR[0]['PESO_BRUTO_ESTANDAR'];
                $PESOENVASEESTANDAR = $ARRAYVERESTANDAR[0]['PESO_ENVASE_ESTANDAR'];
                $PESOPALLETEESTANDAR = $ARRAYVERESTANDAR[0]['PESO_PALLET_ESTANDAR'];
                $PDESHIDRATACIONEESTANDAR = $ARRAYVERESTANDAR[0]['PDESHIDRATACION_ESTANDAR'];
                $ARRAYVESPECIES = $VESPECIES_ADO->buscarVespeciesPorEspeciesPorEmpresaCBX($ARRAYVERESTANDAR[0]['ID_ESPECIES'],$EMPRESAS);
            }
            $VESPECIES = "" . $r['ID_VESPECIES'];
            $FOLIO = "" . $r['ID_FOLIO'];
            $TEMBALAJE = "" . $r['ID_TEMBALAJE'];
            $TMANEJO = "" . $r['ID_TMANEJO'];
            $TCALIBRE = "" . $r['ID_TCALIBRE'];
            $TMANEJO = "" . $r['ID_TMANEJO'];
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }
}


if ($_POST) {
    if (isset($_REQUEST['FOLIOMANUAL'])) {
        $FOLIOMANUAL = $_REQUEST['FOLIOMANUAL'];

        if (isset($_REQUEST['NUMEROFOLIODRECEPCION'])) {
            $NUMEROFOLIODRECEPCION = $_REQUEST['NUMEROFOLIODRECEPCION'];
        }
    }
    if (isset($_REQUEST['FECHAEMBALADORECEPCION'])) {
        $FECHAEMBALADORECEPCION = $_REQUEST['FECHAEMBALADORECEPCION'];
    }
    if (isset($_REQUEST['PRODUCTOR'])) {
        $PRODUCTOR = $_REQUEST['PRODUCTOR'];
    }
    if (isset($_REQUEST['ESTANDAR'])) {
        $ESTANDAR = $_REQUEST['ESTANDAR'];
        $ARRAYVERESTANDAR = $EEXPORTACION_ADO->verEstandar($ESTANDAR);
        if ($ARRAYVERESTANDAR) {
            $ARRAYVESPECIES = $VESPECIES_ADO->buscarVespeciesPorEspeciesPorEmpresaCBX($ARRAYVERESTANDAR[0]['ID_ESPECIES'],$EMPRESAS);
            $STOCKESTANDAR = $ARRAYVERESTANDAR[0]['STOCK'];
            $COLORESTANDAR = $ARRAYVERESTANDAR[0]['TCOLOR'];
            $CATEGORIAESTANDAR = $ARRAYVERESTANDAR[0]['TCATEGORIA'];
            $PESONETOEESTANDAR = $ARRAYVERESTANDAR[0]['PESO_NETO_ESTANDAR'];
            $PESOBRUTOEESTANDAR = $ARRAYVERESTANDAR[0]['PESO_BRUTO_ESTANDAR'];
            $PESOENVASEESTANDAR = $ARRAYVERESTANDAR[0]['PESO_ENVASE_ESTANDAR'];
            $PESOPALLETEESTANDAR = $ARRAYVERESTANDAR[0]['PESO_PALLET_ESTANDAR'];
            $PDESHIDRATACIONEESTANDAR = $ARRAYVERESTANDAR[0]['PDESHIDRATACION_ESTANDAR'];
            $EMBOLSADO = $ARRAYVERESTANDAR[0]['EMBOLSADO'];
            $TEMBALAJE = $ARRAYVERESTANDAR[0]['ID_TEMBALAJE'];
            if (isset($_REQUEST['STOCK'])) {
                $STOCK = $_REQUEST['STOCK'];
            }
            if (isset($_REQUEST['TCATEGORIA'])) {
                $TCATEGORIA = $_REQUEST['TCATEGORIA'];
            }
            if (isset($_REQUEST['TCOLOR'])) {
                $TCOLOR = $_REQUEST['TCOLOR'];
            }
            if ($_REQUEST['CANTIDADENVASERECIBIDO'] != "" && $_REQUEST['CANTIDADENVASERECHAZADO'] != "") {
                $CANTIDADENVASEAPROBADO = $_REQUEST['CANTIDADENVASERECIBIDO'] - $_REQUEST['CANTIDADENVASERECHAZADO'];
                $KILOSNETODRECEPCION = $CANTIDADENVASEAPROBADO * $PESONETOEESTANDAR;
            }
        }
    }
    if (isset($_REQUEST['VESPECIES'])) {
        $VESPECIES = $_REQUEST['VESPECIES'];
    }
    if (isset($_REQUEST['CANTIDADENVASERECIBIDO'])) {
        $CANTIDADENVASERECIBIDO = $_REQUEST['CANTIDADENVASERECIBIDO'];
    }
    if (isset($_REQUEST['CANTIDADENVASERECHAZADO'])) {
        $CANTIDADENVASERECHAZADO = $_REQUEST['CANTIDADENVASERECHAZADO'];
    }
    if (isset($_REQUEST['KILOSNETOREAL'])) {
        $KILOSNETOREAL = $_REQUEST['KILOSNETOREAL'];
    }
    if (isset($_REQUEST['TCALIBRE'])) {
        $TCALIBRE = $_REQUEST['TCALIBRE'];
    }
    if (isset($_REQUEST['TEMPERATURA'])) {
        $TEMPERATURA = $_REQUEST['TEMPERATURA'];
    }
    if (isset($_REQUEST['TMANEJO'])) {
        $TMANEJO = $_REQUEST['TMANEJO'];
    }
    if (isset($_REQUEST['GASIFICADORECEPCION'])) {
        $GASIFICADORECEPCION = $_REQUEST['GASIFICADORECEPCION'];
    }
    if (isset($_REQUEST['PREFRIO'])) {
        $PREFRIO = $_REQUEST['PREFRIO'];
    }
    if (isset($_REQUEST['NOTADRECEPCION'])) {
        $NOTADRECEPCION = $_REQUEST['NOTADRECEPCION'];
    }
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Detalle </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../../assest/config/urlHead.php"; ?>
        <!- FUNCIONES BASES -!>
            <script type="text/javascript">

                function neto(){
                    var repuesta;
                    var envasesaprobados;
                    var neto;
                    var deshidratacion;
                    var pesopallet
                    var bruto;

                    ESTANDAR = document.getElementById("ESTANDAR").selectedIndex;
                    CANTIDADENVASERECIBIDO = document.getElementById("CANTIDADENVASERECIBIDO").value;
                    CANTIDADENVASERECHAZADO = document.getElementById("CANTIDADENVASERECHAZADO").value;

                    document.getElementById('val_estandar').innerHTML = "";
                    document.getElementById('val_cantidadenvaserecibido').innerHTML = "";
                    document.getElementById('val_cantidadenvaserechazado').innerHTML = "";


                    if (ESTANDAR == null || ESTANDAR == 0) {
                        document.form_reg_dato.ESTANDAR.focus();
                        document.form_reg_dato.ESTANDAR.style.borderColor = "#FF0000";
                        document.getElementById('val_estandar').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        repuesta = 1;
                    } else {
                        repuesta = 0;
                        document.form_reg_dato.ESTANDAR.style.borderColor = "#4AF575";
                    }

                    if (CANTIDADENVASERECIBIDO == null || CANTIDADENVASERECIBIDO.length == 0 || /^\s+$/.test(CANTIDADENVASERECIBIDO)) {
                        document.form_reg_dato.CANTIDADENVASERECIBIDO.focus();
                        document.form_reg_dato.CANTIDADENVASERECIBIDO.style.borderColor = "#FF0000";
                        document.getElementById('val_cantidadenvaserecibido').innerHTML = "NO HA INGRESADO DATOS";
                        repuesta = 1;
                    } else {
                        repuesta = 0;
                        document.form_reg_dato.CANTIDADENVASERECIBIDO.style.borderColor = "#4AF575";
                    }
                    if (CANTIDADENVASERECIBIDO == 0) {
                        document.form_reg_dato.CANTIDADENVASERECIBIDO.focus();
                        document.form_reg_dato.CANTIDADENVASERECIBIDO.style.borderColor = "#FF0000";
                        document.getElementById('val_cantidadenvaserecibido').innerHTML = "TIENE QUE SER DISTINTO A CERO";
                        repuesta = 1;
                    } else {
                        repuesta = 0;
                        document.form_reg_dato.CANTIDADENVASERECIBIDO.style.borderColor = "#4AF575";
                    }
                    if (CANTIDADENVASERECHAZADO == null || CANTIDADENVASERECHAZADO.length == 0 || /^\s+$/.test(CANTIDADENVASERECHAZADO)) {
                        document.form_reg_dato.CANTIDADENVASERECHAZADO.focus();
                        document.form_reg_dato.CANTIDADENVASERECHAZADO.style.borderColor = "#FF0000";
                        document.getElementById('val_cantidadenvaserechazado').innerHTML = "NO HA INGRESADO DATOS";
                        repuesta = 1;
                    } else {
                        repuesta = 0;
                        document.form_reg_dato.CANTIDADENVASERECHAZADO.style.borderColor = "#4AF575";
                    }

                    if (repuesta == 0) {
                        CANTIDADENVASERECIBIDO = parseInt( document.getElementById("CANTIDADENVASERECIBIDO").value);
                        CANTIDADENVASERECHAZADO = parseInt( document.getElementById("CANTIDADENVASERECHAZADO").value);
                        PESONETOEESTANDAR = parseFloat(document.getElementById("PESONETOEESTANDAR").value);
                        PESOBRUTOEESTANDAR = parseFloat(document.getElementById("PESOBRUTOEESTANDAR").value);
                        PESOENVASEESTANDAR = parseFloat(document.getElementById("PESOENVASEESTANDAR").value);
                        PESOPALLETEESTANDAR = parseFloat(document.getElementById("PESOPALLETEESTANDAR").value);
                        PDESHIDRATACIONEESTANDAR = parseFloat(document.getElementById("PDESHIDRATACIONEESTANDAR").value);
                        pesopallet = PESOPALLETEESTANDAR;
                        envasesaprobados = CANTIDADENVASERECIBIDO-CANTIDADENVASERECHAZADO;

                        neto = envasesaprobados * PESONETOEESTANDAR;
                        deshidratacion = neto * (1 + (PDESHIDRATACIONEESTANDAR / 100));
                        bruto = (envasesaprobados * PESOENVASEESTANDAR);
                        bruto = bruto + (deshidratacion + PESOPALLETEESTANDAR)
                        neto = neto.toFixed(2);
                        deshidratacion = deshidratacion.toFixed(2);
                        bruto = bruto.toFixed(2);
                    }

                    document.getElementById('CANTIDADENVASEAPROBADOV').value = envasesaprobados;
                    document.getElementById('KILOSNETODRECEPCIONV').value = neto;
                    //document.getElementById('val_estandar').innerHTML = "neto: " + neto + " des:" + deshidratacion + " bruto: " + bruto;

                }

                function validacion() {

                    FOLIOMANUAL = document.getElementById('FOLIOMANUAL').checked;
                    FECHAEMBALADORECEPCION = document.getElementById("FECHAEMBALADORECEPCION").value;
                    ESTANDAR = document.getElementById("ESTANDAR").selectedIndex;
                    GASIFICADORECEPCION = document.getElementById("GASIFICADORECEPCION").selectedIndex;
                    VESPECIES = document.getElementById("VESPECIES").selectedIndex;
                    CANTIDADENVASERECIBIDO = document.getElementById("CANTIDADENVASERECIBIDO").value;
                    CANTIDADENVASERECHAZADO = document.getElementById("CANTIDADENVASERECHAZADO").value;
                    KILOSNETOREAL = document.getElementById("KILOSNETOREAL").value;
                    TCALIBRE = document.getElementById("TCALIBRE").selectedIndex;
                    TMANEJO = document.getElementById("TMANEJO").selectedIndex;
                    PREFRIO = document.getElementById("PREFRIO").selectedIndex;
                    TEMPERATURA = document.getElementById("TEMPERATURA").value;
                    STOCKESTANDAR = document.getElementById("STOCKESTANDAR").value;
                    COLORESTANDAR = document.getElementById("COLORESTANDAR").value;
                    CATEGORIAESTANDAR = document.getElementById("CATEGORIAESTANDAR").value;
                    TRECEPCION = document.getElementById("TRECEPCION").value;


                    NOTADRECEPCION = document.getElementById("NOTADRECEPCION").selectedIndex;




                    document.getElementById('val_folio').innerHTML = "";
                    document.getElementById('val_fechaembalado').innerHTML = "";
                    document.getElementById('val_estandar').innerHTML = "";
                    document.getElementById('val_gasificacion').innerHTML = "";
                    document.getElementById('val_vespecies').innerHTML = "";
                    document.getElementById('val_cantidadenvaserecibido').innerHTML = "";
                    document.getElementById('val_cantidadenvaserechazado').innerHTML = "";
                    document.getElementById('val_netoreal').innerHTML = "";
                    document.getElementById('val_calibre').innerHTML = "";
                    document.getElementById('val_tmanejo').innerHTML = "";
                    document.getElementById('val_prefrio').innerHTML = "";
                    document.getElementById('val_t').innerHTML = "";
                    document.getElementById('val_nota').innerHTML = "";



                    if (FOLIOMANUAL == true) {
                        NUMEROFOLIODRECEPCION = document.getElementById("NUMEROFOLIODRECEPCION").value;
                        document.getElementById('val_folio').innerHTML = "";

                        if (NUMEROFOLIODRECEPCION == null || NUMEROFOLIODRECEPCION.length == 0 || /^\s+$/.test(NUMEROFOLIODRECEPCION)) {
                            document.form_reg_dato.NUMEROFOLIODRECEPCION.focus();
                            document.form_reg_dato.NUMEROFOLIODRECEPCION.style.borderColor = "#FF0000";
                            document.getElementById('val_folio').innerHTML = "NO HA INGRESADO EL FOLIO";
                            return false;
                        }
                        document.form_reg_dato.NUMEROFOLIODRECEPCION.style.borderColor = "#4AF575";


                        if (/^0/.test(NUMEROFOLIODRECEPCION)) {
                            document.form_reg_dato.NUMEROFOLIODRECEPCION.focus();
                            document.form_reg_dato.NUMEROFOLIODRECEPCION.style.borderColor = "#FF0000";
                            document.getElementById('val_folio').innerHTML = "EL FOLIO NO PUEDE EMPEZAR CON 0";
                            return false;
                        }
                        document.form_reg_dato.NUMEROFOLIODRECEPCION.style.borderColor = "#4AF575";


                        if (NUMEROFOLIODRECEPCION.length > 10) {
                            document.form_reg_dato.NUMEROFOLIODRECEPCION.focus();
                            document.form_reg_dato.NUMEROFOLIODRECEPCION.style.borderColor = "#FF0000";
                            document.getElementById('val_folio').innerHTML = "EL FOLIO NO PUEDE TENER MAS DE DIES DIGITOS";
                            return false;
                        }
                        document.form_reg_dato.NUMEROFOLIODRECEPCION.style.borderColor = "#4AF575";
                    }

                    if (FECHAEMBALADORECEPCION == null || FECHAEMBALADORECEPCION.length == 0 || /^\s+$/.test(FECHAEMBALADORECEPCION)) {
                        document.form_reg_dato.FECHAEMBALADORECEPCION.focus();
                        document.form_reg_dato.FECHAEMBALADORECEPCION.style.borderColor = "#FF0000";
                        document.getElementById('val_fechaembalado').innerHTML = "NO HA INGRESADO DATOS";
                        return false;
                    }
                    document.form_reg_dato.FECHAEMBALADORECEPCION.style.borderColor = "#4AF575";

                    if (TRECEPCION == 2) {
                        PRODUCTOR = document.getElementById("PRODUCTOR").selectedIndex;
                        document.getElementById('val_productor').innerHTML = "";

                        if (PRODUCTOR == null || PRODUCTOR == 0) {
                            document.form_reg_dato.PRODUCTOR.focus();
                            document.form_reg_dato.PRODUCTOR.style.borderColor = "#FF0000";
                            document.getElementById('val_productor').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                            return false;
                        }
                        document.form_reg_dato.PRODUCTOR.style.borderColor = "#4AF575";
                    }

                    if (ESTANDAR == null || ESTANDAR == 0) {
                        document.form_reg_dato.ESTANDAR.focus();
                        document.form_reg_dato.ESTANDAR.style.borderColor = "#FF0000";
                        document.getElementById('val_estandar').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.ESTANDAR.style.borderColor = "#4AF575";

                    if (GASIFICADORECEPCION == null || GASIFICADORECEPCION == 0) {
                        document.form_reg_dato.GASIFICADORECEPCION.focus();
                        document.form_reg_dato.GASIFICADORECEPCION.style.borderColor = "#FF0000";
                        document.getElementById('val_gasificacion').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.GASIFICADORECEPCION.style.borderColor = "#4AF575";

                    if (VESPECIES == null || VESPECIES == 0) {
                        document.form_reg_dato.VESPECIES.focus();
                        document.form_reg_dato.VESPECIES.style.borderColor = "#FF0000";
                        document.getElementById('val_vespecies').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.VESPECIES.style.borderColor = "#4AF575";


                    if (CANTIDADENVASERECIBIDO == null || CANTIDADENVASERECIBIDO.length == 0 || /^\s+$/.test(CANTIDADENVASERECIBIDO)) {
                        document.form_reg_dato.CANTIDADENVASERECIBIDO.focus();
                        document.form_reg_dato.CANTIDADENVASERECIBIDO.style.borderColor = "#FF0000";
                        document.getElementById('val_cantidadenvaserecibido').innerHTML = "NO HA INGRESADO DATOS";
                        return false;
                    }
                    document.form_reg_dato.CANTIDADENVASERECIBIDO.style.borderColor = "#4AF575";

                    if (CANTIDADENVASERECIBIDO == 0) {
                        document.form_reg_dato.CANTIDADENVASERECIBIDO.focus();
                        document.form_reg_dato.CANTIDADENVASERECIBIDO.style.borderColor = "#FF0000";
                        document.getElementById('val_cantidadenvaserecibido').innerHTML = "TIENE QUE SER DISTINTO A CERO";
                        return false;
                    }
                    document.form_reg_dato.CANTIDADENVASERECIBIDO.style.borderColor = "#4AF575";


                    if (CANTIDADENVASERECHAZADO == null || CANTIDADENVASERECHAZADO.length == 0 || /^\s+$/.test(CANTIDADENVASERECHAZADO)) {
                        document.form_reg_dato.CANTIDADENVASERECHAZADO.focus();
                        document.form_reg_dato.CANTIDADENVASERECHAZADO.style.borderColor = "#FF0000";
                        document.getElementById('val_cantidadenvaserechazado').innerHTML = "NO HA INGRESADO DATOS";
                        return false;
                    }
                    document.form_reg_dato.CANTIDADENVASERECHAZADO.style.borderColor = "#4AF575";

                    if (KILOSNETOREAL == null || KILOSNETOREAL.length == 0 || /^\s+$/.test(KILOSNETOREAL)) {
                        document.form_reg_dato.KILOSNETOREAL.focus();
                        document.form_reg_dato.KILOSNETOREAL.style.borderColor = "#FF0000";
                        document.getElementById('val_netoreal').innerHTML = "NO HA INGRESADO DATOS";
                        return false;
                    }
                    document.form_reg_dato.KILOSNETOREAL.style.borderColor = "#4AF575";

                    if (TCALIBRE == null || TCALIBRE == 0) {
                        document.form_reg_dato.TCALIBRE.focus();
                        document.form_reg_dato.TCALIBRE.style.borderColor = "#FF0000";
                        document.getElementById('val_calibre').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.TCALIBRE.style.borderColor = "#4AF575";

                    if (TMANEJO == null || TMANEJO == 0) {
                        document.form_reg_dato.TMANEJO.focus();
                        document.form_reg_dato.TMANEJO.style.borderColor = "#FF0000";
                        document.getElementById('val_tmanejo').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.TMANEJO.style.borderColor = "#4AF575";


                    if (PREFRIO == null || PREFRIO == 0) {
                        document.form_reg_dato.PREFRIO.focus();
                        document.form_reg_dato.PREFRIO.style.borderColor = "#FF0000";
                        document.getElementById('val_prefrio').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.PREFRIO.style.borderColor = "#4AF575";
                    /*
                                                      if (TEMPERATURA == null || TEMPERATURA.length == 0 || /^\s+$/.test(TEMPERATURA)) {
                                                          document.form_reg_dato.TEMPERATURA.focus();
                                                          document.form_reg_dato.TEMPERATURA.style.borderColor = "#FF0000";
                                                          document.getElementById('val_t').innerHTML = "NO HA INGRESADO DATOS";
                                                          return false;
                                                      }
                                                      document.form_reg_dato.TEMPERATURA.style.borderColor = "#4AF575";
                    */

                    if (STOCKESTANDAR == 1) {
                        STOCK = document.getElementById("STOCK").value;
                        document.getElementById('val_stock').innerHTML = "";
                        if (STOCK == null || STOCK.length == 0 || /^\s+$/.test(STOCK)) {
                            document.form_reg_dato.STOCK.focus();
                            document.form_reg_dato.STOCK.style.borderColor = "#FF0000";
                            document.getElementById('val_stock').innerHTML = "NO HA INGRESADO DATOS";
                            return false;
                        }
                        document.form_reg_dato.STOCK.style.borderColor = "#4AF575";
                    }
                      
  
                    /*

                    if (CATEGORIAESTANDAR == 1) {
                        TCATEGORIA = document.getElementById("TCATEGORIA").value;
                        document.getElementById('val_tcategoria').innerHTML = "";                       

                        if (TCATEGORIA == null || TCATEGORIA == 0) {
                            document.form_reg_dato.TCATEGORIA.focus();
                            document.form_reg_dato.TCATEGORIA.style.borderColor = "#FF0000";
                            document.getElementById('val_tcategoria').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                            return false;
                        }
                        document.form_reg_dato.TCATEGORIA.style.borderColor = "#4AF575";
                    }
                    
                    if (COLORESTANDAR == 1) {
                        TCOLOR = document.getElementById("TCOLOR").value;
                        document.getElementById('val_tcolor').innerHTML = "";                        

                        if (TCOLOR == null || TCOLOR == 0) {
                            document.form_reg_dato.TCOLOR.focus();
                            document.form_reg_dato.TCOLOR.style.borderColor = "#FF0000";
                            document.getElementById('val_tcolor').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                            return false;
                        }
                        document.form_reg_dato.TCOLOR.style.borderColor = "#4AF575";
                    }
                    */

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
            <?php include_once "../../assest/config/menuFruta.php"; ?>
            <div class="content-wrapper">
                <div class="container-full">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Frigorifico</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Modulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Frigorifico</li>
                                            <li class="breadcrumb-item" aria-current="page">Recepción P. Terminado</li>
                                            <li class="breadcrumb-item" aria-current="page">Registro Recepción</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Registro Detalle </a>
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <?php include_once "../../assest/config/verIndicadorEconomico.php"; ?>
                        </div>
                    </div>
                    <section class="content">
                        <div class="box">
                            <div class="box-header with-border bg-success">                                   
                                <h4 class="box-title">Registro Detalle</h4>                                        
                            </div>
                            <form class="form" role="form" method="post" name="form_reg_dato" >
                                <div class="box-body form-element">
                                    <?php if($ESTADO_FOLIOMANUAL == 1){ ?>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" placeholder="FOLIOMANUAL" id="FOLIOMANUALE" name="FOLIOMANUALE" value="<?php echo $FOLIOMANUAL; ?>" />
                                        <input type="checkbox" class="chk-col-danger" name="FOLIOMANUAL" id="FOLIOMANUAL" <?php echo $DISABLED2; ?> <?php echo $DISABLEDSTYLE2; ?> <?php if ($FOLIOMANUAL == "on") {
                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                    } ?> onchange="this.form.submit()">
                                        <label for="FOLIOMANUAL"> Folio Manual</label>
                                    </div>
                                    <?php }?>
                                    <div class="row">
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6  ">
                                            <div class="form-group">
                                                <label>Folio</label>
                                                <input type="hidden" class="form-control" placeholder="ID DRECEPCION" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID RECEPCION" id="IDP" name="IDP" value="<?php echo $IDP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID RECEPCION" id="OPP" name="OPP" value="<?php echo $OPP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID RECEPCION" id="URLO" name="URLO" value="<?php echo $URLO; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTA" name="PLANTA" value="<?php echo $PLANTAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADAS; ?>" />

                                                <input type="hidden" id="NUMEROFOLIODRECEPCIONE" name="NUMEROFOLIODRECEPCIONE" value="<?php echo $NUMEROFOLIODRECEPCION; ?>" />

                                                <input type="number" class="form-control" placeholder="Numero Folio " id="NUMEROFOLIODRECEPCION" name="NUMEROFOLIODRECEPCION" <?php echo $DISABLED2; ?> <?php echo $DISABLEDSTYLE2; ?> <?php if ($FOLIOMANUAL != "on") {
                                                                                                                                                                                                                                            echo "required disabled style='background-color: #eeeeee;'";
                                                                                                                                                                                                                                        } ?> value="<?php echo $NUMEROFOLIODRECEPCION; ?>" />
                                                <label id="val_folio" class="validacion"> <?php echo $MENSAJE; ?> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <label>Fecha Embalado </label>
                                                <input type="date" class="form-control" placeholder="Fecha Embalado" id="FECHAEMBALADORECEPCION" name="FECHAEMBALADORECEPCION" value="<?php echo $FECHAEMBALADORECEPCION; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLEDSTYLE; ?> />
                                                <label id="val_fechaembalado" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" placeholder="TRECEPCION" id="TRECEPCION" name="TRECEPCION" value="<?php echo $TRECEPCION; ?>" />
                                                <input type="hidden" class="form-control" placeholder="FOLIO" id="FOLIO" name="FOLIO" value="<?php echo $FOLIO; ?>" />
                                                <input type="hidden" class="form-control" placeholder="FECHARECEPCION" id="FECHARECEPCION" name="FECHARECEPCION" value="<?php echo $FECHARECEPCION; ?>" />
                                                <input type="hidden" class="form-control" placeholder="PLANTA2" id="PLANTA2" name="PLANTA2" value="<?php echo $PLANTA2; ?>" />
                                                <label>Productor </label>
                                                <?php if ($TRECEPCION == 1) { ?>
                                                    <input type="hidden" class="form-control" placeholder="PRODUCTOR" id="PRODUCTOR" name="PRODUCTOR" value="<?php echo $PRODUCTOR; ?>" />
                                                    <input type="text" class="form-control" placeholder="Productor" id="PRODUCTORV" name="PRODUCTORV" value="<?php echo $PRODUCTORDATOS; ?>" disabled style='background-color: #eeeeee;'"/>
                                                 <?php } ?>
                                                <?php if ($TRECEPCION == 2) { ?>
                                                    <select class="form-control select2" id="PRODUCTOR" name="PRODUCTOR" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLEDSTYLE; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYPRODUCTOR as $r) : ?>
                                                            <?php if ($ARRAYPRODUCTOR) {    ?>
                                                                <option value="<?php echo $r['ID_PRODUCTOR']; ?>" <?php if ($PRODUCTOR == $r['ID_PRODUCTOR']) { echo "selected"; } ?>>
                                                                    <?php echo $r['CSG_PRODUCTOR'] ?> : <?php echo $r['RUT_PRODUCTOR'] ?> : <?php echo $r['NOMBRE_PRODUCTOR'] ?>
                                                                </option>
                                                            <?php } else { ?>
                                                                <option>No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                <?php } ?>
                                                <label id="val_productor" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <label>Estandar </label>
                                                <input type="hidden" class="form-control" placeholder="EMBOLSADO" id="EMBOLSADO" name="EMBOLSADO" value="<?php echo $EMBOLSADO; ?>" />
                                                <input type="hidden" class="form-control" placeholder="TEMBALAJE" id="TEMBALAJE" name="TEMBALAJE" value="<?php echo $TEMBALAJE; ?>" />
                                                <input type="hidden" id="PESONETOEESTANDAR" name="PESONETOEESTANDAR" value="<?php echo $PESONETOEESTANDAR; ?>" />
                                                <input type="hidden" id="PESOBRUTOEESTANDAR" name="PESOBRUTOEESTANDAR" value="<?php echo $PESOBRUTOEESTANDAR; ?>" />
                                                <input type="hidden" id="PESOENVASEESTANDAR" name="PESOENVASEESTANDAR" value="<?php echo $PESOENVASEESTANDAR; ?>" />
                                                <input type="hidden" id="PESOPALLETEESTANDAR" name="PESOPALLETEESTANDAR" value="<?php echo $PESOPALLETEESTANDAR; ?>" />
                                                <input type="hidden" id="PDESHIDRATACIONEESTANDAR" name="PDESHIDRATACIONEESTANDAR" value="<?php echo $PDESHIDRATACIONEESTANDAR; ?>" />
                                                <input type="hidden" class="form-control" placeholder="STOCKESTANDAR" id="STOCKESTANDAR" name="STOCKESTANDAR" value="<?php echo $STOCKESTANDAR; ?>" />
                                                <input type="hidden" class="form-control" placeholder="CATEGORIAESTANDAR" id="CATEGORIAESTANDAR" name="CATEGORIAESTANDAR" value="<?php echo $CATEGORIAESTANDAR; ?>" />
                                                <input type="hidden" class="form-control" placeholder="COLORESTANDAR" id="COLORESTANDAR" name="COLORESTANDAR" value="<?php echo $COLORESTANDAR; ?>" />
                                                <select class="form-control select2" id="ESTANDAR" name="ESTANDAR" style="width: 100%;" onchange="this.form.submit()" <?php echo $DISABLED; ?> <?php echo $DISABLEDSTYLE; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYESTANDAR as $r) : ?>
                                                        <?php if ($ARRAYESTANDAR) {    ?>
                                                            <option value="<?php echo $r['ID_ESTANDAR']; ?>" <?php if ($ESTANDAR == $r['ID_ESTANDAR']) {  echo "selected"; } ?>>
                                                                <?php echo $r['CODIGO_ESTANDAR'] ?> : <?php echo $r['NOMBRE_ESTANDAR'] ?>
                                                             </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados</option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_estandar" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <label>Gasificacion</label>
                                                <select class="form-control select2" id="GASIFICADORECEPCION" name="GASIFICADORECEPCION" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                    <option></option>
                                                    <option value="0" <?php if ($GASIFICADORECEPCION == "0") { echo "selected"; } ?>>No</option>
                                                    <option value="1" <?php if ($GASIFICADORECEPCION == "1") { echo "selected"; } ?>> Si </option>
                                                </select>
                                                <label id="val_gasificacion" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <label>Variedad</label><br>
                                                <select class="form-control select2" id="VESPECIES" name="VESPECIES" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYVESPECIES as $r) : ?>
                                                        <?php if ($ARRAYVESPECIES) {    ?>
                                                            <option value="<?php echo $r['ID_VESPECIES']; ?>" <?php if ($VESPECIES == $r['ID_VESPECIES']) { echo "selected";  } ?>> 
                                                                <?php echo $r['NOMBRE_VESPECIES']; ?>
                                                            </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados</option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_vespecies" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <label>Peso Pallet</label>
                                                <input type="hidden" class="form-control" placeholder="Peso Pallet" id="PESOPALLETRECEPCION" name="PESOPALLETRECEPCION" value="<?php echo $PESOPALLETEESTANDAR; ?>" />
                                                <input type="number" step="0.01" class="form-control" placeholder="Peso Pallet" id="PESOPALLETRECEPCIONV" name="PESOPALLETRECEPCIONV" value="<?php echo $PESOPALLETEESTANDAR; ?>" disabled style="background-color: #eeeeee;" />
                                                <label id="val_pesopallet" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <label>Cantidad Envase Recibido </label>
                                                <input type="hidden" id="CANTIDADENVASERECIBIDOE" name="CANTIDADENVASERECIBIDOE" value="<?php echo $CANTIDADENVASERECIBIDO; ?>" />
                                                <input type="number" class="form-control" placeholder="Cantidad Envase" onchange="neto();" id="CANTIDADENVASERECIBIDO" name="CANTIDADENVASERECIBIDO" value="<?php echo $CANTIDADENVASERECIBIDO; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLEDSTYLE; ?> />
                                                <label id="val_cantidadenvaserecibido" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <label>Cantidad Envase Rechazado</label>
                                                <input type="hidden" id="CANTIDADENVASERECHAZADOE" name="CANTIDADENVASERECHAZADOE" value="<?php echo $CANTIDADENVASERECHAZADO; ?>" />
                                                <input type="number" class="form-control" placeholder="Cantidad Envase" onchange="neto()" id="CANTIDADENVASERECHAZADO" name="CANTIDADENVASERECHAZADO" value="<?php echo $CANTIDADENVASERECHAZADO; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLEDSTYLE; ?> />
                                                <label id="val_cantidadenvaserechazado" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <label>Cantidad Envase Aprobados</label>
                                                <input type="hidden" class="form-control" placeholder="Cantidad Envase" id="CANTIDADENVASEAPROBADO" name="CANTIDADENVASEAPROBADO" value="<?php echo $CANTIDADENVASEAPROBADO; ?>" />
                                                <input type="number" class="form-control" placeholder="Cantidad Envase" id="CANTIDADENVASEAPROBADOV" name="CANTIDADENVASEAPROBADOV" value="<?php echo $CANTIDADENVASEAPROBADO; ?>" disabled style="background-color: #eeeeee;" />
                                                <label id="val_cantidadenvaseaprobados" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <label>Kilo Neto</label>
                                                <input type="hidden" class="form-control" placeholder="KILOSNETODRECEPCION" id="KILOSNETODRECEPCION" name="KILOSNETODRECEPCION" value="<?php echo $KILOSNETODRECEPCION; ?>" />
                                                <input type="number" step="0.01" class="form-control" placeholder="Kilo Neto" step="0.01" id="KILOSNETODRECEPCIONV" name="KILOSNETODRECEPCIONV" value="<?php echo $KILOSNETODRECEPCION; ?>" disabled style='background-color: #eeeeee;'" />
                                                 <label id=" val_kilosneto" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Kilos Netos Reales</label>
                                                <input type="hidden" id="KILOSNETOREALE" name="KILOSNETOREALE" value="<?php echo $KILOSNETOREALE; ?>" />
                                                <input type="number" step="0.01" class="form-control" placeholder="Kilos Netos Real" id="KILOSNETOREAL" name="KILOSNETOREAL" value="<?php echo $KILOSNETOREAL; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLEDSTYLE; ?> />
                                                <label id="val_netoreal" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <label>Calibre</label>
                                                <input type="hidden" id="TCALIBREE" name="TCALIBREE" value="<?php echo $TCALIBRE; ?>" />
                                                <select class="form-control select2" id="TCALIBRE" name="TCALIBRE" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYTCALIBRE as $r) : ?>
                                                        <?php if ($ARRAYTCALIBRE) {    ?>
                                                            <option value="<?php echo $r['ID_TCALIBRE']; ?>" <?php if ($TCALIBRE == $r['ID_TCALIBRE']) {  echo "selected";  } ?>> 
                                                                <?php echo $r['NOMBRE_TCALIBRE'] ?> </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados</option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_calibre" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <label>Tipo Manejo</label><br>
                                                <select class="form-control select2" id="TMANEJO" name="TMANEJO" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYTMANEJO as $r) : ?>
                                                        <?php if ($ARRAYTMANEJO) {    ?>
                                                            <option value="<?php echo $r['ID_TMANEJO']; ?>" <?php if ($TMANEJO == $r['ID_TMANEJO']) { echo "selected";   } ?>> 
                                                                <?php echo $r['NOMBRE_TMANEJO'];  ?>
                                                            </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados</option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_tmanejo" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <label>Prefrio </label>
                                                <input type="hidden" id="PREFRIOE" name="PREFRIOE" value="<?php echo $PREFRIO; ?>" />
                                                <select class="form-control select2" id="PREFRIO" name="PREFRIO" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                    <option></option>
                                                    <option value="0" <?php if ($PREFRIO == "0") { echo "selected"; } ?>>No</option>
                                                    <option value="1" <?php if ($PREFRIO == "1") { echo "selected"; } ?>> Si </option>
                                                </select>
                                                <label id="val_prefrio" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Temperatura</label>
                                                <input type="hidden" id="TEMPERATURAE" name="TEMPERATURAE" value="<?php echo $TEMPERATURA; ?>" />
                                                <input type="number" step="0.01" class="form-control" placeholder="Temperatura" id="TEMPERATURA" name="TEMPERATURA" value="<?php echo $TEMPERATURA; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLEDSTYLE; ?> />
                                                <label id="val_t" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <?php if ($STOCKESTANDAR == "1") { ?>
                                            <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>Stock</label>
                                                    <input type="hidden" id="STOCKE" name="STOCKE" value="<?php echo $STOCK; ?>" />
                                                    <input type="text" class="form-control" placeholder="Stock" id="STOCK" name="STOCK" value="<?php echo $STOCK; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLEDSTYLE; ?> />
                                                    <label id="val_stock" class="validacion"> </label>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        
                                        <?php if ($CATEGORIAESTANDAR == "1") { ?>
                                            <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>Tipo Categoria</label>
                                                    <input type="hidden" id="TCATEGORIAE" name="TCATEGORIAE" value="<?php echo $TCATEGORIA; ?>" />                                                   
                                                    <select class="form-control select2" id="TCATEGORIA" name="TCATEGORIA" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYTCATEGORIA as $r) : ?>
                                                            <?php if ($ARRAYTCATEGORIA) {    ?>
                                                                <option value="<?php echo $r['ID_TCATEGORIA']; ?>" <?php if ($TCATEGORIA == $r['ID_TCATEGORIA']) { echo "selected";   } ?>> 
                                                                    <?php echo $r['NOMBRE_TCATEGORIA'];  ?>
                                                                </option>
                                                            <?php } else { ?>
                                                                <option>No Hay Datos Registrados</option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_tcategoria" class="validacion"> </label>
                                                </div>
                                            </div>
                                        <?php } ?>                                        
                                        <?php if ($COLORESTANDAR == "1") { ?>
                                            <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>Color</label>
                                                    <input type="hidden" id="TCOLORE" name="TCOLORE" value="<?php echo $TCOLOR; ?>" />                                  
                                                    <select class="form-control select2" id="TCOLOR" name="TCOLOR" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYTCOLOR as $r) : ?>
                                                            <?php if ($ARRAYTCOLOR) {    ?>
                                                                <option value="<?php echo $r['ID_TCOLOR']; ?>" <?php if ($TCOLOR == $r['ID_TCOLOR']) { echo "selected";   } ?>> 
                                                                    <?php echo $r['NOMBRE_TCOLOR'];  ?>
                                                                </option>
                                                            <?php } else { ?>
                                                                <option>No Hay Datos Registrados</option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>                                                   
                                                    <label id="val_tcolor" class="validacion"> </label>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Nota</label>
                                                <textarea class="form-control" rows="1" placeholder="Ingrese Nota, Observaciones u Otro" id="NOTADRECEPCION" name="NOTADRECEPCION" <?php echo $DISABLED; ?> <?php echo $DISABLEDSTYLE; ?>><?php echo $NOTADRECEPCION; ?></textarea>
                                                <label id="val_nota" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <label id=" val_mensaje" class="validacion"><?php echo $MENSAJEELIMINAR; ?> </label>
                                    <!-- /.row -->
                                    <!-- /.box-body -->
                                    
                                    <div class="box-footer">
                                        <div class="btn-group btn-block  col-xxl-4 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12 " role="group" aria-label="Acciones generales">
                                            <button type="button" class="btn  btn-success  " data-toggle="tooltip" title="Volver" name="CANCELAR" value="CANCELAR" Onclick="irPagina('<?php echo $URLO; ?>.php?op&id=<?php echo $id_dato; ?>&a=<?php echo $accion_dato; ?>&urlo=<?php echo $urlo_dato; ?>');">
                                                <i class="ti-back-left "></i> Volver
                                            </button>
                                            <?php if ($OP == "") { ?>
                                                <button type="submit" class="btn btn-primary " data-toggle="tooltip" title="Guardar" name="CREAR" value="CREAR" <?php echo $DISABLED; ?>  onclick="return validacion()">
                                                    <i class="ti-save-alt"></i> Guardar
                                                </button>
                                            <?php } ?>
                                            <?php if ($OP != "") { ?>
                                                <?php if ($OP == "crear") { ?>
                                                    <button type="submit" class="btn btn-primary " data-toggle="tooltip" title="Guardar" name="CREAR" value="CREAR" <?php echo $DISABLED; ?>  onclick="return validacion()">
                                                        <i class="ti-save-alt"></i> Guardar
                                                    </button>
                                                <?php } ?>
                                                <?php if ($OP == "editar") { ?>
                                                    <button type="submit" class="btn btn-warning   " data-toggle="tooltip" title="Guardar" name="EDITAR" value="EDITAR" <?php echo $DISABLED; ?>  onclick="return validacion()">
                                                        <i class="ti-save-alt"></i> Guardar
                                                    </button>
                                                <?php } ?>
                                                <?php if ($OP == "eliminar") { ?>
                                                    <button type="submit" class="btn btn-danger " data-toggle="tooltip" title="Eliminar" name="ELIMINAR" value="ELIMINAR">
                                                        <i class="ti-trash"></i> Eliminar
                                                    </button>
                                                <?php } ?>
                                            <?php } ?>
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
            //OPERACION DE REGISTRO DE FILA
            if (isset($_REQUEST['CREAR'])) {

                //OBTENER EL FOLIO DEL DETALLE DE EXPORTACION DEL PROCESO
                $ARRAYVERFOLIO = $FOLIO_ADO->verFolioPorEmpresaPlantaTemporadaTexportacion($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
                $FOLIO = $ARRAYVERFOLIO[0]['ID_FOLIO'];
                if (isset($_REQUEST['FOLIOMANUAL'])) {
                    $FOLIOMANUAL = $_REQUEST['FOLIOMANUAL'];
                }
                if ($FOLIOMANUAL == "on") {
                    $NUMEROFOLIODEXPORTACION = $_REQUEST['NUMEROFOLIODRECEPCION'];
                    $FOLIOMANUALR = "1";
                    $ARRAYFOLIOPOEXPO = $EXIEXPORTACION_ADO->buscarPorFolio($NUMEROFOLIODEXPORTACION);
                    if ($ARRAYFOLIOPOEXPO) {
                        $SINO = "1";
                        $MENSAJE = "El folio ingresado, ya existe.";
                    } else {
                        $SINO = "0";
                        $MENSAJE = "";
                    }
                }
                if ($FOLIOMANUAL != "on") {
                    $FOLIOMANUALR = "0";
                    $SINO = "0";
                    $ARRAYULTIMOFOLIO = $EXIEXPORTACION_ADO->obtenerFolioRecepción($FOLIO,$_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
                    if ($ARRAYULTIMOFOLIO) {
                        if ($ARRAYULTIMOFOLIO[0]['ULTIMOFOLIO'] == 0) {
                            $FOLIOEXPORTACION = $ARRAYVERFOLIO[0]['NUMERO_FOLIO'];
                        } else {
                            $FOLIOEXPORTACION = $ARRAYULTIMOFOLIO[0]['ULTIMOFOLIO'];
                        }
                    } else {
                        $FOLIOEXPORTACION = $ARRAYVERFOLIO[0]['NUMERO_FOLIO'];
                    }
                    $NUMEROFOLIODRECEPCION = $FOLIOEXPORTACION + 1;
                    $ARRAYFOLIOPOEXPO = $EXIEXPORTACION_ADO->buscarPorFolio($NUMEROFOLIODRECEPCION,$_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);

                    while (count($ARRAYFOLIOPOEXPO) == 1) {
                        $ARRAYFOLIOPOEXPO = $EXIEXPORTACION_ADO->buscarPorFolio($NUMEROFOLIODRECEPCION,$_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
                        if (count($ARRAYFOLIOPOEXPO) == 1) {
                            $NUMEROFOLIODRECEPCION += 1;
                        }
                    };
                }
                
                if ($SINO == "1") {
                    echo '<script>
                        Swal.fire({
                            icon:"warning",
                            title:"Accion restringida",
                            text:"'.$MENSAJE.'",
                            showConfirmButton: true,
                            confirmButtonText:"Cerrar",
                            closeOnConfirm:false
                        })
                    </script>';
                }
                if ($SINO == "0") {
             
                    $CANTIDADENVASERECIBIDO = $_REQUEST['CANTIDADENVASERECIBIDO'];
                    $CANTIDADENVASERECHAZADO = $_REQUEST['CANTIDADENVASERECHAZADO'];
                    $CANTIDADENVASEAPROBADO = $CANTIDADENVASERECIBIDO - $CANTIDADENVASERECHAZADO;
                    $FOLIOALIASESTACTICO = $NUMEROFOLIODRECEPCION;
                    $FOLIOALIASDIANAMICO = "EMPRESA:" . $_REQUEST['EMPRESA'] . "_PLANTA:" . $_REQUEST['PLANTA'] . "_TEMPORADA:" . $_REQUEST['TEMPORADA'] .
                        "_TIPO_FOLIO:PRODUCTO TERMINADO_RECEPCION:" . $_REQUEST['IDP'] . "_FOLIO:" . $NUMEROFOLIODRECEPCION;
    
                    if($CANTIDADENVASEAPROBADO<=0){
                        $SINO2="1";
                        $id_dato =  $_REQUEST['IDP'];
                        $accion_dato =  $_REQUEST['OPP'];
                        $_SESSION["dparametro"] =  $_REQUEST['ID'];                   
                        echo '<script>
                        Swal.fire({
                            icon:"warning",
                            title:"Accion restringida",
                            text:"La cantidad de envases aprobados debe ser mayor que zero.",
                            showConfirmButton: true,
                            confirmButtonText:"Cerrar",
                            closeOnConfirm:false
                                }).then((result)=>{
                                    location.href ="registroDrecepcionpt.php?op&id='.$id_dato.'&a='.$accion_dato.'&urlo='.$urlo_dato.'&idd='.$idd_dato.'&ad='.$acciond_dato.'";                       
                                })
                            </script>';                    
                    }else{
                        $SINO2="0"; 
                    }                    
                    if($SINO2=="0"){        
                        $ARRAYVERESTANDAR = $EEXPORTACION_ADO->verEstandar($_REQUEST['ESTANDAR']);
                        if ($ARRAYVERESTANDAR) {
                            $PESONETOEESTANDAR = $ARRAYVERESTANDAR[0]['PESO_NETO_ESTANDAR'];
                            $PESOENVASEESTANDAR = $ARRAYVERESTANDAR[0]['PESO_ENVASE_ESTANDAR'];
                            $EMBOLSADO = $ARRAYVERESTANDAR[0]['EMBOLSADO'];
                            $TEMBALAJE = $ARRAYVERESTANDAR[0]['ID_TEMBALAJE'];
                            $PESOPALLETEESTANDAR = $ARRAYVERESTANDAR[0]['PESO_PALLET_ESTANDAR'];
                            $PDESHIDRATACIONEESTANDAR = $ARRAYVERESTANDAR[0]['PDESHIDRATACION_ESTANDAR'];
                            $KILOSNETODRECEPCION = $CANTIDADENVASEAPROBADO * $PESONETOEESTANDAR;
                            $KILOSDESHIDRATACION = $KILOSNETODRECEPCION * (1 + ($PDESHIDRATACIONEESTANDAR / 100));
                            $KILOSBRUTORECEPCION = (($CANTIDADENVASEAPROBADO * $PESOENVASEESTANDAR) + $KILOSDESHIDRATACION) + $PESOPALLETEESTANDAR;
                        }
        

                        $DRECEPCIONPT->__SET('FOLIO_DRECEPCION', $NUMEROFOLIODRECEPCION);
                        $DRECEPCIONPT->__SET('FOLIO_MANUAL', $FOLIOMANUALR);
                        $DRECEPCIONPT->__SET('FECHA_EMBALADO_DRECEPCION', $_REQUEST['FECHAEMBALADORECEPCION']);
                        $DRECEPCIONPT->__SET('CANTIDAD_ENVASE_RECIBIDO_DRECEPCION', $_REQUEST['CANTIDADENVASERECIBIDO']);
                        $DRECEPCIONPT->__SET('CANTIDAD_ENVASE_RECHAZADO_DRECEPCION', $_REQUEST['CANTIDADENVASERECHAZADO']);
                        $DRECEPCIONPT->__SET('CANTIDAD_ENVASE_APROBADO_DRECEPCION', $CANTIDADENVASEAPROBADO);
                        $DRECEPCIONPT->__SET('KILOS_NETO_REAL_DRECEPCION', $_REQUEST['KILOSNETOREAL']);

                        $DRECEPCIONPT->__SET('KILOS_NETO_DRECEPCION', $KILOSNETODRECEPCION);
                        $DRECEPCIONPT->__SET('KILOS_BRUTO_DRECEPCION', $KILOSBRUTORECEPCION);
                        $DRECEPCIONPT->__SET('PDESHIDRATACION_DRECEPCION', $PDESHIDRATACIONEESTANDAR);
                        $DRECEPCIONPT->__SET('KILOS_DESHIDRATACION_DRECEPCION', $KILOSDESHIDRATACION);

                        $DRECEPCIONPT->__SET('EMBOLSADO_DRECEPCION', $_REQUEST['EMBOLSADO']);
                        $DRECEPCIONPT->__SET('TEMPERATURA_DRECEPCION', $_REQUEST['TEMPERATURA']);
                        if($_REQUEST['STOCKESTANDAR']==1){
                            $DRECEPCIONPT->__SET('STOCK_DRECEPCION', $_REQUEST['STOCK']);
                        }
                        if($_REQUEST['CATEGORIAESTANDAR']==1){
                            $DRECEPCIONPT->__SET('ID_TCATEGORIA', $_REQUEST['TCATEGORIA']);
                        }
                        if($_REQUEST['COLORESTANDAR']==1){
                            $DRECEPCIONPT->__SET('ID_TCOLOR', $_REQUEST['TCOLOR']);
                        }                    
                        $DRECEPCIONPT->__SET('GASIFICADO_DRECEPCION', $_REQUEST['GASIFICADORECEPCION']);
                        $DRECEPCIONPT->__SET('PREFRIO_DRECEPCION', $_REQUEST['PREFRIO']);
                        $DRECEPCIONPT->__SET('NOTA_DRECEPCION', $_REQUEST['NOTADRECEPCION']);
                        $DRECEPCIONPT->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
                        $DRECEPCIONPT->__SET('ID_VESPECIES',  $_REQUEST['VESPECIES']);
                        $DRECEPCIONPT->__SET('ID_ESTANDAR', $_REQUEST['ESTANDAR']);
                        $DRECEPCIONPT->__SET('ID_FOLIO', $FOLIO);
                        $DRECEPCIONPT->__SET('ID_TEMBALAJE', $_REQUEST['TEMBALAJE']);
                        $DRECEPCIONPT->__SET('ID_TMANEJO', $_REQUEST['TMANEJO']);
                        $DRECEPCIONPT->__SET('ID_TCALIBRE', $_REQUEST['TCALIBRE']);
                        $DRECEPCIONPT->__SET('ID_RECEPCION', $_REQUEST['IDP']);
                        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                        $DRECEPCIONPT_ADO->agregarDrecepcion($DRECEPCIONPT);

                        $AUSUARIO_ADO->agregarAusuario2("NULL",1, 1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Detalle de recepcion Producto Terminado","fruta_drecepcionpt","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],$_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );

                        $EXIEXPORTACION->__SET('FOLIO_EXIEXPORTACION', $NUMEROFOLIODRECEPCION);
                        $EXIEXPORTACION->__SET('FOLIO_AUXILIAR_EXIEXPORTACION', $NUMEROFOLIODRECEPCION);
                        $EXIEXPORTACION->__SET('FOLIO_MANUAL', $FOLIOMANUALR);
                        $EXIEXPORTACION->__SET('FECHA_EMBALADO_EXIEXPORTACION', $_REQUEST['FECHAEMBALADORECEPCION']);
                        $EXIEXPORTACION->__SET('CANTIDAD_ENVASE_EXIEXPORTACION', $CANTIDADENVASEAPROBADO);

                        $EXIEXPORTACION->__SET('KILOS_NETO_EXIEXPORTACION', $KILOSNETODRECEPCION);
                        $EXIEXPORTACION->__SET('KILOS_BRUTO_EXIEXPORTACION', $KILOSBRUTORECEPCION);
                        $EXIEXPORTACION->__SET('PDESHIDRATACION_EXIEXPORTACION', $PDESHIDRATACIONEESTANDAR);
                        $EXIEXPORTACION->__SET('KILOS_DESHIRATACION_EXIEXPORTACION', $KILOSDESHIDRATACION);

                        $EXIEXPORTACION->__SET('OBSERVACION_EXIESPORTACION', $_REQUEST['NOTADRECEPCION']);
                        $EXIEXPORTACION->__SET('ALIAS_DINAMICO_FOLIO_EXIESPORTACION', $FOLIOALIASDIANAMICO);
                        $EXIEXPORTACION->__SET('ALIAS_ESTATICO_FOLIO_EXIESPORTACION', $FOLIOALIASESTACTICO);
                        $EXIEXPORTACION->__SET('FECHA_RECEPCION', $_REQUEST['FECHARECEPCION']);
                        if($_REQUEST['STOCKESTANDAR']==1){
                            $EXIEXPORTACION->__SET('STOCK', $_REQUEST['STOCK']);
                        }
                        if($_REQUEST['CATEGORIAESTANDAR']==1){
                            $EXIEXPORTACION->__SET('ID_TCATEGORIA', $_REQUEST['TCATEGORIA']);
                        }
                        if($_REQUEST['COLORESTANDAR']==1){
                            $EXIEXPORTACION->__SET('ID_TCOLOR', $_REQUEST['TCOLOR']);
                        }  
                        $EXIEXPORTACION->__SET('EMBOLSADO', $_REQUEST['EMBOLSADO']);
                        $EXIEXPORTACION->__SET('GASIFICADO', $_REQUEST['GASIFICADORECEPCION']);
                        $EXIEXPORTACION->__SET('PREFRIO', $_REQUEST['PREFRIO']);
                        $EXIEXPORTACION->__SET('ID_TCALIBRE', $_REQUEST['TCALIBRE']);
                        $EXIEXPORTACION->__SET('ID_TEMBALAJE', $_REQUEST['TEMBALAJE']);
                        $EXIEXPORTACION->__SET('ID_TMANEJO', $_REQUEST['TMANEJO']);
                        $EXIEXPORTACION->__SET('ID_FOLIO',  $FOLIO);
                        $EXIEXPORTACION->__SET('ID_ESTANDAR', $_REQUEST['ESTANDAR']);
                        $EXIEXPORTACION->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
                        $EXIEXPORTACION->__SET('ID_VESPECIES', $_REQUEST['VESPECIES']);
                        $EXIEXPORTACION->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                        $EXIEXPORTACION->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
                        $EXIEXPORTACION->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
                        $EXIEXPORTACION->__SET('ID_RECEPCION', $_REQUEST['IDP']);   
                        if ($_REQUEST['TRECEPCION'] == 1) {
                            $EXIEXPORTACION->__SET('ID_PLANTA2', $_REQUEST['PLANTA']);
                        }
                        if ($_REQUEST['TRECEPCION'] == 2) {
                            $EXIEXPORTACION->__SET('ID_PLANTA2', $_REQUEST['PLANTA2']);
                        }
                        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                        $EXIEXPORTACION_ADO->agregarExiexportacionRecepcion($EXIEXPORTACION);

                        $AUSUARIO_ADO->agregarAusuario2("NULL",1, 1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Existencia de Producto Terminado","fruta_exiexportacion","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],$_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );
                        
                        //REDIRECCIONAR A PAGINA registroRecepcionmp.php
                        $id_dato =  $_REQUEST['IDP'];
                        $accion_dato =  $_REQUEST['OPP'];
                        echo '<script>
                            Swal.fire({
                                icon:"success",
                                title:"Registro creado",
                                text:"El registro de detalle de recepción se ha creado correctamente",
                                showConfirmButton:true,
                                confirmButtonText:"Volver a recepcion"
                            }).then((result)=>{
                                location.href ="' . $_REQUEST['URLO'] . '.php?op&id='.$id_dato.'&a='.$accion_dato.'&urlo='.$urlo_dato.'&idd='.$idd_dato.'&ad='.$acciond_dato.'";                            
                            })
                        </script>';   
                        // echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLO'] . ".php?op';</script>";
                    }
                }
            }
            if (isset($_REQUEST['EDITAR'])) {
                $CANTIDADENVASERECIBIDO = $_REQUEST['CANTIDADENVASERECIBIDO'];
                $CANTIDADENVASERECHAZADO = $_REQUEST['CANTIDADENVASERECHAZADO'];
               
                $CANTIDADENVASEAPROBADO = $CANTIDADENVASERECIBIDO - $CANTIDADENVASERECHAZADO;
           
                if($CANTIDADENVASEAPROBADO<=0){
                    $SINO="1";  
                    $id_dato =  $_REQUEST['IDP'];
                    $accion_dato =  $_REQUEST['OPP'];
                    $_SESSION["dparametro"] =  $_REQUEST['ID'];                   
                    echo '<script>
                    Swal.fire({
                        icon:"warning",
                        title:"Accion restringida",
                        text:"La cantidad de envases aprobados debe ser mayor que zero. ",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                            }).then((result)=>{
                               // location.href ="registroDrecepcionpt.php?op&id='.$id_dato.'&a='.$accion_dato.'&urlo='.$urlo_dato.'&idd='.$idd_dato.'&ad='.$acciond_dato.'";                       
                            })
                        </script>';                    
                }else{
                    $SINO="0";   
                }
                if($SINO=="0"){      
                    $ARRAYVERESTANDAR = $EEXPORTACION_ADO->verEstandar($_REQUEST['ESTANDAR']);
                    if ($ARRAYVERESTANDAR) {
                        $PESONETOEESTANDAR = $ARRAYVERESTANDAR[0]['PESO_NETO_ESTANDAR'];
                        $PESOENVASEESTANDAR = $ARRAYVERESTANDAR[0]['PESO_ENVASE_ESTANDAR'];
                        $EMBOLSADO = $ARRAYVERESTANDAR[0]['EMBOLSADO'];
                        $TEMBALAJE = $ARRAYVERESTANDAR[0]['ID_TEMBALAJE'];
                        $PESOPALLETEESTANDAR = $ARRAYVERESTANDAR[0]['PESO_PALLET_ESTANDAR'];
                        $PDESHIDRATACIONEESTANDAR = $ARRAYVERESTANDAR[0]['PDESHIDRATACION_ESTANDAR'];
                        $KILOSNETODRECEPCION = $CANTIDADENVASEAPROBADO * $PESONETOEESTANDAR;
                        $KILOSDESHIDRATACION = $KILOSNETODRECEPCION * (1 + ($PDESHIDRATACIONEESTANDAR / 100));
                        $KILOSBRUTORECEPCION = (($CANTIDADENVASEAPROBADO * $PESOENVASEESTANDAR) + $KILOSDESHIDRATACION) + $PESOPALLETEESTANDAR;
                    }

                    $DRECEPCIONPT->__SET('FECHA_EMBALADO_DRECEPCION', $_REQUEST['FECHAEMBALADORECEPCION']);
                    $DRECEPCIONPT->__SET('CANTIDAD_ENVASE_RECIBIDO_DRECEPCION', $_REQUEST['CANTIDADENVASERECIBIDO']);
                    $DRECEPCIONPT->__SET('CANTIDAD_ENVASE_RECHAZADO_DRECEPCION', $_REQUEST['CANTIDADENVASERECHAZADO']);
                    $DRECEPCIONPT->__SET('CANTIDAD_ENVASE_APROBADO_DRECEPCION', $CANTIDADENVASEAPROBADO);
                    $DRECEPCIONPT->__SET('KILOS_NETO_REAL_DRECEPCION', $_REQUEST['KILOSNETOREAL']);

                    $DRECEPCIONPT->__SET('KILOS_NETO_DRECEPCION', $KILOSNETODRECEPCION);
                    $DRECEPCIONPT->__SET('KILOS_BRUTO_DRECEPCION', $KILOSBRUTORECEPCION);
                    $DRECEPCIONPT->__SET('PDESHIDRATACION_DRECEPCION', $PDESHIDRATACIONEESTANDAR);
                    $DRECEPCIONPT->__SET('KILOS_DESHIDRATACION_DRECEPCION', $KILOSDESHIDRATACION);

                    $DRECEPCIONPT->__SET('EMBOLSADO_DRECEPCION', $_REQUEST['EMBOLSADO']);
                    $DRECEPCIONPT->__SET('TEMPERATURA_DRECEPCION', $_REQUEST['TEMPERATURA']);
                    if($_REQUEST['STOCKESTANDAR']==1){
                        $DRECEPCIONPT->__SET('STOCK_DRECEPCION', $_REQUEST['STOCK']);
                    }
                    if($_REQUEST['CATEGORIAESTANDAR']==1){
                        $DRECEPCIONPT->__SET('ID_TCATEGORIA', $_REQUEST['TCATEGORIA']);
                    }
                    if($_REQUEST['COLORESTANDAR']==1){
                        $DRECEPCIONPT->__SET('ID_TCOLOR', $_REQUEST['TCOLOR']);
                    }
                    
                    $DRECEPCIONPT->__SET('GASIFICADO_DRECEPCION', $_REQUEST['GASIFICADORECEPCION']);
                    $DRECEPCIONPT->__SET('PREFRIO_DRECEPCION', $_REQUEST['PREFRIO']);
                    $DRECEPCIONPT->__SET('NOTA_DRECEPCION', $_REQUEST['NOTADRECEPCION']);
                    $DRECEPCIONPT->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
                    $DRECEPCIONPT->__SET('ID_VESPECIES',  $_REQUEST['VESPECIES']);
                    $DRECEPCIONPT->__SET('ID_ESTANDAR', $_REQUEST['ESTANDAR']);
                    $DRECEPCIONPT->__SET('ID_TEMBALAJE', $_REQUEST['TEMBALAJE']);
                    $DRECEPCIONPT->__SET('ID_TMANEJO', $_REQUEST['TMANEJO']);
                    $DRECEPCIONPT->__SET('ID_TCALIBRE', $_REQUEST['TCALIBRE']);
                    $DRECEPCIONPT->__SET('ID_RECEPCION', $_REQUEST['IDP']);
                    $DRECEPCIONPT->__SET('ID_DRECEPCION', $_REQUEST['ID']);
                    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                    $DRECEPCIONPT_ADO->actualizarDrecepcion($DRECEPCIONPT);

                    $AUSUARIO_ADO->agregarAusuario2("NULL",1,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de detalle de Recepción Producto Terminado.","fruta_drecepcionpt", $_REQUEST['ID'] ,$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

                    $ARRAYVERFOLIOEXISTENCIA = $EXIEXPORTACION_ADO->buscarPorRecepcionNumeroFolio($_REQUEST['IDP'], $_REQUEST['NUMEROFOLIODRECEPCIONE']);

                    if ($ARRAYVERFOLIOEXISTENCIA) {
                        $EXIEXPORTACION->__SET('FECHA_EMBALADO_EXIEXPORTACION', $_REQUEST['FECHAEMBALADORECEPCION']);
                        $EXIEXPORTACION->__SET('CANTIDAD_ENVASE_EXIEXPORTACION', $CANTIDADENVASEAPROBADO);

                        $EXIEXPORTACION->__SET('KILOS_NETO_EXIEXPORTACION', $KILOSNETODRECEPCION);
                        $EXIEXPORTACION->__SET('KILOS_BRUTO_EXIEXPORTACION', $KILOSBRUTORECEPCION);
                        $EXIEXPORTACION->__SET('PDESHIDRATACION_EXIEXPORTACION', $PDESHIDRATACIONEESTANDAR);
                        $EXIEXPORTACION->__SET('KILOS_DESHIRATACION_EXIEXPORTACION', $KILOSDESHIDRATACION);

                        $EXIEXPORTACION->__SET('OBSERVACION_EXIESPORTACION', $_REQUEST['NOTADRECEPCION']);
                        $EXIEXPORTACION->__SET('FECHA_RECEPCION', $_REQUEST['FECHARECEPCION']);
                        if($_REQUEST['STOCKESTANDAR']==1){
                            $EXIEXPORTACION->__SET('STOCK', $_REQUEST['STOCK']);
                        }
                        if($_REQUEST['CATEGORIAESTANDAR']==1){  
                            $EXIEXPORTACION->__SET('ID_TCATEGORIA', $_REQUEST['TCATEGORIA']);
                        }
                        if($_REQUEST['COLORESTANDAR']==1){
                            $EXIEXPORTACION->__SET('ID_TCOLOR', $_REQUEST['TCOLOR']);
                        }
                        $EXIEXPORTACION->__SET('EMBOLSADO', $_REQUEST['EMBOLSADO']);
                        $EXIEXPORTACION->__SET('GASIFICADO', $_REQUEST['GASIFICADORECEPCION']);
                        $EXIEXPORTACION->__SET('PREFRIO', $_REQUEST['PREFRIO']);
                        $EXIEXPORTACION->__SET('ID_TCALIBRE', $_REQUEST['TCALIBRE']);
                        $EXIEXPORTACION->__SET('ID_TEMBALAJE', $_REQUEST['TEMBALAJE']);
                        $EXIEXPORTACION->__SET('ID_TMANEJO', $_REQUEST['TMANEJO']);
                        $EXIEXPORTACION->__SET('ID_ESTANDAR', $_REQUEST['ESTANDAR']);
                        $EXIEXPORTACION->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
                        $EXIEXPORTACION->__SET('ID_VESPECIES', $_REQUEST['VESPECIES']);
                        $EXIEXPORTACION->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                        $EXIEXPORTACION->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
                        $EXIEXPORTACION->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
                        $EXIEXPORTACION->__SET('ID_RECEPCION', $_REQUEST['IDP']);
                        $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $ARRAYVERFOLIOEXISTENCIA[0]["ID_EXIEXPORTACION"]);
                        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                        $EXIEXPORTACION_ADO->actualizarExiexportacionRecepcion($EXIEXPORTACION);

                        $AUSUARIO_ADO->agregarAusuario2("NULL",1, 2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de Existencia de Producto Terminado","fruta_exiexportacion",$ARRAYVERFOLIOEXISTENCIA[0]["ID_EXIEXPORTACION"],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],$_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );
                    } else {
                        $NUMEROFOLIODRECEPCION = $_REQUEST["NUMEROFOLIODRECEPCIONE"];
                        $FOLIOALIASESTACTICO = $NUMEROFOLIODRECEPCION;
                        $FOLIOALIASDIANAMICO = "EMPRESA:" . $_REQUEST['EMPRESA'] . "_PLANTA:" . $_REQUEST['PLANTA'] . "_TEMPORADA:" . $_REQUEST['TEMPORADA'] .
                            "_TIPO_FOLIO:MATERIA PRIMA_RECEPCION:" . $_REQUEST['IDP'] . "_FOLIO:" . $NUMEROFOLIODRECEPCION;
                        if ($_REQUEST["FOLIOMANUALE"] != "on") {
                            $FOLIOMANUALR = "0";
                        }
                        if ($_REQUEST["FOLIOMANUALE"] == "on") {
                            $FOLIOMANUALR = "1";
                        }
                        $EXIEXPORTACION->__SET('FOLIO_EXIEXPORTACION', $NUMEROFOLIODRECEPCION);
                        $EXIEXPORTACION->__SET('FOLIO_AUXILIAR_EXIEXPORTACION', $NUMEROFOLIODRECEPCION);
                        $EXIEXPORTACION->__SET('FOLIO_MANUAL', $FOLIOMANUALR);
                        $EXIEXPORTACION->__SET('FECHA_EMBALADO_EXIEXPORTACION', $_REQUEST['FECHAEMBALADORECEPCION']);
                        $EXIEXPORTACION->__SET('CANTIDAD_ENVASE_EXIEXPORTACION', $CANTIDADENVASEAPROBADO);

                        $EXIEXPORTACION->__SET('KILOS_NETO_EXIEXPORTACION', $KILOSNETODRECEPCION);
                        $EXIEXPORTACION->__SET('KILOS_BRUTO_EXIEXPORTACION', $KILOSBRUTORECEPCION);
                        $EXIEXPORTACION->__SET('PDESHIDRATACION_EXIEXPORTACION', $PDESHIDRATACIONEESTANDAR);
                        $EXIEXPORTACION->__SET('KILOS_DESHIRATACION_EXIEXPORTACION', $KILOSDESHIDRATACION);

                        $EXIEXPORTACION->__SET('OBSERVACION_EXIESPORTACION', $_REQUEST['NOTADRECEPCION']);
                        $EXIEXPORTACION->__SET('ALIAS_DINAMICO_FOLIO_EXIESPORTACION', $FOLIOALIASDIANAMICO);
                        $EXIEXPORTACION->__SET('ALIAS_ESTATICO_FOLIO_EXIESPORTACION', $FOLIOALIASESTACTICO);
                        $EXIEXPORTACION->__SET('FECHA_RECEPCION', $_REQUEST['FECHARECEPCION']);
                        if($_REQUEST['STOCKESTANDAR']==1){
                            $EXIEXPORTACION->__SET('STOCK', $_REQUEST['STOCK']);
                        }
                        if($_REQUEST['CATEGORIAESTANDAR']==1){
                            $EXIEXPORTACION->__SET('ID_TCATEGORIA', $_REQUEST['TCATEGORIA']);
                        }
                        if($_REQUEST['COLORESTANDAR']==1){
                            $EXIEXPORTACION->__SET('ID_TCOLOR', $_REQUEST['TCOLOR']);
                        }
                        $EXIEXPORTACION->__SET('EMBOLSADO', $_REQUEST['EMBOLSADO']);
                        $EXIEXPORTACION->__SET('GASIFICADO', $_REQUEST['GASIFICADORECEPCION']);
                        $EXIEXPORTACION->__SET('PREFRIO', $_REQUEST['PREFRIO']);
                        $EXIEXPORTACION->__SET('ID_TCALIBRE', $_REQUEST['TCALIBRE']);
                        $EXIEXPORTACION->__SET('ID_TEMBALAJE', $_REQUEST['TEMBALAJE']);
                        $EXIEXPORTACION->__SET('ID_TMANEJO', $_REQUEST['TMANEJO']);
                        $EXIEXPORTACION->__SET('ID_FOLIO',   $_REQUEST['FOLIO']);
                        $EXIEXPORTACION->__SET('ID_ESTANDAR', $_REQUEST['ESTANDAR']);
                        $EXIEXPORTACION->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
                        $EXIEXPORTACION->__SET('ID_VESPECIES', $_REQUEST['VESPECIES']);
                        $EXIEXPORTACION->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                        $EXIEXPORTACION->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
                        $EXIEXPORTACION->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
                        $EXIEXPORTACION->__SET('ID_RECEPCION', $_REQUEST['IDP']);
                        if ($_REQUEST['TRECEPCION'] == 1) {
                            $EXIEXPORTACION->__SET('ID_PLANTA2', $_REQUEST['PLANTA']);
                        }
                        if ($_REQUEST['TRECEPCION'] == 2) {
                            $EXIEXPORTACION->__SET('ID_PLANTA2', $_REQUEST['PLANTA2']);
                        }
                        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                        $EXIEXPORTACION_ADO->agregarExiexportacionRecepcion($EXIEXPORTACION);

                        $AUSUARIO_ADO->agregarAusuario2("NULL",1, 1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Existencia de Producto Terminado","fruta_exiexportacion","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],$_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );
                    }

                    //REDIRECCIONAR A PAGINA registroRecepcionmp.php
                    $id_dato =  $_REQUEST['IDP'];
                    $accion_dato =  $_REQUEST['OPP'];                    
                    echo '<script>
                        Swal.fire({
                            icon:"info",
                            title:"Registro Modificado",
                            text:"El registro del detalle de recepcion se ha modificada correctamente",
                            showConfirmButton:true,
                            confirmButtonText:"Volver a recepcion"
                        }).then((result)=>{
                            location.href ="' . $_REQUEST['URLO'] . '.php?op&id='.$id_dato.'&a='.$accion_dato.'&urlo='.$urlo_dato.'&idd='.$idd_dato.'&ad='.$acciond_dato.'";                        
                        })
                    </script>';   
                }             
            }
            if (isset($_REQUEST['ELIMINAR'])) {
                $FOLIOELIMINAR = $_REQUEST['NUMEROFOLIODRECEPCIONE'];
                $DRECEPCIONPT->__SET('ID_DRECEPCION', $_REQUEST['ID']);
                $DRECEPCIONPT_ADO->deshabilitar($DRECEPCIONPT);

                $AUSUARIO_ADO->agregarAusuario2("NULL",1,4,"".$_SESSION["NOMBRE_USUARIO"].", Deshabilitar  detalle de recepcion producto terminado.","fruta_drecepcionpt", $_REQUEST['ID'] ,$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

                $EXIEXPORTACION->__SET('FOLIO_AUXILIAR_EXIEXPORTACION', $FOLIOELIMINAR);
                $EXIEXPORTACION->__SET('ID_RECEPCION', $_REQUEST['IDP']);
                $EXIEXPORTACION_ADO->deshabilitarRecepcion($EXIEXPORTACION);

                $EXIEXPORTACION->__SET('FOLIO_AUXILIAR_EXIEXPORTACION', $FOLIOELIMINAR);
                $EXIEXPORTACION->__SET('ID_RECEPCION', $_REQUEST['IDP']);
                $EXIEXPORTACION_ADO->eliminadoRecepcion($EXIEXPORTACION);


                $AUSUARIO_ADO->agregarAusuario2("NULL",1,4,"".$_SESSION["NOMBRE_USUARIO"].", Deshabilitar  Existencia de Producto Terminado.","fruta_exiexportacion", "NULL" ,$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

                $id_dato =  $_REQUEST['IDP'];
                $accion_dato =  $_REQUEST['OPP'];
                echo '<script>
                        Swal.fire({
                            icon:"error",
                            title:"Registro Eliminado",
                            text:"El registro del detalle recepcion se ha eliminado correctamente ",
                            showConfirmButton:true,
                            confirmButtonText:"Volver a recepcion"
                        }).then((result)=>{
                            location.href ="' . $_REQUEST['URLO'] . '.php?op&id='.$id_dato.'&a='.$accion_dato.'&urlo='.$urlo_dato.'&idd='.$idd_dato.'&ad='.$acciond_dato.'";                        
                        })
                    </script>';
            }
        ?>
</body>

</html>