<?php


$DTOPURL = "";
$DTOPURL = $_SERVER['QUERY_STRING'];

if ($DTOPURL == "") {
    $_SESSION["dtparametro"] = "";
    $_SESSION["dtparametro1"] = "";
    if (isset($_SESSION["dparametro"]) && isset($_SESSION["dparametro1"]) && isset($_SESSION["durlO"])) {
        echo "<script type='text/javascript'> location.href ='" . $_SESSION['durlO'] . ".php?op';</script>";
    }
}

