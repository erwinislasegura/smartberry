
<?php
//BASE
include_once '../../assest/controlador/TUSUARIO_ADO.php';
include_once '../../assest/controlador/USUARIO_ADO.php';
include_once '../../assest/controlador/EMPRESA_ADO.php';
include_once '../../assest/controlador/PLANTA_ADO.php';
include_once '../../assest/controlador/TEMPORADA_ADO.php';

// OPERACION
include_once '../../assest/controlador/MERCADO_ADO.php';
include_once '../../assest/controlador/TSERVICIO_ADO.php';

include_once '../../assest/controlador/EXPORTADORA_ADO.php';
include_once '../../assest/controlador/CONSIGNATARIO_ADO.php';
include_once '../../assest/controlador/NOTIFICADOR_ADO.php';
include_once '../../assest/controlador/BROKER_ADO.php';
include_once '../../assest/controlador/RFINAL_ADO.php';

include_once '../../assest/controlador/AGCARGA_ADO.php';
include_once '../../assest/controlador/AADUANA_ADO.php';
include_once '../../assest/controlador/DFINAL_ADO.php';


include_once '../../assest/controlador/TRANSPORTE_ADO.php';
include_once '../../assest/controlador/LCARGA_ADO.php';
include_once '../../assest/controlador/LDESTINO_ADO.php';

include_once '../../assest/controlador/LAEREA_ADO.php';
include_once '../../assest/controlador/AERONAVE_ADO.php';
include_once '../../assest/controlador/ACARGA_ADO.php';
include_once '../../assest/controlador/ADESTINO_ADO.php';

include_once '../../assest/controlador/NAVIERA_ADO.php';
include_once '../../assest/controlador/PCARGA_ADO.php';
include_once '../../assest/controlador/PDESTINO_ADO.php';


include_once '../../assest/controlador/FPAGO_ADO.php';
include_once '../../assest/controlador/MVENTA_ADO.php';
include_once '../../assest/controlador/CVENTA_ADO.php';
include_once '../../assest/controlador/TFLETE_ADO.php';

include_once '../../assest/controlador/TCONTENEDOR_ADO.php';
include_once '../../assest/controlador/ATMOSFERA_ADO.php';
include_once '../../assest/controlador/PAIS_ADO.php';
include_once '../../assest/controlador/SEGURO_ADO.php';

include_once '../../assest/controlador/EEXPORTACION_ADO.php';
include_once '../../assest/controlador/ESPECIES_ADO.php';
include_once '../../assest/controlador/VESPECIES_ADO.php';
include_once '../../assest/controlador/TCALIBRE_ADO.php';
include_once '../../assest/controlador/TMONEDA_ADO.php';
include_once '../../assest/controlador/TMANEJO_ADO.php';


include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/DESPACHOEX_ADO.php';
include_once '../../assest/controlador/EXIEXPORTACION_ADO.php'; 
include_once '../../assest/controlador/TEMBALAJE_ADO.php';
include_once '../../assest/controlador/ECOMERCIAL_ADO.php';
include_once '../../assest/controlador/TETIQUETA_ADO.php';
include_once '../../assest/controlador/TCATEGORIA_ADO.php';
include_once '../../assest/controlador/TINPSAG_ADO.php';
include_once '../../assest/controlador/INPSAG_ADO.php';


include_once '../../assest/controlador/PAIS_ADO.php';
include_once '../../assest/controlador/REGION_ADO.php';
include_once '../../assest/controlador/PROVINCIA_ADO.php';
include_once '../../assest/controlador/COMUNA_ADO.php';

include_once '../../assest/controlador/ICARGA_ADO.php';
include_once '../../assest/controlador/DICARGA_ADO.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$USUARIO_ADO = new USUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();

$MERCADO_ADO =  new MERCADO_ADO();
$TSERVICIO_ADO =  new TSERVICIO_ADO();
$EXPORTADORA_ADO =  new EXPORTADORA_ADO();
$CONSIGNATARIO_ADO =  new CONSIGNATARIO_ADO();
$NOTIFICADOR_ADO =  new NOTIFICADOR_ADO();
$BROKER_ADO =  new BROKER_ADO();
$RFINAL_ADO =  new RFINAL_ADO();
$AGCARGA_ADO =  new AGCARGA_ADO();
$AADUANA_ADO =  new AADUANA_ADO();
$DFINAL_ADO =  new DFINAL_ADO();
$TRANSPORTE_ADO =  new TRANSPORTE_ADO();
$LCARGA_ADO =  new LCARGA_ADO();
$LDESTINO_ADO =  new LDESTINO_ADO();
$LAEREA_ADO =  new LAEREA_ADO();
$AERONAVE_ADO =  new AERONAVE_ADO();
$ACARGA_ADO =  new ACARGA_ADO();
$ADESTINO_ADO =  new ADESTINO_ADO();
$NAVIERA_ADO =  new NAVIERA_ADO();
$PCARGA_ADO =  new PCARGA_ADO();
$PDESTINO_ADO =  new PDESTINO_ADO();
$FPAGO_ADO =  new FPAGO_ADO();
$MVENTA_ADO =  new MVENTA_ADO();
$CVENTA_ADO =  new CVENTA_ADO();
$TFLETE_ADO =  new TFLETE_ADO();
$TCONTENEDOR_ADO =  new TCONTENEDOR_ADO();
$ATMOSFERA_ADO =  new ATMOSFERA_ADO();
$SEGURO_ADO =  new SEGURO_ADO();

