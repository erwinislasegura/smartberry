<?php

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES 
include_once '../../assest/controlador/TUSUARIO_ADO.php';
include_once '../../assest/controlador/USUARIO_ADO.php';
include_once '../../assest/controlador/EMPRESA_ADO.php';
include_once '../../assest/controlador/PLANTA_ADO.php';
include_once '../../assest/controlador/TEMPORADA_ADO.php';


include_once '../../assest/controlador/DRECEPCIONMP_ADO.php';
include_once '../../assest/controlador/RECEPCIONMP_ADO.php';
include_once '../../assest/controlador/FOLIO_ADO.php';
include_once '../../assest/controlador/VESPECIES_ADO.php';
include_once '../../assest/controlador/ERECEPCION_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/TRANSPORTE_ADO.php';
include_once '../../assest/controlador/CONDUCTOR_ADO.php';
include_once '../../assest/controlador/TMANEJO_ADO.php';
include_once '../../assest/controlador/TTRATAMIENTO1_ADO.php';
include_once '../../assest/controlador/TTRATAMIENTO2_ADO.php';



//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$TUSUARIO_ADO = new TUSUARIO_ADO();
$USUARIO_ADO = new USUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();

$DRECEPCIONMP_ADO = new DRECEPCIONMP_ADO();
$RECEPCIONMP_ADO = new RECEPCIONMP_ADO();
$FOLIO_ADO =  new FOLIO_ADO();
$ERECEPCION_ADO =  new ERECEPCION_ADO();
$VESPECIES_ADO = new VESPECIES_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$TRANSPORTE_ADO =  new TRANSPORTE_ADO();
$CONDUCTOR_ADO =  new CONDUCTOR_ADO();
$TMANEJO_ADO = new TMANEJO_ADO();
$TTRATAMIENTO1_ADO =  new TTRATAMIENTO1_ADO();
$TTRATAMIENTO2_ADO =  new TTRATAMIENTO2_ADO();

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
$PATENTE = "";



$CODIGOPRODUCTOR = "";
$NOMBREPRODUCTOR = "";
$NOMBRETIPO = "";
$EMPRESA = "";
$TEMPORADA = "";
$PLANTA = "";
$EMPRESAURL = "";
$FOLIOBASE = "";
$TOTALENVASE = "";
$TOTALNETO = "";
$TOTALBRUTO = "";

$TOTALENVASEGENERAL = "";
$TOTALNETOGENERAL = "";
$TOTALBRUTOGENERAL = "";


//INICIALIZAR ARREGLOS
$ARRAYRECEPCION = "";
$ARRAYTRECEPCION = "";
$ARRAYDRECEPCION = "";
$ARRAYDRECEPCION2 = "";
$ARRAYDRECEPCIONTOTAL = "";
$ARRAYFOLIO = "";
$ARRAYEMPRESA = "";
$ARRAYPLANTA = "";
$ARRAYTEMPORADA = "";
$ARRAYVESPECIES = "";
$ARRAYPVESPECIES = "";
$ARRAYEEXPORTACION = "";
$ARRAYPRODUCTOR = "";

$ARRAYTRANSPORTE = "";
$ARRAYCONDUCTOR = "";
$ARRAYTMANEJO = "";
$ARRAYUSUARIO = "";

if (isset($_REQUEST['usuario'])) {
  $USUARIO = $_REQUEST['usuario'];
  $ARRAYUSUARIO = $USUARIO_ADO->ObtenerNombreCompleto($USUARIO);
  $NOMBRE = $ARRAYUSUARIO[0]["NOMBRE_COMPLETO"];
}


if (isset($_REQUEST['parametro'])) {
  $IDOP = $_REQUEST['parametro'];
}


