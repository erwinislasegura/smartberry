<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/MVENTA.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';
//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class MVENTA_ADO
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

    public function listarMventa()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_mventa  limit 8;	");
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
    public function listarMventaCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_mventa  WHERE  ESTADO_REGISTRO  = 1;	");
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

    public function listarMventa2CBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_mventa  WHERE  ESTADO_REGISTRO  = 0;	");
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
    public function verMventa($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_mventa  WHERE  ID_MVENTA = '" . $ID . "';");
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
    public function buscarNombreMventa($NOMBRE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_mventa  WHERE  NOMBRE_MVENTA  LIKE '%" . $NOMBRE . "%';");
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
    public function agregarMventa(MVENTA $MVENTA)
    {
        try {


            $query =
                "INSERT INTO  fruta_mventa  (
                                                 NUMERO_MVENTA , 
                                                 NOMBRE_MVENTA , 
                                                 NOTA_MVENTA , 
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
                        $MVENTA->__GET('NUMERO_MVENTA'),
                        $MVENTA->__GET('NOMBRE_MVENTA'),
                        $MVENTA->__GET('NOTA_MVENTA'),
                        $MVENTA->__GET('ID_EMPRESA'),
                        $MVENTA->__GET('ID_USUARIOI'),
                        $MVENTA->__GET('ID_USUARIOM')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarMventa($id)
    {
        try {
            $sql = "DELETE FROM  fruta_mventa  WHERE  ID_MVENTA =" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }




    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarMventa(MVENTA $MVENTA)
    {
        try {
            $query = "
		UPDATE  fruta_mventa  SET
             MODIFICACION = SYSDATE(),
             NOMBRE_MVENTA = ?  ,
             NOTA_MVENTA = ?    ,
             ID_USUARIOM = ?      
		WHERE  ID_MVENTA = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $MVENTA->__GET('NOMBRE_MVENTA'),
                        $MVENTA->__GET('NOTA_MVENTA'),
                        $MVENTA->__GET('ID_USUARIOM'),
                        $MVENTA->__GET('ID_MVENTA')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //FUNCIONES ESPECIALIZADAS   
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(MVENTA $MVENTA)
    {

        try {
            $query = "
    UPDATE  fruta_mventa  SET			
             ESTADO_REGISTRO  = 0
    WHERE  ID_MVENTA = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $MVENTA->__GET('ID_MVENTA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(MVENTA $MVENTA)
    {
        try {
            $query = "
    UPDATE  fruta_mventa  SET			
             ESTADO_REGISTRO  = 1
    WHERE  ID_MVENTA = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $MVENTA->__GET('ID_MVENTA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarMventaPorEmpresaCBX($IDEMPRESA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_mventa  
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
                                                    IFNULL(COUNT(NUMERO_MVENTA),0) AS 'NUMERO'
                                                FROM  fruta_mventa 
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
