<?php

include_once "../../assest/config/validarUsuarioMaterial.php";


include_once '../../assest/controlador/INVENTARIOM_ADO.php';
include_once '../../assest/controlador/FICHA_ADO.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR



$INVENTARIOM_ADO = new INVENTARIOM_ADO();
$FICHA_ADO =  new FICHA_ADO();



//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";

$TOTALCANTIDAD = "";
$TOTCALVALOR = "";

$FECHADESDE = "";
$FECHAHASTA = "";
$PRODUCTOR = "";

$NUMEROGUIA = "";

//INICIALIZAR ARREGLOS
$ARRAYINVENTARIORECEPCION = "";
$ARRAYINVENTARIORECEPCIONINTER = "";
$ARRAYINVENTARIODESPACHO = "";
$ARRAYINVENTARIOCONSUMO = "";
$ARRAYINVENTARIOCONSUMODESPACHOPT = "";




//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
if ($EMPRESAS  && $PLANTAS && $TEMPORADAS) {

    $ARRAYINVENTARIORECEPCION = $INVENTARIOM_ADO->listarKardexInventarioRecepcionPorEmpresaPlantaTemporadaCBX($EMPRESAS, $PLANTAS, $TEMPORADAS);

    $ARRAYINVENTARIORECEPCIONINTER = $INVENTARIOM_ADO->listarKardexInventarioRecepcionInterplantaPorEmpresaPlantaTemporadaCBX($EMPRESAS, $PLANTAS, $TEMPORADAS);

    $ARRAYINVENTARIODESPACHO = $INVENTARIOM_ADO->listarKardexInventarioDespachoPorEmpresaPlantaTemporadaCBX($EMPRESAS, $PLANTAS, $TEMPORADAS);

    $ARRAYINVENTARIOCONSUMO = $FICHA_ADO->listarKardexConsumoFichaPorEmpresaPlantaTemporadaCBX($EMPRESAS, $PLANTAS,  $TEMPORADAS);
    $ARRAYINVENTARIOCONSUMODESPACHOPT = $FICHA_ADO->listarKardexConsumoFichaDespachoPt($EMPRESAS, $PLANTAS,  $TEMPORADAS);
    
    
}

