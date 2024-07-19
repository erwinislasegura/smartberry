<?php
include_once "../../assest/config/validarUsuarioFruta.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../../assest/controlador/PRODUCTO_ADO.php';
include_once '../../assest/controlador/TUMEDIDA_ADO.php';
include_once '../../assest/controlador/FOLIO_ADO.php';


include_once '../../assest/controlador/OCOMPRA_ADO.php';
include_once '../../assest/controlador/DOCOMPRA_ADO.php';
include_once '../../assest/controlador/RECEPCIONE_ADO.php';
include_once '../../assest/controlador/INVENTARIOE_ADO.php';


include_once '../../assest/modelo/DOCOMPRA.php';
include_once '../../assest/modelo/INVENTARIOE.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$PRODUCTO_ADO =  new PRODUCTO_ADO();
$TUMEDIDA_ADO =  new TUMEDIDA_ADO();
$FOLIO_ADO =  new FOLIO_ADO();

$OCOMPRA_ADO =  new OCOMPRA_ADO();
$DOCOMPRA_ADO =  new DOCOMPRA_ADO();
$RECEPCIONE_ADO =  new RECEPCIONE_ADO();
$INVENTARIOE_ADO =  new INVENTARIOE_ADO();


//INIICIALIZAR MODELO
$DOCOMPRA =  new DOCOMPRA();
$INVENTARIOE =  new INVENTARIOE();

//INCIALIZAR VARIABLES

$VALORTOTAL = 0;



$CONTADOR = 0;

$SINO = "";
$DISABLED = "";
$DISABLED2 = "";

$IDOP = "";
$OP = "";

$IDP = "";
$OPP = "";
$URLP = "";

$SINO = "";
$MENSAJE = "";


//INICIALIZAR ARREGLOS
$SELECIONARDOCOMPRA = "";
$ARRAYRECEPCION = "";
$ARRAYDRECEPCION = "";
$ARRAYOCOMPRA = "";
$ARRAYDOCOMPRA = "";



//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
//include_once "../../assest/config/validarDatosUrlD.php";



