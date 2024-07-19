<?php


include_once '../../assest/modelo/TRANSPORTE.php';
include_once '../../assest/config/BDCONFIG.php';

$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

class TRANSPORTE_ADO
{


    private $conexion;


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



    public function listarTransporte()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  transporte_transporte  limit 8;	");
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
    public function listarTransporteCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  transporte_transporte  WHERE  ESTADO_REGISTRO  = 1;	");
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

    public function listarTransporte2CBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  transporte_transporte  WHERE  ESTADO_REGISTRO  = 0;	");
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




    public function verTransporte($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  transporte_transporte  WHERE  ID_TRANSPORTE = '" . $ID . "';");
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



    public function buscarNombreTransporte($NOMBRE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  transporte_transporte  WHERE  NOMBRE_TRANSPORTE  LIKE '%" . $NOMBRE . "%';");
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



    public function agregarTransporte(TRANSPORTE $TRANSPORTE)
    {
        try {


            $query =
                "INSERT INTO  transporte_transporte  (   RUT_TRANSPORTE ,
                                                         DV_TRANSPORTE ,
                                                         NUMERO_TRANSPORTE ,
                                                         NOMBRE_TRANSPORTE ,
                                                         GIRO_TRANSPORTE ,
                                                         RAZON_SOCIAL_TRANSPORTE ,
                                                         DIRECCION_TRANSPORTE ,
                                                         CONTACTO_TRANSPORTE ,
                                                         TELEFONO_TRANSPORTE ,
                                                         EMAIL_TRANSPORTE ,
                                                         NOTA_TRANSPORTE , 
                                                         ID_EMPRESA ,
                                                         ID_USUARIOI ,
                                                         ID_USUARIOM ,
                                                         INGRESO ,
                                                         MODIFICACION , 
                                                         ESTADO_REGISTRO 
                                                ) VALUES
	       	( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,  SYSDATE() , SYSDATE(), 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $TRANSPORTE->__GET('RUT_TRANSPORTE'),
                        $TRANSPORTE->__GET('DV_TRANSPORTE'),
                        $TRANSPORTE->__GET('NUMERO_TRANSPORTE'),
                        $TRANSPORTE->__GET('NOMBRE_TRANSPORTE'),
                        $TRANSPORTE->__GET('GIRO_TRANSPORTE'),
                        $TRANSPORTE->__GET('RAZON_SOCIAL_TRANSPORTE'),
                        $TRANSPORTE->__GET('DIRECCION_TRANSPORTE'),
                        $TRANSPORTE->__GET('CONTACTO_TRANSPORTE'),
                        $TRANSPORTE->__GET('TELEFONO_TRANSPORTE'),
                        $TRANSPORTE->__GET('EMAIL_TRANSPORTE'),
                        $TRANSPORTE->__GET('NOTA_TRANSPORTE'),
                        $TRANSPORTE->__GET('ID_EMPRESA'),
                        $TRANSPORTE->__GET('ID_USUARIOI'),
                        $TRANSPORTE->__GET('ID_USUARIOM')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function eliminarTransporte($id)
    {
        try {
            $sql = "DELETE FROM  transporte_transporte  WHERE  ID_TRANSPORTE =" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function actualizarTransporte(TRANSPORTE $TRANSPORTE)
    {
        try {
            
          
            $query = "
                UPDATE  transporte_transporte  SET
                     MODIFICACION = SYSDATE(),
                     RUT_TRANSPORTE = ?,
                     DV_TRANSPORTE = ?,
                     NOMBRE_TRANSPORTE = ?,
                     GIRO_TRANSPORTE = ?,
                     RAZON_SOCIAL_TRANSPORTE = ?,
                     DIRECCION_TRANSPORTE = ?,
                     CONTACTO_TRANSPORTE = ?,
                     TELEFONO_TRANSPORTE = ?,
                     EMAIL_TRANSPORTE = ?,
                     NOTA_TRANSPORTE = ?,
                     ID_EMPRESA = ?  ,
                     ID_USUARIOM = ?          
                WHERE  ID_TRANSPORTE = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $TRANSPORTE->__GET('RUT_TRANSPORTE'),
                        $TRANSPORTE->__GET('DV_TRANSPORTE'),
                        $TRANSPORTE->__GET('NOMBRE_TRANSPORTE'),
                        $TRANSPORTE->__GET('GIRO_TRANSPORTE'),
                        $TRANSPORTE->__GET('RAZON_SOCIAL_TRANSPORTE'),
                        $TRANSPORTE->__GET('DIRECCION_TRANSPORTE'),
                        $TRANSPORTE->__GET('CONTACTO_TRANSPORTE'),
                        $TRANSPORTE->__GET('TELEFONO_TRANSPORTE'),
                        $TRANSPORTE->__GET('EMAIL_TRANSPORTE'),
                        $TRANSPORTE->__GET('NOTA_TRANSPORTE'),
                        $TRANSPORTE->__GET('ID_EMPRESA'),
                        $TRANSPORTE->__GET('ID_USUARIOM'),
                        $TRANSPORTE->__GET('ID_TRANSPORTE')

                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //FUNCIONES ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(TRANSPORTE $TRANSPORTE)
    {

        try {
            $query = "
    UPDATE  transporte_transporte  SET				
             MODIFICACION = SYSDATE(),	
             ESTADO_REGISTRO  = 0
    WHERE  ID_TRANSPORTE = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $TRANSPORTE->__GET('ID_TRANSPORTE')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(TRANSPORTE $TRANSPORTE)
    {
        try {
            $query = "
    UPDATE  transporte_transporte  SET				
             MODIFICACION = SYSDATE(),	
             ESTADO_REGISTRO  = 1
    WHERE  ID_TRANSPORTE = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $TRANSPORTE->__GET('ID_TRANSPORTE')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarTransportePorEmpresaCBX($IDEMPRESA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  transporte_transporte  WHERE  ESTADO_REGISTRO  = 1 AND ID_EMPRESA = '" . $IDEMPRESA . "';	");
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
                                                    IFNULL(COUNT(NUMERO_TRANSPORTE),0) AS 'NUMERO'
                                                FROM  transporte_transporte   
                                                WHERE ID_EMPRESA = '" . $IDEMPRESA . "'; ");
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
