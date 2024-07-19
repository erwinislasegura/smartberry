<?php
require_once '../../api/vendor/autoload.php';
$detect = new Mobile_Detect;

session_start();
if (isset($_SESSION["ID_USUARIO"]) && isset($_SESSION["NOMBRE_USUARIO"]) && isset($_SESSION["ID_EMPRESA"])  && isset($_SESSION["ID_TEMPORADA"])  ) {
    if($_SESSION["ID_EMPRESA"]!=""&& $_SESSION["ID_TEMPORADA"]!=""){
        header('Location: index.php');
    }
}

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../../assest/controlador/EMPRESA_ADO.php';
include_once '../../assest/controlador/TEMPORADA_ADO.php';
include_once "../../assest/controlador/AUSUARIO_ADO.php";

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$EMPRESA_ADO = new EMPRESA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();
$AUSUARIO_ADO =  NEW AUSUARIO_ADO;

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";

$MENSAJE = "";
$MENSAJE2 = "";



//INICIALIZAR ARREGLOS
$ARRAYEMPRESA = "";
$ARRAYPLANTA = "";
$ARRAYTEMPORADA = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES

$ARRAYEMPRESA = $EMPRESA_ADO->listarEmpresaCBX();
$ARRAYTEMPORADA = $TEMPORADA_ADO->listarTemporadaCBX();

if (isset($_SESSION["ID_EMPRESA"])) {
    $EMPRESA = $_SESSION["ID_EMPRESA"];
}
if (isset($_SESSION["ID_TEMPORADA"])) {
    $TEMPORADA = $_SESSION["ID_TEMPORADA"];   
} 


?>



<!DOCTYPE html>
<html lang="es">

<head>
    <title>INICIAR SESSION</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INICIAR SESSION</title>

        <link rel="icon" href="../../assest/img/favicon.png">

        <!--Estilo base-->
        <link rel="stylesheet" type="text/css" HREF="../../assest/css/reset.css" />
        <link rel="stylesheet" type="text/css" HREF="../../assest/css/style.css" />

        <!--Custom styles-->
        <link rel="stylesheet" href="../../assest/css/loginv2.css">
        <!--     bootstrap  -->        
        <link rel="stylesheet" href="../../api/bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" href="../../api/bootstrap/css/bootstrap.min.css" />  

        <!--JS -->
        <script src="../../assest/js/jquery.min.js"></script>    
        <!--sweetalert-->
        <script src="../../assest/js/sweetalert2@11.js"></script>
        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
                function validacion() {
                    var retorno = 1;
                    EMPRESA = document.getElementById("EMPRESA").selectedIndex;
                    TEMPORADA = document.getElementById("TEMPORADA").selectedIndex;

                    document.getElementById('val_select_empresa').innerHTML = "";
                    document.getElementById('val_select_temporada').innerHTML = "";                  

                    if (EMPRESA == null || EMPRESA == 0) {
                        document.form_reg_dato.EMPRESA.focus();
                        document.form_reg_dato.EMPRESA.style.borderColor = "#FF0000";
                        document.getElementById('val_select_empresa').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        retorno = 1;
                    }else{
                        retorno = 0;
                        document.form_reg_dato.EMPRESA.style.borderColor = "#4AF575";
                    }
                    if (TEMPORADA == null || TEMPORADA == 0) {
                        document.form_reg_dato.TEMPORADA.focus();
                        document.form_reg_dato.TEMPORADA.style.borderColor = "#FF0000";
                        document.getElementById('val_select_temporada').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        retorno = 1;
                    }else{
                        retorno = 0;
                        document.form_reg_dato.TEMPORADA.style.borderColor = "#4AF575";
                    }
                    if(retorno==1){
                        return false;
                    }

                }
            </script>

</head>

