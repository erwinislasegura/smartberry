<?php

    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class REGION {
        
        
        //ATRIBUTOS DE LA CLASE
        private	  $ID_REGION; 
        private	  $NOMBRE_REGION; 
        private   $ESTADO_REGISTRO;
        private   $INGRESO;
        private   $MODIFICACION; 
        private   $ID_PAIS;
        
        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>