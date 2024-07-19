<?php
    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class ECOMERCIAL
    {

        //ATRIBUTOS DE LA CLASE
        private   $ID_ECOMERCIAL;
        private   $CODIGO_ECOMERCIAL;
        private   $NOMBRE_ECOMERCIAL;
        private   $DESCRIPCION_ECOMERCIAL;
        private   $PESO_NETO_ECOMERCIAL;
        private   $PESO_BRUTO_ECOMERCIAL; 
        private   $ESTADO_REGISTRO; 
        private	  $ID_EMPRESA; 
        private	  $ID_USUARIOI; 
        private	  $ID_USUARIOM; 
        
        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>