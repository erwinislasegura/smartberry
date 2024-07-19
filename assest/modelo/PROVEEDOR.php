<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  PROVEEDOR
 */

 //ESTRUCTURA DE LA CLASE
class PROVEEDOR {
    
    //ATRIBUTOS DE LA CLASE
    private	  $ID_PROVEEDOR;
    private	  $RUT_PROVEEDOR;
    private	  $DV_PROVEEDOR; 
    private	  $RAZON_PROVEEDOR; 
    private	  $NUMERO_PROVEEDOR ; 
    private	  $NOMBRE_PROVEEDOR; 
    private	  $GIRO_PROVEEDOR; 
    private	  $DIRECCION_PROVEEDOR; 
    private	  $TELEFONO_PROVEEDOR; 
    private	  $EMAIL_PROVEEDOR; 
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