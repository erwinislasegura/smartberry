<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/PROVEEDOR.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';


//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class PROVEEDOR_ADO
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
    public function listarProveedor()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM   material_proveedor   limit 8 WHERE ESTADO_REGISTRO = 1;	");
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
    public function listarProveedorCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM   material_proveedor   WHERE ESTADO_REGISTRO = 1;	");
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

    public function listarProveedor2CBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM   material_proveedor   WHERE ESTADO_REGISTRO = 0;	");
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
    public function verProveedor($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM   material_proveedor   WHERE   ID_PROVEEDOR  = '" . $ID . "';");
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

    public function agregarProveedor(PROVEEDOR $PROVEEDOR)
    {
        try {

            if($PROVEEDOR->__GET('ID_COMUNA')==NULL){
                $PROVEEDOR->__SET('ID_COMUNA', NULL);
            }
            $query =
                "INSERT INTO   material_proveedor   (
                                                      RUT_PROVEEDOR  ,
                                                      DV_PROVEEDOR  ,
                                                      RAZON_PROVEEDOR  ,
                                                      NUMERO_PROVEEDOR  ,
                                                      NOMBRE_PROVEEDOR  ,
                                                      GIRO_PROVEEDOR  ,
                                                      DIRECCION_PROVEEDOR  ,
                                                      TELEFONO_PROVEEDOR  ,
                                                      EMAIL_PROVEEDOR  ,
                                                      ID_EMPRESA  ,
                                                      ID_COMUNA  ,
                                                      ID_USUARIOI  ,
                                                      ID_USUARIOM  ,
                                                      INGRESO  ,
                                                      MODIFICACION  , 
                                                      ESTADO_REGISTRO  
                                                ) VALUES
	       	( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,  SYSDATE() , SYSDATE(), 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $PROVEEDOR->__GET('RUT_PROVEEDOR'),
                        $PROVEEDOR->__GET('DV_PROVEEDOR'),
                        $PROVEEDOR->__GET('RAZON_PROVEEDOR'),
                        $PROVEEDOR->__GET('NUMERO_PROVEEDOR'),
                        $PROVEEDOR->__GET('NOMBRE_PROVEEDOR'),
                        $PROVEEDOR->__GET('GIRO_PROVEEDOR'),
                        $PROVEEDOR->__GET('DIRECCION_PROVEEDOR'),
                        $PROVEEDOR->__GET('TELEFONO_PROVEEDOR'),
                        $PROVEEDOR->__GET('EMAIL_PROVEEDOR'),
                        $PROVEEDOR->__GET('ID_EMPRESA'),
                        $PROVEEDOR->__GET('ID_COMUNA'),
                        $PROVEEDOR->__GET('ID_USUARIOI'),
                        $PROVEEDOR->__GET('ID_USUARIOM')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarProveedor($id)
    {
        try {
            $sql = "DELETE FROM   material_proveedor   WHERE   ID_PROVEEDOR  =" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }




    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarProveedor(PROVEEDOR $PROVEEDOR)
    {
        try {
            
            if($PROVEEDOR->__GET('ID_COMUNA')==NULL){
                $PROVEEDOR->__SET('ID_COMUNA', NULL);
            }
            $query = "
		UPDATE   material_proveedor   SET
              MODIFICACION  = SYSDATE(),
              RUT_PROVEEDOR  = ?,
              DV_PROVEEDOR  = ?,
              RAZON_PROVEEDOR  = ?,
              NOMBRE_PROVEEDOR  = ?,
              GIRO_PROVEEDOR  = ?,
              DIRECCION_PROVEEDOR  = ?,
              TELEFONO_PROVEEDOR  = ?,
              EMAIL_PROVEEDOR  = ?,
              ID_EMPRESA  = ?  ,
              ID_COMUNA  = ?   ,
              ID_USUARIOM  = ?           
		WHERE   ID_PROVEEDOR  = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $PROVEEDOR->__GET('RUT_PROVEEDOR'),
                        $PROVEEDOR->__GET('DV_PROVEEDOR'),
                        $PROVEEDOR->__GET('RAZON_PROVEEDOR'),
                        $PROVEEDOR->__GET('NOMBRE_PROVEEDOR'),
                        $PROVEEDOR->__GET('GIRO_PROVEEDOR'),
                        $PROVEEDOR->__GET('DIRECCION_PROVEEDOR'),
                        $PROVEEDOR->__GET('TELEFONO_PROVEEDOR'),
                        $PROVEEDOR->__GET('EMAIL_PROVEEDOR'),
                        $PROVEEDOR->__GET('ID_EMPRESA'),
                        $PROVEEDOR->__GET('ID_COMUNA'),
                        $PROVEEDOR->__GET('ID_USUARIOM'),
                        $PROVEEDOR->__GET('ID_PROVEEDOR')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //FUNCIONES ESPECIALIZADAS 
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(PROVEEDOR $PROVEEDOR)
    {

        try {
            $query = "
    UPDATE   material_proveedor   SET				
      MODIFICACION  = SYSDATE(),	
              ESTADO_REGISTRO   = 0
    WHERE   ID_PROVEEDOR  = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $PROVEEDOR->__GET('ID_PROVEEDOR')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(PROVEEDOR $PROVEEDOR)
    {
        try {
            $query = "
    UPDATE   material_proveedor   SET					
      MODIFICACION  = SYSDATE(),
              ESTADO_REGISTRO   = 1
    WHERE   ID_PROVEEDOR  = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $PROVEEDOR->__GET('ID_PROVEEDOR')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function listarProveedorPorEmpresaCBX($IDEMPRESA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM   material_proveedor   WHERE ESTADO_REGISTRO = 1  AND ID_EMPRESA = '" . $IDEMPRESA . "';	");
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
                                                IFNULL(COUNT(NUMERO_PROVEEDOR),0) AS 'NUMERO'
                                            FROM   material_proveedor  
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
 ?>