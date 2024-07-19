<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  AUSUARIO
 */

 //ESTRUCTURA DE LA CLASE
class AVISO {
    
    //ATRIBUTOS DE LA CLASE
    private	  $ID_AVISO;
    private	  $DIA_INICIO; 
    private	  $DIA_TERMINO; 
    private	  $MENSAJE;
    private   $TAVISO;
    private   $TPRIORIDAD; 
    private   $FECHA_TERMINO;
    private   $INGRESO;
    private   $MODIFICACION;
    private   $ESTADO_REGISTRO;
    private   $ID_USUARIOI;
    private   $ID_USUARIOM;
    
    //FUNCIONES GET Y SET
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>