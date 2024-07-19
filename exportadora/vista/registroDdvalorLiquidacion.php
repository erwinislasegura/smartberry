<?php

include_once "../../assest/config/validarUsuarioExpo.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../../assest/controlador/ICARGA_ADO.php';
include_once '../../assest/controlador/DICARGA_ADO.php';
include_once '../../assest/controlador/TMONEDA_ADO.php';

include_once '../../assest/controlador/EEXPORTACION_ADO.php';
include_once '../../assest/controlador/TCALIBRE_ADO.php';

include_once '../../assest/controlador/VALOR_ADO.php';
include_once '../../assest/controlador/DVALOR_ADO.php';
include_once '../../assest/controlador/DDVALOR_ADO.php';
include_once '../../assest/controlador/TITEM_ADO.php';



include_once '../../assest/modelo/DVALOR.php';
include_once '../../assest/modelo/DDVALOR.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR


$ICARGA_ADO = new ICARGA_ADO();
$DICARGA_ADO = new DICARGA_ADO();
$TMONEDA_ADO = new TMONEDA_ADO();

$EEXPORTACION_ADO = new EEXPORTACION_ADO();
$TCALIBRE_ADO = new TCALIBRE_ADO();


$VALOR_ADO =  new VALOR_ADO();
$DVALOR_ADO =  new DVALOR_ADO();
$DDVALOR_ADO =  new DDVALOR_ADO();
$TITEM_ADO =  new TITEM_ADO();



//INIICIALIZAR MODELO 
$DVALOR =  new DVALOR();
$DDVALOR =  new DDVALOR();

//INICIALIZACION VARIABLES

$ITEM="";
$VALORITEM="";
$NOMBREITEM="";
$IDDICARGA = "";
$IDICARGA = "";
$TMONEDA="";
$NOMBRETMONEDA="";
$VALORITEM=0;
$DETALLE="";
$VALORTOTAL=0;
$ESTADO="";
$CONTADOR=0;
$NOMBREESTANDAR="";
$NOMBRETCALIBRE="";
$DETALLECON="";
$TOTALDDVALOR="";

$ESTANDAR="";
$CALIBRE="";
$EESTANDAR="";
$TCALIBRE="";


$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";

$DISABLED = "";
$DISABLEDDETALLE = "";
$DISABLED2 = "";
$DISABLEDSTYLE = "";
$DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
$MENSAJEELIMINAR = "";

$IDOP = "";
$IDOP2 = "";
$OP = "";
$SINO = "";
$MENSAJE = "";

$NODATOURL = "";


//INICIALIZAR ARREGLOS
$ARRAYESTANDAR = "";
$ARRAYCALIBRE = "";
$ARRAYESTANDARDETALLE = "";
$ARRAYECOMERCIAL="";
$ARRAYDICARGATM="";
$ARRAYDICARGAESTANDAR="";
$ARRAYDICARGATCALIBRE="";
$ARRAYDETALLEVALOR="";
$ARRAYDETALLEVALORTOTAL="";
$ARRAYDDVALOR="";



//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES

include_once "../../assest/config/validarDatosUrlD.php";
include_once "../../assest/config/datosUrlDT.php";



//OBTENCION DE DATOS ENVIADOR A LA URL

if (isset($_SESSION['parametro']) && isset($_SESSION['parametro1']) && isset($_SESSION['urlO'])){    
    $IDP = $_SESSION['parametro'];
    $OPP = $_SESSION['parametro1'];
    $URLO = $_SESSION['urlO'];    
    $ARRAYVERVALOR = $VALOR_ADO->verValor($IDP);
    if($ARRAYVERVALOR){
        $ICARGA= $ARRAYVERVALOR[0]['ID_ICARGA'];        
        $ESTADO = $ARRAYVERVALOR[0]['ESTADO'];
        $ARRAYVERICARGA = $ICARGA_ADO->verIcarga($ICARGA);
        if($ARRAYVERICARGA){            
            $ARRAYDICARGATM=$DICARGA_ADO->buscarPorIcargaLimitado1($ARRAYVERICARGA[0]["ID_ICARGA"]);
            $ARRAYDICARGAESTANDAR=$DICARGA_ADO->buscarEstandarEnInvoicePorIcarga($ARRAYVERICARGA[0]["ID_ICARGA"]);
            $ARRAYDICARGATCALIBRE=$DICARGA_ADO->buscarCalibreEnInvoicePorIcarga($ARRAYVERICARGA[0]["ID_ICARGA"]);
            if($ARRAYDICARGATM){
                $TMONEDA=$ARRAYDICARGATM[0]["ID_TMONEDA"];
                $NOMBRETMONEDA=$ARRAYDICARGATM[0]["TMONEDA"];
            }else{
                $NOMBRETMONEDA="Sin Datos";
            }
        }
    }
}



