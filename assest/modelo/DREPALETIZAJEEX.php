<?php

/*
* MODELO DE CLASE DE LA ENTIDAD  PLANTA
 */

 //ESTRUCTURA DE LA CLASE
class  DREPALETIZAJEEX {
    
    //ATRIBUTOS DE LA CLASE
    private	  $ID_DREPALETIZAJE; 
    private	  $FOLIO_NUEVO_DREPALETIZAJE;  
    private	  $FOLIO_MANUAL;  
    private   $CANTIDAD_ENVASE_DREPALETIZAJE;  
    private   $KILOS_NETO_DREPALETIZAJE;  
    private   $KILOS_BRUTO_DREPALETIZAJE;  
    private   $FECHA_EMBALADO_DREPALETIZAJE;  
    private	  $EMBOLSADO;
    private   $ALIAS_FOLIO_DREPALETIZAJE;  
    private	  $FECHA_INGRESO;   
    private	  $FECHA_MODIFICACION;
    private	  $STOCK;
    private   $ESTADO;  
    private   $ESTADO_REGISTRO;  
    private   $ID_TMANEJO;  
    private   $ID_CALIBRE;  
    private   $ID_EMBALAJE;  
    private   $ID_EXIEXPORTACION;
    private   $ID_FOLIO;  
    private   $ID_ESTANDAR;  
    private   $ID_PRODUCTOR;  
    private   $ID_PVESPECIES;  
    private   $ID_REPALETIZAJE;  
    private   $ESTADO_FOLIO;
    
    //FUNCIONES GET Y SET
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>