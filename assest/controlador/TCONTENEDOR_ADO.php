<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/TCONTENEDOR.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class TCONTENEDOR_ADO
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
    public function listarTcontenedor()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_tcontenedor  limit 8;	");
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
    public function listarTcontenedorCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_tcontenedor  WHERE  ESTADO_REGISTRO = 1 ;	");
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

    public function listarTcontenedor2CBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_tcontenedor   WHERE  ESTADO_REGISTRO = 0;	");
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
    public function verTcontenedor($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  material_tcontenedor  WHERE  ID_TCONTENEDOR = '" . $ID . "';");
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
     public function verTcontenedorCarga($ID)
     {
         try {
 
             $datos = $this->conexion->prepare("SELECT * FROM  fruta_tcontenedor  WHERE  ID_TCONTENEDOR = '" . $ID . "';");
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


    public function verTcontenedorInstructivo($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_tcontenedor  WHERE  ID_TCONTENEDOR = '" . $ID . "';");
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
    public function buscarNombreTcontenedor($NOMBRE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_tcontenedor  WHERE  NOMBRE_TCONTENEDOR  LIKE '%" . $NOMBRE . "%';");
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
    public function agregarTcontenedor(TCONTENEDOR $TCONTENEDOR)
    {
        try {


            $query =
                "INSERT INTO  fruta_tcontenedor  (
                                                 NUMERO_TCONTENEDOR , 
                                                 NOMBRE_TCONTENEDOR , 
                                                 ID_EMPRESA , 
                                                 ID_USUARIOI , 
                                                 ID_USUARIOM ,
                                                 INGRESO,
                                                 MODIFICACION,
                                                 ESTADO_REGISTRO 
                                            ) VALUES
	       	( ?, ?, ?, ?, ?,  SYSDATE() , SYSDATE(),  1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $TCONTENEDOR->__GET('NUMERO_TCONTENEDOR'),
                        $TCONTENEDOR->__GET('NOMBRE_TCONTENEDOR'),
                        $TCONTENEDOR->__GET('ID_EMPRESA'),
                        $TCONTENEDOR->__GET('ID_USUARIOI'),
                        $TCONTENEDOR->__GET('ID_USUARIOM')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarTcontenedor($id)
    {
        try {
            $sql = "DELETE FROM  fruta_tcontenedor  WHERE  ID_TCONTENEDOR =" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }




    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarTcontenedor(TCONTENEDOR $TCONTENEDOR)
    {
        try {
            $query = "
		UPDATE  fruta_tcontenedor  SET
             MODIFICACION= SYSDATE(),
             NOMBRE_TCONTENEDOR = ?,
             ID_USUARIOM = ?            
		WHERE  ID_TCONTENEDOR = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $TCONTENEDOR->__GET('NOMBRE_TCONTENEDOR'),
                        $TCONTENEDOR->__GET('ID_USUARIOM'),
                        $TCONTENEDOR->__GET('ID_TCONTENEDOR')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //FUNCIONES ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(TCONTENEDOR $TCONTENEDOR)
    {

        try {
            $query = "
    UPDATE  fruta_tcontenedor  SET			
             ESTADO_REGISTRO  = 0
    WHERE  ID_TCONTENEDOR = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $TCONTENEDOR->__GET('ID_TCONTENEDOR')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(TCONTENEDOR $TCONTENEDOR)
    {
        try {
            $query = "
    UPDATE  fruta_tcontenedor  SET			
             ESTADO_REGISTRO  = 1
    WHERE  ID_TCONTENEDOR = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $TCONTENEDOR->__GET('ID_TCONTENEDOR')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarTcontenedorPorEmpresaCBX($IDEMPRESA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_tcontenedor  
                                             WHERE  ESTADO_REGISTRO = 1
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
                                                IFNULL(COUNT(NUMERO_TCONTENEDOR),0) AS 'NUMERO'
                                            FROM  fruta_tcontenedor 
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
