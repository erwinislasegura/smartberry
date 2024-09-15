<?php

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES 
include_once '../../assest/controlador/TUSUARIO_ADO.php';
include_once '../../assest/controlador/USUARIO_ADO.php';
include_once '../../assest/controlador/EMPRESA_ADO.php';
include_once '../../assest/controlador/PLANTA_ADO.php';
include_once '../../assest/controlador/TEMPORADA_ADO.php';




include_once '../../assest/controlador/TINPSAG_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/VESPECIES_ADO.php';
include_once '../../assest/controlador/EEXPORTACION_ADO.php';
include_once '../../assest/controlador/EXIEXPORTACION_ADO.php';


include_once '../../assest/controlador/TCALIBRE_ADO.php';
include_once '../../assest/controlador/TMANEJO_ADO.php';
include_once '../../assest/controlador/PCDESPACHO_ADO.php';



include_once '../../assest/controlador/PAIS_ADO.php';
include_once '../../assest/controlador/REGION_ADO.php';
include_once '../../assest/controlador/PROVINCIA_ADO.php';
include_once '../../assest/controlador/COMUNA_ADO.php';





//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$TUSUARIO_ADO = new TUSUARIO_ADO();
$USUARIO_ADO = new USUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();


$TINPSAG_ADO =  new TINPSAG_ADO();
$PRODUCTOR_ADO = new PRODUCTOR_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$EEXPORTACION_ADO = new EEXPORTACION_ADO();
$EXIEXPORTACION_ADO = new EXIEXPORTACION_ADO();
$TCALIBRE_ADO =  new TCALIBRE_ADO();
$TMANEJO_ADO =  new TMANEJO_ADO();
$PCDESPACHO_ADO =  new PCDESPACHO_ADO();



$PAIS_ADO =  new PAIS_ADO();
$REGION_ADO =  new REGION_ADO();
$PROVINCIA_ADO =  new PROVINCIA_ADO();
$COMUNA_ADO =  new COMUNA_ADO();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$NUMERO = "";
$NUMEROVER = "";
$IDDESPACHOEX = "";
$FECHADESPACHOEX = "";
$FECHAINGRESODESPACHOEX = "";
$FECHAMODIFCIACIONDESPACHOEX = "";
$TINPSAG = "";
$EMBARQUE = "";
$NOMBRETINPSAG = "";
$NOMBRETESTADOSAG = "";

$OBSERVACIONDESPACHOEX = "";
$INPECTOR = "";
$CONTRAPARTE = "";
$PAIS = "";
$EMPRESA = "";
$TEMPORADA = "";
$PLANTA = "";
$CALIBRE = "";
$TMANEJO = "";
$EMPRESAURL = "";

$CIF="";

$TOTALENVASE = "";
$TOTALNETO = "";
$TOTALBRUTO = "";

$TOTALENVASE2 = "";
$TOTALNETO2 = "";
$TOTALBRUTO2 = "";

$CSGPRODUCTOR = "";
$NOMBREPRODUCTOR = "";
$COMUNAPRODUCTOR = "";
$PROVINCIAPRODUCTOR="";

$CODIGOESTANDAR = "";
$NOMBREESTANDAR = "";
$NOMBREVARIEDAD = "";


$CSPPLANTA="";
$RAZONPLANTA="";
$COMUNAPLANTA="";
$CIUDADPLANTA="";
$NOMBREPROVINICA="";
$CSPPLANTA2="";
$NOMBREPLANTA2="";
$COMUNAPLANTA2="";
$PROVINCIAPLANTA2="";


$CSPPLANTA3="";
$NOMBREPLANTA3="";
$COMUNAPLANTA3="";
$PROVINCIAPLANTA3="";
$NOMBRENAVE="";
$NOMBREEXPORTADORA="";
$NOMBRECONTRAPARTE="";

$FECHAETA="";
$FECHAETD="";

//INICIALIZAR ARREGLOS
$ARRAYDESPACHOEX = "";
$ARRAYEXIEXPORTACION = "";
$ARRAYEXIEXPORTACION2 = "";
$ARRAYEXIEXPORTACIONBOLSA = "";
$ARRAYEXIEXPORTACIONBOLSA2 = "";
$ARRAYEXIEXPORTACIONBOLSA3 = "";

