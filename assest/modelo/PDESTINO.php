<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  PLANTA
 */

 //ESTRUCTURA DE LA CLASE
class  PDESTINO {
    
    //ATRIBUTOS DE LA CLASE    
    private	  $ID_PDESTINO; 
    private	  $NUMERO_PDESTINO; 
    private	  $NOMBRE_PDESTINO;
    private   $ESTADO_PDESTINO; 
    private	  $ID_EMPRESA; 
    private	  $ID_USUARIOI; 
    private	  $ID_USUARIOM; 
    
    
    //FUNCIONES GET Y SET    
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>