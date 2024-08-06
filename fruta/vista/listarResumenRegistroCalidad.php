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
                                            <table id="existenciaptagrupado" class="table-hover" style="width: 100%;">
                                                <thead>
                                                    <tr class="text-center">
                                                    <th>Fecha/Hora</th>
                                                    <th>Folio Original</th>
                                                    <th>Folio Final</th>
                                                    <th>Tipo</th>

                                                    <th>Cod. Productor</th>
                                                    <th>Productor</th>
                                                    <th>F. Embalaje</th>
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
                                                <tbody id="bodyRegistroCalidad">
                                                   
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
            // const Toast = Swal.mixin({
            //     toast: true,
            //     position: 'top',
            //     showConfirmButton: false,
            //     showConfirmButton: false
            // })
            // Toast.fire({
            //     icon: "info",
            //     title: "Informacion importante",
            //     html: "<label>Las <b>Existencia</b> que tienen la letra de color <b>Rojo</b> tiene mas de 7 dias desde su ingreso.</label>"
            // })


            var formData = new FormData();
                formData.append('action', 'listResumen');
                formData.append('empresa', <?php echo $_SESSION['ID_EMPRESA']; ?>);
            $.ajax({
                    data: formData,
                    url: "../../assest/controlador/REGCALIDAD_ADO.php",
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        console.log('precargamos la tabla');
                    },
                    success: function(respuesta) {
                    console.log(respuesta);
                    var registros = JSON.parse(respuesta);

                    if (registros.status !== 'error') {
                            var html = '';
                            registros.forEach(function(registro) {
                                html += '<tr>';
                                html += '<td>' + registro.FECHA + '/' + registro.HORA + '</td>';
                                html += '<td>' + registro.FOLIOEX + '</td>';
                                html += '<td>' + registro.FOLIO + '</td>';
                                
                                var tipo_descripcion = '';
                                switch(registro.TIPO){
                                    case '1': tipo_descripcion = 'Origen';
                                    break;
                                    case '2': tipo_descripcion = 'Destino';
                                    break;
                                    default: tipo_descripcion = 'Desconocido';
                                }
                                html += '<td>' + tipo_descripcion + '</td>';

                                html += '<td>' + registro.ID_PRODUCTOR + '</td>';
                                html += '<td>' + registro.NOMBRE_PRODUCTOR + '</td>';
                                html += '<td>' + registro.FECHA_EMBALADO_EXIEXPORTACION + '</td>';
                                html += '<td>' + registro.ID_ESTANDAR + '</td>';
                                html += '<td>' + registro.NOMBRE_ESTANDAR + '</td>';
                                html += '<td>' + registro.CANTIDAD_ENVASE_EXIEXPORTACION + '</td>';


                                html += '<td>' + registro.BAXLO_PROMEDIO + '</td>';
                                html += '<td>' + registro.PESO_10_FRUTOS + '</td>';
                                html += '<td>' + registro.TEMPERATURA + '</td>';
                                html += '<td>' + registro.BRIX + '</td>';
                                html += '<td>' + registro.PUDRICION_MICELIO + '</td>';
                                html += '<td>' + registro.HERIDAS_ABIERTAS + '</td>';
                                html += '<td>' + registro.DESHIDRATACION + '</td>';
                                html += '<td>' + registro.EXUDACION_JUGO + '</td>';
                                html += '<td>' + registro.BLANDO + '</td>';
                                html += '<td>' + registro.MACHUCON + '</td>';
                                html += '<td>' + registro.INMADURA_ROJA + '</td>';
                                html += '<td>' + registro.QC_CALIDAD + '</td>';
                                html += '<td>' + registro.QC_CONDICION + '</td>';
                                html += '</tr>';
                            });
                            
                            $('#bodyRegistroCalidad').html(html);
                        } else {
                            console.log(registros.message);
                        }
                        
                    }
                });


        </script>


</body>

</html>