<?php

    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class EINDUSTRIAL
    {

        //ATRIBUTOS DE LA CLASE
        private   $ID_ESTANDAR;
        private   $CODIGO_ESTANDAR;
        private   $NOMBRE_ESTANDAR;
        private   $CANTIDAD_ENVASE_ESTANDAR;
        private   $PESO_ENVASE_ESTANDAR;
        private   $PESO_PALLET_ESTANDAR;
        private   $TESTANDAR;
        private   $COBRO;
        private   $TFRUTA_ESTANDAR;
        private   $ESTADO_REGISTRO;
        private   $ID_ESPECIES;
        private	  $ID_EMPRESA; 
        private   $ID_PRODUCTO;
        private	  $ID_USUARIOI; 
        private	  $ID_USUARIOM; 
        private   $AGRUPACION;

        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v) { return $this->$k = $v; }
    }
?>