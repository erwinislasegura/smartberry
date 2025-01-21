<?php

include_once "../../assest/config/validarUsuarioFruta.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES¿

include_once '../../assest/controlador/EEXPORTACION_ADO.php';
include_once '../../assest/controlador/EXIEXPORTACION_ADO.php';
include_once '../../assest/controlador/DESPACHOEX_ADO.php';
include_once '../../assest/controlador/PCDESPACHO_ADO.php';



include_once '../../assest/controlador/TMANEJO_ADO.php';
include_once '../../assest/controlador/TCALIBRE_ADO.php';
include_once '../../assest/controlador/TEMBALAJE_ADO.php';


include_once '../../assest/controlador/VESPECIES_ADO.php';
include_once '../../assest/controlador/TRANSPORTE_ADO.php';


include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/ICARGA_ADO.php';
include_once '../../assest/controlador/CONDUCTOR_ADO.php';
include_once '../../assest/controlador/INPECTOR_ADO.php';
include_once '../../assest/controlador/CONTRAPARTE_ADO.php';


include_once '../../assest/controlador/RFINAL_ADO.php';
include_once '../../assest/controlador/EXPORTADORA_ADO.php';
include_once '../../assest/controlador/AGCARGA_ADO.php';
include_once '../../assest/controlador/DFINAL_ADO.php';
include_once '../../assest/controlador/PAIS_ADO.php';
include_once '../../assest/controlador/MERCADO_ADO.php';

include_once '../../assest/controlador/TRANSPORTE_ADO.php';
include_once '../../assest/controlador/LCARGA_ADO.php';
include_once '../../assest/controlador/LDESTINO_ADO.php';

include_once '../../assest/controlador/LAEREA_ADO.php';
include_once '../../assest/controlador/ACARGA_ADO.php';
include_once '../../assest/controlador/ADESTINO_ADO.php';

include_once '../../assest/controlador/NAVIERA_ADO.php';
include_once '../../assest/controlador/PCARGA_ADO.php';
include_once '../../assest/controlador/PDESTINO_ADO.php';


include_once '../../assest/modelo/DESPACHOEX.php';
include_once '../../assest/modelo/EXIEXPORTACION.php';
include_once '../../assest/modelo/PCDESPACHO.php';
include_once '../../assest/modelo/ICARGA.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR¿

$DESPACHOEX_ADO =  new DESPACHOEX_ADO();
$PCDESPACHO_ADO =  new PCDESPACHO_ADO();


$TMANEJO_ADO =  new TMANEJO_ADO();
$TCALIBRE_ADO =  new TCALIBRE_ADO();
$TEMBALAJE_ADO =  new TEMBALAJE_ADO();


$TRANSPORTE_ADO =  new TRANSPORTE_ADO();
$CONDUCTOR_ADO =  new CONDUCTOR_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$PRODUCTOR_ADO = new PRODUCTOR_ADO();
$INPECTOR_ADO =  new INPECTOR_ADO();
$CONTRAPARTE_ADO =  new CONTRAPARTE_ADO();

$EEXPORTACION_ADO = new EEXPORTACION_ADO();
$EXIEXPORTACION_ADO = new EXIEXPORTACION_ADO();
$ICARGA_ADO =  new ICARGA_ADO();

$EXPORTADORA_ADO =  new EXPORTADORA_ADO();
$RFINAL_ADO =  new RFINAL_ADO();
$AGCARGA_ADO =  new AGCARGA_ADO();
$DFINAL_ADO =  new DFINAL_ADO();
$PAIS_ADO =  new PAIS_ADO();
$MERCADO_ADO =  new MERCADO_ADO();

$TRANSPORTE_ADO =  new TRANSPORTE_ADO();
$LCARGA_ADO =  new LCARGA_ADO();
$LDESTINO_ADO =  new LDESTINO_ADO();

$LAEREA_ADO =  new LAEREA_ADO();
$ACARGA_ADO =  new ACARGA_ADO();
$ADESTINO_ADO =  new ADESTINO_ADO();

$NAVIERA_ADO =  new NAVIERA_ADO();
$PCARGA_ADO =  new PCARGA_ADO();
$PDESTINO_ADO =  new PDESTINO_ADO();

//INIICIALIZAR MODELO EXIEXPORTACION
$DESPACHOEX =  new DESPACHOEX();
$EXIEXPORTACION =  new EXIEXPORTACION();
$PCDESPACHO =  new PCDESPACHO();
$ICARGA =  new ICARGA();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$NUMERO = "";
$NUMEROVER = "";
$IDDESPACHOEX = "";
$FECHAINGRESODESPACHOEX = "";
$FECHAMODIFCIACIONDESPACHOEX = "";
$CANTIDADENVASEDESPACHOEX = "";
$KILOSNETODESPACHOEX = "";
$KILOSBRUTODESPACHOEX = "";
$TERMOGRAFODESPACHOEX = "";
$INPECTOR = "";
$CONTRAPARTE = "";
$FECHADESPACHOEX = "";
$NUMEROSELLO = "";
$FECHAGUIA = "";
$NUMEROGUIA = "";
$PDE = "";
$OBSERVACIONDESPACHOEX = "";
$CONDUCTOR = "";
$PATENTECAMION = "";
$PATENTECARRO = "";
$TRANSPORTE = "";
$ESTADO = "";
$TOTALENVASE = "";
$TOTALNETO = "";
$TOTALBRUTO = "";
$TOTALENVASEV = "";
$TOTALNETOV = "";
$TOTALBRUTOV = "";
$NUMEROCONTENDORDESPACHOEX = "";
$NUMEROPLANILLADESPACHOEX = "";
$SNICARGA = "";
$SNICARGAR = "";
$TINPUSDA="";



$IDEXIEXPORTACIONQUITAR = "";
$FOLIOEXIEXPORTACIONQUITAR = "";
$ICARGAD = "";
$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";

$IDEMPRESA = "";
$IDPLANTA = "";
$IDTEMPORADA = "";


$TEMBARQUE = "";
$FECHAETD = "";
$FECHAETA = "";
$BOOKINGINSTRUCTIVO = "";

$EXPORTADORA = "";
$RFINAL = "";
$AGCARGA = "";
$DFINAL = "";
$PAIS = "";
$MERCADO = "";

$CRT = "";
$TRANSPORTE2 = "";
$TVEHICULO = "";
$LCARGA = "";
$LDESTINO = "";

$LAEREA = "";
$AEROLINIA = "";
$AERONAVE = "";
$NVUELO = "";
$ACARGA = "";
$ADESTINO = "";

$NAVIERA = "";
$NAVE = "";
$FECHASTACKING = "";
$NVIAJE = "";
$PCARGA = "";
$PDESTINO = "";

$SINO = "";
$IDOP = "";
$OP = "";
$ID = "";

$IDEXIEXPORTACIONTERMOGRAFO = "";
$FOLIOEXIEXPORTACIONTERMOGRAFO = "";
$IDDESPACHO = "";
$IDTERMOGRAFO = "";
$CONTADOR = 0;
$TERMOGRAFO= "";


$EEXPORTACION = "";
$VESPECIES = "";
$CALIBRE = "";
$PRODUCTOR = "";

$DISABLEDP = "";
$DISABLEDT = "";
$DISABLED = "";
$DISABLED2 = "";
$DISABLED3 = "";
$DISABLED4 = "";
$DISABLEDSTYLE = "";

$MENSAJE = "";
$MENSAJE2 = "";
$MENSAJE3 = "";
$MENSAJEVALIDATO = "";


//INICIALIZAR ARREGLOS

$ARRAYEMPRESA = "";
$ARRAYPLANTA = "";
$ARRAYTEMPORADA = "";

$ARRAYDESPACHOEX = "";
$ARRAYDESPACHOEX2 = "";
$ARRAYPCDESPACHO = "";
$ARRAYTRANSPORTE = "";
$ARRAYVEHICULO = "";
$ARRAYCONDUCTOR = "";
$ARRAYPVESPECIES = "";
$ARRAYESTANDAR = "";
$ARRAYFECHAACTUAL = "";
$ARRAYICARGA = "";
$ARRAYVERICARGA = "";
$ARRAYVERICARGA2 = "";
$ARRAYCONTRAPARTE = "";
$ARRAYINPECTOR = "";


$ARRAYEXPORTADORA = "";
$ARRAYRFINAL = "";
$ARRAYAGCARGA = "";
$ARRAYDFINAL = "";
$ARRAYPAIS = "";
$ARRAYMERCADO = "";

$ARRAYTRANSPORTE = "";
$ARRAYTVEHICULO = "";
$ARRAYLCARGA = "";
$ARRAYLDESTINO = "";

$ARRAYLAEREA = "";
$ARRAYAEROLINIA = "";
$ARRAYAERONAVE = "";
$ARRAYACARGA = "";
$ARRAYADESTINO = "";

$ARRAYNAVIERA = "";
$ARRAYNAVE = "";
$ARRAYPCARGA = "";
$ARRAYPDESTINO = "";


$ARRAYTOMADO = "";
$ARRAYDESPACHOTOMADO = "";
$ARRAYNUMERO = "";
$ARRAYDESPACHOTOTAL = "";
$ARRAYDESPACHOTOTAL2 = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYTRANSPORTE = $TRANSPORTE_ADO->listarTransportePorEmpresaCBX($EMPRESAS);
$ARRAYCONDUCTOR = $CONDUCTOR_ADO->listarConductorPorEmpresaCBX($EMPRESAS);
$ARRAYICARGA = $ICARGA_ADO->listarIcargaConfirmadoCBX($EMPRESAS, $TEMPORADAS);
$ARRAYCONTRAPARTE =  $CONTRAPARTE_ADO->listarContrapartePorEmpresaCBX($EMPRESAS);
$ARRAYINPECTOR = $INPECTOR_ADO->listarInpectorPorEmpresaCBX($EMPRESAS);
$ARRAYEXPORTADORA = $EXPORTADORA_ADO->listarExportadoraCBX();
$ARRAYRFINAL = $RFINAL_ADO->listarRfinalPorEmpresaCBX($EMPRESAS);
$ARRAYAGCARGA = $AGCARGA_ADO->listarAgcargaPorEmpresaCBX($EMPRESAS);
$ARRAYDFINAL = $DFINAL_ADO->listarDfinalPorEmpresaCBX($EMPRESAS);
$ARRAYPAIS = $PAIS_ADO->listarPaisCBX();
$ARRAYMERCADO = $MERCADO_ADO->listarMercadoPorEmpresaCBX($EMPRESAS);

$ARRAYTRANSPORTE = $TRANSPORTE_ADO->listarTransportePorEmpresaCBX($EMPRESAS);
$ARRAYLCARGA = $LCARGA_ADO->listarLcargaPorEmpresaCBX($EMPRESAS);
$ARRAYLDESTINO = $LDESTINO_ADO->listarLdestinoPorEmpresaCBX($EMPRESAS);

$ARRAYLAEREA = $LAEREA_ADO->listarLaereaPorEmpresaCBX($EMPRESAS);
$ARRAYACARGA = $ACARGA_ADO->listarAcargaPorEmpresaCBX($EMPRESAS);
$ARRAYADESTINO = $ADESTINO_ADO->listarAdestinoPorEmpresaCBX($EMPRESAS);

$ARRAYNAVIERA = $NAVIERA_ADO->listarNavierPorEmpresaCBX($EMPRESAS);
$ARRAYPCARGA = $PCARGA_ADO->listarPcargaPorEmpresaCBX($EMPRESAS);
$ARRAYPDESTINO = $PDESTINO_ADO->listarPdestinoPorEmpresaCBX($EMPRESAS);

$ARRAYFECHAACTUAL = $DESPACHOEX_ADO->obtenerFecha();
$FECHADESPACHOEX = $ARRAYFECHAACTUAL[0]['FECHA'];
$FECHAGUIA = $ARRAYFECHAACTUAL[0]['FECHA'];
$FECHAETA = $ARRAYFECHAACTUAL[0]['FECHA'];
$FECHAETD = $ARRAYFECHAACTUAL[0]['FECHA'];
$FECHASTACKING = $ARRAYFECHAACTUAL[0]['FECHA'];

