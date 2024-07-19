<?php

include_once "../../assest/config/validarUsuarioExpo.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../../assest/controlador/EXIEXPORTACION_ADO.php';
include_once '../../assest/controlador/PROCESO_ADO.php';
include_once '../../assest/controlador/DPEXPORTACION_ADO.php';
include_once '../../assest/controlador/EEXPORTACION_ADO.php';
include_once '../../assest/controlador/ECOMERCIAL_ADO.php';
include_once '../../assest/controlador/ESPECIES_ADO.php';
include_once '../../assest/controlador/MERCADO_ADO.php';
include_once '../../assest/controlador/TETIQUETA_ADO.php';
include_once '../../assest/controlador/TEMBALAJE_ADO.php';

include_once '../../assest/controlador/PRODUCTO_ADO.php';
include_once '../../assest/controlador/FAMILIA_ADO.php';
include_once '../../assest/controlador/SUBFAMILIA_ADO.php';
include_once '../../assest/controlador/TUMEDIDA_ADO.php';



include_once '../../assest/controlador/FICHA_ADO.php';
include_once '../../assest/controlador/DFICHA_ADO.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$EXIEXPORTACION_ADO =  new EXIEXPORTACION_ADO();
$PROCESO_ADO =  new PROCESO_ADO();
$DPEXPORTACION_ADO =  new DPEXPORTACION_ADO();
$EEXPORTACION_ADO =  new EEXPORTACION_ADO();
$ECOMERCIAL_ADO =  new ECOMERCIAL_ADO();
$ESPECIES_ADO =  new ESPECIES_ADO();
$MERCADO_ADO =  new MERCADO_ADO();
$TETIQUETA_ADO =  new TETIQUETA_ADO();
$TEMBALAJE_ADO =  new TEMBALAJE_ADO();


$PRODUCTO_ADO =  new PRODUCTO_ADO();
$FAMILIA_ADO =  new FAMILIA_ADO();
$SUBFAMILIA_ADO =  new SUBFAMILIA_ADO();
$TUMEDIDA_ADO =  new TUMEDIDA_ADO();


$FICHA_ADO =  new FICHA_ADO();
$DFICHA_ADO =  new DFICHA_ADO();

//INIICIALIZAR MODELO

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";

$TOTALCANTIDAD = "";
$TOTCALVALOR = "";
$VALORPRODUCTO="";


//INICIALIZAR ARREGLOS
$ARRAYFICHA = "";
$ARRAYFICHATOTALES = "";
$VALORPRODUCTO="";
$ARRAYESTANDAR = "";
$ARRAYVEREMPRESA = "";
$ARRAYVERTEMPORADA = "";
$ARRAYMERCADO = "";
$ARRAYESTANDARCOMERCIAL = "";
$ARRAYESTANDAR = "";
$ARRAYESPECIES = "";
$ARRAYTEMBALAJE = "";
$ARRAYTETIQUETA = "";
$ARRAYVALORPRODUCTOMAXOC="";



//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
if ($EMPRESAS  && $TEMPORADAS) {
    $ARRAYFICHA = $FICHA_ADO->listarConsumoTotalPorEmpresaTemporadaCBX($EMPRESAS,  $TEMPORADAS);
}
include_once "../../assest/config/validarDatosUrl.php";
include_once "../../assest/config/datosUrLP.php";



?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Consumo Materiales</title>
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

                //FUNCION PARA ABRIR UNA NUEVA PESTAÑA 
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
        <?php include_once "../../assest/config/menuExpo.php"; 
        ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-full">

                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            <h3 class="page-title">Consumo Materiales</h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                        <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                        <li class="breadcrumb-item" aria-current="page">Materiales</li>
                                        <li class="breadcrumb-item active" aria-current="page"> <a href="#">Consumo Materiales</a>
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
                                        <table id="consumom" class="table-hover " style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Codigo Estandar </th>
                                                    <th>Envase/Estandar </th>
                                                    <th>Especies </th>
                                                    <th>Tipo Etiqueta </th>
                                                    <th>Tipo Embalaje </th>
                                                    <th>Codigo Producto </th>
                                                    <th>Producto </th>
                                                    <th>Familia </th>
                                                    <th>Sub Familia </th>
                                                    <th>Unidad Medida </th>
                                                    <th>Envases Estandar</th>
                                                    <th>Factor Consumo </th>
                                                    <th>Total Consumo </th>
                                                    <th>Valor Producto</th>
                                                    <th>Empresa </th>
                                                    <th>Temporada </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($ARRAYFICHA as $r) : ?>
                                                    <?php
                                                          $ARRAYVALORPRODUCTOMAXOC=$DFICHA_ADO->listarDifchaValorProductoOcCBX($r['ID_PRODUCTO']);
                                                          if($ARRAYVALORPRODUCTOMAXOC){
                                                              $VALORPRODUCTO=$ARRAYVALORPRODUCTOMAXOC[0]["VALOR"];
                                                          }else{
                                                              $VALORPRODUCTO=0;
                                                          }                                                            
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $r['CODIGOESTANDAR']; ?> </td>
                                                        <td><?php echo $r['NOMBREESTANDAR']; ?> </td>
                                                        <td><?php echo $r['NOMBREESPECIES']; ?> </td>
                                                        <td><?php echo $r['NOMBRETETIQUETA']; ?> </td>
                                                        <td><?php echo $r['NOMBRETEMBALAJE']; ?> </td>
                                                        <td><?php echo $r['CODIGO']; ?> </td>
                                                        <td><?php echo $r['PRODUCTO']; ?> </td>
                                                        <td><?php echo $r['FAMILIA']; ?> </td>
                                                        <td><?php echo $r['SUBFAMILIA']; ?> </td>
                                                        <td><?php echo $r['TUMEDIDA']; ?> </td>
                                                        <td><?php echo $r['ENVASE']; ?> </td>
                                                        <td><?php echo $r['FACTOR']; ?> </td>
                                                        <td><?php echo $r['CONSUMO']; ?> </td>
                                                        <td><?php echo $VALORPRODUCTO; ?></td>
                                                        <td><?php echo $r['EMPRESA']; ?> </td>
                                                        <td><?php echo $r['TEMPORADA']; ?> </td>
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
                                                    <div class="input-group-text">Total Envase</div>
                                                    <button class="btn   btn-default" id="TOTALENVASEV" name="TOTALENVASEV" >                                                           
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Total Consumo</div>
                                                    <button class="btn   btn-default" id="TOTALCONSUMOV" name="TOTALCONSUMOV" >                                                           
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