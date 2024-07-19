<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  DRECEPCION
 */

 //ESTRUCTURA DE LA CLASE
class DRECEPCIONM {
    
    //ATRIBUTOS DE LA CLASE
    private	  $ID_DRECEPCION;
    private	  $NUMERO_DRECEPCION; 
    private	  $CANTIDAD_DRECEPCION; 
    private	  $VALOR_UNITARIO_DRECEPCION; 
    private	  $DESCRIPCION_DRECEPCION; 
    private   $ESTADO; 
    private   $ESTADO_REGISTRO; 
    private   $INGRESO;
    private   $MODIFICACION;
    private   $ID_RECEPCION;
    private   $ID_PRODUCTO;
    private   $ID_TUMEDIDA;
    private   $ID_DOCOMPRA;
    
    
    //FUNCIONES GET Y SET
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>