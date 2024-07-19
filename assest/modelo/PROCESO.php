<?php

    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class PROCESO {
        
        //ATRIBUTOS DE LA CLASE
        private	  $ID_PROCESO; 
        private	  $NUMERO_PROCESO; 
        private	  $FECHA_PROCESO; 
        private   $TURNO;
        private   $KILOS_NETO_ENTRADA;
        private   $KILOS_NETO_PROCESO;
        private   $KILOS_EXPORTACION_PROCESO;
        private   $KILOS_INDUSTRIAL_PROCESO;
        private   $KILOS_INDUSTRIALSC_PROCESO;
        private   $KILOS_INDUSTRIALNC_PROCESO;
        private   $PDEXPORTACION_PROCESO;
        private   $PDEXPORTACIONCD_PROCESO;
        private   $PDINDUSTRIAL_PROCESO;
        private   $PDINDUSTRIALSC_PROCESO;
        private   $PDINDUSTRIALNC_PROCESO;
        private   $PORCENTAJE_PROCESO;
        private   $OBSERVACIONES_PROCESO;
        private   $INGRESO;
        private   $MODFICACION;
        private   $ESTADO;
        private   $ESTADO_REGISTRO;
        private   $ID_PVESPECIES;
        private   $ID_PRODUCTOR;
        private   $ID_TPROCESO;
        private   $ID_RMERCADO;
        private   $ID_EMPRESA;
        private   $ID_PLANTA;
        private   $ID_TEMPORADA;
        
        
        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>