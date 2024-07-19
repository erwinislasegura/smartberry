<?php 
if (isset($_REQUEST['VERURL'])) {    
    /*$_SESSION["parametro"] = $_REQUEST['ID'];   
    $_SESSION["parametro1"] = "ver";*/
    $id_dato = $_REQUEST['ID'];
    $accion_dato = "ver";
    echo "<script type='text/javascript'> location.href ='". $_REQUEST['URL'].".php?op&id=".$id_dato."&a=".$accion_dato."';</script>";
}
if (isset($_REQUEST['EDITARURL'])) {
    /*$_SESSION["parametro"] = $_REQUEST['ID'];   
    $_SESSION["parametro1"] = "editar";*/
    $id_dato = $_REQUEST['ID'];
    $accion_dato = "editar";
    echo "<script type='text/javascript'> location.href ='". $_REQUEST['URL'].".php?op&id=".$id_dato."&a=".$accion_dato."';</script>";
}
if (isset($_REQUEST['ELIMINARURL'])) {
    /*$_SESSION["parametro"] = $_REQUEST['ID'];   
    $_SESSION["parametro1"] = "0";*/
    $id_dato = $_REQUEST['ID'];
    $accion_dato = "0"; 
    echo "<script type='text/javascript'> location.href ='". $_REQUEST['URL'].".php?op&id=".$id_dato."&a=".$accion_dato."';</script>";
}
if (isset($_REQUEST['HABILITARURL'])) {
    /*$_SESSION["parametro"] = $_REQUEST['ID'];   
    $_SESSION["parametro1"] = "1";*/
    $id_dato = $_REQUEST['ID'];
    $accion_dato = "1";  
    echo "<script type='text/javascript'> location.href ='". $_REQUEST['URL'].".php?op&id=".$id_dato."&a=".$accion_dato."';</script>";
}




?>