<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  INVENTARIO
 */

 //ESTRUCTURA DE LA CLASE
class INVENTARIOM {
    
    //ATRIBUTOS DE LA CLASE
    private	  $ID_INVENTARIO;
    private	  $FOLIO_INVENTARIO; 
    private	  $FOLIO_AUXILIAR_INVENTARIO; 
    private	  $ALIAS_DINAMICO_FOLIO; 
    private	  $ALIAS_ESTATICO_FOLIO; 
    private	  $TRECEPCION; 
    private	  $VALOR_UNITARIO; 
    private	  $CANTIDAD_INVENTARIO; 
    private	  $FECHA_RECEPCION; 
    private	  $FECHA_DESPACHO; 
    private   $ESTADO; 
    private   $ESTADO_REGISTRO; 
    private   $INGRESO;
    private   $MODIFICACION;
    private   $ID_EMPRESA;
    private   $ID_PLANTA;
    private   $ID_TEMPORADA;
    private   $ID_BODEGA;
    private   $ID_FOLIO;
    private   $ID_PRODUCTO;
    private   $ID_TCONTENEDOR;
    private   $ID_TUMEDIDA;
    private   $ID_RECEPCION;
    private   $ID_PLANTA2;
    private   $ID_PLANTA3;
    private   $ID_PROVEEDOR;
    private   $ID_OCOMPRA;
    private   $ID_PRODUCTOR;
    private   $ID_DESPACHO;
    private   $ID_DESPACHO2;
    
    
    //FUNCIONES GET Y SET
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>