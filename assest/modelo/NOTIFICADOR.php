<?php
    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class NOTIFICADOR {
        
        //ATRIBUTOS DE LA CLASE    
        private	  $ID_NOTIFICADOR; 
        private	  $NUMERO_NOTIFICADOR;
        private	  $NOMBRE_NOTIFICADOR;
        private	  $EORI_NOTIFICADOR;
        private	  $DIRECCION_NOTIFICADOR;
        private	  $TELEFONO_NOTIFICADOR;
        private   $CONTACTO1_NOTIFICADOR;
        private   $CARGO1_NOTIFICADOR;
        private   $EMAIL1_NOTIFICADOR;
        private   $CONTACTO2_NOTIFICADOR;
        private   $CARGO2_NOTIFICADOR;
        private   $EMAIL2_NOTIFICADOR;
        private   $CONTACTO3_NOTIFICADOR;
        private   $CARGO3_NOTIFICADOR;
        private   $EMAIL3_NOTIFICADOR;
        private   $ESTADO_REGISTRO;
        private	  $ID_EMPRESA; 
        private	  $ID_USUARIOI; 
        private	  $ID_USUARIOM; 
        
        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>