<?php

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES 
include_once '../../assest/controlador/TUSUARIO_ADO.php';
include_once '../../assest/controlador/USUARIO_ADO.php';
include_once '../../assest/controlador/EMPRESA_ADO.php';
include_once '../../assest/controlador/PLANTA_ADO.php';
include_once '../../assest/controlador/TEMPORADA_ADO.php';


include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/VESPECIES_ADO.php';
include_once '../../assest/controlador/EEXPORTACION_ADO.php';
include_once '../../assest/controlador/EXIEXPORTACION_ADO.php';
include_once '../../assest/controlador/TMANEJO_ADO.php';
include_once '../../assest/controlador/TCALIBRE_ADO.php';
include_once '../../assest/controlador/TEMBALAJE_ADO.php';


include_once '../../assest/controlador/DREPALETIZAJEEX_ADO.php';
include_once '../../assest/controlador/REPALETIZAJEEX_ADO.php';
include_once '../../assest/controlador/INPSAG_ADO.php';
include_once '../../assest/controlador/PAIS_ADO.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$TUSUARIO_ADO = new TUSUARIO_ADO();
$USUARIO_ADO = new USUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();

$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$EEXPORTACION_ADO =  new EEXPORTACION_ADO();
$EXIEXPORTACION_ADO =  new EXIEXPORTACION_ADO();
$TMANEJO_ADO =  new TMANEJO_ADO();
$TCALIBRE_ADO =  new TCALIBRE_ADO();
$TEMBALAJE_ADO =  new TEMBALAJE_ADO();


$REPALETIZAJEEX_ADO =  new REPALETIZAJEEX_ADO();
$DREPALETIZAJEEX_ADO =  new DREPALETIZAJEEX_ADO();
$INPSAG_ADO =  new INPSAG_ADO();
$PAIS_ADO =  new PAIS_ADO();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$NUMEROREPALETIZAJE = "";


$EMPRESA = "";
$EMPRESAURL = "";
$FECHAINGRESO = "";
$FECHAMODIFCACION = "";
$MOTIVO = "";
$TOTALENVASE = "";
$TOTALNETO = "";

$TOTALENVASEREPA = "";
$TOTALNETOREPA = "";

$TOTALE = "";
$TOTALNE = "";
$NUMEROINPECCION = "";

$OP = "";

//INICIALIZAR ARREGLOS
$ARRAYEMPRESA = "";
$ARRAYREPALETIZAJE = "";
$ARRAYDREPALETIZAJE = "";
$ARRAYDREPALETIZAJETOTALES = "";
$ARRAYEXISTENCIATOMADA = "";
$ARRAYVERINPECCIONSAG = "";

$ARRAYVERPRODUCTORID = "";
$ARRAYVERVESPECIESID = "";
$ARRAYEVERERECEPCIONID = "";
$ARRAYEXISTENCIABUSCARPOFOLIO = "";
$ARRAYUSUARIO="";




if (isset($_REQUEST['usuario'])) {
    $USUARIO = $_REQUEST['usuario'];
    $ARRAYUSUARIO = $USUARIO_ADO->ObtenerNombreCompleto($USUARIO);
    $NOMBRE = $ARRAYUSUARIO[0]["NOMBRE_COMPLETO"];
  }
  