$EEXPORTACION_ADO = new EEXPORTACION_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$ESPECIES_ADO =  new ESPECIES_ADO();
$TCALIBRE_ADO =  new TCALIBRE_ADO();
$PAIS_ADO =  new PAIS_ADO();
$TCALIBRE_ADO = new TCALIBRE_ADO();
$TMONEDA_ADO = new TMONEDA_ADO();
$TMANEJO_ADO =  new TMANEJO_ADO();

$PRODUCTOR_ADO = new PRODUCTOR_ADO();
$DESPACHOEX_ADO = new DESPACHOEX_ADO();
$EXIEXPORTACION_ADO = new EXIEXPORTACION_ADO();
$TEMBALAJE_ADO = new TEMBALAJE_ADO();
$ECOMERCIAL_ADO = new ECOMERCIAL_ADO();
$TETIQUETA_ADO = new TETIQUETA_ADO();
$TCATEGORIA_ADO = new TCATEGORIA_ADO();
$TINPSAG_ADO =  new TINPSAG_ADO();
$INPSAG_ADO =  new INPSAG_ADO();


$PAIS_ADO =  new PAIS_ADO();
$REGION_ADO =  new REGION_ADO();
$PROVINCIA_ADO =  new PROVINCIA_ADO();
$COMUNA_ADO =  new COMUNA_ADO();

$ICARGA_ADO =  new ICARGA_ADO();
$DICARGA_ADO =  new DICARGA_ADO();
//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$NUMERO = "";
$NUMEROVER = "";
$FECHAINGRESO = "";
$FECHAMODIFCIACION = "";
$IDINOTA = "";
$FECHAINOTA = "";
$TNOTA = "";
$OBSERVACIONINOTA = "";
$ICARGAD="";
$BOOKINGINSTRUCTIVO = "";
$BOLAWBCRTINSTRUCTIVO="";
$CONSIGNATARIO = "";
$FECHAETD = "";
$FECHAETA = "";
$TEMBARQUE = "";
$TRANSPORTE = "";
$LCARGA = "";
$LDESTINO = "";
$LAEREA = "";
$ACARGA = "";
$ADESTINO = "";
$NAVIERA = "";
$PCARGA = "";
$PDESTINO = "";
$FPAGO = "";
$CVENTA = "";
$ESTADO = "";
$ESTANDAR = "";
$ESPECIES = "";
$VESPECIES = "";
$ENVASE = "";
$PRECIOUS = "";
$CALIBRE = "";
$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";
$TOTALPRECIOUSNUEVO=0;


$FDADESPACHOEX="";
$NUMEROCONTENEDOR="";
$NUMEROSELLO="";
$FECHADESPACHOEX="";
$LUGARDECARGA="";;

//INICIALIZAR ARREGLOS
$ARRAYEMPRESA = "";
$ARRAYPLANTA = "";
$ARRAYTEMPORADA = "";
$ARRAYFECHAACTUAL = "";
$ARRAYICARGA = "";
$ARRAYDICARGA = "";
$ARRAYCONSIGNATARIO = "";
$ARRAYTRANSPORTE = "";
$ARRAYLCARGA = "";
$ARRAYLDESTINO = "";
$ARRAYLAEREA = "";
$ARRAYACARGA = "";
$ARRAYADESTINO = "";
$ARRAYNAVIERA = "";
$ARRAYPCARGA = "";
$ARRAYPDESTINO = "";
$ARRAYFPAGO = "";
$ARRAYMVENTA = "";
$ARRAYICARGA2 = "";
$ARRAYPAIS = "";
$ARRAYVERPLANTA = "";
$ARRAYVERDCARGA = "";
$ARRAYSEGURO = "";
$ARRAYPRODUCTOR = "";
$ARRAYDCARGA = "";
$ARRAYCALIBRE = "";
$ARRAYNUMERO = "";
$ARRAYVERNOTADCNC="";
$ARRAYCOMUNA="";
$ARRYAPROVINCIA="";
$ARRYAREGION="";



//FUNCIONALIDAD
if (isset($_REQUEST['usuario'])) {
    $USUARIO = $_REQUEST['usuario'];
    $ARRAYUSUARIO = $USUARIO_ADO->ObtenerNombreCompleto($USUARIO);
    $NOMBRE = $ARRAYUSUARIO[0]["NOMBRE_COMPLETO"];
  }
  
  
  if (isset($_REQUEST['parametro'])) {
    $IDOP = $_REQUEST['parametro'];
  }
  $ARRAYICARGA=$ICARGA_ADO->verIcarga2($IDOP);
