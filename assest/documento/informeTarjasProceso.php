<?php

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES 
include_once '../../assest/controlador/EMPRESA_ADO.php';


include_once '../../assest/controlador/TPROCESO_ADO.php';
include_once '../../assest/controlador/DPEXPORTACION_ADO.php';
include_once '../../assest/controlador/DPINDUSTRIAL_ADO.php';
include_once '../../assest/controlador/PROCESO_ADO.php';

include_once '../../assest/controlador/VESPECIES_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/TCALIBRE_ADO.php';

include_once '../../assest/controlador/EEXPORTACION_ADO.php';
include_once '../../assest/controlador/EINDUSTRIAL_ADO.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$EMPRESA_ADO = new EMPRESA_ADO();

$DPEXPORTACION_ADO =  new DPEXPORTACION_ADO();
$DPINDUSTRIAL_ADO =  new DPINDUSTRIAL_ADO();
$PROCESO_ADO =  new PROCESO_ADO();
$TPROCESO_ADO =  new TPROCESO_ADO();

$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$TCALIBRE_ADO =  new TCALIBRE_ADO();

$EEXPORTACION_ADO =  new EEXPORTACION_ADO();
$EINDUSTRIAL_ADO =  new EINDUSTRIAL_ADO();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP="";
$NUMEROPROCESO="";
$FECHAPROCESO="";
$TIPOPROCESO="";
$PRODUCTOR="";
$ESTANDAR="";

$VARIEDAD="";
$TURNO="";
$EMBOLSADO="";
$NOMBRECALIBRE="";

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
$ARRAYVERTPROCESO="";
$ARRAYVERPVESPECIES="";
$ARRAYVERVESPECIES="";

$ARRAYEMPRESA="";
$ARRAYPROCESO="";

$ARRAYDEXPORTACION="";
$ARRAYDEXPORTACION2="";
$ARRAYDEXPORTACIONTOTALES = "";

$ARRAYDINDUSTRIAL="";
$ARRAYDINDUSTRIAL2="";
$ARRAYDINDUSTRIALTOTALES = "";
$ARRAYCALIBRE="";

if (isset($_REQUEST['parametro']) ) {
    $IDOP = $_REQUEST['parametro'];
    $NUMEROPROCESO=$IDOP;
}


$ARRAYPROCESO = $PROCESO_ADO->verProceso2($NUMEROPROCESO);

$ARRAYDEXPORTACION=$DPEXPORTACION_ADO->buscarPorProceso2($NUMEROPROCESO);
$ARRAYDEXPORTACIONTOTALES = $DPEXPORTACION_ADO->obtenerTotales2($NUMEROPROCESO);

$ARRAYDINDUSTRIAL=$DPINDUSTRIAL_ADO->buscarPorProceso2($NUMEROPROCESO);
$ARRAYDINDUSTRIALTOTALES = $DPINDUSTRIAL_ADO->obtenerTotales2($NUMEROPROCESO);

$FECHAPROCESO=$ARRAYPROCESO[0]['FECHA_PROCESO'];
$NUMEROPROCESO = $ARRAYPROCESO[0]['NUMERO_PROCESO'];

$ARRAYTPROCESO=$TPROCESO_ADO->verTproceso($ARRAYPROCESO[0]['ID_TPROCESO']);

$TIPOPROCESO=$ARRAYTPROCESO[0]['NOMBRE_TPROCESO'];
if($ARRAYPROCESO[0]['TURNO']==1){
    $TURNO="DIA";
}
if($ARRAYPROCESO[0]['TURNO']==2){
    $TURNO="NOCHE";
}


$PRODUCTOR=$ARRAYPROCESO[0]['ID_PRODUCTOR'];
$ARRAYPRODUCTOR=$PRODUCTOR_ADO->verProductor($PRODUCTOR);
$NOMBREPRODUCTOR=$ARRAYPRODUCTOR[0]['NOMBRE_PRODUCTOR'];
$CSGPRODUCTOR=$ARRAYPRODUCTOR[0]['CSG_PRODUCTOR'];


$ARRAYEMPRESA=$EMPRESA_ADO->verEmpresa($ARRAYPROCESO[0]['ID_EMPRESA']);
$EMPRESA=$ARRAYEMPRESA[0]['NOMBRE_EMPRESA'];
$COC=$ARRAYEMPRESA[0]['COC'];
$coc_empresa=$ARRAYEMPRESA[0]['COC'];
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
<title>Tarja Proceso </title>

<style type="text/css">	
	

</style>

</head>

<body>
    

