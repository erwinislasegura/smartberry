<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/CVENTA.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';
//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class CVENTA_ADO
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

    public function listarCventa()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_cventa  limit 8;	");
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
    public function listarCventaCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_cventa  WHERE  ESTADO_REGISTRO  = 1;	");
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

    public function listarCventa2CBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_cventa  WHERE  ESTADO_REGISTRO  = 0;	");
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
    public function verCventa($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_cventa  WHERE  ID_CVENTA = '" . $ID . "';");
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
    public function buscarNombreCventa($NOMBRE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_cventa  WHERE  NOMBRE_CVENTA  LIKE '%" . $NOMBRE . "%';");
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
    public function agregarCventa(CVENTA $CVENTA)
    {
        try {


            $query =
                "INSERT INTO  fruta_cventa  (   
                                                 NUMERO_CVENTA , 
                                                 NOMBRE_CVENTA , 
                                                 NOTA_CVENTA , 
                                                 ID_EMPRESA , 
                                                 ID_USUARIOI , 
                                                 ID_USUARIOM , 
                                                 INGRESO ,
                                                 MODIFICACION ,
                                                 ESTADO_REGISTRO 
                                        ) VALUES
	       	( ?, ?, ?, ?, ?, ?, SYSDATE(), SYSDATE(), 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $CVENTA->__GET('NUMERO_CVENTA'),
                        $CVENTA->__GET('NOMBRE_CVENTA'),
                        $CVENTA->__GET('NOTA_CVENTA'),
                        $CVENTA->__GET('ID_EMPRESA'),
                        $CVENTA->__GET('ID_USUARIOI'),
                        $CVENTA->__GET('ID_USUARIOM')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarCventa($id)
    {
        try {
            $sql = "DELETE FROM  fruta_cventa  WHERE  ID_CVENTA =" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }




    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarCventa(CVENTA $CVENTA)
    {
        try {
            $query = "
		UPDATE  fruta_cventa  SET
             MODIFICACION = SYSDATE(),
             NOMBRE_CVENTA = ?  ,
             NOTA_CVENTA = ?    ,
             ID_USUARIOM = ?       
		WHERE  ID_CVENTA = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $CVENTA->__GET('NOMBRE_CVENTA'),
                        $CVENTA->__GET('NOTA_CVENTA'),
                        $CVENTA->__GET('ID_USUARIOM'),
                        $CVENTA->__GET('ID_CVENTA')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //FUNCIONES ESPECIALIZADAS   
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(CVENTA $CVENTA)
    {

        try {
            $query = "
                UPDATE  fruta_cventa  SET			
                        ESTADO_REGISTRO  = 0
                WHERE  ID_CVENTA = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $CVENTA->__GET('ID_CVENTA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(CVENTA $CVENTA)
    {
        try {
            $query = "
            UPDATE  fruta_cventa  SET			
                    ESTADO_REGISTRO  = 1
            WHERE  ID_CVENTA = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $CVENTA->__GET('ID_CVENTA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function listarCventaPorEmpresaCBX($IDEMPRESA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_cventa  
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
                                                    IFNULL(COUNT(NUMERO_CVENTA),0) AS 'NUMERO'
                                                FROM  fruta_cventa 
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
