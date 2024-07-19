<?php
if (isset($_REQUEST['ABRIRURL'])) {
    $_SESSION["parametro"] = $_REQUEST['ID'];
    $_SESSION["NUMERO"] = $_REQUEST['NUMERO'];
    $_SESSION["TABLA"] = $_REQUEST['TABLA'];
    $_SESSION["COLUMNA"] = $_REQUEST['COLUMNA'];
    $_SESSION["TITULO"] = $_REQUEST['TITULO'];
    $_SESSION["urlO"] = $_REQUEST['URLO'];
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URL'] . ".php?op';</script>";
}

