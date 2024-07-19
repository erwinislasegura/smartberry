<?php

include_once "../../assest/config/validarUsuarioExpo.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/FICHA_ADO.php';
include_once '../../assest/controlador/EEXPORTACION_ADO.php';
include_once '../../assest/controlador/ECOMERCIAL_ADO.php';
include_once '../../assest/controlador/ESPECIES_ADO.php';
include_once '../../assest/controlador/MERCADO_ADO.php';
include_once '../../assest/controlador/TETIQUETA_ADO.php';
include_once '../../assest/controlador/TEMBALAJE_ADO.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$FICHA_ADO =  new FICHA_ADO();
$EEXPORTACION_ADO =  new EEXPORTACION_ADO();
$ECOMERCIAL_ADO =  new ECOMERCIAL_ADO();
$ESPECIES_ADO =  new ESPECIES_ADO();
$MERCADO_ADO =  new MERCADO_ADO();
$TETIQUETA_ADO =  new TETIQUETA_ADO();
$TEMBALAJE_ADO =  new TEMBALAJE_ADO();

//INIICIALIZAR MODELO

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";

$TOTALCANTIDAD = "";
$TOTCALVALOR = "";


//INICIALIZAR ARREGLOS
$ARRAYFICHA = "";
$ARRAYFICHATOTALES = "";
$ARRAYESTANDAR = "";
$ARRAYVEREMPRESA = "";
$ARRAYVERTEMPORADA = "";
$ARRAYMERCADO = "";
$ARRAYESTANDARCOMERCIAL = "";
$ARRAYESTANDAR = "";
$ARRAYESPECIES = "";
$ARRAYTEMBALAJE = "";
$ARRAYTETIQUETA = "";



//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
if ($EMPRESAS  && $TEMPORADAS) {
    $ARRAYFICHA = $FICHA_ADO->listarFichaCerradoPorEmpresaTemporadaCBX($EMPRESAS,  $TEMPORADAS);
}
include_once "../../assest/config/validarDatosUrl.php";
include_once "../../assest/config/datosUrLAP.php";



?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title> Ficha Consumo</title>
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

                /*
                function refrescar() {
                    document.getElementById("form_reg_dato").submit();
                }*/

                //FUNCION PARA ABRIR UNA NUEVA PESTAÑA 
                function abrirPestana(url) {
                    var win = window.open(url, '_blank');
                    win.focus();
                }
                //FUNCION PARA ABRIR VENTANA QUE SE ENCUENTRA LA OPERACIONES DE DETALLE DE OCOMPRA
                function abrirVentana(url) {
                    var opciones =
                        "'directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=1000, height=800'";
                    window.open(url, 'window', opciones);
                }
            </script>
