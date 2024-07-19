<?php

include_once "../../assest/config/validarUsuarioMaterial.php";
//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/PRODUCTO_ADO.php';
include_once '../../assest/controlador/TCONTENEDORM_ADO.php';
include_once '../../assest/controlador/TUMEDIDA_ADO.php';
include_once '../../assest/controlador/FOLIOM_ADO.php';


include_once '../../assest/controlador/INVENTARIOM_ADO.php';
include_once '../../assest/controlador/RECEPCIONM_ADO.php';
include_once '../../assest/controlador/DRECEPCIONM_ADO.php';
include_once '../../assest/controlador/TARJAM_ADO.php';
include_once '../../assest/controlador/DOCOMPRA_ADO.php';


include_once '../../assest/modelo/DRECEPCIONM.php';
include_once '../../assest/modelo/INVENTARIOM.php';
include_once '../../assest/modelo/TARJAM.php';



//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$PRODUCTO_ADO =  new PRODUCTO_ADO();
$TCONTENEDOR_ADO =  new TCONTENEDORM_ADO();
$TUMEDIDA_ADO =  new TUMEDIDA_ADO();
$FOLIO_ADO =  new FOLIOM_ADO();

$INVENTARIOM_ADO =  new INVENTARIOM_ADO();
$RECEPCIONM_ADO =  new RECEPCIONM_ADO();
$DRECEPCIONM_ADO =  new DRECEPCIONM_ADO();
$TARJAM_ADO =  new TARJAM_ADO();
$DOCOMPRA_ADO =  new DOCOMPRA_ADO();

//INIICIALIZAR MODELO
$DRECEPCIONM =  new DRECEPCIONM();
$INVENTARIOM =  new INVENTARIOM();
$TARJAM =  new TARJAM();

//INICIALIZACION VARIABLES
$NUMEROFOLIO = "";
$FOLIOINVENTARIO = "";
$DESCRIPCION = "";
$CANTIDAD = 0;
$VALORUNITARIO = 0;


$CANTIDAD25 = 0;
$CANTIDAD50 = 0;
$CANTIDAD75 = 0;
$STYLEPROGRESO = "";
$CLASSPROGRESO = "";

$ALIASDINAMICO = "";
$ALIASESTACTICO = "";
$VALORTOTAL = 0;
$CANTIDADINGRESADO = 0;
$CANTIDADRESTANTE = 0;
$CANTIDADDOC = "";

$TOTALCANTIDADTARJA = 0;
$DIFERENCIA = 0;

$PRODUCTO = "";
$TCONTENEDOR = "";
$TUMEDIDA = "";
$TUMEDIDAV = "";

$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";
$PLANTA = "";
$FOLIO = "";

$BODEGA = "";
$PLANTA2 = "";
$PLANTA3 = "";
$PROVEEDOR = "";
$PRODUCTOR = "";
$ESTADO = "";

$DISABLED = "";
$DISABLED2 = "";
$DISABLEDE = "";

$IDOP = "";
$OP = "";
$IDPOP = "";
$OPP = "";
$URLP = "";
$SINO = "";
$MENSAJE = "";
$IDDOC = "";

//INICIALIZAR ARREGLOS
$ARRAYPRODUCTO = "";
$ARRAYVERPRODUCTO = "";
$ARRAYTCONTENEDOR = "";
$ARRAYTUMEDIDA = "";
$ARRAYVERTUMEDIDA = "";
$ARRAYDRECEPCION = "";
$ARRAYRECEPCION = "";
$ARRAYDTRECEPCION = "";
$ARRAYDTRECEPCIONTOTALES = "";
$ARRAYDTRECEPCIONTOTALES2 = "";

$ARRYAOBTENERID = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES


$ARRAYPRODUCTO = $PRODUCTO_ADO->listarProductoPorEmpresaCBX($EMPRESAS, $TEMPORADAS);
$ARRAYTCONTENEDOR = $TCONTENEDOR_ADO->listarTcontenedorPorEmpresaCBX($EMPRESAS);
$ARRAYTUMEDIDA = $TUMEDIDA_ADO->listarTumedidaPorEmpresaCBX($EMPRESAS);
include_once "../../assest/config/validarDatosUrlD.php";
include_once "../../assest/config/datosUrlDT.php";

if (isset($_GET["id"])) {
    $id_dato = $_GET["id"];
}else{
    $id_dato = "";
}

