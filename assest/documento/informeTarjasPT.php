<?php

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES 
include_once '../../assest/controlador/EXIEXPORTACION_ADO.php';
include_once '../../assest/controlador/EXIINDUSTRIAL_ADO.php';
include_once '../../assest/controlador/REPALETIZAJEEX_ADO.php';
include_once '../../assest/controlador/DREPALETIZAJEEX_ADO.php';

include_once '../../assest/controlador/PROCESO_ADO.php';
include_once '../../assest/controlador/DPEXPORTACION_ADO.php';
include_once '../../assest/controlador/DPINDUSTRIAL_ADO.php';

include_once '../../assest/controlador/REEMBALAJE_ADO.php';
include_once '../../assest/controlador/DREXPORTACION_ADO.php';
include_once '../../assest/controlador/DRINDUSTRIAL_ADO.php';

include_once '../../assest/controlador/EEXPORTACION_ADO.php';
include_once '../../assest/controlador/EINDUSTRIAL_ADO.php';

include_once '../../assest/controlador/FOLIO_ADO.php';
include_once '../../assest/controlador/EMPRESA_ADO.php';
include_once '../../assest/controlador/VESPECIES_ADO.php';
include_once '../../assest/controlador/TCALIBRE_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$EXIEXPORTACION_ADO= new EXIEXPORTACION_ADO();
$EXIINDUSTRIAL_ADO= new EXIINDUSTRIAL_ADO();
$REPALETIZAJEEX_ADO= new REPALETIZAJEEX_ADO();
$DREPALETIZAJEEX_ADO= new DREPALETIZAJEEX_ADO();


$PROCESO_ADO= new PROCESO_ADO();
$DPEXPORTACION_ADO= new DPEXPORTACION_ADO();
$DPINDUSTRIAL_ADO= new DPINDUSTRIAL_ADO();

$REEMBALAJE_ADO= new REEMBALAJE_ADO();
$DREXPORTACION_ADO= new DREXPORTACION_ADO();
$DRINDUSTRIAL_ADO= new DRINDUSTRIAL_ADO();


$EEXPORTACION_ADO= new EEXPORTACION_ADO();
$EINDUSTRIAL_ADO= new EINDUSTRIAL_ADO();

$TCALIBRE_ADO= new TCALIBRE_ADO();
$FOLIO_ADO =  new FOLIO_ADO();
$EMPRESA_ADO = new EMPRESA_ADO();
$VESPECIES_ADO = new VESPECIES_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$NUMEROREPALETIZAJE = "";
$FECHAINGRESO = "";
$FECHAMODIFICACION = "";
$MOTIVO = "";

$FOLIO = "";
$PRODUCTOR = "";
$ALIASFOLIO = "";

$CODIGOPRODUCTOR = "";
$NOMBREPRODUCTOR = "";
$EMPRESA = "";
$EMPRESAURL = "";
$FOLIOBASE = "";
$TOTALENVASE = "";
$TOTALNETO = "";
$TOTALBRUTO = "";
$CSGPRODUCTOR = "";
$TAMAÑO = "";
$ALIASFOLIO = "";
$TOTALENVASE = "";
$TOTALNETO = "";
$TIPO=0;


//INICIALIZAR ARREGLOS
$ARRAYREPALETIZAJEMP = "";
$ARRAYDREPALETIZAJEMP = "";
$ARRAYDREPALETIZAJEMPTOTALES = "";
$ARRAYEXIMATERIAPRIMA = "";
$ARRAYFOLIO = "";
$ARRAYEMPRESA = "";
$ARRAYVESPECIES = "";
$ARRAYPVESPECIES = "";
$ARRAYEEXPORTACION = "";
$ARRAYPRODUCTOR = "";
$ARRAYPRODUCTOR2 = "";
$ARRAYCALIBRE = "";
if (isset($_REQUEST['parametro'])) {
	$IDOP = $_REQUEST['parametro'];
}


if (isset($_REQUEST['parametro1'])) {
	$ARRAYEMPRESA=$EMPRESA_ADO->verEmpresa($_REQUEST['parametro1']);
	$NOMBREEMPRESA=$ARRAYEMPRESA[0]['NOMBRE_EMPRESA'];
	$EMPRESA=$_REQUEST['parametro1'];
}
if (isset($_REQUEST['parametro2'])) {
	$PLANTA=$_REQUEST['parametro2'];
}
if (isset($_REQUEST['tipo'])) {
	$TIPO=$_REQUEST['tipo'];
}

