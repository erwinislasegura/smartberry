<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  PLANTA
 */

 //ESTRUCTURA DE LA CLASE
    class  NAVIERA {
        
        
        //ATRIBUTOS DE LA CLASE
        private	  $ID_NAVIERA; 
        private	  $NUMERO_NAVIERA;
        private	  $RUT_NAVIERA;
        private	  $NOMBRE_NAVIERA;
        private	  $GIRO_NAVIERA;
        private	  $RAZON_SOCIAL_NAVIERA;
        private   $DIRECCION_NAVIERA;
        private   $CONTACTO_NAVIERA;
        private   $TELEFONO_NAVIERA;
        private   $EMAIL_NAVIERA;     
        private   $NOTA_NAVIERA;
        private   $ESTADO_REGISTRO; 
        private	  $ID_EMPRESA; 
        private	  $ID_USUARIOI; 
        private	  $ID_USUARIOM; 
        
        
        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>