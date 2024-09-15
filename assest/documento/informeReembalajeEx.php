<?php

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES 
include_once '../../assest/controlador/TUSUARIO_ADO.php';
include_once '../../assest/controlador/USUARIO_ADO.php';
include_once '../../assest/controlador/EMPRESA_ADO.php';
include_once '../../assest/controlador/PLANTA_ADO.php';
include_once '../../assest/controlador/TEMPORADA_ADO.php';

include_once '../../assest/controlador/TREEMBALAJE_ADO.php';
include_once '../../assest/controlador/DREXPORTACION_ADO.php';
include_once '../../assest/controlador/DRINDUSTRIAL_ADO.php';
include_once '../../assest/controlador/REEMBALAJE_ADO.php';

include_once '../../assest/controlador/VESPECIES_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/EXIEXPORTACION_ADO.php';
include_once '../../assest/controlador/EEXPORTACION_ADO.php';
include_once '../../assest/controlador/ERECEPCION_ADO.php';
include_once '../../assest/controlador/EINDUSTRIAL_ADO.php';
include_once '../../assest/controlador/TMANEJO_ADO.php';
include_once '../../assest/controlador/TCALIBRE_ADO.php';
include_once '../../assest/controlador/TCATEGORIA_ADO.php';
include_once '../../assest/controlador/TCALIBREIND_ADO.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$TUSUARIO_ADO = new TUSUARIO_ADO();
$USUARIO_ADO = new USUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();

$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$EXIEXPORTACION_ADO =  new EXIEXPORTACION_ADO();
$TREEMBALAJE_ADO =  new TREEMBALAJE_ADO();
$EEXPORTACION_ADO =  new EEXPORTACION_ADO();
$ERECEPCION_ADO =  new ERECEPCION_ADO();
$EINDUSTRIAL_ADO =  new EINDUSTRIAL_ADO();
$TMANEJO_ADO =  new TMANEJO_ADO();
$TCALIBRE_ADO =  new TCALIBRE_ADO();
$TCATEGORIA_ADO =  new TCATEGORIA_ADO();
$TCALIBREIND_ADO =  new TCALIBREIND_ADO();

$DREXPORTACION_ADO =  new DREXPORTACION_ADO();
$DRINDUSTRIAL_ADO =  new DRINDUSTRIAL_ADO();

$REEMBALAJE_ADO =  new REEMBALAJE_ADO();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$NUMEROREEMBALAJE = "";
$VARIEDAD = "";
$FECHAREEMBALAJE = "";
$TIPOREEMBALAJE = "";
$TURNO = "";
$EMBOLSADO = "";

$PRODUCTOR = "";
$CSGPRODUCTOR = "";
$NOMBREPRODUCTOR = "";
$PLANTA = "";

$TOTALENVASE = "";
$TOTALNETO = "";
$TOTALBRUTO = 0;

$TOTALENVASEDEXPORTACION = "";
$TOTALNETODEXPORTACION = "";
$TOTALBRUTODEXPORTACION = "";
$TOTALDESHIDRATACIONDEXPORTACION = "";

$TOTALENVASEDINDUSTRIAL = "";
$TOTALNETODINDUSTRIAL = "";
$TOTALBRUTODINDUSTRIAL = "";

$PDEXPORTACION = "";
$PDINDUSTRIAL = "";
$PDTOTAL = "";

$TOTALSALIDA = "";
$TOTAL2 = "";
$TOTALDIFERENCIA = "";

$EMPRESA = "";
$EMPRESAURL = "";

$NOMBRE = "";
$html = '';


//INICIALIZAR ARREGLOS

$ARRAYVERTREEMBALAJE = "";
$ARRAYVERPVESPECIES = "";
$ARRAYVERVESPECIES = "";

$ARRAYVESPECIES = "";
$ARRAYPVESPECIES = "";

$ARRAYDEXPORTACION = "";
$ARRAYDEXPORTACION2 = "";
$ARRAYDEXPORTACIONTOTALES = "";

$ARRAYDINDUSTRIAL = "";
$ARRAYDINDUSTRIAL2 = "";
$ARRAYDINDUSTRIALTOTALES = "";

$ARRAYDREPALETIZAJETOTALES = "";
$ARRAYEXISTENCIATOMADA = "";
$ARRAYEXISTENCIATOMADATOTALES = "";
$ARRAYEVEEXPORTACIONID = "";
$ARRAYEVERERECEPCIONID = "";
$ARRAYEVEINDUSTRIALID;

