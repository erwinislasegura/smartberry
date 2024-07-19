<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/NOTIFICADOR.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class NOTIFICADOR_ADO
{
    //ATRIBUTO
    private $conexion;

    //LLAMADO A LA BD Y CONFIGURAR PARAMETROS

    public function __CONSTRUCT()
    {
        try {
            $BDCONFIG = new BDCONFIG();
            $HOST = $BDCONFIG->__GET('HOST');
            $DBNAME = $BDCONFIG->__GET('DBNAME');
            $USER = $BDCONFIG->__GET('USER');
            $PASS = $BDCONFIG->__GET('PASS');


            $this->conexion = new PDO('mysql:host=' . $HOST . ';dbname=' . $DBNAME, $USER, $PASS);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    //FUNCIONES BASICAS 
    //LISTAR TODO CON LIMITE DE 6 FILAS  
    public function listarNotificador()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_notificador  LIMIT 6;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //LISTAR TODO
    public function listarNotificadorCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_notificador   WHERE  ESTADO_REGISTRO  = 1;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarNotificador2CBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_notificador   WHERE  ESTADO_REGISTRO  = 0;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //VER LA INFORMACION RELACIONADA EN BASE AL ID INGRESADO A LA FUNCION
    public function verNotificador($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_notificador  WHERE  ID_NOTIFICADOR = '" . $ID . "';");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    //BUSCAR CONSIDENCIA DE ACUERDO AL CARACTER INGRESADO EN LA FUNCION
    public function buscarNombreNotificador($NOMBRE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_notificador  WHERE  NOMBRE_NOTIFICADOR  LIKE '%" . $NOMBRE . "%';");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //REGISTRO DE UNA NUEVA FILA    
    public function agregarNotificador(NOTIFICADOR $NOTIFICADOR)
    {
        try {


           
            $query =
                "INSERT INTO  fruta_notificador  
                                             (
                                                     NUMERO_NOTIFICADOR ,
                                                     NOMBRE_NOTIFICADOR ,
                                                     EORI_NOTIFICADOR ,
                                                     DIRECCION_NOTIFICADOR ,
                                                     TELEFONO_NOTIFICADOR ,
                                                     CONTACTO1_NOTIFICADOR ,  CARGO1_NOTIFICADOR ,  EMAIL1_NOTIFICADOR , 
                                                     CONTACTO2_NOTIFICADOR ,  CARGO2_NOTIFICADOR ,  EMAIL2_NOTIFICADOR , 
                                                     CONTACTO3_NOTIFICADOR ,  CARGO3_NOTIFICADOR ,  EMAIL3_NOTIFICADOR , 
                                                     ID_EMPRESA , 
                                                     ID_USUARIOI , 
                                                     ID_USUARIOM , 
                                                     INGRESO ,
                                                     MODIFICACION , 
                                                     ESTADO_REGISTRO 
                                            ) 
            VALUES
	       	(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,  SYSDATE() , SYSDATE(), 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $NOTIFICADOR->__GET('NUMERO_NOTIFICADOR'),
                        $NOTIFICADOR->__GET('NOMBRE_NOTIFICADOR'),
                        $NOTIFICADOR->__GET('EORI_NOTIFICADOR'),
                        $NOTIFICADOR->__GET('DIRECCION_NOTIFICADOR'),
                        $NOTIFICADOR->__GET('TELEFONO_NOTIFICADOR'),
                        $NOTIFICADOR->__GET('CONTACTO1_NOTIFICADOR'),
                        $NOTIFICADOR->__GET('CARGO1_NOTIFICADOR'),
                        $NOTIFICADOR->__GET('EMAIL1_NOTIFICADOR'),
                        $NOTIFICADOR->__GET('CONTACTO2_NOTIFICADOR'),
                        $NOTIFICADOR->__GET('CARGO2_NOTIFICADOR'),
                        $NOTIFICADOR->__GET('EMAIL2_NOTIFICADOR'),
                        $NOTIFICADOR->__GET('CONTACTO3_NOTIFICADOR'),
                        $NOTIFICADOR->__GET('CARGO3_NOTIFICADOR'),
                        $NOTIFICADOR->__GET('EMAIL3_NOTIFICADOR'),
                        $NOTIFICADOR->__GET('ID_EMPRESA'),
                        $NOTIFICADOR->__GET('ID_USUARIOI'),
                        $NOTIFICADOR->__GET('ID_USUARIOM')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarNotificador($id)
    {
        try {
            $sql = "DELETE FROM  fruta_notificador  WHERE  ID_NOTIFICADOR =" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarNotificador(NOTIFICADOR $NOTIFICADOR)
    {

        try {

            $query = "
                UPDATE  fruta_notificador  SET
                    MODIFICACION  = SYSDATE() , 
                    NOMBRE_NOTIFICADOR  = ?,
                    EORI_NOTIFICADOR  = ?,
                    DIRECCION_NOTIFICADOR  = ?,
                    TELEFONO_NOTIFICADOR  = ?,
                    CONTACTO1_NOTIFICADOR  = ?,
                    CARGO1_NOTIFICADOR  = ?,
                    EMAIL1_NOTIFICADOR  = ?,
                    CONTACTO2_NOTIFICADOR  = ?,
                    CARGO2_NOTIFICADOR  = ?,
                    EMAIL2_NOTIFICADOR  = ?,
                    CONTACTO3_NOTIFICADOR  = ?,
                    CARGO3_NOTIFICADOR  = ?,
                    EMAIL3_NOTIFICADOR  = ?,
                    ID_USUARIOM = ?
                WHERE  ID_NOTIFICADOR  = ?  ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $NOTIFICADOR->__GET('NOMBRE_NOTIFICADOR'),
                        $NOTIFICADOR->__GET('EORI_NOTIFICADOR'),
                        $NOTIFICADOR->__GET('DIRECCION_NOTIFICADOR'),
                        $NOTIFICADOR->__GET('TELEFONO_NOTIFICADOR'),
                        $NOTIFICADOR->__GET('CONTACTO1_NOTIFICADOR'),
                        $NOTIFICADOR->__GET('CARGO1_NOTIFICADOR'),
                        $NOTIFICADOR->__GET('EMAIL1_NOTIFICADOR'),
                        $NOTIFICADOR->__GET('CONTACTO2_NOTIFICADOR'),
                        $NOTIFICADOR->__GET('CARGO2_NOTIFICADOR'),
                        $NOTIFICADOR->__GET('EMAIL2_NOTIFICADOR'),
                        $NOTIFICADOR->__GET('CONTACTO3_NOTIFICADOR'),
                        $NOTIFICADOR->__GET('CARGO3_NOTIFICADOR'),
                        $NOTIFICADOR->__GET('EMAIL3_NOTIFICADOR'),
                        $NOTIFICADOR->__GET('ID_USUARIOM'),
                        $NOTIFICADOR->__GET('ID_NOTIFICADOR')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //FUNCIONES ESPECIALIZADAS 
    //CAMBIO DE ESTADO DE LA FILA
    //CAMBIO A DESACTIVADO
    public function deshabilitar(NOTIFICADOR $NOTIFICADOR)
    {

        try {
            $query = "
		UPDATE  fruta_notificador  SET			
             ESTADO_REGISTRO  = 0
		WHERE  ID_NOTIFICADOR = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $NOTIFICADOR->__GET('ID_NOTIFICADOR')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(NOTIFICADOR $NOTIFICADOR)
    {

        try {
            $query = "
		UPDATE  fruta_notificador  SET			
             ESTADO_REGISTRO  = 1
		WHERE  ID_NOTIFICADOR = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $NOTIFICADOR->__GET('ID_NOTIFICADOR')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarNotificadorPorEmpresaCBX($IDEMPRESA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_notificador   
                                               WHERE  ESTADO_REGISTRO  = 1
                                               AND ID_EMPRESA = '" . $IDEMPRESA . "' ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtenerNumero($IDEMPRESA)
    {
        try {
            $datos = $this->conexion->prepare(" SELECT  
                                                    IFNULL(COUNT(NUMERO_NOTIFICADOR),0) AS 'NUMERO'
                                                FROM  fruta_notificador 
                                                WHERE ID_EMPRESA = '" . $IDEMPRESA . "'     
                                                ; ");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
