<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  TDOCUMENTO
 */

 //ESTRUCTURA DE LA CLASE
class TDOCUMENTO {
    
    //ATRIBUTOS DE LA CLASE
    private	  $ID_TDOCUMENTO;
    private	  $NUMERO_TDOCUMENTO; 
    private	  $NOMBRE_TDOCUMENTO; 
    private   $ESTADO_REGISTRO; 
    private   $INGRESO;
    private   $MODIFICACION;
    private   $ID_EMPRESA;
    private   $ID_USUARIOI;
    private   $ID_USUARIOM;
    
    //FUNCIONES GET Y SET
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>