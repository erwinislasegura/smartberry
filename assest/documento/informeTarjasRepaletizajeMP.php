<?php

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES 
include_once '../controlador/DREPALETIZAJEMP_ADO.php';
include_once '../controlador/REPALETIZAJEMP_ADO.php';

include_once '../controlador/FOLIO_ADO.php';
include_once '../controlador/EMPRESA_ADO.php';
include_once '../controlador/PVESPECIES_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/ERECEPCION_ADO.php'; 
include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/EXIMATERIAPRIMA_ADO.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$DREPALETIZAJEMP_ADO = new DREPALETIZAJEMP_ADO();
$REPALETIZAJEMP_ADO = new REPALETIZAJEMP_ADO();
$FOLIO_ADO =  new FOLIO_ADO();
$EMPRESA_ADO = new EMPRESA_ADO();
$ERECEPCION_ADO =  new ERECEPCION_ADO();
$PVESPECIES_ADO = new PVESPECIES_ADO();
$VESPECIES_ADO = new VESPECIES_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$EXIMATERIAPRIMA_ADO =  new EXIMATERIAPRIMA_ADO();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP="";
$NUMEROREPALETIZAJE="";
$FECHAINGRESO="";
$FECHAMODIFICACION="";
$MOTIVO="";

$FOLIO="";
$PRODUCTOR="";
$ALIASFOLIO="";

$CODIGOPRODUCTOR="";
$NOMBREPRODUCTOR="";
$EMPRESA="";
$EMPRESAURL="";
$FOLIOBASE="";
$TOTALENVASE="";
$TOTALNETO="";
$TOTALBRUTO="";
$CSGPRODUCTOR="";
$TAMAÑO="";
$ALIASFOLIO="";

//INICIALIZAR ARREGLOS
$ARRAYREPALETIZAJEMP="";
$ARRAYDREPALETIZAJEMP="";
$ARRAYEXIMATERIAPRIMA="";
$ARRAYFOLIO="";
$ARRAYEMPRESA="";
$ARRAYVESPECIES="";
$ARRAYPVESPECIES="";
$ARRAYEEXPORTACION="";
$ARRAYPRODUCTOR="";
$ARRAYPRODUCTOR2="";

if (isset($_REQUEST['parametro']) ) {
    $IDOP = $_REQUEST['parametro'];
}

$ARRAYREPALETIZAJEMP = $REPALETIZAJEMP_ADO->verRepaletizaje2($IDOP);
$ARRAYDREPALETIZAJEMP = $DREPALETIZAJEMP_ADO->buscarDrepaletizaje2($IDOP); 

$FECHAINGRESO=$ARRAYREPALETIZAJEMP[0]['INGRESO'];

$NUMEROREPALETIZAJE=$ARRAYREPALETIZAJEMP[0]['NUMERO_REPALETIZAJE'];





$ARRAYFOLIO=$FOLIO_ADO->verFolio($FOLIO);
//$ALIASFOLIO=$ARRAYDRECEPCION[0]['ALIAS_FOLIO_DRECEPCION'];
$ARRAYEMPRESA=$EMPRESA_ADO->verEmpresa($ARRAYREPALETIZAJEMP[0]['ID_EMPRESA']);
$EMPRESA=$ARRAYEMPRESA[0]['NOMBRE_EMPRESA'];
$EMPRESAURL=$ARRAYEMPRESA[0]['LOGO_EMPRESA'];

if($EMPRESAURL==""){
    $EMPRESAURL="img/empresa/no_disponible.png";
}


//OBTENCION DE LA FECHA
date_default_timezone_set('America/Santiago');
//SE LE PASA LA FECHA ACTUAL A UN ARREGLO
$ARRAYFECHADOCUMENTO =getdate();

