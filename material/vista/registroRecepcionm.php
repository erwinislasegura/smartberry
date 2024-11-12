<?php

include_once "../../assest/config/validarUsuarioMaterial.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/TDOCUMENTO_ADO.php';
include_once '../../assest/controlador/BODEGA_ADO.php';
include_once '../../assest/controlador/TRANSPORTE_ADO.php';
include_once '../../assest/controlador/CONDUCTOR_ADO.php';
include_once '../../assest/controlador/PROVEEDOR_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/FOLIOM_ADO.php';


include_once '../../assest/controlador/PRODUCTO_ADO.php';
include_once '../../assest/controlador/TUMEDIDA_ADO.php';
include_once '../../assest/controlador/TCONTENEDOR_ADO.php';

include_once '../../assest/controlador/OCOMPRA_ADO.php';
include_once '../../assest/controlador/DOCOMPRA_ADO.php';

include_once '../../assest/controlador/INVENTARIOM_ADO.php';
include_once '../../assest/controlador/RECEPCIONM_ADO.php';
include_once '../../assest/controlador/DRECEPCIONM_ADO.php';
include_once '../../assest/controlador/TARJAM_ADO.php';


include_once '../../assest/modelo/INVENTARIOM.php';
include_once '../../assest/modelo/RECEPCIONM.php';
include_once '../../assest/modelo/DRECEPCIONM.php';
include_once '../../assest/modelo/TARJAM.php';



//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$TDOCUMENTO_ADO =  new TDOCUMENTO_ADO();
$BODEGA_ADO =  new BODEGA_ADO();
$TRANSPORTE_ADO =  new TRANSPORTE_ADO();
$CONDUCTOR_ADO =  new CONDUCTOR_ADO();
$PROVEEDOR_ADO =  new PROVEEDOR_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$FOLIO_ADO =  new FOLIOM_ADO();

$PRODUCTO_ADO =  new PRODUCTO_ADO();
$TUMEDIDA_ADO =  new TUMEDIDA_ADO();
$TCONTENEDOR_ADO =  new TCONTENEDOR_ADO();

$OCOMPRA_ADO =  new OCOMPRA_ADO();
$DOCOMPRA_ADO =  new DOCOMPRA_ADO();

$INVENTARIOM_ADO =  new INVENTARIOM_ADO();
$RECEPCIONM_ADO =  new RECEPCIONM_ADO();
$DRECEPCIONM_ADO =  new DRECEPCIONM_ADO();
$TARJAM_ADO =  new TARJAM_ADO();



//INIICIALIZAR MODELO
$INVENTARIOM =  new INVENTARIOM();
$RECEPCIONM =  new RECEPCIONM();
$DRECEPCIONM =  new DRECEPCIONM();
$TARJAM =  new TARJAM();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$IDRECEPCION = "";
$FECHAINGRESO = "";
$FECHAMODIFCIACION = "";
$FECHARECEPCION = "";
$NUMERODOCUMENTO = "";
$TRECEPCION = "";
$PATENTECAMION = "";
$PATENTECARRO = "";
$RESPONSABLE = "";
$OCOMPRA = "";
$OBSERVACION = "";

$ESTADO = "";

$TDOCUMENTO = "";
$BODEGA = "";
$PROVEEDOR = "";
$PRODUCTOR = "";
$PLANTA2 = "";
$PLANTA3 = "";
$TRANSPORTE = "";
$CONDUCTOR = "";
$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";
$SNOCOMPRA = "";
$SNOCOMPRAR = "";

$TOTALCANTIDAD = 0;
$TOTALCANTIDADV = 0;

$TOTALCANTIDADD = 0;
$TOTALCANTIDADDV = 0;
$DIFERENCIA = 0;


$NUMERO = "";
$NUMEROVER = "";
$FOLIONUMERO = "";

$SINO = "";
$IDOP = "";
$OP = "";
$URL = "";

$DISABLED = "";
$DISABLED2 = "";
$DISABLED3 = "";
$DISABLEDSTYLE = "";
$DISABLEDOC = "";

$DISABLEDFOLIO = "";
$MENSAJEFOLIO = "";

$MENSAJE = "";
$MENSAJE2 = "";
$MENSAJE3 = "";
$MENSAJEVALIDATO = "";


//INICIALIZAR ARREGLOS
$ARRAYDOCOMPRA2 = "";

$ARRAYDRECEPCION = "";
$ARRAYDRECEPCION2 = "";
$ARRAYDRECEPCIONTOTALES = "";
$ARRAYDRECEPCIONTOTALES2 = "";

$ARRAYDRECEPCIONNODOCOMPRA = "";
$ARRAYDRECEPCIONSIDOCOMPRA = "";
$ARRAYDRECEPCIONTOTAL = "";
$ARRAYDRECEPCIONTOTAL2 = "";
$ARRAYTARJATOTAL = "";
$ARRAYTARJATOTAL2 = "";

$ARRAYBODEGA = "";
$ARRAYTDOCUMENTO = "";
$ARRAYRESPONSABLE = "";
$ARRAYRESPONSABLEUSUARIO = "";
$ARRAYTRANSPORTE = "";
$ARRAYCONDUCTOR = "";
$ARRAYPROVEEDOR = "";
$ARRAYOCOMPRA = "";
$ARRAYPRODUCTOR = "";
$ARRAYPLANTA3 = "";
$ARRAYPLANTA3 = "";

$ARRAYTCONTENEDOR = "";
$ARRAYTUMEDIDA = "";
$ARRAYPRODUCTO = "";
$ARRAYINVENTARIORECEPCION = "";
$ARRAYVEROCOMPRA = "";
$ARRAYVERDOCOMPRA = "";

$ARRAYFECHAACTUAL = "";
$ARRYAOBTENERID = "";
$ARRAYNUMERO = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYEMPRESA = $EMPRESA_ADO->listarEmpresaCBX();
$ARRAYPLANTA = $PLANTA_ADO->listarPlantaCBX();
$ARRAYTEMPORADA = $TEMPORADA_ADO->listarTemporadaCBX();

$ARRAYBODEGA = $BODEGA_ADO->listarBodegaPorEmpresaPlantaPrincipalCBX($EMPRESAS,$PLANTAS);
$ARRAYTDOCUMENTO = $TDOCUMENTO_ADO->listarTdocumentoPorEmpresaCBX($EMPRESAS);
$ARRAYTRANSPORTE = $TRANSPORTE_ADO->listarTransportePorEmpresaCBX($EMPRESAS);
$ARRAYCONDUCTOR = $CONDUCTOR_ADO->listarConductorPorEmpresaCBX($EMPRESAS);
$ARRAYPROVEEDOR = $PROVEEDOR_ADO->listarProveedorPorEmpresaCBX($EMPRESAS);
$ARRAYOCOMPRA = $OCOMPRA_ADO->listarOcompraPorAprobadoEmpresaTemporadaCBX($EMPRESAS,  $TEMPORADAS);
$ARRAYPRODUCTOR = $PRODUCTOR_ADO->listarProductorPorEmpresaCBX($EMPRESAS);
$ARRAYPLANTA2 = $PLANTA_ADO->listarPlantaExternaCBX();
$ARRAYPLANTA3 = $PLANTA_ADO->listarPlantaPropiaDistintaActualCBX($PLANTAS);




$ARRAYFECHAACTUAL = $RECEPCIONM_ADO->obtenerFecha();
$FECHARECEPCION = $ARRAYFECHAACTUAL[0]['FECHA'];
$FECHAGUIA = $ARRAYFECHAACTUAL[0]['FECHA'];
$HORARECEPCION = $ARRAYFECHAACTUAL[0]['HORA'];
include_once "../../assest/config/validarDatosUrl.php";
include_once "../../assest/config/datosUrlD.php";

//VALIDACION DE FOLIO BASE


$ARRAYFOLIO = $FOLIO_ADO->verFolioPorEmpresaPlantaTemporadaTMateriales($EMPRESAS, $PLANTAS, $TEMPORADAS);
if (empty($ARRAYFOLIO)) {
    $DISABLEDFOLIO = "disabled";
    $MENSAJEFOLIO = " NECESITA <b> CREAR LOS FOLIOS MATERIALES </b> , PARA OCUPAR LA <b>  FUNCIONALIDAD </b>.  FAVOR DE <b> CONTACTARSE CON EL ADMINISTRADOR </b>";
}

