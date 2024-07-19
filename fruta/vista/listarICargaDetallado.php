<?php


include_once "../../assest/config/validarUsuarioFruta.php";


//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
//BASE
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
include_once '../../assest/controlador/EMISIONBL_ADO.php';


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
$EMISIONBL_ADO =  new EMISIONBL_ADO();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$TOTALENVASE = "";
$TOTALNETO = "";
$TOTALBRUTO = "";
$TOTALUS   = "";

$FECHADESDE = "";
$FECHAHASTA = "";


//INICIALIZAR ARREGLOS
$ARRAYICARGA = "";
$ARRAYTOTALICARGA = "";

$ARRAYTCONTENEDOR = "";
$ARRAYTVEHICULO = "";
$ARRAYAERONAVE = "";
$ARRAYNAVE = "";
$ARRAYNAVIERA = "";
$ARRAYDFINAL = "";
$PDESTINO = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES


if ($EMPRESAS   && $TEMPORADAS) {

    $ARRAYICARGA = $ICARGA_ADO->listarIcargaEmpresaTemporadaCBX($EMPRESAS,  $TEMPORADAS);
    $ARRAYTOTALICARGA = $ICARGA_ADO->obtenerTotalesEmpresaTemporada($EMPRESAS,  $TEMPORADAS);
    $TOTALENVASE = $ARRAYTOTALICARGA[0]['ENVASE'];
    $TOTALNETO = $ARRAYTOTALICARGA[0]['NETO'];
    $TOTALBRUTO = $ARRAYTOTALICARGA[0]['BRUTO'];
    $TOTALUS = $ARRAYTOTALICARGA[0]['US'];
}
include_once "../../assest/config/validarDatosUrl.php";
include_once "../../assest/config/datosUrLP.php";






?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title> Detallado Instructivo Carga</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../../assest/config/urlHead.php"; ?>
        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
                //REDIRECCIONAR A LA PAGINA SELECIONADA
                function irPagina(url) {
                    location.href = "" + url;
                }

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

