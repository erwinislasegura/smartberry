<?php

include_once "../../assest/config/validarUsuarioFruta.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
//BASE
include_once '../../assest/controlador/TUSUARIO_ADO.php';
include_once '../../assest/controlador/USUARIO_ADO.php';
include_once '../../assest/controlador/EMPRESA_ADO.php';
include_once '../../assest/controlador/PLANTA_ADO.php';
include_once '../../assest/controlador/TEMPORADA_ADO.php';

// OPERACION
include_once '../../assest/controlador/MERCADO_ADO.php';
include_once '../../assest/controlador/TSERVICIO_ADO.php';

include_once '../../assest/controlador/EXPORTADORA_ADO.php';
include_once '../../assest/controlador/CONSIGNATARIO_ADO.php';
include_once '../../assest/controlador/NOTIFICADOR_ADO.php';
include_once '../../assest/controlador/BROKER_ADO.php';
include_once '../../assest/controlador/RFINAL_ADO.php';

include_once '../../assest/controlador/AGCARGA_ADO.php';
include_once '../../assest/controlador/AADUANA_ADO.php';
include_once '../../assest/controlador/DFINAL_ADO.php';


include_once '../../assest/controlador/TRANSPORTE_ADO.php';
include_once '../../assest/controlador/LCARGA_ADO.php';
include_once '../../assest/controlador/LDESTINO_ADO.php';

include_once '../../assest/controlador/LAEREA_ADO.php';
include_once '../../assest/controlador/AERONAVE_ADO.php';
include_once '../../assest/controlador/ACARGA_ADO.php';
include_once '../../assest/controlador/ADESTINO_ADO.php';

include_once '../../assest/controlador/NAVIERA_ADO.php';
include_once '../../assest/controlador/PCARGA_ADO.php';
include_once '../../assest/controlador/PDESTINO_ADO.php';


include_once '../../assest/controlador/FPAGO_ADO.php';
include_once '../../assest/controlador/MVENTA_ADO.php';
include_once '../../assest/controlador/CVENTA_ADO.php';
include_once '../../assest/controlador/TFLETE_ADO.php';

include_once '../../assest/controlador/TCONTENEDOR_ADO.php';
include_once '../../assest/controlador/ATMOSFERA_ADO.php';
include_once '../../assest/controlador/EMISIONBL_ADO.php';
include_once '../../assest/controlador/PAIS_ADO.php';
include_once '../../assest/controlador/SEGURO_ADO.php';

include_once '../../assest/controlador/EEXPORTACION_ADO.php';
include_once '../../assest/controlador/ESPECIES_ADO.php';
include_once '../../assest/controlador/VESPECIES_ADO.php';
include_once '../../assest/controlador/TCALIBRE_ADO.php';
include_once '../../assest/controlador/TMONEDA_ADO.php';
include_once '../../assest/controlador/TMANEJO_ADO.php';


include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/DESPACHOEX_ADO.php';
include_once '../../assest/controlador/ECOMERCIAL_ADO.php';



include_once '../../assest/controlador/ICARGA_ADO.php';
include_once '../../assest/controlador/DICARGA_ADO.php';

include_once '../../assest/modelo/ICARGA.php';
include_once '../../assest/modelo/DICARGA.php';



//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$TUSUARIO_ADO = new TUSUARIO_ADO();
$USUARIO_ADO = new USUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();

$MERCADO_ADO =  new MERCADO_ADO();
$TSERVICIO_ADO =  new TSERVICIO_ADO();
$EXPORTADORA_ADO =  new EXPORTADORA_ADO();
$CONSIGNATARIO_ADO =  new CONSIGNATARIO_ADO();
$NOTIFICADOR_ADO =  new NOTIFICADOR_ADO();
$BROKER_ADO =  new BROKER_ADO();
$RFINAL_ADO =  new RFINAL_ADO();
$AGCARGA_ADO =  new AGCARGA_ADO();
$AADUANA_ADO =  new AADUANA_ADO();
$DFINAL_ADO =  new DFINAL_ADO();
$TRANSPORTE_ADO =  new TRANSPORTE_ADO();
$LCARGA_ADO =  new LCARGA_ADO();
$LDESTINO_ADO =  new LDESTINO_ADO();
$LAEREA_ADO =  new LAEREA_ADO();
$AERONAVE_ADO =  new AERONAVE_ADO();
$ACARGA_ADO =  new ACARGA_ADO();
$ADESTINO_ADO =  new ADESTINO_ADO();
$NAVIERA_ADO =  new NAVIERA_ADO();
$PCARGA_ADO =  new PCARGA_ADO();
$PDESTINO_ADO =  new PDESTINO_ADO();
$FPAGO_ADO =  new FPAGO_ADO();
$MVENTA_ADO =  new MVENTA_ADO();
$CVENTA_ADO =  new CVENTA_ADO();
$TFLETE_ADO =  new TFLETE_ADO();
$TCONTENEDOR_ADO =  new TCONTENEDOR_ADO();
$ATMOSFERA_ADO =  new ATMOSFERA_ADO();
$EMISIONBL_ADO =  new EMISIONBL_ADO();
$SEGURO_ADO =  new SEGURO_ADO();

$EEXPORTACION_ADO = new EEXPORTACION_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$ESPECIES_ADO =  new ESPECIES_ADO();
$TCALIBRE_ADO =  new TCALIBRE_ADO();
$PAIS_ADO =  new PAIS_ADO();
$TCALIBRE_ADO = new TCALIBRE_ADO();
$TMONEDA_ADO =  new TMONEDA_ADO();
$TMANEJO_ADO =  new TMANEJO_ADO();
$ECOMERCIAL_ADO =  new ECOMERCIAL_ADO();

$PRODUCTOR_ADO = new PRODUCTOR_ADO();
$DESPACHOEX_ADO = new DESPACHOEX_ADO();

$ICARGA_ADO =  new ICARGA_ADO();
$DICARGA_ADO =  new DICARGA_ADO();

//INIICIALIZAR MODELO
$ICARGA =  new ICARGA();
$DICARGA =  new DICARGA();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$NUMERO = "";
$NUMEROVER = "";
$FECHACDOCUMENTALICARGA="";
$IDINSTRUCTIVO = "";
$FECHAINSTRUCTIVO = "";
$TSERVICIO = "";
$BOOKINGINSTRUCTIVO = "";
$NUMEROREFERENCIAINSTRUCTIVO = "";
$MERCADO = "";
$FECHAINGRESO = "";
$FECHAMODIFCIACION = "";
$EXPORTADORA = "";
$CONSIGNATARIO = "";
$NOTIFICADOR = "";
$BROKER = "";
$RFINAL = "";
$FECHAETD = "";
$FECHAETA = "";
$FECHAETAREAL = "";
$NCONTENEDOR="";
$AADUANA = "";
$AGCARGA = "";
$TEMBARQUE = "";
$DFINAL = "";
$CRT = "";
$TRANSPORTE = "";
$LCARGA = "";
$LDESTINO = "";
$LAEREA = "";
$ACARGA = "";
$ADESTINO = "";
$NAVIERA = "";
$NAVE = "";
$FECHASTACKING = "";
$NVIAJE = "";
$PCARGA = "";
$PDESTINO = "";
$FPAGO = "";
$CVENTA = "";
$MVENTA = "";
$FUMIGADO = "";
$TFLETE = "";
$COSTOFLETE = "";
$FDA = "";
$TCONTENEDOR = "";
$ATMOSFERA = "";
$EMISIONBL = "";
$TINSTRUCTIVO = "";
$O2INSTRUCTIVO = "";
$CO2INSTRUCTIVO = "";
$TALAMAPAINSTRUCTIVO = "";
$ALAMPAINSTRUCTIVO = "";
$DUSINSTRUCTIVO = "";
$BOLAWBCRTINSTRUCTIVO = "";
$NETOINSTRUCTIVO = 0;
$REBATEINSTRUCTIVO = 0;
$PUBLICAINSTRUCTIVO = 0;
$SEGURO = "";
$OBSERVACIONINSTRUCTIVO = "";
$OBSERVACIONIINSTRUCTIVO = "";
$ESTADO = "";
$PAIS = "";


$PUBLICA = "";

$ESTANDAR = "";
$ESPECIES = "";
$VESPECIES = "";
$ENVASE = "";
$PRECIOUS = "";
$CALIBRE = "";


$PESOENVASEESTANDAR = "";
$PESOPALLETEESTANDAR = "";
$PESOBRUTOEESTANDAR = "";
$PESONETOEESTANDAR = "";
$TOTALPRECIOUS = "";

$TOTALENVASE = "";
$TOTALKILONETO = "";
$TOTALKILOBRUTO = "";
$TOTALUS = "";


$TOTALENVASEV = "";
$TOTALNETOV = "";
$TOTALBRUTO = "";
$TOTALUSV = "";

$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";

$IDOP = "";
$OP = "";
$IDOP2 = "";
$OP2 = "";
$SINO = "";
$IDELIMINAR = "";
$MENSAJE = "";

$DISABLEDD = "";
$DISABLEDDSTYLE = "";


$DISABLED0 = "disabled";
$DISABLEDSTYLE0 = "style='background-color: #eeeeee;'";
$DISABLED = "";
$DISABLEDSTYLE = "";
$DISABLED2 = "disabled";
$DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
$DISABLED3 = "";
$DISABLEDSTYLE3 = "";

//INICIALIZAR ARREGLOS

$ARRAYEMPRESA = "";
$ARRAYPLANTA = "";
$ARRAYTEMPORADA = "";

$ARRAYFECHAACTUAL = "";
$ARRAYVERICARGA = "";

$ARRAYDICARGA = "";
$ARRAYMERCADO = "";
$ARRAYTSERVICIO = "";

$ARRAYEXPORTADORA = "";
$ARRAYCONSIGNATARIO = "";
$ARRAYNOTIFICADOR = "";
$ARRAYBROKER = "";
$ARRAYRFINAL = "";

$ARRAYAADUANA = "";
$ARRAYAGCARGA = "";
$ARRAYDFINAL = "";

$ARRAYTRANSPORTE = "";
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

$ARRAYFPAGO = "";
$ARRAYMVENTA = "";
$ARRAYCVENTA = "";
$ARRAYTFLETE = "";

$ARRAYTCONTENEDOR = "";
$ARRAYATMOSFERA = "";
$ARRAYEMISIONBL = "";

$ARRAYESTANDAR = "";
$ARRAYVERESTANDAR = "";
$ARRAYVERESTANDARID = "";
$ARRAYESPECIES = "";
$ARRAYVERESPECIES = "";
$ARRAYVESPECIES = "";
$ARRAYVERVESPECIES = "";
$ARRAYCALIBRE = "";

$ARRAYICARGA2 = "";
$ARRAYPAIS = "";
$ARRAYVERPLANTA = "";
$ARRAYVERDCARGA = "";
$ARRAYSEGURO = "";
$ARRAYPRODUCTOR = "";


$ARRAYDCARGA = "";
$ARRAYDCARGATOTAL = "";
$ARRAYDCARGATOTAL2 = "";
$ARRAYCONSOLIDADODESPACHO = "";
$ARRAYCONSOLIDADODESPACHO2 = "";
$ARRAYCALIBRE = "";
$ARRAYNUMERO = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES

$ARRAYTSERVICIO = $TSERVICIO_ADO->listarTservicioPorEmpresaCBX($EMPRESAS);
$ARRAYMERCADO = $MERCADO_ADO->listarMercadoPorEmpresaCBX($EMPRESAS);

$ARRAYEXPORTADORA = $EXPORTADORA_ADO->listarExportadoraCBX();
$ARRAYCONSIGNATARIO = $CONSIGNATARIO_ADO->listarConsignatorioPorEmpresaCBX($EMPRESAS);

$ARRAYNOTIFICADOR = $NOTIFICADOR_ADO->listarNotificadorPorEmpresaCBX($EMPRESAS);
$ARRAYBROKER = $BROKER_ADO->listarBrokerPorEmpresaCBX($EMPRESAS);
$ARRAYRFINAL = $RFINAL_ADO->listarRfinalPorEmpresaCBX($EMPRESAS);

$ARRAYAADUANA = $AADUANA_ADO->listarAaduanaPorEmpresaCBX($EMPRESAS);
$ARRAYAGCARGA = $AGCARGA_ADO->listarAgcargaPorEmpresaCBX($EMPRESAS);
$ARRAYDFINAL = $DFINAL_ADO->listarDfinalPorEmpresaCBX($EMPRESAS);

$ARRAYTRANSPORTE = $TRANSPORTE_ADO->listarTransportePorEmpresaCBX($EMPRESAS);
$ARRAYLCARGA = $LCARGA_ADO->listarLcargaPorEmpresaCBX($EMPRESAS);
$ARRAYLDESTINO = $LDESTINO_ADO->listarLdestinoPorEmpresaCBX($EMPRESAS);

$ARRAYLAEREA = $LAEREA_ADO->listarLaereaPorEmpresaCBX($EMPRESAS);
$ARRAYACARGA = $ACARGA_ADO->listarAcargaPorEmpresaCBX($EMPRESAS);
$ARRAYADESTINO = $ADESTINO_ADO->listarAdestinoPorEmpresaCBX($EMPRESAS);

$ARRAYNAVIERA = $NAVIERA_ADO->listarNavierPorEmpresaCBX($EMPRESAS);
$ARRAYPCARGA = $PCARGA_ADO->listarPcargaPorEmpresaCBX($EMPRESAS);
$ARRAYPDESTINO = $PDESTINO_ADO->listarPdestinoPorEmpresaCBX($EMPRESAS);

$ARRAYFPAGO = $FPAGO_ADO->listarFpagoPorEmpresaCBX($EMPRESAS);
$ARRAYMVENTA = $MVENTA_ADO->listarMventaPorEmpresaCBX($EMPRESAS);
$ARRAYCVENTA = $CVENTA_ADO->listarCventaPorEmpresaCBX($EMPRESAS);;
$ARRAYTFLETE = $TFLETE_ADO->listarTfletePorEmpresaCBX($EMPRESAS);

$ARRAYTCONTENEDOR = $TCONTENEDOR_ADO->listarTcontenedorPorEmpresaCBX($EMPRESAS);
$ARRAYATMOSFERA = $ATMOSFERA_ADO->listarAtmosferaPorEmpresaCBX($EMPRESAS);
$ARRAYEMISIONBL = $EMISIONBL_ADO->listarEmisionblPorEmpresaCBX($EMPRESAS);
$ARRAYSEGURO = $SEGURO_ADO->listarSeguroPorEmpressCBX($EMPRESAS);

$ARRAYESPECIES = $ESPECIES_ADO->listarEspeciesCBX();
$ARRAYCALIBRE = $TCALIBRE_ADO->listarCalibrePorEmpresaCBX($EMPRESAS);
$ARRAYPAIS = $PAIS_ADO->listarPaisCBX();

$ARRAYESTANDAR = $EEXPORTACION_ADO->listarEstandarPorEmpresaCBX($EMPRESAS);

$ARRAYVERPLANTA = $PLANTA_ADO->verPlanta($PLANTAS);
if ($ARRAYVERPLANTA) {
    $FDA = $ARRAYVERPLANTA[0]['FDA_PLANTA'];
}
$ARRAYFECHAACTUAL = $ICARGA_ADO->obtenerFecha();
$FECHAINSTRUCTIVO = $ARRAYFECHAACTUAL[0]['FECHA'];
$FECHAETA = $ARRAYFECHAACTUAL[0]['FECHA'];
$FECHAETD = $ARRAYFECHAACTUAL[0]['FECHA'];
$FECHASTACKING = $ARRAYFECHAACTUAL[0]['FECHA'];

