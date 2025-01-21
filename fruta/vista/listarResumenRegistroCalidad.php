<?php

include_once "../../assest/config/validarUsuarioFruta.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/EXIEXPORTACION_ADO.php';
include_once '../../assest/controlador/EEXPORTACION_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/VESPECIES_ADO.php';
include_once '../../assest/controlador/ESPECIES_ADO.php';
include_once '../../assest/controlador/FOLIO_ADO.php';
include_once '../../assest/controlador/FOLIO_ADO.php';
include_once '../../assest/controlador/TMANEJO_ADO.php';
include_once '../../assest/controlador/TCALIBRE_ADO.php';
include_once '../../assest/controlador/TEMBALAJE_ADO.php';
include_once '../../assest/controlador/TPROCESO_ADO.php';
include_once '../../assest/controlador/TREEMBALAJE_ADO.php';
include_once '../../assest/controlador/TCOLOR_ADO.php';
include_once '../../assest/controlador/TCATEGORIA_ADO.php';
include_once '../../assest/controlador/ICARGA_ADO.php';



include_once '../../assest/controlador/RECEPCIONPT_ADO.php';
include_once '../../assest/controlador/REPALETIZAJEEX_ADO.php';
include_once '../../assest/controlador/PROCESO_ADO.php';
include_once '../../assest/controlador/REEMBALAJE_ADO.php';
include_once '../../assest/controlador/DESPACHOPT_ADO.php';
include_once '../../assest/controlador/DESPACHOEX_ADO.php';
include_once '../../assest/controlador/TINPSAG_ADO.php';
include_once '../../assest/controlador/INPSAG_ADO.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$EXIEXPORTACION_ADO =  new EXIEXPORTACION_ADO();
$EEXPORTACION_ADO =  new EEXPORTACION_ADO();

$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$ESPECIES_ADO =  new ESPECIES_ADO();
$FOLIO_ADO =  new FOLIO_ADO();
$TMANEJO_ADO =  new TMANEJO_ADO();
$TCALIBRE_ADO =  new TCALIBRE_ADO();
$TEMBALAJE_ADO =  new TEMBALAJE_ADO();
$TPROCESO_ADO =  new TPROCESO_ADO();
$TREEMBALAJE_ADO =  new TREEMBALAJE_ADO();
$TCOLOR_ADO =  new TCOLOR_ADO();
$TCATEGORIA_ADO =  new TCATEGORIA_ADO();
$ICARGA_ADO =  new ICARGA_ADO();




$RECEPCIONPT_ADO =  new RECEPCIONPT_ADO();
$REPALETIZAJEEX_ADO =  new REPALETIZAJEEX_ADO();
$DESPACHOPT_ADO =  new DESPACHOPT_ADO();
$DESPACHOEX_ADO =  new DESPACHOEX_ADO();
$PROCESO_ADO =  new PROCESO_ADO();
$REEMBALAJE_ADO =  new REEMBALAJE_ADO();
$TINPSAG_ADO =  new TINPSAG_ADO();
$INPSAG_ADO =  new INPSAG_ADO();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$TOTALNETO = "";
$TOTALENVASE = "";
$TAMAÑO=0;
$CONTADOR=0;


