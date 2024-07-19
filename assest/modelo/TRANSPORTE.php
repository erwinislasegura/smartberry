<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  PLANTA
 */

 //ESTRUCTURA DE LA CLASE
    class  TRANSPORTE {
        
        
        //ATRIBUTOS DE LA CLASE
        private	  $ID_TRASNSPORTE; 
        private	  $RUT_TRANSPORTE;
        private	  $DV_TRANSPORTE;
        private	  $NUMERO_TRANSPORTE;
        private	  $NOMBRE_TRANSPORTE;
        private	  $GIRO_TRANSPORTE;
        private	  $RAZON_SOCIAL_TRANSPORTE;
        private   $DIRECCION_TRANSPORTE;
        private   $CONTACTO_TRANSPORTE;
        private   $TELEFONO_TRANSPORTE;
        private   $EMAIL_TRANSPORTE;     
        private   $NOTA_TRANSPORTE;
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