include_once "../../assest/config/validarDatosUrl.php";
include_once "../../assest/config/datosUrlD.php";


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


    $ARRAYTOMADO = $EXIEXPORTACION_ADO->buscarPordespachoEx2($IDOP);
    $ARRAYDESPACHOTOTAL = $EXIEXPORTACION_ADO->obtenerTotalesDespachoEx($IDOP);
    $ARRAYDESPACHOTOTAL2 = $EXIEXPORTACION_ADO->obtenerTotalesDespachoEx2($IDOP);


    $TOTALENVASE = $ARRAYDESPACHOTOTAL[0]['ENVASE'];
    $TOTALNETO = $ARRAYDESPACHOTOTAL[0]['NETO'];
    $TOTALBRUTO = $ARRAYDESPACHOTOTAL[0]['BRUTO'];


    $TOTALENVASEV = $ARRAYDESPACHOTOTAL2[0]['ENVASE'];
    $TOTALNETOV = $ARRAYDESPACHOTOTAL2[0]['NETO'];
    $TOTALBRUTOV = $ARRAYDESPACHOTOTAL2[0]['BRUTO'];
    
    if(empty($ARRAYTOMADO)){
        $DISABLEDT="disabled";
    }else{
        $DISABLEDT="";
    }


    //FUNCION PARA LA OBTENCION DE LOS TOTALES DEL DETALLE ASOCIADO A DESPACHOEX
    //IDENTIFICACIONES DE OPERACIONES
    //crear =  OBTENCION DE DATOS INICIALES PARA PODER CREAR LA DESPACHOEX
    if ($OP == "crear") {

        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $DISABLED = "disabled";
        $DISABLED2 = "";
        $DISABLED3 = "disabled";
        $DISABLED4 = "disabled";
        $DISABLEDMENU = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        $ARRAYDESPACHOEX = $DESPACHOEX_ADO->verDespachoex($IDOP);
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYDESPACHOEX as $r) :
            $IDDESPACHOEX = $IDOP;
            $NUMEROVER = "" . $r['NUMERO_DESPACHOEX'];
            $FECHADESPACHOEX = "" . $r['FECHA_DESPACHOEX'];
            $FECHAINGRESODESPACHOEX = "" . $r['INGRESO'];
            $FECHAMODIFCIACIONDESPACHOEX = "" . $r['MODIFICACION'];
            $NUMEROSELLO = "" . $r['NUMERO_SELLO_DESPACHOEX'];
            $NUMEROCONTENDORDESPACHOEX = "" . $r['NUMERO_CONTENEDOR_DESPACHOEX'];
            $NUMEROPLANILLADESPACHOEX =  "" . $r['NUMERO_PLANILLA_DESPACHOEX'];
            if( strlen($NUMEROPLANILLADESPACHOEX)==0){
                $DISABLEDP="disabled";
            }else{
                $DISABLEDP="";
            }
            $TERMOGRAFODESPACHOEX =  "" . $r['TERMOGRAFO_DESPACHOEX'];
            $FECHAGUIA = "" . $r['FECHA_GUIA_DESPACHOEX'];
            $NUMEROGUIA = "" . $r['NUMERO_GUIA_DESPACHOEX'];
            $OBSERVACIONDESPACHOEX = "" . $r['OBSERVACION_DESPACHOEX'];
            $PATENTECAMION = "" . $r['PATENTE_CAMION'];
            $PATENTECARRO = "" . $r['PATENTE_CARRO'];
            $INPECTOR =  "" . $r['ID_INPECTOR'];
            $CONTRAPARTE =  "" . $r['ID_CONTRAPARTE'];
            $TRANSPORTE = "" . $r['ID_TRANSPORTE'];
            $CONDUCTOR = "" . $r['ID_CONDUCTOR'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            if ($r['SNICARGA'] == "1") {
                $SNICARGA = "on";
                $ARRAYICARGA = $ICARGA_ADO->listarIcargaEmpresaTemporadaCBX($EMPRESA, $TEMPORADA);
                $ICARGAD  = "" . $r['ID_ICARGA'];
            } else {
                $SNICARGA = "";
            }
            $TEMBARQUE = $r['TEMBARQUE_DESPACHOEX'];
            $FECHAETD = $r['FECHAETD_DESPACHOEX'];
            $FECHAETA = $r['FECHAETA_DESPACHOEX'];
            $BOOKINGINSTRUCTIVO = $r['BOOKING_DESPACHOEX'];
            $EXPORTADORA = $r['ID_EXPPORTADORA'];
            $RFINAL = $r['ID_RFINAL'];
            $AGCARGA = $r['ID_AGCARGA'];
            $DFINAL = $r['ID_DFINAL'];
            $PAIS = $r['ID_PAIS'];
            $MERCADO = $r['ID_MERCADO'];
            if ($TEMBARQUE) {
                if ($TEMBARQUE == "1") {
                    $CRT = $r['CRT_DESPACHOEX'];
                    $TRANSPORTE2 = $r['ID_TRANSPORTE2'];
                    $LCARGA = $r['ID_LCARGA'];
                    $LDESTINO = $r['ID_LDESTINO'];
                }
                if ($TEMBARQUE == "2") {
                    $LAEREA = $r['ID_LAREA'];
                    $NVIAJE = $r['NVIAJE_DESPACHOEX'];
                    $NAVE = $r['NAVE_DESPACHOEX'];
                    $ACARGA = $r['ID_ACARGA'];
                    $ADESTINO = $r['ID_ADESTINO'];
                }
                if ($TEMBARQUE == "3") {
                    $FECHASTACKING = $r['FECHASTACKING_DESPACHOEX'];
                    $NAVIERA = $r['ID_NAVIERA'];
                    $NAVE = $r['NAVE_DESPACHOEX'];
                    $NVIAJE = $r['NVIAJE_DESPACHOEX'];
                    $PCARGA = $r['ID_PCARGA'];
                    $PDESTINO = $r['ID_PDESTINO'];
                }
            }
            $TINPUSDA= "" . $r['TINPUSDA'];       
            $ESTADO = "" . $r['ESTADO'];
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
        $DISABLED4 = "disabled";
        $DISABLEDMENU = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $ARRAYDESPACHOEX = $DESPACHOEX_ADO->verDespachoex($IDOP);
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYDESPACHOEX as $r) :
            $IDDESPACHOEX = $IDOP;
            $NUMEROVER = "" . $r['NUMERO_DESPACHOEX'];
            $FECHADESPACHOEX = "" . $r['FECHA_DESPACHOEX'];
            $FECHAINGRESODESPACHOEX = "" . $r['INGRESO'];
            $FECHAMODIFCIACIONDESPACHOEX = "" . $r['MODIFICACION'];
            $NUMEROSELLO = "" . $r['NUMERO_SELLO_DESPACHOEX'];
            $NUMEROCONTENDORDESPACHOEX = "" . $r['NUMERO_CONTENEDOR_DESPACHOEX'];
            $NUMEROPLANILLADESPACHOEX =  "" . $r['NUMERO_PLANILLA_DESPACHOEX'];
            if( strlen($NUMEROPLANILLADESPACHOEX)==0){
                $DISABLEDP="disabled";
            }else{
                $DISABLEDP="";
            }
            $TERMOGRAFODESPACHOEX =  "" . $r['TERMOGRAFO_DESPACHOEX'];
            $FECHAGUIA = "" . $r['FECHA_GUIA_DESPACHOEX'];
            $NUMEROGUIA = "" . $r['NUMERO_GUIA_DESPACHOEX'];
            $OBSERVACIONDESPACHOEX = "" . $r['OBSERVACION_DESPACHOEX'];
            $PATENTECAMION = "" . $r['PATENTE_CAMION'];
            $PATENTECARRO = "" . $r['PATENTE_CARRO'];
            $INPECTOR =  "" . $r['ID_INPECTOR'];
            $CONTRAPARTE =  "" . $r['ID_CONTRAPARTE'];
            $TRANSPORTE = "" . $r['ID_TRANSPORTE'];
            $CONDUCTOR = "" . $r['ID_CONDUCTOR'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            if ($r['SNICARGA'] == "1") {
                $SNICARGA = "on";
                $ARRAYICARGA = $ICARGA_ADO->listarIcargaEmpresaTemporadaCBX($EMPRESA, $TEMPORADA);
                $ICARGAD  = "" . $r['ID_ICARGA'];
            } else {
                $SNICARGA = "";
            }
            $TEMBARQUE = $r['TEMBARQUE_DESPACHOEX'];
            $FECHAETD = $r['FECHAETD_DESPACHOEX'];
            $FECHAETA = $r['FECHAETA_DESPACHOEX'];
            $BOOKINGINSTRUCTIVO = $r['BOOKING_DESPACHOEX'];
            $EXPORTADORA = $r['ID_EXPPORTADORA'];
            $RFINAL = $r['ID_RFINAL'];
            $AGCARGA = $r['ID_AGCARGA'];
            $DFINAL = $r['ID_DFINAL'];
            $PAIS = $r['ID_PAIS'];
            $MERCADO = $r['ID_MERCADO'];
            if ($TEMBARQUE) {
                if ($TEMBARQUE == "1") {
                    $CRT = $r['CRT_DESPACHOEX'];
                    $TRANSPORTE2 = $r['ID_TRANSPORTE2'];
                    $LCARGA = $r['ID_LCARGA'];
                    $LDESTINO = $r['ID_LDESTINO'];
                }
                if ($TEMBARQUE == "2") {
                    $LAEREA = $r['ID_LAREA'];
                    $NVIAJE = $r['NVIAJE_DESPACHOEX'];
                    $NAVE = $r['NAVE_DESPACHOEX'];
                    $ACARGA = $r['ID_ACARGA'];
                    $ADESTINO = $r['ID_ADESTINO'];
                }
                if ($TEMBARQUE == "3") {
                    $FECHASTACKING = $r['FECHASTACKING_DESPACHOEX'];
                    $NAVIERA = $r['ID_NAVIERA'];
                    $NAVE = $r['NAVE_DESPACHOEX'];
                    $NVIAJE = $r['NVIAJE_DESPACHOEX'];
                    $PCARGA = $r['ID_PCARGA'];
                    $PDESTINO = $r['ID_PDESTINO'];
                }
            }
            $TINPUSDA= "" . $r['TINPUSDA']; 
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }
    //ver =  OBTENCION DE DATOS PARA LA VISUALIZACION DEL REGISTRO
    if ($OP == "ver") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        $DISABLED4 = "disabled";
        $DISABLEDMENU = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYDESPACHOEX = $DESPACHOEX_ADO->verDespachoex($IDOP);
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYDESPACHOEX as $r) :
            $IDDESPACHOEX = $IDOP;
            $NUMEROVER = "" . $r['NUMERO_DESPACHOEX'];
            $FECHADESPACHOEX = "" . $r['FECHA_DESPACHOEX'];
            $FECHAINGRESODESPACHOEX = "" . $r['INGRESO'];
            $FECHAMODIFCIACIONDESPACHOEX = "" . $r['MODIFICACION'];
            $NUMEROSELLO = "" . $r['NUMERO_SELLO_DESPACHOEX'];
            $NUMEROCONTENDORDESPACHOEX = "" . $r['NUMERO_CONTENEDOR_DESPACHOEX'];
            $NUMEROPLANILLADESPACHOEX =  "" . $r['NUMERO_PLANILLA_DESPACHOEX'];
            if( strlen($NUMEROPLANILLADESPACHOEX)==0){
                $DISABLEDP="disabled";
            }else{
                $DISABLEDP="";
            }
            $TERMOGRAFODESPACHOEX =  "" . $r['TERMOGRAFO_DESPACHOEX'];
            $FECHAGUIA = "" . $r['FECHA_GUIA_DESPACHOEX'];
            $NUMEROGUIA = "" . $r['NUMERO_GUIA_DESPACHOEX'];
            $OBSERVACIONDESPACHOEX = "" . $r['OBSERVACION_DESPACHOEX'];
            $PATENTECAMION = "" . $r['PATENTE_CAMION'];
            $PATENTECARRO = "" . $r['PATENTE_CARRO'];
            $INPECTOR =  "" . $r['ID_INPECTOR'];
            $CONTRAPARTE =  "" . $r['ID_CONTRAPARTE'];
            $TRANSPORTE = "" . $r['ID_TRANSPORTE'];
            $CONDUCTOR = "" . $r['ID_CONDUCTOR'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            if ($r['SNICARGA'] == "1") {
                $SNICARGA = "on";
                $ARRAYICARGA = $ICARGA_ADO->listarIcargaEmpresaTemporadaCBX($EMPRESA, $TEMPORADA);
                $ICARGAD  = "" . $r['ID_ICARGA'];
            } else {
                $SNICARGA = "";
            }
            $TEMBARQUE = $r['TEMBARQUE_DESPACHOEX'];
            $FECHAETD = $r['FECHAETD_DESPACHOEX'];
            $FECHAETA = $r['FECHAETA_DESPACHOEX'];
            $BOOKINGINSTRUCTIVO = $r['BOOKING_DESPACHOEX'];
            $EXPORTADORA = $r['ID_EXPPORTADORA'];
            $RFINAL = $r['ID_RFINAL'];
            $AGCARGA = $r['ID_AGCARGA'];
            $DFINAL = $r['ID_DFINAL'];
            $PAIS = $r['ID_PAIS'];
            $MERCADO = $r['ID_MERCADO'];
            if ($TEMBARQUE) {
                if ($TEMBARQUE == "1") {
                    $CRT = $r['CRT_DESPACHOEX'];
                    $TRANSPORTE2 = $r['ID_TRANSPORTE2'];
                    $LCARGA = $r['ID_LCARGA'];
                    $LDESTINO = $r['ID_LDESTINO'];
                }
                if ($TEMBARQUE == "2") {
                    $LAEREA = $r['ID_LAREA'];
                    $NVIAJE = $r['NVIAJE_DESPACHOEX'];
                    $NAVE = $r['NAVE_DESPACHOEX'];
                    $ACARGA = $r['ID_ACARGA'];
                    $ADESTINO = $r['ID_ADESTINO'];
                }
                if ($TEMBARQUE == "3") {
                    $FECHASTACKING = $r['FECHASTACKING_DESPACHOEX'];
                    $NAVIERA = $r['ID_NAVIERA'];
                    $NAVE = $r['NAVE_DESPACHOEX'];
                    $NVIAJE = $r['NVIAJE_DESPACHOEX'];
                    $PCARGA = $r['ID_PCARGA'];
                    $PDESTINO = $r['ID_PDESTINO'];
                }
            }
            $TINPUSDA= "" . $r['TINPUSDA']; 
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }
}
//PROCESO PARA OBTENER LOS DATOS DEL FORMULARIO  Y MANTENERLO AL ACTUALIZACION QUE REALIZA EL SELECT DE CONDUCTOR

