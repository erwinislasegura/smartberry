<?php
    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class COMPRADOR {
        
        //ATRIBUTOS DE LA CLASE    
        private	  $ID_COMPRADOR; 
        private	  $RUT_COMPRADOR; 
        private	  $DV_COMPRADOR; 
        private	  $NUMERO_COMPRADOR;
        private	  $NOMBRE_COMPRADOR;
        private   $DIRECCION_COMPRADOR;
        private   $TELEFONO_COMPRADOR;
        private   $ESTADO_REGISTRO;
        private   $EMAIL_COMPRADOR;
        private   $ID_COMUNA;
        private	  $ID_EMPRESA; 
        private	  $ID_USUARIOI; 
        private	  $ID_USUARIOM; 
        
        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>