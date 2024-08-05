<?php

include_once "../../assest/config/validarUsuarioMaterial.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../../assest/controlador/OCOMPRA_ADO.php';
include_once '../../assest/controlador/MOCOMPRA_ADO.php';


include_once '../../assest/modelo/OCOMPRA.php';
include_once '../../assest/modelo/MOCOMPRA.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$OCOMPRA_ADO =  new OCOMPRA_ADO();
$MOCOMPRA_ADO =  new MOCOMPRA_ADO();

//INIICIALIZAR MODELO
$OCOMPRA =  new OCOMPRA();
$MOCOMPRA =  new MOCOMPRA();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$MOTIVO = "";
$NUMERO = "";
$NUMEROOC = "";
$NUMEROOCI = "";


$IDOP = "";
$OP = "";
$URLP = "";
$DISABLED = "";



//INICIALIZAR ARREGLOS
$ARRAYOBTENERNUMERO = "";
$ARRAYOCOMPRA = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES

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


//OPERACION PARA OBTENER EL ID RECEPCION Y FOLIO BASE, SOLO SE OCUPA PARA CREAR UN REGISTRO NUEVO
if (isset($id_dato) && isset($accion_dato) && isset($urlo_dato)) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDP = $id_dato;
    $OPP = $accion_dato;
    $URLP = $urlo_dato;

    $ARRAYOCOMPRA = $OCOMPRA_ADO->verOcompra2($IDP);
    //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
    //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

    foreach ($ARRAYOCOMPRA as $r) :
        $NUMEROOC = "" . $r['NUMERO_OCOMPRA'];
        $NUMEROOCI = "" . $r['NUMEROI_OCOMPRA'];
    endforeach;
}


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Motivo Guía</title>
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

                    MOTIVO = document.getElementById("MOTIVO").value;
                    document.getElementById('val_motivo').innerHTML = "";

                    if (MOTIVO == null || MOTIVO.length == 0 || /^\s+$/.test(MOTIVO)) {
                        document.form_reg_dato.MOTIVO.focus();
                        document.form_reg_dato.MOTIVO.style.borderColor = "#FF0000";
                        document.getElementById('val_motivo').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.MOTIVO.style.borderColor = "#4AF575";

                }
                //REDIRECCIONAR A LA PAGINA SELECIONADA
                function irPagina(url) {
                    location.href = "" + url;
                }

                //FUNCION PARA CERRAR VENTANA Y ACTUALIZAR PRINCIPAL
                function cerrar() {
                    window.opener.refrescar()
                    window.close();
                }
            </script>

