<?php

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES 
include_once '../../assest/controlador/TUSUARIO_ADO.php';
include_once '../../assest/controlador/USUARIO_ADO.php';
include_once '../../assest/controlador/EMPRESA_ADO.php';
include_once '../../assest/controlador/PLANTA_ADO.php';
include_once '../../assest/controlador/TEMPORADA_ADO.php';


include_once '../../assest/controlador/EEXPORTACION_ADO.php';
include_once '../../assest/controlador/EXIEXPORTACION_ADO.php';
include_once '../../ASSEST/controlador/INPSAG_ADO.php';
include_once '../../assest/controlador/TINPSAG_ADO.php';

include_once '../../assest/controlador/VESPECIES_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/INPECTOR_ADO.php';
include_once '../../assest/controlador/CONTRAPARTE_ADO.php';
include_once '../../assest/controlador/PAIS_ADO.php';
include_once '../../assest/controlador/TMANEJO_ADO.php';




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

$ARRAYINPSAGPT = $INPSAG_ADO->verInpsagCsv($IDOP);

if($ARRAYINPSAGPT){
    $ARRAYINPSAGPTPRODUCTORESPECIES = $INPSAG_ADO->buscarPorSagProductoEspecies($IDOP);
    $ARRAYEXIEXPORTACION = $EXIEXPORTACION_ADO->buscarPorSagAgrupadoFolio($IDOP);
    if($ARRAYEXIEXPORTACION){
      $CODIGOESPECIES=$ARRAYINPSAGPTPRODUCTORESPECIES[0]["CODIGO"];
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
    //$ARRAYEXIEXPORTACION = $EXIEXPORTACION_ADO->buscarPorSag2($IDOP);
    $ARRAYEXIEXPORTACIONPALLET=$EXIEXPORTACION_ADO->contarTotalPalletInspSag2($IDOP);
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
    $NUMEROINPSAG = $ARRAYINPSAGPT[0]['NUMERO_INPSAG'];
    $CORRELATIVOINPSAG = $ARRAYINPSAGPT[0]['CORRELATIVO_INPSAG'];
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

    $FECHAINPSAG = $ARRAYINPSAGPT[0]['FECHA'];
    $ARRAYTINPSAG = $TINPSAG_ADO->verTinpsag($ARRAYINPSAGPT[0]['ID_TINPSAG']);
    $NOMBRETINPSAG = $ARRAYTINPSAG[0]['NOMBRE_TINPSAG'];
    $TESTADOSAG = $ARRAYINPSAGPT[0]['TESTADOSAG'];
    $CIF=$ARRAYINPSAGPT[0]['CIF_INPSAG'];
    $OBSERVACIONES=$ARRAYINPSAGPT[0]['OBSERVACION_INPSAG'];

    $ARRAYPAIS=$PAIS_ADO->verPais($ARRAYINPSAGPT[0]['ID_PAIS1']);
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
      $NOMBRETESTADOSAG = "Aprobado USLA";
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


$html = ''.$CORRELATIVOINPSAG.''.$CSPENCABEZADO.''.$CODIGOESPECIES.''.$CODIGOPAIS.'000'.$FECHAINPSAG.''.$TOTALPALLET.'
';
foreach ($ARRAYEXIEXPORTACION as $r) :
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
$html=$html.''.$FOLIO.''.$ENVASE.'
';  
endforeach;
$html=$html.'&&
';






//CREACION NOMBRE DEL ARCHIVO
//CREACION NOMBRE DEL ARCHIVO
$NOMBREARCHIVO = $CSPARCHIVO.$CORRELATIVOINPSAG;
//$FECHADOCUMENTO = $FECHANORMAL . "_" . $HORAFINAL;
$TIPODOCUMENTO = "CSV";
$FORMATO = ".INS";
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
$ETIQUETA = "inspeccion sag";



//PROPIEDADES PARA GENERAR ARCHIVO

$filename = $NOMBREARCHIVOFINAL; 
$contenido = $html; 
$archivo = fopen('../../assest/csv/ins/'.$filename, 'w+'); 
fwrite($archivo, $contenido); 
fclose($archivo); 
header("Cache-Control: public"); 
header("Content-Description: File Transfer");
header("Content-Length: ". 
filesize("../../assest/csv/ins/$filename").";"); 
//obliga a descargar archivo
header("Content-Disposition: attachment; filename=$filename");
header("Content-Type: application/octet-stream; "); 
header("Content-Transfer-Encoding: binary"); readfile('../../assest/csv/ins/'.$filename);

