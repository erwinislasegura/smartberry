<?php

    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class DRECEPCIONIND {
        
        //ATRIBUTOS DE LA CLASE 
        private	  $ID_DRECEPCION; 
        private	  $FOLIO_DRECEPCION;
        private   $FECHA_EMBALADO_DRECEPCION;
        private   $CANTIDAD_ENVASE_DRECEPCION;
        private   $KILOS_NETO_DRECEPCION;
        private   $KILOS_BRUTO_DRECEPCION;
        private   $KILOS_PROMEDIO_DRECEPCION;
        private   $PESO_PALLET_DRECEPCION;
        private   $GASIFICADO_DRECEPCION;
        private   $ESTADO; 
        private   $ESTADO_REGISTRO; 
        private   $INGRESO; 
        private   $MODIFICACION; 
        private   $ID_TMANEJO;
        private   $ID_FOLIO;
        private   $ID_ESTANDAR;
        private   $ID_PRODUCTOR;
        private   $ID_VESPECIES;
        private   $ID_RECEPCION;

        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>