<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  RECEPCION
 */

 //ESTRUCTURA DE LA CLASE
class RECEPCIONE {
    
    //ATRIBUTOS DE LA CLASE
    private	  $ID_RECEPCION;
    private	  $NUMERO_RECEPCION; 
    private	  $FECHA_RECEPCION; 
    private	  $TRECEPCION; 
    private	  $SNOCOMPRA; 
    private	  $NUMERO_DOCUMENTO_RECEPCION; 
    private	  $PATENTE_CAMION; 
    private	  $PATENTE_CARRO; 
    private	  $TOTAL_CANTIDAD_RECEPCION; 
    private   $OBSERVACIONES_RECEPCION; 
    private   $ESTADO; 
    private   $ESTADO_REGISTRO; 
    private   $INGRESO;
    private   $MODIFICACION;
    private   $ID_EMPRESA;
    private   $ID_PLANTA;
    private   $ID_TEMPORADA;
    private   $ID_BODEGA;
    private   $ID_TDOCUMENTO;
    private   $ID_TRANSPORTE;
    private   $ID_CONDUCTOR;
    private   $ID_PROVEEDOR;
    private   $ID_OCOMPRA;
    private   $ID_PLANTA2;
    private   $ID_PRODUCTOR;
    private   $ID_RECEPCIONMP;
    private   $ID_USUARIOI;
    private   $ID_USUARIOM;
    
    
    //FUNCIONES GET Y SET
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>