<?php

include_once "../../assest/config/validarUsuarioExpo.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/ESPECIES_ADO.php';
include_once '../../assest/controlador/PRODUCTO_ADO.php';


include_once '../../assest/controlador/ERECEPCION_ADO.php';
include_once '../../assest/modelo/ERECEPCION.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$ESPECIES_ADO =  new ESPECIES_ADO();
$PRODUCTO_ADO =  new PRODUCTO_ADO();

$ERECEPCION_ADO =  new ERECEPCION_ADO();
//INIICIALIZAR MODELO
$ERECEPCION =  new ERECEPCION();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$NOMBREESTANDAR = "";
$CODIGOESTANDAR = "";
$ENVASEESTANDAR = "";
$PESOENVASEESTANDAR = "";
$PESOPALLETESTANDAR = "";
$ESPECIES = "";
$ESTADO = "";
$PRODUCTO="";
$TRATAMIENTO1="";
$TRATAMIENTO2="";
$IDOP = "";
$OP = "";
$DISABLED = "";
$CONTADOR=0;

//INICIALIZAR ARREGLOS
$ARRAYESTANDAR = "";
$ARRAYESTANDARID = "";
$ARRAYPRODUCTO="";
$ARRAYESPECIES = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYESTANDAR = $ERECEPCION_ADO->listarEstandarPorEmpresaCBX($EMPRESAS);
$ARRAYPRODUCTO= $PRODUCTO_ADO->listarProductoPorEmpresaCBX($EMPRESAS, $TEMPORADAS);
$ARRAYESPECIES = $ESPECIES_ADO->listarEspeciesCBX();
include_once "../../assest/config/validarDatosUrl.php";
include_once "../../assest/config/datosUrl.php";

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

//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION Y VISUALIZACION
//PREGUNTA SI LA URL VIENE  CON DATOS "parametro" y "parametro1"
if (isset($id_dato) && isset($accion_dato)) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $id_dato;
    $OP = $accion_dato;


    //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
    //ALMACENAR INFORMACION EN ARREGLO
    //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
    //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
    $ARRAYESTANDARID = $ERECEPCION_ADO->verEstandar($IDOP);


    //IDENTIFICACIONES DE OPERACIONES    //OPERACION DE CAMBIO DE ESTADO
    //0 = DESACTIVAR
    if ($OP == "0") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION
        $DISABLED = "disabled";
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYESTANDARID as $r) :

            $CODIGOESTANDAR = "" . $r['CODIGO_ESTANDAR'];
            $NOMBREESTANDAR = "" . $r['NOMBRE_ESTANDAR'];
            $ENVASEESTANDAR = "" . $r['CANTIDAD_ENVASE_ESTANDAR'];
            $PESOENVASEESTANDAR = "" . $r['PESO_ENVASE_ESTANDAR'];
            $PESOPALLETESTANDAR = "" . $r['PESO_PALLET_ESTANDAR'];
            $TRATAMIENTO1 = "" . $r['TRATAMIENTO1'];
            $TRATAMIENTO2 = "" . $r['TRATAMIENTO2'];
            $ESPECIES = "" . $r['ID_ESPECIES'];
            $PRODUCTO = "" . $r['ID_PRODUCTO'];

        endforeach;

    }
    //1 = ACTIVAR
    if ($OP == "1") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION
        $DISABLED = "disabled";
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYESTANDARID as $r) :

            $CODIGOESTANDAR = "" . $r['CODIGO_ESTANDAR'];
            $NOMBREESTANDAR = "" . $r['NOMBRE_ESTANDAR'];
            $ENVASEESTANDAR = "" . $r['CANTIDAD_ENVASE_ESTANDAR'];
            $PESOENVASEESTANDAR = "" . $r['PESO_ENVASE_ESTANDAR'];
            $PESOPALLETESTANDAR = "" . $r['PESO_PALLET_ESTANDAR'];
            $TRATAMIENTO1 = "" . $r['TRATAMIENTO1'];
            $TRATAMIENTO2 = "" . $r['TRATAMIENTO2'];
            $ESPECIES = "" . $r['ID_ESPECIES'];
            $PRODUCTO = "" . $r['ID_PRODUCTO'];

        endforeach;

    }
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA


        foreach ($ARRAYESTANDARID as $r) :
            $CODIGOESTANDAR = "" . $r['CODIGO_ESTANDAR'];
            $NOMBREESTANDAR = "" . $r['NOMBRE_ESTANDAR'];
            $ENVASEESTANDAR = "" . $r['CANTIDAD_ENVASE_ESTANDAR'];
            $PESOENVASEESTANDAR = "" . $r['PESO_ENVASE_ESTANDAR'];
            $PESOPALLETESTANDAR = "" . $r['PESO_PALLET_ESTANDAR'];
            $TRATAMIENTO1 = "" . $r['TRATAMIENTO1'];
            $TRATAMIENTO2 = "" . $r['TRATAMIENTO2'];
            $ESPECIES = "" . $r['ID_ESPECIES'];
            $PRODUCTO = "" . $r['ID_PRODUCTO'];
        endforeach;
    }

    //ver =  OBTENCION DE DATOS PARA LA VISUALIZAAR INFORMAICON DE REGISTRO
    if ($OP == "ver") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION
        $DISABLED = "disabled";
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYESTANDARID as $r) :

            $CODIGOESTANDAR = "" . $r['CODIGO_ESTANDAR'];
            $NOMBREESTANDAR = "" . $r['NOMBRE_ESTANDAR'];
            $ENVASEESTANDAR = "" . $r['CANTIDAD_ENVASE_ESTANDAR'];
            $PESOENVASEESTANDAR = "" . $r['PESO_ENVASE_ESTANDAR'];
            $PESOPALLETESTANDAR = "" . $r['PESO_PALLET_ESTANDAR'];
            $TRATAMIENTO1 = "" . $r['TRATAMIENTO1'];
            $TRATAMIENTO2 = "" . $r['TRATAMIENTO2'];
            $ESPECIES = "" . $r['ID_ESPECIES'];
            $PRODUCTO = "" . $r['ID_PRODUCTO'];

        endforeach;
    }
}




