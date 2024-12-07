<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/DREPALETIZAJEEX.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class DREPALETIZAJEEX_ADO
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


    //REGISTRO DE UNA NUEVA FILA    
    public function agregarDrepaletizaje(DREPALETIZAJEEX $DREPALETIZAJEEX)
    {
        try {

            $query =
                "INSERT INTO fruta_drepaletizajeex (
                                                        FOLIO_NUEVO_DREPALETIZAJE,
                                                        FOLIO_MANUAL,  
                                                        FECHA_EMBALADO_DREPALETIZAJE,                                            
                                                        CANTIDAD_ENVASE_DREPALETIZAJE,
                                                        KILOS_NETO_DREPALETIZAJE,
                                                        KILOS_BRUTO_DREPALETIZAJE,
                                                        EMBOLSADO, 
                                                        STOCK, 
                                                        ID_TMANEJO, 
                                                        ID_TCALIBRE, 
                                                        ID_TEMBALAJE,
                                                        ID_FOLIO,
                                                        ID_ESTANDAR, 
                                                        ID_PRODUCTOR,
                                                        ID_VESPECIES,
                                                        ID_EXIEXPORTACION,
                                                        ID_REPALETIZAJE,
                                                        INGRESO,
                                                        MODIFICACION,
                                                        ESTADO,
                                                        ESTADO_REGISTRO,
                                                        ESTADO_FOLIO  
                                                    ) 
            VALUES
	       	( ?, ?, ?, ?, ?,   ?, ?, ?, ?, ?,   ?, ?, ?, ?, ?,   ?, ?,   SYSDATE(),  SYSDATE(), 1, 1 , ?);";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DREPALETIZAJEEX->__GET('FOLIO_NUEVO_DREPALETIZAJE'),
                        $DREPALETIZAJEEX->__GET('FOLIO_MANUAL'),
                        $DREPALETIZAJEEX->__GET('FECHA_EMBALADO_DREPALETIZAJE'),
                        $DREPALETIZAJEEX->__GET('CANTIDAD_ENVASE_DREPALETIZAJE'),
                        $DREPALETIZAJEEX->__GET('KILOS_NETO_DREPALETIZAJE'),
                        $DREPALETIZAJEEX->__GET('KILOS_BRUTO_DREPALETIZAJE'),
                        $DREPALETIZAJEEX->__GET('EMBOLSADO'),
                        $DREPALETIZAJEEX->__GET('STOCK'),
                        $DREPALETIZAJEEX->__GET('ID_TMANEJO'),
                        $DREPALETIZAJEEX->__GET('ID_TCALIBRE'),
                        $DREPALETIZAJEEX->__GET('ID_TEMBALAJE'),
                        $DREPALETIZAJEEX->__GET('ID_FOLIO'),
                        $DREPALETIZAJEEX->__GET('ID_ESTANDAR'),
                        $DREPALETIZAJEEX->__GET('ID_PRODUCTOR'),
                        $DREPALETIZAJEEX->__GET('ID_VESPECIES'),
                        $DREPALETIZAJEEX->__GET('ID_EXIEXPORTACION'),
                        $DREPALETIZAJEEX->__GET('ID_REPALETIZAJE'),
                        $DREPALETIZAJEEX->__GET('ESTADO_FOLIO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }





    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarDrepaletizaje(DREPALETIZAJEEX $DREPALETIZAJEEX)
    {
        try {
            $query = "
                UPDATE fruta_drepaletizajeex SET
                    MODIFICACION = SYSDATE()    ,
                    FECHA_EMBALADO_DREPALETIZAJE= ?,
                    CANTIDAD_ENVASE_DREPALETIZAJE= ?,
                    KILOS_NETO_DREPALETIZAJE= ?,       
                    KILOS_BRUTO_DREPALETIZAJE= ?,     
                    EMBOLSADO= ?,     
                    STOCK= ?,       
                    ID_TMANEJO= ?,
                    ID_TCALIBRE= ?,
                    ID_TEMBALAJE= ?,
                    ID_FOLIO= ?,
                    ID_ESTANDAR= ?,
                    ID_PRODUCTOR= ?,
                    ID_VESPECIES= ?,
                    ID_REPALETIZAJE = ?            
                WHERE ID_DREPALETIZAJE= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DREPALETIZAJEEX->__GET('FECHA_EMBALADO_DREPALETIZAJE'),
                        $DREPALETIZAJEEX->__GET('CANTIDAD_ENVASE_DREPALETIZAJE'),
                        $DREPALETIZAJEEX->__GET('KILOS_NETO_DREPALETIZAJE'),
                        $DREPALETIZAJEEX->__GET('KILOS_BRUTO_DREPALETIZAJE'),
                        $DREPALETIZAJEEX->__GET('EMBOLSADO'),
                        $DREPALETIZAJEEX->__GET('STOCK'),
                        $DREPALETIZAJEEX->__GET('ID_TMANEJO'),
                        $DREPALETIZAJEEX->__GET('ID_TCALIBRE'),
                        $DREPALETIZAJEEX->__GET('ID_TEMBALAJE'),
                        $DREPALETIZAJEEX->__GET('ID_FOLIO'),
                        $DREPALETIZAJEEX->__GET('ID_ESTANDAR'),
                        $DREPALETIZAJEEX->__GET('ID_PRODUCTOR'),
                        $DREPALETIZAJEEX->__GET('ID_VESPECIES'),
                        $DREPALETIZAJEEX->__GET('ID_REPALETIZAJE')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //VER   
    public function verDrepaletizaje($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_drepaletizajeex WHERE ID_DREPALETIZAJE= '" . $ID . "';");
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

    //LISTAS
    public function listarDrepaletizaje()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_drepaletizajeex limit 8;	");
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
    public function listarDrepaletizajeCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_drepaletizajeex WHERE ESTADO_REGISTRO = 1;	");
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
    public function listarDrepaletizajeCBX2()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_drepaletizajeexWHERE  ESTADO_REGISTRO = 0;;	");
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



    //CAMBIO DE ESTADO

    public function deshabilitar(DREPALETIZAJEEX $DREPALETIZAJEEX)
    {

        try {
            $query = "
            UPDATE fruta_drepaletizajeex SET			
                    ESTADO_REGISTRO = 0
            WHERE ID_DREPALETIZAJE= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DREPALETIZAJEEX->__GET('ID_DREPALETIZAJE')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(DREPALETIZAJEEX $DREPALETIZAJEEX)
    {
        try {
            $query = "
            UPDATE fruta_drepaletizajeex SET			
                    ESTADO_REGISTRO = 1
            WHERE ID_DREPALETIZAJE= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DREPALETIZAJEEX->__GET('ID_DREPALETIZAJE')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //CAMBIO ESTADO
    //ABIERTO 1
    public function abierto(DREPALETIZAJEEX $DREPALETIZAJEEX)
    {
        try {
            $query = "
                UPDATE fruta_drepaletizajeex SET			
                        ESTADO = 1
                WHERE ID_DREPALETIZAJE= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DREPALETIZAJEEX->__GET('ID_DREPALETIZAJE')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CERRADO 0
    public function  cerrado(DREPALETIZAJEEX $DREPALETIZAJEEX)
    {
        try {
            $query = "
                UPDATE fruta_drepaletizajeex SET			
                        ESTADO = 0
                WHERE ID_DREPALETIZAJE= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DREPALETIZAJEEX->__GET('ID_DREPALETIZAJE')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }





    //BUSCAR
    public function buscarDrepaletizaje($IDREPALETIZAJE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_drepaletizajeex WHERE ID_REPALETIZAJE= '" . $IDREPALETIZAJE . "' AND ESTADO_REGISTRO = 1;");
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
    public function buscarDrepaletizaje2($IDREPALETIZAJE)
    {
        try {
            $datos = $this->conexion->prepare("SELECT * ,           
                                                    DATE_FORMAT(FECHA_EMBALADO_DREPALETIZAJE, '%d-%m-%Y') AS 'EMBALADO',    
                                                    FORMAT(IFNULL(CANTIDAD_ENVASE_DREPALETIZAJE,0),0,'de_DE') AS 'ENVASE', 
                                                    FORMAT(IFNULL(KILOS_NETO_DREPALETIZAJE,0),2,'de_DE') AS 'NETO',
                                                    IF(STOCK = '0','Sin Datos',STOCK ) AS 'STOCKR'
                                         FROM fruta_drepaletizajeex
                                         WHERE ID_REPALETIZAJE= '" . $IDREPALETIZAJE . "'
                                         AND ESTADO_REGISTRO = 1 ; ");
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
    public function buscarDrepaletizaje2AgrupadoFolio($IDREPALETIZAJE)
    {
        try {
            $datos = $this->conexion->prepare("SELECT * ,
                                                    DATE_FORMAT(FECHA_EMBALADO_DREPALETIZAJE, '%d-%m-%Y') AS 'FECHA',
                                                    FORMAT(SUM(CANTIDAD_ENVASE_DREPALETIZAJE),0,'de_DE') AS 'ENVASE',
                                                    FORMAT(SUM(KILOS_NETO_DREPALETIZAJE),2,'de_DE') AS 'NETO'
                                        FROM fruta_drepaletizajeex
                                        WHERE ID_REPALETIZAJE= '" . $IDREPALETIZAJE . "'
                                        AND ESTADO_REGISTRO = 1 
                                        GROUP BY FOLIO_NUEVO_DREPALETIZAJE ;");
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


    public function buscarDrepaletizajePorExistencia($IDEXIEXPORTACION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_drepaletizajeex WHERE ID_EXIEXPORTACION= '" . $IDEXIEXPORTACION . "';");
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

    public function buscarDrepaletizajeAgrupadoFolio($IDREPALETIZAJE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *
                                    FROM fruta_drepaletizajeex  
                                    WHERE ID_REPALETIZAJE = '" . $IDREPALETIZAJE . "' 
                                    AND ESTADO_REGISTRO = 1
                                    GROUP BY FOLIO_NUEVO_DREPALETIZAJE ;");
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

    //OBTENER VAROIEDAD DE EXISTENCIA REPALETIZADA
    public function buscarDrepaletizajeAgrupadoVariedad($IDREPALETIZAJE)
    {
        try {

            $datos = $this->conexion->prepare("     SELECT * 
                                                    FROM fruta_drepaletizajeex,  vespecies   
                                                    ID_REPALETIZAJE = '" . $IDREPALETIZAJE . "'                                        
                                                    GROUP BY ID_VESPECIES;");
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
    //OBTENER VAROIEDAD DE EXISTENCIA REPALETIZADA
    public function buscarDrepaletizajeAgrupadoProductor($IDREPALETIZAJE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_drepaletizajeex  , productor
                                                WHERE fruta_drepaletizajeex.ID_REPALETIZAJE= '" . $IDREPALETIZAJE . "'
                                                AND fruta_drepaletizajeex.ID_PRODUCTOR =productor.ID_PRODUCTOR
                                                GROUP BY productor.ID_PRODUCTOR;");
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
    //OBTENER VAROIEDAD DE PROCESO REPALETIZADA
    public function buscarDrepaletizajeAgrupadoProceso($IDREPALETIZAJE)
    {
        try {
            $datos = $this->conexion->prepare("SELECT * FROM fruta_drepaletizajeex,   exiexportacion
                                         WHERE  fruta_drepaletizajeex.FOLIO_NUEVO_DREPALETIZAJE=exiexportacion.FOLIO_AUXILIAR_EXIEXPORTACION
                                         AND fruta_drepaletizajeex.ID_REPALETIZAJE= '" . $IDREPALETIZAJE . "'
                                         GROUP BY ID_PROCESO ;");
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



    //OBTENER VAROIEDAD DE PROCESO REPALETIZADA
    public function buscarDrepaletizajeBolsa($IDFOLIO, $FECHAEMBALADOD, $IDESTANDAR,  $IDPRODUCTOR,  $IDVESPECIES, $IDTMANEJO,  $IDCALIBRE, $IDEMBALAJE, $STOCK,   $IDREPALETIZAJE)
    {
        try {
            $datos = $this->conexion->prepare("SELECT 
                                                SUM(CANTIDAD_ENVASE_DREPALETIZAJE) AS 'ENVASE', 
                                                SUM(KILOS_NETO_DREPALETIZAJE) AS 'NETO', 
                                                FECHA_EMBALADO_DREPALETIZAJE AS 'FECHA_EMBALADO' ,
                                                ID_FOLIO,  ID_ESTANDAR,ID_PRODUCTOR,ID_VESPECIES, 
                                                ID_TMANEJO,ID_TCALIBRE,ID_TEMBALAJE,STOCK  
                                         FROM fruta_drepaletizajeex 
                                         WHERE                                           
                                          ID_REPALETIZAJE= '" . $IDREPALETIZAJE . "' 
                                            AND ID_FOLIO= '" . $IDFOLIO . "' 
                                            AND FECHA_EMBALADO_DREPALETIZAJE LIKE '" . $FECHAEMBALADOD . "' 
                                            AND ID_ESTANDAR= '" . $IDESTANDAR . "' 
                                            AND ID_PRODUCTOR = '" . $IDPRODUCTOR . "'  
                                            AND ID_VESPECIES= '" . $IDVESPECIES . "'
                                            AND ID_TMANEJO= '" . $IDTMANEJO . "'
                                            AND ID_TCALIBRE= '" . $IDCALIBRE . "'
                                            AND ID_TEMBALAJE= '" . $IDEMBALAJE . "'
                                            AND STOCK= '" . $STOCK . "'                                                                                                 
                                         AND ESTADO_REGISTRO = 1  
                                         GROUP BY 
                                         ID_FOLIO, FECHA_EMBALADO_DREPALETIZAJE, ID_ESTANDAR,ID_PRODUCTOR,ID_VESPECIES, 
                                         ID_TMANEJO,ID_TCALIBRE,ID_TEMBALAJE,STOCK  
                                         
                                         
                                         ;");
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

    public function buscarDrepaletizajePorExistencia2($IDEXIEXPORTACION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_drepaletizajeex 
                                                WHERE ID_EXIEXPORTACION= '" . $IDEXIEXPORTACION . "'
                                                AND ESTADO_REGISTRO = 1  ;");
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
    public function buscarDrepaletizajePorFolio($FOLIONUEVODREPALETIZAJE, $IDREPALETIZAJE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,DATE_FORMAT(FECHA_EMBALADO_DREPALETIZAJE, '%d-%m-%Y')  AS 'FECHA',
                                                        FORMAT(IFNULL(CANTIDAD_ENVASE_DREPALETIZAJE,0),0,'de_DE') AS 'ENVASE',
                                                        FORMAT(IFNULL(KILOS_NETO_DREPALETIZAJE,0),2,'de_DE') AS 'NETO',
                                                        FTC.NOMBRE_TCALIBRE, FTC.ORDEN
                                                FROM fruta_drepaletizajeex 
                                                LEFT JOIN fruta_tcalibre FTC ON fruta_drepaletizajeex.ID_TCALIBRE = FTC.ID_TCALIBRE
                                                WHERE fruta_drepaletizajeex.FOLIO_NUEVO_DREPALETIZAJE= '" . $FOLIONUEVODREPALETIZAJE . "'
                                                AND fruta_drepaletizajeex.ID_REPALETIZAJE = '" . $IDREPALETIZAJE . "' 
                                                AND fruta_drepaletizajeex.ESTADO_REGISTRO = 1 ORDER BY FTC.ORDEN ASC ;");
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

    //OBTENER TOTALES
    public function totalesDrepaletizaje($IDREPALETIZAJE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT
                                                IFNULL(COUNT(ID_DREPALETIZAJE),0) AS 'TOTA_REGISTRO_REPALETIZAJE',
                                                IFNULL(SUM(CANTIDAD_ENVASE_DREPALETIZAJE),0) AS 'ENVASE', 
                                                IFNULL(SUM(KILOS_NETO_DREPALETIZAJE),0) AS 'NETO'
                                             FROM fruta_drepaletizajeex
                                             WHERE ID_REPALETIZAJE= '" . $IDREPALETIZAJE . "'
                                             AND ESTADO_REGISTRO = 1;");
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

    public function totalesDrepaletizaje2($IDREPALETIZAJE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT
                                                IFNULL(COUNT(ID_DREPALETIZAJE),0) AS 'TOTA_REGISTRO_REPALETIZAJE',
                                                FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_DREPALETIZAJE),0),0,'de_DE') AS 'ENVASE', 
                                                FORMAT(IFNULL(SUM(KILOS_NETO_DREPALETIZAJE),0),2,'de_DE') AS 'NETO'
                                             FROM fruta_drepaletizajeex
                                             WHERE ID_REPALETIZAJE= '" . $IDREPALETIZAJE . "'
                                             AND ESTADO_REGISTRO = 1;");
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
    public function obtenerTotales2AgrupadoFolio($IDREPALETIZAJE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT
                                                FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_DREPALETIZAJE),0),0,'de_DE') AS 'ENVASE', 
                                                FORMAT(IFNULL(SUM(KILOS_NETO_DREPALETIZAJE),0),2,'de_DE') AS 'NETO'
                                             FROM fruta_drepaletizajeex
                                             WHERE ID_REPALETIZAJE= '" . $IDREPALETIZAJE . "'
                                             AND ESTADO_REGISTRO = 1
                                             GROUP BY FOLIO_NUEVO_DREPALETIZAJE;");
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
    public function obtenerTotales2AgrupadoFolio2($FOLIONUEVODREPALETIZAJE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT
                                                FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_DREPALETIZAJE),0),0,'de_DE') AS 'ENVASE', 
                                                FORMAT(IFNULL(SUM(KILOS_NETO_DREPALETIZAJE),0),2,'de_DE') AS 'NETO'
                                             FROM fruta_drepaletizajeex
                                             WHERE FOLIO_NUEVO_DREPALETIZAJE= '" . $FOLIONUEVODREPALETIZAJE . "'
                                             AND ESTADO_REGISTRO = 1
                                             GROUP BY FOLIO_NUEVO_DREPALETIZAJE;");
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
    public function totalesDrepaletizajePorExistencia($IDEXIEXPORTACION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT
                                                IFNULL(SUM(CANTIDAD_ENVASE_DREPALETIZAJE),0) AS 'ENVASE', 
                                                IFNULL(SUM(KILOS_NETO_DREPALETIZAJE),0) AS 'NETO'
                                             FROM fruta_drepaletizajeex
                                             WHERE ID_EXIEXPORTACION= '" . $IDEXIEXPORTACION . "';");
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

    public function obtenerTotalesDrepaletizajePorExistencia2($IDEXIEXPORTACION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                    IFNULL(SUM(CANTIDAD_ENVASE_DREPALETIZAJE),0)AS 'ENVASE',
                                                    IFNULL(SUM(KILOS_NETO_DREPALETIZAJE),0) AS 'NETO'
                                                FROM fruta_drepaletizajeex 
                                                WHERE ID_EXIEXPORTACION= '" . $IDEXIEXPORTACION . "'
                                                AND ESTADO_REGISTRO = 1  ;");
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