//SE OBTIENE INFORMACION RELACIONADA CON LA HORA
$HORA="".$ARRAYFECHADOCUMENTO['hours'];
$MINUTO="".$ARRAYFECHADOCUMENTO['minutes'];
$SEGUNDO="".$ARRAYFECHADOCUMENTO['seconds'];
//EN CASO DE VALORES MENOS A 2 LENGHT, SE LE CONCATENA UN 0
if ($MINUTO < 10) {
    $MINUTO = "0".$MINUTO;
}
if ($SEGUNDO < 10) {
    $SEGUNDO = "0".$SEGUNDO;
}

// SE JUNTA LA INFORMAICON DE LA HORA Y SE LE DA UN FORMATO
$HORAFINAL=$HORA."".$MINUTO."".$SEGUNDO;
$HORAFINAL2=$HORA.":".$MINUTO.":".$SEGUNDO;

//SE OBTIENE INFORMACION RELACIONADA CON LA FECHA
$DIA="".$ARRAYFECHADOCUMENTO['mday'];

$MES="".$ARRAYFECHADOCUMENTO['mon'];
$ANO="".$ARRAYFECHADOCUMENTO['year'];
$NOMBREMES="".$ARRAYFECHADOCUMENTO['month'];
$NOMBREDIA="".$ARRAYFECHADOCUMENTO['weekday'];
//EN CASO DE VALORES MENOS A 2 LENGHT, SE LE CONCATENA UN 0
if ($DIA < 10) {
    $DIA = "0".$DIA;
}
//PARA TRAUDCIR EL MES AL ESPAÑOL
$MESESNOMBRES= array(
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
$DIASNOMBRES= array(
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
$FECHANORMAL=$DIA."".$MES."".$ANO;
$FECHANOMBRE=$NOMBREDIA.", ".$DIA." de ".$NOMBREMES." del ".$ANO;



$html='
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tarja Repaletizaje Materia Prima</title>

<style type="text/css">	
	{
		padding: 0px;
		border: 0px;
		margin: 0px;
	}
	div.contenido
	{
		width: calc(8cm - 22px);
		height: auto;
		border: solid 1px rgba(0,0,0,0.5);
		margin: 0 auto;
		padding: 2px 0px;
		overflow: hidden;
	}
	div.contenido div.titulo
	{
		width: 100%;
		height: auto;
		background-color: transparent;
		font-family: Helvetica;
		font-size: 15px;
		padding: 5px 0px 0px 0px;
	}
	div.contenido div.subtitulo
	{
		width: 100%;
		height: auto;
		background-color: transparent;
		font-family: Helvetica;
		font-size: 14px;
		font-weight: lighter;

	}
	div.contenido div.subtitulo2
	{
		width: 100%;
		height: auto;
		background-color: transparent;
		font-family: Helvetica;
		font-size: 12px;
		margin-bottom: 5px;
		text-decoration: underline;
		text-transform: uppercase;
		text-align: center;
		margin-top: 5px;
		border-top: dotted 1px black;
		padding-top: 5px;
	}
	div.contenido div.info
	{
		width: 100%;
		height: auto;
		background-color: transparent;
		font-family: Helvetica;
		font-size: 11px;
		padding: 0px 0px;
		text-align: justify;
		padding-left: 10px;
	}
	div.contenido div.valor
	{
		width: calc(100% - 2px);
		height: auto;
		background-color: transparent;
		font-family: Helvetica;
		font-size: 30px;
		padding: 5px 0px;
		text-align: right;
		border:solid 1px rgba(0,0,0,0.5);
		overflow: hidden;
		margin-top: 5px;
	}

	div.contenido div.valor span
	{
		width: 100%;
		height: auto;
		background-color: transparent;
		font-family: Helvetica;
		font-size: 16px;
		padding: 5px 0px;
		text-align: right;
	}
	b{
		/*text-transform: uppercase;*/
	}
	div.contenido div.desc
	{
		width: 100%;
		height: auto;
		background-color: transparent;
		font-family: Helvetica;
		font-size: 14px;
		padding: 5px 0px;
		text-align: justify;
	}
	div.contenido div.chip
	{
		width: calc(50% - 2px);
		height: 2cm;
		background-color: transparent;
		font-family: Helvetica;
		font-size: 14px;
		padding: 5px 0px;
		text-align: center;
		line-height: 2cm;
		float: left;
		border:solid 1px rgba(0,0,0,0.3);
	}

</style>

</head>

<body>
    

';


foreach ($ARRAYDREPALETIZAJEMP as $s) :
    
    $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($s['ID_PRODUCTOR']);    
    $ARRAYEXIMATERIAPRIMA = $EXIMATERIAPRIMA_ADO->buscarPorFolio2($s['FOLIO_NUEVO_DREPALETIZAJE']);  
    $ARRAYPVESPECIES=$PVESPECIES_ADO->verPvespecies($s['ID_PVESPECIES']);
    $ARRAYVESPECIES=$VESPECIES_ADO->verVespecies($ARRAYPVESPECIES[0]['ID_VESPECIES']);
    $ARRAYEEXPORTACION=$ERECEPCION_ADO->verEstandar($s['ID_ESTANDAR']);


    $html=$html.'
    <div class="contenido" style="height:250px!important;">
		<div class="titulo" style="text-align: center; font-size: 14; ">
             <b > 
				 <img src="../vista/img/logo.png" width="100px" height="30px"/>
			 </b>
             <br>
             <b>Materia Prima </b>	
		</div>		
		<div class="subtitulo2">
			<b style="font-size:11;"></b>
		</div>

		<div class="info">
			<b> Numero Repaletizaje : </b> '.$NUMEROREPALETIZAJE.'
		</div>
		<div class="info">
			<b> &nbsp; </b> 
		</div>
		<div class="info">
			<b> Fecha Repaletizaje : </b>  '.$FECHAINGRESO.'
		</div>
		<div class="info">
			<b> &nbsp; </b> 
		</div>
		<div class="info">
			<b> CSG : </b>  '.$ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'].'
		</div>
        <br>
		<div class="subtitulo2"></div>
        
        <br>
  ';

  if(strlen($ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'])<="19"){
		$TAMAÑO="f25";
	}
	if(strlen($ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'])>"19" && strlen($ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'])<="25"){
		$TAMAÑO="f20";
	}    
	if(strlen($ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'])>"25" && strlen($ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'])<="42"){
		$TAMAÑO="f15";
	}
	if(strlen($ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'])>"42" && strlen($ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'])<="61"){
		$TAMAÑO="f10";
	}
	if(strlen($ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'])>"61" && strlen($ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'])<="70"){
		$TAMAÑO="f9";
	}



  $html=$html.'
		<div class="'.$TAMAÑO.' center " width="100%">
			<b >'.$ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'].' </b> 
		</div>
        <br>
       

		<div class="subtitulo2"></div>

		<div class="info justify">
			<b> Fecha Cosecha : </b>  '.$ARRAYEXIMATERIAPRIMA[0]['FECHA'].'
		</div>
        <br>
		<div class="info justify">
             <b> Estandar : </b>  '.$ARRAYEEXPORTACION[0]['NOMBRE_ESTANDAR'].'
		</div>
		<div class="info justify">
			<b>  &nbsp; </b>  
		</div>
        <br>

		<div class="subtitulo2"></div>
	
        <div class=" center">
           Kilos Neto  
        </div>
        <div class="f20 center">
            <b> '.$ARRAYEXIMATERIAPRIMA[0]['NETO'].' </b> 
        </div>
        <br>
        <div class=" center">
             N° Folio   
        </div>        
        <div class="f30 center">
           <b> '.$s['FOLIO_NUEVO_DREPALETIZAJE'].' </b> 
        </div>
        <br>
        <div class=" center">
             Variedad  
        </div>	
       
        <div class="f20 center">
              <b> '.$ARRAYVESPECIES[0]['NOMBRE_VESPECIES'].' </b> 
        </div>

        <br>
        <div class=" center">
             N° Envases  
        </div>	
               
        <div class="f20 center">
               <b> '.$ARRAYEXIMATERIAPRIMA[0]['ENVASE'].' </b> 
        </div>		    
        <br>
		<div class="subtitulo2"></div>
		';
		if($s['ALIAS_FOLIO_DREPALETIZAJE']){
			$ALIASFOLIO=$s['ALIAS_FOLIO_DREPALETIZAJE'];
		}else{
			
			$ALIASFOLIO=$s['FOLIO_NUEVO_DREPALETIZAJE'];
		}

		$html=$html.'

        <div class="subtitulo center" style="font-size: 18px; text-align: center;">
			 <barcode code="'.$ALIASFOLIO.'" size="0.9" type="QR"  class="barcode" disableborder="1" />
		</div>
        <div class="titulo center">
           <b style="font-size: 10px;">  '.$EMPRESA.' </b>
        </div>

        

      </div>  
    ';



