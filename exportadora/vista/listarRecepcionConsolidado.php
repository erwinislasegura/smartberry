<?php

include_once "../../assest/config/validarUsuarioExpo.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES


include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/ESPECIES_ADO.php';
include_once '../../assest/controlador/VESPECIES_ADO.php';
include_once '../../assest/controlador/TRANSPORTE_ADO.php';
include_once '../../assest/controlador/CONDUCTOR_ADO.php';
include_once '../../assest/controlador/TMANEJO_ADO.php';
include_once '../../assest/controlador/TCALIBRE_ADO.php';
include_once '../../assest/controlador/TEMBALAJE_ADO.php';

include_once '../../assest/controlador/EEXPORTACION_ADO.php';
include_once '../../assest/controlador/EXIEXPORTACION_ADO.php';
include_once '../../assest/controlador/RECEPCIONPT_ADO.php';
include_once '../../assest/controlador/DRECEPCIONPT_ADO.php';

include_once '../../assest/controlador/ERECEPCION_ADO.php';
include_once '../../assest/controlador/EXIMATERIAPRIMA_ADO.php';
include_once '../../assest/controlador/RECEPCIONMP_ADO.php';
include_once '../../assest/controlador/DRECEPCIONMP_ADO.php';

include_once '../../assest/controlador/EINDUSTRIAL_ADO.php';
include_once '../../assest/controlador/RECEPCIONIND_ADO.php';
include_once '../../assest/controlador/DRECEPCIONIND_ADO.php';
include_once '../../assest/controlador/EXIINDUSTRIAL_ADO.php';
//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$TRANSPORTE_ADO =  new TRANSPORTE_ADO();
$CONDUCTOR_ADO =  new CONDUCTOR_ADO();
$ESPECIES_ADO =  new ESPECIES_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$PRODUCTOR_ADO = new PRODUCTOR_ADO();
$TMANEJO_ADO = new TMANEJO_ADO();
$TCALIBRE_ADO = new TCALIBRE_ADO();
$TEMBALAJE_ADO =  new TEMBALAJE_ADO();

$EEXPORTACION_ADO = new EEXPORTACION_ADO();
$EXIEXPORTACION_ADO = new EXIEXPORTACION_ADO();
$RECEPCIONPT_ADO =  new RECEPCIONPT_ADO();
$DRECEPCIONPT_ADO =  new DRECEPCIONPT_ADO();


$ERECEPCION_ADO =  new ERECEPCION_ADO();
$EXIMATERIAPRIMA_ADO =  new EXIMATERIAPRIMA_ADO();
$RECEPCIONMP_ADO =  new RECEPCIONMP_ADO();
$DRECEPCIONMP_ADO =  new DRECEPCIONMP_ADO();


$EINDUSTRIAL_ADO =  new EINDUSTRIAL_ADO();
$RECEPCIONIND_ADO =  new RECEPCIONIND_ADO();
$DRECEPCIONIND_ADO =  new DRECEPCIONIND_ADO();
$EXIINDUSTRIAL_ADO =  new EXIINDUSTRIAL_ADO();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";

$TOTALGUIA = "";
$TOTALBRUTO = 0;
$TOTALNETO = 0;
$TOTALENVASE = 0;
$ORIGEN = "";

$FECHADESDE = "";
$FECHAHASTA = "";
$PRODUCTOR = "";

$NUMEROGUIA = "";

//INICIALIZAR ARREGLOS
$ARRAYRECEPCION = "";
$ARRAYRECEPCIONTOTALES = "";
$ARRAYVEREMPRESA = "";
$ARRAYVERPRODUCTOR = "";
$ARRAYVERTRANSPORTE = "";
$ARRAYVERCONDUCTOR = "";
$ARRAYFECHA = "";
$ARRAYPRODUCTOR = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES


