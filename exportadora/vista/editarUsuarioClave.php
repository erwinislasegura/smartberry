<?php

include_once "../../assest/config/validarUsuarioExpo.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/modelo/USUARIO.php';

//INICIALIZAR CONTROLADOR


//INIICIALIZAR MODELO
$USUARIO =  new USUARIO();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$NOMBREUSUARIO = "";
$CONTRASENA = "";
$CCONTRASENA = "";


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
    endforeach;
}



?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Cambiar Contreseña</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../../assest/config/urlHead.php"; ?>
        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
                function validacion() {

                    CONTRASENA = document.getElementById("CONTRASENA").value;
                    CCONTRASENA = document.getElementById("CCONTRASENA").value;

                    document.getElementById('val_contrasena').innerHTML = "";
                    document.getElementById('val_ccontrasena').innerHTML = "";

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
            <?php include_once "../../assest/config/menuExpo.php"; ?>
            <div class="content-wrapper">
                <div class="container-full">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Cambiar Contreseña</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Perfil</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Cambiar Contreseña </a> </li>
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
                                    <div class="box-body box-profile ">
                                        <!--
                                            <img class="rounded img-fluid mx-auto d-block max-w-150" src="#" alt="User profile picture">
                                        -->
                                        <h3 class="profile-username text-center mb-0 "> <?php echo $NOMBREUSUARIOS; ?> </h3>
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
                                                    <h4 class="media media-single p-15">
                                                        <i class="fa fa-arrow-circle-o-right mr-10"></i>
                                                        <span class="title">
                                                            <a href="editarUsuario.php">
                                                                Editar Perfil
                                                            </a>
                                                        </span>
                                                    </h4>
                                                    <h4 class="media media-single p-15 bg-info">
                                                        <i class="fa fa-arrow-circle-o-right mr-10"></i>
                                                        <span class="title">
                                                            <a href="#">
                                                                Cambiar Contraseña
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
                                        <h3 class="box-title">Cambiar Contraseña </h3>
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
                                                        <label class="col-sm-2 col-form-label"> Contraseña</label>
                                                        <div class="col-sm-10">
                                                            <input type="password" class="form-control" placeholder="Contraseña" id="CONTRASENA" name="CONTRASENA" value="<?php echo $CONTRASENA; ?>" <?php echo $FOCUS; ?> <?php echo  $BORDER; ?> <?php echo $DISABLED; ?> />
                                                        </div>
                                                        <label id="val_contrasena" class="validacion"> </label>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Confirmar Contraseña</label>
                                                        <div class="col-sm-10">
                                                            <input type="password" class="form-control" placeholder="Confirmar Contraseña" id="CCONTRASENA" name="CCONTRASENA" value="<?php echo $CCONTRASENA; ?>" <?php echo $FOCUS; ?> <?php echo  $BORDER; ?> <?php echo $DISABLED; ?> />
                                                        </div>
                                                        <label id="val_ccontrasena" class="validacion"> </label>
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
                <?php include_once "../../assest/config/menuExtraExpo.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../../assest/config/urlBase.php"; ?>
        <?php 
            //OPERACION DE EDICION DE FILA
            if (isset($_REQUEST['EDITAR'])) {
                $USUARIO->__SET('CONTRASENA_USUARIO', $_REQUEST['CONTRASENA']);
                $USUARIO->__SET('ID_USUARIO', $IDUSUARIOS);
                $USUARIO_ADO->actualizarContrasena($USUARIO);

                $AUSUARIO_ADO->agregarAusuario2('NULL',3,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de contraseña, perfil usuario","usuario_usuario",$_SESSION["ID_USUARIO"],$_SESSION["ID_USUARIO"],$_SESSION["ID_EMPRESA"],'NULL',$_SESSION['ID_TEMPORADA'] );            
                echo '<script>
                    Swal.fire({
                        icon:"info",
                        title:"Contraseña Modificado",
                        text:"La Contraseña del Usuario se ha modificado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "editarUsuarioClave.php";                            
                    })
                </script>';
            }
        ?>
</body>
</html>