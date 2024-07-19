<?php

include_once "../../assest/config/validarUsuarioFruta.php";
//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/PRODUCTO_ADO.php';
include_once '../../assest/controlador/TUMEDIDA_ADO.php';
include_once '../../assest/controlador/FOLIOM_ADO.php';


include_once '../../assest/controlador/INVENTARIOE_ADO.php';
include_once '../../assest/controlador/RECEPCIONE_ADO.php';

include_once '../../assest/modelo/INVENTARIOE.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$PRODUCTO_ADO =  new PRODUCTO_ADO();
$TUMEDIDA_ADO =  new TUMEDIDA_ADO();
$FOLIO_ADO =  new FOLIOM_ADO();

$INVENTARIOE_ADO =  new INVENTARIOE_ADO();
$RECEPCIONE_ADO =  new RECEPCIONE_ADO();

//INIICIALIZAR MODELO
$INVENTARIOE =  new INVENTARIOE();

//INICIALIZACION VARIABLES
$NUMEROFOLIO = "";
$FOLIOINVENTARIO = "";
$DESCRIPCION = "";
$CANTIDAD = "";
$VALORUNITARIO = 0;

$ALIASDINAMICO = "";
$ALIASESTACTICO = "";
$VALORTOTAL = 0;
$CANTIDADINGRESADO = 0;
$CANTIDADRESTANTE = 0;

$PRODUCTO = "";
$TUMEDIDA = "";
$TUMEDIDAV = "";

$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";
$PLANTA = "";
$FOLIO = "";



$PLANTA3 = "";

$PROVEEDOR = "";
$PRODUCTOR = "";
$PLANTA2 = "";
$BODEGA = "";
$TRECEPCION = "";

$ESTADO = "";

$DISABLED = "";
$DISABLED2 = "";

$IDOP = "";
$OP = "";
$IDPOP = "";
$OPP = "";
$URLP = "";
$SINO = "";
$MENSAJE = "";


//INICIALIZAR ARREGLOS
$ARRAYPRODUCTO = "";
$ARRAYVERPRODUCTO = "";
$ARRAYTCONTENEDOR = "";
$ARRAYTUMEDIDA = "";
$ARRAYVERTUMEDIDA = "";
$ARRAYDTARJA = "";
$ARRAYDRECEPCION = "";
$ARRAYRECEPCION = "";
$ARRAYVERFOLIOVALIDAR = "";
$ARRAYVERFOLIO;



//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES


