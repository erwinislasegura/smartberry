<?php

include_once "../../assest/config/validarUsuarioFruta.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../../assest/controlador/EEXPORTACION_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/VESPECIES_ADO.php';
include_once '../../assest/controlador/FOLIO_ADO.php';

include_once '../../assest/controlador/DESPACHOEX_ADO.php';
include_once '../../assest/controlador/EXIEXPORTACION_ADO.php';
include_once '../../assest/controlador/PCDESPACHO_ADO.php';

include_once '../../assest/modelo/DESPACHOEX.php';
include_once '../../assest/modelo/EXIEXPORTACION.php';
include_once '../../assest/modelo/PCDESPACHO.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$DESPACHOEX_ADO =  new DESPACHOEX_ADO();
$EXIEXPORTACION_ADO =  new EXIEXPORTACION_ADO();
$PCDESPACHO_ADO =  new PCDESPACHO_ADO();

$EEXPORTACION_ADO =  new EEXPORTACION_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$FOLIO_ADO =  new FOLIO_ADO();


//INIICIALIZAR MODELO
//INIICIALIZAR MODELO
$DESPACHOEX =  new DESPACHOEX();
$EXIEXPORTACION =  new EXIEXPORTACION();
$PCDESPACHO =  new PCDESPACHO();



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
$IDPCDESPACHO = "";

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


//INICIALIZAR ARREGLOS
$ARRAYPCDESPACHO = "";
$ARRAYESTANDAR = "";
$ARRAYEVERERECEPCIONID = "";
$ARRAYVERPRODUCTORID = "";
$ARRAYVERPVESPECIESID = "";
$ARRAYVERVESPECIESID = "";
$ARRAYVERFOLIOID = "";
$ARRAYBUSCAREXIEXPORTACION = "";


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
//OPERACION DE REGISTRO DE FILA