if($TIPO==1){
	$ARRAYEXISTENCIAPT = $EXIEXPORTACION_ADO->buscarPorFolioAgrupadoDisponible($IDOP,$EMPRESA,$PLANTA);
}
if($TIPO==2){
	$ARRAYEXISTENCIAPT = $EXIEXPORTACION_ADO->buscarPorFolioAgrupadoDespachado($IDOP,$EMPRESA,$PLANTA);
}
if ($TIPO==3){
	$ARRAYEXISTENCIAPT = $EXIEXPORTACION_ADO->buscarPorFolioAgrupadoHistorial($IDOP,$EMPRESA,$PLANTA);
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
	<title>Tarja Producto Terminado </title>
</head>
<body>
    

';
//PRODUCTO TERMINADO

foreach ($ARRAYEXISTENCIAPT as $r) :
	if($TIPO==1){
		$ARRAYEXISTENCIAPORFOLIO=$EXIEXPORTACION_ADO->buscarPorFoliotTarjaDisponible($r['FOLIO_AUXILIAR_EXIEXPORTACION'],$r['ID_EMPRESA'],$r['ID_PLANTA']);
	}
	if($TIPO==2){
		$ARRAYEXISTENCIAPORFOLIO=$EXIEXPORTACION_ADO->buscarPorFoliotTarjaDespachado($r['FOLIO_AUXILIAR_EXIEXPORTACION'],$r['ID_EMPRESA'],$r['ID_PLANTA']);
	}
	if ($TIPO==3){
		$ARRAYEXISTENCIAPORFOLIO=$EXIEXPORTACION_ADO->buscarPorFoliotTarjaHistorial($r['FOLIO_AUXILIAR_EXIEXPORTACION'],$r['ID_EMPRESA'],$r['ID_PLANTA']);
	}
	$ARRAYEEXPORTACION = $EEXPORTACION_ADO->verEstandar($r['ID_ESTANDAR']);
	if($ARRAYEEXPORTACION){
		$CODIGOESTANDAR = $ARRAYEEXPORTACION[0]["CODIGO_ESTANDAR"];
		$NOMBREESTANDAR = $ARRAYEEXPORTACION[0]["NOMBRE_ESTANDAR"];
	}else{
		$CODIGOESTANDAR="Sin Datos";
		$NOMBREESTANDAR="Sin Datos";
	}
	$html = $html . '
    <div class=" " >
		<div class="titulotarja" style="text-align: center; >
             <b  "> 
				 <img src="../../assest/img/logo.png" width="90px" height="25px"/>
             </b><br>
            <b > 
				PRODUCTO TERMINADO :   ' . $r['FOLIO_AUXILIAR_EXIEXPORTACION'] . ' 
			</b>	
		</div>							
		<div class="subtitulotarja " > 
			&nbsp;<b> Estandar : </b> '.$NOMBREESTANDAR.' <br>
			&nbsp;<b> Total Envase : </b> ' . $r['ENVASE'] . '<br>
			&nbsp;<b> Total Neto : </b>   ' . $r['NETO'] . ' <br>       
		</div>	
';



	$html = $html . '   
  <table border="0" cellspacing="0" cellpadding="0"  >
    <thead>   	  
      <tr>
        <th class=" center">Fecha Embalado</th>
        <th class=" center ">CSG </th>
        <th class=" center ">Nombre Productor </th>
        <th class=" center ">Cant. Envase</th>
        <th class=" center ">Kilos Neto</th>
        <th class=" center ">Embolsado </th>
        <th class=" center ">Variedad </th>
      </tr>
    </thead>
     <tbody >
	 
    ';

	foreach ($ARRAYEXISTENCIAPORFOLIO as $s) :
		$ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($s['ID_PRODUCTOR']);
		$ARRAYVESPECIES = $VESPECIES_ADO->verVespecies($s['ID_VESPECIES']);

		if ($s['EMBOLSADO'] == "1") {
			$EMBOLSADO = "SI";
		}
		if ($s['EMBOLSADO'] == "0") {
			$EMBOLSADO = "NO";
		}
	
	

		$html = $html . ' 
    <tr >
        <td  class="center"> ' . $s['EMBALADO'] . '</td>
        <td  class="center  ">' . $ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'] . '</td>
        <td  class="center  ">' . $ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'] . '</td>
        <td  class="center  ">' . $s['ENVASE'] . '</td>
        <td  class="center ">' . $s['NETO'] . '</td>
        <td  class="center  ">' . $EMBOLSADO . '</td>
        <td  class="center  ">' . $ARRAYVESPECIES[0]['NOMBRE_VESPECIES'] . '</td>
    </tr>
    ';


	endforeach;

	$html = $html . '
    </tbody>
  </table>  
  ';

	$html = $html . '
	
</div>  
	  <div class="salto" style=" page-break-after: always; border: none;   margin: 0;   padding: 0;"></div>  


    ';
endforeach;







$html = $html . '
	
</body>
</html>


';



//CREACION NOMBRE DEL ARCHIVO
$NOMBREARCHIVO = "TarjaProductoTerminado_";
$FECHADOCUMENTO = $FECHANORMAL . "_" . $HORAFINAL;
$TIPODOCUMENTO = "INFORME";
$FORMATO = ".pdf";
$NOMBREARCHIVOFINAL = $NOMBREARCHIVO . $FECHADOCUMENTO . $FORMATO;

//CONFIGURACIOND DEL DOCUMENTO
$TIPOPAPEL = "";
$ORIENTACION = "";

//DETALLE DEL CREADOR DEL INFORME
$TIPOINFORME = "TARJA PRODUCTO TERMINADO";
$CREADOR = "USUARIO";
$AUTOR = "USUARIO";
$ASUNTO = "TARJA ";


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

$PDF->SetHTMLHeader('
   
    
');

$PDF->SetHTMLFooter('


    
<footer>
<div class="" style="text-align: center;  ">
	<b>' . $NOMBREEMPRESA . '.</b> 
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


$stylesheet1 = file_get_contents('../../assest/css/styleTarja.css'); // carga archivo css
$stylesheet2 = file_get_contents('../../assest/css/reset.css'); // carga archivo css
$PDF->WriteHTML($stylesheet1, 1);
$PDF->WriteHTML($stylesheet2, 1);
$PDF->WriteHTML($html);
//$PDF->Output();
$PDF->Output($NOMBREARCHIVOFINAL, \Mpdf\Output\Destination::INLINE);
