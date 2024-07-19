<?php

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES 
include_once '../../assest/controlador/TUSUARIO_ADO.php';
include_once '../../assest/controlador/USUARIO_ADO.php';
include_once '../../assest/controlador/EMPRESA_ADO.php';
include_once '../../assest/controlador/PLANTA_ADO.php';
include_once '../../assest/controlador/TEMPORADA_ADO.php';


include_once '../../assest/controlador/EEXPORTACION_ADO.php';
include_once '../../assest/controlador/EXIEXPORTACION_ADO.php';
include_once '../../assest/controlador/INPSAG_ADO.php';
include_once '../../assest/controlador/TINPSAG_ADO.php';

include_once '../../assest/controlador/VESPECIES_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/INPECTOR_ADO.php';
include_once '../../assest/controlador/CONTRAPARTE_ADO.php';
include_once '../../assest/controlador/PAIS_ADO.php';
include_once '../../assest/controlador/TMANEJO_ADO.php';



include_once '../../assest/modelo/INPSAG.php';
include_once '../../assest/modelo/EXIEXPORTACION.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$TUSUARIO_ADO = new TUSUARIO_ADO();
$USUARIO_ADO = new USUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();


$VESPECIES_ADO =  new VESPECIES_ADO();
$PRODUCTOR_ADO = new PRODUCTOR_ADO();

$EEXPORTACION_ADO = new EEXPORTACION_ADO();
$EXIEXPORTACION_ADO = new EXIEXPORTACION_ADO();
$INPSAG_ADO =  new INPSAG_ADO();
$TINPSAG_ADO =  new TINPSAG_ADO();
$INPECTOR_ADO =  new INPECTOR_ADO();
$CONTRAPARTE_ADO =  new CONTRAPARTE_ADO();
$PAIS_ADO =  new PAIS_ADO();
$TMANEJO_ADO =  new TMANEJO_ADO();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$NUMERO = "";
$NUMEROVER = "";
$IDINPSAG = "";
$FECHAINPSAG = "";
$FECHAINGRESOINPSAG = "";
$FECHAMODIFCIACIONINPSAG = "";
$TINPSAG = "";
$TESTADOSAG = "";
$NOMBRETINPSAG = "";
$NOMBRETESTADOSAG = "";

$OBSERVACIONINPSAG = "";
$INPECTOR="";
$CONTRAPARTE="";
$PAIS="";
$EMPRESA = "";
$TEMPORADA = "";
$PLANTA = "";
$CALIBRE = "";
$TMANEJO = "";
$EMPRESAURL = "";
$CIF="";
$NOMBREUSUARIO="";
$NOMBRE="";


$TOTALENVASE = "";
$TOTALNETO = "";
$TOTALBRUTO = "";



//INICIALIZAR ARREGLOS
$ARRAYINPSAGPT = "";
$ARRAYEXIEXPORTACION = "";
$ARRAYEXIEXPORTACIONTOTAL = "";
$ARRAYINPECTOR="";
$ARRAYCONTRAPARTE="";
$ARRAYPAIS="";

$ARRAYFOLIO = "";
$ARRAYEMPRESA = "";
$ARRAYPLANTA = "";
$ARRAYTEMPORADA = "";
$ARRAYVESPECIES = "";
$ARRAYPVESPECIES = "";
$ARRAYEEXPORTACION = "";
$ARRAYPRODUCTOR = "";
$ARRAYCALIBRE = "";
$ARRAYTMANEJO = "";
$ARRAYUSUARIO="";



if (isset($_REQUEST['usuario'])) {
  $USUARIO = $_REQUEST['usuario'];
  $ARRAYUSUARIO = $USUARIO_ADO->ObtenerNombreCompleto($USUARIO);
  $NOMBRE = $ARRAYUSUARIO[0]["NOMBRE_COMPLETO"];
}

if (isset($_REQUEST['parametro'])) {
  $IDOP = $_REQUEST['parametro'];
}

$ARRAYINPSAGPT = $INPSAG_ADO->verInpsag2($IDOP);

