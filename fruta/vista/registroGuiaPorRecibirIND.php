<?php

include_once "../../assest/config/validarUsuarioFruta.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/FOLIO_ADO.php';

include_once '../../assest/controlador/VESPECIES_ADO.php';
include_once '../../assest/controlador/TRANSPORTE_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/CONDUCTOR_ADO.php';


include_once '../../assest/controlador/EXIINDUSTRIAL_ADO.php';
include_once '../../assest/controlador/DESPACHOIND_ADO.php';
include_once '../../assest/controlador/MGUIAIND_ADO.php';

include_once '../../assest/modelo/EXIINDUSTRIAL.php';
include_once '../../assest/modelo/MGUIAIND.php';
include_once '../../assest/modelo/DESPACHOIND.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$FOLIO_ADO =  new FOLIO_ADO();

$TRANSPORTE_ADO =  new TRANSPORTE_ADO();
$CONDUCTOR_ADO =  new CONDUCTOR_ADO();

$VESPECIES_ADO =  new VESPECIES_ADO();
$PRODUCTOR_ADO = new PRODUCTOR_ADO();

$DESPACHOIND_ADO = new DESPACHOIND_ADO();
$MGUIAIND_ADO = new MGUIAIND_ADO();
$EXIINDUSTRIAL_ADO = new EXIINDUSTRIAL_ADO();

$MGUIAIND =  new MGUIAIND();
$DESPACHOIND =  new DESPACHOIND();
$EXIINDUSTRIAL =  new EXIINDUSTRIAL();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD


$TOTALBRUTO = "";
$TOTALNETO = "";
$TOTALENVASE = "";
$FECHADESDE = "";
$FECHAHASTA = "";

$DISABLEDFOLIO = "";
$MENSAJEFOLIO = "";
$PRODUCTOR = "";
$NUMEROGUIA = "";

//INICIALIZAR ARREGLOS
$ARRAYDESPACHOPT = "";
$ARRAYDESPACHOPTTOTALES = "";
$ARRAYVEREMPRESA = "";
$ARRAYVERPRODUCTOR = "";
$ARRAYVERTRANSPORTE = "";
$ARRAYVERCONDUCTOR = "";
$ARRAYMGUIAIND = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES



if ($EMPRESAS  && $PLANTAS && $TEMPORADAS) {
    $ARRAYDESPACHOPT = $DESPACHOIND_ADO->listarDespachompEmpresaPlantaTemporadaGuiaCBX($EMPRESAS, $PLANTAS, $TEMPORADAS);
}
$ARRAYFOLIO2 = $FOLIO_ADO->verFolioPorEmpresaPlantaTemporadaTindustrial($EMPRESAS, $PLANTAS, $TEMPORADAS);
if (empty($ARRAYFOLIO2)) {
    $DISABLEDFOLIO = "disabled";
    $MENSAJEFOLIO = $MENSAJEFOLIO . "<br> NECESITA <b> CREAR LOS FOLIOS INDUSTRIAL </b> , PARA OCUPAR LA <b>  FUNCIONALIDAD </b>.  FAVOR DE <b> CONTACTARSE CON EL ADMINISTRADOR </b>";
}
include_once "../../assest/config/validarDatosUrl.php";
include_once "../../assest/config/datosUrLP.php";





?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Guia Por Recibir Industrial</title>
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

