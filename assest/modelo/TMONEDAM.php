<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  TMONEDA
 */

 //ESTRUCTURA DE LA CLASE
class TMONEDAM {
    
    //ATRIBUTOS DE LA CLASE
    private	  $ID_TMONEDA;
    private	  $NUMERO_TMONEDA; 
    private	  $NOMBRE_TMONEDA; 
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