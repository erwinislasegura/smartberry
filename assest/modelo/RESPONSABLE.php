<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  RESPONSABLE
 */

 //ESTRUCTURA DE LA CLASE
class RESPONSABLE {
    
    //ATRIBUTOS DE LA CLASE
    private	  $ID_RESPONSABLE;
    private	  $RUT_RESPONSABLE;
    private	  $DV_RESPONSABLE; 
    private	  $NUMERO_RESPONSABLE; 
    private	  $NOMBRE_RESPONSABLE; 
    private	  $DIRECCION_RESPONSABLE; 
    private	  $TELEFONO_RESPONSABLE; 
    private	  $EMAIL_RESPONSABLE; 
    private   $ESTADO_REGISTRO; 
    private   $INGRESO;
    private   $MODIFICACION;
    private   $ID_EMPRESA;
    private   $ID_COMUNA;
    private   $ID_USUARIO;
    private   $ID_USUARIOI;
    private   $ID_USUARIOM;
    
    
    //FUNCIONES GET Y SET
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>