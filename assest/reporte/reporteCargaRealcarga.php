
<?php

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES 
include_once '../../assest/controlador/TUSUARIO_ADO.php';
include_once '../../assest/controlador/USUARIO_ADO.php';
include_once '../../assest/controlador/EMPRESA_ADO.php';
include_once '../../assest/controlador/PLANTA_ADO.php';
include_once '../../assest/controlador/TEMPORADA_ADO.php';


include_once '../../assest/controlador/FOLIO_ADO.php';
include_once '../../assest/controlador/VESPECIES_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/EEXPORTACION_ADO.php';
include_once '../../assest/controlador/DESPACHOEX_ADO.php';
include_once '../../assest/controlador/TCALIBRE_ADO.php';
include_once '../../assest/controlador/ECOMERCIAL_ADO.php';



include_once '../../assest/controlador/ICARGA_ADO.php';
//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$TUSUARIO_ADO = new TUSUARIO_ADO();
$USUARIO_ADO = new USUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();

$FOLIO_ADO =  new FOLIO_ADO();
$EMPRESA_ADO = new EMPRESA_ADO();
$PLANTA_ADO = new PLANTA_ADO();
$VESPECIES_ADO = new VESPECIES_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$EEXPORTACION_ADO =  new EEXPORTACION_ADO();
$DESPACHOEX_ADO =  new DESPACHOEX_ADO();
$TCALIBRE_ADO =  new TCALIBRE_ADO();
$ECOMERCIAL_ADO =  new ECOMERCIAL_ADO();


$ICARGA_ADO =  new ICARGA_ADO();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$TOTALBRUTO = "";
$TOTALNETO = "";
$TOTALENVASE = "";
$IDOP="";
$NOMBREUSUARIO="";
$NOMBRE="";


//INICIALIZAR ARREGLOS
$ARRAYCARGAREAL = "";
$ARRAYCARGAREALTOTALES = "";

$ARRAYVEREMPRESA = "";
$ARRAYVERPRODUCTOR = "";
$ARRAYFECHA = "";
$ARRAYPRODUCTOR = "";
$ARRAYUSUARIO="";
$ARRAYCALIBRE="";

$ARRAYDATOS = "";

//FUNCIONALIDAD
if($_REQUEST['parametro']){         
    $IDOP = $_REQUEST['parametro'];
   }
   
   $ARRAYCONSOLIDADODESPACHO =  $DESPACHOEX_ADO->consolidadoDespachoExistencia($IDOP);
   if($ARRAYCONSOLIDADODESPACHO){
     $ARRAYCONSOLIDADODESPACHOTOTAL =  $DESPACHOEX_ADO->obtenerTotalconsolidadoDespachoExistencia2($IDOP);
     $TOTALENVASECONSOLIADO=$ARRAYCONSOLIDADODESPACHOTOTAL[0]['ENVASE'];
     $TOTALNETOCONSOLIADO=$ARRAYCONSOLIDADODESPACHOTOTAL[0]['NETO'];
     $TOTALBRUTOCONSOLIADO=$ARRAYCONSOLIDADODESPACHOTOTAL[0]['BRUTO'];
   
   
     $ARRAYVERICARGA = $ICARGA_ADO->verIcarga($IDOP);   
     $ARRAYEMPRESA = $EMPRESA_ADO->verEmpresa($ARRAYVERICARGA[0]['ID_EMPRESA']);
     if($ARRAYEMPRESA){
       $NOMBREEMPRESA=$ARRAYEMPRESA[0]["NOMBRE_EMPRESA"];
     }else{    
       $NOMBREEMPRESA="";
     }
   }
   

$html = '
<table border="0" cellspacing="0" cellpadding="0">
    <thead>
    <tr>   
        <th class="color center ">Codigo Estandar </th>
        <th class="color center ">Envase/Estandar </th>
        <th class="color center ">Codigo Estandar </th>
        <th class="color center ">Estandar Comercial</th>
        <th class="color center ">Peso Neto </th>
        <th class="color center ">Peso Bruto </th>
        <th class="color center ">Cantidad Envases </th>
        <th class="color center ">Kilos Neto </th>
        <th class="color center ">Kilos Bruto </th>
        <th class="color center ">Fecha Embalado </th>
        <th class="color center ">CSG Productor </th>
        <th class="color center ">GGN Productor </th>
        <th class="color center ">Nombre Productor </th>
        <th class="color center ">Variedad </th>
    </tr>
    </thead>
 <tbody>

