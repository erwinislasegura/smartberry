<?php

    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class ESPECIES {
        
        //ATRIBUTOS DE LA CLASE
        private	  $ID_ESPECIES; 
        private	  $NOMBRE_ESPECIES;
        private   $CODIGO_SAG_ESPECIES;
        private   $INGRESO; 
        private   $MODIFICACION; 
        private   $ESTADO_REGISTRO; 
        private   $ID_USUARIOI; 
        private   $ID_USUARIOM; 
        
        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>