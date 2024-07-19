<?php

use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Round;

include_once "../../assest/config/validarUsuarioFruta.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/FOLIO_ADO.php';
include_once '../../assest/controlador/TDOCUMENTO_ADO.php';
include_once '../../assest/controlador/BODEGA_ADO.php';

include_once '../../assest/controlador/ERECEPCION_ADO.php';
include_once '../../assest/controlador/VESPECIES_ADO.php';
include_once '../../assest/controlador/TRANSPORTE_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/CONDUCTOR_ADO.php';
include_once '../../assest/controlador/TMANEJO_ADO.php';
include_once '../../assest/controlador/TTRATAMIENTO1_ADO.php';
include_once '../../assest/controlador/TTRATAMIENTO2_ADO.php';

include_once '../../assest/controlador/RECEPCIONMP_ADO.php';
include_once '../../assest/controlador/DRECEPCIONMP_ADO.php';
include_once '../../assest/controlador/EXIMATERIAPRIMA_ADO.php';

include_once '../../assest/controlador/RECEPCIONE_ADO.php';
include_once '../../assest/controlador/INVENTARIOE_ADO.php';

include_once '../../assest/modelo/RECEPCIONMP.php';
include_once '../../assest/modelo/DRECEPCIONMP.php';
include_once '../../assest/modelo/EXIMATERIAPRIMA.php';

include_once '../../assest/modelo/RECEPCIONE.php';
include_once '../../assest/modelo/INVENTARIOE.php';



//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$FOLIO_ADO = new FOLIO_ADO();
$TDOCUMENTO_ADO = new TDOCUMENTO_ADO();
$BODEGA_ADO = new BODEGA_ADO();


$ERECEPCION_ADO = new ERECEPCION_ADO();
$TRANSPORTE_ADO =  new TRANSPORTE_ADO();
$CONDUCTOR_ADO =  new CONDUCTOR_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$PRODUCTOR_ADO = new PRODUCTOR_ADO();
$TMANEJO_ADO = new TMANEJO_ADO();
$TTRATAMIENTO1_ADO =  new TTRATAMIENTO1_ADO();
$TTRATAMIENTO2_ADO =  new TTRATAMIENTO2_ADO();


$EXIMATERIAPRIMA_ADO = new EXIMATERIAPRIMA_ADO();
$RECEPCIONMP_ADO =  new RECEPCIONMP_ADO();
$DRECEPCIONMP_ADO =  new DRECEPCIONMP_ADO();

$RECEPCIONE_ADO =  new RECEPCIONE_ADO();
$INVENTARIOE_ADO =  new INVENTARIOE_ADO();

//INIICIALIZAR MODELO
$DRECEPCIONMP =  new DRECEPCIONMP();
$RECEPCIONMP =  new RECEPCIONMP();
$EXIMATERIAPRIMA =  new EXIMATERIAPRIMA();

$RECEPCIONE =  new RECEPCIONE();
$INVENTARIOE =  new INVENTARIOE();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$IDRECEPCION = "";
$NUMERO = "";
$NUMEROVER = "";
$FECHAINGRESORECEPCION = "";
$FECHAMODIFCIACIONRECEPCION = "";

$CANTIDADENVASERECEPCION = "";
$KILOSNETORECEPCION = "";
$KILOSBRUTORECEPCION = "";

$DIFERENCIAKILOS = "";
$PORCENTAJEDIFERENCIA = "";
$FECHARECEPCION = "";
$HORARECEPCION = "";
$NUMEROGUIA = "";
$FECHAGUIA = "";
$PDE = "";
$DIFERENCIALGUIA = "";
$OBSERVACION = "";
$TRECEPCION = "";
$CONDUCTOR = "";
$PATENTECAMION = "";
$PATENTECARRO = "";
$TRANSPORTE = "";
$ESTADO = "";
$PLANTA2 = "";
$PRODUCTOR = "";
$CSG = "";

$CANTIDADENVASERECEPCION2 = "";
$KILOSNETORECEPCION2 = "";
$KILOSBRUTORECEPCION2 = "";
$TOTALGUIA = "";

$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";

$CONTADOR = 0;

$IDEMPRESA = "";
$IDPLANTA = "";
$IDTEMPORADA = "";
$SINO = "";

$IDOP = "";
$OP = "";
$ID = "";

$EEXPORTACION = "";
$VESPECIES = "";
$CALIBRE = "";
$PRODUCTOR = "";
$TDOCUMENTO="";
$BODEGA="";
$FOLIOELIMINAR = "";
$TRECEPCIONE="";

$DISABLED = "";
$DISABLED2 = "";
$DISABLED3 = "";
$DISABLEDSTYLE = "";
$DISABLEDFOLIO = "";
$DISABLEENVASE="";
$MENSAJEFOLIO = "";
$MENSAJEENVASE="";



$MENSAJE = "";
$MENSAJE2 = "";
$MENSAJE3 = "";
$MENSAJEVALIDATO = "";

$FOLIONUMERO = "";

//INICIALIZAR ARREGLOS
$ARRAYRECEPCION = "";
$ARRAYRECEPCION2 = "";
$ARRAYRECEPCIONBUSCARGPETP = "";
$ARRAYDRECEPCION = "";
$ARRAYDRECEPCION2 = "";
$ARRAYTRECEPCION = "";
$ARRAYCONDUCTOR = "";
$ARRAYVERCONDUCTOR = "";

$ARRAYEMPRESA = "";
$ARRAYPLANTA = "";
$ARRAYTEMPORADA = "";

$ARRAYTRANSPORTE = "";
$ARRAYVEHICULO = "";
$ARRAYCONDUCTOR2 = "";
$ARRAYDRECEPCIONTOTALES = "";
$ARRAYDRECEPCIONTOTALES2 = "";
$ARRAYPRODUCTOR = "";
$ARRAYPVESPECIES = "";
$ARRAYEXISTENCIA = "";
$ARRAYEXISTENCIA2 = "";
$ARRAYESTANDAR = "";
$ARRAYFECHAACTUAL = "";
$ARRAYEXISENCIARECEPCION = "";
$ARRAYNUMERO = "";
$ARRAYFOLIO3 = "";
$ARRAYTMANEJO = "";
$ARRAYRECEPCIONE="";
$ARRAYINVENTARIOE="";
$ARRAYDRECEPCIONAGRUPADO="";
$ARRAYDRECEPCIONETOTALES="";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYTRANSPORTE = $TRANSPORTE_ADO->listarTransportePorEmpresaCBX($EMPRESAS);
$ARRAYCONDUCTOR = $CONDUCTOR_ADO->listarConductorPorEmpresaCBX($EMPRESAS);
$ARRAYVESPECIES = $VESPECIES_ADO->listarVespeciesPorEmpresaCBX($EMPRESAS);
$ARRAYPRODUCTOR = $PRODUCTOR_ADO->listarProductorPorEmpresaCBX($EMPRESAS);
$ARRAYTDOCUMENTO = $TDOCUMENTO_ADO->listarTdocumentoPorEmpresaCBX($EMPRESAS);
//$ARRAYBODEGA =  $BODEGA_ADO->listarBodegaPorEmpresaCBX($EMPRESAS);
$ARRAYPLANTA2 = $PLANTA_ADO->listarPlantaExternaCBX();


$ARRAYFECHAACTUAL = $RECEPCIONMP_ADO->obtenerFecha();
$FECHARECEPCION = $ARRAYFECHAACTUAL[0]['FECHA'];
$FECHAGUIA = $ARRAYFECHAACTUAL[0]['FECHA'];
$HORARECEPCION = $ARRAYFECHAACTUAL[0]['HORA'];
include_once "../../assest/config/validarDatosUrl.php";//este valida que se reciban datos en la url y continua
include_once "../../assest/config/datosUrlD.php";//estos registran el detalle


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




