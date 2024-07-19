<?php

include_once "../../assest/config/validarUsuarioExpo.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../../assest/modelo/USUARIO.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

//INIICIALIZAR MODELO
$USUARIO =  new USUARIO();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$IDOP = "";
$OP = "";
$DISABLED = "";
$DISABLED2 = "";

$NOMBREUSUARIO = "";

$PNOMBREUSUARIO = "";
$SNOMBREUSUARIO = "";
$PAPELLIDOUSUARIO = "";
$SAPELLIDOUSUARIO = "";

$CONTRASENA = "";
$CCONTRASENA = "";
$CORREO = "";
$TELEFONO = "";
$TUSUARIO = "";

$CONTADOR=0;

$SINO = "";

$MENSAJE = "";

//INICIALIZAR ARREGLOS
$ARRAYUSUARIO = "";
$ARRAYUSUARIOID = "";
$ARRAYTUSUARIOS = "";
$ARRAYUSUARIOBUSCARNOMBREUSUARIO = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYUSUARIO = $USUARIO_ADO->listarUsuario();
$ARRAYTUSUARIOS = $TUSUARIO_ADO->listarTusuarioCBX();
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

    if ($OP == "0") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verUsuario(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYUSUARIOID = $USUARIO_ADO->verUsuario($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYUSUARIOID as $r) :
            $NOMBREUSUARIO = "" . $r['NOMBRE_USUARIO'];

            $PNOMBREUSUARIO = "" . $r['PNOMBRE_USUARIO'];
            $SNOMBREUSUARIO = "" . $r['SNOMBRE_USUARIO'];
            $PAPELLIDOUSUARIO = "" . $r['PAPELLIDO_USUARIO'];
            $SAPELLIDOUSUARIO = "" . $r['SAPELLIDO_USUARIO'];

            $CORREO = "" . $r['EMAIL_USUARIO'];
            $TELEFONO = "" . $r['TELEFONO_USUARIO'];
            $TUSUARIO = "" . $r['ID_TUSUARIO'];
        endforeach;

    }
    if ($OP == "1") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verUsuario(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYUSUARIOID = $USUARIO_ADO->verUsuario($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYUSUARIOID as $r) :
            $NOMBREUSUARIO = "" . $r['NOMBRE_USUARIO'];

            $PNOMBREUSUARIO = "" . $r['PNOMBRE_USUARIO'];
            $SNOMBREUSUARIO = "" . $r['SNOMBRE_USUARIO'];
            $PAPELLIDOUSUARIO = "" . $r['PAPELLIDO_USUARIO'];
            $SAPELLIDOUSUARIO = "" . $r['SAPELLIDO_USUARIO'];

            $CORREO = "" . $r['EMAIL_USUARIO'];
            $TELEFONO = "" . $r['TELEFONO_USUARIO'];
            $TUSUARIO = "" . $r['ID_TUSUARIO'];
        endforeach;

    }
    //IDENTIFICACIONES DE OPERACIONES
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION

        $DISABLED = "";
        $DISABLED2 = "disabled";
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verUsuario(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYUSUARIOID = $USUARIO_ADO->verUsuario($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYUSUARIOID as $r) :
            $NOMBREUSUARIO = "" . $r['NOMBRE_USUARIO'];

            $PNOMBREUSUARIO = "" . $r['PNOMBRE_USUARIO'];
            $SNOMBREUSUARIO = "" . $r['SNOMBRE_USUARIO'];
            $PAPELLIDOUSUARIO = "" . $r['PAPELLIDO_USUARIO'];
            $SAPELLIDOUSUARIO = "" . $r['SAPELLIDO_USUARIO'];

            $CORREO = "" . $r['EMAIL_USUARIO'];
            $TELEFONO = "" . $r['TELEFONO_USUARIO'];
            $TUSUARIO = "" . $r['ID_TUSUARIO'];
        endforeach;
    }
    //ver =  OBTENCION DE DATOS PARA LA VISUALIZAAR INFORMAICON DE REGISTRO
    if ($OP == "ver") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verUsuario(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYUSUARIOID = $USUARIO_ADO->verUsuario($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYUSUARIOID as $r) :
            $NOMBREUSUARIO = "" . $r['NOMBRE_USUARIO'];

            $PNOMBREUSUARIO = "" . $r['PNOMBRE_USUARIO'];
            $SNOMBREUSUARIO = "" . $r['SNOMBRE_USUARIO'];
            $PAPELLIDOUSUARIO = "" . $r['PAPELLIDO_USUARIO'];
            $SAPELLIDOUSUARIO = "" . $r['SAPELLIDO_USUARIO'];

            $CORREO = "" . $r['EMAIL_USUARIO'];
            $TELEFONO = "" . $r['TELEFONO_USUARIO'];
            $TUSUARIO = "" . $r['ID_TUSUARIO'];
        endforeach;
    }
}

