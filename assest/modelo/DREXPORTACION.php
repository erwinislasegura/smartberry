<?php

    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class DREXPORTACION {
        
        //ATRIBUTOS DE LA CLASE
        private	  $ID_DREXPORTACION; 
        private	  $FOLIO_DREXPORTACION; 
        private	  $FOLIO_AUX_DREXPORTACION; 
        private	  $NUMERO_LINEA; 
        private   $FECHA_EMBALADO_DREXPORTACION;
        private   $CANTIDAD_ENVASE_DREXPORTACION;
        private   $KILOS_NETO_DREXPORTACION;
        private   $KILOS_BRUTO_DREXPORTACION;
        private   $KILOS_DESHIDRATACION_DREXPORTACION;
        private   $PDESHIDRATACION_DREXPORTACION;
        private   $ALIAS_FOLIO_DREXPORTACION;
        private   $EMBOLSADO;
        private   $ESTADO; 
        private   $ESTADO_REGISTRO; 
        private   $ID_ESTANDAR;
        private   $ID_CALIBRE;
        private   $ID_FOLIO;
        private   $ID_PVESPECIES;
        private   $ID_PROCESO;
        private   $ID_PRODUCTOR;
        private   $ID_TMANEJO;
        private   $ID_TCATEGORIA;
        private   $ID_ICARGA;
        private $ESTADO_FOLIO;
        
        
        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>