$ARRAYFOLIO3 = $FOLIO_ADO->verFolioPorEmpresaPlantaTemporadaTmateriaprima($EMPRESAS, $PLANTAS, $TEMPORADAS);
if (empty($ARRAYFOLIO3)) {
    $DISABLEDFOLIO = "disabled";
    $MENSAJEFOLIO = " NECESITA <b> CREAR LOS FOLIOS MP </b> , PARA OCUPAR LA <b> FUNCIONALIDAD </b>. FAVOR DE <b> CONTACTARSE CON EL ADMINISTRADOR </b>";
}  
$ARRAYBODEGAENVASES=$BODEGA_ADO->listarBodegaPorEmpresaPlantaEnvasesCBX($EMPRESAS, $PLANTAS);
if (empty($ARRAYBODEGAENVASES)) {
    $DISABLEENVASE = "disabled";
    $MENSAJEENVASE = " NECESITA <b> TEBER UNA BODEGA DE ENVASES</b> , PARA OCUPAR LA <b> FUNCIONALIDAD </b>. FAVOR DE <b> CONTACTARSE CON EL ADMINISTRADOR </b>";
}else{
    $BODEGA=$ARRAYBODEGAENVASES[0]["ID_BODEGA"];    
}
//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION , VISUALIZACION Y CREACION
if (isset($id_dato) && isset($accion_dato)) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $id_dato; //1239  //vacio
    $OP = $accion_dato; //EDITAR // vacio agregar

    //echo('ID OP ES : '.$IDOP.' - OP ES : '.$OP);


    //FUNCION PARA LA OBTENCION DE LOS TOTALES DEL DETALLE ASOCIADO A RECEPCION
    $ARRAYDRECEPCION = $DRECEPCIONMP_ADO->buscarPorRecepcion2($IDOP);
    $ARRAYDRECEPCIONTOTALES = $DRECEPCIONMP_ADO->obtenerTotales($IDOP);
    $ARRAYDRECEPCIONTOTALES2 = $DRECEPCIONMP_ADO->obtenerTotales2($IDOP);
    
    $ARRAYRECEPCIONE=$RECEPCIONE_ADO->listarRecepcionPorRecepcionMpCBX($IDOP);
    if($ARRAYRECEPCIONE){        
        $BODEGA= $ARRAYRECEPCIONE[0]['ID_BODEGA'];
        $TDOCUMENTO =$ARRAYRECEPCIONE[0]['ID_TDOCUMENTO'];
    }

    $CANTIDADENVASERECEPCION = $ARRAYDRECEPCIONTOTALES[0]['ENVASE'];
    $KILOSNETORECEPCION = $ARRAYDRECEPCIONTOTALES[0]['NETO'];
    $KILOSBRUTORECEPCION = $ARRAYDRECEPCIONTOTALES[0]['BRUTO'];

    $CANTIDADENVASERECEPCION2 = $ARRAYDRECEPCIONTOTALES2[0]['ENVASE'];
    $KILOSNETORECEPCION2 = $ARRAYDRECEPCIONTOTALES2[0]['NETO'];
    $KILOSBRUTORECEPCION2 = $ARRAYDRECEPCIONTOTALES2[0]['BRUTO'];

    //IDENTIFICACIONES DE OPERACIONES
    //crear =  OBTENCION DE DATOS INICIALES PARA PODER CREAR LA RECEPCION
    if ($OP == "crear") {

        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $DISABLED = "disabled";
        $DISABLED2 = "";
        $DISABLED3 = "disabled";
        $DISABLEDMENU = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        $ARRAYRECEPCION = $RECEPCIONMP_ADO->verRecepcion($IDOP);
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYRECEPCION as $r) :
            $IDRECEPCION = $IDOP;
            $NUMEROVER =  "" . $r['NUMERO_RECEPCION'];
            $FECHARECEPCION = "" . $r['FECHA_RECEPCION'];
            $HORARECEPCION = "" . $r['HORA_RECEPCION'];
            $FECHAINGRESORECEPCION = "" . $r['INGRESO'];
            $FECHAMODIFCIACIONRECEPCION = "" . $r['MODIFICACION'];
            $NUMEROGUIA = "" . $r['NUMERO_GUIA_RECEPCION'];
            $FECHAGUIA = "" . $r['FECHA_GUIA_RECEPCION'];
            $TOTALGUIA = "" . $r['TOTAL_KILOS_GUIA_RECEPCION'];
            $OBSERVACION = "" . $r['OBSERVACION_RECEPCION'];
            $PATENTECAMION = "" . $r['PATENTE_CAMION'];
            $PATENTECARRO = "" . $r['PATENTE_CARRO'];
            $TRECEPCION = "" . $r['TRECEPCION'];
            if ($TRECEPCION == "1") {
                $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
                $ARRAYVERIDPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
                if ($ARRAYVERIDPRODUCTOR) {
                    $CSG = $ARRAYVERIDPRODUCTOR[0]['CSG_PRODUCTOR'];
                    $PLANTA2 = "" . $r['ID_PLANTA2'];
                }
            }
            if ($TRECEPCION == "2") {
                $PLANTA2 = "" . $r['ID_PLANTA2'];
                $ARRAYVERIDPLANTA = $PLANTA_ADO->verPlanta($PLANTA2);
                if ($ARRAYVERIDPLANTA) {
                    $CSG = $ARRAYVERIDPLANTA[0]['CODIGO_SAG_PLANTA'];
                }
            }
            if ($TRECEPCION == "3") {
                $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
                $ARRAYVERIDPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
                if ($ARRAYVERIDPRODUCTOR) {
                    $CSG = $ARRAYVERIDPRODUCTOR[0]['CSG_PRODUCTOR'];
                    $PLANTA2 = "" . $r['ID_PLANTA2'];
                }
            }
            $TRANSPORTE = "" . $r['ID_TRANSPORTE'];
            $CONDUCTOR = "" . $r['ID_CONDUCTOR'];
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $ESTADO = "" . $r['ESTADO'];
            $DIFERENCIAKILOS = $KILOSBRUTORECEPCION - $TOTALGUIA;
            $PORCENTAJEDIFERENCIA =  Round((($KILOSBRUTORECEPCION * 100) / $TOTALGUIA) - 100, 2);
        endforeach;
    }

    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {

        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $DISABLED = "disabled";
        $DISABLED2 = "";
        $DISABLEDMENU = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $ARRAYRECEPCION = $RECEPCIONMP_ADO->verRecepcion($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYRECEPCION as $r) :
            $IDRECEPCION = $IDOP;
            $NUMEROVER =  "" . $r['NUMERO_RECEPCION'];
            $FECHARECEPCION = "" . $r['FECHA_RECEPCION'];
            $HORARECEPCION = "" . $r['HORA_RECEPCION'];
            $FECHAINGRESORECEPCION = "" . $r['INGRESO'];
            $FECHAMODIFCIACIONRECEPCION = "" . $r['MODIFICACION'];
            $NUMEROGUIA = "" . $r['NUMERO_GUIA_RECEPCION'];
            $FECHAGUIA = "" . $r['FECHA_GUIA_RECEPCION'];
            $TOTALGUIA = "" . $r['TOTAL_KILOS_GUIA_RECEPCION'];
            $OBSERVACION = "" . $r['OBSERVACION_RECEPCION'];
            $PATENTECAMION = "" . $r['PATENTE_CAMION'];
            $PATENTECARRO = "" . $r['PATENTE_CARRO'];
            $TRECEPCION = "" . $r['TRECEPCION'];
            if ($TRECEPCION == "1") {
                $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
                $ARRAYVERIDPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
                if ($ARRAYVERIDPRODUCTOR) {
                    $CSG = $ARRAYVERIDPRODUCTOR[0]['CSG_PRODUCTOR'];
                    $PLANTA2 = "" . $r['ID_PLANTA2'];
                }
            }
            if ($TRECEPCION == "2") {
                $PLANTA2 = "" . $r['ID_PLANTA2'];
                $ARRAYVERIDPLANTA = $PLANTA_ADO->verPlanta($PLANTA2);
                if ($ARRAYVERIDPLANTA) {
                    $CSG = $ARRAYVERIDPLANTA[0]['CODIGO_SAG_PLANTA'];
                }
            }
            if ($TRECEPCION == "3") {
                $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
                $ARRAYVERIDPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
                if ($ARRAYVERIDPRODUCTOR) {
                    $CSG = $ARRAYVERIDPRODUCTOR[0]['CSG_PRODUCTOR'];
                    $PLANTA2 = "" . $r['ID_PLANTA2'];
                }
            }
            $TRANSPORTE = "" . $r['ID_TRANSPORTE'];
            $CONDUCTOR = "" . $r['ID_CONDUCTOR'];
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $ESTADO = "" . $r['ESTADO'];
            $DIFERENCIAKILOS = $KILOSBRUTORECEPCION - $TOTALGUIA;
            $PORCENTAJEDIFERENCIA =  Round((($KILOSBRUTORECEPCION * 100) / $TOTALGUIA) - 100, 2);

        endforeach;
    }

    //ver =  OBTENCION DE DATOS PARA LA VISUALIZACION DEL REGISTRO
    if ($OP == "ver") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        $DISABLEDMENU = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYRECEPCION = $RECEPCIONMP_ADO->verRecepcion($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYRECEPCION as $r) :
            $IDRECEPCION = $IDOP;
            $NUMEROVER =  "" . $r['NUMERO_RECEPCION'];
            $FECHARECEPCION = "" . $r['FECHA_RECEPCION'];
            $HORARECEPCION = "" . $r['HORA_RECEPCION'];
            $FECHAINGRESORECEPCION = "" . $r['INGRESO'];
            $FECHAMODIFCIACIONRECEPCION = "" . $r['MODIFICACION'];
            $NUMEROGUIA = "" . $r['NUMERO_GUIA_RECEPCION'];
            $FECHAGUIA = "" . $r['FECHA_GUIA_RECEPCION'];
            $TOTALGUIA = $r['TOTAL_KILOS_GUIA_RECEPCION'];
            $OBSERVACION = "" . $r['OBSERVACION_RECEPCION'];
            $PATENTECAMION = "" . $r['PATENTE_CAMION'];
            $PATENTECARRO = "" . $r['PATENTE_CARRO'];
            $TRECEPCION = "" . $r['TRECEPCION'];
            if ($TRECEPCION == "1") {
                $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
                $ARRAYVERIDPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
                if ($ARRAYVERIDPRODUCTOR) {
                    $CSG = $ARRAYVERIDPRODUCTOR[0]['CSG_PRODUCTOR'];
                    $PLANTA2 = "" . $r['ID_PLANTA2'];
                }
            }
            if ($TRECEPCION == "2") {
                $PLANTA2 = "" . $r['ID_PLANTA2'];
                $ARRAYVERIDPLANTA = $PLANTA_ADO->verPlanta($PLANTA2);
                if ($ARRAYVERIDPLANTA) {
                    $CSG = $ARRAYVERIDPLANTA[0]['CODIGO_SAG_PLANTA'];
                }
            }
            if ($TRECEPCION == "3") {
                $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
                $ARRAYVERIDPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
                if ($ARRAYVERIDPRODUCTOR) {
                    $CSG = $ARRAYVERIDPRODUCTOR[0]['CSG_PRODUCTOR'];
                    $PLANTA2 = "" . $r['ID_PLANTA2'];
                }
            }
            $TRANSPORTE = "" . $r['ID_TRANSPORTE'];
            $CONDUCTOR = "" . $r['ID_CONDUCTOR'];
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $ESTADO = "" . $r['ESTADO'];
            $DIFERENCIAKILOS = $KILOSBRUTORECEPCION - $TOTALGUIA;
            $PORCENTAJEDIFERENCIA =  Round((($KILOSBRUTORECEPCION * 100) / $TOTALGUIA) - 100, 2);
        endforeach;
    }
}


//PROCESO PARA OBTENER LOS DATOS DEL FORMULARIO  Y MANTENERLO AL ACTUALIZACION QUE REALIZA EL SELECT DE CONDUCTOR

if (isset($_POST)) {

    if (isset($_REQUEST['FECHARECEPCION'])) {
        $FECHARECEPCION = "" . $_REQUEST['FECHARECEPCION'];
    }
    if (isset($_REQUEST['HORARECEPCION'])) {
        $HORARECEPCION = "" . $_REQUEST['HORARECEPCION'];
    }
    if (isset($_REQUEST['FECHAINGRESORECEPCION'])) {
        $FECHAINGRESORECEPCION = "" . $_REQUEST['FECHAINGRESORECEPCION'];
    }
    if (isset($_REQUEST['FECHAMODIFCIACIONRECEPCION'])) {
        $FECHAMODIFCIACIONRECEPCION = "" . $_REQUEST['FECHAMODIFCIACIONRECEPCION'];
    }
    if (isset($_REQUEST['NUMEROGUIA'])) {
        $NUMEROGUIA = "" . $_REQUEST['NUMEROGUIA'];
    }
    if (isset($_REQUEST['FECHAGUIA'])) {
        $FECHAGUIA = "" . $_REQUEST['FECHAGUIA'];
    }
    if (isset($_REQUEST['TOTALGUIA'])) {
        $TOTALGUIA = "" . $_REQUEST['TOTALGUIA'];
    }
    if (isset($_REQUEST['OBSERVACIONRECEPCION'])) {
        $OBSERVACIONRECEPCION = "" . $_REQUEST['OBSERVACIONRECEPCION'];
    }
    if (isset($_REQUEST['TRECEPCION'])) {
        $TRECEPCION = "" . $_REQUEST['TRECEPCION'];
        if ($TRECEPCION == "1") {
            if (isset($_REQUEST['PRODUCTOR'])) {
                $PRODUCTOR = "" . $_REQUEST['PRODUCTOR'];
                $PLANTA2 = "" . $_REQUEST['PLANTA2'];
                $ARRAYVERIDPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
                if ($ARRAYVERIDPRODUCTOR) {
                    $CSG = $ARRAYVERIDPRODUCTOR[0]['CSG_PRODUCTOR'];
                }
            }
        }
        if ($TRECEPCION == "2") {
            if (isset($_REQUEST['PLANTA2'])) {
                $PLANTA2 = "" . $_REQUEST['PLANTA2'];
                $ARRAYVERIDPLANTA = $PLANTA_ADO->verPlanta($PLANTA2);
                if ($ARRAYVERIDPLANTA) {
                    $CSG = $ARRAYVERIDPLANTA[0]['CODIGO_SAG_PLANTA'];
                }
            }
        }
        if ($TRECEPCION == "3") {
            if (isset($_REQUEST['PRODUCTOR'])) {
                $PRODUCTOR = "" . $_REQUEST['PRODUCTOR'];
                $PLANTA2 = "" . $_REQUEST['PLANTA2'];
                $ARRAYVERIDPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
                if ($ARRAYVERIDPRODUCTOR) {
                    $CSG = $ARRAYVERIDPRODUCTOR[0]['CSG_PRODUCTOR'];
                }
            }
        }
    }
    if (isset($_REQUEST['TRANSPORTE'])) {
        $TRANSPORTE = "" . $_REQUEST['TRANSPORTE'];
    }
    if (isset($_REQUEST['CONDUCTOR'])) {
        $CONDUCTOR = "" . $_REQUEST['CONDUCTOR'];
    }
    if (isset($_REQUEST['PATENTECAMION'])) {
        $PATENTECAMION = "" . $_REQUEST['PATENTECAMION'];
    }
    if (isset($_REQUEST['PATENTECARRO'])) {
        $PATENTECARRO = "" . $_REQUEST['PATENTECARRO'];
    }
    if (isset($_REQUEST['EMPRESA'])) {
        $EMPRESA = "" . $_REQUEST['EMPRESA'];
    }

    if (isset($_REQUEST['PLANTA'])) {
        $PLANTA = "" . $_REQUEST['PLANTA'];
    }
    if (isset($_REQUEST['TEMPORADA'])) {
        $TEMPORADA = "" . $_REQUEST['TEMPORADA'];
    }
    
    if (isset($_REQUEST['TDOCUMENTO'])) {
        $TDOCUMENTO = "" . $_REQUEST['TDOCUMENTO'];
    }
    
    if (isset($_REQUEST['BODEGA'])) {
        $BODEGA = "" . $_REQUEST['BODEGA'];
    }
}


?>




