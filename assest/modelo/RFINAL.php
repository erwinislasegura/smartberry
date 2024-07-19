<?php
    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class RFINAL {
        
        //ATRIBUTOS DE LA CLASE    
        private	  $ID_RFINAL; 
        private	  $NUMERO_RFINAL;
        private	  $NOMBRE_RFINAL;
        private   $DIRECCION_RFINAL;
        private   $CONTACTO1_RFINAL;
        private   $CARGO1_RFINAL;
        private   $EMAIL1_RFINAL;
        private   $CONTACTO2_RFINAL;
        private   $CARGO2_RFINAL;
        private   $EMAIL2_RFINAL;
        private   $CONTACTO3_RFINAL;
        private   $CARGO3_RFINAL;
        private   $EMAIL3_RFINAL;
        private   $ESTADO_REGISTRO;
        private	  $ID_EMPRESA; 
        private	  $ID_USUARIOI; 
        private	  $ID_USUARIOM; 
        
        
        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>