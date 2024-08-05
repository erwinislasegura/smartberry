<?php

include_once "../../assest/config/validarUsuarioFruta.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/VESPECIES_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/EEXPORTACION_ADO.php';

include_once '../../assest/controlador/TMANEJO_ADO.php';
include_once '../../assest/controlador/TCALIBRE_ADO.php';
include_once '../../assest/controlador/TEMBALAJE_ADO.php';

include_once '../../assest/controlador/CONDUCTOR_ADO.php';
include_once '../../assest/controlador/TRANSPORTE_ADO.php';
include_once '../../assest/controlador/EXIEXPORTACION_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/COMPRADOR_ADO.php';

include_once '../../assest/controlador/DESPACHOPT_ADO.php';
//include_once '../../assest/controlador/EXIEXPORTACION_ADO.php';



include_once '../../assest/modelo/DESPACHOPT.php';
include_once '../../assest/modelo/EXIEXPORTACION.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$TMANEJO_ADO =  new TMANEJO_ADO();
$TCALIBRE_ADO =  new TCALIBRE_ADO();
$TEMBALAJE_ADO =  new TEMBALAJE_ADO();


$VESPECIES_ADO =  new VESPECIES_ADO();
$PRODUCTOR_ADO = new PRODUCTOR_ADO();
$EEXPORTACION_ADO =  new EEXPORTACION_ADO();

$TRANSPORTE_ADO =  new TRANSPORTE_ADO();
$CONDUCTOR_ADO =  new CONDUCTOR_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$COMPRADOR_ADO =  new COMPRADOR_ADO();


$DESPACHOPT_ADO =  new DESPACHOPT_ADO();
$EXIEXPORTACION_ADO =  new EXIEXPORTACION_ADO();

//INIICIALIZAR MODELO EXIEXPORTACION
$DESPACHOPT =  new DESPACHOPT();
$EXIEXPORTACION =  new EXIEXPORTACION();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$NUMERO = "";
$NUMEROVER = "";
$IDDESPACHOMP = "";
$FECHAINGRESODESPACHO = "";
$FECHAMODIFCIACIONDESPACHO = "";
$FECHADESPACHO = "";

$NUMEROGUIADESPACHO = "";
$PATENTECARRO = "";
$PATENTEVEHICULO = "";
$OBSERVACIONDESPACHO = "";
$NUMEROSELLODESPACHO = "";
$REGALO = "";
$CONDUCTOR = "";
$TRANSPORTE = "";
$PLANTADESTINO = "";
$PLANTAEXTERNA = "";
$DESPACHOINDUSTRIAL = "";
$TDESPACHO = "";
$COMPRADOR = "";
$PRODUCTOR = "";
$ESTADO = "";
$PRECIOPALLET = "";
$VGM = "";

$TOTALBRUTO = 0;
$TOTALNETO = 0;
$TOTALENVASE = 0;
$TOTALPRECIO = 0;

$TOTALBRUTOV = 0;
$TOTALNETOV = 0;
$TOTALENVASEV = 0;
$TOTALPRECIOV = 0;

$IDEMPRESA = "";
$IDPLANTA = "";
$IDTEMPORADA = "";


$IDOP = "";
$OP = "";


$DISABLED = "";
$DISABLED2 = "";
$DISABLED3 = "";
$DISABLEDSTYLE = "";

$MENSAJE = "";
$MENSAJE2 = "";
$MENSAJE3 = "";
$MENSAJEVALIDATO = "";
$SINO = "";
$SINOPRECIO = "";
$MENSAJEPRECIO = "";


$IDQUITAR = "";
$FOLIOEXIEXPORTACIONQUITAR = "";

$IDEXIEXPORTACIONPRECIO = "";
$FOLIOEXIEXPORTACIONPRECIO = "";
$IDDESPACHO = "";
$IDPRECIO = "";
$CONTADOR = 0;
$PRECIO = "";
$TOTALPRECIO = "";

//INICIALIZAR ARREGLOS

$ARRAYEMPRESA = "";
$ARRAYPLANTA = "";
$ARRAYTEMPORADA = "";


$ARRAYCONDUCTOR = "";
$ARRAYTRANSPORTITA = "";
$ARRAYPLANTADESTINO = "";
$ARRAYTDESPACHO = "";
$ARRAYPRODUCTOR = "";
$ARRAYCOMPRADOR = "";
$ARRAYPLANTADESTINO = "";
$ARRAYPLANTAEXTERNA = "";


$ARRAYTOMADO = "";
$ARRAYDESPACHOTOMADO = "";
$ARRAYNUMERO = "";
$ARRAYFECHAACTUAL = "";
$ARRAYDESPACHOTOTAL = "";
$ARRAYDESPACHOTOTAL2 = "";
$ARRAYIDEXIEXPORTACIONPRECIO = "";
$ARRAYFOLIOEXIEXPORTACIONPRECIO = "";
$ARRAYIDPRECIO = "";
$ARRAYIDDESPACHO = "";
$ARRAYCONTEO = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES

$ARRAYCONDUCTOR = $CONDUCTOR_ADO->listarConductorPorEmpresaCBX($EMPRESAS);
$ARRAYTRANSPORTITA = $TRANSPORTE_ADO->listarTransportePorEmpresaCBX($EMPRESAS);

$ARRAYPRODUCTOR = $PRODUCTOR_ADO->listarProductorPorEmpresaCBX($EMPRESAS);
$ARRAYCOMPRADOR = $COMPRADOR_ADO->listarCompradorPorEmpresaCBX($EMPRESAS);




$ARRAYEMPRESA = $EMPRESA_ADO->listarEmpresaCBX();
$ARRAYPLANTA = $PLANTA_ADO->listarPlantaCBX();
$ARRAYTEMPORADA = $TEMPORADA_ADO->listarTemporadaCBX();


$ARRAYFECHAACTUAL = $DESPACHOPT_ADO->obtenerFecha();
$FECHADESPACHO = $ARRAYFECHAACTUAL[0]['FECHA'];

