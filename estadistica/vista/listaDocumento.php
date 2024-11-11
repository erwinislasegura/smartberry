<?php

include_once "../../assest/config/validarUsuarioOpera.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/productor_controller.php';
include_once '../../assest/controlador/EMPRESAPRODUCTOR_ADO.php';


$EMPRESAPRODUCTOR_ADO =  new EMPRESAPRODUCTOR_ADO();


$ARRAYEMPRESAPRODUCTOR=$EMPRESAPRODUCTOR_ADO->buscarEmpresaProductorPorUsuarioCBX($IDUSUARIOS);
//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
//$id = base64_decode($_REQUEST['id']);
$productorController = new ProductorController();

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Lista Documentos</title>
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
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <?php include_once "../../assest/config/menuOpera.php"; ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="container-full">

                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Lista Documentos</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Registro de Calidad</li>
                                            <li class="breadcrumb-item" aria-current="page">Documentos</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#">Lista Documentos</a>
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
                                            <table id="existenciaptagrupado" class="table-hover" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>Archivo</th>
                                                        <th>Nombre</th>
                                                        <th>Vigencia</th>
                                                      
                                                    </tr>
                                                </thead>
                                                <tbody id="bodyRegistroCalidad">
                                                <?php foreach ($ARRAYEMPRESAPRODUCTOR as $a) : ?>
                                                <?php 
                                                    
                                                        $documentos = $productorController->viewDocumentosEspecie($a["ID_PRODUCTOR"], $ESPECIE);
                                                
                                                ?>
                                                <?php if (!empty($documentos)): ?>
                                                    <?php foreach ($documentos as $documento): ?>
                                                        <tr>
                                                            <td>
                                                                <a href="../../data/data_productor/<?php echo $documento->archivo_documento; ?>" target="_blank" class="btn btn-info">
                                                                <i class="ti-file"></i>
                                                                </a>
                                                            </td>
                                                            <td><?php echo htmlspecialchars($documento->nombre_documento); ?></td>
                                                            <td><?php echo $documento->vigencia_documento; ?></td>
                                      
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                   <!--<tr>
                                                        <td colspan="7">No hay productores disponibles.</td>
                                                    </tr>-->
                                                <?php endif; ?>
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
        <script>
        

        </script>


</body>

</html>