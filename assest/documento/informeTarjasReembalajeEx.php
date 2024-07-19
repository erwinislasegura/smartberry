<?php

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES 
include_once '../../assest/controlador/EMPRESA_ADO.php';


include_once '../../assest/controlador/TREEMBALAJE_ADO.php';
include_once '../../assest/controlador/DREXPORTACION_ADO.php';
include_once '../../assest/controlador/DRINDUSTRIAL_ADO.php';
include_once '../../assest/controlador/REEMBALAJE_ADO.php';

include_once '../../assest/controlador/VESPECIES_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/TCALIBRE_ADO.php';

include_once '../../assest/controlador/EEXPORTACION_ADO.php';
include_once '../../assest/controlador/EINDUSTRIAL_ADO.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$EMPRESA_ADO = new EMPRESA_ADO();

$DREXPORTACION_ADO =  new DREXPORTACION_ADO();
$DRINDUSTRIAL_ADO =  new DRINDUSTRIAL_ADO();
$REEMBALAJE_ADO =  new REEMBALAJE_ADO();
$TREEMBALAJE_ADO =  new TREEMBALAJE_ADO();

$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$TCALIBRE_ADO =  new TCALIBRE_ADO();

$EEXPORTACION_ADO =  new EEXPORTACION_ADO();
$EINDUSTRIAL_ADO =  new EINDUSTRIAL_ADO();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP="";
$NUMEROREEMBALAJE="";
$FECHAREEMBALAJE="";
$TIPOREEMBALAJE="";
$PRODUCTOR="";
$ESTANDAR="";

$VARIEDAD="";
$TURNO="";
$EMBOLSADO="";

$PRODUCTOR="";
$CSGPRODUCTOR="";
$NOMBREPRODUCTOR="";


$TOTALENVASEDEXPORTACION="";
$TOTALNETODEXPORTACION="";
$TOTALBRUTODEXPORTACION="";

$TOTALENVASEDINDUSTRIAL="";
$TOTALNETODINDUSTRIAL="";
$TOTALBRUTODINDUSTRIAL="";

$EMPRESA="";
$COC="";
$EMPRESAURL="";

$html='';

//INICIALIZAR ARREGLOS
$ARRAYVERTREEMBALAJE="";
$ARRAYVERPVESPECIES="";
$ARRAYVERVESPECIES="";

$ARRAYEMPRESA="";
$ARRAYREEMBALAJE="";

$ARRAYDEXPORTACION="";
$ARRAYDEXPORTACION2="";
$ARRAYDEXPORTACIONTOTALES = "";

$ARRAYDINDUSTRIAL="";
$ARRAYDINDUSTRIAL2="";
$ARRAYDINDUSTRIALTOTALES = "";
$ARRAYCALIBRE="";

if (isset($_REQUEST['parametro']) ) {
    $IDOP = $_REQUEST['parametro'];
    $NUMEROREEMBALAJE=$IDOP;
}


$ARRAYREEMBALAJE = $REEMBALAJE_ADO->verReembalaje2($NUMEROREEMBALAJE);

$ARRAYDEXPORTACION=$DREXPORTACION_ADO->buscarPorReembalaje2($NUMEROREEMBALAJE);
$ARRAYDEXPORTACIONTOTALES = $DREXPORTACION_ADO->obtenerTotales2($NUMEROREEMBALAJE);

$ARRAYDINDUSTRIAL=$DRINDUSTRIAL_ADO->buscarPorReembalaje2($NUMEROREEMBALAJE);
$ARRAYDINDUSTRIALTOTALES = $DRINDUSTRIAL_ADO->obtenerTotales2($NUMEROREEMBALAJE);

$FECHAREEMBALAJE=$ARRAYREEMBALAJE[0]['FECHA'];
$NUMEROREEMBALAJE=$ARRAYREEMBALAJE[0]['NUMERO_REEMBALAJE'];

$ARRAYTREEMBALAJE=$TREEMBALAJE_ADO->verTreembalaje($ARRAYREEMBALAJE[0]['ID_TREEMBALAJE']);

$TIPOREEMBALAJE=$ARRAYTREEMBALAJE[0]['NOMBRE_TREEMBALAJE'];
if($ARRAYREEMBALAJE[0]['TURNO']==1){
    $TURNO="DIA";
}
if($ARRAYREEMBALAJE[0]['TURNO']==2){
    $TURNO="NOCHE";
}


$PRODUCTOR=$ARRAYREEMBALAJE[0]['ID_PRODUCTOR'];
$ARRAYPRODUCTOR=$PRODUCTOR_ADO->verProductor($PRODUCTOR);
$NOMBREPRODUCTOR=$ARRAYPRODUCTOR[0]['NOMBRE_PRODUCTOR'];
$CSGPRODUCTOR=$ARRAYPRODUCTOR[0]['CSG_PRODUCTOR'];


$ARRAYEMPRESA=$EMPRESA_ADO->verEmpresa($ARRAYREEMBALAJE[0]['ID_EMPRESA']);
$EMPRESA=$ARRAYEMPRESA[0]['NOMBRE_EMPRESA'];
$COC=$ARRAYEMPRESA[0]['COC'];
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
<title>Tarja Reembalaje </title>

<style type="text/css">	

</style>

</head>

<body>
    

';
//PRODUCTO TERMINADO

