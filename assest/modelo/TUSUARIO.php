<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  TUSUARIO
 */

 //ESTRUCTURA DE LA CLASE
class TUSUARIO {
    
    //ATRIBUTOS DE LA CLASE
    private	  $ID_TUSUARIO;
    private	  $NOMBRE_TUSUARIO; 
    private   $ESTADO_REGISTRO; 
    private   $INGRESO;
    private   $MODIFICACION;
    private   $ID_USUARIOI;
    private   $ID_USUARIOM;
    
    //FUNCIONES GET Y SET
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>