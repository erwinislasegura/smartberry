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





include_once '../../assest/controlador/VALOR_ADO.php';
include_once '../../assest/controlador/DVALOR_ADO.php';
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


$VALOR_ADO =  new VALOR_ADO();
$DVALOR_ADO =  new DVALOR_ADO();
$TITEM_ADO =  new TITEM_ADO();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$FDA="";

//INICIALIZAR ARREGLOS
$ARRAYVALOR = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES



if ($EMPRESAS   && $TEMPORADAS) {

    $ARRAYVALOR = $VALOR_ADO->listarValorCerradoEmpresaTemporadaCBX($EMPRESAS,  $TEMPORADAS);

 
}

include_once "../../assest/config/validarDatosUrl.php";
include_once "../../assest/config/datosUrLAP.php";



?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Valor Liquidación</title>
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
                            <h3 class="page-title">Apertura Registro</h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                        <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                        <li class="breadcrumb-item" aria-current="page">Apertura Registro</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#">Valor Liquidación </a> </li>                                    
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
                                                    <th>Fecha Valor Liqui. </th>                                            
                                                    <th>Número Referencia  </th>                                                
                                                    <th>Fecha ETD  </th>                                              
                                                    <th>Fecha ETA  </th>                                          
                                                    <th>Número Contenedor  </th>                                      
                                                    <th>FDA Packing  </th>
                                                    <th>Observaciones Valor Liqui. </th>                                        
                                                    <th>Exportadora  </th>                                             
                                                    <th>Consignatario  </th>  
                                                    <th>Fecha Ingreso</th>
                                                    <th>Fecha Modificación</th>
                                                    <th>Empresa</th>
                                                    <th>Temporada</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($ARRAYVALOR as $r) : ?>

                                                    <?php

                                                                                            
                                                        $ARRAYVERICARGA=$ICARGA_ADO->verIcarga2($r["ID_ICARGA"]);
                                                        if ($ARRAYVERICARGA) {
                                                            $NUMEROICARGA=$ARRAYVERICARGA[0]["NUMERO_ICARGA"];
                                                            $NUMEROIREFERENCIA=$ARRAYVERICARGA[0]["NREFERENCIA_ICARGA"];

                                                            $CONSIGNATARIO = $ARRAYVERICARGA[0]['ID_CONSIGNATARIO'];
                                                            $ARRAYCONSIGNATARIO=$CONSIGNATARIO_ADO->verConsignatorio($CONSIGNATARIO);
                                                            if($ARRAYCONSIGNATARIO){
                                                                $NOMBRECONSIGNATARIO= $ARRAYCONSIGNATARIO[0]["NOMBRE_CONSIGNATARIO"];
                                                            }else{
                                                                $NOMBRECONSIGNATARIO="Sin Datos";
                                                            }
                                                            $EXPORTADORA = $ARRAYVERICARGA[0]['ID_EXPPORTADORA'];
                                                            $ARRAYEXPORTADORA=$EXPORTADORA_ADO->verExportadora($EXPORTADORA);
                                                            if($ARRAYEXPORTADORA){
                                                                $NOMBREEXPPORTADORA = $ARRAYEXPORTADORA[0]["NOMBRE_EXPORTADORA"];
                                                            }else{
                                                                $NOMBREEXPPORTADORA="Sin Datos";
                                                            }
                                                            $BOOKINGINSTRUCTIVO = $ARRAYVERICARGA[0]['BOOKING_ICARGA'];
                                                            $TEMBARQUE = $ARRAYVERICARGA[0]['TEMBARQUE_ICARGA'];
                                                            $FECHAETD = $ARRAYVERICARGA[0]['FECHAETD_ICARGA'];
                                                            $FECHAETA = $ARRAYVERICARGA[0]['FECHAETA_ICARGA'];                 
                                                            if ($TEMBARQUE) {
                                                                if ($TEMBARQUE == "1") {
                                                                    $TRANSPORTE = $ARRAYVERICARGA[0]['ID_TRANSPORTE'];
                                                                    $LCARGA = $ARRAYVERICARGA[0]['ID_LCARGA'];
                                                                    $LDESTINO = $ARRAYVERICARGA[0]['ID_LDESTINO'];
                                                                }
                                                                if ($TEMBARQUE == "2") {
                                                                    $LAEREA = $ARRAYVERICARGA[0]['ID_LAREA'];
                                                                    $ACARGA = $ARRAYVERICARGA[0]['ID_ACARGA'];
                                                                    $ADESTINO = $ARRAYVERICARGA[0]['ID_ADESTINO'];
                                                                }
                                                                if ($TEMBARQUE == "3") {
                                                                    $NAVIERA = $ARRAYVERICARGA[0]['ID_NAVIERA'];
                                                                    $PCARGA = $ARRAYVERICARGA[0]['ID_PCARGA'];
                                                                    $PDESTINO = $ARRAYVERICARGA[0]['ID_PDESTINO'];
                                                                }
                                                            }                
                                                            $BOLAWBCRTINSTRUCTIVO = $ARRAYVERICARGA[0]['BOLAWBCRT_ICARGA'];
                                                            $CVENTA = $ARRAYVERICARGA[0]['ID_CVENTA'];
                                                            $MVENTA = $ARRAYVERICARGA[0]['ID_MVENTA'];
                                                            $ARRAYDESPACHOEX=$DESPACHOEX_ADO->buscarDespachoExPorIcarga($ARRAYVERICARGA[0]["ID_ICARGA"]);
                                                            $ARRAYDESPACHOEX2=$DESPACHOEX_ADO->buscarDespachoExPorIcargaAgrupadoPorPlanta($ARRAYVERICARGA[0]["ID_ICARGA"]);
                                                            if($ARRAYDESPACHOEX){
                                                            $NUMEROCONTENEDOR=$ARRAYDESPACHOEX[0]['NUMERO_CONTENEDOR_DESPACHOEX'];                     
                                                            foreach ($ARRAYDESPACHOEX2 as $s) :    
                                                                $ARRAYVERPLANTA = $PLANTA_ADO->verPlanta($s['ID_PLANTA']);
                                                                if($ARRAYVERPLANTA){
                                                                  $FDA= $FDA.$ARRAYVERPLANTA[0]["FDA_PLANTA"]."<br> ";
                                                                }else{
                                                                  $FDA=$FDA;
                                                                }
                                                            endforeach;   
                                                            }else{
                                                                $FDA="Sin Datos";
                                                                $NUMEROCONTENEDOR=$ARRAYICARGA[0]['NCONTENEDOR_ICARGA'];
                                                            } 
                                                        }else{
                                                            $NUMEROIREFERENCIA="Sin Datos";
                                                            $NUMEROICARGA="Sin Datos";
                                                        }
                                              
                                                    $ARRAYEMPRESA = $EMPRESA_ADO->verEmpresa($r['ID_EMPRESA']);
                                                    if ($ARRAYEMPRESA) {
                                                        $NOMBREEMPRESA = $ARRAYEMPRESA[0]['NOMBRE_EMPRESA'];
                                                    } else {
                                                        $NOMBREEMPRESA = "Sin Datos";
                                                    }
                                                    $ARRAYTEMPORADA = $TEMPORADA_ADO->verTemporada($r['ID_TEMPORADA']);
                                                    if ($ARRAYTEMPORADA) {
                                                        $NOMBRETEMPORADA = $ARRAYTEMPORADA[0]['NOMBRE_TEMPORADA'];
                                                    } else {
                                                        $NOMBRETEMPORADA = "Sin Datos";
                                                    }

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
                                                                <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_VALOR']; ?>" />
                                                                <input type="hidden" class="form-control" placeholder="NUMERO" id="NUMERO" name="NUMERO" value="<?php echo $r['NUMERO_VALOR']; ?>"/>
                                                                <input type="hidden" class="form-control" placeholder="TABLA" id="TABLA" name="TABLA" value="liquidacion_valor" />
                                                                <input type="hidden" class="form-control" placeholder="COLUMNA" id="COLUMNA" name="COLUMNA" value="ID_VALOR" />
                                                                <input type="hidden" class="form-control" placeholder="TITULO" id="TITULO" name="TITULO" value="Valor Liquidación" />
                                                                <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroAP" />
                                                                <input type="hidden" class="form-control" placeholder="URL" id="URLO" name="URLO" value="listarAPvalor" />
                                                                <?php if ($r['ESTADO'] == "0") { ?>
                                                                    <span href="#" class="dropdown-item" data-toggle="tooltip" title="Abrir Registro">
                                                                        <button type="submit" class="btn btn-success btn-sm " id="ABRIRURL" name="ABRIRURL">
                                                                            <i class="fa fa-folder-open"></i><br> Abrir
                                                                        </button>
                                                                    </span>
                                                                <?php } ?>
                                                            </form>
                                                        </td> 
                                                        <td><?php echo $r['FECHA']; ?></td>
                                                        <td><?php echo $NUMEROIREFERENCIA; ?></td>
                                                        <td><?php echo $FECHAETD; ?></td>
                                                        <td><?php echo $FECHAETA; ?></td>
                                                        <td><?php echo $NUMEROCONTENEDOR; ?></td>
                                                        <td><?php echo $FDA; ?></td>                                                        
                                                        <td><?php echo $r['OBSERVACION_VALOR']; ?></td>
                                                        <td><?php echo $NOMBREEXPPORTADORA; ?></td>
                                                        <td><?php echo $NOMBRECONSIGNATARIO; ?></td>
                                                        <td><?php echo $r['INGRESO']; ?></td>
                                                        <td><?php echo $r['MODIFICACION']; ?></td>
                                                        <td><?php echo $NOMBREEMPRESA; ?></td>
                                                        <td><?php echo $NOMBRETEMPORADA; ?></td>
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