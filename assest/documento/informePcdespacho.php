<?php

session_start();
//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES 
include_once '../../assest/controlador/TUSUARIO_ADO.php';
include_once '../../assest/controlador/USUARIO_ADO.php';
include_once '../../assest/controlador/EMPRESA_ADO.php';
include_once '../../assest/controlador/PLANTA_ADO.php';
include_once '../../assest/controlador/TEMPORADA_ADO.php';



include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/VESPECIES_ADO.php';
include_once '../../assest/controlador/PROCESO_ADO.php';
include_once '../../assest/controlador/EEXPORTACION_ADO.php';
include_once '../../assest/controlador/FOLIO_ADO.php';
include_once '../../assest/controlador/INPSAG_ADO.php';
include_once '../../assest/controlador/PAIS_ADO.php';


include_once '../../assest/controlador/EXIEXPORTACION_ADO.php';
include_once '../../assest/controlador/PCDESPACHO_ADO.php';
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
$FOLIO_ADO =  new FOLIO_ADO();
$INPSAG_ADO =  new INPSAG_ADO();
$PAIS_ADO =  new PAIS_ADO();

$EEXPORTACION_ADO =  new EEXPORTACION_ADO();
$PCDESPACHO_ADO =  new PCDESPACHO_ADO();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$NUMEROPCDESPACHO = "";
$EMPRESA = "";
$EMPRESAURL = "";
$FECHAINGRESO = "";
$FECHAMODIFCACION = "";
$MOTIVO = "";
$TOTALENVASE = "";
$TOTALNETO = "";
$NUMERO = "";
$NOMBRECONDICION = "";
$NOMBRE="";
$PAISES = "";

$IDOP = "";
$OP = "";

//INICIALIZAR ARREGLOS
$ARRAYEMPRESA = "";
$ARRAYPCDESPACHO = "";
$ARRAYEXISTENCIATOMADA = "";

$ARRAYVERPRODUCTORID = "";
$ARRAYVERVESPECIESID = "";
$ARRAYEVERERECEPCIONID = "";
$ARRAYTESTADOSAG = "";
$ARRAYINPSAG = "";
$ARRAYPAIS = "";
$ARRAYUSUARIO = "";
if (isset($_REQUEST['usuario'])) {
  $USUARIO = $_REQUEST['usuario'];
  $ARRAYUSUARIO = $USUARIO_ADO->ObtenerNombreCompleto($USUARIO);
  $NOMBRE = $ARRAYUSUARIO[0]["NOMBRE_COMPLETO"];
}

