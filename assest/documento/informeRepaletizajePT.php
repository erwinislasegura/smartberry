<?php

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES 
include_once '../../assest/controlador/TUSUARIO_ADO.php';
include_once '../../assest/controlador/USUARIO_ADO.php';
include_once '../../assest/controlador/EMPRESA_ADO.php';
include_once '../../assest/controlador/PLANTA_ADO.php';
include_once '../../assest/controlador/TEMPORADA_ADO.php';


include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/VESPECIES_ADO.php';
include_once '../../assest/controlador/EEXPORTACION_ADO.php';
include_once '../../assest/controlador/EXIEXPORTACION_ADO.php';
include_once '../../assest/controlador/TMANEJO_ADO.php';
include_once '../../assest/controlador/TCALIBRE_ADO.php';
include_once '../../assest/controlador/TEMBALAJE_ADO.php';


include_once '../../assest/controlador/DREPALETIZAJEEX_ADO.php';
include_once '../../assest/controlador/REPALETIZAJEEX_ADO.php';
include_once '../../assest/controlador/INPSAG_ADO.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$TUSUARIO_ADO = new TUSUARIO_ADO();
$USUARIO_ADO = new USUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();

$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$EEXPORTACION_ADO =  new EEXPORTACION_ADO();
$EXIEXPORTACION_ADO =  new EXIEXPORTACION_ADO();
$TMANEJO_ADO =  new TMANEJO_ADO();
$TCALIBRE_ADO =  new TCALIBRE_ADO();
$TEMBALAJE_ADO =  new TEMBALAJE_ADO();


$REPALETIZAJEEX_ADO =  new REPALETIZAJEEX_ADO();
$DREPALETIZAJEEX_ADO =  new DREPALETIZAJEEX_ADO();
$INPSAG_ADO =  new INPSAG_ADO();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$NUMEROREPALETIZAJE = "";


$EMPRESA = "";
$EMPRESAURL = "";
$FECHAINGRESO = "";
$FECHAMODIFCACION = "";
$MOTIVO = "";
$TOTALENVASE = "";
$TOTALNETO = "";

$TOTALENVASEREPA = "";
$TOTALNETOREPA = "";

$TOTALE = "";
$TOTALNE = "";
$NUMEROINPECCION = "";

$OP = "";

//INICIALIZAR ARREGLOS
$ARRAYEMPRESA = "";
$ARRAYREPALETIZAJE = "";
$ARRAYDREPALETIZAJE = "";
$ARRAYDREPALETIZAJETOTALES = "";
$ARRAYEXISTENCIATOMADA = "";
$ARRAYVERINPECCIONSAG = "";

$ARRAYVERPRODUCTORID = "";
$ARRAYVERVESPECIESID = "";
$ARRAYEVERERECEPCIONID = "";
$ARRAYEXISTENCIABUSCARPOFOLIO = "";
$ARRAYUSUARIO="";




if (isset($_REQUEST['usuario'])) {
    $USUARIO = $_REQUEST['usuario'];
    $ARRAYUSUARIO = $USUARIO_ADO->ObtenerNombreCompleto($USUARIO);
    $NOMBRE = $ARRAYUSUARIO[0]["NOMBRE_COMPLETO"];
  }
  
