<?php

    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class NOTADC {
        
        //ATRIBUTOS DE LA CLASE
        private	  $ID_NOTA; 
        private	  $NUMERO_NOTA; 
        private   $FECHA_NOTA;
        private	  $TNOTA;
        private	  $OBSERVACIONES;
        private   $ESTADO;
        private   $ESTADO_REGISTRO;
        private   $INGRESO;
        private   $MODIFICACION;
        private   $ID_ICARGA;
        private   $ID_EMPRESA;
        private   $ID_TEMPORADA;
        private   $ID_USUARIOI;
        private   $ID_USUARIOM;


        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>