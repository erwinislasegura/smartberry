<?php

include_once "../../assest/config/validarUsuarioExpo.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES BASE OPERACION
include_once '../../assest/controlador/ICARGA_ADO.php';
include_once '../../assest/controlador/DICARGA_ADO.php';
include_once '../../assest/controlador/DESPACHOEX_ADO.php';
include_once '../../assest/controlador/CONSIGNATARIO_ADO.php';
include_once '../../assest/controlador/EXPORTADORA_ADO.php';

include_once '../../assest/controlador/MVENTA_ADO.php';
include_once '../../assest/controlador/CVENTA_ADO.php';
include_once '../../assest/controlador/SEGURO_ADO.php';

include_once '../../assest/controlador/TMONEDA_ADO.php';
include_once '../../assest/controlador/EEXPORTACION_ADO.php';
include_once '../../assest/controlador/TCALIBRE_ADO.php';

include_once '../../assest/controlador/TRANSPORTE_ADO.php';
include_once '../../assest/controlador/LCARGA_ADO.php';
include_once '../../assest/controlador/LDESTINO_ADO.php';

include_once '../../assest/controlador/LAEREA_ADO.php';
include_once '../../assest/controlador/ACARGA_ADO.php';
include_once '../../assest/controlador/ADESTINO_ADO.php';

include_once '../../assest/controlador/NAVIERA_ADO.php';
include_once '../../assest/controlador/PCARGA_ADO.php';
include_once '../../assest/controlador/PDESTINO_ADO.php';

include_once '../../assest/controlador/VALORP_ADO.php';
include_once '../../assest/controlador/DVALORP_ADO.php';


include_once '../../assest/controlador/VALOR_ADO.php';
include_once '../../assest/controlador/DVALOR_ADO.php';

include_once '../../assest/controlador/TITEM_ADO.php';



include_once '../../assest/modelo/ICARGA.php';
include_once '../../assest/modelo/VALORP.php';
include_once '../../assest/modelo/DVALORP.php';



//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$ICARGA_ADO =  new ICARGA_ADO();
$DICARGA_ADO =  new DICARGA_ADO();
$DESPACHOEX_ADO =  new DESPACHOEX_ADO();

$CONSIGNATARIO_ADO =  new CONSIGNATARIO_ADO();
$EXPORTADORA_ADO =  new EXPORTADORA_ADO();

$TRANSPORTE_ADO =  new TRANSPORTE_ADO();
$LCARGA_ADO =  new LCARGA_ADO();
$LDESTINO_ADO =  new LDESTINO_ADO();

$LAEREA_ADO =  new LAEREA_ADO();
$ACARGA_ADO =  new ACARGA_ADO();
$ADESTINO_ADO =  new ADESTINO_ADO();

$NAVIERA_ADO =  new NAVIERA_ADO();
$PCARGA_ADO =  new PCARGA_ADO();
$PDESTINO_ADO =  new PDESTINO_ADO();

$MVENTA_ADO =  new MVENTA_ADO();
$CVENTA_ADO =  new CVENTA_ADO();
$SEGURO_ADO =  new SEGURO_ADO();

$TMONEDA_ADO = new TMONEDA_ADO();
$EEXPORTACION_ADO = new EEXPORTACION_ADO();
$TCALIBRE_ADO = new TCALIBRE_ADO();

$VALOR_ADO =  new VALORP_ADO();
$DVALOR_ADO =  new DVALORP_ADO();

$VALORL_ADO =  new VALOR_ADO();
$DVALORL_ADO =  new DVALOR_ADO();

$TITEM_ADO =  new TITEM_ADO();

//INIICIALIZAR MODELO 
$ICARGA =  new ICARGA();
$VALOR =  new VALORP();
$DVALOR =  new DVALORP();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$NUMERO = "";
$NUMEROVER = "";
$FECHAINGRESO = "";
$FECHAMODIFCIACION = "";
$IDIVALOR = "";
$FECHAIVALOR = "";
$TVALOR = "";
$OBSERVACIONIVALOR = "";
$ICARGAD="";
$NUMEROCONTENEDOR="";

$BOOKINGINSTRUCTIVO = "";
$BOLAWBCRTINSTRUCTIVO="";
$CONSIGNATARIO = "";
$EXPORTADORA="";
$MVENTA = "";
$CVENTA = "";
$SEGURO="";
$COSTOFLETE="";

$FECHAETD = "";
$FECHAETA = "";
$TEMBARQUE = "";
$TRANSPORTE = "";
$LCARGA = "";
$LDESTINO = "";
$LAEREA = "";
$ACARGA = "";
$ADESTINO = "";
$NAVIERA = "";
$PCARGA = "";
$PDESTINO = "";
$ESTADO = "";
$CONTADOR=0;
$VALORITEM=0;
$FDA="";
$TOTALVALOR=0;
$TOTALVALORPAGO=0;
$TOTALVALORLIQUIDACION=0;

$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";

$IDOP = "";
$OP = "";
$SINO = "";
$MENSAJE = "";


$DISABLED = "";
$DISABLEDSTYLE = "";
$DISABLED2 = "";
$DISABLEDSTYLE2 = "";
$DISABLED3 = "";
$DISABLEDSTYLE3 = "";

//INICIALIZAR ARREGLOS

$ARRAYEMPRESA = "";
$ARRAYPLANTA = "";
$ARRAYTEMPORADA = "";
$ARRAYFECHAACTUAL = "";
$ARRAYITEM="";
$ARRAYDVALOR="";

$ARRAYVERICARGA = "";
$ARRAYICARGA2 = "";
$ARRAYDICARGA = "";
$ARRAYVERDCARGA = "";

$ARRAYCONSIGNATARIO = "";
$ARRAYEXPORTADORA="";

$ARRAYCVENTA = "";
$ARRAYMVENTA = "";
$ARRAYTRANSPORTE = "";
$ARRAYLCARGA = "";
$ARRAYLDESTINO = "";
$ARRAYLAEREA = "";
$ARRAYACARGA = "";
$ARRAYADESTINO = "";
$ARRAYNAVIERA = "";
$ARRAYPCARGA = "";
$ARRAYPDESTINO = "";
$ARRAYSEGURO="";

$ARRAYSEGURO = "";
$ARRAYVERPLANTA = "";
$ARRAYNUMERO = "";
$ARRAYDVALORCONTEO="";
$ARRAYITEMCONTEO="";
$ARRAYECOMERCIAL="";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
/**/
$ARRAYICARGA = $ICARGA_ADO->listarIcargaDespachadoNoPagoCBX($EMPRESAS, $TEMPORADAS);
$ARRAYCONSIGNATARIO = $CONSIGNATARIO_ADO->listarConsignatorioPorEmpresaCBX($EMPRESAS);
$ARRAYEXPORTADORA = $EXPORTADORA_ADO->listarExportadoraCBX($EMPRESAS);
$ARRAYCVENTA = $CVENTA_ADO->listarCventaPorEmpresaCBX($EMPRESAS);
$ARRAYMVENTA = $MVENTA_ADO->listarMventaPorEmpresaCBX($EMPRESAS);

$ARRAYTRANSPORTE = $TRANSPORTE_ADO->listarTransportePorEmpresaCBX($EMPRESAS);
$ARRAYLCARGA = $LCARGA_ADO->listarLcargaPorEmpresaCBX($EMPRESAS);
$ARRAYLDESTINO = $LDESTINO_ADO->listarLdestinoPorEmpresaCBX($EMPRESAS);
$ARRAYLAEREA = $LAEREA_ADO->listarLaereaPorEmpresaCBX($EMPRESAS);
$ARRAYACARGA = $ACARGA_ADO->listarAcargaPorEmpresaCBX($EMPRESAS);
$ARRAYADESTINO = $ADESTINO_ADO->listarAdestinoPorEmpresaCBX($EMPRESAS);
$ARRAYNAVIERA = $NAVIERA_ADO->listarNavierPorEmpresaCBX($EMPRESAS);
$ARRAYPCARGA = $PCARGA_ADO->listarPcargaPorEmpresaCBX($EMPRESAS);
$ARRAYPDESTINO = $PDESTINO_ADO->listarPdestinoPorEmpresaCBX($EMPRESAS);
$ARRAYITEM=$TITEM_ADO->listarTitemPorEmpresaPagoCBX($EMPRESAS);


