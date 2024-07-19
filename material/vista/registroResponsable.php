<?php


include_once "../../assest/config/validarUsuarioMaterial.php";


//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/RESPONSABLE_ADO.php';

include_once '../../assest/controlador/COMUNA_ADO.php';


include_once '../../assest/modelo/RESPONSABLE.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$RESPONSABLE_ADO =  new RESPONSABLE_ADO();

$COMUNA_ADO =  new COMUNA_ADO();

//INIICIALIZAR NOMBRE_RESPONSABLE

$RESPONSABLE =  new RESPONSABLE();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$RUTRESPONSABLE = "";
$DVRESPONSABLE = "";
$RAZONRESPONSABLE = "";
$NOMBRERESPONSABLE = "";
$GIRORESPONSABLE = "";
$DIRECCIONRESPONSABLE = "";
$TELEFONORESPONSABLE = "";
$EMAILRESPONSABLE = "";
$COMUNA = "";
$EMPRESA = "";
$USUARIO = "";
$NUMERO = "";
$CONTADOR=0;


$DISABLED = "";
$IDOP = "";
$OP = "";

$MENSAJE = "";
$SINO = "";

//INICIALIZAR ARREGLOS
$ARRAYRESPONSABLEID = "";
$ARRAYRESPONSABLE = "";
$ARRAYRESPONSABLEUSUARIO = "";
$ARRAYEMPRESA = "";
$ARRAYCOMUNA = "";
$ARRAYTUMEDIDA = "";
$ARRAYNUMERO = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYRESPONSABLE = $RESPONSABLE_ADO->listarResponsablePorEmpresaCBX($EMPRESAS);
$ARRAYUSUARIO = $USUARIO_ADO->listarUsuarioCBX();
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
        $ARRAYRESPONSABLEID = $RESPONSABLE_ADO->verResponsable($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYRESPONSABLEID as $r) :
            $RUTRESPONSABLE = "" . $r['RUT_RESPONSABLE'];
            $DVRESPONSABLE = "" . $r['DV_RESPONSABLE'];
            $NOMBRERESPONSABLE = "" . $r['NOMBRE_RESPONSABLE'];
            $DIRECCIONRESPONSABLE = "" . $r['DIRECCION_RESPONSABLE'];
            $TELEFONORESPONSABLE = "" . $r['TELEFONO_RESPONSABLE'];
            $EMAILRESPONSABLE = "" . $r['EMAIL_RESPONSABLE'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $COMUNA = "" . $r['ID_COMUNA'];
            $USUARIO = "" . $r['ID_USUARIO'];
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
        $ARRAYRESPONSABLEID = $RESPONSABLE_ADO->verResponsable($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYRESPONSABLEID as $r) :
            $RUTRESPONSABLE = "" . $r['RUT_RESPONSABLE'];
            $DVRESPONSABLE = "" . $r['DV_RESPONSABLE'];
            $NOMBRERESPONSABLE = "" . $r['NOMBRE_RESPONSABLE'];
            $DIRECCIONRESPONSABLE = "" . $r['DIRECCION_RESPONSABLE'];
            $TELEFONORESPONSABLE = "" . $r['TELEFONO_RESPONSABLE'];
            $EMAILRESPONSABLE = "" . $r['EMAIL_RESPONSABLE'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $COMUNA = "" . $r['ID_COMUNA'];
            $USUARIO = "" . $r['ID_USUARIO'];
        endforeach;

    }

    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYRESPONSABLEID = $RESPONSABLE_ADO->verResponsable($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA        
        foreach ($ARRAYRESPONSABLEID as $r) :
            $RUTRESPONSABLE = "" . $r['RUT_RESPONSABLE'];
            $DVRESPONSABLE = "" . $r['DV_RESPONSABLE'];
            $NOMBRERESPONSABLE = "" . $r['NOMBRE_RESPONSABLE'];
            $DIRECCIONRESPONSABLE = "" . $r['DIRECCION_RESPONSABLE'];
            $TELEFONORESPONSABLE = "" . $r['TELEFONO_RESPONSABLE'];
            $EMAILRESPONSABLE = "" . $r['EMAIL_RESPONSABLE'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $COMUNA = "" . $r['ID_COMUNA'];
            $USUARIO = "" . $r['ID_USUARIO'];
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
        $ARRAYRESPONSABLEID = $RESPONSABLE_ADO->verResponsable($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYRESPONSABLEID as $r) :
            $RUTRESPONSABLE = "" . $r['RUT_RESPONSABLE'];
            $DVRESPONSABLE = "" . $r['DV_RESPONSABLE'];
            $NOMBRERESPONSABLE = "" . $r['NOMBRE_RESPONSABLE'];
            $DIRECCIONRESPONSABLE = "" . $r['DIRECCION_RESPONSABLE'];
            $TELEFONORESPONSABLE = "" . $r['TELEFONO_RESPONSABLE'];
            $EMAILRESPONSABLE = "" . $r['EMAIL_RESPONSABLE'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $COMUNA = "" . $r['ID_COMUNA'];
            $USUARIO = "" . $r['ID_USUARIO'];
        endforeach;
    }
}
if (isset($_POST)) {
    if (isset($_REQUEST['RUTRESPONSABLE'])) {
        $RUTRESPONSABLE = $_REQUEST['RUTRESPONSABLE'];
    }
    if (isset($_REQUEST['DVRESPONSABLE'])) {
        $DVRESPONSABLE = $_REQUEST['DVRESPONSABLE'];
    }
    if (isset($_REQUEST['NOMBRERESPONSABLE'])) {
        $NOMBRERESPONSABLE = $_REQUEST['NOMBRERESPONSABLE'];
    }
    if (isset($_REQUEST['DIRECCIONRESPONSABLE'])) {
        $DIRECCIONRESPONSABLE = $_REQUEST['DIRECCIONRESPONSABLE'];
    }
    if (isset($_REQUEST['TELEFONORESPONSABLE'])) {
        $TELEFONORESPONSABLE = $_REQUEST['TELEFONORESPONSABLE'];
    }
    if (isset($_REQUEST['EMAILRESPONSABLE'])) {
        $EMAILRESPONSABLE = $_REQUEST['EMAILRESPONSABLE'];
    }
    if (isset($_REQUEST['COMUNA'])) {
        $COMUNA = $_REQUEST['COMUNA'];
    }
    if (isset($_REQUEST['USUARIO'])) {
        $USUARIO = $_REQUEST['USUARIO'];
    }
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Responsable</title>
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

                    RUTRESPONSABLE = document.getElementById("RUTRESPONSABLE").value;
                    DVRESPONSABLE = document.getElementById("DVRESPONSABLE").value;
                    NOMBRERESPONSABLE = document.getElementById("NOMBRERESPONSABLE").value;
                    DIRECCIONRESPONSABLE = document.getElementById("DIRECCIONRESPONSABLE").value;
                    TELEFONORESPONSABLE = document.getElementById("TELEFONORESPONSABLE").value;
                    EMAILRESPONSABLE = document.getElementById("EMAILRESPONSABLE").value;
                    COMUNA = document.getElementById("COMUNA").selectedIndex;


                    document.getElementById('val_rut').innerHTML = "";
                    document.getElementById('val_dv').innerHTML = "";
                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_direccion').innerHTML = "";
                    document.getElementById('val_telefono').innerHTML = "";
                    document.getElementById('val_email').innerHTML = "";
                    document.getElementById('val_comuna').innerHTML = "";


                    if (RUTRESPONSABLE == null || RUTRESPONSABLE.length == 0 || /^\s+$/.test(RUTRESPONSABLE)) {
                        document.form_reg_dato.RUTRESPONSABLE.focus();
                        document.form_reg_dato.RUTRESPONSABLE.style.borderColor = "#FF0000";
                        document.getElementById('val_rut').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.RUTRESPONSABLE.style.borderColor = "#4AF575";

                    if (DVRESPONSABLE == null || DVRESPONSABLE.length == 0 || /^\s+$/.test(DVRESPONSABLE)) {
                        document.form_reg_dato.DVRESPONSABLE.focus();
                        document.form_reg_dato.DVRESPONSABLE.style.borderColor = "#FF0000";
                        document.getElementById('val_dv').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DVRESPONSABLE.style.borderColor = "#4AF575";


                    if (NOMBRERESPONSABLE == null || NOMBRERESPONSABLE.length == 0 || /^\s+$/.test(NOMBRERESPONSABLE)) {
                        document.form_reg_dato.NOMBRERESPONSABLE.focus();
                        document.form_reg_dato.NOMBRERESPONSABLE.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBRERESPONSABLE.style.borderColor = "#4AF575";


                    if (DIRECCIONRESPONSABLE == null || DIRECCIONRESPONSABLE.length == 0 || /^\s+$/.test(DIRECCIONRESPONSABLE)) {
                        document.form_reg_dato.DIRECCIONRESPONSABLE.focus();
                        document.form_reg_dato.DIRECCIONRESPONSABLE.style.borderColor = "#FF0000";
                        document.getElementById('val_direccion').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DIRECCIONRESPONSABLE.style.borderColor = "#4AF575";

                    /*
                    if (TELEFONORESPONSABLE == null || TELEFONORESPONSABLE.length == 0 || /^\s+$/.test(TELEFONORESPONSABLE)) {
                        document.form_reg_dato.TELEFONORESPONSABLE.focus();
                        document.form_reg_dato.TELEFONORESPONSABLE.style.borderColor = "#FF0000";
                        document.getElementById('val_telefono').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.TELEFONORESPONSABLE.style.borderColor = "#4AF575";

                    if (EMAILRESPONSABLE == null || EMAILRESPONSABLE.length == 0 || /^\s+$/.test(EMAILRESPONSABLE)) {
                        document.form_reg_dato.EMAILRESPONSABLE.focus();
                        document.form_reg_dato.EMAILRESPONSABLE.style.borderColor = "#FF0000";
                        document.getElementById('val_email').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.EMAILRESPONSABLE.style.borderColor = "#4AF575";

                    if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
                            .test(EMAILRESPONSABLE))) {
                        document.form_reg_dato.EMAILRESPONSABLE.focus();
                        document.form_reg_dato.EMAILRESPONSABLE.style.borderColor = "#ff0000";
                        document.getElementById('val_email').innerHTML = "FORMATO DE CORREO INCORRECTO";
                        return false;
                    }
                    document.form_reg_dato.EMAILRESPONSABLE.style.borderColor = "#4AF575";

                        */
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
            <?php include_once "../../assest/config/menuMaterial.php";  ?>
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
                                            <li class="breadcrumb-item" aria-current="page">Responsable </li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Registro Responsable </a> </li>
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
                                        <h4 class="box-title">Registro Responsable</h4>                                
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
                                                        <input type="text" class="form-control" placeholder=" Rut  Responsable" id="RUTRESPONSABLE" name="RUTRESPONSABLE" value="<?php echo $RUTRESPONSABLE; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_rut" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 col-xs-2">
                                                    <div class="form-group">
                                                        <label>DV </label>
                                                        <input type="text" class="form-control" placeholder=" DV  Responsable" id="DVRESPONSABLE" name="DVRESPONSABLE" value="<?php echo $DVRESPONSABLE; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_dv" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Nombre </label>
                                                        <input type="text" class="form-control" placeholder=" Nombre  Responsable" id="NOMBRERESPONSABLE" name="NOMBRERESPONSABLE" value="<?php echo $NOMBRERESPONSABLE; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nombre" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Dirección </label>
                                                        <input type="text" class="form-control" placeholder=" Dirección  Responsable" id="DIRECCIONRESPONSABLE" name="DIRECCIONRESPONSABLE" value="<?php echo $DIRECCIONRESPONSABLE; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_direccion" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Telefono</label>
                                                        <input type="number" class="form-control" placeholder=" Telefono  Responsable" id="TELEFONORESPONSABLE" name="TELEFONORESPONSABLE" value="<?php echo $TELEFONORESPONSABLE; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_telefono" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Email </label>
                                                        <input type="text" class="form-control" placeholder=" Email  Responsable" id="EMAILRESPONSABLE" name="EMAILRESPONSABLE" value="<?php echo $EMAILRESPONSABLE; ?>" <?php echo $DISABLED; ?> />
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
                                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Usuario</label>
                                                        <select class="form-control select2" id="USUARIO" name="USUARIO" style="width: 100%;" value="<?php echo $USUARIO; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYUSUARIO as $r) : ?>
                                                                <?php if ($ARRAYUSUARIO) {    ?>
                                                                    <option value="<?php echo $r['ID_USUARIO']; ?>" 
                                                                        <?php if ($USUARIO == $r['ID_USUARIO']) {  echo "selected";} ?>>
                                                                        <?php echo $r['NOMBRE_USUARIO'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No Hay Datos Registados </option>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_usuario" class="validacion"> <?php echo $MENSAJE; ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                        <!-- /.box-body -->                      
                                        <div class="box-footer">
                                            <div class="btn-group   col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12 " role="group" aria-label="Acciones generales">                                    
                                                <button type="button" class="btn  btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroResponsable.php');">
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
                                        <h4 class="box-title"> Agrupado Responsable</h4>
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
                                                        <th>Nombre</th>
                                                        <th>Direccion </th>
                                                        <th>Comuna </th>
                                                        <th>Telefono </th>
                                                        <th>Email </th>
                                                        <th>Usuario </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYRESPONSABLE as $r) : ?>
                                                        <?php 
                                                            $CONTADOR+=1;
                                                            $ARRAYVERCOMUNA=$COMUNA_ADO->verComuna($r["ID_COMUNA"]);
                                                            if($ARRAYVERCOMUNA){
                                                                $NOMBRECOMUNA = $ARRAYVERCOMUNA[0]["NOMBRE_COMUNA"];
                                                            }else{
                                                                $NOMBRECOMUNA="Sin Datos";
                                                            }                                                            
                                                            $ARRAYVERUSUARIO=$USUARIO_ADO->verUsuario($r["ID_USUARIO"]);
                                                            if($ARRAYVERUSUARIO){
                                                                $NOMBREUSUARIO = $ARRAYVERUSUARIO[0]["NOMBRE_USUARIO"];
                                                            }else{
                                                                $NOMBREUSUARIO="Sin Datos";
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
                                                                                <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_RESPONSABLE']; ?>" />
                                                                                <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroResponsable" />
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
                                                            <td> <?php echo $r['RUT_RESPONSABLE']; ?></td>
                                                            <td> <?php echo $r['DV_RESPONSABLE']; ?></td>
                                                            <td> <?php echo $r['NOMBRE_RESPONSABLE']; ?></td>
                                                            <td> <?php echo $r['DIRECCION_RESPONSABLE']; ?></td>                                                             
                                                            <td> <?php echo $NOMBRECOMUNA; ?></td>  
                                                            <td> <?php echo $r['TELEFONO_RESPONSABLE']; ?></td>  
                                                            <td> <?php echo $r['EMAIL_RESPONSABLE']; ?></td>                                                             
                                                            <td> <?php echo $NOMBREUSUARIO; ?></td>   
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
                if (isset($_REQUEST['USUARIO'])) {
                    $ARRAYRESPONSABLEUSUARIO = $RESPONSABLE_ADO->listarResponsablePorEmpresaUsuarioCBX($EMPRESAS, $_REQUEST['USUARIO']);
                    if ($ARRAYRESPONSABLEUSUARIO) {
                        echo '<script>
                                Swal.fire({
                                    icon:"warning",
                                    title:"Accion restringida",
                                    text:"El usuario selecionado ya ha sido asignado.",
                                    showConfirmButton: true,
                                    confirmButtonText:"Cerrar",
                                    closeOnConfirm:false
                                })
                            </script>';
                        $SINO = "1";
                    } else {
                        $MENSAJE = "";
                        $SINO = "0";
                    }
                } else {
                    $MENSAJE = "";
                    $SINO = "0";
                }
                if ($SINO == "0") {

                    $ARRAYNUMERO = $RESPONSABLE_ADO->obtenerNumero();
                    $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;
                    //UTILIZACION METODOS SET DEL NOMBRE_RESPONSABLE
                    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
                    $RESPONSABLE->__SET('NUMERO_RESPONSABLE', $NUMERO);
                    $RESPONSABLE->__SET('RUT_RESPONSABLE', $_REQUEST['RUTRESPONSABLE']);
                    $RESPONSABLE->__SET('DV_RESPONSABLE', $_REQUEST['DVRESPONSABLE']);
                    $RESPONSABLE->__SET('NOMBRE_RESPONSABLE', $_REQUEST['NOMBRERESPONSABLE']);
                    $RESPONSABLE->__SET('DIRECCION_RESPONSABLE', $_REQUEST['DIRECCIONRESPONSABLE']);
                    $RESPONSABLE->__SET('TELEFONO_RESPONSABLE', $_REQUEST['TELEFONORESPONSABLE']);
                    $RESPONSABLE->__SET('EMAIL_RESPONSABLE', $_REQUEST['EMAILRESPONSABLE']);
                    $RESPONSABLE->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                    $RESPONSABLE->__SET('ID_COMUNA', $_REQUEST['COMUNA']);
                    $RESPONSABLE->__SET('ID_USUARIO', $_REQUEST['USUARIO']);
                    $RESPONSABLE->__SET('ID_USUARIOI', $IDUSUARIOS);
                    $RESPONSABLE->__SET('ID_USUARIOM', $IDUSUARIOS);
                    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                    $RESPONSABLE_ADO->agregarResponsable($RESPONSABLE);

                    $AUSUARIO_ADO->agregarAusuario2("NULL",2,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Responsable.","material_responsable","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

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
                            location.href = "registroResponsable.php";                            
                        })
                    </script>';
                }
            }
            //OPERACION DE EDICION DE FILA
            if (isset($_REQUEST['EDITAR'])) {
                if (isset($_REQUEST['USUARIO'])) {
                    $ARRAYRESPONSABLEUSUARIO = $RESPONSABLE_ADO->listarResponsablePorEmpresaUsuarioCBX($EMPRESAS, $_REQUEST['USUARIO']);
                    if ($ARRAYRESPONSABLEUSUARIO) {
                        echo '<script>
                                Swal.fire({
                                    icon:"warning",
                                    title:"Accion restringida",
                                    text:"El usuario selecionado ya ha sido asignado.",
                                    showConfirmButton: true,
                                    confirmButtonText:"Cerrar",
                                    closeOnConfirm:false
                                })
                            </script>';
                        $SINO = "1";
                    } else {
                        $MENSAJE = "";
                        $SINO = "0";
                    }
                } else {
                    $MENSAJE = "";
                    $SINO = "0";
                }
                if ($SINO == "0") {
                    //UTILIZACION METODOS SET DEL NOMBRE_RESPONSABLE
                    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO 
                    $RESPONSABLE->__SET('RUT_RESPONSABLE', $_REQUEST['RUTRESPONSABLE']);
                    $RESPONSABLE->__SET('DV_RESPONSABLE', $_REQUEST['DVRESPONSABLE']);
                    $RESPONSABLE->__SET('NOMBRE_RESPONSABLE', $_REQUEST['NOMBRERESPONSABLE']);
                    $RESPONSABLE->__SET('DIRECCION_RESPONSABLE', $_REQUEST['DIRECCIONRESPONSABLE']);
                    $RESPONSABLE->__SET('TELEFONO_RESPONSABLE', $_REQUEST['TELEFONORESPONSABLE']);
                    $RESPONSABLE->__SET('EMAIL_RESPONSABLE', $_REQUEST['EMAILRESPONSABLE']);
                    $RESPONSABLE->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                    $RESPONSABLE->__SET('ID_COMUNA', $_REQUEST['COMUNA']);
                    $RESPONSABLE->__SET('ID_USUARIO', $_REQUEST['USUARIO']);
                    $RESPONSABLE->__SET('ID_USUARIOM', $IDUSUARIOS);
                    $RESPONSABLE->__SET('ID_RESPONSABLE', $_REQUEST['ID']);
                    //LLAMADA AL METODO DE EDICION DEL CONTROLADOR   
                    $RESPONSABLE_ADO->actualizarResponsable($RESPONSABLE);

                    $AUSUARIO_ADO->agregarAusuario2("NULL",2,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de Responsable.","material_responsable", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );     

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
                            location.href = "registroResponsable.php";                            
                        })
                    </script>';
                }
            }
                
            if (isset($_REQUEST['ELIMINAR'])) {           

                $RESPONSABLE->__SET('ID_RESPONSABLE', $_REQUEST['ID']);
                $RESPONSABLE_ADO->deshabilitar($RESPONSABLE);       


                $AUSUARIO_ADO->agregarAusuario2("NULL",2,4,"".$_SESSION["NOMBRE_USUARIO"].", Deshabilitar Responsable.","material_responsable", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );                
                
                echo '<script>
                    Swal.fire({
                        icon:"error",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Deshabilitado correctamente", 
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroResponsable.php";                            
                    })
                </script>';
            }
            
            if (isset($_REQUEST['HABILITAR'])) {
                               
                $RESPONSABLE->__SET('ID_RESPONSABLE', $_REQUEST['ID']);
                $RESPONSABLE_ADO->habilitar($RESPONSABLE);


                $AUSUARIO_ADO->agregarAusuario2("NULL",2,5,"".$_SESSION["NOMBRE_USUARIO"].", Habilitar Responsable.","material_responsable", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );                               

                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Habilitado correctamente", 
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroResponsable.php";                            
                    })
                </script>';
            }
            

        ?>
</body>

</html>