<!DOCTYPE html>
<html lang="es">
<head>
    <title>Registro Recepcion</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -->
    <?php include_once "../../assest/config/urlHead.php"; ?>
    <!- FUNCIONES BASES -!>
        <script type="text/javascript">
            //VALIDACION DE FORMULARIO            
         
            function validacion() {

                FECHARECEPCION = document.getElementById("FECHARECEPCION").value;
                HORARECEPCION = document.getElementById("HORARECEPCION").value;
                TRECEPCION = document.getElementById("TRECEPCION").selectedIndex;
                NUMEROGUIA = document.getElementById("NUMEROGUIA").value;
                FECHAGUIA = document.getElementById("FECHAGUIA").value;
                TOTALGUIA = document.getElementById("TOTALGUIA").value;
                TRANSPORTE = document.getElementById("TRANSPORTE").selectedIndex;
                CONDUCTOR = document.getElementById("CONDUCTOR").selectedIndex;
                PATENTECAMION = document.getElementById("PATENTECAMION").value;
                PATENTECARRO = document.getElementById("PATENTECARRO").value;                
                //OBSERVACION = document.getElementById("OBSERVACION").value;

                TDOCUMENTO = document.getElementById("TDOCUMENTO").selectedIndex;

                document.getElementById('val_fechar').innerHTML = "";
                document.getElementById('val_horar').innerHTML = "";
                document.getElementById('val_trecepcion').innerHTML = "";
                document.getElementById('val_numerog').innerHTML = "";
                document.getElementById('val_fechag').innerHTML = "";
                document.getElementById('val_totalg').innerHTML = "";
                document.getElementById('val_transporte').innerHTML = "";
                document.getElementById('val_conductor').innerHTML = "";
                document.getElementById('val_patentecamion').innerHTML = "";
                document.getElementById('val_patentecarro').innerHTML = "";
                //  document.getElementById('val_observacion').innerHTML = "";

                
                document.getElementById('val_tdocumento').innerHTML = "";

                if (FECHARECEPCION == null || FECHARECEPCION.length == 0 || /^\s+$/.test(FECHARECEPCION)) {
                    document.form_reg_dato.FECHARECEPCION.focus();
                    document.form_reg_dato.FECHARECEPCION.style.borderColor = "#FF0000";
                    document.getElementById('val_fechar').innerHTML = "NO A INGRESADO DATO";
                    return false
                }
                document.form_reg_dato.FECHARECEPCION.style.borderColor = "#4AF575";


                if (HORARECEPCION == null || HORARECEPCION.length == 0) {
                    document.form_reg_dato.HORARECEPCION.focus();
                    document.form_reg_dato.HORARECEPCION.style.borderColor = "#FF0000";
                    document.getElementById('val_horar').innerHTML = "NO A INGRESADO DATO";
                    return false
                }
                document.form_reg_dato.HORARECEPCION.style.borderColor = "#4AF575";



                if (TRECEPCION == null || TRECEPCION == 0) {
                    document.form_reg_dato.TRECEPCION.focus();
                    document.form_reg_dato.TRECEPCION.style.borderColor = "#FF0000";
                    document.getElementById('val_trecepcion').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                    return false
                }
                document.form_reg_dato.TRECEPCION.style.borderColor = "#4AF575";


                if (NUMEROGUIA == null || NUMEROGUIA.length == 0 || /^\s+$/.test(NUMEROGUIA)) {
                    document.form_reg_dato.NUMEROGUIA.focus();
                    document.form_reg_dato.NUMEROGUIA.style.borderColor = "#FF0000";
                    document.getElementById('val_numerog').innerHTML = "NO A INGRESADO DATO";
                    return false
                }
                document.form_reg_dato.NUMEROGUIA.style.borderColor = "#4AF575";



                if (FECHAGUIA == null || FECHAGUIA.length == 0 || /^\s+$/.test(FECHAGUIA)) {
                    document.form_reg_dato.FECHAGUIA.focus();
                    document.form_reg_dato.FECHAGUIA.style.borderColor = "#FF0000";
                    document.getElementById('val_fechag').innerHTML = "NO A INGRESADO DATO";
                    return false
                }
                document.form_reg_dato.FECHAGUIA.style.borderColor = "#4AF575";

                if (TOTALGUIA == null || TOTALGUIA == 0) {
                    document.form_reg_dato.TOTALGUIA.focus();
                    document.form_reg_dato.TOTALGUIA.style.borderColor = "#FF0000";
                    document.getElementById('val_totalg').innerHTML = "NO A INGRESADO DATO";
                    return false
                }
                document.form_reg_dato.TOTALGUIA.style.borderColor = "#4AF575";


                if (TRANSPORTE == null || TRANSPORTE == 0) {
                    document.form_reg_dato.TRANSPORTE.focus();
                    document.form_reg_dato.TRANSPORTE.style.borderColor = "#FF0000";
                    document.getElementById('val_transporte').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                    return false
                }
                document.form_reg_dato.TRANSPORTE.style.borderColor = "#4AF575";


                if (CONDUCTOR == null || CONDUCTOR == 0) {
                    document.form_reg_dato.CONDUCTOR.focus();
                    document.form_reg_dato.CONDUCTOR.style.borderColor = "#FF0000";
                    document.getElementById('val_conductor').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                    return false
                }
                document.form_reg_dato.CONDUCTOR.style.borderColor = "#4AF575";

                if (PATENTECAMION == null || PATENTECAMION == 0) {
                    document.form_reg_dato.PATENTECAMION.focus();
                    document.form_reg_dato.PATENTECAMION.style.borderColor = "#FF0000";
                    document.getElementById('val_patentecamion').innerHTML = "NO A INGRESADO DATO";
                    return false
                }
                document.form_reg_dato.PATENTECAMION.style.borderColor = "#4AF575";

                /*
                                    if (PATENTECARRO == null || PATENTECARRO == 0) {
                                        document.form_reg_dato.PATENTECARRO.focus();
                                        document.form_reg_dato.PATENTECARRO.style.borderColor = "#FF0000";
                                        document.getElementById('val_patentecarro').innerHTML = "NO A INGRESADO DATO";
                                        return false
                                    }
                                    document.form_reg_dato.PATENTECARRO.style.borderColor = "#4AF575";
                */

                if (TRECEPCION == 1) {
                    PRODUCTOR = document.getElementById("PRODUCTOR").selectedIndex;


                    document.getElementById('val_productor').innerHTML = "";

                    if (PRODUCTOR == null || PRODUCTOR == 0) {
                        document.form_reg_dato.PRODUCTOR.focus();
                        document.form_reg_dato.PRODUCTOR.style.borderColor = "#FF0000";
                        document.getElementById('val_productor').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false
                    }
                    document.form_reg_dato.PRODUCTOR.style.borderColor = "#4AF575";

                }

                if (TRECEPCION == 2) {
                    PLANTA2 = document.getElementById("PLANTA2").selectedIndex;
                    document.getElementById('val_planta2').innerHTML = "";
                    if (PLANTA2 == null || PLANTA2 == 0) {
                        document.form_reg_dato.PLANTA2.focus();
                        document.form_reg_dato.PLANTA2.style.borderColor = "#FF0000";
                        document.getElementById('val_planta2').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false
                    }
                    document.form_reg_dato.PLANTA2.style.borderColor = "#4AF575";

                }


                /*
                if (OBSERVACION == null || OBSERVACION.length == 0 || /^\s+$/.test(OBSERVACION)) {
                    document.form_reg_dato.OBSERVACION.focus();
                    document.form_reg_dato.OBSERVACION.style.borderColor = "#FF0000";
                    document.getElementById('val_observacion').innerHTML = "NO A INGRESADO DATO";
                    return false
                }
                document.form_reg_dato.OBSERVACION.style.borderColor = "#4AF575";
                */


                if (TDOCUMENTO == null || TDOCUMENTO == 0) {
                    document.form_reg_dato.TDOCUMENTO.focus();
                    document.form_reg_dato.TDOCUMENTO.style.borderColor = "#FF0000";
                    document.getElementById('val_tdocumento').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                    return false
                }
                document.form_reg_dato.TDOCUMENTO.style.borderColor = "#4AF575";
                


            }  

            //FUNCION PARA REALIZAR UNA ACTUALIZACION DEL FORMULARIO DE REGISTRO DE RECEPCIONMP
            function refrescar() {
                document.getElementById("form_reg_dato").submit();
            }

            //FUNCION PARA ABRIR VENTANA QUE SE ENCUENTRA LA OPERACIONES DE DETALLE DE RECEPCIONMP
            function abrirVentana(url) {
                var opciones =
                    "'directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=1600, height=1000'";
                window.open(url, 'window', opciones);
            }

            //REDIRECCIONAR A LA PAGINA SELECIONADA
            function irPagina(url) {
                location.href = "" + url;
            }

            function abrirPestana(url) {
                var win = window.open(url, '_blank');
                win.focus();
            }
         
        </script>


