<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  INVENTARIO
 */

 //ESTRUCTURA DE LA CLASE
class INVENTARIOE {
    
    //ATRIBUTOS DE LA CLASE
    private	  $ID_INVENTARIO;
    private	  $TRECEPCION; 
    private	  $VALOR_UNITARIO; 
    private	  $CANTIDAD_ENTRADA; 
    private	  $CANTIDAD_SALIDA; 
    private   $ESTADO; 
    private   $ESTADO_REGISTRO; 
    private   $INGRESO;
    private   $MODIFICACION;    
    private   $ID_EMPRESA;
    private   $ID_PLANTA;
    private   $ID_TEMPORADA;
    private   $ID_BODEGA;
    private   $ID_PRODUCTO;
    private   $ID_TUMEDIDA;
    private   $ID_RECEPCION;
    private   $ID_DESPACHO;
    private   $ID_PLANTA2;
    private   $ID_DESPACHO2;
    private   $ID_DOCOMPRA;
    
    
    //FUNCIONES GET Y SET
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>