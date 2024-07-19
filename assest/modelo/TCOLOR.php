<?php

/*
* MODELO DE CLASE DE LA ENTIDAD  PLANTA
 */

 //ESTRUCTURA DE LA CLASE
class TCOLOR {

    //ATRIBUTOS DE LA CLASE    
    private	  $ID_TCOLOR; 
    private	  $NUMERO_TCOLOR;
    private	  $NOMBRE_TCOLOR;
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