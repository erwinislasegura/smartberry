<?php

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES 
include_once '../../assest/controlador/TUSUARIO_ADO.php';
include_once '../../assest/controlador/USUARIO_ADO.php';
include_once '../../assest/controlador/EMPRESA_ADO.php';
include_once '../../assest/controlador/PLANTA_ADO.php';
include_once '../../assest/controlador/TEMPORADA_ADO.php';

include_once '../../assest/controlador/VESPECIES_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/EEXPORTACION_ADO.php';

include_once '../../assest/controlador/CONDUCTOR_ADO.php';
include_once '../../assest/controlador/TRANSPORTE_ADO.php';
include_once '../../assest/controlador/EXIEXPORTACION_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/COMPRADOR_ADO.php';
include_once '../../assest/controlador/TCALIBRE_ADO.php';

include_once '../../assest/controlador/DESPACHOPT_ADO.php';
include_once '../../assest/controlador/EXIEXPORTACION_ADO.php';


include_once '../../assest/controlador/PAIS_ADO.php';
include_once '../../assest/controlador/REGION_ADO.php';
include_once '../../assest/controlador/PROVINCIA_ADO.php';
include_once '../../assest/controlador/COMUNA_ADO.php';
include_once '../../assest/controlador/CIUDAD_ADO.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$TUSUARIO_ADO = new TUSUARIO_ADO();
$USUARIO_ADO = new USUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();

$VESPECIES_ADO =  new VESPECIES_ADO();
$PRODUCTOR_ADO = new PRODUCTOR_ADO();
$EEXPORTACION_ADO =  new EEXPORTACION_ADO();

$TRANSPORTE_ADO =  new TRANSPORTE_ADO();
$CONDUCTOR_ADO =  new CONDUCTOR_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$COMPRADOR_ADO =  new COMPRADOR_ADO();
$TCALIBRE_ADO =  new TCALIBRE_ADO();

$DESPACHOPT_ADO =  new DESPACHOPT_ADO();
$EXIEXPORTACION_ADO =  new EXIEXPORTACION_ADO();



$PAIS_ADO =  new PAIS_ADO();
$REGION_ADO =  new REGION_ADO();
$PROVINCIA_ADO =  new PROVINCIA_ADO();
$COMUNA_ADO =  new COMUNA_ADO();
$CIUDAD_ADO =  new CIUDAD_ADO();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$NUMERODESPACHO = "";
$EMPRESA = "";
$EMPRESAURL = "";
$FECHA = "";
$FECHAINGRESO = "";
$FECHAMODIFCACION = "";
$EMPRESA = "";
$PLANTA = "";
$PLANTA2 = "";
$PLANTA3 = "";
$TEMPORADA = "";
$NUMEROSELLO = "";
$NUMEROGUIA = "";
$TDESPACHO = "";
$TRANSPORTE = "";
$PATENTECAMION = "";
$PATENTECARRO = "";
$CONDUCTOR = "";
$PRODUCTOR = "";
$COMPRADOR = "";
$REGALO = "";
$PRECIOPALLET = "";
$TOTALPALLET = "";

$TOTALENVASE = "";
$TOTALNETO = "";
$NUMERO = "";

$IDOP = "";
$OP = "";

//INICIALIZAR ARREGLOS
$ARRAYEMPRESA = "";
$ARRAYPLANTA = "";
$ARRAYTEMPORADA = "";
$ARRAYDESPACHO = "";
$ARRAYEXISTENCIATOMADA = "";

$ARRAYTRANSPORTE = "";
$ARRAYCONDUCTOR = "";
$ARRAYCOMPRADOR = "";
$ARRAYPRODUCTOR = "";
$ARRAYPLANTA2 = "";
$ARRAYPLANTA3 = "";
$ARRAYUSUARIO="";
$ARRAYCALIBRE="";

$ARRAYVERPRODUCTORID = "";
$ARRAYVERVESPECIESID = "";
$ARRAYEVERERECEPCIONID = "";

if (isset($_REQUEST['usuario'])) {
  $USUARIO = $_REQUEST['usuario'];
  $ARRAYUSUARIO = $USUARIO_ADO->ObtenerNombreCompleto($USUARIO);
  $NOMBRE = $ARRAYUSUARIO[0]["NOMBRE_COMPLETO"];
}


