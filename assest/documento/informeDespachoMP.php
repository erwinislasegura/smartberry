<?php

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES 
include_once '../../assest/controlador/TUSUARIO_ADO.php';
include_once '../../assest/controlador/USUARIO_ADO.php';
include_once '../../assest/controlador/EMPRESA_ADO.php';
include_once '../../assest/controlador/PLANTA_ADO.php';
include_once '../../assest/controlador/TEMPORADA_ADO.php';

include_once '../../assest/controlador/VESPECIES_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/ERECEPCION_ADO.php';

include_once '../../assest/controlador/CONDUCTOR_ADO.php';
include_once '../../assest/controlador/TRANSPORTE_ADO.php';
include_once '../../assest/controlador/EXIMATERIAPRIMA_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/COMPRADOR_ADO.php';

include_once '../../assest/controlador/DESPACHOMP_ADO.php';
include_once '../../assest/controlador/EXIMATERIAPRIMA_ADO.php';




//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$TUSUARIO_ADO = new TUSUARIO_ADO();
$USUARIO_ADO = new USUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();

$VESPECIES_ADO =  new VESPECIES_ADO();
$PRODUCTOR_ADO = new PRODUCTOR_ADO();
$ERECEPCION_ADO =  new ERECEPCION_ADO();

$TRANSPORTE_ADO =  new TRANSPORTE_ADO();
$CONDUCTOR_ADO =  new CONDUCTOR_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$COMPRADOR_ADO =  new COMPRADOR_ADO();


$DESPACHOMP_ADO =  new DESPACHOMP_ADO();
$EXIMATERIAPRIMA_ADO =  new EXIMATERIAPRIMA_ADO();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$NUMERODESPACHO = "";
$EMPRESA = "";
$EMPRESAURL = "";
$FECHA = "";
$FECHAINGRESO = "";
$FECHAMODIFCACION = "";
$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";
$NUMEROGUIA = "";
$TDESPACHO = "";
$TRANSPORTE = "";
$PATENTECAMION = "";
$PATENTECARRO = "";
$CONDUCTOR = "";
$COMPRADOR = "";

$TOTALENVASE = "";
$TOTALNETO = "";
$NUMERO = "";

$IDOP = "";
$OP = "";

//INICIALIZAR ARREGLOS
$ARRAYEMPRESA = "";
$ARRAYDESPACHO = "";
$ARRAYEXISTENCIATOMADA = "";
$ARRAYTRANSPORTE = "";
$ARRAYCONDUCTOR = "";
$ARRAYCOMPRADOR = "";

$ARRAYVERPRODUCTORID = "";
$ARRAYVERVESPECIESID = "";
$ARRAYEVERERECEPCIONID = "";
$ARRAYUSUARIO = "";

if (isset($_REQUEST['usuario'])) {
  $USUARIO = $_REQUEST['usuario'];
  $ARRAYUSUARIO = $USUARIO_ADO->ObtenerNombreCompleto($USUARIO);
  $NOMBRE = $ARRAYUSUARIO[0]["NOMBRE_COMPLETO"];
}






if (isset($_REQUEST['parametro'])) {
  $IDOP = $_REQUEST['parametro'];
  $NUMERODESPACHO = $IDOP;
}
$ARRAYDESPACHO = $DESPACHOMP_ADO->verDespachomp3($IDOP);

