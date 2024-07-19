<?php

    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class DRECEPCIONPT {
        
        //ATRIBUTOS DE LA CLASE 
        private	  $ID_DRECEPCION; 
        private	  $FOLIO_DRECEPCION;
        private	  $FOLIO_MANUAL; 
        private   $FECHA_EMBALADO_DRECEPCION;   
        private   $CANTIDAD_ENVASE_RECIBIDO_DRECEPCION;
        private   $CANTIDAD_ENVASE_RECHAZADO_DRECEPCION;
        private   $CANTIDAD_ENVASE_APROBADO_DRECEPCION;
        private   $KILOS_NETO_REAL_DRECEPCION;
        private   $KILOS_NETO_DRECEPCION;
        private   $KILOS_BRUTO_DRECEPCION;
        private   $PDESHIDRATACION_DRECEPCION;
        private   $KILOS_DESHIDRATACION_DRECEPCION;
        private   $TEMPERATURA_DRECEPCION;
        private   $STOCK_DRECEPCION;
        private   $EMBOLSADO_DRECEPCION;
        private   $GASIFICADO_DRECEPCION;
        private   $PREFRIO_DRECEPCION;        
        private   $NOTA_DRECEPCION;  
        private   $ESTADO; 
        private   $ESTADO_REGISTRO; 
        private   $INGRESO; 
        private   $MODIFICACION; 
        private   $ID_RECEPCION;
        private   $ID_PRODUCTOR;
        private   $ID_VESPECIES;
        private   $ID_ESTANDAR;
        private   $ID_FOLIO;
        private   $ID_TMANEJO;
        private   $ID_TCALIBRE;
        private   $ID_TCATEGORIA;
        private   $ID_TCOLOR;

        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>