<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  DESPACHOM
 */

 //ESTRUCTURA DE LA CLASE
class DESPACHOE {
    
    //ATRIBUTOS DE LA CLASE
    private	  $ID_DESPACHO;
    private	  $NUMERO_DESPACHO; 
    private	  $FECHA_DESPACHO; 
    private	  $NUMERO_DOCUMENTO; 
    private	  $CANTIDAD_DESPACHO; 
    private	  $PATENTE_CAMION; 
    private	  $PATENTE_CARRO; 
    private	  $TDESPACHO; 
    private	  $OBSERVACIONES; 
    private	  $REGALO_DESPACHO; 
    private   $INGRESO;
    private   $MODIFICACION;
    private   $ESTADO; 
    private   $ESTADO_DESPACHO; 
    private   $ESTADO_REGISTRO; 
    private   $ID_EMPRESA;
    private   $ID_PLANTA;
    private   $ID_TEMPORADA;
    private   $ID_TDOCUMENTO;
    private   $ID_TRANSPORTE;
    private   $ID_CONDUCTOR;
    private   $ID_BODEGA;
    private   $ID_PLANTA2;
    private   $ID_BODEGA2;
    private   $ID_PRODUCTOR;
    private   $ID_PROVEEDOR;
    private   $ID_PLANTA3;
    private   $ID_COMPRADOR;
    private   $ID_DESPACHOMP;
    private   $ID_BODEGAO;
    private   $ID_USUARIOI;
    private   $ID_USUARIOM;
    
    
    //FUNCIONES GET Y SET
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>