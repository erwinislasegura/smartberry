<?php

include_once "../../assest/config/validarUsuarioMaterial.php";


//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/PROVINCIA_ADO.php';
include_once '../../assest/controlador/REGION_ADO.php';
include_once '../../assest/modelo/PROVINCIA.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$PROVINCIA_ADO =  new PROVINCIA_ADO();
$REGION_ADO =  new REGION_ADO();
//INIICIALIZAR MODELO
$PROVINCIA =  new PROVINCIA();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$IDOP = "";
$OP = "";
$DISABLED = "";


$NOMBREPROVINCIA = "";
$REGION = "";
$FNOMBRE = "";



$NOMBRE = "";
$MENSAJE = "";
$FOCUS = "";
$MENSAJE2 = "";
$FOCUS2 = "";
$BORDER = "";

//INICIALIZAR ARREGLOS
$ARRAYPROVINCIA = "";
$ARRAYPROVINCIAID = "";
$ARRAYREGION = "";



//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYREGION = $REGION_ADO->listarRegion3CBX();
include_once "../../assest/config/validarDatosUrl.php";
include_once "../../assest/config/datosUrl.php";


//OPERACIONES
//OPERACION DE REGISTRO DE FILA


if (isset($_REQUEST['GUARDAR'])) {

    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
    $PROVINCIA->__SET('NOMBRE_PROVINCIA', $_REQUEST['NOMBREPROVINCIA']);
    $PROVINCIA->__SET('ID_REGION', $_REQUEST['REGION']);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $PROVINCIA_ADO->agregarProvincia($PROVINCIA);


    $AUSUARIO_ADO->agregarAusuario2("NULL",2,1,"".$_SESSION["NOMBRE_USUARIO"].",Pop, Registro de Provincia.","ubicacion_provincia","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

    //REDIRECCIONAR A PAGINA registroProvincia.php 
    echo "
    <script type='text/javascript'>
        window.opener.refrescar()
        window.close();
        </script> 
    ";
}






?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Provincia</title>
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

                    NOMBREPROVINCIA = document.getElementById("NOMBREPROVINCIA").value;
                    REGION = document.getElementById("REGION").selectedIndex;

                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_region').innerHTML = "";


                    if (NOMBREPROVINCIA == null || NOMBREPROVINCIA.length == 0 || /^\s+$/.test(NOMBREPROVINCIA)) {
                        document.form_reg_dato.NOMBREPROVINCIA.focus();
                        document.form_reg_dato.NOMBREPROVINCIA.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBREPROVINCIA.style.borderColor = "#4AF575";




                    if (REGION == null || REGION == 0) {
                        document.form_reg_dato.REGION.focus();
                        document.form_reg_dato.REGION.style.borderColor = "#FF0000";
                        document.getElementById('val_region').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.REGION.style.borderColor = "#4AF575";


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

<body class="hold-transition light-skin fixed sidebar-mini theme-primary" >
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <?php //include_once "../../assest/config/menu.php"; ?>

                    <!-- Main content -->
                    <section class="content">
                        <div class="row">
                                <div class="box">
                                    <div class="box-header with-border bg-primary">                                        
                                        <h4 class="box-title">Reigstro Provincia</h4>                                
                                    </div>
                                    <!-- /.box-header -->
                                    <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato">
                                        <div class="box-body">
                                            <hr class="my-15">                             
                                            <div class="row">
                                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Nombre </label>
                                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                        <input type="text" class="form-control" placeholder="Nombre Provincia" id="NOMBREPROVINCIA" name="NOMBREPROVINCIA" value="<?php echo $NOMBREPROVINCIA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nombre" class="validacion"> </label>
                                                    </div>         
                                                </div>     
                                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label> Region</label>
                                                        <select class="form-control select2" id="REGION" name="REGION" style="width: 100%;" value="<?php echo $REGION; ?>" <?php echo $DISABLED; ?>>

                                                            <option></option>
                                                            <?php foreach ($ARRAYREGION as $r) : ?>
                                                                <?php if ($ARRAYREGION) {    ?>
                                                                    <option value="<?php echo $r['ID_REGION']; ?>" 
                                                                        <?php if ($REGION == $r['ID_REGION']) { echo "selected";  } ?>>
                                                                        <?php echo $r['REGION'] ?>, <?php echo $r['PAIS'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No Hay Datos Registrados </option>
                                                                <?php } ?>

                                                            <?php endforeach; ?>

                                                        </select>
                                                        <label id="val_region" class="validacion"> </label>
                                                    </div>
                                                </div>    
                                            </div> 
                                        </div>
                                        <!-- /.box-body -->                                                                                                    
                                        <div class="box-footer">
                                            <div class="btn-group   col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12 " role="group" aria-label="Acciones generales">                                    
                                                <button type="button" class="btn  btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="cerrar(); ">
                                                    <i class="ti-back-close "></i> Cerrar
                                                </button>
                                                    <button type="submit" class="btn btn-primary" name="GUARDAR" value="GUARDAR"  data-toggle="tooltip" title="Guardar"  <?php echo $DISABLED; ?> Onclick="return validacion()">
                                                        <i class="ti-save-alt"></i> Guardar
                                                    </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.box -->                       
                        </div>
                        <!--.row -->
                    </section>
                    <!-- /.content -->
            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php //include_once "../../assest/config/footer.php"; ?>
                <?php //include_once "../../assest/config/menuExtra.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../../assest/config/urlBase.php"; ?>
</body>

</html>