endforeach; 
$html=$html.'
	
</body>
</html>


';


$html=$html.'
';



//CREACION NOMBRE DEL ARCHIVO
$NOMBREARCHIVO="TarjaRecepionGranel_";
$FECHADOCUMENTO = $FECHANORMAL."_".$HORAFINAL;
$TIPODOCUMENTO="INFORME";
$FORMATO=".pdf";
$NOMBREARCHIVOFINAL=$NOMBREARCHIVO.$FECHADOCUMENTO.$FORMATO;

//CONFIGURACIOND DEL DOCUMENTO
$TIPOPAPEL="";
$ORIENTACION="";

//DETALLE DEL CREADOR DEL INFORME
$TIPOINFORME = "TARJA RECEPCION GRANEL";
$CREADOR = "USUARIO";
$AUTOR = "USUARIO";
$ASUNTO = "TARJA ";


//API DE GENERACION DE PDF
require_once '../api/mpdf/mpdf/autoload.php';
require_once '../api/mpdf/qrcode/autoload.php';

$PDF = new \Mpdf\Mpdf(['format'=>[100,200] ]);
//$PDF = new \Mpdf\Mpdf();
//$PDF = new \Mpdf\Mpdf(['format'=> 'Letter']);

//$mpdf=new mPDF('utf-8','A4');
//$mpdf=new mPDF('utf-8','A4');
//$mpdf=new mPDF('utf-8','A4-L');
//$mpdf=new mPDF('utf-8','A3');
//$mpdf=new mPDF('utf-8','Letter');
//$mpdf=new mPDF('utf-8','150mm 150mm');
//$mpdf=new mPDF('utf-8','11.69in 8.27in');
/*
$PDF->SetHTMLHeader('
    <table width="100%" >
        <tbody>
            <tr>
            </tr>
        </tbody>
    </table>
    <br>
    
');

$PDF->SetHTMLFooter('


    <table width="100%" >
        <tbody>
            <tr>
            </tr>
        </tbody>
    </table>
    
');
*/
$PDF->SetTitle($TIPOINFORME); //titulo pdf
$PDF->SetCreator($CREADOR); //CREADOR PDF
$PDF->SetAuthor($AUTOR); //AUTOR PDF
$PDF->SetSubject($ASUNTO); //ASUNTO PDF

//CONFIGURACION

//$PDF->simpleTables = true; 
//$PDF->packTableData = true;


$stylesheet = file_get_contents('../vista/css/stylePdf.css'); // carga archivo css
$stylesheet2 = file_get_contents('../vista/css/reset.css'); // carga archivo css
$PDF->WriteHTML($stylesheet, 1); 
$PDF->WriteHTML($stylesheet2, 1); 
$PDF->WriteHTML($html);
//$PDF->Output();
$PDF->Output($NOMBREARCHIVOFINAL, \Mpdf\Output\Destination::INLINE);

?>