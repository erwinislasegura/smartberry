<?php

/*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class PAIS {
        
        //ATRIBUTOS DE LA CLASE
        private	  $ID_PAIS; 
        private	  $NOMBRE_PAIS; 
        private	  $CODIGO_SAG_PAIS; 
        private   $ESTADO_REGISTRO; 
        private   $INGRESO;
        private   $MODIFICACION;
        
        
        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>