<?php

    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class RECHAZOPT {
        
        //ATRIBUTOS DE LA CLASE
        private	  $ID_RECHAZO; 
        private	  $NUMERO_RECHAZO; 
        private	  $FECHA_RECHAZO; 
        private   $TRECHAZO;
        private   $RESPONSBALE_RECHAZO;
        private   $MOTIVO_RECHAZO;
        private   $CANTIDAD_ENVASE_RECHAZO;
        private   $KILOS_NETO_RECHAZO;
        private   $KILOS_BRUTO_RECHAZO;
        private   $ESTADO;
        private   $ESTADO_REGISTRO;
        private   $INGRESO;
        private   $MODIFICACION;
        private   $ID_VESPECIES;
        private   $ID_PRODUCTOR;
        private   $ID_EMPRESA;
        private   $ID_PLANTA;
        private   $ID_TEMPORADA;
        private   $ID_USUARIOI;
        private   $ID_USUARIOM;
        
        
        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>