<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/INPECTOR.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class INPECTOR_ADO
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
    public function listarInpector()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_inpector  LIMIT 6;	");
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
    public function listarInpectorCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_inpector   WHERE  ESTADO_REGISTRO  = 1;	");
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

    public function listarInpector2CBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_inpector   WHERE  ESTADO_REGISTRO  = 0;	");
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
    public function verInpector($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_inpector  WHERE  ID_INPECTOR = '" . $ID . "';");
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
    public function agregarInpector(INPECTOR $INPECTOR)
    {
        try {

            if ($INPECTOR->__GET('ID_COMUNA') == NULL) {
                $INPECTOR->__SET('ID_COMUNA', NULL);
            }
            $query =
                "INSERT INTO  fruta_inpector  
                                        ( 
                                             NUMERO_INPECTOR , 
                                             NOMBRE_INPECTOR , 
                                             DIRECCION_INPECTOR , 
                                             TELEFONO_INPECTOR , 
                                             EMAIL_INPECTOR , 
                                             ID_COMUNA  , 
                                             ID_EMPRESA , 
                                             ID_USUARIOI , 
                                             ID_USUARIOM ,  
                                             INGRESO ,
                                             MODIFICACION , 
                                             ESTADO_REGISTRO 
                                        ) 
            VALUES
	       	(?, ?, ?, ?, ?, ?, ?, ?, ?, SYSDATE() , SYSDATE(),  1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $INPECTOR->__GET('NUMERO_INPECTOR'),
                        $INPECTOR->__GET('NOMBRE_INPECTOR'),
                        $INPECTOR->__GET('DIRECCION_INPECTOR'),
                        $INPECTOR->__GET('TELEFONO_INPECTOR'),
                        $INPECTOR->__GET('EMAIL_INPECTOR'),
                        $INPECTOR->__GET('ID_COMUNA'),
                        $INPECTOR->__GET('ID_EMPRESA'),
                        $INPECTOR->__GET('ID_USUARIOI'),
                        $INPECTOR->__GET('ID_USUARIOM')


                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarInpector($id)
    {
        try {
            $sql = "DELETE FROM  fruta_inpector  WHERE  ID_INPECTOR =" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarInpector(INPECTOR $INPECTOR)
    {

        try {
            if ($INPECTOR->__GET('ID_COMUNA') == NULL) {
                $INPECTOR->__SET('ID_COMUNA', NULL);
            }
            $query = "
                UPDATE  fruta_inpector  SET
                    MODIFICACION = SYSDATE(),
                    NOMBRE_INPECTOR  = ?,
                    DIRECCION_INPECTOR  = ?,
                    TELEFONO_INPECTOR  = ?,
                    EMAIL_INPECTOR  = ?,
                    ID_COMUNA = ?,
                    ID_USUARIOM = ?
                WHERE  ID_INPECTOR  = ?  ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $INPECTOR->__GET('NOMBRE_INPECTOR'),
                        $INPECTOR->__GET('DIRECCION_INPECTOR'),
                        $INPECTOR->__GET('TELEFONO_INPECTOR'),
                        $INPECTOR->__GET('EMAIL_INPECTOR'),
                        $INPECTOR->__GET('ID_COMUNA'),
                        $INPECTOR->__GET('ID_USUARIOM'),
                        $INPECTOR->__GET('ID_INPECTOR')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //FUNCIONES ESPECIALIZADAS 
    //CAMBIO DE ESTADO DE LA FILA
    //CAMBIO A DESACTIVADO
    public function deshabilitar(INPECTOR $INPECTOR)
    {

        try {
            $query = "
		UPDATE  fruta_inpector  SET			
             ESTADO_REGISTRO  = 0
		WHERE  ID_INPECTOR = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $INPECTOR->__GET('ID_INPECTOR')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(INPECTOR $INPECTOR)
    {

        try {
            $query = "
		UPDATE  fruta_inpector  SET			
             ESTADO_REGISTRO  = 1
		WHERE  ID_INPECTOR = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $INPECTOR->__GET('ID_INPECTOR')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarInpectorPorEmpresaCBX($IDEMPRESA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_inpector   
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
                                                    IFNULL(COUNT(NUMERO_INPECTOR),0) AS 'NUMERO'
                                                FROM  fruta_inpector 
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