</head>
<body class="hold-transition light-skin fixed sidebar-mini theme-primary" >
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <?php include_once "../../assest/config/menuFruta.php";    ?>
            <div class="content-wrapper">
                <div class="container-full">

                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Granel</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Granel</li>
                                            <li class="breadcrumb-item" aria-current="page">Recepción</li>
                                            <li class="breadcrumb-item" aria-current="page">Materia Prima</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#">Registro Recepción </a>  </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <?php include_once "../../assest/config/verIndicadorEconomico.php"; ?>
                        </div>
                    </div>
                    <label id="val_mensaje" class="validacion"><?php echo $MENSAJEFOLIO; ?> </label>
                    <label id="val_mensaje" class="validacion"><?php echo $MENSAJEENVASE; ?> </label>
                    <!-- Main content -->
                    <section class="content">
                        <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato">
                            <div class="box">                               
                                 <div class="box-header with-border bg-primary">                                   
                                    <h4 class="box-title">Registro de Recepcion</h4>                                        
                                </div>
                                <div class="box-body ">
                                    <div class="row">
                                        <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Número Recepción</label>
                                                <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTA" name="PLANTA" value="<?php echo $PLANTAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESAE" name="EMPRESAE" value="<?php echo $EMPRESA; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTAE" name="PLANTAE" value="<?php echo $PLANTA; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADAE" name="TEMPORADAE" value="<?php echo $TEMPORADA; ?>" />
                                                <input type="hidden" name="CANTIDADENVASERECEPCION" id="CANTIDADENVASERECEPCION" value="<?php echo $CANTIDADENVASERECEPCION; ?>" />
                                                <input type="hidden" name="KILOSNETORECEPCION" id="KILOSNETORECEPCION" value="<?php echo $KILOSNETORECEPCION; ?>" />
                                                <input type="hidden" name="KILOSBRUTORECEPCION" id="KILOSBRUTORECEPCION" value="<?php echo $KILOSBRUTORECEPCION; ?>" />

                                                <input type="hidden" class="form-control" placeholder="ID RECEPCION" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="OP RECEPCION" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="URL RECEPCION" id="URLP" name="URLP" value="registroRecepcionmp" />
                                                <input type="hidden" class="form-control" placeholder="URL DRECEPCION" id="URLD" name="URLD" value="registroDrecepcionmp" />
                                                <input type="text" class="form-control" style="background-color: #eeeeee;" placeholder="Numero Recepcion" id="NUMERORECEPCION" name="NUMERORECEPCION" value="<?php echo $NUMEROVER; ?>" disabled />
                                                <label id="val_id" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-6 col-xl-1 col-lg-1 col-md-6 col-sm-6 col-6 col-xs-6">
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha Ingreso</label>
                                                <input type="hidden" class="form-control" placeholder="Fecha Ingreso" id="FECHAINGRESORECEPCIONE" name="FECHAINGRESORECEPCIONE" value="<?php echo $FECHAINGRESORECEPCION; ?>" />
                                                <input type="date" class="form-control" style="background-color: #eeeeee;" placeholder="FECHA RECEPCIONMP" id="FECHAINGRESORECEPCION" name="FECHAINGRESORECEPCION" value="<?php echo $FECHAINGRESORECEPCION; ?>" disabled />
                                                <label id="val_fechai" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha Modificación</label>
                                                <input type="hidden" class="form-control" placeholder="Fecha Modificación" id="FECHAMODIFCIACIONRECEPCIONE" name="FECHAMODIFCIACIONRECEPCIONE" value="<?php echo $FECHAMODIFCIACIONRECEPCION; ?>" />
                                                <input type="date" class="form-control" style="background-color: #eeeeee;" placeholder="FECHA MODIFICACION" id="FECHAMODIFCIACIONRECEPCION" name="FECHAMODIFCIACIONRECEPCION" value="<?php echo $FECHAMODIFCIACIONRECEPCION; ?>" disabled />
                                                <label id="val_fecham" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <label id="val_validato" class="validacion"> <?php echo $MENSAJEVALIDATO; ?> </label>
                                    <div class="row">
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha Recepción</label>
                                                <input type="hidden" class="form-control" placeholder="Fecha Recepción" id="FECHARECEPCIONE" name="FECHARECEPCIONE" value="<?php echo $FECHARECEPCION; ?>" />
                                                <input type="date" class="form-control"  placeholder="Fecha Recepcion" id="FECHARECEPCION" name="FECHARECEPCION" value="<?php echo $FECHARECEPCION; ?>" <?php echo $DISABLEDFOLIO; ?> <?php echo $DISABLED2; ?> />
                                                <label id="val_fechar" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Hora </label>
                                                <input type="hidden" class="form-control" placeholder="Hora Recepción" id="HORARECEPCIONE" name="HORARECEPCIONE" value="<?php echo $HORARECEPCION; ?>" />
                                                <input type="time" class="form-control"  placeholder="HORA RECEPCIONMP" id="HORARECEPCION" name="HORARECEPCION" value="<?php echo $HORARECEPCION; ?>" <?php echo $DISABLEDFOLIO; ?> <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> />
                                                <label id="val_horar" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Tipo Recepción</label>
                                                <input type="hidden" class="form-control" placeholder="Tipo Recepción" id="TRECEPCIONE" name="TRECEPCIONE" value="<?php echo $TRECEPCION; ?>" />
                                                <select class="form-control select2" id="TRECEPCION" name="TRECEPCION" style="width: 100%;" onchange="this.form.submit()" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLEDFOLIO; ?>>
                                                    <option> </option>
                                                    <option value="1" <?php if ($TRECEPCION == "1") { echo "selected";  } ?>> Desde Productor </option>
                                                    <option value="2" <?php if ($TRECEPCION == "2") { echo "selected";   } ?>> Planta Externa </option>                                                    
                                                </select>
                                                <label id="val_trecepcion" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Número Guía</label>
                                                <input type="hidden" class="form-control" placeholder="Número Guía" id="NUMEROGUIAE" name="NUMEROGUIAE" value="<?php echo $NUMEROGUIA; ?>" />
                                                <input type="number" class="form-control"  placeholder="Numero Guia" id="NUMEROGUIA" name="NUMEROGUIA" value="<?php echo $NUMEROGUIA; ?>" <?php echo $DISABLEDFOLIO; ?>  <?php echo $DISABLED2; ?> />
                                                <label id="val_numerog" class="validacion"><?php echo $MENSAJE3; ?> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha Guía</label>
                                                <input type="hidden" class="form-control" placeholder="Fecha Guía" id="FECHAGUIAE" name="FECHAGUIAE" value="<?php echo $FECHAGUIA; ?>" />
                                                <input type="date" class="form-control"  placeholder="Fecha Guia" id="FECHAGUIA" name="FECHAGUIA" value="<?php echo $FECHAGUIA; ?>" <?php echo $DISABLEDFOLIO; ?> <?php echo $DISABLED2; ?> />
                                                <label id="val_fechag" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Total Envases Guia</label>
                                                <input type="hidden" class="form-control" placeholder="Total Guia" id="TOTALGUIAE" name="TOTALGUIAE" value="<?php echo $TOTALGUIA; ?>" />
                                                <input type="text" class="form-control"  placeholder="Total Guia" id="TOTALGUIA" name="TOTALGUIA" value="<?php echo $TOTALGUIA; ?>" <?php echo $DISABLEDFOLIO; ?> <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> />
                                                <label id="val_totalg" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-5 col-lg-9 col-md-9 col-sm-9 col-9 col-xs-9">
                                            <label>Transporte</label>
                                            <input type="hidden" class="form-control" placeholder="TRANSPORTE" id="TRANSPORTEE" name="TRANSPORTEE" value="<?php echo $TRANSPORTE; ?>" />
                                            <select class="form-control select2" id="TRANSPORTE" name="TRANSPORTE" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLEDFOLIO; ?>>
                                                <option></option>
                                                <?php foreach ($ARRAYTRANSPORTE as $r) : ?>
                                                    <?php if ($ARRAYTRANSPORTE) {    ?>
                                                        <option value="<?php echo $r['ID_TRANSPORTE']; ?>" <?php if ($TRANSPORTE == $r['ID_TRANSPORTE']) {  echo "selected";   } ?>> <?php echo $r['NOMBRE_TRANSPORTE'] ?> </option>
                                                    <?php } else { ?>
                                                        <option>No Hay Datos Registrados </option>
                                                    <?php } ?>
                                                <?php endforeach; ?>
                                            </select>
                                            <label id="val_transporte" class="validacion"> </label>
                                        </div>
                                        <div class="col-xxl-1 col-xl-1 col-lg-3 col-md-3 col-sm-3 col-3 col-xs-3">
                                            <div class="form-group">
                                                <br>
                                                <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Transporte" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLEDFOLIO; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopTransporte.php' ); ">
                                                    <i class="glyphicon glyphicon-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-5 col-lg-9 col-md-9 col-sm-9 col-9 col-xs-9">
                                            <div class="form-group">
                                                <label>Conductor</label>
                                                <input type="hidden" class="form-control" placeholder="CONDUCTORE" id="CONDUCTORE" name="CONDUCTORE" value="<?php echo $CONDUCTOR; ?>" />
                                                <select class="form-control select2" id="CONDUCTOR" name="CONDUCTOR" style="width: 100%;" value="<?php echo $CONDUCTOR; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLEDFOLIO; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYCONDUCTOR as $r) : ?>
                                                        <?php if ($ARRAYCONDUCTOR) {    ?>
                                                            <option value="<?php echo $r['ID_CONDUCTOR']; ?>" <?php if ($CONDUCTOR == $r['ID_CONDUCTOR']) { echo "selected"; } ?>>
                                                                <?php echo $r['NOMBRE_CONDUCTOR'] ?>
                                                            </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_conductor" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-1 col-xl-1 col-lg-3 col-md-3 col-sm-3 col-3 col-xs-3">
                                            <div class="form-group">
                                                <br>
                                                <button type="button" class=" btn btn-success btn-block" data-toggle="tooltip" title="Agregar Conductor" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLEDFOLIO; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopConductor.php' ); ">
                                                    <i class="glyphicon glyphicon-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Patente Camión</label>
                                                <input type="hidden" class="form-control" placeholder="PATENTECAMIONE" id="PATENTECAMIONE" name="PATENTECAMIONE" value="<?php echo $PATENTECAMION; ?>" />
                                                <input type="text" class="form-control"  placeholder="Patente Camion" id="PATENTECAMION" name="PATENTECAMION" value="<?php echo $PATENTECAMION; ?>" <?php echo $DISABLEDFOLIO; ?> <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> />
                                                <label id="val_patentecamion" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Patente Carro</label>
                                                <input type="hidden" class="form-control" placeholder="PATENTECARROE" id="PATENTECARROE" name="PATENTECARROE" value="<?php echo $PATENTECARRO; ?>" />
                                                <input type="text" class="form-control"  placeholder="Patente Carro" id="PATENTECARRO" name="PATENTECARRO" value="<?php echo $PATENTECARRO; ?>" <?php echo $DISABLEDFOLIO; ?> <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> />
                                                <label id="val_patentecarro" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <?php if ($TRECEPCION == "") { ?>
                                            <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>CSG/CSP</label>
                                                    <input type="hidden" class="form-control" placeholder="CSG" id="CSG" name="CSG" value="<?php echo $CSG; ?>" />
                                                    <input type="text" class="form-control" placeholder="CSG" id="CSGV" name="CSGV" value="<?php echo $CSG; ?>" disabled />

                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if ($TRECEPCION == "1") { ?>
                                            <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>CSG</label>
                                                    <input type="hidden" class="form-control" placeholder="CSG" id="CSG" name="CSG" value="<?php echo $CSG; ?>" />
                                                    <input type="text" class="form-control" placeholder="CSG" id="CSGV" name="CSGV" value="<?php echo $CSG; ?>" disabled />
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Productor</label>
                                                    <input type="hidden" class="form-control" placeholder="PLANTA2" id="PLANTA2E" name="PLANTA2E" value="<?php echo $PLANTA2; ?>" />
                                                    <input type="hidden" class="form-control" placeholder="PLANTA2" id="PLANTA2" name="PLANTA2" value="<?php echo $PLANTA; ?>" <?php echo $DISABLEDFOLIO; ?> <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> />
                                                    <input type="hidden" class="form-control" placeholder="Productor" id="PRODUCTORE" name="PRODUCTORE" value="<?php echo $PRODUCTOR; ?>" />
                                                    <select class="form-control select2" id="PRODUCTOR" name="PRODUCTOR" style="width: 100%;" <?php echo $DISABLEDFOLIO; ?> <?php if ($TRECEPCION == "1") { ?> onchange="this.form.submit()" <?php } ?> <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYPRODUCTOR as $r) : ?>
                                                            <?php if ($ARRAYPRODUCTOR) {    ?>
                                                                <option value="<?php echo $r['ID_PRODUCTOR']; ?>" <?php if ($PRODUCTOR == $r['ID_PRODUCTOR']) {  echo "selected";   } ?>>
                                                                    <?php echo $r['CSG_PRODUCTOR'] ?> : <?php echo $r['NOMBRE_PRODUCTOR'] ?>
                                                                </option>
                                                            <?php } else { ?>
                                                                <option>No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_productor" class="validacion"> </label>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if ($TRECEPCION == "2") { ?>
                                            <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>CSP</label>
                                                    <input type="hidden" class="form-control" placeholder="CSG" id="CSG" name="CSG" value="<?php echo $CSG; ?>" />
                                                    <input type="text" class="form-control" placeholder="CSG" id="CSGV" name="CSGV" value="<?php echo $CSG; ?>" disabled />
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-5 col-lg-9 col-md-9 col-sm-9 col-9 col-xs-9">
                                                <div class="form-group">
                                                    <label>Planta Origen</label>
                                                    <input type="hidden" class="form-control" placeholder="PLANTA2E" id="PLANTA2E" name="PLANTA2E" value="<?php echo $PLANTA2; ?>" />
                                                    <select class="form-control select2" id="PLANTA2" name="PLANTA2" style="width: 100%;" onchange="this.form.submit()" value="<?php echo $PLANTA2; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLEDFOLIO; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYPLANTA2 as $r) : ?>
                                                            <?php if ($ARRAYPLANTA2) {    ?>
                                                                <option value="<?php echo $r['ID_PLANTA']; ?>" <?php if ($PLANTA2 == $r['ID_PLANTA']) {       echo "selected";   } ?>>
                                                                    <?php echo $r['NOMBRE_PLANTA'] ?>
                                                                </option>
                                                            <?php } else { ?>
                                                                <option>No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_planta2" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-1 col-xl-1 col-lg-3 col-md-3 col-sm-3 col-3 col-xs-3">
                                                <div class="form-group">
                                                    <br>
                                                    <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Planta Externa" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLEDFOLIO; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopPlanta2.php' ); ">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if ($TRECEPCION == "3") { ?>
                                            <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>CSG</label>
                                                    <input type="hidden" class="form-control" placeholder="CSG" id="CSG" name="CSG" value="<?php echo $CSG; ?>" />
                                                    <input type="text" class="form-control" placeholder="CSG" id="CSGV" name="CSGV" value="<?php echo $CSG; ?>" disabled />
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Productor</label>
                                                    <input type="hidden" class="form-control" placeholder="PLANTA2" id="PLANTA2E" name="PLANTA2E" value="<?php echo $PLANTA2; ?>" />
                                                    <input type="hidden" class="form-control" placeholder="PLANTA2" id="PLANTA2" name="PLANTA2" value="<?php echo $PLANTA; ?>" <?php echo $DISABLEDFOLIO; ?> <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> />
                                                    <input type="hidden" class="form-control" placeholder="Productor" id="PRODUCTORE" name="PRODUCTORE" value="<?php echo $PRODUCTOR; ?>" />
                                                    <select class="form-control select2" id="PRODUCTOR" name="PRODUCTOR" style="width: 100%;" <?php echo $DISABLEDFOLIO; ?> <?php if ($TRECEPCION == "3") { ?> onchange="this.form.submit()" <?php } ?> <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYPRODUCTOR as $r) : ?>
                                                            <?php if ($ARRAYPRODUCTOR) {    ?>
                                                                <option value="<?php echo $r['ID_PRODUCTOR']; ?>" <?php if ($PRODUCTOR == $r['ID_PRODUCTOR']) {  echo "selected";   } ?>>
                                                                    <?php echo $r['CSG_PRODUCTOR'] ?> : <?php echo $r['NOMBRE_PRODUCTOR'] ?>
                                                                </option>
                                                            <?php } else { ?>
                                                                <option>No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_productor" class="validacion"> </label>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <!--<div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Diferencia Envases</label>
                                                <input type="text" class="form-control" placeholder="Diferencia Envases" id="DIFERENCIAKILOS" name="DIFERENCIAKILOS" value="<?php echo $DIFERENCIAKILOS; ?>" disabled style='background-color: #eeeeee;' />
                                                <label id="val_dkilo" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>% Diferencia </label>
                                                <input type="text" class="form-control" placeholder="% " id="PORCENTAJEDIFERENCIA" name="PORCENTAJEDIFERENCIA" value="<?php echo $PORCENTAJEDIFERENCIA; ?>" disabled style='background-color: #eeeeee;' />
                                                <label id="val_dkilo" class="validacion"> </label>
                                            </div>
                                        </div>-->
                                    </div>
                                    <div class="row">
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Observaciónes </label>
                                                <input type="hidden" class="form-control" placeholder="Observaciónes" id="OBSERVACIONE" name="OBSERVACIONE" value="<?php echo $OBSERVACION; ?>" />
                                                <textarea class="form-control" rows="1"  placeholder="Ingrese Nota, Observaciones u Otro" id="OBSERVACION" name="OBSERVACION" <?php echo $DISABLEDFOLIO; ?> <?php echo $DISABLED2; ?>><?php echo $OBSERVACION; ?></textarea>
                                                <label id="val_observacion" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-muted"><i class="fas fa-info-circle"></i> Datos necesarios para la recepción de envases</p>
                                    <div class="row">
                                        <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Tipo Documento</label>
                                                <input type="hidden" class="form-control" placeholder="TDOCUMENTOE" id="TDOCUMENTOE" name="TDOCUMENTOE" value="<?php echo $TDOCUMENTO; ?>" />
                                                <select class="form-control select2" id="TDOCUMENTO" name="TDOCUMENTO" style="width: 100%;"  <?php echo $DISABLED2; ?> <?php echo $DISABLEDFOLIO; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYTDOCUMENTO as $r) : ?>
                                                        <?php if ($ARRAYTDOCUMENTO) {    ?>
                                                            <option value="<?php echo $r['ID_TDOCUMENTO']; ?>" <?php if ($TDOCUMENTO == $r['ID_TDOCUMENTO']) {    echo "selected";  } ?>> 
                                                                <?php echo $r['NOMBRE_TDOCUMENTO'] ?> 
                                                            </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_tdocumento" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" placeholder="BODEGA" id="BODEGA" name="BODEGA" value="<?php echo $BODEGA; ?>" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar">
                                        <div class="btn-group  col-xxl-4 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12" role="group" aria-label="Acciones generales">
                                            <?php if ($OP == "") { ?>
                                                <button type="button" class="btn btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroRecepcionmp.php');">
                                                    <i class="ti-trash"></i> Borrar
                                                </button>
                                                <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Guardar" name="CREAR" value="CREAR" <?php echo $DISABLEDFOLIO; ?>  <?php echo $DISABLEENVASE; ?>  onclick="return validacion()">
                                                    <i class="ti-save-alt"></i> Guardar
                                                </button>
                                            <?php } ?>
                                            <?php if ($OP != "") { ?>
                                                <button type="button" class="btn btn-success " data-toggle="tooltip" title="Volver" name="VOLVER" value="VOLVER" Onclick="irPagina('listarRecepcionmp.php'); ">
                                                    <i class="ti-back-left "></i> Volver
                                                </button>
                                                <button type="submit" class="btn btn-warning " data-toggle="tooltip" title="Guardar" name="GUARDAR" value="GUARDAR" <?php echo $DISABLED2; ?> <?php echo $DISABLEDFOLIO; ?> <?php echo $DISABLEENVASE; ?>  onclick="return validacion()">
                                                    <i class="ti-pencil-alt"></i> Guardar
                                                </button>
                                                <button type="submit" class="btn btn-danger " data-toggle="tooltip" title="Cerrar" name="CERRAR" value="CERRAR" <?php echo $DISABLED2; ?> <?php echo $DISABLEDFOLIO; ?>  <?php echo $DISABLEENVASE; ?>  onclick="return  validacion()">
                                                    <i class="ti-save-alt"></i> Cerrar
                                                </button>
                                            <?php } ?>
                                        </div>
                                        <div class="btn-group  col-xxl-4 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12  float-right">
                                            <?php if ($OP != "") : ?>
                                                <button type="button" class="btn  btn-primary  " data-toggle="tooltip" title="Informe" id="defecto" name="tarjas" <?php if ($ESTADO == "1") { echo "disabled"; } ?> <?php echo $DISABLEDFOLIO; ?> Onclick="abrirPestana('../../assest/documento/informeRecepcionmp.php?parametro=<?php echo $IDOP; ?>&usuario=<?php echo $IDUSUARIOS; ?>'); ">
                                                    <i class="fa fa-file-pdf-o"></i> Informe
                                                </button>
                                                <button type="button" class="btn btn-info  " data-toggle="tooltip" title="Tarja" id="defecto" name="tarjas" <?php echo $DISABLEDFOLIO; ?> Onclick="abrirPestana('../../assest/documento/informeTarjasRecepcionmp.php?parametro=<?php echo $IDOP; ?>'); ">
                                                    <i class="fa fa-file-pdf-o"></i> Tarjas
                                                </button>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                        <?php if (isset($_GET['op'])): ?>
                            <div class="card">
                                <div class="card-header bg-success">
                                    <h4 class="card-title">Detalle de recepcion</h4>
                                </div>
                                <div class="card-header">
                                        <div class="form-row align-items-center">
                                            <form method="post" id="form2" name="form2">
                                                <input type="hidden" class="form-control" placeholder="ID RECEPCIONMP" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" /><!-- id de la recepcion -->
                                                <input type="hidden" class="form-control" placeholder="OP RECEPCIONMP" id="OPP" name="OPP" value="<?php echo $OP; ?>" /><!-- accion editar -->
                                                <input type="hidden" class="form-control" placeholder="URL RECEPCIONMP" id="URLP" name="URLP" value="registroRecepcionmp" />
                                                <input type="hidden" class="form-control" placeholder="URL DRECEPCIONMP" id="URLD" name="URLD" value="registroDrecepcionmp" />
                                                <div class="col-auto">
                                                    <button type="submit" class="btn btn-success btn-block mb-2" data-toggle="tooltip" title="Agregar Detalle Recepción" id="CREARDURL" name="CREARDURL"
                                                        <?php echo $DISABLED2; ?> <?php echo $DISABLEDFOLIO; ?> <?php if ($ESTADO == 0) : ?> disabled style='background-color: #eeeeee;' <?php endif ?>>
                                                            Agregar Detalle
                                                    </button>
                                                </div>
                                            </form>
                                            <div class="col-auto">
                                                <label class="sr-only" for="inlineFormInputGroup">Username</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">Diferencia de Envases Guia</div>
                                                    </div>
                                                    <input type="hidden" name="DIFERENCIAENVASESGUIA" id="DIFERENCIAENVASESGUIA" value="<?php echo ($TOTALGUIA-$CANTIDADENVASERECEPCION); ?>" />
                                                    <input type="text" class="form-control" placeholder="Diferencia de Envases Guia" id="DIFERENCIAENVASESGUIAv" name="DIFERENCIAENVASESGUIAv" value="<?php echo ($TOTALGUIA-$CANTIDADENVASERECEPCION); ?>" disabled />
                                                </div>
                                            </div>

                                            <div class="col-auto">
                                                <label class="sr-only" for="inlineFormInputGroup">Username</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">Total Envase</div>
                                                    </div>
                                                    <input type="hidden" name="CANTIDADENVASERECEPCION" id="CANTIDADENVASERECEPCION" value="<?php echo $CANTIDADENVASERECEPCION; ?>" />
                                                    <input type="text" class="form-control" placeholder="Total Envase" id="CANTIDADENVASERECEPCIONv" name="CANTIDADENVASERECEPCIONv" value="<?php echo $CANTIDADENVASERECEPCION2; ?>" disabled />
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <label class="sr-only" for="inlineFormInputGroup">Username</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">Total Neto</div>
                                                    </div>
                                                    <input type="hidden" name="KILOSNETORECEPCION" id="KILOSNETORECEPCION" value="<?php echo $KILOSNETORECEPCION; ?>" />
                                                    <input type="text" class="form-control" placeholder="Total Neto" id="KILOSNETORECEPCIONV" name="KILOSNETORECEPCIONV" value="<?php echo $KILOSNETORECEPCION2; ?>" disabled />
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <label class="sr-only" for="inlineFormInputGroup">Username</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">Total Bruto</div>
                                                    </div>
                                                    <input type="hidden" name="KILOSBRUTORECEPCION" id="KILOSBRUTORECEPCION" value="<?php echo $KILOSBRUTORECEPCION; ?>" />
                                                    <input type="text" class="form-control" placeholder="Total Bruto" id="KILOSBRUTORECEPCIONV" name="KILOSBRUTORECEPCIONV" value="<?php echo $KILOSBRUTORECEPCION2; ?>" disabled />
                                                </div>
                                            </div>

                                            

                                            
                                        </div>

                                        
                                </div>
                                <?php 
                                            $CONTROL_ALERTA = ($TOTALGUIA-$CANTIDADENVASERECEPCION);


                                            if($CONTROL_ALERTA < 0){
                                                echo '<div class="alert alert-danger" role="alert"><i class="fa fa-exclamation-triangle"></i> Los envases no cuadran con la Guia.</div>';
                                            }elseif($CONTROL_ALERTA == 0){
                                                echo '<div class="alert alert-success" role="alert"><i class="fa fa-check"></i> No hay diferencia de envases.</div>';
                                            }else{
                                                echo '<div class="alert alert-danger" role="alert"><i class="fa fa-exclamation-triangle"></i> Le quedan envases pendientes, segun Guia.</div>';
                                            }
                                            
                                            
                                            ?>
                                <div class="card-body">
                                    <div class=" table-responsive">
                                        <table id="detalle" class="table-hover " style="width: 100%;">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Numero Linea</th>
                                                    <th>Folio</th>
                                                    <th class="text-center">Operaciones</th>
                                                    <th>Fecha Cosecha </th>
                                                    <th>Código Estandar</th>
                                                    <th>Envase/Estandar</th>
                                                    <th>Variedad</th>
                                                    <th>Cantidad Envase</th>
                                                    <th>Kilo Neto </th>
                                                    <th>Kilo Promedio </th>
                                                    <th>Kilo Bruto </th>
                                                    <th>Gasificacion</th>
                                                    <th>Tipo Manejo </th>
                                                    <th>Tipo Tratamiento 1 </th>
                                                    <th>Tipo Tratamiento 2 </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if ($ARRAYDRECEPCION) { ?>
                                                    <?php foreach ($ARRAYDRECEPCION as $s) : ?>
                                                        <?php $CONTADOR = $CONTADOR + 1; ?>
                                                        <?php
                                                        $ARRAYVESPECIES = $VESPECIES_ADO->verVespecies($s['ID_VESPECIES']);
                                                        if ($ARRAYVESPECIES) {
                                                            $NOMBREVARIEDAD = $ARRAYVESPECIES[0]['NOMBRE_VESPECIES'];
                                                        } else {
                                                            $NOMBREVARIEDAD = "Sin Datos";
                                                        }
                                                        if ($s['GASIFICADO_DRECEPCION'] == "1") {
                                                            $GASIFICADO = "SI";
                                                        } else if ($s['GASIFICADO_DRECEPCION'] == "0") {
                                                            $GASIFICADO = "NO";
                                                        } else {
                                                            $GASIFICADO = "Sin Datos";
                                                        }
                                                        $ARRAYTMANEJO = $TMANEJO_ADO->verTmanejo($s['ID_TMANEJO']);
                                                        if ($ARRAYTMANEJO) {
                                                            $NOMBRETMANEJO = $ARRAYTMANEJO[0]['NOMBRE_TMANEJO'];
                                                        } else {
                                                            $NOMBRETMANEJO = "Sin Datos";
                                                        }
                                                        $ARRAYESTANDAR = $ERECEPCION_ADO->verEstandar($s['ID_ESTANDAR']);
                                                        if ($ARRAYESTANDAR) {
                                                            $CODIGOESTANDAR = $ARRAYESTANDAR[0]['CODIGO_ESTANDAR'];
                                                            $NOMBREESTANDAR = $ARRAYESTANDAR[0]['NOMBRE_ESTANDAR'];
                                                        } else {
                                                            $CODIGOESTANDAR = "Sin Datos";
                                                            $NOMBREESTANDAR = "Sin Datos";
                                                        }
                                                        $ARRAYTRATAMIENTO1=$TTRATAMIENTO1_ADO->verTtratamiento($s['ID_TTRATAMIENTO1']);
                                                        if($ARRAYTRATAMIENTO1){
                                                            $NOMBRETTRATAMIENTO1 = $ARRAYTRATAMIENTO1[0]["NOMBRE_TTRATAMIENTO"];
                                                        }else{
                                                            $NOMBRETTRATAMIENTO1="Sin Datos";
                                                        }
                                                        $ARRAYTRATAMIENTO2=$TTRATAMIENTO2_ADO->verTtratamiento($s['ID_TTRATAMIENTO2']);
                                                        if($ARRAYTRATAMIENTO2){
                                                            $NOMBRETTRATAMIENTO2 = $ARRAYTRATAMIENTO2[0]["NOMBRE_TTRATAMIENTO"];
                                                        }else{
                                                            $NOMBRETTRATAMIENTO2="Sin Datos";
                                                        }
                                                        ?>
                                                        <tr class="text-lef">
                                                            <td><?php echo $CONTADOR ?></td>
                                                            <td><?php echo $s['FOLIO_DRECEPCION']; ?></td>
                                                            <td>
                                                                <form method="post" id="form1">
                                                                    <input type="hidden" class="form-control" placeholder="ID DRECEPCIONE" id="IDD" name="IDD" value="<?php echo $s['ID_DRECEPCION']; ?>" />
                                                                    <input type="hidden" class="form-control" placeholder="ID RECEPCIONE" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                                                    <input type="hidden" class="form-control" placeholder="OP RECEPCIONE" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                                                    <input type="hidden" class="form-control" placeholder="URL RECEPCIONE" id="URLP" name="URLP" value="registroRecepcionmp" />
                                                                    <input type="hidden" class="form-control" placeholder="URL DRECEPCIONE" id="URLD" name="URLD" value="registroDrecepcionmp" />
                                                                    <div class="btn-group btn-rounded btn-block" role="group" aria-label="Operaciones Detalle">
                                                                        <?php if ($ESTADO == "0") { ?>
                                                                            <button type="submit" class="btn btn-info  btn-sm   " id="VERDURL" name="VERDURL" data-toggle="tooltip" title="Ver Detalle Recepción">
                                                                                <i class="ti-eye"></i><br> Ver
                                                                            </button>
                                                                        <?php } ?>
                                                                        <?php if ($ESTADO == "1") { ?>
                                                                            <button type="submit" class="btn btn-warning btn-sm " id="EDITARDURL" name="EDITARDURL" data-toggle="tooltip" title="Editar Detalle Recepción" <?php echo $DISABLEENVASE; ?>  <?php echo $DISABLED2; ?>>
                                                                                <i class="ti-pencil-alt"></i><br> Editar
                                                                            </button>
                                                                            <button type="submit" class="btn btn-secondary btn-sm " id="DUPLICARDURL" name="DUPLICARDURL" data-toggle="tooltip" title="Duplicar Detalle Recepción" <?php echo $DISABLEENVASE; ?>  <?php echo $DISABLED2; ?>>
                                                                                <i class="fa fa-fw fa-copy"></i><br> Duplicar
                                                                            </button>
                                                                            <button type="submit" class="btn btn-danger btn-sm" id="ELIMINARDURL" name="ELIMINARDURL" data-toggle="tooltip" title="Eliminar Detalle Recepción" <?php echo $DISABLEENVASE; ?>  <?php echo $DISABLED2; ?>>
                                                                                <i class="ti-close"></i><br> Eliminar
                                                                            </button>
                                                                        <?php } ?>
                                                                            <button type="button" class="btn btn-primary btn-sm" id="TARJA" name="TARJA" data-toggle="tooltip" title="Tarja Detalle Recepción"   
                                                                            Onclick="abrirPestana('../../assest/documento/informeTarjasDrecepcionmp.php?parametro=<?php echo $s['ID_DRECEPCION']; ?>'); ">
                                                                                <i class="fa fa-file-pdf-o"></i><br> Tarja
                                                                            </button>
                                                                    </div>
                                                                </form>
                                                            </td>
                                                            <td><?php echo $s['COSECHA']; ?></td>
                                                            <td><?php echo $CODIGOESTANDAR; ?></td>
                                                            <td><?php echo $NOMBREESTANDAR; ?></td>
                                                            <td><?php echo $NOMBREVARIEDAD; ?></td>
                                                            <td><?php echo $s['ENVASE']; ?></td>
                                                            <td><?php echo $s['NETO']; ?></td>
                                                            <td><?php echo $s['PROMEDIO'] ?></td>
                                                            <td><?php echo $s['BRUTO']; ?></td>
                                                            <td><?php echo $GASIFICADO; ?></td>
                                                            <td><?php echo $NOMBRETMANEJO; ?></td>
                                                            <td><?php echo $NOMBRETTRATAMIENTO1; ?></td>
                                                            <td><?php echo $NOMBRETTRATAMIENTO2; ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <label id="val_drecepcion" class="validacion "><?php echo $MENSAJE; ?> </label>
                                </div>
                            </div>
                        <?php endif ?>
                </div>
                <!--.row -->
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
            //OPERACION DE REGISTRO DE FILA
            if (isset($_REQUEST['CREAR'])) {
                if ($_REQUEST['TRECEPCION'] == "1") {
                    $ARRAYRECEPCIONBUSCARGPETP = $RECEPCIONMP_ADO->buscarRecepcionPorProductorGuiaEmpresaPlantaTemporada($_REQUEST['NUMEROGUIA'], $_REQUEST['PRODUCTOR'], $_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
                    if ($ARRAYRECEPCIONBUSCARGPETP) {
                        $SINO = "1";
                        echo '<script>
                            Swal.fire({
                                icon:"warning",
                                title:"Accion restringida",
                                text:"Numero Guía del productor Se encuentra Duplicada",
                                showConfirmButton: true,
                                confirmButtonText:"Cerrar",
                                closeOnConfirm:false
                            })
                        </script>';
                    } else {
                        $SINO = "0";
                        $MENSAJE = "";
                    }
                }else if ($_REQUEST['TRECEPCION'] == "2") {
                    $ARRAYRECEPCIONBUSCARGPETP = $RECEPCIONMP_ADO->buscarRecepcionPorPlantaExternaGuiaEmpresaPlantaTemporada($_REQUEST['NUMEROGUIA'], $_REQUEST['PLANTA2'], $_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
                    if ($ARRAYRECEPCIONBUSCARGPETP) {
                        $SINO = "1";
                        echo '<script>
                            Swal.fire({
                                icon:"warning",
                                title:"Accion restringida",
                                text:"Numero Guía del productor Se encuentra Duplicada",
                                showConfirmButton: true,
                                confirmButtonText:"Cerrar",
                                closeOnConfirm:false
                            })
                        </script>';
                    } else {
                        $SINO = "0";
                        $MENSAJE = "";
                    }
                }else{                    
                    $SINO = "0";
                    $MENSAJE = "";
                }

                if ($SINO == "0") {
                    $ARRAYNUMERO = $RECEPCIONMP_ADO->obtenerNumero($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
                    $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;
                    //UTILIZACION METODOS SET DEL MODELO
                    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO

                    $RECEPCIONMP->__SET('NUMERO_RECEPCION', $NUMERO);
                    $RECEPCIONMP->__SET('FECHA_RECEPCION', $_REQUEST['FECHARECEPCION']);
                    $RECEPCIONMP->__SET('HORA_RECEPCION', $_REQUEST['HORARECEPCION']);
                    $RECEPCIONMP->__SET('FECHA_GUIA_RECEPCION', $_REQUEST['FECHAGUIA']);
                    $RECEPCIONMP->__SET('NUMERO_GUIA_RECEPCION', $_REQUEST['NUMEROGUIA']);
                    $RECEPCIONMP->__SET('CANTIDAD_ENVASE_RECEPCION', 0);
                    $RECEPCIONMP->__SET('KILOS_NETO_RECEPCION', 0);
                    $RECEPCIONMP->__SET('KILOS_BRUTO_RECEPCION', 0);
                    $RECEPCIONMP->__SET('TOTAL_KILOS_GUIA_RECEPCION',  $_REQUEST['TOTALGUIA']);
                    $RECEPCIONMP->__SET('PATENTE_CAMION', $_REQUEST['PATENTECAMION']);
                    $RECEPCIONMP->__SET('PATENTE_CARRO', $_REQUEST['PATENTECARRO']);
                    $RECEPCIONMP->__SET('OBSERVACION_RECEPCION', $_REQUEST['OBSERVACION']);
                    $RECEPCIONMP->__SET('TRECEPCION', $_REQUEST['TRECEPCION']);
                    if ($_REQUEST['TRECEPCION'] == "1") {
                        $RECEPCIONMP->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
                    }
                    if ($_REQUEST['TRECEPCION'] == "2") {
                        $RECEPCIONMP->__SET('ID_PLANTA2', $_REQUEST['PLANTA2']);
                    }
                    $RECEPCIONMP->__SET('ID_TRANSPORTE', $_REQUEST['TRANSPORTE']);
                    $RECEPCIONMP->__SET('ID_CONDUCTOR', $_REQUEST['CONDUCTOR']);
                    $RECEPCIONMP->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                    $RECEPCIONMP->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
                    $RECEPCIONMP->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
                    $RECEPCIONMP->__SET('ID_USUARIOI', $IDUSUARIOS);
                    $RECEPCIONMP->__SET('ID_USUARIOM', $IDUSUARIOS);
                    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR 
                   $RECEPCIONMP_ADO->agregarRecepcion($RECEPCIONMP);

                    //OBTENER EL ID DE LA RECEPCION CREADA PARA LUEGO ENVIAR EL INGRESO DEL DETALLE
                    $ARRYAOBTENERID = $RECEPCIONMP_ADO->obtenerID(
                        $_REQUEST['OBSERVACION'],
                        $_REQUEST['TRECEPCION'],
                        $_REQUEST['EMPRESA'],
                        $_REQUEST['PLANTA'],
                        $_REQUEST['TEMPORADA'],
                    );
                    $AUSUARIO_ADO->agregarAusuario2($NUMERO,1,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Recepción Materia Prima.","fruta_recepcionmp", $ARRYAOBTENERID[0]['ID_RECEPCION'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

                    $ARRAYRECEPCIONE=$RECEPCIONE_ADO->listarRecepcionPorRecepcionMpCBX($_REQUEST['IDP']);
                    if(empty($ARRAYRECEPCIONE)){
                        $ARRAYNUMERO = $RECEPCIONE_ADO->obtenerNumero($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
                        $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;
                        //UTILIZACION METODOS SET DEL MODELO
                        //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
                        $RECEPCIONE->__SET('NUMERO_RECEPCION', $NUMERO);
                        $RECEPCIONE->__SET('FECHA_RECEPCION', $_REQUEST['FECHARECEPCION']);
                        $RECEPCIONE->__SET('NUMERO_DOCUMENTO_RECEPCION', $_REQUEST['NUMEROGUIA']);
                        $RECEPCIONE->__SET('PATENTE_CAMION', $_REQUEST['PATENTECAMION']);
                        $RECEPCIONE->__SET('PATENTE_CARRO', $_REQUEST['PATENTECARRO']);
                        $RECEPCIONE->__SET('OBSERVACIONES_RECEPCION', $_REQUEST['OBSERVACION']);
                        if ($_REQUEST['TRECEPCION'] == "1") {
                            $RECEPCIONE->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
                            $TRECEPCIONE=2;
                        }
                        if ($_REQUEST['TRECEPCION'] == "2") {
                            $RECEPCIONE->__SET('ID_PLANTA2', $_REQUEST['PLANTA2']);
                            $TRECEPCIONE=3;
                        }
                        $RECEPCIONE->__SET('TRECEPCION', $TRECEPCIONE);
                        $RECEPCIONE->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                        $RECEPCIONE->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
                        $RECEPCIONE->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
                        $RECEPCIONE->__SET('ID_TRANSPORTE', $_REQUEST['TRANSPORTE']);
                        $RECEPCIONE->__SET('ID_CONDUCTOR', $_REQUEST['CONDUCTOR']);   
                        $RECEPCIONE->__SET('ID_BODEGA', $_REQUEST['BODEGA']);
                        $RECEPCIONE->__SET('ID_TDOCUMENTO', $_REQUEST['TDOCUMENTO']);
                        $RECEPCIONE->__SET('ID_RECEPCIONMP', $ARRYAOBTENERID[0]['ID_RECEPCION']);  
                        $RECEPCIONE->__SET('ID_USUARIOI', $IDUSUARIOS);
                        $RECEPCIONE->__SET('ID_USUARIOM', $IDUSUARIOS);
                        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                        $RECEPCIONE_ADO->agregarRecepcionMateriaPrima($RECEPCIONE);
    
    
                        //OBTENER EL ID DE LA RECEPCIONE CREADA PARA LUEGO ENVIAR EL INGRESO DEL DETALLE
                        $ARRYAOBTENERIDE = $RECEPCIONE_ADO->buscarID(
                            $_REQUEST['FECHARECEPCION'],
                            $_REQUEST['OBSERVACION'],
                            $_REQUEST['EMPRESA'],
                            $_REQUEST['PLANTA'],
                            $_REQUEST['TEMPORADA'],
                        );              
                        $RECEPCIONE->__SET('ID_RECEPCION', $ARRYAOBTENERIDE[0]["ID_RECEPCION"]);
                        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                        $RECEPCIONE_ADO->cerrado($RECEPCIONE);
                        $AUSUARIO_ADO->agregarAusuario2($NUMERO,1,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Recepción Envases,Origen recepción materia prima .","material_recepcione", $ARRYAOBTENERIDE[0]['ID_RECEPCION'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

                    }


                    //REDIRECCIONAR A PAGINA registroRecepcionmp.php
                    $id_dato = $ARRYAOBTENERID[0]['ID_RECEPCION'];
                    $accion_dato = "crear";
                    echo '<script>
                        Swal.fire({
                            icon:"success",
                            title:"Registro Creado",
                            text:"El registro de recepcion se ha creado correctamente",
                            showConfirmButton: true,
                            confirmButtonText:"Cerrar",
                            closeOnConfirm:false
                        }).then((result)=>{
                             location.href = "registroRecepcionmp.php?op&id='.$id_dato.'&a='.$accion_dato.'";                            
                        })
                    </script>';
                }
            }
            //OPERACION EDICION DE FILA
            if (isset($_REQUEST['GUARDAR'])) {
                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
                $RECEPCIONMP->__SET('FECHA_RECEPCION', $_REQUEST['FECHARECEPCION']);
                $RECEPCIONMP->__SET('HORA_RECEPCION', $_REQUEST['HORARECEPCIONE']);
                $RECEPCIONMP->__SET('FECHA_GUIA_RECEPCION', $_REQUEST['FECHAGUIA']);
                $RECEPCIONMP->__SET('NUMERO_GUIA_RECEPCION', $_REQUEST['NUMEROGUIA']);
                $RECEPCIONMP->__SET('CANTIDAD_ENVASE_RECEPCION', $_REQUEST['CANTIDADENVASERECEPCION']);
                $RECEPCIONMP->__SET('KILOS_NETO_RECEPCION', $_REQUEST['KILOSNETORECEPCION']);
                $RECEPCIONMP->__SET('KILOS_BRUTO_RECEPCION', $_REQUEST['KILOSBRUTORECEPCION']);
                $RECEPCIONMP->__SET('TOTAL_KILOS_GUIA_RECEPCION',  $_REQUEST['TOTALGUIAE']);
                $RECEPCIONMP->__SET('PATENTE_CAMION', $_REQUEST['PATENTECAMIONE']);
                $RECEPCIONMP->__SET('PATENTE_CARRO', $_REQUEST['PATENTECARROE']);
                $RECEPCIONMP->__SET('OBSERVACION_RECEPCION', $_REQUEST['OBSERVACION']);
                $RECEPCIONMP->__SET('TRECEPCION', $_REQUEST['TRECEPCIONE']);
                if ($_REQUEST['TRECEPCIONE'] == "1") {
                    $RECEPCIONMP->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTORE']);
                }
                if ($_REQUEST['TRECEPCIONE'] == "2") {
                    $RECEPCIONMP->__SET('ID_PLANTA2', $_REQUEST['PLANTA2E']);
                }
                $RECEPCIONMP->__SET('ID_TRANSPORTE', $_REQUEST['TRANSPORTEE']);
                $RECEPCIONMP->__SET('ID_CONDUCTOR', $_REQUEST['CONDUCTORE']);
                $RECEPCIONMP->__SET('ID_USUARIOM', $IDUSUARIOS);
                $RECEPCIONMP->__SET('ID_RECEPCION', $_REQUEST['IDP']);
                //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                $RECEPCIONMP_ADO->actualizarRecepcion($RECEPCIONMP);

                $AUSUARIO_ADO->agregarAusuario2($NUMEROVER,1,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de Recepción Materia Prima.","fruta_recepcionmp", $_REQUEST['IDP'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  
                
                $ARRAYRECEPCIONE=$RECEPCIONE_ADO->listarRecepcionPorRecepcionMpCBX($_REQUEST['IDP']);
                if(empty($ARRAYRECEPCIONE)){
                    $ARRAYNUMERO = $RECEPCIONE_ADO->obtenerNumero($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
                    $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;
                    //UTILIZACION METODOS SET DEL MODELO
                    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
                    $RECEPCIONE->__SET('NUMERO_RECEPCION', $NUMERO);
                    $RECEPCIONE->__SET('FECHA_RECEPCION', $_REQUEST['FECHARECEPCION']);
                    $RECEPCIONE->__SET('NUMERO_DOCUMENTO_RECEPCION', $_REQUEST['NUMEROGUIA']);
                    $RECEPCIONE->__SET('PATENTE_CAMION', $_REQUEST['PATENTECAMIONE']);
                    $RECEPCIONE->__SET('PATENTE_CARRO', $_REQUEST['PATENTECARROE']);
                    $RECEPCIONE->__SET('OBSERVACIONES_RECEPCION', $_REQUEST['OBSERVACION']);
                    if ($_REQUEST['TRECEPCIONE'] == "1") {
                        $RECEPCIONE->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTORE']);
                        $TRECEPCIONE=2;
                    }
                    if ($_REQUEST['TRECEPCIONE'] == "2") {
                        $RECEPCIONE->__SET('ID_PLANTA2', $_REQUEST['PLANTA2E']);
                        $TRECEPCIONE=3;
                    }
                    $RECEPCIONE->__SET('TRECEPCION', $TRECEPCIONE);
                    $RECEPCIONE->__SET('ID_EMPRESA', $_REQUEST['EMPRESAE']);
                    $RECEPCIONE->__SET('ID_PLANTA', $_REQUEST['PLANTAE']);
                    $RECEPCIONE->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADAE']);
                    $RECEPCIONE->__SET('ID_TRANSPORTE', $_REQUEST['TRANSPORTEE']);
                    $RECEPCIONE->__SET('ID_CONDUCTOR', $_REQUEST['CONDUCTORE']);   
                    $RECEPCIONE->__SET('ID_BODEGA', $_REQUEST['BODEGA']);
                    $RECEPCIONE->__SET('ID_TDOCUMENTO', $_REQUEST['TDOCUMENTO']);
                    $RECEPCIONE->__SET('ID_RECEPCIONMP', $_REQUEST['IDP']);  
                    $RECEPCIONE->__SET('ID_USUARIOI', $IDUSUARIOS);
                    $RECEPCIONE->__SET('ID_USUARIOM', $IDUSUARIOS);
                    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                    $RECEPCIONE_ADO->agregarRecepcionMateriaPrima($RECEPCIONE);


                    //OBTENER EL ID DE LA RECEPCIONE CREADA PARA LUEGO ENVIAR EL INGRESO DEL DETALLE
                    $ARRYAOBTENERID = $RECEPCIONE_ADO->buscarID(
                        $_REQUEST['FECHARECEPCION'],
                        $_REQUEST['OBSERVACION'],
                        $_REQUEST['EMPRESA'],
                        $_REQUEST['PLANTA'],
                        $_REQUEST['TEMPORADA'],
                    );              
                    $RECEPCIONE->__SET('ID_RECEPCION', $ARRYAOBTENERID[0]["ID_RECEPCION"]);
                    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                    $RECEPCIONE_ADO->cerrado($RECEPCIONE);

                    $AUSUARIO_ADO->agregarAusuario2($NUMERO,1,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Recepción Envases, Origen recepción materia prima.","material_recepcione", $ARRYAOBTENERIDE[0]['ID_RECEPCION'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  
                }else{
                    $RECEPCIONE->__SET('FECHA_RECEPCION', $_REQUEST['FECHARECEPCION']);
                    $RECEPCIONE->__SET('NUMERO_DOCUMENTO_RECEPCION', $_REQUEST['NUMEROGUIA']);
                    $RECEPCIONE->__SET('PATENTE_CAMION', $_REQUEST['PATENTECAMIONE']);
                    $RECEPCIONE->__SET('PATENTE_CARRO', $_REQUEST['PATENTECARROE']);
                    $RECEPCIONE->__SET('OBSERVACIONES_RECEPCION', $_REQUEST['OBSERVACION']);
                    if ($_REQUEST['TRECEPCIONE'] == "1") {
                        $RECEPCIONE->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTORE']);
                        $TRECEPCIONE=2;
                    }
                    if ($_REQUEST['TRECEPCIONE'] == "2") {
                        $RECEPCIONE->__SET('ID_PLANTA2', $_REQUEST['PLANTA2E']);
                        $TRECEPCIONE=3;
                    }
                    $RECEPCIONE->__SET('TRECEPCION', $TRECEPCIONE);
                    $RECEPCIONE->__SET('ID_TRANSPORTE', $_REQUEST['TRANSPORTEE']);
                    $RECEPCIONE->__SET('ID_CONDUCTOR', $_REQUEST['CONDUCTORE']);  
                    $RECEPCIONE->__SET('ID_BODEGA', $_REQUEST['BODEGA']);
                    $RECEPCIONE->__SET('ID_TDOCUMENTO', $_REQUEST['TDOCUMENTO']);
                    $RECEPCIONE->__SET('ID_USUARIOM', $IDUSUARIOS);
                    $RECEPCIONE->__SET('ID_RECEPCION', $ARRAYRECEPCIONE[0]["ID_RECEPCION"]);
                    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                    $RECEPCIONE_ADO->actualizarRecepcionMateriaPrima($RECEPCIONE); 

                    $AUSUARIO_ADO->agregarAusuario2($ARRAYRECEPCIONE[0]["NUMERO_RECEPCION"],1,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de Recepción Envases, Origen recepción materia prima.","material_recepcione", $ARRAYRECEPCIONE[0]["ID_RECEPCION"],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  
                }
                if ($_GET["a"] == "crear") {
                    $id_dato = $_REQUEST['IDP'];
                    $accion_dato = "crear";
                    echo '<script>
                        Swal.fire({
                            icon:"info",
                            title:"Registro Modificado",
                            text:"El registro de recepcion se ha modificada correctamente",
                            showConfirmButton: true,
                            confirmButtonText:"Cerrar",
                            closeOnConfirm:false
                        }).then((result)=>{
                            location.href = "registroRecepcionmp.php?op&id='.$id_dato.'&a='.$accion_dato.'";                            
                        })
                    </script>';
                }
                if ($_GET["a"] == "editar") {
                    $id_dato = $_REQUEST['IDP'];
                    $accion_dato = "editar";
                    echo '<script>
                        Swal.fire({
                            icon:"info",
                            title:"Registro Modificado",
                            text:"El registro de recepcion se ha modificada correctamente",
                            showConfirmButton: true,
                            confirmButtonText:"Cerrar",
                            closeOnConfirm:false
                        }).then((result)=>{
                            location.href = "registroRecepcionmp.php?op&id='.$id_dato.'&a='.$accion_dato.'";                            
                        })
                    </script>';
                }
            }
            //OPERACION PARA CERRAR LA RECEPCION
            if (isset($_REQUEST['CERRAR'])) {
                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO
                $ARRAYDRECEPCION2 = $DRECEPCIONMP_ADO->listarDRecepcionPorRecepcion($_REQUEST['IDP']);
                if (empty($ARRAYDRECEPCION2)) {
                    echo '<script>
                            Swal.fire({
                                icon:"warning",
                                title:"Accion restringida",
                                text:"Tiene que haber al menos un registro en el detalle",
                                showConfirmButton: true,
                                confirmButtonText:"Cerrar",
                                closeOnConfirm:false
                            })
                        </script>';
                    $SINO = "1";
                }else{
                    $MENSAJE = "";
                    $SINO = "0";
                }

                if ($SINO == "0") {

                    $RECEPCIONMP->__SET('FECHA_RECEPCION', $_REQUEST['FECHARECEPCION']);
                    $RECEPCIONMP->__SET('HORA_RECEPCION', $_REQUEST['HORARECEPCIONE']);
                    $RECEPCIONMP->__SET('FECHA_GUIA_RECEPCION', $_REQUEST['FECHAGUIA']);
                    $RECEPCIONMP->__SET('NUMERO_GUIA_RECEPCION', $_REQUEST['NUMEROGUIA']);
                    $RECEPCIONMP->__SET('CANTIDAD_ENVASE_RECEPCION', $_REQUEST['CANTIDADENVASERECEPCION']);
                    $RECEPCIONMP->__SET('KILOS_NETO_RECEPCION', $_REQUEST['KILOSNETORECEPCION']);
                    $RECEPCIONMP->__SET('KILOS_BRUTO_RECEPCION', $_REQUEST['KILOSBRUTORECEPCION']);
                    $RECEPCIONMP->__SET('TOTAL_KILOS_GUIA_RECEPCION',  $_REQUEST['TOTALGUIAE']);
                    $RECEPCIONMP->__SET('PATENTE_CAMION', $_REQUEST['PATENTECAMIONE']);
                    $RECEPCIONMP->__SET('PATENTE_CARRO', $_REQUEST['PATENTECARROE']);
                    $RECEPCIONMP->__SET('OBSERVACION_RECEPCION', $_REQUEST['OBSERVACION']);
                    $RECEPCIONMP->__SET('TRECEPCION', $_REQUEST['TRECEPCIONE']);
                    if ($_REQUEST['TRECEPCIONE'] == "1") {
                        $RECEPCIONMP->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTORE']);
                    }
                    if ($_REQUEST['TRECEPCIONE'] == "2") {
                        $RECEPCIONMP->__SET('ID_PLANTA2', $_REQUEST['PLANTA2E']);
                    }
                    $RECEPCIONMP->__SET('ID_TRANSPORTE', $_REQUEST['TRANSPORTEE']);
                    $RECEPCIONMP->__SET('ID_CONDUCTOR', $_REQUEST['CONDUCTORE']);
                    $RECEPCIONMP->__SET('ID_USUARIOM', $IDUSUARIOS);
                    $RECEPCIONMP->__SET('ID_RECEPCION', $_REQUEST['IDP']);
                    //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                    $RECEPCIONMP_ADO->actualizarRecepcion($RECEPCIONMP);

                    $RECEPCIONMP->__SET('ID_RECEPCION', $_REQUEST['IDP']);
                    //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                    $RECEPCIONMP_ADO->cerrado($RECEPCIONMP);

                    $AUSUARIO_ADO->agregarAusuario2($NUMEROVER,1,3,"".$_SESSION["NOMBRE_USUARIO"].", Cerrar  Recepción Materia Prima.","fruta_recepcionmp", $_REQUEST['IDP'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

                    $ARRAYEXISENCIARECEPCION = $EXIMATERIAPRIMA_ADO->buscarPorRecepcionIngresado($_REQUEST['IDP']);
                    foreach ($ARRAYEXISENCIARECEPCION as $r) :
                        $EXIMATERIAPRIMA->__SET('ID_EXIMATERIAPRIMA', $r['ID_EXIMATERIAPRIMA']);
                    //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                    $EXIMATERIAPRIMA_ADO->vigente($EXIMATERIAPRIMA);
                    endforeach;

                    $ARRAYRECEPCIONE=$RECEPCIONE_ADO->listarRecepcionPorRecepcionMpCBX($_REQUEST['IDP']);
                    if(empty($ARRAYRECEPCIONE)){
                        $ARRAYNUMERO = $RECEPCIONE_ADO->obtenerNumero($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
                        $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;
                        //UTILIZACION METODOS SET DEL MODELO
                        //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
                        $RECEPCIONE->__SET('NUMERO_RECEPCION', $NUMERO);
                        $RECEPCIONE->__SET('FECHA_RECEPCION', $_REQUEST['FECHARECEPCION']);
                        $RECEPCIONE->__SET('NUMERO_DOCUMENTO_RECEPCION', $_REQUEST['NUMEROGUIA']);
                        $RECEPCIONE->__SET('PATENTE_CAMION', $_REQUEST['PATENTECAMIONE']);
                        $RECEPCIONE->__SET('PATENTE_CARRO', $_REQUEST['PATENTECARROE']);
                        $RECEPCIONE->__SET('OBSERVACIONES_RECEPCION', $_REQUEST['OBSERVACION']);
                        if ($_REQUEST['TRECEPCIONE'] == "1") {
                            $RECEPCIONE->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTORE']);
                            $TRECEPCIONE=2;
                        }
                        if ($_REQUEST['TRECEPCIONE'] == "2") {
                            $RECEPCIONE->__SET('ID_PLANTA2', $_REQUEST['PLANTA2E']);
                            $TRECEPCIONE=3;
                        }
                        $RECEPCIONE->__SET('TRECEPCION', $TRECEPCIONE);
                        $RECEPCIONE->__SET('ID_EMPRESA', $_REQUEST['EMPRESAE']);
                        $RECEPCIONE->__SET('ID_PLANTA', $_REQUEST['PLANTAE']);
                        $RECEPCIONE->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADAE']);
                        $RECEPCIONE->__SET('ID_TRANSPORTE', $_REQUEST['TRANSPORTEE']);
                        $RECEPCIONE->__SET('ID_CONDUCTOR', $_REQUEST['CONDUCTORE']);   
                        $RECEPCIONE->__SET('ID_BODEGA', $_REQUEST['BODEGA']);
                        $RECEPCIONE->__SET('ID_TDOCUMENTO', $_REQUEST['TDOCUMENTO']);
                        $RECEPCIONE->__SET('ID_RECEPCIONMP', $_REQUEST['IDP']);  
                        $RECEPCIONE->__SET('ID_USUARIOI', $IDUSUARIOS);
                        $RECEPCIONE->__SET('ID_USUARIOM', $IDUSUARIOS);
                        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                        $RECEPCIONE_ADO->agregarRecepcion($RECEPCIONE);
    
    
                        //OBTENER EL ID DE LA RECEPCIONE CREADA PARA LUEGO ENVIAR EL INGRESO DEL DETALLE
                        $ARRYAOBTENERID = $RECEPCIONE_ADO->buscarID(
                            $_REQUEST['FECHARECEPCION'],
                            $_REQUEST['OBSERVACION'],
                            $_REQUEST['EMPRESA'],
                            $_REQUEST['PLANTA'],
                            $_REQUEST['TEMPORADA'],
                        );                            

                        $AUSUARIO_ADO->agregarAusuario2($NUMERO,1,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Recepción Envases, Origen recepción materia prima.","material_recepcione", $ARRYAOBTENERIDE[0]['ID_RECEPCION'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

                        $ARRAYDRECEPCIONAGRUPADO = $DRECEPCIONMP_ADO->buscarPorRecepcionAgrupadoEstandarproducto($_REQUEST['IDP']);
                        foreach ($ARRAYDRECEPCIONAGRUPADO as $r ) {                            
                            $INVENTARIOE->__SET('TRECEPCION',  $_REQUEST['TRECEPCIONE']);
                            $INVENTARIOE->__SET('CANTIDAD_ENTRADA', $r["ENVASE"]);
                            $INVENTARIOE->__SET('VALOR_UNITARIO', 0);
                            $INVENTARIOE->__SET('ID_EMPRESA', $_REQUEST['EMPRESAE']);
                            $INVENTARIOE->__SET('ID_PLANTA', $_REQUEST['PLANTAE']);
                            $INVENTARIOE->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADAE']);
                            $INVENTARIOE->__SET('ID_BODEGA',  $_REQUEST['BODEGA']);
                            $INVENTARIOE->__SET('ID_PRODUCTO', $r["ID_PRODUCTO"]);
                            $INVENTARIOE->__SET('ID_TUMEDIDA', $r["ID_TUMEDIDA"]);
                            $INVENTARIOE->__SET('ID_RECEPCION', $ARRYAOBTENERID[0]["ID_RECEPCION"]);
                            $INVENTARIOE_ADO->agregarInventarioRecepcion($INVENTARIOE);
                        }                        

                        $AUSUARIO_ADO->agregarAusuario2("NULL",1,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de detalle de Recepción Envases, Origen recepción materia prima..","material_inventarioe", "NULL" ,$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

                        $ARRAYDRECEPCIONETOTALES = $INVENTARIOE_ADO->obtenerTotalesInventarioPorRecepcionCBX($ARRYAOBTENERID[0]["ID_RECEPCION"]);   
                        $RECEPCIONE->__SET('TOTAL_CANTIDAD_RECEPCION', $ARRAYDRECEPCIONETOTALES[0]["CANTIDAD"]);
                        $RECEPCIONE->__SET('ID_RECEPCION', $ARRYAOBTENERID[0]["ID_RECEPCION"]);
                        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                        $RECEPCIONE_ADO->cerrarActualizarcantidad($RECEPCIONE);

                    }else{
                        $RECEPCIONE->__SET('FECHA_RECEPCION', $_REQUEST['FECHARECEPCION']);
                        $RECEPCIONE->__SET('NUMERO_DOCUMENTO_RECEPCION', $_REQUEST['NUMEROGUIA']);
                        $RECEPCIONE->__SET('PATENTE_CAMION', $_REQUEST['PATENTECAMIONE']);
                        $RECEPCIONE->__SET('PATENTE_CARRO', $_REQUEST['PATENTECARROE']);
                        $RECEPCIONE->__SET('OBSERVACIONES_RECEPCION', $_REQUEST['OBSERVACION']);
                        if ($_REQUEST['TRECEPCIONE'] == "1") {
                            $RECEPCIONE->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTORE']);
                            $TRECEPCIONE=2;
                        }
                        if ($_REQUEST['TRECEPCIONE'] == "2") {
                            $RECEPCIONE->__SET('ID_PLANTA2', $_REQUEST['PLANTA2E']);
                            $TRECEPCIONE=3;
                        }
                        $RECEPCIONE->__SET('TRECEPCION', $TRECEPCIONE);
                        $RECEPCIONE->__SET('ID_TRANSPORTE', $_REQUEST['TRANSPORTEE']);
                        $RECEPCIONE->__SET('ID_CONDUCTOR', $_REQUEST['CONDUCTORE']);  
                        $RECEPCIONE->__SET('ID_BODEGA', $_REQUEST['BODEGA']);
                        $RECEPCIONE->__SET('ID_TDOCUMENTO', $_REQUEST['TDOCUMENTO']);
                        $RECEPCIONE->__SET('ID_USUARIOM', $IDUSUARIOS);
                        $RECEPCIONE->__SET('ID_RECEPCION', $ARRAYRECEPCIONE[0]["ID_RECEPCION"]);
                        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                        $RECEPCIONE_ADO->actualizarRecepcionMateriaPrima($RECEPCIONE);    
                        
                        $AUSUARIO_ADO->agregarAusuario2($ARRAYRECEPCIONE[0]["NUMERO_RECEPCION"],1,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de Recepción Envases, Origen recepción materia prima.","material_recepcione", $ARRAYRECEPCIONE[0]["ID_RECEPCION"],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  
                        
                        $ARRAYINVENTARIOE=$INVENTARIOE_ADO->buscarPorRecepcion($ARRAYRECEPCIONE[0]["ID_RECEPCION"]);
                        if(empty($ARRAYINVENTARIOE)){
                            $ARRAYDRECEPCIONAGRUPADO = $DRECEPCIONMP_ADO->buscarPorRecepcionAgrupadoEstandarproducto($_REQUEST['IDP']);
                            foreach ($ARRAYDRECEPCIONAGRUPADO as $r ) {                            
                                $INVENTARIOE->__SET('TRECEPCION',  $_REQUEST['TRECEPCIONE']);
                                $INVENTARIOE->__SET('CANTIDAD_ENTRADA', $r["ENVASE"]);
                                $INVENTARIOE->__SET('VALOR_UNITARIO', 0);
                                $INVENTARIOE->__SET('ID_EMPRESA', $ARRAYRECEPCIONE[0]["ID_EMPRESA"]);
                                $INVENTARIOE->__SET('ID_PLANTA', $ARRAYRECEPCIONE[0]["ID_PLANTA"]);
                                $INVENTARIOE->__SET('ID_TEMPORADA', $ARRAYRECEPCIONE[0]["ID_TEMPORADA"]);
                                $INVENTARIOE->__SET('ID_BODEGA',  $_REQUEST['BODEGA']);
                                $INVENTARIOE->__SET('ID_PRODUCTO', $r["ID_PRODUCTO"]);
                                $INVENTARIOE->__SET('ID_TUMEDIDA', $r["ID_TUMEDIDA"]);
                                $INVENTARIOE->__SET('ID_RECEPCION', $ARRAYRECEPCIONE[0]["ID_RECEPCION"]);
                                $INVENTARIOE_ADO->agregarInventarioRecepcion($INVENTARIOE);
                            }  
                        }                        
                        
                        $AUSUARIO_ADO->agregarAusuario2("NULL",1,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de detalle de Recepción Envases, Origen recepción materia prima..","material_inventarioe", "NULL" ,$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

                        $ARRAYDRECEPCIONETOTALES = $INVENTARIOE_ADO->obtenerTotalesInventarioPorRecepcionCBX($ARRAYRECEPCIONE[0]["ID_RECEPCION"]);   
                        $RECEPCIONE->__SET('TOTAL_CANTIDAD_RECEPCION', $ARRAYDRECEPCIONETOTALES[0]["CANTIDAD"]);
                        $RECEPCIONE->__SET('ID_RECEPCION', $ARRAYRECEPCIONE[0]["ID_RECEPCION"]);
                        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                        $RECEPCIONE_ADO->cerrarActualizarcantidad($RECEPCIONE);

                    }
                    
                        //REDIRECCIONAR A PAGINA registroRecepcionmp.php
                        //SEGUNE EL TIPO DE OPERACIONS QUE SE INDENTIFIQUE EN LA URL
                        if ($_GET["a"] == "crear") {
                            $id_dato = $_REQUEST['IDP'];
                            $accion_dato = "ver";
                            echo '<script>
                                Swal.fire({
                                    icon:"info",
                                    title:"Registro Cerrado",
                                    text:"Este recepcion se encuentra cerrada y no puede ser modificada.",
                                    showConfirmButton: true,
                                    confirmButtonText:"Cerrar",
                                    closeOnConfirm:false
                                }).then((result)=>{
                                    location.href = "registroRecepcionmp.php?op&id='.$id_dato.'&a='.$accion_dato.'";                                    
                                })
                            </script>';
                        }
                        if ($_GET["a"] == "editar") {
                            $id_dato = $_REQUEST['IDP'];
                            $accion_dato = "ver";
                            echo '<script>
                                Swal.fire({
                                    icon:"info",
                                    title:"Registro Cerrado",
                                    text:"Este recepcion se encuentra cerrada y no puede ser modificada.",
                                    showConfirmButton: true,
                                    confirmButtonText:"Cerrar",
                                    closeOnConfirm:false
                                }).then((result)=>{
                                    location.href = "registroRecepcionmp.php?op&id='.$id_dato.'&a='.$accion_dato.'";                                    
                                })
                            </script>';
                        }                    
                }
            }

            ?>
</body>

</html>