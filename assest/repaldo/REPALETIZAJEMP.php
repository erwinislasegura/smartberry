<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  PLANTA
 */

 //ESTRUCTURA DE LA CLASE
class REPALETIZAJEMP {
    
    //ATRIBUTOS DE LA CLASE
    private	  $ID_REPALETIZAJE; 
    private   $NUMERO_REPALETIZAJE;
    private   $CANTIDAD_ENVASE_REPALETIZAJE;
    private   $KILOS_NETO_REPALETIZAJE;
    private   $CANTIDAD_ENVASE_ORIGINAL;
    private   $KILOS_NETO_ORIGINAL;
    private   $MOTIVO_REPALETIZAJE;
    private   $FECHA_INGRESO;
    private   $FECHA_MODIFICACION;
    private   $ESTADO;  
    private   $ESTADO_REGISTRO; 
    private   $ID_EMPRESA;
    private   $ID_PLANTA;
    private   $ID_TEMPORADA;
    
    //FUNCIONES GET Y SET
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>