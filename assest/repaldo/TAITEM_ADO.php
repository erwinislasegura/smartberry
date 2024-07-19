<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/TAITEM.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class TAITEM_ADO
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
    public function listarTaitem()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  liquidacion_taitem  limit 8;	");
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
    public function listarTaitemCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  liquidacion_taitem  WHERE  ESTADO_REGISTRO = 1;	");
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

    public function listarTaitem2CBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  liquidacion_taitem  WHERE  ESTADO_REGISTRO = 0;	");
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
    public function verTaitem($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  liquidacion_taitem  WHERE  ID_TAITEM = '" . $ID . "';");
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
    public function buscarNombreTaitem($NOMBRE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  liquidacion_taitem  WHERE  NOMBRE_TAITEM  LIKE '%" . $NOMBRE . "%';");
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
    public function agregarTaitem(TAITEM $TAITEM)
    {
        try {


            $query =
                "INSERT INTO  liquidacion_taitem  (
                                                 NUMERO_TAITEM , 
                                                 NOMBRE_TAITEM , 
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

                        $TAITEM->__GET('NUMERO_TAITEM'),
                        $TAITEM->__GET('NOMBRE_TAITEM'),
                        $TAITEM->__GET('ID_EMPRESA'),
                        $TAITEM->__GET('ID_USUARIOI'),
                        $TAITEM->__GET('ID_USUARIOM')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarTaitem($id)
    {
        try {
            $sql = "DELETE FROM  liquidacion_taitem  WHERE  ID_TAITEM =" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }




    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarTaitem(TAITEM $TAITEM)
    {
        try {
            $query = "
		UPDATE  liquidacion_taitem  SET
             MODIFICACION= SYSDATE(),
             NOMBRE_TAITEM = ?,
             ID_USUARIOM = ?            
		WHERE  ID_TAITEM = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $TAITEM->__GET('NOMBRE_TAITEM'),
                        $TAITEM->__GET('ID_USUARIOM'),
                        $TAITEM->__GET('ID_TAITEM')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //FUNCIONES ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(TAITEM $TAITEM)
    {

        try {
            $query = "
                UPDATE  liquidacion_taitem  SET			
                        ESTADO_REGISTRO  = 0
                WHERE  ID_TAITEM = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $TAITEM->__GET('ID_TAITEM')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(TAITEM $TAITEM)
    {
        try {
            $query = "
            UPDATE  liquidacion_taitem  SET			
                    ESTADO_REGISTRO  = 1
            WHERE  ID_TAITEM = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $TAITEM->__GET('ID_TAITEM')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarTaitemPorEmpresaCBX($IDEMPRESA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  liquidacion_taitem  
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
    
    public function contarTaitemPorEmpresaCBX($IDEMPRESA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT IFNULL(COUNT(ID_TAITEM),0) AS 'CONTEO'
                                                FROM  liquidacion_taitem  
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
                                                    IFNULL(COUNT(NUMERO_TAITEM),0) AS 'NUMERO'
                                                FROM  liquidacion_taitem 
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
