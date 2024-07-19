<?php

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES 
include_once '../../assest/controlador/DRECEPCIONMP_ADO.php';
include_once '../../assest/controlador/RECEPCIONMP_ADO.php';
include_once '../../assest/controlador/FOLIO_ADO.php';
include_once '../../assest/controlador/EMPRESA_ADO.php';
include_once '../../assest/controlador/VESPECIES_ADO.php';
include_once '../../assest/controlador/ERECEPCION_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$DRECEPCIONMP_ADO= new DRECEPCIONMP_ADO();
$RECEPCIONMP_ADO = new RECEPCIONMP_ADO();
$FOLIO_ADO =  new FOLIO_ADO();
$EMPRESA_ADO = new EMPRESA_ADO();
$ERECEPCION_ADO =  new ERECEPCION_ADO();
$VESPECIES_ADO = new VESPECIES_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP="";
$NUMERORECEPCION="";
$FECHARECEPCION="";
$NUMEROGUIA="";
$HORARECEPCION="";
$TOTALGUIA="";
$FECHAGUIA="";
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

//INICIALIZAR ARREGLOS
$ARRAYRECEPCION="";
$ARRAYDRECEPCION="";
$ARRAYFOLIO="";
$ARRAYEMPRESA="";
$ARRAYVESPECIES="";
$ARRAYPVESPECIES="";
$ARRAYEEXPORTACION="";
$ARRAYPRODUCTOR="";
$ARRAYPRODUCTOR2="";
$ARRAYTIPO="";

if (isset($_REQUEST['parametro']) ) {
    $IDOP = $_REQUEST['parametro'];
}

