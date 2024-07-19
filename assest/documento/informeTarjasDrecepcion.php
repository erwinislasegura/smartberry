<?php

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES 
include_once '../../assest/controlador/EMPRESA_ADO.php';
include_once '../../assest/controlador/PRODUCTO_ADO.php';
include_once '../../assest/controlador/TCONTENEDORM_ADO.php';
include_once '../../assest/controlador/TUMEDIDA_ADO.php';
include_once '../../assest/controlador/FOLIO_ADO.php';
include_once '../../assest/controlador/PROVEEDOR_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/PLANTA_ADO.php';

include_once '../../assest/controlador/RECEPCIONM_ADO.php';
include_once '../../assest/controlador/DRECEPCIONM_ADO.php';
include_once '../../assest/controlador/TARJAM_ADO.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$EMPRESA_ADO =  new EMPRESA_ADO();
$PRODUCTO_ADO =  new PRODUCTO_ADO();
$TCONTENEDOR_ADO =  new TCONTENEDORM_ADO();
$TUMEDIDA_ADO =  new TUMEDIDA_ADO();
$FOLIO_ADO =  new FOLIO_ADO();
$PROVEEDOR_ADO =  new PROVEEDOR_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$PLANTA_ADO =  new PLANTA_ADO();

$RECEPCIONM_ADO =  new RECEPCIONM_ADO();
$DRECEPCIONM_ADO =  new DRECEPCIONM_ADO();
$TARJAM_ADO =  new TARJAM_ADO();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$NUMERORECEPCION = "";
$FECHARECEPCION = "";
$NUMERODOCUMENTO = "";
$NOMBRETCONTEDOR = "";
$NOMBRETUMEDIDA = "";
$NOMBREPRODUCTO = "";
$TIPORECEPCION = "";
$NOMBRETRECEPCION = "";
$NOMBREORIGEN = "";
$NOTADETALLE = "";
$TAMAÑO = "";
$TAMAÑONOTA = "";
$TAMAÑOEMPRESA="";

//INCIALIZAR ARREGLORS
$ARRAYPROVEEDOR = "";
$ARRAYPRODUCTOR = "";
$ARRAYPLANTAEXTERNA = "";
$ARRAYVERPRODUCTO = "";
$ARRAYVERTCONTENDOR = "";
$ARRAYVERTUMEDIDA = "";
$ARRAYRECEPCION = "";
$ARRAYDRECEPCION = "";
$ARRAYTARJAM = "";
$ARRAYEMPRESA = "";


if (isset($_REQUEST['parametro'])) {
	$IDOP = $_REQUEST['parametro'];
}

