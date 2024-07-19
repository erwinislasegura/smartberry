<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  TIPOS PROCESO
 */

 //ESTRUCTURA DE LA CLASE
class DFINAL {
    
    //ATRIBUTOS DE LA CLASE
    private	  $ID_DFINAL; 
    private	  $NUMERO_DFINAL;   
    private	  $NOMBRE_DFINAL;   
    private   $ESTADO_REGISTRO; 
    private	  $ID_EMPRESA; 
    private	  $ID_USUARIOI; 
    private	  $ID_USUARIOM; 
    
    //FUNCIONES GET Y SET
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>