';
//PRODUCTO TERMINADO
$total_envases = 0;
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
    <table style="width: 100%;">
    <tbody>   	  
      <tr>
        <td style="border: solid 3 black; width: 50px; text-align: center;" colspan="1">
            <b><p style="font-size: 40px;">' . $ARRAYDEXPORTACION[0]['NOMBRE_TCALIBRE'] . ' </p></b>
            <b><p style="font-size: 20px;">Size</p></b>
        </td>
        <td style="border: solid 3 black; text-align: center;" colspan="2">
            <b>
                <p style="font-size: 50px;">' . $r['FOLIO_DPEXPORTACION'] . ' </p>
                <p style="font-size: 12px;">'.$ARRAYEVEEXPORTACIONID[0]['NOMBRE_ESTANDAR'].'</p>
                <p style="font-size: 12px;">N° '.$coc_empresa.'</p>
            </b>
        </td>
      </tr>
      <tr>
        <td style="border: solid 3 black; text-align: center;">
            <b>
               <p style="font-size: 12px;">Grower</p>
            </b>
        </td>
        <td style="border: solid 3 black; text-align: center;">
            <b>
               <p style="font-size: 12px;">Variety</p>
            </b>
        </td>
        <td style="border: solid 3 black; text-align: center;">
            <b>
               <p style="font-size: 12px;">Boxes</p>
            </b>
        </td>
      </tr>';





$html .='
        <tr>
            <td style="border: solid 3 black; text-align: center;">
                <b>
                <p style="font-size: 12px;">' . $ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'] . '</p>
                </b>
            </td>
            <td style="border: solid 3 black; text-align: center;">
                <b>
                <p style="font-size: 12px;">' . $ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'] . '</p>
                </b>
            </td>
            <td style="border: solid 3 black; text-align: center;">
                <b>
                <p style="font-size: 12px;">' . $r['ENVASE'] . '</p>
                </b>
            </td>
        </tr>';



   
      $html .='
        <tr>
            <td style="border: solid 3 black; text-align: center;">

            </td>
            <td style="border: solid 3 black; text-align: center;">
                <b>
                <p style="font-size: 12px;">TOTAL</p>
                </b>
            </td>
            <td style="border: solid 3 black; text-align: center;">
                <b>
                <p style="font-size: 12px;">' . $r['ENVASE'] . '</p>
                </b>
            </td>
        </tr>';
 
    $html=$html.'
   </tbody>
    </table><br>
  
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

    if($r['NOMBRE_TCALIBREIND'] == ''){
        $calibre_ind = 'No Definido';
    }else{
        $calibre_ind = $r['NOMBRE_TCALIBREIND'];
    }

    $html = $html . '
    <table style="width: 100%;">
    <tbody>   	  
      <tr>
        <td style="border: solid 3 black; width: 50px; text-align: center;" colspan="1">
            <b><p style="font-size: 30px;">'. $ARRAYEVEEXPORTACIONID[0]['NOMBRE_ESTANDAR'].' </p></b>
        </td>
        <td style="border: solid 3 black; text-align: center;" colspan="2">
            <b>
                <p style="font-size: 50px;">' . $r['FOLIO_DPINDUSTRIAL'] . ' </p>
                <p style="font-size: 12px;">'.$ARRAYEVEEXPORTACIONID[0]['NOMBRE_ESTANDAR'].'</p>
                <p style="font-size: 12px;">N° '.$coc_empresa.'</p>
            </b>
        </td>
      </tr>
      <tr>
        <td style="border: solid 3 black; text-align: center;">
            <b>
               <p style="font-size: 12px;">Grower</p>
            </b>
        </td>
        <td style="border: solid 3 black; text-align: center;">
            <b>
               <p style="font-size: 12px;">Variety</p>
            </b>
        </td>
        <td style="border: solid 3 black; text-align: center;">
            <b>
               <p style="font-size: 12px;">Weight</p>
            </b>
        </td>
      </tr>';




      $html .='
      <tr>
          <td style="border: solid 3 black; text-align: center;">
              <b>
              <p style="font-size: 12px;">' . $ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'] . '</p>
              </b>
          </td>
          <td style="border: solid 3 black; text-align: center;">
              <b>
              <p style="font-size: 12px;">' . $ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'] . '</p>
              </b>
          </td>
          <td style="border: solid 3 black; text-align: center;">
              <b>
              <p style="font-size: 12px;">'.$r['NETO'].'</p>
              </b>
          </td>
      </tr>';

      $html .='
      <tr>
          <td style="border: solid 3 black; text-align: center;">

          </td>
          <td style="border: solid 3 black; text-align: center;">
              <b>
              <p style="font-size: 12px;">TOTAL</p>
              </b>
          </td>
          <td style="border: solid 3 black; text-align: center;">
              <b>
              <p style="font-size: 12px;">'.$r['NETO'].'</p>
              </b>
          </td>
      </tr>';


 

    
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






$html=$html.'
	
</body>
</html>


';


$html=$html.'
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
$NOMBREARCHIVO="TarjaProceso_";
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
$ASUNTO = "Tarja Proceso";



$PDF->SetHTMLHeader('
    
');

$PDF->SetHTMLFooter('


    
<footer>
<div class="" style="text-align: center;text-transform:uppercase !important;  ">
	<b style="text-transform:uppercase !important;">' . $EMPRESA . ' - ' .$COC . '</b> 
  </div>
</footer>
    
');

echo 'Prueba';
print_r("prueba2");

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