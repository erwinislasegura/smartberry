<?php

include_once "../../assest/config/validarUsuarioOpera.php";


//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/TREEMBALAJE_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/ESPECIES_ADO.php';
include_once '../../assest/controlador/VESPECIES_ADO.php';
include_once '../../assest/controlador/REEMBALAJE_ADO.php';

include_once '../../assest/controlador/DREXPORTACION_ADO.php';
include_once '../../assest/controlador/DRINDUSTRIAL_ADO.php';
include_once '../../assest/controlador/REEMBALAJE_ADO.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$TREEMBALAJE_ADO =  new TREEMBALAJE_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$ESPECIES_ADO =  new ESPECIES_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$REEMBALAJE_ADO =  new REEMBALAJE_ADO();



//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$TOTALNETO = "";
$TOTALENVASE = "";
$TOTALEXPORTACION = "";
$TOTALINDUSTRIAL = "";



//INICIALIZAR ARREGLOS
$ARRAYEMPRESA = "";
$ARRAYFOLIO2 = "";
$ARRAYPVESPECIES = "";
$ARRAYTREEMBALAJE = "";
$ARRAYPRODUCTOR = "";
$ARRAYVESPECIES = "";

$ARRAYREEMBALAJE = "";
$ARRAYTOTALREEMBALAJE = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES

if ( $TEMPORADAS) {
    $ARRAYREEMBALAJE = $REEMBALAJE_ADO->listarReembalajeTemporadaCBX( $TEMPORADAS);
}
include_once "../../assest/config/validarDatosUrl.php";
include_once "../../assest/config/datosUrLP.php";

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Agrupado Reembalaje</title>
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
        <?php include_once "../../assest/config/menuOpera.php"; ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-full">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            <h3 class="page-title">Informe</h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                        <li class="breadcrumb-item" aria-current="page">Modulo</li>
                                        <li class="breadcrumb-item" aria-current="page">Informe</li>
                                        <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Agrupado Reembalaje </a>  </li>
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
                                        <table id="reembalaje" class="table-hover " style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Numero</th>
                                                    <th>Estado</th>
                                                    <th class="text-center">Operaciónes</th>
                                                    <th>Fecha Reembalaje</th>
                                                    <th>Tipo Reembalaje</th>
                                                    <th>Turno </th>
                                                    <th>CSG Productor</th>
                                                    <th>Nombre Productor</th>
                                                    <th>Especie</th>
                                                    <th>Variedad</th>
                                                    <th>Kg. Con Desh. Entrada</th>
                                                    <th>Kg. Neto Expo.</th>
                                                    <th>Kg. Deshi. </th>
                                                    <th>Kg. Con Deshi. </th>
                                                    <th>Kg. IQF</th>
                                                    <th>Kg. Merma/Desecho</th>
                                                    <th>Kg. Industrial</th>
                                                    <th>Kg. Diferencia</th>
                                                    <th>% Exportación</th>
                                                    <th>% Deshitación</th>
                                                    <th>% Industrial</th>
                                                    <th>% Total</th>
                                                    <th>PT Embolsado</th>       
                                                    <th>Fecha Ingreso</th>
                                                    <th>Fecha Modificacion</th>
                                                    <th>Semana Reembalaje</th>
                                                    <th>Empresa</th>
                                                    <th>Planta</th>
                                                    <th>Temporada</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($ARRAYREEMBALAJE as $r) : ?>

                                                    <?php

                                                    $ARRAYTOTALENVASESEMBOLSADO=$REEMBALAJE_ADO->obtenerTotalEnvasesEmbolsado($r['ID_REEMBALAJE']);
                                                    $ENVASESEMBOLSADO=$ARRAYTOTALENVASESEMBOLSADO[0]["ENVASE"];

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
                                                    $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);
                                                    if ($ARRAYVERPRODUCTORID) {

                                                        $CSGPRODUCTOR = $ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'];
                                                        $NOMBREPRODUCTOR = $ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'];
                                                    } else {
                                                        $CSGPRODUCTOR = "Sin Datos";
                                                        $NOMBREPRODUCTOR = "Sin Datos";
                                                    }
                                                    $ARRAYTREEMBALAJE = $TREEMBALAJE_ADO->verTreembalaje($r['ID_TREEMBALAJE']);
                                                    if ($ARRAYTREEMBALAJE) {
                                                        $TREEMBALAJE = $ARRAYTREEMBALAJE[0]['NOMBRE_TREEMBALAJE'];
                                                    } else {
                                                        $TREEMBALAJE = "Sin Datos";
                                                    }
                                                    if ($r['TURNO']) {
                                                        if ($r['TURNO'] == "1") {
                                                            $TURNO = "Dia";
                                                        }
                                                        if ($r['TURNO'] == "2") {
                                                            $TURNO = "Noche";
                                                        }
                                                    } else {
                                                        $TURNO = "Sin Datos";
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

                                                    <tr class="center">
                                                        <td> <?php echo $r['NUMERO_REEMBALAJE']; ?> </td>
                                                        <td>
                                                            <?php if ($r['ESTADO'] == "0") { ?>
                                                                <button type="button" class="btn btn-block btn-danger">Cerrado</button>
                                                            <?php  }  ?>
                                                            <?php if ($r['ESTADO'] == "1") { ?>
                                                                <button type="button" class="btn btn-block btn-success">Abierto</button>
                                                            <?php  }  ?>
                                                        </td>                                                
                                                        <td class="text-center">
                                                            <form method="post" id="form1" name="form1">
                                                                <div class="btn-group btn-rounded btn-block" role="group" aria-label="Operaciones Detalle">                                                                    
                                                                    <button type="button" class="btn  btn-danger   btn-sm" id="defecto" <?php if ($r['ESTADO'] == "1") { echo "disabled"; } ?> name="informe" title="Informe" Onclick="abrirPestana('../../assest/documento/informeReembalajeEx.php?parametro=<?php echo $r['ID_REEMBALAJE']; ?>&&usuario=<?php echo $IDUSUARIOS; ?>'); ">
                                                                        <i class="fa fa-file-pdf-o"></i><br> Informe
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </td>
                                                        <td><?php echo $r['FECHA']; ?></td>
                                                        <td><?php echo $TREEMBALAJE; ?> </td>
                                                        <td><?php echo $TURNO; ?> </td>
                                                        <td><?php echo $CSGPRODUCTOR; ?></td>
                                                        <td><?php echo $NOMBREPRODUCTOR; ?></td>
                                                        <td><?php echo $NOMBRESPECIES; ?></td>
                                                        <td><?php echo $NOMBREVESPECIES; ?></td>
                                                        <td><?php echo $r['ENTRADA']; ?></td>
                                                        <td><?php echo $r['NETO']; ?></td>
                                                        <td><?php echo $r['EXPORTACION']-$r['NETO']; ?></td>
                                                        <td><?php echo $r['EXPORTACION']; ?></td>
                                                        <td><?php echo $r['INDUSTRIALSC']; ?></td>
                                                        <td><?php echo $r['INDUSTRIALNC']; ?></td>
                                                        <td><?php echo $r['INDUSTRIAL']; ?></td>
                                                        <td><?php echo number_format( $r['ENTRADA']-$r['EXPORTACION']-$r['INDUSTRIAL'],2,".",""); ?></td>
                                                        <td><?php echo $r['PDEXPORTACION_REEMBALAJE']; ?></td>
                                                        <td><?php echo $r['PDEXPORTACIONCD_REEMBALAJE']-$r['PDEXPORTACION_REEMBALAJE']; ?></td>
                                                        <td><?php echo $r['PDINDUSTRIAL_REEMBALAJE']; ?></td>
                                                        <td><?php echo number_format($r['PORCENTAJE_REEMBALAJE'], 2, ",", ".");  ?></td>
                                                        <td><?php echo $ENVASESEMBOLSADO; ?></td>
                                                        <td><?php echo $r['INGRESO']; ?></td>
                                                        <td><?php echo $r['MODIFICACION']; ?></td>
                                                        <td><?php echo $r['SEMANA']; ?></td>
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
                        </div>                                              
                        <div class="box-footer">
                                <div class="btn-toolbar mb-3" role="toolbar" aria-label="Datos generales">
                                    <div class="form-row align-items-center" role="group" aria-label="Datos">
                                        <div class="col-auto">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Total Kg. Neto Entrada</div>
                                                    <button class="btn   btn-default" id="TOTALNETOEV" name="TOTALNETOEV" >                                                           
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Total Kg. Neto Expo</div>
                                                    <button class="btn   btn-default" id="TOTALNETOEXPOV" name="TOTALNETOEXPOV" >                                                           
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Total Kg. Con Deshi.</div>
                                                    <button class="btn   btn-default" id="TOTALNETOEXPODV" name="TOTALNETOEXPODV" >                                                           
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Total Kg. Industrial</div>
                                                    <button class="btn   btn-default" id="TOTALNETOINDV" name="TOTALNETOINDV" >                                                           
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
        <?php include_once "../../assest/config/menuExtraOpera.php"; ?>
    </div>
    <?php include_once "../../assest/config/urlBase.php"; ?>
</body>

</html>