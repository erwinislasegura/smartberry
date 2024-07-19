<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/TPROCESO.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class TPROCESO_ADO
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
    public function listarTproceso()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_tproceso  limit 8;	");
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
    public function listarTprocesoCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_tproceso  WHERE  ESTADO_REGISTRO  = 1;	");
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
    public function listarTproceso2CBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_tproceso  WHERE  ESTADO_REGISTRO  = 0;	");
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
    public function verTproceso($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_tproceso  WHERE  ID_TPROCESO = '" . $ID . "';");
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
    public function buscarNombreTproceso($NOMBRE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_tproceso  WHERE  NOMBRE_TPROCESO  LIKE '%" . $NOMBRE . "%';");
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
    public function agregarTproceso(TPROCESO $TPROCESO)
    {
        try {


            $query =
                "INSERT INTO  fruta_tproceso  (
                                             NOMBRE_TPROCESO , 
                                             ID_USUARIOI , 
                                             ID_USUARIOM , 
                                             INGRESO,
                                             MODIFICACION,
                                             ESTADO_REGISTRO 
                                        ) VALUES
	       	( ?, ?, ?,  SYSDATE() , SYSDATE(), 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $TPROCESO->__GET('NOMBRE_TPROCESO'),
                        $TPROCESO->__GET('ID_USUARIOI'),
                        $TPROCESO->__GET('ID_USUARIOM')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarTproceso($id)
    {
        try {
            $sql = "DELETE FROM  fruta_tproceso  WHERE  ID_TPROCESO =" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }




    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarTproceso(TPROCESO $TPROCESO)
    {
        try {
            $query = "
                UPDATE  fruta_tproceso  SET        
                    MODIFICACION= SYSDATE(),
                    NOMBRE_TPROCESO = ? ,   
                    ID_USUARIOM = ?         
                WHERE  ID_TPROCESO = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $TPROCESO->__GET('NOMBRE_TPROCESO'),
                        $TPROCESO->__GET('ID_USUARIOM'),
                        $TPROCESO->__GET('ID_TPROCESO')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //FUNCIONES ESPECIALIZADAS  
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(TPROCESO $TPROCESO)
    {

        try {
            $query = "
    UPDATE  fruta_tproceso  SET			
             ESTADO_REGISTRO  = 0
    WHERE  ID_TPROCESO = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $TPROCESO->__GET('ID_TPROCESO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(TPROCESO $TPROCESO)
    {
        try {
            $query = "
    UPDATE  fruta_tproceso  SET			
             ESTADO_REGISTRO  = 1
    WHERE  ID_TPROCESO = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $TPROCESO->__GET('ID_TPROCESO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
