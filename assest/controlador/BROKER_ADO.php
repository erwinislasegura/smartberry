<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/BROKER.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class BROKER_ADO
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
    public function listarBroker()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_broker  LIMIT 6;	");
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
    public function listarBrokerCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_broker   WHERE  ESTADO_REGISTRO  = 1;	");
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

    public function listarBroker2CBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_broker   WHERE  ESTADO_REGISTRO  = 0;	");
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
    public function verBroker($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_broker  WHERE  ID_BROKER = '" . $ID . "';");
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
    public function buscarNombreBroker($NOMBRE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_broker  WHERE  NOMBRE_BROKER  LIKE '%" . $NOMBRE . "%';");
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
    public function agregarBroker(BROKER $BROKER)
    {
        try {


            $query =
                "INSERT INTO  fruta_broker  
                                        (
                                             NUMERO_BROKER ,
                                             NOMBRE_BROKER ,
                                             EORI_BROKER ,
                                             DIRECCION_BROKER ,
                                             CONTACTO1_BROKER ,  CARGO1_BROKER ,  EMAIL1_BROKER , 
                                             CONTACTO2_BROKER ,  CARGO2_BROKER ,  EMAIL2_BROKER , 
                                             CONTACTO3_BROKER ,  CARGO3_BROKER ,  EMAIL3_BROKER , 
                                             ID_EMPRESA , 
                                             ID_USUARIOI , 
                                             ID_USUARIOM ,  
                                             INGRESO ,
                                             MODIFICACION , 
                                             ESTADO_REGISTRO 
                                        ) 
            VALUES
	       	(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,   SYSDATE() , SYSDATE(), 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $BROKER->__GET('NUMERO_BROKER'),
                        $BROKER->__GET('NOMBRE_BROKER'),
                        $BROKER->__GET('EORI_BROKER'),
                        $BROKER->__GET('DIRECCION_BROKER'),
                        $BROKER->__GET('CONTACTO1_BROKER'),
                        $BROKER->__GET('CARGO1_BROKER'),
                        $BROKER->__GET('EMAIL1_BROKER'),
                        $BROKER->__GET('CONTACTO2_BROKER'),
                        $BROKER->__GET('CARGO2_BROKER'),
                        $BROKER->__GET('EMAIL2_BROKER'),
                        $BROKER->__GET('CONTACTO3_BROKER'),
                        $BROKER->__GET('CARGO3_BROKER'),
                        $BROKER->__GET('EMAIL3_BROKER'),
                        $BROKER->__GET('ID_EMPRESA'),
                        $BROKER->__GET('ID_USUARIOI'),
                        $BROKER->__GET('ID_USUARIOM')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarBroker($id)
    {
        try {
            $sql = "DELETE FROM  fruta_broker  WHERE  ID_BROKER =" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarBroker(BROKER $BROKER)
    {

        try {
            $query = "
                    UPDATE  fruta_broker  SET
                        MODIFICACION  = SYSDATE() , 
                        NOMBRE_BROKER  = ?,
                        EORI_BROKER  = ?,
                        DIRECCION_BROKER  = ?,
                        CONTACTO1_BROKER  = ?,
                        CARGO1_BROKER  = ?,
                        EMAIL1_BROKER  = ?,
                        CONTACTO2_BROKER  = ?,
                        CARGO2_BROKER  = ?,
                        EMAIL2_BROKER  = ?,
                        CONTACTO3_BROKER  = ?,
                        CARGO3_BROKER  = ?,
                        EMAIL3_BROKER  = ?,
                        ID_USUARIOM = ?
                    WHERE  ID_BROKER  = ?  ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $BROKER->__GET('NOMBRE_BROKER'),
                        $BROKER->__GET('EORI_BROKER'),
                        $BROKER->__GET('DIRECCION_BROKER'),
                        $BROKER->__GET('CONTACTO1_BROKER'),
                        $BROKER->__GET('CARGO1_BROKER'),
                        $BROKER->__GET('EMAIL1_BROKER'),
                        $BROKER->__GET('CONTACTO2_BROKER'),
                        $BROKER->__GET('CARGO2_BROKER'),
                        $BROKER->__GET('EMAIL2_BROKER'),
                        $BROKER->__GET('CONTACTO3_BROKER'),
                        $BROKER->__GET('CARGO3_BROKER'),
                        $BROKER->__GET('EMAIL3_BROKER'),
                        $BROKER->__GET('ID_USUARIOM'),
                        $BROKER->__GET('ID_BROKER')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //FUNCIONES ESPECIALIZADAS 
    //CAMBIO DE ESTADO DE LA FILA
    //CAMBIO A DESACTIVADO
    public function deshabilitar(BROKER $BROKER)
    {

        try {
            $query = "
		UPDATE  fruta_broker  SET			
             ESTADO_REGISTRO  = 0
		WHERE  ID_BROKER = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $BROKER->__GET('ID_BROKER')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(BROKER $BROKER)
    {

        try {
            $query = "
		UPDATE  fruta_broker  SET			
             ESTADO_REGISTRO  = 1
		WHERE  ID_BROKER = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $BROKER->__GET('ID_BROKER')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarBrokerPorEmpresaCBX($IDEMPRESA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_broker  
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
                                                    IFNULL(COUNT(NUMERO_BROKER),0) AS 'NUMERO'
                                                FROM  fruta_broker 
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

    public function getBrokerName(){

    }
}
