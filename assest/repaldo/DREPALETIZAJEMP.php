<?php

/*
* MODELO DE CLASE DE LA ENTIDAD  PLANTA
 */

 //ESTRUCTURA DE LA CLASE
class  DREPALETIZAJEMP {
    
    //ATRIBUTOS DE LA CLASE
    private	  $ID_DREPALETIZAJE; 
    private	  $FOLIO_NUEVO_DREPALETIZAJE;  
    private	  $FOLIO_MANUAL;  
    private   $CANTIDAD_ENVASE_DREPALETIZAJE;  
    private   $KILOS_NETO_DREPALETIZAJE;  
    private   $KILOS_BRUTO_DREPALETIZAJE;  
    private   $KILOS_PROMEDIO_DREPALETIZAJE;  
    private   $PESO_PALLET_DREPALETIZAJE;  
    private   $ALIAS_FOLIO_DREPALETIZAJE;  
    private   $GASIFICADO;  
    private   $ESTADO;  
    private   $ESTADO_REGISTRO;  
    private   $ID_TMANEJO;  
    private   $ID_EXIMATERIAPRIMA;  
    private   $ID_FOLIO;  
    private   $ID_ESTANDAR;  
    private   $ID_PRODUCTOR;  
    private   $ID_PVESPECIES;  
    private   $ID_REPALETIZAJE;  
    
    //FUNCIONES GET Y SET
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>