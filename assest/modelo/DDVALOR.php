<?php
    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class DDVALOR {
        
        //ATRIBUTOS DE LA CLASE    
        private	  $ID_DDVALOR; 
        private	  $VALOR_DDVALOR;
        private   $CALIBRE;
        private   $ESTANDAR;
        private	  $ESTADO;
        private   $ESTADO_REGISTRO;
        private	  $INGRESO;
        private	  $MODIFICACION;
        private   $ID_ESTANDAR;
        private   $ID_TCALIBRE;
        private   $ID_USUARIOI;
        private   $ID_USUARIOM;
        private   $ID_DVALOR;
        
        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>