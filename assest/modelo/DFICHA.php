<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  AUSUARIO
 */

 //ESTRUCTURA DE LA CLASE
class DFICHA {
    
    //ATRIBUTOS DE LA CLASE
    private	  $ID_DFICHA;
    private	  $FACTOR_CONSUMO_DFICHA; 
    private	  $CONSUMO_ENVASE_DFICHA; 
    private	  $CONSUMO_PALLET_DFICHA; 
    private	  $PALLET_CARGA_DFICHA;
    private   $CONSUMO_CONTENEDOR_DFICHA;    
    private   $OBSERVACIONES_DFICHA;
    private   $ESTADO_REGISTRO;
    private   $ID_FICHA;
    private   $ID_PRODUCTO;
    
    //FUNCIONES GET Y SET
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>