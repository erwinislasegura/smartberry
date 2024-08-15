<?php

include_once "../../assest/config/validarUsuarioFruta.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../../assest/controlador/EEXPORTACION_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/VESPECIES_ADO.php';
include_once '../../assest/controlador/FOLIO_ADO.php';
include_once '../../assest/controlador/TMANEJO_ADO.php';
include_once '../../assest/controlador/TCALIBRE_ADO.php';
include_once '../../assest/controlador/TEMBALAJE_ADO.php';
include_once '../../assest/controlador/ICARGA_ADO.php';


include_once '../../assest/controlador/DESPACHOEX_ADO.php';
include_once '../../assest/controlador/EXIEXPORTACION_ADO.php';

include_once '../../assest/modelo/DESPACHOEX.php';
include_once '../../assest/modelo/EXIEXPORTACION.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$EEXPORTACION_ADO =  new EEXPORTACION_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$FOLIO_ADO =  new FOLIO_ADO();
$TMANEJO_ADO =  new TMANEJO_ADO();
$TCALIBRE_ADO =  new TCALIBRE_ADO();
$TEMBALAJE_ADO =  new TEMBALAJE_ADO();
$ICARGA_ADO =  new ICARGA_ADO();


$DESPACHOEX_ADO =  new DESPACHOEX_ADO();
$EXIEXPORTACION_ADO =  new EXIEXPORTACION_ADO();

//INIICIALIZAR MODELO
$DESPACHOEX =  new DESPACHOEX();
$EXIEXPORTACION =  new EXIEXPORTACION();



$NUMEROFOLIO = "";
$IDEXIEXPORTACION = "";
$PROCESO = "";
$PRODUCTOR = "";
$PVESPECIES = "";
$SELECIONAREXISTENCIA = "";

$ESTANDARPERSONETO = "";
$NETONUEVO = "";

$TOTALCAJAS = 0;
$TOTALNETO = 0;


$IDDESPACHOEX = "";

$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";


$DISABLED = "";
$FOCUS = "";
$BORDER = "";
$MENSAJE = "";


$IDOP = "";
$IDOP2 = "";
$OP = "";
$NODATOURL = "";

$SINO = "";
$SINO2 = "";


//INICIALIZAR ARREGLOS
$ARRAYEXIEXPORTACION = "";

$ARRAYESTANDAR = "";

$ARRAYEVERERECEPCIONID = "";
$ARRAYVERPRODUCTORID = "";
$ARRAYVERPVESPECIESID = "";
$ARRAYVERVESPECIESID = "";
$ARRAYVERFOLIOID = "";
$ARRAYVERPCDESPACHO = "";
$ARRAYVERICARGA="";
$ARRAYBUSCARNUMEROFOLIOEXIEXPORTACION = "";
$ARRAYTMANEJO = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES

//OPERACIONES

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
//OPERACION DE REGISTRO DE FILA



