<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/ATMOSFERA.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class ATMOSFERA_ADO
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
    public function listarAtmosfera()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_atmosfera  limit 8;	");
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
    public function listarAtmosferaCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_atmosfera  WHERE  ESTADO_REGISTRO  = 1;	");
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



    public function listarAtmosferaCBX2()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_atmosfera  WHERE  ESTADO_REGISTRO  = 0;	");
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
    public function verAtmosfera($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_atmosfera  WHERE  ID_ATMOSFERA = '" . $ID . "';");
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
    public function buscarNombreAtmosfera($NOMBRE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_atmosfera  WHERE  NOMBRE_ATMOSFERA  LIKE '%" . $NOMBRE . "%';");
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
    public function agregarAtmosfera(ATMOSFERA $ATMOSFERA)
    {
        try {


            $query =
                "INSERT INTO  fruta_atmosfera  
                                            (
                                                 NUMERO_ATMOSFERA , 
                                                 NOMBRE_ATMOSFERA , 
                                                 ID_EMPRESA , 
                                                 ID_USUARIOI , 
                                                 ID_USUARIOM , 
                                                 INGRESO ,
                                                 MODIFICACION ,
                                                 ESTADO_REGISTRO 
                                            ) VALUES
	       	( ?, ?, ?, ?,  ?,  SYSDATE(), SYSDATE(),  1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $ATMOSFERA->__GET('NUMERO_ATMOSFERA'),
                        $ATMOSFERA->__GET('NOMBRE_ATMOSFERA'),
                        $ATMOSFERA->__GET('ID_EMPRESA'),
                        $ATMOSFERA->__GET('ID_USUARIOI'),
                        $ATMOSFERA->__GET('ID_USUARIOM')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarAtmosfera($id)
    {
        try {
            $sql = "DELETE FROM  fruta_atmosfera  WHERE  ID_ATMOSFERA =" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }




    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarAtmosfera(ATMOSFERA $ATMOSFERA)
    {
        try {
            $query = "
                UPDATE  fruta_atmosfera  SET
                    MODIFICACION = SYSDATE(),
                    NOMBRE_ATMOSFERA = ?,
                    ID_USUARIOM = ?            
                WHERE  ID_ATMOSFERA = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $ATMOSFERA->__GET('NOMBRE_ATMOSFERA'),
                        $ATMOSFERA->__GET('ID_USUARIOM'),
                        $ATMOSFERA->__GET('ID_ATMOSFERA')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //FUNCIONES ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(ATMOSFERA $ATMOSFERA)
    {

        try {
            $query = "
            UPDATE  fruta_atmosfera  SET			
                    ESTADO_REGISTRO  = 0
            WHERE  ID_ATMOSFERA = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $ATMOSFERA->__GET('ID_ATMOSFERA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(ATMOSFERA $ATMOSFERA)
    {
        try {
            $query = "
            UPDATE  fruta_atmosfera  SET			
                    ESTADO_REGISTRO  = 1
            WHERE  ID_ATMOSFERA = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $ATMOSFERA->__GET('ID_ATMOSFERA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarAtmosferaPorEmpresaCBX($IDEMPRESA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_atmosfera  
                                             WHERE  ESTADO_REGISTRO  = 1
                                            AND ID_EMPRESA = '" . $IDEMPRESA . "';	");
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
                                                    IFNULL(COUNT(NUMERO_ATMOSFERA),0) AS 'NUMERO'
                                                FROM  fruta_atmosfera 
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
