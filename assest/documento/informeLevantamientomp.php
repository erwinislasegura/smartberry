<?php

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES 
include_once '../../assest/controlador/TUSUARIO_ADO.php';
include_once '../../assest/controlador/USUARIO_ADO.php';
include_once '../../assest/controlador/EMPRESA_ADO.php';
include_once '../../assest/controlador/PLANTA_ADO.php';
include_once '../../assest/controlador/TEMPORADA_ADO.php';

include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/ESPECIES_ADO.php';
include_once '../../assest/controlador/VESPECIES_ADO.php';
include_once '../../assest/controlador/TMANEJO_ADO.php';
include_once '../../assest/controlador/FOLIO_ADO.php';


include_once '../../assest/controlador/ERECEPCION_ADO.php';


include_once '../../assest/controlador/LEVANTAMIENTOMP_ADO.php';
include_once '../../assest/controlador/EXIMATERIAPRIMA_ADO.php';
include_once '../../assest/controlador/EXIINDUSTRIAL_ADO.php';



//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$TUSUARIO_ADO = new TUSUARIO_ADO();
$USUARIO_ADO = new USUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();

$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$ESPECIES_ADO =  new ESPECIES_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$TMANEJO_ADO =  new TMANEJO_ADO();
$FOLIO_ADO =  new FOLIO_ADO();


$EXIMATERIAPRIMA_ADO =  new EXIMATERIAPRIMA_ADO();
$EXIINDUSTRIAL_ADO =  new EXIINDUSTRIAL_ADO();
$ERECEPCION_ADO =  new ERECEPCION_ADO();

$LEVANTAMIENTOMP_ADO =  new LEVANTAMIENTOMP_ADO();



//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$NUMERO = "";
$NUMEROVER = "";
$IDLEVANTAMIENTO = "";
$FECHALEVANTAMIENTO = "";
$FECHAINGRESO = "";
$FECHAMODIFCIACION = "";

$TLEVANTAMIENTO = "";
$RESPONSBALE = "";
$MOTIVO = "";
$PRODUCTOR = "";
$VESPECIES = "";
$ESTADO = "";
$TLEVANTAMIENTOCOLOR="";


$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";

$TOTALBRUTO="";
$TOTALNETO="";
$TOTALENVASE="";


$IDOP = "";
$OP = "";

//INICIALIZAR ARREGLOS
$ARRAYEMPRESA = "";
$ARRAYLEVANTAMIENTO = "";
$ARRAYEXISTENCIATOMADA = "";
$ARRAYTRANSPORTE = "";
$ARRAYCONDUCTOR = "";
$ARRAYCOMPRADOR = "";

$ARRAYVERPRODUCTORID = "";
$ARRAYVERVESPECIESID = "";
$ARRAYEVERERECEPCIONID = "";
$ARRAYUSUARIO = "";

if (isset($_REQUEST['usuario'])) {
  $USUARIO = $_REQUEST['usuario'];
  $ARRAYUSUARIO = $USUARIO_ADO->ObtenerNombreCompleto($USUARIO);
  $NOMBRE = $ARRAYUSUARIO[0]["NOMBRE_COMPLETO"];
}






if (isset($_REQUEST['parametro'])) {
  $IDOP = $_REQUEST['parametro'];
  $NUMEROLEVANTAMIENTO = $IDOP;
}
$ARRAYLEVANTAMIENTO = $LEVANTAMIENTOMP_ADO->verLevantamiento2($NUMEROLEVANTAMIENTO);

