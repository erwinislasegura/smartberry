<?php

    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class PLANTA {
        
        //ATRIBUTOS DE LA CLASE
        private	  $ID_PLANTA; 
        private	  $NOMBRE_PLANTA;
        private	  $RAZON_SOCIAL_PLANTA;    
        private	  $DIRECCION_PLANTA;
        private	  $CODIGO_SAG_PLANTA;
        private	  $FDA_PLANTA;
        private	  $TPLANTA;
        private   $INGRESO;
        private   $MODIFICACION;
        private   $ESTADO_REGISTRO;
        private	  $ID_COMUNA;
        private	  $ID_PROVINCIA;
        private	  $ID_REGION;
        private   $ID_USUARIOI;
        private   $ID_USUARIOM;
        
        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>