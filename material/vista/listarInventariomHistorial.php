<?php

include_once "../../assest/config/validarUsuarioMaterial.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/BODEGA_ADO.php';
include_once '../../assest/controlador/PRODUCTO_ADO.php';
include_once '../../assest/controlador/TUMEDIDA_ADO.php';
include_once '../../assest/controlador/TCONTENEDOR_ADO.php';
include_once '../../assest/controlador/TDOCUMENTO_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/PROVEEDOR_ADO.php';
include_once '../../assest/controlador/CLIENTE_ADO.php';



include_once '../../assest/controlador/OCOMPRA_ADO.php';
include_once '../../assest/controlador/RECEPCIONM_ADO.php';
include_once '../../assest/controlador/DESPACHOM_ADO.php';
include_once '../../assest/controlador/INVENTARIOM_ADO.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$BODEGA_ADO =  new BODEGA_ADO();
$PRODUCTO_ADO =  new PRODUCTO_ADO();
$TUMEDIDA_ADO =  new TUMEDIDA_ADO();
$TCONTENEDOR_ADO =  new TCONTENEDOR_ADO();
$TDOCUMENTO_ADO =  new TDOCUMENTO_ADO();
$PRODUCTOR_ADO = new PRODUCTOR_ADO();
$PROVEEDOR_ADO = new PROVEEDOR_ADO();
$CLIENTE_ADO = new CLIENTE_ADO();

$OCOMPRA_ADO =  new OCOMPRA_ADO();
$RECEPCIONM_ADO =  new RECEPCIONM_ADO();
$DESPACHOM_ADO =  new DESPACHOM_ADO();
$INVENTARIOM_ADO =  new INVENTARIOM_ADO();


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
$ARRAYINVENTARIO = "";
$ARRAYINVENTARIOTOTALES = "";


