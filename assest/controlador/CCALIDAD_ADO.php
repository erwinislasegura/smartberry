<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/CCALIDAD.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class CCALIDAD_ADO
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
    //LISTAR TODO CON LIMITE DE 8 FILAS
    public function listarCcalidad()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_ccalidad LIMIT 6;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //LISTAR TODO
    public function listarCcalidadCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_ccalidad WHERE ESTADO_REGISTRO = 1;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function listarCcalida2dCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_ccalidad WHERE ESTADO_REGISTRO = 0;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //VER LA INFORMACION RELACIONADA EN BASE AL ID INGRESADO A LA FUNCION
    public function verCcalidad($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_ccalidad WHERE ID_CCALIDAD= '" . $ID . "';");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    //BUSCAR CONSIDENCIA DE ACUERDO AL CARACTER INGRESADO EN LA FUNCION
    public function buscarNombreCcalidad($NOMBRE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_ccalidad WHERE NOMBRE_CCALIDAD LIKE '%" . $NOMBRE . "%';");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //REGISTRO DE UNA NUEVA FILA   
    public function agregarCcalidad(CCALIDAD $CCALIDAD)
    {
        try {


            $query =
                "INSERT INTO fruta_ccalidad 
                                            ( 
                                                NUMERO_CCALIDAD, 
                                                NOMBRE_CCALIDAD, 
                                                RGB_CCALIDAD, 
                                                ID_EMPRESA, 
                                                ID_USUARIOI, 
                                                ID_USUARIOM, 
                                                INGRESO ,
                                                MODIFICACION , 
                                                ESTADO_REGISTRO
                                            ) VALUES
	       	(?, ?, ?, ?, ?, ?,  SYSDATE() , SYSDATE(), 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $CCALIDAD->__GET('NUMERO_CCALIDAD'),
                        $CCALIDAD->__GET('NOMBRE_CCALIDAD'),
                        $CCALIDAD->__GET('RGB_CCALIDAD'),
                        $CCALIDAD->__GET('ID_EMPRESA'),
                        $CCALIDAD->__GET('ID_USUARIOI'),
                        $CCALIDAD->__GET('ID_USUARIOM')



                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarCcalidad(CCALIDAD $CCALIDAD)
    {

        try {
            $query = "
                UPDATE fruta_ccalidad SET
                    MODIFICACION = SYSDATE(),
                    NOMBRE_CCALIDAD = ?,
                    RGB_CCALIDAD= ?,
                    ID_USUARIOM= ?
                WHERE ID_CCALIDAD= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $CCALIDAD->__GET('NOMBRE_CCALIDAD'),
                        $CCALIDAD->__GET('RGB_CCALIDAD'),
                        $CCALIDAD->__GET('ID_USUARIOM'),
                        $CCALIDAD->__GET('ID_CCALIDAD')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarCcalidad($id)
    {
        try {
            $sql = "DELETE FROM fruta_ccalidad WHERE ID_CCALIDAD=" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //FUNCIONES ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(CCALIDAD $CCALIDAD)
    {

        try {
            $query = "
    UPDATE fruta_ccalidad SET			
            ESTADO_REGISTRO = 0
    WHERE ID_CCALIDAD= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $CCALIDAD->__GET('ID_CCALIDAD')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(CCALIDAD $CCALIDAD)
    {
        try {
            $query = "
    UPDATE fruta_ccalidad SET			
            ESTADO_REGISTRO = 1
    WHERE ID_CCALIDAD= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $CCALIDAD->__GET('ID_CCALIDAD')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    public function listarCcalidadPorEmpresaCBX($IDEMPRESA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_ccalidad 
                                            WHERE ESTADO_REGISTRO = 1
                                            AND ID_EMPRESA = '" . $IDEMPRESA . "';	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;
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
                                                    IFNULL(COUNT(NUMERO_CCALIDAD),0) AS 'NUMERO'
                                                FROM fruta_ccalidad
                                                WHERE ID_EMPRESA = '" . $IDEMPRESA . "'     
                                                ; ");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
