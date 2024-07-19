<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  TIPOS PROCESO
 */

 //ESTRUCTURA DE LA CLASE
class TREEMBALAJE {
    
    //ATRIBUTOS DE LA CLASE
    private	  $ID_TREEMBALAJE; 
    private	  $NOMBRE_TREEMBALAJE;   
    private   $ESTADO_REGISTRO; 
    private   $ID_USUARIOI; 
    private   $ID_USUARIOM; 
    
    //FUNCIONES GET Y SET
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>