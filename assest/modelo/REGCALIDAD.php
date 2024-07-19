<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  PLANTA
 */

 //ESTRUCTURA DE LA CLASE
class  REGCALIDAD {
    
    //ATRIBUTOS DE LA CLASE    
    private	  $ID; 
    private	  $FOLIOEX;
    private	  $FOLIO;
    private	  $FECHA;
    private   $HORA; 
    private	  $ID_USUARIO; 
    private	  $TIPO; 
    private	  $BAXLO_PROMEDIO; 
    private	  $PESO_10_FRUTOS; 
    private	  $TEMPERATURA; 
    private	  $BRIX; 
    private	  $PUDRICION_MICELIO; 
    private	  $HERIDAS_ABIERTAS; 
    private	  $DESHIDRATACION; 
    private	  $EXUDACION_JUGO; 
    private	  $BLANDO; 
    private	  $MACHUCON; 
    private	  $INMADURA_ROJA; 
    private	  $QC_CALIDAD; 
    private	  $QC_CONDICION; 
    private	  $ESTADO; 
    private	  $ID_EMPRESA; 
    
    
    //FUNCIONES GET Y SET    
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>