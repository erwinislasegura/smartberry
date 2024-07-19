<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  PLANTA
 */

 //ESTRUCTURA DE LA CLASE
class RMERCADO {
    
    //ATRIBUTOS DE LA CLASE
    private	  $ID_RMERCADO; 
    private	  $NUMERO_RMERCADO; 
    private   $ESTADO_REGISTRO; 
    private	  $ID_MERCADO;   
    private   $ID_PRODUCTOR;
    private	  $ID_EMPRESA; 
    private	  $ID_USUARIOI; 
    private	  $ID_USUARIOM; 
    
    //FUNCIONES GET Y SET
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>