<?php

    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class CUARTEL {
        
        //ATRIBUTOS DE LA CLASE
        private	  $ID_CUARTEL; 
        private	  $NUMERO_CUARTEL;
        private	  $NOMBRE_CUARTEL;
        private   $TIEMPO_PRODUCCION_ANO_CUARTEL;
        private   $HECTAREAS_CUARTEL;
        private   $PLANTAS_EN_CUARTEL;
        private   $DISTANCIA_PLANTA_CUARTEL;
        private   $ESTADO_REGISTRO; 
        private   $ID_VESPECIES;
        private   $ID_EMPRESA;
        private   $ID_USUARIOI;
        private   $ID_USUARIOM;
            
        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>