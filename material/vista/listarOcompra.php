<?php

include_once "../../assest/config/validarUsuarioMaterial.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/RESPONSABLE_ADO.php';
include_once '../../assest/controlador/PROVEEDOR_ADO.php';
include_once '../../assest/controlador/FPAGO_ADO.php';
include_once '../../assest/controlador/TMONEDA_ADO.php';

include_once '../../assest/controlador/OCOMPRA_ADO.php';
include_once '../../assest/controlador/MOCOMPRA_ADO.php';

include_once '../../assest/modelo/OCOMPRA.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$RESPONSABLE_ADO =  new RESPONSABLE_ADO();
$PROVEEDOR_ADO =  new PROVEEDOR_ADO();
$FPAGO_ADO =  new FPAGO_ADO();
$TMONEDA_ADO =  new TMONEDA_ADO();

$MOCOMPRA_ADO =  new MOCOMPRA_ADO();
$OCOMPRA_ADO =  new OCOMPRA_ADO();


//INIICIALIZAR MODELO
$OCOMPRA =  new OCOMPRA();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";

$TOTALCANTIDAD = "";
$TOTCALVALOR = "";


//INICIALIZAR ARREGLOS
$ARRAYOCOMPRA = "";
$ARRAYOCOMPRATOTALES = "";
$ARRAYVEREMPRESA = "";


$ARRAYVERREPONSBALE = "";
$ARRAYVERPROVEEDOR = "";
$ARRAYVERFPAGO = "";
$ARRAYVERTMONEDA = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
if ($EMPRESAS  && $PLANTAS && $TEMPORADAS) {
    $ARRAYOCOMPRA = $OCOMPRA_ADO->listarOcompraPorEmpresaTemporadaCBX($EMPRESAS,  $TEMPORADAS);
}
include_once "../../assest/config/validarDatosUrl.php";
include_once "../../assest/config/datosUrLP.php";



?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Agrupado Orden</title>
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
                //FUNCION PARA ABRIR VENTANA QUE SE ENCUENTRA LA OPERACIONES DE DETALLE DE OCOMPRA
                function abrirVentana(url) {
                    var opciones =
                        "'directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=1000, height=800'";
                    window.open(url, 'window', opciones);
                }
            </script>
