<?php

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES 
include_once '../../assest/controlador/TUSUARIO_ADO.php';
include_once '../../assest/controlador/USUARIO_ADO.php';
include_once '../../assest/controlador/EMPRESA_ADO.php';
include_once '../../assest/controlador/PLANTA_ADO.php';
include_once '../../assest/controlador/TEMPORADA_ADO.php';

include_once '../../assest/controlador/RECEPCIONPT_ADO.php';
include_once '../../assest/controlador/DRECEPCIONPT_ADO.php';
include_once '../../assest/controlador/EEXPORTACION_ADO.php';


include_once '../../assest/controlador/VESPECIES_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/TRANSPORTE_ADO.php';
include_once '../../assest/controlador/CONDUCTOR_ADO.php';
include_once '../../assest/controlador/TCALIBRE_ADO.php';
include_once '../../assest/controlador/TMANEJO_ADO.php';
include_once '../../assest/controlador/TCOLOR_ADO.php';
include_once '../../assest/controlador/TCATEGORIA_ADO.php';



//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$TUSUARIO_ADO = new TUSUARIO_ADO();
$USUARIO_ADO = new USUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();

$RECEPCIONPT_ADO = new RECEPCIONPT_ADO();
$DRECEPCIONPT_ADO = new DRECEPCIONPT_ADO();
$EEXPORTACION_ADO =  new EEXPORTACION_ADO();

$VESPECIES_ADO = new VESPECIES_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$TRANSPORTE_ADO =  new TRANSPORTE_ADO();
$CONDUCTOR_ADO =  new CONDUCTOR_ADO();
$TCALIBRE_ADO =  new TCALIBRE_ADO();
$TMANEJO_ADO = new TMANEJO_ADO();
$TCOLOR_ADO =  new TCOLOR_ADO();
$TCATEGORIA_ADO =  new TCATEGORIA_ADO();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$NUMERORECEPCION = "";
$FECHARECEPCION = "";
$NUMEROGUIA = "";
$HORARECEPCION = "";
$TOTALGUIA = "";
$FECHAGUIA = "";
$FOLIO = "";
$PRODUCTOR = "";
$CSGPRODUCTOR = "";
$TRANSPORTE = "";
$CONDUCTOR = "";
$PATENTECAMION = "";
$STOCK = "";



$CODIGOPRODUCTOR = "";
$NOMBREPRODUCTOR = "";
$NOMBRETIPO = "";
$PLANTAORIGEN = "";
$EMPRESA = "";
$TEMPORADA = "";
$PLANTA = "";
$CALIBRE = "";
$TMANEJO = "";
$EMPRESAURL = "";
$FOLIOBASE = "";
$TOTALENVASE = "";
$TOTALNETO = "";
$TOTALBRUTO = "";

$TOTALENVASEGENERAL = "";
$TOTALNETOREALGENERAL = "";
$TOTALNETOGENERAL = "";
$TOTALBRUTOGENERAL = "";


//INICIALIZAR ARREGLOS
$ARRAYRECEPCIONPT = "";
$ARRAYDRECEPCIONPT = "";
$ARRAYDRECEPCIONPTTOTAL = "";
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

$ARRAYTRANSPORTE = "";
$ARRAYCONDUCTOR = "";
$ARRAYUSUARIO="";


if (isset($_REQUEST['usuario'])) {
  $USUARIO = $_REQUEST['usuario'];
  $ARRAYUSUARIO = $USUARIO_ADO->ObtenerNombreCompleto($USUARIO);
  $NOMBRE = $ARRAYUSUARIO[0]["NOMBRE_COMPLETO"];
}

if (isset($_REQUEST['parametro'])) {
  $IDOP = $_REQUEST['parametro'];
}