$ARRAYEMPRESA = "";
$ARRAYREEMBALAJE = "";
$ARRAYREEMBALAJETOTALES = "";
$ARRAYUSUARIO = "";

if (isset($_REQUEST['usuario'])) {
  $USUARIO = $_REQUEST['usuario'];
  $ARRAYUSUARIO = $USUARIO_ADO->ObtenerNombreCompleto($USUARIO);
  $NOMBRE = $ARRAYUSUARIO[0]["NOMBRE_COMPLETO"];
}


if (isset($_REQUEST['parametro'])) {
  $IDOP = $_REQUEST['parametro'];
}

$ARRAYREEMBALAJE = $REEMBALAJE_ADO->verReembalaje3($IDOP);
if($ARRAYREEMBALAJE){

  $ARRAYEXISTENCIATOMADA = $EXIEXPORTACION_ADO->buscarPorReembalaje2($IDOP);
  $ARRAYDEXPORTACIONCALIBRE = $DREXPORTACION_ADO->buscarPorReembalajeAgrupadoCalibre($IDOP);
  $ARRAYDEXPORTACION = $DREXPORTACION_ADO->buscarPorReembalaje2($IDOP);
  $ARRAYDINDUSTRIAL = $DRINDUSTRIAL_ADO->buscarPorReembalaje2($IDOP);
  
  $NUMEROREEMBALAJE = $ARRAYREEMBALAJE[0]['NUMERO_REEMBALAJE'];
  $OBSERVACIONES = $ARRAYREEMBALAJE[0]['OBSERVACIONE_REEMBALAJE'];
  $FECHAREEMBALAJE = $ARRAYREEMBALAJE[0]['FECHA'];
  

  $ESTADO = $ARRAYREEMBALAJE[0]['ESTADO'];
  if ($ARRAYREEMBALAJE[0]['ESTADO'] == 1) {
    $ESTADO = "Abierto";
  }else if ($ARRAYREEMBALAJE[0]['ESTADO'] == 0) {
    $ESTADO = "Cerrado";
  }else{
    $ESTADO="Sin Datos";
  }  
  if ($ARRAYREEMBALAJE[0]['TURNO'] == 1) {
    $TURNO = "DIA";
  }else if ($ARRAYREEMBALAJE[0]['TURNO'] == 2) {
    $TURNO = "NOCHE";
  }else{
    $TURNO="Sin Datos";
  }
  $ARRAYVERVESPECIES = $VESPECIES_ADO->verVespecies($ARRAYREEMBALAJE[0]['ID_VESPECIES']);
  if($ARRAYVERVESPECIES){
    $VARIEDAD = $ARRAYVERVESPECIES[0]['NOMBRE_VESPECIES'];
  }else{
    $VARIEDAD="Sin Datos";
  }
  $ARRAYTREEMBALAJE = $TREEMBALAJE_ADO->verTreembalaje($ARRAYREEMBALAJE[0]['ID_TREEMBALAJE']);
  if($ARRAYTREEMBALAJE){
    $TIPOREEMBALAJE = $ARRAYTREEMBALAJE[0]['NOMBRE_TREEMBALAJE'];
  }else{
    $TIPOREEMBALAJE="Sin Datos";
  }
  $ARRAYPRODUCTOR = $PRODUCTOR_ADO->verProductor($ARRAYREEMBALAJE[0]['ID_PRODUCTOR']);
  if($ARRAYPRODUCTOR){
    $NOMBREPRODUCTOR = $ARRAYPRODUCTOR[0]['NOMBRE_PRODUCTOR'];
    $CSGPRODUCTOR = $ARRAYPRODUCTOR[0]['CSG_PRODUCTOR'];
  }






  $ARRAYEXISTENCIATOTALESREEMBALAJE = $EXIEXPORTACION_ADO->obtenerTotalesReembalaje($IDOP);
  $ARRAYEXISTENCIATOTALESREEMBALAJE2 = $EXIEXPORTACION_ADO->obtenerTotalesReembalaje2($IDOP);
  $TOTALNETO= $ARRAYEXISTENCIATOTALESREEMBALAJE[0]['NETO'];
  $TOTALNETOE = $ARRAYEXISTENCIATOTALESREEMBALAJE[0]['DESHIRATACION'];
  $TOTALENVASEE = $ARRAYEXISTENCIATOTALESREEMBALAJE[0]['ENVASE'];
  $TOTALNETOV= $ARRAYEXISTENCIATOTALESREEMBALAJE2[0]['NETO'];
  $TOTALNETOEV = $ARRAYEXISTENCIATOTALESREEMBALAJE2[0]['DESHIRATACION'];
  $TOTALENVASEEV = $ARRAYEXISTENCIATOTALESREEMBALAJE2[0]['ENVASE'];

  $ARRATDINDUSTRIALTOTALREEMBALAJE = $DRINDUSTRIAL_ADO->obtenerTotales($IDOP);
  $ARRATDINDUSTRIALTOTALREEMBALAJE2 = $DRINDUSTRIAL_ADO->obtenerTotales2($IDOP);    
  $ARRATDINDUSTRIALTOTALSC = $DRINDUSTRIAL_ADO->obtenerTotalesSC($IDOP);
  $ARRATDINDUSTRIALTOTALNC = $DRINDUSTRIAL_ADO->obtenerTotalesNC($IDOP);
  $TOTALNETOIND = $ARRATDINDUSTRIALTOTALREEMBALAJE[0]['NETO'];
  $TOTALNETOINDV = $ARRATDINDUSTRIALTOTALREEMBALAJE2[0]['NETO'];
  $TOTALNETOINDSC = $ARRATDINDUSTRIALTOTALSC[0]['NETO'];
  $TOTALNETOINDNC = $ARRATDINDUSTRIALTOTALNC[0]['NETO'];


  $ARRAYDEXPORTACIONTOTALREEMBALAJE = $DREXPORTACION_ADO->obtenerTotales($IDOP);
  $ARRAYDEXPORTACIONTOTALREEMBALAJE2 = $DREXPORTACION_ADO->obtenerTotales2($IDOP);
  $TOTALENVASEEX = $ARRAYDEXPORTACIONTOTALREEMBALAJE[0]['ENVASE'];
  $TOTALNETOEX = $ARRAYDEXPORTACIONTOTALREEMBALAJE[0]['NETO'];
  $TOTALBRUTOEX = $ARRAYDEXPORTACIONTOTALREEMBALAJE[0]['BRUTO'];
  $TOTALDESHIDRATACIONEX = $ARRAYDEXPORTACIONTOTALREEMBALAJE[0]['DESHIDRATACION'];
  
  $TOTALENVASEEXV = $ARRAYDEXPORTACIONTOTALREEMBALAJE[0]['ENVASE'];
  $TOTALNETOEXV = $ARRAYDEXPORTACIONTOTALREEMBALAJE[0]['NETO'];
  $TOTALBRUTOEXV = $ARRAYDEXPORTACIONTOTALREEMBALAJE[0]['BRUTO'];
  $TOTALDESHIDRATACIONEXV = $ARRAYDEXPORTACIONTOTALREEMBALAJE[0]['DESHIDRATACION'];

  $TOTALENVASEEXPO = $TOTALENVASEEX + $TOTALENVASEIND;
  $TOTALNETOEXPO = $TOTALNETOEX + $TOTALNETOIND;
  $TOTALBRUTOEXPO = $TOTALBRUTOEX + $TOTALBRUTOIND;



  $TOTALSALIDASF=$TOTALNETOEX+$TOTALNETOIND;
  $TOTALNETOEXPO=$TOTALDESHIDRATACIONEX-$TOTALNETOEX;
  $TOTAL2 = $TOTALNETOE - ($TOTALDESHIDRATACIONEX+$TOTALNETOIND);

  if ($TOTALSALIDASF > 0) {
    if ($TOTALNETOEX > 0) {
      $PDEXPORTACION = ($TOTALNETOEX / $TOTALNETOE) * 100;
      $PEXPORTACIONEXPOEXDESHI = ($TOTALDESHIDRATACIONEX / $TOTALNETOE) * 100;
      $PDEXPORTACIONTOTAL=(($TOTALDESHIDRATACIONEX-$TOTALNETOEX)/$TOTALNETOE)*100;
    } else {
      $PDEXPORTACION = 0;
      $PEXPORTACIONEXPOEXDESHI = 0;
      $PDEXPORTACIONTOTAL=0;
    }
    if ($TOTALSALIDASF > 0) {
      $PDINDUSTRIAL = ($TOTALNETOIND / $TOTALNETOE) * 100;
    } else {
      $PDINDUSTRIAL = 0;
    }
  } else {
    $PDEXPORTACION = 0;
    $PDINDUSTRIAL = 0;
  }
  $PDTOTAL = number_format($PDEXPORTACION +$PDEXPORTACIONTOTAL+ $PDINDUSTRIAL, 2, ",", ".");







  
  $IDUSUARIOI = $ARRAYREEMBALAJE[0]['ID_USUARIOI'];
  $ARRAYUSUARIO2 = $USUARIO_ADO->ObtenerNombreCompleto($IDUSUARIOI);
  $NOMBRERESPONSABLE = $ARRAYUSUARIO2[0]["NOMBRE_COMPLETO"];  

  $ARRAYPLANTA = $PLANTA_ADO->verPlanta($ARRAYREEMBALAJE[0]['ID_PLANTA']);
  $ARRAYEMPRESA = $EMPRESA_ADO->verEmpresa($ARRAYREEMBALAJE[0]['ID_EMPRESA']);
  $ARRAYTEMPORADA = $TEMPORADA_ADO->verTemporada($ARRAYREEMBALAJE[0]['ID_TEMPORADA']);
  $TEMPORADA = $ARRAYTEMPORADA[0]['NOMBRE_TEMPORADA'];
  $PLANTA = $ARRAYPLANTA[0]['NOMBRE_PLANTA'];
  $EMPRESA = $ARRAYEMPRESA[0]['NOMBRE_EMPRESA'];
  $EMPRESAURL = $ARRAYEMPRESA[0]['LOGO_EMPRESA'];
  
  if ($EMPRESAURL == "") {
    $EMPRESAURL = "img/empresa/no_disponible.png";
  } 


}