foreach ($ARRAYDEXPORTACION as $r) :

    $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);   
    $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
    $ARRAYEVEEXPORTACIONID = $EEXPORTACION_ADO->verEstandar($r['ID_ESTANDAR']);
    $ARRAYCALIBRE=$TCALIBRE_ADO->verCalibre($r['ID_TCALIBRE']);
    if($r['EMBOLSADO']=="1"){
        $EMBOLSADO="SI";
    }
    if($r['EMBOLSADO']=="0"){
        $EMBOLSADO="NO";
    }



	$html = $html . '
    <div class=" " >
		<div class="titulotarja" style="text-align: center; >
             <b  "> 
				 <img src="../../assest/img/logo.png" width="90px" height="25px"/>
             </b><br>
            <b > 
				PRODUCTO TERMINADO :   ' . $r['FOLIO_DREXPORTACION'] . ' 
			</b>	
		</div>							
		<div class="subtitulotarja " > 
			&nbsp;<b> Estandar : </b> ' . $ARRAYEVEEXPORTACIONID[0]['NOMBRE_ESTANDAR'] . '<br>
			&nbsp;<b> Total Envase : </b> ' . $r['ENVASE'] . '<br>
			&nbsp;<b> Total Neto : </b>   ' . $r['NETO'] . '<br>       
		</div>	
';


 

  $html=$html.'   
  <table border="0" cellspacing="0" cellpadding="0" >
    <thead>   
	  <tr>
            <th colspan="8" class="center color2"></th>
      </tr>
      <tr>
        <th class=" center">Fecha Embalado</th>
        <th class=" center ">CSG </th>
        <th class=" center ">Nombre Productor </th>
        <th class=" center">Cant. Envase</th>
        <th class=" center">Kilos Neto</th>
        <th class=" center">Calibre</th>
        <th class=" center ">Embolsado </th>
        <th class=" center ">Variedad </th>
      </tr>
    </thead>
     <tbody>
	 
    ';

    $html=$html.' 
    <tr >
        <td class="center"> '.$r['EMBALADO'].'</td>
        <td  class="center  ">'.$ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'].'</td>
        <td  class="center  ">'.$ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'].'</td>
        <td  class="center  ">'.$r['ENVASE'].'</td>
        <td  class="center ">'.$r['NETO'].'</td>
        <td  class="center  ">'.$ARRAYCALIBRE[0]['NOMBRE_TCALIBRE'].'</td>
        <td  class="center  ">'.$EMBOLSADO.'</td>
        <td  class="center  ">'.$ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'].'</td>
    </tr>
    ';      
    $html=$html.'
    </tbody>
  </table>
  
  ';

  $html=$html.'
		<div class="subtitulo2"></div>   
      </div>  
      
	  <div class="salto" style=" page-break-after: always; border: none;   margin: 0;   padding: 0;"></div>  
    ';
endforeach; 

foreach ($ARRAYDINDUSTRIAL as $r) : 

    $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);    
    $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
    $ARRAYEVEEXPORTACIONID = $EINDUSTRIAL_ADO->verEstandar($r['ID_ESTANDAR']);



	$html = $html . '
    <div class=" " >
		<div class="titulotarja" style="text-align: center; >
             <b  "> 
				 <img src="../../assest/img/logo.png" width="90px" height="25px"/>
             </b><br>
            <b > 
				PRODUCTO INDUSTRIAL :   ' . $r['FOLIO_DRINDUSTRIAL'] . ' 
			</b>	
		</div>							
		<div class="subtitulotarja " > 
            &nbsp;<b> Numero Reembalaje : </b> '.$NUMEROREEMBALAJE.'<br>
			&nbsp;<b> Estandar : </b> ' . $ARRAYEVEEXPORTACIONID[0]['NOMBRE_ESTANDAR'] . '<br>
			&nbsp;<b> Total Neto : </b>   ' . $r['NETO'] . '<br>       
		</div>	
';


  

  $html=$html.'   
  <table border="0" cellspacing="0" cellpadding="0" >
    <thead>    
      <tr>
        <th class=" center">Fecha Embalado</th>
        <th class=" center ">CSG </th>
        <th class=" center ">Nombre Productor </th>
        <th class=" center">Kilos Neto</th>
        <th class=" center ">Variedad </th>
      </tr>
    </thead>
     <tbody>
    ';

    $html=$html.' 
    <tr >
        <td class="center"> '.$r['EMBALADO'].'</td>
        <td  class="center  ">'.$ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'].'</td>
        <td  class="center  ">'.$ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'].'</td>
        <td  class="center ">'.$r['NETO'].'</td>
        <td  class="center  ">'.$ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'].'</td>
    </tr>
    ';  

    $html=$html.'
    </tbody>
  </table>
  
  ';

  $html=$html.'
  <br>
		<div class="subtitulo2"></div>  
      </div>  
	  <div class="salto" style=" page-break-after: always; border: none;   margin: 0;   padding: 0;"></div>  
    ';



endforeach; 






$html=$html.'
	
</body>
</html>


';


//API DE GENERACION DE PDF
require_once '../../api/mpdf/mpdf/autoload.php';
require_once '../../api/mpdf/qrcode/autoload.php';

$PDF = new \Mpdf\Mpdf(['format'=>[150,100] ]);
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
$NOMBREARCHIVO="TarjaReembalaje_";
$FECHADOCUMENTO = $FECHANORMAL."_".$HORAFINAL;
$TIPODOCUMENTO="Tarja";
$FORMATO=".pdf";
$NOMBREARCHIVOFINAL=$NOMBREARCHIVO.$FECHADOCUMENTO.$FORMATO;

//CONFIGURACIOND DEL DOCUMENTO
$TIPOPAPEL="";
$ORIENTACION="";

//DETALLE DEL CREADOR DEL INFORME
$TIPOINFORME = "Tarja ";
$CREADOR = "Usuario";
$AUTOR = "Usuario";
$ASUNTO = "Tarja Reembalaje";




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

?>