<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/DFINAL.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class DFINAL_ADO
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
    public function listarDfinal()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_dfinal  limit 8;	");
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
    public function listarDfinalCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_dfinal  WHERE  ESTADO_REGISTRO  = 1;	");
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
    public function listarDfinal2CBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_dfinal  WHERE  ESTADO_REGISTRO  = 0;	");
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
    public function verDfinal($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_dfinal  WHERE  ID_DFINAL = '" . $ID . "';");
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
    public function buscarNombreDfinal($NOMBRE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_dfinal  WHERE  NOMBRE_DFINAL  LIKE '%" . $NOMBRE . "%';");
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
    public function agregarDfinal(DFINAL $DFINAL)
    {
        try {


            $query =
                "INSERT INTO  fruta_dfinal  
                                        (
                                                 NUMERO_DFINAL , 
                                                 NOMBRE_DFINAL , 
                                                 ID_EMPRESA , 
                                                 ID_USUARIOI , 
                                                 ID_USUARIOM ,
                                                 INGRESO ,
                                                 MODIFICACION ,
                                                 ESTADO_REGISTRO 
                                        ) VALUES
	       	( ?, ?, ?, ?, ?, SYSDATE(), SYSDATE(), 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $DFINAL->__GET('NUMERO_DFINAL'),
                        $DFINAL->__GET('NOMBRE_DFINAL'),
                        $DFINAL->__GET('ID_EMPRESA'),
                        $DFINAL->__GET('ID_USUARIOI'),
                        $DFINAL->__GET('ID_USUARIOM')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarDfinal($id)
    {
        try {
            $sql = "DELETE FROM  fruta_dfinal  WHERE  ID_DFINAL =" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }




    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarDfinal(DFINAL $DFINAL)
    {
        try {
            $query = "
		UPDATE  fruta_dfinal  SET
             MODIFICACION = SYSDATE(),
             NOMBRE_DFINAL = ?  ,
             ID_USUARIOM = ?         
		WHERE  ID_DFINAL = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DFINAL->__GET('NOMBRE_DFINAL'),
                        $DFINAL->__GET('ID_USUARIOM'),
                        $DFINAL->__GET('ID_DFINAL')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //FUNCIONES ESPECIALIZADAS  
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(DFINAL $DFINAL)
    {

        try {
            $query = "
    UPDATE  fruta_dfinal  SET			
             ESTADO_REGISTRO  = 0
    WHERE  ID_DFINAL = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DFINAL->__GET('ID_DFINAL')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(DFINAL $DFINAL)
    {
        try {
            $query = "
    UPDATE  fruta_dfinal  SET			
             ESTADO_REGISTRO  = 1
    WHERE  ID_DFINAL = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DFINAL->__GET('ID_DFINAL')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function validar2($NOMBREDFINAL, $NOMBREDFINALV)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_dfinal  WHERE  NOMBRE_DFINAL  LIKE '%" . $NOMBREDFINAL . "%' AND  NOMBRE_DFINAL  LIKE '%" . $NOMBREDFINALV . "%' ;");
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
    public function validar1($NOMBREDFINAL)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_dfinal  WHERE  NOMBRE_DFINAL  LIKE '%" . $NOMBREDFINAL . "%';");
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

    public function listarDfinalPorEmpresaCBX($IDEMPRESA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_dfinal  
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
                                                    IFNULL(COUNT(NUMERO_DFINAL),0) AS 'NUMERO'
                                                FROM  fruta_dfinal 
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
