<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/EMPRESAPRODUCTOR.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class EMPRESAPRODUCTOR_ADO
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
    public function listarEmpresaProductor()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM    usuario_empresaproductor   limit 8;	");
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
    public function listarEmpresaProductorCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM    usuario_empresaproductor   WHERE  ESTADO_REGISTRO = 1 ;	");
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

    public function listarEmpresaProductor2CBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM    usuario_empresaproductor   WHERE  ESTADO_REGISTRO = 0;	");
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
    public function verEmpresaProductor($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM    usuario_empresaproductor   
                                              WHERE  ID_EMPRESAPRODUCTOR  = '" . $ID . "'
                                              
                                              ;");
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
    public function agregarEmpresaProductor(EMPRESAPRODUCTOR $EMPRESAPRODUCTOR)
    {
        try {


            $query =
                "INSERT INTO    usuario_empresaproductor   (

                                              ID_USUARIO  , 
                                              ID_EMPRESA  , 
                                              ID_PRODUCTOR  , 

                                              ID_USUARIOI  , 
                                              ID_USUARIOM  ,
                                              INGRESO  ,
                                              MODIFICACION  ,
                                              ESTADO_REGISTRO  
                                        ) VALUES
	       	( ?, ?, ?,     ?, ?,   SYSDATE(),SYSDATE(), 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $EMPRESAPRODUCTOR->__GET('ID_USUARIO'),
                        $EMPRESAPRODUCTOR->__GET('ID_EMPRESA'),
                        $EMPRESAPRODUCTOR->__GET('ID_PRODUCTOR'),

                        $EMPRESAPRODUCTOR->__GET('ID_USUARIOI'),
                        $EMPRESAPRODUCTOR->__GET('ID_USUARIOM')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarEmpresaProductor($ID)
    {
        try {
            $sql = "DELETE FROM    usuario_empresaproductor   
                    WHERE   ID_EMPRESAPRODUCTOR  = '" . $ID . "'
                    
                    ;";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }




    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarEmpresaProductor(EMPRESAPRODUCTOR $EMPRESAPRODUCTOR)
    {
        try {
            $query = "
                UPDATE    usuario_empresaproductor   SET
                    MODIFICACION = SYSDATE() ,
                    ID_EMPRESA  = ?,
                    ID_PRODUCTOR  = ?,
                    ID_USUARIOM  = ?            
                WHERE   ID_EMPRESAPRODUCTOR  = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EMPRESAPRODUCTOR->__GET('ID_EMPRESA'),
                        $EMPRESAPRODUCTOR->__GET('ID_PRODUCTOR'),

                        $EMPRESAPRODUCTOR->__GET('ID_USUARIOM'),
                        $EMPRESAPRODUCTOR->__GET('ID_EMPRESAPRODUCTOR')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //FUNCIONES ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(EMPRESAPRODUCTOR $EMPRESAPRODUCTOR)
    {

        try {
            $query = "
                    UPDATE    usuario_empresaproductor   SET			
                            ESTADO_REGISTRO   = 0
                    WHERE   ID_EMPRESAPRODUCTOR  = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EMPRESAPRODUCTOR->__GET('ID_EMPRESAPRODUCTOR')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(EMPRESAPRODUCTOR $EMPRESAPRODUCTOR)
    {
        try {
            $query = "
                    UPDATE    usuario_empresaproductor   SET			
                            ESTADO_REGISTRO   = 1
                    WHERE   ID_EMPRESAPRODUCTOR  = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EMPRESAPRODUCTOR->__GET('ID_EmpresaProductor')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarEmpresaProductorPorEmpresaCBX($IDEMPRESA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM    usuario_empresaproductor   
                                               WHERE  ESTADO_REGISTRO = 1 
                                               AND ID_EMPRESA = '".$IDEMPRESA."'  ;	");
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

    
    public function validarEmpresaProductorUsuarioCBX($IDEMPRESA,$IDPRODUCTOR, $IDUSUARIO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM    usuario_empresaproductor   
                                               WHERE  ESTADO_REGISTRO = 1 
                                               AND ID_EMPRESA = '".$IDEMPRESA."' 
                                               AND ID_PRODUCTOR = '".$IDPRODUCTOR."'  
                                               AND ID_USUARIO = '".$IDUSUARIO."' ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
           // 	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function buscarEmpresaProductorPorUsuarioCBX( $IDUSUARIO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM    usuario_empresaproductor   
                                               WHERE  ESTADO_REGISTRO = 1 
                                               AND ID_USUARIO = '".$IDUSUARIO."' ;	");
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