if (isset($_REQUEST['parametro'])) {
  $IDOP = $_REQUEST['parametro'];
  $NUMERODESPACHO = $IDOP;
}
$ARRAYDESPACHO = $DESPACHOPT_ADO->verDespachopt3($IDOP);
if($ARRAYDESPACHO){

  $ARRAYDESPACHOTOTAL = $DESPACHOPT_ADO->obtenerTotalesDespachoptPorDespachoCBX2($IDOP);

  $ARRAYDESPACHOTOTAL2 = $EXIEXPORTACION_ADO->obtenerTotalesDespacho2($IDOP);
  $ARRAYEXISTENCIATOMADA = $EXIEXPORTACION_ADO->buscarPordespacho2($IDOP);  
  $TOTALENVASE = $ARRAYDESPACHOTOTAL2[0]['ENVASE'];
  $TOTALNETO = $ARRAYDESPACHOTOTAL2[0]['NETO'];
  $TOTALPRECIO = $ARRAYDESPACHOTOTAL2[0]['TOTAL_PRECIO'];

  
  $ARRAYEXIEXPORTACIONBOLSA = $EXIEXPORTACION_ADO->buscarExistenciaDespachoInspeccion2($IDOP);
  $ARRAYEXIEXPORTACIONBOLSATOTAL = $EXIEXPORTACION_ADO->obtenerTotalesExistenciaBolsaDespachoe2($IDOP);
  $TOTALENVASEBOLSA = $ARRAYEXIEXPORTACIONBOLSATOTAL[0]['ENVASE'];
  $TOTALNETOBOLSA= $ARRAYEXIEXPORTACIONBOLSATOTAL[0]['NETO'];
  
  
  $NUMERO = $ARRAYDESPACHO[0]['NUMERO_DESPACHO'];
  $FECHA = $ARRAYDESPACHO[0]['FECHA'];
  $FECHAINGRESO = $ARRAYDESPACHO[0]['INGRESO'];
  $FECHAMODIFCACION = $ARRAYDESPACHO[0]['MODIFICACION'];
  $TDESPACHO = $ARRAYDESPACHO[0]['TDESPACHO'];
  $PATENTECAMION = $ARRAYDESPACHO[0]['PATENTE_CAMION'];
  $PATENTECARRO = $ARRAYDESPACHO[0]['PATENTE_CARRO'];
  $OBSERVACIONES = $ARRAYDESPACHO[0]['OBSERVACION_DESPACHO'];
  
  $ESTADO = $ARRAYDESPACHO[0]['ESTADO'];
  if ($ARRAYDESPACHO[0]['ESTADO'] == 1) {
    $ESTADO = "Abierto";
  }else if ($ARRAYDESPACHO[0]['ESTADO'] == 0) {
    $ESTADO = "Cerrado";
  }else{
    $ESTADO="Sin Datos";
  }  
  
  
  $IDUSUARIOI = $ARRAYDESPACHO[0]['ID_USUARIOI'];  
  $ARRAYUSUARIO2 = $USUARIO_ADO->ObtenerNombreCompleto($IDUSUARIOI);
  $NOMBRERESPONSABLE = $ARRAYUSUARIO2[0]["NOMBRE_COMPLETO"];
  
  
  if ($TDESPACHO == "1") {
    $TDESPACHON = "Interplanta";
    $NUMEROGUIA = $ARRAYDESPACHO[0]['NUMERO_GUIA_DESPACHO'];
    $NUMEROSELLO = $ARRAYDESPACHO[0]['NUMERO_SELLO_DESPACHO'];
    $ARRAYPLANTA2 = $PLANTA_ADO->verPlanta($ARRAYDESPACHO[0]['ID_PLANTA2']);
    if ($ARRAYPLANTA2) {
      $DESTINO = $ARRAYPLANTA2[0]['NOMBRE_PLANTA'];
    } else {
      $DESTINO = "Sin Datos";
    }
  }
  if ($TDESPACHO == "2") {
    $TDESPACHON = "Devolución Productor";
    $NUMEROGUIA = $ARRAYDESPACHO[0]['NUMERO_GUIA_DESPACHO'];
    $NUMEROSELLO = $ARRAYDESPACHO[0]['NUMERO_SELLO_DESPACHO'];
    $ARRAYPRODUCTOR = $PRODUCTOR_ADO->verProductor($ARRAYDESPACHO[0]['ID_PRODUCTOR']);
    if ($ARRAYPRODUCTOR) {
      $CODIGOPRODUCTOR = $ARRAYPRODUCTOR[0]['CODGIGO_PRODUCTOR'];
      $DESTINO = $ARRAYPRODUCTOR[0]['NOMBRE_PRODUCTOR'];
    } else {
      $CODIGOPRODUCTOR = "";
      $DESTINO = "";
    }
  }
  if ($TDESPACHO == "3") {
    $TDESPACHON = "Venta";
    $NUMEROGUIA = $ARRAYDESPACHO[0]['NUMERO_GUIA_DESPACHO'];
    $NUMEROSELLO = $ARRAYDESPACHO[0]['NUMERO_SELLO_DESPACHO'];
    $ARRAYCOMPRADOR = $COMPRADOR_ADO->verComprador($ARRAYDESPACHO[0]['ID_COMPRADOR']);
    if ($ARRAYCOMPRADOR) {
      $DESTINO = $ARRAYCOMPRADOR[0]['NOMBRE_COMPRADOR'];
    } else {
      $DESTINO = "";
    }
  }
  if ($TDESPACHO == "4") {
    $TDESPACHON = "Despacho de Descarte(R)";
    $NUMEROGUIA = "No Aplica";
    $NUMEROSELLO = "No Aplica";
    $DESTINO = $ARRAYDESPACHO[0]['REGALO_DESPACHO'];
  }
  if ($TDESPACHO == "5") {
    $TDESPACHON = "Planta Externa";
    $NUMEROGUIA = $ARRAYDESPACHO[0]['NUMERO_GUIA_DESPACHO'];
    $NUMEROSELLO = $ARRAYDESPACHO[0]['NUMERO_SELLO_DESPACHO'];
    $ARRAYPLANTA3= $PLANTA_ADO->verPlanta($ARRAYDESPACHO[0]['ID_PLANTA3']);
    if ($ARRAYPLANTA3) {
      $DESTINO = $ARRAYPLANTA3[0]['NOMBRE_PLANTA'];
    } else {
      $DESTINO = "";
    }
  } 
  
  
  $ARRAYTRANSPORTE = $TRANSPORTE_ADO->verTransporte($ARRAYDESPACHO[0]['ID_TRANSPORTE']);
  $ARRAYCONDUCTOR = $CONDUCTOR_ADO->verConductor($ARRAYDESPACHO[0]['ID_CONDUCTOR']);;
  
  $TRANSPORTE = $ARRAYTRANSPORTE[0]['NOMBRE_TRANSPORTE'];
  $CONDUCTOR = $ARRAYCONDUCTOR[0]['NOMBRE_CONDUCTOR'];
  
  $ARRAYPLANTA = $PLANTA_ADO->verPlanta($ARRAYDESPACHO[0]['ID_PLANTA']);
  $ARRAYTEMPORADA = $TEMPORADA_ADO->verTemporada($ARRAYDESPACHO[0]['ID_TEMPORADA']);
  $ARRAYEMPRESA = $EMPRESA_ADO->verEmpresa($ARRAYDESPACHO[0]['ID_EMPRESA']);
  
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


$html = '<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Informe Despacho</title>
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
        INFORME DESPACHO PRODUCTO TERMINADO
        <br>
        <b> Número Despacho: ' . $NUMERO . '</b>
      </h2>
      <div id="details" class="clearfix">
        
      <div id="invoice">
        <div class="date"><b>Código BRC: </b>REP-DESPPT </div>  
        <div class="date"><b>Fecha Despacho: </b>' . $FECHA . ' </div>
        <div class="date"><b>Empresa: </b>' . $EMPRESA . '  </div>
        <div class="date"><b>Planta: </b>' . $PLANTA . '  </div>
        <div class="date"><b>Temporada: </b>' . $TEMPORADA . '  </div>
      </div>


        <div id="client">
          <div class="address"><b>Número Guía:  </b>' . $NUMEROGUIA . '</div>
          <div class="address"><b>Número Sello:  </b>' . $NUMEROSELLO . '</div>
          <div class="address"><b>Tipo Despacho:  </b>' . $TDESPACHON . '</div>
          ';
if ($TDESPACHO == "1") {
  $html .= '
            <div class="address"><b>Planta Destino:  </b>' . $DESTINO . '</div>
            ';
}
if ($TDESPACHO == "2") {
  $html .= '
            <div class="address"><b>CSG:  </b>' . $CODIGOPRODUCTOR . '</div>
            <div class="address"><b>Productor Destino:  </b>' . $DESTINO . '</div>
            ';
}
if ($TDESPACHO == "3") {
  $html .= '
            <div class="address"><b>Comprador Destino:  </b>' . $DESTINO . '</div>
            ';
}
if ($TDESPACHO == "4") {
  $html .= '
            <div class="address"><b>Destino:  </b>' . $DESTINO . '</div>
            ';
}
if ($TDESPACHO == "5") {
  $html .= '
            <div class="address"><b>Planta Destino:  </b>' . $DESTINO . '</div>
            ';
}



        $html = $html . '
        <div class="address"><b>Estado Despacho: </b> ' . $ESTADO . ' </div>
    </div>        
  </div>
        <table border="0" cellspacing="0" cellpadding="0">
          <thead>
            <tr>
              <th colspan="7" class="center">RESUMEN.</th>
            </tr>
            <tr>
              <th class="color left">CSG</th>
              <th class="color center ">Nombre Productor </th>
              <th class="color center ">Comuna </th>
              <th class="color center ">Provincia </th>
              <th class="color center ">Variedad </th>
              <th class="color center ">Cantidad Envases </th>
              <th class="color center ">Kilos Neto </th>
            </tr>
          </thead>
           <tbody>
  ';
  
  foreach ($ARRAYEXIEXPORTACIONBOLSA as $a) :
  
    $ARRAYEXIEXPORTACIONPRODUCTOR = $EXIEXPORTACION_ADO->buscarExistenciaBolsaDespacho2DiferenciadoProductor($IDOP, $a['ID_PRODUCTOR']);
    $ARRAYEXIEXPORTACIONPRODUCTORTOTAL = $EXIEXPORTACION_ADO->obtenerTotalesExistenciaBolsaDespachoenDiferenciadoProductor2($IDOP, $a['ID_PRODUCTOR']);
    $TOTALENVASEPRODUCTOR = $ARRAYEXIEXPORTACIONPRODUCTORTOTAL[0]['ENVASE'];
    $TOTALNETOPRODUCTOR = $ARRAYEXIEXPORTACIONPRODUCTORTOTAL[0]['NETO'];
  
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
  
  
          $ARRAYEXIEXPORTACIONBOLSA3 = $EXIEXPORTACION_ADO->buscarExistenciaBolsaDespacho2ProductorEstandarDiferenciadoProductorVariedad($IDOP, $b['ID_PRODUCTOR']);
          foreach ($ARRAYEXIEXPORTACIONBOLSA3 as $e) :
  
            $ARRAYEXIEXPORTACIONPRODUCTORESTANDARPVARIEDAD = $EXIEXPORTACION_ADO->buscarExistenciaBolsaDespachoe2ProductorVariedadDiferenciadoProductorVariedad($IDOP, $e['ID_PRODUCTOR'], $e['ID_VESPECIES']);
            $ARRAYEXIEXPORTACIONPRODUCTORESTANDARPVARIEDADTOTAL = $EXIEXPORTACION_ADO->obtenerTotalesExistenciaBolsaDespachoe2ProductorVariedadDiferenciadoProductorVariedad($IDOP, $e['ID_PRODUCTOR'], $e['ID_VESPECIES']);
            $TOTALENVASEVARIEDAD = $ARRAYEXIEXPORTACIONPRODUCTORESTANDARPVARIEDADTOTAL[0]['ENVASE'];
            $TOTALNETOVARIEDAD = $ARRAYEXIEXPORTACIONPRODUCTORESTANDARPVARIEDADTOTAL[0]['NETO'];
            foreach ($ARRAYEXIEXPORTACIONPRODUCTORESTANDARPVARIEDAD as $f) :
  
              $ARRAYVESPECIES = $VESPECIES_ADO->verVespecies($f['ID_VESPECIES']);
              $NOMBREVARIEDAD = $ARRAYVESPECIES[0]["NOMBRE_VESPECIES"];
  
              $html = $html . '              
              <tr >
                  <td class="left">' .  $CSGPRODUCTOR . '</td>
                  <td class="center">' . $NOMBREPRODUCTOR . '</td>
                  <td class="center">' . $COMUNAPRODUCTOR . '</td>
                  <td class="center">' . $PROVINCIAPRODUCTOR . '</td>
                  <td class="center">' . $NOMBREVARIEDAD . '</td>
                  <th class="center">' . $TOTALENVASEVARIEDAD . '</th>
                  <th class="center">' . $TOTALNETOVARIEDAD . '</th>
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
        <th class="color2 right"> Total Productor </th>
        <th class="color2 center">' . $TOTALENVASEPRODUCTOR . '</th>
        <th class="color2 center">' . $TOTALNETOPRODUCTOR . '</th>
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
      <th class="color center">' . $TOTALENVASEBOLSA . '</th>
      <th class="color center">' . $TOTALNETOBOLSA . '</th>
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
          <div class="address"><b>Informacion De Transporte</b></div>
          <div class="address">Empresa Transporte:  ' . $TRANSPORTE . ' </div>
          <div class="address">Conductor: ' . $CONDUCTOR . '</div>
          <div class="address">Patente Camión: ' . $PATENTECAMION . '</div>
          <div class="address">Patente Carro: ' . $PATENTECARRO . '</div>
        </div>
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
$NOMBREARCHIVO = "InformeDespachoexComercial_";
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
$TIPOINFORME = "Informe Despacho Exportación Comercial";
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