//OBTENCION DE LA FECHA
date_default_timezone_set('America/Santiago');
//SE LE PASA LA FECHA ACTUAL A UN ARREGLO
$ARRAYFECHADOCUMENTO = getdate();

//SE OBTIENE INFORMACION RELACIONADA CON LA HORA
$HORA = "" . $ARRAYFECHADOCUMENTO['hours'];
$MINUTO = "" . $ARRAYFECHADOCUMENTO['minutes'];
$SEGUNDO = "" . $ARRAYFECHADOCUMENTO['seconds'];
//EN CASO DE VALORES MENOS A 2 LENGHT, SE LE CONCATENA UN 0
if ($MINUTO < 10) {
  $MINUTO = "0" . $MINUTO;
}
if ($SEGUNDO < 10) {
  $SEGUNDO = "0" . $SEGUNDO;
}

// SE JUNTA LA INFORMAICON DE LA HORA Y SE LE DA UN FORMATO
$HORAFINAL = $HORA . "" . $MINUTO . "" . $SEGUNDO;
$HORAFINAL2 = $HORA . ":" . $MINUTO . ":" . $SEGUNDO;

//SE OBTIENE INFORMACION RELACIONADA CON LA FECHA
$DIA = "" . $ARRAYFECHADOCUMENTO['mday'];

