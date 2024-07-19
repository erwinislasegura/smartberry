<?php

include_once "../../assest/config/validarUsuarioFruta.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../../assest/controlador/TDOCUMENTO_ADO.php';
include_once '../../assest/controlador/TRANSPORTE_ADO.php';
include_once '../../assest/controlador/CONDUCTOR_ADO.php';
include_once '../../assest/controlador/BODEGA_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/PROVEEDOR_ADO.php';
include_once '../../assest/controlador/COMPRADOR_ADO.php';

include_once '../../assest/controlador/PRODUCTO_ADO.php';
include_once '../../assest/controlador/TUMEDIDA_ADO.php';

include_once '../../assest/controlador/INVENTARIOE_ADO.php';
include_once '../../assest/controlador/DESPACHOE_ADO.php';
include_once '../../assest/controlador/DESPACHOMP_ADO.php';

include_once "../../assest/modelo/INVENTARIOE.php";
include_once "../../assest/modelo/DESPACHOE.php";


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$TDOCUMENTO_ADO = new TDOCUMENTO_ADO();
$TRANSPORTE_ADO = new TRANSPORTE_ADO();
$CONDUCTOR_ADO = new CONDUCTOR_ADO();
$BODEGA_ADO = new BODEGA_ADO();
$PRODUCTOR_ADO = new PRODUCTOR_ADO();
$PROVEEDOR_ADO = new PROVEEDOR_ADO();
$COMPRADOR_ADO = new COMPRADOR_ADO();

$PRODUCTO_ADO = new PRODUCTO_ADO();
$TUMEDIDA_ADO = new TUMEDIDA_ADO();


$INVENTARIOE_ADO = new INVENTARIOE_ADO();
$DESPACHOE_ADO = new DESPACHOE_ADO();
$DESPACHOMP_ADO = new DESPACHOMP_ADO();
//INIICIALIZAR MODELO 
$INVENTARIOE = new INVENTARIOE();
$DESPACHOE = new DESPACHOE();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$NUMERO = "";
$NUMEROVER = "";
$FECHADESPACHO = "";
$NUMERODOCUMENTO = "";
$CANTIDAD = "";
$PATENTECARRO = "";
$PATENTECAMION = "";
$TDESPACHO = "";
$OBSERVACION = "";
$REGALO = "";
$FECHAINGRESODESPACHO = "";
$FECHAMODIFCIACIONDESPACHO = "";

$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";
$TDOCUMENTO = "";
$TRANSPORTE = "";
$CONDUCTOR = "";
$RESPONSABLE = "";
$BODEGA = "";
$PLANTA2 = "";
$BODEGAD = "";
$PRODUCTOR = "";
$PROVEEDOR = "";
$PLANTA3 = "";
$COMPRADOR = "";
$NUMERODESPACHOMP="";
$CONTADOR = 0;
$ESTADO = "";

$TOTALCANTIDAD = 0;
$TOTALCANTIDADV = 0;

$DISABLED = "";
$DISABLED2 = "";
$DISABLED3 = "";
$DISABLEDMENU = "";
$DISABLEDSTYLE = "";
$DISABLEENVASE="";
$MENSAJEENVASE="";
$MENSAJE = "";


$IDOP = "";
$OP = "";
$IDQUITAR = "";

//INICIALZIAR ARREGLOS
$ARRAYTOMADO = "";
$ARRAYFECHAACTUAL = "";
$ARRAYTDOCUMENTO = "";
$ARRAYTRANSPORTITA = "";
$ARRAYCONDUCTOR = "";
$ARRAYBODEGA = "";
$ARRAYBODEGA2 = "";
$ARRAYPLANTADESTINO = "";
$ARRAYPLANTAEXTERNA = "";
$ARRAYPRODUCTOR = "";
$ARRAYPROVEEDOR = "";
$ARRAYCOMPRADOR = "";
$ARRAYRESPONSABLE = "";
$ARRAYRESPONSABLEUSUARIO = "";
$ARRAYVALIDARINGRESO = "";
$ARRAYDESPACHOMP="";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYTDOCUMENTO = $TDOCUMENTO_ADO->listarTdocumentoPorEmpresaCBX($EMPRESAS);
$ARRAYTRANSPORTITA = $TRANSPORTE_ADO->listarTransportePorEmpresaCBX($EMPRESAS);
$ARRAYCONDUCTOR = $CONDUCTOR_ADO->listarConductorPorEmpresaCBX($EMPRESAS);
$ARRAYBODEGA = $BODEGA_ADO->listarBodegaPorEmpresaPlantaCBX($EMPRESAS, $PLANTAS);
$ARRAYPLANTADESTINO = $PLANTA_ADO->listarPlantaPropiaDistintaActualCBX($PLANTAS);
$ARRAYPRODUCTOR = $PRODUCTOR_ADO->listarProductorPorEmpresaCBX($EMPRESAS);
$ARRAYPROVEEDOR = $PROVEEDOR_ADO->listarProveedorPorEmpresaCBX($EMPRESAS);
$ARRAYPLANTAEXTERNA = $PLANTA_ADO->listarPlantaExternaCBX();
$ARRAYCOMPRADOR = $COMPRADOR_ADO->listarCompradorPorEmpresaCBX($EMPRESAS);
$ARRAYFECHAACTUAL = $DESPACHOE_ADO->obtenerFecha();
$FECHADESPACHO = $ARRAYFECHAACTUAL[0]['FECHA'];

include_once "../../assest/config/validarDatosUrl.php";
include_once "../../assest/config/datosUrlD.php";



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



