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
    $ARRAYEXIEXPORTACION = $EXIEXPORTACION_ADO->listaFolioAgrupadoExistenciaExportacionCalidadReg($EMPRESAS, $PLANTAS, $TEMPORADAS);
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Existencia Producto Terminado</title>
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
                                <h3 class="page-title">Existencia PT Resumen</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Existencia</li>
                                            <li class="breadcrumb-item" aria-current="page">Resumen</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#">Existencia PT Resumen </a>
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
                                            <table id="tabla-registro-calidad"class="table-hover" style="width: 100%;">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>Folio Original</th>
                                                        <th>Folio Final</th>
                                                        <th>N° Registros</th>
                                                        <th>Registro de Calidad</th>
                                                        <th>Código Estándar</th>
                                                        <th>Estándar</th>
                                                        <th>Cantidad Envases</th>
                                                        <th>Kilos Neto</th>
                                                        <th>Kilos Bruto</th>
                                                        <th>Kilos Deshidratación</th>
                                                        <th>N° Referencia</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYEXIEXPORTACION as $r) : ?>

                                                        
                                                          <?php 

                                                         

                                                            if($r['COLOR']=="1"){
                                                                $TRECHAZOCOLOR="badge badge-danger ";
                                                                $COLOR="Rechazado";
                                                            }else if($r['COLOR']=="2"){
                                                                $TRECHAZOCOLOR="badge badge-warning ";
                                                                $COLOR="Objetado";
                                                            }else if($r['COLOR']=="3"){
                                                                $TRECHAZOCOLOR="badge badge-Success ";
                                                                $COLOR="Aprobado";
                                                            }else{
                                                                $TRECHAZOCOLOR="";
                                                                $COLOR="Sin Datos";
                                                            } 
            
                                                            $ARRAYEVERERECEPCIONID = $EEXPORTACION_ADO->verEstandar($r['ID_ESTANDAR']);
                                                            if ($ARRAYEVERERECEPCIONID) {
                                                                $CODIGOESTANDAR = $ARRAYEVERERECEPCIONID[0]['CODIGO_ESTANDAR'];
                                                                $NOMBREESTANDAR = $ARRAYEVERERECEPCIONID[0]['NOMBRE_ESTANDAR'];
                                                            } else {
                                                                $CODIGOESTANDAR = "Sin Datos";
                                                                $NOMBREESTANDAR = "Sin Datos";
                                                            }
                                                           
                                                            ?>
                                                            <tr class="text-center">
                                                            <td>                                                                   
                                                                    <span class="<?php echo $TRECHAZOCOLOR; ?>">
                                                                        <?php echo $r['FOLIO_EXIEXPORTACION']; ?>
                                                                    </span>
                                                                </td>
                                                                <td>                                                                   
                                                                    <span class="<?php echo $TRECHAZOCOLOR; ?>">
                                                                        <?php echo $r['FOLIO_AUXILIAR_EXIEXPORTACION']; ?>
                                                                    </span>
                                                                </td>

                                                                <td>                                                                   
                                                                    <span class="<?php echo $TRECHAZOCOLOR; ?>">
                                                                        <?php echo $r['NUMERO_REGISTROS']; ?>
                                                                    </span>
                                                                </td>
                                                                
                                                                <td>
                                                                <button type="button" class="btn btn-info registroCalidad" attr-id="<?php echo $r['FOLIO_AUXILIAR_EXIEXPORTACION']; ?>" attr-idex="<?php echo $r['FOLIO_EXIEXPORTACION']; ?>">
					                                                Añadir Registro
				                                                </button>
                                                                </td>
                                                                <td><?php echo $CODIGOESTANDAR; ?></td>
                                                                <td><?php echo $NOMBREESTANDAR; ?></td>
                                                                <td><?php echo $r['ENVASES']; ?></td>

                                                                <td><?php echo $r['KILOS_NETO']; ?></td>
                                                                <td><?php echo $r['KILOS_BRUTO']; ?></td>
                                                                <td><?php echo $r['KILOS_DESHIDRATACION']; ?></td>

                                                                <?php 
            
                                                                    $ARRAYREFERENCIA = $ICARGA_ADO->verReferencia($r['NUMERO_REFERENCIA']);
                                                                    if ($ARRAYREFERENCIA) {
                                                                        $NREFERENCIA = $ARRAYREFERENCIA[0]['NREFERENCIA_ICARGA'];
                                                                      
                                                                    } else {
                                                                        $NREFERENCIA = "Sin Datos";
                                                                  
                                                                    }
                                                           
                                                                ?>

                                                                <td><?php echo $NREFERENCIA; ?></td>
                                                          
                                                                
                                                                
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


            <!-- Modal -->
  <div class="modal modal-left fade" id="modal-left" tabindex="-1">
	  <div class="modal-dialog" style="width: 50%!important;">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title">Registro de Calidad</h5>
			<button type="button" class="close" data-dismiss="modal">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
            <form class="form formRegistroCalidad" id="formRegistroCalidad">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Fecha</label>
                            <input type="text" class="form-control" placeholder="Fecha" name="fecha" readonly>
                        </div>
                    </div>
                    <input type="hidden" name="action" value="insert">
                    <input type="hidden" name="empresa" value="<?php echo $_SESSION['ID_EMPRESA']; ?>">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Hora</label>
                            <input type="text" class="form-control" placeholder="Hora" name="hora" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Usuario</label>
                            <input type="text" class="form-control" placeholder="Usuario" name="usuario" value="<?php echo $_SESSION["NOMBRE_USUARIO"]; ?>" readonly>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Folio Original</label>
                            <input type="text" class="form-control" placeholder="N° Folio Exportación" name="folioex" readonly>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Folio Final</label>
                            <input type="text" class="form-control" placeholder="N° Folio" name="folio" readonly>
                        </div>
                    </div>

                    

                    <div class="col-md-3">
						<div class="form-group">
						<label>Tipo de Registro </label>
						<select class="form-control" name="tipo" required>
						 
							<option value="1">Origen</option>
							<option value="2">Destino</option>
						</select>
						</div>
					</div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Baxlo Promedio</label>
                            <input type="text" class="form-control" placeholder="Baxlo Promedio" name="baxlo_promedio" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Peso 10 Frutos</label>
                            <input type="text" class="form-control" placeholder="Peso 10 Frutos" name="peso_10_frutos" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Temperatura</label>
                            <input type="text" class="form-control" placeholder="Temperatura" name="temperatura" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Brix</label>
                            <input type="text" class="form-control" placeholder="Brix" name="brix" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Pudrición - Micelio</label>
                            <input type="text" class="form-control" placeholder="Pudrición - Micelio" name="pudricion_micelio" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Heridas Abiertas</label>
                            <input type="text" class="form-control" placeholder="Heridas Abiertas" name="heridas_abiertas" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Deshidratación</label>
                            <input type="text" class="form-control" placeholder="Deshidratación" name="deshidratacion" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Exudación Jugo</label>
                            <input type="text" class="form-control" placeholder="Exudación Jugo" name="exudacion_jugo" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Blando</label>
                            <input type="text" class="form-control" placeholder="Blando" name="blando" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Machucon</label>
                            <input type="text" class="form-control" placeholder="Machucon" name="machucon" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Inmadura Roja</label>
                            <input type="text" class="form-control" placeholder="Inmadura Roja" name="inmadura_roja" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>QC Calidad</label>
                            <input type="text" class="form-control" placeholder="QC Calidad" name="qc_calidad" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>QC Condición</label>
                            <input type="text" class="form-control" placeholder="QC Condición" name="qc_condicion" required>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row">
            <div class="col-md-12">
            <button type="submit" class="btn btn-primary float-right btnAdd">Guardar Registro</button>
            <!--<button type="button" class="btn btn-danger float-left btnRechazo">Rechazar Folio </button>-->
            </div>
        </div>
           
            </form>

            <div class="row" style="height: 300px; overflow: scroll;">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table-hover dataTable" style="width: 100%;" >
                            <thead>
                                <tr class="text-center">
                                    <th>Fecha/Hora</th>
                                    <th>Folio Original</th>
                                    <th>Folio Final</th>
                                    <th>Tipo</th>
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
		  <div class="modal-footer modal-footer-uniform">
			<button type="button" class="btn btn-rounded btn-secondary" data-dismiss="modal">Cerrar</button>
		  </div>
		</div>
	  </div>
	</div>
  <!-- /.modal -->
            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php include_once "../../assest/config/footer.php"; ?>
                <?php include_once "../../assest/config/menuExtraFruta.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../../assest/config/urlBase.php"; ?>

        <script>
        
        $('#tabla-registro-calidad').DataTable({
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
        },
        dom: 'Bfrtip',  // Define el layout para incluir los botones
    buttons: [
        {
            extend: 'pdfHtml5',
            text: 'Exportar PDF',
            title: 'Registros de Calidad',
            customize: function (doc) {
                // Ajustar el tamaño de la fuente en todo el PDF
                doc.defaultStyle.fontSize = 8;  // Reduce el tamaño de la fuente
                doc.styles.tableHeader.fontSize = 8;  // Tamaño de la fuente para los encabezados

                // Si la tabla tiene muchas columnas, puedes reducir los anchos de las columnas
                // También puedes usar porcentajes o valores como 'auto' si es necesario.
            },
            exportOptions: {
                columns: ':visible'  // Exporta solo las columnas visibles
            }
        }
    ]
    });
        </script>
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

            $('body').on('click', 'button.btnRechazo', function(event) {

                var folioex = $("input[name='folioex']").val();

                var formData = new FormData();
                formData.append('action', 'rechazo');
                formData.append('folioex', folioex);

                console.log(formData);

                $.ajax({
                    data: formData,
                    url: "../../assest/controlador/REGCALIDAD_ADO.php",
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        console.log('procesamos el rechazo');
                    },
                    success: function(respuesta) {
                        console.log(respuesta);

                        $.toast({
                            heading: 'Folio rechazado',
                            text: 'Su registro al Folio N° '+folioex+' fue rechazado',
                            position: 'bottom-left',
                            loaderBg: '#ff6849',
                            icon: 'success',
                            hideAfter: 3500,
                            stack: 6
                        });

                        location.reload();

                    }
                });

            });


            function updateClock() {
                var now = new Date();
                var hours = now.getHours();
                var minutes = now.getMinutes();
                var seconds = now.getSeconds();
                
                // Agregar ceros iniciales para minutos y segundos si son menores de 10
                if (hours < 10) hours = '0' + hours;
                if (minutes < 10) minutes = '0' + minutes;
                if (seconds < 10) seconds = '0' + seconds;

                var timeString = hours + ':' + minutes + ':' + seconds;
             
                $('input[name="hora"]').val(timeString);
            }

            // Actualizar el reloj cada segundo
            setInterval(updateClock, 1000);
            // Inicializar el reloj al cargar la página
            



            $('body').on('click', 'button.registroCalidad', function(event) {
                console.log('ejecutamos modal-left');

                var folio = $(this).attr('attr-id');
                var folioex = $(this).attr('attr-idex');

                // Obtener la fecha y la hora actuales
                var now = new Date();
                
                // Formatear la fecha como YYYY-MM-DD
                var date = now.getFullYear() + '-' + ('0' + (now.getMonth() + 1)).slice(-2) + '-' + ('0' + now.getDate()).slice(-2);
                
                // Formatear la hora como HH:MM:SS
                var time = ('0' + now.getHours()).slice(-2) + ':' + ('0' + now.getMinutes()).slice(-2) + ':' + ('0' + now.getSeconds()).slice(-2);
                
                // Mostrar la fecha y la hora en elementos separados
                $('input[name="fecha"]').val(date);
                
                $('input[name="folio"]').val(folio);
                $('input[name="folioex"]').val(folioex);
                updateClock();

                //precargamos primero la tabla con registros
                var formData = new FormData();
                formData.append('action', 'list');
                formData.append('folio', folio);
                formData.append('folioex', folioex);
                formData.append('empresa', <?php echo $_SESSION['ID_EMPRESA']; ?>);

                console.log(formData);

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


                $("#modal-left").modal("show");
                return false;
            });

            $('body').on('submit', 'form#formRegistroCalidad', function(event) {
                var formData = new FormData($('form#formRegistroCalidad')[0]);
                var folio = $("input[name='folio']").val();
                var folioex = $("input[name='folioex']").val();
                console.log('ejecutamos el formulario');
                //alert(formData);
                $.ajax({
                    data: formData,
                    url: "../../assest/controlador/REGCALIDAD_ADO.php",
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        console.log('accedemos con exito');
                        $('.btnAdd').html('<i class="fa fa-spin fa-refresh"></i> Espere...');
                    },
                    success: function(respuesta) {
                    console.log(respuesta);
                        if (respuesta == 1) {
                            $('.btnAdd').html('Guardar Registro');
                            $.toast({
                            heading: 'Ingreso',
                            text: 'Su registro al Folio N° '+folio+' fue ingresado con exito',
                            position: 'bottom-left',
                            loaderBg: '#ff6849',
                            icon: 'success',
                            hideAfter: 3500,
                            stack: 6
                        });
                        //$("form#form")[0].reset();

                       

                        //refrescamos la tabla

                        var formData2 = new FormData();
                        formData2.append('action', 'list');
                        formData2.append('folio', folio);
                        formData2.append('folioex', folioex);
                        formData2.append('empresa', <?php echo $_SESSION['ID_EMPRESA']; ?>);
                console.log(formData2);

                $.ajax({
                    data: formData2,
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
                                    case 1: tipo_descripcion = 'Origen';
                                    break;
                                    case 2: tipo_descripcion = 'Destino';
                                    break;
                                    default: tipo_descripcion = 'Desconocido';
                                }
                                html += '<td>' + tipo_descripcion + '</td>';
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

                $('form#formRegistroCalidad').find(':input').each(function() {
                            if ($(this).attr('name') !== 'fecha' && $(this).attr('name') !== 'hora' && $(this).attr('name') !== 'folio' && $(this).attr('name') !== 'folioex' && $(this).attr('name') !== 'usuario' && $(this).attr('name') !== 'tipo' && $(this).attr('name') !== 'empresa' && $(this).attr('name') !== 'action' ) {
                                $(this).val(''); // Limpia los demás campos de entrada
                                $("select[name='tipo']").prop('selectedIndex', 0);
                            }
                        });

                        } else {
                            //toast error
                            $.toast({
                            heading: 'Error',
                            text: 'Ops! No pudimos registrar la información para el Folio N° '+folio,
                            position: 'bottom-left',
                            loaderBg: '#ff6849',
                            icon: 'error',
                            hideAfter: 3500
                        });
                        }
                    }
                });
                return false;
            });


        </script>


</body>

</html>