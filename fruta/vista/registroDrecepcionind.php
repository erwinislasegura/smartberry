<?php


include_once "../../assest/config/validarUsuarioFruta.php";
//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES


include_once '../../assest/controlador/EINDUSTRIAL_ADO.php';
include_once '../../assest/controlador/VESPECIES_ADO.php';
include_once '../../assest/controlador/FOLIO_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/TMANEJO_ADO.php';
include_once '../../assest/controlador/RECEPCIONIND_ADO.php';

include_once '../../assest/controlador/DRECEPCIONIND_ADO.php';
include_once '../../assest/controlador/DPEXPORTACION_ADO.php';
include_once '../../assest/controlador/EXIINDUSTRIAL_ADO.php';
include_once '../../assest/controlador/EXIMATERIAPRIMA_ADO.php';

include_once '../../assest/modelo/EXIINDUSTRIAL.php';
include_once '../../assest/modelo/DRECEPCIONIND.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$EINDUSTRIAL_ADO =  new EINDUSTRIAL_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$FOLIO_ADO =  new FOLIO_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$TMANEJO_ADO =  new TMANEJO_ADO();
$RECEPCIONIND_ADO =  new RECEPCIONIND_ADO();

$DPEXPORTACION_ADO =  new DPEXPORTACION_ADO();
$DRECEPCIONIND_ADO =  new DRECEPCIONIND_ADO();
$EXIINDUSTRIAL_ADO =  new EXIINDUSTRIAL_ADO();
$EXIMATERIAPRIMA_ADO =  new EXIMATERIAPRIMA_ADO();

//INIICIALIZAR MODELO
$EXIINDUSTRIAL =  new EXIINDUSTRIAL();
$DRECEPCIONIND =  new DRECEPCIONIND();

//INICIALIZAR VARIABLES

$PROCESO = "";
$FOLIOINDUSTRIAL = "";
$NUMEROFOLIODINDUSTRIAL = "";
$FECHAEMBALADODINDUSTRIAL = "";
$CANTIDADENVASEDINDUSTRIAL = "";
$GASIFICADORECEPCION="";
$IDPROCESO = "";
$IDDPROCESOINDUSTRIAL = "";

$ESTANDAR = "";
$PVESPECIES = "";
$FOLIO = "";
$FOLIOALIAS = "";


$FOLIOBAS2 = "";
$FOLIOAUX = "";
$ULTIMOFOLIO = "";

$PRODUCTORDATOS = "";
$NOMBREVESPECIES = "";

$TOTALDESHIDRATACIONEXV = 0;
$TOTALNETOINDV = 0;
$TOTALDESHIDRATACIONEX = 0;
$TOTALNETOIND = 0;
$DIFERENCIAKILOSNETOEXPO = 0;

$PRODUCTOR = "";
$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";
$TMANEJO = "";

$DISABLED = "";
$DISABLEDSTYLE = "";

$DISABLED2 = "disabled";
$DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
$MENSAJEELIMINAR = "";

$IDOP = "";
$IDOP2 = "";
$OP = "";

$NODATOURL = "";
//INICIALIZAR ARREGLOS

$ARRAYVERFOLIO = "";
$ARRAYULTIMOFOLIO = "";
$ARRAYOBTENERNUMEROLINEA = "";

$ARRAYESTANDAR = "";
$ARRAYPVESPECIES;
$ARRAYVESPECIES;
$ARRAYPRODUCTOR = "";

$ARRAYDPROCESOINDUSTRIAL = "";
$ARRAYDPROCESOINDUSTRIAL2 = "";

$ARRAYVERFOLIOPOIND = "";

$ARRAYESTANDAR = $EINDUSTRIAL_ADO->listarEstandarRecepcionPorEmpresaCBX($EMPRESAS);
$ARRAYPRODUCTOR = $PRODUCTOR_ADO->listarProductorPorEmpresaCBX($EMPRESAS);
$ARRAYTMANEJO = $TMANEJO_ADO->listarTmanejoCBX();
$ARRAYFECHAACTUAL = $DRECEPCIONIND_ADO->obtenerFecha();
$FECHAEMBALADODINDUSTRIAL = $ARRAYFECHAACTUAL[0]['FECHA'];
include_once "../../assest/config/validarDatosUrlD.php";



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

if (isset($_GET["idd"])) {
    $idd_dato = $_GET["idd"];
}else{
    $idd_dato = "";
}

if (isset($_GET["ad"])) {
    $acciond_dato = $_GET["ad"];
}else{
    $acciond_dato = "";
}


