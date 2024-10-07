<?php
session_start();
$NOMBREUSUARIOS = "";
$IDUSUARIOS = "";
$TUSUARIO = "";
$EMPRESAS = "";
$PLANTAS = "";
$TEMPORADAS = "";
$NOMBRESUSUARIOSLOGIN = "";

$ARRAYEMPRESAS = "";
$ARRAYPLANTAS = "";
$ARRAYTEMPORADAS = "";
$ARRAYTUSUARIO = "";
$ARRAYNOMBRESUSUARIOSLOGIN = "";
$ARRAYAVISOS="";


$PMATERIALES="";
$PMRABIERTO="";
$PMMATERIALES="";
$PMMRECEPION="";
$PMMDEAPCHO="";
$PMMGUIA="";
$PMENVASE="";
$PMERECEPCION="";
$PMEDESPACHO="";
$PMEGUIA="";
$PMADMINISTRACION="";
$PMAOC="";
$PMAOCAR="";
$PMKARDEX="";
$PMKMATERIAL="";
$PMKENVASE="";
$PMANTENEDORES="";
$PMREGISTRO="";
$PMEDITAR="";
$PMVER="";
$PMAGRUPADO="";


$PADMINISTRADOR="";
$PADAPERTURA="";

$EMPRESACAMBIAR = "";
$PLANTACAMBIAR = "";
$ARRAYEMPRESACAMBIAR = "";
$ARRAYPLANTACAMBIAR = "";
$DISABLEDMENU = "";
$TMONEDA1="";
$TMONEDA2="";
$TTMONEDA1="";
$TTMONEDA2="";


include_once '../../assest/controlador/USUARIO_ADO.php';
include_once '../../assest/controlador/TUSUARIO_ADO.php';
include_once '../../assest/controlador/PTUSUARIO_ADO.php';
include_once "../../assest/controlador/AUSUARIO_ADO.php";
include_once '../../assest/controlador/AVISO_ADO.php';

include_once '../../assest/controlador/EMPRESA_ADO.php';
include_once '../../assest/controlador/PLANTA_ADO.php';
include_once '../../assest/controlador/TEMPORADA_ADO.php';


$USUARIO_ADO = new USUARIO_ADO();
$TUSUARIO_ADO = new TUSUARIO_ADO();
$PTUSUARIO_ADO = new PTUSUARIO_ADO();
$AUSUARIO_ADO = new AUSUARIO_ADO();
$AVISO_ADO = new AVISO_ADO();

$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();