if ($_POST) {
    

}



?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Usuario</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <?php include_once "../../assest/config/urlHead.php"; ?>
    <script type="text/javascript">
        function validacion() {

            NOMBREUSUARIO = document.getElementById("NOMBREUSUARIO").value;
            PNOMBREUSUARIO = document.getElementById("PNOMBREUSUARIO").value;
            SNOMBREUSUARIO = document.getElementById("SNOMBREUSUARIO").value;
            PAPELLIDOUSUARIO = document.getElementById("PAPELLIDOUSUARIO").value;
            SAPELLIDOUSUARIO = document.getElementById("SAPELLIDOUSUARIO").value;
            TELEFONO = document.getElementById("TELEFONO").value;
            CORREO = document.getElementById("CORREO").value;
            CONTRASENA = document.getElementById("CONTRASENA").value;
            CCONTRASENA = document.getElementById("CCONTRASENA").value;
            TUSUARIO = document.getElementById("TUSUARIO").selectedIndex;


            document.getElementById('val_nombre').innerHTML = "";
            document.getElementById('val_pnombre').innerHTML = "";
            document.getElementById('val_snombre').innerHTML = "";
            document.getElementById('val_papellido').innerHTML = "";
            document.getElementById('val_sapellido').innerHTML = "";
            document.getElementById('val_telefono').innerHTML = "";
            document.getElementById('val_correo').innerHTML = "";
            document.getElementById('val_contrasena').innerHTML = "";
            document.getElementById('val_ccontrasena').innerHTML = "";
            document.getElementById('val_tusuario').innerHTML = "";

            if (NOMBREUSUARIO == null || NOMBREUSUARIO.length == 0 || /^\s+$/.test(NOMBREUSUARIO)) {
                document.form_reg_dato.NOMBREUSUARIO.focus();
                document.form_reg_dato.NOMBREUSUARIO.style.borderColor = "#FF0000";
                document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                return false;
            }
            document.form_reg_dato.NOMBREUSUARIO.style.borderColor = "#4AF575";
      

            if (PNOMBREUSUARIO == null || PNOMBREUSUARIO.length == 0 || /^\s+$/.test(PNOMBREUSUARIO)) {
                document.form_reg_dato.PNOMBREUSUARIO.focus();
                document.form_reg_dato.PNOMBREUSUARIO.style.borderColor = "#FF0000";
                document.getElementById('val_pnombre').innerHTML = "NO A INGRESADO DATO";
                return false;
            }
            document.form_reg_dato.PNOMBREUSUARIO.style.borderColor = "#4AF575";
            /*
            if (SNOMBREUSUARIO == null || SNOMBREUSUARIO.length == 0 || /^\s+$/.test(SNOMBREUSUARIO)) {
                document.form_reg_dato.SNOMBREUSUARIO.focus();
                document.form_reg_dato.SNOMBREUSUARIO.style.borderColor = "#FF0000";
                document.getElementById('val_snombre').innerHTML = "NO A INGRESADO DATO";
                return false;
            }
            document.form_reg_dato.SNOMBREUSUARIO.style.borderColor = "#4AF575";
            */

            if (PAPELLIDOUSUARIO == null || PAPELLIDOUSUARIO.length == 0 || /^\s+$/.test(PAPELLIDOUSUARIO)) {
                document.form_reg_dato.PAPELLIDOUSUARIO.focus();
                document.form_reg_dato.PAPELLIDOUSUARIO.style.borderColor = "#FF0000";
                document.getElementById('val_papellido').innerHTML = "NO A INGRESADO DATO";
                return false;
            }
            document.form_reg_dato.PAPELLIDOUSUARIO.style.borderColor = "#4AF575";
            /*
            if (SAPELLIDOUSUARIO == null || SAPELLIDOUSUARIO.length == 0 || /^\s+$/.test(SAPELLIDOUSUARIO)) {
                document.form_reg_dato.SAPELLIDOUSUARIO.focus();
                document.form_reg_dato.SAPELLIDOUSUARIO.style.borderColor = "#FF0000";
                document.getElementById('val_sapellido').innerHTML = "NO A INGRESADO DATO";
                return false;
            }
            document.form_reg_dato.SAPELLIDOUSUARIO.style.borderColor = "#4AF575";
            */

            /*
            if (TELEFONO == null || TELEFONO == 0) {
                document.form_reg_dato.TELEFONO.focus();
                document.form_reg_dato.TELEFONO.style.borderColor = "#FF0000";
                document.getElementById('val_telefono').innerHTML = "NO A INGRESADO DATO";
                return false;
            }
            document.form_reg_dato.TELEFONO.style.borderColor = "#4AF575";
            */
            if (CORREO == null || CORREO.length == 0 || /^\s+$/.test(CORREO)) {
                document.form_reg_dato.CORREO.focus();
                document.form_reg_dato.CORREO.style.borderColor = "#FF0000";
                document.getElementById('val_correo').innerHTML = "NO A INGRESADO DATO";
                return false;
            }
            document.form_reg_dato.CORREO.style.borderColor = "#4AF575";

            if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
                    .test(CORREO))) {
                document.form_reg_dato.CORREO.focus();
                document.form_reg_dato.CORREO.style.borderColor = "#ff0000";
                document.getElementById('val_correo').innerHTML = "FORMATO DE CORREO INCORRECTO";
                return false;
            }
            document.form_reg_dato.CORREO.style.borderColor = "#4AF575";

            if (CONTRASENA == null || CONTRASENA.length == 0 || /^\s+$/.test(CONTRASENA)) {
                document.form_reg_dato.CONTRASENA.focus();
                document.form_reg_dato.CONTRASENA.style.borderColor = "#FF0000";
                document.getElementById('val_contrasena').innerHTML = "NO A INGRESADO DATO";
                return false;
            }
            document.form_reg_dato.CONTRASENA.style.borderColor = "#4AF575";

            if (CCONTRASENA == null || CCONTRASENA.length == 0 || /^\s+$/.test(CONTRASENA)) {
                document.form_reg_dato.CCONTRASENA.focus();
                document.form_reg_dato.CCONTRASENA.style.borderColor = "#FF0000";
                document.getElementById('val_ccontrasena').innerHTML = "NO A INGRESADO DATO";
                return false;
            }
            document.form_reg_dato.CCONTRASENA.style.borderColor = "#4AF575";

            if (CONTRASENA != CCONTRASENA) {
                document.form_reg_dato.CCONTRASENA.focus();
                document.form_reg_dato.CCONTRASENA.style.borderColor = "#FF0000";
                document.getElementById('val_ccontrasena').innerHTML = "LAS CONTRASENAS DEBEN SER IGUALES";
                return false;
            }
            document.form_reg_dato.CCONTRASENA.style.borderColor = "#4AF575";

            if (TUSUARIO == null || TUSUARIO == 0) {
                document.form_reg_dato.TUSUARIO.focus();
                document.form_reg_dato.TUSUARIO.style.borderColor = "#FF0000";
                document.getElementById('val_tusuario').innerHTML = "NO HA SELECCIONADO NINGUNA ALTERNATIVA";
                return false;
            }
            document.form_reg_dato.TUSUARIO.style.borderColor = "#4AF575";

        }
        function irPagina(url) {
            location.href = "" + url;
        }
    </script>


