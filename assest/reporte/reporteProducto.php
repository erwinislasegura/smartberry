
<?php

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../../assest/controlador/PRODUCTO_ADO.php';
include_once '../../assest/controlador/FAMILIA_ADO.php';
include_once '../../assest/controlador/SUBFAMILIA_ADO.php';
include_once '../../assest/controlador/TUMEDIDA_ADO.php';
include_once '../../assest/controlador/ESPECIES_ADO.php';
include_once '../../assest/controlador/EMPRESA_ADO.php';
include_once '../../assest/controlador/PLANTA_ADO.php';
include_once '../../assest/controlador/TEMPORADA_ADO.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$FAMILIA_ADO =  new FAMILIA_ADO();
$SUBFAMILIA_ADO =  new SUBFAMILIA_ADO();
$TUMEDIDA_ADO =  new TUMEDIDA_ADO();
$ESPECIES_ADO =  new ESPECIES_ADO();
$PRODUCTO_ADO =  new PRODUCTO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$ARRAYPRODUCTO = "";
$ARRAYEMPRESA = "";
$ARRAYTEMPORADA="";
$ARRAYFAMILIA = "";
$ARRAYSUBFAMILIA = "";
$ARRAYTUMEDIDA = "";
$ARRAYESPECIES = "";


//INICIALIZAR ARREGLOS
$ARRAYPRODUCTO = $PRODUCTO_ADO->listarProductoPorEmpresaPorTemporadaCBX($EMPRESAS,$TEMPORADAS);

//FUNCIONALIDAD


$html = '
<table border="0" cellspacing="0" cellpadding="0">
    <thead>
    <tr>   
        <th class="color center ">Número </th>
        <th class="color center ">Código </th>
        <th class="color center ">Nombre  </th>
        <th class="color center ">Uniad Medida </th>
        <th class="color center ">Familia </th>
        <th class="color center ">SubFamilia</th>
        <th class="color center ">Especies</th>
        <th class="color center ">Optimo</th>
        <th class="color center ">Bajo</th>
        <th class="color center ">Crítico</th>
        <th class="color center ">Ingreso</th>
        <th class="color center ">Modificación</th>
        <th class="color center ">Empresa</th>
        <th class="color center ">Temporada</th>
    </tr>
    </thead>
 <tbody>

';
foreach ($ARRAYPRODUCTO as $r) :

   
$ARRAYTUMEDIDA = $TUMEDIDA_ADO->verTumedida($r['ID_TUMEDIDA']); 
$ARRAYFAMILIA = $FAMILIA_ADO->verFamilia($r['ID_FAMILIA']); 
$ARRAYSUBFAMILIA = $SUBFAMILIA_ADO->verSubfamilia($r['ID_SUBFAMILIA']); 
$ARRAYESPECIES = $ESPECIES_ADO->verEspecies($r['ID_ESPECIES']); 
$ARRAYEMPRESA =  $EMPRESA_ADO->verEmpresa($r['ID_EMPRESA']); 
$ARRAYTEMPORADA= $TEMPORADA_ADO->verTemporada($r['ID_TEMPORADA']); 

    $html = $html . '    
            <tr class="center">
                <td class="center">   ' . $r['NUMERO_PRODUCTO'] . '</td> 
                <td class="center">   ' . $r['CODIGO_PRODUCTO'] . '</td> 
                <td class="center">   ' . $r['NOMBRE_PRODUCTO'] . '</td> 
                <td class="center">   ' . $ARRAYTUMEDIDA[0]['NOMBRE_TUMEDIDA'] . '</td>  
                <td class="center">   ' . $ARRAYFAMILIA[0]['NOMBRE_FAMILIA'] . '</td>  
                <td class="center">   ' . $ARRAYSUBFAMILIA[0]['NOMBRE_SUBFAMILIA'] . '</td>  
                <td class="center">   ' . $ARRAYESPECIES[0]['NOMBRE_ESPECIES'] . '</td>  
                <td class="center">   ' . $r['OPTIMO'] . '</td>  
                <td class="center">   ' . $r['BAJO'] . '</td>    
                <td class="center">   ' . $r['CRITICO'] . '</td>  
                <td class="center">   ' . $r['INGRESO'] . '</td>    
                <td class="center">   ' . $r['MODIFICACION'] . '</td>  
                <td class="center">   ' . $ARRAYEMPRESA[0]['NOMBRE_EMPRESA'] . '</td> 
                <td class="center">   ' . $ARRAYTEMPORADA[0]['NOMBRE_TEMPORADA'] . '</td>  
                
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
$NOMBREARCHIVO = "ReporteProducto_";
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
$TIPOINFORME = "Reporte Producto ";
$CREADOR = "Usuario";
$AUTOR = "Usuario";
$ASUNTO = "Reporte";
$DESCRIPCION = "Reporte Producto Generado, " . $FECHANOMBRE . ", " . $HORAFINAL2;
$CATEGORIA = "Reporte";
$ETIQUETA = "Reporte Producto";




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
