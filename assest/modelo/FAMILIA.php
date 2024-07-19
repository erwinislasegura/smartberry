<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  FAMILIA
 */

 //ESTRUCTURA DE LA CLASE
class FAMILIA {
    
    //ATRIBUTOS DE LA CLASE
    private	  $ID_FAMILIA;
    private	  $NUMERO_FAMILIA; 
    private	  $NOMBRE_FAMILIA; 
    private   $ESTADO_REGISTRO; 
    private   $INGRESO;
    private   $MODIFICACION;
    private   $ID_EMPRESA;
    private   $ID_CATEGORIA;
    private   $ID_USUARIOI;
    private   $ID_USUARIOM;
    
    
    //FUNCIONES GET Y SET
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>