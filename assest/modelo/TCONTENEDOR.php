<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  TCONTENEDOR
 */

 //ESTRUCTURA DE LA CLASE
class TCONTENEDOR {
    
    //ATRIBUTOS DE LA CLASE
    private	  $ID_TCONTENEDOR;
    private	  $NUMERO_TCONTENEDOR; 
    private	  $NOMBRE_TCONTENEDOR; 
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