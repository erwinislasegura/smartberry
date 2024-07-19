<?php
include_once "../../assest/config/validarUsuarioMaterial.php";
//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

//INICIALIZAR CONTROLADOR

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD



$MENSAJE = "";
$FOCUS = "";
$BORDER = "";

$IDOP = "";
$OP = "";
$DISABLED = "";

//INICIALIZAR ARREGLOS

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES


$ARRAYAUSUARIOS = $AUSUARIO_ADO->verAusuarioTodo($IDUSUARIOS);


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Mi Actividad</title>
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
            </script>

</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary">
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <?php include_once "../../assest/config/menuMaterial.php"; ?>
            <div class="content-wrapper">
                <div class="container-full">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Mi Actividad</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Perfil</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#">Mi Actividad </a> </li>
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
                                                        <h4 class="media media-single p-15">
                                                            <i class="fa fa-arrow-circle-o-right mr-10"></i>
                                                            <span class="title">
                                                                <a href="editarUsuario.php">
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
                                                    <h4 class="media media-single p-15 bg-info">
                                                        <i class="fa fa-arrow-circle-o-right mr-10"></i>
                                                        <span class="title">
                                                            <a href="#">
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
                                        <h3 class="box-title">Mi Actividad </h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <form class="form" role="form" method="post" name="form_reg_dato"  id="form_reg_dato">
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                    <div class="box-body">
                                                            <table id="listarAusuario" class="table-hover " style="width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th>Fecha Operacion</th>
                                                                    <th>Numero Registro</th>
                                                                    <th>Tipo Modulo</th>
                                                                    <th>Tipo Operacion</th>
                                                                    <th>Actividad</th>
                                                                    <th>Empresa</th>
                                                                    <th>Planta</th>
                                                                    <th>Temporada</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($ARRAYAUSUARIOS as $r) : ?>
                                                                    <?php                 
                                                                    ?>
                                                                    <tr class="center">                                                                                                                                                                                                                  
                                                                        <td><?php echo $r["INGRESO"];?></td>    
                                                                        <td><?php echo $r["NUMERO_REGISTRO"];?></td>                                                                                                                                                                                                                    
                                                                        <td><?php echo $r["TMODULO"];?></td>                                                                                                                                                                                                                     
                                                                        <td><?php echo $r["TOPERACION"];?></td>                                                                                                                                                                                                                    
                                                                        <td><?php echo $r["MENSAJE"];?></td>                                                                                                                                                                                                                    
                                                                        <td><?php echo $r["EMPRESA"];?></td>                                                                                                                                                                                                                    
                                                                        <td><?php echo $r["PLANTA"];?></td>                                                                                                                                                                                                                    
                                                                        <td><?php echo $r["TEMPORADA"];?></td>                                                                                                                                                                                                                   
                                                                    </tr>
                                                                <?php endforeach; ?>
                                                            </tbody>
                                                        </table>
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
                <?php include_once "../../assest/config/menuExtraMaterial.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../../assest/config/urlBase.php"; ?>
</body>

</html>