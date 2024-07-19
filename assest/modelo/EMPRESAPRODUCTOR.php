<?php

    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class EMPRESAPRODUCTOR {
        
        //ATRIBUTOS DE LA CLASE
        private	  $ID_EMPRESAPRODUCTOR;
        private	  $ID_USUARIO;
        private   $ID_EMPRESA;    
        private	  $ID_PRODUCTOR; 
        private   $ESTADO_REGISTRO; 
        private   $INGRESO;
        private   $MODIFICACION;
        private   $ID_USUARIOI;
        private   $ID_USUARIOM;
        
        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>