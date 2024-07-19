<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/AADUANA.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class AADUANA_ADO
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
    public function listarAaduana()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_aaduana  LIMIT 6;	");
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
    public function listarAaduanaCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_aaduana   WHERE  ESTADO_REGISTRO  = 1;	");
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

    public function listarAaduana2CBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_aaduana   WHERE  ESTADO_REGISTRO  = 0;	");
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
    public function verAaduana($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_aaduana  WHERE  ID_AADUANA = '" . $ID . "';");
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
    public function buscarNombreAaduana($NOMBRE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_aaduana  WHERE  NOMBRE_AADUANA  LIKE '%" . $NOMBRE . "%';");
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
    public function agregarAaduana(AADUANA $AADUANA)
    {
        try {

            if ($AADUANA->__GET('ID_COMUNA') == NULL) {
                $AADUANA->__SET('ID_COMUNA', NULL);
            }

            $query =
                "INSERT INTO  fruta_aaduana  
                                        (
                                                 RUT_AADUANA ,
                                                 DV_AADUANA ,
                                                 NUMERO_AADUANA ,
                                                 NOMBRE_AADUANA ,
                                                 RAZON_SOCIAL_AADUANA ,
                                                 GIRO_AADUANA ,
                                                 DIRECCION_AADUANA , 
                                                 CONTACTO_AADUANA , 
                                                 TELEFONO_AADUANA , 
                                                 EMAIL_AADUANA , 
                                                 ID_COMUNA , 
                                                 ID_EMPRESA , 
                                                 ID_USUARIOI , 
                                                 ID_USUARIOM ,
                                                 INGRESO ,
                                                 MODIFICACION ,
                                                 ESTADO_REGISTRO 
                                        ) 
            VALUES
	       	(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, SYSDATE(), SYSDATE(),  1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $AADUANA->__GET('RUT_AADUANA'),
                        $AADUANA->__GET('DV_AADUANA'),
                        $AADUANA->__GET('NUMERO_AADUANA'),
                        $AADUANA->__GET('NOMBRE_AADUANA'),
                        $AADUANA->__GET('RAZON_SOCIAL_AADUANA'),
                        $AADUANA->__GET('GIRO_AADUANA'),
                        $AADUANA->__GET('DIRECCION_AADUANA'),
                        $AADUANA->__GET('CONTACTO_AADUANA'),
                        $AADUANA->__GET('TELEFONO_AADUANA'),
                        $AADUANA->__GET('EMAIL_AADUANA'),
                        $AADUANA->__GET('ID_COMUNA'),
                        $AADUANA->__GET('ID_EMPRESA'),
                        $AADUANA->__GET('ID_USUARIOI'),
                        $AADUANA->__GET('ID_USUARIOM')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarAaduana($id)
    {
        try {
            $sql = "DELETE FROM  fruta_aaduana  WHERE  ID_AADUANA =" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarAaduana(AADUANA $AADUANA)
    {

        try {
            if ($AADUANA->__GET('ID_COMUNA') == NULL) {
                $AADUANA->__SET('ID_COMUNA', NULL);
            }
            $query = "
                UPDATE  fruta_aaduana  SET
                    MODIFICACION = SYSDATE(),
                    RUT_AADUANA  = ?,
                    DV_AADUANA  = ?,
                    NOMBRE_AADUANA  = ?,
                    RAZON_SOCIAL_AADUANA  = ?,
                    GIRO_AADUANA  = ?,
                    DIRECCION_AADUANA  = ?,
                    CONTACTO_AADUANA  = ?,
                    TELEFONO_AADUANA  = ?,
                    EMAIL_AADUANA  = ?,
                    ID_COMUNA = ?,
                    ID_USUARIOM = ?
                WHERE  ID_AADUANA  = ?  ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $AADUANA->__GET('RUT_AADUANA'),
                        $AADUANA->__GET('DV_AADUANA'),
                        $AADUANA->__GET('NOMBRE_AADUANA'),
                        $AADUANA->__GET('RAZON_SOCIAL_AADUANA'),
                        $AADUANA->__GET('GIRO_AADUANA'),
                        $AADUANA->__GET('DIRECCION_AADUANA'),
                        $AADUANA->__GET('CONTACTO_AADUANA'),
                        $AADUANA->__GET('TELEFONO_AADUANA'),
                        $AADUANA->__GET('EMAIL_AADUANA'),
                        $AADUANA->__GET('ID_COMUNA'),
                        $AADUANA->__GET('ID_USUARIOM'),
                        $AADUANA->__GET('ID_AADUANA')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //FUNCIONES ESPECIALIZADAS 
    //CAMBIO DE ESTADO DE LA FILA
    //CAMBIO A DESACTIVADO
    public function deshabilitar(AADUANA $AADUANA)
    {

        try {
            $query = "
		UPDATE  fruta_aaduana  SET			
             ESTADO_REGISTRO  = 0
		WHERE  ID_AADUANA = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $AADUANA->__GET('ID_AADUANA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(AADUANA $AADUANA)
    {

        try {
            $query = "
		UPDATE  fruta_aaduana  SET			
             ESTADO_REGISTRO  = 1
		WHERE  ID_AADUANA = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $AADUANA->__GET('ID_AADUANA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarAaduanaPorEmpresaCBX($IDEMPRESA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_aaduana   
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
                                                    IFNULL(COUNT(NUMERO_AADUANA),0) AS 'NUMERO'
                                                FROM  fruta_aaduana 
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