include_once "../../assest/config/validarDatosUrl.php";
include_once "../../assest/config/datosUrlD.php";

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

    $ARRAYDCARGA = $DICARGA_ADO->buscarPorIcarga2($IDOP);
    $ARRAYDCARGATOTAL = $DICARGA_ADO->totalesPorIcarga($IDOP);
    $ARRAYDCARGATOTAL2 = $DICARGA_ADO->totalesPorIcarga2($IDOP);
    $ARRAYCONSOLIDADODESPACHO =  $DESPACHOEX_ADO->consolidadoDespachoExistencia2($IDOP);
    $ARRAYCONSOLIDADODESPACHOTOTAL =  $DESPACHOEX_ADO->obtenerTotalconsolidadoDespachoExistencia2($IDOP);
    $TOTALENVASECONSOLIADO=$ARRAYCONSOLIDADODESPACHOTOTAL[0]['ENVASE'];
    $TOTALNETOCONSOLIADO=$ARRAYCONSOLIDADODESPACHOTOTAL[0]['NETO'];
    $TOTALBRUTOCONSOLIADO=$ARRAYCONSOLIDADODESPACHOTOTAL[0]['BRUTO'];

    $TOTALENVASEV = $ARRAYDCARGATOTAL2[0]['ENVASE'];
    $TOTALNETOV = $ARRAYDCARGATOTAL2[0]['NETO'];
    $TOTALBRUTOV = $ARRAYDCARGATOTAL2[0]['BRUTO'];
    $TOTALUSV = $ARRAYDCARGATOTAL2[0]['TOTALUS'];

    $TOTALENVASE = $ARRAYDCARGATOTAL[0]['ENVASE'];
    $TOTALNETO = $ARRAYDCARGATOTAL[0]['NETO'];
    $TOTALBRUTO = $ARRAYDCARGATOTAL[0]['BRUTO'];
    $TOTALUS = $ARRAYDCARGATOTAL[0]['TOTALUS'];

    //IDENTIFICACIONES DE OPERACIONES
    //crear =  OBTENCION DE DATOS INICIALES PARA PODER CREAR LA RECEPCION
    if ($OP == "crear") {
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL

        $DISABLED = "";
        $DISABLEDSTYLE = "";
        $DISABLED2 = "";
        $DISABLEDSTYLE2 = "";
        $DISABLED3 = "disabled";
        $DISABLEDMENU = "disabled";
        $DISABLEDSTYLE3 = "style='background-color: #eeeeee;'";
        $ARRAYVERICARGA = $ICARGA_ADO->verIcarga($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYVERICARGA as $r) :
            $NUMEROVER = $r['NUMERO_ICARGA'];
            $FECHAINSTRUCTIVO = $r['FECHA_ICARGA'];
            $TSERVICIO = $r['ID_TSERVICIO'];
            $BOOKINGINSTRUCTIVO = $r['BOOKING_ICARGA'];
            $FECHACDOCUMENTALICARGA = $r['FECHA_CDOCUMENTAL_ICARGA'];
            $NUMEROREFERENCIAINSTRUCTIVO = $r['NREFERENCIA_ICARGA'];
            $FECHAINGRESO = $r['INGRESO'];
            $FECHAMODIFCIACION = $r['MODIFICACION'];
            $EXPORTADORA = $r['ID_EXPPORTADORA'];
            $CONSIGNATARIO = $r['ID_CONSIGNATARIO'];
            $EMISIONBL = $r['ID_EMISIONBL'];
            $NOTIFICADOR = $r['ID_NOTIFICADOR'];
            $BROKER = $r['ID_BROKER'];
            $RFINAL = $r['ID_RFINAL'];
            $MERCADO = $r['ID_MERCADO'];
            $FECHAETD = $r['FECHAETD_ICARGA'];
            $FECHAETA = $r['FECHAETA_ICARGA'];
            $FECHAETAREAL = $r['FECHAETAREAL_ICARGA'];
            $NCONTENEDOR = $r['NCONTENEDOR_ICARGA'];
            $AADUANA = $r['ID_AADUANA'];
            $AGCARGA = $r['ID_AGCARGA'];
            $DFINAL = $r['ID_DFINAL'];
            $FDA = $r['FDA_ICARGA'];
            $TEMBARQUE = $r['TEMBARQUE_ICARGA'];
            $COSTOFLETE = $r['COSTO_FLETE_ICARGA'];
            if ($TEMBARQUE) {
                if ($TEMBARQUE == "1") {
                    $TRANSPORTE = $r['ID_TRANSPORTE'];
                    $CRT = $r['CRT_ICARGA'];
                    $LCARGA = $r['ID_LCARGA'];
                    $LDESTINO = $r['ID_LDESTINO'];
                }
                if ($TEMBARQUE == "2") {
                    $LAEREA = $r['ID_LAREA'];
                    $NAVE = $r['NAVE_ICARGA'];
                    $NVIAJE = $r['NVIAJE_ICARGA'];
                    $ACARGA = $r['ID_ACARGA'];
                    $ADESTINO = $r['ID_ADESTINO'];
                }
                if ($TEMBARQUE == "3") {
                    $NAVIERA = $r['ID_NAVIERA'];
                    $NAVE = $r['NAVE_ICARGA'];
                    $FECHASTACKING = $r['FECHASTACKING_ICARGA'];
                    $NVIAJE = $r['NVIAJE_ICARGA'];
                    $PCARGA = $r['ID_PCARGA'];
                    $PDESTINO = $r['ID_PDESTINO'];
                }
            }
            $FPAGO = $r['ID_FPAGO'];
            $CVENTA = $r['ID_CVENTA'];
            $MVENTA = $r['ID_MVENTA'];
            $FUMIGADO = $r['FUMIGADO_ICARGA'];
            $TFLETE = $r['ID_TFLETE'];
            $TCONTENEDOR = $r['ID_TCONTENEDOR'];
            $ATMOSFERA = $r['ID_ATMOSFERA'];
            
            $TINSTRUCTIVO = $r['T_ICARGA'];
            $O2INSTRUCTIVO = $r['O2_ICARGA'];
            $CO2INSTRUCTIVO = $r['C02_ICARGA'];
            $ALAMPAINSTRUCTIVO = $r['ALAMPA_ICARGA'];
            $DUSINSTRUCTIVO = $r['DUS_ICARGA'];
            $BOLAWBCRTINSTRUCTIVO = $r['BOLAWBCRT_ICARGA'];
            $NETOINSTRUCTIVO = $r['NETO_ICARGA'];
            $REBATEINSTRUCTIVO = $r['REBATE_ICARGA'];
            $PUBLICAINSTRUCTIVO = $r['PUBLICA_ICARGA'];
            $SEGURO = $r['ID_SEGURO'];
            $OBSERVACIONINSTRUCTIVO = $r['OBSERVACION_ICARGA'];
            $OBSERVACIONIINSTRUCTIVO = $r['OBSERVACIONI_ICARGA'];
            $PAIS = $r['ID_PAIS'];
            $EMPRESA = $r['ID_EMPRESA'];
            $TEMPORADA = $r['ID_TEMPORADA'];
            $ESTADO = $r['ESTADO'];

        endforeach;
    }
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {

        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL

        $DISABLED = "";
        $DISABLEDSTYLE = "";
        $DISABLED2 = "";
        $DISABLEDSTYLE2 = "";
        $DISABLED3 = "disabled";
        $DISABLEDMENU = "disabled";
        $DISABLEDSTYLE3 = "style='background-color: #eeeeee;'";
        $ARRAYVERICARGA = $ICARGA_ADO->verIcarga($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYVERICARGA as $r) :

            $NUMEROVER = $r['NUMERO_ICARGA'];
            $FECHAINSTRUCTIVO = $r['FECHA_ICARGA'];
            $FECHACDOCUMENTALICARGA = $r['FECHA_CDOCUMENTAL_ICARGA'];
            $TSERVICIO = $r['ID_TSERVICIO'];
            $BOOKINGINSTRUCTIVO = $r['BOOKING_ICARGA'];
            $NUMEROREFERENCIAINSTRUCTIVO = $r['NREFERENCIA_ICARGA'];
            $FECHAINGRESO = $r['INGRESO'];
            $FECHAMODIFCIACION = $r['MODIFICACION'];
            $EXPORTADORA = $r['ID_EXPPORTADORA'];
            $CONSIGNATARIO = $r['ID_CONSIGNATARIO'];
            $EMISIONBL = $r['ID_EMISIONBL'];
            $NOTIFICADOR = $r['ID_NOTIFICADOR'];
            $BROKER = $r['ID_BROKER'];
            $RFINAL = $r['ID_RFINAL'];
            $MERCADO = $r['ID_MERCADO'];
            $FECHAETD = $r['FECHAETD_ICARGA'];
            $FECHAETA = $r['FECHAETA_ICARGA'];
            $FECHAETAREAL = $r['FECHAETAREAL_ICARGA'];
            $NCONTENEDOR = $r['NCONTENEDOR_ICARGA'];
            $AADUANA = $r['ID_AADUANA'];
            $AGCARGA = $r['ID_AGCARGA'];
            $DFINAL = $r['ID_DFINAL'];
            $FDA = $r['FDA_ICARGA'];
            $TEMBARQUE = $r['TEMBARQUE_ICARGA'];
            $COSTOFLETE = $r['COSTO_FLETE_ICARGA'];
            if ($TEMBARQUE) {
                if ($TEMBARQUE == "1") {
                    $TRANSPORTE = $r['ID_TRANSPORTE'];
                    $CRT = $r['CRT_ICARGA'];
                    $LCARGA = $r['ID_LCARGA'];
                    $LDESTINO = $r['ID_LDESTINO'];
                }
                if ($TEMBARQUE == "2") {
                    $LAEREA = $r['ID_LAREA'];
                    $NAVE = $r['NAVE_ICARGA'];
                    $NVIAJE = $r['NVIAJE_ICARGA'];
                    $ACARGA = $r['ID_ACARGA'];
                    $ADESTINO = $r['ID_ADESTINO'];
                }
                if ($TEMBARQUE == "3") {
                    $NAVIERA = $r['ID_NAVIERA'];
                    $NAVE = $r['NAVE_ICARGA'];
                    $FECHASTACKING = $r['FECHASTACKING_ICARGA'];
                    $NVIAJE = $r['NVIAJE_ICARGA'];
                    $PCARGA = $r['ID_PCARGA'];
                    $PDESTINO = $r['ID_PDESTINO'];
                }
            }
            $FPAGO = $r['ID_FPAGO'];
            $CVENTA = $r['ID_CVENTA'];
            $MVENTA = $r['ID_MVENTA'];
            $FUMIGADO = $r['FUMIGADO_ICARGA'];
            $TFLETE = $r['ID_TFLETE'];
            $TCONTENEDOR = $r['ID_TCONTENEDOR'];
            $ATMOSFERA = $r['ID_ATMOSFERA'];
            $TINSTRUCTIVO = $r['T_ICARGA'];
            $O2INSTRUCTIVO = $r['O2_ICARGA'];
            $CO2INSTRUCTIVO = $r['C02_ICARGA'];
            $ALAMPAINSTRUCTIVO = $r['ALAMPA_ICARGA'];
            $DUSINSTRUCTIVO = $r['DUS_ICARGA'];
            $BOLAWBCRTINSTRUCTIVO = $r['BOLAWBCRT_ICARGA'];
            $NETOINSTRUCTIVO = $r['NETO_ICARGA'];
            $REBATEINSTRUCTIVO = $r['REBATE_ICARGA'];
            $PUBLICAINSTRUCTIVO = $r['PUBLICA_ICARGA'];
            $SEGURO = $r['ID_SEGURO'];
            $OBSERVACIONINSTRUCTIVO = $r['OBSERVACION_ICARGA'];
            $OBSERVACIONIINSTRUCTIVO = $r['OBSERVACIONI_ICARGA'];
            $PAIS = $r['ID_PAIS'];
            $EMPRESA = $r['ID_EMPRESA'];
            $TEMPORADA = $r['ID_TEMPORADA'];
            $ESTADO = $r['ESTADO'];

        endforeach;
    }
    //ver =  OBTENCION DE DATOS PARA LA VISUALIZACION DEL REGISTRO
    if ($OP == "ver") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION


        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR  
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL   
        $DISABLED = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $DISABLED3 = "disabled";
        $DISABLEDMENU = "disabled";
        $DISABLEDSTYLE3 = "style='background-color: #eeeeee;'";
        $ARRAYVERICARGA = $ICARGA_ADO->verIcarga($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYVERICARGA as $r) :
            $NUMEROVER = $r['NUMERO_ICARGA'];
            $FECHAINSTRUCTIVO = $r['FECHA_ICARGA'];
            $FECHACDOCUMENTALICARGA = $r['FECHA_CDOCUMENTAL_ICARGA'];
            $TSERVICIO = $r['ID_TSERVICIO'];
            $BOOKINGINSTRUCTIVO = $r['BOOKING_ICARGA'];
            $NUMEROREFERENCIAINSTRUCTIVO = $r['NREFERENCIA_ICARGA'];
            $FECHAINGRESO = $r['INGRESO'];
            $FECHAMODIFCIACION = $r['MODIFICACION'];
            $EXPORTADORA = $r['ID_EXPPORTADORA'];
            $CONSIGNATARIO = $r['ID_CONSIGNATARIO'];
            $EMISIONBL = $r['ID_EMISIONBL'];
            $NOTIFICADOR = $r['ID_NOTIFICADOR'];
            $BROKER = $r['ID_BROKER'];
            $RFINAL = $r['ID_RFINAL'];
            $MERCADO = $r['ID_MERCADO'];
            $FECHAETD = $r['FECHAETD_ICARGA'];
            $FECHAETA = $r['FECHAETA_ICARGA'];
            $FECHAETAREAL = $r['FECHAETAREAL_ICARGA'];
            $NCONTENEDOR = $r['NCONTENEDOR_ICARGA'];
            $AADUANA = $r['ID_AADUANA'];
            $AGCARGA = $r['ID_AGCARGA'];
            $DFINAL = $r['ID_DFINAL'];
            $FDA = $r['FDA_ICARGA'];
            $TEMBARQUE = $r['TEMBARQUE_ICARGA'];
            $COSTOFLETE = $r['COSTO_FLETE_ICARGA'];
            if ($TEMBARQUE) {
                if ($TEMBARQUE == "1") {
                    $TRANSPORTE = $r['ID_TRANSPORTE'];
                    $CRT = $r['CRT_ICARGA'];
                    $LCARGA = $r['ID_LCARGA'];
                    $LDESTINO = $r['ID_LDESTINO'];
                }
                if ($TEMBARQUE == "2") {
                    $LAEREA = $r['ID_LAREA'];
                    $NAVE = $r['NAVE_ICARGA'];
                    $NVIAJE = $r['NVIAJE_ICARGA'];
                    $ACARGA = $r['ID_ACARGA'];
                    $ADESTINO = $r['ID_ADESTINO'];
                }
                if ($TEMBARQUE == "3") {
                    $NAVIERA = $r['ID_NAVIERA'];
                    $NAVE = $r['NAVE_ICARGA'];
                    $FECHASTACKING = $r['FECHASTACKING_ICARGA'];
                    $NVIAJE = $r['NVIAJE_ICARGA'];
                    $PCARGA = $r['ID_PCARGA'];
                    $PDESTINO = $r['ID_PDESTINO'];
                }
            }
            $FPAGO = $r['ID_FPAGO'];
            $CVENTA = $r['ID_CVENTA'];
            $MVENTA = $r['ID_MVENTA'];
            $FUMIGADO = $r['FUMIGADO_ICARGA'];
            $TFLETE = $r['ID_TFLETE'];
            $TCONTENEDOR = $r['ID_TCONTENEDOR'];
            $ATMOSFERA = $r['ID_ATMOSFERA'];
            $TINSTRUCTIVO = $r['T_ICARGA'];
            $O2INSTRUCTIVO = $r['O2_ICARGA'];
            $CO2INSTRUCTIVO = $r['C02_ICARGA'];
            $ALAMPAINSTRUCTIVO = $r['ALAMPA_ICARGA'];
            $DUSINSTRUCTIVO = $r['DUS_ICARGA'];
            $BOLAWBCRTINSTRUCTIVO = $r['BOLAWBCRT_ICARGA'];
            $NETOINSTRUCTIVO = $r['NETO_ICARGA'];
            $REBATEINSTRUCTIVO = $r['REBATE_ICARGA'];
            $PUBLICAINSTRUCTIVO = $r['PUBLICA_ICARGA'];
            $SEGURO = $r['ID_SEGURO'];
            $OBSERVACIONINSTRUCTIVO = $r['OBSERVACION_ICARGA'];
            $OBSERVACIONIINSTRUCTIVO = $r['OBSERVACIONI_ICARGA'];
            $PAIS = $r['ID_PAIS'];
            $EMPRESA = $r['ID_EMPRESA'];
            $TEMPORADA = $r['ID_TEMPORADA'];
            $ESTADO = $r['ESTADO'];

        endforeach;
    }
}