if ($EMPRESAS && $TEMPORADAS) {


    $ARRAYRECEPCIONIND = $RECEPCIONIND_ADO->listarRecepcionEmpresaTemporadaCBX($EMPRESAS,  $TEMPORADAS);/*
    $ARRAYRECEPCIONINDTOTALES = $RECEPCIONIND_ADO->obtenerTotalesRecepcionEmpresaTemporadaCBX($EMPRESAS,  $TEMPORADAS);
    $TOTALNETOIND = $ARRAYRECEPCIONINDTOTALES[0]['NETO'];
    $TOTALBRUTOIND = $ARRAYRECEPCIONINDTOTALES[0]['BRUTO'];
    $TOTALENVASEIND = $ARRAYRECEPCIONINDTOTALES[0]['ENVASE'];*/

    $ARRAYRECEPCIONMP = $RECEPCIONMP_ADO->listarRecepcionEmpresaTemporadaCBX($EMPRESAS,  $TEMPORADAS);/*
    $ARRAYRECEPCIONMPTOTALES = $RECEPCIONMP_ADO->obtenerTotalesRecepcionEmpresaTemporadaCBX($EMPRESAS, $TEMPORADAS);
    $TOTALBRUTOMP = $ARRAYRECEPCIONMPTOTALES[0]['BRUTO'];
    $TOTALNETOMP = $ARRAYRECEPCIONMPTOTALES[0]['NETO'];
    $TOTALENVASEMP = $ARRAYRECEPCIONMPTOTALES[0]['ENVASE'];*/

    
    $ARRAYRECEPCIONPT = $RECEPCIONPT_ADO->listarRecepcionEmpresaTemporadaCBX($EMPRESAS,  $TEMPORADAS);/*
    $ARRAYRECEPCIONPTTOTALES = $RECEPCIONPT_ADO->obtenerTotalesRecepcionEmpresaTemporadaCBX($EMPRESAS,  $TEMPORADAS);
    $TOTALBRUTOPT = $ARRAYRECEPCIONPTTOTALES[0]['BRUTO'];
    $TOTALNETOPT = $ARRAYRECEPCIONPTTOTALES[0]['NETO'];
    $TOTALENVASEPT = $ARRAYRECEPCIONPTTOTALES[0]['ENVASE'];*/

    /*
    $TOTALNETO  = number_format( $TOTALNETOMP + $TOTALNETOIND + $TOTALNETOPT, 2, ",", ".");
    $TOTALBRUTO = number_format( $TOTALBRUTOMP + $TOTALBRUTOIND + $TOTALBRUTOPT, 2, ",", ".");
    $TOTALENVASE  = number_format( $TOTALENVASEMP + $TOTALENVASEIND + $TOTALENVASEPT, 2, ",", ".");*/
}







?>


<!DOCTYPE html>
<html lang="ES-es">

