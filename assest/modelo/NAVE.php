<?php

/*
* MODELO DE CLASE DE LA ENTIDAD  PLANTA
 */

 //ESTRUCTURA DE LA CLASE
class  NAVE {
    
    //ATRIBUTOS DE LA CLASE
    private	  $ID_NAVE; 
    private	  $NUMERO_NAVE; 
    private	  $NOMBRE_NAVE; 
    private   $ESTADO_REGISTRO;
    private   $ID_LAEREA;  
    private	  $ID_EMPRESA; 
    private	  $ID_USUARIOI; 
    private	  $ID_USUARIOM; 
    
    //FUNCIONES GET Y SET  
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>