if (isset($id_dato) && isset($accion_dato) && isset($urlo_dato)) {
    $IDP = $id_dato;
    $OPP = $accion_dato;
    $URLO = $urlo_dato;
    $ARRAYEXIEXPORTACION = $EXIEXPORTACION_ADO->buscarPorEmpresaPlantaTemporadaNoAsignado($EMPRESAS, $PLANTAS, $TEMPORADAS);
}
include_once "../../assest/config/validarDatosUrlD.php";


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Selección Exitencia</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../../assest/config/urlHead.php"; ?>
        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
            
                //FUNCION PARA CERRAR VENTANA Y ACTUALIZAR PRINCIPAL
                function cerrar() {
                    window.opener.refrescar()
                    window.close();
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
            <?php include_once "../../assest/config/menuFruta.php";  ?>

            <div class="content-wrapper">
                <div class="container-full">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Asignar Folio a Referencia </h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#">Seleccion Existencia a Referencia</a> </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <?php include_once "../../assest/config/verIndicadorEconomico.php"; ?>
                        </div>
                    </div>
                    <section class="content">
                        <div class="card">                        
                            <div class="card-header with-border bg-info">                                   
                                <h4 class="card-title">Seleccionar existencia</h4>                                        
                            </div>
                            <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato">
                                <div class="card-body ">
                                    <input type="hidden" class="form-control" placeholder="ID DESPACHO" id="IDP" name="IDP" value="<?php echo $IDP; ?>" />
                                    <input type="hidden" class="form-control" placeholder="OP DESPACHO" id="OPP" name="OPP" value="<?php echo $OPP; ?>" />
                                    <input type="hidden" class="form-control" placeholder="URL DESPACHO" id="URLO" name="URLO" value="<?php echo $URLO; ?>" />
                                    <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                    <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTA" name="PLANTA" value="<?php echo $PLANTAS; ?>" />
                                    <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADAS; ?>" />
                                    <label id="val_validato" class="validacion"> <?php echo $MENSAJE; ?> </label>                                
                                    <div clas="row">
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="table-responsive">
                                                <table id="selecionExistencia" class="table-hover " style="width: 100%;">
                                                    <thead>
                                                        <tr class="text-center">
                                                        <th>Selección </th>
                                                            <th>Folio </th>
                                                            <th>Estado Folio </th>
                                                            <th>Código Estandar </th>
                                                            <th>Envase/Estandar </th>

                                                            <th>Cantidad Envase </th>
                                                            <th>CSG</th>
                                                            <th>Productor</th>
                                                            <th>Variedad</th>
                                                            <th>Fecha Embalado </th>

                                                            <th>Estado Calidad</th>
                                                            <th>Condición </th>
                                                            <th>Selección</th>
                                                            
                            
                                                            
                                                            <th>Kilo Neto </th>
                                                            <th>Tipo Manejo</th>
                                                            <th>Tipo Calibre</th>
                                                            <th>Tipo Embalaje</th>
                                                            <th>Stock</th>
                                                            <th>Numero Referencia</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($ARRAYEXIEXPORTACION as $r) : ?>
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

                                                            if($r['COLOR'] == "1"){}else{
                                                            ?>
                                                            <tr class="text-center">
                                                            <td>
                                                                    <div class="form-group">
                                                                        <input type="checkbox" name="SELECIONAREXISTENCIA[]" id="SELECIONAREXISTENCIA<?php echo $r['ID_EXIEXPORTACION']; ?>" value="<?php echo $r['ID_EXIEXPORTACION']; ?>">
                                                                        <label for="SELECIONAREXISTENCIA<?php echo $r['ID_EXIEXPORTACION']; ?>"> Seleccionar</label>
                                                                    </div>
                                                                </td>
                                                                <td>                                                                   
                                                                    <span class="<?php echo $TRECHAZOCOLOR; ?>">
                                                                        <?php echo $r['FOLIO_AUXILIAR_EXIEXPORTACION']; ?>
                                                                    </span>
                                                                </td>
                                                                <td><?php echo $r['DESCRIPCION_ESTADO']; ?></td>
                                                                <td><?php echo $CODIGOESTANDAR; ?></td>
                                                                <td><?php echo $NOMBREESTANDAR; ?></td>

                                                                <td><?php echo $r['ENVASE']; ?></td>
                                                                <td><?php echo $CSGPRODUCTOR; ?></td>
                                                                <td><?php echo $NOMBREPRODUCTOR; ?></td>
                                                                <td><?php echo $NOMBREVESPECIES; ?></td>
                                                                <td><?php echo $r['EMBALADO']; ?></td>


                                                                <td><?php echo $COLOR; ?></td>
                                                                <td><?php echo $ESTADOSAG; ?></td>
                                                                
                                                                
                                                                
                                                                
                                                                


                                                                <td><?php echo $r['NETO']; ?></td>
                                                                <td><?php echo $NOMBRETMANEJO; ?></td>
                                                                <td><?php echo $NOMBRETCALIBRE; ?></td>
                                                                <td><?php echo $NOMBRETEMBALAJE; ?></td>
                                                                <td><?php echo $r['STOCKR']; ?></td>
                                                                <td><?php echo $NUMEROREFERENCIA; ?></td>
                                                            </tr>
                                                        <?php } endforeach; ?>
                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                    <!-- /.box-body -->                                    
                                    <div class="card-footer">
                                        <div class="btn-group btn-rounded btn-block col-xxl-4 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12" role="group" aria-label="Acciones generales">
                                            <button type="button" class="btn btn-success  " data-toggle="tooltip" title="Volver" name="CANCELAR" value="CANCELAR" Onclick="irPagina('listarICarga.php');" >
                                                <i class="ti-back-left "></i> Volver
                                            </button>
                                            <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Seleccionar" name="AGREGAR" value="AGREGAR" <?php echo $DISABLED; ?>>
                                                <i class="ti-save-alt"></i> Seleccionar
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
        <?php
            if (isset($_REQUEST['AGREGAR'])) {
                $IDDESPACHOEX = $_REQUEST['IDP'];
                if (isset($_REQUEST['SELECIONAREXISTENCIA'])) {
                    $SELECIONAREXISTENCIA = $_REQUEST['SELECIONAREXISTENCIA'];
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
                            location.href = "registroSelecionExistenciaPTDespachoPt.php?op&id='.$id_dato.'&a='.$accion_dato.'";                            
                        })
                    </script>';
                }
                if ($SINO == "0") {
                    foreach ($SELECIONAREXISTENCIA as $r) :

                        $IDEXIEXPORTACION = $r;
                        $EXIEXPORTACION->__SET('REFERENCIA', $IDDESPACHOEX);
                        $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $IDEXIEXPORTACION);
                        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                        $EXIEXPORTACION_ADO->actualizarAsignarReferencia($EXIEXPORTACION);

                        $AUSUARIO_ADO->agregarAusuario2("NULL",1,2,"".$_SESSION["NOMBRE_USUARIO"].", Se agrego la Existencia  al despacho de producto terminado.","fruta_exiexportacion", "NULL" ,$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

                    endforeach;
                    $id_dato =  $_REQUEST['IDP'];
                    $accion_dato =  $_REQUEST['OPP'];
                    echo '<script>
                        Swal.fire({
                            icon:"success",
                            title:"Accion realizada",
                            text:"Se agregado los folios a la referencia.",
                            showConfirmButton: true,
                            confirmButtonText:"Volver al listado de Int. Carga",
                            closeOnConfirm:false
                        }).then((result)=>{
                            location.href="./listarICarga.php";                        
                        })
                    </script>';
                }
            }
        ?>
</body>

</html>