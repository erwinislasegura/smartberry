<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  PLANTA
 */

 //ESTRUCTURA DE LA CLASE
class TEMPORADA {
    
    //ATRIBUTOS DE LA CLASE    
    private	  $ID_TEMPORADA; 
    private	  $NOMBRE_TEMPORADA;
    private   $FECHA_INICIO_TEMPORADA;
    private   $FECHA_TERMINO_TEMPORADA;   
    private   $ESTADO_REGISTRO; 
    private   $INGRESO;
    private   $MODIFICACION;
    private   $ID_USUARIOI;
    private   $ID_USUARIOM;
    
    //FUNCIONES GET Y SET
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>