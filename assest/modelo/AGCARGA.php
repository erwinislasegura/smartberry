<?php
    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class AGCARGA {
        
        //ATRIBUTOS DE LA CLASE    
        private	  $ID_AGCARGA; 
        private	  $RUT_AGCARGA;
        private	  $DV_AGCARGA;
        private	  $NUMERO_AGCARGA;
        private	  $NOMBRE_AGCARGA;
        private	  $RAZON_SOCIAL_AGCARGA;
        private	  $GIRO_AGCARGA;
        private	  $CODIGO_SAG_AGCARGA;
        private   $DIRECCION_AGCARGA;
        private   $CONTACTO_AGCARGA;
        private   $TELEFONO_AGCARGA;
        private   $EMAIL_AGCARGA;
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