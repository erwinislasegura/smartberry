<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/EMISIONBL.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class EMISIONBL_ADO
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
    public function listarEmisionbl()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_emisionbl  limit 8;	");
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
    public function listarEmisionblCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_emisionbl  WHERE  ESTADO_REGISTRO  = 1;	");
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



    public function listarEmisionblCBX2()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_emisionbl  WHERE  ESTADO_REGISTRO  = 0;	");
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
    public function verEmisionbl($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_emisionbl  WHERE  ID_EMISIONBL = '" . $ID . "';");
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
    public function buscarNombreEmisionbl($NOMBRE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_emisionbl  WHERE  NOMBRE_EMISIONBL  LIKE '%" . $NOMBRE . "%';");
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
    public function agregarEmisionbl(EMISIONBL $EMISIONBL)
    {
        try {


            $query =
                "INSERT INTO  fruta_emisionbl  
                                            (
                                                 NUMERO_EMISIONBL , 
                                                 NOMBRE_EMISIONBL , 
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

                        $EMISIONBL->__GET('NUMERO_EMISIONBL'),
                        $EMISIONBL->__GET('NOMBRE_EMISIONBL'),
                        $EMISIONBL->__GET('ID_EMPRESA'),
                        $EMISIONBL->__GET('ID_USUARIOI'),
                        $EMISIONBL->__GET('ID_USUARIOM')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarEmisionbl($id)
    {
        try {
            $sql = "DELETE FROM  fruta_emisionbl  WHERE  ID_EMISIONBL =" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }




    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarEmisionbl(EMISIONBL $EMISIONBL)
    {
        try {
            $query = "
                UPDATE  fruta_emisionbl  SET
                    MODIFICACION = SYSDATE(),
                    NOMBRE_EMISIONBL = ?,
                    ID_USUARIOM = ?            
                WHERE  ID_EMISIONBL = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EMISIONBL->__GET('NOMBRE_EMISIONBL'),
                        $EMISIONBL->__GET('ID_USUARIOM'),
                        $EMISIONBL->__GET('ID_EMISIONBL')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //FUNCIONES ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(EMISIONBL $EMISIONBL)
    {

        try {
            $query = "
            UPDATE  fruta_emisionbl  SET			
                    ESTADO_REGISTRO  = 0
            WHERE  ID_EMISIONBL = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EMISIONBL->__GET('ID_EMISIONBL')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(EMISIONBL $EMISIONBL)
    {
        try {
            $query = "
            UPDATE  fruta_emisionbl  SET			
                    ESTADO_REGISTRO  = 1
            WHERE  ID_EMISIONBL = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EMISIONBL->__GET('ID_EMISIONBL')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarEmisionblPorEmpresaCBX($IDEMPRESA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_emisionbl  
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
                                                    IFNULL(COUNT(NUMERO_EMISIONBL),0) AS 'NUMERO'
                                                FROM  fruta_emisionbl 
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
