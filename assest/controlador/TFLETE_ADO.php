<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/TFLETE.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class TFLETE_ADO
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
    public function listarTflete()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_tflete  limit 8;	");
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
    public function listarTfleteCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_tflete  WHERE  ESTADO_REGISTRO = 1 ;	");
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

    public function listarTflete2CBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_tflete  WHERE  ESTADO_REGISTRO = 0;	");
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
    public function verTflete($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_tflete  WHERE  ID_TFLETE = '" . $ID . "';");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
        	//var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    //BUSCAR CONSIDENCIA DE ACUERDO AL CARACTER INGRESADO EN LA FUNCION
    public function buscarNombreTflete($NOMBRE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_tflete  WHERE  NOMBRE_TFLETE  LIKE '%" . $NOMBRE . "%';");
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
    public function agregarTflete(TFLETE $TFLETE)
    {
        try {


            $query =
                "INSERT INTO  fruta_tflete  (
                                             NUMERO_TFLETE , 
                                             NOMBRE_TFLETE , 
                                             ID_EMPRESA , 
                                             ID_USUARIOI , 
                                             ID_USUARIOM ,
                                             INGRESO,
                                             MODIFICACION,
                                             ESTADO_REGISTRO 
                                        ) VALUES
	       	( ?, ?, ?, ?, ?,  SYSDATE() , SYSDATE(),  1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $TFLETE->__GET('NUMERO_TFLETE'),
                        $TFLETE->__GET('NOMBRE_TFLETE'),
                        $TFLETE->__GET('ID_EMPRESA'),
                        $TFLETE->__GET('ID_USUARIOI'),
                        $TFLETE->__GET('ID_USUARIOM')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarTflete($id)
    {
        try {
            $sql = "DELETE FROM  fruta_tflete  WHERE  ID_TFLETE =" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }




    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarTflete(TFLETE $TFLETE)
    {
        try {
            $query = "
		UPDATE  fruta_tflete  SET
             MODIFICACION= SYSDATE(),
             NOMBRE_TFLETE = ?,
             ID_USUARIOM = ?            
		WHERE  ID_TFLETE = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $TFLETE->__GET('NOMBRE_TFLETE'),
                        $TFLETE->__GET('ID_USUARIOM'),
                        $TFLETE->__GET('ID_TFLETE')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //FUNCIONES ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(TFLETE $TFLETE)
    {

        try {
            $query = "
    UPDATE  fruta_tflete  SET			
             ESTADO_REGISTRO  = 0
    WHERE  ID_TFLETE = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $TFLETE->__GET('ID_TFLETE')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(TFLETE $TFLETE)
    {
        try {
            $query = "
    UPDATE  fruta_tflete  SET			
             ESTADO_REGISTRO  = 1
    WHERE  ID_TFLETE = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $TFLETE->__GET('ID_TFLETE')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function listarTfletePorEmpresaCBX($IDEMPRESA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_tflete  
                                             WHERE  ESTADO_REGISTRO = 1 
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
                                                IFNULL(COUNT(NUMERO_TFLETE),0) AS 'NUMERO'
                                            FROM  fruta_tflete 
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
