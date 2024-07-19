<?php

include_once "../../assest/config/validarUsuarioFruta.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/VESPECIES_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/ERECEPCION_ADO.php';

include_once '../../assest/controlador/TMANEJO_ADO.php';
include_once '../../assest/controlador/TCALIBRE_ADO.php';
include_once '../../assest/controlador/TEMBALAJE_ADO.php';

include_once '../../assest/controlador/TDOCUMENTO_ADO.php';
include_once '../../assest/controlador/BODEGA_ADO.php';
include_once '../../assest/controlador/COMPRADOR_ADO.php';

include_once '../../assest/controlador/CONDUCTOR_ADO.php';
include_once '../../assest/controlador/TRANSPORTE_ADO.php';
include_once '../../assest/controlador/EXIMATERIAPRIMA_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';

include_once '../../assest/controlador/DESPACHOMP_ADO.php';
include_once '../../assest/controlador/EXIMATERIAPRIMA_ADO.php';


include_once '../../assest/controlador/INVENTARIOE_ADO.php';
include_once '../../assest/controlador/DESPACHOE_ADO.php';

include_once "../../assest/modelo/INVENTARIOE.php";
include_once "../../assest/modelo/DESPACHOE.php";


include_once '../../assest/modelo/DESPACHOMP.php';
include_once '../../assest/modelo/EXIMATERIAPRIMA.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$TMANEJO_ADO =  new TMANEJO_ADO();
$TCALIBRE_ADO =  new TCALIBRE_ADO();
$TEMBALAJE_ADO =  new TEMBALAJE_ADO();

$TDOCUMENTO_ADO = new TDOCUMENTO_ADO();
$BODEGA_ADO = new BODEGA_ADO();
$COMPRADOR_ADO = new COMPRADOR_ADO();

$VESPECIES_ADO =  new VESPECIES_ADO();
$PRODUCTOR_ADO = new PRODUCTOR_ADO();
$ERECEPCION_ADO =  new ERECEPCION_ADO();

$TRANSPORTE_ADO =  new TRANSPORTE_ADO();
$CONDUCTOR_ADO =  new CONDUCTOR_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();


$DESPACHOMP_ADO =  new DESPACHOMP_ADO();
$EXIMATERIAPRIMA_ADO =  new EXIMATERIAPRIMA_ADO();


$INVENTARIOE_ADO = new INVENTARIOE_ADO();
$DESPACHOE_ADO = new DESPACHOE_ADO();

//INIICIALIZAR MODELO EXIMATERIAPRIMA
$DESPACHOMP =  new DESPACHOMP();
$EXIMATERIAPRIMA =  new EXIMATERIAPRIMA();

$INVENTARIOE = new INVENTARIOE();
$DESPACHOE = new DESPACHOE();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$NUMERO = "";
$NUMEROVER = "";
$IDDESPACHOMP = "";
$FECHAINGRESODESPACHO = "";
$FECHAMODIFCIACIONDESPACHO = "";
$FECHADESPACHO = "";

$NUMEROGUIADESPACHO = "";
$PATENTECARRO = "";
$PATENTEVEHICULO = "";
$OBSERVACIONDESPACHO = "";
$NUMEROSELLODESPACHO = "";
$REGALO = "";
$CONDUCTOR = "";
$TRANSPORTE = "";
$PLANTADESTINO = "";
$PLANTAEXTERNA = "";
$TDESPACHO = "";
$COMPRADOR = "";
$PRODUCTOR = "";
$ESTADO = "";
$PRECIOPALLET = "";
$VGM = "";

$TOTALBRUTO = 0;
$TOTALNETO = 0;
$TOTALENVASE = 0;
$TOTALPRECIO = 0;

$TOTALBRUTOV = 0;
$TOTALNETOV = 0;
$TOTALENVASEV = 0;
$TOTALPRECIOV = 0;

$IDEMPRESA = "";
$IDPLANTA = "";
$IDTEMPORADA = "";
$TDOCUMENTO="";
$BODEGAD="";
$BODEGA="";
$COMPRADOR="";

$IDOP = "";
$OP = "";
$TDESPACHOE;

$DISABLED = "";
$DISABLED2 = "";
$DISABLED3 = "";
$DISABLEDSTYLE = "";
$DISABLEENVASED="";
$DISABLEENVASEO="";

$MENSAJE = "";
$MENSAJE2 = "";
$MENSAJE3 = "";
$MENSAJEVALIDATO = "";
$MENSAJEENVASED="";
$MENSAJEENVASEO="";
$SINO = "";
$SINOPRECIO = "";
$DISABLEDFOLIO = "";
$MENSAJEPRECIO = "";


$IDQUITAR = "";
$FOLIOEXIMATERIAPRIMAQUITAR = "";

$IDEXIMATERIAPRIMAPRECIO = "";
$FOLIOEXIMATERIAPRIMAPRECIO = "";
$IDDESPACHO = "";
$IDPRECIO = "";
$CONTADOR = 0;
$PRECIO = "";

//INICIALIZAR ARREGLOS

$ARRAYEMPRESA = "";
$ARRAYPLANTA = "";
$ARRAYTEMPORADA = "";


$ARRAYCONDUCTOR = "";
$ARRAYTRANSPORTITA = "";
$ARRAYPLANTADESTINO = "";
$ARRAYTDESPACHO = "";
$ARRAYPRODUCTOR = "";
$ARRAYCOMPRADOR = "";
$ARRAYPLANTADESTINO = "";
$ARRAYPLANTAEXTERNA = "";


$ARRAYTOMADO = "";
$ARRAYDESPACHOTOMADO = "";
$ARRAYNUMERO = "";
$ARRAYFECHAACTUAL = "";
$ARRAYDESPACHOTOTAL = "";
$ARRAYDESPACHOTOTAL2 = "";
$ARRAYIDEXIMATERIAPRIMAPRECIO = "";
$ARRAYFOLIOEXIMATERIAPRIMAPRECIO = "";
$ARRAYIDPRECIO = "";
$ARRAYIDDESPACHO = "";
$ARRAYCONTEO = "";

$ARRAYDESPACHOE = "";
$ARRAYTOMADOAGRUPADO="";
$ARRAYBODEGAENVASESD="";
$ARRAYBODEGAENVASESO="";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES

$ARRAYCONDUCTOR = $CONDUCTOR_ADO->listarConductorPorEmpresaCBX($EMPRESAS);
$ARRAYTRANSPORTITA = $TRANSPORTE_ADO->listarTransportePorEmpresaCBX($EMPRESAS);

$ARRAYPRODUCTOR = $PRODUCTOR_ADO->listarProductorPorEmpresaCBX($EMPRESAS);
$ARRAYCOMPRADOR = $COMPRADOR_ADO->listarCompradorPorEmpresaCBX($EMPRESAS);

$ARRAYTDOCUMENTO = $TDOCUMENTO_ADO->listarTdocumentoPorEmpresaCBX($EMPRESAS);

$ARRAYEMPRESA = $EMPRESA_ADO->listarEmpresaCBX();
$ARRAYPLANTA = $PLANTA_ADO->listarPlantaCBX();
$ARRAYTEMPORADA = $TEMPORADA_ADO->listarTemporadaCBX();


$ARRAYFECHAACTUAL = $DESPACHOMP_ADO->obtenerFecha();
$FECHADESPACHO = $ARRAYFECHAACTUAL[0]['FECHA'];

include_once "../../assest/config/validarDatosUrl.php";
include_once "../../assest/config/datosUrlD.php";


$ARRAYBODEGAENVASESO = $BODEGA_ADO->listarBodegaPorEmpresaPlantaEnvasesCBX($EMPRESAS, $PLANTAS);
if(empty($ARRAYBODEGAENVASESO)){
    $DISABLEENVASEO = "disabled";
    $MENSAJEENVASE = " NECESITA <b> TEBER UNA BODEGA DE ENVASES</b> , PARA OCUPAR LA <b> FUNCIONALIDAD </b>. FAVOR DE <b> CONTACTARSE CON EL ADMINISTRADOR </b>";
}else{
    $BODEGA=$ARRAYBODEGAENVASESO[0]["ID_BODEGA"];
}

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