$ARRAYPRODUCTO = $PRODUCTO_ADO->listarProductoPorEmpresaCBX($EMPRESAS, $TEMPORADAS);
$ARRAYTUMEDIDA = $TUMEDIDA_ADO->listarTumedidaPorEmpresaCBX($EMPRESAS);
include_once "../../assest/config/validarDatosUrlD.php";

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

    $ARRAYRECEPCION = $RECEPCIONE_ADO->verRecepcion($IDP);
    foreach ($ARRAYRECEPCION as $r) :
        $BODEGA = $r["ID_BODEGA"];
        $TRECEPCION = $r["TRECEPCION"];

    endforeach;
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
    //$VALORTOTAL = "";
    //$CANTIDADINGRESADO = "";
    //$CANTIDADRESTANTE = "";


    //crear =  OBTENCION DE DATOS PARA LA CREACION DE REGISTRO
    if ($OP == "crear") {
        $DISABLED = "";
        $DISABLED2 = "";
        $DISABLEDSTYLE = "";
        $DISABLEDSTYLE2 = "";
        $ARRAYDRECEPCION = $INVENTARIOE_ADO->verInventario($IDOP);
        foreach ($ARRAYDRECEPCION as $r) :
            $CANTIDAD = "" . $r['CANTIDAD_ENTRADA'];
            $VALORUNITARIO = "" . $r['VALOR_UNITARIO'];
            $PRODUCTO = "" . $r['ID_PRODUCTO'];
            $TUMEDIDA = "" . $r['ID_TUMEDIDA'];
            $ARRAYVERTUMEDIDA = $TUMEDIDA_ADO->verTumedida($TUMEDIDA);
            if ($ARRAYVERTUMEDIDA) {
                $TUMEDIDAV = $ARRAYVERTUMEDIDA[0]['NOMBRE_TUMEDIDA'];
            }
        endforeach;
    }
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {

        $DISABLED = "";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDRECEPCION = $INVENTARIOE_ADO->verInventario($IDOP);
        foreach ($ARRAYDRECEPCION as $r) :
            $CANTIDAD = "" . $r['CANTIDAD_ENTRADA'];
            $VALORUNITARIO = "" . $r['VALOR_UNITARIO'];
            $PRODUCTO = "" . $r['ID_PRODUCTO'];
            $TUMEDIDA = "" . $r['ID_TUMEDIDA'];
            $ARRAYVERTUMEDIDA = $TUMEDIDA_ADO->verTumedida($TUMEDIDA);
            if ($ARRAYVERTUMEDIDA) {
                $TUMEDIDAV = $ARRAYVERTUMEDIDA[0]['NOMBRE_TUMEDIDA'];
            }
        endforeach;
    }    //ver =  OBTENCION DE DATOS PARA LA VISUALIZACION DEL REGISTRO
    if ($OP == "ver") {
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDRECEPCION = $INVENTARIOE_ADO->verInventario($IDOP);
        foreach ($ARRAYDRECEPCION as $r) :
            $CANTIDAD = "" . $r['CANTIDAD_ENTRADA'];
            $VALORUNITARIO = "" . $r['VALOR_UNITARIO'];
            $PRODUCTO = "" . $r['ID_PRODUCTO'];
            $TUMEDIDA = "" . $r['ID_TUMEDIDA'];
            $ARRAYVERTUMEDIDA = $TUMEDIDA_ADO->verTumedida($TUMEDIDA);
            if ($ARRAYVERTUMEDIDA) {
                $TUMEDIDAV = $ARRAYVERTUMEDIDA[0]['NOMBRE_TUMEDIDA'];
            }
        endforeach;
    }
    if ($OP == "eliminar") {
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $MENSAJE = "ESTA SEGURO DE ELIMINAR EL REGISTRO, PARA CONFIRMAR PRESIONE ELIMINAR";
        $ARRAYDRECEPCION = $INVENTARIOE_ADO->verInventario($IDOP);
        foreach ($ARRAYDRECEPCION as $r) :
            $CANTIDAD = "" . $r['CANTIDAD_ENTRADA'];
            $VALORUNITARIO = "" . $r['VALOR_UNITARIO'];
            $PRODUCTO = "" . $r['ID_PRODUCTO'];
            $TUMEDIDA = "" . $r['ID_TUMEDIDA'];
            $ARRAYVERTUMEDIDA = $TUMEDIDA_ADO->verTumedida($TUMEDIDA);
            if ($ARRAYVERTUMEDIDA) {
                $TUMEDIDAV = $ARRAYVERTUMEDIDA[0]['NOMBRE_TUMEDIDA'];
            }
        endforeach;
    }
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
                    //TUMEDIDA = document.getElementById("TUMEDIDA").selectedIndex;


                    document.getElementById('val_cantidad').innerHTML = "";
                    document.getElementById('val_producto').innerHTML = "";
                    //document.getElementById('val_tumedida').innerHTML = "";         

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

                    if (CANTIDAD == 0) {
                        document.form_reg_dato.CANTIDAD.focus();
                        document.form_reg_dato.CANTIDAD.style.borderColor = "#FF0000";
                        document.getElementById('val_cantidad').innerHTML = "DEBE SER MAYOR A ZERO";
                        return false;
                    }
                    document.form_reg_dato.CANTIDAD.style.borderColor = "#4AF575";

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
            <?php  include_once "../../assest/config/menuFruta.php";
            ?>
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
                                                <input type="hidden" class="form-control" placeholder="ID BODEGA" id="BODEGA" name="BODEGA" value="<?php echo $BODEGA; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID TRECEPCION" id="TRECEPCION" name="TRECEPCION" value="<?php echo $TRECEPCION; ?>" />


                                                <input type="hidden" class="form-control" placeholder="ID DRECEPCIONE" id="IDD" name="IDD" value="<?php echo $IDOP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID RECEPCIONE" id="IDP" name="IDP" value="<?php echo $IDP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="OP RECEPCIONE" id="OPP" name="OPP" value="<?php echo $OPP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="URL RECEPCIONE" id="URLP" name="URLP" value="<?php echo $URLP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTA" name="PLANTA" value="<?php echo $PLANTAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADAS; ?>" />

                                                <label>Producto</label>
                                                <input type="hidden" class="form-control" placeholder="PRODUCTOE" id="PRODUCTOE" name="PRODUCTOE" value="<?php echo $PRODUCTO; ?>" />
                                                <select class="form-control select2" id="PRODUCTO" name="PRODUCTO" style="width: 100%;" onchange="this.form.submit()" <?php echo $DISABLED; ?> <?php echo $DISABLED2; ?>>
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
                                                <label>Cantidad Producto</label>
                                                <input type="hidden" class="form-control" placeholder="CANTIDADE" id="CANTIDADE" name="CANTIDADE" value="<?php echo $CANTIDAD; ?>" />
                                                <input type="text" class="form-control" placeholder="Canitdad Producto" id="CANTIDAD" name="CANTIDAD" value="<?php echo $CANTIDAD; ?>" <?php echo $DISABLED; ?> />
                                                <label id="val_cantidad" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <label id="val_drecepcion" class="validacion center"><?php echo $MENSAJE; ?> </label>
                                </div>
                                <!-- /.row -->
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="btn-group  col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12" role="group" aria-label="Acciones generales">
                                        <button type="button" class="btn  btn-success  " data-toggle="tooltip" title="Volver" name="CANCELAR" value="CANCELAR" Onclick="irPagina('<?php echo $URLP; ?>.php?op&id=<?php echo $id_dato; ?>&a=<?php echo $accion_dato; ?>&urlo=<?php echo $urlo_dato; ?>');">
                                            <i class="ti-back-left "></i> Volver
                                        </button>
                                        <?php if ($OP == "") { ?>
                                            <button type="submit" class="btn  btn-primary " data-toggle="tooltip" title="Crear" name="CREAR" value="CREAR" <?php echo $DISABLED; ?> onclick="return validacion()">
                                                <i class="ti-save-alt"></i> Guardar
                                            </button>
                                        <?php } ?>
                                        <?php if ($OP != "") { ?>
                                            <?php if ($OP == "crear") { ?>
                                                <button type="submit" class="btn  btn-primary " data-toggle="tooltip" title="Crear" name="CREAR" value="CREAR" <?php echo $DISABLED; ?> onclick="return validacion()">
                                                    <i class="ti-save-alt"></i> Guardar
                                                </button>
                                            <?php } ?>
                                            <?php if ($OP == "editar") { ?>
                                                <button type="submit" class="btn  btn-warning   " data-toggle="tooltip" title="Editar" name="EDITAR" value="EDITAR" <?php echo $DISABLED; ?> onclick="return validacion()">
                                                    <i class="ti-save-alt"></i> Guardar
                                                </button>
                                            <?php } ?>
                                            <?php if ($OP == "eliminar") { ?>
                                                <button type="submit" class="btn  btn-danger " data-toggle="tooltip" title="Eliminar" name="ELIMINAR" value="ELIMINAR">
                                                    <i class="ti-trash"></i> Eliminar
                                                </button>
                                            <?php } ?>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--.row -->
                    </section>
                    <!-- /.content -->
                </div>
            </div>
            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php include_once "../../assest/config/footer.php";   ?>
                <?php include_once "../../assest/config/menuExtraFruta.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../../assest/config/urlBase.php"; ?>
        <?php 
        

            //OPERACIONES
            //OPERACION DE REGISTRO DE FILA
            if (isset($_REQUEST['CREAR'])) {

                $VALORTOTAL = $_REQUEST['CANTIDAD'] * $_REQUEST['VALORUNITARIO'];
                $INVENTARIOE->__SET('TRECEPCION',  $_REQUEST['TRECEPCION']);
                $INVENTARIOE->__SET('CANTIDAD_ENTRADA', $_REQUEST['CANTIDAD']);
                $INVENTARIOE->__SET('VALOR_UNITARIO', $_REQUEST['VALORUNITARIO']);
                $INVENTARIOE->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                $INVENTARIOE->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
                $INVENTARIOE->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
                $INVENTARIOE->__SET('ID_BODEGA',  $_REQUEST['BODEGA']);
                $INVENTARIOE->__SET('ID_PRODUCTO', $_REQUEST['PRODUCTO']);
                $INVENTARIOE->__SET('ID_TUMEDIDA', $_REQUEST['TUMEDIDA']);
                $INVENTARIOE->__SET('ID_RECEPCION', $_REQUEST['IDP']);
                $INVENTARIOE_ADO->agregarInventarioRecepcion($INVENTARIOE);


                $AUSUARIO_ADO->agregarAusuario2("NULL",1,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de detalle de Recepción Envases.","material_inventarioe", "NULL" ,$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  
                //REDIRECCIONAR A PAGINA registroRecepcion.php 
                
                $id_dato =  $_REQUEST['IDP'];
                $accion_dato =  $_REQUEST['OPP'];
                echo '<script>
                        Swal.fire({
                            icon:"success",
                            title:"Registro creado",
                            text:"El registro de detalle de recepción se ha creado correctamente",
                            showConfirmButton:true,
                            confirmButtonText:"Volver a recepcion"
                        }).then((result)=>{
                            location.href ="'. $_REQUEST['URLP'].'.php?op&id='.$id_dato.'&a='.$accion_dato.'&urlo='.$urlo_dato.'";                            
                        })
                    </script>';
            }
            if (isset($_REQUEST['EDITAR'])) {

                $VALORTOTAL = $_REQUEST['CANTIDAD'] * $_REQUEST['VALORUNITARIO'];
                $INVENTARIOE->__SET('TRECEPCION',  $_REQUEST['TRECEPCION']);
                $INVENTARIOE->__SET('CANTIDAD_ENTRADA', $_REQUEST['CANTIDAD']);
                $INVENTARIOE->__SET('VALOR_UNITARIO', $_REQUEST['VALORUNITARIO']);
                $INVENTARIOE->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                $INVENTARIOE->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
                $INVENTARIOE->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
                $INVENTARIOE->__SET('ID_BODEGA',  $_REQUEST['BODEGA']);
                $INVENTARIOE->__SET('ID_PRODUCTO', $_REQUEST['PRODUCTOE']);
                $INVENTARIOE->__SET('ID_TUMEDIDA', $_REQUEST['TUMEDIDA']);
                $INVENTARIOE->__SET('ID_RECEPCION', $_REQUEST['IDP']);
                $INVENTARIOE->__SET('ID_INVENTARIO', $_REQUEST['IDD']);
                $INVENTARIOE_ADO->actualizarInventarioRecepcion($INVENTARIOE);

                $AUSUARIO_ADO->agregarAusuario2("NULL",1,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de detalle de Recepción Envases.","material_inventarioe", $_REQUEST['IDD'] ,$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  
                
                $id_dato =  $_REQUEST['IDP'];
                $accion_dato =  $_REQUEST['OPP'];
                echo '<script>
                    Swal.fire({
                        icon:"info",
                        title:"Registro Modificado",
                        text:"El registro del detalle de recepcion se ha modificada correctamente",
                        showConfirmButton:true,
                        confirmButtonText:"Volver a recepcion"
                    }).then((result)=>{
                        location.href ="'. $_REQUEST['URLP'].'.php?op&id='.$id_dato.'&a='.$accion_dato.'&urlo='.$urlo_dato.'";                            
                    })
                </script>';
            }
            if (isset($_REQUEST['ELIMINAR'])) {

                $INVENTARIOE->__SET('ID_INVENTARIO', $_REQUEST['IDD']);
                $INVENTARIOE_ADO->eliminado($INVENTARIOE);
                
                $INVENTARIOE->__SET('ID_INVENTARIO', $_REQUEST['IDD']);
                $INVENTARIOE_ADO->deshabilitar($INVENTARIOE);


                $AUSUARIO_ADO->agregarAusuario2("NULL",1,4,"".$_SESSION["NOMBRE_USUARIO"].", Deshabilitar  detalle de Recepción Envases.","material_inventarioe", $_REQUEST['IDD'] ,$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

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
                        location.href ="' . $_REQUEST['URLP'] . '.php?op&id='.$id_dato.'&a='.$accion_dato.'&urlo='.$urlo_dato.'";                        
                    })
                </script>';
            }
        
        ?>
</body>

</html>