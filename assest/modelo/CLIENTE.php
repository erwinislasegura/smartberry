<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  CLIENTE
 */

 //ESTRUCTURA DE LA CLASE
class CLIENTE {
    
    //ATRIBUTOS DE LA CLASE
    private	  $ID_CLIENTE;
    private	  $RUT_CLIENTE;
    private	  $DV_CLIENTE; 
    private	  $RAZON_CLIENTE; 
    private	  $NUMERO_CLIENTE; 
    private	  $NOMBRE_CLIENTE; 
    private	  $GIRO_CLIENTE; 
    private	  $DIRECCION_CLIENTE; 
    private	  $TELEFONO_CLIENTE; 
    private	  $EMAIL_CLIENTE; 
    private   $ESTADO_REGISTRO; 
    private   $INGRESO;
    private   $MODIFICACION;
    private   $ID_EMPRESA;
    private   $ID_COMUNA;
    private   $ID_USUARIOI;
    private   $ID_USUARIOM;
    
    
    //FUNCIONES GET Y SET
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>