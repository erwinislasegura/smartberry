<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/FPAGO.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class FPAGO_ADO
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
    public function listarFpago()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_fpago  limit 8;	");
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
    public function listarFpagoCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_fpago  WHERE ESTADO_REGISTRO = 1;	");
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

    public function listarFpago2CBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_fpago  WHERE ESTADO_REGISTRO = 0;	");
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
    public function verFpago($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_fpago  WHERE  ID_FPAGO = '" . $ID . "';");
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
    public function buscarNombreFpago($NOMBRE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_fpago  WHERE  NOMBRE_FPAGO  LIKE '%" . $NOMBRE . "%';");
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
    public function agregarFpago(FPAGO $FPAGO)
    {
        try {


            $query =
                "INSERT INTO  fruta_fpago  (
                                                 NUMERO_FPAGO ,
                                                 NOMBRE_FPAGO ,
                                                 FECHA_PAGO_FPAGO , 
                                                 ID_EMPRESA , 
                                                 ID_USUARIOI , 
                                                 ID_USUARIOM , 
                                                 INGRESO ,
                                                 MODIFICACION ,
                                                 ESTADO_REGISTRO 
                                            ) VALUES
	       	( ?, ?, ?, ?, ?, ?,  SYSDATE(), SYSDATE(), 1);";

//echo $query;
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $FPAGO->__GET('NUMERO_FPAGO'),
                        $FPAGO->__GET('NOMBRE_FPAGO'),
                        $FPAGO->__GET('FECHA_PAGO_FPAGO'),
                        $FPAGO->__GET('ID_EMPRESA'),
                        $FPAGO->__GET('ID_USUARIOI'),
                        $FPAGO->__GET('ID_USUARIOM')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarFpago($id)
    {
        try {
            $sql = "DELETE FROM  fruta_fpago  WHERE  ID_FPAGO =" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }




    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarFpago(FPAGO $FPAGO)
    {
        try {
            $query = "
		UPDATE  fruta_fpago  SET
             MODIFICACION = SYSDATE(),
             NOMBRE_FPAGO = ?,
             FECHA_PAGO_FPAGO = ?   ,
             ID_USUARIOM = ?          
		WHERE  ID_FPAGO = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $FPAGO->__GET('NOMBRE_FPAGO'),
                        $FPAGO->__GET('FECHA_PAGO_FPAGO'),
                        $FPAGO->__GET('ID_USUARIOM'),
                        $FPAGO->__GET('ID_FPAGO')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //FUNCIONES ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(FPAGO $FPAGO)
    {

        try {
            $query = "
    UPDATE  fruta_fpago  SET			
             ESTADO_REGISTRO  = 0
    WHERE  ID_FPAGO = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $FPAGO->__GET('ID_FPAGO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(FPAGO $FPAGO)
    {
        try {
            $query = "
    UPDATE  fruta_fpago  SET			
             ESTADO_REGISTRO  = 1
    WHERE  ID_FPAGO = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $FPAGO->__GET('ID_FPAGO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function obtenerFecha()
    {
        try {

            $datos = $this->conexion->prepare("SELECT CURDATE() AS 'FECHA';");
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


    public function listarFpagoPorEmpresaCBX($IDEMPRESA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_fpago  
                                            WHERE ESTADO_REGISTRO = 1
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
                                                    IFNULL(COUNT(NUMERO_FPAGO),0) AS 'NUMERO'
                                                FROM  fruta_fpago 
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
