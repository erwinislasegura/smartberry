<?php

    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class  CONDUCTOR {
        
        //ATRIBUTOS DE LA CLASE
        private	  $ID_CONDUCTOR; 
        private	  $RUT_CONDUCTOR; 
        private	  $DV_CONDUCTOR; 
        private	  $NUMERO_CONDUCTOR;
        private	  $NOMBRE_CONDUCTOR;
        private   $NOTA_CONDUCTOR;
        private   $TELEFONO_CONDUCTOR;
        private   $EMAIL_CONDUCTOR;
        private   $ESTADO_REGISTRO; 
        private   $INGRESO;
        private   $MODIFICACION;
        private   $ID_EMPRESA;
        private   $ID_USUARIOI;
        private   $ID_USUARIOM;
        
        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>