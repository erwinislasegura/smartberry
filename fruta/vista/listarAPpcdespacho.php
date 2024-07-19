<?php

include_once "../../assest/config/validarUsuarioFruta.php";


//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/VESPECIES_ADO.php';
include_once '../../assest/controlador/PROCESO_ADO.php';
include_once '../../assest/controlador/EEXPORTACION_ADO.php';
include_once '../../assest/controlador/FOLIO_ADO.php';

include_once '../../assest/controlador/EXIEXPORTACION_ADO.php';
include_once '../../assest/controlador/PCDESPACHO_ADO.php';

//INICIALIZAR CONTROLADOR

$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$EXIEXPORTACION_ADO =  new EXIEXPORTACION_ADO();
$FOLIO_ADO =  new FOLIO_ADO();

$EEXPORTACION_ADO =  new EEXPORTACION_ADO();
$PCDESPACHO_ADO =  new PCDESPACHO_ADO();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$TOTALNETO = "";
$TOTALENVASE = "";
$TOTALNETO2 = "";
$TOTALENVASE2 = "";
$FECHADESDE = "";
$FECHAHASTA = "";


//INICIALIZAR ARREGLOS
$ARRAYPCDESPACHO = "";
$ARRAYPCDESPACHOTOTAL = "";



//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES


if ($EMPRESAS  && $PLANTAS && $TEMPORADAS) {
    $ARRAYPCDESPACHO = $PCDESPACHO_ADO->listarPcdespachoCerradoEmpresaPlantaTemporadaCBX($EMPRESAS, $PLANTAS, $TEMPORADAS);
}

include_once "../../assest/config/validarDatosUrl.php";
include_once "../../assest/config/datosUrLAP.php";

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Planificador Carga</title>
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
              
                //FUNCION PARA ABRIR VENTANA QUE SE ENCUENTRA LA OPERACIONES DE DETALLE DE RECEPCION
                function abrirVentana(url) {
                    var opciones =
                        "'directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=1000, height=800'";
                    window.open(url, 'window', opciones);
                }

                function abrirPestana(url) {
                    var win = window.open(url, '_blank');
                    win.focus();
                }
            </script>

