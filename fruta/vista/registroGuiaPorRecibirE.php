<?php

include_once "../../assest/config/validarUsuarioFruta.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES


include_once '../../assest/controlador/TRANSPORTE_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/CONDUCTOR_ADO.php';
include_once '../../assest/controlador/BODEGA_ADO.php';
include_once '../../assest/controlador/TDOCUMENTO_ADO.php';
 

include_once '../../assest/controlador/INVENTARIOE_ADO.php';
include_once '../../assest/controlador/DESPACHOE_ADO.php';
include_once '../../assest/controlador/DESPACHOMP_ADO.php';
include_once '../../assest/controlador/MGUIAE_ADO.php';


include_once '../../assest/modelo/INVENTARIOE.php';
include_once '../../assest/modelo/DESPACHOE.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$TRANSPORTE_ADO =  new TRANSPORTE_ADO();
$CONDUCTOR_ADO =  new CONDUCTOR_ADO();
$PRODUCTOR_ADO = new PRODUCTOR_ADO();
$BODEGA_ADO = new BODEGA_ADO();
$TDOCUMENTO_ADO = new TDOCUMENTO_ADO();



$INVENTARIOE_ADO =  new INVENTARIOE_ADO();
$DESPACHOE_ADO =  new DESPACHOE_ADO();
$DESPACHOMP_ADO =  new DESPACHOMP_ADO();
$MGUIAE_ADO =  new MGUIAE_ADO();

$INVENTARIOE =  new INVENTARIOE();
$DESPACHOE =  new DESPACHOE();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD


$TOTALBRUTO = "";
$TOTALNETO = "";
$TOTALENVASE = "";
$FECHADESDE = "";
$FECHAHASTA = "";

$PRODUCTOR = "";
$NUMEROGUIA = "";

//INICIALIZAR ARREGLOS
$ARRAYVERDESPACHOE = "";
$ARRAYDESPACHOPT = "";
$ARRAYDESPACHOPTTOTALES = "";
$ARRAYVEREMPRESA = "";
$ARRAYVERPRODUCTOR = "";
$ARRAYVERTRANSPORTE = "";
$ARRAYVERCONDUCTOR = "";
$ARRAYMGUIAMP = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES



if ($EMPRESAS  && $PLANTAS && $TEMPORADAS) {

    $ARRAYDESPACHOPT = $DESPACHOE_ADO->listarDespachoeEmpresaPlantaTemporadaGuiaCBX($EMPRESAS, $PLANTAS, $TEMPORADAS);
}


