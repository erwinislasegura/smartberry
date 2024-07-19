<?php

    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class DNOTADC {
        
        //ATRIBUTOS DE LA CLASE
        private	  $ID_DNOTA; 
        private	  $TNOTA;
        private	  $CANTIDAD; 
        private	  $TOTAL; 
        private	  $NOTA; 
        private   $ESTADO;
        private   $ESTADO_REGISTRO;
        private   $INGRESO;
        private   $MODIFICACION;
        private   $ID_NOTA;
        private   $ID_DICARGA;


        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>