<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  PLANTA
 */

 //ESTRUCTURA DE LA CLASE
class  FPAGO {
    
    //ATRIBUTOS DE LA CLASE    
    private	  $ID_FPAGO; 
    private	  $NUMERO_FPAGO;
    private	  $NOMBRE_FPAGO;
    private	  $FECHA_PAGO_FPAGO;
    private   $ESTADO_REGISTRO; 
    private	  $ID_EMPRESA; 
    private	  $ID_USUARIOI; 
    private	  $ID_USUARIOM; 
    
    
    
    //FUNCIONES GET Y SET    
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>