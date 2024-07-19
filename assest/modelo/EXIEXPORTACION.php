<?php

/*
* MODELO DE CLASE DE LA ENTIDAD  PLANTA
 */

 //ESTRUCTURA DE LA CLASE
class EXIEXPORTACION {
    
    //ATRIBUTOS DE LA CLASE
    private	  $ID_EXIEXPORTACION; 
    private	  $FOLIO_EXIEXPORTACION;
    private	  $FOLIO_AUXILIAR_EXIEXPORTACION;
    private	  $FOLIO_MANUAL;
    private	  $FECHA_EMBALADO_EXIEXPORTACION;
    private	  $CANTIDAD_ENVASE_EXIEXPORTACION;
    private	  $KILOS_NETO_EXIEXPORTACION;
    private	  $PDESHIDRATACION_EXIEXPORTACION;
    private	  $KILOS_DESHIRATACION_EXIEXPORTACION;
    private	  $KILOS_BRUTO_EXIEXPORTACION;
    private	  $OBSERVACION_EXIESPORTACION;
    private   $ALIAS_DINAMICO_FOLIO_EXIESPORTACION;  
    private   $ALIAS_ESTATICO_FOLIO_EXIESPORTACION;  
    private	  $STOCK;
    private   $EMBOLSADO;
    private   $GASIFICADO;
    private   $PREFRIO;   
    private   $TESTADOSAG;
    private   $PRECIO_PALLET;
    private   $VGM;
    private   $COLOR;
    private   $FECHA_RECEPCION;
    private   $FECHA_PROCESO;
    private   $FECHA_REEMBALAJE;
    private   $FECHA_REPALETIZAJE;
    private   $FECHA_DESPACHO;
    private   $FECHA_DESPACHOEX;
    private	  $ESTADO;
    private   $ESTADO_REGISTRO;
    private	  $INGRESO;
    private	  $MODIFICACION;
    private   $ID_TCALIBRE;
    private   $ID_TEMBALAJE;
    private   $ID_TMANEJO;
    private	  $ID_FOLIO;
    private	  $ID_ESTANDAR;
    private	  $ID_PRODUCTOR;
    private	  $ID_VESPECIES;
    private   $ID_EMPRESA;
    private   $ID_PLANTA;
    private   $ID_TEMPORADA;
    private   $ID_TCATEGORIA;
    private   $ID_TCOLOR;
    private	  $ID_PROCESO;
    private   $ID_REPALETIZAJE;
    private   $ID_REEMBALAJE; 
    private   $ID_DESPACHO;
    private   $ID_DESPACHOEX;
    private   $ID_INPSAG;
    private   $ID_PCDESPACHO;   
    private   $ID_ICARGA;
    private   $ID_RECHAZADO;
    private   $ID_LEVANTAMIENTO;
    private   $ID_DESPACHO2;
    private   $ID_INPSAG2;
    private   $ID_REPALETIZAJE2;
    private   $ID_EXIEXPORTACION2;
    private   $ID_PLANTA2;
    private   $ID_PLANTA3;
    private   $ESTADO_FOLIO;
    
    
    //FUNCIONES GET Y SET
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>