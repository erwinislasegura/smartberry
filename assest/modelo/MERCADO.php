<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  PLANTA
 */

 //ESTRUCTURA DE LA CLASE
class MERCADO {
    
    //ATRIBUTOS DE LA CLASE
    private	  $ID_MERCADO; 
    private	  $NUMERO_MERCADO;   
    private	  $NOMBRE_MERCADO;   
    private   $ESTADO_REGISTRO; 
    private	  $ID_EMPRESA; 
    private	  $ID_USUARIOI; 
    private	  $ID_USUARIOM; 
    
    //FUNCIONES GET Y SET
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>