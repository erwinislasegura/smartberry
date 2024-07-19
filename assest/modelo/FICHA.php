<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  AUSUARIO
 */

 //ESTRUCTURA DE LA CLASE
class FICHA {
    
    //ATRIBUTOS DE LA CLASE
    private	  $ID_FICHA;
    private	  $NUMERO_FICHA; 
    private	  $OBSERVACIONES_FICHA;
    private   $ESTADO;    
    private   $ESTADO_REGISTRO;    
    private   $INGRESO;
    private   $MODIFICACION;
    private   $ID_EMPRESA;
    private   $ID_TEMPORADA;
    private   $ID_ESTANDAR;
    private   $ID_USUARIOI;
    private   $ID_USUARIOM;
    
    //FUNCIONES GET Y SET
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>