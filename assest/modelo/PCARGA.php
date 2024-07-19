<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  PLANTA
 */

 //ESTRUCTURA DE LA CLASE
class  PCARGA {
    
    //ATRIBUTOS DE LA CLASE    
    private	  $ID_PCARGA; 
    private	  $NUMERO_PCARGA;
    private	  $NOMBRE_PCARGA;
    private   $ESTADO_PCARGA; 
    private	  $ID_EMPRESA; 
    private	  $ID_USUARIOI; 
    private	  $ID_USUARIOM; 
    
    
    //FUNCIONES GET Y SET    
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>