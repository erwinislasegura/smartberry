<?php


include_once "../../assest/config/validarUsuarioMaterial.php";


//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/SUBFAMILIA_ADO.php';
include_once '../../assest/controlador/FAMILIA_ADO.php';


include_once '../../assest/modelo/SUBFAMILIA.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$SUBFAMILIA_ADO =  new SUBFAMILIA_ADO();
$FAMILIA_ADO =  new FAMILIA_ADO();

//INIICIALIZAR MODELO

$SUBFAMILIAS =  new SUBFAMILIA();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$NOMBRESUBFAMILIA = "";
$FAMILIA = "";
$EMPRESA = "";
$NUMERO="";
$CONTADOR=0;



$FOCUS = "";
$BORDER = "";
$DISABLED = "";
$OP = "";

//INICIALIZAR ARREGLOS
$ARRAYSUBFAMILIAID = "";
$ARRAYSUBFAMILIAS = "";
$ARRAYEMPRESA = "";
$ARRAYFAMILIA = "";
$ARRAYNUMERO = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYSUBFAMILIAS = $SUBFAMILIA_ADO->listarSubfamiliaPorEmpresaCBX($EMPRESAS);
$ARRAYFAMILIA = $FAMILIA_ADO->listarFamiliaPorEmpresaCBX($EMPRESAS);
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
        $ARRAYSUBFAMILIAID = $SUBFAMILIA_ADO->verSubfamilia($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYSUBFAMILIAID as $r) :
            $NOMBRESUBFAMILIA = "" . $r['NOMBRE_SUBFAMILIA'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $FAMILIA = "" . $r['ID_FAMILIA'];
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
        $ARRAYSUBFAMILIAID = $SUBFAMILIA_ADO->verSubfamilia($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYSUBFAMILIAID as $r) :
            $NOMBRESUBFAMILIA = "" . $r['NOMBRE_SUBFAMILIA'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $FAMILIA = "" . $r['ID_FAMILIA'];
        endforeach;

    }

    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYSUBFAMILIAID = $SUBFAMILIA_ADO->verSubfamilia($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA        
        foreach ($ARRAYSUBFAMILIAID as $r) :
            $NOMBRESUBFAMILIA = "" . $r['NOMBRE_SUBFAMILIA'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $FAMILIA = "" . $r['ID_FAMILIA'];
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
        $ARRAYSUBFAMILIAID = $SUBFAMILIA_ADO->verSubfamilia($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYSUBFAMILIAID as $r) :
            $NOMBRESUBFAMILIA = "" . $r['NOMBRE_SUBFAMILIA'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $FAMILIA = "" . $r['ID_FAMILIA'];
        endforeach;
    }
}


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Sub familia</title>
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

                    NOMBRESUBFAMILIA = document.getElementById("NOMBRESUBFAMILIA").value;
                    FAMILIA = document.getElementById("FAMILIA").selectedIndex;


                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_familia').innerHTML = "";


                    if (NOMBRESUBFAMILIA == null || NOMBRESUBFAMILIA.length == 0 || /^\s+$/.test(NOMBRESUBFAMILIA)) {
                        document.form_reg_dato.NOMBRESUBFAMILIA.focus();
                        document.form_reg_dato.NOMBRESUBFAMILIA.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBRESUBFAMILIA.style.borderColor = "#4AF575";



                    if (FAMILIA == null || FAMILIA == 0) {
                        document.form_reg_dato.FAMILIA.focus();
                        document.form_reg_dato.FAMILIA.style.borderColor = "#FF0000";
                        document.getElementById('val_familia').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.FAMILIA.style.borderColor = "#4AF575";

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
            <div class="content-wrapper">
                <div class="container-full">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Producto</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Mantenedores</li>
                                            <li class="breadcrumb-item" aria-current="page">Producto </li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="registroSubfamilia.php"> Registro Sub familia </a> </li>
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
                                        <h4 class="box-title">Registro Sub Familia</h4>                                
                                    </div>
                                    <!-- /.box-header -->
                                    <form class="form" role="form" method="post" id="form_reg_dato" name="form_reg_dato" >
                                        <div class="box-body">
                                            <hr class="my-15">
                                            <div class="row">
                                                 <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Nombre </label>
                                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                        <input type="hidden" class="form-control" placeholder="EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                        <input type="text" class="form-control" placeholder=" Nombre  Subfamilia" id="NOMBRESUBFAMILIA" name="NOMBRESUBFAMILIA" value="<?php echo $NOMBRESUBFAMILIA; ?>" <?php echo $FOCUS; ?> <?php echo  $BORDER; ?> <?php echo $DISABLED; ?> />
                                                        <label id="val_nombre" class="validacion"> </label>
                                                    </div>
                                                 </div>
                                                 <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Familia</label>
                                                        <select class="form-control select2" id="FAMILIA" name="FAMILIA" style="width: 100%;" value="<?php echo $FAMILIA; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYFAMILIA as $r) : ?>
                                                                <?php if ($ARRAYFAMILIA) {    ?>
                                                                    <option value="<?php echo $r['ID_FAMILIA']; ?>" <?php if ($FAMILIA == $r['ID_FAMILIA']) {
                                                                                                                        echo "selected";
                                                                                                                    } ?>>
                                                                        <?php echo $r['NOMBRE_FAMILIA'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No Hay Datos Registados </option>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_familia" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->    
                                        <div class="box-footer">
                                            <div class="btn-group   col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12 " role="group" aria-label="Acciones generales">                                    
                                                <button type="button" class="btn  btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroSubfamilia.php');">
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
                                        <h4 class="box-title"> Agrupado Sub Familia</h4>
                                    </div>
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <table id="listar" class=" table-hover " style="width: 100%;">
                                                <thead>
                                                    <tr class="center">
                                                        <th>Número</th>
                                                        <th class="text-center">Operaciónes</th>
                                                        <th>Nombre</th>
                                                        <th>Familia</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYSUBFAMILIAS as $r) : ?>
                                                        <?php   
                                                            $CONTADOR+=1;          
                                                            $ARRAYVERFAMILIA = $FAMILIA_ADO->verFamilia($r["ID_FAMILIA"]);
                                                            if($ARRAYVERFAMILIA){
                                                                $NOMBREFAMILIA = $ARRAYVERFAMILIA[0]["NOMBRE_FAMILIA"];
                                                            }else{
                                                                $NOMBREFAMILIA="Sin Datos";
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
                                                                                <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_SUBFAMILIA']; ?>" />
                                                                                <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroSubfamilia" />
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
                                                            <td> <?php echo $r['NOMBRE_SUBFAMILIA']; ?></td>   
                                                            <td> <?php echo $NOMBREFAMILIA; ?></td>   
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


                $ARRAYNUMERO = $SUBFAMILIA_ADO->obtenerNumero($_REQUEST['EMPRESA']);
                $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;

                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
                $SUBFAMILIAS->__SET('NUMERO_SUBFAMILIA', $NUMERO);
                $SUBFAMILIAS->__SET('NOMBRE_SUBFAMILIA', $_REQUEST['NOMBRESUBFAMILIA']);
                $SUBFAMILIAS->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                $SUBFAMILIAS->__SET('ID_FAMILIA', $_REQUEST['FAMILIA']);
                $SUBFAMILIAS->__SET('ID_USUARIOI', $IDUSUARIOS);
                $SUBFAMILIAS->__SET('ID_USUARIOM', $IDUSUARIOS);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $SUBFAMILIA_ADO->agregarSubfamilia($SUBFAMILIAS);

                $AUSUARIO_ADO->agregarAusuario2("NULL",2,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Sub Familia.","material_subfamilia","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

                //REDIRECCIONAR A PAGINA registroEcomercial.php      
                    echo '<script>
                        Swal.fire({
                            icon:"success",
                            title:"Registro Creado",
                            text:"El registro del mantenedor se ha creado correctamente",
                            showConfirmButton: true,
                            confirmButtonText:"Cerrar",
                            closeOnConfirm:false
                        }).then((result)=>{
                            location.href = "registroSubfamilia.php";                            
                        })
                    </script>';
            }
            //OPERACION DE EDICION DE FILA
            if (isset($_REQUEST['EDITAR'])) {
                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO 


                $SUBFAMILIAS->__SET('NOMBRE_SUBFAMILIA', $_REQUEST['NOMBRESUBFAMILIA']);
                $SUBFAMILIAS->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                $SUBFAMILIAS->__SET('ID_FAMILIA', $_REQUEST['FAMILIA']);
                $SUBFAMILIAS->__SET('ID_USUARIOM', $IDUSUARIOS);
                $SUBFAMILIAS->__SET('ID_SUBFAMILIA', $_REQUEST['ID']);
                //LLAMADA AL METODO DE EDICION DEL CONTROLADOR   
                $SUBFAMILIA_ADO->actualizarSubfamilia($SUBFAMILIAS);

                $AUSUARIO_ADO->agregarAusuario2("NULL",2,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de Sub Familia.","material_subfamilia", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );     

                //REDIRECCIONAR A PAGINA registroEcomercial.php
                    echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Modificado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroSubfamilia.php";                            
                    })
                </script>';
            }
            
            if (isset($_REQUEST['ELIMINAR'])) {


                
                $SUBFAMILIAS->__SET('ID_SUBFAMILIA', $_REQUEST['ID']);
                $SUBFAMILIA_ADO->deshabilitar($SUBFAMILIAS);
       
                $AUSUARIO_ADO->agregarAusuario2("NULL",2,4,"".$_SESSION["NOMBRE_USUARIO"].", Deshabilitar Sub Familia.","material_subfamilia", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );                
                
                echo '<script>
                    Swal.fire({
                        icon:"error",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Deshabilitado correctamente", 
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroSubfamilia.php";                            
                    })
                </script>';
            }
            
            if (isset($_REQUEST['HABILITAR'])) {       
                
                $SUBFAMILIAS->__SET('ID_SUBFAMILIA', $_REQUEST['ID']);
                $SUBFAMILIA_ADO->habilitar($SUBFAMILIAS);        

                $AUSUARIO_ADO->agregarAusuario2("NULL",2,5,"".$_SESSION["NOMBRE_USUARIO"].", Habilitar Sub Familia.","material_subfamilia", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );                               

                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Habilitado correctamente", 
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroSubfamilia.php";                            
                    })
                </script>';
            }
        ?>
</body>

</html>