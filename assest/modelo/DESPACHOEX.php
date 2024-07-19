<?php

    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class DESPACHOEX {
        
        //ATRIBUTOS DE LA CLASE
        private	  $ID_DESPACHOEX; 
        private   $NUMERO_DESPACHOEX;
        private   $FECHA_DESPACHOEX;
        private   $SNICARGA;
        private   $NUMERO_SELLO_DESPACHOEX;
        private   $FECHA_GUIA_DESPACHOEX;
        private   $NUMERO_GUIA_DESPACHOEX;
        private   $NUMERO_CONTENEDOR_DESPACHOEX;
        private   $NUMERO_PLANILLA_DESPACHOEX;
        private	  $TERMOGRAFO_DESPACHOEX;
        private	  $VGM;
        private   $TEMBARQUE_DESPACHOEX;
        private   $BOOKING_DESPACHOEX;
        private   $FECHAETD_DESPACHOEX;
        private   $FECHAETA_DESPACHOEX;
        private   $CRT_DESPACHOEX;
        private   $FECHASTACKING_DESPACHOEX;
        private   $NVIAJE_DESPACHOEX;
        private   $NAVE_DESPACHOEX;
        private   $PATENTE_CAMION;
        private   $PATENTE_CARRO;
        private   $CANTIDAD_ENVASE_DESPACHOEX;
        private   $KILOS_NETO_DESPACHOEX;
        private   $KILOS_BRUTO_DESPACHOEX;
        private	  $OBSERVACION_DESPACHOEX;
        private	  $TINPUSDA;
        private   $ESTADO;
        private   $ESTADO_REGISTRO;
        private   $INGRESO;
        private   $MODIFICACION;            
        private   $ID_ICARGA;
        private   $ID_EXPPORTADORA;
        private   $ID_DFINAL;
        private   $ID_AGCARGA;
        private   $ID_INPECTOR;
        private   $ID_RFINAL;
        private   $ID_MERCADO;
        private   $ID_PAIS;
        private   $ID_TRANSPORTE2;
        private   $ID_LCARGA;
        private   $ID_LDESTINO;
        private   $ID_LAREA;
        private   $ID_ACARGA;
        private   $ID_ADESTINO;
        private   $ID_NAVIERA;
        private   $ID_PCARGA;
        private   $ID_PDESTINO;        
        private   $ID_TRANSPORTE;
        private   $ID_CONDUCTOR;
        private   $ID_CONTRAPARTE;
        private   $ID_EMPRESA;
        private   $ID_PLANTA;
        private   $ID_TEMPORADA;
        private   $ID_USUARIOI;
        private   $ID_USUARIOM;       


        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>