<?php

include_once "../../assest/config/validarUsuarioMaterial.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/FOLIOM_ADO.php';
include_once '../../assest/modelo/FOLIOM.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$FOLIO_ADO =  new FOLIOM_ADO();

//INIICIALIZAR MODELO
$FOLIO =  new FOLIO();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD


$NUMEROFOLIO = "";
$NUMEROFOLIO2 = "";
$ALIASFOLIO = "";
$EMPRESA = "";
$PLANTA = "";
$TFOLIO = "";
$NOMBRETFOLIO = "";
$AFOLIO = "";
$AFOLIO2 = "";
$TEMPORADA = "";

$SINO = "";
$IDOP = "";
$OP = "";
$DISABLED = "";

$NOMBRE = "";
$MENSAJE = "";
$MENSAJE2 = "";

//INICIALIZAR ARREGLOS
$ARRAYFOLIO = "";
$ARRAYFOLIOID = "";
$ARRAYPLANTA = "";
$ARRAYEMPRESA = "";
$ARRAYVEREMPRESA = "";
$ARRAYVERPLANTA = "";
$ARRAYTEMPORADA = "";
$ARRAYVERTEMPORADA = "";

$ARRAYVALIDARFOLIO = "";
$ARRAYVALIDARFOLIO2 = "";

$ARRAYVEREMPRESA2 = "";
$ARRAYVERPLANTA2 = "";
$ARRAYVERTEMPORADA2 = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYFOLIO = $FOLIO_ADO->listarFoliPorEmpresaCBX($EMPRESAS);
$ARRAYEMPRESA = $EMPRESA_ADO->listarEmpresaCBX();
$ARRAYPLANTA = $PLANTA_ADO->listarPlantaPropiaCBX();
$ARRAYTEMPORADA = $TEMPORADA_ADO->listarTemporadaCBX();
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

    }
    //1 = ACTIVAR
    if ($OP == "1") {

    }
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYFOLIOID = $FOLIO_ADO->verFolio($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYFOLIOID as $r) :

            $NUMEROFOLIO = "" . $r['NUMERO_FOLIO'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TFOLIO = "" . $r['TFOLIO'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];

        endforeach;
    }

    //ver =  OBTENCION DE DATOS PARA LA VISUALIZAAR INFORMAICON DE REGISTRO
    if ($OP == "ver") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION
        $DISABLED = "disabled";   //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYFOLIOID = $FOLIO_ADO->verFolio($IDOP);

        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYFOLIOID as $r) :

            $NUMEROFOLIO = "" . $r['NUMERO_FOLIO'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TFOLIO = "" . $r['TFOLIO'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];

        endforeach;
    }
}





