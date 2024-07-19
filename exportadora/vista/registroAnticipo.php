<?php

include_once "../../assest/config/validarUsuarioExpo.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES BASE OPERACION

include_once '../../assest/controlador/BROKER.php';
include_once '../../assest/controlador/Anticipo.php';
include_once '../../assest/modelo/Anticipos.php';
include_once '../../assest/modelo/TMONEDA.php';
include_once '../../assest/controlador/TMONEDA_ADO.php';

$brokers = BrokerController::ctrIndexBroker($_SESSION['ID_EMPRESA']);
$disabled = false;
$temporada = $_SESSION['ID_TEMPORADA'];

if(isset($_GET['hash'])){
    $anticipo = AnticipoController::ctrBuscarAnticipo($_GET['hash']);
    $detalle_anticipos = AnticipoController::getDetalleAnticipo($anticipo[0]['id_anticipo']);
    if(count($detalle_anticipos)>0){
        $suma = AnticipoController::ctrGetSumaAnticipos($anticipo[0]['id_anticipo']);
    }

    $disabled = true;
    $monedas = TMONEDA_ADO::ctrGetMonedas();
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title> Registro Anticipo </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
    <?php include_once "../../assest/config/urlHead.php"; ?>
    <!- FUNCIONES BASES -!>
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
                        <h3 class="page-title">Anticipos</h3>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"> <a href="index.php"> <i class="mdi mdi-home-outline"></i></a></li>
                                    <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                    <li class="breadcrumb-item" aria-current="page">Anticipos</li>
                                    <li class="breadcrumb-item active" aria-current="page"> <a href="#">Registro Anticipos </a>
                                    </li>
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
                    <div class="box-header with-border bg-primary">
                        <h4 class="box-title">Registro de Anticipos</h4>
                    </div>
                    <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato">
                        <div class="box-body ">
                            <div class="row">
                                <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 col-xs-6">
                                    <div class="form-group ">
                                        <label>Correlativo Anticipo</label>
                                        <input type="text" disabled class="form-control" id="id_correlativo" name="id_correlativo" placeholder="Nro. Correlativo" value="<?php echo $disabled ? $anticipo[0]['id_anticipo'] : '';?>">
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-xl-1 col-lg-1 col-md-6 col-sm-6 col-6 col-xs-6">
                                    <div class="form-group">
                                        <label>Cliente</label>
                                        <select class="form-control select2" id="id_broker" name="id_broker" style="width: 100%;"  required <?php echo $disabled ? 'disabled' : '';?>>
                                            <option>Selecciona un cliente</option>
                                            <?php foreach($brokers as $broker){?>
                                                    <?php if($anticipo[0]['id_broker'] == $broker['ID_BROKER']):?>
                                                        <option selected value="<?php echo $broker['ID_BROKER']?>"><?php echo $broker['NOMBRE_BROKER'];?></option>
                                                    <?php else:?>
                                                        <option value="<?php echo $broker['ID_BROKER']?>"><?php echo $broker['NOMBRE_BROKER'];?></option>
                                                    <?php endif;?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 col-xs-6">
                                    <div class="form-group">
                                        <label>Fecha Ingreso</label>
                                        <input type="date" class="form-control" style="background-color: #eeeeee;" placeholder="Fecha Ingreso" id="ingreso_anticipo" name="ingreso_anticipo" value="<?php echo $disabled ? $anticipo[0]['fecha_ingreso'] : '';?>" disabled />
                                    </div>
                                </div>
                                <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 col-xs-6">
                                    <div class="form-group">
                                        <label>Fecha Modificación</label>
                                        <input type="date" class="form-control " style="background-color: #eeeeee;" placeholder="Fecha Modificacion" id="modificacion_anticipo" name="modificacion_anticipo" value="<?php echo $disabled ? $anticipo[0]['fecha_modificacion'] : '';?>" disabled />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Observacion Anticipo </label>
                                <textarea <?php echo $disabled ? 'disabled' : '';?> class="form-control" rows="1"  placeholder="Observacion del anticipo (opcional)  " id="observacion_anticipo" name="observacion_anticipo"><?php echo $disabled ? $anticipo[0]['observacion'] : '';?></textarea>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="toolbar">
                                <div class="btn-group  col-xxl-4 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12" role="group" aria-label="Acciones generales">
                                    <?php if (!isset($_GET['hash'])) { ?>
                                        <button type="button" class="btn btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroValorPago.php');">
                                            <i class="ti-trash"></i> Cancelar
                                        </button>
                                        <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Crear" name="CREAR" value="CREAR"   onclick="return validacion()">
                                            <i class="ti-save-alt"></i> Crear
                                        </button>
                                    <?php } else { ?>
                                        <a class="btn btn-success" href="/exportadora/vista/listarAnticipo.php">Volver</a>
                                        <button class="btn btn-warning btn-guardar">Guardar Cambios</button>
                                        <button disabled class="btn btn-danger">Cerrar</button>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php
                            if(!isset($_GET['hash'])){
                                $crear_anticipo = new AnticipoController();
                                $crear_anticipo->ctrCrearAnticipo($temporada);
                            }
                        ?>
                    </form>
                </div>
                <!--.row -->
                <?php if (isset($_GET['hash'])): ?>
                    <div class="card">
                        <div class="card-header bg-info">
                            <h4 class="card-title">Detalle de Anticipo</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                    <div class="table-responsive">
                                        <table id="detalle" class=" table-hover " style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Nombre Anticipo </th>
                                                    <th>Tipo Moneda</th>
                                                    <th>Valor Anticipo</th>
                                                    <th>Fecha Anticipo</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tr class="center">
                                                <form role="form" method="post">
                                                    <td>
                                                        <input type="text" class="form-control" placeholder="Nombre Anticipo" id="nombre_anticipo" name="nombre_anticipo">
                                                    </td>
                                                    <td>
                                                        <select name="moneda" id="moneda" class="form-control" required>
                                                            <option value="">Selecciona una moneda</option>
                                                            <?php foreach ($monedas as $moneda):?>
                                                                <option value="<?php echo $moneda['ID_TMONEDA']?>"><?php echo $moneda['NOMBRE_TMONEDA']?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input id="valor_anticipo" name="valor_anticipo" type="text" class="form-control" placeholder="$ 00,00">
                                                    </td>
                                                    <td>
                                                        <input id="fecha_anticipo" name="fecha_anticipo" type="date" class="form-control">
                                                    </td>
                                                    <td>
                                                        <div class="btn-group btn-block">
                                                            <button type="submit" class="btn btn-primary">Agregar</button>
                                                        </div>
                                                    </td>
                                                    <?php
                                                    if(isset($_GET['hash'])){
                                                        $agregar_detalle = new AnticipoController();
                                                        $agregar_detalle::ctrAgregarDetalleAnticipo($anticipo[0]['id_anticipo'], $_GET['hash']);
                                                    }
                                                    ?>
                                                </form>
                                            </tr>
                                            <hr>
                                            <?php foreach ($detalle_anticipos as $detalle): ?>
                                            <tr>
                                                <td class="px-3">
                                                    <b><?php echo $detalle['nombre_anticipo'];?></b>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                        $moneda = TMONEDA_ADO::ctrGetMoneda($detalle['moneda']);
                                                        echo $moneda;
                                                    ?>
                                                </td>
                                                <td class="text-center"><?php echo number_format($detalle['valor_anticipo'],0,',','.');?></td>
                                                <td class="text-center">
                                                    <?php
                                                        $date = new DateTime($detalle['fecha_anticipo']);
                                                        echo $date->format('d/m/Y');
                                                    ?>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-block">
                                                        <button hash="<?php echo $_GET['hash'];?>" del_detail="<?php echo base64_encode($detalle['id_detalle_anticipo'])?>" type="button" class="del_detail btn btn-danger">Eliminar</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="form-row">
                                <?php if(!empty($suma)):?>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Total </label>
                                            <input class="text-center" type="text" disabled value="$ <?php echo number_format($suma[0]['suma_pesos'],2,',','.')?>">
                                        </div>
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                <?php endif ?>
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
<script>
    $('.btn-guardar').on('click', function (){
        Swal.fire('Guardado', 'Cambios guardados exitosamente', 'success');
    })

    $('.del_detail').on('click', function(){
        var del_detail = $(this).attr('del_detail');
        var hash = $(this).attr('hash');
        Swal.fire({
            icon:'question',
            title:'Accion requiere de confirmacion',
            text:'Desea realmente eliminar este registro? La accion es irreversible',
            showConfirmButton:true,
            showCancelButton:true,
            confirmButtonText:'Eliminar',
            cancelButtonText:'Cancelar'
        }).then((result)=>{
            if(result.value){
                var datos = new FormData();
                datos.append('del_detail', del_detail);
                $.ajax({
                    url:"../../assest/ajax/borrar_detalle_anticipo.ajax.php",
                    method:"POST",
                    data: datos,
                    cache:false,
                    contentType:false,
                    processData:false,
                    dataType:"json",
                    success:function(respuesta){
                        Swal.fire({
                            icon:'success',
                            title:'Detalle Eliminado',
                            text:'El detalle fue eliminado correctamente',
                            showConfirmButton:true,
                            confirmButtonText:'Ok',
                        }).then((result)=>{
                            <?php if(getenv('APP_ENV') == 'local'):?>
                                window.location = '/exportadora/vista/registroAnticipo.php?hash=' + hash;
                            <?php else:?>
                                window.location = '/fvolcanv2/exportadora/vista/registroAnticipo.php?hash=' + hash;
                            <?php endif;?>
                        });
                    }
                });
            } else {
                Swal.fire('Accion cancelada','La accion fue cancelada por el usuario', 'info');
            }
        })
    })
</script>

</body>

</html>