<?php

    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class DRINDUSTRIAL {
        
        //ATRIBUTOS DE LA CLASE
        private	  $ID_DRINDUSTRIAL; 
        private	  $FOLIO_DRINDUSTRIAL; 
        private   $FECHA_EMBALADO_DRINDUSTRIAL;
        private   $KILOS_NETO_DRINDUSTRIAL;
        private   $ESTADO; 
        private   $ESTADO_REGISTRO; 
        private   $INGRESO; 
        private   $MODIFICACION; 
        private   $ID_TMANEJO;
        private   $ID_FOLIO;
        private   $ID_VESPECIES;
        private   $ID_ESTANDAR;
        private   $ID_PRODUCTOR;
        private   $ID_REEMBALAJE;
        
        
        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>