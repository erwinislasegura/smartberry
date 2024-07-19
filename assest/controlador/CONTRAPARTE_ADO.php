<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/CONTRAPARTE.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class CONTRAPARTE_ADO
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
    public function listarContraparte()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_contraparte  LIMIT 6;	");
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
    public function listarContraparteCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_contraparte   WHERE  ESTADO_REGISTRO  = 1;	");
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

    public function listarContraparte2CBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_contraparte   WHERE  ESTADO_REGISTRO  = 0;	");
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
    public function verContraparte($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_contraparte  WHERE  ID_CONTRAPARTE = '" . $ID . "';");
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
    public function agregarContraparte(CONTRAPARTE $CONTRAPARTE)
    {
        try {


            if ($CONTRAPARTE->__GET('ID_COMUNA') == NULL) {
                $CONTRAPARTE->__SET('ID_COMUNA', NULL);
            }
            $query =
                "INSERT INTO  fruta_contraparte  
                                                ( 
                                                     NUMERO_CONTRAPARTE , 
                                                     NOMBRE_CONTRAPARTE , 
                                                     DIRECCION_CONTRAPARTE , 
                                                     TELEFONO_CONTRAPARTE , 
                                                     EMAIL_CONTRAPARTE , 
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

                        $CONTRAPARTE->__GET('NUMERO_CONTRAPARTE'),
                        $CONTRAPARTE->__GET('NOMBRE_CONTRAPARTE'),
                        $CONTRAPARTE->__GET('DIRECCION_CONTRAPARTE'),
                        $CONTRAPARTE->__GET('TELEFONO_CONTRAPARTE'),
                        $CONTRAPARTE->__GET('EMAIL_CONTRAPARTE'),
                        $CONTRAPARTE->__GET('ID_COMUNA'),
                        $CONTRAPARTE->__GET('ID_EMPRESA'),
                        $CONTRAPARTE->__GET('ID_USUARIOI'),
                        $CONTRAPARTE->__GET('ID_USUARIOM')


                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarContraparte($id)
    {
        try {
            $sql = "DELETE FROM  fruta_contraparte  WHERE  ID_CONTRAPARTE =" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarContraparte(CONTRAPARTE $CONTRAPARTE)
    {

        try {
            if ($CONTRAPARTE->__GET('ID_COMUNA') == NULL) {
                $CONTRAPARTE->__SET('ID_COMUNA', NULL);
            }
            $query = "
                UPDATE  fruta_contraparte  SET
                    MODIFICACION = SYSDATE(),
                    NOMBRE_CONTRAPARTE  = ?,
                    DIRECCION_CONTRAPARTE  = ?,
                    TELEFONO_CONTRAPARTE  = ?,
                    EMAIL_CONTRAPARTE  = ?,
                    ID_COMUNA = ?,
                    ID_USUARIOM = ?
                WHERE  ID_CONTRAPARTE  = ?  ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $CONTRAPARTE->__GET('NOMBRE_CONTRAPARTE'),
                        $CONTRAPARTE->__GET('DIRECCION_CONTRAPARTE'),
                        $CONTRAPARTE->__GET('TELEFONO_CONTRAPARTE'),
                        $CONTRAPARTE->__GET('EMAIL_CONTRAPARTE'),
                        $CONTRAPARTE->__GET('ID_COMUNA'),
                        $CONTRAPARTE->__GET('ID_USUARIOM'),
                        $CONTRAPARTE->__GET('ID_CONTRAPARTE')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //FUNCIONES ESPECIALIZADAS 
    //CAMBIO DE ESTADO DE LA FILA
    //CAMBIO A DESACTIVADO
    public function deshabilitar(CONTRAPARTE $CONTRAPARTE)
    {

        try {
            $query = "
		UPDATE  fruta_contraparte  SET			
             ESTADO_REGISTRO  = 0
		WHERE  ID_CONTRAPARTE = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $CONTRAPARTE->__GET('ID_CONTRAPARTE')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(CONTRAPARTE $CONTRAPARTE)
    {

        try {
            $query = "
		UPDATE  fruta_contraparte  SET			
             ESTADO_REGISTRO  = 1
		WHERE  ID_CONTRAPARTE = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $CONTRAPARTE->__GET('ID_CONTRAPARTE')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function listarContrapartePorEmpresaCBX($IDEMPRESA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_contraparte   
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
                                                    IFNULL(COUNT(NUMERO_CONTRAPARTE),0) AS 'NUMERO'
                                                FROM  fruta_contraparte 
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
