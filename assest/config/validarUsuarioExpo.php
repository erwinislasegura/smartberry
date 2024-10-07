<?php
session_start();
$NOMBREUSUARIOS = "";
$IDUSUARIOS = "";
$TUSUARIOS = "";
$EMPRESAS = "";
$PLANTAS = "";
$TEMPORADAS = "";
$NOMBRESUSUARIOSLOGIN = "";

$ARRAYEMPRESAS = "";
$ARRAYPLANTAS = "";
$ARRAYTEMPORADAS = "";
$ARRAYTUSUARIO = "";
$ARRAYVERPTUSUARIO = "";
$ARRAYNOMBRESUSUARIOSLOGIN = "";
$ARRAYAVISOS="";

$EMPRESACAMBIAR = "";
$PLANTACAMBIAR = "";
$ARRAYEMPRESACAMBIAR = "";
$ARRAYPLANTACAMBIAR = "";
$DISABLEDMENU = "";

$TMONEDA1="";
$TMONEDA2="";
$TTMONEDA1="";
$TTMONEDA2="";



$PEXPORTADORA="";
$PEMATERIALES="";
$PEEXPORTACION="";
$PELIQUIDACION="";
$PEPAGO="";    
$PEFRUTA="";
$PEFCICARGA="";
$PEINFORMES="";
$PMANTENEDORES="";
$PMREGISTRO="";
$PMEDITAR="";
$PMVER="";
$PMAGRUPADO="";
$PADMINISTRADOR="";
$PADUSUARIO="";
$PADAPERTURA="";
$PADAVISO="";

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
        $PEXPORTADORA = $ARRAYVERPTUSUARIO[0]['EXPORTADORA'];
        if($PEXPORTADORA!="1"){
            session_destroy();
            echo "<script type='text/javascript'> location.href ='../../';</script>";
        }    
        $PEMATERIALES = $ARRAYVERPTUSUARIO[0]['EMATERIALES'];
        $PEEXPORTACION = $ARRAYVERPTUSUARIO[0]['EEXPORTACION'];
        $PELIQUIDACION = $ARRAYVERPTUSUARIO[0]['ELIQUIDACION'];
        $PEPAGO = $ARRAYVERPTUSUARIO[0]['EPAGO'];
        $PEFRUTA = $ARRAYVERPTUSUARIO[0]['EFRUTA'];
        $PEFCICARGA = $ARRAYVERPTUSUARIO[0]['EFCICARGA'];
        $PEINFORMES = $ARRAYVERPTUSUARIO[0]['EINFORMES'];

        $PMANTENEDORES = $ARRAYVERPTUSUARIO[0]['MANTENEDORES'];
        $PMREGISTRO = $ARRAYVERPTUSUARIO[0]['MREGISTRO'];
        $PMEDITAR = $ARRAYVERPTUSUARIO[0]['MEDITAR'];
        $PMVER = $ARRAYVERPTUSUARIO[0]['MVER'];
        $PMAGRUPADO = $ARRAYVERPTUSUARIO[0]['MAGRUPADO'];
        
        

        $PADMINISTRADOR = $ARRAYVERPTUSUARIO[0]['ADMINISTRADOR'];
        $PADUSUARIO = $ARRAYVERPTUSUARIO[0]['ADUSUARIO'];
        $PADAPERTURA = $ARRAYVERPTUSUARIO[0]['ADAPERTURA'];
        $PADAVISO = $ARRAYVERPTUSUARIO[0]['ADAVISO'];

        
    
    }else{       
        $PEXPORTADORA="";
        $PEMATERIALES="";
        $PEEXPORTACION="";
        $ELIQUIDACION="";    
        $PEPAGO="";    
        $PEFRUTA="";
        $PEFCICARGA="";    
        $PEINFORMES=""; 

        $PMANTENEDORES="";
        $PMREGISTRO="";
        $PMEDITAR="";
        $PMVER="";
        $PMAGRUPADO="";
        
        $PADMINISTRADOR="";
        $PADUSUARIO="";
        $PADAPERTURA="";
        $PADAVISO="";
    }
 
    if (isset($_SESSION["ID_EMPRESA"])) {
        $EMPRESAS = $_SESSION["ID_EMPRESA"];
        if($EMPRESAS==""){
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
    $AUSUARIO_ADO->agregarAusuario2('NULL',3,0,"".$_SESSION["NOMBRE_USUARIO"].", Cierre Sesion","usuario_usuario",$_SESSION["ID_USUARIO"],$_SESSION["ID_USUARIO"],'NULL','NULL',$_SESSION['ID_TEMPORADA'] );
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

