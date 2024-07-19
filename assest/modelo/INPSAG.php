<?php

    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class INPSAG {
        
        //ATRIBUTOS DE LA CLASE
        private	  $ID_INPSAG; 
        private   $NUMERO_INPSAG;
        private   $CORRELATIVO_INPSAG;
        private   $FECHA_INPSAG;
        private   $FECHA_INGRESO_INPSAG;
        private   $FECHA_MODIFICACION_INPSAG;
        private   $CANTIDAD_ENVASE_INPSAG;
        private   $KILOS_NETO_INPSAG;
        private   $KILOS_BRUTO_INPSAG;
        private	  $OBSERVACION_INPSAG;
        private   $TESTADOSAG;
        private   $CIF_INPSAG;
        private   $ESTADO;
        private   $ESTADO_REGISTRO;
        private   $ID_INPECTOR;
        private   $ID_CONTRAPARTE;
        private   $ID_TINPSAG;
        private   $ID_PAIS1;
        private   $ID_PAIS2;
        private   $ID_PAIS3;
        private   $ID_PAIS4;
        private   $ID_PLANTA;
        private   $ID_TEMPORADA;


        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>