$ARRAYEXIEXPORTACIONPRODUCTOR = "";
$ARRAYEXIEXPORTACIONPRODUCTORESTANDAR = "";
$ARRAYEXIEXPORTACIONPRODUCTORESTANDARPVARIEDAD = "";

$ARRAYEXIEXPORTACIONPRODUCTORTOTAL = "";
$ARRAYEXIEXPORTACIONPRODUCTORESTANDARTOTAL = "";
$ARRAYEXIEXPORTACIONPRODUCTORESTANDARPVARIEDADTOTAL = "";

$ARRAYEXIEXPORTACIONTOTAL = "";
$ARRAYEXIEXPORTACIONTOTAL2 = "";
$ARRAYEXIEXPORTACIONBOLSATOTAL = "";

$ARRAYINPECTOR = "";
$ARRAYCONTRAPARTE = "";


$ARRAYCOMUNA = "";
$ARRAYPROVINCIA = "";
$ARRAYREGION = "";
$ARRAYPAIS = "";



$ARRAYCOMUNA2= "";
$ARRAYPROVINCIA2 = "";
$ARRAYREGION2 = "";
$ARRAYPAIS2 = "";


$ARRAYNAVE="";

$ARRAYEXPORTADORA="";
$ARRAYFOLIO = "";
$ARRAYEMPRESA = "";
$ARRAYPLANTA = "";
$ARRAYPLANTA2 = "";
$ARRAYTEMPORADA = "";
$ARRAYVESPECIES = "";
$ARRAYPVESPECIES = "";
$ARRAYEEXPORTACION = "";
$ARRAYPRODUCTOR = "";
$ARRAYCALIBRE = "";
$ARRAYTMANEJO = "";
$ARRAYUSUARIO="";
$ARRAYICARGA="";



if (isset($_REQUEST['usuario'])) {
  $USUARIO = $_REQUEST['usuario'];
  $ARRAYUSUARIO = $USUARIO_ADO->ObtenerNombreCompleto($USUARIO);
  $NOMBRE = $ARRAYUSUARIO[0]["NOMBRE_COMPLETO"];
}



if (isset($_REQUEST['parametro'])) {
  $IDOP = $_REQUEST['parametro'];
}

