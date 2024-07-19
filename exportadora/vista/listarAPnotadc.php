<?php

include_once "../../assest/config/validarUsuarioExpo.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES/

include_once '../../assest/controlador/CONSIGNATARIO_ADO.php';

include_once '../../assest/controlador/TRANSPORTE_ADO.php';
include_once '../../assest/controlador/LCARGA_ADO.php';
include_once '../../assest/controlador/LDESTINO_ADO.php';

include_once '../../assest/controlador/LAEREA_ADO.php';
include_once '../../assest/controlador/ACARGA_ADO.php';
include_once '../../assest/controlador/ADESTINO_ADO.php';

include_once '../../assest/controlador/NAVIERA_ADO.php';
include_once '../../assest/controlador/PCARGA_ADO.php';
include_once '../../assest/controlador/PDESTINO_ADO.php';


include_once '../../assest/controlador/FPAGO_ADO.php';
include_once '../../assest/controlador/MVENTA_ADO.php';


include_once '../../assest/controlador/EEXPORTACION_ADO.php';
include_once '../../assest/controlador/ESPECIES_ADO.php';
include_once '../../assest/controlador/VESPECIES_ADO.php';
include_once '../../assest/controlador/TCALIBRE_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/RFINAL_ADO.php';



include_once '../../assest/controlador/ICARGA_ADO.php';
include_once '../../assest/controlador/DICARGA_ADO.php';



include_once '../../assest/controlador/NOTADC_ADO.php';
include_once '../../assest/controlador/DNOTADC_ADO.php';




//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$CONSIGNATARIO_ADO =  new CONSIGNATARIO_ADO();

$TRANSPORTE_ADO =  new TRANSPORTE_ADO();
$LCARGA_ADO =  new LCARGA_ADO();
$LDESTINO_ADO =  new LDESTINO_ADO();

$LAEREA_ADO =  new LAEREA_ADO();
$ACARGA_ADO =  new ACARGA_ADO();
$ADESTINO_ADO =  new ADESTINO_ADO();

$NAVIERA_ADO =  new NAVIERA_ADO();
$PCARGA_ADO =  new PCARGA_ADO();
$PDESTINO_ADO =  new PDESTINO_ADO();

$FPAGO_ADO =  new FPAGO_ADO();
$MVENTA_ADO =  new MVENTA_ADO();

$EEXPORTACION_ADO = new EEXPORTACION_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$ESPECIES_ADO =  new ESPECIES_ADO();
$TCALIBRE_ADO =  new TCALIBRE_ADO();
$PRODUCTOR_ADO = new PRODUCTOR_ADO();
$TCALIBRE_ADO = new TCALIBRE_ADO();
$RFINAL_ADO = new RFINAL_ADO();

$ICARGA_ADO =  new ICARGA_ADO();
$DICARGA_ADO =  new DICARGA_ADO();

$NOTADC_ADO =  new NOTADC_ADO();
$DNOTADC_ADO =  new DNOTADC_ADO();
//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD


//INICIALIZAR ARREGLOS
$ARRAYNOTADC = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES



if ($EMPRESAS   && $TEMPORADAS) {

    $ARRAYNOTADC = $NOTADC_ADO->listarNotaCerradoEmpresaTemporadaCBX($EMPRESAS,  $TEMPORADAS);

 
}

include_once "../../assest/config/validarDatosUrl.php";
include_once "../../assest/config/datosUrLAP.php";




