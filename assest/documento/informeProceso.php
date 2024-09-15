<?php

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES 
include_once '../../assest/controlador/TUSUARIO_ADO.php';
include_once '../../assest/controlador/USUARIO_ADO.php';
include_once '../../assest/controlador/EMPRESA_ADO.php';
include_once '../../assest/controlador/PLANTA_ADO.php';
include_once '../../assest/controlador/TEMPORADA_ADO.php';


include_once '../../assest/controlador/TPROCESO_ADO.php';
include_once '../../assest/controlador/DPEXPORTACION_ADO.php';
include_once '../../assest/controlador/DPINDUSTRIAL_ADO.php';
include_once '../../assest/controlador/PROCESO_ADO.php';

include_once '../../assest/controlador/VESPECIES_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/EXIMATERIAPRIMA_ADO.php';
include_once '../../assest/controlador/EEXPORTACION_ADO.php';
include_once '../../assest/controlador/ERECEPCION_ADO.php';
include_once '../../assest/controlador/EINDUSTRIAL_ADO.php';
include_once '../../assest/controlador/TCALIBRE_ADO.php';
include_once '../../assest/controlador/TCATEGORIA_ADO.php';
include_once '../../assest/controlador/RECEPCIONMP_ADO.php';
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
$EXIMATERIAPRIMA_ADO =  new EXIMATERIAPRIMA_ADO();
$TPROCESO_ADO =  new TPROCESO_ADO();
$EEXPORTACION_ADO =  new EEXPORTACION_ADO();
$ERECEPCION_ADO =  new ERECEPCION_ADO();
$EINDUSTRIAL_ADO =  new EINDUSTRIAL_ADO();
$TCALIBRE_ADO =  new TCALIBRE_ADO();
$TCATEGORIA_ADO =  new TCATEGORIA_ADO();
$RECEPCIONMP_ADO =  new RECEPCIONMP_ADO();
$TCALIBREIND_ADO =  new TCALIBREIND_ADO();

$DPEXPORTACION_ADO =  new DPEXPORTACION_ADO();
$DPINDUSTRIAL_ADO =  new DPINDUSTRIAL_ADO();

$PROCESO_ADO =  new PROCESO_ADO();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$NUMEROPROCESO = "";
$VARIEDAD = "";
$FECHAPROCESO = "";
$TIPOPROCESO = "";
$TURNO = "";
$EMBOLSADO = "";
$PDEXPORTACION = "";
$PDINDUSTRIAL = "";
$PDTOTAL = "";
$PRODUCTOR = "";
$CSGPRODUCTOR = "";
$NOMBREPRODUCTOR = "";

$TOTALENVASE = "";
$TOTALNETO = "";
$TOTALBRUTO = 0;
$TOTALSALIDASF = 0;
$NETOEXPOR = 0;
$NETOINDU = 0;

$TOTALENVASEDEXPORTACION = "";
$TOTALNETODEXPORTACION = "";
$TOTALBRUTODEXPORTACION = "";
$TOTALDESHIDRATACIONDEXPORTACION = "";

$TOTALENVASEDINDUSTRIAL = "";
$TOTALNETODINDUSTRIAL = "";
$TOTALBRUTODINDUSTRIAL = "";
$TOTALENVASE="";
$TOTALNETO="";

$TOTALSALIDA = "";
$TOTAL2 = "";
$TOTALDIFERENCIA = "";

$EMPRESA = "";
$EMPRESAURL = "";

$NOMBRE = "";
$html = '';


//INICIALIZAR ARREGLOS

$ARRAYVERTPROCESO = "";
$ARRAYVERPVESPECIES = "";
$ARRAYVERVESPECIES = "";

$ARRAYVESPECIES = "";
$ARRAYPVESPECIES = "";

$ARRAYDEXPORTACION = "";
$ARRAYDEXPORTACION2 = "";
$ARRAYDEXPORTACIONCALIBRE = "";
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
$ARRAYPROCESO = "";
$ARRAYPROCESOTOTALES = "";
$ARRAYUSUARIO = "";