$ARRAYPCDESPACHO = $PCDESPACHO_ADO->verPcdespacho2($IDOP);
if($ARRAYPCDESPACHO){
  
  $ARRAYEXIEXPORTACION = $EXIEXPORTACION_ADO->buscarPorPcdespachoAgrupadoPorFolio($IDOP);
  $ARRAYEXIEXPORTACIONTOTAL = $EXIEXPORTACION_ADO->obtenerTotalesPorPcdespacho2($IDOP);
  $TOTALENVASE = $ARRAYEXIEXPORTACIONTOTAL[0]['ENVASE'];
  $TOTALNETO = $ARRAYEXIEXPORTACIONTOTAL[0]['NETO'];
  $TOTALBRUTO = $ARRAYEXIEXPORTACIONTOTAL[0]['BRUTO'];
  
  $ARRAYEXIEXPORTACIONBOLSA = $EXIEXPORTACION_ADO->buscarExistenciaPCdespachoex2($IDOP);
  $ARRAYEXIEXPORTACIONBOLSATOTAL = $EXIEXPORTACION_ADO->obtenerTotalesExistenciaBolsaPCdespachoeEx2($IDOP);
  $TOTALENVASEBOLSA = $ARRAYEXIEXPORTACIONBOLSATOTAL[0]['ENVASE'];
  $TOTALNETOBOLSA= $ARRAYEXIEXPORTACIONBOLSATOTAL[0]['NETO'];
  $TOTALBRUTOBOLSA= $ARRAYEXIEXPORTACIONBOLSATOTAL[0]['BRUTO'];
  
  $NUMERO = $ARRAYPCDESPACHO[0]['NUMERO_PCDESPACHO'];
  $FECGAPCDESPACHO = $ARRAYPCDESPACHO[0]['FECHA'];
  $FECHAINGRESO = $ARRAYPCDESPACHO[0]['INGRESO'];
  $FECHAMODIFCACION = $ARRAYPCDESPACHO[0]['MODIFICACION'];
  $OBSERVACIONES = $ARRAYPCDESPACHO[0]['MOTIVO_PCDESPACHO'];
  $ESTADO = $ARRAYPCDESPACHO[0]['ESTADO'];
  if ($ARRAYPCDESPACHO[0]['ESTADO'] == 1) {
    $ESTADO = "Abierto";
  }else if ($ARRAYPCDESPACHO[0]['ESTADO'] == 0) {
    $ESTADO = "Cerrado";
  }else{
    $ESTADO="Sin Datos";
  }  
  

  $ARRAYPLANTA = $PLANTA_ADO->verPlanta($ARRAYPCDESPACHO[0]['ID_PLANTA']);
  $ARRAYTEMPORADA = $TEMPORADA_ADO->verTemporada($ARRAYPCDESPACHO[0]['ID_TEMPORADA']);
  $ARRAYEMPRESA = $EMPRESA_ADO->verEmpresa($ARRAYPCDESPACHO[0]['ID_EMPRESA']);
  
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
    <title>Packing List Planificador Carga</title>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
          <img src="../../assest/img/logo.png" width="100px" height="30px"/>
      </div>
      <div id="company">
        <h2 class="name">Soc. Agrícola El Álamo Ltda.</h2>
        <div>Fundo El Álamo</div>
        <div>Los Ángeles, Chile.</div>
      </div>
    </header>
    <main>
      <h2 class="titulo" style="text-align: center; color: black;">        
          PACKING LIST PLANIFICADOR CARGA<br>
        <br>
        <b> Número Planificador de carga: ' . $NUMERO . '</b>
      </h2>
      <div id="details" class="clearfix">        
        <div id="invoice">
          <div class="date"><b>Código BRC: </b>REP- </div>  
          <div class="date"><b>Fecha Despacho: </b>' . $FECGAPCDESPACHO . ' </div>
          <div class="date"><b>Empresa: </b>' . $EMPRESA . '</div>
          <div class="date"><b>Planta: </b>' . $PLANTA . '</div>
          <div class="date"><b>Temporada: </b>' . $TEMPORADA . '</div>
        </div>
        <div id="client">
           <div class="address"><b>Estado Despacho: </b> ' . $ESTADO . ' </div>
        </div>             
      </div>     
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th colspan="15" class="center">DETALLE DE   PLANIFICADOR DE CARGA.</th>
          </tr>
          <tr>
            <th class="color left">Folio</th>
            <th class="color center ">CSG </th>
            <th class="color center ">Productor </th>
            <th class="color center ">Provincia  </th>     
            <th class="color center ">Comuna  </th>       
            <th class="color center ">CSP </th>            
            <th class="color center ">Planta </th>  
            <th class="color center ">Provincia  </th>  
            <th class="color center ">Comuna  </th>   
            <th class="color center">Fecha Embalado</th>
            <th class="color center">Código Estandar</th>
            <th class="color center">Envase/Estandar</th>
            <th class="color center ">Variedad </th>
            <th class="color center">Calibre</th>
            <th class="color center">Cantidad Envase</th>

          </tr>
        </thead>
         <tbody>
        ';


foreach ($ARRAYEXIEXPORTACION as $d) :



  $ARRAYEXIEXPORTACION2 = $EXIEXPORTACION_ADO->buscarPorFolio2Activo2PCdespachoEX($d['FOLIO_AUXILIAR_EXIEXPORTACION'], $IDOP);
  $ARRAYEXIEXPORTACIONTOTAL2 = $EXIEXPORTACION_ADO->obtenerTotalesFolio2PCdespachoExActivo2($d['FOLIO_AUXILIAR_EXIEXPORTACION'], $IDOP);

  $TOTALENVASE2 = $ARRAYEXIEXPORTACIONTOTAL2[0]['ENVASE'];
  $TOTALNETO2 = $ARRAYEXIEXPORTACIONTOTAL2[0]['NETO'];
  $TOTALBRUTO2 = $ARRAYEXIEXPORTACIONTOTAL2[0]['BRUTO'];


  foreach ($ARRAYEXIEXPORTACION2 as $d) :
    $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($d['ID_PRODUCTOR']);
    if($ARRAYVERPRODUCTORID){
      $ARRAYCOMUNA = $COMUNA_ADO->verComuna($ARRAYVERPRODUCTORID[0]["ID_COMUNA"]);
      if($ARRAYCOMUNA){
        $COMUNAPRODUCTOR=$ARRAYCOMUNA[0]["NOMBRE_COMUNA"];
      }else{
        $COMUNAPRODUCTOR="Sin Datos";
      }
      $ARRAYPROVINCIA = $PROVINCIA_ADO->verProvincia($ARRAYVERPRODUCTORID[0]["ID_PROVINCIA"]);
      if($ARRAYPROVINCIA){
        $PROVINCIAPRODUCTOR=$ARRAYPROVINCIA[0]["NOMBRE_PROVINCIA"];
      }else{
        $PROVINCIAPRODUCTOR="Sin Datos";
      }
      $ARRAYREGION = $REGION_ADO->verRegion($ARRAYVERPRODUCTORID[0]["ID_REGION"]);
      if($ARRAYREGION){
        $REGIONPRODUCTOR=$ARRAYREGION[0]["NOMBRE_REGION"];
      }else{
        $REGIONPRODUCTOR="Sin Datos";
      }
  
    }else{
      $COMUNAPRODUCTOR="Sin Datos";
      $PROVINCIAPRODUCTOR="Sin Datos";
      $REGIONPRODUCTOR="Sin Datos";
    }
  
    $ARRAYPLANTA2 = $PLANTA_ADO->verPlanta($d['ID_PLANTA2']);
    if($ARRAYPLANTA2){
      $CSPPLANTA=$ARRAYPLANTA2[0]["CODIGO_SAG_PLANTA"];
      $NOMBREPLANTA=$ARRAYPLANTA2[0]["NOMBRE_PLANTA"];        
      $ARRAYCOMUNA=$COMUNA_ADO->verComuna2($ARRAYPLANTA2[0]["ID_COMUNA"]);
      if($ARRAYCOMUNA){
        $COMUNAPLANTA=$ARRAYCOMUNA[0]["COMUNA"];
        $PAISPLANTA=$ARRAYCOMUNA[0]["PAIS"];
      }else{
        $COMUNAPLANTA="";
        $PAISPLANTA="";
      }
      $ARRAYPROVINCIA=$PROVINCIA_ADO->verProvincia($ARRAYPLANTA2[0]["ID_PROVINCIA"]); 
      if($ARRAYPROVINCIA){
        $PROVINCIAPLANTA=$ARRAYPROVINCIA[0]["NOMBRE_PROVINCIA"];
      }else{
        $PROVINCIAPLANTA="";
      }
      $ARRAYREGION=$REGION_ADO->verRegion($ARRAYPLANTA2[0]["ID_REGION"]); 
      if($ARRAYREGION){
        $REGIONPLANTA=$ARRAYREGION[0]["NOMBRE_REGION"];
      }else{
        $REGIONPLANTA="";
      }
    }else{
      $CSPPLANTA="";
      $NOMBREPLANTA="";    
      $COMUNAPLANTA="";
      $PROVINCIAPLANTA="";
      $REGIONPLANTA="";
      $PAISPLANTA="";
    }


    $ARRAYVESPECIES = $VESPECIES_ADO->verVespecies($d['ID_VESPECIES']);
    $ARRAYEEXPORTACION = $EEXPORTACION_ADO->verEstandar($d['ID_ESTANDAR']);
    $ARRAYTMANEJO = $TMANEJO_ADO->verTmanejo($d['ID_TMANEJO']);
    $TMANEJO = $ARRAYTMANEJO[0]['NOMBRE_TMANEJO'];

    if ($d['STOCK']) {
      $STOCK = $d['STOCK'];
    } else {
      $STOCK = "-";
    }
    if ($d['EMBOLSADO'] == "1") {
      $EMBOLSADO = "SI";
    }
    if ($d['EMBOLSADO'] == "0") {
      $EMBOLSADO = "NO";
    }

    $ARRAYCALIBRE = $TCALIBRE_ADO->verCalibre($d['ID_TCALIBRE']);
    if ($ARRAYCALIBRE) {
      $CALIBRE = $ARRAYCALIBRE[0]['NOMBRE_TCALIBRE'];
    } else {
      $CALIBRE  = "Sin Calibre";
    }

    $html = $html . '
          
                      <tr >
                          <th class=" left">' . $d['FOLIO_AUXILIAR_EXIEXPORTACION'] . '</th>
                          <td class="center">' . $ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'] . '</td>
                          <td class="center">' . $ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'] . '</td>      4
                          <td class="center">' . $PROVINCIAPRODUCTOR . '</td>      
                          <td class="center">' . $COMUNAPRODUCTOR . '</td>          
                          <td class="center">' . $CSPPLANTA . '</td>     
                          <td class="center">' . $NOMBREPLANTA . '</td>    
                          <td class="center">' . $PROVINCIAPLANTA . '</td>   
                          <td class="center">' . $COMUNAPLANTA . '</td>   
                          <td class=" center">' . $d['EMBALADO'] . '</td>
                          <td class="center">' . $ARRAYEEXPORTACION[0]['CODIGO_ESTANDAR'] . '</td>
                          <td class="center">' . $ARRAYEEXPORTACION[0]['NOMBRE_ESTANDAR'] . '</td>
                          <td class="center">' . $ARRAYVESPECIES[0]['NOMBRE_VESPECIES'] . '</td>
                          <td class="center">' . $CALIBRE . '</td>
                          <td class="center">' . $d['ENVASE'] . '</td>
                      </tr>
              ';



  endforeach;

  $html = $html . '
              
          <tr class="bt">
              <th class="color3 left">&nbsp;</th>
              <th class="color3 center">&nbsp;</th>
              <th class="color3 center">&nbsp;</th>
              <th class="color3 center">&nbsp;</th>
              <th class="color3 center">&nbsp;</th>
              <th class="color3 center">&nbsp;</th>
              <th class="color3 center">&nbsp;</th>
              <th class="color3 center">&nbsp;</th>
              <th class="color3 center">&nbsp;</th>
              <th class="color3 center">&nbsp;</th>
              <th class="color3 center">&nbsp;</th>
              <th class="color3 center">&nbsp;</th>
              <th class="color3 center">&nbsp;</th>
              <th class="color3 right"> Total </th>
              <th class="color3 center">' . $TOTALENVASE2 . '</th>
          </tr>
      ';

