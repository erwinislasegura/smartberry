<?php
    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class AADUANA {
        
        //ATRIBUTOS DE LA CLASE    
        private	  $ID_AADUANA; 
        private	  $RUT_AADUANA;
        private	  $DV_AADUANA;
        private	  $NUMERO_AADUANA;
        private	  $NOMBRE_AADUANA;
        private	  $RAZON_SOCIAL_AADUANA;
        private	  $GIRO_AADUANA;
        private   $DIRECCION_AADUANA;
        private   $CONTACTO_AADUANA;
        private   $TELEFONO_AADUANA;
        private   $EMAIL_AADUANA;
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