<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/VALORP.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';
//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class VALORP_ADO
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
    public function listarValor()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM liquidacion_valorp limit 6;	");
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
    public function listarValorCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM liquidacion_valorp ;	");
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
    public function verValor($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,
                                             DATE_FORMAT(FECHA_VALOR, '%Y-%m-%d') AS 'FECHA',
                                             DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                             DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' 
                                             FROM liquidacion_valorp
                                             WHERE ID_VALOR= '" . $ID . "';");
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
    public function verValor2($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *
                                                    , DATE_FORMAT(FECHA_VALOR, '%d/%m/%Y') AS 'FECHA'  
                                                    , DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO'
                                                    , DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION'
                                            FROM liquidacion_valorp
                                            WHERE ID_VALOR= '" . $ID . "';");
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

    public function verValorPorIcarga($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                ID_VALOR
                                                FROM liquidacion_valorp
                                                WHERE ID_ICARGA= '" . $ID . "';");
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
    public function agregarValor(VALORP $VALORP)
    {
        try {
            $query =
                "INSERT INTO liquidacion_valorp ( 
                                                NUMERO_VALOR, 
                                                FECHA_VALOR, 
                                                OBSERVACION_VALOR, 

                                                ID_ICARGA,  
                                                ID_EMPRESA, 
                                                ID_TEMPORADA, 

                                                ID_USUARIOI, 
                                                ID_USUARIOM, 

                                                INGRESO, 
                                                MODIFICACION, 
                                                ESTADO, 
                                                ESTADO_REGISTRO
                                            )
             VALUES
               ( ?, ?, ?,    ?, ?, ?,   ?, ?,     SYSDATE(),  SYSDATE(),  1, 1);";

            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $VALORP->__GET('NUMERO_VALOR'),
                        $VALORP->__GET('FECHA_VALOR'),
                        $VALORP->__GET('OBSERVACION_VALOR'),

                        $VALORP->__GET('ID_ICARGA'),
                        $VALORP->__GET('ID_EMPRESA'),
                        $VALORP->__GET('ID_TEMPORADA'),

                        $VALORP->__GET('ID_USUARIOI'),
                        $VALORP->__GET('ID_USUARIOM')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarValor($id)
    {
        try {
            $sql = "DELETE FROM liquidacion_valorp WHERE ID_VALOR=" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarValor(VALORP $VALORP)
    {
        try {
            $query = "
                UPDATE liquidacion_valorp SET
                        MODIFICACION = SYSDATE(),
                        
                        FECHA_VALOR = ?,
                        OBSERVACION_VALOR= ?,

                        ID_USUARIOM = ? 
                WHERE ID_VALOR= ?  ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $VALORP->__GET('FECHA_VALOR'),
                        $VALORP->__GET('OBSERVACION_VALOR'),
                        $VALORP->__GET('ID_USUARIOM'),
                        $VALORP->__GET('ID_VALOR')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

//VISUALIZAR




    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(VALORP $VALORP)
    {

        try {
            $query = "
                    UPDATE liquidacion_valorp SET			
                            ESTADO_REGISTRO = 0
                    WHERE ID_VALOR= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $VALORP->__GET('ID_VALOR')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(VALORP $VALORP)
    {
        try {
            $query = "
                UPDATE liquidacion_valorp SET			
                        ESTADO_REGISTRO = 1
                WHERE ID_VALOR= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $VALORP->__GET('ID_VALOR')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //CAMBIO ESTADO
    //ABIERTO 1
    public function abierto(VALORP $VALORP)
    {
        try {
            $query = "
                    UPDATE liquidacion_valorp SET			
                            ESTADO = 1
                    WHERE ID_VALOR= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $VALORP->__GET('ID_VALOR')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CERRADO 0
    public function  cerrado(VALORP $VALORP)
    {
        try {
            $query = "
                    UPDATE liquidacion_valorp SET			
                            ESTADO = 0
                    WHERE ID_VALOR= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $VALORP->__GET('ID_VALOR')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //LISTAR
    public function listarValorCerradoEmpresaTemporadaCBX($EMPRESA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                FECHA_VALOR AS 'FECHA',  
                                                INGRESO AS 'INGRESO',
                                                MODIFICACION AS 'MODIFICACION'
                                        FROM liquidacion_valorp                                                                           
                                        WHERE ESTADO_REGISTRO = 1
                                        AND ESTADO = 0
                                        AND  ID_EMPRESA = '" . $EMPRESA . "' 
                                        AND ID_TEMPORADA = '" . $TEMPORADA . "';	");
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
    public function listarValorEmpresaTemporadaCBX($EMPRESA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                FECHA_VALOR AS 'FECHA',  
                                                INGRESO AS 'INGRESO',
                                                MODIFICACION AS 'MODIFICACION'
                                        FROM liquidacion_valorp                                                                           
                                        WHERE ESTADO_REGISTRO = 1
                                        AND  ID_EMPRESA = '" . $EMPRESA . "' 
                                        AND ID_TEMPORADA = '" . $TEMPORADA . "';	");
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
    
    public function listarValorEmpresaPlantaTemporadaCBX2($EMPRESA,  $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                DATE_FORMAT(FECHA_VALOR, '%d-%m-%Y') AS 'FECHA',  
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION'
                                        FROM liquidacion_valorp                                                                           
                                        WHERE ESTADO_REGISTRO = 1
                                        AND ID_EMPRESA = '" . $EMPRESA . "' 
                                        AND ID_TEMPORADA = '" . $TEMPORADA . "';	");
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





    //OTRAS FUNCIONALIDADES

    //CONSULTA PARA OBTENER LA FILA EN EL MISMO MOMENTO DE REGISTRAR LA FILA
    public function obtenerId($FECHAVALOR, $EMPRESA,  $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare(" SELECT *
                                        FROM liquidacion_valorp
                                        WHERE 
                                             FECHA_VALOR LIKE '" . $FECHAVALOR . "'
                                             AND DATE_FORMAT(INGRESO, '%Y-%m-%d %H:%i') =  DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i') 
                                             AND DATE_FORMAT(MODIFICACION, '%Y-%m-%d %H:%i') = DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i')   
                                             AND ID_EMPRESA = '" . $EMPRESA . "'                                      
                                             AND ID_TEMPORADA = '" . $TEMPORADA . "'
                                             ORDER BY ID_VALOR DESC
                                            
                                             ; ");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            // var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //BUSCAR FECHA ACTUAL DEL SISTEMA
    public function obtenerFecha()
    {
        try {

            $datos = $this->conexion->prepare("SELECT CURDATE() AS 'FECHA' , DATE_FORMAT(NOW( ), '%H:%i') AS 'HORA'   ;");
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

    public function obtenerNumero($EMPRESA,  $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare(" SELECT  COUNT(IFNULL(NUMERO_VALOR,0)) AS 'NUMERO'
                                            FROM liquidacion_valorp
                                            WHERE  
                                                ID_EMPRESA = '" . $EMPRESA . "' 
                                            AND ID_TEMPORADA = '" . $TEMPORADA . "'     
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
