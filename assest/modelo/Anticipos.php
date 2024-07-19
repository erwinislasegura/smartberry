<?php
    include_once '../../assest/config/BDCONFIG.php';

    class AnticiposModel {
        static public function mdlCrearAnticipo($tabla, $datos)
        {
            try {
                $stmt = BDCONFIG::conectar()->prepare(
                    "INSERT INTO $tabla(id_empresa, hash, id_broker, estado_registro, estado, id_usuario, id_perfil_usuario, observacion, fecha_ingreso, fecha_modificacion, id_temporada) 
                    VALUES (:id_empresa, :hash, :id_broker, :estado_registro, :estado, :id_usuario, :id_perfil_usuario, :observacion, :fecha_ingreso, :fecha_modificacion, :temporada) ");

                $fecha = date('Y-m-d H:i:s');
                $stmt->bindParam(":id_empresa", $datos['id_empresa'], PDO::PARAM_STR);
                $stmt->bindParam(":hash", $datos['hash'], PDO::PARAM_INT);
                $stmt->bindParam(":id_broker", $datos['id_broker'], PDO::PARAM_STR);
                $stmt->bindParam(":estado_registro", $datos['estado_registro'], PDO::PARAM_STR);
                $stmt->bindParam(":estado", $datos['estado'], PDO::PARAM_STR);
                $stmt->bindParam(":id_usuario", $datos['id_usuario'], PDO::PARAM_STR);
                $stmt->bindParam(":temporada", $datos['id_temporada'], PDO::PARAM_STR);
                $stmt->bindParam(":id_perfil_usuario", $datos['id_perfil_usuario'], PDO::PARAM_STR);
                $stmt->bindParam(":observacion", $datos['observacion'], PDO::PARAM_STR);
                $stmt->bindParam(":fecha_ingreso", $datos['fecha_ingreso'], PDO::PARAM_STR);
                $stmt->bindParam(":fecha_modificacion", $datos['fecha_modificacion'], PDO::PARAM_STR);
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

        static public function mdlBuscarAnticipo($tabla,$item,$valor)
        {
            if ($item!=null) {
                $stmt = BDCONFIG::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
                $stmt->bindParam(":".$item,$valor, PDO::PARAM_STR);
                $stmt->execute();

                $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $stmt = null;
                return $retorno;
            }
        }

        static public function mdlListarAnticipos($tabla)
        {
            $stmt = BDCONFIG::conectar()->prepare("SELECT * FROM $tabla WHERE estado_registro = 1 and id_empresa = :empresa");
            $stmt->bindParam(':empresa', $_SESSION['ID_EMPRESA'], PDO::PARAM_STR);
            $stmt->execute();
            $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt = null;
            return $retorno;
        }

        static public function mdlGetDetalleAnticipo($tabla, $item, $valor)
        {
            $stmt = BDCONFIG::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":".$item,$valor, PDO::PARAM_STR);
            $stmt->execute();

            $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt = null;
            return $retorno;
        }

        static public function mdlCrearDetalleAnticipo($tabla, $datos)
        {
            try {
                $stmt = BDCONFIG::conectar()->prepare("INSERT INTO $tabla (id_anticipo, nombre_anticipo, moneda, fecha_anticipo, valor_anticipo)  VALUES (:id_anticipo, :nombre_anticipo, :moneda, :fecha_anticipo, :valor_anticipo ) ");

                $stmt->bindParam(":id_anticipo", $datos['id_anticipo'], PDO::PARAM_STR);
                $stmt->bindParam(":nombre_anticipo", $datos['nombre_anticipo'], PDO::PARAM_STR);
                $stmt->bindParam(":moneda", $datos['moneda'], PDO::PARAM_STR);
                $stmt->bindParam(":fecha_anticipo", $datos['fecha_anticipo'], PDO::PARAM_STR);
                $stmt->bindParam(":valor_anticipo", $datos['valor_anticipo'], PDO::PARAM_STR);
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

        static public function mdlGetSumaAnticipos($tabla, $item, $valor){
            $stmt = BDCONFIG::conectar()->prepare("SELECT SUM($item) as suma FROM $tabla WHERE id_anticipo = :item");
            $stmt->bindParam(":item",$valor, PDO::PARAM_STR);
            $stmt->execute();

            $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt = null;
            return $retorno[0]['suma'];
        }

        static public function mdlEliminarAnticipoAjax($tabla, $item, $valor){
            try {
                $stmt = BDCONFIG::conectar()->prepare("DELETE from $tabla WHERE $item = :detalle_anticipo");
                $stmt->bindParam(":detalle_anticipo",$valor, PDO::PARAM_STR);
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

        static public function getHeaderAnticipo($tabla, $empresa, $broker, $temporada)
        {

        }
    }

?>