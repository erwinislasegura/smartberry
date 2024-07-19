

<?php

include_once "../../assest/config/validarUsuarioOpera.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

//INICIALIZAR CONTROLADOR


//INIICIALIZAR MODELO
$USUARIO =  new USUARIO();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$RUTUSUARIO = "";
$NOMBREUSUARIO = "";
$PNOMBREUSUARIO = "";
$SNOMBREUSUARIO = "";
$PAPELLIDOUSUARIO = "";
$SAPELLIDOUSUARIO = "";
$CORREO = "";
$TELEFONO = "";


$MENSAJE = "";
$FOCUS = "";
$BORDER = "";

$IDOP = "";
$OP = "";
$DISABLED = "";

//INICIALIZAR ARREGLOS
$ARRAYYVERUSUARIOID = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES








if (isset($NOMBREUSUARIOS)) {
    //$DISABLED="disabled";
    $ARRAYYVERUSUARIOID = $USUARIO_ADO->verUsuario($IDUSUARIOS);
    foreach ($ARRAYYVERUSUARIOID as $r) :

        $NOMBREUSUARIO = "" . $r['NOMBRE_USUARIO'];

        $PNOMBREUSUARIO = "" . $r['PNOMBRE_USUARIO'];
        $SNOMBREUSUARIO = "" . $r['SNOMBRE_USUARIO'];
        $PAPELLIDOUSUARIO = "" . $r['PAPELLIDO_USUARIO'];
        $SAPELLIDOUSUARIO = "" . $r['SAPELLIDO_USUARIO'];

        $CORREO = "" . $r['EMAIL_USUARIO'];
        $TELEFONO = "" . $r['TELEFONO_USUARIO'];
    endforeach;
}



