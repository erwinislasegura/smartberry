<?php
    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class PRODUCTOR {
        
        //ATRIBUTOS DE LA CLASE    
        private	  $ID_PRODUCTOR; 
        private	  $NUMERO_PRODUCTOR; 
        private	  $RUT_PRODUCTOR; 
        private	  $NOMBRE_PRODUCTOR;
        private   $DIRECCION_PRODUCTOR;
        private   $TELEFONO_PRODUCTOR;
        private   $EMAIL_PRODUCTOR;
        private   $GIRO_PRODUCTOR;
        private   $CSG_PRODUCTOR;
        private   $SDP_PRODUCTOR;
        private   $PRB_PRODUCTOR;
        private   $GGN_PRODUCTOR;
        private   $CODIGO_ASOCIADO_PRODUCTOR;
        private   $NOMBRE_ASOCIADO_PRODUCTOR;
        private   $ESTADO_REGISTRO;
        private   $INGRESO;
        private   $MODIFICACION;
        private   $ID_EMPRESA;
        private   $ID_COMUNA;
        private   $ID_PROVINCIA;
        private   $ID_REGION;
        private   $ID_TPRODUCTOR;
        private   $ID_USUARIOI;
        private   $ID_USUARIOM;
        
        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>