?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Folio</title>
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

                    TFOLIO = document.getElementById("TFOLIO").selectedIndex;
                    PLANTA = document.getElementById("PLANTA").selectedIndex;
                    TEMPORADA = document.getElementById("TEMPORADA").selectedIndex;

                    document.getElementById('val_tfolio').innerHTML = "";
                    document.getElementById('val_planta').innerHTML = "";
                    document.getElementById('val_temporada').innerHTML = "";

                    if (TFOLIO == null || TFOLIO == 0) {
                        document.form_reg_dato.TFOLIO.focus();
                        document.form_reg_dato.TFOLIO.style.borderColor = "#FF0000";
                        document.getElementById('val_tfolio').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.TFOLIO.style.borderColor = "#4AF575";

                    if (PLANTA == null || PLANTA == 0) {
                        document.form_reg_dato.PLANTA.focus();
                        document.form_reg_dato.PLANTA.style.borderColor = "#FF0000";
                        document.getElementById('val_planta').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.PLANTA.style.borderColor = "#4AF575";

                    if (TEMPORADA == null || TEMPORADA == 0) {
                        document.form_reg_dato.TEMPORADA.focus();
                        document.form_reg_dato.TEMPORADA.style.borderColor = "#FF0000";
                        document.getElementById('val_temporada').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.AFOLIO.style.borderColor = "#4AF575";

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
            <?php include_once "../../assest/config/menuMaterial.php"; ?>
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
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Registro Folio </a>  </li>
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
                                        <h4 class="box-title">Registro Folio</h4>                                
                                    </div>
                                    <!-- /.box-header -->
                                    <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato" >
                                        <div class="box-body">
                                            <hr class="my-15">
                                            <div class="row">
                                                 <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Número </label>
                                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                        <input type="hidden" class="form-control" placeholder="EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                        <input type="text" class="form-control" placeholder="Número Folio" id="NUMEROFOLIO" name="NUMEROFOLIO" value="<?php echo $NUMEROFOLIO; ?>" disabled />
                                                        <label id="val_numero" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Tipo Folio</label>
                                                        <select class="form-control select2" id="TFOLIO" name="TFOLIO" style="width: 100%;" value="<?php echo $TFOLIO; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <option value="1" <?php if ($TFOLIO == 1) {
                                                                                    echo "selected";
                                                                                } ?>>
                                                                Materiales
                                                            </option>
                                                        </select>
                                                        <label id="val_tfolio" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Empresa</label>
                                                        <select class="form-control select2" id="EMPRESAV" name="EMPRESAV" style="width: 100%;" value="<?php echo $EMPRESAS; ?>" <?php echo $DISABLED; ?> disabled>
                                                            <option></option>
                                                            <?php foreach ($ARRAYEMPRESA as $r) : ?>
                                                                <?php if ($ARRAYEMPRESA) {    ?>
                                                                    <option value="<?php echo $r['ID_EMPRESA']; ?>" <?php if ($EMPRESA == $r['ID_EMPRESA']) {
                                                                                                                        echo "selected";
                                                                                                                    } ?>>
                                                                        <?php echo $r['NOMBRE_EMPRESA'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No Hay Datos Registrados </option>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_empresa" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Planta</label>
                                                        <select class="form-control select2" id="PLANTA" name="PLANTA" style="width: 100%;" value="<?php echo $PLANTA; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYPLANTA as $r) : ?>
                                                                <?php if ($ARRAYPLANTA) {    ?>
                                                                    <option value="<?php echo $r['ID_PLANTA']; ?>" <?php if ($PLANTA == $r['ID_PLANTA']) {
                                                                                                                        echo "selected";
                                                                                                                    } ?>>
                                                                        <?php echo $r['NOMBRE_PLANTA'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No Hay Datos Registrados </option>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_planta" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Temporada</label>
                                                        <select class="form-control select2" id="TEMPORADA" name="TEMPORADA" style="width: 100%;" value="<?php echo $TEMPORADA; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYTEMPORADA as $r) : ?>
                                                                <?php if ($ARRAYTEMPORADA) {    ?>
                                                                    <option value="<?php echo $r['ID_TEMPORADA']; ?>" <?php if ($TEMPORADA == $r['ID_TEMPORADA']) {
                                                                                                                            echo "selected";
                                                                                                                        } ?>>
                                                                        <?php echo $r['NOMBRE_TEMPORADA'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No Hay Datos Registrados </option>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_temporada" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <label id="mensaje" class="validacion"> <?php echo $MENSAJE; ?> </label>
                                        </div>
                                        <!-- /.box-body -->                                                          
                                        <div class="box-footer">
                                            <div class="btn-group   col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12 " role="group" aria-label="Acciones generales">                                    
                                                <button type="button" class="btn  btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroFolio.php');">
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
                                                    <button type="submit" class="btn btn-success" name="HABILITAR" value="HABILITAR"  data-toggle="tooltip" title="Habilitar"  >
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
                                        <h4 class="box-title"> Agrupado Folio</h4>
                                    </div>
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <table id="listar" class="table-hover " style="width: 100%;">
                                                <thead>
                                                    <tr class="center">
                                                        <th>Numero </th>
                                                        <th class="text-center">Operaciónes</th>
                                                        <th>Tipo Folio</th>
                                                        <th>Empresa</th>
                                                        <th>Planta</th>
                                                        <th>Temporada</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYFOLIO as $r) : ?>
                                                        <?php 
                                                              if ($r['TFOLIO'] == 1) {
                                                                $TFOLIO= "Materiales";
                                                            }
                                                            if ($r['TFOLIO'] == 2) {
                                                                $TFOLIO=  "Envases";
                                                            }

                                                            
                                                            $ARRAYVEREMPRESA = $EMPRESA_ADO->verEmpresa($r['ID_EMPRESA']);
                                                            if($ARRAYVEREMPRESA){
                                                                $NOMBRE_EMPRESA=  $ARRAYVEREMPRESA[0]['NOMBRE_EMPRESA'];
                                                            }else{
                                                                $NOMBRE_EMPRESA="Sin Datos";
                                                            }                                                            
                                                            $ARRAYVERPLANTA = $PLANTA_ADO->verPlanta($r['ID_PLANTA']);
                                                            if($ARRAYVERPLANTA){
                                                                $NOMBRE_PLANTA= $ARRAYVERPLANTA[0]['NOMBRE_PLANTA'];
                                                            }else{
                                                                $NOMBRE_PLANTA="Sin Datos";
                                                            }                                                            
                                                            $ARRAYVERTEMPORADA = $TEMPORADA_ADO->verTemporada($r['ID_TEMPORADA']);
                                                            if($ARRAYVERTEMPORADA){
                                                                $NOMBRE_TEMPORADA= $ARRAYVERTEMPORADA[0]['NOMBRE_TEMPORADA'];
                                                            }else{
                                                                $NOMBRE_TEMPORADA="Sin Datos";
                                                            }
                                                        ?>
                                                        <tr class="center">
                                                            <td>
                                                                <a href="#" class="text-warning hover-warning">
                                                                    <?php echo $r['NUMERO_FOLIO']; ?>
                                                                </a>
                                                            </td>                                                                                                                             
                                                            <td class="text-center">
                                                                <form method="post" id="form1">
                                                                    <div class="list-icons d-inline-flex">
                                                                        <div class="list-icons-item dropdown">
                                                                            <button class="btn btn-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                <span class="icon-copy ti-settings"></span>
                                                                            </button>
                                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                                <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_FOLIO']; ?>" />
                                                                                <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroFolio" />
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
                                                            <td><?php echo $TFOLIO; ?></td>
                                                            <td><?php echo $NOMBRE_EMPRESA; ?></td>
                                                            <td><?php echo $NOMBRE_PLANTA  ?></td>
                                                            <td><?php echo $NOMBRE_TEMPORADA  ?></td>     
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
                <?php include_once "../../assest/config/menuExtraMaterial.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../../assest/config/urlBase.php"; ?>
        <?php 
        
            //OPERACIONES
            //OPERACION DE REGISTRO DE FILA
            if (isset($_REQUEST['GUARDAR'])) {

                //VALIDAR QUE LOS DATOS SELCIOANDO NO SE REPITANW
                $ARRAYVALIDARFOLIO = $FOLIO_ADO->validarFolio($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA'], $_REQUEST['TFOLIO']);
                if ($ARRAYVALIDARFOLIO) {
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
                    $EMPRESA = $_REQUEST['EMPRESA'];
                    $PLANTA = $_REQUEST['PLANTA'];
                    $TFOLIO = $_REQUEST['TFOLIO'];
                    $TEMPORADA = $_REQUEST['TEMPORADA'];
                } else {
                    $SINO = 0;
                }
                if ($SINO == 0) {

                    //FUNCION PARA GENERAR EL FOLIO
                    $NUMEROFOLIO2 = (int)$_REQUEST['TFOLIO'] . $_REQUEST['EMPRESA'] . $_REQUEST['PLANTA'] .  $_REQUEST['TEMPORADA'];
                    $NUMEROFOLIO = $NUMEROFOLIO2 * 10000;

                    //OBTENCIONS ALIAS FOLIO
                    //OBTENER INFORMACION DE LAS TABLAS RELACIONADAS
                    $ARRAYVEREMPRESA2 = $EMPRESA_ADO->verEmpresa($_REQUEST['EMPRESA']);
                    $ARRAYVERPLANTA2 = $PLANTA_ADO->verPlanta($_REQUEST['PLANTA']);
                    $ARRAYVERTEMPORADA2 = $TEMPORADA_ADO->verTemporada($_REQUEST['TEMPORADA']);

                    //GENERACION DE ALIAS
                    $ALIASFOLIO = (int) $ARRAYVEREMPRESA2[0]['ID_EMPRESA'] . $ARRAYVERPLANTA2[0]['ID_PLANTA'] . $_REQUEST['TFOLIO'] . $ARRAYVERTEMPORADA2[0]['ID_TEMPORADA'];
                    $ALIASFOLIO = $ALIASFOLIO *  10000;

                    $ALIASFOLIO = $ALIASFOLIO . "_EMPRESA:" . $ARRAYVEREMPRESA2[0]['NOMBRE_EMPRESA'];
                    $ALIASFOLIO = $ALIASFOLIO . "_PLANTA:" . $ARRAYVERPLANTA2[0]['NOMBRE_PLANTA'];
                    if ($_REQUEST['TFOLIO'] == 1) {
                        $NOMBRETFOLIO = "MATERIALES";
                    }
                    if ($_REQUEST['TFOLIO'] == 2) {
                        $NOMBRETFOLIO = "ENVASES";
                    }

                    $ALIASFOLIO = $ALIASFOLIO . "_TIPO_FOLIO:" . $NOMBRETFOLIO;
                    $ALIASFOLIO = $ALIASFOLIO . "_TEMPORADA:" . $ARRAYVERTEMPORADA2[0]['NOMBRE_TEMPORADA'];
                    $ALIASFOLIO = $ALIASFOLIO . "_NUMEROFOLIO:";

                    //UTILIZACION METODOS SET DEL MODELO
                    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   

                    $FOLIO->__SET('NUMERO_FOLIO', $NUMEROFOLIO);
                    $FOLIO->__SET('ALIAS_DINAMICO_FOLIO', $ALIASFOLIO);
                    $FOLIO->__SET('ALIAS_ESTATICO_FOLIO', $NUMEROFOLIO);
                    $FOLIO->__SET('TFOLIO', $_REQUEST['TFOLIO']);
                    $FOLIO->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                    $FOLIO->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
                    $FOLIO->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
                    $FOLIO->__SET('ID_USUARIOI', $IDUSUARIOS);
                    $FOLIO->__SET('ID_USUARIOM', $IDUSUARIOS);
                    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                    $FOLIO_ADO->agregarFolio($FOLIO);

                    $AUSUARIO_ADO->agregarAusuario2("NULL",2,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Folio Materiales.","material_folio","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

                    //REDIRECCIONAR A PAGINA registroFolio.php                        
                    echo '<script>
                        Swal.fire({
                            icon:"success",
                            title:"Registro Creado",
                            text:"El registro del mantenedor se ha creado correctamente",
                            showConfirmButton: true,
                            confirmButtonText:"Cerrar",
                            closeOnConfirm:false
                        }).then((result)=>{
                            location.href = "registroFolio.php";                            
                        })
                    </script>';

                }
            }
            //OPERACION EDICION DE FILA
            if (isset($_REQUEST['EDITAR'])) {
                //VALIDAR QUE LOS DATOS SELCIOANDO NO SE REPITANW
                $ARRAYFOLIOID = $FOLIO_ADO->verFolio($_REQUEST['ID']);
                $ARRAYVALIDARFOLIO2 = $FOLIO_ADO->validarFolio($ARRAYFOLIOID[0]['ID_EMPRESA'], $ARRAYFOLIOID[0]['ID_PLANTA'], $ARRAYFOLIOID[0]['ID_TEMPORADA'], $ARRAYFOLIOID[0]['TFOLIO']);
                $ARRAYVALIDARFOLIO = $FOLIO_ADO->validarFolio($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA'], $_REQUEST['TFOLIO']);
                if ($ARRAYVALIDARFOLIO2) {
                    if ($ARRAYVALIDARFOLIO) {
                        if (
                            $ARRAYFOLIOID[0]['ID_EMPRESA'] == $_REQUEST['EMPRESA'] && $ARRAYFOLIOID[0]['ID_PLANTA'] == $_REQUEST['PLANTA'] &&
                            $ARRAYFOLIOID[0]['ID_TEMPORADA'] == $_REQUEST['TEMPORADA'] && $ARRAYFOLIOID[0]['TFOLIO'] == $_REQUEST['TFOLIO']
                        ) {
                            $SINO = "0";
                            $MENSAJE = "";
                        } else {
                            $SINO = "1";
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
                            $EMPRESA = $_REQUEST['EMPRESA'];
                            $PLANTA = $_REQUEST['PLANTA'];
                            $TFOLIO = $_REQUEST['TFOLIO'];
                            $TEMPORADA = $_REQUEST['TEMPORADA'];
                        }
                    }
                }

                if ($SINO == "0") {
                    //FUNCION PARA GENERAR EL FOLIO
                    $NUMEROFOLIO2 = (int)$_REQUEST['TFOLIO'] . $_REQUEST['EMPRESA'] . $_REQUEST['PLANTA'] .  $_REQUEST['TEMPORADA'];
                    $NUMEROFOLIO = $NUMEROFOLIO2 * 10000;

                    //OBTENCIONS ALIAS FOLIO
                    $ARRAYVEREMPRESA2 = $EMPRESA_ADO->verEmpresa($_REQUEST['EMPRESA']);
                    $ARRAYVERPLANTA2 = $PLANTA_ADO->verPlanta($_REQUEST['PLANTA']);
                    $ARRAYVERTEMPORADA2 = $TEMPORADA_ADO->verTemporada($_REQUEST['TEMPORADA']);

                    $ALIASFOLIO = (int) $ARRAYVEREMPRESA2[0]['ID_EMPRESA'] . $ARRAYVERPLANTA2[0]['ID_PLANTA'] . $_REQUEST['TFOLIO'] . $ARRAYVERTEMPORADA2[0]['ID_TEMPORADA'];
                    $ALIASFOLIO = $ALIASFOLIO * 10000;

                    $ALIASFOLIO = $ALIASFOLIO . "_EMPRESA:" . $ARRAYVEREMPRESA2[0]['NOMBRE_EMPRESA'];
                    $ALIASFOLIO = $ALIASFOLIO . "_PLANTA:" . $ARRAYVERPLANTA2[0]['NOMBRE_PLANTA'];


                    if ($_REQUEST['TFOLIO'] == 1) {
                        $NOMBRETFOLIO = "MATERIALES";
                    }
                    if ($_REQUEST['TFOLIO'] == 2) {
                        $NOMBRETFOLIO = "ENVASES";
                    }


                    $ALIASFOLIO = $ALIASFOLIO . "_TIPO_FOLIO:" . $NOMBRETFOLIO;
                    $ALIASFOLIO = $ALIASFOLIO . "_TEMPORADA:" . $ARRAYVERTEMPORADA2[0]['NOMBRE_TEMPORADA'];
                    $ALIASFOLIO = $ALIASFOLIO . "_NUMEROFOLIO:";


                    //UTILIZACION METODOS SET DEL MODELO
                    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
                    $FOLIO->__SET('NUMERO_FOLIO', $NUMEROFOLIO);
                    $FOLIO->__SET('ALIAS_DINAMICO_FOLIO', $ALIASFOLIO);
                    $FOLIO->__SET('ALIAS_ESTATICO_FOLIO', $NUMEROFOLIO);
                    $FOLIO->__SET('TFOLIO', $_REQUEST['TFOLIO']);
                    $FOLIO->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                    $FOLIO->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
                    $FOLIO->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
                    $FOLIO->__SET('ID_USUARIOM', $IDUSUARIOS);
                    $FOLIO->__SET('ID_FOLIO', $_REQUEST['ID']);
                    //LLAMADA AL METODO DE EDICION DEL CONTROLADOR
                    $FOLIO_ADO->actualizarFolio($FOLIO);

                    $AUSUARIO_ADO->agregarAusuario2("NULL",2,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de Folio Materiales.","material_folio", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );     

                    //REDIRECCIONAR A PAGINA registroFolio.php                    
                    echo '<script>
                        Swal.fire({
                            icon:"success",
                            title:"Registro Modificado",
                            text:"El registro del mantenedor se ha Modificado correctamente",
                            showConfirmButton: true,
                            confirmButtonText:"Cerrar",
                            closeOnConfirm:false
                        }).then((result)=>{
                            location.href = "registroFolio.php";                            
                        })
                    </script>';
                }
            }
            
            if (isset($_REQUEST['ELIMINAR'])) {                
                
                $FOLIO->__SET('ID_FOLIO', $_REQUEST['ID']);
                $FOLIO_ADO->deshabilitar($FOLIO);


                $AUSUARIO_ADO->agregarAusuario2("NULL",2,4,"".$_SESSION["NOMBRE_USUARIO"].", Deshabilitar Folio Materiales.","material_folio", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );                
                
                echo '<script>
                    Swal.fire({
                        icon:"error",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Deshabilitado correctamente", 
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroFolio.php";                            
                    })
                </script>';
            }
            
            if (isset($_REQUEST['HABILITAR'])) {
                               
                $FOLIO->__SET('ID_FOLIO',$_REQUEST['ID']);
                $FOLIO_ADO->habilitar($FOLIO);

                $AUSUARIO_ADO->agregarAusuario2("NULL",2,5,"".$_SESSION["NOMBRE_USUARIO"].", Habilitar Folio Materiales.","material_folio", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );                               

                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Habilitado correctamente", 
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroFolio.php";                            
                    })
                </script>';
            }

        ?>
</body>

</html>