?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Editar Perfil</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../../assest/config/urlHead.php"; ?>
        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
                function validacion() {

                    NOMBREUSUARIO = document.getElementById("NOMBREUSUARIO").value;

                    PNOMBREUSUARIO = document.getElementById("PNOMBREUSUARIO").value;
                    SNOMBREUSUARIO = document.getElementById("SNOMBREUSUARIO").value;
                    PAPELLIDOUSUARIO = document.getElementById("PAPELLIDOUSUARIO").value;
                    SAPELLIDOUSUARIO = document.getElementById("SAPELLIDOUSUARIO").value;

                    RUTUSUARIO = document.getElementById("RUTUSUARIO").value;
                    TELEFONO = document.getElementById("TELEFONO").value;
                    CORREO = document.getElementById("CORREO").value;


                    document.getElementById('val_nombre').innerHTML = "";

                    document.getElementById('val_pnombre').innerHTML = "";
                    document.getElementById('val_snombre').innerHTML = "";
                    document.getElementById('val_papellido').innerHTML = "";
                    document.getElementById('val_sapellido').innerHTML = "";

                    document.getElementById('val_rutusuario').innerHTML = "";
                    document.getElementById('val_telefono').innerHTML = "";
                    document.getElementById('val_correo').innerHTML = "";

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

                    if (SNOMBREUSUARIO == null || SNOMBREUSUARIO.length == 0 || /^\s+$/.test(SNOMBREUSUARIO)) {
                        document.form_reg_dato.SNOMBREUSUARIO.focus();
                        document.form_reg_dato.SNOMBREUSUARIO.style.borderColor = "#FF0000";
                        document.getElementById('val_snombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.SNOMBREUSUARIO.style.borderColor = "#4AF575";


                    if (PAPELLIDOUSUARIO == null || PAPELLIDOUSUARIO.length == 0 || /^\s+$/.test(PAPELLIDOUSUARIO)) {
                        document.form_reg_dato.PAPELLIDOUSUARIO.focus();
                        document.form_reg_dato.PAPELLIDOUSUARIO.style.borderColor = "#FF0000";
                        document.getElementById('val_papellido').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.PAPELLIDOUSUARIO.style.borderColor = "#4AF575";

                    if (SAPELLIDOUSUARIO == null || SAPELLIDOUSUARIO.length == 0 || /^\s+$/.test(SAPELLIDOUSUARIO)) {
                        document.form_reg_dato.SAPELLIDOUSUARIO.focus();
                        document.form_reg_dato.SAPELLIDOUSUARIO.style.borderColor = "#FF0000";
                        document.getElementById('val_sapellido').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.SAPELLIDOUSUARIO.style.borderColor = "#4AF575";



                    if (TELEFONO == null || TELEFONO == 0) {
                        document.form_reg_dato.TELEFONO.focus();
                        document.form_reg_dato.TELEFONO.style.borderColor = "#FF0000";
                        document.getElementById('val_telefono').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.TELEFONO.style.borderColor = "#4AF575";

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
            <?php include_once "../../assest/config/menuOpera.php"; ?>
            <div class="content-wrapper">
                <div class="container-full">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Editar Perfil</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Perfil</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Editar Perfil </a> </li>
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
                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 col-xs-12">
                                <!-- Profile Image -->
                                <div class="box">
                                    <div class="box-body box-profile">
                                        <!--
                                            <img class="rounded img-fluid mx-auto d-block max-w-150" src="#" alt="User profile picture">
                                        -->
                                        <h3 class="profile-username text-center mb-0"> <?php echo $NOMBREUSUARIOS; ?> </h3>
                                        <h4 class="text-center mt-0">
                                            <i class="fa fa-envelope-o mr-10"></i>
                                            <?php
                                            $ARRAYTUSUARIO = $TUSUARIO_ADO->verTusuario($_SESSION["TIPO_USUARIO"]);

                                            if ($ARRAYTUSUARIO) {
                                                echo $ARRAYTUSUARIO[0]['NOMBRE_TUSUARIO'];
                                            }

                                            ?>
                                        </h4>
                                        <div class="row">
                                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="media-list media-list-hover media-list-divided w-p100 mt-30">
                                                    <h4 class="media media-single p-15">
                                                        <i class="fa fa-arrow-circle-o-right mr-10"></i>
                                                        <span class="title">
                                                            <a href="verUsuario.php">
                                                                Mi Perfil
                                                            </a>
                                                        </span>
                                                    </h4>
                                                    <h4 class="media media-single p-15 bg-info">
                                                        <i class="fa fa-arrow-circle-o-right mr-10"></i>
                                                        <span class="title">
                                                            <a href="#">
                                                                Editar Perfil
                                                            </a>
                                                        </span>
                                                    </h4>
                                                    <h4 class="media media-single p-15">
                                                        <i class="fa fa-arrow-circle-o-right mr-10"></i>
                                                        <span class="title">
                                                            <a href="editarUsuarioClave.php">
                                                                Cambiar Contrasena
                                                            </a>
                                                        </span>
                                                    </h4>
                                                    <h4 class="media media-single p-15">
                                                        <i class="fa fa-arrow-circle-o-right mr-10"></i>
                                                        <span class="title">
                                                            <a href="verUsuarioActividad.php">
                                                                Mi Actividad
                                                            </a>
                                                        </span>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                            </div>
                            <!-- /.col -->
                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 col-xs-12">
                                <div class="box">
                                    <div class="box-header with-border bg-info">
                                        <h3 class="box-title">Editar Perfil </h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato">
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Nombre Usuario</label>
                                                        <div class="col-sm-10">
                                                            <input type="hidden" class="form-control" placeholder="Nombre Usuario" id="NOMBREUSUARIOV" name="NOMBREUSUARIOV" value="<?php echo $NOMBREUSUARIO; ?>" <?php echo $FOCUS; ?> <?php echo  $BORDER; ?> />
                                                            <input type="text" class="form-control" placeholder="Nombre Usuario" id="NOMBREUSUARIO" name="NOMBREUSUARIO" value="<?php echo $NOMBREUSUARIO; ?>" <?php echo $FOCUS; ?> <?php echo  $BORDER; ?> disabled />
                                                        </div>
                                                        <label id="val_nombre" class="validacion"> </label>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Primer Nombre</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" placeholder="Primer Nombre" id="PNOMBREUSUARIO" name="PNOMBREUSUARIO" value="<?php echo $PNOMBREUSUARIO; ?>" <?php echo $FOCUS; ?> <?php echo  $BORDER; ?> <?php echo $DISABLED; ?> />
                                                        </div>
                                                        <label id="val_snombre" class="validacion"> </label>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Segundo Nombre</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" placeholder="Segundo Nombre" id="SNOMBREUSUARIO" name="SNOMBREUSUARIO" value="<?php echo $SNOMBREUSUARIO; ?>" <?php echo $FOCUS; ?> <?php echo  $BORDER; ?> <?php echo $DISABLED; ?> />
                                                        </div>
                                                        <label id="val_snombre" class="validacion"> </label>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Primer Apellido</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" placeholder="Primer Apellido" id="PAPELLIDOUSUARIO" name="PAPELLIDOUSUARIO" value="<?php echo $PAPELLIDOUSUARIO; ?>" <?php echo $FOCUS; ?> <?php echo  $BORDER; ?> <?php echo $DISABLED; ?> />
                                                        </div>
                                                        <label id="val_papellido" class="validacion"> </label>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Segundo Apellido</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" placeholder="Segundo Apellido" id="SAPELLIDOUSUARIO" name="SAPELLIDOUSUARIO" value="<?php echo $SAPELLIDOUSUARIO; ?>" <?php echo $FOCUS; ?> <?php echo  $BORDER; ?> <?php echo $DISABLED; ?> />
                                                        </div>
                                                        <label id="val_sapellido" class="validacion"> </label>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Telefono </label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" placeholder="Telefono" id="TELEFONO" name="TELEFONO" value="<?php echo $TELEFONO; ?>" <?php echo $FOCUS; ?> <?php echo  $BORDER; ?> <?php echo $DISABLED; ?> />
                                                        </div>
                                                        <label id="val_telefono" class="validacion"> </label>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Correo </label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" placeholder="Correo" id="CORREO" name="CORREO" value="<?php echo $CORREO; ?>" <?php echo $FOCUS; ?> <?php echo  $BORDER; ?> <?php echo $DISABLED; ?> />
                                                        </div>
                                                        <label id="val_correo" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->
                                        </div>                                        
                                        <div class="box-footer">
                                            <div class="btn-group   col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12 " role="group" aria-label="Acciones generales">                                    
                                                <button type="button" class="btn  btn-success " data-toggle="tooltip" title="Volver" name="CANCELAR" value="CANCELAR" Onclick="irPagina('index.php');">
                                                    <i class="ti-back-left "></i> Volver
                                                </button>  
                                                <button type="submit" class="btn  btn-primary"  data-toggle="tooltip" title="Guardar" name="EDITAR" value="EDITAR">
                                                    <i class="ti-save-alt"></i> Guardar
                                                </button>                                             
                                            </div>
                                        </div>
                                    </form>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                            </div>
                            <!-- /.col -->
                        </div>
                    </section>
                    <!-- /.content -->
                </div>
            </div>

            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php include_once "../../assest/config/footer.php"; ?>
                <?php include_once "../../assest/config/menuExtraOpera.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../../assest/config/urlBase.php"; ?>
        <?php 
            //OPERACION DE EDICION DE FILA
            if (isset($_REQUEST['EDITAR'])) {
                $USUARIO->__SET('PNOMBRE_USUARIO', $_REQUEST['PNOMBREUSUARIO']);
                $USUARIO->__SET('SNOMBRE_USUARIO', $_REQUEST['SNOMBREUSUARIO']);
                $USUARIO->__SET('PAPELLIDO_USUARIO', $_REQUEST['PAPELLIDOUSUARIO']);
                $USUARIO->__SET('SAPELLIDO_USUARIO', $_REQUEST['SAPELLIDOUSUARIO']);
                $USUARIO->__SET('EMAIL_USUARIO', $_REQUEST['CORREO']);
                $USUARIO->__SET('TELEFONO_USUARIO', $_REQUEST['TELEFONO']);
                $USUARIO->__SET('ID_USUARIO', $IDUSUARIOS);
                $USUARIO_ADO->actualizarPerfil($USUARIO);

                $AUSUARIO_ADO->agregarAusuario2('NULL',4,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de datos, perfil usuario","usuario_usuario",$_SESSION["ID_USUARIO"],$_SESSION["ID_USUARIO"],'NULL','NULL',$_SESSION['ID_TEMPORADA'] );            

                echo '<script>
                    Swal.fire({
                        icon:"info",
                        title:"Registro Modificado",
                        text:"El pefil de Usuario se ha modificado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "editarUsuario.php";                            
                    })
                </script>';
            }

        
        ?>
</body>
</html>