<?php
include_once "../../assest/config/validarUsuarioFruta.php";



//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once "../../assest/controlador/CONSULTA_ADO.php";


//INICIALIZAR CONTROLADOR
$CONSULTA_ADO =  NEW CONSULTA_ADO;

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$query_kilosMpTotales = $CONSULTA_ADO->TotalKgMpRecepcionadosPlanta($TEMPORADAS, $PLANTAS);
$query_datosPlanta = $CONSULTA_ADO->verPlanta($PLANTAS);
$query_kilosMpTotalesEmpresaPlanta = $CONSULTA_ADO->TotalKgMpRecepcionadosEmpresaPlanta($TEMPORADAS, $PLANTAS);

//recepciones
$query_recepcionAbiertaMP = $CONSULTA_ADO->TotalRecepcionMpAbiertas($TEMPORADAS, $EMPRESAS, $PLANTAS);
$query_recepcionAbiertaIND = $CONSULTA_ADO->TotalRecepcionIndAbiertas($TEMPORADAS, $EMPRESAS, $PLANTAS);
$query_despachoAbiertoMP = $CONSULTA_ADO->TotalDespachoMpAbiertas($TEMPORADAS, $EMPRESAS, $PLANTAS);
$query_despachoAbiertoIND = $CONSULTA_ADO->TotalDespachoIndAbiertas($TEMPORADAS, $EMPRESAS, $PLANTAS);

//proceso
$query_procesoAbierto = $CONSULTA_ADO->TotalProcesosAbiertos($TEMPORADAS, $EMPRESAS, $PLANTAS);
$query_reembalajeAbierto = $CONSULTA_ADO->TotalReembalajesAbiertos($TEMPORADAS, $EMPRESAS, $PLANTAS);
$query_repaletizajeAbierto = $CONSULTA_ADO->TotalRepaletizajesAbiertos($TEMPORADAS, $EMPRESAS, $PLANTAS);

//acumulado
$query_acumuladoMP = $CONSULTA_ADO->TotalKgMpRecepcionadoAcumulado($TEMPORADAS, $EMPRESAS, $PLANTAS);
$query_acumuladoMPDiaAnterior = $CONSULTA_ADO->TotalKgMpRecepcionadoDiaAnterior($TEMPORADAS, $EMPRESAS, $PLANTAS);

$query_acumuladoMPProcesado = $CONSULTA_ADO->TotalKgMpProcesado($TEMPORADAS, $EMPRESAS, $PLANTAS);
$query_acumuladoMPProcesadoDiaAnterior = $CONSULTA_ADO->TotalKgMpProcesadoDiaAnterior($TEMPORADAS, $EMPRESAS, $PLANTAS);



if($query_kilosMpTotales){
    $kilosMpTotales = $query_kilosMpTotales[0]["TOTAL"];
}

if ($query_datosPlanta) {
    $nombePlanta = $query_datosPlanta[0]['NOMBRE_PLANTA'];
}






/*$RECEPCION=0;
$RECEPCIONMP=0;
$RECEPCIONIND=0;
$RECEPCIONPT=0;
$DESPACHO=0;
$PROCESO=0;
$REEMBALAJE=0;
$REPALETIZAJE=0;

//INICIALIZAR ARREGLOS
$ARRAYREGISTROSABIERTOS="";
$ARRAYAVISOS1=$AVISO_ADO->listarAvisoActivosCBX();
//$ARRAYAVISOS2=$AVISO_ADO->listarAvisoActivosFijoCBX();



//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYREGISTROSABIERTOS=$CONSULTA_ADO->contarRegistrosAbiertosFruta($EMPRESAS,$PLANTAS,$TEMPORADAS);
if($ARRAYREGISTROSABIERTOS){
    $RECEPCION=$ARRAYREGISTROSABIERTOS[0]["RECEPCION"];
    $RECEPCIONMP=$ARRAYREGISTROSABIERTOS[0]["RECEPCIONMP"];
    $RECEPCIONIND=$ARRAYREGISTROSABIERTOS[0]["RECEPCIONIND"];
    $RECEPCIONPT=$ARRAYREGISTROSABIERTOS[0]["RECEPCIONPT"];
    $DESPACHO=$ARRAYREGISTROSABIERTOS[0]["DESPACHO"];
    $DESPACHOMP=$ARRAYREGISTROSABIERTOS[0]["DESPACHOMP"];
    $DESPACHOIND=$ARRAYREGISTROSABIERTOS[0]["DESPACHOIND"];
    $DESPACHOPT=$ARRAYREGISTROSABIERTOS[0]["DESPACHOPT"];
    $DESPACHOEXPO=$ARRAYREGISTROSABIERTOS[0]["DESPACHOEXPO"];
    $PROCESO=$ARRAYREGISTROSABIERTOS[0]["PROCESO"];
    $REEMBALAJE=$ARRAYREGISTROSABIERTOS[0]["REEMBALAJE"];
    $REPALETIZAJE=$ARRAYREGISTROSABIERTOS[0]["REPALETIZAJE"];
}*/


