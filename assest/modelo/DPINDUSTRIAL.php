<?php

    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class DPINDUSTRIAL {
        
        //ATRIBUTOS DE LA CLASE
        private	  $ID_DINDUSTRIAL; 
        private	  $FOLIO_DPINDUSTRIAL; 
        private	  $FOLIO_AUX_DPINDUSTRIAL; 
        private	  $NUMERO_LINEA; 
        private   $FECHA_EMBALADO_DPINDUSTRIAL;
        private   $CANTIDAD_ENVASE_DPINDUSTRIAL;
        private   $KILOS_NETO_DPINDUSTRIAL;
        private   $KILOS_BRUTO_DPINDUSTRIAL;
        private   $ALIAS_FOLIO_DPINDUSTRIAL;
        private   $ESTADO; 
        private   $ESTADO_REGISTRO; 
        private   $ID_FOLIO;
        private   $ID_PVESPECIES;
        private   $ID_ESTANDAR;
        private   $ID_PROCESO;
        private   $ID_PRODUCTOR;
        
        
        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>