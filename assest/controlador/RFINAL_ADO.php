<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/RFINAL.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class RFINAL_ADO
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
    public function listarRfinal()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_rfinal  LIMIT 6;	");
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
    public function listarRfinalCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_rfinal   WHERE  ESTADO_REGISTRO  = 1;	");
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

    public function listarRfinal2CBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_rfinal   WHERE  ESTADO_REGISTRO  = 0;	");
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
    public function verRfinal($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_rfinal  WHERE  ID_RFINAL = '" . $ID . "';");
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
    public function buscarNombreRfinal($NOMBRE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_rfinal  WHERE  NOMBRE_RFINAL  LIKE '%" . $NOMBRE . "%';");
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
    public function agregarRfinal(RFINAL $RFINAL)
    {
        try {


            $query =
                "INSERT INTO  fruta_rfinal  
                                        (
                                                     NUMERO_RFINAL ,
                                                     NOMBRE_RFINAL ,
                                                     DIRECCION_RFINAL ,
                                                     CONTACTO1_RFINAL ,  CARGO1_RFINAL ,  EMAIL1_RFINAL , 
                                                     CONTACTO2_RFINAL ,  CARGO2_RFINAL ,  EMAIL2_RFINAL , 
                                                     CONTACTO3_RFINAL ,  CARGO3_RFINAL ,  EMAIL3_RFINAL , 
                                                     ID_EMPRESA , 
                                                     ID_USUARIOI , 
                                                     ID_USUARIOM ,  
                                                     INGRESO ,
                                                     MODIFICACION , 
                                                     ESTADO_REGISTRO 
                                        ) 
            VALUES
	       	(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,   SYSDATE() , SYSDATE(), 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $RFINAL->__GET('NUMERO_RFINAL'),
                        $RFINAL->__GET('NOMBRE_RFINAL'),
                        $RFINAL->__GET('DIRECCION_RFINAL'),
                        $RFINAL->__GET('CONTACTO1_RFINAL'),
                        $RFINAL->__GET('CARGO1_RFINAL'),
                        $RFINAL->__GET('EMAIL1_RFINAL'),
                        $RFINAL->__GET('CONTACTO2_RFINAL'),
                        $RFINAL->__GET('CARGO2_RFINAL'),
                        $RFINAL->__GET('EMAIL2_RFINAL'),
                        $RFINAL->__GET('CONTACTO3_RFINAL'),
                        $RFINAL->__GET('CARGO3_RFINAL'),
                        $RFINAL->__GET('EMAIL3_RFINAL'),
                        $RFINAL->__GET('ID_EMPRESA'),
                        $RFINAL->__GET('ID_USUARIOI'),
                        $RFINAL->__GET('ID_USUARIOM')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarRfinal($id)
    {
        try {
            $sql = "DELETE FROM  fruta_rfinal  WHERE  ID_RFINAL =" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarRfinal(RFINAL $RFINAL)
    {

        try {
            $query = "
                    UPDATE  fruta_rfinal  SET
                        MODIFICACION  = SYSDATE() , 
                        NOMBRE_RFINAL  = ?,
                        DIRECCION_RFINAL  = ?,
                        CONTACTO1_RFINAL  = ?,
                        CARGO1_RFINAL  = ?,
                        EMAIL1_RFINAL  = ?,
                        CONTACTO2_RFINAL  = ?,
                        CARGO2_RFINAL  = ?,
                        EMAIL2_RFINAL  = ?,
                        CONTACTO3_RFINAL  = ?,
                        CARGO3_RFINAL  = ?,
                        EMAIL3_RFINAL  = ?,
                        ID_USUARIOM = ?
                    WHERE  ID_RFINAL  = ?  ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $RFINAL->__GET('NOMBRE_RFINAL'),
                        $RFINAL->__GET('DIRECCION_RFINAL'),
                        $RFINAL->__GET('CONTACTO1_RFINAL'),
                        $RFINAL->__GET('CARGO1_RFINAL'),
                        $RFINAL->__GET('EMAIL1_RFINAL'),
                        $RFINAL->__GET('CONTACTO2_RFINAL'),
                        $RFINAL->__GET('CARGO2_RFINAL'),
                        $RFINAL->__GET('EMAIL2_RFINAL'),
                        $RFINAL->__GET('CONTACTO3_RFINAL'),
                        $RFINAL->__GET('CARGO3_RFINAL'),
                        $RFINAL->__GET('EMAIL3_RFINAL'),
                        $RFINAL->__GET('ID_USUARIOM'),
                        $RFINAL->__GET('ID_RFINAL')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //FUNCIONES ESPECIALIZADAS 
    //CAMBIO DE ESTADO DE LA FILA
    //CAMBIO A DESACTIVADO
    public function deshabilitar(RFINAL $RFINAL)
    {

        try {
            $query = "
		UPDATE  fruta_rfinal  SET			
             ESTADO_REGISTRO  = 0
		WHERE  ID_RFINAL = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $RFINAL->__GET('ID_RFINAL')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(RFINAL $RFINAL)
    {

        try {
            $query = "
		UPDATE  fruta_rfinal  SET			
             ESTADO_REGISTRO  = 1
		WHERE  ID_RFINAL = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $RFINAL->__GET('ID_RFINAL')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function listarRfinalPorEmpresaCBX($IDEMPRESA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_rfinal  
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
                                                    IFNULL(COUNT(NUMERO_RFINAL),0) AS 'NUMERO'
                                                FROM  fruta_rfinal 
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
