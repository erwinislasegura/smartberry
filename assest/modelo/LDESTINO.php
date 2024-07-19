<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  PLANTA
 */

 //ESTRUCTURA DE LA CLASE
class  LDESTINO {
    
    //ATRIBUTOS DE LA CLASE    
    private	  $NUMERO_LDESTINO; 
    private	  $ID_LDESTINO; 
    private	  $NOMBRE_LDESTINO;
    private   $ESTADO_LDESTINO;
    private	  $ID_EMPRESA; 
    private	  $ID_USUARIOI; 
    private	  $ID_USUARIOM; 
    
    
    //FUNCIONES GET Y SET    
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>