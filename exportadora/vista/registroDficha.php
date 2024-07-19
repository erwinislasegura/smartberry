<?php

include_once "../../assest/config/validarUsuarioExpo.php";
//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/PRODUCTO_ADO.php';
include_once '../../assest/controlador/FAMILIA_ADO.php';
include_once '../../assest/controlador/SUBFAMILIA_ADO.php';
include_once '../../assest/controlador/TUMEDIDA_ADO.php';
include_once '../../assest/controlador/EEXPORTACION_ADO.php';


include_once '../../assest/controlador/FICHA_ADO.php';
include_once '../../assest/controlador/DFICHA_ADO.php';

include_once '../../assest/modelo/DFICHA.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$EEXPORTACION_ADO =  new EEXPORTACION_ADO();
$PRODUCTO_ADO =  new PRODUCTO_ADO();
$FAMILIA_ADO =  new FAMILIA_ADO();
$SUBFAMILIA_ADO =  new SUBFAMILIA_ADO();
$TUMEDIDA_ADO =  new TUMEDIDA_ADO();

$FICHA_ADO =  new FICHA_ADO();
$DFICHA_ADO =  new DFICHA_ADO();

//INIICIALIZAR MODELO
$DFICHA =  new DFICHA();

//INICIALIZACION VARIABLES
$PRODUCTO = "";

$TUMEDIDA = "";
$FAMILIA = "";
$SUBFAMILIA = "";

$TUMEDIDAV = "";
$FAMILIAV = "";
$SUBFAMILIAV = "";
$CONSUMOCONTENEDOR = 0;
$CONSUMOPORENVASE = 0;
$CONSUMOPORPALLET = 0;
$PALLETCARGA = 0;
$FACTORCONSUMO = 0;
$ENVASEESTANDAR = 0;
$DESCRIPCION = "";


$ESTADO = "";

$DISABLED = "";
$DISABLED2 = "";

$IDOP = "";
$OP = "";
$IDPOP = "";
$OPP = "";
$URLO = "";
$SINO = "";
$MENSAJE = "";


//INICIALIZAR ARREGLOS
$ARRAYDFICHA = "";
$ARRAYFICHA = "";

$ARRAYEEXPORTACION = "";
$ARRAYPRODUCTO = "";
$ARRAYVERFAMILIA = "";
$ARRAYVERSUBFAMILIA = "";
$ARRAYVERTUMEDIDA = "";



//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES


$ARRAYPRODUCTO = $PRODUCTO_ADO->listarProductoPorEmpresaPorTemporadaCBX($EMPRESAS, $TEMPORADAS);
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
    $URLO = $urlo_dato;
    $ARRAYFICHA = $FICHA_ADO->verFicha($IDP);
    if ($ARRAYFICHA) {
        $ARRAYEEXPORTACION = $EEXPORTACION_ADO->verEstandar($ARRAYFICHA[0]["ID_ESTANDAR"]);
        if ($ARRAYEEXPORTACION) {
            $ENVASEESTANDAR = $ARRAYEEXPORTACION[0]["CANTIDAD_ENVASE_ESTANDAR"];
        }
    }
}
//PARA OPERACIONES DE EDICION , VISUALIZACION Y CREACION
//OPERACION PARA OBTENER EL ID OCOMPRA Y FOLIO BASE, SOLO SE OCUPA PARA CREAR UN REGISTRO NUEVO
if (isset($id_dato) && isset($accion_dato) && isset($urlo_dato) && isset($idd_dato) && isset($acciond_dato)) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $idd_dato;
    $OP = $acciond_dato;
    $IDP = $id_dato;
    $OPP = $accion_dato;
    $URLO = $urlo_dato;

    $ARRAYFICHA = $FICHA_ADO->verFicha($IDP);
    if ($ARRAYFICHA) {
        $ARRAYEEXPORTACION = $EEXPORTACION_ADO->verEstandar($ARRAYFICHA[0]["ID_ESTANDAR"]);
        if ($ARRAYEEXPORTACION) {
            $ENVASEESTANDAR = $ARRAYEEXPORTACION[0]["CANTIDAD_ENVASE_ESTANDAR"];
        }
    }

    //IDENTIFICACIONES DE OPERACIONES
    //crear =  OBTENCION DE DATOS PARA LA CREACION DE REGISTRO
    if ($OP == "crear") {
        $DISABLED = "";
        $DISABLED2 = "";
        $DISABLEDSTYLE = "";
        $DISABLEDSTYLE2 = "";
        $ARRAYDFICHA = $DFICHA_ADO->verDFicha($IDOP);
        foreach ($ARRAYDFICHA as $r) :
            $PRODUCTO = "" . $r['ID_PRODUCTO'];
            $ARRAYVERPRODUCTO = $PRODUCTO_ADO->verProducto($PRODUCTO);
            if ($ARRAYVERPRODUCTO) {
                $ARRAYVERFAMILIA = $FAMILIA_ADO->verFamilia($ARRAYVERPRODUCTO[0]["ID_FAMILIA"]);
                if ($ARRAYVERFAMILIA) {
                    $FAMILIAV = $ARRAYVERFAMILIA[0]["NOMBRE_FAMILIA"];
                }
                $ARRAYVERSUBFAMILIA = $SUBFAMILIA_ADO->verSubfamilia($ARRAYVERPRODUCTO[0]["ID_SUBFAMILIA"]);
                if ($ARRAYVERSUBFAMILIA) {
                    $SUBFAMILIAV = $ARRAYVERSUBFAMILIA[0]["NOMBRE_SUBFAMILIA"];
                }
                $ARRAYVERTUMEDIDA = $TUMEDIDA_ADO->verTumedida($ARRAYVERPRODUCTO[0]["ID_TUMEDIDA"]);
                if ($ARRAYVERTUMEDIDA) {
                    $TUMEDIDAV = $ARRAYVERTUMEDIDA[0]["NOMBRE_TUMEDIDA"];
                }
            }
            $FACTORCONSUMO = "" . $r['FACTOR_CONSUMO_DFICHA'];
            $CONSUMOPORPALLET = "" . $r['CONSUMO_PALLET_DFICHA'];
            $PALLETCARGA = "" . $r['PALLET_CARGA_DFICHA'];
            $CONSUMOCONTENEDOR = "" . $r['CONSUMO_CONTENEDOR_DFICHA'];
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {

        $DISABLED = "";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDFICHA = $DFICHA_ADO->verDFicha($IDOP);
        foreach ($ARRAYDFICHA as $r) :
            $PRODUCTO = "" . $r['ID_PRODUCTO'];
            $ARRAYVERPRODUCTO = $PRODUCTO_ADO->verProducto($PRODUCTO);
            if ($ARRAYVERPRODUCTO) {
                $ARRAYVERFAMILIA = $FAMILIA_ADO->verFamilia($ARRAYVERPRODUCTO[0]["ID_FAMILIA"]);
                if ($ARRAYVERFAMILIA) {
                    $FAMILIAV = $ARRAYVERFAMILIA[0]["NOMBRE_FAMILIA"];
                }
                $ARRAYVERSUBFAMILIA = $SUBFAMILIA_ADO->verSubfamilia($ARRAYVERPRODUCTO[0]["ID_SUBFAMILIA"]);
                if ($ARRAYVERSUBFAMILIA) {
                    $SUBFAMILIAV = $ARRAYVERSUBFAMILIA[0]["NOMBRE_SUBFAMILIA"];
                }
                $ARRAYVERTUMEDIDA = $TUMEDIDA_ADO->verTumedida($ARRAYVERPRODUCTO[0]["ID_TUMEDIDA"]);
                if ($ARRAYVERTUMEDIDA) {
                    $TUMEDIDAV = $ARRAYVERTUMEDIDA[0]["NOMBRE_TUMEDIDA"];
                }
            }
            $FACTORCONSUMO = "" . $r['FACTOR_CONSUMO_DFICHA'];
            $CONSUMOPORPALLET = "" . $r['CONSUMO_PALLET_DFICHA'];
            $PALLETCARGA = "" . $r['PALLET_CARGA_DFICHA'];
            $CONSUMOCONTENEDOR = "" . $r['CONSUMO_CONTENEDOR_DFICHA'];
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }    //ver =  OBTENCION DE DATOS PARA LA VISUALIZACION DEL REGISTRO
    if ($OP == "ver") {
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDFICHA = $DFICHA_ADO->verDFicha($IDOP);
        foreach ($ARRAYDFICHA as $r) :
            $PRODUCTO = "" . $r['ID_PRODUCTO'];
            $ARRAYVERPRODUCTO = $PRODUCTO_ADO->verProducto($PRODUCTO);
            if ($ARRAYVERPRODUCTO) {
                $ARRAYVERFAMILIA = $FAMILIA_ADO->verFamilia($ARRAYVERPRODUCTO[0]["ID_FAMILIA"]);
                if ($ARRAYVERFAMILIA) {
                    $FAMILIAV = $ARRAYVERFAMILIA[0]["NOMBRE_FAMILIA"];
                }
                $ARRAYVERSUBFAMILIA = $SUBFAMILIA_ADO->verSubfamilia($ARRAYVERPRODUCTO[0]["ID_SUBFAMILIA"]);
                if ($ARRAYVERSUBFAMILIA) {
                    $SUBFAMILIAV = $ARRAYVERSUBFAMILIA[0]["NOMBRE_SUBFAMILIA"];
                }
                $ARRAYVERTUMEDIDA = $TUMEDIDA_ADO->verTumedida($ARRAYVERPRODUCTO[0]["ID_TUMEDIDA"]);
                if ($ARRAYVERTUMEDIDA) {
                    $TUMEDIDAV = $ARRAYVERTUMEDIDA[0]["NOMBRE_TUMEDIDA"];
                }
            }
            $FACTORCONSUMO = "" . $r['FACTOR_CONSUMO_DFICHA'];
            $CONSUMOPORPALLET = "" . $r['CONSUMO_PALLET_DFICHA'];
            $PALLETCARGA = "" . $r['PALLET_CARGA_DFICHA'];
            $CONSUMOCONTENEDOR = "" . $r['CONSUMO_CONTENEDOR_DFICHA'];
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }
    if ($OP == "eliminar") {
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $MENSAJE = "ESTA SEGURO DE ELIMINAR EL REGISTRO, PARA CONFIRMAR PRESIONE ELIMINAR";
        $ARRAYDFICHA = $DFICHA_ADO->verDFicha($IDOP);
        foreach ($ARRAYDFICHA as $r) :
            $PRODUCTO = "" . $r['ID_PRODUCTO'];
            $ARRAYVERPRODUCTO = $PRODUCTO_ADO->verProducto($PRODUCTO);
            if ($ARRAYVERPRODUCTO) {
                $ARRAYVERFAMILIA = $FAMILIA_ADO->verFamilia($ARRAYVERPRODUCTO[0]["ID_FAMILIA"]);
                if ($ARRAYVERFAMILIA) {
                    $FAMILIAV = $ARRAYVERFAMILIA[0]["NOMBRE_FAMILIA"];
                }
                $ARRAYVERSUBFAMILIA = $SUBFAMILIA_ADO->verSubfamilia($ARRAYVERPRODUCTO[0]["ID_SUBFAMILIA"]);
                if ($ARRAYVERSUBFAMILIA) {
                    $SUBFAMILIAV = $ARRAYVERSUBFAMILIA[0]["NOMBRE_SUBFAMILIA"];
                }
                $ARRAYVERTUMEDIDA = $TUMEDIDA_ADO->verTumedida($ARRAYVERPRODUCTO[0]["ID_TUMEDIDA"]);
                if ($ARRAYVERTUMEDIDA) {
                    $TUMEDIDAV = $ARRAYVERTUMEDIDA[0]["NOMBRE_TUMEDIDA"];
                }
            }
            $FACTORCONSUMO = "" . $r['FACTOR_CONSUMO_DFICHA'];
            $CONSUMOPORPALLET = "" . $r['CONSUMO_PALLET_DFICHA'];
            $PALLETCARGA = "" . $r['PALLET_CARGA_DFICHA'];
            $CONSUMOCONTENEDOR = "" . $r['CONSUMO_CONTENEDOR_DFICHA'];
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }
}
if (isset($_POST)) {

    if (isset($_REQUEST['PRODUCTO'])) {
        $PRODUCTO = "" . $_REQUEST['PRODUCTO'];
        $ARRAYVERPRODUCTO = $PRODUCTO_ADO->verProducto($PRODUCTO);
        if ($ARRAYVERPRODUCTO) {
            $ARRAYVERFAMILIA = $FAMILIA_ADO->verFamilia($ARRAYVERPRODUCTO[0]["ID_FAMILIA"]);
            if ($ARRAYVERFAMILIA) {
                $FAMILIAV = $ARRAYVERFAMILIA[0]["NOMBRE_FAMILIA"];
            }
            $ARRAYVERSUBFAMILIA = $SUBFAMILIA_ADO->verSubfamilia($ARRAYVERPRODUCTO[0]["ID_SUBFAMILIA"]);
            if ($ARRAYVERSUBFAMILIA) {
                $SUBFAMILIAV = $ARRAYVERSUBFAMILIA[0]["NOMBRE_SUBFAMILIA"];
            }
            $ARRAYVERTUMEDIDA = $TUMEDIDA_ADO->verTumedida($ARRAYVERPRODUCTO[0]["ID_TUMEDIDA"]);
            if ($ARRAYVERTUMEDIDA) {
                $TUMEDIDAV = $ARRAYVERTUMEDIDA[0]["NOMBRE_TUMEDIDA"];
            }
        }
    }
    if (isset($_REQUEST['FACTORCONSUMO'])) {
        $FACTORCONSUMO = "" . $_REQUEST['FACTORCONSUMO'];
    }
    if (isset($_REQUEST['ENVASEESTANDAR'])) {
        $ENVASEESTANDAR = "" . $_REQUEST['ENVASEESTANDAR'];
    }
    if (isset($_REQUEST['PALLETCARGA'])) {
        $PALLETCARGA = "" . $_REQUEST['PALLETCARGA'];
    }
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Detalle Orden </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../../assest/config/urlHead.php"; ?>
        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
                function validacion() {


                    PRODUCTO = document.getElementById("PRODUCTO").selectedIndex;
                    FACTORCONSUMO = document.getElementById("FACTORCONSUMO").value;
                    PALLETCARGA = document.getElementById("PALLETCARGA").value;


                    document.getElementById('val_producto').innerHTML = "";
                    document.getElementById('val_fconsumo').innerHTML = "";
                    document.getElementById('val_palletcarga').innerHTML = "";

                    if (PRODUCTO == null || PRODUCTO == 0) {
                        document.form_reg_dato.PRODUCTO.focus();
                        document.form_reg_dato.PRODUCTO.style.borderColor = "#FF0000";
                        document.getElementById('val_producto').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.PRODUCTO.style.borderColor = "#4AF575";

                    if (FACTORCONSUMO == null || FACTORCONSUMO.length == 0 || /^\s+$/.test(FACTORCONSUMO)) {
                        document.form_reg_dato.FACTORCONSUMO.focus();
                        document.form_reg_dato.FACTORCONSUMO.style.borderColor = "#FF0000";
                        document.getElementById('val_fconsumo').innerHTML = "NO HA INGRESADO DATOS";
                        return false;
                    }
                    document.form_reg_dato.FACTORCONSUMO.style.borderColor = "#4AF575";

                    if (FACTORCONSUMO == 0) {
                        document.form_reg_dato.FACTORCONSUMO.focus();
                        document.form_reg_dato.FACTORCONSUMO.style.borderColor = "#FF0000";
                        document.getElementById('val_fconsumo').innerHTML = "TIENE QUE SER MAYOR A CERO";
                        return false;
                    }
                    document.form_reg_dato.FACTORCONSUMO.style.borderColor = "#4AF575";

                    if (PALLETCARGA == null || PALLETCARGA.length == 0 || /^\s+$/.test(PALLETCARGA)) {
                        document.form_reg_dato.PALLETCARGA.focus();
                        document.form_reg_dato.PALLETCARGA.style.borderColor = "#FF0000";
                        document.getElementById('val_palletcarga').innerHTML = "NO HA INGRESADO DATOS";
                        return false;
                    }
                    document.form_reg_dato.PALLETCARGA.style.borderColor = "#4AF575";


                    if (PALLETCARGA == 0) {
                        document.form_reg_dato.PALLETCARGA.focus();
                        document.form_reg_dato.PALLETCARGA.style.borderColor = "#FF0000";
                        document.getElementById('val_palletcarga').innerHTML = "TIENE QUE SER MAYOR A CERO";
                        return false;
                    }
                    document.form_reg_dato.PALLETCARGA.style.borderColor = "#4AF575";

                }

                function consumo() {
                    var consumoenvase;
                    var consumopallet;
                    var consumocarga;
                    FACTORCONSUMO = document.getElementById("FACTORCONSUMO").value;
                    PALLETCARGA = document.getElementById("PALLETCARGA").value;
                    document.getElementById('val_fconsumo').innerHTML = "";
                    document.getElementById('val_palletcarga').innerHTML = "";

                    if (FACTORCONSUMO == null || FACTORCONSUMO.length == 0 || /^\s+$/.test(FACTORCONSUMO)) {
                        document.form_reg_dato.FACTORCONSUMO.focus();
                        document.form_reg_dato.FACTORCONSUMO.style.borderColor = "#FF0000";
                        document.getElementById('val_fconsumo').innerHTML = "NO HA INGRESADO DATOS";
                        repuesta = 1;
                    } else {
                        repuesta = 0;
                        document.form_reg_dato.FACTORCONSUMO.style.borderColor = "#4AF575";
                    }
                    if (FACTORCONSUMO == 0) {
                        document.form_reg_dato.FACTORCONSUMO.focus();
                        document.form_reg_dato.FACTORCONSUMO.style.borderColor = "#FF0000";
                        document.getElementById('val_fconsumo').innerHTML = "TIENE QUE SER MAYOR A CERO";
                        repuesta = 1;
                    } else {
                        repuesta = 0;
                        document.form_reg_dato.FACTORCONSUMO.style.borderColor = "#4AF575";
                    }
                    if (PALLETCARGA == null || PALLETCARGA.length == 0 || /^\s+$/.test(PALLETCARGA)) {
                        document.form_reg_dato.PALLETCARGA.focus();
                        document.form_reg_dato.PALLETCARGA.style.borderColor = "#FF0000";
                        document.getElementById('val_palletcarga').innerHTML = "NO HA INGRESADO DATOS";
                        repuesta = 1;
                    } else {
                        repuesta = 0;
                        document.form_reg_dato.PALLETCARGA.style.borderColor = "#4AF575";
                    }
                    if (PALLETCARGA == 0) {
                        document.form_reg_dato.PALLETCARGA.focus();
                        document.form_reg_dato.PALLETCARGA.style.borderColor = "#FF0000";
                        document.getElementById('val_palletcarga').innerHTML = "TIENE QUE SER MAYOR A CERO";
                        repuesta = 1;
                    } else {
                        repuesta = 0;
                        document.form_reg_dato.PALLETCARGA.style.borderColor = "#4AF575";
                    }

                    if (repuesta == 0) {
                        ENVASEESTANDARV = parseInt(document.getElementById("ENVASEESTANDARV").value);

                        consumopallet = ENVASEESTANDARV * FACTORCONSUMO;
                        consumocarga = consumopallet * PALLETCARGA;

                        consumopallet = consumopallet.toFixed(2);
                        consumocarga = consumocarga.toFixed(2);
                        //.toLocaleString()

                    }
                    document.getElementById('CONSUMOPORPALLETV').value = consumopallet;
                    document.getElementById('CONSUMOCONTENEDORV').value = consumocarga;
                    /*
                        document.getElementById('CONSUMOPORPALLET').value = consumopallet;
                        document.getElementById('CONSUMOCONTENEDOR').value = consumocarga;
                    */

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
            <?php include_once "../../assest/config/menuExpo.php";
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
                                            <li class="breadcrumb-item" aria-current="page">Ficha</li>
                                            <li class="breadcrumb-item" aria-current="page">Detalle</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Registro Detalle </a> </li>
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
                                <div class="box-header with-border">
                                    <!--
                                        <h4 class="box-title">Different Width</h4>
                                        -->
                                </div>
                                <div class="box-body ">
                                    <div class="row">
                                        <div class=" col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Producto</label>
                                                <input type="hidden" class="form-control" placeholder="ID DFICHA" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID FICHA" id="IDP" name="IDP" value="<?php echo $IDP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="OP FICHA" id="OPP" name="OPP" value="<?php echo $OPP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="URL FICHA" id="URLO" name="URLO" value="<?php echo $URLO; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTA" name="PLANTA" value="<?php echo $PLANTAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADAS; ?>" />

                                                <input type="hidden" class="form-control" placeholder="PRODUCTOE" id="PRODUCTOE" name="PRODUCTOE" value="<?php echo $PRODUCTO; ?>" />
                                                <select class="form-control select2" id="PRODUCTO" name="PRODUCTO" style="width: 100%;" onchange="this.form.submit()" <?php echo $DISABLED; ?>>
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
                                                <label>Familia</label>
                                                <input type="hidden" class="form-control" placeholder="FAMILIA" id="FAMILIA" name="FAMILIA" value="<?php echo $FAMILIA; ?>" />
                                                <input type="text" class="form-control" placeholder="Familia" id="FAMILIAV" name="FAMILIAV" value="<?php echo $FAMILIAV; ?>" disabled />
                                                <label id="val_familia" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Sub Familia</label>
                                                <input type="hidden" class="form-control" placeholder="SUBFAMILIA" id="SUBFAMILIA" name="PRODUCTOE" value="<?php echo $SUBFAMILIA; ?>" />
                                                <input type="text" class="form-control" placeholder="Sub Familia" id="SUBFAMILIAV" name="SUBFAMILIAV" value="<?php echo $SUBFAMILIAV; ?>" disabled />
                                                <label id="val_subfamilia" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Unidad Medida </label>
                                                <input type="hidden" class="form-control" placeholder="TUMEDIDA" id="TUMEDIDA" name="TUMEDIDA" value="<?php echo $TUMEDIDA; ?>" />
                                                <input type="text" class="form-control" placeholder="Unidad Medida" id="TUMEDIDAV" name="TUMEDIDAV" value="<?php echo $TUMEDIDAV; ?>" disabled />
                                                <label id="val_umedida" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Factor Consumo </label>
                                                <input type="hidden" class="form-control" placeholder="FACTORCONSUMOE" id="FACTORCONSUMOE" name="FACTORCONSUMOE" value="<?php echo $FACTORCONSUMO; ?>" />
                                                <input type="number" step="0.00001" class="form-control" placeholder="Factor Consumo" onchange="consumo()" id="FACTORCONSUMO" name="FACTORCONSUMO" value="<?php echo $FACTORCONSUMO; ?>" <?php echo $DISABLED; ?> />
                                                <label id="val_fconsumo" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Envase Estandar</label>
                                                <input type="hidden" class="form-control" placeholder="ENVASEESTANDAR" id="ENVASEESTANDAR" name="ENVASEESTANDAR" value="<?php echo $ENVASEESTANDAR; ?>" />
                                                <input type="number" step="0.01" class="form-control" placeholder="Envase Estandar" id="ENVASEESTANDARV" name="ENVASEESTANDARV" value="<?php echo $ENVASEESTANDAR; ?>" disabled />
                                                <label id="val_envaseestandar" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Consumo Por Pallet </label>
                                                <input type="hidden" class="form-control" placeholder="CONSUMOPORPALLET" id="CONSUMOPORPALLET" name="CONSUMOPORPALLET" value="<?php echo $CONSUMOPORPALLET; ?>" />
                                                <input type="number" step="0.01" class="form-control" placeholder="Consumo Por Pallet" id="CONSUMOPORPALLETV" name="CONSUMOPORPALLETV" value="<?php echo $CONSUMOPORPALLET; ?>" disabled />
                                                <label id="val_consumopallet" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Pallet Por Carga </label>
                                                <input type="hidden" class="form-control" placeholder="PALLETCARGAE" id="PALLETCARGAE" name="PALLETCARGAE" value="<?php echo $PALLETCARGA; ?>" />
                                                <input type="number" step="0.01" class="form-control" placeholder="Factor Consumo" onchange="consumo()" id="PALLETCARGA" name="PALLETCARGA" value="<?php echo $PALLETCARGA; ?>" <?php echo $DISABLED; ?> />
                                                <label id="val_palletcarga" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Consumo Por Contenedor </label>
                                                <input type="hidden" class="form-control" placeholder="CONSUMOPORPALLET" id="CONSUMOCONTENEDOR" name="CONSUMOCONTENEDOR" value="<?php echo $CONSUMOCONTENEDOR; ?>" />
                                                <input type="number" step="0.01" class="form-control" placeholder="Consumo Por Pallet" id="CONSUMOCONTENEDORV" name="CONSUMOCONTENEDORV" value="<?php echo $CONSUMOCONTENEDOR; ?>" disabled />
                                                <label id="val_consumocontenedor" class="validacion"> </label>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Requerimientos Especiales </label>
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
                                            <button type="button" class="btn  btn-success  " data-toggle="tooltip" title="Volver" name="CANCELAR" value="CANCELAR" Onclick="irPagina('<?php echo $URLO; ?>.php?op&id=<?php echo $id_dato; ?>&a=<?php echo $accion_dato; ?>&urlo=<?php echo $urlo_dato; ?>');">
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
                <?php include_once "../../assest/config/menuExtraExpo.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../../assest/config/urlBase.php"; ?>
        <?php        
            //OPERACIONES
            //OPERACION DE REGISTRO DE FILA
            if (isset($_REQUEST['CREAR'])) {

                if ($_REQUEST['FACTORCONSUMO'] > 0) {
                    $CONSUMOPORENVASE = $_REQUEST['FACTORCONSUMO'];
                    $CONSUMOPORPALLET = $CONSUMOPORENVASE * $_REQUEST['ENVASEESTANDAR'];
                    if ($_REQUEST['PALLETCARGA'] > 0) {
                        $CONSUMOCONTENEDOR = $_REQUEST['PALLETCARGA'] * $CONSUMOPORPALLET;
                    }
                }

                $DFICHA->__SET('FACTOR_CONSUMO_DFICHA', $_REQUEST['FACTORCONSUMO']);
                $DFICHA->__SET('CONSUMO_PALLET_DFICHA', $CONSUMOPORPALLET);
                $DFICHA->__SET('PALLET_CARGA_DFICHA', $_REQUEST['PALLETCARGA']);
                $DFICHA->__SET('CONSUMO_CONTENEDOR_DFICHA', $CONSUMOCONTENEDOR);
                $DFICHA->__SET('OBSERVACIONES_DFICHA', $_REQUEST['PRODUCTO']);
                $DFICHA->__SET('ID_PRODUCTO', $_REQUEST['PRODUCTO']);
                $DFICHA->__SET('ID_FICHA', $_REQUEST['IDP']);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $DFICHA_ADO->agregarDFicha($DFICHA);
                $AUSUARIO_ADO->agregarAusuario2("NULL",3, 1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de detalle de ficha","material_dficha","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );

                //REDIRECCIONAR A PAGINA registroRecepcion.php 
                $id_dato =  $_REQUEST['IDP'];
                $accion_dato =  $_REQUEST['OPP'];
                echo '<script>
                        Swal.fire({
                            icon:"success",
                            title:"Registro creado",
                            text:"El registro del detalle de Ficha se ha creado correctamente",
                            showConfirmButton:true,
                            confirmButtonText:"Volver a Ficha"
                        }).then((result)=>{
                            location.href ="' . $_REQUEST['URLO'] . '.php?op&id='.$id_dato.'&a='.$accion_dato.'&urlo='.$urlo_dato.'&idd='.$idd_dato.'&ad='.$acciond_dato.'";                            
                        })
                    </script>';

            }
            if (isset($_REQUEST['EDITAR'])) {

                if ($_REQUEST['FACTORCONSUMO'] > 0) {
                    $CONSUMOPORENVASE = $_REQUEST['FACTORCONSUMO'];
                    $CONSUMOPORPALLET = $CONSUMOPORENVASE * $_REQUEST['ENVASEESTANDAR'];
                    if ($_REQUEST['PALLETCARGA'] > 0) {
                        $CONSUMOCONTENEDOR = $_REQUEST['PALLETCARGA'] * $CONSUMOPORPALLET;
                    }
                }

                $DFICHA->__SET('FACTOR_CONSUMO_DFICHA', $_REQUEST['FACTORCONSUMO']);
                $DFICHA->__SET('CONSUMO_PALLET_DFICHA', $CONSUMOPORPALLET);
                $DFICHA->__SET('PALLET_CARGA_DFICHA', $_REQUEST['PALLETCARGA']);
                $DFICHA->__SET('CONSUMO_CONTENEDOR_DFICHA', $CONSUMOCONTENEDOR);
                $DFICHA->__SET('OBSERVACIONES_DFICHA', $_REQUEST['PRODUCTO']);
                $DFICHA->__SET('ID_PRODUCTO', $_REQUEST['PRODUCTO']);
                $DFICHA->__SET('ID_FICHA', $_REQUEST['IDP']);
                $DFICHA->__SET('ID_DFICHA', $_REQUEST['ID']);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $DFICHA_ADO->actualizarDFicha($DFICHA);
                $AUSUARIO_ADO->agregarAusuario2("NULL",3, 2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de detalle de ficha","material_dficha",$_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );

                $id_dato =  $_REQUEST['IDP'];
                $accion_dato =  $_REQUEST['OPP'];


                echo '<script>
                Swal.fire({
                    icon:"success",
                    title:"Registro editado",
                    text:"El registro del detalle de Fichase ha modificada correctamente",
                    showConfirmButton: true,
                    confirmButtonText:"Volver a Ficha",
                    closeOnConfirm:false
                }).then((result)=>{
                    location.href="' . $_REQUEST['URLO'] . '.php?op&id='.$id_dato.'&a='.$accion_dato.'&urlo='.$urlo_dato.'&idd='.$idd_dato.'&ad='.$acciond_dato.'";                        
                })
            </script>';

            }
            if (isset($_REQUEST['ELIMINAR'])) {

                $DFICHA->__SET('ID_DFICHA', $_REQUEST['ID']);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $DFICHA_ADO->deshabilitar($DFICHA);
                $AUSUARIO_ADO->agregarAusuario2("NULL",3, 3,"".$_SESSION["NOMBRE_USUARIO"].", Deshabilitar de detalle de ficha","material_dficha",$_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );
                $id_dato =  $_REQUEST['IDP'];
                $accion_dato =  $_REQUEST['OPP'];
                echo '<script>
                    Swal.fire({
                        icon:"error",
                        title:"Registro Eliminado",
                        text:"El registro del detalle de Fichase se ha eliminado correctamente ",
                        showConfirmButton:true,
                        confirmButtonText:"Volver a Ficha"
                    }).then((result)=>{
                        location.href ="' . $_REQUEST['URLO'] . '.php?op&id='.$id_dato.'&a='.$accion_dato.'&urlo='.$urlo_dato.'&idd='.$idd_dato.'&ad='.$acciond_dato.'";                        
                    })
                </script>'; 
            }
        ?>
</body>

</html>