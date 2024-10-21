<?php
require_once '../../api/vendor/autoload.php';
$detect = new Mobile_Detect;
// Any mobile device (phones or tablets).
session_start();
if (isset($_SESSION["NOMBRE_USUARIO"]) && isset($_SESSION["ID_TEMPORADA"])) {
    if($_SESSION["NOMBRE_USUARIO"]!=""&& $_SESSION["ID_TEMPORADA"]!=""){
        header('Location: index.php');
    }
}

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../../assest/controlador/USUARIO_ADO.php';
include_once '../../assest/controlador/TEMPORADA_ADO.php';
include_once '../../assest/controlador/PTUSUARIO_ADO.php';
include_once "../../assest/controlador/AUSUARIO_ADO.php";
//include_once '../controlador/EMPRESA_ADO.php';
//include_once '../controlador/PLANTA_ADO.php';
//include_once '../controlador/TEMPORADA_ADO.php';


include_once '../../assest/modelo/USUARIO.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$USUARIO_ADO = new USUARIO_ADO();
$TEMPORADA_ADO = new TEMPORADA_ADO();
$PTUSUARIO_ADO = new PTUSUARIO_ADO();
$AUSUARIO_ADO =  NEW AUSUARIO_ADO;

$USUARIO =  NEW USUARIO;

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$NOMBRE = "";
$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";


$CONTRASENA = "";
$MENSAJE = "";
$MENSAJE2 = "";
$PESTADISTICA="";

$NINTENTONUEVO="";
$NINTENTORESTANTE=0;

//INICIALIZAR ARREGLOS


$ARRAYINICIOSESSION = "";
$ARRAYINICIOSESSIONINTENTOS = "";
$ARRAYEMPRESA = "";
$ARRAYPLANTA = "";
$ARRAYTEMPORADA = "";
$ARRAYVERPTUSUARIO="";
//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES

$ARRAYTEMPORADA = $TEMPORADA_ADO->listarTemporadaCBX();
if($_POST){
    if (isset($_SESSION["ID_TEMPORADA"])) {
        $TEMPORADA = $_SESSION["ID_TEMPORADA"];   
    } 
}
?>



<!DOCTYPE html>
<html lang="es">
<!-- nuevo head -->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Fruticola Volcan</title>
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

    </head>
<!-- fin nuevo head -->

