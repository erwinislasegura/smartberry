<?php

include_once "../../assest/config/validarUsuarioExpo.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../../assest/controlador/ICARGA_ADO.php';
include_once '../../assest/controlador/DICARGA_ADO.php';
include_once '../../assest/controlador/TMONEDA_ADO.php';
include_once '../../assest/controlador/ECOMERCIAL_ADO.php';

include_once '../../assest/controlador/VALORP_ADO.php';
include_once '../../assest/controlador/DVALORP_ADO.php';
include_once '../../assest/controlador/TITEM_ADO.php';


include_once '../../assest/modelo/DVALORP.php';



//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR


$ICARGA_ADO = new ICARGA_ADO();
$DICARGA_ADO = new DICARGA_ADO();
$TMONEDA_ADO = new TMONEDA_ADO();
$ECOMERCIAL_ADO = new ECOMERCIAL_ADO();


$VALOR_ADO =  new VALORP_ADO();
$DVALOR_ADO =  new DVALORP_ADO();
$TITEM_ADO =  new TITEM_ADO();

//INIICIALIZAR MODELO 
$DVALOR =  new DVALORP();

//INICIALIZACION VARIABLES

$ITEM="";
$VALORITEM="";
$NOMBREITEM="";
$IDDICARGA = "";
$IDICARGA = "";
$TMONEDA="";
$NOMBRETMONEDA="";

$FECHAITEM="";


$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";

$DISABLED = "";
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




//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES

include_once "../../assest/config/validarDatosUrlD.php";

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

