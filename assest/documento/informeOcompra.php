<?php

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES 
include_once '../../assest/controlador/USUARIO_ADO.php';
include_once '../../assest/controlador/EMPRESA_ADO.php';
include_once '../../assest/controlador/PLANTA_ADO.php';
include_once '../../assest/controlador/TEMPORADA_ADO.php';


include_once '../../assest/controlador/RESPONSABLE_ADO.php';
include_once '../../assest/controlador/PROVEEDOR_ADO.php';
include_once '../../assest/controlador/FPAGO_ADO.php';
include_once '../../assest/controlador/TMONEDA_ADO.php';
include_once '../../assest/controlador/PRODUCTO_ADO.php';
include_once '../../assest/controlador/TUMEDIDA_ADO.php';
include_once '../../assest/controlador/CIUDAD_ADO.php';
include_once '../../assest/controlador/COMUNA_ADO.php';

include_once '../../assest/controlador/OCOMPRA_ADO.php';
include_once '../../assest/controlador/DOCOMPRA_ADO.php';




//INCIALIZAR LAS VARIBLES

//INICIALIZAR CONTROLADOR
$USUARIO_ADO = new USUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();

$RESPONSABLE_ADO =  new RESPONSABLE_ADO();
$PROVEEDOR_ADO =  new PROVEEDOR_ADO();
$FPAGO_ADO =  new FPAGO_ADO();
$TMONEDA_ADO =  new TMONEDA_ADO();
$PRODUCTO_ADO =  new PRODUCTO_ADO();
$TUMEDIDA_ADO =  new TUMEDIDA_ADO();
$COMUNA_ADO =  new COMUNA_ADO();
$CIUDAD_ADO =  new CIUDAD_ADO();

$OCOMPRA_ADO =  new OCOMPRA_ADO();
$DOCOMPRA_ADO =  new DOCOMPRA_ADO();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$NUMEROOCOMPRA = "";
$NUMEROIOCOMPRA = "";
$FECHAOCOMPRA = "";
$NOMBREFPAGO = "";
$NOMBRETMONEDA = "";
$TOTALCANTIDAD = "";
$TOTALVALOR = "";
$NOMBRERESPONSABLE = "";


//INICIALIZAR ARREGLOS
$ARRAYOCOMPRA = "";
$ARRAYDOCOMPRA = "";
$ARRAYDOCOMPRATOTAL = "";
$ARRAYPROVEEDOR = "";
$ARRAYFPAGO = "";
$ARRAYTMONEDA = "";
$ARRAYRESPONSABLE = "";
$ARRAYPROVEEDOR = "";
$ARRAYCIUDAD = "";
$ARRAYCOMUNA = "";
$NOMBRECOMUNA = "";

if (isset($_REQUEST['usuario'])) {
  $USUARIO = $_REQUEST['usuario'];
  $ARRAYUSUARIO = $USUARIO_ADO->ObtenerNombreCompleto($USUARIO);
  $NOMBRE = $ARRAYUSUARIO[0]["NOMBRE_COMPLETO"];
}


if (isset($_REQUEST['parametro'])) {
  $IDOP = $_REQUEST['parametro'];
}


