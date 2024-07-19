<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/COMPRADOR.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class COMPRADOR_ADO
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
    public function listarComprador()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_comprador  LIMIT 6;	");
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
    public function listarCompradorCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_comprador   WHERE  ESTADO_REGISTRO  = 1;	");
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

    public function listarComprador2CBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_comprador   WHERE  ESTADO_REGISTRO  = 0;	");
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
    public function verComprador($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_comprador  WHERE  ID_COMPRADOR = '" . $ID . "';");
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
    public function buscarNombreComprador($NOMBRE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_comprador  WHERE  NOMBRE_COMPRADOR  LIKE '%" . $NOMBRE . "%';");
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
    public function agregarComprador(COMPRADOR $COMPRADOR)
    {
        try {

            if ($COMPRADOR->__GET('ID_COMUNA') == NULL) {
                $COMPRADOR->__SET('ID_COMUNA', NULL);
            }

            $query =
                "INSERT INTO  fruta_comprador  
                                                (
                                                     RUT_COMPRADOR , 
                                                     DV_COMPRADOR , 
                                                     NUMERO_COMPRADOR , 
                                                     NOMBRE_COMPRADOR , 
                                                     DIRECCION_COMPRADOR , 
                                                     TELEFONO_COMPRADOR , 
                                                     EMAIL_COMPRADOR ,  
                                                     ID_COMUNA ,
                                                     ID_EMPRESA , 
                                                     ID_USUARIOI , 
                                                     ID_USUARIOM ,  
                                                     INGRESO ,
                                                     MODIFICACION , 
                                                     ESTADO_REGISTRO 
                                                ) 
            VALUES
	       	(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,  SYSDATE() , SYSDATE(),  1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $COMPRADOR->__GET('RUT_COMPRADOR'),
                        $COMPRADOR->__GET('DV_COMPRADOR'),
                        $COMPRADOR->__GET('NUMERO_COMPRADOR'),
                        $COMPRADOR->__GET('NOMBRE_COMPRADOR'),
                        $COMPRADOR->__GET('DIRECCION_COMPRADOR'),
                        $COMPRADOR->__GET('TELEFONO_COMPRADOR'),
                        $COMPRADOR->__GET('EMAIL_COMPRADOR'),
                        $COMPRADOR->__GET('ID_COMUNA'),
                        $COMPRADOR->__GET('ID_EMPRESA'),
                        $COMPRADOR->__GET('ID_USUARIOI'),
                        $COMPRADOR->__GET('ID_USUARIOM')


                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarComprador($id)
    {
        try {
            $sql = "DELETE FROM  fruta_comprador  WHERE  ID_COMPRADOR =" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarComprador(COMPRADOR $COMPRADOR)
    {

        try {
            if ($COMPRADOR->__GET('ID_COMUNA') == NULL) {
                $COMPRADOR->__SET('ID_COMUNA', NULL);
            }

            $query = "
                UPDATE  fruta_comprador  SET
                    MODIFICACION = SYSDATE(),
                    RUT_COMPRADOR  = ?,
                    DV_COMPRADOR  = ?,
                    NOMBRE_COMPRADOR  = ?,
                    DIRECCION_COMPRADOR  = ?,
                    TELEFONO_COMPRADOR  = ?,
                    EMAIL_COMPRADOR  = ?,
                    ID_COMUNA = ?,
                    ID_USUARIOM = ?
                WHERE  ID_COMPRADOR  = ?  ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $COMPRADOR->__GET('RUT_COMPRADOR'),
                        $COMPRADOR->__GET('DV_COMPRADOR'),
                        $COMPRADOR->__GET('NOMBRE_COMPRADOR'),
                        $COMPRADOR->__GET('DIRECCION_COMPRADOR'),
                        $COMPRADOR->__GET('TELEFONO_COMPRADOR'),
                        $COMPRADOR->__GET('EMAIL_COMPRADOR'),
                        $COMPRADOR->__GET('ID_COMUNA'),
                        $COMPRADOR->__GET('ID_USUARIOM'),
                        $COMPRADOR->__GET('ID_COMPRADOR')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //FUNCIONES ESPECIALIZADAS 
    //CAMBIO DE ESTADO DE LA FILA
    //CAMBIO A DESACTIVADO
    public function deshabilitar(COMPRADOR $COMPRADOR)
    {

        try {
            $query = "
		UPDATE  fruta_comprador  SET			
             ESTADO_REGISTRO  = 0
		WHERE  ID_COMPRADOR = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $COMPRADOR->__GET('ID_COMPRADOR')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(COMPRADOR $COMPRADOR)
    {

        try {
            $query = "
		UPDATE  fruta_comprador  SET			
             ESTADO_REGISTRO  = 1
		WHERE  ID_COMPRADOR = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $COMPRADOR->__GET('ID_COMPRADOR')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function listarCompradorPorEmpresaCBX($IDEMPRESA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_comprador   
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
                                                    IFNULL(COUNT(NUMERO_COMPRADOR),0) AS 'NUMERO'
                                                FROM  fruta_comprador 
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
