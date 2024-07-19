<?php

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/PVESPECIES_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/ERECEPCION_ADO.php';
include_once '../controlador/DRECEPCION_ADO.php';
include_once '../controlador/FOLIO_ADO.php';

include_once '../controlador/EXIMATERIAPRIMA_ADO.php';
include_once '../controlador/REPALETIZAJEHFO_ADO.php';
include_once '../controlador/DREPALETIZAJEMP_ADO.php';


include_once '../modelo/EXIMATERIAPRIMA.php';
include_once '../modelo/REPALETIZAJEHFO.php';
include_once '../modelo/DREPALETIZAJEMP.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR



$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$PVESPECIES_ADO =  new PVESPECIES_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$ERECEPCION_ADO =  new ERECEPCION_ADO();
$DRECEPCION_ADO =  new DRECEPCION_ADO();
$FOLIO_ADO =  new FOLIO_ADO();

$EXIMATERIAPRIMA_ADO =  new EXIMATERIAPRIMA_ADO();
$REPALETIZAJEHFO_ADO =  new REPALETIZAJEHFO_ADO();
$DREPALETIZAJEMP_ADO =  new DREPALETIZAJEMP_ADO();

//INIICIALIZAR MODELO
$EXIMATERIAPRIMA =  new EXIMATERIAPRIMA();
$REPALETIZAJEHFO =  new REPALETIZAJEHFO();
$DREPALETIZAJEMP =  new DREPALETIZAJEMP();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD


$IDCAJAS = "";
$CAJAS = "";
$FOLIOCAJAS = "";
$TOTALCAJAS = 0;
$PESOENVASEESTANDAR = "";

$FOLIODRECEPCION = "";
$NUMEROFOLIODRECEPCION = "";
$ULTIMOFOLIO = "";
$KILOSNETOSREPALETIZAJE = "";
$KILOSPROMEDIOREPALETIZAJE = "";
$PESOPALLETREPALETIZAJE = "";
$FOLIO = "";
$FOLIOALIAS = "";

$CONTADOR = 0;

$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";

$IDOP = "";
$OP = "";
$NODATOURL = "";


$SINO = "";
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
$ARRAYEXISTENCIABOLSA = "";
$ARRAYEXISTENCIABOLSA2 = "";
$ARRAYDREPALETIZAJETOTALESPOREXISTENCIA = "";
$ARRAYEXISTENCIATOTALESPORREPALETIZAJE = "";
$ARRAYVERDRECEPCION = "";

$ARRAYVERFOLIO = "";
$ARRAYULTIMOFOLIO = "";

$ARRAYEXIMATERIAPRIMATOMADO = "";
$ARRAYSELECIONARCAJASID = "";
$ARRAYSELECIONARCAJAS = "";
$ARRAYSELECIONARCAJASFOLIO = "";
$ARRAYSELECIONARTOTALCAJA = "";


//OPERACIONES
//OPERACION DE REGISTRO DE FILA

