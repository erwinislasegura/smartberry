<?php
    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    include_once '../../assest/config/BDCONFIG.php';

    //ESTRUCTURA DE LA CLASE
    class BROKER {
        const TABLA = 'fruta_broker';
        //ATRIBUTOS DE LA CLASE    
        private	  $ID_BROKER; 
        private	  $NUMERO_BROKER;
        private	  $NOMBRE_BROKER;
        private	  $EORI_BROKER;
        private	  $DIRECCION_BROKER;
        private   $CONTACTO1_BROKER;
        private   $CARGO1_BROKER;
        private   $EMAIL1_BROKER;
        private   $CONTACTO2_BROKER;
        private   $CARGO2_BROKER;
        private   $EMAIL2_BROKER;
        private   $CONTACTO3_BROKER;
        private   $CARGO3_BROKER;
        private   $EMAIL3_BROKER;
        private   $ESTADO_REGISTRO;
        private	  $ID_EMPRESA; 
        private	  $ID_USUARIOI; 
        private	  $ID_USUARIOM; 
        
        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }

        static public function mdlIndexBroker($tabla, $item, $value)
        {
            $stmt = BDCONFIG::conectar()->prepare("SELECT * FROM $tabla WHERE ID_EMPRESA = :$item");
            $stmt->bindParam(":".$item,$value, PDO::PARAM_STR);
            $stmt->execute();
            $brokers = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt = null;
            return $brokers;
        }

        static public function mdlGetBrokerName($id) :string
        {
            $stmt = BDCONFIG::conectar()->prepare("SELECT * FROM ".self::TABLA." WHERE ID_BROKER = :id");
            $stmt->bindParam(":id",$id, PDO::PARAM_STR);
            $stmt->execute();
            $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt = null;
            return $retorno[0]['NOMBRE_BROKER'];
        }

        static public function mdlGetBroker($id)
        {
            $stmt = BDCONFIG::conectar()->prepare("SELECT * FROM ".self::TABLA." WHERE ID_BROKER = :id");
            $stmt->bindParam(":id",$id, PDO::PARAM_STR);
            $stmt->execute();
            $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt = null;
            return $retorno;
        }
    }
?>