if (isset($_REQUEST['parametro'])) {
    $IDOP = $_REQUEST['parametro'];
}
$ARRAYREPALETIZAJE = $REPALETIZAJEEX_ADO->verRepaletizaje3($IDOP);
if($ARRAYREPALETIZAJE){

    $ARRAYEXISTENCIATOMADA = $EXIEXPORTACION_ADO->buscarPorRepaletizaje2($IDOP);
    $ARRAYDREPALETIZAJE = $DREPALETIZAJEEX_ADO->buscarDrepaletizaje2($IDOP);
    $ARRAYDREPALETIZAJETOTALES = $DREPALETIZAJEEX_ADO->totalesDrepaletizaje2($IDOP);
    
    $ARRAYEMPRESA = $EMPRESA_ADO->verEmpresa($ARRAYREPALETIZAJE[0]['ID_EMPRESA']);
    
    
    $FECHAINGRESO = $ARRAYREPALETIZAJE[0]['INGRESO'];
    $FECHAMODIFCACION = $ARRAYREPALETIZAJE[0]['MODIFICACION'];
    $MOTIVO = $ARRAYREPALETIZAJE[0]['MOTIVO_REPALETIZAJE'];
    $TOTALENVASE = $ARRAYREPALETIZAJE[0]['ENVASE'];
    $TOTALNETO = $ARRAYREPALETIZAJE[0]['NETO'];
    $NUMEROREPALETIZAJE = $ARRAYREPALETIZAJE[0]['NUMERO_REPALETIZAJE'];
    $OBSERVACIONES = $ARRAYREPALETIZAJE[0]['MOTIVO_REPALETIZAJE'];
    $ESTADO = $ARRAYREPALETIZAJE[0]['ESTADO'];
    if ($ARRAYREPALETIZAJE[0]['ESTADO'] == 1) {
      $ESTADO = "Abierto";
    }else if ($ARRAYREPALETIZAJE[0]['ESTADO'] == 0) {
      $ESTADO = "Cerrado";
    }else{
      $ESTADO="Sin Datos";
    }  
    
    
    $IDUSUARIOI = $ARRAYREPALETIZAJE[0]['ID_USUARIOI'];  
    $ARRAYUSUARIO2 = $USUARIO_ADO->ObtenerNombreCompleto($IDUSUARIOI);
    $NOMBRERESPONSABLE = $ARRAYUSUARIO2[0]["NOMBRE_COMPLETO"];
    
    
    $TOTALENVASEREPA = $ARRAYDREPALETIZAJETOTALES[0]['ENVASE'];
    $TOTALNETOREPA = $ARRAYDREPALETIZAJETOTALES[0]['NETO'];
    
    
    $TOTALE = $TOTALENVASEREPA - $TOTALENVASE;
    $TOTALNE = $TOTALNETOREPA - $TOTALNETO;
    
    $ARRAYPLANTA = $PLANTA_ADO->verPlanta($ARRAYREPALETIZAJE[0]['ID_PLANTA']);
    $ARRAYTEMPORADA = $TEMPORADA_ADO->verTemporada($ARRAYREPALETIZAJE[0]['ID_TEMPORADA']);
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
$FECHANORMAL = $DIA . "/" . $MES . "/" . $ANO;
$FECHANOMBRE = $NOMBREDIA . ", " . $DIA . " de " . $NOMBREMES . " del " . $ANO;





//ESCTRUTURA DEL DOCUMENTO

$html = '
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Informe Repaletizaje</title>
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
        INFORME REPALETIZAJE PRODUCTO TERMINADO
        <br>
        <b> Número Repaletizaje: ' . $NUMEROREPALETIZAJE . '</b>
      </h2>
      <div id="details" class="clearfix">
        
        <div id="invoice">
            <div class="date"><b>Código BRC: </b>REP-REPAL </div>  
            <div class="date"><b>Empresa: </b>' . $EMPRESA . '</div>
            <div class="date"><b>Planta: </b>' . $PLANTA . '</div>
            <div class="date"><b>Temporada: </b>' . $TEMPORADA . '</div>
        </div>

        <div id="client">
          <div class="address"><b>Fecha Ingreso:  </b>' . $FECHAINGRESO . '</div>
          <div class="address"><b>Motivo Repaletizaje: </b>' . $MOTIVO . '</div>
          <div class="address"><b>Estado Repaletizaje: </b> ' . $ESTADO . ' </div>
        </div>        
      </div>
    <table border="0" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th colspan="14" class="center">INGRESO </th>
                </tr>
                <tr>                
                    <th class="color left">Folio</th>
                    <th class="color center">Fecha Embalado</th>
                    <th class="color center">Código Estandar</th>
                    <th class="color center">Envase/Estandar</th>
                    <th class="color center ">CSG </th>
                    <th class="color center ">Productor </th>
                    <th class="color center ">Variedad </th>
                    <th class="color center">Cant. Envase</th>
                    <th class="color center">Kilos Neto</th>
                    <th class="color center">Num. Inspección</th>
                    <th class="color center">Tipo Manejo</th>
                    <th class="color center">Calibre</th>
                    <th class="color center">Embalaje </th>
                    <th class="color center">Stock </th>
                </tr>
            </thead>
            <tbody>
    ';
foreach ($ARRAYEXISTENCIATOMADA as $r) :

    $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);
    $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
    $ARRAYEVERERECEPCIONID = $EEXPORTACION_ADO->verEstandar($r['ID_ESTANDAR']);
    $ARRAYVERINPECCIONSAG = $INPSAG_ADO->verInpsag($r['ID_INPSAG']);
    $ARRAYTMANEJO = $TMANEJO_ADO->verTmanejo($r['ID_TMANEJO']);
    $ARRAYCALIBRE = $TCALIBRE_ADO->verCalibre($r['ID_TCALIBRE']);
    $ARRAYEMBALAJE = $TEMBALAJE_ADO->verEmbalaje($r['ID_TEMBALAJE']);
    if ($ARRAYTMANEJO) {
        $TMANEJO = $ARRAYTMANEJO[0]['NOMBRE_TMANEJO'];
    } else {
        $TMANEJO = "Sin Manejo";
    }
    if ($ARRAYCALIBRE) {
        $CALIBRE = $ARRAYCALIBRE[0]['NOMBRE_TCALIBRE'];
    } else {
        $CALIBRE  = "Sin Calibre";
    }
    if ($ARRAYEMBALAJE) {
        $EMBALAJE = $ARRAYEMBALAJE[0]['NOMBRE_TEMBALAJE'];
    } else {
        $EMBALAJE = "Sin Embalaje";
    }
    if ($r['STOCK']) {
        $STOCK = $r['STOCK'];
    } else {
        $STOCK = "Sin Stock";
    }
    if ($ARRAYVERINPECCIONSAG) {
        $NUMEROINPECCION = $ARRAYVERINPECCIONSAG[0]['NUMERO_INPSAG'];
    } else {
        $NUMEROINPECCION = "Sin Inspección";
    }
    $html = $html . '
        <tr>
            <td class=" left">' . $r['FOLIO_AUXILIAR_EXIEXPORTACION'] . '</td>
            <td class=" center">' . $r['EMBALADO'] . '</td>
            <td class=" center">' . $ARRAYEVERERECEPCIONID[0]['CODIGO_ESTANDAR'] . '</td>
            <td class=" center">' . $ARRAYEVERERECEPCIONID[0]['NOMBRE_ESTANDAR'] . '</td>
            <td class=" center ">' . $ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'] . ' </td>
            <td class=" center ">' . $ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'] . ' </td>
            <td class=" center ">' . $ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'] . ' </td>
            <td class=" center">' . $r['ENVASE'] . '</td>
            <td class=" center">' . $r['NETO'] . '</td>
            <td class=" center">' . $NUMEROINPECCION . '</td>
            <td class=" center">' . $TMANEJO . '</td>
            <td class=" center">' . $CALIBRE . '</td>
            <td class=" center">' . $EMBALAJE . '</td>
            <td class=" center">' . $STOCK . '</td>
        </tr>
        ';