$ARRAYFECHAACTUAL = $VALOR_ADO->obtenerFecha();
$FECHAVALOR = $ARRAYFECHAACTUAL[0]['FECHA'];

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
//OPERACIONES

//OPERACION EDICION DE FILA
//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION , VISUALIZACION Y CREACION

if (isset($id_dato) && isset($accion_dato)) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $id_dato;
    $OP = $accion_dato;

    $ARRAYVALORTOTAL=$DVALOR_ADO->obtenrTotalPorValor($IDOP);
    $ARRAYVALORTOTAL2=$DVALOR_ADO->obtenrTotalPorValor2($IDOP);
    $TOTALVALORPAGO= $ARRAYVALORTOTAL[0]["TOTAL"];           
    $TOTALVALORPAGOV= $ARRAYVALORTOTAL2[0]["TOTAL"];                      

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
        $ARRAYVERVALOR = $VALOR_ADO->verValor($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYVERVALOR as $r) :

            $NUMEROVER = $r['NUMERO_VALOR'];          
            $FECHAIVALOR  = $r['FECHA_VALOR'];
            $OBSERVACIONIVALOR  = $r['OBSERVACION_VALOR'];
            $ICARGAD= $r['ID_ICARGA'];
            $ARRAYBUSCARVALORPPORICARGA=$VALORL_ADO->buscarValorPorIcarga($ICARGAD);
            if($ARRAYBUSCARVALORPPORICARGA){
                $ARRAYVALORTOTALLIQUI=$DVALORL_ADO->obtenrTotalPorValor($ARRAYBUSCARVALORPPORICARGA[0]["ID_VALOR"]);
                $ARRAYVALORTOTALLIQUI2=$DVALORL_ADO->obtenrTotalPorValor2($ARRAYBUSCARVALORPPORICARGA[0]["ID_VALOR"]);
                if($ARRAYVALORTOTALLIQUI){
                    $TOTALVALORLIQUIDACION= $ARRAYVALORTOTALLIQUI[0]["TOTAL"];       
                }else{
                    $TOTALVALORLIQUIDACION=0;
                }
                if($ARRAYVALORTOTALLIQUI2){
                    $TOTALVALORLIQUIDACIONV= $ARRAYVALORTOTALLIQUI2[0]["TOTAL"];       
                }else{
                    $TOTALVALORLIQUIDACIONV=0;
                }
            }else{
                $TOTALVALORLIQUIDACION=0;
                $TOTALVALORLIQUIDACIONV=0;
            }   
            $ARRAYICARGA = $ICARGA_ADO->listarIcargaDespachadoCBX($EMPRESAS, $TEMPORADAS);
            $ARRAYVERICARGA = $ICARGA_ADO->verIcarga($ICARGAD);
            if ($ARRAYVERICARGA) {
                $CONSIGNATARIO = $ARRAYVERICARGA[0]['ID_CONSIGNATARIO'];
                $EXPORTADORA = $ARRAYVERICARGA[0]['ID_EXPPORTADORA'];
                $BOOKINGINSTRUCTIVO = $ARRAYVERICARGA[0]['BOOKING_ICARGA'];
                $TEMBARQUE = $ARRAYVERICARGA[0]['TEMBARQUE_ICARGA'];
                $FECHAETD = $ARRAYVERICARGA[0]['FECHAETD_ICARGA'];
                $FECHAETA = $ARRAYVERICARGA[0]['FECHAETA_ICARGA'];                 
                if ($TEMBARQUE) {
                    if ($TEMBARQUE == "1") {
                        $TRANSPORTE = $ARRAYVERICARGA[0]['ID_TRANSPORTE'];
                        $LCARGA = $ARRAYVERICARGA[0]['ID_LCARGA'];
                        $LDESTINO = $ARRAYVERICARGA[0]['ID_LDESTINO'];
                    }
                    if ($TEMBARQUE == "2") {
                        $LAEREA = $ARRAYVERICARGA[0]['ID_LAREA'];
                        $ACARGA = $ARRAYVERICARGA[0]['ID_ACARGA'];
                        $ADESTINO = $ARRAYVERICARGA[0]['ID_ADESTINO'];
                    }
                    if ($TEMBARQUE == "3") {
                        $NAVIERA = $ARRAYVERICARGA[0]['ID_NAVIERA'];
                        $PCARGA = $ARRAYVERICARGA[0]['ID_PCARGA'];
                        $PDESTINO = $ARRAYVERICARGA[0]['ID_PDESTINO'];
                    }
                }                
                $BOLAWBCRTINSTRUCTIVO = $ARRAYVERICARGA[0]['BOLAWBCRT_ICARGA'];
                $CVENTA = $ARRAYVERICARGA[0]['ID_CVENTA'];
                $MVENTA = $ARRAYVERICARGA[0]['ID_MVENTA'];
                $COSTOFLETE =  $ARRAYVERICARGA[0]['COSTO_FLETE_ICARGA'];
                $SEGURO=  $ARRAYVERICARGA[0]['ID_SEGURO'];

                $ARRAYDESPACHOEX=$DESPACHOEX_ADO->buscarDespachoExPorIcarga($ARRAYVERICARGA[0]["ID_ICARGA"]);
                $ARRAYDESPACHOEX2=$DESPACHOEX_ADO->buscarDespachoExPorIcargaAgrupadoPorPlanta($ARRAYVERICARGA[0]["ID_ICARGA"]);
                if($ARRAYDESPACHOEX){
                  $NUMEROCONTENEDOR=$ARRAYDESPACHOEX[0]['NUMERO_CONTENEDOR_DESPACHOEX'];                     
                  foreach ($ARRAYDESPACHOEX2 as $s) :    
                    $ARRAYVERPLANTA = $PLANTA_ADO->verPlanta($s['ID_PLANTA']);
                    if($ARRAYVERPLANTA){
                      $FDA= $FDA.$ARRAYVERPLANTA[0]["FDA_PLANTA"].", ";
                    }else{
                      $FDA=$FDA;
                    }
                  endforeach;   
                }else{
                  $FDA="Sin Datos";
                  $NUMEROCONTENEDOR=$ARRAYICARGA[0]['NCONTENEDOR_ICARGA'];
                } 
                $ARRAYDICARGA=$DICARGA_ADO->buscarPorIcargaLimitado1($ARRAYVERICARGA[0]["ID_ICARGA"]);
                if($ARRAYDICARGA){
                    $TMONEDA=$ARRAYDICARGA[0]["TMONEDA"];
                }else{
                    $TMONEDA="Sin Datos";
                }
            }
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
        $ARRAYVERVALOR = $VALOR_ADO->verValor($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYVERVALOR as $r) :

            $NUMEROVER = $r['NUMERO_VALOR'];          
            $FECHAIVALOR  = $r['FECHA_VALOR'];
            $OBSERVACIONIVALOR  = $r['OBSERVACION_VALOR'];
            $ICARGAD= $r['ID_ICARGA'];
            $ARRAYBUSCARVALORPPORICARGA=$VALORL_ADO->buscarValorPorIcarga($ICARGAD);
            if($ARRAYBUSCARVALORPPORICARGA){
                $ARRAYVALORTOTALLIQUI=$DVALORL_ADO->obtenrTotalPorValor($ARRAYBUSCARVALORPPORICARGA[0]["ID_VALOR"]);
                $ARRAYVALORTOTALLIQUI2=$DVALORL_ADO->obtenrTotalPorValor2($ARRAYBUSCARVALORPPORICARGA[0]["ID_VALOR"]);
                if($ARRAYVALORTOTALLIQUI){
                    $TOTALVALORLIQUIDACION= $ARRAYVALORTOTALLIQUI[0]["TOTAL"];       
                }else{
                    $TOTALVALORLIQUIDACION=0;
                }
                if($ARRAYVALORTOTALLIQUI2){
                    $TOTALVALORLIQUIDACIONV= $ARRAYVALORTOTALLIQUI2[0]["TOTAL"];       
                }else{
                    $TOTALVALORLIQUIDACIONV=0;
                }
            }else{
                $TOTALVALORLIQUIDACION=0;
                $TOTALVALORLIQUIDACIONV=0;
            }  
            $ARRAYICARGA = $ICARGA_ADO->listarIcargaDespachadoCBX($EMPRESAS, $TEMPORADAS);
            $ARRAYVERICARGA = $ICARGA_ADO->verIcarga($ICARGAD);
            if ($ARRAYVERICARGA) {
                $CONSIGNATARIO = $ARRAYVERICARGA[0]['ID_CONSIGNATARIO'];
                $EXPORTADORA = $ARRAYVERICARGA[0]['ID_EXPPORTADORA'];
                $BOOKINGINSTRUCTIVO = $ARRAYVERICARGA[0]['BOOKING_ICARGA'];
                $TEMBARQUE = $ARRAYVERICARGA[0]['TEMBARQUE_ICARGA'];
                $FECHAETD = $ARRAYVERICARGA[0]['FECHAETD_ICARGA'];
                $FECHAETA = $ARRAYVERICARGA[0]['FECHAETA_ICARGA'];                 
                if ($TEMBARQUE) {
                    if ($TEMBARQUE == "1") {
                        $TRANSPORTE = $ARRAYVERICARGA[0]['ID_TRANSPORTE'];
                        $LCARGA = $ARRAYVERICARGA[0]['ID_LCARGA'];
                        $LDESTINO = $ARRAYVERICARGA[0]['ID_LDESTINO'];
                    }
                    if ($TEMBARQUE == "2") {
                        $LAEREA = $ARRAYVERICARGA[0]['ID_LAREA'];
                        $ACARGA = $ARRAYVERICARGA[0]['ID_ACARGA'];
                        $ADESTINO = $ARRAYVERICARGA[0]['ID_ADESTINO'];
                    }
                    if ($TEMBARQUE == "3") {
                        $NAVIERA = $ARRAYVERICARGA[0]['ID_NAVIERA'];
                        $PCARGA = $ARRAYVERICARGA[0]['ID_PCARGA'];
                        $PDESTINO = $ARRAYVERICARGA[0]['ID_PDESTINO'];
                    }
                }                
                $BOLAWBCRTINSTRUCTIVO = $ARRAYVERICARGA[0]['BOLAWBCRT_ICARGA'];
                $CVENTA = $ARRAYVERICARGA[0]['ID_CVENTA'];
                $MVENTA = $ARRAYVERICARGA[0]['ID_MVENTA'];
                $COSTOFLETE =  $ARRAYVERICARGA[0]['COSTO_FLETE_ICARGA'];
                $SEGURO=  $ARRAYVERICARGA[0]['ID_SEGURO'];

                $ARRAYDESPACHOEX=$DESPACHOEX_ADO->buscarDespachoExPorIcarga($ARRAYVERICARGA[0]["ID_ICARGA"]);
                $ARRAYDESPACHOEX2=$DESPACHOEX_ADO->buscarDespachoExPorIcargaAgrupadoPorPlanta($ARRAYVERICARGA[0]["ID_ICARGA"]);
                if($ARRAYDESPACHOEX){
                  $NUMEROCONTENEDOR=$ARRAYDESPACHOEX[0]['NUMERO_CONTENEDOR_DESPACHOEX'];                     
                  foreach ($ARRAYDESPACHOEX2 as $s) :    
                    $ARRAYVERPLANTA = $PLANTA_ADO->verPlanta($s['ID_PLANTA']);
                    if($ARRAYVERPLANTA){
                      $FDA= $FDA.$ARRAYVERPLANTA[0]["FDA_PLANTA"].", ";
                    }else{
                      $FDA=$FDA;
                    }
                  endforeach;   
                }else{
                  $FDA="Sin Datos";
                  $NUMEROCONTENEDOR=$ARRAYICARGA[0]['NCONTENEDOR_ICARGA'];
                } 
                $ARRAYDICARGA=$DICARGA_ADO->buscarPorIcargaLimitado1($ARRAYVERICARGA[0]["ID_ICARGA"]);
                if($ARRAYDICARGA){
                    $TMONEDA=$ARRAYDICARGA[0]["TMONEDA"];
                }else{
                    $TMONEDA="Sin Datos";
                }
            }
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
        $ARRAYVERVALOR = $VALOR_ADO->verValor($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYVERVALOR as $r) :

            $NUMEROVER = $r['NUMERO_VALOR'];          
            $FECHAIVALOR  = $r['FECHA_VALOR'];
            $OBSERVACIONIVALOR  = $r['OBSERVACION_VALOR'];
            $ICARGAD= $r['ID_ICARGA'];
            $ARRAYBUSCARVALORPPORICARGA=$VALORL_ADO->buscarValorPorIcarga($ICARGAD);
            if($ARRAYBUSCARVALORPPORICARGA){
                $ARRAYVALORTOTALLIQUI=$DVALORL_ADO->obtenrTotalPorValor($ARRAYBUSCARVALORPPORICARGA[0]["ID_VALOR"]);
                $ARRAYVALORTOTALLIQUI2=$DVALORL_ADO->obtenrTotalPorValor2($ARRAYBUSCARVALORPPORICARGA[0]["ID_VALOR"]);
                if($ARRAYVALORTOTALLIQUI){
                    $TOTALVALORLIQUIDACION= $ARRAYVALORTOTALLIQUI[0]["TOTAL"];       
                }else{
                    $TOTALVALORLIQUIDACION=0;
                }
                if($ARRAYVALORTOTALLIQUI2){
                    $TOTALVALORLIQUIDACIONV= $ARRAYVALORTOTALLIQUI2[0]["TOTAL"];       
                }else{
                    $TOTALVALORLIQUIDACIONV=0;
                }
            }else{
                $TOTALVALORLIQUIDACION=0;
                $TOTALVALORLIQUIDACIONV=0;
            }  
            $ARRAYICARGA = $ICARGA_ADO->listarIcargaDespachadoCBX($EMPRESAS, $TEMPORADAS);
            $ARRAYVERICARGA = $ICARGA_ADO->verIcarga($ICARGAD);
            if ($ARRAYVERICARGA) {
                $CONSIGNATARIO = $ARRAYVERICARGA[0]['ID_CONSIGNATARIO'];
                $EXPORTADORA = $ARRAYVERICARGA[0]['ID_EXPPORTADORA'];
                $BOOKINGINSTRUCTIVO = $ARRAYVERICARGA[0]['BOOKING_ICARGA'];
                $TEMBARQUE = $ARRAYVERICARGA[0]['TEMBARQUE_ICARGA'];
                $FECHAETD = $ARRAYVERICARGA[0]['FECHAETD_ICARGA'];
                $FECHAETA = $ARRAYVERICARGA[0]['FECHAETA_ICARGA'];                 
                if ($TEMBARQUE) {
                    if ($TEMBARQUE == "1") {
                        $TRANSPORTE = $ARRAYVERICARGA[0]['ID_TRANSPORTE'];
                        $LCARGA = $ARRAYVERICARGA[0]['ID_LCARGA'];
                        $LDESTINO = $ARRAYVERICARGA[0]['ID_LDESTINO'];
                    }
                    if ($TEMBARQUE == "2") {
                        $LAEREA = $ARRAYVERICARGA[0]['ID_LAREA'];
                        $ACARGA = $ARRAYVERICARGA[0]['ID_ACARGA'];
                        $ADESTINO = $ARRAYVERICARGA[0]['ID_ADESTINO'];
                    }
                    if ($TEMBARQUE == "3") {
                        $NAVIERA = $ARRAYVERICARGA[0]['ID_NAVIERA'];
                        $PCARGA = $ARRAYVERICARGA[0]['ID_PCARGA'];
                        $PDESTINO = $ARRAYVERICARGA[0]['ID_PDESTINO'];
                    }
                }                
                $BOLAWBCRTINSTRUCTIVO = $ARRAYVERICARGA[0]['BOLAWBCRT_ICARGA'];
                $CVENTA = $ARRAYVERICARGA[0]['ID_CVENTA'];
                $MVENTA = $ARRAYVERICARGA[0]['ID_MVENTA'];
                $COSTOFLETE =  $ARRAYVERICARGA[0]['COSTO_FLETE_ICARGA'];
                $SEGURO=  $ARRAYVERICARGA[0]['ID_SEGURO'];

                $ARRAYDESPACHOEX=$DESPACHOEX_ADO->buscarDespachoExPorIcarga($ARRAYVERICARGA[0]["ID_ICARGA"]);
                $ARRAYDESPACHOEX2=$DESPACHOEX_ADO->buscarDespachoExPorIcargaAgrupadoPorPlanta($ARRAYVERICARGA[0]["ID_ICARGA"]);
                if($ARRAYDESPACHOEX){
                  $NUMEROCONTENEDOR=$ARRAYDESPACHOEX[0]['NUMERO_CONTENEDOR_DESPACHOEX'];                     
                  foreach ($ARRAYDESPACHOEX2 as $s) :    
                    $ARRAYVERPLANTA = $PLANTA_ADO->verPlanta($s['ID_PLANTA']);
                    if($ARRAYVERPLANTA){
                      $FDA= $FDA.$ARRAYVERPLANTA[0]["FDA_PLANTA"].", ";
                    }else{
                      $FDA=$FDA;
                    }
                  endforeach;   
                }else{
                  $FDA="Sin Datos";
                  $NUMEROCONTENEDOR=$ARRAYICARGA[0]['NCONTENEDOR_ICARGA'];
                } 
                $ARRAYDICARGA=$DICARGA_ADO->buscarPorIcargaLimitado1($ARRAYVERICARGA[0]["ID_ICARGA"]);
                if($ARRAYDICARGA){
                    $TMONEDA=$ARRAYDICARGA[0]["TMONEDA"];
                }else{
                    $TMONEDA="Sin Datos";
                }
            }
            $EMPRESA = $r['ID_EMPRESA'];
            $TEMPORADA = $r['ID_TEMPORADA'];
            $ESTADO = $r['ESTADO'];
        endforeach;
    }
    $TOTALVALOR = $TOTALVALORLIQUIDACION - $TOTALVALORPAGO;
}

