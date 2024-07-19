<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/TITEM.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class TITEM_ADO
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
    public function listarTitem()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  liquidacion_titem  limit 8;	");
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
    public function listarTitemCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  liquidacion_titem  WHERE  ESTADO_REGISTRO = 1;	");
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

    public function listarTitem2CBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  liquidacion_titem  WHERE  ESTADO_REGISTRO = 0;	");
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
    public function verTitem($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  liquidacion_titem  WHERE  ID_TITEM = '" . $ID . "';");
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
    public function buscarNombreTitem($NOMBRE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  liquidacion_titem  WHERE  NOMBRE_TITEM  LIKE '%" . $NOMBRE . "%';");
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
    public function agregarTitem(TITEM $TITEM)
    {
        try {


            $query =
                "INSERT INTO  liquidacion_titem  (
                                                 NUMERO_TITEM , 
                                                 NOMBRE_TITEM , 
                                                 TAITEM,
                                                 ID_EMPRESA , 
                                                 ID_USUARIOI , 
                                                 ID_USUARIOM ,
                                                 INGRESO,
                                                 MODIFICACION,
                                                 ESTADO_REGISTRO 
                                            ) VALUES
	       	( ?, ?, ?, ?, ?, ?, SYSDATE() , SYSDATE(), 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $TITEM->__GET('NUMERO_TITEM'),
                        $TITEM->__GET('NOMBRE_TITEM'),
                        $TITEM->__GET('TAITEM'),
                        $TITEM->__GET('ID_EMPRESA'),
                        $TITEM->__GET('ID_USUARIOI'),
                        $TITEM->__GET('ID_USUARIOM')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarTitem($id)
    {
        try {
            $sql = "DELETE FROM  liquidacion_titem  WHERE  ID_TITEM =" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }




    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarTitem(TITEM $TITEM)
    {
        try {
            $query = "
		UPDATE  liquidacion_titem  SET
             MODIFICACION= SYSDATE(),
             NOMBRE_TITEM = ?,
             TAITEM = ?,
             ID_USUARIOM = ?            
		WHERE  ID_TITEM = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $TITEM->__GET('NOMBRE_TITEM'),
                        $TITEM->__GET('TAITEM'),
                        $TITEM->__GET('ID_USUARIOM'),
                        $TITEM->__GET('ID_TITEM')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //FUNCIONES ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(TITEM $TITEM)
    {

        try {
            $query = "
                UPDATE  liquidacion_titem  SET			
                        ESTADO_REGISTRO  = 0
                WHERE  ID_TITEM = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $TITEM->__GET('ID_TITEM')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(TITEM $TITEM)
    {
        try {
            $query = "
            UPDATE  liquidacion_titem  SET			
                    ESTADO_REGISTRO  = 1
            WHERE  ID_TITEM = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $TITEM->__GET('ID_TITEM')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarTitemPorEmpresaCBX($IDEMPRESA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  liquidacion_titem  
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
    
    public function listarTitemPorEmpresaLiquidacionCBX($IDEMPRESA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  liquidacion_titem  
                                                WHERE  ESTADO_REGISTRO = 1
                                                AND TAITEM = 1
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
    
    public function listarTitemPorEmpresaPagoCBX($IDEMPRESA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  liquidacion_titem  
                                                WHERE  ESTADO_REGISTRO = 1
                                                AND TAITEM = 2
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
    
    public function contarTitemLiquidacionPorEmpresaCBX($IDEMPRESA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT IFNULL(COUNT(ID_TITEM),0) AS 'CONTEO'
                                                FROM  liquidacion_titem  
                                                WHERE  ESTADO_REGISTRO = 1
                                                AND TAITEM = 1
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
    public function contarTitemPagoPorEmpresaCBX($IDEMPRESA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT IFNULL(COUNT(ID_TITEM),0) AS 'CONTEO'
                                                FROM  liquidacion_titem  
                                                WHERE  ESTADO_REGISTRO = 1
                                                AND TAITEM = 2
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

    public function contarTitemPorEmpresaCBX($IDEMPRESA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT IFNULL(COUNT(ID_TITEM),0) AS 'CONTEO'
                                                FROM  liquidacion_titem  
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
                                                    IFNULL(COUNT(NUMERO_TITEM),0) AS 'NUMERO'
                                                FROM  liquidacion_titem 
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