<head>
    <title>Consolidado Recepción</title>
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

                //FUNCION PARA ABRIR VENTANA QUE SE ENCUENTRA LA OPERACIONES DE DETALLE DE RECEPCION
                function abrirVentana(url) {
                    var opciones =
                        "'directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=1000, height=800'";
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
        <?php include_once "../../assest/config/menuExpo.php"; ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-full">

                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            <h3 class="page-title">Gestión</h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                        <li class="breadcrumb-item" aria-current="page">Modulo</li>
                                        <li class="breadcrumb-item" aria-current="page">Informe</li>
                                        <li class="breadcrumb-item" aria-current="page">Gestión</li>
                                        <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Consolidado Recepción </a>
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
                                        <table id="consolidadorf" class=" table-hover  " style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>N° Folio </th>
                                                    <th>Fecha Embalado/Cosecha </th>
                                                    <th>Tipo Producto</th>
                                                    <th>Código Estandar</th>
                                                    <th>Envase/Estandar</th>
                                                    <th>CSG</th>
                                                    <th>Productor</th>
                                                    <th>Especies</th>
                                                    <th>Variedad</th>
                                                    <th>Cantidad Envase</th>
                                                    <th>Kilo Neto </th>
                                                    <th>% Deshidratación </th>
                                                    <th>Kilo Con Deshidratación </th>
                                                    <th>Kilo Bruto </th>
                                                    <th>Número Recepción</th>
                                                    <th>Fecha Recepción </th>
                                                    <th>Tipo Recepción</th>
                                                    <th>Origen Recepción</th>
                                                    <th>Número Guía Recepción</th>
                                                    <th>Fecha Guía Recepción </th>
                                                    <th>Tipo Manejo </th>
                                                    <th>Tipo Calibre </th>
                                                    <th>Tipo Embalaje </th>
                                                    <th>Stock </th>
                                                    <th>Embolsado</th>
                                                    <th>Gasificacion</th>
                                                    <th>Prefrío</th>
                                                    <th>Transporte </th>
                                                    <th>Nombre Conductor </th>
                                                    <th>Patente Camión </th>
                                                    <th>Patente Carro </th>
                                                    <th>Semana Recepción </th>
                                                    <th>Semana Guía </th>
                                                    <th>Empresa</th>
                                                    <th>Planta</th>
                                                    <th>Temporada</th>
                                                </tr>
                                            </thead>
                                            <tbody>                                                
                                                <?php foreach ($ARRAYRECEPCIONPT as $r) : ?>
                                                    <?php
                                                    if ($r['TRECEPCION'] == "1") {
                                                        $TRECEPCION = "Desde Productor ";
                                                        $ARRAYPRODUCTOR2 = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);
                                                        if ($ARRAYPRODUCTOR2) {
                                                            $ORIGEN = $ARRAYPRODUCTOR2[0]['CSG_PRODUCTOR'] . ":" . $ARRAYPRODUCTOR2[0]['NOMBRE_PRODUCTOR'];
                                                        } else {
                                                            $ORIGEN = "Sin Datos";
                                                        }
                                                    } else if ($r['TRECEPCION'] == "2") {
                                                        $TRECEPCION = "Planta Externa";
                                                        $ARRAYPLANTA2 = $PLANTA_ADO->verPlanta($r['ID_PLANTA2']);
                                                        if ($ARRAYPLANTA2) {
                                                            $ORIGEN = $ARRAYPLANTA2[0]['NOMBRE_PLANTA'];
                                                        } else {
                                                            $ORIGEN = "Sin Datos";
                                                        }
                                                    } else {
                                                        $TRECEPCION = "Sin Datos";
                                                        $ORIGEN = "Sin Datos";
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

                                                    $ARRAYTOMADO = $DRECEPCIONPT_ADO->buscarPorIdRecepcion($r['ID_RECEPCION']);
                                                    ?>

                                                    <?php foreach ($ARRAYTOMADO as $s) : ?>
                                                        <?php

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
                                                        $ARRAYTCALIBRE = $TCALIBRE_ADO->verCalibre($s['ID_TCALIBRE']);
                                                        if ($ARRAYTCALIBRE) {
                                                            $NOMBRETCALIBRE = $ARRAYTCALIBRE[0]['NOMBRE_TCALIBRE'];
                                                        } else {
                                                            $NOMBRETCALIBRE = "Sin Datos";
                                                        }
                                                        $ARRAYTMANEJO = $TMANEJO_ADO->verTmanejo($s['ID_TMANEJO']);
                                                        if ($ARRAYTMANEJO) {
                                                            $NOMBRETMANEJO = $ARRAYTMANEJO[0]['NOMBRE_TMANEJO'];
                                                        } else {
                                                            $NOMBRETMANEJO = "Sin Datos";
                                                        }

                                                        $ARRAYTEMBALAJE = $TEMBALAJE_ADO->verEmbalaje($s['ID_TEMBALAJE']);
                                                        if ($ARRAYTEMBALAJE) {
                                                            $NOMBRETEMBALAJE = $ARRAYTEMBALAJE[0]['NOMBRE_TEMBALAJE'];
                                                        } else {
                                                            $NOMBRETEMBALAJE = "Sin Datos";
                                                        }
                                                        $ARRAYESTANDAR = $EEXPORTACION_ADO->verEstandar($s['ID_ESTANDAR']);
                                                        if ($ARRAYESTANDAR) {
                                                            $CODIGOESTANDAR = $ARRAYESTANDAR[0]['CODIGO_ESTANDAR'];
                                                            $NOMBREESTANDAR = $ARRAYESTANDAR[0]['NOMBRE_ESTANDAR'];
                                                        } else {
                                                            $CODIGOESTANDAR = "Sin Datos";
                                                            $NOMBREESTANDAR = "Sin Datos";
                                                        }
                                                        $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($s['ID_PRODUCTOR']);
                                                        if ($ARRAYVERPRODUCTORID) {
                                                            $CSGPRODUCTOR = $ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'];
                                                            $NOMBREPRODUCTOR = $ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'];
                                                        } else {
                                                            $CSGPRODUCTOR = "Sin Datos";
                                                            $NOMBREPRODUCTOR = "Sin Datos";
                                                        }
                                                        if ($s['EMBOLSADO_DRECEPCION'] == "0") {
                                                            $EMBOLSADO = "NO";
                                                        } else if ($s['EMBOLSADO_DRECEPCION'] == "1") {
                                                            $EMBOLSADO =  "SI";
                                                        } else {
                                                            $EMBOLSADO = "Sin Datos";
                                                        }
                                                        if ($s['STOCK_DRECEPCION'] != "") {
                                                            $STOCK = $s['STOCK_DRECEPCION'];
                                                        } else if ($s['STOCK_DRECEPCION'] == "") {
                                                            $STOCK = "Sin Datos";
                                                        } else {
                                                            $STOCK = "Sin Datos";
                                                        }
                                                        if ($s['GASIFICADO_DRECEPCION'] == "1") {
                                                            $GASIFICADO = "SI";
                                                        } else if ($s['GASIFICADO_DRECEPCION'] == "0") {
                                                            $GASIFICADO = "NO";
                                                        } else {
                                                            $GASIFICADO = "Sin Datos";
                                                        }
                                                        if ($s['PREFRIO_DRECEPCION'] == "0") {
                                                            $PREFRIO = "NO";
                                                        } else if ($s['PREFRIO_DRECEPCION'] == "1") {
                                                            $PREFRIO =  "SI";
                                                        } else {
                                                            $PREFRIO = "Sin Datos";
                                                        }
                                                        ?>
                                                        <tr class="text-center">
                                                            <td><?php echo $s['FOLIO_DRECEPCION']; ?></td>
                                                            <td><?php echo $s['EMBALADO']; ?></td>
                                                            <td><?php echo "Producto Terminado"; ?> </td>
                                                            <td><?php echo $CODIGOESTANDAR; ?></td>
                                                            <td><?php echo $NOMBREESTANDAR; ?></td>
                                                            <td><?php echo $CSGPRODUCTOR; ?></td>
                                                            <td><?php echo $NOMBREPRODUCTOR; ?></td>
                                                            <td><?php echo $NOMBRESPECIES; ?></td>
                                                            <td><?php echo $NOMBREVARIEDAD; ?></td>
                                                            <td><?php echo $s['ENVASE']; ?></td>
                                                            <td><?php echo $s['NETO']; ?></td>
                                                            <td><?php echo $s['PORCENTAJE'] ?></td>
                                                            <td><?php echo $s['DESHIDRATACION']; ?></td>
                                                            <td><?php echo $s['BRUTO']; ?></td>
                                                            <td><?php echo $r['NUMERO_RECEPCION']; ?> </td>
                                                            <td><?php echo $r['FECHA']; ?></td>
                                                            <td><?php echo $TRECEPCION;  ?></td>
                                                            <td><?php echo $ORIGEN;  ?></td>
                                                            <td><?php echo $r['NUMERO_GUIA_RECEPCION']; ?></td>
                                                            <td><?php echo $r['FECHA_GUIA']; ?></td>
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
                                                            <td><?php echo $r['SEMANAGUIA']; ?></td>
                                                            <td><?php echo $NOMBREEMPRESA; ?></td>
                                                            <td><?php echo $NOMBREPLANTA; ?></td>
                                                            <td><?php echo $NOMBRETEMPORADA; ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php endforeach; ?>
                                                <?php foreach ($ARRAYRECEPCIONIND as $r) : ?>

                                                    <?php
                                                    if ($r['TRECEPCION'] == "1") {
                                                        $TRECEPCION = "Desde Productor ";
                                                        $ARRAYPRODUCTOR2 = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);
                                                        if ($ARRAYPRODUCTOR2) {
                                                            $ORIGEN = $ARRAYPRODUCTOR2[0]['CSG_PRODUCTOR'] . ":" . $ARRAYPRODUCTOR2[0]['NOMBRE_PRODUCTOR'];
                                                        } else {
                                                            $ORIGEN = "Sin Datos";
                                                        }
                                                    } else if ($r['TRECEPCION'] == "2") {
                                                        $TRECEPCION = "Planta Externa";
                                                        $ARRAYPLANTA2 = $PLANTA_ADO->verPlanta($r['ID_PLANTA2']);
                                                        if ($ARRAYPLANTA2) {
                                                            $ORIGEN = $ARRAYPLANTA2[0]['NOMBRE_PLANTA'];
                                                        } else {
                                                            $ORIGEN = "Sin Datos";
                                                        }
                                                    } else {
                                                        $TRECEPCION = "Sin Datos";
                                                        $ORIGEN = "Sin Datos";
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

                                                    $ARRAYTOMADO = $DRECEPCIONIND_ADO->buscarPorRecepcion($r['ID_RECEPCION']);
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
                                                        $ARRAYTMANEJO = $TMANEJO_ADO->verTmanejo($s['ID_TMANEJO']);
                                                        if ($ARRAYTMANEJO) {
                                                            $NOMBRETMANEJO = $ARRAYTMANEJO[0]['NOMBRE_TMANEJO'];
                                                        } else {
                                                            $NOMBRETMANEJO = "Sin Datos";
                                                        }
                                                        $ARRAYESTANDAR = $EINDUSTRIAL_ADO->verEstandar($s['ID_ESTANDAR']);
                                                        if ($ARRAYESTANDAR) {
                                                            $CODIGOESTANDAR = $ARRAYESTANDAR[0]['CODIGO_ESTANDAR'];
                                                            $NOMBREESTANDAR = $ARRAYESTANDAR[0]['NOMBRE_ESTANDAR'];
                                                        } else {
                                                            $CODIGOESTANDAR = "Sin Datos";
                                                            $NOMBREESTANDAR = "Sin Datos";
                                                        }

                                                        ?>
                                                        <tr class="text-center">
                                                            <td><?php echo $s['FOLIO_DRECEPCION']; ?></td>
                                                            <td><?php echo $s['EMBALADO']; ?></td>
                                                            <td><?php echo "Producto Industrial"; ?> </td>
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
                                                            <td><?php echo $r['NUMERO_RECEPCION']; ?> </td>
                                                            <td><?php echo $r['FECHA']; ?></td>
                                                            <td><?php echo $TRECEPCION; ?></td>
                                                            <td><?php echo $ORIGEN; ?></td>
                                                            <td><?php echo $r['NUMERO_GUIA_RECEPCION']; ?></td>
                                                            <td><?php echo $r['FECHA_GUIA']; ?></td>
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
                                                            <td><?php echo $r['SEMANAGUIA']; ?></td>
                                                            <td><?php echo $NOMBREEMPRESA; ?></td>
                                                            <td><?php echo $NOMBREPLANTA; ?></td>
                                                            <td><?php echo $NOMBRETEMPORADA; ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php endforeach; ?>
                                                <?php foreach ($ARRAYRECEPCIONMP as $r) : ?>
                                                    <?php
                                                    if ($r['TRECEPCION'] == "1") {
                                                        $TRECEPCION = "Desde Productor ";
                                                        $ARRAYPRODUCTOR2 = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);
                                                        if ($ARRAYPRODUCTOR2) {
                                                            $ORIGEN = $ARRAYPRODUCTOR2[0]['CSG_PRODUCTOR'] . ":" . $ARRAYPRODUCTOR2[0]['NOMBRE_PRODUCTOR'];
                                                        } else {
                                                            $ORIGEN = "Sin Datos";
                                                        }
                                                    } else if ($r['TRECEPCION'] == "2") {
                                                        $TRECEPCION = "Planta Externa";
                                                        $ARRAYPLANTA2 = $PLANTA_ADO->verPlanta($r['ID_PLANTA2']);
                                                        if ($ARRAYPLANTA2) {
                                                            $ORIGEN = $ARRAYPLANTA2[0]['NOMBRE_PLANTA'];
                                                        } else {
                                                            $ORIGEN = "Sin Datos";
                                                        }
                                                    }else if ($r['TRECEPCION'] == "3") {
                                                        $TRECEPCION = "Desde Productor BDH";
                                                        $ARRAYPRODUCTOR2 = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);
                                                        if ($ARRAYPRODUCTOR2) {
                                                            $ORIGEN = $ARRAYPRODUCTOR2[0]['CSG_PRODUCTOR'] . ":" . $ARRAYPRODUCTOR2[0]['NOMBRE_PRODUCTOR'];
                                                        } else {
                                                            $ORIGEN = "Sin Datos";
                                                        }
                                                    }  else {
                                                        $TRECEPCION = "Sin Datos";
                                                        $ORIGEN = "Sin Datos";
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

                                                    $ARRAYTOMADO = $DRECEPCIONMP_ADO->buscarPorRecepcion($r['ID_RECEPCION']);
                                                    ?>
                                                    <?php foreach ($ARRAYTOMADO as $s) : ?>
                                                        <?php

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
                                                        $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($s['ID_PRODUCTOR']);
                                                        if ($ARRAYVERPRODUCTORID) {
                                                            $CSGPRODUCTOR = $ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'];
                                                            $NOMBREPRODUCTOR = $ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'];
                                                        } else {
                                                            $CSGPRODUCTOR = "Sin Datos";
                                                            $NOMBREPRODUCTOR = "Sin Datos";
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
                                                        if ($s['GASIFICADO_DRECEPCION'] == "1") {
                                                            $GASIFICADO = "SI";
                                                        } else if ($s['GASIFICADO_DRECEPCION'] == "0") {
                                                            $GASIFICADO = "NO";
                                                        } else {
                                                            $GASIFICADO = "Sin Datos";
                                                        }
                                                        ?>
                                                        <tr class="text-center">
                                                            <td><?php echo $s['FOLIO_DRECEPCION']; ?></td>
                                                            <td><?php echo $s['COSECHA']; ?></td>
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
                                                            <td><?php echo $r['NUMERO_RECEPCION']; ?> </td>
                                                            <td><?php echo $r['FECHA']; ?></td>
                                                            <td><?php echo $TRECEPCION; ?></td>
                                                            <td><?php echo $ORIGEN; ?></td>
                                                            <td><?php echo $r['NUMERO_GUIA_RECEPCION']; ?></td>
                                                            <td><?php echo $r['FECHA_GUIA']; ?></td>
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
                                                            <td><?php echo $r['SEMANAGUIA']; ?></td>
                                                            <td><?php echo $NOMBREEMPRESA; ?></td>
                                                            <td><?php echo $NOMBREPLANTA; ?></td>
                                                            <td><?php echo $NOMBRETEMPORADA; ?></td>
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
        <?php include_once "../../assest//config/menuExtraExpo.php"; ?>
    </div>
    <?php include_once "../../assest/config/urlBase.php"; ?>
</body>

</html>