if($ARRAYICARGA){
      

    
    $IDUSUARIOI = $ARRAYICARGA[0]['ID_USUARIOI'];  
    $ARRAYUSUARIO2 = $USUARIO_ADO->ObtenerNombreCompleto($IDUSUARIOI);
    $NOMBRERESPONSABLE = $ARRAYUSUARIO2[0]["NOMBRE_COMPLETO"];
  
  
      $ARRAYDESPACHOEX=$DESPACHOEX_ADO->buscarDespachoExPorIcarga($IDOP);
    
      
      $NUMEROICARGA=$ARRAYICARGA[0]["NUMERO_ICARGA"];
      $NUMEROIREFERENCIA=$ARRAYICARGA[0]["NREFERENCIA_ICARGA"];
      $FECHA=$ARRAYICARGA[0]["FECHA"];
      $BOOKINGINSTRUCTIVO = $ARRAYICARGA[0]['BOOKING_ICARGA'];
      $TEMBARQUE = $ARRAYICARGA[0]['TEMBARQUE_ICARGA'];
      $FECHAETD = $ARRAYICARGA[0]['FECHAETD'];
      $FECHAETA = $ARRAYICARGA[0]['FECHAETA'];    
      $BOLAWBCRTINSTRUCTIVO = $ARRAYICARGA[0]['BOLAWBCRT_ICARGA'];


      $TINSTRUCTIVO = $ARRAYICARGA[0]['T_ICARGA'];
      $O2INSTRUCTIVO = $ARRAYICARGA[0]['O2_ICARGA'];
      $CO2INSTRUCTIVO = $ARRAYICARGA[0]['C02_ICARGA'];
      $ALAMPAINSTRUCTIVO = $ARRAYICARGA[0]['ALAMPA_ICARGA'];

      $OBSERVACIONES = $ARRAYICARGA[0]['OBSERVACION_ICARGA'];
      if($ARRAYICARGA[0]['FUMIGADO_ICARGA']==1){
        $FUMIGADO="Si";
      }else if($ARRAYICARGA[0]['FUMIGADO_ICARGA']==2){
        $FUMIGADO="No";
      }else{
        $FUMIGADO="Sin Datos";
      }

      $ESTADO = $ARRAYICARGA[0]['ESTADO'];
      if ($ARRAYICARGA[0]['ESTADO'] == 1) {
        $ESTADO = "Abierto";
      }else if ($ARRAYICARGA[0]['ESTADO'] == 0) {
        $ESTADO = "Cerrado";
      }else{
        $ESTADO="Sin Datos";
      }  
      $ARRAYRFINAL=$RFINAL_ADO->verRfinal($ARRAYICARGA[0]["ID_RFINAL"]);
      if($ARRAYRFINAL){
          $NOMBRERFINAL=htmlspecialchars($ARRAYRFINAL[0]["NOMBRE_RFINAL"], ENT_QUOTES, 'UTF-8');
      }else{
          $NOMBRERFINAL="Sin Datos";
      }
      $ARRYANOTIFICADOR=$NOTIFICADOR_ADO->verNotificador($ARRAYICARGA[0]['ID_NOTIFICADOR']);   
      if($ARRYANOTIFICADOR){
        $NOMBRENOTIFICADOR=$ARRYANOTIFICADOR[0]["NOMBRE_NOTIFICADOR"];
        $DIRECCIONNOTIFICADOR=$ARRYANOTIFICADOR[0]["DIRECCION_NOTIFICADOR"];
        $EORINOTIFICADOR=$ARRYANOTIFICADOR[0]["EORI_NOTIFICADOR"];
        $TELEFONONOTIFICADOR=$ARRYANOTIFICADOR[0]["TELEFONO_NOTIFICADOR"];
        $EMAIL1NOTIFICADOR=$ARRYANOTIFICADOR[0]["EMAIL1_NOTIFICADOR"];
      }else{
        $NOMBRENOTIFICADOR="Sin Datos";
        $EORINOTIFICADOR="Sin Datos";
        $TELEFONONOTIFICADOR="Sin Datos";
        $DIRECCIONNOTIFICADOR="Sin Datos";
        $EMAIL1NOTIFICADOR="Sin Datos";
      }
      $ARRAYCONSIGNATARIO = $CONSIGNATARIO_ADO->verConsignatorio($ARRAYICARGA[0]['ID_CONSIGNATARIO']);            
      if($ARRAYCONSIGNATARIO){
        $NOMBRECONSIGNATARIO=$ARRAYCONSIGNATARIO[0]["NOMBRE_CONSIGNATARIO"];
        $DIRECCIONCONSIGNATARIO=$ARRAYCONSIGNATARIO[0]["DIRECCION_CONSIGNATARIO"];
        $EORICONSIGNATARIO=$ARRAYCONSIGNATARIO[0]["EORI_CONSIGNATARIO"];
        $TELEFONOCONSIGNATARIO=$ARRAYCONSIGNATARIO[0]["TELEFONO_CONSIGNATARIO"];
        $EMAIL1CONSIGNATARIO=$ARRAYCONSIGNATARIO[0]["EMAIL1_CONSIGNATARIO"];
      }else{
        $NOMBRECONSIGNATARIO="Sin Datos";
        $EORICONSIGNATARIO="Sin Datos";
        $TELEFONOCONSIGNATARIO="Sin Datos";
        $DIRECCIONCONSIGNATARIO="Sin Datos";
        $EMAIL1CONSIGNATARIO="Sin Datos";
      }
      $ARRAYFPAGO = $FPAGO_ADO->verFpago(  $ARRAYICARGA[0]['ID_FPAGO']);         
      if($ARRAYFPAGO){
        $NOMBREFPAGO=$ARRAYFPAGO[0]["NOMBRE_FPAGO"];
      }else{
        $NOMBREFPAGO="Sin Datos";
      }
      $ARRAYMVENTA = $MVENTA_ADO->verMventa( $ARRAYICARGA[0]['ID_MVENTA']);        
      if($ARRAYMVENTA){
        $NOMBREMVENTA=$ARRAYMVENTA[0]["NOMBRE_MVENTA"];
      }else{
        $NOMBREMVENTA="Sin Datos";
      }
      $ARRAYCVENTA = $CVENTA_ADO->verCventa( $ARRAYICARGA[0]['ID_CVENTA']);        
      if($ARRAYMVENTA){
        $NOMBRECVENTA=$ARRAYCVENTA[0]["NOMBRE_CVENTA"];
      }else{
        $NOMBRECVENTA="Sin Datos";
      }
      $ARRAYTFLETE= $TFLETE_ADO->verTflete( $ARRAYICARGA[0]['ID_TFLETE']);        
      if($ARRAYTFLETE){
        $NOMBRETFLETE=$ARRAYTFLETE[0]["NOMBRE_TFLETE"];
      }else{
        $NOMBRETFLETE="Sin Datos";
      }      
      $ARRAYATMOSFERA =$ATMOSFERA_ADO->verAtmosfera( $ARRAYICARGA[0]['ID_ATMOSFERA']);
      if($ARRAYATMOSFERA){
        $NOMBREATMOSFERA=$ARRAYATMOSFERA[0]["NOMBRE_ATMOSFERA"];
      }else{
        $NOMBREATMOSFERA="Sin Datos";
      }
      $ARRAYTCONTENEDOR =$TCONTENEDOR_ADO->verTcontenedor( $ARRAYICARGA[0]['ID_TCONTENEDOR']);
      if($ARRAYTCONTENEDOR){
        $NOMBRETCONTENEDOR=$ARRAYTCONTENEDOR[0]["NOMBRE_TCONTENEDOR"];
      }else{
        $NOMBRETCONTENEDOR="Sin Datos";
      }      
      $ARRAYPAIS =$PAIS_ADO->verPais( $ARRAYICARGA[0]['ID_PAIS']);
      if($ARRAYPAIS){
        $NOMBREPAIS=$ARRAYPAIS[0]["NOMBRE_PAIS"];
      }else{
        $NOMBREPAIS="Sin Datos";
      }
      $ARRAYEXPORTADORA = $EXPORTADORA_ADO->verExportadora( $ARRAYICARGA[0]['ID_EXPPORTADORA']);
      if($ARRAYEXPORTADORA){
        $RUTEXPPORTADORA=$ARRAYEXPORTADORA[0]["RUT_EXPORTADORA"]."-".$ARRAYEXPORTADORA[0]["DV_EXPORTADORA"];
        $NOMBREEXPPORTADORA=$ARRAYEXPORTADORA[0]["NOMBRE_EXPORTADORA"];
      }else{
        $RUTEXPPORTADORA="Sin Datos";
        $NOMBREEXPPORTADORA="Sin Datos";
      }
      $ARRAYDFINAL =$DFINAL_ADO->verDfinal( $ARRAYICARGA[0]['ID_DFINAL']);
      if($ARRAYDFINAL){
        $NOMBREDFINAL=$ARRAYDFINAL[0]["NOMBRE_DFINAL"];
      }else{
        $NOMBREDFINAL="Sin Datos";
      }

    if($TEMBARQUE){
          if ($TEMBARQUE == "1") {
              $NOMBRETEMBARQUE="Terrestre";
              $CRT=$ARRAYICARGA[0]['CRT_ICARGA'];
              $ARRAYTRANSPORTE =$TRANSPORTE_ADO->verTransporte( $ARRAYICARGA[0]['ID_TRANSPORTE']);        
              if($ARRAYTRANSPORTE){
                $NOMBRETRANSPORTE=$ARRAYTRANSPORTE[0]["NOMBRE_TRANSPORTE"];
              }else{
                $NOMBRETRANSPORTE="Sin Datos";
              }            
              $ARRAYLCARGA =$LCARGA_ADO->verLcarga(  $ARRAYICARGA[0]['ID_LCARGA']);       
              if($ARRAYLCARGA){
                $NOMBREORIGEN=$ARRAYLCARGA[0]["NOMBRE_LCARGA"];
              }else{
                $NOMBREORIGEN="Sin Datos";
              }
              $ARRAYLDESTINO =$LDESTINO_ADO->verLdestino( $ARRAYICARGA[0]['ID_LDESTINO']);     
              if($ARRAYLDESTINO){
                $NOMBREDESTINO=$ARRAYLDESTINO[0]["NOMBRE_LDESTINO"];
              }else{
                $NOMBREDESTINO="Sin Datos";
              }
          }
          if ($TEMBARQUE == "2") {
              $NOMBRETEMBARQUE="Aereo";
              $NAVE=$ARRAYICARGA[0]['NAVE_ICARGA'];
              $NVIAJE = $ARRAYICARGA[0]['NVIAJE_ICARGA'];
             
              $ARRAYLAEREA = $LAEREA_ADO->verLaerea( $ARRAYICARGA[0]['ID_LAREA']);      
              if($ARRAYLAEREA){
                $NOMBRETRANSPORTE=$ARRAYLAEREA[0]["NOMBRE_LAEREA"];
              }else{
                $NOMBRETRANSPORTE="Sin Datos";
              }            
              $ARRAYACARGA =$ACARGA_ADO->verAcarga(  $ARRAYICARGA[0]['ID_ACARGA']);  
              if($ARRAYACARGA){
                $NOMBREORIGEN=$ARRAYACARGA[0]["NOMBRE_ACARGA"];
              }else{
                $NOMBREORIGEN="Sin Datos";
              }
              $ARRAYADESTINO =$ADESTINO_ADO->verAdestino( $ARRAYICARGA[0]['ID_ADESTINO']);  
              if($ARRAYADESTINO){
                $NOMBREDESTINO=$ARRAYADESTINO[0]["NOMBRE_ADESTINO"];
              }else{
                $NOMBREDESTINO="Sin Datos";
              }
          }
          if ($TEMBARQUE == "3") {
              $NOMBRETEMBARQUE="Maritimo";
              $NAVE  = $ARRAYICARGA[0]['NAVE_ICARGA'];
              $NVIAJE = $ARRAYICARGA[0]['NVIAJE_ICARGA'];
              $FECHASTACKING = $ARRAYICARGA[0]['FECHAESTACKING'];
              $ARRAYNAVIERA =$NAVIERA_ADO->verNaviera( $ARRAYICARGA[0]['ID_NAVIERA']);   
              if($ARRAYNAVIERA){
                $NOMBRETRANSPORTE=$ARRAYNAVIERA[0]["NOMBRE_NAVIERA"];
              }else{
                $NOMBRETRANSPORTE="Sin Datos";
              }            
              $ARRAYPCARGA =$PCARGA_ADO->verPcarga(  $ARRAYICARGA[0]['ID_PCARGA']);
              if($ARRAYPCARGA){
                $NOMBREORIGEN=$ARRAYPCARGA[0]["NOMBRE_PCARGA"];
              }else{
                $NOMBREORIGEN="Sin Datos";
              }
              $ARRAYPDESTINO =$PDESTINO_ADO->verPdestino( $ARRAYICARGA[0]['ID_PDESTINO']);
              if($ARRAYPDESTINO){
                $NOMBREDESTINO=$ARRAYPDESTINO[0]["NOMBRE_PDESTINO"];
              }else{
                $NOMBREDESTINO="Sin Datos";
              }
          }
    }      
  
    $ARRAYAGCARGA = $AGCARGA_ADO->verAgcarga(  $ARRAYICARGA[0]['ID_AGCARGA']); 
    if($ARRAYAGCARGA){
      $RUTAGCARGA=$ARRAYAGCARGA[0]["RUT_AGCARGA"]."-".$ARRAYAGCARGA[0]["DV_AGCARGA"];
      $NOMBREAGCARGA=$ARRAYAGCARGA[0]["NOMBRE_AGCARGA"];
      $DIRECCIONAGCARGA=$ARRAYAGCARGA[0]["DIRECCION_AGCARGA"];
      $CONTACTOAGCARGA=$ARRAYAGCARGA[0]["CONTACTO_AGCARGA"];
      $EMAILAGCARGA=$ARRAYAGCARGA[0]["EMAIL_AGCARGA"];
      $TELEFONOAGCARGA=$ARRAYAGCARGA[0]["TELEFONO_AGCARGA"];
    }else{
      $RUTAGCARGA="Sin Datos";
      $NOMBREAGCARGA="Sin Datos";
      $DIRECCIONAGCARGA="Sin Datos";
      $CONTACTOAGCARGA="Sin Datos";
      $EMAILAGCARGA="Sin Datos";
      $TELEFONOAGCARGA="Sin Datos";
    } 
    $ARRAYAADUANA = $AADUANA_ADO->verAaduana( $ARRAYICARGA[0]['ID_AADUANA']);
    if($ARRAYAADUANA){
      $RUTAADUANA=$ARRAYAADUANA[0]["RUT_AADUANA"]."-".$ARRAYAADUANA[0]["DV_AADUANA"];
      $NOMBREAADUANA=$ARRAYAADUANA[0]["NOMBRE_AADUANA"];
      $DIRECCIONAADUANA=$ARRAYAADUANA[0]["DIRECCION_AADUANA"];
      $CONTACTOAADUANA=$ARRAYAADUANA[0]["CONTACTO_AADUANA"];
      $EMAILAADUANA=$ARRAYAADUANA[0]["EMAIL_AADUANA"];
      $TELEFONOAADUANA=$ARRAYAADUANA[0]["TELEFONO_AADUANA"];
    }else{
      $RUTAADUANA="Sin Datos";
      $NOMBREAADUANA="Sin Datos";
      $DIRECCIONAADUANA="Sin Datos";
      $CONTACTOAADUANA="Sin Datos";
      $EMAILAADUANA="Sin Datos";
      $TELEFONOAADUANA="Sin Datos";
    }



    $ARRAYEMPRESA = $EMPRESA_ADO->verEmpresa($ARRAYICARGA[0]['ID_EMPRESA']);
    if($ARRAYEMPRESA){
      $NOMBREEMPRESA=$ARRAYEMPRESA[0]["NOMBRE_EMPRESA"];
      $RAZONSOCIALEMPRESA = $ARRAYEMPRESA[0]["RAZON_SOCIAL_EMPRESA"];
      $RUTEMPRESA=$ARRAYEMPRESA[0]["RUT_EMPRESA"]."-".$ARRAYEMPRESA[0]["DV_EMPRESA"];
      $DIRECCIONEMPRESA=$ARRAYEMPRESA[0]["DIRECCION_EMPRESA"];
      $ARRAYCOMUNA=$COMUNA_ADO->verComuna2($ARRAYEMPRESA[0]["ID_COMUNA"]);
      if($ARRAYCOMUNA){
        $UBICACION=$ARRAYCOMUNA[0]["COMUNA"].", ".$ARRAYCOMUNA[0]["PAIS"];
        $DIRECCIONEMPRESA=$DIRECCIONEMPRESA.", ".$UBICACION;
      }else{
        $DIRECCIONEMPRESA=$DIRECCIONEMPRESA;
      }
    }else{    
      $NOMBREEMPRESA="Sin Datos";
      $RAZONSOCIALEMPRESA="Sin Datos";
      $RUTEMPRESA="Sin Datos";
      $DIRECCIONEMPRESA="Sin Datos";
    }
  $ARRAYTEMPORADA = $TEMPORADA_ADO->verTemporada($ARRAYICARGA[0]['ID_TEMPORADA']);  
  if($ARRAYTEMPORADA){
    $NOMBRETEMPORADA=$ARRAYTEMPORADA[0]["NOMBRE_TEMPORADA"];
  }else{
    $NOMBRETEMPORADA="Sin Datos";
  }

} 


   

