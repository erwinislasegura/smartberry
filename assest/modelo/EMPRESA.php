<?php

    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class EMPRESA {
        
        //ATRIBUTOS DE LA CLASE
        private	  $ID_EMPRESA; 
        private	  $RUT_EMPRESA;
        private	  $DV_EMPRESA;
        private	  $NOMBRE_EMPRESA;
        private	  $RAZON_SOCIAL_EMPRESA;
        private	  $DIRECCION_EMPRESA;
        private	  $GIRO_EMPRESA;
        private	  $TELEFONO_EMPRESA;
        private	  $ENCARGADO_COMPRA_EMPRESA;
        private	  $LOGO_EMPRESA;
        private   $ESTADO_REGISTRO;
        private   $INGRESO;
        private   $MODIFICACION;
        private	  $ID_COMUNA;
        private	  $ID_PROVINCIA;
        private	  $ID_REGION;
        private   $ID_USUARIOI;
        private   $ID_USUARIOM;
        private   $FOLIO_MANUAL;
        private   $USO_CALIBRE;
        
        
        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>