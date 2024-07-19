<?php


include_once "../../assest/config/validarUsuarioFruta.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../../assest/controlador/TUSUARIO_ADO.php';
include_once '../../assest/controlador/USUARIO_ADO.php';
include_once '../../assest/controlador/EMPRESA_ADO.php';
include_once '../../assest/controlador/PLANTA_ADO.php';
include_once '../../assest/controlador/TEMPORADA_ADO.php';


include_once '../../assest/controlador/EXIEXPORTACION_ADO.php';
include_once '../../assest/controlador/DESPACHOPT_ADO.php';
include_once '../../assest/controlador/MGUIAPT_ADO.php';


include_once '../../assest/modelo/EXIEXPORTACION.php';
include_once '../../assest/modelo/MGUIAPT.php';
include_once '../../assest/modelo/DESPACHOPT.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$TUSUARIO_ADO = new TUSUARIO_ADO();
$USUARIO_ADO = new USUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();

$DESPACHOPT_ADO =  new DESPACHOPT_ADO();
$MGUIAPT_ADO =  new MGUIAPT_ADO();
$EXIEXPORTACION_ADO =  new EXIEXPORTACION_ADO();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYMGUIAPT = "";
$ARRAVERYPLANTA = "";


if ($EMPRESAS  && $PLANTAS && $TEMPORADAS) {

    $ARRAYMGUIAPT = $MGUIAPT_ADO->listarMguiaEmpresaPlantaTemporadaCBX($EMPRESAS, $PLANTAS, $TEMPORADAS);
} 



?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title> Listar Motivo Rechazo</title>
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
            </script>

</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary" >
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
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
                                            <li class="breadcrumb-item"> <a href="index.php"> <i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Modulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Frigorifico</li>
                                            <li class="breadcrumb-item" aria-current="page">Guia Por Recibir</li>
                                            <li class="breadcrumb-item" aria-current="page">Producto Terminado</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#">Listar Motivo Rechazo </a> </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <?php include_once "../../assest/../../assest/assest/config/verIndicadorEconomico.php"; ?>
                        </div>
                    </div>
                    <!-- Main content -->
                    <section class="content">
                        <div class="box">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table id="icarga" class="table-hover " style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>Numero </th>
                                                        <th>Fecha Ingreso</th>
                                                        <th>Numero Despacho</th>
                                                        <th>Numero Guia</th>
                                                        <th>Planta Origen</th>
                                                        <th>Planta Destino</th>
                                                        <th>Motivo</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYMGUIAPT as $r) : ?>
                                                        <tr class="">
                                                            <td>
                                                                <a href="#" class="text-warning hover-warning">
                                                                    <?php echo $r['NUMERO_MGUIA']; ?>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <a href="#" class="text-warning hover-warning">
                                                                    <?php echo $r['FECHA_INGRESO_MGUIA']; ?>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <a>
                                                                    <?php echo $r['NUMERO_DESPACHO']; ?>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <a >
                                                                    <?php echo $r['NUMERO_GUIA']; ?>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                if ($r['ID_PLANTA2']) {
                                                                    $ARRAVERYPLANTA = $PLANTA_ADO->verPlanta($r['ID_PLANTA2']);
                                                                    echo $ARRAVERYPLANTA[0]['NOMBRE_PLANTA'];
                                                                } else {
                                                                    echo "-";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                if ($r['ID_PLANTA']) {
                                                                    $ARRAVERYPLANTA = $PLANTA_ADO->verPlanta($r['ID_PLANTA']);
                                                                    echo $ARRAVERYPLANTA[0]['NOMBRE_PLANTA'];
                                                                } else {
                                                                    echo "-";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td> <?php echo $r['MOTIVO_MGUIA']; ?> </td>
                                                        </tr>
                                                    <?php endforeach; ?>

                                                </tbody>
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
                <?php include_once "../../assest/config/menuExtraFruta.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../../assest/config/urlBase.php"; ?>
</body>

</html>