if (isset($_POST)) {
    if (isset($_REQUEST['FECHADESPACHOEX'])) {
        $FECHADESPACHOEX = "" . $_REQUEST['FECHADESPACHOEX'];
    }
    if (isset($_REQUEST['SNICARGA'])) {
        $SNICARGA = "" . $_REQUEST['SNICARGA'];
        if ($SNICARGA == "on") {
            $DISABLED4 = "disabled";
            if (isset($_REQUEST['ICARGAD'])) {
                $ICARGAD = "" . $_REQUEST['ICARGAD'];
                $ARRAYVERICARGA = $ICARGA_ADO->verIcarga($ICARGAD);
                if ($ARRAYVERICARGA) {
                    $TEMBARQUE = $ARRAYVERICARGA[0]['TEMBARQUE_ICARGA'];
                    $FECHAETD = $ARRAYVERICARGA[0]['FECHAETD_ICARGA'];
                    $FECHAETA = $ARRAYVERICARGA[0]['FECHAETA_ICARGA'];
                    $BOOKINGINSTRUCTIVO = $ARRAYVERICARGA[0]['BOOKING_ICARGA'];
                    $EXPORTADORA = $ARRAYVERICARGA[0]['ID_EXPPORTADORA'];
                    $RFINAL = $ARRAYVERICARGA[0]['ID_RFINAL'];
                    $AGCARGA = $ARRAYVERICARGA[0]['ID_AGCARGA'];
                    $DFINAL = $ARRAYVERICARGA[0]['ID_DFINAL'];
                    $PAIS = $ARRAYVERICARGA[0]['ID_PAIS'];
                    $MERCADO = $ARRAYVERICARGA[0]['ID_MERCADO'];
                    if ($TEMBARQUE) {
                        if ($TEMBARQUE == "1") {
                            $CRT = $ARRAYVERICARGA[0]['CRT_ICARGA'];
                            $TRANSPORTE2 = $ARRAYVERICARGA[0]['ID_TRANSPORTE'];
                            $LCARGA = $ARRAYVERICARGA[0]['ID_LCARGA'];
                            $LDESTINO = $ARRAYVERICARGA[0]['ID_LDESTINO'];
                        }
                        if ($TEMBARQUE == "2") {
                            $LAEREA = $ARRAYVERICARGA[0]['ID_LAREA'];
                            $NAVE = $ARRAYVERICARGA[0]['NAVE_ICARGA'];
                            $NVIAJE = $ARRAYVERICARGA[0]['NVIAJE_ICARGA'];
                            $ACARGA = $ARRAYVERICARGA[0]['ID_ACARGA'];
                            $ADESTINO = $ARRAYVERICARGA[0]['ID_ADESTINO'];
                        }
                        if ($TEMBARQUE == "3") {
                            $NAVIERA = $ARRAYVERICARGA[0]['ID_NAVIERA'];
                            $NAVE = $ARRAYVERICARGA[0]['NAVE_ICARGA'];
                            $FECHASTACKING = $ARRAYVERICARGA[0]['FECHASTACKING_ICARGA'];
                            $NVIAJE = $ARRAYVERICARGA[0]['NVIAJE_ICARGA'];
                            $PCARGA = $ARRAYVERICARGA[0]['ID_PCARGA'];
                            $PDESTINO = $ARRAYVERICARGA[0]['ID_PDESTINO'];
                        }
                    }
                }
            }
        }
        if ($SNICARGA != "on") {
            if (isset($_REQUEST['EXPORTADORA'])) {
                $EXPORTADORA = "" . $_REQUEST['EXPORTADORA'];
            }
            if (isset($_REQUEST['RFINAL'])) {
                $RFINAL = "" . $_REQUEST['RFINAL'];
            }
            if (isset($_REQUEST['AGCARGA'])) {
                $AGCARGA = "" . $_REQUEST['AGCARGA'];
            }
            if (isset($_REQUEST['DFINAL'])) {
                $DFINAL = "" . $_REQUEST['DFINAL'];
            }
            if (isset($_REQUEST['PAIS'])) {
                $PAIS = "" . $_REQUEST['PAIS'];
            }
            if (isset($_REQUEST['MERCADO'])) {
                $MERCADO = "" . $_REQUEST['MERCADO'];
            }
            if (isset($_REQUEST['FECHAETD'])) {
                $FECHAETD = "" . $_REQUEST['FECHAETD'];
            }
            if (isset($_REQUEST['FECHAETA'])) {
                $FECHAETA = "" . $_REQUEST['FECHAETA'];
            }
            if (isset($_REQUEST['BOOKINGINSTRUCTIVO'])) {
                $BOOKINGINSTRUCTIVO = "" . $_REQUEST['BOOKINGINSTRUCTIVO'];
            }
            if (isset($_REQUEST['TEMBARQUE'])) {
                $TEMBARQUE = "" . $_REQUEST['TEMBARQUE'];
                if ($TEMBARQUE) {
                    if ($TEMBARQUE == "1") {
                        if (isset($_REQUEST['CRT'])) {
                            $CRT = "" . $_REQUEST['CRT'];
                        }
                        if (isset($_REQUEST['TRANSPORTE2'])) {
                            $TRANSPORTE2 = "" . $_REQUEST['TRANSPORTE2'];
                        }
                        if (isset($_REQUEST['LCARGA'])) {
                            $LCARGA = "" . $_REQUEST['LCARGA'];
                        }
                        if (isset($_REQUEST['LDESTINO'])) {
                            $LDESTINO = "" . $_REQUEST['LDESTINO'];
                        }
                    }
                    if ($TEMBARQUE == "2") {
                        if (isset($_REQUEST['LAEREA'])) {
                            $LAEREA = "" . $_REQUEST['LAEREA'];
                        }
                        if (isset($_REQUEST['NAVE'])) {
                            $NAVE = "" . $_REQUEST['NAVE'];
                        }
                        if (isset($_REQUEST['NVIAJE'])) {
                            $NVIAJE = "" . $_REQUEST['NVIAJE'];
                        }
                        if (isset($_REQUEST['ACARGA'])) {
                            $ACARGA = "" . $_REQUEST['ACARGA'];
                        }
                        if (isset($_REQUEST['ADESTINO'])) {
                            $ADESTINO = "" . $_REQUEST['ADESTINO'];
                        }
                    }
                    if ($TEMBARQUE == "3") {
                        if (isset($_REQUEST['NAVIERA'])) {
                            $NAVIERA = "" . $_REQUEST['NAVIERA'];
                        }
                        if (isset($_REQUEST['NAVE'])) {
                            $NAVE = "" . $_REQUEST['NAVE'];
                        }
                        if (isset($_REQUEST['FECHASTACKING'])) {
                            $FECHASTACKING = "" . $_REQUEST['FECHASTACKING'];
                        }
                        if (isset($_REQUEST['NVIAJE'])) {
                            $NVIAJE = "" . $_REQUEST['NVIAJE'];
                        }
                        if (isset($_REQUEST['PCARGA'])) {
                            $PCARGA = "" . $_REQUEST['PCARGA'];
                        }
                        if (isset($_REQUEST['PDESTINO'])) {
                            $PDESTINO = "" . $_REQUEST['PDESTINO'];
                        }
                    }
                }
            }
        }
    } else {
        if (isset($_REQUEST['EXPORTADORA'])) {
            $EXPORTADORA = "" . $_REQUEST['EXPORTADORA'];
        }
        if (isset($_REQUEST['RFINAL'])) {
            $RFINAL = "" . $_REQUEST['RFINAL'];
        }
        if (isset($_REQUEST['AGCARGA'])) {
            $AGCARGA = "" . $_REQUEST['AGCARGA'];
        }
        if (isset($_REQUEST['DFINAL'])) {
            $DFINAL = "" . $_REQUEST['DFINAL'];
        }
        if (isset($_REQUEST['PAIS'])) {
            $PAIS = "" . $_REQUEST['PAIS'];
        }
        if (isset($_REQUEST['MERCADO'])) {
            $MERCADO = "" . $_REQUEST['MERCADO'];
        }
        if (isset($_REQUEST['FECHAETD'])) {
            $FECHAETD = "" . $_REQUEST['FECHAETD'];
        }
        if (isset($_REQUEST['FECHAETA'])) {
            $FECHAETA = "" . $_REQUEST['FECHAETA'];
        }
        if (isset($_REQUEST['BOOKINGINSTRUCTIVO'])) {
            $BOOKINGINSTRUCTIVO = "" . $_REQUEST['BOOKINGINSTRUCTIVO'];
        }
        if (isset($_REQUEST['TEMBARQUE'])) {
            $TEMBARQUE = "" . $_REQUEST['TEMBARQUE'];
            if ($TEMBARQUE) {
                if ($TEMBARQUE == "1") {
                    if (isset($_REQUEST['CRT'])) {
                        $CRT = "" . $_REQUEST['CRT'];
                    }
                    if (isset($_REQUEST['TRANSPORTE2'])) {
                        $TRANSPORTE2 = "" . $_REQUEST['TRANSPORTE2'];
                    }
                    if (isset($_REQUEST['LCARGA'])) {
                        $LCARGA = "" . $_REQUEST['LCARGA'];
                    }
                    if (isset($_REQUEST['LDESTINO'])) {
                        $LDESTINO = "" . $_REQUEST['LDESTINO'];
                    }
                }
                if ($TEMBARQUE == "2") {
                    if (isset($_REQUEST['LAEREA'])) {
                        $LAEREA = "" . $_REQUEST['LAEREA'];
                    }
                    if (isset($_REQUEST['NAVE'])) {
                        $NAVE = "" . $_REQUEST['NAVE'];
                    }
                    if (isset($_REQUEST['NVIAJE'])) {
                        $NVIAJE = "" . $_REQUEST['NVIAJE'];
                    }
                    if (isset($_REQUEST['ACARGA'])) {
                        $ACARGA = "" . $_REQUEST['ACARGA'];
                    }
                    if (isset($_REQUEST['ADESTINO'])) {
                        $ADESTINO = "" . $_REQUEST['ADESTINO'];
                    }
                }
                if ($TEMBARQUE == "3") {
                    if (isset($_REQUEST['NAVIERA'])) {
                        $NAVIERA = "" . $_REQUEST['NAVIERA'];
                    }
                    if (isset($_REQUEST['NAVE'])) {
                        $NAVE = "" . $_REQUEST['NAVE'];
                    }
                    if (isset($_REQUEST['FECHASTACKING'])) {
                        $FECHASTACKING = "" . $_REQUEST['FECHASTACKING'];
                    }
                    if (isset($_REQUEST['NVIAJE'])) {
                        $NVIAJE = "" . $_REQUEST['NVIAJE'];
                    }
                    if (isset($_REQUEST['PCARGA'])) {
                        $PCARGA = "" . $_REQUEST['PCARGA'];
                    }
                    if (isset($_REQUEST['PDESTINO'])) {
                        $PDESTINO = "" . $_REQUEST['PDESTINO'];
                    }
                }
            }
        }
    }
    if (isset($_REQUEST['FECHAINGRESODESPACHOEX'])) {
        $FECHAINGRESODESPACHOEX = "" . $_REQUEST['FECHAINGRESODESPACHOEX'];
    }
    if (isset($_REQUEST['FECHAMODIFCIACIONDESPACHOEX'])) {
        $FECHAMODIFCIACIONDESPACHOEX = "" . $_REQUEST['FECHAMODIFCIACIONDESPACHOEX'];
    }
    if (isset($_REQUEST['NUMEROSELLO'])) {
        $NUMEROSELLO = "" . $_REQUEST['NUMEROSELLO'];
    }
    if (isset($_REQUEST['FECHAGUIA'])) {
        $FECHAGUIA = "" . $_REQUEST['FECHAGUIA'];
    }
    if (isset($_REQUEST['NUMEROGUIA'])) {
        $NUMEROGUIA = "" . $_REQUEST['NUMEROGUIA'];
    }
    if (isset($_REQUEST['TERMOGRAFODESPACHOEX'])) {
        $TERMOGRAFODESPACHOEX = "" . $_REQUEST['TERMOGRAFODESPACHOEX'];
    }
    if (isset($_REQUEST['INPECTOR'])) {
        $INPECTOR = "" . $_REQUEST['INPECTOR'];
    }
    if (isset($_REQUEST['CONTRAPARTE'])) {
        $CONTRAPARTE = "" . $_REQUEST['CONTRAPARTE'];
    }
    if (isset($_REQUEST['OBSERVACIONDESPACHOEX'])) {
        $OBSERVACIONDESPACHOEX = "" . $_REQUEST['OBSERVACIONDESPACHOEX'];
    }
    if (isset($_REQUEST['NUMEROCONTENDORDESPACHOEX'])) {
        $NUMEROCONTENDORDESPACHOEX = "" . $_REQUEST['NUMEROCONTENDORDESPACHOEX'];
    }
    if (isset($_REQUEST['TRANSPORTE'])) {
        $NUMEROPLANILLADESPACHOEX = "" . $_REQUEST['NUMEROPLANILLADESPACHOEX'];
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

    if (isset($_REQUEST['TINPUSDA'])) {
        $TINPUSDA = "" . $_REQUEST['TINPUSDA'];
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

                    SNICARGA = document.getElementById('SNICARGA').checked;
                    FECHADESPACHOEX = document.getElementById("FECHADESPACHOEX").value;
                    ICARGAD = document.getElementById("ICARGAD").value;
                    TINPUSDA = document.getElementById("TINPUSDA").selectedIndex;
                    NUMEROCONTENDORDESPACHOEX = document.getElementById("NUMEROCONTENDORDESPACHOEX").value;
                    TERMOGRAFODESPACHOEX = document.getElementById("TERMOGRAFODESPACHOEX").value;
                    NUMEROPLANILLADESPACHOEX = document.getElementById("NUMEROPLANILLADESPACHOEX").value;



                    NUMEROSELLO = document.getElementById("NUMEROSELLO").value;
                    FECHAGUIA = document.getElementById("FECHAGUIA").value;
                    NUMEROGUIA = document.getElementById("NUMEROGUIA").value;
                    CONTRAPARTE = document.getElementById("CONTRAPARTE").selectedIndex;
                    TRANSPORTE = document.getElementById("TRANSPORTE").selectedIndex;
                    CONDUCTOR = document.getElementById("CONDUCTOR").selectedIndex;
                    PATENTECAMION = document.getElementById("PATENTECAMION").value;
                    PATENTECARRO = document.getElementById("PATENTECARRO").value;
                    //OBSERVACIONDESPACHOEX = document.getElementById("OBSERVACIONDESPACHOEX").value;

                    document.getElementById('val_fechar').innerHTML = "";
                    document.getElementById('val_numerocontenedor').innerHTML = "";
                    document.getElementById('val_icarga').innerHTML = "";
                    document.getElementById('val_tinpusda').innerHTML = "";
                    document.getElementById('val_temorgrafo').innerHTML = "";
                    document.getElementById('val_numeroplanilla').innerHTML = "";
                    document.getElementById('val_numeros').innerHTML = "";
                    document.getElementById('val_fechag').innerHTML = "";
                    document.getElementById('val_numero').innerHTML = "";
                    document.getElementById('val_contraparte').innerHTML = "";
                    document.getElementById('val_transporte').innerHTML = "";
                    document.getElementById('val_conductor').innerHTML = "";
                    document.getElementById('val_patente').innerHTML = "";
                    document.getElementById('val_patentec').innerHTML = "";
                    
                     
                    //  document.getElementById('val_observacion').innerHTML = "";

                    if (FECHADESPACHOEX == null || FECHADESPACHOEX.length == 0 || /^\s+$/.test(FECHADESPACHOEX)) {
                        document.form_reg_dato.FECHADESPACHOEX.focus();
                        document.form_reg_dato.FECHADESPACHOEX.style.borderColor = "#FF0000";
                        document.getElementById('val_fechar').innerHTML = "NO A INGRESADO DATO";
                        return false
                    }
                    document.form_reg_dato.FECHADESPACHOEX.style.borderColor = "#4AF575";
                    if (SNICARGA == true) {
                        if (ICARGAD == null || ICARGAD == 0) {
                            document.form_reg_dato.ICARGAD.focus();
                            document.form_reg_dato.ICARGAD.style.borderColor = "#FF0000";
                            document.getElementById('val_icarga').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                            return false
                        }
                        document.form_reg_dato.ICARGAD.style.borderColor = "#4AF575";
                    }

                    if (ICARGAD == null || ICARGAD == 0) {
                        TEMBARQUE = document.getElementById("TEMBARQUE").selectedIndex;
                        BOOKINGINSTRUCTIVO = document.getElementById("BOOKINGINSTRUCTIVO").value;
                        FECHAETD = document.getElementById("FECHAETD").value;
                        FECHAETA = document.getElementById("FECHAETA").value;
                        DFINAL = document.getElementById("DFINAL").selectedIndex;
                        MERCADO = document.getElementById("MERCADO").selectedIndex;
                        PAIS = document.getElementById("PAIS").selectedIndex;
                        EXPORTADORA = document.getElementById("EXPORTADORA").selectedIndex;
                        RFINAL = document.getElementById("RFINAL").selectedIndex;
                        AGCARGA = document.getElementById("AGCARGA").selectedIndex;


                        document.getElementById('val_tembarque').innerHTML = "";
                        document.getElementById('val_booking').innerHTML = "";
                        document.getElementById('val_fechaetd').innerHTML = "";
                        document.getElementById('val_fechaeta').innerHTML = "";
                        document.getElementById('val_dfinal').innerHTML = "";
                        document.getElementById('val_mercado').innerHTML = "";
                        document.getElementById('val_pais').innerHTML = "";
                        document.getElementById('val_exportadora').innerHTML = "";
                        document.getElementById('val_rfinal').innerHTML = "";
                        document.getElementById('val_agcarga').innerHTML = "";

                        if (TEMBARQUE == null || TEMBARQUE == 0) {
                            document.form_reg_dato.TEMBARQUE.focus();
                            document.form_reg_dato.TEMBARQUE.style.borderColor = "#FF0000";
                            document.getElementById('val_tembarque').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                            return false;
                        }
                        document.form_reg_dato.TEMBARQUE.style.borderColor = "#4AF575";

                        if (FECHAETD == null || FECHAETD.length == 0 || /^\s+$/.test(FECHAETD)) {
                            document.form_reg_dato.FECHAETD.focus();
                            document.form_reg_dato.FECHAETD.style.borderColor = "#FF0000";
                            document.getElementById('val_fechaetd').innerHTML = "NO A INGRESADO DATO";
                            return false;
                        }
                        document.form_reg_dato.FECHAETD.style.borderColor = "#4AF575";

                        if (FECHAETA == null || FECHAETA.length == 0 || /^\s+$/.test(FECHAETA)) {
                            document.form_reg_dato.FECHAETA.focus();
                            document.form_reg_dato.FECHAETA.style.borderColor = "#FF0000";
                            document.getElementById('val_fechaeta').innerHTML = "NO A INGRESADO DATO";
                            return false;
                        }
                        document.form_reg_dato.FECHAETA.style.borderColor = "#4AF575";

                        if (BOOKINGINSTRUCTIVO == null || BOOKINGINSTRUCTIVO.length == 0 || /^\s+$/.test(BOOKINGINSTRUCTIVO)) {
                            document.form_reg_dato.BOOKINGINSTRUCTIVO.focus();
                            document.form_reg_dato.BOOKINGINSTRUCTIVO.style.borderColor = "#FF0000";
                            document.getElementById('val_booking').innerHTML = "NO A INGRESADO DATO";
                            return false;
                        }
                        document.form_reg_dato.BOOKINGINSTRUCTIVO.style.borderColor = "#4AF575";

                        if (DFINAL == null || DFINAL == 0) {
                            document.form_reg_dato.DFINAL.focus();
                            document.form_reg_dato.DFINAL.style.borderColor = "#FF0000";
                            document.getElementById('val_dfinal').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                            return false;
                        }
                        document.form_reg_dato.DFINAL.style.borderColor = "#4AF575";

                        if (PAIS == null || PAIS == 0) {
                            document.form_reg_dato.PAIS.focus();
                            document.form_reg_dato.PAIS.style.borderColor = "#FF0000";
                            document.getElementById('val_pais').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                            return false;
                        }
                        document.form_reg_dato.PAIS.style.borderColor = "#4AF575";

                        if (MERCADO == null || MERCADO == 0) {
                            document.form_reg_dato.MERCADO.focus();
                            document.form_reg_dato.MERCADO.style.borderColor = "#FF0000";
                            document.getElementById('val_mercado').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                            return false;
                        }
                        document.form_reg_dato.MERCADO.style.borderColor = "#4AF575";

                        if (EXPORTADORA == null || EXPORTADORA == 0) {
                            document.form_reg_dato.EXPORTADORA.focus();
                            document.form_reg_dato.EXPORTADORA.style.borderColor = "#FF0000";
                            document.getElementById('val_exportadora').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                            return false;
                        }
                        document.form_reg_dato.EXPORTADORA.style.borderColor = "#4AF575";

                        if (RFINAL == null || RFINAL == 0) {
                            document.form_reg_dato.RFINAL.focus();
                            document.form_reg_dato.RFINAL.style.borderColor = "#FF0000";
                            document.getElementById('val_rfinal').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                            return false;
                        }
                        document.form_reg_dato.RFINAL.style.borderColor = "#4AF575";


                        if (AGCARGA == null || AGCARGA == 0) {
                            document.form_reg_dato.AGCARGA.focus();
                            document.form_reg_dato.AGCARGA.style.borderColor = "#FF0000";
                            document.getElementById('val_agcarga').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                            return false;
                        }
                        document.form_reg_dato.AGCARGA.style.borderColor = "#4AF575";

                        if (TEMBARQUE == 1) {
                            CRT = document.getElementById("CRT").value;
                            TRANSPORTE = document.getElementById("TRANSPORTE").selectedIndex;
                            LCARGA = document.getElementById("LCARGA").selectedIndex;
                            LDESTINO = document.getElementById("LDESTINO").selectedIndex;


                            document.getElementById('val_crt').innerHTML = "";
                            document.getElementById('val_transporte').innerHTML = "";
                            document.getElementById('val_lcarga').innerHTML = "";
                            document.getElementById('val_ldestino').innerHTML = "";

                            if (CRT == null || CRT.length == 0 || /^\s+$/.test(CRT)) {
                                document.form_reg_dato.CRT.focus();
                                document.form_reg_dato.CRT.style.borderColor = "#FF0000";
                                document.getElementById('val_crt').innerHTML = "NO A INGRESADO DATO";
                                return false;
                            }
                            document.form_reg_dato.CRT.style.borderColor = "#4AF575";

                            if (TRANSPORTE == null || TRANSPORTE == 0) {
                                document.form_reg_dato.TRANSPORTE.focus();
                                document.form_reg_dato.TRANSPORTE.style.borderColor = "#FF0000";
                                document.getElementById('val_transporte').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                                return false;
                            }
                            document.form_reg_dato.TRANSPORTE.style.borderColor = "#4AF575";


                            if (LCARGA == null || LCARGA == 0) {
                                document.form_reg_dato.LCARGA.focus();
                                document.form_reg_dato.LCARGA.style.borderColor = "#FF0000";
                                document.getElementById('val_lcarga').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                                return false;
                            }
                            document.form_reg_dato.LCARGA.style.borderColor = "#4AF575";

                            if (LDESTINO == null || LDESTINO == 0) {
                                document.form_reg_dato.LDESTINO.focus();
                                document.form_reg_dato.LDESTINO.style.borderColor = "#FF0000";
                                document.getElementById('val_ldestino').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                                return false;
                            }
                            document.form_reg_dato.LDESTINO.style.borderColor = "#4AF575";
                        }
                        if (TEMBARQUE == 2) {
                            LAEREA = document.getElementById("LAEREA").selectedIndex;
                            NAVE = document.getElementById("NAVE").value;
                            NVIAJE = document.getElementById("NVIAJE").value;
                            ACARGA = document.getElementById("ACARGA").selectedIndex;
                            ADESTINO = document.getElementById("ADESTINO").selectedIndex;

                            document.getElementById('val_larea').innerHTML = "";
                            document.getElementById('val_nave').innerHTML = "";
                            document.getElementById('val_nviaje').innerHTML = "";
                            document.getElementById('val_acarga').innerHTML = "";
                            document.getElementById('val_adestino').innerHTML = "";

                            if (LAEREA == null || LAEREA == 0) {
                                document.form_reg_dato.LAEREA.focus();
                                document.form_reg_dato.LAEREA.style.borderColor = "#FF0000";
                                document.getElementById('val_larea').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                                return false;
                            }
                            document.form_reg_dato.LAEREA.style.borderColor = "#4AF575";


                            if (NAVE == null || NAVE.length == 0 || /^\s+$/.test(NAVE)) {
                                document.form_reg_dato.NAVE.focus();
                                document.form_reg_dato.NAVE.style.borderColor = "#FF0000";
                                document.getElementById('val_nave').innerHTML = "NO A INGRESADO DATO";
                                return false;
                            }
                            document.form_reg_dato.NAVE.style.borderColor = "#4AF575";

                            if (NVIAJE == null || NVIAJE.length == 0 || /^\s+$/.test(NVIAJE)) {
                                document.form_reg_dato.NVIAJE.focus();
                                document.form_reg_dato.NVIAJE.style.borderColor = "#FF0000";
                                document.getElementById('val_nviaje').innerHTML = "NO A INGRESADO DATO";
                                return false;
                            }
                            document.form_reg_dato.NVIAJE.style.borderColor = "#4AF575";

                            if (ACARGA == null || ACARGA == 0) {
                                document.form_reg_dato.ACARGA.focus();
                                document.form_reg_dato.ACARGA.style.borderColor = "#FF0000";
                                document.getElementById('val_acarga').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                                return false;
                            }
                            document.form_reg_dato.ACARGA.style.borderColor = "#4AF575";

                            if (ADESTINO == null || ADESTINO == 0) {
                                document.form_reg_dato.ADESTINO.focus();
                                document.form_reg_dato.ADESTINO.style.borderColor = "#FF0000";
                                document.getElementById('val_adestino').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                                return false;
                            }
                            document.form_reg_dato.ADESTINO.style.borderColor = "#4AF575";
                        }
                        if (TEMBARQUE == 3) {

                            NAVIERA = document.getElementById("NAVIERA").selectedIndex;
                            FECHASTACKING = document.getElementById("FECHASTACKING").value;
                            NVIAJE = document.getElementById("NVIAJE").value;
                            PCARGA = document.getElementById("PCARGA").selectedIndex;
                            PDESTINO = document.getElementById("PDESTINO").selectedIndex;

                            document.getElementById('val_naviera').innerHTML = "";
                            document.getElementById('val_fechastacking').innerHTML = "";
                            document.getElementById('val_nviaje').innerHTML = "";
                            document.getElementById('val_pcarga').innerHTML = "";
                            document.getElementById('val_pdestino').innerHTML = "";

                            if (NAVIERA == null || NAVIERA == 0) {
                                document.form_reg_dato.NAVIERA.focus();
                                document.form_reg_dato.NAVIERA.style.borderColor = "#FF0000";
                                document.getElementById('val_naviera').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                                return false;
                            }
                            document.form_reg_dato.NAVIERA.style.borderColor = "#4AF575";


                            if (FECHASTACKING == null || FECHASTACKING.length == 0 || /^\s+$/.test(FECHASTACKING)) {
                                document.form_reg_dato.FECHASTACKING.focus();
                                document.form_reg_dato.FECHASTACKING.style.borderColor = "#FF0000";
                                document.getElementById('val_fechastacking').innerHTML = "NO A INGRESADO DATO";
                                return false;
                            }
                            document.form_reg_dato.FECHASTACKING.style.borderColor = "#4AF575";

                            if (NVIAJE == null || NVIAJE.length == 0 || /^\s+$/.test(NVIAJE)) {
                                document.form_reg_dato.NVIAJE.focus();
                                document.form_reg_dato.NVIAJE.style.borderColor = "#FF0000";
                                document.getElementById('val_nviaje').innerHTML = "NO A INGRESADO DATO";
                                return false;
                            }
                            document.form_reg_dato.NVIAJE.style.borderColor = "#4AF575";

                            if (PCARGA == null || PCARGA == 0) {
                                document.form_reg_dato.PCARGA.focus();
                                document.form_reg_dato.PCARGA.style.borderColor = "#FF0000";
                                document.getElementById('val_pcarga').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                                return false;
                            }
                            document.form_reg_dato.PCARGA.style.borderColor = "#4AF575";

                            if (PDESTINO == null || PDESTINO == 0) {
                                document.form_reg_dato.PDESTINO.focus();
                                document.form_reg_dato.PDESTINO.style.borderColor = "#FF0000";
                                document.getElementById('val_pdestino').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                                return false;
                            }
                            document.form_reg_dato.PDESTINO.style.borderColor = "#4AF575";

                        }
                    }
                    
                    if (TINPUSDA == null || TINPUSDA == 0) {
                            document.form_reg_dato.TINPUSDA.focus();
                            document.form_reg_dato.TINPUSDA.style.borderColor = "#FF0000";
                            document.getElementById('val_tinpusda').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                            return false
                        }
                        document.form_reg_dato.TINPUSDA.style.borderColor = "#4AF575";

                    if (NUMEROCONTENDORDESPACHOEX == null || NUMEROCONTENDORDESPACHOEX.length == 0 || /^\s+$/.test(NUMEROCONTENDORDESPACHOEX)) {
                        document.form_reg_dato.NUMEROCONTENDORDESPACHOEX.focus();
                        document.form_reg_dato.NUMEROCONTENDORDESPACHOEX.style.borderColor = "#FF0000";
                        document.getElementById('val_numerocontenedor').innerHTML = "NO A INGRESADO DATO";
                        return false
                    }
                    document.form_reg_dato.NUMEROCONTENDORDESPACHOEX.style.borderColor = "#4AF575";

                    if (TERMOGRAFODESPACHOEX == null || TERMOGRAFODESPACHOEX.length == 0 || /^\s+$/.test(TERMOGRAFODESPACHOEX)) {
                        document.form_reg_dato.TERMOGRAFODESPACHOEX.focus();
                        document.form_reg_dato.TERMOGRAFODESPACHOEX.style.borderColor = "#FF0000";
                        document.getElementById('val_temorgrafo').innerHTML = "NO A INGRESADO DATO";
                        return false
                    }
                    document.form_reg_dato.TERMOGRAFODESPACHOEX.style.borderColor = "#4AF575";


                    if (NUMEROPLANILLADESPACHOEX == null || NUMEROPLANILLADESPACHOEX.length == 0 || /^\s+$/.test(NUMEROPLANILLADESPACHOEX)) {
                        document.form_reg_dato.NUMEROPLANILLADESPACHOEX.focus();
                        document.form_reg_dato.NUMEROPLANILLADESPACHOEX.style.borderColor = "#FF0000";
                        document.getElementById('val_numeroplanilla').innerHTML = "NO A INGRESADO DATO";
                        return false
                    }
                    document.form_reg_dato.NUMEROPLANILLADESPACHOEX.style.borderColor = "#4AF575";



                    if (NUMEROSELLO == null || NUMEROSELLO.length == 0 || /^\s+$/.test(NUMEROSELLO)) {
                        document.form_reg_dato.NUMEROSELLO.focus();
                        document.form_reg_dato.NUMEROSELLO.style.borderColor = "#FF0000";
                        document.getElementById('val_numeros').innerHTML = "NO A INGRESADO DATO";
                        return false
                    }
                    document.form_reg_dato.NUMEROSELLO.style.borderColor = "#4AF575";



                    if (FECHAGUIA == null || FECHAGUIA.length == 0 || /^\s+$/.test(FECHAGUIA)) {
                        document.form_reg_dato.FECHAGUIA.focus();
                        document.form_reg_dato.FECHAGUIA.style.borderColor = "#FF0000";
                        document.getElementById('val_fechag').innerHTML = "NO A INGRESADO DATO";
                        return false
                    }
                    document.form_reg_dato.FECHAGUIA.style.borderColor = "#4AF575";


                    if (NUMEROGUIA == null || NUMEROGUIA == 0) {
                        document.form_reg_dato.NUMEROGUIA.focus();
                        document.form_reg_dato.NUMEROGUIA.style.borderColor = "#FF0000";
                        document.getElementById('val_numero').innerHTML = "NO A INGRESADO DATO";
                        return false
                    }
                    document.form_reg_dato.NUMEROGUIA.style.borderColor = "#4AF575";


                    if (CONTRAPARTE == null || CONTRAPARTE == 0) {
                        document.form_reg_dato.CONTRAPARTE.focus();
                        document.form_reg_dato.CONTRAPARTE.style.borderColor = "#FF0000";
                        document.getElementById('val_contraparte').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false
                    }
                    document.form_reg_dato.CONTRAPARTE.style.borderColor = "#4AF575";


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
                        document.getElementById('val_patente').innerHTML = "NO A INGRESADO DATO";
                        return false
                    }
                    document.form_reg_dato.PATENTECAMION.style.borderColor = "#4AF575";
                    /*

                                        if (PATENTECARRO == null || PATENTECARRO == 0) {
                                            document.form_reg_dato.PATENTECARRO.focus();
                                            document.form_reg_dato.PATENTECARRO.style.borderColor = "#FF0000";
                                            document.getElementById('val_patentec').innerHTML = "NO A INGRESADO DATO";
                                            return false
                                        }
                                        document.form_reg_dato.PATENTECARRO.style.borderColor = "#4AF575";

                    */
                    /*
                    if (OBSERVACIONDESPACHOEX == null || OBSERVACIONDESPACHOEX.length == 0 || /^\s+$/.test(OBSERVACIONDESPACHOEX)) {
                        document.form_reg_dato.OBSERVACIONDESPACHOEX.focus();
                        document.form_reg_dato.OBSERVACIONDESPACHOEX.style.borderColor = "#FF0000";
                        document.getElementById('val_observacion').innerHTML = "NO A INGRESADO DATO";
                        return false
                    }
                    document.form_reg_dato.OBSERVACIONDESPACHOEX.style.borderColor = "#4AF575"; 
                    */
                }

                //FUNCION PARA REALIZAR UNA ACTUALIZACION DEL FORMULARIO DE REGISTRO DE DESPACHOEX
                function refrescar() {
                    document.getElementById("form_reg_dato").submit();
                }
                //FUNCION PARA ABRIR VENTANA QUE SE ENCUENTRA LA OPERACIONES DE DETALLE DE DESPACHOEX
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
                                <h3 class="page-title">Frigorifico</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Modulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Frigorifico</li>
                                            <li class="breadcrumb-item" aria-current="page">Despacho</li>
                                            <li class="breadcrumb-item" aria-current="page">Despacho Exportación</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Registro Despacho </a> </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <?php include_once "../../assest/config/verIndicadorEconomico.php"; ?>
                        </div>
                    </div>
                    <!-- Main content -->
                    <section class="content">
                        <div class="card">   
                            <div class="card-header with-border bg-info">                                   
                                <h4 class="card-title">Registro de Despacho</h4>                                        
                            </div>
                            <form method="post" class="form " role="form" name="form_reg_dato" id="form_reg_dato"> 
                                <div class="card-body">                                    
                                    <div class="row">
                                        <div class="col-xxl-2 col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTA" name="PLANTA" value="<?php echo $PLANTAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESAE" name="EMPRESAE" value="<?php echo $EMPRESA; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTAE" name="PLANTAE" value="<?php echo $PLANTA; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADAE" name="TEMPORADAE" value="<?php echo $TEMPORADA; ?>" />
                                                <input type="hidden" class="form-control" id="TOTALENVASE" name="TOTALENVASE" value="<?php echo $TOTALENVASE; ?>" />
                                                <input type="hidden" class="form-control" id="TOTALNETO" name="TOTALNETO" value="<?php echo $TOTALNETO; ?>" />
                                                <input type="hidden" class="form-control" id="TOTALBRUTO" name="TOTALBRUTO" value="<?php echo $TOTALBRUTO; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID DESPACHOEX" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="OP DESPACHOEX" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="URL DESPACHOEX" id="URLP" name="URLP" value="registroDespachoEX" />
                                                <label>Número Despacho </label>
                                                <input type="hidden" class="form-control" placeholder="ID DESPACHOEX" id="ID" name="ID" value="<?php echo $IDDESPACHOEX; ?>" />
                                                <input type="text" class="form-control" style="background-color: #eeeeee;" placeholder="Número Despacho" id="IDDESPACHOEX" name="IDDESPACHOEX" value="<?php echo $NUMEROVER; ?>" disabled />
                                                <label id="val_id" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-2 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Con Instructivo</label>
                                                <br>
                                                <input type="hidden" class="form-control" placeholder="SNICARGAE" id="SNICARGAE" name="SNICARGAE" value="<?php echo $SNICARGA; ?>" />
                                                <input type="checkbox" class="chk-col-danger" name="SNICARGA" id="SNICARGA" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php if ($SNICARGA == "on") { echo "checked"; } ?> onchange="this.form.submit()">
                                                <label for="SNICARGA"></label>
                                            </div>
                                        </div>                                
                                        <div class="col-xxl-4 col-xl-1 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                        </div>
                                        <div class="col-xxl-2 col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha Ingreso</label>
                                                <input type="hidden" class="form-control" placeholder="FECHA DESPACHOEX" id="FECHAINGRESODESPACHOEXE" name="FECHAINGRESODESPACHOEXE" value="<?php echo $FECHAINGRESODESPACHOEX; ?>" />
                                                <input type="date" class="form-control" style="background-color: #eeeeee;" placeholder="Fecha Ingreso" id="FECHAINGRESODESPACHOEX" name="FECHAINGRESODESPACHOEX" value="<?php echo $FECHAINGRESODESPACHOEX; ?>" disabled />
                                                <label id="val_fechai" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha Modificación</label>
                                                <input type="hidden" class="form-control" placeholder="FECHA MODIFICACION" id="FECHAMODIFCIACIONDESPACHOEXE" name="FECHAMODIFCIACIONDESPACHOEXE" value="<?php echo $FECHAMODIFCIACIONDESPACHOEX; ?>" />
                                                <input type="date" class="form-control" style="background-color: #eeeeee;" placeholder="Fecha Modificación" id="FECHAMODIFCIACIONDESPACHOEX" name="FECHAMODIFCIACIONDESPACHOEX" value="<?php echo $FECHAMODIFCIACIONDESPACHOEX; ?>" disabled />
                                                <label id="val_fecham" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-group col-12">
                                        <button class="btn btn-success" id="headerStep1">Datos Generales</button>
                                        <button class="btn btn-secondary" id="headerStep2">Datos Exportacion</button>
                                    </div>
                                    <hr>
                                    <section id="step1registrodespachoex">
                                        <div class="row">
                                            <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>Fecha Despacho</label>
                                                    <input type="hidden" class="form-control" placeholder="Fecha Despachoex" id="FECHADESPACHOEXE" name="FECHADESPACHOEXE" value="<?php echo $FECHADESPACHOEX; ?>" />
                                                    <input type="date" class="form-control"  placeholder="Fecha Despacho" id="FECHADESPACHOEX" name="FECHADESPACHOEX" value="<?php echo $FECHADESPACHOEX; ?>" <?php echo $DISABLED2; ?>  />
                                                    <label id="val_fechar" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Instructivo Carga</label>
                                                    <input type="hidden" class="form-control" placeholder="ICARGADE" id="ICARGADE" name="ICARGADE" value="<?php echo $ICARGAD; ?>" />
                                                    <select class="form-control select2" id="ICARGAD" name="ICARGAD" style="width: 100%;" onchange="this.form.submit()" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php if ($SNICARGA != "on") { echo "disabled style='background-color: #eeeeee;'"; } ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYICARGA as $r) : ?>
                                                            <?php if ($ARRAYICARGA) {    ?>
                                                                <option value="<?php echo $r['ID_ICARGA']; ?>" <?php if ($ICARGAD == $r['ID_ICARGA']) { echo "selected"; } ?>><?php echo $r['NUMERO_ICARGA'] ?> : <?php echo $r['NREFERENCIA_ICARGA'] ?> </option>
                                                            <?php } else { ?>
                                                                <option value="0">No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_icarga" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Tipo Embarque</label>
                                                    <input type="hidden" class="form-control" placeholder="TEMBARQUEE" id="TEMBARQUEE" name="TEMBARQUEE" value="<?php echo $TEMBARQUE; ?>" />
                                                    <select class="form-control select2" id="TEMBARQUE" name="TEMBARQUE" style="width: 100%;" onchange="this.form.submit()" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLED4; ?>>
                                                        <option></option>
                                                        <option value="1" <?php if ($TEMBARQUE == "1") { echo "selected"; } ?>>Terrestre </option>
                                                        <option value="2" <?php if ($TEMBARQUE == "2") { echo "selected"; } ?>> Aereo</option>
                                                        <option value="3" <?php if ($TEMBARQUE == "3") { echo "selected"; } ?>> Maritimo</option>
                                                    </select>
                                                    <label id="val_tembarque" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>InspecciónN</label>
                                                    <input type="hidden" class="form-control" placeholder="TINPUSDA" id="TINPUSDAE" name="TINPUSDAE" value="<?php echo $TINPUSDA; ?>" />
                                                    <select class="form-control select2" id="TINPUSDA" name="TINPUSDA" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED2; ?> >
                                                        <option></option>
                                                        <option value="1" <?php if ($TINPUSDA == "1") { echo "selected"; } ?>> No </option>
                                                        <option value="0" <?php if ($TINPUSDA == "0") { echo "selected"; } ?>> Si</option>
                                                    </select>
                                                    <label id="val_tinpusda" class="validacion"> </label> 
                                                </div> 
                                            </div>
                                            <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>Número Contenedor </label>
                                                    <input type="hidden" class="form-control" placeholder="Número Contenedor" id="NUMEROCONTENDORDESPACHOEXE" name="NUMEROCONTENDORDESPACHOEXE" value="<?php echo $NUMEROCONTENDORDESPACHOEX; ?>" />
                                                    <input type="text" class="form-control"  placeholder="Numero Contenedor" id="NUMEROCONTENDORDESPACHOEX" name="NUMEROCONTENDORDESPACHOEX" value="<?php echo $NUMEROCONTENDORDESPACHOEX; ?>" <?php echo $DISABLED2; ?>  />
                                                    <label id="val_numerocontenedor" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6" style="display: none;">
                                                <div class="form-group">
                                                    <label>Temorgrafo </label>
                                                    <input type="hidden" class="form-control" placeholder="TERMOGRAFODESPACHOEXE" id="TERMOGRAFODESPACHOEXE" name="TERMOGRAFODESPACHOEXE" value="<?php echo $TERMOGRAFODESPACHOEX; ?>" />
                                                    <input type="text" class="form-control"  placeholder="Temórgrafo" id="TERMOGRAFODESPACHOEX" name="TERMOGRAFODESPACHOEX" value="<?php echo $TERMOGRAFODESPACHOEX; ?>" <?php echo $DISABLED2; ?>  />
                                                    <label id="val_temorgrafo" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>Número Planilla </label>
                                                    <input type="hidden" class="form-control" placeholder="Numero Planilla" id="NUMEROPLANILLADESPACHOEXE" name="NUMEROPLANILLADESPACHOEXE" value="<?php echo $FECHADESPACHOEX; ?>" />
                                                    <input type="text" class="form-control"  placeholder="Número Planilla" id="NUMEROPLANILLADESPACHOEX" name="NUMEROPLANILLADESPACHOEX" value="<?php echo $NUMEROPLANILLADESPACHOEX; ?>" <?php echo $DISABLED2; ?>  />
                                                    <label id="val_numeroplanilla" class="validacion"> </label>
                                                </div>
                                            </div>

                                            <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>Número Sello</label>
                                                    <input type="hidden" class="form-control" placeholder="Número Sello" id="NUMEROSELLOE" name="NUMEROSELLOE" value="<?php echo $NUMEROSELLO; ?>" />
                                                    <input type="text" class="form-control"  placeholder="Número Sello" id="NUMEROSELLO" name="NUMEROSELLO" value="<?php echo $NUMEROSELLO; ?>" <?php echo $DISABLED2; ?>  />
                                                    <label id="val_numeros" class="validacion"><?php echo $MENSAJE3; ?> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>Número Guía</label>
                                                    <input type="hidden" class="form-control" placeholder="Numero Guia" id="NUMEROGUIAE" name="NUMEROGUIAE" value="<?php echo $NUMEROGUIA; ?>" />
                                                    <input type="text" class="form-control"  placeholder="Número Guía" id="NUMEROGUIA" name="NUMEROGUIA" value="<?php echo $NUMEROGUIA; ?>" <?php echo $DISABLED2; ?> />
                                                    <label id="val_numero" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>Fecha Guía</label>
                                                    <input type="hidden" class="form-control" placeholder="Fecha Guia" id="FECHAGUIAE" name="FECHAGUIAE" value="<?php echo $FECHAGUIA; ?>" />
                                                    <input type="date" class="form-control"  placeholder="Fecha Guía" id="FECHAGUIA" name="FECHAGUIA" value="<?php echo $FECHAGUIA; ?>" <?php echo $DISABLED2; ?>  />
                                                    <label id="val_fechag" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-9 col-sm-9 col-9 col-xs-9">
                                                <div class="form-group">
                                                    <label>Contraparte</label>
                                                    <input type="hidden" class="form-control" placeholder="CONTRAPARTEE" id="CONTRAPARTEE" name="CONTRAPARTEE" value="<?php echo $CONTRAPARTE; ?>" />
                                                    <select class="form-control select2" id="CONTRAPARTE" name="CONTRAPARTE" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYCONTRAPARTE as $r) : ?>
                                                            <?php if ($ARRAYCONTRAPARTE) {    ?>
                                                                <option value="<?php echo $r['ID_CONTRAPARTE']; ?>" <?php if ($CONTRAPARTE == $r['ID_CONTRAPARTE']) { echo "selected"; } ?>> <?php echo $r['NOMBRE_CONTRAPARTE'] ?> </option>
                                                            <?php } else { ?>
                                                                <option value="0">No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_contraparte" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-1 col-xl-1 col-lg-3 col-md-3 col-sm-3 col-3 col-xs-3">
                                                <div class="form-group">
                                                    <br>
                                                    <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Contraparte" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopContraparte.php' ); ">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-9 col-sm-9 col-9 col-xs-9">
                                                <div class="form-group">
                                                    <label>Inspector</label>
                                                    <input type="hidden" class="form-control" placeholder="INPECTORE" id="INPECTORE" name="INPECTORE" value="<?php echo $INPECTOR; ?>" />
                                                    <select class="form-control select2" id="INPECTOR" name="INPECTOR" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYINPECTOR as $r) : ?>
                                                            <?php if ($ARRAYINPECTOR) {    ?>
                                                                <option value="<?php echo $r['ID_INPECTOR']; ?>" <?php if ($INPECTOR == $r['ID_INPECTOR']) { echo "selected"; } ?>> <?php echo $r['NOMBRE_INPECTOR'] ?> </option>
                                                            <?php } else { ?>
                                                                <option value="0">No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_inpector" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-1 col-xl-1 col-lg-3 col-md-3 col-sm-3 col-3 col-xs-3">
                                                <div class="form-group">
                                                    <br>
                                                    <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Inspector" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopInpector.php' ); ">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-9 col-sm-9 col-9 col-xs-9">
                                                <div class="form-group">
                                                    <label>Transporte</label>
                                                    <input type="hidden" class="form-control" placeholder="TRANSPORTE" id="TRANSPORTEE" name="TRANSPORTEE" value="<?php echo $TRANSPORTE; ?>" />
                                                    <select class="form-control select2" id="TRANSPORTE" name="TRANSPORTE" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYTRANSPORTE as $r) : ?>
                                                            <?php if ($ARRAYTRANSPORTE) {    ?>
                                                                <option value="<?php echo $r['ID_TRANSPORTE']; ?>" <?php if ($TRANSPORTE == $r['ID_TRANSPORTE']) { echo "selected"; } ?>> <?php echo $r['NOMBRE_TRANSPORTE'] ?> </option>
                                                            <?php } else { ?>
                                                                <option value="0">No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_transporte" class="validacion"> </label>
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
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-9 col-sm-9 col-9 col-xs-9">
                                                <div class="form-group">
                                                    <label>Conductor</label>
                                                    <input type="hidden" class="form-control" placeholder="CONDUCTORE" id="CONDUCTORE" name="CONDUCTORE" value="<?php echo $CONDUCTOR; ?>" />
                                                    <select class="form-control select2" id="CONDUCTOR" name="CONDUCTOR" style="width: 100%;" value="<?php echo $CONDUCTOR; ?>" <?php echo $DISABLED; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYCONDUCTOR as $r) : ?>
                                                            <?php if ($ARRAYCONDUCTOR) {    ?>
                                                                <option value="<?php echo $r['ID_CONDUCTOR']; ?>" <?php if ($CONDUCTOR == $r['ID_CONDUCTOR']) { echo "selected"; } ?>>
                                                                    <?php echo $r['NOMBRE_CONDUCTOR'] ?>
                                                                </option>
                                                            <?php } else { ?>
                                                                <option value="0">No Hay Datos Registrados </option>
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
                                                    <input type="hidden" class="form-control" placeholder="TRANSPORTE" id="PATENTECAMIONE" name="PATENTECAMIONE" value="<?php echo $PATENTECAMION; ?>" />
                                                    <input type="text" class="form-control"  placeholder="Patente Camión" id="PATENTECAMION" name="PATENTECAMION" value="<?php echo $PATENTECAMION; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> />
                                                    <label id="val_patente" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>Patente Carro</label>
                                                    <input type="hidden" class="form-control" placeholder="PATENTECARROE" id="PATENTECARROE" name="PATENTECARROE" value="<?php echo $PATENTECARRO; ?>" />
                                                    <input type="text" class="form-control"  placeholder="Patente Carro" id="PATENTECARRO" name="PATENTECARRO" value="<?php echo $PATENTECARRO; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> />
                                                    <label id="val_patentec" class="validacion"> </label>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <section id="step2registrodespachoex">
                                        <div class="row">
                                            <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>Fecha ETD</label>
                                                    <input type="hidden" class="form-control" placeholder="FECHA ETD" id="FECHAETDE" name="FECHAETDE" value="<?php echo $FECHAETD; ?>" />
                                                    <input type="date" class="form-control"  placeholder="Fecha  ETD" id="FECHAETD" name="FECHAETD" value="<?php echo $FECHAETD; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLED4; ?> />
                                                    <label id="val_fechaetd" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>Fecha ETA</label>
                                                    <input type="hidden" class="form-control" placeholder="FECHA PROCESO" id="FECHAETAE" name="FECHAETAE" value="<?php echo $FECHAETA; ?>" />
                                                    <input type="date" class="form-control"  placeholder="Fecha ETA" id="FECHAETA" name="FECHAETA" value="<?php echo $FECHAETA; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLED4; ?> />
                                                    <label id="val_fechaeta" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>BKN/AWF/CRT</label>
                                                    <input type="hidden" class="form-control" placeholder="BOOKINGINSTRUCTIVOE" id="BOOKINGINSTRUCTIVOE" name="BOOKINGINSTRUCTIVOE" value="<?php echo $BOOKINGINSTRUCTIVO; ?>" />
                                                    <input type="text" class="form-control"  placeholder="BKN/AWF/CRT" id="BOOKINGINSTRUCTIVO" name="BOOKINGINSTRUCTIVO" value="<?php echo $BOOKINGINSTRUCTIVO; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLED4; ?> />
                                                    <label id="val_booking" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-9 col-sm-9 col-9 col-xs-9">
                                                <div class="form-group">
                                                    <label>Destino Final</label>
                                                    <input type="hidden" class="form-control" placeholder="DFINALE" id="DFINALE" name="DFINALE" value="<?php echo $DFINAL; ?>" />
                                                    <select class="form-control select2" id="DFINAL" name="DFINAL" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLED4; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYDFINAL as $r) : ?>
                                                            <?php if ($ARRAYDFINAL) {    ?>
                                                                <option value="<?php echo $r['ID_DFINAL']; ?>" <?php if ($DFINAL == $r['ID_DFINAL']) { echo "selected"; } ?>>
                                                                    <?php echo $r['NOMBRE_DFINAL'] ?>
                                                                </option>
                                                            <?php } else { ?>
                                                                <option value="0">No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_dfinal" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-1 col-xl-1 col-lg-3 col-md-3 col-sm-3 col-3 col-xs-3">
                                                <div class="form-group">
                                                    <br>
                                                    <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Destino Final" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopDfinal.php' ); ">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Pais</label>
                                                    <input type="hidden" class="form-control" placeholder="PAISE" id="PAISE" name="PAISE" value="<?php echo $PAIS; ?>" />
                                                    <select class="form-control select2" id="PAIS" name="PAIS" style="width: 100%;" value="<?php echo $PAIS; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLED4; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYPAIS as $r) : ?>
                                                            <?php if ($ARRAYPAIS) {    ?>
                                                                <option value="<?php echo $r['ID_PAIS']; ?>" <?php if ($PAIS == $r['ID_PAIS']) { echo "selected"; } ?>>
                                                                    <?php echo $r['NOMBRE_PAIS'] ?>
                                                                </option>
                                                            <?php } else { ?>
                                                                <option value="0">No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_pais" class="validacion"> </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-9 col-sm-9 col-9 col-xs-9">
                                                <div class="form-group">
                                                    <label>Mercado</label>
                                                    <input type="hidden" class="form-control" placeholder="MERCADOE" id="MERCADOE" name="MERCADOE" value="<?php echo $MERCADO; ?>" />
                                                    <select class="form-control select2" id="MERCADO" name="MERCADO" style="width: 100%;" value="<?php echo $MERCADO; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLED4; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYMERCADO as $r) : ?>
                                                            <?php if ($ARRAYMERCADO) {    ?>
                                                                <option value="<?php echo $r['ID_MERCADO']; ?>" <?php if ($MERCADO == $r['ID_MERCADO']) { echo "selected"; } ?>>
                                                                    <?php echo $r['NOMBRE_MERCADO'] ?>
                                                                </option>
                                                            <?php } else { ?>
                                                                <option value="0">No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_mercado" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-1 col-xl-1 col-lg-3 col-md-3 col-sm-3 col-3 col-xs-3">
                                                <div class="form-group">
                                                    <br>
                                                    <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Mercado" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopMercado.php' ); ">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Exportadora</label>
                                                    <input type="hidden" class="form-control" placeholder="EXPORTADORAE" id="EXPORTADORAE" name="EXPORTADORAE" value="<?php echo $EXPORTADORA; ?>" />
                                                    <select class="form-control select2" id="EXPORTADORA" name="EXPORTADORA" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLED4; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYEXPORTADORA as $r) : ?>
                                                            <?php if ($ARRAYEXPORTADORA) {    ?>
                                                                <option value="<?php echo $r['ID_EXPORTADORA']; ?>" <?php if ($EXPORTADORA == $r['ID_EXPORTADORA']) { echo "selected"; } ?>>
                                                                    <?php echo $r['NOMBRE_EXPORTADORA'] ?>
                                                                </option>
                                                            <?php } else { ?>
                                                                <option value="0">No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_exportadora" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-9 col-sm-9 col-9 col-xs-9">
                                                <div class="form-group">
                                                    <label>Recibidor Final</label>
                                                    <input type="hidden" class="form-control" placeholder="RFINALE" id="RFINALE" name="RFINALE" value="<?php echo $RFINAL; ?>" />
                                                    <select class="form-control select2" id="RFINAL" name="RFINAL" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLED4; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYRFINAL as $r) : ?>
                                                            <?php if ($ARRAYRFINAL) {    ?>
                                                                <option value="<?php echo $r['ID_RFINAL']; ?>" <?php if ($RFINAL == $r['ID_RFINAL']) {
                                                                                                                    echo "selected";
                                                                                                                } ?>>
                                                                    <?php echo $r['NOMBRE_RFINAL'] ?>
                                                                </option>
                                                            <?php } else { ?>
                                                                <option value="0">No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_rfinal" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-1 col-xl-1 col-lg-3 col-md-3 col-sm-3 col-3 col-xs-3">
                                                <div class="form-group">
                                                    <br>
                                                    <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Recibidor Final" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopRfinal.php' ); ">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-9 col-sm-9 col-9 col-xs-9">
                                                <div class="form-group">
                                                    <label>Agente Carga</label>
                                                    <input type="hidden" class="form-control" placeholder="AGCARGAE" id="AGCARGAE" name="AGCARGAE" value="<?php echo $AGCARGA; ?>" />
                                                    <select class="form-control select2" id="AGCARGA" name="AGCARGA" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLED4; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYAGCARGA as $r) : ?>
                                                            <?php if ($ARRAYAGCARGA) {    ?>
                                                                <option value="<?php echo $r['ID_AGCARGA']; ?>" <?php if ($AGCARGA == $r['ID_AGCARGA']) { echo "selected"; } ?>>
                                                                    <?php echo $r['NOMBRE_AGCARGA'] ?>
                                                                </option>
                                                            <?php } else { ?>
                                                                <option value="0">No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_agcarga" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-1 col-xl-1 col-lg-3 col-md-3 col-sm-3 col-3 col-xs-3">
                                                <div class="form-group">
                                                    <br>
                                                    <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Agente Carga" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopAgcarga.php' ); ">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                    </button>
                                                </div>
                                            </div>

                                            <?php if ($TEMBARQUE == "1") { ?>
                                                <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>CRT</label>
                                                        <input type="hidden" class="form-control" placeholder="CRT" id="CRTE" name="CRTE" value="<?php echo $CRT; ?>" />
                                                        <input type="text" class="form-control"  placeholder="CRT" id="CRT" name="CRT" value="<?php echo $CRT; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLED4; ?> />
                                                        <label id="val_crt" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-9 col-sm-9 col-9 col-xs-9">
                                                    <div class="form-group">
                                                        <label>Transporte</label>
                                                        <input type="hidden" class="form-control" placeholder="TRANSPORTE2E" id="TRANSPORTE2E" name="TRANSPORTE2E" value="<?php echo $TRANSPORTE2; ?>" />
                                                        <select class="form-control select2" id="TRANSPORTE2" name="TRANSPORTE2" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED4; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYTRANSPORTE as $r) : ?>
                                                                <?php if ($ARRAYTRANSPORTE) {    ?>
                                                                    <option value="<?php echo $r['ID_TRANSPORTE']; ?>" <?php if ($TRANSPORTE2 == $r['ID_TRANSPORTE']) { echo "selected"; } ?>>
                                                                        <?php echo $r['NOMBRE_TRANSPORTE'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option value="0">No Hay Datos Registrados </option>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_transporte" class="validacion"> </label>
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
                                                <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-9 col-sm-9 col-9 col-xs-9">
                                                    <div class="form-group">
                                                        <label>Lugar Carga</label>
                                                        <input type="hidden" class="form-control" placeholder="LCARGAE" id="LCARGAE" name="LCARGAE" value="<?php echo $LCARGA; ?>" />
                                                        <select class="form-control select2" id="LCARGA" name="LCARGA" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED4; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYLCARGA as $r) : ?>
                                                                <?php if ($ARRAYLCARGA) {    ?>
                                                                    <option value="<?php echo $r['ID_LCARGA']; ?>" <?php if ($LCARGA == $r['ID_LCARGA']) { echo "selected"; } ?>>
                                                                        <?php echo $r['NOMBRE_LCARGA'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option value="0">No Hay Datos Registrados </option>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_lcarga" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-1 col-xl-1 col-lg-3 col-md-3 col-sm-3 col-3 col-xs-3">
                                                    <div class="form-group">
                                                        <br>
                                                        <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Lugar Carga" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopLcarga.php' ); ">
                                                            <i class="glyphicon glyphicon-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-9 col-sm-9 col-9 col-xs-9">
                                                    <div class="form-group">
                                                        <label>Lugar Destino</label>
                                                        <input type="hidden" class="form-control" placeholder="LDESTINOE" id="LDESTINOE" name="LDESTINOE" value="<?php echo $LDESTINO; ?>" />
                                                        <select class="form-control select2" id="LDESTINO" name="LDESTINO" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED4; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYLDESTINO  as $r) : ?>
                                                                <?php if ($ARRAYLDESTINO) {    ?>
                                                                    <option value="<?php echo $r['ID_LDESTINO']; ?>" <?php if ($LDESTINO == $r['ID_LDESTINO']) { echo "selected"; } ?>>
                                                                        <?php echo $r['NOMBRE_LDESTINO'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option value="0">No Hay Datos Registrados </option>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_ldestino" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-1 col-xl-1 col-lg-3 col-md-3 col-sm-3 col-3 col-xs-3">
                                                    <div class="form-group">
                                                        <br>
                                                        <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Lugar Destino" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopLdestino.php' ); ">
                                                            <i class="glyphicon glyphicon-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <?php if ($TEMBARQUE == "2") { ?>
                                                <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-9 col-sm-9 col-9 col-xs-9">
                                                    <div class="form-group">
                                                        <label>Linea Aerea</label>
                                                        <input type="hidden" class="form-control" placeholder="LAEREAE" id="LAEREAE" name="LAEREAE" value="<?php echo $LAEREA; ?>" />
                                                        <select class="form-control select2" id="LAEREA" name="LAEREA" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED4; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYLAEREA as $r) : ?>
                                                                <?php if ($ARRAYLAEREA) {    ?>
                                                                    <option value="<?php echo $r['ID_LAEREA']; ?>" <?php if ($LAEREA == $r['ID_LAEREA']) { echo "selected"; } ?>>
                                                                        <?php echo $r['NOMBRE_LAEREA'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option value="0">No Hay Datos Registrados </option>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_larea" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-1 col-xl-1 col-lg-3 col-md-3 col-sm-3 col-3 col-xs-3">
                                                    <div class="form-group">
                                                        <br>
                                                        <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Linea Aerea" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopLaerea.php' ); ">
                                                            <i class="glyphicon glyphicon-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Nave </label>
                                                        <input type="hidden" class="form-control" placeholder="NAVEE" id="NAVEE" name="NAVEE" value="<?php echo $NAVE; ?>" />
                                                        <input type="text" class="form-control" placeholder="NAVE" id="NAVE" name="NAVE" value="<?php echo $NAVE; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLED4; ?> />
                                                        <label id="val_nave" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Número Viaje</label>
                                                        <input type="hidden" class="form-control" placeholder=NVIAJEE" id="NVIAJEE" name="NVIAJEE" value="<?php echo $NVIAJE; ?>" />
                                                        <input type="text" class="form-control"  placeholder="Número Viaje" id="NVIAJE" name="NVIAJE" value="<?php echo $NVIAJE; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLED4; ?> />
                                                        <label id="val_nviaje" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-9 col-sm-9 col-9 col-xs-9">
                                                    <div class="form-group">
                                                        <label>Aeropuerto Carga</label>
                                                        <input type="hidden" class="form-control" placeholder="ACARGAE" id="ACARGAE" name="ACARGAE" value="<?php echo $ACARGA; ?>" />
                                                        <select class="form-control select2" id="ACARGA" name="ACARGA" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED4; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYACARGA as $r) : ?>
                                                                <?php if ($ARRAYACARGA) {    ?>
                                                                    <option value="<?php echo $r['ID_ACARGA']; ?>" <?php if ($ACARGA == $r['ID_ACARGA']) { echo "selected"; } ?>>
                                                                        <?php echo $r['NOMBRE_ACARGA'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option value="0">No Hay Datos Registrados </option>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_acarga" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-1 col-xl-1 col-lg-3 col-md-3 col-sm-3 col-3 col-xs-3">
                                                    <div class="form-group">
                                                        <br>
                                                        <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Aeropuerto Carga" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopAcarga.php' ); ">
                                                            <i class="glyphicon glyphicon-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-9 col-sm-9 col-9 col-xs-9">
                                                    <div class="form-group">
                                                        <label>Aeropuerto Destino</label>
                                                        <input type="hidden" class="form-control" placeholder="ADESTINOE" id="ADESTINOE" name="ADESTINOE" value="<?php echo $ADESTINO; ?>" />
                                                        <select class="form-control select2" id="ADESTINO" name="ADESTINO" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED4; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYADESTINO as $r) : ?>
                                                                <?php if ($ARRAYADESTINO) {    ?>
                                                                    <option value="<?php echo $r['ID_ADESTINO']; ?>" <?php if ($ADESTINO == $r['ID_ADESTINO']) { echo "selected"; } ?>>
                                                                        <?php echo $r['NOMBRE_ADESTINO'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option value="0">No Hay Datos Registrados </option>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_adestino" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-1 col-xl-1 col-lg-3 col-md-3 col-sm-3 col-3 col-xs-3">
                                                    <div class="form-group">
                                                        <br>
                                                        <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Aeropuerto Destino" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopAdestino.php' ); ">
                                                            <i class="glyphicon glyphicon-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>

                                            <?php } ?>
                                            <?php if ($TEMBARQUE == "3") { ?>
                                                <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-9 col-sm-9 col-9 col-xs-9">
                                                    <div class="form-group">
                                                        <label>Naviera </label>
                                                        <input type="hidden" class="form-control" placeholder="NAVIERAE" id="NAVIERAE" name="NAVIERAE" value="<?php echo $NAVIERA; ?>" />
                                                        <select class="form-control select2" id="NAVIERA" name="NAVIERA" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED4; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYNAVIERA as $r) : ?>
                                                                <?php if ($ARRAYNAVIERA) {    ?>
                                                                    <option value="<?php echo $r['ID_NAVIERA']; ?>" <?php if ($NAVIERA == $r['ID_NAVIERA']) { echo "selected"; } ?>>
                                                                        <?php echo $r['NOMBRE_NAVIERA'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option value="0">No Hay Datos Registrados </option>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_naviera" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-1 col-xl-1 col-lg-3 col-md-3 col-sm-3 col-3 col-xs-3">
                                                    <div class="form-group">
                                                        <br>
                                                        <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Naviera" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopNaviera.php' ); ">
                                                            <i class="glyphicon glyphicon-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Nave </label>
                                                        <input type="hidden" class="form-control" placeholder="NAVEE" id="NAVEE" name="NAVEE" value="<?php echo $NAVE; ?>" />
                                                        <input type="text" class="form-control" placeholder="NAVE" id="NAVE" name="NAVE" value="<?php echo $NAVE; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLED4; ?> />
                                                        <label id="val_nave" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Fecha Stacking</label>
                                                        <input type="hidden" class="form-control" placeholder="FECHA PROCESO" id="FECHASTACKINGE" name="FECHASTACKINGE" value="<?php echo $FECHASTACKING; ?>" />
                                                        <input type="date" class="form-control"  placeholder="Fecha Stacking" id="FECHASTACKING" name="FECHASTACKING" value="<?php echo $FECHASTACKING; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLED4; ?> />
                                                        <label id="val_fechastacking" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Número Viaje</label>
                                                        <input type="hidden" class="form-control" placeholder=NVIAJEE" id="NVIAJEE" name="NVIAJEE" value="<?php echo $NVIAJE; ?>" />
                                                        <input type="text" class="form-control"  placeholder="Número Viaje" id="NVIAJE" name="NVIAJE" value="<?php echo $NVIAJE; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLED4; ?> />
                                                        <label id="val_nviaje" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-9 col-sm-9 col-9 col-xs-9">
                                                    <div class="form-group">
                                                        <label>Puerto Carga</label>
                                                        <input type="hidden" class="form-control" placeholder="PCARGAE" id="PCARGAE" name="PCARGAE" value="<?php echo $PCARGA; ?>" />
                                                        <select class="form-control select2" id="PCARGA" name="PCARGA" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED4; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYPCARGA as $r) : ?>
                                                                <?php if ($ARRAYPCARGA) {    ?>
                                                                    <option value="<?php echo $r['ID_PCARGA']; ?>" <?php if ($PCARGA == $r['ID_PCARGA']) { echo "selected"; } ?>>
                                                                        <?php echo $r['NOMBRE_PCARGA'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option value="0">No Hay Datos Registrados </option>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_pcarga" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-1 col-xl-1 col-lg-3 col-md-3 col-sm-3 col-3 col-xs-3">
                                                    <div class="form-group">
                                                        <br>
                                                        <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Puerto Carga" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopPcarga.php' ); ">
                                                            <i class="glyphicon glyphicon-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-9 col-sm-9 col-9 col-xs-9">
                                                    <div class="form-group">
                                                        <label>Puerto Destino</label>
                                                        <input type="hidden" class="form-control" placeholder="PDESTINOE" id="PDESTINOE" name="PDESTINOE" value="<?php echo $PDESTINO; ?>" />
                                                        <select class="form-control select2" id="PDESTINO" name="PDESTINO" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED4; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYPDESTINO as $r) : ?>
                                                                <?php if ($ARRAYPDESTINO) {    ?>
                                                                    <option value="<?php echo $r['ID_PDESTINO']; ?>" <?php if ($PDESTINO == $r['ID_PDESTINO']) { echo "selected"; } ?>>
                                                                        <?php echo $r['NOMBRE_PDESTINO'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option value="0">No Hay Datos Registrados </option>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_pdestino" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-1 col-xl-1 col-lg-3 col-md-3 col-sm-3 col-3 col-xs-3">
                                                    <div class="form-group">
                                                        <br>
                                                        <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Puerto Destino" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopPdestino.php' ); ">
                                                            <i class="glyphicon glyphicon-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </section>
                                    <div class="row">
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Observaciónes </label>
                                                <input type="hidden" class="form-control" placeholder="TRANSPORTE" id="OBSERVACIONDESPACHOEXE" name="OBSERVACIONDESPACHOEXE" value="<?php echo $OBSERVACIONDESPACHOEX; ?>" />
                                                <textarea class="form-control" rows="1"  placeholder="Ingrese Nota, Observaciónes u Otro" id="OBSERVACIONDESPACHOEX" name="OBSERVACIONDESPACHOEX" <?php echo $DISABLED2; ?> ><?php echo $OBSERVACIONDESPACHOEX; ?></textarea>
                                                <label id="val_observacion" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>                                    
                                    <div class="btn-group  col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12 col-xs-12 float-right" id="botonesSteps" role="group">
                                        <button type="button" class="btn btn-success" id="btnStep1">Paso 1</button>
                                        <button type="button" class="btn btn-success" id="btnStep2">Paso 2</button>
                                    </div>
                                    <br>

                                    
                                </div>
                                                  
                                <div class="card-footer">
                                    <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="toolbar">
                                        <div class="btn-group  col-xxl-4 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12" role="group" aria-label="Acciones generales">
                                            <?php if ($OP == "") { ?>
                                                <button type="button" class="btn btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroDespachoEX.php');">
                                                    <i class="ti-trash"></i> Cancelar
                                                </button>
                                                <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Guardar" name="CREAR" value="CREAR"   onclick="return validacion()" >
                                                    <i class="ti-save-alt"></i> Guardar
                                                </button>
                                            <?php } ?>
                                            <?php if ($OP != "") { ?>
                                                <button type="button" class="btn  btn-success " data-toggle="tooltip" title="Volver" name="VOLVER" value="VOLVER" Onclick="irPagina('listarDespachoEX.php'); ">
                                                    <i class="ti-back-left "></i> Volver
                                                </button>
                                                <button type="submit" class="btn btn-warning " data-toggle="tooltip" title="Guardar" name="GUARDAR" value="GUARDAR"  <?php echo $DISABLED2; ?> onclick="return validacion()">
                                                    <i class="ti-pencil-alt"></i> Guardar
                                                </button>
                                                <button type="submit" class="btn btn-danger " data-toggle="tooltip" title="Cerrar" name="CERRAR" value="CERRAR"  <?php echo $DISABLED2; ?> onclick="return validacion()">
                                                    <i class="ti-save-alt"></i> Cerrar
                                                </button>
                                            <?php } ?>
                                        </div>
                                        <div class="btn-group  col-xxl-6 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12  float-right">
                                            <?php if ($OP != ""): ?>
                                                <button type="button" class="btn btn-primary  " data-toggle="tooltip" title="Packing List" id="defecto" name="tarjas" Onclick="abrirPestana('../../assest/documento/informeDespachoPtPackingList.php?parametro=<?php echo $IDOP; ?>&&usuario=<?php echo $IDUSUARIOS; ?>');">
                                                    <i class="fa fa-file-pdf-o"></i> Packing List
                                                </button>
                                                <button type="button" class="btn btn-info  " data-toggle="tooltip" title="Informe Comercial" id="defecto" name="tarjas" Onclick="abrirPestana('../../assest/documento/informeDespachoPtComercial.php?parametro=<?php echo $IDOP; ?>&&usuario=<?php echo $IDUSUARIOS; ?>');">
                                                    <i class="fa fa-file-pdf-o"></i> Informe Comercial
                                                </button>
                                                <button type="button" class="btn  btn-success" data-toggle="tooltip" id="defecto" name="tarjas" title="Packing List" Onclick="abrirPestana('../../assest/reporte/reporteDespachoExPackingList.php?parametro=<?php echo $IDOP; ?>&&usuario=<?php echo $IDUSUARIOS; ?>'); ">
                                                    <i class="fa fa-file-excel-o"></i> Packing List
                                                </button>  
                                                <button type="button" class="btn  btn-success" data-toggle="tooltip" id="defecto" name="tarjas" title="Archivo Plano"  <?php if($TINPUSDA==1){echo "disabled";}?>  <?php echo $DISABLEDP; ?> <?php echo $DISABLEDT; ?> Onclick="abrirPestana('../../assest/csv/CsvDespachoEx.php?parametro=<?php echo $IDOP; ?>&&usuario=<?php echo $IDUSUARIOS; ?>'); ">
                                                    <i class="fa fa-file-excel-o"></i> Archivo Plano
                                                </button>  
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php if (isset($_GET['op'])): ?>
                            <div class="card">                            
                                <div class="card-header bg-info">
                                    <h4 class="card-title">Detalle de Despacho de Producto Terminado</h4>
                                </div>
                                <div class="card-header">
                                    <div class="form-row align-items-center">
                                        <form method="post" id="form2" name="form2">
                                            <input type="hidden" class="form-control" placeholder="ID DESPACHO" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                            <input type="hidden" class="form-control" placeholder="OP DESPACHO" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                            <input type="hidden" class="form-control" placeholder="URL DESPACHO" id="URLP" name="URLP" value="registroDespachoEX" />
                                            <input type="hidden" class="form-control" placeholder="URL SELECCIONAR" id="URLD" name="URLD" value="registroSelecionExistenciaPTDespachoEx" />
                                            <div class="col-auto">
                                                <button type="submit" class="btn btn-success btn-block mb-2" data-toggle="tooltip" title="Seleccion Existencia" id="SELECIONOCDURL" name="SELECIONOCDURL"
                                                    <?php echo $DISABLED2; ?>  <?php   if ($ESTADO == 0) {   echo "disabled style='background-color: #eeeeee;'"; } ?>  > 
                                                    Seleccion Existencia
                                                </button>
                                            </div>
                                        </form> 
                                        <form method="post" id="form2" name="form2">
                                            <input type="hidden" class="form-control" placeholder="ID DESPACHO" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                            <input type="hidden" class="form-control" placeholder="OP DESPACHO" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                            <input type="hidden" class="form-control" placeholder="URL DESPACHO" id="URLP" name="URLP" value="registroDespachoEX" />
                                            <input type="hidden" class="form-control" placeholder="URL SELECCIONAR" id="URLD" name="URLD" value="registroSelecionPCDespachoEx" />
                                            <div class="col-auto">
                                                <button type="submit" class="btn btn-success btn-block mb-2" data-toggle="tooltip" title="Seleccion Existencia" id="SELECIONOCDURL" name="SELECIONOCDURL"
                                                    <?php echo $DISABLED2; ?>  <?php   if ($ESTADO == 0) {   echo "disabled style='background-color: #eeeeee;'"; } ?>  > 
                                                    Seleccion PC
                                                </button>
                                            </div>
                                        </form>  
                                        
                                        <div class="col-auto">
                                                        <button type="submit" form="form" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Termografos" name="TERMOGRAFOS" value="TERMOGRAFOS">
                                                                Agregar Termógrafos
                                                        </button>
                                                        </div>

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
                                    <div class="table-responsive">
                                    <form method="post" id="form">
                                        <table id="detalle" class="table-hover " style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th> N° Folio </th>
                                                    <th>Condición </th>
                                                    <th class="text-center">Operaciónes</th>
                                                    <th>Fecha Embalado </th>
                                                    <th>Termógrafo </th>
                                                    <th>Código Estandar</th>
                                                    <th>Envase/Estandar</th>
                                                    <th>Variedad</th>
                                                    <th>Cantidad Envase</th>
                                                    <th>Kilos Neto</th>
                                                    <th>% Deshidratacion</th>
                                                    <th>Kilos Deshidratacion</th>
                                                    <th>Kilos Bruto</th>
                                                    <th>CSG</th>
                                                    <th>Productor</th>
                                                    <th>Embolsado</th>
                                                    <th>Tipo Manejo</th>
                                                    <th>Calibre </th>
                                                    <th>Embalaje </th>
                                                    <th>Stock</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if ($ARRAYTOMADO) { ?>
                                                    <?php foreach ($ARRAYTOMADO as $r) : ?>
                                                        <?php
                                                        $CONTADOR = $CONTADOR + 1;
                                                        if ($r['TESTADOSAG'] == null || $r['TESTADOSAG'] == "0") {
                                                            $ESTADOSAG = "Sin Condición";
                                                        }
                                                        if ($r['TESTADOSAG'] == "1") {
                                                            $ESTADOSAG =  "En Inspección";
                                                        }
                                                        if ($r['TESTADOSAG'] == "2") {
                                                            $ESTADOSAG =  "Aprobado Origen";
                                                        }
                                                        if ($r['TESTADOSAG'] == "3") {
                                                            $ESTADOSAG =  "Aprobado USLA";
                                                        }
                                                        if ($r['TESTADOSAG'] == "4") {
                                                            $ESTADOSAG =  "Fumigado";
                                                        }
                                                        if ($r['TESTADOSAG'] == "5") {
                                                            $ESTADOSAG =  "Rechazado";
                                                        }
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
                                                        $ARRAYEVERERECEPCIONID = $EEXPORTACION_ADO->verEstandar($r['ID_ESTANDAR']);
                                                        if ($ARRAYEVERERECEPCIONID) {
                                                            $CODIGOESTANDAR = $ARRAYEVERERECEPCIONID[0]['CODIGO_ESTANDAR'];
                                                            $NOMBREESTANDAR = $ARRAYEVERERECEPCIONID[0]['NOMBRE_ESTANDAR'];
                                                        } else {
                                                            $NOMBREESTANDAR = "Sin Datos";
                                                            $CODIGOESTANDAR = "Sin Datos";
                                                        }
                                                        if ($r['EMBOLSADO'] == "1") {
                                                            $EMBOLSADO =  "SI";
                                                        }
                                                        if ($r['EMBOLSADO'] == "0") {
                                                            $EMBOLSADO =  "NO";
                                                        }
                                                        $ARRAYTMANEJO = $TMANEJO_ADO->verTmanejo($r['ID_TMANEJO']);
                                                        if ($ARRAYTMANEJO) {
                                                            $NOMBRETMANEJO = $ARRAYTMANEJO[0]['NOMBRE_TMANEJO'];
                                                        } else {
                                                            $NOMBRETMANEJO = "Sin Datos";
                                                        }
                                                        $ARRAYTCALIBRE = $TCALIBRE_ADO->verCalibre($r['ID_TCALIBRE']);
                                                        if ($ARRAYTCALIBRE) {
                                                            $NOMBRETCALIBRE = $ARRAYTCALIBRE[0]['NOMBRE_TCALIBRE'];
                                                        } else {
                                                            $NOMBRETCALIBRE = "Sin Datos";
                                                        }
                                                        $ARRAYTEMBALAJE = $TEMBALAJE_ADO->verEmbalaje($r['ID_TEMBALAJE']);
                                                        if ($ARRAYTEMBALAJE) {
                                                            $NOMBRETEMBALAJE = $ARRAYTEMBALAJE[0]['NOMBRE_TEMBALAJE'];
                                                        } else {
                                                            $NOMBRETEMBALAJE = "Sin Datos";
                                                        }
                                                        ?>
                                                        <tr class="center">
                                                            <td><?php echo $r['FOLIO_AUXILIAR_EXIEXPORTACION']; ?> </td>
                                                            <td><?php echo $ESTADOSAG; ?></td>
                                                            <td>
                                                                <form method="post" id="form1">
                                                                    <input type="hidden" class="form-control" id="IDQUITAR" name="IDQUITAR" value="<?php echo $r['ID_EXIEXPORTACION']; ?>" />                                                                   
                                                                    <div class="btn-group btn-block col-6" role="group" aria-label="Operaciones Detalle">
                                                                        <button type="submit" class="btn btn-sm btn-danger   " id="QUITAR" name="QUITAR" data-toggle="tooltip" title="Quitar Existencia PT" <?php echo $DISABLED2; ?> <?php if ($ESTADO == 0) { echo "disabled"; } ?>>
                                                                            <i class="ti-close"></i><br> Quitar
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </td>
                                                            <td><?php echo $r['EMBALADO']; ?></td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <input type="hidden" class="form-control" placeholder="ID DESPACHO" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                                                    <input type="hidden" class="form-control" name="IDDESPACHO[]" value="<?php echo $IDOP; ?>" />
                                                                    <input type="hidden" class="form-control" name="FOLIOEXIEXPORTACIONTERMOGRAFO[]" value="<?php echo $r['FOLIO_AUXILIAR_EXIEXPORTACION']; ?>" />
                                                                    <input type="hidden" class="form-control" name="IDEXIEXPORTACIONTERMOGRAFO[]" value="<?php echo $r['ID_EXIEXPORTACION']; ?>" />
                                                                    <input type="hidden" class="form-control" name="IDTERMOGRAFO[]" value="<?php echo  $CONTADOR; ?>">
                                                                    <input type="text" placeholder="Termógrafo" class="form-control" name="TERMOGRAFO[]"
                                                                    <?php //if ($ESTADO == 0) { echo "disabled";} ?> value="<?php echo $r['N_TERMOGRAFO']; ?>">
                                                                </div>
                                                            </td>
                                                            <td><?php echo $CODIGOESTANDAR; ?></td>
                                                            <td><?php echo $NOMBREESTANDAR; ?></td>
                                                            <td><?php echo $NOMBREVARIEDAD; ?></td>
                                                            <td><?php echo $r['ENVASE']; ?></td>
                                                            <td><?php echo $r['NETO']; ?></td>
                                                            <td><?php echo $r['PORCENTAJE']; ?></td>
                                                            <td><?php echo $r['DESHIRATACION']; ?></td>
                                                            <td><?php echo $r['BRUTO']; ?></td>
                                                            <td><?php echo $CSGPRODUCTOR; ?></td>
                                                            <td><?php echo $NOMBREPRODUCTOR; ?></td>
                                                            <td><?php echo $EMBOLSADO; ?></td>
                                                            <td><?php echo $NOMBRETMANEJO; ?></td>
                                                            <td><?php echo $NOMBRETCALIBRE; ?></td>
                                                            <td><?php echo $NOMBRETEMBALAJE; ?></td>
                                                            <td><?php echo $r['STOCKR']; ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        </form>
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
        <script src="../../assest/js/multistepsregistrodespachoex.js"></script>
        <?php
        //OPERACION DE REGISTRO DE FILA
        if (isset($_REQUEST['CREAR'])) {
            $ARRAYNUMERO = $DESPACHOEX_ADO->obtenerNumero($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
            $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;
            //UTILIZACION METODOS SET DEL MODELO
            //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO
            $DESPACHOEX->__SET('NUMERO_DESPACHOEX', $NUMERO);
            $DESPACHOEX->__SET('FECHA_DESPACHOEX', $_REQUEST['FECHADESPACHOEX']);
            $DESPACHOEX->__SET('NUMERO_SELLO_DESPACHOEX', $_REQUEST['NUMEROSELLO']);
            $DESPACHOEX->__SET('FECHA_GUIA_DESPACHOEX', $_REQUEST['FECHAGUIA']);
            $DESPACHOEX->__SET('NUMERO_GUIA_DESPACHOEX', $_REQUEST['NUMEROGUIA']);
            $DESPACHOEX->__SET('NUMERO_CONTENEDOR_DESPACHOEX', $_REQUEST['NUMEROCONTENDORDESPACHOEX']);
            $DESPACHOEX->__SET('NUMERO_PLANILLA_DESPACHOEX', $_REQUEST['NUMEROPLANILLADESPACHOEX']);
            $DESPACHOEX->__SET('TERMOGRAFO_DESPACHOEX', $_REQUEST['TERMOGRAFODESPACHOEX']);
            $DESPACHOEX->__SET('PATENTE_CAMION', $_REQUEST['PATENTECAMION']);
            $DESPACHOEX->__SET('PATENTE_CARRO', $_REQUEST['PATENTECARRO']);
            $DESPACHOEX->__SET('OBSERVACION_DESPACHOEX', $_REQUEST['OBSERVACIONDESPACHOEX']);
            $DESPACHOEX->__SET('TINPUSDA', $_REQUEST['TINPUSDA']);
            if (isset($_REQUEST['SNICARGA']) == "on") {
                $SNICARGAR = "1";
                $DESPACHOEX->__SET('TEMBARQUE_DESPACHOEX', $_REQUEST['TEMBARQUEE']);
                $DESPACHOEX->__SET('FECHAETD_DESPACHOEX', $_REQUEST['FECHAETDE']);
                $DESPACHOEX->__SET('FECHAETA_DESPACHOEX', $_REQUEST['FECHAETAE']);
                $DESPACHOEX->__SET('BOOKING_DESPACHOEX', $_REQUEST['BOOKINGINSTRUCTIVOE']);
                $DESPACHOEX->__SET('ID_ICARGA', $_REQUEST['ICARGAD']);
                $DESPACHOEX->__SET('ID_EXPPORTADORA', $_REQUEST['EXPORTADORAE']);
                $DESPACHOEX->__SET('ID_DFINAL', $_REQUEST['DFINALE']);
                $DESPACHOEX->__SET('ID_AGCARGA', $_REQUEST['AGCARGAE']);
                $DESPACHOEX->__SET('ID_RFINAL', $_REQUEST['RFINALE']);
                $DESPACHOEX->__SET('ID_MERCADO', $_REQUEST['MERCADOE']);
                $DESPACHOEX->__SET('ID_PAIS', $_REQUEST['PAISE']);
                if ($_REQUEST['TEMBARQUEE']) {
                    if ($_REQUEST['TEMBARQUEE'] == "1") {
                        $DESPACHOEX->__SET('CRT_DESPACHOEX', $_REQUEST['CRTE']);
                        $DESPACHOEX->__SET('ID_TRANSPORTE2', $_REQUEST['TRANSPORTE2E']);
                        $DESPACHOEX->__SET('ID_LCARGA', $_REQUEST['LCARGAE']);
                        $DESPACHOEX->__SET('ID_LDESTINO', $_REQUEST['LDESTINOE']);
                    }
                    if ($_REQUEST['TEMBARQUEE'] == "2") {
                        $DESPACHOEX->__SET('ID_LAREA', $_REQUEST['LAEREAE']);
                        $DESPACHOEX->__SET('NAVE_DESPACHOEX', $_REQUEST['NAVEE']);
                        $DESPACHOEX->__SET('NVIAJE_DESPACHOEX', $_REQUEST['NVIAJEE']);
                        $DESPACHOEX->__SET('ID_ACARGA', $_REQUEST['ACARGAE']);
                        $DESPACHOEX->__SET('ID_ADESTINO', $_REQUEST['ADESTINOE']);
                    }
                    if ($_REQUEST['TEMBARQUEE'] == "3") {
                        $DESPACHOEX->__SET('FECHASTACKING_DESPACHOEX', $_REQUEST['FECHASTACKINGE']);
                        $DESPACHOEX->__SET('ID_NAVIERA', $_REQUEST['NAVIERAE']);
                        $DESPACHOEX->__SET('NAVE_DESPACHOEX', $_REQUEST['NAVEE']);
                        $DESPACHOEX->__SET('NVIAJE_DESPACHOEX', $_REQUEST['NVIAJEE']);
                        $DESPACHOEX->__SET('ID_PCARGA', $_REQUEST['PCARGAE']);
                        $DESPACHOEX->__SET('ID_PDESTINO', $_REQUEST['PDESTINOE']);
                    }
                }
            }
            if (isset($_REQUEST['SNICARGA']) != "on") {
                $SNICARGAR = "0";
                $DESPACHOEX->__SET('TEMBARQUE_DESPACHOEX', $_REQUEST['TEMBARQUE']);
                $DESPACHOEX->__SET('FECHAETD_DESPACHOEX', $_REQUEST['FECHAETD']);
                $DESPACHOEX->__SET('FECHAETA_DESPACHOEX', $_REQUEST['FECHAETA']);
                $DESPACHOEX->__SET('BOOKING_DESPACHOEX', $_REQUEST['BOOKINGINSTRUCTIVO']);
                $DESPACHOEX->__SET('ID_EXPPORTADORA', $_REQUEST['EXPORTADORA']);
                $DESPACHOEX->__SET('ID_RFINAL', $_REQUEST['RFINAL']);
                $DESPACHOEX->__SET('ID_AGCARGA', $_REQUEST['AGCARGA']);
                $DESPACHOEX->__SET('ID_DFINAL', $_REQUEST['DFINAL']);
                $DESPACHOEX->__SET('ID_PAIS', $_REQUEST['PAIS']);
                $DESPACHOEX->__SET('ID_MERCADO', $_REQUEST['MERCADO']);
                if ($_REQUEST['TEMBARQUE']) {
                    if ($_REQUEST['TEMBARQUE'] == "1") {
                        $DESPACHOEX->__SET('CRT_DESPACHOEX', $_REQUEST['CRT']);
                        $DESPACHOEX->__SET('ID_TRANSPORTE2', $_REQUEST['TRANSPORTE2']);
                        $DESPACHOEX->__SET('ID_LCARGA', $_REQUEST['LCARGA']);
                        $DESPACHOEX->__SET('ID_LDESTINO', $_REQUEST['LDESTINO']);
                    }
                    if ($_REQUEST['TEMBARQUE'] == "2") {
                        $DESPACHOEX->__SET('ID_LAREA', $_REQUEST['LAEREA']);
                        $DESPACHOEX->__SET('NAVE_DESPACHOEX', $_REQUEST['NAVE']);
                        $DESPACHOEX->__SET('NVIAJE_DESPACHOEX', $_REQUEST['NVIAJE']);
                        $DESPACHOEX->__SET('ID_ACARGA', $_REQUEST['ACARGA']);
                        $DESPACHOEX->__SET('ID_ADESTINO', $_REQUEST['ADESTINO']);
                    }
                    if ($_REQUEST['TEMBARQUE'] == "3") {
                        $DESPACHOEX->__SET('FECHASTACKING_DESPACHOEX', $_REQUEST['FECHASTACKING']);
                        $DESPACHOEX->__SET('ID_NAVIERA', $_REQUEST['NAVIERA']);
                        $DESPACHOEX->__SET('NAVE_DESPACHOEX', $_REQUEST['NAVE']);
                        $DESPACHOEX->__SET('NVIAJE_DESPACHOEX', $_REQUEST['NVIAJE']);
                        $DESPACHOEX->__SET('ID_PCARGA', $_REQUEST['PCARGA']);
                        $DESPACHOEX->__SET('ID_PDESTINO', $_REQUEST['PDESTINO']);
                    }
                }
            }
            $DESPACHOEX->__SET('SNICARGA', $SNICARGAR);
            $DESPACHOEX->__SET('ID_INPECTOR', $_REQUEST['INPECTOR']);
            $DESPACHOEX->__SET('ID_TRANSPORTE', $_REQUEST['TRANSPORTE']);
            $DESPACHOEX->__SET('ID_CONDUCTOR', $_REQUEST['CONDUCTOR']);
            $DESPACHOEX->__SET('ID_CONTRAPARTE', $_REQUEST['CONTRAPARTE']);
            $DESPACHOEX->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
            $DESPACHOEX->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
            $DESPACHOEX->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
            $DESPACHOEX->__SET('ID_USUARIOI', $IDUSUARIOS);
            $DESPACHOEX->__SET('ID_USUARIOM', $IDUSUARIOS);
            //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
            $DESPACHOEX_ADO->agregarDespachoex($DESPACHOEX);


          
            //OBTENER EL ID DE LA DESPACHOEX CREADA PARA LUEGO ENVIAR EL INGRESO DEL DETALLE
            $ARRYAOBTENERID = $DESPACHOEX_ADO->obtenerId(
                $_REQUEST['FECHADESPACHOEX'],
                $_REQUEST['OBSERVACIONDESPACHOEX'],
                $_REQUEST['EMPRESA'],
                $_REQUEST['PLANTA'],
                $_REQUEST['TEMPORADA'],
            );
            
            $AUSUARIO_ADO->agregarAusuario2($NUMERO,1,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Despacho Exportación","fruta_despachoex",$ARRYAOBTENERID[0]['ID_DESPACHOEX'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],$_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );

            //REDIRECCIONAR A PAGINA registroDespachoEX.php
            $id_dato = $ARRYAOBTENERID[0]['ID_DESPACHOEX'];
            $accion_dato = "crear";
            // echo "<script type='text/javascript'> location.href ='registroDespachoEX.php?op';</script>";
                    echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Creado",
                        text:"El registro de despacho se ha creado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                            location.href = "registroDespachoEX.php?op&id='.$id_dato.'&a='.$accion_dato.'";
                        
                    })
                </script>';


        }
        //OPERACION EDICION DE FILA
        if (isset($_REQUEST['GUARDAR'])) {
            $DESPACHOEX->__SET('FECHA_DESPACHOEX', $_REQUEST['FECHADESPACHOEX']);
            $DESPACHOEX->__SET('NUMERO_SELLO_DESPACHOEX', $_REQUEST['NUMEROSELLO']);
            $DESPACHOEX->__SET('FECHA_GUIA_DESPACHOEX', $_REQUEST['FECHAGUIA']);
            $DESPACHOEX->__SET('NUMERO_GUIA_DESPACHOEX', $_REQUEST['NUMEROGUIA']);
            $DESPACHOEX->__SET('NUMERO_CONTENEDOR_DESPACHOEX', $_REQUEST['NUMEROCONTENDORDESPACHOEX']);
            $DESPACHOEX->__SET('NUMERO_PLANILLA_DESPACHOEX', $_REQUEST['NUMEROPLANILLADESPACHOEX']);
            $DESPACHOEX->__SET('TERMOGRAFO_DESPACHOEX', $_REQUEST['TERMOGRAFODESPACHOEX']);
            $DESPACHOEX->__SET('CANTIDAD_ENVASE_DESPACHOEX', $_REQUEST['TOTALENVASE']);
            $DESPACHOEX->__SET('KILOS_NETO_DESPACHOEX', $_REQUEST['TOTALNETO']);
            $DESPACHOEX->__SET('KILOS_BRUTO_DESPACHOEX', $_REQUEST['TOTALBRUTO']);
            $DESPACHOEX->__SET('PATENTE_CAMION', $_REQUEST['PATENTECAMIONE']);
            $DESPACHOEX->__SET('PATENTE_CARRO', $_REQUEST['PATENTECARROE']);
            $DESPACHOEX->__SET('OBSERVACION_DESPACHOEX', $_REQUEST['OBSERVACIONDESPACHOEX']);
            $DESPACHOEX->__SET('TINPUSDA', $_REQUEST['TINPUSDAE']);
            $DESPACHOEX->__SET('TEMBARQUE_DESPACHOEX', $_REQUEST['TEMBARQUEE']);
            $DESPACHOEX->__SET('FECHAETD_DESPACHOEX', $_REQUEST['FECHAETDE']);
            $DESPACHOEX->__SET('FECHAETA_DESPACHOEX', $_REQUEST['FECHAETAE']);
            $DESPACHOEX->__SET('BOOKING_DESPACHOEX', $_REQUEST['BOOKINGINSTRUCTIVOE']);
            $DESPACHOEX->__SET('ID_ICARGA', $_REQUEST['ICARGADE']);
            $DESPACHOEX->__SET('ID_EXPPORTADORA', $_REQUEST['EXPORTADORAE']);
            $DESPACHOEX->__SET('ID_RFINAL', $_REQUEST['RFINALE']);
            $DESPACHOEX->__SET('ID_AGCARGA', $_REQUEST['AGCARGAE']);
            $DESPACHOEX->__SET('ID_DFINAL', $_REQUEST['DFINALE']);
            $DESPACHOEX->__SET('ID_PAIS', $_REQUEST['PAISE']);
            $DESPACHOEX->__SET('ID_MERCADO', $_REQUEST['MERCADOE']);
            if ($_REQUEST['TEMBARQUEE'] == "1") {
                $DESPACHOEX->__SET('CRT_DESPACHOEX', $_REQUEST['CRTE']);
                $DESPACHOEX->__SET('ID_TRANSPORTE2', $_REQUEST['TRANSPORTE2E']);
                $DESPACHOEX->__SET('ID_LCARGA', $_REQUEST['LCARGAE']);
                $DESPACHOEX->__SET('ID_LDESTINO', $_REQUEST['LDESTINOE']);
            }
            if ($_REQUEST['TEMBARQUEE'] == "2") {
                $DESPACHOEX->__SET('ID_LAREA', $_REQUEST['LAEREAE']);
                $DESPACHOEX->__SET('NAVE_DESPACHOEX', $_REQUEST['NAVEE']);
                $DESPACHOEX->__SET('NVIAJE_DESPACHOEX', $_REQUEST['NVIAJEE']);
                $DESPACHOEX->__SET('ID_ACARGA', $_REQUEST['ACARGAE']);
                $DESPACHOEX->__SET('ID_ADESTINO', $_REQUEST['ADESTINOE']);
            }
            if ($_REQUEST['TEMBARQUEE'] == "3") {
                $DESPACHOEX->__SET('FECHASTACKING_DESPACHOEX', $_REQUEST['FECHASTACKINGE']);
                $DESPACHOEX->__SET('ID_NAVIERA', $_REQUEST['NAVIERAE']);
                $DESPACHOEX->__SET('NAVE_DESPACHOEX', $_REQUEST['NAVEE']);
                $DESPACHOEX->__SET('NVIAJE_DESPACHOEX', $_REQUEST['NVIAJEE']);
                $DESPACHOEX->__SET('ID_PCARGA', $_REQUEST['PCARGAE']);
                $DESPACHOEX->__SET('ID_PDESTINO', $_REQUEST['PDESTINOE']);
            }
            $DESPACHOEX->__SET('ID_INPECTOR', $_REQUEST['INPECTORE']);
            $DESPACHOEX->__SET('ID_TRANSPORTE', $_REQUEST['TRANSPORTEE']);
            $DESPACHOEX->__SET('ID_CONDUCTOR', $_REQUEST['CONDUCTORE']);
            $DESPACHOEX->__SET('ID_CONTRAPARTE', $_REQUEST['CONTRAPARTEE']);
            $DESPACHOEX->__SET('ID_USUARIOM', $IDUSUARIOS);
            $DESPACHOEX->__SET('ID_DESPACHOEX', $_REQUEST['IDP']);
            //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
            $DESPACHOEX_ADO->actualizarDespachoex($DESPACHOEX);

            $AUSUARIO_ADO->agregarAusuario2($NUMEROVER,1,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de Despacho Exportación","fruta_despachoex",$_REQUEST['IDP'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],$_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );
            
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
                        location.href = "registroDespachoEX.php?op&id='.$id_dato.'&a='.$accion_dato.'";                        
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
                        location.href = "registroDespachoEX.php?op&id='.$id_dato.'&a='.$accion_dato.'";                        
                    })
                </script>';
            }
        }
        //OPERACION PARA CERRAR LA DESPACHOEX
        if (isset($_REQUEST['CERRAR'])) {
            //UTILIZACION METODOS SET DEL MODELO
            //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO
            $ARRAYDDESPACHOEX2 = $EXIEXPORTACION_ADO->verExistenciaPorDespachoEX($_REQUEST['IDP']);
            if (empty($ARRAYDDESPACHOEX2)) {
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
                $SINO = "1";
            } else {
                $MENSAJE = "";
                $SINO = "0";
            }
            if ($SINO == "0") {
                $DESPACHOEX->__SET('FECHA_DESPACHOEX', $_REQUEST['FECHADESPACHOEX']);
                $DESPACHOEX->__SET('NUMERO_SELLO_DESPACHOEX', $_REQUEST['NUMEROSELLO']);
                $DESPACHOEX->__SET('FECHA_GUIA_DESPACHOEX', $_REQUEST['FECHAGUIA']);
                $DESPACHOEX->__SET('NUMERO_GUIA_DESPACHOEX', $_REQUEST['NUMEROGUIA']);
                $DESPACHOEX->__SET('NUMERO_CONTENEDOR_DESPACHOEX', $_REQUEST['NUMEROCONTENDORDESPACHOEX']);
                $DESPACHOEX->__SET('NUMERO_PLANILLA_DESPACHOEX', $_REQUEST['NUMEROPLANILLADESPACHOEX']);
                $DESPACHOEX->__SET('TERMOGRAFO_DESPACHOEX', $_REQUEST['TERMOGRAFODESPACHOEX']);
                $DESPACHOEX->__SET('CANTIDAD_ENVASE_DESPACHOEX', $_REQUEST['TOTALENVASE']);
                $DESPACHOEX->__SET('KILOS_NETO_DESPACHOEX', $_REQUEST['TOTALNETO']);
                $DESPACHOEX->__SET('KILOS_BRUTO_DESPACHOEX', $_REQUEST['TOTALBRUTO']);
                $DESPACHOEX->__SET('PATENTE_CAMION', $_REQUEST['PATENTECAMIONE']);
                $DESPACHOEX->__SET('PATENTE_CARRO', $_REQUEST['PATENTECARROE']);
                $DESPACHOEX->__SET('OBSERVACION_DESPACHOEX', $_REQUEST['OBSERVACIONDESPACHOEX']);
                $DESPACHOEX->__SET('TINPUSDA', $_REQUEST['TINPUSDAE']);
                $DESPACHOEX->__SET('TEMBARQUE_DESPACHOEX', $_REQUEST['TEMBARQUEE']);
                $DESPACHOEX->__SET('FECHAETD_DESPACHOEX', $_REQUEST['FECHAETDE']);
                $DESPACHOEX->__SET('FECHAETA_DESPACHOEX', $_REQUEST['FECHAETAE']);
                $DESPACHOEX->__SET('BOOKING_DESPACHOEX', $_REQUEST['BOOKINGINSTRUCTIVOE']);
                $DESPACHOEX->__SET('ID_ICARGA', $_REQUEST['ICARGADE']);
                $DESPACHOEX->__SET('ID_EXPPORTADORA', $_REQUEST['EXPORTADORAE']);
                $DESPACHOEX->__SET('ID_RFINAL', $_REQUEST['RFINALE']);
                $DESPACHOEX->__SET('ID_AGCARGA', $_REQUEST['AGCARGAE']);
                $DESPACHOEX->__SET('ID_DFINAL', $_REQUEST['DFINALE']);
                $DESPACHOEX->__SET('ID_PAIS', $_REQUEST['PAISE']);
                $DESPACHOEX->__SET('ID_MERCADO', $_REQUEST['MERCADOE']);
                if ($_REQUEST['TEMBARQUEE'] == "1") {
                    $DESPACHOEX->__SET('CRT_DESPACHOEX', $_REQUEST['CRTE']);
                    $DESPACHOEX->__SET('ID_TRANSPORTE2', $_REQUEST['TRANSPORTE2E']);
                    $DESPACHOEX->__SET('ID_LCARGA', $_REQUEST['LCARGAE']);
                    $DESPACHOEX->__SET('ID_LDESTINO', $_REQUEST['LDESTINOE']);
                }
                if ($_REQUEST['TEMBARQUEE'] == "2") {
                    $DESPACHOEX->__SET('ID_LAREA', $_REQUEST['LAEREAE']);
                    $DESPACHOEX->__SET('NAVE_DESPACHOEX', $_REQUEST['NAVEE']);
                    $DESPACHOEX->__SET('NVIAJE_DESPACHOEX', $_REQUEST['NVIAJEE']);
                    $DESPACHOEX->__SET('ID_ACARGA', $_REQUEST['ACARGAE']);
                    $DESPACHOEX->__SET('ID_ADESTINO', $_REQUEST['ADESTINOE']);
                }
                if ($_REQUEST['TEMBARQUEE'] == "3") {
                    $DESPACHOEX->__SET('FECHASTACKING_DESPACHOEX', $_REQUEST['FECHASTACKINGE']);
                    $DESPACHOEX->__SET('ID_NAVIERA', $_REQUEST['NAVIERAE']);
                    $DESPACHOEX->__SET('NAVE_DESPACHOEX', $_REQUEST['NAVEE']);
                    $DESPACHOEX->__SET('NVIAJE_DESPACHOEX', $_REQUEST['NVIAJEE']);
                    $DESPACHOEX->__SET('ID_PCARGA', $_REQUEST['PCARGAE']);
                    $DESPACHOEX->__SET('ID_PDESTINO', $_REQUEST['PDESTINOE']);
                }
                $DESPACHOEX->__SET('ID_INPECTOR', $_REQUEST['INPECTORE']);
                $DESPACHOEX->__SET('ID_TRANSPORTE', $_REQUEST['TRANSPORTEE']);
                $DESPACHOEX->__SET('ID_CONDUCTOR', $_REQUEST['CONDUCTORE']);
                $DESPACHOEX->__SET('ID_CONTRAPARTE', $_REQUEST['CONTRAPARTEE']);
                $DESPACHOEX->__SET('ID_USUARIOM', $IDUSUARIOS);
                $DESPACHOEX->__SET('ID_DESPACHOEX', $_REQUEST['IDP']);
                //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                $DESPACHOEX_ADO->actualizarDespachoex($DESPACHOEX);

                $DESPACHOEX->__SET('ID_DESPACHOEX', $_REQUEST['IDP']);
                //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                $DESPACHOEX_ADO->cerrado($DESPACHOEX);

                $AUSUARIO_ADO->agregarAusuario2($NUMEROVER,1,3,"".$_SESSION["NOMBRE_USUARIO"].", Cerrar Despacho Exportación","fruta_despachoex",$_REQUEST['IDP'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],$_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );
           
                $ARRAYEXISENCIADESPACHOEX = $EXIEXPORTACION_ADO->verExistenciaPorDespachoEX2($_REQUEST['IDP']);
                $ARRAYPCDESPACHO = $PCDESPACHO_ADO->buscarPorDespacho2($_REQUEST['IDP']);

                foreach ($ARRAYPCDESPACHO as $r) :
                    $PCDESPACHO->__SET('ID_PCDESPACHO', $r['ID_PCDESPACHO']);
                    //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                    $PCDESPACHO_ADO->despachodo($PCDESPACHO);
                endforeach;
                //$DESPACHOEX->__SET('FECHA_DESPACHOEX', $_REQUEST['FECHADESPACHOEXE']);
                foreach ($ARRAYEXISENCIADESPACHOEX as $r) :
                    $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $r['ID_EXIEXPORTACION']);
                    $EXIEXPORTACION->__SET('FECHA_DESPACHOEX', $_REQUEST['FECHADESPACHOEXE']);
                    //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                    $EXIEXPORTACION_ADO->despachadoEx($EXIEXPORTACION);
                endforeach;

                //REDIRECCIONAR A PAGINA registroDespachoex.php
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
                                location.href = "registroDespachoEX.php?op&id='.$id_dato.'&a='.$accion_dato.'";                            
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
                                location.href = "registroDespachoEX.php?op&id='.$id_dato.'&a='.$accion_dato.'";                            
                            })
                        </script>';
                    } 
            }
        }

        if (isset($_REQUEST['QUITAR'])) {
            $IDQUITAR = $_REQUEST['IDQUITAR'];
            $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $IDQUITAR);
            // LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
            $EXIEXPORTACION_ADO->actualizarDeselecionarDespachoExCambiarEstado($EXIEXPORTACION);            

            $AUSUARIO_ADO->agregarAusuario2("NULL",1,2,"".$_SESSION["NOMBRE_USUARIO"].", Se Quito la Existencia de despacho exportación.","fruta_exiexportacion", "NULL" ,$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

            echo '<script>
                Swal.fire({
                    icon:"error",
                    title:"Accion realizada",
                    text:"Se ha quitado la existencia del despacho.",
                    showConfirmButton: true,
                    confirmButtonText:"Cerrar",
                    closeOnConfirm:false
                }).then((result)=>{
                    location.href = "registroDespachoEX.php?op&id='.$id_dato.'&a='.$accion_dato.'";                            
                })
            </script>';
        }

        if (isset($_REQUEST['TERMOGRAFOS'])) {
            //echo '<script> alert("accede a termografo");</script>';
            $ARRAYDDESPACHOMP2 = $EXIEXPORTACION_ADO->verExistenciaPorDespacho($_REQUEST['IDP']);
            //echo '<script> alert("2");</script>';
            if (empty($ARRAYDDESPACHOMP2)) {
                //echo '<script> alert("3");</script>';
                $MENSAJE = "TIENE  QUE HABER AL MENOS UNA EXISTENCIA DE PRODUCTO TERMINADO";
                $SINO = "1";
            } else {
               // echo '<script> alert("4");</script>';
                $MENSAJE = "";
                $SINO = "0";
            }

  

            if ($SINO == 0) {

                //echo '<script> alert("accede 2");</script>';
                $ARRAYIDDESPACHO = $_REQUEST['IDDESPACHO'];
                $ARRAYIDEXIEXPORTACIONTERMOGRAFO = $_REQUEST['IDEXIEXPORTACIONTERMOGRAFO'];
                $ARRAYFOLIOEXIEXPORTACIONTERMOGRAFO = $_REQUEST['FOLIOEXIEXPORTACIONTERMOGRAFO'];
                $ARRAYTERMOGRAFO = $_REQUEST['TERMOGRAFO'];
                $ARRAYIDTERMOGRAFO = $_REQUEST['IDTERMOGRAFO'];

                var_dump($ARRAYFOLIOEXIEXPORTACIONTERMOGRAFO);
                foreach ($ARRAYIDTERMOGRAFO as $ID) :
                    $IDTERMOGRAFO = $ID - 1;
           
                    $IDDESPACHO = $ARRAYIDDESPACHO[$IDTERMOGRAFO];
                   
                    $IDEXIEXPORTACIONTERMOGRAFO = $ARRAYIDEXIEXPORTACIONTERMOGRAFO[$IDTERMOGRAFO];
                  
                    $FOLIOEXIEXPORTACIONTERMOGRAFO = $ARRAYFOLIOEXIEXPORTACIONTERMOGRAFO[$IDTERMOGRAFO];
                   
                    $TERMOGRAFO = $ARRAYTERMOGRAFO[$IDTERMOGRAFO];
                

                    //var_dump($TERMOGRAFO);

                    if ($TERMOGRAFO != "") {
                        $SINOTERMOGRAFO = 0;
                        $MENSAJETERMOGRAFO2 = $MENSAJETERMOGRAFO2;
                        //die('trae datos');
                    } /*else {
                        //die('no trae datos');
                        $SINOTERMOGRAFO = 1;
                        $MENSAJETERMOGRAFO2 = $MENSAJETERMOGRAFO2 . "" . $FOLIOEXIEXPORTACIONTERMOGRAFO . ": SE DEBE INGRESAR UN DATO. ";
                    }*/
                    if ($SINOTERMOGRAFO == 0) {
                        //die('si trae ingresa');
                        $EXIEXPORTACION->__SET('ID_DESPACHO', $IDDESPACHO);
                        $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $IDEXIEXPORTACIONTERMOGRAFO);
                        $EXIEXPORTACION->__SET('N_TERMOGRAFO', $TERMOGRAFO);
                        // LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                        $EXIEXPORTACION_ADO->actualizarDespachoAgregarTermografo($EXIEXPORTACION);

                        $MENSAJETERMOGRAFO2 = $EXIEXPORTACION_ADO->actualizarDespachoAgregarTermografo($EXIEXPORTACION);

                        //$AUSUARIO_ADO->agregarAusuario2("NULL",1,2,"".$_SESSION["NOMBRE_USUARIO"].", Se agrego el precio a la Existencia en el despacho de producto terminado.","fruta_exiexportacion", "NULL" ,$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  
                    }
                endforeach;
                
                if($MENSAJETERMOGRAFO2!=""){                
                    echo '
                        <script>
                            Swal.fire({
                                icon:"warning",
                                title:"Accion restringida",
                                text:"' . $MENSAJETERMOGRAFO2 . '",
                                showConfirmButton: true,
                                confirmButtonText:"Cerrar",
                                closeOnConfirm:false
                            }).then((result)=>{
                                location.href ="registroDespachoEX.php?op&id='.$id_dato.'&a='.$accion_dato.'";                                
                            });
                    </script>';
                }else{                                
                    echo '
                        <script>
                            Swal.fire({
                                icon:"success",
                                title:"Accion realizada",
                                text:"Se agregaron los termógrafos correctamente.",
                                showConfirmButton: true,
                                confirmButtonText:"Cerrar",
                                closeOnConfirm:false
                            }).then((result)=>{
                                location.href ="registroDespachoEX.php?op&id='.$id_dato.'&a='.$accion_dato.'";                                
                            });
                    </script>';
                }
            }
        }
?>

</body>

</html>