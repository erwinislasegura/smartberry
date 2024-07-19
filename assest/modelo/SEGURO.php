<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  PLANTA
 */

 //ESTRUCTURA DE LA CLASE
class  SEGURO {
    
    //ATRIBUTOS DE LA CLASE    
    private	  $ID_SEGURO; 
    private	  $NUMERO_SEGURO;
    private	  $NOMBRE_SEGURO;
    private	  $ESTIMADO_SEGURO;
    private	  $REAL_SEGURO;
    private	  $SUMA_SEGURO;
    private   $ESTADO_SEGURO; 
    private	  $ID_EMPRESA; 
    private	  $ID_USUARIOI; 
    private	  $ID_USUARIOM; 
    
    
    //FUNCIONES GET Y SET    
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>