$MES = "" . $ARRAYFECHADOCUMENTO['mon'];
$ANO = "" . $ARRAYFECHADOCUMENTO['year'];
$NOMBREMES = "" . $ARRAYFECHADOCUMENTO['month'];
$NOMBREDIA = "" . $ARRAYFECHADOCUMENTO['weekday'];
//EN CASO DE VALORES MENOS A 2 LENGHT, SE LE CONCATENA UN 0
if ($DIA < 10) {
  $DIA = "0" . $DIA;
}
//PARA TRAUDCIR EL MES AL ESPAÑOL
$MESESNOMBRES = array(
  "January" => "Enero",
  "February" => "Febrero",
  "March" => "Marzo",
  "April" => "Abril",
  "May" => "Mayo",
  "June" => "Junio",
  "July" => "Julio",
  "August" => "Agosto",
  "September" => "Septiembre",
  "October" => "Octubre",
  "November" => "Noviembre",
  "December" => "Diciembre"
);
//PARA TRAUDCIR EL DIA AL ESPAÑOL
$DIASNOMBRES = array(
  "Monday" => "Lunes",
  "Tuesday" => "Martes",
  "Wednesday" => "Miércoles",
  "Thursday" => "Jueves",
  "Friday" => "Viernes",
  "Saturday" => "Sábado",
  "Sunday" => "Domingo"
);

$NOMBREDIA = $DIASNOMBRES[$NOMBREDIA];
$NOMBREMES = $MESESNOMBRES[$NOMBREMES];
// SE JUNTA LA INFORMAICON DE LA FECHA Y SE LE DA UN FORMATO
$FECHANORMAL = $DIA . "" . $MES . "" . $ANO;
$FECHANORMAL2 = $DIA . "/" . $MES . "/" . $ANO;
$FECHANOMBRE = $NOMBREDIA . ", " . $DIA . " de " . $NOMBREMES . " del " . $ANO;