$ARRAYRECEPCION = $RECEPCIONMP_ADO->verRecepcion3($IDOP);
if ($ARRAYRECEPCION) {

  $ARRAYDRECEPCION = $DRECEPCIONMP_ADO->buscarPorRecepcionaAgrupadoVariedad2($IDOP);
  $ARRAYDRECEPCIONTOTAL = $DRECEPCIONMP_ADO->obtenerTotales2($IDOP);
  $TOTALENVASEGENERAL = $ARRAYDRECEPCIONTOTAL[0]['ENVASE'];
  $TOTALNETOGENERAL = $ARRAYDRECEPCIONTOTAL[0]['NETO'];
  $TOTALBRUTOGENERAL = $ARRAYDRECEPCIONTOTAL[0]['BRUTO'];


  $NUMERORECEPCION = $ARRAYRECEPCION[0]['NUMERO_RECEPCION'];
  $FECHARECEPCION = $ARRAYRECEPCION[0]['FECHA'];
  $HORARECEPCION = $ARRAYRECEPCION[0]['HORA_RECEPCION'];
  $NUMEROGUIA = $ARRAYRECEPCION[0]['NUMERO_GUIA_RECEPCION'];
  $FECHAGUIA = $ARRAYRECEPCION[0]['GUIA'];
  $TOTALGUIA = $ARRAYRECEPCION[0]['TOTAL_KILOS_GUIA_RECEPCION'];
  $PATENTECAMION = $ARRAYRECEPCION[0]['PATENTE_CAMION'];
  $PATENTECARRO = $ARRAYRECEPCION[0]['PATENTE_CARRO'];
  $OBSERVACIONES = $ARRAYRECEPCION[0]['OBSERVACION_RECEPCION'];
  $ESTADO = $ARRAYRECEPCION[0]['ESTADO'];
  if ($ARRAYRECEPCION[0]['ESTADO'] == 1) {
    $ESTADO = "Abierto";
  }else if ($ARRAYRECEPCION[0]['ESTADO'] == 0) {
    $ESTADO = "Cerrado";
  }else{
    $ESTADO="Sin Datos";
  } 

  $IDUSUARIOI = $ARRAYRECEPCION[0]['ID_USUARIOI'];  
  $ARRAYUSUARIO2 = $USUARIO_ADO->ObtenerNombreCompleto($IDUSUARIOI);
  $NOMBRERESPONSABLE = $ARRAYUSUARIO2[0]["NOMBRE_COMPLETO"];
  $TIPORECEPCION=$ARRAYRECEPCION[0]['TRECEPCION'];
  if ($ARRAYRECEPCION[0]['TRECEPCION'] == "1") {
    $NOMBRETIPO = "Desde Productor";
    $ARRAYPRODUCTOR = $PRODUCTOR_ADO->verProductor($ARRAYRECEPCION[0]['ID_PRODUCTOR']);
    if ($ARRAYPRODUCTOR) {
      $NOMBREPRODUCTOR = $ARRAYPRODUCTOR[0]['NOMBRE_PRODUCTOR'];
      $CSGPRODUCTOR = $ARRAYPRODUCTOR[0]['CSG_PRODUCTOR'];
    }
  }
  if ($ARRAYRECEPCION[0]['TRECEPCION'] == "2") {
    $NOMBRETIPO = "Planta Externa";  
    $ARRAYPLANTA2 = $PLANTA_ADO->verPlanta($ARRAYRECEPCION[0]['ID_PLANTA2']);
    if ($ARRAYPLANTA2) {
      $PLANTAORIGEN = $ARRAYPLANTA2[0]['NOMBRE_PLANTA'];
    } else {
      $PLANTAORIGEN = "";
    }
  }
  if ($ARRAYRECEPCION[0]['TRECEPCION'] == "3") {
    $NOMBRETIPO = "Desde Productor BDH";
    $ARRAYPRODUCTOR = $PRODUCTOR_ADO->verProductor($ARRAYRECEPCION[0]['ID_PRODUCTOR']);
    if ($ARRAYPRODUCTOR) {
      $NOMBREPRODUCTOR = $ARRAYPRODUCTOR[0]['NOMBRE_PRODUCTOR'];
      $CSGPRODUCTOR = $ARRAYPRODUCTOR[0]['CSG_PRODUCTOR'];
    }
  }

 
  $ARRAYTRANSPORTE = $TRANSPORTE_ADO->verTransporte($ARRAYRECEPCION[0]['ID_TRANSPORTE']);
  if ($ARRAYTRANSPORTE) {
    $TRANSPORTE = $ARRAYTRANSPORTE[0]['NOMBRE_TRANSPORTE'];
  }
  $ARRAYCONDUCTOR = $CONDUCTOR_ADO->verConductor($ARRAYRECEPCION[0]['ID_CONDUCTOR']);
  if ($ARRAYCONDUCTOR) {
    $CONDUCTOR = $ARRAYCONDUCTOR[0]['NOMBRE_CONDUCTOR'];
  }
  $TOTALENVASE = $ARRAYRECEPCION[0]['CANTIDAD_ENVASE_RECEPCION'];
  $TOTALNETO = $ARRAYRECEPCION[0]['KILOS_NETO_RECEPCION'];
  $TOTALBRUTO = $ARRAYRECEPCION[0]['KILOS_BRUTO_RECEPCION'];

  $ARRAYEMPRESA = $EMPRESA_ADO->verEmpresa($ARRAYRECEPCION[0]['ID_EMPRESA']);
  $ARRAYPLANTA = $PLANTA_ADO->verPlanta($ARRAYRECEPCION[0]['ID_PLANTA']);
  $ARRAYTEMPORADA = $TEMPORADA_ADO->verTemporada($ARRAYRECEPCION[0]['ID_TEMPORADA']);
  $TEMPORADA = $ARRAYTEMPORADA[0]['NOMBRE_TEMPORADA'];
  $PLANTA = $ARRAYPLANTA[0]['NOMBRE_PLANTA'];
  $EMPRESA = $ARRAYEMPRESA[0]['NOMBRE_EMPRESA'];
  $EMPRESAURL = $ARRAYEMPRESA[0]['LOGO_EMPRESA'];
}


