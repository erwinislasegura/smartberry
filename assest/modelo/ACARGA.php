<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  PLANTA
 */

 //ESTRUCTURA DE LA CLASE
class  ACARGA {
    
    //ATRIBUTOS DE LA CLASE    
    private	  $ID_ACARGA; 
    private	  $NUMERO_ACARGA;
    private	  $NOMBRE_ACARGA;
    private   $ESTADO_ACARGA; 
    private	  $ID_EMPRESA; 
    private	  $ID_USUARIOI; 
    private	  $ID_USUARIOM; 
    
    
    //FUNCIONES GET Y SET    
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>