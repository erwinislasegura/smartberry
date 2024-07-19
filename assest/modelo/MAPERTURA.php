<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  AUSUARIO
 */

 //ESTRUCTURA DE LA CLASE
class MAPERTURA {
    
    //ATRIBUTOS DE LA CLASE
    private	  $ID_MAPERTURA;
    private	  $MOTIVO_MAPERTURA; 
    private	  $TABLA; 
    private	  $ID_REGISTRO;
    private   $ID_USUARIO;
    
    //FUNCIONES GET Y SET
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>