include_once "../../assest/config/validarDatosUrl.php";
include_once "../../assest/config/datosUrlD.php";

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
//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION , VISUALIZACION Y CREACION
if (isset($id_dato) && isset($accion_dato)) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $id_dato;
    $OP = $accion_dato;

    $ARRAYTOMADO = $EXIEXPORTACION_ADO->buscarPordespacho($IDOP);

    $ARRAYDESPACHOTOTAL = $EXIEXPORTACION_ADO->obtenerTotalesDespacho($IDOP);
    $ARRAYDESPACHOTOTAL2 = $EXIEXPORTACION_ADO->obtenerTotalesDespacho2($IDOP);


    $TOTALENVASEV = $ARRAYDESPACHOTOTAL2[0]['ENVASE'];
    $TOTALNETOV = $ARRAYDESPACHOTOTAL2[0]['NETO'];
    $TOTALBRUTOV = $ARRAYDESPACHOTOTAL2[0]['BRUTO'];
    $TOTALPRECIOV = $ARRAYDESPACHOTOTAL2[0]['TOTAL_PRECIO'];

    $TOTALENVASE = $ARRAYDESPACHOTOTAL[0]['ENVASE'];
    $TOTALNETO = $ARRAYDESPACHOTOTAL[0]['NETO'];
    $TOTALBRUTO = $ARRAYDESPACHOTOTAL[0]['BRUTO'];
    $TOTALPRECIO = $ARRAYDESPACHOTOTAL[0]['TOTAL_PRECIO'];

    //FUNCION PARA LA OBTENCION DE LOS TOTALES DEL DETALLE ASOCIADO A DESPACHOPT

    //IDENTIFICACIONES DE OPERACIONES
    //crear =  OBTENCION DE DATOS INICIALES PARA PODER CREAR LA DESPACHOPT
    if ($OP == "crear") {

        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $DISABLED = "disabled";
        $DISABLED2 = "";
        $DISABLED3 = "disabled";
        $DISABLEDMENU = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        $ARRAYDESPACHOMP = $DESPACHOPT_ADO->verDespachopt($IDOP);
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYDESPACHOMP as $r) :
            $IDDESPACHOMP = $IDOP;
            $FECHADESPACHO = "" . $r['FECHA_DESPACHO'];
            $NUMEROVER = "" . $r['NUMERO_DESPACHO'];
            $NUMEROGUIADESPACHO = "" . $r['NUMERO_GUIA_DESPACHO'];
            $PATENTEVEHICULO = "" . $r['PATENTE_CAMION'];
            $PATENTECARRO = "" . $r['PATENTE_CARRO'];
            $OBSERVACIONDESPACHO = "" . $r['OBSERVACION_DESPACHO'];
            $NUMEROSELLODESPACHO = "" . $r['NUMERO_SELLO_DESPACHO'];
            $CONDUCTOR = "" . $r['ID_CONDUCTOR'];
            $TRANSPORTE = "" . $r['ID_TRANSPORTE'];
            $TDESPACHO = "" . $r['TDESPACHO'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $ARRAYPLANTADESTINO = $PLANTA_ADO->listarPlantaPropiaDistintaActualCBX($PLANTA);
            $ARRAYPLANTAEXTERNA = $PLANTA_ADO->listarPlantaExternaCBX();
            $VGM = "" . $r['VGM'];
            $ESTADO = "" . $r['ESTADO'];
            $FECHAINGRESODESPACHO = "" . $r['INGRESO'];
            $FECHAMODIFCIACIONDESPACHO = "" . $r['MODIFICACION'];

            if ($TDESPACHO == "1") {
                $PLANTADESTINO = "" . $r['ID_PLANTA2'];
            }
            if ($TDESPACHO == "2") {
                $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            }
            if ($TDESPACHO == "3") {
                $COMPRADOR = "" . $r['ID_COMPRADOR'];
            }
            if ($TDESPACHO == "4") {
                $REGALO = "" . $r['REGALO_DESPACHO'];
            }
            if ($TDESPACHO == "5") {
                $PLANTAEXTERNA = "" . $r['ID_PLANTA3'];
            }

            if ($TDESPACHO == "6") {
                $DESPACHOINDUSTRIAL = "" . $r['ID_PLANTA3'];
            }



        endforeach;
    }
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {

        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $DISABLED = "disabled";
        $DISABLED2 = "";
        $DISABLEDMENU = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $ARRAYDESPACHOMP = $DESPACHOPT_ADO->verDespachopt($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYDESPACHOMP as $r) :
            $IDDESPACHOMP = $IDOP;
            $FECHADESPACHO = "" . $r['FECHA_DESPACHO'];
            $NUMEROVER = "" . $r['NUMERO_DESPACHO'];
            $NUMEROGUIADESPACHO = "" . $r['NUMERO_GUIA_DESPACHO'];
            $PATENTEVEHICULO = "" . $r['PATENTE_CAMION'];
            $PATENTECARRO = "" . $r['PATENTE_CARRO'];
            $OBSERVACIONDESPACHO = "" . $r['OBSERVACION_DESPACHO'];
            $NUMEROSELLODESPACHO = "" . $r['NUMERO_SELLO_DESPACHO'];
            $CONDUCTOR = "" . $r['ID_CONDUCTOR'];
            $TRANSPORTE = "" . $r['ID_TRANSPORTE'];
            $TDESPACHO = "" . $r['TDESPACHO'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $ARRAYPLANTADESTINO = $PLANTA_ADO->listarPlantaPropiaDistintaActualCBX($PLANTA);
            $ARRAYPLANTAEXTERNA = $PLANTA_ADO->listarPlantaExternaCBX();
            $VGM = "" . $r['VGM'];
            $ESTADO = "" . $r['ESTADO'];
            $FECHAINGRESODESPACHO = "" . $r['INGRESO'];
            $FECHAMODIFCIACIONDESPACHO = "" . $r['MODIFICACION'];


            if ($TDESPACHO == "1") {
                $PLANTADESTINO = "" . $r['ID_PLANTA2'];
            }
            if ($TDESPACHO == "2") {
                $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            }
            if ($TDESPACHO == "3") {
                $COMPRADOR = "" . $r['ID_COMPRADOR'];
            }
            if ($TDESPACHO == "4") {
                $REGALO = "" . $r['REGALO_DESPACHO'];
            }
            if ($TDESPACHO == "5") {
                $PLANTAEXTERNA = "" . $r['ID_PLANTA3'];
            }

            if ($TDESPACHO == "6") {
                $DESPACHOINDUSTRIAL = "" . $r['ID_PLANTA3'];
            }


        endforeach;
    }
    //ver =  OBTENCION DE DATOS PARA LA VISUALIZACION DEL REGISTRO
    if ($OP == "ver") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        $DISABLEDMENU = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYDESPACHOMP = $DESPACHOPT_ADO->verDespachopt($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYDESPACHOMP as $r) :
            $IDDESPACHOMP = $IDOP;
            $FECHADESPACHO = "" . $r['FECHA_DESPACHO'];
            $NUMEROVER = "" . $r['NUMERO_DESPACHO'];
            $NUMEROGUIADESPACHO = "" . $r['NUMERO_GUIA_DESPACHO'];
            $PATENTEVEHICULO = "" . $r['PATENTE_CAMION'];
            $PATENTECARRO = "" . $r['PATENTE_CARRO'];
            $OBSERVACIONDESPACHO = "" . $r['OBSERVACION_DESPACHO'];
            $NUMEROSELLODESPACHO = "" . $r['NUMERO_SELLO_DESPACHO'];
            $CONDUCTOR = "" . $r['ID_CONDUCTOR'];
            $TRANSPORTE = "" . $r['ID_TRANSPORTE'];
            $TDESPACHO = "" . $r['TDESPACHO'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $ARRAYPLANTADESTINO = $PLANTA_ADO->listarPlantaPropiaDistintaActualCBX($PLANTA);
            $ARRAYPLANTAEXTERNA = $PLANTA_ADO->listarPlantaExternaCBX();
            $VGM = "" . $r['VGM'];
            $ESTADO = "" . $r['ESTADO'];
            $FECHAINGRESODESPACHO = "" . $r['INGRESO'];
            $FECHAMODIFCIACIONDESPACHO = "" . $r['MODIFICACION'];


            if ($TDESPACHO == "1") {
                $PLANTADESTINO = "" . $r['ID_PLANTA2'];
            }
            if ($TDESPACHO == "2") {
                $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            }
            if ($TDESPACHO == "3") {
                $COMPRADOR = "" . $r['ID_COMPRADOR'];
            }
            if ($TDESPACHO == "4") {
                $REGALO = "" . $r['REGALO_DESPACHO'];
            }
            if ($TDESPACHO == "5") {
                $PLANTAEXTERNA = "" . $r['ID_PLANTA3'];
            }

            if ($TDESPACHO == "6") {
                $DESPACHOINDUSTRIAL = "" . $r['ID_PLANTA3'];
            }

            



        endforeach;
    }
}
//PROCESO PARA OBTENER LOS DATOS DEL FORMULARIO  Y MANTENERLO AL ACTUALIZACION QUE REALIZA EL SELECT DE CONDUCTOR
if (isset($_POST)) {

    if (isset($_REQUEST['FECHAINGRESODESPACHO'])) {

        $FECHAINGRESODESPACHO = "" . $_REQUEST['FECHAINGRESODESPACHO'];
    }
    if (isset($_REQUEST['FECHAMODIFCIACIONDESPACHO'])) {

        $FECHAMODIFCIACIONDESPACHO = "" . $_REQUEST['FECHAMODIFCIACIONDESPACHO'];
    }

    if (isset($_REQUEST['FECHADESPACHO'])) {

        $FECHADESPACHO = "" . $_REQUEST['FECHADESPACHO'];
    }
    if (isset($_REQUEST['NUMEROGUIADESPACHO'])) {

        $NUMEROGUIADESPACHO = "" . $_REQUEST['NUMEROGUIADESPACHO'];
    }
    if (isset($_REQUEST['PATENTECARRO'])) {

        $PATENTECARRO = "" . $_REQUEST['PATENTECARRO'];
    }
    if (isset($_REQUEST['PATENTEVEHICULO'])) {

        $PATENTEVEHICULO = "" . $_REQUEST['PATENTEVEHICULO'];
    }
    if (isset($_REQUEST['OBSERVACIONDESPACHOMP'])) {

        $OBSERVACIONDESPACHOMP = "" . $_REQUEST['OBSERVACIONDESPACHOMP'];
    }

    if (isset($_REQUEST['NUMEROSELLODESPACHO'])) {

        $NUMEROSELLODESPACHO = "" . $_REQUEST['NUMEROSELLODESPACHO'];
    }


    if (isset($_REQUEST['CONDUCTOR'])) {

        $CONDUCTOR = "" . $_REQUEST['CONDUCTOR'];
    }
    if (isset($_REQUEST['TRANSPORTE'])) {

        $TRANSPORTE = "" . $_REQUEST['TRANSPORTE'];
    }
    if (isset($_REQUEST['VGM'])) {

        $VGM = "" . $_REQUEST['VGM'];
    }
    if (isset($_REQUEST['TDESPACHO'])) {

        $TDESPACHO = "" . $_REQUEST['TDESPACHO'];
        $ARRAYPLANTADESTINO = $PLANTA_ADO->listarPlantaPropiaDistintaActualCBX($_REQUEST['PLANTA']);

        $ARRAYPLANTAEXTERNA = $PLANTA_ADO->listarPlantaExternaCBX();


        if ($TDESPACHO == "1") {

            if (isset($_REQUEST['PLANTADESTINO'])) {
                $PLANTADESTINO = "" . $_REQUEST['PLANTADESTINO'];
            }
        }
        if ($TDESPACHO == "2") {

            if (isset($_REQUEST['PRODUCTOR'])) {
                $PRODUCTOR = "" . $_REQUEST['PRODUCTOR'];
            }
        }
        if ($TDESPACHO == "3") {
            if (isset($_REQUEST['COMPRADOR'])) {
                $COMPRADOR = "" . $_REQUEST['COMPRADOR'];
            }
        }
        if ($TDESPACHO == "4") {
            if (isset($_REQUEST['REGALO'])) {
                $REGALO = "" . $_REQUEST['REGALO'];
            }
        }
        if ($TDESPACHO == "5") {
            if (isset($_REQUEST['PLANTAEXTERNA'])) {
                $PLANTAEXTERNA = "" . $_REQUEST['PLANTAEXTERNA'];
            }
        }

        if ($TDESPACHO == "6") {
            if (isset($_REQUEST['DESPACHOINDUSTRIAL'])) {
                $DESPACHOINDUSTRIAL = "" . $_REQUEST['DESPACHOINDUSTRIAL'];
            }
        }
    }



    if (isset($_REQUEST['EMPRESA'])) {

        $EMPRESA = "" . $_REQUEST['EMPRESA'];
    }
    if (isset($_REQUEST['PLANTA'])) {

        $PLANTA = "" . $_REQUEST['PLANTA'];
    }

    if (isset($_REQUEST['TEMPORADA'])) {

        $TEMPORADA = "" . $_REQUEST['TEMPORADA'];
    }
}

?>




