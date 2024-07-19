<?php

include_once "../../assest/config/validarUsuarioExpo.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES/
include_once '../../assest/controlador/ICARGA_ADO.php';
include_once '../../assest/controlador/DICARGA_ADO.php';
include_once '../../assest/controlador/DESPACHOEX_ADO.php';
include_once '../../assest/controlador/CONSIGNATARIO_ADO.php';
include_once '../../assest/controlador/EXPORTADORA_ADO.php';

include_once '../../assest/controlador/MVENTA_ADO.php';
include_once '../../assest/controlador/CVENTA_ADO.php';
include_once '../../assest/controlador/SEGURO_ADO.php';

include_once '../../assest/controlador/TMONEDA_ADO.php';

include_once '../../assest/controlador/TRANSPORTE_ADO.php';
include_once '../../assest/controlador/LCARGA_ADO.php';
include_once '../../assest/controlador/LDESTINO_ADO.php';

include_once '../../assest/controlador/LAEREA_ADO.php';
include_once '../../assest/controlador/ACARGA_ADO.php';
include_once '../../assest/controlador/ADESTINO_ADO.php';

include_once '../../assest/controlador/NAVIERA_ADO.php';
include_once '../../assest/controlador/PCARGA_ADO.php';
include_once '../../assest/controlador/PDESTINO_ADO.php';


include_once '../../assest/controlador/BROKER_ADO.php';



include_once '../../assest/controlador/VALORP_ADO.php';
include_once '../../assest/controlador/DVALORP_ADO.php';
include_once '../../assest/controlador/TITEM_ADO.php';




//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$ICARGA_ADO =  new ICARGA_ADO();
$DICARGA_ADO =  new DICARGA_ADO();
$DESPACHOEX_ADO =  new DESPACHOEX_ADO();

$CONSIGNATARIO_ADO =  new CONSIGNATARIO_ADO();
$EXPORTADORA_ADO =  new EXPORTADORA_ADO();

$TRANSPORTE_ADO =  new TRANSPORTE_ADO();
$LCARGA_ADO =  new LCARGA_ADO();
$LDESTINO_ADO =  new LDESTINO_ADO();

$LAEREA_ADO =  new LAEREA_ADO();
$ACARGA_ADO =  new ACARGA_ADO();
$ADESTINO_ADO =  new ADESTINO_ADO();

$NAVIERA_ADO =  new NAVIERA_ADO();
$PCARGA_ADO =  new PCARGA_ADO();
$PDESTINO_ADO =  new PDESTINO_ADO();

$MVENTA_ADO =  new MVENTA_ADO();
$CVENTA_ADO =  new CVENTA_ADO();
$SEGURO_ADO =  new SEGURO_ADO();

$TMONEDA_ADO = new TMONEDA_ADO();
$BROKER_ADO = new BROKER_ADO();


$VALOR_ADO =  new VALORP_ADO();
$DVALOR_ADO =  new DVALORP_ADO();
$TITEM_ADO =  new TITEM_ADO();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$FDA="";

//INICIALIZAR ARREGLOS
$ARRAYVALOR = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES



if ($EMPRESAS   && $TEMPORADAS) {

    $ARRAYVALOR = $VALOR_ADO->listarValorEmpresaTemporadaCBX($EMPRESAS,  $TEMPORADAS);
    $ARRAYTITEMPAGO = $TITEM_ADO->listarTitemPorEmpresaPagoCBX($EMPRESAS);

 
}

include_once "../../assest/config/validarDatosUrl.php";
include_once "../../assest/config/datosUrLP.php";




?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Agrupado Valor Pago</title>
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
                //FUNCION PARA ABRIR VENTANA QUE SE ENCUENTRA LA OPERACIONES DE DETALLE DE RECEPCION
                function abrirVentana(url) {
                    var opciones =
                        "'directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=1000, height=800'";
                    window.open(url, 'window', opciones);
                }
            </script>