$html = '
<table border="0" cellspacing="0" cellpadding="0">
    <thead>
    <tr>   
        <th class="color center ">N° InsFinal </th>
        <th class="color center ">Nombre Exportadora </th>
        <th class="color center ">Nombre Productor </th>
        <th class="color center ">CSG Productor</th>
        <th class="color center ">GGN Productor</th>
        <th class="color center ">Especies </th>
        <th class="color center ">Variedad </th>
        <th class="color center ">Nombre Planta </th>
        <th class="color center ">CSP Planta </th>
        <th class="color center ">N° Folio Original</th>
        <th class="color center ">N° Folio Nuevo</th>
        <th class="color center ">Embalaje </th>
        <th class="color center ">Fecha Embalaje </th>
        <th class="color center ">Calibres </th>
        <th class="color center ">Categoria </th>
        <th class="color center ">Calidad </th>
        <th class="color center ">Condición SAG</th>
        <th class="color center ">Etiqueta </th>
        <th class="color center ">Envases </th>
        <th class="color center ">Kilos Neto </th>
        <th class="color center ">Kilos Bruto</th>
        <th class="color center ">Recibiddor</th>
';

if ($TEMBARQUE == "1") {
$html=$html.'
            <th class="color center ">Transporte </th>
            <th class="color center ">Contenedor</th>
            <th class="color center ">Lugar de Carga</th>
            <th class="color center ">Lugar de Destino</th>
        ';
}

