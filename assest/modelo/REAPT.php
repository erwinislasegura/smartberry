<?php
    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class REAPT {
        
        //ATRIBUTOS DE LA CLASE    
        private	  $ID_RECHAZO; 
        private	  $ID_EXIEXPORTACION;
        
        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>