<!-- nuevo body   -->



    <body class="hold-transition sidebar-collapse sidebar-mini login-page">
        <div class="login-box">
            <div class="login-logo">
                <img src="../../assest/img/volcan-foods-logo-original.png" alt="" height="50px">
            </div>
            <div class="card border-0">
                <div class="card-header bg-info text-white text-center text-uppercase">
                    <img src="../../assest/img/favicon.png" alt="" height="20px">
                    Inicio de sesion <strong id="title_section"></strong>
                </div>
                <div class="card-body login-card-body">
                    <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="NOMBRE USUARIO" id="NOMBRE" name="NOMBRE" value="<?php echo $NOMBRE; ?>" autocomplete="on" required >
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="CONTRASE&Ntilde;A" id="CONTRASENA" name="CONTRASENA" value="<?php echo $CONTRASENA; ?>" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>  

                        <div class="input-group mb-3" id="input">
                            <label id="label" for="ESPECIE">Selecionar Especie</label>
                            <select class="form-control" id="ESPECIE" name="ESPECIE" style="width: 100%;">
                                <option value="0"> Seleccione una opción </option>
                                <option value="1"> Arandanos </option>
                                <option value="3"> Esparragos </option>
                            </select>
                        </div>
                                              
                        <div class="input-group mb-3" id="input">
                            <label id="label" for="TEMPORADA">Selecionar Temporada</label>
                            <select class="form-control" id="TEMPORADA" name="TEMPORADA" style="width: 100%;">
                                <option value="1" selected> 2024-2025 </option>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="btn-group col-12 d-flex">
                                    <a href="../../" class="btn btn-danger w-100"> VOLVER</a>
                                    <button type="submit" class="btn btn-success w-100" id="ENTRAR" name="ENTRAR" onclick="return validacion()">ENTRAR</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- entrar -->
    <?php
        if (isset($_REQUEST['ENTRAR'])) {
            if ($_REQUEST['NOMBRE']=="" || $_REQUEST['CONTRASENA'] == "") {
                echo '<script>
                    Swal.fire({
                        icon:"info",
                        title:"Alerta de inicio de sesion",
                        text:"El usuario o contraseña se encuentra vacio, por favor llena los datos minimos para iniciar sesion",
                        showConfirmButton:true,
                        confirmButtonText:"OK"
                    }).then((result)=>{
                        if(result.value){
                            location.href = "iniciarSession.php";
                        }
                    })
                </script>';
            } else {
                $NOMBRE = $_REQUEST['NOMBRE'];
                $CONTRASENA = $_REQUEST['CONTRASENA'];
                
                $ARRAYINICIOSESSION = $USUARIO_ADO->iniciarSession($NOMBRE, $CONTRASENA);
                if (empty($ARRAYINICIOSESSION) ||  sizeof($ARRAYINICIOSESSION) == 0) {
                    $ARRAYINICIOSESSIONINTENTOS=$USUARIO_ADO->iniciarSessionNIntentos($NOMBRE);
                    if($ARRAYINICIOSESSIONINTENTOS){
                        if($ARRAYINICIOSESSIONINTENTOS[0]["NINTENTO"] >= 3){                                      
                            $USUARIO->__SET('NOMBRE_USUARIO', $NOMBRE);
                            $USUARIO_ADO->deshabilitar2($USUARIO);        
                            
                            $AUSUARIO_ADO->agregarAusuario2('NULL',4,0, "".$_REQUEST['NOMBRE'].", Usuario bloquiado, se supero los numeros de intentos permitidos." , "usuario_usuario" , 'NULL' ,'NULL','NULL','NULL','NULL' );                                        

                            echo
                                '<script>
                                    Swal.fire({
                                        icon:"error",
                                        title:"Usuario bloquiado.",
                                        text:"Se supero los numeros de intentos permitidos, contactarse con el administrador."
                                    }).then((result)=>{
                                        if(result.value){
                                            location.href = "iniciarSession.php";
                                        }
                                    })
                                </script>';    

                        }else{
                            $NINTENTONUEVO = $ARRAYINICIOSESSIONINTENTOS[0]["NINTENTO"]+1;  
                            $NINTENTORESTANTE= 4 - $NINTENTONUEVO;
                                                              
                            $USUARIO->__SET('NINTENTO', $NINTENTONUEVO);
                            $USUARIO->__SET('NOMBRE_USUARIO', $NOMBRE);
                            $USUARIO_ADO->NintentoSuma($USUARIO);         
                            
                            $AUSUARIO_ADO->agregarAusuario2('NULL',4,0, "".$_REQUEST['NOMBRE'].", Los datos ingresados son erróneos, numero de intentos restante ".$NINTENTORESTANTE."." , "usuario_usuario" , 'NULL' ,'NULL','NULL','NULL','NULL' );                                        

                            echo
                                '<script>
                                    Swal.fire({
                                        icon:"warning",
                                        title:"Error de acceso",
                                        text:"Los datos ingresados erróneos, numero de intentos restante '.$NINTENTORESTANTE.'"
                                    }).then((result)=>{
                                        if(result.value){
                                            location.href = "iniciarSession.php";
                                        }
                                    })
                                </script>';   

                        }
                    }else{
                        $AUSUARIO_ADO->agregarAusuario2('NULL',4,0, "".$_REQUEST['NOMBRE'].", los datos ingresados no coinciden con el usuario." , "usuario_usuario" , 'NULL' ,'NULL','NULL','NULL','NULL' );                                        
                        echo
                        '<script>
                                Swal.fire({
                                    icon:"warning",
                                    title:"Error de acceso",
                                    text:"Los datos ingresados no coinciden con nuestros registros, reintente"
                                }).then((result)=>{
                                    if(result.value){
                                        location.href = "iniciarSession.php";
                                    }
                                })
                            </script>';          
                    }     
                } else {                    
                    $ARRAYVERPTUSUARIO  =$PTUSUARIO_ADO->listarPtusuarioPorTusuarioCBX($ARRAYINICIOSESSION[0]['ID_TUSUARIO']);
                    if($ARRAYVERPTUSUARIO){
                        $PESTADISTICA  =$ARRAYVERPTUSUARIO[0]['ESTADISTICA'];      
                        if($PESTADISTICA=="1"){
                            
                            $_SESSION["ID_USUARIO"] = $ARRAYINICIOSESSION[0]['ID_USUARIO'];
                            $_SESSION["NOMBRE_USUARIO"] = $ARRAYINICIOSESSION[0]['NOMBRE_USUARIO'];
                            $_SESSION["TIPO_USUARIO"] = $ARRAYINICIOSESSION[0]['ID_TUSUARIO'];
                            $_SESSION["ID_TEMPORADA"] = $_REQUEST['TEMPORADA'];  
                            $_SESSION["ID_ESPECIE"] = $_REQUEST['ESPECIE'];   
                            
                            $USUARIO->__SET('ID_USUARIO', $ARRAYINICIOSESSION[0]['ID_USUARIO']);
                            $USUARIO_ADO->NintentoZero($USUARIO);   
                            
                            $AUSUARIO_ADO->agregarAusuario2('NULL',4,0,"".$ARRAYINICIOSESSION[0]['NOMBRE_USUARIO'].", Inicio Sesion","usuario_usuario",$ARRAYINICIOSESSION[0]['ID_USUARIO'],$ARRAYINICIOSESSION[0]['ID_USUARIO'],'NULL','NULL',$_REQUEST['TEMPORADA'] );
                           
                            echo
                            '<script>
                                const Toast = Swal.mixin({
                                    position: "top-end",
                                    showConfirmButton: false,
                                    timer: 2000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener("mouseenter", Swal.stopTimer);
                                        toast.addEventListener("mouseleave", Swal.resumeTimer);
                                    }
                                });
        
                                Toast.fire({
                                    icon: "success",
                                    title: "Credenciales correctas",
                                    text:"cargando pagina principal"
                                }).then((result)=>{
                                        location.href = "index.php";
                                })
                            </script>';
                        } else{
                            
                            echo '<script>
                                Swal.fire({
                                    icon:"warning",
                                    title:"Error de acceso",
                                    text:"El Usuario no cuenta con los privilegios para acceder al modulo.",
                                    showConfirmButton: true,
                                    confirmButtonText:"Cerrar",
                                    closeOnConfirm:false
                                }).then((result)=>{
                                    location.href = "../../";                                    
                                })
                            </script>';
                        }

                    }else{      
                        echo '<script>
                            Swal.fire({
                                icon:"warning",
                                title:"Error de acceso",
                                text:"El Usuario no cuenta con los privilegios asociados.",
                                showConfirmButton: true,
                                confirmButtonText:"Cerrar",
                                closeOnConfirm:false
                            }).then((result)=>{
                                location.href = "../../";                                    
                            })
                        </script>';
                    }

                }
            }
        }
    ?>
    </body>
<!-- fin nuevo body -->
</html>