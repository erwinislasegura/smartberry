<?php

include_once "../../assest/config/validarUsuarioExpo.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

//INIICIALIZAR MODELO

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

$SINO = "";

$MENSAJE = "";
$CONTADOR=0;

//INICIALIZAR ARREGLOS
$ARRAYUSUARIO = "";
$ARRAYUSUARIOID = "";
$ARRAYTUSUARIOS = "";
$ARRAYUSUARIOBUSCARNOMBREUSUARIO = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYAUSUARIOS = $AUSUARIO_ADO->listarAusuarioTodo();






?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Historial Usuario</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <?php include_once "../../assest/config/urlHead.php"; ?>
    <script type="text/javascript">
      
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
                                        <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Historial Usuario </a> </li>
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
                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                            <div class="box">
                                <div class="box-header with-border bg-info">
                                    <h4 class="box-title">Agrupado Historial Usuario</h4>
                                </div>
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
</body>
</html>