if (isset($_REQUEST['AGREGAR'])) {

    $ARRAYSELECIONARCAJASID = $_REQUEST['IDCAJA'];
    $ARRAYSELECIONARCAJAS = $_REQUEST['CAJAS'];
    $ARRAYSELECIONARCAJASFOLIO = $_REQUEST['CAJAFOLIO'];
    $ARRAYSELECIONARTOTALCAJA = $_REQUEST['TOTALCAJA'];

    foreach ($ARRAYSELECIONARCAJASID as $F) :
        $IDCAJAS = $F;
        $CAJAS = $ARRAYSELECIONARCAJAS[$F];
        $FOLIOCAJAS = $ARRAYSELECIONARCAJASFOLIO[$F];
        $TOTALCAJAS = $ARRAYSELECIONARTOTALCAJA[$F];


        $ARRAYEXISTENCIA = $EXIMATERIAPRIMA_ADO->verEximateriaprima($IDCAJAS);
        $ARRAYDREPALETIZAJETOTALESPOREXISTENCIA = $DREPALETIZAJEMP_ADO->totalesDrepaletizajePorExistencia($IDCAJAS);
        $ARRAYEXISTENCIATOTALESPORREPALETIZAJE = $EXIMATERIAPRIMA_ADO->buscarTotalesPorRepaletizajeExistencia($_REQUEST['REPALETIZAJE'], $IDCAJAS);
        $ARRAYEXISTENCIABOLSA2 = $EXIMATERIAPRIMA_ADO->buscarPorRepaletizajeBolsa($_REQUEST['REPALETIZAJE'], $FOLIOCAJAS);

        if ($ARRAYDREPALETIZAJETOTALESPOREXISTENCIA) {
            $TOTALCAJAS = $TOTALCAJAS - $ARRAYEXISTENCIABOLSA2[0]['TOTAL_ENVASE'];


            if ($ARRAYDREPALETIZAJETOTALESPOREXISTENCIA[0]['TOTAL_ENVASE'] >= $ARRAYEXISTENCIATOTALESPORREPALETIZAJE[0]['TOTAL_ENVASE']) {
                $SINO = "1";
                if ($CAJAS) {
                    $MENSAJE = $MENSAJE . " <br> " . $FOLIOCAJAS . ": NO SE PUEDE INGRESAR MAS CAJAS";
                }
            } else {
                $SINO = "0";
                $MENSAJE = $MENSAJE;
            }
        }

        if ($CAJAS != "") {
            $SINO = "0";
            $MENSAJE1 = $MENSAJE1;
            if ($CAJAS <= 0) {
                $SINO = "1";
                $MENSAJE1 = $MENSAJE1 . " <br> " . $FOLIOCAJAS . ": SOLO DEBEN INGRESAR UN VALOR MAYOR A ZERO";
            } else {

                $SINO = "0";
                $MENSAJE1 = $MENSAJE1;
                if ($CAJAS < $ARRAYEXISTENCIA[0]['CANTIDAD_ENVASE_EXIMATERIAPRIMA']) {
                    $SINO = "0";
                    $MENSAJE2 = $MENSAJE2;
                    if ($CAJAS > $TOTALCAJAS) {
                        $SINO = "1";
                        $MENSAJE2 = $MENSAJE2 . " <br> " . $FOLIOCAJAS . ": EL VALOR A INGRESAR DEBE SER MENOR O IGUAL AL ORIGINAL";
                    }
                } else {
                    $SINO = "1";
                    $MENSAJE2 = $MENSAJE2 . " <br> " . $FOLIOCAJAS . ": EL VALOR A INGRESAR DEBE SER MENOR AL ORIGINAL";
                }
            }
        } else {
            $SINO = "1";
        }


        if ($SINO == "0") {

            $CONTADOR = $CONTADOR + 1;
            $ARRAYVERFOLIO = $FOLIO_ADO->verFolioPorEmpresaPlantaTemporadaTmateriaprima($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
            $FOLIO = $ARRAYVERFOLIO[0]['ID_FOLIO'];
            $ARRAYULTIMOFOLIO = $EXIMATERIAPRIMA_ADO->obtenerFolio($FOLIO);
            $ARRAYEXISTENCIA = $EXIMATERIAPRIMA_ADO->verEximateriaprima($IDCAJAS);

            if ($ARRAYULTIMOFOLIO[0]['ULTIMOFOLIO'] == 0) {
                $FOLIODRECEPCION = $ARRAYVERFOLIO[0]['NUMERO_FOLIO'];
            } else {
                $FOLIODRECEPCION =  $ARRAYVERFOLIO[0]['NUMERO_FOLIO'] + $ARRAYULTIMOFOLIO[0]['ULTIMOFOLIO'];
            }
            $NUMEROFOLIODRECEPCION = $FOLIODRECEPCION + 1;

            $ARRAYESTANDAR = $ERECEPCION_ADO->verEstandar($ARRAYEXISTENCIA[0]['ID_ESTANDAR']);
            $PESOENVASEESTANDAR = $ARRAYESTANDAR[0]['PESO_ENVASE_ESTANDAR'];
            $ARRAYVERDRECEPCION = $DRECEPCION_ADO->buscarPorRecepcionFolio($ARRAYEXISTENCIA[0]['ID_RECEPCION'], $FOLIOCAJAS);

            if ($ARRAYVERDRECEPCION) {
                $KILOSPROMEDIOREPALETIZAJE = $ARRAYVERDRECEPCION[0]['KILOS_PROMEDIO_DRECEPCION'];
                $PESOPALLETREPALETIZAJE = $ARRAYVERDRECEPCION[0]['PESO_PALLET_DRECEPCION'];
            } else {
                $KILOSPROMEDIOREPALETIZAJE = $ARRAYEXISTENCIA[0]['KILOS_PROMEDIO_EXIMATERIAPRIMA'];
                $PESOPALLETREPALETIZAJE = $ARRAYEXISTENCIA[0]['PESO_PALLET_EXIMATERIAPRIMA'];
            }


            //CALCULAR NUEVO NETO A REGISTRAR EN BASE AL ESTANDAR //OBTENCIONS DE LOS DATOS, OBTENIDOS EN LA CONSULTA              
            $KILOSNETOSREPALETIZAJE = $CAJAS * $KILOSPROMEDIOREPALETIZAJE;
            $PESOENVASEESTANDAR = $PESOENVASEESTANDAR * $CAJAS;


            $KILOSBRUTO = $KILOSNETOSREPALETIZAJE + $PESOENVASEESTANDAR + $PESOPALLETREPALETIZAJE;

            $FOLIOALIAS =  "EMPRESA:" . $_REQUEST['EMPRESA'] . "_PLANTA:" . $_REQUEST['PLANTA'] . "_TEMPORADA:" . $_REQUEST['TEMPORADA'] . "_TIPO_FOLIO:MATERIA PRIMA_REPALETIZAJE:" . $_REQUEST['REPALETIZAJE'];
            $ARRAYVERFOLIOPOREPT = $EXIMATERIAPRIMA_ADO->buscarPorRepaletizajeNumeroLinea($_REQUEST['REPALETIZAJE'], $ARRAYEXISTENCIA[0]['NUMERO_LINEA'], $NUMEROFOLIODRECEPCION);


            $DREPALETIZAJEMP->__SET('FOLIO_NUEVO_DREPALETIZAJE', $NUMEROFOLIODRECEPCION);
            $DREPALETIZAJEMP->__SET('CANTIDAD_ENVASE_DREPALETIZAJE', $CAJAS);
            $DREPALETIZAJEMP->__SET('KILOS_NETO_DREPALETIZAJE', $KILOSNETOSREPALETIZAJE);
            $DREPALETIZAJEMP->__SET('KILOS_BRUTO_DREPALETIZAJE', $KILOSBRUTO);
            $DREPALETIZAJEMP->__SET('KILOS_PROMEDIO_DREPALETIZAJE', $KILOSPROMEDIOREPALETIZAJE);
            $DREPALETIZAJEMP->__SET('PESO_PALLET_DREPALETIZAJE',  $PESOPALLETREPALETIZAJE);
            $DREPALETIZAJEMP->__SET('ALIAS_FOLIO_DREPALETIZAJE',  $FOLIOALIAS);
            $DREPALETIZAJEMP->__SET('ID_ESTANDAR', $ARRAYEXISTENCIA[0]['ID_ESTANDAR']);
            $DREPALETIZAJEMP->__SET('ID_PRODUCTOR', $ARRAYEXISTENCIA[0]['ID_PRODUCTOR']);
            $DREPALETIZAJEMP->__SET('ID_PVESPECIES', $ARRAYEXISTENCIA[0]['ID_PVESPECIES']);
            $DREPALETIZAJEMP->__SET('ID_FOLIO', $ARRAYEXISTENCIA[0]['ID_FOLIO']);
            $DREPALETIZAJEMP->__SET('ID_ESTANDAR', $ARRAYEXISTENCIA[0]['ID_ESTANDAR']);
            $DREPALETIZAJEMP->__SET('ID_EXIMATERIAPRIMA', $ARRAYEXISTENCIA[0]['ID_EXIMATERIAPRIMA']);
            $DREPALETIZAJEMP->__SET('ID_REPALETIZAJE', $_REQUEST['REPALETIZAJE']);
            $DREPALETIZAJEMP_ADO->agregarDrepaletizaje($DREPALETIZAJEMP);



            if (empty($ARRAYVERFOLIOPOREPT)) {
                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
                $EXIMATERIAPRIMA->__SET('FOLIO_EXIMATERIAPRIMA', $ARRAYEXISTENCIA[0]['FOLIO_AUXILIAR_EXIMATERIAPRIMA']);
                $EXIMATERIAPRIMA->__SET('NUMERO_LINEA', $ARRAYEXISTENCIA[0]['NUMERO_LINEA']);
                $EXIMATERIAPRIMA->__SET('FOLIO_AUXILIAR_EXIMATERIAPRIMA', $NUMEROFOLIODRECEPCION);
                $EXIMATERIAPRIMA->__SET('KILOS_NETO_EXIMATERIAPRIMA', $KILOSNETOSREPALETIZAJE);
                $EXIMATERIAPRIMA->__SET('KILOS_BRUTO_EXIMATERIAPRIMA', $KILOSBRUTO);
                $EXIMATERIAPRIMA->__SET('CANTIDAD_ENVASE_EXIMATERIAPRIMA', $CAJAS);
                $EXIMATERIAPRIMA->__SET('KILOS_PROMEDIO_EXIMATERIAPRIMA', $KILOSPROMEDIOREPALETIZAJE);
                $EXIMATERIAPRIMA->__SET('PESO_PALLET_EXIMATERIAPRIMA', $PESOPALLETREPALETIZAJE);
                $EXIMATERIAPRIMA->__SET('FECHA_COSECHA_EXIMATERIAPRIMA', $ARRAYEXISTENCIA[0]['FECHA_COSECHA_EXIMATERIAPRIMA']);
                $EXIMATERIAPRIMA->__SET('ALIAS_FOLIO_EXIMATERIAPRIMA',  $FOLIOALIAS);
                $EXIMATERIAPRIMA->__SET('ID_ESTANDAR', $ARRAYEXISTENCIA[0]['ID_ESTANDAR']);
                $EXIMATERIAPRIMA->__SET('ID_PRODUCTOR', $ARRAYEXISTENCIA[0]['ID_PRODUCTOR']);
                $EXIMATERIAPRIMA->__SET('ID_PVESPECIES', $ARRAYEXISTENCIA[0]['ID_PVESPECIES']);
                $EXIMATERIAPRIMA->__SET('ID_FOLIO',  $FOLIO);
                $EXIMATERIAPRIMA->__SET('ID_REPALETIZAJE', $_REQUEST['REPALETIZAJE']);
                $EXIMATERIAPRIMA->__SET('ID_RECEPCION',  $ARRAYEXISTENCIA[0]['ID_RECEPCION']);
                $EXIMATERIAPRIMA->__SET('ID_TMANEJO',  $ARRAYEXISTENCIA[0]['ID_TMANEJO']);
                $EXIMATERIAPRIMA->__SET('ID_EMPRESA', $ARRAYEXISTENCIA[0]['ID_EMPRESA']);
                $EXIMATERIAPRIMA->__SET('ID_PLANTA', $ARRAYEXISTENCIA[0]['ID_PLANTA']);
                $EXIMATERIAPRIMA->__SET('ID_TEMPORADA', $ARRAYEXISTENCIA[0]['ID_TEMPORADA']);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $EXIMATERIAPRIMA_ADO->agregarEximateriaprimaRepaletizaje($EXIMATERIAPRIMA);
            }

            if ($ARRAYVERFOLIOPOREPT) {
                $EXIMATERIAPRIMA->__SET('FOLIO_EXIMATERIAPRIMA', $ARRAYEXISTENCIA[0]['FOLIO_AUXILIAR_EXIMATERIAPRIMA']);
                $EXIMATERIAPRIMA->__SET('NUMERO_LINEA', $ARRAYEXISTENCIA[0]['NUMERO_LINEA']);
                $EXIMATERIAPRIMA->__SET('FOLIO_AUXILIAR_EXIMATERIAPRIMA', $NUMEROFOLIODRECEPCION);
                $EXIMATERIAPRIMA->__SET('KILOS_NETO_EXIMATERIAPRIMA', $KILOSNETOSREPALETIZAJE);
                $EXIMATERIAPRIMA->__SET('KILOS_BRUTO_EXIMATERIAPRIMA', $KILOSBRUTO);
                $EXIMATERIAPRIMA->__SET('CANTIDAD_ENVASE_EXIMATERIAPRIMA', $CAJAS);
                $EXIMATERIAPRIMA->__SET('KILOS_PROMEDIO_EXIMATERIAPRIMA', $KILOSPROMEDIOREPALETIZAJE);
                $EXIMATERIAPRIMA->__SET('PESO_PALLET_EXIMATERIAPRIMA', $PESOPALLETREPALETIZAJE);
                $EXIMATERIAPRIMA->__SET('FECHA_COSECHA_EXIMATERIAPRIMA', $ARRAYEXISTENCIA[0]['FECHA_COSECHA_EXIMATERIAPRIMA']);
                $EXIMATERIAPRIMA->__SET('ID_ESTANDAR', $ARRAYEXISTENCIA[0]['ID_ESTANDAR']);
                $EXIMATERIAPRIMA->__SET('ID_PRODUCTOR', $ARRAYEXISTENCIA[0]['ID_PRODUCTOR']);
                $EXIMATERIAPRIMA->__SET('ID_PVESPECIES', $ARRAYEXISTENCIA[0]['ID_PVESPECIES']);
                $EXIMATERIAPRIMA->__SET('ID_FOLIO',  $FOLIO);
                $EXIMATERIAPRIMA->__SET('ID_REPALETIZAJE', $_REQUEST['REPALETIZAJE']);
                $EXIMATERIAPRIMA->__SET('ID_RECEPCION',  $ARRAYEXISTENCIA[0]['ID_RECEPCION']);
                $EXIMATERIAPRIMA->__SET('ID_TMANEJO',  $ARRAYEXISTENCIA[0]['ID_TMANEJO']);
                $EXIMATERIAPRIMA->__SET('ID_EMPRESA', $ARRAYEXISTENCIA[0]['ID_EMPRESA']);
                $EXIMATERIAPRIMA->__SET('ID_PLANTA', $ARRAYEXISTENCIA[0]['ID_PLANTA']);
                $EXIMATERIAPRIMA->__SET('ID_TEMPORADA', $ARRAYEXISTENCIA[0]['ID_TEMPORADA']);
                $EXIMATERIAPRIMA->__SET('ID_EXIMATERIAPRIMA', $ARRAYEXISTENCIA[0]['ID_EXIMATERIAPRIMA']);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $EXIMATERIAPRIMA_ADO->actualizarEximateriaprimaRepaletizaje($EXIMATERIAPRIMA);
            }
        }

    endforeach;


    if ($SINO == "0") {


        echo "
                <script type='text/javascript'>
                    window.opener.refrescar()
                    window.close();
                    </script> 
                ";
    }
}
//OPERACION PARA OBTENER EL ID RECEPCION Y FOLIO BASE, SOLO SE OCUPA PARA CREAR UN REGISTRO NUEVO
if (isset($_REQUEST['EMPRESA']) && isset($_REQUEST['PLANTA']) && isset($_REQUEST['TEMPORADA']) && isset($_REQUEST['REPALETIZAJE'])) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $EMPRESA = $_REQUEST['EMPRESA'];
    $PLANTA = $_REQUEST['PLANTA'];
    $TEMPORADA = $_REQUEST['TEMPORADA'];
    $REPALETIZAJE = $_REQUEST['REPALETIZAJE'];

    $ARRAYEXIMATERIAPRIMATOMADO = $EXIMATERIAPRIMA_ADO->buscarPorRepaletizajeEnRepaletizaje($REPALETIZAJE);

    $NODATOURL = "1";
} else {
    $NODATOURL = "0";
}




