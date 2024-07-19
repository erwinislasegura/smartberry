<?php

    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class VESPECIES {
        
        //ATRIBUTOS DE LA CLASE
        private	  $ID_VESPECIES; 
        private	  $NUMERO_VESPECIES; 
        private	  $NOMBRE_VESPECIES;
        private   $CODIGO_SAG_VESPECIES;
        private   $INGRESO; 
        private   $MODIFICACION; 
        private   $ESTADO_REGISTRO; 
        private   $ID_ESPECIES;
        private   $ID_EMPRESA;
        private   $ID_USUARIOI;
        private   $ID_USUARIOM;
        
        
        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>