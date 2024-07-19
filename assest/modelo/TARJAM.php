<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  TARJA
 */

 //ESTRUCTURA DE LA CLASE
class TARJAM {
    
    //ATRIBUTOS DE LA CLASE
    private	  $ID_TARJA;
    private	  $FOLIO_TARJA; 
    private	  $ALIAS_DINAMICO_TARJA; 
    private	  $ALIAS_ESTATICO_TARJA; 
    private	  $CANITDAD_CONTENEDOR; 
    private	  $VALOR_UNITARIO; 
    private	  $CANTIDAD_TARJA; 
    private	  $VALOR_TOTAL; 
    private   $ESTADO; 
    private   $ESTADO_REGISTRO; 
    private   $INGRESO;
    private   $MODIFICACION;
    private   $ID_RECEPCION;
    private   $ID_PRODUCTO;
    private   $ID_TCONTENEDOR;
    private   $ID_TUMEDIDA;
    private   $ID_FOLIO;
    private   $ID_DRECEPCION;
    private   $ID_DOCOMPRA;
    
    
    //FUNCIONES GET Y SET
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>