if (isset($_REQUEST['parametro'])) {
    $IDOP = $_REQUEST['parametro'];
}
$ARRAYREPALETIZAJE = $REPALETIZAJEEX_ADO->verRepaletizajeCsv($IDOP);
if($ARRAYREPALETIZAJE){

    $ARRAYEXISTENCIATOMADA = $EXIEXPORTACION_ADO->buscarPorRepaletizaje2($IDOP);
    $ARRAYDESPACHOEXESPECIES = $REPALETIZAJEEX_ADO->buscarPorRepaletizajePorEspecies($IDOP);
    if($ARRAYEXISTENCIATOMADA){
      $CODIGOESPECIES=$ARRAYDESPACHOEXESPECIES[0]["CODIGO"];
      if( strlen($CODIGOESPECIES)==1){
        $CODIGOESPECIES="0000000".$CODIGOESPECIES;
      }else if( strlen($CODIGOESPECIES)==2){
        $CODIGOESPECIES="000000".$CODIGOESPECIES;
      }else if( strlen($CODIGOESPECIES)==3){
        $CODIGOESPECIES="00000".$CODIGOESPECIES;
      } else if( strlen($CODIGOESPECIES)==4){
        $CODIGOESPECIES="0000".$CODIGOESPECIES;
      } else if( strlen($CODIGOESPECIES)==5){
        $CODIGOESPECIES="000".$CODIGOESPECIES;
      } else if( strlen($CODIGOESPECIES)==6){
        $CODIGOESPECIES="00".$CODIGOESPECIES;
      } else if( strlen($CODIGOESPECIES)==7){
        $CODIGOESPECIES="0".$CODIGOESPECIES;
      } else{
        $CODIGOESPECIES=substr($CODIGOESPECIES,-8);
      } 
    }else{
      $CODIGOESPECIES="00000000";
    }

    $ARRAYDREPALETIZAJE = $DREPALETIZAJEEX_ADO->buscarDrepaletizaje2($IDOP);
    $ARRAYDREPALETIZAJETOTALES = $DREPALETIZAJEEX_ADO->totalesDrepaletizaje2($IDOP);    
    $TOTALENVASEREPA = $ARRAYDREPALETIZAJETOTALES[0]['ENVASE'];
    $TOTALNETOREPA = $ARRAYDREPALETIZAJETOTALES[0]['NETO'];  
    
    
    $FECHAINGRESO = $ARRAYREPALETIZAJE[0]['INGRESO'];

    $FECHAMODIFCACION = $ARRAYREPALETIZAJE[0]['MODIFICACION'];
    $MOTIVO = $ARRAYREPALETIZAJE[0]['MOTIVO_REPALETIZAJE'];
    $OBSERVACIONES = $ARRAYREPALETIZAJE[0]['MOTIVO_REPALETIZAJE'];
    $ESTADO = $ARRAYREPALETIZAJE[0]['ESTADO'];
    if ($ARRAYREPALETIZAJE[0]['ESTADO'] == 1) {
      $ESTADO = "Abierto";
    }else if ($ARRAYREPALETIZAJE[0]['ESTADO'] == 0) {
      $ESTADO = "Cerrado";
    }else{
      $ESTADO="Sin Datos";
    }  
    
    
    $IDUSUARIOI = $ARRAYREPALETIZAJE[0]['ID_USUARIOI'];  
    $ARRAYUSUARIO2 = $USUARIO_ADO->ObtenerNombreCompleto($IDUSUARIOI);
    $NOMBRERESPONSABLE = $ARRAYUSUARIO2[0]["NOMBRE_COMPLETO"]; 


    $ARRAYEXISTENCIATOMADA = $EXIEXPORTACION_ADO->buscarPorRepaletizaje2($IDOP);
    $ARRAYEXIEXPORTACIONPALLET=$EXIEXPORTACION_ADO->contarTotalPalletRepaletizajeEx($IDOP);  
    $TOTALPALLET=$ARRAYEXIEXPORTACIONPALLET[0]['PALLET'];
    if( strlen($TOTALPALLET)==1){
      $TOTALPALLET="000".$TOTALPALLET;
    }else if( strlen($TOTALPALLET)==2){
      $TOTALPALLET="00".$TOTALPALLET;
    }else if( strlen($TOTALPALLET)==3){
      $TOTALPALLET="0".$TOTALPALLET;
    }else{
      $TOTALPALLET=substr($TOTALPALLET,-4);
    }   

  
    
    $NUMEROREPALETIZAJE = $ARRAYREPALETIZAJE[0]['NUMERO_REPALETIZAJE'];
    if( strlen($NUMEROREPALETIZAJE)==1){
      $NUMEROREPALETIZAJE="0000".$NUMEROREPALETIZAJE;
    }else if( strlen($NUMEROREPALETIZAJE)==2){
      $NUMEROREPALETIZAJE="000".$NUMEROREPALETIZAJE;
    }else if( strlen($NUMEROREPALETIZAJE)==3){
      $NUMEROREPALETIZAJE="00".$NUMEROREPALETIZAJE;
    } else if( strlen($NUMEROREPALETIZAJE)==4){
      $NUMEROREPALETIZAJE="0".$NUMEROREPALETIZAJE;
    }else{
      $NUMEROREPALETIZAJE=substr($NUMEROREPALETIZAJE,-5);
    }   
  

    $ARRAYPLANTA = $PLANTA_ADO->verPlanta($ARRAYREPALETIZAJE[0]['ID_PLANTA']);
    if($ARRAYPLANTA){
      $NOMBREPLANTA = $ARRAYPLANTA[0]['NOMBRE_PLANTA'];
      $RAZONSOCIALPLANTA = $ARRAYPLANTA[0]['RAZON_SOCIAL_PLANTA'];
      $CSPPLANTA = $ARRAYPLANTA[0]['CODIGO_SAG_PLANTA'];
      if( strlen($CSPPLANTA)==1){
        $CSPARCHIVO="00".$CSPPLANTA;
        $CSPENCABEZADO="000".$CSPPLANTA;
      }else if( strlen($CSPPLANTA)==2){
        $CSPARCHIVO="0".$CSPPLANTA;
        $CSPENCABEZADO="00".$CSPPLANTA;
      }else if( strlen($CSPPLANTA)==3){
        $CSPARCHIVO=$CSPPLANTA;
        $CSPENCABEZADO="0".$CSPPLANTA;
      }else if( strlen($CSPPLANTA)==4){
        $CSPARCHIVO=substr($CSPPLANTA,-3);
        $CSPENCABEZADO=$CSPPLANTA;
      }else{
        $CSPARCHIVO=substr($CSPPLANTA,-3);
        $CSPENCABEZADO=substr($CSPPLANTA,-4);    
      }   
    }
    $ARRAYTEMPORADA = $TEMPORADA_ADO->verTemporada($ARRAYREPALETIZAJE[0]['ID_TEMPORADA']);
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


$html = ''.$CSPENCABEZADO.''.$TOTALPALLET.' 
';
foreach ($ARRAYEXISTENCIATOMADA as $r) :
  if( strlen($r["ENVASE"])==1){
    $ENVASE="000".$r["ENVASE"];
  }else if( strlen($r["ENVASE"])==2){
    $ENVASE="00".$r["ENVASE"];
  }else if( strlen($r["ENVASE"])==3){
    $ENVASE="0".$r["ENVASE"];
  }else{
    $ENVASE=$r["ENVASE"]; 
  } 
  if( strlen($r["FOLIO_AUXILIAR_EXIEXPORTACION"])==1){
    $FOLIO="000000000".$r["FOLIO_AUXILIAR_EXIEXPORTACION"];
  }else if( strlen($r["FOLIO_AUXILIAR_EXIEXPORTACION"])==2){
    $FOLIO="00000000".$r["FOLIO_AUXILIAR_EXIEXPORTACION"];
  }else if( strlen($r["FOLIO_AUXILIAR_EXIEXPORTACION"])==3){
    $FOLIO="0000000".$r["FOLIO_AUXILIAR_EXIEXPORTACION"];
  }else if( strlen($r["FOLIO_AUXILIAR_EXIEXPORTACION"])==4){
    $FOLIO="000000".$r["FOLIO_AUXILIAR_EXIEXPORTACION"];
  }else if( strlen($r["FOLIO_AUXILIAR_EXIEXPORTACION"])==5){
    $FOLIO="00000".$r["FOLIO_AUXILIAR_EXIEXPORTACION"];
  }else if( strlen($r["FOLIO_AUXILIAR_EXIEXPORTACION"])==6){
    $FOLIO="0000".$r["FOLIO_AUXILIAR_EXIEXPORTACION"];
  }else if( strlen($r["FOLIO_AUXILIAR_EXIEXPORTACION"])==7){
    $FOLIO="000".$r["FOLIO_AUXILIAR_EXIEXPORTACION"];
  }else if( strlen($r["FOLIO_AUXILIAR_EXIEXPORTACION"])==8){
    $FOLIO="00".$r["FOLIO_AUXILIAR_EXIEXPORTACION"];
  }else if( strlen($r["FOLIO_AUXILIAR_EXIEXPORTACION"])==9){
    $FOLIO="0".$r["FOLIO_AUXILIAR_EXIEXPORTACION"];
  }else{
    $FOLIO=substr($r["FOLIO_AUXILIAR_EXIEXPORTACION"],-10);   
  } 
  $ARRAYINSPECCION=$INPSAG_ADO->verInpsagCsv($r["ID_INPSAG"]);  
  if($ARRAYINSPECCION){
    $ARRAYPAIS=$PAIS_ADO->verPais($ARRAYINSPECCION[0]['ID_PAIS1']);
    if($ARRAYPAIS){
      $PAIS=$ARRAYPAIS[0]['NOMBRE_PAIS'];
      $CODIGOPAIS=$ARRAYPAIS[0]['CODIGO_SAG_PAIS'];   
      if( strlen($CODIGOPAIS)==1){
        $CODIGOPAIS="00".$CODIGOPAIS;
      }else if( strlen($CODIGOPAIS)==2){
        $CODIGOPAIS="0".$CODIGOPAIS;
      }else{
        $CODIGOPAIS=substr($CODIGOPAIS,-3);
      }
    }else{
      $CODIGOPAIS="000";
    }
    $CORRELATIVOINPSAG = $ARRAYINSPECCION[0]['CORRELATIVO_INPSAG'];
    if( strlen($CORRELATIVOINPSAG)==1){
      $CORRELATIVOINPSAG="0000".$CORRELATIVOINPSAG;
    }else if( strlen($CORRELATIVOINPSAG)==2){
      $CORRELATIVOINPSAG="000".$CORRELATIVOINPSAG;
    }else if( strlen($CORRELATIVOINPSAG)==3){
      $CORRELATIVOINPSAG="00".$CORRELATIVOINPSAG;
    } else if( strlen($CORRELATIVOINPSAG)==4){
      $CORRELATIVOINPSAG="0".$CORRELATIVOINPSAG;
    }else{
      $CORRELATIVOINPSAG=substr($CORRELATIVOINPSAG,-5);
    } 
  }else{
    $CODIGOPAIS="000";  
    $CORRELATIVOINPSAG="00000";   
  }
  

$html=$html.'M'.$CORRELATIVOINPSAG.''.$FOLIO.''.$ENVASE.''.$CODIGOESPECIES.''.$CODIGOPAIS.''.$FECHAINGRESO.'
';
endforeach;
$html=$html.'&&
';






//CREACION NOMBRE DEL ARCHIVO
//CREACION NOMBRE DEL ARCHIVO
$NOMBREARCHIVO = $CSPARCHIVO.$NUMEROREPALETIZAJE;
//$FECHADOCUMENTO = $FECHANORMAL . "_" . $HORAFINAL;
$TIPODOCUMENTO = "CSV";
$FORMATO = ".REP";
$NOMBREARCHIVOFINAL = $NOMBREARCHIVO  . $FORMATO;

//CONFIGURACIOND DEL DOCUMENTO
$TIPOPAPEL = "LETTER";
$ORIENTACION = "P";
$LENGUAJE = "ES";
$UNICODE = "true";
$ENCODING = "UTF-8";

//DETALLE DEL CREADOR DEL INFORME
$TIPOINFORME = "CSV ";
$CREADOR = "Usuario";
$AUTOR = "Usuario";
$ASUNTO = "CSV";
$DESCRIPCION = "CSV, " . $FECHANOMBRE . ", " . $HORAFINAL2;
$CATEGORIA = "CSV inspeccion";
$ETIQUETA = "Repaleitzaje PT";



//PROPIEDADES PARA GENERAR ARCHIVO

$filename = $NOMBREARCHIVOFINAL; 
$contenido = $html; 
$archivo = fopen('../../assest/csv/rep/'.$filename, 'w+'); 
fwrite($archivo, $contenido); 
fclose($archivo); 
header("Cache-Control: public"); 
header("Content-Description: File Transfer");
header("Content-Length: ". 
filesize("../../assest/csv/rep/$filename").";"); 
//obliga a descargar archivo
header("Content-Disposition: attachment; filename=$filename");
header("Content-Type: application/octet-stream; "); 
header("Content-Transfer-Encoding: binary"); readfile('../../assest/csv/rep/'.$filename);

