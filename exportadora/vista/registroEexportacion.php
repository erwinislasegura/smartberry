<?php

include_once "../../assest/config/validarUsuarioExpo.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/ESPECIES_ADO.php';
include_once '../../assest/controlador/TETIQUETA_ADO.php';
include_once '../../assest/controlador/TEMBALAJE_ADO.php';
include_once '../../assest/controlador/ECOMERCIAL_ADO.php';



include_once '../../assest/controlador/EEXPORTACION_ADO.php';
include_once '../../assest/modelo/EEXPORTACION.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$ESPECIES_ADO =  new ESPECIES_ADO();
$TETIQUETA_ADO =  new TETIQUETA_ADO();
$TEMBALAJE_ADO =  new TEMBALAJE_ADO();
$ECOMERCIAL_ADO =  new ECOMERCIAL_ADO();

$EEXPORTACION_ADO =  new EEXPORTACION_ADO();
//INIICIALIZAR MODELO
$EEXPORTACION =  new EEXPORTACION();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$IDOP = "";
$OP = "";
$DISABLED = "";


$CODIGOESTANDAR = "";
$NOMBREESTANDAR = "";
$PESONETOESTANDAR = "";
$ENVASEPALLETESTANDAR = "";
$PESOBRUTOESTANDAR = "";
$PESOPALLETESTANDAR = "";
$PESOENVASESTANDAR = "";
$DESHIDRATACIONESTANDAR = "";
$ESPECIES = "";
$ETIQUETA = "";
$TEMBALAJE = "";
$ECOMERCIAL = "";
$EMBOLSADO = "";
$STOCK = "";
$CATEGORIA="";
$REFERENCIA="";
$COLOR="";
$VARIEDAD="";
$ESTADO = "";
$CONTADOR=0;



//INICIALIZAR ARREGLOS
$ARRAYESTANDAR = "";
$ARRAYESTANDARID = "";