$html = '
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Informe Reembalaje</title>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
           <img src="../../assest/img/logo.png" width="150px" height="45px"/>
      </div>
      <div id="company">
        <h2 class="name">Soc. Agrícola El Álamo Ltda.</h2>
        <div>Fundo El Álamo</div>
        <div>Los Ángeles, Chile.</div>
        <div><a href="mailto:ti@fvolcan.com">ti@fvolcan.cl</a></div>
      </div>
    </header>
    <main>
      <h2 class="titulo" style="text-align: center; color: black;">
        INFORME REEMBALAJE 
        <br>
        <b> Numero Reembalaje: ' . $NUMEROREEMBALAJE . '</b>
      </h2>
      <div id="details" class="clearfix">
        
        <div id="invoice">
          <div class="date"><b>Código BRC: </b>REP-REEMB </div>   
          <div class="date"><b>Fecha Reembalaje: </b>' . $FECHAREEMBALAJE . ' </div>
          <div class="date"><b>Empresa: </b>' . $EMPRESA . '</div>
          <div class="date"><b>Planta: </b>' . $PLANTA . '</div>
          <div class="date"><b>Temporada: </b>' . $TEMPORADA . '</div>
        </div>

        <div id="client">
          <div class="address"><b>Tipo Reembalaje: </b>' . $TIPOREEMBALAJE . '</div>
          <div class="address"><b>Estado Reembalaje: </b> ' . $ESTADO . ' </div>
          <div class="address"><b>CSG: </b>' . $CSGPRODUCTOR . '</div>
          <div class="address"><b>Nombre Productor: </b>' . $NOMBREPRODUCTOR . '</div>
          <div class="address"><b>Variedad: </b>' . $VARIEDAD . ' </div>
        </div>
        
      </div>
     ';

$html = $html . '      
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th colspan="12" class="center">INGRESO.</th>
          </tr>
          <tr>
            <th class="color left">Folio</th>
            <th class="color center">Fecha Ingreso</th>
            <th class="color center">Código Estandar</th>
            <th class="color center">Envase/Estandar</th>
            <th class="color center">Cant. Envase</th>
            <th class="color center">Kilos Neto</th>
            <th class="color center">Kilos Con Deshidratacion</th>
            <th class="color center ">Variedad </th>
            <th class="color center">Embolsado</th>
            <th class="color center">Tipo Manejo</th>     
            <th class="color center">Calibre</th>      
            <th class="color center">Categoria</th> 
          </tr>
        </thead>
         <tbody>
        ';
foreach ($ARRAYEXISTENCIATOMADA as $r) :

  $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
  if($ARRAYVERVESPECIESID){
    $NOMBREVARIEDAD=$ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'];
  }else{    
    $NOMBREVARIEDAD = "Sin Datos";
  }
  $ARRAYEVERERECEPCIONID = $EEXPORTACION_ADO->verEstandar($r['ID_ESTANDAR']);
  if($ARRAYEVERERECEPCIONID){
    $CODIGOESTANDAR=$ARRAYEVERERECEPCIONID[0]['CODIGO_ESTANDAR'];
    $NOMBREESTANDAR=$ARRAYEVERERECEPCIONID[0]['NOMBRE_ESTANDAR'];
  }else{    
    $CODIGOESTANDAR = "Sin Datos";
    $NOMBREESTANDAR = "Sin Datos";
  }
  $ARRAYTMANEJO = $TMANEJO_ADO->verTmanejo($r['ID_TMANEJO']);
  if($ARRAYTMANEJO){
    $NOMBRETMANEJO = $ARRAYTMANEJO[0]['NOMBRE_TMANEJO'];
  }else{    
    $NOMBRETMANEJO = "Sin Datos";
  }
  $ARRAYTCALIBRE = $TCALIBRE_ADO->verCalibre($r['ID_TCALIBRE']);
  if ($ARRAYTCALIBRE) {
    $NOMBRETCALIBRE = $ARRAYTCALIBRE[0]['NOMBRE_TCALIBRE'];
  } else {
    $NOMBRETCALIBRE = "Sin Datos";
  }
  if ($r['EMBOLSADO'] == "1") {
    $EMBOLSADO = "SI";
  }
  if ($r['EMBOLSADO'] == "0") {
    $EMBOLSADO = "NO";
  }
  $ARRAYTCATEGORIA=$TCATEGORIA_ADO->verTcategoria($r['ID_TCATEGORIA']);
  if($ARRAYTCATEGORIA){
     $NOMBRETCATEGORIA= $ARRAYTCATEGORIA[0]["NOMBRE_TCATEGORIA"];
  }else{
      $NOMBRETCATEGORIA = "Sin Datos";
  } 
  $html = $html . '    
            <tr>
                <th class=" left">' . $r['FOLIO_AUXILIAR_EXIEXPORTACION'] . '</th>
                <td class=" center">' . $r['EMBALADO'] . '</td>
                <td class=" center"> ' . $CODIGOESTANDAR . '</td>
                <td class=" center"> ' . $NOMBREESTANDAR . '</td>
                <td class=" center">' . $r['ENVASE'] . '</td>
                <td class=" center">' . $r['NETO'] . '</td>
                <td class=" center">' . $r['DESHIRATACION'] . '</td>
                <td class=" center ">' . $NOMBREVARIEDAD . ' </td>
                <td class=" center">' . $EMBOLSADO . '</td>
                <td class=" center">' . $NOMBRETMANEJO . '</td>
                <td class=" center">' . $NOMBRETCALIBRE . '</td>
                <td class=" center">' . $NOMBRETCATEGORIA . '</td>
            </tr>