//PROCESO PARA OBTENER LOS DATOS DEL FORMULARIO  Y MANTENERLO AL ACTUALIZACION QUE REALIZA EL SELECT DE PRODUCTOR
if (isset($_POST)) {
    //DATOS GENERALES        
    if (isset($_REQUEST['IDINSTRUCTIVO'])) {
        $IDINSTRUCTIVO = $_REQUEST['IDINSTRUCTIVO'];
    }
    if (isset($_REQUEST['FECHAINSTRUCTIVO'])) {
        $FECHAINSTRUCTIVO = $_REQUEST['FECHAINSTRUCTIVO'];
    }
    if (isset($_REQUEST['TSERVICIO'])) {
        $TSERVICIO = $_REQUEST['TSERVICIO'];
    }
    if (isset($_REQUEST['BOOKINGINSTRUCTIVO'])) {
        $BOOKINGINSTRUCTIVO = $_REQUEST['BOOKINGINSTRUCTIVO'];
    }
    if (isset($_REQUEST['NUMEROREFERENCIAINSTRUCTIVO'])) {
        $NUMEROREFERENCIAINSTRUCTIVO = $_REQUEST['NUMEROREFERENCIAINSTRUCTIVO'];
    }
    if (isset($_REQUEST['MERCADO'])) {
        $MERCADO = $_REQUEST['MERCADO'];
    }
    if (isset($_REQUEST['FECHACDOCUMENTALICARGA'])) {
        $FECHACDOCUMENTALICARGA = $_REQUEST['FECHACDOCUMENTALICARGA'];
    } 

    //DATOS EXPORTACION 
    if (isset($_REQUEST['EXPORTADORA'])) {
        $EXPORTADORA = $_REQUEST['EXPORTADORA'];
    }
    if (isset($_REQUEST['CONSIGNATARIO'])) {
        $CONSIGNATARIO = $_REQUEST['CONSIGNATARIO'];
    }
    if (isset($_REQUEST['EMISIONBL'])) {
        $EMISIONBL = $_REQUEST['EMISIONBL'];
    }
    if (isset($_REQUEST['NOTIFICADOR'])) {
        $NOTIFICADOR = $_REQUEST['NOTIFICADOR'];
    }
    if (isset($_REQUEST['BROKER'])) {
        $BROKER = $_REQUEST['BROKER'];
    }
    if (isset($_REQUEST['RFINAL'])) {
        $RFINAL = $_REQUEST['RFINAL'];
    }
    if (isset($_REQUEST['PAIS'])) {
        $PAIS = $_REQUEST['PAIS'];
    }
    //DATOS EMBARQUE 
    if (isset($_REQUEST['FECHAETD'])) {
        $FECHAETD = $_REQUEST['FECHAETD'];
    }
    if (isset($_REQUEST['FECHAETA'])) {
        $FECHAETA = $_REQUEST['FECHAETA'];
    }
    if (isset($_REQUEST['FECHAETAREAL'])) {
        $FECHAETAREAL = $_REQUEST['FECHAETAREAL'];
    }
    if (isset($_REQUEST['NCONTENEDOR'])) {
        $NCONTENEDOR = $_REQUEST['NCONTENEDOR'];
    }    
    if (isset($_REQUEST['AADUANA'])) {
        $AADUANA = $_REQUEST['AADUANA'];
    }
    if (isset($_REQUEST['AGCARGA'])) {
        $AGCARGA = $_REQUEST['AGCARGA'];
    }
    if (isset($_REQUEST['DFINAL'])) {
        $DFINAL = $_REQUEST['DFINAL'];
    }
    if (isset($_REQUEST['FDA'])) {
        $FDA = $_REQUEST['FDA'];
    }
    //TIPOS EMBAQRQUE
    if (isset($_REQUEST['TEMBARQUE'])) {
        $TEMBARQUE = $_REQUEST['TEMBARQUE'];
        if ($TEMBARQUE == "1") {
            if (isset($_REQUEST['TRANSPORTE'])) {
                $TRANSPORTE = $_REQUEST['TRANSPORTE'];
            }
            if (isset($_REQUEST['CRT'])) {
                $CRT = $_REQUEST['CRT'];
            }
            if (isset($_REQUEST['LCARGA'])) {
                $LCARGA = $_REQUEST['LCARGA'];
            }
            if (isset($_REQUEST['LDESTINO'])) {
                $LDESTINO = $_REQUEST['LDESTINO'];
            }
        }
        if ($TEMBARQUE == "2") {
            if (isset($_REQUEST['LAEREA'])) {
                $LAEREA = $_REQUEST['LAEREA'];
                $ARRAYAERONAVE = $AERONAVE_ADO->buscarAeronavePorLarea($LAEREA);
            }
            if (isset($_REQUEST['NAVE'])) {
                $NAVE = $_REQUEST['NAVE'];
            }
            if (isset($_REQUEST['NVIAJE'])) {
                $NVIAJE = $_REQUEST['NVIAJE'];
            }
            if (isset($_REQUEST['ACARGA'])) {
                $ACARGA = $_REQUEST['ACARGA'];
            }
            if (isset($_REQUEST['ADESTINO'])) {
                $ADESTINO = $_REQUEST['ADESTINO'];
            }
        }
        if ($TEMBARQUE == "3") {
            if (isset($_REQUEST['NAVIERA'])) {
                $NAVIERA = $_REQUEST['NAVIERA'];
            }
            if (isset($_REQUEST['NAVE'])) {
                $NAVE = $_REQUEST['NAVE'];
            }
            if (isset($_REQUEST['FECHASTACKING'])) {
                $FECHASTACKING = $_REQUEST['FECHASTACKING'];
            }
            if (isset($_REQUEST['NVIAJE'])) {
                $NVIAJE = $_REQUEST['NVIAJE'];
            }
            if (isset($_REQUEST['PCARGA'])) {
                $PCARGA = $_REQUEST['PCARGA'];
            }
            if (isset($_REQUEST['PDESTINO'])) {
                $PDESTINO = $_REQUEST['PDESTINO'];
            }
        }
    }

    //DATO COMERCIAL
    if (isset($_REQUEST['FPAGO'])) {
        $FPAGO = $_REQUEST['FPAGO'];
    }
    if (isset($_REQUEST['CVENTA'])) {
        $CVENTA = $_REQUEST['CVENTA'];
    }
    if (isset($_REQUEST['MVENTA'])) {
        $MVENTA = $_REQUEST['MVENTA'];
    }
    if (isset($_REQUEST['MVENTA'])) {
        $MVENTA = $_REQUEST['MVENTA'];
    }
    if (isset($_REQUEST['TFLETE'])) {
        $TFLETE = $_REQUEST['TFLETE'];
    }
    if (isset($_REQUEST['FUMIGADO'])) {
        $FUMIGADO = $_REQUEST['FUMIGADO'];
    }
    //DATO CONTENEDRO
    if (isset($_REQUEST['TCONTENEDOR'])) {
        $TCONTENEDOR = $_REQUEST['TCONTENEDOR'];
    }
    if (isset($_REQUEST['ATMOSFERA'])) {
        $ATMOSFERA = $_REQUEST['ATMOSFERA'];
    }
    if (isset($_REQUEST['TINSTRUCTIVO'])) {
        $TINSTRUCTIVO = $_REQUEST['TINSTRUCTIVO'];
    }
    if (isset($_REQUEST['O2INSTRUCTIVO'])) {
        $O2INSTRUCTIVO = $_REQUEST['O2INSTRUCTIVO'];
    }
    if (isset($_REQUEST['CO2INSTRUCTIVO'])) {
        $CO2INSTRUCTIVO = $_REQUEST['CO2INSTRUCTIVO'];
    }
    if (isset($_REQUEST['TALAMAPAINSTRUCTIVO'])) {
        $TALAMAPAINSTRUCTIVO = $_REQUEST['TALAMAPAINSTRUCTIVO'];
    }
    if (isset($_REQUEST['ALAMPAINSTRUCTIVO'])) {
        $ALAMPAINSTRUCTIVO = $_REQUEST['ALAMPAINSTRUCTIVO'];
    }
    //OTROS
    if (isset($_REQUEST['DUSINSTRUCTIVO'])) {
        $DUSINSTRUCTIVO = $_REQUEST['DUSINSTRUCTIVO'];
    }
    if (isset($_REQUEST['BOLAWBCRTINSTRUCTIVO'])) {
        $BOLAWBCRTINSTRUCTIVO = $_REQUEST['BOLAWBCRTINSTRUCTIVO'];
    }
    if (isset($_REQUEST['NETOINSTRUCTIVO'])) {
        $NETOINSTRUCTIVO = $_REQUEST['NETOINSTRUCTIVO'];
    }
    if (isset($_REQUEST['REBATEINSTRUCTIVO'])) {
        $REBATEINSTRUCTIVO = $_REQUEST['REBATEINSTRUCTIVO'];
    }  
    if (isset($_REQUEST['SEGURO'])) {
        $SEGURO = $_REQUEST['SEGURO'];
    }
    if (isset($_REQUEST['OBSERVACIONINSTRUCTIVO'])) {
        $OBSERVACIONINSTRUCTIVO = $_REQUEST['OBSERVACIONINSTRUCTIVO'];
    }
    if (isset($_REQUEST['OBSERVACIONIINSTRUCTIVO'])) {
        $OBSERVACIONIINSTRUCTIVO = $_REQUEST['OBSERVACIONIINSTRUCTIVO'];
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
    <title> Registro Instructivo Carga</title>
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

                FECHAINSTRUCTIVO = document.getElementById("FECHAINSTRUCTIVO").value;
                TSERVICIO = document.getElementById("TSERVICIO").selectedIndex;
                TEMBARQUE = document.getElementById("TEMBARQUE").selectedIndex;
                BOOKINGINSTRUCTIVO = document.getElementById("BOOKINGINSTRUCTIVO").value;
                NUMEROREFERENCIAINSTRUCTIVO = document.getElementById("NUMEROREFERENCIAINSTRUCTIVO").value;
                EXPORTADORA = document.getElementById("EXPORTADORA").selectedIndex;
                AADUANA = document.getElementById("AADUANA").selectedIndex;
                FPAGO = document.getElementById("FPAGO").selectedIndex;
                TCONTENEDOR = document.getElementById("TCONTENEDOR").selectedIndex;
                OBSERVACIONINSTRUCTIVO = document.getElementById("OBSERVACIONINSTRUCTIVO").value;




                document.getElementById('val_fecha').innerHTML = "";
                document.getElementById('val_tservicio').innerHTML = "";
                document.getElementById('val_tembarque').innerHTML = "";
                document.getElementById('val_booking').innerHTML = "";
                document.getElementById('val_nreferencia').innerHTML = "";
                document.getElementById('val_aaduana').innerHTML = "";
                document.getElementById('val_fpago').innerHTML = "";
                document.getElementById('val_tcontenedor').innerHTML = "";
                document.getElementById('val_observacion').innerHTML = "";


                if (FECHAINSTRUCTIVO == null || FECHAINSTRUCTIVO.length == 0 || /^\s+$/.test(FECHAINSTRUCTIVO)) {
                    document.form_reg_dato.FECHAINSTRUCTIVO.focus();
                    document.form_reg_dato.FECHAINSTRUCTIVO.style.borderColor = "#FF0000";
                    document.getElementById('val_fecha').innerHTML = "NO A INGRESADO DATO";
                    return false;
                }
                document.form_reg_dato.FECHAINSTRUCTIVO.style.borderColor = "#4AF575";

                if (TSERVICIO == null || TSERVICIO == 0) {
                    document.form_reg_dato.TSERVICIO.focus();
                    document.form_reg_dato.TSERVICIO.style.borderColor = "#FF0000";
                    document.getElementById('val_tservicio').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                    return false;
                }
                document.form_reg_dato.TSERVICIO.style.borderColor = "#4AF575";

                if (TEMBARQUE == null || TEMBARQUE == 0) {
                    document.form_reg_dato.TEMBARQUE.focus();
                    document.form_reg_dato.TEMBARQUE.style.borderColor = "#FF0000";
                    document.getElementById('val_tembarque').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                    return false;
                }
                document.form_reg_dato.TEMBARQUE.style.borderColor = "#4AF575";

                if (BOOKINGINSTRUCTIVO == null || BOOKINGINSTRUCTIVO.length == 0 || /^\s+$/.test(BOOKINGINSTRUCTIVO)) {
                    document.form_reg_dato.BOOKINGINSTRUCTIVO.focus();
                    document.form_reg_dato.BOOKINGINSTRUCTIVO.style.borderColor = "#FF0000";
                    document.getElementById('val_booking').innerHTML = "NO A INGRESADO DATO";
                    return false;
                }
                document.form_reg_dato.BOOKINGINSTRUCTIVO.style.borderColor = "#4AF575";

                if (NUMEROREFERENCIAINSTRUCTIVO == null || NUMEROREFERENCIAINSTRUCTIVO.length == 0 || /^\s+$/.test(NUMEROREFERENCIAINSTRUCTIVO)) {
                    document.form_reg_dato.NUMEROREFERENCIAINSTRUCTIVO.focus();
                    document.form_reg_dato.BOOKINGINSTRUCTIVO.style.borderColor = "#FF0000";
                    document.getElementById('val_nreferencia').innerHTML = "NO A INGRESADO DATO";
                    return false;
                }
                document.form_reg_dato.NUMEROREFERENCIAINSTRUCTIVO.style.borderColor = "#4AF575";

                /*
                if (EXPORTADORA) {
                    CONSIGNATARIO = document.getElementById("CONSIGNATARIO").selectedIndex;
                    NOTIFICADOR = document.getElementById("NOTIFICADOR").selectedIndex;
                    BROKER = document.getElementById("BROKER").selectedIndex;
                    RFINAL = document.getElementById("RFINAL").selectedIndex;
                    MERCADO = document.getElementById("MERCADO").selectedIndex;
                    PAIS = document.getElementById("PAIS").selectedIndex;
                    DFINAL = document.getElementById("DFINAL").selectedIndex;

                    document.getElementById('val_exportadora').innerHTML = "";
                    document.getElementById('val_consignatario').innerHTML = "";
                    document.getElementById('val_notificador').innerHTML = "";
                    document.getElementById('val_broker').innerHTML = "";
                    document.getElementById('val_rfinal').innerHTML = "";
                    document.getElementById('val_mercado').innerHTML = "";
                    document.getElementById('val_pais').innerHTML = "";
                    document.getElementById('val_dfinal').innerHTML = "";
                    if (EXPORTADORA == null || EXPORTADORA == 0) {
                        document.form_reg_dato.EXPORTADORA.focus();
                        document.form_reg_dato.EXPORTADORA.style.borderColor = "#FF0000";
                        document.getElementById('val_exportadora').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.EXPORTADORA.style.borderColor = "#4AF575";

                    if (CONSIGNATARIO == null || CONSIGNATARIO == 0) {
                        document.form_reg_dato.CONSIGNATARIO.focus();
                        document.form_reg_dato.CONSIGNATARIO.style.borderColor = "#FF0000";
                        document.getElementById('val_consignatario').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.CONSIGNATARIO.style.borderColor = "#4AF575";

                    if (NOTIFICADOR == null || NOTIFICADOR == 0) {
                        document.form_reg_dato.NOTIFICADOR.focus();
                        document.form_reg_dato.NOTIFICADOR.style.borderColor = "#FF0000";
                        document.getElementById('val_notificador').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.NOTIFICADOR.style.borderColor = "#4AF575";

                    if (BROKER == null || BROKER == 0) {
                        document.form_reg_dato.BROKER.focus();
                        document.form_reg_dato.BROKER.style.borderColor = "#FF0000";
                        document.getElementById('val_broker').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.BROKER.style.borderColor = "#4AF575";

                    if (RFINAL == null || RFINAL == 0) {
                        document.form_reg_dato.RFINAL.focus();
                        document.form_reg_dato.RFINAL.style.borderColor = "#FF0000";
                        document.getElementById('val_rfinal').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.RFINAL.style.borderColor = "#4AF575";

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

                    if (DFINAL == null || DFINAL == 0) {
                        document.form_reg_dato.DFINAL.focus();
                        document.form_reg_dato.DFINAL.style.borderColor = "#FF0000";
                        document.getElementById('val_dfinal').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.DFINAL.style.borderColor = "#4AF575";
                }
                */
                /*
                if (AADUANA) {

                    FECHAETD = document.getElementById("FECHAETD").value;
                    FECHAETA = document.getElementById("FECHAETA").value;
                    AGCARGA = document.getElementById("AGCARGA").selectedIndex;

                    document.getElementById('val_agcarga').innerHTML = "";
                    document.getElementById('val_fechaetd').innerHTML = "";
                    document.getElementById('val_fechaeta').innerHTML = "";

                    if (AADUANA == null || AADUANA == 0) {
                        document.form_reg_dato.AADUANA.focus();
                        document.form_reg_dato.AADUANA.style.borderColor = "#FF0000";
                        document.getElementById('val_aaduana').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.AADUANA.style.borderColor = "#4AF575";

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
                */
                /*
                if (TCONTENEDOR) {

                    ATMOSFERA = document.getElementById("ATMOSFERA").selectedIndex;
                    TINSTRUCTIVO = document.getElementById("TINSTRUCTIVO").value;
                    O2INSTRUCTIVO = document.getElementById("O2INSTRUCTIVO").value;
                    CO2INSTRUCTIVO = document.getElementById("CO2INSTRUCTIVO").value;
                    ALAMPAINSTRUCTIVO = document.getElementById("ALAMPAINSTRUCTIVO").value;

                    document.getElementById('val_atmosfera').innerHTML = "";
                    document.getElementById('val_t').innerHTML = "";
                    document.getElementById('val_o2').innerHTML = "";
                    document.getElementById('val_co2').innerHTML = "";
                    document.getElementById('val_alampa').innerHTML = "";

                    if (TCONTENEDOR == null || TCONTENEDOR == 0) {
                        document.form_reg_dato.TCONTENEDOR.focus();
                        document.form_reg_dato.TCONTENEDOR.style.borderColor = "#FF0000";
                        document.getElementById('val_tcontenedor').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.TCONTENEDOR.style.borderColor = "#4AF575";

                    if (ATMOSFERA == null || ATMOSFERA == 0) {
                        document.form_reg_dato.ATMOSFERA.focus();
                        document.form_reg_dato.ATMOSFERA.style.borderColor = "#FF0000";
                        document.getElementById('val_atmosfera').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.ATMOSFERA.style.borderColor = "#4AF575";

                    if (TINSTRUCTIVO == null || /^\s+$/.test(TINSTRUCTIVO)) {
                        document.form_reg_dato.TINSTRUCTIVO.focus();
                        document.form_reg_dato.TINSTRUCTIVO.style.borderColor = "#FF0000";
                        document.getElementById('val_t').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.TINSTRUCTIVO.style.borderColor = "#4AF575";

                    if (O2INSTRUCTIVO == null ||  /^\s+$/.test(O2INSTRUCTIVO)) {
                        document.form_reg_dato.O2INSTRUCTIVO.focus();
                        document.form_reg_dato.O2INSTRUCTIVO.style.borderColor = "#FF0000";
                        document.getElementById('val_o2').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.O2INSTRUCTIVO.style.borderColor = "#4AF575";

                    if (CO2INSTRUCTIVO == null || /^\s+$/.test(CO2INSTRUCTIVO)) {
                        document.form_reg_dato.CO2INSTRUCTIVO.focus();
                        document.form_reg_dato.CO2INSTRUCTIVO.style.borderColor = "#FF0000";
                        document.getElementById('val_co2').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.CO2INSTRUCTIVO.style.borderColor = "#4AF575";


                    if (ALAMPAINSTRUCTIVO == null  || /^\s+$/.test(ALAMPAINSTRUCTIVO)) {
                        document.form_reg_dato.ALAMPAINSTRUCTIVO.focus();
                        document.form_reg_dato.ALAMPAINSTRUCTIVO.style.borderColor = "#FF0000";
                        document.getElementById('val_alampa').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.ALAMPAINSTRUCTIVO.style.borderColor = "#4AF575";

                }*/
                /*
                if (FPAGO) {
                    MVENTA = document.getElementById("MVENTA").selectedIndex;
                    CVENTA = document.getElementById("CVENTA").selectedIndex;
                    TFLETE = document.getElementById("TFLETE").selectedIndex;
                    COSTOFLETE = document.getElementById("COSTOFLETE").value;
                    FUMIGADO = document.getElementById("FUMIGADO").selectedIndex;
                    DUSINSTRUCTIVO = document.getElementById("DUSINSTRUCTIVO").value;
                    BOLAWBCRTINSTRUCTIVO = document.getElementById("BOLAWBCRTINSTRUCTIVO").value;
                    NETOINSTRUCTIVO = document.getElementById("NETOINSTRUCTIVO").value;
                    REBATEINSTRUCTIVO = document.getElementById("REBATEINSTRUCTIVO").value;
                    SEGURO = document.getElementById("SEGURO").selectedIndex;


                    document.getElementById('val_mventa').innerHTML = "";
                    document.getElementById('val_cventa').innerHTML = "";
                    document.getElementById('val_tflete').innerHTML = "";
                    document.getElementById('val_costoflete').innerHTML = "";
                    document.getElementById('val_fumigado').innerHTML = "";
                    document.getElementById('val_dus').innerHTML = "";
                    document.getElementById('val_bolawbcrt').innerHTML = "";
                    document.getElementById('val_neto').innerHTML = "";
                    document.getElementById('val_rebate').innerHTML = "";
                    document.getElementById('val_seguro').innerHTML = "";
                    if (FPAGO == null || FPAGO == 0) {
                        document.form_reg_dato.FPAGO.focus();
                        document.form_reg_dato.FPAGO.style.borderColor = "#FF0000";
                        document.getElementById('val_fpago').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.FPAGO.style.borderColor = "#4AF575";

                    if (MVENTA == null || MVENTA == 0) {
                        document.form_reg_dato.MVENTA.focus();
                        document.form_reg_dato.MVENTA.style.borderColor = "#FF0000";
                        document.getElementById('val_mventa').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.MVENTA.style.borderColor = "#4AF575";

                    if (CVENTA == null || CVENTA == 0) {
                        document.form_reg_dato.CVENTA.focus();
                        document.form_reg_dato.CVENTA.style.borderColor = "#FF0000";
                        document.getElementById('val_cventa').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.CVENTA.style.borderColor = "#4AF575";

                    if (TFLETE == null || TFLETE == 0) {
                        document.form_reg_dato.TFLETE.focus();
                        document.form_reg_dato.TFLETE.style.borderColor = "#FF0000";
                        document.getElementById('val_tflete').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.TFLETE.style.borderColor = "#4AF575";


                    if (COSTOFLETE == null || COSTOFLETE.length == 0 || /^\s+$/.test(COSTOFLETE)) {
                        document.form_reg_dato.COSTOFLETE.focus();
                        document.form_reg_dato.COSTOFLETE.style.borderColor = "#FF0000";
                        document.getElementById('val_costoflete').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.COSTOFLETE.style.borderColor = "#4AF575";

                    if (FUMIGADO == null || FUMIGADO == 0) {
                        document.form_reg_dato.FUMIGADO.focus();
                        document.form_reg_dato.FUMIGADO.style.borderColor = "#FF0000";
                        document.getElementById('val_fumigado').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.FUMIGADO.style.borderColor = "#4AF575";

                    if (DUSINSTRUCTIVO == null || DUSINSTRUCTIVO.length == 0 || /^\s+$/.test(DUSINSTRUCTIVO)) {
                        document.form_reg_dato.DUSINSTRUCTIVO.focus();
                        document.form_reg_dato.DUSINSTRUCTIVO.style.borderColor = "#FF0000";
                        document.getElementById('val_dus').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DUSINSTRUCTIVO.style.borderColor = "#4AF575";

                    if (BOLAWBCRTINSTRUCTIVO == null || BOLAWBCRTINSTRUCTIVO.length == 0 || /^\s+$/.test(BOLAWBCRTINSTRUCTIVO)) {
                        document.form_reg_dato.BOLAWBCRTINSTRUCTIVO.focus();
                        document.form_reg_dato.BOLAWBCRTINSTRUCTIVO.style.borderColor = "#FF0000";
                        document.getElementById('val_bolawbcrt').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.BOLAWBCRTINSTRUCTIVO.style.borderColor = "#4AF575";

                    if (NETOINSTRUCTIVO == null || NETOINSTRUCTIVO.length == 0 || /^\s+$/.test(NETOINSTRUCTIVO)) {
                        document.form_reg_dato.NETOINSTRUCTIVO.focus();
                        document.form_reg_dato.NETOINSTRUCTIVO.style.borderColor = "#FF0000";
                        document.getElementById('val_neto').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NETOINSTRUCTIVO.style.borderColor = "#4AF575";

                    if (REBATEINSTRUCTIVO == null || REBATEINSTRUCTIVO.length == 0 || /^\s+$/.test(REBATEINSTRUCTIVO)) {
                        document.form_reg_dato.REBATEINSTRUCTIVO.focus();
                        document.form_reg_dato.REBATEINSTRUCTIVO.style.borderColor = "#FF0000";
                        document.getElementById('val_rebate').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.REBATEINSTRUCTIVO.style.borderColor = "#4AF575";


                    if (SEGURO == null || SEGURO == 0) {
                        document.form_reg_dato.SEGURO.focus();
                        document.form_reg_dato.SEGURO.style.borderColor = "#FF0000";
                        document.getElementById('val_seguro').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.SEGURO.style.borderColor = "#4AF575";
                }*/
                /*
                if (OBSERVACIONINSTRUCTIVO == null || OBSERVACIONINSTRUCTIVO.length == 0 || /^\s+$/.test(OBSERVACIONINSTRUCTIVO)) {
                    document.form_reg_dato.OBSERVACIONINSTRUCTIVO.focus();
                    document.form_reg_dato.OBSERVACIONINSTRUCTIVO.style.borderColor = "#FF0000";
                    document.getElementById('val_observacion').innerHTML = "NO A INGRESADO DATO";
                    return false;
                }
                document.form_reg_dato.OBSERVACIONINSTRUCTIVO.style.borderColor = "#4AF575";
                */



            }

            function validacionCerrar() {
                FECHAINSTRUCTIVO = document.getElementById("FECHAINSTRUCTIVO").value;
                FECHACDOCUMENTALICARGA = document.getElementById("FECHACDOCUMENTALICARGA").value;
                TSERVICIO = document.getElementById("TSERVICIO").selectedIndex;
                TEMBARQUE = document.getElementById("TEMBARQUE").selectedIndex;
                BOOKINGINSTRUCTIVO = document.getElementById("BOOKINGINSTRUCTIVO").value;
                NUMEROREFERENCIAINSTRUCTIVO = document.getElementById("NUMEROREFERENCIAINSTRUCTIVO").value;
                EXPORTADORA = document.getElementById("EXPORTADORA").selectedIndex;
                AADUANA = document.getElementById("AADUANA").selectedIndex;
                FPAGO = document.getElementById("FPAGO").selectedIndex;
                TCONTENEDOR = document.getElementById("TCONTENEDOR").selectedIndex;
                OBSERVACIONINSTRUCTIVO = document.getElementById("OBSERVACIONINSTRUCTIVO").value;


                    CONSIGNATARIO = document.getElementById("CONSIGNATARIO").selectedIndex;
                    EMISIONBL = document.getElementById("EMISIONBL").selectedIndex;
                    NOTIFICADOR = document.getElementById("NOTIFICADOR").selectedIndex;
                    BROKER = document.getElementById("BROKER").selectedIndex;
                    RFINAL = document.getElementById("RFINAL").selectedIndex;
                    MERCADO = document.getElementById("MERCADO").selectedIndex;
                    PAIS = document.getElementById("PAIS").selectedIndex;
                    DFINAL = document.getElementById("DFINAL").selectedIndex;

                    FECHAETD = document.getElementById("FECHAETD").value;
                    FECHAETA = document.getElementById("FECHAETA").value;
                    FECHAETAREAL = document.getElementById("FECHAETAREAL").value;
                    AGCARGA = document.getElementById("AGCARGA").selectedIndex;

                    
                    ATMOSFERA = document.getElementById("ATMOSFERA").selectedIndex;
                    TINSTRUCTIVO = document.getElementById("TINSTRUCTIVO").value;
                    O2INSTRUCTIVO = document.getElementById("O2INSTRUCTIVO").value;
                    CO2INSTRUCTIVO = document.getElementById("CO2INSTRUCTIVO").value;
                    ALAMPAINSTRUCTIVO = document.getElementById("ALAMPAINSTRUCTIVO").value;

                    
                    MVENTA = document.getElementById("MVENTA").selectedIndex;
                    CVENTA = document.getElementById("CVENTA").selectedIndex;
                    TFLETE = document.getElementById("TFLETE").selectedIndex;
                    COSTOFLETE = document.getElementById("COSTOFLETE").value;
                    FUMIGADO = document.getElementById("FUMIGADO").selectedIndex;
                    DUSINSTRUCTIVO = document.getElementById("DUSINSTRUCTIVO").value;
                    BOLAWBCRTINSTRUCTIVO = document.getElementById("BOLAWBCRTINSTRUCTIVO").value;
                    NETOINSTRUCTIVO = document.getElementById("NETOINSTRUCTIVO").value;
                    REBATEINSTRUCTIVO = document.getElementById("REBATEINSTRUCTIVO").value;
                    SEGURO = document.getElementById("SEGURO").selectedIndex;



                document.getElementById('val_fecha').innerHTML = "";
                document.getElementById('val_fechacd').innerHTML = "";
                document.getElementById('val_tservicio').innerHTML = "";
                document.getElementById('val_tembarque').innerHTML = "";
                document.getElementById('val_booking').innerHTML = "";
                document.getElementById('val_nreferencia').innerHTML = "";
                document.getElementById('val_aaduana').innerHTML = "";
                document.getElementById('val_fpago').innerHTML = "";
                document.getElementById('val_tcontenedor').innerHTML = "";
                document.getElementById('val_observacion').innerHTML = "";

                    document.getElementById('val_exportadora').innerHTML = "";
                    document.getElementById('val_consignatario').innerHTML = "";
                    document.getElementById('val_emisionbl').innerHTML = "";
                    document.getElementById('val_notificador').innerHTML = "";
                    document.getElementById('val_broker').innerHTML = "";
                    document.getElementById('val_rfinal').innerHTML = "";
                    document.getElementById('val_mercado').innerHTML = "";
                    document.getElementById('val_pais').innerHTML = "";
                    document.getElementById('val_dfinal').innerHTML = "";
                    
                    document.getElementById('val_agcarga').innerHTML = "";
                    document.getElementById('val_fechaetd').innerHTML = "";
                    document.getElementById('val_fechaeta').innerHTML = "";
                    document.getElementById('val_fechaetareal').innerHTML = "";
                    
                    document.getElementById('val_atmosfera').innerHTML = "";
                    document.getElementById('val_t').innerHTML = "";
                    document.getElementById('val_o2').innerHTML = "";
                    document.getElementById('val_co2').innerHTML = "";
                    document.getElementById('val_alampa').innerHTML = "";

                    
                    document.getElementById('val_mventa').innerHTML = "";
                    document.getElementById('val_cventa').innerHTML = "";
                    document.getElementById('val_tflete').innerHTML = "";
                    document.getElementById('val_costoflete').innerHTML = "";
                    document.getElementById('val_fumigado').innerHTML = "";
                    document.getElementById('val_dus').innerHTML = "";
                    document.getElementById('val_bolawbcrt').innerHTML = "";
                    document.getElementById('val_neto').innerHTML = "";
                    document.getElementById('val_rebate').innerHTML = "";
                    document.getElementById('val_seguro').innerHTML = "";

                if (FECHAINSTRUCTIVO == null || FECHAINSTRUCTIVO.length == 0 || /^\s+$/.test(FECHAINSTRUCTIVO)) {
                    document.form_reg_dato.FECHAINSTRUCTIVO.focus();
                    document.form_reg_dato.FECHAINSTRUCTIVO.style.borderColor = "#FF0000";
                    document.getElementById('val_fecha').innerHTML = "NO A INGRESADO DATO";
                    return false;
                }
                document.form_reg_dato.FECHAINSTRUCTIVO.style.borderColor = "#4AF575";


                if (FECHACDOCUMENTALICARGA == null || FECHACDOCUMENTALICARGA.length == 0 || /^\s+$/.test(FECHACDOCUMENTALICARGA)) {
                    document.form_reg_dato.FECHACDOCUMENTALICARGA.focus();
                    document.form_reg_dato.FECHACDOCUMENTALICARGA.style.borderColor = "#FF0000";
                    document.getElementById('val_fechacd').innerHTML = "NO A INGRESADO DATO";
                    return false;
                }
                document.form_reg_dato.FECHACDOCUMENTALICARGA.style.borderColor = "#4AF575";                
                 

                if (TSERVICIO == null || TSERVICIO == 0) {
                    document.form_reg_dato.TSERVICIO.focus();
                    document.form_reg_dato.TSERVICIO.style.borderColor = "#FF0000";
                    document.getElementById('val_tservicio').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                    return false;
                }
                document.form_reg_dato.TSERVICIO.style.borderColor = "#4AF575";

                if (TEMBARQUE == null || TEMBARQUE == 0) {
                    document.form_reg_dato.TEMBARQUE.focus();
                    document.form_reg_dato.TEMBARQUE.style.borderColor = "#FF0000";
                    document.getElementById('val_tembarque').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                    return false;
                }
                document.form_reg_dato.TEMBARQUE.style.borderColor = "#4AF575";

                if (BOOKINGINSTRUCTIVO == null || BOOKINGINSTRUCTIVO.length == 0 || /^\s+$/.test(BOOKINGINSTRUCTIVO)) {
                    document.form_reg_dato.BOOKINGINSTRUCTIVO.focus();
                    document.form_reg_dato.BOOKINGINSTRUCTIVO.style.borderColor = "#FF0000";
                    document.getElementById('val_booking').innerHTML = "NO A INGRESADO DATO";
                    return false;
                }
                document.form_reg_dato.BOOKINGINSTRUCTIVO.style.borderColor = "#4AF575";

                if (NUMEROREFERENCIAINSTRUCTIVO == null || NUMEROREFERENCIAINSTRUCTIVO.length == 0 || /^\s+$/.test(NUMEROREFERENCIAINSTRUCTIVO)) {
                    document.form_reg_dato.NUMEROREFERENCIAINSTRUCTIVO.focus();
                    document.form_reg_dato.BOOKINGINSTRUCTIVO.style.borderColor = "#FF0000";
                    document.getElementById('val_nreferencia').innerHTML = "NO A INGRESADO DATO";
                    return false;
                }
                document.form_reg_dato.NUMEROREFERENCIAINSTRUCTIVO.style.borderColor = "#4AF575";


                    if (EXPORTADORA == null || EXPORTADORA == 0) {
                        document.form_reg_dato.EXPORTADORA.focus();
                        document.form_reg_dato.EXPORTADORA.style.borderColor = "#FF0000";
                        document.getElementById('val_exportadora').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.EXPORTADORA.style.borderColor = "#4AF575";

                    if (CONSIGNATARIO == null || CONSIGNATARIO == 0) {
                        document.form_reg_dato.CONSIGNATARIO.focus();
                        document.form_reg_dato.CONSIGNATARIO.style.borderColor = "#FF0000";
                        document.getElementById('val_consignatario').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.CONSIGNATARIO.style.borderColor = "#4AF575";

                    if (EMISIONBL == null || EMISIONBL == 0) {
                        document.form_reg_dato.EMISIONBL.focus();
                        document.form_reg_dato.EMISIONBL.style.borderColor = "#FF0000";
                        document.getElementById('val_emisionbl').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.EMISIONBL.style.borderColor = "#4AF575";

                    if (NOTIFICADOR == null || NOTIFICADOR == 0) {
                        document.form_reg_dato.NOTIFICADOR.focus();
                        document.form_reg_dato.NOTIFICADOR.style.borderColor = "#FF0000";
                        document.getElementById('val_notificador').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.NOTIFICADOR.style.borderColor = "#4AF575";

                    if (BROKER == null || BROKER == 0) {
                        document.form_reg_dato.BROKER.focus();
                        document.form_reg_dato.BROKER.style.borderColor = "#FF0000";
                        document.getElementById('val_broker').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.BROKER.style.borderColor = "#4AF575";

                    if (RFINAL == null || RFINAL == 0) {
                        document.form_reg_dato.RFINAL.focus();
                        document.form_reg_dato.RFINAL.style.borderColor = "#FF0000";
                        document.getElementById('val_rfinal').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.RFINAL.style.borderColor = "#4AF575";

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

                    if (DFINAL == null || DFINAL == 0) {
                        document.form_reg_dato.DFINAL.focus();
                        document.form_reg_dato.DFINAL.style.borderColor = "#FF0000";
                        document.getElementById('val_dfinal').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.DFINAL.style.borderColor = "#4AF575";
                
                    if (AADUANA == null || AADUANA == 0) {
                        document.form_reg_dato.AADUANA.focus();
                        document.form_reg_dato.AADUANA.style.borderColor = "#FF0000";
                        document.getElementById('val_aaduana').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.AADUANA.style.borderColor = "#4AF575";

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


                    if (FECHAETAREAL == null || FECHAETAREAL.length == 0 || /^\s+$/.test(FECHAETAREAL)) {
                        document.form_reg_dato.FECHAETAREAL.focus();
                        document.form_reg_dato.FECHAETAREAL.style.borderColor = "#FF0000";
                        document.getElementById('val_fechaetareal').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.FECHAETAREAL.style.borderColor = "#4AF575";

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

                
                    if (TCONTENEDOR == null || TCONTENEDOR == 0) {
                        document.form_reg_dato.TCONTENEDOR.focus();
                        document.form_reg_dato.TCONTENEDOR.style.borderColor = "#FF0000";
                        document.getElementById('val_tcontenedor').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.TCONTENEDOR.style.borderColor = "#4AF575";

                    if (ATMOSFERA == null || ATMOSFERA == 0) {
                        document.form_reg_dato.ATMOSFERA.focus();
                        document.form_reg_dato.ATMOSFERA.style.borderColor = "#FF0000";
                        document.getElementById('val_atmosfera').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.ATMOSFERA.style.borderColor = "#4AF575";

                    if (TINSTRUCTIVO == null || /^\s+$/.test(TINSTRUCTIVO)) {
                        document.form_reg_dato.TINSTRUCTIVO.focus();
                        document.form_reg_dato.TINSTRUCTIVO.style.borderColor = "#FF0000";
                        document.getElementById('val_t').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.TINSTRUCTIVO.style.borderColor = "#4AF575";

                    if (O2INSTRUCTIVO == null || /^\s+$/.test(O2INSTRUCTIVO)) {
                        document.form_reg_dato.O2INSTRUCTIVO.focus();
                        document.form_reg_dato.O2INSTRUCTIVO.style.borderColor = "#FF0000";
                        document.getElementById('val_o2').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.O2INSTRUCTIVO.style.borderColor = "#4AF575";

                    if (CO2INSTRUCTIVO == null  || /^\s+$/.test(CO2INSTRUCTIVO)) {
                        document.form_reg_dato.CO2INSTRUCTIVO.focus();
                        document.form_reg_dato.CO2INSTRUCTIVO.style.borderColor = "#FF0000";
                        document.getElementById('val_co2').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.CO2INSTRUCTIVO.style.borderColor = "#4AF575";


                    if (ALAMPAINSTRUCTIVO == null || /^\s+$/.test(ALAMPAINSTRUCTIVO)) {
                        document.form_reg_dato.ALAMPAINSTRUCTIVO.focus();
                        document.form_reg_dato.ALAMPAINSTRUCTIVO.style.borderColor = "#FF0000";
                        document.getElementById('val_alampa').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.ALAMPAINSTRUCTIVO.style.borderColor = "#4AF575";

                
                    if (FPAGO == null || FPAGO == 0) {
                        document.form_reg_dato.FPAGO.focus();
                        document.form_reg_dato.FPAGO.style.borderColor = "#FF0000";
                        document.getElementById('val_fpago').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.FPAGO.style.borderColor = "#4AF575";

                    if (MVENTA == null || MVENTA == 0) {
                        document.form_reg_dato.MVENTA.focus();
                        document.form_reg_dato.MVENTA.style.borderColor = "#FF0000";
                        document.getElementById('val_mventa').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.MVENTA.style.borderColor = "#4AF575";

                    if (CVENTA == null || CVENTA == 0) {
                        document.form_reg_dato.CVENTA.focus();
                        document.form_reg_dato.CVENTA.style.borderColor = "#FF0000";
                        document.getElementById('val_cventa').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.CVENTA.style.borderColor = "#4AF575";

                    if (TFLETE == null || TFLETE == 0) {
                        document.form_reg_dato.TFLETE.focus();
                        document.form_reg_dato.TFLETE.style.borderColor = "#FF0000";
                        document.getElementById('val_tflete').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.TFLETE.style.borderColor = "#4AF575";


                    if (COSTOFLETE == null || COSTOFLETE.length == 0 || /^\s+$/.test(COSTOFLETE)) {
                        document.form_reg_dato.COSTOFLETE.focus();
                        document.form_reg_dato.COSTOFLETE.style.borderColor = "#FF0000";
                        document.getElementById('val_costoflete').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.COSTOFLETE.style.borderColor = "#4AF575";

                    if (FUMIGADO == null || FUMIGADO == 0) {
                        document.form_reg_dato.FUMIGADO.focus();
                        document.form_reg_dato.FUMIGADO.style.borderColor = "#FF0000";
                        document.getElementById('val_fumigado').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.FUMIGADO.style.borderColor = "#4AF575";

                    if (DUSINSTRUCTIVO == null || DUSINSTRUCTIVO.length == 0 || /^\s+$/.test(DUSINSTRUCTIVO)) {
                        document.form_reg_dato.DUSINSTRUCTIVO.focus();
                        document.form_reg_dato.DUSINSTRUCTIVO.style.borderColor = "#FF0000";
                        document.getElementById('val_dus').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DUSINSTRUCTIVO.style.borderColor = "#4AF575";

                    if (BOLAWBCRTINSTRUCTIVO == null || BOLAWBCRTINSTRUCTIVO.length == 0 || /^\s+$/.test(BOLAWBCRTINSTRUCTIVO)) {
                        document.form_reg_dato.BOLAWBCRTINSTRUCTIVO.focus();
                        document.form_reg_dato.BOLAWBCRTINSTRUCTIVO.style.borderColor = "#FF0000";
                        document.getElementById('val_bolawbcrt').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.BOLAWBCRTINSTRUCTIVO.style.borderColor = "#4AF575";

                    if (NETOINSTRUCTIVO == null || NETOINSTRUCTIVO.length == 0 || /^\s+$/.test(NETOINSTRUCTIVO)) {
                        document.form_reg_dato.NETOINSTRUCTIVO.focus();
                        document.form_reg_dato.NETOINSTRUCTIVO.style.borderColor = "#FF0000";
                        document.getElementById('val_neto').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NETOINSTRUCTIVO.style.borderColor = "#4AF575";

                    if (REBATEINSTRUCTIVO == null || REBATEINSTRUCTIVO.length == 0 || /^\s+$/.test(REBATEINSTRUCTIVO)) {
                        document.form_reg_dato.REBATEINSTRUCTIVO.focus();
                        document.form_reg_dato.REBATEINSTRUCTIVO.style.borderColor = "#FF0000";
                        document.getElementById('val_rebate').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.REBATEINSTRUCTIVO.style.borderColor = "#4AF575";


                    if (SEGURO == null || SEGURO == 0) {
                        document.form_reg_dato.SEGURO.focus();
                        document.form_reg_dato.SEGURO.style.borderColor = "#FF0000";
                        document.getElementById('val_seguro').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.SEGURO.style.borderColor = "#4AF575";
                


                /*
                if (OBSERVACIONINSTRUCTIVO == null || OBSERVACIONINSTRUCTIVO.length == 0 || /^\s+$/.test(OBSERVACIONINSTRUCTIVO)) {
                    document.form_reg_dato.OBSERVACIONINSTRUCTIVO.focus();
                    document.form_reg_dato.OBSERVACIONINSTRUCTIVO.style.borderColor = "#FF0000";
                    document.getElementById('val_observacion').innerHTML = "NO A INGRESADO DATO";
                    return false;
                }
                document.form_reg_dato.OBSERVACIONINSTRUCTIVO.style.borderColor = "#4AF575";
                */



            }



            function publica(){
                    var repuesta;                    
                    var totalpublica;

                    NETOINSTRUCTIVO = document.getElementById("NETOINSTRUCTIVO").value;
                    REBATEINSTRUCTIVO = document.getElementById("REBATEINSTRUCTIVO").value;

                    document.getElementById('val_neto').innerHTML = "";
                    document.getElementById('val_rebate').innerHTML = "";



                    if (NETOINSTRUCTIVO == null || NETOINSTRUCTIVO.length == 0 || /^\s+$/.test(NETOINSTRUCTIVO)) {
                        document.form_reg_dato.NETOINSTRUCTIVO.focus();
                        document.form_reg_dato.NETOINSTRUCTIVO.style.borderColor = "#FF0000";
                        document.getElementById('val_neto').innerHTML = "NO A INGRESADO DATO";
                        repuesta = 1;
                    }else{
                        repuesta = 0;
                        document.form_reg_dato.NETOINSTRUCTIVO.style.borderColor = "#4AF575";
                    }

                    if (REBATEINSTRUCTIVO == null || REBATEINSTRUCTIVO.length == 0 || /^\s+$/.test(REBATEINSTRUCTIVO)) {
                        document.form_reg_dato.REBATEINSTRUCTIVO.focus();
                        document.form_reg_dato.REBATEINSTRUCTIVO.style.borderColor = "#FF0000";
                        document.getElementById('val_rebate').innerHTML = "NO A INGRESADO DATO";
                        repuesta = 1;
                    }else{
                        repuesta = 0;
                        document.form_reg_dato.REBATEINSTRUCTIVO.style.borderColor = "#4AF575";
                    }

                    
                    if (repuesta == 0) {                        
                        NETOINSTRUCTIVO =parseInt( document.getElementById("NETOINSTRUCTIVO").value);
                        REBATEINSTRUCTIVO = parseFloat( document.getElementById("REBATEINSTRUCTIVO").value);

                        totalpublica=NETOINSTRUCTIVO+REBATEINSTRUCTIVO;
                        totalpublica = totalpublica.toFixed(0);
                    }
                    document.getElementById('PUBLICAINSTRUCTIVOE').value = totalpublica;
                }

            //REDIRECCIONAR A LA PAGINA SELECIONADA
            function irPagina(url) {
                location.href = "" + url;
            }
        

            //FUNCION PARA REALIZAR UNA ACTUALIZACION DEL FORMULARIO DE REGISTRO DE RECEPCION
            function refrescar() {
                document.getElementById("form_reg_dato").submit();
            }

            //FUNCION PARA ABRIR VENTANA QUE SE ENCUENTRA LA OPERACIONES DE DETALLE DE RECEPCION
            function abrirVentana(url) {
                var opciones =
                    "'directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=1600, height=1000'";
                window.open(url, 'window', opciones);
            }

            function abrirPestana(url) {
                var win = window.open(url, '_blank');
                win.focus();
            }
        </script>
        <script src="../../assest/js/multisteps.js"></script>
</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary" >
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <?php include_once "../../assest/config/menuFruta.php";
            ?>
            <div class="content-wrapper">
                <div class="container-full">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Exportacion </h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"> <a href="index.php"> <i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Exportacion</li>
                                            <li class="breadcrumb-item" aria-current="page">Instructivo Carga</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#">Registro Instructivo Carga </a>
                                            </li>
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
                            <div class="card-header with-border bg-primary">                                   
                                <h4 class="card-title">Registro de Instructivo</h4>                                        
                            </div>
                            <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato">                   
                                <div class="card-body">
                                    <div class=" row ">
                                        <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                            <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTA" name="PLANTA" value="<?php echo $PLANTAS; ?>" />
                                            <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADAS; ?>" />
                                            <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESAE" name="EMPRESAE" value="<?php echo $EMPRESA; ?>" />
                                            <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTAE" name="PLANTAE" value="<?php echo $PLANTA; ?>" />
                                            <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADAE" name="TEMPORADAE" value="<?php echo $TEMPORADA; ?>" />
                                            <input type="hidden" class="form-control" id="TOTALENVASE" name="TOTALENVASE" value="<?php echo $TOTALENVASE; ?>" />
                                            <input type="hidden" class="form-control" id="TOTALKILONETO" name="TOTALKILONETO" value="<?php echo $TOTALNETO; ?>" />
                                            <input type="hidden" class="form-control" id="TOTALKILOBRUTO" name="TOTALKILOBRUTO" value="<?php echo $TOTALBRUTO; ?>" />
                                            <input type="hidden" class="form-control" id="TOTALUS" name="TOTALUS" value="<?php echo $TOTALUS; ?>" />
                                            <input type="hidden" class="form-control" placeholder="ID RECEPCION" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                            <input type="hidden" class="form-control" placeholder="OP RECEPCION" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                            <input type="hidden" class="form-control" placeholder="URL RECEPCION" id="URLP" name="URLP" value="registroICarga" />
                                            <input type="hidden" class="form-control" placeholder="URL DRECEPCION" id="URLD" name="URLD" value="registroDicarga" />
                                            <label for="">Numero Instructivo</label>
                                            <input type="text" class="form-control" style="background-color: #eeeeee;" placeholder="Número Instructivo" id="IDINSTRUCTIVO" name="IDINSTRUCTIVO"
                                                value="<?php echo $NUMEROVER; ?>" disabled />
                                        </div>                                    
                                        <div class="col-xxl-6 col-xl-1 col-lg-1 col-md-6 col-sm-6 col-6 col-xs-6">
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <label>Fecha Ingreso</label>
                                                <input type="hidden" class="form-control" placeholder="Fecha Ingreso " id="FECHAINGRESOE" name="FECHAINGRESOE" value="<?php echo $FECHAINGRESO; ?>" />
                                                <input type="date" class="form-control" style="background-color: #eeeeee;" placeholder="Fecha Ingreso" id="FECHAINGRESO" name="FECHAINGRESO" value="<?php echo $FECHAINGRESO; ?>" disabled />
                                            </div>
                                            <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <label>Fecha Modificación</label>
                                                    <input type="hidden" class="form-control" placeholder="Fecha Modificacion " id="FECHAMODIFCIACIONE" name="FECHAMODIFCIACIONE" value="<?php echo $FECHAMODIFCIACION; ?>" />
                                                    <input type="date" class="form-control " style="background-color: #eeeeee;" placeholder="FECHA MODIFICACION" id="FECHAMODIFCIACION" name="FECHAMODIFCIACION" value="<?php echo $FECHAMODIFCIACION; ?>" disabled />
                                                <label id="val_fecham" class="validacion"> </label>
                                            </div>
                                    </div>
                                    <div class="btn-group btn-block">
                                        <button class="btn btn-success" id="btnHeaderSection1" type="button">Datos Generales</button>
                                        <button class="btn btn-secondary" id="btnHeaderSection2" type="button">Datos Embarque</button>
                                        <button class="btn btn-secondary" id="btnHeaderSection3" type="button">Datos Contenedor y Comercial</button>
                                    </div>
                                    <hr>
                                    <section id="section1">
                                        <div class="row">
                                             <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>Fecha Instructivo</label>
                                                    <input type="hidden" class="form-control" placeholder="Instructivo Carga" id="FECHAINSTRUCTIVOE" name="FECHAINSTRUCTIVOE" value="<?php echo $FECHAINSTRUCTIVO; ?>" />
                                                    <input type="date" class="form-control" placeholder="Fecha Instructivo Carga" id="FECHAINSTRUCTIVO" name="FECHAINSTRUCTIVO" value="<?php echo $FECHAINSTRUCTIVO; ?>" <?php echo $DISABLED; ?> />
                                                    <label id="val_fecha" class="validacion"> </label>
                                                </div>
                                            </div>
                                             <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>Fecha Corte Documental</label>
                                                    <input type="hidden" class="form-control" placeholder="Instructivo Carga" id="FECHACDOCUMENTALICARGAE" name="FECHACDOCUMENTALICARGAE" value="<?php echo $FECHACDOCUMENTALICARGA; ?>" />
                                                    <input type="date" class="form-control" placeholder="Fecha Corte Documental" id="FECHACDOCUMENTALICARGA" name="FECHACDOCUMENTALICARGA" value="<?php echo $FECHACDOCUMENTALICARGA; ?>" <?php echo $DISABLED; ?> />
                                                    <label id="val_fechacd" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Tipo Servicio</label>
                                                    <input type="hidden" class="form-control" placeholder="TSERVICIOE" id="TSERVICIOE" name="TSERVICIOE" value="<?php echo $TSERVICIO; ?>" />
                                                    <select class="form-control select2" id="TSERVICIO" name="TSERVICIO" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYTSERVICIO as $r) : ?>
                                                            <?php if ($ARRAYTSERVICIO) {    ?>
                                                                <option value="<?php echo $r['ID_TSERVICIO']; ?>" <?php if ($TSERVICIO == $r['ID_TSERVICIO']) { echo "selected"; } ?>>
                                                                    <?php echo $r['NOMBRE_TSERVICIO'] ?>
                                                                </option>
                                                            <?php } else { ?>
                                                                <option value="0">No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_tservicio" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Tipo Embarque</label>
                                                    <input type="hidden" class="form-control" placeholder="TEMBARQUEE" id="TEMBARQUEE" name="TEMBARQUEE" value="<?php echo $TEMBARQUE; ?>" />
                                                    <select class="form-control select2" id="TEMBARQUE" name="TEMBARQUE" style="width: 100%;" onchange="this.form.submit()" <?php echo $DISABLED; ?>>
                                                        <option></option>
                                                        <option value="1" <?php if ($TEMBARQUE == "1") { echo "selected"; } ?>>Terrestre </option>
                                                        <option value="2" <?php if ($TEMBARQUE == "2") { echo "selected"; } ?>> Aereo</option>
                                                        <option value="3" <?php if ($TEMBARQUE == "3") { echo "selected"; } ?>> Maritimo</option>
                                                    </select>
                                                    <label id="val_tembarque" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>BKN/AWF/CRT</label>
                                                    <input type="hidden" class="form-control" placeholder="BOOKINGINSTRUCTIVOE" id="BOOKINGINSTRUCTIVOE" name="BOOKINGINSTRUCTIVOE" value="<?php echo $BOOKINGINSTRUCTIVO; ?>" />
                                                    <input type="text" class="form-control" placeholder="BKN/AWF/CRT" id="BOOKINGINSTRUCTIVO" name="BOOKINGINSTRUCTIVO" value="<?php echo $BOOKINGINSTRUCTIVO; ?>" <?php echo $DISABLED; ?> />
                                                    <label id="val_booking" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>Número Referencia</label>
                                                    <input type="hidden" class="form-control" placeholder="NUMEROREFERENCIAINSTRUCTIVOE" id="NUMEROREFERENCIAINSTRUCTIVOE" name="NUMEROREFERENCIAINSTRUCTIVOE" value="<?php echo $NUMEROREFERENCIAINSTRUCTIVO; ?>" />
                                                    <input type="text" class="form-control" placeholder="Numero Referencia Instructivo" id="NUMEROREFERENCIAINSTRUCTIVO" name="NUMEROREFERENCIAINSTRUCTIVO" value="<?php echo $NUMEROREFERENCIAINSTRUCTIVO; ?>" <?php echo $DISABLED; ?> />
                                                    <label id="val_nreferencia" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-5 col-lg-9 col-md-9 col-sm-9 col-9 col-xs-9">
                                                <div class="form-group">
                                                    <label>Exportadora</label>
                                                    <input type="hidden" class="form-control" placeholder="EXPORTADORAE" id="EXPORTADORAE" name="EXPORTADORAE" value="<?php echo $EXPORTADORA; ?>" />
                                                    <select class="form-control select2" id="EXPORTADORA" name="EXPORTADORA" style="width: 100%;" <?php echo $DISABLED; ?>>
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
                                            
                                            <div class="col-xxl-3 col-xl-5 col-lg-9 col-md-9 col-sm-9 col-9 col-xs-9">
                                                <div class="form-group">
                                                    <label>Consignatario</label>
                                                    <input type="hidden" class="form-control" placeholder="CONSIGNATARIO" id="CONSIGNATARIOE" name="CONSIGNATARIOE" value="<?php echo $CONSIGNATARIO; ?>" />
                                                    <select class="form-control select2" id="CONSIGNATARIO" name="CONSIGNATARIO" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYCONSIGNATARIO as $r) : ?>
                                                            <?php if ($ARRAYCONSIGNATARIO) {    ?>
                                                                <option value="<?php echo $r['ID_CONSIGNATARIO']; ?>" <?php if ($CONSIGNATARIO == $r['ID_CONSIGNATARIO']) { echo "selected"; } ?>>
                                                                    <?php echo $r['NOMBRE_CONSIGNATARIO'] ?>
                                                                </option>
                                                            <?php } else { ?>
                                                                <option value="0">No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_consignatario" class="validacion"> </label>
                                                </div>
                                            </div>


                                            <div class="col-xxl-1 col-xl-1 col-lg-3 col-md-3 col-sm-3 col-3 col-xs-3">
                                                <div class="form-group">
                                                    <br>
                                                    <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Consignatario" <?php echo $DISABLED; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopConsignatorio.php' ); ">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                    </button>
                                                </div>
                                            </div>


                                            <div class="col-xxl-2 col-xl-5 col-lg-8 col-md-8 col-sm-8 col-8 col-xs-8">
                                                <div class="form-group">
                                                    <label>Emision BL</label>
                                                    <input type="hidden" class="form-control" placeholder="EMISIONBL" id="EMISIONBLE" name="EMISIONBLE" value="<?php echo $EMISIONBL; ?>" />
                                                    <select class="form-control select2" id="EMISIONBL" name="EMISIONBL" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYEMISIONBL as $r) : ?>
                                                            <?php if ($ARRAYEMISIONBL) {    ?>
                                                                <option value="<?php echo $r['ID_EMISIONBL']; ?>" <?php if ($EMISIONBL == $r['ID_EMISIONBL']) { echo "selected"; } ?>>
                                                                    <?php echo $r['NOMBRE_EMISIONBL'] ?>
                                                                </option>
                                                            <?php } else { ?>
                                                                <option value="0">No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_emisionbl" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-1 col-xl-1 col-lg-3 col-md-3 col-sm-3 col-3 col-xs-3">
                                                <div class="form-group">
                                                    <br>
                                                    <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Emision BL" <?php echo $DISABLED; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopEmisionbl.php' ); ">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                    </button>
                                                </div>
                                            </div>


                                            <div class="col-xxl-3 col-xl-5 col-lg-7 col-md-7 col-sm-7 col-7 col-xs-7">
                                                <div class="form-group">
                                                    <label>Notificador</label>
                                                    <input type="hidden" class="form-control" placeholder="NOTIFICADORE" id="NOTIFICADORE" name="NOTIFICADORE" value="<?php echo $NOTIFICADOR; ?>" />
                                                    <select class="form-control select2" id="NOTIFICADOR" name="NOTIFICADOR" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYNOTIFICADOR as $r) : ?>
                                                            <?php if ($ARRAYNOTIFICADOR) {    ?>
                                                                <option value="<?php echo $r['ID_NOTIFICADOR']; ?>" <?php if ($NOTIFICADOR == $r['ID_NOTIFICADOR']) { echo "selected"; } ?>>
                                                                    <?php echo $r['NOMBRE_NOTIFICADOR'] ?>
                                                                </option>
                                                            <?php } else { ?>
                                                                <option value="0">No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_notificador" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-1 col-xl-1 col-lg-3 col-md-3 col-sm-3 col-3 col-xs-3">
                                                <div class="form-group">
                                                    <br>
                                                    <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Notificador" <?php echo $DISABLED; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopNotificador.php' ); ">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-5 col-lg-9 col-md-9 col-sm-9 col-9 col-xs-9">
                                                <div class="form-group">
                                                    <label>Cliente</label>
                                                    <input type="hidden" class="form-control" placeholder="BROKERE" id="BROKERE" name="BROKERE" value="<?php echo $BROKER; ?>" />
                                                    <select class="form-control select2" id="BROKER" name="BROKER" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYBROKER as $r) : ?>
                                                            <?php if ($ARRAYBROKER) {    ?>
                                                                <option value="<?php echo $r['ID_BROKER']; ?>" <?php if ($BROKER == $r['ID_BROKER']) { echo "selected"; } ?>>
                                                                    <?php echo $r['NOMBRE_BROKER'] ?>
                                                                </option>
                                                            <?php } else { ?>
                                                                <option value="0">No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_broker" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-1 col-xl-1 col-lg-3 col-md-3 col-sm-3 col-3 col-xs-3">
                                                <div class="form-group">
                                                    <br>
                                                    <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Cliente" <?php echo $DISABLED; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopBroker.php' ); ">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-5 col-lg-9 col-md-9 col-sm-9 col-9 col-xs-9">
                                                <div class="form-group">
                                                    <label>Recibidor Final</label>
                                                    <input type="hidden" class="form-control" placeholder="RFINALE" id="RFINALE" name="RFINALE" value="<?php echo $RFINAL; ?>" />
                                                    <select class="form-control select2" id="RFINAL" name="RFINAL" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYRFINAL as $r) : ?>
                                                            <?php if ($ARRAYRFINAL) {    ?>
                                                                <option value="<?php echo $r['ID_RFINAL']; ?>" <?php if ($RFINAL == $r['ID_RFINAL']) { echo "selected"; } ?>>
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
                                                    <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Recibidor Final" <?php echo $DISABLED; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopRfinal.php' ); ">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Pais</label>
                                                    <input type="hidden" class="form-control" placeholder="PAISE" id="PAISE" name="PAISE" value="<?php echo $PAIS; ?>" />
                                                    <select class="form-control select2" id="PAIS" name="PAIS" style="width: 100%;" value="<?php echo $PAIS; ?>" <?php echo $DISABLED; ?>>
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
                                            <div class="col-xxl-3 col-xl-5 col-lg-9 col-md-9 col-sm-9 col-9 col-xs-9">
                                                <div class="form-group">
                                                    <label>Mercado</label>
                                                    <input type="hidden" class="form-control" placeholder="MERCADOE" id="MERCADOE" name="MERCADOE" value="<?php echo $MERCADO; ?>" />
                                                    <select class="form-control select2" id="MERCADO" name="MERCADO" style="width: 100%;" value="<?php echo $MERCADO; ?>" <?php echo $DISABLED; ?>>
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
                                                    <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Mercado" <?php echo $DISABLED; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopMercado.php' ); ">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-5 col-lg-9 col-md-9 col-sm-9 col-9 col-xs-9">
                                                <div class="form-group">
                                                    <label>Destino Final</label>
                                                    <input type="hidden" class="form-control" placeholder="DFINALE" id="DFINALE" name="DFINALE" value="<?php echo $DFINAL; ?>" />
                                                    <select class="form-control select2" id="DFINAL" name="DFINAL" style="width: 100%;" <?php echo $DISABLED; ?>>
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
                                                    <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Destino Final" <?php echo $DISABLED; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopDfinal.php' ); ">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <section id="section2">
                                        <div class="row">
                                            <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>Fecha ETD</label>
                                                    <input type="hidden" class="form-control" placeholder="FECHA ETD" id="FECHAETDE" name="FECHAETDE" value="<?php echo $FECHAETD; ?>" />
                                                    <input type="date" class="form-control" placeholder="Fecha  ETD" id="FECHAETD" name="FECHAETD" value="<?php echo $FECHAETD; ?>" <?php echo $DISABLED; ?> />
                                                    <label id="val_fechaetd" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>Fecha ETA</label>
                                                    <input type="hidden" class="form-control" placeholder="FECHA PROCESO" id="FECHAETAE" name="FECHAETAE" value="<?php echo $FECHAETA; ?>" />
                                                    <input type="date" class="form-control" placeholder="Fecha ETA" id="FECHAETA" name="FECHAETA" value="<?php echo $FECHAETA; ?>" <?php echo $DISABLED; ?> />
                                                    <label id="val_fechaeta" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>Fecha Real ETA</label>
                                                    <input type="hidden" class="form-control" placeholder="FECHA PROCESO" id="FECHAETAREALE" name="FECHAETAREALE" value="<?php echo $FECHAETA; ?>" />
                                                    <input type="date" class="form-control" placeholder="Fecha ETA Real" id="FECHAETAREAL" name="FECHAETAREAL" value="<?php echo $FECHAETA; ?>" <?php echo $DISABLED; ?> />
                                                    <label id="val_fechaetareal" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>N° Contenedor </label>
                                                    <input type="hidden" class="form-control" placeholder="NCONTENEDORE" id="NCONTENEDORE" name="NCONTENEDORE" value="<?php echo $NCONTENEDOR; ?>" />
                                                    <input type="text" class="form-control" placeholder="N° Contenedor" id="NCONTENEDOR" name="NCONTENEDOR" value="<?php echo $NCONTENEDOR; ?>" <?php echo $DISABLED; ?>/>
                                                    <label id=" val_ncontenedor" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-9 col-sm-9 col-9 col-xs-9">
                                                <div class="form-group">
                                                    <label>Agente Aduana</label>
                                                    <input type="hidden" class="form-control" placeholder="AADUANAE" id="AADUANAE" name="AADUANAE" value="<?php echo $AADUANA; ?>" />
                                                    <select class="form-control select2" id="AADUANA" name="AADUANA" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYAADUANA as $r) : ?>
                                                            <?php if ($ARRAYAADUANA) {    ?>
                                                                <option value="<?php echo $r['ID_AADUANA']; ?>" <?php if ($AADUANA == $r['ID_AADUANA']) { echo "selected"; } ?>>
                                                                    <?php echo $r['NOMBRE_AADUANA'] ?>
                                                                </option>
                                                            <?php } else { ?>
                                                                <option value="0">No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_aaduana" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-1 col-xl-1 col-lg-3 col-md-3 col-sm-3 col-3 col-xs-3">
                                                <div class="form-group">
                                                    <br>
                                                    <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Agente Aduana" <?php echo $DISABLED; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopAaduana.php' ); ">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-9 col-sm-9 col-9 col-xs-9">
                                                <div class="form-group">
                                                    <label>Agente Carga</label>
                                                    <input type="hidden" class="form-control" placeholder="AGCARGAE" id="AGCARGAE" name="AGCARGAE" value="<?php echo $AGCARGA; ?>" />
                                                    <select class="form-control select2" id="AGCARGA" name="AGCARGA" style="width: 100%;" <?php echo $DISABLED; ?>>
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
                                                    <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Agente Carga" <?php echo $DISABLED; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopAgcarga.php' ); ">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>FDA </label>
                                                    <input type="hidden" class="form-control" placeholder="FDA" id="FDA" name="FDA" value="<?php echo $FDA; ?>" />
                                                    <input type="text" class="form-control" placeholder="FDA" id="FDAE" name="FDAE" value="<?php echo $FDA; ?>" disabled style='background-color: #eeeeee;' />
                                                    <label id=" val_fda" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <?php if ($TEMBARQUE == "1") { ?>
                                                <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>CRT</label>
                                                        <input type="hidden" class="form-control" placeholder="CRT" id="CRTE" name="CRTE" value="<?php echo $CRT; ?>" />
                                                        <input type="text" class="form-control" placeholder="CRT" id="CRT" name="CRT" value="<?php echo $CRT; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_crt" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-9 col-sm-9 col-9 col-xs-9">
                                                    <div class="form-group">
                                                        <label>Transporte</label>
                                                        <input type="hidden" class="form-control" placeholder="TRANSPORTEE" id="TRANSPORTEE" name="TRANSPORTEE" value="<?php echo $TRANSPORTE; ?>" />
                                                        <select class="form-control select2" id="TRANSPORTE" name="TRANSPORTE" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYTRANSPORTE as $r) : ?>
                                                                <?php if ($ARRAYTRANSPORTE) {    ?>
                                                                    <option value="<?php echo $r['ID_TRANSPORTE']; ?>" <?php if ($TRANSPORTE == $r['ID_TRANSPORTE']) { echo "selected"; } ?>>
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
                                                        <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Transporte" <?php echo $DISABLED; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopTransporte.php' ); ">
                                                            <i class="glyphicon glyphicon-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-9 col-sm-9 col-9 col-xs-9">
                                                    <div class="form-group">
                                                        <label>Lugar Carga</label>
                                                        <input type="hidden" class="form-control" placeholder="LCARGAE" id="LCARGAE" name="LCARGAE" value="<?php echo $LCARGA; ?>" />
                                                        <select class="form-control select2" id="LCARGA" name="LCARGA" style="width: 100%;" <?php echo $DISABLED; ?>>
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
                                                        <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Lugar Carga" <?php echo $DISABLED; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopLcarga.php' ); ">
                                                            <i class="glyphicon glyphicon-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-9 col-sm-9 col-9 col-xs-9">
                                                    <div class="form-group">
                                                        <label>Lugar Destino</label>
                                                        <input type="hidden" class="form-control" placeholder="LDESTINOE" id="LDESTINOE" name="LDESTINOE" value="<?php echo $LDESTINO; ?>" />
                                                        <select class="form-control select2" id="LDESTINO" name="LDESTINO" style="width: 100%;" <?php echo $DISABLED; ?>>
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
                                                        <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Lugar Destino" <?php echo $DISABLED; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopLdestino.php' ); ">
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
                                                        <select class="form-control select2" id="LAEREA" name="LAEREA" style="width: 100%;" <?php echo $DISABLED; ?>>
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
                                                        <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Linea Aerea" <?php echo $DISABLED; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopLaerea.php' ); ">
                                                            <i class="glyphicon glyphicon-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Nave </label>
                                                        <input type="hidden" class="form-control" placeholder="NAVEE" id="NAVEE" name="NAVEE" value="<?php echo $NAVE; ?>" />
                                                        <input type="text" class="form-control" placeholder="NAVE" id="NAVE" name="NAVE" value="<?php echo $NAVE; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nave" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Número Viaje</label>
                                                        <input type="hidden" class="form-control" placeholder="NVIAJEE" id="NVIAJEE" name="NVIAJEE" value="<?php echo $NVIAJE; ?>" />
                                                        <input type="text" class="form-control" placeholder="Número Viaje" id="NVIAJE" name="NVIAJE" value="<?php echo $NVIAJE; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nviaje" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-9 col-sm-9 col-9 col-xs-9">
                                                    <div class="form-group">
                                                        <label>Aeropuerto Carga</label>
                                                        <input type="hidden" class="form-control" placeholder="ACARGAE" id="ACARGAE" name="ACARGAE" value="<?php echo $ACARGA; ?>" />
                                                        <select class="form-control select2" id="ACARGA" name="ACARGA" style="width: 100%;" <?php echo $DISABLED; ?>>
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
                                                        <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Aeropuerto Carga" <?php echo $DISABLED; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopAcarga.php' ); ">
                                                            <i class="glyphicon glyphicon-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-9 col-sm-9 col-9 col-xs-9">
                                                    <div class="form-group">
                                                        <label>Aeropuerto Destino</label>
                                                        <input type="hidden" class="form-control" placeholder="ADESTINOE" id="ADESTINOE" name="ADESTINOE" value="<?php echo $ADESTINO; ?>" />
                                                        <select class="form-control select2" id="ADESTINO" name="ADESTINO" style="width: 100%;" <?php echo $DISABLED; ?>>
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
                                                        <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Aeropuerto Destino" <?php echo $DISABLED; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopAdestino.php' ); ">
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
                                                        <select class="form-control select2" id="NAVIERA" name="NAVIERA" style="width: 100%;" <?php echo $DISABLED; ?>>
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
                                                        <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Naviera" <?php echo $DISABLED; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopNaviera.php' ); ">
                                                            <i class="glyphicon glyphicon-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Nave </label>
                                                        <input type="hidden" class="form-control" placeholder="NAVEE" id="NAVEE" name="NAVEE" value="<?php echo $NAVE; ?>" />
                                                        <input type="text" class="form-control" placeholder="NAVE" id="NAVE" name="NAVE" value="<?php echo $NAVE; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nave" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Fecha Stacking</label>
                                                        <input type="hidden" class="form-control" placeholder="FECHA PROCESO" id="FECHASTACKINGE" name="FECHASTACKINGE" value="<?php echo $FECHASTACKING; ?>" />
                                                        <input type="date" class="form-control" placeholder="Fecha Stacking" id="FECHASTACKING" name="FECHASTACKING" value="<?php echo $FECHASTACKING; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_fechastacking" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Número Viaje</label>
                                                        <input type="hidden" class="form-control" placeholder="NVIAJEE" id="NVIAJEE" name="NVIAJEE" value="<?php echo $NVIAJE; ?>" />
                                                        <input type="text" class="form-control" placeholder="Número Viaje" id="NVIAJE" name="NVIAJE" value="<?php echo $NVIAJE; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nviaje" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-9 col-sm-9 col-9 col-xs-9">
                                                    <div class="form-group">
                                                        <label>Puerto Carga</label>
                                                        <input type="hidden" class="form-control" placeholder="PCARGAE" id="PCARGAE" name="PCARGAE" value="<?php echo $PCARGA; ?>" />
                                                        <select class="form-control select2" id="PCARGA" name="PCARGA" style="width: 100%;" <?php echo $DISABLED; ?>>
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
                                                        <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Puerto Carga" <?php echo $DISABLED; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopPcarga.php' ); ">
                                                            <i class="glyphicon glyphicon-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-9 col-sm-9 col-9 col-xs-9">
                                                    <div class="form-group">
                                                        <label>Puerto Destino</label>
                                                        <input type="hidden" class="form-control" placeholder="PDESTINOE" id="PDESTINOE" name="PDESTINOE" value="<?php echo $PDESTINO; ?>" />
                                                        <select class="form-control select2" id="PDESTINO" name="PDESTINO" style="width: 100%;" <?php echo $DISABLED; ?>>
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
                                                        <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Puerto Destino" <?php echo $DISABLED; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopPdestino.php' ); ">
                                                            <i class="glyphicon glyphicon-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </section>
                                    <section id="section3">
                                        <div class="row">
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-9 col-sm-9 col-9 col-xs-9">
                                                <div class="form-group">
                                                    <label>Tipo Contenedor</label>
                                                    <input type="hidden" class="form-control" placeholder="TCONTENEDORE" id="TCONTENEDORE" name="TCONTENEDORE" value="<?php echo $TCONTENEDOR; ?>" />
                                                    <select class="form-control select2" id="TCONTENEDOR" name="TCONTENEDOR" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYTCONTENEDOR as $r) : ?>
                                                            <?php if ($ARRAYTCONTENEDOR) {    ?>
                                                                <option value="<?php echo $r['ID_TCONTENEDOR']; ?>" <?php if ($TCONTENEDOR == $r['ID_TCONTENEDOR']) { echo "selected"; } ?>>
                                                                    <?php echo $r['NOMBRE_TCONTENEDOR'] ?>
                                                                </option>
                                                            <?php } else { ?>
                                                                <option value="0">No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_tcontenedor" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-1 col-xl-1 col-lg-3 col-md-3 col-sm-3 col-3 col-xs-3">
                                                <div class="form-group">
                                                    <br>
                                                    <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Tipo Contenedor" <?php echo $DISABLED; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopTcontenedor.php' ); ">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-9 col-sm-9 col-9 col-xs-9">
                                                <div class="form-group">
                                                    <label>Atmósfera</label>
                                                    <input type="hidden" class="form-control" placeholder="ATMOSFERAE" id="ATMOSFERAE" name="ATMOSFERAE" value="<?php echo $ATMOSFERA; ?>" />
                                                    <select class="form-control select2" id="ATMOSFERA" name="ATMOSFERA" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYATMOSFERA as $r) : ?>
                                                            <?php if ($ARRAYATMOSFERA) {    ?>
                                                                <option value="<?php echo $r['ID_ATMOSFERA']; ?>" <?php if ($ATMOSFERA == $r['ID_ATMOSFERA']) { echo "selected"; } ?>>
                                                                    <?php echo $r['NOMBRE_ATMOSFERA'] ?>
                                                                </option>
                                                            <?php } else { ?>
                                                                <option value="0">No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_atmosfera" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-1 col-xl-1 col-lg-3 col-md-3 col-sm-3 col-3 col-xs-3">
                                                <div class="form-group">
                                                    <br>
                                                    <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Atmósfera" <?php echo $DISABLED; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopAtmosfera.php' ); ">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>T° </label>
                                                    <input type="hidden" class="form-control" placeholder="TINSTRUCTIVOE" id="TINSTRUCTIVOE" name="TINSTRUCTIVOE" value="<?php echo $TINSTRUCTIVO; ?>" />
                                                    <input type="number" step="0.1" class="form-control" placeholder="Temperatura Instructivo" id="TINSTRUCTIVO" name="TINSTRUCTIVO" value="<?php echo $TINSTRUCTIVO; ?>" <?php echo $DISABLED; ?> />
                                                    <label id="val_t" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>% O2 </label>
                                                    <input type="hidden" class="form-control" placeholder="O2INSTRUCTIVOE" id="O2INSTRUCTIVOE" name="O2INSTRUCTIVOE" value="<?php echo $O2INSTRUCTIVO; ?>" />
                                                    <input type="number" step="0.1" class="form-control" placeholder="% O2 Instructivo" id="O2INSTRUCTIVO" name="O2INSTRUCTIVO" value="<?php echo $O2INSTRUCTIVO; ?>" <?php echo $DISABLED; ?> />
                                                    <label id="val_o2" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>% CO2 </label>
                                                    <input type="hidden" class="form-control" placeholder="CO2INSTRUCTIVOE" id="CO2INSTRUCTIVOE" name="CO2INSTRUCTIVOE" value="<?php echo $CO2INSTRUCTIVO; ?>" />
                                                    <input type="number" step="0.1" class="form-control" placeholder="% CO2 Instructivo" id="CO2INSTRUCTIVO" name="CO2INSTRUCTIVO" value="<?php echo $CO2INSTRUCTIVO; ?>" <?php echo $DISABLED; ?> />
                                                    <label id="val_co2" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label> Apertura Lampa (CBM)</label>
                                                    <input type="hidden" class="form-control" placeholder="ALAMPAINSTRUCTIVOE" id="ALAMPAINSTRUCTIVOE" name="ALAMPAINSTRUCTIVOE" value="<?php echo $ALAMPAINSTRUCTIVO; ?>" />
                                                    <input type="number" step="0.1" class="form-control" placeholder="Apertura Lampa Instructivo" id="ALAMPAINSTRUCTIVO" name="ALAMPAINSTRUCTIVO" value="<?php echo $ALAMPAINSTRUCTIVO; ?>" <?php echo $DISABLED; ?> />
                                                    <label id="val_alampa" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-9 col-sm-9 col-9 col-xs-9">
                                                <div class="form-group">
                                                    <label>Forma Pago</label>
                                                    <input type="hidden" class="form-control" placeholder="FPAGOE" id="FPAGOE" name="FPAGOE" value="<?php echo $FPAGO; ?>" />
                                                    <select class="form-control select2" id="FPAGO" name="FPAGO" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYFPAGO as $r) : ?>
                                                            <?php if ($ARRAYFPAGO) {    ?>
                                                                <option value="<?php echo $r['ID_FPAGO']; ?>" <?php if ($FPAGO == $r['ID_FPAGO']) { echo "selected"; } ?>>
                                                                    <?php echo $r['NOMBRE_FPAGO'] ?>
                                                                </option>
                                                            <?php } else { ?>
                                                                <option value="0">No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_fpago" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-1 col-xl-1 col-lg-3 col-md-3 col-sm-3 col-3 col-xs-3">
                                                <div class="form-group">
                                                    <br>
                                                    <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Forma Pago" <?php echo $DISABLED; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopFpago.php' ); ">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-9 col-sm-9 col-9 col-xs-9">
                                                <div class="form-group">
                                                    <label>Modalidad Venta</label>
                                                    <input type="hidden" class="form-control" placeholder="MVENTAE" id="MVENTAE" name="MVENTAE" value="<?php echo $MVENTA; ?>" />
                                                    <select class="form-control select2" id="MVENTA" name="MVENTA" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYMVENTA as $r) : ?>
                                                            <?php if ($ARRAYMVENTA) {    ?>
                                                                <option value="<?php echo $r['ID_MVENTA']; ?>" <?php if ($MVENTA == $r['ID_MVENTA']) { echo "selected"; } ?>>
                                                                    <?php echo $r['NOMBRE_MVENTA'] ?>
                                                                </option>
                                                            <?php } else { ?>
                                                                <option value="0">No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_mventa" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-1 col-xl-1 col-lg-3 col-md-3 col-sm-3 col-3 col-xs-3">
                                                <div class="form-group">
                                                    <br>
                                                    <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Modalidad Venta" <?php echo $DISABLED; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopMventa.php' ); ">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-9 col-sm-9 col-9 col-xs-9">
                                                <div class="form-group">
                                                    <label>Cláusula Venta</label>
                                                    <input type="hidden" class="form-control" placeholder="CVENTAE" id="CVENTAE" name="CVENTAE" value="<?php echo $CVENTA; ?>" />
                                                    <select class="form-control select2" id="CVENTA" name="CVENTA" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYCVENTA as $r) : ?>
                                                            <?php if ($ARRAYCVENTA) {    ?>
                                                                <option value="<?php echo $r['ID_CVENTA']; ?>" <?php if ($CVENTA == $r['ID_CVENTA']) { echo "selected"; } ?>>
                                                                    <?php echo $r['NOMBRE_CVENTA'] ?>
                                                                </option>
                                                            <?php } else { ?>
                                                                <option value="0">No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_cventa" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-1 col-xl-1 col-lg-3 col-md-3 col-sm-3 col-3 col-xs-3">
                                                <div class="form-group">
                                                    <br>
                                                    <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Cláusula Venta" <?php echo $DISABLED; ?>  id="defecto" name="pop" Onclick="abrirVentana('registroPopCventa.php' ); ">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-9 col-sm-9 col-9 col-xs-9">
                                                <div class="form-group">
                                                    <label>Tipo Flete</label>
                                                    <input type="hidden" class="form-control" placeholder="TFLETEE" id="TFLETEE" name="TFLETEE" value="<?php echo $TFLETE; ?>" />
                                                    <select class="form-control select2" id="TFLETE" name="TFLETE" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYTFLETE as $r) : ?>
                                                            <?php if ($ARRAYTFLETE) {    ?>
                                                                <option value="<?php echo $r['ID_TFLETE']; ?>" <?php if ($TFLETE == $r['ID_TFLETE']) { echo "selected"; } ?>>
                                                                    <?php echo $r['NOMBRE_TFLETE'] ?>
                                                                </option>
                                                            <?php } else { ?>
                                                                <option value="0">No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_tflete" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-1 col-xl-1 col-lg-3 col-md-3 col-sm-3 col-3 col-xs-3">
                                                <div class="form-group">
                                                    <br>
                                                    <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Cláusula Venta" <?php echo $DISABLED; ?>  id="defecto" name="pop" Onclick="abrirVentana('registroPopTflete.php' ); ">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Fumigado </label>
                                                    <input type="hidden" class="form-control" placeholder="FUMIGADOE" id="FUMIGADOE" name="FUMIGADOE" value="<?php echo $FUMIGADO; ?>" />
                                                    <select class="form-control select2" id="FUMIGADO" name="FUMIGADO" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                        <option></option>
                                                        <option value="1" <?php if ($FUMIGADO == "1") { echo "selected"; } ?>>Si </option>
                                                        <option value="2" <?php if ($FUMIGADO == "2") { echo "selected"; } ?>> No</option>
                                                    </select>
                                                    <label id="val_fumigado" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>Costo Flete </label>
                                                    <input type="hidden" class="form-control" placeholder="COSTOFLETEE" id="COSTOFLETEE" name="COSTOFLETEE" value="<?php echo $COSTOFLETE; ?>" />
                                                    <input type="number" step="0.1" class="form-control" placeholder="Costo Flete" id="COSTOFLETE" name="COSTOFLETE" value="<?php echo $COSTOFLETE; ?>" <?php echo $DISABLED; ?> />
                                                    <label id="val_costoflete" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>DUS </label>
                                                    <input type="hidden" class="form-control" placeholder="DUSINSTRUCTIVOE" id="DUSINSTRUCTIVOE" name="DUSINSTRUCTIVOE" value="<?php echo $DUSINSTRUCTIVO; ?>" />
                                                    <input type="text" class="form-control" placeholder="Dus Instructivo" id="DUSINSTRUCTIVO" name="DUSINSTRUCTIVO" value="<?php echo $DUSINSTRUCTIVO; ?>" <?php echo $DISABLED; ?> />
                                                    <label id="val_dus" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>BL/AWB </label>
                                                    <input type="hidden" class="form-control" placeholder="BOLAWBCRTINSTRUCTIVOE" id="BOLAWBCRTINSTRUCTIVOE" name="BOLAWBCRTINSTRUCTIVOE" value="<?php echo $BOLAWBCRTINSTRUCTIVO; ?>" />
                                                    <input type="text" class="form-control" placeholder="BL/AWB Instructivo" id="BOLAWBCRTINSTRUCTIVO" name="BOLAWBCRTINSTRUCTIVO" value="<?php echo $BOLAWBCRTINSTRUCTIVO; ?>" <?php echo $DISABLED; ?> />
                                                    <label id="val_bolawbcrt" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>Tarifa Flete(Neto) </label>
                                                    <input type="hidden" class="form-control" placeholder="NETOINSTRUCTIVOE" id="NETOINSTRUCTIVOE" name="NETOINSTRUCTIVOE" value="<?php echo $NETOINSTRUCTIVO; ?>" />
                                                    <input type="number" step="0.1" class="form-control" placeholder="Tarifa Flete(Neto) Instructivo" id="NETOINSTRUCTIVO" name="NETOINSTRUCTIVO" onchange="publica()" value="<?php echo $NETOINSTRUCTIVO; ?>" <?php echo $DISABLED; ?> />
                                                    <label id="val_neto" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>Rebate </label>
                                                    <input type="hidden" class="form-control" placeholder="REBATEINSTRUCTIVOE" id="REBATEINSTRUCTIVOE" name="REBATEINSTRUCTIVOE" value="<?php echo $REBATEINSTRUCTIVO; ?>" />
                                                    <input type="number" step="0.1" class="form-control" placeholder="Rebate Instructivo " id="REBATEINSTRUCTIVO" name="REBATEINSTRUCTIVO" onchange="publica()" value="<?php echo $REBATEINSTRUCTIVO; ?>" <?php echo $DISABLED; ?> />
                                                    <label id="val_rebate" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>Publica </label>
                                                    <input type="hidden" class="form-control" placeholder="PUBLICAINSTRUCTIVO" id="PUBLICAINSTRUCTIVO" name="PUBLICAINSTRUCTIVO" value="<?php echo $PUBLICAINSTRUCTIVO; ?>" />
                                                    <input type="number" step="0.1"  class="form-control" placeholder="$USD Flete Instructivo" id="PUBLICAINSTRUCTIVOE" name="PUBLICAINSTRUCTIVOE" value="<?php echo $PUBLICAINSTRUCTIVO; ?>" <?php echo $DISABLED; ?> disabled />
                                                    <label id="val_publica" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Seguro Carga </label>
                                                    <input type="hidden" class="form-control" placeholder="SEGUROE" id="SEGUROE" name="SEGUROE" value="<?php echo $SEGURO; ?>" />
                                                    <select class="form-control select2" id="SEGURO" name="SEGURO" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYSEGURO as $r) : ?>
                                                            <?php if ($ARRAYSEGURO) {    ?>
                                                                <option value="<?php echo $r['ID_SEGURO']; ?>" <?php if ($SEGURO == $r['ID_SEGURO']) { echo "selected"; } ?>>
                                                                    <?php echo $r['NOMBRE_SEGURO'] ?>
                                                                </option>
                                                            <?php } else { ?>
                                                                <option value="0">No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_seguro" class="validacion"> </label>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <div class="row">
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" placeholder="OBSERVACION PROCESO" id="OBSERVACIONINSTRUCTIVOE" name="OBSERVACIONINSTRUCTIVOE" value="<?php echo $OBSERVACIONINSTRUCTIVO; ?>" />
                                                <label>Observaciones </label>
                                                <textarea class="form-control" rows="1" placeholder="Ingrese Nota e Observacion  " id="OBSERVACIONINSTRUCTIVO" name="OBSERVACIONINSTRUCTIVO" <?php echo $DISABLED; ?>><?php echo $OBSERVACIONINSTRUCTIVO; ?></textarea>
                                                <label id="val_observacion" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" placeholder="OBSERVACION PROCESO" id="OBSERVACIONIINSTRUCTIVOE" name="OBSERVACIONIINSTRUCTIVOE" value="<?php echo $OBSERVACIONIINSTRUCTIVO; ?>" />
                                                <label>Observaciones Invoice </label>
                                                <textarea class="form-control" rows="1" placeholder="Ingrese Nota e Observacion  " id="OBSERVACIONIINSTRUCTIVO" name="OBSERVACIONIINSTRUCTIVO" <?php echo $DISABLED; ?>><?php echo $OBSERVACIONIINSTRUCTIVO; ?></textarea>
                                                <label id="val_observacioni" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-group  col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12 col-xs-12 float-right" id="botonesSteps" role="group">
                                        <button type="button" class="btn btn-primary" id="btnPaso1"><strong>Paso 1</strong></button>
                                        <button type="button" class="btn btn-info" id="btnPaso2"><strong>Paso 2</strong></button>
                                        <button type="button" class="btn btn-info" id="btnPaso3"><strong>Paso 3</strong></button>
                                    </div>
                                    <br>
                                </div>                                                     
                                <div class="card-footer">
                                    <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="toolbar">
                                        <div class="btn-group  col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 col-xs-12" role="group" aria-label="Acciones generales">
                                            <?php if ($OP == "") { ?>
                                                <button type="button" class="btn btn-warning btn-md" data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroICarga.php');">
                                                    <i class="ti-trash"></i> Cancelar
                                                </button>
                                                <button type="submit" class="btn btn-primary btn-md" data-toggle="tooltip" title="Guardar" name="CREAR" value="CREAR"   onclick="return validacion()">
                                                    <i class="ti-save-alt"></i> Guardar
                                                </button>
                                            <?php } ?>
                                            <?php if ($OP != "") { ?>
                                                <button type="button" class="btn  btn-success btn-md" data-toggle="tooltip" title="Volver" name="VOLVER" value="VOLVER" Onclick="irPagina('listarICarga.php'); ">
                                                    <i class="ti-back-left "></i> Volver
                                                </button>
                                                <button type="submit" class="btn btn-warning btn-md" data-toggle="tooltip" title="Guardar" name="GUARDAR" value="GUARDAR"  <?php echo $DISABLED2; ?> onclick="return validacion()">
                                                    <i class="ti-pencil-alt"></i> Guardar
                                                </button>
                                                <button type="submit" class="btn btn-danger btn-md" data-toggle="tooltip" title="Cerrar" name="CERRAR" value="CERRAR"  <?php echo $DISABLED2; ?> onclick="return validacionCerrar()">
                                                    <i class="ti-save-alt"></i> Cerrar
                                                </button>
                                            <?php } ?>
                                        </div>
                                        <div class="btn-group   col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12 float-right" role="group" aria-label="Informes y Reportes">
                                            <?php if ($OP != ""): ?>
                                                <div class="row">
                                                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12 ">
                                                        <button type="button" class="btn btn-primary  btn-sm" data-toggle="tooltip" title="Instructivo Español" id="defecto" name="tarjas" Onclick="abrirPestana('../../assest/documento/informeIcargaEspanol.php?parametro=<?php echo $IDOP; ?>&&usuario=<?php echo $IDUSUARIOS; ?>');">
                                                            <i class="fa fa-file-pdf-o"></i><br> Instructivo Español
                                                        </button>
                                                        <button type="button" class="btn btn-primary  btn-sm" data-toggle="tooltip" title=" Instruction English" id="defecto" name="tarjas" Onclick="abrirPestana('../../assest/documento/informeIcargaEnglish.php?parametro=<?php echo $IDOP; ?>&&usuario=<?php echo $IDUSUARIOS; ?>');">
                                                            <i class="fa fa-file-pdf-o"></i><br>  Instruction English
                                                        </button>
                                                        <button type="button" class="btn btn-info  btn-sm" data-toggle="tooltip" title="Report Invoice" id="defecto" name="tarjas" Onclick="abrirPestana('../../assest/documento/informeIcargaInvoice.php?parametro=<?php echo $IDOP; ?>&&usuario=<?php echo $IDUSUARIOS; ?>');">
                                                            <i class="fa fa-file-pdf-o"></i><br> Invoice
                                                        </button>
                                                        <button type="button" class="btn btn-info  btn-sm" data-toggle="tooltip" title="Report Invoice v2" id="defecto" name="tarjas" Onclick="abrirPestana('../../assest/documento/informeIcargaInvoicev2.php?parametro=<?php echo $IDOP; ?>&&usuario=<?php echo $IDUSUARIOS; ?>');">
                                                            <i class="fa fa-file-pdf-o"></i><br> Invoice 2
                                                        </button>
                                                        <button type="button" class="btn btn-info  btn-sm" data-toggle="tooltip" title="Informe Carga Real" id="defecto" name="tarjas" Onclick="abrirPestana('../../assest/documento/informeICargaReal.php?parametro=<?php echo $IDOP; ?>&&usuario=<?php echo $IDUSUARIOS; ?>');">
                                                        <i class="fa fa-file-pdf-o"></i><br> Carga Real
                                                        </button>
                                                        <button type="button" class="btn  btn-success btn-sm" id="defecto" name="tarjas" title="Reporte Carga Real" Onclick="abrirPestana('../../assest/reporte/reporteCargaRealcarga.php?parametro=<?php echo $IDOP; ?>&&usuario=<?php echo $IDUSUARIOS; ?>'); ">
                                                            <i class="fa fa-file-excel-o"></i><br> Carga Real
                                                        </button>
                                                        <button type="button" class="btn  btn-success btn-sm" id="defecto" name="tarjas" title="Reporte Packing List" Onclick="abrirPestana('../../assest/reporte/reporteICargaPackingList.php?parametro=<?php echo $IDOP; ?>&&usuario=<?php echo $IDUSUARIOS; ?>'); ">
                                                            <i class="fa fa-file-excel-o"></i><br> Packing  List
                                                        </button>
                                                    </div>                                                    
                                                </div>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php if (isset($_GET['op'])): ?>
                            <div class="card">
                                <div class="card-header bg-success">
                                    <h4 class="text-white">Detalle Instructivo</h4>
                                </div>                                
                                <div class="card-header">
                                    <div class="form-row align-items-center">
                                        <form method="post" id="form1">
                                            <input type="hidden" class="form-control" placeholder="ID DESPACHO" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                            <input type="hidden" class="form-control" placeholder="OP DESPACHO" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                            <input type="hidden" class="form-control" placeholder="URL DESPACHO" id="URLP" name="URLP" value="registroICarga" />
                                            <input type="hidden" class="form-control" placeholder="URL SELECCIONAR" id="URLD" name="URLD" value="registroDicarga" />
                                            <div class="col-auto">
                                                <button type="submit" class="btn btn-success btn-block mb-2" data-toggle="tooltip" title="Agregar Detalle Instructivo" id="CREARDURL" name="CREARDURL"
                                                    <?php echo $DISABLED2; ?>  <?php   if ($ESTADO == 0) {   echo "disabled style='background-color: #eeeeee;'"; } ?>  > 
                                                    Agregar Detalle
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
                                        <div class="col-auto">
                                            <label class="sr-only" for=""></label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Total US $</div>
                                                </div>
                                                <input type="hidden" class="form-control" id="TOTALUS" name="TOTALUS" value="<?php echo $TOTALUS; ?>" />
                                                <input type="text" class="form-control" placeholder="Total US $" id="TOTALUSV" name="TOTALUSV" value="<?php echo $TOTALUSV; ?>" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="ingreso" class="table-hover " style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Operaciónes</th>
                                                <th>Codigo Estandar </th>
                                                <th>Envase/Estandar </th>
                                                <th>Peso Neto </th>
                                                <th>Peso Bruto </th>
                                                <th>Cantidad Envase </th>
                                                <th>Kilo Neto </th>
                                                <th>Kilo Bruto </th>
                                                <th>Calibre </th>
                                                <th>Tipo Moneda </th>
                                                <th>Tipo Manejo </th>
                                                <th>Variedad </th>
                                                <th>Precio </th>
                                                <th>Total </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($ARRAYDCARGA) { ?>
                                                <?php foreach ($ARRAYDCARGA as $s) : ?>

                                                    <?php
                                                    $ARRAYEEXPORTACION = $EEXPORTACION_ADO->verEstandar($s['ID_ESTANDAR']);
                                                    if ($ARRAYEEXPORTACION) {
                                                        $CODIGOESTANDAR = $ARRAYEEXPORTACION[0]['CODIGO_ESTANDAR'];
                                                        $NOMBREESTANTAR = $ARRAYEEXPORTACION[0]['NOMBRE_ESTANDAR'];
                                                        $NETOESTANTAR = $ARRAYEEXPORTACION[0]['PESO_NETO_ESTANDAR'];
                                                        $BRUTOESTANTAR = $ARRAYEEXPORTACION[0]['PESO_BRUTO_ESTANDAR'];
                                                    } else {
                                                        $CODIGOESTANDAR = "Sin Datos";
                                                        $NOMBREESTANTAR = "Sin Datos";
                                                        $NETOESTANTAR = "Sin Datos";
                                                        $BRUTOESTANTAR = "Sin Datos";
                                                    }
                                                    $ARRAYCALIBRE = $TCALIBRE_ADO->verCalibre($s['ID_TCALIBRE']);
                                                    if ($ARRAYCALIBRE) {
                                                        $NOMBRECALIBRE = $ARRAYCALIBRE[0]['NOMBRE_TCALIBRE'];
                                                    } else {
                                                        $NOMBRECALIBRE = "Sin Datos";
                                                    }
                                                    $ARRAYTMONEDA = $TMONEDA_ADO->verTmoneda($s['ID_TMONEDA']);
                                                    if ($ARRAYTMONEDA) {
                                                        $NOMBRETMONEDA = $ARRAYTMONEDA[0]['NOMBRE_TMONEDA'];
                                                    } else {
                                                        $NOMBRETMONEDA = "Sin Datos";
                                                    }
                                                    $ARRAYTMANEJO = $TMANEJO_ADO->verTmanejo($s['ID_TMANEJO']);
                                                    if ($ARRAYTMANEJO) {
                                                        $NOMBRETMANEJO = $ARRAYTMANEJO[0]['NOMBRE_TMANEJO'];
                                                    } else {
                                                        $NOMBRETMANEJO = "Sin Datos";
                                                    }
                                                    $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($s['ID_VESPECIES']);
                                                    if ($ARRAYVERVESPECIESID) {
                                                        $NOMBREVARIEDAD = $ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'];
                                                    } else {
                                                        $NOMBREVARIEDAD = "Sin Datos";
                                                    }
                                                    ?>

                                                    <tr class="center">
                                                        <td>
                                                            <form method="post" id="form1">
                                                                <input type="hidden" class="form-control" placeholder="ID DRECEPCIONE" id="IDD" name="IDD" value="<?php echo $s['ID_DICARGA']; ?>" />
                                                                <input type="hidden" class="form-control" placeholder="ID RECEPCIONE" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                                                <input type="hidden" class="form-control" placeholder="OP RECEPCIONE" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                                                <input type="hidden" class="form-control" placeholder="URL RECEPCIONE" id="URLP" name="URLP" value="registroICarga" />
                                                                <input type="hidden" class="form-control" placeholder="URL DRECEPCIONE" id="URLD" name="URLD" value="registroDicarga" />                                                                
                                                                <div class="btn-group btn-rounded  btn-block" role="group" aria-label="Operaciones Detalle">
                                                                        <?php if ($ESTADO == "0") { ?>
                                                                            <button type="submit" class="btn btn-info  btn-sm   " id="VERDURL" name="VERDURL" data-toggle="tooltip" title="Ver Detalle Instructivo">
                                                                                <i class="ti-eye"></i><br> Ver
                                                                            </button>
                                                                        <?php } ?>
                                                                        <?php if ($ESTADO == "1") { ?>
                                                                            <button type="submit" class="btn btn-warning btn-sm " id="EDITARDURL" name="EDITARDURL" data-toggle="tooltip" title="Editar Detalle Instructivo"   <?php echo $DISABLED2; ?>>
                                                                                <i class="ti-pencil-alt"></i><br> Editar
                                                                            </button>
                                                                            <button type="submit" class="btn btn-secondary btn-sm " id="DUPLICARDURL" name="DUPLICARDURL" data-toggle="tooltip" title="Duplicar Detalle Instructivo"   <?php echo $DISABLED2; ?>>
                                                                                <i class="fa fa-fw fa-copy"></i><br> Duplicar
                                                                            </button>
                                                                            <button type="submit" class="btn btn-danger btn-sm" id="ELIMINARDURL" name="ELIMINARDURL" data-toggle="tooltip" title="Eliminar Detalle Instructivo" < <?php echo $DISABLED2; ?>>
                                                                                <i class="ti-close"></i><br> Eliminar
                                                                            </button>
                                                                        <?php } ?>
                                                                    </div>
                                                            </form>
                                                        </td>
                                                        <td><?php echo $CODIGOESTANDAR; ?></td>
                                                        <td><?php echo $NOMBREESTANTAR ?></td>
                                                        <td><?php echo number_format($NETOESTANTAR, 2, ",", ".") ?></td>
                                                        <td><?php echo number_format($BRUTOESTANTAR, 2, ",", ".") ?></td>
                                                        <td><?php echo $s['ENVASE']; ?></td>
                                                        <td><?php echo $s['NETO']; ?></td>
                                                        <td><?php echo $s['BRUTO']; ?></td>
                                                        <td><?php echo $NOMBRECALIBRE; ?></td>
                                                        <td><?php echo $NOMBRETMONEDA; ?></td>
                                                        <td><?php echo $NOMBRETMANEJO; ?></td>
                                                        <td><?php echo $NOMBREVARIEDAD; ?></td>
                                                        <td><?php echo $s['US']; ?></td>
                                                        <td><?php echo $s['TOTALUS']; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header bg-info">
                                    <h4 class="card-title">Carga Real</h4>
                                </div>
                                                             
                                <div class="card-header">
                                    <div class="form-row align-items-center">
                                        <div class="col-auto">
                                            <label class="sr-only" for=""></label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Total Envase</div>
                                                </div>
                                                <input type="hidden" class="form-control" id="TOTALENVASECONSOLIADO" name="TOTALENVASECONSOLIADO" value="<?php echo $TOTALENVASECONSOLIADO; ?>" />
                                                <input type="text" class="form-control" placeholder="Total Envase" id="TOTALENVASECONSOLIADO" name="TOTALENVASECONSOLIADO" value="<?php echo $TOTALENVASECONSOLIADO; ?>" disabled />
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <label class="sr-only" for=""></label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Total Neto</div>
                                                </div>
                                                <input type="hidden" class="form-control" id="TOTALNETOCONSOLIADO" name="TOTALNETOCONSOLIADO" value="<?php echo $TOTALNETOCONSOLIADO; ?>" />
                                                <input type="text" class="form-control" placeholder="Total Neto" id="TOTALNETOCONSOLIADOV" name="TOTALNETOCONSOLIADOV" value="<?php echo $TOTALNETOCONSOLIADO; ?>" disabled />
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <label class="sr-only" for=""></label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Total Bruto</div>
                                                </div>
                                                <input type="hidden" class="form-control" id="TOTALBRUTOCONSOLIADO" name="TOTALBRUTOCONSOLIADO" value="<?php echo $TOTALBRUTOCONSOLIADO; ?>" />
                                                <input type="text" class="form-control" placeholder="Total Neto" id="TOTALBRUTOCONSOLIADOV" name="TOTALBRUTOCONSOLIADOV" value="<?php echo $TOTALBRUTOCONSOLIADO; ?>" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="salida" class="table-hover " style="width: 100%;">
                                        <thead>
                                            <tr class="text-center">
                                                <th>Codigo Estandar </th>
                                                <th>Envase/Estandar </th>
                                                <th>Codigo Estandar </th>
                                                <th>Estandar Comercial </th>
                                                <th>Peso Neto </th>
                                                <th>Peso Bruto </th>
                                                <th>Cantidad Envases </th>
                                                <th>Kilos Neto </th>
                                                <th>Kilos Bruto </th>
                                                <th>Fecha Embalado </th>
                                                <th>CSG Productor </th>
                                                <th>Nombre Productor </th>
                                                <th>Variedad </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($ARRAYCONSOLIDADODESPACHO) { ?>
                                                <?php foreach ($ARRAYCONSOLIDADODESPACHO as $s) : ?>

                                                    <?php
                                                    $ARRAYPRODUCTOR = $PRODUCTOR_ADO->verProductor($s['ID_PRODUCTOR']);
                                                    if ($ARRAYPRODUCTOR) {
                                                        $CSGPRODUCTOR = $ARRAYPRODUCTOR[0]['CSG_PRODUCTOR'];
                                                        $NOMBREPRODUCTOR = $ARRAYPRODUCTOR[0]['NOMBRE_PRODUCTOR'];
                                                    } else {
                                                        $CSGPRODUCTOR = "Sin Datos";
                                                        $NOMBREPRODUCTOR = "Sin Datos";
                                                    }
                                                    $ARRAYEEXPORTACION = $EEXPORTACION_ADO->verEstandar($s['ID_ESTANDAR']);
                                                    if ($ARRAYEEXPORTACION) {
                                                        $CODIGOESTANDAR = $ARRAYEEXPORTACION[0]['CODIGO_ESTANDAR'];
                                                        $NOMBREESTANTAR = $ARRAYEEXPORTACION[0]['NOMBRE_ESTANDAR'];
                                                        $NETOESTANTAR = $ARRAYEEXPORTACION[0]['PESO_NETO_ESTANDAR'];
                                                        $BRUTOESTANTAR = $ARRAYEEXPORTACION[0]['PESO_BRUTO_ESTANDAR'];
                                                        $ARRAYECOMERCIAL=$ECOMERCIAL_ADO->verEcomercial($ARRAYEEXPORTACION[0]["ID_ECOMERCIAL"]);
                                                        if($ARRAYECOMERCIAL){
                                                            $CODIGOECOMERCIAL = $ARRAYECOMERCIAL[0]['CODIGO_ECOMERCIAL'];
                                                            $NOMBREECOMERCIAL = $ARRAYECOMERCIAL[0]['NOMBRE_ECOMERCIAL'];
                                                        }else{
                                                            $CODIGOECOMERCIAL = "Sin Datos";
                                                            $NOMBREECOMERCIAL = "Sin Datos";
                                                        }
                                                    } else {
                                                        $CODIGOECOMERCIAL = "Sin Datos";
                                                        $NOMBREECOMERCIAL = "Sin Datos";
                                                        $NOMBREESTANTAR = "Sin Datos";
                                                        $CODIGOESTANDAR = "Sin Datos";
                                                        $NETOESTANTAR = "Sin Datos";
                                                        $BRUTOESTANTAR = "Sin Datos";
                                                    }
                                                    $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($s['ID_VESPECIES']);
                                                    if ($ARRAYVERVESPECIESID) {
                                                        $NOMBREVARIEDAD = $ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'];
                                                    } else {
                                                        $NOMBREVARIEDAD = "Sin Datos";
                                                    }

                                                    ?>
                                                    <tr class="text-center">
                                                        <td><?php echo $CODIGOESTANDAR; ?></td>
                                                        <td><?php echo $NOMBREESTANTAR; ?></td>
                                                        <td><?php echo $CODIGOECOMERCIAL; ?></td>
                                                        <td><?php echo $NOMBREECOMERCIAL; ?></td>
                                                        <td><?php echo number_format($NETOESTANTAR, 3, ",", ".") ?></td>
                                                        <td><?php echo number_format($BRUTOESTANTAR, 3, ",", ".") ?></td>
                                                        <td><?php echo $s['ENVASE']; ?></td>
                                                        <td><?php echo $s['NETO']; ?></td>
                                                        <td><?php echo $s['BRUTO']; ?></td>
                                                        <td><?php echo $s['EMBALADO']; ?></td>
                                                        <td> <?php echo $CSGPRODUCTOR  ?> </td>
                                                        <td> <?php echo $NOMBREPRODUCTOR  ?> </td>
                                                        <td> <?php echo $NOMBREVARIEDAD  ?> </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php endif ?>
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
            //OPERACIONES
            //OPERACION DE REGISTRO DE FILA
            if (isset($_REQUEST['CREAR'])) {

                $ARRAYNUMERO = $ICARGA_ADO->obtenerNumero($_REQUEST['EMPRESA'],  $_REQUEST['TEMPORADA']);
                $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;

                $PUBLICAINSTRUCTIVO = $_REQUEST['NETOINSTRUCTIVO'] + $_REQUEST['REBATEINSTRUCTIVO'];
                $ICARGA->__SET('NUMERO_ICARGA', $NUMERO);
                $ICARGA->__SET('FECHA_ICARGA', $_REQUEST['FECHAINSTRUCTIVO']);
                $ICARGA->__SET('FECHA_CDOCUMENTAL_ICARGA', $_REQUEST['FECHACDOCUMENTALICARGA']);
                $ICARGA->__SET('BOOKING_ICARGA', $_REQUEST['BOOKINGINSTRUCTIVO']);
                $ICARGA->__SET('NREFERENCIA_ICARGA', $_REQUEST['NUMEROREFERENCIAINSTRUCTIVO']);
                $ICARGA->__SET('FECHAETD_ICARGA', $_REQUEST['FECHAETD']);
                $ICARGA->__SET('FECHAETA_ICARGA', $_REQUEST['FECHAETA']);
                $ICARGA->__SET('FECHAETAREAL_ICARGA', $_REQUEST['FECHAETAREAL']);
                $ICARGA->__SET('NCONTENEDOR_ICARGA', $_REQUEST['NCONTENEDOR']);                
                $ICARGA->__SET('FDA_ICARGA', $_REQUEST['FDA']);
                $ICARGA->__SET('TEMBARQUE_ICARGA', $_REQUEST['TEMBARQUE']);
                $ICARGA->__SET('FUMIGADO_ICARGA', $_REQUEST['FUMIGADO']);
                $ICARGA->__SET('T_ICARGA', $_REQUEST['TINSTRUCTIVO']);
                $ICARGA->__SET('O2_ICARGA', $_REQUEST['O2INSTRUCTIVO']);
                $ICARGA->__SET('C02_ICARGA', $_REQUEST['CO2INSTRUCTIVO']);
                $ICARGA->__SET('ALAMPA_ICARGA', $_REQUEST['ALAMPAINSTRUCTIVO']);
                $ICARGA->__SET('COSTO_FLETE_ICARGA', $_REQUEST['COSTOFLETE']);
                $ICARGA->__SET('DUS_ICARGA', $_REQUEST['DUSINSTRUCTIVO']);
                $ICARGA->__SET('BOLAWBCRT_ICARGA', $_REQUEST['BOLAWBCRTINSTRUCTIVO']);
                $ICARGA->__SET('NETO_ICARGA', $_REQUEST['NETOINSTRUCTIVO']);
                $ICARGA->__SET('REBATE_ICARGA', $_REQUEST['REBATEINSTRUCTIVO']);
                $ICARGA->__SET('PUBLICA_ICARGA', $PUBLICAINSTRUCTIVO);
                $ICARGA->__SET('ID_SEGURO', $_REQUEST['SEGURO']);
                $ICARGA->__SET('OBSERVACION_ICARGA', $_REQUEST['OBSERVACIONINSTRUCTIVO']);
                $ICARGA->__SET('OBSERVACIONI_ICARGA', $_REQUEST['OBSERVACIONIINSTRUCTIVO']);                
                $ICARGA->__SET('ID_TSERVICIO', $_REQUEST['TSERVICIO']);
                $ICARGA->__SET('ID_EXPPORTADORA', $_REQUEST['EXPORTADORA']);
                $ICARGA->__SET('ID_CONSIGNATARIO', $_REQUEST['CONSIGNATARIO']);
                $ICARGA->__SET('ID_EMISIONBL', $_REQUEST['EMISIONBL']);
                $ICARGA->__SET('ID_NOTIFICADOR', $_REQUEST['NOTIFICADOR']);
                $ICARGA->__SET('ID_BROKER', $_REQUEST['BROKER']);
                $ICARGA->__SET('ID_RFINAL', $_REQUEST['RFINAL']);
                $ICARGA->__SET('ID_MERCADO', $_REQUEST['MERCADO']);
                $ICARGA->__SET('ID_AADUANA', $_REQUEST['AADUANA']);
                $ICARGA->__SET('ID_AGCARGA', $_REQUEST['AGCARGA']);
                $ICARGA->__SET('ID_DFINAL', $_REQUEST['DFINAL']);
                $ICARGA->__SET('ID_FPAGO', $_REQUEST['FPAGO']);
                $ICARGA->__SET('ID_CVENTA', $_REQUEST['CVENTA']);
                $ICARGA->__SET('ID_MVENTA', $_REQUEST['MVENTA']);
                $ICARGA->__SET('ID_TFLETE', $_REQUEST['TFLETE']);
                $ICARGA->__SET('COSTO_FLETE_ICARGA', $_REQUEST['COSTOFLETE']);
                $ICARGA->__SET('ID_TCONTENEDOR', $_REQUEST['TCONTENEDOR']);
                $ICARGA->__SET('ID_ATMOSFERA', $_REQUEST['ATMOSFERA']);
                if (isset($_REQUEST['TEMBARQUE'])) {
                    if ($_REQUEST['TEMBARQUE'] == "1") {
                        $ICARGA->__SET('ID_TRANSPORTE', $_REQUEST['TRANSPORTE']);
                        $ICARGA->__SET('CRT_ICARGA', $_REQUEST['CRT']);
                        $ICARGA->__SET('ID_LCARGA', $_REQUEST['LCARGA']);
                        $ICARGA->__SET('ID_LDESTINO', $_REQUEST['LDESTINO']);
                    }
                    if ($_REQUEST['TEMBARQUE'] == "2") {
                        $ICARGA->__SET('ID_LAREA', $_REQUEST['LAEREA']);
                        $ICARGA->__SET('NAVE_ICARGA', $_REQUEST['NAVE']);
                        $ICARGA->__SET('NVIAJE_ICARGA', $_REQUEST['NVIAJE']);
                        $ICARGA->__SET('ID_ACARGA', $_REQUEST['ACARGA']);
                        $ICARGA->__SET('ID_ADESTINO', $_REQUEST['ADESTINO']);
                    }
                    if ($_REQUEST['TEMBARQUE'] == "3") {
                        $ICARGA->__SET('ID_NAVIERA', $_REQUEST['NAVIERA']);
                        $ICARGA->__SET('NAVE_ICARGA', $_REQUEST['NAVE']);
                        $ICARGA->__SET('FECHASTACKING_ICARGA', $_REQUEST['FECHASTACKING']);
                        $ICARGA->__SET('NVIAJE_ICARGA', $_REQUEST['NVIAJE']);
                        $ICARGA->__SET('ID_PCARGA', $_REQUEST['PCARGA']);
                        $ICARGA->__SET('ID_PDESTINO', $_REQUEST['PDESTINO']);
                    }
                }
                $ICARGA->__SET('ID_PAIS',  $_REQUEST['PAIS']);
                $ICARGA->__SET('ID_EMPRESA',  $_REQUEST['EMPRESA']);
                $ICARGA->__SET('ID_PLANTA',  $_REQUEST['PLANTA']);
                $ICARGA->__SET('ID_TEMPORADA',  $_REQUEST['TEMPORADA']);
                $ICARGA->__SET('ID_USUARIOI', $IDUSUARIOS);
                $ICARGA->__SET('ID_USUARIOM', $IDUSUARIOS);
                //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                $ICARGA_ADO->agregarIcarga($ICARGA);

                $ARRYAOBTENERID = $ICARGA_ADO->obtenerId(
                    $_REQUEST['FECHAINSTRUCTIVO'],
                    $_REQUEST['OBSERVACIONINSTRUCTIVO'],
                    $_REQUEST['EMPRESA'],
                    $_REQUEST['TEMPORADA'],

                );
                $AUSUARIO_ADO->agregarAusuario2($NUMERO,1,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Instructivo Carga","fruta_icarga",$ARRYAOBTENERID[0]['ID_ICARGA'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],$_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );
                //REDIRECCIONAR A PAGINA registroICarga.php
                $id_dato = $ARRYAOBTENERID[0]['ID_ICARGA'];
                $accion_dato = "crear";                
                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Creado",
                        text:"El registro de Instructivo se ha creado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                            location.href = "registroICarga.php?op&id='.$id_dato.'&a='.$accion_dato.'";
                        
                    })
                </script>';
            }        
            //OPERACION EDICION DE FILA    
            if (isset($_REQUEST['GUARDAR'])) {
                $PUBLICAINSTRUCTIVO = $_REQUEST['NETOINSTRUCTIVO'] + $_REQUEST['REBATEINSTRUCTIVO'];
                $ICARGA->__SET('FECHA_ICARGA', $_REQUEST['FECHAINSTRUCTIVO']);
                $ICARGA->__SET('FECHA_CDOCUMENTAL_ICARGA', $_REQUEST['FECHACDOCUMENTALICARGA']);
                $ICARGA->__SET('BOOKING_ICARGA', $_REQUEST['BOOKINGINSTRUCTIVO']);
                $ICARGA->__SET('NREFERENCIA_ICARGA', $_REQUEST['NUMEROREFERENCIAINSTRUCTIVO']);
                $ICARGA->__SET('FECHAETD_ICARGA', $_REQUEST['FECHAETD']);
                $ICARGA->__SET('FECHAETA_ICARGA', $_REQUEST['FECHAETA']);
                $ICARGA->__SET('FECHAETAREAL_ICARGA', $_REQUEST['FECHAETAREAL']);
                $ICARGA->__SET('NCONTENEDOR_ICARGA', $_REQUEST['NCONTENEDOR']);      
                $ICARGA->__SET('FDA_ICARGA', $_REQUEST['FDA']);
                $ICARGA->__SET('TEMBARQUE_ICARGA', $_REQUEST['TEMBARQUE']);
                $ICARGA->__SET('FUMIGADO_ICARGA', $_REQUEST['FUMIGADO']);
                $ICARGA->__SET('T_ICARGA', $_REQUEST['TINSTRUCTIVO']);
                $ICARGA->__SET('O2_ICARGA', $_REQUEST['O2INSTRUCTIVO']);
                $ICARGA->__SET('C02_ICARGA', $_REQUEST['CO2INSTRUCTIVO']);
                $ICARGA->__SET('ALAMPA_ICARGA', $_REQUEST['ALAMPAINSTRUCTIVO']);
                $ICARGA->__SET('COSTO_FLETE_ICARGA', $_REQUEST['COSTOFLETE']);
                $ICARGA->__SET('DUS_ICARGA', $_REQUEST['DUSINSTRUCTIVO']);
                $ICARGA->__SET('BOLAWBCRT_ICARGA', $_REQUEST['BOLAWBCRTINSTRUCTIVO']);
                $ICARGA->__SET('NETO_ICARGA', $_REQUEST['NETOINSTRUCTIVO']);
                $ICARGA->__SET('REBATE_ICARGA', $_REQUEST['REBATEINSTRUCTIVO']);
                $ICARGA->__SET('PUBLICA_ICARGA', $PUBLICAINSTRUCTIVO);
                $ICARGA->__SET('OBSERVACION_ICARGA', $_REQUEST['OBSERVACIONINSTRUCTIVO']);
                $ICARGA->__SET('OBSERVACIONI_ICARGA', $_REQUEST['OBSERVACIONIINSTRUCTIVO']);
                $ICARGA->__SET('TOTAL_ENVASE_ICAGRA', $_REQUEST['TOTALENVASE']);
                $ICARGA->__SET('TOTAL_NETO_ICARGA', $_REQUEST['TOTALKILONETO']);
                $ICARGA->__SET('TOTAL_BRUTO_ICARGA', $_REQUEST['TOTALKILOBRUTO']);
                $ICARGA->__SET('TOTAL_US_ICARGA', $_REQUEST['TOTALUS']);
                $ICARGA->__SET('ID_EXPPORTADORA', $_REQUEST['EXPORTADORA']);
                $ICARGA->__SET('ID_CONSIGNATARIO', $_REQUEST['CONSIGNATARIO']);
                $ICARGA->__SET('ID_EMISIONBL', $_REQUEST['EMISIONBL']);
                $ICARGA->__SET('ID_NOTIFICADOR', $_REQUEST['NOTIFICADOR']);
                $ICARGA->__SET('ID_BROKER', $_REQUEST['BROKER']);
                $ICARGA->__SET('ID_RFINAL', $_REQUEST['RFINAL']);
                $ICARGA->__SET('ID_MERCADO', $_REQUEST['MERCADO']);
                $ICARGA->__SET('ID_AADUANA', $_REQUEST['AADUANA']);
                $ICARGA->__SET('ID_AGCARGA', $_REQUEST['AGCARGA']);
                $ICARGA->__SET('ID_DFINAL', $_REQUEST['DFINAL']);
                if (isset($_REQUEST['TEMBARQUE'])) {
                    if ($_REQUEST['TEMBARQUE'] == "1") {
                        $ICARGA->__SET('ID_TRANSPORTE', $_REQUEST['TRANSPORTE']);
                        $ICARGA->__SET('CRT_ICARGA', $_REQUEST['CRT']);
                        $ICARGA->__SET('ID_LCARGA', $_REQUEST['LCARGA']);
                        $ICARGA->__SET('ID_LDESTINO', $_REQUEST['LDESTINO']);
                    }
                    if ($_REQUEST['TEMBARQUE'] == "2") {
                        $ICARGA->__SET('ID_LAREA', $_REQUEST['LAEREA']);
                        $ICARGA->__SET('NAVE_ICARGA', $_REQUEST['NAVE']);
                        $ICARGA->__SET('NVIAJE_ICARGA', $_REQUEST['NVIAJE']);
                        $ICARGA->__SET('ID_ACARGA', $_REQUEST['ACARGA']);
                        $ICARGA->__SET('ID_ADESTINO', $_REQUEST['ADESTINO']);
                        echo $_REQUEST['ADESTINO'];
                    }
                    if ($_REQUEST['TEMBARQUE'] == "3") {
                        $ICARGA->__SET('ID_NAVIERA', $_REQUEST['NAVIERA']);
                        $ICARGA->__SET('NAVE_ICARGA', $_REQUEST['NAVE']);
                        $ICARGA->__SET('FECHASTACKING_ICARGA', $_REQUEST['FECHASTACKING']);
                        $ICARGA->__SET('NVIAJE_ICARGA', $_REQUEST['NVIAJE']);
                        $ICARGA->__SET('ID_PCARGA', $_REQUEST['PCARGA']);
                        $ICARGA->__SET('ID_PDESTINO', $_REQUEST['PDESTINO']);
                    }
                }
                $ICARGA->__SET('ID_TSERVICIO', $_REQUEST['TSERVICIO']);
                $ICARGA->__SET('ID_TCONTENEDOR', $_REQUEST['TCONTENEDOR']);
                $ICARGA->__SET('ID_ATMOSFERA', $_REQUEST['ATMOSFERA']);
                $ICARGA->__SET('ID_FPAGO', $_REQUEST['FPAGO']);
                $ICARGA->__SET('ID_CVENTA', $_REQUEST['CVENTA']);
                $ICARGA->__SET('ID_MVENTA', $_REQUEST['MVENTA']);
                $ICARGA->__SET('ID_TFLETE', $_REQUEST['TFLETE']);
                $ICARGA->__SET('ID_SEGURO', $_REQUEST['SEGURO']);
                $ICARGA->__SET('ID_PAIS',  $_REQUEST['PAIS']);
                $ICARGA->__SET('ID_USUARIOM', $IDUSUARIOS);
                $ICARGA->__SET('ID_ICARGA', $_REQUEST['IDP']);
                //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                $ICARGA_ADO->actualizarIcarga($ICARGA);

                
                $ICARGA->__SET('ID_ICARGA', $_REQUEST['IDP']);
                //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                $ICARGA_ADO->PorCargar($ICARGA);

                $AUSUARIO_ADO->agregarAusuario2($NUMEROVER,1,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de Instructivo Carga","fruta_icarga",$_REQUEST['IDP'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],$_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );

                if ($accion_dato == "crear") {
                    $id_dato = $_REQUEST['IDP'];
                    $accion_dato = "crear";
                    echo '<script>
                        Swal.fire({
                            icon:"info",
                            title:"Registro Modificado",
                            text:"El registro de Instructivo se ha modificada correctamente",
                            showConfirmButton: true,
                            confirmButtonText:"Cerrar",
                            closeOnConfirm:false
                        }).then((result)=>{
                            location.href = "registroICarga.php?op&id='.$id_dato.'&a='.$accion_dato.'";                        
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
                            text:"El registro de Instructivo se ha modificada correctamente",
                            showConfirmButton: true,
                            confirmButtonText:"Cerrar",
                            closeOnConfirm:false
                        }).then((result)=>{
                            location.href = "registroICarga.php?op&id='.$id_dato.'&a='.$accion_dato.'";                        
                        })
                    </script>';
                }
            }
            if (isset($_REQUEST['CERRAR'])) {
                if ($_REQUEST['IDP']) {
                    $ARRAYDCARGA = $DICARGA_ADO->buscarPorIcarga($_REQUEST['IDP']);
                }
                if ($ARRAYDCARGA) {
                    $SINO = "0";
                    $MENSAJE = "";
                } else {
                    $SINO = "1";
                    echo '<script>
                            Swal.fire({
                                icon:"warning",
                                title:"Accion restringida",
                                text:"Tiene que haber al menos un registro en el detalle.",
                                showConfirmButton: true,
                                confirmButtonText:"Cerrar",
                                closeOnConfirm:false
                            })
                        </script>';
                }
                if ($SINO == "0") {
                    $PUBLICAINSTRUCTIVO = $_REQUEST['NETOINSTRUCTIVO'] + $_REQUEST['REBATEINSTRUCTIVO'];
                    $ICARGA->__SET('FECHA_ICARGA', $_REQUEST['FECHAINSTRUCTIVO']);
                    $ICARGA->__SET('FECHA_CDOCUMENTAL_ICARGA', $_REQUEST['FECHACDOCUMENTALICARGA']);
                    $ICARGA->__SET('BOOKING_ICARGA', $_REQUEST['BOOKINGINSTRUCTIVO']);
                    $ICARGA->__SET('NREFERENCIA_ICARGA', $_REQUEST['NUMEROREFERENCIAINSTRUCTIVO']);
                    $ICARGA->__SET('FECHAETD_ICARGA', $_REQUEST['FECHAETD']);
                    $ICARGA->__SET('FECHAETA_ICARGA', $_REQUEST['FECHAETA']);
                    $ICARGA->__SET('FECHAETAREAL_ICARGA', $_REQUEST['FECHAETAREAL']);
                    $ICARGA->__SET('NCONTENEDOR_ICARGA', $_REQUEST['NCONTENEDOR']);      
                    $ICARGA->__SET('FDA_ICARGA', $_REQUEST['FDA']);
                    $ICARGA->__SET('TEMBARQUE_ICARGA', $_REQUEST['TEMBARQUE']);
                    $ICARGA->__SET('FUMIGADO_ICARGA', $_REQUEST['FUMIGADO']);
                    $ICARGA->__SET('T_ICARGA', $_REQUEST['TINSTRUCTIVO']);
                    $ICARGA->__SET('O2_ICARGA', $_REQUEST['O2INSTRUCTIVO']);
                    $ICARGA->__SET('C02_ICARGA', $_REQUEST['CO2INSTRUCTIVO']);
                    $ICARGA->__SET('ALAMPA_ICARGA', $_REQUEST['ALAMPAINSTRUCTIVO']);
                    $ICARGA->__SET('COSTO_FLETE_ICARGA', $_REQUEST['COSTOFLETE']);
                    $ICARGA->__SET('DUS_ICARGA', $_REQUEST['DUSINSTRUCTIVO']);
                    $ICARGA->__SET('BOLAWBCRT_ICARGA', $_REQUEST['BOLAWBCRTINSTRUCTIVO']);
                    $ICARGA->__SET('NETO_ICARGA', $_REQUEST['NETOINSTRUCTIVO']);
                    $ICARGA->__SET('REBATE_ICARGA', $_REQUEST['REBATEINSTRUCTIVO']);
                    $ICARGA->__SET('PUBLICA_ICARGA', $PUBLICAINSTRUCTIVO);
                    $ICARGA->__SET('OBSERVACION_ICARGA', $_REQUEST['OBSERVACIONINSTRUCTIVO']);
                    $ICARGA->__SET('OBSERVACIONI_ICARGA', $_REQUEST['OBSERVACIONIINSTRUCTIVO']);
                    $ICARGA->__SET('TOTAL_ENVASE_ICAGRA', $_REQUEST['TOTALENVASE']);
                    $ICARGA->__SET('TOTAL_NETO_ICARGA', $_REQUEST['TOTALKILONETO']);
                    $ICARGA->__SET('TOTAL_BRUTO_ICARGA', $_REQUEST['TOTALKILOBRUTO']);
                    $ICARGA->__SET('TOTAL_US_ICARGA', $_REQUEST['TOTALUS']);
                    $ICARGA->__SET('ID_EXPPORTADORA', $_REQUEST['EXPORTADORA']);
                    $ICARGA->__SET('ID_CONSIGNATARIO', $_REQUEST['CONSIGNATARIO']);
                    $ICARGA->__SET('ID_EMISIONBL', $_REQUEST['EMISIONBL']);
                    $ICARGA->__SET('ID_NOTIFICADOR', $_REQUEST['NOTIFICADOR']);
                    $ICARGA->__SET('ID_BROKER', $_REQUEST['BROKER']);
                    $ICARGA->__SET('ID_RFINAL', $_REQUEST['RFINAL']);
                    $ICARGA->__SET('ID_MERCADO', $_REQUEST['MERCADO']);
                    $ICARGA->__SET('ID_AADUANA', $_REQUEST['AADUANA']);
                    $ICARGA->__SET('ID_AGCARGA', $_REQUEST['AGCARGA']);
                    $ICARGA->__SET('ID_DFINAL', $_REQUEST['DFINAL']);
                    if (isset($_REQUEST['TEMBARQUE'])) {
                        if ($_REQUEST['TEMBARQUE'] == "1") {
                            $ICARGA->__SET('ID_TRANSPORTE', $_REQUEST['TRANSPORTE']);
                            $ICARGA->__SET('CRT_ICARGA', $_REQUEST['CRT']);
                            $ICARGA->__SET('ID_LCARGA', $_REQUEST['LCARGA']);
                            $ICARGA->__SET('ID_LDESTINO', $_REQUEST['LDESTINO']);
                        }
                        if ($_REQUEST['TEMBARQUE'] == "2") {
                            $ICARGA->__SET('ID_LAREA', $_REQUEST['LAEREA']);
                            $ICARGA->__SET('NAVE_ICARGA', $_REQUEST['NAVE']);
                            $ICARGA->__SET('NVIAJE_ICARGA', $_REQUEST['NVIAJE']);
                            $ICARGA->__SET('ID_ACARGA', $_REQUEST['ACARGA']);
                            $ICARGA->__SET('ID_ADESTINO', $_REQUEST['ADESTINO']);
                        }
                        if ($_REQUEST['TEMBARQUE'] == "3") {
                            $ICARGA->__SET('ID_NAVIERA', $_REQUEST['NAVIERA']);
                            $ICARGA->__SET('NAVE_ICARGA', $_REQUEST['NAVE']);
                            $ICARGA->__SET('FECHASTACKING_ICARGA', $_REQUEST['FECHASTACKING']);
                            $ICARGA->__SET('NVIAJE_ICARGA', $_REQUEST['NVIAJE']);
                            $ICARGA->__SET('ID_PCARGA', $_REQUEST['PCARGA']);
                            $ICARGA->__SET('ID_PDESTINO', $_REQUEST['PDESTINO']);
                        }
                    }
                    $ICARGA->__SET('ID_TSERVICIO', $_REQUEST['TSERVICIO']);
                    $ICARGA->__SET('ID_TCONTENEDOR', $_REQUEST['TCONTENEDOR']);
                    $ICARGA->__SET('ID_ATMOSFERA', $_REQUEST['ATMOSFERA']);
                    $ICARGA->__SET('ID_FPAGO', $_REQUEST['FPAGO']);
                    $ICARGA->__SET('ID_CVENTA', $_REQUEST['CVENTA']);
                    $ICARGA->__SET('ID_MVENTA', $_REQUEST['MVENTA']);
                    $ICARGA->__SET('ID_TFLETE', $_REQUEST['TFLETE']);
                    $ICARGA->__SET('ID_SEGURO', $_REQUEST['SEGURO']);
                    $ICARGA->__SET('ID_PAIS',  $_REQUEST['PAIS']);
                    $ICARGA->__SET('ID_USUARIOM', $IDUSUARIOS);
                    $ICARGA->__SET('ID_ICARGA', $_REQUEST['IDP']);
                    //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                    $ICARGA_ADO->actualizarIcarga($ICARGA);

                    $ICARGA->__SET('ID_ICARGA', $_REQUEST['IDP']);
                    //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                    $ICARGA_ADO->PorCargar($ICARGA);
                

                    $ICARGA->__SET('ID_ICARGA', $_REQUEST['IDP']);
                    //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                    $ICARGA_ADO->cerrrado($ICARGA);

                    $AUSUARIO_ADO->agregarAusuario2($NUMEROVER,1,3,"".$_SESSION["NOMBRE_USUARIO"].", Cerrar Instructivo Carga","fruta_icarga",$_REQUEST['IDP'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],$_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );

                    //REDIRECCIONAR A PAGINA registroICarga.php 
                    //SEGUNE EL TIPO DE OPERACIONS QUE SE INDENTIFIQUE EN LA URL
                    if ($accion_dato == "crear") {
                        $id_dato = $_REQUEST['IDP'];
                        $accion_dato = "ver";
                        echo '<script>
                            Swal.fire({
                                icon:"info",
                                title:"Registro Cerrado",
                                text:"Este Instructivo se encuentra cerrada y no puede ser modificada.",
                                showConfirmButton: true,
                                confirmButtonText:"Cerrar",
                                closeOnConfirm:false
                            }).then((result)=>{
                                location.href = "registroICarga.php?op&id='.$id_dato.'&a='.$accion_dato.'";                            
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
                                text:"Este Instructivo se encuentra cerrada y no puede ser modificada.",
                                showConfirmButton: true,
                                confirmButtonText:"Cerrar",
                                closeOnConfirm:false
                            }).then((result)=>{
                                location.href = "registroICarga.php?op&id='.$id_dato.'&a='.$accion_dato.'";                            
                            })
                        </script>';
                    }  
                }
            }
        ?>
</body>

</html>