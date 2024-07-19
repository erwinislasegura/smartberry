<?php
include_once "../../assest/config/validarUsuarioFruta.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/VESPECIES_ADO.php';
include_once '../../assest/controlador/PROCESO_ADO.php';
include_once '../../assest/controlador/EEXPORTACION_ADO.php';
include_once '../../assest/controlador/FOLIO_ADO.php';
include_once '../../assest/controlador/TMANEJO_ADO.php';
include_once '../../assest/controlador/TCALIBRE_ADO.php';
include_once '../../assest/controlador/TEMBALAJE_ADO.php';
include_once '../../assest/controlador/ICARGA_ADO.php';


include_once '../../assest/controlador/EXIEXPORTACION_ADO.php';
include_once '../../assest/controlador/REPALETIZAJEEX_ADO.php';
include_once '../../assest/controlador/DREPALETIZAJEEX_ADO.php';

include_once '../../assest/modelo/REPALETIZAJEEX.php';
include_once '../../assest/modelo/EXIEXPORTACION.php';
include_once '../../assest/modelo/DREPALETIZAJEEX.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR



$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$EXIEXPORTACION_ADO =  new EXIEXPORTACION_ADO();
$FOLIO_ADO =  new FOLIO_ADO();
$TMANEJO_ADO =  new TMANEJO_ADO();
$TCALIBRE_ADO =  new TCALIBRE_ADO();
$TEMBALAJE_ADO =  new TEMBALAJE_ADO();
$ICARGA_ADO =  new ICARGA_ADO();

$DREPALETIZAJEEX_ADO =  new DREPALETIZAJEEX_ADO();
$REPALETIZAJEEX_ADO =  new REPALETIZAJEEX_ADO();
$EEXPORTACION_ADO =  new EEXPORTACION_ADO();

//INIICIALIZAR MODELO
$EXIEXPORTACION =  new EXIEXPORTACION();
$REPALETIZAJEEX =  new REPALETIZAJEEX();
$DREPALETIZAJEEX =  new DREPALETIZAJEEX();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD


$IDCAJAS = "";
$CAJAS = "";
$FOLIOCAJAS = "";

$FOLIOEXPORTACION = "";
$NUMEROFOLIODEXPORTACION = "";
$ULTIMOFOLIO = "";
$KILOSNETOSREPALETIZAJE = "";
$FOLIO = "";
$FOLIOMANUAL = "";
$FOLIOMANUALR = "";
$NUMEROFOLIODEXPORTACION = "";
$STOCK = "";
$ENVASERESTANTE = 0;
$IDEXIEXPORTACION = "";
$CAJATOTAL = "";
$CAJATOTAL2 = 0;
$FOLIOALIAS = "";
$ICARGA="";
$ESTADO_FOLIO ="";

$TOTALSELECION="";

$KILONETOEXITENCIA = "";
$PDESHISDRATACIONEXISTENCIA = "";
$KILOSDESHIDRATACIONEXITENCIA = "";
$KILOSBRUTOEXISTENCIA = "";
$EMBOLSADOEXISTENCIA = "";

$CONTADOR = 0;
$CONTADORICARGA=0;

$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";
$TMANEJO = "";

$IDOP = "";
$OP = "";
$NODATOURL = "";
$DISABLED = "";
$DISABLED3 = "";
$DISABLEDSTYLE3 = "";

$SINO0 = "";
$SINO = "";
$SINO2 = "";
$SINONREFERENCIA;
$MENSAJE0 = "";
$MENSAJE = "";
$MENSAJE1 = "";
$MENSAJE2 = "";
$MENSAJE3 = "";


//INICIALIZAR ARREGLOS

$ARRAYESTANDAR = "";
$ARRAYVERPRODUCTORID = "";
$ARRAYVERVESPECIESID = "";
$ARRAYEVERERECEPCIONID;

$ARRAYEXISTENCIA = "";
$ARRAYDREPALETIZAJETOTALESPOREXISTENCIA = "";
$ARRAYEXISTENCIATOTALESPORREPALETIZAJE = "";
$ARRAYVERDRECEPCION = "";

$ARRAYVERFOLIO = "";
$ARRAYULTIMOFOLIO = "";

$ARRAYEXIEXPORTACIONBOLSA = "";
$ARRAYDREPALETIZAJEBOLSA = "";

$ARRAYDREPALETIZAJEBOLSA2 = "";

$ARRAYSELECIONARCAJASID = "";
$ARRAYSELECIONARCAJAS = "";
$ARRAYSELECIONARIDFOLIO = "";
$ARRAYSELECIONARIDEXIEXPORTACION = "";

$ARRAYVERICARGA="";


$ARRAYSELECIONAREXISTENCIA = "";
$ARRAYSELECIONAREXISTENCIAID = "";

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

if (isset($_GET["urlo"])) {
    $urlo_dato = $_GET["urlo"];
}else{
    $urlo_dato = "";
}

