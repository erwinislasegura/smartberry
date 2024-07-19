<?php

include_once "../../assest/config/validarUsuarioFruta.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/COMUNA_ADO.php';
include_once '../../assest/controlador/PROVINCIA_ADO.php';
include_once '../../assest/controlador/REGION_ADO.php';



include_once '../../assest/modelo/PLANTA.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$COMUNA_ADO =  new COMUNA_ADO();
$PROVINCIA_ADO =  new PROVINCIA_ADO();
$REGION_ADO =  new REGION_ADO();

//INIICIALIZAR MODELO
$PLANTA =  new PLANTA();



//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$OP = "";
$DISABLED = "";

$NOMBREPLANTA = "";
$RAZONSOCIAL = "";
$DIRECCION = "";
$CODIGOSAG = "";
$COMUNA = "";
$FDA = "";
$TPLANTA = "";
$COMUNA = "";
$PROVINCIA = "";
$REGION = "";
$CONTRAPARTE = "";
$EMPRESA = "";

$NOMBRE = "";
$MENSAJE = "";
$FOCUS = "";
$MENSAJE2 = "";
$FOCUS2 = "";
$BORDER = "";

//INICIALIZAR ARREGLOS
$ARRAYPLANTA = "";
$ARRAYPLANTAID = "";
$ARRAYCOMUNA = "";
$ARRAYCIUDAD = "";
$ARRAYBODEGA = "";
$ARRAYEMPRESA = "";



//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYCOMUNA = $COMUNA_ADO->listarComuna3CBX();
$ARRAYPROVINCIA  = $PROVINCIA_ADO->listarProvincia3CBX();
$ARRAYREGION = $REGION_ADO->listarRegion3CBX();

//OPERACIONES
//OPERACION DE REGISTRO DE FILA

