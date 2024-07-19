<?php

include_once "../../assest/config/validarUsuarioExpo.php";


//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../../assest/controlador/ESPECIES_ADO.php';
include_once '../../assest/controlador/VESPECIES_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/TMANEJO_ADO.php';
include_once '../../assest/controlador/TCALIBRE_ADO.php';
include_once '../../assest/controlador/TEMBALAJE_ADO.php';


include_once '../../assest/controlador/CONDUCTOR_ADO.php';
include_once '../../assest/controlador/TRANSPORTE_ADO.php';
include_once '../../assest/controlador/COMPRADOR_ADO.php';


include_once '../../assest/controlador/TPROCESO_ADO.php';
include_once '../../assest/controlador/TREEMBALAJE_ADO.php';
include_once '../../assest/controlador/PROCESO_ADO.php';
include_once '../../assest/controlador/REEMBALAJE_ADO.php';


include_once '../../assest/controlador/EEXPORTACION_ADO.php';
include_once '../../assest/controlador/EINDUSTRIAL_ADO.php';
include_once '../../assest/controlador/ERECEPCION_ADO.php';

include_once '../../assest/controlador/EXIMATERIAPRIMA_ADO.php';
include_once '../../assest/controlador/RECEPCIONMP_ADO.php';
include_once '../../assest/controlador/DESPACHOMP_ADO.php';
include_once '../../assest/controlador/EXIINDUSTRIAL_ADO.php';
include_once '../../assest/controlador/RECEPCIONIND_ADO.php';
include_once '../../assest/controlador/DESPACHOIND_ADO.php';
include_once '../../assest/controlador/EXIEXPORTACION_ADO.php';
include_once '../../assest/controlador/RECEPCIONPT_ADO.php';
include_once '../../assest/controlador/DESPACHOPT_ADO.php';
include_once '../../assest/controlador/DESPACHOEX_ADO.php';
include_once '../../assest/controlador/REPALETIZAJEEX_ADO.php';



include_once '../../assest/controlador/ICARGA_ADO.php';
include_once '../../assest/controlador/DFINAL_ADO.php';
include_once '../../assest/controlador/RFINAL_ADO.php';
include_once '../../assest/controlador/BROKER_ADO.php';
include_once '../../assest/controlador/MERCADO_ADO.php';

include_once '../../assest/controlador/LDESTINO_ADO.php';
include_once '../../assest/controlador/ADESTINO_ADO.php';
include_once '../../assest/controlador/PDESTINO_ADO.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$ESPECIES_ADO =  new ESPECIES_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$PRODUCTOR_ADO = new PRODUCTOR_ADO();
$TMANEJO_ADO =  new TMANEJO_ADO();
$TCALIBRE_ADO =  new TCALIBRE_ADO();
$TEMBALAJE_ADO =  new TEMBALAJE_ADO();


$CONDUCTOR_ADO =  new CONDUCTOR_ADO();
$TRANSPORTE_ADO =  new TRANSPORTE_ADO();
$COMPRADOR_ADO =  new COMPRADOR_ADO();


$TPROCESO_ADO =  new TPROCESO_ADO();
$TREEMBALAJE_ADO =  new TREEMBALAJE_ADO();
$PROCESO_ADO =  new PROCESO_ADO();
$REEMBALAJE_ADO =  new REEMBALAJE_ADO();

$EEXPORTACION_ADO =  new EEXPORTACION_ADO();
$EINDUSTRIAL_ADO =  new EINDUSTRIAL_ADO();
$ERECEPCION_ADO =  new ERECEPCION_ADO();


$EXIMATERIAPRIMA_ADO =  new EXIMATERIAPRIMA_ADO();
$RECEPCIONMP_ADO =  new RECEPCIONMP_ADO();
$DESPACHOMP_ADO =  new DESPACHOMP_ADO();
$EXIINDUSTRIAL_ADO =  new EXIINDUSTRIAL_ADO();
$RECEPCIONIND_ADO =  new RECEPCIONIND_ADO();
$DESPACHOIND_ADO =  new DESPACHOIND_ADO();
$EXIEXPORTACION_ADO =  new EXIEXPORTACION_ADO();
$RECEPCIONPT_ADO =  new RECEPCIONPT_ADO();
$DESPACHOPT_ADO =  new DESPACHOPT_ADO();
$DESPACHOEX_ADO =  new DESPACHOEX_ADO();
$REPALETIZAJEEX_ADO =  new REPALETIZAJEEX_ADO();


$ICARGA_ADO =  new ICARGA_ADO();
$DFINAL_ADO =  new DFINAL_ADO();
$RFINAL_ADO =  new RFINAL_ADO();
$BROKER_ADO =  new BROKER_ADO();
$MERCADO_ADO =  new MERCADO_ADO();
$LDESTINO_ADO =  new LDESTINO_ADO();
$ADESTINO_ADO =  new ADESTINO_ADO();
$PDESTINO_ADO =  new PDESTINO_ADO();




//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD


$TOTALBRUTO = 0;
$TOTALNETO = 0;
$TOTALENVASE = 0;
$FECHADESDE = "";
$FECHAHASTA = "";

$PRODUCTOR = "";
$NUMEROGUIA = "";

//INICIALIZAR ARREGLOS
$ARRAYDESPACHOPT = "";
$ARRAYDESPACHOPTTOTALES = "";
$ARRAYVEREMPRESA = "";
$ARRAYVERPRODUCTOR = "";
$ARRAYVERTRANSPORTE = "";
$ARRAYVERCONDUCTOR = "";
$ARRAYMGUIAPT = "";
$ARRAYRECEPCIONMPORIGEN1="";
$ARRAYRECEPCIONMPORIGEN2="";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES



if ($EMPRESAS  &&  $TEMPORADAS) {
    $ARRAYDESPACHOIND = $DESPACHOIND_ADO->listarDespachompEmpresaTemporadaCBX($EMPRESAS,  $TEMPORADAS);
    $ARRAYDESPACHOMP = $DESPACHOMP_ADO->listarDespachompEmpresaTemporadaCBX($EMPRESAS, $TEMPORADAS);
    $ARRAYDESPACHOPT = $DESPACHOPT_ADO->listarDespachoptEmpresaTemporadaCBX($EMPRESAS,  $TEMPORADAS);
    $ARRAYDESPACHOEX = $DESPACHOEX_ADO->listarDespachoexEmpresaTemporadaCBX($EMPRESAS,  $TEMPORADAS);
}






?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Consolidado Despacho</title>
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

                function refrescar() {
                    document.getElementById("form_reg_dato").submit();
                }

                function abrirPestana(url) {
                    var win = window.open(url, '_blank');
                    win.focus();
                }
                //FUNCION PARA ABRIR VENTANA QUE SE ENCUENTRA LA OPERACIONES DE DETALLE DE RECEPCION
                function abrirVentana(url) {
                    var opciones =
                        "'directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=1000, height=800'";
                    window.open(url, 'window', opciones);
                }
            </script>