//INICIALIZAR ARREGLOS
$ARRAYEXIEXPORTACION = "";
$ARRAYTOTALEXIEXPORTACION = "";
$ARRAYVEREEXPORTACIONID = "";
$ARRAYVERPRODUCTORID = "";
$ARRAYVERPVESPECIESID = "";
$ARRAYVERVESPECIESID = "";
$ARRAYVERESPECIESID = "";
$ARRAYVERFOLIOID = "";
$ARRAYEMPRESA = "";
$ARRAYPLANTA = "";
$ARRAYVERRECEPCIONPT = "";
$ARRAYDESPACHO="";
$ARRAYDESPACHO2="";
$ARRAYTINPSAG = "";
$ARRAYINPSAG = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES 
if ($EMPRESAS  && $PLANTAS && $TEMPORADAS) {
    $ARRAYEXIEXPORTACION = $EXIEXPORTACION_ADO->listaFolioAgrupadoExistenciaExportacionCalidad($EMPRESAS, $PLANTAS, $TEMPORADAS);
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Agrupado PT Registros de Calidad</title>
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
                                <h3 class="page-title">Agrupado PT Registros de Calidad</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Registro de Calidad</li>
                                            <li class="breadcrumb-item" aria-current="page">Agrupado</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#">Agrupado PT Registros de Calidad</a>
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
                                            <table id="tabla-resumen-calidad" class="table-hover" style="width: 100%;">
                                                <thead>
                                                    <tr class="text-center">
                                                    <th>Fecha/Hora</th>
                                                    <th>Folio Original</th>
                                                    <th>Folio Final</th>
                                                    <th>Tipo</th>

                                                    <th>CSG Productor</th>
                                                    <th>Productor</th>
                                                    <th>Embalaje</th>
                                                    <th>Estandar</th>
                                                    <th>Cod. Estandar</th>
                                                    <th>Cajas</th>
                                                    
                                                    <th>Baxlo Promedio</th>
                                                    <th>Peso 10 Frutos</th>
                                                    <th>Temperatura</th>
                                                    <th>Brix</th>
                                                    <th>Pudrición - Micelio</th>
                                                    <th>Heridas Abiertas</th>
                                                    <th>Deshidratación</th>
                                                    <th>Exudación Jugo</th>
                                                    <th>Blando</th>
                                                    <th>Machucon</th>
                                                    <th>Inmadura Roja</th>
                                                    <th>QC Calidad</th>
                                                    <th>QC Condición</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php if ($ARRAYEXIEXPORTACION) { ?>
                                                    <?php foreach ($ARRAYEXIEXPORTACION as $r) : ?>
                                                        <?php 
                                                            
                                                            $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);
                                                            if ($ARRAYVERPRODUCTORID) {
                                                                $CSGPRODUCTOR = $ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'];
                                                                $NOMBREPRODUCTOR = $ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'];
                                                            } else {
                                                                $CSGPRODUCTOR = "Sin Datos";
                                                                $NOMBREPRODUCTOR = "Sin Datos";
                                                            }


                                                            $ARRAYEVERERECEPCIONID = $EEXPORTACION_ADO->verEstandar($r['ID_ESTANDAR']);
                                                            if ($ARRAYEVERERECEPCIONID) {
                                                                $CODIGOESTANDAR = $ARRAYEVERERECEPCIONID[0]['CODIGO_ESTANDAR'];
                                                                $NOMBREESTANDAR = $ARRAYEVERERECEPCIONID[0]['NOMBRE_ESTANDAR'];
                                                            } else {
                                                                $NOMBREESTANDAR = "Sin Datos";
                                                                $CODIGOESTANDAR = "Sin Datos";
                                                            }


                                                            $ARRAYTEMBALAJE = $TEMBALAJE_ADO->verEmbalaje($r['ID_TEMBALAJE']);
                                                        if ($ARRAYTEMBALAJE) {
                                                            $NOMBRETEMBALAJE = $ARRAYTEMBALAJE[0]['NOMBRE_TEMBALAJE'];
                                                        } else {
                                                            $NOMBRETEMBALAJE = "Sin Datos";
                                                        }
                                                            
                                                            
                                                        ?>
                                                        <tr class="center">
                                                        <td><?php echo $r['FECHA'].'/'.$r['HORA']; ?></td>
                                                        <td><?php echo $r['Folioex']; ?></td>
                                                        <td><?php echo $r['FOLIO']; ?></td>
                                                        <td>
                                                            <?php 
                                                                switch($r['TIPO']){
                                                                    case '1': echo 'Origen';
                                                                    break;
                                                                    case '2': echo 'Destino';
                                                                    break;
                                                                    default: echo 'No definido';
                                                                }
                                                        
                                                        ?></td>

                                                        <td><?php echo $CSGPRODUCTOR; ?></td>
                                                        <td><?php echo $NOMBREPRODUCTOR; ?></td>
                                                        <td><?php echo $NOMBRETEMBALAJE; ?></td>
                                                        <td><?php echo $NOMBREESTANDAR; ?></td>
                                                        <td><?php echo $CODIGOESTANDAR; ?></td>
                                                        <td><?php echo $r['CANTIDAD_ENVASE_EXIEXPORTACION']; ?></td>

                                                        <td><?php echo $r['BAXLO_PROMEDIO']; ?></td>
                                                        <td><?php echo $r['PESO_10_FRUTOS']; ?></td>
                                                        <td><?php echo $r['TEMPERATURA']; ?></td>
                                                        <td><?php echo $r['BRIX']; ?></td>
                                                        <td><?php echo $r['PUDRICION_MICELIO']; ?></td>
                                                        <td><?php echo $r['HERIDAS_ABIERTAS']; ?></td>
                                                        <td><?php echo $r['DESHIDRATACION']; ?></td>
                                                        <td><?php echo $r['EXUDACION_JUGO']; ?></td>
                                                        <td><?php echo $r['BLANDO']; ?></td>
                                                        <td><?php echo $r['MACHUCON']; ?></td>
                                                        <td><?php echo $r['INMADURA_ROJA']; ?></td>
                                                        <td><?php echo $r['QC_CALIDAD']; ?></td>
                                                        <td><?php echo $r['QC_CONDICION']; ?></td>
                           

                                                        </tr>
                                                        <?php endforeach; ?>
                                                        <?php } ?>
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                            <div class="box-footer" style="display none;">
                                <div class="btn-toolbar mb-3" role="toolbar" aria-label="Datos generales">
                                    <div class="form-row align-items-center" role="group" aria-label="Datos">
                                        <div class="col-auto">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <!--<div class="input-group-text">Total Envase</div>
                                                    <button class="btn   btn-default" id="TOTALENVASEVAGRUPADO" name="TOTALENVASEVAGRUPADO" >                                                           
                                                    </button>-->
                                                </div>
                                            </div>
                                        </div><!-- 
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
                                        </div> -->
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
        
        $(document).ready(function() {
            $('#tabla-resumen-calidad').DataTable({
                ordering: false,
                paging: true,
                searching: true,
                "language": {
                "processing": "Procesando...",
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "emptyTable": "Ningún dato disponible en esta tabla",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "search": "Buscar:",
                "infoThousands": ",",
                "loadingRecords": "Cargando...",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "aria": {
                    "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad",
                    "collection": "Colección",
                    "colvisRestore": "Restaurar visibilidad",
                    "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
                    "copySuccess": {
                        "1": "Copiada 1 fila al portapapeles",
                        "_": "Copiadas %d fila al portapapeles"
                    },
                    "copyTitle": "Copiar al portapapeles",
                    "csv": "CSV",
                    "excel": "Excel",
                    "pageLength": {
                        "-1": "Mostrar todas las filas",
                        "_": "Mostrar %d filas"
                    },
                    "pdf": "PDF",
                    "print": "Imprimir"
                },
                "autoFill": {
                    "cancel": "Cancelar",
                    "fill": "Rellene todas las celdas con <i>%d<\/i>",
                    "fillHorizontal": "Rellenar celdas horizontalmente",
                    "fillVertical": "Rellenar celdas verticalmentemente"
                },
                "decimal": ",",
                "searchBuilder": {
                    "add": "Añadir Filtro",
                    "button": {
                        "0": "Filtros",
                        "_": "Filtros(%d)"
                    },
                    "clearAll": "Borrar todo",
                    "condition": "Condición",
                    'delete': 'Quitar',
                    'deleteTitle': 'Titulo Quitar',
                    "conditions": {
                        "date": {
                            "after": "Despues",
                            "before": "Antes",
                            "between": "Entre",
                            "empty": "Vacío",
                            "equals": "Igual a",
                            "notBetween": "No entre",
                            "notEmpty": "No Vacio",
                            "not": "Diferente de"
                        },
                        "number": {
                            "between": "Entre",
                            "empty": "Vacio",
                            "equals": "Igual a",
                            "gt": "Mayor a",
                            "gte": "Mayor o igual a",
                            "lt": "Menor que",
                            "lte": "Menor o igual que",
                            "notBetween": "No entre",
                            "notEmpty": "No vacío",
                            "not": "Diferente de"
                        },
                        "string": {
                            "contains": "Contiene",
                            "empty": "Vacío",
                            "endsWith": "Termina en",
                            "equals": "Igual a",
                            "notEmpty": "No Vacio",
                            "startsWith": "Empieza con",
                            "not": "Diferente de",
                            "notContains": "No Contiene",
                            "notStarts": "No empieza con",
                            "notEnds": "No termina con"
                        },
                        "array": {
                            "not": "Diferente de",
                            "equals": "Igual",
                            "empty": "Vacío",
                            "contains": "Contiene",
                            "notEmpty": "No Vacío",
                            "without": "Sin"
                        }
                    },
                    "data": "Filtrar Por",
                    "deleteTitle": "Eliminar regla de filtrado",
                    "leftTitle": "Criterios anulados",
                    "logicAnd": "Y",
                    "logicOr": "O",
                    "rightTitle": "Criterios de sangría",
                    "title": {
                        "0": "Filtros",
                        "_": "Filtros (%d)"
                    },
                    "value": "Valor"
                },
                "searchPanes": {
                    "clearMessage": "Borrar todo",
                    "collapse": {
                        "0": "Paneles de búsqueda",
                        "_": "Paneles de búsqueda (%d)"
                    },
                    "count": "{total}",
                    "countFiltered": "{shown} ({total})",
                    "emptyPanes": "Sin paneles de búsqueda",
                    "loadMessage": "Cargando paneles de búsqueda",
                    "title": "Filtros Activos - %d",
                    "showMessage": "Mostrar Todo",
                    "collapseMessage": "Colapsar Todo"
                },
                "select": {
                    "cells": {
                        "1": "1 celda seleccionada",
                        "_": "%d celdas seleccionadas"
                    },
                    "columns": {
                        "1": "1 columna seleccionada",
                        "_": "%d columnas seleccionadas"
                    },
                    "rows": {
                        "1": "1 fila seleccionada",
                        "_": "%d filas seleccionadas"
                    }
                },
                "thousands": ".",
                "datetime": {
                    "previous": "Anterior",
                    "next": "Proximo",
                    "hours": "Horas",
                    "minutes": "Minutos",
                    "seconds": "Segundos",
                    "unknown": "-",
                    "amPm": [
                        "AM",
                        "PM"
                    ],
                    "months": {
                        "0": "Enero",
                        "1": "Febrero",
                        "10": "Noviembre",
                        "11": "Diciembre",
                        "2": "Marzo",
                        "3": "Abril",
                        "4": "Mayo",
                        "5": "Junio",
                        "6": "Julio",
                        "7": "Agosto",
                        "8": "Septiembre",
                        "9": "Octubre"
                    },
                    "weekdays": [
                        "Dom",
                        "Lun",
                        "Mar",
                        "Mie",
                        "Jue",
                        "Vie",
                        "Sab"
                    ]
                },
                "editor": {
                    "close": "Cerrar",
                    "create": {
                        "button": "Nuevo",
                        "title": "Crear Nuevo Registro",
                        "submit": "Crear"
                    },
                    "edit": {
                        "button": "Editar",
                        "title": "Editar Registro",
                        "submit": "Actualizar"
                    },
                    "remove": {
                        "button": "Eliminar",
                        "title": "Eliminar Registro",
                        "submit": "Eliminar",
                        "confirm": {
                            "_": "¿Está seguro que desea eliminar %d filas?",
                            "1": "¿Está seguro que desea eliminar 1 fila?"
                        }
                    },
                    "error": {
                        "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Más información&lt;\\\/a&gt;).<\/a>"
                    },
                    "multi": {
                        "title": "Múltiples Valores",
                        "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
                        "restore": "Deshacer Cambios",
                        "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
                    }
                },
                "info": "Mostrando _START_ a _END_ de _TOTAL_ registros"
            },
                dom: 'Bfrtip',
                buttons: [
                    {
                extend: 'excelHtml5',
                text: 'Exportar Excel',
                title: 'Resumen de Calidad',
                exportOptions: {
                    columns: ':visible' // Exportar solo columnas visibles
                }
            },
                    {
                        extend: 'pdfHtml5',
                        text: 'Exportar PDF',
                        title: 'Agrupado PT Registros de Calidad',
                        orientation: 'landscape',
                        customize: function (doc) {
                            doc.defaultStyle.fontSize = 8;
                            doc.styles.tableHeader.fontSize = 8;

                            doc.footer = function(currentPage, pageCount) {
                                return {
                                    columns: [
                                        {
                                            text: 'Pie de página personalizado - Página ' + currentPage + ' de ' + pageCount,
                                            alignment: 'center',
                                            fontSize: 8,
                                            margin: [0, 10, 0, 0]
                                        }
                                    ]
                                };
                            };
                        },
                        exportOptions: {
                            columns: [1, 2, 6, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18 , 19, 20, 21, 22]  // Exporta solo las columnas visibles
                        }
                    },
                    'searchBuilder'
                ],
                searchBuilder: {
                    add: 'Añadir Filtro',
                    button: {
                        '0': 'Filtros',
                        _: 'Filtros (%d)'
                    },
                    clearAll: 'Borrar Todo',
                    conditions: {
                        string: {
                            contains: 'Contiene',
                            empty: 'Vacío',
                            endsWith: 'Termina con',
                            equals: 'Es igual a',
                            startsWith: 'Empieza con'
                        },
                        number: {
                            between: 'Entre',
                            empty: 'Vacío',
                            equals: 'Es igual a',
                            gt: 'Mayor que',
                            gte: 'Mayor o igual a',
                            lt: 'Menor que',
                            lte: 'Menor o igual a'
                        },
                        date: {
                            after: 'Después de',
                            before: 'Antes de',
                            between: 'Entre',
                            empty: 'Vacío',
                            equals: 'Es igual a'
                        },
                        array: {
                            contains: 'Contiene',
                            empty: 'Vacío',
                            equals: 'Es igual a',
                            not: 'No es igual a'
                        }
                    },
                    logic: {
                        and: 'Y',
                        or: 'O'
                    }
                }
            });
        });
        </script>


</body>

</html>