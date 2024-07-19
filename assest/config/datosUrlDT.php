<?php
//crear url

if (isset($_REQUEST['CREARDURL'])) {
    /*$_SESSION["parametro"] = $_REQUEST['IDP'];
    $_SESSION["parametro1"] = $_REQUEST['OPP'];*/

    //echo "<script type='text/javascript'>alert('CREARDURL DETALLE');</script>";
    $id_dato = $_REQUEST['IDP'];
    $accion_dato = $_REQUEST['OPP'];
    $urlo_dato = $_REQUEST['URLP'];
    $idd_dato  = $_REQUEST['IDD'];
    $acciond_dato = $_REQUEST['OPD'];
    $urlod_dato = $_REQUEST['URLD'];
    $iddt_dato = "";
    $acciondt_dato = "";

    
    //$_SESSION["urlO"] = $_REQUEST['URLO'];
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLT'] . ".php?op&id=".$id_dato."&a=".$accion_dato."&idd=".$idd_dato."&ad=".$acciond_dato."&urlo=".$urlo_dato."&iddt=".$iddt_dato."&adt=".$acciondt_dato."&urlod=".$urlod_dato."';</script>";
}
if (isset($_REQUEST['VERDURL'])) {
    //echo "<script type='text/javascript'>alert('VERDURL DETALLE');</script>";
    /*$_SESSION["parametro"] = $_REQUEST['IDP'];
    $_SESSION["parametro1"] = $_REQUEST['OPP'];*/
    $id_dato = $_REQUEST['IDP'];
    $accion_dato = $_REQUEST['OPP'];
    $urlo_dato = $_REQUEST['URLP'];
    $idd_dato= $_REQUEST['IDD'];
    $urlod_dato = $_REQUEST['URLD'];
    $iddt_dato = $_REQUEST['IDT'];
    $acciondt_dato = "ver";
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLT'] . ".php?op&id=".$id_dato."&a=".$accion_dato."&idd=".$idd_dato."&ad=".$acciond_dato."&urlo=".$urlo_dato."&iddt=".$iddt_dato."&adt=".$acciondt_dato."&urlod=".$urlod_dato."';</script>";
}
if (isset($_REQUEST['EDITARDURL'])) {

    //echo "<script type='text/javascript'>alert('EDITARDURL DETALLE');</script>";
    /*$_SESSION["parametro"] = $_REQUEST['IDP'];
    $_SESSION["parametro1"] = $_REQUEST['OPP'];*/
    $id_dato = $_REQUEST['IDP'];
    $accion_dato = $_REQUEST['OPP'];
    $urlo_dato = $_REQUEST['URLP'];
    $idd_dato = $_REQUEST['IDD'];
    $acciond_dato = $_REQUEST['OPD'];
    $urlod_dato = $_REQUEST['URLD'];
    $iddt_dato = $_REQUEST['IDT'];
    $acciondt_dato  = "editar";
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLT'] . ".php?op&id=".$id_dato."&a=".$accion_dato."&idd=".$idd_dato."&ad=".$acciond_dato."&urlo=".$urlo_dato."&iddt=".$iddt_dato."&adt=".$acciondt_dato."&urlod=".$urlod_dato."';</script>";
}
if (isset($_REQUEST['DUPLICARDURL'])) {

    //echo "<script type='text/javascript'>alert('DUPLICARDURL DETALLE');</script>";
    /*$_SESSION["parametro"] = $_REQUEST['IDP'];
    $_SESSION["parametro1"] = $_REQUEST['OPP'];*/
    $id_dato = $_REQUEST['IDP'];
    $accion_dato = $_REQUEST['OPP'];
    $urlo_dato = $_REQUEST['URLP'];
    $idd_dato= $_REQUEST['IDD'];
    $acciond_dato = $_REQUEST['OPD'];
    $urlod_dato = $_REQUEST['URLD'];
    $iddt_dato = $_REQUEST['IDT'];
    $acciondt_dato  = "crear";
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLT'] . ".php?op&id=".$id_dato."&a=".$accion_dato."&idd=".$idd_dato."&ad=".$acciond_dato."&urlo=".$urlo_dato."&iddt=".$iddt_dato."&adt=".$acciondt_dato."&urlod=".$urlod_dato."';</script>";
}
if (isset($_REQUEST['ELIMINARDURL'])) {

    //echo "<script type='text/javascript'>alert('ELIMINARDURL DETALLE');</script>";
    /*$_SESSION["parametro"] = $_REQUEST['IDP'];
    $_SESSION["parametro1"] = $_REQUEST['OPP'];*/
    $id_dato = $_REQUEST['IDP'];
    $accion_dato = $_REQUEST['OPP'];
    $urlo_dato = $_REQUEST['URLP'];
    $idd_dato= $_REQUEST['IDD'];
    $acciond_dato = $_REQUEST['OPD'];
    $urlod_dato = $_REQUEST['URLD'];
    $iddt_dato = $_REQUEST['IDT'];
    $acciondt_dato  = "eliminar";
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLT'] . ".php?op&id=".$id_dato."&a=".$accion_dato."&idd=".$idd_dato."&ad=".$acciond_dato."&urlo=".$urlo_dato."&iddt=".$iddt_dato."&adt=".$acciondt_dato."&urlod=".$urlod_dato."';</script>";
}