if (isset($_SESSION["NOMBRE_USUARIO"])) {
    $IDUSUARIOS = $_SESSION["ID_USUARIO"];
    $NOMBREUSUARIOS = $_SESSION["NOMBRE_USUARIO"];
    $TUSUARIOS = $_SESSION["TIPO_USUARIO"];
    
    $ARRAYVERPTUSUARIO  =$PTUSUARIO_ADO->listarPtusuarioPorTusuarioCBX($TUSUARIOS);
    if($ARRAYVERPTUSUARIO){            
        $PMATERIALES  =$ARRAYVERPTUSUARIO[0]['MATERIALES']; 
        if($PMATERIALES!="1"){
             session_destroy();
             echo "<script type='text/javascript'> location.href ='../../';</script>";
        }    
        $PMMATERIALES= $ARRAYVERPTUSUARIO[0]['MMATERIALES'];
        $PMRABIERTO= $ARRAYVERPTUSUARIO[0]['MRABIERTO'];

        $PMMRECEPION= $ARRAYVERPTUSUARIO[0]['MMRECEPION'];
        $PMMDEAPCHO= $ARRAYVERPTUSUARIO[0]['MMDEAPCHO'];
        $PMMGUIA= $ARRAYVERPTUSUARIO[0]['MMGUIA'];

        $PMENVASE= $ARRAYVERPTUSUARIO[0]['MENVASE'];
        $PMERECEPCION= $ARRAYVERPTUSUARIO[0]['MERECEPCION'];
        $PMEDESPACHO= $ARRAYVERPTUSUARIO[0]['MEDESPACHO'];
        $PMEGUIA= $ARRAYVERPTUSUARIO[0]['MEGUIA'];

        $PMADMINISTRACION= $ARRAYVERPTUSUARIO[0]['MADMINISTRACION'];
        $PMAOC= $ARRAYVERPTUSUARIO[0]['MAOC'];
        $PMAOCAR= $ARRAYVERPTUSUARIO[0]['MAOCAR'];

        $PMKARDEX= $ARRAYVERPTUSUARIO[0]['MKARDEX'];
        $PMKMATERIAL= $ARRAYVERPTUSUARIO[0]['MKMATERIAL'];
        $PMKENVASE= $ARRAYVERPTUSUARIO[0]['MKENVASE'];
        
        $PADMINISTRADOR= $ARRAYVERPTUSUARIO[0]['ADMINISTRADOR'];
        $PADAPERTURA= $ARRAYVERPTUSUARIO[0]['ADAPERTURA'];
        
        $PMANTENEDORES= $ARRAYVERPTUSUARIO[0]['MANTENEDORES'];
        $PMREGISTRO= $ARRAYVERPTUSUARIO[0]['MREGISTRO'];
        $PMEDITAR= $ARRAYVERPTUSUARIO[0]['MEDITAR'];
        $PMVER= $ARRAYVERPTUSUARIO[0]['MVER'];
        $PMAGRUPADO= $ARRAYVERPTUSUARIO[0]['MAGRUPADO'];

    }else{              
        $PMATERIALES="";
        $PMRABIERTO="";
        $PMMATERIALES="";
        $PMMRECEPION="";
        $PMMDEAPCHO="";
        $PMMGUIA="";
        $PMENVASE="";
        $PMERECEPCION="";
        $PMEDESPACHO="";
        $PMEGUIA="";
        $PMADMINISTRACION="";
        $PMAOC="";
        $PMAOCAR="";
        $PMKARDEX="";
        $PMKMATERIAL="";
        $PMKENVASE="";
        $PADMINISTRADOR="";
        $PADAPERTURA="";
        $PMANTENEDORES="";
        $PMREGISTRO="";
        $PMEDITAR="";
        $PMVER="";
        $PMAGRUPADO="";
    }

    
    if (isset($_SESSION["ID_EMPRESA"])) {
        $EMPRESAS = $_SESSION["ID_EMPRESA"];
        if($EMPRESAS==""){
            echo "<script type='text/javascript'> location.href ='iniciarSessionSeleccion.php';</script>";
        }
    }else {
        echo "<script type='text/javascript'> location.href ='iniciarSessionSeleccion.php';</script>";
    }
    if (isset($_SESSION["ID_PLANTA"])) {
        $PLANTAS = $_SESSION["ID_PLANTA"];
        if($PLANTAS==""){
            echo "<script type='text/javascript'> location.href ='iniciarSessionSeleccion.php';</script>";
        }
    }else {
        echo "<script type='text/javascript'> location.href ='iniciarSessionSeleccion.php';</script>";
    }
    if (isset($_SESSION["ID_TEMPORADA"])) {
        $TEMPORADAS  = $_SESSION["ID_TEMPORADA"];   
        if($TEMPORADAS==""){
            echo "<script type='text/javascript'> location.href ='iniciarSessionSeleccion.php';</script>";
        }
    } else {
        echo "<script type='text/javascript'> location.href ='iniciarSessionSeleccion.php';</script>";
    }

    if (isset($_SESSION["TMONEDA1"]) && isset($_SESSION["TMONEDA2"])) {
        $TMONEDA1 = $_SESSION["TMONEDA1"];
        $TMONEDA2 = $_SESSION["TMONEDA2"];      
        $TTMONEDA1 = $_SESSION["TTMONEDA1"];
        $TTMONEDA2 = $_SESSION["TTMONEDA2"];    
    } else {        
        include_once "../../assest/config/indicadorEconomico.php";
        $TMONEDA1 = $_SESSION["TMONEDA1"];
        $TMONEDA2 = $_SESSION["TMONEDA2"];   
        $TTMONEDA1 = $_SESSION["TTMONEDA1"];
        $TTMONEDA2 = $_SESSION["TTMONEDA2"];        
    }
    
} else {
    session_destroy();
    header('Location: iniciarSession.php');
}
if (isset($_REQUEST['CERRARS'])) {
    $AUSUARIO_ADO->agregarAusuario2('NULL',2,0,"".$_SESSION["NOMBRE_USUARIO"].", Cierre Sesion","usuario_usuario",$_SESSION["ID_USUARIO"],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],$_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );
    session_destroy();
    header('Location: iniciarSession.php');
}
if (isset($_REQUEST['CAMBIARE'])) {
    $_SESSION["ID_EMPRESA"] = $_REQUEST['EMPRESACAMBIAR'];
    echo "<script type='text/javascript'> 
                var url= window.location;
                location.href = url ;
              </script>";
}
if (isset($_REQUEST['CAMBIARP'])) {
    $_SESSION["ID_PLANTA"] = $_REQUEST['PLANTACAMBIAR'];
    echo "<script type='text/javascript'> 
                var url= window.location;
                location.href = url ;
              </script>";
}
