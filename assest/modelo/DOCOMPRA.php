<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  DOCOMPRA
 */

 //ESTRUCTURA DE LA CLASE
class DOCOMPRA {
    
    //ATRIBUTOS DE LA CLASE
    private	  $ID_DOCOMPRA;
    private	  $CANTIDAD_DOCOMPRA; 
    private	  $CANTIDAD_INGRESADA_DOCOMPRA; 
    private	  $VALOR_UNITARIO_DOCOMPRA; 
    private   $ESTADO; 
    private   $ESTADO_REGISTRO; 
    private   $INGRESO;
    private   $MODIFICACION;
    private   $ID_PRODUCTO;
    private   $ID_TUMEDIDA;
    private   $ID_OCOMPRA;
    
    
    //FUNCIONES GET Y SET
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>