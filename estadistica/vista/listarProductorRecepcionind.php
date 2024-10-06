<?php

include_once "../../assest/config/validarUsuarioOpera.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES¿

include_once '../../assest/controlador/RECEPCIONIND_ADO.php';
include_once '../../assest/controlador/DRECEPCIONIND_ADO.php';

include_once '../../assest/controlador/CONDUCTOR_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/TRANSPORTE_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/EMPRESAPRODUCTOR_ADO.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR¿

$RECEPCIONIND_ADO =  new RECEPCIONIND_ADO();
$DRECEPCIONIND_ADO =  new DRECEPCIONIND_ADO();

$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$TRANSPORTE_ADO =  new TRANSPORTE_ADO();
$CONDUCTOR_ADO =  new CONDUCTOR_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$EMPRESAPRODUCTOR_ADO =  new EMPRESAPRODUCTOR_ADO();



//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";

$TOTALGUIA = "";
$TOTALBRUTO = "";
$TOTALNETO = "";
$TOTALENVASE = "";

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


$ARRAYEMPRESAPRODUCTOR=$EMPRESAPRODUCTOR_ADO->buscarEmpresaProductorPorUsuarioCBX($IDUSUARIOS);


include_once "../../assest/config/validarDatosUrl.php";
include_once "../../assest/config/datosUrLP.php";