$ARRAYDRECEPCION = $DRECEPCIONM_ADO->verDrecepcion($IDOP);
if ($ARRAYDRECEPCION) {
	$NOTADETALLE = $ARRAYDRECEPCION[0]["DESCRIPCION_DRECEPCION"];
	$ARRAYRECEPCION = $RECEPCIONM_ADO->verRecepcion2($ARRAYDRECEPCION[0]["ID_RECEPCION"]);
	if ($ARRAYRECEPCION) {

		$NUMERORECEPCION = $ARRAYRECEPCION[0]["NUMERO_RECEPCION"];
		$FECHARECEPCION = $ARRAYRECEPCION[0]["FECHA"];
		$NUMERODOCUMENTO = $ARRAYRECEPCION[0]["NUMERO_DOCUMENTO_RECEPCION"];
		$TIPORECEPCION = $ARRAYRECEPCION[0]["TRECEPCION"];
		if ($TIPORECEPCION == "1") {
			$NOMBRETRECEPCION = "Desde Proveedor";
			$ARRAYPROVEEDOR = $PROVEEDOR_ADO->verProveedor($ARRAYRECEPCION[0]["ID_PROVEEDOR"]);
			$NOMBREORIGEN = $ARRAYPROVEEDOR[0]["NOMBRE_PROVEEDOR"];
		}
		if ($TIPORECEPCION == "2") {
			$NOMBRETRECEPCION = "Desde Productor";
			$ARRAYPRODUCTOR = $PRODUCTOR_ADO->verProductor($ARRAYRECEPCION[0]["ID_PRODUCTOR"]);
			$NOMBREORIGEN = $ARRAYPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
		}
		if ($TIPORECEPCION == "3") {
			$NOMBRETRECEPCION = "Desde Planta Externa";
			$ARRAYPLANTAEXTERNA = $PLANTA_ADO->verPlanta($ARRAYRECEPCION[0]["ID_PLANTA2"]);
			$NOMBREORIGEN = $ARRAYPLANTAEXTERNA[0]["NOMBRE_PLANTA2"];
		}

		$ARRAYEMPRESA = $EMPRESA_ADO->verEmpresa($ARRAYRECEPCION[0]['ID_EMPRESA']);
		$EMPRESA = $ARRAYEMPRESA[0]['NOMBRE_EMPRESA'];
		$EMPRESAURL = $ARRAYEMPRESA[0]['LOGO_EMPRESA'];

		if ($EMPRESAURL == "") {
			$EMPRESAURL = "img/empresa/no_disponible.png";
		}
	}
}

$ARRAYTARJAM = $TARJAM_ADO->listarTarjaPorDrecepcionCBX($IDOP);


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



$html = '
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tarja Recepcion Granel</title>

<style type="text/css">	
	
</style>

</head>

<body>
    

';