//PARA OPERACIONES DE EDICION , VISUALIZACION Y CREACION
if (
    isset($_SESSION['parametro']) && isset($_SESSION['parametro1']) && isset($_SESSION['urlO']) &&
    isset($_SESSION['dparametro']) && isset($_SESSION['dparametro1']) && isset($_SESSION['durlO'])  &&
    isset($_SESSION['dtparametro']) && isset($_SESSION['dtparametro1'])
) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $_SESSION['dtparametro'];
    $OP = $_SESSION['dtparametro1'];

    $IDP = $_SESSION['parametro'];
    $OPP = $_SESSION['parametro1'];
    $URLP = $_SESSION['urlO'];
    $IDD = $_SESSION['dparametro'];
    $OPD = $_SESSION['dparametro1'];
    $URLD = $_SESSION['durlO'];

    
    $ARRAYDVALOR=$DVALOR_ADO->buscarPorValorItem($IDP,$IDD);
    if($ARRAYDVALOR){ 
        $IDDETALLE = $ARRAYDVALOR[0]['ID_DVALOR'];   
    }    
    $ARRAYITEM = $TITEM_ADO->verTitem($IDD);
    if($ARRAYITEM){
        $NOMBREITEM = "" . $ARRAYITEM[0]['NOMBRE_TITEM'];   
    }

    //IDENTIFICACIONES DE OPERACIONES

    //crear =  OBTENCION DE DATOS PARA LA CREACION DE REGISTRO
    if ($OP == "crear") {

        $DISABLED = "";
        $DISABLED2 = "disabled";
        $DISABLED3 = "disabled";
        $DISABLEDSTYLE = "";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDDVALOR = $DDVALOR_ADO->verDdvalor($IDOP);
        foreach ($ARRAYDDVALOR as $r) :                      
            $VALORITEM = $ARRAYDDVALOR[0]["VALOR_DDVALOR"];   
            $CALIBRE = $ARRAYDDVALOR[0]["CALIBRE"]; 
            $ESTANDAR = $ARRAYDDVALOR[0]["ESTANDAR"]; 
            $EESTANDAR = $ARRAYDDVALOR[0]["ID_ESTANDAR"]; 
            $TCALIBRE = $ARRAYDDVALOR[0]["ID_TCALIBRE"]; 
        endforeach;
    }
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {
        $DISABLED = "";
        $DISABLED2 = "disabled";
        $DISABLED3 = "";
        $DISABLEDSTYLE = "";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDDVALOR = $DDVALOR_ADO->verDdvalor($IDOP);
        foreach ($ARRAYDDVALOR as $r) :      
            $VALORITEM = $ARRAYDDVALOR[0]["VALOR_DDVALOR"];   
            $CALIBRE = $ARRAYDDVALOR[0]["CALIBRE"]; 
            $ESTANDAR = $ARRAYDDVALOR[0]["ESTANDAR"]; 
            $EESTANDAR = $ARRAYDDVALOR[0]["ID_ESTANDAR"]; 
            $TCALIBRE = $ARRAYDDVALOR[0]["ID_TCALIBRE"]; 
        endforeach;
    }
    //ver =  OBTENCION DE DATOS PARA LA VISUALIZACION DEL REGISTRO
    if ($OP == "ver") {
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        $DISABLED3 = "disabled";
        $DISABLEDDETALLE = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDDVALOR = $DDVALOR_ADO->verDdvalor($IDOP);
        foreach ($ARRAYDDVALOR as $r) :   
            $VALORITEM = $ARRAYDDVALOR[0]["VALOR_DDVALOR"];   
            $CALIBRE = $ARRAYDDVALOR[0]["CALIBRE"]; 
            $ESTANDAR = $ARRAYDDVALOR[0]["ESTANDAR"]; 
            $EESTANDAR = $ARRAYDDVALOR[0]["ID_ESTANDAR"]; 
            $TCALIBRE = $ARRAYDDVALOR[0]["ID_TCALIBRE"]; 
        endforeach;
    }


    //ver =  OBTENCION DE DATOS PARA LA VISUALIZACION DEL REGISTRO
    if ($OP == "eliminar") {
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        $DISABLED3 = "disabled";
        $DISABLEDDETALLE = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $MENSAJEELIMINAR = "ESTA SEGURO DE ELIMINAR EL REGISTRO, PARA CONFIRMAR PRESIONE ELIMINAR";
        $ARRAYDDVALOR = $TITEM_ADO->verTitem($IDOP);
        $ARRAYDDVALOR = $DDVALOR_ADO->verDdvalor($IDOP);
        foreach ($ARRAYDDVALOR as $r) :          
            $VALORITEM = $ARRAYDDVALOR[0]["VALOR_DDVALOR"];   
            $CALIBRE = $ARRAYDDVALOR[0]["CALIBRE"]; 
            $ESTANDAR = $ARRAYDDVALOR[0]["ESTANDAR"]; 
            $EESTANDAR = $ARRAYDDVALOR[0]["ID_ESTANDAR"]; 
            $TCALIBRE = $ARRAYDDVALOR[0]["ID_TCALIBRE"]; 
        endforeach;
    }
}