if($ARRAYLEVANTAMIENTO){

  //$ARRAYDESPACHOTOTAL = $DESPACHOMP_ADO->obtenerTotalesDespachompCBX2($IDOP);


  $ARRAYEXISTENCIATOMADA = $EXIMATERIAPRIMA_ADO->verExistenciaPorLevantamiento2($NUMEROLEVANTAMIENTO);
  $ARRAYDESPACHOTOTAL = $EXIMATERIAPRIMA_ADO->obtenerTotalesLevantamiento2($NUMEROLEVANTAMIENTO);
  $TOTALENVASE = $ARRAYDESPACHOTOTAL[0]['ENVASE'];
  $TOTALNETO = $ARRAYDESPACHOTOTAL[0]['NETO'];
  $TOTALBRUTO = $ARRAYDESPACHOTOTAL[0]['BRUTO'];


  $NUMERO = $ARRAYLEVANTAMIENTO[0]['NUMERO_LEVANTAMIENTO'];
  $FECHA = $ARRAYLEVANTAMIENTO[0]['FECHA'];
  $FECHAINGRESO = $ARRAYLEVANTAMIENTO[0]['INGRESO'];
  $FECHAMODIFCACION = $ARRAYLEVANTAMIENTO[0]['MODIFICACION'];
  $RESPONSBALE = $ARRAYLEVANTAMIENTO[0]['RESPONSBALE_LEVANTAMIENTO'];
  $MOTIVO = $ARRAYLEVANTAMIENTO[0]['MOTIVO_LEVANTAMIENTO'];

  
  $ESTADO = $ARRAYLEVANTAMIENTO[0]['ESTADO'];
  if ($ARRAYLEVANTAMIENTO[0]['ESTADO'] == 1) {
    $ESTADO = "Abierto";
  }else if ($ARRAYLEVANTAMIENTO[0]['ESTADO'] == 0) {
    $ESTADO = "Cerrado";
  }else{
    $ESTADO="Sin Datos";
  }  
  
  

  

  $IDUSUARIOI = $ARRAYLEVANTAMIENTO[0]['ID_USUARIOI'];  
  $ARRAYUSUARIO2 = $USUARIO_ADO->ObtenerNombreCompleto($IDUSUARIOI);
  $NOMBRERESPONSABLE = $ARRAYUSUARIO2[0]["NOMBRE_COMPLETO"];


  if($ARRAYLEVANTAMIENTO[0]['TLEVANTAMIENTO'] == 1){
    $TLEVANTAMIENTO="Orden Comercial";
  }else if($ARRAYLEVANTAMIENTO[0]['TLEVANTAMIENTO'] == 2){
      $TLEVANTAMIENTO="Departamento de Calidad";
  }else if($ARRAYLEVANTAMIENTO[0]['TLEVANTAMIENTO'] == 3){
    $TLEVANTAMIENTO="Otros";
  }else{
      $TLEVANTAMIENTO="Sin Datos";
  }

  $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($ARRAYLEVANTAMIENTO[0]['ID_VESPECIES']);
  if ($ARRAYVERVESPECIESID) {
      $NOMBREVESPECIES = $ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'];   
  } else {
      $NOMBREVESPECIES = "Sin Datos";
  }
  $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($ARRAYLEVANTAMIENTO[0]['ID_PRODUCTOR']);
  if ($ARRAYVERPRODUCTORID) {

      $CSGPRODUCTOR = $ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'];
      $NOMBREPRODUCTOR = $ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'];
  } else {
      $CSGPRODUCTOR = "Sin Datos";
      $NOMBREPRODUCTOR = "Sin Datos";
  }


  $ARRAYPLANTA = $PLANTA_ADO->verPlanta($ARRAYLEVANTAMIENTO[0]['ID_PLANTA']);
  $ARRAYTEMPORADA = $TEMPORADA_ADO->verTemporada($ARRAYLEVANTAMIENTO[0]['ID_TEMPORADA']);
  $ARRAYEMPRESA = $EMPRESA_ADO->verEmpresa($ARRAYLEVANTAMIENTO[0]['ID_EMPRESA']);

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
$FECHANOMBRE = $NOMBREDIA . ", " . $DIA . " de " . $NOMBREMES . " del " . $ANO;





//ESCTRUTURA DEL DOCUMENTO

$html = '
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Informe Levantamiento Materia Prima </title>
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
        INFORME LEVANTAMIENTO MATERIA PRIMA
        <br>
        <b> Numero Levantamiento: ' . $NUMEROLEVANTAMIENTO . '</b>
      </h2>
      <div id="details" class="clearfix">
        
      <div id="invoice">
      <div class="date"><b>Fecha Levantamiento: </b>' . $FECHA . ' </div>
      <div class="date"><b>Empresa: </b>' . $EMPRESA . '  </div>
      <div class="date"><b>Planta: </b>' . $PLANTA . '  </div>
      <div class="date"><b>Temporada: </b>' . $TEMPORADA . '  </div>
    </div>


    <div id="client">
    <div class="address"><b>Tipo Levantamiento:  </b>' . $TLEVANTAMIENTO . '</div>
    <div class="address"><b>Estado Levantamiento:  </b>' . $ESTADO . '</div>
    <div class="address"><b>CSG:  </b>' . $CSGPRODUCTOR . '</div>
    <div class="address"><b>Nombre Productor:  </b>' . $NOMBREPRODUCTOR . '</div>
    <div class="address"><b>Variedad:  </b>' . $NOMBREVESPECIES . '</div>
    ';

$html .= '
  </div>        
</div>
    <table border="0" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th colspan="9" class="center">DETALLE </th>
                </tr>
                <tr>
                    <th class="color left">Folio</th>
                    <th class="color left">Fecha Cosecha</th>
                    <th class="color left">Codigo Estandar</th>
                    <th class="color left">Envase/Estandar</th>
                    <th class="color center">Cant. Envase</th>
                    <th class="color center">Kilos Neto</th>
                    <th class="color center">Kilos Bruto</th>
                    <th class="color center ">Variedad </th>
                    <th class="color center ">Tipo Manejo </th>
                </tr>
            </thead>
            <tbody>
    ';
foreach ($ARRAYEXISTENCIATOMADA as $r) :

  $ARRAYEVERERECEPCIONID = $ERECEPCION_ADO->verEstandar($r['ID_ESTANDAR']);
  if ($ARRAYEVERERECEPCIONID) {
      $CODIGOESTANDAR = $ARRAYEVERERECEPCIONID[0]['CODIGO_ESTANDAR'];
      $NOMBREESTANDAR = $ARRAYEVERERECEPCIONID[0]['NOMBRE_ESTANDAR'];
  } else {
      $CODIGOESTANDAR = "Sin Datos";
      $NOMBREESTANDAR = "Sin Datos";
  }
  $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
  if ($ARRAYVERVESPECIESID) {
      $NOMBREVESPECIES = $ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'];
      $ARRAYVERESPECIESID = $ESPECIES_ADO->verEspecies($ARRAYVERVESPECIESID[0]['ID_ESPECIES']);
      if ($ARRAYVERVESPECIESID) {
          $NOMBRESPECIES = $ARRAYVERESPECIESID[0]['NOMBRE_ESPECIES'];
      } else {
          $NOMBRESPECIES = "Sin Datos";
      }
  } else {
      $NOMBREVESPECIES = "Sin Datos";
      $NOMBRESPECIES = "Sin Datos";
  }
  $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);
  if ($ARRAYVERPRODUCTORID) {

      $CSGPRODUCTOR = $ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'];
      $NOMBREPRODUCTOR = $ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'];
  } else {
      $CSGPRODUCTOR = "Sin Datos";
      $NOMBREPRODUCTOR = "Sin Datos";
  }
  $ARRAYEVERERECEPCIONID = $ERECEPCION_ADO->verEstandar($r['ID_ESTANDAR']);
  if ($ARRAYEVERERECEPCIONID) {
      $CODIGOESTANDAR = $ARRAYEVERERECEPCIONID[0]['CODIGO_ESTANDAR'];
      $NOMBREESTANDAR = $ARRAYEVERERECEPCIONID[0]['NOMBRE_ESTANDAR'];
  } else {
      $CODIGOESTANDAR = "Sin Datos";
      $NOMBREESTANDAR = "Sin Datos";
  }
  $ARRAYTMANEJO = $TMANEJO_ADO->verTmanejo($r['ID_TMANEJO']);
  if ($ARRAYTMANEJO) {
      $NOMBRETMANEJO = $ARRAYTMANEJO[0]['NOMBRE_TMANEJO'];
  } else {
      $NOMBRETMANEJO = "Sin Datos";
  }

  $html = $html . '
        <tr>
            <th class=" left">' . $r['FOLIO_AUXILIAR_EXIMATERIAPRIMA'] . '</th>
            <td class=" left">' . $r['COSECHA'] . '</td>
            <td class=" left">' . $CODIGOESTANDAR . '</td>
            <td class=" left">' . $NOMBREESTANDAR . '</td>
            <td class=" center">' . $r['ENVASE'] . '</td>
            <td class=" center">' . $r['NETO'] . '</td>
            <td class=" center">' . $r['BRUTO'] . '</td>
            <td class=" center ">' . $NOMBREVESPECIES . ' </td>
            <td class=" center ">' . $NOMBRETMANEJO . ' </td>
        </tr>
        ';
endforeach;
$html = $html . '
        <tr>
            <th class="color left">&nbsp;</th>
            <th class="color left">&nbsp;</th>
            <th class="color center ">&nbsp; </th>
            <th class="color left">Sub Total</th>
            <th class="color center">' . $TOTALENVASE . '</th>
            <th class="color center">' . $TOTALNETO . '</th>
            <th class="color center">' . $TOTALBRUTO . '</th>
            <th class="color center ">&nbsp; </th>
            <th class="color left">&nbsp;</th>
        </tr>
    ';
$html = $html . '
    </tbody>
  </table>
  ';




$html = $html . '
  <div id="details" class="clearfix">
    <div id="client">
      <div class="address"><b>Responsable</b></div>
      <div class="address"> ' . $RESPONSBALE . ' </div>
    </div>
    <div id="client">
      <div class="address"><b>Motivo</b></div>
      <div class="address">  ' . $MOTIVO . ' </div>
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
$NOMBREARCHIVO = "InformeLevantamientoMateriaPrima_";
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
$TIPOINFORME = "Informe Levantamiento";
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