//PROCESO PARA OBTENER LOS DATOS DEL FORMULARIO  Y MANTENERLO AL ACTUALIZACION QUE REALIZA EL SELECT DE PRODUCTOR
if (isset($_POST)) {
    
    //DATOS GENERALES     
    if (isset($_REQUEST['FECHAVALOR'])) {
        $FECHAVALOR = $_REQUEST['FECHAVALOR'];
    }
   
    if (isset($_REQUEST['ICARGAD'])) {
        $ICARGAD = $_REQUEST['ICARGAD'];
        if (isset($_REQUEST['ICARGAD'])) {
            $ICARGAD = "" . $_REQUEST['ICARGAD'];
            $ARRAYVERICARGA = $ICARGA_ADO->verIcarga($ICARGAD);
            if ($ARRAYVERICARGA) {
                $CONSIGNATARIO = $ARRAYVERICARGA[0]['ID_CONSIGNATARIO'];
                $EXPORTADORA = $ARRAYVERICARGA[0]['ID_EXPPORTADORA'];
                $BOOKINGINSTRUCTIVO = $ARRAYVERICARGA[0]['BOOKING_ICARGA'];
                $TEMBARQUE = $ARRAYVERICARGA[0]['TEMBARQUE_ICARGA'];
                $FECHAETD = $ARRAYVERICARGA[0]['FECHAETD_ICARGA'];
                $FECHAETA = $ARRAYVERICARGA[0]['FECHAETA_ICARGA'];       


                $ARRAYDESPACHOEX=$DESPACHOEX_ADO->buscarDespachoExPorIcarga($ARRAYVERICARGA[0]["ID_ICARGA"]);
                $ARRAYDESPACHOEX2=$DESPACHOEX_ADO->buscarDespachoExPorIcargaAgrupadoPorPlanta($ARRAYVERICARGA[0]["ID_ICARGA"]);
                if($ARRAYDESPACHOEX){
                  $NUMEROCONTENEDOR=$ARRAYDESPACHOEX[0]['NUMERO_CONTENEDOR_DESPACHOEX'];                     
                  foreach ($ARRAYDESPACHOEX2 as $r) :    
                    $ARRAYVERPLANTA = $PLANTA_ADO->verPlanta($r['ID_PLANTA']);
                    if($ARRAYVERPLANTA){
                      $FDA= $FDA.$ARRAYVERPLANTA[0]["FDA_PLANTA"].", ";
                    }else{
                      $FDA=$FDA;
                    }
                  endforeach;     
            
                }else{
                  $FDA="Sin Datos";
                  $NUMEROCONTENEDOR=$ARRAYICARGA[0]['NCONTENEDOR_ICARGA'];
                }
                
                
                if ($TEMBARQUE) {
                    if ($TEMBARQUE == "1") {
                        $TRANSPORTE = $ARRAYVERICARGA[0]['ID_TRANSPORTE'];
                        $LCARGA = $ARRAYVERICARGA[0]['ID_LCARGA'];
                        $LDESTINO = $ARRAYVERICARGA[0]['ID_LDESTINO'];
                    }
                    if ($TEMBARQUE == "2") {
                        $LAEREA = $ARRAYVERICARGA[0]['ID_LAREA'];
                        $ACARGA = $ARRAYVERICARGA[0]['ID_ACARGA'];
                        $ADESTINO = $ARRAYVERICARGA[0]['ID_ADESTINO'];
                    }
                    if ($TEMBARQUE == "3") {
                        $NAVIERA = $ARRAYVERICARGA[0]['ID_NAVIERA'];
                        $PCARGA = $ARRAYVERICARGA[0]['ID_PCARGA'];
                        $PDESTINO = $ARRAYVERICARGA[0]['ID_PDESTINO'];
                    }
                }                
                $BOLAWBCRTINSTRUCTIVO = $ARRAYVERICARGA[0]['BOLAWBCRT_ICARGA'];
                $CVENTA = $ARRAYVERICARGA[0]['ID_CVENTA'];
                $MVENTA = $ARRAYVERICARGA[0]['ID_MVENTA'];
            }
        }
    }    

    if (isset($_REQUEST['OBSERVACIONIVALOR'])) {
        $OBSERVACIONIVALOR = $_REQUEST['OBSERVACIONIVALOR'];
    }
    if (isset($_REQUEST['EMPRESA'])) {
        $EMPRESA = "" . $_REQUEST['EMPRESA'];
    }
    if (isset($_REQUEST['TEMPORADA'])) {
        $TEMPORADA = "" . $_REQUEST['TEMPORADA'];
    }
}

