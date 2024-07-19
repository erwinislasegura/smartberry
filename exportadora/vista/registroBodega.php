<?php


include_once "../../assest/config/validarUsuarioExpo.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../../assest/controlador/BODEGA_ADO.php';
include_once '../../assest/controlador/CIUDAD_ADO.php';
include_once '../../assest/modelo/BODEGA.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$BODEGA_ADO =  new BODEGA_ADO();
$CIUDAD_ADO =  new CIUDAD_ADO();

//INIICIALIZAR MODELO
$BODEGA =  new BODEGA();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$IDOP = "";
$OP = "";
$DISABLED = "";
$PRINCIPAL = "";
$ENVASES="";

$NOMBREBODEGA = "";
$NOMBRECONTACTO = "";
$PLANTABODEGA = "";
$FNOMBRE = "";
$NOMBREPLANTA = "";
$ESTADO = "";
$SINO=0;
$CONTADOR=0;


$NOMBRE = "";
$MENSAJE = "";
$FOCUS = "";
$MENSAJE2 = "";
$FOCUS2 = "";
$BORDER = "";

//INICIALIZAR ARREGLOS
$ARRAYBODEGA = "";
$ARRAYVALIDARBODEGA = "";
$ARRAYVALIDARBODEGA2 = "";
$ARRAYBODEGAID = "";
$ARRAYPLANTA = "";
$ARRAYPLANTA2 = "";
$ARRAYEMPRESA = "";



