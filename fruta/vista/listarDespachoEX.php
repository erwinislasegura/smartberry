<?php

include_once "../../assest/config/validarUsuarioFruta.php";

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


$TOTALBRUTO = "";
$TOTALNETO = "";
$TOTALENVASE = "";
$FECHADESDE = "";
$FECHAHASTA = "";
$DISABLEDP="";
$DISABLEDT="";

$PRODUCTOR = "";
$NUMEROGUIA = "";

//INICIALIZAR ARREGLOS
$ARRAYDESPACHOEX = "";
$ARRAYDESPACHOEXTOTALES = "";
$ARRAYVEREMPRESA = "";
$ARRAYVERPRODUCTOR = "";
$ARRAYVERTRANSPORTE = "";
$ARRAYVERCONDUCTOR = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES



if ($EMPRESAS  && $PLANTAS && $TEMPORADAS) {
    $ARRAYDESPACHOEX = $DESPACHOEX_ADO->listarDespachoexEmpresaPlantaTemporadaCBX($EMPRESAS, $PLANTAS, $TEMPORADAS);
}

include_once "../../assest/config/validarDatosUrl.php";
include_once "../../assest/config/datosUrLP.php";




?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Agrupado Despacho Exportación</title>
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
                            <h3 class="page-title">Frigorifico</h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                        <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                        <li class="breadcrumb-item" aria-current="page">Frigorifico</li>
                                        <li class="breadcrumb-item" aria-current="page">Despacho Exportación</li>
                                        <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Agrupado Despacho </a>  </li>
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
                                        <table id="despachoex" class="table-hover " style="width: 100%;">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Número </th>
                                                    <th>Estado</th>
                                                    <th class="text-center">Operaciónes</th>
                                                    <th>Fecha Despacho </th>
                                                    <th>Fecha Guía </th>
                                                    <th>Número Sello</th>
                                                    <th>Número Guía </th>
                                                    <th>Número Referencia </th>
                                                    <th>Número Contenedor </th>
                                                    <th>Cantidad Envase</th>
                                                    <th>Kilos Neto</th>
                                                    <th>Kilos Bruto</th>
                                                    <th>Fecha Ingreso</th>
                                                    <th>Fecha Modificación</th>
                                                    <th>Transporte </th>
                                                    <th>Nombre Conductor </th>
                                                    <th>Patente Camión </th>
                                                    <th>Patente Carro </th>
                                                    <th>Semana Despacho </th>
                                                    <th>Semana Guía </th>
                                                    <th>Empresa</th>
                                                    <th>Planta</th>
                                                    <th>Temporada</th>
                                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($ARRAYDESPACHOEX as $r) : ?>

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
                                                        $NUMEROREFERENCIA=$ARRAYICARGA[0]['NREFERENCIA_ICARGA'];
                                                        $FECHAETD=$ARRAYICARGA[0]['FECHAETD_ICARGA'];
                                                        $FECHAETA=$ARRAYICARGA[0]['FECHAETA_ICARGA'];
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
                                                        $FECHAETD=$r['FECHAETD_DESPACHOEX'];
                                                        $FECHAETA=$r['FECHAETA_DESPACHOEX'];
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
                                                    $ARRAYTOMADO = $EXIEXPORTACION_ADO->buscarPordespachoEx2($r['ID_DESPACHOEX']);
                                                    if(empty($ARRAYTOMADO)){
                                                        $DISABLEDT="disabled";
                                                    }else{
                                                        $DISABLEDT="";
                                                    }
                                                    if( strlen($r['NUMERO_PLANILLA_DESPACHOEX'])==0){
                                                        $DISABLEDP="disabled";
                                                    }else{
                                                        $DISABLEDP="";
                                                    }
                                                    ?>

                                                    <tr class="text-center">
                                                        <td><?php echo $r['NUMERO_DESPACHOEX']; ?></td>
                                                        <td>
                                                            <?php if ($r['ESTADO'] == "0") { ?>
                                                                <button type="button" class="btn btn-block btn-danger">Cerrado</button>
                                                            <?php  }  ?>
                                                            <?php if ($r['ESTADO'] == "1") { ?>
                                                                <button type="button" class="btn btn-block btn-success">Abierto</button>
                                                            <?php  }  ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <form method="post" id="form1">
                                                                <div class="list-icons d-inline-flex">
                                                                    <div class="list-icons-item dropdown">
                                                                        <button class="btn btn-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <i class="glyphicon glyphicon-cog"></i>
                                                                        </button>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <button class="dropdown-menu" aria-labelledby="dropdownMenuButton"></button>
                                                                            <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_DESPACHOEX']; ?>" />
                                                                            <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroDespachoEX" />
                                                                            <input type="hidden" class="form-control" placeholder="URL" id="URLO" name="URLO" value="listarDespachoEX" />
                                                                            <?php if ($r['ESTADO'] == "0") { ?>
                                                                                <span href="#" class="dropdown-item" data-toggle="tooltip" title="Ver">
                                                                                    <button type="submit" class="btn btn-info btn-block " id="VERURL" name="VERURL">
                                                                                        <i class="ti-eye"></i> Ver
                                                                                    </button>
                                                                                </span>
                                                                            <?php } ?>
                                                                            <?php if ($r['ESTADO'] == "1") { ?>
                                                                                <span href="#" class="dropdown-item" data-toggle="tooltip" title="Editar">
                                                                                    <button type="submit" class="btn  btn-warning btn-block" id="EDITARURL" name="EDITARURL">
                                                                                        <i class="ti-pencil-alt"></i> Editar
                                                                                    </button>
                                                                                </span>
                                                                            <?php } ?>
                                                                            <hr>
                                                                            <span href="#" class="dropdown-item" data-toggle="tooltip" title="Packing List">
                                                                                <button type="button" class="btn  btn-danger  btn-block" id="defecto" name="informe" title="Informe" Onclick="abrirPestana('../../assest/documento/informeDespachoPtPackingList.php?parametro=<?php echo $r['ID_DESPACHOEX']; ?>&&usuario=<?php echo $IDUSUARIOS; ?>'); ">
                                                                                    <i class="fa fa-file-pdf-o"></i> Packing List
                                                                                </button>
                                                                            </span>
                                                                            <span href="#" class="dropdown-item" data-toggle="tooltip" title="Informe Comercial">
                                                                                <button type="button" class="btn  btn-danger btn-block" id="defecto" name="tarjas" title="Tarjas" Onclick="abrirPestana('../../assest/documento/informeDespachoPtComercial.php?parametro=<?php echo $r['ID_DESPACHOEX']; ?>&&usuario=<?php echo $IDUSUARIOS; ?>'); ">
                                                                                    <i class="fa fa-file-pdf-o"></i> Comercial
                                                                                </button>
                                                                            </span>
                                                                            <span href="#" class="dropdown-item" data-toggle="tooltip" title="Packing List">
                                                                                <button type="button" class="btn  btn-success btn-block" id="defecto" name="tarjas" title="Packing List"  Onclick="abrirPestana('../../assest/reporte/reporteDespachoExPackingList.php?parametro=<?php echo $r['ID_DESPACHOEX']; ?>&&usuario=<?php echo $IDUSUARIOS; ?>'); ">
                                                                                    <i class="fa fa-file-excel-o"></i> Packing List
                                                                                </button>
                                                                            </span>
                                                                            <span href="#" class="dropdown-item" data-toggle="tooltip" title="CSV">
                                                                                <button type="button" class="btn  btn-success btn-block" id="defecto" name="tarjas" title="Archivo Plano" <?php if($r['TINPUSDA']==1){echo "disabled";}?>  <?php echo $DISABLEDP; ?> <?php echo $DISABLEDT; ?> Onclick="abrirPestana('../../assest/csv/CsvDespachoEx.php?parametro=<?php echo $r['ID_DESPACHOEX']; ?>&&usuario=<?php echo $IDUSUARIOS; ?>'); ">
                                                                                    <i class="fa fa-file-excel-o"></i> Archivo Plano
                                                                                </button>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </td>
                                                        <td><?php echo $r['FECHA']; ?></td>
                                                        <td><?php echo $r['GUIA']; ?></td>
                                                        <td><?php echo $r['NUMERO_SELLO_DESPACHOEX']; ?></td>
                                                        <td><?php echo $r['NUMERO_GUIA_DESPACHOEX']; ?></td>
                                                        <td><?php echo $NUMEROREFERENCIA; ?></td>
                                                        <td><?php echo $r['NUMERO_CONTENEDOR_DESPACHOEX']; ?></td>
                                                        <td><?php echo $r['ENVASE']; ?></td>
                                                        <td><?php echo $r['NETO']; ?></td>
                                                        <td><?php echo $r['BRUTO']; ?></td>
                                                        <td><?php echo $r['INGRESO']; ?></td>
                                                        <td><?php echo $r['MODIFICACION']; ?></td>
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
        <?php include_once "../../assest/config/menuExtraFruta.php"; ?>
    </div>
    <?php include_once "../../assest/config/urlBase.php"; ?>
</body>

</html>