</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary">
    <div class="wrapper">
        <?php include_once "../../assest/config/menuExpo.php"; ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-full">

                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                                <h3 class="page-title">Pago</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"> <a href="index.php"> <i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Pago</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#">Registro Valor Pago </a> </li>                                    
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
                                        <table id="modulo" class="table-hover " style="width: 100%;">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Número Valor Liqui.</th>
                                                    <th>Estado</th>
                                                    <th class="text-center">Operaciónes</th>
                                                    <th>Fecha Liqui. </th>                                            
                                                    <th>Número Referencia  </th>                                                
                                                    <th>Cliente </th>                                         
                                                    <th>Número Contenedor  </th>      
                                                    <th>Observaciones Valor Liqui. </th>               
                                                    <th>Fecha Ingreso</th>               
                                                    <?php foreach ($ARRAYTITEMPAGO as $d) : ?>
                                                        <th><?php echo "Fecha Pago: <br>".$d["NOMBRE_TITEM"]; ?></th>   
                                                        <th><?php echo "Valor Pago: <br>".$d["NOMBRE_TITEM"]; ?></th>     
                                                    <?php endforeach; ?>            
                                                    <th>Total Pago</th>               
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($ARRAYVALOR as $r) : ?>

                                                    <?php

                                                        $ARRAYVALORTOTAL=$DVALOR_ADO->obtenrTotalPorValor($r["ID_VALOR"]);
                                                        if($ARRAYVALORTOTAL){
                                                            $TOTALVALOR= $ARRAYVALORTOTAL[0]["TOTAL"];       
                                                        }else{
                                                            $TOTALVALOR="0";
                                                        }                                   
                                                        $ARRAYVERICARGA=$ICARGA_ADO->verIcarga2($r["ID_ICARGA"]);
                                                        if ($ARRAYVERICARGA) {
                                                            // $NUMEROICARGA=$ARRAYVERICARGA[0]["NUMERO_ICARGA"];
                                                            $NUMEROIREFERENCIA=$ARRAYVERICARGA[0]["NREFERENCIA_ICARGA"];
                                                            $ARRAYBROKER=$BROKER_ADO->verBroker($ARRAYVERICARGA[0]["ID_BROKER"]);
                                                            if($ARRAYBROKER){
                                                                $NOMBREBROKER=$ARRAYBROKER[0]["NOMBRE_BROKER"];
                                                            }else{
                                                                $NOMBREBROKER="Sin Datos";
                                                            }                                                                 
                                                     
                                                            // $CONSIGNATARIO = $ARRAYVERICARGA[0]['ID_CONSIGNATARIO'];
                                                            // $ARRAYCONSIGNATARIO=$CONSIGNATARIO_ADO->verConsignatorio($CONSIGNATARIO);
                                                            // if($ARRAYCONSIGNATARIO){
                                                            //     $NOMBRECONSIGNATARIO= $ARRAYCONSIGNATARIO[0]["NOMBRE_CONSIGNATARIO"];
                                                            // }else{
                                                            //     $NOMBRECONSIGNATARIO="Sin Datos";
                                                            // }
                                                            // $EXPORTADORA = $ARRAYVERICARGA[0]['ID_EXPPORTADORA'];
                                                            // $ARRAYEXPORTADORA=$EXPORTADORA_ADO->verExportadora($EXPORTADORA);
                                                            // if($ARRAYEXPORTADORA){
                                                            //     $NOMBREEXPPORTADORA = $ARRAYEXPORTADORA[0]["NOMBRE_EXPORTADORA"];
                                                            // }else{
                                                            //     $NOMBREEXPPORTADORA="Sin Datos";
                                                            // }                                                             
                                                            // $BOOKINGINSTRUCTIVO = $ARRAYVERICARGA[0]['BOOKING_ICARGA'];
                                                            // $TEMBARQUE = $ARRAYVERICARGA[0]['TEMBARQUE_ICARGA'];
                                                            // $FECHAETD = $ARRAYVERICARGA[0]['FECHAETD_ICARGA'];
                                                            // $FECHAETA = $ARRAYVERICARGA[0]['FECHAETA_ICARGA'];                 
                                                            // if ($TEMBARQUE) {
                                                            //     if ($TEMBARQUE == "1") {
                                                            //         $TRANSPORTE = $ARRAYVERICARGA[0]['ID_TRANSPORTE'];
                                                            //         $LCARGA = $ARRAYVERICARGA[0]['ID_LCARGA'];
                                                            //         $LDESTINO = $ARRAYVERICARGA[0]['ID_LDESTINO'];
                                                            //     }
                                                            //     if ($TEMBARQUE == "2") {
                                                            //         $LAEREA = $ARRAYVERICARGA[0]['ID_LAREA'];
                                                            //         $ACARGA = $ARRAYVERICARGA[0]['ID_ACARGA'];
                                                            //         $ADESTINO = $ARRAYVERICARGA[0]['ID_ADESTINO'];
                                                            //     }
                                                            //     if ($TEMBARQUE == "3") {
                                                            //         $NAVIERA = $ARRAYVERICARGA[0]['ID_NAVIERA'];
                                                            //         $PCARGA = $ARRAYVERICARGA[0]['ID_PCARGA'];
                                                            //         $PDESTINO = $ARRAYVERICARGA[0]['ID_PDESTINO'];
                                                            //     }
                                                            // }                
                                                            // $BOLAWBCRTINSTRUCTIVO = $ARRAYVERICARGA[0]['BOLAWBCRT_ICARGA'];
                                                            // $CVENTA = $ARRAYVERICARGA[0]['ID_CVENTA'];
                                                            // $MVENTA = $ARRAYVERICARGA[0]['ID_MVENTA'];
                                                            $ARRAYDESPACHOEX=$DESPACHOEX_ADO->buscarDespachoExPorIcarga($ARRAYVERICARGA[0]["ID_ICARGA"]);
                                                            $ARRAYDESPACHOEX2=$DESPACHOEX_ADO->buscarDespachoExPorIcargaAgrupadoPorPlanta($ARRAYVERICARGA[0]["ID_ICARGA"]);
                                                            if($ARRAYDESPACHOEX){
                                                            $NUMEROCONTENEDOR=$ARRAYDESPACHOEX[0]['NUMERO_CONTENEDOR_DESPACHOEX'];                     
                                                            foreach ($ARRAYDESPACHOEX2 as $s) :    
                                                                // $ARRAYVERPLANTA = $PLANTA_ADO->verPlanta($s['ID_PLANTA']);
                                                                // if($ARRAYVERPLANTA){
                                                                //   $FDA= $FDA.$ARRAYVERPLANTA[0]["FDA_PLANTA"]."<br> ";
                                                                // }else{
                                                                //   $FDA=$FDA;
                                                                // } 
                                                            endforeach;   
                                                            }else{
                                                                // $FDA="Sin Datos";
                                                                $NUMEROCONTENEDOR=$ARRAYICARGA[0]['NCONTENEDOR_ICARGA'];
                                                            } 
                                                        }else{
                                                            $NUMEROIREFERENCIA="Sin Datos";
                                                            // $NUMEROICARGA="Sin Datos";
                                                        }
                                              
                                                    // $ARRAYEMPRESA = $EMPRESA_ADO->verEmpresa($r['ID_EMPRESA']);
                                                    // if ($ARRAYEMPRESA) {
                                                    //     $NOMBREEMPRESA = $ARRAYEMPRESA[0]['NOMBRE_EMPRESA'];
                                                    // } else {
                                                    //     $NOMBREEMPRESA = "Sin Datos";
                                                    // }
                                                    // $ARRAYTEMPORADA = $TEMPORADA_ADO->verTemporada($r['ID_TEMPORADA']);
                                                    // if ($ARRAYTEMPORADA) {
                                                    //     $NOMBRETEMPORADA = $ARRAYTEMPORADA[0]['NOMBRE_TEMPORADA'];
                                                    // } else {
                                                    //     $NOMBRETEMPORADA = "Sin Datos";
                                                    // }

                                                    ?>

                                                    <tr class="text-center">
                                                        <td><?php echo $r['NUMERO_VALOR']; ?></td>
                                                        <td>
                                                            <?php if ($r['ESTADO'] == "0") { ?>
                                                                <button type="button" class="btn btn-block btn-danger">Cerrado</button>
                                                            <?php  }  ?>
                                                            <?php if ($r['ESTADO'] == "1") { ?>
                                                                <button type="button" class="btn btn-block btn-success">Abierto</button>
                                                            <?php  }  ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <form method="post" id="form1">
                                                                <div class="list-icons d-inline-flex">
                                                                    <div class="list-icons-item dropdown">
                                                                        <button class="btn btn-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <i class="glyphicon glyphicon-cog"></i>
                                                                        </button>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <button class="dropdown-menu" aria-labelledby="dropdownMenuButton"></button>
                                                                            <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_VALOR']; ?>" />
                                                                            <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroValorPago" />
                                                                            <input type="hidden" class="form-control" placeholder="URL" id="URLO" name="URLO" value="listarValorPago" />
                                                                            <?php if ($r['ESTADO'] == "0") { ?>
                                                                                <span href="#" class="dropdown-item" data-toggle="tooltip" title="Ver">
                                                                                    <button type="submit" class="btn btn-info btn-block " id="VERURL" name="VERURL">
                                                                                        <i class="ti-eye"></i> Ver
                                                                                    </button>
                                                                                </span>
                                                                            <?php } ?>
                                                                            <?php if ($r['ESTADO'] == "1") { ?>
                                                                                <span href="#" class="dropdown-item" data-toggle="tooltip" title="Editar">
                                                                                    <button type="submit" class="btn  btn-warning btn-block" id="EDITARURL" name="EDITARURL">
                                                                                        <i class="ti-pencil-alt"></i> Editar
                                                                                    </button>
                                                                                </span>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </td>
                                                        <td><?php echo $r['FECHA']; ?></td>
                                                        <td><?php echo $NUMEROIREFERENCIA; ?></td>
                                                        <td><?php echo $NOMBREBROKER; ?></td>
                                                        <td><?php echo $NUMEROCONTENEDOR; ?></td>                               
                                                        <td><?php echo $r['OBSERVACION_VALOR']; ?></td>
                                                        <td><?php echo $r['INGRESO']; ?></td>
                                                            <?php foreach ($ARRAYTITEMPAGO as $d) : ?>
                                                                <?php 
                                                                    $ARRAYDVALORP=$DVALOR_ADO->buscarPorValorItem($r["ID_VALOR"],$d["ID_TITEM"]);
                                                                    if($ARRAYDVALORP){
                                                                       $FECHADVALORP= $ARRAYDVALORP[0]["FECHA_DVALOR"];    
                                                                       $VALORDVALORP= $ARRAYDVALORP[0]["VALOR_DVALOR"];         
                                                                    }else{
                                                                       $FECHADVALORP="";
                                                                       $VALORDVALORP=0;
                                                                    }
                                                                ?>
                                                                <td><?php echo $FECHADVALORP; ?></td>    
                                                                <td><?php echo $VALORDVALORP; ?></td>     
                                                            <?php endforeach; ?>
                                                        <td><?php echo $TOTALVALOR; ?></td>    
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
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