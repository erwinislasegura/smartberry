<?php

    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class LEVANTAMIENTOPT {
        
        //ATRIBUTOS DE LA CLASE
        private	  $ID_LEVANTAMIENTO; 
        private	  $NUMERO_LEVANTAMIENTO; 
        private	  $FECHA_LEVANTAMIENTO; 
        private   $TLEVANTAMIENTO;
        private   $RESPONSBALE_LEVANTAMIENTO;
        private   $MOTIVO_LEVANTAMIENTO;
        private   $CANTIDAD_ENVASE_LEVANTAMIENTO;
        private   $KILOS_NETO_LEVANTAMIENTO;
        private   $KILOS_BRUTO_LEVANTAMIENTO;
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