if (isset($_REQUEST['GUARDAR'])) {


    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
    $PLANTA->__SET('NOMBRE_PLANTA', $_REQUEST['NOMBREPLANTA']);
    $PLANTA->__SET('RAZON_SOCIAL_PLANTA', $_REQUEST['RAZONSOCIAL']);
    $PLANTA->__SET('DIRECCION_PLANTA', $_REQUEST['DIRECCION']);
    $PLANTA->__SET('CODIGO_SAG_PLANTA', $_REQUEST['CODIGOSAG']);
    $PLANTA->__SET('FDA_PLANTA', $_REQUEST['FDA']);
    $PLANTA->__SET('TPLANTA', "2");
    $PLANTA->__SET('ID_COMUNA', $_REQUEST['COMUNA']);  
    $PLANTA->__SET('ID_PROVINCIA', $_REQUEST['PROVINCIA']);  
    $PLANTA->__SET('ID_REGION', $_REQUEST['REGION']);   
    $PLANTA->__SET('ID_USUARIOI', $IDUSUARIOS);
    $PLANTA->__SET('ID_USUARIOM', $IDUSUARIOS);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $PLANTA_ADO->agregarPlanta($PLANTA);

    $AUSUARIO_ADO->agregarAusuario2("NULL",1,1,"".$_SESSION["NOMBRE_USUARIO"].",Pop, Registro de Planta Externa.","principal_planta","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );  

    //REDIRECCIONAR A PAGINA registroPlanta.php

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
    <title>Registrar Planta</title>
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

                    NOMBREPLANTA = document.getElementById("NOMBREPLANTA").value;
                    RAZONSOCIAL = document.getElementById("RAZONSOCIAL").value;
                    DIRECCION = document.getElementById("DIRECCION").value;
                    CODIGOSAG = document.getElementById("CODIGOSAG").value;
                    COMUNA = document.getElementById("COMUNA").selectedIndex;
                    PROVINCIA = document.getElementById("PROVINCIA").selectedIndex;
                    REGION = document.getElementById("REGION").selectedIndex;
                    FDA = document.getElementById("FDA").value;

                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_razonsocial').innerHTML = "";
                    document.getElementById('val_direccion').innerHTML = "";
                    document.getElementById('val_codigosag').innerHTML = "";
                    document.getElementById('val_comuna').innerHTML = "";
                    document.getElementById('val_provincia').innerHTML = "";
                    document.getElementById('val_region').innerHTML = "";
                    document.getElementById('val_fda').innerHTML = "";

                    if (NOMBREPLANTA == null || NOMBREPLANTA.length == 0 || /^\s+$/.test(NOMBREPLANTA)) {
                        document.form_reg_dato.NOMBREPLANTA.focus();
                        document.form_reg_dato.NOMBREPLANTA.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBREPLANTA.style.borderColor = "#4AF575";
                    if (RAZONSOCIAL == null || RAZONSOCIAL.length == 0 || /^\s+$/.test(RAZONSOCIAL)) {
                        document.form_reg_dato.RAZONSOCIAL.focus();
                        document.form_reg_dato.RAZONSOCIAL.style.borderColor = "#FF0000";
                        document.getElementById('val_razonsocial').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.RAZONSOCIAL.style.borderColor = "#4AF575";
                    if (DIRECCION == null || DIRECCION.length == 0 || /^\s+$/.test(DIRECCION)) {
                        document.form_reg_dato.DIRECCION.focus();
                        document.form_reg_dato.DIRECCION.style.borderColor = "#FF0000";
                        document.getElementById('val_direccion').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DIRECCION.style.borderColor = "#4AF575";
                    if (CODIGOSAG == null || CODIGOSAG.length == 0 || /^\s+$/.test(CODIGOSAG)) {
                        document.form_reg_dato.CODIGOSAG.focus();
                        document.form_reg_dato.CODIGOSAG.style.borderColor = "#FF0000";
                        document.getElementById('val_codigosag').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.CODIGOSAG.style.borderColor = "#4AF575";



                    if (COMUNA == null || COMUNA == 0) {
                        document.form_reg_dato.COMUNA.focus();
                        document.form_reg_dato.COMUNA.style.borderColor = "#FF0000";
                        document.getElementById('val_comuna').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.COMUNA.style.borderColor = "#4AF575";

                    if (PROVINCIA == null || PROVINCIA == 0) {
                        document.form_reg_dato.PROVINCIA.focus();
                        document.form_reg_dato.PROVINCIA.style.borderColor = "#FF0000";
                        document.getElementById('val_provincia').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.PROVINCIA.style.borderColor = "#4AF575";

                    if (REGION == null || REGION == 0) {
                        document.form_reg_dato.REGION.focus();
                        document.form_reg_dato.REGION.style.borderColor = "#FF0000";
                        document.getElementById('val_region').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.REGION.style.borderColor = "#4AF575";


                    if (FDA == null || FDA.length == 0 || /^\s+$/.test(FDA)) {
                        document.form_reg_dato.FDA.focus();
                        document.form_reg_dato.FDA.style.borderColor = "#FF0000";
                        document.getElementById('val_fda').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.FDA.style.borderColor = "#4AF575";
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

            <!-- Main content -->
          
            <section class="content">
                                <div class="box">
                                    <div class="box-header with-border bg-primary">                                        
                                        <h4 class="box-title">Registro Planta</h4>                                    
                                    </div>
                                    <!-- /.box-header -->
                                    <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato">
                                        <div class="box-body">
                                            <hr class="my-15">
                                            <div class="row">
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">    
                                                    <div class="form-group">
                                                        <label>Nombre </label>
                                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                        <input type="text" class="form-control" placeholder="Nombre Planta" id="NOMBREPLANTA" name="NOMBREPLANTA" value="<?php echo $NOMBREPLANTA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nombre" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">    
                                                    <div class="form-group">
                                                        <label>Razon Social</label>
                                                        <input type="text" class="form-control" placeholder="Razon Social" id="RAZONSOCIAL" name="RAZONSOCIAL" value="<?php echo $RAZONSOCIAL; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_razonsocial" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">    
                                                    <div class="form-group">
                                                        <label>Direccion</label>
                                                        <input type="text" class="form-control" placeholder="Dirreccion" id="DIRECCION" name="DIRECCION" value="<?php echo $DIRECCION; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_direccion" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">    
                                                    <div class="form-group">
                                                        <label>Codigo SAG</label>
                                                        <input type="number" class="form-control" placeholder="Codigo SAG" id="CODIGOSAG" name="CODIGOSAG" value="<?php echo $CODIGOSAG; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_codigosag" class="validacion"> </label>
                                                    </div>
                                                </div>   
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">    
                                                    <div class="form-group">
                                                        <label>FDA</label>
                                                        <input type="number" class="form-control" placeholder="FDA" id="FDA" name="FDA" value="<?php echo $FDA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_fda" class="validacion"> </label>
                                                    </div>
                                                </div>                                    
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">    
                                                    <div class="form-group">
                                                        <label> Comuna</label>
                                                        <select class="form-control select2" id="COMUNA" name="COMUNA" style="width: 100%;" value="<?php echo $COMUNA; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYCOMUNA as $r) : ?>
                                                                <?php if ($ARRAYCOMUNA) {    ?>
                                                                    <option value="<?php echo $r['ID_COMUNA']; ?>" 
                                                                    <?php if ($COMUNA == $r['ID_COMUNA']) { echo "selected";  } ?>>
                                                                        <?php echo $r['COMUNA'] ?>, <?php echo $r['PROVINCIA'] ?>, <?php echo $r['REGION'] ?>, <?php echo $r['PAIS'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No Hay Datos Registrados </option>
                                                                <?php } ?>

                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_comuna" class="validacion"> </label>
                                                    </div>
                                                </div>       
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">    
                                                    <div class="form-group">
                                                        <label> Provincia</label>
                                                        <select class="form-control select2" id="PROVINCIA" name="PROVINCIA" style="width: 100%;" value="<?php echo $PROVINCIA; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYPROVINCIA as $r) : ?>
                                                                <?php if ($ARRAYPROVINCIA) {    ?>
                                                                    <option value="<?php echo $r['ID_PROVINCIA']; ?>" 
                                                                        <?php if ($PROVINCIA == $r['ID_PROVINCIA']) {  echo "selected";  } ?>>
                                                                         <?php echo $r['PROVINCIA'] ?>, <?php echo $r['REGION'] ?>, <?php echo $r['PAIS'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No Hay Datos Registrados </option>
                                                                <?php } ?>

                                                            <?php endforeach; ?>

                                                        </select>
                                                        <label id="val_provincia" class="validacion"> </label>
                                                    </div>
                                                </div>  
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">    
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
                                                <button type="button" class="btn  btn-warning " data-toggle="tooltip" title="Cerrar" name="CANCELAR" value="CANCELAR" Onclick="cerrar();">
                                                <i class="ti-close"></i> Cerrar
                                                </button>
                                                    <button type="submit" class="btn btn-primary" name="GUARDAR" value="GUARDAR"  data-toggle="tooltip" title="Guardar"  <?php echo $DISABLED; ?> Onclick="return validacion()">
                                                        <i class="ti-save-alt"></i> Guardar
                                                    </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.box -->
                        <!--.row -->
                    </section>
            <!-- /.content -->


            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php //include_once "../../assest/config/menuExtra.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../../assest/config/urlBase.php"; ?>
</body>

</html>