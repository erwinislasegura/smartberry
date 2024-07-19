<?php

include_once "../../assest/config/validarUsuarioExpo.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/modelo/AVISO.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

//INIICIALIZAR MODELO
$AVISO =  new AVISO();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$IDOP = "";
$OP = "";
$DISABLED = "";
$DISABLED2 = "";

$DIA_INICIO=""; 
$DIA_TERMINO=""; 
$MENSAJE="";
$TAVISO="";
$TPRIORIDAD=""; 
$FECHA_TERMINO="";

$SINO = "";

$MENSAJE = "";

//INICIALIZAR ARREGLOS
$ARRAYUSUARIO = "";
$ARRAYUSUARIOID = "";
$ARRAYTUSUARIOS = "";
$ARRAYUSUARIOBUSCARNOMBREUSUARIO = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYUSUARIO = $AVISO_ADO->listarAvisoCBX();



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
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verUsuario(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYAVISOID = $AVISO_ADO->verAviso($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYAVISOID as $r) :
            $DIA_INICIO = "" . $r['DIA_INICIO'];
            $DIA_TERMINO = "" . $r['DIA_TERMINO'];
            $MENSAJE = "" . $r['MENSAJE'];
            $TAVISO = "" . $r['TAVISO'];
            $TPRIORIDAD = "" . $r['TPRIORIDAD'];
            $FECHA_TERMINO = "" . $r['FECHA_TERMINO'];
        endforeach;
    }
    if ($OP == "1") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION
        $DISABLED = "disabled";
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verUsuario(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYAVISOID = $AVISO_ADO->verAviso($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYAVISOID as $r) :
            $DIA_INICIO = "" . $r['DIA_INICIO'];
            $DIA_TERMINO = "" . $r['DIA_TERMINO'];
            $MENSAJE = "" . $r['MENSAJE'];
            $TAVISO = "" . $r['TAVISO'];
            $TPRIORIDAD = "" . $r['TPRIORIDAD'];
            $FECHA_TERMINO = "" . $r['FECHA_TERMINO'];
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
        $ARRAYAVISOID = $AVISO_ADO->verAviso($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYAVISOID as $r) :

            $DIA_INICIO = "" . $r['DIA_INICIO'];
            $DIA_TERMINO = "" . $r['DIA_TERMINO'];
            $MENSAJE = "" . $r['MENSAJE'];
            $TAVISO = "" . $r['TAVISO'];
            $TPRIORIDAD = "" . $r['TPRIORIDAD'];
            $FECHA_TERMINO = "" . $r['FECHA_TERMINO'];
        endforeach;
    }
    //ver =  OBTENCION DE DATOS PARA LA VISUALIZAAR INFORMAICON DE REGISTRO
    if ($OP == "ver") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION
        $DISABLED = "disabled";
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verUsuario(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYAVISOID = $AVISO_ADO->verAviso($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYAVISOID as $r) :
            $DIA_INICIO = "" . $r['DIA_INICIO'];
            $DIA_TERMINO = "" . $r['DIA_TERMINO'];
            $MENSAJE = "" . $r['MENSAJE'];
            $TAVISO = "" . $r['TAVISO'];
            $TPRIORIDAD = "" . $r['TPRIORIDAD'];
            $FECHA_TERMINO = "" . $r['FECHA_TERMINO'];
        endforeach;
    }
}

if ($_POST) {
    if (isset($_REQUEST['DIA_INICIO'])) {
        $DIA_INICIO = "" . $_REQUEST['DIA_INICIO'];
    }
    if (isset($_REQUEST['DIA_TERMINO'])) {
        $DIA_TERMINO = "" . $_REQUEST['DIA_TERMINO'];
    }
    if (isset($_REQUEST['MENSAJE'])) {
        $MENSAJE = "" . $_REQUEST['MENSAJE'];
    }
    if (isset($_REQUEST['TAVISO'])) {
        $TAVISO = "" . $_REQUEST['TAVISO'];
        if($TAVISO == "2" ){
            if (isset($_REQUEST['FECHA_TERMINO'])) {
                $FECHA_TERMINO = "" . $_REQUEST['FECHA_TERMINO'];
            }
        }
    }
    if (isset($_REQUEST['TPRIORIDAD'])) {
        $TPRIORIDAD = "" . $_REQUEST['TPRIORIDAD'];
    }

}