?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Estandar Recepcion</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../../assest/config/urlHead.php"; ?>
        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
                //VALIDACION DE FORMULARIO
                function validacion() {

                    CODIGOESTANDAR = document.getElementById("CODIGOESTANDAR").value;
                    NOMBREESTANDAR = document.getElementById("NOMBREESTANDAR").value;
                    ENVASEESTANDAR = document.getElementById("ENVASEESTANDAR").value;
                    PESOPALLETESTANDAR = document.getElementById("PESOPALLETESTANDAR").value;
                    PESOENVASEESTANDAR = document.getElementById("PESOENVASEESTANDAR").value;
                    TRATAMIENTO1 = document.getElementById("TRATAMIENTO1").selectedIndex;
                    TRATAMIENTO2 = document.getElementById("TRATAMIENTO2").selectedIndex;
                    ESPECIES = document.getElementById("ESPECIES").selectedIndex;
                    PRODUCTO = document.getElementById("PRODUCTO").selectedIndex;


                    document.getElementById('val_codigo').innerHTML = "";
                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_cajapee').innerHTML = "";
                    document.getElementById('val_envase').innerHTML = "";
                    document.getElementById('val_pallet').innerHTML = "";
                    document.getElementById('val_tratamiento1').innerHTML = "";
                    document.getElementById('val_tratamiento2').innerHTML = "";
                    document.getElementById('val_especies').innerHTML = "";
                    document.getElementById('val_producto').innerHTML = "";

                    if (CODIGOESTANDAR == null || CODIGOESTANDAR == 0) {
                        document.form_reg_dato.CODIGOESTANDAR.focus();
                        document.form_reg_dato.CODIGOESTANDAR.style.borderColor = "#FF0000";
                        document.getElementById('val_codigo').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.CODIGOESTANDAR.style.borderColor = "#4AF575";

                    if (NOMBREESTANDAR == null || NOMBREESTANDAR == 0) {
                        document.form_reg_dato.NOMBREESTANDAR.focus();
                        document.form_reg_dato.NOMBREESTANDAR.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBREESTANDAR.style.borderColor = "#4AF575";

                    if (ENVASEESTANDAR == null || ENVASEESTANDAR == "") {
                        document.form_reg_dato.ENVASEESTANDAR.focus();
                        document.form_reg_dato.ENVASEESTANDAR.style.borderColor = "#FF0000";
                        document.getElementById('val_cajapee').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.ENVASEESTANDAR.style.borderColor = "#4AF575";


                    if (PESOENVASEESTANDAR == null || PESOENVASEESTANDAR == "" || PESOENVASEESTANDAR < 0) {
                        document.form_reg_dato.PESOENVASEESTANDAR.focus();
                        document.form_reg_dato.PESOENVASEESTANDAR.style.borderColor = "#FF0000";
                        document.getElementById('val_envase').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.PESOENVASEESTANDAR.style.borderColor = "#4AF575";


                    if (PESOPALLETESTANDAR == null || PESOPALLETESTANDAR == "" || PESOPALLETESTANDAR < 0) {
                        document.form_reg_dato.PESOPALLETESTANDAR.focus();
                        document.form_reg_dato.PESOPALLETESTANDAR.style.borderColor = "#FF0000";
                        document.getElementById('val_pallet').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.PESOPALLETESTANDAR.style.borderColor = "#4AF575";



                    if (TRATAMIENTO1 == null || TRATAMIENTO1 == 0) {
                        document.form_reg_dato.TRATAMIENTO1.focus();
                        document.form_reg_dato.TRATAMIENTO1.style.borderColor = "#FF0000";
                        document.getElementById('val_tratamiento1').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.TRATAMIENTO1.style.borderColor = "#4AF575";

                    if (TRATAMIENTO2 == null || TRATAMIENTO2 == 0) {
                        document.form_reg_dato.TRATAMIENTO2.focus();
                        document.form_reg_dato.TRATAMIENTO2.style.borderColor = "#FF0000";
                        document.getElementById('val_tratamiento2').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.TRATAMIENTO2.style.borderColor = "#4AF575";                      
  
                    if (ESPECIES == null || ESPECIES == 0) {
                        document.form_reg_dato.ESPECIES.focus();
                        document.form_reg_dato.ESPECIES.style.borderColor = "#FF0000";
                        document.getElementById('val_especies').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.ESPECIES.style.borderColor = "#4AF575";
                    
                    if (PRODUCTO == null || PRODUCTO == 0) {
                        document.form_reg_dato.PRODUCTO.focus();
                        document.form_reg_dato.PRODUCTO.style.borderColor = "#FF0000";
                        document.getElementById('val_producto').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.PRODUCTO.style.borderColor = "#4AF575";


                }
                //REDIRECCIONAR A LA PAGINA SELECIONADA
                function irPagina(url) {
                    location.href = "" + url;
                }

                
            </script>

</head>

<body class="hold-transition light-skin  sidebar-mini theme-primary" >
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <?php include_once "../../assest/config/menuExpo.php"; ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="container-full">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Estandar </h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Mantenedores </li>
                                            <li class="breadcrumb-item" aria-current="page">Estandar </li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Registro Estandar Recepcion </a> </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <?php include_once "../../assest/config/verIndicadorEconomico.php"; ?>
                        </div>
                    </div>

                    <!-- Main content -->
                    <section class="content">
                        <div class="row">
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                <div class="box">
                                    <div class="box-header with-border bg-primary">                                          
                                        <h4 class="box-title">Registro Estandar Recepción</h4>                                          
                                    </div>
                                    <!-- /.box-header -->
                                    <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato" >
                                        <div class="box-body">
                                            <hr class="my-15">
                                            <div class="row">
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Codigo </label>
                                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                        <input type="hidden" class="form-control" placeholder="EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                        <input type="text" class="form-control" placeholder="Codigo Estandar" id="CODIGOESTANDAR" name="CODIGOESTANDAR" value="<?php echo $CODIGOESTANDAR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_codigo" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Nombre </label>
                                                        <input type="text" class="form-control" placeholder="Nombre Estandar" id="NOMBREESTANDAR" name="NOMBREESTANDAR" value="<?php echo $NOMBREESTANDAR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nombre" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Cantidad Envase</label>
                                                        <input type="number" class="form-control" placeholder="Cantidad Envase Estandar" id="ENVASEESTANDAR" name="ENVASEESTANDAR" value="<?php echo $ENVASEESTANDAR ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_cajapee" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Peso Envase</label>
                                                        <input type="number"  step="0.00001" class="form-control" placeholder="Peso Envase Estandar" id="PESOENVASEESTANDAR" name="PESOENVASEESTANDAR" value="<?php echo $PESOENVASEESTANDAR ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_envase" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Peso Pallet</label>
                                                        <input type="number" class="form-control" step="0.01" placeholder="Peso Envase Estandar" id="PESOPALLETESTANDAR" name="PESOPALLETESTANDAR" value="<?php echo $PESOPALLETESTANDAR ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_pallet" class="validacion"> </label>
                                                    </div>
                                                </div>                      
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label> Especies</label>
                                                        <select class="form-control select2" id="ESPECIES" name="ESPECIES" style="width: 100%;" value="<?php echo $ESPECIES; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYESPECIES as $r) : ?>
                                                                <?php if ($ARRAYESPECIES) {    ?>
                                                                    <option value="<?php echo $r['ID_ESPECIES']; ?>" <?php if ($ESPECIES == $r['ID_ESPECIES']) { echo "selected"; } ?>>
                                                                        <?php echo $r['NOMBRE_ESPECIES'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No hay Datos Registrados</option>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_especies" class="validacion"> </label>
                                                    </div>
                                                </div> 
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Mostrar Gasificación</label>
                                                        <select class="form-control select2" id="TRATAMIENTO1" name="TRATAMIENTO1" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <option value="0" <?php if ($TRATAMIENTO1 == "0") { echo "selected";  } ?>>No</option>
                                                            <option value="1" <?php if ($TRATAMIENTO1 == "1") { echo "selected"; } ?>> Si </option>
                                                        </select>
                                                        <label id="val_tratamiento1" class="validacion"> </label>
                                                    </div>
                                                </div>                         
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Tratamineto 2</label>
                                                        <select class="form-control select2" id="TRATAMIENTO2" name="TRATAMIENTO2" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <option value="0" <?php if ($TRATAMIENTO2 == "0") { echo "selected";  } ?>>No</option>
                                                            <option value="1" <?php if ($TRATAMIENTO2 == "1") { echo "selected"; } ?>> Si </option>
                                                        </select>
                                                        <label id="val_tratamiento2" class="validacion"> </label>
                                                    </div>
                                                </div>                          
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label> Producto</label>
                                                        <select class="form-control select2" id="PRODUCTO" name="PRODUCTO" style="width: 100%;" value="<?php echo $PRODUCTO; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYPRODUCTO as $r) : ?>
                                                                <?php if ($ARRAYPRODUCTO) {    ?>
                                                                    <option value="<?php echo $r['ID_PRODUCTO']; ?>" <?php if ($PRODUCTO == $r['ID_PRODUCTO']) { echo "selected"; } ?>>
                                                                        <?php echo $r['NOMBRE_PRODUCTO'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No hay Datos Registrados</option>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_producto" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <div class="btn-group   col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12 " role="group" aria-label="Acciones generales">                                    
                                                <button type="button" class="btn  btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroErecepcion.php');">
                                                    <i class="ti-trash"></i>Cancelar
                                                </button>
                                                <?php if ($OP == "editar") { ?>
                                                    <button type="submit" class="btn btn-primary" name="EDITAR" value="EDITAR"   data-toggle="tooltip" title="Guardar" Onclick="return validacion()">
                                                        <i class="ti-save-alt"></i> Guardar
                                                    </button>
                                                <?php } else if($OP == "0") { ?>
                                                    <button type="submit" class="btn btn-danger" name="ELIMINAR" value="ELIMINAR"  data-toggle="tooltip" title="Deshabilitar"  >
                                                        <i class="ti-save-alt"></i> Deshabilitar
                                                    </button>
                                                <?php } else if($OP == "1"){ ?>                                                    
                                                    <button type="submit" class="btn btn-success" name="HABILITAR" value="HABILITAR"  data-toggle="tooltip" title="Habilitar"   >
                                                        <i class="ti-save-alt"></i> Habilitar
                                                    </button>
                                                <?php } else { ?>
                                                    <button type="submit" class="btn btn-primary" name="GUARDAR" value="GUARDAR"  data-toggle="tooltip" title="Guardar"  <?php echo $DISABLED; ?> Onclick="return validacion()">
                                                        <i class="ti-save-alt"></i> Guardar
                                                    </button>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.box -->
                            </div>
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                <div class="box">
                                    <div class="box-header with-borde bg-info">
                                        <h4 class="box-title"> Agrupado Estandar Recepcion</h4>
                                    </div>
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <table id="listar" class="table-hover " style="width: 100%;">
                                                <thead>
                                                    <tr class="center">
                                                        <th>Numero </th>
                                                        <th>Operaciones</th>
                                                        <th>Codigo </th>
                                                        <th>Nombre </th>
                                                        <th>Cantidad Envase </th>
                                                        <th>Peso Envase </th>
                                                        <th>Peso Pallet </th>
                                                        <th>Especies </th>
                                                        <th>Tratamiento 1 </th>
                                                        <th>Tratamiento 2 </th>
                                                        <th>Producto </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYESTANDAR as $r) : ?>
                                                            <?php 
                                                            $CONTADOR+=1;  
                                                            $ARRAYVERESPECIES=$ESPECIES_ADO->verEspecies($r["ID_ESPECIES"]);
                                                            if($ARRAYVERESPECIES){
                                                                $NOMBREESPECIES = $ARRAYVERESPECIES[0]["NOMBRE_ESPECIES"];
                                                            }else{
                                                                $NOMBREESPECIES="Sin Datos";
                                                            }
                                                            $ARRAYVERPRODUCTO=$PRODUCTO_ADO->verProducto($r["ID_PRODUCTO"]);
                                                            if($ARRAYVERPRODUCTO){
                                                                $NOMBREPRODUCTO = $ARRAYVERPRODUCTO[0]["NOMBRE_PRODUCTO"];
                                                            }else{
                                                                $NOMBREPRODUCTO="Sin Datos";
                                                            }                                                            
                                                            if($r["TRATAMIENTO1"]==0){
                                                                $NOMBRETRATAMIENTO1="No Aplica";
                                                            }else if($r["TRATAMIENTO1"]==1){
                                                                $NOMBRETRATAMIENTO1="Si Aplica";
                                                            }else{                                                                
                                                                $NOMBRETRATAMIENTO1="Sin Datos";
                                                            }                                                            
                                                            if($r["TRATAMIENTO2"]==0){
                                                                $NOMBRETRATAMIENTO2="No Aplica";
                                                            }else if($r["TRATAMIENTO2"]==1){
                                                                $NOMBRETRATAMIENTO2="Si Aplica";
                                                            }else{                                                                
                                                                $NOMBRETRATAMIENTO2="Sin Datos";
                                                            }

                                                            ?>
                                                        <tr class="center">
                                                            <td><?php echo $CONTADOR; ?> </td>                                                                                                                                                                 
                                                            <td class="text-center">
                                                                <form method="post" id="form1">
                                                                    <div class="list-icons d-inline-flex">
                                                                        <div class="list-icons-item dropdown">
                                                                            <button class="btn btn-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                <span class="icon-copy ti-settings"></span>
                                                                            </button>
                                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                                <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_ESTANDAR']; ?>" />
                                                                                <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroErecepcion" />
                                                                                <span href="#" class="dropdown-item" data-toggle="tooltip" title="Ver">
                                                                                    <button type="submit" class="btn btn-info btn-block  btn-sm" id="VERURL" name="VERURL">
                                                                                        <i class="ti-eye"></i> Ver
                                                                                    </button>
                                                                                </span> 
                                                                                <span href="#" class="dropdown-item" data-toggle="tooltip" title="Editar">
                                                                                    <button type="submit" class="btn  btn-warning btn-block   btn-sm" id="EDITARURL" name="EDITARURL">
                                                                                        <i class="ti-pencil-alt"></i> Editar
                                                                                    </button>
                                                                                </span>
                                                                                <?php if ($r['ESTADO_REGISTRO'] == 1) { ?>
                                                                                    <span href="#" class="dropdown-item" data-toggle="tooltip" title="Deshabilitar">
                                                                                        <button type="submit" class="btn btn-block btn-danger btn-sm" id="ELIMINARURL" name="ELIMINARURL">
                                                                                            <i class="ti-na "></i> Deshabilitar
                                                                                        </button>
                                                                                    </span>
                                                                                <?php } ?>
                                                                                <?php if ($r['ESTADO_REGISTRO'] == 0) { ?>
                                                                                    <span href="#" class="dropdown-item" data-toggle="tooltip" title="Habilitar">
                                                                                        <button type="submit" class="btn btn-block btn-success btn-sm" id="HABILITARURL" name="HABILITARURL">
                                                                                            <i class="ti-check "></i> Habilitar
                                                                                        </button>
                                                                                    </span>
                                                                                <?php } ?>                                                               
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </td>
                                                            <td><?php echo $r['CODIGO_ESTANDAR']; ?></td>      
                                                            <td><?php echo $r['NOMBRE_ESTANDAR']; ?></td>     
                                                            <td><?php echo $r['CANTIDAD_ENVASE_ESTANDAR']; ?></td>    
                                                            <td><?php echo $r['PESO_ENVASE_ESTANDAR']; ?></td>    
                                                            <td><?php echo $r['PESO_PALLET_ESTANDAR']; ?></td>  
                                                            <td><?php echo $NOMBREESPECIES; ?></td>  
                                                            <td><?php echo $NOMBRETRATAMIENTO1; ?></td>  
                                                            <td><?php echo $NOMBRETRATAMIENTO2; ?></td> 
                                                            <td><?php echo $NOMBREPRODUCTO; ?></td>                                                                  
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box -->
                            </div>
                        </div>
                        <!--.row -->
                    </section>
                    <!-- /.content -->
                </div>
            </div>
            <!-- /.content-wrapper -->

            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php include_once "../../assest/config/footer.php"; ?>
                <?php include_once "../../assest/config/menuExtraExpo.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../../assest/config/urlBase.php"; ?>
        <?php 
                        
            //OPERACIONES
            //OPERACION DE REGISTRO DE FILA
            if (isset($_REQUEST['GUARDAR'])) {

                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO     

                $ERECEPCION->__SET('CODIGO_ESTANDAR', $_REQUEST['CODIGOESTANDAR']);
                $ERECEPCION->__SET('NOMBRE_ESTANDAR', $_REQUEST['NOMBREESTANDAR']);
                $ERECEPCION->__SET('CANTIDAD_ENVASE_ESTANDAR', $_REQUEST['ENVASEESTANDAR']);
                $ERECEPCION->__SET('PESO_ENVASE_ESTANDAR', $_REQUEST['PESOENVASEESTANDAR']);
                $ERECEPCION->__SET('PESO_PALLET_ESTANDAR', $_REQUEST['PESOPALLETESTANDAR']);
                $ERECEPCION->__SET('TRATAMIENTO1',$_REQUEST['TRATAMIENTO1']);
                $ERECEPCION->__SET('TRATAMIENTO2',$_REQUEST['TRATAMIENTO2']);
                $ERECEPCION->__SET('ID_ESPECIES', $_REQUEST['ESPECIES']);
                $ERECEPCION->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                $ERECEPCION->__SET('ID_PRODUCTO', $_REQUEST['PRODUCTO']);
                $ERECEPCION->__SET('ID_USUARIOI', $IDUSUARIOS);
                $ERECEPCION->__SET('ID_USUARIOM', $IDUSUARIOS);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $ERECEPCION_ADO->agregarEstandar($ERECEPCION);

                $AUSUARIO_ADO->agregarAusuario2("NULL",3,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Estandar Recepción.","estandar_erecepcion","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );  

                //REDIRECCIONAR A PAGINA registroErecepcion.php
                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Creado",
                        text:"El registro del mantenedor se ha creado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroErecepcion.php";                            
                    })
                </script>';
            }

            //OPERACION DE EDICION DE FILA
            if (isset($_REQUEST['EDITAR'])) {

                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   

                $ERECEPCION->__SET('CODIGO_ESTANDAR', $_REQUEST['CODIGOESTANDAR']);
                $ERECEPCION->__SET('NOMBRE_ESTANDAR', $_REQUEST['NOMBREESTANDAR']);
                $ERECEPCION->__SET('CANTIDAD_ENVASE_ESTANDAR', $_REQUEST['ENVASEESTANDAR']);
                $ERECEPCION->__SET('PESO_ENVASE_ESTANDAR', $_REQUEST['PESOENVASEESTANDAR']);
                $ERECEPCION->__SET('PESO_PALLET_ESTANDAR', $_REQUEST['PESOPALLETESTANDAR']);
                $ERECEPCION->__SET('TRATAMIENTO1',$_REQUEST['TRATAMIENTO1']);
                $ERECEPCION->__SET('TRATAMIENTO2',$_REQUEST['TRATAMIENTO2']);
                $ERECEPCION->__SET('ID_ESPECIES', $_REQUEST['ESPECIES']);
                $ERECEPCION->__SET('ID_PRODUCTO', $_REQUEST['PRODUCTO']);
                $ERECEPCION->__SET('ID_USUARIOM', $IDUSUARIOS);
                $ERECEPCION->__SET('ID_ESTANDAR', $_REQUEST['ID']);
                //LLAMADA AL METODO DE EDICION DEL CONTROLADOR
                $ERECEPCION_ADO->actualizarEstandar($ERECEPCION);

                $AUSUARIO_ADO->agregarAusuario2("NULL",3,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de Estandar Recepción.","estandar_erecepcion", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );     

                //REDIRECCIONAR A PAGINA registroErecepcion.php
                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Modificado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroErecepcion.php";                            
                    })
                </script>';
            }
            if (isset($_REQUEST['ELIMINAR'])) {         


                $ERECEPCION->__SET('ID_ESTANDAR', $_REQUEST['ID']);
                $ERECEPCION_ADO->deshabilitar($ERECEPCION);
                
        
                $AUSUARIO_ADO->agregarAusuario2("NULL",3,4,"".$_SESSION["NOMBRE_USUARIO"].", Deshabilitar  Estandar Recepción.","estandar_erecepcion", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );                
                
                echo '<script>
                    Swal.fire({
                        icon:"error",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Deshabilitado correctamente", 
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroErecepcion.php";                            
                    })
                </script>';
            }
            
            if (isset($_REQUEST['HABILITAR'])) {   

                $ERECEPCION->__SET('ID_ESTANDAR', $_REQUEST['ID']);
                $ERECEPCION_ADO->habilitar($ERECEPCION);
                
                $AUSUARIO_ADO->agregarAusuario2("NULL",3,5,"".$_SESSION["NOMBRE_USUARIO"].", Habilitar  Estandar Recepción.","estandar_erecepcion", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );                               

                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Habilitado correctamente", 
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroErecepcion.php";                            
                    })
                </script>';
            }

        ?>
</body>

</html>