$instructivo = ICARGA::mdlGetInstructivoCarga($ICARGAD);

if (isset($_GET['op'])){
    $_SESSION['brokerIcarga'] = $instructivo[0]['ID_BROKER'];
    $_SESSION['empresaIcarga'] = $instructivo[0]['ID_ICARGA'];
    $_SESSION['temporadaIcarga'] = $instructivo[0]['ID_TEMPORADA'];
} else {
    unset($_SESSION['brokerIcarga']);
    unset($_SESSION['empresaIcarga']);
    unset($_SESSION['temporadaIcarga']);
}


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title> Registro Valor Pago</title>
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

                    FECHAVALOR = document.getElementById("FECHAVALOR").value;
                    ICARGAD = document.getElementById("ICARGAD").selectedIndex;                    
                    OBSERVACIONIVALOR = document.getElementById("OBSERVACIONIVALOR").value;



                    document.getElementById('val_fecha').innerHTML = "";
                    document.getElementById('val_icarga').innerHTML = "";
                    document.getElementById('val_observacion').innerHTML = "";


                    if (FECHAVALOR == null || FECHAVALOR.length == 0 || /^\s+$/.test(FECHAVALOR)) {
                        document.form_reg_dato.FECHAVALOR.focus();
                        document.form_reg_dato.FECHAVALOR.style.borderColor = "#FF0000";
                        document.getElementById('val_fecha').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.FECHAVALOR.style.borderColor = "#4AF575";

                
                    if (ICARGAD == null || ICARGAD == 0) {
                        document.form_reg_dato.ICARGAD.focus();
                        document.form_reg_dato.ICARGAD.style.borderColor = "#FF0000";
                        document.getElementById('val_icarga').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.ICARGAD.style.borderColor = "#4AF575";

                    
                    if (OBSERVACIONIVALOR == null || OBSERVACIONIVALOR.length == 0 || /^\s+$/.test(OBSERVACIONIVALOR)) {
                        document.form_reg_dato.OBSERVACIONIVALOR.focus();
                        document.form_reg_dato.OBSERVACIONIVALOR.style.borderColor = "#FF0000";
                        document.getElementById('val_observacion').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.OBSERVACIONIVALOR.style.borderColor = "#4AF575";      
                    



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
</head>
<body class="hold-transition light-skin fixed sidebar-mini theme-primary" >
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <?php include_once "../../assest/config/menuExpo.php"; ?>
            <div class="content-wrapper">
                <div class="container-full">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Pago</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"> <a href="index.php"> <i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Pago</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#">Registro Valor Pago </a>
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
                        <div class="box">
                            <div class="box-header with-border bg-primary">                                   
                                <h4 class="box-title">Registro de Valor Pago</h4>                                        
                            </div>
                            <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato">
                                <div class="box-body ">
                                    <div class="row">
                                        <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group ">
                                                <label>Número Valor</label>
                                                <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTA" name="PLANTA" value="<?php echo $PLANTAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESAE" name="EMPRESAE" value="<?php echo $EMPRESA; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTAE" name="PLANTAE" value="<?php echo $PLANTA; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADAE" name="TEMPORADAE" value="<?php echo $TEMPORADA; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID RECEPCION" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="OP RECEPCION" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="URL RECEPCION" id="URLP" name="URLP" value="registroValorPago" />
                                                <input type="hidden" class="form-control" placeholder="URL DRECEPCION" id="URLD" name="URLD" value="registroDvalorPago" />
                                                <input type="text" class="form-control " style="background-color: #eeeeee;" placeholder="Número Instructivo" id="IDINSTRUCTIVO" name="IDINSTRUCTIVO" value="<?php echo $NUMEROVER; ?>" disabled />
                                                <label id="val_id" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-6 col-xl-1 col-lg-1 col-md-6 col-sm-6 col-6 col-xs-6">
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha Ingreso</label>
                                                <input type="hidden" class="form-control" placeholder="Fecha Ingreso " id="FECHAINGRESOE" name="FECHAINGRESOE" value="<?php echo $FECHAINGRESO; ?>" />
                                                <input type="date" class="form-control" style="background-color: #eeeeee;" placeholder="Fecha Ingreso" id="FECHAINGRESO" name="FECHAINGRESO" value="<?php echo $FECHAINGRESO; ?>" disabled />
                                                <label id="val_fechai" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha Modificación</label>
                                                <input type="hidden" class="form-control" placeholder="Fecha Modificacion " id="FECHAMODIFCIACIONE" name="FECHAMODIFCIACIONE" value="<?php echo $FECHAMODIFCIACION; ?>" />
                                                <input type="date" class="form-control " style="background-color: #eeeeee;" placeholder="FECHA MODIFICACION" id="FECHAMODIFCIACION" name="FECHAMODIFCIACION" value="<?php echo $FECHAMODIFCIACION; ?>" disabled />
                                                <label id="val_fecham" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                <label>Fecha Valor</label>
                                                <input type="hidden" class="form-control" placeholder="Instructivo Carga" id="FECHAVALORE" name="FECHAVALORE" value="<?php echo $FECHAVALOR; ?>" />
                                                <input type="date" class="form-control"  placeholder="Fecha Valor" id="FECHAVALOR" name="FECHAVALOR" value="<?php echo $FECHAVALOR; ?>" <?php echo $DISABLED; ?> />
                                                <label id="val_fecha" class="validacion"> </label>
                                            </div>
                                        </div>                                                  
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Instructivo Carga</label>
                                                    <input type="hidden" class="form-control" placeholder="ICARGADE" id="ICARGADE" name="ICARGADE" value="<?php echo $ICARGAD; ?>" />
                                                    <select class="form-control select2" id="ICARGAD" name="ICARGAD" style="width: 100%;" onchange="this.form.submit()" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYICARGA as $r) : ?>
                                                            <?php if ($ARRAYICARGA) {    ?>
                                                                <option value="<?php echo $r['ID_ICARGA']; ?>" <?php if ($ICARGAD == $r['ID_ICARGA']) {  echo "selected";  } ?>>
                                                                    <?php echo $r['NUMERO_ICARGA'] ?> : <?php echo $r['NREFERENCIA_ICARGA'] ?> 
                                                                </option>
                                                            <?php } else { ?>
                                                                <option value="0">No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                <label id="val_icarga" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Exportadora</label>
                                                    <input type="hidden" class="form-control" placeholder="EXPORTADORAE" id="EXPORTADORAE" name="EXPORTADORAE" value="<?php echo $EXPORTADORA; ?>" />
                                                    <select class="form-control select2" id="EXPORTADORA" name="EXPORTADORA" style="width: 100%;" disabled>
                                                    <option></option>
                                                    <?php foreach ($ARRAYEXPORTADORA as $r) : ?>
                                                    <?php if ($ARRAYEXPORTADORA) {    ?>
                                                        <option value="<?php echo $r['ID_EXPORTADORA']; ?>" 
                                                            <?php if ($EXPORTADORA == $r['ID_EXPORTADORA']) { echo "selected"; } ?>>
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
                                        <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Consignatario</label>
                                                <input type="hidden" class="form-control" placeholder="CONSIGNATARIO" id="CONSIGNATARIOE" name="CONSIGNATARIOE" value="<?php echo $CONSIGNATARIO; ?>" />
                                                    <select class="form-control select2" id="CONSIGNATARIO" name="CONSIGNATARIO" style="width: 100%;" disabled>
                                                    <option></option>
                                                    <?php foreach ($ARRAYCONSIGNATARIO as $r) : ?>
                                                    <?php if ($ARRAYCONSIGNATARIO) {    ?>
                                                        <option value="<?php echo $r['ID_CONSIGNATARIO']; ?>" 
                                                            <?php if ($CONSIGNATARIO == $r['ID_CONSIGNATARIO']) { echo "selected"; } ?>>
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
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha ETD</label>
                                                <input type="hidden" class="form-control" placeholder="FECHA ETD" id="FECHAETDE" name="FECHAETDE" value="<?php echo $FECHAETD; ?>" />
                                                <input type="date" class="form-control"  placeholder="Fecha  ETD" id="FECHAETD" name="FECHAETD" value="<?php echo $FECHAETD; ?>" disabled/>
                                                <label id="val_fechaetd" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha ETA</label>
                                                <input type="hidden" class="form-control" placeholder="FECHA PROCESO" id="FECHAETAE" name="FECHAETAE" value="<?php echo $FECHAETA; ?>" />
                                                <input type="date" class="form-control"  placeholder="Fecha ETA" id="FECHAETA" name="FECHAETA" value="<?php echo $FECHAETA; ?>" disabled/>
                                                <label id="val_fechaeta" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>N° Contenedor </label>
                                                <input type="hidden" class="form-control" placeholder="N° Contenedor" id="NUMEROCONTENEDORE" name="NUMEROCONTENEDORE" value="<?php echo $NUMEROCONTENEDOR; ?>" />
                                                <input type="text" class="form-control" placeholder="N° Contenedor Instructivo" id="NUMEROCONTENEDOR" name="NUMEROCONTENEDOR" value="<?php echo $NUMEROCONTENEDOR; ?>" disabled/>
                                                <label id="val_ncontenedor" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>FDA Packing </label>
                                                <input type="hidden" class="form-control" placeholder="FDAE" id="FDAE" name="FDAE" value="<?php echo $FDA; ?>" />
                                                <input type="text" class="form-control" placeholder="FDA Instructivo" id="FDA" name="FDA" value="<?php echo $FDA; ?>" disabled/>
                                                <label id="val_fda" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>BL/AWB </label>
                                                <input type="hidden" class="form-control" placeholder="BOLAWBCRTINSTRUCTIVOE" id="BOLAWBCRTINSTRUCTIVOE" name="BOLAWBCRTINSTRUCTIVOE" value="<?php echo $BOLAWBCRTINSTRUCTIVO; ?>" />
                                                <input type="text" class="form-control" placeholder="BOL/AWB/CRT Instructivo" id="BOLAWBCRTINSTRUCTIVO" name="BOLAWBCRTINSTRUCTIVO" value="<?php echo $BOLAWBCRTINSTRUCTIVO; ?>" disabled/>
                                                <label id="val_bolawbcrt" class="validacion"> </label>
                                            </div>
                                        </div>         
                                        <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Clausula Venta</label>
                                                <input type="hidden" class="form-control" placeholder="CVENTAE" id="CVENTAE" name="CVENTAE" value="<?php echo $CVENTA; ?>" />
                                                <select class="form-control select2" id="CVENTA" name="CVENTA" style="width: 100%;"  disabled >
                                                    <option></option>
                                                    <?php foreach ($ARRAYCVENTA as $r) : ?>
                                                    <?php if ($ARRAYCVENTA) {    ?>
                                                            <option value="<?php echo $r['ID_CVENTA']; ?>" 
                                                            <?php if ($CVENTA == $r['ID_CVENTA']) {  echo "selected";   } ?>>
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
                                        <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Modalidad Venta</label>
                                                <input type="hidden" class="form-control" placeholder="MVENTAE" id="MVENTAE" name="MVENTAE" value="<?php echo $MVENTA; ?>" />
                                                <select class="form-control select2" id="MVENTA" name="MVENTA" style="width: 100%;"  disabled>
                                                    <option></option>
                                                    <?php foreach ($ARRAYMVENTA as $r) : ?>
                                                    <?php if ($ARRAYMVENTA) {    ?>
                                                            <option value="<?php echo $r['ID_MVENTA']; ?>"
                                                             <?php if ($MVENTA == $r['ID_MVENTA']) { echo "selected";  } ?>>
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
                                        <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Tipo Embarque</label>
                                                <input type="hidden" class="form-control" placeholder="TEMBARQUEE" id="TEMBARQUEE" name="TEMBARQUEE" value="<?php echo $TEMBARQUE; ?>" />
                                                <select class="form-control select2" id="TEMBARQUE" name="TEMBARQUE" style="width: 100%;"  disabled>
                                                    <option></option>
                                                    <option value="1" <?php if ($TEMBARQUE == "1") { echo "selected"; } ?>> Terrestre </option>
                                                    <option value="2" <?php if ($TEMBARQUE == "2") { echo "selected"; } ?>> Aereo</option>
                                                    <option value="3" <?php if ($TEMBARQUE == "3") { echo "selected"; } ?>> Maritimo</option>
                                                </select>
                                                <label id="val_tembarque" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <?php if ($TEMBARQUE == "1") { ?>
                                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Transporte</label>
                                                    <input type="hidden" class="form-control" placeholder="TRANSPORTEE" id="TRANSPORTEE" name="TRANSPORTEE" value="<?php echo $TRANSPORTE; ?>" />
                                                    <select class="form-control select2" id="TRANSPORTE" name="TRANSPORTE" style="width: 100%;" disabled>
                                                    <option></option>
                                                    <?php foreach ($ARRAYTRANSPORTE as $r) : ?>
                                                    <?php if ($ARRAYTRANSPORTE) {    ?>
                                                        <option value="<?php echo $r['ID_TRANSPORTE']; ?>" <?php if ($TRANSPORTE == $r['ID_TRANSPORTE']) {  echo "selected";  } ?>>
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
                                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Lugar Carga</label>
                                                    <input type="hidden" class="form-control" placeholder="LCARGAE" id="LCARGAE" name="LCARGAE" value="<?php echo $LCARGA; ?>" />
                                                    <select class="form-control select2" id="LCARGA" name="LCARGA" style="width: 100%;" disabled>
                                                    <option></option>
                                                    <?php foreach ($ARRAYLCARGA as $r) : ?>
                                                    <?php if ($ARRAYLCARGA) {    ?>
                                                        <option value="<?php echo $r['ID_LCARGA']; ?>" <?php if ($LCARGA == $r['ID_LCARGA']) {  echo "selected";  } ?>>
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
                                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Lugar Destino</label>
                                                    <input type="hidden" class="form-control" placeholder="LDESTINOE" id="LDESTINOE" name="LDESTINOE" value="<?php echo $LDESTINO; ?>" />
                                                    <select class="form-control select2" id="LDESTINO" name="LDESTINO" style="width: 100%;" disabled>
                                                    <option></option>
                                                    <?php foreach ($ARRAYLDESTINO  as $r) : ?>
                                                    <?php if ($ARRAYLDESTINO) {    ?>
                                                                            <option value="<?php echo $r['ID_LDESTINO']; ?>" <?php if ($LDESTINO == $r['ID_LDESTINO']) {  echo "selected"; } ?>>
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
                                        <?php } ?>
                                        <?php if ($TEMBARQUE == "2") { ?>
                                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Linea Aerea</label>
                                                    <input type="hidden" class="form-control" placeholder="LAEREAE" id="LAEREAE" name="LAEREAE" value="<?php echo $LAEREA; ?>" />
                                                    <select class="form-control select2" id="LAEREA" name="LAEREA" style="width: 100%;" disabled>
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
                                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Aeropuerto Carga</label>
                                                    <input type="hidden" class="form-control" placeholder="ACARGAE" id="ACARGAE" name="ACARGAE" value="<?php echo $ACARGA; ?>" />
                                                    <select class="form-control select2" id="ACARGA" name="ACARGA" style="width: 100%;" disabled>
                                                        <option></option>
                                                        <?php foreach ($ARRAYACARGA as $r) : ?>
                                                        <?php if ($ARRAYACARGA) {    ?>
                                                            <option value="<?php echo $r['ID_ACARGA']; ?>" <?php if ($ACARGA == $r['ID_ACARGA']) {   echo "selected"; } ?>>
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
                                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Aeropuerto Destino</label>
                                                    <input type="hidden" class="form-control" placeholder="ADESTINOE" id="ADESTINOE" name="ADESTINOE" value="<?php echo $ADESTINO; ?>" />
                                                    <select class="form-control select2" id="ADESTINO" name="ADESTINO" style="width: 100%;" disabled>
                                                        <option></option>
                                                        <?php foreach ($ARRAYADESTINO as $r) : ?>
                                                        <?php if ($ARRAYADESTINO) {    ?>
                                                            <option value="<?php echo $r['ID_ADESTINO']; ?>" <?php if ($ADESTINO == $r['ID_ADESTINO']) {  echo "selected";  } ?>>
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
                                        <?php } ?>
                                        <?php if ($TEMBARQUE == "3") { ?>
                                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Naviera </label>
                                                    <input type="hidden" class="form-control" placeholder="NAVIERAE" id="NAVIERAE" name="NAVIERAE" value="<?php echo $NAVIERA; ?>" />
                                                    <select class="form-control select2" id="NAVIERA" name="NAVIERA" style="width: 100%;" disabled>
                                                        <option></option>
                                                        <?php foreach ($ARRAYNAVIERA as $r) : ?>
                                                        <?php if ($ARRAYNAVIERA) {    ?>
                                                            <option value="<?php echo $r['ID_NAVIERA']; ?>" <?php if ($NAVIERA == $r['ID_NAVIERA']) { echo "selected";   } ?>>
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
                                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Puerto Carga</label>
                                                    <input type="hidden" class="form-control" placeholder="PCARGAE" id="PCARGAE" name="PCARGAE" value="<?php echo $PCARGA; ?>" />
                                                    <select class="form-control select2" id="PCARGA" name="PCARGA" style="width: 100%;" disabled>
                                                        <option></option>
                                                        <?php foreach ($ARRAYPCARGA as $r) : ?>
                                                        <?php if ($ARRAYPCARGA) {    ?>
                                                            <option value="<?php echo $r['ID_PCARGA']; ?>" <?php if ($PCARGA == $r['ID_PCARGA']) {
                                                                                                                                echo "selected";
                                                                                                                            } ?>>
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
                                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Puerto Destino</label>
                                                    <input type="hidden" class="form-control" placeholder="PDESTINOE" id="PDESTINOE" name="PDESTINOE" value="<?php echo $PDESTINO; ?>" />
                                                    <select class="form-control select2" id="PDESTINO" name="PDESTINO" style="width: 100%;" disabled>
                                                        <option></option>
                                                        <?php foreach ($ARRAYPDESTINO as $r) : ?>
                                                        <?php if ($ARRAYPDESTINO) {    ?>
                                                            <option value="<?php echo $r['ID_PDESTINO']; ?>" <?php if ($PDESTINO == $r['ID_PDESTINO']) {  echo "selected"; } ?>>
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
                                        <?php } ?>                                               
                                    </div>
                                    <div class="row">
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" placeholder="OBSERVACION PROCESO" id="OBSERVACIONIVALORE" name="OBSERVACIONIVALORE" value="<?php echo $OBSERVACIONIVALOR; ?>" />
                                                <label>Observaciones Valor Liqui. </label>
                                                <textarea class="form-control" rows="1"  placeholder="Ingrese Motivo e Observacion  " id="OBSERVACIONIVALOR" name="OBSERVACIONIVALOR" <?php echo $DISABLED; ?>><?php echo $OBSERVACIONIVALOR; ?></textarea>
                                                <label id="val_observacion" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->                                
                                <div class="box-footer">
                                    <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="toolbar">
                                        <div class="btn-group  col-xxl-4 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12" role="group" aria-label="Acciones generales">
                                            <?php if ($OP == "") { ?>
                                                <button type="button" class="btn btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroValorPago.php');">
                                                    <i class="ti-trash"></i> Cancelar
                                                </button>
                                                <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Crear" name="CREAR" value="CREAR"   onclick="return validacion()">
                                                    <i class="ti-save-alt"></i> Crear
                                                </button>
                                            <?php } ?>
                                            <?php if ($OP != "") { ?>
                                                <button type="button" class="btn  btn-success " data-toggle="tooltip" title="Volver" name="VOLVER" value="VOLVER" Onclick="irPagina('listarValorPago.php'); ">
                                                    <i class="ti-back-left "></i> Volver
                                                </button>
                                                <button type="submit" class="btn btn-warning " data-toggle="tooltip" title="Guardar" name="EDITAR" value="EDITAR"    <?php echo $DISABLED2; ?> onclick="return validacion()">
                                                    <i class="ti-pencil-alt"></i> Guardar
                                                </button>
                                                <button type="submit" class="btn btn-danger " data-toggle="tooltip" title="Cerrar" name="CERRAR" value="CERRAR"  <?php echo $DISABLED2; ?> onclick="return validacion()">
                                                    <i class="ti-save-alt"></i> Cerrar
                                                </button>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>                   
                        <!--.row -->                        
                        <?php if (isset($_GET['op'])): ?>
                            <div class="card">                            
                                <div class="card-header bg-info">
                                    <h4 class="card-title">Detalle de Valor</h4>
                                </div>
                                <div class="card-header">
                                    <div class="form-row align-items-center">                                        
                                            <div class="col-auto">
                                                <label class="sr-only" for="inlineFormInputGroup">Username</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">Total Liquidacion </div>
                                                    </div>
                                                    <input type="hidden" name="TOTALVALORL" id="TOTALVALORL" value="<?php echo $TOTALVALORLIQUIDACION; ?>" />
                                                    <input type="text" class="form-control text-center" placeholder="Total Valor Liqui." id="TOTALVALORV" name="TOTALVALORV" value="<?php echo $TOTALVALORLIQUIDACIONV; ?>" disabled />
                                                </div>
                                            </div>                                 
                                            <div class="col-auto">
                                                <label class="sr-only" for="inlineFormInputGroup">Username</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">Total Descuentos </div>
                                                    </div>
                                                    <input type="hidden" name="TOTALVALOP" id="TOTALVALORP" value="<?php echo $TOTALVALORPAGO; ?>" />
                                                    <input type="text" class="form-control text-center" placeholder="Total Valor Pago" id="TOTALVALORV" name="TOTALVALORV" value="<?php echo $TOTALVALORPAGOV; ?>" disabled />
                                                </div>
                                            </div>                                 
                                            <div class="col-auto">
                                                <label class="sr-only" for="inlineFormInputGroup">Username</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">Pendiente Pago </div>
                                                    </div>
                                                    <input type="hidden" name="TOTALVALOR" id="TOTALVALOR" value="<?php echo $TOTALVALOR; ?>" />
                                                    <input type="text" class="form-control text-center" placeholder="Total Valor" id="TOTALVALORV" name="TOTALVALORV" value="<?php echo number_format($TOTALVALOR,1,',','.'); ?>" disabled />
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="table-responsive">
                                                <table id="detalle" class=" table-hover " style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>N° Item </th>     
                                                            <th class="text-center">Operaciones</th>
                                                            <th>Item </th>     
                                                            <th>Valor  </th>
                                                            <th>Tipo Moneda </th>  
                                                            <th>Fecha </th>      
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                            $ARRAYSEGURO=$SEGURO_ADO->verSeguro($SEGURO);
                                                            if($ARRAYSEGURO){
                                                              $NOMBRESEGURO =  $ARRAYSEGURO[0]["NOMBRE_SEGURO"];
                                                              $VALORSEGURO =  $ARRAYSEGURO[0]["SUMA_SEGURO"];
                                                            }else{
                                                                $NOMBRESEGURO="Sin Datos";
                                                                $VALORSEGURO="Sin Datos";
                                                            }

                                                        ?>
                                                        <?php if ($ARRAYITEM) { ?>
                                                            <?php foreach ($ARRAYITEM as $s) : ?>
                                                                <?php
                                                                    $CONTADOR+=1;
                                                                    $ARRAYDVALOR=$DVALOR_ADO->buscarPorValorItem($IDOP,$s["ID_TITEM"]);
                                                                    if($ARRAYDVALOR){
                                                                       $VALORDVALOR= $ARRAYDVALOR[0]["VALOR_DVALOR"];   
                                                                       $FECHADVALOR= $ARRAYDVALOR[0]["FECHA_DVALOR"];                                                                
                                                                    }else{
                                                                       $VALORDVALOR=0;
                                                                       $FECHADVALOR="";
                                                                    }
                                                                ?>
                                                                <tr class="center">
                                                                    <td><?php echo $CONTADOR; ?></td>
                                                                    <td>
                                                                        <form method="post" id="form1">
                                                                            <input type="hidden" class="form-control" placeholder="ID DRECEPCIONE" id="IDD" name="IDD" value="<?php echo $s['ID_TITEM']; ?>" />
                                                                            <input type="hidden" class="form-control" placeholder="ID RECEPCIONE" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                                                            <input type="hidden" class="form-control" placeholder="OP RECEPCIONE" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                                                            <input type="hidden" class="form-control" placeholder="URL RECEPCIONE" id="URLP" name="URLP" value="registroValorPago" />
                                                                            <input type="hidden" class="form-control" placeholder="URL DRECEPCIONE" id="URLD" name="URLD" value="registroDvalorPago" />
                                                                            <div class="btn-group btn-rounded  btn-block" role="group" aria-label="Operaciones Detalle">
                                                                                <?php if ($ESTADO == "0") { ?>
                                                                                    <button type="submit" class="btn btn-info btn-sm  " id="VERDURL" name="VERDURL" data-toggle="tooltip" title="Ver Valor  ">
                                                                                        <i class="ti-eye"></i> <br>Ver 
                                                                                    </button>
                                                                                <?php } ?>
                                                                                <?php if ($ESTADO == "1") { ?>                                                                                    
                                                                                     <?php if ( empty($ARRAYDVALOR)) { ?>
                                                                                        <button type="submit" class="btn   btn-success  btn-sm" id="DUPLICARDURL" name="DUPLICARDURL" data-toggle="tooltip" title="Agregar Valor " >
                                                                                            <i class="ti-plus"></i> <br> Agregar 
                                                                                        </button>
                                                                                    <?php }else{ ?>
                                                                                        <button type="submit" class="btn btn-warning btn-sm " id="EDITARDURL" name="EDITARDURL" data-toggle="tooltip" title="Editar Valor  " >
                                                                                            <i class="ti-pencil-alt"></i><br> Editar 
                                                                                        </button>
                                                                                        <button type="submit" class="btn btn-danger btn-sm" id="ELIMINARDURL" name="ELIMINARDURL" data-toggle="tooltip" title="Eliminar Valor  ">
                                                                                            <i class="ti-close"></i> <br>Eliminar 
                                                                                        </button>
                                                                                    <?php } ?>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </form>
                                                                    </td>
                                                                    <td><?php echo $s["NOMBRE_TITEM"]; ?></td>
                                                                    <td><?php echo number_format( $VALORDVALOR,2,',','.' ); ?></td>
                                                                    <td><?php echo $TMONEDA; ?></td>
                                                                    <td><?php echo $FECHADVALOR; ?></td>
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
                <?php include_once "../../assest/config/menuExtraExpo.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../../assest/config/urlBase.php"; ?>
        <?php
            //OPERACION DE REGISTRO DE FILA          
            if (isset($_REQUEST['CREAR'])) {

                $ARRAYNUMERO = $VALOR_ADO->obtenerNumero($_REQUEST['EMPRESA'],  $_REQUEST['TEMPORADA']);
                $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;

                $VALOR->__SET('NUMERO_VALOR', $NUMERO);
                $VALOR->__SET('FECHA_VALOR', $_REQUEST['FECHAVALOR']);
                $VALOR->__SET('OBSERVACION_VALOR', $_REQUEST['OBSERVACIONIVALOR']);
                $VALOR->__SET('ID_ICARGA', $_REQUEST['ICARGAD']);
                $VALOR->__SET('ID_EMPRESA',  $_REQUEST['EMPRESA']);
                $VALOR->__SET('ID_TEMPORADA',  $_REQUEST['TEMPORADA']);
                $VALOR->__SET('ID_USUARIOI', $IDUSUARIOS);
                $VALOR->__SET('ID_USUARIOM', $IDUSUARIOS);
                //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                $VALOR_ADO->agregarValor($VALOR);

     

                $ARRYAOBTENERID = $VALOR_ADO->obtenerId(
                    $_REQUEST['FECHAVALOR'],
                    $_REQUEST['EMPRESA'],
                    $_REQUEST['TEMPORADA'],

                );
                
                $ICARGA->__SET('ID_ICARGA', $_REQUEST['ICARGAD']);
                //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                $ICARGA_ADO->pago($ICARGA);
            

                $AUSUARIO_ADO->agregarAusuario2($NUMERO,3,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Valor de Pago","liquidacion_valorp",$ARRYAOBTENERID[0]['ID_VALOR'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );

                //REDIRECCIONAR A PAGINA registroValorPago.php

                $id_dato = $ARRYAOBTENERID[0]['ID_VALOR'];
                $accion_dato = "crear";
                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Creado",
                        text:"El registro de Valor Pago se ha creado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroValorPago.php?op&id='.$id_dato.'&a='.$accion_dato.'";                        
                    })
                </script>';
                
            }             
            if (isset($_REQUEST['EDITAR'])) {                
                $VALOR->__SET('FECHA_VALOR', $_REQUEST['FECHAVALOR']);
                $VALOR->__SET('OBSERVACION_VALOR', $_REQUEST['OBSERVACIONIVALOR']);
                $VALOR->__SET('ID_USUARIOM', $IDUSUARIOS);
                $VALOR->__SET('ID_VALOR', $_REQUEST['IDP']);
                //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                $VALOR_ADO->actualizarValor($VALOR);             

                $ICARGA->__SET('ID_ICARGA', $_REQUEST['ICARGADE']);
                //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                $ICARGA_ADO->pago($ICARGA);
                
                $AUSUARIO_ADO->agregarAusuario2($NUMEROVER,3,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de Valor de Pago","liquidacion_valorp",$_REQUEST['IDP'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );
                            
                         
                 if ($accion_dato == "crear") {
                    $id_dato = $_REQUEST['IDP'];
                    $accion_dato = "crear";
                    echo '<script>
                        Swal.fire({
                            icon:"info",
                            title:"Registro Modificado",
                            text:"El registro de Valor Pago se ha modificada correctamente",
                            showConfirmButton: true,
                            confirmButtonText:"Cerrar",
                            closeOnConfirm:false
                        }).then((result)=>{
                            location.href = "registroValorPago.php?op&id='.$id_dato.'&a='.$accion_dato.'";                        
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
                            text:"El registro de Valor Pago se ha modificada correctamente",
                            showConfirmButton: true,
                            confirmButtonText:"Cerrar",
                            closeOnConfirm:false
                        }).then((result)=>{
                            location.href = "registroValorPago.php?op&id='.$id_dato.'&a='.$accion_dato.'";                        
                        })
                    </script>';
                }
                

                
            }    
            if (isset($_REQUEST['CERRAR'])) {

                $ARRAYDVALOR=$DVALOR_ADO->buscarPorValor($_REQUEST['IDP']);
                if ($ARRAYDVALOR) {
                    $SINO = "0";

                    $ARRAYDVALORCONTEO=$DVALOR_ADO->contarPorValor($_REQUEST['IDP']);
                    $ARRAYITEMCONTEO=$TITEM_ADO->contarTitemPagoPorEmpresaCBX($EMPRESAS);
                    if($ARRAYDVALORCONTEO[0]["CONTEO"]>0 && $ARRAYITEMCONTEO[0]["CONTEO"]>0){
                        if($ARRAYDVALORCONTEO[0]["CONTEO"]!=$ARRAYITEMCONTEO[0]["CONTEO"]){
                            $SINO = "1";            
                             echo '<script>
                                    Swal.fire({
                                        icon:"warning",
                                        title:"Accion restringida",
                                        text:"Todos los item del detalle debe contener un valor.",
                                        showConfirmButton: true,
                                        confirmButtonText:"Cerrar",
                                        closeOnConfirm:false
                                    })
                                </script>';   

                        }else{                            
                            $SINO = "0";
                        }
                    }
                } else {
                    $SINO = "1";                     
                    echo '<script>
                            Swal.fire({
                                icon:"warning",
                                title:"Accion restringida",
                                text:"En el detalle tiene haber al menos uno con valor",
                                showConfirmButton: true,
                                confirmButtonText:"Cerrar",
                                closeOnConfirm:false
                            })
                        </script>';    

                }
                if ($SINO == "0") {
                    $VALOR->__SET('FECHA_VALOR', $_REQUEST['FECHAVALOR']);
                    $VALOR->__SET('OBSERVACION_VALOR', $_REQUEST['OBSERVACIONIVALOR']);
                    $VALOR->__SET('ID_USUARIOM', $IDUSUARIOS);
                    $VALOR->__SET('ID_VALOR', $_REQUEST['IDP']);
                    //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                    $VALOR_ADO->actualizarValor($VALOR);                                   
     

                    $VALOR->__SET('ID_VALOR', $_REQUEST['IDP']);
                    //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                    $VALOR_ADO->cerrado($VALOR);
                    
                    $ICARGA->__SET('ID_ICARGA', $_REQUEST['ICARGADE']);
                    //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                    $ICARGA_ADO->pago($ICARGA);
            
                    $AUSUARIO_ADO->agregarAusuario2($NUMEROVER,3,3,"".$_SESSION["NOMBRE_USUARIO"].", Cerrar  Valor de Pago","liquidacion_valorp",$_REQUEST['IDP'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );
                   
                    
                    //REDIRECCIONAR A PAGINA registroValorPago.php 
                    //SEGUNE EL TIPO DE OPERACIONS QUE SE INDENTIFIQUE EN LA URL
                    if ($accion_dato == "crear") {
                        $id_dato = $_REQUEST['IDP'];
                        $accion_dato = "ver";
                        echo '<script>
                            Swal.fire({
                                icon:"info",
                                title:"Registro Cerrado",
                                text:"Este Valor Pago se encuentra cerrada y no puede ser modificada.",
                                showConfirmButton: true,
                                confirmButtonText:"Cerrar",
                                closeOnConfirm:false
                            }).then((result)=>{
                                location.href = "registroValorPago.php?op&id='.$id_dato.'&a='.$accion_dato.'";                            
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
                                text:"Este Valor Pago se encuentra cerrada y no puede ser modificada.",
                                showConfirmButton: true,
                                confirmButtonText:"Cerrar",
                                closeOnConfirm:false
                            }).then((result)=>{
                                location.href = "registroValorPago.php?op&id='.$id_dato.'&a='.$accion_dato.'";                            
                            })
                        </script>';
                    } 
                }
            }
        ?>
</body>

</html>