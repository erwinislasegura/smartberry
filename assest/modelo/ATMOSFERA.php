<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  PLANTA
 */

 //ESTRUCTURA DE LA CLASE
class  ATMOSFERA {
    
    //ATRIBUTOS DE LA CLASE    
    private	  $ID_ATMOSFERA; 
    private	  $NUMERO_ATMOSFERA;
    private	  $NOMBRE_ATMOSFERA;
    private   $ESTADO_REGISTRO; 
    private	  $ID_EMPRESA; 
    private	  $ID_USUARIOI; 
    private	  $ID_USUARIOM; 
    
    
    //FUNCIONES GET Y SET    
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>