$ARRAYBODEGAENVASES=$BODEGA_ADO->listarBodegaPorEmpresaPlantaEnvasesCBX($EMPRESAS, $PLANTAS);
if (empty($ARRAYBODEGAENVASES)) {
    $DISABLEENVASE = "disabled";
    $MENSAJEENVASE = " NECESITA <b> TEBER UNA BODEGA DE ENVASES</b> , PARA OCUPAR LA <b> FUNCIONALIDAD </b>. FAVOR DE <b> CONTACTARSE CON EL ADMINISTRADOR </b>";
}
//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION , VISUALIZACION Y CREACION
if (isset($id_dato) && isset($accion_dato)) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $id_dato;
    $OP = $accion_dato;


    $ARRAYTOMADO = $INVENTARIOE_ADO->buscarPorDespacho2($IDOP);

    $ARRAYDESPACHOTOTAL = $INVENTARIOE_ADO->obtenerTotalesInventarioPorDespachoCBX($IDOP);
    $ARRAYDESPACHOTOTAL2 = $INVENTARIOE_ADO->obtenerTotalesInventarioPorDespacho2CBX($IDOP);
    $TOTALCANTIDAD = $ARRAYDESPACHOTOTAL[0]['CANTIDAD'];
    $TOTALCANTIDADV = $ARRAYDESPACHOTOTAL2[0]['CANTIDAD'];

    

    //FUNCION PARA LA OBTENCION DE LOS TOTALES DEL DETALLE ASOCIADO A DESPACHOE

    //IDENTIFICACIONES DE OPERACIONES
    //crear =  OBTENCION DE DATOS INICIALES PARA PODER CREAR LA DESPACHOE
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
        $ARRAYDESPACHOE = $DESPACHOE_ADO->verDespachoe($IDOP);
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYDESPACHOE as $r) :

            $NUMEROVER = "" . $r['NUMERO_DESPACHO'];
            $FECHADESPACHO = "" . $r['FECHA_DESPACHO'];
            $NUMERODOCUMENTO = "" . $r['NUMERO_DOCUMENTO'];
            $PATENTECAMION = "" . $r['PATENTE_CAMION'];
            $PATENTECARRO = "" . $r['PATENTE_CARRO'];
            $TDESPACHO = "" . $r['TDESPACHO'];
            $OBSERVACION = "" . $r['OBSERVACIONES'];
            $FECHAINGRESODESPACHO = "" . $r['INGRESO'];
            $FECHAMODIFCIACIONDESPACHO = "" . $r['MODIFICACION'];

            $TDOCUMENTO = "" . $r['ID_TDOCUMENTO'];
            $TRANSPORTE = "" . $r['ID_TRANSPORTE'];
            $CONDUCTOR = "" . $r['ID_CONDUCTOR'];

            $ARRAYPLANTADESTINO = $PLANTA_ADO->listarPlantaPropiaDistintaActualCBX($PLANTA);
            if ($TDESPACHO == "1") {
                $BODEGA = "" . $r['ID_BODEGA'];
            }
            if ($TDESPACHO == "2") {
                $PLANTA2 = "" . $r['ID_PLANTA2'];
                $ARRAYBODEGA2 = $BODEGA_ADO->listarBodegaPorEmpresaPlantaCBX($EMPRESAS, $PLANTA2);
                $BODEGAD = "" . $r['ID_BODEGA2'];
            }
            if ($TDESPACHO == "3") {
                $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            }
            if ($TDESPACHO == "4") {
                $PROVEEDOR = "" . $r['ID_PROVEEDOR'];
            }            
            if ($TDESPACHO == "5") {
                $COMPRADOR = "" . $r['ID_COMPRADOR'];
            }            
            if ($TDESPACHO == "6") {
                $REGALO = "" . $r['REGALO_DESPACHO'];
            }
            if ($TDESPACHO == "7") {
                $PLANTA3 = "" . $r['ID_PLANTA3'];
            }
            if ($TDESPACHO == "8") {
                $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            }
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $ESTADO = "" . $r['ESTADO'];            
            $ARRAYDESPACHOMP=$DESPACHOMP_ADO->verDespachomp($r['ID_DESPACHOMP']);
            if($ARRAYDESPACHOMP){
                $NUMERODESPACHOMP=$ARRAYDESPACHOMP[0]["NUMERO_DESPACHO"];
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
        $ARRAYDESPACHOE = $DESPACHOE_ADO->verDespachoe($IDOP);
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYDESPACHOE as $r) :

            $NUMEROVER = "" . $r['NUMERO_DESPACHO'];
            $FECHADESPACHO = "" . $r['FECHA_DESPACHO'];
            $NUMERODOCUMENTO = "" . $r['NUMERO_DOCUMENTO'];
            $PATENTECAMION = "" . $r['PATENTE_CAMION'];
            $PATENTECARRO = "" . $r['PATENTE_CARRO'];
            $TDESPACHO = "" . $r['TDESPACHO'];
            $OBSERVACION = "" . $r['OBSERVACIONES'];
            $FECHAINGRESODESPACHO = "" . $r['INGRESO'];
            $FECHAMODIFCIACIONDESPACHO = "" . $r['MODIFICACION'];

            $TDOCUMENTO = "" . $r['ID_TDOCUMENTO'];
            $TRANSPORTE = "" . $r['ID_TRANSPORTE'];
            $CONDUCTOR = "" . $r['ID_CONDUCTOR'];

            $ARRAYPLANTADESTINO = $PLANTA_ADO->listarPlantaPropiaDistintaActualCBX($PLANTA);
            if ($TDESPACHO == "1") {
                $BODEGA = "" . $r['ID_BODEGA'];
            }
            if ($TDESPACHO == "2") {
                $PLANTA2 = "" . $r['ID_PLANTA2'];
                $ARRAYBODEGA2 = $BODEGA_ADO->listarBodegaPorEmpresaPlantaCBX($EMPRESAS, $PLANTA2);
                $BODEGAD = "" . $r['ID_BODEGA2'];
            }
            if ($TDESPACHO == "3") {
                $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            }
            if ($TDESPACHO == "4") {
                $PROVEEDOR = "" . $r['ID_PROVEEDOR'];
            }            
            if ($TDESPACHO == "5") {
                $COMPRADOR = "" . $r['ID_COMPRADOR'];
            }            
            if ($TDESPACHO == "6") {
                $REGALO = "" . $r['REGALO_DESPACHO'];
            }
            if ($TDESPACHO == "7") {
                $PLANTA3 = "" . $r['ID_PLANTA3'];
            }
            if ($TDESPACHO == "8") {
                $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            }
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $ESTADO = "" . $r['ESTADO'];
            $ARRAYDESPACHOMP=$DESPACHOMP_ADO->verDespachomp($r['ID_DESPACHOMP']);
            if($ARRAYDESPACHOMP){
                $NUMERODESPACHOMP=$ARRAYDESPACHOMP[0]["NUMERO_DESPACHO"];
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
        $ARRAYDESPACHOE = $DESPACHOE_ADO->verDespachoe($IDOP);
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYDESPACHOE as $r) :

            $NUMEROVER = "" . $r['NUMERO_DESPACHO'];
            $FECHADESPACHO = "" . $r['FECHA_DESPACHO'];
            $NUMERODOCUMENTO = "" . $r['NUMERO_DOCUMENTO'];
            $PATENTECAMION = "" . $r['PATENTE_CAMION'];
            $PATENTECARRO = "" . $r['PATENTE_CARRO'];
            $TDESPACHO = "" . $r['TDESPACHO'];
            $OBSERVACION = "" . $r['OBSERVACIONES'];
            $FECHAINGRESODESPACHO = "" . $r['INGRESO'];
            $FECHAMODIFCIACIONDESPACHO = "" . $r['MODIFICACION'];

            $TDOCUMENTO = "" . $r['ID_TDOCUMENTO'];
            $TRANSPORTE = "" . $r['ID_TRANSPORTE'];
            $CONDUCTOR = "" . $r['ID_CONDUCTOR'];

            $ARRAYPLANTADESTINO = $PLANTA_ADO->listarPlantaPropiaDistintaActualCBX($PLANTA);
            if ($TDESPACHO == "1") {
                $BODEGA = "" . $r['ID_BODEGA'];
            }
            if ($TDESPACHO == "2") {
                $PLANTA2 = "" . $r['ID_PLANTA2'];
                $ARRAYBODEGA2 = $BODEGA_ADO->listarBodegaPorEmpresaPlantaCBX($EMPRESAS, $PLANTA2);
                $BODEGAD = "" . $r['ID_BODEGA2'];
            }
            if ($TDESPACHO == "3") {
                $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            }
            if ($TDESPACHO == "4") {
                $PROVEEDOR = "" . $r['ID_PROVEEDOR'];
            }            
            if ($TDESPACHO == "5") {
                $COMPRADOR = "" . $r['ID_COMPRADOR'];
            }            
            if ($TDESPACHO == "6") {
                $REGALO = "" . $r['REGALO_DESPACHO'];
            }
            if ($TDESPACHO == "7") {
                $PLANTA3 = "" . $r['ID_PLANTA3'];
            }
            if ($TDESPACHO == "8") {
                $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            }
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $ESTADO = "" . $r['ESTADO'];
            $ARRAYDESPACHOMP=$DESPACHOMP_ADO->verDespachomp($r['ID_DESPACHOMP']);
            if($ARRAYDESPACHOMP){
                $NUMERODESPACHOMP=$ARRAYDESPACHOMP[0]["NUMERO_DESPACHO"];
            }
        endforeach;
    }
}
//PROCESO PARA OBTENER LOS DATOS DEL FORMULARIO  Y MANTENERLO AL ACTUALIZACION QUE REALIZA EL SELECT DE CONDUCTOR
if (isset($_POST)) {
    if (isset($_REQUEST['FECHADESPACHO'])) {
        $FECHADESPACHO = "" . $_REQUEST['FECHADESPACHO'];
    }
    if (isset($_REQUEST['NUMERODOCUMENTO'])) {
        $NUMERODOCUMENTO = "" . $_REQUEST['NUMERODOCUMENTO'];
    }
    if (isset($_REQUEST['PATENTECARRO'])) {
        $PATENTECARRO = "" . $_REQUEST['PATENTECARRO'];
    }
    if (isset($_REQUEST['PATENTECAMION'])) {
        $PATENTECAMION = "" . $_REQUEST['PATENTECAMION'];
    }
    if (isset($_REQUEST['OBSERVACION'])) {
        $OBSERVACION = "" . $_REQUEST['OBSERVACION'];
    }
    if (isset($_REQUEST['FECHAINGRESODESPACHO'])) {
        $FECHAINGRESODESPACHO = "" . $_REQUEST['FECHAINGRESODESPACHO'];
    }
    if (isset($_REQUEST['FECHAMODIFCIACIONDESPACHO'])) {
        $FECHAMODIFCIACIONDESPACHO = "" . $_REQUEST['FECHAMODIFCIACIONDESPACHO'];
    }
    if (isset($_REQUEST['FECHAMODIFCIACIONDESPACHO'])) {
        $FECHAMODIFCIACIONDESPACHO = "" . $_REQUEST['FECHAMODIFCIACIONDESPACHO'];
    }
    if (isset($_REQUEST['FECHAMODIFCIACIONDESPACHO'])) {
        $FECHAMODIFCIACIONDESPACHO = "" . $_REQUEST['FECHAMODIFCIACIONDESPACHO'];
    }
    if (isset($_REQUEST['FECHAMODIFCIACIONDESPACHO'])) {
        $FECHAMODIFCIACIONDESPACHO = "" . $_REQUEST['FECHAMODIFCIACIONDESPACHO'];
    }
    if (isset($_REQUEST['TDESPACHO'])) {
        $TDESPACHO = "" . $_REQUEST['TDESPACHO'];
        if ($TDESPACHO == "1") {
            if (isset($_REQUEST['BODEGA'])) {
                $BODEGA = "" . $_REQUEST['BODEGA'];
            }
        }
        if ($TDESPACHO == "2") {
            if (isset($_REQUEST['PLANTA2'])) {
                $PLANTA2 = "" . $_REQUEST['PLANTA2'];
                $ARRAYBODEGA2 = $BODEGA_ADO->listarBodegaPorEmpresaPlantaCBX($EMPRESAS, $PLANTA2);
            }
            if (isset($_REQUEST['BODEGAD'])) {
                $BODEGAD = "" . $_REQUEST['BODEGAD'];
            }
        }
        if ($TDESPACHO == "3") {
            if (isset($_REQUEST['PRODUCTOR'])) {
                $PRODUCTOR = "" . $_REQUEST['PRODUCTOR'];
            }
        }
        if ($TDESPACHO == "4") {
            if (isset($_REQUEST['PROVEEDOR'])) {
                $PROVEEDOR = "" . $_REQUEST['PROVEEDOR'];
            }
        }
        if ($TDESPACHO == "5") {
            if (isset($_REQUEST['PLANTA3'])) {
                $PLANTA3 = "" . $_REQUEST['PLANTA3'];
            }
        }
        if ($TDESPACHO == "6") {
            if (isset($_REQUEST['COMPRADOR'])) {
                $COMPRADOR = "" . $_REQUEST['COMPRADOR'];
            }
        }
        if ($TDESPACHO == "7") {
            if (isset($_REQUEST['REGALO'])) {
                $REGALO = "" . $_REQUEST['REGALO'];
            }
        }
    }
    if (isset($_REQUEST['TDOCUMENTO'])) {
        $TDOCUMENTO = "" . $_REQUEST['TDOCUMENTO'];
    }
    if (isset($_REQUEST['TRANSPORTE'])) {
        $TRANSPORTE = "" . $_REQUEST['TRANSPORTE'];
    }
    if (isset($_REQUEST['CONDUCTOR'])) {
        $CONDUCTOR = "" . $_REQUEST['CONDUCTOR'];
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Despacho Envases</title>
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
                    NUMERODOCUMENTO = document.getElementById("NUMERODOCUMENTO").value;
                    TDOCUMENTO = document.getElementById("TDOCUMENTO").selectedIndex;
                    TRANSPORTE = document.getElementById("TRANSPORTE").selectedIndex;
                    CONDUCTOR = document.getElementById("CONDUCTOR").selectedIndex;
                    PATENTECAMION = document.getElementById("PATENTECAMION").value;
                    PATENTECARRO = document.getElementById("PATENTECARRO").value;
                    // OBSERVACION = document.getElementById("OBSERVACION").value;


                    document.getElementById('val_fecha').innerHTML = "";
                    document.getElementById('val_tdespacho').innerHTML = "";
                    document.getElementById('val_numerodocumento').innerHTML = "";
                    document.getElementById('val_tdocumento').innerHTML = "";
                    document.getElementById('val_transportita').innerHTML = "";
                    document.getElementById('val_conductor').innerHTML = "";
                    document.getElementById('val_patentecamion').innerHTML = "";
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


                    if (TDOCUMENTO == null || TDOCUMENTO == 0) {
                        document.form_reg_dato.TDOCUMENTO.focus();
                        document.form_reg_dato.TDOCUMENTO.style.borderColor = "#FF0000";
                        document.getElementById('val_tdocumento').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false
                    }
                    document.form_reg_dato.TDOCUMENTO.style.borderColor = "#4AF575";
                    
                    if (NUMERODOCUMENTO == null || NUMERODOCUMENTO.length == 0 || /^\s+$/.test(NUMERODOCUMENTO)) {
                        document.form_reg_dato.NUMERODOCUMENTO.focus();
                        document.form_reg_dato.NUMERODOCUMENTO.style.borderColor = "#FF0000";
                        document.getElementById('val_numerodocumento').innerHTML = "NO A INGRESADO DATO";
                        return false
                    }
                    document.form_reg_dato.NUMERODOCUMENTO.style.borderColor = "#4AF575";

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


                    if (PATENTECAMION == null || PATENTECAMION.length == 0 || /^\s+$/.test(PATENTECAMION)) {
                        document.form_reg_dato.PATENTECAMION.focus();
                        document.form_reg_dato.PATENTECAMION.style.borderColor = "#FF0000";
                        document.getElementById('val_patentecamion').innerHTML = "NO A INGRESADO DATO";
                        return false
                    }
                    document.form_reg_dato.PATENTECAMION.style.borderColor = "#4AF575";

                    /*
                    if (PATENTECARRO == null || PATENTECARRO.length == 0 || /^\s+$/.test(PATENTECARRO)) {
                        document.form_reg_dato.PATENTECARRO.focus();
                        document.form_reg_dato.PATENTECARRO.style.borderColor = "#FF0000";
                        document.getElementById('val_patentecarro').innerHTML = "NO A INGRESADO DATO";
                        return false
                    }
                    document.form_reg_dato.PATENTECARRO.style.borderColor = "#4AF575";
                    */
                    if (TDESPACHO == 1) {
                        BODEGA = document.getElementById("BODEGA").selectedIndex;
                        document.getElementById('val_bodega').innerHTML = "";

                        if (BODEGA == null || BODEGA == 0) {
                            document.form_reg_dato.BODEGA.focus();
                            document.form_reg_dato.BODEGA.style.borderColor = "#FF0000";
                            document.getElementById('val_bodega').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                            return false
                        }
                        document.form_reg_dato.BODEGA.style.borderColor = "#4AF575";
                    }
                    if (TDESPACHO == 2) {

                        PLANTA2 = document.getElementById("PLANTA2").selectedIndex;
                        BODEGAD = document.getElementById("BODEGAD").selectedIndex;
                        document.getElementById('val_plantad').innerHTML = "";
                        document.getElementById('val_bodegad').innerHTML = "";

                        if (PLANTA2 == null || PLANTA2 == 0) {
                            document.form_reg_dato.PLANTA2.focus();
                            document.form_reg_dato.PLANTA2.style.borderColor = "#FF0000";
                            document.getElementById('val_plantad').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                            return false
                        }
                        document.form_reg_dato.PLANTA2.style.borderColor = "#4AF575";

                        if (BODEGAD == null || BODEGAD == 0) {
                            document.form_reg_dato.BODEGAD.focus();
                            document.form_reg_dato.BODEGAD.style.borderColor = "#FF0000";
                            document.getElementById('val_bodegad').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                            return false
                        }
                        document.form_reg_dato.BODEGAD.style.borderColor = "#4AF575";

                    }
                    if (TDESPACHO == 3) {
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
                    if (TDESPACHO == 4) {
                        PROVEEDOR = document.getElementById("PROVEEDOR").selectedIndex;
                        document.getElementById('val_proveedor').innerHTML = "";

                        if (PROVEEDOR == null || PROVEEDOR == 0) {
                            document.form_reg_dato.PROVEEDOR.focus();
                            document.form_reg_dato.PROVEEDOR.style.borderColor = "#FF0000";
                            document.getElementById('val_proveedor').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                            return false
                        }
                        document.form_reg_dato.PROVEEDOR.style.borderColor = "#4AF575";

                    }
                    if (TDESPACHO == 5) {
                        COMPRADOR = document.getElementById("COMPRADOR").selectedIndex;
                        document.getElementById('val_cliente').innerHTML = "";

                        if (COMPRADOR == null || COMPRADOR == 0) {
                            document.form_reg_dato.COMPRADOR.focus();
                            document.form_reg_dato.COMPRADOR.style.borderColor = "#FF0000";
                            document.getElementById('val_cliente').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                            return false
                        }
                        document.form_reg_dato.COMPRADOR.style.borderColor = "#4AF575";
                    }
                    if (TDESPACHO == 6) {
                        REGALO = document.getElementById("REGALO").value;
                        document.getElementById('val_regalo').innerHTML = "";

                        if (REGALO == null || REGALO.length == 0 || /^\s+$/.test(REGALO)) {
                            document.form_reg_dato.REGALO.focus();
                            document.form_reg_dato.REGALO.style.borderColor = "#FF0000";
                            document.getElementById('val_regalo').innerHTML = "NO A INGRESADO DATO";
                            return false
                        }
                        document.form_reg_dato.REGALO.style.borderColor = "#4AF575";
                    }
                    if (TDESPACHO == 7) {
                        PLANTA3 = document.getElementById("PLANTA3").selectedIndex;
                        document.getElementById('val_plantae').innerHTML = "";

                        if (PLANTA3 == null || PLANTA3 == 0) {
                            document.form_reg_dato.PLANTA3.focus();
                            document.form_reg_dato.PLANTA3.style.borderColor = "#FF0000";
                            document.getElementById('val_plantae').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                            return false
                        }
                        document.form_reg_dato.PLANTA3.style.borderColor = "#4AF575";
                    }
                    
                    if (TDESPACHO == 8) {
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
                    /*
                    if (OBSERVACION == null || OBSERVACION.length == 0 || /^\s+$/.test(OBSERVACION)) {
                            document.form_reg_dato.OBSERVACION.focus();
                            document.form_reg_dato.OBSERVACION.style.borderColor = "#FF0000";
                            document.getElementById('val_observacion').innerHTML = "NO A INGRESADO DATO";
                            return false
                        }
                        document.form_reg_dato.OBSERVACION.style.borderColor = "#4AF575";
                    */

                }

                //FUNCION PARA REALIZAR UNA ACTUALIZACION DEL FORMULARIO DE REGISTRO DE DESPACHOE
                function refrescar() {
                    document.getElementById("form_reg_dato").submit();
                }

                //FUNCION PARA ABRIR VENTANA QUE SE ENCUENTRA LA OPERACIONES DE DETALLE DE DESPACHOE
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

<body class="hold-transition light-skin fixed sidebar-mini theme-primary">
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <?php include_once "../../assest/config/menuFruta.php"; ?>
            <div class="content-wrapper">
                <div class="container-full">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Envases </h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Envases </li>
                                            <li class="breadcrumb-item" aria-current="page">Despacho</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#">Registro Despacho </a>  </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <?php include_once "../../assest/config/verIndicadorEconomico.php"; ?>
                        </div>
                    </div>
                    <!-- Main content -->
                    <label id="val_mensaje" class="validacion"><?php echo $MENSAJEENVASE; ?> </label>
                    <section class="content">
                        <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato">
                            <div class="box">
                                <div class="box-header with-border bg-primary">                                    
                                    <h4 class="box-title">Registro Despacho</h4>                                    
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

                                                <input type="hidden" class="form-control" id="TOTALCANTIDAD" name="TOTALCANTIDAD" value="<?php echo $TOTALCANTIDAD; ?>" />

                                                <input type="hidden" class="form-control" placeholder="ID DESPACHOEX" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="OP DESPACHOEX" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="URL DESPACHOEX" id="URLP" name="URLP" value="registroDespachoe" />


                                                <label>Número Despacho</label>
                                                <input type="text" class="form-control" style="background-color: #eeeeee;" placeholder="Número Despacho" id="NUMEROVER" name="NUMEROVER" value="<?php echo $NUMEROVER; ?>" disabled />
                                                <label id="val_id" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-9 col-9 col-xs-9">
                                            <div class="form-group">
                                                <label>Tipo Despacho </label>
                                                <input type="hidden" class="form-control" placeholder="TDESPACHOE" id="TDESPACHOE" name="TDESPACHOE" value="<?php echo $TDESPACHO; ?>" />
                                                <select class="form-control select2" id="TDESPACHO" name="TDESPACHO" style="width: 100%;" onchange="this.form.submit()" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                    <option></option>
                                                    <option value="1" <?php if ($TDESPACHO == "1") { echo "selected"; } ?>> A Sub Bodega</option>
                                                    <option value="2" <?php if ($TDESPACHO == "2") { echo "selected"; } ?>> Interplanta </option>
                                                    <option value="3" <?php if ($TDESPACHO == "3") { echo "selected"; } ?>> Devolución a Productor</option>
                                                    <option value="4" <?php if ($TDESPACHO == "4") { echo "selected"; } ?>> Devolución a Proveedor</option>
                                                    <option value="5" <?php if ($TDESPACHO == "5") { echo "selected"; } ?>> Venta Industrial</option>
                                                    <option value="6" <?php if ($TDESPACHO == "6") { echo "selected"; } ?>> Regalo </option>
                                                    <option value="7" <?php if ($TDESPACHO == "7") { echo "selected"; } ?>> Planta Externa</option>
                                                    <option value="8" <?php if ($TDESPACHO == "8") { echo "selected"; } ?>> Despacho a Productor</option>
                                                </select>
                                                <label id="val_tdespacho" class="validacion"> </label>
                                            </div>
                                        </div>                
                                        <?php if ($TDESPACHO == "1") { ?>
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-9 col-9 col-xs-9">
                                            </div>
                                        <?php } ?>                                   
                                        <?php if ($TDESPACHO == "2") { ?>                                                
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-9 col-9 col-xs-9"> 
                                                <div class="form-group">   
                                                   <?php  if($ARRAYDESPACHOMP){?>
                                                        <p class="text-muted"><i class="fas fa-info-circle"></i>Esta Registro viene desde una Despacho de Materia prima.<br> <b> Numero Despacho: <?php echo $NUMERODESPACHOMP;?> </b> </p>   
                                                    <?php }?>
                                                </div>
                                            </div>
                                        <?php } ?>                                        
                                        <?php if ($TDESPACHO == "3") { ?>                                                
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-9 col-9 col-xs-9"> 
                                                <div class="form-group">        
                                                    <?php  if($ARRAYDESPACHOMP){?>
                                                        <p class="text-muted"><i class="fas fa-info-circle"></i>Esta Registro viene desde una Despacho de Materia prima.<br> <b> Numero Despacho: <?php echo $NUMERODESPACHOMP;?> </b> </p>   
                                                    <?php }?>  
                                                </div>
                                            </div>
                                        <?php } ?>                                          
                                        <?php if ($TDESPACHO == "4") { ?>
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-9 col-9 col-xs-9">
                                            </div>
                                        <?php } ?>                      
                                        <?php if ($TDESPACHO == "5") { ?>                                                
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-9 col-9 col-xs-9"> 
                                                <div class="form-group">        
                                                    <?php  if($ARRAYDESPACHOMP){?>
                                                        <p class="text-muted"><i class="fas fa-info-circle"></i>Esta Registro viene desde una Despacho de Materia prima.<br> <b> Numero Despacho: <?php echo $NUMERODESPACHOMP;?> </b> </p>   
                                                    <?php }?>  
                                                </div>
                                            </div>
                                        <?php } ?>                                                                
                                        <?php if ($TDESPACHO == "6") { ?>                                                
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-9 col-9 col-xs-9"> 
                                                <div class="form-group">        
                                                    <?php  if($ARRAYDESPACHOMP){?>
                                                        <p class="text-muted"><i class="fas fa-info-circle"></i>Esta Registro viene desde una Despacho de Materia prima.<br> <b> Numero Despacho: <?php echo $NUMERODESPACHOMP;?> </b> </p>   
                                                    <?php }?>  
                                                </div>
                                            </div>
                                        <?php } ?>                                                                                                        
                                        <?php if ($TDESPACHO == "7") { ?>                                                
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-9 col-9 col-xs-9"> 
                                                <div class="form-group">        
                                                    <?php  if($ARRAYDESPACHOMP){?>
                                                        <p class="text-muted"><i class="fas fa-info-circle"></i>Esta Registro viene desde una Despacho de Materia prima.<br> <b> Numero Despacho: <?php echo $NUMERODESPACHOMP;?> </b> </p>   
                                                    <?php }?>  
                                                </div>
                                            </div>
                                        <?php } ?>                     
                                        <?php if ($TDESPACHO == "8") { ?>
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-9 col-9 col-xs-9">
                                            </div>
                                        <?php } ?>
                                        <?php if ($TDESPACHO == "") { ?>
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-9 col-9 col-xs-9">
                                            </div>
                                        <?php } ?>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha Ingreso</label>
                                                <input type="hidden" class="form-control" placeholder="FECHA INGRESO" id="FECHAINGRESODESPACHOE" name="FECHAINGRESODESPACHOE" value="<?php echo $FECHAINGRESODESPACHO; ?>" />
                                                <input type="date" class="form-control" style="background-color: #eeeeee;" placeholder="Fecha Ingreso" id="FECHAINGRESODESPACHO" name="FECHAINGRESODESPACHO" value="<?php echo $FECHAINGRESODESPACHO; ?>" disabled />
                                                <label id="val_fechai" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha Modificación</label>
                                                <input type="hidden" class="form-control" placeholder="FECHA MODIFICACION" id="FECHAMODIFCIACIONDESPACHOE" name="FECHAMODIFCIACIONDESPACHOE" value="<?php echo $FECHAMODIFCIACIONDESPACHO; ?>" />
                                                <input type="date" class="form-control" style="background-color: #eeeeee;" placeholder="Fecha Modificación" id="FECHAMODIFCIACIONDESPACHO" name="FECHAMODIFCIACIONDESPACHO" value="<?php echo $FECHAMODIFCIACIONDESPACHO; ?>" disabled />
                                                <label id="val_fecham" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha Despacho </label>
                                                <input type="hidden" class="Despachoform-control" placeholder="Fecha Despacho" id="FECHADESPACHOE" name="FECHADESPACHOE" value="<?php echo $FECHADESPACHO; ?>" />
                                                <input type="date" class="form-control" placeholder="Fecha Despacho" id="FECHADESPACHO" name="FECHADESPACHO" value="<?php echo $FECHADESPACHO; ?>" <?php echo $DISABLED2; ?>  />
                                                <label id="val_fecha" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-9 col-9 col-xs-9">
                                            <div class="form-group">
                                                <label>Tipo Documento</label>
                                                <input type="hidden" class="form-control" placeholder="Transportita" id="TDOCUMENTOE" name="TDOCUMENTOE" value="<?php echo $TDOCUMENTO; ?>" />
                                                <select class="form-control select2" id="TDOCUMENTO" name="TDOCUMENTO" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYTDOCUMENTO as $r) : ?>
                                                        <?php if ($ARRAYTDOCUMENTO) {    ?>
                                                            <option value="<?php echo $r['ID_TDOCUMENTO']; ?>" <?php if ($TDOCUMENTO == $r['ID_TDOCUMENTO']) {
                                                                                                                    echo "selected";
                                                                                                                } ?>> <?php echo $r['NOMBRE_TDOCUMENTO'] ?> </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_tdocumento" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Número Documento </label>
                                                <input type="hidden" class="form-control" placeholder="Numero Documento" id="NUMERODOCUMENTOE" name="NUMERODOCUMENTOE" value="<?php echo $NUMERODOCUMENTO; ?>" />
                                                <input type="text" class="form-control" placeholder="Número Documento" id="NUMERODOCUMENTO" name="NUMERODOCUMENTO" value="<?php echo $NUMERODOCUMENTO; ?>" <?php echo $DISABLED2; ?>  />
                                                <label id="val_numerodocumento" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-9 col-9 col-xs-9">
                                            <div class="form-group">
                                                <label>Transporte</label>
                                                <input type="hidden" class="form-control" placeholder="Transportita" id="TRANSPORTEE" name="TRANSPORTEE" value="<?php echo $TRANSPORTE; ?>" />
                                                <select class="form-control select2" id="TRANSPORTE" name="TRANSPORTE" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYTRANSPORTITA as $r) : ?>
                                                        <?php if ($ARRAYTRANSPORTITA) {    ?>
                                                            <option value="<?php echo $r['ID_TRANSPORTE']; ?>" <?php if ($TRANSPORTE == $r['ID_TRANSPORTE']) {
                                                                                                                    echo "selected";
                                                                                                                } ?>> <?php echo $r['NOMBRE_TRANSPORTE'] ?> </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_transportita" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-1 col-xl-1 col-lg-2 col-md-2 col-sm-3 col-3 col-xs-3">
                                            <div class="form-group">
                                                <br>
                                                <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Transporte" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopTransporte.php' ); ">
                                                    <i class="glyphicon glyphicon-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-9 col-9 col-xs-9">
                                            <div class="form-group">
                                                <label>Conductor</label>
                                                <input type="hidden" class="form-control" placeholder="Conductor" id="CONDUCTORE" name="CONDUCTORE" value="<?php echo $CONDUCTOR; ?>" />
                                                <select class="form-control select2" id="CONDUCTOR" name="CONDUCTOR" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYCONDUCTOR as $r) : ?>
                                                        <?php if ($ARRAYCONDUCTOR) {    ?>
                                                            <option value="<?php echo $r['ID_CONDUCTOR']; ?>" <?php if ($CONDUCTOR == $r['ID_CONDUCTOR']) {
                                                                                                                    echo "selected";
                                                                                                                } ?>> <?php echo $r['NOMBRE_CONDUCTOR'] ?> </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_conductor" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-1 col-xl-1 col-lg-2 col-md-2 col-sm-3 col-3 col-xs-3">
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
                                                <input type="hidden" class="form-control" placeholder="Patente Camión" id="PATENTECAMIONE" name="PATENTECAMIONE" value="<?php echo $PATENTECAMION; ?>" />
                                                <input type="text" class="form-control" placeholder="Patente Camión" id="PATENTECAMION" name="PATENTECAMION" value="<?php echo $PATENTECAMION; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> />
                                                <label id="val_patentecamion" class="validacion"> </label>
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
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-9 col-9 col-xs-9">
                                                <div class="form-group">
                                                    <label>Bodega Destino</label>
                                                    <input type="hidden" class="form-control" placeholder="BODEGAE" id="BODEGAE" name="BODEGAE" value="<?php echo $BODEGA; ?>" />
                                                    <select class="form-control select2" id="BODEGA" name="BODEGA" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYBODEGA as $r) : ?>
                                                            <?php if ($ARRAYBODEGA) {    ?>
                                                                <option value="<?php echo $r['ID_BODEGA']; ?>" <?php if ($BODEGA == $r['ID_BODEGA']) {
                                                                                                                    echo "selected";
                                                                                                                } ?>> <?php echo $r['NOMBRE_BODEGA'] ?> </option>
                                                            <?php } else { ?>
                                                                <option>No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_bodega" class="validacion"> </label>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if ($TDESPACHO == "2") { ?>
                                        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-9 col-9 col-xs-9">
                                                <div class="form-group">
                                                    <label>Planta Destino</label>
                                                    <input type="hidden" class="form-control" placeholder="PLANTA2E" id="PLANTA2E" name="PLANTA2E" value="<?php echo $PLANTA2; ?>" />
                                                    <select class="form-control select2" id="PLANTA2" name="PLANTA2" onchange="this.form.submit()" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYPLANTADESTINO as $r) : ?>
                                                            <?php if ($ARRAYPLANTADESTINO) {    ?>
                                                                <option value="<?php echo $r['ID_PLANTA']; ?>" <?php if ($PLANTA2 == $r['ID_PLANTA']) {
                                                                                                                    echo "selected";
                                                                                                                } ?>> <?php echo $r['NOMBRE_PLANTA'] ?> </option>
                                                            <?php } else { ?>
                                                                <option>No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_plantad" class="validacion"> </label>
                                                </div>
                                            </div>
                                        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-9 col-9 col-xs-9">
                                                <div class="form-group">
                                                    <label>Bodega Destino</label>
                                                    <input type="hidden" class="form-control" placeholder="BODEGADE" id="BODEGADE" name="BODEGADE" value="<?php echo $BODEGAD; ?>" />
                                                    <select class="form-control select2" id="BODEGAD" name="BODEGAD" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                        <option value="0"></option>
                                                        <?php foreach ($ARRAYBODEGA2 as $r) : ?>
                                                            <?php if ($ARRAYBODEGA2) {    ?>
                                                                <option value="<?php echo $r['ID_BODEGA']; ?>" <?php if ($BODEGAD == $r['ID_BODEGA']) {
                                                                                                                    echo "selected";
                                                                                                                } ?>> <?php echo $r['NOMBRE_BODEGA'] ?> </option>
                                                            <?php } else { ?>
                                                                <option>No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_bodegad" class="validacion"> </label>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if ($TDESPACHO == "3") { ?>
                                           <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-9 col-9 col-xs-9">
                                                <div class="form-group">
                                                    <label>Productor</label>
                                                    <input type="hidden" class="form-control" placeholder="PRODUCTORE" id="PRODUCTORE" name="PRODUCTORE" value="<?php echo $PRODUCTOR; ?>" />
                                                    <select class="form-control select2" id="PRODUCTOR" name="PRODUCTOR" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYPRODUCTOR as $r) : ?>
                                                            <?php if ($ARRAYPRODUCTOR) {    ?>
                                                                <option value="<?php echo $r['ID_PRODUCTOR']; ?>" <?php if ($PRODUCTOR == $r['ID_PRODUCTOR']) {
                                                                                                                        echo "selected";
                                                                                                                    } ?>><?php echo $r['CSG_PRODUCTOR'] ?> : <?php echo $r['NOMBRE_PRODUCTOR'] ?> </option>
                                                            <?php } else { ?>
                                                                <option>No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_productor" class="validacion"> </label>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if ($TDESPACHO == "4") { ?>
                                             <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-9 col-9 col-xs-9">
                                                <div class="form-group">
                                                    <label>Proveedor</label>
                                                    <input type="hidden" class="form-control" placeholder="PROVEEDORE" id="PROVEEDORE" name="PROVEEDORE" value="<?php echo $PROVEEDOR; ?>" />
                                                    <select class="form-control select2" id="PROVEEDOR" name="PROVEEDOR" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYPROVEEDOR as $r) : ?>
                                                            <?php if ($ARRAYPROVEEDOR) {    ?>
                                                                <option value="<?php echo $r['ID_PROVEEDOR']; ?>" <?php if ($PROVEEDOR == $r['ID_PROVEEDOR']) {
                                                                                                                        echo "selected";
                                                                                                                    } ?>> <?php echo $r['NOMBRE_PROVEEDOR'] ?> </option>
                                                            <?php } else { ?>
                                                                <option>No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_proveedor" class="validacion"> </label>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if ($TDESPACHO == "5") { ?>
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-9 col-9 col-xs-9">
                                                <div class="form-group">
                                                    <label>Comprador</label>
                                                    <input type="hidden" class="form-control" placeholder="COMPRADORE" id="COMPRADORE" name="COMPRADORE" value="<?php echo $COMPRADOR; ?>" />
                                                    <select class="form-control select2" id="COMPRADOR" name="COMPRADOR" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYCOMPRADOR as $r) : ?>
                                                            <?php if ($ARRAYCOMPRADOR) {    ?>
                                                                <option value="<?php echo $r['ID_COMPRADOR']; ?>" <?php if ($COMPRADOR == $r['ID_COMPRADOR']) {
                                                                                                                    echo "selected";
                                                                                                                } ?>> <?php echo $r['NOMBRE_COMPRADOR'] ?> </option>
                                                            <?php } else { ?>
                                                                <option>No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_cliente" class="validacion"> </label>
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
                                        <?php if ($TDESPACHO == "6") { ?>
                                             <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-9 col-9 col-xs-9">
                                                <div class="form-group">
                                                    <label>Regalo</label>
                                                    <input type="hidden" class="form-control" placeholder="REGALOE" id="REGALOE" name="REGALOE" value="<?php echo $REGALO; ?>" />
                                                    <textarea class="form-control" rows="1" placeholder="Ingrese Para Quien o Quienes" id="REGALO" name="REGALO" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>><?php echo $REGALO; ?></textarea>
                                                    <label id="val_regalo" class="validacion"> </label>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if ($TDESPACHO == "7") { ?>
                                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-9 col-9 col-xs-9">
                                                <div class="form-group">
                                                    <label>Planta Externa</label>
                                                    <input type="hidden" class="form-control" placeholder="PLANTA3E" id="PLANTA3E" name="PLANTA3E" value="<?php echo $PLANTA3; ?>" />
                                                    <select class="form-control select2" id="PLANTA3" name="PLANTA3" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYPLANTAEXTERNA as $r) : ?>
                                                            <?php if ($ARRAYPLANTAEXTERNA) {    ?>
                                                                <option value="<?php echo $r['ID_PLANTA']; ?>" <?php if ($PLANTA3 == $r['ID_PLANTA']) {
                                                                                                                    echo "selected";
                                                                                                                } ?>> <?php echo $r['NOMBRE_PLANTA'] ?> </option>
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
                                        <?php if ($TDESPACHO == "8") { ?>
                                              <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-9 col-9 col-xs-9">
                                                <div class="form-group">
                                                    <label>Productor</label>
                                                    <input type="hidden" class="form-control" placeholder="PRODUCTORE" id="PRODUCTORE" name="PRODUCTORE" value="<?php echo $PRODUCTOR; ?>" />
                                                    <select class="form-control select2" id="PRODUCTOR" name="PRODUCTOR" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYPRODUCTOR as $r) : ?>
                                                            <?php if ($ARRAYPRODUCTOR) {    ?>
                                                                <option value="<?php echo $r['ID_PRODUCTOR']; ?>" <?php if ($PRODUCTOR == $r['ID_PRODUCTOR']) {
                                                                                                                        echo "selected";
                                                                                                                    } ?>><?php echo $r['CSG_PRODUCTOR'] ?> : <?php echo $r['NOMBRE_PRODUCTOR'] ?> </option>
                                                            <?php } else { ?>
                                                                <option>No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_productor" class="validacion"> </label>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Observaciónes </label>
                                                <input type="hidden" class="form-control" placeholder="OBSERVACIONE" id="OBSERVACIONE" name="OBSERVACIONE" value="<?php echo $OBSERVACION; ?>" />
                                                <textarea class="form-control" rows="1" placeholder="Ingrese Nota, Observaciónes u Otro" id="OBSERVACION" name="OBSERVACION" <?php echo $DISABLED2; ?> ><?php echo $OBSERVACION; ?></textarea>
                                                <label id="val_observacion" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            <label id="val_dproceso" class="validacion "><?php echo $MENSAJE; ?> </label>
                                <!-- /.row -->
                                <!-- /.box-body -->                                
                                <div class="box-footer">
                                    <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="toolbar">
                                        <div class="btn-group  col-xxl-4 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12" role="group" aria-label="Acciones generales">
                                            <?php if ($OP == "") { ?>
                                                <button type="button" class="btn btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroDespachoe.php');">
                                                    <i class="ti-trash"></i> Cancelar
                                                </button>
                                                <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Guardar" name="CREAR" value="CREAR"  <?php echo $DISABLEENVASE; ?>    onclick="return validacion()">
                                                    <i class="ti-save-alt"></i> Guardar
                                                </button>
                                            <?php } ?>
                                            <?php if ($OP != "") { ?>
                                                <button type="button" class="btn  btn-success " data-toggle="tooltip" title="Volver" name="VOLVER" value="VOLVER" Onclick="irPagina('listarDespachoe.php'); ">
                                                    <i class="ti-back-left "></i> Volver
                                                </button>
                                                <button type="submit" class="btn btn-warning " data-toggle="tooltip" title="Guardar" name="GUARDAR" value="GUARDAR"  <?php echo $DISABLED2; ?> <?php echo $DISABLEENVASE; ?>    onclick="return validacion()">
                                                    <i class="ti-pencil-alt"></i> Guardar
                                                </button>
                                                <button type="submit" class="btn btn-danger " data-toggle="tooltip" title="Cerrar" name="CERRAR" value="CERRAR"  <?php echo $DISABLED2; ?> <?php echo $DISABLEENVASE; ?>    onclick="return validacion()">
                                                    <i class="ti-save-alt"></i> Cerrar
                                                </button>
                                            <?php } ?>
                                        </div>
                                        <div class="btn-group  col-xxl-4 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12  float-right">
                                            <?php if ($OP != ""): ?>
                                                <button type="button" class="btn btn-info  " data-toggle="tooltip" title="Informe" id="defecto" name="tarjas" <?php echo $DISABLEENVASE; ?>   Onclick="abrirPestana('../../assest/documento/informeDespachoE.php?parametro=<?php echo $IDOP; ?>&&usuario=<?php echo $IDUSUARIOS; ?>');">
                                                    <i class="fa fa-file-pdf-o"></i> Informe
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
                                    <h4 class="card-title">Detalle de Despacho de Envases </h4>
                                </div>
                                <div class="card-header">
                                    <div class="form-row align-items-center">
                                        <form method="post" id="form1">
                                            <div class="col-auto">
                                                <input type="hidden" class="form-control" placeholder="ID DESPACHO" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="OP DESPACHO" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="URL DESPACHO" id="URLP" name="URLP" value="registroDespachoe" />
                                                <input type="hidden" class="form-control" placeholder="URL SELECCIONAR" id="URLD" name="URLD" value="registroDdespachoe" />
                                                <button type="submit" class="btn btn-success btn-block mb-2" data-toggle="tooltip" title="Seleccion Existencia" id="SELECIONOCDURL" name="SELECIONOCDURL"
                                                <?php echo $DISABLED2; ?>  <?php  if ($ESTADO == 0) {  echo "disabled style='background-color: #eeeeee;'";  }   ?>  
                                                <?php echo $DISABLEENVASE; ?>  >
                                                    Agregar Detalle
                                                </button>
                                            </div>
                                        </form>   
                                        <div class="col-auto">
                                            <label class="sr-only" for=""></label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Total Cantidad</div>
                                                </div>
                                                <input type="hidden" class="form-control" id="TOTALCANTIDAD" name="TOTALCANTIDAD" value="<?php echo $TOTALCANTIDAD; ?>" />
                                                <input type="text" class="form-control" placeholder="Total Cantidad" id="TOTALCANTIDADV" name="TOTALCANTIDADV" value="<?php echo $TOTALCANTIDADV; ?>" disabled />
                                            </div>
                                        </div>                    
                                    </div>
                                </div>  
                                <div class="card-body">
                                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                        <div class="table-responsive">
                                            <table id="detalle" class="table-hover " style="width: 100%;">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th class="text-center">Operaciónes</th>
                                                        <th>Código Producto </th>
                                                        <th>Producto </th>
                                                        <th>Unidad Medida</th>
                                                        <th>Cantidad</th>
                                                        <th>Bodega</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if ($ARRAYTOMADO) { ?>
                                                        <?php foreach ($ARRAYTOMADO as $r) : ?>
                                                            <?php
                                                            $CONTADOR = $CONTADOR + 1;
                                                            $ARRAYVERBODEGA = $BODEGA_ADO->verBodega($r['ID_BODEGA']);
                                                            if ($ARRAYVERBODEGA) {
                                                                $NOMBREBODEGA = $ARRAYVERBODEGA[0]['NOMBRE_BODEGA'];
                                                            } else {
                                                                $NOMBREBODEGA = "Sin Datos";
                                                            }
                                                            $ARRAYVERPRODUCTO = $PRODUCTO_ADO->verProducto($r['ID_PRODUCTO']);
                                                            if ($ARRAYVERPRODUCTO) {
                                                                $CODIGOPRODUCTO = $ARRAYVERPRODUCTO[0]['CODIGO_PRODUCTO'];
                                                                $NOMBREPRODUCTO = $ARRAYVERPRODUCTO[0]['NOMBRE_PRODUCTO'];
                                                            } else {
                                                                $CODIGOPRODUCTO = "Sin Datos";
                                                                $NOMBREPRODUCTO = "Sin Datos";
                                                            }
                                                            $ARRAYVERTUMEDIDA = $TUMEDIDA_ADO->verTumedida($r['ID_TUMEDIDA']);
                                                            if ($ARRAYVERTUMEDIDA) {
                                                                $NOMBRETUMEDIDA = $ARRAYVERTUMEDIDA[0]['NOMBRE_TUMEDIDA'];
                                                            } else {
                                                                $NOMBRETUMEDIDA = "Sin Datos";
                                                            }
                                                            ?>
                                                            <tr class="text-center">
                                                                <td class="text-center">
                                                                    <form method="post" id="form1" name="form1">
                                                                        <input type="hidden" class="form-control" placeholder="ID INVENTARIOE" id="IDD" name="IDD" value="<?php echo $r['ID_INVENTARIO']; ?>" />
                                                                        <input type="hidden" class="form-control" placeholder="ID DESPACHO" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                                                        <input type="hidden" class="form-control" placeholder="OP DESPACHO" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                                                        <input type="hidden" class="form-control" placeholder="URL DESPACHO" id="URLP" name="URLP" value="registroDespachoe" />
                                                                        <input type="hidden" class="form-control" placeholder="URL INVENTARIOE" id="URLD" name="URLD" value="registroDdespachoe" />
                                                                        <div class="btn-group btn-rounded btn-block" role="group" aria-label="Operaciones Detalle">
                                                                            <?php if ($ESTADO  == "0") { ?>
                                                                                <button type="submit" class="btn btn-info btn-sm" data-toggle="tooltip" id="VERDURL" name="VERDURL" title="Ver">
                                                                                    <i class="ti-eye"></i><br> Ver
                                                                                </button>
                                                                            <?php } ?>
                                                                            <?php if ($ESTADO  == "1") { ?>
                                                                                <button type="submit" class="btn btn-warning  btn-sm " data-toggle="tooltip" id="EDITARDURL" name="EDITARDURL" title="Editar" <?php echo $DISABLED2; ?>>
                                                                                    <i class="ti-pencil-alt"></i><br> Editar
                                                                                </button>
                                                                                <button type="submit" class="btn btn-secondary  btn-sm" data-toggle="tooltip" id="DUPLICARDURL" name="DUPLICARDURL" title="Duplicar" <?php echo $DISABLED2; ?>>
                                                                                    <i class="fa fa-fw fa-copy"></i><br> Duplicar
                                                                                </button>
                                                                                <button type="submit" class="btn btn-danger btn-sm " data-toggle="tooltip" id="ELIMINARDURL" name="ELIMINARDURL" title="Eliminar" <?php echo $DISABLED2; ?>>
                                                                                    <i class="ti-close"></i><br> Eliminar
                                                                                </button>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </form>
                                                                </td>
                                                                <td><?php echo $CODIGOPRODUCTO; ?></td>
                                                                <td><?php echo $NOMBREPRODUCTO; ?></td>
                                                                <td><?php echo $NOMBRETUMEDIDA; ?></td>
                                                                <td><?php echo $r['CANTIDAD']; ?></td>
                                                                <td><?php echo $NOMBREBODEGA; ?></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
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
            //OPERACIONES
            //OPERACION DE REGISTRO DE FILA
            if (isset($_REQUEST['CREAR'])) {

                $ARRAYNUMERO = $DESPACHOE_ADO->obtenerNumero($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
                $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;
                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO       
                $DESPACHOE->__SET('NUMERO_DESPACHO', $NUMERO);
                $DESPACHOE->__SET('FECHA_DESPACHO', $_REQUEST['FECHADESPACHO']);
                $DESPACHOE->__SET('NUMERO_DOCUMENTO', $_REQUEST['NUMERODOCUMENTO']);
                $DESPACHOE->__SET('PATENTE_CAMION', $_REQUEST['PATENTECAMION']);
                $DESPACHOE->__SET('PATENTE_CARRO', $_REQUEST['PATENTECARRO']);
                $DESPACHOE->__SET('TDESPACHO', $_REQUEST['TDESPACHO']);
                $DESPACHOE->__SET('OBSERVACIONES', $_REQUEST['OBSERVACION']);
                $DESPACHOE->__SET('ID_TDOCUMENTO', $_REQUEST['TDOCUMENTO']);
                $DESPACHOE->__SET('ID_TRANSPORTE', $_REQUEST['TRANSPORTE']);
                $DESPACHOE->__SET('ID_CONDUCTOR', $_REQUEST['CONDUCTOR']);
                if ($_REQUEST['TDESPACHO'] == "1") {
                    $DESPACHOE->__SET('ID_BODEGA', $_REQUEST['BODEGA']);
                }
                if ($_REQUEST['TDESPACHO'] == "2") {
                    $DESPACHOE->__SET('ID_PLANTA2', $_REQUEST['PLANTA2']);
                    $DESPACHOE->__SET('ID_BODEGA2', $_REQUEST['BODEGAD']);
                }
                if ($_REQUEST['TDESPACHO'] == "3") {
                    $DESPACHOE->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
                }
                if ($_REQUEST['TDESPACHO'] == "4") {
                    $DESPACHOE->__SET('ID_PROVEEDOR', $_REQUEST['PROVEEDOR']);
                }    
                if ($_REQUEST['TDESPACHO'] == "5") {
                    $DESPACHOE->__SET('ID_COMPRADOR', $_REQUEST['COMPRADOR']);
                }
                if ($_REQUEST['TDESPACHO'] == "6") {
                    $DESPACHOE->__SET('REGALO_DESPACHO', $_REQUEST['REGALO']);
                }
                if ($_REQUEST['TDESPACHO'] == "7") {
                    $DESPACHOE->__SET('ID_PLANTA3', $_REQUEST['PLANTA3']);
                }
                if ($_REQUEST['TDESPACHO'] == "8") {
                    $DESPACHOE->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
                }
                $DESPACHOE->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                $DESPACHOE->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
                $DESPACHOE->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
                $DESPACHOE->__SET('ID_USUARIOI', $IDUSUARIOS);
                $DESPACHOE->__SET('ID_USUARIOM', $IDUSUARIOS);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $DESPACHOE_ADO->agregarDespachoe($DESPACHOE);


                //OBTENER EL ID DE LA DESPACHOE CREADA PARA LUEGO ENVIAR EL INGRESO DEL DETALLE
                $ARRYAOBTENERID = $DESPACHOE_ADO->obtenerId(
                    $_REQUEST['FECHADESPACHO'],
                    $_REQUEST['EMPRESA'],
                    $_REQUEST['PLANTA'],
                    $_REQUEST['TEMPORADA'],
                );
                
                $AUSUARIO_ADO->agregarAusuario2($NUMERO,1,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Despacho Envases.","material_despachoe", $ARRYAOBTENERID[0]['ID_DESPACHO'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

                //REDIRECCIONAR A PAGINA registroDESPACHOE.php

                $id_dato = $ARRYAOBTENERID[0]['ID_DESPACHO'];
                $accion_dato = "crear";
                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Creado",
                        text:"El registro de despacho se ha creado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                            location.href = "registroDespachoe.php?op&id='.$id_dato.'&a='.$accion_dato.'";
                        
                    })
                </script>';
            }
            if (isset($_REQUEST['GUARDAR'])) {
                $DESPACHOE->__SET('FECHA_DESPACHO', $_REQUEST['FECHADESPACHO']);
                $DESPACHOE->__SET('NUMERO_DOCUMENTO', $_REQUEST['NUMERODOCUMENTO']);
                $DESPACHOE->__SET('PATENTE_CAMION', $_REQUEST['PATENTECAMIONE']);
                $DESPACHOE->__SET('PATENTE_CARRO', $_REQUEST['PATENTECARROE']);
                $DESPACHOE->__SET('TDESPACHO', $_REQUEST['TDESPACHOE']);
                $DESPACHOE->__SET('OBSERVACIONES', $_REQUEST['OBSERVACION']);
                $DESPACHOE->__SET('ID_TDOCUMENTO', $_REQUEST['TDOCUMENTOE']);
                $DESPACHOE->__SET('ID_TRANSPORTE', $_REQUEST['TRANSPORTEE']);
                $DESPACHOE->__SET('ID_CONDUCTOR', $_REQUEST['CONDUCTORE']);
                if ($_REQUEST['TDESPACHOE'] == "1") {
                    $DESPACHOE->__SET('ID_BODEGA', $_REQUEST['BODEGAE']);
                }
                if ($_REQUEST['TDESPACHOE'] == "2") {
                    $DESPACHOE->__SET('ID_PLANTA2', $_REQUEST['PLANTA2E']);
                    $DESPACHOE->__SET('ID_BODEGA2', $_REQUEST['BODEGADE']);
                }
                if ($_REQUEST['TDESPACHOE'] == "3") {
                    $DESPACHOE->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTORE']);
                }
                if ($_REQUEST['TDESPACHOE'] == "4") {
                    $DESPACHOE->__SET('ID_PROVEEDOR', $_REQUEST['PROVEEDORE']);
                }
                if ($_REQUEST['TDESPACHOE'] == "5") {
                    $DESPACHOE->__SET('ID_COMPRADOR', $_REQUEST['COMPRADORE']);
                }
                if ($_REQUEST['TDESPACHOE'] == "6") {
                    $DESPACHOE->__SET('REGALO_DESPACHO', $_REQUEST['REGALOE']);
                }
                if ($_REQUEST['TDESPACHOE'] == "7") {
                    $DESPACHOE->__SET('ID_PLANTA3', $_REQUEST['PLANTA3E']);
                }
                if ($_REQUEST['TDESPACHOE'] == "8") {
                    $DESPACHOE->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTORE']);
                }
                $DESPACHOE->__SET('CANTIDAD_DESPACHO', $_REQUEST['TOTALCANTIDAD']);
                $DESPACHOE->__SET('ID_USUARIOM', $IDUSUARIOS);
                $DESPACHOE->__SET('ID_DESPACHO', $_REQUEST['IDP']);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $DESPACHOE_ADO->actualizarDespachoe($DESPACHOE);

                $AUSUARIO_ADO->agregarAusuario2($NUMEROVER,1,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de Despacho Envases.","material_despachoe", $_REQUEST['IDP'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  
                
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
                            location.href = "registroDespachoe.php?op&id='.$id_dato.'&a='.$accion_dato.'";                        
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
                            location.href = "registroDespachoe.php?op&id='.$id_dato.'&a='.$accion_dato.'";                        
                        })
                    </script>';
                }
            }
            //OPERACION PARA CERRAR LA DESPACHOE
            if (isset($_REQUEST['CERRAR'])) {
                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   

                $ARRAYDDESPACHOE2 = $INVENTARIOE_ADO->buscarPorDespacho($_REQUEST['IDP']);
                if (empty($ARRAYDDESPACHOE2)) {
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
                    $SINO = "1";
                } else {
                    $MENSAJE = "";
                    $SINO = "0";
                }
                if ($SINO == "0") {
                    $DESPACHOE->__SET('CANTIDAD_DESPACHO', $_REQUEST['TOTALCANTIDAD']);
                    $DESPACHOE->__SET('FECHA_DESPACHO', $_REQUEST['FECHADESPACHO']);
                    $DESPACHOE->__SET('NUMERO_DOCUMENTO', $_REQUEST['NUMERODOCUMENTO']);
                    $DESPACHOE->__SET('PATENTE_CAMION', $_REQUEST['PATENTECAMIONE']);
                    $DESPACHOE->__SET('PATENTE_CARRO', $_REQUEST['PATENTECARROE']);
                    $DESPACHOE->__SET('TDESPACHO', $_REQUEST['TDESPACHOE']);
                    $DESPACHOE->__SET('OBSERVACIONES', $_REQUEST['OBSERVACION']);
                    $DESPACHOE->__SET('ID_TDOCUMENTO', $_REQUEST['TDOCUMENTOE']);
                    $DESPACHOE->__SET('ID_TRANSPORTE', $_REQUEST['TRANSPORTEE']);
                    $DESPACHOE->__SET('ID_CONDUCTOR', $_REQUEST['CONDUCTORE']);
                    if ($_REQUEST['TDESPACHOE'] == "1") {
                        $DESPACHOE->__SET('ID_BODEGA', $_REQUEST['BODEGAE']);
                    }
                    if ($_REQUEST['TDESPACHOE'] == "2") {
                        $DESPACHOE->__SET('ID_PLANTA2', $_REQUEST['PLANTA2E']);
                        $DESPACHOE->__SET('ID_BODEGA2', $_REQUEST['BODEGADE']);
                    }
                    if ($_REQUEST['TDESPACHOE'] == "3") {
                        $DESPACHOE->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTORE']);
                    }
                    if ($_REQUEST['TDESPACHOE'] == "4") {
                        $DESPACHOE->__SET('ID_PROVEEDOR', $_REQUEST['PROVEEDORE']);
                    }
                    if ($_REQUEST['TDESPACHOE'] == "5") {
                        $DESPACHOE->__SET('ID_COMPRADOR', $_REQUEST['COMPRADORE']);
                    }
                    if ($_REQUEST['TDESPACHOE'] == "6") {
                        $DESPACHOE->__SET('REGALO_DESPACHO', $_REQUEST['REGALOE']);
                    }
                    if ($_REQUEST['TDESPACHOE'] == "7") {
                        $DESPACHOE->__SET('ID_PLANTA3', $_REQUEST['PLANTA3E']);
                    }
                    if ($_REQUEST['TDESPACHOE'] == "8") {
                        $DESPACHOE->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTORE']);
                    }
                    $DESPACHOE->__SET('ID_USUARIOM', $IDUSUARIOS);
                    $DESPACHOE->__SET('ID_DESPACHO', $_REQUEST['IDP']);
                    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                    $DESPACHOE_ADO->actualizarDespachoe($DESPACHOE);

                    $DESPACHOE->__SET('ID_DESPACHO', $_REQUEST['IDP']);
                    //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                    $DESPACHOE_ADO->cerrado($DESPACHOE);

                    $DESPACHOE->__SET('ID_DESPACHO', $_REQUEST['IDP']);
                    //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                    $DESPACHOE_ADO->Confirmado($DESPACHOE);

                    if ($_REQUEST['TDESPACHOE'] == "1") {
                        $ARRAYEXISENCIADESPACHOM = $INVENTARIOE_ADO->buscarPorEnDespacho($_REQUEST['IDP']);
                        foreach ($ARRAYEXISENCIADESPACHOM as $r) :
                            $ARRAYVALIDARINGRESO = $INVENTARIOE_ADO->buscarPorDespachoIngresoBodega($_REQUEST['IDP'], $r['INGRESO'], $r['ID_BODEGA']);
                            if (empty($ARRAYVALIDARINGRESO)) {
                                $INVENTARIOE->__SET('INGRESO', $r['INGRESO']);
                                $INVENTARIOE->__SET('CANTIDAD_ENTRADA', $r['CANTIDAD_SALIDA']);
                                $INVENTARIOE->__SET('ID_BODEGA2',  $r['ID_BODEGA']);
                                $INVENTARIOE->__SET('ID_PRODUCTO', $r['ID_PRODUCTO']);
                                $INVENTARIOE->__SET('ID_TUMEDIDA', $r['ID_TUMEDIDA']);
                                $INVENTARIOE->__SET('ID_EMPRESA', $r['ID_EMPRESA']);
                                $INVENTARIOE->__SET('ID_PLANTA', $r['ID_PLANTA']);
                                $INVENTARIOE->__SET('ID_TEMPORADA', $r['ID_TEMPORADA']);
                                $INVENTARIOE->__SET('ID_BODEGA',  $_REQUEST['BODEGAE']);
                                $INVENTARIOE->__SET('ID_DESPACHO', $_REQUEST['IDP']);
                                $INVENTARIOE_ADO->agregarInventarioBodega($INVENTARIOE);
                            } else {
                                $INVENTARIOE->__SET('INGRESO', $r['INGRESO']);
                                $INVENTARIOE->__SET('CANTIDAD_ENTRADA', $r['CANTIDAD_SALIDA']);
                                $INVENTARIOE->__SET('ID_BODEGA2',  $r['ID_BODEGA']);
                                $INVENTARIOE->__SET('ID_PRODUCTO', $r['ID_PRODUCTO']);
                                $INVENTARIOE->__SET('ID_TUMEDIDA', $r['ID_TUMEDIDA']);
                                $INVENTARIOE->__SET('ID_EMPRESA', $r['ID_EMPRESA']);
                                $INVENTARIOE->__SET('ID_PLANTA', $r['ID_PLANTA']);
                                $INVENTARIOE->__SET('ID_TEMPORADA', $r['ID_TEMPORADA']);
                                $INVENTARIOE->__SET('ID_BODEGA',  $_REQUEST['BODEGAE']);
                                $INVENTARIOE->__SET('ID_DESPACHO', $_REQUEST['IDP']);
                                $INVENTARIOE->__SET('ID_INVENTARIO', $ARRAYVALIDARINGRESO[0]["ID_INVENTARIO"]);
                                $INVENTARIOE_ADO->actualizarInventarioBodega($INVENTARIOE);
                            }
                        endforeach;
                    }

                    $AUSUARIO_ADO->agregarAusuario2($NUMEROVER,1,3,"".$_SESSION["NOMBRE_USUARIO"].", Cerrar  Despacho Envases.","material_despachoe", $_REQUEST['IDP'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

                    //REDIRECCIONAR A PAGINA registroDespachoe.php 
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
                                location.href = "registroDespachoe.php?op&id='.$id_dato.'&a='.$accion_dato.'";                            
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
                                location.href = "registroDespachoe.php?op&id='.$id_dato.'&a='.$accion_dato.'";                            
                            })
                        </script>';
                    }                
                }
            }
        ?>
</body>

</html>