<body class="hold-transition light-skin fixed sidebar-mini theme-primary" >
    <div class="wrapper">
        <?php include_once "../../assest/config/menuFruta.php";        ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-full">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            <h3 class="page-title">Granel </h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                        <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                        <li class="breadcrumb-item" aria-current="page">Granel</li>
                                        <li class="breadcrumb-item" aria-current="page">Guia Por Recibir</li>
                                        <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Industrial </a>
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <?php include_once "../../assest/config/verIndicadorEconomico.php"; ?>
                    </div>
                </div>
                <label id="val_mensaje" class="validacion"><?php echo $MENSAJEFOLIO; ?> </label>
                <!-- Main content -->
                <section class="content">
                    <div class="box">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                    <div class="table-responsive">
                                        <table id="despachoind" class="table-hover " style="width: 100%;">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Número </th>
                                                    <th>Estado</th>
                                                    <th class="text-center">Operaciónes</th>
                                                    <th>Estado Despacho</th>
                                                    <th>Fecha Despacho </th>
                                                    <th>Número Guía </th>
                                                    <th>Tipo Despacho</th>
                                                    <th>CSG/CSP Despacho</th>
                                                    <th>Destino Despacho</th>
                                                    <th>Kilos Neto</th>
                                                    <th>Transporte </th>
                                                    <th>Nombre Conductor </th>
                                                    <th>Patente Camión </th>
                                                    <th>Patente Carro </th>
                                                    <th>Fecha Ingreso</th>
                                                    <th>Fecha Modificación</th>
                                                    <th>Semana Despacho </th>
                                                    <th>Empresa</th>
                                                    <th>Planta</th>
                                                    <th>Temporada</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                            <?php foreach ($ARRAYDESPACHOPT as $r) : ?>
                                                    <?php
                                                    if ($r['ESTADO_DESPACHO'] == "1") {
                                                        $ESTADODESPACHO = "Por Confirmar";
                                                    }
                                                    if ($r['ESTADO_DESPACHO'] == "2") {
                                                        $ESTADODESPACHO = "Confirmado";
                                                    }
                                                    if ($r['ESTADO_DESPACHO'] == "3") {
                                                        $ESTADODESPACHO = "Rechazado";
                                                    }
                                                    if ($r['ESTADO_DESPACHO'] == "4") {
                                                        $ESTADODESPACHO = "Aprobado";
                                                    }
                                                    if ($r['TDESPACHO'] == "1") {
                                                        $TDESPACHO = "Interplanta";
                                                        $NUMEROGUIADEPACHO=$r["NUMERO_GUIA_DESPACHO"];
                                                        $ARRAYPLANTA2 = $PLANTA_ADO->verPlanta($r['ID_PLANTA2']);
                                                        if ($ARRAYPLANTA2) {
                                                            $CSGCSPDESTINO=$ARRAYPLANTA2[0]['CODIGO_SAG_PLANTA'];
                                                            $DESTINO = $ARRAYPLANTA2[0]['NOMBRE_PLANTA'];
                                                        } else {
                                                            $CSGCSPDESTINO="Sin Datos";
                                                            $DESTINO = "Sin Datos";
                                                        }
                                                    }
                                                    if ($r['TDESPACHO'] == "2") {
                                                        $TDESPACHO = "Devolución Productor";
                                                        $NUMEROGUIADEPACHO=$r["NUMERO_GUIA_DESPACHO"];
                                                        $ARRAYPRODUCTOR = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);
                                                        if ($ARRAYPRODUCTOR) {
                                                            $CSGCSPDESTINO=$ARRAYPRODUCTOR[0]['CSG_PRODUCTOR'];
                                                            $DESTINO =  $ARRAYPRODUCTOR[0]['NOMBRE_PRODUCTOR'];
                                                        } else {
                                                            $CSGCSPDESTINO="Sin Datos";
                                                            $DESTINO = "Sin Datos";
                                                        }
                                                    }
                                                    if ($r['TDESPACHO'] == "3") {
                                                        $TDESPACHO = "Venta";
                                                        $NUMEROGUIADEPACHO=$r["NUMERO_GUIA_DESPACHO"];
                                                        $ARRAYCOMPRADOR = $COMPRADOR_ADO->verComprador($r['ID_COMPRADOR']);
                                                        if ($ARRAYCOMPRADOR) {
                                                            $CSGCSPDESTINO="No Aplica";
                                                            $DESTINO = $ARRAYCOMPRADOR[0]['NOMBRE_COMPRADOR'];
                                                        } else {
                                                            $CSGCSPDESTINO="Sin Datos";
                                                            $DESTINO = "Sin Datos";
                                                        }
                                                    }
                                                    if ($r['TDESPACHO'] == "4") {
                                                        $TDESPACHO = "Despacho de Descarte(R)";
                                                        $NUMEROGUIADEPACHO="No Aplica";
                                                        $CSGCSPDESTINO="No Aplica";
                                                        $DESTINO = $r['REGALO_DESPACHO'];
                                                    }
                                                    if ($r['TDESPACHO'] == "5") {
                                                        $TDESPACHO = "Planta Externa";
                                                        $NUMEROGUIADEPACHO=$r["NUMERO_GUIA_DESPACHO"];
                                                        $ARRAYPLANTA2 = $PLANTA_ADO->verPlanta($r['ID_PLANTA3']);
                                                        if ($ARRAYPLANTA2) {
                                                            $CSGCSPDESTINO=$ARRAYPLANTA2[0]['CODIGO_SAG_PLANTA'];
                                                            $DESTINO = $ARRAYPLANTA2[0]['NOMBRE_PLANTA'];
                                                        } else {
                                                            $CSGCSPDESTINO="Sin Datos";
                                                            $DESTINO = "Sin Datos";
                                                        }
                                                    }
                                                    $ARRAYVERTRANSPORTE = $TRANSPORTE_ADO->verTransporte($r['ID_TRANSPORTE']);
                                                    if ($ARRAYVERTRANSPORTE) {
                                                        $NOMBRETRANSPORTE = $ARRAYVERTRANSPORTE[0]['NOMBRE_TRANSPORTE'];
                                                    } else {
                                                        $NOMBRETRANSPORTE = "Sin Datos";
                                                    }
                                                    $ARRAYVERCONDUCTOR = $CONDUCTOR_ADO->verConductor($r['ID_CONDUCTOR']);
                                                    if ($ARRAYVERCONDUCTOR) {

                                                        $NOMBRECONDUCTOR = $ARRAYVERCONDUCTOR[0]['NOMBRE_CONDUCTOR'];
                                                    } else {
                                                        $NOMBRECONDUCTOR = "Sin Datos";
                                                    }

                                                    $ARRAYEMPRESA = $EMPRESA_ADO->verEmpresa($r['ID_EMPRESA']);
                                                    if ($ARRAYEMPRESA) {
                                                        $NOMBREEMPRESA = $ARRAYEMPRESA[0]['NOMBRE_EMPRESA'];
                                                    } else {
                                                        $NOMBREEMPRESA = "Sin Datos";
                                                    }
                                                    $ARRAYPLANTA = $PLANTA_ADO->verPlanta($r['ID_PLANTA']);
                                                    if ($ARRAYPLANTA) {
                                                        $NOMBREPLANTA = $ARRAYPLANTA[0]['NOMBRE_PLANTA'];
                                                    } else {
                                                        $NOMBREPLANTA = "Sin Datos";
                                                    }
                                                    $ARRAYTEMPORADA = $TEMPORADA_ADO->verTemporada($r['ID_TEMPORADA']);
                                                    if ($ARRAYTEMPORADA) {
                                                        $NOMBRETEMPORADA = $ARRAYTEMPORADA[0]['NOMBRE_TEMPORADA'];
                                                    } else {
                                                        $NOMBRETEMPORADA = "Sin Datos";
                                                    }

                                                    $ARRAYMGUIAIND = $MGUIAIND_ADO->listarMguiaDespachoCBX($r['ID_DESPACHO']);
                                                    ?>
                                                    <tr class="text-center">
                                                        <td> <?php echo $r['NUMERO_DESPACHO']; ?> </td>
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
                                                                            <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_DESPACHO']; ?>" />
                                                                            <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroDespachoind" />
                                                                            <input type="hidden" class="form-control" placeholder="URL" id="URLO" name="URLO" value="registroGuiaPorRecibirIND" />
                                                                            <input type="hidden" class="form-control" placeholder="URL" id="URLM" name="URLM" value="registroGuiaPorRecibirMIND" />
                                                                      
                                                                            <?php if ($r['ESTADO_DESPACHO'] == "2") { ?>
                                                                                <span href="#" class="dropdown-item" title="Operaciones">
                                                                                    <button type="submit" class="btn btn-success " data-toggle="tooltip" id="APROBARURL" name="APROBARURL" title="Aprobar"  <?php echo $DISABLEDFOLIO; ?>>
                                                                                        <i class="fa fa-check"></i> Aprobar
                                                                                    </button>
                                                                                    <button type="submit" class="btn btn-danger " data-toggle="tooltip" id="RECHAZARURL" name="RECHAZARURL" title="Rechazar"  <?php echo $DISABLEDFOLIO; ?>>
                                                                                        <i class="fa fa-close"></i> Rechazar
                                                                                    </button>
                                                                                </span>
                                                                            <?php } ?>
                                                                            <span href="#" class="dropdown-item" data-toggle="tooltip" title="Informe">
                                                                                <button type="button" class="btn  btn-danger  btn-block" id="defecto" name="informe" title="Informe" Onclick="abrirPestana('../../assest/documento/informeDespachoIND.php?parametro=<?php echo $r['ID_DESPACHO']; ?>&&usuario=<?php echo $IDUSUARIOS; ?>'); ">
                                                                                    <i class="fa fa-file-pdf-o"></i> Informe
                                                                                </button>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </td>
                                                        <td><?php echo $ESTADODESPACHO; ?></td>
                                                        <td><?php echo $r['FECHA']; ?></td>
                                                        <td><?php echo $NUMEROGUIADEPACHO; ?></td>
                                                        <td><?php echo $TDESPACHO; ?></td>
                                                        <td><?php echo $CSGCSPDESTINO; ?></td>
                                                        <td><?php echo $DESTINO; ?></td>
                                                        <td><?php echo $r['NETO']; ?></td>
                                                        <td><?php echo $NOMBRETRANSPORTE; ?></td>
                                                        <td><?php echo $NOMBRECONDUCTOR; ?></td>
                                                        <td><?php echo $r['PATENTE_CAMION']; ?></td>
                                                        <td><?php echo $r['PATENTE_CARRO']; ?></td>
                                                        <td><?php echo $r['INGRESO']; ?></td>
                                                        <td><?php echo $r['MODIFICACION']; ?></td>              
                                                        <td><?php echo $r['SEMANA']; ?></td>
                                                        <td><?php echo $NOMBREEMPRESA; ?></td>
                                                        <td><?php echo $NOMBREPLANTA; ?></td>
                                                        <td><?php echo $NOMBRETEMPORADA; ?></td>

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
                                                    <div class="input-group-text">Total Neto</div>
                                                    <button class="btn   btn-default" id="TOTALNETOV" name="TOTALNETOV" >                                                           
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
        <?php include_once "../../assest/config/menuExtraFruta.php"; ?>
    </div>
    <?php include_once "../../assest/config/urlBase.php"; ?>
    <?php 
        //OPERACIONES
        if (isset($_REQUEST['APROBARURL'])) {

            $DESPACHOIND->__SET('ID_DESPACHO', $_REQUEST['ID']);
            //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
            $DESPACHOIND_ADO->cerrado($DESPACHOIND);

            $DESPACHOIND->__SET('ID_DESPACHO', $_REQUEST['ID']);
            //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
            $DESPACHOIND_ADO->Aprobado($DESPACHOIND);

            $AUSUARIO_ADO->agregarAusuario2("NULL",1,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de Despacho Producto Industrial, se aprobo la guia.","fruta_despachoind", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

            $ARRAYEXISENCIADESPACHOMP = $EXIINDUSTRIAL_ADO->verExistenciaPorDespachoEnTransito($_REQUEST['ID']);
            foreach ($ARRAYEXISENCIADESPACHOMP as $r) :
                $EXIINDUSTRIAL->__SET('ID_EXIINDUSTRIAL', $r['ID_EXIINDUSTRIAL']);
                //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                $EXIINDUSTRIAL_ADO->despachadoInterplanta($EXIINDUSTRIAL);
            endforeach;

         
            foreach ($ARRAYEXISENCIADESPACHOMP as $r) :
                $EXIINDUSTRIAL->__SET('FOLIO_EXIINDUSTRIAL', $r['FOLIO_EXIINDUSTRIAL']);
                $EXIINDUSTRIAL->__SET('FOLIO_AUXILIAR_EXIINDUSTRIAL', $r['FOLIO_AUXILIAR_EXIINDUSTRIAL']);
                $EXIINDUSTRIAL->__SET('FECHA_EMBALADO_EXIINDUSTRIAL', $r['FECHA_EMBALADO_EXIINDUSTRIAL']);
                $EXIINDUSTRIAL->__SET('KILOS_NETO_EXIINDUSTRIAL', $r['KILOS_NETO_EXIINDUSTRIAL']);
                $EXIINDUSTRIAL->__SET('ALIAS_DINAMICO_FOLIO_EXIINDUSTRIAL', $r['ALIAS_DINAMICO_FOLIO_EXIINDUSTRIAL']);
                $EXIINDUSTRIAL->__SET('ALIAS_ESTATICO_FOLIO_EXIINDUSTRIAL', $r['ALIAS_ESTATICO_FOLIO_EXIINDUSTRIAL']);                      
                $EXIINDUSTRIAL->__SET('STOCK', $r['STOCK']);
                $EXIINDUSTRIAL->__SET('EMBOLSADO', $r['EMBOLSADO']);
                $EXIINDUSTRIAL->__SET('PREFRIO', $r['PREFRIO']);
                $EXIINDUSTRIAL->__SET('TESTADOSAG', $r['TESTADOSAG']);
                $EXIINDUSTRIAL->__SET('GASIFICADO', $r['GASIFICADO']);      
                $EXIINDUSTRIAL->__SET('TCOBRO', $r['TCOBRO']);                          
                $EXIINDUSTRIAL->__SET('FECHA_RECEPCION', $r['FECHA_RECEPCION']);
                $EXIINDUSTRIAL->__SET('FECHA_PROCESO', $r['FECHA_PROCESO']);
                $EXIINDUSTRIAL->__SET('FECHA_REEMBALAJE', $r['FECHA_REEMBALAJE']);
                $EXIINDUSTRIAL->__SET('INGRESO', $r['INGRESO']);                            
                $EXIINDUSTRIAL->__SET('ID_TMANEJO', $r['ID_TMANEJO']);
                $EXIINDUSTRIAL->__SET('ID_PRODUCTOR', $r['ID_PRODUCTOR']);
                $EXIINDUSTRIAL->__SET('ID_VESPECIES', $r['ID_VESPECIES']);
                $EXIINDUSTRIAL->__SET('ID_ESTANDAR', $r['ID_ESTANDAR']);
                $EXIINDUSTRIAL->__SET('ID_FOLIO',  $r['ID_FOLIO']);    
                $EXIINDUSTRIAL->__SET('ID_EMPRESA', $EMPRESAS);
                $EXIINDUSTRIAL->__SET('ID_PLANTA', $PLANTAS);
                $EXIINDUSTRIAL->__SET('ID_TEMPORADA', $TEMPORADAS);     
                $EXIINDUSTRIAL->__SET('ID_TCALIBRE', $r['ID_TCALIBRE']);
                $EXIINDUSTRIAL->__SET('ID_TEMBALAJE', $r['ID_TEMBALAJE']);
                $EXIINDUSTRIAL->__SET('ID_TTRATAMIENTO1', $r['ID_TTRATAMIENTO1']);
                $EXIINDUSTRIAL->__SET('ID_TTRATAMIENTO2', $r['ID_TTRATAMIENTO2']);    
                $EXIINDUSTRIAL->__SET('ID_ESTANDARMP', $r['ID_ESTANDARMP']);
                $EXIINDUSTRIAL->__SET('ID_RECEPCION', $r['ID_RECEPCION']);
                $EXIINDUSTRIAL->__SET('ID_PROCESO', $r['ID_PROCESO']);
                $EXIINDUSTRIAL->__SET('ID_REEMBALAJE', $r['ID_REEMBALAJE']); 
                $EXIINDUSTRIAL->__SET('ID_DESPACHO2', $_REQUEST['ID']);     
                $EXIINDUSTRIAL->__SET('ID_DESPACHO3', $r['ID_DESPACHO3']);                         
                $EXIINDUSTRIAL->__SET('ID_PLANTA2', $r['ID_PLANTA2']);
                $EXIINDUSTRIAL->__SET('ID_PLANTA3', $r['ID_PLANTA3']);
                $EXIINDUSTRIAL->__SET('ID_EXIINDUSTRIAL2', $r['ID_EXIINDUSTRIAL']);                
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $EXIINDUSTRIAL_ADO->agregarExiindustrialGuia($EXIINDUSTRIAL);

                $AUSUARIO_ADO->agregarAusuario2("NULL",1,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Existencia de Producto Industrial, por una aprobación de una guia interplanta.","fruta_exiindustrial", "NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

            endforeach;

            echo '<script>
                Swal.fire({
                    icon:"success",
                    title:"Guia Aprobada",
                    text:"los registro asociados a la guia se ha creado correctamente",
                    showConfirmButton: true,
                    confirmButtonText:"Cerrar",
                    closeOnConfirm:false
                }).then((result)=>{
                    location.href = "registroGuiaPorRecibirIND.php";                            
                })
            </script>';
        }
        if (isset($_REQUEST['RECHAZARURL'])) {
            $_SESSION["parametro"] = $_REQUEST['ID'];
            $_SESSION["parametro1"] = "rechazar";
            $_SESSION["urlO"] = $_REQUEST['URLO'];
            echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLM'] . ".php?op';</script>";
        }
    ?>
</body>

</html>