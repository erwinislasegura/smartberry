<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  TUMEDIDA
 */

 //ESTRUCTURA DE LA CLASE
class TUMEDIDA {
    
    //ATRIBUTOS DE LA CLASE
    private	  $ID_TUMEDIDA;
    private	  $NUMERO_TUMEDIDA; 
    private	  $NOMBRE_TUMEDIDA; 
    private   $ESTADO_REGISTRO; 
    private   $INGRESO;
    private   $MODIFICACION;
    private   $ID_EMPRESA;
    private   $ID_USUARIOI;
    private   $ID_USUARIOM;
    
    //FUNCIONES GET Y SET
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>