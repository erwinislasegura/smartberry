<?php

include_once "../../assest/config/validarUsuarioMaterial.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/CONDUCTOR_ADO.php';
include_once '../../assest/modelo/CONDUCTOR.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$CONDUCTOR_ADO =  new CONDUCTOR_ADO();
//INIICIALIZAR MODELO
$CONDUCTOR =  new CONDUCTOR();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$OP = "";
$DISABLED = "";


$NOMBRECONDUCTOR = "";
$DVCONDUCTOR = "";
$RUTCONDUCTOR = "";
$NOTACONDUCTOR = "";
$TELEFONOCONDUCTOR = "";
$EMAILCONDUCTOR = "";
$NUMERO = "";
$CONTADOR=0;

$FNOMBRE = "";
$EMPRESA = "";

$SINO = "";
$NOMBRE = "";
$MENSAJE = "";
$FOCUS = "";
$MENSAJE2 = "";
$FOCUS2 = "";
$BORDER = "";

//INICIALIZAR ARREGLOS
$ARRAYCONDUCTOR = "";
$ARRAYCONDUCTORID = "";
$ARRAYEMPRESA = "";
$ARRAYNUMERO = "";



//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYCONDUCTOR = $CONDUCTOR_ADO->listarConductorPorEmpresaCBX($EMPRESAS);
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
        $ARRAYCONDUCTORID = $CONDUCTOR_ADO->verConductor($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYCONDUCTORID as $r) :
            $NOMBRECONDUCTOR = "" . $r['NOMBRE_CONDUCTOR'];
            $RUTCONDUCTOR = "" . $r['RUT_CONDUCTOR'];
            $DVCONDUCTOR = "" . $r['DV_CONDUCTOR'];
            $NOTACONDUCTOR = "" . $r['NOTA_CONDUCTOR'];
            $TELEFONOCONDUCTOR = "" . $r['TELEFONO_CONDUCTOR'];
            $EMAILCONDUCTOR = "" . $r['EMAIL_CONDUCTOR'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
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
        $ARRAYCONDUCTORID = $CONDUCTOR_ADO->verConductor($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYCONDUCTORID as $r) :
            $NOMBRECONDUCTOR = "" . $r['NOMBRE_CONDUCTOR'];
            $RUTCONDUCTOR = "" . $r['RUT_CONDUCTOR'];
            $DVCONDUCTOR = "" . $r['DV_CONDUCTOR'];
            $NOTACONDUCTOR = "" . $r['NOTA_CONDUCTOR'];
            $TELEFONOCONDUCTOR = "" . $r['TELEFONO_CONDUCTOR'];
            $EMAILCONDUCTOR = "" . $r['EMAIL_CONDUCTOR'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
        endforeach;

    }

    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {
        //VALIDACION QUE EL RUT INGRESADO NO SE REPITA EN OTRO REGISTRO
        if ($SINO == "") {
            //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
            //ALMACENAR INFORMACION EN ARREGLO
            //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
            //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
            $ARRAYCONDUCTORID = $CONDUCTOR_ADO->verConductor($IDOP);
            //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
            //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
            foreach ($ARRAYCONDUCTORID as $r) :
                $NOMBRECONDUCTOR = "" . $r['NOMBRE_CONDUCTOR'];
                $RUTCONDUCTOR = "" . $r['RUT_CONDUCTOR'];
                $DVCONDUCTOR = "" . $r['DV_CONDUCTOR'];
                $NOTACONDUCTOR = "" . $r['NOTA_CONDUCTOR'];
                $TELEFONOCONDUCTOR = "" . $r['TELEFONO_CONDUCTOR'];
                $EMAILCONDUCTOR = "" . $r['EMAIL_CONDUCTOR'];
                $EMPRESA = "" . $r['ID_EMPRESA'];
            endforeach;
        }
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
        $ARRAYCONDUCTORID = $CONDUCTOR_ADO->verConductor($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYCONDUCTORID as $r) :
            $NOMBRECONDUCTOR = "" . $r['NOMBRE_CONDUCTOR'];
            $RUTCONDUCTOR = "" . $r['RUT_CONDUCTOR'];
            $DVCONDUCTOR = "" . $r['DV_CONDUCTOR'];
            $NOTACONDUCTOR = "" . $r['NOTA_CONDUCTOR'];
            $TELEFONOCONDUCTOR = "" . $r['TELEFONO_CONDUCTOR'];
            $EMAILCONDUCTOR = "" . $r['EMAIL_CONDUCTOR'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
        endforeach;
    }
}




?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Conductor</title>
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


                    RUTCONDUCTOR = document.getElementById("RUTCONDUCTOR").value;
                    DVCONDUCTOR = document.getElementById("DVCONDUCTOR").value;
                    NOMBRECONDUCTOR = document.getElementById("NOMBRECONDUCTOR").value;
                    TELEFONOCONDUCTOR = document.getElementById("TELEFONOCONDUCTOR").value;
                    EMAILCONDUCTOR = document.getElementById("EMAILCONDUCTOR").value;
                    NOTACONDUCTOR = document.getElementById("NOTACONDUCTOR").value;



                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_rut').innerHTML = "";
                    document.getElementById('val_dv').innerHTML = "";
                    document.getElementById('val_telefono').innerHTML = "";
                    document.getElementById('val_email').innerHTML = "";
                    document.getElementById('val_nota').innerHTML = "";


                    if (RUTCONDUCTOR == null || RUTCONDUCTOR.length == 0 || /^\s+$/.test(RUTCONDUCTOR)) {
                        document.form_reg_dato.RUTCONDUCTOR.focus();
                        document.form_reg_dato.RUTCONDUCTOR.style.borderColor = "#FF0000";
                        document.getElementById('val_rut').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.RUTCONDUCTOR.style.borderColor = "#4AF575";

                    if (DVCONDUCTOR == null || DVCONDUCTOR.length == 0 || /^\s+$/.test(DVCONDUCTOR)) {
                        document.form_reg_dato.DVCONDUCTOR.focus();
                        document.form_reg_dato.DVCONDUCTOR.style.borderColor = "#FF0000";
                        document.getElementById('val_dv').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DVCONDUCTOR.style.borderColor = "#4AF575";



                    if (NOMBRECONDUCTOR == null || NOMBRECONDUCTOR.length == 0 || /^\s+$/.test(NOMBRECONDUCTOR)) {
                        document.form_reg_dato.NOMBRECONDUCTOR.focus();
                        document.form_reg_dato.NOMBRECONDUCTOR.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBRECONDUCTOR.style.borderColor = "#4AF575";


                    /*

                                        if (TELEFONOCONDUCTOR == null || TELEFONOCONDUCTOR == "") {
                                            document.form_reg_dato.TELEFONOCONDUCTOR.focus();
                                            document.form_reg_dato.TELEFONOCONDUCTOR.style.borderColor = "#FF0000";
                                            document.getElementById('val_telefono').innerHTML = "NO A INGRESADO DATO";
                                            return false;
                                        }
                                        document.form_reg_dato.TELEFONOCONDUCTOR.style.borderColor = "#4AF575";

                                        if (EMAILCONDUCTOR == null || EMAILCONDUCTOR.length == 0 || /^\s+$/.test(EMAILCONDUCTOR)) {
                                            document.form_reg_dato.EMAILCONDUCTOR.focus();
                                            document.form_reg_dato.EMAILCONDUCTOR.style.borderColor = "#FF0000";
                                            document.getElementById('val_email').innerHTML = "NO A INGRESADO DATO";
                                            return false;
                                        }
                                        document.form_reg_dato.EMAILCONDUCTOR.style.borderColor = "#4AF575";



                                        if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
                                                .test(EMAILCONDUCTOR))) {
                                            document.form_reg_dato.EMAILCONDUCTOR.focus();
                                            document.form_reg_dato.EMAILCONDUCTOR.style.borderColor = "#ff0000";
                                            document.getElementById('val_email').innerHTML = "FORMATO DE CORREO INCORRECTO";
                                            return false;
                                        }
                                        document.form_reg_dato.EMAILCONDUCTOR.style.borderColor = "#4AF575";
                    */

                    /*
                        if (NOTACONDUCTOR == null || NOTACONDUCTOR.length == 0 || /^\s+$/.test(NOTACONDUCTOR)) {
                            document.form_reg_dato.NOTACONDUCTOR.focus();
                            document.form_reg_dato.NOTACONDUCTOR.style.borderColor = "#FF0000";
                            document.getElementById('val_nota').innerHTML = "NO A INGRESADO DATO";
                            return false;
                        }
                        document.form_reg_dato.NOTACONDUCTOR.style.borderColor = "#4AF575";
                    */

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
            <?php include_once "../../assest/config/menuMaterial.php"; ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="container-full">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Transporte</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Mantenedores</li>
                                            <li class="breadcrumb-item" aria-current="page">Transporte</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Registro Conductor </a> </li>
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
                                        <h4 class="box-title">Registro Conductor</h4>                                
                                    </div>
                                    <!-- /.box-header -->
                                    <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato">
                                        <div class="box-body">
                                            <hr class="my-15">
                                            <div class="row">
                                                 <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Rut </label>
                                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                        <input type="hidden" class="form-control" placeholder="EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                        <input type="text" class="form-control" placeholder="Rut Conductor" id="RUTCONDUCTOR" name="RUTCONDUCTOR" value="<?php echo $RUTCONDUCTOR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_rut" class="validacion"> <?php echo $MENSAJE; ?></label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 col-xs-2">
                                                    <div class="form-group">
                                                        <label>DV </label>
                                                        <input type="text" class="form-control" placeholder="DV Conductor" id="DVCONDUCTOR" name="DVCONDUCTOR" value="<?php echo $DVCONDUCTOR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_dv" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Nombre </label>
                                                        <input type="text" class="form-control" placeholder="Nombre Conductor" id="NOMBRECONDUCTOR" name="NOMBRECONDUCTOR" value="<?php echo $NOMBRECONDUCTOR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nombre" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Telefono </label>
                                                        <input type="number" class="form-control" placeholder="Telefono Conductor" id="TELEFONOCONDUCTOR" name="TELEFONOCONDUCTOR" value="<?php echo $TELEFONOCONDUCTOR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_telefono" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Email </label>
                                                        <input type="text" class="form-control" placeholder="Email Conductor" id="EMAILCONDUCTOR" name="EMAILCONDUCTOR" value="<?php echo $EMAILCONDUCTOR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_email" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Nota </label>
                                                        <textarea class="form-control" rows="1" placeholder="Nota Conductor" id="NOTACONDUCTOR" name="NOTACONDUCTOR" <?php echo $DISABLED; ?>><?php echo $NOTACONDUCTOR; ?></textarea>
                                                        <label id="val_nota" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->                                                                         
                                        <div class="box-footer">
                                            <div class="btn-group   col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12 " role="group" aria-label="Acciones generales">                                    
                                                <button type="button" class="btn  btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroConductor.php');">
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
                                        <h4 class="box-title">Agrupado Conductor</h4>
                                    </div>
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <table id="listar" class="table-hover " style="width: 100%;">
                                                <thead>
                                                    <tr class="center">
                                                        <th>Numero </th>
                                                        <th class="text-center">Operaciónes</th>
                                                        <th>Rut </th>
                                                        <th>DV </th>
                                                        <th>Nombre </th>
                                                        <th>Telefono </th>
                                                        <th>Email </th>
                                                        <th>Nota </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYCONDUCTOR as $r) : ?>
                                                        <?php       
                                                            $CONTADOR+=1; 
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
                                                                                <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_CONDUCTOR']; ?>" />
                                                                                <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroConductor" />
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
                                                            <td><?php echo $r['RUT_CONDUCTOR']; ?></td>   
                                                            <td><?php echo $r['DV_CONDUCTOR']; ?></td>   
                                                            <td><?php echo $r['NOMBRE_CONDUCTOR']; ?></td>   
                                                            <td><?php echo $r['TELEFONO_CONDUCTOR']; ?></td>  
                                                            <td><?php echo $r['EMAIL_CONDUCTOR']; ?></td>  
                                                            <td><?php echo $r['NOTA_CONDUCTOR']; ?></td>  
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

                $ARRAYNUMERO = $CONDUCTOR_ADO->obtenerNumero($EMPRESAS);
                $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;
                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO  
                $CONDUCTOR->__SET('NUMERO_CONDUCTOR', $NUMERO);
                $CONDUCTOR->__SET('RUT_CONDUCTOR', $_REQUEST['RUTCONDUCTOR']);
                $CONDUCTOR->__SET('DV_CONDUCTOR', $_REQUEST['DVCONDUCTOR']);
                $CONDUCTOR->__SET('NOMBRE_CONDUCTOR', $_REQUEST['NOMBRECONDUCTOR']);
                $CONDUCTOR->__SET('TELEFONO_CONDUCTOR', $_REQUEST['TELEFONOCONDUCTOR']);
                $CONDUCTOR->__SET('EMAIL_CONDUCTOR', $_REQUEST['EMAILCONDUCTOR']);
                $CONDUCTOR->__SET('NOTA_CONDUCTOR', $_REQUEST['NOTACONDUCTOR']);
                $CONDUCTOR->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                $CONDUCTOR->__SET('ID_USUARIOI', $IDUSUARIOS);
                $CONDUCTOR->__SET('ID_USUARIOM', $IDUSUARIOS);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $CONDUCTOR_ADO->agregarConductor($CONDUCTOR);

                $AUSUARIO_ADO->agregarAusuario2("NULL",3,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Conductor.","transporte_conductor","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

                //REDIRECCIONAR A PAGINA registroPlanta.php
                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Creado",
                        text:"El registro del mantenedor se ha creado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroConductor.php";                            
                    })
                </script>';
            }
            //OPERACION DE EDICION DE FILA
            if (isset($_REQUEST['EDITAR'])) {


                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
                $CONDUCTOR->__SET('RUT_CONDUCTOR', $_REQUEST['RUTCONDUCTOR']);
                $CONDUCTOR->__SET('DV_CONDUCTOR', $_REQUEST['DVCONDUCTOR']);
                $CONDUCTOR->__SET('NOMBRE_CONDUCTOR', $_REQUEST['NOMBRECONDUCTOR']);
                $CONDUCTOR->__SET('TELEFONO_CONDUCTOR', $_REQUEST['TELEFONOCONDUCTOR']);
                $CONDUCTOR->__SET('EMAIL_CONDUCTOR', $_REQUEST['EMAILCONDUCTOR']);
                $CONDUCTOR->__SET('NOTA_CONDUCTOR', $_REQUEST['NOTACONDUCTOR']);
                $CONDUCTOR->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                $CONDUCTOR->__SET('ID_USUARIOM', $IDUSUARIOS);
                $CONDUCTOR->__SET('ID_CONDUCTOR', $_REQUEST['ID']);
                //LLAMADA AL METODO DE EDICION DEL CONTROLADOR
                $CONDUCTOR_ADO->actualizarConductor($CONDUCTOR);

                $AUSUARIO_ADO->agregarAusuario2("NULL",2,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de Conductor.","transporte_conductor", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );     

                //REDIRECCIONAR A PAGINA registroConductor.php
                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Modificado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroConductor.php";                            
                    })
                </script>';
            }
            
            if (isset($_REQUEST['ELIMINAR'])) {         
    
                $CONDUCTOR->__SET('ID_CONDUCTOR', $_REQUEST['ID']);
                $CONDUCTOR_ADO->deshabilitar($CONDUCTOR);
             
        

                $AUSUARIO_ADO->agregarAusuario2("NULL",2,4,"".$_SESSION["NOMBRE_USUARIO"].", Deshabilitar Conductor.","transporte_conductor", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );                
                
                echo '<script>
                    Swal.fire({
                        icon:"error",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Deshabilitado correctamente", 
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroConductor.php";                            
                    })
                </script>';
            }
            
            if (isset($_REQUEST['HABILITAR'])) {   

                $CONDUCTOR->__SET('ID_CONDUCTOR', $_REQUEST['ID']);
                $CONDUCTOR_ADO->habilitar($CONDUCTOR);

                $AUSUARIO_ADO->agregarAusuario2("NULL",2,5,"".$_SESSION["NOMBRE_USUARIO"].", Habilitar Conductor.","transporte_conductor", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );                               

                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Habilitado correctamente", 
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroConductor.php";                            
                    })
                </script>';
            }
        ?>
</body>

</html>