</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary" >
    <div class="wrapper">
        <?php include_once "../../assest/config/menuExpo.php"; ?>
        <div class="content-wrapper">
            <div class="container-full">

                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            <h3 class="page-title">Usuario</h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                        <li class="breadcrumb-item" aria-current="page">Usuario</li>
                                        <li class="breadcrumb-item active" aria-current="page"> <a href="registroUsuario.php"> Registro Usuario </a> </li>
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
                                    <h4 class="box-title">Registro Usuario</h4>                                                
                                </div>
                                <!-- /.box-header -->
                                <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato">
                                    <div class="box-body">                                      
                                        <hr class="my-15">
                                        <div class="row">
                                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Nombre Usuario</label>                                                    
                                                    <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />                                                    
                                                    <input type="hidden" class="form-control" placeholder="Nombre Usuario" id="NOMBREUSUARIOV" name="NOMBREUSUARIOV" value="<?php echo $NOMBREUSUARIO; ?>"  />                                                    
                                                    <input type="text" class="form-control" placeholder="Nombre Usuario" id="NOMBREUSUARIO" name="NOMBREUSUARIO" value="<?php echo $NOMBREUSUARIO; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLED2; ?> />
                                                    <label id="val_nombre" class="validacion"> <?php echo $MENSAJE; ?> </label>
                                                </div>
                                            </div>      
                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Primer Nombre</label>
                                                    <input type="text" class="form-control" placeholder="Primer Nombre" id="PNOMBREUSUARIO" name="PNOMBREUSUARIO" value="<?php echo $PNOMBREUSUARIO; ?>" <?php echo $DISABLED; ?> />
                                                    <label id="val_pnombre" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Segundo Nombre</label>
                                                    <input type="text" class="form-control" placeholder="Segundo Nombre" id="SNOMBREUSUARIO" name="SNOMBREUSUARIO" value="<?php echo $SNOMBREUSUARIO; ?>" <?php echo $DISABLED; ?> />
                                                    <label id="val_snombre" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Primer Apellido</label>
                                                    <input type="text" class="form-control" placeholder="Primer Apellido" id="PAPELLIDOUSUARIO" name="PAPELLIDOUSUARIO" value="<?php echo $PAPELLIDOUSUARIO; ?>" <?php echo $DISABLED; ?> />
                                                    <label id="val_papellido" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Segundo Apellido</label>
                                                    <input type="text" class="form-control" placeholder="Segundo Apellido" id="SAPELLIDOUSUARIO" name="SAPELLIDOUSUARIO" value="<?php echo $SAPELLIDOUSUARIO; ?>" <?php echo $DISABLED; ?> />
                                                    <label id="val_sapellido" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Telefono</label>
                                                    <input type="number" class="form-control" placeholder="Telefono" id="TELEFONO" name="TELEFONO" value="<?php echo $TELEFONO; ?>" <?php echo $DISABLED; ?> />
                                                    <label id="val_telefono" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Correo</label>
                                                    <input type="text" class="form-control" placeholder="Correo" id="CORREO" name="CORREO" value="<?php echo $CORREO; ?>" <?php echo $DISABLED; ?> />
                                                    <label id="val_correo" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Contraseña</label>
                                                    <input type="text" class="form-control" placeholder="Contraseña" id="CONTRASENA" name="CONTRASENA" value="<?php echo $CONTRASENA; ?>" <?php echo $DISABLED; ?> />
                                                    <label id="val_contrasena" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Confirmar Contraseña</label>
                                                    <input type="text" class="form-control" placeholder="Confirmar Contraseña" id="CCONTRASENA" name="CCONTRASENA" value="<?php echo $CCONTRASENA; ?>" <?php echo $DISABLED; ?> />
                                                    <label id="val_ccontrasena" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Tipo Usuario</label>
                                                    <select class="form-control select2" id="TUSUARIO" name="TUSUARIO" value="<?php echo $TUSUARIO; ?>" <?php echo $DISABLED; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYTUSUARIOS as $r) : ?>
                                                            <?php if ($ARRAYTUSUARIOS) {    ?>
                                                                <option value="<?php echo $r['ID_TUSUARIO']; ?>" 
                                                                <?php if ($TUSUARIO == $r['ID_TUSUARIO']) { echo "selected";  } ?>>
                                                                    <?php echo $r['NOMBRE_TUSUARIO'] ?>
                                                                </option>
                                                            <?php } else { ?>
                                                                <option>No Hay Datos Registrados </option>
                                                            <?php } ?>

                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_tusuario" class="validacion"> </label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.box-body -->
                                           
                                    <div class="box-footer">
                                        <div class="btn-group   col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12 " role="group" aria-label="Acciones generales">                                    
                                            <button type="button" class="btn  btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroUsuario.php');">
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
                                    <h4 class="box-title">Agrupado Usuario</h4>
                                </div>
                                <div class="box-body">
                                    <table id="listar" class="table-hover " style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Nombre Usuario</th>
                                                <th>Estado</th>
                                                <th class="text-center">Operaciónes</th>
                                                <th>Nombre Completo</th>
                                                <th>Tipos Usuario</th>
                                                <th>Correo Usuario</th>
                                                <th>Telefono Usuario</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($ARRAYUSUARIO as $r) : ?>
                                                <?php 
                                                    $ARRAYVERTUSUARIO=$TUSUARIO_ADO->verTusuario($r['ID_TUSUARIO']);
                                                    if($ARRAYVERTUSUARIO){
                                                      $NOMBRETUSUARIO=$ARRAYVERTUSUARIO[0]["NOMBRE_TUSUARIO"];
                                                    }else{
                                                        $NOMBRETUSUARIO="Sin Datos";
                                                    }
                                                    if ($r['ESTADO_REGISTRO'] == 1) {
                                                        $NOMBRESTADO="Habilitado";
                                                    }
                                                    if ($r['ESTADO_REGISTRO'] == 0) {
                                                        $NOMBRESTADO="Desaabilitado";

                                                    }
                                                
                                                ?>
                                                <tr class="center">
                                                    <td>
                                                        <a href="#" class="text-warning hover-warning">
                                                            <?php echo $r['NOMBRE_USUARIO']; ?>
                                                        </a>
                                                    </td>                                                                                                                                                                         
                                                    <td><?php echo $NOMBRESTADO;?></td>                                                                                                                                                                                                                                                                        
                                                    <td class="text-center">
                                                        <form method="post" id="form1">
                                                            <div class="list-icons d-inline-flex">
                                                                <div class="list-icons-item dropdown">
                                                                    <button class="btn btn-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <span class="icon-copy ti-settings"></span>
                                                                    </button>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_USUARIO']; ?>" />
                                                                        <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroUsuario" />                                                                        
                                                                        <?php if ($r['ESTADO_REGISTRO'] == 1) { ?>
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
                                                    <td><?php echo $r['PNOMBRE_USUARIO'] . " " . $r['SNOMBRE_USUARIO'] . " " . $r['PAPELLIDO_USUARIO'] . " " . $r['SAPELLIDO_USUARIO']; ?></td>                                                                                                                                                                        
                                                    <td><?php echo $NOMBRETUSUARIO;?></td>                                                                                                                                                                      
                                                    <td><?php echo $r['EMAIL_USUARIO'];?></td>                                                                                                                                                                      
                                                    <td><?php echo $r['TELEFONO_USUARIO'];?></td> 
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                        <!-- /.box -->
                    </div>
                    <!--.row -->
                </section>
                <!-- /.content -->

            </div>
        </div>



        <?php include_once "../../assest/config/footer.php"; ?>
        <?php include_once "../../assest/config/menuExtraExpo.php"; ?>
    </div>
    <?php include_once "../../assest/config/urlBase.php"; ?>
    <?php        
            //OPERACIONES
            //OPERACION DE REGISTRO DE FILA
            if (isset($_REQUEST['GUARDAR'])) {
                $ARRAYUSUARIOBUSCARNOMBREUSUARIO = $USUARIO_ADO->BuscarUsuarioNombre($_REQUEST['NOMBREUSUARIO']);

                if ($ARRAYUSUARIOBUSCARNOMBREUSUARIO) {
                    $SINO = "1";
                    echo '<script>
                            Swal.fire({
                                icon:"warning",
                                title:"Accion restringida",
                                text:"Existe un registro asociado al nombre de usuario  ingresado",
                                showConfirmButton: true,
                                confirmButtonText:"Cerrar",
                                closeOnConfirm:false
                            })
                        </script>';
                }
                if (empty($ARRAYUSUARIOBUSCARNOMBREUSUARIO)) {
                    $SINO = "0";
                    $MENSAJE = "";
                }
                if ($SINO == "0") {
                    $USUARIO->__SET('NOMBRE_USUARIO', $_REQUEST['NOMBREUSUARIO']);
                    $USUARIO->__SET('PNOMBRE_USUARIO', $_REQUEST['PNOMBREUSUARIO']);
                    $USUARIO->__SET('SNOMBRE_USUARIO', $_REQUEST['SNOMBREUSUARIO']);
                    $USUARIO->__SET('PAPELLIDO_USUARIO', $_REQUEST['PAPELLIDOUSUARIO']);
                    $USUARIO->__SET('SAPELLIDO_USUARIO', $_REQUEST['SAPELLIDOUSUARIO']);
                    $USUARIO->__SET('CONTRASENA_USUARIO', $_REQUEST['CONTRASENA']);
                    $USUARIO->__SET('EMAIL_USUARIO', $_REQUEST['CORREO']);
                    $USUARIO->__SET('TELEFONO_USUARIO', $_REQUEST['TELEFONO']);
                    $USUARIO->__SET('ID_TUSUARIO', $_REQUEST['TUSUARIO']);
                    $USUARIO_ADO->agregarUsuario($USUARIO);

                    $AUSUARIO_ADO->agregarAusuario2("NULL",3,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Usuario.","usuario_usuario","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );  

                    echo '<script>
                        Swal.fire({
                            icon:"success",
                            title:"Registro Creado",
                            text:"El registro de  Usuario se ha creado correctamente",
                            showConfirmButton: true,
                            confirmButtonText:"Cerrar",
                            closeOnConfirm:false
                        }).then((result)=>{
                            location.href = "registroUsuario.php";                            
                        })
                    </script>';
                }
            }
            //OPERACION DE EDICION DE FILA
            if (isset($_REQUEST['EDITAR'])) {
                $USUARIO->__SET('PNOMBRE_USUARIO', $_REQUEST['PNOMBREUSUARIO']);
                $USUARIO->__SET('SNOMBRE_USUARIO', $_REQUEST['SNOMBREUSUARIO']);
                $USUARIO->__SET('PAPELLIDO_USUARIO', $_REQUEST['PAPELLIDOUSUARIO']);
                $USUARIO->__SET('SAPELLIDO_USUARIO', $_REQUEST['SAPELLIDOUSUARIO']);
                $USUARIO->__SET('CONTRASENA_USUARIO', $_REQUEST['CONTRASENA']);
                $USUARIO->__SET('EMAIL_USUARIO', $_REQUEST['CORREO']);
                $USUARIO->__SET('TELEFONO_USUARIO', $_REQUEST['TELEFONO']);
                $USUARIO->__SET('ID_TUSUARIO', $_REQUEST['TUSUARIO']);
                $USUARIO->__SET('ID_USUARIO', $_REQUEST['ID']);
                $USUARIO_ADO->actualizarUsuario($USUARIO);

                $AUSUARIO_ADO->agregarAusuario2("NULL",3,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de Usuario.","usuario_usuario", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );     

                echo '<script>
                    Swal.fire({
                        icon:"info",
                        title:"Registro Modificado",
                        text:"El registro de Usuario se ha modificado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroUsuario.php";                            
                    })
                </script>';
            }
            if (isset($_REQUEST['ELIMINAR'])) {

                
                $USUARIO->__SET('ID_USUARIO', $_REQUEST['ID']);
                $USUARIO_ADO->deshabilitar($USUARIO);

                $AUSUARIO_ADO->agregarAusuario2("NULL",3,4,"".$_SESSION["NOMBRE_USUARIO"].", Deshabilitar Usuario.","usuario_usuario", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );                
                
                echo '<script>
                    Swal.fire({
                        icon:"error",
                        title:"Registro Modificado",
                        text:"El registro de Usuario se ha Deshabilitado correctamente", 
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroUsuario.php";                            
                    })
                </script>';
            }            
            if (isset($_REQUEST['HABILITAR'])) {

                
                $USUARIO->__SET('ID_USUARIO', $_REQUEST['ID']);
                $USUARIO_ADO->habilitar($USUARIO);

                $AUSUARIO_ADO->agregarAusuario2("NULL",3,5,"".$_SESSION["NOMBRE_USUARIO"].", Habilitar Usuario.","usuario_usuario", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );                               

                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Modificado",
                        text:"El registro de Usuario se ha Habilitado correctamente", 
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroUsuario.php";                            
                    })
                </script>';
            }
    ?>
</body>

</html>