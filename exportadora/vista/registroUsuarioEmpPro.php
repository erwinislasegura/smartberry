<?php

include_once "../../assest/config/validarUsuarioExpo.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../../assest/controlador/EMPRESAPRODUCTOR_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';


include_once '../../assest/modelo/EMPRESAPRODUCTOR.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$EMPRESAPRODUCTOR_ADO =  new EMPRESAPRODUCTOR_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();

//INIICIALIZAR MODELO
$EMPRESAPRODUCTOR =  new EMPRESAPRODUCTOR();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$USUARIOEP="";
$PRODUCTOREP="";

$PRODUCTOREP2="";
$USUARIOEP2="";

$IDOP = "";
$OP = "";
$SINO="";
$DISABLED = "";
$DISABLED2 = "";

//INICIALIZAR ARREGLOS
$ARRAYEMPRESAPRODUCTOR="";
$ARRAYEMPRESAPRODUCTORID="";
$ARRAYPRODUCTOREP="";
$ARRAYVERPRODUCTOREP="";
$ARRAYUSUARIOEP = "";
$ARRAYVERUSUARIOEP = "";
$ARRAYVALIDAREMPRESAPRODUCTOR1="";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYEMPRESAPRODUCTOR=$EMPRESAPRODUCTOR_ADO->listarEmpresaProductorPorEmpresaCBX($EMPRESAS);
$ARRAYPRODUCTOREP=$PRODUCTOR_ADO->listarProductorPorEmpresaCBX($EMPRESAS);
$ARRAYUSUARIOEP = $USUARIO_ADO->listarUsuarioCBX();
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

    if ($OP == "0") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verUsuario(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYEMPRESAPRODUCTORID = $EMPRESAPRODUCTOR_ADO->verEmpresaProductor($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYEMPRESAPRODUCTORID as $r) :
            $USUARIOEP = "" . $r['ID_USUARIO'];
            $PRODUCTOREP = "" . $r['ID_PRODUCTOR'];
        endforeach;

    }
    if ($OP == "1") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verUsuario(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYEMPRESAPRODUCTORID = $EMPRESAPRODUCTOR_ADO->verEmpresaProductor($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYEMPRESAPRODUCTORID as $r) :
            $USUARIOEP = "" . $r['ID_USUARIO'];
            $PRODUCTOREP = "" . $r['ID_PRODUCTOR'];
        endforeach;

    }
    //IDENTIFICACIONES DE OPERACIONES
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION

        $DISABLED = "";
        $DISABLED2 = "disabled";
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verUsuario(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYEMPRESAPRODUCTORID = $EMPRESAPRODUCTOR_ADO->verEmpresaProductor($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYEMPRESAPRODUCTORID as $r) :
            $USUARIOEP = "" . $r['ID_USUARIO'];
            $PRODUCTOREP = "" . $r['ID_PRODUCTOR'];
        endforeach;
    }
    //ver =  OBTENCION DE DATOS PARA LA VISUALIZAAR INFORMAICON DE REGISTRO
    if ($OP == "ver") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verUsuario(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYEMPRESAPRODUCTORID = $EMPRESAPRODUCTOR_ADO->verEmpresaProductor($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYEMPRESAPRODUCTORID as $r) :
            $USUARIOEP = "" . $r['ID_USUARIO'];
            $PRODUCTOREP = "" . $r['ID_PRODUCTOR'];
        endforeach;
    }
}

