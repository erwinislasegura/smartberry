<?php

    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class DPEXPORTACION {
        
        //ATRIBUTOS DE LA CLASE
        private	  $ID_DPEXPORTACION; 
        private	  $FOLIO_DPEXPORTACION; 
        private	  $FOLIO_MANUAL; 
        private   $FECHA_EMBALADO_DPEXPORTACION;
        private   $CANTIDAD_ENVASE_DPEXPORTACION;
        private   $KILOS_NETO_DPEXPORTACION;
        private   $PDESHIDRATACION_DPEXPORTACION;
        private   $KILOS_DESHIDRATACION_DPEXPORTACION;
        private   $KILOS_BRUTO_DPEXPORTACION;
        private   $EMBOLSADO;
        private   $ESTADO; 
        private   $ESTADO_REGISTRO; 
        private   $INGRESO; 
        private   $MODIFICACION; 
        private   $ID_TEMBALAJE;
        private   $ID_TCALIBRE;
        private   $ID_TMANEJO;
        private   $ID_ESTANDAR;
        private   $ID_FOLIO;
        private   $ID_VESPECIES;
        private   $ID_PRODUCTOR;
        private   $ID_PROCESO;
        private   $ID_TCATEGORIA;
        private   $ID_ICARGA;
        private $ESTADO_FOLIO;
        
        
        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>