<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/TSERVICIO.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class TSERVICIO_ADO
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
    public function listarTservicio()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_tservicio  limit 8;	");
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
    public function listarTservicioCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_tservicio  WHERE  ESTADO_REGISTRO  = 1;	");
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
    public function listarTservicio2CBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_tservicio  WHERE  ESTADO_REGISTRO  = 0;	");
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
    public function verTservicio($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_tservicio  WHERE  ID_TSERVICIO = '" . $ID . "';");
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
    public function buscarNombreTservicio($NOMBRE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_tservicio  WHERE  NOMBRE_TSERVICIO  LIKE '%" . $NOMBRE . "%';");
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
    public function agregarTservicio(TSERVICIO $TSERVICIO)
    {
        try {


            $query =
                "INSERT INTO  fruta_tservicio  (
                                                 NUMERO_TSERVICIO , 
                                                 NOMBRE_TSERVICIO , 
                                                 ID_EMPRESA , 
                                                 ID_USUARIOI , 
                                                 ID_USUARIOM ,
                                                 INGRESO,
                                                 MODIFICACION,
                                                 ESTADO_REGISTRO 
                                            ) VALUES
	       	( ?, ?, ?, ?, ?,  SYSDATE() , SYSDATE(), 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $TSERVICIO->__GET('NUMERO_TSERVICIO'),
                        $TSERVICIO->__GET('NOMBRE_TSERVICIO'),
                        $TSERVICIO->__GET('ID_EMPRESA'),
                        $TSERVICIO->__GET('ID_USUARIOI'),
                        $TSERVICIO->__GET('ID_USUARIOM')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarTservicio($id)
    {
        try {
            $sql = "DELETE FROM  fruta_tservicio  WHERE  ID_TSERVICIO =" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }




    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarTservicio(TSERVICIO $TSERVICIO)
    {
        try {
            $query = "
                UPDATE  fruta_tservicio  SET
                    MODIFICACION= SYSDATE(),
                    NOMBRE_TSERVICIO = ?  ,  
                    ID_USUARIOM = ?        
                WHERE  ID_TSERVICIO = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $TSERVICIO->__GET('NOMBRE_TSERVICIO'),
                        $TSERVICIO->__GET('ID_USUARIOM'),
                        $TSERVICIO->__GET('ID_TSERVICIO')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //FUNCIONES ESPECIALIZADAS  
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(TSERVICIO $TSERVICIO)
    {

        try {
            $query = "
    UPDATE  fruta_tservicio  SET			
             ESTADO_REGISTRO  = 0
    WHERE  ID_TSERVICIO = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $TSERVICIO->__GET('ID_TSERVICIO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(TSERVICIO $TSERVICIO)
    {
        try {
            $query = "
    UPDATE  fruta_tservicio  SET			
             ESTADO_REGISTRO  = 1
    WHERE  ID_TSERVICIO = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $TSERVICIO->__GET('ID_TSERVICIO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function listarTservicioPorEmpresaCBX($IDEMPRESA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_tservicio  
                                             WHERE  ESTADO_REGISTRO  = 1
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
                                                IFNULL(COUNT(NUMERO_TSERVICIO),0) AS 'NUMERO'
                                            FROM  fruta_tservicio 
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