$ARRAYOCOMPRA = $OCOMPRA_ADO->verOcompra2($IDOP);
if ($ARRAYOCOMPRA) {
  $ARRAYDOCOMPRA = $DOCOMPRA_ADO->listarDocompraPorOcompra2CBX($IDOP);
  $ARRAYDOCOMPRATOTAL = $DOCOMPRA_ADO->obtenerTotalesDocompraPorOcompra2CBX($IDOP);

  $TOTALCANTIDAD = $ARRAYDOCOMPRATOTAL[0]["CANTIDAD"];
  $TOTALVALOR = $ARRAYDOCOMPRATOTAL[0]["VALOR_TOTAL"];

  $NUMEROOCOMPRA = $ARRAYOCOMPRA[0]["NUMERO_OCOMPRA"];
  $NUMEROICOMPRA = $ARRAYOCOMPRA[0]["NUMEROI_OCOMPRA"];
  $FECHAOCOMPRA = $ARRAYOCOMPRA[0]["FECHA"];
  $TIPOCAMBIO = $ARRAYOCOMPRA[0]["TCAMBIO_OCOMPRA"];

  $OBSERVACIONES = $ARRAYOCOMPRA[0]['OBSERVACIONES_OCOMPRA'];
  $ESTADO = $ARRAYOCOMPRA[0]['ESTADO'];
  if ($ARRAYOCOMPRA[0]['ESTADO'] == 1) {
    $ESTADO = "Abierto";
  }else if ($ARRAYOCOMPRA[0]['ESTADO'] == 0) {
    $ESTADO = "Cerrado";
  }else{
    $ESTADO="Sin Datos";
  }  



  $ARRAYTMONEDA = $TMONEDA_ADO->verTmoneda($ARRAYOCOMPRA[0]["ID_TMONEDA"]);
  if ($ARRAYTMONEDA) {
    $NOMBRETMONEDA = $ARRAYTMONEDA[0]["NOMBRE_TMONEDA"];
  }
  $ARRAYFPAGO = $FPAGO_ADO->verFpago($ARRAYOCOMPRA[0]["ID_FPAGO"]);
  if ($ARRAYFPAGO) {
    $NOMBREFPAGO = $ARRAYFPAGO[0]["NOMBRE_FPAGO"];
  }
  $ARRAYRESPONSABLE = $RESPONSABLE_ADO->verResponsable($ARRAYOCOMPRA[0]["ID_RESPONSABLE"]);
  if ($ARRAYRESPONSABLE) {
    $NOMBRERESPONSABLE = $ARRAYRESPONSABLE[0]["NOMBRE_RESPONSABLE"];
  }
  $ARRAYPROVEEDOR = $PROVEEDOR_ADO->verProveedor($ARRAYOCOMPRA[0]["ID_PROVEEDOR"]);
  if ($ARRAYPROVEEDOR) {

    $NOMBREPROVEEDOR = $ARRAYPROVEEDOR[0]["NOMBRE_PROVEEDOR"];
    $RUTPROVEEDOR = $ARRAYPROVEEDOR[0]["RUT_PROVEEDOR"] . "-" . $ARRAYPROVEEDOR[0]["DV_PROVEEDOR"];
    $RAZONPROVEEDOR = $ARRAYPROVEEDOR[0]["RAZON_PROVEEDOR"];
    $GIROPROVEEDOR = $ARRAYPROVEEDOR[0]["GIRO_PROVEEDOR"];
    $DIRECCIONPROVEEDOR = $ARRAYPROVEEDOR[0]["DIRECCION_PROVEEDOR"];
    $EMAILPROVEEDOR = $ARRAYPROVEEDOR[0]["EMAIL_PROVEEDOR"];
    $TELEFONOPROVEEDOR = $ARRAYPROVEEDOR[0]["TELEFONO_PROVEEDOR"];
    
      $ARRAYCOMUNA = $COMUNA_ADO->verComuna($ARRAYPROVEEDOR[0]["ID_COMUNA"]);
      if ($ARRAYCOMUNA) {
        $NOMBRECOMUNA = $ARRAYCOMUNA[0]["NOMBRE_COMUNA"];
      }
   
  }

  $ARRAYEMPRESA = $EMPRESA_ADO->verEmpresa($ARRAYOCOMPRA[0]['ID_EMPRESA']);
  $ARRAYPLANTA = $PLANTA_ADO->verPlanta($ARRAYOCOMPRA[0]['ID_PLANTA']);
  $ARRAYTEMPORADA = $TEMPORADA_ADO->verTemporada($ARRAYOCOMPRA[0]['ID_TEMPORADA']);
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


$html = '
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Informe Orden Compra</title>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
           <img src="../../assest/img/logo.png" width="150px" height="45px"/>
      </div>
      <div id="company">
        <h2 class="name">Exportadora Volcán Foods Ltda.</h2>
        <h2 class="name">77.223.122-9.</h2>
        <div>Fundo El Álamo, Los Ángeles.</div>
        <div>Los Ángeles, Chile.</div>
    
      </div>
    </header>
    <main>
      <h2 class="titulo" style="text-align: center; color: black;">
        INFORME ORDEN COMPRA
        <br>
      </h2>
      <div id="details" class="clearfix">        
        <div id="invoice">
          <div class="date"><b>Código BRC: </b>REP-OC</div>  
          <div class="date"><b>Fecha OC: </b>' . $FECHAOCOMPRA . ' </div>
          <div class="date"><b>Empresa: </b>' . $EMPRESA . '</div>
          <div class="date"><b>Temporada: </b>' . $TEMPORADA . '</div>
        </div>
        <div id="client">
          <div class="address"><b>Numero  OC: </b>' . $NUMEROOCOMPRA . '</div>
          <div class="address"><b>Numero Interno OC: </b>' . $NUMEROICOMPRA . '</div>
          <div class="address"><b>Formato Pago: </b>' . $NOMBREFPAGO . ' </div>
          <div class="address"><b>Tipo Moneda: </b>' . $NOMBRETMONEDA . ' </div>
          <div class="address"><b>Tipo Cambio : </b>' . $TIPOCAMBIO . ' </div>
          <div class="address"><b>Estado OC : </b> ' . $ESTADO . ' </div>

          
';




$html = $html . '

        </div>
        
      </div>

      <table border="0" cellspacing="0" cellpadding="0" >
        <tr>
          <th colspan="4" class="center">DATOS DE PROVEEDOR.</th>
        </tr>
        <tr>        
            <th class="color2 left">Razon Social </th>
            <td class="color2 left"> ' . $RAZONPROVEEDOR . ' </td>
            <th class="color2 left">Nombre </th>
            <td class="color2 left">' . $NOMBREPROVEEDOR . ' </td>
        </tr>
        <tr>        
            <th class="color2 left">Giro </th>
            <td class="color2 left">' . $GIROPROVEEDOR . ' </td>
            <th class="color2 left">Rut  </th>
            <td class="color2 left">' . $RUTPROVEEDOR . ' </td>  
        </tr>      
        <tr>      
            <th class="color2 left">Dirección </th>
            <td class="color2 left">' . $DIRECCIONPROVEEDOR . ' </td>
            <th class="color2 left">Comuna </th>
            <td class="color2 left">' . $NOMBRECOMUNA . ' </td>
        </tr>         
        <tr>      
            <th class="color2 left">Telefono </th>
            <td class="color2 left">' . $TELEFONOPROVEEDOR . ' </td>
            <th class="color2 left">Email </th>
            <td class="color2 left">' . $EMAILPROVEEDOR . ' </td>
        </tr> 
        <tr> 
           <th colspan="4" class="center">DATOS DE PROVEEDOR.</th>
        </tr>
      </table>



      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th colspan="5" class="center">DETALLE DE OC.</th>
          </tr>
          <tr>
            <th class="color left">Producto</th>
            <th class="color left">Unidad Medida</th>
            <th class="color center">Cantidad</th>
            <th class="color center">Valor Unitario</th>
            <th class="color center">Valor Neto</th>
          </tr>
        </thead>
         <tbody>
        ';
foreach ($ARRAYDOCOMPRA as $d) :
  $ARRAYVERPRODUCTO = $PRODUCTO_ADO->verProducto($d['ID_PRODUCTO']);
  if ($ARRAYVERPRODUCTO) {
    $NOMBREPRODUCTO = $ARRAYVERPRODUCTO[0]["NOMBRE_PRODUCTO"];
  }
  $ARRAYVERTUMEDIDA = $TUMEDIDA_ADO->verTumedida($d['ID_TUMEDIDA']);
  if ($ARRAYVERTUMEDIDA) {
    $NOMBRETUMEDIDA = $ARRAYVERTUMEDIDA[0]["NOMBRE_TUMEDIDA"];
  }
  $html = $html . '
          
                      <tr >
                          <th class="left">' . $NOMBREPRODUCTO . '</th>
                          <td class="left">' . $NOMBRETUMEDIDA . '</td>
                          <td class="left">' . $d['CANTIDAD'] . '</td>
                          <td class="left">$ ' . $d['VALOR'] . '</td>
                          <td class="left">$ ' . $d['TOTAL'] . '</td>
                      </tr>
              ';

endforeach;

$html = $html . '
              
                  <tr class="bt">
                      <th class="color left">&nbsp;</th>
                      <th class="color right">SUB TOTAL</th>
                      <th class="color left"> ' . $TOTALCANTIDAD . '</th>
                      <th class="color left">&nbsp;</th>
                      <th class="color left"> ' . $TOTALVALOR . '</th>
                  </tr>
              ';





$html = $html . '
        </tbody>
      </table>

      
      <div id="details" class="clearfix">
        <div id="client">
          <div class="address"><b>Nombre Responsable: </b></div>
          <div class="address"> ' . $NOMBRERESPONSABLE . ' </div>
        </div>        
        <div id="client">
            <div class="address"><b>Observaciones</b></div>
            <div class="address">  ' . $OBSERVACIONES . ' </div>
        </div> 
      </div>
      <div id="details" class="clearfix">
     
      <div id="invoice">
        <div class="date pp10"><b><hr></b></div>
        <div class="date  center">  Firma Responsable</div>
        <div class="date  center">  </div>
      </div>  
        <div id="invoice">
          <div class="date pp10"><b><hr></b></div>
          <div class="date  center">  Firma Responsable</div>
          <div class="date  center">  </div>
        </div>           
        <div id="invoice">
          <div class="date pp10"><b><hr></b></div>
          <div class="date  center">  Firma Responsable</div>
          <div class="date  center">  ' . $NOMBRERESPONSABLE . '</div>
        </div>
      </div>

    </main>
  </body>
</html>

';






//CREACION NOMBRE DEL ARCHIVO
$NOMBREARCHIVO = "InformeOredenCompra_";
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
$TIPOINFORME = "Informe Orden Compra";
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
