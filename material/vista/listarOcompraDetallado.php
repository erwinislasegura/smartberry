<?php

include_once "../../assest/config/validarUsuarioMaterial.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../../assest/controlador/RESPONSABLE_ADO.php';
include_once '../../assest/controlador/PROVEEDOR_ADO.php';
include_once '../../assest/controlador/FPAGO_ADO.php';
include_once '../../assest/controlador/TMONEDA_ADO.php';

include_once '../../assest/controlador/PRODUCTO_ADO.php';
include_once '../../assest/controlador/TUMEDIDA_ADO.php';

include_once '../../assest/controlador/OCOMPRA_ADO.php';
include_once '../../assest/controlador/DOCOMPRA_ADO.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$RESPONSABLE_ADO =  new RESPONSABLE_ADO();
$PROVEEDOR_ADO =  new PROVEEDOR_ADO();
$FPAGO_ADO =  new FPAGO_ADO();
$TMONEDA_ADO =  new TMONEDA_ADO();

$PRODUCTO_ADO =  new PRODUCTO_ADO();
$TUMEDIDA_ADO =  new TUMEDIDA_ADO();

$OCOMPRA_ADO =  new OCOMPRA_ADO();
$DOCOMPRA_ADO =  new DOCOMPRA_ADO();


//INIICIALIZAR MODELO

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
    <title>Detallado Orden</title>
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
                            <h3 class="page-title">Administración</h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                        <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                        <li class="breadcrumb-item" aria-current="page">Administración</li>
                                        <li class="breadcrumb-item" aria-current="page">Orden Compra</li>
                                        <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Detallado Orden Compra </a> </li>
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
                                        <table id="detalleordencompra" class="table-hover " style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Fecha Orden </th>
                                                    <th>Codigo Producto </th>
                                                    <th>Producto </th>
                                                    <th>Unidad Medida</th>
                                                    <th>Cantidad</th>
                                                    <th>Valor Unitario</th>
                                                    <th>Valor Total</th>
                                                    <th>Número Orden </th>
                                                    <th>Número Interno </th>
                                                    <th>Estado Orden</th>
                                                    <th>Proveedor</th>
                                                    <th>Formato Pago</th>
                                                    <th>Tipo Moneda</th>
                                                    <th>Tipo Cambio</th>
                                                    <th>Reponsable</th>
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
                                                    $ARRAYDOCOMPRA = $DOCOMPRA_ADO->listarDocompraPorOcompraCBX($r['ID_OCOMPRA']);
                                                    ?>

                                                    <?php foreach ($ARRAYDOCOMPRA as $s) : ?>
                                                        <?php
                                                        $ARRAYPRODUCTO = $PRODUCTO_ADO->verProducto($s['ID_PRODUCTO']);
                                                        if ($ARRAYPRODUCTO) {
                                                            $CODIGOPRODUCTO = $ARRAYPRODUCTO[0]['CODIGO_PRODUCTO'];
                                                            $NOMBREPRODUCTO = $ARRAYPRODUCTO[0]['NOMBRE_PRODUCTO'];
                                                        } else {
                                                            $CODIGOPRODUCTO = "Sin Dato";
                                                            $NOMBREPRODUCTO = "Sin Dato";
                                                        }
                                                        $ARRAYTUMEDIDA = $TUMEDIDA_ADO->verTumedida($s['ID_TUMEDIDA']);
                                                        if ($ARRAYTUMEDIDA) {
                                                            $NOMBRETUMEDIDA = $ARRAYTUMEDIDA[0]['NOMBRE_TUMEDIDA'];
                                                        } else {
                                                            $NOMBRETUMEDIDA = "Sin Dato";
                                                        }
                                                        ?>
                                                        <tr class="center">
                                                            <td><?php echo $r['FECHA']; ?></td>
                                                            <td><?php echo $CODIGOPRODUCTO; ?></td>
                                                            <td><?php echo $NOMBREPRODUCTO; ?></td>
                                                            <td><?php echo $NOMBRETUMEDIDA; ?></td>
                                                            <td><?php echo $s['CANTIDAD']; ?></td>
                                                            <td><?php echo $s['VALOR']; ?></td>
                                                            <td><?php echo $s['TOTAL'] ?></td>
                                                            <td> <?php echo $r['NUMERO_OCOMPRA']; ?></td>
                                                            <td><?php echo $r['NUMEROI_OCOMPRA']; ?> </td>
                                                            <td><?php echo $ESTADOOCOMPRA; ?></td>
                                                            <td><?php echo $NOMBREPROVEEDOR; ?></td>
                                                            <td><?php echo $NOMBREFPAGO; ?></td>
                                                            <td><?php echo $NOMBRETMONEDA; ?></td>
                                                            <td><?php echo $r['TCAMBIO_OCOMPRA']; ?></td>
                                                            <td><?php echo $NOMBRERESPONSABLE; ?></td>
                                                            <td><?php echo $r['SEMANA']; ?></td>
                                                            <td><?php echo $NOMBREEMPRESA; ?></td>
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