foreach ($ARRAYTARJAM as $s) :

	$ARRAYVERPRODUCTO = $PRODUCTO_ADO->verProducto($s['ID_PRODUCTO']);
	if ($ARRAYVERPRODUCTO) {
		$NOMBREPRODUCTO = $ARRAYVERPRODUCTO[0]["NOMBRE_PRODUCTO"];
	}
	$ARRAYVERTCONTENDOR = $TCONTENEDOR_ADO->verTcontenedor($s['ID_TCONTENEDOR']);
	if ($ARRAYVERTCONTENDOR) {
		$NOMBRETCONTEDOR = $ARRAYVERTCONTENDOR[0]["NOMBRE_TCONTENEDOR"];
	}
	$ARRAYVERTUMEDIDA = $TUMEDIDA_ADO->verTumedida($s['ID_TUMEDIDA']);
	if ($ARRAYVERTUMEDIDA) {
		$NOMBRETUMEDIDA = $ARRAYVERTUMEDIDA[0]["NOMBRE_TUMEDIDA"];
	}


	$html = $html . '
    <div class="contenido" style="height:250px!important;">
		<div class="titulo" style="text-align: center; font-size: 14; ">
             <b > 
				 <img src="../../assest/img/logo.png" width="100px" height="30px"/>
			</b>
             <br>
             <b> ' . $NOMBRETRECEPCION . ' </b>	
			 <br>
		</div>		
		<br>
		<div class="subtitulo2">
			<b style="font-size:14;"></b>
		</div>
		<br>

		<div class="info2">
			<b class="f11"> Numero Recepcion : </b>  <span class="f13">'.$NUMERORECEPCION.'</span>
		</div>
		<div class="info2">
			<b class="f11"> Numero Documento : </b>   <span class="f13">'.$NUMERODOCUMENTO.'</span>
		</div>
		<div class="info2">
			<b class="f11"> Fecha Recepcion : </b>   <span class="f13">'.$FECHARECEPCION.'</span>
		</div>
		<br>
		<div class="subtitulo2"></div>        
        <br>
  ';

	if (strlen($NOMBREORIGEN) <= "10") {
		$TAMAÑO = "f30";
	}
	if (strlen($NOMBREORIGEN) > "10" && strlen($NOMBREORIGEN) <= "19") {
		$TAMAÑO = "f25";
	}
	if (strlen($NOMBREORIGEN) > "19" && strlen($NOMBREORIGEN) <= "25") {
		$TAMAÑO = "f20";
	}
	if (strlen($NOMBREORIGEN) > "25" && strlen($NOMBREORIGEN) <= "42") {
		$TAMAÑO = "f15";
	}
	if (strlen($NOMBREORIGEN) > "42" && strlen($NOMBREORIGEN) <= "61") {
		$TAMAÑO = "f10";
	}
	if (strlen($NOMBREORIGEN) > "61" && strlen($NOMBREORIGEN) <= "70") {
		$TAMAÑO = "f9";
	}

	if (strlen($NOTADETALLE) <= "10") {
		$TAMAÑONOTA = "f30";
	}
	if (strlen($NOTADETALLE) > "10" && strlen($NOTADETALLE) <= "19") {
		$TAMAÑONOTA = "f25";
	}
	if (strlen($NOTADETALLE) > "19" && strlen($NOTADETALLE) <= "25") {
		$TAMAÑONOTA = "f20";
	}
	if (strlen($NOTADETALLE) > "25" && strlen($NOTADETALLE) <= "42") {
		$TAMAÑONOTA = "f15";
	}
	if (strlen($NOTADETALLE) > "42" && strlen($NOTADETALLE) <= "61") {
		$TAMAÑONOTA = "f10";
	}
	if (strlen($NOTADETALLE) > "61" && strlen($NOTADETALLE) <= "70") {
		$TAMAÑONOTA = "f9";
	}

	if (strlen($NOMBREPRODUCTO) <= "10") {
		$TAMAÑOPRODUCTO = "f30";
	}
	if (strlen($NOMBREPRODUCTO) > "10" && strlen($NOMBREPRODUCTO) <= "19") {
		$TAMAÑOPRODUCTO = "f25";
	}
	if (strlen($NOMBREPRODUCTO) > "19" && strlen($NOMBREPRODUCTO) <= "25") {
		$TAMAÑOPRODUCTO = "f20";
	}
	if (strlen($NOMBREPRODUCTO) > "25" && strlen($NOMBREPRODUCTO) <= "42") {
		$TAMAÑOPRODUCTO = "f15";
	}
	if (strlen($NOMBREPRODUCTO) > "42" && strlen($NOMBREPRODUCTO) <= "61") {
		$TAMAÑOPRODUCTO = "f10";
	}
	if (strlen($NOMBREPRODUCTO) > "61" && strlen($NOMBREPRODUCTO) <= "70") {
		$TAMAÑOPRODUCTO = "f9";
	}
	
	if (strlen($EMPRESA) <= "10") {
		$TAMAÑOEMPRESA = "f30";
	}
	if (strlen($EMPRESA) > "10" && strlen($EMPRESA) <= "19") {
		$TAMAÑOEMPRESA = "f25";
	}
	if (strlen($EMPRESA) > "19" && strlen($EMPRESA) <= "25") {
		$TAMAÑOEMPRESA = "f20";
	}
	if (strlen($EMPRESA) > "25" && strlen($EMPRESA) <= "42") {
		$TAMAÑOEMPRESA = "f15";
	}
	if (strlen($EMPRESA) > "42" && strlen($EMPRESA) <= "61") {
		$TAMAÑOEMPRESA = "f10";
	}
	if (strlen($EMPRESA) > "61" && strlen($EMPRESA) <= "70") {
		$TAMAÑOEMPRESA = "f9";
	}
	$html = $html . '
		<div class="' . $TAMAÑO . ' center " width="100%">
			<b > ' . $NOMBREORIGEN . '  </b> 
		</div>       
		<br>
		<div class="subtitulo2"></div>	
		<div class="info justify">
			<b> Nota Trazabilidad : </b>  
		</div>
		<br>
		<div class="' . $TAMAÑONOTA . ' info justify">
			' . $NOTADETALLE . '
		</div>
		<br>
		<div class="subtitulo2"></div>	
        <div class=" center">
           Cantidad 
        </div>
        <div class="f30 center">
            <b> ' . $s['CANTIDAD_TARJA'] . ' </b> 
        </div>
        <br>
        <div class=" center">
             N° Folio   
        </div>        
        <div class="f40 center">
            <b> ' . $s['FOLIO_TARJA'] . ' </b> 
        </div>
        <br>
        <div class=" center">
             Producto 
        </div>        
        <div class="' . $TAMAÑOPRODUCTO . ' center">
            <b> ' . $NOMBREPRODUCTO . ' </b> 
        </div>
		<div class="subtitulo2"></div>      
        <div class=" ' . $TAMAÑO . ' center">
           <b > ' . $EMPRESA . '  </b>
        </div>     
      </div>  
	  <div class="salto" style=" page-break-after: always; border: none;   margin: 0;   padding: 0;"></div>  
    ';