';

endforeach;

$html = $html . '
    
        <tr>
            <th class="color center"></th>
            <th class="color center"></th>
            <th class="color center"> </th>
            <th class="color right">Sub Total</th>
            <th class="color center">' . $TOTALENVASEEV . '</th>
            <th class="color center">' . $TOTALNETOV . '</th>
            <th class="color center">' . $TOTALNETOEV . '</th>
            <th class="color center "> </th>
            <th class="color center "> </th>
            <th class="color center "> </th>
            <th class="color center "> </th>
            <th class="color left"></th>
        </tr>
';


$html = $html . '
        </tbody>
      </table>
      ';


$html = $html . '      
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
            <th colspan="14" class="center">SALIDA.</th>
            </tr>
          <tr>
            <th colspan="14" class="center">PRODUCTO TERMINADO.</th>
          </tr>
          <tr>
            <th class="color left">Folio</th>
            <th class="color center">Fecha Embalado</th>
            <th class="color center">Código Estandar</th>
            <th class="color center">Envase/Estandar</th>
            <th class="color center">Cant. Envase</th>
            <th class="color center">Kilos Neto</th>
            <th class="color center">% Deshi.</th>
            <th class="color center">Kilos Con Deshi.</th>
            <th class="color center ">% </th>
            <th class="color center ">Variedad </th>
            <th class="color center">Embolsado</th>
            <th class="color center">Tipo Manejo</th>    
            <th class="color center">Calibre</th>       
            <th class="color center">Categoria</th>    
          </tr>
        </thead>
         <tbody>
        ';
foreach ($ARRAYDEXPORTACION as $r) :
  $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
  if($ARRAYVERVESPECIESID){
    $NOMBREVARIEDAD=$ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'];
  }else{    
    $NOMBREVARIEDAD = "Sin Datos";
  }
  $ARRAYEVEEXPORTACIONID2 = $EEXPORTACION_ADO->verEstandar($r['ID_ESTANDAR']);
  if($ARRAYEVEEXPORTACIONID2){
    $CODIGOESTANDAR2=$ARRAYEVEEXPORTACIONID2[0]['CODIGO_ESTANDAR'];
    $NOMBREESTANDAR2=$ARRAYEVEEXPORTACIONID2[0]['NOMBRE_ESTANDAR'];
  }else{    
    $CODIGOESTANDAR2 = "Sin Datos";
    $NOMBREESTANDAR2 = "Sin Datos";
  }
  $ARRAYTMANEJO = $TMANEJO_ADO->verTmanejo($r['ID_TMANEJO']);
  if($ARRAYTMANEJO){
    $NOMBRETMANEJO = $ARRAYTMANEJO[0]['NOMBRE_TMANEJO'];
  }else{    
    $NOMBRETMANEJO = "Sin Datos";
  }
  $ARRAYTCALIBRE = $TCALIBRE_ADO->verCalibre($r['ID_TCALIBRE']);
  if ($ARRAYTCALIBRE) {
    $NOMBRETCALIBRE = $ARRAYTCALIBRE[0]['NOMBRE_TCALIBRE'];
  } else {
    $NOMBRETCALIBRE = "Sin Datos";
  }
  if ($TOTALSALIDASF > 0) {
    $NETOEXPOR = number_format(($r['KILOS_DESHIDRATACION_DREXPORTACION'] / $TOTALNETOE) * 100, 2, ",", ".");
  } else {
    $NETOEXPOR = 0;
  }

  if ($r['EMBOLSADO'] == "1") {
    $EMBOLSADO = "SI";
  }
  if ($r['EMBOLSADO'] == "0") {
    $EMBOLSADO = "NO";
  }
  $ARRAYTCATEGORIA=$TCATEGORIA_ADO->verTcategoria($r['ID_TCATEGORIA']);
  if($ARRAYTCATEGORIA){
     $NOMBRETCATEGORIA= $ARRAYTCATEGORIA[0]["NOMBRE_TCATEGORIA"];
  }else{
      $NOMBRETCATEGORIA = "Sin Datos";
  } 
  $html = $html . '    
        <tr>
            <th class=" left"> ' . $r['FOLIO_DREXPORTACION'] . '</th>
            <td class=" center"> ' . $r['EMBALADO'] . '</td>
            <td class=" center"> ' . $CODIGOESTANDAR2 . '</td>
            <td class=" center"> ' . $NOMBREESTANDAR2 . '</td>
            <td class=" center">' . $r['ENVASE'] . ' </td>
            <td class=" center"> ' . $r['NETO'] . '</td>
            <td class=" center"> ' . $r['PORCENTAJE'] .   '%</td>
            <td class=" center "> ' . $r['DESHIDRATACION'] . ' </td>
            <td class=" center "> ' . $NETOEXPOR . ' </td>
            <td class=" center "> ' . $NOMBREVARIEDAD . ' </td>
            <td class=" center "> ' . $EMBOLSADO . ' </td>
            <td class=" center">' . $NOMBRETMANEJO . '</td>
            <td class=" center">' . $NOMBRETCALIBRE . '</td>
            <td class=" center">' . $NOMBRETCATEGORIA . '</td>
        </tr>
        ';

