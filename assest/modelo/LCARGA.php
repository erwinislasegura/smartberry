<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  PLANTA
 */

 //ESTRUCTURA DE LA CLASE
class  LCARGA {
    
    //ATRIBUTOS DE LA CLASE    
    private	  $ID_LCARGA; 
    private	  $NUMERO_LCARGA;
    private	  $NOMBRE_LCARGA;
    private   $ESTADO_LCARGA; 
    private	  $ID_EMPRESA; 
    private	  $ID_USUARIOI; 
    private	  $ID_USUARIOM; 
    
    
    //FUNCIONES GET Y SET    
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>