</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary" >
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <?php include_once "../../assest/config/menuFruta.php"; ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="container-full">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Apertura Registro</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Apertura Registro</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Planificador Carga </a>
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
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                        <div class="table-responsive">
                                            <table id="pcdespacho" class="table-hover " style="width: 100%;">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>
                                                            <a href="#" class="text-warning hover-warning">
                                                                Número
                                                            </a>
                                                        </th>
                                                        <th>Estado </th>
                                                        <th class="text-center">Operaciónes </th>
                                                        <th>Estado PC</th>
                                                        <th>Fecha PC </th>
                                                        <th>Motivo </th>
                                                        <th>Cantidad Envase </th>
                                                        <th>Kilo Neto </th>
                                                        <th>Empresa</th>
                                                        <th>Planta</th>
                                                        <th>Temporada</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYPCDESPACHO as $r) : ?>

                                                        <?php
                                                        if ($r['ESTADO_PCDESPACHO'] == "1") {
                                                            $ESTADODESPACHO = "Creado";
                                                        }
                                                        if ($r['ESTADO_PCDESPACHO'] == "2") {
                                                            $ESTADODESPACHO = "Confirmado";
                                                        }
                                                        if ($r['ESTADO_PCDESPACHO'] == "3") {
                                                            $ESTADODESPACHO =  "En Despacho";
                                                        }
                                                        if ($r['ESTADO_PCDESPACHO'] == "4") {
                                                            $ESTADODESPACHO = "Despachado";
                                                        }

                                                        $ARRAYEMPRESA = $EMPRESA_ADO->verEmpresa($r['ID_EMPRESA']);
                                                        if ($ARRAYEMPRESA) {
                                                            $NOMBREEMPRESA = $ARRAYEMPRESA[0]['NOMBRE_EMPRESA'];
                                                        } else {
                                                            $NOMBREEMPRESA = "Sin Datos";
                                                        }
                                                        $ARRAYPLANTA = $PLANTA_ADO->verPlanta($r['ID_PLANTA']);
                                                        if ($ARRAYPLANTA) {
                                                            $NOMBREPLANTA = $ARRAYPLANTA[0]['NOMBRE_PLANTA'];
                                                        } else {
                                                            $NOMBREPLANTA = "Sin Datos";
                                                        }
                                                        $ARRAYTEMPORADA = $TEMPORADA_ADO->verTemporada($r['ID_TEMPORADA']);
                                                        if ($ARRAYTEMPORADA) {
                                                            $NOMBRETEMPORADA = $ARRAYTEMPORADA[0]['NOMBRE_TEMPORADA'];
                                                        } else {
                                                            $NOMBRETEMPORADA = "Sin Datos";
                                                        }


                                                        ?>
                                                        <tr class="text-center">
                                                            <td>
                                                                <a href="#" class="text-warning hover-warning">
                                                                    <?php echo $r['NUMERO_PCDESPACHO']; ?>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <?php if ($r['ESTADO'] == "0") { ?>
                                                                    <button type="button" class="btn btn-block btn-danger">Cerrado</button>
                                                                <?php  }  ?>
                                                                <?php if ($r['ESTADO'] == "1") { ?>
                                                                    <button type="button" class="btn btn-block btn-success">Abierto</button>
                                                                <?php  }  ?>
                                                            </td>                              
                                                            <td class="text-center">
                                                                <form method="post" id="form1">
                                                                    <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_PCDESPACHO']; ?>" />
                                                                    <input type="hidden" class="form-control" placeholder="NUMERO" id="NUMERO" name="NUMERO" value="<?php echo $r['NUMERO_PCDESPACHO']; ?>"/>
                                                                    <input type="hidden" class="form-control" placeholder="TABLA" id="TABLA" name="TABLA" value="fruta_pcdespacho" />
                                                                    <input type="hidden" class="form-control" placeholder="COLUMNA" id="COLUMNA" name="COLUMNA" value="ID_PCDESPACHO" />
                                                                    <input type="hidden" class="form-control" placeholder="TITULO" id="TITULO" name="TITULO" value="Planificador Carga" />
                                                                    <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroAP" />
                                                                    <input type="hidden" class="form-control" placeholder="URL" id="URLO" name="URLO" value="listarAPpcdespacho" />
                                                                    <?php if ($r['ESTADO'] == "0") { ?>
                                                                        <span href="#" class="dropdown-item" data-toggle="tooltip" title="Abrir Registro">
                                                                            <button type="submit" class="btn btn-success btn-sm " id="ABRIRURL" name="ABRIRURL">
                                                                                <i class="fa fa-folder-open"></i><br> Abrir
                                                                            </button>
                                                                        </span>
                                                                    <?php } ?>
                                                                </form>
                                                            </td>
                                                            <td><?php echo $ESTADODESPACHO; ?> </td>
                                                            <td><?php echo $r['FECHA']; ?> </td>
                                                            <td><?php echo $r['MOTIVO_PCDESPACHO']; ?> </td>
                                                            <td><?php echo $r['ENVASE']; ?> </td>
                                                            <td><?php echo $r['NETO']; ?> </td>
                                                            <td><?php echo $NOMBREEMPRESA; ?></td>
                                                            <td><?php echo $NOMBREPLANTA; ?></td>
                                                            <td><?php echo $NOMBRETEMPORADA; ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="box-footer">
                                <div class="btn-toolbar mb-3" role="toolbar" aria-label="Datos generales">
                                    <div class="form-row align-items-center" role="group" aria-label="Datos">
                                        <div class="col-auto">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Total Envase</div>
                                                    <button class="btn   btn-default" id="TOTALENVASEV" name="TOTALENVASEV" >                                                           
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Total Neto</div>
                                                    <button class="btn   btn-default" id="TOTALNETOV" name="TOTALNETOV" >                                                           
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            <!-- /.box -->
                    </section>
                    <!-- /.content -->
                </div>
            </div>
            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php include_once "../../assest/config/footer.php"; ?>
                <?php include_once "../../assest/config/menuExtraFruta.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../../assest/config/urlBase.php"; ?>
</body>

</html>