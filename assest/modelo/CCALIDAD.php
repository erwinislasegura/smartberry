<?php

    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class CCALIDAD {
        
        //ATRIBUTOS DE LA CLASE
        private	  $ID_CCALIDAD; 
        private	  $NUMERO_CCALIDAD; 
        private	  $NOMBRE_CCALIDAD;
        private   $RGB_CCALIDAD;
        private   $HEXA_CCALIDAD;
        private   $ESTADO_REGISTRO; 
        private	  $ID_EMPRESA; 
        private	  $ID_USUARIOI; 
        private	  $ID_USUARIOM; 
        
        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>