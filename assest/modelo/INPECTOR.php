<?php
    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class INPECTOR {
        
        //ATRIBUTOS DE LA CLASE    
        private	  $ID_INPECTOR; 
        private	  $NUMERO_INPECTOR;
        private	  $NOMBRE_INPECTOR;
        private   $DIRECCION_INPECTOR;
        private   $TELEFONO_INPECTOR;
        private   $EMAIL_INPECTOR;
        private   $ESTADO_REGISTRO;
        private   $ID_COMUNA;
        private	  $ID_EMPRESA; 
        private	  $ID_USUARIOI; 
        private	  $ID_USUARIOM; 
        
        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>