?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Nota D/C</title>
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

                function refrescar() {
                    document.getElementById("form_reg_dato").submit();
                }

                function abrirPestana(url) {
                    var win = window.open(url, '_blank');
                    win.focus();
                }
                //FUNCION PARA ABRIR VENTANA QUE SE ENCUENTRA LA OPERACIONES DE DETALLE DE RECEPCION
                function abrirVentana(url) {
                    var opciones =
                        "'directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=1000, height=800'";
                    window.open(url, 'window', opciones);
                }
            </script>
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
                            <h3 class="page-title">Apertura Registro</h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                        <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                        <li class="breadcrumb-item" aria-current="page">Apertura Registro</li>
                                        <li class="breadcrumb-item active" aria-current="page"> <a href="#">  Nota D/C </a>
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
                                        <table id="modulo" class="table-hover " style="width: 100%;">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Número Nota</th>
                                                    <th>Estado</th>
                                                    <th class="text-center">Operaciónes</th>
                                                    <th>Fecha Nota </th>
                                                    <th>Tipo Nota </th>                                                    
                                                    <th>Número Referencia  </th>
                                                    <th>Recibidor Final </th>
                                                    <th>Número Invoice  </th>
                                                    <th>Motivo Nota </th>
                                                    <th>Fecha Ingreso</th>
                                                    <th>Fecha Modificación</th>
                                                    <th>Semana Nota </th>
                                                    <th>Empresa</th>
                                                    <th>Temporada</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($ARRAYNOTADC as $r) : ?>

                                                    <?php

                                                    if($r['TNOTA']==1){
                                                        $NOMBRETNOTA="Debito";
                                                    }else  if($r['TNOTA']==2){
                                                        $NOMBRETNOTA="Credito";
                                                    }else{
                                                        $NOMBRETNOTA="Sin Datos";
                                                    }
                                                    $ARRAYICARGA=$ICARGA_ADO->verIcarga2($r["ID_ICARGA"]);
                                                    if($ARRAYICARGA){
                                                        $NUMEROIREFERENCIA=$ARRAYICARGA[0]["NREFERENCIA_ICARGA"];
                                                        $NUMEROICARGA=$ARRAYICARGA[0]["NUMERO_ICARGA"];
                                                        $ARRAYRFINAL=$RFINAL_ADO->verRfinal($ARRAYICARGA[0]["ID_RFINAL"]);
                                                        if($ARRAYRFINAL){
                                                            $NOMBRERFINAL=$ARRAYRFINAL[0]["NOMBRE_RFINAL"];
                                                        }else{
                                                            $NOMBRERFINAL="Sin Datos";
                                                        }
                                                    }else{
                                                        $NUMEROIREFERENCIA="Sin Datos";
                                                        $NUMEROICARGA="Sin Datos";
                                                        $NOMBRERFINAL="Sin Datos";
                                                    }

                                                    $ARRAYEMPRESA = $EMPRESA_ADO->verEmpresa($r['ID_EMPRESA']);
                                                    if ($ARRAYEMPRESA) {
                                                        $NOMBREEMPRESA = $ARRAYEMPRESA[0]['NOMBRE_EMPRESA'];
                                                    } else {
                                                        $NOMBREEMPRESA = "Sin Datos";
                                                    }
                                                    $ARRAYTEMPORADA = $TEMPORADA_ADO->verTemporada($r['ID_TEMPORADA']);
                                                    if ($ARRAYTEMPORADA) {
                                                        $NOMBRETEMPORADA = $ARRAYTEMPORADA[0]['NOMBRE_TEMPORADA'];
                                                    } else {
                                                        $NOMBRETEMPORADA = "Sin Datos";
                                                    }

                                                    ?>

                                                    <tr class="text-center">
                                                        <td><?php echo $r['NUMERO_NOTA']; ?></td>
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
                                                                <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_NOTA']; ?>" />
                                                                <input type="hidden" class="form-control" placeholder="NUMERO" id="NUMERO" name="NUMERO" value="<?php echo $r['NUMERO_NOTA']; ?>"/>
                                                                <input type="hidden" class="form-control" placeholder="TABLA" id="TABLA" name="TABLA" value="fruta_notadc" />
                                                                <input type="hidden" class="form-control" placeholder="COLUMNA" id="COLUMNA" name="COLUMNA" value="ID_NOTA" />
                                                                <input type="hidden" class="form-control" placeholder="TITULO" id="TITULO" name="TITULO" value="Nota D/C" />
                                                                <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroAP" />
                                                                <input type="hidden" class="form-control" placeholder="URL" id="URLO" name="URLO" value="listarAPnotadc" />
                                                                <?php if ($r['ESTADO'] == "0") { ?>
                                                                    <span href="#" class="dropdown-item" data-toggle="tooltip" title="Abrir Registro">
                                                                        <button type="submit" class="btn btn-success btn-sm " id="ABRIRURL" name="ABRIRURL">
                                                                            <i class="fa fa-folder-open"></i><br> Abrir
                                                                        </button>
                                                                    </span>
                                                                <?php } ?>
                                                            </form>
                                                        </td> 
                                                        <td><?php echo $r['FECHA']; ?></td>
                                                        <td><?php echo $NOMBRETNOTA; ?></td>
                                                        <td><?php echo $NUMEROIREFERENCIA; ?></td>
                                                        <td><?php echo $NOMBRERFINAL; ?></td>
                                                        <td><?php echo $NUMEROICARGA; ?></td>
                                                        <td><?php echo $r['OBSERVACIONES']; ?></td>
                                                        <td><?php echo $r['INGRESO']; ?></td>
                                                        <td><?php echo $r['MODIFICACION']; ?></td>
                                                        <td><?php echo $r['SEMANA']; ?></td>
                                                        <td><?php echo $NOMBREEMPRESA; ?></td>
                                                        <td><?php echo $NOMBRETEMPORADA; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
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