<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Despacho</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../../assest/config/urlHead.php"; ?>
        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
                //VALIDACION DE FORMULARIO
                function validacion() {

                    FECHADESPACHO = document.getElementById("FECHADESPACHO").value;
                    TDESPACHO = document.getElementById("TDESPACHO").selectedIndex;
                    VGM = document.getElementById("VGM").selectedIndex;
                    TRANSPORTE = document.getElementById("TRANSPORTE").selectedIndex;
                    CONDUCTOR = document.getElementById("CONDUCTOR").selectedIndex;

                    PATENTEVEHICULO = document.getElementById("PATENTEVEHICULO").value;
                    PATENTECARRO = document.getElementById("PATENTECARRO").value;
                    //OBSERVACIONDESPACHOMP = document.getElementById("OBSERVACIONDESPACHOMP").value;

                    document.getElementById('val_fecha').innerHTML = "";
                    document.getElementById('val_tdespacho').innerHTML = "";
                    document.getElementById('val_vgm').innerHTML = "";
                    document.getElementById('val_transportita').innerHTML = "";
                    document.getElementById('val_conductor').innerHTML = "";
                    document.getElementById('val_patentevehiculo').innerHTML = "";
                    document.getElementById('val_patentecarro').innerHTML = "";
                    //  document.getElementById('val_observacion').innerHTML = "";

                    if (FECHADESPACHO == null || FECHADESPACHO.length == 0 || /^\s+$/.test(FECHADESPACHO)) {
                        document.form_reg_dato.FECHADESPACHO.focus();
                        document.form_reg_dato.FECHADESPACHO.style.borderColor = "#FF0000";
                        document.getElementById('val_fecha').innerHTML = "NO A INGRESADO DATO";
                        return false
                    }
                    document.form_reg_dato.FECHADESPACHO.style.borderColor = "#4AF575";



                    if (TDESPACHO == null || TDESPACHO == 0) {
                        document.form_reg_dato.TDESPACHO.focus();
                        document.form_reg_dato.TDESPACHO.style.borderColor = "#FF0000";
                        document.getElementById('val_tdespacho').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false
                    }
                    document.form_reg_dato.TDESPACHO.style.borderColor = "#4AF575";

                    if (TDESPACHO == 1) {
                        NUMEROGUIADESPACHO = document.getElementById("NUMEROGUIADESPACHO").value;
                        NUMEROSELLODESPACHO = document.getElementById("NUMEROSELLODESPACHO").value;
                        document.getElementById('val_numeroguia').innerHTML = "";
                        document.getElementById('val_numerosello').innerHTML = "";
                        if (NUMEROGUIADESPACHO == null || NUMEROGUIADESPACHO.length == 0 || /^\s+$/.test(NUMEROGUIADESPACHO)) {
                            document.form_reg_dato.NUMEROGUIADESPACHO.focus();
                            document.form_reg_dato.NUMEROGUIADESPACHO.style.borderColor = "#FF0000";
                            document.getElementById('val_numeroguia').innerHTML = "NO A INGRESADO DATO";
                            return false
                        }
                        document.form_reg_dato.NUMEROGUIADESPACHO.style.borderColor = "#4AF575";                    
                    }

                    if (TDESPACHO == 2) {
                        NUMEROGUIADESPACHO = document.getElementById("NUMEROGUIADESPACHO").value;
                        NUMEROSELLODESPACHO = document.getElementById("NUMEROSELLODESPACHO").value;
                        document.getElementById('val_numeroguia').innerHTML = "";
                        document.getElementById('val_numerosello').innerHTML = "";
                        if (NUMEROGUIADESPACHO == null || NUMEROGUIADESPACHO.length == 0 || /^\s+$/.test(NUMEROGUIADESPACHO)) {
                            document.form_reg_dato.NUMEROGUIADESPACHO.focus();
                            document.form_reg_dato.NUMEROGUIADESPACHO.style.borderColor = "#FF0000";
                            document.getElementById('val_numeroguia').innerHTML = "NO A INGRESADO DATO";
                            return false
                        }
                        document.form_reg_dato.NUMEROGUIADESPACHO.style.borderColor = "#4AF575";       
                        
                    }
                    
                    if (TDESPACHO == 3) {
                        NUMEROGUIADESPACHO = document.getElementById("NUMEROGUIADESPACHO").value;
                        NUMEROSELLODESPACHO = document.getElementById("NUMEROSELLODESPACHO").value;
                        document.getElementById('val_numeroguia').innerHTML = "";
                        document.getElementById('val_numerosello').innerHTML = "";
                        if (NUMEROGUIADESPACHO == null || NUMEROGUIADESPACHO.length == 0 || /^\s+$/.test(NUMEROGUIADESPACHO)) {
                            document.form_reg_dato.NUMEROGUIADESPACHO.focus();
                            document.form_reg_dato.NUMEROGUIADESPACHO.style.borderColor = "#FF0000";
                            document.getElementById('val_numeroguia').innerHTML = "NO A INGRESADO DATO";
                            return false
                        }
                        document.form_reg_dato.NUMEROGUIADESPACHO.style.borderColor = "#4AF575";       
                        
                    }
                    
                    if (TDESPACHO == 4) {
                        
                    }
                    
                    if (TDESPACHO == 5) {
                        NUMEROGUIADESPACHO = document.getElementById("NUMEROGUIADESPACHO").value;
                        NUMEROSELLODESPACHO = document.getElementById("NUMEROSELLODESPACHO").value;
                        document.getElementById('val_numeroguia').innerHTML = "";
                        document.getElementById('val_numerosello').innerHTML = "";

                        if (NUMEROGUIADESPACHO == null || NUMEROGUIADESPACHO.length == 0 || /^\s+$/.test(NUMEROGUIADESPACHO)) {
                            document.form_reg_dato.NUMEROGUIADESPACHO.focus();
                            document.form_reg_dato.NUMEROGUIADESPACHO.style.borderColor = "#FF0000";
                            document.getElementById('val_numeroguia').innerHTML = "NO A INGRESADO DATO";
                            return false
                        }
                        document.form_reg_dato.NUMEROGUIADESPACHO.style.borderColor = "#4AF575";                       
                    }

                    if (VGM == null || VGM == 0) {
                        document.form_reg_dato.VGM.focus();
                        document.form_reg_dato.VGM.style.borderColor = "#FF0000";
                        document.getElementById('val_vgm').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false
                    }
                    document.form_reg_dato.VGM.style.borderColor = "#4AF575";


                    if (TRANSPORTE == null || TRANSPORTE == 0) {
                        document.form_reg_dato.TRANSPORTE.focus();
                        document.form_reg_dato.TRANSPORTE.style.borderColor = "#FF0000";
                        document.getElementById('val_transportita').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false
                    }
                    document.form_reg_dato.TRANSPORTE.style.borderColor = "#4AF575";



                    if (CONDUCTOR == null || CONDUCTOR == 0) {
                        document.form_reg_dato.CONDUCTOR.focus();
                        document.form_reg_dato.CONDUCTOR.style.borderColor = "#FF0000";
                        document.getElementById('val_conductor').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false
                    }
                    document.form_reg_dato.CONDUCTOR.style.borderColor = "#4AF575";

                    if (PATENTEVEHICULO == null || PATENTEVEHICULO.length == 0 || /^\s+$/.test(PATENTEVEHICULO)) {
                        document.form_reg_dato.PATENTEVEHICULO.focus();
                        document.form_reg_dato.PATENTEVEHICULO.style.borderColor = "#FF0000";
                        document.getElementById('val_patentevehiculo').innerHTML = "NO A INGRESADO DATO";
                        return false
                    }
                    document.form_reg_dato.FECHADESPACHO.style.borderColor = "#4AF575";

                    /*
                    if (PATENTECARRO == null || PATENTECARRO.length == 0 || /^\s+$/.test(PATENTECARRO)) {
                        document.form_reg_dato.PATENTECARRO.focus();
                        document.form_reg_dato.PATENTECARRO.style.borderColor = "#FF0000";
                        document.getElementById('val_patentecarro').innerHTML = "NO A INGRESADO DATO";
                        return false
                    }
                    document.form_reg_dato.PATENTECARRO.style.borderColor = "#4AF575";
¨*/


                    if (TDESPACHO == 1) {

                        PLANTADESTINO = document.getElementById("PLANTADESTINO").selectedIndex;
                        document.getElementById('val_plantad').innerHTML = "";

                        if (PLANTADESTINO == null || PLANTADESTINO == 0) {
                            document.form_reg_dato.PLANTADESTINO.focus();
                            document.form_reg_dato.PLANTADESTINO.style.borderColor = "#FF0000";
                            document.getElementById('val_plantad').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                            return false
                        }
                        document.form_reg_dato.PLANTADESTINO.style.borderColor = "#4AF575";

                    }


                    if (TDESPACHO == 2) {

                        PRODUCTOR = document.getElementById("PRODUCTOR").selectedIndex;
                        document.getElementById('val_productor').innerHTML = "";

                        if (PRODUCTOR == null || PRODUCTOR == 0) {
                            document.form_reg_dato.PRODUCTOR.focus();
                            document.form_reg_dato.PRODUCTOR.style.borderColor = "#FF0000";
                            document.getElementById('val_productor').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                            return false
                        }
                        document.form_reg_dato.PRODUCTOR.style.borderColor = "#4AF575";

                    }

                    if (TDESPACHO == 3) {
                        COMPRADOR = document.getElementById("COMPRADOR").selectedIndex;
                        PRECIOPALLET = document.getElementById("PRECIOPALLET").value;
                        document.getElementById('val_comprador').innerHTML = "";

                        if (COMPRADOR == null || COMPRADOR == 0) {
                            document.form_reg_dato.COMPRADOR.focus();
                            document.form_reg_dato.COMPRADOR.style.borderColor = "#FF0000";
                            document.getElementById('val_comprador').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                            return false
                        }
                        document.form_reg_dato.COMPRADOR.style.borderColor = "#4AF575";
                    }

                    if (TDESPACHO == 4) {

                        REGALO = document.getElementById("REGALO").value;
                        document.getElementById('val_regalo').innerHTML = "";
                        if (REGALO == null || REGALO == 0) {
                            document.form_reg_dato.REGALO.focus();
                            document.form_reg_dato.REGALO.style.borderColor = "#FF0000";
                            document.getElementById('val_regalo').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                            return false
                        }
                        document.form_reg_dato.REGALO.style.borderColor = "#4AF575";

                    }

                    if (TDESPACHO == 5) {

                        PLANTAEXTERNA = document.getElementById("PLANTAEXTERNA").selectedIndex;
                        document.getElementById('val_plantae').innerHTML = "";

                        if (PLANTAEXTERNA == null || PLANTAEXTERNA == 0) {
                            document.form_reg_dato.PLANTAEXTERNA.focus();
                            document.form_reg_dato.PLANTAEXTERNA.style.borderColor = "#FF0000";
                            document.getElementById('val_plantae').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                            return false
                        }
                        document.form_reg_dato.PLANTAEXTERNA.style.borderColor = "#4AF575";

                    }

                    if (TDESPACHO == 6) {

                        DESPACHOINDUSTRIAL = document.getElementById("DESPACHOINDUSTRIAL").selectedIndex;
                        document.getElementById('val_plantae').innerHTML = "";

                        if (DESPACHOINDUSTRIAL == null || DESPACHOINDUSTRIAL == 0) {
                            document.form_reg_dato.DESPACHOINDUSTRIAL.focus();
                            document.form_reg_dato.DESPACHOINDUSTRIAL.style.borderColor = "#FF0000";
                            document.getElementById('val_plantae').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                            return false
                        }
                        document.form_reg_dato.DESPACHOINDUSTRIAL.style.borderColor = "#4AF575";

                        }

                    /*
                    if (OBSERVACIONDESPACHOMP == null || OBSERVACIONDESPACHOMP.length == 0 || /^\s+$/.test(OBSERVACIONDESPACHOMP)) {
                        document.form_reg_dato.OBSERVACIONDESPACHOMP.focus();
                        document.form_reg_dato.OBSERVACIONDESPACHOMP.style.borderColor = "#FF0000";
                        document.getElementById('val_observacion').innerHTML = "NO A INGRESADO DATO";
                        return false
                    }
                    document.form_reg_dato.OBSERVACIONDESPACHOMP.style.borderColor = "#4AF575"; 
                    */
                }

                //FUNCION PARA REALIZAR UNA ACTUALIZACION DEL FORMULARIO DE REGISTRO DE DESPACHOPT
                function refrescar() {
                    document.getElementById("form_reg_dato").submit();
                }

                //FUNCION PARA ABRIR VENTANA QUE SE ENCUENTRA LA OPERACIONES DE DETALLE DE DESPACHOPT
                function abrirVentana(url) {
                    var opciones =
                        "'directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=1600, height=1000'";
                    window.open(url, 'window', opciones);
                }

                //REDIRECCIONAR A LA PAGINA SELECIONADA
                function irPagina(url) {
                    location.href = "" + url;
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
            <?php include_once "../../assest/config/menuFruta.php";
            ?>
            <div class="content-wrapper">
                <div class="container-full">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Frigorifico </h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Frigorifico</li>
                                            <li class="breadcrumb-item" aria-current="page">Despacho</li>
                                            <li class="breadcrumb-item" aria-current="page">Despacho P. Terminado</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Registro Despacho </a> </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <?php include_once "../../assest/config/verIndicadorEconomico.php"; ?>
                        </div>
                    </div>
                    <!-- Main content -->
                    <section class="content">
                        <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato">
                            <div class="box">
                                 <div class="box-header with-border bg-primary">                                   
                                    <h4 class="box-title">Registro de Despacho</h4>                                        
                                </div>
                                <div class="box-body ">
                                    <div class="row">
                                        <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTA" name="PLANTA" value="<?php echo $PLANTAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADAS; ?>" />

                                                <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESAE" name="EMPRESAE" value="<?php echo $EMPRESA; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTAE" name="PLANTAE" value="<?php echo $PLANTA; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADAE" name="TEMPORADAE" value="<?php echo $TEMPORADA; ?>" />

                                                <input type="hidden" class="form-control" id="TOTALENVASE" name="TOTALENVASE" value="<?php echo $TOTALENVASE; ?>" />
                                                <input type="hidden" class="form-control" id="TOTALBRUTO" name="TOTALBRUTO" value="<?php echo $TOTALBRUTO; ?>" />
                                                <input type="hidden" class="form-control" id="TOTALNETO" name="TOTALNETO" value="<?php echo $TOTALNETO; ?>" />
                                                <input type="hidden" class="form-control" id="TOTALPRECIO" name="TOTALPRECIO" value="<?php echo $TOTALPRECIO; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID DESPACHOEX" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="OP DESPACHOEX" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="URL DESPACHOEX" id="URLP" name="URLP" value="registroDespachopt" />


                                                <label>Número Despacho</label>
                                                <input type="text" class="form-control" style="background-color: #eeeeee;" placeholder="Número Despacho" id="NUMEROVER" name="NUMEROVER" value="<?php echo $NUMEROVER; ?>" disabled />
                                                <label id="val_id" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-6 col-xl-1 col-lg-1 col-md-6 col-sm-6 col-6 col-xs-6">
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha Ingreso</label>
                                                <input type="hidden" class="form-control" placeholder="FECHA DESPACHOPT" id="FECHAINGRESODESPACHOE" name="FECHAINGRESODESPACHOE" value="<?php echo $FECHAINGRESODESPACHO; ?>" />
                                                <input type="date" class="form-control" style="background-color: #eeeeee;" placeholder="FECHA DESPACHOPT" id="FECHAINGRESODESPACHO" name="FECHAINGRESODESPACHO" value="<?php echo $FECHAINGRESODESPACHO; ?>" disabled />
                                                <label id="val_fechai" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha Modificación</label>
                                                <input type="hidden" class="form-control" placeholder="FECHA MODIFICACION" id="FECHAMODIFCIACIONDESPACHOE" name="FECHAMODIFCIACIONDESPACHOE" value="<?php echo $FECHAMODIFCIACIONDESPACHO; ?>" />
                                                <input type="date" class="form-control" style="background-color: #eeeeee;" placeholder="FECHA MODIFICACION" id="FECHAMODIFCIACIONDESPACHO" name="FECHAMODIFCIACIONDESPACHO" value="<?php echo $FECHAMODIFCIACIONDESPACHO; ?>" disabled />
                                                <label id="val_fecham" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha Despacho </label>
                                                <input type="hidden" class="Despachoform-control" placeholder="Fecha Despachomp" id="FECHADESPACHOE" name="FECHADESPACHOE" value="<?php echo $FECHADESPACHO; ?>" />
                                                <input type="date" class="form-control" placeholder="Fecha Despacho" id="FECHADESPACHO" name="FECHADESPACHO" value="<?php echo $FECHADESPACHO; ?>" <?php echo $DISABLED2; ?>  />
                                                <label id="val_fecha" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Tipo Despacho </label>
                                                <input type="hidden" class="form-control" placeholder="TDESPACHOE" id="TDESPACHOE" name="TDESPACHOE" value="<?php echo $TDESPACHO; ?>" />
                                                <select class="form-control select2" id="TDESPACHO" name="TDESPACHO" style="width: 100%;" onchange="this.form.submit()" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                    <option></option>
                                                    <option value="1" <?php if ($TDESPACHO == "1") { echo "selected"; } ?>> Interplanta</option>
                                                    <option value="2" <?php if ($TDESPACHO == "2") { echo "selected"; } ?>> Devolución Productor </option>
                                                    <option value="3" <?php if ($TDESPACHO == "3") { echo "selected"; } ?>> Venta</option>
                                                    <option value="4" <?php if ($TDESPACHO == "4") { echo "selected"; } ?>> Despacho de Descarte(R)</option>
                                                    <option value="5" <?php if ($TDESPACHO == "5") { echo "selected"; } ?>> Planta Externa</option>
                                                    <option value="6" <?php if ($TDESPACHO == "6") { echo "selected"; } ?>> Despacho Industrial</option>
                                                </select>
                                                <label id="val_tdespacho" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <?php if ($TDESPACHO != "4") { ?>     
                                            <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>Número Guía </label>
                                                    <input type="hidden" class="form-control" placeholder="Numero Guia" id="NUMEROGUIADESPACHOE" name="NUMEROGUIADESPACHOE" value="<?php echo $NUMEROGUIADESPACHO; ?>" />
                                                    <input type="text" class="form-control" placeholder="Número Guía" id="NUMEROGUIADESPACHO" name="NUMEROGUIADESPACHO" value="<?php echo $NUMEROGUIADESPACHO; ?>" <?php echo $DISABLED2; ?> />
                                                    <label id="val_numeroguia" class="validacion"> </label>
                                                </div>
                                            </div>     
                                            <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>Número Sello </label>
                                                    <input type="hidden" class="form-control" placeholder="Numero Guia" id="NUMEROSELLODESPACHOE" name="NUMEROSELLODESPACHOE" value="<?php echo $NUMEROSELLODESPACHO; ?>" />
                                                    <input type="text" class="form-control" placeholder="Número Sello" id="NUMEROSELLODESPACHO" name="NUMEROSELLODESPACHO" value="<?php echo $NUMEROSELLODESPACHO; ?>" <?php echo $DISABLED2; ?>  />
                                                    <label id="val_numerosello" class="validacion"> </label>
                                                </div>
                                            </div>                                       
                                        <?php } ?> 
                                        <?php if ($TDESPACHO == "4") { ?>                                            
                                            <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            </div>                                        
                                            <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            </div>
                                        <?php } ?> 
                                        <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>VGM </label>
                                                <input type="hidden" class="form-control" placeholder="VGME" id="VGME" name="VGME" value="<?php echo $VGM; ?>" />
                                                <select class="form-control select2" id="VGM" name="VGM" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                    <option></option>
                                                    <option value="0" <?php if ($VGM == "0") { echo "selected"; } ?>> No</option>
                                                    <option value="1" <?php if ($VGM == "1") { echo "selected"; } ?>> Si </option>
                                                </select>
                                                <label id="val_vgm" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-5 col-lg-9 col-md-9 col-sm-9 col-9 col-xs-9">
                                            <div class="form-group">
                                                <label>Transporte</label>
                                                <input type="hidden" class="form-control" placeholder="Transportita" id="TRANSPORTEE" name="TRANSPORTEE" value="<?php echo $TRANSPORTE; ?>" />
                                                <select class="form-control select2" id="TRANSPORTE" name="TRANSPORTE" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYTRANSPORTITA as $r) : ?>
                                                        <?php if ($ARRAYTRANSPORTITA) {    ?>
                                                            <option value="<?php echo $r['ID_TRANSPORTE']; ?>" <?php if ($TRANSPORTE == $r['ID_TRANSPORTE']) { echo "selected"; } ?>>
                                                                    <?php echo $r['NOMBRE_TRANSPORTE'] ?> 
                                                            </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_transportita" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-1 col-xl-1 col-lg-3 col-md-3 col-sm-3 col-3 col-xs-3">
                                            <div class="form-group">
                                                <br>
                                                <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Transporte" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopTransporte.php' ); ">
                                                    <i class="glyphicon glyphicon-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-5 col-lg-9 col-md-9 col-sm-9 col-9 col-xs-9">
                                            <div class="form-group">
                                                <label>Conductor</label>
                                                <input type="hidden" class="form-control" placeholder="Conductor" id="CONDUCTORE" name="CONDUCTORE" value="<?php echo $CONDUCTOR; ?>" />
                                                <select class="form-control select2" id="CONDUCTOR" name="CONDUCTOR" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYCONDUCTOR as $r) : ?>
                                                        <?php if ($ARRAYCONDUCTOR) {    ?>
                                                            <option value="<?php echo $r['ID_CONDUCTOR']; ?>" <?php if ($CONDUCTOR == $r['ID_CONDUCTOR']) { echo "selected"; } ?>> 
                                                                <?php echo $r['NOMBRE_CONDUCTOR'] ?> 
                                                            </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_conductor" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-1 col-xl-1 col-lg-3 col-md-3 col-sm-3 col-3 col-xs-3">
                                            <div class="form-group">
                                                <br>
                                                <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Conductor" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopConductor.php' ); ">
                                                    <i class="glyphicon glyphicon-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Patente Camión</label>
                                                <input type="hidden" class="form-control" placeholder="Patente Vehiculo" id="PATENTEVEHICULOE" name="PATENTEVEHICULOE" value="<?php echo $PATENTEVEHICULO; ?>" />
                                                <input type="text" class="form-control" placeholder="Patente Camión" id="PATENTEVEHICULO" name="PATENTEVEHICULO" value="<?php echo $PATENTEVEHICULO; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> />
                                                <label id="val_patentevehiculo" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Patente Carro</label>
                                                <input type="hidden" class="form-control" placeholder="Patente Carro" id="PATENTECARROE" name="PATENTECARROE" value="<?php echo $PATENTECARRO; ?>" />
                                                <input type="text" class="form-control" placeholder="Patente Carro" id="PATENTECARRO" name="PATENTECARRO" value="<?php echo $PATENTECARRO; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> />
                                                <label id="val_patentecarro" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <?php if ($TDESPACHO == "1") { ?>
                                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Planta Destino</label>
                                                    <input type="hidden" class="form-control" placeholder="PLANTADESTINOE" id="PLANTADESTINOE" name="PLANTADESTINOE" value="<?php echo $PLANTADESTINO; ?>" />
                                                    <select class="form-control select2" id="PLANTADESTINO" name="PLANTADESTINO" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYPLANTADESTINO as $r) : ?>
                                                            <?php if ($ARRAYPLANTADESTINO) {    ?>
                                                                <option value="<?php echo $r['ID_PLANTA']; ?>" <?php if ($PLANTADESTINO == $r['ID_PLANTA']) { echo "selected"; } ?>>
                                                                    <?php echo $r['NOMBRE_PLANTA'] ?>
                                                                </option>
                                                            <?php } else { ?>
                                                                <option>No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_plantad" class="validacion"> </label>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if ($TDESPACHO == "2") { ?>
                                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Productor</label>
                                                    <input type="hidden" class="form-control" placeholder="PRODUCTORE" id="PRODUCTORE" name="PRODUCTORE" value="<?php echo $PRODUCTOR; ?>" />
                                                    <select class="form-control select2" id="PRODUCTOR" name="PRODUCTOR" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYPRODUCTOR as $r) : ?>
                                                            <?php if ($ARRAYPRODUCTOR) {    ?>
                                                                <option value="<?php echo $r['ID_PRODUCTOR']; ?>" <?php if ($PRODUCTOR == $r['ID_PRODUCTOR']) {  echo "selected";  } ?>> 
                                                                    <?php echo $r['CSG_PRODUCTOR'] ?> : <?php echo $r['NOMBRE_PRODUCTOR'] ?>
                                                                </option>
                                                            <?php } else { ?>
                                                                <option>No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_productor" class="validacion"> </label>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if ($TDESPACHO == "3" || $TDESPACHO == "6") { ?>
                                            <div class="col-xxl-3 col-xl-5 col-lg-9 col-md-9 col-sm-9 col-9 col-xs-9">
                                                <div class="form-group">
                                                    <label>Comprador</label>
                                                    <input type="hidden" class="form-control" placeholder="COMPRADORE" id="COMPRADORE" name="COMPRADORE" value="<?php echo $COMPRADOR; ?>" />
                                                    <select class="form-control select2" id="COMPRADOR" name="COMPRADOR" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYCOMPRADOR as $r) : ?>
                                                            <?php if ($ARRAYCOMPRADOR) {    ?>
                                                                <option value="<?php echo $r['ID_COMPRADOR']; ?>" <?php if ($COMPRADOR == $r['ID_COMPRADOR']) {  echo "selected";  } ?>> 
                                                                  <?php echo $r['NOMBRE_COMPRADOR'] ?> 
                                                                </option>
                                                            <?php } else { ?>
                                                                <option>No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_comprador" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-1 col-xl-1 col-lg-3 col-md-3 col-sm-3 col-3 col-xs-3">
                                                <div class="form-group">
                                                    <br>
                                                    <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Comprador" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopComprador.php' ); ">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if ($TDESPACHO == "4") { ?>
                                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Destino</label>
                                                    <input type="hidden" class="form-control" placeholder="REGALOE" id="REGALOE" name="REGALOE" value="<?php echo $REGALO; ?>" />
                                                    <textarea class="form-control" rows="1" placeholder="Ingrese Para Quien o Quienes" id="REGALO" name="REGALO" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>><?php echo $REGALO; ?></textarea>
                                                    <label id="val_regalo" class="validacion"> </label>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if ($TDESPACHO == "5") { ?>
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-9 col-9 col-xs-9">
                                                <div class="form-group">
                                                    <label>Planta Externa</label>
                                                    <input type="hidden" class="form-control" placeholder="PLANTAEXTERNAE" id="PLANTAEXTERNAE" name="PLANTAEXTERNAE" value="<?php echo $PLANTAEXTERNA; ?>" />
                                                    <select class="form-control select2" id="PLANTAEXTERNA" name="PLANTAEXTERNA" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYPLANTAEXTERNA as $r) : ?>
                                                            <?php if ($ARRAYPLANTAEXTERNA) {    ?>
                                                                <option value="<?php echo $r['ID_PLANTA']; ?>" <?php if ($PLANTAEXTERNA == $r['ID_PLANTA']) {  echo "selected";  } ?>>
                                                                <?php echo $r['NOMBRE_PLANTA'] ?> 
                                                                </option>
                                                            <?php } else { ?>
                                                                <option>No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_plantae" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-1 col-xl-1 col-lg-3 col-md-3 col-sm-3 col-3 col-xs-3">
                                                <div class="form-group">
                                                    <br>
                                                    <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Planta Externa" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopPlanta2.php' ); ">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Observaciónes </label>
                                                <input type="hidden" class="form-control" placeholder="TRANSPORTE" id="OBSERVACIONDESPACHOE" name="OBSERVACIONDESPACHOE" value="<?php echo $OBSERVACIONDESPACHO; ?>" />
                                                <textarea class="form-control" rows="1"  placeholder="Ingrese Nota, Observaciónes u Otro" id="OBSERVACIONDESPACHO" name="OBSERVACIONDESPACHO" <?php echo $DISABLED2; ?> ><?php echo $OBSERVACIONDESPACHO; ?></textarea>
                                                <label id="val_observacion" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- /.row -->
                                <!-- /.box-body -->                                
                                <div class="box-footer">
                                    <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="toolbar">
                                        <div class="btn-group  col-xxl-4 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12" role="group" aria-label="Acciones generales">
                                            <?php if ($OP == "") { ?>
                                                <button type="button" class="btn btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroDespachopt.php');">
                                                    <i class="ti-trash"></i> Cancelar
                                                </button>
                                                <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Guardar" name="CREAR" value="CREAR"   onclick="return validacion()">
                                                    <i class="ti-save-alt"></i> Guardar
                                                </button>
                                            <?php } ?>
                                            <?php if ($OP != "") { ?>
                                                <button type="button" class="btn  btn-success " data-toggle="tooltip" title="Volver" name="VOLVER" value="VOLVER" Onclick="irPagina('listarDespachopt.php'); ">
                                                    <i class="ti-back-left "></i> Volver
                                                </button>
                                                <button type="submit" class="btn btn-warning " data-toggle="tooltip" title="Guardar" name="GUARDAR" value="GUARDAR"  <?php echo $DISABLED2; ?> onclick="return validacion()">
                                                    <i class="ti-pencil-alt"></i> Guardar
                                                </button>
                                                <button type="submit" class="btn btn-danger " data-toggle="tooltip" title="Cerrar" name="CERRAR" value="CERRAR"  <?php echo $DISABLED2; ?> onclick="return validacion()">
                                                    <i class="ti-save-alt"></i> Cerrar
                                                </button>
                                            <?php } ?>
                                        </div>
                                        <div class="btn-group  col-xxl-4 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12  float-right">
                                            <?php if ($OP != ""): ?>
                                                <button type="button" class="btn btn-info  " data-toggle="tooltip" title="Informe" id="defecto" name="tarjas" Onclick="abrirPestana('../../assest/documento/informeDespachoPT.php?parametro=<?php echo $IDOP; ?>&&usuario=<?php echo $IDUSUARIOS; ?>');">
                                                    <i class="fa fa-file-pdf-o"></i> Informe
                                                </button>
                                                <button type="button" class="btn btn-primary  " data-toggle="tooltip" title="Comercial" id="defecto" name="tarjas" Onclick="abrirPestana('../../assest/documento/informeDespachoPtInterComercial.php?parametro=<?php echo $IDOP; ?>&&usuario=<?php echo $IDUSUARIOS; ?>');">
                                                    <i class="fa fa-file-pdf-o"></i> Comercial
                                                </button>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--.row -->
                        <?php if (isset($_GET['op'])): ?>
                            <div class="card">                            
                                    <div class="card-header bg-info">
                                        <h4 class="card-title">Detalle de Despacho de Producto Terminado</h4>
                                    </div>
                                    <div class="card-header">
                                        <div class="form-row align-items-center">
                                            <form method="post" id="form1">
                                                <div class="col-auto">
                                                    <input type="hidden" class="form-control" placeholder="ID DESPACHO" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                                    <input type="hidden" class="form-control" placeholder="OP DESPACHO" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                                    <input type="hidden" class="form-control" placeholder="URL DESPACHO" id="URLP" name="URLP" value="registroDespachopt" />
                                                    <input type="hidden" class="form-control" placeholder="URL SELECCIONAR" id="URLD" name="URLD" value="registroSelecionExistenciaPTDespachoPt" />
                                                    <button type="submit" class="btn btn-success btn-block mb-2" data-toggle="tooltip" title="Seleccion Existencia" id="SELECIONOCDURL" name="SELECIONOCDURL"
                                                            <?php echo $DISABLED2; ?>  <?php  if ($ESTADO == 0) {  echo "disabled style='background-color: #eeeeee;'";  }   ?>  >
                                                            Seleccion Existencias
                                                    </button>
                                                </div>
                                            </form>   
                                            <?php if ($TDESPACHO == "3" || $TDESPACHO == "6"): ?>
                                                <div class="col-auto">
                                                        <button type="submit" form="form2" class="btn btn-primary btn-block" data-toggle="tooltip" title="Agregar Precios" name="PRECIOS" value="PRECIOS"
                                                            <?php echo $DISABLED2; ?> <?php if (empty($ARRAYTOMADO)) { echo "disabled style='background-color: #eeeeee;'"; } ?>
                                                            <?php if ($ESTADO == 0) { echo "disabled style='background-color: #eeeeee;'"; } ?>>
                                                                Agregar Precio(s)
                                                        </button>
                                                </div>
                                            <?php endif ?>    
                                            
                                            <div class="col-auto">
                                                <label class="sr-only" for=""></label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">Total Envase</div>
                                                    </div>
                                                    <input type="hidden" class="form-control" id="TOTALENVASE" name="TOTALENVASE" value="<?php echo $TOTALENVASE; ?>" />
                                                    <input type="text" class="form-control" placeholder="Total Envase" id="TOTALENVASEV" name="TOTALENVASEV" value="<?php echo $TOTALENVASEV; ?>" disabled />
                                                </div>
                                            </div>                                            
                                            <div class="col-auto">
                                                <label class="sr-only" for=""></label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">Total Neto</div>
                                                    </div>
                                                    <input type="hidden" class="form-control" id="TOTALNETO" name="TOTALNETO" value="<?php echo $TOTALNETO; ?>" />
                                                    <input type="text" class="form-control" placeholder="Total Neto" id="TOTALENVASEV" name="TOTALENVASEV" value="<?php echo $TOTALNETOV; ?>" disabled />
                                                </div>
                                            </div>                                        
                                            <div class="col-auto">
                                                <label class="sr-only" for=""></label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">Total Bruto</div>
                                                    </div>
                                                    <input type="hidden" class="form-control" id="TOTALBRUTO" name="TOTALBRUTO" value="<?php echo $TOTALBRUTO; ?>" />
                                                    <input type="text" class="form-control" placeholder="Total Neto" id="TOTALENVASEV" name="TOTALENVASEV" value="<?php echo $TOTALBRUTOV; ?>" disabled />
                                                </div>
                                            </div>                                        
                                            <?php if ($TDESPACHO =="3" || $TDESPACHO == "6"): ?>
                                                <div class="col-auto">
                                                    <label class="sr-only" for=""></label>
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">Total Precio</div>
                                                        </div>
                                                        <input type="hidden" class="form-control" id="TOTALPRECIO" name="TOTALPRECIO" value="<?php echo $TOTALPRECIO; ?>" />
                                                        <input type="text" class="form-control" placeholder="Total Neto" id="TOTALPRECIOV" name="TOTALPRECIOV" value="<?php echo $TOTALPRECIOV; ?>" disabled />
                                                    </div>
                                                </div>                                        
                                            <?php endif ?>
                                        </div>
                                    </div>                         
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                <form method="post" id="form2">
                                                    <table id="detalle" class="table-hover " style="width: 190%;">
                                                        <thead>
                                                            <tr class="text-center">
                                                                <th> N° Folio </th>
                                                                <th>Condición </th>
                                                                <th class="text-center">Operaciónes</th>
                                                                <?php if ($TDESPACHO == "3" || $TDESPACHO == "6") { ?>
                                                                    <th>Precio Por Envases </th>
                                                                <?php } ?>
                                                                <th>Fecha Embalado </th>
                                                                <th>Código Estandar</th>
                                                                <th>Envase/Estandar</th>
                                                                <th>Variedad</th>
                                                                <th>Cantidad Envase</th>
                                                                <th>Kilos Neto</th>
                                                                <th>% Deshidratacion</th>
                                                                <th>Kilos Deshidratacion</th>
                                                                <th>Kilos Bruto</th>
                                                                <?php if ($TDESPACHO == "3" || $TDESPACHO == "6") { ?>
                                                                    <th>Total Precio</th>
                                                                <?php } ?>
                                                               
                                                                <th>CSG</th>
                                                                <th>Productor</th>
                                                                <th>Embolsado</th>
                                                                <th>Tipo Manejo</th>
                                                                <th>Calibre </th>
                                                                <th>Embalaje </th>
                                                                <th>Stock</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php if ($ARRAYTOMADO) { ?>
                                                                <?php foreach ($ARRAYTOMADO as $r) : ?>
                                                                    <?php
                                                                    $CONTADOR = $CONTADOR + 1;

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
                                                                    $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);
                                                                    if ($ARRAYVERPRODUCTORID) {
                                                                        $CSGPRODUCTOR = $ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'];
                                                                        $NOMBREPRODUCTOR = $ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'];
                                                                    } else {
                                                                        $CSGPRODUCTOR = "Sin Datos";
                                                                        $NOMBREPRODUCTOR = "Sin Datos";
                                                                    }
                                                                    $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
                                                                    if ($ARRAYVERVESPECIESID) {
                                                                        $NOMBREVARIEDAD = $ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'];
                                                                    } else {
                                                                        $NOMBREVARIEDAD = "Sin Datos";
                                                                    }
                                                                    $ARRAYEVERERECEPCIONID = $EEXPORTACION_ADO->verEstandar($r['ID_ESTANDAR']);
                                                                    if ($ARRAYEVERERECEPCIONID) {
                                                                        $CODIGOESTANDAR = $ARRAYEVERERECEPCIONID[0]['CODIGO_ESTANDAR'];
                                                                        $NOMBREESTANDAR = $ARRAYEVERERECEPCIONID[0]['NOMBRE_ESTANDAR'];
                                                                    } else {
                                                                        $NOMBREESTANDAR = "Sin Datos";
                                                                        $CODIGOESTANDAR = "Sin Datos";
                                                                    }
                                                                    if ($r['EMBOLSADO'] == "1") {
                                                                        $EMBOLSADO =  "SI";
                                                                    }
                                                                    if ($r['EMBOLSADO'] == "0") {
                                                                        $EMBOLSADO =  "NO";
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
                                                                    if ($r['PRECIO_PALLET']) {
                                                                        if ($TDESPACHO == "6") {
                                                                            $TOTALPRECIO = $r['PRECIO_PALLET'] * $r['DESHIRATACION'];
                                                                        }else{
                                                                            $TOTALPRECIO = $r['PRECIO_PALLET'] * $r['CANTIDAD_ENVASE_EXIEXPORTACION'];
                                                                        }
                                                                        
                                                                    }

                                                                    ?>
                                                                    <tr class="text-center">
                                                                        <td><?php echo $r['FOLIO_AUXILIAR_EXIEXPORTACION']; ?> </td>
                                                                        <td><?php echo $ESTADOSAG; ?></td>
                                                                        <form method="post" id="form1">
                                                                            <td class="text-center">
                                                                                <input type="hidden" class="form-control" id="IDQUITAR" name="IDQUITAR" value="<?php echo $r['ID_EXIEXPORTACION']; ?>" />
                                                                                <div class="btn-group col-6 btn-block" role="group" aria-label="Operaciones Detalle">
                                                                                    <button type="submit" class="btn btn-danger btn-sm" id="QUITAR" name="QUITAR" data-toggle="tooltip" title="Quitar Existencia" <?php echo $DISABLED2; ?> <?php if ($ESTADO == 0) { echo "disabled"; } ?>>
                                                                                        <i class="ti-close"></i><br> Quitar
                                                                                    </button>
                                                                                </div>
                                                                            </td>
                                                                        </form>
                                                                        <?php if ($TDESPACHO == "3" || $TDESPACHO == "6") { ?>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <input type="hidden" class="form-control" placeholder="ID DESPACHO" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                                                                    <input type="hidden" class="form-control" name="IDDESPACHO[]" value="<?php echo $r['ID_DESPACHO']; ?>" />
                                                                                    <input type="hidden" class="form-control" name="FOLIOEXIEXPORTACIONPRECIO[]" value="<?php echo $r['FOLIO_AUXILIAR_EXIEXPORTACION']; ?>" />
                                                                                    <input type="hidden" class="form-control" name="IDEXIEXPORTACIONPRECIO[]" value="<?php echo $r['ID_EXIEXPORTACION']; ?>" />
                                                                                    <input type="hidden" class="form-control" name="IDPRECIO[]" value="<?php echo  $CONTADOR; ?>">
                                                                                    <input type="text" pattern="^[0-9]+([.][0-9]{1,3})?$" placeholder="0.00" class="form-control" name="PRECIO[]"
                                                                                    <?php if ($ESTADO == 0) { echo "disabled";} ?> value="<?php echo $r['PRECIO_PALLET']; ?>">
                                                                                </div>
                                                                            </td>
                                                                        <?php } ?>
                                                                        <td><?php echo $r['EMBALADO']; ?></td>
                                                                        <td><?php echo $CODIGOESTANDAR; ?></td>
                                                                        <td><?php echo $NOMBREESTANDAR; ?></td>
                                                                        <td><?php echo $NOMBREVARIEDAD; ?></td>
                                                                        <td><?php echo $r['ENVASE']; ?></td>
                                                                        <td><?php echo $r['NETO']; ?></td>
                                                                        <td><?php echo $r['PORCENTAJE']; ?></td>
                                                                        <td><?php echo $r['DESHIRATACION']; ?></td>
                                                                        <td><?php echo $r['BRUTO']; ?></td>
                                                                        <?php if ($TDESPACHO == "3" || $TDESPACHO == "6") { ?>
                                                                            <td><?php echo number_format($TOTALPRECIO, 2, ",", "."); ?></td>
                                                                        <?php } ?>
                                                                        
                                                                        <td><?php echo $CSGPRODUCTOR; ?></td>
                                                                        <td><?php echo $NOMBREPRODUCTOR; ?></td>
                                                                        <td><?php echo $EMBOLSADO; ?></td>
                                                                        <td><?php echo $NOMBRETMANEJO; ?></td>
                                                                        <td><?php echo $NOMBRETCALIBRE; ?></td>
                                                                        <td><?php echo $NOMBRETEMBALAJE; ?></td>
                                                                        <td><?php echo $r['STOCKR']; ?></td>
                                                                    </tr>
                                                                <?php endforeach; ?>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </form>
                                            </div>
                                        </div>
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
                <?php include_once "../../assest/config/menuExtraFruta.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../../assest/config/urlBase.php"; ?>
        <?php
            //OPERACION DE REGISTRO DE FILA
            if (isset($_REQUEST['CREAR'])) {

                $ARRAYNUMERO = $DESPACHOPT_ADO->obtenerNumero($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
                $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;
                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO
                $DESPACHOPT->__SET('NUMERO_DESPACHO', $NUMERO);
                $DESPACHOPT->__SET('FECHA_DESPACHO', $_REQUEST['FECHADESPACHO']);
                $DESPACHOPT->__SET('PATENTE_CAMION', $_REQUEST['PATENTEVEHICULO']);
                $DESPACHOPT->__SET('PATENTE_CARRO', $_REQUEST['PATENTECARRO']);
                $DESPACHOPT->__SET('OBSERVACION_DESPACHO', $_REQUEST['OBSERVACIONDESPACHO']);
                $DESPACHOPT->__SET('ID_CONDUCTOR', $_REQUEST['CONDUCTOR']);
                $DESPACHOPT->__SET('ID_TRANSPORTE', $_REQUEST['TRANSPORTE']);
                $DESPACHOPT->__SET('VGM', $_REQUEST['VGM']);
                $DESPACHOPT->__SET('TDESPACHO', $_REQUEST['TDESPACHO']);
                if ($_REQUEST['TDESPACHO'] == "1") {
                    $DESPACHOPT->__SET('ID_PLANTA2', $_REQUEST['PLANTADESTINO']);
                    $DESPACHOPT->__SET('NUMERO_GUIA_DESPACHO', $_REQUEST['NUMEROGUIADESPACHO']);
                    $DESPACHOPT->__SET('NUMERO_SELLO_DESPACHO', $_REQUEST['NUMEROSELLODESPACHO']);
                }
                if ($_REQUEST['TDESPACHO'] == "2") {
                    $DESPACHOPT->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
                    $DESPACHOPT->__SET('NUMERO_GUIA_DESPACHO', $_REQUEST['NUMEROGUIADESPACHO']);
                    $DESPACHOPT->__SET('NUMERO_SELLO_DESPACHO', $_REQUEST['NUMEROSELLODESPACHO']);
                }
                if ($_REQUEST['TDESPACHO'] == "3" || $_REQUEST['TDESPACHO'] == "6") {
                    $DESPACHOPT->__SET('ID_COMPRADOR', $_REQUEST['COMPRADOR']);
                    $DESPACHOPT->__SET('NUMERO_GUIA_DESPACHO', $_REQUEST['NUMEROGUIADESPACHO']);
                    $DESPACHOPT->__SET('NUMERO_SELLO_DESPACHO', $_REQUEST['NUMEROSELLODESPACHO']);
                }
                if ($_REQUEST['TDESPACHO'] == "4") {
                    $DESPACHOPT->__SET('REGALO_DESPACHO', $_REQUEST['REGALO']);
                }
                if ($_REQUEST['TDESPACHO'] == "5") {
                    $DESPACHOPT->__SET('ID_PLANTA3', $_REQUEST['PLANTAEXTERNA']);
                    $DESPACHOPT->__SET('NUMERO_GUIA_DESPACHO', $_REQUEST['NUMEROGUIADESPACHO']);
                    $DESPACHOPT->__SET('NUMERO_SELLO_DESPACHO', $_REQUEST['NUMEROSELLODESPACHO']);
                }
                $DESPACHOPT->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                $DESPACHOPT->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
                $DESPACHOPT->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
                $DESPACHOPT->__SET('ID_USUARIOI', $IDUSUARIOS);
                $DESPACHOPT->__SET('ID_USUARIOM', $IDUSUARIOS);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $DESPACHOPT_ADO->agregarDespachopt($DESPACHOPT);


                //OBTENER EL ID DE LA DESPACHOPT CREADA PARA LUEGO ENVIAR EL INGRESO DEL DETALLE
                $ARRYAOBTENERID = $DESPACHOPT_ADO->obtenerId(
                    $_REQUEST['FECHADESPACHO'],
                    $_REQUEST['EMPRESA'],
                    $_REQUEST['PLANTA'],
                    $_REQUEST['TEMPORADA'],
                );

                $AUSUARIO_ADO->agregarAusuario2($NUMERO,1,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Despacho Producto Terminado.","fruta_despachopt", $ARRYAOBTENERID[0]['ID_DESPACHO'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

                //REDIRECCIONAR A PAGINA registroDespachoPT.php

                $id_dato = $ARRYAOBTENERID[0]['ID_DESPACHO'];
                $accion_dato = "crear";
                // echo "<script type='text/javascript'> location.href ='registroDespachopt.php?op';</script>";
                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Creado",
                        text:"El registro de despacho se ha creado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                            location.href = "registroDespachopt.php?op&id='.$id_dato.'&a='.$accion_dato.'";
                        
                    })
                </script>';
            }

            if (isset($_REQUEST['GUARDAR'])) {
                $DESPACHOPT->__SET('FECHA_DESPACHO', $_REQUEST['FECHADESPACHO']);
                $DESPACHOPT->__SET('CANTIDAD_ENVASE_DESPACHO', $_REQUEST['TOTALENVASE']);
                $DESPACHOPT->__SET('KILOS_NETO_DESPACHO', $_REQUEST['TOTALNETO']);
                $DESPACHOPT->__SET('KILOS_BRUTO_DESPACHO', $_REQUEST['TOTALBRUTO']);
                $DESPACHOPT->__SET('PATENTE_CAMION', $_REQUEST['PATENTEVEHICULOE']);
                $DESPACHOPT->__SET('PATENTE_CARRO', $_REQUEST['PATENTECARROE']);
                $DESPACHOPT->__SET('OBSERVACION_DESPACHO', $_REQUEST['OBSERVACIONDESPACHO']);
                $DESPACHOPT->__SET('ID_CONDUCTOR', $_REQUEST['CONDUCTORE']);
                $DESPACHOPT->__SET('ID_TRANSPORTE', $_REQUEST['TRANSPORTEE']);
                $DESPACHOPT->__SET('VGM', $_REQUEST['VGME']);
                $DESPACHOPT->__SET('TDESPACHO', $_REQUEST['TDESPACHOE']);
                if ($_REQUEST['TDESPACHOE'] == "1") {
                    $DESPACHOPT->__SET('ID_PLANTA2', $_REQUEST['PLANTADESTINOE']);
                    $DESPACHOPT->__SET('NUMERO_GUIA_DESPACHO', $_REQUEST['NUMEROGUIADESPACHO']);
                    $DESPACHOPT->__SET('NUMERO_SELLO_DESPACHO', $_REQUEST['NUMEROSELLODESPACHO']);
                }
                if ($_REQUEST['TDESPACHOE'] == "2") {
                    $DESPACHOPT->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTORE']);
                    $DESPACHOPT->__SET('NUMERO_GUIA_DESPACHO', $_REQUEST['NUMEROGUIADESPACHO']);
                    $DESPACHOPT->__SET('NUMERO_SELLO_DESPACHO', $_REQUEST['NUMEROSELLODESPACHO']);
                }
                if ($_REQUEST['TDESPACHOE'] == "3" || $_REQUEST['TDESPACHOE'] == "6") {
                    $DESPACHOPT->__SET('ID_COMPRADOR', $_REQUEST['COMPRADORE']);
                    $DESPACHOPT->__SET('NUMERO_GUIA_DESPACHO', $_REQUEST['NUMEROGUIADESPACHO']);
                    $DESPACHOPT->__SET('NUMERO_SELLO_DESPACHO', $_REQUEST['NUMEROSELLODESPACHO']);
                    $DESPACHOPT->__SET('TOTAL_PRECIO', $_REQUEST['TOTALPRECIO']);
                }
                if ($_REQUEST['TDESPACHOE'] == "4") {
                    $DESPACHOPT->__SET('REGALO_DESPACHO', $_REQUEST['REGALOE']);
                }
                if ($_REQUEST['TDESPACHOE'] == "5") {
                    $DESPACHOPT->__SET('ID_PLANTA3', $_REQUEST['PLANTAEXTERNAE']);
                    $DESPACHOPT->__SET('NUMERO_GUIA_DESPACHO', $_REQUEST['NUMEROGUIADESPACHO']);
                    $DESPACHOPT->__SET('NUMERO_SELLO_DESPACHO', $_REQUEST['NUMEROSELLODESPACHO']);
                }
                $DESPACHOPT->__SET('ID_USUARIOM', $IDUSUARIOS);
                $DESPACHOPT->__SET('ID_DESPACHO', $_REQUEST['IDP']);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $DESPACHOPT_ADO->actualizarDespachopt($DESPACHOPT);

                $AUSUARIO_ADO->agregarAusuario2($NUMEROVER,1,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de Despacho Producto Terminado.","fruta_despachopt", $_REQUEST['IDP'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  


                if ($accion_dato == "crear") {
                    $id_dato = $_REQUEST['IDP'];
                    $accion_dato = "crear";
                    echo '<script>
                        Swal.fire({
                            icon:"info",
                            title:"Registro Modificado",
                            text:"El registro de despacho se ha modificada correctamente",
                            showConfirmButton: true,
                            confirmButtonText:"Cerrar",
                            closeOnConfirm:false
                        }).then((result)=>{
                            location.href = "registroDespachopt.php?op&id='.$id_dato.'&a='.$accion_dato.'";                        
                        })
                    </script>';
                }
                if ($accion_dato == "editar") {
                    $id_dato = $_REQUEST['IDP'];
                    $accion_dato = "editar";
                    echo '<script>
                        Swal.fire({
                            icon:"info",
                            title:"Registro Modificado",
                            text:"El registro de despacho se ha modificada correctamente",
                            showConfirmButton: true,
                            confirmButtonText:"Cerrar",
                            closeOnConfirm:false
                        }).then((result)=>{
                            location.href = "registroDespachopt.php?op&id='.$id_dato.'&a='.$accion_dato.'";                        
                        })
                    </script>';
                }
            }

            //OPERACION PARA CERRAR LA DESPACHOPT
            if (isset($_REQUEST['CERRAR'])) {
                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO
                $ARRAYDDESPACHOMP2 = $EXIEXPORTACION_ADO->verExistenciaPorDespacho($_REQUEST['IDP']);
                if (empty($ARRAYDDESPACHOMP2)) {
                    $SINO = "1";
                    echo '<script>
                            Swal.fire({
                                icon:"warning",
                                title:"Accion restringida",
                                text:"Tiene que haber al menos un registro de existencia selecionado",
                                showConfirmButton: true,
                                confirmButtonText:"Cerrar",
                                closeOnConfirm:false
                            })
                        </script>';
                } else if ($_REQUEST['TDESPACHOE'] == "3" || $_REQUEST['TDESPACHOE'] == "6") {
                    $ARRAYCONTEO = $EXIEXPORTACION_ADO->contarExistenciaPorDespachoPrecioNulo($_REQUEST['IDP']);
                    if ($ARRAYCONTEO) {
                        if ($ARRAYCONTEO[0]["CONTEO"] != 0) {
                            $SINO = "1";
                            echo '<script>
                                Swal.fire({
                                    icon:"warning",
                                    title:"Accion restringida",
                                    text:"Es obligatorio tener precios por kilos en todas las existencias seleccionadas",
                                    showConfirmButton:true,
                                    confirmButtonText:"Cerrar",
                                    closeOnConfirm:false
                                })
                            </script>';
                        } else {
                            $MENSAJE = "";
                            $SINO = "0";
                        }
                    }
                }else {
                    $MENSAJE = "";
                    $SINO = "0";
                }
                if ($SINO == "0") {
                    $DESPACHOPT->__SET('FECHA_DESPACHO', $_REQUEST['FECHADESPACHOE']);
                    $DESPACHOPT->__SET('CANTIDAD_ENVASE_DESPACHO', $_REQUEST['TOTALENVASE']);
                    $DESPACHOPT->__SET('KILOS_NETO_DESPACHO', $_REQUEST['TOTALNETO']);
                    $DESPACHOPT->__SET('KILOS_BRUTO_DESPACHO', $_REQUEST['TOTALBRUTO']);
                    $DESPACHOPT->__SET('PATENTE_CAMION', $_REQUEST['PATENTEVEHICULOE']);
                    $DESPACHOPT->__SET('PATENTE_CARRO', $_REQUEST['PATENTECARROE']);
                    $DESPACHOPT->__SET('OBSERVACION_DESPACHO', $_REQUEST['OBSERVACIONDESPACHOE']);
                    $DESPACHOPT->__SET('ID_CONDUCTOR', $_REQUEST['CONDUCTORE']);
                    $DESPACHOPT->__SET('ID_TRANSPORTE', $_REQUEST['TRANSPORTEE']);
                    $DESPACHOPT->__SET('VGM', $_REQUEST['VGME']);
                    $DESPACHOPT->__SET('TDESPACHO', $_REQUEST['TDESPACHOE']);
                    if ($_REQUEST['TDESPACHOE'] == "1") {
                        $DESPACHOPT->__SET('ID_PLANTA2', $_REQUEST['PLANTADESTINOE']);
                        $DESPACHOPT->__SET('NUMERO_GUIA_DESPACHO', $_REQUEST['NUMEROGUIADESPACHO']);
                        $DESPACHOPT->__SET('NUMERO_SELLO_DESPACHO', $_REQUEST['NUMEROSELLODESPACHO']);
                    }
                    if ($_REQUEST['TDESPACHOE'] == "2") {
                        $DESPACHOPT->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTORE']);
                        $DESPACHOPT->__SET('NUMERO_GUIA_DESPACHO', $_REQUEST['NUMEROGUIADESPACHO']);
                        $DESPACHOPT->__SET('NUMERO_SELLO_DESPACHO', $_REQUEST['NUMEROSELLODESPACHO']);
                    }
                    if ($_REQUEST['TDESPACHOE'] == "3" || $_REQUEST['TDESPACHOE'] == "6") {
                        $DESPACHOPT->__SET('ID_COMPRADOR', $_REQUEST['COMPRADORE']);
                        $DESPACHOPT->__SET('TOTAL_PRECIO', $_REQUEST['TOTALPRECIO']);
                        $DESPACHOPT->__SET('NUMERO_GUIA_DESPACHO', $_REQUEST['NUMEROGUIADESPACHO']);
                        $DESPACHOPT->__SET('NUMERO_SELLO_DESPACHO', $_REQUEST['NUMEROSELLODESPACHO']);
                    }
                    if ($_REQUEST['TDESPACHOE'] == "4") {
                        $DESPACHOPT->__SET('REGALO_DESPACHO', $_REQUEST['REGALOE']);
                    }
                    if ($_REQUEST['TDESPACHOE'] == "5") {
                        $DESPACHOPT->__SET('ID_PLANTA3', $_REQUEST['PLANTAEXTERNAE']);
                        $DESPACHOPT->__SET('NUMERO_GUIA_DESPACHO', $_REQUEST['NUMEROGUIADESPACHO']);
                        $DESPACHOPT->__SET('NUMERO_SELLO_DESPACHO', $_REQUEST['NUMEROSELLODESPACHO']);
                    }
                    $DESPACHOPT->__SET('ID_USUARIOM', $IDUSUARIOS);
                    $DESPACHOPT->__SET('ID_DESPACHO', $_REQUEST['IDP']);
                    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                    $DESPACHOPT_ADO->actualizarDespachopt($DESPACHOPT);

                    $DESPACHOPT->__SET('ID_DESPACHO', $_REQUEST['IDP']);
                    //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                    $DESPACHOPT_ADO->cerrado($DESPACHOPT);

                    $DESPACHOPT->__SET('ID_DESPACHO', $_REQUEST['IDP']);
                    //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                    $DESPACHOPT_ADO->Confirmado($DESPACHOPT);


                    $AUSUARIO_ADO->agregarAusuario2($NUMEROVER,1,3,"".$_SESSION["NOMBRE_USUARIO"].", Cerrar  Despacho Producto Terminado.","fruta_despachopt", $_REQUEST['IDP'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

                    $ARRAYEXISENCIADESPACHOMP = $EXIEXPORTACION_ADO->verExistenciaPorDespacho2($_REQUEST['IDP']);
                    foreach ($ARRAYEXISENCIADESPACHOMP as $r) :
                        if ($_REQUEST['TDESPACHOE'] == "1") {
                            $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $r['ID_EXIEXPORTACION']);
                            $EXIEXPORTACION->__SET('FECHA_DESPACHO', $_REQUEST['FECHADESPACHOE']);
                            //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                            $EXIEXPORTACION_ADO->enTransito($EXIEXPORTACION);

                            $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $r['ID_EXIEXPORTACION']);
                            $EXIEXPORTACION->__SET('VGM', $_REQUEST['VGME']);
                            //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                        //    $EXIEXPORTACION_ADO->vgm($EXIEXPORTACION);
                        } else {
                            $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $r['ID_EXIEXPORTACION']);
                            $EXIEXPORTACION->__SET('FECHA_DESPACHO', $_REQUEST['FECHADESPACHOE']);
                            //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                            $EXIEXPORTACION_ADO->despachado($EXIEXPORTACION);


                            $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $r['ID_EXIEXPORTACION']);
                            $EXIEXPORTACION->__SET('VGM', $_REQUEST['VGME']);
                            //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                            $EXIEXPORTACION_ADO->vgm($EXIEXPORTACION);
                        }
                    endforeach;
                    //REDIRECCIONAR A PAGINA registroDespachopt.php
                    //SEGUNE EL TIPO DE OPERACIONS QUE SE INDENTIFIQUE EN LA URL       
                    
                    if ($accion_dato == "crear") {
                        $id_dato = $_REQUEST['IDP'];
                        $accion_dato = "ver";
                        echo '<script>
                            Swal.fire({
                                icon:"info",
                                title:"Registro Cerrado",
                                text:"Este despacho se encuentra cerrada y no puede ser modificada.",
                                showConfirmButton: true,
                                confirmButtonText:"Cerrar",
                                closeOnConfirm:false
                            }).then((result)=>{
                                location.href = "registroDespachopt.php?op&id='.$id_dato.'&a='.$accion_dato.'";                            
                            })
                        </script>';
                    }
                    if ($accion_dato == "editar") {
                        $id_dato = $_REQUEST['IDP'];
                        $accion_dato = "ver";
                        echo '<script>
                            Swal.fire({
                                icon:"info",
                                title:"Registro Cerrado",
                                text:"Este despacho se encuentra cerrada y no puede ser modificada.",
                                showConfirmButton: true,
                                confirmButtonText:"Cerrar",
                                closeOnConfirm:false
                            }).then((result)=>{
                                location.href = "registroDespachopt.php?op&id='.$id_dato.'&a='.$accion_dato.'";                            
                            })
                        </script>';
                    }                     
                    
                }
            }

            if (isset($_REQUEST['QUITAR'])) {
                $IDQUITAR = $_REQUEST['IDQUITAR'];
                $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $IDQUITAR);
                // LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $EXIEXPORTACION_ADO->actualizarDeselecionarDespachoCambiarEstado($EXIEXPORTACION);

                $AUSUARIO_ADO->agregarAusuario2("NULL",1,2,"".$_SESSION["NOMBRE_USUARIO"].", Se Quito la Existencia al despacho de producto terminado.","fruta_exiexportacion", "NULL" ,$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

                echo '<script>
                    Swal.fire({
                        icon:"error",
                        title:"Accion realizada",
                        text:"Se ha quitado la existencia del despacho.",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroDespachopt.php?op&id='.$id_dato.'&a='.$accion_dato.'";                            
                    })
                </script>';
            }

            if (isset($_REQUEST['PRECIOS'])) {
                $ARRAYDDESPACHOMP2 = $EXIEXPORTACION_ADO->verExistenciaPorDespacho($_REQUEST['IDP']);
                if (empty($ARRAYDDESPACHOMP2)) {
                    $MENSAJE = "TIENE  QUE HABER AL MENOS UNA EXISTENCIA DE PRODUCTO TERMINADO";
                    $SINO = "1";
                } else {
                    $MENSAJE = "";
                    $SINO = "0";
                }
                if ($SINO == 0) {
                    $ARRAYIDDESPACHO = $_REQUEST['IDDESPACHO'];
                    $ARRAYIDEXIEXPORTACIONPRECIO = $_REQUEST['IDEXIEXPORTACIONPRECIO'];
                    $ARRAYFOLIOEXIEXPORTACIONPRECIO = $_REQUEST['FOLIOEXIEXPORTACIONPRECIO'];
                    $ARRAYPRECIO = $_REQUEST['PRECIO'];
                    $ARRAYIDPRECIO = $_REQUEST['IDPRECIO'];

                    foreach ($ARRAYIDPRECIO as $ID) :
                        $IDPRECIO = $ID - 1;
                        $IDDESPACHO = $ARRAYIDDESPACHO[$IDPRECIO];
                        $IDEXIEXPORTACIONPRECIO = $ARRAYIDEXIEXPORTACIONPRECIO[$IDPRECIO];
                        $FOLIOEXIEXPORTACIONPRECIO = $ARRAYFOLIOEXIEXPORTACIONPRECIO[$IDPRECIO];
                        $PRECIO = $ARRAYPRECIO[$IDPRECIO];

                        if ($PRECIO != "") {
                            $SINOPRECIO = 0;
                            $MENSAJEPRECIO2 = $MENSAJEPRECIO2;
                            if ($PRECIO <= 0) {
                                $SINOPRECIO = 1;
                                $MENSAJEPRECIO2 = $MENSAJEPRECIO2 . "" . $FOLIOEXIEXPORTACIONPRECIO . ": SOLO DEBEN INGRESAR UN VALOR MAYOR A ZERO. ";
                            } else {
                                $SINOPRECIO = 0;
                                $MENSAJEPRECIO2 = $MENSAJEPRECIO2;
                            }
                        } else {
                            $SINOPRECIO = 1;
                            $MENSAJEPRECIO2 = $MENSAJEPRECIO2 . "" . $FOLIOEXIEXPORTACIONPRECIO . ": SE DEBE INGRESAR UN DATO. ";
                        }
                        if ($SINOPRECIO == 0) {

                            $EXIEXPORTACION->__SET('ID_DESPACHO', $IDDESPACHO);
                            $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $IDEXIEXPORTACIONPRECIO);
                            $EXIEXPORTACION->__SET('PRECIO_PALLET', $PRECIO);
                            // LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                            $EXIEXPORTACION_ADO->actualizarDespachoAgregarPrecio($EXIEXPORTACION);

                            $AUSUARIO_ADO->agregarAusuario2("NULL",1,2,"".$_SESSION["NOMBRE_USUARIO"].", Se agrego el precio a la Existencia en el despacho de producto terminado.","fruta_exiexportacion", "NULL" ,$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  
                        }
                    endforeach;
                    
                if($MENSAJEPRECIO2!=""){                
                    echo '
                        <script>
                            Swal.fire({
                                icon:"warning",
                                title:"Accion restringida",
                                text:"' . $MENSAJEPRECIO2 . '",
                                showConfirmButton: true,
                                confirmButtonText:"Cerrar",
                                closeOnConfirm:false
                            }).then((result)=>{
                                location.href ="registroDespachopt.php?op&id='.$id_dato.'&a='.$accion_dato.'";                                
                            });
                    </script>';
                }else{                                
                    echo '
                        <script>
                            Swal.fire({
                                icon:"success",
                                title:"Accion realizada",
                                text:"Se agregaron los precios correctamente.",
                                showConfirmButton: true,
                                confirmButtonText:"Cerrar",
                                closeOnConfirm:false
                            }).then((result)=>{
                                location.href ="registroDespachopt.php?op&id='.$id_dato.'&a='.$accion_dato.'";                                
                            });
                    </script>';
                }
                }
            }
        ?>
</body>

</html>