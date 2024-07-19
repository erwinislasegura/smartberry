<?php

    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class DRECEPCIONMP {
        
        //ATRIBUTOS DE LA CLASE 
        private	  $ID_DRECEPCION; 
        private	  $FOLIO_DRECEPCION;
        private	  $FOLIO_MANUAL;      
        private   $FECHA_COSECHA_DRECEPCION;
        private   $CANTIDAD_ENVASE_DRECEPCION;
        private   $KILOS_BRUTO_DRECEPCION;
        private   $KILOS_NETO_DRECEPCION;
        private   $KILOS_PROMEDIO_DRECEPCION;
        private   $PESO_PALLET_DRECEPCION;
        private   $GASIFICADO_DRECEPCION;
        private   $NOTA_DRECEPCION;  
        private   $ESTADO; 
        private   $ESTADO_REGISTRO; 
        private   $INGRESO; 
        private   $MODIFICACION; 
        private   $ID_PRODUCTOR;
        private   $ID_VESPECIES;
        private   $ID_ESTANDAR;
        private   $ID_RECEPCION;
        private   $ID_FOLIO;
        private   $ID_TMANEJO;
        private   $ID_TTRATAMIENTO1;
        private   $ID_TTRATAMIENTO2;

        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>