if (isset($_REQUEST['usuario'])) {
  $USUARIO = $_REQUEST['usuario'];
  $ARRAYUSUARIO = $USUARIO_ADO->ObtenerNombreCompleto($USUARIO);
  $NOMBRE = $ARRAYUSUARIO[0]["NOMBRE_COMPLETO"];
}

if (isset($_REQUEST['parametro'])) {
  $IDOP = $_REQUEST['parametro'];  
}

$ARRAYPROCESO = $PROCESO_ADO->verProceso3($IDOP);
if($ARRAYPROCESO){


  $FECHAPROCESO = $ARRAYPROCESO[0]['FECHA'];
  $NUMEROPROCESO = $ARRAYPROCESO[0]['NUMERO_PROCESO'];
  $OBSERVACIONES = $ARRAYPROCESO[0]['OBSERVACIONE_PROCESO'];

  $ESTADO = $ARRAYPROCESO[0]['ESTADO'];
  if ($ARRAYPROCESO[0]['ESTADO'] == 1) {
    $ESTADO = "Abierto";
  }else if ($ARRAYPROCESO[0]['ESTADO'] == 0) {
    $ESTADO = "Cerrado";
  }else{
    $ESTADO="Sin Datos";
  }  
  if ($ARRAYPROCESO[0]['TURNO'] == 1) {
    $TURNO = "DIA";
  }else if ($ARRAYPROCESO[0]['TURNO'] == 2) {
    $TURNO = "NOCHE";
  }else{
    $TURNO="Sin Datos";
  }

  $ARRAYVERVESPECIES = $VESPECIES_ADO->verVespecies($ARRAYPROCESO[0]['ID_VESPECIES']);
  if($ARRAYVERVESPECIES){
    $VARIEDAD = $ARRAYVERVESPECIES[0]['NOMBRE_VESPECIES'];
  }else{
    $VARIEDAD="Sin Datos";
  }
  $ARRAYTPROCESO = $TPROCESO_ADO->verTproceso($ARRAYPROCESO[0]['ID_TPROCESO']);
  if($ARRAYTPROCESO){
    $TIPOPROCESO = $ARRAYTPROCESO[0]['NOMBRE_TPROCESO'];
  }else{
    $TIPOPROCESO="Sin Datos";
  }
  $ARRAYPRODUCTOR = $PRODUCTOR_ADO->verProductor($ARRAYPROCESO[0]['ID_PRODUCTOR']);
  if($ARRAYPRODUCTOR){
    $NOMBREPRODUCTOR = $ARRAYPRODUCTOR[0]['NOMBRE_PRODUCTOR'];
    $CSGPRODUCTOR = $ARRAYPRODUCTOR[0]['CSG_PRODUCTOR'];
  }else{    
    $NOMBREPRODUCTOR = "Sin Datos";
    $CSGPRODUCTOR  = "Sin Datos";
  }


  $ARRAYEXISTENCIATOMADA = $EXIMATERIAPRIMA_ADO->buscarPorProceso2($IDOP);
  $ARRAYDEXPORTACION = $DPEXPORTACION_ADO->buscarPorProceso2($IDOP);
  $ARRAYDINDUSTRIAL = $DPINDUSTRIAL_ADO->buscarPorProceso2($IDOP);
  $ARRAYDEXPORTACIONCALIBRE = $DPEXPORTACION_ADO->buscarPorProcesoAgrupadoCalibre($IDOP);

  $ARRAYEXISTENCIAMPTOTAL = $EXIMATERIAPRIMA_ADO->obtenerTotalesProceso($IDOP);
  $ARRAYEXISTENCIAMPTOTAL2 = $EXIMATERIAPRIMA_ADO->obtenerTotalesProceso2($IDOP);
  $TOTALNETOE = $ARRAYEXISTENCIAMPTOTAL[0]['NETO'];
  $TOTALENVASEE = $ARRAYEXISTENCIAMPTOTAL[0]['ENVASE'];
  $TOTALNETOEV = $ARRAYEXISTENCIAMPTOTAL2[0]['NETO'];
  $TOTALENVASEEV = $ARRAYEXISTENCIAMPTOTAL2[0]['ENVASE'];


  $ARRATDINDUSTRIALTOTALPROCESO = $DPINDUSTRIAL_ADO->obtenerTotales($IDOP);
  $ARRATDINDUSTRIALTOTALPROCESO2 = $DPINDUSTRIAL_ADO->obtenerTotales2($IDOP);
  $ARRATDINDUSTRIALTOTALSC = $DPINDUSTRIAL_ADO->obtenerTotalesSC($IDOP);
  $ARRATDINDUSTRIALTOTALNC = $DPINDUSTRIAL_ADO->obtenerTotalesNC($IDOP);

  $TOTALNETOIND = $ARRATDINDUSTRIALTOTALPROCESO[0]['NETO'];
  $TOTALNETOINDV = $ARRATDINDUSTRIALTOTALPROCESO2[0]['NETO'];
  $TOTALNETOINDSC = $ARRATDINDUSTRIALTOTALSC[0]['NETO'];
  $TOTALNETOINDNC = $ARRATDINDUSTRIALTOTALNC[0]['NETO'];

  $ARRAYDEXPORTACIONTOTALPROCESO = $DPEXPORTACION_ADO->obtenerTotales($IDOP);
  $ARRAYDEXPORTACIONTOTALPROCES2 = $DPEXPORTACION_ADO->obtenerTotales2($IDOP);
  $TOTALENVASEEX = $ARRAYDEXPORTACIONTOTALPROCESO[0]['ENVASE'];
  $TOTALNETOEX = $ARRAYDEXPORTACIONTOTALPROCESO[0]['NETO'];
  $TOTALBRUTOEX = $ARRAYDEXPORTACIONTOTALPROCESO[0]['BRUTO'];
  $TOTALDESHIDRATACIONEX = $ARRAYDEXPORTACIONTOTALPROCESO[0]['DESHIDRATACION'];

  $TOTALENVASEEXV = $ARRAYDEXPORTACIONTOTALPROCES2[0]['ENVASE'];
  $TOTALNETOEXV = $ARRAYDEXPORTACIONTOTALPROCES2[0]['NETO'];
  $TOTALBRUTOEXV = $ARRAYDEXPORTACIONTOTALPROCES2[0]['BRUTO'];
  $TOTALDESHIDRATACIONEXV = $ARRAYDEXPORTACIONTOTALPROCES2[0]['DESHIDRATACION'];



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


  $IDUSUARIOI = $ARRAYPROCESO[0]['ID_USUARIOI'];
  $ARRAYUSUARIO2 = $USUARIO_ADO->ObtenerNombreCompleto($IDUSUARIOI);
  $NOMBRERESPONSABLE = $ARRAYUSUARIO2[0]["NOMBRE_COMPLETO"];

  $ARRAYPLANTA = $PLANTA_ADO->verPlanta($ARRAYPROCESO[0]['ID_PLANTA']);
  $ARRAYEMPRESA = $EMPRESA_ADO->verEmpresa($ARRAYPROCESO[0]['ID_EMPRESA']);
  $ARRAYTEMPORADA = $TEMPORADA_ADO->verTemporada($ARRAYPROCESO[0]['ID_TEMPORADA']);
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
    <title>Informe Proceso</title>
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
        INFORME PROCESO 
        <br>
        <b> Número Proceso: ' . $NUMEROPROCESO . '</b>
      </h2>
      <div id="details" class="clearfix">
        
        <div id="invoice">
          <div class="date"><b>Código BRC: </b>REP-PROC </div>    
          <div class="date"><b>Fecha Proceso: </b>' . $FECHAPROCESO . ' </div>    
          <div class="date"><b>Empresa: </b>' . $EMPRESA . '</div>   
          <div class="date"><b>Planta: </b>' . $PLANTA . '</div>
          <div class="date"><b>Temporada: </b>' . $TEMPORADA . '</div>
        </div>

        <div id="client">
         
          <div class="address"><b>Estado Proceso: </b> ' . $ESTADO . ' </div>
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
            <th colspan="9" class="center">INGRESO.</th>
          </tr>
          <tr>
            <th class="color left">Folio</th>
            <th class="color center">Fecha Ingreso</th>
            <th class="color center">Código Estandar</th>
            <th class="color center">Envase/Estandar</th>
            <th class="color center">Cant. Envase</th>
            <th class="color center">Kilos Neto</th>
            <th class="color center ">Variedad </th>
            <th class="color center ">Número Recepción </th>
            <th class="color center ">Número Guía </th>
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
  $ARRAYEVERERECEPCIONID = $ERECEPCION_ADO->verEstandar($r['ID_ESTANDAR']);  
  if($ARRAYEVERERECEPCIONID){
    $CODIGOESTANDAR=$ARRAYEVERERECEPCIONID[0]['CODIGO_ESTANDAR'];
    $NOMBREESTANDAR=$ARRAYEVERERECEPCIONID[0]['NOMBRE_ESTANDAR'];
  }else{    
    $CODIGOESTANDAR = "Sin Datos";
    $NOMBREESTANDAR = "Sin Datos";
  }
  
  $ARRAYRECEPCION = $RECEPCIONMP_ADO->verRecepcion2($r['ID_RECEPCION']);
  if ($ARRAYRECEPCION) {
      $NUMERORECEPCION = $ARRAYRECEPCION[0]["NUMERO_RECEPCION"];
      $NUMEROGUIARECEPCION = $ARRAYRECEPCION[0]["NUMERO_GUIA_RECEPCION"];                                                         
  } else {
      $NUMERORECEPCION = "Sin Datos";
      $NUMEROGUIARECEPCION = "Sin Datos";
  }

  $html = $html . '    
            <tr>
                <th class=" left">' . $r['FOLIO_AUXILIAR_EXIMATERIAPRIMA'] . '</th>
                <td class=" center">' . $r['COSECHA'] . '</td>
                <td class=" center">' . $CODIGOESTANDAR . '</td>
                <td class=" center">' . $NOMBREESTANDAR . '</td>
                <td class=" center">' . $r['ENVASE'] . '</td>
                <td class=" center">' . $r['NETO'] . '</td>
                <td class=" center ">' . $NOMBREVARIEDAD . ' </td>
                <td class=" center ">' . $NUMERORECEPCION . ' </td>
                <td class=" center ">' . $NUMEROGUIARECEPCION . ' </td>
            </tr>
';

endforeach;

$html = $html . '
    
        <tr>
            <th class="color left"></th>
            <th class="color center"></th>
            <th class="color center"></th>
            <th class="color right">Sub Total</th>
            <th class="color center"> ' . $TOTALENVASEEV . '</th>
            <th class="color center"> ' . $TOTALNETOEV . '</th>
            <th class="color center "> </th>
            <th class="color center "> </th>
            <th class="color center "> </th>
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
            <th colspan="13" class="center">SALIDA.</th>
            </tr>
          <tr>
            <th colspan="13" class="center">PRODUCTO TERMINADO.</th>
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
            <th class="color center">%</th>
            <th class="color center">Embolsado</th>
            <th class="color center">Calibre</th>
            <th class="color center">Categoria</th>
            <th class="color center ">Variedad </th>
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
  $ARRAYEVEEXPORTACIONID = $EEXPORTACION_ADO->verEstandar($r['ID_ESTANDAR']);
  if($ARRAYEVEEXPORTACIONID){
    $CODIGOESTANDAR=$ARRAYEVEEXPORTACIONID[0]['CODIGO_ESTANDAR'];
    $NOMBREESTANDAR=$ARRAYEVEEXPORTACIONID[0]['NOMBRE_ESTANDAR'];
  }else{    
    $CODIGOESTANDAR = "Sin Datos";
    $NOMBREESTANDAR = "Sin Datos";
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
  if ($TOTALSALIDASF > 0) {
    $NETOEXPOR = number_format(($r['KILOS_DESHIDRATACION_DPEXPORTACION'] / $TOTALNETOE) * 100, 2, ",", ".");
  } else {
    $NETOEXPOR = 0;
  }
  $NETOINDU = 0;


  $html = $html . '    
        <tr>
            <th class=" left"> ' . $r['FOLIO_DPEXPORTACION'] . '</th>
            <td class=" center"> ' . $r['EMBALADO'] . '</td>
            <td class=" center"> ' . $CODIGOESTANDAR . '</td>
            <td class=" center"> ' . $NOMBREESTANDAR . '</td>
            <td class=" center">' . $r['ENVASE'] . ' </td>
            <td class=" center"> ' . $r['NETO'] . '</td>
            <td class=" center"> ' . $r['PORCENTAJE'] .   '%</td>
            <td class=" center "> ' . $r['DESHIDRATACION'] . ' </td>
            <td class=" center"> ' . $NETOEXPOR . '%</td>
            <td class=" center "> ' . $EMBOLSADO . ' </td>
            <td class=" center "> ' . $NOMBRETCALIBRE . ' </td>
            <td class=" center "> ' . $NOMBRETCATEGORIA . ' </td>
            <td class=" center "> ' . $NOMBREVARIEDAD . ' </td>
        </tr>
        ';
endforeach;
$html = $html . '    
            <tr>
                <th class="color left"> </th>
                <th class="color center"> </th>
                <th class="color center"> </th>
                
                <th class="color right">Sub Total </th>
                <th class="color center"> ' . $TOTALENVASEEXV . '</th>
                
                <th class="color center "> ' . $TOTALNETOEX . ' </th>
                <th class="color center"> </th>
                <th class="color center "> ' . $TOTALDESHIDRATACIONEXV . ' </th>
                <th class="color center "> ' . number_format($PEXPORTACIONEXPOEXDESHI, 2, ",", ".") . '% </th>
                <th class="color center ">  </th>
                <th class="color center ">  </th>
                <th class="color center ">  </th>
                <th class="color center ">  </th>
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
            <th colspan="6" class="center">PRODUCTO INDUSTRIAL/DIFERENCIA</th>
          </tr>
          <tr>
            <th class="color left">Folio</th>
            <th class="color center">Fecha Embalado</th>
            <th class="color center">Código Estandar</th>
            <th class="color center">Envase/Estandar</th>
            
            <th class="color center">Kilos Neto</th>
            <th class="color center">%</th>
            <th class="color center">Variedad </th>
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
    $NETOINDU = number_format(($r['KILOS_NETO_DPINDUSTRIAL'] / $TOTALNETOE) * 100, 2, ",", ".");
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
            <th class=" left"> ' . $r['FOLIO_DPINDUSTRIAL'] . '</th>
            <td class=" center"> ' . $r['EMBALADO'] . '</td>
            <td class=" center"> ' . $CODIGOESTANDAR . '</td>
            <td class=" center"> ' . $NOMBREESTANDAR . '</td>
           
            <td class=" center"> ' . $r['NETO'] . '</td>
            <td class=" center"> ' . $NETOINDU . '%</td>
            <td class=" center "> ' . $NOMBREVARIEDAD . ' </td>
        </tr>
        ';

endforeach;
$html = $html . '    
        <tr>
            <th class="color left"> </th>
            <th class="color center"> </th>
            <th class="color center"> </th>
            
            <th class="color right">Sub Total </th>
            <th class="color center"> ' . $TOTALNETOINDV . '</th>
            <th class="color center "> ' . number_format($PDINDUSTRIAL, 2, ",", ".") . '% </th>
            <th class="color center ">  </th>
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
$NOMBREARCHIVO = "InformeProceso_";
$FECHADOCUMENTO = $FECHANORMAL . "_" . $HORAFINAL;
$TIPODOCUMENTO = "INFORME";
$FORMATO = ".pdf";
$NOMBREARCHIVOFINAL = $NOMBREARCHIVO . $FECHADOCUMENTO . $FORMATO;

//CONFIGURACIOND DEL DOCUMENTO
$TIPOPAPEL = "LETTER";
$ORIENTACION = "P";
$LENGUAJE = "ES";
$UNICODE = "true";
$ENCODING = "UTF-8";

//DETALLE DEL CREADOR DEL INFORME
$TIPOINFORME = "INFORME PROCESO";
$CREADOR = "USUARIO";
$AUTOR = "USUARIO";
$ASUNTO = "INFORME";
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
