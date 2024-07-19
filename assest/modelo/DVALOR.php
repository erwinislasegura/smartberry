<?php
    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    include_once '../../assest/config/BDCONFIG.php';

    //ESTRUCTURA DE LA CLASE
    class DVALOR {

        const TABLA = 'liquidacion_dvalor';
        
        //ATRIBUTOS DE LA CLASE    
        private	  $ID_DVALOR; 
        private	  $VALOR_DVALOR;
        private   $DETALLE;
        private	  $ESTADO;
        private   $ESTADO_REGISTRO;
        private	  $INGRESO;
        private	  $MODIFICACION;
        private   $ID_VALOR;
        private   $ID_TITEM;
        private   $ID_USUARIOI;
        private   $ID_USUARIOM;
        
        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }


        static public function mdlAgregarFlete($datos){
            try {
                $stmt = BDCONFIG::conectar()->prepare("INSERT INTO ".self::TABLA."( VALOR_DVALOR, DETALLE, ESTADO, ESTADO_REGISTRO, INGRESO, MODIFICACION, ID_VALOR, ID_TITEM, ID_USUARIOI, ID_USUARIOM ) VALUES ( :valor, :detalle, :estado, :estado_registro, :ingreso, :modificacion, :id_valor, :id_item, :id_usuarioi, :id_usuariom)");

                $fecha = date('Y-m-d H:i:s');
                $stmt->bindParam(":valor", $datos['valor'], PDO::PARAM_STR);
                $stmt->bindParam(":detalle", $datos['detalle'], PDO::PARAM_INT);
                $stmt->bindParam(":estado", $datos['estado'], PDO::PARAM_STR);
                $stmt->bindParam(":estado_registro", $datos['estado_registro'], PDO::PARAM_STR);
                $stmt->bindParam(":ingreso", $datos['ingreso'], PDO::PARAM_STR);
                $stmt->bindParam(":modificacion", $datos['modificacion'], PDO::PARAM_STR);
                $stmt->bindParam(":id_valor", $datos['id_valor'], PDO::PARAM_STR);
                $stmt->bindParam(":id_item", $datos['id_titem'], PDO::PARAM_STR);
                $stmt->bindParam(":id_usuarioi", $datos['id_usuarioi'], PDO::PARAM_STR);
                $stmt->bindParam(":id_usuariom", $datos['id_usuariom'], PDO::PARAM_STR);
                $stmt->execute();
            } catch (PDOException $e) {
                $error = $e->getMessage();
            }

            $stmt = null;

            if (isset($error)) {
                return $error;
            } else {
                return 'ok';
            }
        }

        static public function isFleteIncluded($id): bool {
            $stmt = BDCONFIG::conectar()->prepare("SELECT * FROM ".self::TABLA." WHERE ID_TITEM = 3 AND ID_VALOR = :id_valor");
            $stmt->bindParam(":id_valor", $id, PDO::PARAM_INT);
            $stmt->execute();
            $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (count($retorno) == 0) {
                return false;
            } else {
                return true;
            }
        }

        static public function searchFlete($id): int {
            $stmt = BDCONFIG::conectar()->prepare("SELECT * FROM fruta_icarga WHERE ID_ICARGA = :id_valor");
            $stmt->bindParam(":id_valor", $id, PDO::PARAM_INT);
            $stmt->execute();
            $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt = null;
            return $retorno[0]['COSTO_FLETE_ICARGA'];
        }
    }
?>