//OBTENCION DE DATOS ENVIADOR A LA URL
if (isset($_SESSION['parametro']) && isset($_SESSION['parametro1']) && isset($_SESSION['urlO'])) {
    $IDP = $_SESSION['parametro'];
    $OPP = $_SESSION['parametro1'];
    $URLP = $_SESSION['urlO'];

    $ARRAYRECEPCION = $RECEPCIONE_ADO->verRecepcion($IDP);
    foreach ($ARRAYRECEPCION as $r) :
        $PRODUCTOR = $r["ID_PRODUCTOR"];
        $PROVEEDOR = $r["ID_PROVEEDOR"];
        $PLANTA2 = $r["ID_PLANTA2"];
        $BODEGA = $r["ID_BODEGA"];
        $TRECEPCION = $r["TRECEPCION"];
        $SELECIONARDOCOMPRA = $DOCOMPRA_ADO->listarDocompraPorOcompraCBX($r["ID_OCOMPRA"]);
    endforeach;
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Selección Detalle OC </title>
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
                //FUNCION PARA CERRAR VENTANA Y ACTUALIZAR PRINCIPAL
                function cerrar() {
                    window.opener.refrescar()
                    window.close();
                }
            </script>

</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary" >
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <?php include_once "../../assest/config/menuFruta.php";  ?>

            <div class="content-wrapper">
                <div class="container-full">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Envases</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Envases</li>
                                            <li class="breadcrumb-item" aria-current="page">Recepción</li>
                                            <li class="breadcrumb-item active" aria-current="page"> Selección Detalle OC </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <?php include_once "../../assest/config/verIndicadorEconomico.php"; ?>
                        </div>
                    </div>

                    <section class="content">
                        <div class="box">
                            <div class="box-header with-border bg-success">                                   
                                <h4 class="box-title">Seleccion Detalle OC</h4>                                        
                            </div>
                            <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato">
                                <div class="box-body ">         
                                    <label id="val_validato" class="validacion"> <?php echo $MENSAJE; ?> </label>
                                    <div class="row">
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">  
                                            <input type="hidden" class="form-control" placeholder="ID RECEPCIONM" id="IDP" name="IDP" value="<?php echo $IDP; ?>" />
                                            <input type="hidden" class="form-control" placeholder="OP RECEPCIONM" id="OPP" name="OPP" value="<?php echo $OPP; ?>" />
                                            <input type="hidden" class="form-control" placeholder="URL RECEPCIONM" id="URLP" name="URLP" value="<?php echo $URLP; ?>" />
                                            <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                            <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTA" name="PLANTA" value="<?php echo $PLANTAS; ?>" />
                                            <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADAS; ?>" />

                                            <input type="hidden" class="form-control" placeholder="ID PRODUCTOR" id="PRODUCTOR" name="PRODUCTOR" value="<?php echo $PRODUCTOR; ?>" />
                                            <input type="hidden" class="form-control" placeholder="ID PLANTA2" id="PLANTA2" name="PLANTA2" value="<?php echo $PLANTA2; ?>" />
                                            <input type="hidden" class="form-control" placeholder="ID BODEGA" id="BODEGA" name="BODEGA" value="<?php echo $BODEGA; ?>" />
                                            <input type="hidden" class="form-control" placeholder="ID PROVEEDOR" id="PROVEEDOR" name="PROVEEDOR" value="<?php echo $PROVEEDOR; ?>" />
                                            <input type="hidden" class="form-control" placeholder="ID TRECEPCION" id="TRECEPCION" name="TRECEPCION" value="<?php echo $TRECEPCION; ?>" />

                                            <div class="table-responsive">
                                                <table id="selecionExistencia" class="table-hover " style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>Número</th>
                                                            <th>Selección</th>
                                                            <th>Cantidad </th>
                                                            <th>Valor Unitario </th>
                                                            <th>Código Producto</th>
                                                            <th>Producto</th>
                                                            <th>Unidad Medida</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($SELECIONARDOCOMPRA as $r) : ?>
                                                            <?php
                                                            $ARRAYDRECEPCION = $INVENTARIOE_ADO->listarInventarioPorRecepcionDocompraCBX($IDP, $r['ID_DOCOMPRA']);
                                                            if ($ARRAYDRECEPCION) {
                                                                $SINO = "1";
                                                            } else {
                                                                $SINO = "0";
                                                            }
                                                            $ARRAYPRODUCTO = $PRODUCTO_ADO->verProducto($r['ID_PRODUCTO']);
                                                            if ($ARRAYPRODUCTO) {
                                                                $CODIGOPRODUCTO = $ARRAYPRODUCTO[0]['CODIGO_PRODUCTO'];
                                                                $NOMBREPRODUCTO = $ARRAYPRODUCTO[0]['NOMBRE_PRODUCTO'];
                                                            } else {
                                                                $CODIGOPRODUCTO = "Sin Dato";
                                                                $NOMBREPRODUCTO = "Sin Dato";
                                                            }
                                                            $ARRAYTUMEDIDA = $TUMEDIDA_ADO->verTumedida($r['ID_TUMEDIDA']);
                                                            if ($ARRAYTUMEDIDA) {
                                                                $NOMBRETUMEDIDA = $ARRAYTUMEDIDA[0]['NOMBRE_TUMEDIDA'];
                                                            } else {
                                                                $NOMBRETUMEDIDA = "Sin Dato";
                                                            }
                                                            ?>
                                                            <?php if ($SINO == "0") {  ?>
                                                                <?php $CONTADOR += 1;  ?>
                                                                <tr class="center">
                                                                    <td>
                                                                        <a href="#" class="text-warning hover-warning">
                                                                            <?php echo $CONTADOR;  ?>
                                                                        </a>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <div class="form-group">
                                                                            <input type="hidden" class="form-control" name="SELECIONARDOCOMPRAID[<?php echo $r['ID_DOCOMPRA']; ?>]" value="<?php echo  $r['ID_DOCOMPRA']; ?>">
                                                                            <input type="checkbox" name="SELECIONARDOCOMPRA[]" id="SELECIONARDOCOMPRA<?php echo $r['ID_DOCOMPRA']; ?>" value="<?php echo $r['ID_DOCOMPRA']; ?>">
                                                                            <label for="SELECIONARDOCOMPRA<?php echo $r['ID_DOCOMPRA']; ?>"> Seleccionar</label>
                                                                        </div>
                                                                    </td>
                                                                    <td><?php echo $r['CANTIDAD_DOCOMPRA']; ?></td>
                                                                    <td><?php echo $r['VALOR_UNITARIO_DOCOMPRA']; ?></td>
                                                                    <td><?php echo $CODIGOPRODUCTO; ?></td>
                                                                    <td><?php echo $NOMBREPRODUCTO; ?></td>
                                                                    <td><?php echo $NOMBRETUMEDIDA; ?></td>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row -->


                                    <!-- /.box-body -->                                    
                                    <div class="box-footer">
                                        <div class="btn-group btn-block  col-xxl-4 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12 " role="group" aria-label="Acciones generales">
                                            <button type="button"  class="btn  btn-success  " data-toggle="tooltip" title="Volver" name="CANCELAR" value="CANCELAR" Onclick="irPagina('<?php echo $URLP; ?>.php?op');">
                                                <i class="ti-back-left "></i> Volver
                                            </button>
                                            <button type="submit"  class="btn btn-primary " data-toggle="tooltip" title="Agregar"  name="AGREGAR" value="AGREGAR" <?php echo $DISABLED; ?>>
                                                <i class="ti-save-alt"></i> AGREGAR
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--.row -->
                    </section>

                </div>
            </div>



            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php include_once "../../assest/config/footer.php";
                ?>
                <?php include_once "../../assest/config/menuExtraFruta.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../../assest/config/urlBase.php"; ?>
        <?php 
             //OPERACIONES
            //OPERACION DE REGISTRO DE FILA

            if (isset($_REQUEST['AGREGAR'])) {

                $EMPRESA = $_REQUEST['EMPRESA'];
                $PLANTA = $_REQUEST['PLANTA'];
                $TEMPORADA = $_REQUEST['TEMPORADA'];
                $IDP = $_REQUEST['IDP'];

                if (isset($_REQUEST['SELECIONARDOCOMPRA'])) {
                    $SINO = "0";
                    $SELECIONARDOCOMPRA = $_REQUEST['SELECIONARDOCOMPRA'];
                    $SELECIONARDOCOMPRAID = $_REQUEST['SELECIONARDOCOMPRAID'];
                } else {
                    $SINO = "1";
                    $_SESSION["parametro"] =  $_REQUEST['IDP'];
                    $_SESSION["parametro1"] =  $_REQUEST['OPP'];
                    echo '<script>
                        Swal.fire({
                            icon:"warning",
                            title:"Accion restringida",
                            text:"Se debe selecionar al menos una registro.",
                            showConfirmButton: true,
                            confirmButtonText:"Cerrar",
                            closeOnConfirm:false
                        }).then((result)=>{
                            location.href = "registroSelecionarDocompraE.php?op";                            
                        })
                    </script>';
                }
                if ($SINO == "0") {

                    foreach ($SELECIONARDOCOMPRA as $r) :
                        $IDDOCOMPRA = $SELECIONARDOCOMPRAID[$r];
                        $ARRAYDOCOMPRA = $DOCOMPRA_ADO->verDocompra($IDDOCOMPRA);
                        foreach ($ARRAYDOCOMPRA as $s) :
                            $INVENTARIOE->__SET('TRECEPCION',  $_REQUEST['TRECEPCION']);
                            $INVENTARIOE->__SET('VALOR_UNITARIO',  $s['VALOR_UNITARIO_DOCOMPRA']);
                            $INVENTARIOE->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                            $INVENTARIOE->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
                            $INVENTARIOE->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
                            $INVENTARIOE->__SET('ID_BODEGA',  $_REQUEST['BODEGA']);
                            $INVENTARIOE->__SET('ID_PRODUCTO', $s['ID_PRODUCTO']);
                            $INVENTARIOE->__SET('ID_TUMEDIDA', $s['ID_TUMEDIDA']);
                            $INVENTARIOE->__SET('ID_RECEPCION', $_REQUEST['IDP']);
                            $INVENTARIOE->__SET('ID_DOCOMPRA',  $s['ID_DOCOMPRA']);
                            $INVENTARIOE_ADO->agregarInventarioRecepcionDocompra($INVENTARIOE);
                            $AUSUARIO_ADO->agregarAusuario2("NULL",1,1,"".$_SESSION["NOMBRE_USUARIO"].", Se agrego el detalle de la orden de compra a la Recepción Envases.","material_inventarioe", "NULL" ,$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  
                        endforeach;
                    endforeach;
                    
                    $_SESSION["parametro"] =  $_REQUEST['IDP'];
                    $_SESSION["parametro1"] =  $_REQUEST['OPP'];
                    echo '<script>
                        Swal.fire({
                            icon:"success",
                            title:"Accion realizada",
                            text:"Se agregado los registro a la recepción.",
                            showConfirmButton: true,
                            confirmButtonText:"Volver a recepción",
                            closeOnConfirm:false
                        }).then((result)=>{
                            location.href="' . $_REQUEST['URLP'] . '.php?op";                        
                        })
                    </script>';
                }
            }
        ?>
</body>

</html>