include_once "../../assest/config/validarDatosUrl.php";
include_once "../../assest/config/datosUrLP.php";


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Guia Por Recibir Envases </title>
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
        <?php include_once "../../assest/config/menuFruta.php";
        ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-full">

                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            <h3 class="page-title">Envases </h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                        <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                        <li class="breadcrumb-item" aria-current="page">Envases</li>
                                        <li class="breadcrumb-item" aria-current="page">Guía Por Recibir</li>
                                        <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Envases </a>
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
                                        <table id="despachome" class="table-hover " style="width: 100%;">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Número </th>
                                                    <th>Estado</th>
                                                    <th class="text-center">Operaciónes</th>
                                                    <th>Estado Despacho</th>
                                                    <th>Fecha Despacho </th>
                                                    <th>Número Documento </th>
                                                    <th>Tipo Despacho</th>
                                                    <th>CSG/CSP Despacho</th>
                                                    <th>Destino Despacho</th>
                                                    <th>Tipo Documento </th>
                                                    <th>Cantidad </th>
                                                    <th>Transporte </th>
                                                    <th>Nombre Conductor </th>
                                                    <th>Patente Camión </th>
                                                    <th>Patente Carro </th>
                                                    <th>Despacho Materia Prima </th>
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
                                                    }else if ($r['TDESPACHO'] == "2") {
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
                                                    }else if ($r['TDESPACHO'] == "3") {
                                                        $TDESPACHO = "Devolución a Productor";
                                                        $ARRAYPRODUCTOR = $PRODUCTOR_ADO->verProductor($r["ID_PRODUCTOR"]);
                                                        if ($ARRAYPRODUCTOR) {
                                                            $CSGCSPDESTINO=$ARRAYPRODUCTOR[0]["CSG_PRODUCTOR"];
                                                            $NOMBRDESTINO = $ARRAYPRODUCTOR[0]["NOMBRE_PRODUCTOR"]; 
                                                        } else {
                                                            $NOMBRDESTINO = "Sin Datos";
                                                            $CSGCSPDESTINO="Sin Datos";
                                                        }
                                                    }else if ($r['TDESPACHO'] == "4") {
                                                        $TDESPACHO = "Devolución a Proveedor";
                                                        $ARRAYPROVEEDOR = $PROVEEDOR_ADO->verProveedor($r["ID_PROVEEDOR"]);
                                                        if ($ARRAYPROVEEDOR) {
                                                            $NOMBRDESTINO = $ARRAYPROVEEDOR[0]["NOMBRE_PROVEEDOR"];
                                                            $CSGCSPDESTINO="No Aplica";
                                                        } else {
                                                            $NOMBRDESTINO = "Sin Datos";
                                                            $CSGCSPDESTINO="Sin Datos";
                                                        }
                                                    }else if ($r['TDESPACHO'] == "5") {
                                                        $TDESPACHO = "Venta Industrial";
                                                        $ARRAYVERCOMPRADOR = $COMPRADOR_ADO->verComprador($r["ID_COMPRADOR"]);
                                                        if ($ARRAYVERCOMPRADOR) {
                                                            $NOMBRDESTINO = $ARRAYVERCOMPRADOR[0]["NOMBRE_COMPRADOR"];
                                                            $CSGCSPDESTINO="No Aplica";
                                                        } else {
                                                            $NOMBRDESTINO = "Sin Datos";
                                                            $CSGCSPDESTINO="Sin Datos";
                                                        }
                                                    }else if ($r['TDESPACHO'] == "6") {
                                                        $TDESPACHO = "Regalo";
                                                        $CSGCSPDESTINO="No Aplica";
                                                        $NOMBRDESTINO="No Aplica";
                                                        $REGALO = $r['REGALO_DESPACHO'];
                                                    }else if ($r['TDESPACHO'] == "7") {
                                                        $TDESPACHO = "Planta Externa";
                                                        $ARRAYPLANTAEXTERNA = $PLANTA_ADO->verPlanta($r["ID_PLANTA3"]);
                                                        if ($ARRAYPLANTAEXTERNA) {
                                                            $NOMBRDESTINO = $ARRAYPLANTAEXTERNA[0]["NOMBRE_PLANTA"];
                                                            $CSGCSPDESTINO=$ARRAYPLANTAEXTERNA[0]['CODIGO_SAG_PLANTA'];
                                                        } else {
                                                            $NOMBRDESTINO = "Sin Datos";
                                                            $CSGCSPDESTINO="Sin Datos";
                                                        }
                                                    }else if ($r['TDESPACHO'] == "8") {
                                                        $TDESPACHO = "Despacho a Productor";
                                                        $ARRAYPRODUCTOR = $PRODUCTOR_ADO->verProductor($r["ID_PRODUCTOR"]);
                                                        if ($ARRAYPRODUCTOR) {
                                                            $NOMBRDESTINO =  $ARRAYPRODUCTOR[0]["NOMBRE_PRODUCTOR"]; 
                                                            $CSGCSPDESTINO=$ARRAYPRODUCTOR[0]["CSG_PRODUCTOR"];
                                                        } else {
                                                            $NOMBRDESTINO = "Sin Datos";
                                                            $CSGCSPDESTINO="Sin Datos";
                                                        }
                                                    }else {
                                                        $TDESPACHO = "Sin Datos";
                                                        $NOMBRDESTINO = "Sin Datos";
                                                        $CSGCSPDESTINO="Sin Datos";
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

                                                    $ARRAYDESPACHOMP=$DESPACHOMP_ADO->verDespachomp($r['ID_DESPACHOMP']);
                                                    if($ARRAYDESPACHOMP){
                                                        $NUMERODESPACHOMP=$ARRAYDESPACHOMP[0]["NUMERO_DESPACHO"];
                                                    }else{
                                                        $NUMERODESPACHOMP="No Aplica";
                                                    }
                                                    $ARRAYMGUIAM = $MGUIAE_ADO->listarMguiaDespachoCBX($r['ID_DESPACHO']);
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
                                                                            <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroDespachoe" />
                                                                            <input type="hidden" class="form-control" placeholder="URL" id="URLO" name="URLO" value="registroGuiaPorRecibirE" />
                                                                            <input type="hidden" class="form-control" placeholder="URL" id="URLM" name="URLM" value="registroGuiaPorRecibirME" />
                                                                            <span href="#" class="dropdown-item" data-toggle="tooltip" title="Informe">
                                                                                <button type="button" class="btn  btn-danger  btn-block" id="defecto" name="informe" title="Informe" Onclick="abrirPestana('../../assest/documento/informeDespachoE.php?parametro=<?php echo $r['ID_DESPACHO']; ?>&&usuario=<?php echo $IDUSUARIOS; ?>'); ">
                                                                                    <i class="fa fa-file-pdf-o"></i> Informe
                                                                                </button>
                                                                            </span>
                                                                            <?php if ($r['ESTADO_DESPACHO'] == "2") { ?>
                                                                                <hr>
                                                                                <span href="#" class="dropdown-item" title="Operaciones">
                                                                                    <button type="submit" class="btn btn-success " data-toggle="tooltip" id="APROBARURL" name="APROBARURL" title="Aprobar">
                                                                                        <i class="fa fa-check"></i> Aprobar
                                                                                    </button>
                                                                                    <button type="submit" class="btn btn-danger " data-toggle="tooltip" id="RECHAZARURL" name="RECHAZARURL" title="Rechazar">
                                                                                        <i class="fa fa-close"></i> Rechazar
                                                                                    </button>
                                                                                </span>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </td>
                                                        <td><?php echo $ESTADODESPACHO; ?></td>
                                                        <td><?php echo $r['FECHA']; ?></td>
                                                        <td><?php echo $r['NUMERO_DOCUMENTO']; ?></td>
                                                        <td><?php echo $TDESPACHO; ?></td>
                                                        <td><?php echo $CSGCSPDESTINO; ?></td>
                                                        <td><?php echo $NOMBRDESTINO; ?></td>
                                                        <td><?php echo $TDOCUMENTO; ?></td>
                                                        <td><?php echo $r['CANTIDAD']; ?></td>
                                                        <td><?php echo $NOMBRETRANSPORTE; ?></td>
                                                        <td><?php echo $NOMBRECONDUCTOR; ?></td>
                                                        <td><?php echo $r['PATENTE_CAMION']; ?></td>
                                                        <td><?php echo $r['PATENTE_CARRO']; ?></td>
                                                        <td><?php echo $NUMERODESPACHOMP; ?></td>
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
        <?php include_once "../../assest/config/menuExtraFruta.php"; ?>
    </div>
    <?php include_once "../../assest/config/urlBase.php"; ?>
    <?php 
    

        if (isset($_REQUEST['APROBARURL'])) {

            $DESPACHOE->__SET('ID_DESPACHO', $_REQUEST['ID']);
            //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
            $DESPACHOE_ADO->cerrado($DESPACHOE);

            $DESPACHOE->__SET('ID_DESPACHO', $_REQUEST['ID']);
            //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
            $DESPACHOE_ADO->Aprobado($DESPACHOE);

            $AUSUARIO_ADO->agregarAusuario2("NULL",1,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de Despacho Envases, se aprobo la guia.","material_despachoe", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

            $ARRAYVERDESPACHOE=$DESPACHOE_ADO->verDespachoe($_REQUEST['ID']);

            $ARRAYEXISENCIADESPACHOEP = $INVENTARIOE_ADO->buscarPorDespacho($_REQUEST['ID']);
            foreach ($ARRAYEXISENCIADESPACHOEP as $r) :
                $INVENTARIOE->__SET('CANTIDAD_ENTRADA', $r['CANTIDAD']);
                $INVENTARIOE->__SET('CANTIDAD_SALIDA', 0);
                $INVENTARIOE->__SET('VALOR_UNITARIO', $r['VALOR_UNITARIO']);
                $INVENTARIOE->__SET('ID_BODEGA',  $ARRAYVERDESPACHOE[0]['ID_BODEGA2']);
                $INVENTARIOE->__SET('ID_PRODUCTO', $r['ID_PRODUCTO']);
                $INVENTARIOE->__SET('ID_TUMEDIDA', $r['ID_TUMEDIDA']);
                $INVENTARIOE->__SET('ID_PLANTA2', $r['ID_PLANTA']);
                $INVENTARIOE->__SET('ID_DESPACHO2',$ARRAYVERDESPACHOE[0]['ID_DESPACHO']);
                $INVENTARIOE->__SET('ID_EMPRESA', $EMPRESAS);
                $INVENTARIOE->__SET('ID_PLANTA', $PLANTAS);
                $INVENTARIOE->__SET('ID_TEMPORADA', $TEMPORADAS);
                $INVENTARIOE_ADO->agregarInventarioGuia($INVENTARIOE);

                $AUSUARIO_ADO->agregarAusuario2("NULL",1,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Inventario de envases, por una aprobación de una guia interplanta.","material_inventarioe", "NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  
                
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
                    location.href = "registroGuiaPorRecibirE.php";                            
                })
            </script>';
        }
        if (isset($_REQUEST['RECHAZARURL'])) {
            $_SESSION["parametro"] = $_REQUEST['ID'];
            $_SESSION["parametro1"] = "";
            $_SESSION["urlO"] = $_REQUEST['URLO'];
            echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLM'] . ".php?op';</script>";
        }

    
    ?>
</body>

</html>