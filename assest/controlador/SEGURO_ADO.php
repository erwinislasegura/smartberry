<?php


include_once '../../assest/modelo/SEGURO.php';
include_once '../../assest/config/BDCONFIG.php';

$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

class SEGURO_ADO
{


    private $conexion;


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



    public function listarSeguro()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_seguro  limit 8;	");
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
    public function listarSeguroCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_seguro  WHERE  ESTADO_REGISTRO  = 1;	");
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

    public function listarSeguro2CBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_seguro  WHERE  ESTADO_REGISTRO  = 0;	");
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




    public function verSeguro($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_seguro  WHERE  ID_SEGURO = '" . $ID . "';");
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



    public function buscarNombreSeguro($NOMBRE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_seguro  WHERE  NOMBRE_SEGURO  LIKE '%" . $NOMBRE . "%';");
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



    public function agregarSeguro(SEGURO $SEGURO)
    {
        try {


            $query =
                "INSERT INTO  fruta_seguro  (
                                             NUMERO_SEGURO ,       
                                             NOMBRE_SEGURO ,                                               
                                             ESTIMADO_SEGURO ,
                                             REAL_SEGURO ,
                                             SUMA_SEGURO ,     
                                             ID_EMPRESA , 
                                             ID_USUARIOI , 
                                             ID_USUARIOM ,    
                                             INGRESO ,
                                             MODIFICACION ,                           
                                             ESTADO_REGISTRO 
                                      ) VALUES
	       	( ?, ?, ?, ?, ?, ?, ?, ?, SYSDATE(), SYSDATE(),  1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $SEGURO->__GET('NUMERO_SEGURO'),
                        $SEGURO->__GET('NOMBRE_SEGURO'),
                        $SEGURO->__GET('ESTIMADO_SEGURO'),
                        $SEGURO->__GET('REAL_SEGURO'),
                        $SEGURO->__GET('SUMA_SEGURO'),
                        $SEGURO->__GET('ID_EMPRESA'),
                        $SEGURO->__GET('ID_USUARIOI'),
                        $SEGURO->__GET('ID_USUARIOM')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function eliminarSeguro($id)
    {
        try {
            $sql = "DELETE FROM  fruta_seguro  WHERE  ID_SEGURO =" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function actualizarSeguro(SEGURO $SEGURO)
    {
        try {
            $query = "
                UPDATE  fruta_seguro  SET
                    MODIFICACION = SYSDATE(),
                    NOMBRE_SEGURO = ?,
                    ESTIMADO_SEGURO = ?,
                    REAL_SEGURO = ?,
                    SUMA_SEGURO = ? ,
                    ID_USUARIOM = ?            
                WHERE  ID_SEGURO = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $SEGURO->__GET('NOMBRE_SEGURO'),
                        $SEGURO->__GET('ESTIMADO_SEGURO'),
                        $SEGURO->__GET('REAL_SEGURO'),
                        $SEGURO->__GET('SUMA_SEGURO'),
                        $SEGURO->__GET('ID_USUARIOM'),
                        $SEGURO->__GET('ID_SEGURO')

                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //FUNCIONES ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(SEGURO $SEGURO)
    {

        try {
            $query = "
    UPDATE  fruta_seguro  SET			
             ESTADO_REGISTRO  = 0
    WHERE  ID_SEGURO = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $SEGURO->__GET('ID_SEGURO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(SEGURO $SEGURO)
    {
        try {
            $query = "
    UPDATE  fruta_seguro  SET			
             ESTADO_REGISTRO  = 1
    WHERE  ID_SEGURO = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $SEGURO->__GET('ID_SEGURO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarSeguroPorEmpressCBX($IDEMPRESA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_seguro  
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
                                                    IFNULL(COUNT(NUMERO_SEGURO),0) AS 'NUMERO'
                                                FROM  fruta_seguro 
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