endforeach;
$html = $html . '    
            <tr>
                <th class="color center"> </th>
                <th class="color center"> </th>
                <th class="color center"> </th>
                <th class="color center"> </th>
                <th class="color right">Sub Total </th>
                <th class="color center"> ' . $TOTALENVASEEXV . '</th>
                <th class="color center">' . $TOTALNETOEX . ' </th>
                <th class="color center "> ' . $TOTALDESHIDRATACIONEXV . ' </th>
                <th class="color center "> ' . number_format($PEXPORTACIONEXPOEXDESHI, 2, ",", ".") . '% </th>
                <th class="color center ">  </th>
                <th class="color left"></th>
                <th class="color center"> </th>
                <th class="color left"></th>
                <th class="color left"></th>
            </tr>
            ';


$html = $html . '
        </tbody>
      </table>
      ';
$html = $html . '  
      <br>    
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
           
          <tr>
            <th colspan="8" class="center">PRODUCTO INDUSTRIAL.</th>
          </tr>
          <tr>
            <th class="color left">Folio</th>
            <th class="color center">Fecha Embalado</th>
            <th class="color center">Código Estandar</th>
            <th class="color center">Envase/Estandar</th>
            <th class="color center">Calibre</th>
            <th class="color center">Kilos Neto</th>
            <th class="color center ">% </th>
            <th class="color center ">Variedad </th>
          </tr>
        </thead>
         <tbody>
        ';
foreach ($ARRAYDINDUSTRIAL as $r) :
  $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
  if($ARRAYVERVESPECIESID){
    $NOMBREVARIEDAD=$ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'];
  }else{    
    $NOMBREVARIEDAD = "Sin Datos";
  }
  $ARRAYEVEINDUSTRIALID = $EINDUSTRIAL_ADO->verEstandar($r['ID_ESTANDAR']);
  if($ARRAYEVEINDUSTRIALID){
    $CODIGOESTANDAR=$ARRAYEVEINDUSTRIALID[0]['CODIGO_ESTANDAR'];
    $NOMBREESTANDAR=$ARRAYEVEINDUSTRIALID[0]['NOMBRE_ESTANDAR'];
  }else{    
    $CODIGOESTANDAR = "Sin Datos";
    $NOMBREESTANDAR = "Sin Datos";
  }

  if ($TOTALSALIDASF > 0) {
    $NETOINDU = number_format(($r['KILOS_NETO_DRINDUSTRIAL'] / $TOTALNETOE) * 100, 2, ",", ".");
  } else {
    $NETOINDU = 0;
  }

  $ARRAYTCALIBREIND = $TCALIBREIND_ADO->verCalibreInd($r['ID_TCALIBREIND']);
  if ($ARRAYTCALIBREIND) {
      $NOMBRETCALIBREIND = $ARRAYTCALIBREIND[0]['NOMBRE_TCALIBREIND'];
  } else {
      $NOMBRETCALIBREIND = "Sin Datos";
  }
  $html = $html . '    
        <tr>
            <th class=" left"> ' . $r['FOLIO_DRINDUSTRIAL'] . '</th>
            <td class=" center"> ' . $r['EMBALADO'] . '</td>
            <td class=" center"> ' . $CODIGOESTANDAR . '</td>
            <td class=" center"> ' . $NOMBREESTANDAR . '</td>
            <td class=" center"> ' . $NOMBRETCALIBREIND . '</td>
            <td class=" center"> ' . $r['KILOS_NETO_DRINDUSTRIAL'] . '</td>
            <td class=" center"> ' . $NETOINDU . '</td>
            <td class=" center "> ' . $NOMBREVARIEDAD . ' </td>
        </tr>
        ';

