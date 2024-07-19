<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  PLANTA
 */

 //ESTRUCTURA DE LA CLASE
    class  LAEREA {
        
        
        //ATRIBUTOS DE LA CLASE
        private	  $ID_LAEREA; 
        private	  $NUMERO_LAEREA;
        private	  $RUT_LAEREA;
        private	  $DV_LAEREA;
        private	  $NOMBRE_LAEREA;
        private	  $GIRO_LAEREA;
        private	  $RAZON_SOCIAL_LAEREA;
        private   $DIRECCION_LAEREA;
        private   $CONTACTO_LAEREA;
        private   $TELEFONO_LAEREA;
        private   $EMAIL_LAEREA;     
        private   $NOTA_LAEREA;
        private   $ESTADO_REGISTRO; 
        private	  $ID_EMPRESA; 
        private	  $ID_USUARIOI; 
        private	  $ID_USUARIOM; 
        
        
        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>