//OPERACION PARA OBTENER EL ID RECEPCION Y FOLIO BASE, SOLO SE OCUPA PARA CREAR UN REGISTRO NUEVO
if (isset($id_dato) && isset($accion_dato) && isset($urlo_dato)) {
    $IDP = $id_dato;
    $OPP = $accion_dato;
    $URLO = $urlo_dato;

    $ARRAYRECEPCION = $RECEPCIONIND_ADO->verRecepcion($IDP);
    foreach ($ARRAYRECEPCION as $r) :
        $TRECEPCION = "" . $r['TRECEPCION'];
        $FECHARECEPCION = "" . $r['FECHA_RECEPCION'];
        if ($TRECEPCION == "1") {
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $ARRAYVERPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
            if ($ARRAYVERPRODUCTOR) {
                $PRODUCTORDATOS = $ARRAYVERPRODUCTOR[0]["CSG_PRODUCTOR"] . ": "  . $ARRAYVERPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
            }
        }
        if ($TRECEPCION == "2") {
            $PLANTA2 = "" . $r['ID_PLANTA2'];
        }
    endforeach;
}
//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION , VISUALIZACION Y CREACION
//OPERACION PARA OBTENER EL ID RECEPCION Y FOLIO BASE, SOLO SE OCUPA PARA CREAR UN REGISTRO NUEVO
if (isset($id_dato) && isset($accion_dato) && isset($urlo_dato) && isset($idd_dato) && isset($acciond_dato)) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $idd_dato;
    $OP = $acciond_dato;
    $IDP = $id_dato;
    $OPP = $accion_dato;
    $URLO = $urlo_dato;



    //crear =  OBTENCION DE DATOS PARA LA CREACCION DE REGISTRO
    if ($OP == "crear") {
        $DISABLED = "";
        $DISABLEDSTYLE = "";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDPROCESOINDUSTRIAL = $DRECEPCIONIND_ADO->verDrecepcion($IDOP);
        foreach ($ARRAYDPROCESOINDUSTRIAL as $r) :
            // $NUMEROFOLIODINDUSTRIAL = "" . $r['FOLIO_DRECEPCION'];
            $NUMEROFOLIODINDUSTRIAL = "" . $r['FOLIO_DRECEPCION'];
            $FECHAEMBALADODINDUSTRIAL = "" . $r['FECHA_EMBALADO_DRECEPCION'];
            /*
            $CANTIDADENVASEDRECEPCION = "" . $r['CANTIDAD_ENVASE_DRECEPCION'];
            $KILOSBRUTODRECEPCION = "" . $r['KILOS_BRUTO_DRECEPCION'];
            $KILOSNETODRECEPCION = "" . $r['KILOS_NETO_DRECEPCION'];
            $KILOSPROMEDIODRECEPCION = "" . $r['KILOS_PROMEDIO_DRECEPCION'];
            */
            $PESOPALLETRECEPCION = "" . $r['PESO_PALLET_DRECEPCION'];
            $GASIFICADORECEPCION = "" . $r['GASIFICADO_DRECEPCION'];
            $ESTANDAR = "" . $r['ID_ESTANDAR'];
            $ARRAYVERESTANDAR = $EINDUSTRIAL_ADO->verEstandar($ESTANDAR);
            if ($ARRAYVERESTANDAR) {
                $COBRO = $ARRAYVERESTANDAR[0]['COBRO'];
                $PESOENVASEESTANDAR = $ARRAYVERESTANDAR[0]['PESO_ENVASE_ESTANDAR'];
                $ARRAYVESPECIES = $VESPECIES_ADO->buscarVespeciesPorEspeciesPorEmpresaCBX($ARRAYVERESTANDAR[0]['ID_ESPECIES'],$EMPRESAS);
            }            
            $TMANEJO = "" . $r['ID_TMANEJO'];
            $ESTANDAR = "" . $r['ID_ESTANDAR'];
            $VESPECIES = "" . $r['ID_VESPECIES'];
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $ARRAYVERPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
            if ($ARRAYVERPRODUCTOR) {
                $PRODUCTORDATOS = $ARRAYVERPRODUCTOR[0]["CSG_PRODUCTOR"] .  ":" . $ARRAYVERPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
            }
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {
        $DISABLED = "";
        $DISABLEDSTYLE = "";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDPROCESOINDUSTRIAL = $DRECEPCIONIND_ADO->verDrecepcion($IDOP);
        foreach ($ARRAYDPROCESOINDUSTRIAL as $r) :
            $NUMEROFOLIODINDUSTRIAL = "" . $r['FOLIO_DRECEPCION'];
            $FECHAEMBALADODINDUSTRIAL = "" . $r['FECHA_EMBALADO_DRECEPCION'];
            $CANTIDADENVASEDRECEPCION = "" . $r['CANTIDAD_ENVASE_DRECEPCION'];
            $KILOSBRUTODRECEPCION = "" . $r['KILOS_BRUTO_DRECEPCION'];
            $KILOSNETODRECEPCION = "" . $r['KILOS_NETO_DRECEPCION'];
            $KILOSPROMEDIODRECEPCION = "" . $r['KILOS_PROMEDIO_DRECEPCION'];
            $PESOPALLETRECEPCION = "" . $r['PESO_PALLET_DRECEPCION'];
            $GASIFICADORECEPCION = "" . $r['GASIFICADO_DRECEPCION'];
            $ESTANDAR = "" . $r['ID_ESTANDAR'];
            $ARRAYVERESTANDAR = $EINDUSTRIAL_ADO->verEstandar($ESTANDAR);
            if ($ARRAYVERESTANDAR) {
                $COBRO = $ARRAYVERESTANDAR[0]['COBRO'];
                $PESOENVASEESTANDAR = $ARRAYVERESTANDAR[0]['PESO_ENVASE_ESTANDAR'];
                $ARRAYVESPECIES = $VESPECIES_ADO->buscarVespeciesPorEspeciesPorEmpresaCBX($ARRAYVERESTANDAR[0]['ID_ESPECIES'],$EMPRESAS);
            }            
            $TMANEJO = "" . $r['ID_TMANEJO'];
            $ESTANDAR = "" . $r['ID_ESTANDAR'];
            $VESPECIES = "" . $r['ID_VESPECIES'];
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $ARRAYVERPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
            if ($ARRAYVERPRODUCTOR) {
                $PRODUCTORDATOS = $ARRAYVERPRODUCTOR[0]["CSG_PRODUCTOR"] .  ":" . $ARRAYVERPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
            }
            $ESTADO = "" . $r['ESTADO'];

        endforeach;
    }
    if ($OP == "") {
        $ARRAYVESPECIES = $VESPECIES_ADO->buscarVespeciesPorEspeciesPorEmpresaCBX(25,$EMPRESAS);
    }

    //ver =  OBTENCION DE DATOS PARA LA VISUALIZACION DEL REGISTRO
    if ($OP == "ver") {

        $DISABLED = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDPROCESOINDUSTRIAL = $DRECEPCIONIND_ADO->verDrecepcion($IDOP);
        foreach ($ARRAYDPROCESOINDUSTRIAL as $r) :
            $NUMEROFOLIODINDUSTRIAL = "" . $r['FOLIO_DRECEPCION'];
            $FECHAEMBALADODINDUSTRIAL = "" . $r['FECHA_EMBALADO_DRECEPCION'];
            $CANTIDADENVASEDRECEPCION = "" . $r['CANTIDAD_ENVASE_DRECEPCION'];
            $KILOSBRUTODRECEPCION = "" . $r['KILOS_BRUTO_DRECEPCION'];
            $KILOSNETODRECEPCION = "" . $r['KILOS_NETO_DRECEPCION'];
            $KILOSPROMEDIODRECEPCION = "" . $r['KILOS_PROMEDIO_DRECEPCION'];
            $PESOPALLETRECEPCION = "" . $r['PESO_PALLET_DRECEPCION'];
            $GASIFICADORECEPCION = "" . $r['GASIFICADO_DRECEPCION'];
            $ESTANDAR = "" . $r['ID_ESTANDAR'];
            $ARRAYVERESTANDAR = $EINDUSTRIAL_ADO->verEstandar($ESTANDAR);
            if ($ARRAYVERESTANDAR) {
                $COBRO = $ARRAYVERESTANDAR[0]['COBRO'];
                $PESOENVASEESTANDAR = $ARRAYVERESTANDAR[0]['PESO_ENVASE_ESTANDAR'];
                $ARRAYVESPECIES = $VESPECIES_ADO->buscarVespeciesPorEspeciesPorEmpresaCBX($ARRAYVERESTANDAR[0]['ID_ESPECIES'],$EMPRESAS);
            }            $TMANEJO = "" . $r['ID_TMANEJO'];
            $ESTANDAR = "" . $r['ID_ESTANDAR'];
            $VESPECIES = "" . $r['ID_VESPECIES'];
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $ARRAYVERPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
            if ($ARRAYVERPRODUCTOR) {
                $PRODUCTORDATOS = $ARRAYVERPRODUCTOR[0]["CSG_PRODUCTOR"] .  ":" . $ARRAYVERPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
            }
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }
    //ver =  OBTENCION DE DATOS PARA LA VISUALIZACION DEL REGISTRO
    if ($OP == "eliminar") {

        $DISABLED = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDPROCESOINDUSTRIAL = $DRECEPCIONIND_ADO->verDrecepcion($IDOP);
        $MENSAJEELIMINAR = "ESTA SEGURO DE ELIMINAR EL REGISTRO, PARA CONFIRMAR PRESIONE ELIMINAR";
        foreach ($ARRAYDPROCESOINDUSTRIAL as $r) :
            $NUMEROFOLIODINDUSTRIAL = "" . $r['FOLIO_DRECEPCION'];
            $FECHAEMBALADODINDUSTRIAL = "" . $r['FECHA_EMBALADO_DRECEPCION'];
            $CANTIDADENVASEDRECEPCION = "" . $r['CANTIDAD_ENVASE_DRECEPCION'];
            $KILOSBRUTODRECEPCION = "" . $r['KILOS_BRUTO_DRECEPCION'];
            $KILOSNETODRECEPCION = "" . $r['KILOS_NETO_DRECEPCION'];
            $KILOSPROMEDIODRECEPCION = "" . $r['KILOS_PROMEDIO_DRECEPCION'];
            $PESOPALLETRECEPCION = "" . $r['PESO_PALLET_DRECEPCION'];
            $GASIFICADORECEPCION = "" . $r['GASIFICADO_DRECEPCION'];
            $ESTANDAR = "" . $r['ID_ESTANDAR'];
            $ARRAYVERESTANDAR = $EINDUSTRIAL_ADO->verEstandar($ESTANDAR);
            if ($ARRAYVERESTANDAR) {
                $COBRO = $ARRAYVERESTANDAR[0]['COBRO'];
                $PESOENVASEESTANDAR = $ARRAYVERESTANDAR[0]['PESO_ENVASE_ESTANDAR'];
                $ARRAYVESPECIES = $VESPECIES_ADO->buscarVespeciesPorEspeciesPorEmpresaCBX($ARRAYVERESTANDAR[0]['ID_ESPECIES'],$EMPRESAS);
            }            $TMANEJO = "" . $r['ID_TMANEJO'];
            $ESTANDAR = "" . $r['ID_ESTANDAR'];
            $VESPECIES = "" . $r['ID_VESPECIES'];
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $ARRAYVERPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
            if ($ARRAYVERPRODUCTOR) {
                $PRODUCTORDATOS = $ARRAYVERPRODUCTOR[0]["CSG_PRODUCTOR"] .  ":" . $ARRAYVERPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
            }
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }
}
if ($_POST) {

    if (isset($_REQUEST['FECHAEMBALADODINDUSTRIAL'])) {
        $FECHAEMBALADODINDUSTRIAL = $_REQUEST['FECHAEMBALADODINDUSTRIAL'];
    }
    if (isset($_REQUEST['PRODUCTOR'])) {
        $PRODUCTOR = $_REQUEST['PRODUCTOR'];
    }
    if (isset($_REQUEST['GASIFICADORECEPCION'])) {
        $GASIFICADORECEPCION = $_REQUEST['GASIFICADORECEPCION'];
    }
    if (isset($_REQUEST['VESPECIES'])) {
        $VESPECIES = $_REQUEST['VESPECIES'];
    }
    //
    if (isset($_REQUEST['ESTANDAR'])) {
        $ARRAYVESPECIES = $VESPECIES_ADO->buscarVespeciesPorEspeciesPorEmpresaCBX(25,151);
        $ESTANDAR = $_REQUEST['ESTANDAR'];
        $ARRAYVERESTANDAR = $EINDUSTRIAL_ADO->verEstandar($ESTANDAR);
        if ($ARRAYVERESTANDAR) {
            $COBRO = $ARRAYVERESTANDAR[0]['COBRO'];
            $PESOENVASEESTANDAR = $ARRAYVERESTANDAR[0]['PESO_ENVASE_ESTANDAR'];
            //registro que se cambio MS
            $ARRAYVESPECIES = $VESPECIES_ADO->buscarVespeciesPorEspeciesPorEmpresaCBX($ARRAYVERESTANDAR[0]['ID_ESPECIES'],$EMPRESAS);
            if ($_REQUEST['PESOPALLETRECEPCION']) {
                $PESOPALLETRECEPCION = $_REQUEST['PESOPALLETRECEPCION'];
            } else {
                if ($ARRAYVERESTANDAR) {
                    $PESOPALLETRECEPCION = $ARRAYVERESTANDAR[0]['PESO_PALLET_ESTANDAR'];
                } else {
                    $PESOPALLETRECEPCION = "";
                }
            } 
            if ($_REQUEST['KILOSBRUTODRECEPCION'] > 0 && $_REQUEST['CANTIDADENVASEDRECEPCION'] > 0) {
                $PESOENVASE = $PESOENVASEESTANDAR * $_REQUEST['CANTIDADENVASEDRECEPCION'];
                $KILOSNETODRECEPCION = $_REQUEST['KILOSBRUTODRECEPCION'] - $PESOENVASE - $PESOPALLETRECEPCION;
            }
        }
    }  
    if (isset($_REQUEST['TMANEJO'])) {
        $TMANEJO = $_REQUEST['TMANEJO'];
    }
    if (isset($_REQUEST['CANTIDADENVASEDRECEPCION'])) {
        $CANTIDADENVASEDRECEPCION = $_REQUEST['CANTIDADENVASEDRECEPCION'];
    }
    if (isset($_REQUEST['KILOSBRUTODRECEPCION'])) {
        $KILOSBRUTODRECEPCION = $_REQUEST['KILOSBRUTODRECEPCION'];
    }
    
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Detalle Recepcion</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../../assest/config/urlHead.php"; ?>
        <!- FUNCIONES BASES -!>
        <script type="text/javascript">

                function neto() {
                    var repuesta;
                    var pesoenvase = 0;
                    var pesoneto = 0;

                    ESTANDAR = document.getElementById("ESTANDAR").selectedIndex;
                    CANTIDADENVASEDRECEPCION = document.getElementById("CANTIDADENVASEDRECEPCION").value;
                    KILOSBRUTODRECEPCION = document.getElementById("KILOSBRUTODRECEPCION").value;


                    document.getElementById('val_estandar').innerHTML = "";
                    document.getElementById('val_cantidadenvase').innerHTML = "";
                    document.getElementById('val_kilosbruto').innerHTML = "";

                    if (ESTANDAR == null || ESTANDAR == 0) {
                        document.form_reg_dato.ESTANDAR.focus();
                        document.form_reg_dato.ESTANDAR.style.borderColor = "#FF0000";
                        document.getElementById('val_estandar').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        repuesta = 1;
                    } else {
                        document.form_reg_dato.ESTANDAR.style.borderColor = "#4AF575";
                        repuesta = 0;
                    }

                    if (CANTIDADENVASEDRECEPCION == null || CANTIDADENVASEDRECEPCION == 0) {
                        document.form_reg_dato.CANTIDADENVASEDRECEPCION.focus();
                        document.form_reg_dato.CANTIDADENVASEDRECEPCION.style.borderColor = "#FF0000";
                        document.getElementById('val_cantidadenvase').innerHTML = "NO HA INGRESADO DATOS";
                        repuesta = 1;
                    } else {
                        document.form_reg_dato.CANTIDADENVASEDRECEPCION.style.borderColor = "#4AF575";
                        repuesta = 0;
                    }
                    
                    if (KILOSBRUTODRECEPCION == null || KILOSBRUTODRECEPCION == 0) {
                        document.form_reg_dato.KILOSBRUTODRECEPCION.focus();
                        document.form_reg_dato.KILOSBRUTODRECEPCION.style.borderColor = "#FF0000";
                        document.getElementById('val_kilosbruto').innerHTML = "NO HA INGRESADO DATOS";
                        repuesta = 1;
                    } else {
                        document.form_reg_dato.KILOSBRUTODRECEPCION.style.borderColor = "#4AF575";
                        repuesta = 0;
                    }

                    if (repuesta == 0) {
                        PESOENVASEESTANDAR = parseFloat(document.getElementById("PESOENVASEESTANDAR").value);
                        CANTIDADENVASEDRECEPCION = parseInt(document.getElementById("CANTIDADENVASEDRECEPCION").value);
                        PESOPALLETRECEPCION = parseFloat(document.getElementById("PESOPALLETRECEPCION").value);
                        KILOSBRUTODRECEPCION = parseFloat(document.getElementById("KILOSBRUTODRECEPCION").value);

                        pesoenvase = PESOENVASEESTANDAR * CANTIDADENVASEDRECEPCION;
                        pesoneto = KILOSBRUTODRECEPCION - PESOPALLETRECEPCION - pesoenvase;
                        pesoneto = pesoneto.toFixed(2);
                    }
                    //document.getElementById('val_kilosneto').innerHTML = pesoneto;
                    document.getElementById('KILOSNETODRECEPCIONV').value = pesoneto;
                }

         
                function validacion() {

                    FECHAEMBALADODINDUSTRIAL = document.getElementById("FECHAEMBALADODINDUSTRIAL").value;                   
                    TRECEPCION = document.getElementById("TRECEPCION").value;
                    ESTANDAR = document.getElementById("ESTANDAR").selectedIndex;
                    GASIFICADORECEPCION = document.getElementById("GASIFICADORECEPCION").selectedIndex;
                    VESPECIES = document.getElementById("VESPECIES").selectedIndex;
                    TMANEJO = document.getElementById("TMANEJO").selectedIndex;
                    PESOPALLETRECEPCION = document.getElementById("PESOPALLETRECEPCION").value;
                    CANTIDADENVASEDRECEPCION = document.getElementById("CANTIDADENVASEDRECEPCION").value;
                    KILOSBRUTODRECEPCION = document.getElementById("KILOSBRUTODRECEPCION").value;
                    //NOTADRECEPCION = document.getElementById("NOTADRECEPCION").value;

                    document.getElementById('val_fechaembalado').innerHTML = "";                  
                    document.getElementById('val_estandar').innerHTML = "";
                    document.getElementById('val_gasificacion').innerHTML = "";
                    document.getElementById('val_vespecies').innerHTML = "";
                    document.getElementById('val_tmanejo').innerHTML = "";
                    document.getElementById('val_pesopallet').innerHTML = "";
                    document.getElementById('val_cantidadenvase').innerHTML = "";
                    document.getElementById('val_kilosbruto').innerHTML = "";
                    //document.getElementById('val_nota').innerHTML = "";

                 
                    if (FECHAEMBALADODINDUSTRIAL == null || FECHAEMBALADODINDUSTRIAL.length == 0 || /^\s+$/.test(FECHAEMBALADODINDUSTRIAL)) {
                        document.form_reg_dato.FECHAEMBALADODINDUSTRIAL.focus();
                        document.form_reg_dato.FECHAEMBALADODINDUSTRIAL.style.borderColor = "#FF0000";
                        document.getElementById('val_fechaembalado').innerHTML = "NO HA INGRESADO DATOS";
                        return false;
                    }
                    document.form_reg_dato.FECHAEMBALADODINDUSTRIAL.style.borderColor = "#4AF575";

                 
                    if (TRECEPCION == 2) {
                        PRODUCTOR = document.getElementById("PRODUCTOR").selectedIndex;
                        document.getElementById('val_productor').innerHTML = "";

                        if (PRODUCTOR == null || PRODUCTOR == 0) {
                            document.form_reg_dato.PRODUCTOR.focus();
                            document.form_reg_dato.PRODUCTOR.style.borderColor = "#FF0000";
                            document.getElementById('val_productor').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                            return false;
                        }
                        document.form_reg_dato.PRODUCTOR.style.borderColor = "#4AF575";

                    }
                    if (ESTANDAR == null || ESTANDAR == 0) {
                        document.form_reg_dato.ESTANDAR.focus();
                        document.form_reg_dato.ESTANDAR.style.borderColor = "#FF0000";
                        document.getElementById('val_estandar').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.ESTANDAR.style.borderColor = "#4AF575";

                    if (GASIFICADORECEPCION == null || GASIFICADORECEPCION == 0) {
                        document.form_reg_dato.GASIFICADORECEPCION.focus();
                        document.form_reg_dato.GASIFICADORECEPCION.style.borderColor = "#FF0000";
                        document.getElementById('val_gasificacion').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.GASIFICADORECEPCION.style.borderColor = "#4AF575";
   
                    if (VESPECIES == null || VESPECIES == 0) {
                        document.form_reg_dato.VESPECIES.focus();
                        document.form_reg_dato.VESPECIES.style.borderColor = "#FF0000";
                        document.getElementById('val_vespecies').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.VESPECIES.style.borderColor = "#4AF575";

                    if (TMANEJO == null || TMANEJO == 0) {
                        document.form_reg_dato.TMANEJO.focus();
                        document.form_reg_dato.TMANEJO.style.borderColor = "#FF0000";
                        document.getElementById('val_tmanejo').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.TMANEJO.style.borderColor = "#4AF575";

                    if (PESOPALLETRECEPCION == null || PESOPALLETRECEPCION == 0) {
                        document.form_reg_dato.PESOPALLETRECEPCION.focus();
                        document.form_reg_dato.PESOPALLETRECEPCION.style.borderColor = "#FF0000";
                        document.getElementById('val_pesopallet').innerHTML = "NO HA INGRESADO DATOS";
                        return false;
                    }
                    document.form_reg_dato.PESOPALLETRECEPCION.style.borderColor = "#4AF575";

                    if (CANTIDADENVASEDRECEPCION == null || CANTIDADENVASEDRECEPCION == 0) {
                        document.form_reg_dato.CANTIDADENVASEDRECEPCION.focus();
                        document.form_reg_dato.CANTIDADENVASEDRECEPCION.style.borderColor = "#FF0000";
                        document.getElementById('val_cantidadenvase').innerHTML = "NO HA INGRESADO DATOS";
                        return false;
                    }
                    document.form_reg_dato.CANTIDADENVASEDRECEPCION.style.borderColor = "#4AF575";

                    if (KILOSBRUTODRECEPCION == null || KILOSBRUTODRECEPCION == 0) {
                        document.form_reg_dato.KILOSBRUTODRECEPCION.focus();
                        document.form_reg_dato.KILOSBRUTODRECEPCION.style.borderColor = "#FF0000";
                        document.getElementById('val_kilosbruto').innerHTML = "NO HA INGRESADO DATOS";
                        return false;
                    }
                    document.form_reg_dato.KILOSBRUTODRECEPCION.style.borderColor = "#4AF575";      



                    /*
                        if (NOTADRECEPCION == null || NOTA.length == 0 || /^\s+$/.test(NOTADRECEPCION)) {
                            document.form_reg_dato.NOTADRECEPCION.focus();
                            document.form_reg_dato.NOTADRECEPCION.style.borderColor = "#FF0000";
                            document.getElementById('val_nota').innerHTML = "NO HA INGRESADO DATOS";
                            return false;
                        }
                        document.form_reg_dato.NOTADRECEPCION.style.borderColor = "#4AF575";
                    */
                }



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
                                <h3 class="page-title">Granel</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Modulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Granel</li>
                                            <li class="breadcrumb-item" aria-current="page">Recepción</li>
                                            <li class="breadcrumb-item" aria-current="page">Industrial</li>
                                            <li class="breadcrumb-item" aria-current="page">Recepción Industrial</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#">Registro Detalle </a>  </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <?php include_once "../../assest/config/verIndicadorEconomico.php"; ?>
                        </div>
                    </div>
                    <section class="content">
                        <form class="form" role="form" method="post" name="form_reg_dato">
                            <div class="box">
                                <div class="box-header with-border bg-success">                                   
                                    <h4 class="box-title">Registro Detalle</h4>                                        
                                </div>
                                <div class="box-body ">
                                    <div class="row">
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6  ">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" placeholder="ID DRECEPCION" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID RECEPCION" id="IDP" name="IDP" value="<?php echo $IDP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID RECEPCION" id="OPP" name="OPP" value="<?php echo $OPP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID RECEPCION" id="URLO" name="URLO" value="<?php echo $URLO; ?>" />

                                                <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTA" name="PLANTA" value="<?php echo $PLANTAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADAS; ?>" />
                                                <label>Folio</label>
                                                <input type="hidden" class="form-control" placeholder="NUMEROFOLIODINDUSTRIALE" id="NUMEROFOLIODINDUSTRIALE" name="NUMEROFOLIODINDUSTRIALE" value="<?php echo $NUMEROFOLIODINDUSTRIAL; ?>" />
                                                <input type="text" class="form-control" id="NUMEROFOLIODINDUSTRIALV" name="NUMEROFOLIODINDUSTRIALV" value="<?php echo $NUMEROFOLIODINDUSTRIAL; ?>" disabled style="background-color: #eeeeee;" />
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <label>Fecha Embalado </label>
                                                <input type="date" class="form-control" placeholder="Fecha Embalado" id="FECHAEMBALADODINDUSTRIAL" name="FECHAEMBALADODINDUSTRIAL" value="<?php echo $FECHAEMBALADODINDUSTRIAL; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLEDSTYLE; ?> />
                                                <label id="val_fechaembalado" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" placeholder="TRECEPCION" id="TRECEPCION" name="TRECEPCION" value="<?php echo $TRECEPCION; ?>" />
                                                <input type="hidden" class="form-control" placeholder="FOLIO" id="FOLIO" name="FOLIO" value="<?php echo $FOLIO; ?>" />
                                                <input type="hidden" class="form-control" placeholder="FECHARECEPCION" id="FECHARECEPCION" name="FECHARECEPCION" value="<?php echo $FECHARECEPCION; ?>" />
                                                <label>Productor </label>
                                                <?php if ($TRECEPCION == 1) { ?>
                                                    <input type="hidden" class="form-control" placeholder="PRODUCTOR" id="PRODUCTOR" name="PRODUCTOR" value="<?php echo $PRODUCTOR; ?>" />
                                                    <input type="text" class="form-control" placeholder="Productor" id="PRODUCTORV" name="PRODUCTORV" value="<?php echo $PRODUCTORDATOS; ?>" disabled style='background-color: #eeeeee;'/>
                                                 <?php } ?>
                                                <?php if ($TRECEPCION == 2) { ?>
                                                    <select class=" form-control select2" id="PRODUCTOR" name="PRODUCTOR" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLEDSTYLE; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYPRODUCTOR as $r) : ?>
                                                        <?php if ($ARRAYPRODUCTOR) {    ?>
                                                            <option value="<?php echo $r['ID_PRODUCTOR']; ?>" <?php if ($PRODUCTOR == $r['ID_PRODUCTOR']) {  echo "selected";   } ?>>
                                                                <?php echo $r['CSG_PRODUCTOR'] ?> : <?php echo $r['NOMBRE_PRODUCTOR'] ?>
                                                            </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                    </select>
                                                <?php } ?>
                                                <label id="val_productor" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <label>Estandar </label>
                                                <input type="hidden" class="form-control" placeholder="COBRO" id="COBRO" name="COBRO" value="<?php echo $COBRO; ?>" />
                                                <input type="hidden" class="form-control" placeholder="PESOENVASEESTANDAR" id="PESOENVASEESTANDAR" name="PESOENVASEESTANDAR" value="<?php echo $PESOENVASEESTANDAR; ?>" />
                                                <select class="form-control select2" id="ESTANDAR" name="ESTANDAR" style="width: 100%;" onchange="this.form.submit();" <?php echo $DISABLED; ?> <?php echo $DISABLEDSTYLE; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYESTANDAR as $r) : ?>
                                                        <?php if ($ARRAYESTANDAR) {    ?>
                                                            <option value="<?php echo $r['ID_ESTANDAR']; ?>" <?php if ($ESTANDAR == $r['ID_ESTANDAR']) {  echo "selected";  } ?>>
                                                                <?php echo $r['CODIGO_ESTANDAR'] ?> : <?php echo $r['NOMBRE_ESTANDAR'] ?>
                                                            </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados</option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_estandar" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <label>Gasificacion</label>
                                                <select class="form-control select2" id="GASIFICADORECEPCION" name="GASIFICADORECEPCION" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                    <option></option>
                                                    <option value="0" <?php if ($GASIFICADORECEPCION == "0") { echo "selected"; } ?>>No</option>
                                                    <option value="1" <?php if ($GASIFICADORECEPCION == "1") { echo "selected";  } ?>> Si </option>
                                                </select>
                                                <label id="val_gasificacion" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <label>Variedad</label><br>
                                                <select class="form-control select2" id="VESPECIES" name="VESPECIES" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYVESPECIES as $r2) : ?>
                                                        <?php if ($ARRAYVESPECIES) {    
                                                            $nom_var45=$r2['NOMBRE_VESPECIES'];
                                                           // $nom_var45=substr($nom_var45, 0,10);
                                                        ?>
                                                            <option value="<?php echo $r2['ID_VESPECIES']; ?>" <?php if ($VESPECIES == $r2['ID_VESPECIES']) {  echo "selected";  } ?> >
                                                               <?php   echo  $nom_var45;  ?>
                                                            </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados</option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_vespecies" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <label>Tipo Manejo</label><br>
                                                <select class="form-control select2" id="TMANEJO" name="TMANEJO" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYTMANEJO as $r) : ?>
                                                        <?php if ($ARRAYTMANEJO) {    ?>
                                                            <option value="<?php echo $r['ID_TMANEJO']; ?>" <?php if ($TMANEJO == $r['ID_TMANEJO']) {  echo "selected";  } ?>> 
                                                                <?php  echo $r['NOMBRE_TMANEJO'];  ?>
                                                            </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados</option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_tmanejo" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <label>Peso Pallet</label>
                                                <input type="number" step="0.01" class="form-control" placeholder="Peso Pallet" id="PESOPALLETRECEPCION" name="PESOPALLETRECEPCION" onchange="neto()" value="<?php echo $PESOPALLETRECEPCION; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLEDSTYLE; ?> />
                                                <label id="val_pesopallet" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <label>Cantidad Envase</label>
                                                <input type="number" class="form-control" placeholder="Cantidad Envase" id="CANTIDADENVASEDRECEPCION" name="CANTIDADENVASEDRECEPCION" onchange="neto()" value="<?php echo $CANTIDADENVASEDRECEPCION; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLEDSTYLE; ?> />
                                                <label id="val_cantidadenvase" class="validacion"> </label>

                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <label>Kilo Bruto</label>
                                                <input type="number" step="0.01" class="form-control" placeholder="Kilo Bruto" id="KILOSBRUTODRECEPCION" name="KILOSBRUTODRECEPCION" onchange="neto()" value="<?php echo $KILOSBRUTODRECEPCION; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLEDSTYLE; ?> />
                                                <label id="val_kilosbruto" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <label>Kilo Neto</label>
                                                <input type="hidden" class="form-control" placeholder="KILOSPROMEDIODRECEPCION" id="KILOSPROMEDIODRECEPCION" name="KILOSPROMEDIODRECEPCION" value="<?php echo $KILOSPROMEDIODRECEPCION; ?>" />
                                                <input type="hidden" class="form-control" placeholder="KILOSNETODRECEPCION" id="KILOSNETODRECEPCION" name="KILOSNETODRECEPCION" value="<?php echo $KILOSNETODRECEPCION; ?>" />
                                                <input type="number" step="0.00" class="form-control" placeholder="Kilo Neto" id="KILOSNETODRECEPCIONV" name="KILOSNETODRECEPCIONV" value="<?php echo $KILOSNETODRECEPCION; ?>" disabled style='background-color: #eeeeee;' />
                                                <label id=" val_kilosneto" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <label id=" val_mensaje" class="validacion"><?php echo $MENSAJEELIMINAR; ?> </label>
                                    <!-- /.row -->
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="btn-group btn-block  col-xxl-4 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12 " role="group" aria-label="Acciones generales">
                                        <button type="button" class="btn btn-success  " data-toggle="tooltip" title="Volver" name="CANCELAR" value="CANCELAR" Onclick="irPagina('<?php echo $URLO; ?>.php?op&id=<?php echo $id_dato; ?>&a=<?php echo $accion_dato; ?>&urlo=<?php echo $urlo_dato; ?>');">
                                            <i class="ti-back-left "></i> Volver
                                        </button>
                                        <?php if ($OP == "") { ?>
                                            <button type="submit" class="btn btn-primary " data-toggle="tooltip" title="Guardar" name="CREAR" value="CREAR" <?php echo $DISABLED; ?> onclick="return validacion()">
                                                <i class="ti-save-alt"></i> Guardar
                                            </button>
                                        <?php } ?>
                                        <?php if ($OP != "") { ?>
                                            <?php if ($OP == "crear") { ?>
                                                <button type="submit" class="btn btn-primary " data-toggle="tooltip" title="Guardar" name="CREAR" value="CREAR" <?php echo $DISABLED; ?> onclick="return validacion()">
                                                    <i class="ti-save-alt"></i> Guardar
                                                </button>
                                            <?php } ?>
                                            <?php if ($OP == "editar") { ?>
                                                <button type="submit" class="btn btn-warning   " data-toggle="tooltip" title="Guardar" name="EDITAR" value="EDITAR" <?php echo $DISABLED; ?> onclick="return validacion()">
                                                    <i class="ti-save-alt"></i> Guardar
                                                </button>
                                            <?php } ?>
                                            <?php if ($OP == "eliminar") { ?>
                                                <button type="submit" class="btn btn-danger " data-toggle="tooltip" title="Eliminar" name="ELIMINAR" value="ELIMINAR">
                                                    <i class="ti-trash"></i> Eliminar
                                                </button>
                                            <?php } ?>
                                        <?php } ?>
                                    </div>
                                </div>

                            </div>
                        </form>
                        <!--.row -->
                    </section>
                </div>
            </div>
            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php include_once "../../assest/config/footer.php"; ?>
                <?php include_once "../../assest/config/menuExtraFruta.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../../assest/config/urlBase.php"; ?>
        <?php 
            if (isset($_REQUEST['CREAR'])){
                //OPERACION DE REGISTRO DE FILA
                //OBTENER EL FOLIO DEL DETALLE DE EXPORTACION DEL PROCESO
                    $ARRAYVERFOLIO = $FOLIO_ADO->verFolioPorEmpresaPlantaTemporadaTindustrial($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
                    $FOLIO = $ARRAYVERFOLIO[0]['ID_FOLIO'];
                    $ARRAYULTIMOFOLIO = $EXIINDUSTRIAL_ADO->obtenerFolio($FOLIO,$_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
                    if ($ARRAYULTIMOFOLIO) {
                        if ($ARRAYULTIMOFOLIO[0]['ULTIMOFOLIO'] == 0) {
                            $FOLIOINDUSTRIAL = $ARRAYVERFOLIO[0]['NUMERO_FOLIO'];
                        } else {
                            $FOLIOINDUSTRIAL = $ARRAYULTIMOFOLIO[0]['ULTIMOFOLIO'];
                        }
                    } else {
                        $FOLIOINDUSTRIAL = $ARRAYVERFOLIO[0]['NUMERO_FOLIO'];
                    }
                    $NUMEROFOLIODINDUSTRIAL = $FOLIOINDUSTRIAL + 1;

                    $KILOSBRUTODRECEPCION = $_REQUEST['KILOSBRUTODRECEPCION'];
                    //CONSULTA PARA LA OBTENCION DE LOS PARAMETROS DEL ESTANDAR DE EXPORTACION
                    $ARRAYVERESTANDAR = $EINDUSTRIAL_ADO->verEstandar($_REQUEST['ESTANDAR']);
                    //OBTENCIONS DE LOS DATOS, OBTENIDOS EN LA CONSULTA
                    if ($KILOSBRUTODRECEPCION > 0 && $_REQUEST['CANTIDADENVASEDRECEPCION'] > 0) {
                        if ($ARRAYVERESTANDAR) {
                            $PESOENVASEESTANDAR = $ARRAYVERESTANDAR[0]['PESO_ENVASE_ESTANDAR'];
                            if ($_REQUEST['PESOPALLETRECEPCION']) {
                                $PESOPALLETEESTANDAR = $_REQUEST['PESOPALLETRECEPCION'];
                            } else {
                                $PESOPALLETEESTANDAR = $ARRAYVERESTANDAR[0]['PESO_PALLET_ESTANDAR'];
                            }
        
                            $PESOENVASE = $PESOENVASEESTANDAR * $_REQUEST['CANTIDADENVASEDRECEPCION'];
        
                            //OPERACIONES DE OBTENER NETO Y PROMEDIO  DEL DETALLE
                            $KILOSNETODRECEPCION = $KILOSBRUTODRECEPCION - $PESOENVASE - $PESOPALLETEESTANDAR;
                            $KILOSPROMEDIODRECEPCION = $KILOSNETODRECEPCION / $_REQUEST['CANTIDADENVASEDRECEPCION'];
                        }
                    }

                    $FOLIOALIASESTACTICO = $NUMEROFOLIODINDUSTRIAL;
                    $FOLIOALIASDIANAMICO = "EMPRESA:" . $_REQUEST['EMPRESA'] . "_PLANTA:" . $_REQUEST['PLANTA'] . "_TEMPORADA:" . $_REQUEST['TEMPORADA'] . "_TIPO_FOLIO:PRODUCTO INDUSTRIAL_PROCESO:" . $_REQUEST['IDP'] . "_FOLIO:" . $NUMEROFOLIODINDUSTRIAL;




                    $DRECEPCIONIND->__SET('FOLIO_DRECEPCION', $NUMEROFOLIODINDUSTRIAL);
                    $DRECEPCIONIND->__SET('FECHA_EMBALADO_DRECEPCION', $_REQUEST['FECHAEMBALADODINDUSTRIAL']);
                    $DRECEPCIONIND->__SET('CANTIDAD_ENVASE_DRECEPCION', $_REQUEST['CANTIDADENVASEDRECEPCION']);
                    $DRECEPCIONIND->__SET('KILOS_NETO_DRECEPCION', $KILOSNETODRECEPCION);
                    $DRECEPCIONIND->__SET('KILOS_BRUTO_DRECEPCION', $_REQUEST['KILOSBRUTODRECEPCION']);
                    $DRECEPCIONIND->__SET('KILOS_PROMEDIO_DRECEPCION', $KILOSPROMEDIODRECEPCION);
                    $DRECEPCIONIND->__SET('PESO_PALLET_DRECEPCION', $_REQUEST['PESOPALLETRECEPCION']);
                    $DRECEPCIONIND->__SET('GASIFICADO_DRECEPCION', $_REQUEST['GASIFICADORECEPCION']);
                    $DRECEPCIONIND->__SET('ID_TMANEJO', $_REQUEST['TMANEJO']);
                    $DRECEPCIONIND->__SET('ID_FOLIO', $FOLIO);      
                    $DRECEPCIONIND->__SET('ID_ESTANDAR', $_REQUEST['ESTANDAR']);
                    $DRECEPCIONIND->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
                    $DRECEPCIONIND->__SET('ID_VESPECIES',  $_REQUEST['VESPECIES']);
                    $DRECEPCIONIND->__SET('ID_RECEPCION', $_REQUEST['IDP']);
                    $DRECEPCIONIND_ADO->agregarDrecepcion($DRECEPCIONIND);

                    $AUSUARIO_ADO->agregarAusuario2("NULL",1, 1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Detalle de recepcion Producto Industrial","fruta_drecepcionind","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],$_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );

                    //UTILIZACION METODOS SET DEL MODELO
                    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO
                    $EXIINDUSTRIAL->__SET('FOLIO_EXIINDUSTRIAL', $NUMEROFOLIODINDUSTRIAL);
                    $EXIINDUSTRIAL->__SET('FOLIO_AUXILIAR_EXIINDUSTRIAL', $NUMEROFOLIODINDUSTRIAL);
                    $EXIINDUSTRIAL->__SET('FECHA_EMBALADO_EXIINDUSTRIAL',  $_REQUEST['FECHAEMBALADODINDUSTRIAL']);
                    $EXIINDUSTRIAL->__SET('CANTIDAD_ENVASE_EXIINDUSTRIAL', $_REQUEST['CANTIDADENVASEDRECEPCION']);
                    $EXIINDUSTRIAL->__SET('KILOS_NETO_EXIINDUSTRIAL', $KILOSNETODRECEPCION);
                    $EXIINDUSTRIAL->__SET('KILOS_BRUTO_EXIINDUSTRIAL', $_REQUEST['KILOSBRUTODRECEPCION']);
                    $EXIINDUSTRIAL->__SET('KILOS_PROMEDIO_EXIINDUSTRIAL', $KILOSPROMEDIODRECEPCION);
                    $EXIINDUSTRIAL->__SET('PESO_PALLET_EXIINDUSTRIAL', $_REQUEST['PESOPALLETRECEPCION']);                    
                    $EXIINDUSTRIAL->__SET('GASIFICADO', $_REQUEST['GASIFICADORECEPCION']);
                    $EXIINDUSTRIAL->__SET('ALIAS_DINAMICO_FOLIO_EXIINDUSTRIAL', $FOLIOALIASESTACTICO);
                    $EXIINDUSTRIAL->__SET('ALIAS_ESTATICO_FOLIO_EXIINDUSTRIAL', $FOLIOALIASDIANAMICO);
                    $EXIINDUSTRIAL->__SET('FECHA_RECEPCION', $_REQUEST['FECHARECEPCION']);
                    $EXIINDUSTRIAL->__SET('ID_TMANEJO', $_REQUEST['TMANEJO']);
                    $EXIINDUSTRIAL->__SET('ID_FOLIO', $FOLIO);
                    $EXIINDUSTRIAL->__SET('ID_ESTANDAR', $_REQUEST['ESTANDAR']);
                    $EXIINDUSTRIAL->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
                    $EXIINDUSTRIAL->__SET('ID_VESPECIES', $_REQUEST['VESPECIES']);
                    $EXIINDUSTRIAL->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                    $EXIINDUSTRIAL->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
                    $EXIINDUSTRIAL->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
                    $EXIINDUSTRIAL->__SET('ID_RECEPCION', $_REQUEST['IDP']);
                    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                    $EXIINDUSTRIAL_ADO->agregarExiindustrialRecepcion($EXIINDUSTRIAL);

                    $AUSUARIO_ADO->agregarAusuario2("NULL",1, 1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Existencia de Producto Industrial","fruta_exiindustrial","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],$_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );
                    
                    //REDIRECCIONAR A PAGINA registroProceso.php
                    $id_dato =  $_REQUEST['IDP'];
                    $accion_dato =  $_REQUEST['OPP'];
                    echo '<script>
                            Swal.fire({
                                icon:"success",
                                title:"Registro creado",
                                text:"El registro de detalle de recepción se ha creado correctamente",
                                showConfirmButton:true,
                                confirmButtonText:"Volver a recepcion"
                            }).then((result)=>{
                                if(result.value){
                                    location.href ="' . $_REQUEST['URLO'] . '.php?op&id='.$id_dato.'&a='.$accion_dato.'";
                                }
                            })
                        </script>';
                    // echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLO'] . ".php?op';</script>";
            
            }                
            if (isset($_REQUEST['EDITAR'])) {
                $KILOSBRUTODRECEPCION = $_REQUEST['KILOSBRUTODRECEPCION'];
                //CONSULTA PARA LA OBTENCION DE LOS PARAMETROS DEL ESTANDAR DE EXPORTACION
                $ARRAYVERESTANDAR = $EINDUSTRIAL_ADO->verEstandar($_REQUEST['ESTANDAR']);
                //OBTENCIONS DE LOS DATOS, OBTENIDOS EN LA CONSULTA
                if ($KILOSBRUTODRECEPCION > 0 && $_REQUEST['CANTIDADENVASEDRECEPCION'] > 0) {
                    if ($ARRAYVERESTANDAR) {
                        $PESOENVASEESTANDAR = $ARRAYVERESTANDAR[0]['PESO_ENVASE_ESTANDAR'];
                        if ($_REQUEST['PESOPALLETRECEPCION']) {
                            $PESOPALLETEESTANDAR = $_REQUEST['PESOPALLETRECEPCION'];
                        } else {
                            $PESOPALLETEESTANDAR = $ARRAYVERESTANDAR[0]['PESO_PALLET_ESTANDAR'];
                        }
    
                        $PESOENVASE = $PESOENVASEESTANDAR * $_REQUEST['CANTIDADENVASEDRECEPCION'];
    
                        //OPERACIONES DE OBTENER NETO Y PROMEDIO  DEL DETALLE
                        $KILOSNETODRECEPCION = $KILOSBRUTODRECEPCION - $PESOENVASE - $PESOPALLETEESTANDAR;
                        $KILOSPROMEDIODRECEPCION = $KILOSNETODRECEPCION / $_REQUEST['CANTIDADENVASEDRECEPCION'];
                    }
                }
                $DRECEPCIONIND->__SET('FECHA_EMBALADO_DRECEPCION', $_REQUEST['FECHAEMBALADODINDUSTRIAL']);
                $DRECEPCIONIND->__SET('CANTIDAD_ENVASE_DRECEPCION', $_REQUEST['CANTIDADENVASEDRECEPCION']);
                $DRECEPCIONIND->__SET('KILOS_NETO_DRECEPCION', $KILOSNETODRECEPCION);
                $DRECEPCIONIND->__SET('KILOS_BRUTO_DRECEPCION', $_REQUEST['KILOSBRUTODRECEPCION']);
                $DRECEPCIONIND->__SET('KILOS_PROMEDIO_DRECEPCION', $KILOSPROMEDIODRECEPCION);
                $DRECEPCIONIND->__SET('PESO_PALLET_DRECEPCION', $_REQUEST['PESOPALLETRECEPCION']);
                $DRECEPCIONIND->__SET('GASIFICADO_DRECEPCION', $_REQUEST['GASIFICADORECEPCION']);
                $DRECEPCIONIND->__SET('ID_TMANEJO', $_REQUEST['TMANEJO']);
                $DRECEPCIONIND->__SET('ID_ESTANDAR', $_REQUEST['ESTANDAR']);
                $DRECEPCIONIND->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
                $DRECEPCIONIND->__SET('ID_VESPECIES',  $_REQUEST['VESPECIES']);
                $DRECEPCIONIND->__SET('ID_RECEPCION', $_REQUEST['IDP']);
                $DRECEPCIONIND->__SET('ID_DRECEPCION', $_REQUEST['ID']);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $DRECEPCIONIND_ADO->actualizarDrecepcion($DRECEPCIONIND);

                $AUSUARIO_ADO->agregarAusuario2("NULL",1,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de detalle de Recepción Producto Industrial.","fruta_drecepcionind", $_REQUEST['ID'] ,$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

                $ARRAYVERFOLIOEXISTENCIA = $EXIINDUSTRIAL_ADO->buscarPorRecepcionNumeroFolio($_REQUEST['IDP'],  $_REQUEST["NUMEROFOLIODINDUSTRIALE"]);

                if ($ARRAYVERFOLIOEXISTENCIA) {
                    $EXIINDUSTRIAL->__SET('FECHA_EMBALADO_EXIINDUSTRIAL',  $_REQUEST['FECHAEMBALADODINDUSTRIAL']);
                    $EXIINDUSTRIAL->__SET('CANTIDAD_ENVASE_EXIINDUSTRIAL', $_REQUEST['CANTIDADENVASEDRECEPCION']);
                    $EXIINDUSTRIAL->__SET('KILOS_NETO_EXIINDUSTRIAL', $KILOSNETODRECEPCION);
                    $EXIINDUSTRIAL->__SET('KILOS_BRUTO_EXIINDUSTRIAL', $_REQUEST['KILOSBRUTODRECEPCION']);
                    $EXIINDUSTRIAL->__SET('KILOS_PROMEDIO_EXIINDUSTRIAL', $KILOSPROMEDIODRECEPCION);
                    $EXIINDUSTRIAL->__SET('PESO_PALLET_EXIINDUSTRIAL', $_REQUEST['PESOPALLETRECEPCION']);                    
                    $EXIINDUSTRIAL->__SET('GASIFICADO', $_REQUEST['GASIFICADORECEPCION']);
                    $EXIINDUSTRIAL->__SET('FECHA_RECEPCION', $_REQUEST['FECHARECEPCION']);
                    $EXIINDUSTRIAL->__SET('ID_TMANEJO', $_REQUEST['TMANEJO']);
                    $EXIINDUSTRIAL->__SET('ID_ESTANDAR', $_REQUEST['ESTANDAR']);
                    $EXIINDUSTRIAL->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
                    $EXIINDUSTRIAL->__SET('ID_VESPECIES', $_REQUEST['VESPECIES']);
                    $EXIINDUSTRIAL->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                    $EXIINDUSTRIAL->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
                    $EXIINDUSTRIAL->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
                    $EXIINDUSTRIAL->__SET('ID_RECEPCION', $_REQUEST['IDP']);
                    $EXIINDUSTRIAL->__SET('ID_EXIINDUSTRIAL', $ARRAYVERFOLIOEXISTENCIA[0]['ID_EXIINDUSTRIAL']);
                    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                    $EXIINDUSTRIAL_ADO->actualizarExiindustrialRecepcion($EXIINDUSTRIAL);

                    $AUSUARIO_ADO->agregarAusuario2("NULL",1, 2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de Existencia de Producto Industrial","fruta_exiindustrial",$ARRAYVERFOLIOEXISTENCIA[0]["ID_EXIINDUSTRIAL"],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],$_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );

                } else {
                    $ARRAYVERFOLIO = $FOLIO_ADO->verFolioPorEmpresaPlantaTemporadaTindustrial($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
                    $FOLIO = $ARRAYVERFOLIO[0]['ID_FOLIO'];
                    $NUMEROFOLIODINDUSTRIAL = $_REQUEST["NUMEROFOLIODINDUSTRIALE"];
                    $FOLIOALIASESTACTICO = $NUMEROFOLIODINDUSTRIAL;
                    $FOLIOALIASDIANAMICO = "EMPRESA:" . $_REQUEST['EMPRESA'] . "_PLANTA:" . $_REQUEST['PLANTA'] . "_TEMPORADA:" . $_REQUEST['TEMPORADA'] .
                        "_TIPO_FOLIO:PRODUCTO INDUSTRIAL_PROCESO:" . $_REQUEST['IDP'] . "_FOLIO:" . $NUMEROFOLIODINDUSTRIAL;


                    $EXIINDUSTRIAL->__SET('FOLIO_EXIINDUSTRIAL', $NUMEROFOLIODINDUSTRIAL);
                    $EXIINDUSTRIAL->__SET('FOLIO_AUXILIAR_EXIINDUSTRIAL', $NUMEROFOLIODINDUSTRIAL);
                    $EXIINDUSTRIAL->__SET('FECHA_EMBALADO_EXIINDUSTRIAL',  $_REQUEST['FECHAEMBALADODINDUSTRIAL']);
                    $EXIINDUSTRIAL->__SET('CANTIDAD_ENVASE_EXIINDUSTRIAL', $_REQUEST['CANTIDADENVASEDRECEPCION']);
                    $EXIINDUSTRIAL->__SET('KILOS_NETO_EXIINDUSTRIAL', $KILOSNETODRECEPCION);
                    $EXIINDUSTRIAL->__SET('KILOS_BRUTO_EXIINDUSTRIAL', $_REQUEST['KILOSBRUTODRECEPCION']);
                    $EXIINDUSTRIAL->__SET('KILOS_PROMEDIO_EXIINDUSTRIAL', $KILOSPROMEDIODRECEPCION);
                    $EXIINDUSTRIAL->__SET('PESO_PALLET_EXIINDUSTRIAL', $_REQUEST['PESOPALLETRECEPCION']);                    
                    $EXIINDUSTRIAL->__SET('GASIFICADO', $_REQUEST['GASIFICADORECEPCION']);
                    $EXIINDUSTRIAL->__SET('ALIAS_DINAMICO_FOLIO_EXIINDUSTRIAL', $FOLIOALIASESTACTICO);
                    $EXIINDUSTRIAL->__SET('ALIAS_ESTATICO_FOLIO_EXIINDUSTRIAL', $FOLIOALIASDIANAMICO);
                    $EXIINDUSTRIAL->__SET('FECHA_RECEPCION', $_REQUEST['FECHARECEPCION']);
                    $EXIINDUSTRIAL->__SET('ID_TMANEJO', $_REQUEST['TMANEJO']);
                    $EXIINDUSTRIAL->__SET('ID_FOLIO', $FOLIO);
                    $EXIINDUSTRIAL->__SET('ID_ESTANDAR', $_REQUEST['ESTANDAR']);
                    $EXIINDUSTRIAL->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
                    $EXIINDUSTRIAL->__SET('ID_VESPECIES', $_REQUEST['VESPECIES']);
                    $EXIINDUSTRIAL->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                    $EXIINDUSTRIAL->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
                    $EXIINDUSTRIAL->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
                    $EXIINDUSTRIAL->__SET('ID_RECEPCION', $_REQUEST['IDP']);
                    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                    $EXIINDUSTRIAL_ADO->agregarExiindustrialRecepcion($EXIINDUSTRIAL);

                    $AUSUARIO_ADO->agregarAusuario2("NULL",1, 1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Existencia de Producto Industrial","fruta_exiindustrial","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],$_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );
                }
                
                //REDIRECCIONAR A PAGINA registroProceso.php 
                $id_dato =  $_REQUEST['IDP'];
                $accion_dato =  $_REQUEST['OPP'];
                echo '<script>
                        Swal.fire({
                            icon:"info",
                            title:"Registro Modificado",
                            text:"El registro del detalle de recepcion se ha modificada correctamente",
                            showConfirmButton:true,
                            confirmButtonText:"Volver a recepcion"
                        }).then((result)=>{
                            if(result.value){
                                location.href ="' . $_REQUEST['URLO'] . '.php?op&id='.$id_dato.'&a='.$accion_dato.'";
                            }
                        })
                    </script>';
            }     
            if (isset($_REQUEST['ELIMINAR'])) {
                $IDELIMINAR = $_REQUEST['ID'];
                $FOLIOELIMINAR = $_REQUEST['NUMEROFOLIODINDUSTRIALE'];

                $DRECEPCIONIND->__SET('ID_DRECEPCION', $IDELIMINAR);
                $DRECEPCIONIND_ADO->deshabilitar($DRECEPCIONIND);

                $AUSUARIO_ADO->agregarAusuario2("NULL",1,4,"".$_SESSION["NOMBRE_USUARIO"].", Deshabilitar  detalle de Recepción Producto Industrial.","fruta_drecepcionind", $_REQUEST['ID'] ,$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  


                $EXIINDUSTRIAL->__SET('ID_RECEPCION', $_REQUEST['IDP']);
                $EXIINDUSTRIAL->__SET('FOLIO_AUXILIAR_EXIINDUSTRIAL', $FOLIOELIMINAR);
                $EXIINDUSTRIAL_ADO->deshabilitarRecepcion($EXIINDUSTRIAL);

                $EXIINDUSTRIAL->__SET('ID_RECEPCION', $_REQUEST['IDP']);
                $EXIINDUSTRIAL->__SET('FOLIO_AUXILIAR_EXIINDUSTRIAL', $FOLIOELIMINAR);
                $EXIINDUSTRIAL_ADO->eliminadoRecepcion($EXIINDUSTRIAL);

                $AUSUARIO_ADO->agregarAusuario2("NULL",1,4,"".$_SESSION["NOMBRE_USUARIO"].", Deshabilitar  Existencia de Producto Industrial.","fruta_exiindustrial", "NULL" ,$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  


                //REDIRECCIONAR A PAGINA registroProceso.php
                $id_dato =  $_REQUEST['IDP'];
                $accion_dato =  $_REQUEST['OPP'];
                echo '<script>
                        Swal.fire({
                            icon:"error",
                            title:"Registro Eliminado",
                            text:"El registro del detalle recepcion se ha eliminado correctamente ",
                            showConfirmButton:true,
                            confirmButtonText:"Volver a recepcion"
                        }).then((result)=>{
                            if(result.value){
                                location.href ="' . $_REQUEST['URLO'] . '.php?op&id='.$id_dato.'&a='.$accion_dato.'";
                            }
                        })
                    </script>';
            }   
         ?>
</body>
</html>