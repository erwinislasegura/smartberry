<?php

    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    
    class COMUNA {
        
        //ATRIBUTOS DE LA CLASE    
        private	  $ID_COMUNA; 
        private	  $NOMBRE_COMUNA; 
        private   $ESTADO_REGISTRO; 
        private   $INGRESO;
        private   $MODIFICACION;
        private   $ID_PROVINCIA;
        
        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>