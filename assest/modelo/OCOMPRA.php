<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  OCOMPRA
 */

 //ESTRUCTURA DE LA CLASE
class OCOMPRA {
    
    //ATRIBUTOS DE LA CLASE
    private	  $ID_OCOMPRA;
    private	  $NUMERO_OCOMPRA; 
    private	  $NUMEROI_OCOMPRA; 
    private	  $FECHA_OCOMPRA; 
    private	  $TCAMBIO_OCOMPRA; 
    private	  $TOTAL_CANTIDAD_OCOMPRA; 
    private	  $TOTAL_VALOR_OCOMPRA; 
    private   $OBSERVACIONES_OCOMPRA; 
    private   $ESTADO; 
    private   $ESTADO_OCOMPRA; 
    private   $ESTADO_REGISTRO; 
    private   $INGRESO;
    private   $MODIFICACION;
    private   $ID_EMPRESA;
    private   $ID_PLANTA;
    private   $ID_TEMPORADA;
    private   $ID_RESPONSBALE;
    private   $ID_PROVEEDOR;
    private   $ID_FPAGO;
    private   $ID_TMONEDA;
    private   $ID_USUARIOI;
    private   $ID_USUARIOM;
    
    
    //FUNCIONES GET Y SET
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>