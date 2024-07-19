<?php

    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class REEMBALAJE {
        
        //ATRIBUTOS DE LA CLASE
        private	  $ID_REEMBALAJE; 
        private	  $NUMERO_REEMBALAJE; 
        private	  $FECHA_REEMBALAJE; 
        private   $TURNO;
        
        private   $KILOS_NETO_ENTRADA;
        private   $KILOS_NETO_REEMBALAJE;
        private   $KILOS_EXPORTACION_REEMBALAJE;
        private   $KILOS_INDUSTRIAL_REEMBALAJE;
        private   $KILOS_INDUSTRIALSC_REEMBALAJE;
        private   $KILOS_INDUSTRIALNC_REEMBALAJE;

        private   $PDEXPORTACION_REEMBALAJE;
        private   $PDEXPORTACIONCD_REEMBALAJE;
        private   $PDINDUSTRIAL_REEMBALAJE;
        private   $PDINDUSTRIALSC_REEMBALAJE;
        private   $PDINDUSTRIALNC_REEMBALAJE;
        private   $PORCENTAJE_REEMBALAJE;

        private   $OBSERVACIONES_REEMBALAJE;
        private   $INGRESO;
        private   $MODFICACION;
        private   $ESTADO;
        private   $ESTADO_REGISTRO;
        private   $ID_PVESPECIES;
        private   $ID_PRODUCTOR;
        private   $ID_TREEMBALAJE;
        private   $ID_RMERCADO;
        private   $ID_EMPRESA;
        private   $ID_PLANTA;
        private   $ID_TEMPORADA;
        
        
        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>