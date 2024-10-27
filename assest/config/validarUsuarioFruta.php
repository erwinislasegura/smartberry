<?php 
    error_reporting();
    session_start();
    $NOMBREUSUARIOS = "";
    $IDUSUARIOS="";
    $TUSUARIO = "";
    $EMPRESAS = "";
    $PLANTAS = "";
    $TEMPORADAS = "";
    $NOMBRESUSUARIOSLOGIN="";
    $ESTADO_FOLIOMANUAL = "";

    $ARRAYEMPRESAS = "";
    $ARRAYPLANTAS = "";
    $ARRAYTEMPORADAS = "";
    $ARRAYTUSUARIO = "";
    $ARRAYNOMBRESUSUARIOSLOGIN="";
    $ARRAYAVISOS="";
    

    $PFRUTA="";
    $PFAVISO="";
    $PFRABIERTO="";
    $PFGRANEL="";
    $PFGRECEPCION="";
    $PFGDESPACHO="";
    $PFGGUIA="";
    $PFPACKING="";
    $PFPPROCESO="";
    $PFPREEMBALEJE="";
    $PFSAG="";
    $PFSAGINSPECCION="";
    $PFFRIGORIFICO="";
    $PFFRECEPCION="";
    $PFFRDESPACHO="";
    $PFFRGUIA="";
    $PFFRREPALETIZAJE="";
    $PFFRPC="";
    $PFFRCFOLIO="";
    $PFCFRUTA="";
    $PFCFRECHAZO="";
    $PFCFLEVANTAMIENTO="";
    $PFEXISTENCIA="";
    
    $PMATERIALES="";
    $PMENVASE="";
    $PMERECEPCION="";
    $PMEDESPACHO="";
    $PMEGUIA="";
    $PMKARDEX="";
    $PMKENVASE="";

    $PEXPORTADORA="";
    $PEEXPORTACION="";
    
    $PADMINISTRADOR="";
    $PADAPERTURA="";

    $TMONEDA1="";
    $TMONEDA2="";
    $TTMONEDA1="";
    $TTMONEDA2="";

    $EMPRESACAMBIAR="";
    $PLANTACAMBIAR="";
    $ARRAYEMPRESACAMBIAR="";
    $ARRAYPLANTACAMBIAR="";
    $DISABLEDMENU="";

    
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
            $PFRUTA = $ARRAYVERPTUSUARIO[0]['FRUTA'];
            if($PFRUTA!="1"){
                session_destroy();
                echo "<script type='text/javascript'> location.href ='../../';</script>";
            }    
            $PFGRANEL = $ARRAYVERPTUSUARIO[0]['FGRANEL'];            
            $PFAVISO = $ARRAYVERPTUSUARIO[0]['FAVISO']; 
            $PFRABIERTO = $ARRAYVERPTUSUARIO[0]['FRABIERTO']; 

            $PFGRECEPCION = $ARRAYVERPTUSUARIO[0]['FGRECEPCION'];
            $PFGDESPACHO = $ARRAYVERPTUSUARIO[0]['FGDESPACHO'];
            $PFGGUIA = $ARRAYVERPTUSUARIO[0]['FGGUIA'];
            $PFPACKING = $ARRAYVERPTUSUARIO[0]['FPACKING'];
            $PFPPROCESO = $ARRAYVERPTUSUARIO[0]['FPPROCESO'];
            $PFPREEMBALEJE = $ARRAYVERPTUSUARIO[0]['FPREEMBALEJE'];
            $PFSAG = $ARRAYVERPTUSUARIO[0]['FSAG'];
            $PFSAGINSPECCION = $ARRAYVERPTUSUARIO[0]['FSAGINSPECCION'];

            $PFFRIGORIFICO = $ARRAYVERPTUSUARIO[0]['FFRIGORIFICO'];
            $PFFRECEPCION = $ARRAYVERPTUSUARIO[0]['FFRECEPCION'];
            $PFFRDESPACHO = $ARRAYVERPTUSUARIO[0]['FFRDESPACHO'];
            $PFFRGUIA = $ARRAYVERPTUSUARIO[0]['FFRGUIA'];
            $PFFRREPALETIZAJE = $ARRAYVERPTUSUARIO[0]['FFRREPALETIZAJE'];
            $PFFRPC = $ARRAYVERPTUSUARIO[0]['FFRPC'];
            $PFFRCFOLIO = $ARRAYVERPTUSUARIO[0]['FFRCFOLIO'];

            $PFCFRUTA = $ARRAYVERPTUSUARIO[0]['FCFRUTA'];
            $PFCFRECHAZO = $ARRAYVERPTUSUARIO[0]['FCFRECHAZO'];
            $PFCFLEVANTAMIENTO = $ARRAYVERPTUSUARIO[0]['FCFLEVANTAMIENTO'];
            $PFEXISTENCIA = $ARRAYVERPTUSUARIO[0]['FEXISTENCIA'];    

            $PMATERIALES = $ARRAYVERPTUSUARIO[0]['MATERIALES'];            
            $PMENVASE = $ARRAYVERPTUSUARIO[0]['MENVASE'];
            $PMERECEPCION = $ARRAYVERPTUSUARIO[0]['MERECEPCION'];
            $PMEDESPACHO = $ARRAYVERPTUSUARIO[0]['MEDESPACHO'];
            $PMEGUIA = $ARRAYVERPTUSUARIO[0]['MEGUIA'];
            $PMKARDEX = $ARRAYVERPTUSUARIO[0]['MKARDEX'];
            $PMKENVASE = $ARRAYVERPTUSUARIO[0]['MKENVASE'];    

            $PEXPORTADORA = $ARRAYVERPTUSUARIO[0]['EXPORTADORA'];
            $PEEXPORTACION = $ARRAYVERPTUSUARIO[0]['EEXPORTACION'];
            
            $PADMINISTRADOR= $ARRAYVERPTUSUARIO[0]['ADMINISTRADOR'];
            $PADAPERTURA= $ARRAYVERPTUSUARIO[0]['ADAPERTURA'];

        }else{       
            $PFRUTA="";
            $PFAVISO="";
            $PFRABIERTO="";

            $PFGRANEL="";
            $PFGRECEPCION="";
            $PFGDESPACHO="";
            $PFGGUIA="";

            $PFPACKING="";
            $PFPPROCESO="";
            $PFPREEMBALEJE="";

            $PFSAG="";
            $PFSAGINSPECCION="";

            $PFFRIGORIFICO="";
            $PFFRECEPCION="";
            $PFFRDESPACHO="";
            $PFFRGUIA="";
            $PFFRREPALETIZAJE="";
            $PFFRPC="";
            $PFFRCFOLIO="";

            $PFCFRUTA="";
            $PFCFRECHAZO="";
            $PFCFLEVANTAMIENTO="";
            
            $PFEXISTENCIA="";
            
            $PMATERIALES="";
            $PMENVASE="";
            $PMERECEPCION="";
            $PMEDESPACHO="";
            $PMEGUIA="";
            $PMKARDEX="";
            $PMKENVASE="";
        
            $PEXPORTADORA="";
            $PEEXPORTACION="";
            
            $PADMINISTRADOR="";
            $PADAPERTURA="";
            
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

    } else {
        session_destroy();
        header('Location: iniciarSession.php');
    }
    if (isset($_REQUEST['CERRARS'])) {
        session_destroy();
        $AUSUARIO_ADO->agregarAusuario2('NULL',1,0,"".$_SESSION["NOMBRE_USUARIO"].", Cierre Sesion","usuario_usuario",$_SESSION["ID_USUARIO"],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],$_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );
        header('Location: iniciarSession.php');
    }    
    if (isset($_REQUEST['CAMBIARE'])) {
        $_SESSION["ID_EMPRESA"] = $_REQUEST['EMPRESACAMBIAR'];
        echo "<script type='text/javascript'> 
                var url= window.location;
                location.href = url ;
              </script>"
        ;   
    }    
    if (isset($_REQUEST['CAMBIARP'])) {
        $_SESSION["ID_PLANTA"] = $_REQUEST['PLANTACAMBIAR'];
        echo "<script type='text/javascript'> 
                var url= window.location;
                location.href = url ;
              </script>"
        ;   
    }

    $ARRAYEMPRESAS  =$EMPRESA_ADO->verEmpresa($_SESSION["ID_EMPRESA"]);
        if($ARRAYEMPRESAS){  
            $ESTADO_FOLIOMANUAL = $ARRAYEMPRESAS[0]['FOLIO_MANUAL']; 
            $ESTADO_USO_CALIBRE = $ARRAYEMPRESAS[0]['USO_CALIBRE'];  
        } 