if($ARRAYINPSAGPT){
    $ARRAYINPSAGPTPRODUCTORESPECIES = $INPSAG_ADO->buscarPorSagProductoEspecies($IDOP);
    $ARRAYINPSAGPTCATEGORIA = $INPSAG_ADO->buscarPorSagCategoria($IDOP);
    $CATEGORIAA=$ARRAYINPSAGPTCATEGORIA[0]["A"];
    $CATEGORIAB=$ARRAYINPSAGPTCATEGORIA[0]["B"];
    $CATEGORIAC=$ARRAYINPSAGPTCATEGORIA[0]["C"];

    //$ARRAYEXIEXPORTACION = $EXIEXPORTACION_ADO->buscarPorSag2($IDOP);
    $ARRAYEXIEXPORTACIONPALLET=$EXIEXPORTACION_ADO->contarTotalPalletInspSag2($IDOP);
    $TOTALPALLET=$ARRAYEXIEXPORTACIONPALLET[0]['PALLET'];
    $ARRAYEXIEXPORTACIONTOTAL = $EXIEXPORTACION_ADO->obtenerTotalesInspSag2($IDOP);    
    $TOTALENVASE = $ARRAYEXIEXPORTACIONTOTAL[0]['ENVASE'];
    $TOTALNETO = $ARRAYEXIEXPORTACIONTOTAL[0]['NETO'];
    $TOTALBRUTO = $ARRAYEXIEXPORTACIONTOTAL[0]['BRUTO'];
    
    
    
    
    
    $NUMEROINPSAG = $ARRAYINPSAGPT[0]['NUMERO_INPSAG'];
    $CORRELATIVOINPSAG = $ARRAYINPSAGPT[0]['CORRELATIVO_INPSAG'];
    $FECHAINPSAG = $ARRAYINPSAGPT[0]['FECHA'];
    $ARRAYTINPSAG = $TINPSAG_ADO->verTinpsag($ARRAYINPSAGPT[0]['ID_TINPSAG']);
    $NOMBRETINPSAG = $ARRAYTINPSAG[0]['NOMBRE_TINPSAG'];
    $TESTADOSAG = $ARRAYINPSAGPT[0]['TESTADOSAG'];
    $CIF=$ARRAYINPSAGPT[0]['CIF_INPSAG'];
    $OBSERVACIONES=$ARRAYINPSAGPT[0]['OBSERVACION_INPSAG'];
    $ESTADO = $ARRAYINPSAGPT[0]['ESTADO'];
    if ($ARRAYINPSAGPT[0]['ESTADO'] == 1) {
      $ESTADO = "Abierto";
    }else if ($ARRAYINPSAGPT[0]['ESTADO'] == 0) {
      $ESTADO = "Cerrado";
    }else{
      $ESTADO="Sin Datos";
    }  
    
    $IDUSUARIOI = $ARRAYINPSAGPT[0]['ID_USUARIOI'];  
    $ARRAYUSUARIO2 = $USUARIO_ADO->ObtenerNombreCompleto($IDUSUARIOI);
    $NOMBRERESPONSABLE = $ARRAYUSUARIO2[0]["NOMBRE_COMPLETO"];
    
    
    if ($TESTADOSAG== null || $TESTADOSAG == "0") {
      $NOMBRETESTADOSAG = "Sin Condición";
    }
    if ($TESTADOSAG == "1") {
      $NOMBRETESTADOSAG = "En Inspección";
    }
    if ($TESTADOSAG == "2") {
      $NOMBRETESTADOSAG = "Aprobado Origen";
    }
    if ($TESTADOSAG == "3") {
      $NOMBRETESTADOSAG = "Aprobado USDA";
    }
    if ($TESTADOSAG == "4") {
      $NOMBRETESTADOSAG = "Fumigado";
    }
    if ($TESTADOSAG == "5") {
      $NOMBRETESTADOSAG = "Rechazado";
    }
    
    $ARRAYINPECTOR=$INPECTOR_ADO->verInpector($ARRAYINPSAGPT[0]['ID_INPECTOR']);
    if($ARRAYINPECTOR){
      $INPECTOR=$ARRAYINPECTOR[0]['NOMBRE_INPECTOR'];
    }
    $ARRAYCONTRAPARTE=$CONTRAPARTE_ADO->verContraparte($ARRAYINPSAGPT[0]['ID_CONTRAPARTE']);
    if($ARRAYCONTRAPARTE){
      $CONTRAPARTE=$ARRAYCONTRAPARTE[0]['NOMBRE_CONTRAPARTE'];
    }
    
    $ARRAYPAIS=$PAIS_ADO->verPais($ARRAYINPSAGPT[0]['ID_PAIS1']);
    if($ARRAYPAIS){
      $PAIS=$ARRAYPAIS[0]['NOMBRE_PAIS'];
    }
    $ARRAYPAIS=$PAIS_ADO->verPais($ARRAYINPSAGPT[0]['ID_PAIS2']);
    if($ARRAYPAIS){
      $PAIS=$PAIS.", ".$ARRAYPAIS[0]['NOMBRE_PAIS'];
    }
    $ARRAYPAIS=$PAIS_ADO->verPais($ARRAYINPSAGPT[0]['ID_PAIS3']);
    if($ARRAYPAIS){
      $PAIS=$PAIS.", ".$ARRAYPAIS[0]['NOMBRE_PAIS'];
    }
    $ARRAYPAIS=$PAIS_ADO->verPais($ARRAYINPSAGPT[0]['ID_PAIS4']);
    if($ARRAYPAIS){
      $PAIS=$PAIS.", ".$ARRAYPAIS[0]['NOMBRE_PAIS'];
    }
    
    
    
    
    $ARRAYPLANTA = $PLANTA_ADO->verPlanta($ARRAYINPSAGPT[0]['ID_PLANTA']);
    if($ARRAYPLANTA){
      $NOMBREPLANTA = $ARRAYPLANTA[0]['NOMBRE_PLANTA'];
      $RAZONSOCIALPLANTA = $ARRAYPLANTA[0]['RAZON_SOCIAL_PLANTA'];
    }else{
      $NOMBREPLANTA="Sin Datos";
      $RAZONSOCIALPLANTA="Sin Datos";
    }
    $ARRAYTEMPORADA = $TEMPORADA_ADO->verTemporada($ARRAYINPSAGPT[0]['ID_TEMPORADA']);
    if($ARRAYTEMPORADA){
      $TEMPORADA = $ARRAYTEMPORADA[0]['NOMBRE_TEMPORADA'];
    }else{
      $TEMPORADA="Sin Datos";
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
$FECHANORMAL2 = $DIA . "/" . $MES . "/" . $ANO;
$FECHANOMBRE = $NOMBREDIA . ", " . $DIA . " de " . $NOMBREMES . " del " . $ANO;


$html = '
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>S.I.F</title>
  </head>
  <body>
    <main>
      <h2 class="titulo" style="text-align: center; color: black;">
        <b>SOLICITUD INSPECCIÓN</b>
        <br>
        <b> N° SIF:'.$CORRELATIVOINPSAG.' </b> 
      </h2>
      <br>
      <br>
      <table  border="0" cellspacing="0" cellpadding="0">   
       <tbody  >
        <tr class="">
          <th class="color2  left " width="20%">Nombre Planta</th>
          <td class="color2  left " >'.$RAZONSOCIALPLANTA.'</td>
          <td class="color2  left ">&nbsp; </td>
          <td class="color2  left ">&nbsp; </td>
        </tr>   
        <tr class="">
          <th class="color2  left">Total de Pallet del Lote</th>
          <td class="color2  left ">'.$TOTALPALLET.' </td>
          <th class="color2  left ">Peso Neto Total(En Kilos)</th> 
          <td class="color2  left ">'.$TOTALNETO.' </td>
        </tr>    
        <tr class="">
          <th class="color2  left">Total de Envases del Pallet</th>
          <td class="color2  left ">'.$TOTALENVASE.' </td>
          <th class="color2  left ">Fecha </th>
          <td class="color2  left ">'.$FECHAINPSAG .'</td>
        </tr>        
       </tbody>
     </table>

      <table  border="0" cellspacing="0" cellpadding="0">
        <thead  >
          <tr class="bor">
            <th class="color bor left">Especies</th>
            <th class="color bor center">Condición</th>
            <th class="color bor center ">Nombre Productor </th>
            <th class="color bor center ">Codigo del Productor </th>
            <th class="color bor center">Cantidad Envase</th>    
            <th class="color bor center"> Reservado S.A.G Folios Muestra</th>    
          </tr>
        </thead>
         <tbody  >
        ';

foreach ($ARRAYINPSAGPTPRODUCTORESPECIES as $d) :
  $html = $html . '
          
                   <tr class="bor2">      
                        <td class="color2 bor2 center">'.$d["ESPECIES"].'</td>
                        <td class="color2 bor2 center">Fresco</td>
                        <td class="color2 bor2 center">'.$d["PRODUCTOR"].'</td>
                        <td class="color2 bor2 center">'.$d["CSG"].'</td>
                        <td class="color2 bor2 center">'.$d["CANTIDAD"].'</td>
                        <td class="color2 bor2 center">&nbsp;<br><br><br><br><br></td>              
                      </tr>
              ';
endforeach;
$html = $html . '              
          <tr class="bor2  ">
              <th class="color2   bor2 center"> Total </th>
              <th class="color2  center">&nbsp;</th>
              <th class="color2  center">&nbsp;</th>
              <th class="color2  center">&nbsp;</th>
              <th class="color2  bor2 center">' . $TOTALENVASE . '</th>
              <th class="color   center">N° Envases Inspeccionados</th>
          </tr>
          <tr class="bor2">
              <th class="color  right"> 
                Pais(Es) 
               
              </th>
              <th class="color left"> Destino </th>
              <th class="color2  center"> '.$PAIS.'</th>
              <th class="color2  center">&nbsp;</th>
              <th class="color2  center">&nbsp;</th>
              <th class="color2 bor2 center">             
                <br>
                <br>
                <br>
                <br>
              </th>
          </tr>    
          <tr class="bor2">
            <th class="color2 bl  right">
              Número de  <br>
              Categoria de 
            </th>
            <th class="color2 br2  left">
              Envases por <br>
               cobro sag
            </th>
            <td class="color2   " >
                    <table  border="0" cellspacing="0" cellpadding="0">
                      <tbody>
                        <tr>
                          <th class="color2 center " >A </th>
                        </tr>
                        <tr>
                          <th class="color2 center " >B </th>
                        </tr>
                        <tr>
                          <th class="color2 center " >C </th>
                        </tr>
                        <tr>
                          <th class="color2 center " >Total </th>
                        </tr>
                      </tbody>
                   </table>
            </td>     
            <th class="color2  center">&nbsp;</th>
            <td class="color2   " >
                    <table  border="0" cellspacing="0" cellpadding="0">
                      <tbody>
                        <tr>
                          <th class="color2 center " >'.$CATEGORIAA.' </th>
                        </tr>
                        <tr>
                          <th class="color2 center " >'.$CATEGORIAB.' </th>
                        </tr>
                        <tr>
                          <th class="color2 center " >'.$CATEGORIAC.' </th>
                        </tr>
                        <tr>
                          <th class="color2 center " >'.$TOTALENVASE.' </th>
                        </tr>
                      </tbody>
                   </table>
            </td>
          </tr>
                    

  
      ';      
$html = $html . '
        </tbody>   
  
      </table>
      ';
      $html = $html . '
      
    <table>
      <thead>  
       <tr>
        <th colspan="7" class="color center">Reservado Sag.</th>
      </tr>
      <tr class="">
        <th class="color2  center">Aprobado</th>
        <th class="color2  center">Rechazado</th>
        <th class="color2  center">Objetado</th>
      </tr>
      <tr class="">
        <th class="color2  center"> <div class="cuadrado" id="cuadrado"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div> </th>
        <th class="color2  center"> <div class="cuadrado" id="cuadrado"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div> </th>
        <th class="color2  center"> <div class="cuadrado" id="cuadrado"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div> </th>
      </tr>
      </thead>  
    </table>

    <table  border="0" cellspacing="0" cellpadding="0">
      <thead>  
      <tr class="">
        <th class="color2  left" width="45%">Cantidad de Certificados Inspeccion/Tratamiento: </th>
        <th class="color2  center"> <hr></th>
      </tr>
      <tr class="">
        <th class="color2  left" >Nombre Ing. Agronomo Inspector</th>
        <th class="color2  center"> <hr></th>
      </tr>
      <tr class="">
        <th class="color2  left"  >Firma Ing. Agronomo Inspector</th>
         <th class="color2  center"><hr></th>
      </tr>
      <tr class="">
        <th class="color2  left " >Fecha Revisión</th>
        <th class="color2  center"> <hr></th>
      </tr> 
      </thead>  
    </table>

    <table  border="0" cellspacing="0" cellpadding="0">
      <thead>  
          <tr class="">
              <th class="color2  left " >Observaciones</th>
          </tr>
          <tr class="">
              <th class="color2  left " ><hr></th>
          </tr>
          <tr class="">
              <th class="color2  left " ><hr></th>
          </tr>
          <tr class="">
              <th class="color2  left " ><hr></th>
          </tr>
      </thead>  
    </table>
<div style="font-size: 12px;">
  Nota: Condición: No es necesaria par productos frescos o de naturaleza seca.<br>
  Código del productor: Es obligatorio cuando los envases indican sólo el código del productor. <br>
  Se debe indicar el RUT del productor para productos que se requiere verificar su trazabilidad, ejemplo frambuesas.<br>
</div>
    ';


   

$html = $html . '

  
    </main>
  </body>
</html>

';






//CREACION NOMBRE DEL ARCHIVO
$NOMBREARCHIVO = "InformeRecepionPt_";
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
$TIPOINFORME = "Informe Recepcion PT";
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
          <th width="55%" class="left f10"></th>
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
