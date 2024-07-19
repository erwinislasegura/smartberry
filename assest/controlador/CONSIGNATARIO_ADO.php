<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/CONSIGNATARIO.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class CONSIGNATARIO_ADO
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
    public function listarConsignatorio()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_consignatario  LIMIT 6;	");
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
    public function listarConsignatorioCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_consignatario   WHERE  ESTADO_REGISTRO  = 1;	");
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

    public function listarConsignatorio2CBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_consignatario   WHERE  ESTADO_REGISTRO  = 0;	");
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
    public function verConsignatorio($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_consignatario  WHERE  ID_CONSIGNATARIO = '" . $ID . "';");
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
    public function buscarNombreConsignatorio($NOMBRE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_consignatario  WHERE  NOMBRE_CONSIGNATARIO  LIKE '%" . $NOMBRE . "%';");
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
    public function agregarConsignatorio(CONSIGNATARIO $CONSIGNATARIO)
    {
        try {

            $query =
                "INSERT INTO  fruta_consignatario  
                                                (   
                                                     NUMERO_CONSIGNATARIO ,
                                                     NOMBRE_CONSIGNATARIO ,
                                                     DIRECCION_CONSIGNATARIO ,
                                                     EORI_CONSIGNATARIO ,
                                                     TELEFONO_CONSIGNATARIO ,
                                                     CONTACTO1_CONSIGNATARIO ,  CARGO1_CONSIGNATARIO ,  EMAIL1_CONSIGNATARIO , 
                                                     CONTACTO2_CONSIGNATARIO ,  CARGO2_CONSIGNATARIO ,  EMAIL2_CONSIGNATARIO , 
                                                     CONTACTO3_CONSIGNATARIO ,  CARGO3_CONSIGNATARIO ,  EMAIL3_CONSIGNATARIO , 
                                                     ID_EMPRESA , 
                                                     ID_USUARIOI , 
                                                     ID_USUARIOM , 
                                                     INGRESO ,
                                                     MODIFICACION , 
                                                     ESTADO_REGISTRO 
                                                ) 
            VALUES
	       	(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, SYSDATE() , SYSDATE(),  1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $CONSIGNATARIO->__GET('NUMERO_CONSIGNATARIO'),
                        $CONSIGNATARIO->__GET('NOMBRE_CONSIGNATARIO'),
                        $CONSIGNATARIO->__GET('DIRECCION_CONSIGNATARIO'),
                        $CONSIGNATARIO->__GET('EORI_CONSIGNATARIO'),
                        $CONSIGNATARIO->__GET('TELEFONO_CONSIGNATARIO'),
                        $CONSIGNATARIO->__GET('CONTACTO1_CONSIGNATARIO'),
                        $CONSIGNATARIO->__GET('CARGO1_CONSIGNATARIO'),
                        $CONSIGNATARIO->__GET('EMAIL1_CONSIGNATARIO'),
                        $CONSIGNATARIO->__GET('CONTACTO2_CONSIGNATARIO'),
                        $CONSIGNATARIO->__GET('CARGO2_CONSIGNATARIO'),
                        $CONSIGNATARIO->__GET('EMAIL2_CONSIGNATARIO'),
                        $CONSIGNATARIO->__GET('CONTACTO3_CONSIGNATARIO'),
                        $CONSIGNATARIO->__GET('CARGO3_CONSIGNATARIO'),
                        $CONSIGNATARIO->__GET('EMAIL3_CONSIGNATARIO'),
                        $CONSIGNATARIO->__GET('ID_EMPRESA'),
                        $CONSIGNATARIO->__GET('ID_USUARIOI'),
                        $CONSIGNATARIO->__GET('ID_USUARIOM')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarConsignatorio($id)
    {
        try {
            $sql = "DELETE FROM  fruta_consignatario  WHERE  ID_CONSIGNATARIO =" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarConsignatorio(CONSIGNATARIO $CONSIGNATARIO)
    {

        try {
            $query = "
                UPDATE  fruta_consignatario  SET
                    MODIFICACION  = SYSDATE() ,
                    NOMBRE_CONSIGNATARIO  = ?,
                    DIRECCION_CONSIGNATARIO  = ?,
                    EORI_CONSIGNATARIO  = ?,
                    TELEFONO_CONSIGNATARIO  = ?,
                    CONTACTO1_CONSIGNATARIO  = ?,
                    CARGO1_CONSIGNATARIO  = ?,
                    EMAIL1_CONSIGNATARIO  = ?,
                    CONTACTO2_CONSIGNATARIO  = ?,
                    CARGO2_CONSIGNATARIO  = ?,
                    EMAIL2_CONSIGNATARIO  = ?,
                    CONTACTO3_CONSIGNATARIO  = ?,
                    CARGO3_CONSIGNATARIO  = ?,
                    EMAIL3_CONSIGNATARIO  = ?,
                    ID_USUARIOM = ?
                WHERE  ID_CONSIGNATARIO  = ?  ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $CONSIGNATARIO->__GET('NOMBRE_CONSIGNATARIO'),
                        $CONSIGNATARIO->__GET('DIRECCION_CONSIGNATARIO'),
                        $CONSIGNATARIO->__GET('EORI_CONSIGNATARIO'),
                        $CONSIGNATARIO->__GET('TELEFONO_CONSIGNATARIO'),
                        $CONSIGNATARIO->__GET('CONTACTO1_CONSIGNATARIO'),
                        $CONSIGNATARIO->__GET('CARGO1_CONSIGNATARIO'),
                        $CONSIGNATARIO->__GET('EMAIL1_CONSIGNATARIO'),
                        $CONSIGNATARIO->__GET('CONTACTO2_CONSIGNATARIO'),
                        $CONSIGNATARIO->__GET('CARGO2_CONSIGNATARIO'),
                        $CONSIGNATARIO->__GET('EMAIL2_CONSIGNATARIO'),
                        $CONSIGNATARIO->__GET('CONTACTO3_CONSIGNATARIO'),
                        $CONSIGNATARIO->__GET('CARGO3_CONSIGNATARIO'),
                        $CONSIGNATARIO->__GET('EMAIL3_CONSIGNATARIO'),
                        $CONSIGNATARIO->__GET('ID_USUARIOM'),
                        $CONSIGNATARIO->__GET('ID_CONSIGNATARIO')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //FUNCIONES ESPECIALIZADAS 
    //CAMBIO DE ESTADO DE LA FILA
    //CAMBIO A DESACTIVADO
    public function deshabilitar(CONSIGNATARIO $CONSIGNATARIO)
    {

        try {
            $query = "
		UPDATE  fruta_consignatario  SET			
             ESTADO_REGISTRO  = 0
		WHERE  ID_CONSIGNATARIO = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $CONSIGNATARIO->__GET('ID_CONSIGNATARIO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(CONSIGNATARIO $CONSIGNATARIO)
    {

        try {
            $query = "
		UPDATE  fruta_consignatario  SET			
             ESTADO_REGISTRO  = 1
		WHERE  ID_CONSIGNATARIO = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $CONSIGNATARIO->__GET('ID_CONSIGNATARIO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function listarConsignatorioPorEmpresaCBX($IDEMPRESA)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT * FROM  fruta_consignatario   
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
                                                    IFNULL(COUNT(NUMERO_CONSIGNATARIO),0) AS 'NUMERO'
                                                FROM  fruta_consignatario 
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