include_once "../../assest/config/validarDatosUrl.php";
include_once "../../assest/config/reporteUrl.php";


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Existencia Materiales</title>
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

                //FUNCION PARA ABRIR VENTANA QUE SE ENCUENTRA LA OPERACIONES DE DETALLE DE INVENTARIO
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
                            <h3 class="page-title">Kardex</h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                        <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                        <li class="breadcrumb-item" aria-current="page">Kardex</li>
                                        <li class="breadcrumb-item active" aria-current="page"> <a href="listarHInventariom.php"> Kardex Materiales </a>  </li>
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
                                        <table id="kardexm" class="table-hover " style="width: 100%;">
                                            <thead>
                                                <tr  class="center">
                                                    <th>Codigo Producto </th>
                                                    <th>Nombre Producto </th>
                                                    <th>Unidad Medida</th>
                                                    <th>Nombre Bodega</th>    
                                                    <th>Empresa</th>
                                                    <th>Planta</th>    
                                                    <th>Tipo Movimiento</th>
                                                    <th>Fecha Movimiento</th>                                                     
                                                    <th>N° Movimiento</th>
                                                    <th>N° Documento</th> 
                                                    <th>Origen</th>                                                  
                                                    <th>Destino</th>    
                                                    <th>Consumo</th>
                                                    <th>Entrada </th>
                                                    <th>Salida </th>
                                                    <th>Total </th>
                                                    <th>Temporada</th>                                                
                                                </tr>
                                            </thead>
                                            <tbody>
                                               <?php /*foreach ($ARRAYINVENTARIOCONSUMO as $r) : ?>
                                                    <tr class="center">
                                                        <td> <?php echo $r['CODIGO']; ?> </td>
                                                        <td> <?php echo $r['PRODUCTO']; ?> </td>
                                                        <td> <?php echo $r['TUMEDIDA']; ?> </td> 
                                                        <td> <?php echo "No Aplica"; ?> </td>  
                                                        <td> <?php echo $r['EMPRESA']; ?> </td>
                                                        <td> <?php echo $r['PLANTA']; ?> </td>  
                                                        <td> <?php echo "Consumo de Proceso"; ?> </td>  
                                                        <td> <?php echo $r['FECHAPROCESO']; ?> </td>  
                                                        <td> <?php echo $r['NUMERO_PROCESO']; ?> </td>  
                                                        <td> <?php echo "No Aplica"; ?> </td>  
                                                        <td> <?php echo "No Aplica"; ?> </td>  
                                                        <td> <?php echo "No Aplica"; ?> </td>    
                                                        <td> <?php echo +$r['CONSUMO']; ?> </td> 
                                                        <td> <?php echo "0"; ?> </td>                                                          
                                                        <td> <?php echo "0"; ?> </td>  
                                                        <td> <?php echo -$r['CONSUMO']; ?> </td>        
                                                        <td> <?php echo $r['TEMPORADA']; ?> </td>    
                                                    </tr>
                                                <?php endforeach;*/ ?>
                                                <?php foreach ($ARRAYINVENTARIOCONSUMODESPACHOPT as $r) : ?>
                                                    <tr class="center">
                                                        <td> <?php echo $r['CODIGO']; ?> </td>
                                                        <td> <?php echo $r['PRODUCTO']; ?> </td>
                                                        <td> <?php echo $r['NOMBRE_TUMEDIDA']; ?> </td> 
                                                        <td> <?php echo "No Aplica"; ?> </td>  
                                                        <td> <?php echo $r['NOMBRE_EMPRESA']; ?> </td>
                                                        <td> <?php echo $r['PLANTAORIGEN']; ?> </td>  
                                                        <td> <?php echo "Despacho Producto Terminado"; ?> </td>  
                                                        <td> <?php echo $r['FECHADESPACHO']; ?> </td>  
                                                        <td> <?php echo $r['NUMERO_DESPACHO']; ?> </td>  
                                                        <td> <?php echo $r['NUMERO_GUIA_DESPACHO']; ?> </td>  
                                                        <td> <?php echo $r['PLANTAORIGEN']; ?> </td>  
                                                        <td> <?php echo $r['PLANTADESTINO']; ?> </td>    
                                                        <td> <?php echo +$r['CONSUMO']; ?> </td> 
                                                        <td> <?php echo "0"; ?> </td>                                                          
                                                        <td> <?php echo +$r['CONSUMO']; ?> </td>  
                                                        <td> <?php echo -$r['CONSUMO']; ?> </td>        
                                                        <td> <?php echo $r['NOMBRE_TEMPORADA']; ?> </td>    
                                                    </tr>
                                                <?php endforeach; ?>
                                                <?php foreach ($ARRAYINVENTARIORECEPCION as $r) : ?>
                                                    <tr class="center">
                                                        <td> <?php echo $r['CODIGO']; ?> </td>
                                                        <td> <?php echo $r['PRODUCTO']; ?> </td>
                                                        <td> <?php echo $r['TUMEDIDA']; ?> </td>
                                                        <td> <?php echo $r['BODEGA']; ?> </td>
                                                        <td> <?php echo $r['EMPRESA']; ?> </td>
                                                        <td> <?php echo $r['PLANTA']; ?> </td>  
                                                        <td> <?php echo $r['TRECEPCION']; ?> </td>  
                                                        <td> <?php echo $r['FECHARECEPCION']; ?> </td>  
                                                        <td> <?php echo $r['NUMERORECEPCION']; ?> </td>  
                                                        <td> <?php echo $r['NUMERODOCUMENTORECEPCION']; ?> </td>  
                                                        <td> <?php echo $r['ORIGENRECEPCION']; ?> </td>  
                                                        <td> <?php echo "No Aplica"; ?> </td>     
                                                        <td> <?php echo "0"; ?> </td>        
                                                        <td> <?php echo $r['CANTIDAD']; ?> </td>                                                    
                                                        <td> <?php echo "0"; ?> </td>  
                                                        <td> <?php echo $r['CANTIDAD']; ?> </td>        
                                                        <td> <?php echo $r['TEMPORADA']; ?> </td>    
                                                    </tr>
                                                <?php endforeach; ?>
                                                <?php foreach ($ARRAYINVENTARIORECEPCIONINTER as $r) : ?>
                                                    <tr class="center">
                                                        <td> <?php echo $r['CODIGO']; ?> </td>
                                                        <td> <?php echo $r['PRODUCTO']; ?> </td>
                                                        <td> <?php echo $r['TUMEDIDA']; ?> </td>
                                                        <td> <?php echo $r['BODEGA']; ?> </td>
                                                        <td> <?php echo $r['EMPRESA']; ?> </td>
                                                        <td> <?php echo $r['PLANTA']; ?> </td>  
                                                        <td> <?php echo $r['TDESPACHO2']; ?> </td>  
                                                        <td> <?php echo $r['FECHADESPACHO2']; ?> </td>  
                                                        <td> <?php echo $r['NUMERODESPACHO2']; ?> </td>  
                                                        <td> <?php echo $r['NUMERODOCUMENTODESPACHO2']; ?> </td>   
                                                        <td> <?php echo $r['DESTINODESPACHO2']; ?> </td> 
                                                        <td> <?php echo "No Aplica"; ?> </td>     
                                                        <td> <?php echo "0"; ?> </td>          
                                                        <td> <?php echo $r['CANTIDAD']; ?> </td>                                                 
                                                        <td> <?php echo "0"; ?> </td>   
                                                        <td> <?php echo $r['CANTIDAD']; ?> </td>        
                                                        <td> <?php echo $r['TEMPORADA']; ?> </td>    
                                                    </tr>
                                                <?php endforeach; ?>
                                                <?php foreach ($ARRAYINVENTARIODESPACHO as $r) : ?>
                                                    <tr class="center">
                                                        <td> <?php echo $r['CODIGO']; ?> </td>
                                                        <td> <?php echo $r['PRODUCTO']; ?> </td>
                                                        <td> <?php echo $r['TUMEDIDA']; ?> </td>
                                                        <td> <?php echo $r['BODEGA']; ?> </td>
                                                        <td> <?php echo $r['EMPRESA']; ?> </td>
                                                        <td> <?php echo $r['PLANTA']; ?> </td>  
                                                        <td> <?php echo $r['TDESPACHO']; ?> </td>  
                                                        <td> <?php echo $r['FECHADESPACHO']; ?> </td>  
                                                        <td> <?php echo $r['NUMERODESPACHO']; ?> </td>  
                                                        <td> <?php echo $r['NUMERODOCUMENTODESPACHO']; ?> </td>   
                                                        <td> <?php echo "No Aplica"; ?> </td>     
                                                        <td> <?php echo $r['DESTINODESPACHO']; ?> </td> 
                                                        <td> <?php echo "0"; ?> </td>                                                         
                                                        <td> <?php echo "0"; ?> </td>  
                                                        <td> <?php echo $r['CANTIDAD']; ?> </td>   
                                                        <td> <?php echo - $r['CANTIDAD']; ?> </td>        
                                                        <td> <?php echo $r['TEMPORADA']; ?> </td>    
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
                                                    <div class="input-group-text">Total Consumo</div>
                                                    <button class="btn   btn-default" id="TOTACONSUMOV" name="TOTACONSUMOV" >                                                           
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Total Entrada</div>
                                                    <button class="btn   btn-default" id="TOTALENTRADAV" name="TOTALENTRADAV" >                                                           
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Total Salida</div>
                                                    <button class="btn   btn-default" id="TOTALSALIDAV" name="TOTALSALIDAV" >                                                           
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Total</div>
                                                    <button class="btn   btn-default" id="TOTALV" name="TOTALV" >                                                           
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