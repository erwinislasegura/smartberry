<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  AUSUARIO
 */

 //ESTRUCTURA DE LA CLASE
class CICARGA {
    
    //ATRIBUTOS DE LA CLASE
    private	  $ID_CICARGA;
    private	  $ID_ICARGAO; 
    private	  $ID_ICARGAN; 
    private	  $MOTIVO;
    private   $INGRESO;
    private   $ID_EXIEXPORTACION;
    private   $ID_USUARIO; 
    
    //FUNCIONES GET Y SET
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>