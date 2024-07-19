<?php


include_once "../../assest/config/validarUsuarioMaterial.php";


//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/CLIENTE_ADO.php';

include_once '../../assest/controlador/COMUNA_ADO.php';


include_once '../../assest/modelo/CLIENTE.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$CLIENTE_ADO =  new CLIENTE_ADO();

$COMUNA_ADO =  new COMUNA_ADO();

//INIICIALIZAR NOMBRE_CLIENTE

$CLIENTE =  new CLIENTE();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$RUTCLIENTE = "";
$DVCLIENTE = "";
$RAZONCLIENTE = "";
$NOMBRECLIENTE = "";
$GIROCLIENTE = "";
$DIRECCIONCLIENTE = "";
$TELEFONOCLIENTE = "";
$EMAILCLIENTE = "";
$COMUNA = "";
$EMPRESA = "";
$NUMERO = "";


$FOCUS = "";
$BORDER = "";
$DISABLED = "";
$OP = "";
$CONTADOR=0;

//INICIALIZAR ARREGLOS
$ARRAYCLIENTEID = "";
$ARRAYCLIENTES = "";
$ARRAYEMPRESA = "";
$ARRAYCOMUNA = "";
$ARRAYTUMEDIDA = "";
$ARRAYNUMERO = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYCLIENTES = $CLIENTE_ADO->listarClientePorEmpresaCBX($EMPRESAS);
$ARRAYEMPRESA = $EMPRESA_ADO->listarEmpresaCBX();
$ARRAYCOMUNA = $COMUNA_ADO->listarComuna3CBX();
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


    //IDENTIFICACIONES DE OPERACIONES
    //OPERACION DE CAMBIO DE ESTADO
    //0 = DESACTIVAR
    if ($OP == "0") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION
        $DISABLED = "disabled";
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYCLIENTEID = $CLIENTE_ADO->verCliente($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYCLIENTEID as $r) :
            $RUTCLIENTE = "" . $r['RUT_CLIENTE'];
            $DVCLIENTE = "" . $r['DV_CLIENTE'];
            $RAZONCLIENTE = "" . $r['RAZON_CLIENTE'];
            $NOMBRECLIENTE = "" . $r['NOMBRE_CLIENTE'];
            $GIROCLIENTE = "" . $r['GIRO_CLIENTE'];
            $DIRECCIONCLIENTE = "" . $r['DIRECCION_CLIENTE'];
            $TELEFONOCLIENTE = "" . $r['TELEFONO_CLIENTE'];
            $EMAILCLIENTE = "" . $r['EMAIL_CLIENTE'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $COMUNA = "" . $r['ID_COMUNA'];
        endforeach;

    }
    //1 = ACTIVAR
    if ($OP == "1") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION
        $DISABLED = "disabled";
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYCLIENTEID = $CLIENTE_ADO->verCliente($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYCLIENTEID as $r) :
            $RUTCLIENTE = "" . $r['RUT_CLIENTE'];
            $DVCLIENTE = "" . $r['DV_CLIENTE'];
            $RAZONCLIENTE = "" . $r['RAZON_CLIENTE'];
            $NOMBRECLIENTE = "" . $r['NOMBRE_CLIENTE'];
            $GIROCLIENTE = "" . $r['GIRO_CLIENTE'];
            $DIRECCIONCLIENTE = "" . $r['DIRECCION_CLIENTE'];
            $TELEFONOCLIENTE = "" . $r['TELEFONO_CLIENTE'];
            $EMAILCLIENTE = "" . $r['EMAIL_CLIENTE'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $COMUNA = "" . $r['ID_COMUNA'];
        endforeach;

    }

    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYCLIENTEID = $CLIENTE_ADO->verCliente($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA        
        foreach ($ARRAYCLIENTEID as $r) :
            $RUTCLIENTE = "" . $r['RUT_CLIENTE'];
            $DVCLIENTE = "" . $r['DV_CLIENTE'];
            $RAZONCLIENTE = "" . $r['RAZON_CLIENTE'];
            $NOMBRECLIENTE = "" . $r['NOMBRE_CLIENTE'];
            $GIROCLIENTE = "" . $r['GIRO_CLIENTE'];
            $DIRECCIONCLIENTE = "" . $r['DIRECCION_CLIENTE'];
            $TELEFONOCLIENTE = "" . $r['TELEFONO_CLIENTE'];
            $EMAILCLIENTE = "" . $r['EMAIL_CLIENTE'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $COMUNA = "" . $r['ID_COMUNA'];
        endforeach;
    }

    //ver =  OBTENCION DE DATOS PARA LA VISUALIZAAR INFORMAICON DE REGISTRO
    if ($OP == "ver") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION
        $DISABLED = "disabled";
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYCLIENTEID = $CLIENTE_ADO->verCliente($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYCLIENTEID as $r) :
            $RUTCLIENTE = "" . $r['RUT_CLIENTE'];
            $DVCLIENTE = "" . $r['DV_CLIENTE'];
            $RAZONCLIENTE = "" . $r['RAZON_CLIENTE'];
            $NOMBRECLIENTE = "" . $r['NOMBRE_CLIENTE'];
            $GIROCLIENTE = "" . $r['GIRO_CLIENTE'];
            $DIRECCIONCLIENTE = "" . $r['DIRECCION_CLIENTE'];
            $TELEFONOCLIENTE = "" . $r['TELEFONO_CLIENTE'];
            $EMAILCLIENTE = "" . $r['EMAIL_CLIENTE'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $COMUNA = "" . $r['ID_COMUNA'];
        endforeach;
    }
}


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Cliente</title>
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

                    RUTCLIENTE = document.getElementById("RUTCLIENTE").value;
                    DVCLIENTE = document.getElementById("DVCLIENTE").value;
                    RAZONCLIENTE = document.getElementById("RAZONCLIENTE").value;
                    NOMBRECLIENTE = document.getElementById("NOMBRECLIENTE").value;
                    GIROCLIENTE = document.getElementById("GIROCLIENTE").value;
                    DIRECCIONCLIENTE = document.getElementById("DIRECCIONCLIENTE").value;
                    TELEFONOCLIENTE = document.getElementById("TELEFONOCLIENTE").value;
                    EMAILCLIENTE = document.getElementById("EMAILCLIENTE").value;
                    COMUNA = document.getElementById("COMUNA").selectedIndex;


                    document.getElementById('val_rut').innerHTML = "";
                    document.getElementById('val_dv').innerHTML = "";
                    document.getElementById('val_razon').innerHTML = "";
                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_giro').innerHTML = "";
                    document.getElementById('val_direccion').innerHTML = "";
                    document.getElementById('val_telefono').innerHTML = "";
                    document.getElementById('val_email').innerHTML = "";
                    document.getElementById('val_comuna').innerHTML = "";


                    if (RUTCLIENTE == null || RUTCLIENTE.length == 0 || /^\s+$/.test(RUTCLIENTE)) {
                        document.form_reg_dato.RUTCLIENTE.focus();
                        document.form_reg_dato.RUTCLIENTE.style.borderColor = "#FF0000";
                        document.getElementById('val_rut').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.RUTCLIENTE.style.borderColor = "#4AF575";

                    if (DVCLIENTE == null || DVCLIENTE.length == 0 || /^\s+$/.test(DVCLIENTE)) {
                        document.form_reg_dato.DVCLIENTE.focus();
                        document.form_reg_dato.DVCLIENTE.style.borderColor = "#FF0000";
                        document.getElementById('val_dv').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DVCLIENTE.style.borderColor = "#4AF575";
                    /*
                    if (RAZONCLIENTE == null || RAZONCLIENTE.length == 0 || /^\s+$/.test(RAZONCLIENTE)) {
                        document.form_reg_dato.RAZONCLIENTE.focus();
                        document.form_reg_dato.RAZONCLIENTE.style.borderColor = "#FF0000";
                        document.getElementById('val_razon').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.RAZONCLIENTE.style.borderColor = "#4AF575";
                    */

                    if (NOMBRECLIENTE == null || NOMBRECLIENTE.length == 0 || /^\s+$/.test(NOMBRECLIENTE)) {
                        document.form_reg_dato.NOMBRECLIENTE.focus();
                        document.form_reg_dato.NOMBRECLIENTE.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBRECLIENTE.style.borderColor = "#4AF575";
                    /*
                    if (GIROCLIENTE == null || GIROCLIENTE.length == 0 || /^\s+$/.test(GIROCLIENTE)) {
                        document.form_reg_dato.GIROCLIENTE.focus();
                        document.form_reg_dato.GIROCLIENTE.style.borderColor = "#FF0000";
                        document.getElementById('val_giro').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.GIROCLIENTE.style.borderColor = "#4AF575";
                    */

                    if (DIRECCIONCLIENTE == null || DIRECCIONCLIENTE.length == 0 || /^\s+$/.test(DIRECCIONCLIENTE)) {
                        document.form_reg_dato.DIRECCIONCLIENTE.focus();
                        document.form_reg_dato.DIRECCIONCLIENTE.style.borderColor = "#FF0000";
                        document.getElementById('val_direccion').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DIRECCIONCLIENTE.style.borderColor = "#4AF575";
                    /*
                    if (TELEFONOCLIENTE == null || TELEFONOCLIENTE.length == 0 || /^\s+$/.test(TELEFONOCLIENTE)) {
                        document.form_reg_dato.TELEFONOCLIENTE.focus();
                        document.form_reg_dato.TELEFONOCLIENTE.style.borderColor = "#FF0000";
                        document.getElementById('val_telefono').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.TELEFONOCLIENTE.style.borderColor = "#4AF575";

                    if (EMAILCLIENTE == null || EMAILCLIENTE.length == 0 || /^\s+$/.test(EMAILCLIENTE)) {
                        document.form_reg_dato.EMAILCLIENTE.focus();
                        document.form_reg_dato.EMAILCLIENTE.style.borderColor = "#FF0000";
                        document.getElementById('val_email').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.EMAILCLIENTE.style.borderColor = "#4AF575";

                    if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
                            .test(EMAILCLIENTE))) {
                        document.form_reg_dato.EMAILCLIENTE.focus();
                        document.form_reg_dato.EMAILCLIENTE.style.borderColor = "#ff0000";
                        document.getElementById('val_email').innerHTML = "FORMATO DE CORREO INCORRECTO";
                        return false;
                    }
                    document.form_reg_dato.EMAILCLIENTE.style.borderColor = "#4AF575";
                        ¨*/
                    
                    if (COMUNA == null || COMUNA == 0) {
                        document.form_reg_dato.COMUNA.focus();
                        document.form_reg_dato.COMUNA.style.borderColor = "#FF0000";
                        document.getElementById('val_comuna').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.COMUNA.style.borderColor = "#4AF575";




                }




                //REDIRECCIONAR A LA PAGINA SELECIONADA
                function irPagina(url) {
                    location.href = "" + url;
                }
            </script>

</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary" >
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <?php include_once "../../assest/config/menuMaterial.php"; ?>
            <div class="content-wrapper">
                <div class="container-full">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title"> Otros</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Mantenedores</li>
                                            <li class="breadcrumb-item" aria-current="page">Otros </li>
                                            <li class="breadcrumb-item" aria-current="page">Cliente </li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Registro Cliente </a> </li>
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
                                        <h4 class="box-title">Registro Cliente</h4>                                
                                    </div>
                                    <!-- /.box-header -->
                                    <form class="form" role="form" method="post" id="form_reg_dato" name="form_reg_dato" >
                                        <div class="box-body">
                                            <hr class="my-15">
                                            <div class="row">
                                                 <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Rut </label>
                                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                        <input type="hidden" class="form-control" placeholder="EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                        <input type="text" class="form-control" placeholder=" Rut  Cliente" id="RUTCLIENTE" name="RUTCLIENTE" value="<?php echo $RUTCLIENTE; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_rut" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 col-xs-2">
                                                    <div class="form-group">
                                                        <label>DV </label>
                                                        <input type="text" class="form-control" placeholder=" DV  Cliente" id="DVCLIENTE" name="DVCLIENTE" value="<?php echo $DVCLIENTE; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_dv" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Razón Social </label>
                                                        <input type="text" class="form-control" placeholder=" Nombre  Cliente" id="RAZONCLIENTE" name="RAZONCLIENTE" value="<?php echo $RAZONCLIENTE; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_razon" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Nombre </label>
                                                        <input type="text" class="form-control" placeholder=" Nombre  Cliente" id="NOMBRECLIENTE" name="NOMBRECLIENTE" value="<?php echo $NOMBRECLIENTE; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nombre" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Giro</label>
                                                        <input type="text" class="form-control" placeholder=" Giro  Cliente" id="GIROCLIENTE" name="GIROCLIENTE" value="<?php echo $GIROCLIENTE; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_giro" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Dirección </label>
                                                        <input type="text" class="form-control" placeholder=" Dirección  Cliente" id="DIRECCIONCLIENTE" name="DIRECCIONCLIENTE" value="<?php echo $DIRECCIONCLIENTE; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_direccion" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Telefono</label>
                                                        <input type="number" class="form-control" placeholder=" Telefono  Cliente" id="TELEFONOCLIENTE" name="TELEFONOCLIENTE" value="<?php echo $TELEFONOCLIENTE; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_telefono" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Email </label>
                                                        <input type="text" class="form-control" placeholder=" Email  Cliente" id="EMAILCLIENTE" name="EMAILCLIENTE" value="<?php echo $EMAILCLIENTE; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_email" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label> Comuna</label>
                                                        <select class="form-control select2" id="COMUNA" name="COMUNA" style="width: 100%;" value="<?php echo $COMUNA; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYCOMUNA as $r) : ?>
                                                                <?php if ($ARRAYCOMUNA) {    ?>
                                                                    <option value="<?php echo $r['ID_COMUNA']; ?>" 
                                                                    <?php if ($COMUNA == $r['ID_COMUNA']) { echo "selected";  } ?>>
                                                                        <?php echo $r['COMUNA'] ?>, <?php echo $r['PROVINCIA'] ?>, <?php echo $r['REGION'] ?>, <?php echo $r['PAIS'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No Hay Datos Registrados </option>
                                                                <?php } ?>

                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_comuna" class="validacion"> </label>
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
                                        <!-- /.box-body -->                              
                                        <div class="box-footer">
                                            <div class="btn-group   col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12 " role="group" aria-label="Acciones generales">                                    
                                                <button type="button" class="btn  btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroCliente.php');">
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
                                                    <button type="submit" class="btn btn-success" name="HABILITAR" value="HABILITAR"  data-toggle="tooltip" title="Habilitar"  >
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
                                    <div class="box-header with-border bg-info">
                                        <h4 class="box-title"> Agrupado Cliente</h4>
                                    </div>
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <table id="listar" class="table-hover " style="width: 100%;">
                                                <thead>
                                                    <tr class="center">
                                                        <th>Número</th>
                                                        <th class="text-center">Operaciónes</th>
                                                        <th>Rut </th>
                                                        <th>DV </th>
                                                        <th>Razon Social </th>
                                                        <th>Nombre </th>
                                                        <th>Giro </th>
                                                        <th>Direccion </th>
                                                        <th>Comuna </th>
                                                        <th>Telefono </th>
                                                        <th>Email </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYCLIENTES as $r) : ?>
                                                        <?php 
                                                            $CONTADOR+=1;
                                                            $ARRAYVERCOMUNA=$COMUNA_ADO->verComuna($r["ID_COMUNA"]);
                                                            if($ARRAYVERCOMUNA){
                                                                $NOMBRECOMUNA = $ARRAYVERCOMUNA[0]["NOMBRE_COMUNA"];
                                                            }else{
                                                                $NOMBRECOMUNA="Sin Datos";
                                                            }
                                                        ?>
                                                        <tr class="center">
                                                            <td> <?php echo $CONTADOR; ?> </td>                                                                                                                                      
                                                            <td class="text-center">
                                                                <form method="post" id="form1">
                                                                    <div class="list-icons d-inline-flex">
                                                                        <div class="list-icons-item dropdown">
                                                                            <button class="btn btn-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                <span class="icon-copy ti-settings"></span>
                                                                            </button>
                                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                                <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_CLIENTE']; ?>" />
                                                                                <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroCliente" />
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
                                                            <td> <?php echo $r['RUT_CLIENTE']; ?></td>   
                                                            <td> <?php echo $r['DV_CLIENTE']; ?></td>   
                                                            <td> <?php echo $r['RAZON_CLIENTE']; ?></td>      
                                                            <td> <?php echo $r['NOMBRE_CLIENTE']; ?></td>      
                                                            <td> <?php echo $r['GIRO_CLIENTE']; ?></td>       
                                                            <td> <?php echo $NOMBRECOMUNA; ?></td>       
                                                            <td> <?php echo $r['TELEFONO_CLIENTE']; ?></td>    
                                                            <td> <?php echo $r['EMAIL_CLIENTE']; ?></td>   
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


            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php include_once "../../assest/config/footer.php"; ?>
                <?php include_once "../../assest/config/menuExtraMaterial.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../../assest/config/urlBase.php"; ?>
        <?php 
            //OPERACIONES
            //OPERACION DE REGISTRO DE FILA
            if (isset($_REQUEST['GUARDAR'])) {

                $ARRAYNUMERO = $CLIENTE_ADO->obtenerNumero();
                $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;


                //UTILIZACION METODOS SET DEL NOMBRE_CLIENTE
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
                $CLIENTE->__SET('NUMERO_CLIENTE', $NUMERO);
                $CLIENTE->__SET('RUT_CLIENTE', $_REQUEST['RUTCLIENTE']);
                $CLIENTE->__SET('DV_CLIENTE', $_REQUEST['DVCLIENTE']);
                $CLIENTE->__SET('RAZON_CLIENTE', $_REQUEST['RAZONCLIENTE']);
                $CLIENTE->__SET('NOMBRE_CLIENTE', $_REQUEST['NOMBRECLIENTE']);
                $CLIENTE->__SET('GIRO_CLIENTE', $_REQUEST['GIROCLIENTE']);
                $CLIENTE->__SET('DIRECCION_CLIENTE', $_REQUEST['DIRECCIONCLIENTE']);
                $CLIENTE->__SET('TELEFONO_CLIENTE', $_REQUEST['TELEFONOCLIENTE']);
                $CLIENTE->__SET('EMAIL_CLIENTE', $_REQUEST['EMAILCLIENTE']);
                $CLIENTE->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                $CLIENTE->__SET('ID_COMUNA', $_REQUEST['COMUNA']);
                $CLIENTE->__SET('ID_USUARIOI', $IDUSUARIOS);
                $CLIENTE->__SET('ID_USUARIOM', $IDUSUARIOS);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $CLIENTE_ADO->agregarCliente($CLIENTE);

                $AUSUARIO_ADO->agregarAusuario2("NULL",2,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Cliente.","material_cliente","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

                //REDIRECCIONAR A PAGINA registroEcomercial.php
                    echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Creado",
                        text:"El registro del mantenedor se ha creado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroCliente.php";                            
                    })
                </script>';
            }
            //OPERACION DE EDICION DE FILA
            if (isset($_REQUEST['EDITAR'])) {
                //UTILIZACION METODOS SET DEL NOMBRE_CLIENTE
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO 


                $CLIENTE->__SET('RUT_CLIENTE', $_REQUEST['RUTCLIENTE']);
                $CLIENTE->__SET('DV_CLIENTE', $_REQUEST['DVCLIENTE']);
                $CLIENTE->__SET('RAZON_CLIENTE', $_REQUEST['RAZONCLIENTE']);
                $CLIENTE->__SET('NOMBRE_CLIENTE', $_REQUEST['NOMBRECLIENTE']);
                $CLIENTE->__SET('GIRO_CLIENTE', $_REQUEST['GIROCLIENTE']);
                $CLIENTE->__SET('DIRECCION_CLIENTE', $_REQUEST['DIRECCIONCLIENTE']);
                $CLIENTE->__SET('TELEFONO_CLIENTE', $_REQUEST['TELEFONOCLIENTE']);
                $CLIENTE->__SET('EMAIL_CLIENTE', $_REQUEST['EMAILCLIENTE']);
                $CLIENTE->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                $CLIENTE->__SET('ID_COMUNA', $_REQUEST['COMUNA']);
                $CLIENTE->__SET('ID_USUARIOM', $IDUSUARIOS);
                $CLIENTE->__SET('ID_CLIENTE', $_REQUEST['ID']);
                //LLAMADA AL METODO DE EDICION DEL CONTROLADOR   
                $CLIENTE_ADO->actualizarCliente($CLIENTE);

                $AUSUARIO_ADO->agregarAusuario2("NULL",2,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de Cliente.","material_cliente", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );     

                //REDIRECCIONAR A PAGINA registroEcomercial.php
                    echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Modificado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroCliente.php";                            
                    })
                </script>';
            }

            if (isset($_REQUEST['ELIMINAR'])) {           

                $CLIENTE->__SET('ID_CLIENTE',$_REQUEST['ID']);
                $CLIENTE_ADO->deshabilitar($CLIENTE);             


                $AUSUARIO_ADO->agregarAusuario2("NULL",2,4,"".$_SESSION["NOMBRE_USUARIO"].", Deshabilitar Cliente.","material_cliente", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );                
                
                echo '<script>
                    Swal.fire({
                        icon:"error",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Deshabilitado correctamente", 
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroCliente.php";                            
                    })
                </script>';
            }
            
            if (isset($_REQUEST['HABILITAR'])) {

                
                $CLIENTE->__SET('ID_CLIENTE', $_REQUEST['ID']);
                $CLIENTE_ADO->habilitar($CLIENTE);


                $AUSUARIO_ADO->agregarAusuario2("NULL",2,5,"".$_SESSION["NOMBRE_USUARIO"].", Habilitar Cliente.","material_cliente", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );                               

                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Habilitado correctamente", 
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroCliente.php";                            
                    })
                </script>';
            }
        ?>
</body>
</html>