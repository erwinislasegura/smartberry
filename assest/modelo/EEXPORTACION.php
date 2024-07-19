<?php

    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class EEXPORTACION
    {

        //ATRIBUTOS DE LA CLASE
        private   $ID_ESTANDAR;
        private   $CODIGO_ESTANDAR;
        private   $NOMBRE_ESTANDAR;
        private   $CANTIDAD_ENVASE_ESTANDAR;
        private   $PESO_NETO_ESTANDAR;
        private   $PDESHIDRATACION_ESTANDAR;
        private   $PESO_BRUTO_ESTANDAR;
        private   $PESO_ENVASE_ESTANDAR;
        private   $PESO_PALLET_ESTANDAR;
        private   $TFRUTA_ESTANDAR;
        private   $EMBOLSADO;        
        private   $STOCK;
        private   $TCATEGORIA;       
        private   $TREFERENCIA;        
        private   $TCOLOR;           
        private   $TVARIEDAD;       
        private   $ESTADO_REGISTRO;
        private   $ID_ESPECIES;
        private   $ID_ETIQUETA;
        private   $ID_EMBALAJE;
        private   $ID_CCOMERCIAL;
        private   $ID_MERCADO;
        private	  $ID_EMPRESA; 
        private	  $ID_USUARIOI; 
        private	  $ID_USUARIOM; 

        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v) { return $this->$k = $v; }
    }
?>