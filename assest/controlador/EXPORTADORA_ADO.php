<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/EXPORTADORA.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class EXPORTADORA_ADO
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
    //LISTAR TODO CON LIMITE DE 8 FILAS       
    public function listarExportadora()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_exportadora  LIMIT 6;	");
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
    public function listarExportadoraCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_exportadora  WHERE  ESTADO_REGISTRO  = 1;	");
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
    public function listarExportadora2CBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_exportadora  WHERE  ESTADO_REGISTRO  = 0 ;	");
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
    public function verExportadora($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_exportadora  WHERE  ID_EXPORTADORA = '" . $ID . "';");
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
    public function buscarNombreExportadora($NOMBRE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_exportadora  WHERE  NOMBRE_EXPORTADORA  LIKE '%" . $NOMBRE . "%';");
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
    public function agregarExportadora(EXPORTADORA $EXPORTADORA)
    {
        try {

            if ($EXPORTADORA->__GET('ID_COMUNA') == NULL) {
                $EXPORTADORA->__SET('ID_COMUNA', NULL);
            }

            $query =
                "INSERT INTO  fruta_exportadora  ( 
                                                 NUMERO_EXPORTADORA , 
                                                 RUT_EXPORTADORA , 
                                                 DV_EXPORTADORA , 
                                                 NOMBRE_EXPORTADORA ,
                                                 RAZON_SOCIAL_EXPORTADORA ,  
                                                 GIRO_EXPORTADORA ,  
                                                 DIRECCION_EXPORTADORA , 
                                                 ID_COMUNA ,    
                                                 ID_EMPRESA , 
                                                 ID_USUARIOI , 
                                                 ID_USUARIOM , 
                                                 CONTACTO1_EXPORTADORA ,   EMAIL1_EXPORTADORA ,  TELEFONO1_EXPORTADORA , 
                                                 CONTACTO2_EXPORTADORA ,   EMAIL2_EXPORTADORA ,  TELEFONO2_EXPORTADORA , 
                                                 LOGO_EXPORTADORA ,
                                                 INGRESO ,
                                                 MODIFICACION ,
                                                 ESTADO_REGISTRO 
                                            ) VALUES
	       	(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, SYSDATE(), SYSDATE(),  1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $EXPORTADORA->__GET('NUMERO_EXPORTADORA'),
                        $EXPORTADORA->__GET('RUT_EXPORTADORA'),
                        $EXPORTADORA->__GET('DV_EXPORTADORA'),
                        $EXPORTADORA->__GET('NOMBRE_EXPORTADORA'),
                        $EXPORTADORA->__GET('RAZON_SOCIAL_EXPORTADORA'),
                        $EXPORTADORA->__GET('GIRO_EXPORTADORA'),
                        $EXPORTADORA->__GET('DIRECCION_EXPORTADORA'),
                        $EXPORTADORA->__GET('ID_COMUNA'),
                        $EXPORTADORA->__GET('ID_EMPRESA'),
                        $EXPORTADORA->__GET('ID_USUARIOI'),
                        $EXPORTADORA->__GET('ID_USUARIOM'),
                        $EXPORTADORA->__GET('CONTACTO1_EXPORTADORA'),
                        $EXPORTADORA->__GET('EMAIL1_EXPORTADORA'),
                        $EXPORTADORA->__GET('TELEFONO1_EXPORTADORA'),
                        $EXPORTADORA->__GET('CONTACTO2_EXPORTADORA'),
                        $EXPORTADORA->__GET('EMAIL2_EXPORTADORA'),
                        $EXPORTADORA->__GET('TELEFONO2_EXPORTADORA'),
                        $EXPORTADORA->__GET('LOGO_EXPORTADORA')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarExportadora(EXPORTADORA $EXPORTADORA)
    {

        try {
            if ($EXPORTADORA->__GET('ID_COMUNA') == NULL) {
                $EXPORTADORA->__SET('ID_COMUNA', NULL);
            }

            $query = "
                    UPDATE  fruta_exportadora  SET
                         MODIFICACION = SYSDATE(),
                         RUT_EXPORTADORA  = ?,
                         DV_EXPORTADORA  = ?,
                         NOMBRE_EXPORTADORA  = ?,
                         RAZON_SOCIAL_EXPORTADORA = ?,
                         GIRO_EXPORTADORA = ?,
                         DIRECCION_EXPORTADORA = ?,
                         ID_COMUNA = ?,
                         ID_EMPRESA = ?,
                         ID_USUARIOM = ?,
                         CONTACTO1_EXPORTADORA  = ?,
                         EMAIL1_EXPORTADORA  = ?,
                         TELEFONO1_EXPORTADORA  = ?,
                         CONTACTO2_EXPORTADORA  = ?,
                         EMAIL2_EXPORTADORA  = ?,
                         TELEFONO2_EXPORTADORA  = ?,
                         LOGO_EXPORTADORA  = ?
                    WHERE  ID_EXPORTADORA = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXPORTADORA->__GET('RUT_EXPORTADORA'),
                        $EXPORTADORA->__GET('DV_EXPORTADORA'),
                        $EXPORTADORA->__GET('NOMBRE_EXPORTADORA'),
                        $EXPORTADORA->__GET('RAZON_SOCIAL_EXPORTADORA'),
                        $EXPORTADORA->__GET('GIRO_EXPORTADORA'),
                        $EXPORTADORA->__GET('DIRECCION_EXPORTADORA'),
                        $EXPORTADORA->__GET('ID_COMUNA'),
                        $EXPORTADORA->__GET('ID_EMPRESA'),
                        $EXPORTADORA->__GET('ID_USUARIOM'),
                        $EXPORTADORA->__GET('CONTACTO1_EXPORTADORA'),
                        $EXPORTADORA->__GET('EMAIL1_EXPORTADORA'),
                        $EXPORTADORA->__GET('TELEFONO1_EXPORTADORA'),
                        $EXPORTADORA->__GET('CONTACTO2_EXPORTADORA'),
                        $EXPORTADORA->__GET('EMAIL2_EXPORTADORA'),
                        $EXPORTADORA->__GET('TELEFONO2_EXPORTADORA'),
                        $EXPORTADORA->__GET('LOGO_EXPORTADORA'),
                        $EXPORTADORA->__GET('ID_EXPORTADORA')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarexportadora($id)
    {
        try {
            $sql = "DELETE FROM  fruta_exportadora  WHERE  nombre_exportadora =" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //FUNCIONES ESPECIALIZADAS 
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(EXPORTADORA $EXPORTADORA)
    {

        try {
            $query = "
		UPDATE  fruta_exportadora  SET			
             ESTADO_REGISTRO  = 0
		WHERE  ID_EXPORTADORA = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXPORTADORA->__GET('ID_EXPORTADORA')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(EXPORTADORA $EXPORTADORA)
    {
        try {
            $query = "
		UPDATE  fruta_exportadora  SET			
             ESTADO_REGISTRO  = 1
		WHERE  ID_EXPORTADORA = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXPORTADORA->__GET('ID_EXPORTADORA')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //FUNCION ESPECIALIZADAS
    
    public function listarExportadoraPorEmpresaCBX($EMPRESA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * 
                                               FROM  fruta_exportadora  
                                               WHERE  ESTADO_REGISTRO  = 1
                                               AND ID_EMPRESA =  '".$EMPRESA."';	");
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
                                                    IFNULL(COUNT(NUMERO_EXPORTADORA),0) AS 'NUMERO'
                                                FROM  fruta_exportadora 
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
