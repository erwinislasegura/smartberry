<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/PCDESPACHO.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class PCDESPACHO_ADO
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
    public function listarPcdespacho()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_pcdespacho limit 8;	");
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
    public function listarPcdespachoCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_pcdespacho WHERE ESTADO_REGISTRO = 1;	");
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
    public function listarPcdespachoCBX2()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_pcdespachoWHERE  ESTADO_REGISTRO = 0;;	");
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
    public function verPcdespacho($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO' ,
                                                DATE_FORMAT(MODIFICACION, '%Y-%m-%d')  AS 'MODIFICACION'  
                                                FROM fruta_pcdespacho WHERE ID_PCDESPACHO= '" . $ID . "';");
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

    public function verPcdespacho2($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO' ,
                                                       DATE_FORMAT(MODIFICACION, '%d-%m-%Y')  AS 'MODIFICACION'  ,
                                                       DATE_FORMAT(FECHA_PCDESPACHO, '%d-%m-%Y')  AS 'FECHA'  ,
                                                       FORMAT(CANTIDAD_ENVASE_PCDESPACHO,0,'de_DE') AS 'ENVASE',
                                                       FORMAT(KILOS_NETO_PCDESPACHO,2,'de_DE') AS 'NETO'
                                                FROM fruta_pcdespacho 
                                                WHERE ID_PCDESPACHO= '" . $ID . "';");
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
    public function agregarPcdespacho(PCDESPACHO $PCDESPACHO)
    {
        try {
            $query =
                "INSERT INTO fruta_pcdespacho (     
                                                NUMERO_PCDESPACHO,
                                                FECHA_PCDESPACHO,
                                                MOTIVO_PCDESPACHO,
                                                TINPUSDA,
                                                ID_EMPRESA, 
                                                ID_PLANTA, 
                                                ID_TEMPORADA, 
                                                ID_USUARIOI,
                                                ID_USUARIOM,
                                                CANTIDAD_ENVASE_PCDESPACHO,
                                                KILOS_NETO_PCDESPACHO,
                                                INGRESO,
                                                MODIFICACION,
                                                ESTADO,
                                                ESTADO_REGISTRO,  
                                                ESTADO_PCDESPACHO
                                            ) 
            VALUES
	       	( ?, ?, ?, ?, ?, ?, ?, ?, ?,  0, 0, SYSDATE(), SYSDATE(),  1, 1, 1 );";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $PCDESPACHO->__GET('NUMERO_PCDESPACHO'),
                        $PCDESPACHO->__GET('FECHA_PCDESPACHO'),
                        $PCDESPACHO->__GET('MOTIVO_PCDESPACHO'),
                        $PCDESPACHO->__GET('TINPUSDA'),
                        $PCDESPACHO->__GET('ID_EMPRESA'),
                        $PCDESPACHO->__GET('ID_PLANTA'),
                        $PCDESPACHO->__GET('ID_TEMPORADA'),
                        $PCDESPACHO->__GET('ID_USUARIOI'),
                        $PCDESPACHO->__GET('ID_USUARIOM')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarPcdespacho($id)
    {
        try {
            $sql = "DELETE FROM fruta_pcdespacho WHERE ID_PCDESPACHO=" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }




    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarPcdespacho(PCDESPACHO $PCDESPACHO)
    {
        try {
            $query = "
		UPDATE fruta_pcdespacho SET
                    MODIFICACION = SYSDATE() ,
                    CANTIDAD_ENVASE_PCDESPACHO= ?,
                    KILOS_NETO_PCDESPACHO= ?, 
                    FECHA_PCDESPACHO = ?,
                    MOTIVO_PCDESPACHO= ?,
                    TINPUSDA= ?,
                    ID_USUARIOM = ?             
		WHERE ID_PCDESPACHO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $PCDESPACHO->__GET('CANTIDAD_ENVASE_PCDESPACHO'),
                        $PCDESPACHO->__GET('KILOS_NETO_PCDESPACHO'),
                        $PCDESPACHO->__GET('FECHA_PCDESPACHO'),
                        $PCDESPACHO->__GET('MOTIVO_PCDESPACHO'),
                        $PCDESPACHO->__GET('TINPUSDA'),
                        $PCDESPACHO->__GET('ID_USUARIOM'),
                        $PCDESPACHO->__GET('ID_PCDESPACHO')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //FUNCIONES ESPECIALIZADAS
    //LISTAR
    public function listarPcdespachoCerradoEmpresaPlantaTemporadaCBX($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * , 
                                                    DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO' ,
                                                    DATE_FORMAT(MODIFICACION, '%Y-%m-%d')  AS 'MODIFICACION'  ,
                                                    FECHA_PCDESPACHO   AS 'FECHA'  ,
                                                    IFNULL(CANTIDAD_ENVASE_PCDESPACHO,0) AS 'ENVASE',
                                                    IFNULL(KILOS_NETO_PCDESPACHO,0) AS 'NETO'
                                                FROM fruta_pcdespacho 
                                                WHERE ESTADO_REGISTRO = 1
                                                AND ESTADO = 0
                                                AND ID_EMPRESA = '" . $EMPRESA . "' 
                                                AND ID_PLANTA = '" . $PLANTA . "'
                                                AND ID_TEMPORADA = '" . $TEMPORADA . "'
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
    public function listarPcdespachoEmpresaPlantaTemporadaCBX($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * , 
                                                    DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO' ,
                                                    DATE_FORMAT(MODIFICACION, '%Y-%m-%d')  AS 'MODIFICACION'  ,
                                                    FECHA_PCDESPACHO   AS 'FECHA'  ,
                                                    IFNULL(CANTIDAD_ENVASE_PCDESPACHO,0) AS 'ENVASE',
                                                    IFNULL(KILOS_NETO_PCDESPACHO,0) AS 'NETO'
                                                FROM fruta_pcdespacho 
                                                WHERE ESTADO_REGISTRO = 1
                                                AND ID_EMPRESA = '" . $EMPRESA . "' 
                                                AND ID_PLANTA = '" . $PLANTA . "'
                                                AND ID_TEMPORADA = '" . $TEMPORADA . "'
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

    public function listarPcdespachoEmpresaPlantaTemporada2CBX($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * , 
                                                    DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO' ,
                                                    DATE_FORMAT(MODIFICACION, '%d-%m-%Y')  AS 'MODIFICACION'  ,
                                                    DATE_FORMAT(FECHA_PCDESPACHO, '%d-%m-%Y')  AS 'FECHA'  ,
                                                    FORMAT(IFNULL(CANTIDAD_ENVASE_PCDESPACHO,0),0,'de_DE') AS 'ENVASE',
                                                    FORMAT(IFNULL(KILOS_NETO_PCDESPACHO,0),2,'de_DE') AS 'NETO'
                                                FROM fruta_pcdespacho 
                                                WHERE ESTADO_REGISTRO = 1
                                                AND ID_EMPRESA = '" . $EMPRESA . "' 
                                                AND ID_PLANTA = '" . $PLANTA . "'
                                                AND ID_TEMPORADA = '" . $TEMPORADA . "'
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

    //BUSCADOR
    public function buscarPorEmpresaPlantaTemporada($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * 
                                            FROM fruta_pcdespacho 
                                            WHERE ESTADO_REGISTRO = 1
                                            AND  ESTADO_PCDESPACHO BETWEEN 2   AND 3
                                            AND ID_EMPRESA = '" . $EMPRESA . "'
                                            AND ID_PLANTA = '" . $PLANTA . "'
                                            AND ID_TEMPORADA = '" . $TEMPORADA . "';");
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
    public function buscarPorEmpresaPlantaTemporadaSiInp($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * 
                                            FROM fruta_pcdespacho 
                                            WHERE ESTADO_REGISTRO = 1
                                            AND  ESTADO_PCDESPACHO BETWEEN 2   AND 3
                                            AND TINPUSDA =1
                                            AND ID_EMPRESA = '" . $EMPRESA . "'
                                            AND ID_PLANTA = '" . $PLANTA . "'
                                            AND ID_TEMPORADA = '" . $TEMPORADA . "';");
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

    public function buscarPorEmpresaPlantaTemporadaNoInp($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * 
                                            FROM fruta_pcdespacho 
                                            WHERE ESTADO_REGISTRO = 1
                                            AND ESTADO_PCDESPACHO BETWEEN 2   AND 3
                                            AND TINPUSDA = 0
                                            AND ID_EMPRESA = '" . $EMPRESA . "'
                                            AND ID_PLANTA = '" . $PLANTA . "'
                                            AND ID_TEMPORADA = '" . $TEMPORADA . "';");
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
    public function buscarPorEmpresaPlantaTemporada2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * , 
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO' ,
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y')  AS 'MODIFICACION'  ,
                                                DATE_FORMAT(FECHA_PCDESPACHO, '%d-%m-%Y')  AS 'FECHA'  ,
                                                FORMAT(CANTIDAD_ENVASE_PCDESPACHO,0,'de_DE') AS 'ENVASE',
                                                FORMAT(KILOS_NETO_PCDESPACHO,2,'de_DE') AS 'NETO'
                                            FROM fruta_pcdespacho 
                                            WHERE ESTADO_REGISTRO = 1
                                            AND  ESTADO_PCDESPACHO BETWEEN 2   AND 3
                                            AND ID_EMPRESA = '" . $EMPRESA . "'
                                            AND ID_PLANTA = '" . $PLANTA . "'
                                            AND ID_TEMPORADA = '" . $TEMPORADA . "';");
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
    public function buscarPorDespacho($IDDESEXPORTACION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_pcdespacho 
                                            WHERE ID_DESPACHOEX = '" . $IDDESEXPORTACION . "';");
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

    public function buscarPorDespacho2($IDDESEXPORTACION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_pcdespacho 
                                            WHERE ID_DESPACHOEX = '" . $IDDESEXPORTACION . "'
                                            AND ESTADO_REGISTRO = 1
                                            AND ESTADO_PCDESPACHO = 3;");
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

    //TOTALES

    public function obtenerTotalesPcdespachoCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT  
                                                    FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_PCDESPACHO),0),0,'de_DE') AS 'ENVASE',   
                                                    FORMAT(IFNULL(SUM(KILOS_NETO_PCDESPACHO),0),2,'de_DE') AS 'NETO' 
                                        FROM fruta_pcdespacho ;	");
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


    public function obtenerTotalesPcdespachoEmpresaPlantaTemporadaCBX($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT  
                                                    FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_PCDESPACHO),0),0,'de_DE') AS 'ENVASE',   
                                                    FORMAT(IFNULL(SUM(KILOS_NETO_PCDESPACHO),0),2,'de_DE') AS 'NETO' 
                                        FROM fruta_pcdespacho                                             
                                        WHERE ESTADO_REGISTRO = 1
                                        AND ID_EMPRESA = '" . $EMPRESA . "' 
                                        AND ID_PLANTA = '" . $PLANTA . "'
                                        AND ID_TEMPORADA = '" . $TEMPORADA . "' ;	");
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


    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO

    public function actualizarPcdespachoADespacho(PCDESPACHO $PCDESPACHO)
    {
        try {
            $query = "
                UPDATE fruta_pcdespacho SET
                    ID_DESPACHOEX= ?,
                    MODIFICACION = SYSDATE()        
                WHERE ID_PCDESPACHO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $PCDESPACHO->__GET('ID_DESPACHOEX'),
                        $PCDESPACHO->__GET('ID_PCDESPACHO')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //CAMBIO A DESACTIVADO
    public function deshabilitar(PCDESPACHO $PCDESPACHO)
    {

        try {
            $query = "
                UPDATE fruta_pcdespacho SET			
                        ESTADO_REGISTRO = 0
                WHERE ID_PCDESPACHO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $PCDESPACHO->__GET('ID_PCDESPACHO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(PCDESPACHO $PCDESPACHO)
    {
        try {
            $query = "
                UPDATE fruta_pcdespacho SET			
                        ESTADO_REGISTRO = 1
                WHERE ID_PCDESPACHO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $PCDESPACHO->__GET('ID_PCDESPACHO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //CAMBIO ESTADO
    //ABIERTO 1
    public function cerrado(PCDESPACHO $PCDESPACHO)
    {

        try {
            $query = "
                UPDATE fruta_pcdespacho SET			
                        ESTADO = 0
                WHERE ID_PCDESPACHO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $PCDESPACHO->__GET('ID_PCDESPACHO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function abierto(PCDESPACHO $PCDESPACHO)
    {

        try {
            $query = "
                UPDATE fruta_pcdespacho SET			
                        ESTADO = 1
                WHERE ID_PCDESPACHO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $PCDESPACHO->__GET('ID_PCDESPACHO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function creado(PCDESPACHO $PCDESPACHO)
    {
        try {
            $query = "
                UPDATE fruta_pcdespacho SET			
                        ESTADO_PCDESPACHO = 1
                WHERE ID_PCDESPACHO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $PCDESPACHO->__GET('ID_PCDESPACHO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function confirmado(PCDESPACHO $PCDESPACHO)
    {
        try {
            $query = "
                UPDATE fruta_pcdespacho SET			
                        ESTADO_PCDESPACHO = 2
                WHERE ID_PCDESPACHO= ? AND ESTADO_PCDESPACHO < 3 ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $PCDESPACHO->__GET('ID_PCDESPACHO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function enDespacho(PCDESPACHO $PCDESPACHO)
    {
        try {
            $query = "
                UPDATE fruta_pcdespacho SET			
                        ESTADO_PCDESPACHO = 3
                WHERE ID_PCDESPACHO= ? ";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $PCDESPACHO->__GET('ID_PCDESPACHO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function despachodo(PCDESPACHO $PCDESPACHO)
    {
        try {
            $query = "
                UPDATE fruta_pcdespacho SET			
                        ESTADO_PCDESPACHO = 4
                WHERE ID_PCDESPACHO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $PCDESPACHO->__GET('ID_PCDESPACHO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //OTRAS FUNCIONES7

    //CONSULTA PARA OBTENER LA FILA EN EL MISMO MOMENTO DE REGISTRAR LA FILA
    public function obtenerId($FECHADESPACHO, $MOTIVOPCDESPACHO, $EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare(" SELECT *
                                        FROM fruta_pcdespacho
                                        WHERE 
                                              FECHA_PCDESPACHO LIKE '" . $FECHADESPACHO . "'    
                                             AND MOTIVO_PCDESPACHO LIKE '" . $MOTIVOPCDESPACHO . "'   
                                             AND DATE_FORMAT(INGRESO, '%Y-%m-%d %H:%i') =  DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i') 
                                             AND DATE_FORMAT(MODIFICACION, '%Y-%m-%d %H:%i') = DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i')   
                                             AND ID_EMPRESA = '" . $EMPRESA . "'                                      
                                             AND ID_PLANTA = '" . $PLANTA . "'                                      
                                             AND ID_TEMPORADA = '" . $TEMPORADA . "'
                                             ORDER BY ID_PCDESPACHO DESC
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

    //BUSCAR FECHA ACTUAL DEL SISTEMA
    public function obtenerFecha()
    {
        try {

            $datos = $this->conexion->prepare("SELECT CURDATE() AS 'FECHA';");
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
    public function obtenerNumero($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare(" SELECT  COUNT(IFNULL(NUMERO_PCDESPACHO,0)) AS 'NUMERO'
                                            FROM fruta_pcdespacho
                                            WHERE  
                                                ID_EMPRESA = '" . $EMPRESA . "' 
                                            AND ID_PLANTA = '" . $PLANTA . "'
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