endforeach;
$html = $html . '    
        <tr>
            <th class="color left"> </th>
            <th class="color center"> </th>
            <th class="color center"> </th>
            <th class="color center"> </th>
            <th class="color right">Sub Total </th>
            <th class="color center">' . $TOTALNETOINDV . ' </th>
            <th class="color center "> ' . number_format($PDINDUSTRIAL, 2, ",", ".") . '% </th>
            <th class="color center"> </th>
        </tr>
        ';

$html = $html . '
        </tbody>
      </table>
      '; 
$html = $html . '   
    <div id="details" class="clearfix">
        <div id="client">
          <div class="address"><b>Observaciones</b></div>
          <div class="address">  ' . $OBSERVACIONES . ' </div>
        </div>
        <div id="invoice">
          <div class="date"><b><hr></b></div>
          <div class="date center">  Firma Responsable</div>
          <div class="date center">  ' . $NOMBRERESPONSABLE . '</div>
      </div>
    </div>  
            
    </main>
  </body>
</html>

';


//CREACION NOMBRE DEL ARCHIVO
$NOMBREARCHIVO = "InformeReembalaje_";
$FECHADOCUMENTO = $FECHANORMAL . "_" . $HORAFINAL;
$TIPODOCUMENTO = "Informe";
$FORMATO = ".pdf";
$NOMBREARCHIVOFINAL = $NOMBREARCHIVO . $FECHADOCUMENTO . $FORMATO;

//CONFIGURACIOND DEL DOCUMENTO
$TIPOPAPEL = "LETTER";
$ORIENTACION = "P";
$LENGUAJE = "ES";
$UNICODE = "true";
$ENCODING = "UTF-8";

//DETALLE DEL CREADOR DEL INFORME
$TIPOINFORME = "Informe Reembalaje";
$CREADOR = "Usuario";
$AUTOR = "Usuario";
$ASUNTO = "Informe";

//API DE GENERACION DE PDF
require_once '../../api/mpdf/mpdf/autoload.php';
//$PDF = new \Mpdf\Mpdf();W
$PDF = new \Mpdf\Mpdf(['format' => 'letter']);

//CONFIGURACION FOOTER Y HEADER DEL PDF
$PDF->SetHTMLHeader('
  <table width="100%" >
      <tbody>
          <tr>
            <th width="55%" class="left f10">' . $EMPRESA . '</th>
            <td width="45%" class="right f10">' . $FECHANORMAL2 . '</td>
            <td width="5%"  class="right f10"><span>{PAGENO}/{nbpg}</span></td>
          </tr>
      </tbody>
  </table>
  <br>    
');

$PDF->SetHTMLFooter('
<footer>
  Informe generado por Departamento TI Fruticola Volcan <a href="mailto:ti@fvolcan.cl">ti@fvolcan.cl.</a>
  <br>
  Impreso por: <b>' . $NOMBRE . '.</b> Hora impresión: <b>' . $HORAFINAL2 . '</b>
</footer>
    
');


$PDF->SetTitle($TIPOINFORME); //titulo pdf
$PDF->SetCreator($CREADOR); //CREADOR PDF
$PDF->SetAuthor($AUTOR); //AUTOR PDF
$PDF->SetSubject($ASUNTO); //ASUNTO PDF


//CONFIGURACION

//$PDF->simpleTables = true; 
//$PDF->packTableData = true;

//INICIALIZACION DEL CSS
$stylesheet = file_get_contents('../../assest/css/stylePdf.css'); // carga archivo css
$stylesheet2 = file_get_contents('../../assest/css/reset.css'); // carga archivo css

//ENLASAR CSS CON LA VISTA DEL PDF
$PDF->WriteHTML($stylesheet, 1);
$PDF->WriteHTML($stylesheet2, 1);

//GENERAR PDF
$PDF->WriteHTML($html);
//METODO DE SALIDA
$PDF->Output($NOMBREARCHIVOFINAL, \Mpdf\Output\Destination::INLINE);
