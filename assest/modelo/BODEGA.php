<?php
    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class BODEGA {
        
        //ATRIBUTOS DE LA CLASE    
        private	  $ID_BODEGA; 
        private	  $NOMBRE_BODEGA;
        private	  $NOMBRE_CONTACTO_BODEGA;
        private	  $PRINCIPAL;
        private	  $ENVASES;
        private   $ESTADO_REGISTRO; 
        private   $INGRESO;
        private   $MODIFICACION;
        private   $ID_EMPRESA;
        private   $ID_PLANTA;
        private   $ID_USUARIOI;
        private   $ID_USUARIOM;        
        
        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>