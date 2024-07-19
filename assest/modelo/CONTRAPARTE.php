<?php
    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class CONTRAPARTE {
        
        //ATRIBUTOS DE LA CLASE    
        private	  $ID_CONTRAPARTE; 
        private	  $NUMERO_CONTRAPARTE;
        private	  $NOMBRE_CONTRAPARTE;
        private   $DIRECCION_CONTRAPARTE;
        private   $TELEFONO_CONTRAPARTE;
        private   $EMAIL_CONTRAPARTE;
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