if (isset($_REQUEST['parametro'])) {
  $IDOP = $_REQUEST['parametro'];
  $NUMEROPCDESPACHO = $IDOP;
}
$ARRAYPCDESPACHO = $PCDESPACHO_ADO->verPcdespacho2($NUMEROPCDESPACHO);
if($ARRAYPCDESPACHO){
  $ARRAYEXISTENCIATOMADA = $EXIEXPORTACION_ADO->buscarPorPcdespacho2($NUMEROPCDESPACHO);
  $ARRAYEXISTENCIATOMADATOTAL = $EXIEXPORTACION_ADO->obtenerTotalesPorPcdespacho2($NUMEROPCDESPACHO);
  $TOTALENVASE = $ARRAYEXISTENCIATOMADATOTAL[0]['ENVASE'];
  $TOTALNETO = $ARRAYEXISTENCIATOMADATOTAL[0]['NETO'];

  $ARRAYEMPRESA = $EMPRESA_ADO->verEmpresa($ARRAYPCDESPACHO[0]['ID_EMPRESA']);
  
  $NUMERO = $ARRAYPCDESPACHO[0]['NUMERO_PCDESPACHO'];
  $FECHAINGRESO = $ARRAYPCDESPACHO[0]['INGRESO'];
  $FECHAMODIFCACION = $ARRAYPCDESPACHO[0]['MODIFICACION'];
  $MOTIVO = $ARRAYPCDESPACHO[0]['MOTIVO_PCDESPACHO'];
  $OBSERVACIONES = $ARRAYPCDESPACHO[0]['MOTIVO_PCDESPACHO'];
  $ESTADO = $ARRAYPCDESPACHO[0]['ESTADO'];
  if ($ARRAYPCDESPACHO[0]['ESTADO'] == 1) {
    $ESTADO = "Abierto";
  }else if ($ARRAYPCDESPACHO[0]['ESTADO'] == 0) {
    $ESTADO = "Cerrado";
  }else{
    $ESTADO="Sin Datos";
  }  
  
  
  $IDUSUARIOI = $ARRAYPCDESPACHO[0]['ID_USUARIOI'];  
  $ARRAYUSUARIO2 = $USUARIO_ADO->ObtenerNombreCompleto($IDUSUARIOI);
  $NOMBRERESPONSABLE = $ARRAYUSUARIO2[0]["NOMBRE_COMPLETO"];
  
  
  
  //$TOTALENVASEREPA=$ARRAYDREPALETIZAJETOTALES[0]['TOTAL_ENVASE'];
  //$TOTALNETOREPA=$ARRAYDREPALETIZAJETOTALES[0]['TOTAL_NETO'];
  
  $ARRAYPLANTA = $PLANTA_ADO->verPlanta($ARRAYPCDESPACHO[0]['ID_PLANTA']);
  $ARRAYTEMPORADA = $TEMPORADA_ADO->verTemporada($ARRAYPCDESPACHO[0]['ID_TEMPORADA']);
  
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
$FECHANORMAL2 = $DIA . "" . $MES . "" . $ANO;
$FECHANOMBRE = $NOMBREDIA . ", " . $DIA . " de " . $NOMBREMES . " del " . $ANO;





//ESCTRUTURA DEL DOCUMENTO

$html = '
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Informe Planificador Carga</title>
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
        INFORME PLANIFICADOR CARGA<br>
        <b> Número PC: ' . $NUMEROPCDESPACHO . '</b>
      </h2>
      <div id="details" class="clearfix">
        
        <div id="invoice">
          <div class="date"><b>Código BRC: </b>REP-PLANC </div>  
          <div class="date"><b>Empresa: </b>' . $EMPRESA . '  </div>
          <div class="date"><b>Planta: </b>' . $PLANTA . '  </div>
          <div class="date"><b>Temporada: </b>' . $TEMPORADA . '  </div>
        </div>

        <div id="client">
          <div class="address"><b>Fecha Ingreso:  </b>' . $FECHAINGRESO . '</div>
          <div class="address"><b>Motivo Planificador Carga: </b>' . $MOTIVO . '</div>
          <div class="address"><b>Estado Planificador Carga: </b> ' . $ESTADO . ' </div>
        </div>        
      </div>
    <table border="0" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th colspan="11" class="center">SELECCIÓN </th>
                </tr>
                <tr>
                    <th class="color left">Folio</th>
                    <th class="color center">Fecha Embalado</th>
                    <th class="color center">Código Estandar</th>
                    <th class="color center">Envase/Estandar</th>
                    <th class="color center ">CSG </th>
                    <th class="color center ">Productor </th>
                    <th class="color center">Variedad </th>
                    <th class="color center">CondiciÓn Sag</th>
                    <th class="color center">Cant. Envase</th>
                    <th class="color center">Kilos Neto</th>
                    <th class="color center">Paises</th>
                </tr>
            </thead>
            <tbody>
    ';
foreach ($ARRAYEXISTENCIATOMADA as $r) :

  $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);

  $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);

  $ARRAYEVERERECEPCIONID = $EEXPORTACION_ADO->verEstandar($r['ID_ESTANDAR']);
  $ARRAYINPSAG = $INPSAG_ADO->verInpsag($r['ID_INPSAG']);


  if ($ARRAYINPSAG) {
    if ($ARRAYINPSAG[0]['ID_PAIS1']) {
      $ARRAYPAIS = $PAIS_ADO->verPais($ARRAYINPSAG[0]['ID_PAIS1']);
      $PAISES = "" . $ARRAYPAIS[0]['NOMBRE_PAIS'];
    }
    if ($ARRAYINPSAG[0]['ID_PAIS2']) {
      $ARRAYPAIS = $PAIS_ADO->verPais($ARRAYINPSAG[0]['ID_PAIS2']);
      $PAISES = $PAISES . ", " . $ARRAYPAIS[0]['NOMBRE_PAIS'];
    }
    if ($ARRAYINPSAG[0]['ID_PAIS3']) {
      $ARRAYPAIS = $PAIS_ADO->verPais($ARRAYINPSAG[0]['ID_PAIS3']);
      $PAISES = $PAISES . ", " . $ARRAYPAIS[0]['NOMBRE_PAIS'];
    }
    if ($ARRAYINPSAG[0]['ID_PAIS4']) {
      $ARRAYPAIS = $PAIS_ADO->verPais($ARRAYINPSAG[0]['ID_PAIS4']);
      $PAISES = $PAISES . ", " . $ARRAYPAIS[0]['NOMBRE_PAIS'];
    }
  }

  if ($r['TESTADOSAG'] == null || $r['TESTADOSAG'] == "0") {
    $ESTADOSAG = "Sin Condición";
  }
  if ($r['TESTADOSAG'] == "1") {
    $ESTADOSAG =  "En Inspección";
  }
  if ($r['TESTADOSAG'] == "2") {
    $ESTADOSAG =  "Aprobado Origen";
  }
  if ($r['TESTADOSAG'] == "3") {
    $ESTADOSAG =  "Aprobado USLA";
  }
  if ($r['TESTADOSAG'] == "4") {
    $ESTADOSAG =  "Fumigado";
  }
  if ($r['TESTADOSAG'] == "5") {
    $ESTADOSAG =  "Rechazado";
  }


  $html = $html . '
        <tr>
            <th class=" left">' . $r['FOLIO_AUXILIAR_EXIEXPORTACION'] . '</th>
            <td class=" center">' . $r['EMBALADO'] . '</td>
            <td class=" center">' . $ARRAYEVERERECEPCIONID[0]['CODIGO_ESTANDAR'] . '</td>
            <td class=" center">' . $ARRAYEVERERECEPCIONID[0]['NOMBRE_ESTANDAR'] . '</td>
            <td class=" center ">' . $ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'] . ' </td>
            <td class=" center ">' . $ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'] . ' </td>
            <td class=" center ">' . $ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'] . ' </td>
            <td class=" center">' . $ESTADOSAG . '</td>
            <td class=" center">' . $r['ENVASE'] . '</td>
            <td class=" center">' . $r['NETO'] . '</td>
            <td class=" center">' . $PAISES . '</td>
        </tr>
        ';
endforeach;
$html = $html . '
        <tr>
            <th class="color left">&nbsp;</th>
            <th class="color center">&nbsp;</th>
            <th class="color center ">&nbsp; </th>
            <th class="color center ">&nbsp; </th>
            <th class="color center ">&nbsp; </th>
            <th class="color center ">&nbsp; </th>
            <th class="color center ">&nbsp; </th>
            <th class="color right">Sub Total</th>
            <th class="color center">' . $TOTALENVASE . '</th>
            <th class="color center">' . $TOTALNETO . '</th>
            <th class="color center ">&nbsp; </th>
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
$NOMBREARCHIVO = "InformePlanificadorCarga_";
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
$TIPOINFORME = "Informe Planificador Carga";
$CREADOR = "Usuario";
$AUTOR = "Usuario";
$ASUNTO = "Informe";

//API DE GENERACION DE PDF
require_once '../../api/mpdf/mpdf/autoload.php';
//$PDF = new \Mpdf\Mpdf();W
$PDF = new \Mpdf\Mpdf(['format' => 'letter']);

//CONFIGURACION FOOTER Y HEADER DEL PDF//CONFIGURACION FOOTER Y HEADER DEL PDF
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
