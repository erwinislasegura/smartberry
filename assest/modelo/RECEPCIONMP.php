<?php

    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class RECEPCIONMP {
        
        //ATRIBUTOS DE LA CLASE
        private	  $ID_RECEPCION; 
        private   $NUMERO_RECEPCION;
        private   $FECHA_RECEPCION;
        private   $FECHA_GUIA_RECEPCION;
        private   $HORA_RECEPCION;
        private   $NUMERO_GUIA_RECEPCION;
        private   $TOTAL_KILOS_GUIA_RECEPCION;
        private   $CANTIDAD_ENVASE_RECEPCION;
        private   $KILOS_NETO_RECEPCION;
        private   $KILOS_BRUTO_RECEPCION;
        private	  $OBSERVACION_RECEPCION;
        private   $PATENTE_CAMION;
        private   $PATENTE_CARRO;
        private   $TRECEPCION;        
        private   $INGRESO;
        private   $MODIFICACION;
        private   $ESTADO;
        private   $ESTADO_REGISTRO;
        private   $ID_EMPRESA;
        private   $ID_PLANTA;
        private   $ID_TEMPORADA;
        private   $ID_PLANTA2;
        private   $ID_PRODUCTOR;
        private   $ID_TRANSPORTE;
        private   $ID_CONDUCTOR;        
        private   $ID_USUARIOI;
        private   $ID_USUARIOM;
        


        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>