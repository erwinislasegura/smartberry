<?php

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES 
include_once '../../assest/controlador/PLANTA_ADO.php';
include_once '../../assest/controlador/TEMPORADA_ADO.php';
include_once '../../assest/controlador/EMPRESA_ADO.php';


include_once '../../assest/controlador/DRECEPCIONPT_ADO.php';
include_once '../../assest/controlador/RECEPCIONPT_ADO.php';

include_once '../../assest/controlador/VESPECIES_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/TCALIBRE_ADO.php';
include_once '../../assest/controlador/EEXPORTACION_ADO.php';
include_once '../../assest/controlador/TMANEJO_ADO.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$EMPRESA_ADO = new EMPRESA_ADO();
$PLANTA_ADO = new PLANTA_ADO();
$TEMPORADA_ADO = new TEMPORADA_ADO();

$DRECEPCIONPT_ADO =  new DRECEPCIONPT_ADO();
$RECEPCIONPT_ADO =  new RECEPCIONPT_ADO();

$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$TCALIBRE_ADO =  new TCALIBRE_ADO();
$EEXPORTACION_ADO =  new EEXPORTACION_ADO();
$TMANEJO_ADO =  new TMANEJO_ADO();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$NUMERORECEPCIONPT = "";
$FECHARECEPCIONPT = "";
$PRODUCTOR = "";
$ESTANDAR = "";

$VARIEDAD = "";
$TURNO = "";
$EMBOLSADO = "";
$NOMBRECALIBRE = "";

$PRODUCTOR = "";
$CSGPRODUCTOR = "";
$NOMBREPRODUCTOR = "";


$TOTALENVASEDRECEPCIONPT = "";
$TOTALNETODRECEPCIONPT = "";
$TOTALBRUTODRECEPCIONPT = "";


$EMPRESA = "";
$COC = "";
$EMPRESAURL = "";

$html = '';

//INICIALIZAR ARREGLOS
$ARRAYVERTRECEPCIONPT = "";
$ARRAYVERPVESPECIES = "";
$ARRAYVERVESPECIES = "";

$ARRAYEMPRESA = "";
$ARRAYRECEPCIONPT = "";

$ARRAYDRECEPCIONPT = "";
$ARRAYDRECEPCIONPT2 = "";
$ARRAYDRECEPCIONPTTOTALES = "";

$ARRAYCALIBRE = "";

if (isset($_REQUEST['parametro'])) {
	$IDOP = $_REQUEST['parametro'];
	$NUMERORECEPCIONPT = $IDOP;
}

$ARRAYRECEPCIONPT = $RECEPCIONPT_ADO->verRecepcion2($NUMERORECEPCIONPT);
$ARRAYDRECEPCIONPT = $DRECEPCIONPT_ADO->buscarPorIdRecepcion2($NUMERORECEPCIONPT);
$ARRAYDRECEPCIONPTTOTALES = $DRECEPCIONPT_ADO->obtenerTotales2($NUMERORECEPCIONPT);
$FECHARECEPCIONPT = $ARRAYRECEPCIONPT[0]['FECHA_RECEPCION'];

$PRODUCTOR = $ARRAYRECEPCIONPT[0]['ID_PRODUCTOR'];
$ARRAYPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
$NOMBREPRODUCTOR = $ARRAYPRODUCTOR[0]['NOMBRE_PRODUCTOR'];
$CSGPRODUCTOR = $ARRAYPRODUCTOR[0]['CSG_PRODUCTOR'];


$ARRAYEMPRESA = $EMPRESA_ADO->verEmpresa($ARRAYRECEPCIONPT[0]['ID_EMPRESA']);
$EMPRESA = $ARRAYEMPRESA[0]['NOMBRE_EMPRESA'];
$EMPRESAURL = $ARRAYEMPRESA[0]['LOGO_EMPRESA'];
$COC = $ARRAYEMPRESA[0]['COC'];

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
$FECHANOMBRE = $NOMBREDIA . ", " . $DIA . " de " . $NOMBREMES . " del " . $ANO;

$html = '
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tarja Proceso </title>

<style type="text/css">	
</style>

</head>

<body>
    

';
//PRODUCTO TERMINADO

foreach ($ARRAYDRECEPCIONPT as $r) :

	$ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);
	$ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
	$ARRAYEVEEXPORTACIONID = $EEXPORTACION_ADO->verEstandar($r['ID_ESTANDAR']);
	$ARRAYCALIBRE = $TCALIBRE_ADO->verCalibre($r['ID_TCALIBRE']);
	$ARRAYTMANEJO = $TMANEJO_ADO->verTmanejo($r['ID_TMANEJO']);
	$TMANEJO = $ARRAYTMANEJO[0]['NOMBRE_TMANEJO'];

	if ($r['EMBOLSADO_DRECEPCION'] == "1") {
		$EMBOLSADO = "SI";
	}
	if ($r['EMBOLSADO_DRECEPCION'] == "0") {
		$EMBOLSADO = "NO";
	}
	if ($r['PREFRIO_DRECEPCION'] == "1") {
		$PREFRIO = "SI";
	}
	if ($r['PREFRIO_DRECEPCION'] == "0") {
		$PREFRIO =  "NO";
	}

	if ($r['GASIFICADO_DRECEPCION'] == "1") {
		$GASIFICACION = "SI";
	}
	if ($r['GASIFICADO_DRECEPCION'] == "0") {
		$GASIFICACION =  "NO";
	}


	$html = $html . '
    <div class=" " >
		<div class="titulotarja" style="text-align: center; >
             <b  "> 
				 <img src="../../assest/img/logo.png" width="90px" height="25px"/>
             </b><br>
            <b > 
				PRODUCTO TERMINADO :   ' . $r['FOLIO_DRECEPCION'] . ' 
			</b>	
		</div>							
		<div class="subtitulotarja " > 
			&nbsp;<b> Estandar : </b> ' . $ARRAYEVEEXPORTACIONID[0]['NOMBRE_ESTANDAR'] . '<br>
			&nbsp;<b> Total Envase : </b> ' . $r['ENVASE'] . '<br>
			&nbsp;<b> Total Neto : </b>   ' . $r['NETO'] . '<br>       
		</div>	
