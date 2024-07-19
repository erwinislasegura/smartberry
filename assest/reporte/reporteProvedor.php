
<?php

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../../assest/controlador/PROVEEDOR_ADO.php';
include_once '../../assest/controlador/CIUDAD_ADO.php';
include_once '../../assest/controlador/EMPRESA_ADO.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$PROVEEDOR_ADO =  new PROVEEDOR_ADO();
$CIUDAD_ADO =  new CIUDAD_ADO();

$EMPRESA_ADO =  new EMPRESA_ADO();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$ARRAYPROVEEDOR = "";
$ARRAYACIUDAD="";

//INICIALIZAR ARREGLOS
$ARRAYPROVEEDOR = $PROVEEDOR_ADO->listarProveedorPorEmpresaCBX($EMPRESAS);

//FUNCIONALIDAD


$html = '
<table border="0" cellspacing="0" cellpadding="0">
    <thead>
    <tr>   
        <th class="color center ">Número </th>
        <th class="color center ">Rut Proveedor </th>
        <th class="color center ">DV Proveedor  </th>
        <th class="color center ">Nombre Proveedor  </th>
        <th class="color center ">Razon Proveedor  </th>
        <th class="color center ">Giro Proveedor  </th>
        <th class="color center ">Direccion Proveedor  </th>
        <th class="color center ">Ciudad Proveedor  </th>
        <th class="color center ">Telefono Proveedor  </th>
        <th class="color center ">Email Proveedor  </th>
        <th class="color center ">Ingreso</th>
        <th class="color center ">Modificación</th>
        <th class="color center ">Empresa</th>
    </tr>
    </thead>
 <tbody>

';
foreach ($ARRAYPROVEEDOR as $r) :
   
$ARRAYEMPRESA =  $EMPRESA_ADO->verEmpresa($r['ID_EMPRESA']); 
$ARRAYACIUDAD = $CIUDAD_ADO->verCiudad($r['ID_CIUDAD']); 
    $html = $html . '    
            <tr class="center">
                <td class="center">   ' . $r['NUMERO_PROVEEDOR'] . '</td> 
                <td class="center">   ' . $r['RUT_PROVEEDOR'] . '</td> 
                <td class="center">   ' . $r['DV_PROVEEDOR'] . '</td> 
                <td class="center">   ' . $r['NOMBRE_PROVEEDOR'] . '</td> 
                <td class="center">   ' . $r['RAZON_PROVEEDOR'] . '</td> 
                <td class="center">   ' . $r['GIRO_PROVEEDOR'] . '</td> 
                <td class="center">   ' . $r['DIRECCION_PROVEEDOR'] . '</td> 
                <td class="center">   ' . $ARRAYACIUDAD[0]['NOMBRE_CIUDAD'] . '</td> 
                <td class="center">   ' . $r['TELEFONO_PROVEEDOR'] . '</td> 
                <td class="center">   ' . $r['EMAIL_PROVEEDOR'] . '</td> 
                <td class="center">   ' . $r['INGRESO'] . '</td>    
                <td class="center">   ' . $r['MODIFICACION'] . '</td>  
                <td class="center">   ' . $ARRAYEMPRESA[0]['NOMBRE_EMPRESA'] . '</td> 
                
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
$NOMBREARCHIVO = "ReporteProveedor_";
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
$TIPOINFORME = "Reporte Proveedor ";
$CREADOR = "Usuario";
$AUTOR = "Usuario";
$ASUNTO = "Reporte";
$DESCRIPCION = "Reporte Proveedor Generado, " . $FECHANOMBRE . ", " . $HORAFINAL2;
$CATEGORIA = "Reporte";
$ETIQUETA = "Reporte Proveedor";




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