if ($TEMBARQUE == "2") {
$html=$html.'
        <th class="color center ">Aeronave/ N° Vuelo </th>
        <th class="color center ">Contenedor</th>
        <th class="color center ">Aeropuerto de Carga</th>
        <th class="color center ">Aeropuerto de Destino</th>
        ';

}
if ($TEMBARQUE == "3") {
$html=$html.'
            <th class="color center ">Nave / N° Viaje </th>
            <th class="color center ">Contenedor</th>
            <th class="color center ">Puerto de Carga</th>
            <th class="color center ">Puerto de Destino</th>
        ';
}

$html=$html.'
            <th class="color center ">Termografo </th>
    </tr>
    </thead>
 <tbody>

';




foreach ($ARRAYDESPACHOEX as $s) :
  
  $FECHADESPACHOEX=$s['FECHA'];
  $NUMEROCONTENEDOR=$s['NUMERO_CONTENEDOR_DESPACHOEX'];
  $NUMEROSELLO=$s['NUMERO_SELLO_DESPACHOEX'];


  $TERMOGRAFODESPACHOEX=$s['TERMOGRAFO_DESPACHOEX'];
  $ARRAYVERPLANTA = $PLANTA_ADO->verPlanta($s['ID_PLANTA']);
  if($ARRAYVERPLANTA){
    $LUGARDECARGA=$ARRAYVERPLANTA[0]["RAZON_SOCIAL_PLANTA"];
    $CODIGOSAGPLANTA=$ARRAYVERPLANTA[0]["CODIGO_SAG_PLANTA"];
    $NOMBREPLANTA=$ARRAYVERPLANTA[0]["NOMBRE_PLANTA"];
    $FDADESPACHOEX=$ARRAYVERPLANTA[0]["FDA_PLANTA"];
  }else{
    $FECHADESPACHOEX="Sin Datos";
    $NOMBREPLANTA="Sin Datos";
    $LUGARDECARGA="Sin Datos";
  }


  $ARRAYTOMADO = $EXIEXPORTACION_ADO->buscarPordespachoEx($s['ID_DESPACHOEX']);
  foreach ($ARRAYTOMADO as $r) :


    $ARRAYINPSAG = $INPSAG_ADO->verInpsag3($r['ID_INPSAG']);
    if ($ARRAYINPSAG) {
        $FECHAINPSAG = $ARRAYINPSAG[0]["FECHA"];                                                                
        $NUMEROINPSAG = $ARRAYINPSAG[0]["NUMERO_INPSAG"]."-".$ARRAYINPSAG[0]["CORRELATIVO_INPSAG"];
        $ARRAYTINPSAG=$TINPSAG_ADO->verTinpsag($ARRAYINPSAG[0]["ID_TINPSAG"]);
        if($ARRAYTINPSAG){
            $NOMBRETINPSAG= $ARRAYTINPSAG[0]["NOMBRE_TINPSAG"];
        }else{
            $NOMBRETINPSAG = "Sin Datos";
        }

    } else {
        $FECHAINPSAG = "";
        $NUMEROINPSAG = "Sin Datos";
        $NOMBRETINPSAG = "Sin Datos";
    }

      $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);
        if ($ARRAYVERPRODUCTORID) {
            $GGNPRODUCTOR = $ARRAYVERPRODUCTORID[0]['GGN_PRODUCTOR'];
            $CSGPRODUCTOR = $ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'];
            $NOMBREPRODUCTOR = $ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'];
        } else {
            $GGNPRODUCTOR = "Sin Datos";
            $CSGPRODUCTOR = "Sin Datos";
            $NOMBREPRODUCTOR = "Sin Datos";
        }
        $ARRAYTCATEGORIA=$TCATEGORIA_ADO->verTcategoria($r['ID_TCATEGORIA']);
        if($ARRAYTCATEGORIA){      
          $NOMBRETCATEGORIA = $ARRAYTCATEGORIA[0]['NOMBRE_TCATEGORIA'];
        }else{
          $NOMBRETCATEGORIA="CAT1";
        }

        
        $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
        if ($ARRAYVERVESPECIESID) {
            $NOMBREVESPECIES = $ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'];
            $ARRAYVERESPECIESID = $ESPECIES_ADO->verEspecies($ARRAYVERVESPECIESID[0]['ID_ESPECIES']);
            if ($ARRAYVERVESPECIESID) {
                $NOMBRESPECIES = $ARRAYVERESPECIESID[0]['NOMBRE_ESPECIES'];
            } else {
                $NOMBRESPECIES = "Sin Datos";
            }
        } else {
            $NOMBREVESPECIES = "Sin Datos";
            $NOMBRESPECIES = "Sin Datos";
        }
        $ARRAYEVERERECEPCIONID = $EEXPORTACION_ADO->verEstandar($r['ID_ESTANDAR']);
        if ($ARRAYEVERERECEPCIONID) {
            $CODIGOESTANDAR = $ARRAYEVERERECEPCIONID[0]['CODIGO_ESTANDAR'];
            $NOMBREESTANDAR = $ARRAYEVERERECEPCIONID[0]['NOMBRE_ESTANDAR'];
            $PESO_BRUTO_ESTANDAR = $ARRAYEVERERECEPCIONID[0]['PESO_BRUTO_ESTANDAR'];
            $ARRAYTETIQUETA=$TETIQUETA_ADO->verEtiqueta($ARRAYEVERERECEPCIONID[0]['ID_TETIQUETA']);
            if($ARRAYTETIQUETA){
                $NOMBRETETIQUETA = $ARRAYTETIQUETA[0]['NOMBRE_TETIQUETA'];
            }else{
                $NOMBRETETIQUETA = "Sin Datos";
            }
            $ARRAYECOMERCIAL=$ECOMERCIAL_ADO->verEcomercial($ARRAYEVERERECEPCIONID[0]['ID_ECOMERCIAL']);        
            if($ARRAYECOMERCIAL){
                $NOMBREECOMERCIAL = $ARRAYECOMERCIAL[0]['NOMBRE_ECOMERCIAL'];
            }else{
                $NOMBREECOMERCIAL = "Sin Datos";
            }

        } else {
            $NOMBREESTANDAR = "Sin Datos";
            $CODIGOESTANDAR = "Sin Datos";
            $NOMBRETETIQUETA = "Sin Datos";
            $NOMBREECOMERCIAL = "Sin Datos";
        }


        $ARRAYTCALIBRE = $TCALIBRE_ADO->verCalibre($r['ID_TCALIBRE']);
        if ($ARRAYTCALIBRE) {
            $NOMBRETCALIBRE = $ARRAYTCALIBRE[0]['NOMBRE_TCALIBRE'];
        } else {
            $NOMBRETCALIBRE = "Sin Datos";
        }
        $ARRAYTEMBALAJE = $TEMBALAJE_ADO->verEmbalaje($r['ID_TEMBALAJE']);
        if ($ARRAYTEMBALAJE) {
            $NOMBRETEMBALAJE = $ARRAYTEMBALAJE[0]['NOMBRE_TEMBALAJE'];
        } else {
            $NOMBRETEMBALAJE = "Sin Datos";
        }

        $ArrayTermografoPallet =$EXIEXPORTACION_ADO->verFolio($r['FOLIO_EXIEXPORTACION']);  
              if($ArrayTermografoPallet){
                $termografoPallet=$ArrayTermografoPallet[0]["N_TERMOGRAFO"];
              }else{
                $termografoPallet="Sin Datos";
              }

        $html = $html . '    
              <tr class="center">        
                  <td class=" center ">' . $NUMEROIREFERENCIA . ' </td>
                  <td class=" center ">' . $NOMBREEXPPORTADORA . ' </td>
                  <td class=" center ">' . $NOMBREPRODUCTOR . ' </td>
                  <td class=" center ">' . $CSGPRODUCTOR . ' </td>
                  <td class=" center ">' . $GGNPRODUCTOR . ' </td>
                  <td class=" center ">' . $NOMBRESPECIES . ' </td>
                  <td class=" center ">' . $NOMBREVESPECIES . ' </td>
                  <td class=" center ">' . $NOMBREPLANTA . ' </td>
                  <td class=" center ">' . $CODIGOSAGPLANTA . ' </td>
                  <td class=" center">' . $r['FOLIO_EXIEXPORTACION'] . '</td>
                  <td class=" center">' . $r['FOLIO_AUXILIAR_EXIEXPORTACION'] . '</td>
                  <td class=" center ">' . $NOMBREECOMERCIAL . ' </td>
                  <td class=" center">' . $r['EMBALADO'] . '</td>
                  <td class=" center ">' . $NOMBRETCALIBRE . ' </td>
                  <td class=" center ">' . $NOMBRETCATEGORIA . ' </td>
                  <td class=" center ">Exportacion</td>
                  <td class=" center ">' . $NOMBRETINPSAG . ' </td>
                  <td class=" center ">' . $NOMBRETETIQUETA . ' </td>
                  <td class=" center">' . $r['ENVASE'] . '</td>
                  <td class=" center">' . $r['NETO'] . '</td>
                  <td class=" center">' . ($PESO_BRUTO_ESTANDAR*$r['ENVASE']). '</td>
                  <td class=" center ">' . $NOMBRERFINAL . ' </td>  

                  ';

                  if ($TEMBARQUE == "1") {

                  $html=$html.'
                                  <td class=" center ">'.$NOMBRETRANSPORTE.' </td>  
                                  <td class=" center ">' . $NUMEROCONTENEDOR . ' </td>   
                                  <td class=" center ">'.$NOMBREORIGEN.'</td>
                                  <td class=" center "> '.$NOMBREDESTINO.'</td>
                                  ';
                  }
                                  
                  if ($TEMBARQUE == "2") {

                  $html=$html.'
                                  <td class=" center ">'.$NAVE.' / '.$NVIAJE.' </td>  
                                  <td class=" center ">' . $NUMEROCONTENEDOR . ' </td>   
                                  <td class=" center ">'.$NOMBREORIGEN.'</td>
                                  <td class=" center "> '.$NOMBREDESTINO.'</td>
                                  ';
                  }

                  if ($TEMBARQUE == "3") {

                  $html=$html.'
                                  <td class=" center ">'.$NAVE.' / '.$NVIAJE.' </td>  
                                  <td class=" center ">' . $NUMEROCONTENEDOR . ' </td>   
                                  <td class=" center ">'.$NOMBREORIGEN.'</td>
                                  <td class=" center "> '.$NOMBREDESTINO.'</td>
                                  ';
                  }

                  $html=$html.'

                               <td class=" center ">' . $termografoPallet . ' </td>   
                              </tr>
                              ';
                              // <td class=" center ">' . $TERMOGRAFODESPACHOEX . ' </td>   


  endforeach;
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
$NOMBREARCHIVO = "PackingListIcarga_";
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
$TIPOINFORME = "Packing List ";
$CREADOR = "Usuario";
$AUTOR = "Usuario";
$ASUNTO = "Reporte";
$DESCRIPCION = "Packing List, " . $FECHANOMBRE . ", " . $HORAFINAL2;
$CATEGORIA = "Packing List";
$ETIQUETA = "Packing List";




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

/*
$EXCEL->getActiveSheet()->setAutoFilter(
    $EXCEL->getActiveSheet()
        ->calculateWorksheetDimension()
);*/


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
