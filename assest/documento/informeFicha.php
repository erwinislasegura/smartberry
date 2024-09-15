<?php

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES 
include_once '../../assest/controlador/USUARIO_ADO.php';
include_once '../../assest/controlador/EMPRESA_ADO.php';
include_once '../../assest/controlador/PLANTA_ADO.php';
include_once '../../assest/controlador/TEMPORADA_ADO.php';

include_once '../../assest/controlador/EEXPORTACION_ADO.php';
include_once '../../assest/controlador/ECOMERCIAL_ADO.php';
include_once '../../assest/controlador/ESPECIES_ADO.php';
include_once '../../assest/controlador/MERCADO_ADO.php';
include_once '../../assest/controlador/TETIQUETA_ADO.php';
include_once '../../assest/controlador/TEMBALAJE_ADO.php';

include_once '../../assest/controlador/PRODUCTO_ADO.php';
include_once '../../assest/controlador/FAMILIA_ADO.php';
include_once '../../assest/controlador/SUBFAMILIA_ADO.php';
include_once '../../assest/controlador/TUMEDIDA_ADO.php';



include_once '../../assest/controlador/FICHA_ADO.php';
include_once '../../assest/controlador/DFICHA_ADO.php';




//INCIALIZAR LAS VARIBLES

//INICIALIZAR CONTROLADOR
$USUARIO_ADO = new USUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();

$EEXPORTACION_ADO =  new EEXPORTACION_ADO();
$ECOMERCIAL_ADO =  new ECOMERCIAL_ADO();
$ESPECIES_ADO =  new ESPECIES_ADO();
$MERCADO_ADO =  new MERCADO_ADO();
$TETIQUETA_ADO =  new TETIQUETA_ADO();
$TEMBALAJE_ADO =  new TEMBALAJE_ADO();
$TUMEDIDA_ADO =  new TUMEDIDA_ADO();


$PRODUCTO_ADO =  new PRODUCTO_ADO();
$FAMILIA_ADO =  new FAMILIA_ADO();
$SUBFAMILIA_ADO =  new SUBFAMILIA_ADO();
$SUBFAMILIA_ADO =  new SUBFAMILIA_ADO();


$FICHA_ADO =  new FICHA_ADO();
$DFICHA_ADO =  new DFICHA_ADO();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$NUMERO = "";
$CODIGOESTANDAR = "";
$NOMBREESTADAR = "";
$FECHAINGRESO = "";
$FECHAMODIFCIACION = "";
$ESTANDAR = "";
$ENVASEESTANDAR = "";
$PESOENVASEESTANDAR = "";
$TETIQUETA = "";
$TEMBALAJE = "";
$MERCADO = "";
$ESPECIES = "";
$ESTANDARCOMERCIAL = "";
$OBSERVACION = "";
$NOMBRE = "";

$NOMBRETETIQUETA = "";
$NOMBRETEMBALAJE = "";
$NOMBREESTANDARCOMERCIAL = "";
$NOMBREMERCADO = "";
$NOMBREESPECIES = "";


//INICIALIZAR ARREGLOS
$ARRAYESTANDAR = "";
$ARRAYTETIQUETA = "";
$ARRAYTEMBALAJE = "";
$ARRAYMERCADO = "";
$ARRAYESTANDARCOMERCIAL = "";


$ARRAYFICHA = "";
$ARRAYDFICHA = "";
$ARRAYPROVEEDOR = "";


if (isset($_REQUEST['usuario'])) {
  $USUARIO = $_REQUEST['usuario'];
  $ARRAYUSUARIO = $USUARIO_ADO->ObtenerNombreCompleto($USUARIO);
  $NOMBRE = $ARRAYUSUARIO[0]["NOMBRE_COMPLETO"];
}


if (isset($_REQUEST['parametro'])) {
  $IDOP = $_REQUEST['parametro'];
}


