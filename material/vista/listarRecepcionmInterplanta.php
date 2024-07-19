<?php

include_once "../../assest/config/validarUsuarioMaterial.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/TDOCUMENTO_ADO.php';
include_once '../../assest/controlador/TRANSPORTE_ADO.php';
include_once '../../assest/controlador/CONDUCTOR_ADO.php';
include_once '../../assest/controlador/RESPONSABLE_ADO.php';
include_once '../../assest/controlador/BODEGA_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/PROVEEDOR_ADO.php';
include_once '../../assest/controlador/CLIENTE_ADO.php';

include_once '../../assest/controlador/PRODUCTO_ADO.php';
include_once '../../assest/controlador/TCONTENEDOR_ADO.php';
include_once '../../assest/controlador/TUMEDIDA_ADO.php';


include_once '../../assest/controlador/MGUIAM_ADO.php';
include_once '../../assest/controlador/DESPACHOM_ADO.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$TDOCUMENTO_ADO = new TDOCUMENTO_ADO();
$TRANSPORTE_ADO = new TRANSPORTE_ADO();
$CONDUCTOR_ADO = new CONDUCTOR_ADO();
$RESPONSABLE_ADO = new RESPONSABLE_ADO();
$BODEGA_ADO = new BODEGA_ADO();
$PRODUCTOR_ADO = new PRODUCTOR_ADO();
$PROVEEDOR_ADO = new PROVEEDOR_ADO();
$CLIENTE_ADO = new CLIENTE_ADO();

$PRODUCTO_ADO = new PRODUCTO_ADO();
$TCONTENEDOR_ADO = new TCONTENEDOR_ADO();
$TUMEDIDA_ADO = new TUMEDIDA_ADO();



$MGUIAM_ADO =  new MGUIAM_ADO();
$DESPACHOM_ADO =  new DESPACHOM_ADO();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD


$TOTALBRUTO = "";
$TOTALNETO = "";
$TOTALENVASE = "";
$FECHADESDE = "";
$FECHAHASTA = "";

$PRODUCTOR = "";
$NUMEROGUIA = "";

//INICIALIZAR ARREGLOS
$ARRAYDESPACHOPT = "";
$ARRAYDESPACHOPTTOTALES = "";
$ARRAYVEREMPRESA = "";
$ARRAYVERPRODUCTOR = "";
$ARRAYVERTRANSPORTE = "";
$ARRAYVERCONDUCTOR = "";
$ARRAYMGUIAMP = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES



