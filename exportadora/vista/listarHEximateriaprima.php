<?php


include_once "../../assest/config/validarUsuarioExpo.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/RECEPCIONMP_ADO.php';
include_once '../../assest/controlador/ERECEPCION_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/VESPECIES_ADO.php';
include_once '../../assest/controlador/ESPECIES_ADO.php';
include_once '../../assest/controlador/TPROCESO_ADO.php';
include_once '../../assest/controlador/PROCESO_ADO.php';
include_once '../../assest/controlador/DESPACHOMP_ADO.php';
include_once '../../assest/controlador/TMANEJO_ADO.php';
include_once '../../assest/controlador/COMPRADOR_ADO.php';
include_once '../../assest/controlador/TTRATAMIENTO1_ADO.php';
include_once '../../assest/controlador/TTRATAMIENTO2_ADO.php';


include_once '../../assest/controlador/EXIMATERIAPRIMA_ADO.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$RECEPCIONMP_ADO =  new RECEPCIONMP_ADO();
$ERECEPCION_ADO =  new ERECEPCION_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$ESPECIES_ADO =  new ESPECIES_ADO();
$DESPACHOMP_ADO =  new DESPACHOMP_ADO();
$TPROCESO_ADO =  new TPROCESO_ADO();
$PROCESO_ADO =  new PROCESO_ADO();
$TMANEJO_ADO =  new TMANEJO_ADO();
$COMPRADOR_ADO =  new COMPRADOR_ADO();
$TTRATAMIENTO1_ADO =  new TTRATAMIENTO1_ADO();
$TTRATAMIENTO2_ADO =  new TTRATAMIENTO2_ADO();

$EXIMATERIAPRIMA_ADO =  new EXIMATERIAPRIMA_ADO();



//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD




//INICIALIZAR ARREGLOS
$ARRAYRECEPCION = "";
$ARRAYEXIMATERIAPRIMA = "";
$ARRAYEVERERECEPCIONID = "";
$ARRAYVERPRODUCTORID = "";
$ARRAYVERPVESPECIESID = "";
$ARRAYVERVESPECIESID = "";
$ARRAYVERESPECIESID = "";
$ARRAYVERFOLIOID = "";
$ARRAYDESPACHO2="";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES


if ($EMPRESAS   && $TEMPORADAS) {
    $ARRAYEXIMATERIAPRIMA = $EXIMATERIAPRIMA_ADO->listarEximateriaprimaEmpresaTemporada($EMPRESAS,  $TEMPORADAS);
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title> Historial Existencia MP</title>
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
         
            </script>

</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary" >
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <?php include_once "../../assest/config/menuExpo.php"; ?>
            <!-- Content Wrapper. Contains page content -->
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
                                            <li class="breadcrumb-item" aria-current="page">Modulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Informes</li>
                                            <li class="breadcrumb-item" aria-current="page">Granel</li>
                                            <li class="breadcrumb-item" aria-current="page">Existencia </li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Historial Existencia MP</a>
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
                                            <table id="hexistencia" class="table-hover table-bordered" style="width: 100%;">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>Folio Original</th>
                                                        <th>Folio Nuevo</th>
                                                        <th>Fecha Cosecha </th>
                                                        <th>Estado </th>
                                                        <th>Estado Calidad</th>
                                                        <th>Código Estandar</th>
                                                        <th>Envase/Estandar</th>
                                                        <th>CSG</th>
                                                        <th>Productor</th>
                                                        <th>Especies</th>
                                                        <th>Variedad</th>
                                                        <th>Cantidad Envase</th>
                                                        <th>Kilos Neto</th>
                                                        <th>Kilos Promedio</th>
                                                        <th>Kilos Bruto</th>
                                                        <th>Número Recepción </th>
                                                        <th>Fecha Recepción </th>
                                                        <th>Tipo Recepción </th>
                                                        <th>CSG/CSP Recepción</th>
                                                        <th>Origen Recepción </th>
                                                        <th>Número Guía Recepción </th>
                                                        <th>Fecha Guía Recepción
                                                        <th>Número Proceso </th>
                                                        <th>Fecha Proceso </th>
                                                        <th>Tipo Proceso </th>
                                                        <th>Número Despacho </th>
                                                        <th>Fecha Despacho </th>
                                                        <th>Número Guía Despacho </th>
                                                        <th>Tipo Despacho </th>
                                                        <th>CSG/CSP Despacho</th>
                                                        <th>Destino Despacho</th>
                                                        <th>Tipo Manejo</th>
                                                        <th>Tipo Tratamiento 1 </th>
                                                        <th>Tipo Tratamiento 2 </th>
                                                        <th>Gasificacion</th>
                                                        <th>Días</th>
                                                        <th>Ingreso</th>
                                                        <th>Modificación</th>
                                                        <th>Empresa</th>
                                                        <th>Planta</th>
                                                        <th>Temporada</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYEXIMATERIAPRIMA as $r) : ?>
                                                        <?php
                                                        if ($r['ESTADO'] == "0") {
                                                            $ESTADO = "Eliminado";
                                                        }
                                                        if ($r['ESTADO'] == "1") {
                                                            $ESTADO = "Ingresando";
                                                        }
                                                        if ($r['ESTADO'] == "2") {
                                                            $ESTADO = "Disponible";
                                                        }
                                                        if ($r['ESTADO'] == "3") {
                                                            $ESTADO = "En Proceso";
                                                        }
                                                        if ($r['ESTADO'] == "4") {
                                                            $ESTADO = "Procesado";
                                                        }
                                                        if ($r['ESTADO'] == "5") {
                                                            $ESTADO = "En Repaletizaje";
                                                        }
                                                        if ($r['ESTADO'] == "6") {
                                                            $ESTADO = "Repaletizado";
                                                        }
                                                        if ($r['ESTADO'] == "7") {
                                                            $ESTADO = "En Despacho";
                                                        }
                                                        if ($r['ESTADO'] == "8") {
                                                            $ESTADO = "Despachado";
                                                        }
                                                        if ($r['ESTADO'] == "9") {
                                                            $ESTADO = "En Transito";
                                                        }
                                                        if ($r['ESTADO'] == "10") {
                                                            $ESTADO = "En Rechazo";
                                                        }
                                                        if ($r['ESTADO'] == "11") {
                                                            $ESTADO = "Rechazado";
                                                        }


                                                        if($r['COLOR']==1){
                                                            $TRECHAZOCOLOR="badge badge-danger ";
                                                            $COLOR="Rechazado";
                                                        }else if($r['COLOR']==2){
                                                            $TRECHAZOCOLOR="badge badge-warning ";
                                                            $COLOR="Objetado";
                                                        }else if($r['COLOR']==3){
                                                            $TRECHAZOCOLOR="badge badge-Success ";
                                                            $COLOR="Aprobado";
                                                        }else{
                                                            $TRECHAZOCOLOR="";
                                                            $COLOR="Sin Datos";
                                                        }

                                                        $ARRAYRECEPCION = $RECEPCIONMP_ADO->verRecepcion2($r['ID_RECEPCION']);
                                                        $ARRAYDESPACHO2=$DESPACHOMP_ADO->verDespachomp2($r['ID_DESPACHO2']);
                                                        if ($ARRAYRECEPCION) {
                                                            $NUMERORECEPCION = $ARRAYRECEPCION[0]["NUMERO_RECEPCION"];
                                                            $FECHARECEPCION = $ARRAYRECEPCION[0]["FECHA"];
                                                            $NUMEROGUIARECEPCION = $ARRAYRECEPCION[0]["NUMERO_GUIA_RECEPCION"];
                                                            $FECHAGUIARECEPCION = $ARRAYRECEPCION[0]["GUIA"];
                                                            if ($ARRAYRECEPCION[0]["TRECEPCION"] == 1) {
                                                                $TIPORECEPCION = "Desde Productor";
                                                                $ARRAYPRODUCTOR2 = $PRODUCTOR_ADO->verProductor($ARRAYRECEPCION[0]['ID_PRODUCTOR']);
                                                                if ($ARRAYPRODUCTOR2) {
                                                                    $CSGCSPORIGEN=$ARRAYPRODUCTOR2[0]['CSG_PRODUCTOR'];
                                                                    $ORIGEN =  $ARRAYPRODUCTOR2[0]['NOMBRE_PRODUCTOR'];
                                                                } else {
                                                                    $ORIGEN = "Sin Datos";
                                                                    $CSGCSPORIGEN="Sin Datos";
                                                                }
                                                            }
                                                            if ($ARRAYRECEPCION[0]["TRECEPCION"] == 2) {
                                                                $TIPORECEPCION = "Planta Externa";
                                                                $ARRAYPLANTA2 = $PLANTA_ADO->verPlanta($ARRAYRECEPCION[0]['ID_PLANTA2']);
                                                                if ($ARRAYPLANTA2) {
                                                                    $ORIGEN = $ARRAYPLANTA2[0]['NOMBRE_PLANTA'];
                                                                    $CSGCSPORIGEN=$ARRAYPLANTA2[0]['CODIGO_SAG_PLANTA'];
                                                                } else {
                                                                    $ORIGEN = "Sin Datos";
                                                                    $CSGCSPORIGEN="Sin Datos";
                                                                }
                                                            }
                                                            if ($ARRAYRECEPCION[0]["TRECEPCION"] == "3") {
                                                                $TIPORECEPCION = "Desde Productor BDH";
                                                                $ARRAYPRODUCTOR2 = $PRODUCTOR_ADO->verProductor($ARRAYRECEPCION[0]['ID_PRODUCTOR']);
                                                                if ($ARRAYPRODUCTOR2) {
                                                                    $CSGCSPORIGEN=$ARRAYPRODUCTOR2[0]['CSG_PRODUCTOR'] ;
                                                                    $ORIGEN =  $ARRAYPRODUCTOR2[0]['NOMBRE_PRODUCTOR'];
                                                                } else {
                                                                    $CSGCSPORIGEN = "Sin Datos";
                                                                    $ORIGEN = "Sin Datos";
                                                                }
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
                                                            $ORIGEN = "Sin Datos";
                                                        }
                                                        $ARRAYPROCESO = $PROCESO_ADO->verProceso2($r['ID_PROCESO']);
                                                        if ($ARRAYPROCESO) {
                                                            $NUMEROPROCESO = $ARRAYPROCESO[0]["NUMERO_PROCESO"];
                                                            $FECHAPROCESO = $ARRAYPROCESO[0]["FECHA"];
                                                            $ARRAYTPROCESO = $TPROCESO_ADO->verTproceso($ARRAYPROCESO[0]["ID_TPROCESO"]);
                                                            if ($ARRAYTPROCESO) {
                                                                $TPROCESO = $ARRAYTPROCESO[0]["NOMBRE_TPROCESO"];
                                                            }
                                                        } else {
                                                            $NUMEROPROCESO = "Sin datos";
                                                            $FECHAPROCESO = "";
                                                            $TPROCESO = "Sin datos";
                                                        }

                                                        $ARRAYDESPACHO = $DESPACHOMP_ADO->verDespachomp2($r['ID_DESPACHO']);
                                                        if ($ARRAYDESPACHO) {
                                                            $NUMERODESPACHO = $ARRAYDESPACHO[0]["NUMERO_DESPACHO"];
                                                            $FECHADESPACHO = $ARRAYDESPACHO[0]["FECHA"];

                                                            if ($ARRAYDESPACHO[0]['TDESPACHO'] == "1") {
                                                                $TDESPACHO = "Interplanta";
                                                                $NUMEROGUIADESPACHO = $ARRAYDESPACHO[0]["NUMERO_GUIA_DESPACHO"];
                                                                $ARRAYPLANTA2 = $PLANTA_ADO->verPlanta($ARRAYDESPACHO[0]['ID_PLANTA2']);
                                                                if ($ARRAYPLANTA2) {
                                                                    $CSGCSPDESTINO=$ARRAYPLANTA2[0]['CODIGO_SAG_PLANTA'];
                                                                    $DESTINO = $ARRAYPLANTA2[0]['NOMBRE_PLANTA'];
                                                                } else {
                                                                    $DESTINO = "Sin Datos";
                                                                    $CSGCSPDESTINO="Sin Datos";
                                                                }
                                                            }
                                                            if ($ARRAYDESPACHO[0]['TDESPACHO'] == "2") {
                                                                $TDESPACHO = "Devolución Productor";
                                                                $NUMEROGUIADESPACHO = $ARRAYDESPACHO[0]["NUMERO_GUIA_DESPACHO"];
                                                                $ARRAYPRODUCTOR = $PRODUCTOR_ADO->verProductor($ARRAYDESPACHO[0]['ID_PRODUCTOR']);
                                                                if ($ARRAYPRODUCTOR) {
                                                                    $CSGCSPDESTINO=$ARRAYPRODUCTOR[0]['CSG_PRODUCTOR'];
                                                                    $DESTINO =  $ARRAYPRODUCTOR[0]['NOMBRE_PRODUCTOR'];
                                                                } else {
                                                                    $DESTINO = "Sin Datos";
                                                                    $CSGCSPDESTINO="Sin Datos";
                                                                }
                                                            }
                                                            if ($ARRAYDESPACHO[0]['TDESPACHO'] == "3") {
                                                                $TDESPACHO = "Venta";
                                                                $NUMEROGUIADESPACHO = $ARRAYDESPACHO[0]["NUMERO_GUIA_DESPACHO"];
                                                                $ARRAYCOMPRADOR = $COMPRADOR_ADO->verComprador($ARRAYDESPACHO[0]['ID_COMPRADOR']);
                                                                if ($ARRAYCOMPRADOR) {
                                                                    $DESTINO = $ARRAYCOMPRADOR[0]['NOMBRE_COMPRADOR'];
                                                                    $CSGCSPDESTINO="No Aplica";
                                                                } else {
                                                                    $DESTINO = "Sin Datos";
                                                                    $CSGCSPDESTINO="Sin Datos";
                                                                }
                                                            }
                                                            if ($ARRAYDESPACHO[0]['TDESPACHO'] == "4") {
                                                                $TDESPACHO = "Despacho de Descarte";
                                                                $NUMEROGUIADESPACHO = "No Aplica";
                                                                $CSGCSPDESTINO="No Aplica";
                                                                $DESTINO = $ARRAYDESPACHO[0]['REGALO_DESPACHO'];
                                                            }
                                                            if ($ARRAYDESPACHO[0]['TDESPACHO'] == "5") {
                                                                $TDESPACHO = "Planta Externa";
                                                                $NUMEROGUIADESPACHO = $ARRAYDESPACHO[0]["NUMERO_GUIA_DESPACHO"];
                                                                $ARRAYPLANTA2 = $PLANTA_ADO->verPlanta($ARRAYDESPACHO[0]['ID_PLANTA3']);
                                                                if ($ARRAYPLANTA2) {
                                                                    $DESTINO = $ARRAYPLANTA2[0]['NOMBRE_PLANTA'];
                                                                    $CSGCSPDESTINO=$ARRAYPLANTA2[0]['CODIGO_SAG_PLANTA'];
                                                                } else {
                                                                    $DESTINO = "Sin Datos";
                                                                    $CSGCSPDESTINO="Sin Datos";
                                                                }
                                                            }
                                                        }else {
                                                            $DESTINO = "Sin datos";
                                                            $TDESPACHO = "Sin datos";
                                                            $FECHADESPACHO = "";
                                                            $NUMERODESPACHO = "Sin Datos";
                                                            $NUMEROGUIADESPACHO = "Sin Datos";
                                                            $CSGCSPDESTINO="Sin Datos";
                                                        }
                                                        $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);
                                                        if ($ARRAYVERPRODUCTORID) {

                                                            $CSGPRODUCTOR = $ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'];
                                                            $NOMBREPRODUCTOR = $ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'];
                                                        } else {
                                                            $CSGPRODUCTOR = "Sin Datos";
                                                            $NOMBREPRODUCTOR = "Sin Datos";
                                                        }
                                                        $ARRAYEVERERECEPCIONID = $ERECEPCION_ADO->verEstandar($r['ID_ESTANDAR']);
                                                        if ($ARRAYEVERERECEPCIONID) {
                                                            $CODIGOESTANDAR = $ARRAYEVERERECEPCIONID[0]['CODIGO_ESTANDAR'];
                                                            $NOMBREESTANDAR = $ARRAYEVERERECEPCIONID[0]['NOMBRE_ESTANDAR'];
                                                        } else {
                                                            $CODIGOESTANDAR = "Sin Datos";
                                                            $NOMBREESTANDAR = "Sin Datos";
                                                        }
                                                        $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
                                                        if ($ARRAYVERVESPECIESID) {
                                                            $NOMBREVESPECIES = $ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'];
                                                            $ARRAYVERESPECIESID = $ESPECIES_ADO->verEspecies($ARRAYVERVESPECIESID[0]['ID_ESPECIES']);
                                                            if ($ARRAYVERVESPECIESID) {
                                                                $NOMBRESPECIES = $ARRAYVERESPECIESID[0]['NOMBRE_ESPECIES'];
                                                            } else {
                                                                $NOMBRESPECIES = "Sin Datos";
                                                            }
                                                        } else {
                                                            $NOMBREVESPECIES = "Sin Datos";
                                                            $NOMBRESPECIES = "Sin Datos";
                                                        }

                                                        
                                                        $ARRAYTMANEJO = $TMANEJO_ADO->verTmanejo($r['ID_TMANEJO']);
                                                        if ($ARRAYTMANEJO) {
                                                            $NOMBRETMANEJO = $ARRAYTMANEJO[0]['NOMBRE_TMANEJO'];
                                                        } else {
                                                            $NOMBRETMANEJO = "Sin Datos";
                                                        }
                                                        
                                                        if ($r['GASIFICADO'] == "1") {
                                                            $GASIFICADO = "SI";
                                                        } else if ($r['GASIFICADO'] == "0") {
                                                            $GASIFICADO = "NO";
                                                        } else {
                                                            $GASIFICADO = "Sin Datos";
                                                        }
                                                        $ARRAYTRATAMIENTO1=$TTRATAMIENTO1_ADO->verTtratamiento($r['ID_TTRATAMIENTO1']);
                                                        if($ARRAYTRATAMIENTO1){
                                                            $NOMBRETTRATAMIENTO1 = $ARRAYTRATAMIENTO1[0]["NOMBRE_TTRATAMIENTO"];
                                                        }else{
                                                            $NOMBRETTRATAMIENTO1="Sin Datos";
                                                        }
                                                        $ARRAYTRATAMIENTO2=$TTRATAMIENTO2_ADO->verTtratamiento($r['ID_TTRATAMIENTO2']);
                                                        if($ARRAYTRATAMIENTO2){
                                                            $NOMBRETTRATAMIENTO2 = $ARRAYTRATAMIENTO2[0]["NOMBRE_TTRATAMIENTO"];
                                                        }else{
                                                            $NOMBRETTRATAMIENTO2="Sin Datos";
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
                                                        ?>
                                                        <tr class="text-center">                                                            
                                                             <td>
                                                                <span class="<?php echo $TRECHAZOCOLOR; ?>">
                                                                   <?php echo $r['FOLIO_EXIMATERIAPRIMA']; ?>
                                                                </span>
                                                            </td>                                                            
                                                            <td>
                                                                <span class="<?php echo $TRECHAZOCOLOR; ?>">
                                                                   <?php echo $r['FOLIO_AUXILIAR_EXIMATERIAPRIMA']; ?>
                                                                </span>
                                                            </td>
                                                            <td><?php echo $r['COSECHA']; ?></td>
                                                            <td><?php echo $ESTADO; ?></td>
                                                            <td><?php echo $COLOR; ?></td>
                                                            <td><?php echo $CODIGOESTANDAR; ?></td>
                                                            <td><?php echo $NOMBREESTANDAR; ?></td>
                                                            <td><?php echo $CSGPRODUCTOR; ?></td>
                                                            <td><?php echo $NOMBREPRODUCTOR; ?></td>
                                                            <td><?php echo $NOMBRESPECIES; ?></td>
                                                            <td><?php echo $NOMBREVESPECIES; ?></td>
                                                            <td><?php echo $r['ENVASE']; ?></td>
                                                            <td><?php echo $r['NETO']; ?></td>
                                                            <td><?php echo $r['PROMEDIO']; ?></td>
                                                            <td><?php echo $r['BRUTO']; ?></td>
                                                            <td><?php echo $NUMERORECEPCION; ?></td>
                                                            <td><?php echo $FECHARECEPCION; ?></td>
                                                            <td><?php echo $TIPORECEPCION; ?></td>
                                                            <td><?php echo $CSGCSPORIGEN; ?></td>
                                                            <td><?php echo $ORIGEN; ?></td>
                                                            <td><?php echo $NUMEROGUIARECEPCION; ?></td>
                                                            <td><?php echo $FECHAGUIARECEPCION; ?></td>                                                           
                                                            <td><?php echo $NUMEROPROCESO; ?></td>
                                                            <td><?php echo $FECHAPROCESO; ?></td>
                                                            <td><?php echo $TPROCESO; ?></td>
                                                            <td><?php echo $NUMERODESPACHO; ?></td>
                                                            <td><?php echo $FECHADESPACHO; ?></td>
                                                            <td><?php echo $NUMEROGUIADESPACHO; ?></td>
                                                            <td><?php echo $TDESPACHO; ?></td>
                                                            <td><?php echo $CSGCSPDESTINO; ?></td>
                                                            <td><?php echo $DESTINO; ?></td>
                                                            <td><?php echo $NOMBRETMANEJO; ?></td>
                                                            <td><?php echo $NOMBRETTRATAMIENTO1; ?></td>
                                                            <td><?php echo $NOMBRETTRATAMIENTO2; ?></td>
                                                            <td><?php echo $GASIFICADO; ?></td>
                                                            <td><?php echo $r['DIAS']; ?></td>
                                                            <td><?php echo $r['INGRESO']; ?></td>
                                                            <td><?php echo $r['MODIFICACION']; ?></td>
                                                            <td><?php echo $NOMBREEMPRESA; ?></td>
                                                            <td><?php echo $NOMBREPLANTA; ?></td>
                                                            <td><?php echo $NOMBRETEMPORADA; ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr class="text-center" id="filtro">
                                                        <th>Folio Original</th>
                                                        <th>Folio Nuevo</th>
                                                        <th>Fecha Cosecha </th>
                                                        <th>Estado </th>
                                                        <th>Estado Calidad</th>
                                                        <th>Código Estandar</th>
                                                        <th>Envase/Estandar</th>
                                                        <th>CSG</th>
                                                        <th>Productor</th>
                                                        <th>Especies</th>
                                                        <th>Variedad</th>
                                                        <th>Cantidad Envase</th>
                                                        <th>Kilos Neto</th>
                                                        <th>Kilos Promedio</th>
                                                        <th>Kilos Bruto</th>
                                                        <th>Número Recepción </th>
                                                        <th>Fecha Recepción </th>
                                                        <th>Tipo Recepción </th>
                                                        <th>CSG/CSP Recepción</th>
                                                        <th>Origen Recepción </th>
                                                        <th>Número Guía Recepción </th>
                                                        <th>Fecha Guía Recepción
                                                        <th>Número Proceso </th>
                                                        <th>Fecha Proceso </th>
                                                        <th>Tipo Proceso </th>
                                                        <th>Número Despacho </th>
                                                        <th>Fecha Despacho </th>
                                                        <th>Número Guía Despacho </th>
                                                        <th>Tipo Despacho </th>
                                                        <th>CSG/CSP Despacho</th>
                                                        <th>Destino Despacho</th>
                                                        <th>Tipo Manejo</th>
                                                        <th>Tipo Tratamiento 1 </th>
                                                        <th>Tipo Tratamiento 2 </th>
                                                        <th>Gasificacion</th>
                                                        <th>Días</th>
                                                        <th>Ingreso</th>
                                                        <th>Modificación</th>
                                                        <th>Empresa</th>
                                                        <th>Planta</th>
                                                        <th>Temporada</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
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
                <?php include_once "../../assest/config/menuExtraExpo.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../../assest/config/urlBase.php"; ?>
</body>

</html>