$ARRAYFICHA = $FICHA_ADO->verFicha2($IDOP);
if ($ARRAYFICHA) {
  $ARRAYDFICHA = $DFICHA_ADO->listarDfichaPorFich2CBX($IDOP);

  $OBSERVACIONES = $ARRAYFICHA[0]['OBSERVACIONES_FICHA'];
  $NUMEROFICHA = $ARRAYFICHA[0]['NUMERO_FICHA'];
  $ESTADO = $ARRAYFICHA[0]['ESTADO'];
  if ($ARRAYFICHA[0]['ESTADO'] == 1) {
    $ESTADO = "Abierto";
  }else if ($ARRAYFICHA[0]['ESTADO'] == 0) {
    $ESTADO = "Cerrado";
  }else{
    $ESTADO="Sin Datos";
  }  
  

  $ARRAYESTANDAR = $EEXPORTACION_ADO->verEstandar($ARRAYFICHA[0]["ID_ESTANDAR"]);
  if ($ARRAYESTANDAR) {

    $CODIGOESTANDAR = $ARRAYESTANDAR[0]["CODIGO_ESTANDAR"];
    $NOMBREESTADAR = $ARRAYESTANDAR[0]["NOMBRE_ESTANDAR"];
    

    $ENVASEESTANDAR = $ARRAYESTANDAR[0]["CANTIDAD_ENVASE_ESTANDAR"];
    $PESOENVASEESTANDAR = $ARRAYESTANDAR[0]["PESO_ENVASE_ESTANDAR"];
    $TETIQUETA = $ARRAYESTANDAR[0]["ID_TETIQUETA"];
    $TEMBALAJE = $ARRAYESTANDAR[0]["ID_TEMBALAJE"];
    $MERCADO = $ARRAYESTANDAR[0]["ID_MERCADO"];
    $ESPECIES = $ARRAYESTANDAR[0]["ID_ESPECIES"];
    $ESTANDARCOMERCIAL = $ARRAYESTANDAR[0]["ID_ECOMERCIAL"];
    $ARRAYTETIQUETA = $TETIQUETA_ADO->verEtiqueta($TETIQUETA);
    $ARRAYTEMBALAJE = $TEMBALAJE_ADO->verEmbalaje($TEMBALAJE);
    $ARRAYMERCADO = $MERCADO_ADO->verMercado($MERCADO);
    $ARRAYESPECIES = $ESPECIES_ADO->verEspecies($ESPECIES);
    $ARRAYESTANDARCOMERCIAL = $ECOMERCIAL_ADO->verEcomercial($ESTANDARCOMERCIAL);
    if ($ARRAYTETIQUETA) {
      $NOMBRETETIQUETA = $ARRAYTETIQUETA[0]["NOMBRE_TETIQUETA"];
    }
    if ($ARRAYTEMBALAJE) {
      $NOMBRETEMBALAJE = $ARRAYTEMBALAJE[0]["NOMBRE_TEMBALAJE"];
    }
    if ($ARRAYMERCADO) {
      $NOMBREMERCADO = $ARRAYMERCADO[0]["NOMBRE_MERCADO"];
    }
    if ($ARRAYESPECIES) {
      $NOMBREESPECIES = $ARRAYESPECIES[0]["NOMBRE_ESPECIES"];
    }
    if ($ARRAYESTANDARCOMERCIAL) {
      $NOMBREESTANDARCOMERCIAL =  $ARRAYESTANDARCOMERCIAL[0]["CODIGO_ECOMERCIAL"] . ":" . $ARRAYESTANDARCOMERCIAL[0]["NOMBRE_ECOMERCIAL"];
    }
  }


  $ARRAYEMPRESA = $EMPRESA_ADO->verEmpresa($ARRAYFICHA[0]['ID_EMPRESA']);
  $ARRAYTEMPORADA = $TEMPORADA_ADO->verTemporada($ARRAYFICHA[0]['ID_TEMPORADA']);
  $TEMPORADA = $ARRAYTEMPORADA[0]['NOMBRE_TEMPORADA'];

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
    <title> Informe Ficha Consumo</title>
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
        FICHA CONSUMO<br>
        <b> Número Ficha: ' . $NUMEROFICHA . '</b>
      </h2>
   
          
      <div id="details" class="clearfix">
        
      <div id="invoice">
        <div class="date"><b>Código BRC: </b>REP-CONSMM </div>  
        <div class="date"><b>Empresa: </b>' . $EMPRESA . '  </div>
        <div class="date"><b>Temporada: </b>' . $TEMPORADA . '  </div>
      </div>

      <div id="client">
        <div class="address"><b>Estado Ficha Consumo: </b> ' . $ESTADO . ' </div>
      </div>        
    </div>
';




$html = $html . '


      <table border="0" cellspacing="0" cellpadding="0" >      
        <tr>        
            <th class="color left">Codigo  </th>
            <td class=" left"> ' . $CODIGOESTANDAR . ' </td>
            <th class=" left"> </th> 
        </tr>
        <tr>        
            <th class="color left">Nombre </th>
            <td class=" left">' . $NOMBREESTADAR . ' </td>
            <th class=" left"> </th> 
        </tr>     
        <tr>     
            <th class="color2 left"> </th> 
            <th class=" left">Especies </th>
            <td class=" left">' . $NOMBREESPECIES . ' </td>
        </tr>   
        <tr>     
            <th class="color2 left"> </th> 
            <th class=" left">Etiqueta </th>
            <td class=" left">' . $NOMBRETETIQUETA . ' </td>
        </tr>   
        <tr>     
            <th class="color2 left"> </th> 
            <th class=" left">Embalaje </th>
            <td class=" left">' . $NOMBRETEMBALAJE . ' </td>
        </tr>    
        <tr>     
            <th class="color2 left"> </th> 
            <th class=" left">Cantidad Envase </th>
            <td class=" left">' . $ENVASEESTANDAR . ' </td>
        </tr>     
      </table> 
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="color left">Codigo</th>
            <th class="color left">Producto</th>
            <th class="color left">Familia </th>
            <th class="color left">Sub Familia</th>
            <th class="color left">Unidad Medida</th>
            <th class="color left">Factor Consumo</th>
            <th class="color left">Consumo Por Pallet</th>
            <th class="color left">Pallet Por Carga </th>
            <th class="color left">Consumo Por Contenedor</th>
          </tr>
        </thead>
         <tbody>
        ';
foreach ($ARRAYDFICHA as $d) :


  $ARRAYPRODUCTO = $PRODUCTO_ADO->verProducto($d['ID_PRODUCTO']);
  if ($ARRAYPRODUCTO) {
    $CODIGOPRODUCTO = $ARRAYPRODUCTO[0]["CODIGO_PRODUCTO"];
    $NOMBREPRODUCTO = $ARRAYPRODUCTO[0]["NOMBRE_PRODUCTO"];

    $ARRAYFAMILIA = $FAMILIA_ADO->verFamilia($ARRAYPRODUCTO[0]['ID_FAMILIA']);
    if ($ARRAYFAMILIA) {
      $FAMILIA = $ARRAYFAMILIA[0]["NOMBRE_FAMILIA"];
    } else {
      $FAMILIA = "Sin Dato";
    }


    $ARRAYSUBFAMILIA = $SUBFAMILIA_ADO->verSubfamilia($ARRAYPRODUCTO[0]['ID_SUBFAMILIA']);
    if ($ARRAYSUBFAMILIA) {
      $SUBFAMILIA = $ARRAYSUBFAMILIA[0]["NOMBRE_SUBFAMILIA"];
    } else {
      $SUBFAMILIA = "Sin Dato";
    }

    $ARRAYTUMEDIDA = $TUMEDIDA_ADO->verTumedida($ARRAYPRODUCTO[0]['ID_TUMEDIDA']);
    if ($ARRAYTUMEDIDA) {
      $TUMEDIDA = $ARRAYTUMEDIDA[0]["NOMBRE_TUMEDIDA"];
    } else {
      $TUMEDIDA = "Sin Dato";
    }


  } else {
    $NOMBREPRODUCTO = "Sin Dato";
  }


  $html = $html . '
          
                      <tr >
                          <td class="left">' . $CODIGOPRODUCTO . '</th>
                          <td class="left">' . $NOMBREPRODUCTO . '</th>
                          <td class="left">' . $FAMILIA . '</td>
                          <td class="left">' . $SUBFAMILIA . '</td>
                          <td class="left">' . $TUMEDIDA . '</td>
                          <td class="left">' . $d['FACTOR'] . '</td>
                          <td class="left">' . $d['CONSUMOPALLET'] . '</td>
                          <td class="left">' . $d['PALLET'] . '</td>
                          <td class="left">' . $d['CONSUMOCONTENEDOR'] . '</td>
                      </tr>
              ';

endforeach;






$html = $html . '
        </tbody>
      </table>

      
      <div id="details" class="clearfix">
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
$NOMBREARCHIVO = "FichaConsumo_";
$FECHADOCUMENTO = $FECHANORMAL . "_" . $HORAFINAL;
$TIPODOCUMENTO = "Ficha";
$FORMATO = ".pdf";
$NOMBREARCHIVOFINAL = $NOMBREARCHIVO . $FECHADOCUMENTO . $FORMATO;

//CONFIGURACIOND DEL DOCUMENTO
$TIPOPAPEL = "LETTER";
$ORIENTACION = "P";
$LENGUAJE = "ES";
$UNICODE = "true";
$ENCODING = "UTF-8";

//DETALLE DEL CREADOR DEL INFORME
$TIPOINFORME = " Ficha Consumo";
$CREADOR = "Usuario";
$AUTOR = "Usuario";
$ASUNTO = "Ficha";

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
$stylesheet = file_get_contents('../../assest//css/stylePdf.css'); // carga archivo css
$stylesheet2 = file_get_contents('../../assest//css/reset.css'); // carga archivo css

//ENLASAR CSS CON LA VISTA DEL PDF
$PDF->WriteHTML($stylesheet, 1);
$PDF->WriteHTML($stylesheet2, 1);

//GENERAR PDF
$PDF->WriteHTML($html);
//METODO DE SALIDA
$PDF->Output($NOMBREARCHIVOFINAL, \Mpdf\Output\Destination::INLINE);
