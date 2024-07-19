<?php
    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class  TEMBALAJE {
        
        //ATRIBUTOS DE LA CLASE
        private	  $ID_TEMBALAJE; 
        private	  $NUMERO_TETIQUETA; 
        private	  $NOMBRE_TEMBALAJE;
        private	  $PESO_TEMBALAJE; 
        private   $ESTADO_REGISTRO; 
        private	  $ID_EMPRESA; 
        private	  $ID_USUARIOI; 
        private	  $ID_USUARIOM; 
        
        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>