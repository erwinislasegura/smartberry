<?php
    include_once "../../assest/config/validarUsuarioExpo.php";
    include_once '../../assest/controlador/BROKER.php';
    include_once "../../assest/controlador/Anticipo.php";
    include_once "../../assest/modelo/Anticipos.php";

    $anticipos = AnticipoController::ctrListarAnticipos();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Listar Anticipos</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <?php include_once "../../assest/config/urlHead.php"; ?>
</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary">
<div class="wrapper">
    <?php include_once "../../assest/config/menuExpo.php"; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">

            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="page-title">Anticipos</h3>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"> <a href="index.php"> <i class="mdi mdi-home-outline"></i></a></li>
                                    <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                    <li class="breadcrumb-item" aria-current="page">Anticipos</li>
                                    <li class="breadcrumb-item active" aria-current="page"> <a href="#">Registro de Anticipos</a> </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <?php include_once "../../assest/config/verIndicadorEconomico.php"; ?>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="box">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                <div class="table-responsive">
                                    <table id="modulo" class="table-hover " style="width: 100%;">
                                        <thead>
                                            <tr class="text-center">
                                                <th>Acciones</th>
                                                <th>Cliente</th>
                                                <th>Estado</th>
                                                <th>Total Anticipo</th>
                                                <th>Creado por</th>
                                                <th>Observacion</th>
                                                <th>Ingreso</th>
                                                <th>Actualizacion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($anticipos as $anticipo):?>
                                                <tr>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Acciones
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <?php
                                                                    if(getenv('APP_ENV') == 'dev')
                                                                    {
                                                                        $prefix = '';
                                                                    } else {
                                                                        $prefix = '/fvolcanv2';
                                                                    }
                                                                ?>
                                                                <a class="dropdown-item text-center btn btn-success" href="<?php echo $prefix.'/exportadora/vista/registroAnticipo.php?hash='.$anticipo['hash'];?>">Ver</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $broker = BROKER::mdlGetBrokerName($anticipo['id_broker']);
                                                            echo $broker;
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php if($anticipo['estado'] == 1){ ?>
                                                            <span class="badge badge-success">Abierto</span>
                                                        <?php } else { ?>
                                                            <span class="badge badge-danger">Cerrado</span>
                                                        <?php } ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php
                                                            $totalAnticipos = 0;
                                                            $totalAnticipos = AnticipoController::ctrGetSumaAnticipos($anticipo['id_anticipo']);
                                                            if ($totalAnticipos != null)
                                                            {
                                                                echo number_format($totalAnticipos,0,',','.');
                                                            } else {
                                                                echo '0';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td class="text-uppercase">
                                                        <?php
                                                            $usuario = USUARIO_ADO::getUserName($anticipo['id_usuario']);
                                                            echo $usuario;
                                                        ?>
                                                    </td>
                                                    <td><?php echo $anticipo['observacion']; ?></td>
                                                    <td class="text-center">
                                                        <?php
                                                            $date = new DateTime($anticipo['fecha_ingreso']);
                                                            echo $date->format('d-m-Y');
                                                        ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php
                                                            $date = new DateTime($anticipo['fecha_modificacion']);
                                                            echo $date->format('d-m-Y');
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box -->

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