endforeach;
$html = $html . '
        <tr>
            <th class="color center">&nbsp;</th>
            <th class="color center">&nbsp;</th>
            <th class="color center">&nbsp;</th>
            <th class="color center ">&nbsp; </th>
            <th class="color center ">&nbsp; </th>
            <th class="color center">&nbsp;</th>
            <th class="color right">Sub Total</th>
            <th class="color center">' . $TOTALENVASE . '</th>
            <th class="color center">' . $TOTALNETO . '</th>
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
  ';

$html = $html . '
<table border="0" cellspacing="0" cellpadding="0">
    <thead>
        <tr>
            <th colspan="13" class="center">SALIDA </th>
        </tr>
        <tr>
            <th class="color left">Folio</th>
            <th class="color center">Fecha Embalado</th>
            <th class="color center">Código Estandar</th>
            <th class="color center">Envase/Estandar</th>
            <th class="color center ">CSG </th>
            <th class="color center ">Productor </th>
            <th class="color center ">Variedad </th>
            <th class="color center">Cant. Envase</th>
            <th class="color center">Kilos Neto</th>
            <th class="color center">Tipo Manejo</th>
            <th class="color center">Calibre</th>
            <th class="color center">Embalaje </th>
            <th class="color center">Stock </th>
        </tr>
    </thead>
    <tbody>
