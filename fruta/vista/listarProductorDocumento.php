<?php
session_start();
include_once "../../assest/config/validarUsuarioFruta.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/productor_controller.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$ID_EMPRESA = $_SESSION['ID_EMPRESA'];

$productorController = new ProductorController();
$productores = $productorController->index($ID_EMPRESA);



?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Agrupado PT Registros de Calidad </title>
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
            <?php include_once "../../assest/config/menuFruta.php"; ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="container-full">

                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Listado de Productores</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Registro de Calidad</li>
                                            <li class="breadcrumb-item" aria-current="page">Documentos</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#">Documentos de Productores</a>
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
                                <a href="./addDocumentoProductor.php" type="button" class="btn btn-success">Agregar Documento</a>
                            <br/>
                            <br/>
                                <div class="row">
                                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                        <div class="table-responsive">
                                            <table id="tabla-productor" class="table-hover" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>Acciones</th>
                                                        <th>ID</th>
                                                        <th>Código</th>
                                                        <th>RUN</th>
                                                        <th>Nombre</th>
                                                        <th>Dirección</th>
                                                        <th>Email</th>
                                                        <th>Teléfono</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="bodyRegistroCalidad">
                                         
                                                <?php if (!empty($productores)): ?>
                                                    <?php foreach ($productores as $productor): ?>
                                                        <tr>
                                                            <td>
                                                                <a href="./listaDocumento.php?id=<?php echo base64_encode($productor->ID_PRODUCTOR); ?>" type="button" class="btn btn-<?php 
                                                                if($productor->NUMERO_DOCUMENTOS > 0){
                                                                    echo 'info';
                                                                }else{
                                                                    echo 'secondary';
                                                                }
                                                                ?>">
					                                                Documentación (<?php echo htmlspecialchars($productor->NUMERO_DOCUMENTOS); ?>)
                                                                </a>
                                                            </td>
                                                            <td><?php echo htmlspecialchars($productor->ID_PRODUCTOR); ?></td>
                                                            <td><?php echo htmlspecialchars($productor->NUMERO_PRODUCTOR); ?></td>
                                                            <td><?php echo htmlspecialchars($productor->RUT_PRODUCTOR.'-'.$productor->DV_PRODUCTOR); ?></td>
                                                            <td><?php echo htmlspecialchars($productor->NOMBRE_PRODUCTOR); ?></td>
                                                            <td><?php echo htmlspecialchars($productor->DIRECCION_PRODUCTOR); ?></td>
                                                            <td><?php echo htmlspecialchars($productor->EMAIL_PRODUCTOR); ?></td>
                                                            <td><?php echo htmlspecialchars($productor->TELEFONO_PRODUCTOR); ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <tr>
                                                        <td colspan="7">No hay productores disponibles.</td>
                                                    </tr>
                                                <?php endif; ?>
       
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
        
        $('#tabla-productor').DataTable({
        ordering: false, // Desactiva la ordenación
        paging: true,    // Mantiene la paginación si es necesaria
        searching: true,  // Mantiene la búsqueda si es necesaria
        language: {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    });
        </script>


</body>

</html>