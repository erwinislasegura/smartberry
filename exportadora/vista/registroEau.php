<?php


include_once "../config/validarUsuario.php";
//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../controlador/EAU_ADO.php';
include_once '../modelo/EAU.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR¿


$EAU_ADO =  new EAU_ADO();
$EAU =  new EAU();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$IDOP = "";
$OP = "";
$DISABLED = "";


$EMPRESA = "";
$USUARIO = "";
$FNOMBRE = "";



$NOMBRE = "";
$MENSAJE = "";
$FOCUS = "";
$MENSAJE2 = "";
$FOCUS2 = "";
$BORDER = "";

//INICIALIZAR ARREGLOS
$ARRAYEAU = "";
$ARRAYEAUID = "";
$ARRAYEMPRESA = "";
$ARRAYEMPRESA2 = "";
$ARRAYUSUARIO = "";
$ARRAYUSUARIO2 = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES

$ARRAYEAU = $EAU_ADO->listarEauPorEmpresaCBX($EMPRESAS);
$ARRAYEMPRESA = $EMPRESA_ADO->listarEmpresaCBX();
$ARRAYUSUARIO = $USUARIO_ADO->listarUsuarioCBX();
include_once "../config/validarDatosUrl.php";
include_once "../config/datosUrl.php";




if (isset($_REQUEST['GUARDAR'])) {

    $EAU->__SET('ID_USUARIO', $_REQUEST['USUARIO']);
    $EAU->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
    $EAU->__SET('ID_USUARIOI', $IDUSUARIOS);
    $EAU->__SET('ID_USUARIOM', $IDUSUARIOS);
    $EAU_ADO->agregarEau($EAU);
    echo "<script type='text/javascript'> location.href ='registroEau.php';</script>";
}
if (isset($_REQUEST['EDITAR'])) {


    $EAU->__SET('ID_USUARIO', $_REQUEST['USUARIO']);
    $EAU->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
    $EAU->__SET('ID_USUARIOM', $IDUSUARIOS);
    $EAU->__SET('ID_EAU', $_REQUEST['ID']);
    $EAU_ADO->actualizarEau($EAU);
    echo "<script type='text/javascript'> location.href ='registroEau.php';</script>";
}

//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION Y VISUALIZACION
//PREGUNTA SI LA URL VIENE  CON DATOS "parametro" y "parametro1"
if (isset($_SESSION['parametro']) && isset($_SESSION['parametro1'])) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $_SESSION['parametro'];
    $OP = $_SESSION['parametro1'];


    //IDENTIFICACIONES DE OPERACIONES
    //OPERACION DE CAMBIO DE ESTADO
    //0 = DESACTIVAR
    if ($OP == "0") {

        $EAU->__SET('ID_EAU', $IDOP);
        $EAU_ADO->deshabilitar($EAU);

        echo "<script type='text/javascript'> location.href ='registroEau.php';</script>";
    }
    //1 = ACTIVAR
    if ($OP == "1") {

        $EAU->__SET('ID_EAU', $IDOP);
        $EAU_ADO->habilitar($EAU);
        echo "<script type='text/javascript'> location.href ='registroEau.php';</script>";
    }
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYEAUID = $EAU_ADO->verEau($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYEAUID as $r) :
            $USUARIO = "" . $r['ID_USUARIO'];
            $EMPRESA = "" . $r['ID_EMPRESA'];

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
        $ARRAYEAUID = $EAU_ADO->verEau($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYEAUID as $r) :
            $USUARIO = "" . $r['ID_USUARIO'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
        endforeach;
    }
}



?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro EAU</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <?php include_once "../config/urlHead.php"; ?>
    <script type="text/javascript">
        function validacion() {
            USUARIO = document.getElementById("USUARIO").selectedIndex;


            document.getElementById('val_usuario').innerHTML = "";



            if (USUARIO == null || USUARIO == 0) {
                document.form_reg_dato.USUARIO.focus();
                document.form_reg_dato.USUARIO.style.borderColor = "#FF0000";
                document.getElementById('val_usuario').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                return false;
            }
            document.form_reg_dato.USUARIO.style.borderColor = "#4AF575";


        }



        function irPagina(url) {
            location.href = "" + url;
        }


        function mueveReloj() {


            momentoActual = new Date();

            dia = momentoActual.getDate();
            mes = momentoActual.getMonth() + 1;
            ano = momentoActual.getFullYear();

            hora = momentoActual.getHours();
            minuto = momentoActual.getMinutes();
            segundo = momentoActual.getSeconds();

            if (dia < 10) {
                dia = "0" + dia;
            }

            if (mes < 10) {
                mes = "0" + mes;
            }
            if (hora < 10) {
                hora = "0" + hora;
            }
            if (minuto < 10) {
                minuto = "0" + minuto;
            }
            if (segundo < 10) {
                segundo = "0" + segundo;
            }

            horaImprimible = hora + " : " + minuto;
            fechaImprimible = dia + "-" + mes + "-" + ano;


            //     document.form_reg_dato.HORARECEPCION.value = horaImprimible;
            document.fechahora.fechahora.value = fechaImprimible + " " + horaImprimible;
            setTimeout("mueveReloj()", 1000);
        }
    </script>

