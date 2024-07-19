<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  PLANTA
 */

 //ESTRUCTURA DE LA CLASE
class  MOCOMPRA {
    
    //ATRIBUTOS DE LA CLASE    
    private	  $ID_MOCOMPRA; 
    private	  $NUMERO_MOCOMPRA;
    private	  $FECHA_INGRESO_MOCOMPRA;
    private	  $NUMERO_OCOMPRA;
    private	  $NUMEROI_OCOMPRA;
    private	  $MOTIVO_MOCOMPRA;
    private	  $ESTADO_REGISTRO;
    private	  $ID_OCOMPRA;
    private	  $ID_EMPRESA;
    private	  $ID_PLANTA;
    private   $ID_TEMPORADA; 
    private   $ID_USUARIOI; 
    private   $ID_USUARIOM; 
    
    
    //FUNCIONES GET Y SET    
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>