</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary" >
    <div class="wrapper">
        <?php include_once "../../assest/config/menuMaterial.php"; ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-full">

                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            <h3 class="page-title">Administración </h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                        <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                        <li class="breadcrumb-item" aria-current="page">Administración</li>
                                        <li class="breadcrumb-item" aria-current="page">Orden Compra</li>
                                        <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Agrupado Orden </a>  </li>
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
                                        <table id="ordencompra" class="table-hover " style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Número Orden </th>
                                                    <th>Número Interno </th>
                                                    <th>Estado</th>
                                                    <th>Operaciónes</th>
                                                    <th>Estado Orden</th>
                                                    <th>Fecha Orden </th>
                                                    <th>Proveedor</th>
                                                    <th>Cantidad Producto</th>
                                                    <th>Total Valor</th>
                                                    <th>Formato Pago</th>
                                                    <th>Tipo Moneda</th>
                                                    <th>Tipo Cambio</th>
                                                    <th>Reponsable</th>
                                                    <th>Fecha Ingreso</th>
                                                    <th>Fecha Modificación</th>
                                                    <th>Semana Orden </th>
                                                    <th>Empresa</th>
                                                    <th>Temporada</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($ARRAYOCOMPRA as $r) : ?>
                                                    <?php
                                                    if ($r['ESTADO_OCOMPRA'] == "1") {
                                                        $ESTADOOCOMPRA = "Creado";
                                                    } else  if ($r['ESTADO_OCOMPRA'] == "2") {
                                                        $ESTADOOCOMPRA = "Pendiente Aprobación";
                                                    } else   if ($r['ESTADO_OCOMPRA'] == "3") {
                                                        $ESTADOOCOMPRA = "Rechazado";
                                                    } else  if ($r['ESTADO_OCOMPRA'] == "4") {
                                                        $ESTADOOCOMPRA = "Aprobado";
                                                    } else  if ($r['ESTADO_OCOMPRA'] == "5") {
                                                        $ESTADOOCOMPRA = "Orden Completada";
                                                    } else {
                                                        $ESTADOOCOMPRA = "Sin Datos";
                                                    }
                                                    $ARRAYVERPROVEEDOR = $PROVEEDOR_ADO->verProveedor($r['ID_PROVEEDOR']);
                                                    if ($ARRAYVERPROVEEDOR) {
                                                        $NOMBREPROVEEDOR = $ARRAYVERPROVEEDOR[0]['NOMBRE_PROVEEDOR'];
                                                    } else {
                                                        $NOMBREPROVEEDOR = "Sin Datos";
                                                    }
                                                    $ARRAYVERFPAGO = $FPAGO_ADO->verFpago($r['ID_FPAGO']);
                                                    if ($ARRAYVERFPAGO) {
                                                        $NOMBREFPAGO = $ARRAYVERFPAGO[0]['NOMBRE_FPAGO'];
                                                    } else {
                                                        $NOMBREFPAGO = "Sin Datos";
                                                    }
                                                    $ARRAYVERTMONEDA = $TMONEDA_ADO->verTmoneda($r['ID_TMONEDA']);
                                                    if ($ARRAYVERTMONEDA) {
                                                        $NOMBRETMONEDA = $ARRAYVERTMONEDA[0]['NOMBRE_TMONEDA'];
                                                    } else {
                                                        $NOMBRETMONEDA = "Sin Datos";
                                                    }
                                                    $ARRAYVERREPONSBALE = $RESPONSABLE_ADO->verResponsable($r['ID_RESPONSABLE']);
                                                    if ($ARRAYVERREPONSBALE) {
                                                        $NOMBRERESPONSABLE = $ARRAYVERREPONSBALE[0]['NOMBRE_RESPONSABLE'];
                                                    } else {
                                                        $NOMBRERESPONSABLE = "Sin Datos";
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
                                                    $ARRAYMOCOMPRA = $MOCOMPRA_ADO->listarMcompraOcompraCBX($r['ID_OCOMPRA']);
                                                    ?>
                                                    <tr class="center">
                                                        <td>
                                                            <a href="#" class="text-warning hover-warning">
                                                                <?php echo $r['NUMERO_OCOMPRA']; ?>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="#" class="text-warning hover-warning">
                                                                <?php echo $r['NUMEROI_OCOMPRA']; ?>
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
                                                                <div class="list-icons d-inline-flex">
                                                                    <div class="list-icons-item dropdown">
                                                                        <button class="btn btn-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <i class="glyphicon glyphicon-cog"></i>
                                                                        </button>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_OCOMPRA']; ?>" />
                                                                            <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroOcompra" />
                                                                            <input type="hidden" class="form-control" placeholder="URLO" id="URLO" name="URLO" value="listarOcompra" />
                                                                            <input type="hidden" class="form-control" placeholder="URLMV" id="URLMR" name="URLMR" value="listarMocompra" />
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
                                                                            <?php if ($ARRAYMOCOMPRA) { ?>
                                                                                <hr>
                                                                                <span href="#" class="dropdown-item" data-toggle="tooltip" title="Ver Motivos">
                                                                                    <button type="submit" class="btn btn-primary btn-block"  id="VERMOTIVOSRURL" name="VERMOTIVOSRURL" title="Ver Motivos">
                                                                                        <i class="ti-eye"></i> Ver Motivos
                                                                                    </button>
                                                                                </span>
                                                                            <?php } ?>
                                                                            <hr>
                                                                            <span href="#" class="dropdown-item" data-toggle="tooltip" title="Informe">
                                                                                <button type="button" class="btn  btn-danger  btn-block" id="defecto" name="informe" title="Informe" Onclick="abrirPestana('../../assest/documento/informeOcompra.php?parametro=<?php echo $r['ID_OCOMPRA']; ?>&&usuario=<?php echo $IDUSUARIOS; ?>'); ">
                                                                                    <i class="fa fa-file-pdf-o"></i> Informe
                                                                                </button>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </td>                              
                                                        <td><?php echo $ESTADOOCOMPRA; ?></td>
                                                        <td><?php echo $r['FECHA']; ?></td>
                                                        <td><?php echo $NOMBREPROVEEDOR; ?></td>
                                                        <td><?php echo $r['CANTIDAD']; ?></td>
                                                        <td><?php echo $r['TOTAL_VALOR']; ?></td>
                                                        <td><?php echo $NOMBREFPAGO; ?></td>
                                                        <td><?php echo $NOMBRETMONEDA; ?></td>
                                                        <td><?php echo $r['TCAMBIO_OCOMPRA']; ?></td>
                                                        <td><?php echo $NOMBRERESPONSABLE; ?></td>
                                                        <td><?php echo $r['INGRESO']; ?></td>
                                                        <td><?php echo $r['MODIFICACION']; ?></td>
                                                        <td><?php echo $r['SEMANA']; ?></td>
                                                        <td><?php echo $NOMBREEMPRESA; ?></td>
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
                                                    <div class="input-group-text">Total Cantidad</div>
                                                    <button class="btn   btn-default" id="TOTALENVASEV" name="TOTALENVASEV" >                                                           
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Total Valor</div>
                                                    <button class="btn   btn-default" id="TOTALVALORV" name="TOTALVALORV" >                                                           
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
        <?php include_once "../../assest/config/menuExtraMaterial.php"; ?>
    </div>
    <?php include_once "../../assest/config/urlBase.php"; ?>
</body>
</html>