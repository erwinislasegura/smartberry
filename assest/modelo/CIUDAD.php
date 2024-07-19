<?php

    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class CIUDAD {
        
        //ATRIBUTOS DE LA CLASE
        private	  $ID_CIUDAD;
        private	  $NOMBRE_CIUDAD; 
        private   $ESTADO_REGISTRO; 
        private   $INGRESO;
        private   $MODIFICACION;
        private   $ID_COMUNA;    
        
        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>