';




	$html = $html . '   
  <table border="0" cellspacing="0" cellpadding="0" >
    <thead>   
	  <tr>
            <th colspan="8" class="center color2"></th>
      </tr>
      <tr>
        <th class=" center">Fecha Embalado</th>
        <th class=" center ">CSG </th>
        <th class=" center ">Nombre Productor </th>
        <th class=" center ">Variedad </th>
        <th class=" center">Cant. Envase</th>
        <th class=" center">Kilos Neto</th>
        <th class=" center">Calibre</th>
		<th class=" center">Tipo Manejo</th> 
        <th class=" center ">Embolsado </th>
		<th class=" center">Gasificado</th>    
		<th class=" center">Prefrio</th>      
      </tr>
    </thead>
     <tbody>
	 
    ';

	$html = $html . ' 
    <tr >
        <td class="center"> ' . $r['EMBALADO'] . '</td>
        <td  class="center  ">' . $ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'] . '</td>
        <td  class="center  ">' . $ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'] . '</td>
        <td  class="center  ">' . $ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'] . '</td>
        <td  class="center  ">' . $r['ENVASE'] . '</td>
        <td  class="center ">' . $r['NETO'] . '</td>
        <td  class="center  ">' . $ARRAYCALIBRE[0]['NOMBRE_TCALIBRE'] . '</td>
        <td  class="center  ">' . $TMANEJO . '</td>
        <td  class="center  ">' . $EMBOLSADO . '</td>
        <td  class="center  ">' . $GASIFICACION . '</td>
        <td  class="center  ">' . $PREFRIO . '</td>
    </tr>
    ';

	$html = $html . '
    </tbody>
  </table>
  
  ';

	$html = $html . '
		<div class="subtitulo2"></div>   
      </div> 
	  <div class="salto" style=" page-break-after: always; border: none;   margin: 0;   padding: 0;"></div>   
    ';
endforeach;





$html = $html . '
	
</body>
</html>


';


$html = $html . '
';


//API DE GENERACION DE PDF
require_once '../../api/mpdf/mpdf/autoload.php';
require_once '../../api/mpdf/qrcode/autoload.php';

$PDF = new \Mpdf\Mpdf(['format' => [150, 100]]);
//$PDF = new \Mpdf\Mpdf();
//$PDF = new \Mpdf\Mpdf(['format'=> 'Letter']);

//$mpdf=new mPDF('utf-8','A4');
//$mpdf=new mPDF('utf-8','A4');
//$mpdf=new mPDF('utf-8','A4-L');
//$mpdf=new mPDF('utf-8','A3');
//$mpdf=new mPDF('utf-8','Letter');
//$mpdf=new mPDF('utf-8','150mm 150mm');
//$mpdf=new mPDF('utf-8','11.69in 8.27in');




//CREACION NOMBRE DEL ARCHIVO
$NOMBREARCHIVO = "TarjaRecepcionPT_";
$FECHADOCUMENTO = $FECHANORMAL . "_" . $HORAFINAL;
$TIPODOCUMENTO = "Tarja";
$FORMATO = ".pdf";
$NOMBREARCHIVOFINAL = $NOMBREARCHIVO . $FECHADOCUMENTO . $FORMATO;

//CONFIGURACIOND DEL DOCUMENTO
$TIPOPAPEL = "";
$ORIENTACION = "";

//DETALLE DEL CREADOR DEL INFORME
$TIPOINFORME = "Tarja ";
$CREADOR = "Usuario";
$AUTOR = "Usuario";
$ASUNTO = "Tarja Recepcio PT";



$PDF->SetHTMLHeader('
    
');

$PDF->SetHTMLFooter('


    
<footer>
<div class="" style="text-align: center;  ">
	<b>' . $EMPRESA . ' - ' . $COC . '.</b> 
  </div>
</footer>
    
');

$PDF->SetTitle($TIPOINFORME); //titulo pdf
$PDF->SetCreator($CREADOR); //CREADOR PDF
$PDF->SetAuthor($AUTOR); //AUTOR PDF
$PDF->SetSubject($ASUNTO); //ASUNTO PDF

//CONFIGURACION

//$PDF->simpleTables = true; 
//$PDF->packTableData = true;

//CONTENIDO PDF
$stylesheet1 = file_get_contents('../../assest/css/styleTarja.css'); // carga archivo css
$stylesheet2 = file_get_contents('../../assest/css/reset.css'); // carga archivo css
$PDF->WriteHTML($stylesheet1, 1);
$PDF->WriteHTML($stylesheet2, 1);
$PDF->WriteHTML($html);


//$PDF->Output();
$PDF->Output($NOMBREARCHIVOFINAL, \Mpdf\Output\Destination::INLINE);