';

foreach ($ARRAYDREPALETIZAJE as $r) :

    $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);
    $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
    $ARRAYEVERERECEPCIONID = $EEXPORTACION_ADO->verEstandar($r['ID_ESTANDAR']);

    $ARRAYTMANEJO = $TMANEJO_ADO->verTmanejo($r['ID_TMANEJO']);
    $ARRAYCALIBRE = $TCALIBRE_ADO->verCalibre($r['ID_TCALIBRE']);
    $ARRAYEMBALAJE = $TEMBALAJE_ADO->verEmbalaje($r['ID_TEMBALAJE']);
    if ($ARRAYTMANEJO) {
        $TMANEJO = $ARRAYTMANEJO[0]['NOMBRE_TMANEJO'];
    } else {
        $TMANEJO = "Sin Manejo";
    }
    if ($ARRAYCALIBRE) {
        $CALIBRE = $ARRAYCALIBRE[0]['NOMBRE_TCALIBRE'];
    } else {
        $CALIBRE  = "Sin Calibre";
    }
    if ($ARRAYEMBALAJE) {
        $EMBALAJE = $ARRAYEMBALAJE[0]['NOMBRE_TEMBALAJE'];
    } else {
        $EMBALAJE = "Sin Embalaje";
    }
    if ($r['STOCK']) {
        $STOCK = $r['STOCK'];
    } else {
        $STOCK = "Sin Stock";
    }

    $html = $html . '
    <tr>
            <td class=" left">' . $r['FOLIO_NUEVO_DREPALETIZAJE'] . '</td>
            <td class=" center">' . $r['EMBALADO'] . '</td>
            <td class=" center">' . $ARRAYEVERERECEPCIONID[0]['CODIGO_ESTANDAR'] . '</td>
            <td class=" center">' . $ARRAYEVERERECEPCIONID[0]['NOMBRE_ESTANDAR'] . '</td>
            <td class=" center ">' . $ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'] . ' </td>
            <td class=" center ">' . $ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'] . ' </td>
            <td class=" center ">' . $ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'] . ' </td>
            <td class=" center">' . $r['ENVASE'] . '</td>
            <td class=" center">' . $r['NETO'] . '</td>
            <td class=" center">' . $TMANEJO . '</td>
            <td class=" center">' . $CALIBRE . '</td>
            <td class=" center">' . $EMBALAJE . '</td>
            <td class=" center">' . $STOCK . '</td>
    </tr>
    ';
endforeach;
$html = $html . '
    <tr>
        <th class="color left">&nbsp;</th>
        <th class="color center">&nbsp;</th>
        <th class="color center">&nbsp;</th>
        <th class="color center">&nbsp;</th>
        <th class="color center ">&nbsp; </th>
        <th class="color center ">&nbsp; </th>
        <th class="color right">Sub Total</th>
        <th class="color center">' . $TOTALENVASEREPA . '</th>
        <th class="color center">' . $TOTALNETOREPA . '</th>
        <th class="color center ">&nbsp; </th>
        <th class="color center ">&nbsp; </th>
        <th class="color center ">&nbsp; </th>
        <th class="color center ">&nbsp; </th>
    </tr>
';
$html = $html . '

    </tbody>
</table>
';
$html = $html . '

<table border="0" cellspacing="0" cellpadding="0">
    <tbody>
        <tr>
            <th colspan="12" class="center color2"> </th>
        </tr>
        <tr>        
            <th class="color left">&nbsp;</th>
            <th class="color center">&nbsp; </th>
            <th class="color center">&nbsp; </th>
            <th class="color left">&nbsp;</th>
            <th class="color left">&nbsp;</th>
            <th class="color right">Diferencia</th>
            <th class="color center">' . $TOTALE . '</th>
            <th class="color center">' . $TOTALNE . '</th>
            <th class="color center ">&nbsp; </th>
            <th class="color center ">&nbsp; </th>
            <th class="color center ">&nbsp; </th>
            <th class="color center ">&nbsp; </th>
        </tr>
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
$NOMBREARCHIVO = "InformeRecepionRepaletizaje_";
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
$TIPOINFORME = "Informe Repaletizaje Producto Terminado";
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