<body class="hold-transition sidebar-collapse sidebar-mini  login-page-exportadora"> 
    <div class="card border-0">
        <div class="card-header bg-info text-white text-center text-uppercase">
            <img src="../../assest/img/favicon.png" alt="" height="20px">Seleccion de parametros <strong id="title_section"></strong>
        </div>
        <div class="card-body login-card-body">
            <form class="form" role="form" method="post"  name="form_reg_dato" id="form_reg_dato">
                <div class="input-group mb-3" id="input">
                    <label id="label" for="EMPRESA">Selecionar Empresa</label>
                    <select class="form-control" id="EMPRESA" name="EMPRESA" style="width: 100%;">
                        <option></option>
                        <?php foreach ($ARRAYEMPRESA as $r) : ?>
                            <?php if ($ARRAYEMPRESA) {    ?>
                                <option value="<?php echo $r['ID_EMPRESA']; ?>" <?php if ($EMPRESA == $r['ID_EMPRESA']) { echo "selected"; } ?>> <?php echo $r['NOMBRE_EMPRESA'] ?> </option>
                            <?php } else { ?>
                                <option>No Hay Datos Registrados </option>
                            <?php } ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <label id="val_select_empresa" class="validacion"> <?php echo  $MENSAJE; ?></label>
                <div class="input-group mb-3" id="input">
                    <label id="label" for="TEMPORADA">Selecionar Temporada</label>
                    <select class="form-control" id="TEMPORADA" name="TEMPORADA" style="width: 100%;">
                        <option></option>
                        <?php foreach ($ARRAYTEMPORADA as $r) : ?>
                            <?php if ($ARRAYTEMPORADA) {    ?>
                                <option value="<?php echo $r['ID_TEMPORADA']; ?>" <?php if ($TEMPORADA == $r['ID_TEMPORADA']) { echo "selected"; } ?>> <?php echo $r['NOMBRE_TEMPORADA'] ?> </option>
                            <?php } else { ?>
                                <option>No Hay Datos Registrados </option>
                            <?php } ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <label id="val_select_temporada" class="validacion"> <?php echo  $MENSAJE; ?></label>
                <div class="row">
                    <div class="col-12">
                        <div class="btn-group-vertical col-12 d-flex">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" id="ENTRAR" name="ENTRAR" value="ENTRAR" onclick="return validacion()"> Ingresar </button>
                        </div>
                    </div>
                </div>
            </form>
            <form>
                <div class="row">
                    <div class="col-12">
                        <div class="btn-group-vertical col-12 d-flex">
                            <button type="submit" class="btn btn-danger btn-lg btn-block" id="SALIR" name="SALIR" value="SALIR"> Salir </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


</body>

</html>

         <!-- deteccion celular -->
         <?php if ($detect->isMobile() && $detect->isiOS() ): ?>
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'info',
                title: 'Celular iPhone detectado',
                html:"Hemos detectado que estas desde un iPhone 📱<br>De momento algunas vistas no estan adaptadas, por lo que sugerimos que te conectes desde un tablet Android / iPad o un computador",
                showConfirmButton:true,
                confirmButtonText:"Vale! 😉"
            })
        </script>
    <?php endif ?>

    <!-- deteccion Android -->
    <?php if ($detect->isMobile() && $detect->isAndroidOS()): ?>
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'info',
                title: 'Celular Android detectado',
                html:"Hemos detectado que estas desde un telefono Android 🤖<br>De momento algunas vistas no estan adaptadas, por lo que sugerimos que te conectes desde un tablet Android / iPad o un computador",
                showConfirmButton:true,
                confirmButtonText:"Vale! 😉"
            })
        </script>
    <?php endif ?>

<?php
        if (isset($_REQUEST['ENTRAR'])) {
            $_SESSION["ID_EMPRESA"] = $_REQUEST['EMPRESA'];
            $_SESSION["ID_TEMPORADA"] = $_REQUEST['TEMPORADA'];
            $AUSUARIO_ADO->agregarAusuario2('NULL',3,0,"".$_SESSION["NOMBRE_USUARIO"].", Inicio Sesion, Seleccion","usuario_usuario",$_SESSION["ID_USUARIO"],$_SESSION["ID_USUARIO"],$_REQUEST["EMPRESA"],'NULL',$_REQUEST['TEMPORADA'] );            
            echo "<script> location.href = 'index.php';</script>";
        }
        if (isset($_REQUEST['SALIR'])) {
             session_destroy();
             echo "<script> location.href = '../../';</script>";
        }
    ?>