</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary">
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <?php include_once "../../assest/config/menuMaterial.php";?>


            <div class="content-wrapper">
                <div class="container-full">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Administración</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"> <a href="index.php"> <i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Modulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Administración</li>
                                            <li class="breadcrumb-item" aria-current="page">Orden Compra</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#">Registro Motivo Rechazo </a> </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <?php include_once "../../assest/config/verIndicadorEconomico.php"; ?>
                        </div>
                    </div>
                    <!-- Main content -->
                    <section class="content">
                        <div class="box">
                                <div class="box-header with-border bg-danger">                                    
                                    <h4 class="box-title">Registro Motivo Rechazo</h4>                                
                                </div>
                            <!-- /.box-header -->
                            <form class="form" role="form" method="post" name="form_reg_dato" >
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Número </label>
                                                <input type="hidden" class="form-control" placeholder="ID " id="IDP" name="IDP" value="<?php echo $IDP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="OP " id="OPP" name="OPP" value="<?php echo $OPP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="URL " id="URLP" name="URLP" value="<?php echo $URLP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="IDD " id="IDD" name="IDD" value="<?php echo $IDOP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTA" name="PLANTA" value="<?php echo $PLANTAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="Numero Despacho" id="NUMERODESPACHO" name="NUMERODESPACHO" value="<?php echo $NUMERO; ?>" />
                                                <input type="text" class="form-control" placeholder="Número Despacho" id="NUMERODESPACHOV" name="NUMERODESPACHOV" value="<?php echo $NUMERO; ?>" disabled />
                                                <label id="val_numerodespacho" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Número OC </label>
                                                <input type="hidden" class="form-control" placeholder="Numero OC" id="NUMEROOC" name="NUMEROOC" value="<?php echo $NUMEROOC; ?>" />
                                                <input type="text" class="form-control" placeholder="Numero OC" id="NUMEROOCV" name="NUMEROOCV" value="<?php echo $NUMEROOC; ?>" disabled />
                                                <label id="val_oc" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Número OC Interno </label>
                                                <input type="hidden" class="form-control" placeholder="Numero OC Interno" id="NUMEROOCI" name="NUMEROOCI" value="<?php echo $NUMEROOCI; ?>" />
                                                <input type="text" class="form-control" placeholder="Numero OC Interno" id="NUMEROOCIV" name="NUMEROOCIV" value="<?php echo $NUMEROOCI; ?>" disabled />
                                                <label id="val_oci" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Motivo </label>
                                                <input type="hidden" class="form-control" placeholder="Numero Despacho" id="MOTIVOE" name="MOTIVOE" value="<?php echo $MOTIVO; ?>" />
                                                <textarea class="form-control" rows="1" placeholder="Motivo" id="MOTIVO" name="MOTIVO" <?php echo $DISABLED; ?>><?php echo $MOTIVO; ?></textarea>
                                                <label id="val_motivo" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                
                                <div class="box-footer">
                                    <div class="btn-group btn-block  col-xxl-4 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12 " role="group" aria-label="Acciones generales">
                                        <button type="button" class="btn  btn-success  " data-toggle="tooltip" title="Volver" name="CANCELAR" value="CANCELAR" Onclick="irPagina('<?php echo $URLO; ?>.php?op');">
                                            <i class="ti-back-left "></i> Volver
                                        </button>
                                        <button type="submit" class="btn  btn-danger" data-toggle="tooltip" title="Rechazar" name="GUARDAR" value="GUARDAR" <?php echo $DISABLED; ?> onclick="return validacion()">
                                            <i class="ti-save-alt"></i> Guardar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.box -->
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
            if (isset($_REQUEST['GUARDAR'])) {

                $ARRAYOBTENERNUMERO = $MOCOMPRA_ADO->obtenerNumero($_REQUEST['IDP'], $_REQUEST['EMPRESA'],  $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
                $NUMERO = $ARRAYOBTENERNUMERO[0]["NUMERO"] + 1;
                echo 1;
                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO  
                $MOCOMPRA->__SET('NUMERO_MOCOMPRA', $NUMERO);
                $MOCOMPRA->__SET('NUMERO_OCOMPRA', $_REQUEST['NUMEROOC']);
                $MOCOMPRA->__SET('NUMEROI_OCOMPRA', $_REQUEST['NUMEROOCI']);
                $MOCOMPRA->__SET('MOTIVO_MOCOMPRA', $_REQUEST['MOTIVO']);
                $MOCOMPRA->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                $MOCOMPRA->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
                $MOCOMPRA->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
                $MOCOMPRA->__SET('ID_OCOMPRA', $_REQUEST['IDP']);
                $MOCOMPRA->__SET('ID_USUARIOI', $IDUSUARIOS);
                $MOCOMPRA->__SET('ID_USUARIOM', $IDUSUARIOS);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                echo 2;
                $MOCOMPRA_ADO->agregarMcompra($MOCOMPRA);

                //$AUSUARIO_ADO->agregarAusuario2("NULL",2,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Motivo Rechazo Orden compra.","material_mocompra","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  
                echo 3;
                $OCOMPRA->__SET('ID_OCOMPRA', $_REQUEST['IDP']);
                //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                $OCOMPRA_ADO->abierto($OCOMPRA);
                echo 4;
                $OCOMPRA->__SET('ID_OCOMPRA', $_REQUEST['IDP']);
                $OCOMPRA->__SET('ID_USUARIOM', $IDUSUARIOS);
                //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                echo 5;
                $OCOMPRA_ADO->rechazado($OCOMPRA);

                echo 6;

                $AUSUARIO_ADO->agregarAusuario2("NULL",2,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de Orden Compra, se Rechazo.","material_ocompra", $_REQUEST['IDP'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

                //REDIRECCIONAR A PAGINA registroAerolinia.php
                
                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"OC Rechazada",
                        text:"el motivo de rechazo se ha creado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "'.$_REQUEST['URLP'].'.php?op&id='.$id_dato.'&a='.$accion_dato.'&urlo='.$urlo_dato.'";                            
                    })
                </script>';
            }
        ?>
</body>

</html>