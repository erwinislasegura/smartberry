<?php
    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class CONSIGNATARIO {
        
        //ATRIBUTOS DE LA CLASE    
        private	  $ID_CONSIGNATARIO; 
        private	  $NUMERO_CONSIGNATARIO;
        private	  $NOMBRE_CONSIGNATARIO;
        private	  $EORI_CONSIGNATARIO;
        private	  $DIRECCION_CONSIGNATARIO;
        private	  $TELEFONO_CONSIGNATARIO;
        private   $CONTACTO1_CONSIGNATARIO;
        private   $CARGO1_CONSIGNATARIO;
        private   $EMAIL1_CONSIGNATARIO;
        private   $CONTACTO2_CONSIGNATARIO;
        private   $CARGO2_CONSIGNATARIO;
        private   $EMAIL2_CONSIGNATARIO;
        private   $CONTACTO3_CONSIGNATARIO;
        private   $CARGO3_CONSIGNATARIO;
        private   $EMAIL3_CONSIGNATARIO;
        private   $ESTADO_REGISTRO;
        private	  $ID_EMPRESA; 
        private	  $ID_USUARIOI; 
        private	  $ID_USUARIOM; 
        
        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>