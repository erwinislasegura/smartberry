<?php

if (isset($_REQUEST['SELECIONOCDURL'])) {
    /*$_SESSION["parametro"] = $_REQUEST['IDP'];
    $_SESSION["parametro1"] = $_REQUEST['OPP'];*/
    //echo "<script type='text/javascript'>alert('SELECIONOCDURL');</script>";
    $id_dato = $_REQUEST['IDP'];
    $accion_dato = $_REQUEST['OPP'];
    $urlo_dato = $_REQUEST['URLP'];
    $idd_dato  = "";
    $acciond_dato = "";
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLD'] . ".php?op&id=".$id_dato."&a=".$accion_dato."&idd=".$idd_dato."&ad=".$acciond_dato."&urlo=".$urlo_dato."';</script>";
}

if (isset($_REQUEST['CREARDURL'])) {
    /*$_SESSION["parametro"] = $_REQUEST['IDP'];
    $_SESSION["parametro1"] = $_REQUEST['OPP'];*/
    //echo "<script type='text/javascript'>alert('CREARDURL');</script>";
    $id_dato = $_REQUEST['IDP'];
    $accion_dato = $_REQUEST['OPP'];
    $urlo_dato = $_REQUEST['URLP'];
    $idd_dato = "";
    $acciond_dato = "";
    //redireccionamos a la url de destino con las variables que necesitamos
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLD'] . ".php?op&id=".$id_dato."&a=".$accion_dato."&idd=".$idd_dato."&ad=".$acciond_dato."&urlo=".$urlo_dato."';</script>";
}
if (isset($_REQUEST['VERDURL'])) {
    /*$_SESSION["parametro"] = $_REQUEST['IDP'];
    $_SESSION["parametro1"] = $_REQUEST['OPP'];*/
    //echo "<script type='text/javascript'>alert('VERDURL');</script>";
    $id_dato = $_REQUEST['IDP'];
    $accion_dato = $_REQUEST['OPP'];
    $urlo_dato = $_REQUEST['URLP'];
    $idd_dato  = $_REQUEST['IDD'];
    $acciond_dato = "ver";
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLD'] . ".php?op&id=".$id_dato."&a=".$accion_dato."&idd=".$idd_dato."&ad=".$acciond_dato."&urlo=".$urlo_dato."';</script>";
}
if (isset($_REQUEST['EDITARDURL'])) {
    /*$_SESSION["parametro"] = $_REQUEST['IDP'];
    $_SESSION["parametro1"] = $_REQUEST['OPP'];*/
    //echo "<script type='text/javascript'>alert('EDITARDURL');</script>";
    $id_dato = $_REQUEST['IDP'];
    $accion_dato = $_REQUEST['OPP'];
    $urlo_dato = $_REQUEST['URLP'];
    $idd_dato  = $_REQUEST['IDD'];
    $acciond_dato = "editar";
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLD'] . ".php?op&id=".$id_dato."&a=".$accion_dato."&idd=".$idd_dato."&ad=".$acciond_dato."&urlo=".$urlo_dato."';</script>";
}
if (isset($_REQUEST['DUPLICARDURL'])) {
    /*$_SESSION["parametro"] = $_REQUEST['IDP'];
    $_SESSION["parametro1"] = $_REQUEST['OPP'];*/
    //echo "<script type='text/javascript'>alert('DUPLICARDURL');</script>";
    $id_dato = $_REQUEST['IDP'];
    $accion_dato = $_REQUEST['OPP'];
    $urlo_dato = $_REQUEST['URLP'];
    $idd_dato = $_REQUEST['IDD'];
    $acciond_dato = "crear";
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLD'] . ".php?op&id=".$id_dato."&a=".$accion_dato."&idd=".$idd_dato."&ad=".$acciond_dato."&urlo=".$urlo_dato."';</script>";
}
if (isset($_REQUEST['ELIMINARDURL'])) {
    /*$_SESSION["parametro"] = $_REQUEST['IDP'];
    $_SESSION["parametro1"] = $_REQUEST['OPP'];*/
    //echo "<script type='text/javascript'>alert('ELIMINARDURL');</script>";
    $id_dato = $_REQUEST['IDP'];
    $accion_dato = $_REQUEST['OPP'];
    $urlo_dato = $_REQUEST['URLP'];
    $idd_dato = $_REQUEST['IDD'];
    $acciond_dato = "eliminar";
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLD'] . ".php?op&id=".$id_dato."&a=".$accion_dato."&idd=".$idd_dato."&ad=".$acciond_dato."&urlo=".$urlo_dato."';</script>";
}