if ($_POST) {
    if (isset($_REQUEST['VALORITEM'])) {
        $VALORITEM = $_REQUEST['VALORITEM'];
    }
    if (isset($_REQUEST['ESTANDAR'])) {
        $ESTANDAR = $_REQUEST['ESTANDAR'];
        if($ESTANDAR==1){
            if (isset($_REQUEST['EESTANDAR'])) {
                $EESTANDAR = $_REQUEST['EESTANDAR'];
            }
        }
    }    
    if (isset($_REQUEST['CALIBRE'])) {
        $CALIBRE = $_REQUEST['CALIBRE'];
        if($CALIBRE==1){
            if (isset($_REQUEST['TCALIBRE'])) {
                $TCALIBRE = $_REQUEST['TCALIBRE'];
            }
        }
    }
 
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title> Registro Detalle Item Liqui.</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../../assest/config/urlHead.php"; ?>
        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
                function validacion() {
                    VALORITEM = document.getElementById("VALORITEM").value;       
                    ESTANDAR = document.getElementById("ESTANDAR").selectedIndex;     
                    CALIBRE = document.getElementById("CALIBRE").selectedIndex;        
              

                    document.getElementById('val_valor').innerHTML = "";
                    document.getElementById('val_estandar').innerHTML = "";
                    document.getElementById('val_calibre').innerHTML = "";

           

                    if (VALORITEM == null || VALORITEM.length == 0 || /^\s+$/.test(VALORITEM)) {
                        document.form_reg_dato.VALORITEM.focus();
                        document.form_reg_dato.VALORITEM.style.borderColor = "#FF0000";
                        document.getElementById('val_valor').innerHTML = "NO HA INGRESADO DATOS";
                        return false;
                    }
                    document.form_reg_dato.VALORITEM.style.borderColor = "#4AF575";
                    
                    if (VALORITEM == 0) {
                        document.form_reg_dato.VALORITEM.focus();
                        document.form_reg_dato.VALORITEM.style.borderColor = "#FF0000";
                        document.getElementById('val_valor').innerHTML = "DEBE SER DISTINTO DE CERO";
                        return false;
                    } 
                    document.form_reg_dato.VALORITEM.style.borderColor = "#4AF575";

                        
                    if (ESTANDAR == null || ESTANDAR == 0) {
                        document.form_reg_dato.ESTANDAR.focus();
                        document.form_reg_dato.ESTANDAR.style.borderColor = "#FF0000";
                        document.getElementById('val_estandar').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.ESTANDAR.style.borderColor = "#4AF575";

                    if(ESTANDAR == 1 ){

                        EESTANDAR = document.getElementById("EESTANDAR").selectedIndex;    
                        document.getElementById('val_estandar').innerHTML = "";

                        if (EESTANDAR == null || EESTANDAR == 0) {
                            document.form_reg_dato.EESTANDAR.focus();
                            document.form_reg_dato.EESTANDAR.style.borderColor = "#FF0000";
                            document.getElementById('val_eestandar').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                            return false;
                        }
                        document.form_reg_dato.EESTANDAR.style.borderColor = "#4AF575";                      
                        
                    } 

                    if (CALIBRE == null || CALIBRE == 0) {
                        document.form_reg_dato.CALIBRE.focus();
                        document.form_reg_dato.CALIBRE.style.borderColor = "#FF0000";
                        document.getElementById('val_calibre').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.CALIBRE.style.borderColor = "#4AF575";

                    if(CALIBRE == 1 ){
                        TCALIBRE = document.getElementById("TCALIBRE").selectedIndex;    
                        document.getElementById('val_tcalibre').innerHTML = "";
                        if (TCALIBRE == null || TCALIBRE == 0) {
                            document.form_reg_dato.TCALIBRE.focus();
                            document.form_reg_dato.TCALIBRE.style.borderColor = "#FF0000";
                            document.getElementById('val_tcalibre').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                            return false;
                        }
                        document.form_reg_dato.TCALIBRE.style.borderColor = "#4AF575";                      

                    }   

               
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

<body class="hold-transition light-skin fixed sidebar-mini theme-primary">
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <?php include_once "../../assest/config/menuExpo.php"; ?>
            <div class="content-wrapper">
                <div class="container-full">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Liquidación</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"> <a href="index.php"> <i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Liquidación</li>
                                            <li class="breadcrumb-item" aria-current="page">Registro Valor Liquidación</li>
                                            <li class="breadcrumb-item" aria-current="page">Registro Valor Item</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#">Registro Detalle de Item liqui. </a>
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <?php include_once "../../assest/config/verIndicadorEconomico.php"; ?>
                        </div>
                    </div>
                    <section class="content">
                        <div class="box">
                            <div class="box-header with-border bg-info">                                   
                                <h4 class="box-title">Registro Detalle de Item liqui.</h4>                                        
                            </div>
                            <form class="form" role="form" method="post" name="form_reg_dato">
                                <div class="box-body ">
                                    <div class="row">
                                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" placeholder="ID DDVALOR" id="IDT" name="IDT" value="<?php echo $IDOP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID VALOR" id="IDP" name="IDP" value="<?php echo $IDP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="OP VALOR" id="OPP" name="OPP" value="<?php echo $OPP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="URL VALOR" id="URLP" name="URLP" value="registroValorLiquidacion" />

                                                <input type="hidden" class="form-control" placeholder="ID DVALOR" id="IDD" name="IDD" value="<?php echo $IDD; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID DVALOR ORIGINAL" id="IDDO" name="IDDO" value="<?php echo $IDDETALLE; ?>" />
                                                <input type="hidden" class="form-control" placeholder="OP DVALOR" id="OPD" name="OPD" value="<?php echo $OPD; ?>" />
                                                <input type="hidden" class="form-control" placeholder="URL DVALOR" id="URLD" name="URLD" value="<?php echo $URLD; ?>" />
                                                <input type="hidden" class="form-control" placeholder="URL DDVALOR" id="URLT" name="URLT" value="registroDdvalorLiquidacion" />

                                                <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTA" name="PLANTA" value="<?php echo $PLANTAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADAS; ?>" />
                                                <label>Item Liquidación</label>
                                                <input type="hidden" class="form-control" placeholder="ITEM" id="ITEM" name="ITEM" value="<?php echo $ITEM; ?>" />
                                                <input type="text" class="form-control" placeholder="tem Liquidación" id="NOMBREITEM" name="NOMBREITEM" value="<?php echo $NOMBREITEM; ?>" disabled style="background-color: #eeeeee;" />                                            
                                                <label id="val_item" class="validacion"> </label>
                                            </div>
                                        </div>                                    
                                        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Tipo Moneda</label>
                                                <input type="hidden" class="form-control" placeholder="TMONEDA" id="TMONEDA" name="TMONEDA" value="<?php echo $TMONEDA; ?>" />
                                                <input type="text" class="form-control" placeholder="Tipo Moneda" id="NOMBRETMONEDA" name="NOMBRETMONEDA" value="<?php echo $NOMBRETMONEDA; ?>" disabled style="background-color: #eeeeee;" />                                            
                                                <label id="val_tmoneda" class="validacion"> </label>   
                                            </div>
                                        </div>   
                                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Valor Item liqui. </label>
                                                <input type="hidden" id="VALORITEME" name="VALORITEME" value="<?php echo $VALORITEM; ?>" />
                                                <input type="number" step="0.01" class="form-control"  placeholder="Valor Item liqui. " id="VALORITEM" name="VALORITEM"   value="<?php echo $VALORITEM; ?>"  <?php echo $DISABLED; ?>     />
                                                <label id="val_valor" class="validacion"> </label>
                                            </div>
                                        </div>        
                                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Estandar Exportación</label>
                                                <select class="form-control select2" id="ESTANDAR" name="ESTANDAR" style="width: 100%;" onchange="this.form.submit()" <?php echo $ESTANDAR; ?> <?php echo $DISABLED; ?> >
                                                    <option></option>
                                                    <option value="1" <?php if ($ESTANDAR == "1") { echo "selected"; } ?>> Si </option>
                                                    <option value="0" <?php if ($ESTANDAR == "0") { echo "selected"; } ?>>No</option>
                                                </select>
                                                <label id="val_estandar" class="validacion"> </label> 
                                            </div>
                                        </div>  
                                        <?php if($ESTANDAR==1){  ?>
                                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>Estandar Comercial</label>
                                                    <select class="form-control select2" id="EESTANDAR" name="EESTANDAR" style="width: 100%;" value="<?php echo $EESTANDAR; ?>" <?php echo $DISABLED; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYDICARGAESTANDAR as $r) : ?>
                                                            <?php if ($ARRAYDICARGAESTANDAR) {    ?>
                                                                <option value="<?php echo $r['ID_ESTANDAR']; ?>"
                                                                    <?php if ($EESTANDAR == $r['ID_ESTANDAR']) {  echo "selected";  } ?>>
                                                                    <?php echo $r['CODIGO'] ?> <?php echo $r['NOMBRE'] ?>
                                                                </option>
                                                            <?php } else { ?>
                                                                <option>No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_eestandar" class="validacion"> </label>
                                                </div>
                                            </div>
                                        <?php  } ?>                                        
                                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Tipo Calibre</label>
                                                <select class="form-control select2" id="CALIBRE" name="CALIBRE" style="width: 100%;" onchange="this.form.submit()" <?php echo $CALIBRE; ?> <?php echo $DISABLED; ?> >
                                                    <option></option>
                                                    <option value="1" <?php if ($CALIBRE == "1") { echo "selected"; } ?>> Si </option>
                                                    <option value="0" <?php if ($CALIBRE == "0") { echo "selected"; } ?>>No</option>
                                                </select>
                                                <label id="val_calibre" class="validacion"> </label> 
                                            </div>
                                        </div>  
                                        <?php if($CALIBRE==1){  ?>
                                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 col-xs-6">
                                                <div class="form-group">
                                                    <label>Tipo Calibre</label>
                                                    <select class="form-control select2" id="TCALIBRE" name="TCALIBRE" style="width: 100%;" value="<?php echo $TCALIBRE; ?>" <?php echo $DISABLED; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYDICARGATCALIBRE as $r) : ?>
                                                            <?php if ($ARRAYDICARGATCALIBRE) {    ?>
                                                                <option value="<?php echo $r['ID_TCALIBRE']; ?>"
                                                                    <?php if ($TCALIBRE == $r['ID_TCALIBRE']) {  echo "selected";  } ?>>
                                                                    <?php echo $r['NOMBRE'] ?>
                                                                </option>
                                                            <?php } else { ?>
                                                                <option>No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_tcalibre" class="validacion"> </label>
                                                </div>
                                            </div>
                                        <?php  } ?>   
                                    </div>
                                    <!-- /.row -->
                                    <!-- /.box-body -->
                                    <label id=" val_mensaje" class="validacion"><?php echo $MENSAJEELIMINAR; ?> </label>
                                    <div class="box-footer">
                                        <div class="btn-group btn-block   col-xxl-4 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12" role="group" aria-label="Acciones generales">
                                            <button type="button" class="btn btn-success  " data-toggle="tooltip" title="Volver" name="CANCELAR" value="CANCELAR" Onclick="irPagina('<?php echo $URLD; ?>.php?op');">
                                                <i class="ti-back-left "></i> Volver
                                            </button>
                                            <?php if ($OP == "") { ?>
                                                <button type="submit" class="btn btn-primary " data-toggle="tooltip" title="Crear" name="CREAR" value="CREAR" <?php echo $DISABLED; ?> onclick="return validacion()">
                                                    <i class="ti-save-alt"></i> Guardar
                                                </button>
                                            <?php } ?>
                                            <?php if ($OP != "") { ?>
                                                <?php if ($OP == "crear") { ?>
                                                    <button type="submit" class="btn btn-primary " data-toggle="tooltip" title="Crear" name="CREAR" value="CREAR" <?php echo $DISABLED; ?> onclick="return validacion()">
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
                        </div>
                        <!--.row -->
                    </section>
                </div>
            </div>

            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php include_once "../../assest/config/footer.php";   ?>
                <?php include_once "../../assest/config/menuExtraExpo.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../../assest/config/urlBase.php"; ?>       
 
        <?php 
            //OPERACIONES
            //OPERACION DE REGISTRO DE FILA
           
            if (isset($_REQUEST['CREAR'])) {    
                $DDVALOR->__SET('VALOR_DDVALOR', $_REQUEST['VALORITEM']);
                $DDVALOR->__SET('CALIBRE', $_REQUEST['CALIBRE']);    
                $DDVALOR->__SET('ESTANDAR', $_REQUEST['ESTANDAR']);    
                if($_REQUEST['CALIBRE']==1){
                    $DDVALOR->__SET('ID_TCALIBRE', $_REQUEST['TCALIBRE']);  
                }
                if($_REQUEST['ESTANDAR']==1){
                    $DDVALOR->__SET('ID_ESTANDAR', $_REQUEST['EESTANDAR']);   
                }        
                $DDVALOR->__SET('ID_USUARIOI', $IDUSUARIOS);
                $DDVALOR->__SET('ID_USUARIOM', $IDUSUARIOS);
                $DDVALOR->__SET('ID_DVALOR', $_REQUEST['IDDO']);
                $DDVALOR_ADO->agregarDdvalor($DDVALOR);              

                
                $ARRAYDETALLEVALORTOTAL=$DDVALOR_ADO->obtenrTotalPorDvalor($_REQUEST['IDDO']);                
                $DVALOR->__SET('VALOR_DVALOR', $ARRAYDETALLEVALORTOTAL[0]["TOTAL"]);
                $DVALOR->__SET('ID_DVALOR', $_REQUEST['IDDO']);
                $DVALOR_ADO->actulizarTotal($DVALOR);           
       
                
                $AUSUARIO_ADO->agregarAusuario2("NULL",3, 1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Detalle del Valor Item Liquidación","liquidacion_dvalor","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );
                //REDIRECCIONAR A PAGINA registroICarga.php 
                   
                $_SESSION["parametro"] =  $_REQUEST['IDP'];
                $_SESSION["parametro1"] =  $_REQUEST['OPP'];   
                $_SESSION["dparametro"] =  $_REQUEST['IDD'];
                $_SESSION["dparametro1"] =  $_REQUEST['OPD']; 

                    echo '<script>
                        Swal.fire({
                            icon:"success",
                            title:"Registro creado",
                            text:"El registro de detalle del Valor Item Liquidación se ha creado correctamente",
                            showConfirmButton:true,
                            confirmButtonText:"Volver a Valor Item Liquidación."
                        }).then((result)=>{
                            location.href ="' . $_REQUEST['URLD'] . '.php?op";                            
                        })
                    </script>';
                  
                    
            }
            if (isset($_REQUEST['EDITAR'])) {    

                $DDVALOR->__SET('VALOR_DDVALOR', $_REQUEST['VALORITEM']);
                $DDVALOR->__SET('CALIBRE', $_REQUEST['CALIBRE']);    
                $DDVALOR->__SET('ESTANDAR', $_REQUEST['ESTANDAR']);    
                if($_REQUEST['CALIBRE']==1){
                    $DDVALOR->__SET('ID_TCALIBRE', $_REQUEST['TCALIBRE']);  
                }
                if($_REQUEST['ESTANDAR']==1){
                    $DDVALOR->__SET('ID_ESTANDAR', $_REQUEST['EESTANDAR']);   
                }        
                $DDVALOR->__SET('ID_USUARIOI', $IDUSUARIOS);
                $DDVALOR->__SET('ID_USUARIOM', $IDUSUARIOS);
                $DDVALOR->__SET('ID_DVALOR', $_REQUEST['IDDO']);
                $DDVALOR->__SET('ID_DDVALOR', $_REQUEST['IDT']);
                $DDVALOR_ADO->actualizarDdvalor($DDVALOR);  
              
                $ARRAYDETALLEVALORTOTAL=$DDVALOR_ADO->obtenrTotalPorDvalor($_REQUEST['IDDO']);                
                $DVALOR->__SET('VALOR_DVALOR', $ARRAYDETALLEVALORTOTAL[0]["TOTAL"]);
                $DVALOR->__SET('ID_DVALOR', $_REQUEST['IDDO']);
                $DVALOR_ADO->actulizarTotal($DVALOR);           

                $AUSUARIO_ADO->agregarAusuario2("NULL",3, 2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de Detalle de Valor Item Liquidación","liquidacion_ddvalor",$_REQUEST['IDT'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );
                
                $_SESSION["parametro"] =  $_REQUEST['IDP'];
                $_SESSION["parametro1"] =  $_REQUEST['OPP'];   
                $_SESSION["dparametro"] =  $_REQUEST['IDD'];
                $_SESSION["dparametro1"] =  $_REQUEST['OPD']; 

                    echo '<script>
                        Swal.fire({
                            icon:"success",
                            title:"Registro creado",
                            text:"El registro de detalle del Valor Item Liquidación se ha creado correctamente",
                            showConfirmButton:true,
                            confirmButtonText:"Volver a Valor Item Liquidación."
                        }).then((result)=>{
                            location.href ="' . $_REQUEST['URLD'] . '.php?op";                            
                        })
                    </script>';                   
                    
            } 
            if (isset($_REQUEST['ELIMINAR'])) {
                    $DDVALOR->__SET('ID_DDVALOR', $_REQUEST['IDT']);  
                    //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                    $DDVALOR_ADO->deshabilitar($DDVALOR);


                    $ARRAYDETALLEVALORTOTAL=$DDVALOR_ADO->obtenrTotalPorDvalor($_REQUEST['IDDO']);                
                    $DVALOR->__SET('VALOR_DVALOR', $ARRAYDETALLEVALORTOTAL[0]["TOTAL"]);
                    $DVALOR->__SET('ID_DVALOR', $_REQUEST['IDDO']);
                    $DVALOR_ADO->actulizarTotal($DVALOR);           

                    $AUSUARIO_ADO->agregarAusuario2("NULL",3, 3,"".$_SESSION["NOMBRE_USUARIO"].", Deshabilitar de Detalle de Valor Item Liquidación","liquidacion_ddvalor",$_REQUEST['IDT'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );
                    
                    $_SESSION["parametro"] =  $_REQUEST['IDP'];
                    $_SESSION["parametro1"] =  $_REQUEST['OPP'];   
                    $_SESSION["dparametro"] =  $_REQUEST['IDD'];
                    $_SESSION["dparametro1"] =  $_REQUEST['OPD'];              
                    echo '<script>
                            Swal.fire({
                                icon:"error",
                                title:"Registro Eliminado",
                                text:"El registro del detalle del Valor Item Liquidación se ha eliminado correctamente ",
                                showConfirmButton:true,
                                confirmButtonText:"Volver a Valor Item Liquidación."
                            }).then((result)=>{
                                location.href ="' . $_REQUEST['URLD'] . '.php?op";                        
                            })
                        </script>';
                
            }
            
        
        ?>
</body>

</html>