$ARRAYVERBODEGA = "";
$ARRAYVERTCONTENEDOR = "";
$ARRAYVERTUMEDIDA = "";
$ARRAYVERPRODUCTO = "";
$ARRAYDRECEPCION = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
if ($EMPRESAS  && $PLANTAS && $TEMPORADAS) {
    $ARRAYINVENTARIO = $INVENTARIOM_ADO->listarInventarioPorEmpresaPlantaTemporadaCBX($EMPRESAS, $PLANTAS, $TEMPORADAS);
}
include_once "../../assest/config/validarDatosUrl.php";
include_once "../../assest/config/datosUrl.php";


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
                            <h3 class="page-title">Materiales</h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                        <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                        <li class="breadcrumb-item" aria-current="page">Materiales</li>
                                        <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Historial Materiales </a> </li>
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
                                        <table id="hexistencia" class="table-hover " style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>N° Folio </th>
                                                    <th>Estado </th>
                                                    <th>Codigo Producto </th>
                                                    <th>Producto </th>
                                                    <th>Cantidad</th>
                                                    <th>Unidad Medida</th>
                                                    <th>Tipo Contenedor</th>
                                                    <th>Bodega</th>
                                                    <th>Número Recepción </th>
                                                    <th>Fecha Recepción </th>
                                                    <th>Tipo Recepción</th>
                                                    <th>CSG/CSP Recepción</th>
                                                    <th>Origen Recepción</th>
                                                    <th>Número Documento </th>
                                                    <th>Tipo Documento </th>
                                                    <th>Valor Unitario</th>                                                    
                                                    <th>Número Despaho </th>
                                                    <th>Fecha Despaho </th>
                                                    <th>Tipo Despaho</th>
                                                    <th>CSG/CSP Despaho</th>
                                                    <th>Origen Despaho</th>
                                                    <th>Número Documento </th>
                                                    <th>Tipo Documento </th>
                                                    <th>Numero Oc</th>
                                                    <th>Numero Oc Interno</th>
                                                    <th>Empresa</th>
                                                    <th>Planta</th>
                                                    <th>Temporada</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($ARRAYINVENTARIO as $r) : ?>
                                                    <?php
                                                    if ($r['ESTADO'] == "0") {
                                                        $ESTADO = "Eliminado";
                                                    } else if ($r['ESTADO'] == "1") {
                                                        $ESTADO = "Ingresando";
                                                    } else if ($r['ESTADO'] == "2") {
                                                        $ESTADO = "Disponible";
                                                    } else if ($r['ESTADO'] == "3") {
                                                        $ESTADO = "En Despacho";
                                                    } else if ($r['ESTADO'] == "4") {
                                                        $ESTADO = "Despachado";
                                                    } else if ($r['ESTADO'] == "5") {
                                                        $ESTADO = "En Transito";
                                                    } else {
                                                        $$ESTADO = "Sin Datos";
                                                    }
                                                    $ARRAYVERBODEGA = $BODEGA_ADO->verBodega($r['ID_BODEGA']);
                                                    if ($ARRAYVERBODEGA) {
                                                        $NOMBREBODEGA = $ARRAYVERBODEGA[0]['NOMBRE_BODEGA'];
                                                    } else {
                                                        $NOMBREBODEGA = "Sin Datos";
                                                    }
                                                    $ARRAYVERPRODUCTO = $PRODUCTO_ADO->verProducto($r['ID_PRODUCTO']);
                                                    if ($ARRAYVERPRODUCTO) {
                                                        $CODIGOPRODUCTO = $ARRAYVERPRODUCTO[0]['CODIGO_PRODUCTO'];
                                                        $NOMBREPRODUCTO = $ARRAYVERPRODUCTO[0]['NOMBRE_PRODUCTO'];
                                                    } else {
                                                        $CODIGOPRODUCTO = "Sin Datos";
                                                        $NOMBREPRODUCTO = "Sin Datos";
                                                    }
                                                    $ARRAYTVERCONTENEDOR = $TCONTENEDOR_ADO->verTcontenedor($r['ID_TCONTENEDOR']);
                                                    if ($ARRAYTVERCONTENEDOR) {
                                                        $NOMBRETCONTENEDOR = $ARRAYTVERCONTENEDOR[0]['NOMBRE_TCONTENEDOR'];
                                                    } else {
                                                        $NOMBRETCONTENEDOR = "Sin Datos";
                                                    }
                                                    $ARRAYVERTUMEDIDA = $TUMEDIDA_ADO->verTumedida($r['ID_TUMEDIDA']);
                                                    if ($ARRAYVERTUMEDIDA) {
                                                        $NOMBRETUMEDIDA = $ARRAYVERTUMEDIDA[0]['NOMBRE_TUMEDIDA'];
                                                    } else {
                                                        $NOMBRETUMEDIDA = "Sin Datos";
                                                    }
                                                    $ARRAYRECEPCIONM = $RECEPCIONM_ADO->verRecepcion2($r["ID_RECEPCION"]);
                                                    if ($ARRAYRECEPCIONM) {
                                                        $NUMERORECEPCION = $ARRAYRECEPCIONM[0]["NUMERO_RECEPCION"];
                                                        $FECHARECEPCION = $ARRAYRECEPCIONM[0]["FECHA"];
                                                        $NUMERODOCUMENTORECEPCION = $ARRAYRECEPCIONM[0]["NUMERO_DOCUMENTO_RECEPCION"];
                                                        $ARRAYVERTDOCUMENTO = $TDOCUMENTO_ADO->verTdocumento($ARRAYRECEPCIONM[0]["ID_TDOCUMENTO"]);
                                                        if ($ARRAYVERTDOCUMENTO) {
                                                            $NOMBRETDOCUMENTO = $ARRAYVERTDOCUMENTO[0]['NOMBRE_TDOCUMENTO'];
                                                        } else {
                                                            $NOMBRETDOCUMENTO = "Sin Datos";
                                                        }
                                                        $ARRAYOCOMPRA = $OCOMPRA_ADO->verOcompra2($ARRAYRECEPCIONM[0]['ID_OCOMPRA']);
                                                        if ($ARRAYOCOMPRA) {
                                                            $NUMEROOCOMPRA = $ARRAYOCOMPRA[0]['NUMERO_OCOMPRA'];
                                                            $NUMEROIOCOMPRA = $ARRAYOCOMPRA[0]['NUMEROI_OCOMPRA'];
                                                        } else {
                                                            $NUMEROOCOMPRA = "Sin Datos";
                                                            $NUMEROIOCOMPRA = "Sin Datos";
                                                        }
                                                        if ($ARRAYRECEPCIONM[0]['TRECEPCION'] == "1") {
                                                            $TRECEPCION = "Desde Proveedor";
                                                            $ARRAYPROVEEDOR = $PROVEEDOR_ADO->verProveedor($ARRAYRECEPCIONM[0]["ID_PROVEEDOR"]);
                                                            if ($ARRAYPROVEEDOR) {
                                                                $NOMBREORIGEN = $ARRAYPROVEEDOR[0]["NOMBRE_PROVEEDOR"];
                                                                $CSGCSPORIGEN="No Aplica";
                                                            } else {
                                                                $NOMBREORIGEN = "Sin Datos";
                                                                $CSGCSPORIGEN = "Sin Datos";
                                                            }
                                                        } else if ($ARRAYRECEPCIONM[0]['TRECEPCION'] == "2") {
                                                            $TRECEPCION = "Desde Productor";
                                                            $ARRAYPRODUCTOR = $PRODUCTOR_ADO->verProductor($ARRAYRECEPCIONM[0]["ID_PRODUCTOR"]);
                                                            if ($ARRAYPRODUCTOR) {
                                                                $CSGCSPORIGEN=$ARRAYPRODUCTOR[0]['CSG_PRODUCTOR'] ;
                                                                $NOMBREORIGEN = $ARRAYPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
                                                            } else {
                                                                $NOMBREORIGEN = "Sin Datos";
                                                                $CSGCSPORIGEN = "Sin Datos";
                                                            }
                                                        } else if ($ARRAYRECEPCIONM[0]['TRECEPCION'] == "3") {
                                                            $TRECEPCION = "Planta Externa";
                                                            $ARRAYPLANTAEXTERNA = $PLANTA_ADO->verPlanta($ARRAYRECEPCIONM[0]["ID_PLANTA2"]);
                                                            if ($ARRAYPLANTAEXTERNA) {
                                                                $NOMBREORIGEN = $ARRAYPLANTAEXTERNA[0]["NOMBRE_PLANTA"];
                                                                $CSGCSPORIGEN=$ARRAYPLANTAEXTERNA[0]['CODIGO_SAG_PLANTA'];
                                                            } else {
                                                                $NOMBREORIGEN = "Sin Datos";
                                                                $CSGCSPORIGEN = "Sin Datos";
                                                            }
                                                        } else if ($ARRAYRECEPCIONM[0]['TRECEPCION'] == "4") {
                                                            $TRECEPCION = "Inventario Inicial";
                                                            $ARRAYPROVEEDOR = $PROVEEDOR_ADO->verProveedor($ARRAYRECEPCIONM[0]["ID_PROVEEDOR"]);
                                                            if ($ARRAYPROVEEDOR) {
                                                                $NOMBREORIGEN = $ARRAYPROVEEDOR[0]["NOMBRE_PROVEEDOR"];
                                                                $CSGCSPORIGEN="No Aplica";
                                                            } else {
                                                                $NOMBREORIGEN = "Sin Datos";
                                                                $CSGCSPORIGEN = "Sin Datos";
                                                            }
                                                        } else {
                                                            $TRECEPCION = "Sin Datos";
                                                            $NOMBREORIGEN = "Sin Datos";
                                                            $CSGCSPORIGEN = "Sin Datos";
                                                        }
                                                    } else {
                                                        $TRECEPCION = "Sin Datos";
                                                        $NOMBREORIGEN = "Sin Datos";
                                                        $NOMBRETDOCUMENTO = "Sin Datos";
                                                        $NUMERORECEPCION = "Sin Datos";
                                                        $FECHARECEPCION = "";
                                                        $NUMERODOCUMENTORECEPCION = "Sin Datos";
                                                        $NUMEROOCOMPRA = "Sin Datos";
                                                        $NUMEROIOCOMPRA = "Sin Datos";
                                                        $CSGCSPORIGEN = "Sin Datos";
                                                    }
                                                    $ARRAYDESPACHO=$DESPACHOM_ADO->verDespachom2($r['ID_DESPACHO']);
                                                    if($ARRAYDESPACHO){

                                                        $NUMERODESPACHO = $ARRAYDESPACHO[0]["NUMERO_DESPACHO"];
                                                        $FECHADESPACHO = $ARRAYDESPACHO[0]["FECHA"];
                                                        $NUMERODOCUMENTODESPACHO = $ARRAYDESPACHO[0]["NUMERO_DOCUMENTO"];

                                                        $ARRAYVERTDOCUMENTO2 = $TDOCUMENTO_ADO->verTdocumento($ARRAYDESPACHO[0]["ID_TDOCUMENTO"]);
                                                        if ($ARRAYVERTDOCUMENTO2) {
                                                            $NOMBRETDOCUMENTO2 = $ARRAYVERTDOCUMENTO2[0]['NOMBRE_TDOCUMENTO'];
                                                        } else {
                                                            $NOMBRETDOCUMENTO2 = "Sin Datos";
                                                        }

                                                        if ($ARRAYDESPACHO[0]['TDESPACHO'] == "1") {
                                                            $TDESPACHO = " A Sub Bodega";
                                                            $ARRAYVERBODEGA = $BODEGA_ADO->verBodega($ARRAYDESPACHO[0]["ID_BODEGA"]);
                                                            if ($ARRAYVERBODEGA) {
                                                                $NOMBRDESTINO = $ARRAYVERBODEGA[0]["NOMBRE_BODEGA"];
                                                                $CSGCSPDESTINO="No Aplica";
                                                            } else {
                                                                $NOMBRDESTINO = "Sin Datos";
                                                                $CSGCSPDESTINO="Sin Datos";
                                                            }
                                                        } else
                                                        if ($ARRAYDESPACHO[0]['TDESPACHO'] == "2") {
                                                            $TDESPACHO = "Interplanta";
                                                            $ARRAYPLANTAINTERNA = $PLANTA_ADO->verPlanta($ARRAYDESPACHO[0]["ID_PLANTA2"]);
                                                            $ARRAYVERBODEGA = $BODEGA_ADO->verBodega($ARRAYDESPACHO[0]["ID_BODEGA2"]);
                                                            if ($ARRAYVERBODEGA && $ARRAYPLANTAINTERNA) {
                                                                $CSGCSPDESTINO=$ARRAYPLANTAINTERNA[0]['CODIGO_SAG_PLANTA'];
                                                                $NOMBRDESTINO = "" . $ARRAYPLANTAINTERNA[0]["NOMBRE_PLANTA"] . " - " . $ARRAYVERBODEGA[0]["NOMBRE_BODEGA"];
                                                            } else {
                                                                $NOMBRDESTINO = "Sin Datos";
                                                                $CSGCSPDESTINO="Sin Datos";
                                                            }
                                                        } else
                                                        if ($ARRAYDESPACHO[0]['TDESPACHO'] == "3") {
                                                            $TDESPACHO = "Despacho a Productor";
                                                            $ARRAYPRODUCTOR = $PRODUCTOR_ADO->verProductor($ARRAYDESPACHO[0]["ID_PRODUCTOR"]);
                                                            if ($ARRAYPRODUCTOR) {
                                                                $CSGCSPDESTINO=$ARRAYPRODUCTOR[0]["CSG_PRODUCTOR"];
                                                                $NOMBRDESTINO = $ARRAYPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
                                                            } else {
                                                                $NOMBRDESTINO = "Sin Datos";
                                                                $CSGCSPDESTINO="Sin Datos";
                                                            }
                                                        } else
                                                        if ($ARRAYDESPACHO[0]['TDESPACHO'] == "4") {
                                                            $TDESPACHO = "Devolución a Proveedor";
                                                            $ARRAYPROVEEDOR = $PROVEEDOR_ADO->verProveedor($ARRAYDESPACHO[0]["ID_PROVEEDOR"]);
                                                            if ($ARRAYPROVEEDOR) {
                                                                $CSGCSPDESTINO=$ARRAYPRODUCTOR[0]["CSG_PRODUCTOR"];
                                                                $NOMBRDESTINO = $ARRAYPROVEEDOR[0]["NOMBRE_PROVEEDOR"];
                                                            } else {
                                                                $NOMBRDESTINO = "Sin Datos";
                                                                $CSGCSPDESTINO="Sin Datos";
                                                            }
                                                        } else
                                                        if ($ARRAYDESPACHO[0]['TDESPACHO'] == "5") {
                                                            $TDESPACHO = "Planta Externa";
                                                            $ARRAYPLANTAEXTERNA = $PLANTA_ADO->verPlanta($ARRAYDESPACHO[0]["ID_PLANTA3"]);
                                                            if ($ARRAYPLANTAEXTERNA) {
                                                                $CSGCSPDESTINO=$ARRAYPLANTAEXTERNA[0]['CODIGO_SAG_PLANTA'];
                                                                $NOMBRDESTINO = $ARRAYPLANTAEXTERNA[0]["NOMBRE_PLANTA"];
                                                            } else {
                                                                $NOMBRDESTINO = "Sin Datos";
                                                                $CSGCSPDESTINO="Sin Datos";
                                                            }
                                                        } else
                                                        if ($ARRAYDESPACHO[0]['TDESPACHO'] == "6") {
                                                            $TDESPACHO = "Venta";
                                                            $ARRAYVERCLIENTE = $CLIENTE_ADO->verCliente($ARRAYDESPACHO[0]["ID_CLIENTE"]);
                                                            if ($ARRAYVERCLIENTE) {
                                                                $CSGCSPDESTINO="No Aplica";
                                                                $NOMBRDESTINO = $ARRAYVERCLIENTE[0]["NOMBRE_CLIENTE"];
                                                            } else {
                                                                $NOMBRDESTINO = "Sin Datos";
                                                                $CSGCSPDESTINO="Sin Datos";
                                                            }
                                                        } else
                                                        if ($ARRAYDESPACHO[0]['TDESPACHO'] == "7") {
                                                            $TDESPACHO = "Regalo";
                                                            $CSGCSPDESTINO="No Aplica";
                                                            $REGALO = $ARRAYDESPACHO[0]['REGALO_DESPACHO'];
                                                        } else {
                                                            $CSGCSPDESTINO="Sin Datos";
                                                            $TDESPACHO = "Sin Datos";
                                                            $NOMBRDESTINO = "Sin Datos";
                                                        }

                                                    }else{
                                                        $NUMERODESPACHO="Sin Datos";
                                                        $NOMBRETDOCUMENTO2="Sin Datos";
                                                        $NUMERODOCUMENTODESPACHO="Sin Datos";
                                                        $FECHADESPACHO="";
                                                        $CSGCSPDESTINO="Sin Datos";
                                                        $CSGCSPDESTINO="Sin Datos";
                                                        $TDESPACHO = "Sin Datos";
                                                        $NOMBRDESTINO = "Sin Datos";
                                                    }
                                                    $ARRAYVEREMPRESA = $EMPRESA_ADO->verEmpresa($r['ID_EMPRESA']);
                                                    if ($ARRAYVEREMPRESA) {
                                                        $NOMBREEMPRESA = $ARRAYVEREMPRESA[0]['NOMBRE_EMPRESA'];
                                                    } else {
                                                        $NOMBREEMPRESA = "Sin Datos";
                                                    }
                                                    $ARRAYVERPLANTA = $PLANTA_ADO->verPlanta($r['ID_PLANTA']);
                                                    if ($ARRAYVERPLANTA) {
                                                        $NOMBREPLANTA = $ARRAYVERPLANTA[0]['NOMBRE_PLANTA'];
                                                    } else {
                                                        $NOMBREPLANTA = "Sin Datos";
                                                    }
                                                    $ARRAYVERTEMPORADA = $TEMPORADA_ADO->verTemporada($r['ID_TEMPORADA']);
                                                    if ($ARRAYVERTEMPORADA) {
                                                        $NOMBRETEMPORADA = $ARRAYVERTEMPORADA[0]['NOMBRE_TEMPORADA'];
                                                    } else {
                                                        $NOMBRETEMPORADA = "Sin Datos";
                                                    }
                                                    ?>
                                                    <tr class="center">
                                                        <td> <?php echo $r['FOLIO_INVENTARIO']; ?> </td>
                                                        <td><?php echo $ESTADO; ?></td>
                                                        <td><?php echo $CODIGOPRODUCTO; ?></td>
                                                        <td><?php echo $NOMBREPRODUCTO; ?></td>
                                                        <td><?php echo $r['CANTIDAD']; ?></td>
                                                        <td><?php echo $NOMBRETUMEDIDA; ?></td>
                                                        <td><?php echo $NOMBRETCONTENEDOR; ?></td>
                                                        <td><?php echo $NOMBREBODEGA; ?></td>
                                                        <td><?php echo $NUMERORECEPCION; ?></td>
                                                        <td><?php echo $FECHARECEPCION; ?></td>
                                                        <td><?php echo $TRECEPCION; ?></td>
                                                        <td><?php echo $CSGCSPORIGEN; ?></td>
                                                        <td><?php echo $NOMBREORIGEN; ?></td>
                                                        <td><?php echo $NUMERODOCUMENTORECEPCION; ?></td>
                                                        <td><?php echo $NOMBRETDOCUMENTO; ?></td>
                                                        <td><?php echo $r['VALOR']; ?></td>
                                                        <td><?php echo $NUMERODESPACHO; ?></td>
                                                        <td><?php echo $FECHADESPACHO; ?></td>
                                                        <td><?php echo $TDESPACHO; ?></td>
                                                        <td><?php echo $CSGCSPDESTINO; ?></td>
                                                        <td><?php echo $NOMBRDESTINO; ?></td>
                                                        <td><?php echo $NUMERODOCUMENTODESPACHO; ?></td>
                                                        <td><?php echo $NOMBRETDOCUMENTO2; ?></td>
                                                        <td><?php echo $NUMEROOCOMPRA; ?></td>
                                                        <td><?php echo $NUMEROIOCOMPRA; ?></td>
                                                        <td><?php echo $NOMBREEMPRESA; ?></td>
                                                        <td><?php echo $NOMBREPLANTA; ?></td>
                                                        <td><?php echo $NOMBRETEMPORADA; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>                                            
                                            <tfoot>
                                                <tr class="text-center" id="filtro">
                                                    <th>N° Folio </th>
                                                    <th>Estado </th>
                                                    <th>Codigo Producto </th>
                                                    <th>Producto </th>
                                                    <th>Cantidad</th>
                                                    <th>Unidad Medida</th>
                                                    <th>Tipo Contenedor</th>
                                                    <th>Bodega</th>
                                                    <th>Número Recepción </th>
                                                    <th>Fecha Recepción </th>
                                                    <th>Tipo Recepción</th>
                                                    <th>CSG/CSP Recepción</th>
                                                    <th>Origen Recepción</th>
                                                    <th>Número Documento </th>
                                                    <th>Tipo Documento </th>
                                                    <th>Valor Unitario</th>                                                    
                                                    <th>Número Despaho </th>
                                                    <th>Fecha Despaho </th>
                                                    <th>Tipo Despaho</th>
                                                    <th>CSG/CSP Despaho</th>
                                                    <th>Origen Despaho</th>
                                                    <th>Número Documento </th>
                                                    <th>Tipo Documento </th>
                                                    <th>Numero Oc</th>
                                                    <th>Numero Oc Interno</th>
                                                    <th>Empresa</th>
                                                    <th>Planta</th>
                                                    <th>Temporada</th>
                                                </tr>
                                            </tfoot>
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
        <?php include_once "../../assest/config/menuExtraMaterial.php"; ?>
    </div>
    <?php include_once "../../assest/config/urlBase.php"; ?>
</body>
</html>