endforeach;

$html = $html . '
              
          <tr class="bt">
              <th class="color left">&nbsp;</th>
              <th class="color center">&nbsp;</th>
              <th class="color center">&nbsp;</th>
              <th class="color center">&nbsp;</th>
              <th class="color center">&nbsp;</th>
              <th class="color center">&nbsp;</th>
              <th class="color center">&nbsp;</th>
              <th class="color center">&nbsp;</th>
              <th class="color center">&nbsp;</th>
              <th class="color center">&nbsp;</th>
              <th class="color center">&nbsp;</th>
              <th class="color center">&nbsp;</th>
              <th class="color center">&nbsp;</th>
              <th class="color right"> Total </th>
              <th class="color center">' . $TOTALENVASE . '</th>
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
            <th colspan="6" class="center">RESUMEN.</th>
          </tr>
          <tr>
            <th class="color left">CSG</th>
            <th class="color center ">Nombre Productor </th>
            <th class="color center ">Comuna </th>
            <th class="color center">Envase/Estandar</th>
            <th class="color center ">Variedad </th>
            <th class="color center">Cantidad Envase</th>
          </tr>
        </thead>
         <tbody>
';

foreach ($ARRAYEXIEXPORTACIONBOLSA as $a) :

  $ARRAYEXIEXPORTACIONPRODUCTOR = $EXIEXPORTACION_ADO->buscarExistenciaBolsacPCdespachoEx2DiferenciadoProductor($IDOP, $a['ID_PRODUCTOR']);
  $ARRAYEXIEXPORTACIONPRODUCTORTOTAL = $EXIEXPORTACION_ADO->obtenerTotalesExistenciaBolsaPCdespachoeExnDiferenciadoProductor2($IDOP, $a['ID_PRODUCTOR']);
  $TOTALENVASEPRODUCTOR = $ARRAYEXIEXPORTACIONPRODUCTORTOTAL[0]['ENVASE'];

  foreach ($ARRAYEXIEXPORTACIONPRODUCTOR as $b) :
    
    $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($b['ID_PRODUCTOR']);
    if($ARRAYVERPRODUCTORID){
      $CSGPRODUCTOR = $ARRAYVERPRODUCTORID[0]["CSG_PRODUCTOR"];
      $NOMBREPRODUCTOR = $ARRAYVERPRODUCTORID[0]["NOMBRE_PRODUCTOR"];
      $ARRAYCOMUNA = $COMUNA_ADO->verComuna($ARRAYVERPRODUCTORID[0]["ID_COMUNA"]);
      if($ARRAYCOMUNA){
        $COMUNAPRODUCTOR=$ARRAYCOMUNA[0]["NOMBRE_COMUNA"];
      }else{
        $COMUNAPRODUCTOR="Sin Datos";
      }
      $ARRAYPROVINCIA = $PROVINCIA_ADO->verProvincia($ARRAYVERPRODUCTORID[0]["ID_PROVINCIA"]);
      if($ARRAYPROVINCIA){
        $PROVINCIAPRODUCTOR=$ARRAYPROVINCIA[0]["NOMBRE_PROVINCIA"];
      }else{
        $PROVINCIAPRODUCTOR="Sin Datos";
      }
      $ARRAYREGION = $REGION_ADO->verRegion($ARRAYVERPRODUCTORID[0]["ID_REGION"]);
      if($ARRAYREGION){
        $REGIONPRODUCTOR=$ARRAYREGION[0]["NOMBRE_REGION"];
      }else{
        $REGIONPRODUCTOR="Sin Datos";
      }
  
    }else{
      $COMUNAPRODUCTOR="Sin Datos";
      $PROVINCIAPRODUCTOR="Sin Datos";
      $REGIONPRODUCTOR="Sin Datos";
    }



    $ARRAYEXIEXPORTACIONBOLSA2 = $EXIEXPORTACION_ADO->buscarExistenciaBolsaPCdespachoEx2ProductorDiferenciadoProductorEstandar($IDOP, $b['ID_PRODUCTOR']);
    foreach ($ARRAYEXIEXPORTACIONBOLSA2 as $c) :

      $ARRAYEXIEXPORTACIONPRODUCTORESTANDAR = $EXIEXPORTACION_ADO->buscarExistenciaBolsaPCdespachoEx2ProductorEstandarDiferenciadoProductorEstandar($IDOP, $c['ID_PRODUCTOR'], $c['ID_ESTANDAR']);
      $ARRAYEXIEXPORTACIONPRODUCTORESTANDARTOTAL = $EXIEXPORTACION_ADO->obtenerTotalesExistenciaBolsaPCdespachoEx2ProductorEstandarDiferenciadoProductorEstandar($IDOP, $c['ID_PRODUCTOR'], $c['ID_ESTANDAR']);
      $TOTALENVASEESTANDAR = $ARRAYEXIEXPORTACIONPRODUCTORESTANDARTOTAL[0]['ENVASE'];
      foreach ($ARRAYEXIEXPORTACIONPRODUCTORESTANDAR as $d) :
        $ARRAYEEXPORTACION = $EEXPORTACION_ADO->verEstandar($d['ID_ESTANDAR']);
        $CODIGOESTANDAR = $ARRAYEEXPORTACION[0]["CODIGO_ESTANDAR"];
        $NOMBREESTANDAR = $ARRAYEEXPORTACION[0]["NOMBRE_ESTANDAR"];

        $ARRAYEXIEXPORTACIONBOLSA3 = $EXIEXPORTACION_ADO->buscarExistenciaBolsaPCdespachoEx2ProductorEstandarDiferenciadoProductorEstandarVariedad($IDOP, $d['ID_PRODUCTOR'], $d['ID_ESTANDAR']);
        foreach ($ARRAYEXIEXPORTACIONBOLSA3 as $e) :
          $ARRAYEXIEXPORTACIONPRODUCTORESTANDARPVARIEDAD = $EXIEXPORTACION_ADO->buscarExistenciaBolsaPCdespachoeEx2ProductorEstandarVariedadDiferenciadoProductorEstandarVariedad($IDOP, $e['ID_PRODUCTOR'], $e['ID_ESTANDAR'], $e['ID_VESPECIES']);
          $ARRAYEXIEXPORTACIONPRODUCTORESTANDARPVARIEDADTOTAL = $EXIEXPORTACION_ADO->obtenerTotalesExistenciaBolsaPCdespachoeEx2ProductorEstandarVariedadDiferenciadoProductorEstandarVariedad($IDOP, $e['ID_PRODUCTOR'], $e['ID_ESTANDAR'], $e['ID_VESPECIES']);
          $TOTALENVASEVARIEDAD = $ARRAYEXIEXPORTACIONPRODUCTORESTANDARPVARIEDADTOTAL[0]['ENVASE'];
          foreach ($ARRAYEXIEXPORTACIONPRODUCTORESTANDARPVARIEDAD as $f) :

            $ARRAYVESPECIES = $VESPECIES_ADO->verVespecies($f['ID_VESPECIES']);
            $NOMBREVARIEDAD = $ARRAYVESPECIES[0]["NOMBRE_VESPECIES"];

            $html = $html . '              
            <tr >
                <td class="left">' .  $CSGPRODUCTOR . '</td>
                <td class="center">' . $NOMBREPRODUCTOR . '</td>
                <td class="center">' . $COMUNAPRODUCTOR . '</td>
                <td class="center">' . $NOMBREESTANDAR . '</td>
                <td class="center">' . $NOMBREVARIEDAD . '</td>
                <th class="center">' . $TOTALENVASEVARIEDAD . '</th>
            </tr>
            ';


          endforeach;
        endforeach;
      endforeach;

      $html = $html . '              
        <tr class="bt">
            <th class="color2 center">&nbsp;</th>
            <th class="color2 center">&nbsp;</th>
            <th class="color2 center">&nbsp;</th>
            <th class="color2 center">&nbsp;</th>
            <th class="color2 right"> Total Estandar </th>
            <th class="color2 center">' . $TOTALENVASEESTANDAR . '</th>¿
        </tr>
      ';

    endforeach;
  endforeach;
  $html = $html . '              
  <tr class="bt">
      <th class="color2 center">&nbsp;</th>
      <th class="color2 center">&nbsp;</th>
      <th class="color2 center">&nbsp;</th>
      <th class="color2 center">&nbsp;</th>
      <th class="color2 right"> Total Productor </th>
      <th class="color2 center">' . $TOTALENVASEPRODUCTOR . '</th>¿
  </tr>
