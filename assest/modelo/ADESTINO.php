<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  PLANTA
 */

 //ESTRUCTURA DE LA CLASE
class  ADESTINO {
    
    //ATRIBUTOS DE LA CLASE    
    private	  $ID_ADESTINO; 
    private	  $NUMERO_ADESTINO; 
    private	  $NOMBRE_ADESTINO;
    private   $ESTADO_ADESTINO;
    private	  $ID_EMPRESA; 
    private	  $ID_USUARIOI; 
    private	  $ID_USUARIOM; 
     
    
    
    //FUNCIONES GET Y SET    
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>