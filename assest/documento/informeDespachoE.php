<?php

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES 
include_once '../../assest/controlador/USUARIO_ADO.php';
include_once '../../assest/controlador/EMPRESA_ADO.php';
include_once '../../assest/controlador/PLANTA_ADO.php';
include_once '../../assest/controlador/TEMPORADA_ADO.php';


include_once '../../assest/controlador/TDOCUMENTO_ADO.php';
include_once '../../assest/controlador/TRANSPORTE_ADO.php';
include_once '../../assest/controlador/CONDUCTOR_ADO.php';
include_once '../../assest/controlador/BODEGA_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/PROVEEDOR_ADO.php';
include_once '../../assest/controlador/COMPRADOR_ADO.php';

include_once '../../assest/controlador/PRODUCTO_ADO.php';
include_once '../../assest/controlador/TUMEDIDA_ADO.php';

include_once '../../assest/controlador/INVENTARIOE_ADO.php';
include_once '../../assest/controlador/DESPACHOE_ADO.php';
include_once '../../assest/controlador/DESPACHOMP_ADO.php';



//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$USUARIO_ADO = new USUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();



$TDOCUMENTO_ADO = new TDOCUMENTO_ADO();
$TRANSPORTE_ADO = new TRANSPORTE_ADO();
$CONDUCTOR_ADO = new CONDUCTOR_ADO();
$BODEGA_ADO = new BODEGA_ADO();
$PRODUCTOR_ADO = new PRODUCTOR_ADO();
$PROVEEDOR_ADO = new PROVEEDOR_ADO();
$COMPRADOR_ADO = new COMPRADOR_ADO();

$PRODUCTO_ADO = new PRODUCTO_ADO();
$TUMEDIDA_ADO = new TUMEDIDA_ADO();


$INVENTARIOE_ADO = new INVENTARIOE_ADO();
$DESPACHOE_ADO = new DESPACHOE_ADO();
$DESPACHOMP_ADO = new DESPACHOMP_ADO();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$NUMERORECEPCION = "";
$FECHARECEPCION = "";
$NUMERODOCUMENTO = "";
$NOMBRETCONETEDOR = "";
$NOMBRETUMEDIDA = "";
$NOMBREPRODUCTO = "";
$TIPORECEPCION = "";
$NOMBRETRECEPCION = "";
$NOMBREBODEGA = "";
$NOMBREORIGEN = "";
$NOMBRETDOCUMENTO = "";
$NOMBRECONDUCTOR = "";
$NOMBRETRANSPORTE = "";
$PATENTECAMION = "";
$PATENTECARRO = "";
$TOTALCANTIDAD = "";
$NOMBRETCONETEDOR = "";


//INICIALIZAR ARREGLOS
$ARRAYRECEPCION = "";
$ARRAYTRECEPCION = "";
$ARRAYDRECEPCION = "";
$ARRAYDRECEPCIONTOTAL = "";
$ARRAYPROVEEDOR = "";
$ARRAYPRODUCTOR = "";
$ARRAYPLANTAEXTERNA = "";
$ARRAYBODEGA = "";
$ARRAYTDOCUMENTO = "";
$ARRAYCONDUCTOR = "";
$ARRAYTRANSPORTE = "";
$ARRAYTARJAM = "";
$ARRAYTCONTENDOR = "";

if (isset($_REQUEST['usuario'])) {
  $USUARIO = $_REQUEST['usuario'];
  $ARRAYUSUARIO = $USUARIO_ADO->ObtenerNombreCompleto($USUARIO);
  $NOMBRE = $ARRAYUSUARIO[0]["NOMBRE_COMPLETO"];
}


if (isset($_REQUEST['parametro'])) {
  $IDOP = $_REQUEST['parametro'];
}