';
foreach ($ARRAYCONSOLIDADODESPACHO as $s) :
    $ARRAYPRODUCTOR = $PRODUCTOR_ADO->verProductor($s['ID_PRODUCTOR']);
    if ($ARRAYPRODUCTOR) {
        $CSGPRODUCTOR = $ARRAYPRODUCTOR[0]['CSG_PRODUCTOR'];
        $GGNPRODUCTOR = $ARRAYPRODUCTOR[0]['GGN_PRODUCTOR'];
        $NOMBREPRODUCTOR = $ARRAYPRODUCTOR[0]['NOMBRE_PRODUCTOR'];
    } else {
        $CSGPRODUCTOR = "Sin Datos";
        $NOMBREPRODUCTOR = "Sin Datos";
    }
    $ARRAYEEXPORTACION = $EEXPORTACION_ADO->verEstandar($s['ID_ESTANDAR']);
    if ($ARRAYEEXPORTACION) {
        $CODIGOESTANDAR = $ARRAYEEXPORTACION[0]['CODIGO_ESTANDAR'];
        $NOMBREESTANTAR = $ARRAYEEXPORTACION[0]['NOMBRE_ESTANDAR'];
        $NETOESTANTAR = $ARRAYEEXPORTACION[0]['PESO_NETO_ESTANDAR'];
        $BRUTOESTANTAR = $ARRAYEEXPORTACION[0]['PESO_BRUTO_ESTANDAR'];
        $ARRAYECOMERCIAL=$ECOMERCIAL_ADO->verEcomercial($ARRAYEEXPORTACION[0]["ID_ECOMERCIAL"]);
        if($ARRAYECOMERCIAL){
            $CODIGOECOMERCIAL = $ARRAYECOMERCIAL[0]['CODIGO_ECOMERCIAL'];
            $NOMBREECOMERCIAL = $ARRAYECOMERCIAL[0]['NOMBRE_ECOMERCIAL'];
        }else{
            $CODIGOECOMERCIAL = "Sin Datos";
            $NOMBREECOMERCIAL = "Sin Datos";
        }
    } else {
        $CODIGOECOMERCIAL = "Sin Datos";
        $NOMBREECOMERCIAL = "Sin Datos";
        $NOMBREESTANTAR = "Sin Datos";
        $CODIGOESTANDAR = "Sin Datos";
        $NETOESTANTAR = "Sin Datos";
        $BRUTOESTANTAR = "Sin Datos";
    }
    $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($s['ID_VESPECIES']);
    if ($ARRAYVERVESPECIESID) {
        $NOMBREVARIEDAD = $ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'];
    } else {
        $NOMBREVARIEDAD = "Sin Datos";
    }

    $html = $html . '    
            <tr class="center">
                <td class="center">'.$CODIGOESTANDAR.'</td>
                <td class="center">'.$NOMBREESTANTAR.'</td>
                <td class="center">'.$CODIGOECOMERCIAL.'</td>
                <td class="center">'.$NOMBREECOMERCIAL.'</td>
                <td class="center">'.$NETOESTANTAR.'</td>
                <td class="center">'.$BRUTOESTANTAR.'</td>
                <td class="center">'.$s['ENVASE'].'</td>
                <td class="center">'.$s['NETO'].'</td>
                <td class="center">'.$s['BRUTO'].'</td>
                <td class="center">'.$s['EMBALADO'].'</td>
                <td class="center">'.$CSGPRODUCTOR.'</td>
                <td class="center">'.$GGNPRODUCTOR.'</td>
                <td class="center">'.$NOMBREPRODUCTOR.'</td>
                <td class="center">'.$NOMBREVARIEDAD.'</td>
            </tr>
            ';
endforeach;

$html = $html . '
        </tbody>
      </table>
      ';





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







//CREACION NOMBRE DEL ARCHIVO
$NOMBREARCHIVO = "ReporteCargaReal_";
$FECHADOCUMENTO = $FECHANORMAL . "_" . $HORAFINAL;
$TIPODOCUMENTO = "Informe";
$FORMATO = ".xlsx";
$NOMBREARCHIVOFINAL = $NOMBREARCHIVO . $FECHADOCUMENTO . $FORMATO;

//CONFIGURACIOND DEL DOCUMENTO
$TIPOPAPEL = "LETTER";
$ORIENTACION = "P";
$LENGUAJE = "ES";
$UNICODE = "true";
$ENCODING = "UTF-8";

//DETALLE DEL CREADOR DEL INFORME
$TIPOINFORME = "Reporte Carga Real ";
$CREADOR = "Usuario";
$AUTOR = "Usuario";
$ASUNTO = "Reporte";
$DESCRIPCION = "Reporte Carga Real, " . $FECHANOMBRE . ", " . $HORAFINAL2;
$CATEGORIA = "Reporte";
$ETIQUETA = "Reporte PT";




//API DE GENERACION DE PDF
require_once '../../api/phpoffice/vendor/autoload.php';
//require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$EXCEL = new Spreadsheet();
$FORMATO = $EXCEL->getActiveSheet();

//PROPIEDADES DEL DOCUMENTO
$EXCEL->getProperties()->setCreator($CREADOR);
$EXCEL->getProperties()->setLastModifiedBy($CREADOR);
$EXCEL->getProperties()->setTitle($TIPOINFORME);
$EXCEL->getProperties()->setSubject($ASUNTO);
$EXCEL->getProperties()->setDescription($DESCRIPCION);
$EXCEL->getProperties()->setKeywords($ETIQUETA);
$EXCEL->getProperties()->setCategory($CATEGORIA);
$HOJA = $EXCEL->getActiveSheet();

//CARGAR DATOS DESDE UN ARREGLO
//$HOJA->fromArray($ARRAYDATOS);


$reader = new \PhpOffice\PhpSpreadsheet\Reader\Html();
$EXCEL = $reader->loadFromString($html);
//$reader->setSheetIndex(1);
//$EXCEL = $reader->loadFromString($secondHtmlString, $EXCEL);


$EXCEL->getActiveSheet()->setAutoFilter(
    $EXCEL->getActiveSheet()
        ->calculateWorksheetDimension()
);

//$FORMATO->setCellValue('1', 'Hello World !');
/**
 * Los siguientes encabezados son necesarios para que
 * el navegador entienda que no le estamos mandando
 * simple HTML
 * Por cierto: no hagas ningún echo ni cosas de esas; es decir, no imprimas nada
 */

// Redirect output to a client’s web browser (Xlsx)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="' . $NOMBREARCHIVOFINAL . '"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.0


//GENERACION DEL ARCHIVO EXCEL
$writer = new Xlsx($EXCEL);
$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($EXCEL, "Xlsx");
ob_end_clean();
$writer->save("php://output");
exit;

?>