?>


<!DOCTYPE html>
<html lang="es">
<head>
    <title>INICIO</title>
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
        </script>
</head>
<body class="hold-transition light-skin fixed sidebar-mini theme-primary" >
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <?php include_once "../../assest/config/menuFruta.php"; ?>
            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
            <div class="content-wrapper">
                <div class="container-full">
                    <!-- Content Header (Page header) -->
                    <!--
                        <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Dashboard</h3>
                            </div>
                            <?php include_once "../../assest/config/verIndicadorEconomico.php"; ?>
                        </div>
                    </div>
                    <!-- Main content -->     
                    <!--                   
                    <section class="content">
                        <div class="row">

                        <div class="col-xl-12 col-12">
                                <div class="box">
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <div class="text-center">
                                                <p class="mb-0" style="padding: 0px 1.5rem!important;">TOTAL KG. PLANTA <?php echo strtoupper($nombePlanta); ?></p>
                                                <h2 class="text-primary" style="padding: 0px 1.5rem!important;"><?php echo number_format(round($kilosMpTotales, 0), 0, ",", "."); ?> kg.</h2>
                                            </div>
                                            <table class="table no-border">
                                                <tr>
                                                    <td>
                                                        <div class="new-progress-wrap" style="margin-top: 0px!important; margin-bottom: 0px!important;">
                                                            <ul class="new-progress-line row list-unstyled" style="margin-top: 0px!important; margin-bottom: 0px!important;">

                                                            <li class="col-12 current" style="display: flex; padding-left: 0px!important; padding-right:0px!important;">
                                                            <?php foreach ($query_kilosMpTotalesEmpresaPlanta as $rowsKilosTotalesEmpresaPlanta) : 
                                                                $porcentaje = round((round($rowsKilosTotalesEmpresaPlanta["TOTAL"], 0) * 100)/round($kilosMpTotales, 0),0); 
                                                                $color = substr(md5(rand()), 0, 6);     
                                                            ?>
                                                                <div class="" style="width:<?php echo $porcentaje;?>%; text-align: center; line-height: 50px; cursor: pointer; color: white; background-color: #<?php echo $color; ?>;" data-toggle="tooltip" data-placement="bottom" title="<?php echo $rowsKilosTotalesEmpresaPlanta["NOMBRE_EMPRESA"].' ('.number_format(round($rowsKilosTotalesEmpresaPlanta["TOTAL"], 0), 0, ",", ".").' Kg.)'; ?>"><?php echo number_format(round($rowsKilosTotalesEmpresaPlanta["TOTAL"], 0), 0, ",", "."); ?> Kg.</div>
                                                            <?php endforeach; ?> 
                                                        
                                                                <div class="progress bg-warning"></div>
                                                            </li>

                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>				
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                            
                            </div> 
                                                            -->
                                                            -->