$ARRAYRECEPCIONPT = $RECEPCIONPT_ADO->verRecepcion3($IDOP);
if($ARRAYRECEPCIONPT){
  $ARRAYDRECEPCIONPT = $DRECEPCIONPT_ADO->listarDrecepcionPorRecepcion2($IDOP);
  $ARRAYDRECEPCIONPTTOTAL = $DRECEPCIONPT_ADO->obtenerTotales2($IDOP);
  
  $TOTALENVASEI = $ARRAYDRECEPCIONPTTOTAL[0]['ENVASEI'];
  $TOTALENVASER = $ARRAYDRECEPCIONPTTOTAL[0]['ENVASER'];
  $TOTALENVASEA = $ARRAYDRECEPCIONPTTOTAL[0]['ENVASEA'];
  $TOTALNETOREALGENERAL = $ARRAYDRECEPCIONPTTOTAL[0]['NETOREAL'];
  $TOTALNETOGENERAL = $ARRAYDRECEPCIONPTTOTAL[0]['NETO'];
  $TOTALBRUTOGENERAL = $ARRAYDRECEPCIONPTTOTAL[0]['BRUTO'];
  
  
  $NUMERORECEPCIONPT = $ARRAYRECEPCIONPT[0]['NUMERO_RECEPCION'];
  $FECHARECEPCIONPT = $ARRAYRECEPCIONPT[0]['FECHA'];
  $HORARECEPCIONPT = $ARRAYRECEPCIONPT[0]['HORA_RECEPCION'];
  $NUMEROGUIA = $ARRAYRECEPCIONPT[0]['NUMERO_GUIA_RECEPCION'];
  $FECHAGUIA = $ARRAYRECEPCIONPT[0]['FECHA_GUIA'];
  $PRODUCTOR = $ARRAYRECEPCIONPT[0]['ID_PRODUCTOR'];
  $PATENTECAMION = $ARRAYRECEPCIONPT[0]['PATENTE_CAMION'];
  $PATENTECARRO = $ARRAYRECEPCIONPT[0]['PATENTE_CARRO'];
  $OBSERVACIONES = $ARRAYRECEPCIONPT[0]['OBSERVACION_RECEPCION'];
  $ESTADO = $ARRAYRECEPCIONPT[0]['ESTADO'];
  if ($ARRAYRECEPCIONPT[0]['ESTADO'] == 1) {
    $ESTADO = "Abierto";
  }else if ($ARRAYRECEPCIONPT[0]['ESTADO'] == 0) {
    $ESTADO = "Cerrado";
  }else{
    $ESTADO="Sin Datos";
  }  
  
  
  
  $IDUSUARIOI = $ARRAYRECEPCIONPT[0]['ID_USUARIOI'];  
  $ARRAYUSUARIO2 = $USUARIO_ADO->ObtenerNombreCompleto($IDUSUARIOI);
  $NOMBRERESPONSABLE = $ARRAYUSUARIO2[0]["NOMBRE_COMPLETO"];

  $TIPORECEPCION=$ARRAYRECEPCIONPT[0]['TRECEPCION'];
  if ($ARRAYRECEPCIONPT[0]['TRECEPCION'] == "1") {
    $NOMBRETIPO = "Desde Productor";
    $ARRAYPRODUCTOR = $PRODUCTOR_ADO->verProductor($ARRAYRECEPCIONPT[0]['ID_PRODUCTOR']);
    if ($ARRAYPRODUCTOR) {
      $NOMBREPRODUCTOR = $ARRAYPRODUCTOR[0]['NOMBRE_PRODUCTOR'];
      $CSGPRODUCTOR = $ARRAYPRODUCTOR[0]['CSG_PRODUCTOR'];
    }
  }
  if ($ARRAYRECEPCIONPT[0]['TRECEPCION'] == "2") {
    $NOMBRETIPO = "Planta Externa";  
    $ARRAYPLANTA2 = $PLANTA_ADO->verPlanta($ARRAYRECEPCIONPT[0]['ID_PLANTA2']);
    if ($ARRAYPLANTA2) {
      $PLANTAORIGEN = $ARRAYPLANTA2[0]['NOMBRE_PLANTA'];
    } else {
      $PLANTAORIGEN = "";
    }
  }
  
  
  $ARRAYTRANSPORTE = $TRANSPORTE_ADO->verTransporte($ARRAYRECEPCIONPT[0]['ID_TRANSPORTE']);
  $ARRAYCONDUCTOR = $CONDUCTOR_ADO->verConductor($ARRAYRECEPCIONPT[0]['ID_CONDUCTOR']);;
  
  $TRANSPORTE = $ARRAYTRANSPORTE[0]['NOMBRE_TRANSPORTE'];
  $CONDUCTOR = $ARRAYCONDUCTOR[0]['NOMBRE_CONDUCTOR'];
  
  
  
  $TOTALENVASE = $ARRAYRECEPCIONPT[0]['CANTIDAD_ENVASE_RECEPCION'];
  $TOTALNETO = $ARRAYRECEPCIONPT[0]['KILOS_NETO_RECEPCION'];
  $TOTALBRUTO = $ARRAYRECEPCIONPT[0]['KILOS_BRUTO_RECEPCION'];
  
  
  
  $ARRAYPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
  $NOMBREPRODUCTOR = $ARRAYPRODUCTOR[0]['NOMBRE_PRODUCTOR'];
  $CSGPRODUCTOR = $ARRAYPRODUCTOR[0]['CSG_PRODUCTOR'];
  
  
  $ARRAYPLANTA = $PLANTA_ADO->verPlanta($ARRAYRECEPCIONPT[0]['ID_PLANTA']);
  $ARRAYEMPRESA = $EMPRESA_ADO->verEmpresa($ARRAYRECEPCIONPT[0]['ID_EMPRESA']);
  
  $ARRAYTEMPORADA = $TEMPORADA_ADO->verTemporada($ARRAYRECEPCIONPT[0]['ID_TEMPORADA']);
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
    <title>Informe Recepcion</title>
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
        INFORME RECEPCIÓN PRODUCTO TERMINADO 
        <br>
        <b> Número Recepción: ' . $NUMERORECEPCIONPT . '</b>
      </h2>
      <div id="details" class="clearfix">
        
        <div id="invoice">
          <div class="date"><b>Código BRC: </b>REP-RECPT</div>  
          <div class="date"><b>Fecha Recepción: </b>' . $FECHARECEPCIONPT . ' </div>
          <div class="date"><b>Hora Recepción: </b>' . $HORARECEPCIONPT . '  </div>
          <div class="date"><b>Empresa: </b>' . $EMPRESA . '</div>
          <div class="date"><b>Temporada: </b>' . $TEMPORADA . '</div>
        </div>

        <div id="client">
          <div class="address"><b>Tipo Recepción: </b>' . $NOMBRETIPO . '</div>
          <div class="address"><b>Estado Recepcion: </b> ' . $ESTADO . ' </div>
          <div class="address"><b>Número Guía: </b>' . $NUMEROGUIA . ' </div>
          ';
 if ($TIPORECEPCION == "2") {
  $html .= '
            <div class="address"><b> Planta Origen:  </b>' . $PLANTAORIGEN . '</div>
            <div class="address"><b> Planta Destino: </b>' . $PLANTA . '</div>
            ';
}
if($TIPORECEPCION == "1") {
  $html .= '
  <div class="address"><b> CSG:  </b>' . $CSGPRODUCTOR . '</div>
  <div class="address"><b> Productor Origen:  </b>' . $NOMBREPRODUCTOR . '</div>
  <div class="address"><b> Planta Destino: </b>' . $PLANTA . '</div>
  ';
}

$html .= '
        </div>
        
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th colspan="20" class="center">DETALLE DE RECEPCIÓN.</th>
          </tr>
          <tr>
            <th class="color left">Folio</th>
            <th class="color center">Fecha Embalado</th>
            <th class="color center">Código Estandar</th>
            <th class="color center">Envase/Estandar</th>
            <th class="color center ">CSG </th>
            <th class="color center ">Productor </th>
            <th class="color center ">Variedad </th>
            <th class="color center">Envase Recib.</th>
            <th class="color center">Envase Recha.</th>
            <th class="color center">Envase Aprob.</th>
            <th class="color center">Kilos Neto Reales</th>
            <th class="color center">Kilos Neto</th>
            <th class="color center">Kilos Bruto</th>
            <th class="color center">Calibre</th>
            <th class="color center">Tipo Manejo</th>  
            <th class="color center">Embolsado</th>  
            <th class="color center">Prefrio</th>                
            <th class="color center">Stock</th>
            <th class="color center">Tipo Categoria </th>
            <th class="color center">Tipo Color </th>

          </tr>
        </thead>
         <tbody>
        ';


foreach ($ARRAYDRECEPCIONPT as $d) :
  $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($d['ID_PRODUCTOR']);
  $ARRAYVESPECIES = $VESPECIES_ADO->verVespecies($d['ID_VESPECIES']);

  $ARRAYEEXPORTACION = $EEXPORTACION_ADO->verEstandar($d['ID_ESTANDAR']);
  $ARRAYCALIBRE = $TCALIBRE_ADO->verCalibre($d['ID_TCALIBRE']);
  $ARRAYTMANEJO = $TMANEJO_ADO->verTmanejo($d['ID_TMANEJO']);
  
  $TMANEJO = $ARRAYTMANEJO[0]['NOMBRE_TMANEJO'];
  if ($d['EMBOLSADO_DRECEPCION'] == "1") {
    $EMBOLSADO = "SI";
  }
  if ($d['EMBOLSADO_DRECEPCION'] == "0") {
    $EMBOLSADO = "NO";
  }


  if ($d['PREFRIO_DRECEPCION'] == "1") {
    $PREFRIO = "SI";
  }
  if ($d['PREFRIO_DRECEPCION'] == "0") {
    $PREFRIO =  "NO";
  }

  if ($d['GASIFICADO_DRECEPCION'] == "1") {
    $GASIFICACION = "SI";
  }
  if ($d['GASIFICADO_DRECEPCION'] == "0") {
    $GASIFICACION =  "NO";
  }

  if ($d['STOCK_DRECEPCION']) {
    $STOCK = $d['STOCK_DRECEPCION'];
  } else {
    $STOCK = "Sin Stock";
  }
  $ARRAYTCATEGORIA=$TCATEGORIA_ADO->verTcategoria($d['ID_TCATEGORIA']);
  if($ARRAYTCATEGORIA){
     $NOMBRETCATEGORIA= $ARRAYTCATEGORIA[0]["NOMBRE_TCATEGORIA"];
  }else{
      $NOMBRETCATEGORIA = "Sin Datos";
  }   
  $ARRAYTCOLOR=$TCOLOR_ADO->verTcolor($d['ID_TCOLOR']);
  if($ARRAYTCOLOR){
      $NOMBRETCOLOR= $ARRAYTCOLOR[0]["NOMBRE_TCOLOR"];
  }else{
      $NOMBRETCOLOR = "Sin Datos";
  } 

  $html = $html . '
          
                      <tr >
                          <th class=" left">' . $d['FOLIO_DRECEPCION'] . '</th>
                          <td class=" center">' . $d['EMBALADO'] . '</td>
                          <td class="center">' . $ARRAYEEXPORTACION[0]['CODIGO_ESTANDAR'] . '</td>
                          <td class="center">' . $ARRAYEEXPORTACION[0]['NOMBRE_ESTANDAR'] . '</td>
                          <td class="center">' . $ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'] . '</td>
                          <td class="center">' . $ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'] . '</td>
                          <td class="center">' . $ARRAYVESPECIES[0]['NOMBRE_VESPECIES'] . '</td>
                          <td class="center">' . $d['ENVASEI'] . '</td>
                          <td class="center">' . $d['ENVASER'] . '</td>
                          <td class="center">' . $d['ENVASEA'] . '</td>
                          <td class="center">' . $d['NETOREAL'] . '</td>
                          <td class="center">' . $d['NETO'] . '</td>
                          <td class="center">' . $d['BRUTO'] . '</td>
                          <td class="center">' . $ARRAYCALIBRE[0]['NOMBRE_TCALIBRE'] . '</td>
                          <td class="center">' . $ARRAYTMANEJO[0]['NOMBRE_TMANEJO'] . '</td>
                          <td class="center">' . $EMBOLSADO . '</td>
                          <td class="center">' . $PREFRIO . '</td>
                          <td class="center">' . $STOCK . '</td>
                          <td class="center">' . $NOMBRETCATEGORIA . '</td>
                          <td class="center">' . $NOMBRETCOLOR . '</td>
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
              <th class="color left"> Total </th>
              <th class="color center">' . $TOTALENVASEI . '</th>
              <th class="color center">' . $TOTALENVASER . '</th>
              <th class="color center">' . $TOTALENVASEA . '</th>
              <th class="color center">' . $TOTALNETOREALGENERAL . '</th>
              <th class="color center">' . $TOTALNETOGENERAL . '</th>
              <th class="color center">' . $TOTALBRUTOGENERAL . '</th>
              <th class="color center">&nbsp;</th>
              <th class="color center">&nbsp;</th>
              <th class="color center">&nbsp;</th>
              <th class="color center">&nbsp;</th>
              <th class="color center">&nbsp;</th>
              <th class="color center">&nbsp;</th>
              <th class="color center">&nbsp;</th>
          </tr>
      ';



$html = $html . '
        </tbody>
      </table>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="address"><b>Información De Transporte</b></div>
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
            <div class="date center">  Firma Responsable</div>
            <div class="date center">  ' . $NOMBRERESPONSABLE . '</div>
        </div>
      </div>

    </main>
  </body>
</html>

';






//CREACION NOMBRE DEL ARCHIVO
$NOMBREARCHIVO = "InformeRecepionPt_";
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
$TIPOINFORME = "Informe Recepcion PT";
$CREADOR = "Usuario";
$AUTOR = "Usuario";
$ASUNTO = "Informe";

//API DE GENERACION DE PDF
require_once '../../api/mpdf/mpdf/autoload.php';
//$PDF = new \Mpdf\Mpdf();W
$PDF = new \Mpdf\Mpdf(['format' => 'letter-L']);

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
