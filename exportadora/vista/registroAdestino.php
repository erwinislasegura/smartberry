<?php

include_once "../../assest/config/validarUsuarioExpo.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/ADESTINO_ADO.php';
include_once '../../assest/modelo/ADESTINO.php';

//INCIALIZAR LAS VARIBLES

//INICIALIZAR CONTROLADOR

$ADESTINO_ADO =  new ADESTINO_ADO();
//INIICIALIZAR MODELO
$ADESTINO =  new ADESTINO();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$NOMBREADESTINO = "";
$NOTAADESTINO = "";
$NUMERO = "";
$CONTADOR=0;

$IDOP = "";
$OP = "";
$DISABLED = "";


//INICIALIZAR ARREGLOS
$ARRAYADESTINO = "";
$ARRAYADESTINOID = "";
$ARRAYNUMERO = "";



//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYADESTINO = $ADESTINO_ADO->listarAdestinoPorEmpresaCBX($EMPRESAS);
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
if (isset($id_dato) && isset($accion_dato)) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $id_dato;
    $OP = $accion_dato;

    //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
    //ALMACENAR INFORMACION EN ARREGLO
    //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
    //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
    $ARRAYADESTINOID = $ADESTINO_ADO->verAdestino($IDOP);

    //IDENTIFICACIONES DE OPERACIONES    //OPERACION DE CAMBIO DE ESTADO
    //0 = DESACTIVAR
    if ($OP == "0") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION
        $DISABLED = "disabled";
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYADESTINOID as $r) :
            $NOMBREADESTINO = "" . $r['NOMBRE_ADESTINO'];
        endforeach;

    }
    //1 = ACTIVAR
    if ($OP == "1") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION
        $DISABLED = "disabled";
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYADESTINOID as $r) :
            $NOMBREADESTINO = "" . $r['NOMBRE_ADESTINO'];
        endforeach;

    }
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {

        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYADESTINOID as $r) :
            $NOMBREADESTINO = "" . $r['NOMBRE_ADESTINO'];
        endforeach;
    }

    //ver =  OBTENCION DE DATOS PARA LA VISUALIZAAR INFORMAICON DE REGISTRO
    if ($OP == "ver") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION
        $DISABLED = "disabled";
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYADESTINOID as $r) :
            $NOMBREADESTINO = "" . $r['NOMBRE_ADESTINO'];
        endforeach;
    }
}



?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Aeropuerto Destino</title>
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



                    NOMBREADESTINO = document.getElementById("NOMBREADESTINO").value;
                    document.getElementById('val_nombre').innerHTML = "";

                    if (NOMBREADESTINO == null || NOMBREADESTINO.length == 0 || /^\s+$/.test(NOMBREADESTINO)) {
                        document.form_reg_dato.NOMBREADESTINO.focus();
                        document.form_reg_dato.NOMBREADESTINO.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBREADESTINO.style.borderColor = "#4AF575";



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
            <?php include_once "../../assest/config/menuExpo.php"; ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="container-full">

                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Instructivo</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Mantenedores</li>
                                            <li class="breadcrumb-item" aria-current="page">Instructivo</li>
                                            <li class="breadcrumb-item" aria-current="page">Destino</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Registro Aeropuerto Destino</a>  </li>
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
                                        <h4 class="box-title">Registro Aeropuerto Destino </h4>                                     
                                    </div>
                                    <!-- /.box-header -->
                                    <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato" >
                                        <div class="box-body">
                                            <hr class="my-15">
                                            <div class="row">
                                                 <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Nombre </label>
                                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                        <input type="hidden" class="form-control" placeholder="EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                        <input type="text" class="form-control" placeholder="Nombre Aeropuerto Destino" id="NOMBREADESTINO" name="NOMBREADESTINO" value="<?php echo $NOMBREADESTINO; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nombre" class="validacion"> </label>
                                                    </div>
                                                 </div>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <div class="btn-group   col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12 " role="group" aria-label="Acciones generales">                                    
                                                <button type="button" class="btn  btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroAdestino.php');">
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
                                        <h4 class="box-title">Agrupados Aeropuerto Destino</h4>
                                    </div>
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <table id="listar" class="table-hover " style="width: 100%;">
                                                <thead>
                                                    <tr class="center">
                                                        <th>Numero </th>
                                                        <th>Operaciones</th>
                                                        <th>Nombre </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYADESTINO as $r) : ?>
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
                                                                                <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_ADESTINO']; ?>" />
                                                                                <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroAdestino" />
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
                                                            <td><?php echo $r['NOMBRE_ADESTINO']; ?></td>        
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

                $ARRAYNUMERO = $ADESTINO_ADO->obtenerNumero($_REQUEST['EMPRESA']);
                $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;


                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
                $ADESTINO->__SET('NUMERO_ADESTINO', $NUMERO);
                $ADESTINO->__SET('NOMBRE_ADESTINO', $_REQUEST['NOMBREADESTINO']);
                $ADESTINO->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                $ADESTINO->__SET('ID_USUARIOI', $IDUSUARIOS);
                $ADESTINO->__SET('ID_USUARIOM', $IDUSUARIOS);
                //LLAMADA AL METODO DE EDICION DEL CONTROLADOR
                $ADESTINO_ADO->agregarAdestino($ADESTINO);

                $AUSUARIO_ADO->agregarAusuario2("NULL",3,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Aeropuerto Destino.","fruta_adestino","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );  

                //REDIRECCIONAR A PAGINA registroTfruta.php
                    echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Creado",
                        text:"El registro del mantenedor se ha creado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroAdestino.php";                            
                    })
                </script>';
            }
            //OPERACION EDICION DE FILA
            if (isset($_REQUEST['EDITAR'])) {
                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO  
                $ADESTINO->__SET('NOMBRE_ADESTINO', $_REQUEST['NOMBREADESTINO']);
                $ADESTINO->__SET('ID_USUARIOM', $IDUSUARIOS);
                $ADESTINO->__SET('ID_ADESTINO', $_REQUEST['ID']);
                //LLAMADA AL METODO DE EDICION DEL CONTROLADOR
                $ADESTINO_ADO->actualizarAdestino($ADESTINO);

                $AUSUARIO_ADO->agregarAusuario2("NULL",3,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de Aeropuerto  Destino.","fruta_adestino", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );     

                //REDIRECCIONAR A PAGINA registroTfruta.php
                    echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Modificado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroAdestino.php";                            
                    })
                </script>';
            }
            
            if (isset($_REQUEST['ELIMINAR'])) {         

                $ADESTINO->__SET('ID_ADESTINO', $_REQUEST['ID']);
                $ADESTINO_ADO->deshabilitar($ADESTINO);      
        

                $AUSUARIO_ADO->agregarAusuario2("NULL",3,4,"".$_SESSION["NOMBRE_USUARIO"].", Deshabilitar Aeropuerto Destino  .","fruta_adestino", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );                
                
                echo '<script>
                    Swal.fire({
                        icon:"error",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Deshabilitado correctamente", 
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroAdestino.php";                            
                    })
                </script>';
            }
            
            if (isset($_REQUEST['HABILITAR'])) {   

                $ADESTINO->__SET('ID_ADESTINO', $_REQUEST['ID']);
                $ADESTINO_ADO->habilitar($ADESTINO);

                $AUSUARIO_ADO->agregarAusuario2("NULL",3,5,"".$_SESSION["NOMBRE_USUARIO"].", Habilitar Aeropuerto Destino  .","fruta_adestino", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );                               

                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Habilitado correctamente", 
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroAdestino.php";                            
                    })
                </script>';
            }

        ?>
</body>

</html>