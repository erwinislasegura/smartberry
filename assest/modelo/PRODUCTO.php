<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  PRODUCTO
 */

 //ESTRUCTURA DE LA CLASE
class PRODUCTO {
    
    //ATRIBUTOS DE LA CLASE
    private	  $ID_PRODUCTO;
    private	  $NUMERO_PRODUCTO;
    private	  $CODIGO_PRODUCTO;
    private	  $NOMBRE_PRODUCTO; 
    private	  $DESCRIPCION_PRODUCTO; 
    private	  $MODELO; 
    private	  $OPTIMO; 
    private	  $CRITICO; 
    private	  $BAJO; 
    private   $ESTADO_REGISTRO; 
    private   $INGRESO;
    private   $MODIFICACION;
    private   $ID_EMPRESA;
    private   $ID_TUMEDIDA;
    private   $ID_FAMILIA;
    private   $ID_SUBFAMILIA;
    private   $ID_ESPECIES;
    private   $ID_USUARIOI;
    private   $ID_USUARIOM;
    
    
    //FUNCIONES GET Y SET
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>