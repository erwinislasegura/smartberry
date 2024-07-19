<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/DDVALOR.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class DDVALOR_ADO
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
    public function listarDdvalor()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM liquidacion_ddvalor LIMIT 6;	");
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
    public function listarDdvalorCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM liquidacion_ddvalor  WHERE ESTADO_REGISTRO = 1;	");
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

    public function listarDdvalor2CBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM liquidacion_ddvalor  WHERE ESTADO_REGISTRO = 0;	");
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
    public function verDdvalor($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM liquidacion_ddvalor WHERE ID_DDVALOR= '" . $ID . "';");
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
    public function agregarDdvalor(DDVALOR $DDVALOR)
    {
        try {

            if ($DDVALOR->__GET('ID_ESTANDAR') == NULL) {
                $DDVALOR->__SET('ID_ESTANDAR', NULL);
            }
            if ($DDVALOR->__GET('ID_TCALIBRE') == NULL) {
                $DDVALOR->__SET('ID_TCALIBRE', NULL);
            }
            $query =
                "INSERT INTO liquidacion_ddvalor 
                                        (
                                            VALOR_DDVALOR,  
                                            CALIBRE,   
                                            ESTANDAR,   
                                           
                                            ID_ESTANDAR,  
                                            ID_TCALIBRE,  

                                            ID_USUARIOI,  
                                            ID_USUARIOM,  

                                            ID_DVALOR,

                                            INGRESO, 
                                            MODIFICACION, 
                                            ESTADO, 
                                            ESTADO_REGISTRO
                                        ) 
            VALUES
	       	(?, ?, ?,  ?, ?,  ?, ?,   ?, SYSDATE(),SYSDATE(), 1, 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DDVALOR->__GET('VALOR_DDVALOR'),
                        $DDVALOR->__GET('CALIBRE'),
                        $DDVALOR->__GET('ESTANDAR'),

                        $DDVALOR->__GET('ID_ESTANDAR'),
                        $DDVALOR->__GET('ID_TCALIBRE'),

                        $DDVALOR->__GET('ID_USUARIOI'),
                        $DDVALOR->__GET('ID_USUARIOM'),
                        
                        $DDVALOR->__GET('ID_DVALOR')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarDdvalor($id)
    {
        try {
            $sql = "DELETE FROM liquidacion_ddvalor WHERE ID_DVALOR=" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarDdvalor(DDVALOR $DDVALOR)
    {

        try {
      
            if ($DDVALOR->__GET('ID_ESTANDAR') == NULL) {
                $DDVALOR->__SET('ID_ESTANDAR', NULL);
            }
            if ($DDVALOR->__GET('ID_TCALIBRE') == NULL) {
                $DDVALOR->__SET('ID_TCALIBRE', NULL);
            }
            $query = "
                    UPDATE liquidacion_ddvalor SET
                        MODIFICACION = SYSDATE(),

                        VALOR_DDVALOR = ?,    
                        CALIBRE= ?,        
                        ESTANDAR= ?,      

                        ID_ESTANDAR= ?,
                        ID_TCALIBRE= ?,

                        ID_USUARIOM= ?,
                        ID_DVALOR= ?                        
                    WHERE ID_DDVALOR = ?  ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        
                        $DDVALOR->__GET('VALOR_DDVALOR'),
                        $DDVALOR->__GET('CALIBRE'),
                        $DDVALOR->__GET('ESTANDAR'),

                        $DDVALOR->__GET('ID_ESTANDAR'),
                        $DDVALOR->__GET('ID_TCALIBRE'),

                        $DDVALOR->__GET('ID_USUARIOM'),                        
                        $DDVALOR->__GET('ID_DVALOR'),  
                        $DDVALOR->__GET('ID_DDVALOR')


                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //FUNCIONES ESPECIALIZADAS 


    //LISTAR POR INSTRUCTIVO CARGA
    public function buscarPorDvalor($IDDVALOR)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM liquidacion_ddvalor 
                                                WHERE ID_DVALOR = '" . $IDDVALOR . "'  
                                                AND ESTADO_REGISTRO = 1;	");
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

    
    public function obtenrTotalPorDvalor($IDDVALOR)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                    IFNULL(SUM(VALOR_DDVALOR),0) AS 'TOTAL'
                                                FROM liquidacion_ddvalor 
                                                WHERE ID_DVALOR = '" . $IDDVALOR . "'  
                                                AND ESTADO_REGISTRO = 1;	");
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




    //OTRAS FUNCIONES
    //CAMBIO DE ESTADO DE LA FILA
    //CAMBIO A DESACTIVADO
    public function deshabilitar(DDVALOR $DDVALOR)
    {

        try {
            $query = "
                UPDATE liquidacion_ddvalor SET			
                    ESTADO_REGISTRO = 0
                WHERE ID_DDVALOR= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DDVALOR->__GET('ID_DDVALOR')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(DDVALOR $DDVALOR)
    {

        try {
            $query = "
                UPDATE liquidacion_ddvalor SET			
                    ESTADO_REGISTRO = 1
                WHERE ID_DDVALOR= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DDVALOR->__GET('ID_DDVALOR')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //CAMBIO DE ESTADO DE LA FILA

    public function cerrado(DDVALOR $DDVALOR)
    {

        try {
            $query = "
                UPDATE liquidacion_ddvalor SET			
                    ESTADO = 0
                WHERE ID_DDVALOR= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DDVALOR->__GET('ID_DDVALOR')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function abierto(DDVALOR $DDVALOR)
    {

        try {
            $query = "
                UPDATE liquidacion_ddvalor SET			
                    ESTADO = 1
                WHERE ID_DDVALOR= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DDVALOR->__GET('ID_DDVALOR')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}