if (isset($id_dato) && isset($accion_dato) && isset($_SESSION['urlO'])){    
    $IDP = $id_dato;
    $OPP = $accion_dato;
    $URLO = $_SESSION['urlO'];    
    $ARRAYVERVALOR = $VALOR_ADO->verValor($IDP);
    if($ARRAYVERVALOR){
        $ICARGA= $ARRAYVERVALOR[0]['ID_ICARGA'];
        $ARRAYVERICARGA = $ICARGA_ADO->verIcarga($ICARGA);
        if($ARRAYVERICARGA){
            $ARRAYDICARGATM=$DICARGA_ADO->buscarPorIcargaLimitado1($ARRAYVERICARGA[0]["ID_ICARGA"]);
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
if (isset($id_dato) && isset($accion_dato) && isset($_SESSION['urlO']) && isset($_SESSION['dparametro']) && isset($_SESSION['dparametro1'])) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $_SESSION['dparametro'];
    $OP = $_SESSION['dparametro1'];
    $IDP = $id_dato;
    $OPP = $accion_dato;
    $URLO = $_SESSION['urlO'];




    //IDENTIFICACIONES DE OPERACIONES

    //crear =  OBTENCION DE DATOS PARA LA CREACION DE REGISTRO
    if ($OP == "crear") {

        $DISABLED = "";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYITEM = $TITEM_ADO->verTitem($IDOP);
        foreach ($ARRAYITEM as $r) :            
            $ITEM= "" . $r['ID_TITEM'];
            $NOMBREITEM = "" . $r['NOMBRE_TITEM'];    
            $ARRAYDVALOR=$DVALOR_ADO->buscarPorValorItem($IDP,$r["ID_TITEM"]);
            if($ARRAYDVALOR){
               $VALORITEM= $ARRAYDVALOR[0]["VALOR_DVALOR"];   
               $FECHAITEM = $ARRAYDVALOR[0]['FECHA_DVALOR'];   
            }else{
               $VALORITEM=0;
            }         
        endforeach;
    }
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {

        $DISABLED = "";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYITEM = $TITEM_ADO->verTitem($IDOP);
        foreach ($ARRAYITEM as $r) :            
            $ITEM= "" . $r['ID_TITEM'];
            $NOMBREITEM = "" . $r['NOMBRE_TITEM'];   
            $ARRAYDVALOR=$DVALOR_ADO->buscarPorValorItem($IDP,$r["ID_TITEM"]);
            if($ARRAYDVALOR){
                $VALORITEM= $ARRAYDVALOR[0]["VALOR_DVALOR"];   
                $FECHAITEM = $ARRAYDVALOR[0]['FECHA_DVALOR'];      
            }else{
               $VALORITEM=0;
            }         
        endforeach;
    }
    //ver =  OBTENCION DE DATOS PARA LA VISUALIZACION DEL REGISTRO
    if ($OP == "ver") {
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYITEM = $TITEM_ADO->verTitem($IDOP);
        foreach ($ARRAYITEM as $r) :            
            $ITEM= "" . $r['ID_TITEM'];
            $NOMBREITEM = "" . $r['NOMBRE_TITEM'];    
            $ARRAYDVALOR=$DVALOR_ADO->buscarPorValorItem($IDP,$r["ID_TITEM"]);
            if($ARRAYDVALOR){
                $VALORITEM= $ARRAYDVALOR[0]["VALOR_DVALOR"];   
                $FECHAITEM = $ARRAYDVALOR[0]['FECHA_DVALOR'];         
            }else{
               $VALORITEM=0;
            }         
        endforeach;
    }


    //ver =  OBTENCION DE DATOS PARA LA VISUALIZACION DEL REGISTRO
    if ($OP == "eliminar") {
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $MENSAJEELIMINAR = "ESTA SEGURO DE ELIMINAR EL REGISTRO, PARA CONFIRMAR PRESIONE ELIMINAR";
        $ARRAYITEM = $TITEM_ADO->verTitem($IDOP);
        foreach ($ARRAYITEM as $r) :            
            $ITEM= "" . $r['ID_TITEM'];
            $NOMBREITEM = "" . $r['NOMBRE_TITEM'];     
            $ARRAYDVALOR=$DVALOR_ADO->buscarPorValorItem($IDP,$r["ID_TITEM"]);
            if($ARRAYDVALOR){
                $VALORITEM= $ARRAYDVALOR[0]["VALOR_DVALOR"];   
                $FECHAITEM = $ARRAYDVALOR[0]['FECHA_DVALOR'];     
            }else{
               $VALORITEM=0;
            }         
        endforeach;
    }
}

if ($_POST) {
    if (isset($_REQUEST['VALORITEM'])) {
        $VALORITEM = $_REQUEST['VALORITEM'];
    }
    if (isset($_REQUEST['FECHAITEM'])) {
        $FECHAITEM = $_REQUEST['FECHAITEM'];
    }
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title> Registro Detalle</title>
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
                    FECHAITEM = document.getElementById("FECHAITEM").value;                         

                    document.getElementById('val_valor').innerHTML = "";
                    document.getElementById('val_fechaitem').innerHTML = "";


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


                    if (FECHAITEM == null || FECHAITEM.length == 0 || /^\s+$/.test(FECHAITEM)) {
                        document.form_reg_dato.FECHAITEM.focus();
                        document.form_reg_dato.FECHAITEM.style.borderColor = "#FF0000";
                        document.getElementById('val_fechaitem').innerHTML = "NO HA INGRESADO DATOS";
                        return false;
                    }
                    document.form_reg_dato.FECHAITEM.style.borderColor = "#4AF575";

            
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
                                <h3 class="page-title">Pago</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"> <a href="index.php"> <i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Pago</li>
                                            <li class="breadcrumb-item" aria-current="page">Registro Valor Pago</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#">Registro Detalle </a>
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
                                <h4 class="box-title">Registro Detalle</h4>                                        
                            </div>
                            <form class="form" role="form" method="post" name="form_reg_dato">
                                <div class="box-body ">
                                    <div class="row">
                                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" placeholder="ID DNOTA" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID NOTA" id="IDP" name="IDP" value="<?php echo $IDP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="OP NOTA" id="OPP" name="OPP" value="<?php echo $OPP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="URL NOTA" id="URLO" name="URLO" value="<?php echo $URLO; ?>" />

                                                <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTA" name="PLANTA" value="<?php echo $PLANTAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADAS; ?>" />
                                                <label>Item Pago</label>
                                                <input type="hidden" class="form-control" placeholder="ITEM" id="ITEM" name="ITEM" value="<?php echo $ITEM; ?>" />
                                                <input type="text" class="form-control" placeholder="tem Pago" id="NOMBREITEM" name="NOMBREITEM" value="<?php echo $NOMBREITEM; ?>" disabled style="background-color: #eeeeee;" />                                            
                                                <label id="val_item" class="validacion"> </label>
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
                                        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Tipo Moneda</label>
                                                <input type="hidden" class="form-control" placeholder="TMONEDA" id="TMONEDA" name="TMONEDA" value="<?php echo $TMONEDA; ?>" />
                                                <input type="text" class="form-control" placeholder="Tipo Moneda" id="NOMBRETMONEDA" name="NOMBRETMONEDA" value="<?php echo $NOMBRETMONEDA; ?>" disabled style="background-color: #eeeeee;" />                                            
                                                <label id="val_tmoneda" class="validacion"> </label>   
                                            </div>
                                        </div>  
                                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Fecha Item liqui.</label>
                                                <input type="date" class="form-control" placeholder="Fecha Item liqui." id="FECHAITEM" name="FECHAITEM" value="<?php echo $FECHAITEM; ?>" <?php echo $DISABLED; ?>  />     
                                                <label id="val_fechaitem" class="validacion"> </label> 
                                            </div>
                                        </div>        
                                    </div>
                                    <!-- /.row -->
                                    <!-- /.box-body -->
                                    <label id=" val_mensaje" class="validacion"><?php echo $MENSAJEELIMINAR; ?> </label>
                                    <div class="box-footer">
                                        <div class="btn-group btn-block   col-xxl-4 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12" role="group" aria-label="Acciones generales">
                                            <button type="button" class="btn btn-success  " data-toggle="tooltip" title="Volver" name="CANCELAR" value="CANCELAR" Onclick="irPagina('<?php echo $URLO; ?>.php?op&id=<?php echo $id_dato; ?>&a=<?php echo $accion_dato; ?>');">
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

                $DVALOR->__SET('VALOR_DVALOR', $_REQUEST['VALORITEM']);
                $DVALOR->__SET('FECHA_DVALOR', $_REQUEST['FECHAITEM']);
                $DVALOR->__SET('ID_USUARIOI', $IDUSUARIOS);
                $DVALOR->__SET('ID_USUARIOM', $IDUSUARIOS);
                $DVALOR->__SET('ID_VALOR', $_REQUEST['IDP']);
                $DVALOR->__SET('ID_TITEM', $_REQUEST['ID']);
                $DVALOR->__SET('ID_EMPRESA', $_SESSION['empresaIcarga']);
                $DVALOR->__SET('ID_BROKER', $_SESSION['brokerIcarga']);
                $DVALOR->__SET('ID_TEMPORADA', $_SESSION['temporadaIcarga']);
                $DVALOR_ADO->agregarDvalor($DVALOR);
                
                $AUSUARIO_ADO->agregarAusuario2("NULL",3, 1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Detalle de Valor Pago","liquidacion_dvalor","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );
                //REDIRECCIONAR A PAGINA registroICarga.php 
                
                $id_dato =  $_REQUEST['IDP'];
                $accion_dato =  $_REQUEST['OPP'];               
                
                    echo '<script>
                        Swal.fire({
                            icon:"success",
                            title:"Registro creado",
                            text:"El registro de detalle del Valor Pago se ha creado correctamente",
                            showConfirmButton:true,
                            confirmButtonText:"Volver a Valor Pago."
                        }).then((result)=>{
                            location.href ="' . $_REQUEST['URLO'] . '.php?op&id='.$id_dato.'&a='.$accion_dato.'";                            
                        })
                    </script>';
                    
            }
            if (isset($_REQUEST['EDITAR'])) {    
                $ARRAYDVALOR=$DVALOR_ADO->buscarPorValorItem($_REQUEST['IDP'],$_REQUEST['ID']);
                if($ARRAYDVALOR){     
                    $DVALOR->__SET('VALOR_DVALOR', $_REQUEST['VALORITEM']);
                    $DVALOR->__SET('FECHA_DVALOR', $_REQUEST['FECHAITEM']);
                    $DVALOR->__SET('ID_USUARIOM', $IDUSUARIOS);
                    $DVALOR->__SET('ID_VALOR', $_REQUEST['IDP']);
                    $DVALOR->__SET('ID_TITEM', $_REQUEST['ID']);
                    $DVALOR->__SET('ID_DVALOR', $ARRAYDVALOR[0]["ID_DVALOR"]);
                    $DVALOR_ADO->actualizarDvalor($DVALOR);

                    $AUSUARIO_ADO->agregarAusuario2("NULL",3, 2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de Detalle de Valor Pago","liquidacion_dvalor",$ARRAYDVALOR[0]["ID_DVALOR"],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );
                    
                    $id_dato =  $_REQUEST['IDP'];
                    $accion_dato =  $_REQUEST['OPP'];                
                    echo '<script>
                            Swal.fire({
                                icon:"success",
                                title:"Registro Modificada",
                                text:"El registro del detalle del Valor Pago se ha modificada correctamente",
                                showConfirmButton:true,
                                confirmButtonText:"Volver a Valor Pago."
                            }).then((result)=>{
                                if(result.value){
                                    location.href ="' . $_REQUEST['URLO'] . '.php?op&id='.$id_dato.'&a='.$accion_dato.'";
                                }
                            })
                        </script>';
                        
                    
                }         
            } 
            if (isset($_REQUEST['ELIMINAR'])) {
                $ARRAYDVALOR=$DVALOR_ADO->buscarPorValorItem($_REQUEST['IDP'],$_REQUEST['ID']);
                if($ARRAYDVALOR){     
                    $DVALOR->__SET('ID_DVALOR', $ARRAYDVALOR[0]["ID_DVALOR"]);   
                    //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                    $DVALOR_ADO->deshabilitar($DVALOR);
                    $AUSUARIO_ADO->agregarAusuario2("NULL",3, 3,"".$_SESSION["NOMBRE_USUARIO"].", Deshabilitar de Detalle de Valor Pago","liquidacion_dvalor",$ARRAYDVALOR[0]["ID_DVALOR"],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );
                    
                    $id_dato =  $_REQUEST['IDP'];
                    $accion_dato =  $_REQUEST['OPP'];                    
                    echo '<script>
                            Swal.fire({
                                icon:"error",
                                title:"Registro Eliminado",
                                text:"El registro del detalle del Valor Pago se ha eliminado correctamente ",
                                showConfirmButton:true,
                                confirmButtonText:"Volver a Valor Pago."
                            }).then((result)=>{
                                location.href ="' . $_REQUEST['URLO'] . '.php?op&id='.$id_dato.'&a='.$accion_dato.'";                        
                            })
                        </script>';
                }
            }
            
        
        ?>
</body>

</html>