//OPERACION PARA OBTENER EL ID RECEPCION Y FOLIO BASE, SOLO SE OCUPA PARA CREAR UN REGISTRO NUEVO
if (isset($id_dato) && isset($accion_dato) && isset($urlo_dato)) {
    $IDP = $id_dato;
    $OPP = $accion_dato;
    $URLO = $urlo_dato;
    if (isset($_REQUEST['FOLIOMANUAL'])) {
        $FOLIOMANUAL = $_REQUEST['FOLIOMANUAL'];
        if (isset($_REQUEST['NUMEROFOLIODEXPORTACION'])) {
            $NUMEROFOLIODEXPORTACION = $_REQUEST['NUMEROFOLIODEXPORTACION'];
        }
    }
    $ARRAYEXIEXPORTACIONBOLSA = $EXIEXPORTACION_ADO->buscarPorRepaletizaje2($IDP);
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Agregar Detalle</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../../assest/config/urlHead.php"; ?>
        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
                //FUNCION PARA CERRAR VENTANA Y ACTUALIZAR PRINCIPAL
                function validacion() {

                    FOLIOMANUAL = document.getElementById('FOLIOMANUAL').checked;
                    if (FOLIOMANUAL == true) {
                        NUMEROFOLIODEXPORTACION = document.getElementById("NUMEROFOLIODEXPORTACION").value;
                        document.getElementById('val_folio').innerHTML = "";

                        if (NUMEROFOLIODEXPORTACION == null || NUMEROFOLIODEXPORTACION.length == 0 || /^\s+$/.test(NUMEROFOLIODEXPORTACION)) {
                            document.form_reg_dato.NUMEROFOLIODEXPORTACION.focus();
                            document.form_reg_dato.NUMEROFOLIODEXPORTACION.style.borderColor = "#FF0000";
                            document.getElementById('val_folio').innerHTML = "NO HA INGRESADO EL FOLIO";
                            return false;
                        }
                        document.form_reg_dato.NUMEROFOLIODEXPORTACION.style.borderColor = "#4AF575";

                        if (/^0/.test(NUMEROFOLIODEXPORTACION)) {
                            document.form_reg_dato.NUMEROFOLIODEXPORTACION.focus();
                            document.form_reg_dato.NUMEROFOLIODEXPORTACION.style.borderColor = "#FF0000";
                            document.getElementById('val_folio').innerHTML = "EL FOLIO NO PUEDE EMPEZAR CON 0";
                            return false;
                        }
                        document.form_reg_dato.NUMEROFOLIODEXPORTACION.style.borderColor = "#4AF575";

                        if (NUMEROFOLIODEXPORTACION.length > 10) {
                            document.form_reg_dato.NUMEROFOLIODEXPORTACION.focus();
                            document.form_reg_dato.NUMEROFOLIODEXPORTACION.style.borderColor = "#FF0000";
                            document.getElementById('val_folio').innerHTML = "EL FOLIO NO PUEDE TENER MAS DE DIES DIGITOS";
                            return false;
                        }
                        document.form_reg_dato.NUMEROFOLIODEXPORTACION.style.borderColor = "#4AF575";
                    }
                }

               
                //REDIRECCIONAR A LA PAGINA SELECIONADA
                function irPagina(url) {
                    location.href = "" + url;
                }

                function cerrar() {
                    window.opener.refrescar()
                    window.close();
                }
            </script>

</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary" >
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <?php include_once "../../assest/config/menuFruta.php"; ?>
            <div class="content-wrapper">
                <div class="container-full">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Frigorifico</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Frigorifico</li>
                                            <li class="breadcrumb-item" aria-current="page">Repaletizaje</li>
                                            <li class="breadcrumb-item" aria-current="page">Registro Repaletizaje</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#">Agregar Detalle</a>
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <?php include_once "../../assest/config/verIndicadorEconomico.php"; ?>
                        </div>
                    </div>
                    <section class="content">
                        <div class="card">
                            <div class="card-header with-border bg-success">                                   
                                <h4 class="card-title">Agregar Detalle</h4>                                        
                            </div>
                            <form class="form" role="form" method="post" name="form_reg_dato" >
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" placeholder="ID REPALETIZAJE" id="IDP" name="IDP" value="<?php echo $IDP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="OP REPALETIZAJE" id="OPP" name="OPP" value="<?php echo $OPP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="URL REPALETIZAJE" id="URLO" name="URLO" value="<?php echo $URLO; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTA" name="PLANTA" value="<?php echo $PLANTAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADAS; ?>" />
                                                <label>Folio</label>
                                                <input type="number" class="form-control" placeholder="Numero Folio " id="NUMEROFOLIODEXPORTACION" name="NUMEROFOLIODEXPORTACION" <?php echo $DISABLED3; ?> <?php echo $DISABLEDSTYLE3; ?> <?php if ($FOLIOMANUAL != "on") {
                                                                                                                                                                                                                                                echo "disabled style='background-color: #eeeeee;'";
                                                                                                                                                                                                                                            } ?> value="<?php echo $NUMEROFOLIODEXPORTACION; ?>" />
                                                <label id="val_folio" class="validacion"> <?php echo $MENSAJE0; ?> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <br>
                                                <?php if($ESTADO_FOLIOMANUAL == 1){ ?>
                                                <input type="checkbox" class="chk-col-danger" name="FOLIOMANUAL" id="FOLIOMANUAL" <?php echo $DISABLED3; ?> <?php echo $DISABLEDSTYLE3; ?> <?php if ($FOLIOMANUAL == "on") {
                                                                                                                                                                                                echo "checked";
                                                                                                                                                                                            } ?> onchange="this.form.submit()">
                                                <label for="FOLIOMANUAL"> Folio Manual</label>
                                                <?php }?>

                                                <label>Estado Folio</label><br>
                                                <select class="form-control select2" id="EFOLIO" name="EFOLIO" style="width: 100%;">
                                                    <option value="1">Pallet Completo</option>
                                                    <option value="2">Pallet Incompleto</option>
                                                    <option value="3">Pallet de Muestra</option>
                                                </select>
                                            </div>
                                        </div>
                                      
                                    </div>
                                    <div class="row">
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="table-responsive">
                                                <table id="selecionExistencia" class="table-hover " style="width: 100%;">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th>Estado</th>                                                                                                                               
                                                            <th>Folio </th>
                                                            <th>Estado Calidad</th>
                                                            <th>Condición </th>
                                                            <th>Selección</th>
                                                            <th>Seleccion Cajas</th>
                                                            <th>Cantidad Envase </th>
                                                            <th>Fecha Embalado </th>
                                                            <th>Código Estandar </th>
                                                            <th>Envase/Estandar </th>
                                                            <th>CSG</th>
                                                            <th>Productor</th>
                                                            <th>Variedad</th>
                                                            
                                                            <th>Kilo Neto </th>
                                                            <th>Tipo Manejo</th>
                                                            <th>Tipo Calibre</th>
                                                            <th>Tipo Embalaje</th>
                                                            <th>Stock</th>
                                                            <th>Numero Referencia</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if ($ARRAYEXIEXPORTACIONBOLSA) { ?>
                                                            <?php foreach ($ARRAYEXIEXPORTACIONBOLSA as $r) :  ?>
                                                                <?php
                                                                if ($r['TESTADOSAG'] == null || $r['TESTADOSAG'] == "0") {
                                                                    $ESTADOSAG = "Sin Condición";
                                                                }
                                                                if ($r['TESTADOSAG'] == "1") {
                                                                    $ESTADOSAG =  "En Inspección";
                                                                }
                                                                if ($r['TESTADOSAG'] == "2") {
                                                                    $ESTADOSAG =  "Aprobado Origen";
                                                                }
                                                                if ($r['TESTADOSAG'] == "3") {
                                                                    $ESTADOSAG =  "Aprobado USLA";
                                                                }
                                                                if ($r['TESTADOSAG'] == "4") {
                                                                    $ESTADOSAG =  "Fumigado";
                                                                }
                                                                if ($r['TESTADOSAG'] == "5") {
                                                                    $ESTADOSAG =  "Rechazado";
                                                                }
                                                                if($r['COLOR']=="1"){
                                                                    $TRECHAZOCOLOR="badge badge-danger ";
                                                                    $COLOR="Rechazado";
                                                                }else if($r['COLOR']=="2"){
                                                                    $TRECHAZOCOLOR="badge badge-warning ";
                                                                    $COLOR="Objetado";
                                                                }else if($r['COLOR']=="3"){
                                                                    $TRECHAZOCOLOR="badge badge-Success ";
                                                                    $COLOR="Aprobado";
                                                                }else{
                                                                    $TRECHAZOCOLOR="";
                                                                    $COLOR="Sin Datos";
                                                                }                                                                
                                                                if ($r['ID_ICARGA']) {
                                                                    $ARRAYVERICARGA=$ICARGA_ADO->verIcarga($r['ID_ICARGA']);
                                                                    if($ARRAYVERICARGA){
                                                                        $NUMEROREFERENCIA=$ARRAYVERICARGA[0]["NREFERENCIA_ICARGA"];
                                                                    }else{
                                                                        $NUMEROREFERENCIA =  "Sin Datos";
                                                                    }
                                                                }else{
                                                                    $NUMEROREFERENCIA =  "Sin Datos";
                                                                }
                                                                $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);
                                                                if ($ARRAYVERPRODUCTORID) {

                                                                    $CSGPRODUCTOR = $ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'];
                                                                    $NOMBREPRODUCTOR = $ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'];
                                                                } else {
                                                                    $CSGPRODUCTOR = "Sin Datos";
                                                                    $NOMBREPRODUCTOR = "Sin Datos";
                                                                }
                                                                $ARRAYEVERERECEPCIONID = $EEXPORTACION_ADO->verEstandar($r['ID_ESTANDAR']);
                                                                if ($ARRAYEVERERECEPCIONID) {
                                                                    $CODIGOESTANDAR = $ARRAYEVERERECEPCIONID[0]['CODIGO_ESTANDAR'];
                                                                    $NOMBREESTANDAR = $ARRAYEVERERECEPCIONID[0]['NOMBRE_ESTANDAR'];
                                                                } else {
                                                                    $CODIGOESTANDAR = "Sin Datos";
                                                                    $NOMBREESTANDAR = "Sin Datos";
                                                                }
                                                                $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
                                                                if ($ARRAYVERVESPECIESID) {
                                                                    $NOMBREVESPECIES = $ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'];
                                                                } else {
                                                                    $NOMBREVESPECIES = "Sin Datos";
                                                                }
                                                                $ARRAYTMANEJO = $TMANEJO_ADO->verTmanejo($r['ID_TMANEJO']);
                                                                if ($ARRAYTMANEJO) {
                                                                    $NOMBRETMANEJO = $ARRAYTMANEJO[0]['NOMBRE_TMANEJO'];
                                                                } else {
                                                                    $NOMBRETMANEJO = "Sin Datos";
                                                                }
                                                                $ARRAYTCALIBRE = $TCALIBRE_ADO->verCalibre($r['ID_TCALIBRE']);
                                                                if ($ARRAYTCALIBRE) {
                                                                    $NOMBRETCALIBRE = $ARRAYTCALIBRE[0]['NOMBRE_TCALIBRE'];
                                                                } else {
                                                                    $NOMBRETCALIBRE = "Sin Datos";
                                                                }
                                                                $ARRAYTEMBALAJE = $TEMBALAJE_ADO->verEmbalaje($r['ID_TEMBALAJE']);
                                                                if ($ARRAYTEMBALAJE) {
                                                                    $NOMBRETEMBALAJE = $ARRAYTEMBALAJE[0]['NOMBRE_TEMBALAJE'];
                                                                } else {
                                                                    $NOMBRETEMBALAJE = "Sin Datos";
                                                                }
                                                                $ARRAYDREPALETIZAJEBOLSA2 = $DREPALETIZAJEEX_ADO->obtenerTotalesDrepaletizajePorExistencia2($r['ID_EXIEXPORTACION']);
                                                                if ($ARRAYDREPALETIZAJEBOLSA2) {
                                                                    $ENVASERESTANTE =  $r['CANTIDAD_ENVASE_EXIEXPORTACION'] - $ARRAYDREPALETIZAJEBOLSA2[0]['ENVASE'];
                                                                } else {
                                                                    $ENVASERESTANTE = $r['CANTIDAD_ENVASE_EXIEXPORTACION'];
                                                                }
                                                                ?>
                                                                <?php if ($ENVASERESTANTE > 0) { ?>
                                                                    <?php $CONTADOR = $CONTADOR + 1; ?>
                                                                    <tr class="text-center">
                                                                        <?php 
                                                                            switch($r['ESTADO_FOLIO']){
                                                                                case 1: echo '<td style="background: #18d26b; color: white; display: none;">P. Completado</td>';
                                                                                    break;
                                                                                case 2: echo '<td style="background: #ffa800; color: white; display: none;">P. Incompleto</td>';
                                                                                    break;
                                                                                case 3: echo '<td style="background: #3085f5; color: white; display: none;">P. Muestra</td>';
                                                                                    break;
                                                                                default: echo '<td style="background: #93b4d4; color: white; display: none;">No identificado</td>';
                                                                            }
                                                                        ?>
                                                                        <td>                                                                   
                                                                            <span class="<?php echo $TRECHAZOCOLOR; ?>">
                                                                                <?php echo $r['FOLIO_AUXILIAR_EXIEXPORTACION']; ?>
                                                                            </span>
                                                                        </td>
                                                                        <td><?php echo $COLOR; ?></td>
                                                                        <td><?php echo $ESTADOSAG; ?></td>
                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="checkbox" class="form-control" name="SELECIONAREXISTENCIA[]" id="SELECIONAREXISTENCIA<?php echo $r['ID_EXIEXPORTACION']; ?>" value="<?php echo $r['ID_EXIEXPORTACION']; ?>">
                                                                                <label for="SELECIONAREXISTENCIA<?php echo $r['ID_EXIEXPORTACION']; ?>"> Seleccionar</label>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="hidden" class="form-control" name="IDCAJA[]" value="<?php echo  $CONTADOR; ?>">
                                                                                <input type="hidden" class="form-control" name="IDFOLIO[]" value="<?php echo  $r['FOLIO_AUXILIAR_EXIEXPORTACION']; ?>">
                                                                                <input type="hidden" class="form-control" name="IDEXIEXPORTACION[]" value="<?php echo $r['ID_EXIEXPORTACION']; ?>">
                                                                                <input type="number" class="form-control" name="CAJAS[]" placeholder="Envases">
                                                                            </div>
                                                                        </td>
                                                                        <td><?php echo $ENVASERESTANTE; ?></td>
                                                                        <td><?php echo $r['EMBALADO']; ?></td>
                                                                        <td><?php echo $CODIGOESTANDAR; ?></td>
                                                                        <td><?php echo $NOMBREESTANDAR; ?></td>
                                                                        <td><?php echo $CSGPRODUCTOR; ?></td>
                                                                        <td><?php echo $NOMBREPRODUCTOR; ?></td>
                                                                        <td><?php echo $NOMBREVESPECIES; ?></td>
                                                                        
                                                                        <td><?php echo $r['NETO']; ?></td>
                                                                        <td><?php echo $NOMBRETMANEJO; ?></td>
                                                                        <td><?php echo $NOMBRETCALIBRE; ?></td>
                                                                        <td><?php echo $NOMBRETEMBALAJE; ?></td>
                                                                        <td><?php echo $r['STOCKR']; ?></td>
                                                                        <td><?php echo $NUMEROREFERENCIA; ?></td>
                                                                    </tr>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        <?php } ?>

                                                    </tbody>
                                                </table>
                                                <label id="val_dproceso" class="validacion center"><?php echo $MENSAJE; ?> </label>
                                                <label id="val_dproceso" class="validacion center"><?php echo $MENSAJE1; ?> </label>
                                                <label id="val_dproceso" class="validacion center"><?php echo $MENSAJE2; ?> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->

                                    <div class="card-footer">
                                        <div class="btn-group btn-rounded btn-block  col-xxl-4 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12" role="group" aria-label="Acciones generales">
                                            <button type="button" class="btn btn-success  " data-toggle="tooltip" title="Volver" name="CANCELAR" value="CANCELAR" Onclick="irPagina('<?php echo $URLO; ?>.php?op&id=<?php echo $id_dato; ?>&a=<?php echo $accion_dato; ?>&urlo=<?php echo $urlo_dato; ?>');">
                                                <i class="ti-back-left "></i> Volver
                                            </button>
                                            <button type="submit" class="btn btn-rounded btn-primary" data-toggle="tooltip" title="Mantener" name="MANTENER" value="MANTENER" <?php echo $DISABLED; ?>>
                                                <i class="ti-save-alt"></i> Mantener
                                            </button>
                                            <button type="submit" class="btn btn-rounded btn-info" data-toggle="tooltip" title="Por Folio" name="AGREGAR" value="AGREGAR" <?php echo $DISABLED; ?>>
                                                <i class="ti-save-alt"></i> P. Envases
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--.row -->
                    </section>
                </div>
            </div>
            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php include_once "../../assest/config/footer.php";   ?>
                <?php include_once "../../assest/config/menuExtraFruta.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../../assest/config/urlBase.php"; ?>        
        <script>            
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                showConfirmButton: true
            })
            Toast.fire({
                icon: "info",
                title: "Informacion importante",
                html: "<label>Para <b>Selecionar Manterner</b> datos, seleccione los folios y presione <b>Mantener</b> </label><label>Para <b>seleccionar</b> una parte de los <b>Envases</b> de un folio, ingrese los Envases a Ingresar y presione <b> P. Envases </b> </label>"                
            })
        </script>
        <?php 
        //OPERACIONES
        //OPERACION DE REGISTRO DE FILA

        if (isset($_REQUEST['AGREGAR'])) {


            $ARRAYVERFOLIO = $FOLIO_ADO->verFolioPorEmpresaPlantaTemporadaTexportacion($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
            $FOLIO = $ARRAYVERFOLIO[0]['ID_FOLIO'];

            if (isset($_REQUEST['FOLIOMANUAL'])) {
                $FOLIOMANUAL = $_REQUEST['FOLIOMANUAL'];
            }
            if ($FOLIOMANUAL == "on") {
                $NUMEROFOLIODEXPORTACION = $_REQUEST['NUMEROFOLIODEXPORTACION'];
                $FOLIOMANUALR = "1";
                $ARRAYFOLIOPOEXPO = $EXIEXPORTACION_ADO->buscarPorFolio($NUMEROFOLIODEXPORTACION);
                if ($ARRAYFOLIOPOEXPO) {
                    $SINO0 = "1";
                    $MENSAJE0 = $MENSAJE0." El folio ingresado, ya existe.";
                } else {
                    $SINO0 = "0";
                    $MENSAJE0 = $MENSAJE0."";
                }
            }
            if ($FOLIOMANUAL != "on") {
                $FOLIOMANUALR = "0";
                $SINO0 = "0";
                $ARRAYULTIMOFOLIO = $EXIEXPORTACION_ADO->obtenerFolioRepaletizaje($FOLIO,$_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
                if ($ARRAYULTIMOFOLIO) {
                    if ($ARRAYULTIMOFOLIO[0]['ULTIMOFOLIO'] == 0) {
                        $FOLIOEXPORTACION = $ARRAYVERFOLIO[0]['NUMERO_FOLIO'];
                    } else {
                        $FOLIOEXPORTACION = $ARRAYULTIMOFOLIO[0]['ULTIMOFOLIO'];
                    }
                } else {
                    $FOLIOEXPORTACION = $ARRAYVERFOLIO[0]['NUMERO_FOLIO'];
                }
                $NUMEROFOLIODEXPORTACION = $FOLIOEXPORTACION + 1;
                $ARRAYFOLIOPOEXPO = $EXIEXPORTACION_ADO->buscarPorFolio($NUMEROFOLIODEXPORTACION);
                while (count($ARRAYFOLIOPOEXPO) == 1) {
                    $ARRAYFOLIOPOEXPO = $EXIEXPORTACION_ADO->buscarPorFolio($NUMEROFOLIODEXPORTACION);
                    if (count($ARRAYFOLIOPOEXPO) == 1) {
                        $NUMEROFOLIODEXPORTACION += 1;
                    }
                };
                
            }
            
            if ($SINO0 == "1") {     
                $id_dato =  $_REQUEST['IDP'];
                $accion_dato =  $_REQUEST['OPP'];
                echo '<script>
                    Swal.fire({
                        icon:"warning",
                        title:"Accion restringida.",
                        text:"' . $MENSAJE0 . '",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href="registroDrepaletizajePTSeleccionCaja.php?op&id='.$id_dato.'&a='.$accion_dato.'&urlo='.$urlo_dato.'";                        
                    })
                </script>';
            }
              
        
            if (isset($_REQUEST['IDEXIEXPORTACION'])) {                
                $REPALETIZAJE = $_REQUEST['IDP'];
                $ARRAYSELECIONARCAJASID = $_REQUEST['IDCAJA'];
                $ARRAYSELECIONARIDFOLIO = $_REQUEST['IDFOLIO'];
                $ARRAYSELECIONARCAJAS = $_REQUEST['CAJAS'];
                $ARRAYSELECIONARIDEXIEXPORTACION = $_REQUEST['IDEXIEXPORTACION'];  
     
                    
                foreach ($ARRAYSELECIONARCAJASID as $b) :    
                    $IDCAJAS = $b - 1;
                    $CAJAS = $ARRAYSELECIONARCAJAS[$IDCAJAS];
                    $IDEXIEXPORTACION = $ARRAYSELECIONARIDEXIEXPORTACION[$IDCAJAS];
                    $ARRAYEXIEXPORTACIONBOLSASELECCION = $EXIEXPORTACION_ADO->verExiexportacion($IDEXIEXPORTACION); 
                    if ($CAJAS != "") {
                        foreach ($ARRAYEXIEXPORTACIONBOLSASELECCION as $r )  :                        
                            $CONTADORICARGA+=1;
                            if($CONTADORICARGA ==1){
                                $NREFERENCIA=$r["ID_ICARGA"];
                                $SINONREFERENCIA=0;
                            }else{
                                if($NREFERENCIA==$r["ID_ICARGA"]){
                                    $SINONREFERENCIA=0;
                                }else{
                                    $SINONREFERENCIA=1;
                                }
                            }
                        endforeach;
                    }
                endforeach;    
            

                if($SINONREFERENCIA == 0 ){
                    
                    foreach ($ARRAYSELECIONARCAJASID as $F) :
                        $IDCAJAS = $F - 1;
                        $CAJAS = $ARRAYSELECIONARCAJAS[$IDCAJAS];
                        $NUMEROFOLIO = $ARRAYSELECIONARIDFOLIO[$IDCAJAS];
                        $IDEXIEXPORTACION = $ARRAYSELECIONARIDEXIEXPORTACION[$IDCAJAS];

                        $ARRAYDREPALETIZAJEBOLSA = $DREPALETIZAJEEX_ADO->obtenerTotalesDrepaletizajePorExistencia2($IDEXIEXPORTACION);
                        $ARRAYEXIEXPORTACIONBOLSASELECCION = $EXIEXPORTACION_ADO->verExiexportacion($IDEXIEXPORTACION);

                        if ($ARRAYDREPALETIZAJEBOLSA) {
                            $CAJATOTAL =   $ARRAYEXIEXPORTACIONBOLSASELECCION[0]['CANTIDAD_ENVASE_EXIEXPORTACION'] - $ARRAYDREPALETIZAJEBOLSA[0]['ENVASE'];
                        } else {
                            $CAJATOTAL =  $ARRAYEXIEXPORTACIONBOLSASELECCION[0]['CANTIDAD_ENVASE_EXIEXPORTACION'];
                        }

                        if ($CAJAS != "") {
                            $SINO = "0";
                            $MENSAJE = $MENSAJE;
                            if ($CAJATOTAL == 0) {
                                $SINO = "1";
                                $MENSAJE = $MENSAJE . "" . $NUMEROFOLIO . ": Debe seleionar un registro que tenga envases mayores a cero.";
                            } else {
                                if ($CAJAS <= 0) {
                                    $SINO = "1";
                                    $MENSAJE = $MENSAJE . "  " . $NUMEROFOLIO . ": Solo deben ingresar un valor mayor a zero.";
                                } else {
                                    $SINO = "0";
                                    $MENSAJE = $MENSAJE;
                                    if ($CAJAS <= $ARRAYEXIEXPORTACIONBOLSASELECCION[0]['CANTIDAD_ENVASE_EXIEXPORTACION']) {
                                        $SINO = "0";
                                        $MENSAJE = $MENSAJE;
                                    } else {
                                        $SINO = "1";
                                        $MENSAJE = $MENSAJE . " " . $NUMEROFOLIO . ": El valor a ingresar debe ser ser menor o igual al original.";
                                    }
                                }
                            }
                        } else {
                            $SINO = "1";
                            $MENSAJE = $MENSAJE;
                            
                        }
                        if ($SINO == "0") {

                            foreach ($ARRAYEXIEXPORTACIONBOLSASELECCION as $r )  :
                                
                                $ARRAYESTANDAR = $EEXPORTACION_ADO->verEstandar($r["ID_ESTANDAR"]);
                                if($ARRAYESTANDAR){
                                    $KILONETOEXITENCIA = $CAJAS * $ARRAYESTANDAR[0]['PESO_NETO_ESTANDAR'];
                                    $PDESHISDRATACIONEXISTENCIA = $ARRAYESTANDAR[0]['PDESHIDRATACION_ESTANDAR'];
                                    $KILOSDESHIDRATACIONEXITENCIA = $KILONETOEXITENCIA * (1 + ($PDESHISDRATACIONEXISTENCIA / 100));
                                    $KILOSBRUTOEXISTENCIA = (($CAJAS * $ARRAYESTANDAR[0]['PESO_ENVASE_ESTANDAR']) + $KILOSDESHIDRATACIONEXITENCIA) + $ARRAYESTANDAR[0]['PESO_PALLET_ESTANDAR'];
                                    $EMBOLSADOEXISTENCIA = $ARRAYESTANDAR[0]['EMBOLSADO'];
                                }else{
                                    $KILONETOEXITENCIA=0;
                                    $PDESHISDRATACIONEXISTENCIA=0;
                                    $KILOSDESHIDRATACIONEXITENCIA=0;
                                    $KILOSBRUTOEXISTENCIA=0;
                                    $EMBOLSADOEXISTENCIA=0;
                                }

                                //echo '<script> alert("SE SE PASA POR ENVASE SE CREA NUEVO FOLIO EL FOLIO '.$_REQUEST["EFOLIO"].'"); </script>';

                                $DREPALETIZAJEEX->__SET('FOLIO_NUEVO_DREPALETIZAJE', $NUMEROFOLIODEXPORTACION);
                                $DREPALETIZAJEEX->__SET('FOLIO_MANUAL', $FOLIOMANUALR);
                                $DREPALETIZAJEEX->__SET('FECHA_EMBALADO_DREPALETIZAJE', $r["FECHA_EMBALADO_EXIEXPORTACION"]);
                                $DREPALETIZAJEEX->__SET('CANTIDAD_ENVASE_DREPALETIZAJE', $CAJAS);
                                $DREPALETIZAJEEX->__SET('KILOS_NETO_DREPALETIZAJE', $KILONETOEXITENCIA);
                                $DREPALETIZAJEEX->__SET('KILOS_BRUTO_DREPALETIZAJE', $KILOSBRUTOEXISTENCIA);
                                $DREPALETIZAJEEX->__SET('EMBOLSADO', $EMBOLSADOEXISTENCIA);
                                $DREPALETIZAJEEX->__SET('STOCK', $r["STOCK"]);
                                $DREPALETIZAJEEX->__SET('ID_TMANEJO', $r["ID_TMANEJO"]);
                                $DREPALETIZAJEEX->__SET('ID_TCALIBRE', $r["ID_TCALIBRE"]);
                                $DREPALETIZAJEEX->__SET('ID_TEMBALAJE', $r["ID_TEMBALAJE"]);
                                $DREPALETIZAJEEX->__SET('ID_FOLIO', $r["ID_FOLIO"]);
                                $DREPALETIZAJEEX->__SET('ID_ESTANDAR', $r["ID_ESTANDAR"]);
                                $DREPALETIZAJEEX->__SET('ID_PRODUCTOR', $r["ID_PRODUCTOR"]);
                                $DREPALETIZAJEEX->__SET('ID_VESPECIES', $r["ID_VESPECIES"]);
                                $DREPALETIZAJEEX->__SET('ID_EXIEXPORTACION', $r["ID_EXIEXPORTACION"]);
                                $DREPALETIZAJEEX->__SET('ESTADO_FOLIO', $_REQUEST['EFOLIO']);  
                                $DREPALETIZAJEEX->__SET('ID_REPALETIZAJE', $REPALETIZAJE);
                                $DREPALETIZAJEEX_ADO->agregarDrepaletizaje($DREPALETIZAJEEX);       
                                
                                $AUSUARIO_ADO->agregarAusuario2("NULL",1, 1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Detalle de repaletizaje Producto Terminado, por envases","fruta_drepaletizajeex","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],$_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );           


                                $EXIEXPORTACION->__SET('FOLIO_EXIEXPORTACION', $r["FOLIO_EXIEXPORTACION"]);
                                $EXIEXPORTACION->__SET('FOLIO_AUXILIAR_EXIEXPORTACION', $NUMEROFOLIODEXPORTACION);
                                $EXIEXPORTACION->__SET('FOLIO_MANUAL', $FOLIOMANUALR);
                                $EXIEXPORTACION->__SET('FECHA_EMBALADO_EXIEXPORTACION', $r["FECHA_EMBALADO_EXIEXPORTACION"]);                   
                                $EXIEXPORTACION->__SET('CANTIDAD_ENVASE_EXIEXPORTACION', $CAJAS);
                                $EXIEXPORTACION->__SET('KILOS_NETO_EXIEXPORTACION', $KILONETOEXITENCIA);
                                $EXIEXPORTACION->__SET('KILOS_BRUTO_EXIEXPORTACION', $KILOSBRUTOEXISTENCIA);
                                $EXIEXPORTACION->__SET('PDESHIDRATACION_EXIEXPORTACION', $PDESHISDRATACIONEXISTENCIA);
                                $EXIEXPORTACION->__SET('KILOS_DESHIRATACION_EXIEXPORTACION', $KILOSDESHIDRATACIONEXITENCIA);
                                $EXIEXPORTACION->__SET('OBSERVACION_EXIESPORTACION', $r["OBSERVACION_EXIESPORTACION"]);
                                $EXIEXPORTACION->__SET('ALIAS_DINAMICO_FOLIO_EXIESPORTACION', $r["ALIAS_DINAMICO_FOLIO_EXIESPORTACION"]);
                                $EXIEXPORTACION->__SET('ALIAS_ESTATICO_FOLIO_EXIESPORTACION', $r["ALIAS_ESTATICO_FOLIO_EXIESPORTACION"]);
                                $EXIEXPORTACION->__SET('STOCK', $r["STOCK"]);
                                $EXIEXPORTACION->__SET('EMBOLSADO', $EMBOLSADOEXISTENCIA);
                                $EXIEXPORTACION->__SET('GASIFICADO', $r["GASIFICADO"]);
                                $EXIEXPORTACION->__SET('PREFRIO', $r["PREFRIO"]);
                                $EXIEXPORTACION->__SET('TESTADOSAG', $r["TESTADOSAG"]);
                                $EXIEXPORTACION->__SET('VGM', $r["VGM"]);
                                $EXIEXPORTACION->__SET('COLOR', $r["COLOR"]);
                                $EXIEXPORTACION->__SET('FECHA_RECEPCION', $r["FECHA_RECEPCION"]);
                                $EXIEXPORTACION->__SET('FECHA_PROCESO', $r["FECHA_PROCESO"]);
                                $EXIEXPORTACION->__SET('FECHA_REEMBALAJE', $r["FECHA_REEMBALAJE"]);
                                $EXIEXPORTACION->__SET('FECHA_REPALETIZAJE', $r["FECHA_REPALETIZAJE"]);
                                $EXIEXPORTACION->__SET('INGRESO', $r["INGRESO"]);
                                $EXIEXPORTACION->__SET('ID_TCALIBRE', $r["ID_TCALIBRE"]);
                                $EXIEXPORTACION->__SET('ID_TEMBALAJE', $r["ID_TEMBALAJE"]);
                                $EXIEXPORTACION->__SET('ID_TMANEJO', $r["ID_TMANEJO"]);
                                $EXIEXPORTACION->__SET('ID_FOLIO', $FOLIO);
                                $EXIEXPORTACION->__SET('ID_ESTANDAR', $r["ID_ESTANDAR"]);
                                $EXIEXPORTACION->__SET('ID_PRODUCTOR', $r["ID_PRODUCTOR"]);
                                $EXIEXPORTACION->__SET('ID_VESPECIES', $r["ID_VESPECIES"]);
                                $EXIEXPORTACION->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                                $EXIEXPORTACION->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
                                $EXIEXPORTACION->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']); 
                                $EXIEXPORTACION->__SET('ID_TCATEGORIA', $r['ID_TCATEGORIA']);
                                $EXIEXPORTACION->__SET('ID_TCOLOR', $r['ID_TCOLOR']);
                                $EXIEXPORTACION->__SET('ID_RECEPCION', $r["ID_RECEPCION"]); 
                                $EXIEXPORTACION->__SET('ID_PROCESO', $r["ID_PROCESO"]);
                                $EXIEXPORTACION->__SET('ID_REPALETIZAJE', $REPALETIZAJE);       
                                $EXIEXPORTACION->__SET('ID_REEMBALAJE', $r["ID_REEMBALAJE"]);  
                                $EXIEXPORTACION->__SET('ID_RECHAZADO', $r["ID_RECHAZADO"]);  
                                $EXIEXPORTACION->__SET('ID_LEVANTAMIENTO', $r["ID_LEVANTAMIENTO"]);   
                                $EXIEXPORTACION->__SET('ID_PLANTA2', $r["ID_PLANTA2"]);
                                $EXIEXPORTACION->__SET('ID_PLANTA3', $r["ID_PLANTA3"]);
                                $EXIEXPORTACION->__SET('ID_INPSAG2', $r["ID_INPSAG2"]); 
                                $EXIEXPORTACION->__SET('ID_ICARGA', $r["ID_ICARGA"]); 
                                $EXIEXPORTACION->__SET('ID_REPALETIZAJE2', $REPALETIZAJE);      
                                $EXIEXPORTACION->__SET('ID_EXIEXPORTACION2', $r["ID_EXIEXPORTACION"]);  
                                $EXIEXPORTACION->__SET('ESTADO_FOLIO', $_REQUEST['EFOLIO']);                                                    
                                $EXIEXPORTACION_ADO->agregarExiexportacionRepaletizaje($EXIEXPORTACION);

                                $AUSUARIO_ADO->agregarAusuario2("NULL",1, 1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de existencia de Producto Terminado, por envases","fruta_exiexportacion","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],$_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );           

                            endforeach;      
                        }

                    endforeach;
                    
                    
                    if ($SINO == "0") {
                        if ($MENSAJE == "") { 
                            $id_dato =  $_REQUEST['IDP'];
                            $accion_dato =  $_REQUEST['OPP'];
                            echo '<script>
                                Swal.fire({
                                    icon:"success",
                                    title:"Accion realizada",
                                    text:"Se agregado la selección al repaletizaje.",
                                    showConfirmButton: true,
                                    confirmButtonText:"Volver al repaletizaje",
                                    closeOnConfirm:false
                                }).then((result)=>{
                                    location.href="' . $_REQUEST['URLO'] . '.php?op&id='.$id_dato.'&a='.$accion_dato.'&urlo='.$urlo_dato.'";                        
                                })
                            </script>';
                        }else{                        
                            $id_dato =  $_REQUEST['IDP'];
                            $accion_dato =  $_REQUEST['OPP'];
                            echo '<script>
                                Swal.fire({
                                    icon:"success",
                                    title:"Accion realizada",
                                    text:"Se agregado la selección al repaletizaje. ' . $MENSAJE . '",
                                    showConfirmButton: true,
                                    confirmButtonText:"Volver al repaletizaje",
                                    closeOnConfirm:false
                                }).then((result)=>{
                                    location.href="' . $_REQUEST['URLO'] . '.php?op&id='.$id_dato.'&a='.$accion_dato.'&urlo='.$urlo_dato.'";                        
                                })
                            </script>';
                        }  

                    }else{                        
                        if($MENSAJE!=""){
                            $id_dato =  $_REQUEST['IDP'];
                            $accion_dato =  $_REQUEST['OPP'];
                            echo '<script>
                                Swal.fire({
                                    icon:"warning",
                                    title:"Accion realizadas, con errores.",
                                    text:"' . $MENSAJE . '",
                                    showConfirmButton: true,
                                    confirmButtonText:"Cerrar",
                                    closeOnConfirm:false
                                }).then((result)=>{
                                    location.href="registroDrepaletizajePTSeleccionCaja.php?op&id='.$id_dato.'&a='.$accion_dato.'&urlo='.$urlo_dato.'";                        
                                })
                            </script>';
                        }else{                            
                            $id_dato =  $_REQUEST['IDP'];
                            $accion_dato =  $_REQUEST['OPP'];
                            echo '<script>
                                Swal.fire({
                                    icon:"success",
                                    title:"Accion realizada",
                                    text:"Se agregado la selección al repaletizaje.",
                                    showConfirmButton: true,
                                    confirmButtonText:"Volver al repaletizaje",
                                    closeOnConfirm:false
                                }).then((result)=>{
                                    location.href="' . $_REQUEST['URLO'] . '.php?op&id='.$id_dato.'&a='.$accion_dato.'&urlo='.$urlo_dato.'";                         
                                })
                            </script>';
                        }
                    }
                         
                }else{
                    
                    $id_dato =  $_REQUEST['IDP'];
                    $accion_dato =  $_REQUEST['OPP'];
                    echo '<script>
                        Swal.fire({
                            icon:"warning",
                            title:"Accion restringida",
                            text:"la selección deben tener los mis datos de número de referencia.",
                            showConfirmButton: true,
                            confirmButtonText:"Cerrar",
                            closeOnConfirm:false
                        }).then((result)=>{
                            location.href="registroDrepaletizajePTSeleccionCaja.php?op&id='.$id_dato.'&a='.$accion_dato.'&urlo='.$urlo_dato.';                        
                        })
                    </script>';
                }
            }
        }        
        if (isset($_REQUEST['MANTENER'])) {
            if (isset($_REQUEST['SELECIONAREXISTENCIA'])) {
                $REPALETIZAJE = $_REQUEST['IDP'];
                $ARRAYSELECIONAREXISTENCIA = $_REQUEST['SELECIONAREXISTENCIA'];
                $SINO = "0";
            } else {
                $SINO = "1";
                $id_dato =  $_REQUEST['IDP'];
                $accion_dato =  $_REQUEST['OPP'];
                echo '<script>
                    Swal.fire({
                        icon:"warning",
                        title:"Accion restringida",
                        text:"Se debe selecionar al menos una existencia.",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroDrepaletizajePTSeleccionCaja.php?op&id='.$id_dato.'&a='.$accion_dato.'&urlo='.$urlo_dato.'";                            
                    })
                </script>';
            }
            if ($SINO == "0") {

                foreach ($ARRAYSELECIONAREXISTENCIA as $s) :
                    $IDEXIEXPORTACION = $s;

                    $ARRAYDREPALETIZAJEBOLSA = $DREPALETIZAJEEX_ADO->obtenerTotalesDrepaletizajePorExistencia2($IDEXIEXPORTACION);
                    $ARRAYEXIEXPORTACIONBOLSASELECCION = $EXIEXPORTACION_ADO->verExiexportacion($IDEXIEXPORTACION);
                    foreach ($ARRAYEXIEXPORTACIONBOLSASELECCION as $r )  :
                        $NUMEROFOLIO = $r["FOLIO_AUXILIAR_EXIEXPORTACION"];
                            if ($ARRAYDREPALETIZAJEBOLSA) {
                                $CAJATOTAL =   $r['CANTIDAD_ENVASE_EXIEXPORTACION'] - $ARRAYDREPALETIZAJEBOLSA[0]['ENVASE'];
                            } else {
                                $CAJATOTAL =  $r['CANTIDAD_ENVASE_EXIEXPORTACION'];
                            }                    
                            $ARRAYESTANDAR = $EEXPORTACION_ADO->verEstandar($ARRAYEXIEXPORTACIONBOLSASELECCION[0]["ID_ESTANDAR"]);
                            if($ARRAYESTANDAR){
                                $KILONETOEXITENCIA = $CAJATOTAL * $ARRAYESTANDAR[0]['PESO_NETO_ESTANDAR'];
                                $PDESHISDRATACIONEXISTENCIA = $ARRAYESTANDAR[0]['PDESHIDRATACION_ESTANDAR'];
                                $KILOSDESHIDRATACIONEXITENCIA = $KILONETOEXITENCIA * (1 + ($PDESHISDRATACIONEXISTENCIA / 100));
                                $KILOSBRUTOEXISTENCIA = (($CAJATOTAL * $ARRAYESTANDAR[0]['PESO_ENVASE_ESTANDAR']) + $KILOSDESHIDRATACIONEXITENCIA) + $ARRAYESTANDAR[0]['PESO_PALLET_ESTANDAR'];
                                $EMBOLSADOEXISTENCIA = $ARRAYESTANDAR[0]['EMBOLSADO'];
                            }else{
                                $KILONETOEXITENCIA=0;
                                $PDESHISDRATACIONEXISTENCIA=0;
                                $KILOSDESHIDRATACIONEXITENCIA=0;
                                $KILOSBRUTOEXISTENCIA=0;
                                $EMBOLSADOEXISTENCIA=0;
                            }   


                            //echo '<script> alert("SE MANTIENE EL FOLIO '.$_REQUEST["EFOLIO"].'"); </script>';
                            $DREPALETIZAJEEX->__SET('FOLIO_NUEVO_DREPALETIZAJE', $r["FOLIO_AUXILIAR_EXIEXPORTACION"]);
                            $DREPALETIZAJEEX->__SET('FOLIO_MANUAL', $r["FOLIO_MANUAL"]);
                            $DREPALETIZAJEEX->__SET('FECHA_EMBALADO_DREPALETIZAJE', $r["FECHA_EMBALADO_EXIEXPORTACION"]);
                            $DREPALETIZAJEEX->__SET('CANTIDAD_ENVASE_DREPALETIZAJE', $CAJATOTAL);
                            $DREPALETIZAJEEX->__SET('KILOS_NETO_DREPALETIZAJE', $KILONETOEXITENCIA);
                            $DREPALETIZAJEEX->__SET('KILOS_BRUTO_DREPALETIZAJE', $KILOSBRUTOEXISTENCIA);
                            $DREPALETIZAJEEX->__SET('EMBOLSADO', $EMBOLSADOEXISTENCIA);
                            $DREPALETIZAJEEX->__SET('STOCK', $r["STOCK"]);
                            $DREPALETIZAJEEX->__SET('ID_TMANEJO', $r["ID_TMANEJO"]);
                            $DREPALETIZAJEEX->__SET('ID_TCALIBRE', $r["ID_TCALIBRE"]);
                            $DREPALETIZAJEEX->__SET('ID_TEMBALAJE', $r["ID_TEMBALAJE"]);
                            $DREPALETIZAJEEX->__SET('ID_FOLIO', $r["ID_FOLIO"]);
                            $DREPALETIZAJEEX->__SET('ID_ESTANDAR', $r["ID_ESTANDAR"]);
                            $DREPALETIZAJEEX->__SET('ID_PRODUCTOR', $r["ID_PRODUCTOR"]);
                            $DREPALETIZAJEEX->__SET('ID_VESPECIES', $r["ID_VESPECIES"]);
                            $DREPALETIZAJEEX->__SET('ID_EXIEXPORTACION', $r["ID_EXIEXPORTACION"]);
                            $DREPALETIZAJEEX->__SET('ID_REPALETIZAJE', $REPALETIZAJE);
                            $DREPALETIZAJEEX->__SET('ESTADO_FOLIO', $_REQUEST['EFOLIO']); 
                            $DREPALETIZAJEEX_ADO->agregarDrepaletizaje($DREPALETIZAJEEX);                 
                            
                            $AUSUARIO_ADO->agregarAusuario2("NULL",1, 1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Detalle de repaletizaje Producto Terminado, mantener folio","fruta_drepaletizajeex","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],$_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );           

                            $EXIEXPORTACION->__SET('FOLIO_EXIEXPORTACION', $r["FOLIO_EXIEXPORTACION"]);
                            $EXIEXPORTACION->__SET('FOLIO_AUXILIAR_EXIEXPORTACION', $r["FOLIO_AUXILIAR_EXIEXPORTACION"]);
                            $EXIEXPORTACION->__SET('FOLIO_MANUAL', $r["FOLIO_MANUAL"]);
                            $EXIEXPORTACION->__SET('FECHA_EMBALADO_EXIEXPORTACION', $r["FECHA_EMBALADO_EXIEXPORTACION"]);      
                            $EXIEXPORTACION->__SET('CANTIDAD_ENVASE_EXIEXPORTACION', $CAJATOTAL);
                            $EXIEXPORTACION->__SET('KILOS_NETO_EXIEXPORTACION', $KILONETOEXITENCIA);
                            $EXIEXPORTACION->__SET('KILOS_BRUTO_EXIEXPORTACION', $KILOSBRUTOEXISTENCIA);
                            $EXIEXPORTACION->__SET('PDESHIDRATACION_EXIEXPORTACION', $PDESHISDRATACIONEXISTENCIA);
                            $EXIEXPORTACION->__SET('KILOS_DESHIRATACION_EXIEXPORTACION', $KILOSDESHIDRATACIONEXITENCIA);
                            $EXIEXPORTACION->__SET('OBSERVACION_EXIESPORTACION', $r["OBSERVACION_EXIESPORTACION"]);        
                            $EXIEXPORTACION->__SET('ALIAS_DINAMICO_FOLIO_EXIESPORTACION', $r["ALIAS_DINAMICO_FOLIO_EXIESPORTACION"]);
                            $EXIEXPORTACION->__SET('ALIAS_ESTATICO_FOLIO_EXIESPORTACION', $r["ALIAS_ESTATICO_FOLIO_EXIESPORTACION"]);   
                            $EXIEXPORTACION->__SET('STOCK', $r["STOCK"]);
                            $EXIEXPORTACION->__SET('EMBOLSADO', $EMBOLSADOEXISTENCIA);
                            $EXIEXPORTACION->__SET('GASIFICADO', $r["GASIFICADO"]);
                            $EXIEXPORTACION->__SET('PREFRIO', $r["PREFRIO"]);
                            $EXIEXPORTACION->__SET('TESTADOSAG', $r["TESTADOSAG"]);
                            $EXIEXPORTACION->__SET('VGM', $r["VGM"]);
                            $EXIEXPORTACION->__SET('COLOR', $r["COLOR"]);
                            $EXIEXPORTACION->__SET('FECHA_RECEPCION', $r["FECHA_RECEPCION"]);
                            $EXIEXPORTACION->__SET('FECHA_PROCESO', $r["FECHA_PROCESO"]);
                            $EXIEXPORTACION->__SET('FECHA_REEMBALAJE', $r["FECHA_REEMBALAJE"]);
                            $EXIEXPORTACION->__SET('FECHA_REPALETIZAJE', $r["FECHA_REPALETIZAJE"]);
                            $EXIEXPORTACION->__SET('INGRESO', $r["INGRESO"]);
                            $EXIEXPORTACION->__SET('ID_TCALIBRE', $r["ID_TCALIBRE"]);
                            $EXIEXPORTACION->__SET('ID_TEMBALAJE', $r["ID_TEMBALAJE"]);
                            $EXIEXPORTACION->__SET('ID_TMANEJO', $r["ID_TMANEJO"]);
                            $EXIEXPORTACION->__SET('ID_FOLIO', $r["ID_FOLIO"]);
                            $EXIEXPORTACION->__SET('ID_ESTANDAR', $r["ID_ESTANDAR"]);
                            $EXIEXPORTACION->__SET('ID_PRODUCTOR', $r["ID_PRODUCTOR"]);
                            $EXIEXPORTACION->__SET('ID_VESPECIES', $r["ID_VESPECIES"]);
                            $EXIEXPORTACION->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                            $EXIEXPORTACION->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
                            $EXIEXPORTACION->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']); 
                            $EXIEXPORTACION->__SET('ID_TCATEGORIA', $r['ID_TCATEGORIA']);
                            $EXIEXPORTACION->__SET('ID_TCOLOR', $r['ID_TCOLOR']);
                            $EXIEXPORTACION->__SET('ID_RECEPCION', $r["ID_RECEPCION"]); 
                            $EXIEXPORTACION->__SET('ID_PROCESO', $r["ID_PROCESO"]);
                            $EXIEXPORTACION->__SET('ID_REPALETIZAJE', $REPALETIZAJE);       
                            $EXIEXPORTACION->__SET('ID_REEMBALAJE', $r["ID_REEMBALAJE"]);  
                            $EXIEXPORTACION->__SET('ID_RECHAZADO', $r["ID_RECHAZADO"]);  
                            $EXIEXPORTACION->__SET('ID_LEVANTAMIENTO', $r["ID_LEVANTAMIENTO"]);   
                            $EXIEXPORTACION->__SET('ID_PLANTA2', $r["ID_PLANTA2"]);
                            $EXIEXPORTACION->__SET('ID_PLANTA3', $r["ID_PLANTA3"]);
                            $EXIEXPORTACION->__SET('ID_INPSAG2', $r["ID_INPSAG2"]); 
                            $EXIEXPORTACION->__SET('ID_ICARGA', $r["ID_ICARGA"]); 
                            $EXIEXPORTACION->__SET('ID_REPALETIZAJE2', $REPALETIZAJE);    
                            $EXIEXPORTACION->__SET('ID_EXIEXPORTACION2', $r["ID_EXIEXPORTACION"]); 
                            $EXIEXPORTACION->__SET('ESTADO_FOLIO', $_REQUEST['EFOLIO']);   
                            $EXIEXPORTACION_ADO->agregarExiexportacionRepaletizaje($EXIEXPORTACION);

                            $AUSUARIO_ADO->agregarAusuario2("NULL",1, 1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de existencia de Producto Terminado, mantener folio","fruta_exiexportacion","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],$_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );           
                            
                        
                    endforeach;
                endforeach;
            }
            if ($SINO == "0") {
                $id_dato =  $_REQUEST['IDP'];
                $accion_dato =  $_REQUEST['OPP'];
                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Accion realizada",
                        text:"Se agregado la selección al repaletizaje.",
                        showConfirmButton: true,
                        confirmButtonText:"Volver a repaletizaje",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href="' . $_REQUEST['URLO'] . '.php?op&id='.$id_dato.'&a='.$accion_dato.'&urlo='.$urlo_dato.'";                        
                    })
                </script>';
            }else{

            }
        }                     
        ?>


</body>
</html>