$ARRAYESPECIES = "";
$ARRAYETIQUETA = "";
$ARRAYTEMBALAJE = "";
$ARRAYECOMERCIAL = "";
$ARRAYMERCADO = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYESTANDAR = $EEXPORTACION_ADO->listarEstandarPorEmpresaCBX($EMPRESAS);
$ARRAYESPECIES = $ESPECIES_ADO->listarEspeciesCBX();
$ARRAYETIQUETA  = $TETIQUETA_ADO->listarEtiquetaPorEmpresaCBX($EMPRESAS);
$ARRAYTEMBALAJE  = $TEMBALAJE_ADO->listarEmbalajePorEmpresaCBX($EMPRESAS);
$ARRAYECOMERCIAL = $ECOMERCIAL_ADO->listarEcomercialPorEmpresaCBX($EMPRESAS);
include_once "../../assest/config/validarDatosUrl.php";
include_once "../../assest/config/datosUrl.php";


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
//PARA OPERACIONES DE EDICION Y VISUALIZACION
//PREGUNTA SI LA URL VIENE  CON DATOS "parametro" y "parametro1"
if (isset($id_dato) && isset($accion_dato)) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $id_dato;
    $OP = $accion_dato;



    //IDENTIFICACIONES DE OPERACIONES    //OPERACION DE CAMBIO DE ESTADO
    //0 = DESACTIVAR
    if ($OP == "0") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION
        $DISABLED = "disabled";
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYESTANDARID = $EEXPORTACION_ADO->verEstandar($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYESTANDARID as $r) :

            $CODIGOESTANDAR = "" . $r['CODIGO_ESTANDAR'];
            $NOMBREESTANDAR = "" . $r['NOMBRE_ESTANDAR'];
            $ENVASEPALLETESTANDAR = "" . $r['CANTIDAD_ENVASE_ESTANDAR'];
            $PESONETOESTANDAR = "" . $r['PESO_NETO_ESTANDAR'];
            $DESHIDRATACIONESTANDAR = "" . $r['PDESHIDRATACION_ESTANDAR'];
            $PESOBRUTOESTANDAR = "" . $r['PESO_BRUTO_ESTANDAR'];
            $PESOPALLETESTANDAR = "" . $r['PESO_PALLET_ESTANDAR'];
            $PESOENVASESTANDAR = "" . $r['PESO_ENVASE_ESTANDAR'];
            $EMBOLSADO = "" . $r['EMBOLSADO'];
            $STOCK = "" . $r['STOCK'];
            $CATEGORIA = "" . $r['TCATEGORIA'];
            $REFERENCIA = "" . $r['TREFERENCIA'];
            $COLOR = "" . $r['TCOLOR'];
            $VARIEDAD = "" . $r['TVARIEDAD'];
            $ESPECIES = "" . $r['ID_ESPECIES'];
            $ETIQUETA = "" . $r['ID_TETIQUETA'];
            $TEMBALAJE = "" . $r['ID_TEMBALAJE'];
            $ECOMERCIAL = "" . $r['ID_ECOMERCIAL'];
        endforeach;
    }
    //1 = ACTIVAR
    if ($OP == "1") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION
        $DISABLED = "disabled";
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYESTANDARID = $EEXPORTACION_ADO->verEstandar($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYESTANDARID as $r) :

            $CODIGOESTANDAR = "" . $r['CODIGO_ESTANDAR'];
            $NOMBREESTANDAR = "" . $r['NOMBRE_ESTANDAR'];
            $ENVASEPALLETESTANDAR = "" . $r['CANTIDAD_ENVASE_ESTANDAR'];
            $PESONETOESTANDAR = "" . $r['PESO_NETO_ESTANDAR'];
            $DESHIDRATACIONESTANDAR = "" . $r['PDESHIDRATACION_ESTANDAR'];
            $PESOBRUTOESTANDAR = "" . $r['PESO_BRUTO_ESTANDAR'];
            $PESOPALLETESTANDAR = "" . $r['PESO_PALLET_ESTANDAR'];
            $PESOENVASESTANDAR = "" . $r['PESO_ENVASE_ESTANDAR'];
            $EMBOLSADO = "" . $r['EMBOLSADO'];
            $STOCK = "" . $r['STOCK'];
            $CATEGORIA = "" . $r['TCATEGORIA'];
            $REFERENCIA = "" . $r['TREFERENCIA'];
            $COLOR = "" . $r['TCOLOR'];
            $VARIEDAD = "" . $r['TVARIEDAD'];
            $ESPECIES = "" . $r['ID_ESPECIES'];
            $ETIQUETA = "" . $r['ID_TETIQUETA'];
            $TEMBALAJE = "" . $r['ID_TEMBALAJE'];
            $ECOMERCIAL = "" . $r['ID_ECOMERCIAL'];
        endforeach;

    }
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYESTANDARID = $EEXPORTACION_ADO->verEstandar($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA


        foreach ($ARRAYESTANDARID as $r) :

            $CODIGOESTANDAR = "" . $r['CODIGO_ESTANDAR'];
            $NOMBREESTANDAR = "" . $r['NOMBRE_ESTANDAR'];
            $ENVASEPALLETESTANDAR = "" . $r['CANTIDAD_ENVASE_ESTANDAR'];
            $PESONETOESTANDAR = "" . $r['PESO_NETO_ESTANDAR'];
            $DESHIDRATACIONESTANDAR = "" . $r['PDESHIDRATACION_ESTANDAR'];
            $PESOBRUTOESTANDAR = "" . $r['PESO_BRUTO_ESTANDAR'];
            $PESOPALLETESTANDAR = "" . $r['PESO_PALLET_ESTANDAR'];
            $PESOENVASESTANDAR = "" . $r['PESO_ENVASE_ESTANDAR'];
            $EMBOLSADO = "" . $r['EMBOLSADO'];
            $STOCK = "" . $r['STOCK'];
            $CATEGORIA = "" . $r['TCATEGORIA'];
            $REFERENCIA = "" . $r['TREFERENCIA'];
            $COLOR = "" . $r['TCOLOR'];
            $VARIEDAD = "" . $r['TVARIEDAD'];
            $ESPECIES = "" . $r['ID_ESPECIES'];
            $ETIQUETA = "" . $r['ID_TETIQUETA'];
            $TEMBALAJE = "" . $r['ID_TEMBALAJE'];
            $ECOMERCIAL = "" . $r['ID_ECOMERCIAL'];

        endforeach;
    }

    //ver =  OBTENCION DE DATOS PARA LA VISUALIZAAR INFORMAICON DE REGISTRO
    if ($OP == "ver") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION
        $DISABLED = "disabled";
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYESTANDARID = $EEXPORTACION_ADO->verEstandar($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYESTANDARID as $r) :

            $CODIGOESTANDAR = "" . $r['CODIGO_ESTANDAR'];
            $NOMBREESTANDAR = "" . $r['NOMBRE_ESTANDAR'];
            $ENVASEPALLETESTANDAR = "" . $r['CANTIDAD_ENVASE_ESTANDAR'];
            $PESONETOESTANDAR = "" . $r['PESO_NETO_ESTANDAR'];
            $DESHIDRATACIONESTANDAR = "" . $r['PDESHIDRATACION_ESTANDAR'];
            $PESOBRUTOESTANDAR = "" . $r['PESO_BRUTO_ESTANDAR'];
            $PESOPALLETESTANDAR = "" . $r['PESO_PALLET_ESTANDAR'];
            $PESOENVASESTANDAR = "" . $r['PESO_ENVASE_ESTANDAR'];
            $EMBOLSADO = "" . $r['EMBOLSADO'];
            $STOCK = "" . $r['STOCK'];
            $CATEGORIA = "" . $r['TCATEGORIA'];
            $REFERENCIA = "" . $r['TREFERENCIA'];
            $COLOR = "" . $r['TCOLOR'];
            $VARIEDAD = "" . $r['TVARIEDAD'];
            $ESPECIES = "" . $r['ID_ESPECIES'];
            $ETIQUETA = "" . $r['ID_TETIQUETA'];
            $TEMBALAJE = "" . $r['ID_TEMBALAJE'];
            $ECOMERCIAL = "" . $r['ID_ECOMERCIAL'];
        endforeach;
    }
}




