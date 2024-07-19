<?php


$ACTUALURL = "";
$OPURL = "";
$OPURL = $_SERVER['QUERY_STRING'];
$ACTUALURL = $_SERVER['PHP_SELF'];

//echo 'la url es :'.$OPURL;
if ($OPURL == "") {
    $id_dato = "";
    $accion_dato = "";
    $_SESSION["urlO"] = "";   
}

if ($OPURL != "") {
    //echo 'accedemos 1';
    if ($_GET["id"] == "" && $_GET["a"] == "") {
        //echo 'accedemos 2';
        echo "<script type='text/javascript'> location.href ='" . $ACTUALURL . "';</script>";
    }
}