</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary" >
    <div class="wrapper">
        <?php include_once "../../assest/config/menuExpo.php"; ?>
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
                                        <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Ficha Consumo </a>
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
                                        <table id="modulo" class="table-hover " style="width: 150%;">
                                            <thead>
                                                <tr>
                                                    <th>Número Ficha </th>
                                                    <th class="text-center">Estado</th>
                                                    <th class="text-center">Operaciónes</th>
                                                    <th>Envase/Estandar </th>
                                                    <th>Estandar Comercial</th>
                                                    <th>Especies </th>
                                                    <th>Tipo Etiqueta </th>
                                                    <th>Tipo Embalaje </th>
                                                    <th>Fecha Ingreso</th>
                                                    <th>Fecha Modificación</th>
                                                    <th>Empresa </th>
                                                    <th>Temporada </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($ARRAYFICHA as $r) : ?>
                                                    <?php
                                                    $ARRAYESTANDAR = $EEXPORTACION_ADO->verEstandar($r['ID_ESTANDAR']);
                                                    if ($ARRAYESTANDAR) {
                                                        $NOMBRESTANDAR = $ARRAYESTANDAR[0]["CODIGO_ESTANDAR"] . ":" . $ARRAYESTANDAR[0]["NOMBRE_ESTANDAR"];
                                                        $ENVASEESTANDAR = $ARRAYESTANDAR[0]["CANTIDAD_ENVASE_ESTANDAR"];
                                                        $PESOENVASEESTANDAR = $ARRAYESTANDAR[0]["PESO_ENVASE_ESTANDAR"];
                                                        $TETIQUETA = $ARRAYESTANDAR[0]["ID_TETIQUETA"];
                                                        $TEMBALAJE = $ARRAYESTANDAR[0]["ID_TEMBALAJE"];
                                                        $ESPECIES = $ARRAYESTANDAR[0]["ID_ESPECIES"];
                                                        $ESTANDARCOMERCIAL = $ARRAYESTANDAR[0]["ID_ECOMERCIAL"];
                                                        $ARRAYTETIQUETA = $TETIQUETA_ADO->verEtiqueta($TETIQUETA);
                                                        $ARRAYTEMBALAJE = $TEMBALAJE_ADO->verEmbalaje($TEMBALAJE);
                                                        $ARRAYESPECIES = $ESPECIES_ADO->verEspecies($ESPECIES);
                                                        $ARRAYESTANDARCOMERCIAL = $ECOMERCIAL_ADO->verEcomercial($ESTANDARCOMERCIAL);

                                                        if ($ARRAYTETIQUETA) {
                                                            $NOMBRETETIQUETA = $ARRAYTETIQUETA[0]["NOMBRE_TETIQUETA"];
                                                        } else {
                                                            $NOMBRETETIQUETA = "Sin Datos";
                                                        }
                                                        if ($ARRAYTEMBALAJE) {
                                                            $NOMBRETEMBALAJE = $ARRAYTEMBALAJE[0]["NOMBRE_TEMBALAJE"];
                                                        } else {
                                                            $NOMBRETEMBALAJE = "Sin Datos";
                                                        }
                                                        if ($ARRAYMERCADO) {
                                                            $NOMBREMERCADO = $ARRAYMERCADO[0]["NOMBRE_MERCADO"];
                                                        } else {
                                                            $NOMBREMERCADO = "Sin Datos";
                                                        }
                                                        if ($ARRAYESPECIES) {
                                                            $NOMBREESPECIES = $ARRAYESPECIES[0]["NOMBRE_ESPECIES"];
                                                        } else {
                                                            $NOMBREESPECIES = "Sin Datos";
                                                        }
                                                        if ($ARRAYESTANDARCOMERCIAL) {
                                                            $NOMBREESTANDARCOMERCIAL = $ARRAYESTANDARCOMERCIAL[0]["CODIGO_ECOMERCIAL"] . ":" . $ARRAYESTANDARCOMERCIAL[0]["NOMBRE_ECOMERCIAL"];
                                                        } else {
                                                            $NOMBREESTANDARCOMERCIAL = "Sin Datos";
                                                        }
                                                    } else {
                                                        $NOMBRESTANDAR = "Sin Datos";
                                                    }

                                                    $ARRAYVEREMPRESA = $EMPRESA_ADO->verEmpresa($r['ID_EMPRESA']);
                                                    if ($ARRAYVEREMPRESA) {
                                                        $NOMBREEMPRESA = $ARRAYVEREMPRESA[0]['NOMBRE_EMPRESA'];
                                                    } else {
                                                        $NOMBREEMPRESA = "Sin Datos";
                                                    }
                                                    $ARRAYVERTEMPORADA = $TEMPORADA_ADO->verTemporada($r['ID_TEMPORADA']);
                                                    if ($ARRAYVERTEMPORADA) {
                                                        $NOMBRETEMPORADA = $ARRAYVERTEMPORADA[0]['NOMBRE_TEMPORADA'];
                                                    } else {
                                                        $NOMBRETEMPORADA = "Sin Datos";
                                                    }
                                                    ?>
                                                    <tr>
                                                        <td> <?php echo $r['NUMERO_FICHA']; ?> </td>
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
                                                                <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_FICHA']; ?>" />
                                                                <input type="hidden" class="form-control" placeholder="NUMERO" id="NUMERO" name="NUMERO" value="<?php echo $r['NUMERO_FICHA']; ?>"/>
                                                                <input type="hidden" class="form-control" placeholder="TABLA" id="TABLA" name="TABLA" value="material_ficha" />
                                                                <input type="hidden" class="form-control" placeholder="COLUMNA" id="COLUMNA" name="COLUMNA" value="ID_FICHA" />
                                                                <input type="hidden" class="form-control" placeholder="TITULO" id="TITULO" name="TITULO" value="Ficha Consumo" />
                                                                <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroAP" />
                                                                <input type="hidden" class="form-control" placeholder="URL" id="URLO" name="URLO" value="listarAPficha" />
                                                                <?php if ($r['ESTADO'] == "0") { ?>
                                                                    <span href="#" class="dropdown-item" data-toggle="tooltip" title="Abrir Registro">
                                                                        <button type="submit" class="btn btn-success btn-sm " id="ABRIRURL" name="ABRIRURL">
                                                                            <i class="fa fa-folder-open"></i><br> Abrir
                                                                        </button>
                                                                    </span>
                                                                <?php } ?>
                                                            </form>
                                                        </td>    
                                                        <td> <?php echo $NOMBRESTANDAR; ?></td>
                                                        <td> <?php echo $NOMBREESTANDARCOMERCIAL; ?></td>
                                                        <td> <?php echo $NOMBREESPECIES; ?></td>
                                                        <td> <?php echo $NOMBRETETIQUETA; ?>
                                                        <td> <?php echo $NOMBRETEMBALAJE; ?>
                                                        <td><?php echo $r['INGRESO']; ?></td>
                                                        <td><?php echo $r['MODIFICACION']; ?></td>
                                                        <td> <?php echo $NOMBRETEMPORADA; ?>
                                                        <td> <?php echo $NOMBRETEMPORADA; ?>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
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