?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Estandar Exportacion</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../../assest/config/urlHead.php"; ?>
        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
                //VALIDACION DE FORMULARIO


                function envases(){
                    var pesoenvase
                    var repuesta;
                    PESONETOESTANDAR = document.getElementById("PESONETOESTANDAR").value;
                    PESOBRUTOESTANDAR = document.getElementById("PESOBRUTOESTANDAR").value;
                    
                    document.getElementById('val_netoee').innerHTML = "";
                    document.getElementById('val_bruto').innerHTML = "";

                    
                    if (PESONETOESTANDAR == null || PESONETOESTANDAR == "" || PESONETOESTANDAR < 0) {
                        document.form_reg_dato.PESONETOESTANDAR.focus();
                        document.form_reg_dato.PESONETOESTANDAR.style.borderColor = "#FF0000";
                        document.getElementById('val_netoee').innerHTML = "NO A INGRESADO DATO";
                        repuesta = 1;
                    }else{
                        repuesta = 0;
                        document.form_reg_dato.PESONETOESTANDAR.style.borderColor = "#4AF575";
                    }
                    if (PESOBRUTOESTANDAR == null || PESOBRUTOESTANDAR == "" || PESOBRUTOESTANDAR < 0) {
                        document.form_reg_dato.PESOBRUTOESTANDAR.focus();
                        document.form_reg_dato.PESOBRUTOESTANDAR.style.borderColor = "#FF0000";
                        document.getElementById('val_bruto').innerHTML = "NO A INGRESADO DATO";   
                        repuesta = 1;
                    }else{
                        repuesta = 0;
                        document.form_reg_dato.PESONETOESTANDAR.style.borderColor = "#4AF575";
                    }                    
                    if (repuesta == 0) {

                        PESONETOESTANDAR = parseFloat(document.getElementById("PESONETOESTANDAR").value);
                        PESOBRUTOESTANDAR = parseFloat(document.getElementById("PESOBRUTOESTANDAR").value);
                        pesoenvase=PESOBRUTOESTANDAR-PESONETOESTANDAR;
                    }
                    document.getElementById('PESOENVASESTANDAR').value = pesoenvase;
                }
                function validacion() {


                    CODIGOESTANDAR = document.getElementById("CODIGOESTANDAR").value;
                    NOMBREESTANDAR = document.getElementById("NOMBREESTANDAR").value;
                    PESONETOESTANDAR = document.getElementById("PESONETOESTANDAR").value;
                    PESOBRUTOESTANDAR = document.getElementById("PESOBRUTOESTANDAR").value;
                    ENVASEPALLETESTANDAR = document.getElementById("ENVASEPALLETESTANDAR").value;
                    PESOPALLETESTANDAR = document.getElementById("PESOPALLETESTANDAR").value;
                    PESOENVASESTANDAR = document.getElementById("PESOENVASESTANDAR").value;
                    DESHIDRATACIONESTANDAR = document.getElementById("DESHIDRATACIONESTANDAR").value;

                    ESPECIES = document.getElementById("ESPECIES").selectedIndex;
                    ETIQUETA = document.getElementById("ETIQUETA").selectedIndex;
                    EMBOLSADO = document.getElementById("EMBOLSADO").selectedIndex;


                    CATEGORIA = document.getElementById("CATEGORIA").selectedIndex;
                    REFERENCIA = document.getElementById("REFERENCIA").selectedIndex;
                    COLOR = document.getElementById("COLOR").selectedIndex;
                    VARIEDAD = document.getElementById("VARIEDAD").selectedIndex;
                    STOCK = document.getElementById("STOCK").selectedIndex;
                    

                    TEMBALAJE = document.getElementById("TEMBALAJE").selectedIndex;
                    ECOMERCIAL = document.getElementById("ECOMERCIAL").selectedIndex;

                    document.getElementById('val_codigo').innerHTML = "";
                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_netoee').innerHTML = "";
                    document.getElementById('val_bruto').innerHTML = "";
                    document.getElementById('val_cajapee').innerHTML = "";
                    document.getElementById('val_pallet').innerHTML = "";
                    document.getElementById('val_envase').innerHTML = "";
                    document.getElementById('val_deshidrataciones').innerHTML = "";


                    document.getElementById('val_etiqueta').innerHTML = "";
                    document.getElementById('val_embolsado').innerHTML = "";

                    document.getElementById('val_categoria').innerHTML = "";
                    document.getElementById('val_refetencia').innerHTML = "";
                    document.getElementById('val_color').innerHTML = "";
                    document.getElementById('val_stock').innerHTML = "";
                    document.getElementById('val_variedad').innerHTML = "";

                    document.getElementById('val_embalaje').innerHTML = "";
                    document.getElementById('val_ec').innerHTML = "";

                    if (CODIGOESTANDAR == null || CODIGOESTANDAR == 0) {
                        document.form_reg_dato.CODIGOESTANDAR.focus();
                        document.form_reg_dato.CODIGOESTANDAR.style.borderColor = "#FF0000";
                        document.getElementById('val_codigo').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.CODIGOESTANDAR.style.borderColor = "#4AF575";

                    if (NOMBREESTANDAR == null || NOMBREESTANDAR == 0) {
                        document.form_reg_dato.NOMBREESTANDAR.focus();
                        document.form_reg_dato.NOMBREESTANDAR.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBREESTANDAR.style.borderColor = "#4AF575";

                    if (PESONETOESTANDAR == null || PESONETOESTANDAR == "" || PESONETOESTANDAR < 0) {
                        document.form_reg_dato.PESONETOESTANDAR.focus();
                        document.form_reg_dato.PESONETOESTANDAR.style.borderColor = "#FF0000";
                        document.getElementById('val_netoee').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.PESONETOESTANDAR.style.borderColor = "#4AF575";


                    if (PESOBRUTOESTANDAR == null || PESOBRUTOESTANDAR == "" || PESOBRUTOESTANDAR < 0) {
                        document.form_reg_dato.PESOBRUTOESTANDAR.focus();
                        document.form_reg_dato.PESOBRUTOESTANDAR.style.borderColor = "#FF0000";
                        document.getElementById('val_bruto').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.PESONETOESTANDAR.style.borderColor = "#4AF575";

                    if (DESHIDRATACIONESTANDAR == null || DESHIDRATACIONESTANDAR == "" || DESHIDRATACIONESTANDAR < 0) {
                        document.form_reg_dato.DESHIDRATACIONESTANDAR.focus();
                        document.form_reg_dato.DESHIDRATACIONESTANDAR.style.borderColor = "#FF0000";
                        document.getElementById('val_deshidrataciones').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DESHIDRATACIONESTANDAR.style.borderColor = "#4AF575";



                    if (ENVASEPALLETESTANDAR == null || ENVASEPALLETESTANDAR == "") {
                        document.form_reg_dato.ENVASEPALLETESTANDAR.focus();
                        document.form_reg_dato.ENVASEPALLETESTANDAR.style.borderColor = "#FF0000";
                        document.getElementById('val_cajapee').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.ENVASEPALLETESTANDAR.style.borderColor = "#4AF575";


                    if (PESOPALLETESTANDAR == null || PESOPALLETESTANDAR == "" | PESOPALLETESTANDAR < 0) {
                        document.form_reg_dato.PESOPALLETESTANDAR.focus();
                        document.form_reg_dato.PESOPALLETESTANDAR.style.borderColor = "#FF0000";
                        document.getElementById('val_pallet').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.PESOPALLETESTANDAR.style.borderColor = "#4AF575";

                    if (ESPECIES == null || ESPECIES == 0) {
                        document.form_reg_dato.ESPECIES.focus();
                        document.form_reg_dato.ESPECIES.style.borderColor = "#FF0000";
                        document.getElementById('val_especies').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.ESPECIES.style.borderColor = "#4AF575";

                    if (TEMBALAJE == null || TEMBALAJE == 0) {
                        document.form_reg_dato.TEMBALAJE.focus();
                        document.form_reg_dato.TEMBALAJE.style.borderColor = "#FF0000";
                        document.getElementById('val_embalaje').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.TEMBALAJE.style.borderColor = "#4AF575";

                    if (ETIQUETA == null || ETIQUETA == 0) {
                        document.form_reg_dato.ETIQUETA.focus();
                        document.form_reg_dato.ETIQUETA.style.borderColor = "#FF0000";
                        document.getElementById('val_etiqueta').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.ETIQUETA.style.borderColor = "#4AF575";

                    if (EMBOLSADO == null || EMBOLSADO == 0) {
                        document.form_reg_dato.EMBOLSADO.focus();
                        document.form_reg_dato.EMBOLSADO.style.borderColor = "#FF0000";
                        document.getElementById('val_embolsado').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.EMBOLSADO.style.borderColor = "#4AF575";    

                    if (CATEGORIA == null || CATEGORIA == 0) {
                        document.form_reg_dato.CATEGORIA.focus();
                        document.form_reg_dato.CATEGORIA.style.borderColor = "#FF0000";
                        document.getElementById('val_categoria').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.CATEGORIA.style.borderColor = "#4AF575";

                    if (COLOR == null || COLOR == 0) {
                        document.form_reg_dato.COLOR.focus();
                        document.form_reg_dato.COLOR.style.borderColor = "#FF0000";
                        document.getElementById('val_color').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.COLOR.style.borderColor = "#4AF575";

                    if (VARIEDAD == null || VARIEDAD == 0) {
                        document.form_reg_dato.COLOR.focus();
                        document.form_reg_dato.COLOR.style.borderColor = "#FF0000";
                        document.getElementById('val_variedad').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.VARIEDAD.style.borderColor = "#4AF575";

                    if (REFERENCIA == null || REFERENCIA == 0) {
                        document.form_reg_dato.REFERENCIA.focus();
                        document.form_reg_dato.REFERENCIA.style.borderColor = "#FF0000";
                        document.getElementById('val_refetencia').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.REFERENCIA.style.borderColor = "#4AF575";

                    if (STOCK == null || STOCK == 0) {
                        document.form_reg_dato.STOCK.focus();
                        document.form_reg_dato.STOCK.style.borderColor = "#FF0000";
                        document.getElementById('val_stock').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.STOCK.style.borderColor = "#4AF575";

                    if (ECOMERCIAL == null || ECOMERCIAL == 0) {
                        document.form_reg_dato.ECOMERCIAL.focus();
                        document.form_reg_dato.ECOMERCIAL.style.borderColor = "#FF0000";
                        document.getElementById('val_ec').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.ECOMERCIAL.style.borderColor = "#4AF575";


                }
                //REDIRECCIONAR A LA PAGINA SELECIONADA
                function irPagina(url) {
                    location.href = "" + url;
                }

            </script>

</head>

<body class="hold-transition light-skin  sidebar-mini theme-primary" >
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <?php include_once "../../assest/config/menuExpo.php"; ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="container-full">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Estandar</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Mantenedores </li>
                                            <li class="breadcrumb-item" aria-current="page">Estandar </li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Registro Estandar Exportacion </a> </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <?php include_once "../../assest/config/verIndicadorEconomico.php"; ?>
                        </div>
                    </div>
                    <!-- Main content -->
                    <section class="content">
                        <div class="row">
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                <div class="box">
                                    <div class="box-header with-border bg-primary">
                                        <h4 class="box-title">Registro Estandar Exportación</h4>
                                    </div>
                                    <!-- /.box-header -->
                                    <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato"  >
                                        <div class="box-body">
                                            <hr class="my-15">
                                            <div class="row">
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Codigo </label>
                                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                        <input type="hidden" class="form-control" placeholder="EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                        <input type="text" class="form-control" placeholder="Codigo Estandar" id="CODIGOESTANDAR" name="CODIGOESTANDAR" value="<?php echo $CODIGOESTANDAR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_codigo" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Nombre </label>
                                                        <input type="text" class="form-control" placeholder="Nombre Estandar" id="NOMBREESTANDAR" name="NOMBREESTANDAR" value="<?php echo $NOMBREESTANDAR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nombre" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Peso Neto</label>
                                                        <input type="number" step="0.00001" class="form-control" onchange="envases()" placeholder="Peso Neto" id="PESONETOESTANDAR" name="PESONETOESTANDAR" value="<?php echo $PESONETOESTANDAR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_netoee" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Peso Bruto </label>
                                                        <input type="number" step="0.00001" class="form-control" onchange="envases()" placeholder="Peso Bruto" id="PESOBRUTOESTANDAR" name="PESOBRUTOESTANDAR" value="<?php echo $PESOBRUTOESTANDAR ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_bruto" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Peso Envase</label>
                                                        <input type="number" step="0.00001" class="form-control" placeholder="Peso Envase" id="PESOENVASESTANDAR" name="PESOENVASESTANDAR" value="<?php echo $PESOENVASESTANDAR ?>" <?php echo $DISABLED; ?> disabled />
                                                        <label id="val_envase" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>% Deshidratacion </label>
                                                        <input type="number" step="0.01" class="form-control" placeholder="% Deshidratacion" id="DESHIDRATACIONESTANDAR" name="DESHIDRATACIONESTANDAR" value="<?php echo $DESHIDRATACIONESTANDAR ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_deshidrataciones" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Envase Pallet</label>
                                                        <input type="number" class="form-control" placeholder="Envase Pallet " id="ENVASEPALLETESTANDAR" name="ENVASEPALLETESTANDAR" value="<?php echo $ENVASEPALLETESTANDAR ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_cajapee" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Peso Pallet</label>
                                                        <input type="number" class="form-control" step="0.01" placeholder="Peso Pallet" id="PESOPALLETESTANDAR" name="PESOPALLETESTANDAR" value="<?php echo $PESOPALLETESTANDAR ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_pallet" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label> Especies</label>
                                                        <select class="form-control select2" id="ESPECIES" name="ESPECIES" style="width: 100%;" value="<?php echo $ESPECIES; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYESPECIES as $r) : ?>
                                                                <?php if ($ARRAYESPECIES) {    ?>
                                                                    <option value="<?php echo $r['ID_ESPECIES']; ?>" <?php if ($ESPECIES == $r['ID_ESPECIES']) {  echo "selected";  } ?>>
                                                                        <?php echo $r['NOMBRE_ESPECIES'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No Hay Datos Registrados </option>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_especies" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Embalaje</label>
                                                        <select class="form-control select2" id="TEMBALAJE" name="TEMBALAJE" style="width: 100%;" value="<?php echo $TEMBALAJE; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYTEMBALAJE as $r) : ?>
                                                                <?php if ($ARRAYTEMBALAJE) {    ?>
                                                                    <option value="<?php echo $r['ID_TEMBALAJE']; ?>" <?php if ($TEMBALAJE == $r['ID_TEMBALAJE']) {  echo "selected";   } ?>>
                                                                        <?php echo $r['NOMBRE_TEMBALAJE'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No Hay Datos Registrados </option>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_embalaje" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Etiqueta</label>
                                                        <select class="form-control select2" id="ETIQUETA" name="ETIQUETA" style="width: 100%;" value="<?php echo $ETIQUETA; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYETIQUETA as $r) : ?>
                                                                <?php if ($ARRAYETIQUETA) {    ?>
                                                                    <option value="<?php echo $r['ID_TETIQUETA']; ?>" <?php if ($ETIQUETA == $r['ID_TETIQUETA']) {  echo "selected";  } ?>>
                                                                        <?php echo $r['NOMBRE_TETIQUETA'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No Hay Datos Registrados </option>
                                                                <?php } ?>

                                                            <?php endforeach; ?>

                                                        </select>
                                                        <label id="val_etiqueta" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Embolsado</label>
                                                        <select class="form-control select2" id="EMBOLSADO" name="EMBOLSADO" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <option value="0" <?php if ($EMBOLSADO == "0") { echo "selected"; } ?>>No</option>
                                                            <option value="1" <?php if ($EMBOLSADO == "1") { echo "selected"; } ?>> Si </option>
                                                        </select>
                                                        <label id="val_embolsado" class="validacion"> </label>
                                                    </div>
                                                </div>                             
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Categoria</label>
                                                        <select class="form-control select2" id="CATEGORIA" name="CATEGORIA" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <option value="0" <?php if ($CATEGORIA == "0") { echo "selected";  } ?>>No</option>
                                                            <option value="1" <?php if ($CATEGORIA == "1") { echo "selected"; } ?>> Si </option>
                                                        </select>
                                                        <label id="val_categoria" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Color</label>
                                                        <select class="form-control select2" id="COLOR" name="COLOR" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <option value="0" <?php if ($COLOR == "0") { echo "selected";  } ?>>No</option>
                                                            <option value="1" <?php if ($COLOR == "1") { echo "selected"; } ?>> Si </option>
                                                        </select>
                                                        <label id="val_color" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Variedad</label>
                                                        <select class="form-control select2" id="VARIEDAD" name="VARIEDAD" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <option value="0" <?php if ($VARIEDAD == "0") { echo "selected";  } ?>>No</option>
                                                            <option value="1" <?php if ($VARIEDAD == "1") { echo "selected"; } ?>> Si </option>
                                                        </select>
                                                        <label id="val_variedad" class="validacion"> </label>
                                                    </div>
                                                </div>       
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Referencia</label>
                                                        <select class="form-control select2" id="REFERENCIA" name="REFERENCIA" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <option value="0" <?php if ($REFERENCIA == "0") { echo "selected";  } ?>>No</option>
                                                            <option value="1" <?php if ($REFERENCIA == "1") { echo "selected"; } ?>> Si </option>
                                                        </select>
                                                        <label id="val_referencia" class="validacion"> </label>
                                                    </div>
                                                </div>     
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Stock</label>
                                                        <select class="form-control select2" id="STOCK" name="STOCK" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <option value="0" <?php if ($STOCK == "0") { echo "selected";  } ?>>No</option>
                                                            <option value="1" <?php if ($STOCK == "1") { echo "selected"; } ?>> Si </option>
                                                        </select>
                                                        <label id="val_stock" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Estandar Comercial</label>
                                                        <select class="form-control select2" id="ECOMERCIAL" name="ECOMERCIAL" style="width: 100%;" value="<?php echo $ECOMERCIAL; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYECOMERCIAL as $r) : ?>
                                                                <?php if ($ARRAYECOMERCIAL) {    ?>
                                                                    <option value="<?php echo $r['ID_ECOMERCIAL']; ?>" <?php if ($ECOMERCIAL == $r['ID_ECOMERCIAL']) {
                                                                                                                            echo "selected";
                                                                                                                        } ?>>
                                                                        <?php echo $r['NOMBRE_ECOMERCIAL'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No Hay Datos Registrados </option>
                                                                <?php } ?>
                                                            <?php endforeach; ?>

                                                        </select>
                                                        <label id="val_ec" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <div class="btn-group   col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12 " role="group" aria-label="Acciones generales">                                    
                                                <button type="button" class="btn  btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroEexportacion.php');">
                                                    <i class="ti-trash"></i>Cancelar
                                                </button>
                                                <?php if ($OP == "editar") { ?>
                                                    <button type="submit" class="btn btn-primary" name="EDITAR" value="EDITAR"   data-toggle="tooltip" title="Guardar" Onclick="return validacion()">
                                                        <i class="ti-save-alt"></i> Guardar
                                                    </button>
                                                <?php } else if($OP == "0") { ?>
                                                    <button type="submit" class="btn btn-danger" name="ELIMINAR" value="ELIMINAR"  data-toggle="tooltip" title="Deshabilitar"  >
                                                        <i class="ti-save-alt"></i> Deshabilitar
                                                    </button>
                                                <?php } else if($OP == "1"){ ?>                                                    
                                                    <button type="submit" class="btn btn-success" name="HABILITAR" value="HABILITAR"  data-toggle="tooltip" title="Habilitar"   >
                                                        <i class="ti-save-alt"></i> Habilitar
                                                    </button>
                                                <?php } else { ?>
                                                    <button type="submit" class="btn btn-primary" name="GUARDAR" value="GUARDAR"  data-toggle="tooltip" title="Guardar"  <?php echo $DISABLED; ?> Onclick="return validacion()">
                                                        <i class="ti-save-alt"></i> Guardar
                                                    </button>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.box -->
                            </div>
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                <div class="box">
                                    <div class="box-header with-border bg-info">
                                        <h4 class="box-title"> Agrupado Estandar Exportacion</h4>
                                    </div>
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <table id="listar" class="table-hover " style="width: 100%;">
                                                <thead>
                                                    <tr class="center">
                                                        <th>Numero </th>
                                                        <th>Operaciones</th>
                                                        <th>Codigo </th>
                                                        <th>Nombre </th>
                                                        <th>Peso Neto </th>
                                                        <th>Peso Bruto</th>
                                                        <th>Peso Envase</th>
                                                        <th>%  Deshidratacion</th>
                                                        <th>Peso Pallet </th>
                                                        <th>Envases Pallet </th>
                                                        <th>Especies </th>
                                                        <th>Embalaje </th>
                                                        <th>Etiqueta </th>
                                                        <th>Embolsado </th>
                                                        <th>Categoria </th>
                                                        <th>Color </th>
                                                        <th>Variedad </th>
                                                        <th>Referencia </th>
                                                        <th>Stock </th>
                                                        <th>Estandar Comercial</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYESTANDAR as $r) : ?>
                                                            <?php 
                                                            $CONTADOR+=1;  
                                                            $ARRAYVERESPECIES=$ESPECIES_ADO->verEspecies($r["ID_ESPECIES"]);
                                                            if($ARRAYVERESPECIES){
                                                                $NOMBREESPECIES = $ARRAYVERESPECIES[0]["NOMBRE_ESPECIES"];
                                                            }else{
                                                                $NOMBREESPECIES="Sin Datos";
                                                            }  
                                                            $ARRAYVERTETIQUETA=$TETIQUETA_ADO->verEtiqueta($r["ID_TETIQUETA"]);
                                                            if($ARRAYVERTETIQUETA){
                                                                $NOMBRETETIQUETA = $ARRAYVERTETIQUETA[0]["NOMBRE_TETIQUETA"];
                                                            }else{
                                                                $NOMBRETETIQUETA="Sin Datos";
                                                            }  
                                                            $ARRAYVERTEMBALAJE=$TEMBALAJE_ADO->verEmbalaje($r["ID_TEMBALAJE"]);
                                                            if($ARRAYVERTEMBALAJE){
                                                                $NOMBRETEMBALAJE = $ARRAYVERTEMBALAJE[0]["NOMBRE_TEMBALAJE"];
                                                            }else{
                                                                $NOMBRETEMBALAJE="Sin Datos";
                                                            }     
                                                            $ARRAYVERECOMERCIAL=$ECOMERCIAL_ADO->verEcomercial($r["ID_ECOMERCIAL"]);
                                                            if($ARRAYVERECOMERCIAL){
                                                                $NOMBREECOMERCIAL = $ARRAYVERECOMERCIAL[0]["NOMBRE_ECOMERCIAL"];
                                                            }else{
                                                                $NOMBREECOMERCIAL="Sin Datos";
                                                            }   
                                                            if($r["EMBOLSADO"]==0){
                                                                $NOMBREEMBOLSADO="No Aplica";
                                                            }else if($r["EMBOLSADO"]==1){
                                                                $NOMBREEMBOLSADO="Si Aplica";
                                                            }else{                                                                
                                                                $NOMBREEMBOLSADO="Sin Datos";
                                                            }                                                            
                                                            if($r["TCATEGORIA"]==0){
                                                                $NOMBRETCATEGORIA="No Aplica";
                                                            }else if($r["TCATEGORIA"]==1){
                                                                $NOMBRETCATEGORIA="Si Aplica";
                                                            }else{                                                                
                                                                $NOMBRETCATEGORIA="Sin Datos";
                                                            }                                                       
                                                            if($r["TCOLOR"]==0){
                                                                $NOMBRETCOLOR="No Aplica";
                                                            }else if($r["TCOLOR"]==1){
                                                                $NOMBRETCOLOR="Si Aplica";
                                                            }else{                                                                
                                                                $NOMBRETCOLOR="Sin Datos";
                                                            }                                                    
                                                            if($r["TVARIEDAD"]==0){
                                                                $NOMBRETVARIEDAD="No Aplica";
                                                            }else if($r["TVARIEDAD"]==1){
                                                                $NOMBRETVARIEDAD="Si Aplica";
                                                            }else{                                                                
                                                                $NOMBRETVARIEDAD="Sin Datos";
                                                            }                                                     
                                                            if($r["TREFERENCIA"]==0){
                                                                $NOMBRETREFERENCIA="No Aplica";
                                                            }else if($r["TREFERENCIA"]==1){
                                                                $NOMBRETREFERENCIA="Si Aplica";
                                                            }else{                                                                
                                                                $NOMBRETREFERENCIA="Sin Datos";
                                                            }                                              
                                                            if($r["STOCK"]==0){
                                                                $NOMBRESTOCK="No Aplica";
                                                            }else if($r["STOCK"]==1){
                                                                $NOMBRESTOCK="Si Aplica";
                                                            }else{                                                                
                                                                $NOMBRESTOCK="Sin Datos";
                                                            }
                                                            ?>
                                                        <tr class="center">
                                                            <td><?php echo $CONTADOR; ?> </td>                                                                         
                                                            <td class="text-center">
                                                                <form method="post" id="form1">
                                                                    <div class="list-icons d-inline-flex">
                                                                        <div class="list-icons-item dropdown">
                                                                            <button class="btn btn-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                <span class="icon-copy ti-settings"></span>
                                                                            </button>
                                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                                <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_ESTANDAR']; ?>" />
                                                                                <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroEexportacion" />
                                                                                <span href="#" class="dropdown-item" data-toggle="tooltip" title="Ver">
                                                                                    <button type="submit" class="btn btn-info btn-block  btn-sm" id="VERURL" name="VERURL">
                                                                                        <i class="ti-eye"></i> Ver
                                                                                    </button>
                                                                                </span> 
                                                                                <span href="#" class="dropdown-item" data-toggle="tooltip" title="Editar">
                                                                                    <button type="submit" class="btn  btn-warning btn-block   btn-sm" id="EDITARURL" name="EDITARURL">
                                                                                        <i class="ti-pencil-alt"></i> Editar
                                                                                    </button>
                                                                                </span>
                                                                                <?php if ($r['ESTADO_REGISTRO'] == 1) { ?>
                                                                                    <span href="#" class="dropdown-item" data-toggle="tooltip" title="Deshabilitar">
                                                                                        <button type="submit" class="btn btn-block btn-danger btn-sm" id="ELIMINARURL" name="ELIMINARURL">
                                                                                            <i class="ti-na "></i> Deshabilitar
                                                                                        </button>
                                                                                    </span>
                                                                                <?php } ?>
                                                                                <?php if ($r['ESTADO_REGISTRO'] == 0) { ?>
                                                                                    <span href="#" class="dropdown-item" data-toggle="tooltip" title="Habilitar">
                                                                                        <button type="submit" class="btn btn-block btn-success btn-sm" id="HABILITARURL" name="HABILITARURL">
                                                                                            <i class="ti-check "></i> Habilitar
                                                                                        </button>
                                                                                    </span>
                                                                                <?php } ?>                                                               
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </td>
                                                            <td><?php echo $r['CODIGO_ESTANDAR']; ?></td>  
                                                            <td><?php echo $r['NOMBRE_ESTANDAR']; ?></td>  
                                                            <td><?php echo $r['PESO_NETO_ESTANDAR']; ?></td>  
                                                            <td><?php echo $r['PESO_BRUTO_ESTANDAR']; ?></td>  
                                                            <td><?php echo $r['PESO_ENVASE_ESTANDAR']; ?></td>  
                                                            <td><?php echo $r['PDESHIDRATACION_ESTANDAR']; ?></td>  
                                                            <td><?php echo $r['PESO_PALLET_ESTANDAR']; ?></td>  
                                                            <td><?php echo $r['CANTIDAD_ENVASE_ESTANDAR']; ?></td>  
                                                            <td><?php echo $NOMBREESPECIES; ?></td>  
                                                            <td><?php echo $NOMBRETEMBALAJE; ?></td>  
                                                            <td><?php echo $NOMBRETETIQUETA; ?></td>  
                                                            <td><?php echo $NOMBREEMBOLSADO; ?></td>  
                                                            <td><?php echo $NOMBRETCATEGORIA; ?></td>
                                                            <td><?php echo $NOMBRETCOLOR; ?></td>
                                                            <td><?php echo $NOMBRETVARIEDAD; ?></td>
                                                            <td><?php echo $NOMBRETREFERENCIA; ?></td>
                                                            <td><?php echo $NOMBRESTOCK; ?></td>
                                                            <td><?php echo $NOMBREECOMERCIAL; ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box -->
                            </div>
                        </div>
                        <!--.row -->
                    </section>
                    <!-- /.content -->
                </div>
            </div>
            <!-- /.content-wrapper -->



            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php include_once "../../assest/config/footer.php"; ?>
                <?php include_once "../../assest/config/menuExtraExpo.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../../assest/config/urlBase.php"; ?>
        <?php             
            //OPERACIONES
            //OPERACION DE REGISTRO DE FILA
            if (isset($_REQUEST['GUARDAR'])) {

                //CALCULO DEL PESO ENVASE, BRUTO - NETO
                $PESOENVASESTANDAR = $_REQUEST['PESOBRUTOESTANDAR'] - $_REQUEST['PESONETOESTANDAR'];
                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
                $EEXPORTACION->__SET('CODIGO_ESTANDAR', $_REQUEST['CODIGOESTANDAR']);
                $EEXPORTACION->__SET('NOMBRE_ESTANDAR', $_REQUEST['NOMBREESTANDAR']);
                $EEXPORTACION->__SET('CANTIDAD_ENVASE_ESTANDAR', $_REQUEST['ENVASEPALLETESTANDAR']);
                $EEXPORTACION->__SET('PESO_NETO_ESTANDAR', $_REQUEST['PESONETOESTANDAR']);
                $EEXPORTACION->__SET('PESO_BRUTO_ESTANDAR', $_REQUEST['PESOBRUTOESTANDAR']);
                $EEXPORTACION->__SET('PESO_ENVASE_ESTANDAR', $PESOENVASESTANDAR);
                $EEXPORTACION->__SET('PESO_PALLET_ESTANDAR', $_REQUEST['PESOPALLETESTANDAR']);
                $EEXPORTACION->__SET('PDESHIDRATACION_ESTANDAR', $_REQUEST['DESHIDRATACIONESTANDAR']);
                $EEXPORTACION->__SET('EMBOLSADO', $_REQUEST['EMBOLSADO']);
                $EEXPORTACION->__SET('TCATEGORIA', $_REQUEST['CATEGORIA']);
                $EEXPORTACION->__SET('TCOLOR', $_REQUEST['COLOR']);
                $EEXPORTACION->__SET('TREFERENCIA', $_REQUEST['REFERENCIA']);
                $EEXPORTACION->__SET('TVARIEDAD', $_REQUEST['VARIEDAD']);
                $EEXPORTACION->__SET('STOCK', $_REQUEST['STOCK']);
                $EEXPORTACION->__SET('ID_ESPECIES', $_REQUEST['ESPECIES']);
                $EEXPORTACION->__SET('ID_TETIQUETA', $_REQUEST['ETIQUETA']);
                $EEXPORTACION->__SET('ID_TEMBALAJE', $_REQUEST['TEMBALAJE']);
                $EEXPORTACION->__SET('ID_ECOMERCIAL', $_REQUEST['ECOMERCIAL']);
                $EEXPORTACION->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                $EEXPORTACION->__SET('ID_USUARIOI', $IDUSUARIOS);
                $EEXPORTACION->__SET('ID_USUARIOM', $IDUSUARIOS);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $EEXPORTACION_ADO->agregarEstandar($EEXPORTACION);

                $AUSUARIO_ADO->agregarAusuario2("NULL",3,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Estandar Exportación.","estandar_eexportacion","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );  

                //REDIRECCIONAR A PAGINA registroEexportacion.php
                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Creado",
                        text:"El registro del mantenedor se ha creado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                         location.href = "registroEexportacion.php";                            
                    })
                </script>';
            }
            //OPERACION DE EDICION DE FILA
            if (isset($_REQUEST['EDITAR'])) {
                //CALCULO DEL PESO ENVASE, BRUTO - NETO
                $PESOENVASESTANDAR = $_REQUEST['PESOBRUTOESTANDAR'] - $_REQUEST['PESONETOESTANDAR'];

                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
                $EEXPORTACION->__SET('CODIGO_ESTANDAR', $_REQUEST['CODIGOESTANDAR']);
                $EEXPORTACION->__SET('NOMBRE_ESTANDAR', $_REQUEST['NOMBREESTANDAR']);
                $EEXPORTACION->__SET('CANTIDAD_ENVASE_ESTANDAR', $_REQUEST['ENVASEPALLETESTANDAR']);
                $EEXPORTACION->__SET('PESO_NETO_ESTANDAR', $_REQUEST['PESONETOESTANDAR']);
                $EEXPORTACION->__SET('PESO_BRUTO_ESTANDAR', $_REQUEST['PESOBRUTOESTANDAR']);
                $EEXPORTACION->__SET('PESO_ENVASE_ESTANDAR', $PESOENVASESTANDAR);
                $EEXPORTACION->__SET('PESO_PALLET_ESTANDAR', $_REQUEST['PESOPALLETESTANDAR']);
                $EEXPORTACION->__SET('PDESHIDRATACION_ESTANDAR', $_REQUEST['DESHIDRATACIONESTANDAR']);
                $EEXPORTACION->__SET('EMBOLSADO', $_REQUEST['EMBOLSADO']);
                $EEXPORTACION->__SET('TCATEGORIA', $_REQUEST['CATEGORIA']);
                $EEXPORTACION->__SET('TCOLOR', $_REQUEST['COLOR']);
                $EEXPORTACION->__SET('TREFERENCIA', $_REQUEST['REFERENCIA']);
                $EEXPORTACION->__SET('STOCK', $_REQUEST['STOCK']);
                $EEXPORTACION->__SET('TVARIEDAD', $_REQUEST['VARIEDAD']);
                $EEXPORTACION->__SET('ID_ESPECIES', $_REQUEST['ESPECIES']);
                $EEXPORTACION->__SET('ID_TETIQUETA', $_REQUEST['ETIQUETA']);
                $EEXPORTACION->__SET('ID_TEMBALAJE', $_REQUEST['TEMBALAJE']);
                $EEXPORTACION->__SET('ID_ECOMERCIAL', $_REQUEST['ECOMERCIAL']);
                $EEXPORTACION->__SET('ID_USUARIOM', $IDUSUARIOS);
                $EEXPORTACION->__SET('ID_ESTANDAR', $_REQUEST['ID']);
                //LLAMADA AL METODO DE EDICION DEL CONTROLADOR
                $EEXPORTACION_ADO->actualizarEstandar($EEXPORTACION);

                $AUSUARIO_ADO->agregarAusuario2("NULL",3,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de Estandar Exportación.","estandar_eexportacion", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );     

                //REDIRECCIONAR A PAGINA registroEexportacion.php
                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Modificado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                         location.href = "registroEexportacion.php";                            
                    })
                </script>';
            }
            if (isset($_REQUEST['ELIMINAR'])) {         


                $EEXPORTACION->__SET('ID_ESTANDAR',  $_REQUEST['ID']);
                $EEXPORTACION_ADO->deshabilitar($EEXPORTACION);
        
        
                $AUSUARIO_ADO->agregarAusuario2("NULL",3,4,"".$_SESSION["NOMBRE_USUARIO"].", Deshabilitar  Estandar Exportación.","estandar_eexportacion", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );                
                
                echo '<script>
                    Swal.fire({
                        icon:"error",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Deshabilitado correctamente", 
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroEexportacion.php";                            
                    })
                </script>';
            }
            
            if (isset($_REQUEST['HABILITAR'])) {   

                $EEXPORTACION->__SET('ID_ESTANDAR',  $_REQUEST['ID']);
                $EEXPORTACION_ADO->habilitar($EEXPORTACION);
                
                $AUSUARIO_ADO->agregarAusuario2("NULL",3,5,"".$_SESSION["NOMBRE_USUARIO"].", Habilitar  Estandar Exportación.","estandar_eexportacion", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );                               

                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Habilitado correctamente", 
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroEexportacion.php";                            
                    })
                </script>';
            }
        ?>
</body>
</html>