';


endforeach;
$html = $html . '              
<tr class="bt">
    <th class="color center">&nbsp;</th>
    <th class="color center">&nbsp;</th>
    <th class="color center">&nbsp;</th>
    <th class="color center">&nbsp;</th>
    <th class="color right"> Total  </th>
    <th class="color center">' . $TOTALENVASEBOLSA . '</th>¿
</tr>
';


$html = $html . '
        </tbody>
      </table>

      ';





$html = $html . '
<br>&nbsp;<br><br><br><br>
          <div id="details" class="clearfix">
   
            <div id="client">
              <div class="address"><b>Observaciones</b></div>
              <div class="address">  ' . $OBSERVACIONES . ' </div>
            </div>
            <div id="invoice">
              <div class="date"><b><hr></b></div>
              <div class="date center">  Firma Contraparte <br> o <br> Despachador Autorizado</div>
              <div class="date center">  </div>
            </div>
          </div>
            

    </main>
  </body>
</html>

';






//CREACION NOMBRE DEL ARCHIVO
$NOMBREARCHIVO = "InformePCdespachoexPackingList_";
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
$TIPOINFORME = "Informe Planificador Carga Packing List";
$CREADOR = "Usuario";
$AUTOR = "Usuario";
$ASUNTO = "Informe";

//API DE GENERACION DE PDF
require_once '../../api/mpdf/mpdf/autoload.php';
//$PDF = new \Mpdf\Mpdf();W
$PDF = new \Mpdf\Mpdf(['format' => 'letter-L']);

//CONFIGURACION FOOTER Y HEADER DEL PDF
//CONFIGURACION FOOTER Y HEADER DEL PDF
$PDF->SetHTMLHeader('

    
');

$PDF->SetHTMLFooter('



<footer>
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
$stylesheet1 = file_get_contents('../../assest/css/stylePdf.css'); // carga archivo css
$stylesheet2 = file_get_contents('../../assest/css/reset.css'); // carga archivo css
//ENLASAR CSS CON LA VISTA DEL PDF
$PDF->WriteHTML($stylesheet1, 1);
$PDF->WriteHTML($stylesheet2, 1);


//GENERAR PDF
$PDF->WriteHTML($html);
//METODO DE SALIDA
$PDF->Output($NOMBREARCHIVOFINAL, \Mpdf\Output\Destination::INLINE);