?>


<!DOCTYPE html>
<html lang="es">
<head>
    <title>Registro Aviso</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <?php include_once "../../assest/config/urlHead.php"; ?>
    <script type="text/javascript">
        function validacion() {

            DIA_INICIO = document.getElementById("DIA_INICIO").value;
            DIA_TERMINO = document.getElementById("DIA_TERMINO").value;
            TPRIORIDAD = document.getElementById("TPRIORIDAD").selectedIndex;
            TAVISO = document.getElementById("TAVISO").selectedIndex;
            MENSAJE = document.getElementById("MENSAJE").value;


            document.getElementById('val_diainicio').innerHTML = "";
            document.getElementById('val_diatermino').innerHTML = "";
            document.getElementById('val_tprioridad').innerHTML = "";
            document.getElementById('val_taviso').innerHTML = "";

            
            document.getElementById('val_mensaje').innerHTML = "";



            if (DIA_INICIO == null || DIA_INICIO == 0) {
                document.form_reg_dato.DIA_INICIO.focus();
                document.form_reg_dato.DIA_INICIO.style.borderColor = "#FF0000";
                document.getElementById('val_diainicio').innerHTML = "NO A INGRESADO DATO";
                return false;
            }
            document.form_reg_dato.DIA_INICIO.style.borderColor = "#4AF575";

            if (DIA_TERMINO == null || DIA_TERMINO == 0) {
                document.form_reg_dato.DIA_TERMINO.focus();
                document.form_reg_dato.DIA_TERMINO.style.borderColor = "#FF0000";
                document.getElementById('val_diatermino').innerHTML = "NO A INGRESADO DATO";
                return false;
            }
            document.form_reg_dato.DIA_TERMINO.style.borderColor = "#4AF575";

            if (TPRIORIDAD == null ) {
                document.form_reg_dato.TPRIORIDAD.focus();
                document.form_reg_dato.TPRIORIDAD.style.borderColor = "#FF0000";
                document.getElementById('val_tprioridad').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                return false;
            }
            document.form_reg_dato.TPRIORIDAD.style.borderColor = "#4AF575";
                        
            if (TAVISO == null ) {
                document.form_reg_dato.TAVISO.focus();
                document.form_reg_dato.TAVISO.style.borderColor = "#FF0000";
                document.getElementById('val_taviso').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                return false;
            }
            document.form_reg_dato.TAVISO.style.borderColor = "#4AF575";
            if(TAVISO==2){
                FECHA_TERMINO = document.getElementById("FECHA_TERMINO").value;
                document.getElementById('val_ftermino').innerHTML = "";

                if (FECHA_TERMINO == null || FECHA_TERMINO == 0) {
                    document.form_reg_dato.FECHA_TERMINO.focus();
                    document.form_reg_dato.FECHA_TERMINO.style.borderColor = "#FF0000";
                    document.getElementById('val_ftermino').innerHTML = "NO A INGRESADO DATO";
                    return false;
                }
                document.form_reg_dato.FECHA_TERMINO.style.borderColor = "#4AF575";
            }

            if (MENSAJE == null || MENSAJE.length == 0 || /^\s+$/.test(MENSAJ)) {
                document.form_reg_dato.MENSAJE.focus();
                document.form_reg_dato.MENSAJE.style.borderColor = "#FF0000";
                document.getElementById('val_mensaje').innerHTML = "NO A INGRESADO DATO";
                return false;
            }
            document.form_reg_dato.MENSAJE.style.borderColor = "#4AF575";
                


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
                            <h3 class="page-title">Aviso</h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                        <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Registro Aviso </a> </li>
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
                                    <h4 class="box-title">Registro Usuario</h4>                                                
                                </div>
                                <!-- /.box-header -->
                                <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato">
                                    <div class="box-body">                                      
                                        <hr class="my-15">
                                        <div class="row">   
                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Dia Inicio</label>
                                                    <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" <?php echo $IDOP; ?> />
                                                    <input type="number" class="form-control" placeholder="Dia Inicio" id="DIA_INICIO" name="DIA_INICIO" value="<?php echo $DIA_INICIO; ?>" <?php echo $DISABLED; ?> />
                                                    <label id="val_diainicio" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Dia Termino</label>
                                                    <input type="number" class="form-control" placeholder="Dia Inicio" id="DIA_TERMINO" name="DIA_TERMINO" value="<?php echo $DIA_TERMINO; ?>" <?php echo $DISABLED; ?> />
                                                    <label id="val_diatermino" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Tipo Prioridad</label>
                                                    <select class="form-control select2" name="TPRIORIDAD" id="TPRIORIDAD" width="100%" value="<?php echo $TPRIORIDAD; ?>"<?php echo $DISABLED; ?>>
                                                        <option></option>
                                                        <option value="1" <?php if ($TPRIORIDAD == "1") { echo "selected";  } ?>> Crítico </option>
                                                        <option value="2" <?php if ($TPRIORIDAD == "2") { echo "selected";  } ?>> Advertencia </option>
                                                        <option value="3" <?php if ($TPRIORIDAD == "3") { echo "selected";  } ?>> No Crítico </option>
                                                    </select>
                                                    <label id="val_tprioridad" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Tipo Aviso</label>
                                                    <select class="form-control select2" name="TAVISO" id="TAVISO"  width="100%" onchange="this.form.submit()" value="<?php echo $TAVISO; ?>" <?php echo $DISABLED; ?>>
                                                        <option></option>
                                                        <option value="1" <?php if ($TAVISO == "1") { echo "selected";  } ?>> Siempre </option>
                                                        <option value="2" <?php if ($TAVISO == "2") { echo "selected";  } ?>> Fijo </option>
                                                    </select>
                                                    <label id="val_taviso" class="validacion"> </label>
                                                </div>
                                            </div>
                                            <?php if ($TAVISO==2) {    ?> 
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Fecha Termino</label>
                                                        <input type="date" class="form-control" placeholder="Fecha Termino" id="FECHA_TERMINO" name="FECHA_TERMINO" value="<?php echo $FECHA_TERMINO; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_ftermino" class="validacion"> </label>
                                                    </div>
                                                </div>                                            
                                            <?php } ?>
                                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Mensaje </label>
                                                    <textarea class="form-control" rows="1" placeholder="Mensaje " id="MENSAJE" name="MENSAJE" <?php echo $DISABLED; ?>><?php echo $MENSAJE; ?></textarea>
                                                    <label id="val_mensaje" class="validacion"> </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->                                           
                                    <div class="box-footer">
                                        <div class="btn-group   col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12 " role="group" aria-label="Acciones generales">                                    
                                            <button type="button" class="btn  btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroUsuarioAviso.php');">
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
                                    <h4 class="box-title">Agrupado Avisos</h4>
                                </div>
                                <div class="box-body">
                                    <table id="listar" class="table-hover " style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Operaciónes</th>
                                                <th>Mensaje</th>
                                                <th>Dia Inico</th>
                                                <th>Dia Termino</th>
                                                <th>Tipos Prioridad</th>
                                                <th>Tipos Aviso</th>
                                                <th>Fecha Termino</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($ARRAYUSUARIO as $r) : ?>
                                                <?php 
                                                  if($r["TPRIORIDAD"]=="1"){
                                                    $NOMBRETPRIORIDAD="Crítico";
                                                  }
                                                  if($r["TPRIORIDAD"]=="2"){
                                                    $NOMBRETPRIORIDAD="Advertencia";
                                                  }
                                                  if($r["TPRIORIDAD"]=="3"){
                                                    $NOMBRETPRIORIDAD="No Crítico";
                                                  }
                                                  
                                                  if($r["TAVISO"]=="1"){
                                                    $NOMBRETAVISO="Siempre";
                                                  }
                                                  if($r["TAVISO"]=="2"){
                                                    $NOMBRETAVISO="Fijo";
                                                  }
                                                ?>
                                                <tr class="center">                                                                                                                                                                    
                                                    <td class="text-center">
                                                        <form method="post" id="form1">
                                                            <div class="list-icons d-inline-flex">
                                                                <div class="list-icons-item dropdown">
                                                                    <button class="btn btn-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <span class="icon-copy ti-settings"></span>
                                                                    </button>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_AVISO']; ?>" />
                                                                        <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroUsuarioAviso" />
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
                                                    <td><?php echo $r["MENSAJE"];?></td>       
                                                    <td><?php echo $r["DIA_INICIO"]; ?></td>                                                                                                                                                                        
                                                    <td><?php echo $r["DIA_TERMINO"];?></td>                                                                                                                                                                   
                                                    <td><?php echo $NOMBRETPRIORIDAD;?></td>                                                                                                                                                                      
                                                    <td><?php echo $NOMBRETAVISO;?></td>                                                                                                                                                                      
                                                    <td><?php echo $r["FECHA_TERMINO"];?></td>      
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
              
                    $AVISO->__SET('DIA_INICIO', $_REQUEST['DIA_INICIO']);
                    $AVISO->__SET('DIA_TERMINO', $_REQUEST['DIA_TERMINO']);
                    $AVISO->__SET('MENSAJE', $_REQUEST['MENSAJE']);
                    $AVISO->__SET('TAVISO', $_REQUEST['TAVISO']);
                    $AVISO->__SET('TPRIORIDAD', $_REQUEST['TPRIORIDAD']);
                    if($_REQUEST['TAVISO']==2){
                        $AVISO->__SET('FECHA_TERMINO', $_REQUEST['FECHA_TERMINO']);  
                    } 
                    $AVISO->__SET('ID_USUARIOI',$IDUSUARIOS);
                    $AVISO->__SET('ID_USUARIOM',$IDUSUARIOS);
                    $AVISO_ADO->agregarAviso($AVISO);

                    $AUSUARIO_ADO->agregarAusuario2("NULL",3,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro  Aviso","usuario_aviso","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );
                    
                    echo '<script>
                        Swal.fire({
                            icon:"success",
                            title:"Registro Creado",
                            text:"El registro de  aviso se ha creado correctamente",
                            showConfirmButton: true,
                            confirmButtonText:"Cerrar",
                            closeOnConfirm:false
                        }).then((result)=>{
                            location.href = "registroUsuarioAviso.php";                            
                        })
                    </script>';
            }
            
            //OPERACION DE EDICION DE FILA
            if (isset($_REQUEST['EDITAR'])) {
                $AVISO->__SET('DIA_INICIO', $_REQUEST['DIA_INICIO']);
                $AVISO->__SET('DIA_TERMINO', $_REQUEST['DIA_TERMINO']);
                $AVISO->__SET('MENSAJE', $_REQUEST['MENSAJE']);
                $AVISO->__SET('TAVISO', $_REQUEST['TAVISO']);
                $AVISO->__SET('TPRIORIDAD', $_REQUEST['TPRIORIDAD']);
                if($_REQUEST['TAVISO']==2){
                    $AVISO->__SET('FECHA_TERMINO', $_REQUEST['FECHA_TERMINO']);  
                } 
                $AVISO->__SET('ID_USUARIOM',$IDUSUARIOS);
                $AVISO->__SET('ID_AVISO', $_REQUEST['ID']);
                $AVISO_ADO->actualizarAviso($AVISO);

                $AUSUARIO_ADO->agregarAusuario2("NULL",3,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación  Aviso","usuario_aviso", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );
                
                echo '<script>
                    Swal.fire({
                        icon:"info",
                        title:"Registro Modificado",
                        text:"El registro de Aviso se ha modificado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroUsuarioAviso.php";                            
                    })
                </script>';
            }

            
            if (isset($_REQUEST['ELIMINAR'])) {

                $AVISO->__SET('ID_AVISO', $_REQUEST['ID']);
                $AVISO_ADO->deshabilitar($AVISO);

                $AUSUARIO_ADO->agregarAusuario2("NULL",3,4,"".$_SESSION["NOMBRE_USUARIO"].", Deshabilitar  Aviso","usuario_aviso", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );                
                
                echo '<script>
                    Swal.fire({
                        icon:"error",
                        title:"Registro Modificado",
                        text:"El registro de Aviso se ha Deshabilitado correctamente", 
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroUsuarioAviso.php";                            
                    })
                </script>';
            }
            
            if (isset($_REQUEST['HABILITAR'])) {

                $AVISO->__SET('ID_AVISO', $_REQUEST['ID']);
                $AVISO_ADO->habilitar($AVISO);

                $AUSUARIO_ADO->agregarAusuario2("NULL",3,5,"".$_SESSION["NOMBRE_USUARIO"].", Habilitar Aviso","usuario_aviso", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );                               

                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Modificado",
                        text:"El registro de Aviso se ha Habilitado correctamente", 
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroUsuarioAviso.php";                            
                    })
                </script>';
            }
    
    ?>
</body>

</html>