<?php

    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class EXPORTADORA {
        
        //ATRIBUTOS DE LA CLASE 
        private	  $ID_EXPORTADORA; 
        private	  $NUMERO_EXPORTADORA; 
        private	  $RUT_EXPORTADORA;
        private	  $DV_EXPORTADORA;
        private	  $NOMBRE_EXPORTADORA;
        private	  $GIRO_EXPORTADORA;
        private	  $RAZON_SOCIAL_EXPORTADORA;
        private	  $DIRECCION_EXPORTADORA;
        private	  $CONTACTO1_EXPORTADORA;
        private	  $TELEFONO1_EXPORTADORA;
        private	  $EMAIL1_EXPORTADORA;
        private	  $CONTACTO2_EXPORTADORA;
        private	  $TELEFONO2_EXPORTADORA;
        private	  $EMAIL2_EXPORTADORA;
        private	  $LOGO_EXPORTADORA;
        private   $ESTADO_REGISTRO;
        private	  $ID_COMUNA;
        private	  $ID_EMPRESA; 
        private	  $ID_USUARIOI; 
        private	  $ID_USUARIOM; 
        
        
        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>