$ARRAYRECEPCION = $DESPACHOE_ADO->verDespachoe3($IDOP);
if ($ARRAYRECEPCION) {
  $ARRAYDRECEPCION = $INVENTARIOE_ADO->buscarPorDespacho2($IDOP);
  $ARRAYDRECEPCIONTOTAL = $INVENTARIOE_ADO->obtenerTotalesInventarioPorDespacho2CBX($IDOP);


  $TOTALCANTIDAD = $ARRAYDRECEPCIONTOTAL[0]["CANTIDAD"];

  $NUMERORECEPCION = $ARRAYRECEPCION[0]["NUMERO_DESPACHO"];
  $FECHARECEPCION = $ARRAYRECEPCION[0]["FECHA"];
  $NUMERODOCUMENTO = $ARRAYRECEPCION[0]["NUMERO_DOCUMENTO"];
  $TDESPACHO = $ARRAYRECEPCION[0]["TDESPACHO"];
  $PATENTECAMION = $ARRAYRECEPCION[0]["PATENTE_CAMION"];
  $PATENTECARRO = $ARRAYRECEPCION[0]["PATENTE_CARRO"];
  $OBSERVACIONES = $ARRAYRECEPCION[0]['OBSERVACIONES'];

  $ESTADO = $ARRAYRECEPCION[0]['ESTADO'];
  if ($ARRAYRECEPCION[0]['ESTADO'] == 1) {
    $ESTADO = "Abierto";
  }else if ($ARRAYRECEPCION[0]['ESTADO'] == 0) {
    $ESTADO = "Cerrado";
  }else{
    $ESTADO="Sin Datos";
  }  
  $ARRAYDESPACHOMP=$DESPACHOMP_ADO->verDespachomp($ARRAYRECEPCION[0]['ID_DESPACHOMP']);
  if($ARRAYDESPACHOMP){
      $NUMERODESPACHOMP=$ARRAYDESPACHOMP[0]["NUMERO_DESPACHO"];
  }
  if ($TDESPACHO == "1") {
    $NOMBRETDESPACHO = " A Sub Bodega";
    $ARRAYVERBODEGA = $BODEGA_ADO->verBodega($ARRAYRECEPCION[0]["ID_BODEGA"]);
    $NOMBREBODEGA = $ARRAYVERBODEGA[0]["NOMBRE_BODEGA"];
  } else  if ($TDESPACHO == "2") {
    $NOMBRETDESPACHO = "Interplanta";
    $ARRAYPLANTAINTERNA = $PLANTA_ADO->verPlanta($ARRAYRECEPCION[0]["ID_PLANTA2"]);
    $NOMBREORIGEN = $ARRAYPLANTAINTERNA[0]["NOMBRE_PLANTA"];
    $ARRAYVERBODEGA = $BODEGA_ADO->verBodega($ARRAYRECEPCION[0]["ID_BODEGA2"]);
    $NOMBREBODEGA = $ARRAYVERBODEGA[0]["NOMBRE_BODEGA"];
  } else  if ($TDESPACHO == "3") {
    $NOMBRETDESPACHO = "Devolución a Productor";
    $ARRAYPRODUCTOR = $PRODUCTOR_ADO->verProductor($ARRAYRECEPCION[0]["ID_PRODUCTOR"]);
    $NOMBREORIGEN = $ARRAYPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
  } else  if ($TDESPACHO == "4") {
    $NOMBRETDESPACHO = "Devolución a Proveedor";
    $ARRAYPROVEEDOR = $PROVEEDOR_ADO->verProveedor($ARRAYRECEPCION[0]["ID_PROVEEDOR"]);
    $NOMBREORIGEN = $ARRAYPROVEEDOR[0]["NOMBRE_PROVEEDOR"];
  }  else  if ($TDESPACHO == "5") {
    $NOMBRETDESPACHO = "Venta Industrial";
    $ARRAYVERCOMPRADOR = $COMPRADOR_ADO->verComprador($ARRAYRECEPCION[0]["ID_COMPRADOR"]);
    $NOMBREORIGEN = $ARRAYVERCOMPRADOR[0]["NOMBRE_COMPRADOR"];
  }  else  if ($TDESPACHO == "6") {
    $NOMBRETDESPACHO = "Regalo";
    $REGALO == $ARRAYRECEPCION[0]['REGALO_DESPACHO'];
  }  else  if ($TDESPACHO == "7") {
    $NOMBRETDESPACHO = "Planta Externa";
    $ARRAYPLANTAEXTERNA = $PLANTA_ADO->verPlanta($ARRAYRECEPCION[0]["ID_PLANTA3"]);
    $NOMBREORIGEN = $ARRAYPLANTAEXTERNA[0]["NOMBRE_PLANTA"];
  } else  if ($TDESPACHO == "8") {
    $NOMBRETDESPACHO = "Despacho a Productor";
    $ARRAYPRODUCTOR = $PRODUCTOR_ADO->verProductor($ARRAYRECEPCION[0]["ID_PRODUCTOR"]);
    $NOMBREORIGEN = $ARRAYPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
  }  else {
    $NOMBRETDESPACHO = "Sin Datos";
  }
  $ARRAYTDOCUMENTO = $TDOCUMENTO_ADO->verTdocumento($ARRAYRECEPCION[0]["ID_TDOCUMENTO"]);
  if ($ARRAYTDOCUMENTO) {
    $NOMBRETDOCUMENTO = $ARRAYTDOCUMENTO[0]["NOMBRE_TDOCUMENTO"];
  }
  $ARRAYTRANSPORTE = $TRANSPORTE_ADO->verTransporte($ARRAYRECEPCION[0]["ID_TRANSPORTE"]);
  if ($ARRAYTRANSPORTE) {
    $NOMBRETRANSPORTE = $ARRAYTRANSPORTE[0]["NOMBRE_TRANSPORTE"];
  }
  $ARRAYCONDUCTOR = $CONDUCTOR_ADO->verConductor($ARRAYRECEPCION[0]["ID_CONDUCTOR"]);
  if ($ARRAYCONDUCTOR) {
    $NOMBRECONDUCTOR = $ARRAYCONDUCTOR[0]["NOMBRE_CONDUCTOR"];
  }

  $ARRAYEMPRESA = $EMPRESA_ADO->verEmpresa($ARRAYRECEPCION[0]['ID_EMPRESA']);
  $ARRAYPLANTA = $PLANTA_ADO->verPlanta($ARRAYRECEPCION[0]['ID_PLANTA']);
  $ARRAYTEMPORADA = $TEMPORADA_ADO->verTemporada($ARRAYRECEPCION[0]['ID_TEMPORADA']);
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
$FECHANORMA2 = $DIA . "/" . $MES . "/" . $ANO;
$FECHANOMBRE = $NOMBREDIA . ", " . $DIA . " de " . $NOMBREMES . " del " . $ANO;


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
           <img src="../../assest/img/logo.png" width="150px" height="45px"/>
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
        INFORME DESPACHO ENVASES
        <br>
        <b> Numero Despacho: ' . $NUMERORECEPCION . '</b>
      </h2>
      <div id="details" class="clearfix">
        
        <div id="invoice">
          <div class="date"><b>Código BRC: </b>REP-DESPENV </div>  
          <div class="date"><b>Fecha Despacho: </b>' . $FECHARECEPCION . ' </div>
          <div class="date"><b>Empresa: </b>' . $EMPRESA . '</div>
          <div class="date"><b>Planta: </b>' . $PLANTA . '</div>
          <div class="date"><b>Temporada: </b>' . $TEMPORADA . '</div>
        </div>

        <div id="client">
          <div class="address"><b>Tipo Despacho: </b>' . $NOMBRETDESPACHO . '</div>
          <div class="address"><b>Estado Despacho : </b> ' . $ESTADO . ' </div>
          <div class="address"><b>Tipo Documento: </b>' . $NOMBRETDOCUMENTO . ' </div>
          <div class="address"><b>Numero Documento: </b>' . $NUMERODOCUMENTO . ' </div>

          
';

if ($TDESPACHO == "1") {
  $html = $html . ' 
  <div class="address"><b> Bodega Destino : </b> ' . $NOMBREBODEGA . ' </div>
  ';
}
if ($TDESPACHO == "2") {
  $html = $html . ' 
  <div class="address"><b> Planta Destino : </b> ' . $NOMBREORIGEN . ' </div>
  <div class="address"><b> Bodega Destino : </b> ' . $NOMBREBODEGA . ' </div>
  ';
}
if ($TDESPACHO == "3") {
  $html = $html . ' 
  <div class="address"><b> Productor Destino : </b> ' . $NOMBREORIGEN . ' </div>
  ';
}
if ($TDESPACHO == "4") {
  $html = $html . ' 
  <div class="address"><b> Proveedor Destino : </b> ' . $NOMBREORIGEN . ' </div>
  ';
}
if ($TDESPACHO == "5") {
  $html = $html . ' 
  <div class="address"><b> Comprador Destino : </b> ' . $NOMBREORIGEN . ' </div>
  ';
}
if ($TDESPACHO == "6") {
  $html = $html . ' 
  <div class="address"><b> Regalo  : </b> ' . $NOMBREORIGEN . ' </div>
  ';
}
if ($TDESPACHO == "7") {
  $html = $html . ' 
  <div class="address"><b> Planta Destino : </b> ' . $NOMBREORIGEN . ' </div>
  ';
}

if ($TDESPACHO == "8") {
  $html = $html . ' 
  <div class="address"><b> Productor Destino : </b> ' . $NOMBREORIGEN . ' </div>
  ';
}



$html = $html . '

        </div>
        
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th colspan="5" class="center">DETALLE DE DESPACHO.</th>
          </tr>
          <tr>
            <th class="color left">Bodega Origen</th>
            <th class="color left">Codigo Producto</th>
            <th class="color left">Producto</th>
            <th class="color left">Unidad Medida</th>
            <th class="color left">Cantidad</th>
          </tr>
        </thead>
         <tbody>
        ';
foreach ($ARRAYDRECEPCION as $d) :

  $ARRAYVERBODEGAD = $BODEGA_ADO->verBodega($d["ID_BODEGA"]);
  if ($ARRAYVERBODEGAD) {
    $NOMBREBODEGAD = $ARRAYVERBODEGAD[0]["NOMBRE_BODEGA"];
  }

  $ARRAYVERPRODUCTO = $PRODUCTO_ADO->verProducto($d['ID_PRODUCTO']);
  if ($ARRAYVERPRODUCTO) {
    $CODIGOPRODUCTO = $ARRAYVERPRODUCTO[0]["CODIGO_PRODUCTO"];
    $NOMBREPRODUCTO = $ARRAYVERPRODUCTO[0]["NOMBRE_PRODUCTO"];
  }
  $ARRAYVERTUMEDIDA = $TUMEDIDA_ADO->verTumedida($d['ID_TUMEDIDA']);
  if ($ARRAYVERTUMEDIDA) {
    $NOMBRETUMEDIDA = $ARRAYVERTUMEDIDA[0]["NOMBRE_TUMEDIDA"];
  }
  $html = $html . '
          
                      <tr >
                          <td class="left">' . $NOMBREBODEGAD . '</td>
                          <td class="left">' . $CODIGOPRODUCTO . '</td>
                          <td class="left">' . $NOMBREPRODUCTO . '</td>
                          <td class="left">' . $NOMBRETUMEDIDA . '</td>
                          <td class="left">' . $d['CANTIDAD'] . '</td>
                      </tr>
              ';

endforeach;

$html = $html . '
              
                  <tr class="bt">
                      <th class="color left">&nbsp;</th>
                      <th class="color left">&nbsp;</th>
                      <th class="color left">&nbsp;</th>
                      <th class="color right">SUB TOTAL</th>
                      <th class="color left"> ' . $TOTALCANTIDAD . '</th>
                  </tr>
              ';





$html = $html . '
        </tbody>
      </table>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="address"><b>Información de Transporte</b></div>
          <div class="address">Empresa Transporte:  ' . $NOMBRETRANSPORTE . ' </div>
          <div class="address">Conductor: ' . $NOMBRECONDUCTOR . '</div>
          <div class="address">Patente Camión: ' . $PATENTECAMION . '</div>
          <div class="address">Patente Carro: ' . $PATENTECARRO . '</div>
        </div>
        
        <div id="client">
        ';
        if($ARRAYDESPACHOMP){
        $html=$html.'
                 <div class="address"><b>Esta Registro viene desde una Despacho de Materia prima</b>: Numero Despacho: ' . $NUMERODESPACHOMP . ' </div>
        ';
        }
        $html = $html . '
          <div class="address"><b>Observaciones</b></div>
          <div class="address">  ' . $OBSERVACIONES . ' </div>
        </div>
        
         
        <div id="invoice">
          <div class="date "><b><hr></b></div>
          <div class="date  center">  Firma Responsable</div>
          <div class="date  center">  ' . $NOMBRERESPONSABLE . '</div>
        </div>
      </div>
    </main>
  </body>
</html>

';






//CREACION NOMBRE DEL ARCHIVO
$NOMBREARCHIVO = "InformeDespachoMateriales_";
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
$TIPOINFORME = "Informe Despacho Materiales";
$CREADOR = "Usuario";
$AUTOR = "Usuario";
$ASUNTO = "Informe";

//API DE GENERACION DE PDF
require_once '../../api/mpdf/mpdf/autoload.php';
//$PDF = new \Mpdf\Mpdf();W
$PDF = new \Mpdf\Mpdf(['format' => 'letter']);

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
$stylesheet = file_get_contents('../../assest/css/stylePdf.css'); // carga archivo css
$stylesheet2 = file_get_contents('../../assest/css/reset.css'); // carga archivo css

//ENLASAR CSS CON LA VISTA DEL PDF
$PDF->WriteHTML($stylesheet, 1);
$PDF->WriteHTML($stylesheet2, 1);

//GENERAR PDF
$PDF->WriteHTML($html);
//METODO DE SALIDA
$PDF->Output($NOMBREARCHIVOFINAL, \Mpdf\Output\Destination::INLINE);
