<?php
$VALORUF = "";
$VALORDOLARO = "";
$VALORDOLARA = "";
$VALOREURO = "";
$VALORIPC = "";
$VALORUTM = "";
$VALORIVP = "";
$VALORIMACEC = "";
$apiUrl = 'https://mindicador.cl/api';
//es neces:ario tener habilitada la directiva allow_url_fopen para usar file_get_contents
if (ini_get('allow_url_fopen')) {
    $json = file_get_contents($apiUrl);
} else {
    //De otra forma utilizamos cURL
    $curl = curl_init($apiUrl);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $json = curl_exec($curl);
    curl_close($curl);
}

$dailyIndicators = json_decode($json);
//   $VALORUF = 'El valor actual de la UF es: <br>:$' . $dailyIndicators->uf->valor;
$VALORDOLARO = '$' . $dailyIndicators->dolar->valor;
//   $VALORDOLARO = 'El valor actual del Dólar observado es: <br>$' . $dailyIndicators->dolar->valor;
//  $VALORDOLARA = 'El valor actual del Dólar acuerdo es: <br>$' . $dailyIndicators->dolar_intercambio->valor;
//$VALOREURO = 'El valor actual del Euro es: <br>$' . $dailyIndicators->euro->valor;
$VALOREURO = '$' . $dailyIndicators->euro->valor;
//   $VALORIPC = 'El valor actual del IPC es: <br>' . $dailyIndicators->ipc->valor;
////   $VALORUTM = 'El valor actual de la UTM es: <br>$' . $dailyIndicators->utm->valor;
//  $VALORIVP = 'El valor actual del IVP es: <br>$' . $dailyIndicators->ivp->valor;
//  $VALORIMACEC = 'El valor actual del Imacec es: <br>' . $dailyIndicators->imacec->valor;

$_SESSION["TMONEDA1"] = $VALORDOLARO;
$_SESSION["TMONEDA2"] = $VALOREURO;

$_SESSION["TTMONEDA1"] = "Dolar";
$_SESSION["TTMONEDA2"] = "Euro";


