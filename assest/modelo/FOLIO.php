<?php

    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class  FOLIO {
        
        //ATRIBUTOS DE LA CLASE
        private	  $ID_FOLIO; 
        private	  $NUMERO_FOLIO;
        private	  $ALIAS_DINAMICO_FOLIO;
        private	  $ALIAS_ESTATICO_FOLIO;
        private   $TFOLIO;
        private   $ESTADO_REGISTRO; 
        private	  $ID_EMPRESA; 
        private	  $ID_PLANTA; 
        private   $ID_TEMPORADA;
        private	  $ID_USUARIOI; 
        private	  $ID_USUARIOM; 
        
        
        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>