if (isset($_GET["a"])) {
    $accion_dato = $_GET["a"];
}else{
    $accion_dato = "";
}

if (isset($_GET["urlo"])) {
    $urlo_dato = $_GET["urlo"];
}else{
    $urlo_dato = "";
}

if (isset($_GET["idd"])) {
    $idd_dato = $_GET["idd"];
}else{
    $idd_dato = "";
}

if (isset($_GET["ad"])) {
    $acciond_dato = $_GET["ad"];
}else{
    $acciond_dato = "";
}




//OBTENCION DE DATOS ENVIADOR A LA URL
if (isset($id_dato) && isset($accion_dato) && isset($urlo_dato)) {
    $IDP = $id_dato;
    $OPP = $accion_dato;
    $URLP = $urlo_dato;
    
    $ARRAYRECEPCION = $RECEPCIONM_ADO->verRecepcion($IDP);
    if ($ARRAYRECEPCION) {
        $ESTADORECEPCION = $ARRAYRECEPCION[0]["ESTADO"];
    }
}
//PARA OPERACIONES DE EDICION , VISUALIZACION Y CREACION
//OPERACION PARA OBTENER EL ID RECEPCION Y FOLIO BASE, SOLO SE OCUPA PARA CREAR UN REGISTRO NUEVO
if (isset($id_dato) && isset($accion_dato) && isset($urlo_dato) && isset($idd_dato) && isset($acciond_dato)) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $idd_dato;
    $OP = $acciond_dato;

    $IDP = $id_dato;
    $OPP = $accion_dato;
    $URLP = $urlo_dato;

    //IDENTIFICACIONES DE OPERACIONES
    $ARRAYDTRECEPCION = $TARJAM_ADO->listarTarjaPorDrecepcion2CBX($IDOP);
    $ARRAYDTRECEPCIONTOTALES = $TARJAM_ADO->obtenerTotalesTarjaPorDrecepcionCBX($IDOP);
    $ARRAYDTRECEPCIONTOTALES2 = $TARJAM_ADO->obtenerTotalesTarjaPorDrecepcion2CBX($IDOP);
    $TOTALCANTIDADTARJA = $ARRAYDTRECEPCIONTOTALES[0]['CANTIDAD'];
    $TOTALCANTIDADTARJAV = $ARRAYDTRECEPCIONTOTALES2[0]['CANTIDAD'];


    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {

        $DISABLED = "";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDRECEPCION = $DRECEPCIONM_ADO->verDrecepcion($IDOP);
        if ($ARRAYDTRECEPCION) {
            $DISABLEDE = "disabled";
        } else {
            $DISABLEDE = "";
        }
        foreach ($ARRAYDRECEPCION as $r) :
            $DESCRIPCION = "" . $r['DESCRIPCION_DRECEPCION'];
            $CANTIDAD = "" . $r['CANTIDAD_DRECEPCION'];
            $VALORUNITARIO = "" . $r['VALOR_UNITARIO_DRECEPCION'];
            $PRODUCTO = "" . $r['ID_PRODUCTO'];
            $TUMEDIDA = "" . $r['ID_TUMEDIDA'];
            $ARRAYVERTUMEDIDA = $TUMEDIDA_ADO->verTumedida($TUMEDIDA);
            if ($ARRAYVERTUMEDIDA) {
                $TUMEDIDAV = $ARRAYVERTUMEDIDA[0]['NOMBRE_TUMEDIDA'];
            }
            $IDDOC = "" . $r['ID_DOCOMPRA'];
            $ARRAYDOCOMPRA = $DOCOMPRA_ADO->verDocompra($IDDOC);
            if ($ARRAYDOCOMPRA) {
                $CANTIDADDOC = $ARRAYDOCOMPRA[0]['CANTIDAD_DOCOMPRA'];
            }
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }    //ver =  OBTENCION DE DATOS PARA LA VISUALIZACION DEL REGISTRO
    if ($OP == "ver") {
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDRECEPCION = $DRECEPCIONM_ADO->verDrecepcion($IDOP);
        foreach ($ARRAYDRECEPCION as $r) :
            $DESCRIPCION = "" . $r['DESCRIPCION_DRECEPCION'];
            $CANTIDAD = "" . $r['CANTIDAD_DRECEPCION'];
            $VALORUNITARIO = "" . $r['VALOR_UNITARIO_DRECEPCION'];
            $PRODUCTO = "" . $r['ID_PRODUCTO'];
            $TUMEDIDA = "" . $r['ID_TUMEDIDA'];
            $ARRAYVERTUMEDIDA = $TUMEDIDA_ADO->verTumedida($TUMEDIDA);
            if ($ARRAYVERTUMEDIDA) {
                $TUMEDIDAV = $ARRAYVERTUMEDIDA[0]['NOMBRE_TUMEDIDA'];
            }
            $IDDOC = "" . $r['ID_DOCOMPRA'];
            $ARRAYDOCOMPRA = $DOCOMPRA_ADO->verDocompra($IDDOC);
            if ($ARRAYDOCOMPRA) {
                $CANTIDADDOC = $ARRAYDOCOMPRA[0]['CANTIDAD_DOCOMPRA'];
            }
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }
    if ($OP == "eliminar") {
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        if ($ARRAYDTRECEPCION) {
            $MENSAJE = "NO SE PUEDE QUITAR, ESTE REGISTRO CONTIENE REGISTROS ASOCIADOS";
            $DISABLEDE = "disabled";
        } else {
            $MENSAJE = "ESTA SEGURO DE QUITAR ESTE REGISTRO, PARA CONFIRMAR PRESIONE QUITAR";
            $DISABLEDE = "";
        }
        $ARRAYDRECEPCION = $DRECEPCIONM_ADO->verDrecepcion($IDOP);
        foreach ($ARRAYDRECEPCION as $r) :
            $DESCRIPCION = "" . $r['DESCRIPCION_DRECEPCION'];
            $CANTIDAD = "" . $r['CANTIDAD_DRECEPCION'];
            $VALORUNITARIO = "" . $r['VALOR_UNITARIO_DRECEPCION'];
            $PRODUCTO = "" . $r['ID_PRODUCTO'];
            $TUMEDIDA = "" . $r['ID_TUMEDIDA'];
            $ARRAYVERTUMEDIDA = $TUMEDIDA_ADO->verTumedida($TUMEDIDA);
            if ($ARRAYVERTUMEDIDA) {
                $TUMEDIDAV = $ARRAYVERTUMEDIDA[0]['NOMBRE_TUMEDIDA'];
            }
            $IDDOC = "" . $r['ID_DOCOMPRA'];
            $ARRAYDOCOMPRA = $DOCOMPRA_ADO->verDocompra($IDDOC);
            if ($ARRAYDOCOMPRA) {
                $CANTIDADDOC = $ARRAYDOCOMPRA[0]['CANTIDAD_DOCOMPRA'];
            }
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }

    $DIFERENCIA = $CANTIDAD - $TOTALCANTIDADTARJA;
}
if (isset($_POST)) {
    if (isset($_REQUEST['CANTIDAD'])) {
        $CANTIDAD = "" . $_REQUEST['CANTIDAD'];
    }
    if (isset($_REQUEST['VALORUNITARIO'])) {
        $VALORUNITARIO = "" . $_REQUEST['VALORUNITARIO'];
    }
    if (isset($_REQUEST['PRODUCTO'])) {
        $PRODUCTO = "" . $_REQUEST['PRODUCTO'];
        $ARRAYVERPRODUCTO = $PRODUCTO_ADO->verProducto($PRODUCTO);
        if ($ARRAYVERPRODUCTO) {
            $TUMEDIDA = $ARRAYVERPRODUCTO[0]['ID_TUMEDIDA'];
            $ARRAYVERTUMEDIDA = $TUMEDIDA_ADO->verTumedida($TUMEDIDA);
            if ($ARRAYVERTUMEDIDA) {
                $TUMEDIDAV = $ARRAYVERTUMEDIDA[0]['NOMBRE_TUMEDIDA'];
            }
        }
    }
    if (isset($_REQUEST['DESCRIPCION'])) {
        $DESCRIPCION = "" . $_REQUEST['DESCRIPCION'];
    }
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Detalle Recepción </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../../assest/config/urlHead.php"; ?>
        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
                function validacion() {


                    CANTIDAD = document.getElementById("CANTIDAD").value;
                    PRODUCTO = document.getElementById("PRODUCTO").selectedIndex;

                    document.getElementById('val_cantidad').innerHTML = "";
                    document.getElementById('val_producto').innerHTML = "";

                    if (PRODUCTO == null || PRODUCTO == 0) {
                        document.form_reg_dato.PRODUCTO.focus();
                        document.form_reg_dato.PRODUCTO.style.borderColor = "#FF0000";
                        document.getElementById('val_producto').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.PRODUCTO.style.borderColor = "#4AF575";

                    if (CANTIDAD == null || CANTIDAD.length == 0 || /^\s+$/.test(CANTIDAD)) {
                        document.form_reg_dato.CANTIDAD.focus();
                        document.form_reg_dato.CANTIDAD.style.borderColor = "#FF0000";
                        document.getElementById('val_cantidad').innerHTML = "NO HA INGRESADO DATOS";
                        return false;
                    }
                    document.form_reg_dato.CANTIDAD.style.borderColor = "#4AF575";

                }

                function abrirPestana(url) {
                    var win = window.open(url, '_blank');
                    win.focus();
                }
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
            <?php include_once "../../assest/config/menuMaterial.php";
            ?>
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
                                            <li class="breadcrumb-item" aria-current="page">Registro Recepción </li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#">Registro Detalle </a>
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
                        <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato">
                            <div class="box">
                                <div class="box-header with-border bg-success">                                   
                                    <h4 class="box-title">Registro Detalle</h4>                                        
                                </div>
                                <div class="box-body ">
                                    <div class="row">
                                        <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Producto</label>
                                                <input type="hidden" class="form-control" placeholder="ID DRECEPCIONM" id="IDD" name="IDD" value="<?php echo $IDOP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="OP DRECEPCIONM" id="OPD" name="OPD" value="<?php echo $OP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID RECEPCIONM" id="IDP" name="IDP" value="<?php echo $IDP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID RECEPCIONM" id="OPP" name="OPP" value="<?php echo $OPP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID RECEPCIONM" id="URLP" name="URLP" value="<?php echo $URLP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="URL RECEPCIONE" id="IDDOC" name="IDDOC" value="<?php echo $IDDOC; ?>" />
                                                <input type="hidden" class="form-control" placeholder="URL DTRECEPCIONE" id="URLT" name="URLT" value="registroDtrecepcionm" />
                                                <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTA" name="PLANTA" value="<?php echo $PLANTAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADAS; ?>" />

                                                <input type="hidden" class="form-control" placeholder="PRODUCTOE" id="PRODUCTOE" name="PRODUCTOE" value="<?php echo $PRODUCTO; ?>" />
                                                <select class="form-control select2" id="PRODUCTO" name="PRODUCTO" style="width: 100%;" onchange="this.form.submit()" <?php echo $DISABLED2; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYPRODUCTO as $r) : ?>
                                                        <?php if ($ARRAYPRODUCTO) {    ?>
                                                            <option value="<?php echo $r['ID_PRODUCTO']; ?>" <?php if ($PRODUCTO == $r['ID_PRODUCTO']) {
                                                                                                                    echo "selected";
                                                                                                                } ?>> <?php echo $r['NOMBRE_PRODUCTO'] ?> </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_producto" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Unidad Medida</label>
                                                <input type="hidden" class="form-control" placeholder="TUMEDIDA" id="TUMEDIDA" name="TUMEDIDA" value="<?php echo $TUMEDIDA; ?>" />
                                                <input type="text" class="form-control" placeholder="Unidad Medida" id="TUMEDIDAV" name="TUMEDIDAV" value="<?php echo $TUMEDIDAV; ?>" disabled />
                                                <label id="val_tumedida" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Valor Unitario </label>
                                                <input type="hidden" class="form-control" placeholder="VALORUNITARIO" id="VALORUNITARIO" name="VALORUNITARIO" value="<?php echo $VALORUNITARIO; ?>" />
                                                <input type="text" class="form-control" placeholder="Valor Unitario" id="VALORUNITARIOV" name="VALORUNITARIOV" value="<?php echo $VALORUNITARIO; ?>" disabled />
                                                <label id="val_vu" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Cantidad Detalle OC</label>
                                                <input type="hidden" class="form-control" placeholder="CANTIDADDOC" id="CANTIDADDOC" name="CANTIDADDOC" value="<?php echo $CANTIDADDOC; ?>" />
                                                <input type="text" class="form-control" placeholder="Cantidad Detalle OC" id="CANTIDADDOCV" name="CANTIDADDOCV" value="<?php echo $CANTIDADDOC; ?>" disabled />
                                                <label id="val_cantidaddoc" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Canitdad Producto</label>
                                                <input type="hidden" class="form-control" placeholder="CANTIDADE" id="CANTIDADE" name="CANTIDADE" value="<?php echo $CANTIDAD; ?>" />
                                                <input type="text" class="form-control" placeholder="Canitdad Producto" id="CANTIDAD" name="CANTIDAD" value="<?php echo $CANTIDAD; ?>" <?php echo $DISABLED; ?> />
                                                <label id="val_cantidad" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Cantidad Tarjada</label>
                                                <input type="hidden" class="form-control" placeholder="TOTALCANTIDADTARJA" id="TOTALCANTIDADTARJA" name="TOTALCANTIDADTARJA" value="<?php echo $TOTALCANTIDADTARJA; ?>" />
                                                <input type="text" class="form-control" placeholder="Cantidad Ingresado" id="TOTALCANTIDADTARJAV" name="TOTALCANTIDADTARJAV" value="<?php echo $TOTALCANTIDADTARJA; ?>" <?php echo $DISABLED; ?> disabled />
                                                <label id="val_cantidadi" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Cantidad Restante</label>
                                                <input type="hidden" class="form-control" placeholder="CANTIDADRESTANTE" id="CANTIDADRESTANTE" name="CANTIDADRESTANTE" value="<?php echo $CANTIDADRESTANTE; ?>" />
                                                <input type="text" class="form-control" placeholder="Cantidad Restante" id="CANTIDADRESTANTEV" name="CANTIDADRESTANTEV" value="<?php echo $CANTIDADRESTANTE; ?>" <?php echo $DISABLED; ?> disabled />
                                                <label id="val_cantidadr" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Descripción </label>
                                                <input type="hidden" class="form-control" placeholder="Observaciónes" id="DESCRIPCIONE" name="DESCRIPCIONE" value="<?php echo $DESCRIPCION; ?>" />
                                                <textarea class="form-control" rows="1" placeholder="Ingrese Nota, Observaciones u Otro" id="DESCRIPCION" name="DESCRIPCION" <?php echo $DISABLED; ?>><?php echo $DESCRIPCION; ?></textarea>
                                                <label id="val_observacion" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <label id="val_drecepcion" class="validacion center"><?php echo $MENSAJE; ?> </label>
                                </div>
                                <!-- /.row -->
                                <!-- /.box-body -->                             
                                <div class="box-footer">
                                        <div class="btn-group btn-block  col-xxl-4 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12 " role="group" aria-label="Acciones generales">
                                            <button type="button" class="btn  btn-success  " data-toggle="tooltip" title="Volver" name="CANCELAR" value="CANCELAR" Onclick="irPagina('<?php echo $URLP; ?>.php?op&id=<?php echo $id_dato; ?>&a=<?php echo $accion_dato; ?>&urlo=<?php echo $urlo_dato; ?>');">
                                                <i class="ti-back-left "></i> Volver
                                            </button>
                                            <?php if ($OP == "") { ?>
                                                <button type="submit" class="btn btn-primary " data-toggle="tooltip" title="Guardar" name="CREAR" value="CREAR" <?php echo $DISABLED; ?>  onclick="return validacion()">
                                                    <i class="ti-save-alt"></i> Guardar
                                                </button>
                                            <?php } ?>
                                            <?php if ($OP != "") { ?>
                                                <?php if ($OP == "crear") { ?>
                                                    <button type="submit" class="btn btn-primary " data-toggle="tooltip" title="Guardar" name="CREAR" value="CREAR" <?php echo $DISABLED; ?>  onclick="return validacion()">
                                                        <i class="ti-save-alt"></i> Guardar
                                                    </button>
                                                <?php } ?>
                                                <?php if ($OP == "editar") { ?>
                                                    <button type="submit" class="btn btn-warning   " data-toggle="tooltip" title="Guardar" name="EDITAR" value="EDITAR" <?php echo $DISABLED; ?>  onclick="return validacion()">
                                                        <i class="ti-save-alt"></i> Guardar
                                                    </button>
                                                <?php } ?>
                                                <?php if ($OP == "eliminar") { ?>
                                                    <button type="submit" class="btn btn-danger " data-toggle="tooltip" title="Eliminar" name="ELIMINAR" value="ELIMINAR">
                                                        <i class="ti-trash"></i> Eliminar
                                                    </button>
                                                <?php } ?>
                                            <?php } ?>
                                        </div>
                                        <div class="btn-group col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 col-xs-12 float-right " role="group" aria-label="Informes">
                                            <button type="button" class="btn  btn-info  " data-toggle="tooltip" title="Tarjas" id="defecto" name="tarjas" Onclick="abrirPestana('../../assest/documento/informeTarjasDrecepcion.php?parametro=<?php echo $IDOP; ?>&usuario=<?php echo $IDUSUARIOS; ?>'); ">
                                                <i class="fa fa-file-pdf-o"></i> Tarja
                                            </button>
                                        </div>
                                </div>
                            </div>
                        </form>
                        <!--.row -->
                        <div class="card">
                            <div class="card-header bg-info">
                                <h4 class="card-title">Detalle de recepcion</h4>
                            </div>                                             
                            <div class="card-header">
                                <div class="form-row align-items-center">
                                    <form method="post" id="form2" name="form2">
                                        <input type="hidden" class="form-control" placeholder="ID RECEPCIONE" id="IDP" name="IDP" value="<?php echo $IDP; ?>" />
                                        <input type="hidden" class="form-control" placeholder="OP RECEPCIONE" id="OPP" name="OPP" value="<?php echo $OPP; ?>" />
                                        <input type="hidden" class="form-control" placeholder="ID DRECEPCIONM" id="IDD" name="IDD" value="<?php echo $IDOP; ?>" />
                                        <input type="hidden" class="form-control" placeholder="OP DRECEPCIONM" id="OPD" name="OPD" value="<?php echo $OP; ?>" />
                                        <input type="hidden" class="form-control" placeholder="URL RECEPCIONE" id="URLP" name="URLP" value="registroRecepcionm" />
                                        <input type="hidden" class="form-control" placeholder="URL DRECEPCIONE" id="URLD" name="URLD" value="registroDrecepcionmDocompra" />
                                        <input type="hidden" class="form-control" placeholder="URL DTRECEPCIONE" id="URLT" name="URLT" value="registroDtrecepcionm" />
                                        <div class="col-auto">
                                            <button type="submit" class="btn btn-success btn-block mb-2" data-toggle="tooltip" title="Agregar Detalle Recepción" id="CREARDURL" name="CREARDURL"                                            
                                            <?php if ($DIFERENCIA == 0) { echo "disabled style='background-color: #eeeeee;'"; } ?> <?php echo $DISABLED; ?> >
                                                Agregar Tarja
                                            </button>
                                        </div>
                                    </form>
                                    <div class="col-auto">
                                        <label class="sr-only" for="inlineFormInputGroup">Username</label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"> Cantidad Detalle</div>
                                            </div>
                                            <input type="hidden" name="CANTIDAD" id="CANTIDAD" value="<?php echo $CANTIDAD; ?>" />
                                            <input type="text" class="form-control" placeholder="Total Envase" id="CANTIDADV" name="CANTIDADV" value="<?php echo $CANTIDAD; ?>" disabled />
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <label class="sr-only" for="inlineFormInputGroup">Username</label>
                                            <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Cantidad en Tarja</div>
                                            </div>
                                            <input type="hidden" name="TOTALCANTIDADTARJA" id="TOTALCANTIDADTARJA" value="<?php echo $TOTALCANTIDADTARJA; ?>" />
                                            <input type="text" class="form-control" placeholder="Total Neto" id="TOTALCANTIDADTARJAV" name="TOTALCANTIDADTARJAV" value="<?php echo $TOTALCANTIDADTARJA; ?>" disabled />
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <label class="sr-only" for="inlineFormInputGroup">Username</label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Cantidad Diferencia</div>
                                            </div>
                                            <input type="hidden" name="DIFERENCIA" id="DIFERENCIA" value="<?php echo $DIFERENCIA; ?>" />
                                            <input type="text" class="form-control" placeholder="Diferencia" id="DIFERENCIAV" name="DIFERENCIAV" value="<?php echo $DIFERENCIA; ?>" disabled />
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            <div class="card-body">
                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                    <div class=" table-responsive">
                                        <table id="detalle" class="table table-hover " style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <a href="#" class="text-warning hover-warning">
                                                            Folio
                                                        </a>
                                                    </th>
                                                    <th class="text-center">Operaciónes</th>
                                                    <th>Cantidad Contenedor</th>
                                                    <th>Cantidad Tarja</th>
                                                    <th>Producto </th>
                                                    <th>Tipo Contenedor</th>
                                                    <th>Unidad Medida</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php if ($ARRAYDTRECEPCION) { ?>
                                                    <?php foreach ($ARRAYDTRECEPCION as $s) : ?>
                                                        
                                                        <?php
                                                        $ARRAYPRODUCTO = $PRODUCTO_ADO->verProducto($s['ID_PRODUCTO']);
                                                        if ($ARRAYPRODUCTO) {
                                                            $NOMBREPRODUCTO = $ARRAYPRODUCTO[0]['NOMBRE_PRODUCTO'];
                                                        } else {
                                                            $NOMBREPRODUCTO = "Sin Dato";
                                                        }
                                                        $ARRAYTCONTENEDOR = $TCONTENEDOR_ADO->verTcontenedor($s['ID_TCONTENEDOR']);
                                                        if ($ARRAYTCONTENEDOR) {
                                                            $NOMBRECONTENEDOR = $ARRAYTCONTENEDOR[0]['NOMBRE_TCONTENEDOR'];
                                                        } else {
                                                            $NOMBRECONTENEDOR = "Sin Dato";
                                                        }

                                                        $ARRAYTUMEDIDA = $TUMEDIDA_ADO->verTumedida($s['ID_TUMEDIDA']);
                                                        if ($ARRAYTUMEDIDA) {
                                                            $NOMBRETUMEDIDA = $ARRAYTUMEDIDA[0]['NOMBRE_TUMEDIDA'];
                                                        } else {
                                                            $NOMBRETUMEDIDA = "Sin Dato";
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <a href="#" class="text-warning hover-warning">
                                                                    <?php echo $s['FOLIO_TARJA']; ?>
                                                                </a>
                                                            </td>
                                                            <td class="text-center">
                                                                <form method="post" id="form1" name="form1">
                                                                    <input type="hidden" class="form-control" placeholder="ID TARJAM" id="IDT" name="IDT" value="<?php echo $s['ID_TARJA']; ?>" />
                                                                    <input type="hidden" class="form-control" placeholder="ID RECEPCIONE" id="IDP" name="IDP" value="<?php echo $IDP; ?>" />
                                                                    <input type="hidden" class="form-control" placeholder="OP RECEPCIONE" id="OPP" name="OPP" value="<?php echo $OPP; ?>" />
                                                                    <input type="hidden" class="form-control" placeholder="ID DRECEPCIONM" id="IDD" name="IDD" value="<?php echo $IDOP; ?>" />
                                                                    <input type="hidden" class="form-control" placeholder="OP DRECEPCIONM" id="OPD" name="OPD" value="<?php echo $OP; ?>" />
                                                                    <input type="hidden" class="form-control" placeholder="URL RECEPCIONE" id="URLP" name="URLP" value="registroRecepcionm" />
                                                                    <input type="hidden" class="form-control" placeholder="URL DRECEPCIONE" id="URLD" name="URLD" value="registroDrecepcionmDocompra" />
                                                                    <input type="hidden" class="form-control" placeholder="URL DTRECEPCIONE" id="URLT" name="URLT" value="registroDtrecepcionm" />
                                                                    <div class="btn-group btn-rounded btn-block" role="group" aria-label="Operaciones Detalle">
                                                                        <?php if ($ESTADORECEPCION  == "0") { ?>
                                                                            <button type="submit" class="btn btn-info  btn-sm " data-toggle="tooltip" id="VERDURL" name="VERDURL" title="Ver">
                                                                                <i class="ti-eye"></i><br> Ver
                                                                            </button>
                                                                        <?php } ?>
                                                                        <?php if ($ESTADORECEPCION == "1") { ?>
                                                                            <button type="submit" class="btn btn-warning btn-sm " data-toggle="tooltip" id="EDITARDURL" name="EDITARDURL" title="Editar" <?php echo $DISABLED; ?>>
                                                                                <i class="ti-pencil-alt"></i><br> Editar
                                                                            </button>
                                                                            <button type="submit" class="btn btn-secondary btn-sm " data-toggle="tooltip" id="DUPLICARDURL" name="DUPLICARDURL" title="Duplicar" <?php echo $DISABLED; ?>>
                                                                                <i class="fa fa-fw fa-copy"></i><br> Duplicar
                                                                            </button>
                                                                            <button type="submit" class="btn btn-danger btn-sm " data-toggle="tooltip" id="ELIMINARDURL" name="ELIMINARDURL" title="Eliminar" <?php echo $DISABLED; ?>>
                                                                                <i class="ti-close"></i><br> Eliminar
                                                                            </button>
                                                                        <?php } ?>
                                                                    </div>
                                                                </form>
                                                            </td>
                                                            <td><?php echo $s['CANTIDADC']; ?></td>
                                                            <td><?php echo $s['CANTIDAD']; ?></td>
                                                            <td><?php echo $NOMBREPRODUCTO  ?> </td>
                                                            <td><?php echo $NOMBRECONTENEDOR  ?> </td>
                                                            <td><?php echo $NOMBRETUMEDIDA  ?> </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- /.content -->
                </div>
            </div>
            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php include_once "../../assest/config/footer.php";   ?>
                <?php include_once "../../assest/config/menuExtraMaterial.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../../assest/config/urlBase.php"; ?>
        <?php        

            if (isset($_REQUEST['EDITAR'])) {

                $VALORTOTAL = $_REQUEST['CANTIDAD'] * $_REQUEST['VALORUNITARIO'];
                $DRECEPCIONM->__SET('CANTIDAD_DRECEPCION', $_REQUEST['CANTIDAD']);
                $DRECEPCIONM->__SET('VALOR_UNITARIO_DRECEPCION', $_REQUEST['VALORUNITARIO']);
                $DRECEPCIONM->__SET('DESCRIPCION_DRECEPCION', $_REQUEST['DESCRIPCION']);
                $DRECEPCIONM->__SET('VALOR_TOTAL_DRECEPCION', $VALORTOTAL);
                $DRECEPCIONM->__SET('ID_RECEPCION', $_REQUEST['IDP']);
                $DRECEPCIONM->__SET('ID_PRODUCTO', $_REQUEST['PRODUCTOE']);
                $DRECEPCIONM->__SET('ID_TUMEDIDA', $_REQUEST['TUMEDIDA']);
                $DRECEPCIONM->__SET('ID_DOCOMPRA', $_REQUEST['IDDOC']);
                $DRECEPCIONM->__SET('ID_DRECEPCION', $_REQUEST['IDD']);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $DRECEPCIONM_ADO->actualizarDrecepcionDocompra($DRECEPCIONM);

                $AUSUARIO_ADO->agregarAusuario2("NULL",2,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de detalle de Recepción Materiales.","material_drecepcionm", $_REQUEST['IDD'] ,$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

                echo '<script>
                    Swal.fire({
                        icon:"info",
                        title:"Registro Modificado",
                        text:"El registro del detalle de recepcion se ha modificada correctamente",
                        showConfirmButton:true,
                        confirmButtonText:"cerrar"
                    }).then((result)=>{
                        location.href ="registroDrecepcionmDocompra.php?op&id='.$id_dato.'&a='.$accion_dato.'&urlo='.$urlo_dato.'&idd='.$idd_dato.'&ad='.$acciond_dato.'";                        
                    })
                </script>';
            }
            if (isset($_REQUEST['ELIMINAR'])) {

                $DRECEPCIONM->__SET('ID_DRECEPCION', $_REQUEST['IDD']);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $DRECEPCIONM_ADO->deshabilitar($DRECEPCIONM);

                $AUSUARIO_ADO->agregarAusuario2("NULL",2,4,"".$_SESSION["NOMBRE_USUARIO"].", Deshabilitar  detalle de Recepción Materiales.","material_drecepcionm", $_REQUEST['IDD'] ,$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

                $id_dato =  $_REQUEST['IDP'];
                $accion_dato =  $_REQUEST['OPP'];
                echo '<script>
                    Swal.fire({
                        icon:"error",
                        title:"Registro Eliminado",
                        text:"El registro del detalle recepcion se ha eliminado correctamente ",
                        showConfirmButton:true,
                        confirmButtonText:"Volver a recepcion"
                    }).then((result)=>{
                        location.href ="' . $_REQUEST['URLP'] . '.php?op";                        
                    })
                </script>';
            }

        ?>
</body>
</html>