</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary" >
    <div class="wrapper">
        <?php include_once "../../assest/config/menuExpo.php"; ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-full">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            <h3 class="page-title">Gestión </h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                        <li class="breadcrumb-item" aria-current="page">Modulo</li>
                                        <li class="breadcrumb-item" aria-current="page">Informe</li>
                                        <li class="breadcrumb-item" aria-current="page">Gestión</li>
                                        <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Consolidado Despacho </a>
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
                                        <table id="consolidadodf" class=" table-hover   " style="width: 100%;">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Número Referencia </th>
                                                    <th>Cliente</th>
                                                    <th>Mercado </th>
                                                    <th>Contenedor </th>
                                                    <th>Tipo Despacho </th>
                                                    <th>Número Despacho </th>
                                                    <th>Fecha Despacho </th>
                                                    <th>Número Guía Despacho </th>
                                                    <th>Destino </th>
                                                    <th>Fecha Corte Documental </th>
                                                    <th>Fecha ETD </th>
                                                    <th>Fecha ETA</th>
                                                    <th>Fecha Real ETA</th>
                                                    <th>Recibidor Final</th>
                                                    <th>Tipo Embarque</th>
                                                    <th>Nave</th>
                                                    <th>Número Viaje/Vuelo</th>
                                                    <th>Puerto/Aeropuerto/Lugar Destino</th>
                                                    <th>N° Folio Original</th>
                                                    <th>N° Folio </th>
                                                    <th>Fecha Embalado </th>
                                                    <th>Condición </th>
                                                    <th>Tipo Producto </th>
                                                    <th>Código Estandar</th>
                                                    <th>Envase/Estandar</th>
                                                    <th>CSG</th>
                                                    <th>Productor</th>
                                                    <th>Especies</th>
                                                    <th>Variedad</th>
                                                    <th>Cantidad Envase</th>
                                                    <th>Kilos Neto</th>
                                                    <th>% Deshidratacion</th>
                                                    <th>Kilos Deshidratacion</th>
                                                    <th>Kilos Bruto</th>
                                                    <th>Número Recepción </th>
                                                    <th>Fecha Recepción </th>
                                                    <th>Tipo Recepción </th>
                                                    <th>Número Guía Recepción </th>
                                                    <th>Fecha Guía Recepción
                                                    <th>Número Repaletizaje </th>
                                                    <th>Fecha Repaletizaje </th>
                                                    <th>Número Proceso </th>
                                                    <th>Fecha Proceso </th>
                                                    <th>Tipo Proceso </th>
                                                    <th>Número Reembalaje </th>
                                                    <th>Fecha Reembalaje </th>
                                                    <th>Tipo Reembalaje </th>
                                                    <th>Tipo Manejo</th>
                                                    <th>Tipo Calibre </th>
                                                    <th>Tipo Embalaje </th>
                                                    <th>Stock</th>
                                                    <th>Embolsado</th>
                                                    <th>Gasificacion</th>
                                                    <th>Prefrío</th>
                                                    <th>Transporte </th>
                                                    <th>Nombre Conductor </th>
                                                    <th>Patente Camión </th>
                                                    <th>Patente Carro </th>
                                                    <th>Semana Despacho </th>
                                                    <th>Semana Guía </th>
                                                    <th>Empresa</th>
                                                    <th>Planta</th>
                                                    <th>Temporada</th>
                                                    <th>% Exportación Proceso</th>
                                                    <th>% Industrial Proceso</th>
                                                    <th>Total Procesado</th>
                                                    <th>Planta Proceso</th>  
                                                    <th>Bl/AWB</th>
                                                    <th>Número Recepción MP</th>
                                                    <th>Fecha Recepción MP</th>
                                                    <th>Tipo Recepción MP</th>
                                                    <th>Número Guía Recepción MP</th>
                                                    <th>Fecha Guía Recepción MP </th>
                                                    <th>Planta Recepción MP</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($ARRAYDESPACHOPT as $r) : ?>
                                                    <?php
                                                    if ($r['ESTADO_DESPACHO'] == "1") {
                                                        $ESTADODESPACHO = "Por Confirmar";
                                                    }
                                                    if ($r['ESTADO_DESPACHO'] == "2") {
                                                        $ESTADODESPACHO = "Confirmado";
                                                    }
                                                    if ($r['ESTADO_DESPACHO'] == "3") {
                                                        $ESTADODESPACHO = "Rechazado";
                                                    }
                                                    if ($r['ESTADO_DESPACHO'] == "4") {
                                                        $ESTADODESPACHO = "Aprobado";
                                                    }
                                                    if ($r['TDESPACHO'] == "1") {
                                                        $TDESPACHO = "Interplanta";
                                                        $NUMEROGUIADEPACHO=$r["NUMERO_GUIA_DESPACHO"];
                                                        $ARRAYPLANTA2 = $PLANTA_ADO->verPlanta($r['ID_PLANTA2']);
                                                        if ($ARRAYPLANTA2) {
                                                            $DESTINO = $ARRAYPLANTA2[0]['NOMBRE_PLANTA'];
                                                        } else {
                                                            $DESTINO = "Sin Datos";
                                                        }
                                                    }
                                                    if ($r['TDESPACHO'] == "2") {
                                                        $NUMEROGUIADEPACHO=$r["NUMERO_GUIA_DESPACHO"];
                                                        $TDESPACHO = "Devolución Productor";
                                                        $ARRAYPRODUCTOR = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);
                                                        if ($ARRAYPRODUCTOR) {
                                                            $DESTINO = $ARRAYPRODUCTOR[0]['CSG_PRODUCTOR'] . ":" . $ARRAYPRODUCTOR[0]['NOMBRE_PRODUCTOR'];
                                                        } else {
                                                            $DESTINO = "Sin Datos";
                                                        }
                                                    }
                                                    if ($r['TDESPACHO'] == "3") {
                                                        $TDESPACHO = "Venta";
                                                        $NUMEROGUIADEPACHO=$r["NUMERO_GUIA_DESPACHO"];
                                                        $ARRAYCOMPRADOR = $COMPRADOR_ADO->verComprador($r['ID_COMPRADOR']);
                                                        if ($ARRAYCOMPRADOR) {
                                                            $DESTINO = $ARRAYCOMPRADOR[0]['NOMBRE_COMPRADOR'];
                                                        } else {
                                                            $DESTINO = "Sin Datos";
                                                        }
                                                    }
                                                    if ($r['TDESPACHO'] == "4") {
                                                        $TDESPACHO = "Despacho de Descarte";
                                                        $NUMEROGUIADEPACHO="No Aplica";
                                                        $DESTINO = $r['REGALO_DESPACHO'];
                                                    }
                                                    if ($r['TDESPACHO'] == "5") {
                                                        $TDESPACHO = "Planta Externa";
                                                        $NUMEROGUIADEPACHO=$r["NUMERO_GUIA_DESPACHO"];
                                                        $ARRAYPLANTA2 = $PLANTA_ADO->verPlanta($r['ID_PLANTA3']);
                                                        if ($ARRAYPLANTA2) {
                                                            $DESTINO = $ARRAYPLANTA2[0]['NOMBRE_PLANTA'];
                                                        } else {
                                                            $DESTINO = "Sin Datos";
                                                        }
                                                    }
                                                    $ARRAYVERTRANSPORTE = $TRANSPORTE_ADO->verTransporte($r['ID_TRANSPORTE']);
                                                    if ($ARRAYVERTRANSPORTE) {
                                                        $NOMBRETRANSPORTE = $ARRAYVERTRANSPORTE[0]['NOMBRE_TRANSPORTE'];
                                                    } else {
                                                        $NOMBRETRANSPORTE = "Sin Datos";
                                                    }
                                                    $ARRAYVERCONDUCTOR = $CONDUCTOR_ADO->verConductor($r['ID_CONDUCTOR']);
                                                    if ($ARRAYVERCONDUCTOR) {

                                                        $NOMBRECONDUCTOR = $ARRAYVERCONDUCTOR[0]['NOMBRE_CONDUCTOR'];
                                                    } else {
                                                        $NOMBRECONDUCTOR = "Sin Datos";
                                                    }

                                                    $ARRAYEMPRESA = $EMPRESA_ADO->verEmpresa($r['ID_EMPRESA']);
                                                    if ($ARRAYEMPRESA) {
                                                        $NOMBREEMPRESA = $ARRAYEMPRESA[0]['NOMBRE_EMPRESA'];
                                                    } else {
                                                        $NOMBREEMPRESA = "Sin Datos";
                                                    }
                                                    $ARRAYPLANTA = $PLANTA_ADO->verPlanta($r['ID_PLANTA']);
                                                    if ($ARRAYPLANTA) {
                                                        $NOMBREPLANTA = $ARRAYPLANTA[0]['NOMBRE_PLANTA'];
                                                    } else {
                                                        $NOMBREPLANTA = "Sin Datos";
                                                    }
                                                    $ARRAYTEMPORADA = $TEMPORADA_ADO->verTemporada($r['ID_TEMPORADA']);
                                                    if ($ARRAYTEMPORADA) {
                                                        $NOMBRETEMPORADA = $ARRAYTEMPORADA[0]['NOMBRE_TEMPORADA'];
                                                    } else {
                                                        $NOMBRETEMPORADA = "Sin Datos";
                                                    }

                                                    $ARRAYTOMADO = $EXIEXPORTACION_ADO->buscarPordespacho($r['ID_DESPACHO']);
                                                    ?>
                                                    <?php foreach ($ARRAYTOMADO as $s) : ?>
                                                        <?php

                                                        if ($s['TESTADOSAG'] == null || $s['TESTADOSAG'] == "0") {
                                                            $ESTADOSAG = "Sin Condición";
                                                        }
                                                        if ($s['TESTADOSAG'] == "1") {
                                                            $ESTADOSAG =  "En Inspección";
                                                        }
                                                        if ($s['TESTADOSAG'] == "2") {
                                                            $ESTADOSAG =  "Aprobado Origen";
                                                        }
                                                        if ($s['TESTADOSAG'] == "3") {
                                                            $ESTADOSAG =  "Aprobado USLA";
                                                        }
                                                        if ($s['TESTADOSAG'] == "4") {
                                                            $ESTADOSAG =  "Fumigado";
                                                        }
                                                        if ($s['TESTADOSAG'] == "5") {
                                                            $ESTADOSAG =  "Rechazado";
                                                        }
                                                        $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($s['ID_PRODUCTOR']);
                                                        if ($ARRAYVERPRODUCTORID) {
                                                            $CSGPRODUCTOR = $ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'];
                                                            $NOMBREPRODUCTOR = $ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'];
                                                        } else {
                                                            $CSGPRODUCTOR = "Sin Datos";
                                                            $NOMBREPRODUCTOR = "Sin Datos";
                                                        }
                                                        $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($s['ID_VESPECIES']);
                                                        if ($ARRAYVERVESPECIESID) {
                                                            $NOMBREVARIEDAD = $ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'];
                                                            $ARRAYVERESPECIESID = $ESPECIES_ADO->verEspecies($ARRAYVERVESPECIESID[0]['ID_ESPECIES']);
                                                            if ($ARRAYVERVESPECIESID) {
                                                                $NOMBRESPECIES = $ARRAYVERESPECIESID[0]['NOMBRE_ESPECIES'];
                                                            } else {
                                                                $NOMBRESPECIES = "Sin Datos";
                                                            }
                                                        } else {
                                                            $NOMBREVARIEDAD = "Sin Datos";
                                                            $NOMBRESPECIES = "Sin Datos";
                                                        }
                                                        $ARRAYEVERERECEPCIONID = $EEXPORTACION_ADO->verEstandar($s['ID_ESTANDAR']);
                                                        if ($ARRAYEVERERECEPCIONID) {
                                                            $CODIGOESTANDAR = $ARRAYEVERERECEPCIONID[0]['CODIGO_ESTANDAR'];
                                                            $NOMBREESTANDAR = $ARRAYEVERERECEPCIONID[0]['NOMBRE_ESTANDAR'];
                                                        } else {
                                                            $NOMBREESTANDAR = "Sin Datos";
                                                            $CODIGOESTANDAR = "Sin Datos";
                                                        }
                                                        $ARRAYTMANEJO = $TMANEJO_ADO->verTmanejo($s['ID_TMANEJO']);
                                                        if ($ARRAYTMANEJO) {
                                                            $NOMBRETMANEJO = $ARRAYTMANEJO[0]['NOMBRE_TMANEJO'];
                                                        } else {
                                                            $NOMBRETMANEJO = "Sin Datos";
                                                        }
                                                        $ARRAYTCALIBRE = $TCALIBRE_ADO->verCalibre($s['ID_TCALIBRE']);
                                                        if ($ARRAYTCALIBRE) {
                                                            $NOMBRETCALIBRE = $ARRAYTCALIBRE[0]['NOMBRE_TCALIBRE'];
                                                        } else {
                                                            $NOMBRETCALIBRE = "Sin Datos";
                                                        }
                                                        $ARRAYTEMBALAJE = $TEMBALAJE_ADO->verEmbalaje($s['ID_TEMBALAJE']);
                                                        if ($ARRAYTEMBALAJE) {
                                                            $NOMBRETEMBALAJE = $ARRAYTEMBALAJE[0]['NOMBRE_TEMBALAJE'];
                                                        } else {
                                                            $NOMBRETEMBALAJE = "Sin Datos";
                                                        }                                                                                                                                                                   
                                                        if ($s['STOCK'] != "") {
                                                            $STOCK = $s['STOCK'] ;
                                                        } else if ($s['STOCK'] == "") {
                                                            $STOCK = "Sin Datos";
                                                        } else {
                                                            $STOCK = "Sin Datos";
                                                        }                                                        
                                                        if ($s['EMBOLSADO'] == "1") {
                                                            $EMBOLSADO =  "SI";
                                                        }
                                                        if ($s['EMBOLSADO'] == "0") {
                                                            $EMBOLSADO =  "NO";
                                                        }                                                                                                                                                
                                                        if ($s['GASIFICADO'] == "1") {
                                                            $GASIFICADO = "SI";
                                                        } else if ($s['GASIFICADO'] == "0") {
                                                            $GASIFICADO = "NO";
                                                        } else {
                                                            $GASIFICADO = "Sin Datos";
                                                        }                                                   
                                                        if ($s['PREFRIO'] == "0") {
                                                            $PREFRIO = "NO";
                                                        } else if ($s['PREFRIO'] == "1") {
                                                            $PREFRIO =  "SI";
                                                        } else {
                                                            $PREFRIO = "Sin Datos";
                                                        } 

                                                        if ($s['PRECIO_PALLET']) {
                                                            $TOTALPRECIO = $s['PRECIO_PALLET'] * $s['CANTIDAD_ENVASE_EXIEXPORTACION'];
                                                        }
                                                        $ARRAYRECEPCION = $RECEPCIONPT_ADO->verRecepcion2($s['ID_RECEPCION']);
                                                        $ARRAYDESPACHO2 = $DESPACHOPT_ADO->verDespachopt($s['ID_DESPACHO2']);
                                                        if ($ARRAYRECEPCION) {
                                                            $NUMERORECEPCION = $ARRAYRECEPCION[0]["NUMERO_RECEPCION"];
                                                            $FECHARECEPCION = $ARRAYRECEPCION[0]["FECHA"];
                                                            $NUMEROGUIARECEPCION = $ARRAYRECEPCION[0]["NUMERO_GUIA_RECEPCION"];
                                                            $FECHAGUIARECEPCION = $ARRAYRECEPCION[0]["GUIA"];
                                                            if ($ARRAYRECEPCION[0]["TRECEPCION"] == 1) {
                                                                $TIPORECEPCION = "Desde Productor";
                                                            }
                                                            if ($ARRAYRECEPCION[0]["TRECEPCION"] == 2) {
                                                                $TIPORECEPCION = "Planta Externa";
                                                            }
                                                        }else if($ARRAYDESPACHO2){
                                                                
                                                            $NUMERORECEPCION = $ARRAYDESPACHO2[0]["NUMERO_DESPACHO"];
                                                            $FECHARECEPCION = $ARRAYDESPACHO2[0]["FECHA"];                                                                
                                                            $NUMEROGUIARECEPCION = $ARRAYDESPACHO2[0]["NUMERO_GUIA_DESPACHO"];
                                                            $TIPORECEPCION = "Interplanta";
                                                            $FECHAGUIARECEPCION = "";                                                                
                                                            $ARRAYPLANTA2 = $PLANTA_ADO->verPlanta($ARRAYDESPACHO2[0]['ID_PLANTA']);
                                                            if ($ARRAYPLANTA2) {
                                                                $ORIGEN = $ARRAYPLANTA2[0]['NOMBRE_PLANTA'];
                                                                $CSGCSPORIGEN=$ARRAYPLANTA2[0]['CODIGO_SAG_PLANTA'];
                                                            } else {
                                                                $ORIGEN = "Sin Datos";
                                                                $CSGCSPORIGEN="Sin Datos";
                                                            }                                                        
                                                        } else {
                                                            $NUMERORECEPCION = "Sin Datos";
                                                            $FECHARECEPCION = "";
                                                            $NUMEROGUIARECEPCION = "Sin Datos";
                                                            $FECHAGUIARECEPCION = "";
                                                            $TIPORECEPCION = "Sin Datos";
                                                        }
                                                        $ARRAYPROCESO = $PROCESO_ADO->verProceso2($s['ID_PROCESO']);
                                                        $ARRAYBUSCARPROCESOORIGEN = $EXIEXPORTACION_ADO->buscarProcesoOrigenRepaletizaje($s['FOLIO_EXIEXPORTACION'],$s['FOLIO_AUXILIAR_EXIEXPORTACION'],$s['CANTIDAD_ENVASE_EXIEXPORTACION']);
                                                        if ($ARRAYPROCESO) {
                                                            $NUMEROPROCESO = $ARRAYPROCESO[0]["NUMERO_PROCESO"];
                                                            $FECHAPROCESO = $ARRAYPROCESO[0]["FECHA"];
                                                            $PORCENTAJEEXPO = number_format($ARRAYPROCESO[0]["PDEXPORTACION_PROCESO"], 2);
                                                            $PORCENTAJEINDUSTRIAL = number_format($ARRAYPROCESO[0]["PDINDUSTRIAL_PROCESO"], 2);
                                                            $PORCENTAJETOTAL = number_format($ARRAYPROCESO[0]["PORCENTAJE_PROCESO"], 2);
                                                            $ARRAYTPROCESO = $TPROCESO_ADO->verTproceso($ARRAYPROCESO[0]["ID_TPROCESO"]);
                                                            if ($ARRAYTPROCESO) {
                                                                $TPROCESO = $ARRAYTPROCESO[0]["NOMBRE_TPROCESO"];
                                                            }  
                                                            $ARRAYVERPLANTA = $PLANTA_ADO->verPlanta($ARRAYPROCESO[0]['ID_PLANTA']);
                                                            if ($ARRAYVERPLANTA) {
                                                                $NOMBREPLANTAPROCESO = $ARRAYVERPLANTA[0]['NOMBRE_PLANTA'];
                                                            } else {
                                                                $NOMBREPLANTAPROCESO = "Sin Datos";
                                                            }
                                                        }else if ($ARRAYBUSCARPROCESOORIGEN){
                                                            if($ARRAYBUSCARPROCESOORIGEN[0]["ID_PROCESO"]!=null){    
                                                                $NUMEROPROCESO = $ARRAYBUSCARPROCESOORIGEN[0]["NUMERO"];
                                                                $FECHAPROCESO = $ARRAYBUSCARPROCESOORIGEN[0]["FECHA"];
                                                                $PORCENTAJEEXPO = number_format($ARRAYBUSCARPROCESOORIGEN[0]["PEXPO"], 2);
                                                                $PORCENTAJEINDUSTRIAL = number_format($ARRAYBUSCARPROCESOORIGEN[0]["PIND"], 2);
                                                                $PORCENTAJETOTAL = number_format($ARRAYBUSCARPROCESOORIGEN[0]["PTOTAL"], 2);
                                                                $TPROCESO = $ARRAYBUSCARPROCESOORIGEN[0]["TPROCESO"];    
                                                                $NOMBREPLANTAPROCESO =$ARRAYBUSCARPROCESOORIGEN[0]["PLANTA"];   
                                                            }else{                                                                
                                                                $NUMEROPROCESO = "Sin Datos";
                                                                $PORCENTAJEEXPO = "Sin Datos";
                                                                $PORCENTAJEINDUSTRIAL = "Sin Datos";
                                                                $PORCENTAJETOTAL = "Sin Datos";
                                                                $FECHAPROCESO = "";
                                                                $TPROCESO = "Sin Datos";   
                                                                $NOMBREPLANTAPROCESO = "Sin Datos";  
                                                            }
                                                        }else {
                                                            $NUMEROPROCESO = "Sin Datos";
                                                            $PORCENTAJEEXPO = "Sin Datos";
                                                            $PORCENTAJEINDUSTRIAL = "Sin Datos";
                                                            $PORCENTAJETOTAL = "Sin Datos";
                                                            $FECHAPROCESO = "";
                                                            $TPROCESO = "Sin Datos";   
                                                            $NOMBREPLANTAPROCESO = "Sin Datos";                                                                  
                                                        }
                                                        $ARRAYREEMBALAJE = $REEMBALAJE_ADO->verReembalaje2($s['ID_REEMBALAJE']);
                                                        if ($ARRAYREEMBALAJE) {
                                                            $NUMEROREEMBALEJE = $ARRAYREEMBALAJE[0]["ID_TREEMBALAJE"];
                                                            $FECHAREEMBALEJE = $ARRAYREEMBALAJE[0]["FECHA"];
                                                            $ARRAYTREEMBALAJE = $TREEMBALAJE_ADO->verTreembalaje($ARRAYREEMBALAJE[0]["ID_TREEMBALAJE"]);
                                                            if ($ARRAYTREEMBALAJE) {
                                                                $TREEMBALAJE = $ARRAYTREEMBALAJE[0]["NOMBRE_TREEMBALAJE"];
                                                            }
                                                        } else {
                                                            $NUMEROREEMBALEJE = "Sin Datos";
                                                            $FECHAREEMBALEJE = "";
                                                            $TREEMBALAJE = "Sin Datos";
                                                        }
                                                        $ARRAYRECEPCIONMPORIGEN1=$PROCESO_ADO->buscarRecepcionMpExistenciaEnProceso($s['ID_PROCESO']);
                                                        $ARRAYRECEPCIONMPORIGEN2=$REEMBALAJE_ADO->buscarProcesoRecepcionMpExistenciaEnReembalaje($s['ID_REEMBALAJE']);
                                                        if($ARRAYRECEPCIONMPORIGEN1){                                                                
                                                            $NUMERORECEPCIONMP = $ARRAYRECEPCIONMPORIGEN1[0]["NUMERO"];
                                                            $FECHARECEPCIONMP = $ARRAYRECEPCIONMPORIGEN1[0]["FECHA"];
                                                            $NUMEROGUIARECEPCIONMP = $ARRAYRECEPCIONMPORIGEN1[0]["NUMEROGUIA"];
                                                            $FECHAGUIARECEPCIONMP = $ARRAYRECEPCIONMPORIGEN1[0]["FECHAGUIA"];
                                                            $TIPORECEPCIONMP = $ARRAYRECEPCIONMPORIGEN1[0]["TRECEPCION"];
                                                            $ORIGENRECEPCIONMP = $ARRAYRECEPCIONMPORIGEN1[0]["ORIGEN"];
                                                            $PLANTARECEPCIONMP = $ARRAYRECEPCIONMPORIGEN1[0]["PLANTA"];

                                                        }else if($ARRAYRECEPCIONMPORIGEN2){                                                                
                                                            $NUMERORECEPCIONMP = $ARRAYRECEPCIONMPORIGEN2[0]["NUMERO"];
                                                            $FECHARECEPCIONMP = $ARRAYRECEPCIONMPORIGEN2[0]["FECHA"];
                                                            $NUMEROGUIARECEPCIONMP = $ARRAYRECEPCIONMPORIGEN2[0]["NUMEROGUIA"];
                                                            $FECHAGUIARECEPCIONMP = $ARRAYRECEPCIONMPORIGEN2[0]["FECHAGUIA"];
                                                            $TIPORECEPCIONMP = $ARRAYRECEPCIONMPORIGEN2[0]["TRECEPCION"];
                                                            $ORIGENRECEPCIONMP = $ARRAYRECEPCIONMPORIGEN2[0]["ORIGEN"];
                                                            $PLANTARECEPCIONMP = $ARRAYRECEPCIONMPORIGEN2[0]["PLANTA"];

                                                        }else{
                                                            $NUMERORECEPCIONMP = "Sin Datos";
                                                            $FECHARECEPCIONMP = "";
                                                            $NUMEROGUIARECEPCIONMP = "Sin Datos"; 
                                                            $FECHAGUIARECEPCIONMP = "";
                                                            $TIPORECEPCIONMP = "Sin Datos";
                                                            $ORIGENRECEPCIONMP = "Sin Datos";
                                                            $PLANTARECEPCIONMP = "Sin Datos";
                                                        }

                                                        $ARRATREPALETIZAJE = $REPALETIZAJEEX_ADO->verRepaletizaje2($s['ID_REPALETIZAJE']);
                                                        if ($ARRATREPALETIZAJE) {
                                                            $FECHAREPALETIZAJE = $ARRATREPALETIZAJE[0]["INGRESO"];
                                                            $NUMEROREPALETIZAJE = $ARRATREPALETIZAJE[0]["NUMERO_REPALETIZAJE"];
                                                        } else {
                                                            $NUMEROREPALETIZAJE = "Sin Datos";
                                                            $FECHAREPALETIZAJE = "";
                                                        }
                                                        ?>
                                                        <tr class="text-center">

                                                            <td><?php echo "No Aplica"; ?></td>
                                                            <td><?php echo "No Aplica"; ?></td>
                                                            <td><?php echo "No Aplica"; ?></td>
                                                            <td><?php echo "No Aplica"; ?></td>
                                                            <td><?php echo $TDESPACHO; ?></td>
                                                            <td><?php echo $r['NUMERO_DESPACHO']; ?> </td>
                                                            <td><?php echo $r['FECHA']; ?></td>
                                                            <td><?php echo $NUMEROGUIADEPACHO; ?></td>
                                                            <td><?php echo $DESTINO; ?></td>     
                                                            <td><?php echo ""; ?></td>
                                                            <td><?php echo ""; ?></td>
                                                            <td><?php echo ""; ?></td>
                                                            <td><?php echo ""; ?></td>
                                                            <td><?php echo "No Aplica"; ?></td>
                                                            <td><?php echo "No Aplica"; ?></td>
                                                            <td><?php echo "No Aplica"; ?></td>
                                                            <td><?php echo "No Aplica"; ?></td>
                                                            <td><?php echo "No Aplica"; ?></td>
                                                            <td><?php echo $s['FOLIO_EXIEXPORTACION']; ?> </td>
                                                            <td><?php echo $s['FOLIO_AUXILIAR_EXIEXPORTACION']; ?> </td>
                                                            <td><?php echo $s['EMBALADO']; ?></td>
                                                            <td><?php echo $ESTADOSAG; ?></td>
                                                            <td><?php echo "Producto Terminado"; ?> </td>
                                                            <td><?php echo $CODIGOESTANDAR; ?></td>
                                                            <td><?php echo $NOMBREESTANDAR; ?></td>
                                                            <td><?php echo $CSGPRODUCTOR; ?></td>
                                                            <td><?php echo $NOMBREPRODUCTOR; ?></td>
                                                            <td><?php echo $NOMBRESPECIES; ?></td>
                                                            <td><?php echo $NOMBREVARIEDAD; ?></td>                                                
                                                            <td><?php echo $s['ENVASE']; ?></td>
                                                            <td><?php echo $s['NETO']; ?></td>
                                                            <td><?php echo $s['PORCENTAJE']; ?></td>
                                                            <td><?php echo $s['DESHIRATACION']; ?></td>
                                                            <td><?php echo $s['BRUTO']; ?></td>
                                                            <td><?php echo $NUMERORECEPCION; ?></td>
                                                            <td><?php echo $FECHARECEPCION; ?></td>                                                            
                                                            <td><?php echo $TIPORECEPCION; ?></td>
                                                            <td><?php echo $NUMEROGUIARECEPCION; ?></td>
                                                            <td><?php echo $FECHAGUIARECEPCION; ?></td>
                                                            <td><?php echo $NUMEROREPALETIZAJE; ?></td>
                                                            <td><?php echo $FECHAREPALETIZAJE; ?></td>
                                                            <td><?php echo $NUMEROPROCESO; ?></td>
                                                            <td><?php echo $FECHAPROCESO; ?></td>
                                                            <td><?php echo $TPROCESO; ?></td>
                                                            <td><?php echo $NUMEROREEMBALEJE; ?></td>
                                                            <td><?php echo $FECHAREEMBALEJE; ?></td>
                                                            <td><?php echo $TREEMBALAJE; ?></td>
                                                            <td><?php echo $NOMBRETMANEJO; ?></td>
                                                            <td><?php echo $NOMBRETCALIBRE; ?></td>
                                                            <td><?php echo $NOMBRETEMBALAJE; ?></td>
                                                            <td><?php echo $STOCK; ?></td>
                                                            <td><?php echo $EMBOLSADO; ?></td>
                                                            <td><?php echo $GASIFICADO; ?></td>
                                                            <td><?php echo $PREFRIO; ?></td>
                                                            <td><?php echo $NOMBRETRANSPORTE; ?></td>
                                                            <td><?php echo $NOMBRECONDUCTOR; ?></td>
                                                            <td><?php echo $r['PATENTE_CAMION']; ?></td>
                                                            <td><?php echo $r['PATENTE_CARRO']; ?></td>      
                                                            <td><?php echo $r['SEMANA']; ?></td>                             
                                                            <td><?php echo ""; ?></td>
                                                            <td><?php echo $NOMBREEMPRESA; ?></td>
                                                            <td><?php echo $NOMBREPLANTA; ?></td>
                                                            <td><?php echo $NOMBRETEMPORADA; ?></td>
                                                            <td><?php echo $PORCENTAJEEXPO; ?></td>
                                                            <td><?php echo $PORCENTAJEINDUSTRIAL; ?></td>
                                                            <td><?php echo $PORCENTAJETOTAL; ?></td>      
                                                            <td><?php echo $NOMBREPLANTAPROCESO; ?></td>     
                                                            <td><?php echo "No Aplica"; ?></td>                       
                                                            <td><?php echo $NUMERORECEPCIONMP; ?></td>
                                                            <td><?php echo $FECHARECEPCIONMP; ?></td>
                                                            <td><?php echo $TIPORECEPCIONMP; ?></td>
                                                            <td><?php echo $NUMEROGUIARECEPCIONMP; ?></td>
                                                            <td><?php echo $FECHAGUIARECEPCIONMP; ?></td>
                                                            <td><?php echo $PLANTARECEPCIONMP; ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php endforeach;?>                                                
                                                <?php  foreach ($ARRAYDESPACHOEX as $r) : ?>
                                                    <?php
                                                    $ARRAYVERTRANSPORTE = $TRANSPORTE_ADO->verTransporte($r['ID_TRANSPORTE']);
                                                    if ($ARRAYVERTRANSPORTE) {
                                                        $NOMBRETRANSPORTE = $ARRAYVERTRANSPORTE[0]['NOMBRE_TRANSPORTE'];
                                                    } else {
                                                        $NOMBRETRANSPORTE = "Sin Datos";
                                                    }
                                                    $ARRAYVERCONDUCTOR = $CONDUCTOR_ADO->verConductor($r['ID_CONDUCTOR']);
                                                    if ($ARRAYVERCONDUCTOR) {

                                                        $NOMBRECONDUCTOR = $ARRAYVERCONDUCTOR[0]['NOMBRE_CONDUCTOR'];
                                                    } else {
                                                        $NOMBRECONDUCTOR = "Sin Datos";
                                                    }

                                                    $ARRAYDFINAL = $DFINAL_ADO->verDfinal($r['ID_DFINAL']);
                                                    if ($ARRAYDFINAL) {
                                                        $DESTINO = $ARRAYDFINAL[0]['NOMBRE_DFINAL'];
                                                    } else {
                                                        $DESTINO = "Sin Datos";
                                                    }

                                                    $ARRAYEMPRESA = $EMPRESA_ADO->verEmpresa($r['ID_EMPRESA']);
                                                    if ($ARRAYEMPRESA) {
                                                        $NOMBREEMPRESA = $ARRAYEMPRESA[0]['NOMBRE_EMPRESA'];
                                                    } else {
                                                        $NOMBREEMPRESA = "Sin Datos";
                                                    }
                                                    $ARRAYPLANTA = $PLANTA_ADO->verPlanta($r['ID_PLANTA']);
                                                    if ($ARRAYPLANTA) {
                                                        $NOMBREPLANTA = $ARRAYPLANTA[0]['NOMBRE_PLANTA'];
                                                    } else {
                                                        $NOMBREPLANTA = "Sin Datos";
                                                    }
                                                    $ARRAYTEMPORADA = $TEMPORADA_ADO->verTemporada($r['ID_TEMPORADA']);
                                                    if ($ARRAYTEMPORADA) {
                                                        $NOMBRETEMPORADA = $ARRAYTEMPORADA[0]['NOMBRE_TEMPORADA'];
                                                    } else {
                                                        $NOMBRETEMPORADA = "Sin Datos";
                                                    }                                         
                                                    $ARRAYICARGA=$ICARGA_ADO->verIcarga($r["ID_ICARGA"]);
                                                    if($ARRAYICARGA){
                                                        $BOLAWBCRTICARGA=$ARRAYICARGA[0]['BOLAWBCRT_ICARGA'];
                                                        $NUMEROREFERENCIA=$ARRAYICARGA[0]['NREFERENCIA_ICARGA'];
                                                        $FECHAETD=$ARRAYICARGA[0]['FECHAETD_ICARGA'];
                                                        $FECHAETA=$ARRAYICARGA[0]['FECHAETA_ICARGA'];
                                                        $FECHAETAREAL=$ARRAYICARGA[0]['FECHAETAREAL_ICARGA'];
                                                        $FECHACDOCUMENTAL=$ARRAYICARGA[0]['FECHA_CDOCUMENTAL_ICARGA'];
                                                        if ($ARRAYICARGA[0]['TEMBARQUE_ICARGA'] == "1") {
                                                            $TEMBARQUE = "Terrestre";
                                                            $NVIAJE="No Aplica";
                                                            $NAVE="No Aplica";  
                                                            $ARRAYLDESTINO =$LDESTINO_ADO->verLdestino( $ARRAYICARGA[0]['ID_LDESTINO']);     
                                                            if($ARRAYLDESTINO){
                                                              $NOMBREDESTINO=$ARRAYLDESTINO[0]["NOMBRE_LDESTINO"];
                                                            }else{
                                                              $NOMBREDESTINO="Sin Datos";
                                                            }
                                                        }
                                                        if ($ARRAYICARGA[0]['TEMBARQUE_ICARGA'] == "2") {
                                                            $TEMBARQUE = "Aereo";
                                                            $NAVE=$ARRAYICARGA[0]['NAVE_ICARGA'];
                                                            $NVIAJE = $ARRAYICARGA[0]['NVIAJE_ICARGA'];
                                                            $ARRAYADESTINO =$ADESTINO_ADO->verAdestino( $ARRAYICARGA[0]['ID_ADESTINO']);  
                                                            if($ARRAYADESTINO){
                                                              $NOMBREDESTINO=$ARRAYADESTINO[0]["NOMBRE_ADESTINO"];
                                                            }else{
                                                              $NOMBREDESTINO="Sin Datos";
                                                            }
                                                        }
                                                        if ($ARRAYICARGA[0]['TEMBARQUE_ICARGA'] == "3") {
                                                            $TEMBARQUE = "Maritimo";
                                                            $NAVE  = $ARRAYICARGA[0]['NAVE_ICARGA'];
                                                            $NVIAJE = $ARRAYICARGA[0]['NVIAJE_ICARGA'];
                                                            $ARRAYPDESTINO =$PDESTINO_ADO->verPdestino( $ARRAYICARGA[0]['ID_PDESTINO']);
                                                            if($ARRAYPDESTINO){
                                                              $NOMBREDESTINO=$ARRAYPDESTINO[0]["NOMBRE_PDESTINO"];
                                                            }else{
                                                              $NOMBREDESTINO="Sin Datos";
                                                            }
                                                        }
                                                        $ARRAYMERCADO=$MERCADO_ADO->verMercado($ARRAYICARGA[0]["ID_MERCADO"]);
                                                        if($ARRAYMERCADO){
                                                            $NOMBREMERCADO=$ARRAYMERCADO[0]["NOMBRE_MERCADO"];
                                                        }else{
                                                            $NOMBREMERCADO="Sin Datos";
                                                        }
                                                        $ARRAYRFINAL=$RFINAL_ADO->verRfinal($ARRAYICARGA[0]["ID_RFINAL"]);
                                                        if($ARRAYRFINAL){
                                                            $NOMBRERFINAL=$ARRAYRFINAL[0]["NOMBRE_RFINAL"];
                                                        }else{
                                                            $NOMBRERFINAL="Sin Datos";
                                                        }
                                                        $ARRAYBROKER=$BROKER_ADO->verBroker($ARRAYICARGA[0]["ID_BROKER"]);
                                                        if($ARRAYBROKER){
                                                            $NOMBREBROKER=$ARRAYBROKER[0]["NOMBRE_BROKER"];
                                                        }else{
                                                            $NOMBREBROKER="Sin Datos";
                                                        }

                                                    }else{
                                                        $NUMEROREFERENCIA="No Aplica";
                                                        $NOMBREBROKER="No Aplica";
                                                        $BOLAWBCRTICARGA="No Aplica";
                                                        $FECHAETD=$r['FECHAETD_DESPACHOEX'];
                                                        $FECHAETA=$r['FECHAETA_DESPACHOEX'];
                                                        $FECHAETAREAL="";
                                                        $FECHACDOCUMENTAL="";
                                                        if ($r['TEMBARQUE_DESPACHOEX'] == "1") {
                                                            $TEMBARQUE = "Terrestre";
                                                            $NVIAJE="No Aplica";
                                                            $NAVE="No Aplica";  
                                                            $ARRAYLDESTINO =$LDESTINO_ADO->verLdestino( $r['ID_LDESTINO']);     
                                                            if($ARRAYLDESTINO){
                                                              $NOMBREDESTINO=$ARRAYLDESTINO[0]["NOMBRE_LDESTINO"];
                                                            }else{
                                                              $NOMBREDESTINO="Sin Datos";
                                                            }
                                                        }
                                                        if ($r['TEMBARQUE_DESPACHOEX'] == "2") {
                                                            $TEMBARQUE = "Aereo";
                                                            $NAVE=$r['NAVE_DESPACHOEX'];
                                                            $NVIAJE = $r['NVIAJE_DESPACHOEX'];
                                                            $ARRAYADESTINO =$ADESTINO_ADO->verAdestino( $r['ID_ADESTINO']);  
                                                            if($ARRAYADESTINO){
                                                              $NOMBREDESTINO=$ARRAYADESTINO[0]["NOMBRE_ADESTINO"];
                                                            }else{
                                                              $NOMBREDESTINO="Sin Datos";
                                                            }
                                                        }
                                                        if ($r['TEMBARQUE_DESPACHOEX'] == "3") {
                                                            $TEMBARQUE = "Maritimo";
                                                            $NAVE  = $r['NAVE_DESPACHOEX'];
                                                            $NVIAJE = $r['NVIAJE_DESPACHOEX'];
                                                            $ARRAYPDESTINO =$PDESTINO_ADO->verPdestino( $r['ID_PDESTINO']);
                                                            if($ARRAYPDESTINO){
                                                              $NOMBREDESTINO=$ARRAYPDESTINO[0]["NOMBRE_PDESTINO"];
                                                            }else{
                                                              $NOMBREDESTINO="Sin Datos";
                                                            }
                                                        }
                                                        $ARRAYMERCADO=$MERCADO_ADO->verMercado($r["ID_MERCADO"]);
                                                        if($ARRAYMERCADO){
                                                            $NOMBREMERCADO=$ARRAYMERCADO[0]["NOMBRE_MERCADO"];
                                                        }else{
                                                            $NOMBREMERCADO="Sin Datos";
                                                        }
                                                        $ARRAYRFINAL=$RFINAL_ADO->verRfinal($r["ID_RFINAL"]);
                                                        if($ARRAYRFINAL){
                                                            $NOMBRERFINAL=$ARRAYRFINAL[0]["NOMBRE_RFINAL"];
                                                        }else{
                                                            $NOMBRERFINAL="Sin Datos";
                                                        } 
                                                    }



                                                    $ARRAYTOMADOEX = $EXIEXPORTACION_ADO->buscarPordespachoEx($r['ID_DESPACHOEX']);

                                                    ?>

                                                    <?php foreach ($ARRAYTOMADOEX as $s) : ?>
                                                        <?php
                                                        if ($s['TESTADOSAG'] == null || $s['TESTADOSAG'] == "0") {
                                                            $ESTADOSAG = "Sin Condición";
                                                        }
                                                        if ($s['TESTADOSAG'] == "1") {
                                                            $ESTADOSAG =  "En Inspección";
                                                        }
                                                        if ($s['TESTADOSAG'] == "2") {
                                                            $ESTADOSAG =  "Aprobado Origen";
                                                        }
                                                        if ($s['TESTADOSAG'] == "3") {
                                                            $ESTADOSAG =  "Aprobado USLA";
                                                        }
                                                        if ($s['TESTADOSAG'] == "4") {
                                                            $ESTADOSAG =  "Fumigado";
                                                        }
                                                        if ($s['TESTADOSAG'] == "5") {
                                                            $ESTADOSAG =  "Rechazado";
                                                        }
                                                        $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($s['ID_PRODUCTOR']);
                                                        if ($ARRAYVERPRODUCTORID) {
                                                            $CSGPRODUCTOR = $ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'];
                                                            $NOMBREPRODUCTOR = $ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'];
                                                        } else {
                                                            $CSGPRODUCTOR = "Sin Datos";
                                                            $NOMBREPRODUCTOR = "Sin Datos";
                                                        }
                                                        $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($s['ID_VESPECIES']);
                                                        if ($ARRAYVERVESPECIESID) {
                                                            $NOMBREVARIEDAD = $ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'];
                                                            $ARRAYVERESPECIESID = $ESPECIES_ADO->verEspecies($ARRAYVERVESPECIESID[0]['ID_ESPECIES']);
                                                            if ($ARRAYVERVESPECIESID) {
                                                                $NOMBRESPECIES = $ARRAYVERESPECIESID[0]['NOMBRE_ESPECIES'];
                                                            } else {
                                                                $NOMBRESPECIES = "Sin Datos";
                                                            }
                                                        } else {
                                                            $NOMBREVARIEDAD = "Sin Datos";
                                                            $NOMBRESPECIES = "Sin Datos";
                                                        }
                                                        $ARRAYEVERERECEPCIONID = $EEXPORTACION_ADO->verEstandar($s['ID_ESTANDAR']);
                                                        if ($ARRAYEVERERECEPCIONID) {
                                                            $CODIGOESTANDAR = $ARRAYEVERERECEPCIONID[0]['CODIGO_ESTANDAR'];
                                                            $NOMBREESTANDAR = $ARRAYEVERERECEPCIONID[0]['NOMBRE_ESTANDAR'];
                                                        } else {
                                                            $NOMBREESTANDAR = "Sin Datos";
                                                            $CODIGOESTANDAR = "Sin Datos";
                                                        }
                                                        $ARRAYTMANEJO = $TMANEJO_ADO->verTmanejo($s['ID_TMANEJO']);
                                                        if ($ARRAYTMANEJO) {
                                                            $NOMBRETMANEJO = $ARRAYTMANEJO[0]['NOMBRE_TMANEJO'];
                                                        } else {
                                                            $NOMBRETMANEJO = "Sin Datos";
                                                        }
                                                        $ARRAYTCALIBRE = $TCALIBRE_ADO->verCalibre($s['ID_TCALIBRE']);
                                                        if ($ARRAYTCALIBRE) {
                                                            $NOMBRETCALIBRE = $ARRAYTCALIBRE[0]['NOMBRE_TCALIBRE'];
                                                        } else {
                                                            $NOMBRETCALIBRE = "Sin Datos";
                                                        }
                                                        $ARRAYTEMBALAJE = $TEMBALAJE_ADO->verEmbalaje($s['ID_TEMBALAJE']);
                                                        if ($ARRAYTEMBALAJE) {
                                                            $NOMBRETEMBALAJE = $ARRAYTEMBALAJE[0]['NOMBRE_TEMBALAJE'];
                                                        } else {
                                                            $NOMBRETEMBALAJE = "Sin Datos";
                                                        }                                                           
                                                        if ($s['EMBOLSADO'] == "1") {
                                                            $EMBOLSADO =  "SI";
                                                        }
                                                        if ($s['EMBOLSADO'] == "0") {
                                                            $EMBOLSADO =  "NO";
                                                        }                                                                                                        
                                                        if ($s['STOCK'] != "") {
                                                            $STOCK = $s['STOCK'] ;
                                                        } else if ($s['STOCK'] == "") {
                                                            $STOCK = "Sin Datos";
                                                        } else {
                                                            $STOCK = "Sin Datos";
                                                        }                                            
                                                        if ($s['GASIFICADO'] == "1") {
                                                            $GASIFICADO = "SI";
                                                        } else if ($s['GASIFICADO'] == "0") {
                                                            $GASIFICADO = "NO";
                                                        } else {
                                                            $GASIFICADO = "Sin Datos";
                                                        }                                                   
                                                        if ($s['PREFRIO'] == "0") {
                                                            $PREFRIO = "NO";
                                                        } else if ($s['PREFRIO'] == "1") {
                                                            $PREFRIO =  "SI";
                                                        } else {
                                                            $PREFRIO = "Sin Datos";
                                                        } 

                                                        $ARRAYRECEPCION = $RECEPCIONPT_ADO->verRecepcion2($s['ID_RECEPCION']);
                                                        $ARRAYDESPACHO2 = $DESPACHOPT_ADO->verDespachopt($s['ID_DESPACHO2']);
                                                        if ($ARRAYRECEPCION) {
                                                            $NUMERORECEPCION = $ARRAYRECEPCION[0]["NUMERO_RECEPCION"];
                                                            $FECHARECEPCION = $ARRAYRECEPCION[0]["FECHA"];
                                                            $NUMEROGUIARECEPCION = $ARRAYRECEPCION[0]["NUMERO_GUIA_RECEPCION"];
                                                            $FECHAGUIARECEPCION = $ARRAYRECEPCION[0]["GUIA"];
                                                            if ($ARRAYRECEPCION[0]["TRECEPCION"] == 1) {
                                                                $TIPORECEPCION = "Desde Productor";
                                                            }
                                                            if ($ARRAYRECEPCION[0]["TRECEPCION"] == 2) {
                                                                $TIPORECEPCION = "Planta Externa";
                                                            }
                                                        }else if($ARRAYDESPACHO2){
                                                                
                                                            $NUMERORECEPCION = $ARRAYDESPACHO2[0]["NUMERO_DESPACHO"];
                                                            $FECHARECEPCION = $ARRAYDESPACHO2[0]["FECHA"];                                                                
                                                            $NUMEROGUIARECEPCION = $ARRAYDESPACHO2[0]["NUMERO_GUIA_DESPACHO"];
                                                            $TIPORECEPCION = "Interplanta";
                                                            $FECHAGUIARECEPCION = "";                                                                
                                                            $ARRAYPLANTA2 = $PLANTA_ADO->verPlanta($ARRAYDESPACHO2[0]['ID_PLANTA']);
                                                            if ($ARRAYPLANTA2) {
                                                                $ORIGEN = $ARRAYPLANTA2[0]['NOMBRE_PLANTA'];
                                                                $CSGCSPORIGEN=$ARRAYPLANTA2[0]['CODIGO_SAG_PLANTA'];
                                                            } else {
                                                                $ORIGEN = "Sin Datos";
                                                                $CSGCSPORIGEN="Sin Datos";
                                                            }                                                        
                                                        } else {
                                                            $NUMERORECEPCION = "Sin Datos";
                                                            $FECHARECEPCION = "";
                                                            $NUMEROGUIARECEPCION = "Sin Datos";
                                                            $FECHAGUIARECEPCION = "";
                                                            $TIPORECEPCION = "Sin Datos";
                                                        }
                                                        $ARRAYPROCESO = $PROCESO_ADO->verProceso2($s['ID_PROCESO']);
                                                        $ARRAYBUSCARPROCESOORIGEN = $EXIEXPORTACION_ADO->buscarProcesoOrigenRepaletizaje($s['FOLIO_EXIEXPORTACION'],$s['FOLIO_AUXILIAR_EXIEXPORTACION'],$s['CANTIDAD_ENVASE_EXIEXPORTACION']);
                                                        if ($ARRAYPROCESO) {
                                                            $NUMEROPROCESO = $ARRAYPROCESO[0]["NUMERO_PROCESO"];
                                                            $FECHAPROCESO = $ARRAYPROCESO[0]["FECHA"];
                                                            $PORCENTAJEEXPO = number_format($ARRAYPROCESO[0]["PDEXPORTACION_PROCESO"], 2);
                                                            $PORCENTAJEINDUSTRIAL = number_format($ARRAYPROCESO[0]["PDINDUSTRIAL_PROCESO"], 2);
                                                            $PORCENTAJETOTAL = number_format($ARRAYPROCESO[0]["PORCENTAJE_PROCESO"], 2);
                                                            $ARRAYTPROCESO = $TPROCESO_ADO->verTproceso($ARRAYPROCESO[0]["ID_TPROCESO"]);
                                                            if ($ARRAYTPROCESO) {
                                                                $TPROCESO = $ARRAYTPROCESO[0]["NOMBRE_TPROCESO"];
                                                            }  
                                                            $ARRAYVERPLANTA = $PLANTA_ADO->verPlanta($ARRAYPROCESO[0]['ID_PLANTA']);
                                                            if ($ARRAYVERPLANTA) {
                                                                $NOMBREPLANTAPROCESO = $ARRAYVERPLANTA[0]['NOMBRE_PLANTA'];
                                                            } else {
                                                                $NOMBREPLANTAPROCESO = "Sin Datos";
                                                            }
                                                        }else if ($ARRAYBUSCARPROCESOORIGEN){
                                                            if($ARRAYBUSCARPROCESOORIGEN[0]["ID_PROCESO"]!=null){    
                                                                $NUMEROPROCESO = $ARRAYBUSCARPROCESOORIGEN[0]["NUMERO"];
                                                                $FECHAPROCESO = $ARRAYBUSCARPROCESOORIGEN[0]["FECHA"];
                                                                $PORCENTAJEEXPO = number_format($ARRAYBUSCARPROCESOORIGEN[0]["PEXPO"], 2);
                                                                $PORCENTAJEINDUSTRIAL = number_format($ARRAYBUSCARPROCESOORIGEN[0]["PIND"], 2);
                                                                $PORCENTAJETOTAL = number_format($ARRAYBUSCARPROCESOORIGEN[0]["PTOTAL"], 2);
                                                                $TPROCESO = $ARRAYBUSCARPROCESOORIGEN[0]["TPROCESO"];    
                                                                $NOMBREPLANTAPROCESO =$ARRAYBUSCARPROCESOORIGEN[0]["PLANTA"];   
                                                            }else{                                                                
                                                                $NUMEROPROCESO = "Sin Datos";
                                                                $PORCENTAJEEXPO = "Sin Datos";
                                                                $PORCENTAJEINDUSTRIAL = "Sin Datos";
                                                                $PORCENTAJETOTAL = "Sin Datos";
                                                                $FECHAPROCESO = "";
                                                                $TPROCESO = "Sin Datos";   
                                                                $NOMBREPLANTAPROCESO = "Sin Datos";  
                                                            }
                                                        }else {
                                                            $NUMEROPROCESO = "Sin Datos";
                                                            $PORCENTAJEEXPO = "Sin Datos";
                                                            $PORCENTAJEINDUSTRIAL = "Sin Datos";
                                                            $PORCENTAJETOTAL = "Sin Datos";
                                                            $FECHAPROCESO = "";
                                                            $TPROCESO = "Sin Datos";   
                                                            $NOMBREPLANTAPROCESO = "Sin Datos";                                                                  
                                                        }
                                                        $ARRAYREEMBALAJE = $REEMBALAJE_ADO->verReembalaje2($s['ID_REEMBALAJE']);
                                                        if ($ARRAYREEMBALAJE) {
                                                            $NUMEROREEMBALEJE = $ARRAYREEMBALAJE[0]["ID_TREEMBALAJE"];
                                                            $FECHAREEMBALEJE = $ARRAYREEMBALAJE[0]["FECHA"];
                                                            $ARRAYTREEMBALAJE = $TREEMBALAJE_ADO->verTreembalaje($ARRAYREEMBALAJE[0]["ID_TREEMBALAJE"]);
                                                            if ($ARRAYTREEMBALAJE) {
                                                                $TREEMBALAJE = $ARRAYTREEMBALAJE[0]["NOMBRE_TREEMBALAJE"];
                                                            }
                                                        } else {
                                                            $NUMEROREEMBALEJE = "Sin Datos";
                                                            $FECHAREEMBALEJE = "";
                                                            $TREEMBALAJE = "Sin Datos";
                                                        }
                                                        $ARRAYRECEPCIONMPORIGEN1=$PROCESO_ADO->buscarRecepcionMpExistenciaEnProceso($s['ID_PROCESO']);
                                                        $ARRAYRECEPCIONMPORIGEN2=$REEMBALAJE_ADO->buscarProcesoRecepcionMpExistenciaEnReembalaje($s['ID_REEMBALAJE']);
                                                        if($ARRAYRECEPCIONMPORIGEN1){                                                                
                                                            $NUMERORECEPCIONMP = $ARRAYRECEPCIONMPORIGEN1[0]["NUMERO"];
                                                            $FECHARECEPCIONMP = $ARRAYRECEPCIONMPORIGEN1[0]["FECHA"];
                                                            $NUMEROGUIARECEPCIONMP = $ARRAYRECEPCIONMPORIGEN1[0]["NUMEROGUIA"];
                                                            $FECHAGUIARECEPCIONMP = $ARRAYRECEPCIONMPORIGEN1[0]["FECHAGUIA"];
                                                            $TIPORECEPCIONMP = $ARRAYRECEPCIONMPORIGEN1[0]["TRECEPCION"];
                                                            $ORIGENRECEPCIONMP = $ARRAYRECEPCIONMPORIGEN1[0]["ORIGEN"];
                                                            $PLANTARECEPCIONMP = $ARRAYRECEPCIONMPORIGEN1[0]["PLANTA"];

                                                        }else if($ARRAYRECEPCIONMPORIGEN2){                                                                
                                                            $NUMERORECEPCIONMP = $ARRAYRECEPCIONMPORIGEN2[0]["NUMERO"];
                                                            $FECHARECEPCIONMP = $ARRAYRECEPCIONMPORIGEN2[0]["FECHA"];
                                                            $NUMEROGUIARECEPCIONMP = $ARRAYRECEPCIONMPORIGEN2[0]["NUMEROGUIA"];
                                                            $FECHAGUIARECEPCIONMP = $ARRAYRECEPCIONMPORIGEN2[0]["FECHAGUIA"];
                                                            $TIPORECEPCIONMP = $ARRAYRECEPCIONMPORIGEN2[0]["TRECEPCION"];
                                                            $ORIGENRECEPCIONMP = $ARRAYRECEPCIONMPORIGEN2[0]["ORIGEN"];
                                                            $PLANTARECEPCIONMP = $ARRAYRECEPCIONMPORIGEN2[0]["PLANTA"];

                                                        }else{
                                                            $NUMERORECEPCIONMP = "Sin Datos";
                                                            $FECHARECEPCIONMP = "";
                                                            $NUMEROGUIARECEPCIONMP = "Sin Datos"; 
                                                            $FECHAGUIARECEPCIONMP = "";
                                                            $TIPORECEPCIONMP = "Sin Datos";
                                                            $ORIGENRECEPCIONMP = "Sin Datos";
                                                            $PLANTARECEPCIONMP = "Sin Datos";
                                                        }

                                                        $ARRATREPALETIZAJE = $REPALETIZAJEEX_ADO->verRepaletizaje2($s['ID_REPALETIZAJE']);
                                                        if ($ARRATREPALETIZAJE) {
                                                            $FECHAREPALETIZAJE = $ARRATREPALETIZAJE[0]["INGRESO"];
                                                            $NUMEROREPALETIZAJE = $ARRATREPALETIZAJE[0]["NUMERO_REPALETIZAJE"];
                                                        } else {
                                                            $NUMEROREPALETIZAJE = "Sin Datos";
                                                            $FECHAREPALETIZAJE = "";
                                                        }
                                                        ?>
                                                        <tr class="text-center">     
                                                            <td><?php echo $NUMEROREFERENCIA; ?></td>
                                                            <td><?php echo $NOMBREBROKER; ?></td>
                                                            <td><?php echo $NOMBREMERCADO; ?></td>
                                                            <td><?php echo $r['NUMERO_CONTENEDOR_DESPACHOEX']; ?></td>   
                                                            <td><?php echo "Exportación"; ?></td> 
                                                            <td><?php echo $r['NUMERO_DESPACHOEX']; ?></td>
                                                            <td><?php echo $r['FECHA']; ?></td>
                                                            <td><?php echo $r['NUMERO_GUIA_DESPACHOEX']; ?></td>
                                                            <td><?php echo $DESTINO; ?></td>
                                                            <td><?php echo $FECHACDOCUMENTAL; ?></td>
                                                            <td><?php echo $FECHAETD; ?></td>
                                                            <td><?php echo $FECHAETA; ?></td>
                                                            <td><?php echo $FECHAETAREAL; ?></td>
                                                            <td><?php echo $NOMBRERFINAL; ?></td>
                                                            <td><?php echo $TEMBARQUE; ?></td>
                                                            <td><?php echo $NAVE; ?></td>
                                                            <td><?php echo $NVIAJE; ?></td>
                                                            <td><?php echo $NOMBREDESTINO; ?></td>
                                                            <td><?php echo $s['FOLIO_EXIEXPORTACION']; ?> </td>
                                                            <td><?php echo $s['FOLIO_AUXILIAR_EXIEXPORTACION']; ?> </td>
                                                            <td><?php echo $s['EMBALADO']; ?></td>
                                                            <td><?php echo $ESTADOSAG; ?></td>   
                                                            <td><?php echo "Producto Terminado"; ?> </td>                                            
                                                            <td><?php echo $CODIGOESTANDAR; ?></td>
                                                            <td><?php echo $NOMBREESTANDAR; ?></td>
                                                            <td><?php echo $CSGPRODUCTOR; ?></td>
                                                            <td><?php echo $NOMBREPRODUCTOR; ?></td>
                                                            <td><?php echo $NOMBRESPECIES; ?></td>
                                                            <td><?php echo $NOMBREVARIEDAD; ?></td>
                                                            <td><?php echo $s['ENVASE']; ?></td>
                                                            <td><?php echo $s['NETO']; ?></td>
                                                            <td><?php echo $s['PORCENTAJE']; ?></td>
                                                            <td><?php echo $s['DESHIRATACION']; ?></td>
                                                            <td><?php echo $s['BRUTO']; ?></td>
                                                            <td><?php echo $NUMERORECEPCION; ?></td>
                                                            <td><?php echo $FECHARECEPCION; ?></td>                                                            
                                                            <td><?php echo $TIPORECEPCION; ?></td>
                                                            <td><?php echo $NUMEROGUIARECEPCION; ?></td>
                                                            <td><?php echo $FECHAGUIARECEPCION; ?></td>
                                                            <td><?php echo $NUMEROREPALETIZAJE; ?></td>
                                                            <td><?php echo $FECHAREPALETIZAJE; ?></td>
                                                            <td><?php echo $NUMEROPROCESO; ?></td>
                                                            <td><?php echo $FECHAPROCESO; ?></td>
                                                            <td><?php echo $TPROCESO; ?></td>
                                                            <td><?php echo $NUMEROREEMBALEJE; ?></td>
                                                            <td><?php echo $FECHAREEMBALEJE; ?></td>
                                                            <td><?php echo $TREEMBALAJE; ?></td>  
                                                            <td><?php echo $NOMBRETMANEJO; ?></td>
                                                            <td><?php echo $NOMBRETCALIBRE; ?></td>
                                                            <td><?php echo $NOMBRETEMBALAJE; ?></td>
                                                            <td><?php echo $STOCK; ?></td>
                                                            <td><?php echo $EMBOLSADO; ?></td>
                                                            <td><?php echo $GASIFICADO; ?></td>
                                                            <td><?php echo $PREFRIO; ?></td>
                                                            <td><?php echo $NOMBRETRANSPORTE; ?></td>
                                                            <td><?php echo $NOMBRECONDUCTOR; ?></td>  
                                                            <td><?php echo $r['PATENTE_CAMION']; ?></td>
                                                            <td><?php echo $r['PATENTE_CARRO']; ?></td>      
                                                            <td><?php echo $r['SEMANA']; ?></td>                             
                                                            <td><?php echo $r["SEMANAGUIA"]; ?></td>
                                                            <td><?php echo $NOMBREEMPRESA; ?></td>
                                                            <td><?php echo $NOMBREPLANTA; ?></td>
                                                            <td><?php echo $NOMBRETEMPORADA; ?></td>
                                                            <td><?php echo $PORCENTAJEEXPO; ?></td>
                                                            <td><?php echo $PORCENTAJEINDUSTRIAL; ?></td>
                                                            <td><?php echo $PORCENTAJETOTAL; ?></td> 
                                                            <td><?php echo $NOMBREPLANTAPROCESO; ?></td>     
                                                            <td><?php echo $BOLAWBCRTICARGA; ?></td>                     
                                                            <td><?php echo $NUMERORECEPCIONMP; ?></td>
                                                            <td><?php echo $FECHARECEPCIONMP; ?></td>
                                                            <td><?php echo $TIPORECEPCIONMP; ?></td>
                                                            <td><?php echo $NUMEROGUIARECEPCIONMP; ?></td>
                                                            <td><?php echo $FECHAGUIARECEPCIONMP; ?></td>
                                                            <td><?php echo $PLANTARECEPCIONMP; ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php endforeach;  ?>
                                                <?php foreach ($ARRAYDESPACHOMP as $r) : ?>
                                                    <?php
                                                    if ($r['ESTADO_DESPACHO'] == "1") {
                                                        $ESTADODESPACHO = "Por Confirmar";
                                                    }
                                                    if ($r['ESTADO_DESPACHO'] == "2") {
                                                        $ESTADODESPACHO = "Confirmado";
                                                    }
                                                    if ($r['ESTADO_DESPACHO'] == "3") {
                                                        $ESTADODESPACHO = "Rechazado";
                                                    }
                                                    if ($r['ESTADO_DESPACHO'] == "4") {
                                                        $ESTADODESPACHO = "Aprobado";
                                                    }
                                                    if ($r['TDESPACHO'] == "1") {
                                                        $TDESPACHO = "Interplanta";
                                                        $NUMEROGUIADEPACHO=$r["NUMERO_GUIA_DESPACHO"];
                                                        $ARRAYPLANTA2 = $PLANTA_ADO->verPlanta($r['ID_PLANTA2']);
                                                        if ($ARRAYPLANTA2) {
                                                            $DESTINO = $ARRAYPLANTA2[0]['NOMBRE_PLANTA'];
                                                        } else {
                                                            $DESTINO = "Sin Datos";
                                                        }
                                                    }
                                                    if ($r['TDESPACHO'] == "2") {
                                                        $TDESPACHO = "Devolución Productor";
                                                        $NUMEROGUIADEPACHO=$r["NUMERO_GUIA_DESPACHO"];
                                                        $ARRAYPRODUCTOR = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);
                                                        if ($ARRAYPRODUCTOR) {
                                                            $DESTINO = $ARRAYPRODUCTOR[0]['CSG_PRODUCTOR'] . ":" . $ARRAYPRODUCTOR[0]['NOMBRE_PRODUCTOR'];
                                                        } else {
                                                            $DESTINO = "Sin Datos";
                                                        }
                                                    }
                                                    if ($r['TDESPACHO'] == "3") {
                                                        $TDESPACHO = "Venta";
                                                        $NUMEROGUIADEPACHO=$r["NUMERO_GUIA_DESPACHO"];
                                                        $ARRAYCOMPRADOR = $COMPRADOR_ADO->verComprador($r['ID_COMPRADOR']);
                                                        if ($ARRAYCOMPRADOR) {
                                                            $DESTINO = $ARRAYCOMPRADOR[0]['NOMBRE_COMPRADOR'];
                                                        } else {
                                                            $DESTINO = "Sin Datos";
                                                        }
                                                    }
                                                    if ($r['TDESPACHO'] == "4") {
                                                        $TDESPACHO = "Despacho de Descarte";
                                                        $NUMEROGUIADEPACHO="No Aplica";
                                                        $DESTINO = $r['REGALO_DESPACHO'];
                                                    }
                                                    if ($r['TDESPACHO'] == "5") {
                                                        $TDESPACHO = "Planta Externa";
                                                        $NUMEROGUIADEPACHO=$r["NUMERO_GUIA_DESPACHO"];
                                                        $ARRAYPLANTA2 = $PLANTA_ADO->verPlanta($r['ID_PLANTA3']);
                                                        if ($ARRAYPLANTA2) {
                                                            $DESTINO = $ARRAYPLANTA2[0]['NOMBRE_PLANTA'];
                                                        } else {
                                                            $DESTINO = "Sin Datos";
                                                        }
                                                    }
                                                    $ARRAYVERTRANSPORTE = $TRANSPORTE_ADO->verTransporte($r['ID_TRANSPORTE']);
                                                    if ($ARRAYVERTRANSPORTE) {
                                                        $NOMBRETRANSPORTE = $ARRAYVERTRANSPORTE[0]['NOMBRE_TRANSPORTE'];
                                                    } else {
                                                        $NOMBRETRANSPORTE = "Sin Datos";
                                                    }
                                                    $ARRAYVERCONDUCTOR = $CONDUCTOR_ADO->verConductor($r['ID_CONDUCTOR']);
                                                    if ($ARRAYVERCONDUCTOR) {

                                                        $NOMBRECONDUCTOR = $ARRAYVERCONDUCTOR[0]['NOMBRE_CONDUCTOR'];
                                                    } else {
                                                        $NOMBRECONDUCTOR = "Sin Datos";
                                                    }

                                                    $ARRAYEMPRESA = $EMPRESA_ADO->verEmpresa($r['ID_EMPRESA']);
                                                    if ($ARRAYEMPRESA) {
                                                        $NOMBREEMPRESA = $ARRAYEMPRESA[0]['NOMBRE_EMPRESA'];
                                                    } else {
                                                        $NOMBREEMPRESA = "Sin Datos";
                                                    }
                                                    $ARRAYPLANTA = $PLANTA_ADO->verPlanta($r['ID_PLANTA']);
                                                    if ($ARRAYPLANTA) {
                                                        $NOMBREPLANTA = $ARRAYPLANTA[0]['NOMBRE_PLANTA'];
                                                    } else {
                                                        $NOMBREPLANTA = "Sin Datos";
                                                    }
                                                    $ARRAYTEMPORADA = $TEMPORADA_ADO->verTemporada($r['ID_TEMPORADA']);
                                                    if ($ARRAYTEMPORADA) {
                                                        $NOMBRETEMPORADA = $ARRAYTEMPORADA[0]['NOMBRE_TEMPORADA'];
                                                    } else {
                                                        $NOMBRETEMPORADA = "Sin Datos";
                                                    }

                                                    $ARRAYTOMADO = $EXIMATERIAPRIMA_ADO->buscarPorDespacho($r['ID_DESPACHO']);
                                                    ?>

                                                    <?php foreach ($ARRAYTOMADO as $s) : ?>
                                                        <?php
                                                        $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($s['ID_PRODUCTOR']);
                                                        if ($ARRAYVERPRODUCTORID) {
                                                            $CSGPRODUCTOR = $ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'];
                                                            $NOMBREPRODUCTOR = $ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'];
                                                        } else {
                                                            $CSGPRODUCTOR = "Sin Datos";
                                                            $NOMBREPRODUCTOR = "Sin Datos";
                                                        }
                                                        $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($s['ID_VESPECIES']);
                                                        if ($ARRAYVERVESPECIESID) {
                                                            $NOMBREVARIEDAD = $ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'];
                                                            $ARRAYVERESPECIESID = $ESPECIES_ADO->verEspecies($ARRAYVERVESPECIESID[0]['ID_ESPECIES']);
                                                            if ($ARRAYVERVESPECIESID) {
                                                                $NOMBRESPECIES = $ARRAYVERESPECIESID[0]['NOMBRE_ESPECIES'];
                                                            } else {
                                                                $NOMBRESPECIES = "Sin Datos";
                                                            }
                                                        } else {
                                                            $NOMBREVARIEDAD = "Sin Datos";
                                                            $NOMBRESPECIES = "Sin Datos";
                                                        }
                                                        $ARRAYEVERERECEPCIONID = $ERECEPCION_ADO->verEstandar($s['ID_ESTANDAR']);
                                                        if ($ARRAYEVERERECEPCIONID) {
                                                            $CODIGOESTANDAR = $ARRAYEVERERECEPCIONID[0]['CODIGO_ESTANDAR'];
                                                            $NOMBREESTANDAR = $ARRAYEVERERECEPCIONID[0]['NOMBRE_ESTANDAR'];
                                                        } else {
                                                            $NOMBREESTANDAR = "Sin Datos";
                                                            $CODIGOESTANDAR = "Sin Datos";
                                                        }
                                                        $ARRAYTMANEJO = $TMANEJO_ADO->verTmanejo($s['ID_TMANEJO']);
                                                        if ($ARRAYTMANEJO) {
                                                            $NOMBRETMANEJO = $ARRAYTMANEJO[0]['NOMBRE_TMANEJO'];
                                                        } else {
                                                            $NOMBRETMANEJO = "Sin Datos";
                                                        }

                                                        if ($s['GASIFICADO'] == "1") {
                                                            $GASIFICADO = "SI";
                                                        } else if ($s['GASIFICADO'] == "0") {
                                                            $GASIFICADO = "NO";
                                                        } else {
                                                            $GASIFICADO = "Sin Datos";
                                                        }
                                                        $ARRAYRECEPCION = $RECEPCIONMP_ADO->verRecepcion2($s['ID_RECEPCION']);
                                                        $ARRAYDESPACHO2=$DESPACHOMP_ADO->verDespachomp2($s['ID_DESPACHO2']);
                                                        if ($ARRAYRECEPCION) {
                                                            $NUMERORECEPCION = $ARRAYRECEPCION[0]["NUMERO_RECEPCION"];
                                                            $FECHARECEPCION = $ARRAYRECEPCION[0]["FECHA"];
                                                            $NUMEROGUIARECEPCION = $ARRAYRECEPCION[0]["NUMERO_GUIA_RECEPCION"];
                                                            $FECHAGUIARECEPCION = $ARRAYRECEPCION[0]["GUIA"];
                                                            if ($ARRAYRECEPCION[0]["TRECEPCION"] == 1) {
                                                                $TIPORECEPCION = "Desde Productor";
                                                            }
                                                            if ($ARRAYRECEPCION[0]["TRECEPCION"] == 2) {
                                                                $TIPORECEPCION = "Planta Externa";
                                                            }
                                                            if ($ARRAYRECEPCION[0]["TRECEPCION"] == 3) {
                                                                $TIPORECEPCION = "Desde Productor BDH";
                                                            }
                                                        }else if($ARRAYDESPACHO2){                                                                
                                                            $NUMERORECEPCION = $ARRAYDESPACHO2[0]["NUMERO_DESPACHO"];
                                                            $FECHARECEPCION = $ARRAYDESPACHO2[0]["FECHA"];                                                                
                                                            $NUMEROGUIARECEPCION = $ARRAYDESPACHO2[0]["NUMERO_GUIA_DESPACHO"];
                                                            $TIPORECEPCION = "Interplanta";
                                                            $FECHAGUIARECEPCION = "";                                                                
                                                            $ARRAYPLANTA2 = $PLANTA_ADO->verPlanta($ARRAYDESPACHO2[0]['ID_PLANTA']);
                                                            if ($ARRAYPLANTA2) {
                                                                $ORIGEN = $ARRAYPLANTA2[0]['NOMBRE_PLANTA'];
                                                                $CSGCSPORIGEN=$ARRAYPLANTA2[0]['CODIGO_SAG_PLANTA'];
                                                            } else {
                                                                $ORIGEN = "Sin Datos";
                                                                $CSGCSPORIGEN="Sin Datos";
                                                            }  
                                                        } else {
                                                            $FECHARECEPCION = "";
                                                            $NUMERORECEPCION = "Sin Datos";
                                                            $NUMEROGUIARECEPCION = "Sin Datos";
                                                            $FECHAGUIARECEPCION = "";
                                                            $TIPORECEPCION = "Sin Datos";
                                                        }

                                                        ?>
                                                        <tr class="text-center">
                                                            <td><?php echo "No Aplica"; ?></td>
                                                            <td><?php echo "No Aplica"; ?></td>
                                                            <td><?php echo "No Aplica"; ?></td>
                                                            <td><?php echo "No Aplica"; ?></td>
                                                            <td><?php echo $TDESPACHO; ?></td>
                                                            <td><?php echo $r['NUMERO_DESPACHO']; ?> </td>
                                                            <td><?php echo $r['FECHA']; ?></td>
                                                            <td><?php echo $NUMEROGUIADEPACHO; ?></td>
                                                            <td><?php echo $DESTINO; ?></td>
                                                            <td><?php echo ""; ?></td>
                                                            <td><?php echo ""; ?></td>
                                                            <td><?php echo ""; ?></td>
                                                            <td><?php echo ""; ?></td>
                                                            <td><?php echo "No Aplica"; ?></td>
                                                            <td><?php echo "No Aplica"; ?></td>
                                                            <td><?php echo "No Aplica"; ?></td>
                                                            <td><?php echo "No Aplica"; ?></td>
                                                            <td><?php echo "No Aplica"; ?></td>
                                                            <td><?php echo $s['FOLIO_EXIMATERIAPRIMA']; ?> </td>
                                                            <td><?php echo $s['FOLIO_AUXILIAR_EXIMATERIAPRIMA']; ?> </td>
                                                            <td><?php echo $s['COSECHA']; ?></td>
                                                            <td><?php echo "Sin Datos"; ?></td>
                                                            <td><?php echo "Materia Prima"; ?> </td>
                                                            <td><?php echo $CODIGOESTANDAR; ?></td>
                                                            <td><?php echo $NOMBREESTANDAR; ?></td>
                                                            <td><?php echo $CSGPRODUCTOR; ?></td>
                                                            <td><?php echo $NOMBREPRODUCTOR; ?></td>
                                                            <td><?php echo $NOMBRESPECIES; ?></td>
                                                            <td><?php echo $NOMBREVARIEDAD; ?></td>
                                                            <td><?php echo $s['ENVASE']; ?></td>
                                                            <td><?php echo $s['NETO']; ?></td>
                                                            <td><?php echo "Sin Datos"; ?></td>
                                                            <td><?php echo "Sin Datos"; ?></td>
                                                            <td><?php echo $s['BRUTO']; ?></td>
                                                            <td><?php echo $NUMERORECEPCION; ?></td>
                                                            <td><?php echo $FECHARECEPCION; ?></td>
                                                            <td><?php echo $TIPORECEPCION; ?></td>
                                                            <td><?php echo $NUMEROGUIARECEPCION; ?></td>
                                                            <td><?php echo $FECHAGUIARECEPCION; ?></td>
                                                            <td><?php echo "Sin Datos"; ?></td>
                                                            <td><?php echo ""; ?></td>
                                                            <td><?php echo "Sin Datos"; ?></td>
                                                            <td><?php echo ""; ?></td>
                                                            <td><?php echo "Sin Datos"; ?></td>
                                                            <td><?php echo "Sin Datos"; ?></td>
                                                            <td><?php echo ""; ?></td>
                                                            <td><?php echo "Sin Datos"; ?></td>
                                                            <td><?php echo $NOMBRETMANEJO; ?></td>
                                                            <td><?php echo "Sin Datos"; ?></td>
                                                            <td><?php echo "Sin Datos"; ?></td>
                                                            <td><?php echo "Sin Datos"; ?></td>
                                                            <td><?php echo "Sin Datos"; ?></td>
                                                            <td><?php echo $GASIFICADO; ?></td>
                                                            <td><?php echo "Sin Datos"; ?></td>
                                                            <td><?php echo $NOMBRETRANSPORTE; ?></td>
                                                            <td><?php echo $NOMBRECONDUCTOR; ?></td>
                                                            <td><?php echo $r['PATENTE_CAMION']; ?></td>
                                                            <td><?php echo $r['PATENTE_CARRO']; ?></td>      
                                                            <td><?php echo $r['SEMANA']; ?></td>                             
                                                            <td><?php echo ""; ?></td>
                                                            <td><?php echo $NOMBREEMPRESA; ?></td>
                                                            <td><?php echo $NOMBREPLANTA; ?></td>
                                                            <td><?php echo $NOMBRETEMPORADA; ?></td>
                                                            <td><?php echo "No Aplica"; ?></td>
                                                            <td><?php echo "No Aplica"; ?></td>
                                                            <td><?php echo "No Aplica"; ?></td>
                                                            <td><?php echo "No Aplica"; ?></td>
                                                            <td><?php echo "No Aplica"; ?></td>                                                                                 
                                                            <td><?php echo "No Aplica"; ?></td>
                                                            <td><?php echo "No Aplica"; ?></td>
                                                            <td><?php echo "No Aplica"; ?></td>
                                                            <td><?php echo "No Aplica"; ?></td>
                                                            <td><?php echo "No Aplica"; ?></td>
                                                            <td><?php echo "No Aplica"; ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php endforeach; ?>
                                                <?php foreach ($ARRAYDESPACHOIND as $r) : ?>
                                                    <?php
                                                    if ($r['ESTADO_DESPACHO'] == "1") {
                                                        $ESTADODESPACHO = "Por Confirmar";
                                                    }
                                                    if ($r['ESTADO_DESPACHO'] == "2") {
                                                        $ESTADODESPACHO = "Confirmado";
                                                    }
                                                    if ($r['ESTADO_DESPACHO'] == "3") {
                                                        $ESTADODESPACHO = "Rechazado";
                                                    }
                                                    if ($r['ESTADO_DESPACHO'] == "4") {
                                                        $ESTADODESPACHO = "Aprobado";
                                                    }
                                                    if ($r['TDESPACHO'] == "1") {
                                                        $TDESPACHO = "Interplanta";
                                                        $NUMEROGUIADEPACHO=$r["NUMERO_GUIA_DESPACHO"];
                                                        $ARRAYPLANTA2 = $PLANTA_ADO->verPlanta($r['ID_PLANTA2']);
                                                        if ($ARRAYPLANTA2) {
                                                            $DESTINO = $ARRAYPLANTA2[0]['NOMBRE_PLANTA'];
                                                        } else {
                                                            $DESTINO = "Sin Datos";
                                                        }
                                                    }
                                                    if ($r['TDESPACHO'] == "2") {
                                                        $TDESPACHO = "Devolución Productor";
                                                        $NUMEROGUIADEPACHO=$r["NUMERO_GUIA_DESPACHO"];
                                                        $ARRAYPRODUCTOR = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);
                                                        if ($ARRAYPRODUCTOR) {
                                                            $DESTINO = $ARRAYPRODUCTOR[0]['CSG_PRODUCTOR'] . ":" . $ARRAYPRODUCTOR[0]['NOMBRE_PRODUCTOR'];
                                                        } else {
                                                            $DESTINO = "Sin Datos";
                                                        }
                                                    }
                                                    if ($r['TDESPACHO'] == "3") {
                                                        $TDESPACHO = "Venta";
                                                        $NUMEROGUIADEPACHO=$r["NUMERO_GUIA_DESPACHO"];
                                                        $ARRAYCOMPRADOR = $COMPRADOR_ADO->verComprador($r['ID_COMPRADOR']);
                                                        if ($ARRAYCOMPRADOR) {
                                                            $DESTINO = $ARRAYCOMPRADOR[0]['NOMBRE_COMPRADOR'];
                                                        } else {
                                                            $DESTINO = "Sin Datos";
                                                        }
                                                    }
                                                    if ($r['TDESPACHO'] == "4") {
                                                        $TDESPACHO = "Despacho de Descarte";
                                                        $NUMEROGUIADEPACHO="No Aplica";
                                                        $DESTINO = $r['REGALO_DESPACHO'];
                                                    }
                                                    if ($r['TDESPACHO'] == "5") {
                                                        $TDESPACHO = "Planta Externa";
                                                        $NUMEROGUIADEPACHO=$r["NUMERO_GUIA_DESPACHO"];
                                                        $ARRAYPLANTA2 = $PLANTA_ADO->verPlanta($r['ID_PLANTA3']);
                                                        if ($ARRAYPLANTA2) {
                                                            $DESTINO = $ARRAYPLANTA2[0]['NOMBRE_PLANTA'];
                                                        } else {
                                                            $DESTINO = "Sin Datos";
                                                        }
                                                    }
                                                    $ARRAYVERTRANSPORTE = $TRANSPORTE_ADO->verTransporte($r['ID_TRANSPORTE']);
                                                    if ($ARRAYVERTRANSPORTE) {
                                                        $NOMBRETRANSPORTE = $ARRAYVERTRANSPORTE[0]['NOMBRE_TRANSPORTE'];
                                                    } else {
                                                        $NOMBRETRANSPORTE = "Sin Datos";
                                                    }
                                                    $ARRAYVERCONDUCTOR = $CONDUCTOR_ADO->verConductor($r['ID_CONDUCTOR']);
                                                    if ($ARRAYVERCONDUCTOR) {

                                                        $NOMBRECONDUCTOR = $ARRAYVERCONDUCTOR[0]['NOMBRE_CONDUCTOR'];
                                                    } else {
                                                        $NOMBRECONDUCTOR = "Sin Datos";
                                                    }

                                                    $ARRAYEMPRESA = $EMPRESA_ADO->verEmpresa($r['ID_EMPRESA']);
                                                    if ($ARRAYEMPRESA) {
                                                        $NOMBREEMPRESA = $ARRAYEMPRESA[0]['NOMBRE_EMPRESA'];
                                                    } else {
                                                        $NOMBREEMPRESA = "Sin Datos";
                                                    }
                                                    $ARRAYPLANTA = $PLANTA_ADO->verPlanta($r['ID_PLANTA']);
                                                    if ($ARRAYPLANTA) {
                                                        $NOMBREPLANTA = $ARRAYPLANTA[0]['NOMBRE_PLANTA'];
                                                    } else {
                                                        $NOMBREPLANTA = "Sin Datos";
                                                    }
                                                    $ARRAYTEMPORADA = $TEMPORADA_ADO->verTemporada($r['ID_TEMPORADA']);
                                                    if ($ARRAYTEMPORADA) {
                                                        $NOMBRETEMPORADA = $ARRAYTEMPORADA[0]['NOMBRE_TEMPORADA'];
                                                    } else {
                                                        $NOMBRETEMPORADA = "Sin Datos";
                                                    }

                                                    $ARRAYTOMADO = $EXIINDUSTRIAL_ADO->buscarPorDespacho($r['ID_DESPACHO']);
                                                    ?>

                                                    <?php foreach ($ARRAYTOMADO as $s) : ?>
                                                        <?php
                                                        $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($s['ID_PRODUCTOR']);
                                                        if ($ARRAYVERPRODUCTORID) {
                                                            $CSGPRODUCTOR = $ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'];
                                                            $NOMBREPRODUCTOR = $ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'];
                                                        } else {
                                                            $CSGPRODUCTOR = "Sin Datos";
                                                            $NOMBREPRODUCTOR = "Sin Datos";
                                                        }
                                                        $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($s['ID_VESPECIES']);
                                                        if ($ARRAYVERVESPECIESID) {
                                                            $NOMBREVARIEDAD = $ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'];
                                                            $ARRAYVERESPECIESID = $ESPECIES_ADO->verEspecies($ARRAYVERVESPECIESID[0]['ID_ESPECIES']);
                                                            if ($ARRAYVERVESPECIESID) {
                                                                $NOMBRESPECIES = $ARRAYVERESPECIESID[0]['NOMBRE_ESPECIES'];
                                                            } else {
                                                                $NOMBRESPECIES = "Sin Datos";
                                                            }
                                                        } else {
                                                            $NOMBREVARIEDAD = "Sin Datos";
                                                            $NOMBRESPECIES = "Sin Datos";
                                                        }
                                                        $ARRAYEVERERECEPCIONID = $EINDUSTRIAL_ADO->verEstandar($s['ID_ESTANDAR']);
                                                        $ARRAYEVERERECEPCIONID2 = $ERECEPCION_ADO->verEstandar($s['ID_ESTANDARMP']);
                                                        if ($ARRAYEVERERECEPCIONID) {
                                                            $CODIGOESTANDAR = $ARRAYEVERERECEPCIONID[0]['CODIGO_ESTANDAR'];
                                                            $NOMBREESTANDAR = $ARRAYEVERERECEPCIONID[0]['NOMBRE_ESTANDAR'];
                                                        }else  if ($ARRAYEVERERECEPCIONID2) {
                                                            $CODIGOESTANDAR = $ARRAYEVERERECEPCIONID2[0]['CODIGO_ESTANDAR'];
                                                            $NOMBREESTANDAR = $ARRAYEVERERECEPCIONID2[0]['NOMBRE_ESTANDAR'];
                                                        } else {
                                                            $CODIGOESTANDAR = "Sin Datos";
                                                            $NOMBREESTANDAR = "Sin Datos";
                                                        }
                                                        $ARRAYTMANEJO = $TMANEJO_ADO->verTmanejo($s['ID_TMANEJO']);
                                                        if ($ARRAYTMANEJO) {
                                                            $NOMBRETMANEJO = $ARRAYTMANEJO[0]['NOMBRE_TMANEJO'];
                                                        } else {
                                                            $NOMBRETMANEJO = "Sin Datos";
                                                        }
                                                        $ARRAYPROCESO = $PROCESO_ADO->verProceso2($s['ID_PROCESO']);
                                                        if ($ARRAYPROCESO) {
                                                            $NUMEROPROCESO = $ARRAYPROCESO[0]["NUMERO_PROCESO"];
                                                            $FECHAPROCESO = $ARRAYPROCESO[0]["FECHA"];
                                                            $PORCENTAJEEXPO = number_format($ARRAYPROCESO[0]["PDEXPORTACION_PROCESO"], 2);
                                                            $PORCENTAJEINDUSTRIAL = number_format($ARRAYPROCESO[0]["PDINDUSTRIAL_PROCESO"], 2);
                                                            $PORCENTAJETOTAL = number_format($ARRAYPROCESO[0]["PORCENTAJE_PROCESO"], 2);
                                                            $ARRAYTPROCESO = $TPROCESO_ADO->verTproceso($ARRAYPROCESO[0]["ID_TPROCESO"]);
                                                            if ($ARRAYTPROCESO) {
                                                                $TPROCESO = $ARRAYTPROCESO[0]["NOMBRE_TPROCESO"];
                                                            }
                                                        } else {
                                                            $NUMEROPROCESO = "Sin Datos";
                                                            $FECHAPROCESO = "";
                                                            $PORCENTAJEEXPO = "Sin Datos";
                                                            $PORCENTAJEINDUSTRIAL = "Sin Datos";
                                                            $PORCENTAJETOTAL = "Sin Datos";
                                                            $TPROCESO = "Sin Datos";
                                                        }
                                                        $ARRAYREEMBALAJE = $REEMBALAJE_ADO->verReembalaje2($s['ID_REEMBALAJE']);
                                                        if ($ARRAYREEMBALAJE) {
                                                            $NUMEROREEMBALEJE = $ARRAYREEMBALAJE[0]["ID_TREEMBALAJE"];
                                                            $FECHAREEMBALEJE = $ARRAYREEMBALAJE[0]["FECHA"];
                                                            $ARRAYTREEMBALAJE = $TREEMBALAJE_ADO->verTreembalaje($ARRAYREEMBALAJE[0]["ID_TREEMBALAJE"]);
                                                            if ($ARRAYTREEMBALAJE) {
                                                                $TREEMBALAJE = $ARRAYTREEMBALAJE[0]["NOMBRE_TREEMBALAJE"];
                                                            }
                                                        } else {
                                                            $NUMEROREEMBALEJE = "Sin Datos";
                                                            $FECHAREEMBALEJE = "";
                                                            $TREEMBALAJE = "Sin Datos";
                                                        }
                                                        $ARRAYRECEPCION = $RECEPCIONIND_ADO->verRecepcion2($s['ID_RECEPCION']);
                                                        $ARRAYDESPACHO2=$DESPACHOIND_ADO->verDespachomp2($s['ID_DESPACHO2']);
                                                        if ($ARRAYRECEPCION) {
                                                            $NUMERORECEPCION = $ARRAYRECEPCION[0]["NUMERO_RECEPCION"];
                                                            $FECHARECEPCION = $ARRAYRECEPCION[0]["FECHA"];
                                                            $NUMEROGUIARECEPCION = $ARRAYRECEPCION[0]["NUMERO_GUIA_RECEPCION"];
                                                            $FECHAGUIARECEPCION = $ARRAYRECEPCION[0]["GUIA"];
                                                            if ($ARRAYRECEPCION[0]["TRECEPCION"] == 1) {
                                                                $TIPORECEPCION = "Desde Productor";
                                                            }
                                                            if ($ARRAYRECEPCION[0]["TRECEPCION"] == 2) {
                                                                $TIPORECEPCION = "Planta Externa";
                                                            }
                                                        }else if($ARRAYDESPACHO2){                                                                
                                                            $NUMERORECEPCION = $ARRAYDESPACHO2[0]["NUMERO_DESPACHO"];
                                                            $FECHARECEPCION = $ARRAYDESPACHO2[0]["FECHA"];                                                                
                                                            $NUMEROGUIARECEPCION = $ARRAYDESPACHO2[0]["NUMERO_GUIA_DESPACHO"];
                                                            $TIPORECEPCION = "Interplanta";
                                                            $FECHAGUIARECEPCION = "";                                                                
                                                            $ARRAYPLANTA2 = $PLANTA_ADO->verPlanta($ARRAYDESPACHO2[0]['ID_PLANTA']);
                                                            if ($ARRAYPLANTA2) {
                                                                $ORIGEN = $ARRAYPLANTA2[0]['NOMBRE_PLANTA'];
                                                                $CSGCSPORIGEN=$ARRAYPLANTA2[0]['CODIGO_SAG_PLANTA'];
                                                            } else {
                                                                $ORIGEN = "Sin Datos";
                                                                $CSGCSPORIGEN="Sin Datos";
                                                            }                                                        
                                                        } else {
                                                            $FECHARECEPCION = "";
                                                            $NUMERORECEPCION = "Sin Datos";
                                                            $NUMEROGUIARECEPCION = "Sin Datos";
                                                            $FECHAGUIARECEPCION = "";
                                                            $TIPORECEPCION = "Sin Datos";
                                                        }

                                                        ?>
                                                        <tr class="text-center">
                                                            <td><?php echo "No Aplica"; ?></td>
                                                            <td><?php echo "No Aplica"; ?></td>
                                                            <td><?php echo "No Aplica"; ?></td>
                                                            <td><?php echo "No Aplica"; ?></td>
                                                            <td><?php echo $TDESPACHO; ?></td>
                                                            <td><?php echo $r['NUMERO_DESPACHO']; ?> </td>
                                                            <td><?php echo $r['FECHA']; ?></td>
                                                            <td><?php echo $NUMEROGUIADEPACHO; ?></td>
                                                            <td><?php echo $DESTINO; ?></td>
                                                            <td><?php echo ""; ?></td>
                                                            <td><?php echo ""; ?></td>
                                                            <td><?php echo ""; ?></td>
                                                            <td><?php echo ""; ?></td>
                                                            <td><?php echo "No Aplica"; ?></td>
                                                            <td><?php echo "No Aplica"; ?></td>
                                                            <td><?php echo "No Aplica"; ?></td>
                                                            <td><?php echo "No Aplica"; ?></td>
                                                            <td><?php echo "No Aplica"; ?></td>
                                                            <td><?php echo $s['FOLIO_EXIINDUSTRIAL']; ?> </td>
                                                            <td><?php echo $s['FOLIO_AUXILIAR_EXIINDUSTRIAL']; ?> </td>
                                                            <td><?php echo $s['EMBALADO']; ?></td>
                                                            <td><?php echo "Sin Datos"; ?></td>
                                                            <td><?php echo "Producto Industrial"; ?> </td>
                                                            <td><?php echo $CODIGOESTANDAR; ?></td>
                                                            <td><?php echo $NOMBREESTANDAR; ?></td>
                                                            <td><?php echo $CSGPRODUCTOR; ?></td>
                                                            <td><?php echo $NOMBREPRODUCTOR; ?></td>
                                                            <td><?php echo $NOMBRESPECIES; ?></td>
                                                            <td><?php echo $NOMBREVARIEDAD; ?></td>
                                                            <td><?php echo "Sin Datos"; ?></td>
                                                            <td><?php echo $s['NETO']; ?></td>
                                                            <td><?php echo "Sin Datos"; ?></td>
                                                            <td><?php echo "Sin Datos"; ?></td>
                                                            <td><?php echo "Sin Datos"; ?></td>
                                                            <td><?php echo $NUMERORECEPCION; ?></td>
                                                            <td><?php echo $FECHARECEPCION; ?></td>
                                                            <td><?php echo $TIPORECEPCION; ?></td>
                                                            <td><?php echo $NUMEROGUIARECEPCION; ?></td>
                                                            <td><?php echo $FECHAGUIARECEPCION; ?></td>
                                                            <td><?php echo "Sin Datos"; ?></td>
                                                            <td><?php echo ""; ?></td>
                                                            <td><?php echo $NUMEROPROCESO; ?></td>
                                                            <td><?php echo $FECHAPROCESO; ?></td>
                                                            <td><?php echo $TPROCESO; ?></td>
                                                            <td><?php echo $NUMEROREEMBALEJE; ?></td>
                                                            <td><?php echo $FECHAREEMBALEJE; ?></td>
                                                            <td><?php echo $TREEMBALAJE; ?></td>
                                                            <td><?php echo $NOMBRETMANEJO; ?></td>
                                                            <td><?php echo "Sin Datos"; ?></td>
                                                            <td><?php echo "Sin Datos"; ?></td>
                                                            <td><?php echo "Sin Datos"; ?></td>
                                                            <td><?php echo "Sin Datos"; ?></td>
                                                            <td><?php echo "Sin Datos"; ?></td>
                                                            <td><?php echo "Sin Datos"; ?></td>
                                                            <td><?php echo $NOMBRETRANSPORTE; ?></td>
                                                            <td><?php echo $NOMBRECONDUCTOR; ?></td>
                                                            <td><?php echo $r['PATENTE_CAMION']; ?></td>
                                                            <td><?php echo $r['PATENTE_CARRO']; ?></td>      
                                                            <td><?php echo $r['SEMANA']; ?></td>                             
                                                            <td><?php echo ""; ?></td>
                                                            <td><?php echo $NOMBREEMPRESA; ?></td>
                                                            <td><?php echo $NOMBREPLANTA; ?></td>
                                                            <td><?php echo $NOMBRETEMPORADA; ?></td>
                                                            <td><?php echo "No Aplica"; ?></td>
                                                            <td><?php echo "No Aplica"; ?></td>
                                                            <td><?php echo "No Aplica"; ?></td>
                                                            <td><?php echo "No Aplica"; ?></td>
                                                            <td><?php echo "No Aplica"; ?></td>
                                                            <td><?php echo "No Aplica"; ?></td>
                                                            <td><?php echo "No Aplica"; ?></td>
                                                            <td><?php echo "No Aplica"; ?></td>
                                                            <td><?php echo "No Aplica"; ?></td>
                                                            <td><?php echo "No Aplica"; ?></td>
                                                            <td><?php echo "No Aplica"; ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
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
                                    </div>
                                </div>
                            </div>  
                        </div>
                        <!-- /.box -->
                </section>
                <!-- /.content -->
            </div>
        </div>
        <?php include_once "../../assest/config/footer.php"; ?>
        <?php include_once "../../assest/config/menuExtraExpo.php"; ?>
    </div>
    <?php include_once "../../assest/config/urlBase.php"; ?>
</body>
</html>