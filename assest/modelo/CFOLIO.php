<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  AUSUARIO
 */

 //ESTRUCTURA DE LA CLASE
class CFOLIO {
    
    //ATRIBUTOS DE LA CLASE
    private	  $ID_CFOLIO;
    private	  $FOLIOORIGINAL; 
    private	  $FOLIONUEVO; 
    private	  $MOTIVO;
    private   $INGRESO;
    private   $ID_EXIEXPORTACION;
    private   $ID_USUARIO; 
    
    //FUNCIONES GET Y SET
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>