if ($EMPRESAS  && $PLANTAS && $TEMPORADAS) {
    $ARRAYDESPACHOPT = $DESPACHOM_ADO->listarDespachomEmpresaPlantaTemporadaInterplantaCBX($EMPRESAS, $PLANTAS, $TEMPORADAS);
}
include_once "../../assest/config/validarDatosUrl.php";
include_once "../../assest/config/datosUrLP.php";

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Agrupado Interplanta Materiales</title>
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
        <?php include_once "../../assest/config/menuMaterial.php";        ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-full">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            <h3 class="page-title">Materiales </h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                        <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                        <li class="breadcrumb-item" aria-current="page">Materiales</li>
                                        <li class="breadcrumb-item" aria-current="page">Recepción</li>
                                        <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Agrupado InterPlanta </a>
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
                                        <table id="despachomm" class="table-hover " style="width: 100%;">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Número </th>
                                                    <th>Estado</th>
                                                    <th class="text-center">Operaciónes</th>
                                                    <th>Estado Despacho</th>
                                                    <th>Fecha Despacho </th>
                                                    <th>Tipo Despacho</th>
                                                    <th>CSG/CSP Despacho</th>
                                                    <th>Destino Despacho </th>
                                                    <th>Tipo Documento </th>
                                                    <th>Número Documento </th>
                                                    <th>Cantidad </th>
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
                                                    } else  if ($r['ESTADO_DESPACHO'] == "2") {
                                                        $ESTADODESPACHO = "Confirmado";
                                                    } else
                                                    if ($r['ESTADO_DESPACHO'] == "3") {
                                                        $ESTADODESPACHO = "Rechazado";
                                                    } else
                                                    if ($r['ESTADO_DESPACHO'] == "4") {
                                                        $ESTADODESPACHO = "Aprobado";
                                                    } else {
                                                        $ESTADODESPACHO = "Sin Datos";
                                                    }
                                                    if ($r['TDESPACHO'] == "1") {
                                                        $TDESPACHO = " A Sub Bodega";
                                                        $ARRAYVERBODEGA = $BODEGA_ADO->verBodega($r["ID_BODEGA"]);
                                                        if ($ARRAYVERBODEGA) {
                                                            $NOMBRDESTINO = $ARRAYVERBODEGA[0]["NOMBRE_BODEGA"];
                                                            $CSGCSPDESTINO="No Aplica";
                                                        } else {
                                                            $NOMBRDESTINO = "Sin Datos";
                                                            $CSGCSPDESTINO="Sin Datos";
                                                        }
                                                    } else
                                                    if ($r['TDESPACHO'] == "2") {
                                                        $TDESPACHO = "Interplanta";
                                                        $ARRAYPLANTAINTERNA = $PLANTA_ADO->verPlanta($r["ID_PLANTA2"]);
                                                        $ARRAYVERBODEGA = $BODEGA_ADO->verBodega($r["ID_BODEGA2"]);
                                                        if ($ARRAYVERBODEGA && $ARRAYPLANTAINTERNA) {
                                                            $CSGCSPDESTINO=$ARRAYPLANTAINTERNA[0]['CODIGO_SAG_PLANTA'];
                                                            $NOMBRDESTINO = "" . $ARRAYPLANTAINTERNA[0]["NOMBRE_PLANTA"] . " - " . $ARRAYVERBODEGA[0]["NOMBRE_BODEGA"];
                                                        } else {
                                                            $NOMBRDESTINO = "Sin Datos";
                                                            $CSGCSPDESTINO="Sin Datos";
                                                        }
                                                    } else
                                                    if ($r['TDESPACHO'] == "3") {
                                                        $TDESPACHO = "Despacho a Productor";
                                                        $ARRAYPRODUCTOR = $PRODUCTOR_ADO->verProductor($r["ID_PRODUCTOR"]);
                                                        if ($ARRAYPRODUCTOR) {
                                                            $CSGCSPDESTINO=$ARRAYPRODUCTOR[0]["CSG_PRODUCTOR"];
                                                            $NOMBRDESTINO = $ARRAYPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
                                                        } else {
                                                            $NOMBRDESTINO = "Sin Datos";
                                                            $CSGCSPDESTINO="Sin Datos";
                                                        }
                                                    } else
                                                    if ($r['TDESPACHO'] == "4") {
                                                        $TDESPACHO = "Devolución a Proveedor";
                                                        $ARRAYPROVEEDOR = $PROVEEDOR_ADO->verProveedor($r["ID_PROVEEDOR"]);
                                                        if ($ARRAYPROVEEDOR) {
                                                            $CSGCSPDESTINO=$ARRAYPRODUCTOR[0]["CSG_PRODUCTOR"];
                                                            $NOMBRDESTINO = $ARRAYPROVEEDOR[0]["NOMBRE_PROVEEDOR"];
                                                        } else {
                                                            $NOMBRDESTINO = "Sin Datos";
                                                            $CSGCSPDESTINO="Sin Datos";
                                                        }
                                                    } else
                                                    if ($r['TDESPACHO'] == "5") {
                                                        $TDESPACHO = "Planta Externa";
                                                        $ARRAYPLANTAEXTERNA = $PLANTA_ADO->verPlanta($r["ID_PLANTA3"]);
                                                        if ($ARRAYPLANTAEXTERNA) {
                                                            $CSGCSPDESTINO=$ARRAYPLANTAEXTERNA[0]['CODIGO_SAG_PLANTA'];
                                                            $NOMBRDESTINO = $ARRAYPLANTAEXTERNA[0]["NOMBRE_PLANTA"];
                                                        } else {
                                                            $NOMBRDESTINO = "Sin Datos";
                                                            $CSGCSPDESTINO="Sin Datos";
                                                        }
                                                    } else
                                                    if ($r['TDESPACHO'] == "6") {
                                                        $TDESPACHO = "Venta";
                                                        $ARRAYVERCLIENTE = $CLIENTE_ADO->verCliente($r["ID_CLIENTE"]);
                                                        if ($ARRAYVERCLIENTE) {
                                                            $CSGCSPDESTINO="No Aplica";
                                                            $NOMBRDESTINO = $ARRAYVERCLIENTE[0]["NOMBRE_CLIENTE"];
                                                        } else {
                                                            $NOMBRDESTINO = "Sin Datos";
                                                            $CSGCSPDESTINO="Sin Datos";
                                                        }
                                                    } else
                                                    if ($r['TDESPACHO'] == "7") {
                                                        $TDESPACHO = "Regalo";
                                                        $CSGCSPDESTINO="No Aplica";
                                                        $REGALO = $r['REGALO_DESPACHO'];
                                                    } else {
                                                        $CSGCSPDESTINO="Sin Datos";
                                                        $TDESPACHO = "Sin Datos";
                                                        $NOMBRDESTINO = "Sin Datos";
                                                    }

                                                    $ARRAYVERTDOCUMENTO = $TDOCUMENTO_ADO->verTdocumento($r['ID_TDOCUMENTO']);
                                                    if ($ARRAYVERTDOCUMENTO) {
                                                        $TDOCUMENTO = $ARRAYVERTDOCUMENTO[0]['NOMBRE_TDOCUMENTO'];
                                                    } else {
                                                        $TDOCUMENTO = "Sin Datos";
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

                                                    $ARRAYMGUIAM = $MGUIAM_ADO->listarMguiaDespachoCBX($r['ID_DESPACHO']);
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
                                                                            <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroDespachom" />
                                                                            <input type="hidden" class="form-control" placeholder="URL" id="URLO" name="URLO" value="listarDespachom" />
                                                                            <input type="hidden" class="form-control" placeholder="URL" id="URLMR" name="URLMR" value="listarDespachoMguiaM" />                                                                   
                                                                            <span href="#" class="dropdown-item" data-toggle="tooltip" title="Informe">
                                                                                <button type="button" class="btn  btn-danger  btn-block" id="defecto" name="informe" title="Informe" Onclick="abrirPestana('../../assest/documento/informeDespachoM.php?parametro=<?php echo $r['ID_DESPACHO']; ?>&&usuario=<?php echo $IDUSUARIOS; ?>'); ">
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
                                                        <td><?php echo $TDESPACHO; ?></td>
                                                        <td><?php echo $CSGCSPDESTINO; ?></td>
                                                        <td><?php echo $NOMBRDESTINO; ?></td>
                                                        <td><?php echo $TDOCUMENTO; ?></td>
                                                        <td><?php echo $r['NUMERO_DOCUMENTO']; ?></td>
                                                        <td><?php echo $r['CANTIDAD']; ?></td>
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
                                                    <div class="input-group-text">Total Cantidad</div>
                                                    <button class="btn   btn-default" id="TOTALENVASEV" name="TOTALENVASEV" >                                                           
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