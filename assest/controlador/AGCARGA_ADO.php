<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/AGCARGA.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class AGCARGA_ADO
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
    public function listarAgcarga()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_agcarga  LIMIT 6;	");
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
    public function listarAgcargaCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_agcarga   WHERE  ESTADO_REGISTRO  = 1;	");
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

    public function listarAgcarga2CBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_agcarga   WHERE  ESTADO_REGISTRO  = 0;	");
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
    public function verAgcarga($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_agcarga  WHERE  ID_AGCARGA = '" . $ID . "';");
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
    public function buscarNombreAgcarga($NOMBRE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_agcarga  WHERE  NOMBRE_AGCARGA  LIKE '%" . $NOMBRE . "%';");
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
    public function agregarAgcarga(AGCARGA $AGCARGA)
    {
        try {


            if ($AGCARGA->__GET('ID_COMUNA') == NULL) {
                $AGCARGA->__SET('ID_COMUNA', NULL);
            }

            $query =
                "INSERT INTO  fruta_agcarga  
                                        (
                                             RUT_AGCARGA ,
                                             DV_AGCARGA ,
                                             NUMERO_AGCARGA ,
                                             NOMBRE_AGCARGA ,
                                             RAZON_SOCIAL_AGCARGA ,
                                             GIRO_AGCARGA ,
                                             CODIGO_SAG_AGCARGA ,
                                             DIRECCION_AGCARGA , 
                                             CONTACTO_AGCARGA , 
                                             TELEFONO_AGCARGA , 
                                             EMAIL_AGCARGA , 
                                             ID_COMUNA , 
                                             ID_EMPRESA , 
                                             ID_USUARIOI , 
                                             ID_USUARIOM ,
                                             INGRESO ,
                                             MODIFICACION ,
                                             ESTADO_REGISTRO 
                                        ) 
            VALUES
	       	(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, SYSDATE(), SYSDATE(), 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $AGCARGA->__GET('RUT_AGCARGA'),
                        $AGCARGA->__GET('DV_AGCARGA'),
                        $AGCARGA->__GET('NUMERO_AGCARGA'),
                        $AGCARGA->__GET('NOMBRE_AGCARGA'),
                        $AGCARGA->__GET('RAZON_SOCIAL_AGCARGA'),
                        $AGCARGA->__GET('GIRO_AGCARGA'),
                        $AGCARGA->__GET('CODIGO_SAG_AGCARGA'),
                        $AGCARGA->__GET('DIRECCION_AGCARGA'),
                        $AGCARGA->__GET('CONTACTO_AGCARGA'),
                        $AGCARGA->__GET('TELEFONO_AGCARGA'),
                        $AGCARGA->__GET('EMAIL_AGCARGA'),
                        $AGCARGA->__GET('ID_COMUNA'),
                        $AGCARGA->__GET('ID_EMPRESA'),
                        $AGCARGA->__GET('ID_USUARIOI'),
                        $AGCARGA->__GET('ID_USUARIOM')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarAgcarga($id)
    {
        try {
            $sql = "DELETE FROM  fruta_agcarga  WHERE  ID_AGCARGA =" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarAgcarga(AGCARGA $AGCARGA)
    {

        try {
            if ($AGCARGA->__GET('ID_COMUNA') == NULL) {
                $AGCARGA->__SET('ID_COMUNA', NULL);
            }

            $query = "
                UPDATE  fruta_agcarga  SET
                    MODIFICACION = SYSDATE(),
                    RUT_AGCARGA  = ?,
                    DV_AGCARGA  = ?,
                    NOMBRE_AGCARGA  = ?,
                    RAZON_SOCIAL_AGCARGA  = ?,
                    GIRO_AGCARGA  = ?,
                    CODIGO_SAG_AGCARGA  = ?,
                    DIRECCION_AGCARGA  = ?,
                    CONTACTO_AGCARGA  = ?,
                    TELEFONO_AGCARGA  = ?,
                    EMAIL_AGCARGA  = ?,
                    ID_COMUNA = ?,
                    ID_USUARIOM = ?
                WHERE  ID_AGCARGA  = ?  ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $AGCARGA->__GET('RUT_AGCARGA'),
                        $AGCARGA->__GET('DV_AGCARGA'),
                        $AGCARGA->__GET('NOMBRE_AGCARGA'),
                        $AGCARGA->__GET('RAZON_SOCIAL_AGCARGA'),
                        $AGCARGA->__GET('GIRO_AGCARGA'),
                        $AGCARGA->__GET('CODIGO_SAG_AGCARGA'),
                        $AGCARGA->__GET('DIRECCION_AGCARGA'),
                        $AGCARGA->__GET('CONTACTO_AGCARGA'),
                        $AGCARGA->__GET('TELEFONO_AGCARGA'),
                        $AGCARGA->__GET('EMAIL_AGCARGA'),
                        $AGCARGA->__GET('ID_COMUNA'),
                        $AGCARGA->__GET('ID_USUARIOM'),
                        $AGCARGA->__GET('ID_AGCARGA')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //FUNCIONES ESPECIALIZADAS 
    //CAMBIO DE ESTADO DE LA FILA
    //CAMBIO A DESACTIVADO
    public function deshabilitar(AGCARGA $AGCARGA)
    {

        try {
            $query = "
		UPDATE  fruta_agcarga  SET			
             ESTADO_REGISTRO  = 0
		WHERE  ID_AGCARGA = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $AGCARGA->__GET('ID_AGCARGA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(AGCARGA $AGCARGA)
    {

        try {
            $query = "
		UPDATE  fruta_agcarga  SET			
             ESTADO_REGISTRO  = 1
		WHERE  ID_AGCARGA = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $AGCARGA->__GET('ID_AGCARGA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function listarAgcargaPorEmpresaCBX($IDEMPRESA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_agcarga   
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
                                                    IFNULL(COUNT(NUMERO_AGCARGA),0) AS 'NUMERO'
                                                FROM  fruta_agcarga 
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
