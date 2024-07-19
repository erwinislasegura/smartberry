<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  PLANTA
 */

 //ESTRUCTURA DE LA CLASE
class  MVENTA {
    
    //ATRIBUTOS DE LA CLASE    
    private	  $ID_MVENTA; 
    private	  $NUMERO_MVENTA;
    private	  $NOMBRE_MVENTA;
    private	  $NOTA_MVENTA;
    private   $ESTADO_REGISTRO; 
    private	  $ID_EMPRESA; 
    private	  $ID_USUARIOI; 
    private	  $ID_USUARIOM; 
    
    
    //FUNCIONES GET Y SET    
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>