//OBTENCION DE DATOS ENVIADOR A LA URL
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
//PARA OPERACIONES DE EDICION , VISUALIZACION Y CREACION
if (isset($id_dato) && isset($accion_dato)) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $id_dato;
    $OP = $accion_dato;

    //FUNCION PARA LA OBTENCION DE LOS TOTALES DEL DETALLE ASOCIADO A RECEPCIONM


    $ARRAYDRECEPCIONNODOCOMPRA = $DRECEPCIONM_ADO->listarDrecepcionPorRecepcionNoDocompra2CBX($IDOP);
    $ARRAYDRECEPCIONSIDOCOMPRA = $DRECEPCIONM_ADO->listarDrecepcionPorRecepcionSiDocompra2CBX($IDOP);
    if ($ARRAYDRECEPCIONSIDOCOMPRA) {
        $DISABLEDOC = "disabled";
    }

    $ARRAYDRECEPCIONTOTAL = $DRECEPCIONM_ADO->obtenerTotalesDrecepcionPorRecepcionCBX($IDOP);
    $ARRAYDRECEPCIONTOTAL2 = $DRECEPCIONM_ADO->obtenerTotalesDrecepcionPorRecepcion2CBX($IDOP);

    $ARRAYTARJATOTAL = $TARJAM_ADO->obtenerTotalTarjaPorRecepcionCBX($IDOP);
    $ARRAYTARJATOTAL2 = $TARJAM_ADO->obtenerTotalTarjaPorRecepcion2CBX($IDOP);



    $TOTALCANTIDADD = $ARRAYDRECEPCIONTOTAL[0]['CANTIDAD'];
    $TOTALCANTIDADDV = $ARRAYDRECEPCIONTOTAL2[0]['CANTIDAD'];


    $TOTALCANTIDAD = $ARRAYTARJATOTAL[0]['CANTIDAD'];
    $TOTALCANTIDADV = $ARRAYTARJATOTAL2[0]['CANTIDAD'];


    $DIFERENCIA = $TOTALCANTIDADD - $TOTALCANTIDAD;



    //IDENTIFICACIONES DE OPERACIONES
    //crear =  OBTENCION DE DATOS INICIALES PARA PODER CREAR LA RECEPCIONM
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
        $ARRAYRECEPCION = $RECEPCIONM_ADO->verRecepcion2($IDOP);
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYRECEPCION as $r) :
            $IDRECEPCION = $IDOP;
            $NUMEROVER =  "" . $r['NUMERO_RECEPCION'];
            $FECHARECEPCION = "" . $r['FECHA_RECEPCION'];
            $NUMERODOCUMENTO = "" . $r['NUMERO_DOCUMENTO_RECEPCION'];
            $PATENTECAMION = "" . $r['PATENTE_CAMION'];
            $PATENTECARRO = "" . $r['PATENTE_CARRO'];
            $RESPONSABLE = "" . $r['RESPONSABLE'];
            $OBSERVACION = "" . $r['OBSERVACIONES_RECEPCION'];
            $TRECEPCION = "" . $r['TRECEPCION'];
            if ($TRECEPCION == "1") {
                if ($r['SNOCOMPRA'] == "1") {
                    $SNOCOMPRA = "on";
                } else {
                    $SNOCOMPRA = "";
                }
                $PROVEEDOR = "" . $r['ID_PROVEEDOR'];
                $OCOMPRA = "" . $r['ID_OCOMPRA'];
            }
            if ($TRECEPCION == "2") {
                $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            }
            if ($TRECEPCION == "3") {
                $PLANTA2 = "" . $r['ID_PLANTA2'];
            }
            $BODEGA = "" . $r['ID_BODEGA'];
            $TDOCUMENTO = "" . $r['ID_TDOCUMENTO'];
            $TRANSPORTE = "" . $r['ID_TRANSPORTE'];
            $CONDUCTOR = "" . $r['ID_CONDUCTOR'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $FECHAINGRESO = "" . $r['INGRESO'];
            $FECHAMODIFCIACION = "" . $r['MODIFICACION'];
            $ESTADO = "" . $r['ESTADO'];
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
        $ARRAYRECEPCION = $RECEPCIONM_ADO->verRecepcion2($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYRECEPCION as $r) :
            $IDRECEPCION = $IDOP;
            $NUMEROVER =  "" . $r['NUMERO_RECEPCION'];
            $FECHARECEPCION = "" . $r['FECHA_RECEPCION'];
            $NUMERODOCUMENTO = "" . $r['NUMERO_DOCUMENTO_RECEPCION'];
            $PATENTECAMION = "" . $r['PATENTE_CAMION'];
            $PATENTECARRO = "" . $r['PATENTE_CARRO'];
            $RESPONSABLE = "" . $r['RESPONSABLE'];
            $OBSERVACION = "" . $r['OBSERVACIONES_RECEPCION'];
            $TRECEPCION = "" . $r['TRECEPCION'];
            if ($TRECEPCION == "1") {
                if ($r['SNOCOMPRA'] == "1") {
                    $SNOCOMPRA = "on";
                } else {
                    $SNOCOMPRA = "";
                }
                $PROVEEDOR = "" . $r['ID_PROVEEDOR'];
                $OCOMPRA = "" . $r['ID_OCOMPRA'];
            }
            if ($TRECEPCION == "2") {
                $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            }
            if ($TRECEPCION == "3") {
                $PLANTA2 = "" . $r['ID_PLANTA2'];
            }
            $BODEGA = "" . $r['ID_BODEGA'];
            $TDOCUMENTO = "" . $r['ID_TDOCUMENTO'];
            $TRANSPORTE = "" . $r['ID_TRANSPORTE'];
            $CONDUCTOR = "" . $r['ID_CONDUCTOR'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $FECHAINGRESO = "" . $r['INGRESO'];
            $FECHAMODIFCIACION = "" . $r['MODIFICACION'];
            $ESTADO = "" . $r['ESTADO'];
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
        $ARRAYRECEPCION = $RECEPCIONM_ADO->verRecepcion2($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYRECEPCION as $r) :
            $IDRECEPCION = $IDOP;
            $NUMEROVER =  "" . $r['NUMERO_RECEPCION'];
            $FECHARECEPCION = "" . $r['FECHA_RECEPCION'];
            $NUMERODOCUMENTO = "" . $r['NUMERO_DOCUMENTO_RECEPCION'];
            $PATENTECAMION = "" . $r['PATENTE_CAMION'];
            $PATENTECARRO = "" . $r['PATENTE_CARRO'];
            $RESPONSABLE = "" . $r['RESPONSABLE'];
            $OBSERVACION = "" . $r['OBSERVACIONES_RECEPCION'];
            $TRECEPCION = "" . $r['TRECEPCION'];
            if ($TRECEPCION == "1") {
                if ($r['SNOCOMPRA'] == "1") {
                    $SNOCOMPRA = "on";
                } else {
                    $SNOCOMPRA = "";
                }
                $PROVEEDOR = "" . $r['ID_PROVEEDOR'];
                $OCOMPRA = "" . $r['ID_OCOMPRA'];
            }
            if ($TRECEPCION == "2") {
                $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            }
            if ($TRECEPCION == "3") {
                $PLANTA2 = "" . $r['ID_PLANTA2'];
            }
            $BODEGA = "" . $r['ID_BODEGA'];
            $TDOCUMENTO = "" . $r['ID_TDOCUMENTO'];
            $TRANSPORTE = "" . $r['ID_TRANSPORTE'];
            $CONDUCTOR = "" . $r['ID_CONDUCTOR'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];
            $FECHAINGRESO = "" . $r['INGRESO'];
            $FECHAMODIFCIACION = "" . $r['MODIFICACION'];
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }
}
//PROCESO PARA OBTENER LOS DATOS DEL FORMULARIO  Y MANTENERLO AL ACTUALIZACION QUE REALIZA EL SELECT DE CONDUCTOR
if (isset($_POST)) {
    if (isset($_REQUEST['FECHARECEPCION'])) {
        $FECHARECEPCION = "" . $_REQUEST['FECHARECEPCION'];
    }
    if (isset($_REQUEST['NUMERODOCUMENTO'])) {
        $NUMERODOCUMENTO = "" . $_REQUEST['NUMERODOCUMENTO'];
    }
    if (isset($_REQUEST['TRECEPCION'])) {
        $TRECEPCION = "" . $_REQUEST['TRECEPCION'];
        if ($TRECEPCION == "1") {
            if (isset($_REQUEST['SNOCOMPRA'])) {
                $SNOCOMPRA = "" . $_REQUEST['SNOCOMPRA'];
            }
            if (isset($_REQUEST['PROVEEDOR'])) {
                $PROVEEDOR = "" . $_REQUEST['PROVEEDOR'];
            }
            if (isset($_REQUEST['OCOMPRA'])) {
                $OCOMPRA = "" . $_REQUEST['OCOMPRA'];
                $ARRAYVEROCOMPRA = $OCOMPRA_ADO->verOcompra($OCOMPRA);
                if ($ARRAYVEROCOMPRA) {
                    $PROVEEDOR = $ARRAYVEROCOMPRA[0]["ID_PROVEEDOR"];
                }
            }
        }
        if ($TRECEPCION == "2") {
            if (isset($_REQUEST['PRODUCTOR'])) {
                $PRODUCTOR = "" . $_REQUEST['PRODUCTOR'];
            }
        }
        if ($TRECEPCION == "3") {
            if (isset($_REQUEST['PLANTA2'])) {
                $PLANTA2 = "" . $_REQUEST['PLANTA2'];
            }
        }
    }
    if (isset($_REQUEST['SNOCOMPRA'])) {
        $SNOCOMPRA = "" . $_REQUEST['SNOCOMPRA'];
    }
    if (isset($_REQUEST['OCOMPRA'])) {
        $OCOMPRA = "" . $_REQUEST['OCOMPRA'];
    }
    if (isset($_REQUEST['PATENTECAMION'])) {
        $PATENTECAMION = "" . $_REQUEST['PATENTECAMION'];
    }
    if (isset($_REQUEST['PATENTECARRO'])) {
        $PATENTECARRO = "" . $_REQUEST['PATENTECARRO'];
    }

    if (isset($_REQUEST['RESPONSABLE'])) {
        $RESPONSABLE = "" . $_REQUEST['RESPONSABLE'];
    }
    if (isset($_REQUEST['OBSERVACION'])) {
        $OBSERVACION = "" . $_REQUEST['OBSERVACION'];
    }
    if (isset($_REQUEST['BODEGA'])) {
        $BODEGA = "" . $_REQUEST['BODEGA'];
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
    if (isset($_REQUEST['FECHAMODIFCIACION'])) {
        $FECHAMODIFCIACION = "" . $_REQUEST['FECHAMODIFCIACION'];
    }
    if (isset($_REQUEST['CONDUCTOR'])) {
        $CONDUCTOR = "" . $_REQUEST['CONDUCTOR'];
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
    <title>Registro Recepción Materiales</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../../assest/config/urlHead.php"; ?>
        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
                //VALIDACION DE FORMULARIO

                function ocompra() {
                    SNOCOMPRA = document.getElementById('SNOCOMPRA').checked;
                    if (SNOCOMPRA == true) {
                        document.getElementById('OCOMPRA').disabled = false;
                        document.getElementById('PROVEEDOR').disabled = true;
                    } else {
                        document.getElementById('OCOMPRA').disabled = true;
                        document.getElementById('PROVEEDOR').disabled = false;
                        document.getElementById("OCOMPRA").innerText  = null;
                    }
                }

                function validacion() {

                    FECHARECEPCION = document.getElementById("FECHARECEPCION").value;
                    TRECEPCION = document.getElementById("TRECEPCION").selectedIndex;
                    TDOCUMENTO = document.getElementById("TDOCUMENTO").selectedIndex;
                    NUMERODOCUMENTO = document.getElementById("NUMERODOCUMENTO").value;
                    TRANSPORTE = document.getElementById("TRANSPORTE").selectedIndex;
                    CONDUCTOR = document.getElementById("CONDUCTOR").selectedIndex;
                    PATENTECAMION = document.getElementById("PATENTECAMION").value;
                    PATENTECARRO = document.getElementById("PATENTECARRO").value;
                    BODEGA = document.getElementById("BODEGA").selectedIndex;
                    //OBSERVACION = document.getElementById("OBSERVACION").value;

                    document.getElementById('val_fecha').innerHTML = "";
                    document.getElementById('val_trecepcion').innerHTML = "";
                    document.getElementById('val_tdocumento').innerHTML = "";
                    document.getElementById('val_numerod').innerHTML = "";
                    document.getElementById('val_transporte').innerHTML = "";
                    document.getElementById('val_conductor').innerHTML = "";
                    document.getElementById('val_patentecamion').innerHTML = "";
                    document.getElementById('val_patentecarro').innerHTML = "";
                    document.getElementById('val_bodega').innerHTML = "";
                    //  document.getElementById('val_observacion').innerHTML = "";




                    if (TRECEPCION == null || TRECEPCION == 0) {
                        document.form_reg_dato.TRECEPCION.focus();
                        document.form_reg_dato.TRECEPCION.style.borderColor = "#FF0000";
                        document.getElementById('val_trecepcion').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false
                    }
                    document.form_reg_dato.TRECEPCION.style.borderColor = "#4AF575";


                    if (FECHARECEPCION == null || FECHARECEPCION.length == 0 || /^\s+$/.test(FECHARECEPCION)) {
                        document.form_reg_dato.FECHARECEPCION.focus();
                        document.form_reg_dato.FECHARECEPCION.style.borderColor = "#FF0000";
                        document.getElementById('val_fecha').innerHTML = "NO A INGRESADO DATO";
                        return false
                    }
                    document.form_reg_dato.FECHARECEPCION.style.borderColor = "#4AF575";



                    if (TRECEPCION) {
                        if (TRECEPCION == 1) {
                            PROVEEDOR = document.getElementById("PROVEEDOR").selectedIndex;
                            OCOMPRA = document.getElementById("OCOMPRA").selectedIndex;
                            document.getElementById('val_proveedor').innerHTML = "";
                            document.getElementById('val_ocompra').innerHTML = "";


                            SNOCOMPRA = document.getElementById('SNOCOMPRA').checked;
                            if (SNOCOMPRA == true) {
                                if (OCOMPRA == null || OCOMPRA == 0) {
                                    document.form_reg_dato.OCOMPRA.focus();
                                    document.form_reg_dato.OCOMPRA.style.borderColor = "#FF0000";
                                    document.getElementById('val_ocompra').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                                    return false
                                }
                                document.form_reg_dato.OCOMPRA.style.borderColor = "#4AF575";
                            }

                            if (PROVEEDOR == null || PROVEEDOR == 0) {
                                document.form_reg_dato.PROVEEDOR.focus();
                                document.form_reg_dato.PROVEEDOR.style.borderColor = "#FF0000";
                                document.getElementById('val_proveedor').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                                return false
                            }
                            document.form_reg_dato.PROVEEDOR.style.borderColor = "#4AF575";

                        }
                        if (TRECEPCION == 2) {
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
                        if (TRECEPCION == 3) {
                            PLANTA2 = document.getElementById("PLANTA2").selectedIndex;
                            document.getElementById('val_planta2').innerHTML = "";
                            if (PLANTA2 == null || PLANTA2 == 0) {
                                document.form_reg_dato.PLANTA2.focus();
                                document.form_reg_dato.PLANTA2.style.borderColor = "#FF0000";
                                document.getElementById('val_planta2').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                                return false
                            }
                            document.form_reg_dato.PLANTA2.style.borderColor = "#4AF575";
                        }
                    }

                    if (BODEGA == null || BODEGA == 0) {
                        document.form_reg_dato.BODEGA.focus();
                        document.form_reg_dato.BODEGA.style.borderColor = "#FF0000";
                        document.getElementById('val_bodega').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false
                    }
                    document.form_reg_dato.BODEGA.style.borderColor = "#4AF575";


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
                        document.getElementById('val_numerod').innerHTML = "NO A INGRESADO DATO";
                        return false
                    }
                    document.form_reg_dato.NUMERODOCUMENTO.style.borderColor = "#4AF575";


                    if (TRANSPORTE == null || TRANSPORTE == 0) {
                        document.form_reg_dato.TRANSPORTE.focus();
                        document.form_reg_dato.TRANSPORTE.style.borderColor = "#FF0000";
                        document.getElementById('val_transporte').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
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

                    if (PATENTECAMION == null || PATENTECAMION == 0) {
                        document.form_reg_dato.PATENTECAMION.focus();
                        document.form_reg_dato.PATENTECAMION.style.borderColor = "#FF0000";
                        document.getElementById('val_patentecamion').innerHTML = "NO A INGRESADO DATO";
                        return false
                    }
                    document.form_reg_dato.PATENTECAMION.style.borderColor = "#4AF575";

                    /*
                                        if (PATENTECARRO == null || PATENTECARRO == 0) {
                                            document.form_reg_dato.PATENTECARRO.focus();
                                            document.form_reg_dato.PATENTECARRO.style.borderColor = "#FF0000";
                                            document.getElementById('val_patentecarro').innerHTML = "NO A INGRESADO DATO";
                                            return false
                                        }
                                        document.form_reg_dato.PATENTECARRO.style.borderColor = "#4AF575";
                    */



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

                //FUNCION PARA REALIZAR UNA ACTUALIZACION DEL FORMULARIO DE REGISTRO DE RECEPCIONE
                function refrescar() {
                    document.getElementById("form_reg_dato").submit();
                }

                //FUNCION PARA ABRIR VENTANA QUE SE ENCUENTRA LA OPERACIONES DE DETALLE DE RECEPCIONE
                function abrirVentana(url) {
                    var opciones =
                        "'directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=1600, height=1000'";
                    window.open(url, 'window', opciones);
                }

                function abrirPestana(url) {
                    var win = window.open(url, '_blank');
                    win.focus();
                }
                //REDIRECCIONAR A LA PAGINA SELECIONADA
                function irPagina(url) {
                    location.href = "" + url;
                }

                //FUNCION PARA ABRIR UNA NUEVA PESTAÑA 
                function abrirPestana(url) {
                    var win = window.open(url, '_blank');
                    win.focus();
                }
            </script>
</head>
<body class="hold-transition light-skin fixed sidebar-mini theme-primary" >
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <?php include_once "../../assest/config/menuMaterial.php";            ?>
            <div class="content-wrapper">
                <div class="container-full">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Materiales</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Materiales</li>
                                            <li class="breadcrumb-item" aria-current="page">Recepción</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Registro Recepción </a>
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <?php include_once "../../assest/config/verIndicadorEconomico.php"; ?>
                        </div>
                    </div>
                    <label id="val_mensaje" class="validacion"><?php echo $MENSAJEFOLIO; ?> </label>
                    <!-- Main content -->
                    <section class="content">
                        <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato">
                            <div class="box">                         
                                 <div class="box-header with-border bg-primary">                                   
                                    <h4 class="box-title">Registro de Recepcion</h4>                                        
                                </div>
                                <div class="box-body ">
                                    <div class="row">
                                        <div class="col-xxl-2 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Número Recepción</label>
                                                <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTA" name="PLANTA" value="<?php echo $PLANTAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADAS; ?>" />

                                                <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESAE" name="EMPRESAE" value="<?php echo $EMPRESA; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTAE" name="PLANTAE" value="<?php echo $PLANTA; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADAE" name="TEMPORADAE" value="<?php echo $TEMPORADA; ?>" />                                                

                                                <input type="hidden" name="TOTALCANTIDADD" id="TOTALCANTIDADD" value="<?php echo $TOTALCANTIDADD; ?>" />
                                                <input type="hidden" name="TOTALCANTIDAD" id="TOTALCANTIDAD" value="<?php echo $TOTALCANTIDAD; ?>" />
                                                <input type="hidden" name="DIFERENCIA" id="DIFERENCIA" value="<?php echo $DIFERENCIA; ?>" />


                                                <input type="hidden" class="form-control" placeholder="ID RECEPCIONE" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="OP RECEPCIONE" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="URL RECEPCIONE" id="URLP" name="URLP" value="registroRecepcione" />
                                                <input type="hidden" class="form-control" placeholder="URL DRECEPCIONE" id="URLD" name="URLD" value="registroDrecepcione" />
                                                <input type="text" class="form-control" style="background-color: #eeeeee;" placeholder="Número Recepción" id="NUMERORECEPCION" name="NUMERORECEPCION" value="<?php echo $NUMEROVER; ?>" disabled />
                                                <label id="val_id" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Tipo Recepción</label>
                                                <input type="hidden" class="form-control" placeholder="Tipo Recepción" id="TRECEPCIONE" name="TRECEPCIONE" value="<?php echo $TRECEPCION; ?>" />
                                                <select class="form-control select2" id="TRECEPCION" name="TRECEPCION" style="width: 100%;" onchange="this.form.submit()" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLEDFOLIO; ?>>
                                                    <option></option>
                                                    <option value="1" <?php if ($TRECEPCION == "1") { echo "selected"; } ?>> Desde Proveedor </option>
                                                    <option value="2" <?php if ($TRECEPCION == "2") { echo "selected"; } ?>> Desde Productor </option>
                                                    <option value="3" <?php if ($TRECEPCION == "3") { echo "selected"; } ?>> Planta Externa </option>
                                                    <option value="4" <?php if ($TRECEPCION == "4") { echo "selected"; } ?>> Inventario Inicial</option>
                                                    <option value="5" <?php if ($TRECEPCION == "5") { echo "selected"; } ?>> Desde Packing</option>
                                                    <option value="6" <?php if ($TRECEPCION == "6") { echo "selected"; } ?>> Desde Etiquetado </option>
                                                </select>
                                                <label id="val_trecepcion" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <?php if ($TRECEPCION != "1") { ?>
                                            <div class="col-xxl-4 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                            </div>
                                        <?php } ?>
                                        <?php if ($TRECEPCION == "1") { ?>
                                            <div class="col-xxl-2 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>Con OC</label>
                                                    <br>
                                                    <input type="hidden" class="form-control" placeholder="SNOCOMPRAE" id="SNOCOMPRAE" name="SNOCOMPRAE" value="<?php echo $SNOCOMPRA; ?>" />
                                                    <input type="checkbox" class="chk-col-danger" name="SNOCOMPRA" id="SNOCOMPRA" <?php echo $DISABLEDFOLIO; ?> <?php echo $DISABLEDOC; ?> <?php echo $DISABLED2; ?> onchange="ocompra();" <?php if ($SNOCOMPRA == "on") {
                                                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                                                    } ?> >
                                                    <label for="SNOCOMPRA"></label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-2 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>Orden Compra</label>
                                                    <input type="hidden" class="form-control" placeholder="OCOMPRAE" id="OCOMPRAE" name="OCOMPRAE" value="<?php echo $OCOMPRA; ?>" />
                                                    <select class="form-control select2" id="OCOMPRA" name="OCOMPRA" style="width: 100%;" onchange="this.form.submit()" <?php echo $DISABLEDFOLIO; ?> <?php echo $DISABLED2; ?> <?php echo $DISABLEDOC; ?> <?php if ($SNOCOMPRA != "on") {
                                                                                                                                                                                                                        echo "disabled";
                                                                                                                                                                                                                    } ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYOCOMPRA as $r) : ?>
                                                            <?php if ($ARRAYOCOMPRA) {    ?>
                                                                <option value="<?php echo $r['ID_OCOMPRA']; ?>" 
                                                                <?php if ($OCOMPRA == $r['ID_OCOMPRA']) { echo "selected"; } ?>>
                                                                    <?php echo $r['NUMERO_OCOMPRA'] ?> - <?php echo $r['NUMEROI_OCOMPRA'] ?>
                                                                </option>
                                                            <?php } else { ?>
                                                                <option>No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_ocompra" class="validacion"> </label>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <div class="col-xxl-2 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha Ingreso</label>
                                                <input type="hidden" class="form-control" placeholder="Fecha Ingreso" id="FECHAINGRESOE" name="FECHAINGRESOE" value="<?php echo $FECHAINGRESO; ?>" />
                                                <input type="date" class="form-control" style="background-color: #eeeeee;" placeholder="Fecha Ingreso" id="FECHAINGRESO" name="FECHAINGRESO" value="<?php echo $FECHAINGRESO; ?>" disabled />
                                                <label id="val_fechai" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha Modificación</label>
                                                <input type="hidden" class="form-control" placeholder="Fecha Modificación" id="FECHAMODIFCIACIONE" name="FECHAMODIFCIACIONE" value="<?php echo $FECHAMODIFCIACION; ?>" />
                                                <input type="date" class="form-control" style="background-color: #eeeeee;" placeholder="Fecha Modificación" id="FECHAMODIFCIACION" name="FECHAMODIFCIACION" value="<?php echo $FECHAMODIFCIACION; ?>" disabled />
                                                <label id="val_fecham" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha Recepción</label>
                                                <input type="hidden" class="form-control" placeholder="Fecha Recepción" id="FECHARECEPCIONE" name="FECHARECEPCIONE" value="<?php echo $FECHARECEPCION; ?>" />
                                                <input type="date" class="form-control"  placeholder="Fecha Recepción" id="FECHARECEPCION" name="FECHARECEPCION" value="<?php echo $FECHARECEPCION; ?>" <?php echo $DISABLEDFOLIO; ?> <?php echo $DISABLED2; ?>  />
                                                <label id="val_fecha" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <?php if ($TRECEPCION == "") { ?>
                                        <?php } ?>
                                        <?php if ($TRECEPCION == "1") { ?>
                                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>Proveedor</label>
                                                    <input type="hidden" class="form-control" placeholder="PROVEEDORE" id="PROVEEDORE" name="PROVEEDORE" value="<?php echo $PROVEEDOR; ?>" />
                                                    <select class="form-control select2" id="PROVEEDOR" name="PROVEEDOR" style="width: 100%;" <?php echo $DISABLEDFOLIO; ?>  <?php echo $DISABLED2; ?>  <?php if ($OCOMPRA) {   echo "disabled"; } ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYPROVEEDOR as $r) : ?>
                                                            <?php if ($ARRAYPROVEEDOR) {    ?>
                                                                <option value="<?php echo $r['ID_PROVEEDOR']; ?>" 
                                                                <?php if ($PROVEEDOR == $r['ID_PROVEEDOR']) { echo "selected"; } ?>>
                                                                    <?php echo $r['NOMBRE_PROVEEDOR'] ?>
                                                                </option>
                                                            <?php } else { ?>
                                                                <option>No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_proveedor" class="validacion"> </label>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if ($TRECEPCION == "2") { ?>
                                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>Productor</label>
                                                    <input type="hidden" class="form-control" placeholder="Productor" id="PRODUCTORE" name="PRODUCTORE" value="<?php echo $PRODUCTOR; ?>" />
                                                    <select class="form-control select2" id="PRODUCTOR" name="PRODUCTOR" style="width: 100%;" <?php echo $DISABLEDFOLIO; ?> <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYPRODUCTOR as $r) : ?>
                                                            <?php if ($ARRAYPRODUCTOR) {    ?>
                                                                <option value="<?php echo $r['ID_PRODUCTOR']; ?>" 
                                                                    <?php if ($PRODUCTOR == $r['ID_PRODUCTOR']) { echo "selected"; } ?>>
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
                                        <?php if ($TRECEPCION == "3") { ?>
                                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>Planta Origen</label>
                                                    <input type="hidden" class="form-control" placeholder="PLANTA2E" id="PLANTA2E" name="PLANTA2E" value="<?php echo $PLANTA2; ?>" />
                                                    <select class="form-control select2" id="PLANTA2" name="PLANTA2" style="width: 100%;" value="<?php echo $PLANTA2; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLEDFOLIO; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYPLANTA2 as $r) : ?>
                                                            <?php if ($ARRAYPLANTA2) {    ?>
                                                                <option value="<?php echo $r['ID_PLANTA']; ?>" 
                                                                    <?php if ($PLANTA2 == $r['ID_PLANTA']) { echo "selected"; } ?>>
                                                                    <?php echo $r['NOMBRE_PLANTA'] ?>
                                                                </option>
                                                            <?php } else { ?>
                                                                <option>No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_planta2" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-1 col-xl-1 col-lg-3 col-md-3 col-sm-3 col-3 col-xs-3">
                                                <div class="form-group">
                                                    <br>
                                                    <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Planta Externa" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLEDFOLIO; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopPlanta2.php' ); ">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if ($TRECEPCION == "4") { ?>
                                        <?php } ?>
                                        <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Bodega Destino</label>
                                                <input type="hidden" class="form-control" placeholder="BODEGAE" id="BODEGAE" name="BODEGAE" value="<?php echo $BODEGA; ?>" />
                                                <select class="form-control select2" id="BODEGA" name="BODEGA" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLEDFOLIO; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYBODEGA as $r) : ?>
                                                        <?php if ($ARRAYBODEGA) {    ?>
                                                            <option value="<?php echo $r['ID_BODEGA']; ?>" 
                                                            <?php if ($BODEGA == $r['ID_BODEGA']) { echo "selected"; } ?>>
                                                            <?php echo $r['NOMBRE_BODEGA'] ?> </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_bodega" class="validacion"> </label>
                                            </div>
                                        </div>

                                        <?php if ($TRECEPCION != "5" && $TRECEPCION != "6") { ?>

                                        <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <label>Tipo Documento</label>
                                            <input type="hidden" class="form-control" placeholder="TDOCUMENTOE" id="TDOCUMENTOE" name="TDOCUMENTOE" value="<?php echo $TDOCUMENTO; ?>" />
                                            <select class="form-control select2" id="TDOCUMENTO" name="TDOCUMENTO" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLEDFOLIO; ?>>
                                                <option></option>
                                                <?php foreach ($ARRAYTDOCUMENTO as $r) : ?>
                                                    <?php if ($ARRAYTDOCUMENTO) {    ?>
                                                        <option value="<?php echo $r['ID_TDOCUMENTO']; ?>" 
                                                        <?php if ($TDOCUMENTO == $r['ID_TDOCUMENTO']) { echo "selected"; } ?>>
                                                        <?php echo $r['NOMBRE_TDOCUMENTO'] ?> </option>
                                                    <?php } else { ?>
                                                        <option>No Hay Datos Registrados </option>
                                                    <?php } ?>
                                                <?php endforeach; ?>
                                            </select>
                                            <label id="val_tdocumento" class="validacion"> </label>
                                        </div>

                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Número Documento</label>
                                                <input type="hidden" class="form-control" placeholder="NUMERODOCUMENTOE" id="NUMERODOCUMENTOE" name="NUMERODOCUMENTOE" value="<?php echo $NUMERODOCUMENTO; ?>" />
                                                <input type="text" class="form-control" placeholder="Número Documento Recepción" id="NUMERODOCUMENTO" name="NUMERODOCUMENTO" value="<?php echo $NUMERODOCUMENTO; ?>"  <?php echo $DISABLEDFOLIO; ?> <?php echo $DISABLED2; ?>  />
                                                <label id="val_numerod" class="validacion"> </label>
                                            </div>
                                        </div>


                                        <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Transporte</label>
                                                <input type="hidden" class="form-control" placeholder="TRANSPORTE" id="TRANSPORTEE" name="TRANSPORTEE" value="<?php echo $TRANSPORTE; ?>" />
                                                <select class="form-control select2" id="TRANSPORTE" name="TRANSPORTE" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLEDFOLIO; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYTRANSPORTE as $r) : ?>
                                                        <?php if ($ARRAYTRANSPORTE) {    ?>
                                                            <option value="<?php echo $r['ID_TRANSPORTE']; ?>" 
                                                            <?php if ($TRANSPORTE == $r['ID_TRANSPORTE']) {  echo "selected";   } ?>> 
                                                            <?php echo $r['NOMBRE_TRANSPORTE'] ?> </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_transporte" class="validacion"> </label>
                                            </div>
                                        </div>


                                        <div class="col-xxl-1 col-xl-1 col-lg-2 col-md-2 col-sm-3 col-3 col-xs-3">
                                            <div class="form-group">
                                                <br>
                                                <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Agregar Transporte" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLEDFOLIO; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopTransporte.php' ); ">
                                                    <i class="glyphicon glyphicon-plus"></i>
                                                </button>
                                            </div>
                                        </div>


                                        <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Conductor</label>
                                                <input type="hidden" class="form-control" placeholder="CONDUCTORE" id="CONDUCTORE" name="CONDUCTORE" value="<?php echo $CONDUCTOR; ?>" />
                                                <select class="form-control select2" id="CONDUCTOR" name="CONDUCTOR" style="width: 100%;" value="<?php echo $CONDUCTOR; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLEDFOLIO; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYCONDUCTOR as $r) : ?>
                                                        <?php if ($ARRAYCONDUCTOR) {    ?>
                                                            <option value="<?php echo $r['ID_CONDUCTOR']; ?>" 
                                                                <?php if ($CONDUCTOR == $r['ID_CONDUCTOR']) { echo "selected"; } ?>>
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


                                        <div class="col-xxl-1 col-xl-1 col-lg-2 col-md-2 col-sm-3 col-3 col-xs-3">
                                            <div class="form-group">
                                                <br>
                                                <button type="button" class=" btn btn-success btn-block" data-toggle="tooltip" title="Agregar Conductor" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLEDFOLIO; ?> id="defecto" name="pop" Onclick="abrirVentana('registroPopConductor.php' ); ">
                                                    <i class="glyphicon glyphicon-plus"></i>
                                                </button>
                                            </div>
                                        </div>


                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Patente Camión</label>
                                                <input type="hidden" class="form-control" placeholder="PATENTECAMIONE" id="PATENTECAMIONE" name="PATENTECAMIONE" value="<?php echo $PATENTECAMION; ?>" />
                                                <input type="text" class="form-control"  placeholder="Patente Camion" id="PATENTECAMION" name="PATENTECAMION" value="<?php echo $PATENTECAMION; ?>" <?php echo $DISABLEDFOLIO; ?> <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> />
                                                <label id="val_patentecamion" class="validacion"> </label>
                                            </div>
                                        </div>


                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Patente Carro</label>
                                                <input type="hidden" class="form-control" placeholder="PATENTECARROE" id="PATENTECARROE" name="PATENTECARROE" value="<?php echo $PATENTECARRO; ?>" />
                                                <input type="text" class="form-control"  placeholder="Patente Carro" id="PATENTECARRO" name="PATENTECARRO" value="<?php echo $PATENTECARRO; ?>" <?php echo $DISABLEDFOLIO; ?> <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> />
                                                <label id="val_patentecarro" class="validacion"> </label>
                                            </div>
                                        </div>


                                        <?php } ?>

                                        <?php if($TRECEPCION == "5" || $TRECEPCION == "6"){?>
                                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Responsable</label>
                                                <input type="hidden" class="form-control" placeholder="RESPONSABLEE" id="RESPONSABLEE" name="RESPONSABLEE" value="<?php echo $RESPONSABLE; ?>" />
                                                <input type="text" class="form-control"  placeholder="Responsable" id="RESPONSABLE" name="RESPONSABLE" value="<?php echo $RESPONSABLE; ?>" <?php echo $DISABLEDFOLIO; ?> <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> />
                                                <label id="val_patentecarro" class="validacion"> </label>
                                            </div>
                                           
                                        </div>
                                        <?php }?>
                                    </div>
                                   
                                    <div class="row">
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Notas Generales </label>
                                                <input type="hidden" class="form-control" placeholder="Observaciónes" id="OBSERVACIONE" name="OBSERVACIONE" value="<?php echo $OBSERVACION; ?>" />
                                                <textarea class="form-control" rows="5" placeholder="Ingrese Nota, Observaciones u Otro" id="OBSERVACION" name="OBSERVACION" <?php echo $DISABLEDFOLIO; ?> <?php echo $DISABLED2; ?> ><?php echo $OBSERVACION; ?></textarea>
                                                <label id="val_observacion" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <label id="val_drecepcion" class="validacion center"><?php echo $MENSAJE; ?> </label>
                                </div>
                                <!-- /.row -->
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar">
                                        <div class="btn-group  col-xxl-4 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12" role="group" aria-label="Acciones generales">
                                            <?php if ($OP == "") { ?>
                                                <button type="button" class="btn btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroRecepcionm.php');">
                                                    <i class="ti-trash"></i> Borrar
                                                </button>
                                                <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Guardar" name="CREAR" value="CREAR" <?php echo $DISABLEDFOLIO; ?>    onclick="return validacion()">
                                                    <i class="ti-save-alt"></i> Guardar
                                                </button>
                                            <?php } ?>
                                            <?php if ($OP != "") { ?>
                                                <button type="button" class="btn btn-success " data-toggle="tooltip" title="Volver" name="VOLVER" value="VOLVER" Onclick="irPagina('listarRecepcionm.php'); ">
                                                    <i class="ti-back-left "></i> Volver
                                                </button>
                                                <button type="submit" class="btn btn-warning " data-toggle="tooltip" title="Guardar" name="GUARDAR" value="GUARDAR" <?php echo $DISABLED2; ?> <?php echo $DISABLEDFOLIO; ?>  onclick="return validacion()">
                                                    <i class="ti-pencil-alt"></i> Guardar
                                                </button>
                                                <button type="submit" class="btn btn-danger " data-toggle="tooltip" title="Cerrar" name="CERRAR" value="CERRAR" <?php echo $DISABLED2; ?> <?php echo $DISABLEDFOLIO; ?>   onclick="return  validacion()">
                                                    <i class="ti-save-alt"></i> Cerrar
                                                </button>
                                            <?php } ?>
                                        </div>
                                        <div class="btn-group  col-xxl-4 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12  float-right">
                                            <?php if ($OP != "") : ?>
                                                <button type="button" class="btn  btn-primary  " data-toggle="tooltip" title="Informe" id="defecto" name="tarjas" <?php echo $DISABLEDFOLIO; ?> Onclick="abrirPestana('../../assest/documento/informeRecepcionm.php?parametro=<?php echo $IDOP; ?>&usuario=<?php echo $IDUSUARIOS; ?>'); ">
                                                    <i class="fa fa-file-pdf-o"></i> Informe
                                                </button>
                                                <button type="button" class="btn btn-info  " data-toggle="tooltip" title="Tarja" id="defecto" name="tarjas" <?php echo $DISABLEDFOLIO; ?> Onclick="abrirPestana('../../assest/documento/informeTarjasRecepcion.php?parametro=<?php echo $IDOP; ?>'); ">
                                                    <i class="fa fa-file-pdf-o"></i> Tarjas
                                                </button>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--.row -->
                        </form>

                        <?php if (isset($_GET['op'])): ?>
                            <div class="card">
                                <div class="card-header bg-success">
                                    <h4 class="card-title">Detalle de recepcion</h4>
                                </div>
                                <div class="card-header">
                                        <div class="form-row align-items-center">
                                            <form method="post" id="form2" name="form2">
                                                <input type="hidden" class="form-control" placeholder="ID RECEPCIONMP" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="OP RECEPCIONMP" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="URL RECEPCIONE" id="URLP" name="URLP" value="registroRecepcionm" />
                                                <input type="hidden" class="form-control" placeholder="URL DRECEPCIONE" id="URLD" name="URLD" value="registroDrecepcionm" />
                                                <div class="col-auto">
                                                    <button type="submit" class="btn btn-success btn-block mb-2" data-toggle="tooltip" title="Agregar Detalle Recepción" id="CREARDURL" name="CREARDURL"
                                                    <?php if ($ESTADO == 0) {  echo "disabled style='background-color: #eeeeee;'";     } ?>>
                                                            Agregar Detalle
                                                    </button>
                                                </div>
                                            </form>
                                            <form method="post" id="form3" name="form3">
                                                <input type="hidden" class="form-control" placeholder="ID RECEPCIONMP" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="OP RECEPCIONMP" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="URL RECEPCIONE" id="URLP" name="URLP" value="registroRecepcionm" />
                                                <input type="hidden" class="form-control" placeholder="URL DRECEPCIONE" id="URLD" name="URLD" value="registroSelecionarDocompraM" />
                                                <div class="col-auto">
                                                    <button type="submit" class="btn btn-success btn-block mb-2" data-toggle="tooltip" title="Agregar Detalle Recepción" id="CREARDURL" name="CREARDURL"
                                                    <?php if ($ESTADO == 0) { echo "disabled style='background-color: #eeeeee;'"; } ?> <?php if ($TRECEPCION != 1) {} ?> 
                                                    <?php if ($SNOCOMPRA != "on") {  echo "disabled style='background-color: #eeeeee;'";  } ?>>
                                                        Seleccionar Detalle OC
                                                    </button>
                                                </div>
                                            </form>
                                            <div class="col-auto">
                                                <label class="sr-only" for="inlineFormInputGroup">Username</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">Total Cantidad Detalle</div>
                                                    </div>
                                                    <input type="hidden" name="TOTALCANTIDADD" id="TOTALCANTIDADD" value="<?php echo $TOTALCANTIDADD; ?>" />
                                                    <input type="text" class="form-control" placeholder="Total Envase" id="TOTALCANTIDADDV" name="TOTALCANTIDADDV" value="<?php echo $TOTALCANTIDADDV; ?>" disabled />
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <label class="sr-only" for="inlineFormInputGroup">Username</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">Total Cantidad en Tarja</div>
                                                    </div>
                                                    <input type="hidden" name="TOTALCANTIDAD" id="TOTALCANTIDAD" value="<?php echo $TOTALCANTIDAD; ?>" />
                                                    <input type="text" class="form-control" placeholder="Total Neto" id="TOTALCANTIDADV" name="TOTALCANTIDADV" value="<?php echo $TOTALCANTIDADV; ?>" disabled />
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <label class="sr-only" for="inlineFormInputGroup">Username</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">Diferencia</div>
                                                    </div>
                                                    <input type="hidden" name="DIFERENCIA" id="DIFERENCIA" value="<?php echo $DIFERENCIA; ?>" />
                                                    <input type="text" class="form-control" placeholder="Diferencia" id="DIFERENCIAV" name="DIFERENCIAV" value="<?php echo $DIFERENCIA; ?>" disabled />
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="card-body">
                                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                        <div class=" table-responsive">
                                            <table id="detalle" class="table-hover " style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">Operaciónes</th>
                                                        <th>Codigo Producto </th>
                                                        <th>Producto </th>
                                                        <th>Unidad Medida</th>
                                                        <th>Cantidad</th>
                                                        <th>Valor Unitario</th>
                                                        <th>Cantidad En Tarjas</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if ($ARRAYDRECEPCIONNODOCOMPRA) { ?>
                                                        <?php foreach ($ARRAYDRECEPCIONNODOCOMPRA as $s) : ?>
                                                            <?php

                                                            $ARRAYDTRECEPCIONTOTALES2 = $TARJAM_ADO->obtenerTotalesTarjaPorDrecepcion2CBX($s['ID_DRECEPCION']);
                                                            if ($ARRAYDTRECEPCIONTOTALES2) {
                                                                $TOTALTARJADR = $ARRAYDTRECEPCIONTOTALES2[0]["CANTIDAD"];
                                                            }
                                                            $ARRAYPRODUCTO = $PRODUCTO_ADO->verProducto($s['ID_PRODUCTO']);
                                                            if ($ARRAYPRODUCTO) {
                                                                $CODIGOPRODUCTO = $ARRAYPRODUCTO[0]['CODIGO_PRODUCTO'];
                                                                $NOMBREPRODUCTO = $ARRAYPRODUCTO[0]['NOMBRE_PRODUCTO'];
                                                            } else {
                                                                $CODIGOPRODUCTO = "Sin Dato";
                                                                $NOMBREPRODUCTO = "Sin Dato";
                                                            }
                                                            $ARRAYTUMEDIDA = $TUMEDIDA_ADO->verTumedida($s['ID_TUMEDIDA']);
                                                            if ($ARRAYTUMEDIDA) {
                                                                $NOMBRETUMEDIDA = $ARRAYTUMEDIDA[0]['NOMBRE_TUMEDIDA'];
                                                            } else {
                                                                $NOMBRETUMEDIDA = "Sin Dato";
                                                            }

                                                            ?>
                                                            <tr>
                                                                <td class="text-center">
                                                                    <form method="post" id="form1" name="form1">
                                                                        <input type="hidden" class="form-control" placeholder="ID DRECEPCIONE" id="IDD" name="IDD" value="<?php echo $s['ID_DRECEPCION']; ?>" />
                                                                        <input type="hidden" class="form-control" placeholder="ID RECEPCIONE" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                                                        <input type="hidden" class="form-control" placeholder="OP RECEPCIONE" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                                                        <input type="hidden" class="form-control" placeholder="URL RECEPCIONE" id="URLP" name="URLP" value="registroRecepcionm" />
                                                                        <input type="hidden" class="form-control" placeholder="URL DRECEPCIONE" id="URLD" name="URLD" value="registroDrecepcionm" />
                                                                        <div class="btn-group btn-rounded btn-block" role="group" aria-label="Operaciones Detalle">
                                                                            <?php if ($ESTADO  == "0") { ?>
                                                                                <button type="submit" class="btn btn-info  btn-sm " data-toggle="tooltip" id="VERDURL" name="VERDURL" title="Ver">
                                                                                    <i class="ti-eye"></i><br> Ver
                                                                                </button>
                                                                            <?php } ?>
                                                                            <?php if ($ESTADO  == "1") { ?>
                                                                                <button type="submit" class="btn btn-warning btn-sm " data-toggle="tooltip" id="EDITARDURL" name="EDITARDURL" title="Editar" <?php echo $DISABLED2; ?>>
                                                                                    <i class="ti-pencil-alt"></i><br> Editar
                                                                                </button>
                                                                                <button type="submit" class="btn btn-secondary btn-sm " data-toggle="tooltip" id="DUPLICARDURL" name="DUPLICARDURL" title="Duplicar" <?php echo $DISABLED2; ?>>
                                                                                    <i class="fa fa-fw fa-copy"></i><br> Duplicar
                                                                                </button>
                                                                                <button type="submit" class="btn btn-danger btn-sm " data-toggle="tooltip" id="ELIMINARDURL" name="ELIMINARDURL" title="Eliminar" <?php echo $DISABLED2; ?> <?php if($TOTALTARJADR>0){echo "disabled";}?> >
                                                                                    <i class="ti-close"></i><br> Eliminar
                                                                                </button>
                                                                            <?php } ?>
                                                                            <button type="button" class="btn  btn-primary  btn-sm  " data-toggle="tooltip" title="Tarjas" id="defecto" name="tarjas" Onclick="abrirPestana('../../assest/documento/informeTarjasDrecepcion.php?parametro=<?php echo $s['ID_DRECEPCION']; ?>&usuario=<?php echo $IDUSUARIOS; ?>'); ">
                                                                                <i class="fa fa-file-pdf-o"></i><br> Tarja
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </td>
                                                                <td><?php echo $CODIGOPRODUCTO; ?></td>
                                                                <td><?php echo $NOMBREPRODUCTO; ?></td>
                                                                <td><?php echo $NOMBRETUMEDIDA; ?></td>
                                                                <td><?php echo $s['CANTIDAD']; ?></td>
                                                                <td><?php echo $s['VALOR_UNITARIO']; ?></td>
                                                                <td><?php echo $TOTALTARJADR; ?></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    <?php } ?>
                                                    <?php if ($ARRAYDRECEPCIONSIDOCOMPRA) { ?>
                                                        <?php foreach ($ARRAYDRECEPCIONSIDOCOMPRA as $s) : ?>
                                                            <?php

                                                            $ARRAYDTRECEPCIONTOTALES2 = $TARJAM_ADO->obtenerTotalesTarjaPorDrecepcion2CBX($s['ID_DRECEPCION']);
                                                            if ($ARRAYDTRECEPCIONTOTALES2) {
                                                                $TOTALTARJADR = $ARRAYDTRECEPCIONTOTALES2[0]["CANTIDAD"];
                                                            }
                                                            $ARRAYPRODUCTO = $PRODUCTO_ADO->verProducto($s['ID_PRODUCTO']);
                                                            if ($ARRAYPRODUCTO) {
                                                                $CODIGOPRODUCTO = $ARRAYPRODUCTO[0]['CODIGO_PRODUCTO'];
                                                                $NOMBREPRODUCTO = $ARRAYPRODUCTO[0]['NOMBRE_PRODUCTO'];
                                                            } else {
                                                                $CODIGOPRODUCTO = "Sin Dato";
                                                                $NOMBREPRODUCTO = "Sin Dato";
                                                            }
                                                            $ARRAYTUMEDIDA = $TUMEDIDA_ADO->verTumedida($s['ID_TUMEDIDA']);
                                                            if ($ARRAYTUMEDIDA) {
                                                                $NOMBRETUMEDIDA = $ARRAYTUMEDIDA[0]['NOMBRE_TUMEDIDA'];
                                                            } else {
                                                                $NOMBRETUMEDIDA = "Sin Dato";
                                                            }
                                                            ?>
                                                            <tr>
                                                                <td class="text-center">
                                                                    <form method="post" id="form1" name="form1">
                                                                        <input type="hidden" class="form-control" placeholder="ID DRECEPCIONE" id="IDD" name="IDD" value="<?php echo $s['ID_DRECEPCION']; ?>" />
                                                                        <input type="hidden" class="form-control" placeholder="ID RECEPCIONE" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                                                        <input type="hidden" class="form-control" placeholder="OP RECEPCIONE" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                                                        <input type="hidden" class="form-control" placeholder="URL RECEPCIONE" id="URLP" name="URLP" value="registroRecepcionm" />
                                                                        <input type="hidden" class="form-control" placeholder="URL DRECEPCIONE" id="URLD" name="URLD" value="registroDrecepcionmDocompra" />
                                                                        <div class="btn-group btn-rounded btn-block" role="group" aria-label="Operaciones Detalle">
                                                                            <?php if ($ESTADO  == "0") { ?>
                                                                                <button type="submit" class="btn btn-info  btn-sm " data-toggle="tooltip" id="VERDURL" name="VERDURL" title="Ver">
                                                                                    <i class="ti-eye"></i><br> Ver
                                                                                </button>
                                                                            <?php } ?>
                                                                            <?php if ($ESTADO  == "1") { ?>
                                                                                <button type="submit" class="btn btn-warning btn-sm " data-toggle="tooltip" id="EDITARDURL" name="EDITARDURL" title="Editar" <?php echo $DISABLED2; ?>>
                                                                                    <i class="ti-pencil-alt"></i><br> Editar
                                                                                </button>
                                                                                <button type="submit" class="btn btn-danger btn-sm " data-toggle="tooltip" id="ELIMINARDURL" name="ELIMINARDURL" title="Eliminar" <?php echo $DISABLED2; ?> <?php if($TOTALTARJADR>0){echo "disabled";}?> >
                                                                                    <i class="ti-close"></i><br> Eliminar
                                                                                </button>
                                                                            <?php } ?>
                                                                            <button type="button" class="btn  btn-primary  btn-sm  " data-toggle="tooltip" title="Tarjas" id="defecto" name="tarjas" Onclick="abrirPestana('../../assest/documento/informeTarjasDrecepcion.php?parametro=<?php echo $s['ID_DRECEPCION']; ?>&usuario=<?php echo $IDUSUARIOS; ?>'); ">
                                                                                <i class="fa fa-file-pdf-o"></i><br> Tarja
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </td>
                                                                <td><?php echo $CODIGOPRODUCTO; ?></td>
                                                                <td><?php echo $NOMBREPRODUCTO; ?></td>
                                                                <td><?php echo $NOMBRETUMEDIDA; ?></td>
                                                                <td><?php echo $s['CANTIDAD']; ?></td>
                                                                <td><?php echo $s['VALOR_UNITARIO']; ?></td>
                                                                <td><?php echo $TOTALTARJADR; ?></td>
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
                <?php include_once "../../assest/config/menuExtraMaterial.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../../assest/config/urlBase.php"; ?>
        <?php         
            //OPERACIONES
            //OPERACION DE REGISTRO DE FILA
            if (isset($_REQUEST['CREAR'])) {
                $ARRAYNUMERO = $RECEPCIONM_ADO->obtenerNumero($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
                $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;
                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
                $RECEPCIONM->__SET('NUMERO_RECEPCION', $NUMERO);
                $RECEPCIONM->__SET('FECHA_RECEPCION', $_REQUEST['FECHARECEPCION']);
                $RECEPCIONM->__SET('NUMERO_DOCUMENTO_RECEPCION', $_REQUEST['NUMERODOCUMENTO']);
                $RECEPCIONM->__SET('PATENTE_CAMION', $_REQUEST['PATENTECAMION']);
                $RECEPCIONM->__SET('PATENTE_CARRO', $_REQUEST['PATENTECARRO']);
                $RECEPCIONM->__SET('OBSERVACIONES_RECEPCION', $_REQUEST['OBSERVACION']);
                $RECEPCIONM->__SET('TRECEPCION', $_REQUEST['TRECEPCION']);
                if ($_REQUEST['TRECEPCION'] == "1") {
                    if (isset($_REQUEST['SNOCOMPRA']) == "on") {
                        $SNOCOMPRAR = "1";
                        $RECEPCIONM->__SET('ID_OCOMPRA', $_REQUEST['OCOMPRA']);
                        $RECEPCIONM->__SET('ID_PROVEEDOR', $_REQUEST['PROVEEDORE']);
                    } else {
                        $SNOCOMPRAR = "0";
                        $RECEPCIONM->__SET('ID_PROVEEDOR', $_REQUEST['PROVEEDOR']);
                    }
                    $RECEPCIONM->__SET('SNOCOMPRA', $SNOCOMPRAR);
                }
                if ($_REQUEST['TRECEPCION'] == "2") {
                    $RECEPCIONM->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
                }
                if ($_REQUEST['TRECEPCION'] == "3") {
                    $RECEPCIONM->__SET('ID_PLANTA2', $_REQUEST['PLANTA2']);
                }
                $RECEPCIONM->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                $RECEPCIONM->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
                $RECEPCIONM->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
                $RECEPCIONM->__SET('ID_BODEGA', $_REQUEST['BODEGA']);
                $RECEPCIONM->__SET('ID_TDOCUMENTO', $_REQUEST['TDOCUMENTO']);
                $RECEPCIONM->__SET('ID_TRANSPORTE', $_REQUEST['TRANSPORTE']);
                $RECEPCIONM->__SET('ID_CONDUCTOR', $_REQUEST['CONDUCTOR']);
                $RECEPCIONM->__SET('ID_USUARIOI', $IDUSUARIOS);
                $RECEPCIONM->__SET('ID_USUARIOM', $IDUSUARIOS);
                $RECEPCIONM->__SET('RESPONSABLE', $_REQUEST['RESPONSABLE']);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $RECEPCIONM_ADO->agregarRecepcion($RECEPCIONM);


                //OBTENER EL ID DE LA RECEPCIONM CREADA PARA LUEGO ENVIAR EL INGRESO DEL DETALLE
                $ARRYAOBTENERID = $RECEPCIONM_ADO->buscarID(
                    $_REQUEST['FECHARECEPCION'],
                    $_REQUEST['OBSERVACION'],
                    $_REQUEST['EMPRESA'],
                    $_REQUEST['PLANTA'],
                    $_REQUEST['TEMPORADA'],
                );

                $AUSUARIO_ADO->agregarAusuario2($NUMERO,2,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Recepción Materiales.","material_recepcionm", $ARRYAOBTENERID[0]['ID_RECEPCION'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

                //REDIRECCIONAR A PAGINA registroRecepcion.php 
                $id_dato = $ARRYAOBTENERID[0]['ID_RECEPCION'];
                $accion_dato = "crear";
                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Creado",
                        text:"El registro de recepcion se ha creado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroRecepcionm.php?op&id='.$id_dato.'&a='.$accion_dato.'";                            
                    })
                </script>';
            }
            //OPERACION EDICION DE FILA
            if (isset($_REQUEST['GUARDAR'])) {
                
                $ARRAYDRECEPCIONSIDOCOMPRA = $DRECEPCIONM_ADO->listarDrecepcionPorRecepcionSiDocompra2CBX($_REQUEST['IDP']);    
                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
                $RECEPCIONM->__SET('FECHA_RECEPCION', $_REQUEST['FECHARECEPCION']);
                $RECEPCIONM->__SET('NUMERO_DOCUMENTO_RECEPCION', $_REQUEST['NUMERODOCUMENTO']);
                $RECEPCIONM->__SET('PATENTE_CAMION', $_REQUEST['PATENTECAMIONE']);
                $RECEPCIONM->__SET('PATENTE_CARRO', $_REQUEST['PATENTECARROE']);
                $RECEPCIONM->__SET('OBSERVACIONES_RECEPCION', $_REQUEST['OBSERVACION']);
                $RECEPCIONM->__SET('TOTAL_CANTIDAD_RECEPCION', $_REQUEST['TOTALCANTIDAD']);
                $RECEPCIONM->__SET('TRECEPCION', $_REQUEST['TRECEPCIONE']);
                if ($_REQUEST['TRECEPCIONE'] == "1") {
                    if(empty($ARRAYDRECEPCIONSIDOCOMPRA)){
                        if (isset($_REQUEST['SNOCOMPRA']) == "on") {
                            $SNOCOMPRAR = "1";          
                            $RECEPCIONM->__SET('ID_OCOMPRA', $_REQUEST['OCOMPRA']);
                            $RECEPCIONM->__SET('ID_PROVEEDOR', $_REQUEST['PROVEEDORE']);
                        } else {
                            $SNOCOMPRAR = "0";            
                            $RECEPCIONM->__SET('ID_PROVEEDOR', $_REQUEST['PROVEEDOR']);
                        }
                    }else{
                        if (isset($_REQUEST['SNOCOMPRAE']) == "on") {
                            $SNOCOMPRAR = "1";          
                            $RECEPCIONM->__SET('ID_OCOMPRA', $_REQUEST['OCOMPRAE']);
                            $RECEPCIONM->__SET('ID_PROVEEDOR', $_REQUEST['PROVEEDORE']);
                        } else {
                            $SNOCOMPRAR = "0";            
                            $RECEPCIONM->__SET('ID_PROVEEDOR', $_REQUEST['PROVEEDOR']);
                        }
                    }
                    $RECEPCIONM->__SET('SNOCOMPRA', $SNOCOMPRAR);
                }
                if ($_REQUEST['TRECEPCIONE'] == "2") {
                    $RECEPCIONM->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTORE']);
                }
                if ($_REQUEST['TRECEPCIONE'] == "3") {
                    $RECEPCIONM->__SET('ID_PLANTA2', $_REQUEST['PLANTA2E']);
                }
                $RECEPCIONM->__SET('ID_BODEGA', $_REQUEST['BODEGAE']);
                $RECEPCIONM->__SET('ID_TDOCUMENTO', $_REQUEST['TDOCUMENTOE']);
                $RECEPCIONM->__SET('ID_TRANSPORTE', $_REQUEST['TRANSPORTEE']);
                $RECEPCIONM->__SET('ID_CONDUCTOR', $_REQUEST['CONDUCTORE']);
                $RECEPCIONM->__SET('ID_USUARIOM', $IDUSUARIOS);
                $RECEPCIONM->__SET('ID_RECEPCION', $_REQUEST['IDP']);
                $RECEPCIONM->__SET('RESPONSABLE', $_REQUEST['RESPONSABLEE']);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $RECEPCIONM_ADO->actualizarRecepcion($RECEPCIONM);

                $AUSUARIO_ADO->agregarAusuario2($NUMEROVER,2,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de Recepción Materiales.","material_recepcionm", $_REQUEST['IDP'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  
                
                
                if ($accion_dato == "crear") {
                    $id_dato = $_REQUEST['IDP'];
                    $accion_dato = "crear";
                    echo '<script>
                        Swal.fire({
                            icon:"info",
                            title:"Registro Modificado",
                            text:"El registro de recepcion se ha modificada correctamente",
                            showConfirmButton: true,
                            confirmButtonText:"Cerrar",
                            closeOnConfirm:false
                        }).then((result)=>{
                            location.href = "registroRecepcionm.php?op&id='.$id_dato.'&a='.$accion_dato.'";                            
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
                            text:"El registro de recepcion se ha modificada correctamente",
                            showConfirmButton: true,
                            confirmButtonText:"Cerrar",
                            closeOnConfirm:false
                        }).then((result)=>{
                            location.href = "registroRecepcionm.php?op&id='.$id_dato.'&a='.$accion_dato.'";                            
                        })
                    </script>';
                }
            }
            //OPERACION PARA CERRAR LA RECEPCIONM
            if (isset($_REQUEST['CERRAR'])) {
                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO  
                $ARRAYDRECEPCION2 = $DRECEPCIONM_ADO->listarDrecepcionPorRecepcionCBX($_REQUEST['IDP']);
                if (empty($ARRAYDRECEPCION2)) {
                    echo '<script>
                            Swal.fire({
                                icon:"warning",
                                title:"Accion restringida",
                                text:"Tiene que haber al menos un registro en el detalle",
                                showConfirmButton: true,
                                confirmButtonText:"Cerrar",
                                closeOnConfirm:false
                            })
                        </script>';
                    $SINO = "1";
                } else  if ($_REQUEST['DIFERENCIA'] == 0) {
                    $MENSAJE = "";
                    $SINO = "0";
                } else {
                    echo '<script>
                            Swal.fire({
                                icon:"warning",
                                title:"Accion restringida",
                                text:"La diferencia tiene que ser cero.",
                                showConfirmButton: true,
                                confirmButtonText:"Cerrar",
                                closeOnConfirm:false
                            })
                        </script>';
                    $SINO = "1";
                }

                if ($SINO == "0") {
                    
                    $ARRAYDRECEPCIONSIDOCOMPRA = $DRECEPCIONM_ADO->listarDrecepcionPorRecepcionSiDocompra2CBX($_REQUEST['IDP']);
                    $RECEPCIONM->__SET('FECHA_RECEPCION', $_REQUEST['FECHARECEPCION']);
                    $RECEPCIONM->__SET('NUMERO_DOCUMENTO_RECEPCION', $_REQUEST['NUMERODOCUMENTO']);
                    $RECEPCIONM->__SET('PATENTE_CAMION', $_REQUEST['PATENTECAMIONE']);
                    $RECEPCIONM->__SET('PATENTE_CARRO', $_REQUEST['PATENTECARROE']);
                    $RECEPCIONM->__SET('OBSERVACIONES_RECEPCION', $_REQUEST['OBSERVACION']);
                    $RECEPCIONM->__SET('TOTAL_CANTIDAD_RECEPCION', $_REQUEST['TOTALCANTIDAD']);
                    $RECEPCIONM->__SET('TRECEPCION', $_REQUEST['TRECEPCIONE']);
                    if ($_REQUEST['TRECEPCIONE'] == "1") {
                        if(empty($ARRAYDRECEPCIONSIDOCOMPRA)){
                            if (isset($_REQUEST['SNOCOMPRA']) == "on") {
                                $SNOCOMPRAR = "1";          
                                $RECEPCIONM->__SET('ID_OCOMPRA', $_REQUEST['OCOMPRA']);
                                $RECEPCIONM->__SET('ID_PROVEEDOR', $_REQUEST['PROVEEDORE']);
                            } else {
                                $SNOCOMPRAR = "0";            
                                $RECEPCIONM->__SET('ID_PROVEEDOR', $_REQUEST['PROVEEDOR']);
                            }
                        }else{
                            if (isset($_REQUEST['SNOCOMPRAE']) == "on") {
                                $SNOCOMPRAR = "1";          
                                $RECEPCIONM->__SET('ID_OCOMPRA', $_REQUEST['OCOMPRAE']);
                                $RECEPCIONM->__SET('ID_PROVEEDOR', $_REQUEST['PROVEEDORE']);
                            } else {
                                $SNOCOMPRAR = "0";            
                                $RECEPCIONM->__SET('ID_PROVEEDOR', $_REQUEST['PROVEEDOR']);
                            }
                        }
                        $RECEPCIONM->__SET('SNOCOMPRA', $SNOCOMPRAR);
                    }
                    if ($_REQUEST['TRECEPCIONE'] == "2") {
                        $RECEPCIONM->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTORE']);
                    }
                    if ($_REQUEST['TRECEPCIONE'] == "3") {
                        $RECEPCIONM->__SET('ID_PLANTA2', $_REQUEST['PLANTA2E']);
                    }
                    $RECEPCIONM->__SET('ID_BODEGA', $_REQUEST['BODEGAE']);
                    $RECEPCIONM->__SET('ID_TDOCUMENTO', $_REQUEST['TDOCUMENTOE']);
                    $RECEPCIONM->__SET('ID_TRANSPORTE', $_REQUEST['TRANSPORTEE']);
                    $RECEPCIONM->__SET('ID_CONDUCTOR', $_REQUEST['CONDUCTORE']);
                    $RECEPCIONM->__SET('ID_USUARIOM', $IDUSUARIOS);
                    $RECEPCIONM->__SET('ID_RECEPCION', $_REQUEST['IDP']);
                    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                    $RECEPCIONM_ADO->actualizarRecepcion($RECEPCIONM);


                    $RECEPCIONM->__SET('ID_RECEPCION', $_REQUEST['IDP']);
                    $RECEPCIONM_ADO->cerrado($RECEPCIONM);


                    $ARRAYDRECEPCION2 = $DRECEPCIONM_ADO->listarDrecepcionPorRecepcionCBX($_REQUEST['IDP']);
                    foreach ($ARRAYDRECEPCION2 as $r) :
                        $DRECEPCIONM->__SET('ID_DRECEPCION', $r['ID_DRECEPCION']);
                        //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                        $DRECEPCIONM_ADO->cerrado($DRECEPCIONM);
                    endforeach;


                    $ARRAYDTRECEPCION = $TARJAM_ADO->listarTarjaPorRecepcionCBX($_REQUEST['IDP']);
                    foreach ($ARRAYDTRECEPCION as $r) :
                        $TARJAM->__SET('ID_TARJA', $r['ID_TARJA']);
                        //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                        $TARJAM_ADO->cerrado($TARJAM);
                    endforeach;

                    $ARRAYINVENTARIORECEPCION = $INVENTARIOM_ADO->buscarPorRecepcion($_REQUEST['IDP']);
                    foreach ($ARRAYINVENTARIORECEPCION as $r) :
                        $INVENTARIOM->__SET('ID_INVENTARIO', $r['ID_INVENTARIO']);
                        //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                        $INVENTARIOM_ADO->disponible($INVENTARIOM);
                    endforeach;


                    $AUSUARIO_ADO->agregarAusuario2($NUMEROVER,2,3,"".$_SESSION["NOMBRE_USUARIO"].", Cerrar  Recepción Materiales.","material_recepcionm", $_REQUEST['IDP'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

                    //REDIRECCIONAR A PAGINA registroRecepcion.php 
                    //SEGUNE EL TIPO DE OPERACIONS QUE SE INDENTIFIQUE EN LA URL                    
                    if ($accion_dato == "crear") {
                        $id_dato = $_REQUEST['IDP'];
                        $accion_dato = "ver";
                        echo '<script>
                            Swal.fire({
                                icon:"info",
                                title:"Registro Cerrado",
                                text:"Este recepcion se encuentra cerrada y no puede ser modificada.",
                                showConfirmButton: true,
                                confirmButtonText:"Cerrar",
                                closeOnConfirm:false
                            }).then((result)=>{
                                location.href = "registroRecepcionm.php?op&id='.$id_dato.'&a='.$accion_dato.'";                                    
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
                                text:"Este recepcion se encuentra cerrada y no puede ser modificada.",
                                showConfirmButton: true,
                                confirmButtonText:"Cerrar",
                                closeOnConfirm:false
                            }).then((result)=>{
                                location.href = "registroRecepcionm.php?op&id='.$id_dato.'&a='.$accion_dato.'";                                    
                            })
                        </script>';
                    }   
                }
            }
        ?>
</body>

</html>