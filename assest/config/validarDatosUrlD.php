<?php


$DOPURL = "";
$DOPURL = $_SERVER['QUERY_STRING'];
//echo $_SERVER['QUERY_STRING'].'AAAA';
//echo 'MIRA '.$DOPURL.' ESTE ES UN DATO IMPORTANTE';
if ($DOPURL == "") {
    //echo 'acce 2';
    $idd_dato = "";
    $acciond_dato = "";
    if ($idd_dato  == "" && $acciond_dato == "") {
        //echo 'aacce 2';
        if (isset($_GET["id"]) && isset($_GET["a"])) {
            //echo 'acce 3';
            echo "<script type='text/javascript'> location.href ='" . $_SESSION['urlO'] . ".php?op';</script>";
        }
    }
}