//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION , VISUALIZACION Y CREACION
if (isset($id_dato) && isset($accion_dato)) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $id_dato;
    $OP = $accion_dato;


    $ARRAYTOMADO = $EXIMATERIAPRIMA_ADO->buscarPorDespacho2($IDOP);

    $ARRAYDESPACHOTOTAL = $EXIMATERIAPRIMA_ADO->obtenerTotalesDespacho($IDOP);
    $ARRAYDESPACHOTOTAL2 = $EXIMATERIAPRIMA_ADO->obtenerTotalesDespacho2($IDOP);

    $ARRAYDESPACHOE=$DESPACHOE_ADO->listarDespachoePorDespachoMPCBX($IDOP);
    if($ARRAYDESPACHOE){
        $TDOCUMENTO=$ARRAYDESPACHOE[0]["ID_TDOCUMENTO"];
        $COMPRADOR=$ARRAYDESPACHOE[0]["ID_COMPRADOR"];
        $BODEGAD=$ARRAYDESPACHOE[0]["ID_BODEGA2"];
        $BODEGA=$ARRAYDESPACHOE[0]["ID_BODEGAO"];

    }

    $TOTALENVASEV = $ARRAYDESPACHOTOTAL2[0]['ENVASE'];
    $TOTALNETOV = $ARRAYDESPACHOTOTAL2[0]['NETO'];
    $TOTALBRUTOV = $ARRAYDESPACHOTOTAL2[0]['BRUTO'];

    $TOTALENVASE = $ARRAYDESPACHOTOTAL[0]['ENVASE'];
    $TOTALNETO = $ARRAYDESPACHOTOTAL[0]['NETO'];
    $TOTALBRUTO = $ARRAYDESPACHOTOTAL[0]['BRUTO'];

    //FUNCION PARA LA OBTENCION DE LOS TOTALES DEL DETALLE ASOCIADO A DESPACHOMP

    //IDENTIFICACIONES DE OPERACIONES
    //crear =  OBTENCION DE DATOS INICIALES PARA PODER CREAR LA DESPACHOMP
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
        $ARRAYDESPACHOMP = $DESPACHOMP_ADO->verDespachomp($IDOP);
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYDESPACHOMP as $r) :
            $IDDESPACHOMP = $IDOP;
            $FECHADESPACHO = "" . $r['FECHA_DESPACHO'];
            $NUMEROVER = "" . $r['NUMERO_DESPACHO'];
            $NUMEROGUIADESPACHO = "" . $r['NUMERO_GUIA_DESPACHO'];
            $PATENTEVEHICULO = "" . $r['PATENTE_CAMION'];
            $PATENTECARRO = "" . $r['PATENTE_CARRO'];
            $OBSERVACIONDESPACHO = "" . $r['OBSERVACION_DESPACHO'];
            $CONDUCTOR = "" . $r['ID_CONDUCTOR'];
            $TRANSPORTE = "" . $r['ID_TRANSPORTE'];
            $TDESPACHO = "" . $r['TDESPACHO'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $ARRAYPLANTADESTINO = $PLANTA_ADO->listarPlantaPropiaDistintaActualCBX($PLANTA);
            $ARRAYPLANTAEXTERNA = $PLANTA_ADO->listarPlantaExternaCBX();
            $ESTADO = "" . $r['ESTADO'];
            $FECHAINGRESODESPACHO = "" . $r['INGRESO'];
            $FECHAMODIFCIACIONDESPACHO = "" . $r['MODIFICACION'];

            if ($TDESPACHO == "1") {
                $PLANTADESTINO = "" . $r['ID_PLANTA2'];           
                $ARRAYBODEGAENVASESD=$BODEGA_ADO->listarBodegaPorEmpresaPlantaEnvasesCBX($EMPRESAS, $PLANTADESTINO);
                if (empty($ARRAYBODEGAENVASESD)) {
                    $DISABLEENVASED = "disabled";
                    $MENSAJEENVASED = " NECESITA <b> TENER UNA BODEGA DE ENVASES EN LA PLANTA DESTINO</b> , PARA OCUPAR LA <b> FUNCIONALIDAD </b>. FAVOR DE <b> CONTACTARSE CON EL ADMINISTRADOR </b>";
                }else{
                    $BODEGAD=$ARRAYBODEGAENVASESD[0]["ID_BODEGA"];
                }
            }
            if ($TDESPACHO == "2") {
                $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            }
            if ($TDESPACHO == "3") {
                $COMPRADOR = "" . $r['ID_COMPRADOR'];
            }
            if ($TDESPACHO == "4") {
                $REGALO = "" . $r['REGALO_DESPACHO'];
            }
            if ($TDESPACHO == "5") {
                $PLANTAEXTERNA = "" . $r['ID_PLANTA3'];
            }
            if ($TDESPACHO == "6") {
                $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            }


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
        $ARRAYDESPACHOMP = $DESPACHOMP_ADO->verDespachomp($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYDESPACHOMP as $r) :
            $IDDESPACHOMP = $IDOP;
            $FECHADESPACHO = "" . $r['FECHA_DESPACHO'];
            $NUMEROVER = "" . $r['NUMERO_DESPACHO'];
            $NUMEROGUIADESPACHO = "" . $r['NUMERO_GUIA_DESPACHO'];
            $PATENTEVEHICULO = "" . $r['PATENTE_CAMION'];
            $PATENTECARRO = "" . $r['PATENTE_CARRO'];
            $OBSERVACIONDESPACHO = "" . $r['OBSERVACION_DESPACHO'];
            $CONDUCTOR = "" . $r['ID_CONDUCTOR'];
            $TRANSPORTE = "" . $r['ID_TRANSPORTE'];
            $TDESPACHO = "" . $r['TDESPACHO'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $ARRAYPLANTADESTINO = $PLANTA_ADO->listarPlantaPropiaDistintaActualCBX($PLANTA);
            $ARRAYPLANTAEXTERNA = $PLANTA_ADO->listarPlantaExternaCBX();
            $ESTADO = "" . $r['ESTADO'];
            $FECHAINGRESODESPACHO = "" . $r['INGRESO'];
            $FECHAMODIFCIACIONDESPACHO = "" . $r['MODIFICACION'];
            if ($TDESPACHO == "1") {
                $PLANTADESTINO = "" . $r['ID_PLANTA2'];   
                $ARRAYBODEGAENVASESD=$BODEGA_ADO->listarBodegaPorEmpresaPlantaEnvasesCBX($EMPRESAS, $PLANTADESTINO);
                if (empty($ARRAYBODEGAENVASESD)) {
                    $DISABLEENVASED = "disabled";
                    $MENSAJEENVASED = " NECESITA <b> TENER UNA BODEGA DE ENVASES EN LA PLANTA DESTINO</b> , PARA OCUPAR LA <b> FUNCIONALIDAD </b>. FAVOR DE <b> CONTACTARSE CON EL ADMINISTRADOR </b>";
                }else{
                    $BODEGAD=$ARRAYBODEGAENVASESD[0]["ID_BODEGA"];
                }
            }
            if ($TDESPACHO == "2") {
                $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            }
            if ($TDESPACHO == "3") {
                $COMPRADOR = "" . $r['ID_COMPRADOR'];
            }
            if ($TDESPACHO == "4") {
                $REGALO = "" . $r['REGALO_DESPACHO'];
            }
            if ($TDESPACHO == "5") {
                $PLANTAEXTERNA = "" . $r['ID_PLANTA3'];
            }
            if ($TDESPACHO == "6") {
                $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            }


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
        $ARRAYDESPACHOMP = $DESPACHOMP_ADO->verDespachomp($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYDESPACHOMP as $r) :
            $IDDESPACHOMP = $IDOP;
            $FECHADESPACHO = "" . $r['FECHA_DESPACHO'];
            $NUMEROVER = "" . $r['NUMERO_DESPACHO'];
            $NUMEROGUIADESPACHO = "" . $r['NUMERO_GUIA_DESPACHO'];
            $PATENTEVEHICULO = "" . $r['PATENTE_CAMION'];
            $PATENTECARRO = "" . $r['PATENTE_CARRO'];
            $OBSERVACIONDESPACHO = "" . $r['OBSERVACION_DESPACHO'];
            $CONDUCTOR = "" . $r['ID_CONDUCTOR'];
            $TRANSPORTE = "" . $r['ID_TRANSPORTE'];
            $TDESPACHO = "" . $r['TDESPACHO'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $ARRAYPLANTADESTINO = $PLANTA_ADO->listarPlantaPropiaDistintaActualCBX($PLANTA);
            $ARRAYPLANTAEXTERNA = $PLANTA_ADO->listarPlantaExternaCBX();
            $ESTADO = "" . $r['ESTADO'];
            $FECHAINGRESODESPACHO = "" . $r['INGRESO'];
            $FECHAMODIFCIACIONDESPACHO = "" . $r['MODIFICACION'];
            if ($TDESPACHO == "1") {
                $PLANTADESTINO = "" . $r['ID_PLANTA2'];   
                $ARRAYBODEGAENVASESD=$BODEGA_ADO->listarBodegaPorEmpresaPlantaEnvasesCBX($EMPRESAS, $PLANTADESTINO);
                if (empty($ARRAYBODEGAENVASESD)) {
                    $DISABLEENVASED = "disabled";
                    $MENSAJEENVASED = " NECESITA <b> TENER UNA BODEGA DE ENVASES EN LA PLANTA DESTINO</b> , PARA OCUPAR LA <b> FUNCIONALIDAD </b>. FAVOR DE <b> CONTACTARSE CON EL ADMINISTRADOR </b>";
                }else{
                    $BODEGAD=$ARRAYBODEGAENVASESD[0]["ID_BODEGA"];
                }
            }
            if ($TDESPACHO == "2") {
                $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            }
            if ($TDESPACHO == "3") {
                $COMPRADOR = "" . $r['ID_COMPRADOR'];
            }
            if ($TDESPACHO == "4") {
                $REGALO = "" . $r['REGALO_DESPACHO'];
            }
            if ($TDESPACHO == "5") {
                $PLANTAEXTERNA = "" . $r['ID_PLANTA3'];
            }
            if ($TDESPACHO == "6") {
                $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            }
        endforeach;
    }
}
//PROCESO PARA OBTENER LOS DATOS DEL FORMULARIO  Y MANTENERLO AL ACTUALIZACION QUE REALIZA EL SELECT DE CONDUCTOR
if (isset($_POST)) {

    if (isset($_REQUEST['FECHAINGRESODESPACHO'])) {

        $FECHAINGRESODESPACHO = "" . $_REQUEST['FECHAINGRESODESPACHO'];
    }
    if (isset($_REQUEST['FECHAMODIFCIACIONDESPACHO'])) {

        $FECHAMODIFCIACIONDESPACHO = "" . $_REQUEST['FECHAMODIFCIACIONDESPACHO'];
    }
    if (isset($_REQUEST['FECHADESPACHO'])) {

        $FECHADESPACHO = "" . $_REQUEST['FECHADESPACHO'];
    }

    if (isset($_REQUEST['NUMEROGUIADESPACHO'])) {

        $NUMEROGUIADESPACHO = "" . $_REQUEST['NUMEROGUIADESPACHO'];
    }
    if (isset($_REQUEST['PATENTECARRO'])) {

        $PATENTECARRO = "" . $_REQUEST['PATENTECARRO'];
    }
    if (isset($_REQUEST['PATENTEVEHICULO'])) {

        $PATENTEVEHICULO = "" . $_REQUEST['PATENTEVEHICULO'];
    }
    if (isset($_REQUEST['OBSERVACIONDESPACHOMP'])) {

        $OBSERVACIONDESPACHOMP = "" . $_REQUEST['OBSERVACIONDESPACHOMP'];
    }

    if (isset($_REQUEST['NUMEROSELLODESPACHO'])) {

        $NUMEROSELLODESPACHO = "" . $_REQUEST['NUMEROSELLODESPACHO'];
    }


    if (isset($_REQUEST['CONDUCTOR'])) {

        $CONDUCTOR = "" . $_REQUEST['CONDUCTOR'];
    }
    if (isset($_REQUEST['TRANSPORTE'])) {

        $TRANSPORTE = "" . $_REQUEST['TRANSPORTE'];
    }
    if (isset($_REQUEST['VGM'])) {

        $VGM = "" . $_REQUEST['VGM'];
    }
    if (isset($_REQUEST['TDESPACHO'])) {

        $TDESPACHO = "" . $_REQUEST['TDESPACHO'];
        $ARRAYPLANTADESTINO = $PLANTA_ADO->listarPlantaPropiaDistintaActualCBX($_REQUEST['PLANTA']);
        $ARRAYPLANTAEXTERNA = $PLANTA_ADO->listarPlantaExternaCBX();
        if ($TDESPACHO == "1") {
            if (isset($_REQUEST['PLANTADESTINO'])) {
                $PLANTADESTINO = "" . $_REQUEST['PLANTADESTINO'];                
                $ARRAYBODEGAENVASESD=$BODEGA_ADO->listarBodegaPorEmpresaPlantaEnvasesCBX($EMPRESAS, $PLANTADESTINO);
                if (empty($ARRAYBODEGAENVASESD)) {
                    $DISABLEENVASED = "disabled";
                    $MENSAJEENVASED = " NECESITA <b> TENER UNA BODEGA DE ENVASES EN LA PLANTA DESTINO</b> , PARA OCUPAR LA <b> FUNCIONALIDAD </b>. FAVOR DE <b> CONTACTARSE CON EL ADMINISTRADOR </b>";
                }else{
                    $BODEGAD=$ARRAYBODEGAENVASESD[0]["ID_BODEGA"];                    
                }
            }
        }
        if ($TDESPACHO == "2") {

            if (isset($_REQUEST['PRODUCTOR'])) {
                $PRODUCTOR = "" . $_REQUEST['PRODUCTOR'];
            }
        }
        if ($TDESPACHO == "3") {
            if (isset($_REQUEST['COMPRADOR'])) {
                $COMPRADOR = "" . $_REQUEST['COMPRADOR'];
            }
        }
        if ($TDESPACHO == "4") {
            if (isset($_REQUEST['REGALO'])) {
                $REGALO = "" . $_REQUEST['REGALO'];
            }
        }
        if ($TDESPACHO == "5") {
            if (isset($_REQUEST['PLANTAEXTERNA'])) {
                $PLANTAEXTERNA = "" . $_REQUEST['PLANTAEXTERNA'];
            }
        }
    }


    if (isset($_REQUEST['TDOCUMENTO'])) {
        $TDOCUMENTO = "" . $_REQUEST['TDOCUMENTO'];
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
}

?>




<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Despacho</title>
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

                    FECHADESPACHO = document.getElementById("FECHADESPACHO").value;
                    TDESPACHO = document.getElementById("TDESPACHO").selectedIndex;
                    TRANSPORTE = document.getElementById("TRANSPORTE").selectedIndex;
                    CONDUCTOR = document.getElementById("CONDUCTOR").selectedIndex;

                    PATENTEVEHICULO = document.getElementById("PATENTEVEHICULO").value;
                    PATENTECARRO = document.getElementById("PATENTECARRO").value;
                    //OBSERVACIONDESPACHOMP = document.getElementById("OBSERVACIONDESPACHOMP").value;
                    TDOCUMENTO = document.getElementById("TDOCUMENTO").selectedIndex;


                    document.getElementById('val_fecha').innerHTML = "";
                    document.getElementById('val_tdespacho').innerHTML = "";
                    document.getElementById('val_transportita').innerHTML = "";
                    document.getElementById('val_conductor').innerHTML = "";
                    document.getElementById('val_patentevehiculo').innerHTML = "";
                    document.getElementById('val_patentecarro').innerHTML = "";
                    //  document.getElementById('val_observacion').innerHTML = "";
                    document.getElementById('val_tdocumento').innerHTML = "";

                    if (FECHADESPACHO == null || FECHADESPACHO.length == 0 || /^\s+$/.test(FECHADESPACHO)) {
                        document.form_reg_dato.FECHADESPACHO.focus();
                        document.form_reg_dato.FECHADESPACHO.style.borderColor = "#FF0000";
                        document.getElementById('val_fecha').innerHTML = "NO A INGRESADO DATO";
                        return false
                    }
                    document.form_reg_dato.FECHADESPACHO.style.borderColor = "#4AF575";



                    if (TDESPACHO == null || TDESPACHO == 0) {
                        document.form_reg_dato.TDESPACHO.focus();
                        document.form_reg_dato.TDESPACHO.style.borderColor = "#FF0000";
                        document.getElementById('val_tdespacho').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false
                    }
                    document.form_reg_dato.TDESPACHO.style.borderColor = "#4AF575";

                    
                    if (TDESPACHO == 1) {
                        NUMEROGUIADESPACHO = document.getElementById("NUMEROGUIADESPACHO").value;
                        document.getElementById('val_numeroguia').innerHTML = "";
                        if (NUMEROGUIADESPACHO == null || NUMEROGUIADESPACHO.length == 0 || /^\s+$/.test(NUMEROGUIADESPACHO)) {
                            document.form_reg_dato.NUMEROGUIADESPACHO.focus();
                            document.form_reg_dato.NUMEROGUIADESPACHO.style.borderColor = "#FF0000";
                            document.getElementById('val_numeroguia').innerHTML = "NO A INGRESADO DATO";
                            return false
                        }
                        document.form_reg_dato.NUMEROGUIADESPACHO.style.borderColor = "#4AF575";
                    
                    }

                    if (TDESPACHO == 2) {
                        NUMEROGUIADESPACHO = document.getElementById("NUMEROGUIADESPACHO").value;
                        document.getElementById('val_numeroguia').innerHTML = "";
                        if (NUMEROGUIADESPACHO == null || NUMEROGUIADESPACHO.length == 0 || /^\s+$/.test(NUMEROGUIADESPACHO)) {
                            document.form_reg_dato.NUMEROGUIADESPACHO.focus();
                            document.form_reg_dato.NUMEROGUIADESPACHO.style.borderColor = "#FF0000";
                            document.getElementById('val_numeroguia').innerHTML = "NO A INGRESADO DATO";
                            return false
                        }
                        document.form_reg_dato.NUMEROGUIADESPACHO.style.borderColor = "#4AF575";
                        
                    }
                    
                    if (TDESPACHO == 3) {
                        NUMEROGUIADESPACHO = document.getElementById("NUMEROGUIADESPACHO").value;
                        document.getElementById('val_numeroguia').innerHTML = "";
                        if (NUMEROGUIADESPACHO == null || NUMEROGUIADESPACHO.length == 0 || /^\s+$/.test(NUMEROGUIADESPACHO)) {
                            document.form_reg_dato.NUMEROGUIADESPACHO.focus();
                            document.form_reg_dato.NUMEROGUIADESPACHO.style.borderColor = "#FF0000";
                            document.getElementById('val_numeroguia').innerHTML = "NO A INGRESADO DATO";
                            return false
                        }
                        document.form_reg_dato.NUMEROGUIADESPACHO.style.borderColor = "#4AF575";
                        
                    }
                    
                    if (TDESPACHO == 4) {
                        
                    }
                    
                    if (TDESPACHO == 5) {
                        NUMEROGUIADESPACHO = document.getElementById("NUMEROGUIADESPACHO").value;
                        document.getElementById('val_numeroguia').innerHTML = "";
                        if (NUMEROGUIADESPACHO == null || NUMEROGUIADESPACHO.length == 0 || /^\s+$/.test(NUMEROGUIADESPACHO)) {
                            document.form_reg_dato.NUMEROGUIADESPACHO.focus();
                            document.form_reg_dato.NUMEROGUIADESPACHO.style.borderColor = "#FF0000";
                            document.getElementById('val_numeroguia').innerHTML = "NO A INGRESADO DATO";
                            return false
                        }
                        document.form_reg_dato.NUMEROGUIADESPACHO.style.borderColor = "#4AF575";                        
                    }

                    if (TDESPACHO == 6) {
                        NUMEROGUIADESPACHO = document.getElementById("NUMEROGUIADESPACHO").value;
                        document.getElementById('val_numeroguia').innerHTML = "";
                        if (NUMEROGUIADESPACHO == null || NUMEROGUIADESPACHO.length == 0 || /^\s+$/.test(NUMEROGUIADESPACHO)) {
                            document.form_reg_dato.NUMEROGUIADESPACHO.focus();
                            document.form_reg_dato.NUMEROGUIADESPACHO.style.borderColor = "#FF0000";
                            document.getElementById('val_numeroguia').innerHTML = "NO A INGRESADO DATO";
                            return false
                        }
                        document.form_reg_dato.NUMEROGUIADESPACHO.style.borderColor = "#4AF575";                        
                    }
                    if (TRANSPORTE == null || TRANSPORTE == 0) {
                        document.form_reg_dato.TRANSPORTE.focus();
                        document.form_reg_dato.TRANSPORTE.style.borderColor = "#FF0000";
                        document.getElementById('val_transportita').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
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

                    if (PATENTEVEHICULO == null || PATENTEVEHICULO.length == 0 || /^\s+$/.test(PATENTEVEHICULO)) {
                        document.form_reg_dato.PATENTEVEHICULO.focus();
                        document.form_reg_dato.PATENTEVEHICULO.style.borderColor = "#FF0000";
                        document.getElementById('val_patentevehiculo').innerHTML = "NO A INGRESADO DATO";
                        return false
                    }
                    document.form_reg_dato.FECHADESPACHO.style.borderColor = "#4AF575";

                    /*
                    if (PATENTECARRO == null || PATENTECARRO.length == 0 || /^\s+$/.test(PATENTECARRO)) {
                        document.form_reg_dato.PATENTECARRO.focus();
                        document.form_reg_dato.PATENTECARRO.style.borderColor = "#FF0000";
                        document.getElementById('val_patentecarro').innerHTML = "NO A INGRESADO DATO";
                        return false
                    }
                    document.form_reg_dato.PATENTECARRO.style.borderColor = "#4AF575";
¨*/


                    if (TDESPACHO == 1) {

                        PLANTADESTINO = document.getElementById("PLANTADESTINO").selectedIndex;
                        document.getElementById('val_plantad').innerHTML = "";

                        if (PLANTADESTINO == null || PLANTADESTINO == 0) {
                            document.form_reg_dato.PLANTADESTINO.focus();
                            document.form_reg_dato.PLANTADESTINO.style.borderColor = "#FF0000";
                            document.getElementById('val_plantad').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                            return false
                        }
                        document.form_reg_dato.PLANTADESTINO.style.borderColor = "#4AF575";

                    }


                    if (TDESPACHO == 2) {

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

                    if (TDESPACHO == 3) {

                        COMPRADOR = document.getElementById("COMPRADOR").selectedIndex;
                        document.getElementById('val_comprador').innerHTML = "";

                        if (COMPRADOR == null || COMPRADOR == 0) {
                            document.form_reg_dato.COMPRADOR.focus();
                            document.form_reg_dato.COMPRADOR.style.borderColor = "#FF0000";
                            document.getElementById('val_comprador').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                            return false
                        }
                        document.form_reg_dato.COMPRADOR.style.borderColor = "#4AF575";


                    }

                    if (TDESPACHO == 4) {

                        REGALO = document.getElementById("REGALO").value;
                        document.getElementById('val_regalo').innerHTML = "";
                        if (REGALO == null || REGALO == 0) {
                            document.form_reg_dato.REGALO.focus();
                            document.form_reg_dato.REGALO.style.borderColor = "#FF0000";
                            document.getElementById('val_regalo').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                            return false
                        }
                        document.form_reg_dato.REGALO.style.borderColor = "#4AF575";

                    }

                    if (TDESPACHO == 5) {

                        PLANTAEXTERNA = document.getElementById("PLANTAEXTERNA").selectedIndex;
                        document.getElementById('val_plantae').innerHTML = "";

                        if (PLANTAEXTERNA == null || PLANTAEXTERNA == 0) {
                            document.form_reg_dato.PLANTAEXTERNA.focus();
                            document.form_reg_dato.PLANTAEXTERNA.style.borderColor = "#FF0000";
                            document.getElementById('val_plantae').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                            return false
                        }
                        document.form_reg_dato.PLANTAEXTERNA.style.borderColor = "#4AF575";

                    }
                    if (TDESPACHO == 6) {

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

                    /*
                    if (OBSERVACIONDESPACHOMP == null || OBSERVACIONDESPACHOMP.length == 0 || /^\s+$/.test(OBSERVACIONDESPACHOMP)) {
                        document.form_reg_dato.OBSERVACIONDESPACHOMP.focus();
                        document.form_reg_dato.OBSERVACIONDESPACHOMP.style.borderColor = "#FF0000";
                        document.getElementById('val_observacion').innerHTML = "NO A INGRESADO DATO";
                        return false
                    }
                    document.form_reg_dato.OBSERVACIONDESPACHOMP.style.borderColor = "#4AF575"; 
                    */

                    
                    if (TDOCUMENTO == null || TDOCUMENTO == 0) {
                        document.form_reg_dato.TDOCUMENTO.focus();
                        document.form_reg_dato.TDOCUMENTO.style.borderColor = "#FF0000";
                        document.getElementById('val_tdocumento').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false
                    }
                    document.form_reg_dato.TDOCUMENTO.style.borderColor = "#4AF575";
            
               
                }

                //FUNCION PARA REALIZAR UNA ACTUALIZACION DEL FORMULARIO DE REGISTRO DE DESPACHOMP
                function refrescar() {
                    document.getElementById("form_reg_dato").submit();
                }

                //FUNCION PARA ABRIR VENTANA QUE SE ENCUENTRA LA OPERACIONES DE DETALLE DE DESPACHOMP
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
            <?php include_once "../../assest/config/menuFruta.php"; ?>
            <div class="content-wrapper">
                <div class="container-full">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Granel </h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Granel</li>
                                            <li class="breadcrumb-item" aria-current="page">Despacho</li>
                                            <li class="breadcrumb-item" aria-current="page">Materia Prima</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#">Registro Despacho </a>
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <?php include_once "../../assest/config/verIndicadorEconomico.php"; ?>
                        </div>
                    </div>
                    <label id="val_mensaje" class="validacion"><?php echo $MENSAJEENVASED; ?> </label>
                    <label id="val_mensaje" class="validacion"><?php echo $MENSAJEENVASEO; ?> </label>
                    <!-- Main content -->
                    <section class="content">
                        <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato">
                            <div class="box">
                                 <div class="box-header with-border bg-primary">                                   
                                    <h4 class="box-title">Registro de Despacho</h4>                                        
                                </div>
                                <div class="box-body ">
                                    <div class="row">
                                        <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTA" name="PLANTA" value="<?php echo $PLANTAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADAS; ?>" />

                                                <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESAE" name="EMPRESAE" value="<?php echo $EMPRESA; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTAE" name="PLANTAE" value="<?php echo $PLANTA; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADAE" name="TEMPORADAE" value="<?php echo $TEMPORADA; ?>" />

                                                <input type="hidden" class="form-control" id="TOTALENVASE" name="TOTALENVASE" value="<?php echo $TOTALENVASE; ?>" />
                                                <input type="hidden" class="form-control" id="TOTALBRUTO" name="TOTALBRUTO" value="<?php echo $TOTALBRUTO; ?>" />
                                                <input type="hidden" class="form-control" id="TOTALNETO" name="TOTALNETO" value="<?php echo $TOTALNETO; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID DESPACHOEX" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="OP DESPACHOEX" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="URL DESPACHOEX" id="URLP" name="URLP" value="registroDespachomp" />
                                                <label>Número Despacho</label>
                                                <input type="text" class="form-control" style="background-color: #eeeeee;" placeholder="Número Despacho" id="NUMEROVER" name="NUMEROVER" value="<?php echo $NUMEROVER; ?>" disabled />
                                                <label id="val_id" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-6 col-xl-1 col-lg-1 col-md-6 col-sm-6 col-6 col-xs-6">
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha Ingreso</label>
                                                <input type="hidden" class="form-control" placeholder="FECHA DESPACHOMP" id="FECHAINGRESODESPACHOE" name="FECHAINGRESODESPACHOE" value="<?php echo $FECHAINGRESODESPACHO; ?>" />
                                                <input type="date" class="form-control" style="background-color: #eeeeee;" placeholder="FECHA DESPACHOMP" id="FECHAINGRESODESPACHO" name="FECHAINGRESODESPACHO" value="<?php echo $FECHAINGRESODESPACHO; ?>" disabled />
                                                <label id="val_fechai" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha Modificación</label>
                                                <input type="hidden" class="form-control" placeholder="FECHA MODIFICACION" id="FECHAMODIFCIACIONDESPACHOE" name="FECHAMODIFCIACIONDESPACHOE" value="<?php echo $FECHAMODIFCIACIONDESPACHO; ?>" />
                                                <input type="date" class="form-control" style="background-color: #eeeeee;" placeholder="FECHA MODIFICACION" id="FECHAMODIFCIACIONDESPACHO" name="FECHAMODIFCIACIONDESPACHO" value="<?php echo $FECHAMODIFCIACIONDESPACHO; ?>" disabled />
                                                <label id="val_fecham" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha Despacho </label>
                                                <input type="hidden" class="Despachoform-control" placeholder="Fecha Despachomp" id="FECHADESPACHOE" name="FECHADESPACHOE" value="<?php echo $FECHADESPACHO; ?>" />
                                                <input type="date" class="form-control"  placeholder="Fecha Despacho" id="FECHADESPACHO" name="FECHADESPACHO" value="<?php echo $FECHADESPACHO; ?>" <?php echo $DISABLED2; ?>  />
                                                <label id="val_fecha" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Tipo Despacho </label>
                                                <input type="hidden" class="form-control" placeholder="TDESPACHOE" id="TDESPACHOE" name="TDESPACHOE" value="<?php echo $TDESPACHO; ?>" />
                                                <select class="form-control select2" id="TDESPACHO" name="TDESPACHO" style="width: 100%;" onchange="this.form.submit()" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                    <option></option>
                                                    <option value="1" <?php if ($TDESPACHO == "1") { echo "selected"; } ?>> Interplanta</option>
                                                    <option value="2" <?php if ($TDESPACHO == "2") { echo "selected"; } ?>> Devolución a Productor </option>
                                                    <option value="3" <?php if ($TDESPACHO == "3") { echo "selected"; } ?>> Venta</option>
                                                    <option value="4" <?php if ($TDESPACHO == "4") { echo "selected"; } ?>> Despacho de Descarte(R)</option>
                                                    <option value="5" <?php if ($TDESPACHO == "5") { echo "selected"; } ?>> Planta Externa</option>
                                                    <option value="6" <?php if ($TDESPACHO == "6") { echo "selected"; } ?>> Despacho a Productor </option>
                                                </select>
                                                <label id="val_tdespacho" class="validacion"> </label>
                                            </div>
                                        </div>                                        
                                        <?php if ($TDESPACHO != "4") { ?>
                                            <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>Número Guía </label>
                                                    <input type="hidden" class="form-control" placeholder="Numero Guia" id="NUMEROGUIADESPACHOE" name="NUMEROGUIADESPACHOE" value="<?php echo $NUMEROGUIADESPACHO; ?>" />
                                                    <input type="text" class="form-control"  placeholder="Número Guía" id="NUMEROGUIADESPACHO" name="NUMEROGUIADESPACHO" value="<?php echo $NUMEROGUIADESPACHO; ?>" <?php echo $DISABLED2; ?> />
                                                    <label id="val_numeroguia" class="validacion"> </label>
                                                </div>
                                            </div>
                                        <?php } ?>          
                                        <?php if ($TDESPACHO == "4") { ?>                                            
                                            <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            </div>
                                        <?php } ?>     
                                        <div class="col-xxl-3 col-xl-5 col-lg-9 col-md-9 col-sm-9 col-9 col-xs-9">
                                            <div class="form-group">
                                                <label>Transporte</label>
                                                <input type="hidden" class="form-control" placeholder="Transportita" id="TRANSPORTEE" name="TRANSPORTEE" value="<?php echo $TRANSPORTE; ?>" />
                                                <select class="form-control select2" id="TRANSPORTE" name="TRANSPORTE" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYTRANSPORTITA as $r) : ?>
                                                        <?php if ($ARRAYTRANSPORTITA) {    ?>
                                                            <option value="<?php echo $r['ID_TRANSPORTE']; ?>" <?php if ($TRANSPORTE == $r['ID_TRANSPORTE']) { echo "selected"; } ?>> <?php echo $r['NOMBRE_TRANSPORTE'] ?> </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_transportita" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-1 col-xl-1 col-lg-3 col-md-3 col-sm-3 col-3 col-xs-3">
                                            <div class="form-group">
                                                <br>
                                                <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Transporte" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopTransporte.php' ); ">
                                                    <i class="glyphicon glyphicon-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-5 col-lg-9 col-md-9 col-sm-9 col-9 col-xs-9">
                                            <div class="form-group">
                                                <label>Conductor</label>
                                                <input type="hidden" class="form-control" placeholder="Conductor" id="CONDUCTORE" name="CONDUCTORE" value="<?php echo $CONDUCTOR; ?>" />
                                                <select class="form-control select2" id="CONDUCTOR" name="CONDUCTOR" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYCONDUCTOR as $r) : ?>
                                                        <?php if ($ARRAYCONDUCTOR) {    ?>
                                                            <option value="<?php echo $r['ID_CONDUCTOR']; ?>" <?php if ($CONDUCTOR == $r['ID_CONDUCTOR']) { echo "selected"; } ?>> <?php echo $r['NOMBRE_CONDUCTOR'] ?> </option>
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
                                                <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Conductor" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopConductor.php' ); ">
                                                    <i class="glyphicon glyphicon-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Patente Camión</label>
                                                <input type="hidden" class="form-control" placeholder="Patente Vehiculo" id="PATENTEVEHICULOE" name="PATENTEVEHICULOE" value="<?php echo $PATENTEVEHICULO; ?>" />
                                                <input type="text" class="form-control"  placeholder="Patente Camión" id="PATENTEVEHICULO" name="PATENTEVEHICULO" value="<?php echo $PATENTEVEHICULO; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> />
                                                <label id="val_patentevehiculo" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Patente Carro</label>
                                                <input type="hidden" class="form-control" placeholder="Patente Carro" id="PATENTECARROE" name="PATENTECARROE" value="<?php echo $PATENTECARRO; ?>" />
                                                <input type="text" class="form-control"  placeholder="Patente Carro" id="PATENTECARRO" name="PATENTECARRO" value="<?php echo $PATENTECARRO; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> />
                                                <label id="val_patentecarro" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <?php if ($TDESPACHO == "1") { ?>
                                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Planta Destino</label>
                                                    <input type="hidden" class="form-control" placeholder="PLANTADESTINOE" id="PLANTADESTINOE" name="PLANTADESTINOE" value="<?php echo $PLANTADESTINO; ?>" />
                                                    <select class="form-control select2" id="PLANTADESTINO" name="PLANTADESTINO" onchange="this.form.submit()" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYPLANTADESTINO as $r) : ?>
                                                            <?php if ($ARRAYPLANTADESTINO) {    ?>
                                                                <option value="<?php echo $r['ID_PLANTA']; ?>" <?php if ($PLANTADESTINO == $r['ID_PLANTA']) { echo "selected"; } ?>> <?php echo $r['NOMBRE_PLANTA'] ?> </option>
                                                            <?php } else { ?>
                                                                <option>No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_plantad" class="validacion"> </label>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if ($TDESPACHO == "2") { ?>
                                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Productor</label>
                                                    <input type="hidden" class="form-control" placeholder="PRODUCTORE" id="PRODUCTORE" name="PRODUCTORE" value="<?php echo $PRODUCTOR; ?>" />
                                                    <select class="form-control select2" id="PRODUCTOR" name="PRODUCTOR" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYPRODUCTOR as $r) : ?>
                                                            <?php if ($ARRAYPRODUCTOR) {    ?>
                                                                <option value="<?php echo $r['ID_PRODUCTOR']; ?>" <?php if ($PRODUCTOR == $r['ID_PRODUCTOR']) { echo "selected"; } ?>> <?php echo $r['CSG_PRODUCTOR'] ?> : <?php echo $r['NOMBRE_PRODUCTOR'] ?> </option>
                                                            <?php } else { ?>
                                                                <option>No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_productor" class="validacion"> </label>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if ($TDESPACHO == "3") { ?>
                                            <div class="col-xxl-3 col-xl-5 col-lg-9 col-md-9 col-sm-9 col-9 col-xs-9">
                                                <div class="form-group">
                                                    <label>Comprador</label>
                                                    <input type="hidden" class="form-control" placeholder="COMPRADORE" id="COMPRADORE" name="COMPRADORE" value="<?php echo $COMPRADOR; ?>" />
                                                    <select class="form-control select2" id="COMPRADOR" name="COMPRADOR" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYCOMPRADOR as $r) : ?>
                                                            <?php if ($ARRAYCOMPRADOR) {    ?>
                                                                <option value="<?php echo $r['ID_COMPRADOR']; ?>" <?php if ($COMPRADOR == $r['ID_COMPRADOR']) { echo "selected"; } ?>> <?php echo $r['NOMBRE_COMPRADOR'] ?> </option>
                                                            <?php } else { ?>
                                                                <option>No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_comprador" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-1 col-xl-1 col-lg-3 col-md-3 col-sm-3 col-3 col-xs-3">
                                                <div class="form-group">
                                                    <br>
                                                    <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Comprador" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopComprador.php' ); ">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if ($TDESPACHO == "4") { ?>
                                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Destino</label>
                                                    <input type="hidden" class="form-control" placeholder="REGALOE" id="REGALOE" name="REGALOE" value="<?php echo $REGALO; ?>" />
                                                    <textarea class="form-control" rows="1"  placeholder="Ingrese Para Quien o Quienes" id="REGALO" name="REGALO" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>><?php echo $REGALO; ?></textarea>
                                                    <label id="val_regalo" class="validacion"> </label>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if ($TDESPACHO == "5") { ?>
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-9 col-9 col-xs-9">
                                                <div class="form-group">
                                                    <label>Planta Externa</label>
                                                    <input type="hidden" class="form-control" placeholder="PLANTAEXTERNAE" id="PLANTAEXTERNAE" name="PLANTAEXTERNAE" value="<?php echo $PLANTAEXTERNA; ?>" />
                                                    <select class="form-control select2" id="PLANTAEXTERNA" name="PLANTAEXTERNA" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYPLANTAEXTERNA as $r) : ?>
                                                            <?php if ($ARRAYPLANTAEXTERNA) {    ?>
                                                                <option value="<?php echo $r['ID_PLANTA']; ?>" <?php if ($PLANTAEXTERNA == $r['ID_PLANTA']) { echo "selected"; } ?>> <?php echo $r['NOMBRE_PLANTA'] ?> </option>
                                                            <?php } else { ?>
                                                                <option>No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_plantae" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-1 col-xl-1 col-lg-3 col-md-3 col-sm-3 col-3 col-xs-3">
                                                <div class="form-group">
                                                    <br>
                                                    <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Planta Externa" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopPlanta2.php' ); ">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        <?php } ?>                                        
                                        <?php if ($TDESPACHO == "6") { ?>
                                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Productor</label>
                                                    <input type="hidden" class="form-control" placeholder="PRODUCTORE" id="PRODUCTORE" name="PRODUCTORE" value="<?php echo $PRODUCTOR; ?>" />
                                                    <select class="form-control select2" id="PRODUCTOR" name="PRODUCTOR" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYPRODUCTOR as $r) : ?>
                                                            <?php if ($ARRAYPRODUCTOR) {    ?>
                                                                <option value="<?php echo $r['ID_PRODUCTOR']; ?>" <?php if ($PRODUCTOR == $r['ID_PRODUCTOR']) { echo "selected"; } ?>> <?php echo $r['CSG_PRODUCTOR'] ?> : <?php echo $r['NOMBRE_PRODUCTOR'] ?> </option>
                                                            <?php } else { ?>
                                                                <option>No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_productor" class="validacion"> </label>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>                                    
                                        <p class="text-muted"><i class="fas fa-info-circle"></i> Datos necesarios para el despacho de envases</p>               
                                    
                                    <div class="row">                     
                                        <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Tipo Documento</label>
                                                <input type="hidden" class="form-control" placeholder="Transportita" id="TDOCUMENTOE" name="TDOCUMENTOE" value="<?php echo $TDOCUMENTO; ?>" />
                                                <select class="form-control select2" id="TDOCUMENTO" name="TDOCUMENTO" style="width: 100%;" <?php echo $DISABLED2; ?> >
                                                    <option></option>
                                                    <?php foreach ($ARRAYTDOCUMENTO as $r) : ?>
                                                        <?php if ($ARRAYTDOCUMENTO) {    ?>
                                                            <option value="<?php echo $r['ID_TDOCUMENTO']; ?>" <?php if ($TDOCUMENTO == $r['ID_TDOCUMENTO']) { echo "selected"; } ?>> <?php echo $r['NOMBRE_TDOCUMENTO'] ?> </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_tdocumento" class="validacion"> </label>
                                            </div>
                                        </div>                                         
                                        <?php if ($TDESPACHO == "1") { ?>                                   
                                            <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" placeholder="BODEGAD" id="BODEGAD" name="BODEGAD" value="<?php echo $BODEGAD; ?>" />                                          
                                                </div>
                                            </div>                                          
                                        <?php } ?>                                                                                 
                                        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-9 col-9 col-xs-9">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" placeholder="BODEGA" id="BODEGA" name="BODEGA" value="<?php echo $BODEGA; ?>" />       
                                            </div>
                                        </div>      
                                    </div> 
                                    <div class="row">
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Observaciónes </label>
                                                <input type="hidden" class="form-control" placeholder="TRANSPORTE" id="OBSERVACIONDESPACHOE" name="OBSERVACIONDESPACHOE" value="<?php echo $OBSERVACIONDESPACHO; ?>" />
                                                <textarea class="form-control" rows="1"  placeholder="Ingrese Nota, Observaciónes u Otro" id="OBSERVACIONDESPACHO" name="OBSERVACIONDESPACHO" <?php echo $DISABLED2; ?>><?php echo $OBSERVACIONDESPACHO; ?></textarea>
                                                <label id="val_observacion" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- /.row -->
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="toolbar">
                                        <div class="btn-group  col-xxl-4 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12" role="group" aria-label="Acciones generales">
                                            <?php if ($OP == "") { ?>
                                                <button type="button" class="btn btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroDespachomp.php');">
                                                    <i class="ti-trash"></i> Cancelar
                                                </button>
                                                <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Guardar" name="CREAR" value="CREAR" <?php echo $DISABLEENVASED; ?>  onclick="return validacion()">
                                                    <i class="ti-save-alt"></i> Guardar
                                                </button>
                                            <?php } ?>
                                            <?php if ($OP != "") { ?>
                                                <button type="button" class="btn  btn-success " data-toggle="tooltip" title="Volver" name="VOLVER" value="VOLVER" Onclick="irPagina('listarDespachomp.php'); ">
                                                    <i class="ti-back-left "></i> Volver
                                                </button>
                                                <button type="submit" class="btn btn-warning " data-toggle="tooltip" title="Guardar" name="GUARDAR" value="GUARDAR"  <?php echo $DISABLEENVASED; ?>  <?php echo $DISABLED2; ?> onclick="return validacion()">
                                                    <i class="ti-pencil-alt"></i> Guardar
                                                </button>
                                                <button type="submit" class="btn btn-danger " data-toggle="tooltip" title="Cerrar" name="CERRAR" value="CERRAR"  <?php echo $DISABLEENVASED; ?> <?php echo $DISABLED2; ?> onclick="return validacion()">
                                                    <i class="ti-save-alt"></i> Cerrar
                                                </button>
                                            <?php } ?>
                                        </div>
                                        <div class="btn-group  col-xxl-4 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12  float-right">
                                            <?php if ($OP != ""): ?>
                                                <button type="button" class="btn btn-info" data-toggle="tooltip" title="Informe" id="defecto" name="tarjas" <?php if ($ESTADO == "1") { echo "disabled"; } ?> <?php echo $DISABLEDFOLIO; ?> Onclick="abrirPestana('../../assest/documento/informeDespachoMP.php?parametro=<?php echo $IDOP; ?>&&usuario=<?php echo $IDUSUARIOS; ?>');">
                                                    <i class="fa fa-file-pdf-o"></i> Informe
                                                </button>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--.row -->
                        <?php if (isset($_GET['op'])): ?>
                            <div class="card">                            
                                <div class="card-header bg-info">
                                    <h4 class="card-title">Detalle de Despacho de Materia Prima</h4>
                                </div>
                                <div class="card-header">
                                    <div class="form-row align-items-center">
                                        <form method="post" id="form1">
                                            <input type="hidden" class="form-control" placeholder="ID DESPACHO" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                            <input type="hidden" class="form-control" placeholder="OP DESPACHO" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                            <input type="hidden" class="form-control" placeholder="URL DESPACHO" id="URLP" name="URLP" value="registroDespachomp" />
                                            <input type="hidden" class="form-control" placeholder="URL SELECCIONAR" id="URLD" name="URLD" value="registroSelecionExistenciaMPDespachoMp" />
                                            <div class="col-auto">
                                                <button type="submit" class="btn btn-success btn-block mb-2" data-toggle="tooltip" title="Seleccion Existencia" id="SELECIONOCDURL" name="SELECIONOCDURL"
                                                    <?php echo $DISABLED2; ?>  <?php   if ($ESTADO == 0) {   echo "disabled style='background-color: #eeeeee;'"; } ?>  > 
                                                    Seleccion Existencias
                                                </button>
                                            </div>
                                        </form>
                                        <div class="col-auto">
                                            <label class="sr-only" for=""></label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Total Envase</div>
                                                </div>
                                                <input type="hidden" class="form-control" id="TOTALENVASE" name="TOTALENVASE" value="<?php echo $TOTALENVASE; ?>" />
                                                <input type="text" class="form-control" placeholder="Total Envase" id="TOTALENVASEV" name="TOTALENVASEV" value="<?php echo $TOTALENVASEV; ?>" disabled />
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <label class="sr-only" for=""></label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Total Neto</div>
                                                </div>
                                                <input type="hidden" class="form-control" id="TOTALNETO" name="TOTALNETO" value="<?php echo $TOTALNETO; ?>" />
                                                <input type="text" class="form-control" placeholder="Total Neto" id="TOTALENVASEV" name="TOTALENVASEV" value="<?php echo $TOTALNETOV; ?>" disabled />
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <label class="sr-only" for=""></label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Total Bruto</div>
                                                </div>
                                                <input type="hidden" class="form-control" id="TOTALBRUTO" name="TOTALBRUTO" value="<?php echo $TOTALBRUTO; ?>" />
                                                <input type="text" class="form-control" placeholder="Total Neto" id="TOTALENVASEV" name="TOTALENVASEV" value="<?php echo $TOTALBRUTOV; ?>" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <table id="detalle" class="table-hover " style="width: 150%;">
                                                        <thead>
                                                            <tr class="text-center">
                                                                <th> N° Folio </th>
                                                                <th class="text-center">Operaciónes</th>
                                                                <th>Fecha Cosecha </th>
                                                                <th>Código Estandar</th>
                                                                <th>Envase/Estandar</th>
                                                                <th>Variedad</th>
                                                                <th>Cantidad Envase</th>
                                                                <th>Kilos Neto</th>
                                                                <th>Kilos Promedio</th>
                                                                <th>Kilos Bruto</th>
                                                                <th>CSG</th>
                                                                <th>Productor</th>
                                                                <th>Tipo Manejo</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php if ($ARRAYTOMADO) { ?>
                                                                <?php foreach ($ARRAYTOMADO as $r) : ?>
                                                                    <?php
                                                                    $CONTADOR = $CONTADOR + 1;
                                                                    $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);
                                                                    if ($ARRAYVERPRODUCTORID) {
                                                                        $CSGPRODUCTOR = $ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'];
                                                                        $NOMBREPRODUCTOR = $ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'];
                                                                    } else {
                                                                        $CSGPRODUCTOR = "Sin Datos";
                                                                        $NOMBREPRODUCTOR = "Sin Datos";
                                                                    }
                                                                    $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
                                                                    if ($ARRAYVERVESPECIESID) {
                                                                        $NOMBREVARIEDAD = $ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'];
                                                                    } else {
                                                                        $NOMBREVARIEDAD = "Sin Datos";
                                                                    }
                                                                    $ARRAYEVERERECEPCIONID = $ERECEPCION_ADO->verEstandar($r['ID_ESTANDAR']);
                                                                    if ($ARRAYEVERERECEPCIONID) {
                                                                        $CODIGOESTANDAR = $ARRAYEVERERECEPCIONID[0]['CODIGO_ESTANDAR'];
                                                                        $NOMBREESTANDAR = $ARRAYEVERERECEPCIONID[0]['NOMBRE_ESTANDAR'];
                                                                    } else {
                                                                        $NOMBREESTANDAR = "Sin Datos";
                                                                        $CODIGOESTANDAR = "Sin Datos";
                                                                    }
                                                                    $ARRAYTMANEJO = $TMANEJO_ADO->verTmanejo($r['ID_TMANEJO']);
                                                                    if ($ARRAYTMANEJO) {
                                                                        $NOMBRETMANEJO = $ARRAYTMANEJO[0]['NOMBRE_TMANEJO'];
                                                                    } else {
                                                                        $NOMBRETMANEJO = "Sin Datos";
                                                                    }
                                                                    ?>
                                                                    <tr class="text-center">
                                                                        <td><?php echo $r['FOLIO_AUXILIAR_EXIMATERIAPRIMA']; ?> </td>
                                                                        <td class="text-center">
                                                                        <form method="post" id="form2">
                                                                                <input type="hidden" class="form-control" id="IDQUITAR" name="IDQUITAR" value="<?php echo $r['ID_EXIMATERIAPRIMA']; ?>" />
                                                                                <div class="btn-group btn-block col-6" role="group" aria-label="Operaciones Detalle">
                                                                                    <button type="submit" class="btn btn-sm btn-danger   " id="QUITAR" name="QUITAR" data-toggle="tooltip" title="Quitar Existencia" <?php echo $DISABLEENVASED; ?>  <?php echo $DISABLED2; ?> <?php if ($ESTADO == 0) { echo "disabled"; } ?>>
                                                                                        <i class="ti-close"></i><br> Quitar
                                                                                    </button>
                                                                                </div>
                                                                            </form>
                                                                        </td>
                                                                        <td><?php echo $r['COSECHA']; ?></td>
                                                                        <td><?php echo $CODIGOESTANDAR; ?></td>
                                                                        <td><?php echo $NOMBREESTANDAR; ?></td>
                                                                        <td><?php echo $NOMBREVARIEDAD; ?></td>
                                                                        <td><?php echo $r['ENVASE']; ?></td>
                                                                        <td><?php echo $r['NETO']; ?></td>
                                                                        <td><?php echo $r['PROMEDIO']; ?></td>
                                                                        <td><?php echo $r['BRUTO']; ?></td>
                                                                        <td><?php echo $CSGPRODUCTOR; ?></td>
                                                                        <td><?php echo $NOMBREPRODUCTOR; ?></td>
                                                                        <td><?php echo $NOMBRETMANEJO; ?></td>
                                                                    </tr>
                                                                <?php endforeach; ?>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        <?php endif ?>
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

                    $ARRAYNUMERO = $DESPACHOMP_ADO->obtenerNumero($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
                    $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;
                    //UTILIZACION METODOS SET DEL MODELO
                    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO
                    $DESPACHOMP->__SET('NUMERO_DESPACHO', $NUMERO);
                    $DESPACHOMP->__SET('FECHA_DESPACHO', $_REQUEST['FECHADESPACHO']);
                    $DESPACHOMP->__SET('PATENTE_CAMION', $_REQUEST['PATENTEVEHICULO']);
                    $DESPACHOMP->__SET('PATENTE_CARRO', $_REQUEST['PATENTECARRO']);
                    $DESPACHOMP->__SET('OBSERVACION_DESPACHO', $_REQUEST['OBSERVACIONDESPACHO']);
                    $DESPACHOMP->__SET('ID_CONDUCTOR', $_REQUEST['CONDUCTOR']);
                    $DESPACHOMP->__SET('ID_TRANSPORTE', $_REQUEST['TRANSPORTE']);
                    $DESPACHOMP->__SET('TDESPACHO', $_REQUEST['TDESPACHO']);
                    if ($_REQUEST['TDESPACHO'] == "1") {
                        $DESPACHOMP->__SET('ID_PLANTA2', $_REQUEST['PLANTADESTINO']);
                        $DESPACHOMP->__SET('NUMERO_GUIA_DESPACHO', $_REQUEST['NUMEROGUIADESPACHO']);
                    }
                    if ($_REQUEST['TDESPACHO'] == "2") {
                        $DESPACHOMP->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
                        $DESPACHOMP->__SET('NUMERO_GUIA_DESPACHO', $_REQUEST['NUMEROGUIADESPACHO']);
                    }
                    if ($_REQUEST['TDESPACHO'] == "3") {
                        $DESPACHOMP->__SET('ID_COMPRADOR', $_REQUEST['COMPRADOR']);
                        $DESPACHOMP->__SET('NUMERO_GUIA_DESPACHO', $_REQUEST['NUMEROGUIADESPACHO']);
                    }
                    if ($_REQUEST['TDESPACHO'] == "4") {
                        $DESPACHOMP->__SET('REGALO_DESPACHO', $_REQUEST['REGALO']);
                    }
                    if ($_REQUEST['TDESPACHO'] == "5") {
                        $DESPACHOMP->__SET('ID_PLANTA3', $_REQUEST['PLANTAEXTERNA']);
                        $DESPACHOMP->__SET('NUMERO_GUIA_DESPACHO', $_REQUEST['NUMEROGUIADESPACHO']);
                    }
                    if ($_REQUEST['TDESPACHO'] == "6") {
                        $DESPACHOMP->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
                        $DESPACHOMP->__SET('NUMERO_GUIA_DESPACHO', $_REQUEST['NUMEROGUIADESPACHO']);
                    }
                    $DESPACHOMP->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                    $DESPACHOMP->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
                    $DESPACHOMP->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
                    $DESPACHOMP->__SET('ID_USUARIOI', $IDUSUARIOS);
                    $DESPACHOMP->__SET('ID_USUARIOM', $IDUSUARIOS);
                    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                    $DESPACHOMP_ADO->agregarDespachomp($DESPACHOMP);


                    //OBTENER EL ID DE LA DESPACHOMP CREADA PARA LUEGO ENVIAR EL INGRESO DEL DETALLE
                    $ARRYAOBTENERID = $DESPACHOMP_ADO->obtenerId(
                        $_REQUEST['FECHADESPACHO'],
                        $_REQUEST['EMPRESA'],
                        $_REQUEST['PLANTA'],
                        $_REQUEST['TEMPORADA']
                    );     

                    $AUSUARIO_ADO->agregarAusuario2($NUMERO,1,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Despacho Materia Prima.","fruta_despachomp", $ARRYAOBTENERID[0]['ID_DESPACHO'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

                    $ARRAYDESPACHOE = $DESPACHOE_ADO->listarDespachoePorDespachoMPCBX($ARRYAOBTENERID[0]['ID_DESPACHO']);
                    if(empty($ARRAYDESPACHOE)){
                        $ARRAYNUMERO = $DESPACHOE_ADO->obtenerNumero($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
                        $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;
                        //UTILIZACION METODOS SET DEL MODELO
                        //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO       
                        $DESPACHOE->__SET('NUMERO_DESPACHO', $NUMERO);
                        $DESPACHOE->__SET('FECHA_DESPACHO', $_REQUEST['FECHADESPACHO']);
                        $DESPACHOE->__SET('PATENTE_CAMION', $_REQUEST['PATENTEVEHICULO']);
                        $DESPACHOE->__SET('PATENTE_CARRO', $_REQUEST['PATENTECARRO']);
                        $DESPACHOE->__SET('OBSERVACIONES', $_REQUEST['OBSERVACIONDESPACHO']);
                        $DESPACHOE->__SET('ID_CONDUCTOR', $_REQUEST['CONDUCTOR']);
                        $DESPACHOE->__SET('ID_TRANSPORTE', $_REQUEST['TRANSPORTE']);
                        if ($_REQUEST['TDESPACHO'] == "1") {
                            $DESPACHOE->__SET('ID_PLANTA2', $_REQUEST['PLANTADESTINO']);
                            $DESPACHOE->__SET('ID_BODEGA2', $_REQUEST['BODEGAD']);
                            $DESPACHOE->__SET('NUMERO_DOCUMENTO', $_REQUEST['NUMEROGUIADESPACHO']);
                            $TDESPACHOE ="2";
                        }
                        if ($_REQUEST['TDESPACHO'] == "2") {
                            $DESPACHOE->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
                            $DESPACHOE->__SET('NUMERO_DOCUMENTO', $_REQUEST['NUMEROGUIADESPACHO']);
                            $TDESPACHOE ="3";
                        }
                        if ($_REQUEST['TDESPACHO'] == "3") {
                            $DESPACHOE->__SET('ID_COMPRADOR', $_REQUEST['COMPRADOR']);
                            $DESPACHOE->__SET('NUMERO_DOCUMENTO', $_REQUEST['NUMEROGUIADESPACHO']);
                            $TDESPACHOE ="5";
                        }
                        if ($_REQUEST['TDESPACHO'] == "4") {
                            $DESPACHOE->__SET('REGALO_DESPACHO', $_REQUEST['REGALO']);
                            $TDESPACHOE ="6";
                        }
                        if ($_REQUEST['TDESPACHO'] == "5") {
                            $DESPACHOE->__SET('ID_PLANTA3', $_REQUEST['PLANTAEXTERNA']);
                            $DESPACHOE->__SET('NUMERO_DOCUMENTO', $_REQUEST['NUMEROGUIADESPACHO']);
                            $TDESPACHOE ="7";
                        }  
                        if ($_REQUEST['TDESPACHO'] == "6") {
                            $DESPACHOE->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
                            $DESPACHOE->__SET('NUMERO_DOCUMENTO', $_REQUEST['NUMEROGUIADESPACHO']);
                            $TDESPACHOE ="8";
                        }                 
                        $DESPACHOE->__SET('TDESPACHO', $TDESPACHOE);
                        $DESPACHOE->__SET('ID_BODEGAO', $_REQUEST['BODEGA']);
                        $DESPACHOE->__SET('ID_TDOCUMENTO', $_REQUEST['TDOCUMENTO']);
                        $DESPACHOE->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                        $DESPACHOE->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
                        $DESPACHOE->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
                        $DESPACHOE->__SET('ID_DESPACHOMP', $ARRYAOBTENERID[0]['ID_DESPACHO']);
                        $DESPACHOE->__SET('ID_USUARIOI', $IDUSUARIOS);
                        $DESPACHOE->__SET('ID_USUARIOM', $IDUSUARIOS);
                        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                        $DESPACHOE_ADO->agregarDespachoeMp($DESPACHOE);


                        //OBTENER EL ID DE LA RECEPCIONE CREADA PARA LUEGO ENVIAR EL INGRESO DEL DETALLE
                        $ARRYAOBTENERIDE = $DESPACHOE_ADO->obtenerId(
                            $_REQUEST['FECHADESPACHO'],
                            $_REQUEST['EMPRESA'],
                            $_REQUEST['PLANTA'],
                            $_REQUEST['TEMPORADA']
                        );              
                        $DESPACHOE->__SET('ID_DESPACHO', $ARRYAOBTENERIDE[0]["ID_DESPACHO"]);
                        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                        $DESPACHOE_ADO->cerrado($DESPACHOE);


                        $AUSUARIO_ADO->agregarAusuario2($NUMERO,1,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Despacho Envases, Origen Despacho Materia Prima .","material_despachoe", $ARRYAOBTENERIDE[0]['ID_DESPACHO'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  
    
                    }
                    //REDIRECCIONAR A PAGINA registroDespachomp.php
                
                    $id_dato = $ARRYAOBTENERID[0]['ID_DESPACHO'];
                    $accion_dato = "crear";
                    echo '<script>
                        Swal.fire({
                            icon:"success",
                            title:"Registro Creado",
                            text:"El registro de despacho se ha creado correctamente",
                            showConfirmButton: true,
                            confirmButtonText:"Cerrar",
                            closeOnConfirm:false
                        }).then((result)=>{
                                location.href = "registroDespachomp.php?op&id='.$id_dato.'&a='.$accion_dato.'";
                            
                        })
                    </script>';
                // echo "<script type='text/javascript'> location.href ='registroDespachomp.php?op';</script>";            
            }
            if (isset($_REQUEST['GUARDAR'])) {
                $DESPACHOMP->__SET('FECHA_DESPACHO', $_REQUEST['FECHADESPACHO']);
                $DESPACHOMP->__SET('CANTIDAD_ENVASE_DESPACHO', $_REQUEST['TOTALENVASE']);
                $DESPACHOMP->__SET('KILOS_NETO_DESPACHO', $_REQUEST['TOTALNETO']);
                $DESPACHOMP->__SET('KILOS_BRUTO_DESPACHO', $_REQUEST['TOTALBRUTO']);
                $DESPACHOMP->__SET('PATENTE_CAMION', $_REQUEST['PATENTEVEHICULOE']);
                $DESPACHOMP->__SET('PATENTE_CARRO', $_REQUEST['PATENTECARROE']);
                $DESPACHOMP->__SET('OBSERVACION_DESPACHO', $_REQUEST['OBSERVACIONDESPACHO']);
                $DESPACHOMP->__SET('ID_CONDUCTOR', $_REQUEST['CONDUCTORE']);
                $DESPACHOMP->__SET('ID_TRANSPORTE', $_REQUEST['TRANSPORTEE']);
                $DESPACHOMP->__SET('TDESPACHO', $_REQUEST['TDESPACHOE']);
                if ($_REQUEST['TDESPACHOE'] == "1") {
                    $DESPACHOMP->__SET('ID_PLANTA2', $_REQUEST['PLANTADESTINOE']);
                    $DESPACHOMP->__SET('NUMERO_GUIA_DESPACHO', $_REQUEST['NUMEROGUIADESPACHO']);
                }
                if ($_REQUEST['TDESPACHOE'] == "2") {
                    $DESPACHOMP->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTORE']);
                    $DESPACHOMP->__SET('NUMERO_GUIA_DESPACHO', $_REQUEST['NUMEROGUIADESPACHO']);
                }
                if ($_REQUEST['TDESPACHOE'] == "3") {
                    $DESPACHOMP->__SET('ID_COMPRADOR', $_REQUEST['COMPRADORE']);
                    $DESPACHOMP->__SET('NUMERO_GUIA_DESPACHO', $_REQUEST['NUMEROGUIADESPACHO']);
                }
                if ($_REQUEST['TDESPACHOE'] == "4") {
                    $DESPACHOMP->__SET('REGALO_DESPACHO', $_REQUEST['REGALOE']);
                }
                if ($_REQUEST['TDESPACHOE'] == "5") {
                    $DESPACHOMP->__SET('ID_PLANTA3', $_REQUEST['PLANTAEXTERNAE']);
                    $DESPACHOMP->__SET('NUMERO_GUIA_DESPACHO', $_REQUEST['NUMEROGUIADESPACHO']);
                }
                if ($_REQUEST['TDESPACHOE'] == "6") {
                    $DESPACHOMP->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTORE']);
                    $DESPACHOMP->__SET('NUMERO_GUIA_DESPACHO', $_REQUEST['NUMEROGUIADESPACHO']);
                }
                $DESPACHOMP->__SET('ID_USUARIOM', $IDUSUARIOS);
                $DESPACHOMP->__SET('ID_DESPACHO', $_REQUEST['IDP']);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $DESPACHOMP_ADO->actualizarDespachomp($DESPACHOMP);     


                $AUSUARIO_ADO->agregarAusuario2($NUMEROVER,1,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de Despacho Materia Prima.","fruta_despachomp", $_REQUEST['IDP'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

                $ARRAYDESPACHOE = $DESPACHOE_ADO->listarDespachoePorDespachoMPCBX($_REQUEST['IDP']);
                if(empty($ARRAYDESPACHOE)){
                    $ARRAYNUMERO = $DESPACHOE_ADO->obtenerNumero($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
                    $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;
                    //UTILIZACION METODOS SET DEL MODELO
                    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO       
                    $DESPACHOE->__SET('NUMERO_DESPACHO', $NUMERO);
                    $DESPACHOE->__SET('FECHA_DESPACHO', $_REQUEST['FECHADESPACHO']);
                    $DESPACHOE->__SET('PATENTE_CAMION', $_REQUEST['PATENTEVEHICULOE']);
                    $DESPACHOE->__SET('PATENTE_CARRO', $_REQUEST['PATENTECARROE']);
                    $DESPACHOE->__SET('OBSERVACIONES', $_REQUEST['OBSERVACIONDESPACHO']);
                    $DESPACHOE->__SET('ID_CONDUCTOR', $_REQUEST['CONDUCTORE']);
                    $DESPACHOE->__SET('ID_TRANSPORTE', $_REQUEST['TRANSPORTEE']);
                    if ($_REQUEST['TDESPACHOE'] == "1") {
                        $DESPACHOE->__SET('ID_PLANTA2', $_REQUEST['PLANTADESTINOE']);
                        $DESPACHOE->__SET('ID_BODEGA2', $_REQUEST['BODEGAD']);
                        $DESPACHOE->__SET('NUMERO_DOCUMENTO', $_REQUEST['NUMEROGUIADESPACHO']);
                        $TDESPACHOE ="2";
                    }
                    if ($_REQUEST['TDESPACHOE'] == "2") {
                        $DESPACHOE->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTORE']);
                        $DESPACHOE->__SET('NUMERO_DOCUMENTO', $_REQUEST['NUMEROGUIADESPACHO']);
                        $TDESPACHOE ="3";
                    }
                    if ($_REQUEST['TDESPACHOE'] == "3") {
                        $DESPACHOE->__SET('ID_COMPRADOR', $_REQUEST['COMPRADOR']);
                        $DESPACHOE->__SET('NUMERO_DOCUMENTO', $_REQUEST['NUMEROGUIADESPACHO']);
                        $TDESPACHOE ="5";
                    }
                    if ($_REQUEST['TDESPACHOE'] == "4") {
                        $DESPACHOE->__SET('REGALO_DESPACHO', $_REQUEST['REGALOE']);
                        $TDESPACHOE ="6";
                    }
                    if ($_REQUEST['TDESPACHOE'] == "5") {
                        $DESPACHOE->__SET('ID_PLANTA3', $_REQUEST['PLANTAEXTERNAE']);
                        $DESPACHOE->__SET('NUMERO_DOCUMENTO', $_REQUEST['NUMEROGUIADESPACHO']);
                        $TDESPACHOE ="7";
                    }   
                    if ($_REQUEST['TDESPACHOE'] == "6") {
                        $DESPACHOE->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTORE']);
                        $DESPACHOE->__SET('NUMERO_DOCUMENTO', $_REQUEST['NUMEROGUIADESPACHO']);
                        $TDESPACHOE ="8";
                    }               
                    $DESPACHOE->__SET('TDESPACHO', $TDESPACHOE);
                    $DESPACHOE->__SET('ID_BODEGAO', $_REQUEST['BODEGA']);
                    $DESPACHOE->__SET('ID_TDOCUMENTO', $_REQUEST['TDOCUMENTO']);
                    $DESPACHOE->__SET('ID_EMPRESA', $_REQUEST['EMPRESAE']);
                    $DESPACHOE->__SET('ID_PLANTA', $_REQUEST['PLANTAE']);
                    $DESPACHOE->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADAE']);
                    $DESPACHOE->__SET('ID_DESPACHOMP', $_REQUEST['IDP']);
                    $DESPACHOE->__SET('ID_USUARIOI', $IDUSUARIOS);
                    $DESPACHOE->__SET('ID_USUARIOM', $IDUSUARIOS);
                    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                    $DESPACHOE_ADO->agregarDespachoeMp($DESPACHOE);
                    
                    $ARRYAOBTENERIDE = $DESPACHOE_ADO->obtenerId(
                        $_REQUEST['FECHADESPACHO'],
                        $_REQUEST['EMPRESA'],
                        $_REQUEST['PLANTA'],
                        $_REQUEST['TEMPORADA']
                    );              
                    $DESPACHOE->__SET('ID_DESPACHO', $ARRYAOBTENERIDE[0]["ID_DESPACHO"]);
                    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                    $DESPACHOE_ADO->cerrado($DESPACHOE);
                    
                    $AUSUARIO_ADO->agregarAusuario2($NUMERO,1,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Despacho Envases, Origen Despacho Materia Prima.","material_despachoe", $ARRYAOBTENERIDE[0]['ID_DESPACHO'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  


                }else{             
                    $DESPACHOE->__SET('FECHA_DESPACHO', $_REQUEST['FECHADESPACHO']);
                    $DESPACHOE->__SET('PATENTE_CAMION', $_REQUEST['PATENTEVEHICULOE']);
                    $DESPACHOE->__SET('PATENTE_CARRO', $_REQUEST['PATENTECARROE']);
                    $DESPACHOE->__SET('OBSERVACIONES', $_REQUEST['OBSERVACIONDESPACHO']);
                    $DESPACHOE->__SET('ID_CONDUCTOR', $_REQUEST['CONDUCTORE']);
                    $DESPACHOE->__SET('ID_TRANSPORTE', $_REQUEST['TRANSPORTEE']);
                    if ($_REQUEST['TDESPACHOE'] == "1") {
                        $DESPACHOE->__SET('ID_PLANTA2', $_REQUEST['PLANTADESTINOE']);
                        $DESPACHOE->__SET('ID_BODEGA2', $_REQUEST['BODEGAD']);
                        $DESPACHOE->__SET('NUMERO_DOCUMENTO', $_REQUEST['NUMEROGUIADESPACHO']);
                        $TDESPACHOE ="2";
                    }
                    if ($_REQUEST['TDESPACHOE'] == "2") {
                        $DESPACHOE->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTORE']);
                        $DESPACHOE->__SET('NUMERO_DOCUMENTO', $_REQUEST['NUMEROGUIADESPACHO']);
                        $TDESPACHOE ="3";
                    }
                    if ($_REQUEST['TDESPACHOE'] == "3") {
                        $DESPACHOE->__SET('ID_COMPRADOR', $_REQUEST['COMPRADOR']);
                        $DESPACHOE->__SET('NUMERO_DOCUMENTO', $_REQUEST['NUMEROGUIADESPACHO']);
                        $TDESPACHOE ="5";
                    }
                    if ($_REQUEST['TDESPACHOE'] == "4") {
                        $DESPACHOE->__SET('REGALO_DESPACHO', $_REQUEST['REGALOE']);
                        $TDESPACHOE ="6";
                    }
                    if ($_REQUEST['TDESPACHOE'] == "5") {
                        $DESPACHOE->__SET('ID_PLANTA3', $_REQUEST['PLANTAEXTERNAE']);
                        $DESPACHOE->__SET('NUMERO_DOCUMENTO', $_REQUEST['NUMEROGUIADESPACHO']);
                        $TDESPACHOE ="7";
                    }         
                    if ($_REQUEST['TDESPACHOE'] == "6") {
                        $DESPACHOE->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTORE']);
                        $DESPACHOE->__SET('NUMERO_DOCUMENTO', $_REQUEST['NUMEROGUIADESPACHO']);
                        $TDESPACHOE ="8";
                    }                
                    $DESPACHOE->__SET('TDESPACHO', $TDESPACHOE);
                    $DESPACHOE->__SET('ID_BODEGAO', $_REQUEST['BODEGA']);
                    $DESPACHOE->__SET('ID_TDOCUMENTO', $_REQUEST['TDOCUMENTOE']);
                    $DESPACHOE->__SET('ID_DESPACHOMP', $_REQUEST['IDP']);
                    $DESPACHOE->__SET('ID_USUARIOM', $IDUSUARIOS);
                    $DESPACHOE->__SET('ID_DESPACHO', $ARRAYDESPACHOE[0]["ID_DESPACHO"]);
                    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                    $DESPACHOE_ADO->actualizarDespachoe($DESPACHOE);

                    $AUSUARIO_ADO->agregarAusuario2($NUMEROVER,1,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de Despacho Envases. Origen Despacho Materia Prima.","material_despachoe", $_REQUEST['IDP'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  
                }       
                
                if ($accion_dato == "crear") {
                    $id_dato = $_REQUEST['IDP'];
                    $accion_dato = "crear";
                    echo '<script>
                        Swal.fire({
                            icon:"info",
                            title:"Registro Modificado",
                            text:"El registro de despacho se ha modificada correctamente",
                            showConfirmButton: true,
                            confirmButtonText:"Cerrar",
                            closeOnConfirm:false
                        }).then((result)=>{
                            location.href = "registroDespachomp.php?op&id='.$id_dato.'&a='.$accion_dato.'";                        
                        })
                    </script>';
                }
                if ($accion_dato == "editar") {
                    $id_dato = $_REQUEST['IDP'];
                    $accion_dato = "editar";
                    echo '<script>
                        Swal.fire({
                            icon:"info",
                            title:"Registro Modificado",
                            text:"El registro de despacho se ha modificada correctamente",
                            showConfirmButton: true,
                            confirmButtonText:"Cerrar",
                            closeOnConfirm:false
                        }).then((result)=>{
                            location.href = "registroDespachomp.php?op&id='.$id_dato.'&a='.$accion_dato.'";                        
                        })
                    </script>';
                }
            }
            //OPERACION PARA CERRAR LA DESPACHOMP
            if (isset($_REQUEST['CERRAR'])) {
                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO


                //CONSULTA QUE EXISTAN REGISTROS EN EL DETALLE PARA DESPACHAR
                $ARRAYDDESPACHOMP2 = $EXIMATERIAPRIMA_ADO->verExistenciaPorDespacho($_REQUEST['IDP']);
                if (empty($ARRAYDDESPACHOMP2)) {
                    // $MENSAJE = "TIENE  QUE HABER AL MENOS UNA EXISTENCIA DE PRODUCTO TERMINADO";
                    $SINO = "1";
                    echo '<script>
                            Swal.fire({
                                icon:"warning",
                                title:"Accion restringida",
                                text:"Tiene que haber al menos un registro de existencia selecionado",
                                showConfirmButton: true,
                                confirmButtonText:"Cerrar",
                                closeOnConfirm:false
                            })
                        </script>';
                } else {
                    $MENSAJE = "";
                    $SINO = "0";
                }
                if ($SINO == "0") {
                    $DESPACHOMP->__SET('FECHA_DESPACHO', $_REQUEST['FECHADESPACHO']);
                    $DESPACHOMP->__SET('CANTIDAD_ENVASE_DESPACHO', $_REQUEST['TOTALENVASE']);
                    $DESPACHOMP->__SET('KILOS_NETO_DESPACHO', $_REQUEST['TOTALNETO']);
                    $DESPACHOMP->__SET('KILOS_BRUTO_DESPACHO', $_REQUEST['TOTALBRUTO']);
                    $DESPACHOMP->__SET('PATENTE_CAMION', $_REQUEST['PATENTEVEHICULOE']);
                    $DESPACHOMP->__SET('PATENTE_CARRO', $_REQUEST['PATENTECARROE']);
                    $DESPACHOMP->__SET('OBSERVACION_DESPACHO', $_REQUEST['OBSERVACIONDESPACHO']);
                    $DESPACHOMP->__SET('ID_CONDUCTOR', $_REQUEST['CONDUCTORE']);
                    $DESPACHOMP->__SET('ID_TRANSPORTE', $_REQUEST['TRANSPORTEE']);
                    $DESPACHOMP->__SET('TDESPACHO', $_REQUEST['TDESPACHOE']);
                    if ($_REQUEST['TDESPACHOE'] == "1") {
                        $DESPACHOMP->__SET('ID_PLANTA2', $_REQUEST['PLANTADESTINOE']);
                        $DESPACHOMP->__SET('NUMERO_GUIA_DESPACHO', $_REQUEST['NUMEROGUIADESPACHO']);
                    }
                    if ($_REQUEST['TDESPACHOE'] == "2") {
                        $DESPACHOMP->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTORE']);
                        $DESPACHOMP->__SET('NUMERO_GUIA_DESPACHO', $_REQUEST['NUMEROGUIADESPACHO']);
                    }
                    if ($_REQUEST['TDESPACHOE'] == "3") {
                        $DESPACHOMP->__SET('ID_COMPRADOR', $_REQUEST['COMPRADORE']);
                        $DESPACHOMP->__SET('NUMERO_GUIA_DESPACHO', $_REQUEST['NUMEROGUIADESPACHO']);
                    }
                    if ($_REQUEST['TDESPACHOE'] == "4") {
                        $DESPACHOMP->__SET('REGALO_DESPACHO', $_REQUEST['REGALOE']);
                    }
                    if ($_REQUEST['TDESPACHOE'] == "5") {
                        $DESPACHOMP->__SET('ID_PLANTA3', $_REQUEST['PLANTAEXTERNAE']);
                        $DESPACHOMP->__SET('NUMERO_GUIA_DESPACHO', $_REQUEST['NUMEROGUIADESPACHO']);
                    }
                    if ($_REQUEST['TDESPACHOE'] == "6") {
                        $DESPACHOMP->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTORE']);
                        $DESPACHOMP->__SET('NUMERO_GUIA_DESPACHO', $_REQUEST['NUMEROGUIADESPACHO']);
                    }
                    $DESPACHOMP->__SET('ID_USUARIOM', $IDUSUARIOS);
                    $DESPACHOMP->__SET('ID_DESPACHO', $_REQUEST['IDP']);
                    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                    $DESPACHOMP_ADO->actualizarDespachomp($DESPACHOMP);

                    $DESPACHOMP->__SET('ID_DESPACHO', $_REQUEST['IDP']);
                    //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                    $DESPACHOMP_ADO->cerrado($DESPACHOMP);

                    $DESPACHOMP->__SET('ID_DESPACHO', $_REQUEST['IDP']);
                    //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                    $DESPACHOMP_ADO->Confirmado($DESPACHOMP);

                    $AUSUARIO_ADO->agregarAusuario2($NUMEROVER,1,3,"".$_SESSION["NOMBRE_USUARIO"].", Cerrar  Despacho Materia Prima.","fruta_despachomp", $_REQUEST['IDP'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

                    $ARRAYEXISENCIADESPACHOMP = $EXIMATERIAPRIMA_ADO->verExistenciaPorDespacho2($_REQUEST['IDP']);
                    foreach ($ARRAYEXISENCIADESPACHOMP as $r) :
                        if ($_REQUEST['TDESPACHOE'] == "1") {
                            $EXIMATERIAPRIMA->__SET('ID_EXIMATERIAPRIMA', $r['ID_EXIMATERIAPRIMA']);
                            $EXIMATERIAPRIMA->__SET('FECHA_DESPACHO', $_REQUEST['FECHADESPACHO']);
                            //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                            $EXIMATERIAPRIMA_ADO->enTransito($EXIMATERIAPRIMA);
                        } else {
                            $EXIMATERIAPRIMA->__SET('ID_EXIMATERIAPRIMA', $r['ID_EXIMATERIAPRIMA']);
                            $EXIMATERIAPRIMA->__SET('FECHA_DESPACHO', $_REQUEST['FECHADESPACHO']);
                            //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                            $EXIMATERIAPRIMA_ADO->despachado($EXIMATERIAPRIMA);
                        }
                    endforeach;

              
                    $ARRAYDESPACHOE = $DESPACHOE_ADO->listarDespachoePorDespachoMPCBX($_REQUEST['IDP']);
                    if(empty($ARRAYDESPACHOE)){
                        $ARRAYNUMERO = $DESPACHOE_ADO->obtenerNumero($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
                        $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;
                        //UTILIZACION METODOS SET DEL MODELO
                        //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO       
                        $DESPACHOE->__SET('NUMERO_DESPACHO', $NUMERO);
                        $DESPACHOE->__SET('FECHA_DESPACHO', $_REQUEST['FECHADESPACHO']);
                        $DESPACHOE->__SET('PATENTE_CAMION', $_REQUEST['PATENTEVEHICULOE']);
                        $DESPACHOE->__SET('PATENTE_CARRO', $_REQUEST['PATENTECARROE']);
                        $DESPACHOE->__SET('OBSERVACIONES', $_REQUEST['OBSERVACIONDESPACHO']);
                        $DESPACHOE->__SET('ID_CONDUCTOR', $_REQUEST['CONDUCTORE']);
                        $DESPACHOE->__SET('ID_TRANSPORTE', $_REQUEST['TRANSPORTEE']);
                        if ($_REQUEST['TDESPACHOE'] == "1") {
                            $DESPACHOE->__SET('ID_PLANTA2', $_REQUEST['PLANTADESTINOE']);
                            $DESPACHOE->__SET('ID_BODEGA2', $_REQUEST['BODEGAD']);
                            $DESPACHOE->__SET('NUMERO_DOCUMENTO', $_REQUEST['NUMEROGUIADESPACHO']);
                            $TDESPACHOE ="2";
                        }
                        if ($_REQUEST['TDESPACHOE'] == "2") {
                            $DESPACHOE->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTORE']);
                            $DESPACHOE->__SET('NUMERO_DOCUMENTO', $_REQUEST['NUMEROGUIADESPACHO']);
                            $TDESPACHOE ="3";
                        }
                        if ($_REQUEST['TDESPACHOE'] == "3") {
                            $DESPACHOE->__SET('ID_COMPRADOR', $_REQUEST['COMPRADOR']);
                            $DESPACHOE->__SET('NUMERO_DOCUMENTO', $_REQUEST['NUMEROGUIADESPACHO']);
                            $TDESPACHOE ="5";
                        }
                        if ($_REQUEST['TDESPACHOE'] == "4") {
                            $DESPACHOE->__SET('REGALO_DESPACHO', $_REQUEST['REGALOE']);
                            $TDESPACHOE ="6";
                        }
                        if ($_REQUEST['TDESPACHOE'] == "5") {
                            $DESPACHOE->__SET('ID_PLANTA3', $_REQUEST['PLANTAEXTERNAE']);
                            $DESPACHOE->__SET('NUMERO_DOCUMENTO', $_REQUEST['NUMEROGUIADESPACHO']);
                            $TDESPACHOE ="7";
                        }         
                        if ($_REQUEST['TDESPACHOE'] == "6") {
                            $DESPACHOE->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTORE']);
                            $DESPACHOE->__SET('NUMERO_DOCUMENTO', $_REQUEST['NUMEROGUIADESPACHO']);
                            $TDESPACHOE ="8";
                        }         
                        $DESPACHOE->__SET('TDESPACHO', $TDESPACHOE);
                        $DESPACHOE->__SET('ID_BODEGAO', $_REQUEST['BODEGA']);
                        $DESPACHOE->__SET('ID_TDOCUMENTO', $_REQUEST['TDOCUMENTO']);
                        $DESPACHOE->__SET('ID_EMPRESA', $_REQUEST['EMPRESAE']);
                        $DESPACHOE->__SET('ID_PLANTA', $_REQUEST['PLANTAE']);
                        $DESPACHOE->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADAE']);
                        $DESPACHOE->__SET('ID_DESPACHOMP', $_REQUEST['IDP']);
                        $DESPACHOE->__SET('ID_USUARIOI', $IDUSUARIOS);
                        $DESPACHOE->__SET('ID_USUARIOM', $IDUSUARIOS);
                        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                        $DESPACHOE_ADO->agregarDespachoeMp($DESPACHOE);

                        $ARRYAOBTENERIDE = $DESPACHOE_ADO->obtenerId(
                            $_REQUEST['FECHADESPACHO'],
                            $_REQUEST['EMPRESA'],
                            $_REQUEST['PLANTA'],
                            $_REQUEST['TEMPORADA']
                        );              
                        $DESPACHOE->__SET('ID_DESPACHO', $ARRYAOBTENERIDE[0]["ID_DESPACHO"]);
                        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                        $DESPACHOE_ADO->cerrado($DESPACHOE);
                        
                        $AUSUARIO_ADO->agregarAusuario2($NUMERO,1,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Despacho Envases, Origen Despacho Materia Prima .","material_despachoe", $ARRYAOBTENERIDE[0]['ID_DESPACHO'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  
    
                        $ARRAYINVENTARIOE = $INVENTARIOE_ADO->buscarPorDespacho2($ARRYAOBTENERIDE[0]["ID_DESPACHO"]);
                        if(empty($ARRAYINVENTARIOE)){
                            $ARRAYTOMADOAGRUPADO=$EXIMATERIAPRIMA_ADO->buscarPorDespachoAgrupadoEstandarProducto($_REQUEST['IDP']);
                            foreach ($ARRAYTOMADOAGRUPADO as $r ) {                            
                                $INVENTARIOE->__SET('TDESPACHOE',  $_REQUEST['TDESPACHOE']);
                                $INVENTARIOE->__SET('CANTIDAD_SALIDA', $r["ENVASE"]);
                                $INVENTARIOE->__SET('VALOR_UNITARIO', 0);
                                $INVENTARIOE->__SET('ID_EMPRESA', $_REQUEST['EMPRESAE']);
                                $INVENTARIOE->__SET('ID_PLANTA', $_REQUEST['PLANTAE']);
                                $INVENTARIOE->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADAE']);
                                $INVENTARIOE->__SET('ID_BODEGA',  $_REQUEST['BODEGA']);
                                $INVENTARIOE->__SET('ID_PRODUCTO', $r["ID_PRODUCTO"]);
                                $INVENTARIOE->__SET('ID_TUMEDIDA', $r["ID_TUMEDIDA"]);
                                $INVENTARIOE->__SET('ID_DESPACHO', $ARRYAOBTENERIDE[0]["ID_DESPACHO"]);
                                $INVENTARIOE_ADO->agregarInventarioDespacho($INVENTARIOE);
                                $AUSUARIO_ADO->agregarAusuario2("NULL",1,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de detalle de Despacho Envases, Origen Despacho Materia Prima..","material_inventarioe", "NULL" ,$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  
                            } 
                        }                        
                        $ARRAYINVENTARIOETOTALES = $INVENTARIOE_ADO->obtenerTotalesInventarioPorDespachoCBX($ARRYAOBTENERIDE[0]["ID_DESPACHO"]);   
                        $DESPACHOE->__SET('CANTIDAD_DESPACHO', $ARRAYINVENTARIOETOTALES[0]["CANTIDAD"]);
                        $DESPACHOE->__SET('ID_DESPACHO', $ARRYAOBTENERIDE[0]["ID_DESPACHO"]);
                        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                        $DESPACHOE_ADO->cerrarActualizarcantidad($DESPACHOE);

                        
                        $DESPACHOE->__SET('ID_DESPACHO', $ARRYAOBTENERIDE[0]["ID_DESPACHO"]);
                        //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                        $DESPACHOE_ADO->Confirmado($DESPACHOE);
                    }else{             
                        $DESPACHOE->__SET('FECHA_DESPACHO', $_REQUEST['FECHADESPACHO']);
                        $DESPACHOE->__SET('PATENTE_CAMION', $_REQUEST['PATENTEVEHICULOE']);
                        $DESPACHOE->__SET('PATENTE_CARRO', $_REQUEST['PATENTECARROE']);
                        $DESPACHOE->__SET('OBSERVACIONES', $_REQUEST['OBSERVACIONDESPACHO']);
                        $DESPACHOE->__SET('ID_CONDUCTOR', $_REQUEST['CONDUCTORE']);
                        $DESPACHOE->__SET('ID_TRANSPORTE', $_REQUEST['TRANSPORTEE']);
                        if ($_REQUEST['TDESPACHOE'] == "1") {
                            $DESPACHOE->__SET('ID_PLANTA2', $_REQUEST['PLANTADESTINOE']);
                            $DESPACHOE->__SET('ID_BODEGA2', $_REQUEST['BODEGAD']);
                            $DESPACHOE->__SET('NUMERO_DOCUMENTO', $_REQUEST['NUMEROGUIADESPACHO']);
                            $TDESPACHOE ="2";
                        }
                        if ($_REQUEST['TDESPACHOE'] == "2") {
                            $DESPACHOE->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTORE']);
                            $DESPACHOE->__SET('NUMERO_DOCUMENTO', $_REQUEST['NUMEROGUIADESPACHO']);
                            $TDESPACHOE ="3";
                        }
                        if ($_REQUEST['TDESPACHOE'] == "3") {
                            $DESPACHOE->__SET('ID_COMPRADOR', $_REQUEST['COMPRADOR']);
                            $DESPACHOE->__SET('NUMERO_DOCUMENTO', $_REQUEST['NUMEROGUIADESPACHO']);
                            $TDESPACHOE ="5";
                        }
                        if ($_REQUEST['TDESPACHOE'] == "4") {
                            $DESPACHOE->__SET('REGALO_DESPACHO', $_REQUEST['REGALOE']);
                            $TDESPACHOE ="6";
                        }
                        if ($_REQUEST['TDESPACHOE'] == "5") {
                            $DESPACHOE->__SET('ID_PLANTA3', $_REQUEST['PLANTAEXTERNAE']);
                            $DESPACHOE->__SET('NUMERO_DOCUMENTO', $_REQUEST['NUMEROGUIADESPACHO']);
                            $TDESPACHOE ="7";
                        }  
                        if ($_REQUEST['TDESPACHOE'] == "6") {
                            $DESPACHOE->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTORE']);
                            $DESPACHOE->__SET('NUMERO_DOCUMENTO', $_REQUEST['NUMEROGUIADESPACHO']);
                            $TDESPACHOE ="8";
                        }                  
                        $DESPACHOE->__SET('TDESPACHO', $TDESPACHOE);
                        $DESPACHOE->__SET('ID_BODEGAO', $_REQUEST['BODEGA']);
                        $DESPACHOE->__SET('ID_TDOCUMENTO', $_REQUEST['TDOCUMENTOE']);
                        $DESPACHOE->__SET('ID_DESPACHOMP', $_REQUEST['IDP']);
                        $DESPACHOE->__SET('ID_USUARIOM', $IDUSUARIOS);
                        $DESPACHOE->__SET('ID_DESPACHO', $ARRAYDESPACHOE[0]["ID_DESPACHO"]);
                        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                        $DESPACHOE_ADO->actualizarDespachoe($DESPACHOE);

                        $AUSUARIO_ADO->agregarAusuario2($NUMEROVER,1,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de Despacho Envases. Origen Despacho Materia Prima.","material_despachoe", $_REQUEST['IDP'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  
                        
                        $ARRAYINVENTARIOE = $INVENTARIOE_ADO->buscarPorDespacho2($ARRAYDESPACHOE[0]["ID_DESPACHO"]);
                        
                        if(empty($ARRAYINVENTARIOE)){
                            $ARRAYTOMADOAGRUPADO=$EXIMATERIAPRIMA_ADO->buscarPorDespachoAgrupadoEstandarProducto($_REQUEST['IDP']);//no trae
                            //flag 1
                           // die('testzz'); 
                            foreach ($ARRAYTOMADOAGRUPADO as $r ) {      
                                                     
                                $INVENTARIOE->__SET('TDESPACHOE',  $_REQUEST['TDESPACHOE']);
                                $INVENTARIOE->__SET('CANTIDAD_SALIDA', $r["ENVASE"]);
                                $INVENTARIOE->__SET('VALOR_UNITARIO', 0);
                                $INVENTARIOE->__SET('ID_EMPRESA', $ARRAYDESPACHOE[0]["ID_EMPRESA"]);
                                $INVENTARIOE->__SET('ID_PLANTA', $ARRAYDESPACHOE[0]["ID_PLANTA"]);
                                $INVENTARIOE->__SET('ID_TEMPORADA', $ARRAYDESPACHOE[0]["ID_TEMPORADA"]);
                                $INVENTARIOE->__SET('ID_BODEGA',  $_REQUEST['BODEGA']);
                                $INVENTARIOE->__SET('ID_PRODUCTO', $r["ID_PRODUCTO"]);
                                $INVENTARIOE->__SET('ID_TUMEDIDA', $r["ID_TUMEDIDA"]);
                                $INVENTARIOE->__SET('ID_DESPACHO', $ARRAYDESPACHOE[0]["ID_DESPACHO"]);
                                $INVENTARIOE_ADO->agregarInventarioDespacho($INVENTARIOE);
                                $AUSUARIO_ADO->agregarAusuario2("NULL",1,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de detalle de Despacho Envases, Origen Despacho Materia Prima..","material_inventarioe", "NULL" ,$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  
                            } 
                        }                        
                        $ARRAYINVENTARIOETOTALES = $INVENTARIOE_ADO->obtenerTotalesInventarioPorDespachoCBX($ARRAYDESPACHOE[0]["ID_DESPACHO"]);   
                        $DESPACHOE->__SET('CANTIDAD_DESPACHO', $ARRAYINVENTARIOETOTALES[0]["CANTIDAD"]);
                        $DESPACHOE->__SET('ID_DESPACHO', $ARRAYDESPACHOE[0]["ID_DESPACHO"]);
                        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                        $DESPACHOE_ADO->cerrarActualizarcantidad($DESPACHOE);
                        
                        $DESPACHOE->__SET('ID_DESPACHO', $ARRAYDESPACHOE[0]["ID_DESPACHO"]);
                        //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                        $DESPACHOE_ADO->Confirmado($DESPACHOE);
                    }

                    
                    //REDIRECCIONAR A PAGINA registroDespachomp.php
                    //SEGUNE EL TIPO DE OPERACIONS QUE SE INDENTIFIQUE EN LA URL     
                    if ($accion_dato == "crear") {
                        $id_dato = $_REQUEST['IDP'];
                        $accion_dato = "ver";
                        echo '<script>
                            Swal.fire({
                                icon:"info",
                                title:"Registro Cerrado",
                                text:"Este despacho se encuentra cerrada y no puede ser modificada.",
                                showConfirmButton: true,
                                confirmButtonText:"Cerrar",
                                closeOnConfirm:false
                            }).then((result)=>{
                                location.href = "registroDespachomp.php?op&id='.$id_dato.'&a='.$accion_dato.'";                            
                            })
                        </script>';
                    }
                    if ($accion_dato == "editar") {
                        $id_dato = $_REQUEST['IDP'];
                        $accion_dato = "ver";
                        echo '<script>
                            Swal.fire({
                                icon:"info",
                                title:"Registro Cerrado",
                                text:"Este despacho se encuentra cerrada y no puede ser modificada.",
                                showConfirmButton: true,
                                confirmButtonText:"Cerrar",
                                closeOnConfirm:false
                            }).then((result)=>{
                                location.href = "registroDespachomp.php?op&id='.$id_dato.'&a='.$accion_dato.'";                            
                            })
                        </script>';
                    }                        
                    
                }
            }
            if (isset($_REQUEST['QUITAR'])) {
                $IDQUITAR = $_REQUEST['IDQUITAR'];
                $EXIMATERIAPRIMA->__SET('ID_EXIMATERIAPRIMA', $IDQUITAR);
                // LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $EXIMATERIAPRIMA_ADO->actualizarDeselecionarDespachoCambiarEstado($EXIMATERIAPRIMA);

                $AUSUARIO_ADO->agregarAusuario2("NULL",1,2,"".$_SESSION["NOMBRE_USUARIO"].", Se Quito la Existencia al despacho de materia prima.","fruta_eximateriaprima", "NULL" ,$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  


                echo '<script>
                    Swal.fire({
                        icon:"error",
                        title:"Accion realizada",
                        text:"Se ha quitado la existencia del despacho.",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroDespachomp.php?op&id='.$id_dato.'&a='.$accion_dato.'";                            
                    })
                </script>';
            }
            ?>
</body>

</html>