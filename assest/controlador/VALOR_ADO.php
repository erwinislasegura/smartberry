<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/VALOR.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';
//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class VALOR_ADO
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

            $datos = $this->conexion->prepare("SELECT * FROM liquidacion_valor limit 6;	");
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

            $datos = $this->conexion->prepare("SELECT * FROM liquidacion_valor ;	");
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
                                             FROM liquidacion_valor
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
                                            FROM liquidacion_valor
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
                                                FROM liquidacion_valor
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
    public function agregarValor(VALOR $VALOR)
    {
        try {
            $query =
                "INSERT INTO liquidacion_valor ( 
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
                        $VALOR->__GET('NUMERO_VALOR'),
                        $VALOR->__GET('FECHA_VALOR'),
                        $VALOR->__GET('OBSERVACION_VALOR'),

                        $VALOR->__GET('ID_ICARGA'),
                        $VALOR->__GET('ID_EMPRESA'),
                        $VALOR->__GET('ID_TEMPORADA'),

                        $VALOR->__GET('ID_USUARIOI'),
                        $VALOR->__GET('ID_USUARIOM')
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
            $sql = "DELETE FROM liquidacion_valor WHERE ID_VALOR=" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarValor(VALOR $VALOR)
    {
        try {
            $query = "
                UPDATE liquidacion_valor SET
                        MODIFICACION = SYSDATE(),
                        
                        FECHA_VALOR = ?,
                        OBSERVACION_VALOR= ?,

                        ID_USUARIOM = ? 
                WHERE ID_VALOR= ?  ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $VALOR->__GET('FECHA_VALOR'),
                        $VALOR->__GET('OBSERVACION_VALOR'),
                        $VALOR->__GET('ID_USUARIOM'),
                        $VALOR->__GET('ID_VALOR')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

//VISUALIZAR




    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(VALOR $VALOR)
    {

        try {
            $query = "
                    UPDATE liquidacion_valor SET			
                            ESTADO_REGISTRO = 0
                    WHERE ID_VALOR= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $VALOR->__GET('ID_VALOR')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(VALOR $VALOR)
    {
        try {
            $query = "
                UPDATE liquidacion_valor SET			
                        ESTADO_REGISTRO = 1
                WHERE ID_VALOR= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $VALOR->__GET('ID_VALOR')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //CAMBIO ESTADO
    //ABIERTO 1
    public function abierto(VALOR $VALOR)
    {
        try {
            $query = "
                    UPDATE liquidacion_valor SET			
                            ESTADO = 1
                    WHERE ID_VALOR= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $VALOR->__GET('ID_VALOR')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CERRADO 0
    public function  cerrado(VALOR $VALOR)
    {
        try {
            $query = "
                    UPDATE liquidacion_valor SET			
                            ESTADO = 0
                    WHERE ID_VALOR= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $VALOR->__GET('ID_VALOR')
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
                                        FROM liquidacion_valor                                                                           
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
                                        FROM liquidacion_valor                                                                           
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
                                        FROM liquidacion_valor                                                                           
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
    
    public function buscarValorPorIcarga($IDICARGA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * 
                                                FROM liquidacion_valor 
                                                WHERE ID_ICARGA = '".$IDICARGA."'
                                                ;	");
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

    //CONSULTA PARA OBTENER LA FILA EN EL MISMO MOMENTO DE REGISTRAR LA FILA
    public function obtenerId($FECHAVALOR, $EMPRESA,  $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare(" SELECT *
                                        FROM liquidacion_valor
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
                                            FROM liquidacion_valor
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