<!--
                            <div class="col-xl-7 col-12">
                                <div class="box">
                                    <div class="box-header with-border" style="padding: 7px 1.5rem!important;">
                                    <h4 class="box-title">Información</h4>
                                    </div>
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-lg-6 col-12">
                                                <div class="box">
                                                    <div class="box-body p-0">
                                                        <div class="d-flex justify-content-between align-items-center p-5 bg-primary">
                                                            <h4 class="font-weight-700 my-0">RECEPCIÓN MP</h4>
                                                        </div>
                                                        <div class="d-flex justify-content-around align-items-center p-5 bg-secondary-light">
                                                            <div class="text-center br-1 w-p100">										
                                                                <p class="mb-0">R. Abiertas MP</p>			
                                                                <p class="mb-0"><?php if($query_recepcionAbiertaMP){ echo $query_recepcionAbiertaMP[0]["NUMERO"]; } ?></p>
                                                            </div>
                                                            <div class="text-center br-1 w-p100">										
                                                                <p class="mb-0">R. Abiertas IND</p>			
                                                                <p class="mb-0"><?php if($query_recepcionAbiertaIND){ echo $query_recepcionAbiertaIND[0]["NUMERO"]; } ?></p>
                                                            </div>
                                                            <div class="text-center br-1 w-p100">										
                                                                <p class="mb-0">D. Abierto MP</p>			
                                                                <p class="mb-0"><?php if($query_despachoAbiertoMP){ echo $query_despachoAbiertoMP[0]["NUMERO"]; } ?></p>
                                                            </div>
                                                            <div class="text-center w-p100">										
                                                                <p class="mb-0">D. Abierto IND</p>			
                                                                <p class="mb-0"><?php if($query_despachoAbiertoIND){ echo $query_despachoAbiertoIND[0]["NUMERO"]; } ?></p>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="d-flex justify-content-around p-10">
                                                            <div class="justify-content-between w-p100 p-10 bg-success-light mr-5 rounded">	
                                                        								
                                                                <p>MP ACUMULADO</p>	
                                                                <br/>		
                                                                <h3 class="text-align: center;"><?php if($query_acumuladoMP){ echo number_format(round($query_acumuladoMP[0]["TOTAL"], 0), 0, ",", "."); } ?></h3>
                                                            </div>
                                                            <div class="justify-content-between w-p100 p-10 bg-info-light ml-5 rounded">							
                                                                <p>MP DÍA ANTERIOR</p>
                                                                <br/>		
                                                                <h3 class="text-align: center;"><?php if($query_acumuladoMPDiaAnterior){ echo number_format(round($query_acumuladoMPDiaAnterior[0]["TOTAL"], 0), 0, ",", "."); } ?></h3>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-around p-10 bg-dark">
                                                            <div class="w-p100 mr-5">										
                                                            <h5 class="mb-0 mt-0">Seleccione Empresa</h5>
                                                            </div>
                                                            <div class="w-p100 ml-5">							
                                                                <select class="form-control">
                                                                    <option>Volcan Foods</option>
                                                                 <!--   <option>Best Berry Chile</option> -->
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </div>
                                                            -->
                                            <!--
                                            <div class="col-lg-6 col-12">
                                                <div class="box">
                                                    <div class="box-body p-0">
                                                        <div class="d-flex justify-content-between align-items-center p-5 bg-warning">
                                                            <h4 class="font-weight-700 my-0">PROCESO PACKING</h4>
                                                        </div>
                                                        <div class="d-flex justify-content-around align-items-center p-5 bg-secondary-light">
                                                            <div class="text-center br-1 w-p100">										
                                                                <p class="mb-0">Poce. Abiertos</p>			
                                                                <p class="mb-0"><?php if($query_procesoAbierto){ echo $query_procesoAbierto[0]["NUMERO"]; } ?></p>
                                                            </div>
                                                            <div class="text-center br-1 w-p100">										
                                                                <p class="mb-0">Rem. Abiertos</p>			
                                                                <p class="mb-0"><?php if($query_reembalajeAbierto){ echo $query_reembalajeAbierto[0]["NUMERO"]; } ?></p>
                                                            </div>
                                                            <div class="text-center br-1 w-p100">										
                                                                <p class="mb-0">Repa. Abierto</p>			
                                                                <p class="mb-0"><?php if($query_repaletizajeAbierto){ echo $query_repaletizajeAbierto[0]["NUMERO"]; } ?></p>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="d-flex justify-content-around p-10">
                                                            <div class="justify-content-between w-p100 p-10 bg-success-light mr-5 rounded">	
                                                        								
                                                                <p>MP PROCESADA</p>	
                                                                <br/>		
                                                                <h3 class="text-align: center;"><?php if($query_acumuladoMPProcesado){ echo number_format(round($query_acumuladoMPProcesado[0]["TOTAL"], 0), 0, ",", "."); } ?></h3>
                                                            </div>
                                                            <div class="justify-content-between w-p100 p-10 bg-info-light ml-5 rounded">							
                                                                <p>PROCE. DÍA ANTERIOR</p>
                                                                <br/>		
                                                                <h3 class="text-align: center;"><?php if($query_acumuladoMPProcesadoDiaAnterior){ echo number_format(round($query_acumuladoMPProcesadoDiaAnterior[0]["TOTAL"], 0), 0, ",", "."); } ?></h3>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-around p-10 bg-dark">
                                                            <div class="w-p100 mr-5">										
                                                            <h5 class="mb-0 mt-0">Seleccione Empresa</h5>
                                                            </div>
                                                            <div class="w-p100 ml-5">							
                                                                <select class="form-control">
                                                                    <option>Volcan Foods</option>
                                                                    <!--<option>Best Berry Chile</option>-->
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </div>
                                            <!-- col -->
                                            <!--<div class="col-12">
                                                <div class="box">
                                                    <div class="box-body">
                                                        <h4 class="box-title">Despacho PT</h4>
                                                        <div id="graficofrigorifico"></div>
                                                    </div>
                                                </div>
                                            </div>
                                                            -->
                                            <!-- /col -->
                                        </div> 
                                    </div>
                                </div>
				            </div>
                                                            -->
                       <!-- <div class="col-xl-5 col-12">
                                <div class="box">
                                    <div class="box-header with-border" style="padding: 7px 1.5rem!important;">
                                    <h4 class="box-title">Notificaciones</h4>
                                    </div>
                                    <div class="box-body">
                                        <div class="callout callout-danger">
                                            <h5>Problemas en sistema</h5>
                                            <p style="font-size: 11px;">Add the layout-boxed class to the body tag to get this layout. The boxed layout is helpful when working on
                                            large screens because it prevents the site from stretching very wide.</p>
                                            <button class="btn btn-primary" style="font-size: 10px;">Marcar como leído</button>
                                        </div>
                                        <div class="callout callout-success">
                                            <h5>Actualizaciones</h5>
                                            <p style="font-size: 11px;">Add the layout-boxed class to the body tag to get this layout. The boxed layout is helpful when working on
                                            large screens because it prevents the site from stretching very wide.</p>
                                            <button class="btn btn-primary" style="font-size: 10px;">Marcar como leído</button>
                                        </div>

                                        <div class="callout callout-warning">
                                            <h5>Actualizaciones</h5>
                                            <p style="font-size: 11px;">Add the layout-boxed class to the body tag to get this layout. The boxed layout is helpful when working on
                                            large screens because it prevents the site from stretching very wide.</p>
                                            <button class="btn btn-primary" style="font-size: 10px;">Marcar como leído</button>
                                        </div>

                                    </div>
                                </div>
				            </div>
                       
                                                            -->

                            

                           
                              
                            
                            
                        </div>  
                    </section>
                    <!-- /.content -->
                </div>
            </div>

            <?php include_once "../../assest/config/footer.php"; ?>
            <?php include_once "../../assest/config/menuExtraFruta.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../../assest/config/urlBase.php"; ?>
        <!--<script>
    Morris.Bar({
        element: 'graficofrigorifico',
        data: [{
            y: 'Angus',
            a: 17600,
            b: 9500
        }, {
            y: 'BBCH',
            a: 8000,
            b: 7000
        }, {
            y: 'Greenvic',
            a: 550,
            b: 4500
        }, {
            y: 'Volcan Foods',
            a: 800,
            b: 450
        }, {
            y: 'LLF',
            a: 55000,
            b: 45000
        }],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['D. Exportación', 'D. Interplanta'],
        barColors:['#ff3f3f', '#0080ff'],
        hideHover: 'auto',
        gridLineColor: '#eef0f2',
        resize: true
    });
            </script>
-->
</body>
</html>