?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Agrupado Recepcion</title>
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
        <?php include_once "../../assest/config/menuOpera.php"; ?>
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
                                        <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                        <li class="breadcrumb-item" aria-current="page">Granel</li>
                                        <li class="breadcrumb-item" aria-current="page">Recepcion</li>
                                        <li class="breadcrumb-item" aria-current="page">Industrial</li>
                                        <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Agrupado Recepción </a> </li>
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
                                        <table id="recepcionind" class="table-hover " style="width: 100%;">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Numero Recepcion </th>
                                                    <th>Estado</th>
                                                    <th class="text-center">Operaciones</th>
                                                    <th>Fecha Recepcion </th>
                                                    <th>Numero Guia </th>
                                                    <th>Hora Recepcion </th>
                                                    <th>Tipo Recepcion</th>
                                                    <th>CSG/CSP Recepción</th>
                                                    <th>Origen Recepcion</th>
                                                    <th>Fecha Guia </th>
                                                    <th>Total Envases Guia</th>
                                                    <th>Cantidad Envase</th>
                                                    <th>Total Kilos Neto</th>
                                                    <th>Total Kilos Bruto</th>
                                                    <th>Fecha Ingreso</th>
                                                    <th>Fecha Modificacion</th>
                                                    <th>Transporte </th>
                                                    <th>Nombre Conductor </th>
                                                    <th>Patente Camión </th>
                                                    <th>Patente Carro </th>
                                                    <th>Empresa</th>
                                                    <th>Planta</th>
                                                    <th>Temporada</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            <?php foreach ($ARRAYEMPRESAPRODUCTOR as $a) : ?>
                                                <?php 
                                                    if ( $TEMPORADAS) {
                                                        $ARRAYRECEPCION = $RECEPCIONIND_ADO->listarRecepcionEmpresaProductorTemporadaCBX($a["ID_EMPRESA"], $a["ID_PRODUCTOR"], $TEMPORADAS);
                                                    }    
                                                ?>
                                                <?php foreach ($ARRAYRECEPCION as $r) : ?>
                                                    <?php   
                                                            if ($r['TRECEPCION'] == "1") {
                                                                $TRECEPCION = "Desde Productor ";
                                                                $ARRAYPRODUCTOR2 = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);
                                                                if ($ARRAYPRODUCTOR2) {
                                                                    $CSGCSPORIGEN=$ARRAYPRODUCTOR2[0]['CSG_PRODUCTOR'] ;
                                                                    $ORIGEN =  $ARRAYPRODUCTOR2[0]['NOMBRE_PRODUCTOR'];
                                                                } else {
                                                                    $ORIGEN = "Sin Datos";
                                                                    $CSGCSPORIGEN="Sin Datos";
                                                                }
                                                            } else if ($r['TRECEPCION'] == "2") {
                                                                $TRECEPCION = "Planta Externa";
                                                                $ARRAYPLANTA2 = $PLANTA_ADO->verPlanta($r['ID_PLANTA2']);
                                                                if ($ARRAYPLANTA2) {
                                                                    $CSGCSPORIGEN=$ARRAYPLANTA2[0]['CODIGO_SAG_PLANTA'];
                                                                    $ORIGEN = $ARRAYPLANTA2[0]['NOMBRE_PLANTA'];
                                                                } else {
                                                                    $ORIGEN = "Sin Datos";
                                                                    $CSGCSPORIGEN="Sin Datos";
                                                                }
                                                            } else {
                                                                $TRECEPCION = "Sin Datos";
                                                                $CSGCSPORIGEN="Sin Datos";
                                                                $ORIGEN = "Sin Datos";
                                                            }
                                                            $ARRAYVEREMPRESA = $EMPRESA_ADO->verEmpresa($r['ID_EMPRESA']);
                                                            if($ARRAYVEREMPRESA){
                                                                $NOMBREEMPRESA= $ARRAYVEREMPRESA[0]['NOMBRE_EMPRESA'];
                                                            }else{
                                                                $NOMBREEMPRESA="Sin Datos";
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


                                                            
                                                            $ARRAYVERTRANSPORTE = $TRANSPORTE_ADO->verTransporte($r['ID_TRANSPORTE']);
                                                            if($ARRAYVERTRANSPORTE){
                                                                $NOMBRETRANSPORTE= $ARRAYVERTRANSPORTE[0]['NOMBRE_TRANSPORTE'];
                                                            }else{
                                                                $NOMBRETRANSPORTE="Sin Datos";
                                                            }
                                                            $ARRAYVERCONDUCTOR = $CONDUCTOR_ADO->verConductor($r['ID_CONDUCTOR']);
                                                            if($ARRAYVERCONDUCTOR){
                                                                $NOMBRECONDUCTOR= $ARRAYVERCONDUCTOR[0]['NOMBRE_CONDUCTOR'];
                                                            }else{
                                                                $NOMBRECONDUCTOR="Sin Datos";
                                                            }
                                                            
                                                        ?>
                                                    <tr class="text-center">
                                                        <td>
                                                            <a href="#" class="text-warning hover-warning">
                                                                <?php echo $r['NUMERO_RECEPCION']; ?>
                                                            </a>
                                                        </td>
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
                                                                <span href="#" class="dropdown-item" data-toggle="tooltip" title="Informe">
                                                                    <button type="button" class="btn  btn-danger  btn-block btn-sm" id="defecto" name="informe" title="Informe" Onclick="abrirPestana('../../assest/documento/informeRecepcionInd.php?parametro=<?php echo $r['ID_RECEPCION']; ?>&&usuario=<?php echo $IDUSUARIOS; ?>'); ">
                                                                        <i class="fa fa-file-pdf-o"></i><br> Informe
                                                                    </button>
                                                                </span>
                                                            </form>
                                                        </td>
                                                        <td><?php echo $r['FECHA']; ?></td>                                
                                                        <td><?php echo $r['NUMERO_GUIA_RECEPCION']; ?></td>
                                                        <td><?php echo $r['HORA_RECEPCION']; ?></td>
                                                        <td><?php echo $TRECEPCION; ?></td>
                                                        <td><?php echo $CSGCSPORIGEN; ?></td>   
                                                        <td><?php echo $ORIGEN; ?></td>                       
                                                        <td><?php echo $r['FECHA_GUIA']; ?></td>
                                                        <td><?php echo $r['GUIA']; ?></td>
                                                        <td><?php echo $r['ENVASE']; ?></td>
                                                        <td><?php echo $r['NETO']; ?></td>
                                                        <td><?php echo $r['BRUTO']; ?></td>
                                                        <td><?php echo $r['INGRESO']; ?></td>
                                                        <td><?php echo $r['MODIFICACION']; ?></td>
                                                        <td><?php echo $NOMBRETRANSPORTE; ?></td>           
                                                        <td><?php echo $NOMBRECONDUCTOR; ?></td>                                                         
                                                        <td><?php echo $r['PATENTE_CAMION']; ?></td>
                                                        <td><?php echo $r['PATENTE_CARRO']; ?></td>
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
        <?php include_once "../../assest/config/menuExtraOpera.php"; ?>
    </div>
    <?php include_once "../../assest/config/urlBase.php"; ?>
</body>

</html>