</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary" onload="mueveReloj()">
    <div class="wrapper">
        <?php include_once "../config/menu.php"; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-full">

                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            <h3 class="page-title">EAU</h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                        <li class="breadcrumb-item" aria-current="page">Mantenedores</li>
                                        <li class="breadcrumb-item" aria-current="page">Asociación</li>
                                        <li class="breadcrumb-item active" aria-current="page"> <a href="registroEau.php"> Operaciónes EAU </a>
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <div class="right-title">
                            <div class="d-flex mt-10 justify-content-end">
                                <div class="d-lg-flex mr-20 ml-10 d-none">
                                    <div class="chart-text mr-10">
                                        <!--
								<h6 class="mb-0"><small>THIS MONTH</small></h6>
                                <h4 class="mt-0 text-primary">$12,125</h4>-->
                                    </div>
                                </div>
                                <div class="d-lg-flex mr-20 ml-10 d-none">
                                    <div class="chart-text mr-10">
                                        <!--
								<h6 class="mb-0"><small>LAST YEAR</small></h6>
                                <h4 class="mt-0 text-danger">$22,754</h4>-->
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <!--  
                                    <h4 class="box-title">Sample form 1</h4>
                                -->
                                </div>
                                <!-- /.box-header -->
                                <form class="form" role="form" method="post" name="form_reg_dato" onsubmit="return validacion()">
                                    <div class="box-body">
                                        <h4 class="box-title text-info"><i class="ti-user mr-15"></i>Registro
                                        </h4>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Empresa</label>
                                                    <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                    <input type="hidden" class="form-control" placeholder="EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                    <select class="form-control select2" id="EMPRESAV" name="EMPRESAV" value="<?php echo $EMPRESA; ?>" <?php echo $DISABLED; ?> disabled>
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
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Usuario</label>
                                                    <select class="form-control select2" id="USUARIO" name="USUARIO" value="<?php echo $USUARIO; ?>" <?php echo $FOCUS; ?> <?php echo  $BORDER; ?> <?php echo $DISABLED; ?>>

                                                        <option></option>
                                                        <?php foreach ($ARRAYUSUARIO as $r) : ?>
                                                            <?php if ($ARRAYUSUARIO) {    ?>
                                                                <option value="<?php echo $r['ID_USUARIO']; ?>" <?php if ($USUARIO == $r['ID_USUARIO']) {
                                                                                                                    echo "selected";
                                                                                                                } ?>>
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
                                        </div>

                                    </div>
                                    <div class="box-footer">
                                        <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroEau.php'); ">
                                            <i class="ti-trash"></i> Cancelar
                                        </button>
                                        <?php if ($OP != "editar") { ?>
                                            <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="GUARDAR" value="GUARDAR" <?php echo $DISABLED; ?>>
                                                <i class="ti-save-alt"></i> Crear
                                            </button>
                                        <?php } else { ?>
                                            <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="EDITAR" value="EDITAR">
                                                <i class="ti-save-alt"></i> Guardar
                                            </button>
                                        <?php } ?>
                                    </div>


                            </div>
                            </form>

                            <!-- /.box -->
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h4 class="box-title"> REGISTROS</h4>
                                </div>
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table id="listar" class="table table-hover " style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Empresa</th>
                                                    <th>Usuario</th>
                                                    <th class="text-center">Operaciónes</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($ARRAYEAU as $r) : ?>
                                                    <tr class="center">
                                                        <td>
                                                            <a href="#" class="text-warning hover-warning">
                                                                <?php echo $r['ID_EAU']; ?>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $ARRAYEMPRESA2 = $EMPRESA_ADO->verEmpresa($r['ID_EMPRESA']);
                                                            echo $ARRAYEMPRESA2[0]['NOMBRE_EMPRESA'];
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $ARRAYUSUARIO2 = $USUARIO_ADO->verUsuario($r['ID_USUARIO']);
                                                            echo $ARRAYUSUARIO2[0]['NOMBRE_USUARIO'];
                                                            ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <form method="post" id="form1">
                                                                <div class="list-icons d-inline-flex">
                                                                    <div class="list-icons-item dropdown">
                                                                        <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown">
                                                                            <i class="glyphicon glyphicon-cog"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_EAU']; ?>" />
                                                                            <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroEau" />
                                                                            <button type="submit" class="btn btn-rounded btn-outline-info btn-sm " id="VERURL" name="VERURL">
                                                                                <i class="ti-eye"></i>
                                                                            </button>Ver
                                                                            <br>
                                                                            <button type="submit" class="btn btn-rounded btn-outline-warning btn-sm" id="EDITARURL" name="EDITARURL">
                                                                                <i class="ti-pencil-alt"></i>
                                                                            </button>Editar
                                                                            <br>
                                                                            <?php if ($r['ESTADO_REGISTRO'] == 1) { ?>
                                                                                <button type="submit" class="btn btn-rounded btn-outline-danger btn-sm" id="ELIMINARURL" name="ELIMINARURL">
                                                                                    <i class="ti-na "></i>
                                                                                </button>Deshabilitar
                                                                                <br>
                                                                            <?php } ?>
                                                                            <?php if ($r['ESTADO_REGISTRO'] == 0) { ?>
                                                                                <button type="submit" class="btn btn-rounded btn-outline-success btn-sm" id="HABILITARURL" name="HABILITARURL">
                                                                                    <i class="ti-check "></i>
                                                                                </button>Habilitar
                                                                                <br>
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

                    </div>
                    <!--.row -->

                </section>
                <!-- /.content -->

            </div>
        </div>
        <!-- /.content-wrapper -->



        <?php include_once "../config/footer.php"; ?>
        <?php include_once "../config/menuExtra.php"; ?>
    </div>
    <?php include_once "../config/urlBase.php"; ?>
</body>

</html>