endforeach;

$html = $html . '
	
</body>
</html>


';


$html = $html . '
';



//CREACION NOMBRE DEL ARCHIVO
$NOMBREARCHIVO = "TarjaRecepionGranel_";
$FECHADOCUMENTO = $FECHANORMAL . "_" . $HORAFINAL;
$TIPODOCUMENTO = "INFORME";
$FORMATO = ".pdf";
$NOMBREARCHIVOFINAL = $NOMBREARCHIVO . $FECHADOCUMENTO . $FORMATO;

//CONFIGURACIOND DEL DOCUMENTO
$TIPOPAPEL = "";
$ORIENTACION = "";

//DETALLE DEL CREADOR DEL INFORME
$TIPOINFORME = "TARJA RECEPCION GRANEL";
$CREADOR = "USUARIO";
$AUTOR = "USUARIO";
$ASUNTO = "TARJA ";


//API DE GENERACION DE PDF
require_once '../../api/mpdf/mpdf/autoload.php';
require_once '../../api/mpdf/qrcode/autoload.php';

$PDF = new \Mpdf\Mpdf(['format' => [100, 200]]);
//$PDF = new \Mpdf\Mpdf();
//$PDF = new \Mpdf\Mpdf(['format'=> 'Letter']);

//$mpdf=new mPDF('utf-8','A4');
//$mpdf=new mPDF('utf-8','A4');
//$mpdf=new mPDF('utf-8','A4-L');
//$mpdf=new mPDF('utf-8','A3');
//$mpdf=new mPDF('utf-8','Letter');
//$mpdf=new mPDF('utf-8','150mm 150mm');
//$mpdf=new mPDF('utf-8','11.69in 8.27in');
/*
$PDF->SetHTMLHeader('
    <table width="100%" >
        <tbody>
            <tr>
            </tr>
        </tbody>
    </table>
    <br>
    
');

$PDF->SetHTMLFooter('


    <table width="100%" >
        <tbody>
            <tr>
            </tr>
        </tbody>
    </table>
    
');
*/
$PDF->SetTitle($TIPOINFORME); //titulo pdf
$PDF->SetCreator($CREADOR); //CREADOR PDF
$PDF->SetAuthor($AUTOR); //AUTOR PDF
$PDF->SetSubject($ASUNTO); //ASUNTO PDF

//CONFIGURACION

//$PDF->simpleTables = true; 
//$PDF->packTableData = true;


$stylesheet1 = file_get_contents('../../assest/css/styleTarja.css'); // carga archivo css
$stylesheet2 = file_get_contents('../../assest/css/reset.css'); // carga archivo css
$PDF->WriteHTML($stylesheet1, 1);
$PDF->WriteHTML($stylesheet2, 1);
$PDF->WriteHTML($html);
//$PDF->Output();
$PDF->Output($NOMBREARCHIVOFINAL, \Mpdf\Output\Destination::INLINE);
