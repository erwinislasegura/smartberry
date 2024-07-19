<?php

include_once "../../assest/config/validarUsuarioExpo.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/CIUDAD_ADO.php';
include_once '../../assest/controlador/COMUNA_ADO.php';
include_once '../../assest/modelo/CIUDAD.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$CIUDAD_ADO =  new CIUDAD_ADO();
$COMUNA_ADO =  new COMUNA_ADO();
//INIICIALIZAR MODELO
$CIUDAD =  new CIUDAD();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$IDOP = "";
$OP = "";
$DISABLED = "";


$NOMBRECIUDAD = "";
$COMUNA = "";
$FNOMBRECIUDAD = "";

$NOMBRE = "";
$MENSAJE = "";
$FOCUS = "";
$MENSAJE2 = "";
$FOCUS2 = "";
$BORDER = "";

//INICIALIZAR ARREGLOS
$ARRAYCIUDAD = "";
$ARRAYCIUDADID = "";
$ARRAYCOMUNA = "";




//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYCOMUNA = $COMUNA_ADO->listarComuna3CBX();
include_once "../../assest/config/validarDatosUrl.php";
include_once "../../assest/config/datosUrl.php";



//OPERACIONES
//OPERACION DE REGISTRO DE FILA


if (isset($_REQUEST['GUARDAR'])) {

    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
    $CIUDAD->__SET('NOMBRE_CIUDAD', $_REQUEST['NOMBRECIUDAD']);
    $CIUDAD->__SET('ID_COMUNA', $_REQUEST['COMUNA']);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $CIUDAD_ADO->agregarCiudad($CIUDAD);

    $AUSUARIO_ADO->agregarAusuario2("NULL",3,1,"".$_SESSION["NOMBRE_USUARIO"].",Pop Registro de Ciudad.","ubicacion_ciudad","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );  

    //REDIRECCIONAR A PAGINA registroCiudad.php
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
    <title>Registro Ciudad</title>
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

                    NOMBRECIUDAD = document.getElementById("NOMBRECIUDAD").value;
                    COMUNA = document.getElementById("COMUNA").selectedIndex;
                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_comuna').innerHTML = "";


                    if (NOMBRECIUDAD == null || NOMBRECIUDAD.length == 0 || /^\s+$/.test(NOMBRECIUDAD)) {
                        document.form_reg_dato.NOMBRECIUDAD.focus();
                        document.form_reg_dato.NOMBRECIUDAD.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBRECIUDAD.style.borderColor = "#4AF575";


                    if (COMUNA == null || COMUNA == 0) {
                        document.form_reg_dato.COMUNA.focus();
                        document.form_reg_dato.COMUNA.style.borderColor = "#FF0000";
                        document.getElementById('val_comuna').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.COMUNA.style.borderColor = "#4AF575";


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
            <?php //include_once "../../assest/config/menu.php"; ?>
                    <!-- Main content -->
                    <section class="content">
                        <div class="row">
                            <div class="box">
                                    <div class="box-header with-border bg-primary">                                        
                                        <h4 class="box-title">Registro Ciudad</h4>                                     
                                    </div>
                                    <!-- /.box-header -->
                                    <form class="form" role="form" method="post" name="form_reg_dato"  id="form_reg_dato" >
                                        <div class="box-body">
                                            <hr class="my-15">                                            
                                            <div class="row">
                                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Nombre </label>
                                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                        <input type="text" class="form-control" placeholder="Nombre Ciudad" id="NOMBRECIUDAD" name="NOMBRECIUDAD" value="<?php echo $NOMBRECIUDAD; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nombre" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-9 col-9 col-xs-9">
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
                                            </div>
                                        </div>
                                        <!-- /.box-body -->                                        
                                        <div class="box-footer">
                                            <div class="btn-group   col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12 " role="group" aria-label="Acciones generales">                                    
                                                <button type="button" class="btn  btn-warning " data-toggle="tooltip" title="Cerrar" name="CANCELAR" value="CANCELAR" Onclick="cerrar();">
                                                    <i class="ti-close"></i> Cerrar
                                                </button>
                                                <?php if ($OP != "editar") { ?>
                                                    <button type="submit" class="btn btn-primary" name="GUARDAR" value="GUARDAR"  data-toggle="tooltip" title="Guardar"  <?php echo $DISABLED; ?> Onclick="return validacion()">
                                                        <i class="ti-save-alt"></i> Guardar
                                                    </button>
                                                <?php } else { ?>
                                                    <button type="submit" class="btn btn-primary" name="EDITAR" value="EDITAR"   data-toggle="tooltip" title="Guardar" Onclick="return validacion()">
                                                        <i class="ti-save-alt"></i> Guardar
                                                    </button>
                                                <?php } ?>
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