if($ARRAYDESPACHO){

  //$ARRAYDESPACHOTOTAL = $DESPACHOMP_ADO->obtenerTotalesDespachompCBX2($IDOP);


  $ARRAYEXISTENCIATOMADA = $EXIMATERIAPRIMA_ADO->buscarPordespacho2($IDOP);
  $ARRAYDESPACHOTOTAL = $EXIMATERIAPRIMA_ADO->obtenerTotalesDespacho2($IDOP);
  $TOTALENVASE = $ARRAYDESPACHOTOTAL[0]['ENVASE'];
  $TOTALNETO = $ARRAYDESPACHOTOTAL[0]['NETO'];


  $NUMERO = $ARRAYDESPACHO[0]['NUMERO_DESPACHO'];
  $FECHA = $ARRAYDESPACHO[0]['FECHA'];
  $FECHAINGRESO = $ARRAYDESPACHO[0]['INGRESO'];
  $FECHAMODIFCACION = $ARRAYDESPACHO[0]['MODIFICACION'];
  $TDESPACHO = $ARRAYDESPACHO[0]['TDESPACHO'];
  $PATENTECAMION = $ARRAYDESPACHO[0]['PATENTE_CAMION'];
  $PATENTECARRO = $ARRAYDESPACHO[0]['PATENTE_CARRO'];
  $OBSERVACIONES = $ARRAYDESPACHO[0]['OBSERVACION_DESPACHO'];

  $ESTADO = $ARRAYDESPACHO[0]['ESTADO'];
  if ($ARRAYDESPACHO[0]['ESTADO'] == 1) {
    $ESTADO = "Abierto";
  }else if ($ARRAYDESPACHO[0]['ESTADO'] == 0) {
    $ESTADO = "Cerrado";
  }else{
    $ESTADO="Sin Datos";
  } 

  $IDUSUARIOI = $ARRAYDESPACHO[0]['ID_USUARIOI'];  
  $ARRAYUSUARIO2 = $USUARIO_ADO->ObtenerNombreCompleto($IDUSUARIOI);
  $NOMBRERESPONSABLE = $ARRAYUSUARIO2[0]["NOMBRE_COMPLETO"];

  if ($TDESPACHO == "1") {
    $TDESPACHON = "Interplanta";
    $NUMEROGUIA = $ARRAYDESPACHO[0]['NUMERO_GUIA_DESPACHO'];
    $ARRAYPLANTA2 = $PLANTA_ADO->verPlanta($ARRAYDESPACHO[0]['ID_PLANTA2']);
    if ($ARRAYPLANTA2) {
      $DESTINO = $ARRAYPLANTA2[0]['NOMBRE_PLANTA'];
    } else {
      $DESTINO = "";
    }
  }
  if ($TDESPACHO == "2") {
    $TDESPACHON = "Devolución a Productor";
    $NUMEROGUIA = $ARRAYDESPACHO[0]['NUMERO_GUIA_DESPACHO'];
    $ARRAYPRODUCTOR = $PRODUCTOR_ADO->verProductor($ARRAYDESPACHO[0]['ID_PRODUCTOR']);
    if ($ARRAYPRODUCTOR) {
      $CODIGOPRODUCTOR = $ARRAYPRODUCTOR[0]['CSG_PRODUCTOR'];
      $DESTINO = $ARRAYPRODUCTOR[0]['NOMBRE_PRODUCTOR'];
    } else {
      $CODIGOPRODUCTOR = "";
      $DESTINO = "";
    }
  }
  if ($TDESPACHO == "3") {
    $TDESPACHON = "Venta";
    $NUMEROGUIA = $ARRAYDESPACHO[0]['NUMERO_GUIA_DESPACHO'];
    $ARRAYCOMPRADOR = $COMPRADOR_ADO->verComprador($ARRAYDESPACHO[0]['ID_COMPRADOR']);
    if ($ARRAYCOMPRADOR) {
      $DESTINO = $ARRAYCOMPRADOR[0]['NOMBRE_COMPRADOR'];
    } else {
      $DESTINO = "";
    }
  }
  if ($TDESPACHO == "4") {
    $TDESPACHON = "Regalo";
    $TDESPACHON = "Despacho de Descarte(R)";
    $NUMEROGUIA = "No Aplica";
    $DESTINO = $ARRAYDESPACHO[0]['REGALO_DESPACHO'];
  }
  if ($TDESPACHO == "5") {
    $TDESPACHON = "Planta Externa";
    $NUMEROGUIA = $ARRAYDESPACHO[0]['NUMERO_GUIA_DESPACHO'];
    $ARRAYPLANTA3= $PLANTA_ADO->verPlanta($ARRAYDESPACHO[0]['ID_PLANTA3']);
    if ($ARRAYPLANTA3) {
      $DESTINO = $ARRAYPLANTA3[0]['NOMBRE_PLANTA'];
    } else {
      $DESTINO = "";
    }
  }
  if ($TDESPACHO == "6") {
    $TDESPACHON = "Despacho a Productor";
    $NUMEROGUIA = $ARRAYDESPACHO[0]['NUMERO_GUIA_DESPACHO'];
    $ARRAYPRODUCTOR = $PRODUCTOR_ADO->verProductor($ARRAYDESPACHO[0]['ID_PRODUCTOR']);
    if ($ARRAYPRODUCTOR) {
      $CODIGOPRODUCTOR = $ARRAYPRODUCTOR[0]['CSG_PRODUCTOR'];
      $DESTINO = $ARRAYPRODUCTOR[0]['NOMBRE_PRODUCTOR'];
    } else {
      $CODIGOPRODUCTOR = "";
      $DESTINO = "";
    }
  }



  $ARRAYTRANSPORTE = $TRANSPORTE_ADO->verTransporte($ARRAYDESPACHO[0]['ID_TRANSPORTE']);
  $ARRAYCONDUCTOR = $CONDUCTOR_ADO->verConductor($ARRAYDESPACHO[0]['ID_CONDUCTOR']);;

  $TRANSPORTE = $ARRAYTRANSPORTE[0]['NOMBRE_TRANSPORTE'];
  $CONDUCTOR = $ARRAYCONDUCTOR[0]['NOMBRE_CONDUCTOR'];

  $ARRAYPLANTA = $PLANTA_ADO->verPlanta($ARRAYDESPACHO[0]['ID_PLANTA']);
  $ARRAYTEMPORADA = $TEMPORADA_ADO->verTemporada($ARRAYDESPACHO[0]['ID_TEMPORADA']);
  $ARRAYEMPRESA = $EMPRESA_ADO->verEmpresa($ARRAYDESPACHO[0]['ID_EMPRESA']);

  $TEMPORADA = $ARRAYTEMPORADA[0]['NOMBRE_TEMPORADA'];
  $PLANTA = $ARRAYPLANTA[0]['NOMBRE_PLANTA'];

  $EMPRESA = $ARRAYEMPRESA[0]['NOMBRE_EMPRESA'];
  $EMPRESAURL = $ARRAYEMPRESA[0]['LOGO_EMPRESA'];

  if ($EMPRESAURL == "") {
    $EMPRESAURL = "img/empresa/no_disponible.png";
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





//ESCTRUTURA DEL DOCUMENTO

$html = '
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Informe Despacho</title>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
           <img src="../../assest//img/logo.png" width="150px" height="45px"/>
      </div>
      <div id="company">
        <h2 class="name">Soc. Agrícola El Álamo Ltda.</h2>
        <div>Fundo El Álamo</div>
        <div>Los Ángeles, Chile.</div>
        <div><a href="mailto:ti@fvolcan.com">ti@fvolcan.cl</a></div>
      </div>
    </header>
    <main>
      <h2 class="titulo" style="text-align: center; color: black;">
        INFORME DESPACHO MATERIA PRIMA
        <br>
        <b> Numero Despacho: ' . $NUMERO . '</b>
      </h2>
      <div id="details" class="clearfix">
        
      <div id="invoice">
      <div class="date"><b>Código BRC: </b>REP-DESPMP</div> 
      <div class="date"><b>Fecha Despacho: </b>' . $FECHA . ' </div>
      <div class="date"><b>Empresa: </b>' . $EMPRESA . '  </div>
      <div class="date"><b>Planta: </b>' . $PLANTA . '  </div>
      <div class="date"><b>Temporada: </b>' . $TEMPORADA . '  </div>
    </div>


    <div id="client">
    <div class="address"><b>Numero Guia:  </b>' . $NUMEROGUIA . '</div>
    <div class="address"><b>Tipo Despacho:  </b>' . $TDESPACHON . '</div>
    ';
if ($TDESPACHO == "1") {
  $html .= '
      <div class="address"><b> Planta Destino:  </b>' . $DESTINO . '</div>
      ';
}
if ($TDESPACHO == "2") {
  $html .= '
      <div class="address"><b>CSG:  </b>' . $CODIGOPRODUCTOR . '</div>
      <div class="address"><b>Productor Destino:  </b>' . $DESTINO . '</div>
      ';
}

if ($TDESPACHO == "3") {
  $html .= '
      <div class="address"><b>Comprador Destino:  </b>' . $DESTINO . '</div>
      ';
}

if ($TDESPACHO == "4") {
  $html .= '
            <div class="address"><b>Destino:  </b>' . $DESTINO . '</div>
            ';
}
if ($TDESPACHO == "5") {
  $html .= '
            <div class="address"><b>Planta Destino:  </b>' . $DESTINO . '</div>
            ';
}

if ($TDESPACHO == "6") {
  $html .= '
            <div class="address"><b>CSG:  </b>' . $CODIGOPRODUCTOR . '</div>
            <div class="address"><b>Productor Destino:  </b>' . $DESTINO . '</div>
            ';
}
$html .= '
      <div class="address"><b>Estado Despacho: </b> ' . $ESTADO . ' </div>
  </div>        
</div>
    <table border="0" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th colspan="9" class="center">DETALLE </th>
                </tr>
                <tr>
                    <th class="color left">Folio</th>
                    <th class="color left">Fecha Cosecha</th>
                    <th class="color left">Codigo Estandar</th>
                    <th class="color left">Envase/Estandar</th>
                    <th class="color center">Cant. Envase</th>
                    <th class="color center">Kilos Neto</th>
                    <th class="color center ">Variedad </th>
                    <th class="color center ">CSG </th>
                    <th class="color center ">Productor </th>
                </tr>
            </thead>
            <tbody>
    ';
foreach ($ARRAYEXISTENCIATOMADA as $r) :

  $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);
  if ($ARRAYVERPRODUCTORID) {
    $CSGPRODUCTOR = $ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'];
    $NOMBREPRODUCTOR = $ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'];
  } else {
    $CSGPRODUCTOR = "Sin Datos";
    $NOMBREPRODUCTOR = "Sin Datos";
  }

  $ARRAYEVERERECEPCIONID = $ERECEPCION_ADO->verEstandar($r['ID_ESTANDAR']);
  if ($ARRAYEVERERECEPCIONID) {
    $CODIGOESTANDAR = $ARRAYEVERERECEPCIONID[0]['CODIGO_ESTANDAR'];
    $NOMBREESTANDAR = $ARRAYEVERERECEPCIONID[0]['NOMBRE_ESTANDAR'];
  } else {
    $CODIGOESTANDAR = "Sin Datos";
    $NOMBREESTANDAR = "Sin Datos";
  }
  $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
  if ($ARRAYVERVESPECIESID) {
    $NOMBREVESPECIES = $ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'];
  } else {
    $NOMBREVESPECIES = "Sin Datos";
  }




  $html = $html . '
        <tr>
            <th class=" left">' . $r['FOLIO_AUXILIAR_EXIMATERIAPRIMA'] . '</th>
            <td class=" left">' . $r['COSECHA'] . '</td>
            <td class=" left">' . $CODIGOESTANDAR . '</td>
            <td class=" left">' . $NOMBREESTANDAR . '</td>
            <td class=" center">' . $r['ENVASE'] . '</td>
            <td class=" center">' . $r['NETO'] . '</td>
            <td class=" center ">' . $NOMBREVESPECIES . ' </td>
            <td class=" center ">' . $CSGPRODUCTOR . ' </td>
            <td class=" center ">' . $NOMBREPRODUCTOR . ' </td>
        </tr>
        ';
endforeach;
$html = $html . '
        <tr>
            <th class="color left">&nbsp;</th>
            <th class="color left">&nbsp;</th>
            <th class="color left">&nbsp;</th>
            <th class="color left">Sub Total</th>
            <th class="color center">' . $TOTALENVASE . '</th>
            <th class="color center">' . $TOTALNETO . '</th>
            <th class="color center ">&nbsp; </th>
            <th class="color center ">&nbsp; </th>
            <th class="color left">&nbsp;</th>
        </tr>
    ';
$html = $html . '
    </tbody>
  </table>
  ';




$html = $html . '
  <div id="details" class="clearfix">
    <div id="client">
      <div class="address"><b>Informacion De Transporte</b></div>
      <div class="address">Empresa Transporte:  ' . $TRANSPORTE . ' </div>
      <div class="address">Conductor: ' . $CONDUCTOR . '</div>
      <div class="address">Patente Camion: ' . $PATENTECAMION . '</div>
      <div class="address">Patente Carro: ' . $PATENTECARRO . '</div>
    </div>
    <div id="client">
      <div class="address"><b>Observaciones</b></div>
      <div class="address">  ' . $OBSERVACIONES . ' </div>
    </div>
    <div id="invoice">
      <div class="date"><b><hr></b></div>
      <div class="date center">  Firma Responsable</div>
      <div class="date center">  ' . $NOMBRERESPONSABLE . '</div>
    </div>
  </div>
  
</main>
</body>
</html>

';



//CREACION NOMBRE DEL ARCHIVO
$NOMBREARCHIVO = "InformeDespachoMateriaPrima_";
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
$TIPOINFORME = "Informe Despacho";
$CREADOR = "Usuario";
$AUTOR = "Usuario";
$ASUNTO = "Informe";

//API DE GENERACION DE PDF
require_once '../../api/mpdf/mpdf/autoload.php';
//$PDF = new \Mpdf\Mpdf();W
$PDF = new \Mpdf\Mpdf(['format' => 'letter']);

//CONFIGURACION FOOTER Y HEADER DEL PDF
//CONFIGURACION FOOTER Y HEADER DEL PDF
$PDF->SetHTMLHeader('
    <table width="100%" >
        <tbody>
            <tr>
              <th width="55%" class="left f10">' . $EMPRESA . '</th>
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
$stylesheet = file_get_contents('../../assest//css/stylePdf.css'); // carga archivo css
$stylesheet2 = file_get_contents('../../assest//css/reset.css'); // carga archivo css

//ENLASAR CSS CON LA VISTA DEL PDF
$PDF->WriteHTML($stylesheet, 1);
$PDF->WriteHTML($stylesheet2, 1);

//GENERAR PDF
$PDF->WriteHTML($html);
//METODO DE SALIDA
$PDF->Output($NOMBREARCHIVOFINAL, \Mpdf\Output\Destination::INLINE);