if (isset($id_dato) && isset($accion_dato) && isset($_SESSION['urlO'])) {
    $IDP = $id_dato;
    $OPP = $accion_dato;
    $URLO = $_SESSION['urlO'];

    $ARRAYDESPACHOEX=$DESPACHOEX_ADO->verDespachoex($IDP);    
    if($ARRAYDESPACHOEX){
        if($ARRAYDESPACHOEX[0]["TINPUSDA"]=="1"){
            $ARRAYPCDESPACHO = $PCDESPACHO_ADO->buscarPorEmpresaPlantaTemporadaSiInp($EMPRESAS, $PLANTAS, $TEMPORADAS);
        }
        if($ARRAYDESPACHOEX[0]["TINPUSDA"]=="0"){ 
            $ARRAYPCDESPACHO = $PCDESPACHO_ADO->buscarPorEmpresaPlantaTemporadaNoInp($EMPRESAS, $PLANTAS, $TEMPORADAS);
        }
    }

}
include_once "../../assest/config/validarDatosUrlD.php";

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Selección PC Despacho</title>
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
                                <h3 class="page-title">Frigorifico</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Modulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Frigorifico</li>
                                            <li class="breadcrumb-item" aria-current="page">Despacho</li>
                                            <li class="breadcrumb-item" aria-current="page">Despacho Exportación</li>
                                            <li class="breadcrumb-item" aria-current="page">Registro Despacho</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#">Seleccion PC Despacho</a> </li>
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
                                <h4 class="card-title">Selecciona los PC Despacho</h4>
                            </div>
                            <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato">
                                <div class="card-body ">
                                    <input type="hidden" class="form-control" placeholder="ID DESPACHOEX" id="IDP" name="IDP" value="<?php echo $IDP; ?>" />
                                    <input type="hidden" class="form-control" placeholder="OP DESPACHOEX" id="OPP" name="OPP" value="<?php echo $OPP; ?>" />
                                    <input type="hidden" class="form-control" placeholder="URL DESPACHOEX" id="URLO" name="URLO" value="<?php echo $URLO; ?>" />
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
                                                            <th>Numero </th>
                                                            <th>Selección</th>
                                                            <th>Estado</th>
                                                            <th>Cantidad Envase </th>
                                                            <th>Kilo Neto </th>
                                                            <th>Motivo </th>
                                                            <th>Fecha PC </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if($ARRAYPCDESPACHO){ ?>
                                                            <?php foreach ($ARRAYPCDESPACHO as $r) : ?>
                                                                <tr class="text-center">
                                                                    <td> <?php echo $r['NUMERO_PCDESPACHO']; ?> </td>
                                                                    <td>
                                                                        <div class="form-group">
                                                                            <input type="checkbox" name="SELECIONAREXISTENCIA[]" id="SELECIONAREXISTENCIA<?php echo $r['ID_PCDESPACHO']; ?>" value="<?php echo $r['ID_PCDESPACHO']; ?>">
                                                                            <label for="SELECIONAREXISTENCIA<?php echo $r['ID_PCDESPACHO']; ?>"> Seleccionar</label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                        if ($r['ESTADO_PCDESPACHO'] == "1") {
                                                                            echo "Creado";
                                                                        }
                                                                        if ($r['ESTADO_PCDESPACHO'] == "2") {
                                                                            echo "Confirmado";
                                                                        }
                                                                        if ($r['ESTADO_PCDESPACHO'] == "3") {
                                                                            echo "En Despacho";
                                                                        }
                                                                        if ($r['ESTADO_PCDESPACHO'] == "4") {
                                                                            echo "Despachado";
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td><?php echo $r['CANTIDAD_ENVASE_PCDESPACHO']; ?></td>
                                                                    <td><?php echo $r['KILOS_NETO_PCDESPACHO']; ?></td>
                                                                    <td><?php echo $r['MOTIVO_PCDESPACHO']; ?> </td>
                                                                    <td><?php echo $r['FECHA_PCDESPACHO']; ?></td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        <?php }; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                    <!-- /.box-body -->                                                    
                                    <div class="card-footer">
                                        <div class="btn-group btn-rounded btn-block col-xxl-4 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12" role="group" aria-label="Acciones generales">
                                            <button type="button" class="btn btn-success  " data-toggle="tooltip" title="Volver" name="CANCELAR" value="CANCELAR" Onclick="irPagina('<?php echo $URLO; ?>.php?op&id=<?php echo $id_dato; ?>&a=<?php echo $accion_dato; ?>');">
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
        $SINO = "0";
        $SELECIONAREXISTENCIA = $_REQUEST['SELECIONAREXISTENCIA'];
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
                location.href = "registroSelecionPCDespachoEx.php?op&id='.$id_dato.'&a='.$accion_dato.'";                            
            })
        </script>';
    }
    if ($SINO == "0") {
        foreach ($SELECIONAREXISTENCIA as $r) :
            $IDPCDESPACHO = $r;
            $ARRAYBUSCAREXIEXPORTACION = $EXIEXPORTACION_ADO->verExistenciaPorPCDespacho($IDPCDESPACHO);
            foreach ($ARRAYBUSCAREXIEXPORTACION as $s) :

                $EXIEXPORTACION->__SET('ID_DESPACHOEX', $IDDESPACHOEX);
                $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $s['ID_EXIEXPORTACION']);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $EXIEXPORTACION_ADO->actualizarSelecionarDespachoExCambiarEstado($EXIEXPORTACION);
                
                $AUSUARIO_ADO->agregarAusuario2("NULL",1,2,"".$_SESSION["NOMBRE_USUARIO"].", Se agrego la Existencia de producto terminado al despacho exportación.","fruta_exiexportacion", "NULL" ,$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

            endforeach;
            $PCDESPACHO->__SET('ID_PCDESPACHO', $IDPCDESPACHO);
            $PCDESPACHO->__SET('ID_DESPACHOEX', $IDDESPACHOEX);
            // LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
            $PCDESPACHO_ADO->actualizarPcdespachoADespacho($PCDESPACHO);

            

            $PCDESPACHO->__SET('ID_PCDESPACHO', $IDPCDESPACHO);
            // LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
            $PCDESPACHO_ADO->enDespacho($PCDESPACHO);

            $AUSUARIO_ADO->agregarAusuario2("NULL",1,2,"".$_SESSION["NOMBRE_USUARIO"].", Se agrego la PC al despacho exportación.","fruta_pcdespacho", "NULL" ,$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

        endforeach;
        if ($SINO == "0") {
            $id_dato =  $_REQUEST['IDP'];
            $accion_dato =  $_REQUEST['OPP'];
            // echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLO'] . ".php?op';</script>";
            echo '<script>
                Swal.fire({
                    icon:"success",
                    title:"Accion realizada",
                    text:"Se agregado la existencia asociadas al PC al despacho.",
                    showConfirmButton: true,
                    confirmButtonText:"Volver a Despacho",
                    closeOnConfirm:false
                }).then((result)=>{
                    location.href="' . $_REQUEST['URLO'] . '.php?op&id='.$id_dato.'&a='.$accion_dato.'";                        
                })
            </script>';   
        }
    }
}
?>
</body>

</html>