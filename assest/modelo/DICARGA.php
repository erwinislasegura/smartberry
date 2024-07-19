<?php
    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class DICARGA {
        
        //ATRIBUTOS DE LA CLASE    
        private	  $ID_DICARGA; 
        private	  $CANTIDAD_ENVASE_DICARGA;
        private	  $KILOS_NETO_DICARGA;
        private	  $KILOS_BRUTO_DICARGA;
        private	  $PRECIO_US_DICARGA;
        private	  $TOTAL_PRECIO_US_DICARGA;
        private	  $ESTADO;
        private   $ESTADO_REGISTRO;
        private   $ID_ESTANDAR;
        private   $ID_CALIBRE;
        private   $ID_TMONEDA;
        private   $ID_TMANEJO;
        private   $ID_VESPECIES;
        private   $ID_ICARGA;
        
        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>