<body class="hold-transition light-skin fixed sidebar-mini theme-primary">
    <div class="wrapper">
        <?php include_once "../../assest/config/menuFruta.php"; ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="container-full">

                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Exportación </h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"> <a href="index.php"> <i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Exportación</li>
                                            <li class="breadcrumb-item" aria-current="page">Instructivo Carga</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#">Detallado Instructivo Carga </a>
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
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                        <div class="table-responsive">
                                            <table id="detalladoicarga" class=" table-hover " style="width: 100%;">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>Número </th>
                                                        <th>Número Referencia</th>
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
                                                        <th>Precio </th>
                                                        <th>Total </th>
                                                        <th>Fecha Instructivo</th>
                                                        <th>Estado Instructivo</th>  
                                                        <th>Recibidor Final</th>
                                                        <th>Cliente</th>
                                                        <th>Consignatario</th>
                                                        <th>Notificador</th>
                                                        <th>Agente Aduana</th>
                                                        <th>Agente Carga</th>
                                                        <th>Tipo Embarque</th> 
                                                        <th>Naviera</th>
                                                        <th>Nave</th>
                                                        <th>Viaje</th>
                                                        <th>Forma Pago</th>
                                                        <th>Modalidad Venta</th>
                                                        <th>Clausula Venta</th>
                                                        <th>Tipo Flete</th>
                                                        <th>Fecha Corte Documental</th>   
                                                        <th>Fecha ETD</th>
                                                        <th>Fecha ETA</th>
                                                        <th>Fecha Real ETA</th>                                            
                                                        <th>Tipo Contenedor</th>
                                                        <th>BL/AWB</th>
                                                        <th>Emisión BL</th>
                                                        <th>N° Contenedor</th>
                                                        <th>Días Estimados</th>
                                                        <th>Días Reales </th>
                                                        <th>Destino Final </th>       
                                                        <th>Semana Instructivo</th>
                                                        <th>Semana Corte Documental</th>
                                                        <th>Semana ETD</th>
                                                        <th>Semana ETA</th>
                                                        <th>Semana Real ETA</th>                                            
                                                        <th>Empresa</th>
                                                        <th>Temporada</th>
                                                        <th>Puerto de Carga</th>
                                                        <th>Puerto Destino</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYICARGA as $r) : ?>

                                                        <?php
                                                        if ($r['ESTADO_ICARGA'] == "1") {
                                                            $ESTADOICARGA = "Creado";
                                                        }
                                                        if ($r['ESTADO_ICARGA'] == "2") {
                                                            $ESTADOICARGA = "Por Cargar";
                                                        }
                                                        if ($r['ESTADO_ICARGA'] == "3") {
                                                            $ESTADOICARGA = "Cargado";
                                                        }
                                                        if ($r['ESTADO_ICARGA'] == "4") {
                                                            $ESTADOICARGA = "Arrivado";
                                                        }
                                                        if ($r['ESTADO_ICARGA'] == "5") {
                                                            $ESTADOICARGA = "Cancelado";
                                                        }
                                                        if ($r['TEMBARQUE_ICARGA'] == "1") {
                                                            $TEMBARQUE = "Terrestre";
                                                        }
                                                        if ($r['TEMBARQUE_ICARGA'] == "2") {
                                                            $TEMBARQUE = "Aereo";
                                                        }
                                                        if ($r['TEMBARQUE_ICARGA'] == "3") {
                                                            $TEMBARQUE = "Maritimo";
                                                        }


                                                        $ARRAYBROKER=$BROKER_ADO->verBroker($r["ID_BROKER"]);
                                                        if($ARRAYBROKER){
                                                            $NOMBREBROKER=$ARRAYBROKER[0]["NOMBRE_BROKER"];
                                                        }else{
                                                            $NOMBREBROKER="Sin Datos";
                                                        }

                                                        $ARRAYRFINAL=$RFINAL_ADO->verRfinal($r["ID_RFINAL"]);
                                                        if($ARRAYRFINAL){
                                                            $NOMBRERFINAL=$ARRAYRFINAL[0]["NOMBRE_RFINAL"];
                                                        }else{
                                                            $NOMBRERFINAL="Sin Datos";
                                                        }
                                                        $ARRYANOTIFICADOR=$NOTIFICADOR_ADO->verNotificador($r['ID_NOTIFICADOR']);   
                                                        if($ARRYANOTIFICADOR){
                                                          $NOMBRENOTIFICADOR=$ARRYANOTIFICADOR[0]["NOMBRE_NOTIFICADOR"];
                                                          $DIRECCIONNOTIFICADOR=$ARRYANOTIFICADOR[0]["DIRECCION_NOTIFICADOR"];
                                                          $EORINOTIFICADOR=$ARRYANOTIFICADOR[0]["EORI_NOTIFICADOR"];
                                                          $TELEFONONOTIFICADOR=$ARRYANOTIFICADOR[0]["TELEFONO_NOTIFICADOR"];
                                                          $EMAIL1NOTIFICADOR=$ARRYANOTIFICADOR[0]["EMAIL1_NOTIFICADOR"];
                                                        }else{
                                                          $NOMBRENOTIFICADOR="Sin Datos";
                                                          $EORINOTIFICADOR="Sin Datos";
                                                          $TELEFONONOTIFICADOR="Sin Datos";
                                                          $DIRECCIONNOTIFICADOR="Sin Datos";
                                                          $EMAIL1NOTIFICADOR="Sin Datos";
                                                        }
                                                        $ARRAYCONSIGNATARIO = $CONSIGNATARIO_ADO->verConsignatorio($r['ID_CONSIGNATARIO']);            
                                                        if($ARRAYCONSIGNATARIO){
                                                          $NOMBRECONSIGNATARIO=$ARRAYCONSIGNATARIO[0]["NOMBRE_CONSIGNATARIO"];
                                                          $DIRECCIONCONSIGNATARIO=$ARRAYCONSIGNATARIO[0]["DIRECCION_CONSIGNATARIO"];
                                                          $EORICONSIGNATARIO=$ARRAYCONSIGNATARIO[0]["EORI_CONSIGNATARIO"];
                                                          $TELEFONOCONSIGNATARIO=$ARRAYCONSIGNATARIO[0]["TELEFONO_CONSIGNATARIO"];
                                                          $EMAIL1CONSIGNATARIO=$ARRAYCONSIGNATARIO[0]["EMAIL1_CONSIGNATARIO"];
                                                        }else{
                                                          $NOMBRECONSIGNATARIO="Sin Datos";
                                                          $EORICONSIGNATARIO="Sin Datos";
                                                          $TELEFONOCONSIGNATARIO="Sin Datos";
                                                          $DIRECCIONCONSIGNATARIO="Sin Datos";
                                                          $EMAIL1CONSIGNATARIO="Sin Datos";
                                                        }

                                                        
                                                        $ARRAYAGCARGA = $AGCARGA_ADO->verAgcarga(  $r['ID_AGCARGA']); 
                                                        if($ARRAYAGCARGA){
                                                            $RUTAGCARGA=$ARRAYAGCARGA[0]["RUT_AGCARGA"]."-".$ARRAYAGCARGA[0]["DV_AGCARGA"];
                                                            $NOMBREAGCARGA=$ARRAYAGCARGA[0]["NOMBRE_AGCARGA"];
                                                            $DIRECCIONAGCARGA=$ARRAYAGCARGA[0]["DIRECCION_AGCARGA"];
                                                            $CONTACTOAGCARGA=$ARRAYAGCARGA[0]["CONTACTO_AGCARGA"];
                                                            $EMAILAGCARGA=$ARRAYAGCARGA[0]["EMAIL_AGCARGA"];
                                                            $TELEFONOAGCARGA=$ARRAYAGCARGA[0]["TELEFONO_AGCARGA"];
                                                        }else{
                                                            $RUTAGCARGA="Sin Datos";
                                                            $NOMBREAGCARGA="Sin Datos";
                                                            $DIRECCIONAGCARGA="Sin Datos";
                                                            $CONTACTOAGCARGA="Sin Datos";
                                                            $EMAILAGCARGA="Sin Datos";
                                                            $TELEFONOAGCARGA="Sin Datos";
                                                        } 
                                                        $ARRAYAADUANA = $AADUANA_ADO->verAaduana( $r['ID_AADUANA']);
                                                        if($ARRAYAADUANA){
                                                            $RUTAADUANA=$ARRAYAADUANA[0]["RUT_AADUANA"]."-".$ARRAYAADUANA[0]["DV_AADUANA"];
                                                            $NOMBREAADUANA=$ARRAYAADUANA[0]["NOMBRE_AADUANA"];
                                                            $DIRECCIONAADUANA=$ARRAYAADUANA[0]["DIRECCION_AADUANA"];
                                                            $CONTACTOAADUANA=$ARRAYAADUANA[0]["CONTACTO_AADUANA"];
                                                            $EMAILAADUANA=$ARRAYAADUANA[0]["EMAIL_AADUANA"];
                                                            $TELEFONOAADUANA=$ARRAYAADUANA[0]["TELEFONO_AADUANA"];
                                                        }else{
                                                            $RUTAADUANA="Sin Datos";
                                                            $NOMBREAADUANA="Sin Datos";
                                                            $DIRECCIONAADUANA="Sin Datos";
                                                            $CONTACTOAADUANA="Sin Datos";
                                                            $EMAILAADUANA="Sin Datos";
                                                            $TELEFONOAADUANA="Sin Datos";
                                                        }

                                                        $ARRAYFPAGO = $FPAGO_ADO->verFpago(  $r['ID_FPAGO']);         
                                                        if($ARRAYFPAGO){
                                                          $NOMBREFPAGO=$ARRAYFPAGO[0]["NOMBRE_FPAGO"];
                                                        }else{
                                                          $NOMBREFPAGO="Sin Datos";
                                                        }
                                                        $ARRAYMVENTA = $MVENTA_ADO->verMventa( $r['ID_MVENTA']);        
                                                        if($ARRAYMVENTA){
                                                          $NOMBREMVENTA=$ARRAYMVENTA[0]["NOMBRE_MVENTA"];
                                                        }else{
                                                          $NOMBREMVENTA="Sin Datos";
                                                        }
                                                        $ARRAYCVENTA = $CVENTA_ADO->verCventa( $r['ID_CVENTA']);        
                                                        if($ARRAYMVENTA){
                                                          $NOMBRECVENTA=$ARRAYCVENTA[0]["NOMBRE_CVENTA"];
                                                        }else{
                                                          $NOMBRECVENTA="Sin Datos";
                                                        }
                                                        $ARRAYTFLETE= $TFLETE_ADO->verTflete( $r['ID_TFLETE']);        
                                                        if($ARRAYTFLETE){
                                                          $NOMBRETFLETE=$ARRAYTFLETE[0]["NOMBRE_TFLETE"];
                                                        }else{
                                                          $NOMBRETFLETE="Sin Datos";
                                                        }  



                                                        $ARRAYTCONTENEDOR = $TCONTENEDOR_ADO->verTcontenedorCarga($r['ID_TCONTENEDOR']);
                                                        if ($ARRAYTCONTENEDOR) {
                                                            $NOMBRETCONTENEDOR = $ARRAYTCONTENEDOR[0]['NOMBRE_TCONTENEDOR'];
                                                        } else {
                                                            $NOMBRETCONTENEDOR = "Sin Datos";
                                                        }
                                                        $ARRAYDFINAL = $DFINAL_ADO->verDfinal($r['ID_DFINAL']);
                                                        if ($ARRAYDFINAL) {
                                                            $NOMBRDFINAL = $ARRAYDFINAL[0]['NOMBRE_DFINAL'];
                                                        } else {
                                                            $NOMBRDFINAL = "Sin Datos";
                                                        }

                                                        $ARRAYEMPRESA = $EMPRESA_ADO->verEmpresa($r['ID_EMPRESA']);
                                                        if ($ARRAYEMPRESA) {
                                                            $NOMBREEMPRESA = $ARRAYEMPRESA[0]['NOMBRE_EMPRESA'];
                                                        } else {
                                                            $NOMBREEMPRESA = "Sin Datos";
                                                        }
                                                        $ARRAYTEMPORADA = $TEMPORADA_ADO->verTemporada($r['ID_TEMPORADA']);
                                                        if ($ARRAYTEMPORADA) {
                                                            $NOMBRETEMPORADA = $ARRAYTEMPORADA[0]['NOMBRE_TEMPORADA'];
                                                        } else {
                                                            $NOMBRETEMPORADA = "Sin Datos";
                                                        }                                                        

                                                        if ($r['TEMBARQUE_ICARGA'] == "1") {
                                                            $TEMBARQUE = "Terrestre";
                                                            $NVIAJE="No Aplica";
                                                            $NAVE="No Aplica";  
                                                            $ARRAYLDESTINO =$LDESTINO_ADO->verLdestino( $r['ID_LDESTINO']);     
                                                            if($ARRAYLDESTINO){
                                                              $NOMBREDESTINO=$ARRAYLDESTINO[0]["NOMBRE_LDESTINO"];
                                                            }else{
                                                              $NOMBREDESTINO="Sin Datos";
                                                            }
                                                            $ARRAYNAVIERA = $NAVIERA_ADO->buscarNombreNavieraID($r['ID_NAVIERA']);
                                                            if($ARRAYNAVIERA){
                                                                $NOMBRENAVIERA = $ARRAYNAVIERA[0]["NOMBRE_NAVIERA"];
                                                            }else{
                                                                $NOMBRENAVIERA = "Sin Datos";
                                                            }
                                                        }
                                                        if ($r['TEMBARQUE_ICARGA'] == "2") {
                                                            $TEMBARQUE = "Aereo";
                                                            $NAVE=$r['NAVE_ICARGA'];
                                                            $NVIAJE = $r['NVIAJE_ICARGA'];
                                                            $ARRAYADESTINO =$ADESTINO_ADO->verAdestino( $r['ID_ADESTINO']);  
                                                            if($ARRAYADESTINO){
                                                              $NOMBREDESTINO=$ARRAYADESTINO[0]["NOMBRE_ADESTINO"];
                                                            }else{
                                                              $NOMBREDESTINO="Sin Datos";
                                                            }
                                                            $ARRAYNAVIERA = $NAVIERA_ADO->buscarNombreNavieraID($r['ID_NAVIERA']);
                                                            if($ARRAYNAVIERA){
                                                                $NOMBRENAVIERA = $ARRAYNAVIERA[0]["NOMBRE_NAVIERA"];
                                                            }else{
                                                                $NOMBRENAVIERA = "Sin Datos";
                                                            }
                                                        }
                                                        if ($r['TEMBARQUE_ICARGA'] == "3") {
                                                            $TEMBARQUE = "Maritimo";
                                                            $NAVE  = $r['NAVE_ICARGA'];
                                                            $NVIAJE = $r['NVIAJE_ICARGA'];
                                                            $ARRAYPDESTINO =$PDESTINO_ADO->verPdestino( $r['ID_PDESTINO']);
                                                            if($ARRAYPDESTINO){
                                                              $NOMBREDESTINO=$ARRAYPDESTINO[0]["NOMBRE_PDESTINO"];
                                                            }else{
                                                              $NOMBREDESTINO="Sin Datos";
                                                            }

                                                            $ARRAYNAVIERA = $NAVIERA_ADO->buscarNombreNavieraID($r['ID_NAVIERA']);
                                                            if($ARRAYNAVIERA){
                                                                $NOMBRENAVIERA = $ARRAYNAVIERA[0]["NOMBRE_NAVIERA"];
                                                            }else{
                                                                $NOMBRENAVIERA = "Sin Datos";
                                                            }

                                                            
                                                        }
                                                    
                                                        $ARRAYDESPACHOEX=$DESPACHOEX_ADO->buscarDespachoExPorIcarga($r['ID_ICARGA']);  
                                                        if($ARRAYDESPACHOEX){
                                                            $NUMEROCONTENEDOR=$ARRAYDESPACHOEX[0]["NUMERO_CONTENEDOR_DESPACHOEX"];
                                                        }else{
                                                            $NUMEROCONTENEDOR=$r['NCONTENEDOR_ICARGA'];
                                                        } 
                                                        $ARRAYDCARGA = $DICARGA_ADO->buscarPorIcarga($r['ID_ICARGA']);                                               
                                                        ?>
                                                        
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

                                                            $ARRAYPCARGA = $PCARGA_ADO->verPcarga($r['ID_PCARGA']);
                                                            if ($ARRAYPCARGA) {
                                                                $NOMBREPCARGA = $ARRAYPCARGA[0]['NOMBRE_PCARGA'];
                                                            } else {
                                                                $NOMBREPCARGA = "Sin Datos";
                                                            }

                                                            $ARRAYEMISIONBL = $EMISIONBL_ADO->verEmisionbl($r['ID_EMISIONBL']);
                                                            if($ARRAYEMISIONBL){
                                                                $NOMBREEMISIONBL = $ARRAYEMISIONBL[0]["NOMBRE_EMISIONBL"];
                                                            }else{
                                                                $NOMBREEMISIONBL = "Sin Datos";
                                                            }

                                                            ?>
                                                            <tr class="text-center">
                                                                <td> <?php echo $r['NUMERO_ICARGA']; ?>  </td>
                                                                <td> <?php echo $r['NREFERENCIA_ICARGA']; ?>  </td>
                                                                <td> <?php echo $CODIGOESTANDAR; ?></td>
                                                                <td> <?php echo $NOMBREESTANTAR ?></td>
                                                                <td> <?php echo number_format($NETOESTANTAR, 2, ".", "") ?></td>
                                                                <td> <?php echo number_format($BRUTOESTANTAR, 2, ".", "") ?></td>
                                                                <td> <?php echo $s['ENVASE']; ?></td>
                                                                <td> <?php echo $s['NETO']; ?></td>
                                                                <td> <?php echo $s['BRUTO']; ?></td>
                                                                <td> <?php echo $NOMBRECALIBRE; ?></td>
                                                                <td> <?php echo $NOMBRETMONEDA; ?></td>
                                                                <td> <?php echo $NOMBRETMANEJO; ?></td>
                                                                <td> <?php echo $s['US']; ?></td>
                                                                <td> <?php echo $s['TOTALUS']; ?></td>
                                                                <td> <?php echo $r['FECHA']; ?> </td>
                                                                <td> <?php echo $ESTADOICARGA; ?> </td>
                                                                <td> <?php echo $NOMBRERFINAL; ?> </td>
                                                                <td> <?php echo $NOMBREBROKER; ?> </td>
                                                                <td> <?php echo $NOMBRECONSIGNATARIO; ?> </td>
                                                                <td> <?php echo $NOMBRENOTIFICADOR; ?> </td>
                                                                <td> <?php echo $NOMBREAADUANA; ?> </td>
                                                                <td> <?php echo $NOMBREAGCARGA; ?> </td>
                                                                <td> <?php echo $TEMBARQUE; ?> </td>
                                                                <td> <?php echo $NOMBRENAVIERA; ?> </td>
                                                                <td> <?php echo $NAVE; ?> </td>
                                                                <td> <?php echo $r['NVIAJE_ICARGA']; ?> </td>
                                                                <td> <?php echo $NOMBREFPAGO; ?> </td>
                                                                <td> <?php echo $NOMBREMVENTA; ?> </td>
                                                                <td> <?php echo $NOMBRECVENTA; ?> </td>
                                                                <td> <?php echo $NOMBRETFLETE; ?> </td>  
                                                                <td> <?php echo $r['FECHACORTEDOCUMENTAL']; ?> </td>
                                                                <td> <?php echo $r['FECHAETD']; ?> </td>
                                                                <td> <?php echo $r['FECHAETA']; ?> </td>
                                                                <td> <?php echo $r['FECHAETAREAL']; ?> </td>
                                                                <td> <?php echo $NOMBRETCONTENEDOR; ?> </td>
                                                                <td> <?php echo $r['BLAWB']; ?> </td>
                                                                <td> <?php echo $NOMBREEMISIONBL; ?> </td>
                                                                <td> <?php echo $NUMEROCONTENEDOR; ?> </td>
                                                                <td> <?php echo $r['ESTIMADO']; ?> </td>
                                                                <td> <?php echo $r['REAL']; ?> </td>
                                                                <td> <?php echo $NOMBRDFINAL; ?> </td>
                                                                <td> <?php echo $r['SEMANA']; ?> </td>
                                                                <td> <?php echo $r['SEMANACORTEDOCUMENTAL']; ?> </td>
                                                                <td> <?php echo $r['SEMANAETD']; ?> </td>
                                                                <td> <?php echo $r['SEMANAETA']; ?> </td>
                                                                <td> <?php echo $r['SEMANAETAREAL']; ?> </td>
                                                                <td> <?php echo $NOMBREEMPRESA; ?></td>
                                                                <td> <?php echo $NOMBRETEMPORADA; ?></td>
                                                                <td> <?php echo $NOMBREPCARGA; ?> </td>
                                                                <td> <?php echo $NOMBREDESTINO; ?> </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="box-footer">
                                <div class="btn-toolbar mb-3" role="toolbar" aria-label="Datos generales">
                                    <div class="form-row align-items-center" role="group" aria-label="Datos">
                                        <div class="col-auto">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Total Envase</div>
                                                    <button class="btn   btn-default" id="TOTALENVASEV" name="TOTALENVASEV" >                                                           
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Total Neto</div>
                                                    <button class="btn   btn-default" id="TOTALNETOV" name="TOTALNETOV" >                                                           
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Total Bruto</div>
                                                    <button class="btn   btn-default" id="TOTALBRUTOV" name="TOTALBRUTOV" >                                                           
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Total US</div>
                                                    <button class="btn   btn-default" id="TOTALUSV" name="TOTALUSV" >                                                           
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
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
</body>
</html>