if ($EMPRESAURL == "") {
  $EMPRESAURL = "img/empresa/no_disponible.png";
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
           <img src="../../assest//img/logo.png" width="150px" height="45px"/>
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
        INFORME RECEPCION MATERIA PRIMA
        <br>
        <b> Numero Recepcion: ' . $NUMERORECEPCION . '</b>
      </h2>
      <div id="details" class="clearfix">
        
        <div id="invoice">
          <div class="date"><b>Código BRC: </b>REP-RECMP</div>  
          <div class="date"><b>Fecha Recepcion: </b>' . $FECHARECEPCION . ' </div>
          <div class="date"><b>Hora Recepcion: </b>' . $HORARECEPCION . '  </div>
          <div class="date"><b>Empresa: </b>' . $EMPRESA . '</div>
          <div class="date"><b>Planta: </b>' . $PLANTA . '</div>
          <div class="date"><b>Temporada: </b>' . $TEMPORADA . '</div>
        </div>

        <div id="client">
          <div class="address"><b>Tipo Recepcion: </b>' . $NOMBRETIPO . '</div>
          <div class="address"><b>Estado Recepcion: </b> ' . $ESTADO . ' </div>
          <div class="address"><b>Numero Guia: </b>' . $NUMEROGUIA . ' </div>
          <div class="address"><b>Total Envaces: </b>' . $TOTALGUIA . '  </div>          ';
if ($TIPORECEPCION == "2") {
  $html .= '
                      <div class="address"><b> Planta Origen:  </b>' . $PLANTAORIGEN . '</div>
                      ';
} 
if($TIPORECEPCION == "1") {
  $html .= '
            <div class="address"><b> CSG:  </b>' . $CSGPRODUCTOR . '</div>
            <div class="address"><b> Productor Origen:  </b>' . $NOMBREPRODUCTOR . '</div>
            ';
}
if($TIPORECEPCION == "3") {
  $html .= '
            <div class="address"><b> CSG:  </b>' . $CSGPRODUCTOR . '</div>
            <div class="address"><b> Productor Origen:  </b>' . $NOMBREPRODUCTOR . '</div>
            ';
}

$html = $html . '
        </div>
        
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th colspan="11" class="center">DETALLE DE RECEPCIÓN.</th>
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
            <th class="color center ">Tipo Tratamiento 1 </th>
            <th class="color center ">Tipo Tratamiento 2 </th>
          </tr>
        </thead>
         <tbody>
        ';
foreach ($ARRAYDRECEPCION as $d) :

  $ARRAYDRECEPCION2 = $DRECEPCIONMP_ADO->buscarPorIdRecepcionPorVespecies2($IDOP, $d['ID_VESPECIES']);
  $ARRAYDRECEPCION2TOTALES = $DRECEPCIONMP_ADO->obtenerTotalPorRecepcionVariedad2($IDOP, $d['ID_VESPECIES']);
  $TOTALENVASESDRECEPCION = $ARRAYDRECEPCION2TOTALES[0]['ENVASE'] ;
  $TOTALNETOSDRECEPCION = $ARRAYDRECEPCION2TOTALES[0]['NETO'] ;
  $TOTALBRUTOSDRECEPCION = $ARRAYDRECEPCION2TOTALES[0]['BRUTO'] ;

  foreach ($ARRAYDRECEPCION2 as $s) :

    $ARRAYEVERERECEPCIONID = $ERECEPCION_ADO->verEstandar($s['ID_ESTANDAR']);
    if ($ARRAYEVERERECEPCIONID) {
      $CODIGOESTANDAR = $ARRAYEVERERECEPCIONID[0]['CODIGO_ESTANDAR'];
      $NOMBREESTANDAR = $ARRAYEVERERECEPCIONID[0]['NOMBRE_ESTANDAR'];
    } else {
      $CODIGOESTANDAR = "Sin Datos";
      $NOMBREESTANDAR = "Sin Datos";
    }
    $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($s['ID_VESPECIES']);
    if ($ARRAYVERVESPECIESID) {
      $NOMBREVESPECIES = $ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'];
    } else {
      $NOMBREVESPECIES = "Sin Datos";
    }
    $ARRAYTMANEJO = $TMANEJO_ADO->verTmanejo($s['ID_TMANEJO']);
    if ($ARRAYTMANEJO) {
      $NOMBRETMANEJO = $ARRAYTMANEJO[0]['NOMBRE_TMANEJO'];
    } else {
      $NOMBRETMANEJO = "Sin Datos";
    }
    if ($s['GASIFICADO_DRECEPCION'] == "1") {
      $GASIFICACION = "SI";
    }
    if ($s['GASIFICADO_DRECEPCION'] == "0") {
      $GASIFICACION =  "NO";
    }

    $ARRAYTRATAMIENTO1=$TTRATAMIENTO1_ADO->verTtratamiento($s['ID_TTRATAMIENTO1']);
    if($ARRAYTRATAMIENTO1){
        $NOMBRETTRATAMIENTO1 = $ARRAYTRATAMIENTO1[0]["NOMBRE_TTRATAMIENTO"];
    }else{
        $NOMBRETTRATAMIENTO1="Sin Datos";
    }
    $ARRAYTRATAMIENTO2=$TTRATAMIENTO2_ADO->verTtratamiento($s['ID_TTRATAMIENTO2']);
    if($ARRAYTRATAMIENTO2){
        $NOMBRETTRATAMIENTO2 = $ARRAYTRATAMIENTO2[0]["NOMBRE_TTRATAMIENTO"];
    }else{
        $NOMBRETTRATAMIENTO2="Sin Datos";
    }

    $html = $html . '
          
                      <tr >
                          <th class=" left">' . $s['FOLIO_DRECEPCION'] . '</th>
                          <td class=" left">' . $s['COSECHA'] . '</td>
                          <td class="left">' .  $CODIGOESTANDAR . '</td>
                          <td class="left">' .  $NOMBREESTANDAR . '</td>
                          <td class="center">' . $s['ENVASE'] . '</td>
                          <td class="center">' . $s['NETO'] . '</td>
                          <td class="center">' . $s['BRUTO'] . '</td>
                          <td class=" center">' . $NOMBREVESPECIES . '</td>
                          <td class=" center">' . $NOMBRETMANEJO . '</td>
                          <td class=" center">' . $NOMBRETTRATAMIENTO1 . '</td>
                          <td class=" center">' . $NOMBRETTRATAMIENTO2 . '</td>
                      </tr>
              ';


  endforeach;

  $html = $html . '
              
  <tr class="bt">
      <th class="color3 left">&nbsp;</th>
      <th class="color3 left">&nbsp;</th>
      <th class="color3 center">&nbsp;</th>
      <th class="color3 left">SUB TOTAL</th>
      <th class="color3 center">' . $TOTALENVASESDRECEPCION . '</th>
      <th class="color3 center">' . $TOTALNETOSDRECEPCION . '</th>
      <th class="color3 center">' . $TOTALBRUTOSDRECEPCION . '</th>
      <th class="color3  center">&nbsp;</th>
      <th class="color3 center">&nbsp;</th>
      <th class="color3 center">&nbsp;</th>
      <th class="color3 center">&nbsp;</th>
  </tr>
';


endforeach;
$html = $html . '
              
          <tr class="bt">
              <th class="color left">&nbsp;</th>
              <th class="color left">&nbsp;</th>
              <th class="color left">&nbsp;</th>
              <th class="color left"> TOTAL RECEPCION</th>
              <th class="color center">' . $TOTALENVASEGENERAL . '</th>
              <th class="color center">' . $TOTALNETOGENERAL . '</th>
              <th class="color center">' . $TOTALBRUTOGENERAL . '</th>
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
          <div class="address"><b>INFORMACION DE TRANSPORTE</b></div>
          <div class="address">Transporte:  ' . $TRANSPORTE . ' </div>
          <div class="address">Conductor: ' . $CONDUCTOR . '</div>
          <div class="address">Patente Camion: ' . $PATENTECAMION . '</div>
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
$NOMBREARCHIVO = "InformeRecepionGranel_";
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
$TIPOINFORME = "Informe Recepcion Granel";
$CREADOR = "Usuario";
$AUTOR = "Usuario";
$ASUNTO = "Informe";

//API DE GENERACION DE PDF
require_once '../../api/mpdf/mpdf/autoload.php';
//$PDF = new \Mpdf\Mpdf();W
$PDF = new \Mpdf\Mpdf(['format' => 'letter']);
$PDF->allow_charset_conversion = true;
$PDF->charset_in = "iso-8859-4";
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
$stylesheet = file_get_contents('../../assest//css/stylePdf.css'); // carga archivo css
$stylesheet2 = file_get_contents('../../assest//css/reset.css'); // carga archivo css

//ENLASAR CSS CON LA VISTA DEL PDF
$PDF->WriteHTML($stylesheet, 1);
$PDF->WriteHTML($stylesheet2, 1);

//GENERAR PDF
$PDF->WriteHTML($html);
//METODO DE SALIDA
$PDF->Output($NOMBREARCHIVOFINAL, \Mpdf\Output\Destination::INLINE);