if ($_POST) {    
    if (isset($_REQUEST['USUARIOEP'])) {
        $USUARIOEP = "" . $_REQUEST['USUARIOEP'];
    }
    if (isset($_REQUEST['PRODUCTOREP'])) {
        $PRODUCTOREP = "" . $_REQUEST['PRODUCTOREP'];
    }
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <title>Registro Usu. Asoc.Empre. Prod.</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <?php include_once "../../assest/config/urlHead.php"; ?>
    <script type="text/javascript">
        function validacion() {

            USUARIOEP = document.getElementById("USUARIOEP").selectedIndex;
            PRODUCTOREP = document.getElementById("PRODUCTOREP").selectedIndex;

            document.getElementById('val_usuario').innerHTML = "";
            document.getElementById('val_productor').innerHTML = "";

            if (USUARIOEP == null || USUARIOEP == 0) {
                document.form_reg_dato.USUARIOEP.focus();
                document.form_reg_dato.USUARIOEP.style.borderColor = "#FF0000";
                document.getElementById('val_usuario').innerHTML = "NO HA SELECCIONADO NINGUNA ALTERNATIVA";
                return false;
            }
            document.form_reg_dato.USUARIOEP.style.borderColor = "#4AF575";
            
            if (PRODUCTOREP == null || PRODUCTOREP == 0) {
                document.form_reg_dato.PRODUCTOREP.focus();
                document.form_reg_dato.PRODUCTOREP.style.borderColor = "#FF0000";
                document.getElementById('val_productor').innerHTML = "NO HA SELECCIONADO NINGUNA ALTERNATIVA";
                return false;
            }
            document.form_reg_dato.PRODUCTOREP.style.borderColor = "#4AF575";

        }
        function irPagina(url) {
            location.href = "" + url;
        }
    </script>
</head>
<body class="hold-transition light-skin fixed sidebar-mini theme-primary" >
    <div class="wrapper">
        <?php include_once "../../assest/config/menuExpo.php"; ?>
        <div class="content-wrapper">
            <div class="container-full">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            <h3 class="page-title">Usuario</h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                        <li class="breadcrumb-item" aria-current="page">Usuario</li>
                                        <li class="breadcrumb-item active" aria-current="page"> <a href="#">Registro Usu. Asoc.Empre. Prod. </a> </li>
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
                                    <h4 class="box-title">Registro Usu. Asoc.Empre. Prod.</h4>                                                
                                </div>
                                <!-- /.box-header -->
                                <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato">
                                    <div class="box-body">                                      
                                        <hr class="my-15">
                                        <div class="row">                                       
                                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Usuario</label>
                                                    <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                    <input type="hidden" class="form-control" placeholder="EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                    <input type="hidden" class="form-control" placeholder="USUARIOEP2" id="USUARIOEP2" name="USUARIOEP2" value="<?php echo $USUARIOEP; ?>" />
                                                    <select class="form-control select2" id="USUARIOEP" name="USUARIOEP" value="<?php echo $USUARIOEP; ?>" <?php echo $DISABLED2; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYUSUARIOEP as $r) : ?>
                                                            <?php if ($ARRAYUSUARIOEP) {    ?>
                                                                <option value="<?php echo $r['ID_USUARIO']; ?>" 
                                                                <?php if ($USUARIOEP == $r['ID_USUARIO']) { echo "selected";  } ?>>
                                                                    <?php echo $r['NOMBRE_USUARIO'] ?>
                                                                </option>
                                                            <?php } else { ?>
                                                                <option>No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_usuario" class="validacion"> </label>
                                                </div>
                                            </div>                                                                          
                                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Productor</label>
                                                    <input type="hidden" class="form-control" placeholder="PRODUCTOREP2" id="PRODUCTOREP2" name="PRODUCTOREP2" value="<?php echo $PRODUCTOREP; ?>" />
                                                    <select class="form-control select2" id="PRODUCTOREP" name="PRODUCTOREP" value="<?php echo $PRODUCTOREP; ?>" <?php echo $DISABLED; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYPRODUCTOREP as $r) : ?>
                                                            <?php if ($ARRAYPRODUCTOREP) {    ?>
                                                                <option value="<?php echo $r['ID_PRODUCTOR']; ?>" 
                                                                <?php if ($PRODUCTOREP == $r['ID_PRODUCTOR']) { echo "selected";  } ?>>
                                                                <?php echo $r['CSG_PRODUCTOR'] ?> : <?php echo $r['NOMBRE_PRODUCTOR'] ?>
                                                                </option> 
                                                            <?php } else { ?>
                                                                <option>No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_productor" class="validacion"> </label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.box-body -->                                              
                                    <div class="box-footer">
                                        <div class="btn-group   col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12 " role="group" aria-label="Acciones generales">                                    
                                            <button type="button" class="btn  btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroUsuarioEmpPro.php');">
                                                <i class="ti-trash"></i> Cancelar
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
                                    <h4 class="box-title">Agrupado Usu. Asoc.Empre. Prod.</h4>
                                </div>
                                <div class="box-body">
                                    <table id="listar" class="table-hover " style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Nombre Usuario</th>
                                                <th>Nombre Productor</th>
                                                <th class="text-center">Operaciónes</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($ARRAYEMPRESAPRODUCTOR as $r) : ?>
                                                <?php 
                                                $ARRAYVERUSUARIOEP=$USUARIO_ADO->verUsuario($r["ID_USUARIO"]);
                                                if($ARRAYVERUSUARIOEP){
                                                    $NOMBREUSUARIO = $ARRAYVERUSUARIOEP[0]["NOMBRE_USUARIO"];
                                                }else{
                                                    $NOMBREUSUARIO="Sin Datos";
                                                }
                                                $ARRAYVERPRODUCTOREP=$PRODUCTOR_ADO->verProductor($r["ID_PRODUCTOR"]);
                                                if($ARRAYVERPRODUCTOREP){
                                                    $NOMBREPRODUCTOR= $ARRAYVERPRODUCTOREP[0]["CSG_PRODUCTOR"]." : ".$ARRAYVERPRODUCTOREP[0]["NOMBRE_PRODUCTOR"];
                                                }else{
                                                    $NOMBREPRODUCTOR="Sin Datos";
                                                }                                                   
                                                ?>
                                                <tr class="center">                                                                                                                          
                                                    <td><?php echo $NOMBREUSUARIO; ?></td>                                                                                                                                                         
                                                    <td><?php echo $NOMBREPRODUCTOR; ?></td>                                                                                                                                                                        
                                                    <td class="text-center">
                                                        <form method="post" id="form1">
                                                            <div class="list-icons d-inline-flex">
                                                                <div class="list-icons-item dropdown">
                                                                    <button class="btn btn-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <span class="icon-copy ti-settings"></span>
                                                                    </button>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_EMPRESAPRODUCTOR']; ?>" />
                                                                        <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroUsuarioEmpPro" />
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
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.box -->
                    </div>
                    <!--.row -->
                </section>
                <!-- /.content -->
            </div>
        </div>
        <?php include_once "../../assest/config/footer.php"; ?>
        <?php include_once "../../assest/config/menuExtraExpo.php"; ?>
    </div>
    <?php include_once "../../assest/config/urlBase.php"; ?>
    <?php        
            //OPERACIONES
            //OPERACION DE REGISTRO DE FILA
            if (isset($_REQUEST['GUARDAR'])) {  
                $ARRAYVALIDAREMPRESAPRODUCTOR1=$EMPRESAPRODUCTOR_ADO->validarEmpresaProductorUsuarioCBX($_REQUEST['EMPRESA'],$_REQUEST['PRODUCTOREP'], $_REQUEST['USUARIOEP']);
                if($ARRAYVALIDAREMPRESAPRODUCTOR1){
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
                    $SINO="1";
                }else{
                    $SINO="0";
                }                
                if($SINO=="0"){
                    $EMPRESAPRODUCTOR->__SET('ID_USUARIO', $_REQUEST['USUARIOEP']);
                    $EMPRESAPRODUCTOR->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                    $EMPRESAPRODUCTOR->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOREP']);
                    $EMPRESAPRODUCTOR->__SET('ID_USUARIOI', $IDUSUARIOS);
                    $EMPRESAPRODUCTOR->__SET('ID_USUARIOM', $IDUSUARIOS);
                    $EMPRESAPRODUCTOR_ADO->agregarEmpresaProductor($EMPRESAPRODUCTOR);         

                    $AUSUARIO_ADO->agregarAusuario2("NULL",3,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro  Usu. Asoc.Empre. Prod","usuario_empresaproductor","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );           

                    echo '<script>
                        Swal.fire({
                            icon:"success",
                            title:"Registro Creado",
                            text:"El registro de Usu. Asoc.Empre. Prod. se ha creado correctamente",
                            showConfirmButton: true,
                            confirmButtonText:"Cerrar",
                            closeOnConfirm:false
                        }).then((result)=>{
                            location.href = "registroUsuarioEmpPro.php";                            
                        })
                    </script>';
                }                
            }
            //OPERACION DE EDICION DE FILA
            if (isset($_REQUEST['EDITAR'])) {
                if( $_REQUEST['PRODUCTOREP']!=$_REQUEST['PRODUCTOREP2']){               
                    echo "wolas";             
                    $ARRAYVALIDAREMPRESAPRODUCTOR1=$EMPRESAPRODUCTOR_ADO->validarEmpresaProductorUsuarioCBX($_REQUEST['EMPRESA'],$_REQUEST['PRODUCTOREP'], $_REQUEST['USUARIOEP2']);
                    if($ARRAYVALIDAREMPRESAPRODUCTOR1){
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
                        $SINO="1";
                    }else{
                          $SINO="0";
                    }
                } else{
                    $SINO="0";
                }
                if($SINO=="0"){                
                    $EMPRESAPRODUCTOR->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                    $EMPRESAPRODUCTOR->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOREP']);
                    $EMPRESAPRODUCTOR->__SET('ID_USUARIOM', $IDUSUARIOS);
                    $EMPRESAPRODUCTOR->__SET('ID_EMPRESAPRODUCTOR', $_REQUEST['ID']);
                    $EMPRESAPRODUCTOR_ADO->actualizarEmpresaProductor($EMPRESAPRODUCTOR);
                    
                    $AUSUARIO_ADO->agregarAusuario2("NULL",3,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de Usu. Asoc.Empre. Prod","usuario_empresaproductor", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );     
                    
                    echo '<script>
                    Swal.fire({
                        icon:"info",
                        title:"Registro Modificado",
                        text:"El registro de Usu. Asoc.Empre. Prod. se ha modificado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroUsuarioEmpPro.php";                            
                    })
                    </script>';
                }
            }
            
            if (isset($_REQUEST['ELIMINAR'])) {

                $EMPRESAPRODUCTOR->__SET('ID_EMPRESAPRODUCTOR', $_REQUEST['ID']);
                $EMPRESAPRODUCTOR_ADO->deshabilitar($EMPRESAPRODUCTOR);

                $AUSUARIO_ADO->agregarAusuario2("NULL",3,4,"".$_SESSION["NOMBRE_USUARIO"].", Deshabilitar  Usu. Asoc.Empre. Prod.","usuario_empresaproductor", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );                
                
                echo '<script>
                    Swal.fire({
                        icon:"error",
                        title:"Registro Modificado",
                        text:"El registro de Usu. Asoc.Empre. Prod. se ha Deshabilitado correctamente", 
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroUsuarioEmpPro.php";                            
                    })
                </script>';
            }
            
            if (isset($_REQUEST['HABILITAR'])) {

                $EMPRESAPRODUCTOR->__SET('ID_EMPRESAPRODUCTOR', $_REQUEST['ID']);
                $EMPRESAPRODUCTOR_ADO->habilitar($EMPRESAPRODUCTOR);

                $AUSUARIO_ADO->agregarAusuario2("NULL",3,5,"".$_SESSION["NOMBRE_USUARIO"].", Habilitar Usu. Asoc.Empre. Prod.","usuario_empresaproductor", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );                               

                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Modificado",
                        text:"El registro de Usu. Asoc.Empre. Prod. se ha Habilitado correctamente", 
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroUsuarioEmpPro.php";                            
                    })
                </script>';
            }
    
    ?>
</body>

</html>