//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYBODEGA = $BODEGA_ADO->listarBodegaPorEmpresaCBX($EMPRESAS, $EMPRESAS);
$ARRAYPLANTA = $PLANTA_ADO->listarPlantaPropiaCBX();
$ARRAYEMPRESA = $EMPRESA_ADO->listarEmpresaCBX();
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

    //IDENTIFICACIONES DE OPERACIONES
    //OPERACION DE CAMBIO DE ESTADO
    //0 = DESACTIVAR
    if ($OP == "0") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION
        $DISABLED = "disabled";
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYBODEGAID = $BODEGA_ADO->verBodega($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYBODEGAID as $r) :
            $NOMBREBODEGA = "" . $r['NOMBRE_BODEGA'];
            $NOMBRECONTACTO = "" . $r['NOMBRE_CONTACTO_BODEGA'];
            $PRINCIPAL = "" . $r['PRINCIPAL'];
            $ENVASES = "" . $r['ENVASES'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTABODEGA = "" . $r['ID_PLANTA'];
            $ESTADO = "" . $r['ESTADO_REGISTRO'];
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
        $ARRAYBODEGAID = $BODEGA_ADO->verBodega($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYBODEGAID as $r) :
            $NOMBREBODEGA = "" . $r['NOMBRE_BODEGA'];
            $NOMBRECONTACTO = "" . $r['NOMBRE_CONTACTO_BODEGA'];
            $PRINCIPAL = "" . $r['PRINCIPAL'];
            $ENVASES = "" . $r['ENVASES'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTABODEGA = "" . $r['ID_PLANTA'];
            $ESTADO = "" . $r['ESTADO_REGISTRO'];
        endforeach;

    }
    //IDENTIFICACIONES DE OPERACIONES
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYBODEGAID = $BODEGA_ADO->verBodega($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYBODEGAID as $r) :
            $NOMBREBODEGA = "" . $r['NOMBRE_BODEGA'];
            $NOMBRECONTACTO = "" . $r['NOMBRE_CONTACTO_BODEGA'];
            $PRINCIPAL = "" . $r['PRINCIPAL'];
            $ENVASES = "" . $r['ENVASES'];
            $PLANTABODEGA = "" . $r['ID_PLANTA'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $ESTADO = "" . $r['ESTADO_REGISTRO'];
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
        $ARRAYBODEGAID = $BODEGA_ADO->verBodega($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYBODEGAID as $r) :
            $NOMBREBODEGA = "" . $r['NOMBRE_BODEGA'];
            $NOMBRECONTACTO = "" . $r['NOMBRE_CONTACTO_BODEGA'];
            $PRINCIPAL = "" . $r['PRINCIPAL'];
            $ENVASES = "" . $r['ENVASES'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTABODEGA = "" . $r['ID_PLANTA'];
            $ESTADO = "" . $r['ESTADO_REGISTRO'];
        endforeach;
    }
}




?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Bodega</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../../assest/config/urlHead.php"; ?>
        <script type="text/javascript">
            //VALIDACION DE FORMULARIO
            function validacion() {

                NOMBREBODEGA = document.getElementById("NOMBREBODEGA").value;
                NOMBRECONTACTO = document.getElementById("NOMBRECONTACTO").value;
                PLANTABODEGA = document.getElementById("PLANTABODEGA").selectedIndex;
                PRINCIPAL = document.getElementById("PRINCIPAL").selectedIndex;
                ENVASES = document.getElementById("ENVASES").selectedIndex;



                document.getElementById('val_nombre').innerHTML = "";
                document.getElementById('val_nombrec').innerHTML = "";
                document.getElementById('val_planta').innerHTML = "";
                document.getElementById('val_bprincipal').innerHTML = "";
                document.getElementById('val_benvases').innerHTML = "";


                if (NOMBREBODEGA == null || NOMBREBODEGA.length == 0 || /^\s+$/.test(NOMBREBODEGA)) {
                    document.form_reg_dato.NOMBREBODEGA.focus();
                    document.form_reg_dato.NOMBREBODEGA.style.borderColor = "#FF0000";
                    document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                    return false;
                }
                document.form_reg_dato.NOMBREBODEGA.style.borderColor = "#4AF575";



                if (NOMBRECONTACTO == null || NOMBRECONTACTO.length == 0 || /^\s+$/.test(NOMBRECONTACTO)) {
                    document.form_reg_dato.NOMBRECONTACTO.focus();
                    document.form_reg_dato.NOMBRECONTACTO.style.borderColor = "#FF0000";
                    document.getElementById('val_nombrec').innerHTML = "NO A INGRESADO DATO";
                    return false;
                }
                document.form_reg_dato.NOMBRECONTACTO.style.borderColor = "#4AF575";

                if (PLANTABODEGA == null || PLANTABODEGA == 0) {
                    document.form_reg_dato.PLANTABODEGA.focus();
                    document.form_reg_dato.PLANTABODEGA.style.borderColor = "#FF0000";
                    document.getElementById('val_planta').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                    return false;
                }
                document.form_reg_dato.PLANTABODEGA.style.borderColor = "#4AF575";

                if (PRINCIPAL == null || PRINCIPAL == 0) {
                    document.form_reg_dato.PRINCIPAL.focus();
                    document.form_reg_dato.PRINCIPAL.style.borderColor = "#FF0000";
                    document.getElementById('val_bprincipal').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                    return false;
                }
                document.form_reg_dato.PRINCIPAL.style.borderColor = "#4AF575";                

                if (ENVASES == null || ENVASES == 0) {
                    document.form_reg_dato.ENVASES.focus();
                    document.form_reg_dato.ENVASES.style.borderColor = "#FF0000";
                    document.getElementById('val_benvases').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                    return false;
                }
                document.form_reg_dato.ENVASES.style.borderColor = "#4AF575";

            }



            //REDIRECCIONAR A LA PAGINA SELECIONADA

            function irPagina(url) {
                location.href = "" + url;
            }
        </script>

</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary" >
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <?php include_once "../../assest/config/menuExpo.php";
            ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="container-full">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Principal</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Mantenedores</li>
                                            <li class="breadcrumb-item" aria-current="page">Principal</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Registro Bodega </a> </li>
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
                                        <h4 class="box-title">Registro Bodega</h4>                                
                                    </div>
                                    <!-- /.box-header -->
                                    <form class="form" role="form" method="post" name="form_reg_dato" id="form_regi_dato">
                                        <div class="box-body">
                                            <hr class="my-15">
                                            <div class="row">                                             
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">   
                                                    <div class="form-group">
                                                        <label>Nombre </label>
                                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                        <input type="hidden" class="form-control" placeholder="EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                        <input type="text" class="form-control" placeholder="Nombre Bodega" id="NOMBREBODEGA" name="NOMBREBODEGA" value="<?php echo $NOMBREBODEGA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nombre" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Nombre Contacto </label>
                                                        <input type="text" class="form-control" placeholder="Nombre Contacto Bodega" id="NOMBRECONTACTO" name="NOMBRECONTACTO" value="<?php echo $NOMBRECONTACTO; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nombrec" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Planta</label>
                                                        <select class="form-control select2" id="PLANTABODEGA" name="PLANTABODEGA" style="width: 100%;" value="<?php echo $PLANTABODEGA; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYPLANTA as $r) : ?>
                                                                <?php if ($ARRAYPLANTA) {    ?>
                                                                    <option value="<?php echo $r['ID_PLANTA']; ?>" <?php if ($PLANTABODEGA == $r['ID_PLANTA']) {  echo "selected";  } ?>>
                                                                        <?php echo $r['NOMBRE_PLANTA'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No Hay Datos Registados </option>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_planta" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Bodega Material</label>
                                                        <select class="form-control select2" id="PRINCIPAL" name="PRINCIPAL" style="width: 100%;" value="<?php echo $PRINCIPAL; ?>" <?php echo $DISABLED; ?>>
                                                            <option> </option>
                                                            <option value="0" <?php if ($PRINCIPAL == "0") {  echo "selected"; } ?>> No</option>
                                                            <option value="1" <?php if ($PRINCIPAL == "1") {  echo "selected"; } ?>> Si</option>
                                                        </select>
                                                        <label id="val_bprincipal" class="validacion"> </label>
                                                    </div>
                                                </div>                            
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Bodega Envases</label>
                                                        <select class="form-control select2" id="ENVASES" name="ENVASES" style="width: 100%;" value="<?php echo $ENVASES; ?>" <?php echo $DISABLED; ?>>
                                                            <option> </option>
                                                            <option value="0" <?php if ($ENVASES == "0") {  echo "selected"; } ?>> No</option>
                                                            <option value="1" <?php if ($ENVASES == "1") {  echo "selected"; } ?>> Si</option>
                                                        </select>
                                                        <label id="val_benvases" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <label id="val_mensaje" class="validacion"> <?php echo $MENSAJE; ?> </label>
                                        </div>
                                        <!-- /.box-body -->                     
                                        <div class="box-footer">
                                            <div class="btn-group   col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12 " role="group" aria-label="Acciones generales">                                    
                                                <button type="button" class="btn  btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroBodega.php');">
                                                    <i class="ti-trash"></i>Cancelar
                                                </button>
                                                <?php if ($OP == "editar") { ?>
                                                    <button type="submit" class="btn btn-primary" name="EDITAR" value="EDITAR"   data-toggle="tooltip" title="Editar" Onclick="return validacion()">
                                                        <i class="ti-save-alt"></i> Editar
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
                                        <h4 class="box-title">Agrupado Bodega</h4>
                                    </div>
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <table id="listar" class="table-hover " style="width: 100%;">
                                                <thead>
                                                    <tr class="center">
                                                        <th>Número</th>
                                                        <th class="text-center">Operaciónes</th>
                                                        <th>Nombre Bodega</th>
                                                        <th>Nombre Planta</th>
                                                        <th>Bodega Material</th>
                                                        <th>Bodega Envase</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYBODEGA as $r) : ?>
                                                        <?php 
                                                            $CONTADOR+=1;  
                                                            $ARRAYVERPLANTA=$PLANTA_ADO->verPlanta($r["ID_PLANTA"]);
                                                            if($ARRAYVERPLANTA){
                                                                $NOMBREPLANTABODEGA=$ARRAYVERPLANTA[0]["NOMBRE_PLANTA"];
                                                            }else{
                                                                $NOMBREPLANTABODEGA="Sin Datos";
                                                            }                                                                                                                     
                                                            if($r["PRINCIPAL"]==0){
                                                                $NOMBREPRINCIPAL="No Aplica";
                                                            }else if($r["PRINCIPAL"]==1){
                                                                $NOMBREPRINCIPAL="Si Aplica";
                                                            }else{                                                                
                                                                $NOMBREPRINCIPAL="Sin Datos";
                                                            }                                                                                                                      
                                                            if($r["ENVASES"]==0){
                                                                $NOMBREENVASES="No Aplica";
                                                            }else if($r["ENVASES"]==1){
                                                                $NOMBREENVASES="Si Aplica";
                                                            }else{                                                                
                                                                $NOMBREENVASES="Sin Datos";
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
                                                                                <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_BODEGA']; ?>" />
                                                                                <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroBodega" />
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
                                                            <td><?php echo $r['NOMBRE_BODEGA']; ?></td>
                                                            <td><?php echo $NOMBREPLANTABODEGA; ?></td>   
                                                            <td><?php echo $NOMBREPRINCIPAL; ?></td>   
                                                            <td><?php echo $NOMBREENVASES; ?></td>   
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
                if ($_REQUEST['PRINCIPAL'] == 1) {
                    $ARRAYVALIDARBODEGA = $BODEGA_ADO->listarBodegaPorEmpresaPlantaPrincipalCBX($_REQUEST['EMPRESA'], $_REQUEST['PLANTABODEGA']);
                    if ($ARRAYVALIDARBODEGA) {
                        $SINO = 1;
                        echo '<script>
                                Swal.fire({
                                    icon:"warning",
                                    title:"Accion restringida",
                                    text:"Existe un registro asociado al los datos selecionados",
                                    showConfirmButton: true,
                                    confirmButtonText:"Cerrar",
                                    closeOnConfirm:false
                                })
                            </script>';
                    } else {
                        $SINO = 0;
                        $MENSAJE = "";
                    }
                }
                if ($_REQUEST['ENVASES'] == 1) {
                    $ARRAYVALIDARBODEGA2 = $BODEGA_ADO->listarBodegaPorEmpresaPlantaEnvasesCBX($_REQUEST['EMPRESA'], $_REQUEST['PLANTABODEGA']);
                    if($ARRAYVALIDARBODEGA2){
                        $SINO = 1;
                        echo '<script>
                                Swal.fire({
                                    icon:"warning",
                                    title:"Accion restringida",
                                    text:"Existe un registro asociado al los datos selecionados",
                                    showConfirmButton: true,
                                    confirmButtonText:"Cerrar",
                                    closeOnConfirm:false
                                })
                            </script>';
                    } else {
                        $SINO = 0;
                        $MENSAJE = "";
                    }
                }


                if ($SINO == 0) {
                    //UTILIZACION METODOS SET DEL MODELO
                    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
                    $BODEGA->__SET('NOMBRE_BODEGA', $_REQUEST['NOMBREBODEGA']);
                    $BODEGA->__SET('NOMBRE_CONTACTO_BODEGA', $_REQUEST['NOMBRECONTACTO']);
                    $BODEGA->__SET('PRINCIPAL', $_REQUEST['PRINCIPAL']);
                    $BODEGA->__SET('ENVASES', $_REQUEST['ENVASES']);
                    $BODEGA->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                    $BODEGA->__SET('ID_PLANTA', $_REQUEST['PLANTABODEGA']);
                    $BODEGA->__SET('ID_USUARIOI', $IDUSUARIOS);
                    $BODEGA->__SET('ID_USUARIOM', $IDUSUARIOS);
                    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                    $BODEGA_ADO->agregarBodega($BODEGA);

                    $AUSUARIO_ADO->agregarAusuario2("NULL",3,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Bodega.","principal_bodega","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );  

                    //REDIRECCIONAR A PAGINA registroBodega.php
                    echo '<script>
                        Swal.fire({
                            icon:"success",
                            title:"Registro Creado",
                            text:"El registro del mantenedor se ha creado correctamente",
                            showConfirmButton: true,
                            confirmButtonText:"Cerrar",
                            closeOnConfirm:false
                        }).then((result)=>{
                            location.href = "registroBodega.php";                            
                        })
                    </script>';
                }
            }

            //OPERACION DE EDICION DE FILA
            if (isset($_REQUEST['EDITAR'])) {            

                if ($_REQUEST['PRINCIPAL'] == 1) {
                    $ARRAYVALIDARBODEGA = $BODEGA_ADO->listarBodegaPorEmpresaPlantaPrincipalDistinoActualCBX($_REQUEST['EMPRESA'], $_REQUEST['PLANTABODEGA'], $_REQUEST['ID']);
                    if ($ARRAYVALIDARBODEGA) {
                        $SINO = 1;
                        echo '<script>
                                Swal.fire({
                                    icon:"warning",
                                    title:"Accion restringida",
                                    text:"Existe un registro asociado al los datos selecionados",
                                    showConfirmButton: true,
                                    confirmButtonText:"Cerrar",
                                    closeOnConfirm:false
                                })
                            </script>';
                    } else {
                        $SINO = 0;
                        $MENSAJE = "";
                    }
                }
                if ($_REQUEST['ENVASES'] == 1) {
                    $ARRAYVALIDARBODEGA2 = $BODEGA_ADO->listarBodegaPorEmpresaPlantaEnvasesDistinoActualCBX($_REQUEST['EMPRESA'], $_REQUEST['PLANTABODEGA'], $_REQUEST['ID']);
                    if($ARRAYVALIDARBODEGA2){
                        $SINO = 1;
                        echo '<script>
                                Swal.fire({
                                    icon:"warning",
                                    title:"Accion restringida",
                                    text:"Existe un registro asociado al los datos selecionados",
                                    showConfirmButton: true,
                                    confirmButtonText:"Cerrar",
                                    closeOnConfirm:false
                                })
                            </script>';
                    } else {
                        $SINO = 0;
                        $MENSAJE = "";
                    }
                }
                if ($SINO == 0) {
                    //UTILIZACION METODOS SET DEL MODELO
                    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
                    $BODEGA->__SET('NOMBRE_BODEGA', $_REQUEST['NOMBREBODEGA']);
                    $BODEGA->__SET('NOMBRE_CONTACTO_BODEGA', $_REQUEST['NOMBRECONTACTO']);
                    $BODEGA->__SET('PRINCIPAL', $_REQUEST['PRINCIPAL']);
                    $BODEGA->__SET('ENVASES', $_REQUEST['ENVASES']);
                    $BODEGA->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                    $BODEGA->__SET('ID_PLANTA', $_REQUEST['PLANTABODEGA']);
                    $BODEGA->__SET('ID_USUARIOM', $IDUSUARIOS);
                    $BODEGA->__SET('ID_BODEGA', $_REQUEST['ID']);
                    //LLAMADA AL METODO DE EDICION DEL CONTROLADOR
                    $BODEGA_ADO->actualizarBodega($BODEGA);

                    $AUSUARIO_ADO->agregarAusuario2("NULL",3,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de Bodega.","principal_bodega", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );     

                    //REDIRECCIONAR A PAGINA registroBodega.php   
                    echo '<script>
                        Swal.fire({
                            icon:"success",
                            title:"Registro Modificado",
                            text:"El registro del mantenedor se ha Modificado correctamente",
                            showConfirmButton: true,
                            confirmButtonText:"Cerrar",
                            closeOnConfirm:false
                        }).then((result)=>{
                            location.href = "registroBodega.php";                            
                        })
                    </script>';
                }
            }
            if (isset($_REQUEST['ELIMINAR'])) {         


                $BODEGA->__SET('ID_BODEGA', $_REQUEST['ID']);
                $BODEGA_ADO->deshabilitar($BODEGA);
          
        
        
                $AUSUARIO_ADO->agregarAusuario2("NULL",3,4,"".$_SESSION["NOMBRE_USUARIO"].", Deshabilitar  Bodega.","principal_bodega", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );                
                
                echo '<script>
                    Swal.fire({
                        icon:"error",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Deshabilitado correctamente", 
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroBodega.php";                            
                    })
                </script>';
            }
            
            if (isset($_REQUEST['HABILITAR'])) {   



                $BODEGA->__SET('ID_BODEGA',  $_REQUEST['ID']);
                $BODEGA_ADO->habilitar($BODEGA);

                $AUSUARIO_ADO->agregarAusuario2("NULL",3,5,"".$_SESSION["NOMBRE_USUARIO"].", Habilitar  Bodega.","principal_bodega", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );                               

                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Habilitado correctamente", 
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroBodega.php";                            
                    })
                </script>';
            }

        ?>
</body>
</html>