if ($NODATOURL == "0") {
    header('Location: index.php');
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Detalle Repaletizaje</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../config/urlHead.php"; ?>
        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
                //FUNCION PARA CERRAR VENTANA Y ACTUALIZAR PRINCIPAL
                function cerrar() {
                    window.opener.refrescar()
                    window.close();
                }
            </script>

</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary" onload="mueveReloj()">
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <?php //include_once "../config/menu.php"; 
            ?>
            <section class="content">
                <div class="box">
                    <div class="box-header with-border">
                        <!--
                                        <h4 class="box-title">Different Width</h4>
                                        -->
                    </div>

                    <form class="form" role="form" method="post" name="form_reg_dato" onsubmit="return validacion()">
                        <div class="box-body ">

                            <input type="hidden" id="PLANTA" name="PLANTA" value="<?php echo $PLANTA; ?>" />
                            <input type="hidden" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESA; ?>" />
                            <input type="hidden" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADA; ?>" />
                            <input type="hidden" id="REPALETIZAJE" name="REPALETIZAJE" value="<?php echo $REPALETIZAJE; ?>" />
                            <div class="table-responsive">
                                <table id="repaletizajeDetalle" class="table table-hover " style="width: 100%;">
                                    <thead>
                                        <tr class="text-left">
                                            <th>
                                                <a href="#" class="text-warning hover-warning">
                                                    N° Folio
                                                </a>
                                            </th>
                                            <th>Selecion Cajas</th>
                                            <th>Fecha Cosecha </th>
                                            <th>Cantidad Envase </th>
                                            <th>Kilo Neto </th>
                                            <th>CSG</th>
                                            <th>Productor</th>
                                            <th>Variedad</th>
                                            <th>Estandar </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($ARRAYEXIMATERIAPRIMATOMADO) { ?>
                                            <?php foreach ($ARRAYEXIMATERIAPRIMATOMADO as $r) : ?>

                                                <tr class="text-left">
                                                    <td>
                                                        <a href="#" class="text-warning hover-warning">
                                                            <?php
                                                            if ($r['FOLIO_AUXILIAR_EXIMATERIAPRIMA']) {
                                                                echo $r['FOLIO_AUXILIAR_EXIMATERIAPRIMA'];
                                                            } else {
                                                                echo $r['FOLIO_EXIMATERIAPRIMA'];
                                                            }
                                                            ?>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="hidden" class="form-control" name="IDCAJA[]" value="<?php echo $r['ID_EXIMATERIAPRIMA']; ?>">
                                                            <input type="hidden" class="form-control" name="TOTALCAJA[<?php echo $r['ID_EXIMATERIAPRIMA']; ?>]" value="<?php echo $r['CANTIDAD_ENVASE_EXIMATERIAPRIMA']; ?>">
                                                            <input type="hidden" class="form-control" name="CAJAFOLIO[<?php echo $r['ID_EXIMATERIAPRIMA']; ?>]" value="<?php echo $r['FOLIO_AUXILIAR_EXIMATERIAPRIMA']; ?>">
                                                            <input type="text" class="form-control" name="CAJAS[<?php echo $r['ID_EXIMATERIAPRIMA']; ?>]">
                                                        </div>
                                                    </td>
                                                    <td><?php echo $r['FECHA_COSECHA_EXIMATERIAPRIMA']; ?></td>
                                                    <td>
                                                        <?php
                                                        $ARRAYEXISTENCIABOLSA = $EXIMATERIAPRIMA_ADO->buscarPorRepaletizajeBolsa($REPALETIZAJE, $r['FOLIO_AUXILIAR_EXIMATERIAPRIMA']);

                                                        if ($ARRAYEXISTENCIABOLSA) {
                                                            echo $r['CANTIDAD_ENVASE_EXIMATERIAPRIMA'] - $ARRAYEXISTENCIABOLSA[0]['TOTAL_ENVASE'];
                                                        } else {
                                                            echo $r['CANTIDAD_ENVASE_EXIMATERIAPRIMA'];
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($ARRAYEXISTENCIABOLSA) {
                                                            echo $r['KILOS_NETO_EXIMATERIAPRIMA'] - $ARRAYEXISTENCIABOLSA[0]['TOTAL_NETO'];
                                                        } else {
                                                            echo $r['KILOS_NETO_EXIMATERIAPRIMA'];
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);
                                                        echo $ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'];
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        echo $ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'];
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $ARRAYVERPVESPECIESID = $PVESPECIES_ADO->verPvespecies($r['ID_PVESPECIES']);
                                                        $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($ARRAYVERPVESPECIESID[0]['ID_VESPECIES']);
                                                        echo $ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'];
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $ARRAYEVERERECEPCIONID = $ERECEPCION_ADO->verEstandar($r['ID_ESTANDAR']);
                                                        echo $ARRAYEVERERECEPCIONID[0]['NOMBRE_ESTANDAR'];
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php } ?>

                                    </tbody>
                                </table>
                                <label id="val_dproceso" class="validacion center"><?php echo $MENSAJE; ?> </label>
                                <label id="val_dproceso" class="validacion center"><?php echo $MENSAJE1; ?> </label>
                                <label id="val_dproceso" class="validacion center"><?php echo $MENSAJE2; ?> </label>
                            </div>


                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1" name="CERRAR" value="CERRAR" Onclick="cerrar();">
                                    <i class="ti-trash"></i> CERRAR
                                </button>
                                <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="AGREGAR" value="AGREGAR">
                                    <i class="ti-save-alt"></i> AGREGAR
                                </button>


                            </div>
                        </div>
                    </form>
                </div>


                <!--.row -->
            </section>




            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php //include_once "../config/footer.php"; 
                ?>
                <?php //include_once "../config/menuExtra.php"; 
                ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../config/urlBase.php"; ?>
</body>

</html>