$ARRAYRECEPCION = $RECEPCIONMP_ADO->verRecepcion3($IDOP);
if($ARRAYRECEPCION){

	$ARRAYDRECEPCION = $DRECEPCIONMP_ADO->buscarPorRecepcion2($IDOP); 

	$NUMERORECEPCION=$ARRAYRECEPCION[0]['NUMERO_RECEPCION'];
	$FECHARECEPCION=$ARRAYRECEPCION[0]['FECHA'];
	$HORARECEPCION=$ARRAYRECEPCION[0]['HORA_RECEPCION'];
	$NUMEROGUIA=$ARRAYRECEPCION[0]['NUMERO_GUIA_RECEPCION'];
	$FECHAGUIA=$ARRAYRECEPCION[0]['GUIA'];
	$TOTALGUIA=$ARRAYRECEPCION[0]['TOTAL_KILOS_GUIA_RECEPCION'];
	
	$NOMBRETIPO = $ARRAYRECEPCION[0]['TRECEPCION'];
	if ($NOMBRETIPO == "1") {
	  $NOMBRETIPO = "Desde Productor";
	}
	if ($NOMBRETIPO == "2") {
	  $NOMBRETIPO = "Planta Externa";
	}
	
	$PRODUCTOR=$ARRAYRECEPCION[0]['ID_PRODUCTOR'];
	$PRODUCTOR = $ARRAYRECEPCION[0]['ID_PRODUCTOR'];
	$ARRAYPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
	if ($ARRAYPRODUCTOR) {
	  $NOMBREPRODUCTOR = $ARRAYPRODUCTOR[0]['NOMBRE_PRODUCTOR'];
	  $CSGPRODUCTOR = $ARRAYPRODUCTOR[0]['CSG_PRODUCTOR'];
      $GGNPRODUCTOR = $ARRAYPRODUCTOR[0]['GGN_PRODUCTOR'];

      if($GGNPRODUCTOR == ''){

        $SIGGNPRODUCTOR = '';

      }else{
        $SIGGNPRODUCTOR = '<div class="info2">
        <b class="f11" style="text-transform: uppercase;"> GGN: </b>   <span class="f13">'.$GGNPRODUCTOR.'</span>
    </div>';
      }
	}
	
	
	$ARRAYFOLIO=$FOLIO_ADO->verFolio($FOLIO);
	//$ALIASFOLIO=$ARRAYDRECEPCION[0]['ALIAS_FOLIO_DRECEPCION'];
	$ARRAYEMPRESA=$EMPRESA_ADO->verEmpresa($ARRAYRECEPCION[0]['ID_EMPRESA']);
	$EMPRESA=$ARRAYEMPRESA[0]['NOMBRE_EMPRESA'];
	$EMPRESAURL=$ARRAYEMPRESA[0]['LOGO_EMPRESA'];
	
	if($EMPRESAURL==""){
		$EMPRESAURL="img/empresa/no_disponible.png";
	}
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
<title>Tarja Recepcion Granel</title>

<style type="text/css">	

</style>

</head>

<body>
    

';


foreach ($ARRAYDRECEPCION as $s) :
    
    $ARRAYVESPECIES=$VESPECIES_ADO->verVespecies($s['ID_VESPECIES']);
    $ARRAYEEXPORTACION=$ERECEPCION_ADO->verEstandar($s['ID_ESTANDAR']);


    $html=$html.'
    <div class="contenido" style="height:250px!important;">
		<div class="titulo" style="text-align: center; font-size: 14; ">
             <b > 
				 <img src="../../assest/img/logo.png" width="100px" height="30px"/>
			</b>
             <br>
             <b> '.$NOMBRETIPO.'</b>	
		</div>		
		<div class="subtitulo2">
			<b style="font-size:11;"></b>
		</div>

		<div class="info2">
			<b class="f11"> Numero Recepcion : </b>  <span class="f13">'.$NUMERORECEPCION.'</span>
		</div>
		<div class="info2">
			<b class="f11"> Numero guia : </b>   <span class="f13">'.$NUMEROGUIA.'</span>
		</div>
		<div class="info2">
			<b class="f11"> Fecha Recepcion : </b>   <span class="f13">'.$FECHARECEPCION.'</span>
		</div>
		<div class="info2">
			<b class="f11" style="text-transform: uppercase;"> CSG: </b>   <span class="f13">'.$CSGPRODUCTOR.'</span>
		</div>
        '.$SIGGNPRODUCTOR.'
        <br>
		<div class="subtitulo2"></div>
        
        <br>
  ';
    if(strlen($NOMBREPRODUCTOR)<="19"){
        $TAMAÑO="f25";
    }
    if(strlen($NOMBREPRODUCTOR)>"19" && strlen($NOMBREPRODUCTOR)<="25"){
        $TAMAÑO="f20";
    }    
    if(strlen($NOMBREPRODUCTOR)>"25" && strlen($NOMBREPRODUCTOR)<="42"){
        $TAMAÑO="f15";
    }
    if(strlen($NOMBREPRODUCTOR)>"42" && strlen($NOMBREPRODUCTOR)<="61"){
        $TAMAÑO="f10";
    }
	if(strlen($NOMBREPRODUCTOR)>"61" && strlen($NOMBREPRODUCTOR)<="70"){
        $TAMAÑO="f9";
    }

  $html=$html.'

  <br><br>
		<div class="'.$TAMAÑO.' center " width="100%">
			<b >'.$NOMBREPRODUCTOR.' </b> 
		</div>
       
		<br><br><br>

		<div class="subtitulo2"></div>

		<div class="info2 justify">
			<b class="f11"> Fecha Cosecha : </b>  <span class="f13"> '.$s['COSECHA'].'</span>
		</div>
		<br>
		<div class="info2 justify">
			<b class="f11"> Estandar : </b>  <span class="f13"> '.$ARRAYEEXPORTACION[0]['NOMBRE_ESTANDAR'].'</span>
		</div>
		<br>
		<div class="info2 justify">
			<b class="f11"> Kilos Brutos : </b> <span class="f13"> '.$s['BRUTO'].'</span>
		</div>
		<br>

		<div class="subtitulo2"></div>
	
        <div class=" center">
           Kilos Neto  
        </div>
        <div class="f20 center">
            <b> '.$s['NETO'].' </b> 
        </div>
        <br>
        <div class=" center">
             N° Folio   
        </div>        
        <div class="f30 center">
            <b> '.$s['FOLIO_DRECEPCION'].' </b> 
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
            <b>  '.$s['ENVASE'].'  </b> 
        </div>
		<br><br><br><br>
		
        <div class="titulo center">
           <b style="font-size: 10px;">  '.$EMPRESA.' </b>
        </div>     
        <br><br><br><br>   
      </div>  
	  <div class="salto" style=" page-break-after: always; border: none;   margin: 0;   padding: 0;"></div>   
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
require_once '../../api/mpdf/mpdf/autoload.php';


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


$stylesheet1 = file_get_contents('../../assest/css/styleTarja.css'); // carga archivo css
$stylesheet2 = file_get_contents('../../assest/css/reset.css'); // carga archivo css
$PDF->WriteHTML($stylesheet1, 1); 
$PDF->WriteHTML($stylesheet2, 1); 
$PDF->WriteHTML($html);
//$PDF->Output();
$PDF->Output($NOMBREARCHIVOFINAL, \Mpdf\Output\Destination::INLINE);

?>