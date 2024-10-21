<?php 
    session_start();
    $NOMBREUSUARIOS = "";
    $IDUSUARIOS="";
    $TUSUARIO = "";
    $EMPRESAS = "";
    $PLANTAS = "";
    $TEMPORADAS = "";
    $NOMBRESUSUARIOSLOGIN="";

    $ARRAYEMPRESAS = "";
    $ARRAYPLANTAS = "";
    $ARRAYTEMPORADAS = "";
    $ARRAYTUSUARIO = "";
    $ARRAYNOMBRESUSUARIOSLOGIN="";
    
    $EMPRESACAMBIAR="";
    $PLANTACAMBIAR="";
    $ARRAYEMPRESACAMBIAR="";
    $ARRAYPLANTACAMBIAR="";
    $DISABLEDMENU="";

    $TMONEDA1="";
    $TMONEDA2="";
    $TTMONEDA1="";
    $TTMONEDA2="";

    
    $PESTADISTICA="";
    $PESTADISTICATODO="";
    $PESTARVSP="";
    $PESTASTOPMP="";
    $PESTAINFORME="";
    $PESTAEXISTENCIA="";
    $PESTAPRODUCTOR="";
    
    include_once '../../assest/controlador/USUARIO_ADO.php';
    include_once '../../assest/controlador/TUSUARIO_ADO.php';
    include_once '../../assest/controlador/PTUSUARIO_ADO.php';
    include_once "../../assest/controlador/AUSUARIO_ADO.php";

    include_once '../../assest/controlador/EMPRESA_ADO.php';
    include_once '../../assest/controlador/PLANTA_ADO.php';
    include_once '../../assest/controlador/TEMPORADA_ADO.php';


    $USUARIO_ADO = new USUARIO_ADO();
    $TUSUARIO_ADO = new TUSUARIO_ADO();
    $PTUSUARIO_ADO = new PTUSUARIO_ADO();
    $AUSUARIO_ADO = new AUSUARIO_ADO();

    $EMPRESA_ADO =  new EMPRESA_ADO();
    $PLANTA_ADO =  new PLANTA_ADO();
    $TEMPORADA_ADO =  new TEMPORADA_ADO();



    
    if (isset($_SESSION["NOMBRE_USUARIO"])) {
        $IDUSUARIOS = $_SESSION["ID_USUARIO"];
        $NOMBREUSUARIOS = $_SESSION["NOMBRE_USUARIO"];
        $TUSUARIOS = $_SESSION["TIPO_USUARIO"];        
        $ARRAYVERPTUSUARIO  =$PTUSUARIO_ADO->listarPtusuarioPorTusuarioCBX($TUSUARIOS);
        if($ARRAYVERPTUSUARIO){            
            $PESTADISTICA  =$ARRAYVERPTUSUARIO[0]['ESTADISTICA'];      
            if($PESTADISTICA!="1"){
                 session_destroy();
                 echo "<script type='text/javascript'> location.href ='../../';</script>";
            }    
            $PESTARVSP = $ARRAYVERPTUSUARIO[0]['ESTARVSP'];
            $PESTASTOPMP = $ARRAYVERPTUSUARIO[0]['ESTASTOPMP'];
            $PESTAINFORME = $ARRAYVERPTUSUARIO[0]['ESTAINFORME'];
            $PESTAEXISTENCIA = $ARRAYVERPTUSUARIO[0]['ESTAEXISTENCIA'];
            $PESTAPRODUCTOR = $ARRAYVERPTUSUARIO[0]['ESTAPRODUCTOR'];
        }else{              
            $PESTADISTICA="";
            $PESTADISTICATODO="";
            $PESTARVSP="";
            $PESTASTOPMP="";
            $PESTAINFORME="";
            $PESTAEXISTENCIA="";
            $PESTAPRODUCTOR="";   
        }
        
        if (isset($_SESSION["ID_TEMPORADA"])) {
            $TEMPORADAS  = $_SESSION["ID_TEMPORADA"];  
            $ESPECIE  = $_SESSION["ID_ESPECIE"];   
            if($TEMPORADAS==""){
                echo "<script type='text/javascript'> location.href ='iniciarSessionSeleccion.php';</script>";
            }
        }  else {
            echo "<script type='text/javascript'> location.href ='iniciarSession.php';</script>";
        }      

    } else {
        session_destroy();
        header('Location: iniciarSession.php');
    }
    if (isset($_REQUEST['CERRARS'])) {
        $AUSUARIO_ADO->agregarAusuario2('NULL',4,0,"".$_SESSION["NOMBRE_USUARIO"].", Cierre Sesion","usuario_usuario",$_SESSION["ID_USUARIO"],$_SESSION["ID_USUARIO"],'NULL','NULL',$_SESSION['ID_TEMPORADA'] );
        session_destroy();
        header('Location: iniciarSession.php');
    } 

